-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 03:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `add`
--

CREATE TABLE `add` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `status` enum('uncompleted','completed','cancel','') NOT NULL DEFAULT 'uncompleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add`
--

INSERT INTO `add` (`id`, `user_id`, `room_id`, `status`) VALUES
(4, 1, 1, 'cancel'),
(9, 1, 1, 'cancel'),
(10, 1, 4, 'cancel'),
(11, 1, 3, 'cancel'),
(12, 1, 1, 'cancel'),
(14, 1, 4, 'uncompleted');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `title`, `message`) VALUES
(1, 'Hadeel Alrouqi', 'hadeeel.m.f.12@gmail.com', 'Test', 'Hello '),
(2, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' hh'),
(3, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' hh'),
(4, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' jvhb'),
(5, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' fggfg'),
(6, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(7, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(8, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(9, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(10, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(11, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(12, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(13, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(14, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' '),
(15, 'Hadeel Alrouqi', 'no2000thing@gmail.com', 'test2', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomtype` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT '/assets/img',
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `roomtype`, `image`, `description`, `price`) VALUES
(1, 'Deluxe Standard Room', 'assets/img/1662416549_3d1343e1afc4e7d6c58226adacffbf35', 'sleeps two people ,shower shower,32 inch TV,hair dryer,ironing board,connected rooms,summer/winter air conditione. `', 300),
(3, 'Standard Twin Room', 'assets/img/twin.jpg', 'sleeps two people,\r\nshower shower,\r\n32 inch TV,\r\nhair dryer,\r\nironing board,\r\nconnected rooms,\r\nsummer/winter air conditione.', 650),
(4, 'Executive Suite', 'assets/img/Executive.jpg', 'Accommodates four people (room with a double bed, room with two single beds),\r\nshower shower,\r\n32 inch TV,\r\nhair dryer,\r\nironing board,\r\nconnected rooms,\r\nsummer/winter air conditioner.', 800);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'hadeel', '6b7661bf1b2f463e984927960210d2e9', 'hadeel.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add`
--
ALTER TABLE `add`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `room_id` (`room_id`) USING BTREE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add`
--
ALTER TABLE `add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add`
--
ALTER TABLE `add`
  ADD CONSTRAINT `add_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `add_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
