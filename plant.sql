-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 11:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_01_27_022715_create_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('10589c1f6ada0ec29c0fb87f2fb82eecc0e499ab8cd5539b503a4680b8ee5c02bf414cd68f87fde0', 1, 1, 'MyApp', '[]', 0, '2019-01-28 15:05:44', '2019-01-28 15:05:44', '2020-01-28 22:05:44'),
('16372da135267bdc8b3ab87fcdda415ba234bbac60813ab7cc7297f80d276d9d5fe63263261d122e', 1, 1, 'MyApp', '[]', 0, '2019-01-26 10:46:30', '2019-01-26 10:46:30', '2020-01-26 17:46:30'),
('23fd3db64099cda6772326cc0786af593b119f3182101db7a6b1782cffa0b22636bd242b774f195e', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:38:06', '2019-01-27 03:38:06', '2020-01-27 10:38:06'),
('27d9700d4871b3ecdfd4f9c668647adb7456c639a0932854dca01362d8bb7a42571759915ebe995c', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:25:02', '2019-01-24 18:25:02', '2020-01-25 01:25:02'),
('27f1394fdc9d41fdf9ccf49605b84313873dead618860092d6ef1d646211c31fdba1c18f1c5e855f', 1, 1, 'MyApp', '[]', 0, '2019-01-27 00:58:12', '2019-01-27 00:58:12', '2020-01-27 07:58:12'),
('30cee2787f54f23a97c74fb25051bebf596f44d7141647e6a943a80365ca83e95cb8cb15002942a8', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:09', '2019-01-24 18:15:09', '2020-01-25 01:15:09'),
('31ccd5e9bf85ec8a93a6ac0f15d7b4f38a50b47eb689c4fb2f41eef766b9a6d949c673b4b5ec4563', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:12', '2019-01-24 18:15:12', '2020-01-25 01:15:12'),
('392db63414286042094aeecb3e7b0d4117e04fb20529e846d917431720c1831e55b78b98b6890bf0', 1, 1, 'MyApp', '[]', 0, '2019-01-27 02:44:47', '2019-01-27 02:44:47', '2020-01-27 09:44:47'),
('4249e06f30ff2bb97b36281c7c3b620529c42f81cf6f97df3e89ddffdb3497780d24b288a258ec84', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:44:13', '2019-01-27 03:44:13', '2020-01-27 10:44:13'),
('552afffa18daf61babb943ff425d41860215c4af1852194758992d5006d3e31e5b25ce0db11cceae', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:10:38', '2019-01-24 18:10:38', '2020-01-25 01:10:38'),
('636f2eb304697b4f5679853e739651c491d2fb4e87f6c8350d247135f44c69b454b86b00b196c184', 2, 1, 'MyApp', '[]', 0, '2019-01-26 09:54:08', '2019-01-26 09:54:08', '2020-01-26 16:54:08'),
('77d92d373a47e116bcd9a32fce558f9b2ae50f81940286cbfaf6c91da5da7a9055407a98e8db5caf', 2, 1, 'MyApp', '[]', 0, '2019-01-28 15:06:53', '2019-01-28 15:06:53', '2020-01-28 22:06:53'),
('8ea1e935bc97250de64f19507e7e69e34f46843350c18e35f9685625f63aa84001837d62f99d67c9', 3, 1, 'MyApp', '[]', 0, '2019-01-28 15:08:06', '2019-01-28 15:08:06', '2020-01-28 22:08:06'),
('93cbe06de1d6d375729ec6a98fea931c3a9a6f1881f68cde5cc6919054d1e5c0bfc08e76707ae203', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:06', '2019-01-24 18:15:06', '2020-01-25 01:15:06'),
('97e5e59c1d63e748deabce0d4b04d7c6ce84b5af396f5a44861e325f19035f514b264918a07d845b', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:53:35', '2019-01-24 18:53:35', '2020-01-25 01:53:35'),
('b0723bc2cd8eb26c06d2ac40dd02def94b3f9aa3303ea57db33df4cdd26a2e93847195ffeff77ff5', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:14:26', '2019-01-24 18:14:26', '2020-01-25 01:14:26'),
('bda8ca36f0b3f0bb507e1da1030e33d5db4246bd14e216398a31f117a47234542eca323b40c141c1', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:36:41', '2019-01-24 18:36:41', '2020-01-25 01:36:41'),
('d182143261830bfb83cec8c42f602c7fa7d5975abd00cad5d1078656e40ab7c3dc829dabf561292c', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:33:31', '2019-01-24 18:33:31', '2020-01-25 01:33:31'),
('ecff4759545b6eacb5614219bfd14b2521df6e51a88c4aa7f87caaf8600c09efaf6a7b2fb4730c54', 1, 1, 'MyApp', '[]', 0, '2019-01-27 02:47:46', '2019-01-27 02:47:46', '2020-01-27 09:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'IZ7Wxcpm3dsOlhnpw9Q8cXgpOFRnTeQw3AUbCP6W', 'http://localhost', 1, 0, 0, '2019-01-24 17:45:57', '2019-01-24 17:45:57'),
(2, NULL, 'Laravel Password Grant Client', 'KoIOfuemnB33Z49GU3YZKTltTvlLQXtZkVMuk54W', 'http://localhost', 0, 1, 0, '2019-01-24 17:45:57', '2019-01-24 17:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-01-24 17:45:57', '2019-01-24 17:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James', 'pemiliklahan@gmail.com', '1', '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-24 18:10:37', '2019-01-24 18:10:37'),
(2, 'Budi', 'farmmanager@gmail.com', '2', '$2y$10$4gZu2zN/0baEdB3cc1DNF.OGbDvoEC1RSA1g4xf.qV8QP4FQHGXiS', NULL, '2019-01-24 18:33:31', '2019-01-24 18:33:31'),
(3, 'Andi', 'ahlipraktisi@gmail.com', '3', '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-27 00:22:10', '2019-01-27 00:22:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
