<?php
	// $Id: index.php,v 1.10 2010/08/18 09:37:26 sandking Exp $

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

	// If the user is already logged in then go to main menu
	// Note that a logout sets the Session playerID to -1

    if (!file_exists('config.php')) {
        header('location:install.php');
        exit();
    }

    if (version_compare(PHP_VERSION, '7.0.0', '<')) {
        exit('PHP7-Webchess requires at least <b>PHP 7</b><br>
            Your version is PHP '.PHP_VERSION);
    }

	/* load settings */
	if (!isset($_CONFIG)) {
		require 'config.php';
        include_once 'lang.php';
	}

	session_start();
	if (isset($_SESSION['playerID']) && $_SESSION['playerID'] > 0) {
		header( "Location: {$CFG_MAINPAGE}/mainmenu.php", true, 303 /*redirect*/ ) ;
        exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" href="userlogin.css" type="text/css" />
<script type="text/javascript" src="javascript/cookies.js"></script>
<title><?php echo APP_NAME; ?> :: <?php echo gettext("Login");?></title>
<script language="javascript" type="text/javascript">
var visitordata = null;
var cookieDomain = null;
function storeLogin()
{
	if(document.loginForm.remember.checked)
	{
		visitordata.nick = document.loginForm.txtNick.value;
		visitordata.pwd = document.loginForm.pwdPassword.value;
		visitordata.store();
	}
}
window.onload = function()
{
	document.loginForm.onclick = function(){storeLogin();};

	cookieDomain = document.domain;
	var idx = cookieDomain.lastIndexOf('.');
	idx = cookieDomain.lastIndexOf('.', idx-1);
	if(idx == -1)
		cookieDomain = '.' + cookieDomain;
	else
		cookieDomain = cookieDomain.substr(idx);
	visitordata = new Cookie(document, "WebChess", 2400, '/', cookieDomain);
	if(visitordata.load())
	{
		if(visitordata.nick)
			document.loginForm.txtNick.value = visitordata.nick;
		if(visitordata.pwd)
			document.loginForm.pwdPassword.value = visitordata.pwd;
		document.loginForm.remember.checked = true;
	}
	document.loginForm.txtNick.focus();
	document.loginForm.txtNick.select();
}
</script>
</head>
<body>
<div id="header">
  <div id="heading"><?php echo APP_NAME; ?> :: <?php echo gettext("Login");?></div>
</div>

<div id="ctr" align="center">
	<div class="login">
		<div class="login-form">
			<form name="loginForm" id="loginForm" method="post" action="mainmenu.php">
				<div class="form-block">
                                        <div class="inputlabel"><?php echo gettext("Username");?></div>
					<div><input id="txtNick" name="txtNick" type="text" class="inputbox" size="15" /></div>
                                        <div class="inputlabel"><?php echo gettext("Password");?></div>
					<div><input id="pwdPassword" name="pwdPassword" type="password" class="inputbox" size="15" /></div>
					<div class="remember">
                                        <label for="remember" title="<?php echo gettext("Remember me");?>" class="inputlabel">
                                        <input id="remember" name="remember" type="checkbox" /><?php echo gettext("Remember me");?>
					</label>
					</div>
					<input name="ToDo" value="Login" type="hidden" />
					<div align="left">
						<input type="submit" name="login" class="button" value="<?php echo gettext("Login");?>" />
				<?php
				if($CFG_NEW_USERS_ALLOWED==true)
				{
				?>
                                <input name="newAccount" class="button" value="<?php echo gettext("New Account");?>" type="button" onClick="window.open('newuser.php', '_self')" />
				<?php
				}
				?>
					</div>
				</div>
			</form>
		</div>
		<div class="login-text">
			<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                        <p><?php echo gettext("Welcome to") . "<br>" . APP_NAME;?>!</p>
                        <p><?php echo gettext("Use a valid username and password to gain access.");?></p>
    	</div>
		<div class="clr"></div>
	</div>
</div>
<div id="break"></div>
<noscript>
!Warning! Javascript must be enabled for proper operation of <?php echo APP_NAME; ?>
</noscript>
<?php include_once('footer.php'); ?>
</body>
</html>
