-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 08:50 AM
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
-- Database: `theppharit`
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
(1, '<i class=\"ri-cpu-line\"></i>', 'Theppharit.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `m_id` int(11) NOT NULL,
  `m_img` varchar(255) NOT NULL DEFAULT 'menu-1.png',
  `m_name` varchar(255) NOT NULL,
  `m_amount` varchar(255) NOT NULL,
  `m_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`m_id`, `m_img`, `m_name`, `m_amount`, `m_price`) VALUES
(1, 'menu-1.png', 'Meat <br> Burger', '240g', 9.9),
(2, 'menu-2.png', 'Grill <br> Burger', '240g', 9.9),
(3, 'menu-3.png', 'Pepperoni <br> Pizza', '700g', 14.9),
(4, 'menu-4.png', 'Margherita <br> Pizza', '700g', 14.9),
(5, 'menu-5.png', 'Soda <br> Glass', '250 ml', 3.9),
(6, 'menu-6.png', 'Refreshing <br> Lemonade', '250 ml', 3.9),
(7, 'menu-7.png', 'Cheese <br> Potatoes', '50g', 2.9),
(8, 'menu-8.png', 'Spicy <br> Potatoes', '50g', 2.9),
(9, 'menu-9.png', 'Mixed <br> Salad', '320g', 4.9),
(10, 'menu-10.png', 'Healthy <br> Salad', '320g', 4.9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `sv_id` int(11) NOT NULL,
  `sv_img` varchar(255) NOT NULL DEFAULT 'service-img-1.svg',
  `sv_title` varchar(255) NOT NULL,
  `sv_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`sv_id`, `sv_img`, `sv_title`, `sv_description`) VALUES
(1, 'service-img-1.svg', 'Easy To Order', 'You only need a few steps in ordering food.'),
(2, 'service-img-2.svg', 'Fastest Delivery', 'Always delivered on time and even faster.'),
(3, 'service-img-3.svg', 'Best Quality', 'Not only fast for us quality is also number one.');

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
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`sv_id`);

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
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
