CREATE DATABASE  IF NOT EXISTS `desikitchen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `desikitchen`;
-- MySQL dump 10.13  Distrib 5.6.17, for osx10.6 (i386)
--
-- Host: localhost    Database: desikitchen
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `Directions`
--

DROP TABLE IF EXISTS `Directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Directions` (
  `DirectionsID` int(11) NOT NULL,
  `Directions` text,
  PRIMARY KEY (`DirectionsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Directions`
--

LOCK TABLES `Directions` WRITE;
/*!40000 ALTER TABLE `Directions` DISABLE KEYS */;
INSERT INTO `Directions` VALUES (1,'Cook the food'),(2,'Wait for food to cook itself');
/*!40000 ALTER TABLE `Directions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ingredients`
--

DROP TABLE IF EXISTS `Ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ingredients` (
  `IngredientID` int(11) NOT NULL,
  `Quantity` varchar(45) DEFAULT NULL,
  `IngredientName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IngredientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ingredients`
--

LOCK TABLES `Ingredients` WRITE;
/*!40000 ALTER TABLE `Ingredients` DISABLE KEYS */;
INSERT INTO `Ingredients` VALUES (1,'4 tablespoons','Butter');
/*!40000 ALTER TABLE `Ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inventory` (
  `InventoryID` int(11) NOT NULL,
  `RecipeID` int(11) DEFAULT NULL,
  `ItemName` varchar(45) DEFAULT NULL,
  `ItemUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`InventoryID`),
  KEY `ItemUser` (`ItemUser`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ItemUser`) REFERENCES `User` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventory`
--

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;
INSERT INTO `Inventory` VALUES (1,1,'Potatoes',1),(2,1,'Onions',1),(3,1,'Tomatoes',1),(4,1,'Ginger',1),(5,1,'Cucumber',1),(6,1,'Broccoli',1),(7,1,'Cauliflower',1),(8,1,'Garlic',1),(9,1,'Cheese',1),(10,1,'Bread',1),(11,1,'Oil',2),(12,1,'Sour Cream',2),(13,1,'Lettuce',2),(14,1,'Tofu',2),(15,1,'Paneer',2),(16,1,'Cream Cheese',2),(17,1,'Butter',2),(18,1,'Peas',2),(19,1,'Carrots',2),(20,1,'Green Beans',2),(21,1,'Lentils',3),(22,1,'Pickles',3),(23,1,'Bananas',3),(24,1,'Apples',3),(25,1,'Oranges',3),(26,1,'Grapes',3),(27,1,'Spinach',3),(28,1,'Saffron',3),(29,1,'Celery',3),(30,1,'Brussel Sprouts',3);
/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recipe`
--

DROP TABLE IF EXISTS `Recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recipe` (
  `RecipeID` int(11) NOT NULL,
  `RecipeName` varchar(45) DEFAULT NULL,
  `Ingredients` varchar(120) DEFAULT NULL,
  `DirectionsID` int(11) DEFAULT NULL,
  `ServingSize` varchar(45) DEFAULT NULL,
  `CookTime` varchar(45) DEFAULT NULL,
  `DishImage` text,
  PRIMARY KEY (`RecipeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recipe`
--

LOCK TABLES `Recipe` WRITE;
/*!40000 ALTER TABLE `Recipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `Recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recipe_Ingredients`
--

DROP TABLE IF EXISTS `Recipe_Ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recipe_Ingredients` (
  `IngredientsID` int(11) NOT NULL,
  `RecipeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`IngredientsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recipe_Ingredients`
--

LOCK TABLES `Recipe_Ingredients` WRITE;
/*!40000 ALTER TABLE `Recipe_Ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `Recipe_Ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `email_address_UNIQUE` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Anoushka Ramkumar','F','ankyisthebest@gmail.com'),(2,'Vedant Rautela','M','v.rautela01@gmail.com'),(3,'Anand Shetler','M','anandshetler@gmail.com');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-28 11:48:53
