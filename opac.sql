-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2014 at 06:06 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opac`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_package`
--

CREATE TABLE IF NOT EXISTS `info_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `isbn_no` varchar(20) NOT NULL,
  `date_pub` year(4) NOT NULL,
  `keywords` varchar(20) NOT NULL,
  `call_no` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `place_pub` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbn_no` (`isbn_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `info_package`
--

INSERT INTO `info_package` (`id`, `author`, `title`, `isbn_no`, `date_pub`, `keywords`, `call_no`, `publisher`, `place_pub`) VALUES
(22, 'Francis Mtega', 'Organization of info', '123098', 2013, 'Metamorphism,piece,o', '1234', 'Local Pub', 'India'),
(28, 'Mushumbuzi, K.G', 'Rural Development', '1234-0987-999', 2001, 'esteem,needs', '123-opas-999', 'snal', 'Morogoro'),
(31, 'Artulo vidal', 'Game of chance', '1234-0999', 1998, 'come,eat,first', '234-099', 'Wasanii Promoters', 'Nairobi'),
(32, 'Mtunungu. k. L', 'This time ', '1234-0987-9876', 1997, 'kim,lil,low', 'swqeedd-09873-098766', 'Motors', 'Azamto'),
(34, 'Mtemela', 'Sua', '123-09898', 2009, 'love,local', '1223-995-444', 'suan', 'Morogoro'),
(35, 'masamaki', 'MUSaa and eve', '123-055-8900', 2001, 'lost,love,kios', '23444', 'snal', 'Morogoro'),
(39, 'Sumaile Kiduku', 'Affairs inside the h', '123-788-099', 2001, 'king, peha, chumong', '123-ASDF-999', 'Gmc', 'indonesia'),
(40, 'Mushumbuzi, K.G', 'Life without love', '123-0987-6677', 2000, 'like, father, like s', '3456092', 'Snal', 'Monteglacian'),
(42, 'kitindi', 'How is our site?', '543256', 2006, 'this,time,tommorow,t', '123456', 'general publishers', 'Morogoro'),
(43, 'Mgogo', 'dodoma municipal', 'iso-93455', 2001, 'king, peha, chumong', '234-099', 'Gmc', 'dodoma'),
(44, 'Rebecca Kyussa Franc', 'Most beautiful Afric', '8912344', 2003, 'love, my, beautiful,', 's100-544-9222', 'Deus, company', 'Igurusi'),
(45, 'Lukas P. Podolski', 'Die another day', 's123-098-111', 2004, 'lukas, fabianski, lo', 'SSS-3456B.65432', 'gome', 'ukraine'),
(47, 'Kandamali, D. F', 'Mathematics Genius', 'k123-098-111', 2001, 'maths, matthematics,', 's100-544-9222', 'Arizona publishers', 'alaska'),
(49, 'Abdul', 'Tanga ', 's1234', 2004, 'sokoine, university,', '1234-0998-6522', 'Soler inc', 'indonesia'),
(50, 'Denis', 'Lugole', '1234-089-9776', 2001, 'like, father, like s', '56890', 'gnome', 'moro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_level`) VALUES
(17, 'DEDE', 'b4be1c568a6dc02dcaf2849852bdb13e', 0),
(18, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(19, 'Delvin', '575b9e2ce494227f7123d2d4ba888451', 0),
(20, 'Kitunguu', 'c3916e065934b78aab079a45fcc20ed1', 0),
(21, 'Rebecca', 'e358bf645a205cf15efa983b5517d945', 0),
(22, 'FRANCIS', 'd0ab7fe6c314f4fe5b6c18a0157c96b4', 0),
(23, 'Simba', '9784b7ec358595dbf015f3b7b3fcf603', 0),
(24, 'Geno', '2c4c528e66b31da4d8632ecc9905906d', 0),
(25, 'Robin', '8ee60a2e00c90d7e00d5069188dc115b', 0),
(26, 'Deus', '54e39e4621bd57e5e73104bc7a787ff7', 0),
(27, 'Masamaki', 'd3d35a84966b3c283f5f6e4731c9e7de', 0),
(28, 'Mgeni', 'fd38a8c05651e706b1d9c66adffda5a2', 0);
