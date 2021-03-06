-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_psckendari
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.16.04.1

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
-- Table structure for table `ambulans`
--

DROP TABLE IF EXISTS `ambulans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambulans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `puskesmas_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ambulans_no_plat_unique` (`no_plat`),
  UNIQUE KEY `ambulans_puskesmas_id_unique` (`puskesmas_id`),
  CONSTRAINT `ambulans_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambulans`
--

LOCK TABLES `ambulans` WRITE;
/*!40000 ALTER TABLE `ambulans` DISABLE KEYS */;
INSERT INTO `ambulans` VALUES (1,'DT 9040 Ex','081111112','Tensimeter dan stetoskop\r\n Themometer\r\n Pulse Oximetri\r\n Bed Site Monitorr','2019-08-26 10:30:22','2020-03-21 09:48:12','2020-03-21 09:48:12',1);
/*!40000 ALTER TABLE `ambulans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ambulans_kejadian`
--

DROP TABLE IF EXISTS `ambulans_kejadian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambulans_kejadian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(10) unsigned DEFAULT NULL,
  `ambulans_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ambulans_kejadian_kejadian_id_foreign` (`kejadian_id`),
  KEY `ambulans_kejadian_ambulans_id_foreign` (`ambulans_id`),
  CONSTRAINT `ambulans_kejadian_ambulans_id_foreign` FOREIGN KEY (`ambulans_id`) REFERENCES `ambulans` (`id`),
  CONSTRAINT `ambulans_kejadian_kejadian_id_foreign` FOREIGN KEY (`kejadian_id`) REFERENCES `kejadian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambulans_kejadian`
--

