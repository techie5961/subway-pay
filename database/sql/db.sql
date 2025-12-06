-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 07:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subway_pay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `tag`, `role`, `password`, `email`, `name`, `remember_token`, `json`, `status`, `date`) VALUES
(1, 'master', 'master', '$2y$12$Na1PFM3gFZaxNcyeX0U1G.270MqG3EgscE4B5i74TcUvLzPOXkQ6q', 'techie5961@gmail.com', 'David James', NULL, NULL, 'active', '2025-07-07 15:33:51');

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `json`, `status`, `date`) VALUES
(1, 1, '::1', NULL, 'active', '2025-11-25 00:42:26'),
(2, 1, '::1', NULL, 'active', '2025-11-25 05:00:49'),
(3, 2, '::1', NULL, 'active', '2025-11-25 15:33:39'),
(4, 2, '::1', NULL, 'active', '2025-11-25 18:49:09'),
(5, 2, '::1', NULL, 'active', '2025-11-25 21:34:56'),
(6, 2, '::1', NULL, 'active', '2025-11-26 05:32:57'),
(7, 3, '::1', NULL, 'active', '2025-11-26 17:43:36'),
(8, 2, '::1', NULL, 'active', '2025-12-04 01:58:36'),
(9, 2, '::1', NULL, 'active', '2025-12-04 18:57:23'),
(10, 2, '::1', NULL, 'active', '2025-12-04 19:11:45'),
(11, 6, '::1', NULL, 'active', '2025-12-04 19:19:40'),
(12, 2, '::1', NULL, 'active', '2025-12-04 19:29:04');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`message`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`, `updated`, `date`) VALUES
(1, 1, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?id=1\\\">@techie<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-11-25 00:42:16', '2025-11-25 00:42:16'),
(2, 2, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-11-25 15:33:21', '2025-11-25 15:33:21'),
(3, 2, '{\"user\":\"You just submitted a deposit request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a deposit request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-25 23:25:24', '2025-11-25 23:25:24'),
(4, 2, '{\"user\":\"You just submitted a deposit request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a deposit request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 01:37:11', '2025-11-26 01:37:11'),
(5, 2, '{\"user\":\"You just submitted a deposit request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a deposit request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 01:43:05', '2025-11-26 01:43:05'),
(6, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 02:01:23', '2025-11-26 02:01:23'),
(7, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 16:50:22', '2025-11-26 16:50:22'),
(8, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 16:51:25', '2025-11-26 16:51:25'),
(9, 2, '{\"user\":\"You just purchased a product\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just purchased a product\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-11-26 17:06:44', '2025-11-26 17:06:44'),
(10, 3, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?id=3\\\">@john<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-11-26 17:43:03', '2025-11-26 17:43:03'),
(11, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-04 16:05:52', '2025-12-04 16:05:52'),
(12, 5, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=5\\\">@7654321`<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-12-04 19:18:36', '2025-12-04 19:18:36'),
(13, 6, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=6\\\">@dave<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-12-04 19:19:25', '2025-12-04 19:19:25'),
(14, 7, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=7\\\">@ertyuio;\'<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-12-04 19:27:36', '2025-12-04 19:27:36'),
(15, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 19:31:21', '2025-12-05 19:31:21'),
(16, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 20:51:40', '2025-12-05 20:51:40'),
(17, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 20:57:58', '2025-12-05 20:57:58'),
(18, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 23:25:18', '2025-12-05 23:25:18'),
(19, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 23:36:31', '2025-12-05 23:36:31'),
(20, 2, '{\"user\":\"You just linked a bank account\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?id=2\\\">@blaady05<\\/a> Just linked a bank account\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-05 23:37:48', '2025-12-05 23:37:48'),
(21, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-06 00:40:34', '2025-12-06 00:40:34'),
(22, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-06 00:44:49', '2025-12-06 00:44:49'),
(23, 2, '{\"user\":\"You just submitted a withdrawal request\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just submitted a withdrawal request\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-06 00:53:19', '2025-12-06 00:53:19'),
(24, 2, '{\"user\":\"You just purchased a product\",\"admin\":\"<a class=\\\"c-primary b\\\" href=\\\"http:\\/\\/localhost\\/subway-pay\\/public\\/admins\\/user?user_id=2\\\">@blaady05<\\/a> Just purchased a product\"}', '{\"user\":\"unread\",\"admin\":\"unread\"}', '2025-12-06 04:53:50', '2025-12-06 04:53:50');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `return` float DEFAULT NULL,
  `validity` bigint(20) DEFAULT NULL,
  `limit` bigint(255) DEFAULT 1,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `photo`, `name`, `price`, `return`, `validity`, `limit`, `json`, `status`, `date`, `updated`) VALUES
(11, '1764139013.jpg', 'GRVIP 7', 3000, 27200, 7, 5, NULL, 'active', '2025-11-26 17:06:20', '2025-11-26 17:06:20'),
(12, '1764138998.jpg', 'GRVIP 8', 200000, 55000, 7, 5, NULL, 'active', '2025-11-26 15:36:38', '2025-11-26 15:36:38'),
(14, '1764138974.jpg', 'GRVIP 9', 300000, 62000, 7, 6, NULL, 'active', '2025-11-26 15:36:14', '2025-11-26 15:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `product_id`, `user_id`, `json`, `status`, `updated`, `date`) VALUES
(1, 11, 2, '{\"id\":11,\"photo\":\"1764139013.jpg\",\"name\":\"GRVIP 7\",\"price\":3000,\"return\":27200,\"validity\":7,\"limit\":5,\"json\":null,\"status\":\"active\",\"date\":\"2025-11-26 09:06:20\",\"updated\":\"2025-11-26 09:06:20\"}', 'expired', '2025-12-04 01:24:37', '2025-11-26 17:06:44'),
(2, 11, 2, '{\"id\":11,\"photo\":\"1764139013.jpg\",\"name\":\"GRVIP 7\",\"price\":3000,\"return\":27200,\"validity\":7,\"limit\":5,\"json\":null,\"status\":\"active\",\"date\":\"2025-11-26 09:06:20\",\"updated\":\"2025-11-26 09:06:20\"}', 'active', '2025-12-06 04:53:50', '2025-12-06 04:53:50');

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
('fvk5kkeBIS4EjxzEm5lYnAeOgm61oLjOFBHv3zsF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGhVVmVDTGVqTXJPcXdYVTdjc2VnMzd6dXNiNHAyNTJZdWRFbnpBTSI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUwOiJodHRwOi8vbG9jYWxob3N0L3N1YndheS1wYXkvcHVibGljL3VzZXJzL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764963457),
('ofpAvqXuoztUb8yebusH9tz3sUTVfMgIvfniNk4s', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMnYwUDJiMUY4V1QzdzY0bXk0d0t4emFRSEJPMW1hcEdLOWU3N2NZNiI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ4OiJodHRwOi8vbG9jYWxob3N0L3N1YndheS1wYXkvcHVibGljL3VzZXJzL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUzOiJsb2dpbl9hZG1pbnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1764966685);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `json`, `status`, `date`) VALUES
(1, 'FinanceSettings', NULL, '{\"MinWithdrawal\":\"100\",\"MinDeposit\":\"1000\",\"MaxWithdrawal\":\"100000\",\"MaxDeposit\":\"20000000\",\"WithdrawalFee\":\"7.5\",\"WithdrawalStatus\":\"closed\"}', 'active', '2025-07-11 20:19:35'),
(2, 'finance_settings', NULL, '{\"min_withdrawal\":\"1000\",\"min_deposit\":\"3000\",\"max_withdrawal\":\"100000\",\"max_deposit\":\"1000000\",\"withdrawal_fee\":\"13\",\"withdrawal_status\":\"closed\"}', 'active', '2025-12-06 05:05:49'),
(3, 'referral_settings', NULL, '{\"first_level\":\"17\",\"second_level\":\"3\",\"method\":\"infinite\"}', 'active', '2025-07-31 09:38:27'),
(4, 'general_settings', NULL, '{\"signup_bonus\":\"200\",\"group_link\":\"https:\\/\\/chat.whatsapp.com\\/F9246pvLLC1Ept2x0g92ak?mode=ac_t\",\"popup_link\":\"https:\\/\\/t.me\\/+-w1njBfbD0JhYzdk\",\"popup_message\":\"\\ud83c\\udf3f Welcome to Greenify\\r\\n\\r\\nWe are excited to have you onboard!\\r\\n\\r\\nInvest Smart. Earn Daily.\\r\\n\\r\\nAt Greenify, we make investing simple and rewarding. Choose from our trusted packages\\/products, earn daily returns, and enjoy full control over your finances \\u2014 all from one powerful platform.\\r\\n\\r\\nWhether you\'re starting small or going big, your journey to steady income starts here.\\r\\n\\r\\n> \\ud83d\\udca1 Ready to grow your money the smart way?\\r\\n\\r\\nJoin our telegram community below \\u2b07\\ufe0f\",\"daily_check_in\":\"50\"}', 'active', '2025-07-31 09:38:40'),
(5, 'bank_details', NULL, '{\"account_number\":\"8903717869\",\"bank_code\":\"999991\",\"account_name\":\"MICHEAL OMOSEHIN\"}', 'active', '2025-07-25 10:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'holds the transaction data like gateway,account details etc\r\n' CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uniqid`, `user_id`, `type`, `class`, `amount`, `json`, `status`, `updated`, `date`) VALUES
(12, 'TRX6932FFEF6E4E5', 2, 'withdrawal', 'debit', 1740, '{\"account_number\":\"5005016577\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_id\":\"15\",\"bank_code\":\"068\",\"bank_name\":\"Standard Chartered Bank\"}', 'pending', '2025-12-06 00:53:19', '2025-12-06 00:53:19'),
(13, 'TRX6933384E6CA06', 2, 'purchase', 'debit', 3000, '{\"id\":11,\"photo\":\"1764139013.jpg\",\"name\":\"GRVIP 7\",\"price\":3000,\"return\":27200,\"validity\":7,\"limit\":5,\"json\":null,\"status\":\"active\",\"date\":\"2025-11-26 09:06:20\",\"updated\":\"2025-11-26 09:06:20\"}', 'success', '2025-12-06 04:53:50', '2025-12-06 04:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `referral` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'referral json column' CHECK (json_valid(`referral`)),
  `photo` varchar(255) DEFAULT NULL,
  `deposit` float DEFAULT 0 COMMENT 'deposit balance',
  `withdrawal` float NOT NULL DEFAULT 0 COMMENT 'withdrawal balance',
  `recipient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`recipient`)),
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bank`)),
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uniqid`, `name`, `email`, `username`, `mobile`, `ref`, `referral`, `photo`, `deposit`, `withdrawal`, `recipient`, `bank`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `json`, `status`, `date`, `updated`) VALUES
(1, 'USR-69247CD7C4695', 'David', 'abakpadavid05@gmail.com', 'techie', NULL, NULL, NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$qJfMJo.iuZv9sm.60.jD9O64bGX7NKo6Jfu6w6HIxaYM.KFDCZqf6', NULL, NULL, NULL, NULL, 'active', '2025-11-25 00:42:16', '2025-11-25 00:42:16'),
(2, 'USR-69254DB0942F6', 'David James', 'techie5961@gmail.com', 'blaady05', 9013350351, NULL, NULL, 'avatar.jpg', 9100, 3450, '{\"status\":true,\"message\":\"Transfer recipient created successfully\",\"data\":{\"active\":true,\"createdAt\":\"2025-12-05T10:41:30.000Z\",\"currency\":\"NGN\",\"description\":null,\"domain\":\"live\",\"email\":null,\"id\":116909281,\"integration\":1659157,\"metadata\":null,\"name\":\"David James\",\"recipient_code\":\"RCP_lyoqz5iwzx34hn1\",\"type\":\"nuban\",\"updatedAt\":\"2025-12-05T14:38:08.000Z\",\"is_deleted\":false,\"isDeleted\":false,\"details\":{\"authorization_code\":null,\"account_number\":\"5005016577\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_code\":\"068\",\"bank_name\":\"Standard Chartered Bank\"}}}', '{\"account_number\":\"5005016577\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_id\":\"15\",\"bank_code\":\"068\",\"bank_name\":\"Standard Chartered Bank\"}', 'user', NULL, '$2y$12$lwx1dV6wfdFQ/iZe4qE3e.hl05gZOSza2S9uE9rw9r24xgTDsT37S', 'KGHXgAwIBQD0yPLgkwvJzUld7VEa2IBY518kPWeluSkul0ho5A8CdSVOdcpH', NULL, NULL, '{\"account_number\": \"5005016577\", \"account_name\": \"DAVID JAMES\", \"bank_key\": \"300\"}', 'active', '2025-11-25 15:33:21', '2025-12-06 04:53:13'),
(3, 'USR-6926BD95D6941', 'john daniel', 'john@gmail.com', 'john', 8053846274, 'blaady05', NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$B/KWPtzeYFx.ej/5Q5qJDOKNrnkPK7Dv8mP/rAMKyymYetNePeftG', 'LSu1pepXTLbWBzOuLiv1ZGl2Fo3nRd1dDGSD8PuG6U8hOMkVDUd0G0qkhPMV', NULL, NULL, NULL, 'active', '2025-11-26 17:43:03', '2025-11-26 17:43:03'),
(4, 'CVT6WRHZ4L34RBVH', '432', '5432@gmail.com', '5432', 6654, NULL, NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$sc8CGGTl1irpubNZI4uhkeFF4K0TulWbTuWToLO6Cd0TQe7I7OwJa', NULL, NULL, NULL, NULL, 'active', '2025-12-04 19:16:17', '2025-12-04 19:16:17'),
(5, 'TXOMPXJHK7BLWZAV', 'jhgfdsa', '7654321`@gmail.com', '7654321`', 8765432, NULL, NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$QQJNj./de53T9JkI4kLDm.4sIfFOx29qCfjWabW0pms5sA3WBAMQ.', NULL, NULL, NULL, NULL, 'active', '2025-12-04 19:18:36', '2025-12-04 19:18:36'),
(6, 'CSDFO4FZPGQWGMML', 'James David', 'dave@gmail.com', 'dave', 9137307993, NULL, NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$KWbfGKdaGIROTrVVjONAKuKzIpwmuFps3AQGQZKGH/auFe.nUv.P6', 'Ewfxhy0dDT0iC6b0Qg1q73ItOlryekzRoYP9sREJF7Q1iUmkpIVWZUaJ6feJ', NULL, NULL, NULL, 'active', '2025-12-04 19:19:25', '2025-12-04 19:19:25'),
(7, 'PDIS8CKG1CFIGMN9', 'wertyuiop', 'ertyuio;\'@gmail.com', 'ertyuio;\'', 34567890, 'dave', NULL, 'avatar.svg', 0, 200, NULL, NULL, 'user', NULL, '$2y$12$LUKb18U4efj5GXfQYZyem.XVikQk9FRhLTCnAEUw7iHeYPhQPM.w6', NULL, NULL, NULL, NULL, 'active', '2025-12-04 19:27:36', '2025-12-04 19:27:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
