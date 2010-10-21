/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.1.40-community : Database - FISHERY
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`FISHERY` /*!40100 DEFAULT CHARACTER SET cp1251 */;

USE `FISHERY`;

/*Table structure for table `address` */

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `area_low_id` int(11) DEFAULT NULL,
  `area_high_id` int(11) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id_idx` (`country_id`),
  KEY `area_low_id_idx` (`area_low_id`),
  KEY `area_high_id_idx` (`area_high_id`),
  KEY `locality_id_idx` (`locality_id`),
  CONSTRAINT `address_area_high_id_area_high_id` FOREIGN KEY (`area_high_id`) REFERENCES `area_high` (`id`),
  CONSTRAINT `address_area_low_id_area_low_id` FOREIGN KEY (`area_low_id`) REFERENCES `area_low` (`id`),
  CONSTRAINT `address_country_id_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `address_locality_id_locality_id` FOREIGN KEY (`locality_id`) REFERENCES `locality` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `address` */

/*Table structure for table `area_high` */

DROP TABLE IF EXISTS `area_high`;

CREATE TABLE `area_high` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `area_low_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `area_low_id_idx` (`area_low_id`),
  CONSTRAINT `area_high_area_low_id_area_low_id` FOREIGN KEY (`area_low_id`) REFERENCES `area_low` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `area_high` */

/*Table structure for table `area_low` */

DROP TABLE IF EXISTS `area_low`;

CREATE TABLE `area_low` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id_idx` (`country_id`),
  CONSTRAINT `area_low_country_id_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `area_low` */

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `toward` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `profit_id` int(11) DEFAULT NULL,
  `inbox_id` int(11) DEFAULT NULL,
  `talk_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `root_id` bigint(20) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_toward_idx` (`toward`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  KEY `comment_inbox_id_inbox_id` (`inbox_id`),
  KEY `comment_location_id_location_id` (`location_id`),
  KEY `comment_profit_id_profit_id` (`profit_id`),
  KEY `comment_talk_id_talk_id` (`talk_id`),
  CONSTRAINT `comment_created_by_profile_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`id`),
  CONSTRAINT `comment_inbox_id_inbox_id` FOREIGN KEY (`inbox_id`) REFERENCES `inbox` (`id`),
  CONSTRAINT `comment_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `comment_profit_id_profit_id` FOREIGN KEY (`profit_id`) REFERENCES `profit` (`id`),
  CONSTRAINT `comment_talk_id_talk_id` FOREIGN KEY (`talk_id`) REFERENCES `talk` (`id`),
  CONSTRAINT `comment_updated_by_profile_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `comment` */

insert  into `comment`(`id`,`parent`,`message`,`toward`,`location_id`,`profit_id`,`inbox_id`,`talk_id`,`created_by`,`updated_by`,`created_at`,`updated_at`,`root_id`,`lft`,`rgt`,`level`) values (1,NULL,'root','location',2,NULL,NULL,NULL,1,1,'2010-10-02 16:50:41','2010-10-02 16:50:42',1,1,8,0),(2,1,'wer','location',2,NULL,NULL,NULL,1,1,'2010-10-02 16:50:42','2010-10-02 16:50:42',1,2,5,1),(3,1,'sdf','location',2,NULL,NULL,NULL,1,1,'2010-10-02 16:50:44','2010-10-02 16:50:44',1,6,7,1),(4,2,'fdg','location',2,NULL,NULL,NULL,1,1,'2010-10-02 16:50:47','2010-10-02 16:50:47',1,3,4,2);

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `country` */

/*Table structure for table `fish` */

DROP TABLE IF EXISTS `fish`;

CREATE TABLE `fish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `fish` */

insert  into `fish`(`id`,`name`) values (1,'Карась'),(2,'Окунь'),(3,'Плотва'),(4,'Щука');

/*Table structure for table `friend` */

DROP TABLE IF EXISTS `friend`;

CREATE TABLE `friend` (
  `source_profile_id` int(11) NOT NULL DEFAULT '0',
  `related_profile_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`source_profile_id`,`related_profile_id`),
  KEY `friend_related_profile_id_profile_id` (`related_profile_id`),
  CONSTRAINT `friend_related_profile_id_profile_id` FOREIGN KEY (`related_profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `friend` */

/*Table structure for table `inbox` */

DROP TABLE IF EXISTS `inbox`;

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `inbox_created_by_profile_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`id`),
  CONSTRAINT `inbox_updated_by_profile_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inbox` */

