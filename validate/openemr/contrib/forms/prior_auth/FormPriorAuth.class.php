<?php




/**
 * class PriorAuth
 *
 */
class FormPriorAuth extends ORDataObject
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
    public $prior_auth_number;
    public $comments;


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

        $this->_table = "form_prior_auth";
        $this->date = date("Y-m-d H:i:s");
        $this->activity = 1;
        $this->pid = $GLOBALS['pid'];
        $this->prior_auth_number = "";
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


    public function set_comments($string)
    {
        $this->comments = $string;
    }

    public function get_comments()
    {
        return $this->comments;
    }

    public function set_prior_auth_number($string)
    {
        $this->prior_auth_number = $string;
    }

    public function get_prior_auth_number()
    {
        return $this->prior_auth_number;
    }


    public function get_date()
    {
        return $this->date;
    }
}   // end of Form
