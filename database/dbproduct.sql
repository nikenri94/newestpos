-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 05:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_cust` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `location` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_cust`, `firstname`, `lastname`, `sex`, `email`, `phone`, `location`, `created_at`, `updated_at`) VALUES
(10, 'niken', 'nikena', 'Female', 'nikenweasley@yahoo.com', '0987653', 'bandung', '2018-01-30 05:30:21', '2018-01-30 05:30:21'),
(11, 'nikenknekf', 'knfkwhefiwhr', 'Female', 'nikenweasley@yahoo.com', '09876543', 'sjdgjhg', '2018-01-30 05:31:03', '2018-01-30 05:31:03'),
(12, 'kieiie', 'jshdjds', 'Male', 'nikenweasley@yahoo.com', '09782378', 'jdf', '2018-01-30 05:34:04', '2018-01-30 05:34:04'),
(13, 'oio', 'oioi', 'Male', 'r', '0', 'h', '2018-01-30 05:35:18', '2018-01-30 05:35:18'),
(14, 'ahf', 'dfs', 'Female', 'admin@gmail.com', '09988', 'jhafja', '2018-01-30 07:56:05', '2018-01-30 07:56:05'),
(15, 'akhir', 'ter', 'Female', 'admin@gmail.com', '029039048', 'bandung', '2018-01-30 08:32:54', '2018-01-30 08:32:54'),
(16, 'nn', 'nnn', 'Female', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 03:38:46', '2018-01-31 03:38:46'),
(17, 'nn', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 07:41:19', '2018-01-31 07:41:19'),
(18, 'rrr', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 07:42:51', '2018-01-31 07:42:51'),
(19, 'nn', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 07:57:50', '2018-01-31 07:57:50'),
(20, 'nn', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 07:59:38', '2018-01-31 07:59:38'),
(21, 'nn', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'hjhjh', '2018-01-31 08:01:01', '2018-01-31 08:01:01'),
(22, 'nn', 'nnn', 'Male', 'nodamopic@muimail.com', '98989', 'cimahi', '2018-01-31 08:02:13', '2018-01-31 08:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `qty` int(5) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `dis` int(3) DEFAULT NULL,
  `type_id` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `qty`, `price`, `dis`, `type_id`, `created_at`, `updated_at`) VALUES
(3, 'semen', 1000, 80, 0, '1', '2018-02-01 10:45:18', '0000-00-00 00:00:00'),
(4, 'pasir', 1000, 20, 0, '2', '2018-02-01 10:45:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `dis` decimal(10,0) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `cus_id`, `pro_id`, `qty`, `price`, `dis`, `amount`, `created_at`, `updated_at`) VALUES
(4, 11, 4, 80, 20, '0', 1600, '2018-01-30 12:31:03', '2018-01-30 12:31:03'),
(5, 13, 3, 900, 80, '0', 72000, '2018-01-30 12:35:19', '2018-01-30 12:35:19'),
(6, 14, 4, 5, 20, '0', 100, '2018-01-30 14:56:06', '2018-01-30 14:56:06'),
(7, 14, 3, 90, 80, '0', 7200, '2018-01-30 14:56:06', '2018-01-30 14:56:06'),
(8, 15, 3, 90, 80, '0', 7200, '2018-01-30 15:32:54', '2018-01-30 15:32:54'),
(9, 15, 4, 900, 20, '0', 18000, '2018-01-30 15:32:54', '2018-01-30 15:32:54'),
(10, 16, 1, 3, 2000, '4', 5760, '2018-01-31 10:38:46', '2018-01-31 10:38:46'),
(11, 17, 3, 1, 80, '7', 74.4, '2018-01-31 14:41:19', '2018-01-31 14:41:19'),
(13, 20, 4, 1, 20, '1', 19.8, '2018-01-31 14:59:38', '2018-01-31 14:59:38'),
(14, 21, 3, 1, 80, '1', 79.2, '2018-01-31 15:01:01', '2018-01-31 15:01:01'),
(15, 21, 4, 3, 20, '1', 59.4, '2018-01-31 15:01:01', '2018-01-31 15:01:01'),
(16, 22, 3, 1, 80, '1', 79.2, '2018-01-31 15:02:13', '2018-01-31 15:02:13'),
(17, 22, 4, 1, 20, '1', 19.8, '2018-01-31 15:02:13', '2018-01-31 15:02:13');

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `TG_STOCKUPDATE` AFTER INSERT ON `sales` FOR EACH ROW BEGIN
UPDATE products SET qty = qty - NEW.qty
WHERE products.id = NEW.pro_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'semen', '2018-02-01 10:52:16', '2018-02-01 10:52:16'),
(2, 'pasir', '2018-02-01 10:52:16', '2018-02-01 10:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name_unit` varchar(10) NOT NULL,
  `type_id` varchar(10) NOT NULL,
  `conversi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name_unit`, `type_id`, `conversi`, `created_at`, `updated_at`) VALUES
(1, 'kg', '1', 1, '2018-02-01 10:57:04', '2018-02-01 10:57:04'),
(2, 'sak', '1', 50, '2018-02-01 10:57:04', '2018-02-01 10:57:04'),
(3, 'do', '1', 800, '2018-02-01 10:58:08', '2018-02-01 10:58:08'),
(4, 'karung', '2', 1, '2018-02-01 10:58:08', '2018-02-01 10:58:08'),
(5, 'kol', '2', 13, '2018-02-01 10:58:44', '2018-02-01 10:58:44'),
(6, 'truck', '2', 104, '2018-02-01 10:58:44', '2018-02-01 10:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
