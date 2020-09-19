-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2020 at 08:19 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_questions`
--

DROP TABLE IF EXISTS `game_questions`;
CREATE TABLE IF NOT EXISTS `game_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_questions`
--

INSERT INTO `game_questions` (`id`, `team_id`, `answer`, `status`) VALUES
(25, 1, 'rule', 0),
(26, 2, 'goal', 0),
(27, 3, 'fast', 0),
(28, 4, 'wild', 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_teams`
--

DROP TABLE IF EXISTS `game_teams`;
CREATE TABLE IF NOT EXISTS `game_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_teams`
--

INSERT INTO `game_teams` (`id`, `color`) VALUES
(1, 'Red'),
(2, 'Green'),
(3, 'Blue'),
(4, 'Yellow');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
