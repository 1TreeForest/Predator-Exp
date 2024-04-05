-- MariaDB dump 10.19  Distrib 10.5.21-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: chess
-- ------------------------------------------------------
-- Server version	10.5.21-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `communication`
--

DROP TABLE IF EXISTS `communication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `communication` (
  `commID` smallint(6) NOT NULL AUTO_INCREMENT,
  `gameID` smallint(6) DEFAULT NULL,
  `fromID` mediumint(9) DEFAULT NULL,
  `toID` mediumint(9) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `postDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expireDate` datetime DEFAULT '0000-00-00 00:00:00',
  `ack` tinyint(4) DEFAULT 0,
  `commType` smallint(6) DEFAULT 0,
  PRIMARY KEY (`commID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communication`
--

LOCK TABLES `communication` WRITE;
/*!40000 ALTER TABLE `communication` DISABLE KEYS */;
/*!40000 ALTER TABLE `communication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `gameID` smallint(6) NOT NULL AUTO_INCREMENT,
  `whitePlayer` mediumint(9) NOT NULL,
  `blackPlayer` mediumint(9) NOT NULL,
  `gameMessage` enum('','playerInvited','inviteDeclined','draw','playerResigned','checkMate') DEFAULT NULL,
  `messageFrom` enum('','black','white') DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `lastMove` datetime NOT NULL,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,1,2,'','','2024-02-01 20:02:20','2024-02-01 20:02:44');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `timeOfMove` datetime NOT NULL,
  `gameID` smallint(6) NOT NULL,
  `curPiece` enum('pawn','bishop','knight','rook','queen','king') NOT NULL,
  `curColor` enum('white','black') NOT NULL,
  `fromRow` smallint(6) NOT NULL,
  `fromCol` smallint(6) NOT NULL,
  `toRow` smallint(6) NOT NULL,
  `toCol` smallint(6) NOT NULL,
  `replaced` enum('pawn','bishop','knight','rook','queen','king') DEFAULT NULL,
  `promotedTo` enum('pawn','bishop','knight','rook','queen','king') DEFAULT NULL,
  `isInCheck` tinyint(1) NOT NULL,
  PRIMARY KEY (`timeOfMove`,`gameID`),
  KEY `idx_gameID` (`gameID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `msgID` int(11) NOT NULL AUTO_INCREMENT,
  `gameID` smallint(6) NOT NULL,
  `msgType` enum('undo','draw') NOT NULL,
  `msgStatus` enum('request','approved','denied') NOT NULL,
  `destination` enum('black','white') NOT NULL,
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pieces` (
  `gameID` smallint(6) NOT NULL,
  `color` enum('white','black') NOT NULL,
  `piece` enum('pawn','rook','knight','bishop','queen','king') NOT NULL,
  `col` smallint(6) NOT NULL,
  `row` smallint(6) NOT NULL,
  KEY `idx_gameID` (`gameID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pieces`
--

LOCK TABLES `pieces` WRITE;
/*!40000 ALTER TABLE `pieces` DISABLE KEYS */;
INSERT INTO `pieces` VALUES (1,'white','rook',0,0),(1,'white','knight',1,0),(1,'white','bishop',2,0),(1,'white','queen',3,0),(1,'white','king',4,0),(1,'white','bishop',5,0),(1,'white','knight',6,0),(1,'white','rook',7,0),(1,'white','pawn',0,1),(1,'white','pawn',1,1),(1,'white','pawn',2,1),(1,'white','pawn',3,1),(1,'white','pawn',4,1),(1,'white','pawn',5,1),(1,'white','pawn',6,1),(1,'white','pawn',7,1),(1,'black','pawn',0,6),(1,'black','pawn',1,6),(1,'black','pawn',2,6),(1,'black','pawn',3,6),(1,'black','pawn',4,6),(1,'black','pawn',5,6),(1,'black','pawn',6,6),(1,'black','pawn',7,6),(1,'black','rook',0,7),(1,'black','knight',1,7),(1,'black','bishop',2,7),(1,'black','queen',3,7),(1,'black','king',4,7),(1,'black','bishop',5,7),(1,'black','knight',6,7),(1,'black','rook',7,7);
/*!40000 ALTER TABLE `pieces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `playerID` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(60) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `nick` varchar(64) NOT NULL,
  `userlevel` tinyint(1) NOT NULL DEFAULT 1,
  `lastAccess` datetime DEFAULT NULL,
  PRIMARY KEY (`playerID`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'$2y$10$QRl6710PPriAYnEzNK41neBvF.4a2XifQnFBwudAVsBnHYxQqoCp.','player','player','player',1,NULL),(2,'$2y$10$jBIq/q6EqDqKEiDayE.0bO6WkOpIVEFQfKtjNDZwL6yEyi8d3Ye5a','player2','player2','player2',1,NULL);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferences` (
  `playerID` int(11) NOT NULL,
  `preference` char(20) NOT NULL,
  `value` char(50) DEFAULT NULL,
  PRIMARY KEY (`playerID`,`preference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES (1,'autoreload','10'),(1,'emailnotification',''),(1,'history','pgn'),(1,'historylayout','columns'),(1,'replayall','false'),(1,'theme','gnuchess_simple'),(2,'autoreload','10'),(2,'emailnotification',''),(2,'history','pgn'),(2,'historylayout','columns'),(2,'replayall','false'),(2,'theme','gnuchess_simple');
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-01 20:06:59