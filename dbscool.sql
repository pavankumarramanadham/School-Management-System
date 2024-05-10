-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 11:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbscool`
--

-- --------------------------------------------------------

--
-- Table structure for table `acount`
--

CREATE TABLE IF NOT EXISTS `acount` (
`id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `statu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acount`
--

INSERT INTO `acount` (`id`, `user`, `password`, `statu`) VALUES
(8, 'kasem@gmail.com', '123123', 'admin'),
(9, 'reem@gmail.com', '123123', 'tetcher'),
(10, 'alaa@gmail.com', '123123', 'tetcher'),
(11, 'ahmad@gmail.com', '123123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `active_table`
--

CREATE TABLE IF NOT EXISTS `active_table` (
  `tetcher` varchar(70) NOT NULL,
  `address` varchar(70) NOT NULL,
  `active` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `datareq` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `active_table`
--

INSERT INTO `active_table` (`tetcher`, `address`, `active`, `date`, `datareq`) VALUES
('reem', 'Ù‚Ø±Ø§Ø¡Ø© ÙˆØªØ¹Ù„Ù… Ø§Ù„Ù†Ø·Ù‚ Ø§Ù„ØµØ­ÙŠØ­ Ù„Ù„Ø§Ø­Ø±Ù', 'Ø§Ù„ØµÙØ­Ø© 18 Ø­Ù„ Ù…Ø³Ø§Ø¦Ù„', '2022/01/28', '2022-01-29'),
('reem', 'Ø¬Ø¯ÙˆÙ„ Ø§Ù„Ø¶Ø±Ø¨', 'Ø§Ù„ØµÙØ­Ø© 10 Ø­Ù„ Ù…Ø³Ø§Ø¦Ù„', '2022/01/28', '2022-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `mother` varchar(25) NOT NULL,
  `father` varchar(25) NOT NULL,
  `birth` varchar(25) NOT NULL,
  `place` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone1` int(25) NOT NULL,
  `phone2` int(25) NOT NULL,
  `image` varchar(40) NOT NULL,
  `name_tetcher` varchar(25) DEFAULT NULL,
  `id` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `class` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='information student in administrator (the all information))';

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`first_name`, `last_name`, `mother`, `father`, `birth`, `place`, `location`, `phone1`, `phone2`, `image`, `name_tetcher`, `id`, `email`, `class`) VALUES
('ahmad', 'roomea', 'nada', 'mohamad', '2000/4/21', 'syria', 'kheara', 943392263, 6915232, 'up/Connor.jpg', 'reem', 2000, 'ahmad@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mark_student`
--

CREATE TABLE IF NOT EXISTS `mark_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tetcher` varchar(255) NOT NULL,
  `materials` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `materials` varchar(40) NOT NULL,
  `top` int(25) NOT NULL,
  `down` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`materials`, `top`, `down`) VALUES
('Ø§Ù„ÙÙ„Ø³ÙØ©', 100, 40),
('Ø§Ù„Ø±ÙŠØ§Ø¶ÙŠØ§Øª', 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `name_tetch` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`name_tetch`, `email`, `message`, `date`) VALUES
('reem', 'ahmad@gmail.com', 'Ø´ÙƒØ±Ø§ Ø¹Ù„Ù‰ Ø¬Ù‡ÙˆØ¯ÙƒÙ… Ø§Ù„Ù…Ø¨Ø°ÙˆÙ„Ø© ', '2022/01/28'),
('reem', 'ahmad@gmail.com', 'ÙŠØ¬Ø¨ Ø¹Ù„Ù‰ Ø£Ù‡Ù„ Ø§Ù„Ø·Ø§Ù„Ø¨ Ø§Ù„Ø­Ø¶ÙˆØ± Ø§Ù„Ù‰ Ø§Ù„Ù…Ø¯Ø±Ø³Ø© ', '2022/01/28');

-- --------------------------------------------------------

--
-- Table structure for table `message_all`
--

CREATE TABLE IF NOT EXISTS `message_all` (
  `tetchers` varchar(40) NOT NULL,
  `message_all` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message_all`
--

INSERT INTO `message_all` (`tetchers`, `message_all`, `date`) VALUES
('reem', 'Ù†Ø­Ù† Ù†Ø³Ø¹Ù‰ Ù„Ù…Ø³ØªÙ‚Ø¨Ù„ Ø£ÙØ¶Ù„ ', '2022-01-28'),
('reem', 'Ø´ÙƒØ±Ø§ Ø¹Ù„Ù‰ Ø§Ù„Ø¬Ù‡ÙˆØ¯ Ø§Ù„Ù…Ø¨Ø°ÙˆÙ„Ø© ', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `nosing`
--

CREATE TABLE IF NOT EXISTS `nosing` (
  `tetcher` varchar(40) NOT NULL,
  `nosing_num` int(25) NOT NULL,
  `id` int(25) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nosing`
--

INSERT INTO `nosing` (`tetcher`, `nosing_num`, `id`, `date`) VALUES
('reem', 1, 2000, '2022-01-28 /10:33:13/Fri'),
('reem', 1, 2000, '2022-01-28 /10:56:51/Fri');

-- --------------------------------------------------------

--
-- Table structure for table `sing`
--

CREATE TABLE IF NOT EXISTS `sing` (
  `tetcher` varchar(40) NOT NULL,
  `sing_num` int(25) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sing`
--

INSERT INTO `sing` (`tetcher`, `sing_num`, `id`) VALUES
('reem', 2, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `sing_num`
--

CREATE TABLE IF NOT EXISTS `sing_num` (
  `tetcher` varchar(40) NOT NULL,
  `sing_number` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sing_num`
--

INSERT INTO `sing_num` (`tetcher`, `sing_number`) VALUES
('reem', 5),
('alaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `view_session`
--

CREATE TABLE IF NOT EXISTS `view_session` (
  `num_session` int(40) NOT NULL,
  `tetcher` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `student_number` int(25) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `view_session`
--

INSERT INTO `view_session` (`num_session`, `tetcher`, `address`, `student_number`, `date`) VALUES
(1, 'reem', 'Ø§Ù„Ø§Ø´Ø¬Ø§Ø± Ø§Ù„Ù…Ø«Ù…Ø±Ø©', 1, '2022-01-28 /01:57:13/Fri'),
(2, 'reem', 'Ø³ÙˆØ±ÙŠØ§ Ø¨Ù„Ø¯ Ø§Ù„ØªØ§Ø±ÙŠØ®', 0, '2022-01-28 /01:57:23/Fri'),
(3, 'reem', 'damscus', 0, '2022-01-28 /10:33:13/Fri'),
(4, 'reem', 'alkswa', 1, '2022-01-28 /10:34:02/Fri'),
(5, 'reem', 'Ø³ÙˆØ±ÙŠØ§ Ø¨Ù„Ø¯ Ø§Ù„ØªØ§Ø±ÙŠØ®', 0, '2022-01-28 /10:56:51/Fri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acount`
--
ALTER TABLE `acount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
 ADD UNIQUE KEY `materials` (`materials`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acount`
--
ALTER TABLE `acount`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
