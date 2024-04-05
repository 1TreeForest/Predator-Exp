<?php
// $Id: mainmenu.php,v 1.21 2013/12/07 20:00:00 gitjake Exp $

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

    #Debug:
    ini_set('display_errors', "1");
    error_reporting(32767);

    if (version_compare(PHP_VERSION, '7.0.0', '<')) {
        exit('PHP7-Webchess requires at least <b>PHP 7</b><br>
            Your version is PHP '.PHP_VERSION);
    }

	/* load settings */
	if (!isset($_CONFIG)) {
		require 'config.php';
        include_once 'lang.php';
	}

	/* load external functions for setting up new game */
	require 'chessutils.php';
	require 'chessconstants.php';
	require 'newgame.php';
	require 'chessdb.php';

	/* if this page is accessed directly (ie: without going through login), */
	/* player is logged off by default */
	if (!isset($_SESSION['playerID']))
		$_SESSION['playerID'] = -1;

	/* connect to database */
	require 'connectdb.php';

	/* cleanup dead games */
	/* determine threshold for oldest game permitted */
	$targetDate = date("Y-m-d", mktime(0,0,0, date('m'), date('d') - $CFG_EXPIREGAME, date('Y')));

	/* find out which games are older */
	$tmpQuery = "SELECT gameID FROM " . $CFG_TABLE[games] . " WHERE lastMove < '".$targetDate."'";
	$tmpOldGames = mysqli_query($dbh, $tmpQuery);
    if (!$tmpOldGames) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
            
	/* for each older game... */
	while($tmpOldGame = mysqli_fetch_array($tmpOldGames, MYSQLI_ASSOC))
	{
		/* ... clear the history... */
		mysqli_query($dbh, "DELETE FROM " . $CFG_TABLE[history] . " WHERE gameID = ".$tmpOldGame['gameID']);

		/* ... and the board... */
		mysqli_query($dbh, "DELETE FROM " . $CFG_TABLE[pieces] . " WHERE gameID = ".$tmpOldGame['gameID']);

		/* ... and the messages... */
		mysqli_query($dbh, "DELETE FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$tmpOldGame['gameID']);

		/* ... and finally the game itself from the database */
		mysqli_query($dbh, "DELETE FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$tmpOldGame['gameID']);
	}

	$tmpNewUser = false;
	$errMsg = "";
	$postTodo = '';
	if (isset($_POST['ToDo'])) {
		$postTodo = $_POST['ToDo'];
	}
	switch($postTodo) 
	{
		case 'NewUser':
			/* create new player */
			$tmpNewUser = true;

			/* sanity check: empty nick */
			if ($_POST['txtNick'] == "")
				die("ERROR: must supply a valid nick!");

			/* check for existing user with same nick */
			$tmpQuery = "SELECT playerID FROM " . $CFG_TABLE[players] . " WHERE nick = '".$_POST['txtNick']."'";
			$existingUsers = mysqli_query($dbh, $tmpQuery);
            if (!$existingUsers) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
			if (mysqli_num_rows($existingUsers) > 0)
			{
				require 'newuser.php';
				die();
			}

			$tmpQuery = "INSERT INTO " . $CFG_TABLE[players] . " (password, firstName, lastName, nick) VALUES ('".password_hash($_POST['pwdPassword'], PASSWORD_BCRYPT)."', '".$_POST['txtFirstName']."', '".$_POST['txtLastName']."', '".$_POST['txtNick']."')";
			$res = mysqli_query($dbh, $tmpQuery);
            if (!$res) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";

			/* get ID of new player */
			$_SESSION['playerID'] = mysqli_insert_id($dbh);

			/* set History format preference */
			$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'history', '".isset($_POST['rdoHistory'])?$_POST['rdoHistory']:''."')";
			mysqli_query($dbh, $tmpQuery);

			/* set History layout preference */
			$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'historylayout', '".isset($_POST['rdoHistorylayout'])?$_POST['rdoHistorylayout']:''."')";
			mysqli_query($dbh, $tmpQuery);

			/* set Theme preference */
			$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'theme', '".isset($_POST['rdoTheme'])?$_POST['rdoTheme']:''."')";
			mysqli_query($dbh, $tmpQuery);

            /* set Theme preference */
			//$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'replayall', '".isset($_POST['replayAll']) ? $_POST['replayAll'] : '' ."')";
			//mysqli_query($dbh, $tmpQuery);
            
			/* set auto-reload preference */
			if (is_numeric($_POST['txtReload']))
			{
				if (intval($_POST['txtReload']) >= $CFG_MINAUTORELOAD)
					$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'autoreload', ".$_POST['txtReload'].")";
				else
					$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'autoreload', ".$CFG_MINAUTORELOAD.")";

				mysqli_query($dbh, $tmpQuery);
			}

			/* set email notification preference */
			if ($CFG_USEEMAILNOTIFICATION)
			{
				$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", 'emailnotification', '".$_POST['txtEmailNotification']."')";
				mysqli_query($dbh, $tmpQuery);
			}

			/* no break, login user */

		case 'Login':
			/* check for a player with supplied nick and password */
			$tmpQuery = "SELECT * FROM " . $CFG_TABLE[players] . " WHERE nick = '".$_POST['txtNick']."'";
			$tmpPlayers = mysqli_query($dbh, $tmpQuery);
            if (!$tmpPlayers) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
			$tmpPlayer = mysqli_fetch_array($tmpPlayers, MYSQLI_ASSOC);
            if ($tmpPlayer && password_verify($_POST['pwdPassword'], $tmpPlayer['password'])) {
                /* if such a player exists, log him in... otherwise die */
                $_SESSION['playerID'] = $tmpPlayer['playerID'];
                $_SESSION['lastInputTime'] = time();
                $_SESSION['playerName'] = $tmpPlayer['firstName']." ".$tmpPlayer['lastName'];
                $_SESSION['firstName'] = $tmpPlayer['firstName'];
                $_SESSION['lastName'] = $tmpPlayer['lastName'];
                $_SESSION['nick'] = $tmpPlayer['nick'];
            
                if (isset($tmpPlayer['userlevel']) && $tmpPlayer['userlevel'] == "(Novice)")$_SESSION['userLevel'] =  '1';
                if (isset($tmpPlayer['userlevel']) && $tmpPlayer['userlevel'] == "(Occasional)")$_SESSION['userLevel'] =  '2';
                if (isset($tmpPlayer['userlevel']) && $tmpPlayer['userlevel'] == "(Hobbyist)")$_SESSION['userLevel'] =  '3';
                if (isset($tmpPlayer['userlevel']) && $tmpPlayer['userlevel'] == "(Expert)")$_SESSION['userLevel'] =  '4';
                if (isset($tmpPlayer['userlevel']) && $tmpPlayer['userlevel'] == "(Master)")$_SESSION['userLevel'] =  '5';
			} else {
				echo "<script>alert('Invalid Nick or Password. Please try again'); window.location.replace('index.php');</script>\n";
				exit();
			}

			/* load user preferences */
			$tmpQuery = "SELECT * FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$_SESSION['playerID'];
			$tmpPreferences = mysqli_query($dbh, $tmpQuery);
            if (!$tmpPreferences) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
            
			$isPreferenceFound['history'] = false;
			$isPreferenceFound['historylayout'] = false;
			$isPreferenceFound['theme'] = false;
			$isPreferenceFound['autoreload'] = false;
			$isPreferenceFound['emailnotification'] = false;
			$isPreferenceFound['replayall'] = false;

			while($tmpPreference = mysqli_fetch_array($tmpPreferences, MYSQLI_ASSOC))
			{
				switch($tmpPreference['preference'])
				{
					case 'history':
					case 'historylayout':
					case 'theme':
					case 'replayall':
						/* setup SESSION var of name pref_PREF, like pref_history */
						$_SESSION['pref_'.$tmpPreference['preference']] = $tmpPreference['value'];
						break;

					case 'emailnotification':
						if ($CFG_USEEMAILNOTIFICATION)
							$_SESSION['pref_emailnotification'] = $tmpPreference['value'];
						break;

					case 'autoreload':
						if (is_numeric($tmpPreference['value']))
						{
							if (intval($tmpPreference['value']) >= $CFG_MINAUTORELOAD)
								$_SESSION['pref_autoreload'] = intval($tmpPreference['value']);
							else
								$_SESSION['pref_autoreload'] = $CFG_MINAUTORELOAD;
						}
						else
							$_SESSION['pref_autoreload'] = $CFG_MINAUTORELOAD;
						break;
				}

				$isPreferenceFound[$tmpPreference['preference']] = true;
			}

			/* look for missing preference and fix */
			foreach (array_keys($isPreferenceFound, false) as $missingPref)
			{
				$defaultValue = "";
				switch($missingPref)
				{
					case 'history':
						$defaultValue = "pgn";
						break;
					case 'historylayout':
						$defaultValue = "columns";
						break;
					case 'theme':
						$defaultValue = "gnuchess_simple";
						break;
					case 'replayall':
						$defaultValue = "false";
						break;
					case 'autoreload':
						$defaultValue = $CFG_MINAUTORELOAD;
						break;
					case 'emailnotification':
						$defaultValue = "";
						break;
				}
				$tmpQuery = "INSERT INTO " . $CFG_TABLE[preferences] . " (playerID, preference, value) VALUES (".$_SESSION['playerID'].", '".$missingPref."', '".$defaultValue."')";
				$res = mysqli_query($dbh, $tmpQuery);
                if (!$res) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";

				/* setup SESSION var of name pref_PREF, like pref_history */
				if ($CFG_USEEMAILNOTIFICATION || ($missingPref != 'emailnotification'))
					$_SESSION['pref_'.$missingPref] =  $defaultValue;
			}

			break;

		case 'Logout':
			$_SESSION['playerID'] = -1;
			header('Location: index.php');
			exit();

		case 'InvitePlayer':
			/* prevent multiple pending requests between two players with the same originator */
			$tmpQuery = "SELECT gameID FROM " . $CFG_TABLE[games] . " WHERE gameMessage = 'playerInvited'";
			$tmpQuery .= " AND ((messageFrom = 'white' AND whitePlayer = ".$_SESSION['playerID']." AND blackPlayer = ".$_POST['opponent'].")";
			$tmpQuery .= " OR (messageFrom = 'black' AND whitePlayer = ".$_POST['opponent']." AND blackPlayer = ".$_SESSION['playerID']."))";
			$tmpExistingRequests = mysqli_query($dbh, $tmpQuery);

			if (mysqli_num_rows($tmpExistingRequests) == 0)
			{
				if ($_POST['color'] == 'random')
					$tmpColor = (mt_rand(0,1) == 1) ? "white" : "black";
				else
					$tmpColor = $_POST['color'];

				$tmpQuery = "INSERT INTO " . $CFG_TABLE[games] . " (whitePlayer, blackPlayer, gameMessage, messageFrom, dateCreated, lastMove) VALUES (";
				if ($tmpColor == 'white')
					$tmpQuery .= $_SESSION['playerID'].", ".$_POST['opponent'];
				else
					$tmpQuery .= $_POST['opponent'].", ".$_SESSION['playerID'];

				$tmpQuery .= ", 'playerInvited', '".$tmpColor."', NOW(), NOW())";
				mysqli_query($dbh, $tmpQuery);

				/* if email notification is activated... */
				if ($CFG_USEEMAILNOTIFICATION)
				{
					/* if opponent is using email notification... */
					$tmpOpponentEmail = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$_POST['opponent']." AND preference = 'emailNotification'");
					if (mysqli_num_rows($tmpOpponentEmail) > 0)
					{
						$opponentEmail = mysqli_fetch_row($tmpOpponentEmail);
                        $opponentEmail = $opponentEmail[0];
						if ($opponentEmail != '')
						{
							/* notify opponent of invitation via email */
							webchessMail('invitation', $opponentEmail, '', $_SESSION['nick'],'');
						}
					}
				}
			}
			break;

		case 'ResponseToInvite':
			if ($_POST['response'] == 'accepted')
			{
				/* update game data */
				$tmpQuery = "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = '', messageFrom = '' WHERE gameID = ".$_POST['gameID'];
				mysqli_query($dbh, $tmpQuery);

				/* setup new board */
				$_SESSION['gameID'] = $_POST['gameID'];
				createNewGame($dbh, $_POST['gameID']);
				saveGame();
			}
			else
			{

				$tmpQuery = "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = 'inviteDeclined', messageFrom = '".$_POST['messageFrom']."' WHERE gameID = ".$_POST['gameID'];
				mysqli_query($dbh, $tmpQuery);
			}

			break;

		case 'WithdrawRequest':

			/* get opponent's player ID */
			$tmpOpponentID = mysqli_query($dbh, "SELECT whitePlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_POST['gameID']);
			if (mysqli_num_rows($tmpOpponentID) > 0)
			{
				$opponentID = mysqli_fetch_row($tmpOpponentID);
                $opponentID = $opponentID[0];
				if ($opponentID == $_SESSION['playerID'])
				{
					$tmpOpponentID = mysqli_query($dbh, "SELECT blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_POST['gameID']);
					$opponentID = mysqli_fetch_row($tmpOpponentID);
                    $opponentID = $opponentID[0];
				}

				$tmpQuery = "DELETE FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_POST['gameID'];
				mysqli_query($dbh, $tmpQuery);

				/* if email notification is activated... */
				if ($CFG_USEEMAILNOTIFICATION)
				{
					/* if opponent is using email notification... */
					$tmpOpponentEmail = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'emailNotification'");
					if (mysqli_num_rows($tmpOpponentEmail) > 0)
					{
						$opponentEmail = mysqli_fetch_row($tmpOpponentEmail);
                        $opponentEmail = $opponentEmail[0];
						if ($opponentEmail != '')
						{
							/* notify opponent of invitation via email */
							webchessMail('withdrawal', $opponentEmail, '', $_SESSION['nick'], $_POST['gameID']);
						}
					}
				}
			}
			break;

		case 'UpdatePersonalInfo':
			$tmpQuery = "SELECT password FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$_SESSION['playerID'];
			$tmpPassword = mysqli_query($dbh, $tmpQuery);
			$dbPassword = mysqli_fetch_row($tmpPassword);
            $dbPassword = $dbPassword[0];
			if (!password_verify($_POST['pwdOldPassword'],  $dbPassword))
				$errMsg = "Sorry, incorrect old password!";
			else
			{
				$tmpDoUpdate = true;

				if ($CFG_NICKCHANGEALLOWED)
				{
					$tmpQuery = "SELECT playerID FROM " . $CFG_TABLE[players] . " WHERE nick = '".$_POST['txtNick']."' AND playerID <> ".$_SESSION['playerID'];
					$existingUsers = mysqli_query($dbh, $tmpQuery);

					if (mysqli_num_rows($existingUsers) > 0)
					{
						$errMsg = "Sorry, that nick is already in use.";
						$tmpDoUpdate = false;
					}
				}

				if ($tmpDoUpdate)
				{
					/* update DB */
					$tmpQuery = "UPDATE " . $CFG_TABLE[players] . " SET firstName = '".$_POST['txtFirstName']."', lastName = '".$_POST['txtLastName']."', password = '".password_hash($_POST['pwdPassword'], PASSWORD_BCRYPT)."'";

					if ($CFG_NICKCHANGEALLOWED && $_POST['txtNick'] != "")
						$tmpQuery .= ", nick = '".$_POST['txtNick']."'";

					$tmpQuery .= " WHERE playerID = ".$_SESSION['playerID'];
					mysqli_query($dbh, $tmpQuery);

					/* update current session */
					$_SESSION['playerName'] = $_POST['txtFirstName']." ".$_POST['txtLastName'];
					$_SESSION['firstName'] = $_POST['txtFirstName'];
					$_SESSION['lastName'] = $_POST['txtLastName'];

					if ($CFG_NICKCHANGEALLOWED && $_POST['txtNick'] != "")
						$_SESSION['nick'] = $_POST['txtNick'];
				}
			}

			break;

		case 'UpdatePrefs':
        
			/* Theme */
			$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = '".$_POST['rdoTheme']."' WHERE playerID = ".$_SESSION['playerID']." AND preference = 'theme'";
			mysqli_query($dbh, $tmpQuery);

			/* History format */
			$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = '".$_POST['rdoHistory']."' WHERE playerID = ".$_SESSION['playerID']." AND preference = 'history'";
			mysqli_query($dbh, $tmpQuery);

			/* History layout */
			$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = '".$_POST['rdoHistorylayout']."' WHERE playerID = ".$_SESSION['playerID']." AND preference = 'historylayout'";
			mysqli_query($dbh, $tmpQuery);

			/* Auto-Reload */
			if (is_numeric($_POST['txtReload']))
			{
				if (intval($_POST['txtReload']) >= $CFG_MINAUTORELOAD)
					$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = ".$_POST['txtReload']." WHERE playerID = ".$_SESSION['playerID']." AND preference = 'autoreload'";
				else
					$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = ".$CFG_MINAUTORELOAD." WHERE playerID = ".$_SESSION['playerID']." AND preference = 'autoreload'";

				mysqli_query($dbh, $tmpQuery);
			}

			/* Email Notification */
			if ($CFG_USEEMAILNOTIFICATION)
			{
				$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = '".$_POST['txtEmailNotification']."' WHERE playerID = ".$_SESSION['playerID']." AND preference = 'emailnotification'";
				mysqli_query($dbh, $tmpQuery);
			}

            /* User level */
			if (is_numeric($_POST['userLevel']))
			{
                $userleveltxt = "";
                if ($_POST['userLevel'] == '1')$userleveltxt =  "(Novice)";
                if ($_POST['userLevel'] == '2')$userleveltxt =  "(Occasional)";
                if ($_POST['userLevel'] == '3')$userleveltxt =  "(Hobbyist)";
                if ($_POST['userLevel'] == '4')$userleveltxt =  "(Expert)";
                if ($_POST['userLevel'] == '5')$userleveltxt =  "(Master)";
          
                $tmpQuery = "UPDATE " . $CFG_TABLE[players] . " SET userlevel = '".$_POST['userLevel']."' WHERE playerID = ".$_SESSION['playerID'];
                mysqli_query($dbh, $tmpQuery);
            }
            
            /* Replay all */
			$tmpQuery = "UPDATE " . $CFG_TABLE[preferences] . " SET value = '".$_POST['replayAll']."' WHERE playerID = ".$_SESSION['playerID']." AND preference = 'replayall'";
			mysqli_query($dbh, $tmpQuery);

			/* update current session */
			$_SESSION['pref_history'] = $_POST['rdoHistory'];
			$_SESSION['pref_historylayout'] = $_POST['rdoHistorylayout'];
			$_SESSION['pref_theme'] =  $_POST['rdoTheme'];
            $_SESSION['pref_replayall']=$_POST['replayAll'];
            $_SESSION['userLevel']=$_POST['userLevel'];

			if (is_numeric($_POST['txtReload']))
			{
				if (intval($_POST['txtReload']) >= $CFG_MINAUTORELOAD)
				{
					$_SESSION['pref_autoreload'] = intval($_POST['txtReload']);
				}
				else
					$_SESSION['pref_autoreload'] = $CFG_MINAUTORELOAD;
			} else
				$_SESSION['pref_autoreload'] = $CFG_MINAUTORELOAD;

			if ($CFG_USEEMAILNOTIFICATION)
				$_SESSION['pref_emailnotification'] = $_POST['txtEmailNotification'];
			break;

		case 'TestEmail':
			if ($CFG_USEEMAILNOTIFICATION)
				webchessMail('test', $_SESSION['pref_emailnotification'], '', '', '');
			break;
                case 'HideMessage':
                        $tmpQuery = "UPDATE " . $CFG_TABLE[communication] . " SET ack = 1 WHERE commID = " . $_POST['messageID'];
                        mysqli_query($dbh, $tmpQuery);
                        break;

	}

	/* check session status */
	require 'sessioncheck.php';

	/* set default playing mode to different PCs (as opposed to both players sharing a PC) */
	$_SESSION['isSharedPC'] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="mainmenu.css" type="text/css" />
<script type="text/javascript" src="javascript/tablesort.js"></script>
<script type="text/javascript" src="javascript/menu.js"></script>
<script type="text/javascript" src="javascript/messages.js"></script>
<title><?php echo APP_NAME . " :: " . gettext("Main Menu");?></title>
	<script type="text/javascript">
		function validatePersonalInfo()
		{
			if (document.PersonalInfo.txtFirstName.value == ""
				|| document.PersonalInfo.txtLastName.value == ""
			<?php
				/* ToDo: figure out how to check for whitespace only nicks */
				if ($CFG_NICKCHANGEALLOWED)
					echo ('|| document.PersonalInfo.txtNick.value == ""');
			?>
				|| document.PersonalInfo.pwdOldPassword.value == ""
				|| document.PersonalInfo.pwdPassword.value == "")
			{
				alert("Sorry, all personal info fields are required and must be filled out.");
				return;
			}

			if (document.PersonalInfo.pwdPassword.value == document.PersonalInfo.pwdPassword2.value)
				document.PersonalInfo.submit();
			else
				alert("Sorry, the two password fields don't match.  Please try again.");
		}

		function sendResponse(responseType, messageFrom, gameID)
		{
			document.responseToInvite.response.value = responseType;
			document.responseToInvite.messageFrom.value = messageFrom;
			document.responseToInvite.gameID.value = gameID;
			document.responseToInvite.submit();
		}

		function loadGame(gameID)
		{
			if (document.existingGames.rdoShare[0].checked)
				document.existingGames.action = "opponentspassword.php";

			document.existingGames.gameID.value = gameID;
			document.existingGames.submit();
		}

		function withdrawRequest(gameID)
		{
			document.withdrawRequestForm.gameID.value = gameID;
			document.withdrawRequestForm.submit();
		}

		function viewMessage(gameID)
		{
			document.messageViewForm.messageID.value = gameID;
			document.messageViewForm.submit();
		}

		function loadEndedGame(gameID)
		{
			document.endedGames.gameID.value = gameID;
			document.endedGames.submit();
		}
<?php if ($CFG_USEEMAILNOTIFICATION) { ?>
		function testEmail()
		{
			document.userdata.ToDo.value = "TestEmail";
			document.userdata.submit();
		}
<?php } ?>
	function challenge() {
		window.location = 'inviteplayer.php';
	}

	function reload() {
		window.location.replace(window.location.href);
	}

	function logout() {
		document.logOutForm.submit();
	}

	</script>
</head>
<body>
	<div id="header">
	  <div id="heading"><?php echo APP_NAME; ?></div>
	</div>
<div id="content">
<div id="navcontainer">
<ul id="navlist">
<li><a href="#continuegame"><?php echo gettext("Active games"); ?></a></li>
<li><a href="#invitations"><?php echo gettext("Pending challenges"); ?></a></li>
<li><a href="#messages"><?php echo gettext("Messages"); ?></a></li>
<li><a href="#challenge"><?php echo gettext("Challenge others"); ?></a></li>
<li><a href="#viewgame"><?php echo gettext("Replay"); ?></a></li>
<li><a href="#preferences"><?php echo gettext("Preferences"); ?></a></li>
<li><a href="#personalinfo"><?php echo gettext("Personal"); ?></a></li>
<li><a href="#reload"><?php echo gettext("Reload"); ?></a></li>
<li><a href="#logout"><?php echo gettext("Logout"); ?></a></li>
</ul>

<form name="logOutForm" action="mainmenu.php" method="post">
<input type="hidden" name="response" value="" />
<input type='hidden' name='ToDo' value='Logout'/>
</form>
</div>
<div id="rightcolumn">
<div id="personalinfo">
<?php
	if ($errMsg != "")
		echo('<p><h2><font color="red">'.$errMsg."</font></h2><p>\n");
?>
	<div id="ctr" align="center">
		<div class="preferences">
			<div class="preferences-form">
				<form name="PersonalInfo" action="mainmenu.php" method="post">
				<div class="form-block">
                                <h1><?php echo gettext("Personal information");?></h1>
                                                <div class="inputlabel"><?php echo gettext("First Name"); ?></div>
						<div><input name="txtFirstName" type="text" class="inputbox" value="<?php echo htmlspecialchars($_SESSION['firstName']); ?>" /></div>
                                                <div class="inputlabel"><?php echo gettext("Last Name"); ?></div>
						<div><input name="txtLastName" type="text" class="inputbox" value="<?php echo htmlspecialchars($_SESSION['lastName']); ?>" /></div>
						<?php if ($CFG_NICKCHANGEALLOWED) { ?>
							<div class="inputlabel">Nick</div>
							<div>
								<input name="txtNick" type="text" class="inputbox" value="<?php echo htmlspecialchars($_SESSION['nick']); ?>" />
							</div>
						<?php } ?>
                                                <div class="inputlabel"><?php echo gettext("Current Password"); ?></div>
						<div><input name="pwdOldPassword" type="password" class="inputbox" /></div>
                                                <div class="inputlabel"><?php echo gettext("New Password"); ?></div>
						<div><input name="pwdPassword" type="password" class="inputbox" /></div>
                                                <div class="inputlabel"><?php echo gettext("Password Confirmation"); ?></div>
						<div><input name="pwdPassword2" type="password" class="inputbox" /></div>
                                                <input type="button" value="<?php echo gettext("Update");?>" class="button" onclick="validatePersonalInfo()" />
						<input type="hidden" name="ToDo" value="UpdatePersonalInfo" />
				</div>
				</form>
			</div>
			<div class="login-text">
				<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                                <p><?php echo gettext("Here you can change your personal information. Remember to press the 'Update' button to store the changes.");?></p>
				<p></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>

<div id="preferences">
<div align="center">
	<div class="preferences">
		<div class="preferences-form">
			<form name="userdata" method="post" action="mainmenu.php">
				<div class="form-block">
                                        <h1><?php echo gettext("Preferences");?></h1>
                                        <div class="inputlabel"><?php echo gettext("History");?></div>
					<div class="inputbox">
					<?php
						if ($_SESSION['pref_history'] == 'pgn')
						{
					?>
                                                <div><input name="rdoHistory" type="radio" value="pgn" checked="checked" /> <?php echo gettext("PGN");?></div>
                                                <div><input name="rdoHistory" type="radio" value="verbous" /> <?php echo gettext("Verbose");?></div>
					<?php
						}
						else
						{
					?>
                                                <div><input name="rdoHistory" type="radio" value="pgn" /> <?php echo gettext("PGN");?></div>
                                                <div><input name="rdoHistory" type="radio" value="verbous" checked="checked" /> <?php echo gettext("Verbose");?></div>
					<?php	}
					?>
					</div>
                                        <div class="inputlabel"><?php echo gettext("History Layout");?></div>
					<div class="inputbox">
					<?php
						if ($_SESSION['pref_historylayout'] == 'columns')
						{
					?>
                                                <div><input name="rdoHistorylayout" type="radio" value="columns" checked="checked" /> <?php echo gettext("Columns (Scoresheet)");?></div>
                                                <div><input name="rdoHistorylayout" type="radio" value="paragraph" /> <?php echo gettext("Paragraph");?></div>
					<?php
						}
						else
						{
					?>
                                                <div><input name="rdoHistorylayout" type="radio" value="columns" /> <?php echo gettext("Columns (Scoresheet)");?></div>
                                                <div><input name="rdoHistorylayout" type="radio" value="paragraph" checked="checked" /><?php echo gettext(" Paragraph");?></div>
					<?php	}
					?>
					</div>
					<div class="inputlabel">Theme</div>
					<div class="inputbox"><select name="rdoTheme">
					<?php
						if ($_SESSION['pref_theme'] == 'master')
						{
					?>
							<option value="beholder"><?php echo gettext("Beholder");?></option>
							<option value="gnuchess_fancy"><?php echo gettext("GNU Chess Fancy");?></option>
							<option value="gnuchess_simple"><?php echo gettext("GNU Chess Simple");?></option>
							<option value="master" selected="selected"><?php echo gettext("Master");?></option>
					<?php
						}
						elseif ($_SESSION['pref_theme'] == 'beholder')
						{
					?>
							<option value="beholder" selected="selected"><?php echo gettext("Beholder");?></option>
							<option value="gnuchess_fancy"><?php echo gettext("GNU Chess Fancy");?></option>
							<option value="gnuchess_simple"><?php echo gettext("GNU Chess Simple");?></option>
							<option value="master"><?php echo gettext("Master");?></option>
					<?php
						}
						elseif ($_SESSION['pref_theme'] == 'gnuchess_fancy')
						{
					?>
							<option value="beholder"><?php echo gettext("Beholder");?></option>
							<option value="gnuchess_fancy" selected="selected"><?php echo gettext("GNU Chess Fancy");?></option>
							<option value="gnuchess_simple"><?php echo gettext("GNU Chess Simple");?></option>
							<option value="master"><?php echo gettext("Master");?></option>
					<?php
						}
						else
						{
					?>
							<option value="beholder"><?php echo gettext("Beholder");?></option>
							<option value="gnuchess_fancy"><?php echo gettext("GNU Chess Fancy");?></option>
							<option value="gnuchess_simple" selected="selected"><?php echo gettext("GNU Chess Simple");?></option>
							<option value="master"><?php echo gettext("Master");?></option>
					<?php	}
					?>
					</select></div>
					<div class="inputlabel">
					<table>
					<tr><td>Beholder</td><td><img src="images/beholder/white_king.png" alt="King" /></td><td><img src="images/beholder/white_knight.png" alt="Knight" /></td><td><img src="images/beholder/white_pawn.png" alt="Pawn" /></td></tr>
					<tr><td>GNU Chess Fancy</td><td><img src="images/gnuchess_fancy/white_king.png" alt="King" /></td><td><img src="images/gnuchess_fancy/white_knight.png" alt="Knight" /></td><td><img src="images/gnuchess_fancy/white_pawn.png" alt="Pawn" /></td></tr>
					<tr><td>GNU Chess Simple</td><td><img src="images/gnuchess_simple/white_king.png" alt="King" /></td><td><img src="images/gnuchess_simple/white_knight.png" alt="Knight" /></td><td><img src="images/gnuchess_simple/white_pawn.png" alt="Pawn" /></td></tr>
					<tr><td>Master</td><td><img src="images/master/white_king.png" alt="King" /></td><td><img src="images/master/white_knight.png" alt="Knight" /></td><td><img src="images/master/white_pawn.png" alt="Pawn" /></td></tr>
					</table>
					</div>
					<br/>
                                        <div class="inputlabel"><?php echo gettext("Auto-reload") . " (" . gettext("min: ") . ($CFG_MINAUTORELOAD) . " " . gettext("secs") . ")";?></div>
					<div><input type="text" class="inputbox" name="txtReload" value="<?php echo htmlspecialchars($_SESSION['pref_autoreload']); ?>" /></div>
					<?php if ($CFG_USEEMAILNOTIFICATION) { ?>
                                                <div class="inputlabel"><?php echo gettext("Email notification");?></div>
						<div><input type="text" class="inputbox" name="txtEmailNotification" value="<?php echo htmlspecialchars($_SESSION['pref_emailnotification']); ?>" /></div>
                                                <div class="instruction"><?php echo gettext("Enter a valid email address if you would like to be notified when your opponent makes a move. Leave blank otherwise.");?></div>
						<?php if ($_SESSION['pref_emailnotification'] != "") { ?>
                                                        <input type="button" class="button" name="btnTestEmailNotification" value="<?php echo gettext("Test Email");?>" onclick="testEmail()" />
						<?php } ?>
					<?php } ?>
                    
                    <div class="inputlabel">Replay</div>
					<div class="inputbox"><select name="replayAll">
					<?php
						if (isset($_SESSION['pref_replayall']) && $_SESSION['pref_replayall'] == 'true')
						{
					?>
							<option value="false"><?php echo gettext("Show just my games");?></option>
							<option value="true" selected="selected"><?php echo gettext("Show also games by others");?></option>
					<?php
						}
						else
						{
					?>
							<option value="false" selected="selected"><?php echo gettext("Show just my games");?></option>
							<option value="true"><?php echo gettext("Show also games by others");?></option>
					<?php	}
					?>
					</select>
                    </div>

                    <div class="inputlabel">User level</div>
                    Just informative user level for opponents. ELO-rankings are suggestive.
					<div class="inputbox"><select name="userLevel">
					<?php
						if (!isset($_SESSION['userLevel']) || $_SESSION['userLevel'] == '0')
						{	?>
							<option value="0" selected="selected"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        } 
                        else if ($_SESSION['userLevel'] == '1')
						{	?>
							<option value="0"><?php echo gettext("(Unknown)");?></option>
							<option value="1" selected="selected"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        } 
                        else if ($_SESSION['userLevel'] == '2')
						{	?>
							<option value="0"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2" selected="selected"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        } 
                        else if ($_SESSION['userLevel'] == '3')
						{	?>
							<option value="0"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3" selected="selected"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        } 
                        else if ($_SESSION['userLevel'] == '4')
						{	?>
							<option value="0" selected="selected"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4" selected="selected"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        } 
                        else if ($_SESSION['userLevel'] == '5')
						{	?>
							<option value="0"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5" selected="selected"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        }
                        else 
						{	?>
							<option value="0" selected="selected"><?php echo gettext("(Unknown)");?></option>
							<option value="1"><?php echo gettext("Novice (...-1200)");?></option>
							<option value="2"><?php echo gettext("Occasional (1200-1800)");?></option>
							<option value="3"><?php echo gettext("Hobbyist (1800-2000)");?></option>
							<option value="4"><?php echo gettext("Expert (2000-2200)");?></option>
							<option value="5"><?php echo gettext("Master (2200-...)");?></option>
                            <?php	
                        }

					?>
					</select>
                    </div>
                    
                                        <input type="submit" class="button" value="<?php echo gettext("Update");?>" />
					<input type="hidden" class="button" name="ToDo" value="UpdatePrefs" />
				</div>
			</form>
		</div>
		<div class="login-text">
			<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                        <p><?php echo gettext("You can customize WebChess with these general settings.");?></p>
    	</div>
		<div class="clr"></div>
	</div>
</div>
</div>

<div id="challenge">
	<div class="ctr" align="center">
		<div class="preferences">
			<div class="preferences-form">
				<form name="newchallenge" action="mainmenu.php" method="post">
				<div class="form-block">
                                <h1><?php echo gettext("Issue a challenge");?></h1>
                                                <div class="inputlabel"><?php echo gettext("Select Opponent");?></div>
						<select name="opponent">
						<?php
							$tmpQuery="SELECT playerID, nick, userlevel FROM " . $CFG_TABLE[players] . " WHERE playerID != ".$_SESSION['playerID'];
							$tmpPlayers = mysqli_query($dbh, $tmpQuery);
                            if (!$tmpPlayers) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
							$first = true;
							while($tmpPlayer = mysqli_fetch_array($tmpPlayers, MYSQLI_ASSOC))
							{
								echo ('<option ');
								if($first)
								{
									echo('selected="selected" ');
									$first = false;
								}
								echo ('value="'.htmlspecialchars($tmpPlayer['playerID']).'"> '.htmlspecialchars($tmpPlayer['nick']).' '.htmlspecialchars($tmpPlayer['userlevel']).'</option>\n"');
							}
						?>
						</select>
                                                <div class="inputlabel" style="padding-top:10px;"><?php echo gettext("Your Color");?></div>
						<div class="inputbox">
                                                        <div><input name="color" type="radio" value="random" checked="checked" /> <?php echo gettext("Random");?></div>
                                                        <div><input name="color" type="radio" value="white" /> <?php echo gettext("White");?></div>
                                                        <div><input name="color" type="radio" value="black" /> <?php echo gettext("Black");?></div>
						</div>
                                                <input type="submit" value="<?php echo gettext("Invite");?>" class="button" />
                                                <input type="button" value="<?php echo gettext("Cancel");?>" class="button" onclick="window.open('mainmenu.php', '_self')" />
						<input type="hidden" name="ToDo" value="InvitePlayer" />
				</div>
				</form>
			</div>
			<div class="login-text">
				<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                                <p><?php echo gettext("Select an opponent and challenge him to a new game.");?></p>
				<p></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>

<div id="invitations">
	<div class="ctr" align="center">
		<div class="preferences">
			<div class="preferences-form">
				<form name="responseToInvite" action="mainmenu.php" method="post">
				<div class="form-block">
                                        <h1><?php echo gettext("Pending challenges");?></h1>
						<div class="inputlabel"></div>
						<table>
						<thead>
						  <tr>
                                                      <th class="mainHeader" colspan="6"><?php echo gettext("Challenges from other players");?></th>
						  </tr>
						  <tr>
                                                        <th style="text-align:left;display:none;"><?php echo gettext("Rank");?></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 1, true);" title="Game Id"><?php echo gettext("Id");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 2, true);" title="White's handle"><?php echo gettext("White");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 3, true);" title="Black's handle"><?php echo gettext("Black");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 4, true);" title="Date when the challenge was issued"><?php echo gettext("Issued");?></a></th>
                                                        <th style="text-align:center;"><?php echo gettext("Action");?></th>
						  </tr>
						</thead>
						<tbody id="respInviteTblBdy">
							<?php
								$tmpQuery = "SELECT * FROM " . $CFG_TABLE[games] . " WHERE gameMessage = 'playerInvited' AND ((whitePlayer = ".$_SESSION['playerID']." AND messageFrom = 'black') OR (blackPlayer = ".$_SESSION['playerID']." AND messageFrom = 'white')) ORDER BY dateCreated";
								$tmpGames = mysqli_query($dbh, $tmpQuery);

								$rowNbr = 0;
								if (mysqli_num_rows($tmpGames) == 0)
									echo("<tr><td colspan=\"3\">" . gettext("You are not currently invited to any games") . "</td></tr>\n");
								else
									while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
									{
										if($rowNbr %2 == 0)
											echo('<tr class="alternateRow">');
										else
											echo('<tr>');
										$rowNbr++;

										echo ('<td style="display:none;"></td>');
										echo("<td>");
										echo($tmpGame['gameID']);

										/* get white's nick */
										$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['whitePlayer']);
										$player = mysqli_fetch_row($tmpPlayer);
                                        if (!$player) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
										echo ('</td><td>');
										echo($player[0]);

										/* black's nick */
										$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['blackPlayer']);
										$player = mysqli_fetch_row($tmpPlayer);
										echo ('</td><td>');
										echo($player[0]);

										/* Date issued */
										echo ("</td><td>".substr($tmpGame['dateCreated'], 0, -3));
										$tmpFrom = ''; // !!jeck
										/* Response */
										echo ("</td><td align='center'>");
										echo ("<input class=\"button\" type=\"button\" value=\"" . gettext("Accept") . "\" onclick=\"sendResponse('accepted', '".$tmpFrom."', ".$tmpGame['gameID'].")\" />");
										echo ("<input class=\"button\" type=\"button\" value=\"" . gettext("Decline") . "\" onclick=\"sendResponse('declined', '".$tmpFrom."', ".$tmpGame['gameID'].")\" />");
										echo("</td></tr>\n");
									}
							?>
						</tbody>
						</table>
				</div>
				<input type="hidden" name="response" value="" />
				<input type="hidden" name="messageFrom" value="" />
				<input type="hidden" name="gameID" value="" />
				<input type="hidden" name="ToDo" value="ResponseToInvite" />
				</form>

				<form name="withdrawRequestForm" action="mainmenu.php" method="post">
				<div class="form-block">
						<div class="inputlabel"></div>
						<table>
						<thead>
						  <tr>
                                                      <th class="mainHeader" colspan="7"><?php echo gettext("Pending challenges from you");?></th>
						  </tr>
						  <tr>
                                                        <th style="text-align:left;display:none;"><?php echo gettext("Rank");?></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inviteTblBdy', 1, true);" title="Game Id"><?php echo gettext("Id");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inviteTblBdy', 2, true);" title="White's handle"><?php echo gettext("White");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inviteTblBdy', 3, true);" title="Black's handle"><?php echo gettext("Black");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inviteTblBdy',  4, true);" title="Status"				 ><?php echo gettext("Status");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inviteTblBdy',  5, true);" title="Date when the challenge was issued"><?php echo gettext("Issued");?></a></th>
                                                        <th style="text-align:center;"><?php echo gettext("Action");?></th>
						  </tr>
						</thead>
						<tbody id="inviteTblBdy">
							<?php
								/* if game is marked playerInvited and the invite is from the current player */
								$tmpQuery = "SELECT * FROM " . $CFG_TABLE[games] . " WHERE (gameMessage = 'playerInvited' AND ((whitePlayer = ".$_SESSION['playerID']." AND messageFrom = 'white') OR (blackPlayer = ".$_SESSION['playerID']." AND messageFrom = 'black'))";

								/* OR game is marked inviteDeclined and the response is from the opponent */
								$tmpQuery .= ") OR (gameMessage = 'inviteDeclined' AND ((whitePlayer = ".$_SESSION['playerID']." AND messageFrom = 'black') OR (blackPlayer = ".$_SESSION['playerID']." AND messageFrom = 'white')))  ORDER BY dateCreated";

								$tmpGames = mysqli_query($dbh, $tmpQuery);

								$rowNbr = 0;
								if (mysqli_num_rows($tmpGames) == 0)
									echo("<tr><td colspan=\"4\">" . gettext("You have no current unanswered invitations") . "</td></tr>\n");
								else
									while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
									{
										if($rowNbr %2 == 0)
											echo('<tr class="alternateRow">');
										else
											echo('<tr>');
										$rowNbr++;
										echo ('<td style="display:none;"></td>');
										echo("<td>");
										echo($tmpGame['gameID']);

										/* get white's nick */
										$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['whitePlayer']);
										$player = mysqli_fetch_row($tmpPlayer);
										if (!$player) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
                                        echo ('</td><td>');
										echo($player[0]);

										/* black's nick */
										$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['blackPlayer']);
										$player = mysqli_fetch_row($tmpPlayer);
										echo ("</td><td>");
										echo($player[0]);

										/* Status */
										echo ("</td><td>");
										if ($tmpGame['gameMessage'] == 'playerInvited')
											echo ("Response pending");
										else if ($tmpGame['gameMessage'] == 'inviteDeclined')
											echo ("Invitation declined");

										/* Date issued */
										echo ("</td><td>".substr($tmpGame['dateCreated'], 0, -3));

										/* Withdraw Request */
										echo ("</td><td align=\"center\">");
										echo ("<input class=\"button\" type=\"button\" value=\"" . gettext("Withdraw") . "\" onclick=\"withdrawRequest(".$tmpGame['gameID'].")\" />");

										echo("</td></tr>\n");
									}
							?>
						</tbody>
						</table>
				</div>
				<input type="hidden" name="gameID" value="" />
				<input type="hidden" name="ToDo" value="WithdrawRequest" />
				</form>
			</div>
			<div class="login-text">
				<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                                <p><?php echo gettext("This is an overview of all your pending challenges. Accept or decline an invitation to a new game or withdraw your invitations to others.");?></p>
				<p></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>

