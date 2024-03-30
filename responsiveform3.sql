-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 02:06 PM
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
-- Database: `responsiveform3`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verify_token` varchar(255) NOT NULL,
  `verify_staus` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `fname`, `lname`, `password`, `cpassword`, `gender`, `email`, `phone`, `address`, `Creation_Date`, `verify_token`, `verify_staus`) VALUES
(1, 'admin', '', 'admin', 'admin', 'Not Selected', 'admin@gmail.com', '', '', '2024-03-30 11:16:54', '', 0),
(3, 'SURAJ KUMAR', 'SINGH', '1234', '1234', 'Male', 'surajksingh222@gmail.com', '1234', '1234', '2024-03-30 12:51:32', '732455', 0),
(4, 'Yash', 'Nigam', '1234', '1234', 'Not Selected', 'yashn@student.iul.ac.in', '', '', '2024-03-30 12:52:31', '016181', 0),
(6, 'SHIV', 'RAJ', '1234', '1234', 'Male', 'shivrajs037@gmail.com', '1234567890', '', '2024-03-30 10:36:08', '', 0),
(7, 'Atif ', 'Ansari', '1234', '1234', 'Male', 'atifansari750546@gmail.com', '', '', '2024-03-30 12:57:55', '231782', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
