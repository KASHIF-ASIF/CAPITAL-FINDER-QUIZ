-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 04:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `country_capital_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Capital` varchar(50) NOT NULL,
  `Option1` varchar(11) NOT NULL,
  `Option2` varchar(11) NOT NULL,
  `Option3` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `Country`, `Capital`, `Option1`, `Option2`, `Option3`) VALUES
(1, 'USA', 'Washington, D.C.', 'New York', 'Los Angeles', 'Chicago'),
(2, 'Canada', 'Ottawa', 'Toronto', 'Vancouver', 'Montreal'),
(3, 'Australia', 'Canberra', 'Sydney', 'Melbourne', 'Perth'),
(4, 'India', 'New Delhi', 'Mumbai', 'Bangalore', 'Kolkata'),
(5, 'United Kingdom', 'London', 'Manchester', 'Birmingham', 'Glasgow'),
(6, 'Japan', 'Tokyo', 'Kyoto', 'Osaka', 'Nagoya'),
(7, 'Germany', 'Berlin', 'Munich', 'Hamburg', 'Frankfurt'),
(8, 'Brazil', 'Brasília', 'São Paulo', 'Rio de Jane', 'Salvador'),
(9, 'China', 'Beijing', 'Shanghai', 'Guangzhou', 'Hong Kong'),
(10, 'France', 'Paris', 'Marseille', 'Lyon', 'Toulouse'),
(11, 'Russia', 'Moscow', 'Saint Peter', 'Novosibirsk', 'Yekaterinbu'),
(12, 'South Africa', 'Pretoria', 'Cape Town', 'Durban', 'Johannesbur'),
(13, 'Mexico', 'Mexico City', 'Guadalajara', 'Monterrey', 'Tijuana'),
(14, 'Spain', 'Madrid', 'Barcelona', 'Valencia', 'Seville'),
(15, 'Italy', 'Rome', 'Milan', 'Naples', 'Venice'),
(16, 'Egypt', 'Cairo', 'Alexandria', 'Giza', 'Luxor'),
(17, 'Argentina', 'Buenos Aires', 'Córdoba', 'Rosario', 'Mendoza'),
(18, 'Turkey', 'Ankara', 'Istanbul', 'Izmir', 'Bursa'),
(53, 'Pakistan', 'Islamabad', 'Karachi', 'Lahore', 'Peshawar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `highscore` int(11) DEFAULT NULL,
  `scoretype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `highscore`, `scoretype`) VALUES
(1, 'KASHIF', 'kashif1asif2@gmail.com', 'KASHIFASIF', 33, ''),
(2, 'ASIF', 'asif1basir2@gmail.com', 'ASIFBASHIR', 0, ''),
(3, 'Admin', 'admin@admin.com', 'admin', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
