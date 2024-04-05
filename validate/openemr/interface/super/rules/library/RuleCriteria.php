<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of RuleCriteria
 *
 * @author aron
 */
abstract class RuleCriteria
{
    /**
     * if true, then criteria is optional; required otherwise
     * @var boolean
     */
    public $optional;

    /**
     * if true, then criteira is an inclusion; exclusion otherwise
     * @var boolean
     */
    public $inclusion = true;

    /**
     * @var string
     */
    public $interval;

    /**
     * @var TimeUnit
     */
    public $intervalType;

    /**
     * uniquely identifies this criteria
     * @var string
     */
    public $guid;

    /**
     *
     * @var RuleCriteriaType
     */
    public $criteriaType;

    public $groupId;

    public function getCharacteristics()
    {
        $characteristics = $this->optional ? xl("Optional") : xl("Required");
        $characteristics .= " ";
        $characteristics .= $this->inclusion ? xl("Inclusion") : xl("Exclusion");

        return $characteristics;
    }

    abstract public function getRequirements();

    abstract public function getTitle();

    abstract public function getView();

    public function getInterval()
    {
        if (is_null($this->interval) || is_null($this->intervalType)) {
            return null;
        }

        return xl($this->interval) . " x " . " "
             . xl($this->intervalType->lbl);
    }

    protected function getLabel($value, $list_id)
    {
        return getLabel($value, $list_id);
    }

    protected function getLayoutLabel($value, $form_id)
    {
        return getLayoutLabel($value, $form_id);
    }

    protected function decodeComparator($comparator)
    {
        switch ($comparator) {
            case "eq":
                return "";
                break;
            case "ne":
                return "!=";
                break;
            case "gt":
                return ">";
                break;
            case "lt":
                return "<";
                break;
            case "ge":
                return ">=";
                break;
            case "le":
                return "<=";
                break;
        }

        return "";
    }

    /**
     * @return RuleCriteriaDbView
     */
    public function getDbView()
    {
        $dbView = new RuleCriteriaDbView();
        $dbView->inclusion = $this->inclusion;
        $dbView->optional = $this->optional;
        $dbView->interval = $this->interval;
        $dbView->intervalType = $this->intervalType->code;

        return $dbView;
    }

    public function updateFromRequest()
    {
        $inclusion = "yes" ==  _post("fld_inclusion");
        $optional = "yes" == _post("fld_optional");
        $groupId = _post("group_id");
        $interval = _post("fld_target_interval");
        $intervalType = TimeUnit::from(_post("fld_target_interval_type"));

        $this->groupId = $groupId;
        $this->optional = $optional;
        $this->inclusion = $inclusion;
        $this->interval = $interval;
        $this->intervalType = $intervalType;
    }
}
