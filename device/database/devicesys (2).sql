-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 01:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devicesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `device_name` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `type`, `device_name`, `status`) VALUES
(5, 'accessories', 'Keyboard', 'requested'),
(6, 'desktop', 'ASUS', 'available'),
(7, 'mobile', 'Iphone', 'requested'),
(9, 'laptop', 'Dell', 'available'),
(10, 'desktop', 'HP', 'available'),
(11, 'laptop', 'Mac', 'available'),
(12, 'mobile', 'Samsung ', 'available'),
(13, 'accessories', 'mouse', 'available'),
(14, 'desktop', 'Mac mini', 'available'),
(15, 'mobile', 'test', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `device_record`
--

CREATE TABLE `device_record` (
  `id` int(250) NOT NULL,
  `device_id` int(250) NOT NULL,
  `request_time` datetime NOT NULL,
  `assigned_time` datetime NOT NULL,
  `return_time` datetime NOT NULL,
  `reject_time` datetime NOT NULL,
  `emp_id` int(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_record`
--

INSERT INTO `device_record` (`id`, `device_id`, `request_time`, `assigned_time`, `return_time`, `reject_time`, `emp_id`, `status`) VALUES
(1, 5, '2022-10-13 15:15:54', '2022-10-19 14:30:18', '2022-10-19 14:47:36', '0000-00-00 00:00:00', 1, 'returned'),
(2, 5, '2022-10-13 15:30:22', '2022-10-17 11:18:24', '2022-10-17 16:27:50', '0000-00-00 00:00:00', 1, 'returned'),
(3, 5, '2022-10-13 15:34:30', '2022-10-21 17:28:19', '2022-10-31 11:03:38', '2022-10-17 11:27:43', 1, 'returned'),
(4, 6, '2022-10-13 15:39:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-17 11:30:00', 1, 'rejected'),
(6, 5, '2022-10-13 15:39:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-17 11:32:49', 1, 'rejected'),
(7, 5, '2022-10-13 15:39:55', '2022-10-17 11:33:10', '2022-10-18 11:13:29', '0000-00-00 00:00:00', 1, 'returned'),
(8, 5, '2022-10-13 15:40:04', '2022-10-17 16:26:26', '2022-10-18 11:13:31', '2022-10-19 15:03:01', 1, 'rejected'),
(9, 5, '2022-10-13 15:40:11', '2022-10-18 10:38:36', '2022-10-18 11:13:32', '0000-00-00 00:00:00', 1, 'returned'),
(10, 5, '2022-10-13 15:40:20', '2022-10-19 14:30:46', '2022-10-19 14:31:00', '0000-00-00 00:00:00', 1, 'returned'),
(11, 5, '2022-10-13 15:40:28', '2022-10-21 18:15:07', '2022-10-31 11:03:21', '0000-00-00 00:00:00', 1, 'returned'),
(12, 6, '2022-10-13 15:43:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-19 13:07:46', 1, 'rejected'),
(13, 5, '2022-10-13 15:52:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-19 15:03:20', 1, 'rejected'),
(14, 5, '2022-10-13 17:36:06', '2022-11-09 15:51:47', '2022-11-09 15:36:43', '2022-11-09 15:52:19', 4, 'rejected'),
(15, 6, '2022-10-13 17:53:13', '2022-10-18 11:57:38', '2022-10-31 11:02:47', '0000-00-00 00:00:00', 4, 'returned'),
(16, 6, '2022-10-17 11:44:28', '2022-10-17 15:16:53', '2022-10-18 11:13:34', '0000-00-00 00:00:00', 1, 'returned'),
(17, 7, '2022-10-18 09:47:43', '2022-10-18 10:39:20', '2022-10-31 11:02:32', '0000-00-00 00:00:00', 1, 'returned'),
(18, 6, '2022-10-18 11:13:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-18 11:57:43', 1, 'rejected'),
(19, 11, '2022-10-19 15:14:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-31 11:02:23', 1, 'rejected'),
(20, 7, '2022-10-21 18:29:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-21 18:30:52', 1, 'rejected'),
(23, 7, '2022-10-31 10:31:33', '2022-10-31 11:02:05', '2022-10-31 11:02:18', '0000-00-00 00:00:00', 1, 'returned'),
(24, 10, '2022-10-31 10:54:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-10-31 11:01:25', 1, 'rejected'),
(25, 14, '2022-11-09 13:18:23', '2022-11-09 16:04:51', '2022-11-09 16:35:16', '0000-00-00 00:00:00', 1, 'returned'),
(26, 5, '2022-11-09 18:04:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'requested'),
(27, 7, '2022-11-09 18:04:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `doj` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `doj`, `password`, `role`) VALUES
(1, 'mitul', 'mitul7161@gmail.com', '1212121212', '2022-10-12', '$2y$10$QgVs.tjYVdpHX6kM7EFjV.nItp69jgJzAyxH6ePfLbmf9SmGKKSYS', 'employee'),
(2, 'admin', 'admin@gmail.com', '1111111111', '2022-10-12', '$2y$10$tPqAADIoT.r9mcpVC9AEG.g.0bhrhCd6WqGoA/AaTU9IXJUo41sPy', 'admin'),
(3, 'mitul', 'mitul7161@gmail.com', '9909938387', '2022-10-13', '$2y$10$QgVs.tjYVdpHX6kM7EFjV.nItp69jgJzAyxH6ePfLbmf9SmGKKSYS', 'admin'),
(4, 'test', 'test@gmail.com', '2222222222', '2022-10-13', '$2y$10$GpxN4wfCGSqD9QCcZWtsX.5w1T9aFM4VJ3kZiI2DDDXM2PmQQ5KBC', 'employee'),
(8, 'Hello', 'hello@gmail.com', '1231231231', '2022-11-09', '$2y$10$wcuxoAJsp5gU3KpGYjD89..s8ry1h0.b2/OJgjzu5J2FPu0YL6xH6', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_record`
--
ALTER TABLE `device_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `device_record`
--
ALTER TABLE `device_record`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device_record`
--
ALTER TABLE `device_record`
  ADD CONSTRAINT `device_record_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `device_record_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
