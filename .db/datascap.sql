-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2019 at 10:18 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bmkgscrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `datascap`
--

CREATE TABLE `datascap` (
  `id` int(10) NOT NULL,
  `bujur` varchar(100) NOT NULL,
  `lintang` varchar(100) NOT NULL,
  `kepercayaan` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `satelit` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datascap`
--
ALTER TABLE `datascap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datascap`
--
ALTER TABLE `datascap`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
