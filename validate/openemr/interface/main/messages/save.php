<?php
/**
 * /interface/main/messages/save.php
 *
 * @package MedEx
 * @link    http://www.MedExBank.com
 * @author  MedEx <support@MedExBank.com>
 * @copyright Copyright (c) 2017 MedEx <support@MedExBank.com>
 * @license https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License 3
 */

require_once "../../globals.php";
require_once "$srcdir/acl.inc";
require_once "$srcdir/lists.inc";
require_once "$srcdir/forms.inc";
require_once "$srcdir/patient.inc";
require_once "$srcdir/MedEx/API.php";

$MedEx = new MedExApi\MedEx('MedExBank.com');
if ($_REQUEST['go'] == 'sms_search') {
    $param = "%" . $_GET['term'] . "%";
    $query = "SELECT * FROM patient_data WHERE fname LIKE ? OR lname LIKE ?";
    $result = sqlStatement($query, array($param, $param));
    while ($frow = sqlFetchArray($result)) {
        //$field_id  = $frow['field_id'];
        //$newdata[$field_id] = get_layout_form_value($frow);
        $data['Label'] = 'Name';
        $data['value'] = $frow['fname'] . " " . $frow['lname'];
        $data['pid'] = $frow['pid'];
        $data['mobile'] = $frow['phone_cell'];
        $data['allow'] = $frow['hipaa_allowsms'];
        $results[] = $data;
    }
    //echo $query. " -- ".$param;
    echo json_encode($results);
    exit;
}
//you need admin privileges to update this.
if ($_REQUEST['go'] == 'Preferences') {
    if (acl_check('admin', 'super')) {
        $sql = "UPDATE `medex_prefs` SET `ME_facilities`=?,`ME_providers`=?,`ME_hipaa_default_override`=?,
			`PHONE_country_code`=? ,`MSGS_default_yes`=?,
			`POSTCARDS_local`=?,`POSTCARDS_remote`=?,
			`LABELS_local`=?,`LABELS_choice`=?,
			`combine_time`=?, postcard_top=?";

        $facilities = implode("|", $_REQUEST['facilities']);
        $providers = implode("|", $_REQUEST['providers']);
        $HIPAA = ($_REQUEST['ME_hipaa_default_override'] ? $_REQUEST['ME_hipaa_default_override'] : '');
        $MSGS = ($_REQUEST['MSGS_default_yes'] ? $_REQUEST['MSGS_default_yes'] : '');
        $country_code = ($_REQUEST['PHONE_country_code'] ? $_REQUEST['PHONE_country_code'] : '1');

        $myValues = array($facilities, $providers, $HIPAA, $country_code, $MSGS, $_REQUEST['POSTCARDS_local'], $_REQUEST['POSTCARDS_remote'], $_REQUEST['LABELS_local'], $_REQUEST['chart_label_type'], $_REQUEST['combine_time'], $_REQUEST['postcard_top']);

        $_GLOBALS['chart_label_type'] = $_REQUEST['chart_label_type'];
        sqlStatement('UPDATE `globals` SET gl_value = ? WHERE gl_name LIKE "chart_label_type" ', array($_REQUEST['chart_label_type']));

        $result['output'] = sqlQuery($sql, $myValues);
        if ($result['output'] == false) {
            $result['success'] = "medex_prefs updated";
        }
        $result['logged_in'] = $MedEx->login();
        $result['response'] = $MedEx->practice->sync($result['logged_in']['token']);
        echo json_encode($result);
    }
    exit;
}
if ($_REQUEST['MedEx'] == "start") {
    if (acl_check('admin', 'super')) {
        $query = "SELECT * FROM users WHERE id = ?";
        $user_data = sqlQuery($query, array($_SESSION['authUserID']));
        $query = "SELECT * FROM facility WHERE primary_business_entity='1' LIMIT 1";
        $facility = sqlFetchArray(sqlStatement($query));

        $data['firstname'] = $user_data['fname'];
        $data['lastname'] = $user_data['lname'];
        $data['username'] = $_SESSION['authUser'];
        $data['password'] = $_REQUEST['new_password'];
        $data['email'] = $_REQUEST['new_email'];
        $data['telephone'] = $facility['phone'];
        $data['fax'] = $facility['fax'];
        $data['company'] = $facility['name'];
        $data['address_1'] = $facility['street'];
        $data['city'] = $facility['city'];
        $data['state'] = $facility['state'];
        $data['postcode'] = $facility['postal_code'];
        $data['country'] = $facility['country_code'];
        $data['sender_name'] = $user_data['fname'] . " " . $user_data['lname'];
        $data['sender_email'] = $facility['email'];
        $data['callerid'] = $facility['phone'];
        $data['MedEx'] = "1";
        $data['ipaddress'] = $_SERVER['REMOTE_ADDR'];

        $prefix = 'http://';
        if ($_SERVER["SSL_TLS_SNI"]) {
            $prefix = "https://";
        }
        $data['website_url'] = $prefix . $_SERVER['HTTP_HOST'] . $web_root;
        $practice_logo = "$OE_SITE_DIR/images/practice_logo.gif";
        if (!file_exists($practice_logo)) {
            $data['logo_url'] = $prefix . $_SERVER['HTTP_HOST'] . $web_root . "/sites/" . $_SESSION["site_id"] . "/images/practice_logo.gif";
        } else {
            $data['logo_url'] = $prefix . $_SERVER['HTTP_HOST'] . $GLOBALS['images_static_relative'] . "/menu-logo.png";
        }
        $response = $MedEx->setup->autoReg($data);
        if (($response['API_key'] > '') && ($response['customer_id'] > '')) {
            sqlQuery("DELETE FROM medex_prefs");
            $runQuery = "SELECT * FROM facility ORDER BY name";
            $fetch = sqlStatement($runQuery);
            while ($frow = sqlFetchArray($fetch)) {
                $facilities[] = $frow['id'];
            }
            $runQuery = "SELECT * FROM users WHERE username != '' AND active = '1' AND authorized='1'";
            $prove = sqlStatement($runQuery);
            while ($prow = sqlFetchArray($prove)) {
                $providers[] = $prow['id'];
            }
            $facilities = implode("|", $facilities);
            $providers = implode("|", $providers);
            $sqlINSERT = "INSERT INTO `medex_prefs` (
								MedEx_id,ME_api_key,ME_username,
								ME_facilities,ME_providers,ME_hipaa_default_override,MSGS_default_yes,
								PHONE_country_code,LABELS_local,LABELS_choice)
							VALUES (?,?,?,?,?,?,?,?,?,?)";
            sqlStatement($sqlINSERT, array($response['customer_id'], $response['API_key'], $_POST['new_email'], $facilities, $providers, "1", "1", "1", "1", "5160"));
            sqlQuery("UPDATE `background_services` SET `active`='1',`execute_interval`='29' WHERE `name`='MedEx'");
        }

        $logged_in = $MedEx->login();

        if ($logged_in) {
            $token      = $logged_in['token'];
            $response['practice']   = $MedEx->practice->sync($token);
            $response['campaigns']  = $MedEx->campaign->events($token);
            $response['generate']   = $MedEx->events->generate($token, $response['campaigns']['events']);
            $response['success']    = "200";
            $response['show'] = xlt("Sign-up successful for") . " " . $data['company'] . ".<br />" . xlt("Proceeding to Preferences") . ".<br />" .
                xlt("If this page does not refresh, reload the Messages page manually") . ".<br />";
            //get js to reroute user to preferences.
            echo json_encode($response);
        } else {
            $response_prob = array();
            $response_prob['show'] = xlt("We ran into some problems connecting your EHR to the MedEx servers") . ".<br >
				" .xlt('Most often this is due to a Username/Password mismatch')."<br />"
                .xlt('Run Setup again or contact support for assistance').
                " <a href='https://medexbank.com/cart/upload/'>MedEx Bank</a>.<br />";
            echo json_encode($response_prob);
        }
    //then redirect user to preferences with a success message!
    } else {
        echo xlt("Sorry you are not privileged enough. Enrollment is limited to Adminstrator accounts.");
    }
    exit;
}

