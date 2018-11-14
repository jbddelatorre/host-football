-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 09:23 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `host-football`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_subcategory_id` int(10) UNSIGNED NOT NULL,
  `a_team` int(10) UNSIGNED NOT NULL,
  `b_team` int(10) UNSIGNED NOT NULL,
  `a_score` int(10) UNSIGNED NOT NULL,
  `b_score` int(10) UNSIGNED NOT NULL,
  `match_order` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `fixture_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixture_statuses`
--

CREATE TABLE `fixture_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `fixture_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixture_types`
--

CREATE TABLE `fixture_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `fixture_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2018_11_05_074511_create_user_type_table', 1),
(30, '2018_11_05_074546_create_teams_table', 1),
(31, '2018_11_05_074602_create_players_table', 1),
(32, '2018_11_05_074646_create_tournaments_table', 1),
(33, '2018_11_05_074723_create_tournament_statuses_table', 1),
(34, '2018_11_05_074831_create_subcategories_table', 1),
(35, '2018_11_05_074903_create_tournament_subcategories_table', 1),
(36, '2018_11_05_074927_create_fixtures_table', 1),
(37, '2018_11_05_074950_create_fixture_types_table', 1),
(38, '2018_11_05_075015_create_fixture_statuses', 1),
(41, '2018_11_10_103005_add_location_to_tournaments_table', 2),
(42, '2018_11_10_125435_add_user_id_column_to_tournaments', 2),
(43, '2018_11_13_065757_create_participants_tournaments_table', 3),
(46, '2018_11_13_152732_drop_tournament_subcategory_column_from_teams', 4),
(47, '2018_11_13_152814_add_tour_id_and_subcat_id_on_teams', 4);

-- --------------------------------------------------------

--
-- Table structure for table `participants_tournaments`
--

CREATE TABLE `participants_tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants_tournaments`
--

