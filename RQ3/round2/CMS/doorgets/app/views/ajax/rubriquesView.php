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


class RubriquesView extends doorGetsAjaxView{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $this->doorGets->checkAjaxMode();
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $arrayAction = array(
            
            'index'         => 'Home',
            'updateOrder' => 'Update orders rubrique',
            
        );
        
        $params = $this->doorGets->Params();
        $canContinue = false;
        if (!empty($this->doorGets->user)) {
            $canContinue = (in_array('menu',$this->doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || ( in_array('menu',  $this->doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_MENU)? true:false; 
        }

        if (array_key_exists($this->Action,$arrayAction) && $canContinue)
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'updateOrder':

	            	$value = '';
	                
                    $response['data'] = array(
                        'message' => 'Error'
                    );

                    if (array_key_exists('value', $params['GET'])) {

                        $value = trim($params['GET']['value']);
                        $list = explode('|',$value);
                        $cList = count($list);
                        if (!empty($list) && $cList > 1) {
                            $sqlQuery = '';
                            $i = 1;
                            foreach ($list as $value) {
                                $sqlQuery .= "UPDATE _rubrique SET ordre = '$i' WHERE id = '$value' LIMIT 1; ";
                                $i++;
                            }
                            //echo $sqlQuery;
                            $this->doorGets->dbQL($sqlQuery);
                            $response['code'] = 200;
                            $response['data'] = array(
                                'message'   => 'update ok',
                            );
                        }
                    }
	                break;

	        }
        }

        return json_encode($response);;
    }
}
