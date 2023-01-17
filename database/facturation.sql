-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 11:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facturation`
--

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `police` varchar(255) NOT NULL,
  `montant` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `datePay` date DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`police`, `montant`, `client`, `datePay`, `etat`, `userId`) VALUES
('2000', '435.786', 'doudou', '2023-01-28', 'payeé', '3454523345366436'),
('23432', '500.50', 'fafa', '2023-01-24', 'payée', '3454523345366436'),
('3000', '4234', 'fufu', '2023-01-29', 'non payée', '3454523345366436'),
('3400', '1324.45', 'dfada', '2023-01-28', 'payée', '3454523345366436'),
('3506', '1000000', 'rayen', '2023-01-12', 'non payeé', '3454523345366436'),
('4000', '1324.45', 'vdada', '2023-01-28', 'payée', '3454523345366436'),
('4500', '1324.45', 'ddadi', '2023-01-28', 'payée', '3454523345366436'),
('6000', '1324.45', 'mdada', '2023-01-28', 'payée', '3454523345366436'),
('6700', '1324.45', 'dhada', '2023-01-28', 'payée', '3454523345366436'),
('7000', '1324.45', 'ldada', '2023-01-28', 'payée', '3454523345366436'),
('8000', '1324.45', 'jdada', '2023-01-28', 'payée', '3454523345366436'),
('8900', '1324.45', 'dtada', '2023-01-28', 'payée', '3454523345366436');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
('3454523345366436', 'sarrainoubli24@gmail.com', '1234'),
('rayeninoubli29@gmail.com63c2609d3c32f', 'rayeninoubli29@gmail.com', '123456789'),
('superuser@gmail.com63c67228e3b65', 'superuser@gmail.com', 'azerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`police`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
