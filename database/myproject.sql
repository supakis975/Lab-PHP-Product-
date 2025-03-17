-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 12:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `pro_price` varchar(255) NOT NULL,
  `pro_cost` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `cat_id`, `pro_price`, `pro_cost`, `pro_img`) VALUES
(10, 'ปลา4', 'สินค้าทะเล', '50', '25', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEWpUXjzlzOnA_ob5MCFXwGNzT5wpAp4NQRg&s'),
(15, 'ปลา2', 'สินค้าทะเล', '50', '70', 'https://e7.pngegg.com/pngimages/898/195/png-clipart-fish-fish.png'),
(16, 'ปลา1', 'สินค้าทะเล', '50', '70', 'https://png.pngtree.com/png-vector/20240221/ourmid/pngtree-smoked-bream-on-a-white-eating-industry-preparation-png-image_11757070.png'),
(17, 'ปลา4', 'สินค้าทะเล', '77', '55', 'https://png.pngtree.com/png-vector/20240221/ourmid/pngtree-smoked-fish-isolated-on-white-food-eat-bite-png-image_11760550.png'),
(18, 'ปลา6', 'สินค้าทะเล', '55', '33', 'https://png.pngtree.com/png-vector/20240613/ourlarge/pngtree-sprats-smoked-trading-fish-smoked-fish-png-image_12682750.png');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `usermobile` varchar(10) NOT NULL,
  `loginpassword` varchar(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `fullname`, `username`, `useremail`, `usermobile`, `loginpassword`, `regdate`, `user_type`) VALUES
(1, 'root', 'root', 'supakits75@gmail.com', '0947344937', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '2024-12-19 03:10:51', 1),
(2, 'plub', 'plub', 'egf@gmail.com', '1234567890', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '2024-12-19 03:42:59', 0),
(3, 'ppp', 'ppppp', 'dqdqw@gmail.com', '3333333333', 'e7042ac7d09c7bc41c8cfa5749e41858f6980643bc0db1a83cc793d3e24d3f77', '2025-03-17 07:07:04', 1),
(4, 'kkk', 'kkk', 'wdcw@gmail.com', '9999955599', 'e7042ac7d09c7bc41c8cfa5749e41858f6980643bc0db1a83cc793d3e24d3f77', '2025-03-17 07:08:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
