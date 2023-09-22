-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2023 at 05:18 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u195164611_winger`
--

-- --------------------------------------------------------

--
-- Table structure for table `pan_history`
--

CREATE TABLE `pan_history` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_name` varchar(50) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `id_image` varchar(100) NOT NULL,
  `id_image_back` varchar(300) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Request',
  `entry_date` datetime NOT NULL,
  `reply_date` datetime NOT NULL,
  `reason` text NOT NULL,
  `remark` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pan_history`
--

INSERT INTO `pan_history` (`id`, `username`, `id_name`, `id_no`, `id_image`, `id_image_back`, `status`, `entry_date`, `reply_date`, `reason`, `remark`) VALUES
(1, 'WIN1001', '', '4444444444', '2ef2599e251aefdd2f3091a1772dcdd5.jpg', NULL, 'Accepted', '2023-06-14 13:07:37', '2023-06-14 13:07:53', '', ''),
(2, 'WIN1001', '', '4444444444', '3e1696fe9461a907235e2f9703726c6d.jpg', NULL, 'Accepted', '2023-06-14 13:08:15', '2023-06-14 13:08:21', '', ''),
(3, 'WIN1001', '', '222222', 'e75cc975f4fcaaa504d44deb4ac498ce.jpg', NULL, 'Rejected', '2023-06-14 13:14:43', '2023-06-14 13:15:02', 'gfgfgfg', 'KYC Reject'),
(4, 'WIN1001', '', '22222222', 'c17131ffc465d4ef86a0220317c6a18b.jpg', NULL, 'Rejected', '2023-06-14 13:39:32', '2023-06-14 13:40:42', 'rrrrrrr', 'KYC Reject'),
(5, 'WING91372', '', 'HHHH89BBBB', 'b58238dca03dc4a7c312270f1c16a119.jpeg', NULL, 'Rejected', '2023-06-14 13:58:50', '2023-06-14 13:59:10', '', 'KYC Reject'),
(6, 'WING10964', '', 'EFLPS1304M', '25a426a0fa00e25bbb4c1027560a69de.jpg', NULL, 'Accepted', '2023-06-14 14:03:07', '2023-06-14 14:03:26', '', ''),
(7, 'WING55784', '', 'APZPK9257P', 'b0acb4bb7af328fc7836a01bac82b7b4.jpg', NULL, 'Accepted', '2023-06-14 14:23:32', '2023-06-14 14:25:19', '', ''),
(8, 'WING50954', '', 'AZSPM8850H', '0670e82e5ce5efcf838f664230c1a902.jpg', NULL, 'Accepted', '2023-06-14 14:29:56', '2023-06-14 14:30:30', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pan_history`
--
ALTER TABLE `pan_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pan_history`
--
ALTER TABLE `pan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
