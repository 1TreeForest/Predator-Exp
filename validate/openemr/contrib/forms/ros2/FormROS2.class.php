<?php

// Copyright (C) 2009 Aron Racho <aron@mi-squared.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2


define("EVENT_VEHICLE", 1);
define("EVENT_WORK_RELATED", 2);
define("EVENT_SLIP_FALL", 3);
define("EVENT_OTHER", 4);


/**
 * class FormHpTjePrimary
 *
 */
class FormROS2 extends ORDataObject
{
    /**
     *
     * @access public
     */


    /**
     *
     * static
     */
    public $id;
    public $date;
    public $pid;
    public $user;
    public $groupname;
    public $authorized;
    public $activity;

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
            $this->date = date("Y-m-d H:i:s");
        }

        $this->_table = "form_ros2";
        $this->activity = 1;
        $this->pid = $GLOBALS['pid'];
        if ($id != "") {
            $this->populate();
            //$this->date = $this->get_date();
        }
    }
    public function populate()
    {
        parent::populate();
        //$this->temp_methods = parent::_load_enum("temp_locations",false);
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

    public function get_date()
    {
        return $this->date;
    }
    public function set_date($dt)
    {
        if (!empty($dt)) {
            $this->date = $dt;
        }
    }
    public function get_user()
    {
        return $this->user;
    }
    public function set_user($u)
    {
        if (!empty($u)) {
            $this->user = $u;
        }
    }

    public function persist()
    {
        parent::persist();
    }



    // ----- headache -----

    public $general_headache;
    public $general_headache_text;
    public function get_general_headache()
    {
        return $this->general_headache;
    }
    public function get_general_headache_yes()
    {
        return $this->general_headache == "Yes" ? "CHECKED" : "";
    }
    public function get_general_headache_no()
    {
        return $this->general_headache == "No" ? "CHECKED" : "";
    }
    public function set_general_headache($data)
    {
        if (!empty($data)) {
            $this->general_headache = $data;
        }
    }
    public function get_general_headache_text()
    {
        return $this->general_headache_text;
    }
    public function set_general_headache_text($data)
    {
        if (!empty($data)) {
            $this->general_headache_text = $data;
        }
    }


    public $general_fever;
    public $general_fever_text;
    public function get_general_fever()
    {
        return $this->general_fever;
    }
    public function get_general_fever_yes()
    {
        return $this->general_fever == "Yes" ? "CHECKED" : "";
    }
    public function get_general_fever_no()
    {
        return $this->general_fever == "No" ? "CHECKED" : "";
    }
    public function set_general_fever($data)
    {
        if (!empty($data)) {
            $this->general_fever = $data;
        }
    }
    public function get_general_fever_text()
    {
        return $this->general_fever_text;
    }
    public function set_general_fever_text($data)
    {
        if (!empty($data)) {
            $this->general_fever_text = $data;
        }
    }


    public $general_chills;
    public $general_chills_text;
    public function get_general_chills()
    {
        return $this->general_chills;
    }
    public function get_general_chills_yes()
    {
        return $this->general_chills == "Yes" ? "CHECKED" : "";
    }
    public function get_general_chills_no()
    {
        return $this->general_chills == "No" ? "CHECKED" : "";
    }
    public function set_general_chills($data)
    {
        if (!empty($data)) {
            $this->general_chills = $data;
        }
    }
    public function get_general_chills_text()
    {
        return $this->general_chills_text;
    }
    public function set_general_chills_text($data)
    {
        if (!empty($data)) {
            $this->general_chills_text = $data;
        }
    }


    public $general_body_aches;
    public $general_body_aches_text;
    public function get_general_body_aches()
    {
        return $this->general_body_aches;
    }
    public function get_general_body_aches_yes()
    {
        return $this->general_body_aches == "Yes" ? "CHECKED" : "";
    }
    public function get_general_body_aches_no()
    {
        return $this->general_body_aches == "No" ? "CHECKED" : "";
    }
    public function set_general_body_aches($data)
    {
        if (!empty($data)) {
            $this->general_body_aches = $data;
        }
    }
    public function get_general_body_aches_text()
    {
        return $this->general_body_aches_text;
    }
    public function set_general_body_aches_text($data)
    {
        if (!empty($data)) {
            $this->general_body_aches_text = $data;
        }
    }


    public $general_fatigue;
    public $general_fatigue_text;
    public function get_general_fatigue()
    {
        return $this->general_fatigue;
    }
    public function get_general_fatigue_yes()
    {
        return $this->general_fatigue == "Yes" ? "CHECKED" : "";
    }
    public function get_general_fatigue_no()
    {
        return $this->general_fatigue == "No" ? "CHECKED" : "";
    }
    public function set_general_fatigue($data)
    {
        if (!empty($data)) {
            $this->general_fatigue = $data;
        }
    }
    public function get_general_fatigue_text()
    {
        return $this->general_fatigue_text;
    }
    public function set_general_fatigue_text($data)
    {
        if (!empty($data)) {
            $this->general_fatigue_text = $data;
        }
    }


    public $general_loss_of_appetite;
    public $general_loss_of_appetite_text;
    public function get_general_loss_of_appetite()
    {
        return $this->general_loss_of_appetite;
    }
    public function get_general_loss_of_appetite_yes()
    {
        return $this->general_loss_of_appetite == "Yes" ? "CHECKED" : "";
    }
    public function get_general_loss_of_appetite_no()
    {
        return $this->general_loss_of_appetite == "No" ? "CHECKED" : "";
    }
    public function set_general_loss_of_appetite($data)
    {
        if (!empty($data)) {
            $this->general_loss_of_appetite = $data;
        }
    }
    public function get_general_loss_of_appetite_text()
    {
        return $this->general_loss_of_appetite_text;
    }
    public function set_general_loss_of_appetite_text($data)
    {
        if (!empty($data)) {
            $this->general_loss_of_appetite_text = $data;
        }
    }


    public $general_weight_loss;
    public $general_weight_loss_text;
    public function get_general_weight_loss()
    {
        return $this->general_weight_loss;
    }
    public function get_general_weight_loss_yes()
    {
        return $this->general_weight_loss == "Yes" ? "CHECKED" : "";
    }
    public function get_general_weight_loss_no()
    {
        return $this->general_weight_loss == "No" ? "CHECKED" : "";
    }
    public function set_general_weight_loss($data)
    {
        if (!empty($data)) {
            $this->general_weight_loss = $data;
        }
    }
    public function get_general_weight_loss_text()
    {
        return $this->general_weight_loss_text;
    }
    public function set_general_weight_loss_text($data)
    {
        if (!empty($data)) {
            $this->general_weight_loss_text = $data;
        }
    }


    public $general_daytime_drowsiness;
    public $general_daytime_drowsiness_text;
    public function get_general_daytime_drowsiness()
    {
        return $this->general_daytime_drowsiness;
    }
    public function get_general_daytime_drowsiness_yes()
    {
        return $this->general_daytime_drowsiness == "Yes" ? "CHECKED" : "";
    }
    public function get_general_daytime_drowsiness_no()
    {
        return $this->general_daytime_drowsiness == "No" ? "CHECKED" : "";
    }
    public function set_general_daytime_drowsiness($data)
    {
        if (!empty($data)) {
            $this->general_daytime_drowsiness = $data;
        }
    }
    public function get_general_daytime_drowsiness_text()
    {
        return $this->general_daytime_drowsiness_text;
    }
    public function set_general_daytime_drowsiness_text($data)
    {
        if (!empty($data)) {
            $this->general_daytime_drowsiness_text = $data;
        }
    }


    public $general_excessive_snoring;
    public $general_excessive_snoring_text;
    public function get_general_excessive_snoring()
    {
        return $this->general_excessive_snoring;
    }
    public function get_general_excessive_snoring_yes()
    {
        return $this->general_excessive_snoring == "Yes" ? "CHECKED" : "";
    }
    public function get_general_excessive_snoring_no()
    {
        return $this->general_excessive_snoring == "No" ? "CHECKED" : "";
    }
    public function set_general_excessive_snoring($data)
    {
        if (!empty($data)) {
            $this->general_excessive_snoring = $data;
        }
    }
    public function get_general_excessive_snoring_text()
    {
        return $this->general_excessive_snoring_text;
    }
    public function set_general_excessive_snoring_text($data)
    {
        if (!empty($data)) {
            $this->general_excessive_snoring_text = $data;
        }
    }

    // ----- disorientation -----

    public $neuro_disorientation;
    public $neuro_disorientation_text;
    public function get_neuro_disorientation()
    {
        return $this->neuro_disorientation;
    }
    public function get_neuro_disorientation_yes()
    {
        return $this->neuro_disorientation == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_disorientation_no()
    {
        return $this->neuro_disorientation == "No" ? "CHECKED" : "";
    }
    public function set_neuro_disorientation($data)
    {
        if (!empty($data)) {
            $this->neuro_disorientation = $data;
        }
    }
    public function get_neuro_disorientation_text()
    {
        return $this->neuro_disorientation_text;
    }
    public function set_neuro_disorientation_text($data)
    {
        if (!empty($data)) {
            $this->neuro_disorientation_text = $data;
        }
    }


    public $neuro_loss_of_consciousness;
    public $neuro_loss_of_consciousness_text;
    public function get_neuro_loss_of_consciousness()
    {
        return $this->neuro_loss_of_consciousness;
    }
    public function get_neuro_loss_of_consciousness_yes()
    {
        return $this->neuro_loss_of_consciousness == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_loss_of_consciousness_no()
    {
        return $this->neuro_loss_of_consciousness == "No" ? "CHECKED" : "";
    }
    public function set_neuro_loss_of_consciousness($data)
    {
        if (!empty($data)) {
            $this->neuro_loss_of_consciousness = $data;
        }
    }
    public function get_neuro_loss_of_consciousness_text()
    {
        return $this->neuro_loss_of_consciousness_text;
    }
    public function set_neuro_loss_of_consciousness_text($data)
    {
        if (!empty($data)) {
            $this->neuro_loss_of_consciousness_text = $data;
        }
    }


    public $neuro_numbness;
    public $neuro_numbness_text;
    public function get_neuro_numbness()
    {
        return $this->neuro_numbness;
    }
    public function get_neuro_numbness_yes()
    {
        return $this->neuro_numbness == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_numbness_no()
    {
        return $this->neuro_numbness == "No" ? "CHECKED" : "";
    }
    public function set_neuro_numbness($data)
    {
        if (!empty($data)) {
            $this->neuro_numbness = $data;
        }
    }
    public function get_neuro_numbness_text()
    {
        return $this->neuro_numbness_text;
    }
    public function set_neuro_numbness_text($data)
    {
        if (!empty($data)) {
            $this->neuro_numbness_text = $data;
        }
    }


    public $neuro_tingling;
    public $neuro_tingling_text;
    public function get_neuro_tingling()
    {
        return $this->neuro_tingling;
    }
    public function get_neuro_tingling_yes()
    {
        return $this->neuro_tingling == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_tingling_no()
    {
        return $this->neuro_tingling == "No" ? "CHECKED" : "";
    }
    public function set_neuro_tingling($data)
    {
        if (!empty($data)) {
            $this->neuro_tingling = $data;
        }
    }
    public function get_neuro_tingling_text()
    {
        return $this->neuro_tingling_text;
    }
    public function set_neuro_tingling_text($data)
    {
        if (!empty($data)) {
            $this->neuro_tingling_text = $data;
        }
    }


    public $neuro_restlessness;
    public $neuro_restlessness_text;
    public function get_neuro_restlessness()
    {
        return $this->neuro_restlessness;
    }
    public function get_neuro_restlessness_yes()
    {
        return $this->neuro_restlessness == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_restlessness_no()
    {
        return $this->neuro_restlessness == "No" ? "CHECKED" : "";
    }
    public function set_neuro_restlessness($data)
    {
        if (!empty($data)) {
            $this->neuro_restlessness = $data;
        }
    }
    public function get_neuro_restlessness_text()
    {
        return $this->neuro_restlessness_text;
    }
    public function set_neuro_restlessness_text($data)
    {
        if (!empty($data)) {
            $this->neuro_restlessness_text = $data;
        }
    }


    public $neuro_dizziness;
    public $neuro_dizziness_text;
    public function get_neuro_dizziness()
    {
        return $this->neuro_dizziness;
    }
    public function get_neuro_dizziness_yes()
    {
        return $this->neuro_dizziness == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_dizziness_no()
    {
        return $this->neuro_dizziness == "No" ? "CHECKED" : "";
    }
    public function set_neuro_dizziness($data)
    {
        if (!empty($data)) {
            $this->neuro_dizziness = $data;
        }
    }
    public function get_neuro_dizziness_text()
    {
        return $this->neuro_dizziness_text;
    }
    public function set_neuro_dizziness_text($data)
    {
        if (!empty($data)) {
            $this->neuro_dizziness_text = $data;
        }
    }


    public $neuro_vertigo;
    public $neuro_vertigo_text;
    public function get_neuro_vertigo()
    {
        return $this->neuro_vertigo;
    }
    public function get_neuro_vertigo_yes()
    {
        return $this->neuro_vertigo == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_vertigo_no()
    {
        return $this->neuro_vertigo == "No" ? "CHECKED" : "";
    }
    public function set_neuro_vertigo($data)
    {
        if (!empty($data)) {
            $this->neuro_vertigo = $data;
        }
    }
    public function get_neuro_vertigo_text()
    {
        return $this->neuro_vertigo_text;
    }
    public function set_neuro_vertigo_text($data)
    {
        if (!empty($data)) {
            $this->neuro_vertigo_text = $data;
        }
    }


    public $neuro_amaurosis_fugax;
    public $neuro_amaurosis_fugax_text;
    public function get_neuro_amaurosis_fugax()
    {
        return $this->neuro_amaurosis_fugax;
    }
    public function get_neuro_amaurosis_fugax_yes()
    {
        return $this->neuro_amaurosis_fugax == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_amaurosis_fugax_no()
    {
        return $this->neuro_amaurosis_fugax == "No" ? "CHECKED" : "";
    }
    public function set_neuro_amaurosis_fugax($data)
    {
        if (!empty($data)) {
            $this->neuro_amaurosis_fugax = $data;
        }
    }
    public function get_neuro_amaurosis_fugax_text()
    {
        return $this->neuro_amaurosis_fugax_text;
    }
    public function set_neuro_amaurosis_fugax_text($data)
    {
        if (!empty($data)) {
            $this->neuro_amaurosis_fugax_text = $data;
        }
    }


    public $neuro_stroke;
    public $neuro_stroke_text;
    public function get_neuro_stroke()
    {
        return $this->neuro_stroke;
    }
    public function get_neuro_stroke_yes()
    {
        return $this->neuro_stroke == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_stroke_no()
    {
        return $this->neuro_stroke == "No" ? "CHECKED" : "";
    }
    public function set_neuro_stroke($data)
    {
        if (!empty($data)) {
            $this->neuro_stroke = $data;
        }
    }
    public function get_neuro_stroke_text()
    {
        return $this->neuro_stroke_text;
    }
    public function set_neuro_stroke_text($data)
    {
        if (!empty($data)) {
            $this->neuro_stroke_text = $data;
        }
    }


    public $neuro_gait_abnormality;
    public $neuro_gait_abnormality_text;
    public function get_neuro_gait_abnormality()
    {
        return $this->neuro_gait_abnormality;
    }
    public function get_neuro_gait_abnormality_yes()
    {
        return $this->neuro_gait_abnormality == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_gait_abnormality_no()
    {
        return $this->neuro_gait_abnormality == "No" ? "CHECKED" : "";
    }
    public function set_neuro_gait_abnormality($data)
    {
        if (!empty($data)) {
            $this->neuro_gait_abnormality = $data;
        }
    }
    public function get_neuro_gait_abnormality_text()
    {
        return $this->neuro_gait_abnormality_text;
    }
    public function set_neuro_gait_abnormality_text($data)
    {
        if (!empty($data)) {
            $this->neuro_gait_abnormality_text = $data;
        }
    }


    public $neuro_frequent_headaches;
    public $neuro_frequent_headaches_text;
    public function get_neuro_frequent_headaches()
    {
        return $this->neuro_frequent_headaches;
    }
    public function get_neuro_frequent_headaches_yes()
    {
        return $this->neuro_frequent_headaches == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_frequent_headaches_no()
    {
        return $this->neuro_frequent_headaches == "No" ? "CHECKED" : "";
    }
    public function set_neuro_frequent_headaches($data)
    {
        if (!empty($data)) {
            $this->neuro_frequent_headaches = $data;
        }
    }
    public function get_neuro_frequent_headaches_text()
    {
        return $this->neuro_frequent_headaches_text;
    }
    public function set_neuro_frequent_headaches_text($data)
    {
        if (!empty($data)) {
            $this->neuro_frequent_headaches_text = $data;
        }
    }


    public $neuro_parathesias;
    public $neuro_parathesias_text;
    public function get_neuro_parathesias()
    {
        return $this->neuro_parathesias;
    }
    public function get_neuro_parathesias_yes()
    {
        return $this->neuro_parathesias == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_parathesias_no()
    {
        return $this->neuro_parathesias == "No" ? "CHECKED" : "";
    }
    public function set_neuro_parathesias($data)
    {
        if (!empty($data)) {
            $this->neuro_parathesias = $data;
        }
    }
    public function get_neuro_parathesias_text()
    {
        return $this->neuro_parathesias_text;
    }
    public function set_neuro_parathesias_text($data)
    {
        if (!empty($data)) {
            $this->neuro_parathesias_text = $data;
        }
    }


    public $neuro_seizures;
    public $neuro_seizures_text;
    public function get_neuro_seizures()
    {
        return $this->neuro_seizures;
    }
    public function get_neuro_seizures_yes()
    {
        return $this->neuro_seizures == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_seizures_no()
    {
        return $this->neuro_seizures == "No" ? "CHECKED" : "";
    }
    public function set_neuro_seizures($data)
    {
        if (!empty($data)) {
            $this->neuro_seizures = $data;
        }
    }
    public function get_neuro_seizures_text()
    {
        return $this->neuro_seizures_text;
    }
    public function set_neuro_seizures_text($data)
    {
        if (!empty($data)) {
            $this->neuro_seizures_text = $data;
        }
    }


    public $neuro_trans_ischemic_attacks;
    public $neuro_trans_ischemic_attacks_text;
    public function get_neuro_trans_ischemic_attacks()
    {
        return $this->neuro_trans_ischemic_attacks;
    }
    public function get_neuro_trans_ischemic_attacks_yes()
    {
        return $this->neuro_trans_ischemic_attacks == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_trans_ischemic_attacks_no()
    {
        return $this->neuro_trans_ischemic_attacks == "No" ? "CHECKED" : "";
    }
    public function set_neuro_trans_ischemic_attacks($data)
    {
        if (!empty($data)) {
            $this->neuro_trans_ischemic_attacks = $data;
        }
    }
    public function get_neuro_trans_ischemic_attacks_text()
    {
        return $this->neuro_trans_ischemic_attacks_text;
    }
    public function set_neuro_trans_ischemic_attacks_text($data)
    {
        if (!empty($data)) {
            $this->neuro_trans_ischemic_attacks_text = $data;
        }
    }


    public $neuro_significant_tremors;
    public $neuro_significant_tremors_text;
    public function get_neuro_significant_tremors()
    {
        return $this->neuro_significant_tremors;
    }
    public function get_neuro_significant_tremors_yes()
    {
        return $this->neuro_significant_tremors == "Yes" ? "CHECKED" : "";
    }
    public function get_neuro_significant_tremors_no()
    {
        return $this->neuro_significant_tremors == "No" ? "CHECKED" : "";
    }
    public function set_neuro_significant_tremors($data)
    {
        if (!empty($data)) {
            $this->neuro_significant_tremors = $data;
        }
    }
    public function get_neuro_significant_tremors_text()
    {
        return $this->neuro_significant_tremors_text;
    }
    public function set_neuro_significant_tremors_text($data)
    {
        if (!empty($data)) {
            $this->neuro_significant_tremors_text = $data;
        }
    }

    // ----- neck stiffness -----

    public $neck_neck_stiffness;
    public $neck_neck_stiffness_text;
    public function get_neck_neck_stiffness()
    {
        return $this->neck_neck_stiffness;
    }
    public function get_neck_neck_stiffness_yes()
    {
        return $this->neck_neck_stiffness == "Yes" ? "CHECKED" : "";
    }
    public function get_neck_neck_stiffness_no()
    {
        return $this->neck_neck_stiffness == "No" ? "CHECKED" : "";
    }
    public function set_neck_neck_stiffness($data)
    {
        if (!empty($data)) {
            $this->neck_neck_stiffness = $data;
        }
    }
    public function get_neck_neck_stiffness_text()
    {
        return $this->neck_neck_stiffness_text;
    }
    public function set_neck_neck_stiffness_text($data)
    {
        if (!empty($data)) {
            $this->neck_neck_stiffness_text = $data;
        }
    }


    public $neck_neck_pain;
    public $neck_neck_pain_text;
    public function get_neck_neck_pain()
    {
        return $this->neck_neck_pain;
    }
    public function get_neck_neck_pain_yes()
    {
        return $this->neck_neck_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_neck_neck_pain_no()
    {
        return $this->neck_neck_pain == "No" ? "CHECKED" : "";
    }
    public function set_neck_neck_pain($data)
    {
        if (!empty($data)) {
            $this->neck_neck_pain = $data;
        }
    }
    public function get_neck_neck_pain_text()
    {
        return $this->neck_neck_pain_text;
    }
    public function set_neck_neck_pain_text($data)
    {
        if (!empty($data)) {
            $this->neck_neck_pain_text = $data;
        }
    }


    public $neck_neck_masses;
    public $neck_neck_masses_text;
    public function get_neck_neck_masses()
    {
        return $this->neck_neck_masses;
    }
    public function get_neck_neck_masses_yes()
    {
        return $this->neck_neck_masses == "Yes" ? "CHECKED" : "";
    }
    public function get_neck_neck_masses_no()
    {
        return $this->neck_neck_masses == "No" ? "CHECKED" : "";
    }
    public function set_neck_neck_masses($data)
    {
        if (!empty($data)) {
            $this->neck_neck_masses = $data;
        }
    }
    public function get_neck_neck_masses_text()
    {
        return $this->neck_neck_masses_text;
    }
    public function set_neck_neck_masses_text($data)
    {
        if (!empty($data)) {
            $this->neck_neck_masses_text = $data;
        }
    }


    public $neck_neck_tenderness;
    public $neck_neck_tenderness_text;
    public function get_neck_neck_tenderness()
    {
        return $this->neck_neck_tenderness;
    }
    public function get_neck_neck_tenderness_yes()
    {
        return $this->neck_neck_tenderness == "Yes" ? "CHECKED" : "";
    }
    public function get_neck_neck_tenderness_no()
    {
        return $this->neck_neck_tenderness == "No" ? "CHECKED" : "";
    }
    public function set_neck_neck_tenderness($data)
    {
        if (!empty($data)) {
            $this->neck_neck_tenderness = $data;
        }
    }
    public function get_neck_neck_tenderness_text()
    {
        return $this->neck_neck_tenderness_text;
    }
    public function set_neck_neck_tenderness_text($data)
    {
        if (!empty($data)) {
            $this->neck_neck_tenderness_text = $data;
        }
    }

    // ----- oral ulcers -----

    public $heent_oral_ulcers;
    public $heent_oral_ulcers_text;
    public function get_heent_oral_ulcers()
    {
        return $this->heent_oral_ulcers;
    }
    public function get_heent_oral_ulcers_yes()
    {
        return $this->heent_oral_ulcers == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_oral_ulcers_no()
    {
        return $this->heent_oral_ulcers == "No" ? "CHECKED" : "";
    }
    public function set_heent_oral_ulcers($data)
    {
        if (!empty($data)) {
            $this->heent_oral_ulcers = $data;
        }
    }
    public function get_heent_oral_ulcers_text()
    {
        return $this->heent_oral_ulcers_text;
    }
    public function set_heent_oral_ulcers_text($data)
    {
        if (!empty($data)) {
            $this->heent_oral_ulcers_text = $data;
        }
    }


    public $heent_excessive_cavities;
    public $heent_excessive_cavities_text;
    public function get_heent_excessive_cavities()
    {
        return $this->heent_excessive_cavities;
    }
    public function get_heent_excessive_cavities_yes()
    {
        return $this->heent_excessive_cavities == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_excessive_cavities_no()
    {
        return $this->heent_excessive_cavities == "No" ? "CHECKED" : "";
    }
    public function set_heent_excessive_cavities($data)
    {
        if (!empty($data)) {
            $this->heent_excessive_cavities = $data;
        }
    }
    public function get_heent_excessive_cavities_text()
    {
        return $this->heent_excessive_cavities_text;
    }
    public function set_heent_excessive_cavities_text($data)
    {
        if (!empty($data)) {
            $this->heent_excessive_cavities_text = $data;
        }
    }


    public $heent_gingival_disease;
    public $heent_gingival_disease_text;
    public function get_heent_gingival_disease()
    {
        return $this->heent_gingival_disease;
    }
    public function get_heent_gingival_disease_yes()
    {
        return $this->heent_gingival_disease == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_gingival_disease_no()
    {
        return $this->heent_gingival_disease == "No" ? "CHECKED" : "";
    }
    public function set_heent_gingival_disease($data)
    {
        if (!empty($data)) {
            $this->heent_gingival_disease = $data;
        }
    }
    public function get_heent_gingival_disease_text()
    {
        return $this->heent_gingival_disease_text;
    }
    public function set_heent_gingival_disease_text($data)
    {
        if (!empty($data)) {
            $this->heent_gingival_disease_text = $data;
        }
    }


    public $heent_persistent_hoarseness;
    public $heent_persistent_hoarseness_text;
    public function get_heent_persistent_hoarseness()
    {
        return $this->heent_persistent_hoarseness;
    }
    public function get_heent_persistent_hoarseness_yes()
    {
        return $this->heent_persistent_hoarseness == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_persistent_hoarseness_no()
    {
        return $this->heent_persistent_hoarseness == "No" ? "CHECKED" : "";
    }
    public function set_heent_persistent_hoarseness($data)
    {
        if (!empty($data)) {
            $this->heent_persistent_hoarseness = $data;
        }
    }
    public function get_heent_persistent_hoarseness_text()
    {
        return $this->heent_persistent_hoarseness_text;
    }
    public function set_heent_persistent_hoarseness_text($data)
    {
        if (!empty($data)) {
            $this->heent_persistent_hoarseness_text = $data;
        }
    }


    public $heent_mouth_lesions;
    public $heent_mouth_lesions_text;
    public function get_heent_mouth_lesions()
    {
        return $this->heent_mouth_lesions;
    }
    public function get_heent_mouth_lesions_yes()
    {
        return $this->heent_mouth_lesions == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_mouth_lesions_no()
    {
        return $this->heent_mouth_lesions == "No" ? "CHECKED" : "";
    }
    public function set_heent_mouth_lesions($data)
    {
        if (!empty($data)) {
            $this->heent_mouth_lesions = $data;
        }
    }
    public function get_heent_mouth_lesions_text()
    {
        return $this->heent_mouth_lesions_text;
    }
    public function set_heent_mouth_lesions_text($data)
    {
        if (!empty($data)) {
            $this->heent_mouth_lesions_text = $data;
        }
    }


    public $heent_dysphagia;
    public $heent_dysphagia_text;
    public function get_heent_dysphagia()
    {
        return $this->heent_dysphagia;
    }
    public function get_heent_dysphagia_yes()
    {
        return $this->heent_dysphagia == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_dysphagia_no()
    {
        return $this->heent_dysphagia == "No" ? "CHECKED" : "";
    }
    public function set_heent_dysphagia($data)
    {
        if (!empty($data)) {
            $this->heent_dysphagia = $data;
        }
    }
    public function get_heent_dysphagia_text()
    {
        return $this->heent_dysphagia_text;
    }
    public function set_heent_dysphagia_text($data)
    {
        if (!empty($data)) {
            $this->heent_dysphagia_text = $data;
        }
    }


    public $heent_odynophagia;
    public $heent_odynophagia_text;
    public function get_heent_odynophagia()
    {
        return $this->heent_odynophagia;
    }
    public function get_heent_odynophagia_yes()
    {
        return $this->heent_odynophagia == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_odynophagia_no()
    {
        return $this->heent_odynophagia == "No" ? "CHECKED" : "";
    }
    public function set_heent_odynophagia($data)
    {
        if (!empty($data)) {
            $this->heent_odynophagia = $data;
        }
    }
    public function get_heent_odynophagia_text()
    {
        return $this->heent_odynophagia_text;
    }
    public function set_heent_odynophagia_text($data)
    {
        if (!empty($data)) {
            $this->heent_odynophagia_text = $data;
        }
    }


    public $heent_dental_pain;
    public $heent_dental_pain_text;
    public function get_heent_dental_pain()
    {
        return $this->heent_dental_pain;
    }
    public function get_heent_dental_pain_yes()
    {
        return $this->heent_dental_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_dental_pain_no()
    {
        return $this->heent_dental_pain == "No" ? "CHECKED" : "";
    }
    public function set_heent_dental_pain($data)
    {
        if (!empty($data)) {
            $this->heent_dental_pain = $data;
        }
    }
    public function get_heent_dental_pain_text()
    {
        return $this->heent_dental_pain_text;
    }
    public function set_heent_dental_pain_text($data)
    {
        if (!empty($data)) {
            $this->heent_dental_pain_text = $data;
        }
    }


    public $heent_sore_throat;
    public $heent_sore_throat_text;
    public function get_heent_sore_throat()
    {
        return $this->heent_sore_throat;
    }
    public function get_heent_sore_throat_yes()
    {
        return $this->heent_sore_throat == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_sore_throat_no()
    {
        return $this->heent_sore_throat == "No" ? "CHECKED" : "";
    }
    public function set_heent_sore_throat($data)
    {
        if (!empty($data)) {
            $this->heent_sore_throat = $data;
        }
    }
    public function get_heent_sore_throat_text()
    {
        return $this->heent_sore_throat_text;
    }
    public function set_heent_sore_throat_text($data)
    {
        if (!empty($data)) {
            $this->heent_sore_throat_text = $data;
        }
    }


    public $heent_ear_pain;
    public $heent_ear_pain_text;
    public function get_heent_ear_pain()
    {
        return $this->heent_ear_pain;
    }
    public function get_heent_ear_pain_yes()
    {
        return $this->heent_ear_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_ear_pain_no()
    {
        return $this->heent_ear_pain == "No" ? "CHECKED" : "";
    }
    public function set_heent_ear_pain($data)
    {
        if (!empty($data)) {
            $this->heent_ear_pain = $data;
        }
    }
    public function get_heent_ear_pain_text()
    {
        return $this->heent_ear_pain_text;
    }
    public function set_heent_ear_pain_text($data)
    {
        if (!empty($data)) {
            $this->heent_ear_pain_text = $data;
        }
    }


    public $heent_ear_discharge;
    public $heent_ear_discharge_text;
    public function get_heent_ear_discharge()
    {
        return $this->heent_ear_discharge;
    }
    public function get_heent_ear_discharge_yes()
    {
        return $this->heent_ear_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_ear_discharge_no()
    {
        return $this->heent_ear_discharge == "No" ? "CHECKED" : "";
    }
    public function set_heent_ear_discharge($data)
    {
        if (!empty($data)) {
            $this->heent_ear_discharge = $data;
        }
    }
    public function get_heent_ear_discharge_text()
    {
        return $this->heent_ear_discharge_text;
    }
    public function set_heent_ear_discharge_text($data)
    {
        if (!empty($data)) {
            $this->heent_ear_discharge_text = $data;
        }
    }


    public $heent_tinnitus;
    public $heent_tinnitus_text;
    public function get_heent_tinnitus()
    {
        return $this->heent_tinnitus;
    }
    public function get_heent_tinnitus_yes()
    {
        return $this->heent_tinnitus == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_tinnitus_no()
    {
        return $this->heent_tinnitus == "No" ? "CHECKED" : "";
    }
    public function set_heent_tinnitus($data)
    {
        if (!empty($data)) {
            $this->heent_tinnitus = $data;
        }
    }
    public function get_heent_tinnitus_text()
    {
        return $this->heent_tinnitus_text;
    }
    public function set_heent_tinnitus_text($data)
    {
        if (!empty($data)) {
            $this->heent_tinnitus_text = $data;
        }
    }


    public $heent_hearing_loss;
    public $heent_hearing_loss_text;
    public function get_heent_hearing_loss()
    {
        return $this->heent_hearing_loss;
    }
    public function get_heent_hearing_loss_yes()
    {
        return $this->heent_hearing_loss == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_hearing_loss_no()
    {
        return $this->heent_hearing_loss == "No" ? "CHECKED" : "";
    }
    public function set_heent_hearing_loss($data)
    {
        if (!empty($data)) {
            $this->heent_hearing_loss = $data;
        }
    }
    public function get_heent_hearing_loss_text()
    {
        return $this->heent_hearing_loss_text;
    }
    public function set_heent_hearing_loss_text($data)
    {
        if (!empty($data)) {
            $this->heent_hearing_loss_text = $data;
        }
    }


    public $heent_allergic_rhinitis;
    public $heent_allergic_rhinitis_text;
    public function get_heent_allergic_rhinitis()
    {
        return $this->heent_allergic_rhinitis;
    }
    public function get_heent_allergic_rhinitis_yes()
    {
        return $this->heent_allergic_rhinitis == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_allergic_rhinitis_no()
    {
        return $this->heent_allergic_rhinitis == "No" ? "CHECKED" : "";
    }
    public function set_heent_allergic_rhinitis($data)
    {
        if (!empty($data)) {
            $this->heent_allergic_rhinitis = $data;
        }
    }
    public function get_heent_allergic_rhinitis_text()
    {
        return $this->heent_allergic_rhinitis_text;
    }
    public function set_heent_allergic_rhinitis_text($data)
    {
        if (!empty($data)) {
            $this->heent_allergic_rhinitis_text = $data;
        }
    }


    public $heent_nasal_congestion;
    public $heent_nasal_congestion_text;
    public function get_heent_nasal_congestion()
    {
        return $this->heent_nasal_congestion;
    }
    public function get_heent_nasal_congestion_yes()
    {
        return $this->heent_nasal_congestion == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_nasal_congestion_no()
    {
        return $this->heent_nasal_congestion == "No" ? "CHECKED" : "";
    }
    public function set_heent_nasal_congestion($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_congestion = $data;
        }
    }
    public function get_heent_nasal_congestion_text()
    {
        return $this->heent_nasal_congestion_text;
    }
    public function set_heent_nasal_congestion_text($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_congestion_text = $data;
        }
    }


    public $heent_nasal_discharge;
    public $heent_nasal_discharge_text;
    public function get_heent_nasal_discharge()
    {
        return $this->heent_nasal_discharge;
    }
    public function get_heent_nasal_discharge_yes()
    {
        return $this->heent_nasal_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_nasal_discharge_no()
    {
        return $this->heent_nasal_discharge == "No" ? "CHECKED" : "";
    }
    public function set_heent_nasal_discharge($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_discharge = $data;
        }
    }
    public function get_heent_nasal_discharge_text()
    {
        return $this->heent_nasal_discharge_text;
    }
    public function set_heent_nasal_discharge_text($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_discharge_text = $data;
        }
    }


    public $heent_nasal_injury;
    public $heent_nasal_injury_text;
    public function get_heent_nasal_injury()
    {
        return $this->heent_nasal_injury;
    }
    public function get_heent_nasal_injury_yes()
    {
        return $this->heent_nasal_injury == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_nasal_injury_no()
    {
        return $this->heent_nasal_injury == "No" ? "CHECKED" : "";
    }
    public function set_heent_nasal_injury($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_injury = $data;
        }
    }
    public function get_heent_nasal_injury_text()
    {
        return $this->heent_nasal_injury_text;
    }
    public function set_heent_nasal_injury_text($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_injury_text = $data;
        }
    }


    public $heent_nasal_surgery;
    public $heent_nasal_surgery_text;
    public function get_heent_nasal_surgery()
    {
        return $this->heent_nasal_surgery;
    }
    public function get_heent_nasal_surgery_yes()
    {
        return $this->heent_nasal_surgery == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_nasal_surgery_no()
    {
        return $this->heent_nasal_surgery == "No" ? "CHECKED" : "";
    }
    public function set_heent_nasal_surgery($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_surgery = $data;
        }
    }
    public function get_heent_nasal_surgery_text()
    {
        return $this->heent_nasal_surgery_text;
    }
    public function set_heent_nasal_surgery_text($data)
    {
        if (!empty($data)) {
            $this->heent_nasal_surgery_text = $data;
        }
    }


    public $heent_nose_bleeds;
    public $heent_nose_bleeds_text;
    public function get_heent_nose_bleeds()
    {
        return $this->heent_nose_bleeds;
    }
    public function get_heent_nose_bleeds_yes()
    {
        return $this->heent_nose_bleeds == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_nose_bleeds_no()
    {
        return $this->heent_nose_bleeds == "No" ? "CHECKED" : "";
    }
    public function set_heent_nose_bleeds($data)
    {
        if (!empty($data)) {
            $this->heent_nose_bleeds = $data;
        }
    }
    public function get_heent_nose_bleeds_text()
    {
        return $this->heent_nose_bleeds_text;
    }
    public function set_heent_nose_bleeds_text($data)
    {
        if (!empty($data)) {
            $this->heent_nose_bleeds_text = $data;
        }
    }


    public $heent_post_nasal_drip;
    public $heent_post_nasal_drip_text;
    public function get_heent_post_nasal_drip()
    {
        return $this->heent_post_nasal_drip;
    }
    public function get_heent_post_nasal_drip_yes()
    {
        return $this->heent_post_nasal_drip == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_post_nasal_drip_no()
    {
        return $this->heent_post_nasal_drip == "No" ? "CHECKED" : "";
    }
    public function set_heent_post_nasal_drip($data)
    {
        if (!empty($data)) {
            $this->heent_post_nasal_drip = $data;
        }
    }
    public function get_heent_post_nasal_drip_text()
    {
        return $this->heent_post_nasal_drip_text;
    }
    public function set_heent_post_nasal_drip_text($data)
    {
        if (!empty($data)) {
            $this->heent_post_nasal_drip_text = $data;
        }
    }


    public $heent_sinus_pressure;
    public $heent_sinus_pressure_text;
    public function get_heent_sinus_pressure()
    {
        return $this->heent_sinus_pressure;
    }
    public function get_heent_sinus_pressure_yes()
    {
        return $this->heent_sinus_pressure == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_sinus_pressure_no()
    {
        return $this->heent_sinus_pressure == "No" ? "CHECKED" : "";
    }
    public function set_heent_sinus_pressure($data)
    {
        if (!empty($data)) {
            $this->heent_sinus_pressure = $data;
        }
    }
    public function get_heent_sinus_pressure_text()
    {
        return $this->heent_sinus_pressure_text;
    }
    public function set_heent_sinus_pressure_text($data)
    {
        if (!empty($data)) {
            $this->heent_sinus_pressure_text = $data;
        }
    }


    public $heent_sinus_pain;
    public $heent_sinus_pain_text;
    public function get_heent_sinus_pain()
    {
        return $this->heent_sinus_pain;
    }
    public function get_heent_sinus_pain_yes()
    {
        return $this->heent_sinus_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_sinus_pain_no()
    {
        return $this->heent_sinus_pain == "No" ? "CHECKED" : "";
    }
    public function set_heent_sinus_pain($data)
    {
        if (!empty($data)) {
            $this->heent_sinus_pain = $data;
        }
    }
    public function get_heent_sinus_pain_text()
    {
        return $this->heent_sinus_pain_text;
    }
    public function set_heent_sinus_pain_text($data)
    {
        if (!empty($data)) {
            $this->heent_sinus_pain_text = $data;
        }
    }


    public $heent_headache;
    public $heent_headache_text;
    public function get_heent_headache()
    {
        return $this->heent_headache;
    }
    public function get_heent_headache_yes()
    {
        return $this->heent_headache == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_headache_no()
    {
        return $this->heent_headache == "No" ? "CHECKED" : "";
    }
    public function set_heent_headache($data)
    {
        if (!empty($data)) {
            $this->heent_headache = $data;
        }
    }
    public function get_heent_headache_text()
    {
        return $this->heent_headache_text;
    }
    public function set_heent_headache_text($data)
    {
        if (!empty($data)) {
            $this->heent_headache_text = $data;
        }
    }


    public $heent_eye_pain;
    public $heent_eye_pain_text;
    public function get_heent_eye_pain()
    {
        return $this->heent_eye_pain;
    }
    public function get_heent_eye_pain_yes()
    {
        return $this->heent_eye_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_eye_pain_no()
    {
        return $this->heent_eye_pain == "No" ? "CHECKED" : "";
    }
    public function set_heent_eye_pain($data)
    {
        if (!empty($data)) {
            $this->heent_eye_pain = $data;
        }
    }
    public function get_heent_eye_pain_text()
    {
        return $this->heent_eye_pain_text;
    }
    public function set_heent_eye_pain_text($data)
    {
        if (!empty($data)) {
            $this->heent_eye_pain_text = $data;
        }
    }


    public $heent_eye_redness;
    public $heent_eye_redness_text;
    public function get_heent_eye_redness()
    {
        return $this->heent_eye_redness;
    }
    public function get_heent_eye_redness_yes()
    {
        return $this->heent_eye_redness == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_eye_redness_no()
    {
        return $this->heent_eye_redness == "No" ? "CHECKED" : "";
    }
    public function set_heent_eye_redness($data)
    {
        if (!empty($data)) {
            $this->heent_eye_redness = $data;
        }
    }
    public function get_heent_eye_redness_text()
    {
        return $this->heent_eye_redness_text;
    }
    public function set_heent_eye_redness_text($data)
    {
        if (!empty($data)) {
            $this->heent_eye_redness_text = $data;
        }
    }


    public $heent_visual_changes;
    public $heent_visual_changes_text;
    public function get_heent_visual_changes()
    {
        return $this->heent_visual_changes;
    }
    public function get_heent_visual_changes_yes()
    {
        return $this->heent_visual_changes == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_visual_changes_no()
    {
        return $this->heent_visual_changes == "No" ? "CHECKED" : "";
    }
    public function set_heent_visual_changes($data)
    {
        if (!empty($data)) {
            $this->heent_visual_changes = $data;
        }
    }
    public function get_heent_visual_changes_text()
    {
        return $this->heent_visual_changes_text;
    }
    public function set_heent_visual_changes_text($data)
    {
        if (!empty($data)) {
            $this->heent_visual_changes_text = $data;
        }
    }


    public $heent_blurry_vision;
    public $heent_blurry_vision_text;
    public function get_heent_blurry_vision()
    {
        return $this->heent_blurry_vision;
    }
    public function get_heent_blurry_vision_yes()
    {
        return $this->heent_blurry_vision == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_blurry_vision_no()
    {
        return $this->heent_blurry_vision == "No" ? "CHECKED" : "";
    }
    public function set_heent_blurry_vision($data)
    {
        if (!empty($data)) {
            $this->heent_blurry_vision = $data;
        }
    }
    public function get_heent_blurry_vision_text()
    {
        return $this->heent_blurry_vision_text;
    }
    public function set_heent_blurry_vision_text($data)
    {
        if (!empty($data)) {
            $this->heent_blurry_vision_text = $data;
        }
    }


    public $heent_eye_discharge;
    public $heent_eye_discharge_text;
    public function get_heent_eye_discharge()
    {
        return $this->heent_eye_discharge;
    }
    public function get_heent_eye_discharge_yes()
    {
        return $this->heent_eye_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_eye_discharge_no()
    {
        return $this->heent_eye_discharge == "No" ? "CHECKED" : "";
    }
    public function set_heent_eye_discharge($data)
    {
        if (!empty($data)) {
            $this->heent_eye_discharge = $data;
        }
    }
    public function get_heent_eye_discharge_text()
    {
        return $this->heent_eye_discharge_text;
    }
    public function set_heent_eye_discharge_text($data)
    {
        if (!empty($data)) {
            $this->heent_eye_discharge_text = $data;
        }
    }


    public $heent_eye_glasses_contacts;
    public $heent_eye_glasses_contacts_text;
    public function get_heent_eye_glasses_contacts()
    {
        return $this->heent_eye_glasses_contacts;
    }
    public function get_heent_eye_glasses_contacts_yes()
    {
        return $this->heent_eye_glasses_contacts == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_eye_glasses_contacts_no()
    {
        return $this->heent_eye_glasses_contacts == "No" ? "CHECKED" : "";
    }
    public function set_heent_eye_glasses_contacts($data)
    {
        if (!empty($data)) {
            $this->heent_eye_glasses_contacts = $data;
        }
    }
    public function get_heent_eye_glasses_contacts_text()
    {
        return $this->heent_eye_glasses_contacts_text;
    }
    public function set_heent_eye_glasses_contacts_text($data)
    {
        if (!empty($data)) {
            $this->heent_eye_glasses_contacts_text = $data;
        }
    }


    public $heent_excess_tearing;
    public $heent_excess_tearing_text;
    public function get_heent_excess_tearing()
    {
        return $this->heent_excess_tearing;
    }
    public function get_heent_excess_tearing_yes()
    {
        return $this->heent_excess_tearing == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_excess_tearing_no()
    {
        return $this->heent_excess_tearing == "No" ? "CHECKED" : "";
    }
    public function set_heent_excess_tearing($data)
    {
        if (!empty($data)) {
            $this->heent_excess_tearing = $data;
        }
    }
    public function get_heent_excess_tearing_text()
    {
        return $this->heent_excess_tearing_text;
    }
    public function set_heent_excess_tearing_text($data)
    {
        if (!empty($data)) {
            $this->heent_excess_tearing_text = $data;
        }
    }


    public $heent_photophobia;
    public $heent_photophobia_text;
    public function get_heent_photophobia()
    {
        return $this->heent_photophobia;
    }
    public function get_heent_photophobia_yes()
    {
        return $this->heent_photophobia == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_photophobia_no()
    {
        return $this->heent_photophobia == "No" ? "CHECKED" : "";
    }
    public function set_heent_photophobia($data)
    {
        if (!empty($data)) {
            $this->heent_photophobia = $data;
        }
    }
    public function get_heent_photophobia_text()
    {
        return $this->heent_photophobia_text;
    }
    public function set_heent_photophobia_text($data)
    {
        if (!empty($data)) {
            $this->heent_photophobia_text = $data;
        }
    }


    public $heent_scotomata;
    public $heent_scotomata_text;
    public function get_heent_scotomata()
    {
        return $this->heent_scotomata;
    }
    public function get_heent_scotomata_yes()
    {
        return $this->heent_scotomata == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_scotomata_no()
    {
        return $this->heent_scotomata == "No" ? "CHECKED" : "";
    }
    public function set_heent_scotomata($data)
    {
        if (!empty($data)) {
            $this->heent_scotomata = $data;
        }
    }
    public function get_heent_scotomata_text()
    {
        return $this->heent_scotomata_text;
    }
    public function set_heent_scotomata_text($data)
    {
        if (!empty($data)) {
            $this->heent_scotomata_text = $data;
        }
    }


    public $heent_tunnel_vision;
    public $heent_tunnel_vision_text;
    public function get_heent_tunnel_vision()
    {
        return $this->heent_tunnel_vision;
    }
    public function get_heent_tunnel_vision_yes()
    {
        return $this->heent_tunnel_vision == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_tunnel_vision_no()
    {
        return $this->heent_tunnel_vision == "No" ? "CHECKED" : "";
    }
    public function set_heent_tunnel_vision($data)
    {
        if (!empty($data)) {
            $this->heent_tunnel_vision = $data;
        }
    }
    public function get_heent_tunnel_vision_text()
    {
        return $this->heent_tunnel_vision_text;
    }
    public function set_heent_tunnel_vision_text($data)
    {
        if (!empty($data)) {
            $this->heent_tunnel_vision_text = $data;
        }
    }


    public $heent_glaucoma;
    public $heent_glaucoma_text;
    public function get_heent_glaucoma()
    {
        return $this->heent_glaucoma;
    }
    public function get_heent_glaucoma_yes()
    {
        return $this->heent_glaucoma == "Yes" ? "CHECKED" : "";
    }
    public function get_heent_glaucoma_no()
    {
        return $this->heent_glaucoma == "No" ? "CHECKED" : "";
    }
    public function set_heent_glaucoma($data)
    {
        if (!empty($data)) {
            $this->heent_glaucoma = $data;
        }
    }
    public function get_heent_glaucoma_text()
    {
        return $this->heent_glaucoma_text;
    }
    public function set_heent_glaucoma_text($data)
    {
        if (!empty($data)) {
            $this->heent_glaucoma_text = $data;
        }
    }

    // ----- sub sternal or left chest pain -----

    public $cardiovascular_sub_sternal_or_left_chest_pain;
    public $cardiovascular_sub_sternal_or_left_chest_pain_text;
    public function get_cardiovascular_sub_sternal_or_left_chest_pain()
    {
        return $this->cardiovascular_sub_sternal_or_left_chest_pain;
    }
    public function get_cardiovascular_sub_sternal_or_left_chest_pain_yes()
    {
        return $this->cardiovascular_sub_sternal_or_left_chest_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_sub_sternal_or_left_chest_pain_no()
    {
        return $this->cardiovascular_sub_sternal_or_left_chest_pain == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_sub_sternal_or_left_chest_pain($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_sub_sternal_or_left_chest_pain = $data;
        }
    }
    public function get_cardiovascular_sub_sternal_or_left_chest_pain_text()
    {
        return $this->cardiovascular_sub_sternal_or_left_chest_pain_text;
    }
    public function set_cardiovascular_sub_sternal_or_left_chest_pain_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_sub_sternal_or_left_chest_pain_text = $data;
        }
    }


    public $cardiovascular_other_chest_pain;
    public $cardiovascular_other_chest_pain_text;
    public function get_cardiovascular_other_chest_pain()
    {
        return $this->cardiovascular_other_chest_pain;
    }
    public function get_cardiovascular_other_chest_pain_yes()
    {
        return $this->cardiovascular_other_chest_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_other_chest_pain_no()
    {
        return $this->cardiovascular_other_chest_pain == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_other_chest_pain($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_other_chest_pain = $data;
        }
    }
    public function get_cardiovascular_other_chest_pain_text()
    {
        return $this->cardiovascular_other_chest_pain_text;
    }
    public function set_cardiovascular_other_chest_pain_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_other_chest_pain_text = $data;
        }
    }


    public $cardiovascular_palpitations;
    public $cardiovascular_palpitations_text;
    public function get_cardiovascular_palpitations()
    {
        return $this->cardiovascular_palpitations;
    }
    public function get_cardiovascular_palpitations_yes()
    {
        return $this->cardiovascular_palpitations == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_palpitations_no()
    {
        return $this->cardiovascular_palpitations == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_palpitations($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_palpitations = $data;
        }
    }
    public function get_cardiovascular_palpitations_text()
    {
        return $this->cardiovascular_palpitations_text;
    }
    public function set_cardiovascular_palpitations_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_palpitations_text = $data;
        }
    }


    public $cardiovascular_irregular_rhythm;
    public $cardiovascular_irregular_rhythm_text;
    public function get_cardiovascular_irregular_rhythm()
    {
        return $this->cardiovascular_irregular_rhythm;
    }
    public function get_cardiovascular_irregular_rhythm_yes()
    {
        return $this->cardiovascular_irregular_rhythm == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_irregular_rhythm_no()
    {
        return $this->cardiovascular_irregular_rhythm == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_irregular_rhythm($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_irregular_rhythm = $data;
        }
    }
    public function get_cardiovascular_irregular_rhythm_text()
    {
        return $this->cardiovascular_irregular_rhythm_text;
    }
    public function set_cardiovascular_irregular_rhythm_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_irregular_rhythm_text = $data;
        }
    }


    public $cardiovascular_jugular_vein_distention;
    public $cardiovascular_jugular_vein_distention_text;
    public function get_cardiovascular_jugular_vein_distention()
    {
        return $this->cardiovascular_jugular_vein_distention;
    }
    public function get_cardiovascular_jugular_vein_distention_yes()
    {
        return $this->cardiovascular_jugular_vein_distention == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_jugular_vein_distention_no()
    {
        return $this->cardiovascular_jugular_vein_distention == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_jugular_vein_distention($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_jugular_vein_distention = $data;
        }
    }
    public function get_cardiovascular_jugular_vein_distention_text()
    {
        return $this->cardiovascular_jugular_vein_distention_text;
    }
    public function set_cardiovascular_jugular_vein_distention_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_jugular_vein_distention_text = $data;
        }
    }


    public $cardiovascular_claudication;
    public $cardiovascular_claudication_text;
    public function get_cardiovascular_claudication()
    {
        return $this->cardiovascular_claudication;
    }
    public function get_cardiovascular_claudication_yes()
    {
        return $this->cardiovascular_claudication == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_claudication_no()
    {
        return $this->cardiovascular_claudication == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_claudication($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_claudication = $data;
        }
    }
    public function get_cardiovascular_claudication_text()
    {
        return $this->cardiovascular_claudication_text;
    }
    public function set_cardiovascular_claudication_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_claudication_text = $data;
        }
    }


    public $cardiovascular_dizziness;
    public $cardiovascular_dizziness_text;
    public function get_cardiovascular_dizziness()
    {
        return $this->cardiovascular_dizziness;
    }
    public function get_cardiovascular_dizziness_yes()
    {
        return $this->cardiovascular_dizziness == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_dizziness_no()
    {
        return $this->cardiovascular_dizziness == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_dizziness($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_dizziness = $data;
        }
    }
    public function get_cardiovascular_dizziness_text()
    {
        return $this->cardiovascular_dizziness_text;
    }
    public function set_cardiovascular_dizziness_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_dizziness_text = $data;
        }
    }


    public $cardiovascular_dyspnea_on_exertion;
    public $cardiovascular_dyspnea_on_exertion_text;
    public function get_cardiovascular_dyspnea_on_exertion()
    {
        return $this->cardiovascular_dyspnea_on_exertion;
    }
    public function get_cardiovascular_dyspnea_on_exertion_yes()
    {
        return $this->cardiovascular_dyspnea_on_exertion == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_dyspnea_on_exertion_no()
    {
        return $this->cardiovascular_dyspnea_on_exertion == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_dyspnea_on_exertion($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_dyspnea_on_exertion = $data;
        }
    }
    public function get_cardiovascular_dyspnea_on_exertion_text()
    {
        return $this->cardiovascular_dyspnea_on_exertion_text;
    }
    public function set_cardiovascular_dyspnea_on_exertion_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_dyspnea_on_exertion_text = $data;
        }
    }


    public $cardiovascular_orthopnea;
    public $cardiovascular_orthopnea_text;
    public function get_cardiovascular_orthopnea()
    {
        return $this->cardiovascular_orthopnea;
    }
    public function get_cardiovascular_orthopnea_yes()
    {
        return $this->cardiovascular_orthopnea == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_orthopnea_no()
    {
        return $this->cardiovascular_orthopnea == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_orthopnea($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_orthopnea = $data;
        }
    }
    public function get_cardiovascular_orthopnea_text()
    {
        return $this->cardiovascular_orthopnea_text;
    }
    public function set_cardiovascular_orthopnea_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_orthopnea_text = $data;
        }
    }


    public $cardiovascular_noctural_dyspnea;
    public $cardiovascular_noctural_dyspnea_text;
    public function get_cardiovascular_noctural_dyspnea()
    {
        return $this->cardiovascular_noctural_dyspnea;
    }
    public function get_cardiovascular_noctural_dyspnea_yes()
    {
        return $this->cardiovascular_noctural_dyspnea == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_noctural_dyspnea_no()
    {
        return $this->cardiovascular_noctural_dyspnea == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_noctural_dyspnea($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_noctural_dyspnea = $data;
        }
    }
    public function get_cardiovascular_noctural_dyspnea_text()
    {
        return $this->cardiovascular_noctural_dyspnea_text;
    }
    public function set_cardiovascular_noctural_dyspnea_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_noctural_dyspnea_text = $data;
        }
    }


    public $cardiovascular_edema;
    public $cardiovascular_edema_text;
    public function get_cardiovascular_edema()
    {
        return $this->cardiovascular_edema;
    }
    public function get_cardiovascular_edema_yes()
    {
        return $this->cardiovascular_edema == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_edema_no()
    {
        return $this->cardiovascular_edema == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_edema($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_edema = $data;
        }
    }
    public function get_cardiovascular_edema_text()
    {
        return $this->cardiovascular_edema_text;
    }
    public function set_cardiovascular_edema_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_edema_text = $data;
        }
    }


    public $cardiovascular_presyncope;
    public $cardiovascular_presyncope_text;
    public function get_cardiovascular_presyncope()
    {
        return $this->cardiovascular_presyncope;
    }
    public function get_cardiovascular_presyncope_yes()
    {
        return $this->cardiovascular_presyncope == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_presyncope_no()
    {
        return $this->cardiovascular_presyncope == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_presyncope($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_presyncope = $data;
        }
    }
    public function get_cardiovascular_presyncope_text()
    {
        return $this->cardiovascular_presyncope_text;
    }
    public function set_cardiovascular_presyncope_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_presyncope_text = $data;
        }
    }


    public $cardiovascular_syncope;
    public $cardiovascular_syncope_text;
    public function get_cardiovascular_syncope()
    {
        return $this->cardiovascular_syncope;
    }
    public function get_cardiovascular_syncope_yes()
    {
        return $this->cardiovascular_syncope == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_syncope_no()
    {
        return $this->cardiovascular_syncope == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_syncope($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_syncope = $data;
        }
    }
    public function get_cardiovascular_syncope_text()
    {
        return $this->cardiovascular_syncope_text;
    }
    public function set_cardiovascular_syncope_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_syncope_text = $data;
        }
    }


    public $cardiovascular_heart_murmur;
    public $cardiovascular_heart_murmur_text;
    public function get_cardiovascular_heart_murmur()
    {
        return $this->cardiovascular_heart_murmur;
    }
    public function get_cardiovascular_heart_murmur_yes()
    {
        return $this->cardiovascular_heart_murmur == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_heart_murmur_no()
    {
        return $this->cardiovascular_heart_murmur == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_heart_murmur($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_heart_murmur = $data;
        }
    }
    public function get_cardiovascular_heart_murmur_text()
    {
        return $this->cardiovascular_heart_murmur_text;
    }
    public function set_cardiovascular_heart_murmur_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_heart_murmur_text = $data;
        }
    }


    public $cardiovascular_raynauds;
    public $cardiovascular_raynauds_text;
    public function get_cardiovascular_raynauds()
    {
        return $this->cardiovascular_raynauds;
    }
    public function get_cardiovascular_raynauds_yes()
    {
        return $this->cardiovascular_raynauds == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_raynauds_no()
    {
        return $this->cardiovascular_raynauds == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_raynauds($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_raynauds = $data;
        }
    }
    public function get_cardiovascular_raynauds_text()
    {
        return $this->cardiovascular_raynauds_text;
    }
    public function set_cardiovascular_raynauds_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_raynauds_text = $data;
        }
    }


    public $cardiovascular_severe_varicose_veins;
    public $cardiovascular_severe_varicose_veins_text;
    public function get_cardiovascular_severe_varicose_veins()
    {
        return $this->cardiovascular_severe_varicose_veins;
    }
    public function get_cardiovascular_severe_varicose_veins_yes()
    {
        return $this->cardiovascular_severe_varicose_veins == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_severe_varicose_veins_no()
    {
        return $this->cardiovascular_severe_varicose_veins == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_severe_varicose_veins($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_severe_varicose_veins = $data;
        }
    }
    public function get_cardiovascular_severe_varicose_veins_text()
    {
        return $this->cardiovascular_severe_varicose_veins_text;
    }
    public function set_cardiovascular_severe_varicose_veins_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_severe_varicose_veins_text = $data;
        }
    }


    public $cardiovascular_deep_vein_thrombosis;
    public $cardiovascular_deep_vein_thrombosis_text;
    public function get_cardiovascular_deep_vein_thrombosis()
    {
        return $this->cardiovascular_deep_vein_thrombosis;
    }
    public function get_cardiovascular_deep_vein_thrombosis_yes()
    {
        return $this->cardiovascular_deep_vein_thrombosis == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_deep_vein_thrombosis_no()
    {
        return $this->cardiovascular_deep_vein_thrombosis == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_deep_vein_thrombosis($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_deep_vein_thrombosis = $data;
        }
    }
    public function get_cardiovascular_deep_vein_thrombosis_text()
    {
        return $this->cardiovascular_deep_vein_thrombosis_text;
    }
    public function set_cardiovascular_deep_vein_thrombosis_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_deep_vein_thrombosis_text = $data;
        }
    }


    public $cardiovascular_thrombophlebitis;
    public $cardiovascular_thrombophlebitis_text;
    public function get_cardiovascular_thrombophlebitis()
    {
        return $this->cardiovascular_thrombophlebitis;
    }
    public function get_cardiovascular_thrombophlebitis_yes()
    {
        return $this->cardiovascular_thrombophlebitis == "Yes" ? "CHECKED" : "";
    }
    public function get_cardiovascular_thrombophlebitis_no()
    {
        return $this->cardiovascular_thrombophlebitis == "No" ? "CHECKED" : "";
    }
    public function set_cardiovascular_thrombophlebitis($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_thrombophlebitis = $data;
        }
    }
    public function get_cardiovascular_thrombophlebitis_text()
    {
        return $this->cardiovascular_thrombophlebitis_text;
    }
    public function set_cardiovascular_thrombophlebitis_text($data)
    {
        if (!empty($data)) {
            $this->cardiovascular_thrombophlebitis_text = $data;
        }
    }

    // ----- cough -----

    public $respirations_cough;
    public $respirations_cough_text;
    public function get_respirations_cough()
    {
        return $this->respirations_cough;
    }
    public function get_respirations_cough_yes()
    {
        return $this->respirations_cough == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_cough_no()
    {
        return $this->respirations_cough == "No" ? "CHECKED" : "";
    }
    public function set_respirations_cough($data)
    {
        if (!empty($data)) {
            $this->respirations_cough = $data;
        }
    }
    public function get_respirations_cough_text()
    {
        return $this->respirations_cough_text;
    }
    public function set_respirations_cough_text($data)
    {
        if (!empty($data)) {
            $this->respirations_cough_text = $data;
        }
    }


    public $respirations_sputum;
    public $respirations_sputum_text;
    public function get_respirations_sputum()
    {
        return $this->respirations_sputum;
    }
    public function get_respirations_sputum_yes()
    {
        return $this->respirations_sputum == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_sputum_no()
    {
        return $this->respirations_sputum == "No" ? "CHECKED" : "";
    }
    public function set_respirations_sputum($data)
    {
        if (!empty($data)) {
            $this->respirations_sputum = $data;
        }
    }
    public function get_respirations_sputum_text()
    {
        return $this->respirations_sputum_text;
    }
    public function set_respirations_sputum_text($data)
    {
        if (!empty($data)) {
            $this->respirations_sputum_text = $data;
        }
    }


    public $respirations_dyspnea;
    public $respirations_dyspnea_text;
    public function get_respirations_dyspnea()
    {
        return $this->respirations_dyspnea;
    }
    public function get_respirations_dyspnea_yes()
    {
        return $this->respirations_dyspnea == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_dyspnea_no()
    {
        return $this->respirations_dyspnea == "No" ? "CHECKED" : "";
    }
    public function set_respirations_dyspnea($data)
    {
        if (!empty($data)) {
            $this->respirations_dyspnea = $data;
        }
    }
    public function get_respirations_dyspnea_text()
    {
        return $this->respirations_dyspnea_text;
    }
    public function set_respirations_dyspnea_text($data)
    {
        if (!empty($data)) {
            $this->respirations_dyspnea_text = $data;
        }
    }


    public $respirations_wheezes;
    public $respirations_wheezes_text;
    public function get_respirations_wheezes()
    {
        return $this->respirations_wheezes;
    }
    public function get_respirations_wheezes_yes()
    {
        return $this->respirations_wheezes == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_wheezes_no()
    {
        return $this->respirations_wheezes == "No" ? "CHECKED" : "";
    }
    public function set_respirations_wheezes($data)
    {
        if (!empty($data)) {
            $this->respirations_wheezes = $data;
        }
    }
    public function get_respirations_wheezes_text()
    {
        return $this->respirations_wheezes_text;
    }
    public function set_respirations_wheezes_text($data)
    {
        if (!empty($data)) {
            $this->respirations_wheezes_text = $data;
        }
    }


    public $respirations_rales;
    public $respirations_rales_text;
    public function get_respirations_rales()
    {
        return $this->respirations_rales;
    }
    public function get_respirations_rales_yes()
    {
        return $this->respirations_rales == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_rales_no()
    {
        return $this->respirations_rales == "No" ? "CHECKED" : "";
    }
    public function set_respirations_rales($data)
    {
        if (!empty($data)) {
            $this->respirations_rales = $data;
        }
    }
    public function get_respirations_rales_text()
    {
        return $this->respirations_rales_text;
    }
    public function set_respirations_rales_text($data)
    {
        if (!empty($data)) {
            $this->respirations_rales_text = $data;
        }
    }


    public $respirations_labored_breathing;
    public $respirations_labored_breathing_text;
    public function get_respirations_labored_breathing()
    {
        return $this->respirations_labored_breathing;
    }
    public function get_respirations_labored_breathing_yes()
    {
        return $this->respirations_labored_breathing == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_labored_breathing_no()
    {
        return $this->respirations_labored_breathing == "No" ? "CHECKED" : "";
    }
    public function set_respirations_labored_breathing($data)
    {
        if (!empty($data)) {
            $this->respirations_labored_breathing = $data;
        }
    }
    public function get_respirations_labored_breathing_text()
    {
        return $this->respirations_labored_breathing_text;
    }
    public function set_respirations_labored_breathing_text($data)
    {
        if (!empty($data)) {
            $this->respirations_labored_breathing_text = $data;
        }
    }


    public $respirations_hemoptysis;
    public $respirations_hemoptysis_text;
    public function get_respirations_hemoptysis()
    {
        return $this->respirations_hemoptysis;
    }
    public function get_respirations_hemoptysis_yes()
    {
        return $this->respirations_hemoptysis == "Yes" ? "CHECKED" : "";
    }
    public function get_respirations_hemoptysis_no()
    {
        return $this->respirations_hemoptysis == "No" ? "CHECKED" : "";
    }
    public function set_respirations_hemoptysis($data)
    {
        if (!empty($data)) {
            $this->respirations_hemoptysis = $data;
        }
    }
    public function get_respirations_hemoptysis_text()
    {
        return $this->respirations_hemoptysis_text;
    }
    public function set_respirations_hemoptysis_text($data)
    {
        if (!empty($data)) {
            $this->respirations_hemoptysis_text = $data;
        }
    }

    // ----- frequent urination -----

    public $gu_frequent_urination;
    public $gu_frequent_urination_text;
    public function get_gu_frequent_urination()
    {
        return $this->gu_frequent_urination;
    }
    public function get_gu_frequent_urination_yes()
    {
        return $this->gu_frequent_urination == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_frequent_urination_no()
    {
        return $this->gu_frequent_urination == "No" ? "CHECKED" : "";
    }
    public function set_gu_frequent_urination($data)
    {
        if (!empty($data)) {
            $this->gu_frequent_urination = $data;
        }
    }
    public function get_gu_frequent_urination_text()
    {
        return $this->gu_frequent_urination_text;
    }
    public function set_gu_frequent_urination_text($data)
    {
        if (!empty($data)) {
            $this->gu_frequent_urination_text = $data;
        }
    }


    public $gu_dysuria;
    public $gu_dysuria_text;
    public function get_gu_dysuria()
    {
        return $this->gu_dysuria;
    }
    public function get_gu_dysuria_yes()
    {
        return $this->gu_dysuria == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_dysuria_no()
    {
        return $this->gu_dysuria == "No" ? "CHECKED" : "";
    }
    public function set_gu_dysuria($data)
    {
        if (!empty($data)) {
            $this->gu_dysuria = $data;
        }
    }
    public function get_gu_dysuria_text()
    {
        return $this->gu_dysuria_text;
    }
    public function set_gu_dysuria_text($data)
    {
        if (!empty($data)) {
            $this->gu_dysuria_text = $data;
        }
    }


    public $gu_dyspareunia;
    public $gu_dyspareunia_text;
    public function get_gu_dyspareunia()
    {
        return $this->gu_dyspareunia;
    }
    public function get_gu_dyspareunia_yes()
    {
        return $this->gu_dyspareunia == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_dyspareunia_no()
    {
        return $this->gu_dyspareunia == "No" ? "CHECKED" : "";
    }
    public function set_gu_dyspareunia($data)
    {
        if (!empty($data)) {
            $this->gu_dyspareunia = $data;
        }
    }
    public function get_gu_dyspareunia_text()
    {
        return $this->gu_dyspareunia_text;
    }
    public function set_gu_dyspareunia_text($data)
    {
        if (!empty($data)) {
            $this->gu_dyspareunia_text = $data;
        }
    }


    public $gu_discharge;
    public $gu_discharge_text;
    public function get_gu_discharge()
    {
        return $this->gu_discharge;
    }
    public function get_gu_discharge_yes()
    {
        return $this->gu_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_discharge_no()
    {
        return $this->gu_discharge == "No" ? "CHECKED" : "";
    }
    public function set_gu_discharge($data)
    {
        if (!empty($data)) {
            $this->gu_discharge = $data;
        }
    }
    public function get_gu_discharge_text()
    {
        return $this->gu_discharge_text;
    }
    public function set_gu_discharge_text($data)
    {
        if (!empty($data)) {
            $this->gu_discharge_text = $data;
        }
    }


    public $gu_odor;
    public $gu_odor_text;
    public function get_gu_odor()
    {
        return $this->gu_odor;
    }
    public function get_gu_odor_yes()
    {
        return $this->gu_odor == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_odor_no()
    {
        return $this->gu_odor == "No" ? "CHECKED" : "";
    }
    public function set_gu_odor($data)
    {
        if (!empty($data)) {
            $this->gu_odor = $data;
        }
    }
    public function get_gu_odor_text()
    {
        return $this->gu_odor_text;
    }
    public function set_gu_odor_text($data)
    {
        if (!empty($data)) {
            $this->gu_odor_text = $data;
        }
    }


    public $gu_fertility_problems;
    public $gu_fertility_problems_text;
    public function get_gu_fertility_problems()
    {
        return $this->gu_fertility_problems;
    }
    public function get_gu_fertility_problems_yes()
    {
        return $this->gu_fertility_problems == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_fertility_problems_no()
    {
        return $this->gu_fertility_problems == "No" ? "CHECKED" : "";
    }
    public function set_gu_fertility_problems($data)
    {
        if (!empty($data)) {
            $this->gu_fertility_problems = $data;
        }
    }
    public function get_gu_fertility_problems_text()
    {
        return $this->gu_fertility_problems_text;
    }
    public function set_gu_fertility_problems_text($data)
    {
        if (!empty($data)) {
            $this->gu_fertility_problems_text = $data;
        }
    }


    public $gu_flank_pain_kidney_stone;
    public $gu_flank_pain_kidney_stone_text;
    public function get_gu_flank_pain_kidney_stone()
    {
        return $this->gu_flank_pain_kidney_stone;
    }
    public function get_gu_flank_pain_kidney_stone_yes()
    {
        return $this->gu_flank_pain_kidney_stone == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_flank_pain_kidney_stone_no()
    {
        return $this->gu_flank_pain_kidney_stone == "No" ? "CHECKED" : "";
    }
    public function set_gu_flank_pain_kidney_stone($data)
    {
        if (!empty($data)) {
            $this->gu_flank_pain_kidney_stone = $data;
        }
    }
    public function get_gu_flank_pain_kidney_stone_text()
    {
        return $this->gu_flank_pain_kidney_stone_text;
    }
    public function set_gu_flank_pain_kidney_stone_text($data)
    {
        if (!empty($data)) {
            $this->gu_flank_pain_kidney_stone_text = $data;
        }
    }


    public $gu_polyuria;
    public $gu_polyuria_text;
    public function get_gu_polyuria()
    {
        return $this->gu_polyuria;
    }
    public function get_gu_polyuria_yes()
    {
        return $this->gu_polyuria == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_polyuria_no()
    {
        return $this->gu_polyuria == "No" ? "CHECKED" : "";
    }
    public function set_gu_polyuria($data)
    {
        if (!empty($data)) {
            $this->gu_polyuria = $data;
        }
    }
    public function get_gu_polyuria_text()
    {
        return $this->gu_polyuria_text;
    }
    public function set_gu_polyuria_text($data)
    {
        if (!empty($data)) {
            $this->gu_polyuria_text = $data;
        }
    }


    public $gu_hematuria;
    public $gu_hematuria_text;
    public function get_gu_hematuria()
    {
        return $this->gu_hematuria;
    }
    public function get_gu_hematuria_yes()
    {
        return $this->gu_hematuria == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_hematuria_no()
    {
        return $this->gu_hematuria == "No" ? "CHECKED" : "";
    }
    public function set_gu_hematuria($data)
    {
        if (!empty($data)) {
            $this->gu_hematuria = $data;
        }
    }
    public function get_gu_hematuria_text()
    {
        return $this->gu_hematuria_text;
    }
    public function set_gu_hematuria_text($data)
    {
        if (!empty($data)) {
            $this->gu_hematuria_text = $data;
        }
    }


    public $gu_pyuria;
    public $gu_pyuria_text;
    public function get_gu_pyuria()
    {
        return $this->gu_pyuria;
    }
    public function get_gu_pyuria_yes()
    {
        return $this->gu_pyuria == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_pyuria_no()
    {
        return $this->gu_pyuria == "No" ? "CHECKED" : "";
    }
    public function set_gu_pyuria($data)
    {
        if (!empty($data)) {
            $this->gu_pyuria = $data;
        }
    }
    public function get_gu_pyuria_text()
    {
        return $this->gu_pyuria_text;
    }
    public function set_gu_pyuria_text($data)
    {
        if (!empty($data)) {
            $this->gu_pyuria_text = $data;
        }
    }


    public $gu_umbilical_hernia;
    public $gu_umbilical_hernia_text;
    public function get_gu_umbilical_hernia()
    {
        return $this->gu_umbilical_hernia;
    }
    public function get_gu_umbilical_hernia_yes()
    {
        return $this->gu_umbilical_hernia == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_umbilical_hernia_no()
    {
        return $this->gu_umbilical_hernia == "No" ? "CHECKED" : "";
    }
    public function set_gu_umbilical_hernia($data)
    {
        if (!empty($data)) {
            $this->gu_umbilical_hernia = $data;
        }
    }
    public function get_gu_umbilical_hernia_text()
    {
        return $this->gu_umbilical_hernia_text;
    }
    public function set_gu_umbilical_hernia_text($data)
    {
        if (!empty($data)) {
            $this->gu_umbilical_hernia_text = $data;
        }
    }


    public $gu_incontinence;
    public $gu_incontinence_text;
    public function get_gu_incontinence()
    {
        return $this->gu_incontinence;
    }
    public function get_gu_incontinence_yes()
    {
        return $this->gu_incontinence == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_incontinence_no()
    {
        return $this->gu_incontinence == "No" ? "CHECKED" : "";
    }
    public function set_gu_incontinence($data)
    {
        if (!empty($data)) {
            $this->gu_incontinence = $data;
        }
    }
    public function get_gu_incontinence_text()
    {
        return $this->gu_incontinence_text;
    }
    public function set_gu_incontinence_text($data)
    {
        if (!empty($data)) {
            $this->gu_incontinence_text = $data;
        }
    }


    public $gu_nocturia;
    public $gu_nocturia_text;
    public function get_gu_nocturia()
    {
        return $this->gu_nocturia;
    }
    public function get_gu_nocturia_yes()
    {
        return $this->gu_nocturia == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_nocturia_no()
    {
        return $this->gu_nocturia == "No" ? "CHECKED" : "";
    }
    public function set_gu_nocturia($data)
    {
        if (!empty($data)) {
            $this->gu_nocturia = $data;
        }
    }
    public function get_gu_nocturia_text()
    {
        return $this->gu_nocturia_text;
    }
    public function set_gu_nocturia_text($data)
    {
        if (!empty($data)) {
            $this->gu_nocturia_text = $data;
        }
    }


    public $gu_urinary_urgency;
    public $gu_urinary_urgency_text;
    public function get_gu_urinary_urgency()
    {
        return $this->gu_urinary_urgency;
    }
    public function get_gu_urinary_urgency_yes()
    {
        return $this->gu_urinary_urgency == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_urinary_urgency_no()
    {
        return $this->gu_urinary_urgency == "No" ? "CHECKED" : "";
    }
    public function set_gu_urinary_urgency($data)
    {
        if (!empty($data)) {
            $this->gu_urinary_urgency = $data;
        }
    }
    public function get_gu_urinary_urgency_text()
    {
        return $this->gu_urinary_urgency_text;
    }
    public function set_gu_urinary_urgency_text($data)
    {
        if (!empty($data)) {
            $this->gu_urinary_urgency_text = $data;
        }
    }


    public $gu_recurrent_utis;
    public $gu_recurrent_utis_text;
    public function get_gu_recurrent_utis()
    {
        return $this->gu_recurrent_utis;
    }
    public function get_gu_recurrent_utis_yes()
    {
        return $this->gu_recurrent_utis == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_recurrent_utis_no()
    {
        return $this->gu_recurrent_utis == "No" ? "CHECKED" : "";
    }
    public function set_gu_recurrent_utis($data)
    {
        if (!empty($data)) {
            $this->gu_recurrent_utis = $data;
        }
    }
    public function get_gu_recurrent_utis_text()
    {
        return $this->gu_recurrent_utis_text;
    }
    public function set_gu_recurrent_utis_text($data)
    {
        if (!empty($data)) {
            $this->gu_recurrent_utis_text = $data;
        }
    }


    public $gu_venereal_disease;
    public $gu_venereal_disease_text;
    public function get_gu_venereal_disease()
    {
        return $this->gu_venereal_disease;
    }
    public function get_gu_venereal_disease_yes()
    {
        return $this->gu_venereal_disease == "Yes" ? "CHECKED" : "";
    }
    public function get_gu_venereal_disease_no()
    {
        return $this->gu_venereal_disease == "No" ? "CHECKED" : "";
    }
    public function set_gu_venereal_disease($data)
    {
        if (!empty($data)) {
            $this->gu_venereal_disease = $data;
        }
    }
    public function get_gu_venereal_disease_text()
    {
        return $this->gu_venereal_disease_text;
    }
    public function set_gu_venereal_disease_text($data)
    {
        if (!empty($data)) {
            $this->gu_venereal_disease_text = $data;
        }
    }

    // ----- Erectile Dysfunction -----

    public $male_gu_erectile_dysfunction;
    public $male_gu_erectile_dysfunction_text;
    public function get_male_gu_erectile_dysfunction()
    {
        return $this->male_gu_erectile_dysfunction;
    }
    public function get_male_gu_erectile_dysfunction_yes()
    {
        return $this->male_gu_erectile_dysfunction == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_erectile_dysfunction_no()
    {
        return $this->male_gu_erectile_dysfunction == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_erectile_dysfunction($data)
    {
        if (!empty($data)) {
            $this->male_gu_erectile_dysfunction = $data;
        }
    }
    public function get_male_gu_erectile_dysfunction_text()
    {
        return $this->male_gu_erectile_dysfunction_text;
    }
    public function set_male_gu_erectile_dysfunction_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_erectile_dysfunction_text = $data;
        }
    }


    public $male_gu_inguinal_hernia;
    public $male_gu_inguinal_hernia_text;
    public function get_male_gu_inguinal_hernia()
    {
        return $this->male_gu_inguinal_hernia;
    }
    public function get_male_gu_inguinal_hernia_yes()
    {
        return $this->male_gu_inguinal_hernia == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_inguinal_hernia_no()
    {
        return $this->male_gu_inguinal_hernia == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_inguinal_hernia($data)
    {
        if (!empty($data)) {
            $this->male_gu_inguinal_hernia = $data;
        }
    }
    public function get_male_gu_inguinal_hernia_text()
    {
        return $this->male_gu_inguinal_hernia_text;
    }
    public function set_male_gu_inguinal_hernia_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_inguinal_hernia_text = $data;
        }
    }


    public $male_gu_penile_lesions;
    public $male_gu_penile_lesions_text;
    public function get_male_gu_penile_lesions()
    {
        return $this->male_gu_penile_lesions;
    }
    public function get_male_gu_penile_lesions_yes()
    {
        return $this->male_gu_penile_lesions == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_penile_lesions_no()
    {
        return $this->male_gu_penile_lesions == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_penile_lesions($data)
    {
        if (!empty($data)) {
            $this->male_gu_penile_lesions = $data;
        }
    }
    public function get_male_gu_penile_lesions_text()
    {
        return $this->male_gu_penile_lesions_text;
    }
    public function set_male_gu_penile_lesions_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_penile_lesions_text = $data;
        }
    }


    public $male_gu_scrotal_mass;
    public $male_gu_scrotal_mass_text;
    public function get_male_gu_scrotal_mass()
    {
        return $this->male_gu_scrotal_mass;
    }
    public function get_male_gu_scrotal_mass_yes()
    {
        return $this->male_gu_scrotal_mass == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_scrotal_mass_no()
    {
        return $this->male_gu_scrotal_mass == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_scrotal_mass($data)
    {
        if (!empty($data)) {
            $this->male_gu_scrotal_mass = $data;
        }
    }
    public function get_male_gu_scrotal_mass_text()
    {
        return $this->male_gu_scrotal_mass_text;
    }
    public function set_male_gu_scrotal_mass_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_scrotal_mass_text = $data;
        }
    }


    public $male_gu_testicular_pain;
    public $male_gu_testicular_pain_text;
    public function get_male_gu_testicular_pain()
    {
        return $this->male_gu_testicular_pain;
    }
    public function get_male_gu_testicular_pain_yes()
    {
        return $this->male_gu_testicular_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_testicular_pain_no()
    {
        return $this->male_gu_testicular_pain == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_testicular_pain($data)
    {
        if (!empty($data)) {
            $this->male_gu_testicular_pain = $data;
        }
    }
    public function get_male_gu_testicular_pain_text()
    {
        return $this->male_gu_testicular_pain_text;
    }
    public function set_male_gu_testicular_pain_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_testicular_pain_text = $data;
        }
    }


    public $male_gu_urethral_discharge;
    public $male_gu_urethral_discharge_text;
    public function get_male_gu_urethral_discharge()
    {
        return $this->male_gu_urethral_discharge;
    }
    public function get_male_gu_urethral_discharge_yes()
    {
        return $this->male_gu_urethral_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_urethral_discharge_no()
    {
        return $this->male_gu_urethral_discharge == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_urethral_discharge($data)
    {
        if (!empty($data)) {
            $this->male_gu_urethral_discharge = $data;
        }
    }
    public function get_male_gu_urethral_discharge_text()
    {
        return $this->male_gu_urethral_discharge_text;
    }
    public function set_male_gu_urethral_discharge_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_urethral_discharge_text = $data;
        }
    }


    public $male_gu_weak_urinary_stream;
    public $male_gu_weak_urinary_stream_text;
    public function get_male_gu_weak_urinary_stream()
    {
        return $this->male_gu_weak_urinary_stream;
    }
    public function get_male_gu_weak_urinary_stream_yes()
    {
        return $this->male_gu_weak_urinary_stream == "Yes" ? "CHECKED" : "";
    }
    public function get_male_gu_weak_urinary_stream_no()
    {
        return $this->male_gu_weak_urinary_stream == "No" ? "CHECKED" : "";
    }
    public function set_male_gu_weak_urinary_stream($data)
    {
        if (!empty($data)) {
            $this->male_gu_weak_urinary_stream = $data;
        }
    }
    public function get_male_gu_weak_urinary_stream_text()
    {
        return $this->male_gu_weak_urinary_stream_text;
    }
    public function set_male_gu_weak_urinary_stream_text($data)
    {
        if (!empty($data)) {
            $this->male_gu_weak_urinary_stream_text = $data;
        }
    }

    // ----- Abnormal Menses -----

    public $female_gu_abnormal_menses;
    public $female_gu_abnormal_menses_text;
    public function get_female_gu_abnormal_menses()
    {
        return $this->female_gu_abnormal_menses;
    }
    public function get_female_gu_abnormal_menses_yes()
    {
        return $this->female_gu_abnormal_menses == "Yes" ? "CHECKED" : "";
    }
    public function get_female_gu_abnormal_menses_no()
    {
        return $this->female_gu_abnormal_menses == "No" ? "CHECKED" : "";
    }
    public function set_female_gu_abnormal_menses($data)
    {
        if (!empty($data)) {
            $this->female_gu_abnormal_menses = $data;
        }
    }
    public function get_female_gu_abnormal_menses_text()
    {
        return $this->female_gu_abnormal_menses_text;
    }
    public function set_female_gu_abnormal_menses_text($data)
    {
        if (!empty($data)) {
            $this->female_gu_abnormal_menses_text = $data;
        }
    }


    public $female_gu_abnormal_vaginal_bleeding;
    public $female_gu_abnormal_vaginal_bleeding_text;
    public function get_female_gu_abnormal_vaginal_bleeding()
    {
        return $this->female_gu_abnormal_vaginal_bleeding;
    }
    public function get_female_gu_abnormal_vaginal_bleeding_yes()
    {
        return $this->female_gu_abnormal_vaginal_bleeding == "Yes" ? "CHECKED" : "";
    }
    public function get_female_gu_abnormal_vaginal_bleeding_no()
    {
        return $this->female_gu_abnormal_vaginal_bleeding == "No" ? "CHECKED" : "";
    }
    public function set_female_gu_abnormal_vaginal_bleeding($data)
    {
        if (!empty($data)) {
            $this->female_gu_abnormal_vaginal_bleeding = $data;
        }
    }
    public function get_female_gu_abnormal_vaginal_bleeding_text()
    {
        return $this->female_gu_abnormal_vaginal_bleeding_text;
    }
    public function set_female_gu_abnormal_vaginal_bleeding_text($data)
    {
        if (!empty($data)) {
            $this->female_gu_abnormal_vaginal_bleeding_text = $data;
        }
    }


    public $female_gu_vaginal_discharge;
    public $female_gu_vaginal_discharge_text;
    public function get_female_gu_vaginal_discharge()
    {
        return $this->female_gu_vaginal_discharge;
    }
    public function get_female_gu_vaginal_discharge_yes()
    {
        return $this->female_gu_vaginal_discharge == "Yes" ? "CHECKED" : "";
    }
    public function get_female_gu_vaginal_discharge_no()
    {
        return $this->female_gu_vaginal_discharge == "No" ? "CHECKED" : "";
    }
    public function set_female_gu_vaginal_discharge($data)
    {
        if (!empty($data)) {
            $this->female_gu_vaginal_discharge = $data;
        }
    }
    public function get_female_gu_vaginal_discharge_text()
    {
        return $this->female_gu_vaginal_discharge_text;
    }
    public function set_female_gu_vaginal_discharge_text($data)
    {
        if (!empty($data)) {
            $this->female_gu_vaginal_discharge_text = $data;
        }
    }

    // ----- abdominal pain -----

    public $gi_abdominal_pain;
    public $gi_abdominal_pain_text;
    public function get_gi_abdominal_pain()
    {
        return $this->gi_abdominal_pain;
    }
    public function get_gi_abdominal_pain_yes()
    {
        return $this->gi_abdominal_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_abdominal_pain_no()
    {
        return $this->gi_abdominal_pain == "No" ? "CHECKED" : "";
    }
    public function set_gi_abdominal_pain($data)
    {
        if (!empty($data)) {
            $this->gi_abdominal_pain = $data;
        }
    }
    public function get_gi_abdominal_pain_text()
    {
        return $this->gi_abdominal_pain_text;
    }
    public function set_gi_abdominal_pain_text($data)
    {
        if (!empty($data)) {
            $this->gi_abdominal_pain_text = $data;
        }
    }


    public $gi_cramps;
    public $gi_cramps_text;
    public function get_gi_cramps()
    {
        return $this->gi_cramps;
    }
    public function get_gi_cramps_yes()
    {
        return $this->gi_cramps == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_cramps_no()
    {
        return $this->gi_cramps == "No" ? "CHECKED" : "";
    }
    public function set_gi_cramps($data)
    {
        if (!empty($data)) {
            $this->gi_cramps = $data;
        }
    }
    public function get_gi_cramps_text()
    {
        return $this->gi_cramps_text;
    }
    public function set_gi_cramps_text($data)
    {
        if (!empty($data)) {
            $this->gi_cramps_text = $data;
        }
    }


    public $gi_tenderness;
    public $gi_tenderness_text;
    public function get_gi_tenderness()
    {
        return $this->gi_tenderness;
    }
    public function get_gi_tenderness_yes()
    {
        return $this->gi_tenderness == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_tenderness_no()
    {
        return $this->gi_tenderness == "No" ? "CHECKED" : "";
    }
    public function set_gi_tenderness($data)
    {
        if (!empty($data)) {
            $this->gi_tenderness = $data;
        }
    }
    public function get_gi_tenderness_text()
    {
        return $this->gi_tenderness_text;
    }
    public function set_gi_tenderness_text($data)
    {
        if (!empty($data)) {
            $this->gi_tenderness_text = $data;
        }
    }


    public $gi_vomiting;
    public $gi_vomiting_text;
    public function get_gi_vomiting()
    {
        return $this->gi_vomiting;
    }
    public function get_gi_vomiting_yes()
    {
        return $this->gi_vomiting == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_vomiting_no()
    {
        return $this->gi_vomiting == "No" ? "CHECKED" : "";
    }
    public function set_gi_vomiting($data)
    {
        if (!empty($data)) {
            $this->gi_vomiting = $data;
        }
    }
    public function get_gi_vomiting_text()
    {
        return $this->gi_vomiting_text;
    }
    public function set_gi_vomiting_text($data)
    {
        if (!empty($data)) {
            $this->gi_vomiting_text = $data;
        }
    }


    public $gi_frequent_diarrhea;
    public $gi_frequent_diarrhea_text;
    public function get_gi_frequent_diarrhea()
    {
        return $this->gi_frequent_diarrhea;
    }
    public function get_gi_frequent_diarrhea_yes()
    {
        return $this->gi_frequent_diarrhea == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_frequent_diarrhea_no()
    {
        return $this->gi_frequent_diarrhea == "No" ? "CHECKED" : "";
    }
    public function set_gi_frequent_diarrhea($data)
    {
        if (!empty($data)) {
            $this->gi_frequent_diarrhea = $data;
        }
    }
    public function get_gi_frequent_diarrhea_text()
    {
        return $this->gi_frequent_diarrhea_text;
    }
    public function set_gi_frequent_diarrhea_text($data)
    {
        if (!empty($data)) {
            $this->gi_frequent_diarrhea_text = $data;
        }
    }


    public $gi_significant_constipation;
    public $gi_significant_constipation_text;
    public function get_gi_significant_constipation()
    {
        return $this->gi_significant_constipation;
    }
    public function get_gi_significant_constipation_yes()
    {
        return $this->gi_significant_constipation == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_significant_constipation_no()
    {
        return $this->gi_significant_constipation == "No" ? "CHECKED" : "";
    }
    public function set_gi_significant_constipation($data)
    {
        if (!empty($data)) {
            $this->gi_significant_constipation = $data;
        }
    }
    public function get_gi_significant_constipation_text()
    {
        return $this->gi_significant_constipation_text;
    }
    public function set_gi_significant_constipation_text($data)
    {
        if (!empty($data)) {
            $this->gi_significant_constipation_text = $data;
        }
    }


    public $gi_excessive_belching;
    public $gi_excessive_belching_text;
    public function get_gi_excessive_belching()
    {
        return $this->gi_excessive_belching;
    }
    public function get_gi_excessive_belching_yes()
    {
        return $this->gi_excessive_belching == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_excessive_belching_no()
    {
        return $this->gi_excessive_belching == "No" ? "CHECKED" : "";
    }
    public function set_gi_excessive_belching($data)
    {
        if (!empty($data)) {
            $this->gi_excessive_belching = $data;
        }
    }
    public function get_gi_excessive_belching_text()
    {
        return $this->gi_excessive_belching_text;
    }
    public function set_gi_excessive_belching_text($data)
    {
        if (!empty($data)) {
            $this->gi_excessive_belching_text = $data;
        }
    }


    public $gi_changed_bowel_habits;
    public $gi_changed_bowel_habits_text;
    public function get_gi_changed_bowel_habits()
    {
        return $this->gi_changed_bowel_habits;
    }
    public function get_gi_changed_bowel_habits_yes()
    {
        return $this->gi_changed_bowel_habits == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_changed_bowel_habits_no()
    {
        return $this->gi_changed_bowel_habits == "No" ? "CHECKED" : "";
    }
    public function set_gi_changed_bowel_habits($data)
    {
        if (!empty($data)) {
            $this->gi_changed_bowel_habits = $data;
        }
    }
    public function get_gi_changed_bowel_habits_text()
    {
        return $this->gi_changed_bowel_habits_text;
    }
    public function set_gi_changed_bowel_habits_text($data)
    {
        if (!empty($data)) {
            $this->gi_changed_bowel_habits_text = $data;
        }
    }


    public $gi_excessive_flatulence;
    public $gi_excessive_flatulence_text;
    public function get_gi_excessive_flatulence()
    {
        return $this->gi_excessive_flatulence;
    }
    public function get_gi_excessive_flatulence_yes()
    {
        return $this->gi_excessive_flatulence == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_excessive_flatulence_no()
    {
        return $this->gi_excessive_flatulence == "No" ? "CHECKED" : "";
    }
    public function set_gi_excessive_flatulence($data)
    {
        if (!empty($data)) {
            $this->gi_excessive_flatulence = $data;
        }
    }
    public function get_gi_excessive_flatulence_text()
    {
        return $this->gi_excessive_flatulence_text;
    }
    public function set_gi_excessive_flatulence_text($data)
    {
        if (!empty($data)) {
            $this->gi_excessive_flatulence_text = $data;
        }
    }


    public $gi_hematemesis;
    public $gi_hematemesis_text;
    public function get_gi_hematemesis()
    {
        return $this->gi_hematemesis;
    }
    public function get_gi_hematemesis_yes()
    {
        return $this->gi_hematemesis == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_hematemesis_no()
    {
        return $this->gi_hematemesis == "No" ? "CHECKED" : "";
    }
    public function set_gi_hematemesis($data)
    {
        if (!empty($data)) {
            $this->gi_hematemesis = $data;
        }
    }
    public function get_gi_hematemesis_text()
    {
        return $this->gi_hematemesis_text;
    }
    public function set_gi_hematemesis_text($data)
    {
        if (!empty($data)) {
            $this->gi_hematemesis_text = $data;
        }
    }


    public $gi_hemorrhoids;
    public $gi_hemorrhoids_text;
    public function get_gi_hemorrhoids()
    {
        return $this->gi_hemorrhoids;
    }
    public function get_gi_hemorrhoids_yes()
    {
        return $this->gi_hemorrhoids == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_hemorrhoids_no()
    {
        return $this->gi_hemorrhoids == "No" ? "CHECKED" : "";
    }
    public function set_gi_hemorrhoids($data)
    {
        if (!empty($data)) {
            $this->gi_hemorrhoids = $data;
        }
    }
    public function get_gi_hemorrhoids_text()
    {
        return $this->gi_hemorrhoids_text;
    }
    public function set_gi_hemorrhoids_text($data)
    {
        if (!empty($data)) {
            $this->gi_hemorrhoids_text = $data;
        }
    }


    public $gi_hepatitis;
    public $gi_hepatitis_text;
    public function get_gi_hepatitis()
    {
        return $this->gi_hepatitis;
    }
    public function get_gi_hepatitis_yes()
    {
        return $this->gi_hepatitis == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_hepatitis_no()
    {
        return $this->gi_hepatitis == "No" ? "CHECKED" : "";
    }
    public function set_gi_hepatitis($data)
    {
        if (!empty($data)) {
            $this->gi_hepatitis = $data;
        }
    }
    public function get_gi_hepatitis_text()
    {
        return $this->gi_hepatitis_text;
    }
    public function set_gi_hepatitis_text($data)
    {
        if (!empty($data)) {
            $this->gi_hepatitis_text = $data;
        }
    }


    public $gi_jaundice;
    public $gi_jaundice_text;
    public function get_gi_jaundice()
    {
        return $this->gi_jaundice;
    }
    public function get_gi_jaundice_yes()
    {
        return $this->gi_jaundice == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_jaundice_no()
    {
        return $this->gi_jaundice == "No" ? "CHECKED" : "";
    }
    public function set_gi_jaundice($data)
    {
        if (!empty($data)) {
            $this->gi_jaundice = $data;
        }
    }
    public function get_gi_jaundice_text()
    {
        return $this->gi_jaundice_text;
    }
    public function set_gi_jaundice_text($data)
    {
        if (!empty($data)) {
            $this->gi_jaundice_text = $data;
        }
    }


    public $gi_lactose_intolerance;
    public $gi_lactose_intolerance_text;
    public function get_gi_lactose_intolerance()
    {
        return $this->gi_lactose_intolerance;
    }
    public function get_gi_lactose_intolerance_yes()
    {
        return $this->gi_lactose_intolerance == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_lactose_intolerance_no()
    {
        return $this->gi_lactose_intolerance == "No" ? "CHECKED" : "";
    }
    public function set_gi_lactose_intolerance($data)
    {
        if (!empty($data)) {
            $this->gi_lactose_intolerance = $data;
        }
    }
    public function get_gi_lactose_intolerance_text()
    {
        return $this->gi_lactose_intolerance_text;
    }
    public function set_gi_lactose_intolerance_text($data)
    {
        if (!empty($data)) {
            $this->gi_lactose_intolerance_text = $data;
        }
    }


    public $gi_chronic_laxative_use;
    public $gi_chronic_laxative_use_text;
    public function get_gi_chronic_laxative_use()
    {
        return $this->gi_chronic_laxative_use;
    }
    public function get_gi_chronic_laxative_use_yes()
    {
        return $this->gi_chronic_laxative_use == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_chronic_laxative_use_no()
    {
        return $this->gi_chronic_laxative_use == "No" ? "CHECKED" : "";
    }
    public function set_gi_chronic_laxative_use($data)
    {
        if (!empty($data)) {
            $this->gi_chronic_laxative_use = $data;
        }
    }
    public function get_gi_chronic_laxative_use_text()
    {
        return $this->gi_chronic_laxative_use_text;
    }
    public function set_gi_chronic_laxative_use_text($data)
    {
        if (!empty($data)) {
            $this->gi_chronic_laxative_use_text = $data;
        }
    }


    public $gi_melena;
    public $gi_melena_text;
    public function get_gi_melena()
    {
        return $this->gi_melena;
    }
    public function get_gi_melena_yes()
    {
        return $this->gi_melena == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_melena_no()
    {
        return $this->gi_melena == "No" ? "CHECKED" : "";
    }
    public function set_gi_melena($data)
    {
        if (!empty($data)) {
            $this->gi_melena = $data;
        }
    }
    public function get_gi_melena_text()
    {
        return $this->gi_melena_text;
    }
    public function set_gi_melena_text($data)
    {
        if (!empty($data)) {
            $this->gi_melena_text = $data;
        }
    }


    public $gi_frequent_nausea;
    public $gi_frequent_nausea_text;
    public function get_gi_frequent_nausea()
    {
        return $this->gi_frequent_nausea;
    }
    public function get_gi_frequent_nausea_yes()
    {
        return $this->gi_frequent_nausea == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_frequent_nausea_no()
    {
        return $this->gi_frequent_nausea == "No" ? "CHECKED" : "";
    }
    public function set_gi_frequent_nausea($data)
    {
        if (!empty($data)) {
            $this->gi_frequent_nausea = $data;
        }
    }
    public function get_gi_frequent_nausea_text()
    {
        return $this->gi_frequent_nausea_text;
    }
    public function set_gi_frequent_nausea_text($data)
    {
        if (!empty($data)) {
            $this->gi_frequent_nausea_text = $data;
        }
    }


    public $gi_rectal_bleeding;
    public $gi_rectal_bleeding_text;
    public function get_gi_rectal_bleeding()
    {
        return $this->gi_rectal_bleeding;
    }
    public function get_gi_rectal_bleeding_yes()
    {
        return $this->gi_rectal_bleeding == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_rectal_bleeding_no()
    {
        return $this->gi_rectal_bleeding == "No" ? "CHECKED" : "";
    }
    public function set_gi_rectal_bleeding($data)
    {
        if (!empty($data)) {
            $this->gi_rectal_bleeding = $data;
        }
    }
    public function get_gi_rectal_bleeding_text()
    {
        return $this->gi_rectal_bleeding_text;
    }
    public function set_gi_rectal_bleeding_text($data)
    {
        if (!empty($data)) {
            $this->gi_rectal_bleeding_text = $data;
        }
    }


    public $gi_rectal_pain;
    public $gi_rectal_pain_text;
    public function get_gi_rectal_pain()
    {
        return $this->gi_rectal_pain;
    }
    public function get_gi_rectal_pain_yes()
    {
        return $this->gi_rectal_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_rectal_pain_no()
    {
        return $this->gi_rectal_pain == "No" ? "CHECKED" : "";
    }
    public function set_gi_rectal_pain($data)
    {
        if (!empty($data)) {
            $this->gi_rectal_pain = $data;
        }
    }
    public function get_gi_rectal_pain_text()
    {
        return $this->gi_rectal_pain_text;
    }
    public function set_gi_rectal_pain_text($data)
    {
        if (!empty($data)) {
            $this->gi_rectal_pain_text = $data;
        }
    }


    public $gi_stool_caliber_change;
    public $gi_stool_caliber_change_text;
    public function get_gi_stool_caliber_change()
    {
        return $this->gi_stool_caliber_change;
    }
    public function get_gi_stool_caliber_change_yes()
    {
        return $this->gi_stool_caliber_change == "Yes" ? "CHECKED" : "";
    }
    public function get_gi_stool_caliber_change_no()
    {
        return $this->gi_stool_caliber_change == "No" ? "CHECKED" : "";
    }
    public function set_gi_stool_caliber_change($data)
    {
        if (!empty($data)) {
            $this->gi_stool_caliber_change = $data;
        }
    }
    public function get_gi_stool_caliber_change_text()
    {
        return $this->gi_stool_caliber_change_text;
    }
    public function set_gi_stool_caliber_change_text($data)
    {
        if (!empty($data)) {
            $this->gi_stool_caliber_change_text = $data;
        }
    }

    // ----- pallor -----

    public $integument_pallor;
    public $integument_pallor_text;
    public function get_integument_pallor()
    {
        return $this->integument_pallor;
    }
    public function get_integument_pallor_yes()
    {
        return $this->integument_pallor == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_pallor_no()
    {
        return $this->integument_pallor == "No" ? "CHECKED" : "";
    }
    public function set_integument_pallor($data)
    {
        if (!empty($data)) {
            $this->integument_pallor = $data;
        }
    }
    public function get_integument_pallor_text()
    {
        return $this->integument_pallor_text;
    }
    public function set_integument_pallor_text($data)
    {
        if (!empty($data)) {
            $this->integument_pallor_text = $data;
        }
    }


    public $integument_diaphoresis;
    public $integument_diaphoresis_text;
    public function get_integument_diaphoresis()
    {
        return $this->integument_diaphoresis;
    }
    public function get_integument_diaphoresis_yes()
    {
        return $this->integument_diaphoresis == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_diaphoresis_no()
    {
        return $this->integument_diaphoresis == "No" ? "CHECKED" : "";
    }
    public function set_integument_diaphoresis($data)
    {
        if (!empty($data)) {
            $this->integument_diaphoresis = $data;
        }
    }
    public function get_integument_diaphoresis_text()
    {
        return $this->integument_diaphoresis_text;
    }
    public function set_integument_diaphoresis_text($data)
    {
        if (!empty($data)) {
            $this->integument_diaphoresis_text = $data;
        }
    }


    public $integument_rash;
    public $integument_rash_text;
    public function get_integument_rash()
    {
        return $this->integument_rash;
    }
    public function get_integument_rash_yes()
    {
        return $this->integument_rash == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_rash_no()
    {
        return $this->integument_rash == "No" ? "CHECKED" : "";
    }
    public function set_integument_rash($data)
    {
        if (!empty($data)) {
            $this->integument_rash = $data;
        }
    }
    public function get_integument_rash_text()
    {
        return $this->integument_rash_text;
    }
    public function set_integument_rash_text($data)
    {
        if (!empty($data)) {
            $this->integument_rash_text = $data;
        }
    }


    public $integument_itching;
    public $integument_itching_text;
    public function get_integument_itching()
    {
        return $this->integument_itching;
    }
    public function get_integument_itching_yes()
    {
        return $this->integument_itching == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_itching_no()
    {
        return $this->integument_itching == "No" ? "CHECKED" : "";
    }
    public function set_integument_itching($data)
    {
        if (!empty($data)) {
            $this->integument_itching = $data;
        }
    }
    public function get_integument_itching_text()
    {
        return $this->integument_itching_text;
    }
    public function set_integument_itching_text($data)
    {
        if (!empty($data)) {
            $this->integument_itching_text = $data;
        }
    }


    public $integument_ulcers;
    public $integument_ulcers_text;
    public function get_integument_ulcers()
    {
        return $this->integument_ulcers;
    }
    public function get_integument_ulcers_yes()
    {
        return $this->integument_ulcers == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_ulcers_no()
    {
        return $this->integument_ulcers == "No" ? "CHECKED" : "";
    }
    public function set_integument_ulcers($data)
    {
        if (!empty($data)) {
            $this->integument_ulcers = $data;
        }
    }
    public function get_integument_ulcers_text()
    {
        return $this->integument_ulcers_text;
    }
    public function set_integument_ulcers_text($data)
    {
        if (!empty($data)) {
            $this->integument_ulcers_text = $data;
        }
    }


    public $integument_abscess;
    public $integument_abscess_text;
    public function get_integument_abscess()
    {
        return $this->integument_abscess;
    }
    public function get_integument_abscess_yes()
    {
        return $this->integument_abscess == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_abscess_no()
    {
        return $this->integument_abscess == "No" ? "CHECKED" : "";
    }
    public function set_integument_abscess($data)
    {
        if (!empty($data)) {
            $this->integument_abscess = $data;
        }
    }
    public function get_integument_abscess_text()
    {
        return $this->integument_abscess_text;
    }
    public function set_integument_abscess_text($data)
    {
        if (!empty($data)) {
            $this->integument_abscess_text = $data;
        }
    }


    public $integument_nodules;
    public $integument_nodules_text;
    public function get_integument_nodules()
    {
        return $this->integument_nodules;
    }
    public function get_integument_nodules_yes()
    {
        return $this->integument_nodules == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_nodules_no()
    {
        return $this->integument_nodules == "No" ? "CHECKED" : "";
    }
    public function set_integument_nodules($data)
    {
        if (!empty($data)) {
            $this->integument_nodules = $data;
        }
    }
    public function get_integument_nodules_text()
    {
        return $this->integument_nodules_text;
    }
    public function set_integument_nodules_text($data)
    {
        if (!empty($data)) {
            $this->integument_nodules_text = $data;
        }
    }


    public $integument_acne;
    public $integument_acne_text;
    public function get_integument_acne()
    {
        return $this->integument_acne;
    }
    public function get_integument_acne_yes()
    {
        return $this->integument_acne == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_acne_no()
    {
        return $this->integument_acne == "No" ? "CHECKED" : "";
    }
    public function set_integument_acne($data)
    {
        if (!empty($data)) {
            $this->integument_acne = $data;
        }
    }
    public function get_integument_acne_text()
    {
        return $this->integument_acne_text;
    }
    public function set_integument_acne_text($data)
    {
        if (!empty($data)) {
            $this->integument_acne_text = $data;
        }
    }


    public $integument_recurrent_boils;
    public $integument_recurrent_boils_text;
    public function get_integument_recurrent_boils()
    {
        return $this->integument_recurrent_boils;
    }
    public function get_integument_recurrent_boils_yes()
    {
        return $this->integument_recurrent_boils == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_recurrent_boils_no()
    {
        return $this->integument_recurrent_boils == "No" ? "CHECKED" : "";
    }
    public function set_integument_recurrent_boils($data)
    {
        if (!empty($data)) {
            $this->integument_recurrent_boils = $data;
        }
    }
    public function get_integument_recurrent_boils_text()
    {
        return $this->integument_recurrent_boils_text;
    }
    public function set_integument_recurrent_boils_text($data)
    {
        if (!empty($data)) {
            $this->integument_recurrent_boils_text = $data;
        }
    }


    public $integument_chronic_eczema;
    public $integument_chronic_eczema_text;
    public function get_integument_chronic_eczema()
    {
        return $this->integument_chronic_eczema;
    }
    public function get_integument_chronic_eczema_yes()
    {
        return $this->integument_chronic_eczema == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_chronic_eczema_no()
    {
        return $this->integument_chronic_eczema == "No" ? "CHECKED" : "";
    }
    public function set_integument_chronic_eczema($data)
    {
        if (!empty($data)) {
            $this->integument_chronic_eczema = $data;
        }
    }
    public function get_integument_chronic_eczema_text()
    {
        return $this->integument_chronic_eczema_text;
    }
    public function set_integument_chronic_eczema_text($data)
    {
        if (!empty($data)) {
            $this->integument_chronic_eczema_text = $data;
        }
    }


    public $integument_changing_moles;
    public $integument_changing_moles_text;
    public function get_integument_changing_moles()
    {
        return $this->integument_changing_moles;
    }
    public function get_integument_changing_moles_yes()
    {
        return $this->integument_changing_moles == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_changing_moles_no()
    {
        return $this->integument_changing_moles == "No" ? "CHECKED" : "";
    }
    public function set_integument_changing_moles($data)
    {
        if (!empty($data)) {
            $this->integument_changing_moles = $data;
        }
    }
    public function get_integument_changing_moles_text()
    {
        return $this->integument_changing_moles_text;
    }
    public function set_integument_changing_moles_text($data)
    {
        if (!empty($data)) {
            $this->integument_changing_moles_text = $data;
        }
    }


    public $integument_nail_abnormalities;
    public $integument_nail_abnormalities_text;
    public function get_integument_nail_abnormalities()
    {
        return $this->integument_nail_abnormalities;
    }
    public function get_integument_nail_abnormalities_yes()
    {
        return $this->integument_nail_abnormalities == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_nail_abnormalities_no()
    {
        return $this->integument_nail_abnormalities == "No" ? "CHECKED" : "";
    }
    public function set_integument_nail_abnormalities($data)
    {
        if (!empty($data)) {
            $this->integument_nail_abnormalities = $data;
        }
    }
    public function get_integument_nail_abnormalities_text()
    {
        return $this->integument_nail_abnormalities_text;
    }
    public function set_integument_nail_abnormalities_text($data)
    {
        if (!empty($data)) {
            $this->integument_nail_abnormalities_text = $data;
        }
    }


    public $integument_psoriasis;
    public $integument_psoriasis_text;
    public function get_integument_psoriasis()
    {
        return $this->integument_psoriasis;
    }
    public function get_integument_psoriasis_yes()
    {
        return $this->integument_psoriasis == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_psoriasis_no()
    {
        return $this->integument_psoriasis == "No" ? "CHECKED" : "";
    }
    public function set_integument_psoriasis($data)
    {
        if (!empty($data)) {
            $this->integument_psoriasis = $data;
        }
    }
    public function get_integument_psoriasis_text()
    {
        return $this->integument_psoriasis_text;
    }
    public function set_integument_psoriasis_text($data)
    {
        if (!empty($data)) {
            $this->integument_psoriasis_text = $data;
        }
    }


    public $integument_recurrent_hives;
    public $integument_recurrent_hives_text;
    public function get_integument_recurrent_hives()
    {
        return $this->integument_recurrent_hives;
    }
    public function get_integument_recurrent_hives_yes()
    {
        return $this->integument_recurrent_hives == "Yes" ? "CHECKED" : "";
    }
    public function get_integument_recurrent_hives_no()
    {
        return $this->integument_recurrent_hives == "No" ? "CHECKED" : "";
    }
    public function set_integument_recurrent_hives($data)
    {
        if (!empty($data)) {
            $this->integument_recurrent_hives = $data;
        }
    }
    public function get_integument_recurrent_hives_text()
    {
        return $this->integument_recurrent_hives_text;
    }
    public function set_integument_recurrent_hives_text($data)
    {
        if (!empty($data)) {
            $this->integument_recurrent_hives_text = $data;
        }
    }

    // ----- deformity -----

    public $musculoskeletal_deformity;
    public $musculoskeletal_deformity_text;
    public function get_musculoskeletal_deformity()
    {
        return $this->musculoskeletal_deformity;
    }
    public function get_musculoskeletal_deformity_yes()
    {
        return $this->musculoskeletal_deformity == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_deformity_no()
    {
        return $this->musculoskeletal_deformity == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_deformity($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_deformity = $data;
        }
    }
    public function get_musculoskeletal_deformity_text()
    {
        return $this->musculoskeletal_deformity_text;
    }
    public function set_musculoskeletal_deformity_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_deformity_text = $data;
        }
    }


    public $musculoskeletal_edema;
    public $musculoskeletal_edema_text;
    public function get_musculoskeletal_edema()
    {
        return $this->musculoskeletal_edema;
    }
    public function get_musculoskeletal_edema_yes()
    {
        return $this->musculoskeletal_edema == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_edema_no()
    {
        return $this->musculoskeletal_edema == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_edema($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_edema = $data;
        }
    }
    public function get_musculoskeletal_edema_text()
    {
        return $this->musculoskeletal_edema_text;
    }
    public function set_musculoskeletal_edema_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_edema_text = $data;
        }
    }


    public $musculoskeletal_pain;
    public $musculoskeletal_pain_text;
    public function get_musculoskeletal_pain()
    {
        return $this->musculoskeletal_pain;
    }
    public function get_musculoskeletal_pain_yes()
    {
        return $this->musculoskeletal_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_pain_no()
    {
        return $this->musculoskeletal_pain == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_pain($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_pain = $data;
        }
    }
    public function get_musculoskeletal_pain_text()
    {
        return $this->musculoskeletal_pain_text;
    }
    public function set_musculoskeletal_pain_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_pain_text = $data;
        }
    }


    public $musculoskeletal_limited_rom;
    public $musculoskeletal_limited_rom_text;
    public function get_musculoskeletal_limited_rom()
    {
        return $this->musculoskeletal_limited_rom;
    }
    public function get_musculoskeletal_limited_rom_yes()
    {
        return $this->musculoskeletal_limited_rom == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_limited_rom_no()
    {
        return $this->musculoskeletal_limited_rom == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_limited_rom($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_limited_rom = $data;
        }
    }
    public function get_musculoskeletal_limited_rom_text()
    {
        return $this->musculoskeletal_limited_rom_text;
    }
    public function set_musculoskeletal_limited_rom_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_limited_rom_text = $data;
        }
    }


    public $musculoskeletal_gait;
    public $musculoskeletal_gait_text;
    public function get_musculoskeletal_gait()
    {
        return $this->musculoskeletal_gait;
    }
    public function get_musculoskeletal_gait_yes()
    {
        return $this->musculoskeletal_gait == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_gait_no()
    {
        return $this->musculoskeletal_gait == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_gait($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_gait = $data;
        }
    }
    public function get_musculoskeletal_gait_text()
    {
        return $this->musculoskeletal_gait_text;
    }
    public function set_musculoskeletal_gait_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_gait_text = $data;
        }
    }


    public $musculoskeletal_arthritis;
    public $musculoskeletal_arthritis_text;
    public function get_musculoskeletal_arthritis()
    {
        return $this->musculoskeletal_arthritis;
    }
    public function get_musculoskeletal_arthritis_yes()
    {
        return $this->musculoskeletal_arthritis == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_arthritis_no()
    {
        return $this->musculoskeletal_arthritis == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_arthritis($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_arthritis = $data;
        }
    }
    public function get_musculoskeletal_arthritis_text()
    {
        return $this->musculoskeletal_arthritis_text;
    }
    public function set_musculoskeletal_arthritis_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_arthritis_text = $data;
        }
    }


    public $musculoskeletal_neck_pain;
    public $musculoskeletal_neck_pain_text;
    public function get_musculoskeletal_neck_pain()
    {
        return $this->musculoskeletal_neck_pain;
    }
    public function get_musculoskeletal_neck_pain_yes()
    {
        return $this->musculoskeletal_neck_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_neck_pain_no()
    {
        return $this->musculoskeletal_neck_pain == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_neck_pain($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_neck_pain = $data;
        }
    }
    public function get_musculoskeletal_neck_pain_text()
    {
        return $this->musculoskeletal_neck_pain_text;
    }
    public function set_musculoskeletal_neck_pain_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_neck_pain_text = $data;
        }
    }


    public $musculoskeletal_mid_back_pain;
    public $musculoskeletal_mid_back_pain_text;
    public function get_musculoskeletal_mid_back_pain()
    {
        return $this->musculoskeletal_mid_back_pain;
    }
    public function get_musculoskeletal_mid_back_pain_yes()
    {
        return $this->musculoskeletal_mid_back_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_mid_back_pain_no()
    {
        return $this->musculoskeletal_mid_back_pain == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_mid_back_pain($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_mid_back_pain = $data;
        }
    }
    public function get_musculoskeletal_mid_back_pain_text()
    {
        return $this->musculoskeletal_mid_back_pain_text;
    }
    public function set_musculoskeletal_mid_back_pain_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_mid_back_pain_text = $data;
        }
    }


    public $musculoskeletal_low_back_pain;
    public $musculoskeletal_low_back_pain_text;
    public function get_musculoskeletal_low_back_pain()
    {
        return $this->musculoskeletal_low_back_pain;
    }
    public function get_musculoskeletal_low_back_pain_yes()
    {
        return $this->musculoskeletal_low_back_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_low_back_pain_no()
    {
        return $this->musculoskeletal_low_back_pain == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_low_back_pain($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_low_back_pain = $data;
        }
    }
    public function get_musculoskeletal_low_back_pain_text()
    {
        return $this->musculoskeletal_low_back_pain_text;
    }
    public function set_musculoskeletal_low_back_pain_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_low_back_pain_text = $data;
        }
    }


    public $musculoskeletal_bursitis;
    public $musculoskeletal_bursitis_text;
    public function get_musculoskeletal_bursitis()
    {
        return $this->musculoskeletal_bursitis;
    }
    public function get_musculoskeletal_bursitis_yes()
    {
        return $this->musculoskeletal_bursitis == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_bursitis_no()
    {
        return $this->musculoskeletal_bursitis == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_bursitis($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_bursitis = $data;
        }
    }
    public function get_musculoskeletal_bursitis_text()
    {
        return $this->musculoskeletal_bursitis_text;
    }
    public function set_musculoskeletal_bursitis_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_bursitis_text = $data;
        }
    }


    public $musculoskeletal_gout;
    public $musculoskeletal_gout_text;
    public function get_musculoskeletal_gout()
    {
        return $this->musculoskeletal_gout;
    }
    public function get_musculoskeletal_gout_yes()
    {
        return $this->musculoskeletal_gout == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_gout_no()
    {
        return $this->musculoskeletal_gout == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_gout($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_gout = $data;
        }
    }
    public function get_musculoskeletal_gout_text()
    {
        return $this->musculoskeletal_gout_text;
    }
    public function set_musculoskeletal_gout_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_gout_text = $data;
        }
    }


    public $musculoskeletal_joint_injury;
    public $musculoskeletal_joint_injury_text;
    public function get_musculoskeletal_joint_injury()
    {
        return $this->musculoskeletal_joint_injury;
    }
    public function get_musculoskeletal_joint_injury_yes()
    {
        return $this->musculoskeletal_joint_injury == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_joint_injury_no()
    {
        return $this->musculoskeletal_joint_injury == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_joint_injury($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_injury = $data;
        }
    }
    public function get_musculoskeletal_joint_injury_text()
    {
        return $this->musculoskeletal_joint_injury_text;
    }
    public function set_musculoskeletal_joint_injury_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_injury_text = $data;
        }
    }


    public $musculoskeletal_joint_pain;
    public $musculoskeletal_joint_pain_text;
    public function get_musculoskeletal_joint_pain()
    {
        return $this->musculoskeletal_joint_pain;
    }
    public function get_musculoskeletal_joint_pain_yes()
    {
        return $this->musculoskeletal_joint_pain == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_joint_pain_no()
    {
        return $this->musculoskeletal_joint_pain == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_joint_pain($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_pain = $data;
        }
    }
    public function get_musculoskeletal_joint_pain_text()
    {
        return $this->musculoskeletal_joint_pain_text;
    }
    public function set_musculoskeletal_joint_pain_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_pain_text = $data;
        }
    }


    public $musculoskeletal_joint_swelling;
    public $musculoskeletal_joint_swelling_text;
    public function get_musculoskeletal_joint_swelling()
    {
        return $this->musculoskeletal_joint_swelling;
    }
    public function get_musculoskeletal_joint_swelling_yes()
    {
        return $this->musculoskeletal_joint_swelling == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_joint_swelling_no()
    {
        return $this->musculoskeletal_joint_swelling == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_joint_swelling($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_swelling = $data;
        }
    }
    public function get_musculoskeletal_joint_swelling_text()
    {
        return $this->musculoskeletal_joint_swelling_text;
    }
    public function set_musculoskeletal_joint_swelling_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_joint_swelling_text = $data;
        }
    }


    public $musculoskeletal_myalgias;
    public $musculoskeletal_myalgias_text;
    public function get_musculoskeletal_myalgias()
    {
        return $this->musculoskeletal_myalgias;
    }
    public function get_musculoskeletal_myalgias_yes()
    {
        return $this->musculoskeletal_myalgias == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_myalgias_no()
    {
        return $this->musculoskeletal_myalgias == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_myalgias($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_myalgias = $data;
        }
    }
    public function get_musculoskeletal_myalgias_text()
    {
        return $this->musculoskeletal_myalgias_text;
    }
    public function set_musculoskeletal_myalgias_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_myalgias_text = $data;
        }
    }


    public $musculoskeletal_sciatica;
    public $musculoskeletal_sciatica_text;
    public function get_musculoskeletal_sciatica()
    {
        return $this->musculoskeletal_sciatica;
    }
    public function get_musculoskeletal_sciatica_yes()
    {
        return $this->musculoskeletal_sciatica == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_sciatica_no()
    {
        return $this->musculoskeletal_sciatica == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_sciatica($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_sciatica = $data;
        }
    }
    public function get_musculoskeletal_sciatica_text()
    {
        return $this->musculoskeletal_sciatica_text;
    }
    public function set_musculoskeletal_sciatica_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_sciatica_text = $data;
        }
    }


    public $musculoskeletal_scoliosis;
    public $musculoskeletal_scoliosis_text;
    public function get_musculoskeletal_scoliosis()
    {
        return $this->musculoskeletal_scoliosis;
    }
    public function get_musculoskeletal_scoliosis_yes()
    {
        return $this->musculoskeletal_scoliosis == "Yes" ? "CHECKED" : "";
    }
    public function get_musculoskeletal_scoliosis_no()
    {
        return $this->musculoskeletal_scoliosis == "No" ? "CHECKED" : "";
    }
    public function set_musculoskeletal_scoliosis($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_scoliosis = $data;
        }
    }
    public function get_musculoskeletal_scoliosis_text()
    {
        return $this->musculoskeletal_scoliosis_text;
    }
    public function set_musculoskeletal_scoliosis_text($data)
    {
        if (!empty($data)) {
            $this->musculoskeletal_scoliosis_text = $data;
        }
    }

    // ----- Anemia -----

    public $hematological_anemia;
    public $hematological_anemia_text;
    public function get_hematological_anemia()
    {
        return $this->hematological_anemia;
    }
    public function get_hematological_anemia_yes()
    {
        return $this->hematological_anemia == "Yes" ? "CHECKED" : "";
    }
    public function get_hematological_anemia_no()
    {
        return $this->hematological_anemia == "No" ? "CHECKED" : "";
    }
    public function set_hematological_anemia($data)
    {
        if (!empty($data)) {
            $this->hematological_anemia = $data;
        }
    }
    public function get_hematological_anemia_text()
    {
        return $this->hematological_anemia_text;
    }
    public function set_hematological_anemia_text($data)
    {
        if (!empty($data)) {
            $this->hematological_anemia_text = $data;
        }
    }


    public $hematological_pallor;
    public $hematological_pallor_text;
    public function get_hematological_pallor()
    {
        return $this->hematological_pallor;
    }
    public function get_hematological_pallor_yes()
    {
        return $this->hematological_pallor == "Yes" ? "CHECKED" : "";
    }
    public function get_hematological_pallor_no()
    {
        return $this->hematological_pallor == "No" ? "CHECKED" : "";
    }
    public function set_hematological_pallor($data)
    {
        if (!empty($data)) {
            $this->hematological_pallor = $data;
        }
    }
    public function get_hematological_pallor_text()
    {
        return $this->hematological_pallor_text;
    }
    public function set_hematological_pallor_text($data)
    {
        if (!empty($data)) {
            $this->hematological_pallor_text = $data;
        }
    }


    public $hematological_bleeding_tendencies;
    public $hematological_bleeding_tendencies_text;
    public function get_hematological_bleeding_tendencies()
    {
        return $this->hematological_bleeding_tendencies;
    }
    public function get_hematological_bleeding_tendencies_yes()
    {
        return $this->hematological_bleeding_tendencies == "Yes" ? "CHECKED" : "";
    }
    public function get_hematological_bleeding_tendencies_no()
    {
        return $this->hematological_bleeding_tendencies == "No" ? "CHECKED" : "";
    }
    public function set_hematological_bleeding_tendencies($data)
    {
        if (!empty($data)) {
            $this->hematological_bleeding_tendencies = $data;
        }
    }
    public function get_hematological_bleeding_tendencies_text()
    {
        return $this->hematological_bleeding_tendencies_text;
    }
    public function set_hematological_bleeding_tendencies_text($data)
    {
        if (!empty($data)) {
            $this->hematological_bleeding_tendencies_text = $data;
        }
    }


    public $hematological_bruising;
    public $hematological_bruising_text;
    public function get_hematological_bruising()
    {
        return $this->hematological_bruising;
    }
    public function get_hematological_bruising_yes()
    {
        return $this->hematological_bruising == "Yes" ? "CHECKED" : "";
    }
    public function get_hematological_bruising_no()
    {
        return $this->hematological_bruising == "No" ? "CHECKED" : "";
    }
    public function set_hematological_bruising($data)
    {
        if (!empty($data)) {
            $this->hematological_bruising = $data;
        }
    }
    public function get_hematological_bruising_text()
    {
        return $this->hematological_bruising_text;
    }
    public function set_hematological_bruising_text($data)
    {
        if (!empty($data)) {
            $this->hematological_bruising_text = $data;
        }
    }

    // ----- Thyroid Problems -----

    public $endocrine_thyroid_problems;
    public $endocrine_thyroid_problems_text;
    public function get_endocrine_thyroid_problems()
    {
        return $this->endocrine_thyroid_problems;
    }
    public function get_endocrine_thyroid_problems_yes()
    {
        return $this->endocrine_thyroid_problems == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_thyroid_problems_no()
    {
        return $this->endocrine_thyroid_problems == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_thyroid_problems($data)
    {
        if (!empty($data)) {
            $this->endocrine_thyroid_problems = $data;
        }
    }
    public function get_endocrine_thyroid_problems_text()
    {
        return $this->endocrine_thyroid_problems_text;
    }
    public function set_endocrine_thyroid_problems_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_thyroid_problems_text = $data;
        }
    }


    public $endocrine_enlarged_thyroid;
    public $endocrine_enlarged_thyroid_text;
    public function get_endocrine_enlarged_thyroid()
    {
        return $this->endocrine_enlarged_thyroid;
    }
    public function get_endocrine_enlarged_thyroid_yes()
    {
        return $this->endocrine_enlarged_thyroid == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_enlarged_thyroid_no()
    {
        return $this->endocrine_enlarged_thyroid == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_enlarged_thyroid($data)
    {
        if (!empty($data)) {
            $this->endocrine_enlarged_thyroid = $data;
        }
    }
    public function get_endocrine_enlarged_thyroid_text()
    {
        return $this->endocrine_enlarged_thyroid_text;
    }
    public function set_endocrine_enlarged_thyroid_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_enlarged_thyroid_text = $data;
        }
    }


    public $endocrine_hyperglycemia;
    public $endocrine_hyperglycemia_text;
    public function get_endocrine_hyperglycemia()
    {
        return $this->endocrine_hyperglycemia;
    }
    public function get_endocrine_hyperglycemia_yes()
    {
        return $this->endocrine_hyperglycemia == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_hyperglycemia_no()
    {
        return $this->endocrine_hyperglycemia == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_hyperglycemia($data)
    {
        if (!empty($data)) {
            $this->endocrine_hyperglycemia = $data;
        }
    }
    public function get_endocrine_hyperglycemia_text()
    {
        return $this->endocrine_hyperglycemia_text;
    }
    public function set_endocrine_hyperglycemia_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_hyperglycemia_text = $data;
        }
    }


    public $endocrine_hypoglycemia;
    public $endocrine_hypoglycemia_text;
    public function get_endocrine_hypoglycemia()
    {
        return $this->endocrine_hypoglycemia;
    }
    public function get_endocrine_hypoglycemia_yes()
    {
        return $this->endocrine_hypoglycemia == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_hypoglycemia_no()
    {
        return $this->endocrine_hypoglycemia == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_hypoglycemia($data)
    {
        if (!empty($data)) {
            $this->endocrine_hypoglycemia = $data;
        }
    }
    public function get_endocrine_hypoglycemia_text()
    {
        return $this->endocrine_hypoglycemia_text;
    }
    public function set_endocrine_hypoglycemia_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_hypoglycemia_text = $data;
        }
    }


    public $endocrine_cold_intolerance;
    public $endocrine_cold_intolerance_text;
    public function get_endocrine_cold_intolerance()
    {
        return $this->endocrine_cold_intolerance;
    }
    public function get_endocrine_cold_intolerance_yes()
    {
        return $this->endocrine_cold_intolerance == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_cold_intolerance_no()
    {
        return $this->endocrine_cold_intolerance == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_cold_intolerance($data)
    {
        if (!empty($data)) {
            $this->endocrine_cold_intolerance = $data;
        }
    }
    public function get_endocrine_cold_intolerance_text()
    {
        return $this->endocrine_cold_intolerance_text;
    }
    public function set_endocrine_cold_intolerance_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_cold_intolerance_text = $data;
        }
    }


    public $endocrine_heat_intolerance;
    public $endocrine_heat_intolerance_text;
    public function get_endocrine_heat_intolerance()
    {
        return $this->endocrine_heat_intolerance;
    }
    public function get_endocrine_heat_intolerance_yes()
    {
        return $this->endocrine_heat_intolerance == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_heat_intolerance_no()
    {
        return $this->endocrine_heat_intolerance == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_heat_intolerance($data)
    {
        if (!empty($data)) {
            $this->endocrine_heat_intolerance = $data;
        }
    }
    public function get_endocrine_heat_intolerance_text()
    {
        return $this->endocrine_heat_intolerance_text;
    }
    public function set_endocrine_heat_intolerance_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_heat_intolerance_text = $data;
        }
    }


    public $endocrine_early_awakening;
    public $endocrine_early_awakening_text;
    public function get_endocrine_early_awakening()
    {
        return $this->endocrine_early_awakening;
    }
    public function get_endocrine_early_awakening_yes()
    {
        return $this->endocrine_early_awakening == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_early_awakening_no()
    {
        return $this->endocrine_early_awakening == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_early_awakening($data)
    {
        if (!empty($data)) {
            $this->endocrine_early_awakening = $data;
        }
    }
    public function get_endocrine_early_awakening_text()
    {
        return $this->endocrine_early_awakening_text;
    }
    public function set_endocrine_early_awakening_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_early_awakening_text = $data;
        }
    }


    public $endocrine_fatigue_unexplained;
    public $endocrine_fatigue_unexplained_text;
    public function get_endocrine_fatigue_unexplained()
    {
        return $this->endocrine_fatigue_unexplained;
    }
    public function get_endocrine_fatigue_unexplained_yes()
    {
        return $this->endocrine_fatigue_unexplained == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_fatigue_unexplained_no()
    {
        return $this->endocrine_fatigue_unexplained == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_fatigue_unexplained($data)
    {
        if (!empty($data)) {
            $this->endocrine_fatigue_unexplained = $data;
        }
    }
    public function get_endocrine_fatigue_unexplained_text()
    {
        return $this->endocrine_fatigue_unexplained_text;
    }
    public function set_endocrine_fatigue_unexplained_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_fatigue_unexplained_text = $data;
        }
    }


    public $endocrine_weight_gain;
    public $endocrine_weight_gain_text;
    public function get_endocrine_weight_gain()
    {
        return $this->endocrine_weight_gain;
    }
    public function get_endocrine_weight_gain_yes()
    {
        return $this->endocrine_weight_gain == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_weight_gain_no()
    {
        return $this->endocrine_weight_gain == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_weight_gain($data)
    {
        if (!empty($data)) {
            $this->endocrine_weight_gain = $data;
        }
    }
    public function get_endocrine_weight_gain_text()
    {
        return $this->endocrine_weight_gain_text;
    }
    public function set_endocrine_weight_gain_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_weight_gain_text = $data;
        }
    }


    public $endocrine_weight_loss;
    public $endocrine_weight_loss_text;
    public function get_endocrine_weight_loss()
    {
        return $this->endocrine_weight_loss;
    }
    public function get_endocrine_weight_loss_yes()
    {
        return $this->endocrine_weight_loss == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_weight_loss_no()
    {
        return $this->endocrine_weight_loss == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_weight_loss($data)
    {
        if (!empty($data)) {
            $this->endocrine_weight_loss = $data;
        }
    }
    public function get_endocrine_weight_loss_text()
    {
        return $this->endocrine_weight_loss_text;
    }
    public function set_endocrine_weight_loss_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_weight_loss_text = $data;
        }
    }


    public $endocrine_premenstrual_symptoms;
    public $endocrine_premenstrual_symptoms_text;
    public function get_endocrine_premenstrual_symptoms()
    {
        return $this->endocrine_premenstrual_symptoms;
    }
    public function get_endocrine_premenstrual_symptoms_yes()
    {
        return $this->endocrine_premenstrual_symptoms == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_premenstrual_symptoms_no()
    {
        return $this->endocrine_premenstrual_symptoms == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_premenstrual_symptoms($data)
    {
        if (!empty($data)) {
            $this->endocrine_premenstrual_symptoms = $data;
        }
    }
    public function get_endocrine_premenstrual_symptoms_text()
    {
        return $this->endocrine_premenstrual_symptoms_text;
    }
    public function set_endocrine_premenstrual_symptoms_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_premenstrual_symptoms_text = $data;
        }
    }


    public $endocrine_hair_no_change_or_no_loss;
    public $endocrine_hair_no_change_or_no_loss_text;
    public function get_endocrine_hair_no_change_or_no_loss()
    {
        return $this->endocrine_hair_no_change_or_no_loss;
    }
    public function get_endocrine_hair_no_change_or_no_loss_yes()
    {
        return $this->endocrine_hair_no_change_or_no_loss == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_hair_no_change_or_no_loss_no()
    {
        return $this->endocrine_hair_no_change_or_no_loss == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_hair_no_change_or_no_loss($data)
    {
        if (!empty($data)) {
            $this->endocrine_hair_no_change_or_no_loss = $data;
        }
    }
    public function get_endocrine_hair_no_change_or_no_loss_text()
    {
        return $this->endocrine_hair_no_change_or_no_loss_text;
    }
    public function set_endocrine_hair_no_change_or_no_loss_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_hair_no_change_or_no_loss_text = $data;
        }
    }


    public $endocrine_hot_flashes;
    public $endocrine_hot_flashes_text;
    public function get_endocrine_hot_flashes()
    {
        return $this->endocrine_hot_flashes;
    }
    public function get_endocrine_hot_flashes_yes()
    {
        return $this->endocrine_hot_flashes == "Yes" ? "CHECKED" : "";
    }
    public function get_endocrine_hot_flashes_no()
    {
        return $this->endocrine_hot_flashes == "No" ? "CHECKED" : "";
    }
    public function set_endocrine_hot_flashes($data)
    {
        if (!empty($data)) {
            $this->endocrine_hot_flashes = $data;
        }
    }
    public function get_endocrine_hot_flashes_text()
    {
        return $this->endocrine_hot_flashes_text;
    }
    public function set_endocrine_hot_flashes_text($data)
    {
        if (!empty($data)) {
            $this->endocrine_hot_flashes_text = $data;
        }
    }

    // ----- Swollen lymph nodes -----

    public $lymphatic_swollen_lymph_nodes;
    public $lymphatic_swollen_lymph_nodes_text;
    public function get_lymphatic_swollen_lymph_nodes()
    {
        return $this->lymphatic_swollen_lymph_nodes;
    }
    public function get_lymphatic_swollen_lymph_nodes_yes()
    {
        return $this->lymphatic_swollen_lymph_nodes == "Yes" ? "CHECKED" : "";
    }
    public function get_lymphatic_swollen_lymph_nodes_no()
    {
        return $this->lymphatic_swollen_lymph_nodes == "No" ? "CHECKED" : "";
    }
    public function set_lymphatic_swollen_lymph_nodes($data)
    {
        if (!empty($data)) {
            $this->lymphatic_swollen_lymph_nodes = $data;
        }
    }
    public function get_lymphatic_swollen_lymph_nodes_text()
    {
        return $this->lymphatic_swollen_lymph_nodes_text;
    }
    public function set_lymphatic_swollen_lymph_nodes_text($data)
    {
        if (!empty($data)) {
            $this->lymphatic_swollen_lymph_nodes_text = $data;
        }
    }


    public $lymphatic_swollen_extremities;
    public $lymphatic_swollen_extremities_text;
    public function get_lymphatic_swollen_extremities()
    {
        return $this->lymphatic_swollen_extremities;
    }
    public function get_lymphatic_swollen_extremities_yes()
    {
        return $this->lymphatic_swollen_extremities == "Yes" ? "CHECKED" : "";
    }
    public function get_lymphatic_swollen_extremities_no()
    {
        return $this->lymphatic_swollen_extremities == "No" ? "CHECKED" : "";
    }
    public function set_lymphatic_swollen_extremities($data)
    {
        if (!empty($data)) {
            $this->lymphatic_swollen_extremities = $data;
        }
    }
    public function get_lymphatic_swollen_extremities_text()
    {
        return $this->lymphatic_swollen_extremities_text;
    }
    public function set_lymphatic_swollen_extremities_text($data)
    {
        if (!empty($data)) {
            $this->lymphatic_swollen_extremities_text = $data;
        }
    }

    // ----- Compulsions -----

    public $psychiatric_compulsions;
    public $psychiatric_compulsions_text;
    public function get_psychiatric_compulsions()
    {
        return $this->psychiatric_compulsions;
    }
    public function get_psychiatric_compulsions_yes()
    {
        return $this->psychiatric_compulsions == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_compulsions_no()
    {
        return $this->psychiatric_compulsions == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_compulsions($data)
    {
        if (!empty($data)) {
            $this->psychiatric_compulsions = $data;
        }
    }
    public function get_psychiatric_compulsions_text()
    {
        return $this->psychiatric_compulsions_text;
    }
    public function set_psychiatric_compulsions_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_compulsions_text = $data;
        }
    }


    public $psychiatric_depression;
    public $psychiatric_depression_text;
    public function get_psychiatric_depression()
    {
        return $this->psychiatric_depression;
    }
    public function get_psychiatric_depression_yes()
    {
        return $this->psychiatric_depression == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_depression_no()
    {
        return $this->psychiatric_depression == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_depression($data)
    {
        if (!empty($data)) {
            $this->psychiatric_depression = $data;
        }
    }
    public function get_psychiatric_depression_text()
    {
        return $this->psychiatric_depression_text;
    }
    public function set_psychiatric_depression_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_depression_text = $data;
        }
    }


    public $psychiatric_fear;
    public $psychiatric_fear_text;
    public function get_psychiatric_fear()
    {
        return $this->psychiatric_fear;
    }
    public function get_psychiatric_fear_yes()
    {
        return $this->psychiatric_fear == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_fear_no()
    {
        return $this->psychiatric_fear == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_fear($data)
    {
        if (!empty($data)) {
            $this->psychiatric_fear = $data;
        }
    }
    public function get_psychiatric_fear_text()
    {
        return $this->psychiatric_fear_text;
    }
    public function set_psychiatric_fear_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_fear_text = $data;
        }
    }


    public $psychiatric_anxiety;
    public $psychiatric_anxiety_text;
    public function get_psychiatric_anxiety()
    {
        return $this->psychiatric_anxiety;
    }
    public function get_psychiatric_anxiety_yes()
    {
        return $this->psychiatric_anxiety == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_anxiety_no()
    {
        return $this->psychiatric_anxiety == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_anxiety($data)
    {
        if (!empty($data)) {
            $this->psychiatric_anxiety = $data;
        }
    }
    public function get_psychiatric_anxiety_text()
    {
        return $this->psychiatric_anxiety_text;
    }
    public function set_psychiatric_anxiety_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_anxiety_text = $data;
        }
    }


    public $psychiatric_hallucinations;
    public $psychiatric_hallucinations_text;
    public function get_psychiatric_hallucinations()
    {
        return $this->psychiatric_hallucinations;
    }
    public function get_psychiatric_hallucinations_yes()
    {
        return $this->psychiatric_hallucinations == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_hallucinations_no()
    {
        return $this->psychiatric_hallucinations == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_hallucinations($data)
    {
        if (!empty($data)) {
            $this->psychiatric_hallucinations = $data;
        }
    }
    public function get_psychiatric_hallucinations_text()
    {
        return $this->psychiatric_hallucinations_text;
    }
    public function set_psychiatric_hallucinations_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_hallucinations_text = $data;
        }
    }


    public $psychiatric_loss_of_interest;
    public $psychiatric_loss_of_interest_text;
    public function get_psychiatric_loss_of_interest()
    {
        return $this->psychiatric_loss_of_interest;
    }
    public function get_psychiatric_loss_of_interest_yes()
    {
        return $this->psychiatric_loss_of_interest == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_loss_of_interest_no()
    {
        return $this->psychiatric_loss_of_interest == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_loss_of_interest($data)
    {
        if (!empty($data)) {
            $this->psychiatric_loss_of_interest = $data;
        }
    }
    public function get_psychiatric_loss_of_interest_text()
    {
        return $this->psychiatric_loss_of_interest_text;
    }
    public function set_psychiatric_loss_of_interest_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_loss_of_interest_text = $data;
        }
    }


    public $psychiatric_memory_loss;
    public $psychiatric_memory_loss_text;
    public function get_psychiatric_memory_loss()
    {
        return $this->psychiatric_memory_loss;
    }
    public function get_psychiatric_memory_loss_yes()
    {
        return $this->psychiatric_memory_loss == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_memory_loss_no()
    {
        return $this->psychiatric_memory_loss == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_memory_loss($data)
    {
        if (!empty($data)) {
            $this->psychiatric_memory_loss = $data;
        }
    }
    public function get_psychiatric_memory_loss_text()
    {
        return $this->psychiatric_memory_loss_text;
    }
    public function set_psychiatric_memory_loss_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_memory_loss_text = $data;
        }
    }


    public $psychiatric_mood_swings;
    public $psychiatric_mood_swings_text;
    public function get_psychiatric_mood_swings()
    {
        return $this->psychiatric_mood_swings;
    }
    public function get_psychiatric_mood_swings_yes()
    {
        return $this->psychiatric_mood_swings == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_mood_swings_no()
    {
        return $this->psychiatric_mood_swings == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_mood_swings($data)
    {
        if (!empty($data)) {
            $this->psychiatric_mood_swings = $data;
        }
    }
    public function get_psychiatric_mood_swings_text()
    {
        return $this->psychiatric_mood_swings_text;
    }
    public function set_psychiatric_mood_swings_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_mood_swings_text = $data;
        }
    }


    public $psychiatric_pananoia;
    public $psychiatric_pananoia_text;
    public function get_psychiatric_pananoia()
    {
        return $this->psychiatric_pananoia;
    }
    public function get_psychiatric_pananoia_yes()
    {
        return $this->psychiatric_pananoia == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_pananoia_no()
    {
        return $this->psychiatric_pananoia == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_pananoia($data)
    {
        if (!empty($data)) {
            $this->psychiatric_pananoia = $data;
        }
    }
    public function get_psychiatric_pananoia_text()
    {
        return $this->psychiatric_pananoia_text;
    }
    public function set_psychiatric_pananoia_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_pananoia_text = $data;
        }
    }


    public $psychiatric_insomnia;
    public $psychiatric_insomnia_text;
    public function get_psychiatric_insomnia()
    {
        return $this->psychiatric_insomnia;
    }
    public function get_psychiatric_insomnia_yes()
    {
        return $this->psychiatric_insomnia == "Yes" ? "CHECKED" : "";
    }
    public function get_psychiatric_insomnia_no()
    {
        return $this->psychiatric_insomnia == "No" ? "CHECKED" : "";
    }
    public function set_psychiatric_insomnia($data)
    {
        if (!empty($data)) {
            $this->psychiatric_insomnia = $data;
        }
    }
    public function get_psychiatric_insomnia_text()
    {
        return $this->psychiatric_insomnia_text;
    }
    public function set_psychiatric_insomnia_text($data)
    {
        if (!empty($data)) {
            $this->psychiatric_insomnia_text = $data;
        }
    }
}   // end of Form
