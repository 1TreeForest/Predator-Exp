<?php
// $Id: opponentspassword.php,v 1.6 2010/08/15 09:56:12 sandking Exp $

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

	session_start();

	if (!isset($_CHESSUTILS))
		require 'chessutils.php';

	/* check session status */
	require 'sessioncheck.php';

	/* connect to database */
	require 'connectdb.php';

	/* invalid password flag */
	$isInvalidPassword = false;

	/* check if submitting opponents login information */
	if (isset($_POST['opponentsID']))
	{
		$opponentsID = $_POST['opponentsID'];
		$opponentsNick = $_POST['opponentsNick'];

		/* get opponents password from DB */
		$tmpQuery = "SELECT password FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$opponentsID;
		$tmpPassword = mysqli_query($dbh, $tmpQuery);
		$dbPassword = mysqli_fetch_row($tmpPassword);
        $dbPassword = $dbPassword[0];
		/* check to see if supplied password matched that of the DB */
		if (password_verify($_POST['pwdPassword'], $dbPassword))
		{
			$_SESSION['isSharedPC'] = true;
			/* load game */
			require 'chess.php';
			exit();
		}
		/* else password is invalid */
		else
			/* set flag to true */
			$isInvalidPassword = true;

	}
	/* else user is arriving here for the first time */
	else
	{
		/* get the players associated with this game */
		$tmpQuery = "SELECT whitePlayer, blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_POST['gameID'];
		$tmpGameData = mysqli_query($dbh, $tmpQuery);
		$tmpPlayers = mysqli_fetch_array($tmpGameData, MYSQLI_ASSOC);

		/* determine which one is the opponent of the player logged in */
		if ($tmpPlayers['whitePlayer'] == $_SESSION['playerID'])
			$opponentsID = $tmpPlayers['blackPlayer'];
		else
			$opponentsID = $tmpPlayers['whitePlayer'];

		/* get the opponents information */
		$tmpQuery = "SELECT nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$opponentsID;
		$tmpNick = mysqli_query($dbh, $tmpQuery);
		$opponentsNick = mysqli_fetch_row($tmpNick);
        $opponentsNick = $opponentsNick[0];
	}

	mysqli_close($dbh);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="userlogin.css" type="text/css" />
<title><?php echo APP_NAME; ?> :: <?php echo gettext("Login");?></title>
<script language="javascript" type="text/javascript">
window.onload = function()
{
<?php
	if ($isInvalidPassword)
		echo "alert('Invalid password. Please try again');\n";
?>
	document.loginForm.opponentsNick.focus();
	document.loginForm.opponentsNick.select();
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
			<form name="loginForm" id="loginForm" method="post" action="opponentspassword.php">
				<div class="form-block">
                                        <div class="inputlabel"><?php echo gettext("Password");?></div>
					<div><input id="pwdPassword" name="pwdPassword" type="password" class="inputbox" size="15" /></div>
					<input name="opponentsNick" type="hidden" value="<?php echo($opponentsNick); ?>" />
					<input name="opponentsID" type="hidden" value="<?php echo($opponentsID); ?>" />
					<input name="gameID" value="<?php echo ($_POST['gameID']); ?>" type="hidden" />
					<div align="left">
						<input type="submit" name="login" class="button" value="<?php echo gettext("Login");?>" />
						<input name="Cancel" class="button" value="<?php echo gettext("Cancel");?>" type="button" onClick="window.open('mainmenu.php', '_self')" /></div>
				</div>
			</form>
		</div>
		<div class="login-text">
			<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                        <p><?php echo gettext("Enter password for $opponentsNick");?></p>
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
