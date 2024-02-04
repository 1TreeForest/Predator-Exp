<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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

$urlSitemapLink = '<a href="'.$urlSitemap.'" target="blank" />'.$urlSitemap.'</a>';

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title-breadcrumb page-header">
        <ol class="breadcrumb">
            <li><a href="./?controller=configuration">[{!$this->doorGets->__('Configuration')!}]</a></li>
            <li class="active">[{!$htmlConfigSelect!}]</li> 
        </ol>
    </div>
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
            <h2>
                <b class="glyphicon glyphicon-tree-deciduous"></b> [{!$this->doorGets->__('Plan du site')!}]
                <small>[{!$this->doorGets->__('Générer votre plan du site en un clic')!}].</small>
            </h2>
        </div>
        <b>[{!ucfirst($this->doorGets->__('Dernière génération du plan du site'))!}]</b> : [{!$dateEdit!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->open()!}]
        [{!$this->doorGets->Form->input('','k','hidden','1')!}]
        <div>[<a href="[{!URL!}]sitemap.xml" target="_blank">[{!URL!}]sitemap.xml</a>]</div>
        <div class="separateur-tb"></div>
        [{?(count($this->doorGets->allLanguagesWebsite) > 1):}]
            [{/($this->doorGets->allLanguagesWebsite as $k=>$v):}]
                <div>[{!$v!}] : <a href="[{!URL!}]t/[{!$k!}]/sitemap.xml" target="_blank">[{!URL!}]t/[{!$k!}]/sitemap.xml</a></div>
                <div class="separateur-tb"></div>
            [/]
        [?]
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Générer le plan du site'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
        
    </div>
</div>
