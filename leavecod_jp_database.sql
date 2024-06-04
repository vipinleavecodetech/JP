-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 12:40 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavecod_jp_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL,
  `patient_id` text DEFAULT NULL,
  `card_brand` text DEFAULT NULL,
  `card_number` text DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `card_id` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `patient_id`, `card_brand`, `card_number`, `customer_id`, `card_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(83, '46', NULL, '4111111111111111', '919407408', '918851569', '2024-04-17 10:01:38', '2024-04-17 10:01:38', NULL),
(84, '47', NULL, '4111111111111111', '919410632', '918854853', '2024-04-17 12:45:34', '2024-04-17 12:45:34', NULL),
(85, '48', NULL, '4111111111111111', '919523408', '918965419', '2024-04-22 12:28:58', '2024-04-22 12:28:58', NULL),
(86, '52', NULL, '4111111111111111', '920009423', '919458582', '2024-05-08 05:43:46', '2024-05-08 05:43:46', NULL),
(87, '54', NULL, '4111111111111111', '920094894', '919540647', '2024-05-10 16:30:35', '2024-05-10 16:30:35', NULL),
(88, '55', NULL, '4111111111111111', '920153309', '919608278', '2024-05-13 08:56:31', '2024-05-13 08:56:31', NULL),
(89, '56', NULL, '4111111111111111', '920168728', '919622957', '2024-05-13 19:25:50', '2024-05-13 19:25:50', NULL),
(90, '56', NULL, '4242424242424242', '920168728', '919624009', '2024-05-13 20:34:06', '2024-05-13 20:34:06', NULL),
(91, '57', NULL, '4111111111111111', '518027556', '527615379', '2024-05-15 06:44:20', '2024-05-15 06:44:20', NULL),
(92, '57', NULL, '4111111111111111', '518027556', '527615388', '2024-05-15 06:44:54', '2024-05-15 06:44:54', NULL),
(93, '58', NULL, '4111111111111111', '679084299', '682631326', '2024-05-20 06:33:06', '2024-05-20 06:33:06', NULL),
(94, '59', NULL, '4111111111111111', '920370132', '919830473', '2024-05-20 06:53:23', '2024-05-20 06:53:23', NULL),
(95, '60', NULL, '4111111111111111', '920376443', '919836243', '2024-05-20 10:03:38', '2024-05-20 10:03:38', NULL),
(96, '56', NULL, '3566000020000410', '920168728', '919888972', '2024-05-21 14:28:36', '2024-05-21 14:28:36', NULL),
(97, '61', NULL, '4111111111111111', '920483541', '919938590', '2024-05-23 05:16:29', '2024-05-23 05:16:29', NULL),
(98, '62', NULL, '4111111111111111', '920483987', '919939009', '2024-05-23 05:31:29', '2024-05-23 05:31:29', NULL),
(99, '63', NULL, '4111111111111111', '920510386', '919964337', '2024-05-23 15:19:41', '2024-05-23 15:19:41', NULL),
(100, '64', NULL, '4111111111111111', '920597914', '920054474', '2024-05-27 06:00:39', '2024-05-27 06:00:39', NULL),
(101, '64', NULL, '4111111111111111', '920597914', '920054520', '2024-05-27 06:01:52', '2024-05-27 06:01:52', NULL),
(102, '64', NULL, '4111111111111111', '920597914', '920055745', '2024-05-27 06:34:02', '2024-05-27 06:34:02', NULL),
(103, '65', NULL, '4111111111111111', '920702072', '920151225', '2024-05-29 13:42:01', '2024-05-29 13:42:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Angela Aufderhar', '521-698-3628 x2629', 'mbotsford@mertz.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(2, 'Leilani Jacobs PhD', '(545) 238-8162', 'murphy.kelly@cronin.biz', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(3, 'Dr. Prince Jacobi I', '1-552-433-5999 x0962', 'hickle.jeramie@yahoo.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(4, 'Krystina Champlin', '+1.418.973.6311', 'brandi.harber@yahoo.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(5, 'Vivianne Braun', '(665) 512-5576 x126', 'rippin.rasheed@mosciski.info', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(6, 'Kianna Dare', '+1-534-318-4574', 'rosemarie.bergnaum@yahoo.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(7, 'Erica Beahan', '1-428-390-4116 x41059', 'elaina.schulist@gmail.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(8, 'Dr. Tanner Torphy DVM', '839-897-3516 x35161', 'shanahan.patricia@gmail.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(9, 'Prof. Jeremy Bergstrom', '728-762-5260 x3534', 'pollich.erich@bogisich.biz', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL),
(10, 'Kavon Boehm DVM', '1-252-936-5880 x612', 'katheryn35@yahoo.com', '2023-10-01 03:17:36', '2023-10-01 03:17:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_preference`
--

