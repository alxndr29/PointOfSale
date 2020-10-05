-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 04:32 AM
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
-- Database: `dbjualbeli`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KodeBarang` char(5) NOT NULL,
  `Barcode` varchar(13) DEFAULT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `HargaJual` int(11) DEFAULT NULL,
  `Stok` smallint(6) DEFAULT NULL,
  `KodeKategori` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KodeBarang`, `Barcode`, `Nama`, `HargaJual`, `Stok`, `KodeKategori`) VALUES
('B0001', '8997035563414', 'Pocari Sweat', 12000, 27, '01'),
('B0002', '8997035563424', 'Orange Squash', 5000, 57, '01'),
('B0003', '0421032464101', 'T-Shirt Pelangi Lengan Pendek', 80000, 27, '03'),
('B0004', '5411026164138', 'Bumbu Ayam Kalasan Royku', 15000, 99, '02'),
('B0005', '5421031164128', 'Kaldu Ayam Magic', 30000, 11, '02'),
('B0006', '5421031164368', 'Keju Cheddar Healthy Choice', 67000, 41, '04'),
('B0007', '8997035564524', 'My Cola', 10000, 75, '01'),
('B0008', '8997035464124', 'Avocado Black Coffee', 15000, 10, '01'),
('B0009', '0421035564301', 'Baju Sekolah SD', 120000, 10, '03'),
('B0010', '0431035715201', 'Kaos Bola', 130000, 5, '03');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `IdJabatan` char(2) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`IdJabatan`, `Nama`) VALUES
('J1', 'Pegawai Pembelian'),
('J2', 'Kasir'),
('J3', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KodeKategori` char(2) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KodeKategori`, `Nama`) VALUES
('01', 'Minuman'),
('02', 'Bumbu Dapur'),
('03', 'Fashion'),
('04', 'Susu dan Olahan'),
('05', 'Daging');

-- --------------------------------------------------------

--
-- Table structure for table `notabeli`
--

