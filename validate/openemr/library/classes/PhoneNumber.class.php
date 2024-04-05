<?php
/************************************************************************
            phone_number.php - Copyright duhlman

/usr/share/apps/umbrello/headings/heading.php

This file was generated on %date% at %time%
The original location of this file is /home/duhlman/uml-generated-code/prescription.php
**************************************************************************/

define("TYPE_HOME", 1);
define("TYPE_WORK", 2);
define("TYPE_CELL", 3);
define("TYPE_EMERGENCY", 4);
define("TYPE_FAX", 5);


/**
 * class Address
 *
 */
class PhoneNumber extends ORDataObject
{
    public $id;
    public $foreign_id;
    public $country_code;
    public $area_code;
    public $prefix;
    public $number;
    public $type_array = array("","Home", "Work", "Cell" , "Emergency" , "Fax");

    /**
     * Constructor sets all Prescription attributes to their default value
     */
    public function __construct($id = "", $foreign_id = "")
    {
        $this->id = $id;
        $this->foreign_id = $foreign_id;
        $this->country_code = "+1";
        $this->prefix = "";
        $this->number = "";
        $this->type = TYPE_HOME;
        $this->_table = "phone_numbers";
        if ($id != "") {
            $this->populate();
        }
    }

    public static function factory_phone_numbers($foreign_id = "")
    {
        if (empty($foreign_id)) {
            $foreign_id = "like '%'";
        } else {
            $foreign_id = " = '" . add_escape_custom(strval($foreign_id)) . "'";
        }

        $phone_numbers = array();
        $p = new PhoneNumber();
        $sql = "SELECT id FROM  " . $p->_table . " WHERE foreign_id " .$foreign_id . " ORDER BY type";
        //echo $sql . "<bR />";
        $results = sqlQ($sql);
        //echo "sql: $sql";
        while ($row = sqlFetchArray($results)) {
            $phone_numbers[] = new PhoneNumber($row['id']);
        }

        return $phone_numbers;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function foreign_id($id)
    {
        $this->foreign_id = $id;
    }

    public function get_foreign_id()
    {
        return $this->foreign_id;
    }

    public function set_country_code($ccode)
    {
        $this->country_code = $ccode;
    }

    public function get_country_code()
    {
        return $this->country_code;
    }
    public function set_area_code($acode)
    {
        $this->area_code = $acode;
    }

    public function get_area_code()
    {
        return $this->area_code;
    }

    public function set_number($num)
    {
        $this->number = $num;
    }

    public function get_number()
    {
        return $this->number;
    }


    public function set_type($type)
    {
        $this->type = $type;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_prefix($prefix)
    {
        $this->prefix = $prefix;
    }

    public function get_prefix()
    {
        return $this->prefix;
    }

    public function get_phone_display()
    {
        if (is_numeric($this->area_code) && is_numeric($this->prefix) && is_numeric($this->number)) {
            // return  "(" . $this->area_code . ") " . $this->prefix . "-" . $this->number;
            return  $this->area_code . "-" . $this->prefix . "-" . $this->number;
        }

        return "";
    }

    public function set_phone($num)
    {
        if (strlen($num) == 10 && is_numeric($num)) {
            $this->area_code = substr($num, 0, 3);
            $this->prefix = substr($num, 3, 3);
            $this->number = substr($num, 6, 4);
        } elseif (strlen($num) == 12) {
            $nums = explode("-", $num);
            if (count($nums) == 3) {
                $this->area_code = $nums[0];
                $this->prefix = $nums[1];
                $this->number = $nums[2];
            }
        } elseif (strlen($num) == 14 && substr($num, 0, 1) == "(") {
            $nums[0] = substr($num, 1, 3);
            $nums[1] = substr($num, 6, 3);
            $nums[2] = substr($num, 10, 4);

            foreach ($nums as $n) {
                if (!is_numeric($n)) {
                    return false;
                }
            }

            if (count($nums) == 3) {
                $this->area_code = $nums[0];
                $this->prefix = $nums[1];
                $this->number = $nums[2];
            }
        }
    }

    public function toString($html = false)
    {
        $string .= "\n"
        . "ID: " . $this->id."\n"
        . "FID: " . $this->foreign_id."\n"
        . $this->country_code . " (" . $this->area_code . ") " . $this->prefix . "-" . $this->number . " " . $this->type_array[$this->type];
        if ($html) {
            return nl2br($string);
        } else {
            return $string;
        }
    }

    public function persist($fid = "")
    {
        if (!empty($fid)) {
            $this->foreign_id = $fid;
        }

        parent::persist();
    }
} // end of PhoneNumber
/*$p = new PhoneNumber(1);
echo $p->toString();
$p = new PhoneNumber(true);

$ps = PhoneNumber::factory_phone_numbers(55);
foreach($ps as $p) {
    echo $p->toString(true);
}*/
