-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunivers`
--

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`id`, `name`, `description`, `image`, `location`) VALUES
(1, 'Bardo National Museum', 'The Bardo National Museum in Tunis...', 'images/bardo.jpg', 'Tunis'),
(2, 'Carthage National Museum', 'The Carthage Museum...', 'images/carthage.jpg', 'Carthage'),
(3, 'Habib Bourguiba National Museum', 'The Habib Bourguiba National Museum...', 'images/mistir.jpg', 'Monastir'),
(4, 'El Djem Archaeological Museum', 'The El Djem Archaeological Museum...', 'images/jam.jpg', 'El Djem'),
(5, 'Sidi Bou Said Exhibition', 'The Sidi Bou Said Exhibition...', 'images/sidi bou.jpg', 'Sidi Bou Said'),
(6, 'Tataouine\'s Earth Memory Museum', 'The Tataouine\'s Earth Memory Museum...', 'images/tataouine.jpg', 'Tataouine'),
(7, 'Houmt El Souk', 'hsgderhzsilmhjio joqrhenlgf ilghruilgfervgq gqerge ', 'images/souk.jpg', 'Djerba'),
(8, 'Sousse museum', 'sou', 'images/sousa.jpg', 'Soussa');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OrderDate` datetime DEFAULT current_timestamp(),
  `TotalAmount` decimal(10,2) NOT NULL,
  `CartItems` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Stock`, `Type`, `Image`) VALUES
(1, 'Classic Shirt', 50.00, 20, 'men', 'assets/images/men-01.jpg'),
(2, 'Elegant Dress', 75.00, 15, 'women', 'assets/images/women-01.jpg'),
(3, 'Handmade Pottery', 30.00, 10, 'artisanal', 'assets/images/kid-01.jpg'),
(4, 'Shirt', 50.00, 20, 'men', 'assets/images/men-04.jpg'),
(5, 'Rose Dress', 75.00, 15, 'women', 'assets/images/women-03.jpg'),
(6, 'Painted Tiles', 30.00, 10, 'artisanal', 'assets/images/kid-03.jpg'),
(7, 'thoub', 50.00, 20, 'men', 'assets/images/men-02.jpg'),
(8, 'Scarf', 75.00, 15, 'women', 'assets/images/women-04.jpg'),
(9, 'culinary set', 50.00, 5, 'artisanal', 'assets/images/kid-02.jpg'),
(10, 'elegant set', 70.00, 40, 'men', 'assets/images/men-03.jpg'),
(11, 'Hand Bag', 105.00, 75, 'women', 'assets/images/women-02.jpg'),
(12, 'necklace', 70.00, 5, 'artisanal', 'assets/images/kid-04.jpg'),
(14, 'shashiya', 15.00, 90, 'men', 'assets/images/men-05.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
