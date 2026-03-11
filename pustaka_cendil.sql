/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pustaka_cendil
-- ------------------------------------------------------
-- Server version	11.8.6-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `is_banner` tinyint(1) NOT NULL DEFAULT 0,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES
(3,'Contoh','galleries/SyTxnZdAetx2x7XrhIKC9Rw2V01m3vbpHs1dnVtj.jpg',0,'Kegiatan','2026-03-09 14:42:43','2026-03-09 18:39:27'),
(4,'Pustaka Cendil','galleries/1773055711_ChatGPT Image 6 Mar 2026, 14.33.00.png',1,'Dokumentasi','2026-03-09 18:28:31','2026-03-09 19:24:30'),
(5,'Juara I','galleries/I2qOQ8kOB2nBIKTF6I5vwJdF24YchjBtM4SDXc1r.png',0,'Lainnya','2026-03-09 21:59:26','2026-03-09 21:59:26');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `kunjungans`
--

DROP TABLE IF EXISTS `kunjungans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kunjungans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunjungans`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `kunjungans` WRITE;
/*!40000 ALTER TABLE `kunjungans` DISABLE KEYS */;
INSERT INTO `kunjungans` VALUES
(1,'Jefri Hunter Juanda Sianturi','Laki-laki','Baca Buku',NULL,'2026-03-10','2026-03-10 19:52:48','2026-03-10 19:52:48'),
(2,'Yearsi Tiara','Perempuan','baca','Pemerintah Kabupaten Belitung Timur','2026-03-10','2026-03-10 22:14:44','2026-03-10 22:14:44');
/*!40000 ALTER TABLE `kunjungans` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kategori_pekerjaan` enum('umum','asn','mahasiswa','siswa') NOT NULL,
  `sektor` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `alamat_instansi` text DEFAULT NULL,
  `alamat_rumah` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('pending','aktif','nonaktif') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_kode_anggota_unique` (`kode_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES
(1,'AGT-2026-0001','Jefri Sianturi','TANJUNGPANDAN','1990-09-05','L','umum','Laut','Nelayan',NULL,NULL,'Manggar','Manggar','01`','01','Padang','08170771715','2026-03-10','aktif','2026-03-10 08:52:51','2026-03-10 14:03:45');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_03_03_134910_create_members_table',1),
(5,'2026_03_05_111809_create_survei_pemustakas_table',1),
(6,'2026_03_05_144901_create_posts_table',1),
(7,'2026_03_05_150531_create_galleries_table',1),
(8,'2026_03_05_151533_create_videos_table',1),
(9,'2026_03_06_004723_create_post_images_table',1),
(10,'2026_03_06_082351_create_skms_table',1),
(11,'2026_03_06_133902_add_details_to_posts_table',1),
(12,'2026_03_08_205026_add_slug_to_videos_table',1),
(13,'2026_03_08_211511_add_status_to_videos_table',1),
(14,'2026_03_09_161251_add_is_banner_to_galleries_table',2),
(15,'2026_03_09_184251_add_role_to_users_table',3),
(16,'2026_03_09_214032_add_user_id_to_posts_table',4),
(17,'2026_03_10_192458_create_kunjungans_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_images_post_id_foreign` (`post_id`),
  CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_images`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `post_images` WRITE;
/*!40000 ALTER TABLE `post_images` DISABLE KEYS */;
INSERT INTO `post_images` VALUES
(1,1,'posts/berita-perpustakaan-pustaka-cendil-tige-kubok-desa-cendil-wakili-babel-ke-tingkat-nasional-1773059184-1-1773059184.jpg','2026-03-09 19:26:24','2026-03-09 19:26:24'),
(2,2,'posts/berita-program-ini-antar-perpustakaan-desa-cendil-belitung-timur-jadi-juara-1-lomba-kesatuan-pkk-babel-1773066662-1-1773066662.png','2026-03-09 21:31:02','2026-03-09 21:31:02'),
(3,3,'posts/berita-membanggakan-perpustakaan-desa-cendil-wakili-babel-di-tingkat-nasional-1773068109-1-1773068109.png','2026-03-09 21:55:10','2026-03-09 21:55:10'),
(4,4,'posts/berita-diskominfo-beltim-lakukan-koordinasi-pengembangan-website-pustaka-cendil-1773195559-1-1773195559.jpg','2026-03-11 09:19:19','2026-03-11 09:19:19'),
(5,5,'posts/berita-panen-raya-jagung-serentak-kuartal-i-2026-digelar-di-perpustakaan-cendil-1773195621-1-1773195621.jpeg','2026-03-11 09:20:22','2026-03-11 09:20:22'),
(6,6,'posts/berita-dinas-kominfo-gelar-pelatihan-website-bagi-pengelola-perpustakaan-cendil-1773195700-1-1773195700.jpeg','2026-03-11 09:21:40','2026-03-11 09:21:40'),
(7,7,'posts/berita-sinergi-perpustakaan-desa-cendil-dan-dinsos-p3a-bangun-akses-literasi-inklusif-1773195756-1-1773195756.jpeg','2026-03-11 09:22:36','2026-03-11 09:22:36'),
(8,8,'posts/berita-optimalisasi-pemanfaatan-bahan-alami-melalui-pelatihan-pestisida-nabati-bersama-kkn-unsoed-nusa-persada-1773195820-1-1773195820.jpeg','2026-03-11 09:23:41','2026-03-11 09:23:41'),
(9,9,'posts/berita-upaya-dinas-perikanan-belitung-timur-perkuat-umkm-sektor-pengolahan-ikan-melalui-sambal-lingkong-1773195898-1-1773195898.jpeg','2026-03-11 09:24:59','2026-03-11 09:24:59'),
(10,10,'posts/berita-melalui-sijares-perpustakaan-cendil-ajak-anak-muda-perkuat-silaturahmi-lewat-buka-bersama-1773195979-1-1773195979.jpg','2026-03-11 09:26:20','2026-03-11 09:26:20');
/*!40000 ALTER TABLE `post_images` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT 'Umum',
  `lokasi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('draft','publish') NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES
(1,NULL,'Perpustakaan Pustaka Cendil Tige Kubok Desa Cendil Wakili Babel ke Tingkat Nasional','perpustakaan-pustaka-cendil-tige-kubok-desa-cendil-wakili-babel-ke-tingkat-nasional-1773059184','Perpustakaan Desa Cendil Kecamatan Kelapa Kampit, Kabupaten Belitung Timur (Beltim) mewakili Provinsi Kepulauan Bangka Belitung (Babel) dalam ajang Lomba Perpustakaan Umum Terbaik Desa/Kelurahan Tingkat Nasional tahun 2021.      \r\n\r\nPerpustakaan yang bernama ‘Pustaka Cendil Tige Kubok’ ini, mengikuti penilaian penjurian lomba secara daring, Selasa (24/8/2021). \r\n\r\nSebelumnya Perpustakaan Desa yang dipimpin oleh Pjs Kades Cendil Juanda ini, berhasil menjuarai seleksi Lomba Pengelolaan Perpustakaan Desa/Kelurahan Terbaik Tingkat Kabupaten dan Provinsi tahun 2021.\r\n\r\nKepala Dinas Kearsipan dan Perpustakaan Kabupaten Beltim Amirudin, didampingi Kepala Bidang Perpustakaan Sony Aprianto mengatakan, terpilihnya Perpustakaan Desa Cendil sebagai perpustakaan terbaik, lantaran sudah menerapkan Program Transformasi Perpustakaan Berbasis Inklusi Sosial. \r\n\r\nDikatakannya, perpustakaan bukan lagi sekedar tempat membaca atau meminjam buku semata, namun sudah berubah menjadi tempat yang memfasilitasi masyarakat, dalam mengembangkan potensinya dengan melihat keragaman budaya, kemauan untuk menerima perubahan, serta menawarkan kesempatan berusaha, melindungi dan memperjuangkan budaya dan Hak Asasi Manusia.\r\n\r\n“Program ini merupakan Program Utama dari Perpustakaan Nasional, di mana perpustakaan menjadi pusat transformasi ilmu di lingkungan desa, jadi tempat belajar, berkegiatan untuk meningkatkan taraf kehidupan bermasyarakat,” kata Amir.\r\n\r\nDengan adanya program ini, dikatan Amir, tingkat kunjungan ke perpustakaan saat ini meningkat pesat dua kali lipat. Antusias masyarakat untuk mengunjungi Pustaka Cendil Tige Kubok sangat tinggi.\r\n\r\n“Tahun-tahun sebelumnya di kisaran 200 pengunjung per bulannya. Namun sejak 2020 meningkat menjadi 300-an orang. Bukan hanya pelajar namun juga ibu-ibu rumah tangga, serta masyarakat umum ikut datang ke Perpustakaan,” ujar Amir.\r\n\r\nSelain itu, perhatian pemerintah desa terhadap perpustakaan jauh meningkat. Anggaran per tahun yang sebelumnya dipatok hanya dikisaran puluhan juta menjadi Rp 300 juta lebih, pada tahun 2020.\r\n\r\n“Banyaknya anggaran pada tahun 2020 yaitu dipergunakan untuk penambahan gedung bangunan Perpustakaan, serta penambahan sarana dan prasarana di perpustakaan,” tambah Sony.\r\n\r\nGedung Perpustakaan Pustaka Cendil Tige Kubok berdiri di atas 152 meter persegi. Di dalamnya terdapat fasilitas ruang pembelajaran digital, hingga fasilitas internet untuk menunjang literasi di Desa Cendi\r\n\r\nPjs. Kades Cendil Juanda mengucapkan terima kasih atas dukungan dan bantuan dari berbagai pihak, yang telah ikut peduli terhadap Perpustakaan Desa Cendil.\r\n\r\n“Untuk Pemerintah Kabupaten Beltim terutama dari Dinas Perpustakaan yang terus membimbing dan Dinas Diskominfo, yang membantu pengadaan jaringan internet. Dan juga pihak swasta yang telah banyak membantu sumbangan buku serta ruangan,” ujar Juanda.\r\n\r\nDitegaskannya, bahwa Pemerintah Desa Cendil akan terus berkomitmen dalam upaya untuk memajukan literasi di Desa Cendil. Bahkan pembangunan perpustakaan masuk dalam program prioritas pembangunan Desa Cendil.\r\n\r\n“Perpustakaan ini adalah kebanggaan kita bersama, bukan hanya milik warga Desa Cendil tapi juga masyarakat Kabupaten Belitung Timur. Semoga kita akan memperoleh hasil yang terbaik, kita mohon doa dan dukungan dari seluruh masyarakat,” kata Juanda.','Pustaka','Kelapa Kampit',NULL,'publish','2023-08-24 09:24:00','2026-03-09 19:26:24'),
(2,NULL,'Program Ini Antar Perpustakaan Desa Cendil Belitung Timur Jadi Juara 1 Lomba Kesatuan PKK Babel','program-ini-antar-perpustakaan-desa-cendil-belitung-timur-jadi-juara-1-lomba-kesatuan-pkk-babel','Belitung Timur lewat program Gerakan Gemar Membaca, berhasil menjadi Juara 1 pada Lomba Kesatuan Gerak Pemberdayaan dan Kesejahteraan Keluarga (PKK) tingkat Provinsi Kepulauan Bangka Belitung 2024 kategori Lomba Pelaksana Terbaik Galeri Pelangi.\r\n\r\nKepala Perpustakaan Desa Cendil, Eka Ria Listari merasa senang dan bangga setelah ditetapkan menjadi juara 1 pada lomba tingkat provinsi tersebut.\r\n\r\n\"Selain program itu, kami juga punya program Keluarga Melek Literasi. Program ini dilakukan agar para keluarga memiliki kesadaran yang penting untuk mengajak mereka untuk terus membaca buku sebagai jendela dunia,\" kata Eka, Jumat (20/9/2024).\r\n\r\nSelain itu, Perpustakaan Desa Cendil juga menjalankan program Kotak Ilmu, yaitu sarana yang dapat diakses oleh masyarakat, agar dapat terus memberikan saran terkait kegiatan di Perpustakaan Desa Cendil\r\n\r\nLalu program yang terakhir adalah Pojok Baca, yang disediakan oleh Perpustakaan Desa Cendil untuk menyediakan sarana baca seperti di masjid, tempat wisata, dan tempat lainnya yang mudah diakses oleh masyarakat.\r\n\r\nEka mengucapkan terima kasih kepada seluruh pihak yang terus memberikan dukungan kepada Perpustakaan Desa Cendil.\r\n\r\nMulai dari Dinas Perpustakaan dan Kearsipan Kabupaten Belitung Timur, Pemerintah Kecamatan Kelapa Kampit, Pemerintah Desa Cendil, dan seluruh masyarakat Desa Cendil.\r\n\r\n\"Semoga inovasi-inovasi program yang kami ciptakan ini bisa meningkatkan literasi dan minat baca masyarakat di Desa Cendil, Kelapa Kampit, maupun Belitung Timur secara umum,\" kata Eka','Pustaka','Kelapa Kampit',NULL,'publish','2023-09-20 14:29:00','2026-03-09 21:46:35'),
(3,NULL,'Membanggakan, Perpustakaan Desa Cendil wakili Babel di tingkat nasional','membanggakan-perpustakaan-desa-cendil-wakili-babel-di-tingkat-nasional','Perpustakaan Desa (Perpusdes) Cendil, Desa Cendil, Kecamatan Kelapa Kampit, Kabupaten Belitung Timur menjadi kebanggaan masyarakat ini berhasil meraih juara pertama pada lomba perpustakaan desa tingkat Provinsi Kepulauan Bangka Belitung.\r\n\r\nDengan capaian itu, Perpusdes Cendil resmi mewakili provinsi kepulauan Bangka Belitung di ajang lomba perpustakaan desa/kelurahan tingkat nasional tahun ini.\r\n\r\nKepala Perpusdes Desa Cendil, Eka Ria Lestari, menyampaikan rasa bangga dan syukurnya atas pencapaian ini.\r\n\r\n\"Alhamdulillah kemarin telah dilaksanakan kegiatan Pengumuman Pemenang Lomba Perpustakaan Desa/kelurahan terbaik ( Apresiasi Penyelenggaraan Lomba Perpustakaan Umum Terbaik di Tingkat Provinsi Kepulauan Bangka Belitung), Alhamdulillah dengan hasil pengumuman ini selaku kepala perpustakaan merasa terharu dan bangga atas capaian ini,\" ujar Eka di Manggar, Rabu (23/07/2025).\r\n\r\nLebih lanjut, Eka bilang, perjalanan panjang Perpusdes Cendil hingga sampai di titik ini penuh tantangan.\r\n\r\nSelama beberapa tahun terakhir, perpustakaan desa ini telah berubah menjadi pusat aktivitas yang ramah dan inklusif.\r\n\r\nAnak-anak bisa menikmati ruang membaca dan mengikuti kelas gratis seperti bahasa Inggris dan mengaji.\r\n\r\nPara ibu rumah tangga dan pemuda bisa belajar keterampilan baru di Pojok Kreasi, yang juga menjadi wadah untuk mempromosikan produk-produk UMKM lokal.\r\n\r\nMasyarakat yang ingin meningkatkan kemampuan teknologi mendapat kesempatan mengikuti pelatihan komputer dasar yang rutin diadakan.\r\n\r\n“Tak hanya itu, Perpusdes Cendil juga menyediakan ruang konsultasi bagi warga yang ingin mendapatkan informasi hukum dan kesehatan secara gratis, hasil kerja sama dengan relawan profesional,” kata Eka.\r\n\r\nMereka bahkan menghadirkan layanan katalog online dan aplikasi Android untuk memastikan akses informasi bisa dinikmati siapa saja, kapan saja.\r\n\r\nEka menambahkan, konsep inklusi sosial ini juga menjadikan Perpusdes Cendil sebagai ruang aman dan nyaman bagi semua warga tanpa memandang latar belakang, usia, maupun tingkat pendidikan.\r\n\r\nSuasana perpustakaan kini lebih hidup dan menjadi tempat berkumpul, berbagi pengalaman, serta memperkuat solidaritas antarwarga.\r\n\r\n“Kami ingin perpustakaan ini menjadi jantung desa, di mana siapa saja bisa belajar, berkreasi, dan berdaya. Konsep inklusi sosial ini menjadi semangat kami untuk terus berinovasi,” imbuhnya','Umum',NULL,NULL,'publish','2025-06-23 13:54:00','2026-03-11 09:17:53'),
(4,NULL,'Diskominfo Beltim Lakukan Koordinasi Pengembangan Website Pustaka Cendil','diskominfo-beltim-lakukan-koordinasi-pengembangan-website-pustaka-cendil-1773195559','Dinas Komunikasi, Informatika, Statistik dan Persandian (Diskominfo SP) Kabupaten Belitung Timur menerima kunjungan perwakilan Pustaka Cendil dalam rangka koordinasi dan pembahasan permohonan pembuatan website resmi.\r\n\r\nPertemuan yang dilaksanakan pada Kamis, 12 Desember tersebut bertujuan untuk menindaklanjuti surat permohonan pengembangan website yang telah diajukan oleh Pustaka Cendil. Dalam pertemuan ini, kedua belah pihak melakukan diskusi terkait kebutuhan website, kesiapan konten, serta mekanisme layanan pengembangan website di lingkungan Pemerintah Kabupaten Belitung Timur\r\n\r\n.Tim Bidang Aplikasi Informatika Diskominfo SP menjelaskan alur teknis pengembangan website, termasuk standar keamanan, pengelolaan domain, serta peran pengelola konten dari pihak Pustaka Cendil. Selain itu, dilakukan pula klarifikasi mengenai data dan materi yang diperlukan agar website dapat dikembangkan dan dikelola secara optimal.Melalui pertemuan ini, disepakati bahwa pengembangan website akan dilaksanakan secara bertahap sesuai dengan kelengkapan data dan kesiapan dari pihak Pustaka Cendil. Diskominfo SP akan memberikan dukungan teknis sesuai ketentuan yang berlaku.\r\n\r\nDiharapkan dengan adanya website resmi tersebut, Pustaka Cendil dapat meningkatkan layanan informasi, dokumentasi kegiatan, serta akses publik terhadap informasi yang disediakan.','Kegiatan','Manggar',NULL,'publish','2025-12-16 09:18:00','2026-03-11 09:19:19'),
(5,NULL,'Panen Raya Jagung Serentak Kuartal I 2026 Digelar di Perpustakaan Cendil','panen-raya-jagung-serentak-kuartal-i-2026-digelar-di-perpustakaan-cendil-1773195621','Panen raya jagung serentak Kuartal I Tahun 2026 digelar di kawasan Perpustakaan Cendil pada Kamis,8 Januari 2026, sebagai bagian dari upaya mendukung ketahanan pangan dan meningkatkan produktivitas pertanian jagung di daerah.\r\n\r\nKegiatan panen raya ini diikuti oleh unsur pemerintah daerah, kelompok tani, penyuluh pertanian, serta masyarakat sekitar. Perpustakaan Cendil dipilih sebagai lokasi kegiatan karena dinilai strategis sebagai pusat edukasi dan literasi, termasuk literasi pertanian bagi masyarakat.\r\n\r\nPanen raya jagung serentak ini merupakan hasil kerja sama antara petani dan pemerintah dalam penerapan teknologi pertanian serta penggunaan benih unggul. Hasil panen pada Kuartal I 2026 menunjukkan peningkatan yang signifikan dibandingkan periode yang sama tahun sebelumnya, baik dari sisi produktivitas maupun kualitas jagung yang dihasilkan.\r\n\r\nDalam sambutannya, Kabag SDM Polres Beltim, Kompol Morhan Sabar S. Lumbantoruan, S.H. menyampaikan bahwa pelaksanaan panen raya jagung di Perpustakaan Cendil menjadi simbol integrasi antara sektor pertanian dan pendidikan. “Perpustakaan bukan hanya tempat membaca, tetapi juga ruang pembelajaran bagi masyarakat, termasuk dalam pengembangan pertanian berkelanjutan,” ujarnya.\r\n\r\nPara petani menyambut baik pelaksanaan panen raya ini. Salah satu petani menyampaikan bahwa dukungan sarana produksi, pendampingan teknis, serta kondisi cuaca yang mendukung turut berkontribusi terhadap keberhasilan panen jagung tahun ini.\r\n\r\nMelalui panen raya jagung serentak Kuartal I Tahun 2026, pemerintah berharap ketersediaan jagung sebagai komoditas strategis dapat terus terjaga, sekaligus meningkatkan pendapatan petani dan memperkuat ketahanan pangan daerah.\r\n\r\nKegiatan ini juga diharapkan dapat menjadi sarana edukasi bagi masyarakat dan generasi muda untuk lebih mengenal sektor pertanian sebagai bidang yang menjanjikan dan berperan penting dalam pembangunan ekonomi.','Kegiatan','Kelapa Kampit',NULL,'publish','2025-01-13 09:19:00','2026-03-11 09:20:21'),
(6,NULL,'Dinas Kominfo Gelar Pelatihan Website bagi Pengelola Perpustakaan Cendil','dinas-kominfo-gelar-pelatihan-website-bagi-pengelola-perpustakaan-cendil-1773195700','Dinas Komunikasi dan Informatika (Kominfo) menyelenggarakan kegiatan Pelatihan Website: Akses, Kelola, dan Publikasikan Informasi bagi pengelola Perpustakaan Cendil, pada Selasa, 13 Januari 2026. Kegiatan ini bertujuan untuk meningkatkan kapasitas pengelola perpustakaan dalam memanfaatkan website sebagai sarana informasi dan layanan digital kepada masyarakat.\r\n\r\nPelatihan tersebut diikuti oleh para pengelola dan staf Perpustakaan Cendil. Materi yang diberikan meliputi pengenalan website, cara mengakses sistem, pengelolaan konten, hingga teknik mempublikasikan informasi secara efektif dan tepat sasaran.\r\n\r\nPerwakilan Dinas Kominfo dalam sambutannya menyampaikan bahwa website merupakan media strategis dalam mendukung keterbukaan informasi publik dan peningkatan kualitas layanan. “Melalui pelatihan ini, kami berharap pengelola Perpustakaan Cendil mampu mengelola website secara mandiri dan menjadikannya sebagai pusat informasi yang mudah diakses oleh masyarakat,” ujarnya.\r\n\r\nSelama pelatihan berlangsung, peserta tidak hanya mendapatkan materi teori, tetapi juga praktik langsung dalam mengelola halaman website, mengunggah berita kegiatan, serta menyajikan informasi layanan perpustakaan secara digital. Antusiasme peserta terlihat dari keaktifan dalam sesi diskusi dan tanya jawab.\r\n\r\nPengelola Perpustakaan Cendil menyambut baik pelatihan yang diselenggarakan oleh Dinas Kominfo tersebut. Menurut mereka, kemampuan mengelola website sangat dibutuhkan untuk memperluas jangkauan layanan perpustakaan dan meningkatkan minat masyarakat dalam memanfaatkan fasilitas perpustakaan.\r\n\r\nMelalui kegiatan ini, Dinas Kominfo berharap terwujudnya sinergi antara teknologi informasi dan pengelolaan perpustakaan, sehingga Perpustakaan Cendil dapat bertransformasi menjadi pusat literasi yang adaptif terhadap perkembangan digital.','Umum','Manggar',NULL,'publish','2026-01-13 09:20:00','2026-03-11 09:21:40'),
(7,NULL,'Sinergi Perpustakaan Desa Cendil dan Dinsos P3A Bangun Akses Literasi Inklusif','sinergi-perpustakaan-desa-cendil-dan-dinsos-p3a-bangun-akses-literasi-inklusif-1773195756','Perpustakaan Desa Cendil bersinergi dengan Dinas Sosial Pemberdayaan Perempuan dan Perlindungan Anak (P3A) dalam upaya membangun dan memperluas akses literasi inklusif bagi masyarakat desa, khususnya perempuan, anak, dan kelompok rentan. Kolaborasi ini menjadi langkah strategis untuk menghadirkan literasi yang tidak hanya informatif, tetapi juga aman, ramah, dan berkeadilan.\r\n\r\nMelalui sinergi tersebut, berbagai kegiatan literasi inklusif dilaksanakan, mulai dari pojok baca ramah anak, kelas literasi keluarga, diskusi edukatif tentang hak perempuan dan anak, hingga pendampingan komunitas. Perpustakaan Desa Cendil berperan sebagai ruang belajar berbasis komunitas, sementara Dinsos P3A memberikan penguatan materi, pendampingan sosial, serta perspektif perlindungan dalam setiap program yang dijalankan.\r\n\r\nPengelola Perpustakaan Desa Cendil menyampaikan bahwa perpustakaan desa memiliki peran penting sebagai pusat pembelajaran yang terbuka dan mudah diakses oleh seluruh lapisan masyarakat. “Literasi inklusif adalah fondasi untuk membangun desa yang sadar hak, peduli, dan melindungi perempuan serta anak. Sinergi dengan Dinsos P3A memperkuat peran tersebut,” ujarnya.\r\n\r\nSementara itu, pihak Dinsos P3A menilai kerja sama dengan perpustakaan desa sebagai bentuk pendekatan preventif dalam perlindungan perempuan dan anak. Melalui literasi, masyarakat diharapkan memiliki pemahaman yang lebih baik tentang isu kekerasan, pengasuhan positif, kesetaraan gender, serta pentingnya lingkungan yang aman bagi tumbuh kembang anak.\r\n\r\nSinergi ini diharapkan mampu mendorong partisipasi aktif masyarakat desa dalam gerakan literasi inklusif sekaligus menjadi contoh kolaborasi lintas sektor yang berkelanjutan. Ke depan, Perpustakaan Desa Cendil dan Dinsos P3A berkomitmen untuk terus mengembangkan program literasi yang adaptif terhadap kebutuhan masyarakat dan berorientasi pada perlindungan serta pemberdayaan.','Umum','Manggar',NULL,'publish','2026-01-14 09:21:00','2026-03-11 09:22:36'),
(8,NULL,'Optimalisasi Pemanfaatan Bahan Alami melalui Pelatihan Pestisida Nabati Bersama KKN Unsoed Nusa Persada','optimalisasi-pemanfaatan-bahan-alami-melalui-pelatihan-pestisida-nabati-bersama-kkn-unsoed-nusa-persada-1773195820','Mahasiswa Kuliah Kerja Nyata (KKN) Universitas Jenderal Soedirman (Unsoed) Nusa Persada melaksanakan kegiatan pelatihan pembuatan pestisida nabati sebagai upaya mendukung pertanian ramah lingkungan dan berkelanjutan di desa lokasi pengabdian. Kegiatan ini mengusung tema “Optimalisasi Pemanfaatan Bahan Alami melalui Pelatihan Pestisida Nabati Bersama KKN Unsoed Nusa Persada”.\r\n\r\nPelatihan yang diikuti oleh para petani dan masyarakat setempat ini bertujuan untuk meningkatkan pemahaman mengenai alternatif pengendalian hama yang lebih aman, murah, dan mudah dibuat secara mandiri. Dalam kegiatan tersebut, mahasiswa KKN memberikan edukasi mengenai dampak penggunaan pestisida kimia secara berlebihan serta manfaat penggunaan pestisida nabati yang lebih ramah terhadap lingkungan dan kesehatan.\r\n\r\nPeserta pelatihan diajak untuk memanfaatkan bahan-bahan alami yang mudah ditemukan di sekitar, seperti daun mimba, bawang putih, serai, dan cabai. Bahan-bahan tersebut diolah melalui proses sederhana, mulai dari pencacahan, perendaman, penyaringan, hingga siap diaplikasikan pada tanaman. Selain praktik langsung, peserta juga diberikan penjelasan mengenai dosis penggunaan dan cara penyimpanan agar pestisida nabati tetap efektif.\r\n\r\nAntusiasme masyarakat terlihat dari banyaknya pertanyaan dan diskusi yang berlangsung selama kegiatan. Para petani menyambut baik inovasi ini karena dapat mengurangi biaya produksi sekaligus menjaga kualitas hasil panen. Mereka berharap pelatihan serupa dapat terus dilakukan agar pengetahuan yang diperoleh dapat diterapkan secara berkelanjutan.\r\n\r\nMelalui program ini, KKN Unsoed Nusa Persada berharap dapat mendorong kemandirian petani dalam mengelola lahan pertanian secara lebih sehat dan berwawasan lingkungan. Kegiatan ini juga menjadi wujud nyata peran mahasiswa dalam mendukung pembangunan desa, khususnya dalam sektor pertanian yang berkelanjutan.','Kegiatan','Kelapa Kampit',NULL,'publish','2026-01-23 09:22:00','2026-03-11 09:23:40'),
(9,NULL,'Upaya Dinas Perikanan Belitung Timur Perkuat Umkm Sektor Pengolahan Ikan Melalui Sambal Lingkong','upaya-dinas-perikanan-belitung-timur-perkuat-umkm-sektor-pengolahan-ikan-melalui-sambal-lingkong-1773195898','Dinas Perikanan Kabupaten Belitung Timur kembali menunjukkan komitmennya dalam memperkuat sektor Usaha Mikro, Kecil, dan Menengah (UMKM) melalui pelatihan pembuatan sambal lingkong yang digelar di Perpustakaan Cendil. Kegiatan ini diikuti oleh warga sekitar dan pelaku UMKM yang ingin mengembangkan usaha olahan hasil perikanan.\r\n\r\nPelatihan ini bertujuan meningkatkan keterampilan masyarakat dalam mengolah ikan menjadi produk bernilai tambah. Sambal lingkong, sebagai salah satu makanan khas daerah berbahan dasar ikan suwir yang dibumbui rempah dan cabai, dinilai memiliki potensi besar untuk dikembangkan sebagai produk unggulan lokal.\r\n\r\nDalam kegiatan tersebut, peserta mendapatkan materi mulai dari pemilihan bahan baku ikan yang segar dan berkualitas, teknik pengolahan yang higienis, proses pembuatan sambal lingkong yang sesuai standar, hingga cara pengemasan yang menarik dan layak jual. Tidak hanya itu, peserta juga dibekali pengetahuan tentang manajemen usaha sederhana, strategi pemasaran, serta pentingnya perizinan produk seperti PIRT.\r\n\r\nKepala Dinas Perikanan Belitung Timur menyampaikan bahwa pelatihan ini merupakan bagian dari upaya pemerintah daerah dalam mendorong kemandirian ekonomi masyarakat. Dengan adanya keterampilan tambahan, diharapkan masyarakat mampu menciptakan peluang usaha baru yang berkelanjutan serta meningkatkan pendapatan keluarga.\r\n\r\nPemilihan Perpustakaan Cendil sebagai lokasi kegiatan juga menjadi simbol sinergi antara peningkatan literasi dan pemberdayaan ekonomi masyarakat. Selain menjadi pusat literasi, perpustakaan diharapkan dapat berfungsi sebagai ruang produktif untuk kegiatan pelatihan dan pengembangan keterampilan warga.\r\n\r\nMelalui kegiatan ini, Dinas Perikanan Belitung Timur berharap sambal lingkong dapat semakin dikenal luas dan menjadi produk khas yang mampu bersaing di pasar regional maupun nasional, sekaligus memperkuat posisi UMKM sektor pengolahan ikan di Belitung Timur.','Kegiatan',NULL,NULL,'publish','2026-01-27 09:24:00','2026-03-11 09:24:58'),
(10,NULL,'Melalui SIJARES, Perpustakaan Cendil Ajak Anak Muda Perkuat Silaturahmi Lewat Buka Bersama','melalui-sijares-perpustakaan-cendil-ajak-anak-muda-perkuat-silaturahmi-lewat-buka-bersama-1773195979','Perpustakaan Desa Cendil menggelar kegiatan buka puasa bersama dengan anak muda dalam rangka program SIJARES yang dilaksanakan di Perpustakaan Desa Cendil. Kegiatan ini menjadi momentum untuk mempererat silaturahmi sekaligus memperkuat kebersamaan di kalangan generasi muda selama bulan Ramadan.\r\n\r\nKegiatan yang berlangsung dengan suasana hangat dan penuh kebersamaan ini dihadiri oleh para pemuda desa serta pengelola perpustakaan. Selain menunggu waktu berbuka puasa, para peserta juga mengikuti kegiatan diskusi ringan, berbagi cerita, serta mempererat hubungan antar sesama.\r\n\r\nPengelola Perpustakaan Desa Cendil menyampaikan bahwa kegiatan ini merupakan bagian dari upaya perpustakaan untuk menjadi ruang yang tidak hanya menyediakan bahan bacaan, tetapi juga menjadi tempat berkumpul, belajar, dan membangun kebersamaan bagi masyarakat, khususnya anak muda.\r\n\r\nMelalui kegiatan SIJARES, perpustakaan berharap generasi muda semakin aktif berpartisipasi dalam berbagai kegiatan positif yang diselenggarakan di perpustakaan. Momentum buka puasa bersama ini juga diharapkan dapat memperkuat rasa persaudaraan dan menumbuhkan semangat kolaborasi di kalangan pemuda desa.\r\n\r\nKegiatan kemudian dilanjutkan dengan doa bersama dan berbuka puasa yang berlangsung sederhana namun penuh makna. Suasana kebersamaan terlihat dari keakraban para peserta yang saling berbagi cerita dan tawa, menjadikan perpustakaan sebagai ruang yang hidup dan dekat dengan masyarakat.\r\n\r\nDengan adanya kegiatan seperti ini, Perpustakaan Desa Cendil terus berupaya menghadirkan program-program yang bermanfaat serta mampu mempererat hubungan sosial di tengah masyarakat, khususnya generasi muda sebagai penerus pembangunan desa.','Kegiatan','Kelapa Kampit',NULL,'publish','2026-03-03 09:25:00','2026-03-11 09:26:19');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `skms`
--

DROP TABLE IF EXISTS `skms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `skms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `u1` int(11) NOT NULL,
  `u2` int(11) NOT NULL,
  `u3` int(11) NOT NULL,
  `u4` int(11) NOT NULL,
  `u5` int(11) NOT NULL,
  `u6` int(11) NOT NULL,
  `u7` int(11) NOT NULL,
  `u8` int(11) NOT NULL,
  `u9` int(11) NOT NULL,
  `saran` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skms`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `skms` WRITE;
/*!40000 ALTER TABLE `skms` DISABLE KEYS */;
INSERT INTO `skms` VALUES
(1,'jefri_hjs@yahoo.co.id','Laki-laki','15-20 Tahun','SD','PNS/TNI/Polri',4,4,4,4,4,4,4,4,4,'ok','2026-03-09 21:57:11','2026-03-09 21:57:11');
/*!40000 ALTER TABLE `skms` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `survei_pemustakas`
--

DROP TABLE IF EXISTS `survei_pemustakas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `survei_pemustakas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `subjek_disarankan` varchar(255) NOT NULL,
  `saran` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survei_pemustakas`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `survei_pemustakas` WRITE;
/*!40000 ALTER TABLE `survei_pemustakas` DISABLE KEYS */;
INSERT INTO `survei_pemustakas` VALUES
(1,'JEFRI HUNTER JUANDA SIANTURI, S.Kom','Umum','SD','Buruh',35,'ada','yaaya','2026-03-09 22:24:01','2026-03-09 22:24:01');
/*!40000 ALTER TABLE `survei_pemustakas` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Jefri Sianturi','jefri.sianturi@beltim.go.id',NULL,'$2y$12$XDYZnRpK6LI24Qf4LlRiQ.aH6f2Rz5AOEobhzIrr4BKVIfELLZPom','SCwLjyyRK0d5bWTXyqlne5eXqMdsjowHyxbWZjSC3MS3HhudZmT8j4HBA5n4','2026-03-09 14:01:48','2026-03-09 19:13:40','super_admin'),
(2,'Dona','dona@pustakacendil.go.id',NULL,'$2y$12$3s.RF8bEPsu8ce9u4d9XRuVt5Xu5dITlL6kJNmWh8HAXIDOnFJ38O','5Ce77m7Qg73UL6BuvXQKPivfcU5wp9WGrepKzvrpYwXWxnjE1tEEhA7eSlF7','2026-03-09 15:37:25','2026-03-09 19:15:09','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `youtube_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES
(1,'Profil perpustakaan desa cendil lomba Perpustakaan tingkat nasional',NULL,'Yv55NnnTGSg','publish','2026-03-09 14:36:28','2026-03-09 14:36:40'),
(2,'Profil perpustakaan desa cendil lomba Perpustakaan Desa Tingkat Provinsi tahun 2021',NULL,'0uYqZqsX2qs','publish','2026-03-09 15:10:46','2026-03-09 15:15:35');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-03-11  4:02:42
