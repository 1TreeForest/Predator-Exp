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


require_once("../interface/globals.php");

if ($_POST['mode'] == 'get') {
    echo file_get_contents($_POST['docid']);
    exit;
} elseif ($_POST['mode'] == 'save') {
    file_put_contents($_POST['docid'], $_POST['content']);
    exit(true);
} elseif ($_POST['mode'] == 'delete') {
    unlink($_POST['docid']);
    exit(true);
}

// so it is an import
if (!isset($_POST['up_dir'])) {
    define("UPLOAD_DIR", $GLOBALS['OE_SITE_DIR'] .  '/documents/onsite_portal_documents/templates/');
} else {
    if ($_POST['up_dir'] > 0) {
        define("UPLOAD_DIR", $GLOBALS['OE_SITE_DIR'] .  '/documents/onsite_portal_documents/templates/'. $_POST['up_dir'] . '/');
    } else {
        define("UPLOAD_DIR", $GLOBALS['OE_SITE_DIR'] .  '/documents/onsite_portal_documents/templates/');
    }
}

if (!empty($_FILES["tplFile"])) {
    $tplFile = $_FILES["tplFile"];

    if ($tplFile["error"] !== UPLOAD_ERR_OK) {
        header("refresh:2;url= import_template_ui.php");
        echo "<p>". xlt("An error occurred: Missing file to upload: Use back button!") . "</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $tplFile["name"]);
    $parts = pathinfo($name);
    $name = $parts["filename"].'.tpl';
    // don't overwrite an existing file
    while (file_exists(UPLOAD_DIR . $name)) {
        $i = rand(0, 128);
        $newname = $parts["filename"] . "-" . $i . "." . $parts["extension"].".replaced";
        rename(UPLOAD_DIR .$name, UPLOAD_DIR .$newname);
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($tplFile["tmp_name"], UPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>". xlt("Unable to save file: Use back button!") . "</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
    header("location: " . $_SERVER['HTTP_REFERER']);
}
