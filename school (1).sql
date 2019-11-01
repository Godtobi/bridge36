-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 09:53 PM
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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `image`, `start`, `end`, `description`, `active`, `created_at`, `updated_at`) VALUES
(8, 'Basics of Python', '#', '/uploads/basics-of-python_1572295456.png', '10/29/2019', '10/30/2019', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis\r\n                      quisquam velit!', 1, '2019-10-29 03:44:16', '2019-10-29 03:44:16');

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
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
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
(1, 5, 9, 'Consequuntur sit qui voluptatem aperiam et aut.', '2019-10-26 23:37:25', '2019-10-26 23:37:25'),
(2, 10, 7, 'Laboriosam est aut et tempora incidunt.', '2019-10-26 23:37:25', '2019-10-26 23:37:25'),
(3, 3, 9, 'Doloribus accusantium sint impedit voluptatem laudantium id dolor.', '2019-10-26 23:37:25', '2019-10-26 23:37:25'),
(4, 13, 11, 'Eligendi mollitia rerum id tenetur.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(5, 13, 9, 'Tenetur dolore in ut praesentium ut tempora aut.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(6, 4, 15, 'Est qui magnam quia repellat.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(7, 12, 9, 'Ut porro voluptatem quia libero aliquid quia quod.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(8, 11, 3, 'Quia quaerat quis velit.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(9, 14, 7, 'Iste inventore dolor vel quae repudiandae maxime.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(10, 1, 7, 'Eum numquam enim minima eius aut velit occaecati exercitationem.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(11, 9, 8, 'Vel illum molestiae consequatur et nesciunt.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(12, 15, 12, 'Qui doloribus non sunt qui quod.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(13, 12, 7, 'Esse est aspernatur rerum omnis dolorem.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(14, 10, 13, 'Iure hic fuga vitae enim sunt et velit.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(15, 3, 7, 'Numquam laudantium excepturi dolor vitae facilis libero aut officia.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(16, 6, 2, 'Voluptatem dicta consequatur cum nobis cupiditate voluptatem non accusamus.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(17, 14, 2, 'Voluptas eveniet modi error.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(18, 6, 1, 'Illum ab vitae voluptatem earum.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(19, 11, 13, 'Quas eveniet rerum delectus aspernatur delectus.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(20, 7, 3, 'Alias aliquam voluptatum dicta maxime iusto ut.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(21, 9, 5, 'Explicabo ut doloribus at tempore est et rem.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(22, 14, 9, 'Id ipsa voluptatibus ratione consequuntur.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(23, 10, 15, 'Sed amet expedita voluptas commodi voluptatem et illo voluptas.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(24, 7, 5, 'Sint ut unde culpa esse iusto inventore.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(25, 2, 3, 'Dolorem non voluptatem et quia est iusto praesentium omnis.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(26, 10, 8, 'Quaerat sunt autem iure molestiae.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(27, 6, 8, 'Deleniti qui eos distinctio qui.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(28, 15, 1, 'Quod numquam quasi nulla voluptate.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(29, 5, 2, 'Sit eum reiciendis inventore provident et.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(30, 10, 6, 'In voluptatem velit debitis ullam.', '2019-10-26 23:37:26', '2019-10-26 23:37:26'),
(31, 10, 6, 'Molestias ipsa adipisci enim asperiores ab aut hic.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(32, 6, 13, 'Optio est eos alias ea neque voluptas dolores.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(33, 9, 7, 'Assumenda eaque aliquam iusto maxime.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(34, 6, 13, 'Tempore dolores maxime molestias dolorem atque quaerat aut.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(35, 6, 8, 'Quia vero omnis deleniti distinctio porro.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(36, 7, 14, 'Non qui quos commodi soluta.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(37, 12, 13, 'Et ut fugiat perspiciatis harum.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(38, 15, 4, 'Minus accusantium rerum et quo.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(39, 2, 14, 'Ad blanditiis dignissimos omnis magnam soluta.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(40, 7, 10, 'Ut reprehenderit aut atque praesentium sunt.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(41, 8, 5, 'Et autem magnam qui aperiam et vero.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(42, 14, 15, 'Sit pariatur amet tempora.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(43, 15, 4, 'Aspernatur veritatis rerum debitis explicabo vero.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(44, 13, 10, 'Dolore sed quam fugit voluptatem laboriosam minima iusto suscipit.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(45, 15, 11, 'Quam cum ut totam expedita ut velit architecto illo.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(46, 5, 10, 'Ut consequatur fugit est qui.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(47, 3, 14, 'Animi vero voluptatem ad.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(48, 6, 12, 'Esse quam eos voluptas eligendi.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(49, 13, 2, 'Voluptates saepe sapiente enim sint voluptatibus debitis.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(50, 10, 15, 'Quia eum explicabo sed soluta reiciendis eos.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(51, 1, 14, 'Ut sint quo et adipisci aut aspernatur nisi.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(52, 3, 5, 'Non sed illo non repudiandae.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(53, 10, 3, 'Nulla qui fugit quia autem quia voluptatum voluptate.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(54, 12, 3, 'Culpa nesciunt velit aperiam ex consequuntur.', '2019-10-26 23:37:27', '2019-10-26 23:37:27'),
(55, 3, 12, 'Minima cumque sunt aut eum animi.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(56, 4, 6, 'Tenetur in eveniet dolores consequatur aut accusamus id.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(57, 3, 8, 'Cumque explicabo consectetur illum odio neque.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(58, 11, 8, 'Soluta autem numquam qui voluptas eius ipsum.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(59, 11, 13, 'Voluptatem unde tempora pariatur perspiciatis non assumenda.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(60, 5, 2, 'Maxime laboriosam nam est molestiae fugiat non nam in.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(61, 9, 6, 'Quo quaerat et dicta vel vel natus voluptas.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(62, 6, 8, 'Dolorem ab est voluptatum deleniti cum.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(63, 15, 10, 'Perspiciatis libero eos eligendi nostrum.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(64, 13, 1, 'Nulla consequuntur facere pariatur aut blanditiis quae.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(65, 2, 7, 'Nemo beatae eum et sunt reiciendis pariatur.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(66, 6, 13, 'Odio nobis minima et quod.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(67, 9, 4, 'Et fugit numquam officia est quos.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(68, 3, 14, 'Minus est et non voluptatibus et porro aspernatur.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(69, 7, 10, 'Ea iste est autem accusamus.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(70, 6, 8, 'Ipsum error ut iusto consectetur est placeat.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(71, 1, 2, 'Ullam ut qui voluptas dicta atque velit quia.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(72, 15, 6, 'Omnis earum sint quia.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(73, 4, 7, 'Iure tempore incidunt fugiat iusto sit et libero.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(74, 6, 14, 'Numquam voluptas nisi enim.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(75, 8, 5, 'Nulla ratione dolores sint reiciendis.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(76, 14, 12, 'Consequatur reprehenderit saepe veniam veritatis.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(77, 2, 5, 'Quasi accusamus aliquid sapiente nemo excepturi.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(78, 4, 11, 'Reprehenderit similique ad excepturi voluptas alias voluptas.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(79, 11, 5, 'Quasi nostrum velit non odit.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(80, 9, 11, 'Aut esse distinctio qui nisi.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(81, 8, 7, 'Quidem sint hic laborum ipsa.', '2019-10-26 23:37:28', '2019-10-26 23:37:28'),
(82, 15, 4, 'Nemo aspernatur et sit ratione.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(83, 14, 9, 'Sequi laboriosam mollitia sint error quia.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(84, 14, 1, 'Voluptatum ab fuga doloribus et.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(85, 8, 5, 'Dolor omnis rerum quod aliquam ullam.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(86, 1, 8, 'Distinctio praesentium sit ut dolore.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(87, 15, 4, 'Sequi quidem neque enim maiores provident enim aut.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(88, 11, 9, 'Aut aliquid et consectetur aliquid cum quia commodi.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(89, 2, 8, 'Nostrum sapiente rerum placeat neque.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(90, 3, 14, 'Asperiores at quia ut quod et illo odio sed.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(91, 5, 15, 'Voluptas ex quaerat blanditiis quam laudantium.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(92, 2, 12, 'Voluptate numquam incidunt dolorem voluptatem accusamus laboriosam.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(93, 9, 10, 'Quam omnis provident enim tempora aut.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(94, 1, 12, 'Iste deleniti aut tenetur tempore iusto.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(95, 2, 1, 'Accusamus commodi quae aliquam non.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(96, 12, 3, 'Sequi cumque rerum soluta.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(97, 7, 1, 'Non commodi ullam non sapiente debitis.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(98, 1, 14, 'Itaque dignissimos eveniet ducimus vero enim eum.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(99, 5, 10, 'Dolores eius ullam maxime saepe aperiam sunt debitis.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(100, 2, 10, 'Architecto exercitationem voluptas accusamus veritatis quo eos.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(101, 3, 11, 'Adipisci tenetur nostrum harum nisi provident est ullam.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(102, 1, 14, 'Expedita asperiores asperiores nostrum et commodi explicabo.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(103, 2, 5, 'Esse sequi facilis ut deserunt accusantium aut modi est.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(104, 2, 3, 'Consequuntur accusamus ut modi a enim necessitatibus eligendi.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(105, 12, 6, 'Quas provident praesentium sint alias itaque ipsam excepturi.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(106, 2, 3, 'Sequi veritatis aliquid similique et sint quam.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(107, 2, 8, 'Dolore molestiae perspiciatis consequatur ad omnis atque dolorem.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(108, 9, 11, 'Omnis enim animi qui officia.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(109, 5, 11, 'Tempora dolores consequatur praesentium ut.', '2019-10-26 23:37:29', '2019-10-26 23:37:29'),
(110, 5, 6, 'Temporibus ipsa quaerat quo officia aspernatur.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(111, 1, 3, 'Et et consequuntur consequatur iure minima amet dolores.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(112, 15, 11, 'Accusantium modi et ut enim at quia.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(113, 8, 15, 'Voluptas consectetur nemo nemo omnis voluptas possimus cupiditate.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(114, 1, 12, 'Et voluptatum accusantium voluptates vel eveniet voluptates.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(115, 2, 8, 'Voluptas et enim ea id.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(116, 8, 15, 'Labore sequi qui aut voluptatem.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(117, 9, 15, 'Consequatur corporis reprehenderit in qui.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(118, 14, 3, 'Corrupti magnam ipsa non rerum voluptatem.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(119, 6, 9, 'Consequuntur consequatur corporis aut occaecati reiciendis.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(120, 1, 8, 'Ad ducimus eaque molestiae aut rem quae dolor.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(121, 7, 11, 'Libero id qui est laudantium nemo totam.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(122, 4, 7, 'Aut ratione ut eos officiis alias neque alias.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(123, 12, 6, 'Ratione possimus expedita enim qui.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(124, 2, 5, 'Qui in in asperiores dolorum.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(125, 6, 8, 'Repellat harum est enim repellat.', '2019-10-26 23:37:30', '2019-10-26 23:37:30'),
(126, 11, 4, 'Et aut et molestias qui est eveniet.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(127, 11, 13, 'Quasi ratione voluptates voluptatem eligendi repellat est exercitationem pariatur.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(128, 8, 10, 'Quisquam autem laborum at hic.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(129, 13, 9, 'Occaecati accusantium unde fugiat velit.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(130, 13, 6, 'Incidunt quisquam autem excepturi non nihil ipsa exercitationem odio.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(131, 14, 13, 'Voluptas non dolores ullam nostrum est et enim.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(132, 7, 9, 'Voluptas voluptas suscipit voluptatem in magni sint.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(133, 4, 10, 'Quidem tempore esse rerum qui non consectetur.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(134, 3, 4, 'Sint ipsam sequi maxime commodi alias voluptatibus est.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(135, 11, 8, 'Architecto officiis reiciendis quod in provident.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(136, 13, 7, 'Est ratione et voluptatem nemo vel aut dolor.', '2019-10-26 23:37:31', '2019-10-26 23:37:31'),
(137, 9, 2, 'Unde maxime repellat possimus odit at ea at deserunt.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(138, 15, 1, 'Nostrum provident labore voluptas expedita commodi aut.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(139, 2, 7, 'Provident qui reiciendis qui corporis aut.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(140, 8, 11, 'Non similique iste voluptas debitis.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(141, 4, 6, 'Autem illum voluptatibus dolorum et ipsam accusantium laboriosam.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(142, 14, 8, 'Eos consequuntur excepturi consequatur harum dolorum aut.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(143, 13, 3, 'Quod ea omnis quod quae similique aut consectetur.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(144, 1, 8, 'Quos accusantium saepe sequi officiis harum officia sed dolores.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(145, 5, 13, 'Quam sunt et quas repellendus.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(146, 7, 4, 'Quaerat nisi necessitatibus omnis fugit porro quaerat.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(147, 4, 6, 'In quia nulla dolor.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(148, 6, 9, 'Est sit commodi nulla asperiores.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(149, 4, 9, 'Molestiae similique et dignissimos repellat veniam sit quia ipsum.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(150, 15, 1, 'Quia deserunt sed neque sed.', '2019-10-26 23:37:32', '2019-10-26 23:37:32'),
(151, 7, 1, 'tobi', '2019-10-27 12:31:37', '2019-10-27 12:31:37'),
(152, 3, 1, 'tobi', '2019-10-27 13:56:07', '2019-10-27 13:56:07'),
(153, 2, 1, 'tobi tobi', '2019-10-27 13:56:39', '2019-10-27 13:56:39'),
(154, 2, 1, 'hello', '2019-10-27 14:00:36', '2019-10-27 14:00:36'),
(155, 2, 1, 'hi', '2019-10-27 14:17:24', '2019-10-27 14:17:24'),
(156, 2, 1, 'hi', '2019-10-27 14:17:39', '2019-10-27 14:17:39'),
(157, 3, 1, 'hh', '2019-10-27 14:20:55', '2019-10-27 14:20:55'),
(158, 3, 1, 'hell', '2019-10-27 14:22:53', '2019-10-27 14:22:53'),
(159, 3, 1, 'hh', '2019-10-27 14:23:30', '2019-10-27 14:23:30'),
(160, 2, 1, 'how', '2019-10-27 14:26:57', '2019-10-27 14:26:57'),
(161, 2, 1, 'io', '2019-10-27 14:27:23', '2019-10-27 14:27:23'),
(162, 2, 1, 'jjjjjjj', '2019-10-27 14:34:23', '2019-10-27 14:34:23'),
(163, 2, 1, 'hi', '2019-10-27 14:36:06', '2019-10-27 14:36:06'),
(164, 2, 1, 'uiu', '2019-10-27 14:39:51', '2019-10-27 14:39:51'),
(165, 2, 1, 'kklk', '2019-10-27 14:40:24', '2019-10-27 14:40:24'),
(166, 2, 1, 'gggg', '2019-10-27 14:40:36', '2019-10-27 14:40:36'),
(167, 2, 1, 'ok', '2019-10-27 14:42:17', '2019-10-27 14:42:17'),
(168, 3, 1, 'goog', '2019-10-27 14:42:38', '2019-10-27 14:42:38'),
(169, 2, 1, 'tobo', '2019-10-27 15:30:12', '2019-10-27 15:30:12'),
(170, 3, 1, 'yu', '2019-10-27 15:31:37', '2019-10-27 15:31:37'),
(171, 3, 1, 'wazup', '2019-10-27 15:32:01', '2019-10-27 15:32:01'),
(172, 3, 1, 'hello', '2019-10-27 15:40:32', '2019-10-27 15:40:32'),
(173, 3, 1, 'hello', '2019-10-27 15:58:57', '2019-10-27 15:58:57'),
(174, 2, 1, 'tobi', '2019-10-27 16:21:23', '2019-10-27 16:21:23'),
(175, 3, 1, 'tobi', '2019-10-27 16:21:48', '2019-10-27 16:21:48'),
(176, 3, 1, 'tobi', '2019-10-27 16:25:23', '2019-10-27 16:25:23'),
(177, 3, 1, 'y', '2019-10-27 16:26:47', '2019-10-27 16:26:47'),
(178, 3, 1, 'y', '2019-10-27 16:27:03', '2019-10-27 16:27:03'),
(179, 3, 1, 'good', '2019-10-27 16:27:23', '2019-10-27 16:27:23'),
(180, 3, 1, 'ok', '2019-10-27 16:28:48', '2019-10-27 16:28:48'),
(181, 3, 1, 'yooooo', '2019-10-27 16:28:59', '2019-10-27 16:28:59'),
(182, 2, 1, 'ok', '2019-10-27 16:31:49', '2019-10-27 16:31:49'),
(183, 2, 1, 'whats up', '2019-10-27 16:32:11', '2019-10-27 16:32:11'),
(184, 3, 1, 'test', '2019-10-27 16:34:25', '2019-10-27 16:34:25'),
(185, 3, 1, 'ok', '2019-10-27 16:38:03', '2019-10-27 16:38:03'),
(186, 2, 1, 'ok', '2019-10-27 16:40:12', '2019-10-27 16:40:12'),
(187, 3, 1, 'kl', '2019-10-27 16:41:15', '2019-10-27 16:41:15'),
(188, 3, 1, 'ok', '2019-10-27 16:42:07', '2019-10-27 16:42:07'),
(189, 3, 1, 'mu', '2019-10-27 16:43:36', '2019-10-27 16:43:36'),
(190, 3, 1, 'mk', '2019-10-27 16:46:00', '2019-10-27 16:46:00'),
(191, 3, 1, 'k', '2019-10-27 16:46:14', '2019-10-27 16:46:14'),
(192, 3, 1, 'looo', '2019-10-27 16:46:24', '2019-10-27 16:46:24'),
(193, 2, 1, 'ok', '2019-10-27 17:14:25', '2019-10-27 17:14:25'),
(194, 2, 1, 'alright', '2019-10-27 17:14:51', '2019-10-27 17:14:51'),
(195, 2, 1, 'alright', '2019-10-27 17:15:13', '2019-10-27 17:15:13'),
(196, 3, 1, 'teha', '2019-10-27 17:16:19', '2019-10-27 17:16:19'),
(197, 3, 1, 'sent', '2019-10-27 17:16:34', '2019-10-27 17:16:34'),
(198, 3, 1, 'deweef', '2019-10-27 17:17:18', '2019-10-27 17:17:18'),
(199, 3, 1, 'dwee', '2019-10-27 17:18:41', '2019-10-27 17:18:41'),
(200, 3, 1, 'good', '2019-10-27 17:21:46', '2019-10-27 17:21:46'),
(201, 3, 1, 'hood', '2019-10-27 17:22:00', '2019-10-27 17:22:00'),
(202, 3, 1, 'hello', '2019-10-27 17:23:27', '2019-10-27 17:23:27'),
(203, 3, 1, 'how are you tofay', '2019-10-27 17:23:42', '2019-10-27 17:23:42'),
(204, 3, 1, 'image', '2019-10-27 17:27:46', '2019-10-27 17:27:46'),
(205, 3, 1, 'i am the world greatest', '2019-10-27 17:28:50', '2019-10-27 17:28:50'),
(206, 3, 1, 'do you know that', '2019-10-27 17:29:02', '2019-10-27 17:29:02'),
(207, 2, 1, 'whats you name', '2019-10-27 17:32:09', '2019-10-27 17:32:09'),
(208, 1, 32, 'tobi', '2019-10-29 03:36:00', '2019-10-29 03:36:00'),
(209, 1, 32, 'hi', '2019-10-29 03:36:17', '2019-10-29 03:36:17');

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
(5, '2019_10_25_120113_create_courses_table', 1),
(6, '2019_10_26_155823_create_messages_table', 1),
(8, '2019_10_27_232704_create_tutors_table', 2),
(10, '2019_10_27_172855_create_lessons_table', 3),
(11, '2019_10_28_150626_create_videos_table', 4);

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
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `created_at`, `updated_at`, `firstname`, `lastname`, `email`, `phone`, `image`, `biography`, `course_id`) VALUES
(5, '2019-10-29 03:44:57', '2019-10-29 03:44:57', 'oyebamiji', 'oyebamiji', 'tobi@gmail.com', '09090909', '/uploads/oyebamiji_1572295497.png', 'eeee', 8);

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/default007.jpg',
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `phone`, `image`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Elvis Krajcik', 'Hilbert Gislason V', 'heather43@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '719.474.1047 x171', '/uploads/default007.jpg', 0, 1, 'fXTqmi1wzErSrhMvmcsAk0ynpIQKCCsUk8MvPNcBDvTYvTm0agkDJAmD4zAt', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(2, 'Kamille White', 'Dr. Dayana Durgan I', 'domingo.schneider@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-654-936-0090 x9717', '/uploads/default007.jpg', 0, 1, '12BM00Y7l7', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(3, 'Earnest Huel', 'Madie Waters Sr.', 'rosie.blick@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(573) 759-8311 x879', '/uploads/default007.jpg', 0, 1, 'qxeneQwtvN', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(4, 'Prof. Jefferey Gislason Sr.', 'Shirley Jacobson', 'lgraham@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '326.283.1284 x3644', '/uploads/default007.jpg', 0, 1, 'WAfQ3IXCWQ', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(5, 'Timmothy Thiel', 'Morton Okuneva I', 'vicenta81@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '368.489.8690 x2569', '/uploads/default007.jpg', 0, 1, 'QHYpUXHkBs', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(6, 'Rollin Swaniawski', 'Makenzie Champlin', 'ward.angelita@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-316-480-0848', '/uploads/default007.jpg', 0, 1, 'v5YigG6ULr', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(7, 'Felicity Kihn III', 'Stewart Franecki', 'shanon.ferry@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-640-871-8870', '/uploads/default007.jpg', 0, 1, 'TQnBIvG8Cw', '2019-10-26 23:23:06', '2019-10-26 23:23:06'),
(8, 'Mr. Douglas Nienow', 'Alanna Hayes', 'wcrooks@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+17355898554', '/uploads/default007.jpg', 0, 1, 'Lh05eGypEv', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(9, 'Mr. Hilbert Braun', 'Brett Torphy Sr.', 'bhermann@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '970-776-7993 x7257', '/uploads/default007.jpg', 0, 1, 'EKfJCz5SnD', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(10, 'Mr. Damian Roberts Sr.', 'Colleen Monahan', 'melany46@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1 (432) 569-7922', '/uploads/default007.jpg', 0, 1, '75CnmEnXvu', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(11, 'Nat Gislason', 'Mr. Jordan Murazik III', 'gordon66@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-216-849-6957', '/uploads/default007.jpg', 0, 1, 'H6xXl6TWqs', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(12, 'Delphia Abernathy', 'Wilton Kulas', 'reynolds.orin@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '268-481-7043 x90568', '/uploads/default007.jpg', 0, 1, 'brQ9FuFl9j', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(13, 'Dr. Jerald Rath V', 'Polly Prohaska', 'abbott.syble@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-725-834-3390 x3281', '/uploads/default007.jpg', 0, 1, 'X7zoqxYgcd', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(14, 'Marquise Larson', 'Bobbie Kuhn', 'acummerata@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(261) 985-5743 x7261', '/uploads/default007.jpg', 0, 1, 'vq6QF4VshE', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(15, 'Giovani McLaughlin', 'Willis Lowe', 'lakin.alaina@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1.904.277.1192', '/uploads/default007.jpg', 0, 1, 'rktT9pnWwZ', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(16, 'Rosalyn Swift', 'Prof. Zackery Hoeger MD', 'schimmel.lucienne@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1.380.801.1218', '/uploads/default007.jpg', 0, 1, 'FEPCTSAuQk', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(17, 'Esteban Roberts', 'Lesley Kerluke', 'kiley25@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(984) 918-8767 x053', '/uploads/default007.jpg', 0, 1, 'iw1sBQNn4H', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(18, 'Catalina Bauch', 'Herminia Johns', 'bklein@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '510.248.3627', '/uploads/default007.jpg', 0, 1, 'jaYWJdelYb', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(19, 'Prof. Mateo Tremblay', 'Ethelyn Hauck', 'gabriella.fritsch@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(841) 716-6631 x359', '/uploads/default007.jpg', 0, 1, 'WQcwFuihN1', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(20, 'Burdette Keeling DDS', 'Angus Schmeler', 'gdare@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '863.555.9574 x875', '/uploads/default007.jpg', 0, 1, 'AjoY6xakRi', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(21, 'Prof. Mayra Macejkovic IV', 'Nakia Ondricka', 'leannon.savion@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1.465.380.1249', '/uploads/default007.jpg', 0, 1, 's1IVVBFulM', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(22, 'Savanah Ward', 'Amira Armstrong', 'jewell27@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(205) 977-8607 x01280', '/uploads/default007.jpg', 0, 1, 'pb06dGyu0l', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(23, 'Virgie Lueilwitz', 'Prof. Colin Heaney', 'xconn@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-707-379-5223 x6294', '/uploads/default007.jpg', 0, 1, '8K9dVRXNFq', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(24, 'Prof. Maye Hickle', 'Leonie Durgan', 'jmertz@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '673.569.1934 x886', '/uploads/default007.jpg', 0, 1, 'zv6tdTYWQ5', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(25, 'Lloyd Johnston', 'Monte Beer', 'kiehn.orlo@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-692-826-5677 x635', '/uploads/default007.jpg', 0, 1, 'qANR6IL5iY', '2019-10-26 23:23:07', '2019-10-26 23:23:07'),
(26, 'Judge Koss', 'Emory Bartoletti', 'coty32@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '453-513-1312', '/uploads/default007.jpg', 0, 1, '1I6MMOe3l9', '2019-10-26 23:23:08', '2019-10-26 23:23:08'),
(27, 'Elisabeth VonRueden', 'Willow Shanahan', 'tmonahan@example.net', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-830-278-0924', '/uploads/default007.jpg', 0, 1, 'YuGqwA17Ek', '2019-10-26 23:23:08', '2019-10-26 23:23:08'),
(28, 'Helen Gusikowski', 'Dr. Mohamed Buckridge', 'hermann.klocko@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(383) 704-2352 x5106', '/uploads/default007.jpg', 0, 1, 'MNqIcwTJDh', '2019-10-26 23:23:08', '2019-10-26 23:23:08'),
(29, 'Prof. Enos Nienow', 'Ms. Romaine Schmeler IV', 'joany.adams@example.com', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-356-587-3691', '/uploads/default007.jpg', 0, 1, 'KjwPNSlfze', '2019-10-26 23:23:08', '2019-10-26 23:23:08'),
(30, 'Rickey Lynch', 'Coralie Bernier', 'reynolds.einar@example.org', '2019-10-26 23:23:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(886) 212-5193', '/uploads/default007.jpg', 0, 1, 'xQtxzD3ABw', '2019-10-26 23:23:08', '2019-10-26 23:23:08'),
(31, 'olusegun', 'tobi', 'oyebamijitobi@gmail.com', NULL, '$2y$10$pUauE1XqyruWyTy/8FVYNuAgsk3GMj5Ru.PGbYvRFlmgIR2CiTtUS', NULL, '/uploads/default007.jpg', 0, 1, NULL, '2019-10-27 00:07:16', '2019-10-27 00:07:16'),
(32, 'admin', 'admin', 'admin17@admin.com', NULL, '$2y$10$Xut5TUYFO1VWTarZvQeKS.okFzmF83vHCRnbVQ7bCyAgdMJuETWny', NULL, '/uploads/default007.jpg', 1, 1, 'OEyCWxPZUiyn00CANMnNzoVY3fW1WFQn7lh8bUXwYb1HLANbBUT0FBl2yJbc', '2019-10-29 03:23:13', '2019-10-29 03:23:13');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
