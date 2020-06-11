-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sa021201_project_1
DROP DATABASE IF EXISTS `sa021201_project_1`;
CREATE DATABASE IF NOT EXISTS `sa021201_project_1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sa021201_project_1`;

-- Dumping structure for table sa021201_project_1.alamat
DROP TABLE IF EXISTS `alamat`;
CREATE TABLE IF NOT EXISTS `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `status` enum('Internal','External') NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.alamat: ~76 rows (approximately)
DELETE FROM `alamat`;
/*!40000 ALTER TABLE `alamat` DISABLE KEYS */;
INSERT INTO `alamat` (`id_alamat`, `nama`, `status`) VALUES
	(1, 'Deputi Bidang Pembangunan Manusia, Masyarakat dan Kebudayaan', 'Internal'),
	(2, 'Direktur Kesehatan dan Gizi Masyarakat', 'Internal'),
	(3, 'Direktur Pendidikan dan Agama', 'Internal'),
	(4, 'Direktur Pendidikan Tinggi, IPTEK dan Kebudayaan', 'Internal'),
	(5, 'Direktur Keluarga, Perempuan, Anak, Pemuda dan Olahraga', 'Internal'),
	(6, 'Deputi Bidang Politik, Hukum, Pertahanan dan Keamanan', 'Internal'),
	(7, 'Direktur Politik, dan Komunikasi', 'Internal'),
	(8, 'Direktur Aparatur Negara', 'Internal'),
	(9, 'Direktur Hukum dan Regulasi', 'Internal'),
	(10, 'Direktur Politik Luar Negeri dan Kerjasama Pembangunan Internasional', 'Internal'),
	(11, 'Direktur Pertahanan dan Keamanan', 'Internal'),
	(12, 'Deputi Bidang Kependudukan dan Ketenagakerjaan', 'Internal'),
	(13, 'Direktur Penanggulangan Kemiskinan dan Kesejahteraan Sosial', 'Internal'),
	(14, 'Direktur Tenaga Kerja dan Perluasan Kesempatan Kerja', 'Internal'),
	(15, 'Direktur Pengembangan Usaha Kecil, Menengah dan Koperasi', 'Internal'),
	(16, 'Direktur Perencanaan Kependudukan dan Perlindungan Sosial', 'Internal'),
	(17, 'Deputi Bidang Ekonomi', 'Internal'),
	(18, 'Direktur Perencanaan Makro dan Analisis Statistik', 'Internal'),
	(19, 'Direktur Keuangan Negara dan Analisis Moneter', 'Internal'),
	(20, 'Direktur Jasa Keuangan dan BUMN', 'Internal'),
	(21, 'Direktur Perdagangan, Investasi dan Kerjasama Ekonomi Internasional', 'Internal'),
	(22, 'Direktur Industri, Pariwisata dan Ekonomi Kreatif', 'Internal'),
	(23, 'Deputi Bidang Kemaritiman dan Sumber Daya Alam', 'Internal'),
	(24, 'Direktur Pangan dan Pertanian', 'Internal'),
	(25, 'Direktur Kehutanan dan Konservasi Sumber Daya Air', 'Internal'),
	(26, 'Direktur Kelautan dan Perikanan', 'Internal'),
	(27, 'Direktur Sumber Daya Energi, Mineral dan Pertambangan', 'Internal'),
	(28, 'Direktur Lingkungan Hidup', 'Internal'),
	(29, 'Deputi Bidang Sarana dan Prasarana', 'Internal'),
	(30, 'Direktur Pengairan dan Irigasi', 'Internal'),
	(31, 'Direktur Transportasi', 'Internal'),
	(32, 'Direktur Energi, Telekomunikasi dan Informatika', 'Internal'),
	(33, 'Direktur Kerjasama Pemerintah Swasta dan Rancang Bangun', 'Internal'),
	(34, 'Deputi Bidang Pengembangan Regional', 'Internal'),
	(35, 'Direktur Pengembangan Wilayah dan Kawasan', 'Internal'),
	(36, 'Direktur Daerah Tertinggal, Transmigrasi dan Perdesaan', 'Internal'),
	(37, 'Direktur Otonomi Daerah', 'Internal'),
	(38, 'Direktur Perkotaan, Perumahan dan Permukiman', 'Internal'),
	(39, 'Direktur Tata Ruang dan Pertanahan', 'Internal'),
	(40, 'Deputi Bidang Pendanaan Pembangunan', 'Internal'),
	(41, 'Direktur Perencanaan dan Pengembangan Pendanaan Pembangunan', 'Internal'),
	(43, 'Menteri PPN/Kepala Bappenas', 'Internal'),
	(44, 'Direktur Alokasi Pendanaan Pembangunan', 'Internal'),
	(45, 'Direktur Pendanaan Luar Negeri Bilateral', 'Internal'),
	(46, 'Direktur Pendanaan Luar Negeri Multilateral', 'Internal'),
	(47, 'Direktur Sistem dan Prosedur Pendanaan Pembangunan', 'Internal'),
	(48, 'Deputi Bidang Pemantauan, Evaluasi dan Pengendalian Pembangunan', 'Internal'),
	(49, 'Direktur Pemantauan, Evaluasi dan Pengendalian Pembangunan Daerah', 'Internal'),
	(50, 'Direktur Pemantauan, Evaluasi dan Pengendalian Pembangunan Sektoral', 'Internal'),
	(51, 'Direktur Sistem dan Pelaporan Pemantauan, Evaluasi dan Pengendalian Pembangunan', 'Internal'),
	(52, 'Sekretaris Kementerian PPN/Sekretaris Utama Bappenas', 'Internal'),
	(53, 'Kepala Biro Hubungan Masyarakat dan Tata Usaha Pimpinan', 'Internal'),
	(54, 'Kepala Biro Sumber Daya Manusia', 'Internal'),
	(55, 'Kepala Biro Hukum', 'Internal'),
	(56, 'Kepala Biro Umum', 'Internal'),
	(57, 'Kepala Biro Perencanaan, Organisasi dan Tata Laksana', 'Internal'),
	(58, 'Kepala Pusat Pembinaan Pendidikan dan Pelatihan Perencana', 'Internal'),
	(59, 'Kepala Pusat Data dan Informasi Perencanaan Pembangunan', 'Internal'),
	(60, 'Kepala Pusat Analisis Kebijakan dan Kinerja', 'Internal'),
	(61, 'Inspektorat Utama', 'Internal'),
	(62, 'Inspektorat Bidang Administrasi Umum', 'Internal'),
	(63, 'Inspektorat Bidang Kinerja Kelembagaan', 'Internal'),
	(64, 'Staf Ahli Bidang Sinergi Ekonomi dan Pembiayaan', 'Internal'),
	(65, 'Staf Ahli Bidang Sosial dan Penanggulangan Kemiskinan', 'Internal'),
	(66, 'Staf Ahli Bidang Hubungan Kelembagaan', 'Internal'),
	(67, 'Staf Ahli Bidang Pembangunan Sektor Unggulan dan Infrastruktur', 'Internal'),
	(68, 'Staf Ahli Bidang Pemerataan dan Kewilayahan', 'Internal'),
	(69, 'Kementerian Pertahanan', 'External'),
	(70, 'Badan Intelijen Negara', 'External'),
	(71, 'Lembaga Ketahanan Nasional', 'External'),
	(72, 'Badan Keamanan Laut', 'External'),
	(73, 'Kepolisian Negara Republik Indonesia', 'External'),
	(74, 'Badan Siber dan Sandi Negara', 'External'),
	(75, 'Badan Narkotika Nasional', 'External'),
	(76, 'Dewan Ketahanan Nasional', 'External'),
	(77, 'Lainnya', 'External'),
	(78, 'DPRD DKI', 'External');
/*!40000 ALTER TABLE `alamat` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.disposisi
DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE IF NOT EXISTS `disposisi` (
  `agenda_id` int(4) NOT NULL AUTO_INCREMENT,
  `agenda_no` varchar(30) NOT NULL,
  `agenda_tgl_surat` date NOT NULL,
  `agenda_tgl_terima` date NOT NULL,
  `agenda_no_surat` varchar(50) NOT NULL,
  `agenda_tentang` varchar(254) NOT NULL,
  `agenda_file` varchar(1000) NOT NULL,
  `agenda_dari` varchar(200) NOT NULL,
  `agenda_ket` varchar(500) NOT NULL,
  `agenda_posisi` int(2) NOT NULL,
  `waktu_acara` varchar(50) NOT NULL DEFAULT '',
  `kategori` varchar(20) NOT NULL,
  `Laporan` varchar(200) NOT NULL,
  `tingkat_surat` varchar(20) NOT NULL,
  `target` text NOT NULL,
  `target_selesai` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`agenda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.disposisi: ~1 rows (approximately)
