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