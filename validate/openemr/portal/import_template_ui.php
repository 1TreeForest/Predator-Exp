<?php
/**
 *
 * Copyright (C) 2016-2017 Jerry Padgett <sjpadgett@gmail.com>
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEMR
 * @author Jerry Padgett <sjpadgett@gmail.com>
 * @link http://www.open-emr.org
 */
//$ignoreAuth = true;


require_once("../interface/globals.php");
$getdir = isset($_POST['sel_pt']) ? $_POST['sel_pt'] : 0;
if ($getdir > 0) {
    $tdir = $GLOBALS['OE_SITE_DIR'] .  '/documents/onsite_portal_documents/templates/' . $getdir . '/';
    if (!is_dir($tdir)) {
        if (!mkdir($tdir, 0755, true)) {
            die(xl('Failed to create folder'));
        }
    }
} else {
    $tdir = $GLOBALS['OE_SITE_DIR'] .  '/documents/onsite_portal_documents/templates/';
}

function getAuthUsers()
{
    $response = sqlStatement("SELECT patient_data.pid, Concat_Ws(' ', patient_data.fname, patient_data.lname) as ptname FROM patient_data WHERE allow_patient_portal = 'YES'");
    $resultpd = array();
    while ($row = sqlFetchArray($response)) {
        $resultpd[] = $row;
    }

    return $resultpd;
}
function getTemplateList($dir)
{
    $retval = array();
    if (substr($dir, -1) != "/") {
        $dir .= "/";
    }

    $d = @dir($dir) or die("File List: Failed opening directory " . text($dir) . " for reading");
    while (false !== ($entry = $d->read())) {
        if ($entry[0] == "." || substr($entry, -3) != 'tpl') {
            continue;
        }

        if (is_dir("$dir$entry")) {
            $retval[] = array(
                    'pathname' => "$dir$entry",
                    'name' => "$entry",
                    'size' => 0,
                    'lastmod' => filemtime("$dir$entry")
            );
        } elseif (is_readable("$dir$entry")) {
            $retval[] = array(
                    'pathname' => "$dir$entry",
                    'name' => "$entry",
                    'size' => filesize("$dir$entry"),
                    'lastmod' => filemtime("$dir$entry")
            );
        }
    }

    $d->close();
    return $retval;
}
?>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo xlt('OpenEMR Portal'); ?> | <?php echo xlt('Import'); ?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="description" content="Developed By sjpadgett@gmail.com">

<link href="<?php echo $GLOBALS['assets_static_relative']; ?>/font-awesome-4-6-3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap-3-3-4/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php if ($_SESSION['language_direction'] == 'rtl') { ?>
    <link href="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap-rtl-3-3-4/dist/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
<?php } ?>
<link href="assets/css/style.css?v=<?php echo $v_js_includes; ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery-min-1-11-3/index.js" type="text/javascript"></script>
<script src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap-3-3-4/dist/js/bootstrap.min.js" type="text/javascript"></script>
<link  href="<?php echo $GLOBALS['assets_static_relative']; ?>/summernote-0-8-2/dist/summernote.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="<?php echo $GLOBALS['assets_static_relative']; ?>/summernote-0-8-2/dist/summernote.js"></script>
<script type='text/javascript' src="<?php echo $GLOBALS['assets_static_relative']; ?>/summernote-0-8-2/dist/plugin/nugget/summernote-ext-nugget.js"></script>
</head>
<script>
var currentEdit = "";
var tedit = function(docname) {
    currentEdit = docname;
    getDocument(docname, 'get', '')
    return false;
    };

var tsave = function() {
    var makrup = $('#templatecontent').summernote('code');
    getDocument(currentEdit, 'save', makrup)
    };
var tdelete = function(docname) {
    var delok = confirm("<?php echo xls('You are about to delete template'); ?>: "+docname+"\n<?php echo xls('Is this Okay?'); ?>");
    if(delok === true) {getDocument(docname, 'delete', '')}
    return false;
    };
 function getDocument(docname, mode, content){
        var liburl = 'import_template.php';
            $.ajax({
                type: "POST",
                url: liburl,
                data: {docid: docname, mode: mode,content: content},
                beforeSend: function(xhr){
                    console.log("Please wait..."+content);
                },
                error: function(qXHR, textStatus, errorThrow){
                    console.log("There was an error");
                },
                success: function(templateHtml, textStatus, jqXHR){
                    if(mode == 'get'){
                        //console.log("File get..."+templateHtml);
                        $('#templatecontent').summernote('destroy');
                        $('#templatecontent').empty().append(templateHtml);
                        $('#popeditor').modal({backdrop: "static"});
                        $('#templatecontent').summernote({
                           // height: 200,
                            focus: true,
                            placeholder: '',
                            toolbar: [
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['insert', ['link','picture', 'video', 'hr']],
                                ['view', ['fullscreen', 'codeview']],
                                ['insert', ['nugget']],
                                ['edit',['undo','redo']]
                                ],
                                nugget: {
                                    list: [
                                        '{ParseAsHTML}{TextInput}', '{smTextInput}', '{CheckMark}', '{ynRadioGroup}', '{DOS}','{ReferringDOC}', '{PatientID}',
                                        '{PatientName}', '{PatientSex}', '{PatientDOB}', '{PatientPhone}', '{PatientSignature}', '{Address}', '{City}', '{State}', '{Zip}',
                                        '{AdminSignature}', '{Medications}', '{ProblemList}', '{Allergies}', '{ChiefComplaint}'
                                    ],
                                    label: 'Tags / Directives',
                                    tooltip: 'Insert at current cursor location.'
                                },
                             options:{'label': 'Tags/Directives',
                                    'tooltip': 'Insert Tag or Directive'}
                            });
                        }
                    else if(mode == 'save'){
                        $('#templatecontent').summernote('destroy');
                        location.reload();
                    }
                    else if(mode == 'delete'){
                        location.reload();
                    }
                }
            });
    }