/*Table structure for table `inboxed` */

DROP TABLE IF EXISTS `inboxed`;

CREATE TABLE `inboxed` (
  `inbox_id` int(11) NOT NULL DEFAULT '0',
  `profile_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inbox_id`,`profile_id`),
  KEY `inboxed_profile_id_profile_id` (`profile_id`),
  CONSTRAINT `inboxed_inbox_id_inbox_id` FOREIGN KEY (`inbox_id`) REFERENCES `inbox` (`id`),
  CONSTRAINT `inboxed_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inboxed` */

/*Table structure for table `locality` */

DROP TABLE IF EXISTS `locality`;

CREATE TABLE `locality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `area_high_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `area_high_id_idx` (`area_high_id`),
  CONSTRAINT `locality_area_high_id_area_high_id` FOREIGN KEY (`area_high_id`) REFERENCES `area_high` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `locality` */

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `depth` float(18,2) DEFAULT NULL,
  `is_free` tinyint(1) DEFAULT '1',
  `price` text,
  `location_flow_id` int(11) DEFAULT NULL,
  `location_fundus_id` int(11) DEFAULT NULL,
  `location_relief_id` int(11) DEFAULT NULL,
  `location_type_id` int(11) DEFAULT NULL,
  `location_scope_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `latitude` double(18,2) DEFAULT NULL,
  `longitude` double(18,2) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `version` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_flow_id_idx` (`location_flow_id`),
  KEY `location_fundus_id_idx` (`location_fundus_id`),
  KEY `location_relief_id_idx` (`location_relief_id`),
  KEY `location_type_id_idx` (`location_type_id`),
  KEY `location_scope_id_idx` (`location_scope_id`),
  KEY `address_id_idx` (`address_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `location_address_id_address_id` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  CONSTRAINT `location_created_by_profile_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`id`),
  CONSTRAINT `location_location_flow_id_location_flow_id` FOREIGN KEY (`location_flow_id`) REFERENCES `location_flow` (`id`),
  CONSTRAINT `location_location_fundus_id_location_fundus_id` FOREIGN KEY (`location_fundus_id`) REFERENCES `location_fundus` (`id`),
  CONSTRAINT `location_location_relief_id_location_relief_id` FOREIGN KEY (`location_relief_id`) REFERENCES `location_relief` (`id`),
  CONSTRAINT `location_location_scope_id_location_scope_id` FOREIGN KEY (`location_scope_id`) REFERENCES `location_scope` (`id`),
  CONSTRAINT `location_location_type_id_location_type_id` FOREIGN KEY (`location_type_id`) REFERENCES `location_type` (`id`),
  CONSTRAINT `location_updated_by_profile_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `location` */

insert  into `location`(`id`,`name`,`description`,`depth`,`is_free`,`price`,`location_flow_id`,`location_fundus_id`,`location_relief_id`,`location_type_id`,`location_scope_id`,`address_id`,`created_by`,`updated_by`,`latitude`,`longitude`,`slug`,`created_at`,`updated_at`,`version`) values (1,'agrtwgare','dfgwegr',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.06,35.60,'agrtwgare','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(2,'zxczxc23tgwe','r32fwergt',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.52,35.60,'zxczxc23tgwe','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(3,'fsdgfthyj2er3t4g','5qdwfegrhtyjtrqwfegrh',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.32,36.16,'fsdgfthyj2er3t4g','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(4,'yahooo','1111111111111111',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.70,36.95,'yahooo','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(5,'gdfdfgdfg','dfhestnrnsfgn',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.90,35.95,'gdfdfgdfg','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(6,'drgsdfh','srghsdthj',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.18,37.40,'drgsdfh','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(7,'asdftyui','wertwertgaerh',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.60,38.48,'asdftyui','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(8,'etujtdy','ertertery',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.34,36.37,'etujtdy','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(9,'Пляж на угре','Красивое место',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(10,'23432','wrefrw4tegrbfdqwtegrdtg',423423424.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'23432','2010-04-02 20:01:54','2010-04-02 20:01:54',1),(11,'adddddddddddddddd2','efdsvfdbdgbdgndgn',2.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'adddddddddddddddd2','2010-04-02 20:02:34','2010-04-02 20:02:34',1),(12,'fffff','zzzzzzzzzzzzz',33.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'fffff','2010-04-02 20:11:02','2010-04-02 20:11:02',1),(13,'sdfsdfsd','efrgrgreg',24.00,1,NULL,1,1,1,NULL,NULL,NULL,1,1,54.83,35.03,'sdfsdfsd','2010-04-02 20:23:44','2010-04-02 20:23:44',1);

/*Table structure for table `location_flow` */

DROP TABLE IF EXISTS `location_flow`;

CREATE TABLE `location_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `location_flow` */

