-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 07:43 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pic` varchar(500) DEFAULT NULL,
  `create_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `user_id`, `title`, `description`, `pic`, `create_date_time`, `status`) VALUES
(1, 1, 'wefiqier', 'qwertyuiopasdfghjklzxcvbnm', '', '2021-06-16 09:41:50', '0'),
(8, 1, 'SAMPLE', 'MORE SAMPLE', '', '2021-06-16 14:33:06', '0'),
(9, 1, 'wefiqier', 'qwertyuiopasdfghjklzxcvbnm', '', '2021-06-16 14:37:06', '0'),
(10, 1, 'wefiqier', 'qwertyuiopasdfghjklzxcvbnm', '', '2021-06-17 14:53:06', '0'),
(11, 9, 'qwertyui', 'waresdxgfcghvhjbuigyuftydrtdxhgv vhbhuigyuftydrtesyxfchgvhuh', '', '2021-06-18 05:02:59', '0'),
(12, 10, 'asdfghjklkmnb', 'qwertyuiookjhgfdsasxcvbnmloiuytrewsx nkiuytrfdesxcvbhjkokjhgfdewrtyhjn bvcfgb nmn ', NULL, '2021-06-18 05:02:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `create_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `phone`, `password`, `create_date_time`, `status`) VALUES
(1, 'AJ', 1234567890, 'wdfghu', '2021-06-18 05:06:10', '1'),
(2, 'Rap', 9876543210, '987654', '2021-06-16 09:40:47', '1'),
(9, 'A', 8794865468, 'qsdcvres', '2021-06-18 04:58:55', '1'),
(10, 'B', 4569231871, 'pokjhgf', '2021-06-18 04:58:55', '1'),
(11, '', 0, '', '2021-06-18 05:10:12', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
