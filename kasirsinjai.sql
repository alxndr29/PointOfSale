-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 02:21 PM
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
-- Database: `kasirsinjai`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `barcode`, `nama`, `hargajual`, `hargabeli`, `stok`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, '123456789123', 'Coca Cola 1500 ml', 15000, 14050, 58, 2, '2020-12-17 08:49:48', '2021-01-05 21:38:18'),
(2, '123456789121', 'Aqua 600 ml', 6000, 5550, 41, 2, '2020-12-17 08:50:49', '2021-02-04 07:05:17'),
(9, '123456789124', 'Pocky 100gr', 10000, 7050, 23, 3, '2020-12-21 06:14:41', '2021-01-05 19:42:53'),
(10, '123456789125', 'Lifebuoy Merah', 5000, 3050, 27, 5, '2020-12-21 20:05:25', '2021-02-04 07:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Minuman', '2020-12-17 08:47:45', '2020-12-17 08:47:45'),
(3, 'Makanan', '2020-12-21 06:13:20', '2020-12-21 06:13:45'),
(5, 'Sabun Mandi', '2020-12-21 20:05:00', '2020-12-21 20:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notabelidetil`
--

CREATE TABLE `notabelidetil` (
  `id_notabeli` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notabelidetil`
--

INSERT INTO `notabelidetil` (`id_notabeli`, `id_barang`, `jumlah`, `harga`) VALUES
(4, 1, 2, 27000),
(5, 2, 1, 5000),
(6, 1, 1, 13000),
(7, 2, 10, 55000),
(8, 9, 2, 14000),
(9, 1, 1, 13000),
(10, 10, 1, 3000),
(12, 9, 12, 84600),
(12, 2, 12, 66600),
(12, 1, 12, 168600),
(12, 10, 12, 36600),
(13, 1, 24, 337200);

-- --------------------------------------------------------

--
-- Table structure for table `notabelis`
--

CREATE TABLE `notabelis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipebayar` enum('Cash','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahhari` int(11) DEFAULT 0,
  `jatuhtempo` date DEFAULT NULL,
  `terverifikasi` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notabelis`
--

INSERT INTO `notabelis` (`id`, `tipebayar`, `jumlahhari`, `jatuhtempo`, `terverifikasi`, `status`, `suplier_id`, `created_at`, `updated_at`) VALUES
(4, 'Kredit', 7, '2020-12-19', 'no', 'Selesai', 1, '2020-12-17 09:06:53', '2020-12-17 09:08:03'),
(5, 'Kredit', 7, '2020-12-28', 'no', 'Selesai', 1, '2020-12-21 06:19:16', '2020-12-21 06:20:17'),
(6, 'Cash', NULL, NULL, 'no', 'Selesai', 1, '2020-12-21 06:21:48', '2020-12-21 06:21:56'),
(7, 'Cash', NULL, NULL, 'no', 'Selesai', 1, '2020-12-21 20:10:42', '2020-12-21 20:11:36'),
(8, 'Kredit', 7, '2021-01-11', 'no', 'Selesai', 1, '2021-01-04 09:14:36', '2021-01-04 09:17:06'),
(9, 'Cash', NULL, NULL, 'no', 'Selesai', 1, '2021-01-04 09:15:48', '2021-01-04 09:18:25'),
(10, 'Cash', NULL, NULL, 'no', 'Selesai', 1, '2021-01-04 09:16:30', '2021-01-04 09:19:38'),
(12, 'Cash', NULL, NULL, 'no', 'Selesai', 1, '2021-01-05 19:38:59', '2021-01-05 19:42:53'),
(13, 'Kredit', 4, '2021-01-10', 'no', 'Selesai', 1, '2021-01-05 19:48:41', '2021-01-05 20:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `notajualdetil`
--

CREATE TABLE `notajualdetil` (
  `notajual_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `hargamodal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notajualdetil`
--

INSERT INTO `notajualdetil` (`notajual_id`, `barang_id`, `jumlah`, `harga`, `hargamodal`) VALUES
(2, 2, 1, 5000, 4000),
(3, 1, 1, 15000, 13000),
(6, 1, 1, 15000, 13000),
(8, 1, 1, 15000, 14050),
(9, 2, 1, 6000, 5550),
(9, 10, 1, 5000, 3050);

-- --------------------------------------------------------

--
-- Table structure for table `notajuals`
--

CREATE TABLE `notajuals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notajuals`
--

INSERT INTO `notajuals` (`id`, `tanggal`, `pelanggan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2020-12-17 23:13:15', 1, 2, '2020-12-17 09:13:15', '2020-12-17 09:13:15'),
(3, '2020-12-18 10:54:22', 1, 1, '2020-12-17 20:54:22', '2020-12-17 20:54:22'),
(6, '2021-01-03 20:59:21', 1, 1, '2021-01-03 06:59:21', '2021-01-03 06:59:21'),
(8, '2021-01-06 11:38:18', 1, 2, '2021-01-05 21:38:18', '2021-01-05 21:38:18'),
(9, '2021-02-04 23:05:17', 1, 1, '2021-02-04 07:05:17', '2021-02-04 07:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Pelanggan Umum', 'Toko Sinjai', '000000', '2020-12-17 08:53:41', '2021-01-05 07:36:47'),
(4, 'Richardo Barrett', 'Rungkut Mejoyo Sleatan V No. 3', '08123321', '2021-01-05 08:13:58', '2021-01-05 08:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Alam Jaya Corp', 'Kokos Raya No. 35', '08123321', '2020-12-17 08:52:24', '2020-12-17 08:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Pemilik','Kasir','Umum','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', 'Pemilik', NULL, '$2y$10$FrLb6afTJg.gMWz3BIt5je58/W3RvUTfOnR12VXXL2y2pQ87CBHXC', NULL, '2020-12-17 06:55:07', '2020-12-17 06:55:07'),
(2, 'Evan', 'epan@epan.com', 'Kasir', NULL, '$2y$10$mb20kyO7ZqqCByDeyUWb3uzoDOuui5PGKXJjg9jCxsqFi25zTbteO', NULL, '2020-12-17 07:08:33', '2021-01-05 21:37:59'),
(4, 'Tanto', 'tantod@tantod.com', 'Umum', NULL, '$2y$10$kOang3JYwBYej0J4DjpSg.bo4eYT.mMSrdKaAze4hVRKouW2HM9eG', NULL, '2021-02-04 06:28:24', '2021-02-04 06:28:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notabelidetil`
--
ALTER TABLE `notabelidetil`
  ADD KEY `notabelidetil_id_notabeli_foreign` (`id_notabeli`),
  ADD KEY `notabelidetil_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `notabelis`
--
ALTER TABLE `notabelis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notabelis_suplier_id_foreign` (`suplier_id`);

--
-- Indexes for table `notajualdetil`
--
ALTER TABLE `notajualdetil`
  ADD KEY `notajualdetil_id_notajual_foreign` (`notajual_id`),
  ADD KEY `notajualdetil_id_barang_foreign` (`barang_id`);

--
-- Indexes for table `notajuals`
--
ALTER TABLE `notajuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notajuals_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `notajuals_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notabelis`
--
ALTER TABLE `notabelis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notajuals`
--
ALTER TABLE `notajuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `notabelidetil`
--
ALTER TABLE `notabelidetil`
  ADD CONSTRAINT `notabelidetil_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `notabelidetil_id_notabeli_foreign` FOREIGN KEY (`id_notabeli`) REFERENCES `notabelis` (`id`);

--
-- Constraints for table `notabelis`
--
ALTER TABLE `notabelis`
  ADD CONSTRAINT `notabelis_suplier_id_foreign` FOREIGN KEY (`suplier_id`) REFERENCES `supliers` (`id`);

--
-- Constraints for table `notajualdetil`
--
ALTER TABLE `notajualdetil`
  ADD CONSTRAINT `notajualdetil_id_barang_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `notajualdetil_id_notajual_foreign` FOREIGN KEY (`notajual_id`) REFERENCES `notajuals` (`id`);

--
-- Constraints for table `notajuals`
--
ALTER TABLE `notajuals`
  ADD CONSTRAINT `notajuals_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`),
  ADD CONSTRAINT `notajuals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
