-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 09:25 AM
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
-- Database: `dachathorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `dechathorn`
--

CREATE TABLE `dechathorn` (
  `c _id` int(11) NOT NULL,
  `c_logo` text NOT NULL DEFAULT ' <i class="ri-bowl-fill"></i>',
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dechathorn`
--

INSERT INTO `dechathorn` (`c _id`, `c_logo`, `c_name`) VALUES
(1, ' <i class=\"ri-bowl-fill\"></i>', 'dechathron.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `m_id` int(11) NOT NULL,
  `m_img` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL DEFAULT '''menu-1.png''',
  `m_name` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `m_amount` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `m_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`m_id`, `m_img`, `m_name`, `m_amount`, `m_price`) VALUES
(1, 'menu-1.png', 'Meat <br> Burger', '240g', '$9.90'),
(2, 'menu-2.png', 'Grill <br> Burger', '240g', '$9.90'),
(3, 'menu-3.png', 'Pepperoni <br> Pizza', '700g', '$14.90'),
(4, 'menu-4.png', 'Margherita <br> Pizza', '700g', '$14.90'),
(5, 'menu-5.png', 'Soda <br> Glass', '250 ml', '$3.90'),
(6, 'menu-6.png', 'Refreshing <br> Lemonade', '250 ml', '$3.90'),
(7, 'menu-7.png', 'Cheese <br> Potatoes', '50g', '$2.90'),
(8, 'menu-8.png', 'Spicy <br> Potatoes', '50g', '$2.90'),
(9, 'menu-9.png', 'Mixed <br> Salad', '320g', '$4.90'),
(10, 'menu-10.png', 'Healthy <br> Salad', '320g', '$4.90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `sv_id` int(11) NOT NULL,
  `sv_img` varchar(255) NOT NULL DEFAULT 'service-img-1.svg',
  `sv_title` varchar(255) NOT NULL,
  `sv_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`sv_id`, `sv_img`, `sv_title`, `sv_description`) VALUES
(0, 'service-img-1.svg', 'Easy To Order', 'You only need a few steps in ordering food.'),
(0, 'service-img-2.svg', 'Fastest Delivery', 'Always delivered on time and even faster.'),
(0, 'service-img-3.svg', 'Best Quality', 'Not only fast for us quality is also number one.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dechathorn`
--
ALTER TABLE `dechathorn`
  ADD PRIMARY KEY (`c _id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dechathorn`
--
ALTER TABLE `dechathorn`
  MODIFY `c _id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