CREATE TABLE `notabeli` (
  `NoNota` char(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodeSupplier` int(11) NOT NULL,
  `KodePegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notabeli`
--

INSERT INTO `notabeli` (`NoNota`, `Tanggal`, `KodeSupplier`, `KodePegawai`) VALUES
('20171105001', '2017-11-05 11:15:08', 2, 2),
('20171105002', '2017-11-05 12:17:08', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notabelidetil`
--

CREATE TABLE `notabelidetil` (
  `NoNota` char(11) NOT NULL,
  `KodeBarang` char(5) NOT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Jumlah` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notabelidetil`
--

INSERT INTO `notabelidetil` (`NoNota`, `KodeBarang`, `Harga`, `Jumlah`) VALUES
('20171105001', 'B0003', 50000, 12),
('20171105001', 'B0009', 100000, 24),
('20171105002', 'B0005', 25000, 20),
('20171105002', 'B0006', 60000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `notajual`
--

CREATE TABLE `notajual` (
  `NoNota` char(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodePelanggan` int(11) NOT NULL,
  `KodePegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notajual`
--

INSERT INTO `notajual` (`NoNota`, `Tanggal`, `KodePelanggan`, `KodePegawai`) VALUES
('20171105001', '2017-11-05 11:17:08', 5, 2),
('20171106001', '2017-11-06 11:13:12', 1, 2),
('20171106002', '2017-11-06 11:13:47', 3, 2),
('20171106003', '2017-11-06 11:16:22', 1, 2),
('20171107001', '2017-11-07 11:18:14', 1, 2),
('20171107002', '2017-11-07 11:18:30', 5, 2),
('20171114001', '2017-11-14 09:07:23', 1, 2),
('20171114002', '2017-11-14 09:10:07', 1, 2),
('20171121001', '2017-11-21 12:48:08', 2, 2),
('20171121002', '2017-11-21 12:53:15', 4, 2),
('20171121003', '2017-11-21 12:59:30', 5, 2),
('20171121004', '2017-11-21 01:01:12', 1, 2),
('20171121005', '2017-11-21 01:02:33', 1, 2),
('20171121006', '2017-11-21 06:40:11', 1, 2),
('20171121007', '2017-11-21 06:43:10', 4, 2),
('20171121008', '2017-11-21 07:20:45', 3, 2),
('20171121009', '2017-11-21 07:22:10', 5, 2),
('20171121010', '2017-11-21 07:25:22', 1, 2),
('20171121011', '2017-11-21 07:28:24', 1, 2),
('20171121012', '2017-11-21 07:31:04', 4, 2),
('20171121013', '2017-11-21 07:34:22', 5, 2),
('20171121014', '2017-11-21 07:38:28', 4, 2),
('20171121015', '2017-11-21 07:41:24', 4, 2),
('20171121016', '2017-11-21 09:45:14', 1, 2),
('20171121017', '2017-11-21 10:10:06', 4, 2),
('20171121018', '2017-11-21 10:14:11', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notajualdetil`
--

CREATE TABLE `notajualdetil` (
  `NoNota` char(11) NOT NULL,
  `KodeBarang` char(5) NOT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Jumlah` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notajualdetil`
--

INSERT INTO `notajualdetil` (`NoNota`, `KodeBarang`, `Harga`, `Jumlah`) VALUES
('20171105001', 'B0001', 12000, 5),
('20171105001', 'B0004', 15000, 1),
('20171106001', 'B0001', 12000, 3),
('20171106001', 'B0002', 5000, 2),
('20171106002', 'B0004', 15000, 2),
('20171106002', 'B0005', 30000, 1),
('20171106002', 'B0006', 67000, 4),
('20171106003', 'B0001', 12000, 3),
('20171107001', 'B0003', 80000, 2),
('20171107002', 'B0001', 12000, 1),
('20171107002', 'B0004', 15000, 3),
('20171107002', 'B0006', 67000, 2),
('20171114001', 'B0001', 12000, 2),
('20171114001', 'B0002', 5000, 1),
('20171114001', 'B0004', 15000, 3),
('20171114002', 'B0001', 12000, 2),
('20171114002', 'B0002', 5000, 1),
('20171114002', 'B0004', 15000, 3),
('20171121001', 'B0001', 12000, 2),
('20171121001', 'B0003', 80000, 3),
('20171121002', 'B0001', 12000, 3),
('20171121002', 'B0002', 5000, 2),
('20171121002', 'B0004', 15000, 1),
('20171121003', 'B0001', 12000, 2),
('20171121003', 'B0002', 5000, 3),
('20171121003', 'B0004', 15000, 1),
('20171121003', 'B0007', 10000, 2),
('20171121004', 'B0001', 12000, 1),
('20171121004', 'B0003', 80000, 2),
('20171121004', 'B0004', 15000, 3),
('20171121004', 'B0005', 30000, 2),
('20171121005', 'B0003', 80000, 3),
('20171121005', 'B0006', 67000, 2),
('20171121006', 'B0001', 12000, 1),
('20171121006', 'B0002', 5000, 2),
('20171121006', 'B0006', 67000, 3),
('20171121007', 'B0001', 12000, 3),
('20171121007', 'B0002', 5000, 3),
('20171121007', 'B0004', 15000, 2),
('20171121007', 'B0007', 10000, 3),
('20171121008', 'B0003', 80000, 2),
('20171121008', 'B0004', 15000, 3),
('20171121009', 'B0003', 80000, 2),
('20171121009', 'B0004', 15000, 1),
('20171121010', 'B0002', 5000, 4),
('20171121010', 'B0004', 15000, 2),
('20171121010', 'B0007', 10000, 3),
('20171121011', 'B0002', 5000, 4),
('20171121011', 'B0003', 80000, 3),
('20171121011', 'B0004', 15000, 2),
('20171121011', 'B0006', 67000, 1),
('20171121012', 'B0001', 12000, 2),
('20171121012', 'B0002', 5000, 4),
('20171121012', 'B0003', 80000, 1),
('20171121012', 'B0006', 67000, 3),
('20171121013', 'B0001', 12000, 3),
('20171121013', 'B0002', 5000, 4),
('20171121013', 'B0003', 80000, 2),
('20171121013', 'B0005', 30000, 1),
('20171121013', 'B0006', 67000, 1),
('20171121013', 'B0007', 10000, 12),
('20171121014', 'B0001', 12000, 2),
('20171121014', 'B0002', 5000, 4),
('20171121014', 'B0003', 80000, 1),
('20171121014', 'B0005', 30000, 3),
('20171121014', 'B0006', 67000, 1),
('20171121015', 'B0001', 12000, 2),
('20171121015', 'B0002', 5000, 4),
('20171121015', 'B0003', 80000, 1),
('20171121015', 'B0005', 30000, 3),
('20171121015', 'B0006', 67000, 1),
('20171121016', 'B0001', 12000, 2),
('20171121016', 'B0002', 5000, 4),
('20171121016', 'B0003', 80000, 1),
('20171121016', 'B0005', 30000, 3),
('20171121016', 'B0006', 67000, 1),
('20171121017', 'B0001', 12000, 2),
('20171121017', 'B0002', 5000, 4),
('20171121017', 'B0003', 80000, 1),
('20171121017', 'B0005', 30000, 2),
('20171121017', 'B0006', 67000, 1),
('20171121018', 'B0001', 12000, 1),
('20171121018', 'B0004', 15000, 3),
('20171121018', 'B0007', 10000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `KodePegawai` int(11) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Gaji` bigint(20) DEFAULT NULL,
  `Username` varchar(8) DEFAULT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `IdJabatan` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`KodePegawai`, `Nama`, `TglLahir`, `Alamat`, `Gaji`, `Username`, `Password`, `IdJabatan`) VALUES
(1, 'Nancy', '2017-08-16', 'Tenggilis Mejoyo AA-10', 5000000, 'nancy', 'abc', ''),
(2, 'Andrew', '1977-03-09', 'Raya Darmo 129', 10000000, 'andrew', '1234', ''),
(3, 'Janet', '1987-02-20', 'Darmo Permai Utara X/12', 4000000, 'janet', 'janet123', ''),
(4, 'Margaret', '1984-11-20', 'Raya Kendangsari 200', 4000000, 'margaret', 'margaret', ''),
(5, 'Steven', '1967-03-07', 'Raya Tenggilis 44', 3000000, 'steve', 'steve123', ''),
(6, 'Michael', '1988-07-12', 'Sidosermo Indah Blok A No 12', 3000000, 'michael', '123', ''),
(7, 'Jennifer', '2000-02-17', 'Citraland Taman Gapura Blok C-20 ', 25000000, 'jennifer', '1234567', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `KodePelanggan` int(11) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Telepon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`KodePelanggan`, `Nama`, `Alamat`, `Telepon`) VALUES
(1, 'Pelanggan Umum', '-', '-'),
(2, 'Ana Maria TR', 'Darmo 333', '(085) 83423234'),
(3, 'Anton Mario', 'Raya Diponegoro 123', '(031) 75638234'),
(4, 'PT Around the World', 'Raya Kendangsari 12A', '(031) 34243434'),
(5, 'PT Bahagia Selalu', 'Bukit Darmo Boulevard 124A', '(031) 232344323'),
(6, 'UD Maju Sejati', 'Raya Lontar 34', '(031) 23324422'),
(7, 'Maria', 'Tenggilis', '1234233'),
(8, 'Lina S', 'Ubaya', '1212123323');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `KodeSupplier` int(11) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`KodeSupplier`, `Nama`, `Alamat`) VALUES
(1, 'New Orleans Company', 'P.O. Box 78934'),
(2, 'Cooperativa the Spain', 'MH. Thamrin 55'),
(3, 'UD. Subur Selalu', 'Raya Jemursari 123'),
(4, 'Leka Trading', '22 Jump Street');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KodeBarang`),
  ADD KEY `fk_Produk_Kategori1_idx` (`KodeKategori`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`IdJabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KodeKategori`);

--
-- Indexes for table `notabeli`
--
ALTER TABLE `notabeli`
  ADD PRIMARY KEY (`NoNota`),
  ADD KEY `fk_NotaBeli_Pemasok1_idx` (`KodeSupplier`),
  ADD KEY `fk_NotaBeli_Pegawai1_idx` (`KodePegawai`);

--
-- Indexes for table `notabelidetil`
--
ALTER TABLE `notabelidetil`
  ADD PRIMARY KEY (`NoNota`,`KodeBarang`),
  ADD KEY `fk_NotaBeli_has_Produk_Produk1_idx` (`KodeBarang`),
  ADD KEY `fk_NotaBeli_has_Produk_NotaBeli1_idx` (`NoNota`);

--
-- Indexes for table `notajual`
--
ALTER TABLE `notajual`
  ADD PRIMARY KEY (`NoNota`),
  ADD KEY `fk_NotaJual_Pelanggan1_idx` (`KodePelanggan`),
  ADD KEY `fk_NotaJual_Pegawai1_idx` (`KodePegawai`);

--
-- Indexes for table `notajualdetil`
--
ALTER TABLE `notajualdetil`
  ADD PRIMARY KEY (`NoNota`,`KodeBarang`),
  ADD KEY `fk_NotaJual_has_Produk_Produk1_idx` (`KodeBarang`),
  ADD KEY `fk_NotaJual_has_Produk_NotaJual_idx` (`NoNota`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`KodePegawai`),
  ADD KEY `fk_Pegawai_Jabatan1_idx` (`IdJabatan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`KodePelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KodeSupplier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notabeli`
--
ALTER TABLE `notabeli`
  ADD CONSTRAINT `fk_NotaBeli_Pemasok1` FOREIGN KEY (`KodeSupplier`) REFERENCES `supplier` (`KodeSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notabelidetil`
--
ALTER TABLE `notabelidetil`
  ADD CONSTRAINT `fk_NotaBeli_has_Produk_NotaBeli1` FOREIGN KEY (`NoNota`) REFERENCES `notabeli` (`NoNota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaBeli_has_Produk_Produk1` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notajual`
--
ALTER TABLE `notajual`
  ADD CONSTRAINT `fk_NotaJual_Pelanggan1` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggan` (`KodePelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notajualdetil`
--
ALTER TABLE `notajualdetil`
  ADD CONSTRAINT `fk_NotaJual_has_Produk_NotaJual` FOREIGN KEY (`NoNota`) REFERENCES `notajual` (`NoNota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_NotaJual_has_Produk_Produk1` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
