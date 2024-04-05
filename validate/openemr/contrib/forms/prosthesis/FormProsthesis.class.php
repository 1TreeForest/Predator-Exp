<?php




/**
 * class Prosthesis
 *
 */
class FormProsthesis extends ORDataObject
{
    /**
     *
     * @access public
     */



    /**
     *
     * @access private
     */

    public $id;
    public $date;
    public $pid;
    public $activity;
    public $therapist;
    public $involvement_left;
    public $involvement_right;
    public $involvement_bilateral;
    public $location;
    public $location_array = array("office" => "Office", "home" => "Home", "skilled_nurse_fac" => "Skilled Nurs. Fac.", "acute_hospital" => "Acute Hosp.",
                        "nursing_home" => "Nursing Home", "rehab_hospital" => "Rehab. Hosp.", "other" => "Other");
    public $diagnosis;
    public $hx;
    public $worn_le_past_five;
    public $model;
    public $size;
    public $new;
    public $replacement;
    public $foam_impressions;
    public $shoe_size;
    public $calf;
    public $ankle;
    public $purpose;
    public $purpose_array  = array("pain_reduction" => "Pain Reduction", "offload_involved_area" => "Offload invloved Area", "immobilize" => "Immobilize",
                        "limit_motion" => "Limit Motion", "accomodation" => "Accomodation", "reduce_edema" => "Reduce Edema",
                        "facilitate_healing" => "Facilitate Healing", "other" => "Other");
    public $notes;
    public $goals_discussed;
    public $use_reviewed;
    public $wear_reviewed;
    public $worn_years;
    public $age_months;
    public $age_years;
    public $wear_hours;
    public $plan_to_order;
    public $plan_to_order_date;
    public $receiveded_product;
    public $received_product_date;
    public $given_instructions;
    public $patient_understands;

    public $cpt_array = array( "L0500" => "L0500 LS corset",           "L3010" => "L3010 Molded FO",           "L3020" => "L3020 Molded FO + Met pad",
                            "L3221" => "L3221 Men's depth shoes",   "L3216" => "L3216 Women's depth shoes", "L3332" => "L3332 In-shoe .5\" heel lift",
                            "L8100" => "L8100 BK comp hose (20-30mmHg)","L8110" => "L8110 BK comp hose (30-40mmHg)", "L8130" => "L8130 AK comp hose (20-30mmHg)",
                            "L8140" => "L8140 AK comp hose (30-40mmHg)");


    /**
     * Constructor sets all Form attributes to their default value
     */

    public function __construct($id = "", $_prefix = "")
    {
        parent::__construct();

        if (is_numeric($id)) {
            $this->id = $id;
        } else {
            $id = "";
        }

        $this->_table = "form_prosthesis";
        $this->date = date("Y-m-d H:i:s");
        $this->activity = 1;
        $this->pid = $GLOBALS['pid'];
        if ($id != "") {
            $this->populate();
        }
    }

    public function __toString()
    {
        return "ID: " . $this->id . "\n";
    }

    public function set_id($id)
    {
        if (!empty($id) && is_numeric($id)) {
            $this->id = $id;
        }
    }
    public function get_id()
    {
        return $this->id;
    }
    public function set_pid($pid)
    {
        if (!empty($pid) && is_numeric($pid)) {
            $this->pid = $pid;
        }
    }
    public function get_pid()
    {
        return $this->pid;
    }
    public function set_activity($tf)
    {
        if (!empty($tf) && is_numeric($tf)) {
            $this->activity = $tf;
        }
    }
    public function get_activity()
    {
        return $this->activity;
    }

    public function set_therapist($string)
    {
        $this->therapist = $string;
    }

    public function get_therapist()
    {
        return $this->therapist;
    }

    public function set_involvement_left($tf)
    {
        $this->involvement_left = $tf;
    }

    public function get_involvement_left()
    {
        return $this->involvement_left;
    }

    public function set_involvement_right($tf)
    {
        $this->involvement_right = $tf;
    }

    public function get_involvement_right()
    {
        return $this->involvement_right;
    }

    public function set_involvement_bilateral($tf)
    {
        $this->involvement_bilateral = $tf;
    }

    public function get_involvement_bilateral()
    {
        return $this->involvement_bilateral;
    }

