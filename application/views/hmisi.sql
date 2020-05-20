-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 03:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_user`
--

CREATE TABLE `account_user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `password` varchar(8) NOT NULL,
  `img` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `category` int(3) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `tanggal` date NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_kepengurusan`
--

CREATE TABLE `category_kepengurusan` (
  `id_kepengurusan` int(11) NOT NULL,
  `nama_kepengurusan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_kepengurusan`
--

INSERT INTO `category_kepengurusan` (`id_kepengurusan`, `nama_kepengurusan`) VALUES
(1, 'KAHIM'),
(2, 'WAKAHIM'),
(3, 'SEKERTARIS'),
(4, 'SEKERTARIS II'),
(5, 'BENDAHARA'),
(6, 'BENDAHARA II'),
(7, 'PENDEKAR'),
(8, 'PENDEKAR II'),
(9, 'HUMAS'),
(10, 'HUMAS II'),
(11, 'LITBANG'),
(12, 'LITBANG II'),
(13, 'DANUS'),
(14, 'DANUS II');

-- --------------------------------------------------------

--
-- Table structure for table `category_proker`
--

CREATE TABLE `category_proker` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_proker`
--

INSERT INTO `category_proker` (`id`, `nama`) VALUES
(1, 'BAKSOS'),
(2, 'MAKRAB'),
(3, 'MATMI'),
(4, 'PEMBELAJARAN'),
(5, 'RAPAT'),
(6, 'SEMINAR');

-- --------------------------------------------------------

--
-- Table structure for table `categor_berita`
--

CREATE TABLE `categor_berita` (
  `id_category` int(11) NOT NULL,
  `nama_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categor_berita`
--

INSERT INTO `categor_berita` (`id_category`, `nama_category`) VALUES
(1, 'DESKTOP'),
(2, 'WEB'),
(3, 'ANDROID / IOS'),
(4, 'AI'),
(5, 'NON IT');

-- --------------------------------------------------------

--
-- Table structure for table `foto_proker`
--

CREATE TABLE `foto_proker` (
  `id_foto` int(5) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `category` int(3) NOT NULL,
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kepengurusan`
--

CREATE TABLE `kepengurusan` (
  `id_pengurus` int(5) NOT NULL,
  `npm` int(8) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_user`
--
ALTER TABLE `account_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `category_kepengurusan`
--
ALTER TABLE `category_kepengurusan`
  ADD PRIMARY KEY (`id_kepengurusan`);

--
-- Indexes for table `category_proker`
--
ALTER TABLE `category_proker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categor_berita`
--
ALTER TABLE `categor_berita`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `foto_proker`
--
ALTER TABLE `foto_proker`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kepengurusan`
--
ALTER TABLE `kepengurusan`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_user`
--
ALTER TABLE `account_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_proker`
--
ALTER TABLE `foto_proker`
  MODIFY `id_foto` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepengurusan`
--
ALTER TABLE `kepengurusan`
  MODIFY `id_pengurus` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
