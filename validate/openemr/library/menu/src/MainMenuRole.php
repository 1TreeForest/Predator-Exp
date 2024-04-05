<?php
/**
 * MainMenuRole class.
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2017-2018 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Menu;

use OpenEMR\Services\UserService;

class MainMenuRole extends MenuRole
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // This is where the magic happens to support special menu items.
        //   An empty menu_update_map array is created in MenuRole class
        //   constructor. Adding to this array will link special menu items
        //   to functions in this class.
        parent::__construct();
        $this->menu_update_map["Visit Forms"] = "updateVisitForms";
        $this->menu_update_map["Modules"] = "updateModulesModulesMenu";
        $this->menu_update_map["Reports"] = "updateModulesReportsMenu";
    }

    /**
     * Collect the Menu for logged in user.
     *
     * @return array representation of the Menu
     */
    public function getMenu()
    {
        // Collect the selected menu of user
        $mainMenuRole = $this->getMenuRole();

        // Load the selected menu
        if (preg_match("/.json$/", $mainMenuRole)) {
            // load custom menu (includes .json in id)
            $menu_parsed = json_decode(file_get_contents($GLOBALS['OE_SITE_DIR'] . "/documents/custom_menus/" . $mainMenuRole));
        } else {
            // load a standardized menu (does not include .json in id)
            $menu_parsed = json_decode(file_get_contents($GLOBALS['fileroot'] . "/interface/main/tabs/menu/menus/" . $mainMenuRole . ".json"));
        }

        // if error, then die and report error
        if (!$menu_parsed) {
            die("\nJSON ERROR: " . json_last_error());
        }

        $this->menuUpdateEntries($menu_parsed);
        $menu_restrictions = array();
        $this->menuApplyRestrictions($menu_parsed, $menu_restrictions);
        return $menu_restrictions;
    }

    /**
     * Build the html select element to list the MainMenuRole options.
     *
     * @var string $selected Current MainMenuRole for current users.
     * @return string Html select element to list the MainMenuRole options.
     */
    public function displayMenuRoleSelector($selected = "")
    {
        $output = "<select name='main_menu_role' id='main_menu_role' class='form-control'>";
        $output .= "<option value='standard' " . (($selected == "standard") ? "selected" : "") . ">" . xlt("Standard") . "</option>";
        $output .= "<option value='answering_service' " . (($selected == "answering_service") ? "selected" : "") . ">" . xlt("Answering Service") . "</option>";
        $output .= "<option value='front_office' " . (($selected == "front_office") ? "selected" : "") . ">" . xlt("Front Office") . "</option>";
        $customMenuDir = $GLOBALS['OE_SITE_DIR'] . "/documents/custom_menus";
        if (file_exists($customMenuDir)) {
            $dHandle = opendir($customMenuDir);
            while (false !== ($menuCustom = readdir($dHandle))) {
                // Only process files that contain *.json
                if (preg_match("/.json$/", $menuCustom)) {
                    $selectedTag = ($selected == $menuCustom) ? "selected" : "";
                    $output .= "<option value='" . attr($menuCustom) . "' " . $selectedTag . ">";
                    // Drop the .json and translate the name
                    $output .= xlt(substr($menuCustom, 0, -5));
                    $output .= "</option>";
                }
            }

            closedir($dHandle);
        }

        $output .= "</select>";
        return $output;
    }

    /**
     * Collect the MainMenuRole for logged in user.
     *
     * @return string Identifier for the MainMenuRole
     */
    private function getMenuRole()
    {
        $userService = new UserService();
        $user = $userService->getCurrentlyLoggedInUser();
        $mainMenuRole = $user->getMainMenuRole();
        if (empty($mainMenuRole)) {
            $mainMenuRole = "standard";
        }

        return $mainMenuRole;
    }

    /**
     * load modules created by modules system
     * @param $menu_list
     */
    protected function updateModulesModulesMenu(&$menu_list)
    {
        $module_query = sqlStatement("select mod_id,mod_directory,mod_name,mod_nick_name,mod_relative_link,type from modules where mod_active = 1 AND sql_run= 1 order by mod_ui_order asc");
        if (sqlNumRows($module_query)) {
            while ($modulerow = sqlFetchArray($module_query)) {
                $module_hooks =  sqlStatement("SELECT msh.*,ms.obj_name,ms.menu_name,ms.path,m.mod_ui_name,m.type FROM modules_hooks_settings AS msh LEFT OUTER JOIN modules_settings AS ms ON
                                    obj_name=enabled_hooks AND ms.mod_id=msh.mod_id LEFT OUTER JOIN modules AS m ON m.mod_id=ms.mod_id
                                    WHERE m.mod_id = ? AND fld_type=3 AND mod_active=1 AND sql_run=1 AND attached_to='modules' ORDER BY m.mod_id", array($modulerow['mod_id']));

                $modulePath = "";
                $added      = "";
                if ($modulerow['type'] == 0) {
                    $modulePath = $GLOBALS['customModDir'];
                    $added      = "";
                } else {
                    $added      = "index";
                    $modulePath = $GLOBALS['zendModDir'];
                }

                $relative_link = "/interface/modules/".$modulePath."/".$modulerow['mod_relative_link'].$added;
                $mod_nick_name = $modulerow['mod_nick_name'] ? $modulerow['mod_nick_name'] : $modulerow['mod_name'];

                if (sqlNumRows($module_hooks) == 0) {
                    // module without hooks in module section
                    $acl_section = strtolower($modulerow['mod_directory']);
                    if (zh_acl_check($_SESSION['authUserID'], $acl_section) ? "" : "1") {
                        continue;
                    }

                    $newEntry = new \stdClass();
                    $newEntry->label = xlt($mod_nick_name);
                    $newEntry->url = $relative_link;
                    $newEntry->requirement = 0;
                    $newEntry->target = 'mod';
                    array_push($menu_list->children, $newEntry);
                } else {
                    // module with hooks in module section
                    $newEntry = new \stdClass();
                    $newEntry->requirement = 0;
                    $newEntry->icon = "fa-caret-right";
                    $newEntry->label = xlt($mod_nick_name);
                    $newEntry->children = array();
                    $jid = 0;
                    $modid = '';
                    while ($hookrow = sqlFetchArray($module_hooks)) {
                        if (zh_acl_check($_SESSION['authUserID'], $hookrow['obj_name']) ? "" : "1") {
                            continue;
                        }

                        $relative_link = "/interface/modules/".$modulePath."/".$hookrow['mod_relative_link'].$hookrow['path'];
                        $mod_nick_name = $hookrow['menu_name'] ? $hookrow['menu_name'] : 'NoName';

                        if ($jid == 0 || ($modid != $hookrow['mod_id'])) {
                            $subEntry = new \stdClass();
                            $subEntry->requirement = 0;
                            $subEntry->target = 'mod';
                            $subEntry->menu_id = 'mod0';
                            $subEntry->label = xlt($mod_nick_name);
                            $subEntry->url = $relative_link;
                            $newEntry->children[] = $subEntry;
                        }

                        $jid++;
                    }

                    array_push($menu_list->children, $newEntry);
                }
            }
        }
    }

    /**
     * load reports created by modules system
     * @param $menu_list
     */
    protected function updateModulesReportsMenu(&$menu_list)
    {
        $module_query = sqlStatement("SELECT msh.*,ms.obj_name,ms.menu_name,ms.path,m.mod_ui_name,m.type FROM modules_hooks_settings AS msh LEFT OUTER JOIN modules_settings AS ms ON
                                    obj_name=enabled_hooks AND ms.mod_id=msh.mod_id LEFT OUTER JOIN modules AS m ON m.mod_id=ms.mod_id
                                    WHERE fld_type=3 AND mod_active=1 AND sql_run=1 AND attached_to='reports' ORDER BY mod_id");
        $reportsHooks = array();
        if (sqlNumRows($module_query)) {
            $jid = 0;
            $modid = '';

            while ($hookrow = sqlFetchArray($module_query)) {
                if ($hookrow['type'] == 0) {
                    $modulePath = $GLOBALS['customModDir'];
                    $added = "";
                } else {
                    $added = "index";
                    $modulePath = $GLOBALS['zendModDir'];
                }

                if ($jid == 0 || ($modid != $hookrow['mod_id'])) {
                    //create new label
                    $newEntry = new \stdClass();
                    $newEntry->requirement = 0;
                    $newEntry->icon = "fa-caret-right";
                    $newEntry->label = xlt($hookrow['mod_ui_name']);
                    $newEntry->children = array();

                    $reportsHooks[] = $newEntry;
                    array_unshift($menu_list->children, $newEntry);
                }

                if (zh_acl_check($_SESSION['authUserID'], $hookrow['obj_name']) ? "" : "1") {
                    continue;
                }

                $relative_link = "/interface/modules/" . $modulePath . "/" . $hookrow['mod_relative_link'] . $hookrow['path'];
                $mod_nick_name = $hookrow['menu_name'] ? $hookrow['menu_name'] : 'NoName';

                $subEntry = new \stdClass();
                $subEntry->requirement = 0;
                $subEntry->target = 'rep';
                $subEntry->menu_id = 'rep0';
                $subEntry->label = xlt($mod_nick_name);
                $subEntry->url = $relative_link;

                $reportsHooks[count($reportsHooks) - 1]->children[] = $subEntry;

                $jid++;
                $modid = $hookrow['mod_id'];
            }
        }
    }

    // This creates menu entries for all encounter forms.
    //
    protected function updateVisitForms(&$menu_list)
    {
        $baseURL = "/interface/patient_file/encounter/load_form.php?formname=";
        $menu_list->children = array();

        $lres = sqlStatement("SELECT grp_form_id AS option_id, grp_title AS title, grp_aco_spec " .
            "FROM layout_group_properties WHERE " .
            "grp_form_id LIKE 'LBF%' AND grp_group_id = '' AND grp_activity = 1 " .
            "ORDER BY grp_seq, grp_title");

        while ($lrow = sqlFetchArray($lres)) {
            $option_id = $lrow['option_id']; // should start with LBF
            $title = $lrow['title'];
            $formURL = $baseURL . urlencode($option_id);
            $formEntry = new \stdClass();
            $formEntry->label = xl_form_title($title);
            $formEntry->url = $formURL;
            $formEntry->requirement = 2;
            $formEntry->target = 'enc';
            // Plug in ACO attribute, if any, of this LBF.
            if (!empty($lrow['grp_aco_spec'])) {
                $tmp = explode('|', $lrow['grp_aco_spec']);
                if (!empty($tmp[1])) {
                    $formEntry->acl_req = array($tmp[0], $tmp[1], 'write', 'addonly');
                }
            }
            array_push($menu_list->children, $formEntry);
        }

        // Traditional forms
        $reg = getRegistered();
        if (!empty($reg)) {
            foreach ($reg as $entry) {
                $option_id = $entry['directory'];
                $title = trim($entry['nickname']);
                if ($option_id == 'fee_sheet') {
                    continue;
                }

                if ($option_id == 'newpatient') {
                    continue;
                }

                if (empty($title)) {
                    $title = $entry['name'];
                }

                $formURL = $baseURL . urlencode($option_id);
                $formEntry = new \stdClass();
                $formEntry->label = xl_form_title($title);
                $formEntry->url = $formURL;
                $formEntry->requirement = 2;
                $formEntry->target = 'enc';
                // Plug in ACO attribute, if any, of this form.
                $tmp = explode('|', $entry['aco_spec']);
                if (!empty($tmp[1])) {
                    $formEntry->acl_req = array($tmp[0], $tmp[1], 'write', 'addonly');
                }

                array_push($menu_list->children, $formEntry);
            }
        }
    }
}
