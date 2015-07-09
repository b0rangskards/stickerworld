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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'North Celestinoton','(574)812-6715x008','345 Cole Park Apt. 636\nEast Jamey, NJ 78897-9679',-86.829565,84.943207,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(2,'West Zakaryburgh','639.501.8871','82387 Burley Islands Apt. 158\nPort Rahul, IL 54672-7986',-69.885005,67.972784,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(3,'North Oda','06104002358','0639 Uriah Park Suite 084\nNorth Devin, OR 95156-9607',14.718085,2.862052,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(4,'Kuphalbury','+89(8)9480486345','48668 Pattie Ferry Suite 189\nLake Savionfort, NE 73825-9828',-10.780917,49.374071,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(5,'South Joannyfurt','(480)107-4655','26653 Green Greens Suite 268\nPetefurt, NE 47981',82.244579,144.505612,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(6,'Keelingshire','1231324','2633 Brooks Creek\nEast Jake, MO 84439-1625',34.989639,14.555590,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(7,'East Garret','1231324','09657 Runolfsson Forest\nTierraton, ME 57385-1193',83.552012,15.021690,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(8,'North Grace','1231324','73554 Mitchell Via\nKautzerfurt, TN 23615',-80.218747,144.905934,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(9,'New Guadalupehaven','1231324','6700 Diana Fields\nLake Libbie, IN 12836',-34.713048,125.985694,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(10,'Port Darrelberg','1231324','210 Olson Heights\nAlfburgh, PA 45593',-80.171059,53.692225,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(11,'Maximilianside','1231324','84327 Skiles Radial\nPort Katlyn, NV 79015-3280',-82.816635,20.907602,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(12,'Rileyview','1231324','12203 Brenda Crossing Apt. 175\nNew Steve, SD 31241',-86.067972,-48.952746,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(13,'Bashirianfurt','1231324','84134 Trantow Mission\nNicolemouth, KY 41532',52.254712,-13.727981,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(14,'Aylaport','1231324','92724 Emmie Causeway\nSchmelerland, VT 31655',12.321488,-106.137905,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(15,'New Roslynchester','1231324','2043 Nikolaus Terrace Suite 970\nMinafurt, ID 15521',8.212308,-172.463190,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(16,'Weissnatmouth','1231324','80609 Lakin Heights\nRomainefort, ME 06641-4627',-11.436696,21.868997,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(17,'Ryleeview','1231324','1688 Ortiz Terrace Apt. 720\nSantinaburgh, MD 60807',71.108680,-163.516031,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(18,'Andersonview','1231324','1856 Shannon Point\nEast Agustinamouth, NY 78922-7616',-19.438764,174.803341,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(19,'North Bradenside','1231324','336 Schmeler Circles\nLake Ronny, NH 14236',-82.835807,146.454642,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(20,'New Serena','1231324','313 Stamm Crest\nGaylordstad, TN 11169-3212',36.640180,46.357336,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(21,'Reynoldsmouth','1231324','17416 Steuber Square Suite 652\nSouth Simone, CA 90052',-24.659874,-163.578809,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(22,'Heaneyshire','1231324','89993 Marquardt Ferry Apt. 680\nSchillerview, AL 60003-9431',48.768656,-81.766139,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(23,'New Eliane','1231324','971 Joe Ridge Apt. 087\nNew Davonteberg, IA 11427-1975',76.076030,-86.102189,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(24,'North Lenny','1231324','8284 Roob Haven\nPort Ericka, SC 58552-1842',-1.470941,-109.155568,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(25,'Lake Enosland','1231324','79260 Mohammed Summit\nNew Alyciamouth, CT 92876',-51.724042,-176.154847,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(26,'Port Naomie','1231324','48863 Schaefer Square Suite 643\nKathlynberg, KY 47667-8949',-41.074067,108.665101,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(27,'Heloisebury','1231324','1964 Kessler Flats Apt. 300\nNew Lucile, DE 97469',19.219908,-133.381145,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(28,'Caspershire','1231324','3515 Emmerich Ridge\nPort Dariana, WI 81316-0356',-43.558176,63.884488,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(29,'New Onastad','1231324','249 Lorine Summit\nNorth Haroldbury, FL 92813',-30.852248,-102.582521,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(30,'Romagueraside','1231324','606 Hartmann View\nWest Trevionfurt, HI 80634',-49.935967,141.106406,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(31,'Kenbury','1231324','1427 Johnston Union\nNew Monroeside, IN 49073-4712',50.777376,39.331097,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(32,'Kemmerborough','1231324','200 Shields Corners\nFloside, NY 95945',6.100692,-17.319446,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(33,'Klingview','1231324','92681 Howe Lodge\nIzabellachester, WA 47981',-64.437751,-90.336334,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(34,'Hegmannport','1231324','819 Maud Fork Suite 417\nWillmouth, MD 60186-5342',7.802205,114.586716,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(35,'New Anastasia','1231324','369 Ortiz Junction\nIdaside, TN 13905-5932',-66.712478,50.812094,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(36,'Port Joey','1231324','72341 Sally Skyway\nSchaeferbury, MT 75760-4109',-3.667092,22.116656,'2015-07-08 20:08:25','2015-07-08 20:08:25','A');
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
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Accounting','2015-07-08 20:08:22','2015-07-08 20:08:22'),(2,'Sales','2015-07-08 20:08:22','2015-07-08 20:08:22'),(3,'IT & Design','2015-07-08 20:08:22','2015-07-08 20:08:22'),(4,'Production','2015-07-08 20:08:22','2015-07-08 20:08:22'),(5,'Logistics','2015-07-08 20:08:22','2015-07-08 20:08:22');
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
  `user_id` int(10) unsigned DEFAULT NULL,
  `br_id` int(10) unsigned NOT NULL,
  `dept_id` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hired_date` date NOT NULL,
  `terminated_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstat` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `employees_user_id_index` (`user_id`),
  KEY `employees_br_id_index` (`br_id`),
  KEY `employees_dept_id_index` (`dept_id`),
  CONSTRAINT `employees_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `employees_br_id_foreign` FOREIGN KEY (`br_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,3,6,4,'chasity','windler','shields','1973-03-14','male','50668 Schowalter Curve Apt. 941\nZelmabury, NV 45638-0520','(42) 8112-0372',NULL,'Office Manager','1984-06-12',NULL,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(2,14,7,3,'oma','buckridge','kunze','2006-03-28','female','12076 Schumm Greens Suite 455\nAufderharbury, IN 25950','(42) 8112-0372',NULL,'Estimator','1988-12-04',NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(3,15,8,1,'owen','berge','funk','2004-12-19','male','4852 Upton Ramp Apt. 500\nNorwoodhaven, VA 03157','(42) 8112-0372',NULL,'Production Worker','1975-02-19',NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(4,16,9,4,'rodger','gerhold','bogan','2014-09-01','male','955 Collins Highway\nVandervortshire, WY 39632-0876','(42) 8112-0372',NULL,'Janitor','1979-06-29',NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(5,17,10,1,'jerod','boyle','jakubowski','1990-12-19','male','1488 Diego Prairie\nLake Jaidaport, CT 19073-4731','(42) 8112-0372',NULL,'Janitor','2000-01-26',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(6,18,11,1,'rahul','kuhic','lowe','2003-11-24','male','49706 Weissnat Spurs\nEast Generalbury, CT 62289-0999','(42) 8112-0372',NULL,'Janitor','1978-04-11',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(7,19,12,5,'toni','russel','abshire','2012-05-20','male','956 Norberto Glens Suite 390\nNorth Danialview, ID 68571','(42) 8112-0372',NULL,'Estimator','1996-09-20',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(8,20,13,4,'kavon','schaden','abbott','1983-11-29','female','22003 Krystel Creek Suite 923\nPadbergburgh, IN 67833-3324','(42) 8112-0372',NULL,'Production Worker','2007-12-06',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(9,21,14,4,'layne','klocko','kuhlman','1980-03-16','male','20740 Koepp Fords Suite 257\nArdithside, NV 81685-4604','(42) 8112-0372',NULL,'Driver','2001-06-19',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(10,22,15,5,'luisa','goldner','kemmer','2011-01-30','female','9345 Kohler Ways\nMonahanborough, KS 41789','(42) 8112-0372',NULL,'Accountant','1997-03-14',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(11,23,16,4,'jevon','homenick','raynor','2010-09-13','female','9740 Kreiger Ways\nBogisichstad, IL 02949-9693','(42) 8112-0372',NULL,'Driver','2004-11-14',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(12,24,17,3,'marlin','stracke','spinka','1973-07-08','male','013 Davis Shores\nSouth Leannmouth, MT 78692','(42) 8112-0372',NULL,'Production Worker','2000-11-14',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(13,25,18,5,'delbert','pagac','klocko','1995-03-19','male','95282 Velma Corner\nEast Haleigh, WI 31215','(42) 8112-0372',NULL,'Accountant','2000-10-27',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(14,26,19,1,'arthur','fadel','keebler','1992-08-04','male','4692 Kris Causeway\nWilfordburgh, RI 53644-2501','(42) 8112-0372',NULL,'Office Clerk','2014-10-09',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(15,27,20,4,'charlie','stokes','grimes','2010-10-03','female','5250 Wiegand Rapid Apt. 561\nStantonton, CT 16720','(42) 8112-0372',NULL,'Production Worker','1998-01-13',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(16,28,21,5,'ozella','gibson','marquardt','1987-09-10','male','1230 Kelly Port\nNew Dewaynemouth, MO 31710','(42) 8112-0372',NULL,'Production Worker','1977-10-22',NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','A'),(17,29,22,3,'rickie','fritsch','wintheiser','2007-11-28','male','80814 Willow Lakes\nNorth Shadland, SD 34548-5203','(42) 8112-0372',NULL,'Accountant','1974-03-17',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(18,30,23,4,'ewald','huel','jacobson','1971-01-09','male','718 Asia Center\nElzaport, CT 95772','(42) 8112-0372',NULL,'CEO','1975-05-11',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(19,31,24,1,'rosanna','wuckert','fritsch','2009-02-23','female','52506 Casimer Mall\nLegrosborough, SC 81435-6456','(42) 8112-0372',NULL,'Accountant','1982-07-19',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(20,32,25,1,'deshawn','crist','zemlak','1987-02-15','female','70145 Fred Track\nLaurieberg, NH 74374','(42) 8112-0372',NULL,'Janitor','2011-07-10',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(21,33,26,3,'lera','borer','christiansen','1995-01-17','male','67493 Royal Inlet Suite 257\nPort Leilani, WV 89168-9499','(42) 8112-0372',NULL,'Accountant','1981-06-02',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(22,NULL,27,5,'lela','ritchie','schmitt','1972-08-15','male','9688 Skiles Vista\nMazieton, MA 46737-6203','(42) 8112-0372',NULL,'Production Worker','1973-11-28',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(23,NULL,28,2,'georgette','ruecker','ziemann','1983-06-10','female','443 Kuvalis Shoals\nPort Payton, CO 41402-7591','(42) 8112-0372',NULL,'CEO','1979-04-06',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(24,NULL,29,1,'sheldon','purdy','feest','1973-06-16','female','98533 Leila Underpass\nMoenside, MT 03471','(42) 8112-0372',NULL,'Office Clerk','1973-10-21',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(25,NULL,30,3,'tremaine','west','schinner','2011-01-26','female','68682 Vanessa Land\nNew Kylie, MA 57999-4258','(42) 8112-0372',NULL,'CEO','1977-09-26',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(26,NULL,31,2,'clotilde','abshire','bartell','1973-11-22','male','5760 Altenwerth Landing Suite 106\nOrtizburgh, CT 02832','(42) 8112-0372',NULL,'Driver','1991-11-24',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(27,NULL,32,5,'norma','wyman','watsica','1994-04-28','male','175 Leuschke Bridge Apt. 114\nLake Dejahtown, CA 09398-7572','(42) 8112-0372',NULL,'Accountant','2001-05-23',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(28,NULL,33,5,'henry','labadie','pacocha','2003-10-25','female','5747 Kling Hollow Apt. 239\nPort Bobby, CA 33841','(42) 8112-0372',NULL,'Office Clerk','1971-09-23',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(29,NULL,34,5,'jamison','leffler','kub','2014-07-21','male','042 Vergie Parks Suite 502\nGerardmouth, TN 48268','(42) 8112-0372',NULL,'Driver','1973-06-05',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(30,NULL,35,3,'glenna','wisozk','veum','1995-02-04','female','7108 Adolf Park\nEast Katherynfurt, MI 15405-4171','(42) 8112-0372',NULL,'Accountant','1989-10-03',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A'),(31,NULL,36,4,'orion','d\'amore','hilpert','2002-11-25','female','51560 Talia Courts Suite 774\nPort Nia, MA 41772','(42) 8112-0372',NULL,'CEO','1979-11-23',NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','A');
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
INSERT INTO `migrations` VALUES ('2015_03_24_223040_create_roles_table',1),('2015_03_24_223101_create_users_table',1),('2015_06_11_173550_add_pic_path_to_user_table',1),('2015_06_17_170554_create_branches_table',1),('2015_06_22_215515_create_departments_table',1),('2015_06_23_045938_create_employees_table',1),('2015_06_25_012024_create_permission_groups_table',1),('2015_06_25_012221_create_permissions_table',1),('2015_06_25_022610_create_permission_role_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_groups`
--

LOCK TABLES `permission_groups` WRITE;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
INSERT INTO `permission_groups` VALUES (2,'access_control'),(4,'branch'),(5,'department'),(6,'employee'),(1,'register'),(3,'user');
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
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,19,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(2,20,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(3,21,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(4,22,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(5,23,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(6,24,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(7,25,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(8,26,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(9,27,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(10,28,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(11,29,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(12,30,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(13,31,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(14,32,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(15,1,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(16,2,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(17,16,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(18,17,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(19,18,2,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(20,30,3,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(21,31,3,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(22,32,3,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(23,1,3,'2015-07-08 20:08:25','2015-07-08 20:08:25'),(24,2,3,'2015-07-08 20:08:25','2015-07-08 20:08:25');
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
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_route_unique` (`route`),
  KEY `permissions_group_id_foreign` (`group_id`),
  CONSTRAINT `permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,1,'register ','register_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(2,1,'resend email user ','resend_email_user_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(3,2,'access control ','access_control_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(4,2,'new role ','new_role_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(5,2,'delete role ','delete_role_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(6,2,'update role ','update_role_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(7,2,'new permission group ','new_permission_group_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(8,2,'delete permission group ','delete_permission_group_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(9,2,'update permission group ','update_permission_group_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(10,2,'new permission ','new_permission_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(11,2,'update permission ','update_permission_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(12,2,'delete permission ','delete_permission_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(13,2,'fetch permission data ','fetch_permission_data_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(14,2,'grant role permission ','grant_role_permission_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(15,2,'revoke role permission ','revoke_role_permission_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(16,3,'users index ','users_index_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(17,3,'deactivate user ','deactivate_user_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(18,3,'reactivate user ','reactivate_user_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(19,4,'branches index ','branches_index_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(20,4,'new branch ','new_branch_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(21,4,'fetch branch data ','fetch_branch_data_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(22,4,'search branch ','search_branch_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(23,4,'update branch ','update_branch_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(24,4,'close branch ','close_branch_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(25,5,'departments index ','departments_index_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(26,5,'new department ','new_department_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(27,5,'update department ','update_department_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(28,5,'delete department ','delete_department_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(29,5,'fetch department data ','fetch_department_data_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(30,6,'employees index ','employees_index_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(31,6,'hire employee ','hire_employee_path','','2015-07-08 20:08:25','2015-07-08 20:08:25'),(32,6,'delete employee ','delete_employee_path','','2015-07-08 20:08:25','2015-07-08 20:08:25');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',''),(2,'moderator',''),(3,'manager',''),(4,'estimator',''),(5,'accountant','');
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2y$10$wXZBH9jLphAkPBRyda7z7eD4dMMAK2cehFRlujD8QYfSsDsgSOdE6','admin@gmail.com',NULL,'2015-07-08 20:08:22',NULL,NULL,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(2,2,'moderator','$2y$10$ru3p4HhVIfl6SwIGUl1hEuZImqF0OG5MH0xaqh8cs8dwhYWBYu5uq','moderator@gmail.com',NULL,'2015-07-08 20:08:22',NULL,NULL,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(3,3,'manager','$2y$10$9MyCIRU5iMhGhIP2xqsqdeWgLQY2s7e4bu4Q/dfP4l3PZQ4yN3UeC','manager@gmail.com',NULL,'2015-07-08 20:08:22',NULL,NULL,'2015-07-08 20:08:22','2015-07-08 20:08:22','A'),(4,5,'madyson44','$2y$10$hdBYoWhTnh6qDSZP6WYD3.3mXqBbIMAyFOLuy6Q1oJ0y6T6yzrZTC','eyundt@satterfield.com',NULL,'2015-06-26 11:02:11',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(5,5,'schiller.camren','$2y$10$MWCX8YmNupN5ZaVF9/v9tulNY1J8yfCLvUpxFNTdUWC8d/zsWOSaa','vcollier@gmail.com',NULL,NULL,NULL,'DhjTzztw60OHYyq0j5gs','2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(6,3,'eudora15','$2y$10$mWbg9pBFxR1TKn.wrZZV.OC7Tx2cOV9bkbnBG7Lvw2ia45ubfZkEK','adolf26@connelly.com',NULL,NULL,NULL,'u8y47WyOkSgTYSBv2c9G','2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(7,4,'hpagac','$2y$10$tM8.yTpkO35XFU5VqQbudeheywQtf6zc/CiJ502aXI2OGh54JSWo.','twilliamson@hotmail.com',NULL,'2015-07-01 23:00:41',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(8,5,'obarton','$2y$10$TarEToTIUso6G2G3jbX1r.Sa4KZPxfjzsYnusAOEI4AoehWEdLTgS','janet62@gmail.com',NULL,'2015-06-29 06:08:17',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(9,4,'considine.hyman','$2y$10$/E.cOiE582EiKcjiY8ocaOeYfD8jRpCyhKbTSMyQo4hfP3gqqo/cW','zwunsch@harvey.com',NULL,'2015-07-02 12:25:43',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(10,4,'goyette.verna','$2y$10$qsmpDUIPBkZ/iavc3eSDxeeYitWZLQO9tbA0uT4oAJ5Wy6UnIROp6','dannie56@hotmail.com',NULL,'2015-07-07 22:07:59',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(11,3,'clemens.wolff','$2y$10$MOUpkIhhsdLRZitJ.xCCreLS2n4q04UrPj5KxCtuU83ocpxRF1l6i','wolson@bednar.info',NULL,'2015-07-08 06:53:42',NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','A'),(12,3,'corn','$2y$10$LOYToYk85ND3hbj8ik2LDeYtuMmURTzDpbRD.TSpqxfW/Zx34EKtO','krunte@gislason.com',NULL,NULL,NULL,'3m8fFdggaPMfDJd4iCVu','2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(13,4,'emmalee.shanahan','$2y$10$xhpQZi3HBDwspxHwx/AZ7ut/GkOLkqBWiNotCYYRM3Lkh2BA5vTvW','moen.henri@monahan.info',NULL,NULL,NULL,'8roeTEjmpfhLMNeY0xgy','2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(14,4,'kaden06','$2y$10$j6C.imJPvCyRwRzwLG8FFeMYjcolcpzPg7oN7XXctaHdUWJfI9Vcm','kristofer66@yahoo.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(15,4,'makenna97','$2y$10$0lcmohtZxNfxQY5.Zul9KO/9MCACnBMKCejbT9lLTm8JNXevFL1cG','anika52@gleason.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(16,3,'wlubowitz','$2y$10$y8pOQrqDQM2LjI2V4UAjdudtYV/Nd5Tdnsee5Xr7lZQLgsTVLc0qS','birdie.keeling@yahoo.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:23','2015-07-08 20:08:23','I'),(17,4,'wschuppe','$2y$10$GA.I9X1xzcn4g2xNJ2slDut3G.8LDsyc68DXDMQNb3PGR9pj6OJQm','wiegand.nikolas@rice.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(18,5,'lorna.klocko','$2y$10$4/wEDN4QfTwCFXW1JTeW0.a6JMp01HJzdonO/tZe5G947tyNzwuUa','marquardt.ashtyn@lockman.net',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(19,5,'claude.hilll','$2y$10$zoeaU5mUsuha95hsMs6pw.eDy3YI.O3ujDQEoq5YqH2fNKLQld1pW','fadel.sylvester@metz.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(20,4,'rborer','$2y$10$ZGvlb6BjW4NFt8NZKQ0GwONI95KG0kEMkQfafBvJLUN8CIq3t.u4e','zack.cronin@erdman.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(21,5,'bradtke.anya','$2y$10$KHmT9jXy73qi.pMjA7hjT.MzyZKheAubQtVNhFgRZcDLH.dSmktVC','nikolaus.clifford@bednar.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(22,4,'krunolfsdottir','$2y$10$nyZU9DsEv95e/Mi0z9LriOG/iesN2QmjnG.x59YrzwL/H/SJwpn1.','lauryn.bruen@abbott.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(23,4,'aframi','$2y$10$dGJnlMtmEz6sQ6Y9yQypv.weaHtYT3O4sYeUXFUxql30q0jPvjhsy','wrowe@gmail.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(24,3,'julio33','$2y$10$KpFVDO4lZQRh5xF/BhTUturQZcCNX5bnx75NjOOpoeALEoDlgpcmO','seamus.luettgen@hayes.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(25,4,'block.ruth','$2y$10$jcP8OqTQz1UFwSF5yMzTqOltUn18EnyEGgLlAv1t0/2LXfMcAL5vW','kessler.carmel@yahoo.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(26,5,'william19','$2y$10$6KYjoemhxG9qm8dtyvscR.b/D1/.0l0lT5nMwf6B4Y1u7V4yrNIjS','lura.balistreri@hotmail.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(27,3,'mann.velma','$2y$10$g/0tq.j6aNsF34UzUiYXgOW3.wda4rYM4K9whnBFCLD59TIdlw6Du','fay.catharine@gmail.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(28,3,'elisabeth36','$2y$10$Htro4ZiWU.vKheCS7BLJ9.kHJ/fryU4WArb/ApBmSzofhm.Nk4Omq','dbosco@yahoo.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:24','2015-07-08 20:08:24','I'),(29,3,'stamm.rodrick','$2y$10$iktevIRBy6JFtLYx0Rw/Dept60mHaXcsq2.5x9OJ.uS8WsUgaHT0C','emily.glover@lakin.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','I'),(30,3,'hosinski','$2y$10$36fSid0IR5NwylsbajdyM.vs8fZcJ88oEHym..XWRbSpRjBZEUOcm','pokuneva@fay.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','I'),(31,4,'green.lukas','$2y$10$244Yp1JWvihox.RGV/iv0eBTYcq9OCkqjPZUkHpPmstnxaXq6kvB.','austin66@mohr.org',NULL,NULL,NULL,NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','I'),(32,3,'turner.keyon','$2y$10$6azOdNiFnTOirsTOiJMuwuHe7OtQj4Nup5wjhmSqBlp8iC4z6iMZy','lilly87@nienow.biz',NULL,NULL,NULL,NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','I'),(33,4,'roscoe.blanda','$2y$10$L66gwy9UpmGStKM7t5DV/upD7uvo/WpPSfKQPv/2EiWIgIO/cv182','mgulgowski@hotmail.com',NULL,NULL,NULL,NULL,'2015-07-08 20:08:25','2015-07-08 20:08:25','I');
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

-- Dump completed on 2015-07-09  4:26:18
