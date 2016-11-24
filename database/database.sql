/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.16-MariaDB : Database - furniture_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`furniture_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `furniture_shop`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Category_Name` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`ID`,`Category_Name`) values (1,'Living Room'),(2,'Bedroom'),(3,'Dining Room'),(4,'Storage'),(5,'Kids'),(6,'Study'),(7,'Bar');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `uid` int(3) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`uid`,`Fname`,`Lname`,`email`,`contact_no`,`address1`,`address2`,`city`,`state`,`pin`,`password`) values (123,'fads','fsdf','123@ddd.com','sdf','fsadfasdf','sdfasdf','asdfasdf','sadfsdaf','sadfas','fsadf'),(432,'afdsf','dfasf','abc@xyz.com','asdfasd','fsdf','dsfdsf','asda','fdsafasd','fasdfa','asdfa'),(433,'asd','sdfasd','fsa','','','','','','',''),(434,'','','','','','','','','',''),(435,'qwre','rqwe','abc@xyz.comad','1111111111','sfdfa','agsdg','asdga','sgasdgas','111111','ASSa11111'),(436,'asd','asdd','ads@adasd.dsaa','1111111111','ads','dasddasdas','dasdasdsadasdsa','asdfasdf','111111','Ass11111'),(437,'asd','adsda','ads@adasd.dsasdas','1111111111','ad','ada','ads','adsd','111111','Ass11111'),(438,'Syed','Sami','ka.boom.tm@gmail.com','8692880768','Lok Sarita E-711/712,','Marol Miltery Road,Andheri(EAST)','Mumbai','Maharashtra','400059','Assasin712'),(439,'Syed','Sami','syedsami712@yahoo.co','8692880768','Lok Sarita E-711/712,','Marol Miltery Road,Andheri(EAST)','Mumbai','Maharashtra','400059','Assasin712'),(440,'dhapoi','ofuqhpqwuf','uuifa@hnai.dauhp','1111111111','lakhd','iuhaspia','pdapsusa','sahdau','111111','Ashli1h2hw;oh1'),(441,'sunny','jain','uusah@jahd.xjcj','1111111111','jxiahcihaiu','iuhcoiusciua','hicspsih','hcioauc','111111','Aaaaa1111'),(442,'asdfdasdsfs','adfdsaf','asdfadsf@adad.f','1111111111','asdadsadasasf','asfasfas','asfaf','safasf','400059','Aaaa1111'),(443,'fsadf','sdafsd','sadff@dad.sdad','1111111111','adssad','asdasd','adsadass','asdasdas','400059','Aaaaa1111');

/*Table structure for table `sub_categories` */

DROP TABLE IF EXISTS `sub_categories`;

CREATE TABLE `sub_categories` (
  `categoryID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `sub_category` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sub_categories` */

insert  into `sub_categories`(`categoryID`,`ID`,`sub_category`) values (1,1,'Sofa'),(1,2,'Chair'),(1,3,'Table'),(1,4,'Bean Bag'),(2,5,'Beds'),(2,6,'Wardrobe'),(2,7,'Decoration'),(2,8,'Bedroom Sets'),(3,9,'Dining Tables and Sets'),(3,10,'Dining Storage'),(3,11,'Chairs'),(3,12,'Dining Accesories'),(3,13,'Folding Dining Sets'),(4,14,'Wardrobe'),(4,15,'Bookshelfs'),(4,16,'Shoe Racks'),(4,17,'TV Units'),(4,18,'Dressers and Mirrors'),(5,19,'Bunk Beds'),(5,20,'Cradels'),(6,21,'Study Table'),(6,22,'Computer and Laptop Table'),(5,23,'Pin Boards'),(6,24,'Office Chairs'),(6,25,'Study Lamps'),(7,26,'Bar Furniture'),(7,27,'Glassware'),(7,28,'Iceware'),(7,29,'Bar Accesories');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
