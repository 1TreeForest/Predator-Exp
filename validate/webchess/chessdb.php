<?php 
// $Id: chessdb.php,v 1.11 2013/12/07 20:00:00 gitjake Exp $

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

	/* these functions are used to interact with the DB */
	function updateTimestamp()
	{
		global $CFG_TABLE, $dbh;
		
		mysqli_query($dbh, "UPDATE " . $CFG_TABLE[games] . " SET lastMove = NOW() WHERE gameID = ".$_SESSION['gameID']);
	}

	function loadHistory()
	{
		global $CFG_TABLE, $dbh;
		global $history, $numMoves;
		
		$allMoves = mysqli_query($dbh, "SELECT * FROM " . $CFG_TABLE[history] . " WHERE gameID = ".$_SESSION['gameID']." ORDER BY timeOfMove");

		$numMoves = -1;
		while ($thisMove = mysqli_fetch_array($allMoves, MYSQLI_ASSOC))
		{
			$numMoves++;
			$history[$numMoves] = $thisMove;
		}
	}

	function savePromotion()
	{
		global $CFG_TABLE, $dbh;
		global $CFG_USEEMAILNOTIFICATION;
		global $history, $numMoves, $isInCheck;

		if ($isInCheck)
		{
			$tmpIsInCheck = 1;
			$history[$numMoves]['isInCheck'] = 1;
		}
		else
			$tmpIsInCheck = 0;

		$history[$numMoves]['promotedTo'] = getPieceName($_POST['promotion']);

		$tmpQuery = "UPDATE " . $CFG_TABLE[history] . " SET promotedTo = '".getPieceName($_POST['promotion'])."', isInCheck = ".$tmpIsInCheck." WHERE gameID = ".$_SESSION['gameID']." AND timeOfMove = '".$history[$numMoves]['timeOfMove']."'";
		mysqli_query($dbh, $tmpQuery);

		updateTimestamp();
	
		/* if email notification is activated and move does not result in a pawn's promotion... */
		if ($CFG_USEEMAILNOTIFICATION && ! $_SESSION['isSharedPC'])
		{
			if ($history[$numMoves]['replaced'] == null)
				$tmpReplaced = '';
			else
				$tmpReplaced = $history[$numMoves]['replaced'];

			/* get opponent's color */
			if (($numMoves == -1) || ($numMoves % 2 == 1))
				$oppColor = "black";
			else
				$oppColor = "white";
			
			/* get opponent's player ID */
			if ($oppColor == 'white')
				$tmpOpponentID = mysqli_query($dbh, "SELECT whitePlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
			else
				$tmpOpponentID = mysqli_query($dbh, "SELECT blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
			
			$opponentID = mysqli_fetch_row($tmpOpponentID);
			$opponentID = $opponentID[0];
			/* if opponent is using email notification... */
			$tmpOpponentEmail = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'emailNotification'");
			if (mysqli_num_rows($tmpOpponentEmail) > 0)
			{
				$opponentEmail = mysqli_fetch_row($tmpOpponentEmail);
                $opponentEmail = $opponentEmail[0];
				if ($opponentEmail != '')
				{
					/* get opponent's nick */
					$tmpOpponentNick = mysqli_query($dbh, "SELECT nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$_SESSION['playerID']);
					$opponentNick = mysqli_fetch_row($tmpOpponentNick);
					$opponentNick = $opponentNick[0];
					/* get opponent's prefered history type */
					$tmpOpponentHistory = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'history'");
					
					/* default to PGN */
					if (mysqli_num_rows($tmpOpponentHistory) > 0) {
						$opponentHistory = mysqli_fetch_row($tmpOpponentHistory);
                        $opponentHistory = $opponentHistory[0];
                    }
					else
						$opponentHistory = 'pgn';
					
					/* notify opponent of move via email */
					if ($opponentHistory == 'pgn')
						webchessMail('move', $opponentEmail, moveToPGNString($history[$numMoves]['curColor'], $history[$numMoves]['curPiece'], $history[$numMoves]['fromRow'], $history[$numMoves]['fromCol'], $history[$numMoves]['toRow'], $history[$numMoves]['toCol'], $tmpReplaced, $history[$numMoves]['promotedTo'], $isInCheck), $opponentNick, $_SESSION['gameID']);
					else
						webchessMail('move', $opponentEmail, moveToVerbousString($history[$numMoves]['curColor'], $history[$numMoves]['curPiece'], $history[$numMoves]['fromRow'], $history[$numMoves]['fromCol'], $history[$numMoves]['toRow'], $history[$numMoves]['toCol'], $tmpReplaced, $history[$numMoves]['promotedTo'], $isInCheck), $opponentNick, $_SESSION['gameID']);
				}
			}
		}
	}
	
	function saveHistory()
	{
		global $CFG_TABLE, $dbh;
		global $board, $isPromoting, $history, $numMoves, $isInCheck, $CFG_USEEMAILNOTIFICATION;

		/* set destination row for pawn promotion */
		if ($board[$_POST['fromRow']][$_POST['fromCol']] & BLACK)
			$targetRow = 0;
		else
			$targetRow = 7;
		
		/* determine if move results in pawn promotion */
		if ((($board[$_POST['fromRow']][$_POST['fromCol']] & COLOR_MASK) == PAWN) && ($_POST['toRow'] == $targetRow))
			$isPromoting = true;
		else
			$isPromoting = false;

		/* determine who's playing based on number of moves so far */
		if (($numMoves == -1) || ($numMoves % 2 == 1))
		{
			$curColor = "white";
			$oppColor = "black";
		}
		else
		{
			$curColor = "black";
			$oppColor = "white";
		}

		/* add move to history */
		$numMoves++;
		$history[$numMoves]['gamedID'] = $_SESSION['gameID'];
		$history[$numMoves]['curPiece'] = getPieceName($board[$_POST['fromRow']][$_POST['fromCol']]);
		$history[$numMoves]['curColor'] = $curColor;
		$history[$numMoves]['fromRow'] = $_POST['fromRow'];
		$history[$numMoves]['fromCol'] = $_POST['fromCol'];
		$history[$numMoves]['toRow'] = $_POST['toRow'];
		$history[$numMoves]['toCol'] = $_POST['toCol'];
		$history[$numMoves]['promotedTo'] = null;

		if ($isInCheck)
			$history[$numMoves]['isInCheck'] = 1;
		else
			$history[$numMoves]['isInCheck'] = 0;

		if (DEBUG)
		{
			if ($history[$numMoves]['curPiece'] == '')
				echo ("WARNING!!!  missing piece at ".$_POST['fromRow'].", ".$_POST['fromCol'].": ".$board[$_POST['fromRow']][$_POST['fromCol']]."<p>\n");
		}

		if ($board[$_POST['toRow']][$_POST['toCol']] == 0)
		{
			$tmpQuery = "INSERT INTO " . $CFG_TABLE[history] . " (timeOfMove, gameID, curPiece, curColor, fromRow, fromCol, toRow, toCol, replaced, promotedTo, isInCheck) VALUES (Now(), ".$_SESSION['gameID'].", '".getPieceName($board[$_POST['fromRow']][$_POST['fromCol']])."', '$curColor', ".$_POST['fromRow'].", ".$_POST['fromCol'].", ".$_POST['toRow'].", ".$_POST['toCol'].", null, null, ".$history[$numMoves]['isInCheck'].")"; 
			$history[$numMoves]['replaced'] = null;
			$tmpReplaced = "";
		}
		else
		{
			$tmpQuery = "INSERT INTO " . $CFG_TABLE[history] . " (timeOfMove, gameID, curPiece, curColor, fromRow, fromCol, toRow, toCol, replaced, promotedTo, isInCheck) VALUES (Now(), ".$_SESSION['gameID'].", '".getPieceName($board[$_POST['fromRow']][$_POST['fromCol']])."', '$curColor', ".$_POST['fromRow'].", ".$_POST['fromCol'].", ".$_POST['toRow'].", ".$_POST['toCol'].", '".getPieceName($board[$_POST['toRow']][$_POST['toCol']])."', null, ".$history[$numMoves]['isInCheck'].")"; 

			$history[$numMoves]['replaced'] = getPieceName($board[$_POST['toRow']][$_POST['toCol']]);
			$tmpReplaced = $history[$numMoves]['replaced'];
		}

		mysqli_query($dbh, $tmpQuery);

		/* if email notification is activated and move does not result in a pawn's promotion... */
		/* NOTE: moves resulting in pawn promotion are handled by savePromotion() above */
		if ($CFG_USEEMAILNOTIFICATION && !$isPromoting && ! $_SESSION['isSharedPC'])
		{
			/* get opponent's player ID */
			if ($oppColor == 'white')
				$tmpOpponentID = mysqli_query($dbh, "SELECT whitePlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
			else
				$tmpOpponentID = mysqli_query($dbh, "SELECT blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
			
			$opponentID = mysqli_fetch_row($tmpOpponentID);
			$opponentID = $opponentID[0];
			/* if opponent is using email notification... */
			$tmpOpponentEmail = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'emailNotification'");
			if (mysqli_num_rows($tmpOpponentEmail) > 0)
			{
				$opponentEmail = mysqli_fetch_row($tmpOpponentEmail);
                $opponentEmail = $opponentEmail[0];
				if ($opponentEmail != '')
				{
					/* get opponent's nick */
					$tmpOpponentNick = mysqli_query($dbh, "SELECT nick FROM " . $CFG_TABLE[players] . " WHERE playerID = ".$_SESSION['playerID']);
					$opponentNick = mysqli_fetch_row($tmpOpponentNick);
					$opponentNick = $opponentNick[0];
					/* get opponent's prefered history type */
					$tmpOpponentHistory = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'history'");
					
					/* default to PGN */
					if (mysqli_num_rows($tmpOpponentHistory) > 0) {
						$opponentHistory = mysqli_fetch_row($tmpOpponentHistory);
                        $opponentHistory = $opponentHistory[0];
                    }
					else
						$opponentHistory = 'pgn';
					
					/* notify opponent of move via email */
					if ($opponentHistory == 'pgn')
						webchessMail('move', $opponentEmail, moveToPGNString($history[$numMoves]['curColor'], $history[$numMoves]['curPiece'], $history[$numMoves]['fromRow'], $history[$numMoves]['fromCol'], $history[$numMoves]['toRow'], $history[$numMoves]['toCol'], $tmpReplaced, '', $isInCheck), $opponentNick, $_SESSION['gameID']);
					else
						webchessMail('move', $opponentEmail, moveToVerbousString($history[$numMoves]['curColor'], $history[$numMoves]['curPiece'], $history[$numMoves]['fromRow'], $history[$numMoves]['fromCol'], $history[$numMoves]['toRow'], $history[$numMoves]['toCol'], $tmpReplaced, '', $isInCheck), $opponentNick, $_SESSION['gameID']);
				}
			}
		}
	}

	function loadGame()
	{
		global $CFG_TABLE, $dbh;
		global $board, $playersColor;
	
		/* clear board data */
		for ($i = 0; $i < 8; $i++)
			for ($j = 0; $j < 8; $j++)
				$board[$i][$j] = 0;

		/* get data from database */
		$pieces = mysqli_query($dbh, "SELECT * FROM " . $CFG_TABLE[pieces] . " WHERE gameID = ".$_SESSION['gameID']);

		/* setup board */
		while ($thisPiece = mysqli_fetch_array($pieces, MYSQLI_ASSOC))
		{
			$board[$thisPiece["row"]][$thisPiece["col"]] = getPieceCode($thisPiece["color"], $thisPiece["piece"]);
		}
		
		/* get current player's color */
		$tmpQuery = "SELECT whitePlayer, blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID'];
		$tmpTurns = mysqli_query($dbh, $tmpQuery);
		$tmpTurn = mysqli_fetch_array($tmpTurns, MYSQLI_ASSOC);

		if ($tmpTurn['whitePlayer'] == $_SESSION['playerID'])
			$playersColor = "white";
		else
			$playersColor = "black";
	}

	function saveGame()
	{
		global $CFG_TABLE, $dbh;
		global $board, $playersColor;

		/* save new game data */
		$values = array(); // insert values
		/* for each row... */
		for ($i = 0; $i < 8; $i++)
		{
			/* for each col... */
			for ($j = 0; $j < 8; $j++)
			{
				/* if there's a piece at that pos on the board */
				if ($board[$i][$j] != 0)
				{
					/* updated the database */
					if ($board[$i][$j] & BLACK)
						$tmpColor = "black";
					else
						$tmpColor = "white";

					$tmpPiece = getPieceName($board[$i][$j]);
					$values[] = '('.$_SESSION['gameID'].", '$tmpColor', '$tmpPiece', $i, $j)";
				}
			}
		}
		/* clear old data */
		mysqli_query($dbh, "DELETE FROM " . $CFG_TABLE[pieces] . " WHERE gameID = ".$_SESSION['gameID']);
		mysqli_query($dbh, "INSERT INTO " . $CFG_TABLE[pieces] . ' (gameID, color, piece, row, col) VALUES ' . implode(',', $values));

		/* update lastMove timestamp */
		updateTimestamp();
	}

	function processMessages()
	{
		global $CFG_TABLE, $dbh;
		global $isUndoRequested, $isDrawRequested, $isUndoing, $isGameOver, $isCheckMate, $playersColor, $numMoves, $statusMessage, $CFG_USEEMAILNOTIFICATION;

		if (DEBUG)
			echo("Entering processMessages()<br>\n");

		$isUndoRequested = false;
		$isGameOver = false;
		
		/* find out which player (black or white) we are serving */
		/* NOTE: When playing in the same computer $playersColor is always the player who logged in first */
		if (DEBUG)
			echo("SharedPC..." . $_SESSION['isSharedPC'] . "<br>\n");
		if ($_SESSION['isSharedPC'])	// Only the player to move is active in this case
			if( ( (($numMoves == -1) || (($numMoves % 2) == 1)) && ($playersColor == "white")) ||
				((($numMoves % 2) == 0) && ($playersColor == "black")) )
				$currentPlayer = $playersColor;
			else						// The player who logged in later is to move
				if($playersColor == "white")
					$currentPlayer = "black";
				else
					$currentPlayer = "white";
		else 							// The players are on different computers
			$currentPlayer = $playersColor;

		if ($currentPlayer == "white")
			$opponentColor = "black";
		else
			$opponentColor = "white";

		/* *********************************************** */
		/* queue user generated (ie: using forms) messages */
		/* *********************************************** */
		if (DEBUG)
			echo("Processing user generated (ie: form) messages...<br>\n");

		/* queue a request for an undo */
		if (isset($_POST['requestUndo']) && ($_POST['requestUndo'] == "yes")) 
		{
			/* if the two players are on the same system, execute undo immediately */
			/* NOTE: assumes the two players discussed it live before undoing */
			if ($_SESSION['isSharedPC'])
				$isUndoing = true;
			else
			{
				$tmpQuery = "INSERT INTO " . $CFG_TABLE[messages] . " (gameID, msgType, msgStatus, destination) VALUES (".$_SESSION['gameID'].", 'undo', 'request', '".$opponentColor."')";
				mysqli_query($dbh, $tmpQuery);
                                // ToDo: Mail an undo request notice to other player??
			}
			
			updateTimestamp();
		}
		
		/* queue a request for a draw */
		if (isset($_POST['requestDraw']) && ($_POST['requestDraw'] == "yes"))
		{
			/* if the two players are on the same system, execute Draw immediately */
			/* NOTE: assumes the two players discussed it live before declaring the game a draw */
			if ($_SESSION['isSharedPC'])
			{
				$tmpQuery = "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = 'draw', messageFrom = '".$currentPlayer."' WHERE gameID = ".$_SESSION['gameID'];
				mysqli_query($dbh, $tmpQuery);
			}
			else
			{
				$tmpQuery = "INSERT INTO " . $CFG_TABLE[messages] . " (gameID, msgType, msgStatus, destination) VALUES (".$_SESSION['gameID'].", 'draw', 'request', '".$opponentColor."')";
				mysqli_query($dbh, $tmpQuery);
			}

			updateTimestamp();
		}

		/* response to a request for an undo */
		if (isset($_POST['undoResponse']))
		{
			if ($_POST['isUndoResponseDone'] == 'yes')
			{
				if ($_POST['undoResponse'] == "yes")
				{
					$tmpStatus = "approved";
					$isUndoing = true;
				}
				else
					$tmpStatus = "denied";
			
				$tmpQuery = "UPDATE " . $CFG_TABLE[messages] . " SET msgStatus = '".$tmpStatus."', destination = '".$opponentColor."' WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'undo' AND msgStatus = 'request' AND destination = '".$currentPlayer."'";
				mysqli_query($dbh, $tmpQuery);
			
				updateTimestamp();
			}
		}
		
		/* response to a request for a draw */
		if (isset($_POST['drawResponse']))
		{
			if ($_POST['isDrawResponseDone'] == 'yes')
			{
				if ($_POST['drawResponse'] == "yes")
				{
					$tmpStatus = "approved";
					$tmpQuery = "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = 'draw', messageFrom = '".$currentPlayer."' WHERE gameID = ".$_SESSION['gameID'];
					mysqli_query($dbh, $tmpQuery);
				}
				else
					$tmpStatus = "denied";
			
				$tmpQuery = "UPDATE " . $CFG_TABLE[messages] . " SET msgStatus = '".$tmpStatus."', destination = '".$opponentColor."' WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'draw' AND msgStatus = 'request' AND destination = '".$currentPlayer."'";
				mysqli_query($dbh, $tmpQuery);

				updateTimestamp();
			}
		}
		
		/* resign the game */
		if (isset($_POST['resign']) && ($_POST['resign'] == "yes"))
		{
			$tmpQuery = "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = 'playerResigned', messageFrom = '".$currentPlayer."' WHERE gameID = ".$_SESSION['gameID'];
			mysqli_query($dbh, $tmpQuery);

			updateTimestamp();

			/* if email notification is activated... */
			if ($CFG_USEEMAILNOTIFICATION && ! $_SESSION['isSharedPC'])
			{
				/* get opponent's player ID */
				if ($currentPlayer == 'white')
					$tmpOpponentID = mysqli_query($dbh, "SELECT blackPlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
				else
					$tmpOpponentID = mysqli_query($dbh, "SELECT whitePlayer FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID']);
				
				$opponentID = mysqli_fetch_row($tmpOpponentID);
                $opponentID = $opponentID[0];
				$tmpOpponentEmail = mysqli_query($dbh, "SELECT value FROM " . $CFG_TABLE[preferences] . " WHERE playerID = ".$opponentID." AND preference = 'emailNotification'");
				
				/* if opponent is using email notification... */
				if (mysqli_num_rows($tmpOpponentEmail) > 0)
				{
					$opponentEmail = mysqli_fetch_row($tmpOpponentEmail);
                    $opponentEmail = $opponentEmail[0];
					if ($opponentEmail != '')
					{
						/* notify opponent of resignation via email */
						webchessMail('resignation', $opponentEmail, '', $_SESSION['nick'], $_SESSION['gameID']);
					}
				}
			}
		}
		
		
		/* ******************************************* */
		/* process queued messages (ie: from database) */
		/* ******************************************* */
		$tmpQuery = "SELECT * FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND destination = '".$currentPlayer."'";
		$tmpMessages = mysqli_query($dbh, $tmpQuery);

		while($tmpMessage = mysqli_fetch_array($tmpMessages, MYSQLI_ASSOC))
		{
			switch($tmpMessage['msgType'])
			{
				case 'undo':
					switch($tmpMessage['msgStatus'])
					{
						case 'request':
							$isUndoRequested = true;
							break;
						case 'approved':
							$tmpQuery = "DELETE FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'undo' AND msgStatus = 'approved' AND destination = '".$currentPlayer."'";
							mysqli_query($dbh, $tmpQuery);
							$statusMessage .= "Undo approved";
							break;
						case 'denied':
							$isUndoing = false;
							$tmpQuery = "DELETE FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'undo' AND msgStatus = 'denied' AND destination = '".$currentPlayer."'";
							mysqli_query($dbh, $tmpQuery);
							$statusMessage .= "Undo denied";
							break;
					}
					break;
				
				case 'draw':
					switch($tmpMessage['msgStatus'])
					{
						case 'request':
							$isDrawRequested = true;
							break;
						case 'approved':
							$tmpQuery = "DELETE FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'draw' AND msgStatus = 'approved' AND destination = '".$currentPlayer."'";
							mysqli_query($dbh, $tmpQuery);
							$statusMessage .= "Draw approved";
							break;
						case 'denied':
							$tmpQuery = "DELETE FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND msgType = 'draw' AND msgStatus = 'denied' AND destination = '".$currentPlayer."'";
							mysqli_query($dbh, $tmpQuery);
							$statusMessage .= "Draw denied";
							break;
					}
					break;
			}
		}

		/* requests pending */
		$tmpQuery = "SELECT * FROM " . $CFG_TABLE[messages] . " WHERE gameID = ".$_SESSION['gameID']." AND msgStatus = 'request' AND destination = '".$opponentColor."'";
		$tmpMessages = mysqli_query($dbh, $tmpQuery);

		while($tmpMessage = mysqli_fetch_array($tmpMessages, MYSQLI_ASSOC))
		{
			switch($tmpMessage['msgType'])
			{
				case 'undo':
					$statusMessage .= "Your undo request is pending";
					break;
				case 'draw':
					$statusMessage .= "Your request for a draw is pending";
					break;
			}
		}	
		
		/* game level status: draws, resignations and checkmate */
		/* if checkmate, update games table */
		if (isset($_POST['isCheckMate']) && ($_POST['isCheckMate'] == 'true'))
			mysqli_query($dbh, "UPDATE " . $CFG_TABLE[games] . " SET gameMessage = 'checkMate', messageFrom = '".$currentPlayer."' WHERE gameID = ".$_SESSION['gameID']);
                        // ToDo: Mail checkmate notification to opponent

		$tmpQuery = "SELECT gameMessage, messageFrom FROM " . $CFG_TABLE[games] . " WHERE gameID = ".$_SESSION['gameID'];
		$tmpMessages = mysqli_query($dbh, $tmpQuery);
		$tmpMessage = mysqli_fetch_array($tmpMessages, MYSQLI_ASSOC);
		
		if ($tmpMessage['gameMessage'] == "draw")
		{
			$statusMessage .= "Game ended in a draw";
			$isGameOver = true;
		}

		if ($tmpMessage['gameMessage'] == "playerResigned")
		{
			$statusMessage .= $tmpMessage['messageFrom']." has resigned the game";
			$isGameOver = true;
		}

		if ($tmpMessage['gameMessage'] == "checkMate")
		{
			$statusMessage .= "Checkmate! ".$tmpMessage['messageFrom']." has won the game";
			$isGameOver = true;
			$isCheckMate = true;
		}
	}
?>
