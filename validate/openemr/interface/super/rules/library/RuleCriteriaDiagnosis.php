<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of RuleCriteriaDiagnosis
 *
 * @author aron
 */
class RuleCriteriaDiagnosis extends RuleCriteria
{
    public $title;
    public $codeType;
    public $id;

    public function __construct($title, $codeType = '', $id = '')
    {
        $this->title = $title;
        $this->codeType = $codeType;
        $this->id = $id;
    }

    public function getRequirements()
    {
        $codeManager = new CodeManager();
        $code = $codeManager->get($this->id);
        if (is_null($code)) {
            return $this->codeType . ":" . $this->id;
        }

        return $code->display();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getView()
    {
        return "diagnosis.php";
    }

    public function getDbView()
    {
        $dbView = parent::getDbView();

        $dbView->method = "lists";
        $dbView->methodDetail = "medical_problem";
        $dbView->value = $this->codeType . "::" . $this->id;
        return $dbView;
    }

    public function updateFromRequest()
    {
        parent::updateFromRequest();
        $value = _post("fld_value");
        $exploded = explode(" ", $value);
        $diagInfo = explode(":", $exploded[0]);
        $this->codeType = $diagInfo[0];
        $this->id = $diagInfo[1];
    }
}
