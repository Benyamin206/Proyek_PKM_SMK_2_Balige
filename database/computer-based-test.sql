-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2025 pada 02.14
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
-- Database: `computer-based-test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bisnis`
--

CREATE TABLE `bisnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `jumlah_pendapatan` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bisnis`
--

INSERT INTO `bisnis` (`id`, `nama`, `username`, `jumlah_pendapatan`, `created_at`, `updated_at`) VALUES
(2, 'smpbudidharm', 'smpbudidharma@school.com', 1200000.00, '2025-03-27 06:59:30', '2025-03-27 07:12:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_course` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_siswa_latihan_soals`
--

CREATE TABLE `jawaban_siswa_latihan_soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Jawaban_siswa` varchar(255) NOT NULL,
  `Correct` tinyint(1) NOT NULL,
  `latihan_soal_id` bigint(20) UNSIGNED NOT NULL,
  `latihan_soal_soal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_siswa_quizzes`
--

CREATE TABLE `jawaban_siswa_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Jawaban_siswa` varchar(255) NOT NULL,
  `Correct` tinyint(1) NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_soal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_siswa_ujians`
--

CREATE TABLE `jawaban_siswa_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Jawaban_siswa` varchar(255) NOT NULL,
  `Correct` tinyint(1) NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_soal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kurikulum` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `latihan_soals`
--

CREATE TABLE `latihan_soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nilai` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `kurikulum_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `latihan_soal_soals`
--

CREATE TABLE `latihan_soal_soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Soal` varchar(255) NOT NULL,
  `Jawaban` varchar(255) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `latihan_soal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mata_pelajaran` varchar(255) NOT NULL,
  `kurikulum_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_18_015604_create_permission_tables', 1),
(5, '2025_03_18_070433_create_courses_table', 1),
(6, '2025_03_18_070441_create_quizzes_table', 1),
(7, '2025_03_18_070450_create_kelas_table', 1),
(8, '2025_03_18_070501_create_kurikulums_table', 1),
(9, '2025_03_18_070503_create_ujians_table', 1),
(10, '2025_03_18_070539_create_mata_pelajarans_table', 1),
(11, '2025_03_18_070610_create_latihan_soals_table', 1),
(12, '2025_03_18_072524_create_quiz_soals_table', 1),
(13, '2025_03_18_072618_create_jawaban_siswa_quizzes_table', 1),
(14, '2025_03_18_072633_create_ujian_soals_table', 1),
(15, '2025_03_18_072701_create_latihan_soal_soals_table', 1),
(16, '2025_03_18_072732_create_jawaban_siswa_ujians_table', 1),
(17, '2025_03_18_072743_create_jawaban_siswa_latihan_soals_table', 1),
(18, '2025_03_25_042111_add_deleted_at_to_roles_table', 1),
(19, '2025_03_26_124038_create_bisnis_table', 1),
(20, '2025_03_26_131345_create_guru_table', 1),
(21, '2025_03_26_134403_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create Operator', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(2, 'view Operator', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(3, 'edit Operator', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(4, 'delete Operator', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(5, 'create Bisnis', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(6, 'view Bisnis', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(7, 'delete Bisnis', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(8, 'create Siswa', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(9, 'view Siswa', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(10, 'edit Siswa', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(11, 'delete Siswa', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(12, 'create Guru', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(13, 'view Guru', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(14, 'edit Guru', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(15, 'delete Guru', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(16, 'create Kelas', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(17, 'view Kelas', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(18, 'edit Kelas', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(19, 'create Kurikulum', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(20, 'view Kurikulum', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(21, 'edit Kurikulum', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(22, 'create Mapel', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(23, 'view Mapel', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(24, 'edit Mapel', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(25, 'delete Mapel', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(26, 'view Course', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(27, 'create Course', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(28, 'edit Course', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(29, 'delete Course', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(30, 'create latihanSoal', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(31, 'view latihanSoal', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(32, 'edit latihanSoal', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(33, 'delete latihanSoal', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(34, 'create Nilai', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(35, 'view Nilai', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06'),
(36, 'edit Nilai', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Waktu_Mulai` datetime NOT NULL,
  `Waktu_Selesai` datetime NOT NULL,
  `Waktu_Lihat` datetime NOT NULL,
  `Nilai` int(11) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_soals`
--

CREATE TABLE `quiz_soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Soal` varchar(255) NOT NULL,
  `Jawaban` varchar(255) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'web', '2025-03-26 19:30:06', '2025-03-26 19:30:06', NULL),
(2, 'Operator', 'web', '2025-03-26 19:30:07', '2025-03-26 19:30:07', NULL),
(3, 'Guru', 'web', '2025-03-26 19:30:07', '2025-03-26 19:30:07', NULL),
(4, 'Siswa', 'web', '2025-03-26 19:30:07', '2025-03-26 19:30:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(9, 3),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(13, 3),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(17, 3),
(17, 4),
(18, 2),
(19, 2),
(20, 2),
(20, 3),
(20, 4),
(21, 2),
(22, 2),
(23, 2),
(23, 3),
(23, 4),
(24, 2),
(25, 2),
(26, 3),
(26, 4),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(31, 4),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(35, 4),
(36, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SGs4YCw7qIyIe1KtJI3ZqnglFs2W07Gt2Y5QfBmm', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmpIUUdiVU9JdXlwWVVwNWpGNk0zNnl2RVptUnpCRmtqbEhVMTZPaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9PcGVyYXRvci9TaXN3YSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1743124004);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujians`
--

CREATE TABLE `ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Waktu_Mulai` datetime NOT NULL,
  `Waktu_Selesai` datetime NOT NULL,
  `Waktu_Lihat` datetime NOT NULL,
  `Nilai` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_soals`
--

CREATE TABLE `ujian_soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Soal` varchar(255) NOT NULL,
  `Jawaban` varchar(255) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$WCMfCbavxCmkoSx0SM./z..REXHBRUWpEBV1Rec4MVMLSPRRTfOi6', NULL, '2025-03-26 19:30:08', '2025-03-26 19:30:08'),
(5, 'smpbudidharma', 'smpbudidharma@school.com', NULL, '$2y$12$8R0H77rQpgwYd8y.vJHkj.9auQlPfwYcAlN3WIBJUFYalFOAMaq/a', NULL, '2025-03-26 23:47:30', '2025-03-27 01:01:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bisnis_username_unique` (`username`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_nama_course_unique` (`nama_course`),
  ADD KEY `courses_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`);

--
-- Indeks untuk tabel `jawaban_siswa_latihan_soals`
--
ALTER TABLE `jawaban_siswa_latihan_soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_siswa_latihan_soals_latihan_soal_id_foreign` (`latihan_soal_id`),
  ADD KEY `jawaban_siswa_latihan_soals_latihan_soal_soal_id_foreign` (`latihan_soal_soal_id`),
  ADD KEY `jawaban_siswa_latihan_soals_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jawaban_siswa_quizzes`
--
ALTER TABLE `jawaban_siswa_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_siswa_quizzes_quiz_id_foreign` (`quiz_id`),
  ADD KEY `jawaban_siswa_quizzes_quiz_soal_id_foreign` (`quiz_soal_id`),
  ADD KEY `jawaban_siswa_quizzes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jawaban_siswa_ujians`
--
ALTER TABLE `jawaban_siswa_ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_siswa_ujians_ujian_id_foreign` (`ujian_id`),
  ADD KEY `jawaban_siswa_ujians_ujian_soal_id_foreign` (`ujian_soal_id`),
  ADD KEY `jawaban_siswa_ujians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`),
  ADD KEY `kelas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kurikulums_nama_kurikulum_unique` (`nama_kurikulum`),
  ADD KEY `kurikulums_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `latihan_soals`
--
ALTER TABLE `latihan_soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latihan_soals_course_id_foreign` (`course_id`),
  ADD KEY `latihan_soals_kurikulum_id_foreign` (`kurikulum_id`),
  ADD KEY `latihan_soals_kelas_id_foreign` (`kelas_id`),
  ADD KEY `latihan_soals_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  ADD KEY `latihan_soals_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `latihan_soal_soals`
--
ALTER TABLE `latihan_soal_soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latihan_soal_soals_latihan_soal_id_foreign` (`latihan_soal_id`),
  ADD KEY `latihan_soal_soals_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_pelajarans_nama_mata_pelajaran_unique` (`nama_mata_pelajaran`),
  ADD KEY `mata_pelajarans_kurikulum_id_foreign` (`kurikulum_id`),
  ADD KEY `mata_pelajarans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `quiz_soals`
--
ALTER TABLE `quiz_soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_soals_quiz_id_foreign` (`quiz_id`),
  ADD KEY `quiz_soals_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indeks untuk tabel `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujians_course_id_foreign` (`course_id`),
  ADD KEY `ujians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `ujian_soals`
--
ALTER TABLE `ujian_soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_soals_ujian_id_foreign` (`ujian_id`),
  ADD KEY `ujian_soals_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_siswa_latihan_soals`
--
ALTER TABLE `jawaban_siswa_latihan_soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_siswa_quizzes`
--
ALTER TABLE `jawaban_siswa_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_siswa_ujians`
--
ALTER TABLE `jawaban_siswa_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `latihan_soals`
--
ALTER TABLE `latihan_soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `latihan_soal_soals`
--
ALTER TABLE `latihan_soal_soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz_soals`
--
ALTER TABLE `quiz_soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ujian_soals`
--
ALTER TABLE `ujian_soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_siswa_latihan_soals`
--
ALTER TABLE `jawaban_siswa_latihan_soals`
  ADD CONSTRAINT `jawaban_siswa_latihan_soals_latihan_soal_id_foreign` FOREIGN KEY (`latihan_soal_id`) REFERENCES `latihan_soals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_latihan_soals_latihan_soal_soal_id_foreign` FOREIGN KEY (`latihan_soal_soal_id`) REFERENCES `latihan_soal_soals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_latihan_soals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_siswa_quizzes`
--
ALTER TABLE `jawaban_siswa_quizzes`
  ADD CONSTRAINT `jawaban_siswa_quizzes_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_quizzes_quiz_soal_id_foreign` FOREIGN KEY (`quiz_soal_id`) REFERENCES `quiz_soals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_siswa_ujians`
--
ALTER TABLE `jawaban_siswa_ujians`
  ADD CONSTRAINT `jawaban_siswa_ujians_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_ujians_ujian_soal_id_foreign` FOREIGN KEY (`ujian_soal_id`) REFERENCES `ujian_soals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_siswa_ujians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD CONSTRAINT `kurikulums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `latihan_soals`
--
ALTER TABLE `latihan_soals`
  ADD CONSTRAINT `latihan_soals_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `latihan_soals_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `latihan_soals_kurikulum_id_foreign` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `latihan_soals_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `latihan_soals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `latihan_soal_soals`
--
ALTER TABLE `latihan_soal_soals`
  ADD CONSTRAINT `latihan_soal_soals_latihan_soal_id_foreign` FOREIGN KEY (`latihan_soal_id`) REFERENCES `latihan_soals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `latihan_soal_soals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD CONSTRAINT `mata_pelajarans_kurikulum_id_foreign` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_pelajarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quiz_soals`
--
ALTER TABLE `quiz_soals`
  ADD CONSTRAINT `quiz_soals_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_soals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujians`
--
ALTER TABLE `ujians`
  ADD CONSTRAINT `ujians_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ujians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian_soals`
--
ALTER TABLE `ujian_soals`
  ADD CONSTRAINT `ujian_soals_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ujian_soals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