<div id="continuegame">
	<div class="ctr" align="center">
		<div class="preferences">
			<div class="preferences-form">
				<form name="existingGames" action="chess.php" method="post">
				<div class="form-block">
                                        <h1><?php echo gettext("Continue a game in progress");?></h1>
                                                <div class="inputlabel"><?php echo gettext("Select a game");?></div>
						<table>
						<thead>
						  <tr>
                                                  <th class="mainHeader" colspan="8"><?php echo gettext("Games in Progress");?></th>
						  </tr>
						  <tr>
                                                        <th style="text-align:left;display:none;"><?php echo gettext("Rank");?></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy', 1, true);" title="Game Id"><?php echo gettext("Id");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy', 2, true);" title="White's handle"><?php echo gettext("White");?></a></th>
                                                        <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy', 3, true);" title="Black's handle"><?php echo gettext("Black");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy',  4, true);" title="Moves"				 ><?php echo gettext("Mvs");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy',  5, true);" title="Current Turn"			 ><?php echo gettext("Current Turn");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy',  6, true);" title="Start Date of the Game"><?php echo gettext("Start Date");?></a></th>
                                                        <th><a href="" onclick="this.blur(); return sortTable('inProgrTblBdy',  7, true);" title="Date of Last Move"	 ><?php echo gettext("Last Move");?></a></th>
						  </tr>
						</thead>
						<tbody id="inProgrTblBdy">
					<?php
						$tmpGames = mysqli_query($dbh, "SELECT * FROM " . $CFG_TABLE[games] . " WHERE gameMessage = '' AND (whitePlayer = ".$_SESSION['playerID']." OR blackPlayer = ".$_SESSION['playerID'].") ORDER BY dateCreated");

						if (mysqli_num_rows($tmpGames) == 0)
							echo("<tr><td colspan=\"6\">" . gettext("You do not currently have any games in progress") . "</td></tr>\n");
						else
						{
							$rowNbr = 0;
							while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
							{
								if($rowNbr %2 == 0)
									echo('<tr class="alternateRow">');
								else
									echo('<tr>');
								$rowNbr++;
								echo ('<td style="display:none;"></td>');
								echo('<td>');
								echo("<a href=\"javascript:loadGame(".$tmpGame['gameID'].")\">".$tmpGame['gameID']."</a>");
								/* get white's nick */
								$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['whitePlayer']);
								$player = mysqli_fetch_row($tmpPlayer);
								if (!$player) echo mysqli_errno($dbh) . ": " . mysqli_error($dbh) . "\n<br><br>";
                                echo ('</td><td>');
								echo($player[0]);

								/* black's nick */
								$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['blackPlayer']);
								$player = mysqli_fetch_row($tmpPlayer);
								echo ("</td><td>");
								echo($player[0]);

								/* Your Color */
								if ($tmpGame['whitePlayer'] == $_SESSION['playerID'])
								{
									$tmpColor = "white";
								}
								else
								{
									$tmpColor = "black";
								}

								/* get number of moves from history */
								$tmpNumMoves = mysqli_query($dbh, "SELECT COUNT(gameID) FROM " . $CFG_TABLE[history] . " WHERE gameID = ".$tmpGame['gameID']);
								$numMoves = mysqli_fetch_row($tmpNumMoves); $numMoves = $numMoves[0];
								echo ('</td><td class="numeric">');
								echo(floor($numMoves / 2));
								/* Current Turn */
								/* based on number of moves, output current color's turn */
								if (($numMoves % 2) == 0)
									$tmpCurMove = "white";
								else
									$tmpCurMove = "black";

								echo ("</td><td>");
								if ($tmpCurMove == $tmpColor)
									echo(gettext("Your move"));
								else
									echo(gettext("Opponent"));

								/* Start Date */
								echo ("</td><td>".substr($tmpGame['dateCreated'], 0, -3));

								/* Last Move */
								echo ("</td><td>".substr($tmpGame['lastMove'], 0, -3)."</td></tr>\n");
							}
						}
					?>
						</tbody>
						</table>
                                                <div class="inputlabel" style="padding-top:10px;"><?php echo gettext("Will both players play from the same computer?");?></div>
						<div class="inputbox">
                                                        <div><input name="rdoShare" type="radio" value="" /> <?php echo gettext("Yes");?></div>
                                                        <div><input name="rdoShare" type="radio" value="no" checked="checked" /> <?php echo gettext("No");?></div>
						</div>
						<input type="hidden" name="gameID" value="" />
						<input type="hidden" name="sharePC" value="no" />
                                                <b><?php echo gettext("WARNING!");?></b>
						<br />
                                                <?php echo gettext("Games will expire WITHOUT NOTICE if a move isn't made after") . " " . ($CFG_EXPIREGAME) . " " . gettext("days!");?>
					</div>
				</form>
			</div>
			<div class="login-text">
				<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                                <p><?php echo gettext("Select a game from the list and resume play by clicking on the game id");?></p>
				<p></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>

