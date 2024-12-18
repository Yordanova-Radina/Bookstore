-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	8.0.38

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'На тъмната страна','1733928183_книга 1.jpg','25.00'),(2,'Пътища от огън','1733928228_книга 2.jpg','22.00'),(3,'Нишка','1733928289_книга 3.jpg','21.25'),(4,'Авитохол и небесният народ','1733928351_книга 4.jpg','24.00'),(5,'Абракадабра','1733928390_книга 5.jpg','37.00'),(6,'Гунди - какъвто не го познавате','1733928476_книга 6.jpg','19.14'),(7,'Спомени с вкус','1733928505_книга 7.jpg','29.70'),(8,'Любимите ми медицински вкусове','1733928535_книга 8.jpg','16.99'),(9,'Илон Мъск','1733928572_книга 9.jpg','55.00'),(10,'Десет велики българолюбци','1733928629_книга 10.jpg','18.90'),(11,'Братята генерали разказват','1733928655_книга 11.jpg','16.00'),(12,'На прага на времето','1733928672_книга 12.jpg','35.00'),(13,'Две трудни цветя и един фейояд','1733928695_книга 13.jpg','32.00'),(14,'Коледна магия/Луксозно издание','1733928723_книга 14.jpg','17.95'),(15,'Клубът на пълнолунието','1733928752_книга 15.jpg','19.50'),(16,'Осем истории за Коледа','1733928778_книга 16.jpg','21.67'),(17,'Софтуерно тестване','1733929861_книга 17.jpg','27.95'),(18,'Научете сами SQL за 10 минути','1733929891_книга 18.jpg','19.99'),(19,'HTML for Dummies','1733929932_книга 19.jpg','15.00'),(20,'MongoDB - нерелационни бази данни','1733929975_книга 20.jpg','19.95');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite_books_users`
--

DROP TABLE IF EXISTS `favorite_books_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_books_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_books_users`
--

LOCK TABLES `favorite_books_users` WRITE;
/*!40000 ALTER TABLE `favorite_books_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorite_books_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `names` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_admin` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Radina','radina_yordanova@abv.bg','$argon2i$v=19$m=65536,t=4,p=1$UjFMendrbC9IRU82MFZPaA$J/wMvXGVj5V60OT7Z3dSyrCpc0uOsU7FyE0kqp9SU44','2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-18  9:43:45
