-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2015 at 07:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techloop`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(5) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'techloop_admin', '$2y$10$xFwik2fcnCI1aNSoqIQ7GuP0vSM0CmdSx6XisllUq0dTeifnj3I0C');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` smallint(6) NOT NULL,
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
  `totalratings` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
(10, 'Analog Electronics', 'Anmol Saxena', 'TT - 619', '19/02/2015', '6:00 P.M - 7.30 P.M', 'The session will be based upon the basic concepts of analog electronics. Starting from the basics of operation amplifiers,555 timers to designing your own models and projects.', 'img/Analog Electronics.png', 'files/Analog Electronics.pptx', 0, '5.00', 1),
(11, 'UI and Material Designing', 'Vishal Pisharoti', 'TT - 725', '16/04/2015', '6:00 P.M - 7.30 P.M', 'Techloop is here with yet another session designed just for you!\r\nTweak User Interface to your advantage by making your designs stand out!\r\n', 'img/UI and Material Designing.png', '', 0, '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `speakerdetails`
--

CREATE TABLE IF NOT EXISTS `speakerdetails` (
  `id` smallint(6) NOT NULL,
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
  `Links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribedusers`
--

CREATE TABLE IF NOT EXISTS `subscribedusers` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `verificationid` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakerdetails`
--
ALTER TABLE `speakerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribedusers`
--
ALTER TABLE `subscribedusers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `verificationid` (`verificationid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `speakerdetails`
--
ALTER TABLE `speakerdetails`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribedusers`
--
ALTER TABLE `subscribedusers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
