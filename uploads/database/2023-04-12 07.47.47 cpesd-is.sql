-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: cpesd-is
-- ------------------------------------------------------
-- Server version 	10.4.27-MariaDB
-- Date: Wed, 12 Apr 2023 07:47:47 +0000

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_logs` (
  `activity_log_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `action` tinytext NOT NULL,
  `activity_log_created` datetime NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `activity_logs` with 0 row(s)
--

--
-- Table structure for table `cso`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cso` (
  `cso_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `cso_code` varchar(50) NOT NULL,
  `cso_name` varchar(150) NOT NULL,
  `purok_number` varchar(50) NOT NULL,
  `barangay` varchar(150) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `telephone_number` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `type_of_cso` varchar(50) NOT NULL,
  `cso_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `cor` varchar(150) NOT NULL,
  `bylaws` varchar(200) NOT NULL,
  `aoc/aoi` varchar(200) NOT NULL,
  `other_docs` varchar(200) NOT NULL,
  `cso_created` datetime NOT NULL,
  PRIMARY KEY (`cso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cso`
--

LOCK TABLES `cso` WRITE;
/*!40000 ALTER TABLE `cso` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `cso` VALUES (1,'sdsad','sad','2','tuyabang bajo','Basil','09','213','sadsadsa@asd','po','active','','','','','2023-04-07 05:42:03'),(2,'1212','Basil','2','tuyabang bajo','','09','','','coop','active','','','','','2023-04-07 05:46:48'),(3,'12122','213','2','Tuyabang Bajo','','09','','','po','active','','','','','2023-04-07 15:12:41'),(4,'123','21321','2','Tuyabang Bajo','','09','','','coop','inactive','','','','','2023-04-07 15:13:24');
/*!40000 ALTER TABLE `cso` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cso` with 4 row(s)
--

