-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`, `photo`, `created_at`, `updated_at`, `remember_token`) VALUES
(6, 'Eslam Ahmed Elbanna', '$2y$10$NA3GuIZRz7nf4wG/pWQxCewo/mm29PXmduvxHGP06S6yZHyslyb.u', 'es2@gmail.com', 'adc.jpg', '2021-07-18 11:37:14', '2021-07-18 11:37:14', NULL),
(7, 'test', '$2y$10$61X74fa2.7/02of8RWDEOOrIIGBejPx5sNCLfvtR4qMPxg5JciZY6', 'test@gmail.com', NULL, '2021-07-18 12:57:27', '2021-07-18 12:57:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `locale` varchar(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `direction` enum('rtl','ltr') NOT NULL DEFAULT 'rtl',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `active`, `locale`, `name`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'ar', 1, 'اختبار', 'العربية', 'rtl', '2021-07-15 16:47:59', '2021-07-19 21:21:03'),
(2, 'en', 1, 'engg', 'english', 'ltr', '2021-07-26 16:48:51', '2021-07-19 21:21:20'),
(4, 'fr', 0, 'empty', 'الفرنسية1', 'ltr', '2021-07-18 18:04:16', '2021-07-19 11:12:40'),
(5, 'pr', 0, 'hh', 'بورتغال', 'rtl', '2021-07-18 20:41:26', '2021-07-23 14:50:55'),
(15, '2ww', 0, '2ww', '2ww', 'rtl', '2021-07-19 21:09:23', '2021-07-24 14:27:39'),
(16, 'te', 0, 'tr', 'test', 'rtl', '2021-07-20 21:11:36', '2021-07-20 21:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `name`, `email`, `phone`) VALUES
(1, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(2, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(3, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(4, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(5, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(6, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(7, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(8, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(9, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(10, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(11, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(12, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(13, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(14, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(15, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(16, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(17, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(18, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(19, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(20, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(21, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(22, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(23, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(24, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(25, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(26, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(27, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(28, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(29, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(30, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(31, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789'),
(32, 'eslam ahmed elbanna', '567c7b1110-ab74a8@inbox.mailtrap.io', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(11) NOT NULL,
  `translation_lang` varchar(10) NOT NULL,
  `translation_of` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `translation_lang`, `translation_of`, `name`, `slug`, `photo`, `active`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'a', 'a', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-30 10:58:59'),
(2, 'ar', 1, 'a', 'a', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-30 10:47:59'),
(3, 'pr', 1, 'aaa', 'aaa', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-30 10:47:59'),
(4, 'en', 4, 'bol', 'bol', 'images/mainCategories/fhq8Jb5Utrkymtjvrz2LLJFNPqswWKSnqbxqDALA.jpg', 1, NULL, '2021-07-30 10:59:45'),
(5, 'ar', 4, 'b', 'b', 'images/mainCategories/fhq8Jb5Utrkymtjvrz2LLJFNPqswWKSnqbxqDALA.jpg', 1, NULL, '2021-07-28 20:04:42'),
(6, 'pr', 4, 'bbb', 'bbb', 'images/mainCategories/fhq8Jb5Utrkymtjvrz2LLJFNPqswWKSnqbxqDALA.jpg', 1, NULL, '2021-07-28 20:04:42'),
(7, 'en', 7, 'c', 'c', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-28 20:43:49'),
(8, 'ar', 7, 'س', 'س', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-28 20:43:49'),
(9, 'pr', 7, 'ccc', 'ccc', 'images/mainCategories/bxAE3NHBL3XZX8MPMULqZMaR7FQrgHlmgXOdczg8.jpg', 1, NULL, '2021-07-28 20:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_25_214158_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Eslam Ahmed Ahmed Esmail', 'es@gmail.com', NULL, '$2y$10$2giieDsBnVZjCnbVXoR74.rLKybkoX8pbfM.tjCHMTHmx.hALnYCC', 'JV6xbN5SFMbQOpZePh7cx8ioEbtyXMjb6ouyKoccYtx5sFApMQivkO6yUhhR', '2021-07-17 20:47:16', '2021-07-17 20:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `logo` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `address` text DEFAULT NULL,
  `catigory_id` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `logo`, `email`, `password`, `address`, `catigory_id`, `active`, `created_at`, `updated_at`, `lng`, `lat`) VALUES
(13, 'Eslam Ahmed Ahmed Esmail', '0123456789', NULL, 'es@gmail.com', '', NULL, 4, 1, NULL, '2021-07-30 10:59:45', 0, 0),
(14, 'Eslam Ahmed Ahmed Esmail', '35153153', NULL, 'solombanna2000@gmail.com', '', NULL, 1, 1, NULL, '2021-07-30 11:07:36', 0, 0),
(18, 'حححح', '0147', 'images/vendors/Crme8Hs9VMosMjAGZGOSuhThQu5YvGFwjADsdGJL.jpg', 'es2@gmail.com', '$2y$10$tg299Rh/4WC7yXwafErxSecrcEIgHf2XBmVW5V81hNKo5/HedXWIa', NULL, 7, 0, NULL, '2021-07-26 20:54:31', 0, 0),
(25, 'Eslam Ahmed Ahmed Esmail', '012222554487', 'images/vendors/7XQoZVODd1iIzALXo96JtiJiHcp1cD62UIqIhIIP.png', 'ert@gmail.com', '$2y$10$Z5sK8.4PgQob9MkQmZB/Wengq/tJZ9dn8UJF.jw68bMRhYoNPAZm2', 'tanta-africa-egypt', 1, 1, NULL, '2021-07-30 10:58:59', 0, 0),
(27, 'lbk,jb,kk', '55555555', 'images/vendors/Z6lFBYzEaOetR4z47oMIyUN72bKk01HKV3J4Spwz.jpg', 'es255@gmail.com', '$2y$10$SU0TK2EjEHRndFv0n3pQgu8w4Cucz6SXR/qjKwcrw2uzg8RrF4uBu', 'Tanta,Gharbia,Egypt,EG,Africa', 1, 1, NULL, NULL, 0, 0),
(28, 'kkkk', '12365', 'images/vendors/zhijso3nm8Qg8wGjjGuNgPY7uasvDcsD8uoyJeFY.jpg', 'eggfvsds2@gmail.com', '$2y$10$KK.nn2H4UJJ/q6Nq8qe0G.QGKGC/tr8Q8XHwwt/t6upI/2FCszxzy', 'Tanta,Gharbia,Egypt,EG,Africa', 1, 1, NULL, NULL, 0, 0),
(29, 'jjj', '01002', 'images/vendors/ncKxZUHflzrVf6fYiOFM2SnZJTlE3vxqi1EZdsUG.jpg', 'esjyj2@gmail.com', '$2y$10$1JsdxV7hgh66JjO0M.p88OYSjb2ck7ZRTLipYHxH6vm/hA4ciBd1q', 'Tanta,Gharbia,Egypt,EG,Africa', 1, 1, NULL, NULL, 31.025776699999998, 30.7817074);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
