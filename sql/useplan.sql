CREATE TABLE IF NOT EXISTS `useplan` (
  `useplan_id` int(11) NOT NULL AUTO_INCREMENT,
  `useplan_line_id` int(11) DEFAULT NULL,
  `useplan_train_id` int(11) DEFAULT NULL,
  `useplan_date` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`useplan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;