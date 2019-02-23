-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 07:50 AM
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
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemilik_lahan` int(11) NOT NULL,
  `id_farm_manager` int(11) NOT NULL,
  `id_ahli_praktisi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `id_pemilik_lahan`, `id_farm_manager`, `id_ahli_praktisi`, `created_at`, `updated_at`) VALUES
(1, 'Cibulao', 1, 4, 3, '2019-02-07 04:40:42', '2019-02-07 04:40:42'),
(2, 'Cibulao2', 1, 2, 3, '2019-02-07 04:45:57', '2019-02-07 04:45:57'),
(3, 'Cibulao3', 1, 3, 3, '2019-02-07 04:46:02', '2019-02-07 04:46:02'),
(4, 'Cibulao4', 1, 6, 3, '2019-02-07 04:46:06', '2019-02-07 04:46:06'),
(5, 'Cibulao5', 1, 7, 3, '2019-02-07 04:46:10', '2019-02-07 04:46:10'),
(6, 'ciwidey', 1, 8, 4, '2019-02-07 04:46:22', '2019-02-07 04:46:22'),
(7, 'ciwidey1', 1, 9, 4, '2019-02-07 04:46:25', '2019-02-07 04:46:25'),
(8, 'ciwidey2', 1, 10, 4, '2019-02-07 04:46:29', '2019-02-07 04:46:29'),
(9, 'cibulao6', 1, 11, 3, '2019-02-07 04:56:52', '2019-02-07 04:56:52'),
(10, 'ciwidey2', 1, 12, 4, '2019-02-08 17:57:13', '2019-02-08 17:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ahlipraktisi` int(11) NOT NULL,
  `variabel1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variabel2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `id_ahlipraktisi`, `variabel1`, `variabel2`, `created_at`, `updated_at`) VALUES
(1, 4, 'ASU', 'KHON', '2019-02-15 02:54:58', '2019-02-15 02:56:08'),
(2, 4, 'string', 'string', '2019-02-15 02:55:14', '2019-02-22 22:58:32');

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
(7, 9, 'jagung', '2019-02-22 16:35:57', '2019-02-22 16:35:57');

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
(17, '2019_02_22_224523_add_new_column_to_users', 10);

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
('0d00d629ae2cf36c75cc69086a68d899df09bbea8066eaffc9320a52eb636ee772df8b6068c3d28a', 2, 1, 'MyApp', '[]', 0, '2019-02-03 08:36:17', '2019-02-03 08:36:17', '2020-02-03 15:36:17'),
('0e50717d482b8f84d5798c94bf0a60c5770ec5c8181ff4305025ea04a94a6c13a4cc56017a3484cf', 1, 1, 'MyApp', '[]', 0, '2019-02-08 23:08:59', '2019-02-08 23:08:59', '2020-02-09 06:08:59'),
('0ed70f095a8361abab6a48cfb2a3806fc35c369f96284bec648863acf9647b9a1aeb9baf1d036cff', 2, 1, 'MyApp', '[]', 0, '2019-02-10 23:41:11', '2019-02-10 23:41:11', '2020-02-11 06:41:11'),
('0f9f03ac14159cd0309ae6d1684543c820f2c776cf4e545f033c8c8c6d6b375b99f035f486ec687e', 1, 1, 'MyApp', '[]', 0, '2019-01-29 02:01:40', '2019-01-29 02:01:40', '2020-01-29 09:01:40'),
('10589c1f6ada0ec29c0fb87f2fb82eecc0e499ab8cd5539b503a4680b8ee5c02bf414cd68f87fde0', 1, 1, 'MyApp', '[]', 0, '2019-01-28 15:05:44', '2019-01-28 15:05:44', '2020-01-28 22:05:44'),
('12b9cd7d645e1c0cb5d8d082bdca5a05088a3ac4ca27a66bfe10a3af99dadf507ce87ae6fc30671c', 1, 1, 'MyApp', '[]', 0, '2019-02-14 21:10:20', '2019-02-14 21:10:20', '2020-02-15 04:10:20'),
('16372da135267bdc8b3ab87fcdda415ba234bbac60813ab7cc7297f80d276d9d5fe63263261d122e', 1, 1, 'MyApp', '[]', 0, '2019-01-26 10:46:30', '2019-01-26 10:46:30', '2020-01-26 17:46:30'),
('19e2f8eb155bc219499f2f65c30161e0749ee2fec6198197278a86c7605437c1e0eabe3051839fdc', 3, 1, 'MyApp', '[]', 0, '2019-02-07 04:55:52', '2019-02-07 04:55:52', '2020-02-07 11:55:52'),
('1e4e1f559b7ba64ccb0ca89f81d8f7361d8e24a76b6c7af7436db6d748e944757c4677ad0e0279d5', 3, 1, 'MyApp', '[]', 0, '2019-02-21 21:46:48', '2019-02-21 21:46:48', '2020-02-22 04:46:48'),
('23fd3db64099cda6772326cc0786af593b119f3182101db7a6b1782cffa0b22636bd242b774f195e', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:38:06', '2019-01-27 03:38:06', '2020-01-27 10:38:06'),
('27d9700d4871b3ecdfd4f9c668647adb7456c639a0932854dca01362d8bb7a42571759915ebe995c', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:25:02', '2019-01-24 18:25:02', '2020-01-25 01:25:02'),
('27f1394fdc9d41fdf9ccf49605b84313873dead618860092d6ef1d646211c31fdba1c18f1c5e855f', 1, 1, 'MyApp', '[]', 0, '2019-01-27 00:58:12', '2019-01-27 00:58:12', '2020-01-27 07:58:12'),
('30cee2787f54f23a97c74fb25051bebf596f44d7141647e6a943a80365ca83e95cb8cb15002942a8', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:09', '2019-01-24 18:15:09', '2020-01-25 01:15:09'),
('31ccd5e9bf85ec8a93a6ac0f15d7b4f38a50b47eb689c4fb2f41eef766b9a6d949c673b4b5ec4563', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:12', '2019-01-24 18:15:12', '2020-01-25 01:15:12'),
('392db63414286042094aeecb3e7b0d4117e04fb20529e846d917431720c1831e55b78b98b6890bf0', 1, 1, 'MyApp', '[]', 0, '2019-01-27 02:44:47', '2019-01-27 02:44:47', '2020-01-27 09:44:47'),
('3a46b6e54ab03542ab9a9725ded575d49f35d997dcc8517ba30134231e5e4faeeba3e674c809ce1a', 3, 1, 'MyApp', '[]', 0, '2019-02-11 07:18:30', '2019-02-11 07:18:30', '2020-02-11 14:18:30'),
('4249e06f30ff2bb97b36281c7c3b620529c42f81cf6f97df3e89ddffdb3497780d24b288a258ec84', 1, 1, 'MyApp', '[]', 0, '2019-01-27 03:44:13', '2019-01-27 03:44:13', '2020-01-27 10:44:13'),
('4ffb575343a1b2f24da2832c7e070c58637eff51ca1641129a2035a3307f943f4724899174c03240', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:54:16', '2019-02-03 06:54:16', '2020-02-03 13:54:16'),
('552afffa18daf61babb943ff425d41860215c4af1852194758992d5006d3e31e5b25ce0db11cceae', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:10:38', '2019-01-24 18:10:38', '2020-01-25 01:10:38'),
('59642d0b260c064283980aca9a87f9fa1cafccf5adba952fee8ddcc6188e66a22786b00bb2c255ec', 1, 1, 'MyApp', '[]', 0, '2019-01-28 16:13:42', '2019-01-28 16:13:42', '2020-01-28 23:13:42'),
('5e24464541a13977e6958245c1ae35b6653809051e42fc53fec88a8964afc426ec78e348af362230', 3, 1, 'MyApp', '[]', 0, '2019-02-11 06:15:32', '2019-02-11 06:15:32', '2020-02-11 13:15:32'),
('5f9e40a553b47c449df81dcb5ebc7985edee067812d0cde3cc6643f6144c274ce922041ff17f4155', 1, 1, 'MyApp', '[]', 0, '2019-01-30 19:13:50', '2019-01-30 19:13:50', '2020-01-31 02:13:50'),
('61727f7244410fa641531c9f0544307b4a796441209e6416534ee9d5dd96a4d3ab357ad485386011', 1, 1, 'MyApp', '[]', 0, '2019-02-07 04:32:16', '2019-02-07 04:32:16', '2020-02-07 11:32:16'),
('62b59083c846dec3022b7148d4385a9903cc9b39d3b6ba92b0f7f40508fa2524444ea1553089063c', 1, 1, 'MyApp', '[]', 0, '2019-02-21 00:49:05', '2019-02-21 00:49:05', '2020-02-21 07:49:05'),
('636f2eb304697b4f5679853e739651c491d2fb4e87f6c8350d247135f44c69b454b86b00b196c184', 2, 1, 'MyApp', '[]', 0, '2019-01-26 09:54:08', '2019-01-26 09:54:08', '2020-01-26 16:54:08'),
('77d92d373a47e116bcd9a32fce558f9b2ae50f81940286cbfaf6c91da5da7a9055407a98e8db5caf', 2, 1, 'MyApp', '[]', 0, '2019-01-28 15:06:53', '2019-01-28 15:06:53', '2020-01-28 22:06:53'),
('81208f958f30de438ff9e3d59c66c6b848827cbea101fda6149e7891fc0d078e952b3ea31cd5dbb0', 2, 1, 'MyApp', '[]', 0, '2019-02-11 02:37:44', '2019-02-11 02:37:44', '2020-02-11 09:37:44'),
('854499136709eb619d09deffe56c3366f695467b8c44da1ff04d155bef86e15ef6d85a90b52063d5', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:19:28', '2019-02-08 23:19:28', '2020-02-09 06:19:28'),
('8ea1e935bc97250de64f19507e7e69e34f46843350c18e35f9685625f63aa84001837d62f99d67c9', 3, 1, 'MyApp', '[]', 0, '2019-01-28 15:08:06', '2019-01-28 15:08:06', '2020-01-28 22:08:06'),
('93cbe06de1d6d375729ec6a98fea931c3a9a6f1881f68cde5cc6919054d1e5c0bfc08e76707ae203', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:15:06', '2019-01-24 18:15:06', '2020-01-25 01:15:06'),
('97e5e59c1d63e748deabce0d4b04d7c6ce84b5af396f5a44861e325f19035f514b264918a07d845b', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:53:35', '2019-01-24 18:53:35', '2020-01-25 01:53:35'),
('b0723bc2cd8eb26c06d2ac40dd02def94b3f9aa3303ea57db33df4cdd26a2e93847195ffeff77ff5', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:14:26', '2019-01-24 18:14:26', '2020-01-25 01:14:26'),
('b0a6254e6e5c91e3cfd7d9d9ed47521fe07755cfbdc0a9df0be870640e4462760c00ec743092f660', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:21:21', '2019-02-08 23:21:21', '2020-02-09 06:21:21'),
('b1fa7baa3c8be1cd5f8d6be36448d96753e292ecc0b30a8910409cd0fe58d23d24ace39af40f412a', 3, 1, 'MyApp', '[]', 0, '2019-02-22 23:37:26', '2019-02-22 23:37:26', '2020-02-23 06:37:26'),
('badbf80ad9d138f689beed124c20e6a408be6b4d8c15a99e276730c0344d34915a083a8aad7b8ba2', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:54:26', '2019-02-03 06:54:26', '2020-02-03 13:54:26'),
('bda8ca36f0b3f0bb507e1da1030e33d5db4246bd14e216398a31f117a47234542eca323b40c141c1', 1, 1, 'MyApp', '[]', 0, '2019-01-24 18:36:41', '2019-01-24 18:36:41', '2020-01-25 01:36:41'),
('bf0de194f11f0d785538e7813ee09f44b9cd88d2c645660339ee55953ca73cb74bc823c1b08cb580', 3, 1, 'MyApp', '[]', 0, '2019-02-22 15:07:12', '2019-02-22 15:07:12', '2020-02-22 22:07:12'),
('c924457b45a6cb6bbd4a780fac9c758f3836e3530bd8bc790925061c640e02f1e18b968a38043fe7', 1, 1, 'MyApp', '[]', 0, '2019-02-07 03:59:17', '2019-02-07 03:59:17', '2020-02-07 10:59:17'),
('cb9e2bc845969d011b68740adc8b5093c5a1018fc8e33b39399d559be12e4f6995b2b6b759540c5f', 1, 1, 'MyApp', '[]', 0, '2019-02-07 04:25:35', '2019-02-07 04:25:35', '2020-02-07 11:25:35'),
('cc23b1a1698663c22a6122332b3ab417a22d6fbe72acb007213727e4783f7581aa377d48697ce54c', 1, 1, 'MyApp', '[]', 0, '2019-02-03 06:03:53', '2019-02-03 06:03:53', '2020-02-03 13:03:53'),
('cc8f26ee2b6378832583ec5df48c918f61b7d82725f26c2a6178d9355c5c8758b9978059618aa58d', 2, 1, 'MyApp', '[]', 0, '2019-02-08 23:28:07', '2019-02-08 23:28:07', '2020-02-09 06:28:07'),
('d085af0206bad1699cbf6d24859b84b128b0610e724b2b5843778b581667bedcdfa7f27f8a388aaf', 1, 1, 'MyApp', '[]', 0, '2019-02-21 21:42:30', '2019-02-21 21:42:30', '2020-02-22 04:42:30'),
('d182143261830bfb83cec8c42f602c7fa7d5975abd00cad5d1078656e40ab7c3dc829dabf561292c', 2, 1, 'MyApp', '[]', 0, '2019-01-24 18:33:31', '2019-01-24 18:33:31', '2020-01-25 01:33:31'),
('dce018366e871a7e6352ef4f101eceacc6b905f5dfb1a0b09f19057d55b5d57e0e9011cedccfa9c2', 3, 1, 'MyApp', '[]', 0, '2019-02-10 23:33:56', '2019-02-10 23:33:56', '2020-02-11 06:33:56'),
('de66eb1c900aa24f58b678f18634804963134e114e8bc7a4eef206c01e43fd7a14083667eaff4459', 2, 1, 'MyApp', '[]', 0, '2019-02-11 02:37:05', '2019-02-11 02:37:05', '2020-02-11 09:37:05'),
('e0eda42ce16b5ffaf0bbb928ed09d37a212393a39c703d22142a24f49450382b24a85a0cd3163f88', 1, 1, 'MyApp', '[]', 0, '2019-02-03 15:24:04', '2019-02-03 15:24:04', '2020-02-03 22:24:04'),
('e682b316f02be083a3c9d5df77d07f2ad99123dae53a3ef78c9751894f2ae245cac044c6a06099e9', 1, 1, 'MyApp', '[]', 0, '2019-02-03 07:42:27', '2019-02-03 07:42:27', '2020-02-03 14:42:27'),
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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `farm_id` int(11) NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `farm_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 2, 'ini tes tes tes', '2019-02-11 02:38:10', '2019-02-11 02:38:10'),
(2, 2, 'report 2', '2019-02-11 02:38:23', '2019-02-11 02:38:23'),
(3, 2, 'report 3', '2019-02-11 02:38:29', '2019-02-11 02:38:29'),
(4, 3, 'report farm 2', '2019-02-11 02:38:39', '2019-02-11 02:38:39'),
(5, 3, 'report farm 2..', '2019-02-11 02:38:46', '2019-02-11 02:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `farm_id` int(11) NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `farm_id`, `task`, `status`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 1, 'Pengarirannn', 0, 'contoh pengaairan kopi', 'images/1549867811.jpg', '2019-02-10 23:50:11', '2019-02-10 23:50:11'),
(5, 2, 'pengairan', 0, 'contoh pengairan', 'images/1549868106.jpg', '2019-02-10 23:55:06', '2019-02-10 23:55:06');

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
(1, 'James', 'pemiliklahan@gmail.com', 1, '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-24 18:10:37', '2019-02-21 21:42:31', '', '', '', ''),
(2, 'Budi', 'farmmanager@gmail.com', 2, '$2y$10$4gZu2zN/0baEdB3cc1DNF.OGbDvoEC1RSA1g4xf.qV8QP4FQHGXiS', NULL, '2019-01-24 18:33:31', '2019-02-21 21:23:18', '', '', '', ''),
(3, 'Lara Croft', 'ahlipraktisi@gmail.com', 3, '$2y$10$LD4Kt48NdGkRDSsx5ZAGuunhKASWqlOpWIvG9JEV7hmro7dtIxge.', NULL, '2019-01-27 00:22:10', '2019-02-22 23:49:14', 'string', '0124612464', 'balebak', ''),
(4, 'mahatir', 'ahlipraktisi2@gmail.com', 3, '$2y$10$BrZ5ega/lIfyT1r.W/oQRuXsv230vw5E8xCEcb3i9ILITr9DfrVWq', NULL, '2019-02-07 04:45:03', '2019-02-15 02:53:43', '', '', '', ''),
(8, 'Slamet Pangarep', 'ahlikopi@gmail.com', 3, '$2y$10$EcCD0GCwTDRdvZEUEblUZ.7hgIqWxPM0aIc/qszWnGixnjkkrg3si', NULL, '2019-02-22 16:27:11', '2019-02-22 16:27:11', NULL, NULL, NULL, NULL),
(9, 'Hayami Saori', 'ahlijagung@gmail.com', 3, '$2y$10$iP56qcWO.DoXkI9yeVGIh.u6RiCZhVWiZfNRrSnq0MwtWQeIeCpza', NULL, '2019-02-22 16:35:57', '2019-02-22 16:35:57', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
