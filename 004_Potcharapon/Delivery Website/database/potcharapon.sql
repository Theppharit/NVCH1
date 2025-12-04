-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 08:16 AM
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
-- Database: `potcharapon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `c_id` int(11) NOT NULL,
  `c_logo` text NOT NULL DEFAULT '<i class="ri-bowl-fill"></i>',
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`c_id`, `c_logo`, `c_name`) VALUES
(1, '<i class=\"ri-cpu-line\"></i>', 'Potcharapon.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `amount`, `price`, `image_path`) VALUES
(1, 'Meat Burger', '240g', 9.90, 'assets/img/menu-1.png'),
(2, 'Grill Burger', '240g', 9.90, 'assets/img/menu-2.png'),
(3, 'Pepperoni Pizza', '700g', 14.90, 'assets/img/menu-3.png'),
(4, 'Margherita Pizza', '700g', 14.90, 'assets/img/menu-4.png'),
(5, 'Soda Glass', '250 ml', 3.90, 'assets/img/menu-5.png'),
(6, 'Refreshing Lemonade', '250 ml', 3.90, 'assets/img/menu-6.png'),
(7, 'Cheese Potatoes', '50g', 2.90, 'assets/img/menu-7.png'),
(8, 'Spicy Potatoes', '50g', 2.90, 'assets/img/menu-8.png'),
(9, 'Mixed Salad', '320g', 4.90, 'assets/img/menu-9.png'),
(10, 'Healthy Salad', '320g', 4.90, 'assets/img/menu-10.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
