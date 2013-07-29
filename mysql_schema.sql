DROP TABLE IF EXISTS `todo`.`groups`;
CREATE TABLE  `todo`.`groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `todo`.`items`;
CREATE TABLE  `todo`.`items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;