-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 09:05 AM
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
-- Database: `potcharapon`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `profile_image_url` varchar(255) DEFAULT NULL,
  `rating_score` decimal(2,1) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `profile_image_url`, `rating_score`, `comment`, `created_at`) VALUES
(1, 'มังกรคอมาโด', 'https://tse3.mm.bing.net/th/id/OIP.ExMmGZIdTVfeeAqoS1H9XAHaFS?cb=ucfimg2&ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3', 5.0, 'Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend food to you.', '2025-12-10 17:24:17'),
(2, '阿姨追剧', 'https://tse2.mm.bing.net/th/id/OIP.AnxqdXKxHwHOTC_oLyTBQAHaHa?cb=ucfimg2&ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3', 1.0, '阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧阿姨追剧', '2025-12-11 07:14:33');

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
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `name`, `email`, `password`) VALUES
(1, 'huy', 'admin@gmail.com', '12345');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
