-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2026 pada 11.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillsync_final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_detail_kepribadian`
--

CREATE TABLE `hasil_detail_kepribadian` (
  `id` int(11) NOT NULL,
  `hasil_tes_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_detail_kepribadian`
--

INSERT INTO `hasil_detail_kepribadian` (`id`, `hasil_tes_id`, `kategori_id`, `skor`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 5, '2026-06-04 11:04:59', '2026-06-04 11:04:59'),
(2, 17, 2, 9, '2026-06-04 11:04:59', '2026-06-04 11:04:59'),
(3, 17, 3, 10, '2026-06-04 11:04:59', '2026-06-04 11:04:59'),
(4, 17, 4, 7, '2026-06-04 11:04:59', '2026-06-04 11:04:59'),
(5, 18, 1, 8, '2026-06-04 11:13:47', '2026-06-04 11:13:47'),
(6, 18, 2, 11, '2026-06-04 11:13:47', '2026-06-04 11:13:47'),
(7, 18, 3, 13, '2026-06-04 11:13:47', '2026-06-04 11:13:47'),
(8, 18, 4, 10, '2026-06-04 11:13:47', '2026-06-04 11:13:47'),
(9, 19, 1, 8, '2026-06-04 11:16:14', '2026-06-04 11:16:14'),
(10, 19, 2, 11, '2026-06-04 11:16:14', '2026-06-04 11:16:14'),
(11, 19, 3, 13, '2026-06-04 11:16:14', '2026-06-04 11:16:14'),
(12, 19, 4, 10, '2026-06-04 11:16:14', '2026-06-04 11:16:14'),
(13, 21, 1, 6, '2026-06-04 23:36:36', '2026-06-04 23:36:36'),
(14, 21, 2, 10, '2026-06-04 23:36:36', '2026-06-04 23:36:36'),
(15, 21, 3, 2, '2026-06-04 23:36:36', '2026-06-04 23:36:36'),
(16, 21, 4, 3, '2026-06-04 23:36:36', '2026-06-04 23:36:36'),
(17, 22, 1, 2, '2026-06-05 01:17:31', '2026-06-05 01:17:31'),
(18, 22, 2, 2, '2026-06-05 01:17:31', '2026-06-05 01:17:31'),
(19, 22, 3, 3, '2026-06-05 01:17:31', '2026-06-05 01:17:31'),
(20, 22, 4, 2, '2026-06-05 01:17:31', '2026-06-05 01:17:31'),
(21, 23, 1, 2, '2026-06-05 01:19:16', '2026-06-05 01:19:16'),
(22, 23, 2, 3, '2026-06-05 01:19:16', '2026-06-05 01:19:16'),
(23, 23, 3, 2, '2026-06-05 01:19:16', '2026-06-05 01:19:16'),
(24, 23, 4, 2, '2026-06-05 01:19:16', '2026-06-05 01:19:16'),
(25, 26, 1, 4, '2026-06-07 00:43:10', '2026-06-07 00:43:10'),
(26, 26, 2, 3, '2026-06-07 00:43:10', '2026-06-07 00:43:10'),
(27, 26, 3, 2, '2026-06-07 00:43:10', '2026-06-07 00:43:10'),
(28, 26, 4, 2, '2026-06-07 00:43:10', '2026-06-07 00:43:10'),
(29, 33, 1, 3, '2026-06-08 08:11:17', '2026-06-08 08:11:17'),
(30, 33, 2, 3, '2026-06-08 08:11:17', '2026-06-08 08:11:17'),
(31, 33, 3, 4, '2026-06-08 08:11:17', '2026-06-08 08:11:17'),
(32, 33, 4, 3, '2026-06-08 08:11:17', '2026-06-08 08:11:17'),
(33, 36, 1, 2, '2026-06-08 11:04:41', '2026-06-08 11:04:41'),
(34, 36, 2, 4, '2026-06-08 11:04:41', '2026-06-08 11:04:41'),
(35, 36, 3, 4, '2026-06-08 11:04:41', '2026-06-08 11:04:41'),
(36, 36, 4, 4, '2026-06-08 11:04:41', '2026-06-08 11:04:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_detail_skill`
--