if (($_REQUEST['pid']) && ($_REQUEST['action'] == "new_recall")) {
    $query = "SELECT * FROM patient_data WHERE pid=?";
    $result = sqlQuery($query, array($_REQUEST['pid']));
    $result['age'] = $MedEx->events->getAge($result['DOB']);

    /**
     *  Did the clinician create a PLAN at the last visit?
     *  To do an in office test, and get paid for it,
     *  we must have an order (and a report of the findings).
     *  If the practice is using the eye form then uncomment the 3 lines below.
     *  It provides the PLAN and orders for next visit.
     *  As forms mature, there should be a uniform way to find the PLAN?
     *  And when that day comes we'll put it here...
     *  The other option is to use Visit Categories here.  Maybe both?  Consensus?
     */
    $query = "SELECT PLAN FROM form_eye_mag WHERE PID=? AND date < NOW() ORDER BY date DESC LIMIT 1";
    $result2 = sqlQuery($query, array($_REQUEST['pid']));
    if ($result2) {
        $result['PLAN'] = $result2['PLAN'];
    }
    $query = "SELECT pc_eventDate FROM openemr_postcalendar_events WHERE pc_pid =? ORDER BY pc_eventDate DESC LIMIT 1";
    $result2 = sqlQuery($query, array($_REQUEST['pid']));
    $result['DOLV'] = $result2['pc_eventDate'];
    echo json_encode($result);
    exit;
}

