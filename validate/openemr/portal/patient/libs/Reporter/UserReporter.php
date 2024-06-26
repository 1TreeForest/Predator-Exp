<?php

/** @package    Openemr::Reporter */

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
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the User object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Openemr::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UserReporter extends Reporter
{
    // the properties in this class must match the columns returned by GetCustomQuery().
    // 'CustomFieldExample' is an example that is not part of the `users` table
    public $CustomFieldExample;

    public $Id;
    public $Username;
    public $Password;
    public $Authorized;
    public $Info;
    public $Source;
    public $Fname;
    public $Mname;
    public $Lname;
    public $Federaltaxid;
    public $Federaldrugid;
    public $Upin;
    public $Facility;
    public $FacilityId;
    public $SeeAuth;
    public $Active;
    public $Npi;
    public $Title;
    public $Specialty;
    public $Billname;
    public $Email;
    public $EmailDirect;
    public $EserUrl;
    public $Assistant;
    public $Organization;
    public $Valedictory;
    public $Street;
    public $Streetb;
    public $City;
    public $State;
    public $Zip;
    public $Street2;
    public $Streetb2;
    public $City2;
    public $State2;
    public $Zip2;
    public $Phone;
    public $Fax;
    public $Phonew1;
    public $Phonew2;
    public $Phonecell;
    public $Notes;
    public $CalUi;
    public $Taxonomy;
    public $SsiRelayhealth;
    public $Calendar;
    public $AbookType;
    public $PwdExpirationDate;
    public $PwdHistory1;
    public $PwdHistory2;
    public $DefaultWarehouse;
    public $Irnpool;
    public $StateLicenseNumber;
    public $NewcropUserRole;
    public $Cpoe;
    public $PhysicianType;

    /*
    * GetCustomQuery returns a fully formed SQL statement.  The result columns
    * must match with the properties of this reporter object.
    *
    * @see Reporter::GetCustomQuery
    * @param Criteria $criteria
    * @return string SQL statement
    */
    public static function GetCustomQuery($criteria)
    {
        $sql = "select
			'custom value here...' as CustomFieldExample
			,`users`.`id` as Id
			,`users`.`username` as Username
			,`users`.`password` as Password
			,`users`.`authorized` as Authorized
			,`users`.`info` as Info
			,`users`.`source` as Source
			,`users`.`fname` as Fname
			,`users`.`mname` as Mname
			,`users`.`lname` as Lname
			,`users`.`federaltaxid` as Federaltaxid
			,`users`.`federaldrugid` as Federaldrugid
			,`users`.`upin` as Upin
			,`users`.`facility` as Facility
			,`users`.`facility_id` as FacilityId
			,`users`.`see_auth` as SeeAuth
			,`users`.`active` as Active
			,`users`.`npi` as Npi
			,`users`.`title` as Title
			,`users`.`specialty` as Specialty
			,`users`.`billname` as Billname
			,`users`.`email` as Email
			,`users`.`email_direct` as EmailDirect
			,`users`.`url` as EserUrl
			,`users`.`assistant` as Assistant
			,`users`.`organization` as Organization
			,`users`.`valedictory` as Valedictory
			,`users`.`street` as Street
			,`users`.`streetb` as Streetb
			,`users`.`city` as City
			,`users`.`state` as State
			,`users`.`zip` as Zip
			,`users`.`street2` as Street2
			,`users`.`streetb2` as Streetb2
			,`users`.`city2` as City2
			,`users`.`state2` as State2
			,`users`.`zip2` as Zip2
			,`users`.`phone` as Phone
			,`users`.`fax` as Fax
			,`users`.`phonew1` as Phonew1
			,`users`.`phonew2` as Phonew2
			,`users`.`phonecell` as Phonecell
			,`users`.`notes` as Notes
			,`users`.`cal_ui` as CalUi
			,`users`.`taxonomy` as Taxonomy
			,`users`.`calendar` as Calendar
			,`users`.`abook_type` as AbookType
			,`users`.`pwd_expiration_date` as PwdExpirationDate
			,`users`.`pwd_history1` as PwdHistory1
			,`users`.`pwd_history2` as PwdHistory2
			,`users`.`default_warehouse` as DefaultWarehouse
			,`users`.`irnpool` as Irnpool
			,`users`.`state_license_number` as StateLicenseNumber
			,`users`.`newcrop_user_role` as NewcropUserRole
			,`users`.`cpoe` as Cpoe
			,`users`.`physician_type` as PhysicianType
		from `users`";

        // the criteria can be used or you can write your own custom logic.
        // be sure to escape any user input with $criteria->Escape()
        $sql .= $criteria->GetWhere();
        $sql .= $criteria->GetOrder();

        return $sql;
    }

    /*
    * GetCustomCountQuery returns a fully formed SQL statement that will count
    * the results.  This query must return the correct number of results that
    * GetCustomQuery would, given the same criteria
    *
    * @see Reporter::GetCustomCountQuery
    * @param Criteria $criteria
    * @return string SQL statement
    */
    public static function GetCustomCountQuery($criteria)
    {
        $sql = "select count(1) as counter from `users`";

        // the criteria can be used or you can write your own custom logic.
        // be sure to escape any user input with $criteria->Escape()
        $sql .= $criteria->GetWhere();

        return $sql;
    }
}