CREATE TABLE `manage_preference` (
  `id` int(11) NOT NULL,
  `medication_name` text DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `as_low_as_price` varchar(50) DEFAULT NULL,
  `popularity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manage_preference`
--

INSERT INTO `manage_preference` (`id`, `medication_name`, `price`, `description`, `as_low_as_price`, `popularity`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Generic Viagra', '10.00', 'Authentic generic version of Viagra made by Pfizer.Just as effective but for less. Active ingredient is Sildenafil.', '6.00', 'Most Popular', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', 1, '2024-05-07 05:51:59', '2024-05-07 05:51:59', NULL),
(5, 'Generic Cialis Daily', '3.00', 'Cialis daily generic is taken once a day at a lower dosage than regular Cialis generic.', '1.80', NULL, '/storage/app/public/images/SCVOdvTZdWucL5PG21krbQg50cAvhh1aFb4zhuub.png', 1, '2024-05-07 05:55:27', '2024-05-07 05:55:27', NULL),
(6, 'Generic Cialis', '10.00', 'Authentic generic version of Cialis, just as effective but for less.', '6.00', NULL, '/storage/app/public/images/nofGvshXo3I1fr0RloNNm642kW1eqtkSRBTC0CRM.png', 1, '2024-05-07 05:56:56', '2024-05-07 05:56:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website_setting`
--

CREATE TABLE `manage_website_setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subs_plan_amt` varchar(255) DEFAULT NULL,
  `site_url` varbinary(255) DEFAULT NULL,
  `pharmacy_email` text DEFAULT NULL,
  `fb_url` text DEFAULT NULL,
  `twitter_url` text DEFAULT NULL,
  `instagram_url` text DEFAULT NULL,
  `linkedin_url` text DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manage_website_setting`
--

INSERT INTO `manage_website_setting` (`id`, `logo`, `phone`, `address`, `email`, `subs_plan_amt`, `site_url`, `pharmacy_email`, `fb_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/settings/1698403146.jpg', '7896541230', 'ABCD', 'vipinjoshi.joshi@gmail.com', NULL, 0x68747470733a2f2f686561647375702e6c65617665636f6465746563682e636f6d, 'vipin@leavecodetech.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', NULL, '2023-12-11 11:56:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_09_19_000000_create_media_table', 1),
(8, '2019_09_19_000001_create_permissions_table', 1),
(9, '2019_09_19_000002_create_roles_table', 1),
(10, '2019_09_19_000003_create_users_table', 1),
(11, '2019_09_19_000004_create_services_table', 1),
(12, '2019_09_19_000005_create_employees_table', 1),
(13, '2019_09_19_000006_create_clients_table', 1),
(14, '2019_09_19_000007_create_appointments_table', 1),
(15, '2019_09_19_000008_create_permission_role_pivot_table', 1),
(16, '2019_09_19_000009_create_role_user_pivot_table', 1),
(17, '2019_09_19_000010_create_employee_service_pivot_table', 1),
(18, '2019_09_19_000011_create_appointment_service_pivot_table', 1),
(19, '2019_09_19_000012_add_relationship_fields_to_appointments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(25) NOT NULL,
  `patient_id` text DEFAULT NULL,
  `sure_script_patient_id` text DEFAULT NULL,
  `sure_script_practiceId` text DEFAULT NULL,
  `sure_script_userIdAdded` text DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `month` text DEFAULT NULL,
  `day` text DEFAULT NULL,
  `year` text DEFAULT NULL,
  `selector1` text DEFAULT NULL,
  `selector2` text DEFAULT NULL,
  `selector3` text DEFAULT NULL,
  `selector4` text DEFAULT NULL,
  `n_option4_textarea4` text DEFAULT NULL,
  `selector5` text DEFAULT NULL,
  `selector6` text DEFAULT NULL,
  `n_option6_textarea6` text DEFAULT NULL,
  `selector7` text DEFAULT NULL,
  `selector8` text DEFAULT NULL,
  `selector9` text DEFAULT NULL,
  `selector10` text DEFAULT NULL,
  `i_option10_textarea10` text DEFAULT NULL,
  `selector11` text DEFAULT NULL,
  `selector12` text DEFAULT NULL,
  `n_option12_textarea12` text DEFAULT NULL,
  `selector13` text DEFAULT NULL,
  `n_option13_textarea13` text DEFAULT NULL,
  `selector14` text DEFAULT NULL,
  `selector15` text DEFAULT NULL,
  `selector16` text DEFAULT NULL,
  `n_option16_textarea16` text DEFAULT NULL,
  `selector17` text DEFAULT NULL,
  `selector18` text DEFAULT NULL,
  `n_option18_textarea18` text DEFAULT NULL,
  `selector19` text DEFAULT NULL,
  `selector20` text DEFAULT NULL,
  `selector21` text DEFAULT NULL,
  `selector22` text DEFAULT NULL,
  `selector23` text DEFAULT NULL,
  `selector24` text DEFAULT NULL,
  `selector25` text DEFAULT NULL,
  `n_option25_textarea25` text DEFAULT NULL,
  `selector26` text DEFAULT NULL,
  `n_option26_textarea26` text DEFAULT NULL,
  `selector27` text DEFAULT NULL,
  `selector28` text DEFAULT NULL,
  `selector29` text DEFAULT NULL,
  `n_option29_textarea29` text DEFAULT NULL,
  `selector30` text DEFAULT NULL,
  `selector33` text DEFAULT NULL,
  `selector34` text DEFAULT NULL,
  `selector35` text DEFAULT NULL,
  `how_many_month_supply` text DEFAULT NULL,
  `session_uni_id` varchar(255) DEFAULT NULL,
  `facePicture` text DEFAULT NULL,
  `uploadId` text DEFAULT NULL,
  `medician_image` text DEFAULT NULL,
  `total_amount` text DEFAULT NULL,
  `total_discount` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `sure_script_patient_id`, `sure_script_practiceId`, `sure_script_userIdAdded`, `fname`, `lname`, `phone`, `email`, `gender`, `month`, `day`, `year`, `selector1`, `selector2`, `selector3`, `selector4`, `n_option4_textarea4`, `selector5`, `selector6`, `n_option6_textarea6`, `selector7`, `selector8`, `selector9`, `selector10`, `i_option10_textarea10`, `selector11`, `selector12`, `n_option12_textarea12`, `selector13`, `n_option13_textarea13`, `selector14`, `selector15`, `selector16`, `n_option16_textarea16`, `selector17`, `selector18`, `n_option18_textarea18`, `selector19`, `selector20`, `selector21`, `selector22`, `selector23`, `selector24`, `selector25`, `n_option25_textarea25`, `selector26`, `n_option26_textarea26`, `selector27`, `selector28`, `selector29`, `n_option29_textarea29`, `selector30`, `selector33`, `selector34`, `selector35`, `how_many_month_supply`, `session_uni_id`, `facePicture`, `uploadId`, `medician_image`, `total_amount`, `total_discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(86, '46', '108187', '2538', '5132', 'Abdul', 'Rehman', '8745963210', 'abdul234@gmail.com', 'Male', '02', '06', '1994', 'Gradually but has worsened overtime', 'Little effect', 'A little bit', '[\"Hyperlipidemia\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'Not at all', '[\"Tadalafil (Adcirca, Cialis)\"]', NULL, 'This is new testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is new testing B', 'No', NULL, '[\"Dizziness\\/Seizure\"]', 'No', NULL, 'Cardiovascular disease', 'This is new testing C', 'Several days', 'Several days', 'Several days', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Sleep \\/ insomnia\"]', 'No', NULL, '25mg Sildenafil, the generic version of Viagra', '50mg', '6 times per month', 'Generic Viagra', '3 Month', 'pat515581144', 'uploads/facePicture/1713348006.png', 'uploads/uploadId/1713348006.png', 'https://headsup.leavecodetech.com/public/quiz-assets/images/viagra1.png', '52.38', '1.62', '2024-04-17 10:00:06', '2024-04-17 10:01:37', NULL),
(87, '47', '108196', '2538', '5132', 'Jack', 'Farnandish', '8794653210', 'jack.232@gmail.com', 'Male', '03', '07', '1993', 'Gradually but has worsened overtime', 'Moderate effect', 'A little bit', '[\"Hyperlipidemia\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'A little bit', 'Somewhat', '[\"Vardenafil (Levitra, Staxyn),Avanafil (Stendra)\",\"Testosterone Replacement\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is testing B', 'No', NULL, '[\"Chest Pain\",\"Dizziness\\/Seizure\"]', 'No', NULL, 'None of the above', 'This is testing B', 'Not at all', 'Several days', 'Several days', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Weight gain \\/ management\"]', 'No', NULL, '50mg Sildenafil, the generic version of Viagra', '100mg', '6 times per month', 'Generic Viagra', '6 Month', 'pat300140638', 'uploads/facePicture/1713357780.png', 'uploads/uploadId/1713357780.png', 'https://headsup.leavecodetech.com/public/quiz-assets/images/viagra1.png', '93.6', '14.4', '2024-04-17 12:43:00', '2024-04-17 12:45:33', NULL),
(88, '48', '108270', '2538', '5132', 'Ritesh', 'Kumar', '9874563210', 'ritesh.kumar@gmail.com', 'Male', '02', '02', '1988', 'Gradually but has worsened overtime', 'No Effect', 'A little bit', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'A little bit', '[\"Vardenafil (Levitra, Staxyn),Avanafil (Stendra)\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is testing B', 'No', NULL, '[\"Passing Out\"]', 'No', NULL, 'Unexplained sudden death', 'This is testing B', 'Several days', 'Several days', 'Not at all', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Weight gain \\/ management\"]', 'No', NULL, '50mg Sildenafil, the generic version of Viagra', '50mg', '6 times per month', 'Generic Viagra', '3 Month', 'pat1693554911', 'uploads/facePicture/1713788835.png', 'uploads/uploadId/1713788835.png', 'https://headsup.leavecodetech.com/public/quiz-assets/images/viagra1.png', '52.38', '1.62', '2024-04-22 12:27:15', '2024-04-22 12:28:57', NULL),
(96, '52', '108509', '2538', '5132', 'Ritik', 'Joshi', '7898989898', 'ritik.josh12@gmail.com', 'Male', '06', '05', '1992', 'Gradually but has worsened overtime', 'Moderate effect', 'Somewhat', '[\"Hyperlipidemia\"]', NULL, 'No', 'Yes', NULL, 'Maintain an erection', 'A little bit', 'Quite a bit', '[\"Injections\"]', NULL, 'This is testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is testing B', 'No', NULL, '[\"Chest Pain\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing C', 'Several days', 'Several days', 'More than half the days', '[\"I smoke or use tobacco\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Sleep \\/ insomnia\"]', 'No', NULL, '50mg Sildenafil, the generic version of Viagra', '5mg', '10 times per month', 'Generic Cialis', '6 Month', 'pat915376639', 'uploads/facePicture/1715141321.png', 'uploads/uploadId/1715141321.png', '/storage/app/public/images/nofGvshXo3I1fr0RloNNm642kW1eqtkSRBTC0CRM.png', '480', '120', '2024-05-08 04:08:41', '2024-05-08 05:43:45', NULL),
(97, '54', '108603', '2538', '5132', 'Joshep', 'Test', '9874563210', 'joshep.test123@gmail.com', 'Male', '05', '06', '1985', 'Gradually but has worsened overtime', 'Little effect', 'A little bit', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'A little bit', 'Somewhat', '[\"Sildenafil (Viagra)\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is testing C', 'No', NULL, '[\"Dizziness\\/Seizure\"]', 'No', NULL, 'None of the above', 'This is testing D', 'Several days', 'Several days', 'Not at all', '[\"I smoke or use tobacco\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Sleep \\/ insomnia\"]', 'No', NULL, '50mg Sildenafil, the generic version of Viagra', '100mg', '10 times per month', 'Generic Viagra', '6 Month', 'pat859812151', 'uploads/facePicture/1715358555.png', 'uploads/uploadId/1715358555.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '480', '120', '2024-05-10 16:29:15', '2024-05-10 16:30:34', NULL),
(98, '55', '108651', '2538', '5132', 'James', 'Bond', '7894563221', 'james.bond132@gmail.com', 'Male', '04', '12', '1981', 'Gradually but has worsened overtime', 'Little effect', 'A little bit', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'Not at all', '[\"Sildenafil (Viagra)\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is testing B', 'No', NULL, '[\"Abnormal heartbeat\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing C', 'Not at all', 'Not at all', 'Not at all', '[\"I do not eat as healthy as I would like\"]', 'Methamphetamine', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Enlarged prostate\"]', 'No', NULL, '25mg Sildenafil, the generic version of Viagra', '100mg', '8 times per month.', 'Generic Viagra', '3 Month', 'pat652339378', 'uploads/facePicture/1715580721.png', 'uploads/uploadId/1715580721.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '204', '36', '2024-05-13 06:12:01', '2024-05-13 08:56:30', NULL),
(99, '56', NULL, NULL, NULL, 'Lauren', 'Morris Test', '2814933344', 'lauren@getcompletecare.com', 'Male', '08', '03', '1961', 'Suddenly, with same partner', 'Little effect', 'Somewhat', '[\"None of the above\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Somewhat', 'Somewhat', '[\"No I have never used any medication, supplement or behavioral modification to treat ED\"]', NULL, 'na', 'No', NULL, 'No', NULL, '[\"None of the above\"]', 'na', 'No', NULL, '[\"None of the above\"]', 'No', NULL, 'None of the above', 'na', 'More than half the days', 'More than half the days', 'Several days', '[\"None apply to me\"]', 'None', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"None\"]', 'No', NULL, 'I am not sure', '50mg', '10 times per month', 'Generic Viagra', '3 Month', 'pat993017805', 'uploads/facePicture/1715628142.jpg', 'uploads/uploadId/1715628142.jpg', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '255', '45', '2024-05-13 19:22:22', '2024-05-21 14:28:36', NULL),
(100, '57', '108718', '2538', '5132', 'Peter', 'Smith', '9845678987', 'peter.smith@gmail.com', 'Male', '08', '13', '1961', 'Gradually but has worsened overtime', 'Little effect', 'A little bit', '[\"Hyperlipidemia\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'Somewhat', '[\"Testosterone Replacement\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is testing B', 'No', NULL, '[\"Abnormal heartbeat\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing C', 'More than half the days', 'Several days', 'Several days', '[\"I smoke or use tobacco\"]', 'Methamphetamine', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Sleep \\/ insomnia\"]', 'No', NULL, NULL, '100mg', '10 times per month', 'Generic Viagra', '3 Month', 'pat1132493358', 'uploads/facePicture/1715747941.png', 'uploads/uploadId/1715747941.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '255', '45', '2024-05-15 04:39:01', '2024-05-15 06:44:53', NULL),
(101, '58', '108800', '2538', '5132', 'Jonathan', 'Hook', '8745693210', 'jonathan123@gmail.com', 'Male', '03', '11', '1957', 'Gradually but has worsened overtime', 'Little effect', 'Somewhat', '[\"Hyperlipidemia\"]', NULL, 'Yes', 'Yes', NULL, 'Maintain an erection', 'A little bit', 'Quite a bit', '[\"Testosterone Replacement\"]', NULL, 'This is testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is testing B', 'No', NULL, '[\"Chest Pain\"]', 'No', NULL, 'Unexplained sudden death', 'This is testing C', 'Several days', 'More than half the days', 'More than half the days', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Weight gain \\/ management\"]', 'No', NULL, NULL, '10mg', '10 times per month', 'Generic Cialis Daily', '3 Month', 'pat97342769', 'uploads/facePicture/1716181224.png', 'uploads/uploadId/1716181224.png', '/storage/app/public/images/SCVOdvTZdWucL5PG21krbQg50cAvhh1aFb4zhuub.png', '76.5', '13.5', '2024-05-20 05:00:24', '2024-05-20 06:33:05', NULL),
(102, '59', '108802', '2538', '5132', 'Nikol', 'Roman', '8745692130', 'nicol.roman@gmail.com', 'Female', '03', '06', '1988', 'Gradually but has worsened overtime', 'Little effect', 'A little bit', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'Somewhat', '[\"Vardenafil (Levitra, Staxyn),Avanafil (Stendra)\",\"Testosterone Replacement\",\"Injections\"]', NULL, 'This is another testing A', 'No', NULL, 'No', NULL, '[\"Clarithromycin\"]', 'This is another testing B', 'No', NULL, '[\"Dizziness\\/Seizure\"]', 'No', NULL, 'Unexplained sudden death', 'This is another testing B', 'Several days', 'Several days', 'Several days', '[\"I get less than 7 hours of sleep per night, on average\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Sleep \\/ insomnia\"]', 'No', NULL, NULL, '100mg', '10 times per month', 'Generic Viagra', '6 Month', 'pat791701798', 'uploads/facePicture/1716187885.png', 'uploads/uploadId/1716187885.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '480', '120', '2024-05-20 06:51:25', '2024-05-20 06:53:23', NULL),
(103, '60', '108811', '2538', '5132', 'Ravindra', 'Rachin', '7896541230', 'ravindra323@gmail.com', 'Male', '03', '05', '1951', 'Gradually but has worsened overtime', 'No Effect', 'A little bit', '[\"Vascular disease\",\"Emotional problems\",\"Kidney disease\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'A little bit', 'Quite a bit', '[\"Testosterone Replacement\",\"Injections\",\"Surgery or use of Pumps\"]', NULL, 'This is Testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\",\"Erythromycin\",\"Itraconazole\",\"Ulcer medications\"]', 'This is Testing', 'No', NULL, '[\"Shortness of breath or trouble breathing\"]', 'No', NULL, 'Cardiovascular disease', 'This is Testing', 'Several days', 'More than half the days', 'More than half the days', '[\"I smoke or use tobacco\",\"I use other nicotine containing products\",\"I get less than 7 hours of sleep per night, on average\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Sleep \\/ insomnia\",\"Hair loss\",\"Blood sugar \\/ diabetes\"]', 'No', NULL, NULL, '5mg', '10 times per month', 'Generic Cialis', '3 Month', 'pat96821853', 'uploads/facePicture/1716197619.png', 'uploads/uploadId/1716197619.png', '/storage/app/public/images/nofGvshXo3I1fr0RloNNm642kW1eqtkSRBTC0CRM.png', '255', '45', '2024-05-20 09:33:39', '2024-05-20 10:03:37', NULL),
(104, '61', NULL, NULL, NULL, 'dsds', 'dsdsd', '9874563210', 'doctor23232@gmail.com', 'M', '03', '04', '1968', 'Gradually but has worsened overtime', 'Little effect', 'Somewhat', '[\"Hyperlipidemia\",\"Sleep apnea\"]', NULL, 'No', 'Yes', NULL, 'Maintain an erection', 'A little bit', 'Somewhat', '[\"Testosterone Replacement\",\"Injections\"]', NULL, 'This is testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\",\"Ulcer medications\"]', 'This is testing', 'No', NULL, '[\"Abnormal heartbeat\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing', 'Not at all', 'Several days', 'Several days', '[\"I smoke or use tobacco\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Weight gain \\/ management\"]', 'No', NULL, NULL, '100mg', '10 times per month', 'Generic Viagra', '3 Month', 'pat2026375800', 'uploads/facePicture/1716439538.png', 'uploads/uploadId/1716439538.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '255', '45', '2024-05-23 04:45:38', '2024-05-23 05:16:28', NULL),
(105, '62', '108853', '2538', '5132', 'Random', 'Checking', '8656565655', 'random.check@gmail.com', 'M', '02', '07', '1975', 'Suddenly, with a new partner', 'Little effect', 'Somewhat', '[\"Hyperlipidemia\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'Somewhat', '[\"Testosterone Replacement\",\"Injections\"]', NULL, 'This is testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\",\"Erythromycin\"]', 'This is testing', 'No', NULL, '[\"Chest Pain\",\"Passing Out\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing', 'Several days', 'Several days', 'Several days', '[\"I do not eat as healthy as I would like\",\"I smoke or use tobacco\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Weight gain \\/ management\",\"Sleep \\/ insomnia\"]', 'No', NULL, NULL, '100mg', '8 times per month.', 'Generic Viagra', '3 Month', 'pat703580373', 'uploads/facePicture/1716442128.png', 'uploads/uploadId/1716442128.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '204', '36', '2024-05-23 05:28:48', '2024-05-23 05:31:28', NULL),
(106, '63', '108870', '2538', '5132', 'Rowena', 'Acacianna', '5052936547', 'test3214@gmail.com', 'F', '03', '29', '1968', 'Gradually but has worsened overtime', 'No Effect', 'A little bit', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'A little bit', 'Somewhat', '[\"Tadalafil (Adcirca, Cialis)\",\"Testosterone Replacement\"]', NULL, 'This is testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is testing', 'No', NULL, '[\"Chest Pain\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing', 'Several days', 'Several days', 'Not at all', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Weight gain \\/ management\"]', 'No', NULL, NULL, '100mg', '10 times per month', 'Generic Viagra', '3 Month', 'pat797139989', 'uploads/facePicture/1716477296.png', 'uploads/uploadId/1716477296.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '255', '45', '2024-05-23 15:14:56', '2024-05-23 15:19:40', NULL),
(107, '64', '108915', '2538', '5132', 'Just', 'Testing Again', '8796541230', 'justtestagain@gmail.com', 'M', '04', '08', '1992', 'Gradually but has worsened overtime', 'No Effect', 'Not at all', '[\"Diabetes\"]', NULL, 'Yes', 'Yes', NULL, 'Initiate an erection', 'Not at all', 'A little bit', '[\"Tadalafil (Adcirca, Cialis)\"]', NULL, 'This is testing', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is testing A', 'No', NULL, '[\"Chest Pain\"]', 'No', NULL, 'Cardiovascular disease', 'This is testing', 'Not at all', 'Several days', 'Several days', '[\"I do not eat as healthy as I would like\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Above Normal (121/80 - 129/80)', '[\"Weight gain \\/ management\"]', 'No', NULL, NULL, '100mg', '10 times per month', 'Generic Viagra', '3 Month', 'pat702023302', 'uploads/facePicture/1716789525.png', 'uploads/uploadId/1716789525.png', '/storage/app/public/images/IBsf2RljbRFtxgG284wMgX7JxnDhsQLvXFnCzbyw.png', '255', '45', '2024-05-27 05:58:45', '2024-05-27 06:34:01', NULL),
(108, '65', '108986', '2538', '5132', 'Rowena', 'Acacianna', '5052936547', 'realtesting123@gmail.com', 'F', '03', '29', '1968', 'Gradually but has worsened overtime', 'Moderate effect', 'Quiet a bit', '[\"Hyperlipidemia\"]', NULL, 'No', 'Yes', NULL, 'Maintain an erection', 'Not at all', 'A little bit', '[\"Testosterone Replacement\"]', NULL, 'This is another testing with surescript', 'No', NULL, 'No', NULL, '[\"Diltiazem\"]', 'This is another testing with surescript', 'No', NULL, '[\"Chest Pain\"]', 'No', NULL, 'Cardiovascular disease', 'This is another testing with surescript', 'Several days', 'Nearly every day', 'Nearly every day', '[\"I smoke or use tobacco\"]', 'Molly (MDMA)', NULL, 'No', NULL, 'Low – Normal (120/80 or lower)', '[\"Blood sugar \\/ diabetes\"]', 'No', NULL, NULL, '10mg', '10 times per month', 'Generic Cialis Daily', '6 Month', 'pat2043402796', 'uploads/facePicture/1716989916.png', 'uploads/uploadId/1716989916.png', '/storage/app/public/images/SCVOdvTZdWucL5PG21krbQg50cAvhh1aFb4zhuub.png', '144', '36', '2024-05-29 13:38:36', '2024-05-29 13:42:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_shipping_address`
--

CREATE TABLE `patient_shipping_address` (
  `id` int(11) NOT NULL,
  `patient_id` tinyint(4) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `address_one` text DEFAULT NULL,
  `address_two` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_shipping_address`
--

INSERT INTO `patient_shipping_address` (`id`, `patient_id`, `first_name`, `last_name`, `address_one`, `address_two`, `country`, `city`, `state`, `zip_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 86, 'Abdul', 'Rehman', '987 Pocatello', '987', 'US', 'Pocatello', 'ID', '83201', '2024-04-17 10:01:10', '2024-04-17 10:01:10', NULL),
(26, 87, 'Jack', 'Farnandish', '789 Pocatello', '789', 'US', 'Pocatello', 'ID', '83202', '2024-04-17 12:45:15', '2024-04-17 12:45:15', NULL),
(27, 88, 'Ritesh', 'Kumar', '879, Pocatello', '879', 'US', 'Pocatello', 'ID', '83201', '2024-04-22 12:28:36', '2024-04-22 12:28:36', NULL),
(28, 89, 'JP', 'Monteverde III', '3206', 'Sunrise Manor Ct.', 'US', 'Houston', 'ID', '77082', '2024-04-26 14:57:56', '2024-04-26 14:57:56', NULL),
(29, 96, 'Ritik', 'Joshi', '458 Pocatello', '458', 'US', 'Pocatello', 'ID', '83201', '2024-05-08 05:41:16', '2024-05-08 05:41:16', NULL),
(30, 97, 'Joshep', 'Test', '784 Pocatello', '784', 'US', 'Pocatello', 'ID', '83201', '2024-05-10 16:30:13', '2024-05-10 16:30:13', NULL),
(31, 98, 'James', 'Bond', '435B Pocatello', '435B', 'US', 'Pocatello', 'ID', '83201', '2024-05-13 06:13:09', '2024-05-13 06:13:09', NULL),
(32, 99, 'Lauren', 'Morris Test', '3535 briarpark dr', 'ste 110', 'US', 'houston', 'ID', '77577', '2024-05-13 19:24:44', '2024-05-13 19:24:44', NULL),
(33, 100, 'Peter', 'Smith', '125, New York', 'B-125', 'US', 'New York', 'NY', '21540', '2024-05-15 04:51:18', '2024-05-15 06:15:16', NULL),
(34, 101, 'Jonathan', 'Hook', 'New York 8754', 'B 8754', 'US', 'New York', 'NY', '83201', '2024-05-20 05:01:41', '2024-05-20 05:01:41', NULL),
(35, 102, 'Nikol', 'Roman', 'B7854 New Jersey', 'B7854', 'US', 'Jersey', 'NJ', '45687', '2024-05-20 06:53:02', '2024-05-20 06:53:02', NULL),
(36, 103, 'Ravindra', 'Rachin', 'Georgia 458A', 'A458', 'US', 'Georgia', 'GA', '23232', '2024-05-20 09:34:47', '2024-05-20 09:34:47', NULL),
(37, 104, 'dsds', 'dsdsd', 'skdfkdsfnkdsfkdsfjkdsfjkdsjfksdjf', 'skdfkdsfnkdsfkdsfjkdsfjkdsjfksdjfsd', 'US', 'fdsfd', 'AL', '98989', '2024-05-23 04:55:19', '2024-05-23 05:15:00', NULL),
(38, 105, 'Random', 'Checking', '42B New York', NULL, 'US', 'New York', 'NY', '789655565', '2024-05-23 05:31:08', '2024-05-23 05:31:08', NULL),
(39, 106, 'Rowena', 'Acacianna', '2798 Parsifal St NE', NULL, 'US', 'Albuquerque', 'NM', '87112', '2024-05-23 15:19:20', '2024-05-23 15:19:20', NULL),
(40, 107, 'Just', 'Testing Again', 'New Mexico 42A', NULL, 'US', 'New Mexico', 'NM', '78965', '2024-05-27 06:00:03', '2024-05-27 06:00:03', NULL),
(41, 108, 'Rowena', 'Acacianna', '2798 Parsifal St NE', NULL, 'US', 'Albuquerque', 'NM', '87112', '2024-05-29 13:41:15', '2024-05-29 13:41:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(2, 'permission_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(3, 'permission_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(4, 'permission_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(5, 'permission_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(6, 'permission_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(7, 'role_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(8, 'role_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(9, 'role_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(10, 'role_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(11, 'role_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(12, 'user_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(13, 'user_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(14, 'user_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(15, 'user_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(16, 'user_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(17, 'service_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(18, 'service_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(19, 'service_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(20, 'service_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(21, 'service_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(22, 'employee_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(23, 'employee_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(24, 'employee_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(25, 'employee_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(26, 'employee_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(27, 'client_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(28, 'client_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(29, 'client_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(30, 'client_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(31, 'client_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(32, 'appointment_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(33, 'appointment_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(34, 'appointment_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(35, 'appointment_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(36, 'appointment_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(37, 'transaction_create', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(38, 'transaction_edit', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(39, 'transaction_show', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(40, 'transaction_delete', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL),
(41, 'transaction_access', '2019-09-19 06:44:15', '2019-09-19 06:44:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 14),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(3, 14),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `prescription_detail` text DEFAULT NULL,
  `prescription_pdf` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_template`
--

CREATE TABLE `prescription_template` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `temp_description` text DEFAULT NULL,
  `status` text DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prescription_template`
--

INSERT INTO `prescription_template` (`id`, `name`, `temp_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Template2', '<p>Here is the #name# prescription letter, You need to ship #duration# medician as per the below prescription.</p><p>&nbsp;</p><p><strong>Shipping Address:</strong></p><p>#shipingaddress#</p>', '1', '2023-12-07 07:06:12', '2023-12-07 09:25:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-09-19 06:38:28', '2019-09-19 06:38:28', NULL),
(2, 'User', '2019-09-19 06:38:28', '2019-09-19 06:38:28', NULL),
(3, 'Doctor', '2024-05-08 06:38:28', '2024-05-08 06:38:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL),
(5, 2, '2023-10-17 07:37:11', '2023-10-17 07:37:11', NULL),
(6, 2, '2023-10-20 10:10:25', '2023-10-20 10:10:25', NULL),
(7, 2, '2023-10-20 10:35:43', '2023-10-20 10:35:43', NULL),
(8, 2, '2023-10-20 11:25:57', '2023-10-20 11:25:57', NULL),
(9, 2, '2023-10-20 12:59:46', '2023-10-20 12:59:46', NULL),
(10, 2, '2023-10-20 13:45:36', '2023-10-20 13:45:36', NULL),
(11, 2, '2023-10-22 11:14:40', '2023-10-22 11:14:40', NULL),
(12, 2, '2023-10-22 11:32:48', '2023-10-22 11:32:48', NULL),
(13, 2, '2023-10-23 11:04:03', '2023-10-23 11:04:03', NULL),
(14, 2, '2023-10-27 05:55:51', '2023-10-27 05:55:51', NULL),
(15, 2, '2023-10-27 06:42:54', '2023-10-27 06:42:54', NULL),
(16, 2, '2023-11-10 03:59:23', '2023-11-10 03:59:23', NULL),
(17, 2, '2023-11-15 14:40:43', '2023-11-15 14:40:43', NULL),
(18, 2, '2023-11-16 14:38:22', '2023-11-16 14:38:22', NULL),
(19, 2, '2023-11-16 16:26:13', '2023-11-16 16:26:13', NULL),
(20, 2, '2023-11-24 05:36:11', '2023-11-24 05:36:11', NULL),
(21, 2, '2023-12-01 07:09:58', '2023-12-01 07:09:58', NULL),
(22, 2, '2023-12-01 08:46:12', '2023-12-01 08:46:12', NULL),
(23, 2, '2023-12-01 08:54:29', '2023-12-01 08:54:29', NULL),
(24, 2, '2023-12-06 06:51:34', '2023-12-06 06:51:34', NULL),
(25, 2, '2023-12-07 05:54:36', '2023-12-07 05:54:36', NULL),
(26, 2, '2023-12-07 10:49:52', '2023-12-07 10:49:52', NULL),
(28, 2, '2023-12-08 05:14:21', '2023-12-08 05:14:21', NULL),
(29, 2, '2023-12-08 11:44:51', '2023-12-08 11:44:51', NULL),
(31, 2, '2023-12-08 13:52:07', '2023-12-08 13:52:07', NULL),
(32, 2, '2023-12-12 10:40:45', '2023-12-12 10:40:45', NULL),
(33, 2, '2024-04-09 13:57:53', '2024-04-09 13:57:53', NULL),
(34, 2, '2024-04-10 09:43:43', '2024-04-10 09:43:43', NULL),
(35, 2, '2024-04-10 12:18:44', '2024-04-10 12:18:44', NULL),
(36, 2, '2024-04-11 09:06:36', '2024-04-11 09:06:36', NULL),
(37, 2, '2024-04-11 10:31:24', '2024-04-11 10:31:24', NULL),
(38, 2, '2024-04-11 10:54:22', '2024-04-11 10:54:22', NULL),
(39, 2, '2024-04-11 11:15:35', '2024-04-11 11:15:35', NULL),
(40, 2, '2024-04-11 11:31:31', '2024-04-11 11:31:31', NULL),
(41, 2, '2024-04-11 12:04:05', '2024-04-11 12:04:05', NULL),
(42, 2, '2024-04-11 13:00:28', '2024-04-11 13:00:28', NULL),
(43, 2, '2024-04-12 06:28:19', '2024-04-12 06:28:19', NULL),
(44, 2, '2024-04-16 10:09:10', '2024-04-16 10:09:10', NULL),
(45, 2, '2024-04-17 06:46:16', '2024-04-17 06:46:16', NULL),
(46, 2, '2024-04-17 10:00:06', '2024-04-17 10:00:06', NULL),
(47, 2, '2024-04-17 12:43:00', '2024-04-17 12:43:00', NULL),
(48, 2, '2024-04-22 12:27:15', '2024-04-22 12:27:15', NULL),
(49, 2, '2024-04-26 14:57:01', '2024-04-26 14:57:01', NULL),
(50, 2, '2024-05-06 03:53:00', '2024-05-06 03:53:00', NULL),
(51, 2, '2024-05-07 12:06:42', '2024-05-07 12:06:42', NULL),
(52, 2, '2024-05-08 04:08:41', '2024-05-08 04:08:41', NULL),
(53, 3, NULL, NULL, NULL),
(54, 2, '2024-05-10 16:29:15', '2024-05-10 16:29:15', NULL),
(55, 2, '2024-05-13 06:12:01', '2024-05-13 06:12:01', NULL),
(56, 2, '2024-05-13 19:22:22', '2024-05-13 19:22:22', NULL),
(57, 2, '2024-05-15 04:39:01', '2024-05-15 04:39:01', NULL),
(58, 2, '2024-05-20 05:00:24', '2024-05-20 05:00:24', NULL),
(59, 2, '2024-05-20 06:51:25', '2024-05-20 06:51:25', NULL),
(60, 2, '2024-05-20 09:33:39', '2024-05-20 09:33:39', NULL),
(61, 2, '2024-05-23 04:45:38', '2024-05-23 04:45:38', NULL),
(62, 2, '2024-05-23 05:28:48', '2024-05-23 05:28:48', NULL),
(63, 2, '2024-05-23 15:14:56', '2024-05-23 15:14:56', NULL),
(64, 2, '2024-05-27 05:58:45', '2024-05-27 05:58:45', NULL),
(65, 2, '2024-05-29 13:38:36', '2024-05-29 13:38:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(25) NOT NULL,
  `patient_id` text DEFAULT NULL,
  `sure_script_patient_id` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `subscription_id` text DEFAULT NULL,
  `charge_id` text DEFAULT NULL,
  `patient_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subscription_durations` text DEFAULT NULL,
  `subscription_status` text DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `patient_id`, `sure_script_patient_id`, `amount`, `customer_id`, `transaction_id`, `subscription_id`, `charge_id`, `patient_name`, `email`, `subscription_durations`, `subscription_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(49, '46', NULL, '52.38', '919407408', '9195207', NULL, NULL, 'Abdul Rehman', 'abdul234@gmail.com', '3 Month Subscription', 'active', '2024-04-17 10:01:39', '2024-04-17 10:01:39', NULL),
(50, '47', NULL, '93.6', '919410632', '9195495', NULL, NULL, 'Jack Farnandish', 'jack.232@gmail.com', '6 Month Subscription', 'active', '2024-04-17 12:45:35', '2024-04-17 12:45:35', NULL),
(51, '48', NULL, '52.38', '919523408', '9199393', NULL, NULL, 'Ritesh Kumar', 'ritesh.kumar@gmail.com', '3 Month Subscription', 'active', '2024-04-22 12:28:58', '2024-04-22 12:28:58', NULL),
(52, '52', NULL, '480', '920009423', '9216647', NULL, NULL, 'Ritik Joshi', 'ritik.josh12@gmail.com', '6 Month Subscription', 'active', '2024-05-08 05:43:47', '2024-05-08 05:43:47', NULL),
(53, '54', NULL, '480', '920094894', '9219815', NULL, NULL, 'Joshep Test', 'joshep.test123@gmail.com', '6 Month Subscription', 'active', '2024-05-10 16:30:36', '2024-05-10 16:30:36', NULL),
(54, '55', NULL, '204', '920153309', '9220277', NULL, NULL, 'James Bond', 'james.bond132@gmail.com', '3 Month Subscription', 'active', '2024-05-13 08:56:31', '2024-05-13 08:56:31', NULL),
(55, '56', NULL, '255', '920168728', '9221025', NULL, NULL, 'Lauren Morris Test', 'lauren@getcompletecare.com', '3 Month Subscription', 'cancelled', '2024-05-13 19:25:51', '2024-05-13 19:31:36', '2024-05-13 19:31:36'),
(56, '56', NULL, '255', '920168728', '9221052', NULL, NULL, 'Lauren Morris Test', 'lauren@getcompletecare.com', '3 Month Subscription', 'cancelled', '2024-05-13 20:34:07', '2024-05-21 14:28:09', '2024-05-21 14:28:09'),
(57, '59', NULL, '480', '920370132', '9225728', NULL, NULL, 'Nikol Roman', 'nicol.roman@gmail.com', '6 Month Subscription', 'active', '2024-05-20 06:53:24', '2024-05-20 06:53:24', NULL),
(58, '60', NULL, '255', '920376443', '9225812', NULL, NULL, 'Ravindra Rachin', 'ravindra323@gmail.com', '3 Month Subscription', 'active', '2024-05-20 10:03:39', '2024-05-20 10:03:39', NULL),
(59, '56', NULL, '255', '920168728', '9227276', NULL, NULL, 'Lauren Morris Test', 'lauren@getcompletecare.com', '3 Month Subscription', 'active', '2024-05-21 14:28:37', '2024-05-21 14:28:37', NULL),
(60, '61', NULL, '255', '920483541', '9229556', NULL, NULL, 'dsds dsdsd', 'doctor23232@gmail.com', '3 Month Subscription', 'active', '2024-05-23 05:16:30', '2024-05-23 05:16:30', NULL),
(61, '62', NULL, '204', '920483987', '9229566', NULL, NULL, 'Random Checking', 'random.check@gmail.com', '3 Month Subscription', 'active', '2024-05-23 05:31:29', '2024-05-23 05:31:29', NULL),
(62, '63', NULL, '255', '920510386', '9230382', NULL, NULL, 'Rowena Acacianna', 'test3214@gmail.com', '3 Month Subscription', 'active', '2024-05-23 15:19:41', '2024-05-23 15:19:41', NULL),
(63, '64', NULL, '255', '920597914', '9232257', NULL, NULL, 'Just Testing Again', 'justtestagain@gmail.com', '3 Month Subscription', 'active', '2024-05-27 06:00:40', '2024-05-27 06:00:40', NULL),
(64, '64', NULL, '255', '920597914', '9232261', NULL, NULL, 'Just Testing Again', 'justtestagain@gmail.com', '3 Month Subscription', 'active', '2024-05-27 06:01:53', '2024-05-27 06:01:53', NULL),
(65, '65', NULL, '144', '920702072', '9235223', NULL, NULL, 'Rowena Acacianna', 'realtesting123@gmail.com', '6 Month Subscription', 'active', '2024-05-29 13:42:02', '2024-05-29 13:42:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role_id` text DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `customer_id`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 'Jack Farnandish', 'jack.232@gmail.com', '8794653210', 'Male', '1993-03-07', '919410632', NULL, '$2y$10$jQGVi3sTCv.oEOglAeAsCe6nOX6L4Vg0O/ZfJWnab214MvspoQbIW', '2', NULL, '2024-04-17 07:13:00', '2024-04-17 07:15:34', NULL),
(48, 'Ritesh Kumar', 'ritesh.kumar@gmail.com', '9874563210', 'Male', '1988-02-02', '919523408', NULL, '$2y$10$jQGVi3sTCv.oEOglAeAsCe6nOX6L4Vg0O/ZfJWnab214MvspoQbIW', '2', NULL, '2024-04-22 06:57:15', '2024-04-22 06:58:58', NULL),
(55, 'James Bond', 'james.bond132@gmail.com', '7894563221', 'Male', '1981-04-12', '920153309', NULL, '$2y$10$wWe9cFNWBN1vX3MOvDXVgew50itvkans6Mkey1nLTTwLwgCS/RcNe', '2', NULL, '2024-05-13 00:42:01', '2024-05-13 03:26:31', NULL),
(53, 'Dr. Jhon Deo', 'doctor@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$TpifQrk776wmQVDCeMtEE.wrtLMtrq5lmNNRdWDudu8QG23EQ6j.G', '3', NULL, '2024-05-08 01:27:29', '2024-05-08 01:27:29', NULL),
(54, 'Joshep Test', 'joshep.test123@gmail.com', '9874563210', 'Male', '1985-05-06', '920094894', NULL, '$2y$10$vWnH8pBOrkwDPH4m/pClr.WBLtFH/jYgvy3/mqZR0EwQ0ak6UPtP6', '2', NULL, '2024-05-10 10:59:15', '2024-05-10 11:00:35', NULL),
(52, 'Ritik Joshi', 'ritik.josh12@gmail.com', '7898989898', 'Male', '1992-06-05', '920009423', NULL, '$2y$10$jQGVi3sTCv.oEOglAeAsCe6nOX6L4Vg0O/ZfJWnab214MvspoQbIW', '2', NULL, '2024-05-07 22:38:41', '2024-05-08 00:13:46', NULL),
(56, 'Lauren Morris Test', 'lauren@getcompletecare.com', '2814933344', 'Male', '1961-08-03', '920168728', NULL, '$2y$10$TA.w6z.w3/x0.7Pxy3V90.GCvjcblPpB2iwUf0EZeTxTIZPtOVpVS', '2', NULL, '2024-05-13 13:52:22', '2024-05-13 13:55:50', NULL),
(57, 'Peter Smith', 'peter.smith@gmail.com', '9845678987', 'Male', '1961-08-13', '518027556', NULL, '$2y$10$XnhHsWc/h.llx02ZHuQnLOa9ko1X.VHOYqd4TdjDysv91M8N1zk7G', '2', NULL, '2024-05-14 23:09:01', '2024-05-15 01:14:20', NULL),
(58, 'Jonathan Hook', 'jonathan123@gmail.com', '8745693210', 'Male', '1957-03-11', '679084299', NULL, '$2y$10$Wzw89N9vpS3lDbcKYh.MfeWiWrqkFiz0zMnHRQZklcV3GnirNPttS', '2', NULL, '2024-05-19 23:30:24', '2024-05-20 01:03:06', NULL),
(59, 'Nikol Roman', 'nicol.roman@gmail.com', '8745692130', 'Female', '1988-03-06', '920370132', NULL, '$2y$10$IFB2cnh/9XM1OJTcvzirYuZNK2lvO/SDwBZLKPNiHFuxcifGmXOO.', '2', NULL, '2024-05-20 01:21:25', '2024-05-20 01:23:23', NULL),
(1, 'Admin', 'admin@gmail.com', '9877456252', 'Male', '1990-07-04', '', NULL, '$2y$10$jQGVi3sTCv.oEOglAeAsCe6nOX6L4Vg0O/ZfJWnab214MvspoQbIW', '', NULL, '2023-12-06 01:21:34', '2023-12-08 07:49:46', NULL),
(63, 'Rowena Acacianna', 'test3214@gmail.com', '5052936547', 'F', '1968-03-29', '920510386', NULL, '$2y$10$2o8qCP69nIRj9oWM7kfGve/0iewl4Lom9/gBzKQcm7DnfTsMEA22C', '2', NULL, '2024-05-23 09:44:56', '2024-05-23 09:49:41', NULL),
(65, 'Rowena Acacianna', 'realtesting123@gmail.com', '5052936547', 'F', '1968-03-29', '920702072', NULL, '$2y$10$dyARaT5y7KNRlRpJ9nfgHOVaUYeaOkyV2VwgATQJMb1me8ve8sY02', '2', NULL, '2024-05-29 08:08:36', '2024-05-29 08:12:01', NULL),
(64, 'Just Testing Again', 'justtestagain@gmail.com', '8796541230', 'M', '1992-04-08', '920597914', NULL, '$2y$10$LR7O/R89IdOCIh.k.547GuNBJNN77D8vdk2shN4QY6UWdGvfJXhNW', '2', NULL, '2024-05-27 00:28:45', '2024-05-27 00:30:39', NULL),
(62, 'Random Checking', 'random.check@gmail.com', '8656565655', 'M', '1975-02-07', '920483987', NULL, '$2y$10$fhAjZ2dJ05tgeV9AgkDjj.GE6pEiq9BW0m11Mc5nDhI4SbVJ/Ni3O', '2', NULL, '2024-05-22 23:58:48', '2024-05-23 00:01:29', NULL),
(61, 'dsds dsdsd', 'doctor23232@gmail.com', '9874563210', 'M', '1968-03-04', '920483541', NULL, '$2y$10$paZXc6SSL8tP/uM8c56Smu0hNEdKttFwCIJYvn1vWb7M6KvHNenBu', '2', NULL, '2024-05-22 23:15:38', '2024-05-22 23:46:29', NULL),
(60, 'Ravindra Rachin', 'ravindra323@gmail.com', '7896541230', 'Male', '1951-03-05', '920376443', NULL, '$2y$10$t9z5ZiIyF38CKOL5Ip4y8u5hluwHguWjxaOZaoqJci3PS4ckhNbra', '2', NULL, '2024-05-20 04:03:39', '2024-05-20 04:33:38', NULL),
(46, 'Abdul Rehman', 'abdul234@gmail.com', '8745963210', 'Male', '1994-02-06', '919407408', NULL, '$2y$10$jQGVi3sTCv.oEOglAeAsCe6nOX6L4Vg0O/ZfJWnab214MvspoQbIW', '2', NULL, '2024-04-17 04:30:06', '2024-04-17 04:31:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_preference`
--
ALTER TABLE `manage_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website_setting`
--
ALTER TABLE `manage_website_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_shipping_address`
--
ALTER TABLE `patient_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_360589` (`role_id`),
  ADD KEY `permission_id_fk_360589` (`permission_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_template`
--
ALTER TABLE `prescription_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_360598` (`user_id`),
  ADD KEY `role_id_fk_360598` (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manage_preference`
--
ALTER TABLE `manage_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_website_setting`
--
ALTER TABLE `manage_website_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `patient_shipping_address`
--
ALTER TABLE `patient_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `prescription_template`
--
ALTER TABLE `prescription_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
