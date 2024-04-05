<?php

// Copyright (C) 2010-2011 Aron Racho <aron@mi-squred.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

/**
 * Description of ReminderIntervalDetail
 *
 * @author aron
 */
class ReminderIntervalDetail
{
    /**
     *
     * @var ReminderIntervalType
     */
    public $intervalType;
    /**
     *
     * @var ReminderIntervalRange
     */
    public $intervalRange;
    public $amount;
    /**
     *
     * @var TimeUnit
     */
    public $timeUnit;

    /**
     *
     * @param ReminderIntervalType $type
     * @param ReminderIntervalRange $range
     * @param integer $amount
     * @param TimeUnit $unit
     */
    public function __construct($type, $range, $amount, $unit)
    {
        $this->intervalType = $type;
        $this->intervalRange = $range;
        $this->amount = $amount;
        $this->timeUnit = $unit;
    }

    public function display()
    {
        $display = xl($this->intervalRange->lbl) . ": "
                 . xl($this->amount) . " " . xl($this->timeUnit->lbl);
        return $display;
    }
}
