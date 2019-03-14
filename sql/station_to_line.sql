CREATE TABLE IF NOT EXISTS `station_to_line` (
  `station_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `station_to_line` WRITE;

INSERT INTO `station_to_line` (`station_id`, `line_id`)
VALUES
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(5,2),
	(6,2),
	(7,2),
	(8,2),
	(9,2),
	(10,3),
	(11,3),
	(12,3),
	(13,3),
	(14,3),
	(15,3),
	(16,3),
	(17,3),
	(18,3),
	(19,4),
	(20,4),
	(21,4),
	(22,4),
	(23,4),
	(24,4),
	(25,4),
	(26,4),
	(27,4),
	(28,5),
	(29,5),
	(30,5),
	(31,5),
	(32,5),
	(33,5),
	(34,5),
	(35,5);

UNLOCK TABLES;