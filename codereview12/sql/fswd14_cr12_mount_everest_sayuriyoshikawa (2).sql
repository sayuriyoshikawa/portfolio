-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:48 PM
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
-- Database: `fswd14_cr12_mount_everest_sayuriyoshikawa`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr12_mount_everest_sayuriyoshikawa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fswd14_cr12_mount_everest_sayuriyoshikawa`;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `locationName` varchar(55) NOT NULL,
  `price` float NOT NULL,
  `duration` varchar(15) NOT NULL,
  `description` varchar(200) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `continent` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `locationName`, `price`, `duration`, `description`, `longitude`, `latitude`, `picture`, `continent`) VALUES
(6, 'Japan', 1200, '2weeks', 'Cherry Blossom Tour - Essence of Spring', '138.72757797671665', '35.361534957573106', '61a12792459c4.jpg', 'Asia'),
(8, 'Thailand', 800, '12days', 'Thai Wonders – Krabi, Phuket, Pattaya, Bangkok – 07 Nights/08 Days', '100.47795505064485', '13.800697453771505', '61a235bacd060.jpg', 'Asia'),
(9, 'India', 700, '12days', 'Experience the most popular islands, the amazing history.\r\n', '77.66534067096418', '27.489997534518785', '61a2377b818aa.jpg', 'Asia'),
(10, 'Korea', 1000, '2weeks', 'Experience the most popular islands, the amazing history.', '126.97820617284097', '37.55732437815997', '61a237d2b2836.jpg', 'Asia'),
(11, 'Australia', 600, '6days', 'Queensland World Heritage Adventure.', '144.28145883119896', '-22.668620898474654', '61a244d945fe7.jpg', 'Australia'),
(12, 'Alaska', 1300, '1week', 'Rockies Explorer and Alaska Inside Passage Cruise', '-158.74877452771895', '56.50245981591011', '61a2468d557f7.jpg', 'North America'),
(13, 'Canada', 1270, '8days', '7/8 Day Vancouver Island Camping Tour', '-123.1149863043818', '49.34310419377287', '61a247428ac8b.jpg', 'North America'),
(14, 'NewYork', 900, '5days', '5days New York Short Break', '-73.99491115207297', '40.74207168994392', '61a247f93ddad.jpg', 'North America'),
(15, 'California', 2500, '10days', 'Natural Highlights of California National Geographic Journeys', '-119.59204373407627', '36.53165811445715', '61a248d0c49ce.jpg', 'North America'),
(16, 'Brazil', 700, '2weeks', 'Rio de Janeiro Getaway', '-42.96208284880343', '-22.589441956167505', '61a249629e07b.jpg', 'South America'),
(17, 'EasterIsland', 2500, '16days', 'Easter Island includes accommodation in a hotel as well as an expert guide, meals, transport', '-109.30264046959759', '-26.948816947865563', '61a24a312ddef.jpg', 'South America'),
(18, 'Argentina', 2000, '9days', 'Patagonia Hiking', '-69.33854243333383', '-41.29275226521118', '61a24cd597161.jpg', 'South America'),
(19, 'Zambia', 3000, '2weeks', 'Victoria Falls - Camping', '26.010685164714925', '-17.87768743999078', '61a24db659f3b.jpg', 'Africa'),
(20, 'SouthAfrica', 2000, '1week', 'Camping in nature', '18.397895142560436', '-33.855090392752054', '61a24e28ecc30.jpg', 'Africa'),
(21, 'Morocco', 2000, '15days', 'Blue world.', '-5.268152068540903', '35.16919281966877', '61a24efa0fed7.jpg', 'Africa'),
(22, 'Egypt', 1100, '8days', 'Splendours of the Nile', '31.235461726536965', '30.04983067454082', '61a24f8fcfe7d.jpg', 'Africa'),
(23, 'France', 700, '2weeks', 'Wonderful experience', '2.29416134343352', '48.864028556808734', '61a250142c5af.jpg', 'Europe'),
(24, 'Sweden', 600, '1week', 'Magic Lapland Adventure', '18.058956793368967', '59.333322189116224', '61a250dac330f.jpg', 'Europe'),
(25, 'UK', 2500, '10days', 'Mediterranean Journey', '-0.13029099775417324', '51.52300352877041', '61a251dcc5529.jpg', 'Europe'),
(26, 'NewZealand', 1200, '8days', 'Beautiful nature', '172.99752312032416', '-42.23134588895155', '61a252e1430f4.jpg', 'Australia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
