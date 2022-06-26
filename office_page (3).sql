-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2022 at 10:32 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(1, 'Southeast Bank Limited');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

DROP TABLE IF EXISTS `bank_account`;
CREATE TABLE IF NOT EXISTS `bank_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `employee_id`, `account_number`, `bank_id`, `status`) VALUES
(6, 60, '12100005673', 1, 1),
(7, 61, '12100005681', 1, 1),
(8, 62, '12100005682', 1, 1),
(9, 63, '12100005813', 1, 1),
(10, 64, '12100005971', 1, 1),
(11, 65, '12100006042', 1, 1),
(12, 66, '12100006043', 1, 1),
(13, 67, '12100006041', 1, 1),
(14, 68, '12100006044', 1, 1),
(18, 71, '12100005684', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `basic_salary`
--

DROP TABLE IF EXISTS `basic_salary`;
CREATE TABLE IF NOT EXISTS `basic_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `salary_ammount` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_salary`
--

INSERT INTO `basic_salary` (`id`, `employee_id`, `salary_ammount`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(13, 60, '50000', '2022-04-01', '2022-07-01', 1, '2022-04-29 05:59:35', '2022-04-29 11:59:35'),
(14, 61, '28000', '2022-04-01', '2022-07-01', 1, '2022-04-29 06:00:19', '2022-04-29 12:00:19'),
(15, 62, '18000', '2022-04-01', '2022-07-01', 0, '2022-04-29 06:00:42', '2022-05-07 16:05:27'),
(16, 63, '12000', '2022-04-01', '2022-07-01', 1, '2022-04-29 06:01:08', '2022-04-29 12:01:08'),
(17, 64, '8900', '2022-04-01', '2022-07-01', 1, '2022-04-29 06:01:39', '2022-05-07 11:48:40'),
(18, 65, '7000', '2022-04-01', '2022-07-01', 0, '2022-04-29 06:01:54', '2022-05-07 15:51:12'),
(19, 66, '4000', '2022-04-01', '2022-07-01', 1, '2022-04-29 06:02:11', '2022-04-29 12:02:11'),
(20, 67, '13000', '2022-04-01', '2022-07-01', 1, '2022-04-29 06:02:25', '2022-05-07 12:17:46'),
(21, 70, '10600', '2022-02-01', '2022-07-01', 0, '2022-05-07 06:06:26', '2022-05-07 16:12:58'),
(22, 65, '18000', '2022-05-07', '2022-08-07', 0, '2022-05-07 09:47:54', '2022-05-07 16:04:59'),
(23, 65, '19000', '2022-05-07', '2022-06-07', 1, '2022-05-07 10:04:59', '2022-05-07 16:04:59'),
(24, 62, '20000', '2022-05-07', '2022-05-07', 1, '2022-05-07 10:05:27', '2022-05-07 16:05:27'),
(25, 71, '4000', '2022-05-07', '2022-08-07', 1, '2022-05-07 10:12:58', '2022-05-07 16:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `birth_years`
--

DROP TABLE IF EXISTS `birth_years`;
CREATE TABLE IF NOT EXISTS `birth_years` (
  `id` bigint(20) NOT NULL,
  `birth_year` int(20) NOT NULL,
  `birth_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth_years`
--

INSERT INTO `birth_years` (`id`, `birth_year`, `birth_id`, `created_at`, `update_at`) VALUES
(1, 1971, 0, '2022-02-08 12:01:36', '2022-02-08 12:01:36'),
(2, 1972, 0, '2022-02-08 12:01:36', '2022-02-08 12:01:36'),
(3, 1973, 0, '2022-02-08 12:01:39', '2022-02-08 12:01:39'),
(4, 1974, 0, '2022-02-08 12:01:39', '2022-02-08 12:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `bank_id`) VALUES
(1, 'Shepahibag Bazar Uposhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_id`, `designation_name`, `created_at`, `updated_at`) VALUES
(1, '01', 'Intern', NULL, NULL),
(2, '01', 'Junior Web Developer', NULL, NULL),
(3, '01', 'Senior Web Developer', NULL, NULL),
(4, '01', 'Software Engineer', NULL, NULL),
(5, '01', 'Senior Software Engineer', NULL, NULL),
(6, '6', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

DROP TABLE IF EXISTS `hr`;
CREATE TABLE IF NOT EXISTS `hr` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `hr_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `hr_name`) VALUES
(1, 'Ariful Islam');

-- --------------------------------------------------------

--
-- Table structure for table `id_carts`
--

DROP TABLE IF EXISTS `id_carts`;
CREATE TABLE IF NOT EXISTS `id_carts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_no` int(20) NOT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id_carts`
--

INSERT INTO `id_carts` (`id`, `name`, `id_no`, `designation_id`, `office_id`, `date_of_birth`, `blood_group`, `email`, `photo`, `joining_date`, `expired_date`, `created_at`, `updated_at`) VALUES
(1, 'Shaheen Reza', 12, NULL, 14, '2022-04-12', '', '', '', '2022-02-10', '2022-02-10', '2022-02-08 07:59:16', '2022-02-08 07:59:16'),
(2, 'Shaheen Reza', 12, NULL, 14, NULL, '', 'ddsdsd@gmail.com', '', '2022-02-10', '2022-02-10', '2022-02-09 01:20:03', '2022-02-09 01:20:03'),
(3, 'Shaheen Reza', 12, NULL, 14, NULL, '', 'reza06br@gmail.com', '', '2022-02-10', '2022-02-10', '2022-02-09 01:32:30', '2022-02-09 01:32:30'),
(4, 'Java Developer', 21, 1, 14, NULL, '', 'java@gmail.com', '', '2022-02-10', '2022-02-10', '2022-02-09 01:59:43', '2022-02-09 01:59:43'),
(5, 'Mr. John arifin', 21, 1, 14, '1996-12-11', '', 'john@gmail.com', '', '2022-02-10', '2022-02-10', '2022-02-09 03:49:54', '2022-02-09 03:49:54'),
(6, 'Mr. John arifin', 21, 1, 14, '2022-02-18', '', 'sdva@gmail.com', '/storage/images/1644474105_passport.png', '2022-02-10', '2022-02-10', '2022-02-10 00:21:45', '2022-02-10 00:21:45'),
(7, 'Mr. John arifin', 12, 1, 14, '2022-02-10', '', 'rez@gmail.com', '/storage/app/publicimages/1644475108_passport.png', '2022-02-10', '2022-02-10', '2022-02-10 00:38:28', '2022-02-10 00:38:28'),
(8, 'Mr. John arifin', 21, 1, 14, '2022-02-10', '', 'a06br@gmail.com', '/storage/app/public/images/1644475160_passport.png', '2022-02-10', '2022-02-10', '2022-02-10 00:39:20', '2022-02-10 00:39:20'),
(9, 'Mr. John arifin', 21, 1, 14, '2022-02-10', '', 'dse@gmail.com', '/storage/app/public/C:\\xampp\\htdocs\\office_page\\public\\/images\\1644475585_passport.png', '2022-02-10', '2022-02-10', '2022-02-10 00:46:25', '2022-02-10 00:46:25'),
(10, 'Mr. John arifin', 21, 1, 14, '2022-02-10', '', 'dsdp@gmail.com', 'images/1644475861_passport.png', '2022-02-10', '2022-02-10', '2022-02-10 00:51:01', '2022-02-10 00:51:01'),
(12, 'sheikh ahsan habib', 32, 1, 14, '2022-02-10', '', 'dsd@gmail.com', 'images/1644487711_passport.png', '2022-02-10', '2023-02-10', '2022-02-10 04:08:31', '2022-02-10 04:08:31'),
(13, 'Mr. John arifin', 21, 1, 14, '2022-02-24', 'A+', 'ddeg@gmail.com', 'images/1644726594_avater.png', '2022-02-17', '2022-02-16', '2022-02-12 22:29:54', '2022-02-12 22:29:54'),
(14, 'Mr. John arifin', 21, 1, 14, '2022-02-24', 'A+', 'dsdr@gmail.com', 'images/1644726636_noImage.1de847c5.png', '2022-02-17', '2022-02-16', '2022-02-12 22:30:36', '2022-02-12 22:30:36'),
(16, 'user2', 25, 1, 14, '2024-09-24', 'A+', 'user2@gmail.com', 'images/1649748736_shojib.JPG', '2022-04-13', '2022-04-23', '2022-04-12 01:32:16', '2022-04-12 01:32:16'),
(21, 'Md. Ariful Haque', 24, 3, 14, '1999-09-24', 'B+', 'asajib7654@gmail.com', 'images/1649755857_shojib.JPG', '2022-03-20', '2022-12-31', '2022-04-12 03:30:57', '2022-04-12 03:30:57'),
(24, 'Mofakharul Islam', 22, 2, 14, '1996-06-15', 'A+', 'mofakharulislamcse11@gmail.com', 'images/1650882394_profile_pic21.jpg', '2022-01-19', '2024-01-19', '2022-04-25 04:26:34', '2022-04-25 04:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `intern_letter`
--

DROP TABLE IF EXISTS `intern_letter`;
CREATE TABLE IF NOT EXISTS `intern_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `effective_date` date NOT NULL,
  `designation` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `hr_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `designation` (`designation`),
  KEY `hr_id` (`hr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_letter`
--

INSERT INTO `intern_letter` (`id`, `employee_id`, `date`, `effective_date`, `designation`, `salary`, `hr_id`) VALUES
(1, 16, '2022-04-23', '2022-04-28', 1, '4000', 1),
(3, 42, '2022-04-25', '2022-05-01', 1, '4000', 1),
(4, 51, '2022-04-26', '2022-05-01', 1, '4000', 1),
(5, 68, '2022-04-29', '2022-05-01', 1, '4000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_agreement`
--

DROP TABLE IF EXISTS `job_agreement`;
CREATE TABLE IF NOT EXISTS `job_agreement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `designation_id` int(11) NOT NULL,
  `hr_id` int(11) NOT NULL,
  `month1` date NOT NULL,
  `salary1` int(11) NOT NULL,
  `month2` date NOT NULL,
  `salary2` int(11) NOT NULL,
  `month3` date NOT NULL,
  `salary3` int(11) NOT NULL,
  `regular_salary` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `designation` (`designation_id`),
  KEY `hr_id` (`hr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_agreement`
--

INSERT INTO `job_agreement` (`id`, `employee_id`, `date`, `designation_id`, `hr_id`, `month1`, `salary1`, `month2`, `salary2`, `month3`, `salary3`, `regular_salary`) VALUES
(3, 43, '2022-04-25', 3, 1, '2022-01-01', 12000, '2022-02-01', 12000, '2022-03-01', 18000, 18000),
(2, 15, '2022-04-25', 2, 1, '2022-04-25', 1000, '2022-05-26', 10000, '2022-05-26', 12000, 12000),
(4, 44, '2022-04-25', 3, 1, '2022-03-25', 18000, '2022-04-26', 18000, '2022-05-22', 20000, 20000),
(5, 69, '2022-04-29', 2, 1, '2022-01-01', 10000, '2022-02-01', 10000, '2022-03-01', 15000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `joining_years`
--

DROP TABLE IF EXISTS `joining_years`;
CREATE TABLE IF NOT EXISTS `joining_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `joining_year` int(20) NOT NULL,
  `joining_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joining_years`
--

INSERT INTO `joining_years` (`id`, `joining_year`, `joining_id`, `created_at`, `update_at`) VALUES
(1, 2020, 0, '2022-02-08 12:03:15', '2022-02-08 12:03:15'),
(2, 2021, 0, '2022-02-08 12:03:15', '2022-02-08 12:03:15'),
(3, 2022, 0, '2022-02-08 12:03:15', '2022-02-08 12:03:15'),
(4, 2023, 0, '2022-02-08 12:03:15', '2022-02-08 12:03:15'),
(5, 2024, 0, '2022-02-08 12:03:18', '2022-02-08 12:03:18'),
(6, 2025, 0, '2022-02-08 12:03:18', '2022-02-08 12:03:18'),
(7, 2026, 0, '2022-02-08 12:03:18', '2022-02-08 12:03:18'),
(8, 2027, 0, '2022-02-08 12:03:18', '2022-02-08 12:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
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
(7, '2022_02_07_073035_create_offices_table', 2),
(8, '2022_02_07_073257_create_designations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_id`, `office_name`, `address`, `address_line_2`, `created_at`, `updated_at`) VALUES
(14, '00', 'IT Corner', '290/6/A, Khilgaon Railgate, Khilgaon,', 'Dhaka - 1219, Bangladesh', NULL, NULL),
(15, '01', 'Siam Office', '', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_letter`
--

DROP TABLE IF EXISTS `promotion_letter`;
CREATE TABLE IF NOT EXISTS `promotion_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `effective_date` date NOT NULL,
  `from_designation` int(11) NOT NULL,
  `to_designation` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `letter_body` varchar(255) DEFAULT NULL,
  `hr_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `from_designation` (`from_designation`),
  KEY `to_designation` (`to_designation`),
  KEY `hr_id` (`hr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_letter`
--

INSERT INTO `promotion_letter` (`id`, `employee_id`, `date`, `effective_date`, `from_designation`, `to_designation`, `salary`, `letter_body`, `hr_id`) VALUES
(10, 56, '2022-04-28', '2022-05-01', 2, 3, '12000', NULL, 1),
(9, 43, '2022-04-25', '2022-05-01', 2, 3, '20000', NULL, 1),
(1, 15, '2022-04-21', '2022-05-01', 2, 3, '18000', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) DEFAULT NULL,
  `bank_account` bigint(50) DEFAULT NULL,
  `basic_salary` int(11) NOT NULL,
  `fund_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `bank_account` (`bank_account`),
  KEY `basic_salary` (`basic_salary`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `bank_account`, `basic_salary`, `fund_date`) VALUES
(2, 60, 12100005673, 50000, '2022-05-01'),
(3, 61, 12100005681, 28000, '2022-05-01'),
(4, 62, 12100005682, 18000, '2022-05-01'),
(5, 63, 12100005813, 12000, '2022-05-01'),
(6, 64, 12100005971, 8900, '2022-05-01'),
(7, 65, 12100006042, 7000, '2022-05-01'),
(8, 66, 12100006043, 4000, '2022-05-01'),
(9, 67, 12100006041, 10000, '2022-05-02'),
(10, 60, 12100005673, 50000, '2022-06-07'),
(11, 62, 12100005682, 18000, '2022-06-07'),
(12, 61, 12100005681, 28000, '2022-06-07'),
(13, 63, 12100005813, 12000, '2022-06-07'),
(14, 64, 12100005971, 8900, '2022-06-07'),
(15, 65, 12100006042, 7000, '2022-06-07'),
(16, 66, 12100006043, 4000, '2022-06-01'),
(17, 67, 12100006041, 13000, '2022-06-07'),
(18, 71, NULL, 4000, '2022-05-07'),
(20, 71, 12100005684, 4000, '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `employee_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `designation_id` (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `father_name`, `mother_name`, `email`, `mobile`, `nid`, `address`, `email_verified_at`, `is_admin`, `password`, `status`, `employee_type`, `remember_token`, `created_at`, `updated_at`, `designation_id`) VALUES
(1, 'admin', '', '', 'admin@gmail.com', '', '', '', NULL, 1, '$2y$10$f13VEyFOViAn6oQfhvoGSOQvaHaxHz.hQSesz6IRNrVWKtVR6BBwi', 1, '', NULL, '2022-02-06 23:41:50', '2022-02-06 23:41:50', NULL),
(60, 'Arif Ahmed', 'fathers name', 'mothers name', 'arifahmed@gmail.com', '11111111111', '11111111111', 'Bangladesh', NULL, NULL, '$2y$10$KlGJT7W7z9ODirNS/t.YEOl6buc91q1L3I2TlPxdhWzpnC83VjIqK', 1, 'permanent', NULL, '2022-04-29 05:09:00', '2022-04-29 05:09:00', 5),
(61, 'Md. Samrart Shahjahan', 'fathers name', 'mothers name', 'samrart@gmail.com', '11111111111', '11111111111', 'Khulna', NULL, NULL, '$2y$10$p8Z2HU4zvj0r7tCvFvoz5.uD.LDVnbU/c5gCvI9V2dSWSTaVbA1.O', 1, 'permanent', NULL, '2022-04-29 05:10:04', '2022-04-29 05:10:04', 5),
(62, 'Roni Kumar Mondal', 'Fathers  name', 'Mothers name', 'ronikumarmondol@gmail.com', '111111111111', '11111111111', 'khulna', NULL, NULL, '$2y$10$xcV1uINwuwCX.O/lIGmBEeIbWA2Okg0aR593S8s5AtmQt/izzMgOW', 1, 'permanent', NULL, '2022-04-29 05:11:59', '2022-04-29 05:11:59', 4),
(63, 'Mohammad Ariful Islam', 'fathers  name', 'mothers name', 'mohammadariful@gmail.com', '11111111111', '11111111111', 'Dhaka', NULL, NULL, '$2y$10$zbFjz3IDd4B9MLD564bdWuIcJOdf8.lZ0XeeBNNnRADzqwsbHw72G', 1, 'permanent', NULL, '2022-04-29 05:15:19', '2022-04-29 05:15:19', 6),
(64, 'Tohir Raihan', 'fathers name', 'mothers name', 'tohirraihan@gmail.com', '1111111111', '11111111111', 'Dhaka', NULL, NULL, '$2y$10$tMXRZCKafzZ4S0S/MmJQY.bcxoJgQmF.H1bNL0/IFUXtz4Hs1bTP6', 1, 'permanent', NULL, '2022-04-29 05:16:31', '2022-04-29 05:16:31', 2),
(65, 'Shaheen Reza', 'fathers name', 'mothers name', 'shaheenreza@gmail.com', '11111111111', '11111111111', 'Bhuyapur, Tangail', NULL, NULL, '$2y$10$UkkCe07xFID8M2VC2OqqOuioHQ6LNpu0mSU.wjrVhyrRCVDxym5uq', 1, 'permanent', NULL, '2022-04-29 05:17:53', '2022-04-29 05:17:53', 2),
(66, 'Mofakharul  Islam', 'fathers name', 'mothers name', 'mofakharulislamcse11@gmail.com', '11111111111', '11111111111', 'Kurigram', NULL, NULL, '$2y$10$wF5bKurml7cgmthZFPy5L.WKgb.IQ2LtcpKLJfq5tO9/S.y59abDu', 1, 'permanent', NULL, '2022-04-29 05:29:20', '2022-04-29 05:29:20', 2),
(67, 'Ahsan Habib', 'fathers name', 'Mother\'s name', 'ahsanhabib313@gmail.com', '11111111111', '11111111111', 'Chandpur', NULL, NULL, '$2y$10$ywegQOrV8tCr9z7PD7ItVOvkWtStfSY5XSoiNP4pHn63g5DbEK9Xi', 1, 'permanent', NULL, '2022-04-29 05:31:13', '2022-04-29 05:31:13', 2),
(71, 'Md Apel Sarkar', 'fathers name', 'mothers name', 'apel.diu.swe@gmail.com', '11111111111', '11111111111', 'Gazipur,Bangladesh', NULL, NULL, '$2y$10$taCCcGoLPF8el26Vwn1mmeB8Bh9OZquzWwcygHj8RQC5oik5LbOxO', 1, 'permanent', NULL, '2022-05-07 10:17:51', '2022-05-07 10:17:51', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