DELETE FROM `disposisi`;
/*!40000 ALTER TABLE `disposisi` DISABLE KEYS */;
INSERT INTO `disposisi` (`agenda_id`, `agenda_no`, `agenda_tgl_surat`, `agenda_tgl_terima`, `agenda_no_surat`, `agenda_tentang`, `agenda_file`, `agenda_dari`, `agenda_ket`, `agenda_posisi`, `waktu_acara`, `kategori`, `Laporan`, `tingkat_surat`, `target`, `target_selesai`, `status`) VALUES
	(1, '1/Dt.7.5/04/2020', '2020-04-01', '2020-04-01', '389/SES.ND/03/2020', 'tes2', '1585902020_1-Dt_7_5-04-2020.pdf', 'Direktur Politik, dan Komunikasi - Internal', '', 1, '', '2', '', 'BIASA', 'laporkan ke saya jika sudah selesai', '0000-00-00', 0),
	(2, '2/Dt.7.5/04/2020', '2020-04-08', '2020-04-09', '127/SA.04.M/03/2020', 'Dgrektur Politik, dan Komunikasi - Internal Direktur Politik, dan Komunikasi - Internal Direktur Politik, dan Komunikasi - Internal', '1586401870_2-Dt_7_5-04-2020.pdf', 'DPRD DKI - External', 'Jakarta', 1, '10/04/2020 09:00 - 10/04/2020 13:00', '6', '', 'SEGERA', 'wakili saya', '0000-00-00', 0);
