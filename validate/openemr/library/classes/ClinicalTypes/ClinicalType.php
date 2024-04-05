<?php

// Copyright (C) 2011 Ken Chapple <ken@mi-squared.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
require_once(dirname(__FILE__) . "/../../clinical_rules.php");
require_once(dirname(__FILE__) . "/../../forms.inc");
require_once(dirname(__FILE__) . "/../../patient.inc");
require_once(dirname(__FILE__) . "/../../lists.inc");
require_once(dirname(__FILE__) . "/../rulesets/library/RsPatient.php");
require_once('codes.php');

abstract class ClinicalType
{
    public const ALLERGY = 'Allergy';
    public const CARE_GOAL = 'CareGoal';
    public const DIAGNOSIS = 'Diagnosis';
    public const ENCOUNTER = 'Encounter';
    public const MEDICATION = 'Medication';
    public const COMMUNICATION = 'Communication';
    public const CHARACTERISTIC = 'Characteristic';
    public const PHYSICAL_EXAM = 'PhysicalExam';
    public const LAB_RESULT = 'LabResult';

    private $_optionId;
    private $_title;
    private $_notes;

    public function __construct($optionId)
    {
        $this->_optionId = $optionId;
        $result = $this->getListOptionById($optionId);
        $this->_title = $result['title'];
        $this->_notes = $result['notes'];
    }

    /*
     * Check if this clinical type applies to this patient.
     *
     * @param (RsPatient) $patient
     * @param (date) $beginMeasurement
     * @param (date) $endMeasurement
     *
     * @return true if type applies, false ow
     */
    abstract public function doPatientCheck(RsPatient $patient, $beginDate = null, $endDate = null, $options = null);
    abstract public function getListId();

    public function getOptionId()
    {
        return $this->_optionId;
    }

    public function getNotes()
    {
        return $this->_notes;
    }

    public function getListOptions()
    {
        return array();
    }

    private function getListOptionById($id)
    {
        $query = "SELECT * " .
                 "FROM `list_options` " .
                 "WHERE list_id = ? " .
                 "AND option_id = ? AND activity = 1";
        $results = sqlStatement($query, array( $this->getListId(), $id ));
        $arr = sqlFetchArray($results);
        return $arr;
    }
}
