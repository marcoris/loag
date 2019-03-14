CREATE TABLE IF NOT EXISTS `train` (
  `train_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `train_nr` varchar(10) NOT NULL DEFAULT '',
  `locomotive` varchar(10) NOT NULL DEFAULT '',
  `waggons` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`train_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;