-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 06:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `package_id`, `adult`, `children`, `name`, `email`, `mobile`, `street`, `city`, `zip`, `country`, `amount`, `status`, `deleted_at`, `created_at`, `updated_at`, `payment`) VALUES
(5, 4, 3, NULL, 'User', 'user@gmail.com', '017', 'Munshiganj', 'Gazaria', '1510', 'Bangladesh', 57, 1, NULL, '2022-07-21 15:50:07', '2022-07-21 16:06:01', 1),
(7, 5, 2, NULL, 'Abu Taher', 'user@gmail.com', '01727084278', 'Munshiganj', 'Gazaria', '1510', 'Bangladesh', 128, 1, NULL, '2022-07-22 14:12:21', '2022-07-22 14:43:12', 1),
(8, 2, 1, NULL, 'User', 'user@gmail.com', '01727084278', 'Munshiganj', 'Gazaria', '1510', 'Bangladesh', 88, 0, NULL, '2022-07-22 14:20:55', '2022-07-22 14:20:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exchanges`
--

CREATE TABLE `exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchanges`
--

INSERT INTO `exchanges` (`id`, `name`, `short_form`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', 87.57, 1, '2022-05-16 14:45:02', '2022-05-16 14:45:02'),
(2, 'Canadian Dollar', 'CAD', 67.87, 1, '2022-05-16 14:45:51', '2022-05-16 14:45:51'),
(3, 'Australian Dollar', 'AUD', 60.74, 1, '2022-05-16 14:46:25', '2022-05-16 14:46:25'),
(4, 'Singapore Dollar', 'SGD', 62.81, 1, '2022-05-16 14:47:10', '2022-05-16 14:47:10'),
(5, 'UAE DIRHAM', 'AED', 23.84, 1, '2022-05-16 14:47:51', '2022-05-16 14:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `exchange__books`
--

CREATE TABLE `exchange__books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exchange_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `bdt_amount` double(8,2) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchange__books`
--

INSERT INTO `exchange__books` (`id`, `exchange_id`, `type`, `amount`, `bdt_amount`, `mobile`, `email`, `street`, `city`, `zip`, `country`, `status`, `payment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, 'Cash', 10.00, 875.70, 1727084278, 'user@gmail.com', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-07-22 15:34:19', '2022-07-22 15:34:19'),
(7, 2, 'Cash', 105.00, 7126.35, 1915970075, 'admin@gmail.com', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-07-22 15:47:16', '2022-07-22 15:47:16'),
(8, 1, 'Cash', 100.00, 8757.00, 1727084278, 'user@gmail.com', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-07-22 15:54:56', '2022-07-22 15:54:56'),
(9, 1, 'Cash', 100.00, 8757.00, 1727084278, 'user@gmail.com', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-07-22 15:55:56', '2022-07-22 15:55:56'),
(10, 2, 'Cash', 150.00, 10180.50, 1915970075, 'admin@gmail.com', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-07-22 16:01:04', '2022-07-22 16:01:04');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `mobile`, `body`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Candace Patel', 'deceweg@mailinator.com', 52, 'Quo iure sint cumque', 0, NULL, '2022-05-10 09:25:55', '2022-05-10 09:25:55'),
(2, 'Reece Bryant', 'myvohiqexi@mailinator.com', 78, 'Sint ut laborum Pla', 1, NULL, '2022-05-10 09:26:08', '2022-05-10 16:30:05'),
(3, 'Jescie Little', 'sybub@mailinator.com', 8, 'Eveniet et placeat', 1, NULL, '2022-05-10 16:26:40', '2022-05-10 17:26:35');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_12_154844_add_role_to_users_table', 1),
(6, '2022_05_10_151104_create_messages_table', 2),
(7, '2022_05_12_232827_add_mobile_to_users_table', 3),
(9, '2022_05_12_234843_create_packages_table', 4),
(11, '2022_05_13_231558_create_books_table', 5),
(13, '2022_05_14_232055_create_exchanges_table', 6),
(16, '2022_06_11_212737_create_sliders_table', 8),
(19, '2022_07_21_211934_create_payments_table', 9),
(21, '2022_05_16_210316_create_exchange__books_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `tour_code`, `date`, `amount`, `country`, `city`, `type`, `image`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Aliquam omnis nihil', '2022-01-20', 29, 'Necessitatibus ea co', 'Non dolorem consecte', 'Adipisicing facere q', 'no_image.png', 'Esse aute nisi ut do mm', '2022-05-13 14:57:48', '2022-05-13 14:38:04', '2022-05-13 14:57:48'),
(2, 'Consectetur cupidita', '1997-04-20', 88, 'Quia proident cum o', 'In laborum mollit au', 'Accusamus minima vol', 'no_image.png', 'Exercitation vitae e', NULL, '2022-05-13 14:39:12', '2022-05-13 14:39:12'),
(3, 'Esse dolorem distin', '1976-03-06', 37, 'Ad consectetur comm', 'Dolor minus voluptas', 'Tempor fugiat facil', '1652455017.webp', '<p>gdgdg</p>', NULL, '2022-05-13 15:16:58', '2022-05-13 15:16:58'),
(4, 'Ut repudiandae dolor', '1973-10-23', 19, 'Nulla minim fugiat c', 'Nostrum dolor quia p', 'Explicabo Et beatae', '1652455048.jpg', '<p>kjfghjfdhgf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://itsourcecode.com/free-projects/php-project/hospital-management-system-php-project-with-source-code/\">Hospital Management System PHP Project With Source Code</a></h3>\r\n\r\n<p><a href=\"https://itsourcecode.com/free-projects/php-project/hospital-management-system-php-project-with-source-code/\"><cite>https://itsourcecode.com&nbsp;&rsaquo; free-projects &rsaquo; hospital-mana...</cite></a></p>\r\n\r\n<p>Feb 17, 2021&nbsp;&mdash;&nbsp;A&nbsp;<em>Hospital Management System Project</em>&nbsp;In PHP Documentation It ... Second, after you finished download the source code, extract the&nbsp;<em>zip file</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://phpgurukul.com/hospital-management-system-in-php/\">Hospital Management System In PHP - PHPGurukul</a></h3>\r\n\r\n<p><a href=\"https://phpgurukul.com/hospital-management-system-in-php/\"><cite>https://phpgurukul.com&nbsp;&rsaquo; Blog</cite></a></p>\r\n\r\n<p><em>Hospital Management System</em>&nbsp;is a web application for the hospital which manages doctors and patients. In this&nbsp;<em>project</em>, we use PHP and MySQL database. The&nbsp;<em>entire</em>&nbsp;...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://sourceforge.net/directory/?q=hospital%20management%20system%20laravel\">hospital management system laravel free download</a></h3>\r\n\r\n<p><a href=\"https://sourceforge.net/directory/?q=hospital%20management%20system%20laravel\"><cite>https://sourceforge.net&nbsp;&rsaquo; Browse</cite></a></p>\r\n\r\n<p>Showing 68 open source&nbsp;<em>projects</em>&nbsp;for &quot;<em>hospital management system laravel</em>&quot; ... Click download button above for the latest release (<em>GitHub</em>&nbsp;mirror).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://www.sourcecodester.com/php/14243/open-source-clinic-management-system-php-full-source-code.html\">Open Source Clinic Management System in PHP with Full ...</a></h3>\r\n\r\n<p><a href=\"https://www.sourcecodester.com/php/14243/open-source-clinic-management-system-php-full-source-code.html\"><cite>https://www.sourcecodester.com&nbsp;&rsaquo; php &rsaquo; open-source-cl...</cite></a></p>\r\n\r\n<p>May 29, 2020&nbsp;&mdash;&nbsp;The purpose of the&nbsp;<em>project</em>&nbsp;entitled &ldquo;<em>CLINIC MANAGEMENT SYSTEM</em>&rdquo; is to computerize the Front Office Management of Hospital to develop software&nbsp;...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://www.phptpoint.com/projects/hospital-management-system/\">Download Hospital Management System - Phptpoint</a></h3>\r\n\r\n<p><a href=\"https://www.phptpoint.com/projects/hospital-management-system/\"><cite>https://www.phptpoint.com&nbsp;&rsaquo; projects &rsaquo; hospital-manag...</cite></a></p>\r\n\r\n<p><em>Hospital Management System</em>(HMS) is a system for managing the hospital functions and events. Free Download&nbsp;<em>hospital Management System project</em>&nbsp;from&nbsp;...</p>\r\n\r\n<h3>Related searches</h3>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Hospital+management+system+laravel+8+GitHub&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgiEAE\">hospital management system laravel&nbsp;<strong>8</strong>&nbsp;github</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Hospital-Management-system+in-php+mysql+GitHub&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAggEAE\"><strong>hospital-management-system in-php mysql</strong>&nbsp;github</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Hospital+management+system+database+project+in+sql+GitHub&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgjEAE\">hospital management system&nbsp;<strong>database</strong>&nbsp;project&nbsp;<strong>in sql</strong>&nbsp;github</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=InfyHMS+-+Smart+Laravel+Hospital+Management+System&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgYEAE\"><strong>infyhms - smart</strong>&nbsp;laravel hospital management system</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Patient+management-system+GitHub&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgeEAE\"><strong>patient management-system</strong>&nbsp;github</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Hospital+management+System+using+Laravel&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAghEAE\">hospital management system&nbsp;<strong>using</strong>&nbsp;laravel</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Hospital+information+system+GitHub&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgdEAE\">hospital&nbsp;<strong>information</strong>&nbsp;system github</a></p>\r\n\r\n<p><a href=\"https://www.google.com/search?q=Intelligent+Hospital+System+in+java&amp;sa=X&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ1QJ6BAgfEAE\"><strong>intelligent</strong>&nbsp;hospital system&nbsp;<strong>in java</strong></a></p>\r\n\r\n<h1>Page navigation</h1>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>1</td>\r\n			<td><a href=\"https://www.google.com/search?q=laravel+hospital+management+system+github+working+zip+file+full+project&amp;ei=P4R-YtyANNKZseMP3beGmAU&amp;start=10&amp;sa=N&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ8tMDegQIARA2\">2</a></td>\r\n			<td><a href=\"https://www.google.com/search?q=laravel+hospital+management+system+github+working+zip+file+full+project&amp;ei=P4R-YtyANNKZseMP3beGmAU&amp;start=20&amp;sa=N&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ8tMDegQIARA4\">3</a></td>\r\n			<td><a href=\"https://www.google.com/search?q=laravel+hospital+management+system+github+working+zip+file+full+project&amp;ei=P4R-YtyANNKZseMP3beGmAU&amp;start=30&amp;sa=N&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ8tMDegQIARA6\">4</a></td>\r\n			<td><a href=\"https://www.google.com/search?q=laravel+hospital+management+system+github+working+zip+file+full+project&amp;ei=P4R-YtyANNKZseMP3beGmAU&amp;start=40&amp;sa=N&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ8tMDegQIARA8\">5</a></td>\r\n			<td><a href=\"https://www.google.com/search?q=laravel+hospital+management+system+github+working+zip+file+full+project&amp;ei=P4R-YtyANNKZseMP3beGmAU&amp;start=10&amp;sa=N&amp;ved=2ahUKEwicnN3r79z3AhXSTGwGHd2bAVMQ8NMDegQIARA-\">Next</a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>Footer links</h1>', NULL, '2022-05-13 15:17:28', '2022-05-13 16:28:52'),
(5, 'Eum et inventore aut', '2004-11-30', 64, 'Lorem ratione sit a', 'Sit laudantium com', 'Cum sit facilis dic', 'no_image.png', '<p>hgfghf</p>', NULL, '2022-05-13 15:32:40', '2022-05-13 15:32:40');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `email`, `mobile`, `transaction_id`, `amount`, `method`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '01727084278', 'jdafgbdsfgb123434', 128, 'Bkash', 1, NULL, '2022-07-22 14:15:07', '2022-07-22 14:43:12'),
(3, 'user@gmail.com', '01727084278', 'jdafgbdsfgb123434', 8757, 'Bkash', 1, NULL, '2022-07-22 15:56:11', '2022-07-22 15:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `title`, `subtitle`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Title One', NULL, '1654963588.jpg', '2022-06-11 16:16:27', '2022-06-11 16:06:28', '2022-06-11 16:16:27'),
(2, 1, 'Eos do necessitatibu', 'Ea animi tenetur de', '1654964237.jpg', NULL, '2022-06-11 16:17:18', '2022-06-11 16:17:18'),
(3, 1, 'Est quam molestias e', 'Dolores facilis omni', '1654964248.jpg', NULL, '2022-06-11 16:17:28', '2022-06-11 16:17:28'),
(4, 1, 'Quae aute quo consec', 'Distinctio Qui quid dd', '1654964258.jpg', NULL, '2022-06-11 16:17:38', '2022-06-11 16:54:55'),
(5, 1, 'Aut proident impedi', 'Ut sunt aliquam iur', '1654967000.jpg', '2022-06-11 17:03:32', '2022-06-11 17:03:20', '2022-06-11 17:03:32');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `mobile`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$8MA.r2Ire7KtehpoEtklO.gBBm0IrnYAZ3NB22RKDfKyj1UluZ9eq', NULL, '2022-05-10 17:21:09', '2022-05-10 17:37:20', 'admin', '01915970075'),
(5, 'Hanna Horton', 'jubizipo@mailinator.com', NULL, '$2y$10$U94vHzNTr8KrNWfF6YbUTOsPHb6m2uOuUnET3XrTDlvM.YVidHSEi', NULL, '2022-05-10 17:37:38', '2022-05-10 17:37:38', 'admin', ''),
(6, 'User', 'user@gmail.com', NULL, '$2y$10$tn81gDf642ka85kPoZwTre8erEuDZBGNZ.Fa9vzr5N.VN2J5/iZo.', NULL, '2022-05-10 17:44:19', '2022-05-10 17:44:19', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange__books`
--
ALTER TABLE `exchange__books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_tour_code_unique` (`tour_code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exchanges`
--
ALTER TABLE `exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exchange__books`
--
ALTER TABLE `exchange__books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
