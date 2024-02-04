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


class ModuleGenformView extends doorGetsUserModuleOrderView {
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $nameController     = $this->doorGets->controllerNameNow();
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        $listeCategories    = $this->doorGets->categorieSimple;

        unset($listeCategories[0]);

        $aActivation = $this->doorGets->getArrayForms('activation');
        
        $extras = unserialize(base64_decode($moduleInfos['all']['extras']));
        
        $Rubriques = array(
            
            'index'         => 'index',
            'select'        => 'Selection',
            'delete'        => 'Supprimer',
            'massdelete'    => 'Supprimer par groupe',
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (empty($isContent)) {
                
                header('Location:?controller=modules');
                
            }
            
            $idNextContent      = $this->doorGets->getIdContentPositionDate($isContent['id']);
            $idPreviousContent  = $this->doorGets->getIdContentPositionDate($isContent['id'],'prev');
            
            $urlPrevious = '';
            if (!empty($idPreviousContent)) {
                $urlPrevious = '?controller='.$this->doorGets->controllerNameNow().'&action=select&uri='.$this->doorGets->Uri.'&id='.$idPreviousContent;
            }
            $urlNext = '';
            if (!empty($idNextContent)) {
                $urlNext = '?controller='.$this->doorGets->controllerNameNow().'&action=select&uri='.$this->doorGets->Uri.'&id='.$idNextContent;
            }
        }
        
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    if (!empty($this->doorGets->Uri) && !empty($this->doorGets->Table)) {
                        
                        $q = '';
                        $urlSearchQuery = '';
                        
                        $p = 1;
                        $ini = 0;
                        $per = 50;
                        
                        $params = $this->doorGets->Params();
                        $lgActuel =$this->doorGets->getLangueTradution();
                        
                        $isFieldArray       = array(
                            
                            "id"=>$this->doorGets->__('ID'),
                            "adresse_ip"=>$this->doorGets->__('Adresse IP'),
                            "date_creation"=>$this->doorGets->__('Date')
                        );
                        
                        $isFieldArraySort   = array('id','adresse_ip','date_creation',);
                        $isInClassicTable   = array('id','adresse_ip');
                        $isFieldArraySearch = array('id','adresse_ip','date_creation_start','date_creation_end',);
                        $isFieldArrayDate   = array('date_creation');
                        
                        $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                        $urlSearchQuery     = '';
                        $urlSort            = '&desc';
                        $urlLg              = '&lg='.$lgActuel;
                        $urlCategorie       = '';
                        $urlGroupBy         = '&gby='.$per;
                        
                        // Init table query
                        $tAll = $this->doorGets->Table." "; 
                        
                        // Create query search for mysql
                        $sqlLabelSearch = '';
                        $arrForCountSearchQuery = array();
                        
                        // Init Query Search
                        $aGroupeFilter = array();
                        if (!empty($isFieldArraySearch)) {
                            
                            // Récupére les paramêtres du get et post pour la recherche par filtre
                            foreach($isFieldArraySearch as $v)
                            {
                                
                                $valueQP = '';
                                if (
                                    array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                               ) {
                                    
                                    $valueQP = trim($params['GET']['doorGets_search_filter_q_'.$v]);
                                    $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                    
                                }
                                
                                if (
                                    array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                    && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && !empty($params['POST']['doorGets_search_filter_q_'.$v])
                               ) {
                                    
                                    $valueQP = trim($params['POST']['doorGets_search_filter_q_'.$v]);
                                    $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                    
                                }
                                
                                if (
                                    ( array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                        && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                                    )
                                    ||
                                    ( array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                        && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                        && !empty($params['POST']['doorGets_search_filter_q_'.$v])
                                    )
                               ) {
                                    
                                    
                                    if (!empty($valueQP)) {
                                        
                                        $valEnd = str_replace('_start','',$v);
                                        $valEnd = str_replace('_end','',$v);
                                        
                                        if (in_array($valEnd,$isFieldArrayDate)) {
                                            
                                            if (
                                                array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                                && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                                           ) {
                                                $fromFormat = trim($params['GET']['doorGets_search_filter_q_'.$valEnd.'_start']);
                                                $toFormat = trim($params['GET']['doorGets_search_filter_q_'.$valEnd.'_end']);
                                                
                                            }else{
                                                $fromFormat = trim($params['POST']['doorGets_search_filter_q_'.$valEnd.'_start']);
                                                $toFormat = trim($params['POST']['doorGets_search_filter_q_'.$valEnd.'_end']);
                                            }
                                            
                                            $isValStart = $this->doorGets->validateDate($fromFormat);
                                            $isValEnd   = $this->doorGets->validateDate($toFormat);
                                            
                                            $from = "";
                                            $to = "";
                                            
                                            if ($isValStart && $isValEnd) {
                                                
                                                if (!empty($fromFormat) )
                                                { $from = strtotime($fromFormat);  }
                                                
                                                
                                                if (!empty($toFormat) )
                                                {  $to = strtotime($toFormat); $to = $to + ( 60 * 60 * 24 ); }
                                                
                                                if (strlen(str_replace('_end','',$v)) !== strlen($v)) {
                                                    
                                                    $valEnd =  filter_var($valEnd, FILTER_SANITIZE_STRING);
                                                    $nameTable = $tableName.".".$valEnd;
                                                    
                                                    $sqlLabelSearch .= $nameTable." >= $from AND ";
                                                    $sqlLabelSearch .= $nameTable." <= $to AND ";
                                                    
                                                    $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                                    $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                                    
                                                    $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                                    
                                                }
                                            }
                                            
                                        }else{
                                            
                                            if (in_array($v,$isInClassicTable))
                                            {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                                
                                            }elseif (in_array($v,$isFieldArraySort)) {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.".$v,'type'=>'like','value'=>$valueQP);
                                            }
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'='.$valueQP;
                                        }
                                    }
                                }
                                
                            }
                            
                            // préparation de la requête mysql
                            if (!empty($sqlLabelSearch)) {
                                
                                $sqlLabelSearch = substr($sqlLabelSearch,0,-4);
                                $sqlLabelSearch = " WHERE ( $sqlLabelSearch ) ";
                                
                            }
                            
                        }
                        
                        // Init Group By
                        if (
                            array_key_exists('gby',$params['GET'])
                            && is_numeric($params['GET']['gby'])
                            && $params['GET']['gby'] < 300
                       ) {
                            
                            $per        = $params['GET']['gby'];
                            $urlGroupBy = '&gby='.$per;
                            
                        }
                        
                        // Init count total fields
                        $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                        
                        // Init categorie
                        $sqlCategorie = '';
                        
                        if (
                            array_key_exists('categorie',$params['GET'])
                            && !empty($params['GET']['categorie'])
                            && array_key_exists($params['GET']['categorie'],$this->doorGets->categorieSimple)
                       ) {
                            
                            
                            $getCategorie = $params['GET']['categorie'];
                            
                            $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.categorie','type'=>'like','value'=>'#'.$getCategorie.',');
                            
                            $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                            
                            $sqlCategorie = " AND ".$this->doorGets->Table.".categorie LIKE '%#".$getCategorie.",%'";
                            $urlCategorie = '&categorie='.$getCategorie;
                            
                        }
                        
                        // Init sort 
                        $getDesc = 'DESC';
                        $getSort = '&asc';
                        if (isset($_GET['asc']))
                        {
                            $getDesc = 'ASC';
                            $getSort = '&desc';
                            $urlSort = '&asc';
                        }
                        
                        // Init filter for order by 
                        $outFilterORDER = $this->doorGets->Table.'.date_creation  '.$getDesc;
                        
                        $getFilter = '';
                        if (
                            array_key_exists('orderby',$params['GET'])
                            && !empty($params['GET']['orderby'])
                            && in_array($params['GET']['orderby'],$isFieldArraySort)
                       ) {
                            
                            $getFilter      = $params['GET']['orderby'];
                            
                            $outFilterORDER = $this->doorGets->Table.'.'.$getFilter.'  '.$getDesc;
                            
                            // Execption for field that not in traduction table
                            if (in_array($getFilter,$isInClassicTable) )
                            {
                                $outFilterORDER = $this->doorGets->Table.'.'.$getFilter.'  '.$getDesc;
                            }
                            
                            $urlOrderby     = '&orderby='.$getFilter;
                            
                        }
                        
                        // Init page position
                        if (
                            array_key_exists('page',$params['GET'])
                            && is_numeric($params['GET']['page'])
                            && $params['GET']['page'] <= (ceil($cResultsInt / $per))
                       ) {
                            
                            $p = $params['GET']['page'];
                            $ini = $p * $per - $per;
                        }
                        
                        $finalPer = $ini+$per;
                        if ($finalPer >  $cResultsInt) {
                            $finalPer = $cResultsInt;
                        }
                        
                        // Create sql query for transaction
                        $outSqlGroupe = $sqlLabelSearch;
                        $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                        
                        // Create url to go for pagination
                        $urlPage = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                        $urlPagePosition = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
                        // Generate the pagination system
                        $valPage = '';
                        if ($cResultsInt > $per) {
                            
                            $valPage = Pagination::page($cResultsInt,$p,$per,$urlPage);
                            
                        }
                        
                        // Select all contents / Query SQL
                        $all = $this->doorGets->dbQA($tAll,$sqlLimit);
                        $cAll = count($all);
                        
                        /**********
                         *
                         *  Start block creation for listing fields
                         * 
                         **********/
                        
                        $block = new BlockTable();
                        
                        $imgTop = '<div class="d-top"></div>';
                        $imgBottom= '<div class="d-bottom"></div>';
                        $block->setClassCss('doorgets-listing');
                        
                        $iPos = 0;
                        $dgSelMass = '';
                        $urlPage = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie."&lg=$lgActuel&page=";
                        $urlPageGo = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.$urlCategorie.'&lg='.$lgActuel;
                        
                        // $block->addTitle($dgSelMass,'sel_mass','td-title');
                        foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                            
                            $_css   = '_css_'.$fieldName;
                            $_img   = '_img_'.$fieldName;
                            $_desc  = '_desc_'.$fieldName;
                            
                            $$_css = $$_img = $$_desc = $leftFirst = '';
                            
                            if (
                                $getFilter === $fieldName
                                || ( empty($getFilter) && $fieldName === $isFieldArraySort[0] )
                           ) {
                                $$_css = ' class="green" ';
                                $$_img = $imgTop;
                                $$_desc = $getSort;
                                if ($getDesc === 'ASC') {
                                    $$_img = $imgBottom;
                                    $$_desc = '';
                                }
                            }
                            
                            if ($iPos === 0) {
                                $leftFirst = 'first-title left';
                            }
                            
                            $dgLabel = $fieldNameLabel;
                            if (in_array($fieldName,$isFieldArraySort))
                            {
                                $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                            }
                            
                            $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title center");
                            $iPos++;
                            
                        }
                        

                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        $arFilterActivation = $this->doorGets->getArrayForms('activation');
                        
