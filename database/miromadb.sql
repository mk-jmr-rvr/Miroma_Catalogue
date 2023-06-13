-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 01:27 AM
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
-- Database: `miromadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_ID` int(12) NOT NULL,
  `Item_name` varchar(150) NOT NULL,
  `Item_description` varchar(150) NOT NULL,
  `Item_price` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_ID`, `Item_name`, `Item_description`, `Item_price`) VALUES
(11, 'Mother Board', 'white', 1000),
(12, 'CPU', 'White, Pink, Black, Red', 5000),
(13, 'Mouse Pad', 'Black', 200),
(16, 'RJ45', 'omsim', 8),
(17, 'keyboard', 'silencer', 30),
(21, 'Mouse', 'black', 123);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_stock`
--

CREATE TABLE `inventory_stock` (
  `Inventory_ID` int(12) NOT NULL,
  `Item_stock` int(150) NOT NULL,
  `Incoming_stock` int(150) NOT NULL,
  `Item_ID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_stock`
--

INSERT INTO `inventory_stock` (`Inventory_ID`, `Item_stock`, `Incoming_stock`, `Item_ID`) VALUES
(9, 100, 50, 11),
(10, 20, 1000, 12),
(11, 30, 0, 13),
(14, 10, 100, 16),
(15, 20, 100, 17),
(19, 123, 123, 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(12) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `userType` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `first_name`, `last_name`, `password`, `username`, `userType`) VALUES
(22, 'Rovic Jake', 'Hiwatig', '$2y$10$svx8ukyXGap5OyfzrRSYGOhTDx/Gk71Qt9BJC6X52oLURlOzVk90.', 'Rovic', 'user'),
(26, 'Vic', 'hiwatig', '$2y$10$TJrrGNdoPajN6UEAv2vJMexEFJDEXyEeY8.vOWjwcy/3RBOthPIa.', 'Vic', 'user'),
(27, 'Berni', 'Gerali', '$2y$10$NCLRT82/UhNmQgE7jAE3..uDrEeDr1nxTFR6zzUIKjx0sEdS3zdN2', 'berni222', 'user'),
(30, 'Rovic Jake', 'Hiwatig', '$2y$10$iW3Kzp48qilYr3PIdsdZXevoo8yaGUBHQHqvtFGCzKSF8UE6305ni', 'rovichwtg', 'user'),
(43, 'test2', 'testing', '$2y$10$.O6j/3zWpOGBRbANsTf8iu3IF009jIdJyQwmADCJqhJHCrQlSzo2.', 'test2', 'user'),
(44, 'test3', 'mema', '$2y$10$fp3o8ECiIKIK.uNyYEdmUOv3e/BWQQBRlqFwRPjARgLag3UpHqymW', 'test3', 'user'),
(47, 'admin', 'admin', '$2y$10$SiFPnq9JxICekNfB1D2TlexKOhYhetpuV.8SEtk8IHftrtZnJfqYa', 'admin', 'admin'),
(48, 'nat', 'gracilla', '$2y$10$u79l4YOZu7lh7kOR9mx82.9Grj1PszPs18RbU/.piy7HYDjW0Nx0m', 'natswell', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_inventory`
--

CREATE TABLE `user_inventory` (
  `UserID` int(12) NOT NULL,
  `Inventory_ID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `inventory_stock`
--
ALTER TABLE `inventory_stock`
  ADD PRIMARY KEY (`Inventory_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_inventory`
--
ALTER TABLE `user_inventory`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Inventory_ID` (`Inventory_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `inventory_stock`
--
ALTER TABLE `inventory_stock`
  MODIFY `Inventory_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_stock`
--
ALTER TABLE `inventory_stock`
  ADD CONSTRAINT `inventory_stock_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `inventory` (`Item_ID`);

--
-- Constraints for table `user_inventory`
--
ALTER TABLE `user_inventory`
  ADD CONSTRAINT `user_inventory_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `user_inventory_ibfk_2` FOREIGN KEY (`Inventory_ID`) REFERENCES `inventory_stock` (`Inventory_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
