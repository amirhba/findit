-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 08:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`name`, `lastname`, `email`, `password`, `id`) VALUES
('amirhossein', 'babarahim', 'se7en7star@yahoo.com', 'amirhba7777', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sellerphone` text COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NULL,
  `admin_permission` int(11) NOT NULL DEFAULT '0',
  `who_allowed` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`title`, `description`, `subject`, `location`, `sellerphone`, `price`, `created_at`, `admin_permission`, `who_allowed`, `author_id`, `id`) VALUES
('LG G6', 'LG G6 Smarthphone with charger cable', 'Electronic devices', 'Tehran', '', 310, '2018-07-20 10:54:18', 1, 1, 2, 13),
('PlayStation4', 'PS4 slim 500', 'Gaming console', 'Tehran', '', 290, '2018-07-20 10:54:18', 1, 1, 2, 16),
('Samsung QLED 43inch', 'A 43 inches Q-LED of Samsung that supports 3-D movies and android os', 'Electronic', 'Isfahan', '9308671380', 400, '2018-07-21 18:15:56', 1, 1, 2, 17),
('Xbox one', 'PS4 slim 500', 'Gaming console', 'Tehran', '', 1700000, '2018-07-20 10:54:18', 1, 1, 2, 18),
('LG G6', 'LG G6 Smarthphone with charger cable', 'Electronic devices', 'Tehran', '', 310, '2018-07-20 10:54:18', 0, 1, 2, 19),
('PlayStation4', 'PS4 slim 500', 'Gaming console', 'Tehran', '', 290, '2018-07-20 10:54:18', 0, 1, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` text COLLATE utf8_persian_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `lastname`, `email`, `password`, `age`, `location`, `phone`, `id`) VALUES
('fazel', 'roohi', 'fazelroohi@yahoo.com', '$2y$10$ZW5fwTmXI6/M24Fmk.S5l.EdXc6yPNYP6R3J6SgmalPwFvK12UDuS', 21, 'sari', '9309158779', 2),
('Soheil', 'Mourinho', 'Soheil@yahoo.com', '$2y$10$x0aJ3p2xG6fLWA1Jpk7wROQKb5Ga0jIduu8IsHyo32.py5GJcpY9m', 22, 'tehran', '7687687', 3),
('Hossein', 'Pooryazdani', 'HPkane@yahoo.com', '$2y$10$W/Rc3EQare8kxlP3SDOcFu6DkIqetI4P3C8OiFSYDoDXDoFLnqQR6', 20, 'Sari', '+989308670149', 6);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`name`, `id`) VALUES
('Home', 1),
('Cars', 2),
('Home inventory', 3),
('Electronic devices', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
