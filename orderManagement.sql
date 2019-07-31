CREATE DATABASE  IF NOT EXISTS `order_management` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `order_management`;
-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: order_management
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clients_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`clients_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Amazon','Jeff ','Bezos'),(2,'Ebay','Pierre','Omidyar'),(3,'Google','Larry ','Page'),(4,'Facebook','Mark','Zuckerberg'),(5,'Linux','Linus ','Torvalds'),(6,'Littlewoods','John','Moores');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Awaiting Despatch','Visa','2019-07-28 13:20:00','Payment made for 2 products awaiting courier to collect.'),(2,'Payment Declined','PayPal','2019-07-28 14:38:00','Payment has been Declined by Card Issuer'),(3,'Delivered','Visa','2019-07-28 14:50:00','Payment has been successfully signed for and delivered.'),(4,'In Transit','Visa','2019-07-28 14:45:00','En route to client.');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Philosophers Stone','Harry Potter 1 '),(2,'Chamber of Secrets','Harry Potter 2'),(3,'Prisoner of Azkaban','Harry Potter 3'),(4,'Goblet of Fire','Harry Potter 4'),(5,'Order of the Phoenix','Harry Potter 5'),(6,'Half-blood Prince ','Harry Potter 6'),(7,'Deathly Hallows','Harry Potter 7');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_to_order`
--

DROP TABLE IF EXISTS `products_to_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_to_order` (
  `products_to_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `clients_id` varchar(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` varchar(45) NOT NULL,
  `postage` varchar(45) NOT NULL,
  `despatch_date` datetime NOT NULL,
  PRIMARY KEY (`products_to_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_to_order`
--

LOCK TABLES `products_to_order` WRITE;
/*!40000 ALTER TABLE `products_to_order` DISABLE KEYS */;
INSERT INTO `products_to_order` VALUES (1,1,'2',1,'10.00','0.00','2019-08-01 12:00:00'),(2,1,'2',2,'10.00','2.50','2019-08-01 12:00:00'),(3,4,'4',4,'20.00','0.00','2019-07-29 13:00:00');
/*!40000 ALTER TABLE `products_to_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-28 22:57:06
