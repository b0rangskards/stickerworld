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
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `lng` decimal(10,6) NOT NULL,
  `recstat` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_name_unique` (`name`),
  UNIQUE KEY `branches_contact_no_unique` (`contact_no`),
  UNIQUE KEY `branches_address_unique` (`address`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'new maddisonberg','(532)064-9656x26702','91853 gertrude curve suite 178 west lolita, ok 53524-3238',-55.178653,-29.847235,'A','2015-08-04 19:10:42','2015-08-04 19:10:42'),(2,'Lake Jessyville','654-770-8095x2466','02862 Fleta Station Suite 010\nWest Edwin, WV 62560',68.305658,17.705316,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(3,'Kobyland','382-948-4126x778','42518 Murray Radial\nWest Venaview, CO 04273',-17.077232,77.194860,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(4,'North Hailie','228-972-2825','9104 Alisa Forks\nSwaniawskishire, LA 36548',9.289504,-172.554897,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(5,'South Simshire','1-604-239-0676x9212','22023 Aglae Haven Suite 814\nNorth Gretchen, NM 28064',-50.189428,-31.971324,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(6,'VonRuedenhaven','844.209.4622x718','3354 Tad Cape Suite 571\nHomenickhaven, KY 02691',56.218233,-67.195929,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(7,'camilafurt','177.948.0284x3695','83931 stuart haven apt. 654 west colleen, md 49983-9139',-3.132632,-156.362299,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(8,'west nettie','(138)159-4414x692','5601 simonis port apt. 156 east theodorebury, nj 21294-4788',-26.898266,-145.207055,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(9,'north marianefort','(808)968-4540','114 evelyn hills hellenfurt, ky 38076',63.325884,130.348202,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(10,'meghanville','1-110-792-0545x954','57740 koelpin street orahaven, dc 60102-4159',-38.528212,159.713559,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(11,'pearlhaven','934.286.7104','719 roy radial east reanna, la 19486',45.754683,28.056240,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(12,'new reta','423-549-3891x60126','672 o\'connell course howefort, mi 66145-4936',43.427826,-103.046976,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(13,'south eveline','(244)315-8020x23046','55568 jimmy walk apt. 308 north colby, nj 77328-7218',21.244444,71.543355,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(14,'south effieborough','+18(3)4279093483','38166 cristina flat east cary, ok 57285',-34.097747,155.692449,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(15,'north jeromy','1-008-153-7703x3420','6731 stanton throughway apt. 245 south jessyca, id 64515',-59.477348,29.541618,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(16,'lake rachelland','1-820-588-2733x9998','6793 gerlach center rubyton, wv 20768',53.207676,54.413750,'A','2015-08-04 19:10:44','2015-08-04 19:10:44'),(17,'baileymouth','1-304-700-2742x20873','95133 emerson lane gibsonton, ma 72013',58.267746,174.558554,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(18,'brakustown','160.338.6567x163','482 paucek plains suite 776 edwardmouth, ak 95664',-38.731929,67.259191,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(19,'new coleman','01913372528','48508 dietrich drives lake elsie, nc 78865',24.994098,-152.205798,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(20,'port juwan','1-059-450-6557x397','7531 beier brooks vontown, mn 89703-7491',14.578289,110.581448,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(21,'shieldsmouth','1-250-077-7057x92820','0165 sidney circles suite 396 west veldashire, ks 70817',20.255332,53.465394,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(22,'lucileville','856.435.9460','5359 kuhn cliffs suite 628 north maud, ct 51555-1849',44.468338,-179.854872,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(23,'new wallace','039.469.5911x586','0294 daniel manor apt. 061 east katarinashire, me 67702-1640',-31.855070,68.728979,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(24,'west donaldfort','(798)128-4943x6688','051 hoeger land suite 148 malachifurt, de 47722-1871',-63.974732,160.767100,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(25,'east stephonport','1-219-736-6517','38295 lemke mill stevieborough, la 15964-5866',-88.358205,127.592101,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(26,'schimmelville','089.669.0540','863 jesse manors new adonis, sd 18347-7303',88.376471,-10.862819,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(27,'west lloyd','569.772.2061','073 gutkowski fork apt. 252 cecilmouth, oh 76634',-79.229328,-71.839886,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(28,'east guillermo','967.581.1971x63468','0556 tillman station west eldon, in 78719-4889',2.481778,-97.757939,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(29,'new berta','02050063316','487 brakus drives suite 327 casperland, wy 21098-2942',-63.052276,92.409534,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(30,'mistybury','710-004-7600x716','67912 prohaska plains flaviomouth, in 61680-5708',-8.997319,-92.436067,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(31,'south celestinestad','684.798.6491x72781','746 conn village suite 252 new myahville, co 31217',-76.853399,168.097706,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(32,'west sincere','(666)793-9697x2362','123 berge road suite 161 port amelietown, fl 38384-3646',11.562544,168.034188,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(33,'west joshuafurt','+46(1)1267615363','41439 makenna overpass suite 373 raleighfort, ne 06944',-11.099789,166.298886,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(34,'treuteltown','836-404-0950x0828','827 hackett circles suite 339 luisaport, nc 59525-8462',-59.961629,-169.991273,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(35,'bruenchester','1-906-743-5468x2585','23522 corkery road brendachester, ny 88937-8418',-83.915324,84.737496,'A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(36,'new lucius','07773873818','115 kailee passage west casey, ct 48908',-66.500112,-131.141048,'A','2015-08-04 19:10:45','2015-08-04 19:10:45');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `br_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_br_id_foreign` (`br_id`),
  CONSTRAINT `clients_br_id_foreign` FOREIGN KEY (`br_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contactable_id` int(10) unsigned NOT NULL,
  `contactable_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,1,'Supplier','131.314.0569','fax'),(2,2,'Supplier','1-259-118-4823x45937','fax'),(3,3,'Supplier','00905794884','fax'),(4,4,'Supplier','805.310.7237','mobile'),(5,5,'Supplier','02958867494','mobile'),(6,6,'Supplier','(159)014-3219x481','landline'),(7,7,'Supplier','352.948.7416x342','mobile'),(8,8,'Supplier','1-854-721-2459','fax'),(9,9,'Supplier','1-392-018-5002x006','landline'),(10,10,'Supplier','281-214-8439x1509','fax');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `departments` VALUES (1,'Accounting','2015-08-04 19:10:44','2015-08-04 19:10:44'),(2,'Sales','2015-08-04 19:10:44','2015-08-04 19:10:44'),(3,'IT & Design','2015-08-04 19:10:44','2015-08-04 19:10:44'),(4,'Production','2015-08-04 19:10:44','2015-08-04 19:10:44'),(5,'Logistics','2015-08-04 19:10:44','2015-08-04 19:10:44');
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
  `br_id` int(10) unsigned NOT NULL,
  `dept_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hired_date` date NOT NULL,
  `terminated_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `employees_br_id_index` (`br_id`),
  KEY `employees_dept_id_index` (`dept_id`),
  KEY `employees_user_id_index` (`user_id`),
  CONSTRAINT `employees_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_br_id_foreign` FOREIGN KEY (`br_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,1,NULL,3,'berenice','yost','west','2009-07-10','female','677 Keven Manors\nLake Aniyafort, AZ 28974','(94) 99954-6418',NULL,'Office Manager','2001-01-06',NULL,'2015-08-04 19:10:42','2015-08-04 19:10:42','A'),(2,7,1,14,'brando','bogisich','heaney','1990-09-13','female','95366 Johanna Isle\nCordiaborough, IL 60694','(94) 99954-6418',NULL,'Office Clerk','1990-07-10',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(3,8,1,15,'hosea','jakubowski','mohr','1982-10-24','female','8035 Ledner Walks Suite 937\nKarleeton, MA 95284','(94) 99954-6418',NULL,'Accountant','1980-09-30',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(4,9,1,16,'antone','stracke','rutherford','1986-11-06','male','1353 Bode Plaza Apt. 261\nMonicastad, NM 88832','(94) 99954-6418',NULL,'Estimator','2015-01-18',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(5,10,1,17,'jadyn','zboncak','bayer','1972-11-24','male','265 Jayce Keys Suite 312\nSouth Kareem, MT 97794-0749','(94) 99954-6418',NULL,'CEO','1995-01-14',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(6,11,2,18,'albert','reinger','schroeder','2010-02-19','female','959 Hershel Mission\nNorth Bettye, SD 56531-6889','(94) 99954-6418',NULL,'Estimator','2015-05-10',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(7,12,2,19,'isaias','carroll','batz','2011-03-12','male','2358 Berge Spurs\nEast Macytown, DE 40683','(94) 99954-6418',NULL,'Accountant','2002-04-20',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(8,13,2,20,'ernest','jerde','feeney','2004-08-05','female','08669 Mante Union Suite 988\nWest Elvatown, NV 80501-0531','(94) 99954-6418',NULL,'Production Worker','1998-08-24',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(9,14,4,21,'shakira','bruen','muller','1975-11-30','female','3483 Kuhic Pine Suite 295\nEast Jonathonmouth, NJ 67126','(94) 99954-6418',NULL,'Office Clerk','2014-01-15',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(10,15,5,22,'trudie','nikolaus','hermann','1990-02-09','female','4798 Orn Circles Suite 969\nDickensburgh, ND 08655','(94) 99954-6418',NULL,'CEO','1976-08-03',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(11,16,3,23,'geraldine','ortiz','conn','1978-05-28','female','68850 Francis Wells\nPort Elyse, NM 34165-9359','(94) 99954-6418',NULL,'Office Clerk','1987-11-29',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','A'),(12,17,5,24,'audra','turcotte','jacobson','1984-07-06','female','97334 Veronica Extensions\nLynchport, MI 28055-2186','(94) 99954-6418',NULL,'Office Clerk','1980-07-23',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(13,18,5,25,'betsy','tremblay','gibson','1996-08-08','female','921 Hipolito Ford Suite 962\nOkunevachester, WY 47258-5540','(94) 99954-6418',NULL,'CEO','1989-07-30',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(14,19,1,26,'celine','lesch','johnston','1975-08-06','male','847 Mueller Crossing\nSouth Mathewburgh, MD 39954-9155','(94) 99954-6418',NULL,'Janitor','1991-07-03',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(15,20,5,27,'julie','metz','sanford','1995-08-22','female','65743 Schinner Square\nPollichborough, UT 88233-7898','(94) 99954-6418',NULL,'CEO','2001-07-23',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(16,21,2,28,'gina','kilback','witting','1979-01-11','male','3846 Cummings Mount Suite 504\nNorth Ottilieberg, AK 05083-3453','(94) 99954-6418',NULL,'Driver','2012-05-11',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(17,22,2,29,'lemuel','wolf','armstrong','2006-04-20','female','62068 Ortiz Overpass\nEstebanberg, WA 10107-0507','(94) 99954-6418',NULL,'Driver','1992-05-04',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(18,23,3,30,'seth','mayer','ledner','1993-02-20','female','768 Claudia Circle\nLucasburgh, GA 35187','(94) 99954-6418',NULL,'Office Clerk','1986-12-31',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(19,24,2,31,'dante','romaguera','carroll','2006-08-04','male','409 Alek Meadow Apt. 693\nPort Carson, NY 58892','(94) 99954-6418',NULL,'Estimator','1985-02-18',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(20,25,3,32,'madison','legros','cummings','2000-05-15','male','544 Hodkiewicz View\nGailchester, MD 07278-5567','(94) 99954-6418',NULL,'CEO','1975-05-23',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(21,26,3,33,'peyton','ratke','wisozk','1971-03-30','female','382 Liliane Spring Apt. 057\nRauborough, CA 53289','(94) 99954-6418',NULL,'Office Manager','1985-01-21',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(22,27,5,NULL,'amalia','jaskolski','lakin','1993-05-10','male','000 Lubowitz Fort Suite 862\nNorth Nicole, ND 37972','(94) 99954-6418',NULL,'Office Clerk','2008-08-13',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(23,28,3,NULL,'wilber','hagenes','boehm','2005-12-21','female','641 Heidenreich Spring\nNorth Jensenton, OK 48267','(94) 99954-6418',NULL,'Janitor','1979-07-29',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(24,29,1,NULL,'jacinto','swaniawski','daugherty','1996-12-16','female','65882 Clarissa Corners Apt. 402\nWest Carleton, CA 44755-0331','(94) 99954-6418',NULL,'Office Manager','1984-11-15',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(25,30,2,NULL,'salvatore','shields','beer','1991-09-22','male','23254 Beth Club Apt. 386\nPort Devonfort, AR 01541-2538','(94) 99954-6418',NULL,'CEO','1985-06-09',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(26,31,2,NULL,'jaycee','gleichner','larkin','1995-09-06','male','835 Dean Mission\nEast Tryciaton, WA 75983-7974','(94) 99954-6418',NULL,'Estimator','1970-10-06',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(27,32,3,NULL,'melvina','rosenbaum','conroy','2013-12-30','female','27143 Alec Burg Apt. 820\nPaucekborough, WY 97642-0036','(94) 99954-6418',NULL,'Estimator','1980-03-31',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(28,33,1,NULL,'bret','wilderman','brakus','1980-12-23','female','1531 Tyshawn Branch Suite 311\nBeahanview, SC 63490','(94) 99954-6418',NULL,'Driver','1990-08-04',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(29,34,3,NULL,'joesph','wiegand','ankunding','1998-12-17','male','90122 Johns Freeway Suite 963\nEarleneshire, VA 25126','(94) 99954-6418',NULL,'Driver','2010-04-05',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(30,35,4,NULL,'jaunita','reynolds','hauck','2008-05-10','male','1458 Ada Forks Apt. 825\nRueckermouth, GA 71122-7902','(94) 99954-6418',NULL,'Janitor','1982-07-05',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A'),(31,36,4,NULL,'sage','mayert','cummerata','1996-05-15','female','62470 Jannie Crossing Suite 725\nBlakefurt, VA 32529-4384','(94) 99954-6418',NULL,'Accountant','2012-10-29',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','A');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unit_of_measure` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sm` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recstat` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `items_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,2,'manley wolff','acrylics','bots',1766.08,NULL,'possimus quo ipsa nihil incidunt et vel.','(700)210-8840x68967',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(2,8,'garnet halvorson sr.','gi sheet','set',540.56,NULL,'enim est fugiat sunt corporis beatae dicta.','gold',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(3,2,'velva herman','paints','roll',1414.56,NULL,'ut aut voluptas autem est quo dolorem.','(570)472-8848',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(4,6,'salvatore kub','acrylics','roll',324.23,NULL,'ut quibusdam doloremque magni enim eos.','lemonchiffon',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(5,4,'yasmine gibson','gi sheet','liter',909.35,NULL,'ex et autem a maxime.','mintcream',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(6,7,'paolo pfeffer dvm','screws','tank',189.65,NULL,'mollitia ut modi neque sint error quo ut dolorem.','sienna',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(7,9,'schuyler daugherty ii','acrylics','square feet',1088.47,NULL,'similique magnam laboriosam corrupti iste.','mediumvioletred',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(8,4,'wilford renner dvm','paints','meters',1403.09,NULL,'sunt accusantium quo nemo doloremque.','deepskyblue',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(9,6,'mrs. melisa wolff','paints','box',192.11,NULL,'qui placeat et et et provident.','013.145.2902x5213',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(10,6,'brooks ledner','pipe','galloons',285.49,NULL,'suscipit ratione illo nam delectus occaecati ut.','275-219-1784',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(11,1,'prof. kay harris','angle bar','kilo',702.94,NULL,'eligendi dignissimos quam nobis qui.','707-173-1111x25209',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(12,4,'ms. brooke gorczany','plywood','box',1537.07,NULL,'sed assumenda ullam ea asperiores.','01478822119',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(13,8,'gilda beahan','screws','square inches',1659.43,NULL,'temporibus nostrum dolor nostrum.','01778438996',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(14,8,'charlie cole','angle bar','sack',749.04,NULL,'facere vel delectus sit et ut dolores commodi ut.','1-655-924-6246x28225',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(15,2,'keven stroman i','paints','sheets',898.97,NULL,'quia et non ab quia.','hotpink',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(16,8,'harvey kuhn','paints','length',1010.97,NULL,'laborum aut tenetur et omnis illum ratione tempora.','04401167832',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(17,9,'alvera harris','paints','sheets',1349.02,NULL,'laudantium qui nulla incidunt dolorum reprehenderit quis.','plum',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(18,8,'gianni nitzsche i','paints','box',878.77,NULL,'odio asperiores suscipit cupiditate qui.','indianred',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(19,8,'lucile kihn','acrylics','sheets',1676.43,NULL,'et libero sed aut.','darkturquoise',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(20,8,'prince bogisich','pipe','box',624.30,NULL,'et facilis quas dolore libero.','ghostwhite',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(21,5,'scot ebert','acrylics','meters',211.99,NULL,'quis non laborum ut.','(453)527-8589x6396',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(22,2,'ms. melisa wyman dvm','screws','length',431.91,NULL,'nesciunt perspiciatis magni deserunt explicabo quis tempore.','660-076-8511',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(23,5,'prof. lamar pagac','paints','tank',1623.60,NULL,'consequuntur sed et esse dolor tenetur quae.','orangered',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(24,4,'gennaro bernier','bolt & nut','sheets',378.73,NULL,'non sequi molestiae perferendis repellat placeat dolor ipsam.','793.744.5567',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(25,3,'jerry bednar','gi sheet','pairs',728.61,NULL,'dolores dolores eveniet nam eos.','orangered',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(26,4,'allie o\'reilly','plywood','meters',492.11,NULL,'quo occaecati distinctio molestias.','mediumseagreen',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(27,3,'jayce miller','acrylics','liter',1508.06,NULL,'debitis commodi est ut officia nulla aut.','maroon',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(28,5,'prof. leon gulgowski v','screws','ply',1238.55,NULL,'consequuntur quam repudiandae exercitationem praesentium nostrum fugit.','cyan',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(29,5,'henry franecki','angle bar','ply',1816.35,NULL,'officiis ut modi deleniti quia blanditiis unde.','907-862-8240x084',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(30,6,'rasheed hudson','angle bar','set',1791.73,NULL,'eius aut illo nam ut in assumenda earum.','lime',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(31,4,'danial aufderhar','paints','set',941.62,NULL,'harum consectetur praesentium beatae et quidem.','darkcyan',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(32,2,'miss talia boyer','screws','square feet',263.95,NULL,'voluptatem accusantium maiores minus quis laboriosam sunt dicta vitae.','peru',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(33,10,'prof. precious witting','paints','pairs',1402.15,NULL,'voluptate tempora ullam autem quos quod nobis officia.','coral',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(34,3,'prof. orpha kautzer v','gi sheet','pairs',132.70,NULL,'esse ut dignissimos est enim beatae ut illum.','darkcyan',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(35,10,'filomena labadie v','gi sheet','box',483.66,NULL,'itaque unde numquam numquam.','(344)514-7343x9948',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(36,7,'ms. otha farrell dds','angle bar','ply',900.05,NULL,'magni iure soluta officiis quia consectetur facilis.','indigo',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(37,1,'keanu lemke','acrylics','roll',1988.42,NULL,'quia voluptate commodi dignissimos nisi.','orchid',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(38,7,'larissa wilderman','plywood','meters',1779.15,NULL,'veniam voluptatum deleniti corporis labore omnis.','497.059.4122x5783',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(39,1,'dr. marcelle klein i','bolt & nut','set',847.40,NULL,'eligendi veritatis nisi eos.','1-232-602-2733x99039',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(40,6,'hilbert welch','angle bar','galloons',1969.74,NULL,'nisi dolorum praesentium doloremque consectetur sit quisquam rerum.','(900)380-9047x25099',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(41,1,'adonis russel','acrylics','length',763.02,NULL,'sunt placeat quos nihil iure quia.','azure',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(42,4,'raina feil','paints','square inches',630.76,NULL,'a voluptatem est commodi est inventore.','(582)246-8191x581',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(43,2,'kiara jast','gi sheet','tank',512.87,NULL,'distinctio odio aut quae.','08397258049',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(44,3,'miss elenora hahn','angle bar','pieces',627.55,NULL,'porro corrupti quia pariatur fuga et ut.','sandybrown',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(45,7,'libbie schulist ii','bolt & nut','pairs',1545.18,NULL,'qui nemo quasi quia in ut.','793-065-9962',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(46,4,'kiel macejkovic v','gi sheet','square feet',1697.35,NULL,'sit ducimus occaecati ut maiores est quo assumenda.','147.675.1069x00286',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(47,8,'mrs. chelsea ryan','plywood','galloons',880.48,NULL,'est ullam mollitia quam iusto eos esse.','springgreen',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(48,9,'dr. merl koss','acrylics','liter',1267.10,NULL,'iste ut enim non nostrum tenetur.','darksalmon',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(49,7,'bart jenkins','paints','kilo',910.23,NULL,'impedit at placeat eum veniam et.','1-874-352-6050',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A'),(50,7,'madyson jacobson','bolt & nut','meters',1153.05,NULL,'rem soluta occaecati voluptatem.','+16(8)0110072007',0,'2015-08-04 19:10:46','2015-08-04 19:10:46','A');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2015_07_11_035313_create_roles_table',1),('2015_07_11_035803_create_users_table',1),('2015_07_11_040653_add_foreign_keys_on_users_table',1),('2015_07_11_041205_create_permission_groups_table',1),('2015_07_11_041238_create_permissions_table',1),('2015_07_11_041451_add_foreign_keys_on_permissions_table',1),('2015_07_11_041623_create_permission_role_table',1),('2015_07_11_041941_create_branches_table',1),('2015_07_11_042001_create_departments_table',1),('2015_07_11_042318_create_employees_table',1),('2015_07_11_042432_add_foreign_keys_on_employees_table',1),('2015_07_12_234210_create_contacts_table',1),('2015_07_12_234308_create_suppliers_table',1),('2015_07_30_063647_create_items_table',1),('2015_07_31_162332_create_clients_table',1),('2015_08_03_085940_create_projects_table',1),('2015_08_03_100112_add_foreign_keys_on_items_table',1),('2015_08_03_100250_add_foreign_keys_on_suppliers_table',1),('2015_08_05_025352_create_utility_costs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_groups`
--

DROP TABLE IF EXISTS `permission_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_groups`
--

LOCK TABLES `permission_groups` WRITE;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
INSERT INTO `permission_groups` VALUES (2,'access_control'),(4,'branch'),(9,'client'),(5,'department'),(6,'employee'),(8,'item'),(10,'project'),(1,'register'),(7,'supplier'),(3,'user');
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,19,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(2,20,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(3,21,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(4,22,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(5,23,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(6,24,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(7,50,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(8,51,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(9,52,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(10,53,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(11,54,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(12,25,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(13,26,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(14,27,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(15,28,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(16,29,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(17,30,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(18,31,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(19,32,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(20,33,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(21,34,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(22,35,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(23,45,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(24,46,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(25,47,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(26,48,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(27,49,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(28,55,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(29,56,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(30,57,2,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(31,58,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(32,59,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(33,60,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(34,61,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(35,62,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(36,63,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(37,64,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(38,65,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(39,1,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(40,2,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(41,36,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(42,37,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(43,38,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(44,39,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(45,40,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(46,41,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(47,42,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(48,43,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(49,44,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(50,16,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(51,17,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(52,18,2,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(53,50,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(54,51,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(55,52,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(56,53,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(57,54,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(58,30,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(59,31,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(60,32,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(61,33,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(62,34,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(63,35,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(64,45,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(65,46,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(66,47,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(67,48,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(68,49,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(69,55,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(70,56,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(71,57,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(72,58,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(73,59,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(74,60,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(75,61,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(76,62,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(77,63,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(78,64,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(79,65,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(80,1,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(81,2,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(82,36,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(83,37,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(84,38,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(85,39,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(86,40,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(87,41,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(88,42,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(89,43,3,'2015-08-04 19:10:44','2015-08-04 19:10:44'),(90,44,3,'2015-08-04 19:10:44','2015-08-04 19:10:44');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_route_unique` (`route`),
  KEY `permissions_group_id_index` (`group_id`),
  CONSTRAINT `permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,1,'register ','register_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(2,1,'resend email user ','resend_email_user_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(3,2,'access control ','access_control_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(4,2,'new role ','new_role_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(5,2,'delete role ','delete_role_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(6,2,'update role ','update_role_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(7,2,'new permission group ','new_permission_group_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(8,2,'delete permission group ','delete_permission_group_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(9,2,'update permission group ','update_permission_group_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(10,2,'new permission ','new_permission_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(11,2,'update permission ','update_permission_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(12,2,'delete permission ','delete_permission_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(13,2,'fetch permission data ','fetch_permission_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(14,2,'grant role permission ','grant_role_permission_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(15,2,'revoke role permission ','revoke_role_permission_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(16,3,'users index ','users_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(17,3,'deactivate user ','deactivate_user_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(18,3,'reactivate user ','reactivate_user_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(19,4,'branches index ','branches_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(20,4,'new branch ','new_branch_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(21,4,'fetch branch data ','fetch_branch_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(22,4,'search branch ','search_branch_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(23,4,'update branch ','update_branch_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(24,4,'close branch ','close_branch_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(25,5,'departments index ','departments_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(26,5,'new department ','new_department_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(27,5,'update department ','update_department_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(28,5,'delete department ','delete_department_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(29,5,'fetch department data ','fetch_department_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(30,6,'employees index ','employees_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(31,6,'hire employee ','hire_employee_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(32,6,'show employee ','show_employee_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(33,6,'update employee ','update_employee_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(34,6,'terminate employee ','terminate_employee_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(35,6,'fetch employee data ','fetch_employee_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(36,7,'suppliers index ','suppliers_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(37,7,'new supplier ','new_supplier_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(38,7,'show supplier ','show_supplier_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(39,7,'update supplier ','update_supplier_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(40,7,'cancel supplier ','cancel_supplier_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(41,7,'create item ','create_item_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(42,7,'update item ','update_item_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(43,7,'delete item ','delete_item_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(44,7,'fetch item data ','fetch_item_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(45,8,'items index ','items_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(46,8,'new item ','new_item_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(47,8,'new item index ','new_item_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(48,8,'update item index ','update_item_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(49,8,'search item ','search_item_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(50,9,'clients index ','clients_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(51,9,'new client ','new_client_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(52,9,'update client ','update_client_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(53,9,'delete client ','delete_client_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(54,9,'fetch client data ','fetch_client_data_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(55,10,'projects index ','projects_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(56,10,'new project ','new_project_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(57,10,'add material ','add_material_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(58,10,'update quantity ','update_quantity_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(59,10,'cancel project material ','cancel_project_material_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(60,10,'validate project ','validate_project_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(61,10,'labor costs index ','labor_costs_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(62,10,'new labor cost ','new_labor_cost_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(63,10,'update labor cost ','update_labor_cost_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(64,10,'delete labor cost ','delete_labor_cost_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43'),(65,10,'logistics index ','logistics_index_path',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cl_id` int(10) unsigned NOT NULL,
  `br_id` int(10) unsigned NOT NULL,
  `estimator_id` int(10) unsigned DEFAULT NULL,
  `salesrep_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `lead_time_no_of_days` int(10) unsigned DEFAULT NULL,
  `remarks` text COLLATE utf8_unicode_ci,
  `projgencost_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL),(2,'moderator',NULL),(3,'manager',NULL),(4,'estimator',NULL),(5,'accountant',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `br_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recstat` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `suppliers_br_id_foreign` (`br_id`),
  CONSTRAINT `suppliers_br_id_foreign` FOREIGN KEY (`br_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,12,'rath ltd','office','78011 sanford summit corrinetown, ga 25537-0155','batz.jeanette@littel.com','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(2,24,'mayert group','maintenance','099 kassandra curve suite 738 north stacey, fl 39880','jvon@gerhold.info','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(3,22,'braun-leannon','subcontractor','604 rau terrace nashside, ia 19891','danielle28@lowe.biz','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(4,30,'raynor llc','maintenance','5280 gleichner mountain suite 873 east bernhard, va 30856','oshanahan@jacobs.info','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(5,32,'gleason ltd','supplies','68824 nella stravenue apt. 223 lake tadbury, ne 12018','cali.cronin@gerhold.com','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(6,8,'willms and sons','maintenance','349 huel land north katherineside, oh 24725-3377','vebert@langosh.com','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(7,10,'frami, graham and douglas','wholesaler','85038 hahn tunnel new martineland, va 46265','mckenzie.chance@raynor.com','A','2015-08-04 19:10:45','2015-08-04 19:10:45'),(8,34,'mccullough inc','office','77331 waelchi inlet east jarontown, ak 98195','kmoen@lueilwitz.org','A','2015-08-04 19:10:46','2015-08-04 19:10:46'),(9,4,'goyette and sons','construction','92943 viola cape suite 973 north eddie, sc 91727-2366','kristin03@beatty.com','A','2015-08-04 19:10:46','2015-08-04 19:10:46'),(10,18,'bayer-ortiz','maintenance','019 aurelie track north roberto, dc 83241','alexys58@hilpert.info','A','2015-08-04 19:10:46','2015-08-04 19:10:46');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2y$10$F9cFbY.DZFEqj73ib3HMRudhP6h24D.P2HayCx/wdkd6yNdE134ye','admin@gmail.com','',NULL,'2015-08-04 19:10:42','2015-08-04 19:10:42','2015-08-04 19:10:42','A'),(2,2,'moderator','$2y$10$krU3ZdZ30m1jOd3RYuyF2uXVXQqOpUQmMUhdC.Vb5tG1G2JdJB1YC','moderator@gmail.com','',NULL,'2015-08-04 19:10:42','2015-08-04 19:10:42','2015-08-04 19:10:42','A'),(3,3,'manager','$2y$10$1uv82B0JeWVCsQ9pJoL3G.Rv6VWTcPiqlPb5a.KWxAkzS3beBXjtm','manager@gmail.com','',NULL,'2015-08-04 19:10:42','2015-08-04 19:10:42','2015-08-04 19:10:42','A'),(4,4,'gberge','$2y$10$rLMXHEfTNvattsycxCtI0e05xJDjAEfcjCFPzxZPyvJXgoS3RblNS','furman.murray@gmail.com','',NULL,'2015-08-03 16:37:13','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(5,3,'herman.renner','$2y$10$ExwGdx853O7XEglr6OsVwuemu6LYem/QxE6ijMJGTZMSW.8gkA8XO','flavio00@swift.com','',NULL,'2015-07-24 00:50:50','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(6,4,'alangworth','$2y$10$kyRd9I6XEzlYrtV8brIWyOzBobSqZSLzwaH3CCmccImmryjllJApK','hubert81@abshire.info','','IYamMjPgaElsV6WCiCXd',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43','I'),(7,5,'fmante','$2y$10$Cb9RmJpZd3rTrtCuFEltOudLg6gMHiZIdAzjN30Dh8Df6mywhoc6m','gwen24@emmerich.org','',NULL,'2015-07-23 17:45:28','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(8,3,'shanelle74','$2y$10$fdktboeM7a7dFVFfkunYFOVF7q67D8lerEURQfn0K0akI610KO2b.','dianna45@hotmail.com','',NULL,'2015-08-01 18:33:01','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(9,5,'eldora48','$2y$10$LYCSxpeugodYWXG831tEDub8VFdVuMx8mkfTE22Zf/l6o37IC.JO6','fredrick.boyer@gmail.com','',NULL,'2015-07-23 19:23:50','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(10,5,'ukassulke','$2y$10$5I70HrAgqhu6AkM.wlMKCO93BZPRbtv4hBKxA/xPIUASTXN9box4a','jakob.satterfield@hotmail.com','',NULL,'2015-07-30 00:21:32','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(11,5,'aubrey25','$2y$10$lk5NnSD0E9VcCJHst0iiVeY4NiTMy9I4vGrmYZGVONbgpi2gE9Fle','sauer.camden@hotmail.com','',NULL,'2015-07-27 00:05:25','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(12,5,'mwisozk','$2y$10$rY7lQ/SCtP/gFJ.Kq4UEq.u2jEmsoVTJGFoFcjXOaup7mG4p1J2/m','cummerata.arnulfo@hotmail.com','','ipmblsrKHnxUgrwHox1P',NULL,'2015-08-04 19:10:43','2015-08-04 19:10:43','I'),(13,3,'dickens.shanie','$2y$10$WKAMilvvfWO2HCc9eusx4..DU7agM14p43LwaG.V47OhGfPijjyYK','julian86@franecki.com','',NULL,'2015-07-29 16:41:14','2015-08-04 19:10:43','2015-08-04 19:10:43','A'),(14,4,'beatty.maureen','$2y$10$Jgl7Gz3xRo4XCBY1czv28.6sYlaRK8lmXYZ8QXtR7YOkW2vzFWBci','zhalvorson@hotmail.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(15,3,'makenna71','$2y$10$UPed/yT0HBRzOZ8Lj3mNJOGMRmhBZM/l1beAGEWO1ALay/2RewB7q','kunze.leanne@schroeder.net','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(16,5,'filiberto31','$2y$10$XxJo0YGf0kHZTbiobpStC.ljMF2QnrvHGNWfHEFcOz4h8Vci9yxuq','urenner@romaguera.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(17,4,'okuneva.julianne','$2y$10$B2oG0Jp14Mpd3f41vnd/eu5.vwOxjhbQ9qqXXpwlvk7doV7ROyuP2','randy45@yahoo.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(18,5,'ettie76','$2y$10$o.D3rIVkWtQx4wvgjKN0h.nRrS2wAyXPdFivhfZu6OaWFSAF66i7y','daugherty.ulices@shields.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(19,3,'jordyn38','$2y$10$mtV42HR3rHFP.d0IMhGL.O82DogmaTW31FNY.e7NocmcD6jYVNOfy','toy.block@gmail.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(20,5,'bernhard.missouri','$2y$10$t5xSpBjfBI.UOEJffmN2D.CDj9a6fVFSj8rPesdQ2L1D6Sm2/xZLm','ethel40@gmail.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(21,5,'etha.king','$2y$10$I3oAL2sHOCvSS/SEZiTNP.f8MK.wN6wtQsNmpSV8aiZc75uqXSVE2','chase.johnston@gmail.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(22,5,'george.ohara','$2y$10$JD6EuCh4SnoAfvGq81E4EuKXDFPr0ZtucHxfpY/z1uhlE6KN69ga2','mcglynn.pablo@mcclure.biz','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(23,4,'daugherty.tracy','$2y$10$PW3fMZMjqafRdPnZF8iSX.WdJKnb.KcYs6IAOEyRchZbUVBqT70Bm','zfeil@gmail.com','',NULL,'2015-08-04 19:10:44','2015-08-04 19:10:44','2015-08-04 19:10:44','I'),(24,3,'murazik.carmine','$2y$10$6py8jlRNx8qPDPAEDV33c./eoSwNzkcKVuQPJrP2PSea3XUi82zu.','erwin.simonis@hotmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(25,5,'cortez.jacobs','$2y$10$cqQ/2PWRP8lEpPzrmQE/wuJmN5nM7EJ6IX5KDAcmmgecu.yWtiOS.','jude82@johns.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(26,4,'sipes.geo','$2y$10$6TVxHT4gDr.aMICRcUDoDuuN4LXac8/rfU4fcfNVxOJ9V5GBQmgEK','lenora.smitham@gmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(27,3,'santino89','$2y$10$kyGmsY9CUIYBPxlW4KpNWeaSXmfQmHMJ2ucABkkH7cP8dT35NbmM.','aking@russel.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(28,3,'morris.herzog','$2y$10$hPYQl6FBshSdESN.JTZZauHlVDkyDN56L/IXYfFBbVlj2If5nHpZa','jarrell.kuhlman@marks.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(29,5,'carter.cordia','$2y$10$bKdP8GKgwp9fJDjySLEXd.tbMJv2o60RWU6ntHkorkdjzng38WZmC','marlee.reilly@yahoo.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(30,5,'ayana.lang','$2y$10$1fwZylk4sSca4oJkAlm90eLicfcLydkLAUPIdvzqhNvDo5IjhmBfC','arne70@hotmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(31,4,'schamberger.florence','$2y$10$KY1GbUjSaAL.L1JK.het5uEz.GE0UaUdkxp8raILVnP6b9bCQl8de','yschaden@gmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(32,4,'alana41','$2y$10$vTObo0FJjPtdscfskKlvFODkyfVB5PmRIIEGNWNdZ01lpp0cXu62W','coy21@hotmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I'),(33,3,'elenor.hamill','$2y$10$CU4RGXU1FQrKAXOeCGZpruqlSADradbyGsayYkPbGshXYbJ2KejmK','keshaun54@hotmail.com','',NULL,'2015-08-04 19:10:45','2015-08-04 19:10:45','2015-08-04 19:10:45','I');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utility_costs`
--

DROP TABLE IF EXISTS `utility_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utility_costs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `br_id` int(10) unsigned NOT NULL,
  `classification` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_costs`
--

LOCK TABLES `utility_costs` WRITE;
/*!40000 ALTER TABLE `utility_costs` DISABLE KEYS */;
INSERT INTO `utility_costs` VALUES (1,1,'labor','fabrication',328.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:10:46'),(2,1,'labor','paints',35.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:17:19'),(3,1,'labor','installation',328.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:10:46'),(4,1,'logistics','delivery-motorcycle',250.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:10:46'),(5,1,'logistics','delivery-multicab',500.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:10:46'),(6,1,'logistics','delivery-truck',1200.00,NULL,'2015-08-04 19:10:46','2015-08-04 19:10:46'),(7,1,'logistics','shipping',1500.00,'ship from cebu to tagbilaran, bohol via jrs express','2015-08-04 19:10:46','2015-08-04 19:10:46'),(8,1,'labor','dsad',44.00,'remakrs ni','2015-08-04 19:30:33','2015-08-04 19:30:33'),(9,1,'labor','dsad',4324.00,'','2015-08-04 19:31:43','2015-08-04 19:31:43');
/*!40000 ALTER TABLE `utility_costs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-05  3:42:24
