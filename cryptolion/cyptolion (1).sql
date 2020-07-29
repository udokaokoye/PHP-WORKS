-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 10:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyptolion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'syko', 'd3cf54a006490511438b89862960bd88');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `wallet_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_activated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `wallet_address`, `wallet_name`, `amount`, `status`, `date`, `date_activated`) VALUES
(24, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '50000', 'Active', '2020-07-07 12:16:50', '2020-07-07 16:40:39'),
(25, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '5000', 'Active', '2020-07-07 12:20:28', '2020-07-07 16:40:39'),
(26, 'MTvnA4CN73ry7c65wEuTSaKzb2pNKHB4n1', 'LTH', '0.000001', 'Active', '2020-07-07 12:23:53', '2020-07-07 16:40:39'),
(28, 'MTvnA4CN73ry7c65wEuTSaKzb2pNKHB4n1', 'LTH', '5000', 'Active', '2020-07-07 16:38:38', '2020-07-07 16:40:39'),
(29, 'MTvnA4CN73ry7c65wEuTSaKzb2pNKHB4n1', 'LTH', '0.000001', 'Active', '2020-07-07 16:45:16', '2020-07-07 16:44:43'),
(30, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '0.000001', 'Active', '2020-07-07 20:43:03', '2020-07-07 20:42:31'),
(31, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '0.000001', 'Pending', '2020-07-08 09:56:12', '2020-07-08 09:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` int(11) NOT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `wallet_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `wallet_address`, `wallet_name`, `amount`, `date`) VALUES
(1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'LTC', '0.005', '2020-07-07 20:45:51'),
(2, '858', 'DODGE', '50000', '2020-07-07 20:46:12'),
(3, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '5000', '2020-07-08 07:59:33'),
(4, '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '0.78', '2020-07-08 08:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `referred` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `wallet_id` varchar(255) NOT NULL,
  `wallet_name` varchar(255) NOT NULL,
  `deposits` varchar(255) NOT NULL,
  `total_deposits` varchar(255) NOT NULL,
  `payouts` varchar(255) NOT NULL,
  `total_payouts` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `wallet_id`, `wallet_name`, `deposits`, `total_deposits`, `payouts`, `total_payouts`, `created_at`) VALUES
(248, '5f038751cd33d', '19emjx4vqHPn6ZTsh1ZNbBD7uFZFqWA5Cq', 'BTC', '0.00', '0.00', '0.00', '0.00', '2020-07-06 13:19:29'),
(249, '5f03abc998774', 'MTvnA4CN73ry7c65wEuTSaKzb2pNKHB4n1', 'LTH', '0.00', '0.00', '0.00', '0.00', '2020-07-06 15:55:05'),
(250, '5f03c9932ecd5', '0x5FD935124B534D9B6Ec45D54493A78ff7990aCb0', 'ETH', '0.00', '0.00', '0.00', '0.00', '2020-07-06 18:02:11'),
(253, '5f0401d9a5f97', '3MQ17NiA6weQ8xcfRmdGodVXCFBwez64L6', 'BTC', '0.00', '0.00', '0.00', '0.00', '2020-07-06 22:02:17'),
(254, '5f0547253451a', 'DGVr7XXxjC7ydPcyrvRXqCC7BgQJ3JmRbm', 'DODGE', '0.00', '0.00', '0.00', '0.00', '2020-07-07 21:10:13'),
(255, '5f063a8331653', 'DC6Z8vNWFX8hJqYaS4BUEYieoUv2sjKSLF', 'DODGE', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:28:35'),
(256, '5f063a8e5c6a0', '0x90B5756e213a0Cd4786D25822C3A158Ee9f681f6', 'ETH', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:28:46'),
(257, '5f063ac129b91', 'bc1q04zwyc6q89q67hkzxezmc634t36hn8ns9jl7t4', 'BTC', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:29:37'),
(258, '5f063b95050a8', 'MGxNPPB7eBoWPUaprtX9v9CXJZoD2465zN', 'LTH', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:33:09'),
(259, '5f063d1297b43', 'ltc', 'LTH', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:39:30'),
(260, '5f063d5eecdbe', 'ltc1q7edemg79p5t7mjr4vx0fr7rrkd2exvtw6q9qxc', 'LTH', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:40:47'),
(261, '5f063da73de12', 'LTC014458774563210255477885', 'LTH', '0.00', '0.00', '0.00', '0.00', '2020-07-08 14:41:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
