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
                <i class="fa fa-exchange"></i> [{!$this->doorGets->__('Paiement par chèque')!}]
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]
            <div class="panel panel-default">
                <div class="panel-heading">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer'),'check_active',1,$isCheckActive)!}]
                </div>
                <div class="panel-body">
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Information'),'check_tinymce',$this->doorGets->configWeb['check_tinymce_edit'],'tinymce')!}]
                </div>
            </div>

            <div class="separateur-tb"></div>
            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
