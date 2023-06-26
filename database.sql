-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 12:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_details`) VALUES
(4, 'Optp', ''),
(5, 'KFC', ''),
(6, 'Subway', ''),
(7, 'Layers', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_details` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_details`) VALUES
(1, 'Juices', ''),
(2, 'Fast Food', 'Juck'),
(3, 'Chinese Food', ''),
(4, 'Drinks', ''),
(5, 'Deserts', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_product_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_product_name` varchar(300) NOT NULL,
  `order_user_email` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_product_quantity`, `order_price`, `order_date`, `order_product_name`, `order_user_email`) VALUES
(33, 1, 250, '2023-02-15', 'Hot', 'usmanakbar@gmail.com'),
(35, 3, 120, '2023-02-15', 'Coke', 'usmanakbar@gmail.com'),
(36, 1, 40, '2023-02-15', 'Coke', 'usmanakbar@gmail.com'),
(37, 2, 80, '2023-02-15', 'Coke', 'usmanakbar@gmail.com'),
(38, 2, 200, '2023-02-15', 'Cone', 'batman@gmail.com'),
(39, 3, 600, '2023-02-15', 'Drum', 'batman@gmail.com'),
(40, 5, 200, '2023-02-15', 'Coke', 'batman@gmail.com'),
(41, 3, 1350, '2023-02-15', 'Burger', 'batman@gmail.com'),
(42, 1, 200, '2023-02-15', 'Drum', 'Elishachris7@gmail.com'),
(43, 1, 100, '2023-02-15', 'Cone', 'Elishachris7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_detail` varchar(200) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category` varchar(150) NOT NULL,
  `product_brand` varchar(150) NOT NULL,
  `product_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_quantity`, `product_price`, `product_category`, `product_brand`, `product_image`) VALUES
(6, 'Burger', '', 497, 450, 'Hadiq', '', '_0004_Background copy 2.jpg'),
(7, 'Coke', '', 989, 40, 'Hadiq', '', '_0000_Background copy 6.jpg'),
(8, 'Drum', '', 244, 200, 'Hadiq', '', '_0002_Background copy 4.jpg'),
(9, 'Cone', '', 197, 100, 'Hadiq', '', '_0001_Background copy 5.jpg'),
(10, 'Pizza', '', 600, 650, 'Hadiq', '', '_0003_Background copy 3.jpg'),
(11, 'Hot', '', 149, 250, 'Hadiq', '', '_0005_Background copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_email` varchar(100) NOT NULL,
  `store_password` varchar(50) NOT NULL,
  `store_type` enum('r','w','','') NOT NULL,
  `store_wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_email`, `store_password`, `store_type`, `store_wallet`) VALUES
(11, 'fun', 'fun@gmail.com', '202cb962ac59075b964b07152d234b70', 'w', 3150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_wallet`) VALUES
(1, 'mir', 'mir@gmail.com', '202cb962ac59075b964b07152d234b70', 560),
(2, 'mike', 'mike@gmail.com', '202cb962ac59075b964b07152d234b70', 1450),
(3, 'Kasufer', '', 'd41d8cd98f00b204e9800998ecf8427e', 500),
(4, 'kasufar ', 'Elishachris7@gmail.com', '202cb962ac59075b964b07152d234b70', 1973),
(6, 'usmanakbar', 'usmanakbar@gmail.com', '202cb962ac59075b964b07152d234b70', 60),
(7, 'batman', 'batman@gmail.com', '202cb962ac59075b964b07152d234b70', 360);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
