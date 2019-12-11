-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2019 pada 19.25
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_owner` bigint(20) UNSIGNED NOT NULL,
  `name_building` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_building` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` bigint(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `proyektor` tinyint(1) NOT NULL,
  `toilet` tinyint(1) NOT NULL,
  `rganti` tinyint(1) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `musholla` tinyint(1) NOT NULL,
  `podium` tinyint(1) NOT NULL,
  `submission` tinyint(1) NOT NULL DEFAULT '1',
  `verif` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`id`, `id_owner`, `name_building`, `address_building`, `cost`, `capacity`, `description`, `files`, `ac`, `proyektor`, `toilet`, `rganti`, `parking`, `musholla`, `podium`, `submission`, `verif`, `edit`, `created_at`, `updated_at`) VALUES
(4, 2, 'Lapangan', 'jember', 5000000, 200, 'Bisa digunakan untuk turnamen', '1575130466__MG_4756.jpg', 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, '2019-11-30 09:14:26', '2019-11-30 19:22:07'),
(5, 2, 'Garuda', 'Gajah Mada', 2700000, 500, 'Hanya Untuk Futsal', '1575145819__MG_5779.jpg', 0, 0, 1, 1, 1, 1, 0, 0, 1, 0, '2019-11-30 13:30:19', '2019-11-30 14:10:40'),
(6, 2, 'PKM', 'Jalan Kalimantan', 500000, 200, 'Hanya cocok untuk kecil kecilan', '1575148083__RpjyTuIps.jpg', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, '2019-11-30 14:08:04', '2019-11-30 14:10:49'),
(7, 2, 'Gor PKPSO', 'Kaliwates', 3000000, 1000, 'Bisa digunakan untuk turnamen', '1575148142__UPRuaOIhA.jpg', 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, '2019-11-30 14:09:02', '2019-11-30 14:10:44'),
(8, 2, 'Serbaguna', 'Kaliwates', 5000000, 800, 'Cocok untuk kegiatan resmi', '1575148193__ZbHwIOIqy.jpg', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2019-11-30 14:09:53', '2019-11-30 19:19:01'),
(9, 2, 'Soetardjo', 'Kalimantan', 600000, 1000, 'Bisa digunakan untuk wisuda', '1575166722_C data transaksi masyarakat.jpg', 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, '2019-11-30 19:18:42', '2019-11-30 19:21:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_10_17_064115_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_10_17_183534_create_gedungs_table', 1),
(5, '2019_11_09_142918_create_rental_table', 1),
(6, '2019_11_09_143350_create_payments_table', 1),
(7, '2019_12_11_144249_create_penyesuaian_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary` bigint(20) NOT NULL,
  `approvement` enum('proses','verifikasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `id_loaner` int(10) UNSIGNED NOT NULL,
  `day_start` date NOT NULL,
  `day_over` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `salary`, `approvement`, `bukti_tf`, `created_at`, `updated_at`, `id_building`, `id_loaner`, `day_start`, `day_over`) VALUES
(10, 5400000, 'verifikasi', 'bukti_tf/zTtL3HEiMezs9egfrIplxQOCVrfrMS3uzHW3lity.jpeg', '2019-12-11 08:04:18', '2019-12-11 08:04:18', 5, 3, '2019-12-11', '2019-12-12'),
(11, 5400000, 'verifikasi', 'bukti_tf/6ESKqHcSG0uBtACR9vboHiJLkuUCwFnD4KfhUz4F.jpeg', '2019-12-11 09:35:40', '2019-12-11 09:35:40', 5, 3, '2019-12-11', '2019-12-12'),
(12, 500000, 'proses', 'bukti_tf/eO4jjLOPsOKdF8h8JmoaTY9CFMOZl2kDT4nAECK4.jpeg', '2019-12-11 09:42:01', '2019-12-11 09:42:01', 6, 3, '2019-12-12', '2019-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `day_start` datetime NOT NULL,
  `day_over` datetime NOT NULL,
  `id_loaner` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rentals`
--

INSERT INTO `rentals` (`id`, `id_building`, `day_start`, `day_over`, `id_loaner`, `created_at`, `updated_at`) VALUES
(24, 7, '2019-12-19 00:00:00', '2019-12-20 00:00:00', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(2, 'owner', '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(3, 'masyarakat', '2019-11-29 03:17:25', '2019-11-29 03:17:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `user_address`, `email`, `phone`, `email_verified_at`, `password`, `id_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'Jl Kenangan 12 Jember', 'admin@gmail.com', '087709307745', NULL, '$2y$10$EP0QTkxRpp5VaWVVnvESlukT2hX3LIMHm84MV3qG2rjSwXKFd8xzm', 1, NULL, '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(2, 'Owner', 'Owner Corp.', 'Jl Kenangan Mantan 13 Jember', 'owner@gmail.com', '089876987954', NULL, '$2y$10$PNjvrQYzYUye6LwizJFAseHEOIRjoIUhu8/SxdKAxyGz8WM50RISa', 2, NULL, '2019-11-29 03:17:26', '2019-12-11 06:34:38'),
(3, 'Masyarakat', NULL, 'Jl Kenangan 12 Jember', 'masyarakat@gmail.com', '081235367890', NULL, '$2y$10$/tGlXxSCJ.RvHOoORUkg/.FRbEj1QUIZlptknXxH43xyyt/l9.GBi', 3, NULL, '2019-11-29 03:17:26', '2019-11-29 03:17:26'),
(4, 'Alifita', NULL, 'Jl Kenangan Mantan 13 Jember', 'alifitamaharani@gmail.com', '089797977899', NULL, '$2y$10$wcJfKEFThv2XSN6SiM6DaeinLZ8k7qal0nSGuQ7v.VJW0XJ/nn0ga', 3, NULL, '2019-12-11 11:21:58', '2019-12-11 11:21:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_id_owner_foreign` (`id_owner`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_building` (`id_building`);

--
-- Indeks untuk tabel `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_id_building_foreign` (`id_building`),
  ADD KEY `rentals_id_loaner_foreign` (`id_loaner`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_id_owner_foreign` FOREIGN KEY (`id_owner`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`);

--
-- Ketidakleluasaan untuk tabel `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_id_building_foreign` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`),
  ADD CONSTRAINT `rentals_id_loaner_foreign` FOREIGN KEY (`id_loaner`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
