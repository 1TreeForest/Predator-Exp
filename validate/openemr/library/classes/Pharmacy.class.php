<?php
/************************************************************************
            pharmacy.php - Copyright duhlman

/usr/share/apps/umbrello/headings/heading.php

This file was generated on %date% at %time%
The original location of this file is /home/duhlman/uml-generated-code/prescription.php
**************************************************************************/


define("TRANSMIT_PRINT", 1);
define("TRANSMIT_EMAIL", 2);
define("TRANSMIT_FAX", 3);

/**
 * class Pharmacy
 *
 */
class Pharmacy extends ORDataObject
{
    public $id;
    public $name;
    public $phone_numbers;
    public $address;
    public $transmit_method;
    public $email;
    public $transmit_method_array; //set in constructor

    /**
     * Constructor sets all Prescription attributes to their default value
     */
    public function __construct($id = "", $prefix = "")
    {
        $this->id = $id;
        $this->name = "";
        $this->email = "";
        $this->transmit_method = 1;
        $this->transmit_method_array = array(xl("None Selected"), xl("Print"), xl("Email"), xl("Fax"));
        $this->_table = "pharmacies";
        $phone  = new PhoneNumber();
        $phone->set_type(TYPE_WORK);
        $this->phone_numbers = array($phone);
        $this->address = new Address();
        if ($id != "") {
            $this->populate();
        }
    }

    public function set_id($id = "")
    {
        $this->id = $id;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function set_form_id($id = "")
    {
        if (!empty($id)) {
            $this->populate($id);
        }
    }
    public function set_fax_id($id)
    {
        $this->id = $id;
    }
    public function set_address($aobj)
    {
        $this->address = $aobj;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function set_address_line1($line)
    {
        $this->address->set_line1($line);
    }
    public function set_address_line2($line)
    {
        $this->address->set_line2($line);
    }
    public function set_city($city)
    {
        $this->address->set_city($city);
    }
    public function set_state($state)
    {
        $this->address->set_state($state);
    }
    public function set_zip($zip)
    {
        $this->address->set_zip($zip);
    }

    public function set_name($name)
    {
        $this->name = $name;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function set_npi($npi)
    {
        $this->npi = $npi;
    }
    public function get_npi()
    {
        return $this->npi;
    }
    public function set_ncpdp($ncpdp)
    {
        $this->ncpdp = $ncpdp;
    }
    public function get_ncpdp()
    {
        return $this->ncpdp;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function set_transmit_method($tm)
    {
        $this->transmit_method = $tm;
    }
    public function get_transmit_method()
    {
        if ($this->transmit_method == TRANSMIT_EMAIL && empty($this->email)) {
            return TRANSMIT_PRINT;
        }

        return $this->transmit_method;
    }
    public function get_transmit_method_display()
    {
        return $this->transmit_method_array[$this->transmit_method];
    }
    public function get_phone()
    {
        foreach ($this->phone_numbers as $phone) {
            if ($phone->type == TYPE_WORK) {
                return $phone->get_phone_display();
            }
        }

        return "";
    }
    public function _set_number($num, $type)
    {
        $found = false;
        for ($i = 0; $i < count($this->phone_numbers); $i++) {
            if ($this->phone_numbers[$i]->type == $type) {
                $found = true;
                $this->phone_numbers[$i]->set_phone($num);
            }
        }

        if ($found == false) {
            $p = new PhoneNumber("", $this->id);
            $p->set_type($type);
            $p->set_phone($num);
            $this->phone_numbers[] = $p;
            //print_r($this->phone_numbers);
            //echo "num is now:" . $p->get_phone_display()  . "<br />";
        }
    }

    public function set_phone($phone)
    {
        $this->_set_number($phone, TYPE_WORK);
    }
    public function set_fax($fax)
    {
        $this->_set_number($fax, TYPE_FAX);
    }

    public function get_fax()
    {
        foreach ($this->phone_numbers as $phone) {
            if ($phone->type == TYPE_FAX) {
                return $phone->get_phone_display();
            }
        }

        return "";
    }
    public function populate()
    {
        parent::populate();
        $this->address = Address::factory_address($this->id);
        $this->phone_numbers = PhoneNumber::factory_phone_numbers($this->id);
    }

    public function persist()
    {
        parent::persist();
        $this->address->persist($this->id);
        foreach ($this->phone_numbers as $phone) {
            $phone->persist($this->id);
        }
    }

    public function utility_pharmacy_array()
    {
        $pharmacy_array = array();
        $sql = "Select p.id, p.name, a.city, a.state from " . $this->_table ." as p INNER JOIN addresses as a on  p.id = a.foreign_id";
        $res = sqlQ($sql);
        while ($row = sqlFetchArray($res)) {
            $d_string = $row['city'];
            if (!empty($row['city']) && $row['state']) {
                $d_string .= ", ";
            }

            $d_string .=  $row['state'];
            $pharmacy_array[strval($row['id'])] = $row['name'] . " " . $d_string;
        }

        return ($pharmacy_array);
    }

    public function pharmacies_factory($city = "", $sort = "ORDER BY name")
    {
        if (empty($city)) {
            $city = "";
        } else {
            $city = " WHERE city = " . add_escape_custom($foreign_id);
        }

        $p = new Pharmacy();
        $pharmacies = array();
        $sql = "SELECT p.id, a.city FROM  " . $p->_table . " as p INNER JOIN addresses as a on p.id = a.foreign_id " .$city . " " . add_escape_custom($sort);

        //echo $sql . "<bR />";
        $results = sqlQ($sql);
        //echo "sql: $sql";
        //print_r($results);
        while ($row = sqlFetchArray($results)) {
            $pharmacies[] = new Pharmacy($row['id']);
        }

        return $pharmacies;
    }

    public function toString($html = false)
    {
        $string .= "\n"
        . "ID: " . $this->id."\n"
        . "Name: " . $this->name ."\n"
        . "Phone: " . $this->phone_numbers[0]->toString($html) . "\n"
        . "Email:" . $this->email . "\n"
        . "Address: " . $this->address->toString($html) . "\n"
        . "Method: " . $this->transmit_method_array[$this->transmit_method];

        if ($html) {
            return nl2br($string);
        } else {
            return $string;
        }
    }
} // end of Pharmacy
/*$p = new Pharmacy("1");
echo $p->toString(true);
*/