</script>
<style>
.modal.modal-wide .modal-dialog {
  width: 75%;
}
.modal-wide .modal-body {
  overflow-y: auto;
}
</style>
<body class="skin-blue">
<div  class='container' style='display: block;'>
<hr>
<h3><?php echo xlt('Patient Document Template Upload'); ?></h3>
<h4><em><?php echo xlt('File base name becomes Menu selection'); ?>.<br><?php echo xlt('Automatically applies correct extension on successful upload'); ?>.<br>
<?php echo xlt('Example Privacy_Agreement.txt becomes Privacy Agreement button in Patient Documents'); ?>.</em></h4>
<form id="form_upload" class="form" action="import_template.php" method="post" enctype="multipart/form-data">
<input class="btn btn-info" type="file" name="tplFile">
<br>
<button class="btn btn-primary" type="button" onclick="location.href='./patient/provider'"><?php echo xlt('Home'); ?></button>
<input type='hidden' name="up_dir" value='<?php global $getdir;
echo $getdir;?>' />
<button class="btn btn-success" type="submit" name="upload_submit" id="upload_submit"><?php echo xlt('Upload Template for'); ?> <span style="font-size: 14px;" class="label label-default" id='ptstatus'></span></button>
</form>
<div class='row'>
<h3><?php echo xlt('Active Templates'); ?></h3>
<div class='col col-md col-lg'>
<form id = "edit_form" name = "edit_form" class="form-inline" action="" method="post">
 <div class="form-group">
 <label for="sel_pt"><?php echo xlt('Patient'); ?></label>
 <select class="form-control" id="sel_pt" name="sel_pt">
<option value='0'><?php echo xlt("Global All Patients")?></option>
<?php
$ppt = getAuthUsers();
global $getdir;
foreach ($ppt as $pt) {
    if ($getdir != $pt['pid']) {
        echo "<option value=" . attr($pt['pid']) . ">" . text($pt['ptname']) . "</option>";
    } else {
        echo "<option value='" . attr($pt['pid']) . "' selected='selected'>" . text($pt['ptname']) . "</option>";
    }
}

echo "</select></div>";
echo '<button type="submit" class="btn btn-default">' . xlt('Refresh') . '</button>';
echo '</form></div>';
$dirlist = getTemplateList($tdir);
echo "<table  class='table table-striped table-bordered'>";
echo "<thead>";
echo "<tr><th>" . xlt("Template") . " - <i>" . xlt("Click to edit") . "</i></th><th>" . xlt("Size") . "</th><th>" . xlt("Last Modified") . "</th></tr>";
echo "</thead>";
echo "<tbody>";
foreach ($dirlist as $file) {
    $t = "'" . $file['pathname'] . "'";
    echo "<tr>";
    echo '<td><button id="tedit' . attr($t) . '" class="btn btn-sm btn-primary" onclick="tedit(' . attr($t) . ')" type="button">' . text($file['name']) . '</button>
 		<button id="tdelete' . attr($t) . '" class="btn btn-xs btn-danger" onclick="tdelete(' . attr($t) . ')" type="button">' . xlt("Delete") . '</button></td>';
    echo "<td>{$file['size']}</td>";
    echo "<td>", date('r', $file['lastmod']), "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
<script>
$(document).ready(function(){
    $("#popeditor").on("show.bs.modal", function() {
          var height = $(window).height() - 200;
          $(this).find(".modal-body").css("max-height", height);
        });
    $("#sel_pt").change(function(){
        $("#edit_form").submit();
    });
    $("#ptstatus").text($("#sel_pt").find(":selected").text())
});
</script>
</div>
   <div class="modal modal-wide fade" id="popeditor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only"><?php echo xlt('Close'); ?></span>
                        </button>
                        <h4 class="modal-title"><?php echo xlt('Edit Template'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="edittpl" id="templatecontent"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo xlt('Dismiss'); ?></button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="tsave()"><?php echo xlt('Save'); ?></button>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>
