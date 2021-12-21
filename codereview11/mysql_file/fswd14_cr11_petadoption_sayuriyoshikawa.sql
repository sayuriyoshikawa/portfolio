-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 04:56 PM
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
-- Database: `fswd14_cr11_petadoption_sayuriyoshikawa`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr11_petadoption_sayuriyoshikawa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fswd14_cr11_petadoption_sayuriyoshikawa`;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pet_status` varchar(15) NOT NULL DEFAULT 'not adopted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `picture`, `location`, `size`, `age`, `hobbies`, `breed`, `description`, `pet_status`) VALUES
(30, 'Lala', '61990d9b7e34c.jpg', 'Schillerplatz 14', 'small', 1, 'Running', 'Yorkshire Terrier', 'She is powerful!', 'not adopted'),
(31, 'Lilu', '61990f34ee118.jpg', 'Schillerplatz 15', 'small', 4, 'Sleep', 'Chihuahua', 'He is friendly boy.', 'not adopted'),
(32, 'Max', '6199102f311cd.jpg', 'Schillerplatz 14', 'Big', 10, 'Swimming', 'Eurasier', 'Always being by your side.', 'not adopted'),
(33, 'Leo', '6199111a67b8c.jpg', 'Roggendorfgasse 2', 'big', 9, 'Running', 'German Shepherd', 'He is strong and he protect you.', 'not adopted'),
(34, 'Lucky', '619911c039f5c.jpg', 'Roggendorfgasse 2', 'small', 1, 'Eating', 'Chug', 'She likes play with people.', 'not adopted'),
(35, 'Happy', '619912025a08f.jpg', 'Schillerplatz 14', 'Middle', 5, 'Walking', 'Dachsado', 'She is quiet.', 'adopted'),
(36, 'Finn', '6199129eb51b5.jpg', 'Schillerplatz 15', 'Middle', 6, 'Sleeping', 'Calico', 'He is quiet and likes sleep', 'not adopted'),
(37, 'Nene', '6199137337eee.jpg', 'Schillerplatz 15', 'Middle', 8, 'Sleeping', 'Cymric', 'She likes to jump to high place.', 'not adopted'),
(38, 'Alex', '619913c37b623.jpg', 'Roggendorfgasse 2', 'small', 3, 'Pay with cat toy', 'Devon rex', 'He is powerful child.', 'not adopted'),
(39, 'Haru', '619914450ea79.jpg', 'Roggendorfgasse 2', 'Middle', 9, 'Watching bird', 'America short hair', 'She is so smart.', 'not adopted'),
(40, 'Sam', '6199151f50b83.jpg', 'Schillerplatz 14', 'small', 2, 'Flying', 'Budgie', 'His chirp is beautiful.', 'not adopted'),
(41, 'Daisy', '619915b647b5c.jpg', 'Schillerplatz 14', 'Middle', 6, 'Sleeping', 'Holland Lop Rabbit', 'She is charming.', 'not adopted');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `adoption_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL,
  `adoption_description` varchar(500) NOT NULL,
  `fk_pet_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`adoption_id`, `adoption_date`, `adoption_description`, `fk_pet_id`, `fk_user_id`) VALUES
(11, '2021-11-26', 'Thank you!', 35, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `password`, `address`, `email`, `picture`, `status`) VALUES
(1, 'Sayuri', 'Yoshikawa', 2147483647, '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'Vienna, Austria', 'sayuri@gmail.com', '6197ae8eb0537.jpg', 'adm'),
(5, 'John', 'Doe', 12345678, '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'Spengergasse 25', 'aaa@gmail.com', '6199160530a53.jpg', 'user'),
(6, 'Sho', 'Yoshikawa', 12345678, '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'Spengergasse 20', 'bbb@gmail.com', '61991656cc7e3.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `fk_pet_id` (`fk_pet_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_pet_id`) REFERENCES `pet` (`pet_id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
