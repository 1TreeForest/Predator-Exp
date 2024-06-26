<?php
/**
 * Generic script to list stored reports. Part of the module to allow the tracking,
 * storing, and viewing of reports.
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2012-2017 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */


require_once("../globals.php");
require_once("../../library/patient.inc");
require_once "$srcdir/options.inc.php";
require_once "$srcdir/clinical_rules.php";
require_once "$srcdir/report_database.inc";

use OpenEMR\Core\Header;

$form_begin_date = DateTimeToYYYYMMDDHHMMSS($_POST['form_begin_date']);
$form_end_date = DateTimeToYYYYMMDDHHMMSS($_POST['form_end_date']);
?>

<html>

<head>

    <title><?php echo xlt('Report Results/History'); ?></title>

    <?php Header::setupHeader('datetime-picker'); ?>

    <script LANGUAGE="JavaScript">
        $( document ).ready(function(){
            $('.datepicker').datetimepicker({
                <?php $datetimepicker_timepicker = true; ?>
                <?php $datetimepicker_showseconds = true; ?>
                <?php $datetimepicker_formatInput = true; ?>
                <?php require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php'); ?>
                <?php // can add any additional javascript settings to datetimepicker here; need to prepend first setting with a comma?>
            });
        });
    </script>

    <style type="text/css">
        /* specifically include & exclude from printing */
        @media print {
            #report_parameters {
                visibility: hidden;
                display: none;
            }
            #report_parameters_daterange {
                visibility: visible;
                display: inline;
            }
            #report_results table {
               margin-top: 0px;
            }
        }

        /* specifically exclude some from the screen */
        @media screen {
            #report_parameters_daterange {
                visibility: hidden;
                display: none;
            }
        }
    </style>
</head>

<body class="body_top">

<!-- Required for the popup date selectors -->
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>

<span class='title'><?php echo xlt('Report History/Results'); ?></span>

<form method='post' name='theform' id='theform' action='report_results.php' onsubmit='return top.restoreSession()'>

<div id="report_parameters">

<table>
 <tr>
  <td width='470px'>
    <div style='float:left'>

    <table class='text'>

                   <tr>
                      <td class='control-label'>
                            <?php echo xlt('Begin Date'); ?>:
                      </td>
                      <td>
                         <input type='text' name='form_begin_date' id='form_begin_date' size='20' value='<?php echo attr(oeFormatDateTime($form_begin_date, 0, true)); ?>'
                            class='datepicker form-control'>
                      </td>
                   </tr>

                <tr>
                        <td class='control-label'>
                                <?php echo xlt('End Date'); ?>:
                        </td>
                        <td>
                           <input type='text' name='form_end_date' id='form_end_date' size='20' value='<?php echo attr(oeFormatDateTime($form_end_date, 0, true)); ?>'
                                class='datepicker form-control'>
                        </td>
                </tr>
    </table>
    </div>

  </td>
  <td align='left' valign='middle' height="100%">
    <table style='border-left:1px solid; width:100%; height:100%' >
        <tr>
            <td>
                <div class="text-center">
          <div class="btn-group" role="group">
            <a href='#' id='search_button' class='btn btn-default btn-search' onclick='top.restoreSession(); $("#theform").submit()'>
                <?php echo xlt('Search'); ?>
            </a>
            <a href='#' id='refresh_button' class='btn btn-default btn-refresh' onclick='top.restoreSession(); $("#theform").submit()'>
                <?php echo xlt('Refresh'); ?>
            </a>
          </div>
                </div>
            </td>
        </tr>
    </table>
  </td>
 </tr>
</table>

</div>  <!-- end of search parameters -->

<br>



<div id="report_results">
<table>

 <thead>
  <th align='center'>
    <?php echo xlt('Title'); ?>
  </th>

  <th align='center'>
    <?php echo xlt('Date'); ?>
  </th>

  <th align='center'>
    <?php echo xlt('Status'); ?>
  </th>

 </thead>
 <tbody>  <!-- added for better print-ability -->
