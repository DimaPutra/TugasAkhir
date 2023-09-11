-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 04:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogscumentary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(30) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `nama_admin`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_spesialisasi` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `email_anggota` varchar(30) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `detil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_spesialisasi`, `nama_anggota`, `email_anggota`, `foto`, `detil`) VALUES
(6, 2, 'dima', 'dima@gmail.com', 'anggota3.png', 'corel draw, adobe premiere, take video wedding'),
(8, 1, 'hita', 'hita@gmail.com', 'anggota1.png', ''),
(9, 3, 'popo', 'popo@gmail.com', 'anggota2.png', ''),
(14, 1, 'david', 'david@gmail.com', 'default1.png', 'desain\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `no_hp_pelanggan` varchar(14) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `no_hp_pelanggan`, `alamat_pelanggan`) VALUES
(3, 'Dima new', 'dims@gmail.com', '1231231', 'Klaten'),
(4, 'ok', 'ok@gmail.com', '99698698', 'klaten'),
(5, 'Putra', 'Putra@gmail.com', '0895392224080', 'Klaten'),
(6, 'ibad', 'ibad@gmail.com', '45677', 'solo'),
(8, 'hazard', 'hazard@gmail.com', '09876', 'solo'),
(10, 'hanif', 'hanif@gmail.com', '089123456', 'Solo');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_admin`, `id_konsumen`, `id_anggota`, `username`, `password`) VALUES
(1, 1, NULL, NULL, 'admin@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(6, NULL, NULL, 6, 'dima@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(8, NULL, 3, NULL, 'dims@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(9, NULL, NULL, 8, 'hita@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(10, NULL, 4, NULL, 'ok@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(11, NULL, NULL, 9, 'popo@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(13, NULL, 5, NULL, 'Putra@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(15, NULL, 6, NULL, 'ibad@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(17, NULL, 8, NULL, 'hazard@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(21, NULL, 10, NULL, 'hanif@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(25, NULL, NULL, 14, 'david@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_order` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `deadline` date NOT NULL,
  `jenis_order` varchar(20) NOT NULL,
  `catatan_pelanggan` varchar(200) DEFAULT NULL,
  `catatan_pembuat` varchar(200) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_anggota2` int(11) DEFAULT NULL,
  `id_anggota3` int(11) DEFAULT NULL,
  `linkdrive` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_order`, `id_pelanggan`, `id_anggota`, `tanggal_masuk`, `deadline`, `jenis_order`, `catatan_pelanggan`, `catatan_pembuat`, `harga`, `id_status`, `id_anggota2`, `id_anggota3`, `linkdrive`) VALUES
(5, 3, 6, '2022-07-30', '2022-08-06', 'videografi', 'Video tiktok', NULL, 2500000, 4, 9, 8, NULL),
(6, 4, 6, '2022-11-04', '2022-11-09', 'fotografi', 'tidak ada', NULL, 1500000, 3, 9, NULL, NULL),
(8, 4, 8, '2022-11-08', '2022-11-15', 'desain grafis', 'Buat 3D Modeling\r\n', NULL, 2000000, 3, NULL, NULL, NULL),
(9, 5, 6, '2022-11-08', '0000-00-00', 'videografi', 'Video Cinematic\r\n', NULL, 2500000, 3, NULL, NULL, NULL),
(10, 6, 6, '2022-11-10', '2022-11-20', 'desain grafis', '', NULL, 2000000, 3, NULL, NULL, NULL),
(11, 6, 6, '2022-11-10', '2022-11-21', 'desain grafis', '3d\r\n', NULL, 2000000, 3, NULL, NULL, 'kkk'),
(12, 6, 8, '2022-11-10', '2022-11-23', 'fotografi', '', NULL, 1500000, 3, 9, NULL, NULL),
(14, 8, 6, '2022-11-10', '2022-11-21', 'desain grafis', 'sketsa 3d', NULL, 2000000, 3, NULL, NULL, NULL),
(15, 8, 6, '2022-11-10', '2022-11-23', 'desain grafis', 'buat content plan', NULL, 2000000, 3, 12, NULL, 'https://drive.google.com/drive/u/0/folders/162ogVPPDHPdCz4lPGgUnxp4eAiqn8U5f'),
(16, 10, 8, '2022-11-26', '2022-11-29', 'fotografi', 'Foto Wedding ', NULL, 1500000, 3, NULL, NULL, NULL),
(17, 10, NULL, '2022-11-26', '2022-11-30', 'desain grafis', '3D sketsa', NULL, 2000000, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `id_spesialisasi` int(11) NOT NULL,
  `nama_spesialisasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spesialisasi`
--

INSERT INTO `spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`) VALUES
(1, 'videografi'),
(2, 'fotografi'),
(3, 'desain grafis');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'sedang ditinjau'),
(2, 'sedang dikerjakan'),
(3, 'sudah selesai'),
(4, 'order diterima'),
(5, 'order ditolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `fk_spesialisasi_anggota` (`id_spesialisasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `fk_user_admin` (`id_admin`),
  ADD KEY `fk_user_pelanggan` (`id_konsumen`),
  ADD KEY `fk_user_anggota` (`id_anggota`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_pesanan_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_pesanan_pembuat` (`id_anggota`),
  ADD KEY `fk_status_pesanan` (`id_status`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`id_spesialisasi`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `id_spesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `fk_spesialisasi_anggota` FOREIGN KEY (`id_spesialisasi`) REFERENCES `spesialisasi` (`id_spesialisasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_pelanggan` FOREIGN KEY (`id_konsumen`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesanan_pembuat` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_pesanan` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
