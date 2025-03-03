-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: valorantlol
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lft_submissions`
--

DROP TABLE IF EXISTS `lft_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lft_submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lft_submissions`
--

LOCK TABLES `lft_submissions` WRITE;
/*!40000 ALTER TABLE `lft_submissions` DISABLE KEYS */;
INSERT INTO `lft_submissions` VALUES (1,'Player1','Valorant','Diamond','Looking for a serious team to play competitive matches.','username1','2024-04-03 10:28:02'),(2,'Player2','League of Legends','Platinum','Experienced player seeking a team for ranked play.','username2','2024-04-03 10:28:02'),(3,'Player3','Valorant','Gold','Flexible player looking for a team to improve and play tournaments.','username3','2024-04-03 10:28:02'),(4,'Kyle','Valorant','Radiant','LFT','kanulare','2024-04-03 10:44:12'),(5,'Kyle','Valorant','Radiant','LFBETTER TEAM','kanulare','2024-04-03 10:44:26'),(6,'Brandon','Valorant','0','LFT','brandonanulare','2024-04-03 10:53:54'),(7,'Brandon','Valorant','0','LFT\r\n','brandonanulare','2024-04-03 10:54:02'),(8,'Kyle','Valorant','0','asasa','anulareb','2024-04-17 15:43:21');
/*!40000 ALTER TABLE `lft_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lol_players`
--

DROP TABLE IF EXISTS `lol_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lol_players` (
  `player_id` int NOT NULL AUTO_INCREMENT,
  `player_name` varchar(255) NOT NULL,
  `team_id` int DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `KDA` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `lol_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `lol_teams` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lol_players`
--

LOCK TABLES `lol_players` WRITE;
/*!40000 ALTER TABLE `lol_players` DISABLE KEYS */;
INSERT INTO `lol_players` VALUES (1,'Kitzuo',1,'Jungle',4.43),(2,'TC porsche',1,'Top',3.40),(3,'Shogolol',1,'Bottom',6.00),(4,'RobbyBob',1,'Middle',5.67),(5,'Chookies',1,'Support',5.45),(6,'rockonhi5',2,'Middle',2.64),(7,'Cell',2,'Support',2.87),(8,'belveths boytoy',2,'Top',2.19),(9,'Oronuke123',2,'Jungle',3.60),(10,'Gristlestick',2,'Bottom',2.91),(11,'ZKG',3,'Top',4.43),(12,'haebaragi',3,'Middle',0.00),(13,'GunasoFan',3,'Support',9.25),(14,'Paralysis',3,'Jungle',0.00),(15,'CrabAppleBoy',3,'Bottom',4.00),(16,'Jraff',4,'Bottom',4.09),(17,'Dasori',4,'Top',3.71),(18,'Good Sir',4,'Middle',4.78),(19,'TreeKangar00',4,'Support',4.95),(20,'YoojungHukiriLee',4,'Jungle',4.60),(21,'HimboToe11',5,'Jungle',1.65),(22,'Eita Izumi',5,'Support',4.22),(23,'rege',5,'Middle',3.18),(24,'Blamed One',5,'Bottom',4.88),(25,'Swaggy',5,'Top',3.14),(26,'Jourien',6,'Middle',2.31),(27,'Bongington City',6,'Jungle',2.61),(28,'Will Yuubee Mine',6,'Support',2.50),(29,'Volte',6,'Bottom',2.74),(30,'Notzu',6,'Top',2.04),(31,'BobChuckyJoe',7,'Top',3.21),(32,'CRY NOW',7,'Middle',2.00),(33,'Vamp kid',7,'Support',2.56),(34,'playernumber6',7,'Jungle',2.50),(35,'YellowBumbleBee',7,'Bottom',3.00),(36,'UF Fyrat',8,'Top',4.22),(37,'UF Hao',8,'Middle',4.50),(38,'UF Trollzelda',8,'Support',2.05),(39,'SHOP MRBEAST',8,'Jungle',4.40),(40,'UF Reaper',8,'Bottom',3.41),(41,'Arsenals',9,'Top',2.59),(42,'Lil Nate',9,'Middle',3.46),(43,'PuertoJew',9,'Bottom',3.50),(44,'Flick',9,'Jungle',3.60),(45,'Rainy',9,'Support',3.26),(46,'MatchesAL',10,'Middle',3.45),(47,'Senor Ice',10,'Top',4.15),(48,'I Know Who',10,'Support',3.29),(49,'50cal Taco',10,'Jungle',0.00),(50,'LFT Vertigo',10,'Bottom',3.75);
/*!40000 ALTER TABLE `lol_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lol_teams`
--

DROP TABLE IF EXISTS `lol_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lol_teams` (
  `team_id` int NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  `overall_rank` int DEFAULT NULL,
  `team_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lol_teams`
--

LOCK TABLES `lol_teams` WRITE;
/*!40000 ALTER TABLE `lol_teams` DISABLE KEYS */;
INSERT INTO `lol_teams` VALUES (1,'UST Esports',1,'ustesports_logo.jpg'),(2,'Florida State Esports Garnet',2,NULL),(3,'Winthrop University',3,'winthrop_logo.jpg'),(4,'University of Texas at Dallas',4,'unitexasatdallas_logo.jpg'),(5,'VESPA',5,'vespa_logo.jpg'),(6,'UCF Knights',6,NULL),(7,'Longhorn Gaming Premier',7,NULL),(8,'GatorLOL',8,'gatorlol_logo.jpg'),(9,'UNT Esports',9,NULL),(10,'ETSU Esports',10,NULL),(11,'FIU Esports',11,NULL),(12,'UGA Black',12,NULL),(13,'High Point Purple',13,NULL),(14,'Auburn Esports Navy',14,NULL),(15,'University of Alabama Crimson',15,NULL),(16,'LoL esports at NC State',16,NULL),(17,'University of North Carolina at Chapel Hill',17,NULL),(18,'Texas A&M Team Maroon',18,NULL),(19,'UT Arlington',19,NULL),(20,'Virginia Cavaliers',20,NULL),(21,'University of Miami UMEsports',21,NULL),(22,'USF Gold',22,NULL),(23,'UTK Volunteers',23,NULL),(24,'Vanderbilt Commodores',24,NULL),(25,'GT Esports',25,NULL),(26,'SMU Mustangs',26,NULL),(27,'Oklahoma Christian Esports',27,NULL),(28,'Dukes',28,NULL),(29,'Clemson Orange',29,NULL),(30,'Georgia State University',30,NULL),(31,'Greenwave Esports',31,NULL),(32,'Roanoke College Esports',32,NULL),(33,'VSU Esports',33,NULL),(34,'New Orleans Esports',34,NULL),(35,'Sewanee PNG',35,NULL),(36,'OU Crimson',36,NULL),(37,'William & Mary Esports',37,NULL),(38,'SWOSU Bulldogs',38,NULL),(39,'Tech Esports',39,NULL),(40,'Niner Esports',40,NULL);
/*!40000 ALTER TABLE `lol_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `recipient_id` int NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `recipient_id` (`recipient_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`users_id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (6,1,2,'Hello, how are you?','2024-04-17 17:47:15',0),(7,3,1,'I\'m fine, thank you!','2024-04-17 17:47:15',0),(8,2,3,'Would you like to play a game?','2024-04-17 17:47:15',0),(10,2,2,'asas','2024-04-17 17:51:08',0),(11,2,3,'asas','2024-04-17 17:52:54',0),(12,2,2,'Test','2024-04-29 17:15:54',0),(13,2,2,'test2','2024-04-29 17:51:56',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `profiles_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `bio` text,
  `description` text,
  `profile_pic_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`profiles_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,'Some bio text','Some description text','https://example.com/profile_pic.jpg'),(2,2,'asas','asas','asas');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `users_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'testuser','test@example.com','password','2024-03-20 15:44:52'),(2,'anulareb','anulareb@tiffin.edu','$2y$10$FCOZIliq9W38p1hBcZ1hie6sludSy77jP1GkDDeXwxGhL.7VSkLDy','2024-03-20 16:50:08'),(3,'kanulare','kanulare@icloud.com','$2y$10$ULFSP3A6AUX0Fj4Z8q031u9byPLpVgtqFCuxlO1e0fRMZH.aPJkqG','2024-04-03 07:28:07'),(4,'brandonanulare','brandonanulare@tiffin.edu','$2y$10$rxstmENx29BWzmaHicpjDu79Vd18s3429P8KyAlT2e9JdXIrU7xcu','2024-04-03 10:49:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `val_players`
--

DROP TABLE IF EXISTS `val_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `val_players` (
  `player_id` int NOT NULL AUTO_INCREMENT,
  `player_name` varchar(255) NOT NULL,
  `team_id` int DEFAULT NULL,
  `adr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `val_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `val_teams` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `val_players`
--

LOCK TABLES `val_players` WRITE;
/*!40000 ALTER TABLE `val_players` DISABLE KEYS */;
INSERT INTO `val_players` VALUES (1,'dip',1,'172.7'),(2,'Ali',1,'139.4'),(3,'benjii',1,'129.3'),(4,'Logan',1,'159.8'),(5,'Drakious',1,'0'),(6,'kyu',2,'171.7'),(7,'sSef',2,'125'),(8,'geeza',2,'156'),(9,'Instxnct',2,'155.1'),(10,'smiley',2,'126'),(11,'toozy',3,'129.1'),(12,'VYX',3,'121.4'),(13,'Pa1nt',3,'186.5'),(14,'chloric',3,'115.5'),(15,'neptune',3,'154.9'),(16,'mikeE',4,'160.8'),(17,'Okeanos',4,'162.5'),(18,'monSi',4,'126.5'),(19,'Teague',4,'122.9'),(20,'Spaz',4,'116.6'),(21,'S1ay3rr',5,'128.1'),(22,'glo',5,'143.7'),(23,'kaho',5,'148.6'),(24,'Cain',5,'134'),(25,'stew',5,'128.3'),(26,'John Ham',6,'136.3'),(27,'cawn',6,'146.7'),(28,'yhury',6,'132.7'),(29,'Cade3k',6,'179.4'),(30,'Kehem',6,'121.4'),(31,'JoBa',7,'149.7'),(32,'Bing Chilling',7,'117.1'),(33,'austifrosti',7,'162.7'),(34,'Nabber',7,'144.2'),(35,'NXBLE',7,'139.4'),(36,'Jey',8,'94.4'),(37,'W1',8,'139.9'),(38,'Xuto',8,'148.2'),(39,'SAYLED',8,'144.3'),(40,'fabiziN',8,'149.5'),(41,'Chrome',9,'158.3'),(42,'frost',9,'101.6'),(43,'Wick',9,'123.7'),(44,'tsalad',9,'116.8'),(45,'Melvin',9,'175.2'),(46,'seyq',10,'107.5'),(47,'nate',10,'129.1'),(48,'Tiger',10,'120.3'),(49,'Xhowi',10,'141.2'),(50,'GLYPH',10,'142.8');
/*!40000 ALTER TABLE `val_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `val_teams`
--

DROP TABLE IF EXISTS `val_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `val_teams` (
  `team_id` int NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  `overall_rank` int DEFAULT NULL,
  `team_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `val_teams`
--

LOCK TABLES `val_teams` WRITE;
/*!40000 ALTER TABLE `val_teams` DISABLE KEYS */;
INSERT INTO `val_teams` VALUES (1,'NorthWood University',1,'northwood_logo.jpg'),(2,'St. Clair Saints',2,'stclair_logo.jpg'),(3,'Fisher Navy',3,'fisher_logo.jpg'),(4,'Blinn Esports',4,'blinn_logo.jpg'),(5,'SFU Pink',5,NULL),(6,'SJSU Blue',6,'sjsu_logo.jpg'),(7,'TAMU Maroon',7,'tamu_logo.jpg'),(8,'Zen Esports',8,NULL),(9,'Demigods @ UCSD',9,'demigods_logo.jpg'),(10,'UST Esports',10,NULL),(11,'Mizzou Esports',11,NULL),(12,'UCF Gold',12,NULL),(13,'Winthrop University',13,NULL),(14,'FIU Varsity',14,NULL),(15,'UBC Esports',15,NULL),(16,'UCR Blue',16,NULL),(17,'Stony Brook Red',17,NULL),(18,'MBU Spartans',18,NULL),(19,'Ottawa Braves',19,NULL),(20,'CPP Black',20,NULL),(21,'Maryville University',21,NULL),(22,'Scarlet Knights Black',22,NULL),(23,'IVC Blue',23,NULL),(24,'UWaterloo Gold',24,NULL),(25,'SDSU Black',25,NULL),(26,'Akron Esports',26,NULL),(27,'UCSC Gold',27,NULL),(28,'Fisher White',28,NULL),(29,'uOttawa Garnet',29,NULL),(30,'CGC UIC',30,NULL),(31,'UCF Knights',31,NULL),(32,'ASU Maroon',32,NULL),(33,'UL eSports',33,NULL),(34,'TUD Apes',34,NULL),(35,'Carleton Ravens',35,NULL),(36,'UH Premiere',36,NULL),(37,'UTM White',37,NULL),(38,'Converse NBG',38,NULL),(39,'TAMU White',39,NULL),(40,'UAESA Green',40,NULL);
/*!40000 ALTER TABLE `val_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'valorantlol'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-03 17:51:02
