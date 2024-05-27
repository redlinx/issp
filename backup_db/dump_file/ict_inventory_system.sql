-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: ict_inventory_system
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrative_system`
--

DROP TABLE IF EXISTS `administrative_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrative_system` (
  `is_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`is_id`),
  CONSTRAINT `fk_administrative_system_information_system1` FOREIGN KEY (`is_id`) REFERENCES `information_system` (`is_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrative_system`
--

LOCK TABLES `administrative_system` WRITE;
/*!40000 ALTER TABLE `administrative_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrative_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment` (
  `ass_id` int NOT NULL AUTO_INCREMENT,
  `fs_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `hd_id` int DEFAULT NULL,
  `t_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ass_id`),
  KEY `fk_Assignment_Fronline_services1_idx` (`fs_id`),
  KEY `fk_Assignment_Employee1_idx` (`emp_id`),
  KEY `fk_Assignment_Hardware_Devices1_idx` (`hd_id`),
  KEY `fk_assignment_training1_idx` (`t_id`),
  CONSTRAINT `fk_Assignment_Employee1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `fk_Assignment_Fronline_services1` FOREIGN KEY (`fs_id`) REFERENCES `frontline_services` (`fs_id`),
  CONSTRAINT `fk_Assignment_Hardware_Devices1` FOREIGN KEY (`hd_id`) REFERENCES `hardware_devices` (`hd_id`),
  CONSTRAINT `fk_assignment_training1` FOREIGN KEY (`t_id`) REFERENCES `training` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,NULL,1,1,NULL,'2024-03-02 02:13:31','2024-03-02 02:13:31',NULL),(4,NULL,1,4,NULL,'2024-04-18 08:36:03','2024-04-18 08:36:03',NULL),(7,NULL,3,13,NULL,'2024-04-30 07:44:51','2024-04-30 07:44:51',NULL);
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bridge_link`
--

DROP TABLE IF EXISTS `bridge_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bridge_link` (
  `bl_id` int NOT NULL AUTO_INCREMENT,
  `hd_id` int NOT NULL,
  `soft_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bl_id`),
  KEY `fk_Bridge_link_Hardware_Devices1_idx` (`hd_id`),
  KEY `fk_bridge_link_software1_idx` (`soft_id`),
  CONSTRAINT `fk_Bridge_link_Hardware_Devices1` FOREIGN KEY (`hd_id`) REFERENCES `hardware_devices` (`hd_id`),
  CONSTRAINT `fk_bridge_link_software1` FOREIGN KEY (`soft_id`) REFERENCES `software` (`soft_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bridge_link`
--

LOCK TABLES `bridge_link` WRITE;
/*!40000 ALTER TABLE `bridge_link` DISABLE KEYS */;
INSERT INTO `bridge_link` VALUES (8,4,9,'2024-05-18 08:00:56','2024-05-18 08:00:56',NULL),(9,14,9,'2024-05-18 08:00:56','2024-05-18 08:00:56',NULL),(10,27,17,'2024-05-22 19:09:11','2024-05-22 19:09:11',NULL),(11,28,18,'2024-05-22 19:10:28','2024-05-22 19:10:28',NULL),(12,29,19,'2024-05-22 19:10:34','2024-05-22 19:10:34',NULL),(14,31,21,'2024-05-22 21:21:39','2024-05-22 21:21:39',NULL);
/*!40000 ALTER TABLE `bridge_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_link`
--

DROP TABLE IF EXISTS `data_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_link` (
  `dl_id` int NOT NULL AUTO_INCREMENT,
  `db_id` int NOT NULL,
  `is_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dl_id`),
  KEY `fk_Data_link_database1_idx` (`db_id`),
  KEY `fk_Data_link_Information_system1_idx` (`is_id`),
  CONSTRAINT `fk_Data_link_database1` FOREIGN KEY (`db_id`) REFERENCES `database` (`db_id`),
  CONSTRAINT `fk_Data_link_Information_system1` FOREIGN KEY (`is_id`) REFERENCES `information_system` (`is_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_link`
--

LOCK TABLES `data_link` WRITE;
/*!40000 ALTER TABLE `data_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `database`
--

DROP TABLE IF EXISTS `database`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `database` (
  `db_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `oip` varchar(1) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `database_Management_Software` varchar(100) DEFAULT NULL,
  `maintenance_Cost` int DEFAULT NULL,
  `use` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `database`
--

LOCK TABLES `database` WRITE;
/*!40000 ALTER TABLE `database` DISABLE KEYS */;
/*!40000 ALTER TABLE `database` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Nestnie','Honrada','D.','2024-03-02 02:05:58','2024-03-02 02:05:58',NULL),(2,'Rhoderick','Malangsa','D.','2024-03-21 02:49:30','2024-03-21 02:49:30',NULL),(3,'Geanrose ','Colonia','L.','2024-04-29 06:49:42','2024-04-29 06:49:42',NULL),(9,'elijah','roa','rosello','2024-05-08 06:08:26','2024-05-12 09:47:42',NULL),(10,'lex','Batestil','roa','2024-05-12 18:20:10','2024-05-12 18:20:10',NULL),(11,'Jefferson','Rosello','Roa','2024-05-12 18:41:56','2024-05-12 18:41:56',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `externally_funded_project`
--

DROP TABLE IF EXISTS `externally_funded_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `externally_funded_project` (
  `project_id` int NOT NULL,
  `funder_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `fk_Externally_funded_project_project1_idx` (`project_id`),
  CONSTRAINT `fk_Externally_funded_project_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `externally_funded_project`
--

LOCK TABLES `externally_funded_project` WRITE;
/*!40000 ALTER TABLE `externally_funded_project` DISABLE KEYS */;
INSERT INTO `externally_funded_project` VALUES (187,'DICT','2024-05-22 23:54:02','2024-05-22 23:54:02',NULL);
/*!40000 ALTER TABLE `externally_funded_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frontline_services`
--

DROP TABLE IF EXISTS `frontline_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `frontline_services` (
  `fs_id` int NOT NULL AUTO_INCREMENT,
  `services` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`fs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frontline_services`
--

LOCK TABLES `frontline_services` WRITE;
/*!40000 ALTER TABLE `frontline_services` DISABLE KEYS */;
INSERT INTO `frontline_services` VALUES (1,'open na','2024-04-18 02:35:04','2024-05-12 09:59:15',NULL),(3,'Registrar','2024-05-12 18:38:51','2024-05-12 18:38:51',NULL);
/*!40000 ALTER TABLE `frontline_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardware_devices`
--

DROP TABLE IF EXISTS `hardware_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hardware_devices` (
  `hd_id` int NOT NULL AUTO_INCREMENT,
  `proj_id` int DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date_Procured` date DEFAULT NULL,
  `ownership` varchar(45) DEFAULT NULL,
  `gass_Sto` varchar(255) DEFAULT NULL,
  `code_number` varchar(255) DEFAULT NULL,
  `asset_classification` varchar(255) DEFAULT NULL,
  `model_number` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `aquisition_cost` varchar(255) DEFAULT NULL,
  `property_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hd_id`),
  KEY `fk_Hardware_Devices_Project1_idx` (`proj_id`),
  CONSTRAINT `fk_Hardware_Devices_Project1` FOREIGN KEY (`proj_id`) REFERENCES `project` (`proj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardware_devices`
--

LOCK TABLES `hardware_devices` WRITE;
/*!40000 ALTER TABLE `hardware_devices` DISABLE KEYS */;
INSERT INTO `hardware_devices` VALUES (1,1,'AIO Personal Computer Acer','Monitor','2022-08-24','owned',NULL,'2022-09-0099','PPE','Asphire C27-1655','DQBHLSP001210008176B01','P60,375.00','2022-0503-B/JOEBZ COMPUTER SALES & SERVICES','2024-02-29 08:27:32','2024-05-15 23:14:45',NULL),(4,1,'Branded PC Acer  i7-12700/16G','Desktop PC','2022-11-09','owned',NULL,'2022-12-0131','NON-EXPENDABLE','Acer i7-12700','DTBHVSP00A227009279600','P62,548.00','2022-0845-B/ELECTRO COMPUTER DATE SYSTEM','2024-03-21 03:00:59','2024-03-21 03:00:59',NULL),(13,1,'All-in-One Branded Computer Acer','Desktop PC','2024-04-30','owned','0','2022-08-0097','PPE','Acer Aspire C27-1655 RMN: D18L2','DQBGFSP00615000','P64,050.00','2022-0503-1/JOEBZ COMPUTER SALES & SERVICES','2024-04-30 07:44:13','2024-04-30 07:44:13',NULL),(14,1,'All-in-One Branded Computer Acer','Desktop PC','2022-08-24','owned','0','2022-08-0097','PPE','Acer Aspire C27-1655 RMN: D18L2','DQBGFSP00615000','P64,050.00','2022-0503-1/JOEBZ COMPUTER SALES & SERVICES','2024-04-30 07:44:51','2024-04-30 07:44:51',NULL),(15,1,'test','server','2024-05-04','owned',NULL,'test','test','test','test',NULL,'tses','2024-05-14 08:53:48','2024-05-14 08:53:48',NULL),(16,NULL,'test','server','2024-05-15','owned','0','test','tset','adsfasdf','adsfasdf',NULL,'sdsfg','2024-05-14 09:17:46','2024-05-14 09:17:46',NULL),(17,NULL,'test','server','2024-05-15','owned','0','test','tset','adsfasdf','adsfasdf',NULL,'sdsfg','2024-05-14 09:17:51','2024-05-14 09:17:51',NULL),(18,NULL,'test','server','2024-05-15','owned','0','test','tset','adsfasdf','adsfasdf',NULL,'sdsfg','2024-05-14 09:17:52','2024-05-14 09:17:52',NULL),(19,NULL,'test','server','2024-05-22','owned','0','tset','test','tset','tset',NULL,'tset','2024-05-14 09:21:59','2024-05-14 09:21:59',NULL),(20,NULL,'test','server','2024-02-09','owned','0','ret','tset','sdg','sdg','set','sdsg','2024-05-14 10:08:49','2024-05-14 10:08:49',NULL),(21,1,'test','server','2024-02-09','owned','0','ret','tset','sdg','sdg','set','sdsg','2024-05-14 10:10:14','2024-05-14 10:10:14',NULL),(22,NULL,'test','Desktop PC','2024-05-18','owned','0','test','test','test','test','test','test','2024-05-22 18:43:49','2024-05-22 18:43:49',NULL),(23,NULL,'test','Desktop PC','2024-05-11','owned','0','test','test','test','test','test','test','2024-05-22 18:47:59','2024-05-22 18:47:59',NULL),(24,NULL,'test','Desktop PC','2024-04-14','owned','0','test','test','test','test','test','test','2024-05-22 18:50:03','2024-05-22 18:50:03',NULL),(25,NULL,'test','Desktop PC','2024-05-11','owned','0','test','test','test','test','test','test','2024-05-22 19:02:21','2024-05-22 19:02:21',NULL),(27,178,'test','Desktop PC','2024-05-18','owned','0','test','test','test','test','test','test','2024-05-23 03:09:11','2024-05-23 03:09:11',NULL),(28,178,'test','Desktop PC','2024-05-18','owned','0','test','test','test','test','test','test','2024-05-23 03:10:28','2024-05-23 03:10:28',NULL),(29,178,'test','Desktop PC','2024-05-18','owned','0','test','test','test','test','test','test','2024-05-23 03:10:34','2024-05-23 03:10:34',NULL),(30,179,'test','Desktop PC','2024-05-13','owned','0','test','test','test','test','test','test','2024-05-23 03:14:08','2024-05-23 03:14:08',NULL),(31,180,'test','Desktop PC','2024-05-03','owned','0','test','test','test','test','test','test','2024-05-23 05:21:39','2024-05-23 05:21:39',NULL),(32,185,'test','Desktop PC','2024-05-10','owned','0','test','test','test','test','test','test','2024-05-23 05:34:55','2024-05-23 05:34:55',NULL),(33,186,'test','Desktop PC','2024-05-12','owned','0','test','test','test','test','test','test','2024-05-23 05:53:41','2024-05-23 05:53:41',NULL);
/*!40000 ALTER TABLE `hardware_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information_system`
--

DROP TABLE IF EXISTS `information_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `information_system` (
  `is_id` int NOT NULL AUTO_INCREMENT,
  `proj_id` int NOT NULL,
  `system_Name` varchar(100) DEFAULT NULL,
  `system_Type` varchar(100) DEFAULT NULL,
  `oip` varchar(1) DEFAULT NULL,
  `dev_Platform` varchar(100) DEFAULT NULL,
  `work_Environment` varchar(1) DEFAULT NULL,
  `maintenance_Cost` int DEFAULT NULL,
  `use` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`is_id`),
  KEY `fk_information_system_project1_idx` (`proj_id`),
  CONSTRAINT `fk_information_system_project1` FOREIGN KEY (`proj_id`) REFERENCES `project` (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information_system`
--

LOCK TABLES `information_system` WRITE;
/*!40000 ALTER TABLE `information_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `information_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internally_funded_project`
--

DROP TABLE IF EXISTS `internally_funded_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `internally_funded_project` (
  `proj_id` int NOT NULL,
  `funder_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proj_id`),
  KEY `fk_Internally_funded_project_project1_idx` (`proj_id`),
  CONSTRAINT `fk_Internally_funded_project_project1` FOREIGN KEY (`proj_id`) REFERENCES `project` (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internally_funded_project`
--

LOCK TABLES `internally_funded_project` WRITE;
/*!40000 ALTER TABLE `internally_funded_project` DISABLE KEYS */;
INSERT INTO `internally_funded_project` VALUES (1,'SLSU Main Campus','2024-04-23 17:56:54','2024-04-23 17:56:54',NULL);
/*!40000 ALTER TABLE `internally_funded_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operating_system`
--

DROP TABLE IF EXISTS `operating_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operating_system` (
  `soft_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`soft_id`),
  CONSTRAINT `fk_Operating System_software1` FOREIGN KEY (`soft_id`) REFERENCES `software` (`soft_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operating_system`
--

LOCK TABLES `operating_system` WRITE;
/*!40000 ALTER TABLE `operating_system` DISABLE KEYS */;
INSERT INTO `operating_system` VALUES (14,'2024-05-22 18:50:03','2024-05-22 18:50:03','2024-05-23 02:50:03'),(17,'2024-05-23 03:09:11','2024-05-23 03:09:11','2024-05-23 03:09:11'),(18,'2024-05-23 03:10:28','2024-05-23 03:10:28','2024-05-23 03:10:28'),(19,'2024-05-23 03:10:34','2024-05-23 03:10:34','2024-05-23 03:10:34'),(21,'2024-05-23 05:21:39','2024-05-23 05:21:39','2024-05-23 05:21:39'),(23,'2024-05-23 05:53:41','2024-05-23 05:53:41','2024-05-23 05:53:41');
/*!40000 ALTER TABLE `operating_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `proj_id` int NOT NULL AUTO_INCREMENT,
  `project_Name` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `project_started` date DEFAULT NULL,
  `project_ended` date DEFAULT NULL,
  `proj_fund` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Regular Operations of UISA/Office Supplies','UISA','2024-01-01',NULL,'Internally Funded','2024-03-01 09:55:20','2024-03-01 09:55:20',NULL),(178,'test','IGP','2024-05-03',NULL,'Externally Funded','2024-05-22 19:08:49','2024-05-22 19:08:49',NULL),(179,'charot','IGP','2024-05-11',NULL,'Externally Funded','2024-05-22 19:13:45','2024-05-22 19:13:45',NULL),(180,'project prototype y','IGP','2024-05-10',NULL,'Externally Funded','2024-05-22 21:21:19','2024-05-22 21:21:19',NULL),(185,'shet','IGP','2024-05-12',NULL,'Externally Funded','2024-05-22 21:34:10','2024-05-22 21:34:10',NULL),(186,'uyta','IGP','2024-05-16',NULL,'Externally Funded','2024-05-22 21:53:12','2024-05-22 21:53:12',NULL),(187,'kapekape','IGP','2024-05-10',NULL,'Externally Funded','2024-05-22 23:54:02','2024-05-22 23:54:02',NULL);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server`
--

DROP TABLE IF EXISTS `server`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `server` (
  `hd_id` int NOT NULL,
  `total_Capacity` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hd_id`),
  KEY `fk_Server_Hardware_Devices1_idx` (`hd_id`),
  CONSTRAINT `fk_Server_Hardware_Devices1` FOREIGN KEY (`hd_id`) REFERENCES `hardware_devices` (`hd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server`
--

LOCK TABLES `server` WRITE;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
/*!40000 ALTER TABLE `server` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `software` (
  `soft_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `exp_year` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`soft_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software`
--

LOCK TABLES `software` WRITE;
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT INTO `software` VALUES (3,'Operating System','Windows 8 and up','lifetime',NULL,'2024-04-22 06:32:09','2024-04-23 08:10:30',NULL),(9,'Office Automation Software','MS Office 2006','not lifetime',NULL,'2024-05-17 23:57:08','2024-05-18 00:01:18',NULL),(10,'Office Automation Software','MS Office 2010','lifetime',NULL,'2024-05-18 00:00:18','2024-05-18 00:00:18',NULL),(11,'Office Automation Software','MS Office 2019','lifetime',NULL,'2024-05-18 00:00:22','2024-05-18 00:00:22',NULL),(12,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-22 18:43:49','2024-05-22 18:43:49',NULL),(13,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-22 18:47:59','2024-05-22 18:47:59',NULL),(14,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 02:50:03','2024-05-23 02:50:03',NULL),(15,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 03:02:21','2024-05-23 03:02:21',NULL),(16,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 03:08:19','2024-05-23 03:08:19',NULL),(17,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 03:09:11','2024-05-23 03:09:11',NULL),(18,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 03:10:28','2024-05-23 03:10:28',NULL),(19,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 03:10:34','2024-05-23 03:10:34',NULL),(21,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 05:21:39','2024-05-23 05:21:39',NULL),(23,'Operating System','Windows 11','lifetimelicense',NULL,'2024-05-23 05:53:41','2024-05-23 05:53:41',NULL);
/*!40000 ALTER TABLE `software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategic_information_system`
--

DROP TABLE IF EXISTS `strategic_information_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strategic_information_system` (
  `is_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`is_id`),
  CONSTRAINT `fk_strategic_information_system_information_system1` FOREIGN KEY (`is_id`) REFERENCES `information_system` (`is_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategic_information_system`
--

LOCK TABLES `strategic_information_system` WRITE;
/*!40000 ALTER TABLE `strategic_information_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `strategic_information_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `training_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
INSERT INTO `training` VALUES (4,'kape','2024-05-09 22:59:38','2024-05-09 22:59:38',NULL),(5,'choco','2024-05-09 22:59:38','2024-05-12 09:47:27',NULL),(7,'water service','2024-05-12 18:03:51','2024-05-12 18:03:51',NULL),(8,'juice service','2024-05-12 18:04:36','2024-05-12 18:04:36',NULL);
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ebatestil@southernleytestateu.edu.ph','$2a$12$.wA8z.9T.8n77Pkw8jMR6OeUC98TQDzSbP7vKIqIDCWZryCTHt35y','2024-03-20 01:05:35','2024-03-20 01:05:35',NULL),(2,'fpadao@southernleytestateu.edu.ph','$2a$12$zsIzT/FgRf33rS062Yi61ONoGnVBFowFPBt56CsDaquAqKchggHq6','2024-04-24 03:40:18','2024-04-24 03:40:18',NULL);
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

-- Dump completed on 2024-05-27 13:42:55
