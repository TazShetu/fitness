-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 10:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2020_12_14_040144_create_sessions_table', 1),
(12, '2020_12_22_103807_laratrust_setup_tables', 1),
(13, '2020_12_28_150718_create_user_infos_table', 1),
(14, '2020_12_28_151530_create_user_create_histories_table', 1),
(15, '2021_01_05_093810_create_video_categories_table', 1),
(16, '2021_01_05_142927_create_video_sub_category_ones_table', 1),
(17, '2021_01_05_163634_create_video_sub_category_twos_table', 1),
(18, '2021_01_06_094856_create_videos_table', 1),
(19, '2021_01_07_095600_create_music_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double(8,2) NOT NULL,
  `music` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'OtPwZxgCKKr7PLtQ9fFMt9at4E3pE0R1b2siBreI', NULL, 'http://localhost', 1, 0, 0, '2021-01-10 05:59:56', '2021-01-10 05:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-10 05:59:56', '2021-01-10 05:59:56');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'permission', 'Permission', 'Permission menu that goes under ACL', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(2, 'role', 'Role', 'Role menu that goes under ACL', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(3, 'user', 'User', 'User menu that goes under ACL', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(4, 'video_category', 'Video Category', 'Category menu that goes under Videos', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(5, 'video_sub_category_one', 'Sub Category One', 'Sub Category One menu that goes under Videos', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(6, 'video_sub_category_two', 'Sub Category Two', 'Sub Category Two menu that goes under Videos', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(7, 'video', 'Video Upload and List', 'Upload and List menu that goes under Videos', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(8, 'music', 'Music', 'Music menu', '2021-01-10 05:59:51', '2021-01-10 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'name', 'display_name', 'description', '2021-01-10 05:59:50', '2021-01-10 05:59:50'),
(2, 'super_admin', 'Super Admin', 'Super Admin', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(3, 'admin', 'Admin', 'Admin', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(4, 's_dev', 'Senior Developer', 'Senior Developer', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(5, 'dev', 'Developer', 'Developer', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(6, 'j_dev', 'Junior Developer', 'Junior Developer', '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(7, 'i_dev', 'Intern Developer', 'Intern Developer', '2021-01-10 05:59:51', '2021-01-10 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(1, 5, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aDtH1jG6jJC9AKldXULV5iPFXYaWB0hfQBG58Kni', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGZZN2owR1lxOWZyaHNiSWNtMEFLWG16ZHV1WEVEMnZHRmd6WU9LQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1610360040),
('od0lWC6qJglAKYmBCBMOXhFwUZtRDDnC3zWUbnxU', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicGJzM1l1Y1YyZFdMTm1BbWJzekF5T0MxN1NkbTBvMGk1RjlJbnA0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vyc19zZXR1cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR4V2VEOWYwMmVUOG1reGRzdDZMaTRPZjJ4NGsxOUFiTVNzZWxKcU1pcEFUdEMuYmFGd1dGdSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkeFdlRDlmMDJlVDhta3hkc3Q2TGk0T2YyeDRrMTlBYk1Tc2VsSnFNaXBBVHRDLmJhRndXRnUiO30=', 1610347757);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_app` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_name`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_app`, `created_at`, `updated_at`) VALUES
(1, 'Dummy 1', 'd@g.com', NULL, NULL, '$2y$10$N7CjbgqnRgSk8ZFeEikW1OmdB98iSss1MjStgFSbcWYaGFSvFcYsC', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-10 05:59:50', '2021-01-10 05:59:50'),
(2, 'Super Admin', 'sa@g.com', NULL, NULL, '$2y$10$LlGJK0398toTHraJ4ErxVuISzIYP/KsrkUaerfG7/7JHovbQbGygO', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-10 05:59:50', '2021-01-10 05:59:50'),
(3, 'Admin', 'a@g.com', NULL, NULL, '$2y$10$xWeD9f02eT8mkxdst6Li4Of2x4k19AbMSselJqMipATtC.baFwWFu', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-10 05:59:50', '2021-01-10 05:59:50'),
(4, 'General User App', NULL, 'general_user', NULL, '$2y$10$yiL/05Fx7UDnR28W.xVGjuZgCLDXMBOiP9lBATuRh7XUR1/Gv.qSi', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-10 05:59:50', '2021-01-10 05:59:50'),
(5, 'test', 'test@g.com', NULL, NULL, '$2y$10$ZuzeY4HU3L7lm4XUe1xvkuiINLGd3CKadS9WIWE8RIsNo0aO09esy', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-11 06:19:12', '2021-01-11 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_create_histories`
--

CREATE TABLE `user_create_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `last_modified_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_create_histories`
--

INSERT INTO `user_create_histories` (`id`, `user_id`, `created_by_user_id`, `last_modified_by_user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 3, '2021-01-11 06:19:12', '2021-01-11 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `date_of_birth`, `mobile_1`, `mobile_2`, `job_title`, `job_description`, `address`, `education`, `employment`, `skills`, `cv`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-11 06:19:12', '2021-01-11 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_one_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_two_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double(8,2) NOT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calorie` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Get Fit', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(2, 'Get Strong', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(3, 'Loose Weight', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `video_sub_category_ones`
--

CREATE TABLE `video_sub_category_ones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_sub_category_ones`
--

INSERT INTO `video_sub_category_ones` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beginner', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(2, 1, 'Intermediate', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(3, 1, 'Advance', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(4, 2, 'Beginner', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(5, 2, 'Intermediate', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(6, 2, 'Advance', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(7, 3, 'Beginner', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(8, 3, 'Intermediate', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(9, 3, 'Advance', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `video_sub_category_twos`
--

CREATE TABLE `video_sub_category_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_one_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_sub_category_twos`
--

INSERT INTO `video_sub_category_twos` (`id`, `category_id`, `sub_category_one_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(2, 1, 1, 'Shape It', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(3, 1, 1, 'Body Shape', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(4, 1, 1, 'On all fours-Core exercise', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(5, 1, 1, 'Upper Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(6, 1, 1, 'Pilates', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(7, 1, 2, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(8, 1, 2, 'Cardio and Abs', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(9, 1, 2, 'TABATA', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(10, 1, 2, 'Power Boost', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(11, 1, 2, 'Sore Core', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(12, 1, 2, 'Twister', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(13, 1, 2, 'Power Cardio', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(14, 1, 3, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(15, 1, 3, 'Athletic', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(16, 1, 3, 'Insane Abs', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(17, 1, 3, 'High and Higher', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(18, 1, 3, 'Strength', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(19, 1, 3, 'Cardio', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(20, 2, 4, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(21, 2, 4, 'Apple Butt', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(22, 2, 4, 'Shape It', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(23, 2, 4, 'PT’s Choice', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(24, 2, 4, 'Back', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(25, 2, 4, 'Inner Thighs', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(26, 2, 5, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(27, 2, 5, 'Booty Bootcamp', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(28, 2, 5, 'Butt Lift', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(29, 2, 5, 'Tabata Core', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(30, 2, 5, 'Down To Earth', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(31, 2, 5, 'Hamstrings', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(32, 2, 5, 'Sore Core', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(33, 2, 6, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(34, 2, 6, 'Muscle Definer', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(35, 2, 6, 'Beach Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(36, 2, 6, 'Abs of Steel', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(37, 2, 6, 'Triceps', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(38, 2, 6, 'Flamingo', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(39, 3, 7, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(40, 3, 7, 'Calorie Burn', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(41, 3, 7, 'Belly Burn', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(42, 3, 7, 'Bikini Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(43, 3, 7, 'Body Shape', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(44, 3, 7, 'Light', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(45, 3, 8, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(46, 3, 8, 'Apple Butt', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(47, 3, 8, 'Cardio All The Day', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(48, 3, 8, 'Butt Lift', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(49, 3, 8, 'Shape It', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(50, 3, 8, 'Body Shape', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(51, 3, 8, 'Cardio', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(52, 3, 8, 'Back and Front', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(53, 3, 9, 'Full Body', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(54, 3, 9, 'Belly Burn', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(55, 3, 9, 'From-tastic', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(56, 3, 9, 'Athletic', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51'),
(57, 3, 9, 'No Limits', NULL, '2021-01-10 05:59:51', '2021-01-10 05:59:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `music_music_unique` (`music`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_create_histories`
--
ALTER TABLE `user_create_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_create_histories_user_id_unique` (`user_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_user_id_index` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_video_unique` (`video`),
  ADD KEY `videos_category_id_index` (`category_id`),
  ADD KEY `videos_sub_category_one_id_index` (`sub_category_one_id`),
  ADD KEY `videos_sub_category_two_id_index` (`sub_category_two_id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_categories_name_unique` (`name`);

--
-- Indexes for table `video_sub_category_ones`
--
ALTER TABLE `video_sub_category_ones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_sub_category_ones_category_id_index` (`category_id`);

--
-- Indexes for table `video_sub_category_twos`
--
ALTER TABLE `video_sub_category_twos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_sub_category_twos_category_id_index` (`category_id`),
  ADD KEY `video_sub_category_twos_sub_category_one_id_index` (`sub_category_one_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_create_histories`
--
ALTER TABLE `user_create_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_sub_category_ones`
--
ALTER TABLE `video_sub_category_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video_sub_category_twos`
--
ALTER TABLE `video_sub_category_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `video_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_sub_category_one_id_foreign` FOREIGN KEY (`sub_category_one_id`) REFERENCES `video_sub_category_ones` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_sub_category_two_id_foreign` FOREIGN KEY (`sub_category_two_id`) REFERENCES `video_sub_category_twos` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `video_sub_category_ones`
--
ALTER TABLE `video_sub_category_ones`
  ADD CONSTRAINT `video_sub_category_ones_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `video_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `video_sub_category_twos`
--
ALTER TABLE `video_sub_category_twos`
  ADD CONSTRAINT `video_sub_category_twos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `video_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `video_sub_category_twos_sub_category_one_id_foreign` FOREIGN KEY (`sub_category_one_id`) REFERENCES `video_sub_category_ones` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
