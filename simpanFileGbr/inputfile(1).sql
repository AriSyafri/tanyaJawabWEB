-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 09:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inputfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbfile`
--

CREATE TABLE `tbfile` (
  `idorang` int(8) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbfile`
--

INSERT INTO `tbfile` (`idorang`, `nama`, `gambar`) VALUES
(1, 'Ari Syafri', '6366894f766db.jpeg'),
(2, 'Yanto Rahaja', '63676be330a08.jpeg'),
(3, 'tes', '63668143a4e39.jpg'),
(4, 'gambar dua', '6366824febd74.jpg'),
(5, 'tessia', '63676bf0d0fa4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbfile`
--
ALTER TABLE `tbfile`
  ADD PRIMARY KEY (`idorang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbfile`
--
ALTER TABLE `tbfile`
  MODIFY `idorang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
