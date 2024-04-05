<?php
/* FormHPI class
 *
 * @package OpenEMR
 * @author Aron Racho <aron@mi-squared.com>
 * @author Stephen Waite <stephen.waite@cmsvt.com>
 * @copyright Copyright (C) 2009 Aron Racho <aron@mi-squared.com>
 * @copyright Copyright (c) 2017 Stephen Waite <stephen.waite@cmsvt.com>
 * @link https://github.com/openemr/openemr/tree/master
 * @license https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

define("EVENT_VEHICLE", 1);
define("EVENT_WORK_RELATED", 2);
define("EVENT_SLIP_FALL", 3);
define("EVENT_OTHER", 4);


/**
 * class FormHpTjePrimary
 *
 */

class FormHPI extends ORDataObject
{
    public $id;
    public $date;
    public $pid;
    public $user;
    public $groupname;
    public $activity;
    public $complaint;
    public $location;
    public $quality;
    public $severity;
    public $duration;
    public $timing;
    public $context;
    public $factors;
    public $signs;

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

        $this->_table = "form_hpi";
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

    public function get_complaint()
    {
        return $this->complaint;
    }

    public function set_complaint($data)
    {
        if (!empty($data)) {
            $this->complaint = $data;
        }
    }

    public function get_location()
    {
        return $this->location;
    }

    public function set_location($data)
    {
        if (!empty($data)) {
            $this->location = $data;
        }
    }

    public function get_quality()
    {
        return $this->quality;
    }

    public function set_quality($data)
    {
        if (!empty($data)) {
            $this->quality = $data;
        }
    }

    public function get_severity()
    {
        return $this->severity;
    }

    public function set_severity($data)
    {
        if (!empty($data)) {
            $this->severity = $data;
        }
    }

    public function get_duration()
    {
        return $this->duration;
    }

    public function set_duration($data)
    {
        if (!empty($data)) {
            $this->duration = $data;
        }
    }

    public function get_timing()
    {
        return $this->timing;
    }

    public function set_timing($data)
    {
        if (!empty($data)) {
            $this->timing = $data;
        }
    }

    public function get_context()
    {
        return $this->context;
    }

    public function set_context($data)
    {
        if (!empty($data)) {
            $this->context = $data;
        }
    }

    public function get_factors()
    {
        return $this->factors;
    }

    public function set_factors($data)
    {
        if (!empty($data)) {
            $this->factors = $data;
        }
    }

    public function get_signs()
    {
        return $this->signs;
    }

    public function set_signs($data)
    {
        if (!empty($data)) {
            $this->signs = $data;
        }
    }

    public function persist()
    {
        parent::persist();
    }
}   // end of Form
