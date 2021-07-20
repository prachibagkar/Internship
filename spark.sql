-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 02:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `acc_no` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `acc_no`, `email`, `mobile`, `balance`) VALUES
(101, 'Monica Geller', 25698645, 'monica.geller@gmail.com', 8523697415, 4500),
(102, 'Chandler Bing', 95684412, 'chandler.bing@gmail.com', 9632147854, 7000),
(103, 'Rachel Green', 85479611, 'rachel.green@gmail.com', 9874521630, 4000),
(104, 'Joey Tribiani', 55446677, 'tribianijoey@gmail.com', 8745963215, 5500),
(105, 'Ross Geller', 88774561, 'ross.geller@gmail.com', 5478963215, 7500),
(106, 'Harvey Specter', 47856212, 'specterharvey@gmail.com', 9875203641, 10500),
(107, 'Michael Ross', 87965320, 'michael.ross@gmail.com', 7896541235, 9000),
(108, 'Travis Tanner', 55667799, 'tannertravis@gmail.com', 8754693215, 8000),
(109, 'Jessica Pearson', 33336658, 'jessicapearson@gmail.com', 8564792155, 8150),
(110, 'Louis Litt', 77485966, 'littlouis@gmail.com', 8520134679, 5850);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(20) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(5, 'Chandler Bing', 'Joey Tribiani', 500, '2021-07-20 13:16:45'),
(6, 'Harvey Specter', 'Michael Ross', 1000, '2021-07-20 13:30:47'),
(7, 'Jessica Pearson', 'Louis Litt', 850, '2021-07-20 13:31:30'),
(8, 'Ross Geller', 'Rachel Green', 500, '2021-07-20 13:32:11'),
(9, 'Joey Tribiani', 'Michael Ross', 2000, '2021-07-20 16:19:12'),
(10, 'Rachel Green', 'Ross Geller', 2000, '2021-07-20 16:23:21'),
(14, 'Jessica Pearson', 'Harvey Specter', 3000, '2021-07-20 16:42:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
