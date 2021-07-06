-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 12:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `Descr` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `Descr`, `created_at`, `Update_at`) VALUES
(1, 'Technology', 'one', '2021-06-29 09:24:55', '2021-07-01 10:03:32'),
(2, 'Gaming', 'two', '2021-06-29 09:24:55', '2021-07-01 10:03:36'),
(3, 'Auto', 'three', '2021-06-29 09:24:55', '2021-07-01 10:03:41'),
(4, 'Entertainment', 'four', '2021-06-29 09:24:55', '2021-07-01 10:03:43'),
(5, 'Books', 'five', '2021-06-29 09:24:55', '2021-07-01 10:03:47'),
(8, 'up', 'dat', '2021-07-01 11:09:44', '2021-07-01 10:09:44'),
(9, 'product five', '', '2021-07-01 11:17:19', '2021-07-01 10:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nom`, `description`, `prix`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 'Product one', 'this is product one', 120, 1, '2021-07-01 09:35:09', '2021-07-01 08:35:09'),
(2, 'product two', 'this is product two', 100, 2, '2021-07-01 09:35:09', '2021-07-01 08:35:09'),
(3, 'product three', 'this is product three', 322, 3, '2021-07-01 09:35:09', '2021-07-01 08:35:09'),
(4, 'product four', 'this is four product', 90, 4, '2021-07-01 09:35:09', '2021-07-01 08:35:09'),
(7, 'product five', 'this is the five product', 500, 5, '2021-07-01 11:14:11', '2021-07-01 10:14:11'),
(10, 'product five', '', 0, 3, '2021-07-01 11:18:51', '2021-07-01 10:18:51'),
(11, 'zzzzzfive', 'this is pruduct five ', 500, 2, '2021-07-02 11:42:57', '2021-07-02 10:44:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catge` (`categories_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catge` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
