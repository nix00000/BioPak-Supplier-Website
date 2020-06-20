-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 12:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biopack`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(20) NOT NULL,
  `company_name` tinytext NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `email`, `phone`, `website`, `password`, `approved`, `admin`) VALUES
(4, 'Apple', 'info@apple.com', '07580665', 'www.apple.com', '$2y$10$aQL3yoxRWe1JqFi1OR2.bO.NAo6Qyayuas7nbF3cHYkNQWJDyqJe2', 1, 0),
(5, 'admin', 'aa@aa.com', '00000000000', 'none', '$2y$10$FIfEhdACnaW1xM28VDMBfu1h8OPrGWsXjErKUDdeIBnUusGecqNNK', 1, 1),
(7, 'NewTest', 'pp@pp.com', '05694986', 'www.test.com', '$2y$10$4WT88Qgxf1YTgakxQ5Ezx.mK.tk3yTOh8CEMJItfv7i6nF.zA8fY.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `pack_id` int(20) NOT NULL,
  `units` int(20) NOT NULL,
  `del_loc` int(20) DEFAULT 1,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ord_date` date NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `company_id`, `pack_id`, `units`, `del_loc`, `phone`, `email`, `ord_date`, `sent`) VALUES
(4, 4, 1, 97, 1, '+7847384835', 'test@test.com', '2020-06-12', 0),
(5, 5, 3, 450, 1, '+847893468', 'aa@aa.com', '2020-06-18', 1),
(7, 7, 2, 98, 1, '+05694986', 'pp@pp.com', '2020-06-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `pack_id` int(20) NOT NULL,
  `pack_name` tinytext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `timelimit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_name`, `price`, `timelimit`) VALUES
(1, 'Basic Pack', '799.00', 30),
(2, 'Standard Pack', '1799.00', 14),
(3, 'Premium Pack', '2799.00', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD UNIQUE KEY `unique combo` (`company_id`,`pack_id`) USING BTREE,
  ADD KEY `company_id` (`company_id`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`pack_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`pack_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
