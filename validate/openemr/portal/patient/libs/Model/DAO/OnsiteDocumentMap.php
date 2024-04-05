<?php

/** @package    Openemr::Model::DAO */

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

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * OnsiteDocumentMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the OnsiteDocumentDAO to the onsite_documents datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Openemr::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class OnsiteDocumentMap implements IDaoMap, IDaoMap2
{
    private static $KM;
    private static $FM;

    /**
     * {@inheritdoc}
     */
    public static function AddMap($property, FieldMap $map)
    {
        self::GetFieldMaps();
        self::$FM[$property] = $map;
    }

    /**
     * {@inheritdoc}
     */
    public static function SetFetchingStrategy($property, $loadType)
    {
        self::GetKeyMaps();
        self::$KM[$property]->LoadType = $loadType;
    }

    /**
     * {@inheritdoc}
     */
    public static function GetFieldMaps()
    {
        if (self::$FM == null) {
            self::$FM = array();
            self::$FM["Id"] = new FieldMap("Id", "onsite_documents", "id", true, FM_TYPE_INT, 10, null, true);
            self::$FM["Pid"] = new FieldMap("Pid", "onsite_documents", "pid", false, FM_TYPE_INT, 10, null, false);
            self::$FM["Facility"] = new FieldMap("Facility", "onsite_documents", "facility", false, FM_TYPE_INT, 10, null, false);
            self::$FM["Provider"] = new FieldMap("Provider", "onsite_documents", "provider", false, FM_TYPE_INT, 10, null, false);
            self::$FM["Encounter"] = new FieldMap("Encounter", "onsite_documents", "encounter", false, FM_TYPE_INT, 10, null, false);
            self::$FM["CreateDate"] = new FieldMap("CreateDate", "onsite_documents", "create_date", false, FM_TYPE_TIMESTAMP, null, "0000-00-00 00:00:00", false);
            self::$FM["DocType"] = new FieldMap("DocType", "onsite_documents", "doc_type", false, FM_TYPE_VARCHAR, 255, null, false);
            self::$FM["PatientSignedStatus"] = new FieldMap("PatientSignedStatus", "onsite_documents", "patient_signed_status", false, FM_TYPE_SMALLINT, 5, null, false);
            self::$FM["PatientSignedTime"] = new FieldMap("PatientSignedTime", "onsite_documents", "patient_signed_time", false, FM_TYPE_DATETIME, null, null, false);
            self::$FM["AuthorizeSignedTime"] = new FieldMap("AuthorizeSignedTime", "onsite_documents", "authorize_signed_time", false, FM_TYPE_DATETIME, null, null, false);
            self::$FM["AcceptSignedStatus"] = new FieldMap("AcceptSignedStatus", "onsite_documents", "accept_signed_status", false, FM_TYPE_SMALLINT, 5, null, false);
            self::$FM["AuthorizingSignator"] = new FieldMap("AuthorizingSignator", "onsite_documents", "authorizing_signator", false, FM_TYPE_VARCHAR, 50, null, false);
            self::$FM["ReviewDate"] = new FieldMap("ReviewDate", "onsite_documents", "review_date", false, FM_TYPE_DATETIME, null, null, false);
            self::$FM["DenialReason"] = new FieldMap("DenialReason", "onsite_documents", "denial_reason", false, FM_TYPE_VARCHAR, 255, null, false);
            self::$FM["AuthorizedSignature"] = new FieldMap("AuthorizedSignature", "onsite_documents", "authorized_signature", false, FM_TYPE_TEXT, null, null, false);
            self::$FM["PatientSignature"] = new FieldMap("PatientSignature", "onsite_documents", "patient_signature", false, FM_TYPE_TEXT, null, null, false);
            self::$FM["FullDocument"] = new FieldMap("FullDocument", "onsite_documents", "full_document", false, FM_TYPE_BLOB, null, null, false);
            self::$FM["FileName"] = new FieldMap("FileName", "onsite_documents", "file_name", false, FM_TYPE_VARCHAR, 255, null, false);
            self::$FM["FilePath"] = new FieldMap("FilePath", "onsite_documents", "file_path", false, FM_TYPE_VARCHAR, 255, null, false);
        }

        return self::$FM;
    }

    /**
     * {@inheritdoc}
     */
    public static function GetKeyMaps()
    {
        if (self::$KM == null) {
            self::$KM = array();
        }

        return self::$KM;
    }
}
