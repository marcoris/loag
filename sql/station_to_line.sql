CREATE TABLE IF NOT EXISTS `station_to_line` (
  `station_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `station_to_line` WRITE;

INSERT IGNORE INTO `station_to_line` (`station_id`, `line_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,2),
	(11,2),
	(12,2),
	(13,2),
	(14,2),
	(15,2),
	(16,2),
	(17,2),
	(18,2),
	(19,3),
	(20,3),
	(21,3),
	(22,3),
	(23,3),
	(24,3),
	(25,3),
	(26,3),
	(27,3),
	(28,4),
	(29,4),
	(30,4),
	(31,4),
	(32,4),
	(33,4),
	(34,4),
	(35,4);

UNLOCK TABLES;