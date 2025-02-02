# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-18 09:54:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle rollmaterial
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rollmaterial`;

CREATE TABLE `rollmaterial` (
  `rollmaterial_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `number` varchar(45) NOT NULL,
  `date_of_commissioning` varchar(45) NOT NULL,
  `date_of_last_revision` varchar(45) NOT NULL,
  `date_of_next_revision` varchar(45) NOT NULL,
  `availability` tinyint(4) NOT NULL,
  `seating` int(11) NOT NULL,
  PRIMARY KEY (`rollmaterial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `rollmaterial` WRITE;
/*!40000 ALTER TABLE `rollmaterial` DISABLE KEYS */;

INSERT INTO `rollmaterial` (`rollmaterial_id`, `type`, `class`, `number`, `date_of_commissioning`, `date_of_last_revision`, `date_of_next_revision`, `availability`, `seating`)
VALUES
	(1,1,0,'L001','01.01.2019','01.01.2019','01.01.2020',1,0),
	(2,2,1,'W001C1','01.01.2019','01.01.2019','01.01.2020',1,80),
	(3,2,2,'W002C2','01.01.2019','01.01.2019','01.01.2020',1,100),
	(4,2,2,'W003C2','01.01.2019','01.01.2019','01.01.2020',1,100),
	(5,1,0,'L002','14.03.2019','14.03.2019','14.03.2020',1,0),
	(6,2,1,'W004C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(7,2,1,'W005C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(8,2,2,'W006C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(9,2,2,'W007C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(10,2,2,'W008C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(11,2,2,'W009C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(12,2,2,'W010C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(13,1,0,'L003','14.03.2019','14.03.2019','14.03.2020',1,0),
	(14,1,0,'L004','14.03.2019','14.03.2019','14.03.2020',1,0),
	(15,2,1,'W011C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(16,2,1,'W012C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(17,2,2,'W013C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(18,1,0,'L005','14.03.2019','14.03.2019','14.03.2020',1,0),
	(19,1,0,'L006','14.03.2019','14.03.2019','14.03.2020',1,0),
	(20,1,0,'L007','14.03.2019','14.03.2019','14.03.2020',1,0),
	(21,1,0,'L008','14.03.2019','14.03.2019','14.03.2020',1,0),
	(22,1,0,'L009','14.03.2019','14.03.2019','14.03.2020',1,0),
	(23,1,0,'L010','14.03.2019','14.03.2019','14.03.2020',1,0),
	(24,2,2,'W014C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(25,2,2,'W015C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(26,2,2,'W016C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(27,2,2,'W017C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(28,2,2,'W018C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(29,2,2,'W019C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(30,2,2,'W020C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(31,2,1,'W021C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(32,2,1,'W022C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(33,2,1,'W023C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(34,2,1,'W024C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(35,2,1,'W025C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(36,2,2,'W026C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(37,2,2,'W027C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(38,2,2,'W028C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(39,2,2,'W029C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(40,2,2,'W030C2','14.03.2019','14.03.2019','14.03.2020',1,100);

/*!40000 ALTER TABLE `rollmaterial` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
