<?php
// $Id: capt.php,v 1.51 2013/12/07 20:30:00 gitjake Exp $

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

/* connect to database */
require 'connectdb.php';

$f=mysqli_query($dbh, "SELECT * FROM " . $CFG_TABLE[history] . " WHERE ((replaced > '') OR (curPiece = 'pawn' AND toCol <> fromCol AND replaced IS NULL)) AND gameID =  '".$_SESSION['gameID']."' ORDER BY curColor DESC, replaced DESC");

$c=0;
$d=0;
echo('var captPieces = [[');
while($row=mysqli_fetch_array($f, MYSQLI_ASSOC)){
	if(false !== stripos($row['curColor'], 'white'))
		$c++;
	if($c==1){
		echo"], [";
		$d = 0;
	}
	if($d > 0)
		echo ', ';
	$d++;
	if($row['replaced'] == '')
		$row['replaced'] = 'pawn';

	echo "'".$row['replaced']."'";

} // End while

echo "]];\n";

?>
