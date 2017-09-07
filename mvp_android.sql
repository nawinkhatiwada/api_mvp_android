-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2017 at 03:22 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2040020_mvp_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `recent_tags`
--

CREATE TABLE `recent_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_tags`
--

INSERT INTO `recent_tags` (`id`, `title`, `description`) VALUES
(1, 'Android', 'Description is the pattern of\r\ndevelopment that presents a\r\nword picture of a thing, a\r\nperson, a situation, or a\r\nseries of events.'),
(2, 'Android_Annotation', 'Description is the pattern of\r\ndevelopment that presents a\r\nword picture of a thing, a\r\nperson, a situation, or a\r\nseries of events.'),
(3, 'github', 'Description is the pattern of\r\ndevelopment that presents a\r\nword picture of a thing, a\r\nperson, a situation, or a\r\nseries of events.'),
(8, 'Android MVP', 'MVp android Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`) VALUES
(1, 'mvp_android', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recent_tags`
--
ALTER TABLE `recent_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recent_tags`
--
ALTER TABLE `recent_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
