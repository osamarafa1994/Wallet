-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 06:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `username`, `password`, `personal_id`, `phone`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 'osama arafa', NULL, NULL, '012345678915', '01098549016', NULL, '2019-03-30 13:26:25', '2019-03-30 13:26:25'),
(2, 'Osama Maher Arafa', NULL, NULL, 'sadcsac', '0483691920', NULL, '2019-03-30 13:31:13', '2019-03-30 13:31:13'),
(3, 'Osama Maher Arafa', NULL, NULL, 'czCz', '0483691920', NULL, '2019-03-30 13:37:47', '2019-03-30 13:37:47'),
(4, 'osama', NULL, NULL, '12345689856', '01098549016', NULL, '2019-03-31 07:31:26', '2019-03-31 07:31:26'),
(5, 'osama', NULL, NULL, '12345689856', '01098549016', NULL, '2019-03-31 07:32:28', '2019-03-31 07:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `customer_processes`
--

CREATE TABLE `customer_processes` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `value` double(20,2) NOT NULL,
  `suspend` int(11) NOT NULL DEFAULT '0',
  `network_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `action_man_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_processes`
--

INSERT INTO `customer_processes` (`id`, `customer_id`, `value`, `suspend`, `network_type`, `to_phone`, `created_at`, `updated_at`, `action_man_id`) VALUES
(1, 4, 20.00, 1, 'we', '01098549016', '2019-03-27 22:00:00', '2019-04-01 06:40:40', 0),
(2, 4, 20.00, 2, 'we', '01098546512', '2019-04-01 08:45:16', '2019-04-01 08:47:44', 0),
(3, 1, 206.00, 2, 'vodafone', '0102356989', '2019-04-01 12:53:23', '2019-04-01 13:06:22', 0),
(4, 4, 30.50, 2, 'we', '01098546321', '2019-04-01 13:39:21', '2019-04-17 14:03:00', 1),
(5, 4, 30.50, 2, 'we', '01098546321', '2019-04-01 13:39:47', '2019-04-01 13:41:05', 0),
(6, 4, 235.00, 2, 'etisalat', '0109854623', '2019-04-01 13:42:22', '2019-04-01 13:43:54', 0),
(7, 4, 8000.00, 0, 'vodafone', '010955555656', '2019-04-17 14:10:43', '2019-04-17 14:10:43', NULL);

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
(3, '2019_03_30_132803_add_persoal_id_to_users', 2),
(4, '2019_03_27_091712_create_customers_table', 3),
(5, '2019_03_27_093537_create_wallets_table', 4),
(7, '2018_07_21_211326_create_roles_table', 5),
(8, '2019_03_31_103540_add_role_id_to_users', 5),
(9, '2019_03_31_152506_add_wallet_value_users', 6),
(11, '2019_03_27_094513_create_customer_processes_table', 7),
(12, '2019_04_03_101611_add_new_colums_to_users', 8);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `personal_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `wallet_value` int(11) NOT NULL DEFAULT '0',
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `personal_id`, `role_id`, `wallet_value`, `details`, `address`, `barcode`) VALUES
(1, 'osama', 'osamaarafa15@gmail.com', '01098549016', NULL, '$2y$10$q9snHIrwBS7hs6AJXfoFeuYi0YH5bYeBZRmIWWrId85mtusbn4vye', NULL, '2019-03-30 09:08:53', '2019-03-30 09:08:53', '', 1, 100000, NULL, NULL, NULL),
(4, 'مستخدم تجربي', 'test@gmail.com', '01098549017', NULL, '$2y$10$q9snHIrwBS7hs6AJXfoFeuYi0YH5bYeBZRmIWWrId85mtusbn4vye', NULL, '2019-03-30 09:08:53', '2019-04-17 14:10:43', '125445522266', 2, -7984, 'details', 'address', NULL),
(8, 'Osama Maher Arafa', 'osamrafa15@gmail.com', '456676786868', NULL, '$2y$10$n4YMcMISNrtlZYo.Vu3.f.R6c8bltez0WJHshLFLZD.gmYllfP0CO', NULL, '2019-04-13 13:29:44', '2019-04-13 13:29:44', '012355225855555', 2, 0, '574656', '1255', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `value` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `customer_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 4, 9659.50, '2019-03-13 22:00:00', '2019-04-13 10:02:59'),
(2, 1, 9734.00, '2019-03-13 22:00:00', '2019-03-12 22:00:00'),
(3, 8, 8000.00, '2019-04-13 13:29:44', '2019-04-13 13:29:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_processes`
--
ALTER TABLE `customer_processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_processes_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_processes`
--
ALTER TABLE `customer_processes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_processes`
--
ALTER TABLE `customer_processes`
  ADD CONSTRAINT `customer_processes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
