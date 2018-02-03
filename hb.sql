-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hb.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall_room` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_guests` int(11) NOT NULL,
  `chief_guest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_guest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chair_of_the_event` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookings_reg_no_unique` (`reg_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.bookings: ~1 rows (approximately)
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` (`id`, `reg_no`, `reason`, `hall_room`, `description`, `event_time`, `no_of_guests`, `chief_guest`, `main_guest`, `chair_of_the_event`, `applicant_name`, `nid_no`, `id_type`, `email_address`, `mobile_no`, `address`, `status`, `created_at`, `updated_at`) VALUES
	(1, '1517137829', 'movie', 'sufia-kamal', 'Demo', 'full-day', 500, 'Demo1', 'Demo2', 'Demo3', 'Neher', '12345612365456321', 'nid', 'neher@gmial.com', '01784191196', 'Demo', 2, '2018-01-28 17:10:29', '2018-01-28 17:20:03');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;

-- Dumping structure for table hb.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.messages: ~1 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `name`, `mobile`, `email`, `subject`, `message`, `read`, `created_at`, `updated_at`) VALUES
	(1, 'Neher', '01784191196', 'neher@gmail.com', 'test', 'Demo', 1, '2018-01-28 17:21:23', '2018-01-28 17:22:09');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table hb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_07_10_003428_create_messages_table', 1),
	(4, '2017_07_13_004801_create_sessions_table', 1),
	(5, '2017_07_14_232626_create_notifications_table', 1),
	(6, '2017_07_15_124730_create_room_galleries_table', 1),
	(7, '2017_07_15_150151_create_bookings_table', 1),
	(8, '2017_07_15_234731_create_schedules_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table hb.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.notifications: ~2 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('7b238856-bd49-4b09-ab6b-87d5a3f73863', 'App\\Notifications\\BookingStatusChanged', 1, 'App\\Booking', '{"message":" \\u09b0\\u09c7\\u099c\\u09bf\\u09b8\\u09cd\\u099f\\u09cd\\u09b0\\u09c7\\u09b6\\u09a8 \\u09a8\\u0982 \\u098f\\u09b0 \\u09ac\\u09c1\\u0995\\u09bf\\u0982 \\u09b8\\u09cd\\u099f\\u09cd\\u09af\\u09be\\u099f\\u09be\\u09b8 \\u09aa\\u09cd\\u09b0\\u0995\\u09cd\\u09b0\\u09bf\\u09df\\u09be\\u09a7\\u09c0\\u09a8 \\u0995\\u09b0\\u09be \\u09b9\\u09df\\u09c7\\u099b\\u09c7 | \\u09aa\\u09cd\\u09b0\\u0995\\u09cd\\u09b0\\u09bf\\u09df\\u09be\\u09a7\\u09c0\\u09a8 \\u0995\\u09b0\\u09c7\\u099b\\u09c7\\u09a8 Miss Melyna Gutmann","reg_no":"1517137829"}', NULL, '2018-01-28 17:20:03', '2018-01-28 17:20:03'),
	('f0b788b1-becc-4567-a1d3-1b6ab905fc75', 'App\\Notifications\\BookingStatusChanged', 1, 'App\\Booking', '{"message":"\\u09b0\\u09c7\\u099c\\u09bf\\u09b8\\u09cd\\u099f\\u09cd\\u09b0\\u09c7\\u09b6\\u09a8 \\u09a8\\u0982 \\u09a8\\u09a4\\u09c1\\u09a8 \\u09ac\\u09c1\\u0995\\u09bf\\u0982\\u09df\\u09c7\\u09b0 \\u099c\\u09a8\\u09cd\\u09af \\u0986\\u09ac\\u09c7\\u09a6\\u09a8 \\u0995\\u09b0\\u09be \\u09b9\\u09df\\u09c7\\u099b\\u09c7 |","reg_no":1517137829}', NULL, '2018-01-28 17:10:30', '2018-01-28 17:10:30');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table hb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table hb.room_galleries
CREATE TABLE IF NOT EXISTS `room_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.room_galleries: ~0 rows (approximately)
/*!40000 ALTER TABLE `room_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_galleries` ENABLE KEYS */;

-- Dumping structure for table hb.schedules
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.schedules: ~2 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` (`id`, `booking_id`, `booking_date`, `created_at`, `updated_at`) VALUES
	(1, 1, '2018-01-29 00:00:00', '2018-01-28 17:10:29', '2018-01-28 17:10:29'),
	(2, 1, '2018-02-01 00:00:00', '2018-01-28 17:10:29', '2018-01-28 17:10:29');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping structure for table hb.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.sessions: ~1 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('aMAogGvGJPQuCjLsgWP3qjrPissgRyiyQq5koBEY', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'YTo0OntzOjY6ImxvY2FsZSI7czoyOiJiZCI7czo2OiJfdG9rZW4iO3M6NDA6InFTMGZpc0dIMmx5YlFTTlpPYk1laW5CNWxNelFMQ3ZMdzVYT1ZyS3MiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vbG9jYWxob3N0L2hhbGxib29raW5nL3B1YmxpYy9ib29raW5nLXJvb21zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1517138552);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table hb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hb.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Miss Melyna Gutmann', 'admin', '$2y$10$i0gXPO6thagqmaWSp5iQyef9qlqjPTxARhX6i3B8aHURhQosYiqXC', 'admin', 1, '5SB79ihTJbHzmYPB19iaoa9zatczkI9uLD6ARIyvzMARSRceGH5jnMzrYR8t', '2018-01-28 17:17:08', '2018-01-28 17:17:08'),
	(2, 'Prof. Ida Satterfield', 'super.admin', '$2y$10$rWX191HBzHHySzftcLNQA.g2eQI01yK9umvUKnJ/VLnhvkLXdtWte', 'superadmin', 1, '704duPv5Lc', '2018-01-28 17:17:08', '2018-01-28 17:17:08'),
	(3, 'Conner Labadie', 'walsh.marlene', '$2y$10$crQ7LdB21r.mIwUwdq/Y1uT5LFBIF2PhsHK9FLRhnEg6H..Z65cUK', 'admin', 1, 'UlhBEz3Vd3', '2018-01-28 17:17:08', '2018-01-28 17:17:08'),
	(4, 'Dr. Lexi Kling PhD', 'monroe.schinner', '$2y$10$ot9f7Qb1g7OiuKmOoXRli.HrD8D44orw4PyJ1F0KENXJhwAnB3Kau', 'admin', 1, 'cV5JIsGYvA', '2018-01-28 17:17:08', '2018-01-28 17:17:08'),
	(5, 'Weldon Gulgowski', 'erling94', '$2y$10$4JRGX4oZPtLUduah1HuQa.Gosnfq6dk7fY.L.uUGVmtFC7vO/w4C2', 'admin', 1, 'y6zyhjxCHs', '2018-01-28 17:17:08', '2018-01-28 17:17:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
