-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 08:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status_peminjaman_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok`, `photo`, `status_peminjaman_id`, `created_at`, `updated_at`) VALUES
(12, '123433', 'Barang Teswww', 100, 'barang/20210621050149.png', 2, '2021-06-20 22:01:49', '2021-07-07 22:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `code`, `created_at`, `updated_at`) VALUES
(1, 'IPA', 'ipa12345', '2021-06-19 03:50:06', '2021-07-01 09:32:47'),
(4, 'IPS', '', '2021-06-19 11:33:07', '2021-06-19 11:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-06-18 08:57:34', '2021-06-18 08:58:23'),
(2, 'Kepsek', '2021-06-18 08:57:34', '2021-06-18 08:58:23'),
(3, 'Siswa', '2021-06-18 08:58:04', '2021-06-18 08:58:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `note_barang` text DEFAULT NULL,
  `status_pengajuan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `barang_id`, `users_id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `jumlah`, `note_barang`, `status_pengajuan_id`, `created_at`, `updated_at`) VALUES
(17, 12, 1, '2021-07-09', '2021-07-15', 7, NULL, 3, '2021-07-07 07:13:22', '2021-07-07 07:13:22'),
(18, 12, 1, '2021-07-09', '2021-07-09', 2000, NULL, 3, '2021-07-07 22:39:03', '2021-07-07 22:39:03'),
(19, 12, 1, '2021-07-17', '2021-07-10', 10, NULL, 3, '2021-07-07 22:43:11', '2021-07-07 22:43:11'),
(20, 12, 1, '2021-07-09', '2021-07-17', 91, 'Silahkan Keruangan Neraka dan Ambil cambuknya', 1, '2021-07-07 22:43:47', '2021-07-07 22:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `status_peminjaman`
--

CREATE TABLE `status_peminjaman` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_peminjaman`
--

INSERT INTO `status_peminjaman` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dipinjamkan', '2021-06-21 02:52:30', '2021-06-21 02:52:30'),
(2, 'Dikembalikan', '2021-06-21 02:52:30', '2021-06-21 02:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengajuan`
--

CREATE TABLE `status_pengajuan` (
  `id` int(11) NOT NULL,
  `name_pengajuan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pengajuan`
--

INSERT INTO `status_pengajuan` (`id`, `name_pengajuan`, `created_at`, `updated_at`) VALUES
(1, 'Acc', '2021-06-21 02:51:56', '2021-06-21 02:51:56'),
(2, 'Tidak Acc', '2021-06-21 02:51:56', '2021-06-21 02:51:56'),
(3, 'Diajukan', '2021-07-01 17:45:32', '2021-07-01 17:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `jurusan_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `nis`, `jurusan_id`, `level_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'endijulian080798@gmail.com', 'admin', 0, 0, 1, NULL, '$2y$10$0Cw9CiublTLJiF6bwE8mMOEhqdTkHqEjPZM8n.RkZk.erwoFc/aSK', NULL, '2021-06-18 08:59:16', '2021-06-18 12:35:15'),
(2, 'Kepala Sekolah', 'test@gmail.com', 'kepsek', 1233456768, 1, 2, NULL, '$2y$10$0Cw9CiublTLJiF6bwE8mMOEhqdTkHqEjPZM8n.RkZk.erwoFc/aSK', NULL, '2021-06-18 11:42:30', '2021-07-01 09:33:37'),
(3, 'Siswa', 'endi@gmail.com', 'siswa', 0, 1, 3, NULL, '$2y$10$Mx9djQGbMtsM1hohAQQMh.OMMF9/XWjGa3WYmbSp9Bb7pRM1ajNRi', NULL, '2021-06-18 11:43:36', '2021-07-01 10:05:55'),
(5, 'Siswa Tester', 'rifkyap@bdlwarehouse.com', 'username', 875789872, 1, 3, NULL, '$2y$10$lRJixfm.osnwlOL1HVaBreWMBGp3c46FnnQouLPXe4.cbT4bZt90y', NULL, '2021-07-07 04:24:39', '2021-07-07 04:24:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
