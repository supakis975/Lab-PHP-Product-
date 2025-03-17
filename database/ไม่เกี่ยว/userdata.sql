-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 10:45 AM
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
(2, 'user12222', 'user12', 'user1@mail.com', '1236547896', 'adb6d8919d3b797c62f0da0449be1f2d5c04d07d23eb144b150ba5e54e3fba1e', '2024-12-19 01:56:52', 1),
(4, 'user3', 'user3', 'user3@mail.com', '3333333333', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2025-01-02 03:31:32', 1),
(5, 'admin', 'admin', 'admin@mail.com', '2222222222', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2025-01-02 03:32:47', 0),
(6, 'root', 'root', 'supakits755@gmail.com', '9999999999', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '2025-03-14 09:34:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
