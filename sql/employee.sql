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
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`employee_id`, `category`, `absence`, `role`, `status`, `personalnumber`, `firstname`, `lastname`, `login`, `password`)
VALUES
	(1,3,1,1,NULL,'123','Marco','Ris','Marco','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9'),
	(2,3,1,2,NULL,'456','Dispo','Nent','Disponent','bd4927f4322d08b182d410f22cee90598a47e955f2bc006c44d13e40ae4ac7e4'),
	(3,2,1,3,NULL,'11','Jim','Knopf','Jim','599fc64fff9cddeab77e2678f22b8e2199c41f2dff6f7ae5d33fb3f6be5a8ad9'),
	(4,1,1,3,NULL,'12','Lukas','Lok','Lukas','cf216900425dcf074880747f7a045a98b837052a4b95f38ffff916c172426a31'),
	(5,1,1,3,NULL,'13','Hans','Hannes','Hans','9e1080faa8c65c8d390697c47d8107a0bb677f38643c8496ac9e9a771ffaf7f1'),
	(6,2,1,3,NULL,'15','Ruedi','RÃ¼diger','Ruedi','7a90d8640e83cfa1990fd3c7b44c5b2c2ab2cf46f9e5dbd8973ac7bdf3be2c51'),
	(7,1,1,3,NULL,'321','Big','Boss','Big','1982c9b7ce201a107752ba24f69cc8741f2cd4799fefe07b7fb7396736a01e3d'),
	(8,2,1,3,NULL,'112233','Little','Boss','Little','1a004eb989b06d0ccaf05abeb64c076f044dd5633d01ac1bcdc238b2323ff335');

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
