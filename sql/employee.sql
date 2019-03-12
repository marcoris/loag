CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `absence` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `personalnumber` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employee` WRITE;

INSERT IGNORE INTO `employee` (`employee_id`, `category`, `absence`, `role`, `personalnumber`, `firstname`, `lastname`, `login`, `password`)
VALUES
	(1,3,1,1,'123','Marco','Ris','Marco','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9'),
	(2,3,1,2,'456','Dispo','Nent','Disponent','29845a36cf4c90f57523bc67c6a3ce188fa33afa018e4f4da1db4b131615683c'),
	(3,NULL,1,3,'11','Jim','Knopf','Jim','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9');

UNLOCK TABLES;