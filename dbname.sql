-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 06:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baayte`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Baayte', '2019-03-17 17:12:52', '2019-03-17 17:42:00'),
(2, 'address', 'السعودية - الرياض', NULL, '2019-03-19 00:54:35'),
(3, 'phone', '966546589050', NULL, '2019-03-19 00:54:35'),
(4, 'email', 'baayte@info.com', NULL, '2019-03-19 00:54:35'),
(5, 'about_us', '<p style=\"text-align:right\"><span style=\"font-size:17px\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">تعتبر شركة بيتي واحدة من الشركات الرائدة في مجال الإستثمار العقاري و التنمية السياحية ، تقدم الشركة جميع الخدمات العقارية وتشمل شقق سكنية ، فيلات ، عيادات طبية ، مكاتب إدارية ، محلات تجارية ، قري سياحية.</span></span></span></p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:17px\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">نعمل في بيتي علي تلبية&nbsp;إحتياجات سوق العقارات و خدمة العملاء بمختلف شرائحهم بحيث نقدم لعملائنا ما يتوافق مع تطلعاتهم و يحقق أهدافهم من خلال مجموعة من المحترفين من مهندسين و محاسبين و موظفين مختصين لخدمة العملاء ليلا نهارا.</span></span></span></p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:17px\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">نعد عملائنا الكرام بالإحترافية والتكامل و التفاني والإبداع في كل مشروع يحمل إسم بيتي.</span></span></span></p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:17px\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">&nbsp;</span></span></span></p>\r\n\r\n<h3 style=\"text-align:center\"><span style=\"font-size:23px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Bold\">تاريخ بيتي</span></span></span></h3>\r\n\r\n<p dir=\"RTL\" style=\"text-align:right\"><span style=\"font-size:17px\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\"><span style=\"font-size:16pt\"><span style=\"color:#1f5b77\"><span style=\"font-family:Arial,sans-serif\"><img alt=\"\" class=\"pull-left\" src=\"http://landmarkeg.com/images/about2.jpg\" style=\"-webkit-appearance:none; background:transparent; border-radius:0px; border:0px; box-sizing:content-box; color:#1f5b77; float:right; font-family:Conv_GE_SS_Unique_Light; font-size:17px; font-weight:normal; line-height:27px; margin-left:10px; max-width:40%; outline:0px; padding:0px; text-align:right; text-decoration:none\" /></span></span></span><span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">تأسست شركة</span></span></span><span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">&nbsp;بيتي للإستثمار العقارى و التنمية السياحية عام 2013&nbsp;ف</span></span></span><span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">ي مصرو السعودية نتيجة تعاون بين شركة ثري إتش للإنشاءات و التوريدات و التي تأسست عام 2003 وهي شركة متخصصة في مجال التشييد و البناء و التصميم الداخلي و الأثاث و فد قامت بتنفيذ عدة مشاريع بالتجمع الخامس ، و شركة إنتيجريتد سوليوشن للإستثمار و إدارة المشروعات العقارية و التي تأسست عام 2005&nbsp;</span></span></span><span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">وهي</span></span></span>&nbsp;<span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">شركة</span></span></span>&nbsp;<span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">متخصصة</span></span></span>&nbsp;<span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">في</span></span></span><span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">مجال</span></span></span>&nbsp;<span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">الاستثمار العقارى</span></span></span>&nbsp;<span style=\"font-size:17px !important\"><span style=\"color:#1f5b77\"><span style=\"font-family:Conv_GE_SS_Unique_Light\">للمشروعات السكنيه, التجاريه والاداريه و تعتبر واحدة من رواد المستثمرين في مدينة هليوبوليس الجديدة.</span></span></span></span></span></span></p>', NULL, '2019-03-19 01:40:10'),
(6, 'description', '<p>شقق , فيله , مكاتب , تمليك , ايجار</p>', NULL, '2019-03-19 01:41:57'),
(7, 'key_words', '<p>شقق , فيله , مكاتب , تمليك , ايجار</p>', NULL, '2019-03-19 01:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', 1, '2019-03-20 18:05:04', '2019-03-20 18:05:04'),
(2, 'جدة', 1, '2019-03-20 18:05:45', '2019-03-20 18:05:45'),
(3, 'القاهرة', 2, '2019-03-20 18:06:02', '2019-03-20 18:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `file` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `title`, `message`, `file`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'test name', 'test@info.com', 'test title', 'test the first msg from DB to adminPanel and i hope its be secure and success !!', NULL, 1, '2019-03-20 22:00:00', '2019-03-21 14:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'السعودية', NULL, '2019-03-20 16:50:32', '2019-03-20 16:50:32'),
(2, 'مصر', NULL, '2019-03-20 17:16:39', '2019-03-20 17:17:36');

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
(3, '2018_06_26_110013_create_roles_table', 1),
(4, '2018_06_26_110120_create_permissions_table', 1),
(5, '2018_07_01_104552_create_reports_table', 1),
(6, '2018_07_01_123905_create_app_seetings_table', 1),
(7, '2018_07_02_074616_create_socials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

CREATE TABLE `neighborhoods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `title`, `country_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'حي العليا', 1, 1, '2019-03-20 18:24:58', '2019-03-20 18:24:58'),
(2, 'الشرق', 1, 1, '2019-03-20 18:25:17', '2019-03-20 18:25:17'),
(3, 'النور', 1, 1, '2019-03-20 18:25:28', '2019-03-20 18:25:28'),
(4, 'الروابي', 1, 2, '2019-03-20 18:25:53', '2019-03-20 18:25:53'),
(5, 'حي العضيان', 1, 2, '2019-03-20 18:26:10', '2019-03-20 18:26:10'),
(6, 'جاردن سيتي', 2, 3, '2019-03-20 18:27:03', '2019-03-20 18:27:03');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permissions`, `role_id`, `created_at`, `updated_at`) VALUES
(161, 'dashboard', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(162, 'permissionslist', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(163, 'addpermissionspage', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(164, 'addpermission', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(165, 'editpermissionpage', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(166, 'updatepermission', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(167, 'deletepermission', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(168, 'contacts', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(169, 'showcontact', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(170, 'sendcontact', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(171, 'deletecontact', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(172, 'deletecontacts', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(173, 'admins', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(174, 'addadmin', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(175, 'updateadmin', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(176, 'deleteadmin', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(177, 'deleteadmins', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(178, 'users', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(179, 'adduser', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(180, 'updateuser', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(181, 'deleteuser', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(182, 'deleteusers', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(183, 'send-fcm', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(184, 'reports', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(185, 'deletereports', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(186, 'settings', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(187, 'sitesetting', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(188, 'about_us', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(189, 'add-social', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(190, 'update-social', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(191, 'delete-social', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(192, 'SEO', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(193, 'countries', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(194, 'addcountry', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(195, 'updatecountry', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(196, 'deletecountry', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(197, 'deletecountries', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(198, 'cities', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(199, 'addcity', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(200, 'updatecity', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(201, 'deletecity', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(202, 'deletecities', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(203, 'neighborhoods', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(204, 'addneighborhood', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(205, 'updateneighborhood', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(206, 'deleteneighborhood', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24'),
(207, 'deleteneighborhoods', 1, '2019-03-21 13:17:24', '2019-03-21 13:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `event`, `supervisor`, `ip`, `country`, `city`, `area`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'قام baayte admin بتحديث بيانات التطبيق', 1, '::1', '', '', '', 1, '2019-03-17 17:42:05', '2019-03-17 17:42:05'),
(2, 'قام baayte admin بتحديث بيانات التطبيق', 1, '::1', '', '', '', 1, '2019-03-17 17:44:15', '2019-03-17 17:44:15'),
(3, 'قام baayte admin بتعديل بيانات المشرف', 1, '::1', '', '', '', 1, '2019-03-17 18:18:14', '2019-03-17 18:18:14'),
(4, 'قام baayte admin باضافة مشرف جديد', 1, '::1', '', '', '', 1, '2019-03-17 18:19:27', '2019-03-17 18:19:27'),
(5, 'قام baayte admin قام بحذف العديد من المشرفين', 1, '::1', '', '', '', 1, '2019-03-17 18:20:18', '2019-03-17 18:20:18'),
(6, 'قام baayte admin باضافة موقع تواصل جدبد', 1, '::1', '', '', '', 1, '2019-03-17 18:23:39', '2019-03-17 18:23:39'),
(7, 'قام baayte admin بحذف موقع تواصل', 1, '::1', '', '', '', 1, '2019-03-17 18:24:02', '2019-03-17 18:24:02'),
(8, 'قام baayte admin باضافة موقع تواصل جدبد', 1, '::1', '', '', '', 1, '2019-03-17 18:24:15', '2019-03-17 18:24:15'),
(9, 'قام baayte admin بتحديث موقع تواصل', 1, '::1', '', '', '', 1, '2019-03-17 18:24:32', '2019-03-17 18:24:32'),
(10, 'قام baayte admin باضافة موقع تواصل جدبد', 1, '::1', '', '', '', 1, '2019-03-17 18:24:54', '2019-03-17 18:24:54'),
(11, 'قام baayte admin باضافة موقع تواصل جدبد', 1, '::1', '', '', '', 1, '2019-03-17 18:25:20', '2019-03-17 18:25:20'),
(12, 'قام baayte admin بتحديث موقع تواصل', 1, '::1', '', '', '', 1, '2019-03-17 18:26:16', '2019-03-17 18:26:16'),
(13, 'قام baayte admin بتحديث موقع تواصل', 1, '::1', '', '', '', 1, '2019-03-17 18:26:47', '2019-03-17 18:26:47'),
(14, 'قام baayte admin باضافة عضو جديد', 1, '::1', '', '', '', 1, '2019-03-18 23:21:43', '2019-03-18 23:21:43'),
(15, 'قام baayte admin بتعديل بيانات العضو', 1, '::1', '', '', '', 1, '2019-03-19 00:18:34', '2019-03-19 00:18:34'),
(16, 'قام baayte admin بتعديل بيانات العضو', 1, '::1', '', '', '', 1, '2019-03-19 00:19:14', '2019-03-19 00:19:14'),
(17, 'قام baayte admin باضافة عضو جديد', 1, '::1', '', '', '', 1, '2019-03-19 00:20:10', '2019-03-19 00:20:10'),
(18, 'قام baayte admin بتحديث بيانات التطبيق', 1, '::1', '', '', '', 1, '2019-03-19 00:58:08', '2019-03-19 00:58:08'),
(19, 'قام baayte admin بتحديث بيانات من نحن', 1, '::1', '', '', '', 1, '2019-03-19 01:37:59', '2019-03-19 01:37:59'),
(20, 'قام baayte admin بتحديث بيانات من نحن', 1, '::1', '', '', '', 1, '2019-03-19 01:40:11', '2019-03-19 01:40:11'),
(21, 'قام baayte admin بتحديث بيانات ال SEO', 1, '::1', '', '', '', 1, '2019-03-19 01:41:57', '2019-03-19 01:41:57'),
(22, 'قام baayte admin بتحديث بيانات ال SEO', 1, '::1', '', '', '', 1, '2019-03-19 01:42:56', '2019-03-19 01:42:56'),
(23, 'قام baayte admin بتغيير حالة عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:08:52', '2019-03-19 02:08:52'),
(24, 'قام baayte admin بتغيير حالة عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:09:14', '2019-03-19 02:09:14'),
(25, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:11:15', '2019-03-19 02:11:15'),
(26, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:11:27', '2019-03-19 02:11:27'),
(27, 'قام baayte admin بتعديل بيانات العضو', 1, '::1', '', '', '', 1, '2019-03-19 02:12:20', '2019-03-19 02:12:20'),
(28, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:12:42', '2019-03-19 02:12:42'),
(29, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:12:48', '2019-03-19 02:12:48'),
(30, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:45:15', '2019-03-19 02:45:15'),
(31, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:45:16', '2019-03-19 02:45:16'),
(32, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:45:17', '2019-03-19 02:45:17'),
(33, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 02:45:18', '2019-03-19 02:45:18'),
(34, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 09:51:50', '2019-03-19 09:51:50'),
(35, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 09:51:54', '2019-03-19 09:51:54'),
(36, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 09:52:54', '2019-03-19 09:52:54'),
(37, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 09:52:56', '2019-03-19 09:52:56'),
(38, 'قام baayte admin بتعديل بيانات العضو', 1, '::1', '', '', '', 1, '2019-03-19 12:53:13', '2019-03-19 12:53:13'),
(39, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:52', '2019-03-19 14:13:52'),
(40, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:53', '2019-03-19 14:13:53'),
(41, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:54', '2019-03-19 14:13:54'),
(42, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:55', '2019-03-19 14:13:55'),
(43, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:56', '2019-03-19 14:13:56'),
(44, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:56', '2019-03-19 14:13:56'),
(45, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:58', '2019-03-19 14:13:58'),
(46, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:13:58', '2019-03-19 14:13:58'),
(47, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:28:14', '2019-03-19 14:28:14'),
(48, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-19 14:28:15', '2019-03-19 14:28:15'),
(49, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 16:08:35', '2019-03-20 16:08:35'),
(50, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 16:08:36', '2019-03-20 16:08:36'),
(51, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 16:49:37', '2019-03-20 16:49:37'),
(52, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 16:50:33', '2019-03-20 16:50:33'),
(53, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 17:16:39', '2019-03-20 17:16:39'),
(54, 'قام baayte admin بتعديل بيانات البلد', 1, '::1', '', '', '', 1, '2019-03-20 17:17:37', '2019-03-20 17:17:37'),
(55, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 17:18:46', '2019-03-20 17:18:46'),
(56, 'قام baayte admin بحذف بلد', 1, '::1', '', '', '', 1, '2019-03-20 17:18:51', '2019-03-20 17:18:51'),
(57, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 17:18:58', '2019-03-20 17:18:58'),
(58, 'قام baayte admin باضافة بلد جديدة', 1, '::1', '', '', '', 1, '2019-03-20 17:19:02', '2019-03-20 17:19:02'),
(59, 'قام baayte admin قام بحذف العديد من البلاد', 1, '::1', '', '', '', 1, '2019-03-20 17:19:11', '2019-03-20 17:19:11'),
(60, 'قام baayte admin باضافة مدينة جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:05:05', '2019-03-20 18:05:05'),
(61, 'قام baayte admin باضافة مدينة جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:05:46', '2019-03-20 18:05:46'),
(62, 'قام baayte admin باضافة مدينة جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:06:09', '2019-03-20 18:06:09'),
(63, 'قام baayte admin باضافة مدينة جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:06:49', '2019-03-20 18:06:49'),
(64, 'قام baayte admin باضافة مدينة جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:06:57', '2019-03-20 18:06:57'),
(65, 'قام baayte admin بحذف مدينة', 1, '::1', '', '', '', 1, '2019-03-20 18:07:10', '2019-03-20 18:07:10'),
(66, 'قام baayte admin قام بحذف العديد من المدن', 1, '::1', '', '', '', 1, '2019-03-20 18:07:20', '2019-03-20 18:07:20'),
(67, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:25:01', '2019-03-20 18:25:01'),
(68, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:25:18', '2019-03-20 18:25:18'),
(69, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:25:30', '2019-03-20 18:25:30'),
(70, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:25:54', '2019-03-20 18:25:54'),
(71, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:26:11', '2019-03-20 18:26:11'),
(72, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:27:04', '2019-03-20 18:27:04'),
(73, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:27:38', '2019-03-20 18:27:38'),
(74, 'قام baayte admin باضافة حي جديدة', 1, '::1', '', '', '', 1, '2019-03-20 18:27:45', '2019-03-20 18:27:45'),
(75, 'قام baayte admin بحذف حي', 1, '::1', '', '', '', 1, '2019-03-20 18:29:32', '2019-03-20 18:29:32'),
(76, 'قام baayte admin قام بحذف العديد من الأحياء', 1, '::1', '', '', '', 1, '2019-03-20 18:29:43', '2019-03-20 18:29:43'),
(77, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 18:31:56', '2019-03-20 18:31:56'),
(78, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 18:31:58', '2019-03-20 18:31:58'),
(79, 'قام baayte admin بحظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 18:32:13', '2019-03-20 18:32:13'),
(80, 'قام baayte admin بفك حظر عضو', 1, '::1', '', '', '', 1, '2019-03-20 18:32:15', '2019-03-20 18:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'مدير عام', '2019-03-17 17:12:51', '2019-03-17 17:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `site_name`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'facebook', 'http://www.facebook.com', 'facebook', '2019-03-17 18:24:15', '2019-03-17 18:24:15'),
(3, 'twitter', 'http://www.twitter.com', 'twitter', '2019-03-17 18:24:54', '2019-03-17 18:24:54'),
(4, 'instagram', 'http://www.instagram.com', 'instagram', '2019-03-17 18:25:17', '2019-03-17 18:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `active` int(11) NOT NULL DEFAULT '0',
  `checked` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '0',
  `lat` decimal(16,14) DEFAULT NULL,
  `lng` decimal(16,14) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `code`, `avatar`, `active`, `checked`, `role`, `lat`, `lng`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'baayte admin', 'baayte@info.com', '$2y$10$kLLhhBgfoVpSVDjypHUV9e.yHcyLnrBsPAhD1W29CIWI5uKmUOClW', '96612345678', NULL, 'default.png', 1, 1, 1, NULL, NULL, 'L3jUCOuLBnbdemWmJBvNLe80abpeqG1lO9CkBoQYqVt67wNgylwXbmrfqUFe', '2019-03-16 22:00:00', '2019-03-17 18:18:05'),
(2, 'AbdelRahman', 'ar@info.com', '$2y$10$oO5VuNplWTQnzxmO2VTcfeBKozPe.LqqkGme9W7LaZl1qPda1ilJO', '9661020304050', NULL, '5c906c22c799f-1552968738-Tfo3v9ZhBG.png', 0, 1, 0, '31.03118842422393', '31.38820465204185', NULL, '2019-03-18 23:21:42', '2019-03-20 18:32:14'),
(3, 'test', 'test@info.com', '$2y$10$TJ0Or1gkzAa5lStP/3WcmOiQpIr3DXQULyQp2f14XME2HmRBI3Z4u', '96610001000', NULL, '5c9051da0f9bd-1552962010-Spzn0VNXfd.png', 0, 0, 0, '24.00076936861831', '46.99249404963916', NULL, '2019-03-19 00:20:10', '2019-03-19 14:13:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD CONSTRAINT `neighborhoods_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `neighborhoods_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