/*!40000 ALTER TABLE `disposisi` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.disposisi_aksi
DROP TABLE IF EXISTS `disposisi_aksi`;
CREATE TABLE IF NOT EXISTS `disposisi_aksi` (
  `idaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_staf` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `catatan` int(11) NOT NULL,
  PRIMARY KEY (`idaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.disposisi_aksi: ~0 rows (approximately)
DELETE FROM `disposisi_aksi`;
/*!40000 ALTER TABLE `disposisi_aksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `disposisi_aksi` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.disposisi_isi
DROP TABLE IF EXISTS `disposisi_isi`;
CREATE TABLE IF NOT EXISTS `disposisi_isi` (
  `isi_id` int(2) NOT NULL AUTO_INCREMENT,
  `isi_nama` varchar(100) NOT NULL,
  `isi_keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`isi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.disposisi_isi: ~22 rows (approximately)
DELETE FROM `disposisi_isi`;
/*!40000 ALTER TABLE `disposisi_isi` DISABLE KEYS */;
INSERT INTO `disposisi_isi` (`isi_id`, `isi_nama`, `isi_keterangan`) VALUES
	(1, 'Dibahas Bersama', ''),
	(2, 'Diteliti/Check/Dipelajari', ''),
	(3, 'Tanggapan', ''),
	(4, 'Siapkan Bahan/Draft', ''),
	(5, 'Siapkan Jawaban Sesuai Ketentuan', ''),
	(6, 'Catat dan Kembalikan', ''),
	(7, 'Laporan/Laporkan', ''),
	(8, 'Dapat Disetujui', ''),
	(9, 'Harap Dipenuhi', ''),
	(10, 'Koordinasikan', ''),
	(11, 'Untuk Diketahui', ''),
	(12, 'Untuk Digunakan', ''),
	(13, 'Untuk Menjadi Bahan Perhatian', ''),
	(14, 'Untuk Dimonitor', ''),
	(15, 'File/Arsip', ''),
	(16, 'Diedarkan', ''),
	(17, 'Agendakan', ''),
	(18, 'Hadiri/Wakili', ''),
	(19, 'Untuk Diselesaikan', ''),
	(20, 'Proses Sesuai Prosedur', ''),
	(21, 'Perbaiki', ''),
	(22, 'Lainnya', '');
