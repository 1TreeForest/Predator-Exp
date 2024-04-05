<?php

/**
 * class X12Partner
 *
 */

class X12Partner extends ORDataObject
{
    public $id;
    public $name;
    public $id_number;
    public $x12_isa01; //
    public $x12_isa02; //
    public $x12_isa03; //
    public $x12_isa04; //
    public $x12_isa05; // Sender Interchange ID Qualifier. ZZ = mutually defined, 01 = Duns, etc.
    public $x12_sender_id;   // ISA06
    public $x12_isa07; // Receiver Interchange ID Qualifier.
    public $x12_receiver_id; // ISA08
    public $x12_isa14; // Acknowledgment Requested. 0 = No, 1 = Yes.
    public $x12_isa15; // Usage Indicator. T = testing, P = production.
    public $x12_gs02;  // Application Sender's Code. Default to ISA06.
    public $x12_per06; // The submitter's EDI Access Number, if any.
    public $x12_version;
    public $processing_format;
    public $processing_format_array;
    public $x12_gs03; // Application Sender's Code. If this isn't set then we will use the $x12_receiver_id(ISA08).

    /**
     * Constructor sets all Insurance attributes to their default value
     */

    public function __construct($id = "", $prefix = "")
    {
        parent::__construct();
        $this->id = $id;
        $this->_table = "x12_partners";
        $this->processing_format_array = $this->_load_enum("processing_format", false);
        $this->processing_format = $this->processing_format_array[0];
        //most recent x12 version mandated by HIPAA and CMS
        // $this->x12_version = "004010X098A1";
        $this->x12_version = "005010X222A1";
        $this->x12_isa05 = "ZZ";
        $this->x12_isa07 = "ZZ";
        $this->x12_isa14 = "0";
        if ($id != "") {
            $this->populate();
        }
    }

    public function x12_partner_factory()
    {
        $partners = array();
        $x = new X12Partner();
        $sql = "SELECT id FROM "  . $x->_table . " order by name";
        $result = $x->_db->Execute($sql);
        while ($result && !$result->EOF) {
            $partners[] = new X12Partner($result->fields['id']);
            $result->MoveNext();
        }

        return $partners;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        if (is_numeric($id)) {
            $this->id = $id;
        }
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_name($string)
    {
        $this->name = $string;
    }

    public function get_id_number()
    {
        return $this->id_number;
    }

    public function set_id_number($string)
    {
        $this->id_number = $string;
    }

    public function get_x12_sender_id()
    {
        return $this->x12_sender_id;
    }

    public function set_x12_sender_id($string)
    {
        $this->x12_sender_id = $string;
    }

    public function get_x12_receiver_id()
    {
        return $this->x12_receiver_id;
    }

    public function set_x12_receiver_id($string)
    {
        $this->x12_receiver_id = $string;
    }

    public function get_x12_version()
    {
        return $this->x12_version;
    }

    public function set_x12_version($string)
    {
        $this->x12_version = $string;
    }

    public function get_x12_isa01()
    {
        return $this->x12_isa01;
    }

    public function set_x12_isa01($string)
    {
        $this->x12_isa01 = $string;
    }

    public function get_x12_isa02()
    {
        return $this->x12_isa02;
    }

    public function set_x12_isa02($string)
    {
        $this->x12_isa02 = $string;
    }

    public function get_x12_isa03()
    {
        return $this->x12_isa03;
    }

    public function set_x12_isa03($string)
    {
        $this->x12_isa03 = $string;
    }

    public function get_x12_isa04()
    {
        return $this->x12_isa04;
    }

    public function set_x12_isa04($string)
    {
        $this->x12_isa04 = $string;
    }

    public function get_x12_isa05()
    {
        return $this->x12_isa05;
    }

    public function set_x12_isa05($string)
    {
        $this->x12_isa05 = $string;
    }

    public function get_x12_isa07()
    {
        return $this->x12_isa07;
    }

    public function set_x12_isa07($string)
    {
        $this->x12_isa07 = $string;
    }

    public function get_x12_isa14()
    {
        return $this->x12_isa14;
    }

    public function set_x12_isa14($string)
    {
        $this->x12_isa14 = $string;
    }

    public function get_x12_isa15()
    {
        return $this->x12_isa15;
    }

    public function set_x12_isa15($string)
    {
        $this->x12_isa15 = $string;
    }

    public function get_x12_gs02()
    {
        return $this->x12_gs02;
    }

    public function set_x12_gs02($string)
    {
        $this->x12_gs02 = $string;
    }

    public function get_x12_per06()
    {
        return $this->x12_per06;
    }

    public function set_x12_per06($string)
    {
        $this->x12_per06 = $string;
    }

    public function get_processing_format()
    {
        //this is enum so it can be string or int
        if (!is_numeric($this->processing_format)) {
            $ta = $this->processing_format_array;
            return $ta[$this->processing_format];
        }

        return $this->processing_format;
    }

    public function get_processing_format_array()
    {
        //flip it because normally it is an id to name lookup, for templates it needs to be a name to id lookup
        return array_flip($this->processing_format_array);
    }

    public function set_processing_format($string)
    {
        $this->processing_format = $string;
    }

    public function get_x12_gs03()
    {
        return $this->x12_gs03;
    }

    public function set_x12_gs03($string)
    {
        $this->x12_gs03 = $string;
    }

    public function get_x12_isa14_array()
    {
        return array(
        '0' => 'No',
        '1' => 'Yes',
        );
    }

    public function get_x12_isa15_array()
    {
        return array(
        'T' => 'Testing',
        'P' => 'Production',
        );
    }

    public function get_idqual_array()
    {
        return array(
        '01' => 'Duns (Dun & Bradstreet)',
        '14' => 'Duns Plus Suffix',
        '20' => 'Health Industry Number (HIN)',
        '27' => 'Carrier ID from HCFA',
        '28' => 'Fiscal Intermediary ID from HCFA',
        '29' => 'Medicare ID from HCFA',
        '30' => 'U.S. Federal Tax ID Number',
        '33' => 'NAIC Company Code',
        'ZZ' => 'Mutually Defined',
        );
    }

    public function get_x12_version_array()
    {
        return array(
        '005010X222A1' => '005010X222A1',
        '004010X098A1' => '004010X098A1',
        );
    }
}