if (($_REQUEST['action'] == 'addRecall') || ($_REQUEST['add_new'])) {
    $result = $MedEx->events->save_recall($_REQUEST);
    echo json_encode('saved');
    exit;
}

if (($_REQUEST['action'] == 'delete_Recall') && ($_REQUEST['pid'])) {
    $MedEx->events->delete_recall();
    echo json_encode('deleted');
    exit;
}

// Clear the pidList session whenever this page is loaded.
// $_SESSION['pidList'] will hold array of patient ids
// which is then used to print 'postcards' and 'Address Labels'
// Thanks Terry!
unset($_SESSION['pidList']);
$pid_list = array();

if ($_REQUEST['action'] == "process") {
    $new_pid = json_decode($_POST['parameter'], true);
    $new_pc_eid = json_decode($_POST['pc_eid'], true);

    if (($_POST['item'] == "phone") || (($_POST['item'] == "notes") && ($_POST['msg_notes'] > ''))) {
        $sql = "INSERT INTO medex_outgoing (msg_pc_eid, msg_type, msg_reply, msg_extra_text) VALUES (?,?,?,?)";
        sqlQuery($sql, array('recall_' . $new_pid[0], $_POST['item'], $_SESSION['authUserID'], $_POST['msg_notes']));
        return "done";
    }
    $pc_eidList = json_decode($_POST['pc_eid'], true);
    $_SESSION['pc_eidList'] = $pc_eidList[0];
    $pidList = json_decode($_POST['parameter'], true);
    $_SESSION['pidList'] = $pidList;
    if ($_POST['item'] == "SMS") {
        $sql = "UPDATE hipaa_reminders SET r_phone_done=NOW(),r_phone_bywhom=? WHERE r_pid IN (" . $_SESSION['pidList'] . ")";
        sqlQuery($sql, array($_SESSION['authUser']));
    }
    if ($_POST['item'] == "AVM") {
        $sql = "UPDATE hipaa_reminders SET r_vm_sent=NOW(),r_vm_sent_by=? WHERE r_pid IN (" . $_SESSION['pidList'] . ")";
        sqlQuery($sql, array($_SESSION['authUser']));
    }
    if ($_POST['item'] == "postcards") {
        foreach ($pidList as $pid) {
            $sql = "INSERT INTO medex_outgoing (msg_pc_eid, msg_type, msg_reply, msg_extra_text) VALUES (?,?,?,?)";
            sqlQuery($sql, array('recall_' . $pid, $_POST['item'], $_SESSION['authUserID'], 'Postcard printed locally'));
        }
    }
    if ($_POST['item'] == "labels") {
        foreach ($pidList as $pid) {
            $sql = "INSERT INTO medex_outgoing (msg_pc_eid, msg_type, msg_reply, msg_extra_text) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE msg_extra_text='Label repeat'";
            sqlQuery($sql, array('recall_' . $pid, $_POST['item'], $_SESSION['authUserID'], 'Label printed locally'));
        }
    }
    echo json_encode($pidList);
    exit;
}
if ($_REQUEST['go'] == "Messages") {
    if ($_REQUEST['msg_id']) {
        $result = updateMessage($_REQUEST['msg_id']);
        echo json_encode($result);
        exit;
    }
}
exit;
