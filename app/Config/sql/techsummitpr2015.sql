-- MySQL dump 10.13  Distrib 5.6.15, for Win32 (x86)
--
-- Host: localhost    Database: techsummitpr2015
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `agencies`
--

DROP TABLE IF EXISTS `agencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agencies` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int(9) DEFAULT NULL,
  `icon_url` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencies`
--

LOCK TABLES `agencies` WRITE;
/*!40000 ALTER TABLE `agencies` DISABLE KEYS */;
INSERT INTO `agencies` VALUES (2,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (3,'DTOP','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (4,'HaciendaPR','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (5,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (6,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (7,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (8,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (9,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');
INSERT INTO `agencies` VALUES (10,'ASUME','Administración para el Sustento de Menores',NULL,'http://www2.pr.gov/Directorios/PublishingImages/ASUME_FAMILIA.jpg','2015-05-13 13:15:17','2015-05-13 13:15:17');

/*!40000 ALTER TABLE `agencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fields` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rule` varchar(40) DEFAULT NULL,
  `message` varchar(240) DEFAULT NULL,
  `required` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fields`
--

LOCK TABLES `fields` WRITE;
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(18) DEFAULT NULL,
  `skype_username` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (19,1,'Developer','Lopez Landron #1550','San Juan','','US','00911','gabriel-figueroa','2015-01-21 01:51:45','2015-01-21 02:08:00');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(240) NOT NULL,
  `value` varchar(240) NOT NULL,
  `description` varchar(240) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `protected` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `maidens_name` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `email_token` varchar(20) DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_corporate` varchar(30) DEFAULT NULL,
  `phone_personal` varchar(30) DEFAULT NULL,
  `fax_number` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `locked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gabriel','Figueroa','Galende','gabriel.figueroa@gb-advisors.com',NULL,NULL,NULL,'gabriel','954207f3a29364e6d079a62d46c04d764e5ec7fc','7873615255','7873615253','7873615254','2013-01-06 22:31:38','2015-05-13 12:23:25','2015-05-13 12:23:25',1,0),(162,'Marco','Kowalski','','marco.kowalski@gb-advisors.com',NULL,NULL,NULL,'marco.kowalski@gb-advisors.com','df9875d6e9d1102ef6d54384f92f21cf6dfa1880',NULL,NULL,NULL,'2015-01-21 04:33:19','2015-01-21 04:33:19',NULL,1,0),(172,'Digicel','LLC','','digicel@gb-advisors.com',NULL,NULL,NULL,'digicel@gb-advisors.com','df9875d6e9d1102ef6d54384f92f21cf6dfa1880',NULL,NULL,NULL,'2015-01-21 18:02:13','2015-01-21 18:02:13',NULL,1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-13 13:15:58
