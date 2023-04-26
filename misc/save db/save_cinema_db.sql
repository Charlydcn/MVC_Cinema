-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cinema`;

-- Listage de la structure de la table cinema. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `id_person` (`id_person`) USING BTREE,
  CONSTRAINT `FK_actor_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.actor : ~37 rows (environ)
/*!40000 ALTER TABLE `actor` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `actor` ENABLE KEYS */;

-- Listage de la structure de la table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_casting` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  PRIMARY KEY (`id_casting`),
  KEY `id_role` (`id_role`),
  KEY `id_actor` (`id_actor`),
  KEY `id_movie` (`id_movie`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.casting : ~35 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_casting`, `id_role`, `id_actor`, `id_movie`) VALUES
	(1, 18, 18, 4),
	(2, 2, 2, 1),
	(3, 3, 3, 1),
	(5, 8, 8, 2),
	(6, 9, 9, 2),
	(7, 15, 15, 3),
	(8, 12, 12, 3),
	(9, 13, 13, 3),
	(10, 14, 14, 3),
	(11, 11, 11, 3),
	(12, 16, 16, 4),
	(13, 17, 17, 4),
	(14, 5, 5, 1),
	(15, 19, 19, 4),
	(16, 20, 20, 4),
	(17, 21, 21, 5),
	(18, 22, 22, 5),
	(19, 23, 23, 5),
	(20, 24, 24, 5),
	(21, 25, 25, 5),
	(22, 26, 26, 6),
	(23, 27, 27, 6),
	(24, 28, 28, 6),
	(25, 29, 29, 6),
	(26, 30, 30, 6),
	(27, 31, 31, 7),
	(28, 32, 32, 7),
	(29, 33, 33, 7),
	(30, 34, 34, 7),
	(31, 35, 35, 7),
	(32, 10, 10, 2),
	(33, 4, 4, 1),
	(34, 1, 1, 1),
	(35, 6, 6, 2),
	(58, 7, 7, 2);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.director : ~7 rows (environ)
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 1),
	(2, 20),
	(3, 21),
	(4, 28),
	(5, 34),
	(6, 45),
	(7, 46);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- Listage de la structure de la table cinema. movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `length` int(11) NOT NULL,
  `synopsis` text,
  `rating` float DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `id_director` int(11) NOT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.movie : ~8 rows (environ)
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`id_movie`, `title`, `release_date`, `length`, `synopsis`, `rating`, `poster`, `id_director`) VALUES
	(1, 'Batman', '1989-09-13', 125, 'The Dark Knight of Gotham City begins his war on crime with his first major enemy being Jack Napier, a criminal who becomes the clownishly homicidal Joker.', 4, 'batman_1989.jpg', 1),
	(2, 'Spider-man', '2002-06-12', 121, 'After being bitten by a genetically-modified spider, a shy teenager gains spider-like abilities that he uses to fight injustice as a masked superhero and face a vengeful enemy.', 3, 'spiderman_2002.jpg', 2),
	(3, 'Skyfall', '2012-10-26', 143, 'James Bond\'s loyalty to M is tested when her past comes back to haunt her. When MI6 comes under attack, 007 must track down and destroy the threat, no matter how personal the cost.', 4, 'skyfall_2012.jpg', 3),
	(4, 'Inception', '2010-07-16', 148, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 4.5, 'inception_2010.jpg', 4),
	(5, 'The Shawshank Redemption', '1994-09-10', 142, 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.', 5, 'shawshankredemption_1994.jpg', 5),
	(6, 'Pulp Fiction', '1994-10-14', 154, 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 4.5, 'pulpfiction_1994.jpg', 6),
	(7, 'Forrest Gump', '1994-07-06', 142, 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 4.5, 'forrestgump_1994.jpg', 7),
	(55, 'Movie_1', '1989-11-30', 197, 'dfhngjgf', 5, 'missing.png', 3);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

-- Listage de la structure de la table cinema. movie_genre
CREATE TABLE IF NOT EXISTS `movie_genre` (
  `id_movie_genre` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_movie_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.movie_genre : ~11 rows (environ)
/*!40000 ALTER TABLE `movie_genre` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `movie_genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `portrait` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.person : ~44 rows (environ)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `birthdate`, `genre`, `portrait`) VALUES
	(1, 'Tim', 'Burton', '1959-08-25', 'Male', 'leonardo_dicaprio.jpg'),
	(2, 'Michael', 'Keaton', '1953-12-09', 'Male', 'leonardo_dicaprio.jpg'),
	(3, 'Kim', 'Basinger', '1937-04-22', 'Female', '644934878b9c51.73359620.jpg'),
	(5, 'Jack', 'Nicholson', '1937-04-22', 'Male', 'leonardo_dicaprio.jpg'),
	(6, 'Jack', 'Palance', '1919-02-18', 'Male', '64492224332423.70806226.jpg'),
	(7, 'Michael', 'Gough', '1916-12-23', 'Male', 'leonardo_dicaprio.jpg'),
	(8, 'Tobey', 'Maguire', '1975-06-27', 'Male', 'leonardo_dicaprio.jpg'),
	(9, 'Willem', 'Dafoe', '1955-07-22', 'Male', 'leonardo_dicaprio.jpg'),
	(10, 'Kirsten', 'Dunst', '1982-04-30', 'Female', 'leonardo_dicaprio.jpg'),
	(11, 'James', 'Franco', '1978-04-19', 'Male', 'leonardo_dicaprio.jpg'),
	(12, 'Rosemary', 'Harris', '1927-09-19', 'Female', 'leonardo_dicaprio.jpg'),
	(20, 'Sam', 'Raimi', '1959-10-23', 'Male', 'leonardo_dicaprio.jpg'),
	(21, 'Sam', 'Mendes', '1965-08-01', 'Male', 'leonardo_dicaprio.jpg'),
	(23, 'Daniel', 'Craig', '1968-03-02', 'Male', 'leonardo_dicaprio.jpg'),
	(24, 'Judi', 'Dench', '1934-12-09', 'Female', 'leonardo_dicaprio.jpg'),
	(25, 'Javier', 'Bardem', '1969-03-01', 'Male', 'leonardo_dicaprio.jpg'),
	(26, 'Ralph', 'Fiennes', '1962-12-22', 'Male', 'leonardo_dicaprio.jpg'),
	(27, 'Naomie', 'Harris', '1976-09-06', 'Female', 'leonardo_dicaprio.jpg'),
	(28, 'Christopher', 'Nolan', '1970-07-30', 'Male', 'leonardo_dicaprio.jpg'),
	(29, 'Leonardo', 'DiCaprio', '1974-11-11', 'Male', 'leonardo_dicaprio.jpg'),
	(30, 'Ellen', 'Page', '1987-02-21', 'Female', 'leonardo_dicaprio.jpg'),
	(31, 'Marion', 'Cotillard', '1975-09-30', 'Female', 'leonardo_dicaprio.jpg'),
	(32, 'Tom', 'Hardy', '1977-09-15', 'Male', 'leonardo_dicaprio.jpg'),
	(33, 'Ken', 'Watanabe', '1959-10-21', 'Male', 'leonardo_dicaprio.jpg'),
	(34, 'Frank', 'Drabont', '1959-01-28', 'Male', 'leonardo_dicaprio.jpg'),
	(35, 'Tim', 'Robbins', '1958-10-16', 'Male', 'leonardo_dicaprio.jpg'),
	(36, 'Morgan', 'Freeman', '1937-06-01', 'Male', 'leonardo_dicaprio.jpg'),
	(37, 'Clancy', 'Brown', '1959-01-05', 'Male', 'leonardo_dicaprio.jpg'),
	(38, 'Bob', 'Gunton', '1945-11-15', 'Male', 'leonardo_dicaprio.jpg'),
	(39, 'William', 'Sadler', '1950-04-13', 'Male', 'leonardo_dicaprio.jpg'),
	(40, 'John', 'Travolta', '1954-02-18', 'Male', 'leonardo_dicaprio.jpg'),
	(41, 'Samuel', 'L. Jackson', '1948-12-21', 'Male', 'leonardo_dicaprio.jpg'),
	(42, 'Uma', 'Thurman', '1970-04-29', 'Female', 'leonardo_dicaprio.jpg'),
	(43, 'Bruce', 'Willis', '1955-03-19', 'Male', 'leonardo_dicaprio.jpg'),
	(44, 'Ving', 'Rhames', '1959-05-12', 'Male', 'leonardo_dicaprio.jpg'),
	(45, 'Quentin', 'Tarantino', '1963-03-27', 'Male', 'leonardo_dicaprio.jpg'),
	(46, 'Robert', 'Zemeckis', '1951-05-14', 'Male', 'leonardo_dicaprio.jpg'),
	(47, 'Tom', 'Hanks', '1959-07-09', 'Male', 'leonardo_dicaprio.jpg'),
	(48, 'Gary', 'Sinise', '1955-03-17', 'Male', 'leonardo_dicaprio.jpg'),
	(49, 'Robin', 'Wright', '1966-04-08', 'Female', 'leonardo_dicaprio.jpg'),
	(50, 'Mykelti', 'Williamson', '1960-03-04', 'Male', 'leonardo_dicaprio.jpg'),
	(51, 'Sally', 'Field', '1946-11-06', 'Female', 'leonardo_dicaprio.jpg'),
	(52, 'Monsieur', 'Test', '2001-08-28', 'Female', 'leonardo_dicaprio.jpg'),
	(53, 'Madame', 'Test', '2000-01-20', 'Female', 'leonardo_dicaprio.jpg');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.role : ~37 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table cinema. set_movie_genre
CREATE TABLE IF NOT EXISTS `set_movie_genre` (
  `id_movie` int(11) NOT NULL,
  `id_movie_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_movie`,`id_movie_genre`),
  KEY `id_movie_genre` (`id_movie_genre`),
  CONSTRAINT `set_movie_genre_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `set_movie_genre_ibfk_2` FOREIGN KEY (`id_movie_genre`) REFERENCES `movie_genre` (`id_movie_genre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.set_movie_genre : ~16 rows (environ)
/*!40000 ALTER TABLE `set_movie_genre` DISABLE KEYS */;
INSERT INTO `set_movie_genre` (`id_movie`, `id_movie_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(55, 1),
	(2, 2),
	(55, 3),
	(5, 5),
	(6, 5),
	(7, 5),
	(1, 6),
	(3, 7),
	(4, 8),
	(5, 9),
	(6, 10),
	(7, 11);
/*!40000 ALTER TABLE `set_movie_genre` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
