-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 07:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

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
-- Table structure for table `assignfarms`
--

CREATE TABLE `assignfarms` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_farm_manager` int(11) NOT NULL,
  `id_group_farm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignfarms`
--

INSERT INTO `assignfarms` (`id`, `id_farm_manager`, `id_group_farm`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2019-02-26 16:52:57', '2019-02-26 16:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah_pohon` int(11) DEFAULT '0',
  `varietas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siklus_pertumbuhan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panen_pertama` datetime DEFAULT NULL,
  `panen_terakhir` datetime DEFAULT NULL,
  `jumlah_produksi_pertahun` int(11) DEFAULT NULL,
  `latitude_longtitude_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_longtitude_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_longtitude_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_longtitude_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_farm_manager` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `jumlah_pohon`, `varietas`, `siklus_pertumbuhan`, `panen_pertama`, `panen_terakhir`, `jumlah_produksi_pertahun`, `latitude_longtitude_1`, `latitude_longtitude_2`, `latitude_longtitude_3`, `latitude_longtitude_4`, `id_farm_manager`, `created_at`, `updated_at`) VALUES
(1, 13, '1', 'string', '2019-03-03 23:30:48', '2019-03-03 23:30:48', 12, 'string', 'string', 'string', 'string', 12, '2019-02-28 20:46:30', '2019-03-03 16:37:24'),
(2, 13, '1', 'string', '2019-03-03 23:30:48', '2019-03-03 23:30:48', 12, 'string', 'string', 'string', 'string', 13, '2019-02-28 20:49:25', '2019-03-03 16:37:39'),
(3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, '2019-03-05 15:52:37', '2019-03-05 15:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `groupfarms`
--

CREATE TABLE `groupfarms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemilik_lahan` int(11) NOT NULL,
  `komoditas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupfarms`
--

INSERT INTO `groupfarms` (`id`, `name`, `id_pemilik_lahan`, `komoditas`, `created_at`, `updated_at`) VALUES
(1, 'Ranch', 1, 'Kopi', '2019-02-25 16:06:18', '2019-02-25 16:06:18'),
(3, 'Gardenia', 14, 'strawberry', '2019-02-28 23:00:18', '2019-02-28 23:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ahlipraktisi` int(11) NOT NULL,
  `komoditas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komoditas`
--

INSERT INTO `komoditas` (`id`, `id_ahlipraktisi`, `komoditas`, `created_at`, `updated_at`) VALUES
(1, 3, 'kopi', NULL, NULL),
(2, 3, 'jagung', NULL, NULL),
(3, 3, 'cabai', NULL, NULL),
(4, 4, 'kopi\r\n', NULL, NULL),
(6, 8, 'kopi', '2019-02-22 16:27:11', '2019-02-22 16:27:11'),
(7, 9, 'jagung', '2019-02-22 16:35:57', '2019-02-22 16:35:57'),
(8, 10, 'kopi', '2019-02-28 18:19:24', '2019-02-28 18:19:24'),
(9, 11, 'kopi', '2019-02-28 18:23:53', '2019-02-28 18:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group_farm` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varietas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_farm_manager` int(11) NOT NULL,
  `is_overdue` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `id_group_farm`, `name`, `note`, `varietas`, `foto1`, `foto2`, `foto3`, `id_farm_manager`, `is_overdue`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laporan Perkebunan', 'contoh note', '1', NULL, NULL, NULL, 2, 1, '2019-03-06 18:13:08', '2019-03-06 18:13:08'),
(2, 1, 'laporan 2', 'ga ada', '2', NULL, NULL, NULL, 2, 0, '2019-03-06 18:18:04', '2019-03-06 18:18:04'),
(3, 1, 'laporan 3', 'hmmmm', '1', NULL, NULL, NULL, 2, 1, '2019-03-06 18:20:02', '2019-03-06 18:20:02'),
(4, 1, 'LAPORANNN', 'hmmmmmmmm', '2', 'C:\\xampp\\tmp\\php31E5.tmp', NULL, 'C:\\xampp\\tmp\\php31E6.tmp', 2, 1, '2019-03-06 18:22:32', '2019-03-06 18:22:32'),
(5, 1, 'Nyiram kebooon', 'sayayaaaa', '1', 'api.inacrop.com/images/1551921834.jpg', NULL, 'api.inacrop.com/images/1551921834.jpg', 2, 1, '2019-03-06 18:23:54', '2019-03-06 18:23:54'),
(6, 1, 'Nyiram kebooon 2', 'sayayaaaa', '1', 'http://api.inacrop.com/laravel/public/images/1551922059.jpg', NULL, 'http://api.inacrop.com/laravel/public/images/1551922059.jpg', 2, 1, '2019-03-06 18:27:39', '2019-03-06 18:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `sender_id`, `message_id`, `created_at`, `updated_at`) VALUES
(1, 'tes', 3, 23, '2019-02-11 07:18:52', '2019-02-11 07:18:52'),
(2, 'tes2222', 3, 23, '2019-02-11 07:19:02', '2019-02-11 07:19:02'),
(3, 'tes3333', 3, 23, '2019-02-11 07:19:11', '2019-02-11 07:19:11'),
(4, 'tes4444', 4, 23, '2019-02-11 07:20:29', '2019-02-11 07:20:29'),
(5, 'tes5555', 4, 24, '2019-02-11 07:21:03', '2019-02-11 07:21:03');

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
(8, '2019_01_27_022715_create_messages_table', 2),
(9, '2019_01_28_222316_create_messages_table', 3),
(10, '2019_02_07_110143_create_farms_table', 3),
(11, '2019_02_09_000722_create_schedules_table', 4),
(12, '2019_02_09_060232_add_devicetoken_to_users', 5),
(13, '2019_02_11_092201_create_reports_table', 6),
(14, '2019_02_13_022118_create_forms_table', 7),
(15, '2019_02_22_045532_add_spesialis_to_users', 8),
(16, '2019_02_22_222100_ahlipraktisi', 9),
(17, '2019_02_22_224523_add_new_column_to_users', 10),
(18, '2019_02_25_225008_group_farm', 11),
(19, '2019_02_26_231929_assign', 12),
(20, '2019_02_26_231930_assign', 13),
(21, '2019_03_01_031632_farm', 14),
(22, '2019_03_02_232611_term', 15),
(23, '2019_03_04_110421_create_task', 16),
(24, '2019_03_05_020226_statustask', 17),
(25, '2019_03_07_002113_create_laporan', 18),
(26, '2019_03_08_061427_create_varietas', 19);

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
('03bbfb2814c23f27a361fd06fdd274f453a8418f4f8b883f5bfa6cc891eda602b1f11e91e6d9d4a6', 1, 1, 'MyApp', '[]', 0, '2019-02-03 08:29:20', '2019-02-03 08:29:20', '2020-02-03 15:29:20'),
('0558429217185f0da36fa18d42e9c093f624fb33d1d1e9ce4dedc656f2c79f1b40b5d8589fd8ecdb', 14, 1, 'MyApp', '[]', 0, '2019-03-02 16:44:02', '2019-03-02 16:44:02', '2020-03-02 23:44:02'),
('0d00d629ae2cf36c75cc69086a68d899df09bbea8066eaffc9320a52eb636ee772df8b6068c3d28a', 2, 1, 'MyApp', '[]', 0, '2019-02-03 08:36:17', '2019-02-03 08:36:17', '2020-02-03 15:36:17'),
('0e50717d482b8f84d5798c94bf0a60c5770ec5c8181ff4305025ea04a94a6c13a4cc56017a3484cf', 1, 1, 'MyApp', '[]', 0, '2019-02-08 23:08:59', '2019-02-08 23:08:59', '2020-02-09 06:08:59'),
('0ed70f095a8361abab6a48cfb2a3806fc35c369f96284bec648863acf9647b9a1aeb9baf1d036cff', 2, 1, 'MyApp', '[]', 0, '2019-02-10 23:41:11', '2019-02-10 23:41:11', '2020-02-11 06:41:11'),
('0f9f03ac14159cd0309ae6d1684543c820f2c776cf4e545f033c8c8c6d6b375b99f035f486ec687e', 1, 1, 'MyApp', '[]', 0, '2019-01-29 02:01:40', '2019-01-29 02:01:40', '2020-01-29 09:01:40'),
('10589c1f6ada0ec29c0fb87f2fb82eecc0e499ab8cd5539b503a4680b8ee5c02bf414cd68f87fde0', 1, 1, 'MyApp', '[]', 0, '2019-01-28 15:05:44', '2019-01-28 15:05:44', '2020-01-28 22:05:44'),
('12b9cd7d645e1c0cb5d8d082bdca5a05088a3ac4ca27a66bfe10a3af99dadf507ce87ae6fc30671c', 1, 1, 'MyApp', '[]', 0, '2019-02-14 21:10:20', '2019-02-14 21:10:20', '2020-02-15 04:10:20'),
('16372da135267bdc8b3ab87fcdda415ba234bbac60813ab7cc7297f80d276d9d5fe63263261d122e', 1, 1, 'MyApp', '[]', 0, '2019-01-26 10:46:30', '2019-01-26 10:46:30', '2020-01-26 17:46:30'),
('16d38df7e0366c0275b26deec32c3a406814433c3fd4144fd1c83056a4ea92d1134e37537a70d29a', 1, 1, 'MyApp', '[]', 0, '2019-03-10 10:57:52', '2019-03-10 10:57:52', '2020-03-10 17:57:52'),
('17fc446297e47027b68db31e5c9d7030db97261d72b541785e5a5fec0af22ea7da90c4f3ddc1d99c', 1, 1, 'MyApp', '[]', 0, '2019-03-04 04:22:58', '2019-03-04 04:22:58', '2020-03-04 11:22:58'),
('19e2f8eb155bc219499f2f65c30161e0749ee2fec6198197278a86c7605437c1e0eabe3051839fdc', 3, 1, 'MyApp', '[]', 0, '2019-02-07 04:55:52', '2019-02-07 04:55:52', '2020-02-07 11:55:52'),
('1e4e1f559b7ba64ccb0ca89f81d8f7361d8e24a76b6c7af7436db6d748e944757c4677ad0e0279d5', 3, 1, 'MyApp', '[]', 0, '2019-02-21 21:46:48', '2019-02-21 21:46:48', '2020-02-22 04:46:48'),
('23ceea8ec73e86de6e0fbe7948085a81ec6656b67c1acc27c6c8a5bfd6bbf0d9a078a716a014320f', 1, 1, 'MyApp', '[]', 0, '2019-03-10 10:38:30', '2019-03-10 10:38:30', '2020-03-10 17:38:30'),
('23fd3db64099cda6772326cc0786af593b119f3182101db7a6b1782cffa0b22636bd242b774f195e', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:38:06', '2019-01-27 03:38:06', '2020-01-27 10:38:06'),
('27d9700d4871b3ecdfd4f9c668647adb7456c639a0932854dca01362d8bb7a42571759915ebe995c', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:25:02', '2019-01-24 18:25:02', '2020-01-25 01:25:02'),
('27f1394fdc9d41fdf9ccf49605b84313873dead618860092d6ef1d646211c31fdba1c18f1c5e855f', 1, 1, 'MyApp', '[]', 0, '2019-01-27 00:58:12', '2019-01-27 00:58:12', '2020-01-27 07:58:12'),
('2aff5bfe2a9f2baacfca7e2df4052d98b9b9d4893832fc03fb4dd0cd551ac4d8fbae88852dfd0ac5', 15, 1, 'MyApp', '[]', 0, '2019-03-08 04:51:51', '2019-03-08 04:51:51', '2020-03-08 11:51:51'),
('30cee2787f54f23a97c74fb25051bebf596f44d7141647e6a943a80365ca83e95cb8cb15002942a8', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:09', '2019-01-24 18:15:09', '2020-01-25 01:15:09'),
('31ccd5e9bf85ec8a93a6ac0f15d7b4f38a50b47eb689c4fb2f41eef766b9a6d949c673b4b5ec4563', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:12', '2019-01-24 18:15:12', '2020-01-25 01:15:12'),
('35e1f4c4aad3275728cf490c54a5b1a462b965cf18d03fe69642d4ee53f8eca4b5a74afb8a743371', 2, 1, 'MyApp', '[]', 0, '2019-03-04 19:54:09', '2019-03-04 19:54:09', '2020-03-05 02:54:09'),
('374920cac7777f6be16b7db308ae4bdf964d585100b2eba43063c7f9784a45277b5574300ebc55e3', 2, 1, 'MyApp', '[]', 0, '2019-03-06 01:57:51', '2019-03-06 01:57:51', '2020-03-06 08:57:51'),
('392db63414286042094aeecb3e7b0d4117e04fb20529e846d917431720c1831e55b78b98b6890bf0', 1, 1, 'MyApp', '[]', 0, '2019-01-27 02:44:47', '2019-01-27 02:44:47', '2020-01-27 09:44:47'),
('3a46b6e54ab03542ab9a9725ded575d49f35d997dcc8517ba30134231e5e4faeeba3e674c809ce1a', 3, 1, 'MyApp', '[]', 0, '2019-02-11 07:18:30', '2019-02-11 07:18:30', '2020-02-11 14:18:30'),
('3c5765fc6247c66f7dfdf5025e4f20a149cb67fde2cfe1581bed5c8b31efc71ae187bc129281f354', 1, 1, 'MyApp', '[]', 0, '2019-03-06 02:11:39', '2019-03-06 02:11:39', '2020-03-06 09:11:39'),
('4249e06f30ff2bb97b36281c7c3b620529c42f81cf6f97df3e89ddffdb3497780d24b288a258ec84', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:44:13', '2019-01-27 03:44:13', '2020-01-27 10:44:13'),
('44b98e380b14f2d2e9ab4173f772f687c50598c865d2a48c92f1944d10f5d5bb5fd5e249c42bf083', 2, 1, 'MyApp', '[]', 0, '2019-03-06 18:10:54', '2019-03-06 18:10:54', '2020-03-07 01:10:54'),
('4ca4bd9499cc0e69a817bd560d0e0e286dee24ca737b2a4ef8aa8fcf8bf853a0aa6a528994cae1e6', 15, 1, 'MyApp', '[]', 0, '2019-03-05 16:26:02', '2019-03-05 16:26:02', '2020-03-05 23:26:02'),
('4ffb575343a1b2f24da2832c7e070c58637eff51ca1641129a2035a3307f943f4724899174c03240', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:54:16', '2019-02-03 06:54:16', '2020-02-03 13:54:16'),
('552afffa18daf61babb943ff425d41860215c4af1852194758992d5006d3e31e5b25ce0db11cceae', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:10:38', '2019-01-24 18:10:38', '2020-01-25 01:10:38'),
('59642d0b260c064283980aca9a87f9fa1cafccf5adba952fee8ddcc6188e66a22786b00bb2c255ec', 1, 1, 'MyApp', '[]', 0, '2019-01-28 16:13:42', '2019-01-28 16:13:42', '2020-01-28 23:13:42'),
('5e24464541a13977e6958245c1ae35b6653809051e42fc53fec88a8964afc426ec78e348af362230', 3, 1, 'MyApp', '[]', 0, '2019-02-11 06:15:32', '2019-02-11 06:15:32', '2020-02-11 13:15:32'),
('5f9e40a553b47c449df81dcb5ebc7985edee067812d0cde3cc6643f6144c274ce922041ff17f4155', 1, 1, 'MyApp', '[]', 0, '2019-01-30 19:13:50', '2019-01-30 19:13:50', '2020-01-31 02:13:50'),
('61727f7244410fa641531c9f0544307b4a796441209e6416534ee9d5dd96a4d3ab357ad485386011', 1, 1, 'MyApp', '[]', 0, '2019-02-07 04:32:16', '2019-02-07 04:32:16', '2020-02-07 11:32:16'),
('6228ff54bd04e75264b38ff6b40b835fc31772897d87485a1d1b2f8882fefb1026e50329ff84886b', 1, 1, 'MyApp', '[]', 0, '2019-02-25 16:12:32', '2019-02-25 16:12:32', '2020-02-25 23:12:32'),
('62b59083c846dec3022b7148d4385a9903cc9b39d3b6ba92b0f7f40508fa2524444ea1553089063c', 1, 1, 'MyApp', '[]', 0, '2019-02-21 00:49:05', '2019-02-21 00:49:05', '2020-02-21 07:49:05'),
('636f2eb304697b4f5679853e739651c491d2fb4e87f6c8350d247135f44c69b454b86b00b196c184', 2, 1, 'MyApp', '[]', 0, '2019-01-26 09:54:08', '2019-01-26 09:54:08', '2020-01-26 16:54:08'),
('67b2132deeee6b328c3006303c4459f93037f7f26ce0569f7eefc154018290e707d89bb2c755e03d', 2, 1, 'MyApp', '[]', 0, '2019-03-08 04:30:42', '2019-03-08 04:30:42', '2020-03-08 11:30:42'),
('77d92d373a47e116bcd9a32fce558f9b2ae50f81940286cbfaf6c91da5da7a9055407a98e8db5caf', 2, 1, 'MyApp', '[]', 0, '2019-01-28 15:06:53', '2019-01-28 15:06:53', '2020-01-28 22:06:53'),
('81208f958f30de438ff9e3d59c66c6b848827cbea101fda6149e7891fc0d078e952b3ea31cd5dbb0', 2, 1, 'MyApp', '[]', 0, '2019-02-11 02:37:44', '2019-02-11 02:37:44', '2020-02-11 09:37:44'),
('854499136709eb619d09deffe56c3366f695467b8c44da1ff04d155bef86e15ef6d85a90b52063d5', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:19:28', '2019-02-08 23:19:28', '2020-02-09 06:19:28'),
('8a4ed4483fc4b75a858399a0b4be4a20d471e073867df500bf5a9fe9fad2720aa666e03480fdc886', 1, 1, 'MyApp', '[]', 0, '2019-03-03 15:57:12', '2019-03-03 15:57:12', '2020-03-03 22:57:12'),
('8c1d60c2de264a007b7bd41568bfb1df770e4fff0bcf3f343402f28cd6a478faab36668d2c05f7cf', 2, 1, 'MyApp', '[]', 0, '2019-03-04 19:41:47', '2019-03-04 19:41:47', '2020-03-05 02:41:47'),
('8ea1e935bc97250de64f19507e7e69e34f46843350c18e35f9685625f63aa84001837d62f99d67c9', 3, 1, 'MyApp', '[]', 0, '2019-01-28 15:08:06', '2019-01-28 15:08:06', '2020-01-28 22:08:06'),
('92d4bd8359c5e65f1d19e0678e18aeda91c2c479a433b5c27c087da0b49bd78dc0414e2360ef38b8', 15, 1, 'MyApp', '[]', 0, '2019-03-05 15:53:18', '2019-03-05 15:53:18', '2020-03-05 22:53:18'),
('93cbe06de1d6d375729ec6a98fea931c3a9a6f1881f68cde5cc6919054d1e5c0bfc08e76707ae203', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:06', '2019-01-24 18:15:06', '2020-01-25 01:15:06'),
('95d3ae45dd24fb31b1dde65e93a9c8b683e03bc031558a139f8f5f356ec0dc51ca0c389ced47a8b6', 2, 1, 'MyApp', '[]', 0, '2019-03-07 23:31:17', '2019-03-07 23:31:17', '2020-03-08 06:31:17'),
('97e5e59c1d63e748deabce0d4b04d7c6ce84b5af396f5a44861e325f19035f514b264918a07d845b', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:53:35', '2019-01-24 18:53:35', '2020-01-25 01:53:35'),
('9e0d00352b64f320ac1931d899d843ea59652c43a02a94ec5650c992913a6522b0fbb12ab8a658c4', 2, 1, 'MyApp', '[]', 0, '2019-03-03 16:26:45', '2019-03-03 16:26:45', '2020-03-03 23:26:45'),
('9ef4b6e218f1f08b4b38fe7998704e95c40e0de700971df8487a7a5e761f008ed7354aa540091e9c', 2, 1, 'MyApp', '[]', 0, '2019-03-03 16:35:04', '2019-03-03 16:35:04', '2020-03-03 23:35:04'),
('b0723bc2cd8eb26c06d2ac40dd02def94b3f9aa3303ea57db33df4cdd26a2e93847195ffeff77ff5', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:14:26', '2019-01-24 18:14:26', '2020-01-25 01:14:26'),
('b0a6254e6e5c91e3cfd7d9d9ed47521fe07755cfbdc0a9df0be870640e4462760c00ec743092f660', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:21:21', '2019-02-08 23:21:21', '2020-02-09 06:21:21'),
('b1fa7baa3c8be1cd5f8d6be36448d96753e292ecc0b30a8910409cd0fe58d23d24ace39af40f412a', 3, 1, 'MyApp', '[]', 0, '2019-02-22 23:37:26', '2019-02-22 23:37:26', '2020-02-23 06:37:26'),
('badbf80ad9d138f689beed124c20e6a408be6b4d8c15a99e276730c0344d34915a083a8aad7b8ba2', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:54:26', '2019-02-03 06:54:26', '2020-02-03 13:54:26'),
('bda6f7ba987225994468cb26d8956697cc9afa9114f3691250d4e4a752cc225e8d3421aa264983f6', 13, 1, 'MyApp', '[]', 0, '2019-02-28 20:49:53', '2019-02-28 20:49:53', '2020-03-01 03:49:53'),
('bda8ca36f0b3f0bb507e1da1030e33d5db4246bd14e216398a31f117a47234542eca323b40c141c1', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:36:41', '2019-01-24 18:36:41', '2020-01-25 01:36:41'),
('bf0de194f11f0d785538e7813ee09f44b9cd88d2c645660339ee55953ca73cb74bc823c1b08cb580', 3, 1, 'MyApp', '[]', 0, '2019-02-22 15:07:12', '2019-02-22 15:07:12', '2020-02-22 22:07:12'),
('c78382c3f809ccf8fc93a45641a2ef966aabe0e176e459b4acfd19943cb45cb173618b827184aa64', 11, 1, 'MyApp', '[]', 0, '2019-02-28 18:24:37', '2019-02-28 18:24:37', '2020-03-01 01:24:37'),
('c924457b45a6cb6bbd4a780fac9c758f3836e3530bd8bc790925061c640e02f1e18b968a38043fe7', 1, 1, 'MyApp', '[]', 0, '2019-02-07 03:59:17', '2019-02-07 03:59:17', '2020-02-07 10:59:17'),
('cb9e2bc845969d011b68740adc8b5093c5a1018fc8e33b39399d559be12e4f6995b2b6b759540c5f', 1, 1, 'MyApp', '[]', 0, '2019-02-07 04:25:35', '2019-02-07 04:25:35', '2020-02-07 11:25:35'),
('cbef6816a9903309cfeb42ddf572070bfff5251c201727f9371919c960d464b2ca9c49fa5bbf12fc', 14, 1, 'MyApp', '[]', 0, '2019-03-10 11:04:01', '2019-03-10 11:04:01', '2020-03-10 18:04:01'),
('cc23b1a1698663c22a6122332b3ab417a22d6fbe72acb007213727e4783f7581aa377d48697ce54c', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:03:53', '2019-02-03 06:03:53', '2020-02-03 13:03:53'),
('cc8f26ee2b6378832583ec5df48c918f61b7d82725f26c2a6178d9355c5c8758b9978059618aa58d', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:28:07', '2019-02-08 23:28:07', '2020-02-09 06:28:07'),
('d085af0206bad1699cbf6d24859b84b128b0610e724b2b5843778b581667bedcdfa7f27f8a388aaf', 1, 1, 'MyApp', '[]', 0, '2019-02-21 21:42:30', '2019-02-21 21:42:30', '2020-02-22 04:42:30'),
('d182143261830bfb83cec8c42f602c7fa7d5975abd00cad5d1078656e40ab7c3dc829dabf561292c', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:33:31', '2019-01-24 18:33:31', '2020-01-25 01:33:31'),
('d1fba699935e2ccf8d3c5452104873477563050181d10bd5bc7967b0dcbd341f63f7fe7869d77071', 2, 1, 'MyApp', '[]', 0, '2019-03-06 18:17:13', '2019-03-06 18:17:13', '2020-03-07 01:17:13'),
('d4b9616e8a94a7928d1c5f9a5a9556c65f7385bdf91d2e0e2a83a1548234c31a3e14e40f327451aa', 1, 1, 'MyApp', '[]', 0, '2019-03-04 19:42:19', '2019-03-04 19:42:19', '2020-03-05 02:42:19'),
('d55f964d942315e11c47d1735b623a3ed75d9a989851566c73f0ff8d98a400cc8b4e9c1dc2802a48', 14, 1, 'MyApp', '[]', 0, '2019-02-28 23:01:19', '2019-02-28 23:01:19', '2020-03-01 06:01:19'),
('dce018366e871a7e6352ef4f101eceacc6b905f5dfb1a0b09f19057d55b5d57e0e9011cedccfa9c2', 3, 1, 'MyApp', '[]', 0, '2019-02-10 23:33:56', '2019-02-10 23:33:56', '2020-02-11 06:33:56'),
('de66eb1c900aa24f58b678f18634804963134e114e8bc7a4eef206c01e43fd7a14083667eaff4459', 2, 1, 'MyApp', '[]', 0, '2019-02-11 02:37:05', '2019-02-11 02:37:05', '2020-02-11 09:37:05'),
('df10e5705be661de01ab83fa224f6ba9ed07913998089a0d4ede13f46c08739fd6fb86714764d327', 1, 1, 'MyApp', '[]', 0, '2019-03-07 20:38:52', '2019-03-07 20:38:52', '2020-03-08 03:38:52'),
('e0eda42ce16b5ffaf0bbb928ed09d37a212393a39c703d22142a24f49450382b24a85a0cd3163f88', 1, 1, 'MyApp', '[]', 0, '2019-02-03 15:24:04', '2019-02-03 15:24:04', '2020-02-03 22:24:04'),
('e682b316f02be083a3c9d5df77d07f2ad99123dae53a3ef78c9751894f2ae245cac044c6a06099e9', 1, 1, 'MyApp', '[]', 0, '2019-02-03 07:42:27', '2019-02-03 07:42:27', '2020-02-03 14:42:27'),
('e8c1defe8c205b028d1c03d6bf75b6bd654a15b04e3aa882904d2545de9ee308dd1fee7c0da02156', 2, 1, 'MyApp', '[]', 0, '2019-03-10 11:14:29', '2019-03-10 11:14:29', '2020-03-10 18:14:29'),
('ec4fb26ebaa85a9f551ba0e4cdd6a50bc94f54fb8b4dfe9e9af62ba081ca27879673b338d606ef81', 3, 1, 'MyApp', '[]', 0, '2019-02-07 04:47:23', '2019-02-07 04:47:23', '2020-02-07 11:47:23'),
('ecff4759545b6eacb5614219bfd14b2521df6e51a88c4aa7f87caaf8600c09efaf6a7b2fb4730c54', 1, 1, 'MyApp', '[]', 0, '2019-01-27 02:47:46', '2019-01-27 02:47:46', '2020-01-27 09:47:46'),
('edb2c3b253e861d3d84b3bd86e6be15b4401e80eace1cb0e080cd080651b999f5820bdc6c67eaa16', 4, 1, 'MyApp', '[]', 0, '2019-02-15 02:53:43', '2019-02-15 02:53:43', '2020-02-15 09:53:43'),
('f04f7954de5f4b9cf2f8b8bc4021e55482cb5580d578b2c7f820aa54d160430dff5eb3e6b4dd293a', 2, 1, 'MyApp', '[]', 0, '2019-02-21 21:23:18', '2019-02-21 21:23:18', '2020-02-22 04:23:18'),
('fade1831d7c849dbecc54a6abe3392df2afd4fc48aeb97fd0dc26e580a26b60d8aeaa4551e69ff09', 3, 1, 'MyApp', '[]', 0, '2019-02-22 22:38:01', '2019-02-22 22:38:01', '2020-02-23 05:38:01');

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
-- Table structure for table `statustasks`
--

CREATE TABLE `statustasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_farm_manager` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statustasks`
--

INSERT INTO `statustasks` (`id`, `id_task`, `id_farm_manager`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 1, '2019-03-04 21:47:55', '2019-03-04 21:47:55'),
(2, 2, '2', 0, '2019-03-04 21:47:55', '2019-03-04 21:47:55'),
(3, 1, '15', 1, '2019-03-05 15:54:04', '2019-03-05 16:45:48'),
(4, 2, '15', 0, '2019-03-05 15:54:04', '2019-03-05 15:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pemilik_lahan` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_term` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `id_pemilik_lahan`, `title`, `description`, `id_term`, `created_at`, `updated_at`) VALUES
(1, 1, 'nyangkul', 'ya nyangkul', 1, '2019-03-04 04:25:56', '2019-03-04 04:25:56'),
(2, 1, 'nyiram', 'ya nyiram', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pemilik_lahan` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `id_pemilik_lahan`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'term1', '2019-03-01 00:00:00', '2019-04-01 00:00:00', '2019-03-02 16:46:35', '2019-03-02 16:46:35'),
(2, 1, 'term2', '2019-03-05 00:00:00', '2019-03-06 00:00:00', '2019-03-03 15:59:24', '2019-03-03 15:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `devicetoken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `devicetoken`, `no_hp`, `alamat`, `foto`) VALUES
(1, 'James', 'pemiliklahan@gmail.com', 1, '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-24 18:10:37', '2019-03-10 10:57:52', '', '', '', ''),
(2, 'Watanabe', 'farmmanager@gmail.com', 2, '$2y$10$4gZu2zN/0baEdB3cc1DNF.OGbDvoEC1RSA1g4xf.qV8QP4FQHGXiS', NULL, '2019-01-24 18:33:31', '2019-03-10 11:14:30', '', '08217391465', 'Jln PegangTimur', 'http://api.inacrop.com/laravel/public/images/1552045260.jpg'),
(3, 'Lara Croft', 'ahlipraktisi@gmail.com', 3, '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-27 00:22:10', '2019-02-22 23:49:14', '', '0124612464', 'balebak', ''),
(4, 'mahatir', 'ahlipraktisi2@gmail.com', 3, '$2y$10$BrZ5ega/lIfyT1r.W/oQRuXsv230vw5E8xCEcb3i9ILITr9DfrVWq', NULL, '2019-02-07 04:45:03', '2019-02-15 02:53:43', '', '', '', ''),
(8, 'Slamet Pangarep', 'ahlikopi@gmail.com', 3, '$2y$10$BrZ5ega/lIfyT1r.W/oQRuXsv230vw5E8xCEcb3i9ILITr9DfrVWq', NULL, '2019-02-22 16:27:11', '2019-02-22 16:27:11', NULL, NULL, NULL, NULL),
(9, 'Hayami Saori', 'ahlijagung@gmail.com', 3, '$2y$10$BrZ5ega/lIfyT1r.W/oQRuXsv230vw5E8xCEcb3i9ILITr9DfrVWq', NULL, '2019-02-22 16:35:57', '2019-02-22 16:35:57', NULL, NULL, NULL, NULL),
(11, 'wuik', 'wira@gmail.com', 3, '$2y$10$jEBKcjNDR0f3WPu8TQCfP.vW3aSmrEjUM2Wm0K3OLEEfGueqDYztq', NULL, '2019-02-28 18:23:53', '2019-02-28 18:24:37', '', NULL, NULL, NULL),
(12, 'Nier', 'farmmanager2@gmail.com', 2, '$2y$10$AbumpHTAWqN8qHTzZY6w.ePeGwnS/mN7nXzxyzewZWj65zrOA1wl6', NULL, '2019-02-28 20:46:30', '2019-02-28 20:46:30', NULL, NULL, NULL, NULL),
(13, 'Haruka Kanagawa', 'farmmanager3@gmail.com', 2, '$2y$10$lg74G58261H4/LNPtVXCreJSfVVDesi3NehSDiFuCU30YLJSBm4Aa', NULL, '2019-02-28 20:49:25', '2019-02-28 20:49:53', '', NULL, NULL, NULL),
(14, 'Saya Kawamoto', 'sayaya@gmail.com', 1, '$2y$10$7yUGJ2.YSTTV3zBrBUmS0uFxOSoeB2ySlYE8/1Vv/aJSxZn7FEiFm', NULL, '2019-02-28 23:00:17', '2019-03-10 11:04:01', '', NULL, NULL, NULL),
(15, 'Yuvi', 'yuvi@gmail.com', 2, '$2y$10$METowo52aai0xUrLPjc/ZOgLMv9n.wJmzzy6DSaczC2MV4VNCHdpy', NULL, '2019-03-05 15:52:37', '2019-03-08 04:51:51', '', '08787788777', 'jakarta', 'http://api.inacrop.com/laravel/public/images/1552045415.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `varietas`
--

CREATE TABLE `varietas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varietas`
--

INSERT INTO `varietas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'oryza satyva', NULL, NULL),
(2, 'laksuma zenus', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignfarms`
--
ALTER TABLE `assignfarms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupfarms`
--
ALTER TABLE `groupfarms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `statustasks`
--
ALTER TABLE `statustasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `varietas`
--
ALTER TABLE `varietas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignfarms`
--
ALTER TABLE `assignfarms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groupfarms`
--
ALTER TABLE `groupfarms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT for table `statustasks`
--
ALTER TABLE `statustasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `varietas`
--
ALTER TABLE `varietas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
