<?php
/**
 *
 * Copyright (C) 2012-2013 Naina Mohamed <naina@capminds.com> CapMinds Technologies
 * Copyright (C) 2017 Brady Miller <brady.g.miller@gmail.com>
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package OpenEMR
 * @author  Naina Mohamed <naina@capminds.com>
 * @author  Brady Miller <brady.g.miller@gmail.com>
 * @link    http://www.open-emr.org
 */




include_once("../../globals.php");
include_once("$srcdir/api.inc");
require_once("$srcdir/patient.inc");
require_once("$srcdir/options.inc.php");
formHeader("Form:AfterCare Planning");
$returnurl = 'encounter_top.php';
$formid = 0 + (isset($_GET['id']) ? $_GET['id'] : 0);
$obj = $formid ? formFetch("form_aftercare_plan", $formid) : array();

?>
<html>
<head>
<?php html_header_show();?>

<link rel="stylesheet" href="<?php echo $css_header;?>" type="text/css">
<link rel="stylesheet" href="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery-datetimepicker-2-5-4/build/jquery.datetimepicker.min.css">

<script type="text/javascript" src="<?php echo $GLOBALS['webroot'] ?>/library/textformat.js?v=<?php echo $v_js_includes; ?>"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['webroot'] ?>/library/dialog.js?v=<?php echo $v_js_includes; ?>"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery-min-3-1-1/index.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery-datetimepicker-2-5-4/build/jquery.datetimepicker.full.min.js"></script>

<script language="JavaScript">
 $(document).ready(function() {
  var win = top.printLogSetup ? top : opener.top;
  win.printLogSetup(document.getElementById('printbutton'));

  $('.datepicker').datetimepicker({
    <?php $datetimepicker_timepicker = false; ?>
    <?php $datetimepicker_showseconds = false; ?>
    <?php $datetimepicker_formatInput = false; ?>
    <?php require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php'); ?>
    <?php // can add any additional javascript settings to datetimepicker here; need to prepend first setting with a comma?>
  });
 });
</script>

</head>
<body class="body_top">
<p><span class="forms-title"><?php echo xlt('AfterCare Planning'); ?></span></p>
</br>
<?php
echo "<form method='post' name='my_form' " .
  "action='$rootdir/forms/aftercare_plan/save.php?id=" . attr($formid) ."'>\n";
?>
<table  border="0">
<tr>
<td align="left" class="forms" class="forms"><?php echo xlt('Client Name'); ?>:</td>
        <td class="forms">
            <label class="forms-data"> <?php if (is_numeric($pid)) {
                $result = getPatientData($pid, "fname,lname,squad");
                echo htmlspecialchars(text($result['fname'])." ".text($result['lname']));
            }

   $patient_name = ($result['fname'])." ".($result['lname']);
?>
   </label>
   <input type="hidden" name="client_name" value="<?php echo attr($patient_name);?>">
        </td>
        <td align="left"  class="forms"><?php echo xlt('DOB'); ?>:</td>
        <td class="forms">
        <label class="forms-data"> <?php if (is_numeric($pid)) {
            $result = getPatientData($pid, "*");
            echo htmlspecialchars($result['DOB']);
        }

   $dob = ($result['DOB']);
?>
   </label>
     <input type="hidden" name="DOB" value="<?php echo attr($dob);?>">
        </td>
        </tr>
<tr>


  <td align="left" class="forms"><?php echo xlt('Admit Date'); ?>:</td>
        <td class="forms">
               <input type='text' size='10' class='datepicker' name='admit_date' id='admission_date' <?php echo attr($disabled); ?>;
               value='<?php echo attr($obj{"admit_date"}); ?>'
               title='<?php echo xla('yyyy-mm-dd Date of service'); ?>' />
        </td>
        <td align="left" class="forms"><?php echo xlt('Discharged'); ?>:</td>
        <td class="forms">
               <input type='text' size='10' class='datepicker' name='discharged' id='discharge_date' <?php echo attr($disabled); ?>;
      value='<?php echo attr($obj{"discharged"}); ?>'
       title='<?php echo xla('yyyy-mm-dd Date of service'); ?>' />
        </td>
    </tr>
    <tr>
        <td align="left colspan="3" style="padding-bottom:7px;"></td>
    </tr>
        <tr>

        <td class="forms-subtitle" colspan="4"><B><?php echo xlt('Goal and Methods');?></B></td>

    </tr>
    <tr>
        <td align="left colspan="3" style="padding-bottom:7px;"></td>
    </tr>
    <tr>

        <td class="forms-subtitle" colspan="4"><B><?php echo xlt('Goal A');?>:</B>&nbsp;<?php echo xlt('Acute Intoxication/Withdrawal'); ?></td>

    </tr>
    <tr>
        <td align="right" class="forms">1.</td>
        <td colspan="3"><textarea name="goal_a_acute_intoxication" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_a_acute_intoxication"});?></textarea></td>

    </tr>
    <tr>
        <td align="right" class="forms">2.</td>
        <td colspan="3"><textarea name="goal_a_acute_intoxication_I" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_a_acute_intoxication_I"});?></textarea></td>

    </tr>
    <tr>
        <td align="right" class="forms">3.</td>
        <td colspan="3"><textarea name="goal_a_acute_intoxication_II" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_a_acute_intoxication_II"});?></textarea></td>


    <tr>

        <td class="forms-subtitle" colspan="4"><B><?php echo xlt('Goal B');?>:</B>&nbsp;<?php  echo xlt('Emotional / Behavioral Conditions & Complications'); ?></td>

    </tr>
    <tr>
        <td align="right" class="forms">1.</td>
        <td colspan="3"><textarea name="goal_b_emotional_behavioral_conditions" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_b_emotional_behavioral_conditions"});?></textarea></td>

    </tr>
    <tr>
        <td align="right" class="forms">2.</td>
        <td colspan="3"><textarea name="goal_b_emotional_behavioral_conditions_I" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_b_emotional_behavioral_conditions_I"});?></textarea></td>

    </tr>


        <td class="forms-subtitle" colspan="4"><B><?php echo xlt('Goal C');?>:</B>&nbsp;<?php  echo xlt('Relapse Potential'); ?></td>

    </tr>
    <tr>
        <td align="right" class="forms">1.</td>
        <td colspan="3"><textarea name="goal_c_relapse_potential" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_c_relapse_potential"});?></textarea></td>

    </tr>
    <tr>
        <td align="right" class="forms">2.</td>
        <td colspan="3"><textarea name="goal_c_relapse_potential_I" rows="2" cols="80" wrap="virtual name"><?php echo text($obj{"goal_c_relapse_potential_I"});?></textarea></td>

    </tr>

    <tr>
        <td align="left colspan="3" style="padding-bottom:7px;"></td>
    </tr>
    <tr>
        <td></td>
    <td><input type='submit' value='<?php echo xla('Save'); ?>' class='button-css' />&nbsp;
    <input type='button' value='<?php echo xla('Print'); ?>' id='printbutton' class='button-css' />&nbsp;
    <input type='button' class='button-css' value='<?php echo xla('Cancel'); ?>'
 onclick="parent.closeTab(window.name, false)" /></td>
    </tr>
</table>
</form>
<?php
formFooter();
?>
