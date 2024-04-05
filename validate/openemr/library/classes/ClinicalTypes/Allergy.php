<?php

// Copyright (C) 2011 Ken Chapple <ken@mi-squared.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
require_once('ClinicalType.php');

class Allergy extends ClinicalType
{
    public const DTAP_VAC = 'med_allergy_dtap_vac';
    public const IPV = 'med_allergy_ipv';
    public const NEOMYCIN = 'med_allergy_neomycin';
    public const STREPTOMYCIN = 'med_allergy_streptomycin';
    public const POLYMYXIN = 'med_allergy_polymyxin';
    public const HIB = 'med_allergy_hib';
    public const MUMPS_VAC = 'med_allergy_mumps_vac';
    public const MEASLES_VAC = 'med_allergy_measles_vac';
    public const RUBELLA_VAC = 'med_allergy_rubella_vac';
    public const MMR = 'med_allergy_mmr';
    public const BAKERS_YEAST = 'subst_allergy_bakers_yeast';
    public const VZV = 'med_allergy_vzv';
    public const PNEUM_VAC = 'med_allergy_pneum_vac';
    public const HEP_A_VAC = 'med_allergy_hep_a_vac';
    public const HEP_B_VAC = 'med_allergy_hep_b_vac';
    public const ROTAVIRUS_VAC = 'med_allergy_rotavirus_vac';
    public const INFLUENZA_VAC = 'med_allergy_flu_vac';
    public const INFLUENZA_IMMUN = 'med_allergy_flu_immun';
    public const EGGS = 'subst_allergy_eggs';

    public function getListType()
    {
        return 'allergy';
    }

    public function getListId()
    {
        return 'Clinical_Rules_Allergy_Types';
    }

    /*
     * 	Check to see if a patient had an allergy to THIS thing between $beginDate and $endDate
     * 	$beginDate and $endDate can be the same, indicating a check for allergy on particular date
     *
     * 	@param	(RsPatient) $patient	Patient to check
     * 	@param	(date) $beginDate		Lower bound on date to check for allergy
     * 	@param	(date) $endDate			Upper bound on date to check for allergy
     */
    public function doPatientCheck(RsPatient $patient, $beginDate = null, $endDate = null, $options = null)
    {
        $data = Codes::lookup($this->getOptionId());
        $type = $this->getListType();
        foreach ($data as $codeType => $codes) {
            foreach ($codes as $code) {
                if (exist_lists_item($patient->id, $type, $codeType.'::'.$code, $endDate)) {
                    return true;
                }
            }
        }

        return false;
    }
}
