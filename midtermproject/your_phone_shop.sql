-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 10:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `your_phone_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `qnt`) VALUES
(3, 0, 1, 2),
(5, 0, 10, 4),
(8, 0, 12, 2),
(13, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_shop`
--

CREATE TABLE `final_shop` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_shop`
--

INSERT INTO `final_shop` (`id`, `uid`, `pid`, `qnt`) VALUES
(1, 8, 1, 1),
(2, 8, 10, 1),
(3, 8, 10, 1),
(4, 8, 12, 1),
(5, 14, 12, 1),
(6, 14, 10, 1),
(7, 8, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `qnt` varchar(20) NOT NULL,
  `brand` text NOT NULL,
  `category` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `qnt`, `brand`, `category`, `image`, `price`) VALUES
(1, 'Iphone 13 promax 256GB', '3', 'Apple', 'Iphone', 'images/1.webp', 1500),
(2, 'Iphone 13 promax 256GB', '4', 'Apple', 'Iphone', 'images/2.jpg', 1500),
(3, 'Iphone 13 promax 128GB', '10', 'Apple', 'Iphone', 'images/3.jpg', 1200),
(4, 'Iphone 13 pro 256GB', '7', 'Apple', 'Iphone', 'images/4.jpg', 1300),
(5, 'Iphone 12 promax 256GB', '5', 'Apple', 'Iphone', 'images/5.jpg', 1000),
(6, 'Iphone 12 promax 128GB', '2', 'Apple', 'Iphone', 'images/6.jpg', 900),
(7, 'Samsung Galaxy A54 256GB', '8', 'Samsung', 'Galaxy', 'images/7.jpg', 1500),
(8, 'Samsung Galaxy A54 256GB', '8', 'Samsung', 'Galaxy', 'images/8.jpg', 1500),
(9, 'Samsung Galaxy A54 128GB', '7', 'Samsung', 'Galaxy', 'images/9.jpg', 1200),
(10, 'Samsung Galaxy A54 128GB', '8', 'Samsung', 'Galaxy', 'images/10.webp', 1200),
(11, 'Sony Xperia 1v 256GB', '7', 'Sony', 'Xperia', 'images/11.jpg', 1400),
(12, 'Sony Xperia  1v 256GB', '13', 'Sony', 'Xperia', 'images/12.jpg', 1400),
(13, 'Sony Xperia  1v 128GB', '9', 'Sony', 'Xperia', 'images/13.jpg', 1100),
(14, 'Sony Xperia  1v 128GB', '4', 'Sony', 'Xperia', 'images/14.jpg', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `addr` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `addr`, `username`, `password`) VALUES
(8, 'admin', 'admin', 'rasht', 'admin', '25f9e794323b453885f5181f1b624d0b'),
(13, 'meraj', 'm', 'rasht', 'meraj123', '25f9e794323b453885f5181f1b624d0b'),
(14, 'hidden', 'h', 'tehran', 'hidden22', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_shop`
--
ALTER TABLE `final_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `final_shop`
--
ALTER TABLE `final_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
