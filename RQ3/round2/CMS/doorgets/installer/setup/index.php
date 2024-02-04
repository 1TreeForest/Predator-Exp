<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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
umask(0022);
session_start();
$ver = phpversion();
if (version_compare($ver, '5.3.0', '>=')) {

    define('BASE','./setup/');
    define('DOORGETS','http://www.doorgets.com/'); // Ne pas supprimer
    require_once BASE.'config/config.php';

    require_once ROUTER.'installerRouter.php';

} else {
    echo "Your version of PHP is too old (".$ver.") please upgrade to 5.4.0 or more";
}