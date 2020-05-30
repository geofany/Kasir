-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2020 pada 17.51
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

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
(14, '2020_05_29_173929_create_premiums_table', 1),
(21, '2020_05_29_181301_create_confirm_premiums_table', 2),
(22, '2014_10_12_000000_create_users_table', 3),
(23, '2014_10_12_100000_create_password_resets_table', 3),
(24, '2020_05_04_160303_create_tokos_table', 3),
(25, '2020_05_20_163420_create_produks_table', 3),
(26, '2020_05_20_163518_create_notas_table', 3),
(27, '2020_05_29_143532_create_nota_details_table', 3),
(28, '2020_05_29_182400_create_premias_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_kembalian` int(11) NOT NULL,
  `total_keuntungan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notas`
--

INSERT INTO `notas` (`id`, `toko_id`, `total_bayar`, `total_kembalian`, `total_keuntungan`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 26, 12, '2020-05-30 07:47:05', '2020-05-30 07:47:05'),
(2, 1, 50, 26, 12, '2020-05-30 07:48:33', '2020-05-30 07:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_details`
--

CREATE TABLE `nota_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nota_details`
--

INSERT INTO `nota_details` (`id`, `nota_id`, `produk_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 10, '2020-05-30 07:47:05', '2020-05-30 07:47:05'),
(2, 1, 2, 2, 4, '2020-05-30 07:47:05', '2020-05-30 07:47:05'),
(3, 1, 3, 5, 10, '2020-05-30 07:47:05', '2020-05-30 07:47:05'),
(4, 2, 1, 5, 10, '2020-05-30 07:48:33', '2020-05-30 07:48:33'),
(5, 2, 2, 2, 4, '2020-05-30 07:48:33', '2020-05-30 07:48:33'),
(6, 2, 3, 5, 10, '2020-05-30 07:48:33', '2020-05-30 07:48:33');

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
-- Struktur dari tabel `premiums`
--

CREATE TABLE `premiums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `premiums`
--

INSERT INTO `premiums` (`id`, `user_id`, `bukti_bayar`, `approve`, `created_at`, `updated_at`) VALUES
(1, 2, 'http://localhost:8000/img/bukti\\download.png', 1, '2020-05-29 13:04:31', '2020-05-29 21:50:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `toko_id`, `name`, `harga_jual`, `harga_beli`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'demo', 2, 1, 3, '2020-05-30 07:39:26', '2020-05-30 07:39:26'),
(2, 1, 'demo2', 2, 1, 3, '2020-05-30 07:39:33', '2020-05-30 07:39:33'),
(3, 1, 'demo3', 2, 1, 3, '2020-05-30 07:39:38', '2020-05-30 07:39:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_toko` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tokos`
--

INSERT INTO `tokos` (`id`, `user_id`, `name`, `alamat`, `logo_toko`, `created_at`, `updated_at`) VALUES
(1, 2, 'Idamart', NULL, 'http://localhost:8000/img\\download.png', '2020-05-29 11:57:47', '2020-05-29 12:16:49'),
(2, 3, 'Toko Apa Aja', NULL, 'http://localhost:8000/img/logo.png', '2020-05-30 08:11:49', '2020-05-30 08:11:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `roles`, `name`, `hp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', '1234567890', 'admin@mail.com', NULL, '$2y$10$YNL1RJOWdlCNqfmLApj0xOMjz2n1DnD4gPMxBYiixr/uN.w6g1V5.', NULL, '2020-05-29 11:46:30', '2020-05-29 11:46:30'),
(2, 2, 'Geofany Galindra', '1234567890', 'geofanygalindra@gmail.com', NULL, '$2y$10$jxV0igch79HIQIhliPQlkuKvHdVhtLobtnYiFRgNEhEsUouQpwcQS', NULL, '2020-05-29 11:57:47', '2020-05-29 21:54:35'),
(3, 1, 'Nur Firdausa', '1234567890', 'firdausa@gmail.com', NULL, '$2y$10$W33drhuw2ZDUwx8cKn8VrekT3vARqAP.np7V8ITFHXU9AmeWjslrm', NULL, '2020-05-30 08:11:49', '2020-05-30 08:11:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nota_details`
--
ALTER TABLE `nota_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `premiums`
--
ALTER TABLE `premiums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nota_details`
--
ALTER TABLE `nota_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `premiums`
--
ALTER TABLE `premiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
