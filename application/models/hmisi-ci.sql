-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2020 at 05:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmisi-ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nama-lengkap` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL DEFAULT 'anggota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `img`, `nama-lengkap`, `jabatan`) VALUES
(1, 'daniel.png', 'Iqbal Daniel A', 'Ketua Himpunan 2019'),
(2, 'friyal.png', 'Friyal Yusriyah S', 'Wakil Ketua Himpunan 2019'),
(3, 'resita.png', 'Resita Rahmadani', 'Sekretaris'),
(4, 'devina.png', 'Devina Aulia', 'Bendahara'),
(5, 'mihyi.png', 'Muhyidin Yahya', 'Ketua Divisi Pendekar'),
(6, 'aisah.png', 'Aisah Mirwana', 'Ketua Divisi Litbang'),
(7, 'harri.png', 'Harry Wilson', 'Ketua Divisi Humas'),
(8, 'fahmi.png', 'Fahmi', 'Ketua Divisi Danus'),
(9, 'randy.png', 'Randy Ramadhan', 'anggota'),
(10, 'putri.png', 'Putri', 'anggota'),
(11, 'amirwana.png', 'A Mirwana', 'anggota'),
(12, 'dikdik.png', 'Dikdik', 'anggota'),
(13, 'fadlan.png', 'Fandlan', 'anggota'),
(14, 'farhan.png', 'Farhan', 'anggota'),
(15, 'firman.png', 'Firman', 'anggota'),
(16, 'krisantus.png', 'Krisantus', 'anggota'),
(17, 'acep.png', 'Acep', 'anggota'),
(18, 'reihan_fajri.png', 'Reihan Fajri', 'anggota'),
(19, 'rifky.png', 'Rifky', 'anggota'),
(20, 'riki_rahman.png', 'Riki Rahman', 'anggota'),
(21, 'syam.png', 'Syam', 'anggota'),
(22, 'viki.png', 'Viki', 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `img`, `slug`, `create_by`, `time`, `title`, `text`) VALUES
(1, '/assets/img/bg1.jpg', 'pentingnya-coding', 'Randy', '2020-05-20 02:16:48', 'Pentingnya Coding', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia nesciunt voluptates accusamus, iure culpa, omnis qui, dicta explicabo nostrum quasi quam architecto facilis porro! Excepturi sed explicabo minima blanditiis? Error, ea animi iure quas architecto odit itaque deleniti tempore dicta voluptatem, nobis eius beatae nulla, esse quod recusandae cumque labore. Adipisci esse officia velit aut atque nemo, soluta quasi. Ea quibusdam quas perferendis quia? Rerum suscipit excepturi ipsum delectus ad, maxime reiciendis veritatis dicta deserunt modi ut natus recusandae enim doloremque iusto vel cum unde distinctio non dignissimos fugit?'),
(2, '/assets/img/bg1.jpg', 'jangan-lupa-titik-koma', 'naruto', '2020-05-20 02:16:48', 'jangan Lupa titik Koma', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia nesciunt voluptates accusamus, iure culpa, omnis qui, dicta explicabo nostrum quasi quam architecto facilis porro! Excepturi sed explicabo minima blanditiis? Error, ea animi iure quas architecto odit itaque deleniti tempore dicta voluptatem, nobis eius beatae nulla, esse quod recusandae cumque labore. Adipisci esse officia velit aut atque nemo, soluta quasi. Ea quibusdam quas perferendis quia? Rerum suscipit excepturi ipsum delectus ad, maxime reiciendis veritatis dicta deserunt modi ut natus recusandae enim doloremque iusto vel cum unde distinctio non dignissimos fugit?');

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `bg` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id`, `slug`, `title`, `text`, `bg`, `color`, `icon`) VALUES
(1, 'kurikulum-pembelajaran', 'Kurikulum Pembelajaran', 'Sebagai Mahasiswa Informatika, Kami tidak boleh tertinggal di pengetahuan mengenai IT.', '#fceef3', '#ff689b', 'analytics-outline'),
(2, 'rapat-rutin', 'Rapat Rutin', 'Untuk menciptakan inovasi dan kreativitas, kami mengadakan rapat dan saling mongoreksi setiap kegiatan kami.', '#fff0da', '#e98e06', 'bookmarks-outline'),
(3, 'malam-keakraban', 'Malam Keakraban', 'Kegiatan dimana kami dalam 1 malam saling terbuka dan mempererat kekeluargaan kami sebagai Himpunan.', '#e6fdfc', '#3fcdc7', 'paper-outline'),
(4, 'seminar', 'Seminar', 'kegiatan Umum yang rutin kami lakukan agar informasi yang kita dapat, dapat di ketahui khalayak umum.', '#eafde7', '#41cf2e', 'speedometer-outline'),
(5, 'bakti-sosial', 'Bakti Sosial', 'Tidak hanya sebagai Himpunan Mahasiswa semata, kami mengadakan Bakti sosial untuk membantu satusama lain.', '#e1eeff', '#2282ff', 'world-outline'),
(6, 'matmi-project', 'MAT&MI Project', 'MAT&MI Project adalah Unit Usaha HMISI dimana Kami memiliki Marchendaise untuk di Jual dan Juga menjual jasa IT lainnya.', '#ecebff', '#8660fe', 'clock-outline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
