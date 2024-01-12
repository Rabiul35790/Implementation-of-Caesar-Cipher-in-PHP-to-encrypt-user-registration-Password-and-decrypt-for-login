-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 03:39 AM
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
-- Database: `janina`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(200) DEFAULT NULL,
  `booked` int(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`movie_id`, `movie_name`, `booked`) VALUES
(1, 'Jawan', 300),
(2, 'John wick 4', 200),
(3, 'Harry Porter', 150),
(4, 'The Nun', 120),
(5, 'Salar', 420),
(6, 'Dunkey', 560),
(7, 'Animal', 700),
(8, 'Dangal', 900);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'Rabiul', 'Hasan', 'rabiul35790', 'roniahmed35790@gmail.com', 'aA0#'),
(14, 'asm', 'nayeem', 'nayeemsaleh', 'nayeem2gmail.com', 'oO0)'),
(15, 'mehedy', 'hasan', 'mridul123', 'mridul@gmail.com', 'aZ0#'),
(16, 'hasinur', 'rahman', 'hasi234', 'hasu@gmail', 'aA0('),
(17, 'fardin', 'ahmed', 'jons', 'fardin@gmail.com', 'Aa0)'),
(18, 'Rabiul', 'Hasan', 'hasa2', 'ratul@mail.com', 'aA9*'),
(19, 'mehedy', 'Mridul', 'mrid247', 'mrid2@gmail.com', 'oO0)'),
(20, 'Faruq', 'Hossain', 'faruq247', 'faruq3@gmail.com', 'jJ3%'),
(21, 'Susmoy ', 'Kabir', 'susmoy357', 'susmoy5@gmail.com', 'kK45*mno'),
(22, 'Kader', 'Mia', 'kader123', 'kader23@gmail.com', 'Dvgij1234$'),
(23, 'Farid', 'Hossain', 'farid123', 'farid123@gail.com', 'Dvgijtzhuw1234$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
