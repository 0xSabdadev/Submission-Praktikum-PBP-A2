-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pbp_variasi2
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Fakultas Ekonomika dan Bisnis'),(2,'Fakultas Hukum'),(3,'Fakultas Ilmu Sosial dan Ilmu Politik'),(4,'Fakultas Kedokteran'),(5,'Fakultas Perikanan dan Ilmu Kelautan'),(6,'Fakultas Peternakan dan Pertanian'),(7,'Fakultas Psikologi'),(8,'Fakultas Sains dan Matematika'),(9,'Fakultas Teknik'),(10,'Fakultas Ilmu Budaya'),(11,'Fakultas Kesehatan Masyarakat'),(12,'Sekolah Vokasi'),(13,'Sekolah Pascasarjana');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,1,'Akuntansi'),(2,1,'Manajemen'),(3,1,'Ilmu Ekonomi'),(4,1,'Ekonomi Syariah'),(5,1,'Ekonomi Pembangunan'),(6,2,'Ilmu Hukum'),(7,3,'Hubungan Internasional'),(8,3,'Ilmu Administrasi'),(9,3,'Ilmu Politik'),(10,3,'Ilmu Pemerintahan'),(11,3,'Administrasi Negara (Publik)'),(12,3,'Administrasi Bisnis (Niaga)'),(13,3,'Ilmu Komunikasi'),(14,4,'Farmasi'),(15,4,'Pendidikan Dokter'),(16,4,'Ilmu Keperawatan'),(17,4,'Gizi'),(18,4,'Pendidikan Dokter Gigi'),(19,4,'Radiologi'),(20,4,'Lainnya'),(21,5,'Kelautan'),(22,5,'Budidaya Perairan (Akuakultur)'),(23,5,'Perikanan'),(24,5,'Lainnya'),(25,6,'Agribisnis'),(26,6,'Peternakan'),(27,6,'Ilmu dan Teknologi Pangan'),(28,6,'Agroteknologi'),(29,7,'Psikologi'),(30,8,'Teknik Informatika'),(31,8,'Matematika'),(32,8,'Biologi'),(33,8,'Kimia'),(34,8,'Fisika'),(35,8,'Statistika'),(36,8,'Bioteknologi'),(37,9,'Ilmu Komputer'),(38,9,'Teknik Sipil'),(39,9,'Arsitektur'),(40,9,'Teknik Kimia'),(41,9,'Teknik Mesin'),(42,9,'Teknik Elektro'),(43,9,'Perencanaan Wilayah dan Kota'),(44,9,'Teknik Industri'),(45,9,'Teknik Lingkungan'),(46,9,'Teknik Geologi'),(47,9,'Teknik Geodesi'),(48,9,'Teknik Perkapalan'),(49,10,'Antropologi'),(50,10,'Sastra Indonesia'),(51,10,'Sastra Inggris'),(52,10,'Ilmu Perpustakaan'),(53,10,'Sejarah'),(54,10,'Kearsipan'),(55,10,'Sastra Jepang'),(56,10,'Lainnya'),(57,11,'Kesehatan Masyarakat'),(58,11,'Kesehatan Lingkungan'),(59,12,'Teknik Industri'),(60,12,'Teknik Sipil'),(61,12,'Teknik Kimia'),(62,12,'Teknik Mesin'),(63,12,'Teknik Elektro'),(64,12,'Perencanaan Wilayah dan Kota'),(65,12,'Arsitektur'),(66,12,'Ilmu Ekonomi'),(67,12,'Manajemen'),(68,12,'Perpajakan'),(69,12,'Akuntansi'),(70,12,'Ilmu Administrasi'),(71,12,'Ilmu Perpustakaan'),(72,12,'Sastra Inggris'),(73,12,'Public Relations'),(74,12,'Teknik Perkapalan'),(75,12,'Instrumentasi'),(76,12,'Sastra Jepang'),(77,12,'Peternakan'),(78,12,'Ilmu Teknik'),(79,12,'Administrasi Perkantoran'),(80,12,'Lainnya'),(81,12,'Kearsipan'),(82,13,'Lainnya'),(83,13,'Teknik Lingkungan'),(84,13,'Sistem Informasi');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fakultas` (`id_fakultas`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-04 10:40:59
