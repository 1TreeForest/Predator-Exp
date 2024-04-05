<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of RuleCriteriaType
 *
 * @author aron
 */
class RuleCriteriaType
{
    // codes
    public const ageMin = "age_min";
    public const ageMax = "age_max";
    public const sex = "sex";
    public const diagnosis = "diagnosis";
    public const issue = "issue";
    public const medication = "medication";
    public const allergy = "allergy";
    public const surgery = "surgery";
    public const lifestyle = "lifestyle";
    public const custom = "custom";
    public const custom_bucket = "custom_bucket";

    public $code;
    public $lbl;
    public $method;

    public function __construct($code, $lbl, $method)
    {
        $this->lbl = $lbl;
        $this->code = $code;
        $this->method = $method;
    }

    /**
     *
     * @param string $value
     * @return RuleCriteriaType
     */
    public static function from($code)
    {
        $map = self::map();
        return $map[$code];
    }

    public static function values()
    {
        $map = self::map();
        return array_keys($map);
    }

    private static function map()
    {
        $map = array(
            self::ageMin   =>  new RuleCriteriaType(self::ageMin, xl('Age min'), 'age_min'),
            self::ageMax   =>  new RuleCriteriaType(self::ageMax, xl('Age max'), 'age_max'),
            self::sex       =>  new RuleCriteriaType(self::sex, xl('Sex'), 'sex'),

            self::issue     =>  new RuleCriteriaType(self::issue, xl('Medical issue'), 'lists'),
            self::diagnosis =>  new RuleCriteriaType(self::diagnosis, xl('Diagnosis'), 'lists'),
            self::medication =>  new RuleCriteriaType(self::medication, xl('Medication'), 'lists'),
            self::allergy   =>  new RuleCriteriaType(self::allergy, xl('Allergy'), 'lists'),
            self::surgery   =>  new RuleCriteriaType(self::surgery, xl('Surgery'), 'lists'),

            self::lifestyle =>  new RuleCriteriaType(self::lifestyle, xl('Lifestyle'), 'database'),
            self::custom    =>  new RuleCriteriaType(self::custom, xl('Custom Table'), 'database'),
            self::custom_bucket  =>  new RuleCriteriaType(self::custom_bucket, xl('Custom'), 'database')
        );
        return $map;
    }
}
