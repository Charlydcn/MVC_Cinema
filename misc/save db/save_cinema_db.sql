-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_actor`),
  UNIQUE KEY `id_person` (`id_person`),
  CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.actor : ~7 rows (environ)
INSERT INTO `actor` (`id_actor`, `id_person`) VALUES
	(1, 2),
	(2, 3),
	(3, 5),
	(4, 6),
	(5, 7),
	(6, 8),
	(7, 9),
	(8, 10),
	(9, 11),
	(10, 12),
	(11, 23),
	(12, 24),
	(13, 25),
	(14, 26),
	(15, 27),
	(16, 29),
	(17, 30),
	(18, 31),
	(19, 32),
	(20, 33),
	(21, 35),
	(22, 36),
	(23, 37),
	(24, 38),
	(25, 39),
	(26, 40),
	(27, 41),
	(28, 42),
	(29, 43),
	(30, 44),
	(31, 47),
	(32, 48),
	(33, 49),
	(34, 50),
	(35, 51),
	(36, 52),
	(37, 53);

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_casting` int NOT NULL AUTO_INCREMENT,
  `id_role` int NOT NULL,
  `id_actor` int NOT NULL,
  `id_movie` int NOT NULL,
  PRIMARY KEY (`id_casting`),
  KEY `id_role` (`id_role`),
  KEY `id_actor` (`id_actor`),
  KEY `id_movie` (`id_movie`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.casting : ~38 rows (environ)
INSERT INTO `casting` (`id_casting`, `id_role`, `id_actor`, `id_movie`) VALUES
	(36, 18, 18, 4),
	(37, 1, 1, 1),
	(38, 2, 2, 1),
	(39, 3, 3, 1),
	(40, 4, 4, 1),
	(41, 6, 6, 2),
	(42, 7, 7, 2),
	(43, 8, 8, 2),
	(44, 9, 9, 2),
	(45, 15, 15, 3),
	(46, 12, 12, 3),
	(47, 13, 13, 3),
	(48, 14, 14, 3),
	(49, 11, 11, 3),
	(50, 16, 16, 4),
	(51, 17, 17, 4),
	(52, 5, 5, 1),
	(53, 19, 19, 4),
	(54, 20, 20, 4),
	(55, 21, 21, 5),
	(56, 22, 22, 5),
	(57, 23, 23, 5),
	(58, 24, 24, 5),
	(59, 25, 25, 5),
	(60, 26, 26, 6),
	(61, 27, 27, 6),
	(62, 28, 28, 6),
	(63, 29, 29, 6),
	(64, 30, 30, 6),
	(65, 31, 31, 7),
	(66, 32, 32, 7),
	(67, 33, 33, 7),
	(68, 34, 34, 7),
	(69, 35, 35, 7),
	(70, 10, 10, 2),
	(71, 36, 36, 1),
	(72, 36, 36, 2),
	(73, 36, 36, 3);

-- Listage de la structure de table cinema. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_director`),
  UNIQUE KEY `id_person` (`id_person`),
  CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.director : ~7 rows (environ)
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 1),
	(2, 20),
	(3, 21),
	(4, 28),
	(5, 34),
	(6, 45),
	(7, 46),
	(8, 52);

-- Listage de la structure de table cinema. movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `length` int NOT NULL,
  `synopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rating` int DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `id_director` int NOT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.movie : ~7 rows (environ)
INSERT INTO `movie` (`id_movie`, `title`, `release_date`, `length`, `synopsis`, `rating`, `poster`, `id_director`) VALUES
	(1, 'Batman', '1989-09-13', 125, 'The Dark Knight of Gotham City begins his war on crime with his first major enemy being Jack Napier, a criminal who becomes the clownishly homicidal Joker.', 84, 'missing_poster.png', 1),
	(2, 'Spider-man', '2002-06-12', 121, 'After being bitten by a genetically-modified spider, a shy teenager gains spider-like abilities that he uses to fight injustice as a masked superhero and face a vengeful enemy.', 67, 'missing_poster.png', 2),
	(3, 'Skyfall', '2012-10-26', 143, 'James Bond\'s loyalty to M is tested when her past comes back to haunt her. When MI6 comes under attack, 007 must track down and destroy the threat, no matter how personal the cost.', 86, 'missing_poster.png', 3),
	(4, 'Inception', '2010-07-16', 148, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 91, 'missing_poster.png', 4),
	(5, 'The Shawshank Redemption', '1994-09-10', 142, 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.', 98, 'missing_poster.png', 5),
	(6, 'Pulp Fiction', '1994-10-14', 154, 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 96, 'missing_poster.png', 6),
	(7, 'Forrest Gump', '1994-07-06', 142, 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 95, 'missing_poster.png', 7);

-- Listage de la structure de table cinema. movie_genre
CREATE TABLE IF NOT EXISTS `movie_genre` (
  `id_movie_genre` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_movie_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.movie_genre : ~11 rows (environ)
INSERT INTO `movie_genre` (`id_movie_genre`, `genre_name`) VALUES
	(1, 'Action'),
	(2, 'Fantasy'),
	(3, 'Spy'),
	(4, 'Comedy'),
	(5, 'Drama'),
	(6, 'Adventure'),
	(7, 'Thriller'),
	(8, 'Sci-Fi'),
	(9, 'Detective'),
	(10, 'Crime'),
	(11, 'Romance');

-- Listage de la structure de table cinema. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `portrait` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.person : ~44 rows (environ)
INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `birthdate`, `genre`, `portrait`) VALUES
	(1, 'Tim', 'Burton', '1959-08-25', 'Male', 'missing_portrait.png'),
	(2, 'Michael', 'Keaton', '1953-12-09', 'Male', 'missing_portrait.png'),
	(3, 'Kim', 'Basinger', '1937-04-22', 'Female', 'missing_portrait.png'),
	(5, 'Jack', 'Nicholson', '1937-04-22', 'Male', 'missing_portrait.png'),
	(6, 'Jack', 'Palance', '1919-02-18', 'Male', 'missing_portrait.png'),
	(7, 'Michael', 'Gough', '1916-12-23', 'Male', 'missing_portrait.png'),
	(8, 'Tobey', 'Maguire', '1975-06-27', 'Male', 'missing_portrait.png'),
	(9, 'Willem', 'Dafoe', '1955-07-22', 'Male', 'missing_portrait.png'),
	(10, 'Kirsten', 'Dunst', '1982-04-30', 'Female', 'missing_portrait.png'),
	(11, 'James', 'Franco', '1978-04-19', 'Male', 'missing_portrait.png'),
	(12, 'Rosemary', 'Harris', '1927-09-19', 'Female', 'missing_portrait.png'),
	(20, 'Sam', 'Raimi', '1959-10-23', 'Male', 'missing_portrait.png'),
	(21, 'Sam', 'Mendes', '1965-08-01', 'Male', 'missing_portrait.png'),
	(23, 'Daniel', 'Craig', '1968-03-02', 'Male', 'missing_portrait.png'),
	(24, 'Judi', 'Dench', '1934-12-09', 'Female', 'missing_portrait.png'),
	(25, 'Javier', 'Bardem', '1969-03-01', 'Male', 'missing_portrait.png'),
	(26, 'Ralph', 'Fiennes', '1962-12-22', 'Male', 'missing_portrait.png'),
	(27, 'Naomie', 'Harris', '1976-09-06', 'Female', 'missing_portrait.png'),
	(28, 'Christopher', 'Nolan', '1970-07-30', 'Male', 'missing_portrait.png'),
	(29, 'Leonardo', 'DiCaprio', '1974-11-11', 'Male', 'missing_portrait.png'),
	(30, 'Ellen', 'Page', '1987-02-21', 'Female', 'missing_portrait.png'),
	(31, 'Marion', 'Cotillard', '1975-09-30', 'Female', 'missing_portrait.png'),
	(32, 'Tom', 'Hardy', '1977-09-15', 'Male', 'missing_portrait.png'),
	(33, 'Ken', 'Watanabe', '1959-10-21', 'Male', 'missing_portrait.png'),
	(34, 'Frank', 'Drabont', '1959-01-28', 'Male', 'missing_portrait.png'),
	(35, 'Tim', 'Robbins', '1958-10-16', 'Male', 'missing_portrait.png'),
	(36, 'Morgan', 'Freeman', '1937-06-01', 'Male', 'missing_portrait.png'),
	(37, 'Clancy', 'Brown', '1959-01-05', 'Male', 'missing_portrait.png'),
	(38, 'Bob', 'Gunton', '1945-11-15', 'Male', 'missing_portrait.png'),
	(39, 'William', 'Sadler', '1950-04-13', 'Male', 'missing_portrait.png'),
	(40, 'John', 'Travolta', '1954-02-18', 'Male', 'missing_portrait.png'),
	(41, 'Samuel', 'L. Jackson', '1948-12-21', 'Male', 'missing_portrait.png'),
	(42, 'Uma', 'Thurman', '1970-04-29', 'Female', 'missing_portrait.png'),
	(43, 'Bruce', 'Willis', '1955-03-19', 'Male', 'missing_portrait.png'),
	(44, 'Ving', 'Rhames', '1959-05-12', 'Male', 'missing_portrait.png'),
	(45, 'Quentin', 'Tarantino', '1963-03-27', 'Male', 'missing_portrait.png'),
	(46, 'Robert', 'Zemeckis', '1951-05-14', 'Male', 'missing_portrait.png'),
	(47, 'Tom', 'Hanks', '1959-07-09', 'Male', 'missing_portrait.png'),
	(48, 'Gary', 'Sinise', '1955-03-17', 'Male', 'missing_portrait.png'),
	(49, 'Robin', 'Wright', '1966-04-08', 'Female', 'missing_portrait.png'),
	(50, 'Mykelti', 'Williamson', '1960-03-04', 'Male', 'missing_portrait.png'),
	(51, 'Sally', 'Field', '1946-11-06', 'Female', 'missing_portrait.png'),
	(52, 'Monsieur', 'Test', '2023-04-20', 'Male', 'missing_portrait.png'),
	(53, 'Madame', 'Test', '2023-04-20', 'Female', 'missing_portrait.png');

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~0 rows (environ)
INSERT INTO `role` (`id_role`, `role_name`) VALUES
	(1, 'Batman'),
	(2, 'Vicki Vale'),
	(3, 'Joker'),
	(4, 'Carl Grissom'),
	(5, 'Alfred Pennyworth'),
	(6, 'Spider-man'),
	(7, 'Norman Osborn'),
	(8, 'Mary Jane'),
	(9, 'Harry Osborn'),
	(10, 'Aunt May'),
	(11, 'James Bond'),
	(12, 'M'),
	(13, 'Raoul Silva'),
	(14, 'Garreth Mallory'),
	(15, 'Eve Moneypenny'),
	(16, 'Dom Cobb'),
	(17, 'Ariane'),
	(18, 'Mal'),
	(19, 'Eames'),
	(20, 'Saïto'),
	(21, 'Andy Dufresne'),
	(22, 'Ellis Boyd \'Red\' Redding'),
	(23, 'Byron Hadley'),
	(24, 'Samuel Norton'),
	(25, 'Heywood'),
	(26, 'Vincent Vega'),
	(27, 'Jules Winnfield'),
	(28, 'Mia Wallace'),
	(29, 'Butch Coolidge'),
	(30, 'Marcellus Wallace'),
	(31, 'Forrest Gump'),
	(32, 'Lieutenant Dan'),
	(33, 'Jenny Curan'),
	(34, 'Bubba Blue'),
	(35, 'Mrs. Gump'),
	(36, 'Super Monsieur Test'),
	(37, 'Super Madame Test');

-- Listage de la structure de table cinema. set_movie_genre
CREATE TABLE IF NOT EXISTS `set_movie_genre` (
  `id_movie` int NOT NULL,
  `id_movie_genre` int NOT NULL,
  PRIMARY KEY (`id_movie`,`id_movie_genre`),
  KEY `id_movie_genre` (`id_movie_genre`),
  CONSTRAINT `set_movie_genre_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`),
  CONSTRAINT `set_movie_genre_ibfk_2` FOREIGN KEY (`id_movie_genre`) REFERENCES `movie_genre` (`id_movie_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.set_movie_genre : ~14 rows (environ)
INSERT INTO `set_movie_genre` (`id_movie`, `id_movie_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(2, 2),
	(5, 5),
	(6, 5),
	(7, 5),
	(1, 6),
	(3, 7),
	(4, 8),
	(5, 9),
	(6, 10),
	(7, 11);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
