<?php

require_once($GLOBALS['fileroot'] . "/library/forms.inc");
require_once("FormROS.class.php");

class C_FormROS extends Controller
{
    public $template_dir;

    public function __construct($template_mod = "general")
    {
        parent::__construct();
        $returnurl = 'encounter_top.php';
        $this->template_mod = $template_mod;
        $this->template_dir = dirname(__FILE__) . "/templates/ros/";
        $this->assign("FORM_ACTION", $GLOBALS['web_root']);
        $this->assign("DONT_SAVE_LINK", $GLOBALS['form_exit_url']);
        $this->assign("STYLE", $GLOBALS['style']);
    }

    public function default_action()
    {
        $ros = new FormROS();
        $this->assign("form", $ros);
        return $this->fetch($this->template_dir . $this->template_mod . "_new.html");
    }

    public function view_action($form_id)
    {

        if (is_numeric($form_id)) {
            $ros = new FormROS($form_id);
        } else {
            $ros = new FormROS();
        }

        $this->assign("form", $ros);
        return $this->fetch($this->template_dir . $this->template_mod . "_new.html");
    }

    public function default_action_process()
    {
        if ($_POST['process'] != "true") {
            return;
        }

        $this->ros = new FormROS($_POST['id']);

        parent::populate_object($this->ros);
        $this->ros->persist();

        if ($GLOBALS['encounter'] == "") {
            $GLOBALS['encounter'] = date("Ymd");
        }

        if (empty($_POST['id'])) {
            addForm($GLOBALS['encounter'], "Review Of Systems", $this->ros->id, "ros", $GLOBALS['pid'], $_SESSION['userauthorized']);
            $_POST['process'] = "";
        }

        return;
    }
}
