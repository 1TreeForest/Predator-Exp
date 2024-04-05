<?php
/************************************************************************
            aptient.php - Copyright duhlman

/usr/share/apps/umbrello/headings/heading.php

This file was generated on %date% at %time%
The original location of this file is /home/duhlman/uml-generated-code/prescription.php
**************************************************************************/

/**
 * class Patient
 *
 */

class Patient extends ORDataObject
{
    public $id;
    public $pubpid;
    public $lname;
    public $mname;
    public $fname;
    public $date_of_birth;
    public $provider;

    /**
     * Constructor sets all Prescription attributes to their default value
     */
    public function __construct($id = "")
    {
        $this->id = $id;
        $this->_table = "patient_data";
        $this->pubpid = "";
        $this->lname = "";
        $this->mname = "";
        $this->fname = "";
        $this->dob   = "";
        $this->provider = new Provider();
        $this->populate();
    }
    public function populate()
    {
        if (!empty($this->id)) {
            $res = sqlQuery("SELECT providerID,fname,lname,mname ".
                                        ", DATE_FORMAT(DOB,'%m/%d/%Y') as date_of_birth ".
                                        ", pubpid ".
                                        " from " . $this->_table ." where pid =". add_escape_custom($this->id));
            if (is_array($res)) {
                $this->pubpid = $res['pubpid'];
                $this->lname = $res['lname'];
                $this->mname = $res['mname'];
                $this->fname = $res['fname'];
                $this->provider = new Provider($res['providerID']);
                $this->date_of_birth = $res['date_of_birth'];
            }
        }
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_pubpid()
    {
        return $this->pubpid;
    }
    public function get_lname()
    {
        return $this->lname;
    }
    public function get_name_display()
    {
        return $this->fname . " " . $this->lname;
    }
    public function get_provider_id()
    {
        return $this->provider->id;
    }
    public function get_provider()
    {
        return $this->provider;
    }
    public function get_dob()
    {
        return $this->date_of_birth;
    }
} // end of Patient
