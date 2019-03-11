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

INSERT IGNORE INTO `rollmaterial` (`rollmaterial_id`, `type`, `class`, `number`, `date_of_commissioning`, `date_of_last_revision`, `date_of_next_revision`, `availability`, `seating`)
VALUES
	(1,1,0,'L001','01.01.2019','01.01.2019','01.01.2020',1,0),
	(2,2,1,'W001C1','01.01.2019','01.01.2019','01.01.2020',1,80),
	(3,2,2,'W001C2','01.01.2019','01.01.2019','01.01.2020',1,100),
	(4,2,2,'W002C2','01.01.2019','01.01.2019','01.01.2020',0,100);

UNLOCK TABLES;