    public function set_location($string)
    {
        $this->location = $string;
    }

    public function get_location()
    {
        return $this->location;
    }
    public function set_diagnosis($string)
    {
        $this->diagnosis = $string;
    }

    public function get_diagnosis()
    {
        return $this->diagnosis;
    }
    public function set_hx($string)
    {
        $this->hx = $string;
    }

    public function get_hx()
    {
        return $this->hx;
    }

    public function set_worn_le_past_five($tf)
    {
        $this->worn_le_past_five = $tf;
    }

    public function get_worn_le_past_five()
    {
        return $this->worn_le_past_five;
    }

    public function set_model($string)
    {
        $this->model = $string;
    }

    public function get_model()
    {
        return $this->model;
    }

    public function set_new($tf)
    {
        $this->new = $tf;
    }

    public function get_new()
    {
        return $this->new;
    }

    public function set_size($string)
    {
        $this->size = $string;
    }

    public function get_size()
    {
        return $this->size;
    }

    public function set_replacement($tf)
    {
        $this->replacement = $tf;
    }

    public function get_replacement()
    {
        return $this->replacement;
    }

    public function set_foam_impressions($tf)
    {
        $this->foam_impressions = $tf;
    }

    public function get_foam_impressions()
    {
        return $this->foam_impressions;
    }

    public function set_shoe_size($string)
    {
        $this->shoe_size = $string;
    }

    public function get_shoe_size()
    {
        return $this->shoe_size;
    }
    public function set_calf($string)
    {
        $this->calf = $string;
    }

    public function get_calf()
    {
        return $this->calf;
    }
    public function set_ankle($string)
    {
        $this->ankle = $string;
    }

    public function get_ankle()
    {
        return $this->ankle;
    }

    public function set_purpose($string)
    {
        $this->purpose = $string;
    }

    public function get_purpose()
    {
        return $this->purpose;
    }
    public function set_purpose_other($string)
    {
        $this->purpose_other = $string;
    }

    public function get_purpose_other()
    {
        return $this->purpose_other;
    }

    public function set_notes($string)
    {
        $this->notes = $string;
    }

    public function get_notes()
    {
        return $this->notes;
    }
    public function set_goals_discussed($tf)
    {
        $this->goals_discussed = $tf;
    }

    public function get_goals_discussed()
    {
        return $this->goals_discussed;
    }

    public function set_use_reviewed($tf)
    {
        $this->use_reviewed = $tf;
    }

    public function get_use_reviewed()
    {
        return $this->use_reviewed;
    }

    public function set_wear_reviewed($tf)
    {
        $this->wear_reviewed = $tf;
    }

    public function get_wear_reviewed()
    {
        return $this->wear_reviewed;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function set_worn_years($string)
    {
        $this->worn_years = $string;
    }

    public function get_worn_years()
    {
        return $this->worn_years;
    }
    public function set_age_months($string)
    {
        $this->age_months = $string;
    }

    public function get_age_months()
    {
        return $this->age_months;
    }
    public function set_age_years($string)
    {
        $this->age_years = $string;
    }

    public function get_age_years()
    {
        return $this->age_years;
    }
    public function set_wear_hours($string)
    {
        $this->wear_hours = $string;
    }

    public function get_wear_hours()
    {
        return $this->wear_hours;
    }

    public function set_plan_to_order($tf)
    {
        $this->plan_to_order = $tf;
    }

    public function get_plan_to_order()
    {
        return $this->plan_to_order;
    }

    public function set_plan_to_order_date($string)
    {
        $this->plan_to_order_date = $string;
    }

    public function get_plan_to_order_date()
    {
        return $this->plan_to_order_date;
    }

    public function set_received_product($tf)
    {
        $this->received_product = $tf;
    }

    public function get_received_product()
    {
        return $this->received_product;
    }
    public function set_received_product_date($string)
    {
        $this->received_product_date = $string;
    }

    public function get_received_product_date()
    {
        return $this->received_product_date;
    }

    public function set_given_instructions($tf)
    {
        $this->given_instructions = $tf;
    }

    public function get_given_instructions()
    {
        return $this->given_instructions;
    }

    public function set_patient_understands($tf)
    {
        $this->patient_understands = $tf;
    }

    public function get_patient_understands()
    {
        return $this->patient_understands;
    }
}   // end of Form
