-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bujobud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `profession` varchar(128) DEFAULT NULL,
  `dob` varchar(128) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `bio` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `image`, `profession`, `dob`, `sex`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Shuvashish Paul Sagar', 'shuvashishpaul64@gmail.com', '$2y$10$T0ed09LiQst89ydiLiAtTOs4G5KST468rk6ZCU.rEuRyQi/KBJ6fq', 'uploads/101437821_3002817753135502_1284384423403323392_o.jpg', NULL, NULL, NULL, NULL, '2020-08-08 20:29:40', NULL),
(2, 'Sahara Sultana', 'sahara@gmail.com', '$2y$10$ZQp0g9Uh4.WSeCiYha6rjed3Gtmgn5eSmh25x3./vS9WMyKv.Fosq', 'uploads/107766144_2735437629890770_443377130132561580_n.jpg', NULL, NULL, NULL, NULL, '2020-08-09 18:17:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
