-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 11:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pheeraphat`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('pending','contacted','closed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `phone`, `address`) VALUES
(1, 'ภาณุพงศ์ บุญโหห', 'ntkmice06@gmail.com', '$2y$10$dUQ4OASlprtCDnwHOkQCLuxapul/cUgmU8K0H2uGxDPXxS9YHJew6', '2026-01-29 09:01:00', NULL, NULL),
(2, 'ภาณุพงศ์ บุญโหห', 'sa@gmail.com', '$2y$10$V4iDNPTPbhKWfuKHoZAine/XbI/4vyiHOQyqQDsC//QtC190P5nC6', '2026-01-29 09:02:37', NULL, NULL),
(8, 'ภาณุพงศ์ บุญโหห', 's@gmail.com', '$2y$10$99t98wneZl9yBHKuCrJOOObEd06N7zOAGkJTyuNUomQIFa5Ftye6O', '2026-01-29 09:13:13', NULL, NULL),
(9, 'ภาณุพงศ์ บุญโหห', 'a@gmail.com', '$2y$10$hg/sz0JLwFanu8kdgFoTG.qzAyS/VS9Tn7GZkacIEer3e1Xf/knIi', '2026-01-29 09:13:38', NULL, NULL),
(10, 'ง่อน', 'd@gmail.com', '$2y$10$zs4IZzxYDaiIPIvkeXA7neDa8RCcCgiLvbC59GGCJOUc7iwqSxYyO', '2026-01-29 09:28:31', '0658844068', 'อาชีวศึกษานครราชสีมา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
