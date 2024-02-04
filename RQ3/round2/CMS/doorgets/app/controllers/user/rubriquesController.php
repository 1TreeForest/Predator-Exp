<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/


class RubriquesController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        $doorGets->Table = '_rubrique';
        
        $params = $doorGets->Params();
                
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        if (!in_array('menu',$doorGets->user['liste_module_interne'])
            || ( in_array('menu',  $doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_MENU)) {

            FlashInfo::set($doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        // get Content for edit / delete
        if (array_key_exists('id',$params['GET']))
        {
            
            $id = $params['GET']['id'];
            $isContent = $doorGets->dbQS($id,$doorGets->Table);
            if (!is_numeric($id)) { $id = '-!-'; }
            if (empty($isContent)) {
                
                FlashInfo::set($doorGets->__("Le contenu n'existe pas"),"error");
                header('Location:./?controller=rubriques'); exit();
                
            }

        }

        parent::__construct($doorGets);

    }
    
    public function indexAction() {
        
        $this->doorGets->Form['_position_down'] = new Formulaire('_position_down');
        $this->doorGets->Form['_position_up'] = new Formulaire('_position_up');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addAction() {
        
        $this->doorGets->Form = new Formulaire('rubriques_add');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editAction() {
        
        $this->doorGets->Form = new Formulaire('rubriques_edit');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
    public function deleteAction() {
        
        $this->doorGets->Form = new Formulaire('rubriques_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
}