insert  into `location_flow`(`id`,`name`) values (1,'Отсутсвует'),(2,'Медленное'),(3,'Среднее'),(4,'Быстрое');

/*Table structure for table `location_fundus` */

DROP TABLE IF EXISTS `location_fundus`;

CREATE TABLE `location_fundus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `location_fundus` */

insert  into `location_fundus`(`id`,`name`) values (1,'Галька'),(2,'Песок'),(3,'Глина'),(4,'Ил');

/*Table structure for table `location_relief` */

DROP TABLE IF EXISTS `location_relief`;

CREATE TABLE `location_relief` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `location_relief` */

insert  into `location_relief`(`id`,`name`) values (1,'Отмель'),(2,'Яма'),(3,'Перекаты');

/*Table structure for table `location_scope` */

DROP TABLE IF EXISTS `location_scope`;

CREATE TABLE `location_scope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `location_scope` */

insert  into `location_scope`(`id`,`name`) values (1,'Все'),(2,'Друзья'),(3,'Только я');

/*Table structure for table `location_type` */

DROP TABLE IF EXISTS `location_type`;

CREATE TABLE `location_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `location_type` */

insert  into `location_type`(`id`,`name`) values (1,'Пруд');

/*Table structure for table `location_version` */

DROP TABLE IF EXISTS `location_version`;

CREATE TABLE `location_version` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `depth` float(18,2) DEFAULT NULL,
  `is_free` tinyint(1) DEFAULT '1',
  `price` text,
  `location_flow_id` int(11) DEFAULT NULL,
  `location_fundus_id` int(11) DEFAULT NULL,
  `location_relief_id` int(11) DEFAULT NULL,
  `location_type_id` int(11) DEFAULT NULL,
  `location_scope_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `latitude` double(18,2) DEFAULT NULL,
  `longitude` double(18,2) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `version` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`version`),
  CONSTRAINT `location_version_id_location_id` FOREIGN KEY (`id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `location_version` */

insert  into `location_version`(`id`,`name`,`description`,`depth`,`is_free`,`price`,`location_flow_id`,`location_fundus_id`,`location_relief_id`,`location_type_id`,`location_scope_id`,`address_id`,`created_by`,`updated_by`,`latitude`,`longitude`,`slug`,`created_at`,`updated_at`,`version`) values (1,'agrtwgare','dfgwegr',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.06,35.60,'agrtwgare','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(2,'zxczxc23tgwe','r32fwergt',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.52,35.60,'zxczxc23tgwe','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(3,'fsdgfthyj2er3t4g','5qdwfegrhtyjtrqwfegrh',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.32,36.16,'fsdgfthyj2er3t4g','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(4,'yahooo','1111111111111111',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.70,36.95,'yahooo','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(5,'gdfdfgdfg','dfhestnrnsfgn',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.90,35.95,'gdfdfgdfg','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(6,'drgsdfh','srghsdthj',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.18,37.40,'drgsdfh','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(7,'asdftyui','wertwertgaerh',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.60,38.48,'asdftyui','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(8,'etujtdy','ertertery',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,55.34,36.37,'etujtdy','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(9,'Пляж на угре','Красивое место',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'','2010-04-01 14:16:53','2010-04-01 14:16:53',1),(10,'23432','wrefrw4tegrbfdqwtegrdtg',423423424.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'23432','2010-04-02 20:01:54','2010-04-02 20:01:54',1),(11,'adddddddddddddddd2','efdsvfdbdgbdgndgn',2.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'adddddddddddddddd2','2010-04-02 20:02:34','2010-04-02 20:02:34',1),(12,'fffff','zzzzzzzzzzzzz',33.00,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,54.83,35.03,'fffff','2010-04-02 20:11:02','2010-04-02 20:11:02',1),(13,'sdfsdfsd','efrgrgreg',24.00,1,NULL,1,1,1,NULL,NULL,NULL,1,1,54.83,35.03,'sdfsdfsd','2010-04-02 20:23:44','2010-04-02 20:23:44',1);

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `userpic` varchar(255) DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `profile_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `profile` */

insert  into `profile`(`id`,`nick_name`,`first_name`,`last_name`,`birth_date`,`userpic`,`sex`,`user_id`,`created_at`,`updated_at`) values (1,'lim','lim','lim',NULL,NULL,1,1,'2010-10-02 16:40:16','2010-10-02 16:40:16');

/*Table structure for table `profile_fish` */

DROP TABLE IF EXISTS `profile_fish`;

CREATE TABLE `profile_fish` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fish_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fish_id_idx` (`fish_id`),
  KEY `profile_id_idx` (`profile_id`),
  CONSTRAINT `profile_fish_fish_id_fish_id` FOREIGN KEY (`fish_id`) REFERENCES `fish` (`id`),
  CONSTRAINT `profile_fish_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profile_fish` */

/*Table structure for table `profile_style` */

DROP TABLE IF EXISTS `profile_style`;

CREATE TABLE `profile_style` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `style_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `style_id_idx` (`style_id`),
  KEY `profile_id_idx` (`profile_id`),
  CONSTRAINT `profile_style_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `profile_style_style_id_style_id` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profile_style` */

/*Table structure for table `profit` */

DROP TABLE IF EXISTS `profit`;

CREATE TABLE `profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `begin` datetime NOT NULL,
  `cordage` text NOT NULL,
  `description` text NOT NULL,
  `fish_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id_idx` (`location_id`),
  KEY `fish_id_idx` (`fish_id`),
  KEY `style_id_idx` (`style_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `profit_created_by_profile_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`id`),
  CONSTRAINT `profit_fish_id_fish_id` FOREIGN KEY (`fish_id`) REFERENCES `fish` (`id`),
  CONSTRAINT `profit_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `profit_style_id_style_id` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`),
  CONSTRAINT `profit_updated_by_profile_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profit` */

/*Table structure for table `profit_detail` */

DROP TABLE IF EXISTS `profit_detail`;

CREATE TABLE `profit_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `profit_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `fish_id` int(11) DEFAULT NULL,
  `qty` float(18,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_fish_style_per_profit_idx` (`profit_id`,`style_id`,`fish_id`),
  KEY `profit_id_idx` (`profit_id`),
  KEY `style_id_idx` (`style_id`),
  KEY `fish_id_idx` (`fish_id`),
  CONSTRAINT `profit_detail_fish_id_fish_id` FOREIGN KEY (`fish_id`) REFERENCES `fish` (`id`),
  CONSTRAINT `profit_detail_profit_id_profit_id` FOREIGN KEY (`profit_id`) REFERENCES `profit` (`id`),
  CONSTRAINT `profit_detail_style_id_style_id` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profit_detail` */

/*Table structure for table `read_comment` */

DROP TABLE IF EXISTS `read_comment`;

CREATE TABLE `read_comment` (
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `comment_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profile_id`,`comment_id`),
  KEY `read_comment_comment_id_comment_id` (`comment_id`),
  CONSTRAINT `read_comment_comment_id_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  CONSTRAINT `read_comment_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `read_comment` */

/*Table structure for table `sf_guard_group` */

DROP TABLE IF EXISTS `sf_guard_group`;

CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_group` */

insert  into `sf_guard_group`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'admin','Administrator group','2010-10-02 16:40:16','2010-10-02 16:40:16');

