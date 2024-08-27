-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for notes
CREATE DATABASE IF NOT EXISTS `notes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `notes`;

-- Dumping structure for table notes.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user-id-idx` (`user_id`) USING BTREE,
  CONSTRAINT `FK_notes_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table notes.notes: ~1 rows (approximately)
DELETE FROM `notes`;
INSERT INTO `notes` (`id`, `user_id`, `title`, `content`) VALUES
	(15, 5, 'sos', 'peringatan dini');

-- Dumping structure for table notes.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table notes.user: ~5 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`) VALUES
	(1, 'k', 'koe', '$2y$10$t3hurRy5qO9Z7tRf/KrjP.hoitsWEvuZHw7mpxrxIZtbRSnMtQLq2', 'koe@mail.com'),
	(2, 'e', 'r', '$2y$10$u1xlCWiemt8m0L5q8naXJ.jb2seZ9eYloGtIkCzAkM/KbZ9qItgua', 's2@gmail.com'),
	(3, 't', 'y', '$2y$10$39KzzH1gysfPUY1nHHOOw.mYUoFyupHI/xh7p94PiHj3h5tWGjBWa', 'ab@gmail.com'),
	(4, 'l', 'p', '$2y$10$tpaDtfgavyzJt4RIEAAEC.f7ARNjgthHRNeUQIBwPl2WoYcCPOcRK', 'f@gmail.com'),
	(5, 'd', 'd', '$2y$10$NwcyIhy/i4tBNffVJrrji.3G42rVh22EZhr7oo67XpqPe2nlIOI7q', 'd@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
