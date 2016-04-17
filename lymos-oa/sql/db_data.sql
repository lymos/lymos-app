-- MySQL dump 10.13  Distrib 5.7.11, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: lymos_oa
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `oa_menu`
--

DROP TABLE IF EXISTS `oa_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oa_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'menu id',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT 'menu name',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'parent menu id',
  `added_time` int(11) NOT NULL DEFAULT '0' COMMENT 'added time',
  PRIMARY KEY (`menu_id`),
  UNIQUE KEY `name` (`name`),
  KEY `i_name` (`name`),
  KEY `i_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='menu table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oa_menu`
--

LOCK TABLES `oa_menu` WRITE;
/*!40000 ALTER TABLE `oa_menu` DISABLE KEYS */;
INSERT INTO `oa_menu` VALUES (1,'menu2',0,0),(2,'menu2-child',1,0),(3,'menu34',0,0),(4,'menu3333',0,0),(5,'menu8',0,0);
/*!40000 ALTER TABLE `oa_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-17 23:31:40
