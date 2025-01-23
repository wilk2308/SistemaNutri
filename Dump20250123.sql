-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nutricional
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'admin','Grupo de administradores com acesso total'),(2,'financeiro','Grupo de editores com permissões limitadas'),(3,'tecnologia','Grupo de administradores com acesso total'),(4,'rh','Grupo de editores com permissões limitadas'),(5,'diretoria','Grupo de administradores com acesso total'),(6,'juridico','Grupo de editores com permissões limitadas'),(7,'marketing','Grupo de editores com permissões limitadas'),(8,'vendas','Grupo de editores com permissões limitadas'),(9,'atendimento','Grupo de editores com permissões limitadas'),(10,'gestao','Grupo de administradores com acesso total');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `auth_groups_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
INSERT INTO `auth_groups_permissions` VALUES (4,4);
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (4,23,'admin','2024-12-17 14:35:11'),(5,24,'vendas','2024-12-17 14:36:22'),(6,23,'tecnologia','2024-12-17 14:41:20'),(7,33,'financeiro','2024-12-17 14:43:49'),(8,30,'atendimento','2024-12-17 14:44:47'),(9,26,'financeiro','2024-12-17 14:45:12'),(10,29,'diretoria','2024-12-17 14:45:52'),(11,28,'marketing','2024-12-17 14:46:12'),(12,27,'rh','2024-12-17 14:46:48'),(13,29,'gestao','2024-12-17 14:47:43'),(14,23,'rh','2024-12-18 09:53:00');
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_identities`
--

DROP TABLE IF EXISTS `auth_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_identities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_identities`
--