<?php
    ##########################################################
?>
<div id="messages">
<div align="center">
	<div class="preferences">
		<div class="preferences-form">
			<form name="messageSendForm" method="post" action="mainmenu.php">
				<div class="form-block">
                                    <h1><?php echo gettext("Messages");?></h1>
					
					
                                        <div class="inputlabel"><?php echo gettext("Send message to player");?></div>
                                        <div>
                                            <select name="player">
						<?php
							$tmpQuery="SELECT playerID, nick FROM " . $CFG_TABLE[players] . " WHERE playerID <> ".$_SESSION['playerID'];
							$tmpPlayers = mysqli_query($dbh, $tmpQuery);
							$first = true;
							while($tmpPlayer = mysqli_fetch_array($tmpPlayers, MYSQLI_ASSOC))
							{
								echo ('<option ');
								if($first)
								{
									echo('selected="selected" ');
									$first = false;
								}
								echo ('value="'.$tmpPlayer['playerID'].'"> '.$tmpPlayer['nick']."</option>\n");
							}
						?>
                                            </select>
                                        </div>

                                        <input type="submit" class="button" value="<?php echo gettext("Open Message Window");?>" onclick="MessagePlayer( getObject('player').value )" />
				</div>
			</form>
                        <form name="messageViewForm" method="post" action="viewmessage.php">
				<div class="form-block">
					
                                        <div class="inputlabel"><?php echo gettext("Current messages");?></div>

