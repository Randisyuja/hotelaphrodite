-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percobaanhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `nik` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `nohp` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`nik`, `name`, `email`, `password`, `address`, `city`, `religion`, `sex`, `nohp`) VALUES
('321325354377657', 'Kamu Nanyea', 'randijordan@gmai.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Senopati', 'Jakarta', 'Islam', 'Male', '081212121212'),
('3216181312020001', 'Randi Syuja', 'syuja131202@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 'citayeum', 'jakarta', 'Islam', 'Male', '081298274008'),
('3216181312020007', 'mutia khoirunniza', 'mutia21@gmail.com', '90266c389027d3c9b3fc57247f5b0af2', 'Setu', 'bandung', 'Protestant', 'Female', '081298274007');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `nohp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nik`, `name`, `email`, `password`, `address`, `city`, `religion`, `sex`, `nohp`) VALUES
(2, '3216181312020001', 'Randi Syuja', 'syuja131202@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 'citayeum', 'jakarta', 'Islam', 'Male', '081298274008'),
(3, '32161813120200098', 'diah ayu', 'randijordan0@gmail.com', 'b1980b34d5180cf2051d0fe400cb86e0', 'setu', 'Bekasi', 'Islam', 'Female', '081298274098');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `no_pemesanan` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `kode_kamar` char(5) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `no_pemesanan` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `kode_kamar` char(5) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`no_pemesanan`, `branch`, `kode_kamar`, `tipe_kamar`, `harga`, `checkin`, `checkout`, `lama_menginap`, `total`, `nik`, `nama`, `nohp`) VALUES
(10, 'indonesia', 'db01', 'Double Bed Room', 1199000, '2022-12-15', '2022-12-17', 2, 2398000, '3216181312020007', 'mutia khoirunniza', '081298274007');

-- --------------------------------------------------------

--
-- Table structure for table `indonesia`
--

CREATE TABLE `indonesia` (
  `kode_kamar` char(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indonesia`
--

INSERT INTO `indonesia` (`kode_kamar`, `image`, `tipe_kamar`, `deskripsi`, `harga`) VALUES
('db01', 'baliei.jpg', 'Double Bed Room', '**** 9,0 Luar Biasa ( 2,250 ulasan )\r\n\r\nHarga per malam mulai dari  ', 1199000),
('tb2', 'balie2.jpg', 'Twins Bed Room', '**** 8,8 Luar Biasa ( 2,240 ulasan) \r\nharga per malam mulai dari ', 1150000),
('tb4', 'balie1.jpg', 'Single Bed Room', '**** 9,9 Luar Biasa ( 4,990 Ulasan )\r\nharga per malam mulai dari ', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `japan`
--

CREATE TABLE `japan` (
  `kode_kamar` char(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `japan`
--

INSERT INTO `japan` (`kode_kamar`, `image`, `tipe_kamar`, `deskripsi`, `harga`) VALUES
('jptb', 'kamarjapan.jpeg', 'Twin Bed Room', '**** 9,9 Luar Biasa (5,250 Ulasan )\r\nHarga Per Malam mulai dari ', 2300000),
('jpsb', 'kamarjapan4.jpeg', 'Single Bed Room', '**** 9,5 Luar Biasa ( 3,120 Ulasan )\r\nHarga Per Malam mulai dari \r\n', 2000000),
('jpdb', 'kamarjapan2.jpeg', 'Double Bed Room', '**** 8,5 Luar Biasa ( 4,540 ulasan) \r\nHarga Per Malam mulai dari \r\n', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `no_room`
--

CREATE TABLE `no_room` (
  `noroom` int(50) NOT NULL,
  `kode_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `swiss`
--

CREATE TABLE `swiss` (
  `kode_kamar` char(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `swiss`
--

INSERT INTO `swiss` (`kode_kamar`, `image`, `tipe_kamar`, `deskripsi`, `harga`) VALUES
('swsb', 'swiss2.jpg', 'Single Bed Room', '**** 9,0 Luar Biasa ( 2,240 ulasan) \r\nHarga Per malam mulai dari ', 2900000),
('swtb', 'swiss3.jpg', 'Twin Bed Room', '**** 9,6 Luar Biasa ( 3,990 Ulasan )\r\nHarga Per malam mulai dari ', 3200000),
('swbd', 'swiss1.jpg', 'Double Bed Room ', '**** 9,9 Luar Biasa ( 5,000 Ulasan )\r\nHarga Per malam mulai dari ', 3500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `indonesia`
--
ALTER TABLE `indonesia`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
