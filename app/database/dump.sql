-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: stickerworld_db
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `lng` decimal(10,6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'Sporerfurt','863-494-7284x61324','51657 Kreiger Valley Apt. 234\nMckaylaton, MO 28423',-17.385718,-98.920690,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(2,'North Chyna','921.068.6318x29038','22623 Raegan Prairie\nAugustinetown, LA 64410',-21.139234,-20.660570,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(3,'East Isai','(003)420-9408x8936','73647 Kovacek Branch\nPercivalfurt, WA 81452-1579',-62.520016,-20.427469,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(4,'Lake Eveline','1-070-239-0003x2866','6638 Christop Forest Suite 027\nLake Harrisonton, ME 58906-1273',88.000359,-77.298636,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(5,'Selmerside','832.046.5543x8112','788 Quigley Island Apt. 993\nWest Carmela, WA 96226',-63.024567,88.162626,'2015-06-23 10:07:14','2015-06-23 10:07:14','A');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Accounting','2015-06-23 10:07:14','2015-06-23 10:07:14'),(2,'Sales','2015-06-23 10:07:14','2015-06-23 10:07:14'),(3,'IT & Design','2015-06-23 10:07:14','2015-06-23 10:07:14'),(4,'Production','2015-06-23 10:07:14','2015-06-23 10:07:14'),(5,'Logistics','2015-06-23 10:07:14','2015-06-23 10:07:14');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `br_id` int(10) unsigned NOT NULL,
  `dept_id` int(10) unsigned NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `employees_user_id_index` (`user_id`),
  KEY `employees_br_id_index` (`br_id`),
  KEY `employees_dept_id_index` (`dept_id`),
  CONSTRAINT `employees_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `employees_br_id_foreign` FOREIGN KEY (`br_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_03_24_223040_create_roles_table',1),('2015_03_24_223101_create_users_table',1),('2015_06_11_173550_add_pic_path_to_user_table',1),('2015_06_17_170554_create_branches_table',1),('2015_06_22_215515_create_departments_table',1),('2015_06_23_045938_create_employees_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'Accountant'),(1,'Admin'),(3,'Estimator'),(2,'Moderator');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pic_path` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2y$10$SYK2cVhjBBuddML8xxgUOe4w/3pFzvjZ.g0t9ZzII3TUjYci4FyHq','admin@gmail.com',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(2,2,'webster.hudson','1234','qmacejkovic@corkery.info',NULL,NULL,NULL,'qtjI1LsqAgBXtjnByEDH','2015-06-23 10:07:14','2015-06-23 10:07:14','I'),(3,4,'lueilwitz.alexandra','1234','abner73@homenick.com',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(4,1,'florence25','1234','kertzmann.hector@kessler.biz',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(5,4,'susana.schulist','1234','hprohaska@jast.com',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(6,3,'jerald.pouros','1234','ankunding.bulah@metz.com',NULL,NULL,NULL,'njEwWA43gLAGJBHzVqTs','2015-06-23 10:07:14','2015-06-23 10:07:14','I'),(7,1,'anderson.grant','1234','vzemlak@glover.com',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(8,4,'shirley42','1234','frieda.runte@upton.com',NULL,NULL,NULL,NULL,'2015-06-23 10:07:14','2015-06-23 10:07:14','A'),(9,4,'xlakin','1234','kaylee44@reichert.org',NULL,NULL,NULL,'GvyrvLisKc14RlQmIcE5','2015-06-23 10:07:14','2015-06-23 10:07:14','I'),(10,3,'enoch48','1234','qschulist@hotmail.com',NULL,NULL,NULL,'u1j1YtXDJNptT8diXYOJ','2015-06-23 10:07:14','2015-06-23 10:07:14','I'),(11,2,'volkman.foster','1234','izaiah41@marks.com',NULL,NULL,NULL,'upLk66KjMn5sa34KANyz','2015-06-23 10:07:14','2015-06-23 10:07:14','I');
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

-- Dump completed on 2015-06-23 18:07:35
