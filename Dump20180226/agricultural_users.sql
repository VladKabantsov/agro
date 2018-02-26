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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_shop_id_foreign_idx` (`role`),
  CONSTRAINT `users_shop_id_foreign` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'Alex','alex@gmail.com','412',2,1,NULL,NULL,'MIYePPVWe1Ph1uYZJJZuCUIpXsmcOqmQ7AB48V7Ym7WioWmmk1KkmxJbDq3J'),(18,'Жека','djeki@gmail.com','123123',3,0,'2018-02-05 13:12:21','2018-02-05 13:12:21',NULL),(20,'Vadik','kabantsovlad@gmail.com','123123',1,0,'2018-02-07 03:52:33','2018-02-07 03:52:33',NULL),(21,'Maria','marimi@gmail.com','$2y$10$rEwpHgfRP.ijr2dvG/D9Iebm.NkyeAHAx6SZmWzcJ5s4YgoqSNDCW',3,0,'2018-02-07 04:19:45','2018-02-07 04:19:45','WvD3aKQkEUCCQidIHORI9pMduLuGOnNbMuddzUhfEjBjtJcX5Bq3qj6TnAKf'),(22,'Vlad','vlad@gmail.com','$2y$10$AxyJrm1WWBYmY.w8hCQxQu8vp9jooD8ua7qchlMmbZ3DLAFt1xmWC',1,0,NULL,NULL,'3mUE1CwLC3yZkrCkoL6R1Nk1wFyCsQwRuw22tEeqsuaLDXezePplL3nv1rcg'),(23,'yura','yura@gmail.com','$2y$10$hEky.dZ.Xe6p2k.3j09NJuBLWlWdgY9Zm9/H3kd6cWeXMt1MDkaVu',2,0,'2018-02-08 12:50:07','2018-02-08 12:50:07',NULL);
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

-- Dump completed on 2018-02-26 13:00:08
