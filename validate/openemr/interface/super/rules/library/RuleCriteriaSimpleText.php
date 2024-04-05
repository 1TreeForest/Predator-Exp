<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of RuleCriteriaSimpleText
 *
 * @author aron
 */
abstract class RuleCriteriaSimpleText extends RuleCriteria
{
    public $title;
    public $value;

    public function __construct($title, $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    public function getRequirements()
    {
        return $this->value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getView()
    {
        return "simple_text_criteria.php";
    }

    public function updateFromRequest()
    {
        parent::updateFromRequest();
        $value = _post("fld_value");
        $this->value = $value;
    }
}