--
-- Table structure for table `cso_officers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cso_officers` (
  `cso_officer_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `position_number` int(10) NOT NULL,
  `cso_position` varchar(150) NOT NULL,
  `officer_cso_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `cso_officer_created` datetime NOT NULL,
  PRIMARY KEY (`cso_officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cso_officers`
--

LOCK TABLES `cso_officers` WRITE;
/*!40000 ALTER TABLE `cso_officers` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `cso_officers` VALUES (17,1,'President/BOD Chairperson/BOT-1',4,'asd','sadsa','ad','s','09','asdsad@asdasd','2023-04-10 15:06:05'),(18,4,'Treasurer-4',4,'asd','sd','sd','sd','09','asdsad@asdsadsad','2023-04-10 15:07:12'),(19,2,'Vice President/BOD Vice Chairperson-2',4,'adsadasdas','sdsd','sadsd','sadsa','0921321','sadasdasd@asdsad','2023-04-10 15:07:37'),(20,6,'Manager-6',4,'zd','sadsa','dsd','sdsd','09','asdsad@asdasd','2023-04-10 15:09:02'),(21,5,'Auditor-5',4,'asds','sd','asdasd','sadasd','0912','asdasdas@sadsad','2023-04-10 15:09:14'),(22,1,'President/BOD Chairperson/BOT-1',2,'asds','asd','sds','sd','091123','asdsasad@ASDSADSAD','2023-04-12 07:15:28');
/*!40000 ALTER TABLE `cso_officers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cso_officers` with 6 row(s)
--

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` VALUES (1,'2023-04-04-132142','App\\Database\\Migrations\\Users','default','App',1680766417,1),(2,'2023-04-06-025556','App\\Database\\Migrations\\Cso','default','App',1680766417,1),(3,'2023-04-06-062440','App\\Database\\Migrations\\ActLogs','default','App',1680766417,1),(4,'2023-04-06-064054','App\\Database\\Migrations\\CsoOfficers','default','App',1680766417,1),(5,'2023-04-06-065021','App\\Database\\Migrations\\Transactions','default','App',1680766417,1),(6,'2023-04-06-070319','App\\Database\\Migrations\\ProjectMonitoring','default','App',1680766417,1),(7,'2023-04-06-070334','App\\Database\\Migrations\\Trainings','default','App',1680766417,1),(8,'2023-04-06-072434','App\\Database\\Migrations\\TypeOfActivity','default','App',1680766417,1),(9,'2023-04-06-072450','App\\Database\\Migrations\\ResponsibleSection','default','App',1680766417,1),(10,'2023-04-06-072511','App\\Database\\Migrations\\UnderTypeOfActivity','default','App',1680766417,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `migrations` with 10 row(s)
--

--
-- Table structure for table `project_monitoring`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_monitoring` (
  `project_monitoring_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `project_transact_id` int(20) NOT NULL,
  `project_title` varchar(150) NOT NULL,
  `period` datetime NOT NULL,
  `attendance_present` int(50) NOT NULL,
  `attendance_absent` int(150) NOT NULL,
  `nom_borrowers_delinquent` int(150) NOT NULL,
  `nom_borrowers_overdue` int(150) NOT NULL,
  `total_production` int(150) NOT NULL,
  `total_collection_sales` decimal(10,2) NOT NULL,
  `total_released_purchases` decimal(10,2) NOT NULL,
  `total_delinquent_account` decimal(10,2) NOT NULL,
  `total_over_due_account` decimal(10,2) NOT NULL,
  `cash_in_bank` decimal(10,2) NOT NULL,
  `cash_on_hand` decimal(10,2) NOT NULL,
  `inventories` decimal(10,2) NOT NULL,
  PRIMARY KEY (`project_monitoring_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_monitoring`
--

LOCK TABLES `project_monitoring` WRITE;
/*!40000 ALTER TABLE `project_monitoring` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `project_monitoring` VALUES (2,15,'sad','2023-03-29 00:00:00',12,12,12,12,213,2321.00,213.00,213.00,213.00,213.00,21321.00,123123.00);
/*!40000 ALTER TABLE `project_monitoring` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `project_monitoring` with 1 row(s)
--

--
-- Table structure for table `responsibility_center`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsibility_center` (
  `responsibility_center_id` int(20) NOT NULL AUTO_INCREMENT,
  `responsibility_center_code` varchar(50) NOT NULL,
  `responsibility_center_name` varchar(150) NOT NULL,
  `responsibility_created` datetime NOT NULL,
  PRIMARY KEY (`responsibility_center_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsibility_center`
--

LOCK TABLES `responsibility_center` WRITE;
/*!40000 ALTER TABLE `responsibility_center` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `responsibility_center` VALUES (1,'123','asdsadasd','2023-04-07 15:07:23'),(2,'21321','dsada','2023-04-07 15:14:08');
/*!40000 ALTER TABLE `responsibility_center` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `responsibility_center` with 2 row(s)
--

--
-- Table structure for table `responsible_section`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsible_section` (
  `responsible_section_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `responsible_section_name` varchar(150) NOT NULL,
  `responsible_section_created` datetime NOT NULL,
  PRIMARY KEY (`responsible_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsible_section`
--

LOCK TABLES `responsible_section` WRITE;
/*!40000 ALTER TABLE `responsible_section` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `responsible_section` VALUES (1,'asdsad','2023-04-07 15:48:41'),(2,'asdasd','2023-04-07 15:48:58'),(3,'3213','2023-04-07 15:59:57');
/*!40000 ALTER TABLE `responsible_section` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `responsible_section` with 3 row(s)
--

--
-- Table structure for table `trainings`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trainings` (
  `training_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `training_transact_id` int(20) NOT NULL,
  `title_of_training` varchar(150) NOT NULL,
  `number_of_participants` int(50) NOT NULL,
  `female` int(50) NOT NULL,
  `overall_ratings` varchar(150) NOT NULL,
  `name_of_trainor` varchar(150) NOT NULL,
  `training_created` datetime NOT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `trainings` VALUES (2,14,'asasd',122,12,'213','sadsad','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `trainings` with 1 row(s)
--

--
-- Table structure for table `transactions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transaction_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(50) NOT NULL,
  `number` int(150) NOT NULL,
  `date_and_time_filed` datetime NOT NULL,
  `responsible_section_id` int(150) NOT NULL,
  `type_of_activity_id` int(150) NOT NULL,
  `under_type_of_activity_id` int(150) DEFAULT NULL,
  `responsibility_center_id` int(150) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `cso_Id` int(150) NOT NULL,
  `is_project_monitoring` int(11) NOT NULL,
  `is_training` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `action_taken_date` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `transactions` VALUES (13,9,1,'2023-04-11 16:14:06',1,2,NULL,2,'2023-04-12 00:14:02',3,0,0,'','0000-00-00 00:00:00'),(14,9,2,'2023-04-11 16:14:39',1,5,NULL,2,'2023-04-12 00:14:02',3,0,1,'','0000-00-00 00:00:00'),(15,9,3,'2023-04-11 16:15:04',1,4,NULL,2,'2018-05-16 00:31:00',4,1,0,'','0000-00-00 00:00:00'),(16,9,4,'2023-04-11 16:44:17',1,2,NULL,2,'2023-04-12 00:44:11',4,0,0,'','0000-00-00 00:00:00'),(17,9,5,'2023-04-11 16:44:43',1,2,NULL,1,'2023-04-12 00:44:36',3,0,0,'','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `transactions` with 5 row(s)
--

--
-- Table structure for table `type_of_activities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_of_activities` (
  `type_of_activity_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `type_of_activity_name` varchar(150) NOT NULL,
  `type_act_created` datetime NOT NULL,
  PRIMARY KEY (`type_of_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_of_activities`
--

LOCK TABLES `type_of_activities` WRITE;
/*!40000 ALTER TABLE `type_of_activities` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `type_of_activities` VALUES (1,'asdsad','2023-04-07 16:34:00'),(2,'Job Vacancy Solicitation','2023-04-11 01:19:20'),(3,'Regular Monthly COOP Visit','2023-04-11 01:19:33'),(4,'Regular Monthly Project Monitoring','2023-04-11 01:19:45'),(5,'Training','2023-04-11 01:19:52');
/*!40000 ALTER TABLE `type_of_activities` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `type_of_activities` with 5 row(s)
--

--
-- Table structure for table `under_type_of_activity`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `under_type_of_activity` (
  `under_type_act_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `typ_ac_id` int(50) NOT NULL,
  `under_type_act_name` varchar(150) NOT NULL,
  `under_type_act_created` datetime NOT NULL,
  PRIMARY KEY (`under_type_act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `under_type_of_activity`
--

LOCK TABLES `under_type_of_activity` WRITE;
/*!40000 ALTER TABLE `under_type_of_activity` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `under_type_of_activity` VALUES (2,1,'sample','2023-04-07 16:54:18'),(3,5,'asdsad','2023-04-07 16:55:47'),(4,5,'asd','2023-04-07 16:55:53'),(5,5,'wrer','2023-04-11 01:21:14');
/*!40000 ALTER TABLE `under_type_of_activity` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `under_type_of_activity` with 4 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email_address` varchar(10) NOT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (2,'Sample','','sample','','','','','user','active','useruser','user','2023-04-06 14:03:07'),(8,'Mark','','Artigas',NULL,'','',NULL,'admin','active','markuser','$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6','2023-04-06 16:32:32'),(9,'Basil John','C.','Manabo',NULL,'','',NULL,'user','active','basiluser','$2y$10$9/ESqpwWBUnryLu3QtGE5OK3qNrA/nvSTp42sOH650.fNNbeyXYMu','2023-04-07 03:04:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 3 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Wed, 12 Apr 2023 07:47:48 +0000
