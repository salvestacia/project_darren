-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 01:44 PM
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
-- Database: `sales_darren`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` char(4) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`) VALUES
('C001', 'Kalbis University, Darren', 'Jl. Kelapa Puan Timur III'),
('C002', 'The Foodie, Jackson', 'Jl. Nurdin Utara I'),
('C003', 'Modello Inc, Stacia', 'Jl. Gading Indah IV'),
('C004', '2FDesign Corps, Fiony', 'Jl. Kelapa Kopyor VII'),
('C005', 'Matsuri Inc, Haruka', 'Jl. Pelangi Kasih X'),
('C006', 'Oak Wood Corp, Dennis', 'Jl. Intan Kasih '),
('C007', 'Dodora Institute, Tom', 'Jl. Putih Susu'),
('C008', 'Acer Corps, John', 'Jl. Merah Delima '),
('C009', 'Prime Corps, Flora', 'Jl. Kelapa Puan TImur IV'),
('C010', 'Nippon Solution, Nayla', 'Jl. Kelapa Muda XII'),
('C011', '3D Top Corps, Jessica Chandra', 'Jl. Sunter Indah XX'),
('C012', 'My CarSphere Inc, Febriola Sinambela', 'Jl. Grage IV'),
('C013', 'MyAurel Corp, Aurellia', 'Jl. Pelangi Indah II');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` char(4) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sales_price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sales_price`) VALUES
('P001', 'Ebi Furai', 53000),
('P002', 'Nugget Ayam', 45000),
('P003', 'Bakso Sapi', 55000),
('P004', 'Samosa', 40000),
('P005', 'Fish Tofu', 38000),
('P006', 'Salmon Ball', 60000),
('P007', 'Crab Stick', 35000),
('P008', 'Chikuwa', 37000),
('P009', 'FIsh Cake', 55000),
('P010', 'Spicy Karage', 35500),
('P011', 'Chicken Katsu', 45000),
('P012', 'Pork Katsu', 85000),
('P013', 'Frozen Odeng', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` char(4) NOT NULL,
  `tax` varchar(10) DEFAULT NULL,
  `tax_nominal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax`, `tax_nominal`) VALUES
('TX01', '11%', 0.11),
('TX02', '15%', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transaction_id` char(4) NOT NULL,
  `product_id` char(4) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `uom` char(3) DEFAULT NULL,
  `taxes` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_id`, `product_id`, `quantity`, `uom`, `taxes`) VALUES
('T001', 'P001', 50, 'M01', 'TX01'),
('T002', 'P005', 80, 'M01', 'TX01'),
('T003', 'P007', 36, 'M01', 'TX01'),
('T004', 'P004', 29, 'M01', 'TX01'),
('T005', 'P008', 30, 'M01', 'TX01'),
('T006', 'P010', 5, 'M02', 'TX01'),
('T007', 'P009', 30, 'M01', 'TX01'),
('T008', 'P013', 5, 'M02', 'TX01');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

CREATE TABLE `transaction_master` (
  `transaction_id` char(4) NOT NULL,
  `customer_id` char(4) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`transaction_id`, `customer_id`, `order_date`) VALUES
('T001', 'C001', '2023-01-25 14:45:40'),
('T002', 'C002', '2023-01-26 12:00:40'),
('T003', 'C003', '2023-02-12 08:00:00'),
('T004', 'C004', '2023-03-29 10:15:00'),
('T005', 'C005', '2023-03-30 13:30:30'),
('T006', 'C013', '2024-01-15 09:50:00'),
('T007', 'C013', '2024-02-10 17:01:00'),
('T008', 'C006', '2024-03-27 08:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` char(3) NOT NULL,
  `measure_unit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `measure_unit`) VALUES
('M01', 'Units'),
('M02', 'Dozens');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('darren', '123456'),
('fiony', '78910');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transaction_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `taxes` (`taxes`),
  ADD KEY `uom` (`uom`);

--
-- Indexes for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `transaction_detail_ibfk_5` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_master` (`transaction_id`),
  ADD CONSTRAINT `transaction_detail_ibfk_6` FOREIGN KEY (`UoM`) REFERENCES `uom` (`id`),
  ADD CONSTRAINT `transaction_detail_ibfk_7` FOREIGN KEY (`taxes`) REFERENCES `taxes` (`id`),
  ADD CONSTRAINT `transaction_detail_ibfk_8` FOREIGN KEY (`uom`) REFERENCES `uom` (`id`);

--
-- Constraints for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD CONSTRAINT `transaction_master_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
