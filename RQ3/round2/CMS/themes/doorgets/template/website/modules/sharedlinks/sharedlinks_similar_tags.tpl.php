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

 
 /*
  * Variables :
  *
      

 */
 
 $labelModuleGroup = $this->getActiveModules();
 $labelModule = $labelModuleGroup[$module]['all']['nom'];
 
?>
<!-- doorGets:start:modules/sharedlinks/sharedlinks_similar_tags -->
<div class="container doorGets-sharedlinks-similar-contents doorGets-module-similar-[{!$module!}]">
    <h3>[{!$this->__('À voir aussi')!}]</h3>
    <div class="row">
        <div class="col-md-12">
            [{?(!empty($Contents)):}]
                [{/($Contents as $content):}]
                    <div class="row content-listing-sharedlinks">    
                        <div class="col-md-2 left-date-sharedlinks"><h3></h3>[{!$content['date']!}]</div>
                        <div class="col-md-10 ">
                            <h3>
                                <a href="[{!$this->getBaseUrl()!}]?[{!$module!}]=[{!$content['content_traduction']['uri']!}]">[{!$content['content_traduction']['titre']!}]</a>
                            </h3>
                            <div>
                                <a href="[{!$content['article']!}]" >[{!$content['article']!}]</a>
                            </div>
                        </div>
                    </div>
                [/]
            [?]
        </div>
    </div>
</div>
<!-- doorGets:end:modules/sharedlinks/sharedlinks_similar_tags -->