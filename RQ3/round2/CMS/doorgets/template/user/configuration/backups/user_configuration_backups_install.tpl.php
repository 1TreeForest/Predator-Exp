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
<legend>
        [{!$translate->l("Installer une sauvegarde")!}]
</legend>
<div>
    [{!$form->open('post')!}]
    [{!$form->input('','install','hidden','1')!}]
    [{!$this->getFileName()!}]
    <div class="separateur-tb"></div>
    <div class="action-bottom-inworks text-center" style="display: none;">
        <img src="[{!BASE_IMG.'loader.gif'!}]" class="icon-image" style="width:25px;height: 25px;vertical-align: middle;">
        [{!$translate->l("Installation en cours")!}]...[{!$translate->l("Veuillez patienter")!}]...
    </div>
    <div class="action-bottom-form text-center">
        [{!$form->submit($translate->l("Installer maintenant"))!}]
        
    </div>
    [{!$form->close()!}]
</div>
<script type="text/javascript">
  $("#backups_install_submit").click(function() {
      $(".action-bottom-inworks").fadeIn();
      $(".action-bottom-form").fadeOut();
      $(".doorGets-comebackform").fadeOut();
  });
</script>