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
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`uid`,`Fname`,`Lname`,`email`,`contact_no`,`address1`,`address2`,`city`,`state`,`pin`,`password`) values (1,'Sami','Syed','ka.boom.tm@gmail.com','8692880768','Lok Sarita E-711/712,','Marol Miltery Road,Andheri(EAST)','Mumbai','Maharashtra','400059','532fd2e909d40e440ac2cb243bd79aa1'),(2,'Sunny','Jain','sunny@gmail.com','1111111111','Sterling Court,201','MIDC,Kondivita','Mumbai','Maharashtra','400059','532fd2e909d40e440ac2cb243bd79aa1');

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `invoice_no` int(2) NOT NULL AUTO_INCREMENT,
  `uid` int(3) DEFAULT NULL,
  `delivery_methode` varchar(50) DEFAULT NULL,
  `payment methode` varchar(50) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `mrp` int(3) DEFAULT NULL,
  `sellingprice` int(3) DEFAULT NULL,
  PRIMARY KEY (`invoice_no`),
  KEY `invoice_no` (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoice` */

/*Table structure for table `invoiceitems` */

DROP TABLE IF EXISTS `invoiceitems`;

CREATE TABLE `invoiceitems` (
  `invoice_no` int(3) DEFAULT NULL,
  `product_id` int(3) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  KEY `invoice_no` (`invoice_no`),
  CONSTRAINT `invoice_no` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoiceitems` */

/*Table structure for table `orderitems` */

DROP TABLE IF EXISTS `orderitems`;

CREATE TABLE `orderitems` (
  `orderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orderitems` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderID` int(3) NOT NULL,
  `uid` int(3) NOT NULL,
  `total_mrp` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `uid` (`uid`),
  CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `customers` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `categoryid` int(10) NOT NULL,
  `sub_categoryid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productdesc` varchar(5000) NOT NULL,
  `productimg` varchar(10) NOT NULL,
  `prodmaterial` varchar(100) NOT NULL,
  `mrp` int(5) NOT NULL,
  `cost` int(5) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`productid`),
  KEY `catID` (`categoryid`),
  KEY `subcatID` (`sub_categoryid`),
  CONSTRAINT `catID` FOREIGN KEY (`categoryid`) REFERENCES `category` (`ID`),
  CONSTRAINT `subcatID` FOREIGN KEY (`sub_categoryid`) REFERENCES `sub_categories` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`categoryid`,`sub_categoryid`,`productid`,`productname`,`productdesc`,`productimg`,`prodmaterial`,`mrp`,`cost`,`tags`) values (1,1,1,'Presley Sofa (Boucle Brown)','<p><b>King Comfort.An elementory design gets a modern upgrage in chik presley sofa.</b><br><b>The sofa is sleef Contemporary and gives your living room a clean light room. ','1_1_1.jpg','Fabric',11000,10599,'sofa,white,living room'),(1,1,2,'Bau Modular Sofa (Cornsilk Yellow) ','<b>Just push play. The uber flexible Bau modular sofa can be moved around and configured at will</b>','1_1_2.jpg','Synthetic Leather',20999,16999,'sofa,living room,yellow'),(1,1,3,'Glentana Sofa in Provincial','<p><b>Contemporary Furniture reflects designs that are current or en vogue.<br> It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.','1_1_3.jpg','Sheesham Wood ',21999,15999,'sofa,teak,living room,wood'),(1,1,4,'Venice Sofa in Blue Colour','<p><b>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br> These designs represent the ideals of cutting excess, practicality and an absence of decoration. </b>','1_1_4.jpg','Polyester',71999,60999,'sofa,polyester,blue'),(1,1,5,'Winston Solid Wood Sofa','<p>Note: Assembly will be done in 48 hours of product delivery.</p><p>Seasoned and treated rubber wood frame</p><p>12 mm thick ply wood seat base</p><br><p>Removable fabric seat and back cushion covers</p><br><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</p><br><p>The forms of furniture are visually light (like in the use of polished metal and engineered wood) and follow minimalist principles of design which are influenced by architectural concepts like the cantilever. Modern furniture fits best in open floor plans with clean lines that thrive in the absence of clutter.</p>','1_1_5.jpg','Rubber Wood',55199,43999,'sofa,wood,rubber finish'),(1,1,6,'Alto Leatherette Sofa in Black Colour','<p><b>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br> These designs represent the ideals of cutting excess, practicality and an absence of decoration. </b>','1_1_6.jpg','Letherette',65000,12000,'sofa,lether'),(1,1,7,'Florida Black Color Sofa','<p><b>Contemporary Furniture reflects designs that are current or en vogue.<br> It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.','1_1_7.jpg','Fabric and Polyester',75000,65999,'fabric,leather,sofa,black'),(1,2,8,'Auburm Chair in Honey Oak Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_1.jpg','Oak Wood',7000,4599,'Oak,chair,brown,living room'),(1,2,9,'Montgomery Chair in Passion Mahogany Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_2.jpg','Teak Wood',6999,5599,'Teak,Chair,dark'),(1,2,10,'Maud Arm Chair in Natural Sheesham Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_3.jpg','Natural Sheesham',8999,6899,'chair,sheesham,brown');

/*Table structure for table `productstock` */

DROP TABLE IF EXISTS `productstock`;

CREATE TABLE `productstock` (
  `productid` int(3) NOT NULL,
  `availablestock` int(3) DEFAULT '0',
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productstock` */

insert  into `productstock`(`productid`,`availablestock`) values (1,0),(2,3),(3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0);

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