/*!40000 ALTER TABLE `disposisi_isi` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.disposisi_tugas
DROP TABLE IF EXISTS `disposisi_tugas`;
CREATE TABLE IF NOT EXISTS `disposisi_tugas` (
  `tugas_id` int(5) NOT NULL AUTO_INCREMENT,
  `agenda_id` int(5) NOT NULL,
  `staf_id` int(5) NOT NULL,
  `read` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`tugas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.disposisi_tugas: ~6 rows (approximately)
DELETE FROM `disposisi_tugas`;
/*!40000 ALTER TABLE `disposisi_tugas` DISABLE KEYS */;
INSERT INTO `disposisi_tugas` (`tugas_id`, `agenda_id`, `staf_id`, `read`, `time`) VALUES
	(12, 12, 35, 0, '2018-05-31 11:39:49'),
	(13, 12, 35, 0, '2019-02-07 09:52:49'),
	(16, 2, 33, 1, '2020-04-13 07:12:00'),
	(17, 2, 49, 1, '2020-04-13 07:12:00'),
	(18, 1, 47, 1, '2020-04-30 12:06:49'),
	(19, 1, 40, 1, '2020-04-30 12:06:49');
/*!40000 ALTER TABLE `disposisi_tugas` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.disposisi_tugas_isi
DROP TABLE IF EXISTS `disposisi_tugas_isi`;
CREATE TABLE IF NOT EXISTS `disposisi_tugas_isi` (
  `tugas_isi_id` int(5) NOT NULL AUTO_INCREMENT,
  `agenda_id` int(5) NOT NULL,
  `isi_id` int(5) NOT NULL,
  `ket` text,
  PRIMARY KEY (`tugas_isi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.disposisi_tugas_isi: ~3 rows (approximately)
DELETE FROM `disposisi_tugas_isi`;
/*!40000 ALTER TABLE `disposisi_tugas_isi` DISABLE KEYS */;
INSERT INTO `disposisi_tugas_isi` (`tugas_isi_id`, `agenda_id`, `isi_id`, `ket`) VALUES
	(21, 12, 14, ''),
	(24, 2, 1, ''),
	(25, 2, 19, ''),
	(26, 1, 2, '');
/*!40000 ALTER TABLE `disposisi_tugas_isi` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.ic_events
DROP TABLE IF EXISTS `ic_events`;
CREATE TABLE IF NOT EXISTS `ic_events` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `title` text,
  `backgroundColor` varchar(11) NOT NULL,
  `borderColor` varchar(11) NOT NULL,
  `textColor` varchar(11) NOT NULL,
  `description` text,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `allDay` enum('true','false') NOT NULL DEFAULT 'false',
  `rendering` varchar(10) NOT NULL,
  `overlap` enum('true','false') NOT NULL DEFAULT 'true',
  `recurdays` int(4) NOT NULL,
  `recurend` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `filename` varchar(250) NOT NULL,
  `pubDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table sa021201_project_1.ic_events: ~2 rows (approximately)
DELETE FROM `ic_events`;
/*!40000 ALTER TABLE `ic_events` DISABLE KEYS */;
INSERT INTO `ic_events` (`eid`, `gid`, `id`, `did`, `category`, `username`, `title`, `backgroundColor`, `borderColor`, `textColor`, `description`, `start`, `end`, `url`, `allDay`, `rendering`, `overlap`, `recurdays`, `recurend`, `location`, `latitude`, `longitude`, `filename`, `pubDate`) VALUES
	(6, 0, 6, 0, 17, 'admin', 'Daftar Peserta Pelatihan Membuat Info Grafis dan Video', '#73db04', '#ffffff', '#ffffff', 'dddddd', '2019-10-18 00:00:00', '2019-10-18 00:00:00', '', 'false', '', 'true', 0, '0000-00-00', '0', 18.4737903235868, -77.9227824365539, '', '2019-10-17 16:20:33'),
	(7, -3, 452130625, 0, 17, 'admin', 'gggggggggg', '#73db04', '#ffffff', '#ffffff', 'ggggggg', '2019-10-25 00:00:00', '2019-10-25 00:00:00', '', 'false', '', 'true', 0, '0000-00-00', '0', 18.4737903235868, -77.9227824365539, '', '2019-10-17 16:20:33');
