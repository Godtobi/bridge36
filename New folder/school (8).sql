-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 02:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facilitator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `image`, `duration`, `price`, `description`, `tutor_id`, `country`, `facilitator`, `active`, `created_at`, `updated_at`, `start`, `end`, `user_id`) VALUES
(8, 'tobi', 'online', '/uploads/tobi_1580220685.jpg', 90, 9000.00, 'info', NULL, 'canada', NULL, 1, '2020-01-28 22:11:25', '2020-01-28 22:11:25', NULL, NULL, NULL),
(9, 'tobi', 'online', '/uploads/tobi_1585801549.png', 4, 4444.00, 'dddddddddddddddddddddddddddd', NULL, 'canada', NULL, 1, '2020-04-02 02:25:49', '2020-04-02 02:25:49', NULL, NULL, NULL),
(10, 'Flow CChart', 'online', '/uploads/flow-cchart_1585804781.png', 3, 3333.00, 'fff', NULL, 'canada', NULL, 1, '2020-04-02 03:19:41', '2020-04-02 03:19:41', NULL, NULL, NULL),
(11, 'Introduction Learnin', 'online', '/uploads/introduction-learnin_1585807615.png', 4, 2.00, 'the descripryion is a lot in common', NULL, 'canada', NULL, 1, '2020-04-02 04:06:55', '2020-04-02 04:06:55', NULL, NULL, NULL),
(12, 'Description', 'online', '/uploads/description_1585808840.png', 8, 8.00, 'ddddddddddd', NULL, 'canada', NULL, 1, '2020-04-02 04:27:20', '2020-04-02 04:27:20', NULL, NULL, NULL),
(13, 'tobi', 'online', '/uploads/tobi_1585809053.png', 9, 4.00, 'kjk', NULL, 'canada', NULL, 1, '2020-04-02 04:30:53', '2020-04-02 04:30:53', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `question`, `answer`, `option_a`, `option_b`, `option_c`, `option_d`, `created_at`, `updated_at`) VALUES
(1, 4, 'How many eyes does a monkey have?', 'B', '1', '2', '3', '4', '2019-12-18 16:26:30', '2019-12-18 16:26:30'),
(2, 4, 'what planet is the closest to the sun?', 'A', 'Mecury', 'Venus', 'Earth', 'Mars', '2019-12-18 16:26:30', '2019-12-18 16:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to`, `from`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'tobi', '2019-11-11 17:31:40', '2019-11-11 17:31:40'),
(2, 4, 5, 'ok', '2019-11-11 18:58:25', '2019-11-11 18:58:25'),
(3, 1, 5, 'hello', '2020-01-28 21:49:01', '2020-01-28 21:49:01'),
(4, 4, 5, 'ok', '2020-01-28 22:22:30', '2020-01-28 22:22:30'),
(5, 1, 9, 'krr', '2020-04-02 05:04:41', '2020-04-02 05:04:41'),
(6, 11, 9, 'lony', '2020-04-02 05:05:13', '2020-04-02 05:05:13'),
(7, 2, 9, 'send', '2020-04-02 05:06:51', '2020-04-02 05:06:51'),
(8, 5, 9, 'okay oooo', '2020-04-02 05:08:22', '2020-04-02 05:08:22'),
(9, 1, 9, 'jk', '2020-04-02 05:36:32', '2020-04-02 05:36:32'),
(10, 2, 9, NULL, '2020-04-02 07:04:28', '2020-04-02 07:04:28'),
(11, 2, 9, NULL, '2020-04-02 07:04:37', '2020-04-02 07:04:37'),
(12, 2, 9, NULL, '2020-04-02 07:04:41', '2020-04-02 07:04:41'),
(13, 2, 9, NULL, '2020-04-02 07:04:46', '2020-04-02 07:04:46'),
(14, 2, 9, NULL, '2020-04-02 07:04:50', '2020-04-02 07:04:50'),
(15, 2, 9, NULL, '2020-04-02 07:04:56', '2020-04-02 07:04:56'),
(16, 2, 9, NULL, '2020-04-02 07:05:00', '2020-04-02 07:05:00'),
(17, 2, 9, 'der', '2020-04-02 07:08:18', '2020-04-02 07:08:18'),
(18, 2, 9, 'der', '2020-04-02 07:08:28', '2020-04-02 07:08:28');

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
(3, '2015_10_05_110622_create_conversations_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_10_26_155823_create_messages_table', 1),
(8, '2019_10_27_232704_create_tutors_table', 1),
(9, '2019_10_28_150626_create_videos_table', 1),
(10, '2019_10_31_020924_create_paid_courses_table', 1),
(11, '2019_10_31_195506_create_modules_table', 1),
(12, '2019_11_09_100609_create_permission_tables', 1),
(13, '2019_10_27_172855_create_lessons_table', 2),
(14, '2019_10_25_120113_create_courses_table', 3),
(15, '2019_12_18_073833_create_exams_table', 4),
(16, '2019_12_18_223506_create_user_examinations_table', 5),
(17, '2019_12_18_233722_create_questions_table', 5),
(18, '2019_12_18_233754_create_question_options_table', 5),
(19, '2019_12_22_040142_add_date_to_courses_table', 6),
(20, '2019_12_22_050142_add_date_to_exam_date_to_questions_table', 7),
(21, '2020_01_08_115429_add_country_to_users_table', 8),
(22, '2020_04_02_055849_add_userid_to_courses_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 5),
(2, 'App\\User', 4),
(2, 'App\\User', 9),
(3, 'App\\User', 8),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 16),
(4, 'App\\User', 7),
(4, 'App\\User', 11),
(5, 'App\\User', 6),
(5, 'App\\User', 10),
(5, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Basics of Python', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 1, '2019-11-10 00:14:14', '2019-11-10 00:14:14'),
(2, 'Basics', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 1, '2019-11-10 02:01:58', '2019-11-10 02:01:58'),
(3, 'Basics of py', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 3, '2019-12-17 15:14:07', '2019-12-17 15:14:52'),
(4, 'Basics of Test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 5, '2019-12-19 00:08:35', '2019-12-19 00:08:35'),
(5, 'Basics of Python', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 2, '2019-12-19 00:59:13', '2019-12-19 00:59:13'),
(6, 'Basics of Physics', 'graviry', 2, '2019-12-19 01:19:28', '2019-12-19 01:19:28'),
(7, 'Basics of aLL', 'quisquam velit!', 2, '2019-12-23 19:58:35', '2019-12-23 19:58:35'),
(8, 'Basics of Testing', 'testing 100', 6, '2019-12-23 20:41:50', '2019-12-23 20:41:50'),
(9, 'Advantages of testing', 'its really cool', 6, '2019-12-23 20:42:26', '2019-12-23 20:42:26'),
(10, 'Disadvantages of testing', 'ggg', 6, '2019-12-23 20:43:01', '2019-12-23 20:43:01'),
(11, 'Basics of HTML', 'quisquam velit!', 1, '2019-12-24 00:38:23', '2019-12-24 00:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `paid_courses`
--

CREATE TABLE `paid_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_courses`
--

INSERT INTO `paid_courses` (`id`, `created_at`, `updated_at`, `course_id`, `user_id`, `course_name`) VALUES
(1, '2019-11-10 01:50:01', '2019-11-10 01:50:01', 1, 2, 'python 3'),
(2, '2019-12-19 00:56:37', '2019-12-19 00:56:37', 2, 1, 'physics'),
(3, '2019-12-23 20:51:33', '2019-12-23 20:51:33', 6, 1, 'testing 001'),
(4, '2020-01-28 23:00:28', '2020-01-28 23:00:28', 8, 9, 'tobi'),
(5, '2020-04-02 03:09:36', '2020-04-02 03:09:36', 8, 1, 'tobi');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `question`, `answer`, `time`, `created_at`, `updated_at`, `exam_date`) VALUES
(1, 7, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 00:53:53', '2019-12-24 00:53:53', NULL),
(2, 7, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 00:55:59', '2019-12-24 00:55:59', NULL),
(3, 7, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 00:57:01', '2019-12-24 00:57:01', NULL),
(4, 7, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 00:57:28', '2019-12-24 00:57:28', NULL),
(5, 7, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 00:59:03', '2019-12-24 00:59:03', NULL),
(6, 7, '5 + 7 = ?', '12', NULL, '2019-12-24 00:59:03', '2019-12-24 00:59:03', NULL),
(7, 7, '12 - 8 = ?', '4', NULL, '2019-12-24 00:59:04', '2019-12-24 00:59:04', NULL),
(8, 6, 'Which one is correct team name in NBA?', 'Huston Rocket', NULL, '2019-12-24 20:14:35', '2019-12-24 20:14:35', NULL),
(9, 6, '5 + 7 = ?', '12', NULL, '2019-12-24 20:14:36', '2019-12-24 20:14:36', NULL),
(10, 6, '12 - 8 = ?', '4', NULL, '2019-12-24 20:14:36', '2019-12-24 20:14:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `option_a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_e` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `course_id`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `created_at`, `updated_at`) VALUES
(1, 5, 7, 'New York Bulls', 'Los Angeles Kings', 'Golden State Warriros', 'Huston Rocket', NULL, '2019-12-24 00:59:03', '2019-12-24 00:59:03'),
(2, 6, 7, '10', '11', '12', '13', NULL, '2019-12-24 00:59:04', '2019-12-24 00:59:04'),
(3, 7, 7, '4', '3', '2', '1', NULL, '2019-12-24 00:59:04', '2019-12-24 00:59:04'),
(4, 8, 6, 'New York Bulls', 'Los Angeles Kings', 'Golden State Warriros', 'Huston Rocket', NULL, '2019-12-24 20:14:36', '2019-12-24 20:14:36'),
(5, 9, 6, '10', '11', '12', '13', NULL, '2019-12-24 20:14:36', '2019-12-24 20:14:36'),
(6, 10, 6, '4', '3', '2', '1', NULL, '2019-12-24 20:14:36', '2019-12-24 20:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-11-09 19:25:28', '2019-11-09 19:25:28'),
(2, 'facilitator', 'web', '2019-11-09 19:25:28', '2019-11-09 19:25:28'),
(3, 'student', 'web', '2019-11-09 19:25:28', '2019-11-09 19:25:28'),
(4, 'canada_admin', 'web', '2019-11-10 15:47:10', '2019-11-10 15:47:10'),
(5, 'nigeria_admin', 'web', '2019-11-10 15:47:10', '2019-11-10 15:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/default007.jpg',
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `courses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `phone`, `description`, `image`, `role`, `active`, `courses`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'student', 'student', 'student@student.com', NULL, '$2y$10$iUeSUWpmMDqTthaxiYoRZexj5DEpVHC1Um/yD7j9Pl/GnukcUVV0S', NULL, NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Canada', NULL, '2019-11-09 19:07:25', '2019-11-09 19:07:25'),
(2, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$bQFRXEHi7KF8l46Yz6kO2uDAMq/OatC6mE24q/X7iQO73xBvbzWbq', NULL, NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Canada', NULL, '2019-11-09 19:10:19', '2019-11-09 19:10:19'),
(3, 'users', 'users', 'users@gmail.com', NULL, '$2y$10$XdvctPlMOTjLOPbTzIzZaOK7IVlmmPwByHb.t4xWmXli9U1kSm6bG', '12345678', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Nigeria', NULL, '2019-11-09 19:14:00', '2019-11-11 20:52:15'),
(4, 'user1', 'user1', 'user1@gmail.com', NULL, '$2y$10$HzvuxqJdcnjKdCND1N49u.XCOOXj.XEcJ9p0oAtGMOe4weoKL4pMC', NULL, NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Canada', NULL, '2019-11-09 19:29:19', '2019-11-09 19:29:19'),
(5, 'oluwatobi', 'oyebamiji', 'admin@gmail.com', NULL, '$2y$10$O.jw69pS7EMkvxxk/HPYU..iGGNbOmWI4gL2K8j6KMnwVEKgBjz96', '09034017984', NULL, '/profile/jrhnxywg_1585803821.png', 0, 1, NULL, 'Nigeria', NULL, '2019-11-09 23:50:13', '2020-04-02 03:03:41'),
(6, 'tobi', 'oluwa', 'adm45in@gmail.com', NULL, '$2y$10$V5pJRG.ozAlbnTSfCgp4I..02GZIcMhrbiZ8nx/HAPcYxCHLNGsai', '12345678', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'canada', NULL, '2019-11-10 21:46:01', '2019-11-10 21:46:01'),
(7, 'tobi', 'dgs', 'admin432@gmail.com', NULL, '$2y$10$7cZfTSmBXgQE0gg.jSDYeuPkfPWqVYyg6nmUxzBomtNG/t6MSoLcq', '090340173', NULL, '/uploads/tobi_1573393649.png', 0, 1, NULL, 'canada', NULL, '2019-11-10 21:47:29', '2019-11-10 21:47:29'),
(8, 'olusegun', 'oluwa', 'adm765in@gmail.com', NULL, '$2y$10$NIK6Rqz9HTfT3zN8yNTm6.6cvjitNWv5.lnZ3AsFV8A46f4pmVTLW', '09090909', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'nigeria', NULL, '2019-11-10 21:57:38', '2019-11-10 21:57:38'),
(9, 'tobi', 'facilitator', 'tutor@facilitator.com', NULL, '$2y$10$RGg6W/la8puWbTT4iIc/kuS.k8v7VwuUu7hnfb4F1tBopfoZntcj6', '12345678', NULL, '/profile/scw0omq5_1585812937.png', 0, 1, NULL, 'canada', NULL, '2019-11-10 23:07:30', '2020-04-02 05:35:37'),
(10, 'oluwatobiuy', 'oyebamiji hy', 'admihghgn@gmail.com', NULL, '$2y$10$HnVhomOuaJwp43YE8BhfDemVCFfylOKtI149pBjgC7LNBbo/0zgSq', '12345678', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'nigeria', NULL, '2019-12-22 12:08:57', '2019-12-22 12:08:57'),
(11, 'canada', 'c_admin', 'canada_admin@gmail.com', NULL, '$2y$10$m068DaeKMfLQv2RMSb9cs.JgbbhxPPNiF5qxS.hGkeRR85HSpmKe2', '122', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Canada', NULL, '2020-01-08 20:36:23', '2020-01-08 20:36:23'),
(12, 'nigeria', 'n_admin', 'nigeria_admin@gmail.com', NULL, '$2y$10$vFjPZu/gTVIhj9lTF9dfuOes4rLGHFahy/Arm9/xDsfmMrn8Y040a', '122', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'Nigeria', NULL, '2020-01-08 20:36:24', '2020-01-08 20:36:24'),
(13, 'another', 'student', 'anotherstudent@gmails.com', NULL, '$2y$10$zdSzxdegoQ6Mw0MgEuI7wuo4n/FNPMLDrZlw84xltxHNI8iOFGc4S', '09090909', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'nigeria', NULL, '2020-01-28 21:50:23', '2020-01-28 21:50:23'),
(14, 'stude', 'oyebami', 'admdefrin@gmail.com', NULL, '$2y$10$ucNUDoa/BKhlyB/jp1/TR.owm.4MqiUPnpc8tz2bc829QbTvu3Uf6', '09034017984', NULL, '/uploads/stude_1580219492.jpg', 0, 1, NULL, 'nigeria', NULL, '2020-01-28 21:51:33', '2020-01-28 21:51:33'),
(15, 'oluwatobi', 'oyebamiji', 'a34dmin@gmail.com', NULL, '$2y$10$aQ3R.jU/RGo62fow7rXQauezsAvoK1KJl4AP1j6EibUMEwX.1n9eq', '09034017984', NULL, '/uploads/default007.jpg', 0, 1, NULL, 'nigeria', NULL, '2020-04-01 12:29:50', '2020-04-01 12:29:50'),
(16, 'oluwatobi', 'oyebamiji', 'deamijitobi@gmail.com', NULL, '$2y$10$mOgMLoPXIbWUzEkiKFq/r.0Pg8g791GLjBMn7K1BxKDMdvoW.NAOa', '09034017984', NULL, '/uploads/oluwatobi_1585751877.png', 0, 1, NULL, 'nigeria', NULL, '2020-04-01 12:37:57', '2020-04-01 12:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_examinations`
--

CREATE TABLE `user_examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_courses`
--
ALTER TABLE `paid_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_examinations`
--
ALTER TABLE `user_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paid_courses`
--
ALTER TABLE `paid_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_examinations`
--
ALTER TABLE `user_examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
