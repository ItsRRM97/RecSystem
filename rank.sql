-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 12:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rank`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `coursename` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `link` varchar(80) NOT NULL,
  `user_rating` float NOT NULL,
  `user_rate_sum` int(100) NOT NULL,
  `our_rating` float NOT NULL,
  `total_people` int(20) NOT NULL,
  `free` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`coursename`, `code`, `link`, `user_rating`, `user_rate_sum`, `our_rating`, `total_people`, `free`) VALUES
('Introduction to Programming with Python', '101', 'https://alison.com/course/introduction-to-programming-with-python', 5, 5, 3.5, 1, 'yes'),
('Learn Python', '102', 'https://www.codecademy.com/learn/learn-python', 0, 0, 4, 0, 'yes'),
('Java Programming Language', '201', 'https://www.geeksforgeeks.org/java/', 0, 0, 4.8, 0, 'yes'),
('Java courses', '202', 'https://www.edx.org/course/subject/computer-science/java', 0, 0, 4, 0, 'No'),
('Java Tutorials For Complete Beginners', '203', 'https://www.udemy.com/java-tutorial/', 0, 0, 4.5, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `email`) VALUES
('Rahul', 'rahul1', 'rahul', 'rahul111@gmail.com'),
('Sia', 'sia2', 'sia', 'sia8@yahoo.com'),
('Hamsika Rammohan', 'hamsika02', 'hhkkh', 'hamsikarammohan@gmail.com'),
('Roe', 'doe', 'doe', 'hamsi@yahoo.com'),
('', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
