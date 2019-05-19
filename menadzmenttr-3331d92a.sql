-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: shareddb-h.hosting.stackcp.net    Database: menadzmenttr-3331d92a
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `test` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Vest',0,'',0,''),(2,'Obavestenje',0,'',0,''),(9,'Test_Kategorija_1',0,'',0,''),(10,'Test_Kategorija_2',0,'',0,'');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `edited` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `edit_backup` text NOT NULL,
  `post_file` varchar(255) NOT NULL,
  `created_at` text NOT NULL,
  `deleted_at` text NOT NULL,
  `edited_at` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,1,0,0,0,'Post 1','Post-1','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda tenetur nisi soluta, totam pariatur quaerat deserunt odit ullam, unde nobis itaque recusandae rerum neque! Quasi eos, enim accusamus unde veniam nesciunt quae modi vel quidem maiores, debitis animi, in libero.</p>','','','17-06-2018 15:44:52','',''),(45,0,1,0,0,0,'Rezultati 72. kolokvijuma','Rezultati-72-kolokvijuma','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">Header 1</th>\r\n			<th scope=\"col\">Header 2</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Text11</td>\r\n			<td>Text12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Text21</td>\r\n			<td>Text22</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=_XspQUK22-U\" target=\"_blank\">Skini odje.</a></p>\r\n\r\n<p>&nbsp;</p>','','','18-06-2018 00:12:17','',''),(46,1,1,0,0,0,'Test','Test','<p>Test</p>','','','18-06-2018 11:02:32','',''),(61,2,1,0,0,0,'Raspored ispita I Smena','Raspored-ispita-I-Smena','<p>Prva smena</p>','','I smena - raspored.pdf','19-06-2018 23:17:24','',''),(82,2,1,0,0,0,'Admin','Admin','<p>Admin</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>das</td>\r\n			<td>dsa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asd</td>\r\n			<td>dsa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dsa</td>\r\n			<td>dsa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>','','','29-06-2018 09:42:13','',''),(86,2,1,0,0,0,'1','1','<p>1</p>','','','03-07-2018 16:22:09','',''),(87,1,1,0,0,0,'MTR - materijal sa vezbi - AHP','MTR-materijal-sa-vezbi-AHP','<p>U prilogu je prezentacija iz AHP-a.</p>','','AHP_prezentacija.pdf','03-07-2018 16:22:14','',''),(88,2,1,0,0,0,'MTR - Raspored za drugu radionicu','MTR-Raspored-za-drugu-radionicu','<p>Obave&scaron;tavaju se studenti da je raspored polaganja za drugu radionicu isti kao i za prvu. Raspored&nbsp;<strong>OSTAJE NEPROMENJEN.</strong></p>\r\n\r\n<p>Studenti koji rade radionicu u terminu sreda 8.15-10.00 radionicu rade u sali B009 umesno u sali B103.</p>','','','03-07-2018 16:22:17','',''),(89,2,1,0,0,0,'MTR - Rezultati i uvid II kolokvijuma - obaveštenje','MTR-Rezultati-i-uvid-II-kolokvijuma-obaveštenje','<p>Rezultati drugog kolokvijuma iz Menadžmenta tehnologije i razvoja, održanog 4.6.2018. bi?e objavljeni na sajtu u utorak, 5.6.2018.</p>\r\n\r\n<p>Uvid u radove bi?e organizovan u kabinetu 301C u sredu, 6.6.2018. prema slede?oj satnici:</p>\r\n\r\n<ul>\r\n	<li>I smena u 8.00</li>\r\n	<li>II smena u 8.45</li>\r\n</ul>','','','03-07-2018 16:22:22','',''),(90,1,1,0,0,0,'MTR - rezultati II kolokvijuma','MTR-rezultati-II-kolokvijuma','<p>U prilogu su rezultati II kolokvijuma iz Menadžmenta tehnologije i razvoja.</p>\r\n\r\n<p>Uvid u radove ?e se obaviti u sredu, 6.6.2018, u kabinetu 301C prema slede?em rasporedu:</p>\r\n\r\n<ul>\r\n	<li>U 8h studenti koji su polagali kolokvijum u I smeni (prva i druga grupa)</li>\r\n	<li>U 8.45h studenti koji su polagali kolokvijum u II smeni (tre?a i ?etvrta grupa)</li>\r\n</ul>\r\n\r\n<p>NAPOMENA: Neophodno je da na uvidu studenti znaju grupu koju su radili na kolokvijumu.</p>','','MTR - rezultati II kolokvijuma.pdf','03-07-2018 16:22:27','',''),(91,2,1,0,0,0,'MTR - Obavestenje o rezultatima junskog ispitnog roka','MTR-Obavestenje-o-rezultatima-junskog-ispitnog-roka','<p>Rezultati iz predmeta Menadžment tehnologije i razvoja iz junskog ispitnog roka bi?e objavljeni na sajtu predmeta do kraja nedelje.</p>\r\n\r\n<p>Uvid u radove i upis ocena je planiran za sredu, 27.6.2018. Detaljnije informacije oko uvida u radove i upisa ocena bi?e naknadno objavljene.</p>','','','03-07-2018 16:22:32','',''),(92,1,1,0,0,0,'Raspored polaganja ispita u julskom ispitnom roku','Raspored-polaganja-ispita-u-julskom-ispitnom-roku','<p>U prilogu se nalazi raspored polaganja ispita u julskom ispitnom roku. Ispit se održava 9. jula u 9 ?asova.</p>\r\n\r\n<p>Studenti su u obavezi da na ispitu imaju&nbsp;<strong>indeks kao sredstvo identifikacije (ne li?nu kartu)&nbsp;</strong>i da se pona&scaron;aju (i obla?e) u skladu sa&nbsp;<a href=\"http://mtr.fon.bg.ac.rs/attachments/article/416/Kodeks%20ponasanja.pdf\">Kodeksom pona&scaron;anja, komunikacije i obla?enja studenata.</a></p>','','Raspored polaganja.pdf','03-07-2018 16:22:36','',''),(93,2,1,0,0,0,'MTR - Obavestenje o rezultatima julskog ispitnog roka','MTR-Obavestenje-o-rezultatima-julskog-ispitnog-roka','<p>Rezultati iz predmeta Menadžment tehnologije i razvoja u julskom ispitnom roku bi?e objavljeni na sajtu predmeta najkasnije u sredu, 11.7.</p>\r\n\r\n<p>Uvid u radove i upis ocena je planiran za ?etvrtak, 11.7.2018. Detaljnije informacije oko uvida u radove i upisa ocena bi?e naknadno objavljene.</p>','','','03-07-2018 16:22:47','','');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'GaGiiiii','3648c0d80738cab361975162cfa5e8da');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'menadzmenttr-3331d92a'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-16 18:21:33
