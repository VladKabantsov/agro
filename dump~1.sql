-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: testLara
-- ------------------------------------------------------
-- Server version	5.7.19

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
  `cat_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Родентициди'),(2,'Інсектициди');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` int(10) unsigned NOT NULL,
  `categories_id` int(10) unsigned NOT NULL,
  `manfac_id` int(10) unsigned NOT NULL,
  `measure_id` int(10) unsigned NOT NULL,
  `g_name` varchar(60) NOT NULL,
  `rec_price` int(10) unsigned DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `log_date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `price1` int(10) unsigned NOT NULL,
  `price2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,15,'2018-01-02 08:32:52',1,470,900),(2,2,5,'2018-01-02 08:34:58',1,55,300);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manfac_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturers`
--

LOCK TABLES `manufacturers` WRITE;
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;
INSERT INTO `manufacturers` VALUES (1,'Поставщик 1'),(2,'Поставщик 2');
/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `measures`
--

DROP TABLE IF EXISTS `measures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `measures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meas_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measures`
--

LOCK TABLES `measures` WRITE;
/*!40000 ALTER TABLE `measures` DISABLE KEYS */;
INSERT INTO `measures` VALUES (1,'кг'),(2,'л'),(3,'упаковка');
/*!40000 ALTER TABLE `measures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2017_12_30_080427_create_nerds_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `rem_goods` int(10) unsigned NOT NULL COMMENT 'remaining goods',
  `price` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица заказов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,0,10,0,27,'2017-12-31 15:56:58',1),(2,1,0,20,15,40,'2018-12-31 15:57:46',1),(3,2,0,30,25,11,'2017-12-31 15:58:18',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selling_prices`
--

DROP TABLE IF EXISTS `selling_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selling_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL,
  `sprice` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling_prices`
--

LOCK TABLES `selling_prices` WRITE;
/*!40000 ALTER TABLE `selling_prices` DISABLE KEYS */;
INSERT INTO `selling_prices` VALUES (1,1,40,'2017-01-01 10:28:49',1),(2,2,20,'2018-01-01 10:29:33',1),(3,1,60,'2018-01-01 10:29:47',1);
/*!40000 ALTER TABLE `selling_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Daisy Lebsack Jr.','bzemlak@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(2,'Leila Corkery','wkoepp@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(3,'Rhiannon Brekke','esta01@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(4,'Prof. Clementina Fay','harris.alexandrea@example.com','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(5,'Omer Skiles','dach.silas@example.com','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(6,'Eldred McGlynn','jenifer.feest@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(7,'Ernestina Schultz','henriette49@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(8,'Jaylan Yost','verna15@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(9,'Mr. Lawrence Heathcote IV','claudia33@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(10,'George Moen','berge.rudy@example.com','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(11,'Prof. Reuben Witting','vonrueden.michaela@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(12,'Prof. Burley Walter Sr.','hkutch@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(13,'Dr. Mason Streich','rwalsh@example.com','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(14,'Antone Cole','julien.roberts@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(15,'Hardy Spencer','cpadberg@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(16,'Isobel Deckow','tlittel@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(17,'Mabel Aufderhar','mhaag@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(18,'Isobel Block II','mills.jay@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(19,'Zackery Mitchell','lola17@example.org','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(20,'Prof. Kellen VonRueden MD','stefanie.feil@example.net','$2y$10$tzxCVqv5HmOoIe15XfbW3uQwgSWHDh/97/tmbLX9tFqimtfeZTHPi','2018-01-02 15:05:35','2018-01-02 15:05:35'),(21,'test','test@test.com','$2y$10$amv0Nf.JSw9G5gn.OEOveua08qKUUf/ibE/w86FFC5ybuEfKX6unm','2018-01-03 05:13:37','2018-01-03 05:13:37');
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

-- Dump completed on 2018-01-05 12:10:01
