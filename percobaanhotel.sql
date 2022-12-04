-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:54 PM
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
('3216181312020001', 'Randi Syuja', 'syuja131202@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 'citayeum', 'jakarta', 'Islam', 'Male', '081298274008');

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
(2, '3216181312020001', 'Randi Syuja', 'syuja131202@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 'citayeum', 'jakarta', 'Islam', 'Male', '081298274008');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `kode_kamar` char(5) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`kode_kamar`, `tipe_kamar`, `harga`, `checkin`, `checkout`, `lama_menginap`, `total`, `nama`, `nohp`) VALUES
('', '', 0, '0000-00-00', '0000-00-00', 0, 0, 'Randi Syuja', ''),
('0001', 'Double Bed Room', 499000, '2022-12-21', '2022-12-24', 3, 1497000, 'Randi Syuja', '081298274008'),
('db01', 'Double Bed Room', 750000, '2022-12-02', '2022-12-03', 2, 1500000, 'Randi', '089676767878'),
('db02', 'Double Bed Room 4', 768888, '2022-12-15', '2022-12-17', 2, 1537776, 'Randi Syuja', '081298274008');

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
('db02', 'baliei.jpg', 'Double Bed Room 4', 'BALI23', 768888),
('db03', 'doubleus.jpg', 'Double Bed Room 2', 'anjaymabar', 1290000),
('sb01', 'kamarjapan4.jpeg', 'Single Bed Room', 'asdfadf', 359999),
('tb02', 'twbaliee.jpg', 'Twin Bed Room', 'book sekarang juga boy', 649000);

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
('0001', 'twbaliee.jpg', 'Double Bed Room', 'assadadfa', 499000),
('0002', 'twin us.jpg', 'Twin Bed Room', 'anjay mabar', 349000);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `roomtype` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
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
('fr05', 'swiss.jpeg', 'Family Room', 'suit for family time', 999000);

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
  ADD PRIMARY KEY (`kode_kamar`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
