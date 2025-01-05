-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2025 pada 03.29
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
-- Database: `connect-friend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `avatars`
--

INSERT INTO `avatars` (`id`, `image_path`, `price`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/150?text=Avatar+1', 80195, '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(2, 'https://via.placeholder.com/150?text=Avatar+2', 17020, '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(3, 'https://via.placeholder.com/150?text=Avatar+3', 24602, '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(4, 'https://via.placeholder.com/150?text=Avatar+4', 65452, '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(5, 'https://via.placeholder.com/150?text=Avatar+5', 15887, '2025-01-04 19:29:39', '2025-01-04 19:29:39');

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
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Hello! This is a sample message.', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(2, 1, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(3, 2, 4, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(4, 2, 7, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(5, 3, 2, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(6, 3, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(7, 4, 9, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(8, 4, 10, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(9, 5, 7, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(10, 5, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(11, 6, 3, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(12, 6, 7, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(13, 7, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(14, 7, 8, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(15, 8, 2, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(16, 8, 7, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(17, 9, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(18, 9, 2, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(19, 10, 3, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(20, 10, 6, 'Hello! This is a sample message.', '2025-01-04 19:29:44', '2025-01-04 19:29:44');

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
-- Struktur dari tabel `field_of_works`
--

CREATE TABLE `field_of_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `field_of_works`
--

