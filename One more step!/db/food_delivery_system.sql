-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 05:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `op_id` int(10) NOT NULL,
  `o_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`op_id`, `o_id`, `p_id`, `quantity`, `total`) VALUES
(1, 2, 8, 1, 100),
(2, 3, 12, 2, 200),
(3, 4, 2, 1, 300),
(4, 4, 1, 2, 400),
(5, 5, 9, 1, 200),
(7, 7, 2, 1, 300),
(8, 8, 10, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(50) NOT NULL,
  `m_id` int(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `m_id`, `date`) VALUES
(2, 3, '2020-09-28 21:43:49'),
(3, 1, '2020-09-28 22:18:48'),
(4, 3, '2020-09-28 22:20:46'),
(5, 1, '2020-09-28 23:17:14'),
(7, 1, '2020-09-28 23:23:53'),
(8, 1, '2020-09-28 23:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(4) NOT NULL,
  `categories` varchar(20) NOT NULL,
  `images` varchar(100) NOT NULL,
  `available` varchar(10) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `price`, `categories`, `images`, `available`, `quantity`) VALUES
(1, 'Chicken Cheese Burger', 200, 'fastfood', 'beef cheese burger.jpg', 'availabe', 99),
(2, 'Beef Cheese Burger', 300, 'fastfood', 'chicken_cheese_burger.jpg', 'availabe', 99),
(8, 'Custard', 100, 'desert', 'custard.jpg', 'availabe', 99),
(9, 'Ice Cream', 200, 'desert', 'icecream.jpeg', 'availabe', 99),
(10, 'sub', 50, 'fastfood', 'sub.jpg', 'availabe', 98),
(11, 'Tea', 25, 'beverage', 'tea.jpg', 'availabe', 99),
(12, 'Coffee', 100, 'beverage', 'coffe.jpg', 'availabe', 99),
(13, 'Beef Khichuri', 250, 'meal', 'beef khichuri.jpg', 'availabe', 99),
(14, 'Pastry', 100, 'desert', 'pastry.jpg', 'availabe', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(50) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FullName`, `UserName`, `Password`, `Role`, `Email`, `Pic`) VALUES
(1, 'Md. Jubayer', 'Xubayer', '1234', 'Customer', 'jubayer@gmail.com', 'Ben.jpg'),
(2, 'Md. Shafaat Jamil', 'Rokon', '1111', 'Admin', 'rokon@yahoo.com', 'spike.jpg'),
(3, 'Mr. X', 'xxx', 'xxx', 'Customer', 'xxx@gmail.com', 'index.png'),
(4, 'Mushfiqur Rahman', 'mushfiqur', '1234', 'Admin', 'something@gmail.com', NULL),
(6, 'My. Y', 'yyy', '789', 'Manager', 'manager@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `op_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
