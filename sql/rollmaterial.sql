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
	(4,2,2,'W002C2','01.01.2019','01.01.2019','01.01.2020',1,100),
	(5,1,0,'L002','14.03.2019','14.03.2019','14.03.2020',1,0),
	(6,2,1,'W002C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(7,2,1,'W003C1','14.03.2019','14.03.2019','14.03.2020',1,80),
	(8,2,2,'W003C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(9,2,2,'W004C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(10,2,2,'W005C2','14.03.2019','14.03.2019','14.03.2020',1,100),
	(11,2,2,'W006C2','14.03.2019','14.03.2019','14.03.2020',1,100);

/*!40000 ALTER TABLE `rollmaterial` ENABLE KEYS */;
UNLOCK TABLES;