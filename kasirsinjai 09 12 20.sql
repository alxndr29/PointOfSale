-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 05:36 AM
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
(2, '1234512345124', 'Coca Cola Zero 600ml', 150000, 120000, 101, 25, '2020-10-16 07:40:39', '2020-12-08 19:00:09'),
(3, '8765312341234', 'Fuel Pump Assy Innova', 1000000, 130000, 67, 25, '2020-10-17 07:22:29', '2020-12-08 21:33:55'),
(4, '1234512345169', 'Aqua 600ml', 3000, 2000, 293, 30, '2020-12-04 07:08:05', '2020-12-08 20:22:46');

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
(25, 'mmm', '2020-10-16 07:26:44', '2020-10-17 07:28:21'),
(30, 'n', '2020-10-17 07:15:28', '2020-10-17 07:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_09_16_133743_create_kategoris_table', 1),
(10, '2020_09_16_134404_create_barangs_table', 1),
(11, '2020_09_20_040313_create_supliers_table', 2),
(12, '2020_09_20_040435_create_notabelis_table', 3),
(13, '2020_11_13_132118_create_pelanggans_table', 4),
(14, '2020_11_20_144649_create_notajuals_table', 5),
(16, '2020_11_20_150901_create_notajualdetil_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notabelis`
--

CREATE TABLE `notabelis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomornota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipebayar` enum('tunai','kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jatuhtempo` date NOT NULL,
  `terverifikasi` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `suplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(23, 2, 3, 450000, 360000),
(23, 4, 3, 7500, 4500),
(23, 3, 1, 1000000, 130000),
(24, 4, 2, 5000, 3000),
(25, 3, 1, 1000000, 130000);

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
(23, '2020-12-09 09:00:09', 3, 1, '2020-12-08 19:00:09', '2020-12-08 19:00:09'),
(24, '2020-12-09 10:13:35', 2, 1, '2020-12-08 20:13:35', '2020-12-08 20:13:35'),
(25, '2020-12-09 11:33:55', 3, 1, '2020-12-08 21:33:55', '2020-12-08 21:33:55');

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
(2, 'Pelanggan Umum', 'Toko Sinjai', '0000', '2020-11-13 06:58:44', '2020-11-13 07:13:12'),
(3, 'Richardo Hartanto', 'RMS 5 No. 3', '08862312831', '2020-11-20 07:39:23', '2020-11-20 07:39:23');

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
(4, 'Karunia 60', 'kokos raya no 34', '085222211123', '2020-10-17 07:29:35', '2020-11-13 06:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander Evan', 'admin@admin.com', NULL, '$2y$10$E7EcQoNCsY/G4MO0oY.8fuHDNLUhbrCYQOUpvVYk1e9pW1Sf1q4ym', NULL, '2020-11-20 08:03:19', '2020-11-20 08:03:19'),
(3, 'Tantod Sulaemah', 'tantod@tantod.com', NULL, '$2y$10$muH2ZBtkAutR5py79O83Vu/lQ.qc.nxRfnuq/o3H8sF.5FMIYgkOS', NULL, '2020-12-07 08:28:17', '2020-12-07 08:28:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notabelis`
--
ALTER TABLE `notabelis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notajuals`
--
ALTER TABLE `notajuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

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
