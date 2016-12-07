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

/*Table structure for table `admincredentials` */

DROP TABLE IF EXISTS `admincredentials`;

CREATE TABLE `admincredentials` (
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admincredentials` */

insert  into `admincredentials`(`admin_name`,`admin_password`) values ('Sami','e64b78fc3bc91bcbc7dc232ba8ec59e0');

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

insert  into `customers`(`uid`,`Fname`,`Lname`,`email`,`contact_no`,`address1`,`address2`,`city`,`state`,`pin`,`password`) values (1,'Sami','Syed','ka.boom.tm@gmail.com','8692880768','Lok Sarita E-711,','Marol Miltery Road,Andheri(EAST)','Mumbai','Maharashtra','400059','532fd2e909d40e440ac2cb243bd79aa1'),(2,'Sunny','Jain','sunny@gmail.com','1111111111','Sterling Court,201','MIDC,Kondivita','Mumbai','Maharashtra','400059','532fd2e909d40e440ac2cb243bd79aa1');

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

/*Table structure for table `orderitems` */

DROP TABLE IF EXISTS `orderitems`;

CREATE TABLE `orderitems` (
  `orderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orderitems` */

insert  into `orderitems`(`orderID`,`productID`,`productname`,`quantity`) values (1,1,'Asdsadasd',22),(1,3,'fasfas',44);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderID` int(3) NOT NULL AUTO_INCREMENT,
  `uid` int(3) NOT NULL,
  `total_mrp` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `delivery_method` varchar(50) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `uid` (`uid`),
  CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `customers` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

insert  into `orders`(`orderID`,`uid`,`total_mrp`,`total_cost`,`payment_type`,`delivery_method`,`comments`) values (1,1,33333,121222,'cash on delivery','home delivery','ghar pe chod dena pls');

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

insert  into `products`(`categoryid`,`sub_categoryid`,`productid`,`productname`,`productdesc`,`productimg`,`prodmaterial`,`mrp`,`cost`,`tags`) values (1,1,1,'Presley Sofa (Boucle Brown)','<p><b>King Comfort.An elementory design gets a modern upgrage in chik presley sofa.</b><br><b>The sofa is sleef Contemporary and gives your living room a clean light room. ','1_1_1.jpg','Fabric',20999,56443,'sofa,white,living room'),(1,1,2,'Bau Modular Sofa (Cornsilk Yellow) ','<b>Just push play. The uber flexible Bau modular sofa can be moved around and configured at will</b>','1_1_2.jpg','Synthetic Leather',20999,56443,'sofa,living room,yellow'),(1,1,3,'Glentana Sofa in Provincial','<p><b>Contemporary Furniture reflects designs that are current or en vogue.<br> It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.','1_1_3.jpg','Sheesham Wood ',20999,56443,'sofa,teak,living room,wood'),(1,1,4,'Venice Sofa in Blue Colour','<p><b>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br> These designs represent the ideals of cutting excess, practicality and an absence of decoration. </b>','1_1_4.jpg','Polyester',71999,60999,'sofa,polyester,blue'),(1,1,5,'Winston Solid Wood Sofa','<p>Note: Assembly will be done in 48 hours of product delivery.</p><p>Seasoned and treated rubber wood frame</p><p>12 mm thick ply wood seat base</p><br><p>Removable fabric seat and back cushion covers</p><br><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</p><br><p>The forms of furniture are visually light (like in the use of polished metal and engineered wood) and follow minimalist principles of design which are influenced by architectural concepts like the cantilever. Modern furniture fits best in open floor plans with clean lines that thrive in the absence of clutter.</p>','1_1_5.jpg','Rubber Wood',55199,43999,'sofa,wood,rubber finish'),(1,1,6,'Alto Leatherette Sofa in Black Colour','<p><b>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br> These designs represent the ideals of cutting excess, practicality and an absence of decoration. </b>','1_1_6.jpg','Letherette',65000,12000,'sofa,lether'),(1,1,7,'Florida Black Color Sofa','<p><b>Contemporary Furniture reflects designs that are current or en vogue.<br> It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.','1_1_7.jpg','Fabric and Polyester',75000,65999,'fabric,leather,sofa,black'),(1,2,8,'Auburm Chair in Honey Oak Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_1.jpg','Oak Wood',7000,4599,'Oak,chair,brown,living room'),(1,2,9,'Montgomery Chair in Passion Mahogany Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_2.jpg','Teak Wood',6999,5599,'Teak,Chair,dark'),(1,2,10,'Maud Arm Chair in Natural Sheesham Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_3.jpg','Natural Sheesham',8999,6899,'chair,sheesham,brown'),(1,2,11,'Nidia Arm Chair in Cocoa and Pebble Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_4.jpg','Oak Wood',9999,7899,'chair,oak,white'),(1,2,12,'Sanford Arm Chair in Grey Colour','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_5.jpg','Teak Wood',6777,4333,'chair,grey,teak,wood'),(1,2,13,'William Arm Chair in Passion Mahogany Finish','<b><p>Colonial Style Furniture is graceful and refined, often characterized by the use of turnings, curved legs and motifs to present an elegant appearance. Colonial Style Furniture on Pepperfry sees Indian craftsmen interpreting European period styles (such as the Queen Anne and Georgian styles) in indigenous woods like Sheesham and Mango.</b><p>','1_2_6.jpg','Timber Wood',6333,3444,'chair,timber,wood,brown'),(1,2,14,'Chair in Blue Color','<b><p>Basic Chair to accompany you Sweet and Simple Taste','1_2_7.jpg','Plastic',1000,599,'chair,blue,plastic'),(1,2,15,'Palecio Arm Chair with Metal Frame in Black Colour','<b><p>Basic Chair to accompany you Sweet and Simple Taste','1_2_8.jpg','Plastic with Metal Frame',2999,1233,'plastic,frame,metal,chair,black'),(1,3,16,'Toston Console Table in Provincial Teak','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_1.jpg','Teak Wood',4599,3199,'table,wood,teak,brown'),(1,3,17,'Presque Console Table in Honey Oak Finish','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_2.jpg','Oak Wood',5999,1233,'table,oak,wood'),(1,3,18,'Dublin Console Table','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_3.jpg','Sheesham Wodd',13444,8999,'sheesham,table,wood,brown'),(1,3,19,'Pretine Wood Table','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_4.jpg','Teak Wood',12777,9999,'teak,wood,table,wood'),(1,3,20,'Palecio Table with Engraving','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_5.jpg','Timber',34444,26099,'timber,wood,table'),(1,3,21,'Weston Console Table in Provincial Teak Finish','<b><p>Contemporary Furniture reflects designs that are current or en vogue. It doesnt necessarily reference historical design styles and often provides a feeling of everything in its place.</b></p>','1_3_6.jpg','Teak',45555,31313,'teak,wood,table'),(1,4,22,'Bean Bag with Beans in Black Leatherette','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_1.jpg','Letherette',1000,599,'bean,bag,Letherette,black'),(1,4,23,'Bean Bag Without Beans in Yellow & Black Leatherette','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_2.jpg','Letherette',1299,799,'bean,bag,Letherette,black,yellow'),(1,4,24,'Bean Bag Without Beans in Black & White Leatherette','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_3.jpg','Letherette',1299,699,'bean,bag,Letherette,black'),(1,4,25,'Bean Bag Without Beans in Blue Leatherette','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_4.jpg','Letherette',1299,699,'bean,bag,Letherette,blue'),(1,4,26,'XXL Football Bean Bag Without Beans in Black & White Leatherette ','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_5.jpg','Letherette',1599,799,'bean,bag,Letherette,football'),(1,4,27,'XXL Printed Bean Bag in Black & Yellow Leatherette','<b><p>Presenting a classy and stylish leather bean bag to provide you comfort of sitting at any place you desire. This bean bag from Tjar is made from fine quality leather that makes this cover long lasting and durable. You can use it in your home, office, outdoors or terraces, anywhere you like. The sturdy design and contemporary looks make it an ideal accessory for your decor.</b></p>','1_4_6.jpg','Letherette',1699,699,'bean,bag,Letherette'),(2,5,28,'Crescent Queen-Size Bed with Box Storage in Dark Acasia Finish','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br>These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p?','2_5_1.jpg','Engineered Wood',13999,9999,'bed,wood'),(2,5,29,'King Size Double Bed ','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br>These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p?','2_5_2.jpg','Metal Frame',12999,8999,'bed,metal'),(2,5,30,'Hideki Goldline Queen Size Bed with Box Storage in Wenge Finish','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br>These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p?','2_5_3.jpg','Metal Frame',11999,6999,'bed,metal'),(2,5,31,'Raliegh Single Bed with Trundle in Provincial Teak Finish ','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br>These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p?','2_5_4.jpg','Teak Wood',17999,11999,'bed,teak,wood'),(2,5,32,'Amarillo King Size Bed in Provincial Teak Finish','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism.<br>These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p?','2_5_5.jpg','Teak Wood',45000,38999,'bed,teak,wood,king'),(2,6,33,'Takuma Four Door Wardrobe in Wenge Finish','<b><p>A wardrobe is a tall standing cupboard used for storing clothes. Wardrobes have hanging spaces with rods and hangers, sliding shelves and drawers to organize your clothes, accessories and other valuables.Every 5 minutes, an item of Furniture sells</b></p>','2_6_1.jpg','Engineered Wood',15999,9999,'wardrobe,teak'),(2,6,34,'Utsav Four Door Wardrobe With Mirror','<b><p>A wardrobe is a tall standing cupboard used for storing clothes. Wardrobes have hanging spaces with rods and hangers, sliding shelves and drawers to organize your clothes, accessories and other valuables.Every 5 minutes, an item of Furniture sells</b></p>','2_6_2.jpg','Engineered Wood',25000,21999,'wardrobe,mirror,teak'),(2,6,35,'Kosmo Imperial Three Door Wardrobe in Natural Wenge Colour','<b><p>A wardrobe is a tall standing cupboard used for storing clothes. Wardrobes have hanging spaces with rods and hangers, sliding shelves and drawers to organize your clothes, accessories and other valuables.Every 5 minutes, an item of Furniture sells</b></p>','2_6_3.jpg','Engineered Wood',17999,12999,'wardrobe,mirror,wood,door'),(2,6,36,'Waldron Wardrobe in Honey Oak Finish','<b><p>A wardrobe is a tall standing cupboard used for storing clothes. Wardrobes have hanging spaces with rods and hangers, sliding shelves and drawers to organize your clothes, accessories and other valuables.Every 5 minutes, an item of Furniture sells</b></p>','2_6_4.jpg','Oak Wood',18999,14999,'wardrobe,oak,wood'),(2,6,37,'Checkers Wardrobe in Walnut & Acacia Dark Matt Finish','<b><p>A wardrobe is a tall standing cupboard used for storing clothes. Wardrobes have hanging spaces with rods and hangers, sliding shelves and drawers to organize your clothes, accessories and other valuables.Every 5 minutes, an item of Furniture sells</b></p>','2_6_5.jpg','Oak Wood',17999,11199,'wardrobe,oak,wood'),(2,7,38,'Anantaran Black Wooden Antique Chicago Brass Telephone','<b><p>For all you collectors and vintage item lovers, we offer you a range of different vintage items that you can pick from. Lend your home a classic touch with one of these vintage pieces. Durable and alluring, you are sure to fetch compliments for it. A one stop-shop for home decor and furniture.</b></p>','2_7_1.jpg','Decoration',3999,2799,'decoration,telephone'),(2,7,39,'Saaga Gold Sheesham Wood & Brass Mini Model Gramophone','<b><p>For all you collectors and vintage item lovers, we offer you a range of different vintage items that you can pick from. Lend your home a classic touch with one of these vintage pieces. Durable and alluring, you are sure to fetch compliments for it. A one stop-shop for home decor and furniture.</b></p>','2_7_2.jpg','Decoration',3999,1999,'decoration,gramaphone'),(2,7,40,'Adie Pome Compass with Box Decor in Copper','<b><p>For all you collectors and vintage item lovers, we offer you a range of different vintage items that you can pick from. Lend your home a classic touch with one of these vintage pieces. Durable and alluring, you are sure to fetch compliments for it. A one stop-shop for home decor and furniture.</b></p>','2_7_3.jpg','Decoration',1999,1000,'decoration,compass'),(2,8,41,'Scoop High Gloss King Bedroom Set in White Colour','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p>','2_8_1.jpg','Engineered Wood',89999,70000,'bedroom,wood,set'),(2,8,42,'Nixon Queen Size Bedroom Set in Brown Colour','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p>','2_8_2.jpg','Engineered Wood',79000,67000,'bedroom,set,wood,brown'),(2,8,43,'Pine Crest Bedroom Set','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p>','2_8_3.jpg','Teak',45000,27999,'bedroom,set,wood,browm'),(2,8,44,'Bedroom Set with Storage Bed in Penache Furnishing','<b><p>Modern Furniture reflects the design philosophy of form following function prevalent in modernism. These designs represent the ideals of cutting excess, practicality and an absence of decoration.</b></p>','2_8_4.jpg','Engineered Wood/Sun Mica',98000,89999,'bedroomset,wood,white');

/*Table structure for table `productstock` */

DROP TABLE IF EXISTS `productstock`;

CREATE TABLE `productstock` (
  `productid` int(3) NOT NULL,
  `availablestock` int(3) DEFAULT '0',
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productstock` */

insert  into `productstock`(`productid`,`availablestock`) values (1,1111),(2,344),(3,44),(4,0),(5,12),(6,0),(7,12),(8,0),(9,0),(10,11),(11,122),(12,0),(13,0),(14,0),(15,0),(16,0),(17,0),(18,0),(19,0),(20,0),(21,0),(22,0),(23,0),(24,0),(25,0),(26,0),(27,0),(28,0),(29,0),(30,0),(31,0),(32,0),(33,0),(34,0),(35,0),(36,0),(37,0),(38,0),(39,0),(40,0),(41,0),(42,0),(43,0),(44,0);

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

/* Trigger structure for table `products` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_product_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_product_insert` AFTER INSERT ON `products` FOR EACH ROW BEGIN
	INSERT INTO productstock (productid) VALUES (NEW.productid);
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
