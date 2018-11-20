-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 09:29 AM
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
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_team` int(10) UNSIGNED NOT NULL,
  `b_team` int(10) UNSIGNED NOT NULL,
  `a_score` int(10) UNSIGNED DEFAULT NULL,
  `b_score` int(10) UNSIGNED DEFAULT NULL,
  `match_order` int(10) UNSIGNED NOT NULL,
  `fixture_status_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixture_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `tournament_id`, `subcategory_id`, `group`, `a_team`, `b_team`, `a_score`, `b_score`, `match_order`, `fixture_status_id`, `fixture_type_id`, `created_at`, `updated_at`) VALUES
(13, 22, 'MO', 'A', 35, 30, 2, 0, 1, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(14, 22, 'MO', 'A', 35, 29, 1, 1, 2, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(15, 22, 'MO', 'A', 35, 34, 3, 2, 3, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(16, 22, 'MO', 'A', 30, 29, 0, 6, 4, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(17, 22, 'MO', 'A', 30, 34, 3, 3, 5, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(18, 22, 'MO', 'A', 29, 34, 4, 2, 6, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(19, 22, 'MO', 'B', 33, 28, 2, 2, 1, 'S', 'G', '2018-11-19 22:28:46', '2018-11-19 22:28:46'),
(20, 22, 'MO', 'B', 33, 32, 1, 0, 2, 'S', 'G', '2018-11-19 22:28:47', '2018-11-19 22:28:47'),
(21, 22, 'MO', 'B', 33, 31, 1, 1, 3, 'S', 'G', '2018-11-19 22:28:47', '2018-11-19 22:28:47'),
(22, 22, 'MO', 'B', 28, 32, 6, 2, 4, 'S', 'G', '2018-11-19 22:28:47', '2018-11-19 22:28:47'),
(23, 22, 'MO', 'B', 28, 31, 0, 3, 5, 'S', 'G', '2018-11-19 22:28:47', '2018-11-19 22:28:47'),
(24, 22, 'MO', 'B', 32, 31, 1, 2, 6, 'S', 'G', '2018-11-19 22:28:47', '2018-11-19 22:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `fixture_statuses`
--

CREATE TABLE `fixture_statuses` (
  `id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixture_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixture_statuses`
--

INSERT INTO `fixture_statuses` (`id`, `fixture_status`, `created_at`, `updated_at`) VALUES
('C', 'completed', NULL, NULL),
('S', 'scheduled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fixture_types`
--

CREATE TABLE `fixture_types` (
  `id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixture_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixture_types`
--

INSERT INTO `fixture_types` (`id`, `fixture_type`, `created_at`, `updated_at`) VALUES
('F', 'finals', NULL, NULL),
('G', 'group-stage', NULL, NULL),
('S', 'semi-finals', NULL, NULL);

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
(41, '2018_11_10_103005_add_location_to_tournaments_table', 2),
(42, '2018_11_10_125435_add_user_id_column_to_tournaments', 2),
(43, '2018_11_13_065757_create_participants_tournaments_table', 3),
(46, '2018_11_13_152732_drop_tournament_subcategory_column_from_teams', 4),
(47, '2018_11_13_152814_add_tour_id_and_subcat_id_on_teams', 4),
(48, '2018_11_19_121238_add_team_registration_status_table', 5),
(49, '2018_11_19_121315_add_team_registration_status_column', 5),
(50, '2018_11_19_123543_add_tournament_id_column_to_players_table', 6),
(51, '2018_11_19_153301_add_division_group_column_on_teams_table', 7),
(53, '2018_11_19_194725_create_fixture_types_table', 8),
(54, '2018_11_19_194726_create_fixture_statuses', 8),
(57, '2018_11_19_194730_create_fixtures_table', 9),
(58, '2018_11_20_061417_add_group_column_to_teams_table', 10);

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
(11, 22, 2, '2018-11-19 22:21:59', '2018-11-19 22:21:59');

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
  `tournament_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `tournament_id`, `name`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(156, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(157, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(158, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(159, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(160, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(161, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(162, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(163, 28, 22, 'Sample name', '1990-12-12', '2018-11-19 22:21:59', '2018-11-19 22:21:59'),
(164, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(165, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(166, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(167, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(168, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(169, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(170, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(171, 29, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:08', '2018-11-19 22:22:08'),
(172, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(173, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(174, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(175, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(176, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(177, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(178, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(179, 30, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:18', '2018-11-19 22:22:18'),
(180, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(181, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(182, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(183, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(184, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(185, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(186, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(187, 31, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:26', '2018-11-19 22:22:26'),
(188, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(189, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(190, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(191, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(192, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(193, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(194, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(195, 32, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:35', '2018-11-19 22:22:35'),
(196, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(197, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(198, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(199, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(200, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(201, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(202, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(203, 33, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:43', '2018-11-19 22:22:43'),
(204, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(205, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(206, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(207, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(208, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(209, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(210, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(211, 34, 22, 'Sample name', '1990-12-12', '2018-11-19 22:22:52', '2018-11-19 22:22:52'),
(212, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(213, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(214, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(215, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(216, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(217, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(218, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01'),
(219, 35, 22, 'Sample name', '1990-12-12', '2018-11-19 22:23:01', '2018-11-19 22:23:01');

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
  `group` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_registration_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `tournament_id`, `subcategory_id`, `group`, `team_name`, `coach_name`, `mobile_number`, `created_at`, `updated_at`, `team_registration_status`, `subcategory_group`) VALUES
(28, 2, 22, 'MO', 'B', 'team1', '1111', '0917-123-4567', '2018-11-19 22:21:59', '2018-11-19 22:28:46', 'A', NULL),
(29, 2, 22, 'MO', 'A', 'team2', '2222', '0917-123-4567', '2018-11-19 22:22:08', '2018-11-19 22:28:46', 'A', NULL),
(30, 2, 22, 'MO', 'A', 'team3', '3333', '0917-123-4567', '2018-11-19 22:22:18', '2018-11-19 22:28:46', 'A', NULL),
(31, 2, 22, 'MO', 'B', 'team4', '4444', '0917-123-4567', '2018-11-19 22:22:26', '2018-11-19 22:28:46', 'A', NULL),
(32, 2, 22, 'MO', 'B', 'team5', '5555', '0917-123-4567', '2018-11-19 22:22:35', '2018-11-19 22:28:46', 'A', NULL),
(33, 2, 22, 'MO', 'B', 'team6', '6666', '0917-123-4567', '2018-11-19 22:22:43', '2018-11-19 22:28:46', 'A', NULL),
(34, 2, 22, 'MO', 'A', 'team7', '7777', '0917-123-4567', '2018-11-19 22:22:52', '2018-11-19 22:28:46', 'A', NULL),
(35, 2, 22, 'MO', 'A', 'team8', '8888', '0917-123-4567', '2018-11-19 22:23:01', '2018-11-19 22:28:46', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_registration_statuses`
--

CREATE TABLE `team_registration_statuses` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_registration_statuses`
--

INSERT INTO `team_registration_statuses` (`id`, `status`) VALUES
('A', 'Accepted'),
('P', 'Pending'),
('R', 'Rejected');

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
(22, 'newTournamentSample', 'philippines', 1, '2018-11-22', '2018-11-22', 2, '2018-11-19 22:21:31', '2018-11-19 22:28:47');

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
(30, 16, 'U18', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(31, 16, 'MO', '2018-11-10 05:02:49', '2018-11-10 05:02:49'),
(32, 17, 'U14', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(33, 17, 'U15', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(34, 17, 'U16', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(35, 17, 'U18', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(36, 17, 'MO', '2018-11-11 20:50:27', '2018-11-11 20:50:27'),
(47, 22, 'MO', '2018-11-19 22:21:31', '2018-11-19 22:21:31');

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
(1, 'Jason Dela Torre', 'xs', 'a@a.com', NULL, '$2y$10$WMdKHa7nIQz4eqZs9XPiDOWYjNBcKtQJB51L10szFbf9nLcZRfvWW', 1, 'gJSfPQH4XxWtpF2GhExwtoT2OuK7AhVLvfFcgpwTfFiWUdXpzPqI8ogORjA8', '2018-11-09 19:30:13', '2018-11-09 19:30:13'),
(2, 'sdkpf', 'lol', 'b@b.com', NULL, '$2y$10$PcKstzJVcAC.lYjyQCBHMeEAndyRbEZUPOlfvNcERau0Y3YVtwAmq', 2, 'CTnbjpzogF2MxUkRqvZzW5FwY8xMjJbiyP11XXPOWFaQ0Odlqb7UJo61dakA', '2018-11-09 19:47:34', '2018-11-09 19:47:34');

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
  ADD UNIQUE KEY `fixture_statuses_id_unique` (`id`);

--
-- Indexes for table `fixture_types`
--
ALTER TABLE `fixture_types`
  ADD UNIQUE KEY `fixture_types_id_unique` (`id`);

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
-- Indexes for table `team_registration_statuses`
--
ALTER TABLE `team_registration_statuses`
  ADD UNIQUE KEY `team_registration_statuses_id_unique` (`id`),
  ADD UNIQUE KEY `team_registration_statuses_status_unique` (`status`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `participants_tournaments`
--
ALTER TABLE `participants_tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tournament_statuses`
--
ALTER TABLE `tournament_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tournament_subcategories`
--
ALTER TABLE `tournament_subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
