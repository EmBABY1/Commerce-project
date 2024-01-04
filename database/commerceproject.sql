-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 09:51 PM
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
-- Database: `commerceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `photo`) VALUES
(1, 'drinks', '', 'assets/img/drinks.jpg'),
(2, 'food', '', 'assets/img/food.jpg'),
(3, 'electronics', '', 'assets/img/electronic.jpg'),
(4, 'bags', '', 'assets/img/bag.jpg'),
(5, 'watches', '', 'assets/img/watch.jpg'),
(6, 'cameras', '', 'assets/img/camera.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` text NOT NULL,
  `price` int(45) NOT NULL,
  `quantity` int(45) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `photo`, `price`, `quantity`, `category_id`) VALUES
(1, 'bag1', '', 'assets/img/bags/bag1.jpg', 30, 30, 4),
(2, 'bag2', '', 'assets/img/bags/bag2.jpg', 30, 30, 4),
(3, 'bag3', '', 'assets/img/bags/bag3.jpg', 30, 30, 4),
(4, 'bag4', '', 'assets/img/bags/bag4.jpg', 30, 30, 4),
(5, 'bag5', '', 'assets/img/bags/bag5.jpg', 30, 30, 4),
(6, 'bag6', '', 'assets/img/bags/bag6.jpg', 30, 30, 4),
(7, 'ca1', '', 'assets/img/cameras/ca1.jpg', 30, 30, 6),
(8, 'ca2', '', 'assets/img/cameras/ca2.jpg', 30, 30, 6),
(9, 'ca3', '', 'assets/img/cameras/ca3.jpg', 30, 30, 6),
(10, 'ca4', '', 'assets/img/cameras/ca4.jpg', 30, 30, 6),
(11, 'dr1', '', 'assets/img/drinks/dr1.jpg', 30, 30, 1),
(12, 'dr2', '', 'assets/img/drinks/dr2.jpg', 30, 30, 1),
(13, 'dr3', '', 'assets/img/drinks/dr3.jpg', 30, 30, 1),
(14, 'dr4', '', 'assets/img/drinks/dr4.jpg', 30, 30, 1),
(15, 'dr5', '', 'assets/img/drinks/dr5.jpg', 30, 30, 1),
(16, 'dr6', '', 'assets/img/drinks/dr6.jpg', 30, 30, 1),
(17, 'ele1', '', 'assets/img/electronics/ele1.jpg', 30, 30, 3),
(18, 'ele2', '', 'assets/img/electronics/ele2.jpg', 30, 30, 3),
(19, 'ele3', '', 'assets/img/electronics/ele3.jpg', 30, 30, 3),
(20, 'ele4', '', 'assets/img/electronics/ele4.jpg', 30, 30, 3),
(21, 'ele5', '', 'assets/img/electronics/ele5.jpg', 30, 30, 3),
(22, 'ele6', '', 'assets/img/electronics/ele6.jpg', 30, 30, 3),
(23, 'wa1', '', 'assets/img/watches/wa1.jpg', 30, 30, 5),
(24, 'wa2', '', 'assets/img/watches/wa2.jpg', 30, 30, 5),
(25, 'wa3', '', 'assets/img/watches/wa3.jpg', 30, 30, 5),
(29, 'wa4', '', 'assets/img/watches/wa4.jpg', 30, 30, 5),
(30, 'wa5', '', 'assets/img/watches/wa5.jpg', 30, 30, 5),
(31, 'wa6', '', 'assets/img/watches/wa6.jpg', 30, 30, 5),
(32, 'f1', '', 'assets/img/food/f1.jpg', 20, 20, 2),
(33, 'f2', '', 'assets/img/food/f2.jpg', 20, 20, 2),
(34, 'f3', '', 'assets/img/food/f3.jpg', 20, 20, 2),
(35, 'f4', '', 'assets/img/food/f4.jpg', 20, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'a', 'ABCDE@gmail.com', NULL, '$2y$12$RfIDvb3r1RjcezOQiYqZm.4B8CNpTtIbuePUMD4vsAkTjPepYRPWO', NULL, NULL, '2024-01-04 17:15:48', '2024-01-04 17:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
