-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: agricultural
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` int(11) DEFAULT NULL,
  `g_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `categories_id` int(10) unsigned NOT NULL,
  `manfac_id` int(10) unsigned NOT NULL,
  `measure_id` int(10) unsigned NOT NULL,
  `subcategories_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price_purchase` int(10) unsigned NOT NULL,
  `revenue` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_categories_id_foreign` (`categories_id`),
  KEY `goods_manfac_id_foreign` (`manfac_id`),
  KEY `goods_measure_id_foreign` (`measure_id`),
  CONSTRAINT `goods_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `goods_manfac_id_foreign` FOREIGN KEY (`manfac_id`) REFERENCES `manufacturers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `goods_measure_id_foreign` FOREIGN KEY (`measure_id`) REFERENCES `measures` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,21432,'as',85,'afsbnn',2,2,1,7,6,150,0),(2,21432,'sd',29,'afsbnn',2,2,1,7,0,20,0),(3,21432,'qw',78,'afsbnn',2,2,1,7,50,55,0),(4,21432,'we',88,'afsbnn',2,2,1,7,10,60,0),(5,21432,'asfe',67,'afsbnn',2,2,1,7,300,50,0),(32,21432,'er',23,'afsbnn',2,2,1,7,12,12,0),(36,21432,'df',12,'afsbnn',2,2,1,7,15,2,0),(37,21432,'rf',43,'afsbnn',2,2,1,7,12,20,0);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-26 13:00:07