INSERT INTO `participants_tournaments` (`id`, `tournament_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 15, 2, '2018-11-13 21:22:44', '2018-11-13 21:22:44');

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
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(17, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(18, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(19, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(20, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(21, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(22, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(23, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(24, 15, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(25, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(26, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(27, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(28, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(29, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(30, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(31, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(32, 16, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(33, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(34, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(35, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(36, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(37, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(38, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(39, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25'),
(40, 17, 'Jason Dela Torre', '1990-12-12', '2018-11-13 21:23:25', '2018-11-13 21:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory`, `created_at`, `updated_at`) VALUES
('MO', 'Men\'s Open', NULL, NULL),
('U10', 'Under 10', NULL, NULL),
('U11', 'Under 11', NULL, NULL),
('U12', 'Under 12', NULL, NULL),
('U13', 'Under 13', NULL, NULL),
('U14', 'Under 14', NULL, NULL),
('U15', 'Under 15', NULL, NULL),
('U16', 'Under 16', NULL, NULL),
('U17', 'Under 17', NULL, NULL),
('U18', 'Under 18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `tournament_id`, `subcategory_id`, `team_name`, `coach_name`, `mobile_number`, `created_at`, `updated_at`) VALUES
(15, 2, 15, 'U16', 'sampleteam', 'Jason Dela Torre', '0917-123-4567', '2018-11-13 21:22:44', '2018-11-13 21:22:44'),
(16, 2, 15, 'MO', 'asasasa', 'Jason Dela Torre', '0917-123-4567', '2018-11-13 21:22:58', '2018-11-13 21:22:58'),
(17, 2, 15, 'U18', 'testteam', 'Jason Dela Torre', '0917-123-4567', '2018-11-13 21:23:25', '2018-11-13 21:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `location`, `user_id`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
(15, 'ore', 'philippines', 1, '2018-11-20', '2018-11-20', 1, '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(16, 'jason', 'loca1', 1, '2018-11-12', '2018-11-21', 2, '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(17, 'new tournament', 'tournament1', 1, '2018-11-16', '2018-11-16', 1, '2018-11-11 20:50:27', '2018-11-11 20:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_statuses`
--

CREATE TABLE `tournament_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_statuses`
--

INSERT INTO `tournament_statuses` (`id`, `status_type`, `created_at`, `updated_at`) VALUES
(1, 'Registered', NULL, NULL),
(2, 'Ongoing', NULL, NULL),
(3, 'Completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_subcategories`
--

CREATE TABLE `tournament_subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_subcategories`
--

INSERT INTO `tournament_subcategories` (`id`, `tournament_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'U16', '2018-11-10 03:42:32', '2018-11-10 03:42:32'),
(2, 3, 'U17', '2018-11-10 03:42:32', '2018-11-10 03:42:32'),
(3, 3, 'U18', '2018-11-10 03:42:32', '2018-11-10 03:42:32'),
(4, 3, 'MO', '2018-11-10 03:42:32', '2018-11-10 03:42:32'),
(5, 10, 'U16', '2018-11-10 03:48:04', '2018-11-10 03:48:04'),
(6, 10, 'U17', '2018-11-10 03:48:04', '2018-11-10 03:48:04'),
(7, 10, 'U18', '2018-11-10 03:48:04', '2018-11-10 03:48:04'),
(8, 10, 'MO', '2018-11-10 03:48:04', '2018-11-10 03:48:04'),
(9, 11, 'MO', '2018-11-10 03:49:00', '2018-11-10 03:49:00'),
(10, 29, 'MO', '2018-11-10 03:50:24', '2018-11-10 03:50:24'),
(11, 12, 'U10', '2018-11-10 03:51:16', '2018-11-10 03:51:16'),
(12, 12, 'U13', '2018-11-10 03:51:16', '2018-11-10 03:51:16'),
(13, 12, 'U15', '2018-11-10 03:51:16', '2018-11-10 03:51:16'),
(14, 12, 'U18', '2018-11-10 03:51:16', '2018-11-10 03:51:16'),
(15, 13, 'U10', '2018-11-10 03:52:04', '2018-11-10 03:52:04'),
(16, 13, 'U13', '2018-11-10 03:52:04', '2018-11-10 03:52:04'),
(17, 13, 'U15', '2018-11-10 03:52:04', '2018-11-10 03:52:04'),
(18, 13, 'U18', '2018-11-10 03:52:04', '2018-11-10 03:52:04'),
(19, 13, 'MO', '2018-11-10 03:52:04', '2018-11-10 03:52:04'),
(20, 14, 'U17', '2018-11-10 04:25:11', '2018-11-10 04:25:11'),
(21, 14, 'U18', '2018-11-10 04:25:11', '2018-11-10 04:25:11'),
(22, 14, 'MO', '2018-11-10 04:25:11', '2018-11-10 04:25:11'),
(23, 15, 'U15', '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(24, 15, 'U16', '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(25, 15, 'U17', '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(26, 15, 'U18', '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(27, 15, 'MO', '2018-11-10 04:59:09', '2018-11-10 04:59:09'),
(28, 16, 'U16', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(29, 16, 'U17', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(30, 16, 'U18', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(31, 16, 'MO', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(32, 17, 'U14', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(33, 17, 'U15', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(34, 17, 'U16', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(35, 17, 'U18', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(36, 17, 'MO', '2018-11-11 20:50:27', '2018-11-11 20:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `organization`, `email`, `email_verified_at`, `password`, `user_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jason Dela Torre', 'xs', 'a@a.com', NULL, '$2y$10$WMdKHa7nIQz4eqZs9XPiDOWYjNBcKtQJB51L10szFbf9nLcZRfvWW', 1, 'ygNAMAWr5srhOmeBtSz4YWR6OJR3xaCoTMC5b3VQy71wlQJFvG9jBnpiVGb2', '2018-11-09 19:30:13', '2018-11-09 19:30:13'),
(2, 'sdkpf', 'lol', 'b@b.com', NULL, '$2y$10$PcKstzJVcAC.lYjyQCBHMeEAndyRbEZUPOlfvNcERau0Y3YVtwAmq', 2, 'o8iYmv3oEh46S4DbghisQvhSqi7mnMhLw8OU7MyXIuQHl4DHDYBiE3jY9Xr4', '2018-11-09 19:47:34', '2018-11-09 19:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture_statuses`
--
ALTER TABLE `fixture_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture_types`
--
ALTER TABLE `fixture_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants_tournaments`
--
ALTER TABLE `participants_tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD UNIQUE KEY `subcategories_id_unique` (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_statuses`
--
ALTER TABLE `tournament_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_subcategories`
--
ALTER TABLE `tournament_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixture_statuses`
--
ALTER TABLE `fixture_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixture_types`
--
ALTER TABLE `fixture_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `participants_tournaments`
--
ALTER TABLE `participants_tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tournament_statuses`
--
ALTER TABLE `tournament_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tournament_subcategories`
--
ALTER TABLE `tournament_subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
