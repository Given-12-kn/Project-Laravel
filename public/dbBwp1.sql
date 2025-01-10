/*
SQLyog Community
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

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nrp_siswa` int(11) DEFAULT NULL,
  `chat` text DEFAULT NULL,
  `periode` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat` */

insert  into `chat`(`id`,`nrp_siswa`,`chat`,`periode`,`created_at`,`deleted_at`) values
(1,223117082,'asdsd',2024,'2024-12-19 21:42:33',NULL),
(2,223117082,'Yoshi Jelek',2024,'2024-12-19 21:43:05',NULL),
(3,223117082,'Koma',2024,'2024-12-19 21:43:10',NULL),
(4,223117082,'Miyabi',2024,'2024-12-19 21:55:38',NULL),
(5,223117082,'I Love Miyabi',2024,'2024-12-19 21:55:45',NULL),
(8,223117082,'Halo',2024,'2024-12-20 22:20:48',NULL),
(9,223117082,'Halo',2024,'2024-12-20 22:20:57',NULL),
(10,223117082,'Halo',2024,'2024-12-20 22:21:51',NULL),
(13,223117082,'Halo',2024,'2024-12-20 22:29:58',NULL),
(16,223117082,'Haloo',2024,'2024-12-21 10:30:54',NULL),
(17,223117082,'Istts Terbaik',2024,'2024-12-24 12:59:14',NULL),
(18,223117082,'Eggy Jelek',2024,'2024-12-24 19:15:44',NULL);

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_users` (`id_users`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `usersr` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dosen` */


/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) DEFAULT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_users` (`id_users`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `usersr` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

/*Table structure for table `usersr` */

DROP TABLE IF EXISTS `usersr`;

CREATE TABLE `usersr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usersr` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
