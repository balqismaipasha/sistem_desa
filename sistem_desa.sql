-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2022 pada 04.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kk`
--

CREATE TABLE `anggota_kk` (
  `id` int(11) NOT NULL,
  `No_KK` char(20) DEFAULT NULL,
  `nik` char(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_kk`
--

INSERT INTO `anggota_kk` (`id`, `No_KK`, `nik`, `status`) VALUES
(1, '2141523421', '1408044405990011', 'Kepala Keluarga'),
(4, '2141523421', '8765545277597', 'Anak'),
(5, '9878565453', '218931648', 'Kepala Keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `nama_bantuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `nama_bantuan`) VALUES
(1, 'TIDAK DAPAT BANTUAN'),
(3, 'BPJS');

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
-- Struktur dari tabel `kartukeluarga`
--

CREATE TABLE `kartukeluarga` (
  `No_KK` char(20) NOT NULL,
  `nik` char(20) DEFAULT NULL,
  `id_bantuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartukeluarga`
--

INSERT INTO `kartukeluarga` (`No_KK`, `nik`, `id_bantuan`) VALUES
('2141523421', '1408044405990011', 1),
('9878565453', '218931648', 3);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` char(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempatlahir` varchar(50) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `warganegara` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `status_kawin` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `alamat_sebelumnya` text DEFAULT NULL,
  `alamat_sekarang` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `statuspend` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempatlahir`, `tanggallahir`, `agama`, `pendidikan`, `pekerjaan`, `warganegara`, `nama_ayah`, `nama_ibu`, `status_kawin`, `created_at`, `created_by`, `updated_at`, `updated_by`, `alamat_sebelumnya`, `alamat_sekarang`, `email`, `telepon`, `nik_ayah`, `nik_ibu`, `statuspend`, `jk`) VALUES
('1408044405990011', 'Pasha', 'Pekanbaru', '1999-05-04', 'Islam', 'S1/D4', 'BUMN', 'WNI', 'Ayah', 'Ibu', 'Belum Kawin', NULL, NULL, NULL, NULL, 'Marpoyan Damai', 'Perawang', 'balqismaipasha@gmail.com', '085363024064', '140899920131', '123718924701', 'Tetap', 'Laki-Laki'),
('218931648', 'Hani', 'Pekanbaru', '1999-02-12', 'Islam', 'D3', 'Nelayan', 'WNA', 'weaw', 'asasf', 'Belum Kawin', NULL, NULL, NULL, NULL, 'jauh', 'jauh bgt', 'af@gmail.com', '3241321', '341424', '23142', 'Tetap', 'Perempuan'),
('8765545277597', 'nano', 'Perawang', '1999-12-11', 'Budha', 'D3', 'Karyawan Swasta', 'WNA', 'Ayah', 'f', 'Belum Kawin', NULL, NULL, NULL, NULL, 'Marpoyan Damai', 'jauh', 'balqismaipasha@gmail.com', '085363024064', '140899920131', '123718924701', 'Tetap', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@gmail.com', NULL, '$2y$10$3xsLSheMQ1X3dC2aq3ScYu5LkI94J.fgs.1I8qzHO7oC12qGvcH8i', NULL, '2022-06-18 05:30:49', '2022-06-19 19:40:25'),
(2, 'Balqis Maipasha', 'Balqismaipasha@gmail.com', NULL, '$2y$10$x3pHHteiChsSkHXqtK0lvezjm7wD10bRWCVs39GGGMSLUvUKHe21a', NULL, '2022-06-18 05:36:41', '2022-06-18 05:36:41'),
(4, 'Sri', 'sri@gmail.com', NULL, '$2y$10$zmf55ZITz3.WR8BS3nDrB.gXQQpZY4DSxOJ5a5v7LAZb.h5YOvfea', NULL, '2022-06-23 07:48:04', '2022-06-23 08:02:56'),
(5, 'sari', 'sari@gmail.com', NULL, '$2y$10$70rnO1ztMH7DWARDXA7m3edmFXKCLHf3RgCfpe3X1KQIlAsiIQbfS', NULL, '2022-06-26 22:34:17', '2022-06-26 22:34:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `No_KK` (`No_KK`);

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  ADD PRIMARY KEY (`No_KK`),
  ADD KEY `nik` (`nik`),
  ADD KEY `fk_bantuan` (`id_bantuan`);

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
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

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
-- AUTO_INCREMENT untuk tabel `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD CONSTRAINT `anggota_kk_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`),
  ADD CONSTRAINT `anggota_kk_ibfk_2` FOREIGN KEY (`No_KK`) REFERENCES `kartukeluarga` (`No_KK`);

--
-- Ketidakleluasaan untuk tabel `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  ADD CONSTRAINT `fk_bantuan` FOREIGN KEY (`id_bantuan`) REFERENCES `bantuan` (`id_bantuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kartukeluarga_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
