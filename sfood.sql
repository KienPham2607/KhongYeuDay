-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2022 at 03:55 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `category`, `image`, `price`) VALUES
(4, 'Mini Cake', 'Cake', 'cake-g504efdbae_640.jpg', '2.34'),
(5, 'Goat Milk Cheese', 'Cheese', 'cheeses-gdba9fbccf_640.jpg', '6.50'),
(6, 'Donuts', 'Cake', 'donuts-gfb2120a1b_640.jpg', '2.34'),
(7, 'Hamburger', 'Bread', 'fast-food-g210ebb320_640.jpg', '6.30'),
(8, 'Vietnamese Lunch', 'Full meal', 'food-g3569d1bc2_640.jpg', '10.81'),
(9, 'Blue Grapes', 'Fruit', 'grapes-ga99e90ba4_640.jpg', '6.30'),
(10, 'French Bread & Honey', 'Cake', 'honey-gdb0416e26_640.jpg', '2.34'),
(11, 'Pancake', 'Cake', 'pancakes-ga514cb20f_640.jpg', '6.30'),
(12, 'Seafood Pizza with Olive fruits & Rocket leaves', 'Bread', 'pizza-g93e3354a3_640.jpg', '15.64'),
(13, 'Pumpkin Pie', 'Cake', 'pumpkin-pie-g995dc6081_640.jpg', '10.81'),
(14, 'Rapsberry', 'Fruit', 'raspberry-g0dbb82843_640.jpg', '6.30'),
(15, 'Lobser', 'Seafood', 'seafood-ga961403ab_640.jpg', '15.64'),
(16, 'Italian Brunch', 'Full meal', 'table-g087f40582_640.jpg', '15.64'),
(17, 'Taco', 'Bread', 'tacos-g3f6dfed64_640.jpg', '15.64'),
(19, 'Chocopie', 'Cake', 'sweets-gf3b987f72_640.jpg', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `telephone`, `email`, `password`, `role`, `address`) VALUES
(1, 'Pham Trung Kien', '0123123123', 'phamkien.8a@gmail.com', 'mysql', 'user', 'ninh binh, binh khe, dong trieu, quan ninh'),
(2, 'Bui Thai Tuan', '0987654321', 'tuan@gmail.com', '1', 'staff', 'qwerqwerqwerq'),
(4, 'Pham Trung', '0234345456', 'kiencahe@gmail.com', 'mysql', 'user', 'ninh binh, binh khe, dong trieu, quan ninh'),
(5, 'Pham Trung Kien', '0368237123', 'kienptgch200815@fpt.edu.vn', '1', 'staff', 'ninh binh, binh khe, dong trieu, quan ninh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
