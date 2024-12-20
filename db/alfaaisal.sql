-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 06:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfaaisal`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` int(11) NOT NULL,
  `store_id` varchar(10) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `get_link` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barcodes`
--

INSERT INTO `barcodes` (`id`, `store_id`, `barcode`, `link`, `get_link`, `create_at`) VALUES
(1, '1', 'QRimages/17347097475792.png', 'https://alfaaisal.com/register.php?id=5792', '5792', '2024-12-20 15:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `is_used` varchar(10) NOT NULL DEFAULT '0',
  `is_blocked` varchar(10) NOT NULL DEFAULT '0',
  `store_id` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `is_used`, `is_blocked`, `store_id`, `created_at`) VALUES
(1, 'b48d6a3509', '0', '1', '1', '2024-12-20 17:17:37'),
(2, '5a46cd4743', '0', '1', '1', '2024-12-20 17:17:37'),
(3, '41c204f358', '0', '1', '1', '2024-12-20 17:17:37'),
(4, '26d2cdf206', '0', '0', '1', '2024-12-20 16:50:11'),
(5, '43945a7cb0', '0', '0', '3', '2024-12-20 16:51:43'),
(6, '2bc0e14bab', '0', '0', '3', '2024-12-20 16:51:43'),
(7, 'c0e52fa6ce', '0', '0', '3', '2024-12-20 16:51:43'),
(8, 'e03c1256f9', '0', '0', '3', '2024-12-20 16:51:43'),
(9, '5b2da02d42', '0', '0', '0', '2024-12-20 16:07:51'),
(10, 'bc28b4c5f5', '0', '0', '0', '2024-12-20 16:07:51'),
(11, 'e96f6e6003', '0', '0', '0', '2024-12-20 17:22:27'),
(12, '84eee14d70', '0', '0', '0', '2024-12-20 17:22:27'),
(13, '581802093c', '0', '0', '0', '2024-12-20 17:22:27'),
(14, '96888093a0', '0', '0', '0', '2024-12-20 17:22:27'),
(15, '640def8815', '0', '0', '0', '2024-12-20 17:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `coupon` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `country`, `region`, `phone`, `status`, `created_at`) VALUES
(1, 'Ù…ØªØ¬Ø± Ø§Ø­Ù…Ø¯', 'Ù…ØµØ±', 'Ø§Ù„Ø§Ø³ÙƒÙ†Ø¯Ø±ÙŠÙ‡', '09123', '1', '2024-12-20 15:41:20'),
(3, 'Ù…ØªØ¬Ø± Ù…Ø­Ù…Ø¯', 'Ù…ØµØ±', 'Ø§Ù„Ù‚Ø§Ù‡Ø±Ø©', '098460', '1', '2024-12-20 16:50:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `get_link` (`get_link`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