LOCK TABLES `auth_identities` WRITE;
/*!40000 ALTER TABLE `auth_identities` DISABLE KEYS */;
INSERT INTO `auth_identities` VALUES (12,23,'email_password',NULL,'william.sousa@bocayuvaadvogados.com.br','$2y$12$ffnJLmK9S7XHQJusVOoZQObj0hjlV2d.AAkkTfEVvhalAIZYIjKqG',NULL,NULL,0,'2025-01-23 02:59:57','2024-10-31 12:56:01','2025-01-23 02:59:57',NULL,NULL),(13,24,'email_password',NULL,'gabriel.cardoso@bocayuvaadvogados.com.br','$2y$12$GaeWu9RxA9tfmrx2XSZeaOHVhIri7r57AZ4VBsU6tFEkgb/hp3xlq',NULL,NULL,0,NULL,'2024-10-31 12:56:01','2024-10-31 12:56:02',NULL,NULL),(14,25,'email_password',NULL,'hane.rocha@bocayuvaadvogados.com.br','$2y$12$/dAdaFgOvumQYejt6QZNoeVWpZxcHZx5oUqOkSVj4ZcbXPOWcQqsG',NULL,NULL,0,NULL,'2024-10-31 12:56:02','2024-10-31 12:56:02',NULL,NULL),(15,26,'email_password',NULL,'jéssica.soares@bocayuvaadvogados.com.br','$2y$12$3l0DT7VlpCnz0Wt.1c3Fpe0AWLyw2cf5Z49MnU0K4ZnoTRv54KIya',NULL,NULL,0,NULL,'2024-10-31 12:56:02','2024-10-31 12:56:02',NULL,NULL),(16,27,'email_password',NULL,'kelli.cristina@bocayuvaadvogados.com.br','$2y$12$zLEd1eh8M1OxHljzmEwPHenHAm534yX34TUsjmF4NC5pBbY5AF.Fq',NULL,NULL,0,NULL,'2024-10-31 12:56:03','2024-10-31 12:56:03',NULL,NULL),(17,28,'email_password',NULL,'mateus.soares@bocayuvaadvogados.com.br','$2y$12$flgMp3QauoDdi8NhFT2A3OPEg/C1Ibt4l6pbiCZb2R.iC5b1kiomy',NULL,NULL,0,NULL,'2024-10-31 12:56:03','2024-10-31 12:56:03',NULL,NULL),(18,29,'email_password',NULL,'paula.hartmann@bocayuvaadvogados.com.br','$2y$12$E.rRJ08X2OAU/9y1WWFf2.f11qN1U.Oi5Jy69JaAq0wsLbUd5a2O6',NULL,NULL,0,'2024-12-18 00:24:28','2024-10-31 12:56:03','2024-12-18 00:24:28',NULL,NULL),(19,30,'email_password',NULL,'petrine.pintor@bocayuvaadvogados.com.br','$2y$12$4ky4QcIeEFropixw.aB9HeIb5CcnQy/QBqzHB9nQ7EYr0TqmQ/EBG',NULL,NULL,0,NULL,'2024-10-31 12:56:04','2024-10-31 12:56:04',NULL,NULL),(20,31,'email_password',NULL,'rafaela.paiva@bocayuvaadvogados.com.br','$2y$12$zdzAVBY4a8/e/eKL3FqedemD5qEAR1BZivVMQkgfdGfKgmWJFbjee',NULL,NULL,0,'2024-12-26 19:45:03','2024-10-31 12:56:04','2024-12-26 19:45:03',NULL,NULL),(21,32,'email_password',NULL,'raissa.fernandes@bocayuvaadvogados.com.br','$2y$12$hAgRGua2U93HfaGVozsV5usSGYp1F1bn3ozSLvPJ9mW4ya1jmDgw.',NULL,NULL,0,NULL,'2024-10-31 12:56:05','2024-10-31 12:56:05',NULL,NULL),(22,33,'email_password',NULL,'thamires.belo@bocayuvaadvogados.com.br','$2y$12$eJ4QlAQda.8YjZYpc5SkLOOzpGe1C3bH16aI3cdOF9xnQwf.f1vZm',NULL,NULL,0,NULL,'2024-10-31 12:56:05','2024-10-31 12:56:05',NULL,NULL);
/*!40000 ALTER TABLE `auth_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 18:36:59',0),(2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 18:37:05',1),(3,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 19:50:23',0),(4,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 19:50:36',0),(5,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 19:50:43',1),(6,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 19:57:15',1),(7,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 20:27:42',0),(8,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 20:27:58',1),(9,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','ww',NULL,'2024-01-31 20:37:16',0),(10,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 20:39:30',1),(11,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','wweq',NULL,'2024-01-31 20:53:56',0),(12,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 20:54:09',0),(13,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 20:54:25',1),(14,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-01-31 20:55:45',0),(15,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 20:56:31',1),(16,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 20:59:20',1),(17,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 21:04:39',1),(18,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 21:19:37',1),(19,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 21:21:40',1),(20,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 21:23:22',1),(21,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-01-31 21:24:41',1),(22,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 13:03:04',1),(23,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','www',NULL,'2024-02-01 18:12:22',0),(24,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:12:30',1),(25,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:13:35',1),(26,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:14:20',1),(27,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:15:40',1),(28,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:18:13',1),(29,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:22:12',1),(30,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:23:35',1),(31,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:25:01',1),(32,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 18:38:06',1),(33,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 20:10:58',1),(34,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 20:46:06',1),(35,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-02-01 20:46:24',0),(36,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 20:46:56',1),(37,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.comt',NULL,'2024-02-01 20:52:48',0),(38,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 20:53:08',1),(39,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 20:53:28',1),(40,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-01 21:15:11',1),(41,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:10:45',1),(42,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:12:15',1),(43,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.comm',NULL,'2024-02-02 01:16:49',0),(44,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:19:01',1),(45,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:20:35',1),(46,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:20:54',1),(47,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 01:27:40',1),(48,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 03:33:15',1),(49,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 04:35:57',1),(50,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 13:37:00',1),(51,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 13:37:23',1),(52,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 17:21:57',1),(53,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 17:34:23',1),(54,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 17:42:08',1),(55,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-02 18:21:30',1),(56,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-05 16:14:12',1),(57,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-05 18:21:44',1),(58,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-05 19:45:53',1),(59,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 00:22:29',1),(60,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 00:22:47',1),(61,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 00:34:43',1),(62,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 00:49:22',1),(63,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-02-06 00:59:15',0),(64,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf23',NULL,'2024-02-06 00:59:34',0),(65,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 01:01:13',1),(66,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 01:03:28',1),(67,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 12:28:32',1),(68,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 14:53:20',1),(69,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 15:04:00',1),(70,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 20:05:43',1),(71,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-06 20:33:19',1),(72,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-07 17:36:42',1),(73,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-07 17:38:49',1),(74,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-08 14:09:23',1),(75,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-08 14:22:00',1),(76,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-08 20:07:40',1),(77,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-08 20:11:11',1),(78,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-09 12:50:21',1),(79,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-09 13:29:45',1),(80,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-09 14:41:03',1),(81,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-09 14:42:10',1),(82,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-14 16:51:40',1),(83,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-16 20:16:27',1),(84,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.commmm',NULL,'2024-02-19 17:34:54',0),(85,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-19 17:35:02',1),(86,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-20 14:42:33',1),(87,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-20 17:38:15',1),(88,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-21 13:45:03',1),(89,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-22 12:37:43',1),(90,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-22 13:47:33',1),(91,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-26 14:43:34',1),(92,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-27 20:59:15',1),(93,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-28 17:52:14',1),(94,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-29 14:24:30',1),(95,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.comm',NULL,'2024-02-29 14:32:00',0),(96,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-02-29 14:32:06',1),(97,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-04 15:17:16',1),(98,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-05 13:54:21',1),(99,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-05 19:39:41',1),(100,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-06 13:02:31',1),(101,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-06 17:43:46',1),(102,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-06 20:38:32',1),(103,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-07 13:23:31',1),(104,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-07 20:44:03',1),(105,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-07 21:41:40',1),(106,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-07 21:41:49',1),(107,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-08 13:30:06',1),(108,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-11 13:48:13',1),(109,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-11 18:27:55',1),(110,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-13 17:52:10',1),(111,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-13 19:09:58',1),(112,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-13 20:58:37',1),(113,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-13 20:58:55',1),(114,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-13 21:15:38',1),(115,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-14 11:59:26',1),(116,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-18 12:04:25',1),(117,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-18 18:42:53',1),(118,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-19 14:34:36',1),(119,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-19 17:32:25',1),(120,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-21 13:25:32',1),(121,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-21 17:10:51',1),(122,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-22 15:00:13',1),(123,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-22 15:10:35',1),(124,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-22 17:49:19',1),(125,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-25 15:25:28',1),(126,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-03-25 20:54:40',1),(127,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-07-26 21:44:56',1),(128,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-07-29 15:18:06',1),(129,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-07-29 15:22:54',1),(130,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-07-29 15:23:04',1),(131,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-07 14:48:49',1),(132,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-15 17:35:00',1),(133,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-15 18:10:46',1),(134,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-21 12:03:25',1),(135,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-21 18:57:29',1),(136,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-21 19:00:30',1),(137,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-21 22:43:01',1),(138,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-22 11:09:14',1),(139,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-22 18:52:08',1),(140,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-23 11:21:41',1),(141,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-23 14:23:07',1),(142,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-08-23 18:12:05',1),(143,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 13:22:34',1),(144,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 14:28:57',1),(145,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-09-04 14:30:08',0),(146,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 14:30:26',1),(147,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 14:31:51',1),(148,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 16:46:38',1),(149,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 16:46:55',1),(150,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 17:02:23',1),(151,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 17:13:58',1),(152,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 17:16:01',1),(153,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 17:47:51',1),(154,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 19:18:13',1),(155,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 19:20:53',1),(156,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 19:24:10',1),(157,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 19:27:12',1),(158,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',NULL,'2024-09-04 19:44:00',0),(159,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-04 19:58:06',1),(160,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-12 13:11:45',1),(161,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',1,'2024-09-12 13:13:55',1),(162,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-09-13 11:34:51',0),(163,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-13 11:35:31',1),(164,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-13 11:44:23',1),(165,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-25 14:09:35',1),(166,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.comm',NULL,'2024-09-25 14:10:46',0),(167,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-25 14:14:17',1),(168,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-25 14:14:28',1),(169,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-25 14:16:14',1),(170,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-09-25 14:21:15',1),(171,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-02 13:53:25',1),(172,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-02 22:15:53',1),(173,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-02 22:24:31',1),(174,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-03 12:54:56',1),(175,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-03 12:59:13',1),(176,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-08 13:15:57',1),(177,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-25 12:58:31',1),(178,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-25 17:04:06',1),(179,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',22,'2024-10-31 11:13:54',1),(180,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 12:58:45',1),(181,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',NULL,'2024-10-31 13:02:30',0),(182,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:03:45',1),(183,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:14:12',1),(184,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:16:09',1),(185,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:18:13',1),(186,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:20:09',1),(187,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:25:48',1),(188,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:28:34',1),(189,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 13:58:59',1),(190,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:07:16',1),(191,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:07:54',1),(192,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:13:27',1),(193,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:15:38',1),(194,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:22:54',1),(195,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','email_password','williamdf2308@gmail.com',NULL,'2024-10-31 14:23:27',0),(196,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:23:32',1),(197,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:26:06',1),(198,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:33:23',1),(199,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-10-31 14:35:53',0),(200,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:35:56',1),(201,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-10-31 14:41:01',0),(202,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:41:04',1),(203,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-10-31 14:46:58',0),(204,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 14:47:02',1),(205,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-10-31 23:08:30',1),(206,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-01 01:52:45',1),(207,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-01 13:22:28',1),(208,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-01 14:43:32',1),(209,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-01 19:17:32',1),(210,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-08 22:16:06',0),(211,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-08 22:16:24',1),(212,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-13 13:59:51',0),(213,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-13 13:59:56',1),(214,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','email_password','williamdf2308@gmail.com',NULL,'2024-11-13 20:03:06',0),(215,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-13 20:03:10',1),(216,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-14 00:01:35',0),(217,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-14 00:01:40',1),(218,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-14 12:26:58',0),(219,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-14 12:27:02',1),(220,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-14 14:59:00',0),(221,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-14 14:59:04',1),(222,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-15 13:10:36',0),(223,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-15 13:10:44',1),(224,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-19 14:21:52',0),(225,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-19 14:22:00',1),(226,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-19 19:26:57',0),(227,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-19 19:41:02',1),(228,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-20 03:51:17',0),(229,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-20 03:51:23',1),(230,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-21 13:02:07',1),(231,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-26 14:05:53',1),(232,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-27 12:55:24',1),(233,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-27 23:45:23',1),(234,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-28 11:48:35',1),(235,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-11-28 13:36:21',0),(236,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-28 13:46:50',1),(237,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-29 12:34:58',1),(238,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-11-29 16:43:58',1),(239,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-05 13:05:29',1),(240,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-06 12:23:45',1),(241,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-12 11:49:56',1),(242,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-12 19:39:43',1),(243,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-12 21:51:24',1),(244,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-12 22:30:05',1),(245,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-12 22:39:07',1),(246,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-13 13:25:34',1),(247,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-17 16:42:07',1),(248,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-17 22:41:35',1),(249,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-17 22:49:05',1),(250,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-17 23:16:31',1),(251,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','paula.hartmann@bocayuvaadvogados.com.br',29,'2024-12-18 00:24:28',1),(252,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-12-18 01:24:51',0),(253,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-18 01:24:55',1),(254,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-18 11:58:09',1),(255,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-19 13:18:12',1),(256,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-19 17:30:30',1),(257,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-20 00:36:46',1),(258,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-20 14:23:54',1),(259,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-20 18:57:26',1),(260,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-22 14:09:33',1),(261,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-23 19:35:02',1),(262,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-26 12:07:26',1),(263,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-26 13:36:03',1),(264,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-26 18:15:14',1),(265,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-26 18:30:19',1),(266,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-26 19:43:19',1),(267,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-12-26 19:44:39',0),(268,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','rafaela.paiva@bocayuvaadvogados.com.br',31,'2024-12-26 19:45:03',1),(269,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','williamdf2308@gmail.com',NULL,'2024-12-26 19:45:28',0),(270,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2024-12-27 12:11:29',1),(271,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-22 17:29:49',1),(272,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-22 17:53:03',1),(273,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-22 18:18:49',1),(274,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-22 19:03:52',1),(275,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-22 19:22:15',1),(276,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-23 02:59:29',1),(277,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sous@bocayuvaadvogados.com.br',NULL,'2025-01-23 02:59:42',0),(278,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0','email_password','william.sousa@bocayuvaadvogados.com.br',23,'2025-01-23 02:59:57',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions_users`
--

DROP TABLE IF EXISTS `auth_permissions_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions_users`
--

LOCK TABLES `auth_permissions_users` WRITE;
/*!40000 ALTER TABLE `auth_permissions_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_remember_tokens`
--

DROP TABLE IF EXISTS `auth_remember_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_remember_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_remember_tokens`
--

LOCK TABLES `auth_remember_tokens` WRITE;
/*!40000 ALTER TABLE `auth_remember_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_remember_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_token_logins`
--

DROP TABLE IF EXISTS `auth_token_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_token_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_token_logins`
--

LOCK TABLES `auth_token_logins` WRITE;
/*!40000 ALTER TABLE `auth_token_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_token_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(7) DEFAULT '#73b32a',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacoes_ferias`
--

DROP TABLE IF EXISTS `solicitacoes_ferias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitacoes_ferias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacoes_ferias`
--

LOCK TABLES `solicitacoes_ferias` WRITE;
/*!40000 ALTER TABLE `solicitacoes_ferias` DISABLE KEYS */;
INSERT INTO `solicitacoes_ferias` VALUES (1,1,'2025-01-06','2025-01-21','pendente','2024-12-17 16:46:54','2024-12-17 16:46:54');
/*!40000 ALTER TABLE `solicitacoes_ferias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (23,1,'William Sousa','',NULL,NULL,0,NULL,'2024-10-31 12:56:01','2024-10-31 13:12:23',NULL,'william.sousa@bocayuvaadvogados.com.br'),(24,2,'Gabriel Cardoso','',NULL,NULL,0,NULL,'2024-10-31 12:56:01','2024-10-31 13:12:23',NULL,'0'),(25,3,'Hane Rocha','',NULL,NULL,0,NULL,'2024-10-31 12:56:02','2024-10-31 13:12:23',NULL,'0'),(26,4,'Jéssica Soares','',NULL,NULL,0,NULL,'2024-10-31 12:56:02','2024-10-31 13:12:23',NULL,'0'),(27,5,'Kelli Cristina','',NULL,NULL,0,NULL,'2024-10-31 12:56:02','2024-10-31 13:12:23',NULL,'0'),(28,6,'Mateus Soares','',NULL,NULL,0,NULL,'2024-10-31 12:56:03','2024-10-31 13:12:23',NULL,'0'),(29,7,'Paula Hartmann','',NULL,NULL,0,NULL,'2024-10-31 12:56:03','2024-10-31 13:12:23',NULL,'0'),(30,8,'Petrine Pintor','',NULL,NULL,0,NULL,'2024-10-31 12:56:04','2024-10-31 13:12:23',NULL,'0'),(31,10,'Rafaela Paiva','',NULL,NULL,0,NULL,'2024-10-31 12:56:04','2024-10-31 13:12:23',NULL,'0'),(32,11,'Raissa Fernandes','',NULL,NULL,0,NULL,'2024-10-31 12:56:05','2024-10-31 13:12:23',NULL,'0'),(33,12,'Thamires Belo','',NULL,NULL,0,NULL,'2024-10-31 12:56:05','2024-10-31 13:12:23',NULL,'0'),(36,13,'marcela.bocayuva','$2y$10$IIxVNWI.ara9fO3oRWwllecS0mxSCQiVB3kZNrteISngUbQyoKEpO',NULL,NULL,0,NULL,NULL,NULL,NULL,'marcela.bocayuva@bocayuvaadvogados.com.br');
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

-- Dump completed on 2025-01-23 12:04:41