<?php

$res = listingReportDatabase($form_begin_date, $form_end_date);
while ($row = sqlFetchArray($res)) {
    // Figure out the title and link
    if ($row['type'] == "cqm") {
        if (!$GLOBALS['enable_cqm']) {
            continue;
        }

        $type_title = xl('Clinical Quality Measures (CQM)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "cqm_2011") {
        if (!$GLOBALS['enable_cqm']) {
            continue;
        }

        $type_title = xl('2011 Clinical Quality Measures (CQM)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "cqm_2014") {
        if (!$GLOBALS['enable_cqm']) {
            continue;
        }

        $type_title = xl('2014 Clinical Quality Measures (CQM)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "amc") {
        if (!$GLOBALS['enable_amc']) {
            continue;
        }

        $type_title = xl('Automated Measure Calculations (AMC)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "amc_2011") {
        if (!$GLOBALS['enable_amc']) {
            continue;
        }

        $type_title = xl('2011 Automated Measure Calculations (AMC)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "amc_2014") {
        if (!$GLOBALS['enable_amc']) {
            continue;
        }

        $type_title = xl('2014 Automated Measure Calculations (AMC)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "amc_2014_stage1") {
        if (!$GLOBALS['enable_amc']) {
            continue;
        }

        $type_title = xl('2014 Automated Measure Calculations (AMC) - Stage I');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "amc_2014_stage2") {
        if (!$GLOBALS['enable_amc']) {
            continue;
        }

        $type_title = xl('2014 Automated Measure Calculations (AMC) - Stage II');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "process_reminders") {
        if (!$GLOBALS['enable_cdr']) {
            continue;
        }

        $type_title = xl('Processing Patient Reminders');
        $link = "../batchcom/batch_reminders.php?report_id=" . attr($row["report_id"]);
    } elseif ($row['type'] == "process_send_reminders") {
        if (!$GLOBALS['enable_cdr']) {
            continue;
        }

        $type_title = xl('Processing and Sending Patient Reminders');
        $link = "../batchcom/batch_reminders.php?report_id=" . attr($row["report_id"]);
    } elseif ($row['type'] == "passive_alert") {
        if (!$GLOBALS['enable_cdr']) {
            continue;
        }

        $type_title = xl('Standard Measures (Passive Alerts)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "active_alert") {
        if (!$GLOBALS['enable_cdr']) {
            continue;
        }

        $type_title = xl('Standard Measures (Active Alerts)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } elseif ($row['type'] == "patient_reminder") {
        if (!$GLOBALS['enable_cdr']) {
            continue;
        }

        $type_title = xl('Standard Measures (Patient Reminders)');
        $link = "cqm.php?report_id=" . attr($row["report_id"]) . "&back=list";
    } else {
        // Not identified, so give an unknown title
        $type_title = xl('Unknown') . "-" . $row['type'];
        $link = "";
    }
    ?>
<tr>
    <?php if ($row["progress"] == "complete") { ?>
      <td align='center'><a href='<?php echo $link; ?>' onclick='top.restoreSession()'><?php echo text($type_title); ?></a></td>
    <?php } else { ?>
      <td align='center'><?php echo text($type_title); ?></td>
    <?php } ?>
  <td align='center'><?php echo text(oeFormatDateTime($row["date_report"], "global", true)); ?></td>
    <?php if ($row["progress"] == "complete") { ?>
      <td align='center'><?php echo xlt("Complete") . " (" . xlt("Processing Time") . ": " . text($row['report_time_processing']) . " " . xlt("Minutes") . ")"; ?></td>
    <?php } else { ?>
      <td align='center'><?php echo xlt("Pending") . " (" . text($row["progress_items"]) . " / " . text($row["total_items"]) . " " . xlt("Patients Processed") . ")"; ?></td>
    <?php } ?>

</tr>

<?php
} // $row = sqlFetchArray($res) while
?>
</tbody>
</table>
</div>  <!-- end of search results -->

</form>

</body>

</html>
