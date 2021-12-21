-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 09:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery`
--
CREATE DATABASE IF NOT EXISTS `food_delivery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food_delivery`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `fk_productsId` int(11) DEFAULT NULL,
  `reservation_date` date NOT NULL,
  `number_people` int(11) NOT NULL,
  `time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `fk_userId`, `fk_productsId`, `reservation_date`, `number_people`, `time`) VALUES
(24, 5, 5, '2021-11-11', 3, '12:00'),
(25, 5, 5, '2021-12-04', 3, '14:30'),
(26, 11, 14, '2021-12-02', 4, '15:00'),
(27, 11, 1, '2021-11-23', 2, '13:00'),
(28, 11, 10, '2021-11-20', 6, '15:00'),
(29, 10, 6, '2021-11-11', 6, '15:30'),
(30, 10, 13, '2021-11-09', 5, '16:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `fk_supplierId` int(11) DEFAULT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `fk_supplierId`, `description`) VALUES
(1, 'Pizzeria Ristorante GRAZIE', '12.00', 'pizza.jpg', 1, 'we have many kinds of delicious pizza!'),
(5, 'Austrian restaurant', '15.00', '6194d8e996cfd.jpg', 1, 'You can enjoy with our traditional Austrian restaurant. '),
(6, 'Japanese restaurant Sachi', '13.00', '6193a176cdcbd.jpg', 1, 'There are many kinds of Sushi and traditional Japanese foods.'),
(10, 'Korean restaurant', '12.00', '6193a1f4e380f.jpg', 2, 'Traditional Korean dishes!'),
(13, 'Hamburger shop', '10.00', '6195158ca941f.jpg', 1, 'Tasty!!!'),
(14, 'Salada factory', '15.00', '619515b515364.jpg', 2, 'Flesh Salada');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierId` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(50) DEFAULT NULL,
  `sup_website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierId`, `sup_name`, `sup_email`, `sup_website`) VALUES
(1, 'Shopy International LLC', 'shopy@mail.com', 'shopy.international.com'),
(2, 'Amazon INC', 'amazon@mail.com', 'amazon.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(4, 'Shotaro', 'Yoshikawa', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2001-07-16', 'sho@gmail.com', '61950fa40cae2.png', 'adm'),
(5, 'Sayuri', 'Yoshikawa', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2021-11-07', 'aaa@gmail.com', '61950fb44a915.jpg', 'user'),
(8, 'sayuri', 'yoshikawa', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2021-11-13', 'sayuri@gmail.com', '619534c49468d.jpg', 'adm'),
(10, 'Misato', 'Yoshikawa', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2021-11-07', 'bbb@gmail.com', '61955ec6d9950.jpg', 'user'),
(11, 'John', 'Doe', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2006-06-06', 'ccc@gmail.com', '61955ef84db48.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fk_userId` (`fk_userId`),
  ADD KEY `fk_productsId` (`fk_productsId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplierId` (`fk_supplierId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`fk_productsId`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_supplierId`) REFERENCES `supplier` (`supplierId`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
