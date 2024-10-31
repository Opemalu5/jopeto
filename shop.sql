-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 05:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `imhproducts`
--

CREATE TABLE `imhproducts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imhproducts`
--

INSERT INTO `imhproducts` (`id`, `name`, `image`, `price`) VALUES
(1, 'Biscoff Cake ', 'a1.jpg', 1700.00),
(2, 'Cheese cake', 'a1.jpg', 34000.00),
(3, 'Chocolate Cake', 'a1.jpg', 47990.00),
(4, 'Oreo Ice Cream Cake', 'a1.jpg', 49990.00),
(5, 'Cream Cake', 'a1.jpg', 54990.00),
(6, 'Special Plain Cake', 'a1.jpg', 96990.00),
(7, 'Strawberry', 'a1.jpg', 1690.00),
(8, 'Shake', 'a1.jpg', 7690.00),
(9, 'Shake', 'a1.jpg', 11490.00),
(1, 'Biscoff Cake ', 'a1.jpg', 1700.00),
(2, 'Cheese cake', 'a1.jpg', 34000.00),
(3, 'Chocolate Cake', 'a1.jpg', 47990.00),
(4, 'Oreo Ice Cream Cake', 'a1.jpg', 49990.00),
(5, 'Cream Cake', 'a1.jpg', 54990.00),
(6, 'Special Plain Cake', 'a1.jpg', 96990.00),
(7, 'Strawberry', 'a1.jpg', 1690.00),
(8, 'Shake', 'a1.jpg', 7690.00),
(9, 'Shake', 'a1.jpg', 11490.00);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `description` varchar(50) NOT NULL,
  `packaging` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `supplier` int(11) NOT NULL,
  `lastEditedBy` varchar(50) NOT NULL,
  `lastEditedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `barcode`, `pic`, `description`, `packaging`, `price`, `supplier`, `lastEditedBy`, `lastEditedOn`) VALUES
(5, 'bago to pre', 'asdasdsd', 'allphotos/moon walk png 2.png', 'sadsadsa', 'sdadsa', 0, 48, 'opet@gmail.com', '2023-05-02 12:50:41'),
(6, 'bago to pre', 'asdasdsd', 'allphotos/moon walk png 2.png', 'sadsadsa', 'sdadsa', 0, 48, 'opet@gmail.com', '2023-05-02 12:50:41'),
(7, 'bago to pre', 'asdasdsd', 'allphotos/moon walk png 2.png', 'sadsadsa', 'sdadsa', 0, 49, 'opet@gmail.com', '2023-05-02 12:51:14'),
(8, 'bago to pre', 'asdasdsd', 'allphotos/moon walk png 2.png', 'sadsadsa', 'sdadsa', 0, 50, 'opet@gmail.com', '2023-05-02 12:51:45'),
(9, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 0, 50, 'opet@gmail.com', '2023-05-02 12:52:53'),
(10, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 0, 44, 'opet@gmail.com', '2023-05-02 12:54:16'),
(11, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 1, 44, 'opet@gmail.com', '2023-05-02 12:54:57'),
(12, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, 'opet@gmail.com', '2023-05-02 12:55:57'),
(13, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 0, 'opet@gmail.com', '2023-05-02 12:57:29'),
(14, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 0, 'opet@gmail.com', '2023-05-02 12:57:58'),
(15, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 0, 'opet@gmail.com', '2023-05-02 12:58:19'),
(16, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, '', '2023-05-02 13:00:32'),
(17, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, '', '2023-05-02 13:00:49'),
(18, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, '', '2023-05-02 13:00:58'),
(19, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, 'opet@gmail.com', '2023-05-02 13:01:10'),
(20, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 44, 'opet@gmail.com', '2023-05-02 13:02:04'),
(21, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 50, 'opet@gmail.com', '2023-05-02 13:03:13'),
(22, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 50, '', '2023-05-02 13:15:06'),
(23, 'bago to pre 22222', 'asdasdsd', 'allphotos/dice4.png', 'sadsadsa', 'sdadsa', 17000, 50, 'opet@gmail.com', '2023-05-02 13:17:48'),
(24, 'Pagkain', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 50, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:25:29'),
(25, 'Pagkain', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 47, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:26:18'),
(26, 'Pagkain', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 47, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:32:14'),
(27, 'Pagkai', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 48, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:32:40'),
(28, 'Pagkai', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 48, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:32:41'),
(29, 'Pagkai', '1222333', 'allphotos/bcg2.jpg', 'Mag bao ka na', 'Box', 1777, 50, 'ptc.diopetmascarina@gmail.com', '2023-05-02 13:33:23'),
(30, 'Tilapia', '11212121212', 'allphotos/bcg2.jpg', 'Masarap to', 'Wala', 1700, 50, 'opet@gmail.com', '2023-05-02 13:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `address`, `phone_number`, `url`) VALUES
(50, 'ptc.diopetmascarina@gmail.com', '1234567890', '2023-05-01 06:02:31', 'Road 10 Taytay Rizal', '0997615137333', 'https://www.facebook.com/opet.pinaka.malupet'),
(44, 'opetmascarina@gmail.com.ph', '1234567889', '2023-05-01 04:24:21', 'dito sa taytay', 'wala eh', 'www.com'),
(47, 'opet@gmail1.com', '1234567890', '2023-05-01 05:38:37', 'taytay', '09284989273', 'opet.com'),
(48, 'opet@gmail.com', '1234567890', '2023-05-01 05:53:24', 'dito', '09284989273', 'opet.com'),
(49, 'opet@gmail.comph', '1234567890', '2023-05-01 06:36:45', 'taytay pasig', '09284989273', 'opetmalu.com.ph');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
