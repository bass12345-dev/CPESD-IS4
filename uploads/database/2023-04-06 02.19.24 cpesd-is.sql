-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: cpesd-is
-- ------------------------------------------------------
-- Server version 	10.4.24-MariaDB
-- Date: Thu, 06 Apr 2023 14:19:24 +0000

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cso`
--

LOCK TABLES `cso` WRITE;
/*!40000 ALTER TABLE `cso` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cso` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cso` with 0 row(s)
--

--
-- Table structure for table `cso_officers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cso_officers` (
  `cso_officer_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `cso_officer_created` datetime NOT NULL,
  PRIMARY KEY (`cso_officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cso_officers`
--

LOCK TABLES `cso_officers` WRITE;
/*!40000 ALTER TABLE `cso_officers` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cso_officers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cso_officers` with 0 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
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
  `inventories` int(150) NOT NULL,
  PRIMARY KEY (`project_monitoring_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_monitoring`
--

LOCK TABLES `project_monitoring` WRITE;
/*!40000 ALTER TABLE `project_monitoring` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `project_monitoring` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `project_monitoring` with 0 row(s)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsible_section`
--

LOCK TABLES `responsible_section` WRITE;
/*!40000 ALTER TABLE `responsible_section` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `responsible_section` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `responsible_section` with 0 row(s)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `trainings` with 0 row(s)
--

--
-- Table structure for table `transactions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transaction_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` varchar(50) NOT NULL,
  `number` int(150) NOT NULL,
  `date_and_time_filed` datetime NOT NULL,
  `responsible_section_id` int(150) NOT NULL,
  `type_of_activity_id` int(150) NOT NULL,
  `under_type_of_activity_id` int(150) NOT NULL,
  `responsibility_center_id` int(150) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `cso_Id` int(150) NOT NULL,
  `is_project_monitoring` int(11) NOT NULL DEFAULT 1,
  `is_traning` int(11) NOT NULL DEFAULT 1,
  `remarks` text NOT NULL,
  `action_taken_date` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `transactions` with 0 row(s)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_of_activities`
--

LOCK TABLES `type_of_activities` WRITE;
/*!40000 ALTER TABLE `type_of_activities` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `type_of_activities` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `type_of_activities` with 0 row(s)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `under_type_of_activity`
--

LOCK TABLES `under_type_of_activity` WRITE;
/*!40000 ALTER TABLE `under_type_of_activity` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `under_type_of_activity` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `under_type_of_activity` with 0 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email_address` varchar(10) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'Basil','','Manabo','','','','','admin','active','admin','admin','2023-04-06 14:02:41'),(2,'Sample','','sample','','','','','user','active','user','user','2023-04-06 14:03:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 2 row(s)
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

-- Dump completed on: Thu, 06 Apr 2023 14:19:24 +0000
