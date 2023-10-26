-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sportenbeweging
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `ItemID` int NOT NULL AUTO_INCREMENT,
  `NaamVanHetItem` varchar(100) DEFAULT NULL,
  `Beschrijving` text,
  `AantalBeschikbaar` int DEFAULT NULL,
  `Categorie` varchar(50) DEFAULT NULL,
  `afbeeldingslocatie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'voetbal','dit is een voetbal van sparta',70,'voetbal','../afbeeldingen/voetbal.jpg'),(2,'hockeystick','dit is een hockystick',35,'hocky','../afbeeldingen/hockystick.jpg'),(3,'hockyball','dit is een witte hockyball',45,'hocky','../afbeeldingen/hockyball.jpg'),(4,'hockyball','dit is een zwate hockyball',45,'hocky','../afbeeldingen\\hockyballzwart.jpg'),(5,'voetbaldoel','dit is een zaal voetbaldoel ',2,'voetbal','../afbeeldingen/voetbaldoel.jpg'),(6,'matten','dit is een mat om optevallen',5,'gym','../afbeeldingen/gym matt.jpg'),(7,'trefball rood','dit is een roode trefbal',5,'gym','../afbeeldingen/trefbalrood.jpg'),(8,'trefbal groen','dit is een groene trefbal',5,'gym','../afbeeldingen/trefbalgroen.jpg'),(9,'trefbal roze','dit is een roze trefbal',5,'gym','../afbeeldingen/trefbalroze.jpg'),(10,'henk','henk',23,'bier',NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-25 10:47:27