/*Table structure for table `sf_guard_group_permission` */

DROP TABLE IF EXISTS `sf_guard_group_permission`;

CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_group_permission` */

insert  into `sf_guard_group_permission`(`group_id`,`permission_id`,`created_at`,`updated_at`) values (1,1,'2010-10-02 16:40:17','2010-10-02 16:40:17');

/*Table structure for table `sf_guard_permission` */

DROP TABLE IF EXISTS `sf_guard_permission`;

CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_permission` */

insert  into `sf_guard_permission`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'admin','Administrator permission','2010-10-02 16:40:16','2010-10-02 16:40:16');

/*Table structure for table `sf_guard_remember_key` */

DROP TABLE IF EXISTS `sf_guard_remember_key`;

CREATE TABLE `sf_guard_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_remember_key` */

insert  into `sf_guard_remember_key`(`id`,`user_id`,`remember_key`,`ip_address`,`created_at`,`updated_at`) values (4,1,'c2fa8108f7500b87c60c53d52fd4bedb','127.0.0.1','2010-10-13 23:20:06','2010-10-13 23:20:06');

/*Table structure for table `sf_guard_user` */

DROP TABLE IF EXISTS `sf_guard_user`;

CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_user` */

insert  into `sf_guard_user`(`id`,`username`,`algorithm`,`salt`,`password`,`is_active`,`is_super_admin`,`last_login`,`created_at`,`updated_at`) values (1,'admin','PasswordKeeper::generate','236b714fabd69d6ea8b97dd4f22de12e','236b714fabd69d6ea8b97dd4f22de12eadmin',1,1,'2010-10-13 23:20:06','2010-10-02 16:40:16','2010-10-13 23:20:06');

/*Table structure for table `sf_guard_user_group` */

DROP TABLE IF EXISTS `sf_guard_user_group`;

CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_user_group` */

