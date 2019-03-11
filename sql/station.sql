CREATE TABLE IF NOT EXISTS `station` (
  `station_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(45) DEFAULT NULL,
  `station_time` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `station_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`station_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `station` WRITE;

INSERT IGNORE INTO `station` (`station_id`, `station_name`, `station_time`, `sequence`, `station_status`)
VALUES
	(1,'Station1.1',1,1,1),
	(2,'Station1.2',2,2,0),
	(3,'Station1.3',1,3,0),
	(4,'Station1.4',2,4,0),
	(5,'Station1.5',3,5,2),
	(6,'Station1.6',2,6,0),
	(7,'Station1.7',1,7,0),
	(8,'Station1.8',2,8,0),
	(9,'Station1.9',2,9,1),
	(10,'Station2.1',1,1,1),
	(11,'Station2.2',2,2,0),
	(12,'Station2.3',1,3,0),
	(13,'Station2.4',2,4,0),
	(14,'Station2.5',1,5,2),
	(15,'Station2.6',2,6,0),
	(16,'Station2.7',3,7,0),
	(17,'Station2.8',2,8,0),
	(18,'Station2.9',1,9,1),
	(19,'Station3.1',1,1,1),
	(20,'Station3.2',1,2,0),
	(21,'Station3.3',2,3,0),
	(22,'Station3.4',3,4,0),
	(23,'Station3.5',2,5,2),
	(24,'Station3.6',3,6,0),
	(25,'Station3.7',2,7,0),
	(26,'Station3.8',3,8,0),
	(27,'Station3.9',2,9,1),
	(28,'Station4.1',1,1,1),
	(29,'Station4.2',2,2,0),
	(30,'Station4.3',1,3,0),
	(31,'Station4.4',2,4,0),
	(32,'Station4.5',3,5,0),
	(33,'Station4.6',2,6,0),
	(34,'Station4.7',2,7,0),
	(35,'Station4.8',3,8,2);

UNLOCK TABLES;