CREATE TABLE `hasil_detail_skill` (
  `id` int(11) NOT NULL,
  `hasil_tes_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `level_dicapai` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_detail_skill`
--

INSERT INTO `hasil_detail_skill` (`id`, `hasil_tes_id`, `skill_id`, `skor`, `level_dicapai`, `created_at`, `updated_at`) VALUES
(12, 14, 2, 40, 'Beginner', '2026-06-03 10:36:10', '2026-06-03 10:36:10'),
(13, 15, 1, 60, 'Intermediate', '2026-06-03 10:37:02', '2026-06-03 10:37:02'),
(14, 20, 1, 80, 'Advanced', '2026-06-04 22:34:02', '2026-06-04 22:34:02'),
(15, 27, 1, 80, 'Advanced', '2026-06-07 00:44:22', '2026-06-07 00:44:22'),
(16, 28, 2, 100, 'Advanced', '2026-06-07 00:45:37', '2026-06-07 00:45:37'),
(17, 30, 1, 60, 'Intermediate', '2026-06-07 10:44:02', '2026-06-07 10:44:02'),
(18, 34, 1, 100, 'Advanced', '2026-06-08 08:12:39', '2026-06-08 08:12:39'),
(19, 37, 1, 100, 'Advanced', '2026-06-08 11:07:12', '2026-06-08 11:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_detail_syncpath`
--

CREATE TABLE `hasil_detail_syncpath` (
  `id` int(11) NOT NULL,
  `hasil_tes_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_detail_syncpath`
--

INSERT INTO `hasil_detail_syncpath` (`id`, `hasil_tes_id`, `kategori_id`, `skor`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 10, '2026-06-06 09:16:31', '2026-06-06 09:16:31'),
(2, 24, 2, 10, '2026-06-06 09:16:31', '2026-06-06 09:16:31'),
(3, 24, 3, 10, '2026-06-06 09:16:31', '2026-06-06 09:16:31'),
(4, 25, 1, 10, '2026-06-07 00:37:43', '2026-06-07 00:37:43'),
(5, 25, 2, 20, '2026-06-07 00:37:43', '2026-06-07 00:37:43'),
(6, 25, 3, 10, '2026-06-07 00:37:43', '2026-06-07 00:37:43'),
(7, 29, 1, 10, '2026-06-07 07:46:46', '2026-06-07 07:46:46'),
(8, 29, 2, 20, '2026-06-07 07:46:46', '2026-06-07 07:46:46'),
(9, 29, 3, 10, '2026-06-07 07:46:46', '2026-06-07 07:46:46'),
(10, 31, 1, 10, '2026-06-07 11:02:52', '2026-06-07 11:02:52'),
(11, 31, 2, 20, '2026-06-07 11:02:52', '2026-06-07 11:02:52'),
(12, 31, 3, 10, '2026-06-07 11:02:52', '2026-06-07 11:02:52'),
(13, 32, 1, 10, '2026-06-08 08:10:22', '2026-06-08 08:10:22'),
(14, 32, 2, 20, '2026-06-08 08:10:22', '2026-06-08 08:10:22'),
(15, 32, 3, 10, '2026-06-08 08:10:22', '2026-06-08 08:10:22'),
(16, 35, 1, 10, '2026-06-08 11:00:42', '2026-06-08 11:00:42'),
(17, 35, 2, 20, '2026-06-08 11:00:42', '2026-06-08 11:00:42'),
(18, 35, 3, 10, '2026-06-08 11:00:42', '2026-06-08 11:00:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_tes` enum('skill','kepribadian','akademik') NOT NULL,
  `skor_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_tes`
--

INSERT INTO `hasil_tes` (`id`, `user_id`, `jenis_tes`, `skor_total`, `created_at`) VALUES
(14, 7, 'skill', 40, '2026-06-03 10:36:10'),
(15, 7, 'skill', 60, '2026-06-03 10:37:02'),
(16, 7, 'kepribadian', 13, '2026-06-04 10:51:28'),
(17, 7, 'kepribadian', 23, '2026-06-04 11:04:59'),
(18, 7, 'kepribadian', 29, '2026-06-04 11:13:47'),
(19, 7, 'kepribadian', 29, '2026-06-04 11:16:14'),
(20, 10, 'skill', 80, '2026-06-04 22:34:02'),
(21, 10, 'kepribadian', 12, '2026-06-04 23:36:36'),
(22, 10, 'kepribadian', 9, '2026-06-05 01:17:31'),
(23, 10, 'kepribadian', 9, '2026-06-05 01:19:16'),
(24, 7, 'akademik', 30, '2026-06-06 09:16:31'),
(25, 7, 'akademik', 40, '2026-06-07 00:37:43'),
(26, 7, 'kepribadian', 11, '2026-06-07 00:43:10'),
(27, 7, 'skill', 80, '2026-06-07 00:44:22'),
(28, 7, 'skill', 100, '2026-06-07 00:45:37'),
(29, 7, 'akademik', 40, '2026-06-07 07:46:46'),
(30, 10, 'skill', 60, '2026-06-07 10:44:02'),
(31, 10, 'akademik', 40, '2026-06-07 11:02:52'),
(32, 7, 'akademik', 40, '2026-06-08 08:10:22'),
(33, 7, 'kepribadian', 13, '2026-06-08 08:11:17'),
(34, 7, 'skill', 100, '2026-06-08 08:12:38'),
(35, 7, 'akademik', 40, '2026-06-08 11:00:42'),
(36, 7, 'kepribadian', 14, '2026-06-08 11:04:41'),
(37, 7, 'skill', 100, '2026-06-08 11:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Informatika', '2026-06-03 07:36:31', '2026-06-03 07:36:31'),
(2, 'Sistem Informasi', '2026-06-03 07:36:31', '2026-06-03 07:36:31'),
(3, 'Bisnis Digital', '2026-06-03 07:36:31', '2026-06-03 07:36:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan_skill`
--

CREATE TABLE `jurusan_skill` (
  `id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan_skill`
--

INSERT INTO `jurusan_skill` (`id`, `jurusan_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(2, 1, 2, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(3, 1, 3, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(4, 2, 4, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(5, 2, 5, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(6, 2, 6, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(7, 3, 7, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(8, 3, 8, '2026-06-03 07:54:13', '2026-06-03 07:54:13'),
(9, 3, 9, '2026-06-03 07:54:13', '2026-06-03 07:54:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kepribadian`
--

CREATE TABLE `kategori_kepribadian` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_kepribadian`
--

INSERT INTO `kategori_kepribadian` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Analitis', '2026-06-04 16:01:59', '2026-06-04 16:01:59'),
(2, 'Kreatif', '2026-06-04 16:01:59', '2026-06-04 16:01:59'),
(3, 'Komunikatif', '2026-06-04 16:01:59', '2026-06-04 16:01:59'),
(4, 'Leadership', '2026-06-04 16:01:59', '2026-06-04 16:01:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_syncpath`
--

CREATE TABLE `kategori_syncpath` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_syncpath`
--

INSERT INTO `kategori_syncpath` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Backend Developer', '2026-06-05 09:22:14', '2026-06-05 09:22:14'),
(2, 'Frontend Developer', '2026-06-05 09:22:14', '2026-06-05 09:22:14'),
(3, 'UI/UX Designer', '2026-06-05 09:22:14', '2026-06-05 09:22:14'),
(4, 'Data Analyst', '2026-06-05 09:22:14', '2026-06-05 09:22:14'),
(5, 'Project Manager', '2026-06-05 09:22:14', '2026-06-05 09:22:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_profiles`
--

CREATE TABLE `mahasiswa_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa_profiles`
--

INSERT INTO `mahasiswa_profiles` (`id`, `user_id`, `jurusan_id`, `angkatan`, `created_at`, `updated_at`) VALUES
(2, 7, 1, '2024', '2026-06-03 00:37:14', '2026-06-03 00:37:14'),
(4, 10, 1, '2024', '2026-06-04 07:44:02', '2026-06-04 07:44:02'),
(7, 14, 2, '2025', '2026-06-06 06:59:07', '2026-06-06 06:59:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentor_profiles`
--

CREATE TABLE `mentor_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `bidang_keahlian` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mentor_profiles`
--

INSERT INTO `mentor_profiles` (`id`, `user_id`, `institusi`, `bidang_keahlian`, `created_at`, `updated_at`) VALUES
(1, 5, 'UPN', 'programmer', '2026-06-02 21:37:05', '2026-06-02 21:37:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_kepribadian`
--

CREATE TABLE `opsi_kepribadian` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opsi_kepribadian`
--

INSERT INTO `opsi_kepribadian` (`id`, `soal_id`, `opsi`, `skor`, `created_at`, `updated_at`) VALUES
(17, 1, 'Sangat Tidak Setuju', 1, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(18, 1, 'Tidak Setuju', 2, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(19, 1, 'Setuju', 3, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(20, 1, 'Sangat Setuju', 4, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(21, 2, 'Sangat Tidak Setuju', 1, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(22, 2, 'Tidak Setuju', 2, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(23, 2, 'Setuju', 3, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(24, 2, 'Sangat Setuju', 4, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(25, 3, 'Sangat Tidak Setuju', 1, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(26, 3, 'Tidak Setuju', 2, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(27, 3, 'Setuju', 3, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(28, 3, 'Sangat Setuju', 4, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(29, 4, 'Sangat Tidak Setuju', 1, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(30, 4, 'Tidak Setuju', 2, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(31, 4, 'Setuju', 3, '2026-06-04 16:17:12', '2026-06-04 16:17:12'),
(32, 4, 'Sangat Setuju', 4, '2026-06-04 16:17:12', '2026-06-04 16:17:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_syncpath`
--

CREATE TABLE `opsi_syncpath` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `teks_opsi` varchar(255) NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opsi_syncpath`
--

INSERT INTO `opsi_syncpath` (`id`, `soal_id`, `teks_opsi`, `skor`, `created_at`, `updated_at`) VALUES
(5, 11, 'Pemecah masalah', 10, '2026-06-06 15:44:22', '2026-06-06 15:44:22'),
(6, 11, 'Dokter', 0, '2026-06-06 15:44:22', '2026-06-06 15:44:22'),
(7, 11, 'Guru', 0, '2026-06-06 15:44:22', '2026-06-06 15:44:22'),
(8, 11, 'Atlet', 0, '2026-06-06 15:44:22', '2026-06-06 15:44:22'),
(9, 12, 'Lingkaran', 0, '2026-06-06 15:44:53', '2026-06-06 15:44:53'),
(10, 12, 'Segitiga', 10, '2026-06-06 15:44:53', '2026-06-06 15:44:53'),
(11, 12, 'Persegi', 0, '2026-06-06 15:44:53', '2026-06-06 15:44:53'),
(12, 12, 'Persegi Panjang', 0, '2026-06-06 15:44:53', '2026-06-06 15:44:53'),
(13, 13, '40', 0, '2026-06-06 15:45:24', '2026-06-06 15:45:24'),
(14, 13, '41', 0, '2026-06-06 15:45:24', '2026-06-06 15:45:24'),
(15, 13, '42', 10, '2026-06-06 15:45:24', '2026-06-06 15:45:24'),
(16, 13, '43', 0, '2026-06-06 15:45:24', '2026-06-06 15:45:24'),
(17, 14, '84', 0, '2026-06-06 15:45:55', '2026-06-06 15:45:55'),
(18, 14, '96', 10, '2026-06-06 15:45:55', '2026-06-06 15:45:55'),
(19, 14, '98', 0, '2026-06-06 15:45:55', '2026-06-06 15:45:55'),
(20, 14, '108', 0, '2026-06-06 15:45:55', '2026-06-06 15:45:55'),
(21, 15, 'Mengidentifikasi penyebab penurunan', 10, '2026-06-06 15:46:20', '2026-06-06 15:46:20'),
(22, 15, 'Menambah pegawai baru', 0, '2026-06-06 15:46:20', '2026-06-06 15:46:20'),
(23, 15, 'Membeli gedung baru', 0, '2026-06-06 15:46:20', '2026-06-06 15:46:20'),
(24, 15, 'Mengubah logo perusahaan', 0, '2026-06-06 15:46:20', '2026-06-06 15:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_kerja`
--

CREATE TABLE `posisi_kerja` (
  `id` int(11) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kategori_syncpath_id` int(11) DEFAULT NULL,
  `kategori_kepribadian_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posisi_kerja`
--

INSERT INTO `posisi_kerja` (`id`, `nama_posisi`, `deskripsi`, `created_at`, `updated_at`, `kategori_syncpath_id`, `kategori_kepribadian_id`) VALUES
(1, 'Backend Developer', 'Mengembangkan API, database, dan logika backend aplikasi.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 1, 1),
(2, 'Laravel Developer', 'Mengembangkan aplikasi web menggunakan framework Laravel.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 1, 1),
(3, 'Frontend Developer', 'Mengembangkan tampilan antarmuka website dan aplikasi.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 2, 2),
(4, 'React Developer', 'Mengembangkan frontend modern menggunakan React.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 2, 2),
(5, 'UI Designer', 'Membuat desain antarmuka aplikasi yang menarik.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 3, 2),
(6, 'UX Researcher', 'Melakukan riset pengalaman pengguna dan kebutuhan user.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 3, 3),
(7, 'Data Analyst', 'Menganalisis data dan membuat insight bisnis.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 4, 1),
(8, 'Business Intelligence Analyst', 'Mengolah data untuk mendukung pengambilan keputusan.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 4, 1),
(9, 'Project Manager', 'Mengelola tim dan proyek pengembangan sistem.', '2026-06-07 16:24:52', '2026-06-07 16:24:52', 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_magang`
--

CREATE TABLE `posisi_magang` (
  `id` int(11) NOT NULL,
  `kategori_syncpath_id` int(11) NOT NULL,
  `nama_posisi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posisi_magang`
--

INSERT INTO `posisi_magang` (`id`, `kategori_syncpath_id`, `nama_posisi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Backend Developer Intern', 'Magang pengembangan API, database, dan logika backend', NULL, NULL),
(2, 1, 'Laravel Developer Intern', 'Magang pengembangan aplikasi web menggunakan Laravel', NULL, NULL),
(3, 1, 'Software Engineer Intern', 'Magang pengembangan perangkat lunak backend', NULL, NULL),
(4, 2, 'Frontend Developer Intern', 'Magang pengembangan antarmuka pengguna web', NULL, NULL),
(5, 2, 'React Developer Intern', 'Magang pengembangan frontend menggunakan React', NULL, NULL),
(6, 2, 'Web Designer Intern', 'Magang desain dan implementasi tampilan web', NULL, NULL),
(7, 3, 'UI/UX Designer Intern', 'Magang perancangan user interface dan user experience', NULL, NULL),
(8, 3, 'Product Designer Intern', 'Magang desain produk digital dan prototype', NULL, NULL),
(9, 3, 'UX Research Intern', 'Magang penelitian kebutuhan dan perilaku pengguna', NULL, NULL),
(10, 4, 'Data Analyst Intern', 'Magang analisis dan visualisasi data', NULL, NULL),
(11, 4, 'Business Intelligence Intern', 'Magang pengolahan data untuk pengambilan keputusan', NULL, NULL),
(12, 4, 'Data Reporting Intern', 'Magang pembuatan laporan dan dashboard data', NULL, NULL),
(13, 5, 'Project Management Intern', 'Magang pengelolaan proyek teknologi', NULL, NULL),
(14, 5, 'IT Project Coordinator Intern', 'Magang koordinasi tim dan aktivitas proyek', NULL, NULL),
(15, 5, 'Product Management Intern', 'Magang pengelolaan produk digital', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `nama_proyek` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('repository','pending','selesai','ditolak') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_proyek` varchar(255) DEFAULT NULL,
  `feedback_mentor` tinyint(3) UNSIGNED DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  `tipe_project` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id`, `user_id`, `mentor_id`, `nama_proyek`, `deskripsi`, `status`, `created_at`, `updated_at`, `file_proyek`, `feedback_mentor`, `nilai`, `feedback`, `score`, `tipe_project`) VALUES
(3, 5, NULL, 'bisnis', 'skillsync', 'repository', '2026-06-06 10:41:43', '2026-06-06 10:41:43', 'projects/T0LguRkykd8FzA8zSconnz74qJW9A53oJgLBgeB1.pdf', NULL, NULL, NULL, NULL, 'repository'),
(4, 5, NULL, 'bisnis', 'ddd', 'repository', '2026-06-06 10:43:47', '2026-06-06 10:43:47', 'projects/9ejE4XiMSxxNmikuaA8WhYZlu8nXLzRsfUEVZREc.pdf', NULL, NULL, NULL, NULL, 'repository'),
(6, 7, NULL, 'bisnis', 'ff', 'selesai', '2026-06-06 20:40:32', '2026-06-08 01:50:22', 'projects/Kwvd0rCtitKTwDKJtbgaXUgnFJRdA9LT0nXDbzyw.pdf', NULL, 76, 'baikk', NULL, 'penilaian'),
(7, 10, NULL, 'bisnis', 'ebisnis', 'repository', '2026-06-08 00:58:12', '2026-06-08 00:58:12', 'projects/MAgQxHA6Nb0Ell9VrS9YrVFDas7uvoDiHIzBdxiv.pdf', NULL, NULL, NULL, NULL, 'repository'),
(8, 10, NULL, 'code', 'rrrr', 'selesai', '2026-06-08 01:39:27', '2026-06-08 01:49:52', 'projects/FnGf9nFx74C5qK19KYdRnNfpPL9GDjNC1jeVtJBo.pdf', NULL, 85, 'baikk', NULL, 'penilaian'),
(9, 5, NULL, 'coding', 'gfhdhfj', 'repository', '2026-06-08 01:51:03', '2026-06-08 01:51:03', 'projects/1Bfh02I86lhL91i43FtoiGEW2eDXiHRTS9xxBIJY.pdf', NULL, NULL, NULL, NULL, 'repository'),
(10, 10, NULL, 'coding', 'gdh', 'selesai', '2026-06-08 02:24:54', '2026-06-08 02:25:55', 'projects/9tgkHjJGzi48yVp49JbJmdjENjeei6PI1BsqbW2o.pdf', NULL, 100, 'baikk sekali', NULL, 'penilaian'),
(11, 7, NULL, 'bisnis', 'skillsync', 'pending', '2026-06-08 11:22:36', '2026-06-08 11:22:36', 'projects/x01p6CzUXqO7EyAdxUvRim4DmozO9B0Xu1PW0yZD.pdf', NULL, NULL, NULL, NULL, 'penilaian'),
(12, 7, NULL, 'coding', 'laravel', 'pending', '2026-06-08 11:23:07', '2026-06-08 11:23:07', 'projects/mlhcuJhKJRZD8Gzw1DughGQQS1xtX0ckTuoenCUt.pdf', NULL, NULL, NULL, NULL, 'penilaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_mentors`
--

CREATE TABLE `proyek_mentors` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `judul_proyek` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_proyek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proyek_mentors`
--

INSERT INTO `proyek_mentors` (`id`, `mentor_id`, `judul_proyek`, `deskripsi`, `file_proyek`, `created_at`, `updated_at`) VALUES
(4, 5, 'code', 'hjjh', 'proyek_mentor/us7l38BkF9QvNm6GrjDjIkZOaDCiv5vJ3yePL7mK.pdf', '2026-06-08 02:21:28', '2026-06-08 02:21:28'),
(6, 5, 'bb', 'gh', 'proyek_mentor/1fqYCedQKxhjPKVZXWo2KBlBmfvIunwIkBrhuse1.pdf', '2026-06-08 02:24:06', '2026-06-08 02:24:06'),
(7, 4, 'bisnis', 'Manajemen Produk', 'proyek_mentor/LRPaYvofjxR8IMXc0TsU6048xxCPeMquuReCJs5A.pdf', '2026-06-08 11:26:17', '2026-06-08 11:26:17'),
(8, 4, 'Analsis Bisnis', 'Proses Bisnis', 'proyek_mentor/cImB8JoWwbryl3eBK1urnBRUJQRZiowKH1E3aIqm.pdf', '2026-06-08 11:26:55', '2026-06-08 11:26:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `nama_skill` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rekomendasi_pengembangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `nama_skill`, `deskripsi`, `created_at`, `updated_at`, `rekomendasi_pengembangan`) VALUES
(1, 'PHP', 'Pemrograman web backend menggunakan PHP', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Pelajari Laravel, API, autentikasi, dan bangun aplikasi web berbasis project nyata.'),
(2, 'Java', 'Pemrograman berorientasi objek', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Perkuat konsep OOP, Collection Framework, dan buat aplikasi desktop atau Android sederhana.'),
(3, 'Database MySQL', 'Pengelolaan basis data', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Latih query SQL lanjutan, normalisasi database, JOIN, VIEW, dan optimasi performa.'),
(4, 'Analisis Sistem', 'Analisis kebutuhan sistem informasi', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Pelajari analisis kebutuhan, pembuatan use case, business process, dan dokumentasi sistem.'),
(5, 'UML', 'Pemodelan sistem menggunakan UML', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Perbanyak latihan membuat Use Case Diagram, Activity Diagram, Sequence Diagram, dan Class Diagram.'),
(6, 'SQL', 'Query dan manipulasi data', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Latih pembuatan query kompleks, subquery, stored procedure, indexing, dan optimasi database.'),
(7, 'SEO', 'Search Engine Optimization', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Pelajari riset keyword, optimasi on-page SEO, technical SEO, dan analisis menggunakan Google Search Console.'),
(8, 'Content Marketing', 'Strategi pemasaran konten', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Perkuat kemampuan copywriting, content planning, content calendar, dan analisis performa konten.'),
(9, 'Digital Advertising', 'Iklan digital dan media sosial', '2026-06-03 07:53:07', '2026-06-07 15:06:39', 'Pelajari Meta Ads, Google Ads, analisis campaign, targeting audience, dan optimasi iklan digital.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_kepribadian`
--

CREATE TABLE `soal_kepribadian` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal_kepribadian`
--

INSERT INTO `soal_kepribadian` (`id`, `kategori_id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saya senang menganalisis masalah sebelum mengambil keputusan.', '2026-06-04 16:07:11', '2026-06-04 16:07:11'),
(2, 2, 'Saya sering menghasilkan ide-ide baru yang berbeda dari orang lain.', '2026-06-04 16:07:11', '2026-06-04 16:07:11'),
(3, 3, 'Saya mudah memulai percakapan dengan orang yang baru dikenal.', '2026-06-04 16:07:11', '2026-06-04 16:07:11'),
(4, 4, 'Saya nyaman memimpin kelompok dalam menyelesaikan tugas.', '2026-06-04 16:07:11', '2026-06-04 16:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_skill`
--

CREATE TABLE `soal_skill` (
  `id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `jawaban_benar` enum('A','B','C','D') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal_skill`
--

INSERT INTO `soal_skill` (`id`, `skill_id`, `pertanyaan`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban_benar`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP merupakan singkatan dari?', 'Personal Home Page', 'Private Home Page', 'Program Home Page', 'Public Home Page', 'A', '2026-06-03 14:28:20', '2026-06-03 14:28:20'),
(2, 1, 'Simbol untuk mengawali variabel PHP adalah?', '#', '@', '$', '%', 'C', '2026-06-03 14:28:20', '2026-06-03 14:28:20'),
(3, 1, 'Fungsi untuk menampilkan output di PHP adalah?', 'print_r', 'output', 'display', 'echo', 'D', '2026-06-03 14:28:20', '2026-06-03 14:28:20'),
(4, 1, 'File PHP biasanya memiliki ekstensi?', '.html', '.php', '.js', '.css', 'B', '2026-06-03 14:28:20', '2026-06-03 14:28:20'),
(5, 1, 'Manakah yang merupakan cara membuat variabel di PHP?', 'nama = \"Budi\";', '$nama = \"Budi\";', 'var nama = \"Budi\";', 'string nama = \"Budi\";', 'B', '2026-06-03 14:28:20', '2026-06-03 14:28:20'),
(6, 2, 'Java pertama kali dikembangkan oleh?', 'Microsoft', 'Sun Microsystems', 'Oracle', 'IBM', 'B', '2026-06-03 14:54:59', '2026-06-03 14:54:59'),
(7, 2, 'File source code Java memiliki ekstensi?', '.java', '.js', '.class', '.jar', 'A', '2026-06-03 14:54:59', '2026-06-03 14:54:59'),
(8, 2, 'Method utama yang dijalankan saat program Java dimulai adalah?', 'start()', 'run()', 'main()', 'execute()', 'C', '2026-06-03 14:54:59', '2026-06-03 14:54:59'),
(9, 2, 'Java termasuk bahasa pemrograman yang bersifat?', 'Procedural saja', 'Object Oriented', 'Markup Language', 'Database Language', 'B', '2026-06-03 14:54:59', '2026-06-03 14:54:59'),
(10, 2, 'Keyword untuk membuat objek baru di Java adalah?', 'class', 'create', 'object', 'new', 'D', '2026-06-03 14:54:59', '2026-06-03 14:54:59'),
(11, 4, 'Tujuan utama analisis sistem adalah?', 'Membuat program', 'Mengidentifikasi kebutuhan pengguna dan sistem', 'Membuat database', 'Membuat jaringan', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(12, 4, 'Dokumen yang berisi kebutuhan sistem disebut?', 'Requirement Specification', 'Source Code', 'Flowchart', 'Deployment Diagram', 'A', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(13, 4, 'Siapa yang bertanggung jawab mengumpulkan kebutuhan pengguna?', 'Programmer', 'Database Administrator', 'System Analyst', 'Network Engineer', 'C', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(14, 4, 'Metode wawancara dalam analisis sistem digunakan untuk?', 'Menghapus data', 'Mengumpulkan kebutuhan pengguna', 'Menginstal aplikasi', 'Membuat program', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(15, 4, 'Output utama dari tahap analisis sistem adalah?', 'Kode Program', 'Spesifikasi Kebutuhan Sistem', 'Database', 'Server', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(16, 5, 'Diagram UML yang digunakan untuk menggambarkan interaksi aktor dengan sistem adalah?', 'Class Diagram', 'Use Case Diagram', 'Activity Diagram', 'Sequence Diagram', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(17, 5, 'Diagram UML yang menggambarkan struktur kelas adalah?', 'Use Case Diagram', 'Activity Diagram', 'Class Diagram', 'Deployment Diagram', 'C', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(18, 5, 'Simbol hubungan pewarisan pada UML disebut?', 'Association', 'Dependency', 'Generalization', 'Aggregation', 'C', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(19, 5, 'Diagram yang menggambarkan alur proses bisnis adalah?', 'Activity Diagram', 'Class Diagram', 'Object Diagram', 'Package Diagram', 'A', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(20, 5, 'Diagram yang menunjukkan urutan komunikasi antar objek adalah?', 'Sequence Diagram', 'Use Case Diagram', 'Class Diagram', 'Component Diagram', 'A', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(21, 6, 'Perintah SQL untuk mengambil data adalah?', 'INSERT', 'UPDATE', 'SELECT', 'DELETE', 'C', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(22, 6, 'Perintah SQL untuk menambahkan data baru adalah?', 'INSERT', 'SELECT', 'ALTER', 'DROP', 'A', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(23, 6, 'Klausa SQL untuk memfilter data adalah?', 'GROUP BY', 'ORDER BY', 'WHERE', 'JOIN', 'C', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(24, 6, 'Perintah SQL untuk mengubah data yang sudah ada adalah?', 'INSERT', 'UPDATE', 'DELETE', 'CREATE', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54'),
(25, 6, 'Perintah SQL untuk menghapus data adalah?', 'DROP', 'DELETE', 'ALTER', 'TRUNCATE', 'B', '2026-06-07 14:44:54', '2026-06-07 14:44:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_syncpath`
--

CREATE TABLE `soal_syncpath` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal_syncpath`
--

INSERT INTO `soal_syncpath` (`id`, `kategori_id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(11, 1, 'Jika semua programmer adalah pemecah masalah dan Andi adalah programmer, maka Andi adalah?', '2026-06-06 15:41:55', '2026-06-06 15:41:55'),
(12, 1, 'Manakah pola berikut yang berbeda?', '2026-06-06 15:41:55', '2026-06-06 15:41:55'),
(13, 2, 'Berapakah hasil dari 25 + 17?', '2026-06-06 15:41:55', '2026-06-06 15:41:55'),
(14, 2, 'Berapakah hasil dari 12 x 8?', '2026-06-06 15:41:55', '2026-06-06 15:41:55'),
(15, 3, 'Sebuah perusahaan mengalami penurunan penjualan selama 3 bulan berturut-turut. Apa langkah pertama yang paling tepat dilakukan?', '2026-06-06 15:41:55', '2026-06-06 15:41:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','mentor','admin') NOT NULL,
  `free_test_used` int(11) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `free_test_used`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'jayy', 'Jay@gmail.com', '$2y$12$3WGKuVfA6hBrIa80j.JIXuysGNxr3i.w/Oe3LmSA/qLcCMZ4ySRWq', 'mentor', 0, 'iJSkjMdzU94zTv3xJ9z93f69iQ2c892BWs9JhWKl7D8Loma5U6Fg91RfAdnN', '2026-06-02 21:35:53', '2026-06-08 18:31:07'),
(5, 'mentor', 'mentor@gmail.com', '$2y$12$Gn5yT4BHoEKTYJd1.OBVG.JRz1Ob5rY0mgioP8RU31TUXf3dhUXKG', 'mentor', 0, 'cIRQ6ZVnWaahUq6nKlDr9yrjAD7nM9gBqUS7pD4NiATJgWQltTlvVDiNo2Kn', '2026-06-02 21:37:05', '2026-06-08 09:24:15'),
(7, 'nana', 'nana@gmail.com', '$2y$12$vnGSLBPNR35JAhdZIgJb4Ol6Efi6319OiBaCRwzDi3fboeK2Q8jnu', 'mahasiswa', 0, 'LWkAYjLCsJxps42XwvwdEtTc2M7caHwDxi3neZr39njLs1VhLxc7B1XqhBuB', '2026-06-03 00:37:14', '2026-06-08 18:23:19'),
(10, 'bela', 'bela@gmail.com', '$2y$12$byizyG9zW.XFziNfg5N7gO8O3N6lcNF2uD.QipP9K30tFa2kUr3Lm', 'mahasiswa', 0, 'rsiLMNMXjKt1W4CsKiVEr5vuqMnwGpPCqmZ5p9OccK19eUfnht1iYsJJkwJl', '2026-06-04 07:44:02', '2026-06-08 09:25:08'),
(11, 'admin', 'admin@gmail.com', '$2y$12$Z1eBp0gSdXHGSoehLd097uftUMfGvqwKZRR3L7nolWe5.wQGLUF0S', 'admin', 0, 'h42OdHI7hDaL7eC4wg7DIIZOF245NM5wI8UaKSDoyyYYBjbAdyz7Z2GR4CNK', '2026-06-05 06:43:02', '2026-06-05 16:24:36'),
(14, 'mahasiswa', 'mahasiswa@gmail.com', '$2y$12$m1AFoCrzJaPMtI1LzzTdpu.1e7HpVEt9wmLkW1biLESAPoHBLJ9Au', 'mahasiswa', 0, '4b3pTtMju03gGHVTs6a7gjXjvOwAo7ZnXdrb9l9XLmBFVlCkU8Z4kM5iWHtF', '2026-06-06 06:59:07', '2026-06-06 16:04:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_detail_kepribadian`
--
ALTER TABLE `hasil_detail_kepribadian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hasil_detail_kepribadian_hasil_tes` (`hasil_tes_id`),
  ADD KEY `fk_hasil_detail_kepribadian_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `hasil_detail_skill`
--
ALTER TABLE `hasil_detail_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hasil_detail_skill_hasil_tes` (`hasil_tes_id`),
  ADD KEY `fk_hasil_detail_skill_skill` (`skill_id`);

--
-- Indeks untuk tabel `hasil_detail_syncpath`
--
ALTER TABLE `hasil_detail_syncpath`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hasil_detail_syncpath_hasil_tes` (`hasil_tes_id`),
  ADD KEY `fk_hasil_detail_syncpath_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hasil_tes_user` (`user_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_jurusan` (`nama_jurusan`);

--
-- Indeks untuk tabel `jurusan_skill`
--
ALTER TABLE `jurusan_skill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_jurusan_skill` (`jurusan_id`,`skill_id`),
  ADD KEY `fk_jurusan_skill_skill` (`skill_id`);

--
-- Indeks untuk tabel `kategori_kepribadian`
--
ALTER TABLE `kategori_kepribadian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_syncpath`
--
ALTER TABLE `kategori_syncpath`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_profiles`
--
ALTER TABLE `mahasiswa_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mahasiswa_user` (`user_id`),
  ADD KEY `fk_mahasiswa_jurusan` (`jurusan_id`);

--
-- Indeks untuk tabel `mentor_profiles`
--
ALTER TABLE `mentor_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mentor_user` (`user_id`);

--
-- Indeks untuk tabel `opsi_kepribadian`
--
ALTER TABLE `opsi_kepribadian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opsi_kepribadian_soal` (`soal_id`);

--
-- Indeks untuk tabel `opsi_syncpath`
--
ALTER TABLE `opsi_syncpath`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indeks untuk tabel `posisi_kerja`
--
ALTER TABLE `posisi_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posisi_magang`
--
ALTER TABLE `posisi_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyek_user` (`user_id`);

--
-- Indeks untuk tabel `proyek_mentors`
--
ALTER TABLE `proyek_mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_kepribadian`
--
ALTER TABLE `soal_kepribadian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soal_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `soal_skill`
--
ALTER TABLE `soal_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soal_skill` (`skill_id`);

--
-- Indeks untuk tabel `soal_syncpath`
--
ALTER TABLE `soal_syncpath`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_detail_kepribadian`
--
ALTER TABLE `hasil_detail_kepribadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `hasil_detail_skill`
--
ALTER TABLE `hasil_detail_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `hasil_detail_syncpath`
--
ALTER TABLE `hasil_detail_syncpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan_skill`
--
ALTER TABLE `jurusan_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_kepribadian`
--
ALTER TABLE `kategori_kepribadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_syncpath`
--
ALTER TABLE `kategori_syncpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_profiles`
--
ALTER TABLE `mahasiswa_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mentor_profiles`
--
ALTER TABLE `mentor_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `opsi_kepribadian`
--
ALTER TABLE `opsi_kepribadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `opsi_syncpath`
--
ALTER TABLE `opsi_syncpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `posisi_kerja`
--
ALTER TABLE `posisi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `posisi_magang`
--
ALTER TABLE `posisi_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `proyek_mentors`
--
ALTER TABLE `proyek_mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `soal_kepribadian`
--
ALTER TABLE `soal_kepribadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soal_skill`
--
ALTER TABLE `soal_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `soal_syncpath`
--
ALTER TABLE `soal_syncpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_detail_kepribadian`
--
ALTER TABLE `hasil_detail_kepribadian`
  ADD CONSTRAINT `fk_hasil_detail_kepribadian_hasil_tes` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_detail_kepribadian_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_kepribadian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_kepribadian_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_kepribadian` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_hasil_kepribadian_tes` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_detail_skill`
--
ALTER TABLE `hasil_detail_skill`
  ADD CONSTRAINT `fk_detail_hasil_tes` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detail_skill` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_hasil_detail_skill_hasil_tes` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_detail_skill_skill` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_detail_syncpath`
--
ALTER TABLE `hasil_detail_syncpath`
  ADD CONSTRAINT `fk_hasil_detail_syncpath_hasil_tes` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_detail_syncpath_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_syncpath` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_detail_syncpath_ibfk_1` FOREIGN KEY (`hasil_tes_id`) REFERENCES `hasil_tes` (`id`),
  ADD CONSTRAINT `hasil_detail_syncpath_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_syncpath` (`id`);

--
-- Ketidakleluasaan untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD CONSTRAINT `fk_hasil_tes_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusan_skill`
--
ALTER TABLE `jurusan_skill`
  ADD CONSTRAINT `fk_jurusan_skill_jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_jurusan_skill_skill` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa_profiles`
--
ALTER TABLE `mahasiswa_profiles`
  ADD CONSTRAINT `fk_mahasiswa_jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mentor_profiles`
--
ALTER TABLE `mentor_profiles`
  ADD CONSTRAINT `fk_mentor_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `opsi_kepribadian`
--
ALTER TABLE `opsi_kepribadian`
  ADD CONSTRAINT `fk_opsi_kepribadian_soal` FOREIGN KEY (`soal_id`) REFERENCES `soal_kepribadian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `opsi_syncpath`
--
ALTER TABLE `opsi_syncpath`
  ADD CONSTRAINT `opsi_syncpath_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal_syncpath` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `fk_proyek_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_kepribadian`
--
ALTER TABLE `soal_kepribadian`
  ADD CONSTRAINT `fk_soal_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_kepribadian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_skill`
--
ALTER TABLE `soal_skill`
  ADD CONSTRAINT `fk_soal_skill` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_syncpath`
--
ALTER TABLE `soal_syncpath`
  ADD CONSTRAINT `soal_syncpath_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_syncpath` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
