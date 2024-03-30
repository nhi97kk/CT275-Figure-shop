-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 02:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct275_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(10) DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `order_id`, `updated_at`, `created_at`) VALUES
(42, 8, 1, 5, 9, '2023-11-22 23:47:33', '2023-11-19 10:17:50'),
(43, 8, 1, 2, 10, '2023-11-23 02:43:53', '2023-11-19 10:30:07'),
(44, 11, 4, 3, 11, '2024-03-29 12:02:21', '2024-03-29 12:00:53'),
(45, 9, 4, 1, 11, '2024-03-29 12:02:21', '2024-03-29 12:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) NOT NULL,
  `name` char(50) NOT NULL,
  `desc` text NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `desc`, `updated_at`, `created_at`) VALUES
(1, 'Mô hình xe hơi', 'Các mô hình về các dòng xe hơi theo tỉ lệ 1:32, 1:64,...', 2023, 2023),
(2, 'Mô hình Marvel', 'Các dòng mô hình về các siêu anh hùng trong Marvel', 2023, 2023),
(3, 'Máy bayyy', 'Dòng mô hình các hãng máy bay', 2024, 2023),
(4, 'Xe máy', 'Dòng mô hình các loại xe phân khối, honda,....', 2023, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` char(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total` float NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `phone`, `total`, `updated_at`, `created_at`) VALUES
(9, 1, 'Võ Thị Yến Nhi', 'Ki tuc xa khu A', '0794944427', 546000, '2023-11-19 10:28:04', '2023-11-19 10:28:04'),
(10, 1, 'Võ Thị Ngọc Giàu', 'Ki tuc xa khu B', '0794944428', 1092000, '2023-11-23 02:43:53', '2023-11-23 02:43:53'),
(11, 4, 'Võ Thị Yến Nhi', 'Xuan Khanh, Can Tho', '0794944427', 2184000, '2024-03-29 12:02:21', '2024-03-29 12:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `desc` text NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `photo` char(50) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `quantity`, `updated_at`, `created_at`, `photo`, `category_id`) VALUES
(8, 'Xe Poscher', 'Xe mô hình 1:32', 546000, 4, '2023-11-23 02:43:53', '2023-11-17 01:00:39', '65570f97be5ea_mo-hinh-xe-porsche.jpg', 1),
(10, 'Mô hình máy bay Vietjet', 'Tỉ lệ 1:1000', 546000, 9, '2023-11-17 01:18:48', '2023-11-17 01:02:20', '655713d809a5e_plane vietject.jpg', 3),
(11, 'Máy bay chiến đấu', 'Mô hình bằng hợp kim', 546000, 1, '2024-03-29 12:02:21', '2023-11-17 13:40:06', '6557c196d7f0c_maybaychiendaukk.webp', 3),
(12, 'Xe máy Vespa', 'Xe mô hình 1:64', 200000, 3, '2023-11-17 13:40:59', '2023-11-17 13:40:59', '6557c1cb69803_mo-hinh-xe-may-vespa.webp', 4),
(13, 'Xe mô tô Kawasakikiki', 'Xe mô hình 1:64', 546000, 3, '2023-11-23 02:44:54', '2023-11-17 13:41:38', '6557c1f2822a1_mo-hinh-xe-mo-to-kawasaki-ninja.webp', 4),
(14, 'Iron man mini', 'Mô hình mini', 50000, 5, '2023-11-17 13:42:20', '2023-11-17 13:42:20', '6557c21c1b204_ironmini.webp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `updated_at`, `created_at`) VALUES
(1, 'nhi97kk', 'yennhi20vl@gmail.com', '$2y$10$mGUmkvaqlrkEceZhWYGtKujdi7Wuro8fnc1Mgi9yomoTqQIt8ziAO', 0, '2023-11-12 21:28:59', '2023-11-12 21:28:59'),
(2, 'vonhi1', 'yennhi21vl@gmail.com', '$2y$10$OSIKHyBKJk946C813PrmrulcpMkwpQRHRLsE1Gtgo3gaqLFTAT1R6', 0, '2023-11-12 21:47:30', '2023-11-12 21:47:30'),
(3, 'admin', 'admin@gmail.com', '$2y$10$oll2QWFgXkPY9Q7LZDS.Q.qoXy/wkbYe3fUM38EVinIdErGaEJwMa', 1, '2023-11-12 21:49:37', '2023-11-12 21:49:37'),
(4, 'nhi98kk', 'yennhi98vl@gmail.com', '$2y$10$aAoTotn3/Dnp7lhCzMmhn.EUllfQYWiUHOMb2jiWgBmJzmJpNRXbu', 0, '2024-03-29 12:00:09', '2024-03-29 12:00:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
