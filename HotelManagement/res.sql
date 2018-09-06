-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 03:04 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `res`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `f_name` int(11) NOT NULL,
  `f_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_price`) VALUES
(1, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rest`
--

CREATE TABLE `rest` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `food` text NOT NULL,
  `bill` float NOT NULL,
  `billdate` date NOT NULL,
  `billtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest`
--

INSERT INTO `rest` (`id`, `username`, `food`, `bill`, `billdate`, `billtime`) VALUES
(2, 'loil', 'dessert,upama', 80, '2017-11-25', '2017-11-25'),
(7, 'rakiburrimon', 'dessert,salad,upama', 120, '2017-11-24', '2017-11-24'),
(8, '', 'dessert', 40, '2017-11-24', '2017-11-24'),
(9, '', 'dessert,upama', 80, '2017-11-24', '2017-11-24'),
(10, 'Kutta', 'dessert,salad,upama', 120, '2017-11-25', '2017-11-25'),
(11, 'jj', 'dessert,salad,upama', 120, '2017-11-25', '2017-11-25'),
(12, 'bvggg', 'dessert,salad', 80, '2017-11-25', '2017-11-25'),
(13, 'vggg', 'dessert,salad,upama', 120, '2017-11-25', '2017-11-25'),
(14, 'ggg', 'dessert,salad,upama', 120, '2017-11-25', '2017-11-25'),
(15, 'rgd', 'dessert,salad', 80, '2017-11-25', '2017-11-25'),
(16, '', 'dessert,salad', 80, '2017-11-25', '2017-11-25'),
(17, 'wew', 'dessert', 40, '2017-11-25', '2017-11-25'),
(2147483647, '0fe_20602039', 'dessert', 40, '2017-11-25', '2017-11-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
