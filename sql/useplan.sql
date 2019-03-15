# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Datenbank: loag
# Erstellt am: 2019-03-15 10:37:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle useplan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `useplan`;

CREATE TABLE `useplan` (
  `useplan_id` int(11) NOT NULL AUTO_INCREMENT,
  `useplan_line_id` int(11) DEFAULT NULL,
  `useplan_train_nr` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `useplan_date` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`useplan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `useplan` WRITE;
/*!40000 ALTER TABLE `useplan` DISABLE KEYS */;

INSERT INTO `useplan` (`useplan_id`, `useplan_line_id`, `useplan_train_nr`, `useplan_date`)
VALUES
	(1,2,X'333139443944',X'333139'),
	(2,5,X'343139443638',X'343139'),
	(3,3,X'353139363331',X'353139'),
	(4,2,X'363139343337',X'363139'),
	(5,3,X'373139343445',X'373139'),
	(6,4,X'383139303738',X'383139'),
	(7,5,X'333139344437',X'333139'),
	(8,2,X'343139463031',X'343139'),
	(9,5,X'353139303141',X'353139'),
	(10,5,X'363139443846',X'363139'),
	(11,2,X'373139434239',X'373139'),
	(12,3,X'383139423346',X'383139');

/*!40000 ALTER TABLE `useplan` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
