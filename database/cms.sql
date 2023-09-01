-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 10:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `itemNum` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `FoodName` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_Fname` varchar(255) NOT NULL,
  `c_Lname` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_Fname`, `c_Lname`, `balance`, `password`, `email`, `phone_number`) VALUES
(11915, 'ikky', 'rahman', 9999, 'ikky', 'ikky2070@gmail.com', '0171012111');

-- --------------------------------------------------------

--
-- Table structure for table `cus_payment`
--

CREATE TABLE `cus_payment` (
  `c_id` int(11) NOT NULL,
  `preferred_method` varchar(50) NOT NULL,
  `bkash_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emptable`
--

CREATE TABLE `emptable` (
  `Empid` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Phoneno` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Doj` date NOT NULL,
  `JobTitle` varchar(255) NOT NULL,
  `WaitingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `f_id` int(11) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Imgpath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`f_id`, `FoodName`, `Type`, `Price`, `Imgpath`) VALUES
(1, 'Oreo Shake', 'Drinks', 120, './img/oreoshake.jpg'),
(2, 'Choco Cake', 'Desserts', 120, './img/download (3).jpg'),
(3, 'Plain', 'Rice', 50, './img/maxresdefault.jpg'),
(4, 'Chicken Fried Rice', 'Special Offers', 180, './img/u8fr-hero.jpg'),
(5, '7-UP', 'Drinks', 70, './img/7-UP.webp'),
(6, 'Biryani', 'Rice', 130, './img/60324819.webp'),
(7, 'Mirinda', 'Drinks', 70, './img/Mirinda.webp'),
(8, 'Donut', 'Desserts', 55, './img/download (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `c_id`, `FoodName`, `Quantity`, `Price`, `OrderDate`, `OrderTime`) VALUES
(43807, 11915, 'Oreo Shake', 2, 120, '2023-09-01', '02:20:00'),
(43807, 11915, 'Donut', 2, 55, '2023-09-01', '02:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Reviewid` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Reviewid`, `Fullname`, `Email`, `Message`) VALUES
(1, 'ikkty rahman', '2120016@iub.edu.bdasd', 'asdsadd'),
(2, 'ikky', '2120016@iub.edu.bd', 'good service'),
(3, 'asd', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`itemNum`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cus_payment`
--
ALTER TABLE `cus_payment`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `emptable`
--
ALTER TABLE `emptable`
  ADD PRIMARY KEY (`Empid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Reviewid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `itemNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11916;

--
-- AUTO_INCREMENT for table `emptable`
--
ALTER TABLE `emptable`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `cus_payment`
--
ALTER TABLE `cus_payment`
  ADD CONSTRAINT `cus_payment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
