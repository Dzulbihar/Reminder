-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 09.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reminder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `email`
--

CREATE TABLE `email` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `email`
--

INSERT INTO `email` (`id`, `email`, `subject`, `body`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'ahmad.dzulbihar69@gmail.com', 'Subject', 'Isi pesan ini adalah', 'Pengirim', NULL, '2022-05-12 05:37:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jenis_request`
--

CREATE TABLE `jenis_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_request` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_request`
--

INSERT INTO `jenis_request` (`id`, `jenis_request`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Aplikasi Deskop', '1', '2022-05-10 16:34:20', '2022-05-10 16:34:20'),
(3, 'Aplikasi Mobile', '1', '2022-05-10 16:34:28', '2022-05-10 16:34:28'),
(4, 'Aplikasi Web', '1', '2022-05-10 16:34:37', '2022-05-10 16:34:37'),
(5, 'Jaringan', '1', '2022-05-10 16:34:48', '2022-05-10 16:34:48'),
(6, 'Hardware', '1', '2022-05-10 16:35:00', '2022-05-10 16:35:00'),
(7, 'Software', '1', '2022-05-10 16:35:06', '2022-05-10 16:35:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Berat', '1', '2022-05-10 16:35:48', '2022-05-10 16:35:48'),
(3, 'Sedang', '1', '2022-05-10 16:36:07', '2022-05-10 16:36:07'),
(4, 'Ringan', '1', '2022-05-10 16:36:11', '2022-05-10 16:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendala`
--

CREATE TABLE `kendala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_request` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendala`
--

INSERT INTO `kendala` (`id`, `jenis_request`, `kategori`, `keterangan`, `keterangan1`, `user_entry`, `target`, `status`, `file_pendukung_1`, `file_pendukung_2`, `file_pendukung_3`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi Mobile', 'Berat', 'Project pembuatan aplikasi mobile untuk mater truk', 'Ada sedikit penambahan dari saya, lebih baik dibuat seperti ini', 'Dzulbihar', '2022-05-26T10:18', '0', '1652226211_truck 3.jpg', NULL, NULL, '2022-05-10 23:43:31', '2022-05-22 09:46:18'),
(2, 'Aplikasi Web', 'Ringan', 'Tolong dibuatkan sistem yang bisa memberikan informasi mengenai kegiatan yang saat ini kita lakukan', NULL, 'Pelindo', '2022-05-18T03:37', '1', NULL, '1652248705_truck 7.jpg', NULL, '2022-05-11 05:58:25', '2022-05-23 04:03:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendala_detail`
--

CREATE TABLE `kendala_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kendala_id` bigint(20) UNSIGNED NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendala_detail`
--

INSERT INTO `kendala_detail` (`id`, `kendala_id`, `parent`, `user_entry`, `komentar`, `file_pendukung`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Pelindo', 'ssss', '1652235996_truck 4.jpg', '2022-05-11 02:26:36', '2022-05-11 02:26:36'),
(22, 2, 0, 'Dzulbihar', 'Model Sistem nya seperti company profile ya pak? atau seperti apa', NULL, '2022-05-11 08:20:45', '2022-05-11 08:20:45'),
(23, 2, 0, 'Rendi Siregar', 'Saran aja pak, sabaiknya sistemnya dibuat seperti ini .... agar hasilnya seperti ini ....', NULL, '2022-05-11 08:22:51', '2022-05-11 08:22:51'),
(24, 2, 23, 'Dzulbihar', 'oh ya pak, seperti itu juga bisa', NULL, '2022-05-11 08:23:15', '2022-05-11 08:23:15'),
(25, 2, 23, 'Pelindo', 'iya coba dibuat dulu, saya mau lihat hasilnya seperti apa', NULL, '2022-05-11 08:23:42', '2022-05-11 08:23:42'),
(26, 2, 0, 'Pelindo', 'bisa dibuatkan sistem seperti contoh dibawah ini', '1652257470_truck 1.jpg', '2022-05-11 08:24:30', '2022-05-11 08:24:30'),
(27, 2, 26, 'Dzulbihar', 'oh siap pak', NULL, '2022-05-11 08:24:41', '2022-05-11 08:24:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendala_history`
--

CREATE TABLE `kendala_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_entry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_request` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_history`
--

CREATE TABLE `login_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login_history`
--

INSERT INTO `login_history` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(11, 'Pelindo', 'pelindosemarang3@gmail.com', '2022-05-23 00:25:10', '2022-05-23 00:25:10'),
(12, 'Pelindo', 'pelindosemarang3@gmail.com', '2022-05-23 03:25:10', '2022-05-23 03:25:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_10_232225_create_kendala_table', 2),
(5, '2022_05_10_232319_create_jenis_request_table', 2),
(6, '2022_05_10_232344_create_kategori_table', 2),
(7, '2022_05_10_232511_create_kendala_history_table', 2),
(8, '2022_05_10_232534_create_kendala_detail_table', 2),
(9, '2022_05_12_113153_create_email_table', 3),
(10, '2022_05_21_154940_create_login_history_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Pelindo', 'pelindosemarang3@gmail.com', NULL, '$2y$10$9lBaiRTv6JRSA.nOhZByYuoUx9NZ1a8XaDCszdu5JljJTBDQqmn5S', '1', 'wM0FB3TpQOLVqrASgsbHnitqKHTSGZZR9VUnuwYWgJ805rzOAOJklg6piGhm', '2022-05-10 15:58:34', '2022-05-10 16:21:05'),
(2, 'User', 'Dzulbihar', 'ahmad.dzulbihar69@gmail.com', NULL, '$2y$10$0Wo6Qipw5UDlQbgYwvdA1.ySdvsIYv0fjp3GJfKAIMt3CoGABDUNq', '1', NULL, '2022-05-10 16:29:45', '2022-05-10 16:29:52'),
(4, 'User', 'Rendi Siregar', 'dzulbiharfer@gmail.com', NULL, '$2y$10$X9OxUHnftv2X2DdBBGAYdu8sG7PNDDfk/0Nlg4TQ5CUHX.Xt23vYS', '1', NULL, '2022-05-11 08:22:04', '2022-05-11 08:22:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_request`
--
ALTER TABLE `jenis_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendala`
--
ALTER TABLE `kendala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendala_detail`
--
ALTER TABLE `kendala_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendala_history`
--
ALTER TABLE `kendala_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `email`
--
ALTER TABLE `email`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_request`
--
ALTER TABLE `jenis_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendala`
--
ALTER TABLE `kendala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kendala_detail`
--
ALTER TABLE `kendala_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kendala_history`
--
ALTER TABLE `kendala_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
