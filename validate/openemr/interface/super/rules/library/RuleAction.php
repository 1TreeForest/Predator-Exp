<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of RuleAction
 *
 * @author aron
 */
class RuleAction
{
    public $guid;
    public $id;
    public $category;
    public $categoryLbl;
    public $item;
    public $itemLbl;
    public $reminderLink;
    public $reminderMessage;
    public $customRulesInput;
    public $groupId;
    public $targetCriteria;

    public function __construct()
    {
    }

    public function getTitle()
    {
        return getLabel($this->category, 'rule_action_category') . " - " . getLabel($this->item, 'rule_action');
    }

    public function getCategoryLabel()
    {
        if (!$this->categoryLbl) {
            $this->categoryLbl = getLabel($this->category, 'rule_action_category');
        }

        return $this->categoryLbl;
    }

    public function getItemLabel()
    {
        if (!$this->itemLbl) {
            $this->itemLbl = getLabel($this->item, 'rule_action');
        }

        return $this->itemLbl;
    }
}
