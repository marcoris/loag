CREATE TABLE IF NOT EXISTS `line` (
  `line_id` int(11) NOT NULL AUTO_INCREMENT,
  `line_name` varchar(45) NOT NULL,
  PRIMARY KEY (`line_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `line` WRITE;

INSERT INTO `line` (`line_id`, `line_name`)
VALUES
	(1,'-'),
	(2,'Linie 1'),
	(3,'Linie 2'),
	(4,'Linie 3'),
	(5,'Linie 4');

UNLOCK TABLES;