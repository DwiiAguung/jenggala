-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 02:24 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jenggala`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_katalog_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `nama`, `harga`, `stok`, `gambar`, `deskripsi`, `kategori_katalog_id`, `created_at`, `updated_at`) VALUES
(1, 'Kopi Susu', 12000, 10, 'C:\\Users\\danna\\AppData\\Local\\Temp\\phpA48B.tmp', NULL, 2, '2024-12-08 06:18:46', '2024-12-16 14:05:55'),
(2, 'Vanilla Latte', 15000, 10, NULL, NULL, 2, '2024-12-08 06:18:46', '2024-12-08 06:18:46'),
(3, 'Milo Kopi Susu', 17000, 5, 'C:\\Users\\danna\\AppData\\Local\\Temp\\php2E01.tmp', NULL, 2, '2024-12-08 06:18:46', '2024-12-16 13:28:23'),
(4, 'Steak', 20000, 10, NULL, NULL, 1, '2024-12-08 06:18:46', '2024-12-08 06:18:46'),
(5, 'Mie Goreng', 10000, 10, NULL, NULL, 1, '2024-12-08 06:18:46', '2024-12-08 06:18:46'),
(6, 'Sosis', 7000, 10, NULL, NULL, 1, '2024-12-08 06:18:46', '2024-12-08 06:18:46'),
(11, 'Indomie Rebus', 12000, 10, 'C:\\Users\\danna\\AppData\\Local\\Temp\\phpECDD.tmp', NULL, 1, '2024-12-08 10:43:39', '2024-12-16 13:24:50'),
(30, 'Bubur Kacang Ijo', 17000, 11, 'HusU9a33ZWMuY5C4cPCAMppsI87Hk2xyCPk1lhrk.png', NULL, 1, '2024-12-16 13:44:07', '2024-12-16 13:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `katalog_pesanan`
--

CREATE TABLE `katalog_pesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `katalog_id` bigint UNSIGNED NOT NULL,
  `pesanan_id` bigint UNSIGNED NOT NULL,
  `status_pesanan_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_katalog`
--

CREATE TABLE `kategori_katalog` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_katalog`
--

INSERT INTO `kategori_katalog` (`id`, `nama`, `icon`) VALUES
(1, 'Makanan', 'fa fa-fish'),
(2, 'Minuman', 'fa fa-coffee');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bank Transfer', NULL, NULL),
(2, 'Gopay', NULL, NULL),
(3, 'Dana', NULL, NULL),
(4, 'ShopeePay', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_11_12_072503_create_kategori_katalog_table', 1),
(19, '2022_11_12_073508_create_katalog_table', 1),
(20, '2022_11_12_074248_create_status_pesanan_table', 1),
(21, '2022_11_12_074339_create_status_pembayaran_table', 1),
(22, '2022_11_12_074421_create_voucher_diskon_table', 1),
(23, '2022_11_12_074559_create_pesanan_table', 1),
(24, '2022_11_12_074707_create_katalog_pesanan_table', 1),
(25, '2022_11_12_074929_create_metode_pembayaran_table', 1),
(26, '2022_11_12_074930_create_tagihan_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `status`) VALUES
(1, 'Menunggu Pembayaran'),
(2, 'Pembayaran Berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `status`) VALUES
(1, 'Pesanan Tertunda'),
(2, 'Pesanan Sedang Proses'),
(3, 'Pesanan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` bigint UNSIGNED NOT NULL,
  `pesanan_id` bigint UNSIGNED NOT NULL,
  `total_harga` int NOT NULL,
  `nama_pembayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_diskon_id` bigint UNSIGNED DEFAULT NULL,
  `metode_pembayaran_id` bigint UNSIGNED DEFAULT NULL,
  `status_pembayaran_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `google_id`, `avatar`) VALUES
(1, 'Admin', 'admin@jenggala.com', '$2y$10$wKlznsFPsBSbdlIdnT.OB.jdKUvN1XOLafhhqumJO.WlL7XtJaimu', 'Admin', NULL, NULL),
(2, 'Barista', 'barista@jenggala.com', '$2y$10$54av4T6AHFNvBQZxcBX5Qukn4EEOSY.wFuIGRP67kyCUY7NHLbI3u', 'Barista', NULL, NULL),
(3, 'dwi agung nugroho', 'dan.nax234@gmail.com', 'eyJpdiI6IjVUVnQyVXRjYkNCMUtWS1lSYlB1cUE9PSIsInZhbHVlIjoiWElubWluMTBJM3pOSVkvZUR6YlY5enVzcWlUTkRaUzNmVlcxYUZKNjZRQSs4NXl6VllxODJsTlRhVmhmalBoOCIsIm1hYyI6ImIxOTBkNjFlNzIyOWRmYmViMmJhNmMzZWNlYjE0ZjY1YWQyYWY1Y2VjODJjZDkxMmRlMmE1NjBmZWFhOTRjN2YiLCJ0YWciOiIifQ==', 'Konsumen', '116693568355287347311', 'https://lh3.googleusercontent.com/a/ACg8ocLI4za0b7sGr-uNVHWm0Y-6zp8Hp8Oy5jera-s0t5E4g_FnuQ=s96-c');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_diskon`
--

CREATE TABLE `voucher_diskon` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int NOT NULL,
  `minimal_pembelian_total_harga` int NOT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_diskon`
--

INSERT INTO `voucher_diskon` (`id`, `nama`, `diskon`, `minimal_pembelian_total_harga`, `stok`) VALUES
(1, 'Voucher 1', 10000, 50000, 10),
(2, 'Voucher 2', 1000, 20000, 10),
(3, 'Voucher 3', 20000, 100000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `katalog_nama_harga_unique` (`nama`,`harga`),
  ADD KEY `katalog_kategori_katalog_id_foreign` (`kategori_katalog_id`);

--
-- Indexes for table `katalog_pesanan`
--
ALTER TABLE `katalog_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `katalog_pesanan_katalog_id_foreign` (`katalog_id`),
  ADD KEY `katalog_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `katalog_pesanan_status_pesanan_id_foreign` (`status_pesanan_id`);

--
-- Indexes for table `kategori_katalog`
--
ALTER TABLE `kategori_katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `tagihan_voucher_diskon_id_foreign` (`voucher_diskon_id`),
  ADD KEY `tagihan_metode_pembayaran_id_foreign` (`metode_pembayaran_id`),
  ADD KEY `tagihan_status_pembayaran_id_foreign` (`status_pembayaran_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voucher_diskon`
--
ALTER TABLE `voucher_diskon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `katalog_pesanan`
--
ALTER TABLE `katalog_pesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_katalog`
--
ALTER TABLE `kategori_katalog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher_diskon`
--
ALTER TABLE `voucher_diskon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_kategori_katalog_id_foreign` FOREIGN KEY (`kategori_katalog_id`) REFERENCES `kategori_katalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `katalog_pesanan`
--
ALTER TABLE `katalog_pesanan`
  ADD CONSTRAINT `katalog_pesanan_katalog_id_foreign` FOREIGN KEY (`katalog_id`) REFERENCES `katalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `katalog_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `katalog_pesanan_status_pesanan_id_foreign` FOREIGN KEY (`status_pesanan_id`) REFERENCES `status_pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_metode_pembayaran_id_foreign` FOREIGN KEY (`metode_pembayaran_id`) REFERENCES `metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_status_pembayaran_id_foreign` FOREIGN KEY (`status_pembayaran_id`) REFERENCES `status_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_voucher_diskon_id_foreign` FOREIGN KEY (`voucher_diskon_id`) REFERENCES `voucher_diskon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
