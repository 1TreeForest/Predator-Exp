<?php




/**
 * class Prosthesis
 *
 */
class FormReviewOfSystems extends ORDataObject
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
    public $date_tetnus_shot;
    public $date_pneumonia_shot;
    public $date_flu_shot;
    public $date_pap_smear;
    public $date_mammogram;
    public $date_bone_density_scan;
    public $abnormal_pap_smear;
    public $abnormal_mammogram;
    public $date_last_psa;
    public $packs_per_day;
    public $years_smoked;
    public $alcohol_per_week;
    public $recreational_drugs;
    public $checks;


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

        $this->_table = "form_review_of_systems";
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

    public function populate()
    {
        parent::populate();

        $sql = "SELECT name from form_review_of_systems_checks where foreign_id = '" . add_escape_custom($this->id) . "'";
        $results = sqlQ($sql);

        while ($row = sqlFetchArray($results)) {
            $this->checks[] = $row['name'];
        }
    }

    public function persist()
    {
        parent::persist();
        if (is_numeric($this->id) and !empty($this->checks)) {
            $sql = "delete FROM form_review_of_systems_checks where foreign_id = '" . $this->id . "'";
            sqlQuery($sql);
            foreach ($this->checks as $check) {
                if (!empty($check)) {
                    $sql = "INSERT INTO form_review_of_systems_checks set foreign_id='"  . add_escape_custom($this->id) . "', name = '" . add_escape_custom($check) . "'";
                    sqlQuery($sql);
                    //echo "$sql<br>";
                }
            }
        }
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

    public function set_date_tetnus_shot($string)
    {
        $this->date_tetnus_shot = $string;
    }
    public function get_date_tetnus_shot()
    {
        return $this->date_tetnus_shot;
    }

    public function set_date_pneumonia_shot($string)
    {
        $this->date_pneumonia_shot = $string;
    }
    public function get_date_pneumonia_shot()
    {
        return $this->date_pneumonia_shot;
    }

    public function set_date_flu_shot($string)
    {
        $this->date_flu_shot = $string;
    }
    public function get_date_flu_shot()
    {
        return $this->date_flu_shot;
    }

    public function set_date_pap_smear($string)
    {
        $this->date_pap_smear = $string;
    }
    public function get_date_pap_smear()
    {
        return $this->date_pap_smear;
    }

    public function set_date_mammogram($string)
    {
        $this->date_mammogram = $string;
    }
    public function get_date_mammogram()
    {
        return $this->date_mammogram;
    }

    public function set_date_bone_density_scan($string)
    {
        $this->date_bone_density_scan = $string;
    }
    public function get_date_bone_density_scan()
    {
        return $this->date_bone_density_scan;
    }

    public function set_abnormal_pap_smear($string)
    {
        $this->abnormal_pap_smear = $string;
    }
    public function get_abnormal_pap_smear()
    {
        return $this->abnormal_pap_smear;
    }

    public function set_abnormal_mammogram($string)
    {
        $this->abnormal_mammogram = $string;
    }
    public function get_abnormal_mammogram()
    {
        return $this->abnormal_mammogram;
    }

    public function set_date_last_psa($string)
    {
        $this->date_last_psa = $string;
    }
    public function get_date_last_psa()
    {
        return $this->date_last_psa;
    }

    public function set_packs_per_day($string)
    {
        $this->packs_per_day = $string;
    }
    public function get_packs_per_day()
    {
        return $this->packs_per_day;
    }

    public function set_years_smoked($string)
    {
        $this->years_smoked = $string;
    }
    public function get_years_smoked()
    {
        return $this->years_smoked;
    }

    public function set_alcohol_per_week($string)
    {
        $this->alcohol_per_week = $string;
    }
    public function get_alcohol_per_week()
    {
        return $this->alcohol_per_week;
    }

    public function set_recreational_drugs($string)
    {
        $this->recreational_drugs = $string;
    }
    public function get_recreational_drugs()
    {
        return $this->recreational_drugs;
    }

    public function set_checks($check_array)
    {
        $this->checks = $check_array;
    }

    public function get_checks()
    {
        return $this->checks;
    }


    public function _form_layout()
    {
        $a = array();

        //at is array temp
        //a is array
        //a_bottom is the textually identified rows of a checkbox group

        $at[1]['constitutional_fever']  =  "Fever";
        $at[1]['constitutional_chills']     =  "Chills";
        $at[1]['constitutional_fatigue']    =  "Fatigue";
        $at[1]['constitutional_weakness']   =  "Weakness";

        $at[2]['constitutional_night_sweats']   =  "Night Sweats";
        $at[2]['constitutional__unexplained_weight_loss']   =  "Unexplained Weight Loss";
        $at[2]['constitutional_unexplained_weight_gain']    =  "Unexplained Weight Gain";

        $a['Constitutional'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['heent_changes_in_vision']   =  "Changes in Vision";
        $at[1]['heent_light_sensitivity']   =  "Light Sensitivity";
        $at[1]['heent_changes_in_hearing']  =  "Changes in Hearing";
        $at[1]['heent_ringing_in_ears']     =  "Ringing in Ears";

        $at[2]['heent_frequent_nose_bleeds']    =  "Frequent Nose Bleeds";
        $at[2]['heent_pain_with_swallowing']    =  "Pain with Swallowing";
        $at[2]['heent_difficulty_swallowing']   =  "Difficulty Swallowing";

        $a['HEENT'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['endocrine_frequent_thirst']     =  "Frequent Thirst";
        $at[1]['endocrine_frequent_urination']  =  "Frequent Urination";
        $at[1]['endocrine_heat_intolerance']    =  "Heat Intolerance";
        $at[1]['endocrine_brittle_hair']    =  "Brittle Hair";

        $a['Enodcrine'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['respiratory_shortness_of_breath']   =  "Shortness Of Breath";
        $at[1]['respiratory_difficulty_breathing']  =  "Difficulty Breathing";
        $at[1]['respiratory_wheezing']  =  "Wheezing";
        $at[1]['respiratory_coughing_up_blood']     =  "Coughing up Blood";

        $a['Respiratory'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['cv_chest_pain']     =  "Chest Pain";
        $at[1]['cv_palpitations']   =  "Palpitations";
        $at[1]['cv_shortness_of_breath_with_exertion']  =  "Shortness of Breath with Exertion";
        $at[1]['cv_swelling_in_ankles']     =  "Swelling in Ankles";

        $a['CV'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['gi_frequent_heartburn']     =  "Frequent Heartburn";
        $at[1]['gi_vomiting']   =  "Vomiting";
        $at[1]['gi_diarrhea']   =  "Diarrhea";
        $at[1]['gi_constipation']   =  "Constipation";

        $at[2]['gi_unusually_dark_stools']  =  "Unusually Dark Stools";
        $at[2]['gi_vomiting_blood']     =  "Vomiting Blood";

        $a['GI'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['gu_pain_with_urination']    =  "Pain with Urination";
        $at[1]['gu_difficulty_urinating']   =  "Difficulty Urinating";
        $at[1]['gu_frequent_nightime_urination']    =  "Frequent Nightime Urination";

        $at["Women"]['gu_women_pelvic_pain']    =  "Pelvic Pain";
        $at["Women"]['gu_women_leaking_of_urine']   =  "Leaking of Urine";
        $at["Women"]['gu_women_nipple_discharge']   =  "Nipple Discharge";
        $at["Women"]['gu_women_breast_pain']    =  "Breast Pain";

        $at["Men"]['gu_men_difficulty_attaining_erection']  =  "Difficulty Attaining Erection";
        $at["Men"]['gu_men_testicular_pain']    =  "Testicular Pain";

        $a['GU'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['musculoskeletal_pain_in_joints']    =  "Pain in Joints";
        $at[1]['musculoskeletal_swollen_joints']    =  "Swollen Joints";
        $at[1]['musculoskeletal_muscle_pain']   =  "Muscle Pain";

        $a['Musculoskeletal'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['skin_rash']     =  "Rash";
        $at[1]['skin_hives']    =  "Hives";
        $at[1]['skin_changing_moles']   =  "Changing Moles";
        $at[1]['skin_sores_wont_heal']  =  "Sores that Won't Heal";

        $a['Skin'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['neurological_seizures']     =  "Seizures";
        $at[1]['neurological_loss_of_conciousness']     =  "Loss of Conciousness";
        $at[1]['neurological_speech_difficulty']    =  "Speech Difficulty";
        $at[1]['neurological_memory_loss']  =  "Memory Loss";

        $at[2]['neurological_numbness']     =  "Numbness";
        $at[2]['neurological_confusion']    =  "Confusion";

        $a['Neurological'] = $at;

        $at = array();
        $a_bottom = array();
        $at[1]['hematologic_easy_bruising']     =  "Easy Bruising";
        $at[1]['hematologic_bleeding_gums']     =  "Bleeding Gums";

        $a['Hematologic'] = $at;

        $at = array();
        $a_bottom = array();
        $at["When sexually active,<br> are you active with:"]['sexually_active_men']    =  "Men";
        $at["When sexually active,<br> are you active with:"]['sexually_active_women']  =  "Women";
        $at["When sexually active,<br> are you active with:"]['sexually_active_both']   =  "Both";

        $a['General'] = $at;

        return $a;
    }
}   // end of Form
