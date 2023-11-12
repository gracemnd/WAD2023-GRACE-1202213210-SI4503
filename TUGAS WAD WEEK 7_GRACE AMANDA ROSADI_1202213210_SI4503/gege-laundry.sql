-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gege-laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order`
--

CREATE TABLE `laundry_order` (
  `order_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `paket_laundry` varchar(255) NOT NULL,
  `berat` float NOT NULL,
  `tgl_masuk` date NOT NULL,
  `est_selesai` date NOT NULL,
  `parfum` varchar(255) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry_order`
--

INSERT INTO `laundry_order` (`order_id`, `nama_pelanggan`, `paket_laundry`, `berat`, `tgl_masuk`, `est_selesai`, `parfum`, `total_harga`, `status`) VALUES
(3, 'Iqmal', 'Express', 4.35, '2023-11-14', '2023-11-15', 'Lemon', 30450, 'Diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry_order`
--
ALTER TABLE `laundry_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry_order`
--
ALTER TABLE `laundry_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