LOCK TABLES `ambulans_kejadian` WRITE;
/*!40000 ALTER TABLE `ambulans_kejadian` DISABLE KEYS */;
/*!40000 ALTER TABLE `ambulans_kejadian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `puskesmas_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `driver_username_unique` (`username`),
  UNIQUE KEY `driver_email_unique` (`email`),
  UNIQUE KEY `driver_puskesmas_id_unique` (`puskesmas_id`),
  CONSTRAINT `driver_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES (3,'Yudi Alhartas','Kel. Kampung Salo','085145203729','yudi.mata','$2y$10$PEvMHChQy763lkoyZs/G0OfSIt5ix8jeld47bg1dpPwOwdhAQnNQW','yudi.alhartas@mail.com','2019-08-26 06:43:42','2019-08-26 09:38:03',NULL,1),(4,'Andi Ansar','Jl. K.H. Dewantara','085241401005','andi.ansar','$2y$10$Dp0dNFrUpnoIxEKEV3eNEuRDIb6pJ.uWEuVvRuUJpEJYzQac/q9Fa','andi.ansar@mail.com','2019-08-26 06:45:02','2019-08-26 09:37:26',NULL,2),(5,'Azwar','Kel. Kemaraya','082292430149','azwar','$2y$10$EsncDIPazgtM2/.XeLrYwOEQ3JjIl1TE59.wWnlU3bwn1Pa4qF6re','azwar@mail.com','2019-08-26 09:39:32','2019-08-26 09:39:32',NULL,4),(6,'Jismanto','Jl. Toarima','085395417770','jismanto','$2y$10$1GL40gh9pX6GJwJHuBZIk.okFS9XTcIcCTurPr3Hc0RN/NxiUAgu6','jismanto@mail.com','2019-08-26 09:40:10','2019-08-26 09:40:10',NULL,5),(7,'Mustamin','Jl. Imam Bonjol','082259907242','mustamin','$2y$10$X7P2QfBnipEXQGEzq.pjwO24zWfx5P.DupsoJoBlp48N5t4rSOPsm','mustamin@mail.com','2019-08-26 09:40:47','2019-08-26 09:40:47',NULL,6),(8,'Ilham','Jl. Prof M. Yamin','085394663974','ilham','$2y$10$Es6IcLkg.u9OQJvtg3G8UOIEKVFZtDBJiZuUMYdk0iIWppQFgJi4S','ilham@mail.com','2019-08-26 09:41:30','2019-08-26 09:41:30',NULL,7),(9,'Muhlas','Jl. Saranani','085394188838','muhlas','$2y$10$MRlflq2XBFzUDGUoSk5X8em2wxrO0AtCqR05RZ45mOtwHBL3bIK62','muhlas@mail.com','2019-08-26 09:42:06','2019-08-26 09:42:06',NULL,8),(10,'Ruli','BTN Latjinta 2','085241977611','ruli','$2y$10$0ti6vDEmrgxwz45os2Ytuu/nXB5LdNyKc1ETyhkDE/OrWLeHnME0i','ruli@mail.com','2019-08-26 09:42:45','2019-08-26 09:42:45',NULL,9),(11,'Muh. Ali Hidayat','Kel. Punggolaka','082217972717','ali.hidayat','$2y$10$I7aVX8fnB0IgI8U87/9qQeLI03wEmGhhhUU0b/rK57PbYDVjUAvX6','ali.hidayat@mail.com','2019-08-26 09:43:23','2019-08-26 09:52:49',NULL,10);
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_kejadian`
--

DROP TABLE IF EXISTS `driver_kejadian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver_kejadian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(10) unsigned DEFAULT NULL,
  `driver_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_kejadian_kejadian_id_foreign` (`kejadian_id`),
  KEY `driver_kejadian_driver_id_foreign` (`driver_id`),
  CONSTRAINT `driver_kejadian_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  CONSTRAINT `driver_kejadian_kejadian_id_foreign` FOREIGN KEY (`kejadian_id`) REFERENCES `kejadian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_kejadian`
--

LOCK TABLES `driver_kejadian` WRITE;
/*!40000 ALTER TABLE `driver_kejadian` DISABLE KEYS */;
/*!40000 ALTER TABLE `driver_kejadian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kejadian`
--

DROP TABLE IF EXISTS `kejadian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kejadian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_kejadian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_korban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('PRIA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(10) unsigned NOT NULL DEFAULT '0',
  `jamkes` enum('UMUM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_jamkes` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `triage` enum('M') COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kejadian_keluhan` text COLLATE utf8mb4_unicode_ci,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `triase` enum('1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `puskesmas_id` int(10) unsigned NOT NULL,
  `rumkit_id` int(10) unsigned NOT NULL,
  `ambulans_id` int(10) unsigned NOT NULL,
  `driver_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kejadian_no_kejadian_unique` (`no_kejadian`),
  KEY `kejadian_puskesmas_id_foreign` (`puskesmas_id`),
  KEY `kejadian_rumkit_id_foreign` (`rumkit_id`),
  KEY `kejadian_ambulans_id_foreign` (`ambulans_id`),
  KEY `kejadian_driver_id_foreign` (`driver_id`),
  CONSTRAINT `kejadian_ambulans_id_foreign` FOREIGN KEY (`ambulans_id`) REFERENCES `ambulans` (`id`),
  CONSTRAINT `kejadian_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  CONSTRAINT `kejadian_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`),
  CONSTRAINT `kejadian_rumkit_id_foreign` FOREIGN KEY (`rumkit_id`) REFERENCES `rumkit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kejadian`
--

LOCK TABLES `kejadian` WRITE;
/*!40000 ALTER TABLE `kejadian` DISABLE KEYS */;
INSERT INTO `kejadian` VALUES (1,'PSCKDI-2019/00001','RIAN','JL MT HARYONO PEREMPATAN KFC WUA-WUA','0899999999','RIAN','PRIA',24,'UMUM',0.00,'[\"NONEMERGENCY\"]','M','PATAH TULANG',NULL,'PATAH TULANG BAGIAN KAKI','','2019-08-26 14:51:23','2019-08-26 14:51:23',8,2,1,8),(2,'PSCKDI-2019/00002','ATUN','JL. MALIK RAYA PEREMPATAN SPBU SARANANI','098765','BIBI','',88,'',999999.99,'[\"NONEMERGENCY\"]','M','TUA RENTA',NULL,'KECAPEAN','1','2019-08-26 23:12:01','2019-08-26 23:12:01',10,1,1,7),(3,'PSCKDI-2019/00003','DIAN','LORONG MEOHAI, BELAKANG TOKO HBM KELURAHAN POASIA','081341808045','ARUL','PRIA',25,'UMUM',0.00,'[\"EMERGENCY\"]','M','DBD',NULL,'0','1','2019-08-27 04:43:32','2019-08-27 04:43:32',1,1,1,3);
/*!40000 ALTER TABLE `kejadian` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_18_174811_update_table_users',2),(4,'2019_08_25_102638_create_table_rumkit',3),(5,'2019_08_25_104616_create_table_puskesmas',3),(6,'2019_08_25_105013_create_table_driver',3),(7,'2019_08_25_110044_create_table_driverpuskesmas',3),(8,'2019_08_25_112439_update_table_puskesmas',4),(9,'2019_08_25_112448_update_table_rumkit',4),(10,'2019_08_25_112456_update_table_driver',4),(11,'2019_08_25_115454_create_rumkit_table',5),(12,'2019_08_25_115507_create_puskesmas_table',5),(13,'2019_08_25_115521_create_driver_table',5),(14,'2019_08_25_115455_create_rumkit_table',6),(15,'2019_08_25_115508_create_puskesmas_table',6),(16,'2019_08_25_115522_create_driver_table',6),(17,'2019_08_25_120836_create_driverpuskesmas_table',6),(18,'2019_08_25_130257_create_ambulans_table',7),(19,'2019_08_25_131213_create_ambulanspuskesmas_table',8),(20,'2019_08_26_121816_update_driver_table',9),(21,'2019_08_26_121831_update_ambulans_table',9),(22,'2019_08_26_184315_create_kejadian_table',10),(23,'2019_08_26_194552_create_ambulans_kejadian_table',10),(24,'2019_08_26_194858_create_rumkit_kejadian_table',10),(25,'2019_08_26_194912_create_puskesmas_kejadian_table',10),(26,'2019_08_26_194942_create_driver_kejadian_table',10),(27,'2019_08_26_194553_create_ambulans_kejadian_table',11),(28,'2019_08_26_194859_create_rumkit_kejadian_table',11),(29,'2019_08_26_194913_create_puskesmas_kejadian_table',11),(30,'2019_08_26_194943_create_driver_kejadian_table',11),(31,'2019_08_26_221042_update_kejadian_table',12),(32,'2019_08_26_221043_update_kejadian_table',13),(33,'2020_03_21_101912_update_rumkit_table',13),(34,'2020_03_21_131455_update_puskesmas_tabel',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `puskesmas`
--

DROP TABLE IF EXISTS `puskesmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puskesmas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_puskesmas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `puskesmas_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puskesmas`
--

LOCK TABLES `puskesmas` WRITE;
/*!40000 ALTER TABLE `puskesmas` DISABLE KEYS */;
INSERT INTO `puskesmas` VALUES (1,'Puskesmas Mata','Jl. Cemara No. 10, Kec. Kendari Sultra','(0401) 3126948','pus.mata','$2y$10$UolH7T7NAMCB1KW6qtfuNuTeB.YZM9PxH7JrMv2dlWms4qd2k3m3W','2019-08-25 07:08:56','2019-08-25 09:59:28',NULL,NULL,NULL),(2,'Puskesmas Kandai','Jl. Muh. Hatta, Kec. Kendari','-','pus.kandai','$2y$10$XqGbfqUQ/gvs1Dq7EGWf.uGu4YWgqjUw4WblCZnWbxttGlhGjkPD6','2019-08-25 08:36:45','2019-08-25 08:36:45',NULL,NULL,NULL),(4,'Puskesmas Benu-Benua','Jl. Bung Tomo No. 36, Kec. Kendari Barat','-','pus.benua','$2y$10$AA9SSRhA4Lm8gVki9P4VVeOFEkrDj3RjWxz5RkroKnX1DtgBqOOQS','2019-08-25 09:44:03','2019-08-25 09:44:03',NULL,NULL,NULL),(5,'Puskesmas Kemaraya','Jl. Mayjen S. Parman Kompleks Unhalu Lama, Kec. Kendari Barat','-','pus.kemaraya','$2y$10$Pk2httlFC8eESvCUwrWfgOTskO5DmctlumVd/so0dmfyPxyjBA9T2','2019-08-25 09:44:30','2019-08-25 09:44:30',NULL,NULL,NULL),(6,'Puskesmas Labibia','Jl. Imam Bonjol, Kec. Mandonga','-','pus.labibia','$2y$10$qA4w3dAf8zjJq6NDd8M6iO13xU/aCgIiVMlMPKCC2H7vZ4iJTsx7u','2019-08-25 09:44:59','2019-08-25 09:44:59',NULL,NULL,NULL),(7,'Puskesmas Puuwatu','Jl. Prof. M. Yamin No. 64, Kec. Puuwatu','081527695515','pus.puuwatu','$2y$10$MUn9rj7iZI8HKYd7dEJxnuyRIhS6SSAor2B1TCPid2B8iaQgqWv3a','2019-08-25 09:45:31','2019-08-25 09:45:31',NULL,NULL,NULL),(8,'Puskesmas Mekar','Jl. Laremba Lrg RCTI Kendari, Kec. Kadia','-','pus.mekar','$2y$10$4Df7BeF3auC78QgZTyVe9.WbsYeqrjTHHS8MUIZMuBZt08BViQW.K','2019-08-25 09:45:57','2019-08-25 09:45:57',NULL,NULL,NULL),(9,'Puskesmas Wua-Wua','Jl. Anawai, Kec. Wua-Wua','-','pus.wuawua','$2y$10$SutaW.qdjxu51a.zF/1EQ.2zt5JfI24kEF8Uxak7oSur3tbXdJHpq','2019-08-25 09:46:23','2019-08-25 09:46:23',NULL,NULL,NULL),(10,'Puskesmas Perumnas','Jl. Supu Yusuf, Kec. Kadia','(0401) 3412552','pus.perumnas','$2y$10$BdOP3YaIPnWTVxG2cNHUqOArPp17gzAg0Dydr1vUvAsvFABD7mkEC','2019-08-25 09:46:59','2019-08-25 09:46:59',NULL,NULL,NULL),(11,'Puskesmas Jati Raya','Jl. Sorumba, Kec. Kadia','-','pus.jatiraya','$2y$10$h6gD7VnNUrygwR4GBWMOeeizwRsBz3LScvZMZ6SR6ZcF5oQydlEEO','2019-08-25 09:47:21','2019-08-25 09:47:21',NULL,NULL,NULL),(12,'Puskesmas Lepo-Lepo','Jl. Christina M. Tiahahu No. 11, Kec. Baruga','(0401) 3195398','pus.lepo','$2y$10$O1Vcp5OQy3kFj/m7l9Qz0eBLPmxqAM..Fx88EnXI8ELlNTujJjYQu','2019-08-25 09:47:47','2019-08-25 09:47:47',NULL,NULL,NULL),(13,'Puskesmas Mokoau','Kompleks BTN Kendari Permai Blok F, Kec. Kambu','-','pus.mokoau','$2y$10$bgw8BLgzhMPycn4LV3ie1efEwBMs6FYqdhm16oQWMeyoFG/D2enwu','2019-08-25 09:48:08','2019-08-25 09:48:08',NULL,NULL,NULL),(14,'Puskesmas Poasia','Jl. Bunggasi, Kec. Poasia','(0401) 3913670','pus.poasia','$2y$10$XCTn1DoEKQ0iFDJ7QPOKaOBfCBt5qZ.vt20Y5XrOGaO6UD2AZsigC','2019-08-25 09:48:33','2019-08-25 09:48:33',NULL,NULL,NULL),(15,'Puskesmas Abeli','Jl. Sewangi No. 2, Kec. Abeli','-','pus.abeli','$2y$10$cETJ0cY0xjgF7u/aJDsii.WZwVUAc0pjgIeSIPZDf5R04Vo3WeLxq','2019-08-25 09:48:57','2019-08-25 09:48:57',NULL,NULL,NULL),(16,'Puskesmas Nambo','Jl. Garuda, Kec. Nambo','-','pus.nambo','$2y$10$NevRKeYeo6xSc7M0CRD/B.vzh.HCEPuTJ8E4dOq.Tar.RSX0COkhe','2019-08-25 09:49:15','2019-08-25 09:49:15',NULL,NULL,NULL),(17,'tes','Ruko Bypass Square Blok B No. 11, Jl, Jl. Brigjen M. Joendes, Bende, Kec. Kadia, Kota Kendari, Sulawesi Tenggara 93461, Indonesia','432123','fachmi.maasy@technoindo.com','$2y$10$v59tbKA7D/yBtVM8xb/Vt.wZusLQ9PsLdX2zy/zegEpfdcXw2SUKi','2020-03-21 05:26:08','2020-03-21 05:37:22','2020-03-21 05:37:22',-3.984092049125109,122.52074500531005),(20,'tes','Jl. Laode Hadi No.8, Korumba, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93461, Indonesia','123443','fachmi.maasy@gmail.com','$2y$10$zKj3XO70Aymoan9fyLUeDuVhwIVbYKoXnPfwN1l1QHHDqc0SstwpK','2020-03-21 05:52:24','2020-03-21 05:52:32','2020-03-21 05:52:32',-3.976621385068666,122.52424260586547);
/*!40000 ALTER TABLE `puskesmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puskesmas_kejadian`
--

DROP TABLE IF EXISTS `puskesmas_kejadian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puskesmas_kejadian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(10) unsigned DEFAULT NULL,
  `puskesmas_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `puskesmas_kejadian_kejadian_id_foreign` (`kejadian_id`),
  KEY `puskesmas_kejadian_puskesmas_id_foreign` (`puskesmas_id`),
  CONSTRAINT `puskesmas_kejadian_kejadian_id_foreign` FOREIGN KEY (`kejadian_id`) REFERENCES `kejadian` (`id`),
  CONSTRAINT `puskesmas_kejadian_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puskesmas_kejadian`
--

LOCK TABLES `puskesmas_kejadian` WRITE;
/*!40000 ALTER TABLE `puskesmas_kejadian` DISABLE KEYS */;
/*!40000 ALTER TABLE `puskesmas_kejadian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rumkit`
--

DROP TABLE IF EXISTS `rumkit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rumkit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_rs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tt_kelas_vip` int(11) DEFAULT NULL,
  `tt_kelas_1` int(11) DEFAULT NULL,
  `tt_kelas_2` int(11) DEFAULT NULL,
  `tt_kelas_3` int(11) DEFAULT NULL,
  `igd` int(11) DEFAULT NULL,
  `vk` int(11) DEFAULT NULL,
  `icu` int(11) DEFAULT NULL,
  `iccu` int(11) DEFAULT NULL,
  `picu` int(11) DEFAULT NULL,
  `nicu` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rumkit_kode_rs_unique` (`kode_rs`),
  UNIQUE KEY `rumkit_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rumkit`
--

LOCK TABLES `rumkit` WRITE;
/*!40000 ALTER TABLE `rumkit` DISABLE KEYS */;
INSERT INTO `rumkit` VALUES (1,'RSUKK','RSU Kota Kendari','Jl. Buburanda, Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93231, Indonesia','(0401) 3359171','rsukk','$2y$10$lCkt6upWswbpz1ABNr52KOS.uzXIBK9AZ1PTD8.AzYWQyNbD1dxQe',0,0,0,0,1,1,1,0,0,0,NULL,'2019-08-26 01:06:00','2020-03-21 04:52:28',-3.988719427800054,122.53429135935107),(2,'RSUDB','RSUD Bahteramas','Jl. Poros Bandara Haluoleo, Baruga, Kota Kendari, Sulawesi Tenggara 93116, Indonesia','(0401) 3195611','rsudb','$2y$10$Sngf0CNiRQCyPwYZUPLmyeGZb3Uh2p9CTStuVfZ44mIOWcQqA4JY2',0,0,0,0,1,1,1,0,0,0,NULL,'2019-08-26 01:52:05','2020-03-21 04:54:16',-4.034796582421225,122.49133015854773),(3,'1234','asdf','Jl. Laode Hadi, Bende, Kec. Kadia, Kota Kendari, Sulawesi Tenggara 93561, Indonesia','4321','fachmi.maasy@technoindo.com','$2y$10$W7b6Hh8A8CCpDY4qecZsL.DTRn2404oIxMjFuuJ3NZ5jxKfAG/d1O',0,0,2,0,0,0,0,0,0,0,'2020-03-21 03:25:18','2020-03-21 02:37:03','2020-03-21 03:25:18',-3.9858866079096944,122.51982761383059);
/*!40000 ALTER TABLE `rumkit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rumkit_kejadian`
--

DROP TABLE IF EXISTS `rumkit_kejadian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rumkit_kejadian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(10) unsigned DEFAULT NULL,
  `rumkit_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rumkit_kejadian_kejadian_id_foreign` (`kejadian_id`),
  KEY `rumkit_kejadian_rumkit_id_foreign` (`rumkit_id`),
  CONSTRAINT `rumkit_kejadian_kejadian_id_foreign` FOREIGN KEY (`kejadian_id`) REFERENCES `kejadian` (`id`),
  CONSTRAINT `rumkit_kejadian_rumkit_id_foreign` FOREIGN KEY (`rumkit_id`) REFERENCES `rumkit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rumkit_kejadian`
--

LOCK TABLES `rumkit_kejadian` WRITE;
/*!40000 ALTER TABLE `rumkit_kejadian` DISABLE KEYS */;
/*!40000 ALTER TABLE `rumkit_kejadian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Site Administrator','fachmi.maasy@technoindo.com',NULL,'$2y$10$NdbIjTbZ5L9zBpE2ngqv..dNKQ/S4RDQeyUxKnV1tFof.kWUIG48O','JqHNY5aDbUhhO3URsy5JdL2fGzPbZFL1ASYUwwVDZhtKaImn1XxUUGWuwVED','2019-08-18 10:19:01','2019-08-18 10:19:01','administrator','[\"ADMIN\"]','Kota Kendari, Sulawesi Tenggara','082349452345','avatar.png','ACTIVE'),(2,'Dr. Rahminingrum','dr.rahminingrum@gmail.com',NULL,'$2y$10$zbkF6FKVDogPdisbl7ec/.HUbWBYN05IIZKLahGkTCNN7rvD9s9tS',NULL,'2019-08-24 07:38:59','2019-08-24 10:55:39','dr.rahminingrum','[\"STAFF\"]','Kendari Sao-sao','0811999999','avatars/s0TxTzeUs3BlobrTuWkbhkmnXk7zqqDArz2esMKB.png','ACTIVE'),(4,'User Demo','user.demo@gmail.com',NULL,'$2y$10$gzwJnqVcBKt59J2T3wlTWeC5aLtg6D/feTvzHno6ZdfknSxUAAO0C',NULL,'2019-08-25 00:55:54','2019-08-25 00:56:09','user.demo','[\"OPERATOR\"]','Kendari','0811111111','avatars/0yNLDMYRsNAxZlMsi8YG6kq0n1TUiWsppuCtbGou.png','INACTIVE'),(5,'Arpan Tombili','arpan.tombili@mail.com',NULL,'$2y$10$wi.9fQE5qP1.aQJRCOgJTe3R6R.Do//0F.7SfHJWhzqJ6ycXRzHVy',NULL,'2019-08-25 01:04:54','2019-08-25 01:05:07','arpan.tombili','[\"STAFF\"]','Kendari','08999977','avatars/FK2PqbAEoHUKFdzNfDiLjNit00Vkhw5UzQfYf6Y1.png','INACTIVE'),(6,'Dian Saputra','qoraolivera@gmail.com',NULL,'$2y$10$Tq6dz1V0TEYT8vo4xCHRn.tvwZ0ZKsNR0c5MR5cb49oz7HjyvmhIG',NULL,'2019-08-27 04:51:01','2019-08-27 04:51:01','dian.saputra','[\"OPERATOR\"]','Kendari','081341808045','avatars/kJOnM348oiiQmJcLyuE7z2GLFnjIhuo2EaRJ5Osx.png','ACTIVE');
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

-- Dump completed on 2020-03-21 18:47:58
