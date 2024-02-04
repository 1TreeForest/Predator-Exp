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

unset($aActivation[0]);
   
    
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$htmlAddTop!}]
            : [{!$this->doorGets->__('Partager un lien')!}] 
        </legend>
        
        [{!$formAddTopExtra!}]
        <div class="separateur-tb"></div>
        <div class="row">
            <div class="col-md-9">
                [{!$this->doorGets->Form->input($this->doorGets->__('Lien').' <span class="cp-obli">*</span>','url')!}]
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item"><b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Catégories')!}]</div>
                    [{?(!empty($listeCategories)):}]
                        [{/($listeCategories as $uri=>$value):}]
                            <div class="list-group-item cat-index-level-[{!$value['level']!}]">
                                [{!$this->doorGets->Form->checkbox(''.$value['name'],'categories_'.$value['id'],'1','','cat-edit-level-'.$value['level'])!}]
                            </div>
                        [/]
                    [?]
                </div>
            </div>
        </div> 
        <div class="separateur-tb"></div>
        [{!$formAddBottomExtra!}]
        <script type="text/javascript">
            isUploadedInput("modulesharedlinks_add_image");
            isUploadedMultiInput("modulesharedlinks_add_image_gallery");
            isUploadedFacebookInput("modulesharedlinks_add_meta_facebook_image");
            isUploadedTwitterInput("modulesharedlinks_add_meta_twitter_image");
        </script>
    </div>
</div>
