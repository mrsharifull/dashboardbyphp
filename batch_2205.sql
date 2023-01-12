-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 07:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch_2205`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active, 2=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `photo`, `status`) VALUES
(4, 'Otto', 'Kirby', 'qaxozefe@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, 0),
(5, 'Dara', 'Bartlett', 'nynoqy@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 0),
(6, 'Chelsea', 'Estes', 'jivevyfuje@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 0),
(7, 'Karyn', 'Valenzuela', 'mesidiv@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 0),
(8, 'James', 'Ayers', 'foqazo@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 0),
(9, 'Erin', 'Guy', 'duzotobiw@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 0),
(10, 'Aurora', 'Crawford', 'nydilufuc@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, 0),
(13, 'Lisandra', 'Rowland', 'weworojojo@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b01dcc63fc7.jpg', 1),
(15, 'Steel', 'Love', 'vihe@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b01da13d721.jpg', 1),
(16, 'Maite', 'Stein', 'tetuvig@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b01d9357f77.jpg', 1),
(17, 'Lionel', 'Gallegos', 'hikehuty@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b2b57faa434.jpg', 1),
(21, 'Shariful', 'Islam', 'shariful@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b401024a609.jpg', 1),
(22, 'Admin', 'Power', 'admin1@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '63b4312ac5db6.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
