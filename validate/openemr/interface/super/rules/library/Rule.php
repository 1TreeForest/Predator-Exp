<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * This is the primary domain object representing a rule in the rules engine.
 * Rules are composed of:
 * - one or more rule types (see RuleType enum)
 * - a ReminderIntervals object
 * - a RuleFilters object
 * - a RuleTargets object
 * - a RuleActions object
 *
 * Rules are typically assembled by the RuleManager.
 * @author aron
 */
class Rule
{
    public $ruleTypes;
    public $id;
    public $title;
    public $developer;
    public $funding_source;
    public $release;
    public $web_ref;
    /**
     * @var ReminderIntervals
     */
    public $reminderIntervals;

    /**
     * @var RuleFilters
     */
    public $filters;

    /**
     * @var RuleTargetActionGroups
     */
    public $groups;

    public function __construct($id = '', $title = '', $ruleTypes = array())
    {
        $this->id = $id;
        $this->title = $title;
        $this->ruleTypes = $ruleTypes;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDeveloper($s)
    {
        $this->developer = $s;
    }

    public function setFunding($s)
    {
        $this->funding_source = $s;
    }

    public function setRelease($s)
    {
        $this->release = $s;
    }

    public function setWeb_ref($s)
    {
        $this->web_ref = $s;
    }

    /**
     * @param RuleType $ruleType
     */
    public function addRuleType($ruleType)
    {
        if (!$this->hasRuleType($ruleType)) {
            array_push($this->ruleTypes, $ruleType->code);
        }
    }

    /**
     *
     * @param RuleType $ruleType
     * @return boolean
     */
    public function hasRuleType($ruleType)
    {
        foreach ($this->ruleTypes as $type) {
            if ($type == $ruleType->code) {
                return true;
            }
        }

        return false;
    }

    public function isActiveAlert()
    {
        return $this->hasRuleType(RuleType::from(RuleType::ActiveAlert));
    }

    public function isPassiveAlert()
    {
        return $this->hasRuleType(RuleType::from(RuleType::PassiveAlert));
    }

    public function isCqm()
    {
        return $this->hasRuleType(RuleType::from(RuleType::CQM));
    }

    public function isAmc()
    {
        return $this->hasRuleType(RuleType::from(RuleType::AMC));
    }

    public function isReminder()
    {
        return $this->hasRuleType(RuleType::from(RuleType::PatientReminder));
    }

    /**
     * @param ReminderIntervals $reminderIntervals
     */
    public function setReminderIntervals($reminderIntervals)
    {
        $this->reminderIntervals = $reminderIntervals;
    }

    /**
     *
     * @param RuleFilters $ruleFilters
     */
    public function setRuleFilters($ruleFilters)
    {
        $this->filters = $ruleFilters;
    }

    public function setGroups(array $groups)
    {
        $this->groups = $groups;
    }

    /**
     *
     * @param RuleTargets $ruleTargets
     */
    public function setRuleTargets($ruleTargets)
    {
        $this->targets = $ruleTargets;
    }

    /**
     * @param RuleActions $actions
     */
    public function setRuleActions($actions)
    {
        $this->actions = $actions;
    }

    public function isEditable()
    {
        return true;
    }

    public function getRuleTypeLabels()
    {
        $labels = array();
        foreach ($this->ruleTypes as $ruleType) {
            array_push($labels, RuleType::from($ruleType)->lbl);
        }

        return $labels;
    }
}
