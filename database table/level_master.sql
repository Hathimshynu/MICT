-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2023 at 11:44 AM
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
-- Database: `u195164611_sam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `level_master`
--

CREATE TABLE `level_master` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `percentage` float(15,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_master`
--

INSERT INTO `level_master` (`id`, `level`, `percentage`, `status`, `entry_date`) VALUES
(1, 'Level 1', 10.00, 'Inactive', '2023-08-01 10:54:41'),
(2, 'Level 2', 5.00, 'Inactive', '2023-08-01 10:54:41'),
(3, 'Level 3', 5.00, 'Inactive', '2023-08-01 10:54:41'),
(4, 'Level 4', 1.00, 'Inactive', '2023-08-01 10:54:41'),
(5, 'Level 1', 0.20, 'Inactive', '2023-08-04 16:39:24'),
(6, 'Level 2', 0.10, 'Inactive', '2023-08-04 16:39:24'),
(7, 'Level 1', 0.30, 'Active', '2023-08-04 16:47:59'),
(8, 'Level 2', 0.20, 'Active', '2023-08-04 16:47:59'),
(9, 'Level 3', 0.10, 'Active', '2023-08-04 16:47:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level_master`
--
ALTER TABLE `level_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level_master`
--
ALTER TABLE `level_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
