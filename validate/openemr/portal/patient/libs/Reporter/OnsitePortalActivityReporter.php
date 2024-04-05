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
 * This is an example Reporter based on the OnsitePortalActivity object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Openemr::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class OnsitePortalActivityReporter extends Reporter
{
    // the properties in this class must match the columns returned by GetCustomQuery().
    // 'CustomFieldExample' is an example that is not part of the `onsite_portal_activity` table
    public $CustomFieldExample;

    public $Id;
    public $Date;
    public $PatientId;
    public $Activity;
    public $RequireAudit;
    public $PendingAction;
    public $ActionTaken;
    public $Status;
    public $Narrative;
    public $TableAction;
    public $TableArgs;
    public $ActionUser;
    public $ActionTakenTime;
    public $Checksum;

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
			,`onsite_portal_activity`.`id` as Id
			,`onsite_portal_activity`.`date` as Date
			,`onsite_portal_activity`.`patient_id` as PatientId
			,`onsite_portal_activity`.`activity` as Activity
			,`onsite_portal_activity`.`require_audit` as RequireAudit
			,`onsite_portal_activity`.`pending_action` as PendingAction
			,`onsite_portal_activity`.`action_taken` as ActionTaken
			,`onsite_portal_activity`.`status` as Status
			,`onsite_portal_activity`.`narrative` as Narrative
			,`onsite_portal_activity`.`table_action` as TableAction
			,`onsite_portal_activity`.`table_args` as TableArgs
			,`onsite_portal_activity`.`action_user` as ActionUser
			,`onsite_portal_activity`.`action_taken_time` as ActionTakenTime
			,`onsite_portal_activity`.`checksum` as Checksum
		from `onsite_portal_activity`";

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
        $sql = "select count(1) as counter from `onsite_portal_activity`";

        // the criteria can be used or you can write your own custom logic.
        // be sure to escape any user input with $criteria->Escape()
        $sql .= $criteria->GetWhere();

        return $sql;
    }
}
