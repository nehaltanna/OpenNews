-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2012 at 07:14 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `open_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `latlng` varchar(50) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `zoom_level` int(5) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`latlng`),
  KEY `u_name` (`u_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`latlng`, `u_name`, `zoom_level`, `title`, `description`, `date`, `link`) VALUES
('18.416263838366497,73.75911733789064', 'ankit', 10, 'Khadakwaska', 'A good trip to khadakwasla, many clicks. happy', '0003-04-12', 'http://en.wikipedia.org/wiki/Khadakwasla_Dam'),
('18.4748870309839,74.2727281777344', 'onews', 10, 'Highway road', 'Major cities and towns on NH 9 are Pune, Indapur, Solapur, Umarga, Zahirabad, Hyderabad, Narketpally, Suryapet, Kodada, Vijayawada, Vuyyuru and Machilipatnam', '0007-12-11', 'http://en.wikipedia.org/wiki/National_Highway_9_%28India%29'),
('18.518434349461508,73.83773824853517', 'ankit', 16, 'hello ', 'new news description is here', '0005-06-12', 'http://sicsr.ac.in/'),
('18.525352062535706,73.85138532800295', 'onews', 15, 'Crisp pmc', 'Pune muncipal corporation has work to do.', '0006-07-12', 'http://www.punecorporation.org/pmcwebn/index.aspx'),
('18.530517683139102,73.82318504066166', 'onews', 15, 'wer were u', 'were wer you is a restaurant', '0004-09-11', 'http://in.yahoo.com/?p=us'),
('18.532214922338664,73.82510902269291', 'ankit', 15, 'Mandir', 'Chaturshrungi mandir ki pahadi', '2021-09-12', 'http://en.wikipedia.org/wiki/Chaturshringi_Temple'),
('18.538429037406516,73.83270859311529', 'ankit', 15, 'poly', 'this ground is used by people to play football and cricket.', '0005-02-12', 'www.wwf.org'),
('18.540121772917495,73.84306065986334', 'ankit', 15, 'del', 'wlaksdghasd', '0000-00-00', 'lasdkhn'),
('18.54113967688443,73.83713743371584', 'ankit', 15, 'Sinchan in Sinchan nagar', 'its humorous to know that it was the Japanese cartoon character SINCHAN NOHARA to share his name with a locality of Pune the Sinchan Nagar ', '2023-09-12', 'http://en.wikipedia.org/wiki/Crayon_Shin-chan'),
('18.541862894772244,73.8322104629517', 'onews', 15, 'IAS chori', 'chori ho gayi', '2012-06-12', 'http://www.wwf.org/'),
('18.55074173913337,73.83464834375002', 'ankit', 12, 'university hockey', 'Hockey tournament at university ground.', '2021-03-12', 'http://www.unipune.ac.in/university_files/board_of_sports.htm'),
('18.59750833107317,73.72599287061769', 'onews', 11, 'Khadakwaska', 'it compa', '0009-03-12', 'http://en.wikipedia.org/wiki/Crayon_Shin-chan'),
('18.753397783068415,73.43914053125002', 'onews', 10, 'The hillstation', 'famous throughout India for the hard candy sweet known as chikki', '2013-05-10', 'http://en.wikipedia.org/wiki/Lonavla'),
('18.930966582153864,73.28366679479973', 'onews', 9, 'karjat', 'kasjgd', '0003-04-12', 'hgaksd.com'),
('19.949729856180312,73.82402251072699', 'onews', 17, 'My home', 'A-101 Hari angan', '0008-10-12', 'lakshda.com');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `latlng` varchar(50) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `latlng` (`latlng`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `rating`, `latlng`) VALUES
(1, 3, '18.54113967688443,73.83713743371584'),
(2, 3, '18.525352062535706,73.85138532800295'),
(3, 5, '18.54113967688443,73.83713743371584'),
(4, 4, '18.54113967688443,73.83713743371584'),
(5, 4, '18.54113967688443,73.83713743371584'),
(6, 3, '18.518434349461508,73.83773824853517'),
(7, 3, '18.518434349461508,73.83773824853517'),
(8, 4, '18.532214922338664,73.82510902269291'),
(9, 5, '18.532214922338664,73.82510902269291'),
(10, 2, '18.532214922338664,73.82510902269291'),
(11, 3, '18.538429037406516,73.83270859311529'),
(12, 2, '18.538429037406516,73.83270859311529'),
(13, 3, '18.538429037406516,73.83270859311529'),
(14, 3, '18.538429037406516,73.83270859311529'),
(15, 3, '18.54113967688443,73.83713743371584'),
(16, 1, '18.541862894772244,73.8322104629517'),
(17, 5, '18.541862894772244,73.8322104629517'),
(18, 2, '18.525352062535706,73.85138532800295'),
(19, 3, '18.525352062535706,73.85138532800295'),
(20, 1, '18.525352062535706,73.85138532800295'),
(21, 3, '18.525352062535706,73.85138532800295'),
(22, 3, '18.525352062535706,73.85138532800295'),
(23, 2, '18.416263838366497,73.75911733789064'),
(24, 5, '18.416263838366497,73.75911733789064'),
(25, 3, '18.525352062535706,73.85138532800295'),
(26, 4, '19.949729856180312,73.82402251072699');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_name` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`u_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_name`, `passwd`, `email`, `type`) VALUES
('ankit', 'ankit', 'ankit@gmail.com', 1),
('onews', 'onews', 'onews@gmail.com', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `users` (`u_name`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`latlng`) REFERENCES `news` (`latlng`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
