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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `doj` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `doj`, `dob`, `email`, `address`, `phone`, `image`, `status`) VALUES
(113, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(114, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(115, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(116, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(117, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(118, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(119, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(120, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(121, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(122, 'hello', 'hello', '2022-09-30', '2022-09-30', 'hello@gmail.com', 'hello', '0810283102', 'mitul.png', 'inactive'),
(123, 'hello', 'hello', '', '', '12', '121', '12', '', ''),
(124, 'mitul', 'parmar', '2022-10-10', '2003-01-01', 'mitul7161@gmail.com', 'ahmedabad', '9909935387', 'smart attendance final.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` int(250) NOT NULL,
  `age` text NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `profile` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `contact`, `age`, `address`, `gender`, `profile`, `date`, `time`) VALUES
(58, 'mitul', 'mitul7161@gmail.com', 1313131313, 'under_18', 'axacxadsx z', 'Male', 'IMG-20220708-WA0012.jpg', '2022-09-17', '20:37'),
(59, 'mitul', 'mitul7163@gmail.com', 1313131313, 'under_18', 'axacxadsx z', 'Male', 'IMG-20220708-WA0012.jpg', '2022-09-17', '20:37'),
(60, 'mitul', 'mitul7163@gmail.com', 1313131313, 'under_18', 'axacxadsx z', 'Male', 'IMG-20220708-WA0012.jpg', '2022-09-17', '20:37'),
(61, 'mitul', 'mitul711@gmail.com', 1313131331, 'under_18', 'dvhffdvbcvcc', 'Male', 'default.png', '2022-09-10', '21:46'),
(62, 'adadad', 'mitul7171@gmail.com', 1313131313, 'under_18', 'vdbfhdsvdb', 'Male', 'mitul.png', '2022-09-08', '21:43');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`) VALUES
(33, 'imageupload', 'hello123@gmail.com', '$2y$10$3oiajTiWLWMVY3y8kzJUxOzK4akpdkfr19.APxa3qfna6AwjPCxIS', ''),
(34, 'nodata', 'nodata@gmail.com', '$2y$10$EHtz6rKq0CsAIMzGaSqz6OYhlS/73gZ2sX7kcVLDq6hyRRAmZ/Wjm', ''),
(36, 'mitul', 'mitul7161@gmail.com', '$2y$10$fXi94AO9Mg5l91XHjSzx.OViYZdu4cq03EbV2foPDU0ykbj8OZPbm', ''),
(37, 'mitul', 'mitul7160@gmail.com', '$2y$10$fm27s5rttxcwc.CewHPsM.aKYlYCjpkcr3ivuVGb9qZhp3QbKfSdO', ''),
(38, 'mitul', 'mitul1@gmail.com', '$2y$10$cAC.7QPmKsWbB8ejPNOXIOvN7j5WqGw0IhgCFT/vunSdqm9j7kKI2', ''),
(39, 'hello', 'hello123@gmail.com', '$2y$10$v9rvilMRm2lYYT5r/cCMx..vsjPuhLlAKEf8v5RtU5rHWEhzHPAlG', ''),
(40, 'nodata', 'nodata@gmail.com', '$2y$10$iiq4eoJ/NpD/l2uBhCeKheyqj8kw5S5hqnGqNamzmXEynrWQkMlRe', ''),
(42, 'mitul', 'mitul7161@gmail.com', '$2y$10$fXi94AO9Mg5l91XHjSzx.OViYZdu4cq03EbV2foPDU0ykbj8OZPbm', ''),
(43, 'mitul', 'mitul7160@gmail.com', '$2y$10$fm27s5rttxcwc.CewHPsM.aKYlYCjpkcr3ivuVGb9qZhp3QbKfSdO', ''),
(44, 'mitul', 'mitul1@gmail.com', '$2y$10$T.R6NYfst10nzwnCkLjPQeBfRN0/0QRzBXPx2vGJruDvwbNyKdGqO', ''),
(45, 'hello', 'hello123@gmail.com', '$2y$10$v9rvilMRm2lYYT5r/cCMx..vsjPuhLlAKEf8v5RtU5rHWEhzHPAlG', ''),
(46, 'nodata', 'nodata@gmail.com', '$2y$10$iiq4eoJ/NpD/l2uBhCeKheyqj8kw5S5hqnGqNamzmXEynrWQkMlRe', ''),
(48, 'mitul', 'mitul7161@gmail.com', '$2y$10$fXi94AO9Mg5l91XHjSzx.OViYZdu4cq03EbV2foPDU0ykbj8OZPbm', ''),
(49, 'mitul', 'mitul7160@gmail.com', '$2y$10$fm27s5rttxcwc.CewHPsM.aKYlYCjpkcr3ivuVGb9qZhp3QbKfSdO', ''),
(50, 'mitul', 'mitul1@gmail.com', '$2y$10$cAC.7QPmKsWbB8ejPNOXIOvN7j5WqGw0IhgCFT/vunSdqm9j7kKI2', ''),
(51, 'hello', 'hello123@gmail.com', '$2y$10$v9rvilMRm2lYYT5r/cCMx..vsjPuhLlAKEf8v5RtU5rHWEhzHPAlG', ''),
(52, 'nodata', 'nodata@gmail.com', '$2y$10$iiq4eoJ/NpD/l2uBhCeKheyqj8kw5S5hqnGqNamzmXEynrWQkMlRe', ''),
(53, 'ada', 'ada@gmail.com', '$2y$10$i9dXXEpOk8szAt392/OZfuyAl.FM/ZaPv2i/KyaKwr6stmTdgprCO', ''),
(54, 'abcdefghi', 'mitul7112@gmail.com', '$2y$10$6iVugw/Co3yvk5DHIjhcSulsHMUtEK8O3YvS3THlXUbdNWJjpqfIm', ''),
(66, 'mitul7162', 'mitul7162@gmail.com', '$2y$10$fLARb.AE7HuntaQmDWTAUevWdc.1mfqd.0V5AI4h5Xu1OuMVsg5BG', ''),
(67, 'admin', 'admin@gmail.com', '$2y$10$0dR0TbqfzacHssxm9GBbZeZm1tp9Ea.Ood6IMyQ/LoZL76mSb8InK', 'admin'),
(68, 'user', 'user@gmail.com', '$2y$10$Bx.7sKIUyAtT2hKKzXZwnev2gxUOW9A7NN57Z7wBSV700FTfDP14C', 'user'),
(69, 'abcd', 'abcd@gmail.com', '$2y$10$Fo7KerjwRG7odLHKvT2wYOEMpdgt01SLtS/IhXkfbCD3mCwvlU5Fm', 'admin'),
(70, 'abcd', 'abcd@gmail.com', '$2y$10$CUWZGeF0g86ORPJDtnwmcuvtEOgH67B40Pj9KubNogAU/nP6sn0pa', 'admin'),
(71, 'abcd', 'abcd@gmail.com', '$2y$10$Qnl3zfz.zoeD3E3Kgb7.he3hJhCpcEHVKRF70BqQX1EW.iqSLonhC', 'admin'),
(72, 'abcd', 'abcd@gmail.com', '$2y$10$l5haPKJW2T/PxvKGmfQ0F.mXNKQFDz/VQ7NvF4T9oi2yq.plTWrna', 'admin'),
(73, 'abcd', 'abcd@gmail.com', '$2y$10$1jVNavnpI7e3NpdPXpSbdOW0KLOEZAPyXYnEONoyKWoDB.hFGegde', 'admin'),
(74, 'pqr', 'pqr@gmail.com', '$2y$10$svaCjJ5SwcpXUIVER8.g..MPDKD3pUAMd4ECFjPoihNzz4UuSw632', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userimages`
--

CREATE TABLE `userimages` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userimages`
--

INSERT INTO `userimages` (`id`, `userid`, `images`) VALUES
(5, 33, '192341.jpg'),
(6, 53, '192341.jpg'),
(7, 53, '192341.jpg'),
(8, 34, '192341.jpg'),
(9, 66, '192341.jpg'),
(10, 66, 'default.png'),
(17, 67, 'default.png'),
(18, 67, '192341.jpg'),
(22, 69, '192341.jpg'),
(23, 74, '192341.jpg'),
(24, 33, '192341.jpg'),
(25, 33, '192341.jpg'),
(26, 33, '192341.jpg'),
(27, 33, '192341.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userimages`
--
ALTER TABLE `userimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `userimages`
--
ALTER TABLE `userimages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userimages`
--
ALTER TABLE `userimages`
  ADD CONSTRAINT `userimages_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