insert  into `sf_guard_user_group`(`user_id`,`group_id`,`created_at`,`updated_at`) values (1,1,'2010-10-02 16:40:17','2010-10-02 16:40:17');

/*Table structure for table `sf_guard_user_permission` */

DROP TABLE IF EXISTS `sf_guard_user_permission`;

CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `sf_guard_user_permission` */

/*Table structure for table `style` */

DROP TABLE IF EXISTS `style`;

CREATE TABLE `style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `style` */

insert  into `style`(`id`,`name`) values (3,'Спининг'),(1,'Троллинг'),(2,'Фидер');

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `is_triple` tinyint(1) DEFAULT NULL,
  `triple_namespace` varchar(100) DEFAULT NULL,
  `triple_key` varchar(100) DEFAULT NULL,
  `triple_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_idx` (`name`),
  KEY `triple1_idx` (`triple_namespace`),
  KEY `triple2_idx` (`triple_key`),
  KEY `triple3_idx` (`triple_value`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=cp1251;

/*Data for the table `tag` */

insert  into `tag`(`id`,`name`,`is_triple`,`triple_namespace`,`triple_key`,`triple_value`) values (1,'qwe',0,NULL,NULL,NULL),(2,'asd',0,NULL,NULL,NULL),(3,'zxc',0,NULL,NULL,NULL),(4,'1111',0,NULL,NULL,NULL),(5,'2222',0,NULL,NULL,NULL),(6,'qqqqwe',0,NULL,NULL,NULL),(7,'aaasd',0,NULL,NULL,NULL),(8,'zxcxc',0,NULL,NULL,NULL),(9,'22222',0,NULL,NULL,NULL),(10,'qqqqq',0,NULL,NULL,NULL),(11,'aaaaa',0,NULL,NULL,NULL),(12,'zzzzz',0,NULL,NULL,NULL);

/*Table structure for table `tagging` */

DROP TABLE IF EXISTS `tagging`;

CREATE TABLE `tagging` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) NOT NULL,
  `taggable_model` varchar(30) DEFAULT NULL,
  `taggable_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_idx` (`tag_id`),
  KEY `taggable_idx` (`taggable_model`,`taggable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=cp1251;

/*Data for the table `tagging` */

insert  into `tagging`(`id`,`tag_id`,`taggable_model`,`taggable_id`) values (1,1,'Talk',186),(2,2,'Talk',186),(3,3,'Talk',186),(4,4,'Talk',186),(5,5,'Talk',186),(6,6,'Talk',186),(7,7,'Talk',186),(8,8,'Talk',186),(9,6,'Talk',187),(10,2,'Talk',187),(11,4,'Talk',187),(12,9,'Talk',187),(13,10,'Talk',187),(14,11,'Talk',187),(15,12,'Talk',187);

