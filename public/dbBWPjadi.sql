/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - opentalk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`opentalk` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `opentalk`;

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `password_dosen` varchar(255) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dosen` */

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(100) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  UNIQUE KEY `nama_jurusan` (`nama_jurusan`),
  UNIQUE KEY `kode_jurusan` (`kode_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`,`kode_jurusan`,`fakultas`) values
(1,'Teknik Informatika','TI','teknik');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

/*Table structure for table `keluhan` */

DROP TABLE IF EXISTS `keluhan`;

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_live_account` int(11) NOT NULL,
  `judul_keluhan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_keluhan` tinyint(1) DEFAULT 2,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_keluhan`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_live_account` (`id_live_account`),
  CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_live_account`) REFERENCES `live_account` (`id_live_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO keluhan (id_kategori, id_live_account, judul_keluhan, deskripsi, status_keluhan, created_at, updated_at)
VALUES
(1, 1, 'Open Talk', 'Open Talk kali ini sangat bagus yah!', '1', '2025-01-21 22:25:42', '2025-01-21 15:41:48'),
(2, 1, 'Open Talk', 'Student lounge nya kurang bagus', '1', '2025-01-21 22:26:24', '2025-01-21 15:43:09'),
(3, 1, 'Open Heim', 'Bom nya kurang seru bang', '2', '2025-01-21 23:57:25', NULL),
(3, 1, 'Pubg', 'Aim nya kurang bagus bang', '2', '2025-01-22 10:22:45', NULL),
(2, 1, 'Open Talk 2025', 'Open Talk Pada kali ini kurang begitu menarik seperti yang ...', '2', '2025-01-22 03:20:51', NULL),
(2, 1, 'Open Talk 2024', 'Menurut saya lumayan menarik open talk 2024 ini karena ba...', '2', '2025-01-22 10:27:40', NULL);

/*Data for the table `keluhan` */
insert  into `kategori`(`id_kategori`,`nama_kategori`) values
(1,'administrasi'),
(2,'fasilitas'),
(3,'akadedmis');


CREATE TABLE upvote (
    id_upvote INT(11) NOT NULL AUTO_INCREMENT,
    id_keluhan INT NOT NULL,
    username VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL,
     PRIMARY KEY (`id_vote`),
    CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`)
);

/*Table structure for table `live_account` */

DROP TABLE IF EXISTS `live_account`;

CREATE TABLE `live_account` (
  `id_live_account` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nrp` int(11) NOT NULL,
  `role_account` enum('siswa','admin','dosen') NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_live_account`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `live_account` */

insert  into `live_account`(`id_live_account`,`email`,`nrp`,`role_account`,`is_active`,`created_at`) values
(1,'siswa1@example.com',223117082,'siswa',1,'2025-01-10 22:07:56'),
(2,'siswa1@example.com',223117084,'admin',1,'2025-01-10 22:08:24');

/*Table structure for table `live_session` */

DROP TABLE IF EXISTS `live_session`;

CREATE TABLE `live_session` (
  `id_live_session` int(11) NOT NULL AUTO_INCREMENT,
  `id_live_account` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `periode` int(4) DEFAULT NULL,
  `is_archive` tinyint(1) DEFAULT 0,
  `is_acc` tinyint(1) DEFAULT 2,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_live_session`),
  KEY `id_live_account` (`id_live_account`),
  CONSTRAINT `live_session_ibfk_1` FOREIGN KEY (`id_live_account`) REFERENCES `live_account` (`id_live_account`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `live_session` */

insert  into `live_session`(`id_live_session`,`id_live_account`,`content`,`periode`,`is_archive`,`is_acc`,`created_at`) values
(1,1,'gvn gay',2025,0,NULL,'2025-01-18 12:46:31');

/*Table structure for table `respon_keluhan` */

DROP TABLE IF EXISTS `respon_keluhan`;

CREATE TABLE `respon_keluhan` (
  `id_respon` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluhan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `respon` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_respon`),
  KEY `id_keluhan` (`id_keluhan`),
  KEY `id_dosen` (`id_dosen`),
  CONSTRAINT `respon_keluhan_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`),
  CONSTRAINT `respon_keluhan_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `respon_keluhan` */

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) DEFAULT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `password_siswa` varchar(255) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`id_jurusan`,`nama`,`password_siswa`,`nrp`,`jenis_kelamin`,`angkatan`,`is_active`,`updated_at`) values
(1,1,'Given Lee','$2y$12$BIZG.7Y8ACKgWlL8iCmBiO7D5hi8cVjzyvo.7jDOxbQ//cdvlpMqa',223117082,'L',2025,1,NULL),
(2,1,'Yoshi','$2y$12$BIZG.7Y8ACKgWlL8iCmBiO7D5hi8cVjzyvo.7jDOxbQ//cdvlpMqa',223117083,'L',2025,0,NULL),
(3,1,'Ayano','$2y$12$BIZG.7Y8ACKgWlL8iCmBiO7D5hi8cVjzyvo.7jDOxbQ//cdvlpMqa',223117084,'P',2025,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