                        $valFilterId = '';
                        if (array_key_exists('doorGets_search_filter_q_id',$aGroupeFilter)) {
                            $valFilterId = $aGroupeFilter['q_id'];
                        }
                        
                        $valFilterIp = '';
                        if (array_key_exists('doorGets_search_filter_q_adresse_ip',$aGroupeFilter)) {
                            $valFilterIp = $aGroupeFilter['q_adresse_ip'];
                        }
                        
                        $valFilterDateStart = '';
                        if (array_key_exists('doorGets_search_filter_q_date_creation_start',$aGroupeFilter)) {
                            $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                        }
                        
                        $valFilterDateEnd = '';
                        if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                            $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                        }
                        
                        $sFilterId      = $this->doorGets->Form['_search_filter']->input('','q_id','text',$valFilterId);
                        $sFilterIp      = $this->doorGets->Form['_search_filter']->input('','q_adresse_ip','text',$valFilterIp);
                        $sFilterDate    = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                        $sFilterDate    .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                        
                        // Search
                        $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                        $urlMassdelete = '';
                        
                        // $block->addContent('sel_mass',$urlMassdelete );
                        $block->addContent('id',$sFilterId );
                        $block->addContent('adresse_ip',$sFilterIp );
                        $block->addContent('date_creation',$sFilterDate,'center');
                        $block->addContent('edit','--','center');
                        $block->addContent('delete','--','center');
                        
                        // end Seach
                        
                        if (empty($cAll)) {
                            
                            // $block->addContent('sel_mass','' );
                            $block->addContent('id','' );
                            $block->addContent('adresse_ip','' );
                            $block->addContent('date_creation','','center');
                            $block->addContent('edit','','center');
                            $block->addContent('delete','','center');
                            
                        }
                        
                        for($i=0;$i<$cAll;$i++) {
                            
                            $ImageStatut = BASE_IMG.'puce-rouge.png';
                            $urlStatut = '<img src="'.$ImageStatut.'" style="vertical-align: middle;" >';
                            
                            $urlMassdelete = '<input id="'.$all[$i]["id"].'" type="checkbox" class="check-me-mass" >';
                            $urlTitle = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=select&id='.$all[$i]['id'].'&lg='.$lgActuel.'">'.$all[$i]["id"].'</a>';
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=delete&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=select&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-zoom-in"></b></a>';
                            
                            $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                            
                            // $block->addContent('sel_mass',$urlMassdelete,'tb-30 ' );
                            $block->addContent('id',$urlTitle,'tb-30 ' );
                            $block->addContent('adresse_ip',$all[$i]["adresse_ip"] );
                            $block->addContent('date_creation',$dateCreation,'center');
                            $block->addContent('edit',$urlEdit,'tb-30 center');
                            $block->addContent('delete',$urlDelete,'tb-30 center');
                            
                        }
                        
                        $formMassDelete = '';
                        $fileFormMassDelete = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_massdelete';
                        $tplFormMassDelete = Template::getView($fileFormMassDelete);
                        ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                        
                        /**********
                         *
                         *  End block creation for listing fields
                         * 
                         */
                        
                    }
                    
                    break;
                
                
                case 'select':
                    $dataContent = array();
                    if (!empty($extras)) {
                        foreach($extras as $k=>$v) {
                            if (
                                $v['type'] !== 'tag-title'
                                && $v['type'] !== 'tag-quote'
                                && $v['type'] !== 'tag-separatteur'
                                && array_key_exists('value',$v)
                           ) {
                                $value = str_replace('-','_',$v['value']);
                                if (array_key_exists($value,$isContent)) {
                                    
                                    $dataContent[$v['label']] = $isContent[$value];
                                        
                                    if (
                                        $v['type'] === 'file'
                                   ) {
                                        
                                        if (!empty($isContent[$value])) {
                                            $dataContent[$v['label']] = '<a href="'.BASE.'data/_form/'.$isContent[$value].'" target="_blank">'.URL.'data/_form/'.$isContent[$value].'</a>';
                                            $rest = substr($isContent[$value],-3);
                                            if ($rest === 'jpg' || $rest === 'png' || $rest === 'gif') {
                                                $dataContent[$v['label']] = '<a href="'.BASE.'data/_form/'.$isContent[$value].'" target="_blank"><img class="px200" src="'.BASE.'data/_form/'.$isContent[$value].'" ></a>';
                                            }                                            
                                        }
                                        
                                    }
                                    
                                }
                            }
                        }
                    }
                    break;
                
                case 'delete':
                    
                    
                    $formDelete = '';
                    $fileFormDelete = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_delete';
                    
                    $tplFormDelete = Template::getView($fileFormDelete);
                    ob_start(); if (is_file($tplFormDelete)) { include $tplFormDelete;}  $formDelete .= ob_get_clean();
                    
                    break;
                
                
                
            }
            
            
            $ActionFile = 'modules/'.$this->doorGets->controllerNameNow().'/'.$this->doorGets->zoneArea().'_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}