/*Table structure for table `talk` */

DROP TABLE IF EXISTS `talk`;

CREATE TABLE `talk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `talk_section_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `talk_section_id_idx` (`talk_section_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `talk_created_by_profile_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`id`),
  CONSTRAINT `talk_talk_section_id_talk_section_id` FOREIGN KEY (`talk_section_id`) REFERENCES `talk_section` (`id`),
  CONSTRAINT `talk_updated_by_profile_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

/*Data for the table `talk` */

insert  into `talk`(`id`,`name`,`message`,`talk_section_id`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'цук','укеукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'5куе','кецукецукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'5ку4е','кецукецукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'5к5у4е','кецукецукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'5к5у4е','к5ецукецукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'5к5у4е','к5ецукецукеуке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'5к5у4е','к5ец5уке5цук5еу5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'5к354у4е','к5ец54уке5цу4к5еу5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'53к3544у4е','к5ец54у4ке55цу4к55еу5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'534к355544у4е','к5ец54у4ке55цу4к55еу5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'534к355544у4е','к5е5ц54у45ке55ц5у4к55еу5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'534к355544у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(126,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(131,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(133,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,'534к3555333344у4е','к5е5ц54у45ке55ц5у4к455е4у5ке',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(137,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(139,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(141,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(146,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(147,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,'1','23',3,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,'1','23',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,'1','23',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,'4','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,'5','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(158,'7','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,'8','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,'4','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(163,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(164,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(165,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(167,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(168,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,'31','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,'7','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,'7','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,'8','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,'9','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,'0','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,'1','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,'2','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,'3','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,'4','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(181,'5','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,'6','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(183,'7','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,'8','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(185,'9','243',4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(186,'qwe111','[0:15:39] endlessnamelessone: да хуйли ширка дело такое\r\n[0:15:57] endlessnamelessone: а чо еще маза писечка.джпг не открываеться\r\n[0:16:10] endlessnamelessone: это жопа.вирсы компьютер сломаешь\r\n[0:42:39] limitium: кто со мнйо дрочить на ночьбудет?',4,1,1,'2010-10-13 23:32:51','2010-10-13 23:32:51'),(187,'qweqweasdasd234234','[0:15:09] limitium: блять что ж ты за пидар\r\n[0:15:13] limitium: один тут хуже другого\r\n[0:15:16] limitium: тьфу блять\r\n[0:15:20] limitium: гнилой народ',4,1,1,'2010-10-13 23:41:59','2010-10-13 23:41:59');

/*Table structure for table `talk_section` */

DROP TABLE IF EXISTS `talk_section`;

CREATE TABLE `talk_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `talk_section` */

insert  into `talk_section`(`id`,`parent`,`name`,`lft`,`rgt`,`level`) values (1,NULL,'Снасти',1,8,0),(2,1,'Сети',2,5,1),(3,1,'Наживки',6,7,1),(4,2,'Путанки',3,4,2);

/*Table structure for table `vote` */

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `voter` int(11) DEFAULT NULL,
  `toward` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `profit_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vote_toward_idx` (`toward`),
  KEY `voter_idx` (`voter`),
  KEY `vote_comment_id_comment_id` (`comment_id`),
  KEY `vote_location_id_location_id` (`location_id`),
  KEY `vote_profile_id_profile_id` (`profile_id`),
  KEY `vote_profit_id_profit_id` (`profit_id`),
  CONSTRAINT `vote_comment_id_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  CONSTRAINT `vote_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `vote_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `vote_profit_id_profit_id` FOREIGN KEY (`profit_id`) REFERENCES `profit` (`id`),
  CONSTRAINT `vote_voter_profile_id` FOREIGN KEY (`voter`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vote` */

/*Table structure for table `wish_list` */

DROP TABLE IF EXISTS `wish_list`;

CREATE TABLE `wish_list` (
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profile_id`,`location_id`),
  KEY `wish_list_location_id_location_id` (`location_id`),
  CONSTRAINT `wish_list_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `wish_list_profile_id_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `wish_list` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;