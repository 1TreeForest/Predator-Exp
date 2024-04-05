<?php
	// $Id: mailmsgtest.php,v 1.5 2010/08/14 16:57:54 sandking Exp $

/*
    This file is part of WebChess. http://webchess.sourceforge.net
	Copyright 2010 Jonathan Evraire, Rodrigo Flores

    WebChess is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    WebChess is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WebChess.  If not, see <http://www.gnu.org/licenses/>.
*/

	$mailsubject = APP_NAME . ': Test Message';
	$mailmsg = "Congratulations!!!\n
	If you can see this message, you have successfully setup your email notification!\n\n
	This message has been automatically been sent by WebChess and should not be replied to.\n";
	$mailmsg .= sprintf(gettext('Go to: %s to play.'), $CFG_MAINPAGE) . "\n";