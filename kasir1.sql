-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2026 at 11:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir1`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `kode_penjualan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `kode_penjualan`, `jumlah`, `sub_total`, `harga_jual`, `id_produk`, `total_harga`, `harga_beli`) VALUES
(37, 2147483647, 5, '61725.00', '12345.00', 9, '0.00', '0.00'),
(38, 2147483647, 4, '49380.00', '12345.00', 9, '0.00', '0.00'),
(39, 2147483647, 6, '74070.00', '12345.00', 9, '0.00', '0.00'),
(40, 2147483647, 3, '60000.00', '20000.00', 8, '0.00', '0.00'),
(41, 2147483647, 5, '490000.00', '98000.00', 6, '0.00', '0.00'),
(42, 2147483647, 10, '980000.00', '98000.00', 6, '0.00', '0.00'),
(43, 2147483647, 3, '36000.00', '12000.00', 5, '0.00', '0.00'),
(44, 2147483647, 3, '294000.00', '98000.00', 6, '0.00', '0.00'),
(45, 2147483647, 3, '294000.00', '98000.00', 6, '0.00', '0.00'),
(46, 2147483647, 3, '60000.00', '20000.00', 8, '0.00', '0.00'),
(47, 2147483647, 3, '60000.00', '20000.00', 8, '0.00', '0.00'),
(48, 2147483647, 12, '240000.00', '20000.00', 8, '0.00', '0.00'),
(49, 2147483647, 12, '1176000.00', '98000.00', 6, '0.00', '0.00'),
(50, 2147483647, 100, '2000000.00', '0.00', 8, '0.00', '0.00'),
(51, 2147483647, 123, '12054000.00', '0.00', 6, '0.00', '0.00'),
(52, 2147483647, 32, '395040.00', '0.00', 9, '0.00', '0.00'),
(53, 2147483647, 13, '260000.00', '0.00', 8, '0.00', '0.00'),
(54, 2147483647, 20, '240000.00', '0.00', 5, '0.00', '0.00'),
(55, 2147483647, 100, '2000000.00', '0.00', 8, '0.00', '0.00'),
(56, 2147483647, 123, '12054000.00', '0.00', 6, '0.00', '0.00'),
(57, 2147483647, 100, '2000000.00', '0.00', 8, '0.00', '0.00'),
(58, 2147483647, 123, '12054000.00', '0.00', 6, '0.00', '0.00'),
(59, 2147483647, 100, '2000000.00', '0.00', 8, '0.00', '0.00'),
(60, 2025021916, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(61, 2025021917, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(62, 2025021917, 50, '1000000.00', '0.00', 8, '0.00', '0.00'),
(63, 2025021918, 4, '392000.00', '0.00', 6, '0.00', '0.00'),
(64, 2025022019, 123, '2460000.00', '0.00', 8, '0.00', '0.00'),
(65, 2025022020, 45, '4410000.00', '0.00', 6, '0.00', '0.00'),
(66, 2025022020, 2, '24690.00', '0.00', 9, '0.00', '0.00'),
(67, 2025022020, 5, '100000.00', '0.00', 8, '0.00', '0.00'),
(68, 2025022020, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(69, 2025022321, 6, '120000.00', '0.00', 8, '0.00', '0.00'),
(70, 2025022422, 1, '20000.00', '0.00', 8, '0.00', '0.00'),
(71, 2025022422, 4, '392000.00', '0.00', 6, '0.00', '0.00'),
(72, 2025022723, 1, '12345.00', '0.00', 9, '0.00', '0.00'),
(73, 2025022723, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(74, 2025022723, 1, '12000.00', '0.00', 5, '0.00', '0.00'),
(75, 2025022724, 1, '98000.00', '0.00', 6, '0.00', '0.00'),
(76, 2025022725, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(77, 2025022725, 10, '200000.00', '0.00', 8, '0.00', '0.00'),
(78, 2025022725, 10, '980000.00', '0.00', 6, '0.00', '0.00'),
(79, 2025022725, 10, '123450.00', '0.00', 9, '0.00', '0.00'),
(80, 202503011, 10, '200000.00', '0.00', 8, '0.00', '0.00'),
(81, 202503032, 12, '240000.00', '0.00', 8, '0.00', '0.00'),
(82, 202503032, 12, '144000.00', '0.00', 5, '0.00', '0.00'),
(83, 202503032, 23, '2254000.00', '0.00', 6, '0.00', '0.00'),
(84, 202503032, 100, '1234500.00', '0.00', 9, '0.00', '0.00'),
(85, 202503063, 12, '240000.00', '0.00', 8, '0.00', '0.00'),
(86, 202503074, 1, '20000.00', '0.00', 8, '0.00', '0.00'),
(87, 202503074, 10, '123450.00', '0.00', 9, '0.00', '0.00'),
(88, 202503075, 1, '20000.00', '0.00', 8, '0.00', '0.00'),
(89, 202503076, 1, '20000.00', '0.00', 8, '0.00', '0.00'),
(90, 202503077, 2, '40000.00', '0.00', 8, '0.00', '0.00'),
(91, 202503077, 2, '24690.00', '0.00', 9, '0.00', '0.00'),
(92, 202503108, 2, '40000.00', '0.00', 8, '0.00', '0.00'),
(93, 202503109, 10, '120000.00', '0.00', 5, '0.00', '0.00'),
(94, 2025031010, 15, '4500000.00', '0.00', 10, '0.00', '0.00'),
(95, 202505301, 23, '2254000.00', '0.00', 6, '0.00', '0.00'),
(96, 202505301, 30, '9000000.00', '0.00', 10, '0.00', '0.00'),
(97, 202506041, 40, '800000.00', '0.00', 8, '0.00', '0.00'),
(98, 202506042, 100, '1234500.00', '0.00', 9, '0.00', '0.00'),
(99, 202506133, 9, '180000.00', '0.00', 8, '0.00', '0.00'),
(100, 202508281, 20, '1960000.00', '0.00', 6, '0.00', '0.00'),
(101, 202512011, 23, '2254000.00', '0.00', 6, '0.00', '0.00'),
(102, 202512011, 5, '60000.00', '0.00', 5, '0.00', '0.00'),
(103, 202512011, 2, '24000.00', '0.00', 5, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_pelanggan`, `id_user`, `jumlah`) VALUES
(22, 8, 0, 25, 2),
(23, 8, 0, 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`) VALUES
(2, 'wawwa', 'Pokoh Baru', '123456789'),
(4, 'navisha', 'Pokoh Baru', '081233758482'),
(5, 'aura', 'tawangmangu', '081225879597');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total_modal` decimal(10,2) NOT NULL,
  `total_laba` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal`, `total_harga`, `id_pelanggan`, `total_modal`, `total_laba`) VALUES
(12, '20250217009', '2025-02-17', '0.00', 4, '0.00', '0.00'),
(13, '20250217010', '2025-02-17', '0.00', 4, '0.00', '0.00'),
(14, '20250217011', '2025-02-17', '61725.00', 4, '0.00', '0.00'),
(15, '20250218004', '2025-02-18', '380000.00', 4, '0.00', '0.00'),
(16, '20250218005', '2025-02-18', '2000000.00', 2, '0.00', '0.00'),
(17, '20250218006', '2025-02-18', '380000.00', 4, '0.00', '0.00'),
(18, '20250218007', '2025-02-18', '380000.00', 4, '0.00', '0.00'),
(19, '20250218008', '2025-02-18', '812075.00', 4, '0.00', '0.00'),
(20, '20250218009', '2025-02-18', '14054000.00', 2, '0.00', '0.00'),
(21, '20250219010', '2025-02-19', '812075.00', 4, '0.00', '0.00'),
(22, '20250219011', '2025-02-19', '812075.00', 4, '0.00', '0.00'),
(23, '20250219012', '2025-02-19', '812075.00', 4, '0.00', '0.00'),
(24, '20250219013', '2025-02-19', '14449040.00', 2, '0.00', '0.00'),
(25, '20250219014', '2025-02-19', '500000.00', 4, '0.00', '0.00'),
(26, '20250219015', '2025-02-19', '2000000.00', 4, '0.00', '0.00'),
(27, '2025021916', '2025-02-19', '120000.00', 4, '0.00', '0.00'),
(28, '2025021917', '2025-02-19', '1120000.00', 2, '0.00', '0.00'),
(29, '2025021918', '2025-02-19', '392000.00', 4, '0.00', '0.00'),
(30, '2025022019', '2025-02-20', '2460000.00', 4, '0.00', '0.00'),
(31, '2025022020', '2025-02-20', '4654690.00', 4, '0.00', '0.00'),
(32, '2025022321', '2025-02-23', '120000.00', 4, '0.00', '0.00'),
(33, '2025022422', '2025-02-24', '412000.00', 4, '0.00', '0.00'),
(34, '2025022723', '2025-02-27', '12000.00', 4, '0.00', '0.00'),
(35, '2025022724', '2025-02-27', '98000.00', 2, '0.00', '0.00'),
(36, '2025022725', '2025-02-27', '1423450.00', 4, '0.00', '0.00'),
(37, '202503011', '2025-03-01', '200000.00', 4, '0.00', '0.00'),
(38, '202503032', '2025-03-03', '3872500.00', 4, '0.00', '0.00'),
(39, '202503063', '2025-03-06', '240000.00', 4, '0.00', '0.00'),
(40, '202503074', '2025-03-07', '143450.00', 2, '0.00', '0.00'),
(41, '202503075', '2025-03-07', '20000.00', 2, '0.00', '0.00'),
(42, '202503076', '2025-03-07', '20000.00', 2, '0.00', '0.00'),
(43, '202503077', '2025-03-07', '64690.00', 2, '0.00', '0.00'),
(44, '202503108', '2025-03-10', '40000.00', 4, '0.00', '0.00'),
(45, '202503109', '2025-03-10', '120000.00', 5, '0.00', '0.00'),
(46, '2025031010', '2025-03-10', '4500000.00', 2, '0.00', '0.00'),
(47, '202505301', '2025-05-30', '11254000.00', 5, '0.00', '0.00'),
(48, '202506041', '2025-06-04', '800000.00', 4, '0.00', '0.00'),
(49, '202506042', '2025-06-04', '1234500.00', 2, '0.00', '0.00'),
(50, '202506133', '2025-06-13', '180000.00', 5, '0.00', '0.00'),
(51, '202508281', '2025-08-28', '1960000.00', 4, '0.00', '0.00'),
(52, '202512011', '2025-12-01', '24000.00', 5, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama`, `stok`, `harga_jual`, `harga_beli`) VALUES
(5, '123456', 'album', 20, '24000.00', '15000.00'),
(6, '234567', 'buku galaksi', 901, '98000.00', '100000.00'),
(8, '123456789', 'buku', 0, '20000.00', '30000.00'),
(9, '12345', 'sapu', 778, '12345.00', '23456.00'),
(10, '63728', 'pensil', 5, '300000.00', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_suara`
--

CREATE TABLE `tambah_suara` (
  `id_suara` int(11) NOT NULL,
  `total_suara` int(50) NOT NULL,
  `sah` int(50) NOT NULL,
  `tidak_sah` int(50) NOT NULL,
  `suara_no1` int(50) NOT NULL,
  `suara_no2` int(50) NOT NULL,
  `suara_no3` int(50) NOT NULL,
  `nama_tps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tambah_suara`
--

INSERT INTO `tambah_suara` (`id_suara`, `total_suara`, `sah`, `tidak_sah`, `suara_no1`, `suara_no2`, `suara_no3`, `nama_tps`) VALUES
(4, 123, 123, 0, 1, 23, 0, 'nashwa'),
(6, 123, 123, 12, 123, 12, 12, 'sya');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('Admin','petugas') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `alamat`, `no_telp`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(25, 'Nashwa', '81dc9bdb52d04dc20036dbd8313ed055', 'wawa', 'Admin', 'Pokoh Baru', 2147483647, '2008-03-25', 'perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tambah_suara`
--
ALTER TABLE `tambah_suara`
  ADD PRIMARY KEY (`id_suara`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tambah_suara`
--
ALTER TABLE `tambah_suara`
  MODIFY `id_suara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
