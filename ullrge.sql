-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 09:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
  
SET GLOBAL event_scheduler = ON;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ullrge`
--
CREATE DATABASE IF NOT EXISTS `ullrge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ullrge`;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `user_id` int(11) NOT NULL,
  `cash` bigint(20) NOT NULL,
  `bank` bigint(20) NOT NULL,
  `points` bigint(20) NOT NULL,
  `credits` bigint(20) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plugin_crime`
--

CREATE TABLE IF NOT EXISTS `plugin_crime` (
  `crime_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `energy_cost` int(11) NOT NULL,
  PRIMARY KEY (`crime_id`),
  UNIQUE KEY `crime_id` (`crime_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `user_id` int(11) NOT NULL,
  `energy_current` bigint(20) NOT NULL,
  `energy_max` bigint(20) NOT NULL,
  `experiance_current` decimal(20,2) NOT NULL,
  `experiance_max` bigint(20) NOT NULL,
  `health_current` bigint(20) NOT NULL,
  `health_max` bigint(20) NOT NULL,
  `strength_current` bigint(20) NOT NULL,
  `defence_current` bigint(20) NOT NULL,
  `speed_current` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name_first` varchar(30) NOT NULL,
  `name_last` varchar(30) NOT NULL,
  `join_date` bigint(20) NOT NULL,
  `token` varchar(40) NOT NULL,
  `verified` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `stats_update` ON SCHEDULE EVERY 1 MINUTE STARTS '2016-02-19 22:51:58' ON COMPLETION PRESERVE ENABLE DO BEGIN
UPDATE stats SET energy_current = (energy_current + (energy_max / 4)) WHERE energy_current < energy_max;
UPDATE stats SET health_current = (health_current + (health_max / 4)) WHERE health_current < health_max;
UPDATE stats SET energy_current = energy_max WHERE energy_current > energy_max;
UPDATE stats SET health_current = health_max WHERE health_current > health_max; 
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
