<?php
/************************************************************************
            pharmacy.php - Copyright duhlman

/usr/share/apps/umbrello/headings/heading.php

This file was generated on %date% at %time%
The original location of this file is /home/duhlman/uml-generated-code/prescription.php
**************************************************************************/

/**
 * class Person
 *
 */
class Person
{
    public $id;
    public $last_name;
    public $first_name;
    public $user_name;

    /**
     * Constructor sets all Prescription attributes to their default value
     */
    public function __construct($id = "", $prefix = "")
    {
        $this->id = $id;
    }

    public function populate()
    {
    }
} // end of Person
