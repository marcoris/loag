# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-11 14:03:57 +0000
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

-- DROP TABLE IF EXISTS `rollmaterial`;

CREATE TABLE IF NOT EXISTS `rollmaterial` (
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
	(3,2,2,'W001C2','01.01.2019','01.01.2019','01.01.2020',1,100),
	(4,2,2,'W002C2','01.01.2019','01.01.2019','01.01.2020',0,100);

/*!40000 ALTER TABLE `rollmaterial` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
