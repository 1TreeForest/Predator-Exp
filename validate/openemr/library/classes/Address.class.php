<?php
/************************************************************************
            address.php - Copyright duhlman

/usr/share/apps/umbrello/headings/heading.php

This file was generated on %date% at %time%
The original location of this file is /home/duhlman/uml-generated-code/prescription.php
**************************************************************************/

/**
 * class Address
 *
 */
class Address extends ORDataObject
{
    public $id;
    public $foreign_id;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $zip;
    public $plus_four;
    public $country;

    /**
     * Constructor sets all Address attributes to their default value
     */
    public function __construct($id = "", $foreign_id = "")
    {
        $this->id = $id;
        $this->foreign_id = $foreign_id;
        $this->_table = "addresses";
        $this->line1 = "";
        $this->line2 = "";
        $this->city = "";
        $this->state = "";
        $this->zip = "";
        $this->plus_four = "";
        $this->country = "USA";
        if ($id != "") {
            $this->populate();
        }
    }
    public static function factory_address($foreign_id = "")
    {
        if (empty($foreign_id)) {
            $foreign_id = "like '%'";
        } else {
            $foreign_id = " = '" . add_escape_custom(strval($foreign_id)) . "'";
        }

        $a = new Address();
        $sql = "SELECT id FROM  " . $a->_table . " WHERE foreign_id " .$foreign_id ;
        //echo $sql . "<bR />";
        $results = sqlQ($sql);
        //echo "sql: $sql";
        $row = sqlFetchArray($results);
        if (!empty($row)) {
            $a = new Address($row['id']);
        }

        return $a;
    }

    public function toString($html = false)
    {
        $string .= "\n"
        . "ID: " . $this->id."\n"
        . "FID: " . $this->foreign_id."\n"
        .$this->line1 . "\n"
        .$this->line2 . "\n"
        .$this->city . ", " . strtoupper($this->state) . " " . $this->zip . "-" . $this->plus_four. "\n"
        .$this->country. "\n";

        if ($html) {
            return nl2br($string);
        } else {
            return $string;
        }
    }

    public function set_id($id)
    {
        $this->id = $id;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function set_foreign_id($fid)
    {
        $this->foreign_id = $fid;
    }
    public function get_foreign_id()
    {
        return $this->foreign_id;
    }
    public function set_line1($line1)
    {
        $this->line1 = $line1;
    }
    public function get_line1()
    {
        return $this->line1;
    }
    public function set_line2($line2)
    {
        $this->line2 = $line2;
    }
    public function get_line2()
    {
        return $this->line2;
    }
    public function get_lines_display()
    {
        $string .= $this->get_line1();
        $string .= " " . $this->get_line2();
        return $string;
    }
    public function set_city($city)
    {
        $this->city = $city;
    }
    public function get_city()
    {
        return $this->city;
    }
    public function set_state($state)
    {
        $this->state = strtoupper($state);
    }
    public function get_state()
    {
        return $this->state;
    }
    public function set_zip($zip)
    {
        $this->zip = $zip;
    }
    public function get_zip()
    {
        return $this->zip;
    }
    public function set_plus_four($plus_four)
    {
        $this->plus_four = $plus_four;
    }
    public function get_plus_four()
    {
        return $this->plus_four;
    }
    public function set_country($country)
    {
        $this->country = $country;
    }
    public function get_country()
    {
        return $this->country;
    }
    public function persist($fid = "")
    {
        if (!empty($fid)) {
            $this->foreign_id = $fid;
        }

        parent::persist();
    }
} // end of Address
/*
$a = new Address("0");

echo $a->toString(true);*/