/*!40000 ALTER TABLE `ic_events` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.ic_groups
DROP TABLE IF EXISTS `ic_groups`;
CREATE TABLE IF NOT EXISTS `ic_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table sa021201_project_1.ic_groups: ~5 rows (approximately)
DELETE FROM `ic_groups`;
/*!40000 ALTER TABLE `ic_groups` DISABLE KEYS */;
INSERT INTO `ic_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Sekretaris'),
	(2, 'members', 'General User'),
	(3, 'direktur', 'Direktur'),
	(4, 'kasubdit', 'Kasubdit'),
	(5, 'lainnya', 'Lainnya');
/*!40000 ALTER TABLE `ic_groups` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.ic_login_attempts
DROP TABLE IF EXISTS `ic_login_attempts`;
CREATE TABLE IF NOT EXISTS `ic_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sa021201_project_1.ic_login_attempts: ~0 rows (approximately)
DELETE FROM `ic_login_attempts`;
/*!40000 ALTER TABLE `ic_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ic_login_attempts` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.ic_users
DROP TABLE IF EXISTS `ic_users`;
CREATE TABLE IF NOT EXISTS `ic_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `last_page` varchar(255) NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `display` enum('1','0') NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `lang` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `cal_timezone` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Asia/Jakarta',
  `cal_defaultview` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'month',
  `cal_header_left` varchar(95) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'month,agendaWeek,basicDay,agendaList',
  `cal_header_center` varchar(95) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'title',
  `cal_header_right` varchar(95) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prev,next,today',
  `cal_editable` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `cal_firstday` int(2) NOT NULL DEFAULT '0',
  `cal_businessstart` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cal_businessend` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cal_businessdays` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cal_hiddendays` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `cal_isrtl` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `cal_weeknumbers` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `cal_eventlimit` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `cal_alldayslot` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'true',
  `cal_slotduration` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '00:30:00',
  `cal_slotlabeling` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `cal_slotlabelformat` varchar(11) NOT NULL DEFAULT 'hh:mm a',
  `cal_aspectratio` float NOT NULL DEFAULT '1.45',
  `cal_mintime` varchar(9) NOT NULL DEFAULT '00:00:00',
  `cal_maxtime` varchar(9) NOT NULL DEFAULT '24:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Dumping data for table sa021201_project_1.ic_users: ~20 rows (approximately)
DELETE FROM `ic_users`;
/*!40000 ALTER TABLE `ic_users` DISABLE KEYS */;
INSERT INTO `ic_users` (`id`, `urut`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `last_page`, `active`, `display`, `first_name`, `last_name`, `company`, `phone`, `image`, `lang`, `cal_timezone`, `cal_defaultview`, `cal_header_left`, `cal_header_center`, `cal_header_right`, `cal_editable`, `cal_firstday`, `cal_businessstart`, `cal_businessend`, `cal_businessdays`, `cal_hiddendays`, `cal_isrtl`, `cal_weeknumbers`, `cal_eventlimit`, `cal_alldayslot`, `cal_slotduration`, `cal_slotlabeling`, `cal_slotlabelformat`, `cal_aspectratio`, `cal_mintime`, `cal_maxtime`) VALUES
	(26, 11, '10.1.160.18', 'primadiayuemunda', '$2y$08$I8aaF4CuXYXr9set1TPVjO50zUpz2gLubJTDKXsI/3LbNU9io9wsy', NULL, 'rizkymaulanaichsan@gmail.com', NULL, NULL, NULL, NULL, 1524210382, 1530602961, 'profile', 1, '1', 'Emunda', ' ', 'Sekretaris', '081230649979', 'female.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(27, 0, '10.1.160.18', 'wisnu238', '$2y$08$Stz517xunPwaa2vWDscazub26syn7dnNf7lLx.ipJDQZxfv99O4iG', NULL, 'rizkymaulanaichsan@gmail.com', NULL, NULL, NULL, NULL, 1524216150, 1528171107, 'home', 1, '1', 'Dr.Ir.Wisnu', 'Utomo, M.Sc', 'Direktur', '0123456789', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(32, 0, '10.1.160.18', 'admin', '$2y$08$V0WeEPDPLvkz6TjxkdTcO.yKSJZyCM4WbhMa0imPc5yuWygkWIxCa', NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, 1525084820, 1586327771, 'profile', 1, '0', 'admin', 'admin', 'Sekretaris', '123456789', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(33, 1, '10.1.160.18', 'amat.khomdomi', '$2y$08$Ru8x0dYWOhBlZ6GEvC0mWOrZGFcWqn8OSd2y32dqQRXN4HieNxmuq', NULL, 'amat.khomdomi@gmail.com', NULL, NULL, NULL, NULL, 1526277329, 1527049373, '/', 1, '1', 'Kasubdit Ketahanan Negara', '(Gunarta)', 'Kasubdit', '0213927342', 'gatotkaca.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(34, 2, '10.1.160.18', 'fauzal.bappenas', '$2y$08$bNP5rl.KFi17agdJtTXogeICCV.Tltwv32Qwiug0cYlWOH7.g.qmO', NULL, 'fauzal.bappenas@gmail.com', NULL, NULL, NULL, NULL, 1526277532, 1528345768, '', 1, '1', 'Kasubdit Pertahanan Negara', '(Fauzal Muslim)', 'Kasubdit', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(35, 3, '10.1.160.18', 'maharani.wibowo', '$2y$08$5/FvKrsiPDzIrVC9OiYSBeEkEefhrTsvrpjaggLxwXAZfFkDbWBzO', NULL, 'maharani.wibowo@gmail.com', NULL, NULL, NULL, NULL, 1526277665, 1549616441, '', 1, '1', 'Kasubdit Keamanan dan Ketertiban', '(Maharani Putri)', 'Kasubdit', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(36, 4, '10.1.160.18', 'bogatw', '$2y$08$ZOS8/nI6aK2Upe914K2v0uztqsJEJyLRb9pCYnAWlct2vahPxMF/6', NULL, 'bogatw@gmail.com', NULL, NULL, NULL, NULL, 1526277749, 1527049512, '', 1, '1', 'Bogat', 'Widyatmoko', 'Fungsional Perencana', '021392 7342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(37, 6, '10.1.160.18', 'putri.saraswati', '$2y$08$7n/Y9DWBToDTAVhscdVN1u1bJ.7YwrecGkYutmAQgOTW5T6a40KUO', NULL, 'putri.putrisaras@gmail.com', NULL, NULL, NULL, NULL, 1526280711, 1526443953, '', 1, '1', 'Putri', 'Saraswati', 'Staf', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(38, 6, '10.1.160.18', 'wahyu.rachmadhani', '$2y$08$vlgOu9PrSmxAURHSEFj5CeGboXmVaLuHEO7MHAcEzbjwXG4/heWEe', NULL, 'wahyu.rachmadhani@gmail.com', NULL, NULL, NULL, NULL, 1526281037, NULL, '', 1, '1', 'Wahyu', 'Rachmadhani', 'Staf', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(39, 7, '10.1.160.18', 'rickyhendrasukmana', '$2y$08$pd9ByzSCOrQ5eeSDj0GVzuPfSPrRBhMXrOt/Zd5QOQkn883o9sSlG', NULL, 'rickyhendrasukmana@gmail.com', NULL, NULL, NULL, NULL, 1526281224, 1537165408, '', 1, '1', 'Ricky', 'Hendra S', 'Staf', '0213927342', 'kabayan.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(40, 8, '10.1.160.18', 'qomara.grienda', '$2y$08$XhhFDe4QVStVKeB9ka1AQOTweO1qpKA8N6IbaFgbUGuFJkhjugNHq', NULL, 'qomara.grienda@gmail.com', NULL, NULL, NULL, NULL, 1526281313, NULL, '', 1, '1', 'Grienda', 'Qomara', 'Staf', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(41, 9, '10.1.160.18', 'imroatulamalia', '$2y$08$Ax8QBraZviVG6AJLJN7yQeAdSrNMySKjI0tvlRKRnYsfsSLH00SAO', NULL, 'imroatulamalia@gmail.com', NULL, NULL, NULL, NULL, 1526281384, NULL, '', 1, '1', 'Imroatul', 'Amaliyah', 'Staf', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(42, 10, '10.1.160.18', 'erie.febriyanto', '$2y$08$lwx3n9joNmZauFNBejFFrulY5xh.lX5nsS.NMcEAAyUC6cBH/rDBi', NULL, 'erie.febriyanto@gmail.com', NULL, NULL, NULL, NULL, 1526281647, 1526981695, '', 1, '1', 'Erie', 'Febrianto', 'Staf', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(43, 11, '10.1.160.18', 'eizabianca', '$2y$08$hFYDWoqtyh/mtjaVLS.VGuIMERHWex94U/yFmcx6Ii8g9ySBsNLZW', NULL, 'eizabianca@yahoo.com', NULL, NULL, NULL, NULL, 1526283233, NULL, '', 1, '1', 'Eiza', 'Bianca', 'Lainnya', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(44, 10, '10.1.160.18', 'mahmud', '$2y$08$8TYCZktKX7Td.rNs93lbBugkxSiobGeoV8fjCdXYpahicPVfBhsIO', NULL, 'mahmud@bappenas.go.id', NULL, NULL, NULL, NULL, 1526283433, 1526524842, 'home', 1, '1', 'Mahmud', '', 'Sekretaris', '0213927342', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(45, 12, '10.1.160.18', 'a.subkhi', '$2y$08$O.x10x49U.3t6N2pvPLddOVQHtq.GxlbePkZczy1LljAY6F6RGs7q', NULL, 'a.subkhi@gmail.com', NULL, NULL, NULL, NULL, 1526443566, NULL, '', 1, '1', 'Alqoma', 'Subkhi', 'Staf', '085655219379', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(46, 12, '10.1.160.18', 'muhlisun09', '$2y$08$UidOyddnjxYfitPPa4pwsOnf2ZjQqOFGvie1C9w0Yccw/5FZkVZMi', NULL, 'muhlisun09@gmail.com', NULL, NULL, NULL, NULL, 1526446177, 1527049418, '/', 1, '1', 'Muhlisun', '', 'Sekretaris', '123456789', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(47, 4, '10.1.160.18', 'ranggots', '$2y$08$MJ4V.qdW8tkmNtP6OZDX2ObeyVt3ZEj7pQftRor/vOEsVpfdj8.2a', NULL, 'ranggots@yahoo.com', NULL, NULL, NULL, NULL, 1526446279, 1527049534, '/', 1, '1', 'Rangga', 'Jantan W', 'Staf', '123456789', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(48, 5, '10.1.160.18', 'cerdikwan', '$2y$08$3OUOmmzsR.vQ5hQ9aLp5/e9ZiACOvsxWskThPaGNyZUa/GpI6jzk2', NULL, 'cerdikwan@gmail.com', NULL, NULL, NULL, NULL, 1526446319, 1535513247, '/', 1, '1', 'Cerdikwan', '', 'Staf', '123456789', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00'),
	(49, 8, '10.1.160.18', 'ichsan.rizkym', '$2y$08$sCqQIc34AZ0ayNtiyJ33.OsYEjxDJ356eLtUx2OYDIRK.8LCuT/Ym', NULL, 'ichsan.rizkym@gmail.com', NULL, NULL, NULL, NULL, 1549508223, 1549508254, '', 1, '1', 'rizky2', 'Maulana', 'Staf', '085642315623', 'raden.png', 'en', 'Asia/Jakarta', 'month', 'month,agendaWeek,basicDay,agendaList', 'title', 'prev,next,today', 'true', 0, '', '', '', '-1', 'false', 'true', 'true', 'true', '00:30:00', 'false', 'hh:mm a', 1.45, '00:00:00', '24:00:00');
/*!40000 ALTER TABLE `ic_users` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.ic_users_groups
DROP TABLE IF EXISTS `ic_users_groups`;
CREATE TABLE IF NOT EXISTS `ic_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

-- Dumping data for table sa021201_project_1.ic_users_groups: ~22 rows (approximately)
DELETE FROM `ic_users_groups`;
/*!40000 ALTER TABLE `ic_users_groups` DISABLE KEYS */;
INSERT INTO `ic_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(45, 1, 1),
	(91, 26, 1),
	(124, 27, 3),
	(99, 32, 1),
	(103, 33, 4),
	(102, 34, 4),
	(94, 35, 4),
	(110, 36, 2),
	(97, 37, 2),
	(77, 38, 2),
	(104, 39, 2),
	(79, 40, 2),
	(80, 41, 2),
	(81, 42, 2),
	(82, 43, 5),
	(83, 44, 5),
	(84, 45, 2),
	(85, 46, 1),
	(86, 47, 2),
	(87, 48, 2),
	(126, 49, 2),
	(109, 50, 2);
/*!40000 ALTER TABLE `ic_users_groups` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.identitas
DROP TABLE IF EXISTS `identitas`;
CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `verification` varchar(250) DEFAULT NULL,
  `versi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.identitas: 1 rows
DELETE FROM `identitas`;
/*!40000 ALTER TABLE `identitas` DISABLE KEYS */;
INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `logo`, `verification`, `versi`) VALUES
	(1, 'Persuratan', 'admin@gmail.com', 'persuratan.ky', 'https://www.facebook.com/pages/Kementerian-PPNBappenas/153022218082084?&kid=1415747503,https://twitter.com/Bappenasri,#, https://plus.google.com/+BappenasRI/about?&kid=1415747503', '0812-6777-1344', 'Administrasi persuratan', 'persuratan, office', 'mail.png', 'logo.png', '', '1.0');
/*!40000 ALTER TABLE `identitas` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.kategori: 4 rows
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `keterangan`) VALUES
	(1, 'Surat Keluar'),
	(2, 'Surat Masuk'),
	(5, 'Diklat'),
	(6, 'Undangan Rapat');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.komentar
DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `agenda_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `file` text,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.komentar: ~0 rows (approximately)
DELETE FROM `komentar`;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` (`id`, `id_user`, `agenda_id`, `isi_komentar`, `file`, `time`) VALUES
	(15, 32, 1, 'ikjugythsj', 'Pengumuman_Libur_1_Mei_2020.pdf;yuop.pdf;werr.pdf;', '2020-05-04 13:56:00');
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.konfirmasi
DROP TABLE IF EXISTS `konfirmasi`;
CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_memo` int(11) NOT NULL,
  `tujuan` text,
  `penerima` text,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.konfirmasi: 6 rows
DELETE FROM `konfirmasi`;
/*!40000 ALTER TABLE `konfirmasi` DISABLE KEYS */;
INSERT INTO `konfirmasi` (`id`, `id_memo`, `tujuan`, `penerima`, `tgl`) VALUES
	(1, 1, 'dit', NULL, NULL),
	(2, 2, 'undangan1', 'jason', '2018-09-18 12:53:00'),
	(3, 2, 'undangan2', NULL, '2018-09-18 12:53:00'),
	(4, 2, 'undangan3', NULL, NULL),
	(5, 2, 'undangan4', NULL, NULL),
	(6, 3, 'sanjaya', NULL, NULL);
/*!40000 ALTER TABLE `konfirmasi` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.laporan
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_id` int(11) NOT NULL,
  `laporan` text NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.laporan: ~0 rows (approximately)
DELETE FROM `laporan`;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` (`id_laporan`, `agenda_id`, `laporan`) VALUES
	(1, 1, '');
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

-- Dumping structure for table sa021201_project_1.memo
DROP TABLE IF EXISTS `memo`;
CREATE TABLE IF NOT EXISTS `memo` (
  `id_memo` int(11) NOT NULL AUTO_INCREMENT,
  `no_memo` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(1000) NOT NULL,
  `id_staf` int(11) NOT NULL,
  `pic` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_memo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sa021201_project_1.memo: ~2 rows (approximately)
DELETE FROM `memo`;
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` (`id_memo`, `no_memo`, `jenis`, `judul`, `tanggal`, `file`, `id_staf`, `pic`, `kategori`) VALUES
	(4, '389/SES.ND/03/2020', '', 'test2', '2020-01-23', '1584953969_389SES_ND032020.pdf', 32, 0, '1');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
