drop database if exists barkthedog;

create database barkthedog;

USE barkthedog;

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `race` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


INSERT INTO `barkthedog`.`dogs`(`name`,`race`) VALUES ('Droopy','Dog Doe Race');
INSERT INTO `barkthedog`.`dogs`(`name`,`race`) VALUES ('Knoopy','Dog Doe Race');
INSERT INTO `barkthedog`.`dogs`(`name`,`race`) VALUES ('Floopy','Dog Doe Race');
INSERT INTO `barkthedog`.`dogs`(`name`,`race`) VALUES ('Snoopy','Dog Doe Race');


select * from dogs;