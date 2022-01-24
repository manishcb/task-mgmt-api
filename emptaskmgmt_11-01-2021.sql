-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 01:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emptaskmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(4, 'superadmin', 'U2FsdGVkX1/C2q78tuLd1MUeOpW6o7NLXH3f4h0iIRc=', NULL, NULL);

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
(5, '2021_12_14_081710_create_admins_table', 2),
(6, '2021_12_15_074256_create_userdtls_table', 3),
(7, '2021_12_16_043902_create_usertasks_table', 4),
(8, '2021_12_17_050954_create_taskmasters_table', 5),
(9, '2021_12_19_090017_create_tasktousers_table', 6),
(10, '2021_12_23_085434_create_user_task_progress_masters_table', 7),
(11, '2021_12_23_085451_create_user_task_progress_details_table', 7);

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
-- Table structure for table `taskmasters`
--

CREATE TABLE `taskmasters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_create_date` date NOT NULL,
  `task_start_date` date NOT NULL,
  `task_start_time` time NOT NULL,
  `task_end_date` date NOT NULL,
  `task_end_time` time NOT NULL,
  `task_duration_mnts` decimal(10,2) NOT NULL,
  `task_priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taskmasters`
--

INSERT INTO `taskmasters` (`id`, `task_admin_name`, `task`, `task_create_date`, `task_start_date`, `task_start_time`, `task_end_date`, `task_end_time`, `task_duration_mnts`, `task_priority`, `task_remarks`, `created_at`, `updated_at`) VALUES
(13, 'Priyasmita', 'Color and font change', '2021-12-17', '2021-12-17', '05:20:17', '2021-12-17', '09:17:01', '236.74', 'Most', 'NA', NULL, NULL),
(14, 'Any Name', 'Wordpress Plugins change', '2021-12-17', '2021-12-17', '06:30:07', '2021-12-17', '08:40:15', '130.13', 'Most', 'NA', NULL, NULL),
(15, 'superadmin', 'A Large content to be uploaded for the serve', '2021-12-17', '2021-12-17', '06:50:06', '2021-12-17', '08:10:19', '80.21', 'Most', 'No Comments Please', NULL, NULL),
(16, 'superadmin', 'WP form Generate', '2021-12-17', '2021-12-17', '07:00:16', '2021-12-17', '08:00:24', '60.13', 'Intermediate', 'Please solve the Task within the Time, Thanks', NULL, NULL),
(17, 'superadmin', 'sadsadsa', '2021-12-08', '2021-12-10', '15:48:07', '2021-12-23', '18:48:13', '180.00', 'asdsadsa', 'asdsadasdas', NULL, NULL),
(18, 'superadmin', 'Hey geek! The constant emerging technologies in the world of web development always keeps the excitement for this subject through the roof. But before you tackle the big projects, we suggest you start by learning the basics. Kickstart your web development journey by learning JS concepts with our JavaScript Course. Now at it\'s lowest price ever!', '2021-12-22', '2021-12-23', '16:14:12', '2021-12-23', '22:14:21', '360.00', 'Maximum', 'No Comments', NULL, NULL),
(19, 'superadmin', 'The url() CSS function is used to include a file. The parameter is an absolute URL, a relative URL, or a data URI. The url() function can be passed as a parameter of another CSS functions, like the attr() function. Depending on the property for which it is a value, the resource sought can be an image, font, or a stylesheet. The url() functional notation is the value for the <url> data type.', '2021-12-23', '2021-12-23', '17:00:56', '2021-12-23', '19:00:16', '119.00', 'Most', 'Solve the task as soon as possible', NULL, NULL),
(20, 'superadmin', 'By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally. Tip: The background of an element is the total size of the element, including padding and border (but not the margin).', '2021-12-22', '2021-12-22', '17:30:59', '2021-12-22', '18:00:16', '29.00', 'Most', 'No remarks', NULL, NULL),
(21, 'superadmin', 'this.display = false;', '2021-12-08', '2021-12-07', '17:09:11', '2021-12-09', '17:12:15', '3.00', 'Most', '6446545465', NULL, NULL),
(22, 'superadmin', 'Sets a radial gradient as the background image. Define at least two colors (center to edges)', '2021-12-15', '2021-12-08', '19:09:30', '2021-12-07', '23:09:34', '240.00', 'Most', 'No Comments', NULL, NULL),
(23, 'superadmin', '<p-toast position=\"top-center\"></p-toast>', '2021-12-09', '2021-12-07', '19:11:37', '2021-12-07', '23:11:41', '240.00', 'Most', 'No', NULL, NULL),
(24, 'superadmin', 'Sets a linear gradient as the background image. Define at least two colors (top to bottom)\nradial-gradient() Sets a radial gradient as the background image. Define at least two colors (center to edges)', '2021-12-15', '2021-12-08', '19:12:47', '2021-12-08', '23:12:51', '240.00', 'Most', 'No Comments', NULL, NULL),
(25, 'superadmin', 'In CSS Level 1, the url() functional notation described only true URLs. In CSS Level 2, the definition of url() was extended to describe any URI, whether a URL or a URN. Confusingly, this meant that url() could be used to create a <uri> CSS data type. This change was not only awkward but, debatably, unnecessary, since URNs are almost never used in actual CSS. To alleviate the confusion, CSS Level 3 returned to the narrower, initial definition. Now, url() denotes only true <url>s.', '2021-12-08', '2021-12-01', '18:13:52', '2021-12-05', '19:13:57', '60.00', 'Most', 'Sample Remarks', NULL, NULL),
(26, 'superadmin', 'The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation. The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation.', '2021-12-22', '2021-12-22', '20:30:04', '2021-12-22', '21:30:18', '60.00', 'Most', 'No Comments', NULL, NULL),
(27, 'superadmin', 'We recommend reading this tutorial, in the sequence listed in the menu. If you have a large screen, the menu will always be present on the left. If you have a small screen, open the menu by clicking the top menu sign .', '2022-01-11', '2022-01-11', '14:42:25', '2022-01-11', '15:32:32', '50.00', 'Most', 'Please solve the task asap.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasktousers`
--

CREATE TABLE `tasktousers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_start_date` date NOT NULL,
  `task_start_time` time NOT NULL,
  `task_end_date` date NOT NULL,
  `task_end_time` time NOT NULL,
  `task_duration_mnts` int(11) NOT NULL,
  `task_priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasktousers`
--

INSERT INTO `tasktousers` (`id`, `name`, `task_admin_name`, `task_id`, `task`, `task_start_date`, `task_start_time`, `task_end_date`, `task_end_time`, `task_duration_mnts`, `task_priority`, `task_remarks`, `created_at`, `updated_at`) VALUES
(82, 'manish', 'superadmin', 16, 'WP form Generate', '2021-12-17', '07:00:16', '2021-12-17', '08:00:24', 60, 'Intermediate', 'Please solve the Task within the Time, Thanks', NULL, NULL),
(84, 'babungupta', 'superadmin', 16, 'WP form Generate', '2021-12-17', '07:00:16', '2021-12-17', '08:00:24', 60, 'Intermediate', 'Please solve the Task within the Time, Thanks', NULL, NULL),
(103, 'arupuser', 'superadmin', 18, 'Hey geek! The constant emerging technologies in the world of web development always keeps the excitement for this subject through the roof. But before you tackle the big projects, we suggest you start by learning the basics. Kickstart your web development journey by learning JS concepts with our JavaScript Course. Now at it\'s lowest price ever!', '2021-12-23', '16:14:12', '2021-12-23', '22:14:21', 360, 'Maximum', 'No Comments', NULL, NULL),
(104, 'manish', 'Any Name', 14, 'Wordpress Plugins change', '2021-12-17', '06:30:07', '2021-12-17', '08:40:15', 130, 'Most', 'NA', NULL, NULL),
(107, 'debdeep', 'Any Name', 14, 'Wordpress Plugins change', '2021-12-17', '06:30:07', '2021-12-17', '08:40:15', 130, 'Most', 'NA', NULL, NULL),
(108, 'arupuser', 'Any Name', 14, 'Wordpress Plugins change', '2021-12-17', '06:30:07', '2021-12-17', '08:40:15', 130, 'Most', 'NA', NULL, NULL),
(109, 'sumanta', 'superadmin', 19, 'The url() CSS function is used to include a file. The parameter is an absolute URL, a relative URL, or a data URI. The url() function can be passed as a parameter of another CSS functions, like the attr() function. Depending on the property for which it is a value, the resource sought can be an image, font, or a stylesheet. The url() functional notation is the value for the <url> data type.', '2021-12-23', '17:00:56', '2021-12-23', '19:00:16', 119, 'Most', 'Solve the task as soon as possible', NULL, NULL),
(110, 'babungupta', 'superadmin', 19, 'The url() CSS function is used to include a file. The parameter is an absolute URL, a relative URL, or a data URI. The url() function can be passed as a parameter of another CSS functions, like the attr() function. Depending on the property for which it is a value, the resource sought can be an image, font, or a stylesheet. The url() functional notation is the value for the <url> data type.', '2021-12-23', '17:00:56', '2021-12-23', '19:00:16', 119, 'Most', 'Solve the task as soon as possible', NULL, NULL),
(116, 'arupuser', 'superadmin', 23, '<p-toast position=\"top-center\"></p-toast>', '2021-12-07', '19:11:37', '2021-12-07', '23:11:41', 240, 'Most', 'No', NULL, NULL),
(131, 'debdeep', 'Priyasmita', 13, 'Color and font change', '2021-12-17', '05:20:17', '2021-12-17', '09:17:01', 237, 'Most', 'NA', NULL, NULL),
(135, 'debdeep', 'superadmin', 26, 'The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation. The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation.', '2021-12-22', '20:30:04', '2021-12-22', '21:30:18', 60, 'Most', 'No Comments', NULL, NULL),
(136, 'sumanta', 'superadmin', 26, 'The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation. The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation.', '2021-12-22', '20:30:04', '2021-12-22', '21:30:18', 60, 'Most', 'No Comments', NULL, NULL),
(137, 'krishnendu', 'superadmin', 26, 'The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation. The array_get method will retrieve a given value from a deeply nested array using \"dot\" notation.', '2021-12-22', '20:30:04', '2021-12-22', '21:30:18', 60, 'Most', 'No Comments', NULL, NULL),
(138, 'manish', 'superadmin', 25, 'In CSS Level 1, the url() functional notation described only true URLs. In CSS Level 2, the definition of url() was extended to describe any URI, whether a URL or a URN. Confusingly, this meant that url() could be used to create a <uri> CSS data type. This change was not only awkward but, debatably, unnecessary, since URNs are almost never used in actual CSS. To alleviate the confusion, CSS Level 3 returned to the narrower, initial definition. Now, url() denotes only true <url>s.', '2021-12-01', '18:13:52', '2021-12-05', '19:13:57', 60, 'Most', 'Sample Remarks', NULL, NULL),
(143, 'sumanta', 'superadmin', 25, 'In CSS Level 1, the url() functional notation described only true URLs. In CSS Level 2, the definition of url() was extended to describe any URI, whether a URL or a URN. Confusingly, this meant that url() could be used to create a <uri> CSS data type. This change was not only awkward but, debatably, unnecessary, since URNs are almost never used in actual CSS. To alleviate the confusion, CSS Level 3 returned to the narrower, initial definition. Now, url() denotes only true <url>s.', '2021-12-01', '18:13:52', '2021-12-05', '19:13:57', 60, 'Most', 'Sample Remarks', NULL, NULL),
(145, 'debdeep', 'superadmin', 25, 'In CSS Level 1, the url() functional notation described only true URLs. In CSS Level 2, the definition of url() was extended to describe any URI, whether a URL or a URN. Confusingly, this meant that url() could be used to create a <uri> CSS data type. This change was not only awkward but, debatably, unnecessary, since URNs are almost never used in actual CSS. To alleviate the confusion, CSS Level 3 returned to the narrower, initial definition. Now, url() denotes only true <url>s.', '2021-12-01', '18:13:52', '2021-12-05', '19:13:57', 60, 'Most', 'Sample Remarks', NULL, NULL),
(146, 'babungupta', 'superadmin', 25, 'In CSS Level 1, the url() functional notation described only true URLs. In CSS Level 2, the definition of url() was extended to describe any URI, whether a URL or a URN. Confusingly, this meant that url() could be used to create a <uri> CSS data type. This change was not only awkward but, debatably, unnecessary, since URNs are almost never used in actual CSS. To alleviate the confusion, CSS Level 3 returned to the narrower, initial definition. Now, url() denotes only true <url>s.', '2021-12-01', '18:13:52', '2021-12-05', '19:13:57', 60, 'Most', 'Sample Remarks', NULL, NULL),
(147, 'babungupta', 'superadmin', 20, 'By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally. Tip: The background of an element is the total size of the element, including padding and border (but not the margin).', '2021-12-22', '17:30:59', '2021-12-22', '18:00:16', 29, 'Most', 'No remarks', NULL, NULL),
(148, 'arupuser', 'superadmin', 20, 'By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally. Tip: The background of an element is the total size of the element, including padding and border (but not the margin).', '2021-12-22', '17:30:59', '2021-12-22', '18:00:16', 29, 'Most', 'No remarks', NULL, NULL),
(149, 'debdeep', 'superadmin', 20, 'By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally. Tip: The background of an element is the total size of the element, including padding and border (but not the margin).', '2021-12-22', '17:30:59', '2021-12-22', '18:00:16', 29, 'Most', 'No remarks', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdtls`
--

CREATE TABLE `userdtls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdtls`
--

INSERT INTO `userdtls` (`id`, `name`, `email`, `designation`, `password`, `created_at`, `updated_at`) VALUES
(8, 'manish', 'delivermanish@gmail.com', 'HR Manager', 'U2FsdGVkX18nCRWaVJjKTq21yZsHk4tqxjF6U4aWdZg=', NULL, NULL),
(12, 'sumanta', 'sumanta@gmail.com', 'Digital Marketing Executive', 'U2FsdGVkX18sVaMvpYZxBi6DvVIN6Od+6KNv4q6/1uE=', NULL, NULL),
(13, 'babungupta', 'babungupta@gmail.com', 'Digital Marketing Executive', 'U2FsdGVkX1+mhnXlklwGwQ7TzE0qgtyQqCEzZimQMFo=', NULL, NULL),
(14, 'debdeep', 'debdeep.b@gmail.com', 'Sr. Developer', 'U2FsdGVkX18e15Ksn96Mb/od0kDRexKLBUEy3Q2vkcw=', NULL, NULL),
(15, 'arupuser', 'arup.codebrackets@gmail.com', 'HR Manager', 'U2FsdGVkX18kvn0pMQcjM2iDCgvPdDVgL/81nizTq+o=', NULL, NULL),
(16, 'krishnendu', 'beijkrishnendu@gmail.com', 'Sr. Developer', 'U2FsdGVkX19SYAuls+5v8h7hYw/3jRkwIvjjqbm3MVc=', NULL, NULL),
(17, 'malahr', 'mala.codebrackets@gmail.com', 'HR Manager', 'U2FsdGVkX1+xD6dBsWIzuxNLjEj+C4idh6gaPJXb7tk=', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_task_progress_details`
--

CREATE TABLE `user_task_progress_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_start_date` date NOT NULL,
  `task_start_time` time NOT NULL,
  `task_pause_time` time NOT NULL,
  `task_stop_time` time NOT NULL,
  `task_break_mnts` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_task_progress_masters`
--

CREATE TABLE `user_task_progress_masters` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `commit_stop` time NOT NULL,
  `total_work_mnts` int(11) NOT NULL,
  `total_break_mnts` int(11) NOT NULL,
  `gross_work_mnts` int(11) NOT NULL,
  `admin_estimate_mnts` int(11) NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `taskmasters`
--
ALTER TABLE `taskmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasktousers`
--
ALTER TABLE `tasktousers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdtls`
--
ALTER TABLE `userdtls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userdtls_name_unique` (`name`),
  ADD UNIQUE KEY `userdtls_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_task_progress_details`
--
ALTER TABLE `user_task_progress_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_task_progress_details_task_id_foreign` (`task_id`);

--
-- Indexes for table `user_task_progress_masters`
--
ALTER TABLE `user_task_progress_masters`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taskmasters`
--
ALTER TABLE `taskmasters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tasktousers`
--
ALTER TABLE `tasktousers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `userdtls`
--
ALTER TABLE `userdtls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_task_progress_details`
--
ALTER TABLE `user_task_progress_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_task_progress_details`
--
ALTER TABLE `user_task_progress_details`
  ADD CONSTRAINT `user_task_progress_details_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `user_task_progress_masters` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
