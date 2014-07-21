# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: dfck_mis
# Generation Time: 2014-07-21 08:18:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dfck_function
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dfck_function`;

CREATE TABLE `dfck_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(50) DEFAULT NULL,
  `moduleurl` varchar(50) DEFAULT NULL,
  `modulelang` varchar(50) DEFAULT NULL,
  `modulecode` varchar(50) DEFAULT NULL,
  `moduleparent` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) DEFAULT '0',
  `moduleorder` int(11) DEFAULT NULL,
  `moduleicon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modulecode` (`modulecode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dfck_function` WRITE;
/*!40000 ALTER TABLE `dfck_function` DISABLE KEYS */;

INSERT INTO `dfck_function` (`id`, `modulename`, `moduleurl`, `modulelang`, `modulecode`, `moduleparent`, `updated_at`, `created_at`, `deleted`, `moduleorder`, `moduleicon`)
VALUES
	(1,'Phòng Khám','','pas.phongkham','pas2',0,'2014-07-18 15:19:18','2014-07-17 14:37:44',0,1,'fa fa-lg fa-fw fa-user-md'),
	(9,'Cận Lâm Sàn','','ris.cls','riscls',0,'2014-07-18 15:19:18','2014-07-17 15:01:05',0,2,'fa fa-lg fa-fw fa-codepen'),
	(12,'Tiếp nhận','pas/tiep-nhan','pas.admit','pasadmit',1,'2014-07-18 15:19:18','2014-07-17 15:03:36',0,0,NULL),
	(13,'Khám bệnh','pas/kham-benh','pas.kb','paskb',1,'2014-07-18 15:19:18','2014-07-17 15:05:01',0,1,''),
	(15,'Đăng ký mới','pas/person','pas.dk','pasdk',0,'2014-07-21 15:15:54','2014-07-17 15:10:58',0,0,'fa fa-lg fa-lw fa-barcode');

/*!40000 ALTER TABLE `dfck_function` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
