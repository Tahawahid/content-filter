-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2025 at 01:08 PM
-- Server version: 10.6.20-MariaDB-log
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techex12_aidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `profile_picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$12$b1fvezZBja4oo1amLaaME.btz.5/P9Bh0FH/PL.JWhX6egx5mo35O', NULL, NULL, NULL),
(2, 'test admin', 'admin2@gmail.com', NULL, NULL, '$2y$12$bW/QO0rDWcl9s2/cDeDQueDyG.RdQuuI3jJ67XhmWGVOqMJAwoB9m', NULL, '2024-11-25 12:47:47', '2024-11-25 12:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_filters`
--

CREATE TABLE `content_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `token_cost` int(11) NOT NULL,
  `status` enum('pending','processing','approved','rejected') NOT NULL DEFAULT 'pending',
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_filters`
--

INSERT INTO `content_filters` (`id`, `user_id`, `user_name`, `user_email`, `youtube_link`, `token_cost`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=KrMXCwdE7Xw&list=RDnjkUeAX_fWg&index=7&ab_channel=Luiz7z', 1, 'pending', NULL, '2024-11-10 10:05:48', '2024-11-10 10:05:48'),
(2, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=CYDP_8UTAus&list=RDnjkUeAX_fWg&index=10&ab_channel=NEFFEX', 1, 'pending', NULL, '2024-11-10 10:20:28', '2024-11-10 10:20:28'),
(3, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=ZzbYaDHkObY&list=RDnjkUeAX_fWg&index=12&pp=8AUB', 1, 'pending', NULL, '2024-11-10 10:20:48', '2024-11-10 10:20:48'),
(4, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=wI6T_PioDFA&list=RDnjkUeAX_fWg&index=14&pp=8AUB', 1, 'approved', 'Perfect content for music listeners', '2024-11-10 10:21:02', '2024-11-10 10:41:04'),
(6, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=wnHoaC0RxGY', 1, 'pending', NULL, '2024-11-10 11:48:37', '2024-11-10 11:48:37'),
(7, 1, 'Muhammad Taha', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=CYDP_8UTAus&list=RDnjkUeAX_fWg&index=10&ab_channel=NEFFEX', 1, 'pending', NULL, '2024-11-10 11:48:51', '2024-11-10 11:48:51'),
(8, 7, 'Awais', 'awais@gmail.com', 'https://www.youtube.com/watch?v=CYDP_8UTAus&list=RDnjkUeAX_fWg&index=10&ab_channel=NEFFEX', 1, 'pending', NULL, '2024-11-10 12:10:36', '2024-11-10 12:10:36'),
(9, 7, 'Awais', 'awais@gmail.com', 'https://www.youtube.com/watch?v=ZzbYaDHkObY&list=RDnjkUeAX_fWg&index=12&pp=8AUB', 1, 'rejected', 'Not a valid content', '2024-11-10 12:10:47', '2024-11-10 12:12:04'),
(10, 7, 'Awais', 'awais@gmail.com', 'https://www.youtube.com/watch?v=wI6T_PioDFA&list=RDnjkUeAX_fWg&index=14&pp=8AUB', 1, 'approved', 'Good Content', '2024-11-10 12:10:54', '2024-11-10 12:11:43'),
(11, 7, 'Awais', 'awais@gmail.com', 'https://www.youtube.com/watch?v=wnHoaC0RxGY', 1, 'processing', NULL, '2024-11-10 12:11:00', '2024-11-10 12:11:22'),
(12, 7, 'Awais', 'awais@gmail.com', 'https://www.youtube.com/watch?v=wI6T_PioDFA&list=RDnjkUeAX_fWg&index=14&pp=8AUB', 1, 'pending', NULL, '2024-11-10 12:13:18', '2024-11-10 12:13:18'),
(13, 1, 'Taha Wahid', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=wnHoaC0RxGY', 1, 'pending', NULL, '2024-11-22 20:20:39', '2024-11-22 20:20:39'),
(14, 1, 'Taha Wahid', 'muhammadtahawahid1@gmail.com', 'https://www.youtube.com/watch?v=wnHoaC0RxGY', 1, 'rejected', 'Accepted', '2024-11-22 20:21:03', '2024-12-05 22:52:34'),
(15, 8, 'owais', 'owak@gmail.com', 'https://www.youtube.com/watch?v=xXDZrVDnYf8&pp=ygUNbW9xYXV0b21hdGlvbg%3D%3D', 1, 'approved', 'Everything is good to go', '2024-11-24 19:29:28', '2024-11-26 05:15:01'),
(16, 1, 'User', 'user@gmail.com', 'https://youtube.com/', 1, 'rejected', 'inspprotaite', '2024-12-10 05:21:30', '2024-12-10 05:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2024_10_25_211152_create_admins_table', 1),
(9, '2024_10_28_202531_create_packages_table', 2),
(10, '2024_10_28_203139_create_package_descriptions_table', 3),
(11, '2024_11_04_184930_alter_packages_table', 4),
(12, '2024_11_04_185643_alter_packages_table', 5),
(13, '2024_11_04_185715_alter_packages_table', 6),
(14, '2024_11_04_190023_reorder_packages_table_columns', 7),
(18, '2024_11_09_110213_create_user_tokens_table', 9),
(21, '2024_11_09_143513_create_user_details_table', 10),
(22, '2024_11_09_143749_create_orders_table', 10),
(23, '2024_11_10_142308_create_content_filters_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected','on-hold','active','cancelled') NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tokens` int(11) NOT NULL,
  `payment_receipt` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_detail_id`, `package_id`, `price`, `status`, `total`, `tokens`, `payment_receipt`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 12, 125.00, 'active', 523.48, 150, NULL, '2024-11-09 12:55:14', '2024-11-10 08:48:39'),
(3, 1, 4, 11, 109.00, 'active', 234.00, 5, NULL, '2024-11-09 12:55:14', '2024-11-09 15:30:21'),
(4, 1, 6, 12, 125.00, 'active', 550.00, 350, NULL, '2024-11-09 13:03:38', '2024-11-10 08:47:41'),
(9, 7, 10, 10, 79.00, 'active', 250.00, 120, NULL, '2024-11-10 12:08:17', '2024-11-10 12:09:28'),
(10, 7, 10, 12, 125.00, 'approved', 204.00, 100, NULL, '2024-11-10 12:08:17', '2024-11-10 12:08:17'),
(25, 1, 17, 12, 125.00, 'active', 234.00, 100, 'https://drive.google.com/file/d/1Zqy5lRyNV523-BI2Xp7-OMWAmEIRWgdF/view?usp=sharing', '2024-11-20 09:11:49', '2024-11-20 09:11:49'),
(26, 1, 17, 11, 109.00, 'on-hold', 234.00, 60, 'https://drive.google.com/file/d/1Zqy5lRyNV523-BI2Xp7-OMWAmEIRWgdF/view?usp=sharing', '2024-11-20 09:11:49', '2024-11-20 09:11:49'),
(27, 1, 18, 12, 125.00, 'active', 125.00, 100, 'https://drive.google.com/file/d/1Zqy5lRyNV523-BI2Xp7-OMWAmEIRWgdF/view?usp=sharing', '2024-11-21 11:20:47', '2024-11-21 11:35:10'),
(28, 8, 19, 12, 125.00, 'active', 125.00, 150, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThIIWNnkzqrrLfqpKn_geEMeWKowAOVZJoZQ&s', '2024-11-24 19:23:19', '2024-11-24 19:28:00'),
(29, 9, 20, 12, 25.00, 'pending', 25.00, 28, 'https://www.youtube.com/watch?v=NGV8dNPB5J8', '2024-11-26 05:18:53', '2024-11-26 05:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `token` int(11) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `token`, `features`, `created_at`, `updated_at`) VALUES
(10, 'Silver', 79.00, 45, '[\"List Item 1\",\"List 2\",\"List Item 3\",\"List Item 4\",\"List Item 5\"]', '2024-11-04 14:51:26', '2024-11-04 14:52:16'),
(11, 'Gold', 109.00, 60, '[\"List Item 1\",\"List Item 2\",\"List Item 3\",\"List Item 4\"]', '2024-11-04 14:52:01', '2024-11-04 15:57:40'),
(12, 'Exclusive Package', 25.00, 28, '[\"List Item 2\",\"List Item 3\",\"List Item 4\"]', '2024-11-04 15:32:33', '2024-11-24 19:33:35'),
(13, 'Max', 499.00, 100, '[\"List Item 1\",\"List item 3\",\"list item 5\",\"Maxcheck\",\"Tamator\"]', '2024-11-04 15:56:39', '2024-11-22 20:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `package_descriptions`
--

CREATE TABLE `package_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1gcv792oOhekakLNsWdwKmWYRGxX1xRM5AmoZfwE', NULL, '162.142.125.192', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVYxZEh3NzlqZTV4ek1tS3MwSW5mdmp4c2JKeUFxRUdjY0MzTVNzUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vbWFpbC5jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738015336),
('6Z7XvGFa6PZOXGrMMmSJ76DvuzlO37B1WplEkSG3', NULL, '18.201.218.181', 'Mozilla/4.0 (compatible; Netcraft Web Server Survey)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZ2E5Q0N2S1U5cW9xTlR1VGJuSmJSNFZzNUR4R2Vhdk1oUnNsZndydSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737991824),
('8bPldYLMiFZLPmKSHmS3oXsMQfGx9pa7UB36lMkk', NULL, '165.22.119.67', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmI2RWRPRmo5MXZmSFBMYVdmVHFnTkI2djNMdm85SUcycUVDMkhIciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9tYWlsLmNvbnRlbnRmaWx0ZXIuYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738213787),
('BGe2yAjUDAYrtxVypVZ5NDSzFILzt8jWaIPN3LGc', NULL, '137.184.37.124', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlVPajhHbHlMNGVVejI0OG5mTmUyU3hSSTRzWWIzMTY5UlE1R0JvdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737982923),
('c5Jz0cdAfXgUW19doDJmtNR7Upq1eQ4tDB2BAi00', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZldCRzJPcmN4NFlsVmt6dXUyYkMwNkIwbU8xOVZwRGtqOUZ5OEU1ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkvY29udGFjdC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738193608),
('cTR9PWDM0wip1zVPF0aCXnx6o4B79Rfa74j4pyRz', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGNQaUkyd0NJbldPWnpTbkg2eWRIc0hGWTNOZHVUSHlIRkp3dFVxTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly93d3cuY29udGVudGZpbHRlci5haS9hY2NvdW50L3NpZ24tdXAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738193608),
('cZnlUL1mp05ClvG4uCfX5vG7xcmBUC6ZLpFq0hi0', NULL, '104.252.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/123.0.6312.52 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUZGQ1REdExkQ0lvOUlSS2NkMEZ3Ukl6amZ1ZXZMZEdtaXdkZlZxbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738106619),
('dvhUIhawT6uLduf3LNWx931JD3BPwpcTuqSzG5lX', NULL, '23.226.213.220', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:82.0) Gecko/20100101 Firefox/82.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjRjWVFGdDF6elR6ZDVzREM4ZkhnREJDSGJ3bkJ6c0hJVFhTRm1jSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737925699),
('EBYmF7v74HTuneWivrWWdJlL2hvoNK9B17agEJFX', NULL, '137.184.37.124', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1lEV3pURXBtRjJ5a1NBQmxmYjdBNDBTT25JMklwMGdwVXhZYkpvcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737982925),
('F8YRFvNiAssnREXYA9Coi8odeHAxXZd0kD5S75Jh', NULL, '15.235.114.125', 'Faraday v2.11.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHFsZW5nRmk0bXFCbWNhRTRZcFlvS1VEZnV2TDVNWG9naEVmeFVwdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738121715),
('FP5I1DANyA3tW6iQiKdEYRm8tlHgTTRk6TF299tA', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0JIajYwbmF5WmU0WFdINjd4dWxJcHM2VnhUenA1aUxtZjJsVjZrMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vY29udGVudGZpbHRlci5haS9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738193609),
('FSl3FJUKbq9aeD63eib1yvnagrEyigI4ccYL2xDD', NULL, '162.142.125.215', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVm95Z0ZwQ1Ntd0NHOVFlajljQk11aEVGT0pKWXJCY05lSDBadzU5QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738011093),
('GiJXnY7DqKtOmmVkZLApYRjuygROhpUvFkq3d5fJ', NULL, '109.243.5.194', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.3809.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVRCdmFZRGtwa3gzczkwbTRiT3ExeHRscFlINm10TjI4Z05Ca3ZJUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945300),
('H48jR0We8JzlupFyPV3uS0JK438dobc6FVbObfaJ', NULL, '35.205.232.137', 'Python/3.11 aiohttp/3.11.11', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREp4N3N2VXA2c0JsdkRLUXVmSXpQRlpMeW4wWUtXYjJnQmw5eWRjdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738193610),
('HGmd6nwAmYfLgiLZHqVyFjr1MtLayZUqMDvPXR3l', NULL, '206.168.34.194', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlpOVFdUTXh3UTFIeEIzMjRTWmZhcHgyVUNaZmNOdWkxeER5c2JlWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738012491),
('iCzphziX5zqze752DcMxz0mQINR5n2g8bXbpd4qa', NULL, '23.226.212.4', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjlabXFScG10cUxoOHRKa0pKWEFEMnc4ZU9OUHpMT0tzSzd2eE43biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737925692),
('LceaUJFU5z82qNElzj6rISRld7cOm4D5j7A1yCnA', NULL, '206.168.34.118', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnFGVjd3VlFOVUNiVVVyZXBpNlNuVzZTdktpT2gwR0RkNFpkWEJuNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738199262),
('n8P6pLSzHfH5LJZ1GnIEVg66ctLSy8kftUAtrgAv', NULL, '165.22.119.67', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkw3MmNJMTJudXFQT25XOTdxa1NmSk5KNk9HTWM4QzdmOHR4V0p0ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vbWFpbC5jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738213787),
('Nh2LixLSCVvGGo9QtMrfgl34IShJGmduVTzlVbe0', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWJwc0VDdHlDN25DUVJ2a0R3c25Pa0JDOGE4ODl0V3R3aVk3ZDZrZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738193606),
('NSTcaKm5TyMZcXUjBo839pQSDRVtz7e8iZphfz8g', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUlVNHhod2gyZmNuUjFPSEt6VjBhYUxZTVl3NWV5eUF6ekY0NzVyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vY29udGVudGZpbHRlci5haS9jb250YWN0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738193607),
('o7ZCi6BCBT2jGLRzXMX9adJI72UMSN7sFY7zADuD', NULL, '46.228.199.158', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.54', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickVJc2Z3V0ZCNTJxM2RNb1NiT0piOUNteXhhVmJXVkdmbnUwNE1JMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738099305),
('P4t1aVtXGwlbrYtW9pDT0deNtJKI3uz9G53qPog7', NULL, '122.50.1.134', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFBtaTl4UTRtZ2hvMjhRRU1WVkxvaDhVOVVxVGo0UG9ZMlZKYTBRcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738137216),
('pNgxJlRqtdItpOOzcZGLd8hbz56XCU2Akffz7Ci9', NULL, '185.247.137.114', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia05MWGRMbEVRM29lTU1iUWk3UmtYY0ZBdTE3SWFSVzdOdjBkaDYxOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLm1vcWF1dG9tYXRpb24uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738062490),
('q09ZImlhXnTXpDaOnewAUPrPHCVjmaHTFe0YVNc5', NULL, '5.133.192.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidktRdkU0b0ZwdXVTZTUwRzJHdkczelVNdUhHWW5ZaUNjZU9Sa0VWZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738222033),
('RLM0eYJoniIjrbL5fMByOTNeacTITL0V8Otn1yFN', NULL, '46.205.196.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUpuVVFQU1JwbFlPWEdaU0JDOElTaEtVb016cTZkNnRnMGdBdUpWSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945312),
('T5iXfcbt7q7PAu9HCnos1dNMR1aujLQJTH6VDDMO', NULL, '46.205.196.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHR6d2U2SjF5aFRCNWVXYnZQOGZmb0ZiUGo1UTFhWFh6aERSbkNLTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737945310),
('tFAXNqqnkANSr5AT0Ncjgnqjl0M19k3gj29zvOPB', NULL, '167.94.138.35', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHB4bWJZQlRDdkFCQjR5RUxqRUdMYVRvUzV3TWFxOXd2RVBJdXJ1biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738185532),
('TLw0dtN03CSYmpAvxVW2dEcoocIwY1oQy1vLfyyZ', NULL, '167.94.138.43', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk1SYjRNRjFEQXB3dWRmWW1LVnNNYkFrRjNUY3A3dGtVRUtFZUxZOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737922356),
('uDvAhFrxRCdBD7d5Qc8AJknSIv8DBHRPVsPZ5jad', NULL, '167.94.138.39', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2pHS0ZpcjhSZ2xhcWxja2gwaWYxN09la3BrQmR1Wnl0Q2w4elNOcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737920755),
('VyjOHSXPHN1ZclBaSwLNWrPWq6khh6z8v6pIx2wK', NULL, '35.205.232.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUJUQ0Q2RHd2aWYxQVd4aXJEQVpYbGEwelliUTNiMXNQWHdRRVk4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmNvbnRlbnRmaWx0ZXIuYWkvY2FydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738193609),
('XBC5utLPHllz6vpueDQxZk0eDj3E6DF8B5xfKMPK', NULL, '109.243.5.194', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 Edge/18.18362', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2F1QnV0dlFDaTlOdUZ0OGlsUnI5MWw5TEMxM2JvZEd6VVFQbHJiZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945232),
('XMPm3mnNcAfJG6rKs5ju7QidU2Unp2XHNxXpgYUv', NULL, '185.6.10.201', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1.2 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUpmR0I5WThCejZGcVlucUd5RUJmS1dLQ2JyZ1FiamtCbFNmV01OcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737951689),
('xo0pYqAzrlTJvSqdNtzkUhhZxMAdIKBBz2fRqHZw', NULL, '109.243.5.194', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:70.0) Gecko/20100101 Firefox/70.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZTFDOWphdElvcDlzbEJ6TWU0cHBpUnJSRlY3UWdJczk2SDZ0MlpLVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945231),
('Y824quyjcmMCS1qXmLVTgPceQPKsm0TH2oKvMN9E', NULL, '107.172.179.88', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/123.0.6312.52 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG40V3czZHRiYmxwaDIzNEo0QXZWd1phVDZubm1ta1VqdlhlbklXUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY29udGVudGZpbHRlci5haSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738106552),
('YPFst8ehwY1bB7gjuLx0ZHl9Upem9ThSiT3BfTGa', NULL, '46.205.196.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 OPR/65.0.3467.48', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibU5PVVZqaTRHVXM5UjhjdTJJQnBDUHFLaG9teUdDZnM1eXZuTDluQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9jb250ZW50ZmlsdGVyLmFpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945179),
('YpvqBMcZarfUrk7JfHHhfQfhEPu32xQvKfIBbANm', NULL, '185.247.137.213', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXJZNjF1Zml1RXJOYlpCVzlXUlV4dHVwamlDSDdkdmhqZGp5dzNITCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vY29udGVudGZpbHRlci5tb3FhdXRvbWF0aW9uLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738060929),
('ZNYTDZ3JwHjlLEqalqE5i5DknzlKUHq98JynAgz8', NULL, '109.243.5.194', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaWR6elhSSEtTc0JvalBmRFFRTTA1N1h1czZmNk11U3lISDdUSEFpUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737945179);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', 'user_profile/FsZ2SJJrcgQyvLizuqG1pH4BycezCOi18QBKmZ80.jpg', NULL, '$2y$12$b1fvezZBja4oo1amLaaME.btz.5/P9Bh0FH/PL.JWhX6egx5mo35O', NULL, '2024-10-25 16:39:49', '2024-11-25 12:41:55'),
(2, 'test', 'testuser@gmail.com', NULL, NULL, '$2y$12$Vj4PCjo1i/B1x0f5hIHD4uLiYSjS8FIK7loXgrUHuyu0QtgOe1Lyy', NULL, '2024-10-27 14:28:51', '2024-10-27 14:28:51'),
(3, 'test2', 'test@gmail.com', NULL, NULL, '$2y$12$yUyoyEh1aW2KbKUquSBxqe9laU.8poZ2tgGG.m5uFZoEbH1FhmaDu', NULL, '2024-10-29 00:19:57', '2024-10-29 00:19:57'),
(7, 'Awais', 'awais@gmail.com', NULL, NULL, '$2y$12$b1fvezZBja4oo1amLaaME.btz.5/P9Bh0FH/PL.JWhX6egx5mo35O', NULL, '2024-11-10 12:07:40', '2024-11-10 12:07:40'),
(8, 'owais', 'owak@gmail.com', NULL, NULL, '$2y$12$EyQLc0dlqoa41fEXiRGdf.C0K6/kY6roMdpoek3tKcBzSSOj1sXWq', NULL, '2024-11-24 19:21:21', '2024-11-24 19:21:21'),
(9, 'Test Customer 2', 'tese2@gmail.com', NULL, NULL, '$2y$12$N/RO929v67Nu2u3UWjFB8eHbJO685sjLnUFOZHkh0dtjtqyWcBY9O', NULL, '2024-11-26 05:16:20', '2024-11-26 05:16:20'),
(10, 'OwaisQurni', 'owaisqurni457@gmail.com', NULL, NULL, '$2y$12$bUARP3hMVPfsy7AAp/foTOebmX3RCQPIerbaPYZb.psR/uSt.Lslm', NULL, '2025-01-22 20:07:46', '2025-01-22 20:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `phone_number`, `email`, `state`, `city`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 12:48:57', '2024-11-09 12:48:57'),
(2, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 12:52:23', '2024-11-09 12:52:23'),
(3, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 12:54:41', '2024-11-09 12:54:41'),
(4, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 12:55:14', '2024-11-09 12:55:14'),
(5, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 12:57:15', '2024-11-09 12:57:15'),
(6, 1, 'Taha Wahid', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-09 13:03:38', '2024-11-09 13:03:38'),
(10, 7, 'Awais', '03202493722', 'awais@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-10 12:08:17', '2024-11-10 12:08:17'),
(11, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:40:13', '2024-11-20 08:40:13'),
(12, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:40:26', '2024-11-20 08:40:26'),
(13, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:42:14', '2024-11-20 08:42:14'),
(14, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:44:52', '2024-11-20 08:44:52'),
(15, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:45:38', '2024-11-20 08:45:38'),
(16, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 08:47:05', '2024-11-20 08:47:05'),
(17, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-20 09:11:49', '2024-11-20 09:11:49'),
(18, 1, 'Muhammad Taha', '03202493722', 'muhammadtahawahid1@gmail.com', 'Sindh', 'Karachi', '75950', '2024-11-21 11:20:47', '2024-11-21 11:20:47'),
(19, 8, 'owais', '23123', 'owak@gmail.com', 'london', 'london', '74123123', '2024-11-24 19:23:19', '2024-11-24 19:23:19'),
(20, 9, 'Test Customer 2', '03202493722', 'tese2@gmail.com', 'Sindh', 'karachi', '12345', '2024-11-26 05:18:53', '2024-11-26 05:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `token` int(11) NOT NULL,
  `remaining_tokens` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `order_id`, `token`, `remaining_tokens`, `created_at`, `updated_at`) VALUES
(12, 1, 4, 350, 343, '2024-11-10 08:47:41', '2024-12-10 05:21:30'),
(13, 1, 2, 150, 148, '2024-11-10 08:48:39', '2024-11-10 10:21:02'),
(15, 7, 9, 120, 115, '2024-11-10 12:09:28', '2024-11-10 12:13:18'),
(16, 1, 27, 100, 100, '2024-11-21 11:35:10', '2024-11-21 11:35:10'),
(17, 8, 28, 150, 149, '2024-11-24 19:27:42', '2024-11-24 19:29:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `content_filters`
--
ALTER TABLE `content_filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_filters_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_user_detail_id_foreign` (`user_detail_id`),
  ADD KEY `orders_package_id_foreign` (`package_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_descriptions`
--
ALTER TABLE `package_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_descriptions_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_tokens_user_id_foreign` (`user_id`),
  ADD KEY `user_tokens_order_id_foreign` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_filters`
--
ALTER TABLE `content_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `package_descriptions`
--
ALTER TABLE `package_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_filters`
--
ALTER TABLE `content_filters`
  ADD CONSTRAINT `content_filters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_descriptions`
--
ALTER TABLE `package_descriptions`
  ADD CONSTRAINT `package_descriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
