<?php
// Copyright (C) 2010 Rod Roark <rod@sunsetsystems.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// Checks if the server's PHP version is compatible with OpenEMR:
require_once(dirname(__FILE__) . "/common/compatibility/Checker.php");

use OpenEMR\Common\Checker;

$response = Checker::checkPhpVersion();
if ($response !== true) {
    die($response);
}

require_once "version.php";

// Please note that the plain sql is used over the Doctrine ORM for
// `version` table interactions because it cannot connect due to a
// lack of context (this code is ran outside of the OpenEMR context).

$webserver_root = dirname(__FILE__);
if (stripos(PHP_OS, 'WIN') === 0) {
    $webserver_root = str_replace("\\", "/", $webserver_root);
}

$OE_SITES_BASE = "$webserver_root/sites";

function sqlQuery($statement, $link)
{
    $row = mysqli_fetch_array(mysqli_query($link, $statement), MYSQLI_ASSOC);
    return $row;
}
?>
<html>
<head>
<title>OpenEMR Site Administration</title>
<link rel='STYLESHEET' href='interface/themes/style_sky_blue.css'>
<style>
tr.head   { font-size:10pt; background-color:#cccccc; text-align:center; font-weight:bold; }
tr.detail { font-size:10pt; }
a, a:visited, a:hover { color:#0000cc; text-decoration:none; }
</style>
</head>
<body>
<center>
<p><span class='title'>OpenEMR Site Administration</span></p>
<table width='100%' cellpadding='1' cellspacing='2'>
 <tr class='head'>
  <td>Site ID</td>
  <td>DB Name</td>
  <td>Site Name</td>
  <td>Version</td>
  <td>Action</td>
 </tr>
<?php
$dh = opendir($OE_SITES_BASE);
if (!$dh) {
    die("Cannot read directory '$OE_SITES_BASE'.");
}

$siteslist = array();

while (false !== ($sfname = readdir($dh))) {
    if (substr($sfname, 0, 1) == '.') {
        continue;
    }

    if ($sfname == 'CVS') {
        continue;
    }

    $sitedir = "$OE_SITES_BASE/$sfname";
    if (!is_dir($sitedir)) {
        continue;
    }

    if (!is_file("$sitedir/sqlconf.php")) {
        continue;
    }

    $siteslist[$sfname] = $sfname;
}

closedir($dh);
ksort($siteslist);

$encount = 0;
foreach ($siteslist as $sfname) {
    $sitedir = "$OE_SITES_BASE/$sfname";
    $errmsg = '';
    ++$encount;
    $bgcolor = "#" . (($encount & 1) ? "ddddff" : "ffdddd");

    echo " <tr class='detail' bgcolor='$bgcolor'>\n";

    // Access the site's database.
    include "$sitedir/sqlconf.php";

    if ($config) {
        $dbh = mysqli_connect("$host", "$login", "$pass", $dbase, $port);
        if (!$dbh) {
            $errmsg = "MySQL connect failed";
        }
    }

    echo "  <td>$sfname</td>\n";
    echo "  <td>$dbase</td>\n";

    if (!$config) {
        echo "  <td colspan='3'><a href='setup.php?site=$sfname'>Needs setup, click here to run it</a></td>\n";
    } elseif ($errmsg) {
        echo "  <td colspan='3' style='color:red'>$errmsg</td>\n";
    } else {
        // Get site name for display.
        $row = sqlQuery("SELECT gl_value FROM globals WHERE gl_name = 'openemr_name' LIMIT 1", $dbh);
        $openemr_name = $row ? $row['gl_value'] : '';

        // Get version indicators from the database.
        $row = sqlQuery("SHOW TABLES LIKE 'version'", $dbh);
        if (empty($row)) {
            $openemr_version = 'Unknown';
            $database_version = 0;
        } else {
            $row = sqlQuery("SELECT * FROM version LIMIT 1", $dbh);
            $database_patch_txt = "";
            if (!(empty($row['v_realpatch'])) && $row['v_realpatch'] != 0) {
                $database_patch_txt = " (" . $row['v_realpatch'] .")";
            }

            $openemr_version = $row['v_major'] . "." . $row['v_minor'] . "." .
            $row['v_patch'] . $row['v_tag'] . $database_patch_txt;
            $database_version = 0 + $row['v_database'];
            $database_acl = 0 + $row['v_acl'];
            $database_patch = 0 + $row['v_realpatch'];
        }

        // Display relevant columns.
        echo "  <td>$openemr_name</td>\n";
        echo "  <td>$openemr_version</td>\n";
        if ($v_database != $database_version) {
            echo "  <td><a href='sql_upgrade.php?site=$sfname'>Upgrade Database</a></td>\n";
        } elseif (($v_acl > $database_acl)) {
            echo "  <td><a href='acl_upgrade.php?site=$sfname'>Upgrade Access Controls</a></td>\n";
        } elseif (($v_realpatch != $database_patch)) {
            echo "  <td><a href='sql_patch.php?site=$sfname'>Patch Database</a></td>\n";
        } else {
            echo "  <td><a href='interface/login/login.php?site=$sfname'>Log In</a></td>\n";
        }
    }

    echo " </tr>\n";

    if ($config && $dbh !== false) {
        mysqli_close($dbh);
    }
}
?>
</table>
<form method='post' action='setup.php'>
<p><input type='submit' name='form_submit' value='Add New Site' /></p>
</form>
</center>
</body>
</html>
