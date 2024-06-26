<?php

/* +-----------------------------------------------------------------------------+
* Copyright 2016 matrix israel
* LICENSE: This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 3
* of the License, or (at your option) any later version.
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* You should have received a copy of the GNU General Public License
* along with this program. If not, see
* http://www.gnu.org/licenses/licenses.html#GPL
*    @author  Oshri Rozmarin <oshri.rozmarin@gmail.com>
* +------------------------------------------------------------------------------+
 *
 */

namespace Multipledb\Controller;

use Multipledb\Model\MultipledbData;
use Zend\Json\Server\Exception\ErrorException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Listener\Listener;
use Error;

class MultipledbController extends BaseController
{
    /**
     * MultipledbController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->listenerObject = new Listener();
        //todo add permission of admin
    }


    /**
     * @return \Zend\Stdlib\ResponseInterface the index action
     */

    public function indexAction()
    {
        $this->getJsFiles();
        $this->getCssFiles();
        $this->layout()->setVariable('jsFiles', $this->jsFiles);
        $this->layout()->setVariable('cssFiles', $this->cssFiles);
        $this->layout()->setVariable("title", $this->listenerObject->z_xl("Multiple DataBase"));
        $this->checkAcl();

        return new ViewModel(array(
            'translate' => $this->translate,
            'getmultipledb' => $this->getMultipledbTable()->fetchAll(),

        ));
    }

    public function editAction()
    {
        $id = substr((int)$_REQUEST['id'], 0, 11);
        $_SESSION['multiple_edit_id'] = $id;
        $this->getJsFiles();
        $this->getCssFiles();
        $this->layout()->setVariable('jsFiles', $this->jsFiles);
        $this->layout()->setVariable('cssFiles', $this->cssFiles);
        $this->layout()->setVariable("title", $this->listenerObject->z_xl("Multiple DataBase"));
        $this->checkAcl('write');

        return new ViewModel(array(
            'translate' => $this->translate,
            'db' =>  $this->getMultipledbTable()->getMultipledbById($id),
        ));
    }

    public function removeAction()
    {
        $this->checkAcl('write');
        $id = substr((int)$_REQUEST['id'], 0, 11);
        $this->getMultipledbTable()->deleteMultidbById($id);
        return $this->redirect()->toRoute('multipledb', array(
            'action' => 'index'
        ));
    }

    public function saveAction()
    {
        $this->checkAcl('write');
        $id = substr((int)$_SESSION['multiple_edit_id'], 0, 11);
        $db = array();
        if ($_REQUEST['db']) {
            foreach ($_REQUEST['db'] as $key => $value) {
                $db[$key] = htmlentities($value, ENT_QUOTES | ENT_IGNORE, "UTF-8");
            }

            $this->getMultipledbTable()->storeMultipledb($id, $db);
        }

        // remove session data
        $_SESSION['multiple_edit_id'] = 0; // In case session not destroyed
        unset($_SESSION['multiple_edit_id']);

        return $this->redirect()->toRoute('multipledb', array(
            'action' => 'index'
        ));
    }

    public function checknamespacejsonAction()
    {
        $this->checkAcl('write');
        $namespace = $_REQUEST['namespace'];
        echo $this->getMultipledbTable()->checknamespace($namespace);
        exit();
    }

    public function generatesafekeyAction()
    {

        $id = substr((int)$_REQUEST['id'], 0, 11);
        $this->getJsFiles();
        $this->getCssFiles();
        $this->layout()->setVariable('jsFiles', $this->jsFiles);
        $this->layout()->setVariable('cssFiles', $this->cssFiles);
        $this->layout()->setVariable("title", $this->listenerObject->z_xl("Multiple DataBase"));
        $this->checkAcl('write');

        return new ViewModel(array(
            'translate' => $this->translate,
            'randomSafeKey' => $this->getMultipledbTable()->randomSafeKey(),

        ));
    }



    /**
     * get instance of Multipledb
     * @return array|object
     */
    private function getMultipledbTable()
    {

        if (!$this->MultipledbTable) {
            $sm = $this->getServiceLocator();
            $this->MultipledbTable = $sm->get('Multipledb\Model\MultipledbTable');
        }

        return $this->MultipledbTable;
    }

    public function errorAction()
    {


        $this->getJsFiles();
        $this->getCssFiles();
        $this->layout()->setVariable('jsFiles', $this->jsFiles);
        $this->layout()->setVariable('cssFiles', $this->cssFiles);
    }

    public function checkAcl($mode = null)
    {
        if ($mode == 'view' or $mode == 'write') {
            if (!acl_check('admin', 'multipledb', false, $mode)) {
                $this->redirect()->toRoute("multipledb", array("action" => "error"));
            }
        } else {
            if (!acl_check('admin', 'multipledb')) {
                $this->redirect()->toRoute("multipledb", array("action" => "error"));
            }
        }
    }
}
