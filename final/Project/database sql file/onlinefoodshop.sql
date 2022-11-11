-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 06:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sl` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sl`, `name`, `id`, `password`) VALUES
(1, 'Das, Pankaj Kumar', '19-40537-1', '199905');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `sl` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sl`, `name`, `gender`, `phone`, `email`, `dob`, `uname`, `pass`, `img`) VALUES
(5, 'pankaj  das', '', '01968977706', 'pankaj@gmail.com', '2021-11-29', 'pankaj', '123', 'photos (1).jpg'),
(12, 'arian ', '', '01968977707', 'pankaj@gmail.com', '2021-11-30', 'arian', '123', 'wall.jpg'),
(16, 'jordan khan', 'male', '01968977707', 'pankaj@gmail.com', '2021-12-08', 'jor', '123', '20210213_142144.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `sl` int(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`sl`, `phone`, `name`, `email`, `password`) VALUES
(1, '01968977706', 'pankaj das', 'pankaj.das@gmail.com', '1231'),
(11, '01968977707', 'pankaj kumar das', 'das@com', '00112233'),
(18, '01968977709', 'lui das', 'lui@com', '789789'),
(19, '01968977701', 'pankaj das', 'nnlb@com', 'dsgsh'),
(20, '01968977700', 'sk das', 'sk@com', '1231');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `orderid` int(100) NOT NULL,
  `customerid` int(100) NOT NULL,
  `ordername` varchar(255) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `deliverymanid` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `customerphone` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`orderid`, `customerid`, `ordername`, `totalprice`, `deliverymanid`, `address`, `customerphone`, `status`, `date`) VALUES
(1, 5, ' , Roll ', 300, 1, 'zcvzxvz', '01968977706', 'done', '2021-12-11 15:49:41'),
(2, 5, ' , Roll  , Vanila ', 450, 11, 'xcbxcbxfbf', '01968977706', 'done', '2021-12-11 15:49:41'),
(4, 16, ' , Naga Wings  , Roll ', 850, 18, 'house 300', '01968977707', 'pending', '2021-12-11 15:49:41'),
(5, 16, ' , Burger  , Hot Chocolate Coffee  , Roll ', 600, 20, 'house 301', '01968977707', 'pending', '2021-12-11 15:49:41'),
(6, 5, ' , Roll ', 300, 18, 'dhaka', '01968977706', 'done', '2021-12-11 16:28:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `admin_id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `sl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `sl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `orderid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