<table>
						<thead>
						  <tr>
                                                      <th class="mainHeader" colspan="3"><?php echo gettext("Pending messages");?></th>
						  </tr>
						  <tr>
                                                      <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 1, true);" title="Player who sent it"><?php echo gettext("Player");?></a></th>
                                                      <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 3, true);" title="Subject"><?php echo gettext("Subject");?></a></th>
                                                      <th><a href="" onclick="this.blur(); return sortTable('respInviteTblBdy', 4, true);" title="Date when the message was sent"><?php echo gettext("Date");?></a></th>
						  </tr>
						</thead>
						<tbody id="respInviteTblBdy">
                                                    <?php
                                                        $SqlQuery="SELECT * FROM " . $CFG_TABLE[communication] . " left join " . $CFG_TABLE[players] . " on " . $CFG_TABLE[communication] . ".fromID=" . $CFG_TABLE[players] . ".playerID WHERE ((toID is null) or (toID=" . $_SESSION['playerID'] . ")) and ((fromID is null) or (fromID=playerID)) and ack=0 and gameID is null order by " . $CFG_TABLE[communication] . ".postDate desc;";
                                                        $tmpGames = mysqli_query($dbh, $SqlQuery);

                                                        if (mysqli_num_rows($tmpGames) == 0)
                                                        {
                                                            echo "<tr><td colspan=\"3\">" . gettext("You have currently no pending messages") . "</td></tr>\n";
                                                        } else {
                                                            $rowNbr = 0;
                                                            while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
                                                            {
                                                                if($rowNbr %2 == 0)
                                                                        echo('<tr class="alternateRow">');
                                                                else
                                                                        echo('<tr>');
                                                                $rowNbr++;

                                                                echo "<td>";
                                                                    echo "<a href=\"javascript:viewMessage(" . $tmpGame['commID'] . ")\">";
                                                                    echo ($tmpGame['fromID']!=0?$tmpGame['nick']:"Webchess");
                                                                    echo "</a>";
                                                                echo "</td>"; // player
                                                                echo "<td>" . (strlen($tmpGame['title'])>40? substr($tmpGame['title'],0,37)."..." : $tmpGame['title']) . "</td>"; // subject
                                                                echo "<td>" . $tmpGame['postDate'] . "</td>"; // date

                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
						</tbody>
						</table>                                        

					<input type="hidden" name="messageID" value="" />
				</div>
			</form>
		</div>
		<div class="login-text">
			<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                        <p><?php echo gettext("You can send and receive messages to other players here.");?></p>
                </div>
		<div class="clr"></div>
	</div>
</div>
</div>

<?php
    #######################################################
?>

<div id="viewgame">
	<div class="ctr" align="center">
		<div class="preferences">
			<div class="preferences-form">
				<form name="endedGames" action="chess.php" method="post">
				<div class="form-block">
                                        <h1><?php echo gettext("View finished games");?></h1>
                                                <div class="inputlabel"><?php echo gettext("Select a game to view");?></div>
                                                
						<table>
						<thead>
						  <tr>
                                                      <th class="mainHeader" colspan="8"><?php echo gettext("Finished games");?></th>
						  </tr>
						  <tr>
                                                      <th style="text-align:left;display:none;"><?php echo gettext("Rank");?></th>
                                                      <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('finishedTblBdy', 1, true);" title="Game Id"><?php echo gettext("Id");?></a></th>
                                                      <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('finishedTblBdy', 2, true);" title="White's handle"><?php echo gettext("White");?></a></th>
                                                      <th style="text-align:left;"><a href="" onclick="this.blur(); return sortTable('finishedTblBdy', 3, true);" title="Black's handle"><?php echo gettext("Black");?></a></th>
                                                      <th><a href="" onclick="this.blur(); return sortTable('finishedTblBdy',  4, true);" title="Moves"				 ><?php echo gettext("Mvs");?></a></th>
                                                      <th><a href="" onclick="this.blur(); return sortTable('finishedTblBdy',  5, true);" title="Game Result"			 ><?php echo gettext("Result");?></a></th>
                                                      <th><a href="" onclick="this.blur(); return sortTable('finishedTblBdy',  6, true);" title="Start Date of the Game"><?php echo gettext("Start Date");?></a></th>
                                                      <th><a href="" onclick="this.blur(); return sortTable('finishedTblBdy',  7, true);" title="Date of Last Move"	 ><?php echo gettext("Last Move");?></a></th>
						  </tr>
						</thead>
						<tbody id="finishedTblBdy">
<?php

    if (isset($_SESSION['pref_replayall']) && $_SESSION['pref_replayall'] == 'true')
    {
        $mygames = "";
    }
    else
    {
        $mygames = "AND (whitePlayer = ".$_SESSION['playerID']." OR blackPlayer = ".$_SESSION['playerID'].")";
	}

    $tmpGames = mysqli_query($dbh, "SELECT * FROM " . $CFG_TABLE[games] . " WHERE (gameMessage <> '' AND gameMessage <> 'playerInvited' AND gameMessage <> 'inviteDeclined') ".$mygames." ORDER BY lastMove DESC");

	if (mysqli_num_rows($tmpGames) == 0)
            echo("<tr><td colspan=\"6\">" . gettext("You do not currently have any games to view") . "</td></tr>\n");
	else
	{
		$rowNbr = 0;
		while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
		{
			if($rowNbr %2 == 0)
				echo('<tr class="alternateRow">');
			else
				echo('<tr>');
			$rowNbr++;
			echo ('<td style="display:none;"></td>');
			echo('<td>');
			echo("<a href=\"javascript:loadGame(".$tmpGame['gameID'].")\">".$tmpGame['gameID']."</a>");
			/* get white's nick */
			$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['whitePlayer']);
			$player = mysqli_fetch_row($tmpPlayer);
            $player = $player[0];
			echo ('</td><td>');
			echo($player);

			/* black's nick */
			$tmpPlayer = mysqli_query($dbh, "SELECT CONCAT(nick, ' ', userlevel) as nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$tmpGame['blackPlayer']);
			$player = mysqli_fetch_row($tmpPlayer);
            $player = $player[0];
			echo ("</td><td>");
			echo($player);

			/* Your Color */
			if ($tmpGame['whitePlayer'] == $_SESSION['playerID'])
			{
				$tmpColor = "white";
			}
			else
			{
				$tmpColor = "black";
			}

			/* get number of moves from history */
			$tmpNumMoves = mysqli_query($dbh, "SELECT COUNT(gameID) FROM " . $CFG_TABLE[history] . " WHERE gameID = ".$tmpGame['gameID']);
			$numMoves = mysqli_fetch_row($tmpNumMoves);
            $numMoves = $numMoves[0];
			echo ('</td><td class="numeric">');
			echo(floor($numMoves / 2));
			/* Status */
			if (is_null($tmpGame['gameMessage']))
				echo("</td><td>");
			else
			{
				if ($tmpGame['gameMessage'] == "draw")
					echo("</td><td>&frac12;-&frac12;");
				else if ($tmpGame['gameMessage'] == "stalemate")
					echo("</td><td>&frac12;-&frac12; (" . gettext("stalemate") . ")");
				else if ($tmpGame['gameMessage'] == "playerResigned")
					echo("</td><td>".gettext($tmpGame['messageFrom'])." " . gettext("resigned"));
				else if (($mygames != "") && ($tmpGame['gameMessage'] == "checkMate") && ($tmpGame['messageFrom'] == $tmpColor))
					echo("</td><td>" . gettext("Checkmate, you won!"));
				else if (($mygames != "") && ($tmpGame['gameMessage'] == "checkMate"))
					echo("</td><td>" . gettext("Checkmate, you lost"));
				else if ($tmpGame['gameMessage'] == "checkMate")
					echo("</td><td>" . gettext("Checkmate, ".$tmpGame['messageFrom']." won!"));
				else
					echo("</td><td>");
			}

			/* Start Date */
			echo ("</td><td>".substr($tmpGame['dateCreated'], 0, -3));
			/* Last Move */
			echo ("</td><td>".substr($tmpGame['lastMove'], 0, -3)."</td></tr>\n");
		}
	}
?>
	</tbody>
	</table>
	<input type="hidden" name="gameID" value="" />
	<input type="hidden" name="sharePC" value="no" />
	<div style="padding-top:10px;">
	<b><?php echo gettext("WARNING!");?></b>
	<br />
        <?php echo gettext("Finished games will be deleted WITHOUT NOTICE after") . " " . ($CFG_EXPIREGAME) . " " . gettext("days!");?>
	</div>
	</div>
	</form>
</div>
			<div class="login-text">
				<div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
                                <p><?php echo gettext("Select a game to view from the list by clicking on the game id");?></p>
				<p></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>

</div>
</div>
</body>
</html>
<?php mysqli_close($dbh); ?>

