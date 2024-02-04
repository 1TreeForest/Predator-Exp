<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


?> 
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
        
        </div>
        <legend>
            <span class="create" ><a href="?controller=support&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b> [{!$this->doorGets->__('Créer un ticket')!}]</a></span>
            <i class="fa fa-ticket"></i> [{!$this->doorGets->__('Liste des tickets')!}]
        </legend>
        <div class="width-listing">
            <div style="overflow: hidden;">
                <div style="float: left;padding: 7px 0 ">
                    <i>
                        [{?(!empty($cAll)):}] [{!($ini+1)!}] [{!$this->doorGets->__("à")!}] [{!$finalPer!}] [{!$this->doorGets->__("sur")!}] [?] 
                        <b>[{!$cResultsInt.' '!}] [{?( $cResultsInt > 1 ):}][{!$this->doorGets->__('Items')!}] [??] [{!$this->doorGets->__('Item')!}] [?]</b>
                        | [{?(!empty($q)):}] [{!$this->doorGets->__('pour la recherche : ').' <b>'.$q.'</b>'!}] [?]
                    </i>
                    <span id="doorGets-sort-count">
                        [{!$this->doorGets->__('Par')!}]
                        <a href="[{!$urlPagePosition!}]&gby=10" [{?($per=='10'):}] class="active" [?]>10</a>
                        <a href="[{!$urlPagePosition!}]&gby=20" [{?($per=='20'):}] class="active" [?]>20</a>
                        <a href="[{!$urlPagePosition!}]&gby=50" [{?($per=='50'):}] class="active" [?]>50</a>
                        <a href="[{!$urlPagePosition!}]&gby=100" [{?($per=='100'):}] class="active" [?]>100</a>
                    </span>
                </div>
                <div  class="doorGets-box-search-module">
                    [{!$this->doorGets->Form['_search_filter']->open('post',$urlToGo,'')!}]
                    [{!$this->doorGets->Form['_search_filter']->submit($this->doorGets->__('Chercher'),'','btn btn-success')!}]
                    <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&lg=[{!$lgActuel!}]" class="btn btn-danger doorGets-filter-bt" >[{!$this->doorGets->__('Reset')!}]</a>
                </div>
            </div>
            <div class="separateur-tb"></div>
            [{!$block->getHtml()!}]
            [{!$this->doorGets->Form['_search']->close()!}]
            
            [{?(!empty($cAll)):}]
                [{!$valPage!}]
            [??]
                [{?(!empty($aGroupeFilter)):}]
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun resultat trouvé pour votre recherche");}]
                    </div>
                [??]
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a aucun resultat")!}]
                    </div>
                [?]
                
            [?] 
        </div>
    </div>
</div>
