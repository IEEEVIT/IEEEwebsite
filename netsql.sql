-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 06:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ieeenewwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `regno` varchar(9) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE IF NOT EXISTS `mailinglist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `regno` varchar(9) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `speaker` varchar(100) NOT NULL DEFAULT 'N/A',
  `venue` varchar(20) NOT NULL DEFAULT 'N/A',
  `date` varchar(12) NOT NULL DEFAULT 'N/A',
  `time` varchar(20) NOT NULL DEFAULT 'N/A',
  `description` varchar(300) NOT NULL DEFAULT 'N/A',
  `poster` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  `rating` decimal(3,2) NOT NULL DEFAULT '0.00',
  `totalratings` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `Title`, `speaker`, `venue`, `date`, `time`, `description`, `poster`, `content`, `followers`, `rating`, `totalratings`) VALUES
(1, 'Lights Camera Action', 'Rishabh Sharma', 'TT - 619', '11/09/2014', '5:45 PM - 7:15 PM', 'Unravel the secrets of film making and cinematography. Come experience the movie magic.', 'img/Lights Camera Action.png', '', 1, '4.50', 2),
(2, 'Augmented Reality', 'Ishaan Shrivastava and Dhananjay Hariharan', ' TT - 725', '07/05/2014', '5:45 PM - 7:15 PM', 'Having taken the world by storm, the Rift is on campus! Experience the fascinating world of Augmented Reality through mindblowing devices like Oculus Rift and Leap Motion.', 'img/Augmented Reality.png', '', 1, '4.00', 1),
(3, 'Computer Vision', 'Madhav and Nitesh', 'TT - 302', '25/04/2014', '5:45 PM - 7:15 PM', 'Delve into the world of OpenCV and learn its applications in Microsoft Visual Studio!', 'img/Computer Vision.png', '', 1, '4.00', 1),
(4, 'SQL Injection', 'Nilesh Sah', 'TT - 504', '27/03/2014', '5:45 PM - 7:15 PM', 'Learn all about Structured Query Language', 'img/SQL Injection.png', '', 1, '5.00', 2),
(5, 'Windows Application Development', 'Yash Vijay and Deepak Kumar Yadav', 'TT - 504', '20/03/2014', '5:45 PM - 7:15 PM', 'Love using windows apps? Learn the basics of app development and your very own app!', 'img/Windows Application Development.png', '', 2, '4.50', 2),
(6, 'Cyber Security - Hacking Tricks', 'Kunal Vasavada', 'TT - 304', '22/01/2015', '6:00 PM - 7:15 PM', 'Familiarize yourself with the technical details and learn the simple tools. Take your first step into the vast realm.', 'img/Cyber Security - Hacking Tricks.png', '', 3, '4.75', 4),
(7, 'Cyber Security - Advanced', 'Kunal Vasavada', 'TT - 205', '30/01/2015', '6:00 PM - 7:15 PM', 'Learn more advanced concepts including SQL injection, XSS attacks along with live demonstrations!', 'img/Cyber Security - Advanced.png', '', 3, '4.80', 5),
(8, 'Photoshop 101', 'Sarthak Tiwari, Arpita Dhir & Ankita Singh', 'Ambedkar Auditorium', '12/02/2015', '6:00 P.M - 7:30 P.M', 'Techloop''s back with a session designed just for you! Enter the vast realm of design starting from the basics of Photoshop while also getting in sync with the required design ethics.', 'img/Photoshop 101.png', '', 4, '3.90', 10),
(9, 'Android App Development', 'Gaurav Agerwala, Hemant Jain, Vatsalya Ahuja', 'Ambedkar Auditorium', '13/03/2015', '6:00 P.M - 7.30 P.M', ' Come explore a world of possibilities with Android. Starting from the technical basics,learn the secrets that make an Android App Developer stand out of the crowd\r\n', 'img/Android App Development.png', 'files/Android App Development.pdf', 4, '4.75', 4),
(10, 'Analog Electronics', 'Anmol Saxena', 'TT - 619', '19/02/2015', '6:00 P.M - 7.30 P.M', 'The session will be based upon the basic concepts of analog electronics. Starting from the basics of operation amplifiers,555 timers to designing your own models and projects.', 'img/Analog Electronics.png', 'files/Analog Electronics.pptx', 0, '5.00', 2),
(11, 'UI and Material Designing', 'Vishal Pisharoti', 'TT - 725', '16/04/2015', '6:00 P.M - 7.30 P.M', 'Techloop is here with yet another session designed just for you!\r\nTweak User Interface to your advantage by making your designs stand out!\r\n', 'img/UI and Material Designing.png', '', 1, '0.00', 0),
(12, 'Digital Advertising', 'Apoorva Joshi', 'TT 725', '21/04/2015', '6 - 7:30 PM', 'Want to know how you can become a google student ambassador? This session is just for you!\r\nAlsoi realise the importance and expanse of online advertising in today''s digital world, especially using Google Adwords.', 'img/Digital Advertising.jpg', '', 0, '0.00', 0),
(13, 'Math Addict', 'Pranshu Poddar', 'TT 619', '30/04/2015', '6 - 7:30 PM', 'Experience an interactive session on problem solving strategies for tough logic and mathematical questions. Realise the depth of Number theory, pattern and its applications in real life.', 'img/Math Addict.jpg', '', 0, '0.00', 0),
(14, 'Essential of Security', 'Kunal Vasavada', 'TT 630', '11/09/2015', '6 - 7:30 PM', 'Scratch the surface of the astounding realm of Cyber Security. Learn core concepts from how the internet actually works to Firewall basics and Live demonstrations of Web exploits!', 'img/Essential of Security.jpg', '', 0, '0.00', 0),
(15, '3DSMAX', 'Sahir Sharma', 'TT 305', '16/10/2015', '6 - 7:30 PM', 'From an idea to a concept. This techloop session, get engaged with 3DS Max and explore the world of 3D modelling.', 'img/3DSMAX.jpg', '', 0, '0.00', 0),
(16, 'Introduction to Arduino', 'Kunwar Agarwal, Hari Charan', 'TT 302', '13/01/2016', '6 - 7:30 PM', 'Your journey from an idea to a project. Step into the world of hardware technology.', 'img/Introduction to Arduino.jpg', '', 0, '0.00', 0),
(17, 'Essentials of Game Dev', 'Sahil Singh, Yash Chhabria, Pranay Peddiraju', 'TT 205', '20/01/2016', '6 - 7:30 PM', 'Step into the world of Game Development. Learn the tips and tricks from the grassroot level.', 'img/Essentials of Game Dev.jpg', '', 0, '0.00', 0),
(18, 'Writing a Research Paper 101', 'Pranshu Poddar, Shyam Srinivasan', 'TT 312', '10/02/2016', '6 - 7:30 PM', 'If it''s your first time writing a research paper, it may seem daunting, but you need not worry because we have yet another session of techloop that will give an insight into writing a research paper.', 'img/Writing a Research Paper 101.jpg', '', 0, '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `speakerdetails`
--

CREATE TABLE IF NOT EXISTS `speakerdetails` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `RegNo` varchar(9) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Expertise` varchar(50) NOT NULL,
  `Other` varchar(100) NOT NULL,
  `Topic` varchar(50) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Experience` varchar(100) NOT NULL,
  `Projects` varchar(100) NOT NULL,
  `Links` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
