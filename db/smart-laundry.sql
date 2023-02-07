-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 08:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart-laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `tgl_update`, `supplier`, `harga`, `total`) VALUES
(1, 'Emulsifier', 20, '2021-06-08', 'Ganjar Rauf', 15000, 0),
(2, 'Softener', 20, '2020-12-15', 'Freno Vincentius', 15000, 0),
(3, 'Detergent', 20, '2020-12-15', 'Rio Friando', 10000, 0),
(4, 'Pewangi Pakaian', 20, '2020-12-15', 'Andi Kurnianto', 7000, 0),
(5, 'Sabun Cuci', 20, '2021-01-09', 'Yogi Saputra', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Regy Mirza', 'Jl. Buah Batu Bandung', '081317484848'),
(3, 'Rob Sandy', 'Jl. Ciganitri Bandung', '082166587878'),
(4, 'Jouzu Nasuko', 'Jl. Ciganitri Bandung', '087895561458'),
(5, 'Bayu Imanda', 'Jl. Rancaekek Bandung', '085866982514'),
(6, 'Fabiola Matara', 'Jl. Sukabirus Bojongsoang Bandung', '087812115487'),
(7, 'Gina Hapshah', 'Jl. Sukabirus Bojongsoang Bandung', '085699842567'),
(8, 'Aditya Ervan', 'Jl. Gatot Subroto Bandung', '081245789632'),
(9, 'Mega Candra', 'Jl. Batununggal Bandung', '081315458878'),
(11, 'Zahrani Khairunnisa', 'Jl. Antapani Bandung', '085699874451'),
(12, 'Sanza Vittria', 'Jl. Palem Raya Bandung', '081317470474');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(1, 'Jaket', 15000),
(2, 'Hoodie', 15000),
(3, 'Baju', 5000),
(4, 'Bed Cover', 15000),
(5, 'Sprei Kasur', 15000),
(6, 'Tas', 7000),
(7, 'Karpet', 20000),
(8, 'Gorden Kecil', 5000),
(9, 'Gorden Besar', 10000),
(10, 'Boneka', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Ganjar Rauf', 'Jl. Palem Raya Bandung', '087899596464'),
(2, 'Freno Vincentius', 'Jl. Batununggal Bandung', '085698412257'),
(3, 'Rio Friando', 'Jl. Buah Batu Bandung', '085699319951'),
(4, 'Andi Kurnianto', 'Jl. Batununggal Bandung', '087786257397'),
(5, 'Yogi Saputra', 'Jl. Buah Batu Bandung', '087797556565');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `tgl_ambil` varchar(50) NOT NULL,
  `berat` int(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`, `tgl_transaksi`, `tgl_ambil`, `berat`, `customer`, `total`, `status`) VALUES
(1, 'Hoodie (15000)', '2020-12-14', '2020-12-16', 2, 'Regy Mirza', 30000, 1),
(2, 'Tas (7000)', '2020-12-14', '2020-12-16', 1, 'Rob Sandy', 7000, 1),
(3, 'Hoodie (15000)', '2020-12-14', '2020-12-16', 2, 'Jouzu Nasuko', 30000, 1),
(4, 'Jaket (15000)', '2020-12-14', '2020-12-16', 2, 'Bayu Imanda', 30000, 1),
(5, 'Gorden Kecil (5000)', '2020-12-14', '2020-12-17', 1, 'Fabiola Matara', 5000, 1),
(6, 'Karpet (20000)', '2020-12-14', '2020-12-17', 3, 'Gina Hapshah', 60000, 1),
(7, 'Bed Cover (15000)', '2020-12-14', '2020-12-16', 3, 'Aditya Ervan', 45000, 1),
(8, 'Gorden Besar (10000)', '2020-12-14', '2020-12-17', 3, 'Mega Candra', 30000, 1),
(9, 'Sprei Kasur (15000)', '2020-12-14', '2020-12-17', 2, 'Zahrani Khairunnisa', 30000, 1),
(10, 'Hoodie (15000)', '2020-12-14', '2020-12-17', 2, 'Sanza Vittria', 30000, 1),
(11, 'Hoodie (15000)', '2020-12-16', '2020-12-17', 5, 'Gina Hapshah', 75000, 1),
(12, 'Hoodie (15000)', '2021-04-12', '2021-02-02', 4, 'Rob Sandy', 60000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `alamat`, `telp`, `foto`, `level`, `is_active`) VALUES
(1, 'Agri Syahrial', 'griagri', '$2a$10$B8TgXwiyWpH7KzxuHe0y5u1tEnX.CFT9z3uttpvnIp.9r0euLtcSm', 'Jl. Buah Batu Bandung', '081317510751', 'user.png', 1, 1),
(2, 'Adelya Astari', 'adelya', '$2a$10$B8TgXwiyWpH7KzxuHe0y5u1tEnX.CFT9z3uttpvnIp.9r0euLtcSm', 'Jl. Buah Batu Bandung', '081327511751', 'user.png', 1, 1),
(9, 'Emily', 'emily', '$2y$10$6o3vHst6r9Xs9TZb/Ufjt.kTBYsCJBA7hG0HYLmm8mitRGRSfP.oa', 'Jl. Buah Batu Bandung', '081317171952', 'user.png', 2, 1),
(10, 'Oliver', 'oliver', '$2y$10$sQhPQk6rP5j1vvsfzc7S2utWgxMQoU4idyQAVyLjxogR0S/xDzOWK', 'Jl. Buah Batu Bandung', '085676492254', 'user.png', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
