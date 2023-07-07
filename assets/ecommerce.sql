-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2023 at 07:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_image`, `product_name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'kiwi-chips-1679727447.jpeg', 'Kiwi Chips 500gm', 60, 15, '2023-03-25 12:42:27', '2023-03-25 18:01:25'),
(2, 'hideandseek-1679727481.jpeg', 'Hide & Seek', 180, 12, '2023-03-25 12:43:01', '0000-00-00 00:00:00'),
(3, 'lekali-1679727511.jpeg', 'Lekali Noodles', 15, 25, '2023-03-25 12:43:31', '0000-00-00 00:00:00'),
(4, 'pasta-1679727551.jpeg', 'Pasta 500gm', 240, 14, '2023-03-25 12:44:11', '0000-00-00 00:00:00'),
(5, 'oreo-1679727575.jpeg', 'Oreo Churros', 250, 10, '2023-03-25 12:44:35', '2023-03-25 18:11:51'),
(6, 'wainoodles-1679727608.jpeg', 'Wai-Wai Noodles', 25, 50, '2023-03-25 12:45:08', '0000-00-00 00:00:00'),
(7, 'realjuice-1679727641.jpeg', 'Real Juice', 250, 15, '2023-03-25 12:45:41', '0000-00-00 00:00:00'),
(8, 'dairymilk-1679727675.jpeg', 'Dairy Milk Flavours', 120, 18, '2023-03-25 12:46:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `address`, `created_at`, `updated_at`, `role`) VALUES
(1, 'alex', 'grg@gmail.com', 'hello@123', 98765452, 'pokhara', '2023-03-22 10:35:29', '0000-00-00 00:00:00', 1),
(2, 'Lance Padilla', 'hiqutiju@mailinator.com', 'Pa$$w0rd!', 98765, 'Veniam vitae atque ', '2023-03-22 10:36:23', '0000-00-00 00:00:00', 1),
(3, 'lx', 's@gmail.com', 'sdfv', 123, 'dfdf', '2023-03-23 20:04:18', '0000-00-00 00:00:00', 1),
(4, 'Avye Aguirre', 'lyqyp@mailinator.com', 'Pa$$w0rd!', 234, 'Voluptatibus in est', '2023-03-23 20:07:18', '0000-00-00 00:00:00', 1),
(5, 'Buckminster Deleon', 'cycax@mailinator.com', 'Pa$$w0rd!', 12345, 'Quas cumque cumque u', '2023-03-23 20:16:23', '0000-00-00 00:00:00', 1),
(6, 'Wylie Mitchell', 'wery@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1234, 'Et aperiam modi temp', '2023-03-23 20:16:46', '0000-00-00 00:00:00', 1),
(7, 'Alex Gurung', 'alex@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 123456, 'pokhara', '2023-03-23 20:27:15', '2023-03-25 17:05:04', 0),
(8, 'McKenzie Reilly', 'bigehalot@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, NULL, '2023-03-23 20:49:06', '0000-00-00 00:00:00', 1),
(9, 'Mark Rosario', 'vulacivyg@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, NULL, '2023-03-23 20:49:14', '0000-00-00 00:00:00', 1),
(10, 'Sam', 'sam@gmail.com', '4bbde07660e5eff90873642cfae9a8dd', NULL, NULL, '2023-03-23 20:53:19', '0000-00-00 00:00:00', 1),
(11, 'Vladimir Kramer', 's@mailinator.com', 'ef800207a3648c7c1ef3e9fe544f17f0', NULL, NULL, '2023-03-23 20:59:35', '0000-00-00 00:00:00', 1),
(12, 'mosh', 'mosh@gmail.com', '810247419084c82d03809fc886fedaad', NULL, NULL, '2023-03-23 21:03:02', '0000-00-00 00:00:00', 1),
(13, 'James Shrestha', 'james@gmail.com', '4bb2c9d9a57a0d2a53e7c4d56c952331', NULL, NULL, '2023-03-25 23:33:30', '0000-00-00 00:00:00', 1),
(14, 'admin', 'admin@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', NULL, NULL, '2023-03-25 23:34:30', '0000-00-00 00:00:00', 0),
(17, 'Alex Gurung', 'gurungalex9352@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', NULL, NULL, '2023-06-18 10:34:16', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
