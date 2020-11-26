-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2020 at 05:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gym`
--
CREATE DATABASE IF NOT EXISTS `db_gym` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_gym`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(34) NOT NULL,
  `user_admin` text NOT NULL,
  `nama_admin` text NOT NULL,
  `pass_admin` text NOT NULL,
  `lvl_admin` text NOT NULL,
  `foto_admin` text NOT NULL,
  `status_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user_admin`, `nama_admin`, `pass_admin`, `lvl_admin`, `foto_admin`, `status_admin`) VALUES
(1, 'admin', 'laras_admin', '21232f297a57a5a743894a0e4a801fc3', '1', '', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

DROP TABLE IF EXISTS `tbl_bukti`;
CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

DROP TABLE IF EXISTS `tbl_harga`;
CREATE TABLE `tbl_harga` (
  `id_harga` int(50) NOT NULL,
  `kategori_harga` text NOT NULL,
  `nilai_harga` text NOT NULL,
  `hari_harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_harga`
--

INSERT INTO `tbl_harga` (`id_harga`, `kategori_harga`, `nilai_harga`, `hari_harga`) VALUES
(8, 'Harian', '8000', '1'),
(9, '1 Bulan', '140000', '30'),
(10, '3 bulan', '350000', '90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member` (
  `id_member` int(50) NOT NULL,
  `kode_member` text NOT NULL,
  `nama_member` text NOT NULL,
  `alamat_member` text NOT NULL,
  `jk_member` text NOT NULL,
  `hp_member` text NOT NULL,
  `paket_member` text NOT NULL,
  `tgl_member` date NOT NULL,
  `berlaku_member` date NOT NULL,
  `status_member` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tanggal_ultah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `kode_member`, `nama_member`, `alamat_member`, `jk_member`, `hp_member`, `paket_member`, `tgl_member`, `berlaku_member`, `status_member`, `password`, `email`, `tanggal_ultah`) VALUES
(1, '1111', 'laras_admin', 'admin', 'Perempuan', '111', '0', '2020-11-24', '2020-12-26', 'aktif', '21232f297a57a5a743894a0e4a801fc3', 'test@gmail.com', '2000-11-11'),
(38, '7890', 'member1', 'jl alamat', 'pria', '123', '9', '2020-11-24', '2020-12-24', 'aktif', '202cb962ac59075b964b07152d234b70', 'bryan.wijaya008@gmail.com', '2000-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id_order` int(100) NOT NULL,
  `kode_order` text NOT NULL,
  `nama_order` text NOT NULL,
  `harga_order` text NOT NULL,
  `jenis_order` varchar(255) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(59) NOT NULL,
  `id_member` text NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `jumlah_pembayaran` text NOT NULL,
  `ket_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_member`, `tgl_pembayaran`, `jumlah_pembayaran`, `ket_pembayaran`) VALUES
(47, '38', '2020-11-24', '140000', 'Daftar member baru, paket 1 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

DROP TABLE IF EXISTS `tbl_pengaturan`;
CREATE TABLE `tbl_pengaturan` (
  `id_pengaturan` int(30) NOT NULL,
  `nama_gym` text NOT NULL,
  `alamat_gym` text NOT NULL,
  `ketua_gym` text NOT NULL,
  `logo_gym` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id_pengaturan`, `nama_gym`, `alamat_gym`, `ketua_gym`, `logo_gym`) VALUES
(1, 'Gym barus', 'jalan diatas bumis', 'Reyhard Sinagas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id_produk` int(255) NOT NULL,
  `nama_produk` text NOT NULL,
  `harga_produk` text NOT NULL,
  `kode_produk` text NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `harga_produk`, `kode_produk`, `kategori`) VALUES
(7, 'Aqua', '5000', '51336', 'offline'),
(8, 'Barbel', '36000', '63997', 'online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `id_harga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(59) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
