-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 07:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

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
(1, 'admin', 'Reynhard Sianagas', '21232f297a57a5a743894a0e4a801fc3', '1', '', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

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
(1, 'Harian', '8000', '1'),
(4, '1 Bulan', '140000', '30'),
(5, '3 Bulan', '380000', '90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(50) NOT NULL,
  `kode_member` text NOT NULL,
  `nama_member` text NOT NULL,
  `alamat_member` text NOT NULL,
  `jk_member` text NOT NULL,
  `hp_member` text NOT NULL,
  `nik_member` text NOT NULL,
  `paket_member` text NOT NULL,
  `foto_member` text NOT NULL,
  `tgl_member` date NOT NULL,
  `berlaku_member` date NOT NULL,
  `status_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `kode_member`, `nama_member`, `alamat_member`, `jk_member`, `hp_member`, `nik_member`, `paket_member`, `foto_member`, `tgl_member`, `berlaku_member`, `status_member`) VALUES
(13, '6074', 'fgdfg', 'gdfgdfg', 'wanita', '234234234', '', '4', '', '2020-02-11', '2020-03-12', 'active'),
(17, '3316', 'asdasd', 'sads', 'pria', '123123123', '', '4', '', '2020-04-26', '2020-05-26', 'active'),
(20, '1021', 'ssasd', '123123', 'wanita', '123123123', '', '4', '', '2020-04-14', '2020-05-14', 'active'),
(21, '8939', 'Paijo', 'asdasdasd', 'pria', '55123123', '', '4', '', '2020-04-26', '2020-05-26', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(100) NOT NULL,
  `kode_order` text NOT NULL,
  `nama_order` text NOT NULL,
  `harga_order` text NOT NULL,
  `total_order` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

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
(21, '', '2020-04-14', '140000', 'Daftar member baru, paket 1 Bulan'),
(22, '', '2020-04-26', '140000', 'Daftar member baru, paket 1 Bulan'),
(23, '', '2020-04-26', '140000', 'Perpanjangan member, paket 1 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

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

CREATE TABLE `tbl_produk` (
  `id_produk` int(255) NOT NULL,
  `nama_produk` text NOT NULL,
  `harga_produk` text NOT NULL,
  `kode_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `harga_produk`, `kode_produk`) VALUES
(2, 'Whey Protein 500ml', '75000', '39735');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
  MODIFY `id_admin` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `id_harga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(59) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
