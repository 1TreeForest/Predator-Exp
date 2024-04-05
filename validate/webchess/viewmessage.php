<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="mainmenu.css" type="text/css" />
    <script type="text/javascript" src="javascript/messages.js"></script>
    <title><?php echo APP_NAME . " :: " . gettext("Message View");?></title>
</head>
<body>

<div class="viewmessage-form">
    <div class="login-text">
        <div class="ctr"><img src="images/webchess.jpg" width="65" height="92" alt="security" /></div>
        <p>&nbsp;&nbsp;<a href="mainmenu.php"><?php echo gettext("Return to Main Menu");?></a></p>
    </div>
    <div class="message-block">
    <?php
        if(isset($_POST['messageID']))
        {
            $messageID = $_POST['messageID'];

            $SqlQuery="SELECT * FROM " . $CFG_TABLE[communication] . " WHERE commID = $messageID";
            $tmpGames = mysqli_query($dbh, $SqlQuery);

            if (mysqli_num_rows($tmpGames) == 0)
            {
            ?>
                <div class="inputlabel"><?php echo gettext(" Message not found!");?> </div>
                <div>
                <p><?php echo gettext("There has been an error! The message you're trying to view can't be found.");?></p>
                </div>
            <?php
            } else {
                $rowNbr = 0;
                while($tmpGame = mysqli_fetch_array($tmpGames, MYSQLI_ASSOC))
                {
                if($tmpGame['fromID']!=0)
                {
                    $innerSQL = "SELECT * FROM " . $CFG_TABLE[players] . " WHERE playerID = " . $tmpGame['fromID'];
                    $innerRes = mysqli_query($dbh, $innerSQL);
                    $tempRes = mysqli_fetch_array($innerRes, MYSQLI_ASSOC);
                    $FromPlayer = $tempRes['nick'];
                } else {
                    $FromPlayer = APP_NAME . gettext("Administrator");
                }
                ?>
                    <div class="messageheader">
                    <?php
                        echo gettext("From:") . " " . htmlspecialchars($FromPlayer); 
                        if($tmpGame['fromID']!=0) {
                            echo " [<a href=\"javascript:MessagePlayer(" . $tmpGame['fromID'] . ")\">" . gettext("Reply") . "</a>]"; 
                        }
                        echo " " . gettext("on") . " " . $tmpGame['postDate'];
                    
                        if($tmpGame['fromID']!=0) {
                            echo "&nbsp;&nbsp;[<a href=\"javascript:HideMessage(" . $messageID . ")\">" . gettext("Delete") . "</a>]";
                        }
                    ?>
                    <br><br>
                    </div>
                    <form name="messageHideForm" action="mainmenu.php" method="post">
                    <input type="hidden" name="messageID" />
                    <input type="hidden" name="ToDo" value="HideMessage" />
                    </form>
                    <div class="inputlabel"><?php echo htmlspecialchars($tmpGame['title']);?> </div>
                    <div>
                        <p><?php echo str_replace("\n", "<br>", htmlspecialchars($tmpGame['text']));?></p>
                    </div>
                <?php
                }
            }
            
        } else {
    ?>
        <div class="inputlabel"> <?php echo gettext("Message Error");?> </div>
        <div>
        <p><?php echo gettext("An error ocurred!.");?></p>
        </div>
    <?php } ?>
    </div>
</div>

</body></html>

