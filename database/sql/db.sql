-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2025 at 02:35 PM
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
-- Database: `deluxe`
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
(7, 3, '::1', NULL, 'active', '2025-11-26 17:43:36');

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
(10, 3, '{\"user\":\"Registration Success\",\"admin\":\"<a class=\\\"b c-primary\\\" href=\\\"http:\\/\\/localhost\\/deluxe\\/public\\/admins\\/user?id=3\\\">@john<\\/a> Just Registerd on the site\"}', '{\"user\":\"read\",\"admin\":\"unread\"}', '2025-11-26 17:43:03', '2025-11-26 17:43:03');

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
(1, 11, 2, '{\"id\":11,\"photo\":\"1764139013.jpg\",\"name\":\"GRVIP 7\",\"price\":3000,\"return\":27200,\"validity\":7,\"limit\":5,\"json\":null,\"status\":\"active\",\"date\":\"2025-11-26 09:06:20\",\"updated\":\"2025-11-26 09:06:20\"}', 'active', '2025-11-26 17:06:44', '2025-11-26 17:06:44');

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
('kT0p2u9qtj8Ixmk7EutnUPQ7TIC9HOtOKbDySIo4', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXlLcWZLbDF3QmJiZ0lJMzViWjNDNDBmbWcyeXZoTGdGWGQ0UEdmdCI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vbG9jYWxob3N0L2RlbHV4ZS9wdWJsaWMvdXNlcnMvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764162672),
('N4xSSvGa8SrwUMAugAMp2qSKfmbalI4Cl2ozSGCI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidVptQU5XRGVtUE1Bb09LMzh2cUdieTJJN3plRGtyNk9FbEZwQmlsNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvZGVsdXhlL3B1YmxpYy91c2Vycy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUzOiJsb2dpbl9hZG1pbnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NTI6ImxvZ2luX3VzZXJzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1764146781);

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
(2, 'finance_settings', NULL, '{\"min_withdrawal\":\"1000\",\"min_deposit\":\"3000\",\"max_withdrawal\":\"100000\",\"max_deposit\":\"1000000\",\"withdrawal_fee\":\"13\",\"withdrawal_status\":\"active\"}', 'active', '2025-11-26 15:49:11'),
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
(1, 'TRX6925BC5463515', 2, 'deposit', 'credit', 5000, '{\"gateway\":\"manual\",\"account_name\":null,\"bank_name\":null}', 'pending', '2025-11-25 23:25:24', '2025-11-25 23:25:24'),
(2, 'TRX6925DB3719E3D', 2, 'deposit', 'credit', 5000, '{\"gateway\":\"manual\",\"account_name\":\"David James\",\"bank_name\":\"techie bank\"}', 'rejected', '2025-11-26 15:41:27', '2025-11-26 01:37:11'),
(3, 'TRX6925DC99802B3', 2, 'deposit', 'credit', 5000, '{\"gateway\":\"manual\",\"account_name\":\"David James\",\"bank_name\":\"techie bank\"}', 'success', '2025-11-26 15:40:34', '2025-11-26 01:43:05'),
(4, 'TRX6926B13EE3FBE', 2, 'withdrawal', 'debit', 870, '{\"account_number\": \"5005016577\", \"account_name\": \"David James\", \"bank_key\": \"ecobank\"}', 'success', '2025-11-26 16:50:49', '2025-11-26 16:50:22'),
(5, 'TRX6926B17DD01E7', 2, 'withdrawal', 'debit', 870, '{\"account_number\": \"5005016577\", \"account_name\": \"David James\", \"bank_key\": \"ecobank\"}', 'pending', '2025-11-26 16:51:25', '2025-11-26 16:51:25'),
(6, 'TRX6926B514B9222', 2, 'purchase', 'debit', 3000, '{\"id\":11,\"photo\":\"1764139013.jpg\",\"name\":\"GRVIP 7\",\"price\":3000,\"return\":27200,\"validity\":7,\"limit\":5,\"json\":null,\"status\":\"active\",\"date\":\"2025-11-26 09:06:20\",\"updated\":\"2025-11-26 09:06:20\"}', 'success', '2025-11-26 17:06:44', '2025-11-26 17:06:44'),
(7, 'TRX6926BBCB99A7D', 2, 'check in', 'credit', 50, NULL, 'success', '2025-11-26 17:35:23', '2025-11-26 17:35:23');

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

INSERT INTO `users` (`id`, `uniqid`, `name`, `email`, `username`, `mobile`, `ref`, `referral`, `photo`, `deposit`, `withdrawal`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `json`, `status`, `date`, `updated`) VALUES
(1, 'USR-69247CD7C4695', 'David', 'abakpadavid05@gmail.com', 'techie', NULL, NULL, NULL, 'avatar.svg', 0, 200, 'user', NULL, '$2y$12$qJfMJo.iuZv9sm.60.jD9O64bGX7NKo6Jfu6w6HIxaYM.KFDCZqf6', NULL, NULL, NULL, NULL, 'active', '2025-11-25 00:42:16', '2025-11-25 00:42:16'),
(2, 'USR-69254DB0942F6', 'David James', 'techie5961@gmail.com', 'blaady05', 9013350351, NULL, NULL, 'avatar.svg', 2100, 1250, 'user', NULL, '$2y$12$lwx1dV6wfdFQ/iZe4qE3e.hl05gZOSza2S9uE9rw9r24xgTDsT37S', 'D5JZLzZXIjL006LKevlT9f3jgub8a4hxYnJmj78UcxkAgoPAko0MmGVOcJaN', NULL, NULL, '{\"account_number\": \"5005016577\", \"account_name\": \"David James\", \"bank_key\": \"ecobank\"}', 'active', '2025-11-25 15:33:21', '2025-11-26 16:51:25'),
(3, 'USR-6926BD95D6941', 'john daniel', 'john@gmail.com', 'john', 8053846274, 'blaady05', NULL, 'avatar.svg', 0, 200, 'user', NULL, '$2y$12$B/KWPtzeYFx.ej/5Q5qJDOKNrnkPK7Dv8mP/rAMKyymYetNePeftG', 'LSu1pepXTLbWBzOuLiv1ZGl2Fo3nRd1dDGSD8PuG6U8hOMkVDUd0G0qkhPMV', NULL, NULL, NULL, 'active', '2025-11-26 17:43:03', '2025-11-26 17:43:03');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
