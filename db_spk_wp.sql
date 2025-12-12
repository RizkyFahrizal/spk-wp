-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2025 at 02:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `k1` double(8,2) NOT NULL DEFAULT 0.00,
  `k2` double(8,2) NOT NULL DEFAULT 0.00,
  `k3` double(8,2) NOT NULL DEFAULT 0.00,
  `k4` double(8,2) NOT NULL DEFAULT 0.00,
  `k5` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `jabatan`, `k1`, `k2`, `k3`, `k4`, `k5`, `created_at`, `updated_at`) VALUES
(1, 'Andi Pratama', 'Staff Administrasi', 82.00, 75.00, 88.00, 70.00, 85.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(2, 'Budi Santoso', 'Marketing Officer', 77.00, 68.00, 80.00, 65.00, 78.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(3, 'Citra Maharani', 'HR Staff', 90.00, 82.00, 85.00, 78.00, 89.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(4, 'Dwi Nugroho', 'Operator Produksi', 70.00, 60.00, 72.00, 55.00, 73.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(5, 'Eka Wulandari', 'Supervisor Produksi', 85.00, 79.00, 87.00, 74.00, 84.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(6, 'Fajar Ramadhan', 'IT Support', 76.00, 72.00, 78.00, 69.00, 80.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(7, 'Galih Saputra', 'Quality Control', 88.00, 83.00, 90.00, 82.00, 91.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(8, 'Hani Lestari', 'Kasir', 81.00, 74.00, 83.00, 71.00, 82.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(9, 'Indra Kusuma', 'Analis Data', 92.00, 85.00, 89.00, 80.00, 90.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(10, 'Joko Prasetyo', 'Staff Gudang', 68.00, 62.00, 70.00, 58.00, 72.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(11, 'Kartika Dewi', 'Customer Service', 79.00, 73.00, 82.00, 67.00, 81.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(12, 'Luthfi Hidayat', 'Backend Developer', 87.00, 80.00, 88.00, 76.00, 86.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(13, 'Maya Sari', 'Administrasi Keuangan', 75.00, 69.00, 77.00, 64.00, 76.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(14, 'Nanda Putri', 'Supervisor HR', 84.00, 78.00, 85.00, 73.00, 83.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(15, 'Oka Wirawan', 'Petugas Lapangan', 78.00, 71.00, 80.00, 68.00, 79.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(16, 'Putri Ayu', 'Manager Operasional', 93.00, 88.00, 92.00, 85.00, 94.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(17, 'Qori Ananda', 'Staff Arsip', 72.00, 65.00, 74.00, 60.00, 73.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(18, 'Raka Pradana', 'Koordinator Lapangan', 89.00, 82.00, 87.00, 79.00, 88.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(19, 'Sinta Melati', 'Public Relations', 80.00, 74.00, 83.00, 70.00, 82.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(20, 'Taufik Hidayat', 'Teknisi Mesin', 74.00, 68.00, 76.00, 63.00, 75.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(21, 'Umi Kurnia', 'Spesialis Rekrutmen', 86.00, 79.00, 88.00, 77.00, 87.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(22, 'Vina Anggraini', 'Admin Supplier', 82.00, 76.00, 84.00, 72.00, 83.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(23, 'Wahyu Setiawan', 'Analis Sistem', 88.00, 81.00, 89.00, 78.00, 90.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(24, 'Xena Paramitha', 'Admin Penjualan', 73.00, 67.00, 75.00, 62.00, 74.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(25, 'Yudi Hartono', 'Supervisor Gudang', 83.00, 77.00, 85.00, 73.00, 84.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(26, 'Zahra Nuraini', 'Data Entry', 91.00, 84.00, 90.00, 81.00, 92.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(27, 'Arif Budiman', 'Staff Pembelian', 71.00, 64.00, 73.00, 59.00, 72.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(28, 'Bella Oktaviani', 'Marketing Executive', 85.00, 79.00, 86.00, 75.00, 86.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(29, 'Chandra Wijaya', 'Staf Produksi', 78.00, 72.00, 80.00, 68.00, 79.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(30, 'Dewi Anggun', 'Manager HR', 92.00, 86.00, 91.00, 84.00, 93.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(31, 'Eko Susanto', 'Kurir', 70.00, 63.00, 72.00, 57.00, 71.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(32, 'Farah Nabila', 'Front Desk Officer', 79.00, 73.00, 81.00, 69.00, 80.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(33, 'Gita Permata', 'Content Creator', 87.00, 81.00, 88.00, 77.00, 88.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(34, 'Hendra Gunawan', 'Teknisi Listrik', 74.00, 68.00, 75.00, 63.00, 74.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(35, 'Intan Safitri', 'Supervisor Keuangan', 90.00, 83.00, 89.00, 80.00, 91.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(36, 'Jihan Amelia', 'Customer Support', 81.00, 75.00, 83.00, 71.00, 82.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(37, 'Kevin Aditya', 'Software Engineer', 94.00, 87.00, 93.00, 86.00, 95.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(38, 'Laila Khairunnisa', 'Staff Keuangan', 76.00, 70.00, 78.00, 65.00, 77.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(39, 'Miko Prasetya', 'Supervisor Produksi', 85.00, 79.00, 86.00, 74.00, 85.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(40, 'Nadia Rahmawati', 'Analis Bisnis', 91.00, 85.00, 90.00, 82.00, 92.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(41, 'Cristiano Ronaldo', 'Brand Ambassador', 88.00, 98.00, 100.00, 70.00, 95.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(42, 'Lionel Messi', 'Konsultan Strategi', 86.00, 90.00, 90.00, 89.00, 98.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(43, 'Bambang Pamungkas', 'Pelatih Fisik', 76.00, 84.00, 95.00, 92.00, 87.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(44, 'Madun', 'Koordinator Tim', 88.00, 88.00, 70.00, 96.00, 75.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56'),
(45, 'Ronaldowati', 'Manajer Proyek', 90.00, 90.00, 93.00, 97.00, 96.00, '2025-12-05 03:56:56', '2025-12-05 03:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('benefit','cost') NOT NULL,
  `bobot_w` double(10,4) DEFAULT NULL,
  `bobot` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kode`, `nama`, `jenis`, `bobot_w`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Produktivitas', 'benefit', 5.0000, 0.34, NULL, '2025-12-05 08:22:58'),
(2, 'K2', 'Sikap Kerja', 'benefit', 4.0000, 0.13, NULL, '2025-12-05 08:22:58'),
(3, 'K3', 'Kedisiplinan', 'benefit', 5.0000, 0.34, NULL, '2025-12-05 08:22:58'),
(4, 'K4', 'Absensi', 'cost', 3.0000, 0.05, NULL, '2025-12-05 08:22:58'),
(5, 'K5', 'Kesalahan Kerja', 'cost', 5.0000, 0.13, NULL, '2025-12-05 08:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_ahps`
--

CREATE TABLE `matriks_ahps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id_baris` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id_kolom` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matriks_ahps`
--

INSERT INTO `matriks_ahps` (`id`, `kriteria_id_baris`, `kriteria_id_kolom`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(2, 1, 2, 3.00, '2025-12-05 08:22:27', '2025-12-05 08:22:58'),
(3, 1, 3, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(4, 1, 4, 7.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(5, 1, 5, 3.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(6, 2, 1, 0.33, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(7, 2, 2, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(8, 2, 3, 0.33, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(9, 2, 4, 5.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(10, 2, 5, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(11, 3, 1, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(12, 3, 2, 3.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(13, 3, 3, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(14, 3, 4, 7.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(15, 3, 5, 3.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(16, 4, 1, 0.14, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(17, 4, 2, 0.20, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(18, 4, 3, 0.14, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(19, 4, 4, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(20, 4, 5, 0.75, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(21, 5, 1, 0.33, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(22, 5, 2, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(23, 5, 3, 0.33, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(24, 5, 4, 5.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27'),
(25, 5, 5, 1.00, '2025-12-05 08:22:27', '2025-12-05 08:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_25_171912_create_kriterias_table', 1),
(6, '2025_11_25_171933_create_karyawans_table', 1),
(7, '2025_11_25_171941_create_nilais_table', 1),
(8, '2025_12_05_110525_add_bobot_w_to_kriterias_table', 2),
(9, '2025_12_05_151900_create_matriks_ahps_table', 3),
(10, '2025_12_05_152530_create_riwayats_table', 4),
(11, '2025_12_05_152546_create_riwayat_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_hitung` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayats`
--

INSERT INTO `riwayats` (`id`, `tanggal_hitung`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2025-12-05 08:35:03', 'Perhitungan 2 Karyawan', '2025-12-05 08:35:03', '2025-12-05 08:35:03'),
(2, '2025-12-05 08:54:54', 'Perhitungan 2 Karyawan', '2025-12-05 08:54:54', '2025-12-05 08:54:54'),
(3, '2025-12-05 08:59:26', 'Perhitungan 2 Karyawan', '2025-12-05 08:59:26', '2025-12-05 08:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_details`
--

CREATE TABLE `riwayat_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `riwayat_id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nilai_v` double(10,4) NOT NULL,
  `ranking` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_details`
--

INSERT INTO `riwayat_details` (`id`, `riwayat_id`, `nama_karyawan`, `nilai_v`, `ranking`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andi Pratama', 0.5129, 1, 'Direkomendasikan', '2025-12-05 08:35:03', '2025-12-05 08:35:03'),
(2, 1, 'Budi Santoso', 0.4871, 2, 'Direkomendasikan', '2025-12-05 08:35:03', '2025-12-05 08:35:03'),
(3, 2, 'Fajar Ramadhan', 0.5179, 1, 'Direkomendasikan', '2025-12-05 08:54:54', '2025-12-05 08:54:54'),
(4, 2, 'Joko Prasetyo', 0.4821, 2, 'Direkomendasikan', '2025-12-05 08:54:54', '2025-12-05 08:54:54'),
(5, 3, 'Lionel Messi', 0.5022, 1, 'Direkomendasikan', '2025-12-05 08:59:26', '2025-12-05 08:59:26'),
(6, 3, 'Miko Prasetya', 0.4978, 2, 'Direkomendasikan', '2025-12-05 08:59:26', '2025-12-05 08:59:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriks_ahps`
--
ALTER TABLE `matriks_ahps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_details`
--
ALTER TABLE `riwayat_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_details_riwayat_id_foreign` (`riwayat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matriks_ahps`
--
ALTER TABLE `matriks_ahps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_details`
--
ALTER TABLE `riwayat_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_details`
--
ALTER TABLE `riwayat_details`
  ADD CONSTRAINT `riwayat_details_riwayat_id_foreign` FOREIGN KEY (`riwayat_id`) REFERENCES `riwayats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
