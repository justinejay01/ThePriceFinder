/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - pricefinder
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pricefinder` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pricefinder`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=utf8mb4;

/*Data for the table `accounts` */

insert  into `accounts`(`uid`,`username`,`password`) values 
(10001,'admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` char(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`price`,`is_available`) values 
('8850007011149','Johnson\'s Baby Powder Original 200g',50.5,1),
('48033459','Johnson\'s Baby Powder Original 50g',20,0),
('9300830022557','Axe Black 135mL',200,1),
('4801288820504','Happy Absorbent Cotton 40g',10,1);

/*Table structure for table `search` */

DROP TABLE IF EXISTS `search`;

CREATE TABLE `search` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `search` */

insert  into `search`(`name`) values 
('jj'),
('1'),
('2'),
('2'),
('2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