INSERT INTO `field_of_works` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Software Developer', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(2, 'Data Scientist', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(3, 'Graphic Designer', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(4, 'Project Manager', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(5, 'Cybersecurity', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(6, 'Fullstack Developer', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(7, 'Backend Developer', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(8, 'Frontend Developer', '2025-01-04 19:29:39', '2025-01-04 19:29:39'),
(9, 'UI/UX Designer', '2025-01-04 19:29:39', '2025-01-04 19:29:39');

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
(4, '2024_12_28_053310_create_payments_table', 1),
(5, '2024_12_28_053317_create_wishlists_table', 1),
(6, '2024_12_28_053323_create_chats_table', 1),
(7, '2024_12_28_053328_create_avatars_table', 1),
(8, '2024_12_28_053338_create_field_of_works_table', 1),
(9, '2024_12_28_062246_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount_paid`, `created_at`, `updated_at`) VALUES
(1, 1, 107669, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(2, 2, 117300, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(3, 3, 105332, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(4, 4, 119235, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(5, 5, 117221, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(6, 6, 124381, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(7, 7, 122245, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(8, 8, 124101, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(9, 9, 112136, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(10, 10, 112615, '2025-01-04 19:29:44', '2025-01-04 19:29:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `linkedin_username` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `registration_price` int(11) NOT NULL,
  `coins` int(11) NOT NULL DEFAULT 100,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `linkedin_username`, `mobile_number`, `registration_price`, `coins`, `visible`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'Jaron Ward', 'hermiston.emilie@example.net', '$2y$12$wYBIKphSwOcpfsoXMVwHyOfVGPQa5DRQzo3A9KT3nUTTInf6X5Vmi', 'Female', 'https://www.linkedin.com/in/cormier.casandra', '3961951029', 120081, 100, 1, 'https://picsum.photos/100/100?random=807', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(2, 'Edythe Renner', 'alex.murray@example.org', '$2y$12$cYeuqT1NwAeJlXr4wN40oOWlXinVlFMrF6eRwhumiPZRGvF6oYMz6', 'Female', 'https://www.linkedin.com/in/drake16', '1920216140', 123994, 100, 1, 'https://picsum.photos/100/100?random=423', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(3, 'Jacquelyn Breitenberg', 'boehm.teagan@example.net', '$2y$12$SKlrWibbKvaymEG1ZQ1bleRlkyDfBimQAkQOejJs/mKH6tHImem2C', 'Male', 'https://www.linkedin.com/in/ephraim.swift', '8910754799', 120217, 100, 1, 'https://picsum.photos/100/100?random=315', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(4, 'Domenick Hand', 'qwindler@example.net', '$2y$12$Q24aep8eOlZjb7HySgX66.IYLgOaYxgSqSTXeQWo8pPoM/u/1LhY2', 'Male', 'https://www.linkedin.com/in/akiehn', '0713853289', 124392, 100, 1, 'https://picsum.photos/100/100?random=697', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(5, 'Aracely Koch', 'hoppe.natalie@example.com', '$2y$12$OGMSdqnesrvUa1OmhUgYou/bfR3sxlq7WG7XksYwpnjMtL5vjzAle', 'Male', 'https://www.linkedin.com/in/bella.buckridge', '8816762493', 104874, 100, 1, 'https://picsum.photos/100/100?random=701', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(6, 'Enrico Heidenreich Jr.', 'shannon.eichmann@example.net', '$2y$12$OffG.ELtAzeFvorMovCTCe8oVlsXoFuikfx7E7R1oBTeNT8lKFu/q', 'Female', 'https://www.linkedin.com/in/hipolito14', '2535071197', 109156, 100, 1, 'https://picsum.photos/100/100?random=139', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(7, 'Dr. Jamir Champlin PhD', 'vhamill@example.com', '$2y$12$nRI0SKYsDBiqfeH.Z5mMduwbK9fcDqgVwDqS5I9nLu/Hc88nisItO', 'Male', 'https://www.linkedin.com/in/milan98', '0949322252', 101330, 100, 1, 'https://picsum.photos/100/100?random=384', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(8, 'Newton Hansen', 'nikolaus.okey@example.com', '$2y$12$8SzmQf/VzXyyAEnPhk5adOUdtUTacTCtQFzP5KFCZSqg5gln2CVze', 'Male', 'https://www.linkedin.com/in/misael90', '9342260275', 118792, 100, 1, 'https://picsum.photos/100/100?random=270', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(9, 'Nicola Hilpert', 'bernier.cheyanne@example.net', '$2y$12$/vSGJ8D0ckbhOLbxRCKbyOknyicugWdIrZ6/mZe/Xa.bKM4cGS7ZG', 'Male', 'https://www.linkedin.com/in/burley.haag', '6274939573', 115155, 100, 1, 'https://picsum.photos/100/100?random=479', '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(10, 'Prof. Cruz Watsica Jr.', 'sunny26@example.com', '$2y$12$NNbr/5VWhtWmnRyplZh7v.m.3rn0iwsKAEt0lOd9MG6/BbTOqEt7G', 'Female', 'https://www.linkedin.com/in/samara53', '5525579369', 113752, 100, 1, 'https://picsum.photos/100/100?random=812', '2025-01-04 19:29:43', '2025-01-04 19:29:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_avatars`
--

CREATE TABLE `user_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_avatars`
--

INSERT INTO `user_avatars` (`id`, `user_id`, `avatar_id`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(2, 1, 2, NULL, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(3, 2, 4, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(4, 2, 1, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(5, 3, 4, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(6, 3, 1, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(7, 4, 2, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(8, 4, 1, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(9, 5, 2, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(10, 5, 4, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(11, 6, 1, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(12, 6, 4, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(13, 7, 5, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(14, 7, 2, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(15, 8, 5, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(16, 8, 1, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(17, 9, 3, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(18, 9, 2, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(19, 10, 2, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(20, 10, 4, NULL, '2025-01-04 19:29:44', '2025-01-04 19:29:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_field_of_works`
--

CREATE TABLE `user_field_of_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `field_of_work_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_field_of_works`
--

INSERT INTO `user_field_of_works` (`id`, `user_id`, `field_of_work_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 2, 7, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 3, 6, NULL, NULL),
(9, 3, 2, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 4, 2, NULL, NULL),
(12, 4, 3, NULL, NULL),
(13, 5, 3, NULL, NULL),
(14, 5, 1, NULL, NULL),
(15, 5, 8, NULL, NULL),
(16, 6, 5, NULL, NULL),
(17, 6, 9, NULL, NULL),
(18, 6, 4, NULL, NULL),
(19, 7, 2, NULL, NULL),
(20, 7, 7, NULL, NULL),
(21, 7, 4, NULL, NULL),
(22, 8, 5, NULL, NULL),
(23, 8, 1, NULL, NULL),
(24, 8, 7, NULL, NULL),
(25, 9, 8, NULL, NULL),
(26, 9, 1, NULL, NULL),
(27, 9, 6, NULL, NULL),
(28, 10, 5, NULL, NULL),
(29, 10, 4, NULL, NULL),
(30, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wished_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `wished_user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(2, 1, 2, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(3, 1, 6, '2025-01-04 19:29:43', '2025-01-04 19:29:43'),
(4, 2, 9, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(5, 2, 8, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(6, 2, 10, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(7, 3, 6, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(8, 3, 4, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(9, 3, 5, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(10, 4, 5, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(11, 4, 3, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(12, 4, 2, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(13, 5, 6, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(14, 5, 10, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(15, 5, 7, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(16, 6, 1, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(17, 6, 8, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(18, 6, 5, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(19, 7, 2, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(20, 7, 5, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(21, 7, 6, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(22, 8, 9, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(23, 8, 6, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(24, 8, 2, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(25, 9, 3, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(26, 9, 10, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(27, 9, 2, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(28, 10, 8, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(29, 10, 9, '2025-01-04 19:29:44', '2025-01-04 19:29:44'),
(30, 10, 5, '2025-01-04 19:29:44', '2025-01-04 19:29:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`),
  ADD KEY `chats_receiver_id_foreign` (`receiver_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `field_of_works`
--
ALTER TABLE `field_of_works`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_avatars_user_id_foreign` (`user_id`),
  ADD KEY `user_avatars_avatar_id_foreign` (`avatar_id`),
  ADD KEY `user_avatars_sender_id_foreign` (`sender_id`);

--
-- Indeks untuk tabel `user_field_of_works`
--
ALTER TABLE `user_field_of_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_field_of_works_user_id_foreign` (`user_id`),
  ADD KEY `user_field_of_works_field_of_work_id_foreign` (`field_of_work_id`);

--
-- Indeks untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_wished_user_id_foreign` (`wished_user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `field_of_works`
--
ALTER TABLE `field_of_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_avatars`
--
ALTER TABLE `user_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_field_of_works`
--
ALTER TABLE `user_field_of_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD CONSTRAINT `user_avatars_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_avatars_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_avatars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_field_of_works`
--
ALTER TABLE `user_field_of_works`
  ADD CONSTRAINT `user_field_of_works_field_of_work_id_foreign` FOREIGN KEY (`field_of_work_id`) REFERENCES `field_of_works` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_field_of_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_wished_user_id_foreign` FOREIGN KEY (`wished_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
