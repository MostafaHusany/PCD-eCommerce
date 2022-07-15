-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 11:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcd_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `first_name`, `last_name`, `phone`, `city`, `state`, `address`, `zipcode`, `address_details`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'Mostafa', 'Hazem', '01063200201', 'Giza', 'Giza', 'cairo', 'mostafa@goo.com', NULL, 1, '2022-04-04 10:34:21', '2022-04-04 10:34:21'),
(2, 'Mostafa', 'Hazem', '01063200203', 'Cairo', '1234', 'Cairo', '12234', NULL, 2, '2022-04-06 11:23:10', '2022-04-06 11:23:10'),
(3, 'Mostafa', 'Hazem', '010623010011', 'giza', '1232', 'giza', '1232', NULL, 4, '2022-04-06 17:15:34', '2022-04-06 17:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'asdasdas', 'asdasd', 'dasd', 'storage/brands/ndnCx26wtYVs2acejCFxkXRievadxouoDtlapJLc.png', '2022-05-01 08:22:56', '2022-05-01 08:22:56'),
(2, 'علامة تجارية 101', 'Brand 101', 'علامة تجارية 101', 'Brand 101', 'storage/brands/yHAPh75O2AJYnfr2hVtLkWbk100xEL8tFPh8l6I1.jpg', '2022-05-02 15:52:25', '2022-05-02 15:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_attributes`
--

INSERT INTO `category_attributes` (`id`, `created_at`, `updated_at`, `title`, `type`, `meta`, `category_id`) VALUES
(3, NULL, NULL, 'n njkn', 'number', '{\"number\":{\"field_number_from\":\"3\",\"field_number_to\":\"4\",\"field_number_metric\":\"sdas\"}}', 46),
(4, NULL, NULL, 'asdasd', 'options', '{\"options\":[\"asdas\",\"sss\",\"ssa\"]}', 46),
(5, NULL, NULL, 'aas', 'options', '{\"options\":[\"sss\",\"aaa\",\"sxxx\"]}', 46),
(8, NULL, NULL, 'screen size', 'options', '{\"options\":[\"15 inch\",\"21inc\",\"20inc\"]}', 36),
(9, NULL, NULL, 'type', 'options', '{\"options\":[\"lcd\",\"led\"]}', 36),
(10, NULL, NULL, 'size', 'number', '{\"number\":{\"field_number_from\":\"10\",\"field_number_to\":\"50\",\"field_number_metric\":\"inc\"}}', 36),
(18, NULL, NULL, 'size', 'number', '{\"number\":{\"field_number_from\":\"100\",\"field_number_to\":\"1500\",\"field_number_metric\":\"inc\"}}', 41),
(19, NULL, NULL, 'type', 'options', '{\"options\":[\"option1\",\"option2\"]}', 41),
(30, NULL, '2022-06-21 13:31:35', 'f1', 'options', '{\"options\":[\"val 1\",\"val 2\",\"val 3\"]}', 49),
(32, NULL, '2022-06-21 13:28:12', 'f3', 'number', '{\"number\":{\"field_number_from\":\"9\",\"field_number_to\":\"101\",\"field_number_metric\":\"inch\"}}', 49),
(33, NULL, NULL, 'المعالج', 'options', '{\"options\":[\"amd\",\"intel\"]}', 1),
(35, NULL, NULL, 'size', 'number', '{\"number\":{\"field_number_from\":\"10\",\"field_number_to\":\"100\",\"field_number_metric\":\"inc\"}}', 1),
(39, NULL, NULL, 'f0', 'options', '{\"options\":[\"test 1\",\"test 2\"]}', 49),
(41, NULL, NULL, 'test 1', 'options', '{\"options\":[\"val 1\",\"val 2\",\"val 3\"]}', 40),
(42, NULL, NULL, 'test 2', 'number', '{\"number\":{\"field_number_from\":\"22\",\"field_number_to\":\"100\",\"field_number_metric\":\"metr\"}}', 40),
(43, NULL, NULL, 'test w', 'options', '{\"options\":[\"val 1\",\"val 2\",\"val 3\"]}', 1),
(44, NULL, NULL, 'test', 'number', '{\"number\":{\"field_number_from\":\"10\",\"field_number_to\":\"22\",\"field_number_metric\":\"ss\"}}', 1),
(45, NULL, NULL, 'g1', 'options', '{\"options\":[\"val 1\",\"val 2\",\"val3\"]}', 50),
(46, NULL, NULL, 'g2', 'number', '{\"number\":{\"field_number_from\":\"12\",\"field_number_to\":\"23\",\"field_number_metric\":\"hn\"}}', 50),
(47, NULL, NULL, 'vvv', 'options', '{\"options\":[]}', 50),
(48, NULL, NULL, 'wewe', 'options', '{\"options\":[\"rferw\",\"erwer\"]}', 48),
(49, NULL, NULL, 'wewe2', 'number', '{\"number\":{\"field_number_from\":\"1\",\"field_number_to\":\"30\",\"field_number_metric\":\"inch\"}}', 48);

-- --------------------------------------------------------

--
-- Table structure for table `category_brands`
--

CREATE TABLE `category_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_brands`
--

INSERT INTO `category_brands` (`id`, `created_at`, `updated_at`, `category_id`, `brand_id`) VALUES
(1, NULL, NULL, 46, 1),
(2, NULL, NULL, 46, 2),
(3, NULL, NULL, 47, 1),
(4, NULL, NULL, 47, 2),
(5, NULL, NULL, 48, 1),
(6, NULL, NULL, 48, 2),
(7, NULL, NULL, 49, 1),
(8, NULL, NULL, 49, 2),
(9, NULL, NULL, 1, 2),
(10, NULL, NULL, 1, 1),
(12, NULL, NULL, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `composite_product_products`
--

CREATE TABLE `composite_product_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `composite_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `composite_product_products`
--

INSERT INTO `composite_product_products` (`id`, `composite_product_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2003, 851, NULL, NULL),
(5, 2004, 303, NULL, NULL),
(7, 2019, 3, NULL, NULL),
(8, 2019, 5, NULL, NULL),
(9, 2019, 52, NULL, NULL),
(10, 2019, 2000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gove_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `plain_password`, `meta`, `user_id`, `phone_code`, `gove_id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'أ.مصطفي', 'admin@goo.com', '01063200201', 'PCD', '123456', NULL, 1, NULL, NULL, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(2, 'MostafaHazem', 'mostafa_3@goo.com', '01063200203', 'Cairo', '12345678', NULL, 2, NULL, NULL, NULL, '2022-04-06 11:23:09', '2022-04-06 11:23:09'),
(3, 'أ.Hazem', 'mostafa_6@goo.com', '+966121134123123123', 'njnkjnkjnkjnjkn', '123456', NULL, 3, NULL, NULL, NULL, '2022-04-06 16:37:56', '2022-04-06 16:37:56'),
(4, 'MostafaHazem', 'mostafa_7@goo.com', '010623010011', 'giza', '12345678', NULL, 4, NULL, NULL, NULL, '2022-04-06 17:15:34', '2022-04-06 17:15:34'),
(5, 'user 5', 'user_5@goo.com', '01063200201', 'Demo', '000', NULL, 9, NULL, NULL, NULL, '2022-04-27 02:27:02', '2022-04-27 02:27:02'),
(6, 'User 101', 'user_101@goo.com', '010101', 'Demo', '000', NULL, 11, NULL, NULL, NULL, '2022-04-29 02:58:20', '2022-04-29 02:58:20'),
(7, 'user 102', 'user_102@gmail.com', '010102', 'Demo', '000', NULL, 12, NULL, NULL, NULL, '2022-04-29 03:54:05', '2022-04-29 03:54:05'),
(8, 'user 1', 'user_1@goo.com', '01063200201', 'Demo', '000', NULL, 5, NULL, NULL, NULL, '2022-04-30 19:41:11', '2022-04-30 19:41:11'),
(9, 'user 6', 'user_6@goo.com', '0106300301', 'Demo', '000', NULL, 13, NULL, NULL, NULL, '2022-04-30 22:11:50', '2022-04-30 22:11:50'),
(10, 'user_7', 'user_7@goo.com', '010400400', 'Demo', '000', NULL, 14, NULL, NULL, NULL, '2022-04-30 23:32:50', '2022-04-30 23:32:50'),
(11, 'user_8', 'user_8@goo.com', '0105300300', 'Demo', '000', NULL, 15, NULL, NULL, NULL, '2022-05-01 00:19:51', '2022-05-01 00:19:51'),
(12, 'user_9', 'user_9@goo.com', '01098889888', 'Demo', '000', NULL, 16, NULL, NULL, NULL, '2022-05-01 05:44:15', '2022-05-01 05:44:15'),
(13, 'user_10', 'user_10@goo.com', '010900900', 'Demo', '000', NULL, 17, NULL, NULL, NULL, '2022-05-01 05:45:04', '2022-05-01 05:45:04'),
(14, 'user_11', 'user_11@goo.com', '010900901', 'Demo', '000', NULL, 18, NULL, NULL, NULL, '2022-05-01 05:49:20', '2022-05-01 05:49:20'),
(15, 'user_12', 'user_12@goo.com', '010900900', 'Demo', '000', NULL, 19, NULL, NULL, NULL, '2022-05-01 06:03:28', '2022-05-01 06:03:28'),
(16, 'مصطفي حازم السيد', 'mostafa.husany@gmail.com', '+966090909090', 'الشارع الجمب البيت', '123456', NULL, 20, NULL, NULL, NULL, '2022-05-08 01:02:59', '2022-05-08 01:13:10'),
(17, 'Mostafa', 'mostafa@goo.com', '01087999999', 'asdasdasdasd', '123456', NULL, 21, NULL, NULL, NULL, '2022-05-08 20:56:25', '2022-05-08 20:56:25'),
(18, 'mohamad_10', 'mohamad_11@goo.com', '01063200211', 'sjkadnjkasbnd', '123456', NULL, 24, NULL, NULL, NULL, '2022-05-08 22:20:28', '2022-05-08 22:24:59'),
(20, 'Test 2', 'test_311@goo.com', '0109889988', '....', '$2y$10$gUSUyyzpnLi1acoz63h.Ruj/ABfRLP51AFk2.sBaasmEhC/hUOE4G', NULL, 37, NULL, NULL, NULL, '2022-05-09 06:59:38', '2022-05-09 06:59:38'),
(21, 'Test 2', 'test_11@goo.com', '0109889188', '....', '$2y$10$7v6aPlEeUQ4PiDE2M4wHMuSnRqw.H2ybEoKaVaRgVlMI67MlEt3M6', NULL, 38, NULL, 8, 1, '2022-05-09 07:57:42', '2022-05-09 07:57:42'),
(22, 'Test 2', 'test_13@goo.com', '0109889108', '....', '$2y$10$rANmXG.Ny1xOA5MeViVmc.OBYeYUALz2eZW4MsTgJuP08mvegLxp6', NULL, 40, NULL, 8, 1, '2022-06-23 10:47:57', '2022-06-23 10:47:57'),
(24, 'Test 2', 'test_14@goo.com', '0108888108', '....', '$2y$10$uI4hl585By1b5pA838cLyOFC4NR477u0XOgQa1oVDCbo5ZSW8seMO', NULL, 42, NULL, 8, 1, '2022-06-23 12:01:16', '2022-06-23 12:01:16'),
(26, 'Test 3', 'test_15@goo.com', '0108888000', '....', '$2y$10$jRLmvk5YT3Xm77mlOAvS1uCMe1uTdmQP/5W1.rXzayN67Vrf7aMDK', NULL, 44, NULL, 8, 1, '2022-06-23 12:27:55', '2022-06-23 12:27:55'),
(27, 'Test 3', 'test_16@goo.com', '0108888001', '....', '$2y$10$fTtN5n.TQzJ.SAaDyfd5V.CBtF8f5YD8ZbR8cM6R5hFwu/od.JxAG', NULL, 45, NULL, 8, 1, '2022-06-25 17:43:55', '2022-06-25 17:43:55'),
(28, 'Test 3', 'test_17@goo.com', '0108888002', '....', '$2y$10$Cmj0SSC.czaZfVSSAKSh9uczLxKMWk1L2/g0orcKdwXnOGnxhFieK', NULL, 46, NULL, 8, 1, '2022-06-25 17:52:14', '2022-06-25 17:52:14'),
(29, 'Test 3', NULL, '0108888005', NULL, '$2y$10$s47C0dnBd4SfCnvOmmF8gODAEltQa9gzShchSSrjYAhG77qYGK9Ei', NULL, 49, NULL, NULL, NULL, '2022-06-26 20:37:19', '2022-06-26 20:37:19'),
(30, 'Test 3', NULL, '0108888205', NULL, '$2y$10$Dwn.qGXcnF6YAvhJlqiBdeVRBFLKKqx0HAl./9BvkB0YevaHdz.Dq', NULL, 50, NULL, NULL, NULL, '2022-06-26 21:54:36', '2022-06-26 21:54:36'),
(31, 'Test 4', NULL, '0108888206', 'جمب البيت', '123456', NULL, 51, NULL, 8, 1, '2022-06-26 21:56:31', '2022-06-26 23:24:30'),
(32, 'Test 3', 'nermeen.hazem100@gmail.com', '0108118206', '....', '123456', NULL, 52, '+20', 8, 1, '2022-07-09 17:09:47', '2022-07-09 19:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gove',
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `created_at`, `updated_at`, `name`, `type`, `phone_code`, `flag`, `is_active`, `district_id`) VALUES
(1, '2022-05-08 20:20:29', '2022-05-08 20:20:29', 'مصر', 'country', '+20', NULL, 1, NULL),
(8, NULL, NULL, 'القاهرة', 'gove', NULL, NULL, 1, 1),
(9, NULL, NULL, 'الجيزة', 'gove', NULL, NULL, 1, 1),
(10, NULL, NULL, 'اصوان', 'gove', NULL, NULL, 1, 1),
(11, NULL, NULL, 'الاسكندرية', 'gove', NULL, NULL, 1, 1),
(12, '2022-05-08 20:24:24', '2022-05-08 20:24:24', 'السعودية', 'country', '+966', NULL, 1, NULL),
(13, NULL, NULL, 'جدة', 'gove', NULL, NULL, 1, 12),
(14, NULL, NULL, 'المدينة المنورة', 'gove', NULL, NULL, 1, 12),
(15, NULL, NULL, 'مكة المكرمة', 'gove', NULL, NULL, 1, 12);

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `cost_type` tinyint(4) NOT NULL DEFAULT 0,
  `is_fixed` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `free_on_cost_above` double(8,2) DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `created_at`, `updated_at`, `title`, `description`, `cost`, `cost_type`, `is_fixed`, `is_active`, `free_on_cost_above`, `meta`) VALUES
(1, '2022-05-02 04:28:56', '2022-05-02 04:28:59', 'fee 1', 'some info ...', 1.00, 0, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_sections_products`
--

CREATE TABLE `home_sections_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `theme_settings_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sections_products`
--

INSERT INTO `home_sections_products` (`id`, `created_at`, `updated_at`, `product_id`, `theme_settings_id`) VALUES
(35, NULL, NULL, 3, 64),
(36, NULL, NULL, 5, 64),
(37, NULL, NULL, 7, 64),
(38, NULL, NULL, 10, 65),
(39, NULL, NULL, 3, 66),
(40, NULL, NULL, 5, 66);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `fee` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `shipping` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting_payment',
  `trasnaction_imge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_refuse_count` tinyint(4) NOT NULL DEFAULT 0,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `created_at`, `updated_at`, `sub_total`, `fee`, `tax`, `shipping`, `total`, `status`, `trasnaction_imge`, `payment_refuse_count`, `order_id`) VALUES
(54, '2022-07-09 14:57:36', '2022-07-09 14:57:36', 495.00, 0.00, 0.00, 1.00, 496.00, 'waiting_payment', NULL, 0, 82),
(55, '2022-07-09 15:00:08', '2022-07-09 15:00:08', 423.00, 0.00, 0.00, 1.00, 424.00, 'waiting_payment', NULL, 0, 83),
(57, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1826.00, 18.26, 0.00, 0.00, 1845.26, 'waiting_payment', NULL, 0, 85),
(58, '2022-07-10 05:46:27', '2022-07-10 05:46:27', 452.00, 0.00, 0.00, 1.00, 453.00, 'waiting_payment', NULL, 0, 86),
(59, '2022-07-10 05:53:53', '2022-07-10 06:56:24', 1826.00, 18.26, 0.00, 0.00, 1845.26, 'check_payment_transaction', 'storage/payment_file144-1657443384.jpg', 0, 87);

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
(4, '2021_12_27_153541_create_customers_table', 1),
(5, '2021_12_28_142350_create_product_categories_table', 1),
(6, '2021_12_28_183541_create_products_table', 1),
(7, '2021_12_29_035706_create_r_category_products_table', 1),
(8, '2022_01_01_113058_add_phase_2_columns_to_products_table', 1),
(9, '2022_01_01_151733_create_composite_product_products_table', 1),
(10, '2022_01_02_222050_create_orders_table', 1),
(11, '2022_01_02_222123_create_order_products_table', 1),
(12, '2022_01_12_151737_add_reserved_quantity_to_products_table', 1),
(13, '2022_01_14_100342_add_status_to_order_products_table', 1),
(14, '2022_01_23_031513_create_shippings_table', 1),
(15, '2022_01_23_151713_add_shipping_columns_to_orders_table', 1),
(16, '2022_01_24_125536_create_taxes_table', 1),
(17, '2022_01_25_182254_create_fees_table', 1),
(18, '2022_02_10_100023_create_category_attributes_table', 1),
(19, '2022_02_11_174728_create_product_custome_fields_table', 1),
(20, '2022_02_18_182459_add_is_free_taxes_for_shipping_table', 1),
(21, '2022_02_20_182741_create_favorites_table', 1),
(22, '2022_02_23_181639_create_brands_table', 1),
(23, '2022_02_26_164056_add_brand_id_to_products_table', 1),
(24, '2022_02_27_132634_add_texs_fess_columns_to_orders_table', 1),
(25, '2022_03_12_171436_create_addresses_table', 1),
(26, '2022_03_13_185239_add_address_id_to_orders_table', 1),
(27, '2022_03_13_200954_create_payments_table', 1),
(28, '2022_03_17_151538_create_invoices_table', 1),
(29, '2022_03_21_143412_create_promotions_table', 1),
(30, '2022_03_21_152009_create_product_promotions_table', 1),
(31, '2022_03_23_135126_create_promo_codes_table', 1),
(32, '2022_03_25_234203_add_slug_logo_is_nav_to_product_categories_table', 1),
(33, '2022_03_26_191536_add_promo_code_id_to_orders_table', 1),
(37, '2022_04_02_020531_create_order_statuses_table', 2),
(38, '2022_04_05_013132_laratrust_setup_tables', 3),
(40, '2022_05_04_180008_create_category_brands_table', 4),
(41, '2022_05_06_202257_drop_first_second_name_of_cutomers_table', 5),
(47, '2022_05_08_033610_create_districts_table', 6),
(57, '2022_05_08_230154_add_country_gove_relation_to_customers_table', 7),
(58, '2022_05_09_055059_add_country_gov_address_column_to_orders_table', 7),
(65, '2022_06_10_142419_create_r_u_category_products_table', 8),
(66, '2022_06_10_142822_create_r_u_product_categories_table', 8),
(67, '2022_06_21_161435_add_is_active_column_to_categories', 9),
(69, '2022_06_23_115903_create_v_customer_phones_table', 10),
(70, '2022_06_23_153106_add_storage_quantity_for_products', 11),
(72, '2022_06_26_021405_create_theme_settings_table', 12),
(73, '2022_07_02_150846_create_home_sections_products_table', 13),
(76, '2022_07_04_150415_add_child_and_parent_relation_to_order_product_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL DEFAULT 0.00,
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gove_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_cost` double(8,2) NOT NULL DEFAULT 0.00,
  `is_free_shipping` tinyint(4) NOT NULL DEFAULT 0,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taxe` double(8,2) NOT NULL DEFAULT 0.00,
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `promo_code_discount` double(8,2) DEFAULT NULL,
  `promo_code_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `note`, `meta`, `sub_total`, `total`, `code`, `customer_id`, `gove_id`, `country_id`, `address`, `created_at`, `updated_at`, `shipping_cost`, `is_free_shipping`, `shipping_id`, `taxe`, `fee`, `address_id`, `promo_code_discount`, `promo_code_id`) VALUES
(82, -1, NULL, '{\"products_id\":[\"301\"],\"products_quantity\":{\"301\":{\"quantity\":1,\"price\":495}},\"products_prices\":{\"301\":495},\"restored_quantity\":{\"301\":1},\"taxes\":[],\"fees\":[]}', 0.00, 0.00, 'cs-1657385856', 5, NULL, NULL, 'Demo', '2022-07-09 14:57:36', '2022-07-09 14:58:05', 0.00, 0, 1, 0.00, 0.00, NULL, NULL, NULL),
(83, 0, NULL, '{\"products_id\":[\"7\"],\"products_quantity\":{\"7\":{\"quantity\":1,\"price\":423}},\"products_prices\":{\"7\":423},\"restored_quantity\":{\"7\":0},\"taxes\":[],\"fees\":[]}', 423.00, 424.00, 'cs-1657386008', 6, NULL, NULL, 'Demo', '2022-07-09 15:00:08', '2022-07-09 18:06:07', 1.00, 0, 1, 0.00, 0.00, NULL, NULL, NULL),
(85, 0, NULL, '{\"products_id\":[202,201],\"products_quantity\":{\"202\":{\"quantity\":2,\"price\":367},\"201\":{\"quantity\":3,\"price\":364}},\"products_prices\":{\"201\":364,\"202\":367},\"restored_quantity\":{\"201\":0,\"202\":0},\"taxes\":[],\"fees\":[{\"id\":1,\"title\":\"fee 1\",\"cost\":1,\"is_fixed\":0,\"cost_type\":0,\"fee_total\":18.26,\"is_active\":1}]}', 1826.00, 1845.26, 'cs-1657401518', 32, 8, 1, '....', '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1.00, 1, 1, 0.00, 18.26, NULL, NULL, NULL),
(86, 0, NULL, '{\"products_id\":[\"302\"],\"products_quantity\":{\"302\":{\"quantity\":1,\"price\":452}},\"products_prices\":{\"302\":452},\"restored_quantity\":{\"302\":0},\"taxes\":[],\"fees\":[]}', 452.00, 453.00, 'cs-1657439187', 1, NULL, NULL, 'PCD', '2022-07-10 05:46:27', '2022-07-10 05:46:27', 1.00, 0, 1, 0.00, 0.00, NULL, NULL, NULL),
(87, 0, NULL, '{\"products_id\":[202,201],\"products_quantity\":{\"202\":{\"quantity\":2,\"price\":367},\"201\":{\"quantity\":3,\"price\":364}},\"products_prices\":{\"201\":364,\"202\":367},\"restored_quantity\":{\"201\":0,\"202\":0},\"taxes\":[],\"fees\":[{\"id\":1,\"title\":\"fee 1\",\"cost\":1,\"is_fixed\":0,\"cost_type\":0,\"fee_total\":18.26,\"is_active\":1}]}', 1826.00, 1845.26, 'cs-1657439633', 32, 8, 1, '....', '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1.00, 1, 1, 0.00, 18.26, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_when_order` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_child` tinyint(4) NOT NULL DEFAULT 0,
  `parent_product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `code`, `ar_name`, `en_name`, `sku`, `price_when_order`, `created_at`, `updated_at`, `status`, `is_child`, `parent_product_id`) VALUES
(127, 82, 301, 'cs-1657385856', 'تتجميعات مع كرت  RX 0', 'Custom PCs with AMD 0', '6486676092', 495.00, '2022-07-09 14:57:36', '2022-07-09 14:58:05', 0, 0, NULL),
(135, 83, 7, 'cs-1657386008', 'التجميعات الاحترافية 6', 'Professional collections 6', '7910315496', 423.00, '2022-07-09 15:00:08', '2022-07-09 18:06:07', 1, 0, NULL),
(142, 85, 201, 'cs-1657401518', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1, 0, NULL),
(143, 85, 201, 'cs-1657401518', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1, 0, NULL),
(144, 85, 201, 'cs-1657401518', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1, 0, NULL),
(145, 85, 202, 'cs-1657401518', 'تجميعات مع كرت RTX30XX 1', 'PC GAMING WITH RTX30XX 1', '4648403507', 367.00, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1, 0, NULL),
(146, 85, 202, 'cs-1657401518', 'تجميعات مع كرت RTX30XX 1', 'PC GAMING WITH RTX30XX 1', '4648403507', 367.00, '2022-07-09 19:18:38', '2022-07-09 19:18:38', 1, 0, NULL),
(147, 86, 302, 'cs-1657439187', 'تتجميعات مع كرت  RX 1', 'Custom PCs with AMD 1', '1615332449', 452.00, '2022-07-10 05:46:27', '2022-07-10 05:46:27', 1, 0, NULL),
(148, 87, 201, 'cs-1657439633', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1, 0, NULL),
(149, 87, 201, 'cs-1657439633', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1, 0, NULL),
(150, 87, 201, 'cs-1657439633', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 364.00, '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1, 0, NULL),
(151, 87, 202, 'cs-1657439633', 'تجميعات مع كرت RTX30XX 1', 'PC GAMING WITH RTX30XX 1', '4648403507', 367.00, '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1, 0, NULL),
(152, 87, 202, 'cs-1657439633', 'تجميعات مع كرت RTX30XX 1', 'PC GAMING WITH RTX30XX 1', '4648403507', 367.00, '2022-07-10 05:53:53', '2022-07-10 05:53:53', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_main` tinyint(4) NOT NULL DEFAULT 0,
  `status_code` tinyint(4) NOT NULL,
  `status_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#444'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `created_at`, `updated_at`, `is_main`, `status_code`, `status_name_en`, `status_name_ar`, `color`) VALUES
(1, NULL, NULL, 1, -1, 'restored', 'مرتجع', '#f00'),
(2, NULL, NULL, 1, 0, 'waiting', 'انتظار', '#444'),
(3, '2022-04-04 21:02:00', '2022-04-04 21:06:13', 0, 3, 'preparing', 'اعداد', '#5a2acb'),
(4, '2022-04-06 11:32:57', '2022-04-06 11:32:57', 0, 4, 'shipping', 'الشحن', '#fff700'),
(5, '2022-04-06 17:03:35', '2022-04-06 17:03:35', 0, 6, 'diliverde', 'مستلم', '#11fa00'),
(6, '2022-05-02 05:01:17', '2022-05-02 06:11:10', 0, 1, 'lkmlkmlkm', 'اختباري', '#000000');

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
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Accepted','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(41, 'users_add', 'add users', NULL, NULL, NULL),
(42, 'users_edit', 'edit users', NULL, NULL, NULL),
(43, 'users_show', 'show users', NULL, NULL, NULL),
(44, 'users_delete', 'delete users', NULL, NULL, NULL),
(45, 'customers_add', 'add customers', NULL, NULL, NULL),
(46, 'customers_edit', 'edit customers', NULL, NULL, NULL),
(47, 'customers_show', 'show customers', NULL, NULL, NULL),
(48, 'customers_delete', 'delete customers', NULL, NULL, NULL),
(49, 'products-categories_add', 'add products-categories', NULL, NULL, NULL),
(50, 'products-categories_edit', 'edit products-categories', NULL, NULL, NULL),
(51, 'products-categories_show', 'show products-categories', NULL, NULL, NULL),
(52, 'products-categories_delete', 'delete products-categories', NULL, NULL, NULL),
(53, 'brands_add', 'add brands', NULL, NULL, NULL),
(54, 'brands_edit', 'edit brands', NULL, NULL, NULL),
(55, 'brands_show', 'show brands', NULL, NULL, NULL),
(56, 'brands_delete', 'delete brands', NULL, NULL, NULL),
(57, 'products_add', 'add products', NULL, NULL, NULL),
(58, 'products_edit', 'edit products', NULL, NULL, NULL),
(59, 'products_show', 'show products', NULL, NULL, NULL),
(60, 'products_delete', 'delete products', NULL, NULL, NULL),
(61, 'sold_products_add', 'add sold_products', NULL, NULL, NULL),
(62, 'sold_products_edit', 'edit sold_products', NULL, NULL, NULL),
(63, 'sold_products_show', 'show sold_products', NULL, NULL, NULL),
(64, 'sold_products_delete', 'delete sold_products', NULL, NULL, NULL),
(65, 'orders_add', 'add orders', NULL, NULL, NULL),
(66, 'orders_edit', 'edit orders', NULL, NULL, NULL),
(67, 'orders_show', 'show orders', NULL, NULL, NULL),
(68, 'orders_delete', 'delete orders', NULL, NULL, NULL),
(69, 'promotions_add', 'add promotions', NULL, NULL, NULL),
(70, 'promotions_edit', 'edit promotions', NULL, NULL, NULL),
(71, 'promotions_show', 'show promotions', NULL, NULL, NULL),
(72, 'promotions_delete', 'delete promotions', NULL, NULL, NULL),
(73, 'promo_add', 'add promo', NULL, NULL, NULL),
(74, 'promo_edit', 'edit promo', NULL, NULL, NULL),
(75, 'promo_show', 'show promo', NULL, NULL, NULL),
(76, 'promo_delete', 'delete promo', NULL, NULL, NULL),
(77, 'shipping_add', 'add shipping', NULL, NULL, NULL),
(78, 'shipping_edit', 'edit shipping', NULL, NULL, NULL),
(79, 'shipping_show', 'show shipping', NULL, NULL, NULL),
(80, 'shipping_delete', 'delete shipping', NULL, NULL, NULL),
(81, 'fees_add', 'add fees', NULL, NULL, NULL),
(82, 'fees_edit', 'edit fees', NULL, NULL, NULL),
(83, 'fees_show', 'show fees', NULL, NULL, NULL),
(84, 'fees_delete', 'delete fees', NULL, NULL, NULL),
(85, 'taxes_add', 'add taxes', NULL, NULL, NULL),
(86, 'taxes_edit', 'edit taxes', NULL, NULL, NULL),
(87, 'taxes_show', 'show taxes', NULL, NULL, NULL),
(88, 'taxes_delete', 'delete taxes', NULL, NULL, NULL),
(89, 'order_status_add', 'add order_status', NULL, NULL, NULL),
(90, 'order_status_edit', 'edit order_status', NULL, NULL, NULL),
(91, 'order_status_show', 'show order_status', NULL, NULL, NULL),
(92, 'order_status_delete', 'delete order_status', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(65, 15, 'App\\User'),
(66, 15, 'App\\User'),
(68, 15, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_small_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_small_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT 10,
  `price` double(8,2) NOT NULL,
  `price_after_sale` double(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT 0,
  `is_composite` smallint(6) NOT NULL DEFAULT 0,
  `reserved_quantity` smallint(6) NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `storage_quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(2, 'التجميعات الاحترافية 1', 'التجميعات الاحترافية 1', 'التجميعات الاحترافية 1', 'Professional collections 1', 'Professional collections 1', 'Professional collections 1', '7949885808', 'Professional collections 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 198.00, 190.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(3, 'التجميعات الاحترافية 2', 'التجميعات الاحترافية 2', 'التجميعات الاحترافية 2', 'Professional collections 2', 'Professional collections 2', 'Professional collections 2', '951912208', 'Professional collections 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 397.00, 381.00, NULL, '2022-04-04 10:32:01', '2022-07-08 22:45:19', 1, 0, 12, NULL, 0),
(5, 'التجميعات الاحترافية 4', 'التجميعات الاحترافية 4', 'التجميعات الاحترافية 4', 'Professional collections 4', 'Professional collections 4', 'Professional collections 4', '7944772802', 'Professional collections 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 201.00, 391.00, NULL, '2022-04-04 10:32:01', '2022-07-08 22:45:19', 1, 0, 12, NULL, 0),
(6, 'التجميعات الاحترافية 5', 'التجميعات الاحترافية 5', 'التجميعات الاحترافية 5', 'Professional collections 5', 'Professional collections 5', 'Professional collections 5', '5270088507', 'Professional collections 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 107.00, 359.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(7, 'التجميعات الاحترافية 6', 'التجميعات الاحترافية 6', 'التجميعات الاحترافية 6', 'Professional collections 6', 'Professional collections 6', 'Professional collections 6', '7910315496', 'Professional collections 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 423.00, 202.00, NULL, '2022-04-04 10:32:01', '2022-07-09 18:06:07', 1, 0, 0, NULL, 0),
(8, 'التجميعات الاحترافية 7', 'التجميعات الاحترافية 7', 'التجميعات الاحترافية 7', 'Professional collections 7', 'Professional collections 7', 'Professional collections 7', '5550108720', 'Professional collections 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 289.00, 213.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(9, 'التجميعات الاحترافية 8', 'التجميعات الاحترافية 8', 'التجميعات الاحترافية 8', 'Professional collections 8', 'Professional collections 8', 'Professional collections 8', '9532168983', 'Professional collections 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 246.00, 262.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(10, 'التجميعات الاحترافية 9', 'التجميعات الاحترافية 9', 'التجميعات الاحترافية 9', 'Professional collections 9', 'Professional collections 9', 'Professional collections 9', '6327385374', 'Professional collections 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 106.00, 363.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(11, 'التجميعات الاحترافية 10', 'التجميعات الاحترافية 10', 'التجميعات الاحترافية 10', 'Professional collections 10', 'Professional collections 10', 'Professional collections 10', '6946083533', 'Professional collections 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 138.00, 242.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(12, 'التجميعات الاحترافية 11', 'التجميعات الاحترافية 11', 'التجميعات الاحترافية 11', 'Professional collections 11', 'Professional collections 11', 'Professional collections 11', '3212275660', 'Professional collections 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 291.00, 55.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(13, 'التجميعات الاحترافية 12', 'التجميعات الاحترافية 12', 'التجميعات الاحترافية 12', 'Professional collections 12', 'Professional collections 12', 'Professional collections 12', '4277680557', 'Professional collections 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 426.00, 268.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(14, 'التجميعات الاحترافية 13', 'التجميعات الاحترافية 13', 'التجميعات الاحترافية 13', 'Professional collections 13', 'Professional collections 13', 'Professional collections 13', '6770657476', 'Professional collections 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 444.00, 361.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(15, 'التجميعات الاحترافية 14', 'التجميعات الاحترافية 14', 'التجميعات الاحترافية 14', 'Professional collections 14', 'Professional collections 14', 'Professional collections 14', '5377665744', 'Professional collections 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 195.00, 163.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(16, 'التجميعات الاحترافية 15', 'التجميعات الاحترافية 15', 'التجميعات الاحترافية 15', 'Professional collections 15', 'Professional collections 15', 'Professional collections 15', '9642307761', 'Professional collections 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 483.00, 220.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(17, 'التجميعات الاحترافية 16', 'التجميعات الاحترافية 16', 'التجميعات الاحترافية 16', 'Professional collections 16', 'Professional collections 16', 'Professional collections 16', '5571295452', 'Professional collections 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 117.00, 122.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(18, 'التجميعات الاحترافية 17', 'التجميعات الاحترافية 17', 'التجميعات الاحترافية 17', 'Professional collections 17', 'Professional collections 17', 'Professional collections 17', '5653675798', 'Professional collections 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 329.00, 319.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(19, 'التجميعات الاحترافية 18', 'التجميعات الاحترافية 18', 'التجميعات الاحترافية 18', 'Professional collections 18', 'Professional collections 18', 'Professional collections 18', '3982512979', 'Professional collections 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 180.00, 212.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(20, 'التجميعات الاحترافية 19', 'التجميعات الاحترافية 19', 'التجميعات الاحترافية 19', 'Professional collections 19', 'Professional collections 19', 'Professional collections 19', '3073662257', 'Professional collections 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 466.00, 128.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(21, 'التجميعات الاحترافية 20', 'التجميعات الاحترافية 20', 'التجميعات الاحترافية 20', 'Professional collections 20', 'Professional collections 20', 'Professional collections 20', '5285260383', 'Professional collections 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 176.00, 266.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(22, 'التجميعات الاحترافية 21', 'التجميعات الاحترافية 21', 'التجميعات الاحترافية 21', 'Professional collections 21', 'Professional collections 21', 'Professional collections 21', '1839098934', 'Professional collections 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 297.00, 347.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(23, 'التجميعات الاحترافية 22', 'التجميعات الاحترافية 22', 'التجميعات الاحترافية 22', 'Professional collections 22', 'Professional collections 22', 'Professional collections 22', '4436359541', 'Professional collections 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 269.00, 231.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(24, 'التجميعات الاحترافية 23', 'التجميعات الاحترافية 23', 'التجميعات الاحترافية 23', 'Professional collections 23', 'Professional collections 23', 'Professional collections 23', '5103899205', 'Professional collections 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 121.00, 389.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(25, 'التجميعات الاحترافية 24', 'التجميعات الاحترافية 24', 'التجميعات الاحترافية 24', 'Professional collections 24', 'Professional collections 24', 'Professional collections 24', '6488972279', 'Professional collections 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 470.00, 63.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(26, 'التجميعات الاحترافية 25', 'التجميعات الاحترافية 25', 'التجميعات الاحترافية 25', 'Professional collections 25', 'Professional collections 25', 'Professional collections 25', '6532207231', 'Professional collections 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 474.00, 388.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(27, 'التجميعات الاحترافية 26', 'التجميعات الاحترافية 26', 'التجميعات الاحترافية 26', 'Professional collections 26', 'Professional collections 26', 'Professional collections 26', '8611722981', 'Professional collections 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 405.00, 142.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(28, 'التجميعات الاحترافية 27', 'التجميعات الاحترافية 27', 'التجميعات الاحترافية 27', 'Professional collections 27', 'Professional collections 27', 'Professional collections 27', '5943974172', 'Professional collections 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 428.00, 57.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(29, 'التجميعات الاحترافية 28', 'التجميعات الاحترافية 28', 'التجميعات الاحترافية 28', 'Professional collections 28', 'Professional collections 28', 'Professional collections 28', '2181661385', 'Professional collections 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 150.00, 90.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(30, 'التجميعات الاحترافية 29', 'التجميعات الاحترافية 29', 'التجميعات الاحترافية 29', 'Professional collections 29', 'Professional collections 29', 'Professional collections 29', '8184000030', 'Professional collections 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 251.00, 357.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(31, 'التجميعات الاحترافية 30', 'التجميعات الاحترافية 30', 'التجميعات الاحترافية 30', 'Professional collections 30', 'Professional collections 30', 'Professional collections 30', '7889070036', 'Professional collections 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 445.00, 255.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(32, 'التجميعات الاحترافية 31', 'التجميعات الاحترافية 31', 'التجميعات الاحترافية 31', 'Professional collections 31', 'Professional collections 31', 'Professional collections 31', '3980539008', 'Professional collections 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 296.00, 385.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(33, 'التجميعات الاحترافية 32', 'التجميعات الاحترافية 32', 'التجميعات الاحترافية 32', 'Professional collections 32', 'Professional collections 32', 'Professional collections 32', '3346136996', 'Professional collections 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 358.00, 293.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(34, 'التجميعات الاحترافية 33', 'التجميعات الاحترافية 33', 'التجميعات الاحترافية 33', 'Professional collections 33', 'Professional collections 33', 'Professional collections 33', '5270549435', 'Professional collections 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 448.00, 197.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(35, 'التجميعات الاحترافية 34', 'التجميعات الاحترافية 34', 'التجميعات الاحترافية 34', 'Professional collections 34', 'Professional collections 34', 'Professional collections 34', '9083626009', 'Professional collections 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 248.00, 112.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(36, 'التجميعات الاحترافية 35', 'التجميعات الاحترافية 35', 'التجميعات الاحترافية 35', 'Professional collections 35', 'Professional collections 35', 'Professional collections 35', '837244369', 'Professional collections 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 275.00, 155.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(37, 'التجميعات الاحترافية 36', 'التجميعات الاحترافية 36', 'التجميعات الاحترافية 36', 'Professional collections 36', 'Professional collections 36', 'Professional collections 36', '2518919326', 'Professional collections 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 353.00, 174.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(38, 'التجميعات الاحترافية 37', 'التجميعات الاحترافية 37', 'التجميعات الاحترافية 37', 'Professional collections 37', 'Professional collections 37', 'Professional collections 37', '6503979750', 'Professional collections 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 291.00, 162.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(39, 'التجميعات الاحترافية 38', 'التجميعات الاحترافية 38', 'التجميعات الاحترافية 38', 'Professional collections 38', 'Professional collections 38', 'Professional collections 38', '496531448', 'Professional collections 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 255.00, 209.00, NULL, '2022-04-04 10:32:01', '2022-05-05 15:12:27', 1, 0, 1, NULL, 0),
(40, 'التجميعات الاحترافية 39', 'التجميعات الاحترافية 39', 'التجميعات الاحترافية 39', 'Professional collections 39', 'Professional collections 39', 'Professional collections 39', '1261496694', 'Professional collections 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 495.00, 353.00, NULL, '2022-04-04 10:32:01', '2022-05-06 18:10:32', 1, 0, 1, NULL, 0),
(41, 'التجميعات الاحترافية 40', 'التجميعات الاحترافية 40', 'التجميعات الاحترافية 40', 'Professional collections 40', 'Professional collections 40', 'Professional collections 40', '4916834', 'Professional collections 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 391.00, 148.00, NULL, '2022-04-04 10:32:01', '2022-05-06 18:10:32', 1, 0, 0, NULL, 0),
(42, 'التجميعات الاحترافية 41', 'التجميعات الاحترافية 41', 'التجميعات الاحترافية 41', 'Professional collections 41', 'Professional collections 41', 'Professional collections 41', '4932826021', 'Professional collections 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 133.00, 136.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(43, 'التجميعات الاحترافية 42', 'التجميعات الاحترافية 42', 'التجميعات الاحترافية 42', 'Professional collections 42', 'Professional collections 42', 'Professional collections 42', '9322853697', 'Professional collections 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 124.00, 373.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(44, 'التجميعات الاحترافية 43', 'التجميعات الاحترافية 43', 'التجميعات الاحترافية 43', 'Professional collections 43', 'Professional collections 43', 'Professional collections 43', '6850115674', 'Professional collections 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 114.00, 197.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(45, 'التجميعات الاحترافية 44', 'التجميعات الاحترافية 44', 'التجميعات الاحترافية 44', 'Professional collections 44', 'Professional collections 44', 'Professional collections 44', '9000779308', 'Professional collections 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 176.00, 106.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(46, 'التجميعات الاحترافية 45', 'التجميعات الاحترافية 45', 'التجميعات الاحترافية 45', 'Professional collections 45', 'Professional collections 45', 'Professional collections 45', '4145952325', 'Professional collections 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 247.00, 298.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(47, 'التجميعات الاحترافية 46', 'التجميعات الاحترافية 46', 'التجميعات الاحترافية 46', 'Professional collections 46', 'Professional collections 46', 'Professional collections 46', '4885333207', 'Professional collections 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 338.00, 188.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(48, 'التجميعات الاحترافية 47', 'التجميعات الاحترافية 47', 'التجميعات الاحترافية 47', 'Professional collections 47', 'Professional collections 47', 'Professional collections 47', '4010624120', 'Professional collections 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 257.00, 210.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(49, 'التجميعات الاحترافية 48', 'التجميعات الاحترافية 48', 'التجميعات الاحترافية 48', 'Professional collections 48', 'Professional collections 48', 'Professional collections 48', '7575793628', 'Professional-collections-48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, '{\"child_products_id\":[],\"products_quantity\":[]}', 39, 394.00, 110.00, NULL, '2022-04-04 10:32:01', '2022-06-09 07:19:15', 1, 0, 0, NULL, 0),
(50, 'التجميعات الاحترافية 49', 'التجميعات الاحترافية 49', 'التجميعات الاحترافية 49', 'Professional collections 49', 'Professional collections 49', 'Professional collections 49', '4111530331', 'Professional collections 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 495.00, 79.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(52, 'تجميعات مع كرت GT 1', 'تجميعات مع كرت GT 1', 'تجميعات مع كرت GT 1', 'PC GAMING WITH GT 1', 'PC GAMING WITH GT 1', 'PC GAMING WITH GT 1', '2717770694', 'PC GAMING WITH GT 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 483.00, 253.00, NULL, '2022-04-04 10:32:01', '2022-07-08 22:39:57', 1, 0, 11, NULL, 0),
(53, 'تجميعات مع كرت GT 2', 'تجميعات مع كرت GT 2', 'تجميعات مع كرت GT 2', 'PC GAMING WITH GT 2', 'PC GAMING WITH GT 2', 'PC GAMING WITH GT 2', '6704685931', 'PC GAMING WITH GT 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 496.00, 114.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(55, 'تجميعات مع كرت GT 4', 'تجميعات مع كرت GT 4', 'تجميعات مع كرت GT 4', 'PC GAMING WITH GT 4', 'PC GAMING WITH GT 4', 'PC GAMING WITH GT 4', '341141317', 'PC GAMING WITH GT 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 111.00, 119.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(56, 'تجميعات مع كرت GT 5', 'تجميعات مع كرت GT 5', 'تجميعات مع كرت GT 5', 'PC GAMING WITH GT 5', 'PC GAMING WITH GT 5', 'PC GAMING WITH GT 5', '8956255070', 'PC GAMING WITH GT 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 456.00, 341.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(57, 'تجميعات مع كرت GT 6', 'تجميعات مع كرت GT 6', 'تجميعات مع كرت GT 6', 'PC GAMING WITH GT 6', 'PC GAMING WITH GT 6', 'PC GAMING WITH GT 6', '6845342189', 'PC GAMING WITH GT 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 321.00, 344.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(58, 'تجميعات مع كرت GT 7', 'تجميعات مع كرت GT 7', 'تجميعات مع كرت GT 7', 'PC GAMING WITH GT 7', 'PC GAMING WITH GT 7', 'PC GAMING WITH GT 7', '831860710', 'PC GAMING WITH GT 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 447.00, 260.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(59, 'تجميعات مع كرت GT 8', 'تجميعات مع كرت GT 8', 'تجميعات مع كرت GT 8', 'PC GAMING WITH GT 8', 'PC GAMING WITH GT 8', 'PC GAMING WITH GT 8', '2797678300', 'PC GAMING WITH GT 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 422.00, 395.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(60, 'تجميعات مع كرت GT 9', 'تجميعات مع كرت GT 9', 'تجميعات مع كرت GT 9', 'PC GAMING WITH GT 9', 'PC GAMING WITH GT 9', 'PC GAMING WITH GT 9', '4691643471', 'PC GAMING WITH GT 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 214.00, 74.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(61, 'تجميعات مع كرت GT 10', 'تجميعات مع كرت GT 10', 'تجميعات مع كرت GT 10', 'PC GAMING WITH GT 10', 'PC GAMING WITH GT 10', 'PC GAMING WITH GT 10', '5337500159', 'PC GAMING WITH GT 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 416.00, 56.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(62, 'تجميعات مع كرت GT 11', 'تجميعات مع كرت GT 11', 'تجميعات مع كرت GT 11', 'PC GAMING WITH GT 11', 'PC GAMING WITH GT 11', 'PC GAMING WITH GT 11', '8828534732', 'PC GAMING WITH GT 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 383.00, 85.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(63, 'تجميعات مع كرت GT 12', 'تجميعات مع كرت GT 12', 'تجميعات مع كرت GT 12', 'PC GAMING WITH GT 12', 'PC GAMING WITH GT 12', 'PC GAMING WITH GT 12', '5839680188', 'PC GAMING WITH GT 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 338.00, 128.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(64, 'تجميعات مع كرت GT 13', 'تجميعات مع كرت GT 13', 'تجميعات مع كرت GT 13', 'PC GAMING WITH GT 13', 'PC GAMING WITH GT 13', 'PC GAMING WITH GT 13', '1283517600', 'PC GAMING WITH GT 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 277.00, 357.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(65, 'تجميعات مع كرت GT 14', 'تجميعات مع كرت GT 14', 'تجميعات مع كرت GT 14', 'PC GAMING WITH GT 14', 'PC GAMING WITH GT 14', 'PC GAMING WITH GT 14', '8791956105', 'PC GAMING WITH GT 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 166.00, 106.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(66, 'تجميعات مع كرت GT 15', 'تجميعات مع كرت GT 15', 'تجميعات مع كرت GT 15', 'PC GAMING WITH GT 15', 'PC GAMING WITH GT 15', 'PC GAMING WITH GT 15', '9972793173', 'PC GAMING WITH GT 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 369.00, 345.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(67, 'تجميعات مع كرت GT 16', 'تجميعات مع كرت GT 16', 'تجميعات مع كرت GT 16', 'PC GAMING WITH GT 16', 'PC GAMING WITH GT 16', 'PC GAMING WITH GT 16', '3770634424', 'PC GAMING WITH GT 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 263.00, 156.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(68, 'تجميعات مع كرت GT 17', 'تجميعات مع كرت GT 17', 'تجميعات مع كرت GT 17', 'PC GAMING WITH GT 17', 'PC GAMING WITH GT 17', 'PC GAMING WITH GT 17', '3428310', 'PC GAMING WITH GT 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 391.00, 179.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(69, 'تجميعات مع كرت GT 18', 'تجميعات مع كرت GT 18', 'تجميعات مع كرت GT 18', 'PC GAMING WITH GT 18', 'PC GAMING WITH GT 18', 'PC GAMING WITH GT 18', '6777545636', 'PC GAMING WITH GT 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 254.00, 82.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(70, 'تجميعات مع كرت GT 19', 'تجميعات مع كرت GT 19', 'تجميعات مع كرت GT 19', 'PC GAMING WITH GT 19', 'PC GAMING WITH GT 19', 'PC GAMING WITH GT 19', '206860678', 'PC GAMING WITH GT 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 249.00, 161.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(71, 'تجميعات مع كرت GT 20', 'تجميعات مع كرت GT 20', 'تجميعات مع كرت GT 20', 'PC GAMING WITH GT 20', 'PC GAMING WITH GT 20', 'PC GAMING WITH GT 20', '6716544007', 'PC GAMING WITH GT 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 225.00, 211.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(72, 'تجميعات مع كرت GT 21', 'تجميعات مع كرت GT 21', 'تجميعات مع كرت GT 21', 'PC GAMING WITH GT 21', 'PC GAMING WITH GT 21', 'PC GAMING WITH GT 21', '229296826', 'PC GAMING WITH GT 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 347.00, 342.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(73, 'تجميعات مع كرت GT 22', 'تجميعات مع كرت GT 22', 'تجميعات مع كرت GT 22', 'PC GAMING WITH GT 22', 'PC GAMING WITH GT 22', 'PC GAMING WITH GT 22', '6106884136', 'PC GAMING WITH GT 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 450.00, 326.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(74, 'تجميعات مع كرت GT 23', 'تجميعات مع كرت GT 23', 'تجميعات مع كرت GT 23', 'PC GAMING WITH GT 23', 'PC GAMING WITH GT 23', 'PC GAMING WITH GT 23', '5211362619', 'PC GAMING WITH GT 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 365.00, 118.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(75, 'تجميعات مع كرت GT 24', 'تجميعات مع كرت GT 24', 'تجميعات مع كرت GT 24', 'PC GAMING WITH GT 24', 'PC GAMING WITH GT 24', 'PC GAMING WITH GT 24', '6010876599', 'PC GAMING WITH GT 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 296.00, 304.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(76, 'تجميعات مع كرت GT 25', 'تجميعات مع كرت GT 25', 'تجميعات مع كرت GT 25', 'PC GAMING WITH GT 25', 'PC GAMING WITH GT 25', 'PC GAMING WITH GT 25', '8886570079', 'PC GAMING WITH GT 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 216.00, 372.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(77, 'تجميعات مع كرت GT 26', 'تجميعات مع كرت GT 26', 'تجميعات مع كرت GT 26', 'PC GAMING WITH GT 26', 'PC GAMING WITH GT 26', 'PC GAMING WITH GT 26', '3658890241', 'PC GAMING WITH GT 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 289.00, 275.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(78, 'تجميعات مع كرت GT 27', 'تجميعات مع كرت GT 27', 'تجميعات مع كرت GT 27', 'PC GAMING WITH GT 27', 'PC GAMING WITH GT 27', 'PC GAMING WITH GT 27', '5117229153', 'PC GAMING WITH GT 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 211.00, 203.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(79, 'تجميعات مع كرت GT 28', 'تجميعات مع كرت GT 28', 'تجميعات مع كرت GT 28', 'PC GAMING WITH GT 28', 'PC GAMING WITH GT 28', 'PC GAMING WITH GT 28', '2283434201', 'PC GAMING WITH GT 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 122.00, 186.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(80, 'تجميعات مع كرت GT 29', 'تجميعات مع كرت GT 29', 'تجميعات مع كرت GT 29', 'PC GAMING WITH GT 29', 'PC GAMING WITH GT 29', 'PC GAMING WITH GT 29', '8532118652', 'PC GAMING WITH GT 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 316.00, 53.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(81, 'تجميعات مع كرت GT 30', 'تجميعات مع كرت GT 30', 'تجميعات مع كرت GT 30', 'PC GAMING WITH GT 30', 'PC GAMING WITH GT 30', 'PC GAMING WITH GT 30', '4789089479', 'PC GAMING WITH GT 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 254.00, 154.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(82, 'تجميعات مع كرت GT 31', 'تجميعات مع كرت GT 31', 'تجميعات مع كرت GT 31', 'PC GAMING WITH GT 31', 'PC GAMING WITH GT 31', 'PC GAMING WITH GT 31', '1429133622', 'PC GAMING WITH GT 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 230.00, 185.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(83, 'تجميعات مع كرت GT 32', 'تجميعات مع كرت GT 32', 'تجميعات مع كرت GT 32', 'PC GAMING WITH GT 32', 'PC GAMING WITH GT 32', 'PC GAMING WITH GT 32', '7344900630', 'PC GAMING WITH GT 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 236.00, 269.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(84, 'تجميعات مع كرت GT 33', 'تجميعات مع كرت GT 33', 'تجميعات مع كرت GT 33', 'PC GAMING WITH GT 33', 'PC GAMING WITH GT 33', 'PC GAMING WITH GT 33', '8579369598', 'PC GAMING WITH GT 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 243.00, 339.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(85, 'تجميعات مع كرت GT 34', 'تجميعات مع كرت GT 34', 'تجميعات مع كرت GT 34', 'PC GAMING WITH GT 34', 'PC GAMING WITH GT 34', 'PC GAMING WITH GT 34', '1771482211', 'PC GAMING WITH GT 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 451.00, 375.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(86, 'تجميعات مع كرت GT 35', 'تجميعات مع كرت GT 35', 'تجميعات مع كرت GT 35', 'PC GAMING WITH GT 35', 'PC GAMING WITH GT 35', 'PC GAMING WITH GT 35', '3700557859', 'PC GAMING WITH GT 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 490.00, 341.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(87, 'تجميعات مع كرت GT 36', 'تجميعات مع كرت GT 36', 'تجميعات مع كرت GT 36', 'PC GAMING WITH GT 36', 'PC GAMING WITH GT 36', 'PC GAMING WITH GT 36', '6797957525', 'PC GAMING WITH GT 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 251.00, 241.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(88, 'تجميعات مع كرت GT 37', 'تجميعات مع كرت GT 37', 'تجميعات مع كرت GT 37', 'PC GAMING WITH GT 37', 'PC GAMING WITH GT 37', 'PC GAMING WITH GT 37', '9546697083', 'PC GAMING WITH GT 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 225.00, 100.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(89, 'تجميعات مع كرت GT 38', 'تجميعات مع كرت GT 38', 'تجميعات مع كرت GT 38', 'PC GAMING WITH GT 38', 'PC GAMING WITH GT 38', 'PC GAMING WITH GT 38', '7169491898', 'PC GAMING WITH GT 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 228.00, 51.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(90, 'تجميعات مع كرت GT 39', 'تجميعات مع كرت GT 39', 'تجميعات مع كرت GT 39', 'PC GAMING WITH GT 39', 'PC GAMING WITH GT 39', 'PC GAMING WITH GT 39', '3196850067', 'PC GAMING WITH GT 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 298.00, 253.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(91, 'تجميعات مع كرت GT 40', 'تجميعات مع كرت GT 40', 'تجميعات مع كرت GT 40', 'PC GAMING WITH GT 40', 'PC GAMING WITH GT 40', 'PC GAMING WITH GT 40', '9968039746', 'PC GAMING WITH GT 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 261.00, 356.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(92, 'تجميعات مع كرت GT 41', 'تجميعات مع كرت GT 41', 'تجميعات مع كرت GT 41', 'PC GAMING WITH GT 41', 'PC GAMING WITH GT 41', 'PC GAMING WITH GT 41', '8430386188', 'PC GAMING WITH GT 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 284.00, 219.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(93, 'تجميعات مع كرت GT 42', 'تجميعات مع كرت GT 42', 'تجميعات مع كرت GT 42', 'PC GAMING WITH GT 42', 'PC GAMING WITH GT 42', 'PC GAMING WITH GT 42', '8147880139', 'PC GAMING WITH GT 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 387.00, 381.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(94, 'تجميعات مع كرت GT 43', 'تجميعات مع كرت GT 43', 'تجميعات مع كرت GT 43', 'PC GAMING WITH GT 43', 'PC GAMING WITH GT 43', 'PC GAMING WITH GT 43', '8246988966', 'PC GAMING WITH GT 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 232.00, 135.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(95, 'تجميعات مع كرت GT 44', 'تجميعات مع كرت GT 44', 'تجميعات مع كرت GT 44', 'PC GAMING WITH GT 44', 'PC GAMING WITH GT 44', 'PC GAMING WITH GT 44', '2279127223', 'PC GAMING WITH GT 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 243.00, 351.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(96, 'تجميعات مع كرت GT 45', 'تجميعات مع كرت GT 45', 'تجميعات مع كرت GT 45', 'PC GAMING WITH GT 45', 'PC GAMING WITH GT 45', 'PC GAMING WITH GT 45', '3479181832', 'PC GAMING WITH GT 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 371.00, 377.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(97, 'تجميعات مع كرت GT 46', 'تجميعات مع كرت GT 46', 'تجميعات مع كرت GT 46', 'PC GAMING WITH GT 46', 'PC GAMING WITH GT 46', 'PC GAMING WITH GT 46', '1642879382', 'PC GAMING WITH GT 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 289.00, 184.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(98, 'تجميعات مع كرت GT 47', 'تجميعات مع كرت GT 47', 'تجميعات مع كرت GT 47', 'PC GAMING WITH GT 47', 'PC GAMING WITH GT 47', 'PC GAMING WITH GT 47', '1245267633', 'PC GAMING WITH GT 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 188.00, 245.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(99, 'تجميعات مع كرت GT 48', 'تجميعات مع كرت GT 48', 'تجميعات مع كرت GT 48', 'PC GAMING WITH GT 48', 'PC GAMING WITH GT 48', 'PC GAMING WITH GT 48', '3564546964', 'PC GAMING WITH GT 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 297.00, 50.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(100, 'تجميعات مع كرت GT 49', 'تجميعات مع كرت GT 49', 'تجميعات مع كرت GT 49', 'PC GAMING WITH GT 49', 'PC GAMING WITH GT 49', 'PC GAMING WITH GT 49', '1106505598', 'PC GAMING WITH GT 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 252.00, 87.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(101, 'تجميعات مع كرت GTX16XX 0', 'تجميعات مع كرت GTX16XX 0', 'تجميعات مع كرت GTX16XX 0', 'PC GAMING WITH GTX16XX  0', 'PC GAMING WITH GTX16XX  0', 'PC GAMING WITH GTX16XX  0', '843172218', 'PC GAMING WITH GTX16XX  0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 467.00, 96.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(102, 'تجميعات مع كرت GTX16XX 1', 'تجميعات مع كرت GTX16XX 1', 'تجميعات مع كرت GTX16XX 1', 'PC GAMING WITH GTX16XX  1', 'PC GAMING WITH GTX16XX  1', 'PC GAMING WITH GTX16XX  1', '4453137075', 'PC GAMING WITH GTX16XX  1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 298.00, 118.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(103, 'تجميعات مع كرت GTX16XX 2', 'تجميعات مع كرت GTX16XX 2', 'تجميعات مع كرت GTX16XX 2', 'PC GAMING WITH GTX16XX  2', 'PC GAMING WITH GTX16XX  2', 'PC GAMING WITH GTX16XX  2', '6591068559', 'PC GAMING WITH GTX16XX  2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 433.00, 352.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(104, 'تجميعات مع كرت GTX16XX 3', 'تجميعات مع كرت GTX16XX 3', 'تجميعات مع كرت GTX16XX 3', 'PC GAMING WITH GTX16XX  3', 'PC GAMING WITH GTX16XX  3', 'PC GAMING WITH GTX16XX  3', '7550891468', 'PC GAMING WITH GTX16XX  3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 213.00, 135.00, NULL, '2022-04-04 10:32:01', '2022-07-06 01:53:32', 1, 0, -1, NULL, 0),
(105, 'تجميعات مع كرت GTX16XX 4', 'تجميعات مع كرت GTX16XX 4', 'تجميعات مع كرت GTX16XX 4', 'PC GAMING WITH GTX16XX  4', 'PC GAMING WITH GTX16XX  4', 'PC GAMING WITH GTX16XX  4', '3716791200', 'PC GAMING WITH GTX16XX  4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 206.00, 314.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(106, 'تجميعات مع كرت GTX16XX 5', 'تجميعات مع كرت GTX16XX 5', 'تجميعات مع كرت GTX16XX 5', 'PC GAMING WITH GTX16XX  5', 'PC GAMING WITH GTX16XX  5', 'PC GAMING WITH GTX16XX  5', '6066602373', 'PC GAMING WITH GTX16XX  5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 241.00, 142.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(107, 'تجميعات مع كرت GTX16XX 6', 'تجميعات مع كرت GTX16XX 6', 'تجميعات مع كرت GTX16XX 6', 'PC GAMING WITH GTX16XX  6', 'PC GAMING WITH GTX16XX  6', 'PC GAMING WITH GTX16XX  6', '187620653', 'PC GAMING WITH GTX16XX  6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 111.00, 115.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(108, 'تجميعات مع كرت GTX16XX 7', 'تجميعات مع كرت GTX16XX 7', 'تجميعات مع كرت GTX16XX 7', 'PC GAMING WITH GTX16XX  7', 'PC GAMING WITH GTX16XX  7', 'PC GAMING WITH GTX16XX  7', '4384738616', 'PC GAMING WITH GTX16XX  7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 233.00, 192.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(109, 'تجميعات مع كرت GTX16XX 8', 'تجميعات مع كرت GTX16XX 8', 'تجميعات مع كرت GTX16XX 8', 'PC GAMING WITH GTX16XX  8', 'PC GAMING WITH GTX16XX  8', 'PC GAMING WITH GTX16XX  8', '9809024089', 'PC GAMING WITH GTX16XX  8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 112.00, 158.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(110, 'تجميعات مع كرت GTX16XX 9', 'تجميعات مع كرت GTX16XX 9', 'تجميعات مع كرت GTX16XX 9', 'PC GAMING WITH GTX16XX  9', 'PC GAMING WITH GTX16XX  9', 'PC GAMING WITH GTX16XX  9', '3744451226', 'PC GAMING WITH GTX16XX  9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 278.00, 154.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(111, 'تجميعات مع كرت GTX16XX 10', 'تجميعات مع كرت GTX16XX 10', 'تجميعات مع كرت GTX16XX 10', 'PC GAMING WITH GTX16XX  10', 'PC GAMING WITH GTX16XX  10', 'PC GAMING WITH GTX16XX  10', '20899681', 'PC GAMING WITH GTX16XX  10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 305.00, 138.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(112, 'تجميعات مع كرت GTX16XX 11', 'تجميعات مع كرت GTX16XX 11', 'تجميعات مع كرت GTX16XX 11', 'PC GAMING WITH GTX16XX  11', 'PC GAMING WITH GTX16XX  11', 'PC GAMING WITH GTX16XX  11', '3198778252', 'PC GAMING WITH GTX16XX  11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 405.00, 364.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(113, 'تجميعات مع كرت GTX16XX 12', 'تجميعات مع كرت GTX16XX 12', 'تجميعات مع كرت GTX16XX 12', 'PC GAMING WITH GTX16XX  12', 'PC GAMING WITH GTX16XX  12', 'PC GAMING WITH GTX16XX  12', '5203743585', 'PC GAMING WITH GTX16XX  12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 305.00, 297.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(114, 'تجميعات مع كرت GTX16XX 13', 'تجميعات مع كرت GTX16XX 13', 'تجميعات مع كرت GTX16XX 13', 'PC GAMING WITH GTX16XX  13', 'PC GAMING WITH GTX16XX  13', 'PC GAMING WITH GTX16XX  13', '5681844125', 'PC GAMING WITH GTX16XX  13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 145.00, 363.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(115, 'تجميعات مع كرت GTX16XX 14', 'تجميعات مع كرت GTX16XX 14', 'تجميعات مع كرت GTX16XX 14', 'PC GAMING WITH GTX16XX  14', 'PC GAMING WITH GTX16XX  14', 'PC GAMING WITH GTX16XX  14', '4342375371', 'PC GAMING WITH GTX16XX  14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 445.00, 124.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(116, 'تجميعات مع كرت GTX16XX 15', 'تجميعات مع كرت GTX16XX 15', 'تجميعات مع كرت GTX16XX 15', 'PC GAMING WITH GTX16XX  15', 'PC GAMING WITH GTX16XX  15', 'PC GAMING WITH GTX16XX  15', '5788676336', 'PC GAMING WITH GTX16XX  15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 453.00, 367.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(117, 'تجميعات مع كرت GTX16XX 16', 'تجميعات مع كرت GTX16XX 16', 'تجميعات مع كرت GTX16XX 16', 'PC GAMING WITH GTX16XX  16', 'PC GAMING WITH GTX16XX  16', 'PC GAMING WITH GTX16XX  16', '7429161407', 'PC GAMING WITH GTX16XX  16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 108.00, 359.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(118, 'تجميعات مع كرت GTX16XX 17', 'تجميعات مع كرت GTX16XX 17', 'تجميعات مع كرت GTX16XX 17', 'PC GAMING WITH GTX16XX  17', 'PC GAMING WITH GTX16XX  17', 'PC GAMING WITH GTX16XX  17', '6519192512', 'PC GAMING WITH GTX16XX  17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 340.00, 223.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(119, 'تجميعات مع كرت GTX16XX 18', 'تجميعات مع كرت GTX16XX 18', 'تجميعات مع كرت GTX16XX 18', 'PC GAMING WITH GTX16XX  18', 'PC GAMING WITH GTX16XX  18', 'PC GAMING WITH GTX16XX  18', '1575201205', 'PC GAMING WITH GTX16XX  18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 419.00, 123.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(120, 'تجميعات مع كرت GTX16XX 19', 'تجميعات مع كرت GTX16XX 19', 'تجميعات مع كرت GTX16XX 19', 'PC GAMING WITH GTX16XX  19', 'PC GAMING WITH GTX16XX  19', 'PC GAMING WITH GTX16XX  19', '6235344936', 'PC GAMING WITH GTX16XX  19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 427.00, 306.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(121, 'تجميعات مع كرت GTX16XX 20', 'تجميعات مع كرت GTX16XX 20', 'تجميعات مع كرت GTX16XX 20', 'PC GAMING WITH GTX16XX  20', 'PC GAMING WITH GTX16XX  20', 'PC GAMING WITH GTX16XX  20', '286752357', 'PC GAMING WITH GTX16XX  20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 392.00, 120.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(122, 'تجميعات مع كرت GTX16XX 21', 'تجميعات مع كرت GTX16XX 21', 'تجميعات مع كرت GTX16XX 21', 'PC GAMING WITH GTX16XX  21', 'PC GAMING WITH GTX16XX  21', 'PC GAMING WITH GTX16XX  21', '2804428573', 'PC GAMING WITH GTX16XX  21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 411.00, 251.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(123, 'تجميعات مع كرت GTX16XX 22', 'تجميعات مع كرت GTX16XX 22', 'تجميعات مع كرت GTX16XX 22', 'PC GAMING WITH GTX16XX  22', 'PC GAMING WITH GTX16XX  22', 'PC GAMING WITH GTX16XX  22', '9896501711', 'PC GAMING WITH GTX16XX  22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 213.00, 179.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(124, 'تجميعات مع كرت GTX16XX 23', 'تجميعات مع كرت GTX16XX 23', 'تجميعات مع كرت GTX16XX 23', 'PC GAMING WITH GTX16XX  23', 'PC GAMING WITH GTX16XX  23', 'PC GAMING WITH GTX16XX  23', '1198891526', 'PC GAMING WITH GTX16XX  23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 135.00, 178.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(125, 'تجميعات مع كرت GTX16XX 24', 'تجميعات مع كرت GTX16XX 24', 'تجميعات مع كرت GTX16XX 24', 'PC GAMING WITH GTX16XX  24', 'PC GAMING WITH GTX16XX  24', 'PC GAMING WITH GTX16XX  24', '4947354224', 'PC GAMING WITH GTX16XX  24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 472.00, 341.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(126, 'تجميعات مع كرت GTX16XX 25', 'تجميعات مع كرت GTX16XX 25', 'تجميعات مع كرت GTX16XX 25', 'PC GAMING WITH GTX16XX  25', 'PC GAMING WITH GTX16XX  25', 'PC GAMING WITH GTX16XX  25', '4938504939', 'PC GAMING WITH GTX16XX  25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 116.00, 94.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(127, 'تجميعات مع كرت GTX16XX 26', 'تجميعات مع كرت GTX16XX 26', 'تجميعات مع كرت GTX16XX 26', 'PC GAMING WITH GTX16XX  26', 'PC GAMING WITH GTX16XX  26', 'PC GAMING WITH GTX16XX  26', '3569633015', 'PC GAMING WITH GTX16XX  26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 426.00, 219.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(128, 'تجميعات مع كرت GTX16XX 27', 'تجميعات مع كرت GTX16XX 27', 'تجميعات مع كرت GTX16XX 27', 'PC GAMING WITH GTX16XX  27', 'PC GAMING WITH GTX16XX  27', 'PC GAMING WITH GTX16XX  27', '7273492929', 'PC GAMING WITH GTX16XX  27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 230.00, 273.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(129, 'تجميعات مع كرت GTX16XX 28', 'تجميعات مع كرت GTX16XX 28', 'تجميعات مع كرت GTX16XX 28', 'PC GAMING WITH GTX16XX  28', 'PC GAMING WITH GTX16XX  28', 'PC GAMING WITH GTX16XX  28', '1004030549', 'PC GAMING WITH GTX16XX  28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 171.00, 271.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(130, 'تجميعات مع كرت GTX16XX 29', 'تجميعات مع كرت GTX16XX 29', 'تجميعات مع كرت GTX16XX 29', 'PC GAMING WITH GTX16XX  29', 'PC GAMING WITH GTX16XX  29', 'PC GAMING WITH GTX16XX  29', '3283015191', 'PC GAMING WITH GTX16XX  29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 353.00, 279.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(131, 'تجميعات مع كرت GTX16XX 30', 'تجميعات مع كرت GTX16XX 30', 'تجميعات مع كرت GTX16XX 30', 'PC GAMING WITH GTX16XX  30', 'PC GAMING WITH GTX16XX  30', 'PC GAMING WITH GTX16XX  30', '1878140944', 'PC GAMING WITH GTX16XX  30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 259.00, 363.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(132, 'تجميعات مع كرت GTX16XX 31', 'تجميعات مع كرت GTX16XX 31', 'تجميعات مع كرت GTX16XX 31', 'PC GAMING WITH GTX16XX  31', 'PC GAMING WITH GTX16XX  31', 'PC GAMING WITH GTX16XX  31', '5934132097', 'PC GAMING WITH GTX16XX  31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 145.00, 217.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(133, 'تجميعات مع كرت GTX16XX 32', 'تجميعات مع كرت GTX16XX 32', 'تجميعات مع كرت GTX16XX 32', 'PC GAMING WITH GTX16XX  32', 'PC GAMING WITH GTX16XX  32', 'PC GAMING WITH GTX16XX  32', '9348119806', 'PC GAMING WITH GTX16XX  32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 383.00, 131.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(134, 'تجميعات مع كرت GTX16XX 33', 'تجميعات مع كرت GTX16XX 33', 'تجميعات مع كرت GTX16XX 33', 'PC GAMING WITH GTX16XX  33', 'PC GAMING WITH GTX16XX  33', 'PC GAMING WITH GTX16XX  33', '7179583456', 'PC GAMING WITH GTX16XX  33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 333.00, 257.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(135, 'تجميعات مع كرت GTX16XX 34', 'تجميعات مع كرت GTX16XX 34', 'تجميعات مع كرت GTX16XX 34', 'PC GAMING WITH GTX16XX  34', 'PC GAMING WITH GTX16XX  34', 'PC GAMING WITH GTX16XX  34', '1592082015', 'PC GAMING WITH GTX16XX  34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 391.00, 327.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(136, 'تجميعات مع كرت GTX16XX 35', 'تجميعات مع كرت GTX16XX 35', 'تجميعات مع كرت GTX16XX 35', 'PC GAMING WITH GTX16XX  35', 'PC GAMING WITH GTX16XX  35', 'PC GAMING WITH GTX16XX  35', '4077840473', 'PC GAMING WITH GTX16XX  35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 442.00, 188.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(137, 'تجميعات مع كرت GTX16XX 36', 'تجميعات مع كرت GTX16XX 36', 'تجميعات مع كرت GTX16XX 36', 'PC GAMING WITH GTX16XX  36', 'PC GAMING WITH GTX16XX  36', 'PC GAMING WITH GTX16XX  36', '5400656370', 'PC GAMING WITH GTX16XX  36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 148.00, 300.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(138, 'تجميعات مع كرت GTX16XX 37', 'تجميعات مع كرت GTX16XX 37', 'تجميعات مع كرت GTX16XX 37', 'PC GAMING WITH GTX16XX  37', 'PC GAMING WITH GTX16XX  37', 'PC GAMING WITH GTX16XX  37', '3427757067', 'PC GAMING WITH GTX16XX  37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 134.00, 105.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(139, 'تجميعات مع كرت GTX16XX 38', 'تجميعات مع كرت GTX16XX 38', 'تجميعات مع كرت GTX16XX 38', 'PC GAMING WITH GTX16XX  38', 'PC GAMING WITH GTX16XX  38', 'PC GAMING WITH GTX16XX  38', '1358948893', 'PC GAMING WITH GTX16XX  38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 147.00, 356.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(140, 'تجميعات مع كرت GTX16XX 39', 'تجميعات مع كرت GTX16XX 39', 'تجميعات مع كرت GTX16XX 39', 'PC GAMING WITH GTX16XX  39', 'PC GAMING WITH GTX16XX  39', 'PC GAMING WITH GTX16XX  39', '5501286887', 'PC GAMING WITH GTX16XX  39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 494.00, 162.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(141, 'تجميعات مع كرت GTX16XX 40', 'تجميعات مع كرت GTX16XX 40', 'تجميعات مع كرت GTX16XX 40', 'PC GAMING WITH GTX16XX  40', 'PC GAMING WITH GTX16XX  40', 'PC GAMING WITH GTX16XX  40', '6422555273', 'PC GAMING WITH GTX16XX  40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 409.00, 161.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(142, 'تجميعات مع كرت GTX16XX 41', 'تجميعات مع كرت GTX16XX 41', 'تجميعات مع كرت GTX16XX 41', 'PC GAMING WITH GTX16XX  41', 'PC GAMING WITH GTX16XX  41', 'PC GAMING WITH GTX16XX  41', '3338254750', 'PC GAMING WITH GTX16XX  41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 249.00, 160.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(143, 'تجميعات مع كرت GTX16XX 42', 'تجميعات مع كرت GTX16XX 42', 'تجميعات مع كرت GTX16XX 42', 'PC GAMING WITH GTX16XX  42', 'PC GAMING WITH GTX16XX  42', 'PC GAMING WITH GTX16XX  42', '8590523293', 'PC GAMING WITH GTX16XX  42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 357.00, 222.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(144, 'تجميعات مع كرت GTX16XX 43', 'تجميعات مع كرت GTX16XX 43', 'تجميعات مع كرت GTX16XX 43', 'PC GAMING WITH GTX16XX  43', 'PC GAMING WITH GTX16XX  43', 'PC GAMING WITH GTX16XX  43', '3280200028', 'PC GAMING WITH GTX16XX  43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 241.00, 328.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(145, 'تجميعات مع كرت GTX16XX 44', 'تجميعات مع كرت GTX16XX 44', 'تجميعات مع كرت GTX16XX 44', 'PC GAMING WITH GTX16XX  44', 'PC GAMING WITH GTX16XX  44', 'PC GAMING WITH GTX16XX  44', '6292437458', 'PC GAMING WITH GTX16XX  44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 201.00, 184.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(146, 'تجميعات مع كرت GTX16XX 45', 'تجميعات مع كرت GTX16XX 45', 'تجميعات مع كرت GTX16XX 45', 'PC GAMING WITH GTX16XX  45', 'PC GAMING WITH GTX16XX  45', 'PC GAMING WITH GTX16XX  45', '858462252', 'PC GAMING WITH GTX16XX  45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 357.00, 119.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(147, 'تجميعات مع كرت GTX16XX 46', 'تجميعات مع كرت GTX16XX 46', 'تجميعات مع كرت GTX16XX 46', 'PC GAMING WITH GTX16XX  46', 'PC GAMING WITH GTX16XX  46', 'PC GAMING WITH GTX16XX  46', '8361143796', 'PC GAMING WITH GTX16XX  46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 305.00, 319.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(148, 'تجميعات مع كرت GTX16XX 47', 'تجميعات مع كرت GTX16XX 47', 'تجميعات مع كرت GTX16XX 47', 'PC GAMING WITH GTX16XX  47', 'PC GAMING WITH GTX16XX  47', 'PC GAMING WITH GTX16XX  47', '8016486889', 'PC GAMING WITH GTX16XX  47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 326.00, 379.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(149, 'تجميعات مع كرت GTX16XX 48', 'تجميعات مع كرت GTX16XX 48', 'تجميعات مع كرت GTX16XX 48', 'PC GAMING WITH GTX16XX  48', 'PC GAMING WITH GTX16XX  48', 'PC GAMING WITH GTX16XX  48', '3425957432', 'PC GAMING WITH GTX16XX  48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 150.00, 137.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(150, 'تجميعات مع كرت GTX16XX 49', 'تجميعات مع كرت GTX16XX 49', 'تجميعات مع كرت GTX16XX 49', 'PC GAMING WITH GTX16XX  49', 'PC GAMING WITH GTX16XX  49', 'PC GAMING WITH GTX16XX  49', '4030820685', 'PC GAMING WITH GTX16XX  49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 423.00, 302.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(151, 'تجميعات مع كرت RTX20XX 0', 'تجميعات مع كرت RTX20XX 0', 'تجميعات مع كرت RTX20XX 0', 'PC GAMING WITH RTX20XX 0', 'PC GAMING WITH RTX20XX 0', 'PC GAMING WITH RTX20XX 0', '9046781805', 'PC GAMING WITH RTX20XX 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 351.00, 332.00, NULL, '2022-04-04 10:32:01', '2022-07-09 18:19:26', 1, 0, 0, NULL, 0),
(152, 'تجميعات مع كرت RTX20XX 1', 'تجميعات مع كرت RTX20XX 1', 'تجميعات مع كرت RTX20XX 1', 'PC GAMING WITH RTX20XX 1', 'PC GAMING WITH RTX20XX 1', 'PC GAMING WITH RTX20XX 1', '9808600339', 'PC GAMING WITH RTX20XX 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 246.00, 216.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(153, 'تجميعات مع كرت RTX20XX 2', 'تجميعات مع كرت RTX20XX 2', 'تجميعات مع كرت RTX20XX 2', 'PC GAMING WITH RTX20XX 2', 'PC GAMING WITH RTX20XX 2', 'PC GAMING WITH RTX20XX 2', '2933487232', 'PC GAMING WITH RTX20XX 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 157.00, 365.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(154, 'تجميعات مع كرت RTX20XX 3', 'تجميعات مع كرت RTX20XX 3', 'تجميعات مع كرت RTX20XX 3', 'PC GAMING WITH RTX20XX 3', 'PC GAMING WITH RTX20XX 3', 'PC GAMING WITH RTX20XX 3', '3965460543', 'PC GAMING WITH RTX20XX 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 304.00, 293.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(155, 'تجميعات مع كرت RTX20XX 4', 'تجميعات مع كرت RTX20XX 4', 'تجميعات مع كرت RTX20XX 4', 'PC GAMING WITH RTX20XX 4', 'PC GAMING WITH RTX20XX 4', 'PC GAMING WITH RTX20XX 4', '639562124', 'PC GAMING WITH RTX20XX 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 409.00, 284.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(156, 'تجميعات مع كرت RTX20XX 5', 'تجميعات مع كرت RTX20XX 5', 'تجميعات مع كرت RTX20XX 5', 'PC GAMING WITH RTX20XX 5', 'PC GAMING WITH RTX20XX 5', 'PC GAMING WITH RTX20XX 5', '6611449070', 'PC GAMING WITH RTX20XX 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 436.00, 107.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(157, 'تجميعات مع كرت RTX20XX 6', 'تجميعات مع كرت RTX20XX 6', 'تجميعات مع كرت RTX20XX 6', 'PC GAMING WITH RTX20XX 6', 'PC GAMING WITH RTX20XX 6', 'PC GAMING WITH RTX20XX 6', '7746835415', 'PC GAMING WITH RTX20XX 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 135.00, 72.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(158, 'تجميعات مع كرت RTX20XX 7', 'تجميعات مع كرت RTX20XX 7', 'تجميعات مع كرت RTX20XX 7', 'PC GAMING WITH RTX20XX 7', 'PC GAMING WITH RTX20XX 7', 'PC GAMING WITH RTX20XX 7', '4107630186', 'PC GAMING WITH RTX20XX 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 172.00, 283.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(159, 'تجميعات مع كرت RTX20XX 8', 'تجميعات مع كرت RTX20XX 8', 'تجميعات مع كرت RTX20XX 8', 'PC GAMING WITH RTX20XX 8', 'PC GAMING WITH RTX20XX 8', 'PC GAMING WITH RTX20XX 8', '746928234', 'PC GAMING WITH RTX20XX 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 327.00, 110.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(160, 'تجميعات مع كرت RTX20XX 9', 'تجميعات مع كرت RTX20XX 9', 'تجميعات مع كرت RTX20XX 9', 'PC GAMING WITH RTX20XX 9', 'PC GAMING WITH RTX20XX 9', 'PC GAMING WITH RTX20XX 9', '3225101638', 'PC GAMING WITH RTX20XX 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 186.00, 58.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(161, 'تجميعات مع كرت RTX20XX 10', 'تجميعات مع كرت RTX20XX 10', 'تجميعات مع كرت RTX20XX 10', 'PC GAMING WITH RTX20XX 10', 'PC GAMING WITH RTX20XX 10', 'PC GAMING WITH RTX20XX 10', '7435047965', 'PC GAMING WITH RTX20XX 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 403.00, 90.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(162, 'تجميعات مع كرت RTX20XX 11', 'تجميعات مع كرت RTX20XX 11', 'تجميعات مع كرت RTX20XX 11', 'PC GAMING WITH RTX20XX 11', 'PC GAMING WITH RTX20XX 11', 'PC GAMING WITH RTX20XX 11', '3396199288', 'PC GAMING WITH RTX20XX 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 212.00, 51.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(163, 'تجميعات مع كرت RTX20XX 12', 'تجميعات مع كرت RTX20XX 12', 'تجميعات مع كرت RTX20XX 12', 'PC GAMING WITH RTX20XX 12', 'PC GAMING WITH RTX20XX 12', 'PC GAMING WITH RTX20XX 12', '5380095855', 'PC GAMING WITH RTX20XX 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 385.00, 319.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(164, 'تجميعات مع كرت RTX20XX 13', 'تجميعات مع كرت RTX20XX 13', 'تجميعات مع كرت RTX20XX 13', 'PC GAMING WITH RTX20XX 13', 'PC GAMING WITH RTX20XX 13', 'PC GAMING WITH RTX20XX 13', '5506902248', 'PC GAMING WITH RTX20XX 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 359.00, 177.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(165, 'تجميعات مع كرت RTX20XX 14', 'تجميعات مع كرت RTX20XX 14', 'تجميعات مع كرت RTX20XX 14', 'PC GAMING WITH RTX20XX 14', 'PC GAMING WITH RTX20XX 14', 'PC GAMING WITH RTX20XX 14', '3912673697', 'PC GAMING WITH RTX20XX 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 243.00, 281.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(166, 'تجميعات مع كرت RTX20XX 15', 'تجميعات مع كرت RTX20XX 15', 'تجميعات مع كرت RTX20XX 15', 'PC GAMING WITH RTX20XX 15', 'PC GAMING WITH RTX20XX 15', 'PC GAMING WITH RTX20XX 15', '7148712824', 'PC GAMING WITH RTX20XX 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 436.00, 378.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(167, 'تجميعات مع كرت RTX20XX 16', 'تجميعات مع كرت RTX20XX 16', 'تجميعات مع كرت RTX20XX 16', 'PC GAMING WITH RTX20XX 16', 'PC GAMING WITH RTX20XX 16', 'PC GAMING WITH RTX20XX 16', '8624363445', 'PC GAMING WITH RTX20XX 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 467.00, 236.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(168, 'تجميعات مع كرت RTX20XX 17', 'تجميعات مع كرت RTX20XX 17', 'تجميعات مع كرت RTX20XX 17', 'PC GAMING WITH RTX20XX 17', 'PC GAMING WITH RTX20XX 17', 'PC GAMING WITH RTX20XX 17', '5929148571', 'PC GAMING WITH RTX20XX 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 399.00, 98.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(169, 'تجميعات مع كرت RTX20XX 18', 'تجميعات مع كرت RTX20XX 18', 'تجميعات مع كرت RTX20XX 18', 'PC GAMING WITH RTX20XX 18', 'PC GAMING WITH RTX20XX 18', 'PC GAMING WITH RTX20XX 18', '9831828946', 'PC GAMING WITH RTX20XX 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 342.00, 142.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(170, 'تجميعات مع كرت RTX20XX 19', 'تجميعات مع كرت RTX20XX 19', 'تجميعات مع كرت RTX20XX 19', 'PC GAMING WITH RTX20XX 19', 'PC GAMING WITH RTX20XX 19', 'PC GAMING WITH RTX20XX 19', '9558307589', 'PC GAMING WITH RTX20XX 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 326.00, 238.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(171, 'تجميعات مع كرت RTX20XX 20', 'تجميعات مع كرت RTX20XX 20', 'تجميعات مع كرت RTX20XX 20', 'PC GAMING WITH RTX20XX 20', 'PC GAMING WITH RTX20XX 20', 'PC GAMING WITH RTX20XX 20', '8093600934', 'PC GAMING WITH RTX20XX 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 101.00, 59.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(172, 'تجميعات مع كرت RTX20XX 21', 'تجميعات مع كرت RTX20XX 21', 'تجميعات مع كرت RTX20XX 21', 'PC GAMING WITH RTX20XX 21', 'PC GAMING WITH RTX20XX 21', 'PC GAMING WITH RTX20XX 21', '6920904517', 'PC GAMING WITH RTX20XX 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 213.00, 146.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(173, 'تجميعات مع كرت RTX20XX 22', 'تجميعات مع كرت RTX20XX 22', 'تجميعات مع كرت RTX20XX 22', 'PC GAMING WITH RTX20XX 22', 'PC GAMING WITH RTX20XX 22', 'PC GAMING WITH RTX20XX 22', '9923164423', 'PC GAMING WITH RTX20XX 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 464.00, 97.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(174, 'تجميعات مع كرت RTX20XX 23', 'تجميعات مع كرت RTX20XX 23', 'تجميعات مع كرت RTX20XX 23', 'PC GAMING WITH RTX20XX 23', 'PC GAMING WITH RTX20XX 23', 'PC GAMING WITH RTX20XX 23', '4887738203', 'PC GAMING WITH RTX20XX 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 379.00, 340.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(175, 'تجميعات مع كرت RTX20XX 24', 'تجميعات مع كرت RTX20XX 24', 'تجميعات مع كرت RTX20XX 24', 'PC GAMING WITH RTX20XX 24', 'PC GAMING WITH RTX20XX 24', 'PC GAMING WITH RTX20XX 24', '5944460860', 'PC GAMING WITH RTX20XX 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 318.00, 318.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(176, 'تجميعات مع كرت RTX20XX 25', 'تجميعات مع كرت RTX20XX 25', 'تجميعات مع كرت RTX20XX 25', 'PC GAMING WITH RTX20XX 25', 'PC GAMING WITH RTX20XX 25', 'PC GAMING WITH RTX20XX 25', '1848721225', 'PC GAMING WITH RTX20XX 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 347.00, 279.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(177, 'تجميعات مع كرت RTX20XX 26', 'تجميعات مع كرت RTX20XX 26', 'تجميعات مع كرت RTX20XX 26', 'PC GAMING WITH RTX20XX 26', 'PC GAMING WITH RTX20XX 26', 'PC GAMING WITH RTX20XX 26', '2305854542', 'PC GAMING WITH RTX20XX 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 441.00, 78.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(178, 'تجميعات مع كرت RTX20XX 27', 'تجميعات مع كرت RTX20XX 27', 'تجميعات مع كرت RTX20XX 27', 'PC GAMING WITH RTX20XX 27', 'PC GAMING WITH RTX20XX 27', 'PC GAMING WITH RTX20XX 27', '9211313191', 'PC GAMING WITH RTX20XX 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 224.00, 284.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(179, 'تجميعات مع كرت RTX20XX 28', 'تجميعات مع كرت RTX20XX 28', 'تجميعات مع كرت RTX20XX 28', 'PC GAMING WITH RTX20XX 28', 'PC GAMING WITH RTX20XX 28', 'PC GAMING WITH RTX20XX 28', '1359662222', 'PC GAMING WITH RTX20XX 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 377.00, 84.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(180, 'تجميعات مع كرت RTX20XX 29', 'تجميعات مع كرت RTX20XX 29', 'تجميعات مع كرت RTX20XX 29', 'PC GAMING WITH RTX20XX 29', 'PC GAMING WITH RTX20XX 29', 'PC GAMING WITH RTX20XX 29', '3024220129', 'PC GAMING WITH RTX20XX 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 257.00, 223.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(181, 'تجميعات مع كرت RTX20XX 30', 'تجميعات مع كرت RTX20XX 30', 'تجميعات مع كرت RTX20XX 30', 'PC GAMING WITH RTX20XX 30', 'PC GAMING WITH RTX20XX 30', 'PC GAMING WITH RTX20XX 30', '1190528413', 'PC GAMING WITH RTX20XX 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 338.00, 394.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(182, 'تجميعات مع كرت RTX20XX 31', 'تجميعات مع كرت RTX20XX 31', 'تجميعات مع كرت RTX20XX 31', 'PC GAMING WITH RTX20XX 31', 'PC GAMING WITH RTX20XX 31', 'PC GAMING WITH RTX20XX 31', '1846868331', 'PC GAMING WITH RTX20XX 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 330.00, 314.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(183, 'تجميعات مع كرت RTX20XX 32', 'تجميعات مع كرت RTX20XX 32', 'تجميعات مع كرت RTX20XX 32', 'PC GAMING WITH RTX20XX 32', 'PC GAMING WITH RTX20XX 32', 'PC GAMING WITH RTX20XX 32', '2263670835', 'PC GAMING WITH RTX20XX 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 277.00, 381.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(184, 'تجميعات مع كرت RTX20XX 33', 'تجميعات مع كرت RTX20XX 33', 'تجميعات مع كرت RTX20XX 33', 'PC GAMING WITH RTX20XX 33', 'PC GAMING WITH RTX20XX 33', 'PC GAMING WITH RTX20XX 33', '6188191023', 'PC GAMING WITH RTX20XX 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 421.00, 383.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(185, 'تجميعات مع كرت RTX20XX 34', 'تجميعات مع كرت RTX20XX 34', 'تجميعات مع كرت RTX20XX 34', 'PC GAMING WITH RTX20XX 34', 'PC GAMING WITH RTX20XX 34', 'PC GAMING WITH RTX20XX 34', '2104654117', 'PC GAMING WITH RTX20XX 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 391.00, 297.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(186, 'تجميعات مع كرت RTX20XX 35', 'تجميعات مع كرت RTX20XX 35', 'تجميعات مع كرت RTX20XX 35', 'PC GAMING WITH RTX20XX 35', 'PC GAMING WITH RTX20XX 35', 'PC GAMING WITH RTX20XX 35', '8475428498', 'PC GAMING WITH RTX20XX 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 451.00, 343.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(187, 'تجميعات مع كرت RTX20XX 36', 'تجميعات مع كرت RTX20XX 36', 'تجميعات مع كرت RTX20XX 36', 'PC GAMING WITH RTX20XX 36', 'PC GAMING WITH RTX20XX 36', 'PC GAMING WITH RTX20XX 36', '1201775355', 'PC GAMING WITH RTX20XX 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 369.00, 70.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(188, 'تجميعات مع كرت RTX20XX 37', 'تجميعات مع كرت RTX20XX 37', 'تجميعات مع كرت RTX20XX 37', 'PC GAMING WITH RTX20XX 37', 'PC GAMING WITH RTX20XX 37', 'PC GAMING WITH RTX20XX 37', '3747120843', 'PC GAMING WITH RTX20XX 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 123.00, 190.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(189, 'تجميعات مع كرت RTX20XX 38', 'تجميعات مع كرت RTX20XX 38', 'تجميعات مع كرت RTX20XX 38', 'PC GAMING WITH RTX20XX 38', 'PC GAMING WITH RTX20XX 38', 'PC GAMING WITH RTX20XX 38', '3531307274', 'PC GAMING WITH RTX20XX 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 122.00, 256.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(190, 'تجميعات مع كرت RTX20XX 39', 'تجميعات مع كرت RTX20XX 39', 'تجميعات مع كرت RTX20XX 39', 'PC GAMING WITH RTX20XX 39', 'PC GAMING WITH RTX20XX 39', 'PC GAMING WITH RTX20XX 39', '5547864030', 'PC GAMING WITH RTX20XX 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 174.00, 134.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(191, 'تجميعات مع كرت RTX20XX 40', 'تجميعات مع كرت RTX20XX 40', 'تجميعات مع كرت RTX20XX 40', 'PC GAMING WITH RTX20XX 40', 'PC GAMING WITH RTX20XX 40', 'PC GAMING WITH RTX20XX 40', '9281521698', 'PC GAMING WITH RTX20XX 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 311.00, 325.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(192, 'تجميعات مع كرت RTX20XX 41', 'تجميعات مع كرت RTX20XX 41', 'تجميعات مع كرت RTX20XX 41', 'PC GAMING WITH RTX20XX 41', 'PC GAMING WITH RTX20XX 41', 'PC GAMING WITH RTX20XX 41', '2823471924', 'PC GAMING WITH RTX20XX 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 373.00, 136.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(193, 'تجميعات مع كرت RTX20XX 42', 'تجميعات مع كرت RTX20XX 42', 'تجميعات مع كرت RTX20XX 42', 'PC GAMING WITH RTX20XX 42', 'PC GAMING WITH RTX20XX 42', 'PC GAMING WITH RTX20XX 42', '4857357564', 'PC GAMING WITH RTX20XX 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 395.00, 362.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(194, 'تجميعات مع كرت RTX20XX 43', 'تجميعات مع كرت RTX20XX 43', 'تجميعات مع كرت RTX20XX 43', 'PC GAMING WITH RTX20XX 43', 'PC GAMING WITH RTX20XX 43', 'PC GAMING WITH RTX20XX 43', '9664326625', 'PC GAMING WITH RTX20XX 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 200.00, 234.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(195, 'تجميعات مع كرت RTX20XX 44', 'تجميعات مع كرت RTX20XX 44', 'تجميعات مع كرت RTX20XX 44', 'PC GAMING WITH RTX20XX 44', 'PC GAMING WITH RTX20XX 44', 'PC GAMING WITH RTX20XX 44', '9414319318', 'PC GAMING WITH RTX20XX 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 411.00, 200.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(196, 'تجميعات مع كرت RTX20XX 45', 'تجميعات مع كرت RTX20XX 45', 'تجميعات مع كرت RTX20XX 45', 'PC GAMING WITH RTX20XX 45', 'PC GAMING WITH RTX20XX 45', 'PC GAMING WITH RTX20XX 45', '3495669215', 'PC GAMING WITH RTX20XX 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 229.00, 240.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(197, 'تجميعات مع كرت RTX20XX 46', 'تجميعات مع كرت RTX20XX 46', 'تجميعات مع كرت RTX20XX 46', 'PC GAMING WITH RTX20XX 46', 'PC GAMING WITH RTX20XX 46', 'PC GAMING WITH RTX20XX 46', '5661795343', 'PC GAMING WITH RTX20XX 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 435.00, 239.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(198, 'تجميعات مع كرت RTX20XX 47', 'تجميعات مع كرت RTX20XX 47', 'تجميعات مع كرت RTX20XX 47', 'PC GAMING WITH RTX20XX 47', 'PC GAMING WITH RTX20XX 47', 'PC GAMING WITH RTX20XX 47', '1987365161', 'PC GAMING WITH RTX20XX 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 149.00, 285.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(199, 'تجميعات مع كرت RTX20XX 48', 'تجميعات مع كرت RTX20XX 48', 'تجميعات مع كرت RTX20XX 48', 'PC GAMING WITH RTX20XX 48', 'PC GAMING WITH RTX20XX 48', 'PC GAMING WITH RTX20XX 48', '1477374581', 'PC GAMING WITH RTX20XX 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 160.00, 143.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(200, 'تجميعات مع كرت RTX20XX 49', 'تجميعات مع كرت RTX20XX 49', 'تجميعات مع كرت RTX20XX 49', 'PC GAMING WITH RTX20XX 49', 'PC GAMING WITH RTX20XX 49', 'PC GAMING WITH RTX20XX 49', '3502347084', 'PC GAMING WITH RTX20XX 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 439.00, 75.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(201, 'تجميعات مع كرت RTX30XX 0', 'تجميعات مع كرت RTX30XX 0', 'تجميعات مع كرت RTX30XX 0', 'PC GAMING WITH RTX30XX 0', 'PC GAMING WITH RTX30XX 0', 'PC GAMING WITH RTX30XX 0', '7668601846', 'PC GAMING WITH RTX30XX 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 364.00, 267.00, NULL, '2022-04-04 10:32:01', '2022-07-10 05:53:53', 1, 0, 1, NULL, 0),
(202, 'تجميعات مع كرت RTX30XX 1', 'تجميعات مع كرت RTX30XX 1', 'تجميعات مع كرت RTX30XX 1', 'PC GAMING WITH RTX30XX 1', 'PC GAMING WITH RTX30XX 1', 'PC GAMING WITH RTX30XX 1', '4648403507', 'PC GAMING WITH RTX30XX 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 367.00, 360.00, NULL, '2022-04-04 10:32:01', '2022-07-10 05:53:53', 1, 0, 0, NULL, 0),
(203, 'تجميعات مع كرت RTX30XX 2', 'تجميعات مع كرت RTX30XX 2', 'تجميعات مع كرت RTX30XX 2', 'PC GAMING WITH RTX30XX 2', 'PC GAMING WITH RTX30XX 2', 'PC GAMING WITH RTX30XX 2', '1846166027', 'PC GAMING WITH RTX30XX 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 266.00, 279.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(204, 'تجميعات مع كرت RTX30XX 3', 'تجميعات مع كرت RTX30XX 3', 'تجميعات مع كرت RTX30XX 3', 'PC GAMING WITH RTX30XX 3', 'PC GAMING WITH RTX30XX 3', 'PC GAMING WITH RTX30XX 3', '7592866209', 'PC GAMING WITH RTX30XX 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 180.00, 187.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(205, 'تجميعات مع كرت RTX30XX 4', 'تجميعات مع كرت RTX30XX 4', 'تجميعات مع كرت RTX30XX 4', 'PC GAMING WITH RTX30XX 4', 'PC GAMING WITH RTX30XX 4', 'PC GAMING WITH RTX30XX 4', '3902541055', 'PC GAMING WITH RTX30XX 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 354.00, 311.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(206, 'تجميعات مع كرت RTX30XX 5', 'تجميعات مع كرت RTX30XX 5', 'تجميعات مع كرت RTX30XX 5', 'PC GAMING WITH RTX30XX 5', 'PC GAMING WITH RTX30XX 5', 'PC GAMING WITH RTX30XX 5', '5432615661', 'PC GAMING WITH RTX30XX 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 197.00, 162.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(207, 'تجميعات مع كرت RTX30XX 6', 'تجميعات مع كرت RTX30XX 6', 'تجميعات مع كرت RTX30XX 6', 'PC GAMING WITH RTX30XX 6', 'PC GAMING WITH RTX30XX 6', 'PC GAMING WITH RTX30XX 6', '2736872311', 'PC GAMING WITH RTX30XX 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 382.00, 236.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(208, 'تجميعات مع كرت RTX30XX 7', 'تجميعات مع كرت RTX30XX 7', 'تجميعات مع كرت RTX30XX 7', 'PC GAMING WITH RTX30XX 7', 'PC GAMING WITH RTX30XX 7', 'PC GAMING WITH RTX30XX 7', '5711813931', 'PC GAMING WITH RTX30XX 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 441.00, 137.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(209, 'تجميعات مع كرت RTX30XX 8', 'تجميعات مع كرت RTX30XX 8', 'تجميعات مع كرت RTX30XX 8', 'PC GAMING WITH RTX30XX 8', 'PC GAMING WITH RTX30XX 8', 'PC GAMING WITH RTX30XX 8', '4111427590', 'PC GAMING WITH RTX30XX 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 125.00, 185.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(210, 'تجميعات مع كرت RTX30XX 9', 'تجميعات مع كرت RTX30XX 9', 'تجميعات مع كرت RTX30XX 9', 'PC GAMING WITH RTX30XX 9', 'PC GAMING WITH RTX30XX 9', 'PC GAMING WITH RTX30XX 9', '9766685321', 'PC GAMING WITH RTX30XX 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 297.00, 385.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(211, 'تجميعات مع كرت RTX30XX 10', 'تجميعات مع كرت RTX30XX 10', 'تجميعات مع كرت RTX30XX 10', 'PC GAMING WITH RTX30XX 10', 'PC GAMING WITH RTX30XX 10', 'PC GAMING WITH RTX30XX 10', '9388821640', 'PC GAMING WITH RTX30XX 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 310.00, 271.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(212, 'تجميعات مع كرت RTX30XX 11', 'تجميعات مع كرت RTX30XX 11', 'تجميعات مع كرت RTX30XX 11', 'PC GAMING WITH RTX30XX 11', 'PC GAMING WITH RTX30XX 11', 'PC GAMING WITH RTX30XX 11', '4128135228', 'PC GAMING WITH RTX30XX 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 410.00, 115.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(213, 'تجميعات مع كرت RTX30XX 12', 'تجميعات مع كرت RTX30XX 12', 'تجميعات مع كرت RTX30XX 12', 'PC GAMING WITH RTX30XX 12', 'PC GAMING WITH RTX30XX 12', 'PC GAMING WITH RTX30XX 12', '5739947023', 'PC GAMING WITH RTX30XX 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 365.00, 123.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(214, 'تجميعات مع كرت RTX30XX 13', 'تجميعات مع كرت RTX30XX 13', 'تجميعات مع كرت RTX30XX 13', 'PC GAMING WITH RTX30XX 13', 'PC GAMING WITH RTX30XX 13', 'PC GAMING WITH RTX30XX 13', '4234429550', 'PC GAMING WITH RTX30XX 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 470.00, 264.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(215, 'تجميعات مع كرت RTX30XX 14', 'تجميعات مع كرت RTX30XX 14', 'تجميعات مع كرت RTX30XX 14', 'PC GAMING WITH RTX30XX 14', 'PC GAMING WITH RTX30XX 14', 'PC GAMING WITH RTX30XX 14', '4833469436', 'PC GAMING WITH RTX30XX 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 165.00, 395.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 1, NULL, 0),
(216, 'تجميعات مع كرت RTX30XX 15', 'تجميعات مع كرت RTX30XX 15', 'تجميعات مع كرت RTX30XX 15', 'PC GAMING WITH RTX30XX 15', 'PC GAMING WITH RTX30XX 15', 'PC GAMING WITH RTX30XX 15', '501322751', 'PC GAMING WITH RTX30XX 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 435.00, 307.00, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 1, 0, 0, NULL, 0),
(217, 'تجميعات مع كرت RTX30XX 16', 'تجميعات مع كرت RTX30XX 16', 'تجميعات مع كرت RTX30XX 16', 'PC GAMING WITH RTX30XX 16', 'PC GAMING WITH RTX30XX 16', 'PC GAMING WITH RTX30XX 16', '9984421816', 'PC GAMING WITH RTX30XX 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 248.00, 257.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(218, 'تجميعات مع كرت RTX30XX 17', 'تجميعات مع كرت RTX30XX 17', 'تجميعات مع كرت RTX30XX 17', 'PC GAMING WITH RTX30XX 17', 'PC GAMING WITH RTX30XX 17', 'PC GAMING WITH RTX30XX 17', '4750272375', 'PC GAMING WITH RTX30XX 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 195.00, 380.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(219, 'تجميعات مع كرت RTX30XX 18', 'تجميعات مع كرت RTX30XX 18', 'تجميعات مع كرت RTX30XX 18', 'PC GAMING WITH RTX30XX 18', 'PC GAMING WITH RTX30XX 18', 'PC GAMING WITH RTX30XX 18', '4637665776', 'PC GAMING WITH RTX30XX 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 459.00, 348.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(220, 'تجميعات مع كرت RTX30XX 19', 'تجميعات مع كرت RTX30XX 19', 'تجميعات مع كرت RTX30XX 19', 'PC GAMING WITH RTX30XX 19', 'PC GAMING WITH RTX30XX 19', 'PC GAMING WITH RTX30XX 19', '5343193202', 'PC GAMING WITH RTX30XX 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 283.00, 376.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(221, 'تجميعات مع كرت RTX30XX 20', 'تجميعات مع كرت RTX30XX 20', 'تجميعات مع كرت RTX30XX 20', 'PC GAMING WITH RTX30XX 20', 'PC GAMING WITH RTX30XX 20', 'PC GAMING WITH RTX30XX 20', '7144624774', 'PC GAMING WITH RTX30XX 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 112.00, 95.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(222, 'تجميعات مع كرت RTX30XX 21', 'تجميعات مع كرت RTX30XX 21', 'تجميعات مع كرت RTX30XX 21', 'PC GAMING WITH RTX30XX 21', 'PC GAMING WITH RTX30XX 21', 'PC GAMING WITH RTX30XX 21', '4761925911', 'PC GAMING WITH RTX30XX 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 251.00, 382.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(223, 'تجميعات مع كرت RTX30XX 22', 'تجميعات مع كرت RTX30XX 22', 'تجميعات مع كرت RTX30XX 22', 'PC GAMING WITH RTX30XX 22', 'PC GAMING WITH RTX30XX 22', 'PC GAMING WITH RTX30XX 22', '1965140269', 'PC GAMING WITH RTX30XX 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 446.00, 79.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(224, 'تجميعات مع كرت RTX30XX 23', 'تجميعات مع كرت RTX30XX 23', 'تجميعات مع كرت RTX30XX 23', 'PC GAMING WITH RTX30XX 23', 'PC GAMING WITH RTX30XX 23', 'PC GAMING WITH RTX30XX 23', '3018411720', 'PC GAMING WITH RTX30XX 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 386.00, 151.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(225, 'تجميعات مع كرت RTX30XX 24', 'تجميعات مع كرت RTX30XX 24', 'تجميعات مع كرت RTX30XX 24', 'PC GAMING WITH RTX30XX 24', 'PC GAMING WITH RTX30XX 24', 'PC GAMING WITH RTX30XX 24', '4235243919', 'PC GAMING WITH RTX30XX 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 107.00, 246.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(226, 'تجميعات مع كرت RTX30XX 25', 'تجميعات مع كرت RTX30XX 25', 'تجميعات مع كرت RTX30XX 25', 'PC GAMING WITH RTX30XX 25', 'PC GAMING WITH RTX30XX 25', 'PC GAMING WITH RTX30XX 25', '167978678', 'PC GAMING WITH RTX30XX 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 238.00, 236.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(227, 'تجميعات مع كرت RTX30XX 26', 'تجميعات مع كرت RTX30XX 26', 'تجميعات مع كرت RTX30XX 26', 'PC GAMING WITH RTX30XX 26', 'PC GAMING WITH RTX30XX 26', 'PC GAMING WITH RTX30XX 26', '3874212581', 'PC GAMING WITH RTX30XX 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 103.00, 182.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(228, 'تجميعات مع كرت RTX30XX 27', 'تجميعات مع كرت RTX30XX 27', 'تجميعات مع كرت RTX30XX 27', 'PC GAMING WITH RTX30XX 27', 'PC GAMING WITH RTX30XX 27', 'PC GAMING WITH RTX30XX 27', '9042184318', 'PC GAMING WITH RTX30XX 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 318.00, 117.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(229, 'تجميعات مع كرت RTX30XX 28', 'تجميعات مع كرت RTX30XX 28', 'تجميعات مع كرت RTX30XX 28', 'PC GAMING WITH RTX30XX 28', 'PC GAMING WITH RTX30XX 28', 'PC GAMING WITH RTX30XX 28', '2683346538', 'PC GAMING WITH RTX30XX 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 381.00, 142.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(230, 'تجميعات مع كرت RTX30XX 29', 'تجميعات مع كرت RTX30XX 29', 'تجميعات مع كرت RTX30XX 29', 'PC GAMING WITH RTX30XX 29', 'PC GAMING WITH RTX30XX 29', 'PC GAMING WITH RTX30XX 29', '698410148', 'PC GAMING WITH RTX30XX 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 294.00, 399.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(231, 'تجميعات مع كرت RTX30XX 30', 'تجميعات مع كرت RTX30XX 30', 'تجميعات مع كرت RTX30XX 30', 'PC GAMING WITH RTX30XX 30', 'PC GAMING WITH RTX30XX 30', 'PC GAMING WITH RTX30XX 30', '6004822002', 'PC GAMING WITH RTX30XX 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 203.00, 366.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(232, 'تجميعات مع كرت RTX30XX 31', 'تجميعات مع كرت RTX30XX 31', 'تجميعات مع كرت RTX30XX 31', 'PC GAMING WITH RTX30XX 31', 'PC GAMING WITH RTX30XX 31', 'PC GAMING WITH RTX30XX 31', '5400713584', 'PC GAMING WITH RTX30XX 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 489.00, 396.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(233, 'تجميعات مع كرت RTX30XX 32', 'تجميعات مع كرت RTX30XX 32', 'تجميعات مع كرت RTX30XX 32', 'PC GAMING WITH RTX30XX 32', 'PC GAMING WITH RTX30XX 32', 'PC GAMING WITH RTX30XX 32', '8641905706', 'PC GAMING WITH RTX30XX 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 107.00, 339.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(234, 'تجميعات مع كرت RTX30XX 33', 'تجميعات مع كرت RTX30XX 33', 'تجميعات مع كرت RTX30XX 33', 'PC GAMING WITH RTX30XX 33', 'PC GAMING WITH RTX30XX 33', 'PC GAMING WITH RTX30XX 33', '9311521225', 'PC GAMING WITH RTX30XX 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 235.00, 357.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(235, 'تجميعات مع كرت RTX30XX 34', 'تجميعات مع كرت RTX30XX 34', 'تجميعات مع كرت RTX30XX 34', 'PC GAMING WITH RTX30XX 34', 'PC GAMING WITH RTX30XX 34', 'PC GAMING WITH RTX30XX 34', '4092996019', 'PC GAMING WITH RTX30XX 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 244.00, 258.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(236, 'تجميعات مع كرت RTX30XX 35', 'تجميعات مع كرت RTX30XX 35', 'تجميعات مع كرت RTX30XX 35', 'PC GAMING WITH RTX30XX 35', 'PC GAMING WITH RTX30XX 35', 'PC GAMING WITH RTX30XX 35', '8729190468', 'PC GAMING WITH RTX30XX 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 271.00, 332.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(237, 'تجميعات مع كرت RTX30XX 36', 'تجميعات مع كرت RTX30XX 36', 'تجميعات مع كرت RTX30XX 36', 'PC GAMING WITH RTX30XX 36', 'PC GAMING WITH RTX30XX 36', 'PC GAMING WITH RTX30XX 36', '8133281141', 'PC GAMING WITH RTX30XX 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 230.00, 122.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(238, 'تجميعات مع كرت RTX30XX 37', 'تجميعات مع كرت RTX30XX 37', 'تجميعات مع كرت RTX30XX 37', 'PC GAMING WITH RTX30XX 37', 'PC GAMING WITH RTX30XX 37', 'PC GAMING WITH RTX30XX 37', '2446475333', 'PC GAMING WITH RTX30XX 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 197.00, 158.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(239, 'تجميعات مع كرت RTX30XX 38', 'تجميعات مع كرت RTX30XX 38', 'تجميعات مع كرت RTX30XX 38', 'PC GAMING WITH RTX30XX 38', 'PC GAMING WITH RTX30XX 38', 'PC GAMING WITH RTX30XX 38', '8575259460', 'PC GAMING WITH RTX30XX 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 257.00, 129.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(240, 'تجميعات مع كرت RTX30XX 39', 'تجميعات مع كرت RTX30XX 39', 'تجميعات مع كرت RTX30XX 39', 'PC GAMING WITH RTX30XX 39', 'PC GAMING WITH RTX30XX 39', 'PC GAMING WITH RTX30XX 39', '6226563502', 'PC GAMING WITH RTX30XX 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 438.00, 382.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(241, 'تجميعات مع كرت RTX30XX 40', 'تجميعات مع كرت RTX30XX 40', 'تجميعات مع كرت RTX30XX 40', 'PC GAMING WITH RTX30XX 40', 'PC GAMING WITH RTX30XX 40', 'PC GAMING WITH RTX30XX 40', '4378050610', 'PC GAMING WITH RTX30XX 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 399.00, 253.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(242, 'تجميعات مع كرت RTX30XX 41', 'تجميعات مع كرت RTX30XX 41', 'تجميعات مع كرت RTX30XX 41', 'PC GAMING WITH RTX30XX 41', 'PC GAMING WITH RTX30XX 41', 'PC GAMING WITH RTX30XX 41', '4538504654', 'PC GAMING WITH RTX30XX 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 265.00, 63.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(243, 'تجميعات مع كرت RTX30XX 42', 'تجميعات مع كرت RTX30XX 42', 'تجميعات مع كرت RTX30XX 42', 'PC GAMING WITH RTX30XX 42', 'PC GAMING WITH RTX30XX 42', 'PC GAMING WITH RTX30XX 42', '8889585663', 'PC GAMING WITH RTX30XX 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 464.00, 136.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(244, 'تجميعات مع كرت RTX30XX 43', 'تجميعات مع كرت RTX30XX 43', 'تجميعات مع كرت RTX30XX 43', 'PC GAMING WITH RTX30XX 43', 'PC GAMING WITH RTX30XX 43', 'PC GAMING WITH RTX30XX 43', '2182345306', 'PC GAMING WITH RTX30XX 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 181.00, 281.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(245, 'تجميعات مع كرت RTX30XX 44', 'تجميعات مع كرت RTX30XX 44', 'تجميعات مع كرت RTX30XX 44', 'PC GAMING WITH RTX30XX 44', 'PC GAMING WITH RTX30XX 44', 'PC GAMING WITH RTX30XX 44', '8781143908', 'PC GAMING WITH RTX30XX 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 370.00, 167.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(246, 'تجميعات مع كرت RTX30XX 45', 'تجميعات مع كرت RTX30XX 45', 'تجميعات مع كرت RTX30XX 45', 'PC GAMING WITH RTX30XX 45', 'PC GAMING WITH RTX30XX 45', 'PC GAMING WITH RTX30XX 45', '7760839290', 'PC GAMING WITH RTX30XX 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 149.00, 211.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(247, 'تجميعات مع كرت RTX30XX 46', 'تجميعات مع كرت RTX30XX 46', 'تجميعات مع كرت RTX30XX 46', 'PC GAMING WITH RTX30XX 46', 'PC GAMING WITH RTX30XX 46', 'PC GAMING WITH RTX30XX 46', '6503130060', 'PC GAMING WITH RTX30XX 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 462.00, 319.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(248, 'تجميعات مع كرت RTX30XX 47', 'تجميعات مع كرت RTX30XX 47', 'تجميعات مع كرت RTX30XX 47', 'PC GAMING WITH RTX30XX 47', 'PC GAMING WITH RTX30XX 47', 'PC GAMING WITH RTX30XX 47', '5497127495', 'PC GAMING WITH RTX30XX 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 499.00, 54.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(249, 'تجميعات مع كرت RTX30XX 48', 'تجميعات مع كرت RTX30XX 48', 'تجميعات مع كرت RTX30XX 48', 'PC GAMING WITH RTX30XX 48', 'PC GAMING WITH RTX30XX 48', 'PC GAMING WITH RTX30XX 48', '676103911', 'PC GAMING WITH RTX30XX 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 417.00, 52.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(250, 'تجميعات مع كرت RTX30XX 49', 'تجميعات مع كرت RTX30XX 49', 'تجميعات مع كرت RTX30XX 49', 'PC GAMING WITH RTX30XX 49', 'PC GAMING WITH RTX30XX 49', 'PC GAMING WITH RTX30XX 49', '4679831174', 'PC GAMING WITH RTX30XX 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 127.00, 114.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(251, 'تجميعات مع كرت  0', 'تجميعات مع كرت  0', 'تجميعات مع كرت  0', 'PC GAMING WITH RX 0', 'PC GAMING WITH RX 0', 'PC GAMING WITH RX 0', '366337317', 'PC GAMING WITH RX 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 123.00, 188.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(252, 'تجميعات مع كرت  1', 'تجميعات مع كرت  1', 'تجميعات مع كرت  1', 'PC GAMING WITH RX 1', 'PC GAMING WITH RX 1', 'PC GAMING WITH RX 1', '6900073345', 'PC GAMING WITH RX 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 385.00, 371.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(253, 'تجميعات مع كرت  2', 'تجميعات مع كرت  2', 'تجميعات مع كرت  2', 'PC GAMING WITH RX 2', 'PC GAMING WITH RX 2', 'PC GAMING WITH RX 2', '9095288934', 'PC GAMING WITH RX 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 224.00, 169.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(254, 'تجميعات مع كرت  3', 'تجميعات مع كرت  3', 'تجميعات مع كرت  3', 'PC GAMING WITH RX 3', 'PC GAMING WITH RX 3', 'PC GAMING WITH RX 3', '1965088376', 'PC GAMING WITH RX 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 490.00, 366.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(255, 'تجميعات مع كرت  4', 'تجميعات مع كرت  4', 'تجميعات مع كرت  4', 'PC GAMING WITH RX 4', 'PC GAMING WITH RX 4', 'PC GAMING WITH RX 4', '5083439055', 'PC GAMING WITH RX 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 137.00, 148.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(256, 'تجميعات مع كرت  5', 'تجميعات مع كرت  5', 'تجميعات مع كرت  5', 'PC GAMING WITH RX 5', 'PC GAMING WITH RX 5', 'PC GAMING WITH RX 5', '6791612411', 'PC GAMING WITH RX 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 248.00, 156.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(257, 'تجميعات مع كرت  6', 'تجميعات مع كرت  6', 'تجميعات مع كرت  6', 'PC GAMING WITH RX 6', 'PC GAMING WITH RX 6', 'PC GAMING WITH RX 6', '8164154247', 'PC GAMING WITH RX 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 390.00, 195.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(258, 'تجميعات مع كرت  7', 'تجميعات مع كرت  7', 'تجميعات مع كرت  7', 'PC GAMING WITH RX 7', 'PC GAMING WITH RX 7', 'PC GAMING WITH RX 7', '4093534829', 'PC GAMING WITH RX 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 343.00, 76.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(259, 'تجميعات مع كرت  8', 'تجميعات مع كرت  8', 'تجميعات مع كرت  8', 'PC GAMING WITH RX 8', 'PC GAMING WITH RX 8', 'PC GAMING WITH RX 8', '6582442255', 'PC GAMING WITH RX 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 481.00, 113.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(260, 'تجميعات مع كرت  9', 'تجميعات مع كرت  9', 'تجميعات مع كرت  9', 'PC GAMING WITH RX 9', 'PC GAMING WITH RX 9', 'PC GAMING WITH RX 9', '175817962', 'PC GAMING WITH RX 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 376.00, 315.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(261, 'تجميعات مع كرت  10', 'تجميعات مع كرت  10', 'تجميعات مع كرت  10', 'PC GAMING WITH RX 10', 'PC GAMING WITH RX 10', 'PC GAMING WITH RX 10', '1196936943', 'PC GAMING WITH RX 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 474.00, 197.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(262, 'تجميعات مع كرت  11', 'تجميعات مع كرت  11', 'تجميعات مع كرت  11', 'PC GAMING WITH RX 11', 'PC GAMING WITH RX 11', 'PC GAMING WITH RX 11', '3749027688', 'PC GAMING WITH RX 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 316.00, 107.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(263, 'تجميعات مع كرت  12', 'تجميعات مع كرت  12', 'تجميعات مع كرت  12', 'PC GAMING WITH RX 12', 'PC GAMING WITH RX 12', 'PC GAMING WITH RX 12', '7506022637', 'PC GAMING WITH RX 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 402.00, 320.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(264, 'تجميعات مع كرت  13', 'تجميعات مع كرت  13', 'تجميعات مع كرت  13', 'PC GAMING WITH RX 13', 'PC GAMING WITH RX 13', 'PC GAMING WITH RX 13', '2246733774', 'PC GAMING WITH RX 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 328.00, 329.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(265, 'تجميعات مع كرت  14', 'تجميعات مع كرت  14', 'تجميعات مع كرت  14', 'PC GAMING WITH RX 14', 'PC GAMING WITH RX 14', 'PC GAMING WITH RX 14', '5035920986', 'PC GAMING WITH RX 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 245.00, 369.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(266, 'تجميعات مع كرت  15', 'تجميعات مع كرت  15', 'تجميعات مع كرت  15', 'PC GAMING WITH RX 15', 'PC GAMING WITH RX 15', 'PC GAMING WITH RX 15', '6108355616', 'PC GAMING WITH RX 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 347.00, 242.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(267, 'تجميعات مع كرت  16', 'تجميعات مع كرت  16', 'تجميعات مع كرت  16', 'PC GAMING WITH RX 16', 'PC GAMING WITH RX 16', 'PC GAMING WITH RX 16', '7371825158', 'PC GAMING WITH RX 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 243.00, 169.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(268, 'تجميعات مع كرت  17', 'تجميعات مع كرت  17', 'تجميعات مع كرت  17', 'PC GAMING WITH RX 17', 'PC GAMING WITH RX 17', 'PC GAMING WITH RX 17', '4689930934', 'PC GAMING WITH RX 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 197.00, 276.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(269, 'تجميعات مع كرت  18', 'تجميعات مع كرت  18', 'تجميعات مع كرت  18', 'PC GAMING WITH RX 18', 'PC GAMING WITH RX 18', 'PC GAMING WITH RX 18', '7933540807', 'PC GAMING WITH RX 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 477.00, 261.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(270, 'تجميعات مع كرت  19', 'تجميعات مع كرت  19', 'تجميعات مع كرت  19', 'PC GAMING WITH RX 19', 'PC GAMING WITH RX 19', 'PC GAMING WITH RX 19', '2606824432', 'PC GAMING WITH RX 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 497.00, 74.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(271, 'تجميعات مع كرت  20', 'تجميعات مع كرت  20', 'تجميعات مع كرت  20', 'PC GAMING WITH RX 20', 'PC GAMING WITH RX 20', 'PC GAMING WITH RX 20', '1734353721', 'PC GAMING WITH RX 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 361.00, 394.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(272, 'تجميعات مع كرت  21', 'تجميعات مع كرت  21', 'تجميعات مع كرت  21', 'PC GAMING WITH RX 21', 'PC GAMING WITH RX 21', 'PC GAMING WITH RX 21', '5293778581', 'PC GAMING WITH RX 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 126.00, 242.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(273, 'تجميعات مع كرت  22', 'تجميعات مع كرت  22', 'تجميعات مع كرت  22', 'PC GAMING WITH RX 22', 'PC GAMING WITH RX 22', 'PC GAMING WITH RX 22', '3076095096', 'PC GAMING WITH RX 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 159.00, 192.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(274, 'تجميعات مع كرت  23', 'تجميعات مع كرت  23', 'تجميعات مع كرت  23', 'PC GAMING WITH RX 23', 'PC GAMING WITH RX 23', 'PC GAMING WITH RX 23', '9344087176', 'PC GAMING WITH RX 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 172.00, 388.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(275, 'تجميعات مع كرت  24', 'تجميعات مع كرت  24', 'تجميعات مع كرت  24', 'PC GAMING WITH RX 24', 'PC GAMING WITH RX 24', 'PC GAMING WITH RX 24', '1322246068', 'PC GAMING WITH RX 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 415.00, 325.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(276, 'تجميعات مع كرت  25', 'تجميعات مع كرت  25', 'تجميعات مع كرت  25', 'PC GAMING WITH RX 25', 'PC GAMING WITH RX 25', 'PC GAMING WITH RX 25', '2386515817', 'PC GAMING WITH RX 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 358.00, 81.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(277, 'تجميعات مع كرت  26', 'تجميعات مع كرت  26', 'تجميعات مع كرت  26', 'PC GAMING WITH RX 26', 'PC GAMING WITH RX 26', 'PC GAMING WITH RX 26', '9337926977', 'PC GAMING WITH RX 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 385.00, 61.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(278, 'تجميعات مع كرت  27', 'تجميعات مع كرت  27', 'تجميعات مع كرت  27', 'PC GAMING WITH RX 27', 'PC GAMING WITH RX 27', 'PC GAMING WITH RX 27', '9396648594', 'PC GAMING WITH RX 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 306.00, 61.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(279, 'تجميعات مع كرت  28', 'تجميعات مع كرت  28', 'تجميعات مع كرت  28', 'PC GAMING WITH RX 28', 'PC GAMING WITH RX 28', 'PC GAMING WITH RX 28', '5187334802', 'PC GAMING WITH RX 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 317.00, 366.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(280, 'تجميعات مع كرت  29', 'تجميعات مع كرت  29', 'تجميعات مع كرت  29', 'PC GAMING WITH RX 29', 'PC GAMING WITH RX 29', 'PC GAMING WITH RX 29', '9416383775', 'PC GAMING WITH RX 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 162.00, 57.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(281, 'تجميعات مع كرت  30', 'تجميعات مع كرت  30', 'تجميعات مع كرت  30', 'PC GAMING WITH RX 30', 'PC GAMING WITH RX 30', 'PC GAMING WITH RX 30', '140543384', 'PC GAMING WITH RX 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 393.00, 66.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(282, 'تجميعات مع كرت  31', 'تجميعات مع كرت  31', 'تجميعات مع كرت  31', 'PC GAMING WITH RX 31', 'PC GAMING WITH RX 31', 'PC GAMING WITH RX 31', '3394412928', 'PC GAMING WITH RX 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 237.00, 178.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(283, 'تجميعات مع كرت  32', 'تجميعات مع كرت  32', 'تجميعات مع كرت  32', 'PC GAMING WITH RX 32', 'PC GAMING WITH RX 32', 'PC GAMING WITH RX 32', '6834907780', 'PC GAMING WITH RX 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 306.00, 201.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(284, 'تجميعات مع كرت  33', 'تجميعات مع كرت  33', 'تجميعات مع كرت  33', 'PC GAMING WITH RX 33', 'PC GAMING WITH RX 33', 'PC GAMING WITH RX 33', '6769337131', 'PC GAMING WITH RX 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 445.00, 132.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(285, 'تجميعات مع كرت  34', 'تجميعات مع كرت  34', 'تجميعات مع كرت  34', 'PC GAMING WITH RX 34', 'PC GAMING WITH RX 34', 'PC GAMING WITH RX 34', '1393539107', 'PC GAMING WITH RX 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 295.00, 216.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(286, 'تجميعات مع كرت  35', 'تجميعات مع كرت  35', 'تجميعات مع كرت  35', 'PC GAMING WITH RX 35', 'PC GAMING WITH RX 35', 'PC GAMING WITH RX 35', '1285060503', 'PC GAMING WITH RX 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 252.00, 249.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(287, 'تجميعات مع كرت  36', 'تجميعات مع كرت  36', 'تجميعات مع كرت  36', 'PC GAMING WITH RX 36', 'PC GAMING WITH RX 36', 'PC GAMING WITH RX 36', '7860896067', 'PC GAMING WITH RX 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 226.00, 321.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(288, 'تجميعات مع كرت  37', 'تجميعات مع كرت  37', 'تجميعات مع كرت  37', 'PC GAMING WITH RX 37', 'PC GAMING WITH RX 37', 'PC GAMING WITH RX 37', '5806427589', 'PC GAMING WITH RX 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 454.00, 133.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(289, 'تجميعات مع كرت  38', 'تجميعات مع كرت  38', 'تجميعات مع كرت  38', 'PC GAMING WITH RX 38', 'PC GAMING WITH RX 38', 'PC GAMING WITH RX 38', '55694418', 'PC GAMING WITH RX 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 255.00, 153.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(290, 'تجميعات مع كرت  39', 'تجميعات مع كرت  39', 'تجميعات مع كرت  39', 'PC GAMING WITH RX 39', 'PC GAMING WITH RX 39', 'PC GAMING WITH RX 39', '9312823933', 'PC GAMING WITH RX 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 482.00, 114.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(291, 'تجميعات مع كرت  40', 'تجميعات مع كرت  40', 'تجميعات مع كرت  40', 'PC GAMING WITH RX 40', 'PC GAMING WITH RX 40', 'PC GAMING WITH RX 40', '99344054', 'PC GAMING WITH RX 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 263.00, 138.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(292, 'تجميعات مع كرت  41', 'تجميعات مع كرت  41', 'تجميعات مع كرت  41', 'PC GAMING WITH RX 41', 'PC GAMING WITH RX 41', 'PC GAMING WITH RX 41', '8349132840', 'PC GAMING WITH RX 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 236.00, 266.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(293, 'تجميعات مع كرت  42', 'تجميعات مع كرت  42', 'تجميعات مع كرت  42', 'PC GAMING WITH RX 42', 'PC GAMING WITH RX 42', 'PC GAMING WITH RX 42', '6234528894', 'PC GAMING WITH RX 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 392.00, 99.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(294, 'تجميعات مع كرت  43', 'تجميعات مع كرت  43', 'تجميعات مع كرت  43', 'PC GAMING WITH RX 43', 'PC GAMING WITH RX 43', 'PC GAMING WITH RX 43', '8052194658', 'PC GAMING WITH RX 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 457.00, 241.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(295, 'تجميعات مع كرت  44', 'تجميعات مع كرت  44', 'تجميعات مع كرت  44', 'PC GAMING WITH RX 44', 'PC GAMING WITH RX 44', 'PC GAMING WITH RX 44', '6376602505', 'PC GAMING WITH RX 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 454.00, 101.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(296, 'تجميعات مع كرت  45', 'تجميعات مع كرت  45', 'تجميعات مع كرت  45', 'PC GAMING WITH RX 45', 'PC GAMING WITH RX 45', 'PC GAMING WITH RX 45', '5477439613', 'PC GAMING WITH RX 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 482.00, 263.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(297, 'تجميعات مع كرت  46', 'تجميعات مع كرت  46', 'تجميعات مع كرت  46', 'PC GAMING WITH RX 46', 'PC GAMING WITH RX 46', 'PC GAMING WITH RX 46', '4618392246', 'PC GAMING WITH RX 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 326.00, 374.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(298, 'تجميعات مع كرت  47', 'تجميعات مع كرت  47', 'تجميعات مع كرت  47', 'PC GAMING WITH RX 47', 'PC GAMING WITH RX 47', 'PC GAMING WITH RX 47', '8945518491', 'PC GAMING WITH RX 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 466.00, 138.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(299, 'تجميعات مع كرت  48', 'تجميعات مع كرت  48', 'تجميعات مع كرت  48', 'PC GAMING WITH RX 48', 'PC GAMING WITH RX 48', 'PC GAMING WITH RX 48', '9304104762', 'PC GAMING WITH RX 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 192.00, 204.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(300, 'تجميعات مع كرت  49', 'تجميعات مع كرت  49', 'تجميعات مع كرت  49', 'PC GAMING WITH RX 49', 'PC GAMING WITH RX 49', 'PC GAMING WITH RX 49', '4529127381', 'PC GAMING WITH RX 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 207.00, 250.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(301, 'تتجميعات مع كرت  RX 0', 'تتجميعات مع كرت  RX 0', 'تتجميعات مع كرت  RX 0', 'Custom PCs with AMD 0', 'Custom PCs with AMD 0', 'Custom PCs with AMD 0', '6486676092', 'Custom PCs with AMD 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 495.00, 181.00, NULL, '2022-04-04 10:32:02', '2022-07-09 14:58:05', 1, 0, 1, NULL, 0),
(302, 'تتجميعات مع كرت  RX 1', 'تتجميعات مع كرت  RX 1', 'تتجميعات مع كرت  RX 1', 'Custom PCs with AMD 1', 'Custom PCs with AMD 1', 'Custom PCs with AMD 1', '1615332449', 'Custom PCs with AMD 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 452.00, 216.00, NULL, '2022-04-04 10:32:02', '2022-07-10 05:46:27', 1, 0, 0, NULL, 0),
(303, 'تتجميعات مع كرت  RX 2', 'تتجميعات مع كرت  RX 2', 'تتجميعات مع كرت  RX 2', 'Custom PCs with AMD 2', 'Custom PCs with AMD 2', 'Custom PCs with AMD 2', '326558480', 'Custom PCs with AMD 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 491.00, 325.00, NULL, '2022-04-04 10:32:02', '2022-07-08 23:26:54', 1, 0, 25, NULL, 0),
(304, 'تتجميعات مع كرت  RX 3', 'تتجميعات مع كرت  RX 3', 'تتجميعات مع كرت  RX 3', 'Custom PCs with AMD 3', 'Custom PCs with AMD 3', 'Custom PCs with AMD 3', '4826543174', 'Custom PCs with AMD 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 176.00, 97.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(305, 'تتجميعات مع كرت  RX 4', 'تتجميعات مع كرت  RX 4', 'تتجميعات مع كرت  RX 4', 'Custom PCs with AMD 4', 'Custom PCs with AMD 4', 'Custom PCs with AMD 4', '8554404118', 'Custom PCs with AMD 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 487.00, 354.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(306, 'تتجميعات مع كرت  RX 5', 'تتجميعات مع كرت  RX 5', 'تتجميعات مع كرت  RX 5', 'Custom PCs with AMD 5', 'Custom PCs with AMD 5', 'Custom PCs with AMD 5', '9322734291', 'Custom PCs with AMD 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 101.00, 382.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(307, 'تتجميعات مع كرت  RX 6', 'تتجميعات مع كرت  RX 6', 'تتجميعات مع كرت  RX 6', 'Custom PCs with AMD 6', 'Custom PCs with AMD 6', 'Custom PCs with AMD 6', '3903363171', 'Custom PCs with AMD 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 206.00, 325.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(308, 'تتجميعات مع كرت  RX 7', 'تتجميعات مع كرت  RX 7', 'تتجميعات مع كرت  RX 7', 'Custom PCs with AMD 7', 'Custom PCs with AMD 7', 'Custom PCs with AMD 7', '778592102', 'Custom PCs with AMD 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 115.00, 382.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(309, 'تتجميعات مع كرت  RX 8', 'تتجميعات مع كرت  RX 8', 'تتجميعات مع كرت  RX 8', 'Custom PCs with AMD 8', 'Custom PCs with AMD 8', 'Custom PCs with AMD 8', '9099790965', 'Custom PCs with AMD 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 293.00, 372.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(310, 'تتجميعات مع كرت  RX 9', 'تتجميعات مع كرت  RX 9', 'تتجميعات مع كرت  RX 9', 'Custom PCs with AMD 9', 'Custom PCs with AMD 9', 'Custom PCs with AMD 9', '2226639152', 'Custom PCs with AMD 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 138.00, 315.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(311, 'تتجميعات مع كرت  RX 10', 'تتجميعات مع كرت  RX 10', 'تتجميعات مع كرت  RX 10', 'Custom PCs with AMD 10', 'Custom PCs with AMD 10', 'Custom PCs with AMD 10', '2903281007', 'Custom PCs with AMD 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 145.00, 102.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(312, 'تتجميعات مع كرت  RX 11', 'تتجميعات مع كرت  RX 11', 'تتجميعات مع كرت  RX 11', 'Custom PCs with AMD 11', 'Custom PCs with AMD 11', 'Custom PCs with AMD 11', '7272530267', 'Custom PCs with AMD 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 378.00, 258.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(313, 'تتجميعات مع كرت  RX 12', 'تتجميعات مع كرت  RX 12', 'تتجميعات مع كرت  RX 12', 'Custom PCs with AMD 12', 'Custom PCs with AMD 12', 'Custom PCs with AMD 12', '6464624469', 'Custom PCs with AMD 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 158.00, 305.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(314, 'تتجميعات مع كرت  RX 13', 'تتجميعات مع كرت  RX 13', 'تتجميعات مع كرت  RX 13', 'Custom PCs with AMD 13', 'Custom PCs with AMD 13', 'Custom PCs with AMD 13', '1611724644', 'Custom PCs with AMD 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 278.00, 228.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(315, 'تتجميعات مع كرت  RX 14', 'تتجميعات مع كرت  RX 14', 'تتجميعات مع كرت  RX 14', 'Custom PCs with AMD 14', 'Custom PCs with AMD 14', 'Custom PCs with AMD 14', '994136905', 'Custom PCs with AMD 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 455.00, 344.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(316, 'تتجميعات مع كرت  RX 15', 'تتجميعات مع كرت  RX 15', 'تتجميعات مع كرت  RX 15', 'Custom PCs with AMD 15', 'Custom PCs with AMD 15', 'Custom PCs with AMD 15', '5178510425', 'Custom PCs with AMD 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 143.00, 93.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(317, 'تتجميعات مع كرت  RX 16', 'تتجميعات مع كرت  RX 16', 'تتجميعات مع كرت  RX 16', 'Custom PCs with AMD 16', 'Custom PCs with AMD 16', 'Custom PCs with AMD 16', '5541977031', 'Custom PCs with AMD 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 253.00, 119.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(318, 'تتجميعات مع كرت  RX 17', 'تتجميعات مع كرت  RX 17', 'تتجميعات مع كرت  RX 17', 'Custom PCs with AMD 17', 'Custom PCs with AMD 17', 'Custom PCs with AMD 17', '6842591433', 'Custom PCs with AMD 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 487.00, 311.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(319, 'تتجميعات مع كرت  RX 18', 'تتجميعات مع كرت  RX 18', 'تتجميعات مع كرت  RX 18', 'Custom PCs with AMD 18', 'Custom PCs with AMD 18', 'Custom PCs with AMD 18', '5162916579', 'Custom PCs with AMD 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 437.00, 118.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(320, 'تتجميعات مع كرت  RX 19', 'تتجميعات مع كرت  RX 19', 'تتجميعات مع كرت  RX 19', 'Custom PCs with AMD 19', 'Custom PCs with AMD 19', 'Custom PCs with AMD 19', '1529391594', 'Custom PCs with AMD 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 137.00, 85.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(321, 'تتجميعات مع كرت  RX 20', 'تتجميعات مع كرت  RX 20', 'تتجميعات مع كرت  RX 20', 'Custom PCs with AMD 20', 'Custom PCs with AMD 20', 'Custom PCs with AMD 20', '5967433308', 'Custom PCs with AMD 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 193.00, 155.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(322, 'تتجميعات مع كرت  RX 21', 'تتجميعات مع كرت  RX 21', 'تتجميعات مع كرت  RX 21', 'Custom PCs with AMD 21', 'Custom PCs with AMD 21', 'Custom PCs with AMD 21', '2254448746', 'Custom PCs with AMD 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 161.00, 379.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(323, 'تتجميعات مع كرت  RX 22', 'تتجميعات مع كرت  RX 22', 'تتجميعات مع كرت  RX 22', 'Custom PCs with AMD 22', 'Custom PCs with AMD 22', 'Custom PCs with AMD 22', '4088153461', 'Custom PCs with AMD 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 222.00, 221.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(324, 'تتجميعات مع كرت  RX 23', 'تتجميعات مع كرت  RX 23', 'تتجميعات مع كرت  RX 23', 'Custom PCs with AMD 23', 'Custom PCs with AMD 23', 'Custom PCs with AMD 23', '7269687264', 'Custom PCs with AMD 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 329.00, 159.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(325, 'تتجميعات مع كرت  RX 24', 'تتجميعات مع كرت  RX 24', 'تتجميعات مع كرت  RX 24', 'Custom PCs with AMD 24', 'Custom PCs with AMD 24', 'Custom PCs with AMD 24', '8750189615', 'Custom PCs with AMD 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 451.00, 122.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(326, 'تتجميعات مع كرت  RX 25', 'تتجميعات مع كرت  RX 25', 'تتجميعات مع كرت  RX 25', 'Custom PCs with AMD 25', 'Custom PCs with AMD 25', 'Custom PCs with AMD 25', '9239649617', 'Custom PCs with AMD 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 383.00, 78.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(327, 'تتجميعات مع كرت  RX 26', 'تتجميعات مع كرت  RX 26', 'تتجميعات مع كرت  RX 26', 'Custom PCs with AMD 26', 'Custom PCs with AMD 26', 'Custom PCs with AMD 26', '5064289175', 'Custom PCs with AMD 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 397.00, 120.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(328, 'تتجميعات مع كرت  RX 27', 'تتجميعات مع كرت  RX 27', 'تتجميعات مع كرت  RX 27', 'Custom PCs with AMD 27', 'Custom PCs with AMD 27', 'Custom PCs with AMD 27', '4970847002', 'Custom PCs with AMD 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 494.00, 257.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(329, 'تتجميعات مع كرت  RX 28', 'تتجميعات مع كرت  RX 28', 'تتجميعات مع كرت  RX 28', 'Custom PCs with AMD 28', 'Custom PCs with AMD 28', 'Custom PCs with AMD 28', '7229622013', 'Custom PCs with AMD 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 300.00, 176.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(330, 'تتجميعات مع كرت  RX 29', 'تتجميعات مع كرت  RX 29', 'تتجميعات مع كرت  RX 29', 'Custom PCs with AMD 29', 'Custom PCs with AMD 29', 'Custom PCs with AMD 29', '683770155', 'Custom PCs with AMD 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 398.00, 350.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(331, 'تتجميعات مع كرت  RX 30', 'تتجميعات مع كرت  RX 30', 'تتجميعات مع كرت  RX 30', 'Custom PCs with AMD 30', 'Custom PCs with AMD 30', 'Custom PCs with AMD 30', '2795537230', 'Custom PCs with AMD 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 192.00, 380.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(332, 'تتجميعات مع كرت  RX 31', 'تتجميعات مع كرت  RX 31', 'تتجميعات مع كرت  RX 31', 'Custom PCs with AMD 31', 'Custom PCs with AMD 31', 'Custom PCs with AMD 31', '1705063566', 'Custom PCs with AMD 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 447.00, 100.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(333, 'تتجميعات مع كرت  RX 32', 'تتجميعات مع كرت  RX 32', 'تتجميعات مع كرت  RX 32', 'Custom PCs with AMD 32', 'Custom PCs with AMD 32', 'Custom PCs with AMD 32', '3780125357', 'Custom PCs with AMD 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 308.00, 345.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(334, 'تتجميعات مع كرت  RX 33', 'تتجميعات مع كرت  RX 33', 'تتجميعات مع كرت  RX 33', 'Custom PCs with AMD 33', 'Custom PCs with AMD 33', 'Custom PCs with AMD 33', '4670387016', 'Custom PCs with AMD 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 146.00, 350.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(335, 'تتجميعات مع كرت  RX 34', 'تتجميعات مع كرت  RX 34', 'تتجميعات مع كرت  RX 34', 'Custom PCs with AMD 34', 'Custom PCs with AMD 34', 'Custom PCs with AMD 34', '2335049667', 'Custom PCs with AMD 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 343.00, 190.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(336, 'تتجميعات مع كرت  RX 35', 'تتجميعات مع كرت  RX 35', 'تتجميعات مع كرت  RX 35', 'Custom PCs with AMD 35', 'Custom PCs with AMD 35', 'Custom PCs with AMD 35', '8733040087', 'Custom PCs with AMD 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 159.00, 178.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(337, 'تتجميعات مع كرت  RX 36', 'تتجميعات مع كرت  RX 36', 'تتجميعات مع كرت  RX 36', 'Custom PCs with AMD 36', 'Custom PCs with AMD 36', 'Custom PCs with AMD 36', '4192469522', 'Custom PCs with AMD 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 429.00, 272.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(338, 'تتجميعات مع كرت  RX 37', 'تتجميعات مع كرت  RX 37', 'تتجميعات مع كرت  RX 37', 'Custom PCs with AMD 37', 'Custom PCs with AMD 37', 'Custom PCs with AMD 37', '6534392303', 'Custom PCs with AMD 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 431.00, 358.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(339, 'تتجميعات مع كرت  RX 38', 'تتجميعات مع كرت  RX 38', 'تتجميعات مع كرت  RX 38', 'Custom PCs with AMD 38', 'Custom PCs with AMD 38', 'Custom PCs with AMD 38', '7008213191', 'Custom PCs with AMD 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 348.00, 375.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(340, 'تتجميعات مع كرت  RX 39', 'تتجميعات مع كرت  RX 39', 'تتجميعات مع كرت  RX 39', 'Custom PCs with AMD 39', 'Custom PCs with AMD 39', 'Custom PCs with AMD 39', '7440020417', 'Custom PCs with AMD 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 289.00, 138.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(341, 'تتجميعات مع كرت  RX 40', 'تتجميعات مع كرت  RX 40', 'تتجميعات مع كرت  RX 40', 'Custom PCs with AMD 40', 'Custom PCs with AMD 40', 'Custom PCs with AMD 40', '6835539975', 'Custom PCs with AMD 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 162.00, 207.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(342, 'تتجميعات مع كرت  RX 41', 'تتجميعات مع كرت  RX 41', 'تتجميعات مع كرت  RX 41', 'Custom PCs with AMD 41', 'Custom PCs with AMD 41', 'Custom PCs with AMD 41', '54962103', 'Custom PCs with AMD 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 274.00, 209.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(343, 'تتجميعات مع كرت  RX 42', 'تتجميعات مع كرت  RX 42', 'تتجميعات مع كرت  RX 42', 'Custom PCs with AMD 42', 'Custom PCs with AMD 42', 'Custom PCs with AMD 42', '8650065812', 'Custom PCs with AMD 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 259.00, 304.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(344, 'تتجميعات مع كرت  RX 43', 'تتجميعات مع كرت  RX 43', 'تتجميعات مع كرت  RX 43', 'Custom PCs with AMD 43', 'Custom PCs with AMD 43', 'Custom PCs with AMD 43', '1127571844', 'Custom PCs with AMD 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 472.00, 277.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(345, 'تتجميعات مع كرت  RX 44', 'تتجميعات مع كرت  RX 44', 'تتجميعات مع كرت  RX 44', 'Custom PCs with AMD 44', 'Custom PCs with AMD 44', 'Custom PCs with AMD 44', '7375027593', 'Custom PCs with AMD 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 263.00, 104.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(346, 'تتجميعات مع كرت  RX 45', 'تتجميعات مع كرت  RX 45', 'تتجميعات مع كرت  RX 45', 'Custom PCs with AMD 45', 'Custom PCs with AMD 45', 'Custom PCs with AMD 45', '3411489085', 'Custom PCs with AMD 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 291.00, 303.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(347, 'تتجميعات مع كرت  RX 46', 'تتجميعات مع كرت  RX 46', 'تتجميعات مع كرت  RX 46', 'Custom PCs with AMD 46', 'Custom PCs with AMD 46', 'Custom PCs with AMD 46', '8822917043', 'Custom PCs with AMD 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 348.00, 270.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(348, 'تتجميعات مع كرت  RX 47', 'تتجميعات مع كرت  RX 47', 'تتجميعات مع كرت  RX 47', 'Custom PCs with AMD 47', 'Custom PCs with AMD 47', 'Custom PCs with AMD 47', '2972203288', 'Custom PCs with AMD 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 490.00, 164.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(349, 'تتجميعات مع كرت  RX 48', 'تتجميعات مع كرت  RX 48', 'تتجميعات مع كرت  RX 48', 'Custom PCs with AMD 48', 'Custom PCs with AMD 48', 'Custom PCs with AMD 48', '2031088172', 'Custom PCs with AMD 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 250.00, 323.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(350, 'تتجميعات مع كرت  RX 49', 'تتجميعات مع كرت  RX 49', 'تتجميعات مع كرت  RX 49', 'Custom PCs with AMD 49', 'Custom PCs with AMD 49', 'Custom PCs with AMD 49', '5170719962', 'Custom PCs with AMD 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 182.00, 380.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(351, 'تجميعات مع معالج AMD 0', 'تجميعات مع معالج AMD 0', 'تجميعات مع معالج AMD 0', 'Scalable desktop computers (Without GPU) 0', 'Scalable desktop computers (Without GPU) 0', 'Scalable desktop computers (Without GPU) 0', '5906574890', 'Scalable desktop computers (Without GPU) 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 388.00, 188.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(352, 'تجميعات مع معالج AMD 1', 'تجميعات مع معالج AMD 1', 'تجميعات مع معالج AMD 1', 'Scalable desktop computers (Without GPU) 1', 'Scalable desktop computers (Without GPU) 1', 'Scalable desktop computers (Without GPU) 1', '4462492537', 'Scalable desktop computers (Without GPU) 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 151.00, 324.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(353, 'تجميعات مع معالج AMD 2', 'تجميعات مع معالج AMD 2', 'تجميعات مع معالج AMD 2', 'Scalable desktop computers (Without GPU) 2', 'Scalable desktop computers (Without GPU) 2', 'Scalable desktop computers (Without GPU) 2', '400676082', 'Scalable desktop computers (Without GPU) 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 204.00, 369.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(355, 'تجميعات مع معالج AMD 4', 'تجميعات مع معالج AMD 4', 'تجميعات مع معالج AMD 4', 'Scalable desktop computers (Without GPU) 4', 'Scalable desktop computers (Without GPU) 4', 'Scalable desktop computers (Without GPU) 4', '646890535', 'Scalable desktop computers (Without GPU) 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 500.00, 151.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(356, 'تجميعات مع معالج AMD 5', 'تجميعات مع معالج AMD 5', 'تجميعات مع معالج AMD 5', 'Scalable desktop computers (Without GPU) 5', 'Scalable desktop computers (Without GPU) 5', 'Scalable desktop computers (Without GPU) 5', '9454319878', 'Scalable desktop computers (Without GPU) 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 284.00, 171.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(357, 'تجميعات مع معالج AMD 6', 'تجميعات مع معالج AMD 6', 'تجميعات مع معالج AMD 6', 'Scalable desktop computers (Without GPU) 6', 'Scalable desktop computers (Without GPU) 6', 'Scalable desktop computers (Without GPU) 6', '6606310824', 'Scalable desktop computers (Without GPU) 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 118.00, 90.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(358, 'تجميعات مع معالج AMD 7', 'تجميعات مع معالج AMD 7', 'تجميعات مع معالج AMD 7', 'Scalable desktop computers (Without GPU) 7', 'Scalable desktop computers (Without GPU) 7', 'Scalable desktop computers (Without GPU) 7', '9282342108', 'Scalable desktop computers (Without GPU) 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 468.00, 120.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(359, 'تجميعات مع معالج AMD 8', 'تجميعات مع معالج AMD 8', 'تجميعات مع معالج AMD 8', 'Scalable desktop computers (Without GPU) 8', 'Scalable desktop computers (Without GPU) 8', 'Scalable desktop computers (Without GPU) 8', '3631319879', 'Scalable desktop computers (Without GPU) 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 439.00, 54.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(360, 'تجميعات مع معالج AMD 9', 'تجميعات مع معالج AMD 9', 'تجميعات مع معالج AMD 9', 'Scalable desktop computers (Without GPU) 9', 'Scalable desktop computers (Without GPU) 9', 'Scalable desktop computers (Without GPU) 9', '7626548102', 'Scalable desktop computers (Without GPU) 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 281.00, 395.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(361, 'تجميعات مع معالج AMD 10', 'تجميعات مع معالج AMD 10', 'تجميعات مع معالج AMD 10', 'Scalable desktop computers (Without GPU) 10', 'Scalable desktop computers (Without GPU) 10', 'Scalable desktop computers (Without GPU) 10', '6938154834', 'Scalable desktop computers (Without GPU) 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 103.00, 146.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(362, 'تجميعات مع معالج AMD 11', 'تجميعات مع معالج AMD 11', 'تجميعات مع معالج AMD 11', 'Scalable desktop computers (Without GPU) 11', 'Scalable desktop computers (Without GPU) 11', 'Scalable desktop computers (Without GPU) 11', '470319773', 'Scalable desktop computers (Without GPU) 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 351.00, 155.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(363, 'تجميعات مع معالج AMD 12', 'تجميعات مع معالج AMD 12', 'تجميعات مع معالج AMD 12', 'Scalable desktop computers (Without GPU) 12', 'Scalable desktop computers (Without GPU) 12', 'Scalable desktop computers (Without GPU) 12', '6868727241', 'Scalable desktop computers (Without GPU) 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 224.00, 198.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(364, 'تجميعات مع معالج AMD 13', 'تجميعات مع معالج AMD 13', 'تجميعات مع معالج AMD 13', 'Scalable desktop computers (Without GPU) 13', 'Scalable desktop computers (Without GPU) 13', 'Scalable desktop computers (Without GPU) 13', '4371847357', 'Scalable desktop computers (Without GPU) 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 237.00, 93.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(365, 'تجميعات مع معالج AMD 14', 'تجميعات مع معالج AMD 14', 'تجميعات مع معالج AMD 14', 'Scalable desktop computers (Without GPU) 14', 'Scalable desktop computers (Without GPU) 14', 'Scalable desktop computers (Without GPU) 14', '1147394376', 'Scalable desktop computers (Without GPU) 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 125.00, 273.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(366, 'تجميعات مع معالج AMD 15', 'تجميعات مع معالج AMD 15', 'تجميعات مع معالج AMD 15', 'Scalable desktop computers (Without GPU) 15', 'Scalable desktop computers (Without GPU) 15', 'Scalable desktop computers (Without GPU) 15', '5433304205', 'Scalable desktop computers (Without GPU) 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 173.00, 109.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(367, 'تجميعات مع معالج AMD 16', 'تجميعات مع معالج AMD 16', 'تجميعات مع معالج AMD 16', 'Scalable desktop computers (Without GPU) 16', 'Scalable desktop computers (Without GPU) 16', 'Scalable desktop computers (Without GPU) 16', '9881999374', 'Scalable desktop computers (Without GPU) 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 279.00, 98.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(368, 'تجميعات مع معالج AMD 17', 'تجميعات مع معالج AMD 17', 'تجميعات مع معالج AMD 17', 'Scalable desktop computers (Without GPU) 17', 'Scalable desktop computers (Without GPU) 17', 'Scalable desktop computers (Without GPU) 17', '2588619870', 'Scalable desktop computers (Without GPU) 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 402.00, 175.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(369, 'تجميعات مع معالج AMD 18', 'تجميعات مع معالج AMD 18', 'تجميعات مع معالج AMD 18', 'Scalable desktop computers (Without GPU) 18', 'Scalable desktop computers (Without GPU) 18', 'Scalable desktop computers (Without GPU) 18', '3147378498', 'Scalable desktop computers (Without GPU) 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 121.00, 208.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(370, 'تجميعات مع معالج AMD 19', 'تجميعات مع معالج AMD 19', 'تجميعات مع معالج AMD 19', 'Scalable desktop computers (Without GPU) 19', 'Scalable desktop computers (Without GPU) 19', 'Scalable desktop computers (Without GPU) 19', '4070129884', 'Scalable desktop computers (Without GPU) 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 291.00, 278.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(371, 'تجميعات مع معالج AMD 20', 'تجميعات مع معالج AMD 20', 'تجميعات مع معالج AMD 20', 'Scalable desktop computers (Without GPU) 20', 'Scalable desktop computers (Without GPU) 20', 'Scalable desktop computers (Without GPU) 20', '9563009952', 'Scalable desktop computers (Without GPU) 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 417.00, 162.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(372, 'تجميعات مع معالج AMD 21', 'تجميعات مع معالج AMD 21', 'تجميعات مع معالج AMD 21', 'Scalable desktop computers (Without GPU) 21', 'Scalable desktop computers (Without GPU) 21', 'Scalable desktop computers (Without GPU) 21', '3757653354', 'Scalable desktop computers (Without GPU) 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 127.00, 378.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(373, 'تجميعات مع معالج AMD 22', 'تجميعات مع معالج AMD 22', 'تجميعات مع معالج AMD 22', 'Scalable desktop computers (Without GPU) 22', 'Scalable desktop computers (Without GPU) 22', 'Scalable desktop computers (Without GPU) 22', '7040826225', 'Scalable desktop computers (Without GPU) 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 242.00, 72.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(374, 'تجميعات مع معالج AMD 23', 'تجميعات مع معالج AMD 23', 'تجميعات مع معالج AMD 23', 'Scalable desktop computers (Without GPU) 23', 'Scalable desktop computers (Without GPU) 23', 'Scalable desktop computers (Without GPU) 23', '9290014773', 'Scalable desktop computers (Without GPU) 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 137.00, 348.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(375, 'تجميعات مع معالج AMD 24', 'تجميعات مع معالج AMD 24', 'تجميعات مع معالج AMD 24', 'Scalable desktop computers (Without GPU) 24', 'Scalable desktop computers (Without GPU) 24', 'Scalable desktop computers (Without GPU) 24', '1785319418', 'Scalable desktop computers (Without GPU) 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 257.00, 202.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(376, 'تجميعات مع معالج AMD 25', 'تجميعات مع معالج AMD 25', 'تجميعات مع معالج AMD 25', 'Scalable desktop computers (Without GPU) 25', 'Scalable desktop computers (Without GPU) 25', 'Scalable desktop computers (Without GPU) 25', '9315025908', 'Scalable desktop computers (Without GPU) 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 148.00, 276.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(377, 'تجميعات مع معالج AMD 26', 'تجميعات مع معالج AMD 26', 'تجميعات مع معالج AMD 26', 'Scalable desktop computers (Without GPU) 26', 'Scalable desktop computers (Without GPU) 26', 'Scalable desktop computers (Without GPU) 26', '2081343045', 'Scalable desktop computers (Without GPU) 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 303.00, 158.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(378, 'تجميعات مع معالج AMD 27', 'تجميعات مع معالج AMD 27', 'تجميعات مع معالج AMD 27', 'Scalable desktop computers (Without GPU) 27', 'Scalable desktop computers (Without GPU) 27', 'Scalable desktop computers (Without GPU) 27', '2399882024', 'Scalable desktop computers (Without GPU) 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 369.00, 294.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(379, 'تجميعات مع معالج AMD 28', 'تجميعات مع معالج AMD 28', 'تجميعات مع معالج AMD 28', 'Scalable desktop computers (Without GPU) 28', 'Scalable desktop computers (Without GPU) 28', 'Scalable desktop computers (Without GPU) 28', '8874774868', 'Scalable desktop computers (Without GPU) 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 222.00, 296.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(380, 'تجميعات مع معالج AMD 29', 'تجميعات مع معالج AMD 29', 'تجميعات مع معالج AMD 29', 'Scalable desktop computers (Without GPU) 29', 'Scalable desktop computers (Without GPU) 29', 'Scalable desktop computers (Without GPU) 29', '6493770266', 'Scalable desktop computers (Without GPU) 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 411.00, 286.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(381, 'تجميعات مع معالج AMD 30', 'تجميعات مع معالج AMD 30', 'تجميعات مع معالج AMD 30', 'Scalable desktop computers (Without GPU) 30', 'Scalable desktop computers (Without GPU) 30', 'Scalable desktop computers (Without GPU) 30', '6810517299', 'Scalable desktop computers (Without GPU) 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 470.00, 65.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(382, 'تجميعات مع معالج AMD 31', 'تجميعات مع معالج AMD 31', 'تجميعات مع معالج AMD 31', 'Scalable desktop computers (Without GPU) 31', 'Scalable desktop computers (Without GPU) 31', 'Scalable desktop computers (Without GPU) 31', '4472369630', 'Scalable desktop computers (Without GPU) 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 222.00, 99.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(383, 'تجميعات مع معالج AMD 32', 'تجميعات مع معالج AMD 32', 'تجميعات مع معالج AMD 32', 'Scalable desktop computers (Without GPU) 32', 'Scalable desktop computers (Without GPU) 32', 'Scalable desktop computers (Without GPU) 32', '8309088565', 'Scalable desktop computers (Without GPU) 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 203.00, 103.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(384, 'تجميعات مع معالج AMD 33', 'تجميعات مع معالج AMD 33', 'تجميعات مع معالج AMD 33', 'Scalable desktop computers (Without GPU) 33', 'Scalable desktop computers (Without GPU) 33', 'Scalable desktop computers (Without GPU) 33', '7127176077', 'Scalable desktop computers (Without GPU) 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 267.00, 96.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(385, 'تجميعات مع معالج AMD 34', 'تجميعات مع معالج AMD 34', 'تجميعات مع معالج AMD 34', 'Scalable desktop computers (Without GPU) 34', 'Scalable desktop computers (Without GPU) 34', 'Scalable desktop computers (Without GPU) 34', '7573862692', 'Scalable desktop computers (Without GPU) 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 424.00, 71.00, NULL, '2022-04-04 10:32:02', '2022-07-09 18:19:26', 1, 0, 0, NULL, 0),
(386, 'تجميعات مع معالج AMD 35', 'تجميعات مع معالج AMD 35', 'تجميعات مع معالج AMD 35', 'Scalable desktop computers (Without GPU) 35', 'Scalable desktop computers (Without GPU) 35', 'Scalable desktop computers (Without GPU) 35', '1498036643', 'Scalable desktop computers (Without GPU) 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 131.00, 343.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(387, 'تجميعات مع معالج AMD 36', 'تجميعات مع معالج AMD 36', 'تجميعات مع معالج AMD 36', 'Scalable desktop computers (Without GPU) 36', 'Scalable desktop computers (Without GPU) 36', 'Scalable desktop computers (Without GPU) 36', '2271467834', 'Scalable desktop computers (Without GPU) 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 454.00, 355.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(388, 'تجميعات مع معالج AMD 37', 'تجميعات مع معالج AMD 37', 'تجميعات مع معالج AMD 37', 'Scalable desktop computers (Without GPU) 37', 'Scalable desktop computers (Without GPU) 37', 'Scalable desktop computers (Without GPU) 37', '7067273132', 'Scalable desktop computers (Without GPU) 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 393.00, 311.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(389, 'تجميعات مع معالج AMD 38', 'تجميعات مع معالج AMD 38', 'تجميعات مع معالج AMD 38', 'Scalable desktop computers (Without GPU) 38', 'Scalable desktop computers (Without GPU) 38', 'Scalable desktop computers (Without GPU) 38', '8357421978', 'Scalable desktop computers (Without GPU) 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 375.00, 57.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(390, 'تجميعات مع معالج AMD 39', 'تجميعات مع معالج AMD 39', 'تجميعات مع معالج AMD 39', 'Scalable desktop computers (Without GPU) 39', 'Scalable desktop computers (Without GPU) 39', 'Scalable desktop computers (Without GPU) 39', '918576823', 'Scalable desktop computers (Without GPU) 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 391.00, 84.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(391, 'تجميعات مع معالج AMD 40', 'تجميعات مع معالج AMD 40', 'تجميعات مع معالج AMD 40', 'Scalable desktop computers (Without GPU) 40', 'Scalable desktop computers (Without GPU) 40', 'Scalable desktop computers (Without GPU) 40', '2655328225', 'Scalable desktop computers (Without GPU) 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 380.00, 298.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(392, 'تجميعات مع معالج AMD 41', 'تجميعات مع معالج AMD 41', 'تجميعات مع معالج AMD 41', 'Scalable desktop computers (Without GPU) 41', 'Scalable desktop computers (Without GPU) 41', 'Scalable desktop computers (Without GPU) 41', '3470670528', 'Scalable desktop computers (Without GPU) 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 163.00, 166.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(393, 'تجميعات مع معالج AMD 42', 'تجميعات مع معالج AMD 42', 'تجميعات مع معالج AMD 42', 'Scalable desktop computers (Without GPU) 42', 'Scalable desktop computers (Without GPU) 42', 'Scalable desktop computers (Without GPU) 42', '4365256630', 'Scalable desktop computers (Without GPU) 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 480.00, 96.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(394, 'تجميعات مع معالج AMD 43', 'تجميعات مع معالج AMD 43', 'تجميعات مع معالج AMD 43', 'Scalable desktop computers (Without GPU) 43', 'Scalable desktop computers (Without GPU) 43', 'Scalable desktop computers (Without GPU) 43', '4056651876', 'Scalable desktop computers (Without GPU) 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 400.00, 294.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(395, 'تجميعات مع معالج AMD 44', 'تجميعات مع معالج AMD 44', 'تجميعات مع معالج AMD 44', 'Scalable desktop computers (Without GPU) 44', 'Scalable desktop computers (Without GPU) 44', 'Scalable desktop computers (Without GPU) 44', '4974536923', 'Scalable desktop computers (Without GPU) 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 194.00, 323.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(396, 'تجميعات مع معالج AMD 45', 'تجميعات مع معالج AMD 45', 'تجميعات مع معالج AMD 45', 'Scalable desktop computers (Without GPU) 45', 'Scalable desktop computers (Without GPU) 45', 'Scalable desktop computers (Without GPU) 45', '1233991612', 'Scalable desktop computers (Without GPU) 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 304.00, 220.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(397, 'تجميعات مع معالج AMD 46', 'تجميعات مع معالج AMD 46', 'تجميعات مع معالج AMD 46', 'Scalable desktop computers (Without GPU) 46', 'Scalable desktop computers (Without GPU) 46', 'Scalable desktop computers (Without GPU) 46', '699348950', 'Scalable desktop computers (Without GPU) 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 323.00, 223.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(398, 'تجميعات مع معالج AMD 47', 'تجميعات مع معالج AMD 47', 'تجميعات مع معالج AMD 47', 'Scalable desktop computers (Without GPU) 47', 'Scalable desktop computers (Without GPU) 47', 'Scalable desktop computers (Without GPU) 47', '7136054252', 'Scalable desktop computers (Without GPU) 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 466.00, 102.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(399, 'تجميعات مع معالج AMD 48', 'تجميعات مع معالج AMD 48', 'تجميعات مع معالج AMD 48', 'Scalable desktop computers (Without GPU) 48', 'Scalable desktop computers (Without GPU) 48', 'Scalable desktop computers (Without GPU) 48', '4766246715', 'Scalable desktop computers (Without GPU) 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 270.00, 358.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(400, 'تجميعات مع معالج AMD 49', 'تجميعات مع معالج AMD 49', 'تجميعات مع معالج AMD 49', 'Scalable desktop computers (Without GPU) 49', 'Scalable desktop computers (Without GPU) 49', 'Scalable desktop computers (Without GPU) 49', '4293834927', 'Scalable desktop computers (Without GPU) 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 322.00, 198.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(401, 'قطع الكمبيوتر 0', 'قطع الكمبيوتر 0', 'قطع الكمبيوتر 0', 'Computer parts 0', 'Computer parts 0', 'Computer parts 0', '766668392', 'Computer parts 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 113.00, 372.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(402, 'قطع الكمبيوتر 1', 'قطع الكمبيوتر 1', 'قطع الكمبيوتر 1', 'Computer parts 1', 'Computer parts 1', 'Computer parts 1', '9534419142', 'Computer parts 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 495.00, 363.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(403, 'قطع الكمبيوتر 2', 'قطع الكمبيوتر 2', 'قطع الكمبيوتر 2', 'Computer parts 2', 'Computer parts 2', 'Computer parts 2', '4692861863', 'Computer parts 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 288.00, 72.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(404, 'قطع الكمبيوتر 3', 'قطع الكمبيوتر 3', 'قطع الكمبيوتر 3', 'Computer parts 3', 'Computer parts 3', 'Computer parts 3', '6272007321', 'Computer parts 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 309.00, 167.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(405, 'قطع الكمبيوتر 4', 'قطع الكمبيوتر 4', 'قطع الكمبيوتر 4', 'Computer parts 4', 'Computer parts 4', 'Computer parts 4', '7654193431', 'Computer parts 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 148.00, 212.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(406, 'قطع الكمبيوتر 5', 'قطع الكمبيوتر 5', 'قطع الكمبيوتر 5', 'Computer parts 5', 'Computer parts 5', 'Computer parts 5', '801583246', 'Computer parts 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 484.00, 264.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(407, 'قطع الكمبيوتر 6', 'قطع الكمبيوتر 6', 'قطع الكمبيوتر 6', 'Computer parts 6', 'Computer parts 6', 'Computer parts 6', '5798533377', 'Computer parts 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 381.00, 335.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(408, 'قطع الكمبيوتر 7', 'قطع الكمبيوتر 7', 'قطع الكمبيوتر 7', 'Computer parts 7', 'Computer parts 7', 'Computer parts 7', '9576967528', 'Computer parts 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 108.00, 147.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(409, 'قطع الكمبيوتر 8', 'قطع الكمبيوتر 8', 'قطع الكمبيوتر 8', 'Computer parts 8', 'Computer parts 8', 'Computer parts 8', '4912727198', 'Computer parts 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 488.00, 220.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(410, 'قطع الكمبيوتر 9', 'قطع الكمبيوتر 9', 'قطع الكمبيوتر 9', 'Computer parts 9', 'Computer parts 9', 'Computer parts 9', '7662859393', 'Computer parts 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 171.00, 117.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(411, 'قطع الكمبيوتر 10', 'قطع الكمبيوتر 10', 'قطع الكمبيوتر 10', 'Computer parts 10', 'Computer parts 10', 'Computer parts 10', '7805636815', 'Computer parts 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 361.00, 90.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(412, 'قطع الكمبيوتر 11', 'قطع الكمبيوتر 11', 'قطع الكمبيوتر 11', 'Computer parts 11', 'Computer parts 11', 'Computer parts 11', '6806218970', 'Computer parts 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 288.00, 334.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(413, 'قطع الكمبيوتر 12', 'قطع الكمبيوتر 12', 'قطع الكمبيوتر 12', 'Computer parts 12', 'Computer parts 12', 'Computer parts 12', '7887975518', 'Computer parts 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 447.00, 121.00, NULL, '2022-04-04 10:32:02', '2022-04-04 20:23:09', 1, 0, 1, NULL, 0),
(414, 'قطع الكمبيوتر 13', 'قطع الكمبيوتر 13', 'قطع الكمبيوتر 13', 'Computer parts 13', 'Computer parts 13', 'Computer parts 13', '9861581571', 'Computer parts 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 329.00, 328.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(415, 'قطع الكمبيوتر 14', 'قطع الكمبيوتر 14', 'قطع الكمبيوتر 14', 'Computer parts 14', 'Computer parts 14', 'Computer parts 14', '4273984961', 'Computer parts 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 111.00, 267.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(416, 'قطع الكمبيوتر 15', 'قطع الكمبيوتر 15', 'قطع الكمبيوتر 15', 'Computer parts 15', 'Computer parts 15', 'Computer parts 15', '5132654884', 'Computer parts 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 484.00, 246.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(417, 'قطع الكمبيوتر 16', 'قطع الكمبيوتر 16', 'قطع الكمبيوتر 16', 'Computer parts 16', 'Computer parts 16', 'Computer parts 16', '4025818771', 'Computer parts 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 394.00, 102.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(418, 'قطع الكمبيوتر 17', 'قطع الكمبيوتر 17', 'قطع الكمبيوتر 17', 'Computer parts 17', 'Computer parts 17', 'Computer parts 17', '9017516325', 'Computer parts 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 275.00, 120.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(419, 'قطع الكمبيوتر 18', 'قطع الكمبيوتر 18', 'قطع الكمبيوتر 18', 'Computer parts 18', 'Computer parts 18', 'Computer parts 18', '5773160559', 'Computer parts 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 444.00, 232.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(420, 'قطع الكمبيوتر 19', 'قطع الكمبيوتر 19', 'قطع الكمبيوتر 19', 'Computer parts 19', 'Computer parts 19', 'Computer parts 19', '6474245382', 'Computer parts 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 229.00, 310.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(421, 'قطع الكمبيوتر 20', 'قطع الكمبيوتر 20', 'قطع الكمبيوتر 20', 'Computer parts 20', 'Computer parts 20', 'Computer parts 20', '4441600162', 'Computer parts 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 197.00, 127.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(422, 'قطع الكمبيوتر 21', 'قطع الكمبيوتر 21', 'قطع الكمبيوتر 21', 'Computer parts 21', 'Computer parts 21', 'Computer parts 21', '7334174320', 'Computer parts 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 444.00, 242.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(423, 'قطع الكمبيوتر 22', 'قطع الكمبيوتر 22', 'قطع الكمبيوتر 22', 'Computer parts 22', 'Computer parts 22', 'Computer parts 22', '9655235441', 'Computer parts 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 115.00, 387.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(424, 'قطع الكمبيوتر 23', 'قطع الكمبيوتر 23', 'قطع الكمبيوتر 23', 'Computer parts 23', 'Computer parts 23', 'Computer parts 23', '5257572718', 'Computer parts 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 232.00, 74.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(425, 'قطع الكمبيوتر 24', 'قطع الكمبيوتر 24', 'قطع الكمبيوتر 24', 'Computer parts 24', 'Computer parts 24', 'Computer parts 24', '5371024441', 'Computer parts 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 432.00, 267.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(426, 'قطع الكمبيوتر 25', 'قطع الكمبيوتر 25', 'قطع الكمبيوتر 25', 'Computer parts 25', 'Computer parts 25', 'Computer parts 25', '498284395', 'Computer parts 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 318.00, 163.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(427, 'قطع الكمبيوتر 26', 'قطع الكمبيوتر 26', 'قطع الكمبيوتر 26', 'Computer parts 26', 'Computer parts 26', 'Computer parts 26', '3593476183', 'Computer parts 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 289.00, 207.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(428, 'قطع الكمبيوتر 27', 'قطع الكمبيوتر 27', 'قطع الكمبيوتر 27', 'Computer parts 27', 'Computer parts 27', 'Computer parts 27', '2110100042', 'Computer parts 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 362.00, 178.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(429, 'قطع الكمبيوتر 28', 'قطع الكمبيوتر 28', 'قطع الكمبيوتر 28', 'Computer parts 28', 'Computer parts 28', 'Computer parts 28', '1860075650', 'Computer parts 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 419.00, 372.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(430, 'قطع الكمبيوتر 29', 'قطع الكمبيوتر 29', 'قطع الكمبيوتر 29', 'Computer parts 29', 'Computer parts 29', 'Computer parts 29', '1739058884', 'Computer parts 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 186.00, 328.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(431, 'قطع الكمبيوتر 30', 'قطع الكمبيوتر 30', 'قطع الكمبيوتر 30', 'Computer parts 30', 'Computer parts 30', 'Computer parts 30', '9303406842', 'Computer parts 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 208.00, 319.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(432, 'قطع الكمبيوتر 31', 'قطع الكمبيوتر 31', 'قطع الكمبيوتر 31', 'Computer parts 31', 'Computer parts 31', 'Computer parts 31', '5818014101', 'Computer parts 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 130.00, 252.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(433, 'قطع الكمبيوتر 32', 'قطع الكمبيوتر 32', 'قطع الكمبيوتر 32', 'Computer parts 32', 'Computer parts 32', 'Computer parts 32', '3210628127', 'Computer parts 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 449.00, 57.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(434, 'قطع الكمبيوتر 33', 'قطع الكمبيوتر 33', 'قطع الكمبيوتر 33', 'Computer parts 33', 'Computer parts 33', 'Computer parts 33', '756259353', 'Computer parts 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 144.00, 387.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(435, 'قطع الكمبيوتر 34', 'قطع الكمبيوتر 34', 'قطع الكمبيوتر 34', 'Computer parts 34', 'Computer parts 34', 'Computer parts 34', '253099511', 'Computer parts 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 469.00, 211.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(436, 'قطع الكمبيوتر 35', 'قطع الكمبيوتر 35', 'قطع الكمبيوتر 35', 'Computer parts 35', 'Computer parts 35', 'Computer parts 35', '1367605154', 'Computer parts 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 460.00, 386.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(437, 'قطع الكمبيوتر 36', 'قطع الكمبيوتر 36', 'قطع الكمبيوتر 36', 'Computer parts 36', 'Computer parts 36', 'Computer parts 36', '9336273523', 'Computer parts 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 316.00, 186.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(438, 'قطع الكمبيوتر 37', 'قطع الكمبيوتر 37', 'قطع الكمبيوتر 37', 'Computer parts 37', 'Computer parts 37', 'Computer parts 37', '2009344874', 'Computer parts 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 153.00, 263.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(439, 'قطع الكمبيوتر 38', 'قطع الكمبيوتر 38', 'قطع الكمبيوتر 38', 'Computer parts 38', 'Computer parts 38', 'Computer parts 38', '6643580069', 'Computer parts 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 363.00, 115.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(440, 'قطع الكمبيوتر 39', 'قطع الكمبيوتر 39', 'قطع الكمبيوتر 39', 'Computer parts 39', 'Computer parts 39', 'Computer parts 39', '4162125042', 'Computer parts 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 219.00, 171.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(441, 'قطع الكمبيوتر 40', 'قطع الكمبيوتر 40', 'قطع الكمبيوتر 40', 'Computer parts 40', 'Computer parts 40', 'Computer parts 40', '5674211882', 'Computer parts 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 222.00, 158.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(442, 'قطع الكمبيوتر 41', 'قطع الكمبيوتر 41', 'قطع الكمبيوتر 41', 'Computer parts 41', 'Computer parts 41', 'Computer parts 41', '3574094594', 'Computer parts 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 340.00, 304.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(443, 'قطع الكمبيوتر 42', 'قطع الكمبيوتر 42', 'قطع الكمبيوتر 42', 'Computer parts 42', 'Computer parts 42', 'Computer parts 42', '7034567477', 'Computer parts 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 276.00, 256.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(444, 'قطع الكمبيوتر 43', 'قطع الكمبيوتر 43', 'قطع الكمبيوتر 43', 'Computer parts 43', 'Computer parts 43', 'Computer parts 43', '8490127300', 'Computer parts 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 482.00, 90.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(445, 'قطع الكمبيوتر 44', 'قطع الكمبيوتر 44', 'قطع الكمبيوتر 44', 'Computer parts 44', 'Computer parts 44', 'Computer parts 44', '7464067229', 'Computer parts 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 295.00, 186.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(446, 'قطع الكمبيوتر 45', 'قطع الكمبيوتر 45', 'قطع الكمبيوتر 45', 'Computer parts 45', 'Computer parts 45', 'Computer parts 45', '1346126878', 'Computer parts 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 407.00, 294.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(447, 'قطع الكمبيوتر 46', 'قطع الكمبيوتر 46', 'قطع الكمبيوتر 46', 'Computer parts 46', 'Computer parts 46', 'Computer parts 46', '9629712802', 'Computer parts 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 142.00, 392.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(448, 'قطع الكمبيوتر 47', 'قطع الكمبيوتر 47', 'قطع الكمبيوتر 47', 'Computer parts 47', 'Computer parts 47', 'Computer parts 47', '7543238179', 'Computer parts 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 109.00, 202.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(449, 'قطع الكمبيوتر 48', 'قطع الكمبيوتر 48', 'قطع الكمبيوتر 48', 'Computer parts 48', 'Computer parts 48', 'Computer parts 48', '9152945946', 'Computer parts 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 385.00, 74.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(450, 'قطع الكمبيوتر 49', 'قطع الكمبيوتر 49', 'قطع الكمبيوتر 49', 'Computer parts 49', 'Computer parts 49', 'Computer parts 49', '3554252211', 'Computer parts 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 102.00, 99.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(451, 'المذربوردات 0', 'المذربوردات 0', 'المذربوردات 0', 'Motherboard 0', 'Motherboard 0', 'Motherboard 0', '8628452800', 'Motherboard 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 310.00, 225.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(452, 'المذربوردات 1', 'المذربوردات 1', 'المذربوردات 1', 'Motherboard 1', 'Motherboard 1', 'Motherboard 1', '953181103', 'Motherboard 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 110.00, 315.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(453, 'المذربوردات 2', 'المذربوردات 2', 'المذربوردات 2', 'Motherboard 2', 'Motherboard 2', 'Motherboard 2', '8671352171', 'Motherboard 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 308.00, 289.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(454, 'المذربوردات 3', 'المذربوردات 3', 'المذربوردات 3', 'Motherboard 3', 'Motherboard 3', 'Motherboard 3', '4962542235', 'Motherboard 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 254.00, 305.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(455, 'المذربوردات 4', 'المذربوردات 4', 'المذربوردات 4', 'Motherboard 4', 'Motherboard 4', 'Motherboard 4', '8545086369', 'Motherboard 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 393.00, 392.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(456, 'المذربوردات 5', 'المذربوردات 5', 'المذربوردات 5', 'Motherboard 5', 'Motherboard 5', 'Motherboard 5', '3627782535', 'Motherboard 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 399.00, 109.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(457, 'المذربوردات 6', 'المذربوردات 6', 'المذربوردات 6', 'Motherboard 6', 'Motherboard 6', 'Motherboard 6', '9107569261', 'Motherboard 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 469.00, 148.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(458, 'المذربوردات 7', 'المذربوردات 7', 'المذربوردات 7', 'Motherboard 7', 'Motherboard 7', 'Motherboard 7', '7531573311', 'Motherboard 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 107.00, 52.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(459, 'المذربوردات 8', 'المذربوردات 8', 'المذربوردات 8', 'Motherboard 8', 'Motherboard 8', 'Motherboard 8', '7815068627', 'Motherboard 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 188.00, 287.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(460, 'المذربوردات 9', 'المذربوردات 9', 'المذربوردات 9', 'Motherboard 9', 'Motherboard 9', 'Motherboard 9', '5764577106', 'Motherboard 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 264.00, 51.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(461, 'المذربوردات 10', 'المذربوردات 10', 'المذربوردات 10', 'Motherboard 10', 'Motherboard 10', 'Motherboard 10', '569227603', 'Motherboard 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 401.00, 351.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(462, 'المذربوردات 11', 'المذربوردات 11', 'المذربوردات 11', 'Motherboard 11', 'Motherboard 11', 'Motherboard 11', '2509475824', 'Motherboard 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 326.00, 187.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(463, 'المذربوردات 12', 'المذربوردات 12', 'المذربوردات 12', 'Motherboard 12', 'Motherboard 12', 'Motherboard 12', '1496589000', 'Motherboard 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 468.00, 337.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(464, 'المذربوردات 13', 'المذربوردات 13', 'المذربوردات 13', 'Motherboard 13', 'Motherboard 13', 'Motherboard 13', '4751164881', 'Motherboard 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 249.00, 289.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(465, 'المذربوردات 14', 'المذربوردات 14', 'المذربوردات 14', 'Motherboard 14', 'Motherboard 14', 'Motherboard 14', '8824124105', 'Motherboard 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 347.00, 215.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(466, 'المذربوردات 15', 'المذربوردات 15', 'المذربوردات 15', 'Motherboard 15', 'Motherboard 15', 'Motherboard 15', '2693522374', 'Motherboard 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 476.00, 143.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(467, 'المذربوردات 16', 'المذربوردات 16', 'المذربوردات 16', 'Motherboard 16', 'Motherboard 16', 'Motherboard 16', '3793288144', 'Motherboard 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 208.00, 205.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(468, 'المذربوردات 17', 'المذربوردات 17', 'المذربوردات 17', 'Motherboard 17', 'Motherboard 17', 'Motherboard 17', '7344154328', 'Motherboard 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 499.00, 393.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(469, 'المذربوردات 18', 'المذربوردات 18', 'المذربوردات 18', 'Motherboard 18', 'Motherboard 18', 'Motherboard 18', '5186920538', 'Motherboard 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 399.00, 240.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(470, 'المذربوردات 19', 'المذربوردات 19', 'المذربوردات 19', 'Motherboard 19', 'Motherboard 19', 'Motherboard 19', '3922424101', 'Motherboard 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 278.00, 368.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(471, 'المذربوردات 20', 'المذربوردات 20', 'المذربوردات 20', 'Motherboard 20', 'Motherboard 20', 'Motherboard 20', '6669080561', 'Motherboard 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 358.00, 113.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(472, 'المذربوردات 21', 'المذربوردات 21', 'المذربوردات 21', 'Motherboard 21', 'Motherboard 21', 'Motherboard 21', '6395255671', 'Motherboard 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 163.00, 383.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(473, 'المذربوردات 22', 'المذربوردات 22', 'المذربوردات 22', 'Motherboard 22', 'Motherboard 22', 'Motherboard 22', '5053872510', 'Motherboard 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 207.00, 351.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(474, 'المذربوردات 23', 'المذربوردات 23', 'المذربوردات 23', 'Motherboard 23', 'Motherboard 23', 'Motherboard 23', '2996307989', 'Motherboard 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 351.00, 134.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(475, 'المذربوردات 24', 'المذربوردات 24', 'المذربوردات 24', 'Motherboard 24', 'Motherboard 24', 'Motherboard 24', '7034044424', 'Motherboard 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 304.00, 303.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(476, 'المذربوردات 25', 'المذربوردات 25', 'المذربوردات 25', 'Motherboard 25', 'Motherboard 25', 'Motherboard 25', '6105010251', 'Motherboard 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 289.00, 60.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(477, 'المذربوردات 26', 'المذربوردات 26', 'المذربوردات 26', 'Motherboard 26', 'Motherboard 26', 'Motherboard 26', '7459201053', 'Motherboard 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 398.00, 288.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(478, 'المذربوردات 27', 'المذربوردات 27', 'المذربوردات 27', 'Motherboard 27', 'Motherboard 27', 'Motherboard 27', '7373040708', 'Motherboard 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 401.00, 291.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(479, 'المذربوردات 28', 'المذربوردات 28', 'المذربوردات 28', 'Motherboard 28', 'Motherboard 28', 'Motherboard 28', '2416293884', 'Motherboard 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 200.00, 233.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(480, 'المذربوردات 29', 'المذربوردات 29', 'المذربوردات 29', 'Motherboard 29', 'Motherboard 29', 'Motherboard 29', '2837237380', 'Motherboard 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 178.00, 311.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(481, 'المذربوردات 30', 'المذربوردات 30', 'المذربوردات 30', 'Motherboard 30', 'Motherboard 30', 'Motherboard 30', '5440235395', 'Motherboard 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 143.00, 180.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(482, 'المذربوردات 31', 'المذربوردات 31', 'المذربوردات 31', 'Motherboard 31', 'Motherboard 31', 'Motherboard 31', '4068943734', 'Motherboard 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 162.00, 242.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(483, 'المذربوردات 32', 'المذربوردات 32', 'المذربوردات 32', 'Motherboard 32', 'Motherboard 32', 'Motherboard 32', '4918224768', 'Motherboard 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 229.00, 288.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(484, 'المذربوردات 33', 'المذربوردات 33', 'المذربوردات 33', 'Motherboard 33', 'Motherboard 33', 'Motherboard 33', '6665171964', 'Motherboard 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 461.00, 179.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(485, 'المذربوردات 34', 'المذربوردات 34', 'المذربوردات 34', 'Motherboard 34', 'Motherboard 34', 'Motherboard 34', '1652020437', 'Motherboard 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 463.00, 233.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(486, 'المذربوردات 35', 'المذربوردات 35', 'المذربوردات 35', 'Motherboard 35', 'Motherboard 35', 'Motherboard 35', '2233045610', 'Motherboard 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 302.00, 75.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(487, 'المذربوردات 36', 'المذربوردات 36', 'المذربوردات 36', 'Motherboard 36', 'Motherboard 36', 'Motherboard 36', '1537935150', 'Motherboard 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 135.00, 206.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(488, 'المذربوردات 37', 'المذربوردات 37', 'المذربوردات 37', 'Motherboard 37', 'Motherboard 37', 'Motherboard 37', '6114158327', 'Motherboard 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 459.00, 338.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(489, 'المذربوردات 38', 'المذربوردات 38', 'المذربوردات 38', 'Motherboard 38', 'Motherboard 38', 'Motherboard 38', '4530070922', 'Motherboard 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 301.00, 312.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(490, 'المذربوردات 39', 'المذربوردات 39', 'المذربوردات 39', 'Motherboard 39', 'Motherboard 39', 'Motherboard 39', '2159685452', 'Motherboard 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 190.00, 315.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(491, 'المذربوردات 40', 'المذربوردات 40', 'المذربوردات 40', 'Motherboard 40', 'Motherboard 40', 'Motherboard 40', '9482355583', 'Motherboard 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 168.00, 224.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(492, 'المذربوردات 41', 'المذربوردات 41', 'المذربوردات 41', 'Motherboard 41', 'Motherboard 41', 'Motherboard 41', '9947956376', 'Motherboard 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 272.00, 52.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(493, 'المذربوردات 42', 'المذربوردات 42', 'المذربوردات 42', 'Motherboard 42', 'Motherboard 42', 'Motherboard 42', '6135728410', 'Motherboard 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 414.00, 80.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(494, 'المذربوردات 43', 'المذربوردات 43', 'المذربوردات 43', 'Motherboard 43', 'Motherboard 43', 'Motherboard 43', '1773154287', 'Motherboard 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 263.00, 187.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(495, 'المذربوردات 44', 'المذربوردات 44', 'المذربوردات 44', 'Motherboard 44', 'Motherboard 44', 'Motherboard 44', '9718301357', 'Motherboard 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 264.00, 321.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(496, 'المذربوردات 45', 'المذربوردات 45', 'المذربوردات 45', 'Motherboard 45', 'Motherboard 45', 'Motherboard 45', '8715328063', 'Motherboard 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 385.00, 218.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(497, 'المذربوردات 46', 'المذربوردات 46', 'المذربوردات 46', 'Motherboard 46', 'Motherboard 46', 'Motherboard 46', '9735790329', 'Motherboard 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 274.00, 214.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(498, 'المذربوردات 47', 'المذربوردات 47', 'المذربوردات 47', 'Motherboard 47', 'Motherboard 47', 'Motherboard 47', '5270586247', 'Motherboard 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 159.00, 245.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(499, 'المذربوردات 48', 'المذربوردات 48', 'المذربوردات 48', 'Motherboard 48', 'Motherboard 48', 'Motherboard 48', '6484081363', 'Motherboard 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 363.00, 206.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(500, 'المذربوردات 49', 'المذربوردات 49', 'المذربوردات 49', 'Motherboard 49', 'Motherboard 49', 'Motherboard 49', '2241965987', 'Motherboard 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 462.00, 87.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(502, 'المعالجات 1', 'المعالجات 1', 'المعالجات 1', 'Cpu 1', 'Cpu 1', 'Cpu 1', '1121743863', 'Cpu 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 464.00, 201.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(503, 'المعالجات 2', 'المعالجات 2', 'المعالجات 2', 'Cpu 2', 'Cpu 2', 'Cpu 2', '9624582313', 'Cpu 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 325.00, 206.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(504, 'المعالجات 3', 'المعالجات 3', 'المعالجات 3', 'Cpu 3', 'Cpu 3', 'Cpu 3', '5854397858', 'Cpu 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 304.00, 250.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(505, 'المعالجات 4', 'المعالجات 4', 'المعالجات 4', 'Cpu 4', 'Cpu 4', 'Cpu 4', '325699487', 'Cpu 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 464.00, 300.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(506, 'المعالجات 5', 'المعالجات 5', 'المعالجات 5', 'Cpu 5', 'Cpu 5', 'Cpu 5', '4069929567', 'Cpu 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 462.00, 54.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(507, 'المعالجات 6', 'المعالجات 6', 'المعالجات 6', 'Cpu 6', 'Cpu 6', 'Cpu 6', '2077825210', 'Cpu 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 142.00, 177.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(508, 'المعالجات 7', 'المعالجات 7', 'المعالجات 7', 'Cpu 7', 'Cpu 7', 'Cpu 7', '1282730693', 'Cpu 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 282.00, 245.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(509, 'المعالجات 8', 'المعالجات 8', 'المعالجات 8', 'Cpu 8', 'Cpu 8', 'Cpu 8', '657362331', 'Cpu 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 170.00, 362.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(510, 'المعالجات 9', 'المعالجات 9', 'المعالجات 9', 'Cpu 9', 'Cpu 9', 'Cpu 9', '5131555702', 'Cpu 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 321.00, 384.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(511, 'المعالجات 10', 'المعالجات 10', 'المعالجات 10', 'Cpu 10', 'Cpu 10', 'Cpu 10', '1267293319', 'Cpu 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 168.00, 99.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(512, 'المعالجات 11', 'المعالجات 11', 'المعالجات 11', 'Cpu 11', 'Cpu 11', 'Cpu 11', '9127403804', 'Cpu 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 148.00, 184.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(513, 'المعالجات 12', 'المعالجات 12', 'المعالجات 12', 'Cpu 12', 'Cpu 12', 'Cpu 12', '9022604905', 'Cpu 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 442.00, 231.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(514, 'المعالجات 13', 'المعالجات 13', 'المعالجات 13', 'Cpu 13', 'Cpu 13', 'Cpu 13', '2613724101', 'Cpu 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 304.00, 239.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(515, 'المعالجات 14', 'المعالجات 14', 'المعالجات 14', 'Cpu 14', 'Cpu 14', 'Cpu 14', '7658825692', 'Cpu 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 161.00, 351.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(516, 'المعالجات 15', 'المعالجات 15', 'المعالجات 15', 'Cpu 15', 'Cpu 15', 'Cpu 15', '4963279858', 'Cpu 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 107.00, 72.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(517, 'المعالجات 16', 'المعالجات 16', 'المعالجات 16', 'Cpu 16', 'Cpu 16', 'Cpu 16', '4080264051', 'Cpu 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 220.00, 311.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(518, 'المعالجات 17', 'المعالجات 17', 'المعالجات 17', 'Cpu 17', 'Cpu 17', 'Cpu 17', '2713272180', 'Cpu 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 188.00, 316.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(519, 'المعالجات 18', 'المعالجات 18', 'المعالجات 18', 'Cpu 18', 'Cpu 18', 'Cpu 18', '2357619344', 'Cpu 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 117.00, 348.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(520, 'المعالجات 19', 'المعالجات 19', 'المعالجات 19', 'Cpu 19', 'Cpu 19', 'Cpu 19', '7549223536', 'Cpu 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 115.00, 250.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(521, 'المعالجات 20', 'المعالجات 20', 'المعالجات 20', 'Cpu 20', 'Cpu 20', 'Cpu 20', '1433235580', 'Cpu 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 241.00, 340.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(522, 'المعالجات 21', 'المعالجات 21', 'المعالجات 21', 'Cpu 21', 'Cpu 21', 'Cpu 21', '689115404', 'Cpu 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 385.00, 279.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(523, 'المعالجات 22', 'المعالجات 22', 'المعالجات 22', 'Cpu 22', 'Cpu 22', 'Cpu 22', '1570942104', 'Cpu 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 454.00, 124.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(524, 'المعالجات 23', 'المعالجات 23', 'المعالجات 23', 'Cpu 23', 'Cpu 23', 'Cpu 23', '6306066000', 'Cpu 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 366.00, 108.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(525, 'المعالجات 24', 'المعالجات 24', 'المعالجات 24', 'Cpu 24', 'Cpu 24', 'Cpu 24', '1355672393', 'Cpu 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 391.00, 98.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(526, 'المعالجات 25', 'المعالجات 25', 'المعالجات 25', 'Cpu 25', 'Cpu 25', 'Cpu 25', '9695169998', 'Cpu 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 274.00, 210.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(527, 'المعالجات 26', 'المعالجات 26', 'المعالجات 26', 'Cpu 26', 'Cpu 26', 'Cpu 26', '1014800187', 'Cpu 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 417.00, 82.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(528, 'المعالجات 27', 'المعالجات 27', 'المعالجات 27', 'Cpu 27', 'Cpu 27', 'Cpu 27', '6775073793', 'Cpu 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 288.00, 304.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(529, 'المعالجات 28', 'المعالجات 28', 'المعالجات 28', 'Cpu 28', 'Cpu 28', 'Cpu 28', '9902841840', 'Cpu 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 105.00, 251.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(530, 'المعالجات 29', 'المعالجات 29', 'المعالجات 29', 'Cpu 29', 'Cpu 29', 'Cpu 29', '5673950224', 'Cpu 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 214.00, 106.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(531, 'المعالجات 30', 'المعالجات 30', 'المعالجات 30', 'Cpu 30', 'Cpu 30', 'Cpu 30', '1872073922', 'Cpu 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 375.00, 302.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(532, 'المعالجات 31', 'المعالجات 31', 'المعالجات 31', 'Cpu 31', 'Cpu 31', 'Cpu 31', '148236486', 'Cpu 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 371.00, 346.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(533, 'المعالجات 32', 'المعالجات 32', 'المعالجات 32', 'Cpu 32', 'Cpu 32', 'Cpu 32', '8108220600', 'Cpu 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 131.00, 372.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(534, 'المعالجات 33', 'المعالجات 33', 'المعالجات 33', 'Cpu 33', 'Cpu 33', 'Cpu 33', '6462947693', 'Cpu 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 205.00, 323.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(535, 'المعالجات 34', 'المعالجات 34', 'المعالجات 34', 'Cpu 34', 'Cpu 34', 'Cpu 34', '1019102236', 'Cpu 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 280.00, 338.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(536, 'المعالجات 35', 'المعالجات 35', 'المعالجات 35', 'Cpu 35', 'Cpu 35', 'Cpu 35', '772981982', 'Cpu 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 198.00, 117.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(537, 'المعالجات 36', 'المعالجات 36', 'المعالجات 36', 'Cpu 36', 'Cpu 36', 'Cpu 36', '9304352994', 'Cpu 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 316.00, 327.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(538, 'المعالجات 37', 'المعالجات 37', 'المعالجات 37', 'Cpu 37', 'Cpu 37', 'Cpu 37', '7883914861', 'Cpu 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 239.00, 293.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(539, 'المعالجات 38', 'المعالجات 38', 'المعالجات 38', 'Cpu 38', 'Cpu 38', 'Cpu 38', '3128489927', 'Cpu 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 388.00, 316.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(540, 'المعالجات 39', 'المعالجات 39', 'المعالجات 39', 'Cpu 39', 'Cpu 39', 'Cpu 39', '9622737284', 'Cpu 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 155.00, 202.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(541, 'المعالجات 40', 'المعالجات 40', 'المعالجات 40', 'Cpu 40', 'Cpu 40', 'Cpu 40', '3763782335', 'Cpu 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 385.00, 396.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(542, 'المعالجات 41', 'المعالجات 41', 'المعالجات 41', 'Cpu 41', 'Cpu 41', 'Cpu 41', '1077662595', 'Cpu 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 303.00, 272.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(543, 'المعالجات 42', 'المعالجات 42', 'المعالجات 42', 'Cpu 42', 'Cpu 42', 'Cpu 42', '2478974708', 'Cpu 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 287.00, 308.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(544, 'المعالجات 43', 'المعالجات 43', 'المعالجات 43', 'Cpu 43', 'Cpu 43', 'Cpu 43', '3715411945', 'Cpu 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 367.00, 390.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(545, 'المعالجات 44', 'المعالجات 44', 'المعالجات 44', 'Cpu 44', 'Cpu 44', 'Cpu 44', '8463438341', 'Cpu 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 496.00, 108.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(546, 'المعالجات 45', 'المعالجات 45', 'المعالجات 45', 'Cpu 45', 'Cpu 45', 'Cpu 45', '2980067484', 'Cpu 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 279.00, 158.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(547, 'المعالجات 46', 'المعالجات 46', 'المعالجات 46', 'Cpu 46', 'Cpu 46', 'Cpu 46', '4834514346', 'Cpu 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 227.00, 183.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(548, 'المعالجات 47', 'المعالجات 47', 'المعالجات 47', 'Cpu 47', 'Cpu 47', 'Cpu 47', '6696544430', 'Cpu 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 182.00, 142.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(549, 'المعالجات 48', 'المعالجات 48', 'المعالجات 48', 'Cpu 48', 'Cpu 48', 'Cpu 48', '101994182', 'Cpu 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 309.00, 333.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(550, 'المعالجات 49', 'المعالجات 49', 'المعالجات 49', 'Cpu 49', 'Cpu 49', 'Cpu 49', '933979289', 'Cpu 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 257.00, 288.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(552, 'الرامات 1', 'الرامات 1', 'الرامات 1', 'Ram 1', 'Ram 1', 'Ram 1', '7290990220', 'Ram 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 337.00, 92.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(555, 'الرامات 4', 'الرامات 4', 'الرامات 4', 'Ram 4', 'Ram 4', 'Ram 4', '8667358486', 'Ram 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 209.00, 383.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(556, 'الرامات 5', 'الرامات 5', 'الرامات 5', 'Ram 5', 'Ram 5', 'Ram 5', '2201338441', 'Ram 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 121.00, 332.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(557, 'الرامات 6', 'الرامات 6', 'الرامات 6', 'Ram 6', 'Ram 6', 'Ram 6', '9654228713', 'Ram 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 381.00, 187.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(558, 'الرامات 7', 'الرامات 7', 'الرامات 7', 'Ram 7', 'Ram 7', 'Ram 7', '3387774656', 'Ram 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 405.00, 110.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(559, 'الرامات 8', 'الرامات 8', 'الرامات 8', 'Ram 8', 'Ram 8', 'Ram 8', '1470537930', 'Ram 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 269.00, 279.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(560, 'الرامات 9', 'الرامات 9', 'الرامات 9', 'Ram 9', 'Ram 9', 'Ram 9', '288352876', 'Ram 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 280.00, 120.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(562, 'الرامات 11', 'الرامات 11', 'الرامات 11', 'Ram 11', 'Ram 11', 'Ram 11', '9890214288', 'Ram 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 293.00, 118.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(563, 'الرامات 12', 'الرامات 12', 'الرامات 12', 'Ram 12', 'Ram 12', 'Ram 12', '9953963813', 'Ram 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 142.00, 278.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(564, 'الرامات 13', 'الرامات 13', 'الرامات 13', 'Ram 13', 'Ram 13', 'Ram 13', '6661235294', 'Ram 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 246.00, 75.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(565, 'الرامات 14', 'الرامات 14', 'الرامات 14', 'Ram 14', 'Ram 14', 'Ram 14', '1034590971', 'Ram 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 458.00, 301.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(566, 'الرامات 15', 'الرامات 15', 'الرامات 15', 'Ram 15', 'Ram 15', 'Ram 15', '6971467402', 'Ram 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 500.00, 59.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(567, 'الرامات 16', 'الرامات 16', 'الرامات 16', 'Ram 16', 'Ram 16', 'Ram 16', '5370701561', 'Ram 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 267.00, 146.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(568, 'الرامات 17', 'الرامات 17', 'الرامات 17', 'Ram 17', 'Ram 17', 'Ram 17', '9266149824', 'Ram 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 270.00, 350.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(569, 'الرامات 18', 'الرامات 18', 'الرامات 18', 'Ram 18', 'Ram 18', 'Ram 18', '3475266589', 'Ram 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 436.00, 287.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(570, 'الرامات 19', 'الرامات 19', 'الرامات 19', 'Ram 19', 'Ram 19', 'Ram 19', '5189734105', 'Ram 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 233.00, 311.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(571, 'الرامات 20', 'الرامات 20', 'الرامات 20', 'Ram 20', 'Ram 20', 'Ram 20', '3027826978', 'Ram 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 499.00, 367.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(572, 'الرامات 21', 'الرامات 21', 'الرامات 21', 'Ram 21', 'Ram 21', 'Ram 21', '7652207654', 'Ram 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 120.00, 196.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(573, 'الرامات 22', 'الرامات 22', 'الرامات 22', 'Ram 22', 'Ram 22', 'Ram 22', '773186377', 'Ram 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 327.00, 146.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(574, 'الرامات 23', 'الرامات 23', 'الرامات 23', 'Ram 23', 'Ram 23', 'Ram 23', '8867468172', 'Ram 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 123.00, 385.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(575, 'الرامات 24', 'الرامات 24', 'الرامات 24', 'Ram 24', 'Ram 24', 'Ram 24', '8701709390', 'Ram 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 289.00, 373.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(576, 'الرامات 25', 'الرامات 25', 'الرامات 25', 'Ram 25', 'Ram 25', 'Ram 25', '7830183557', 'Ram 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 206.00, 54.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(577, 'الرامات 26', 'الرامات 26', 'الرامات 26', 'Ram 26', 'Ram 26', 'Ram 26', '1833704782', 'Ram 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 234.00, 154.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(578, 'الرامات 27', 'الرامات 27', 'الرامات 27', 'Ram 27', 'Ram 27', 'Ram 27', '5150515447', 'Ram 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 424.00, 146.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(579, 'الرامات 28', 'الرامات 28', 'الرامات 28', 'Ram 28', 'Ram 28', 'Ram 28', '6362568282', 'Ram 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 236.00, 206.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(580, 'الرامات 29', 'الرامات 29', 'الرامات 29', 'Ram 29', 'Ram 29', 'Ram 29', '9676925976', 'Ram 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 452.00, 233.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(581, 'الرامات 30', 'الرامات 30', 'الرامات 30', 'Ram 30', 'Ram 30', 'Ram 30', '5467558282', 'Ram 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 247.00, 135.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(582, 'الرامات 31', 'الرامات 31', 'الرامات 31', 'Ram 31', 'Ram 31', 'Ram 31', '3596532152', 'Ram 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 321.00, 199.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(583, 'الرامات 32', 'الرامات 32', 'الرامات 32', 'Ram 32', 'Ram 32', 'Ram 32', '3732165826', 'Ram 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 360.00, 53.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(584, 'الرامات 33', 'الرامات 33', 'الرامات 33', 'Ram 33', 'Ram 33', 'Ram 33', '9086097251', 'Ram 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 231.00, 249.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(585, 'الرامات 34', 'الرامات 34', 'الرامات 34', 'Ram 34', 'Ram 34', 'Ram 34', '2998065989', 'Ram 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 349.00, 153.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(586, 'الرامات 35', 'الرامات 35', 'الرامات 35', 'Ram 35', 'Ram 35', 'Ram 35', '6275972220', 'Ram 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 486.00, 220.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(587, 'الرامات 36', 'الرامات 36', 'الرامات 36', 'Ram 36', 'Ram 36', 'Ram 36', '7932537901', 'Ram 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 412.00, 315.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(588, 'الرامات 37', 'الرامات 37', 'الرامات 37', 'Ram 37', 'Ram 37', 'Ram 37', '666147184', 'Ram 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 171.00, 143.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(589, 'الرامات 38', 'الرامات 38', 'الرامات 38', 'Ram 38', 'Ram 38', 'Ram 38', '5167807702', 'Ram 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 112.00, 255.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(590, 'الرامات 39', 'الرامات 39', 'الرامات 39', 'Ram 39', 'Ram 39', 'Ram 39', '6951592941', 'Ram 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 304.00, 336.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(591, 'الرامات 40', 'الرامات 40', 'الرامات 40', 'Ram 40', 'Ram 40', 'Ram 40', '9624037268', 'Ram 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 366.00, 97.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(592, 'الرامات 41', 'الرامات 41', 'الرامات 41', 'Ram 41', 'Ram 41', 'Ram 41', '548816029', 'Ram 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 126.00, 83.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(593, 'الرامات 42', 'الرامات 42', 'الرامات 42', 'Ram 42', 'Ram 42', 'Ram 42', '4891137027', 'Ram 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 357.00, 282.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(594, 'الرامات 43', 'الرامات 43', 'الرامات 43', 'Ram 43', 'Ram 43', 'Ram 43', '4403420417', 'Ram 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 302.00, 355.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(595, 'الرامات 44', 'الرامات 44', 'الرامات 44', 'Ram 44', 'Ram 44', 'Ram 44', '9989634983', 'Ram 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 422.00, 395.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(596, 'الرامات 45', 'الرامات 45', 'الرامات 45', 'Ram 45', 'Ram 45', 'Ram 45', '6599374972', 'Ram 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 494.00, 127.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(597, 'الرامات 46', 'الرامات 46', 'الرامات 46', 'Ram 46', 'Ram 46', 'Ram 46', '1521744346', 'Ram 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 326.00, 352.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(598, 'الرامات 47', 'الرامات 47', 'الرامات 47', 'Ram 47', 'Ram 47', 'Ram 47', '2998694403', 'Ram 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 394.00, 72.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(599, 'الرامات 48', 'الرامات 48', 'الرامات 48', 'Ram 48', 'Ram 48', 'Ram 48', '8796427913', 'Ram 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 467.00, 358.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(600, 'الرامات 49', 'الرامات 49', 'الرامات 49', 'Ram 49', 'Ram 49', 'Ram 49', '5113191759', 'Ram 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 330.00, 75.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(605, 'SSD 4', 'SSD 4', 'SSD 4', 'SSD 4', 'SSD 4', 'SSD 4', '3842400313', 'SSD 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 201.00, 318.00, NULL, '2022-04-04 10:32:02', '2022-07-06 01:53:32', 1, 0, 0, NULL, 0),
(607, 'SSD 6', 'SSD 6', 'SSD 6', 'SSD 6', 'SSD 6', 'SSD 6', '9697931649', 'SSD 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 340.00, 197.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(608, 'SSD 7', 'SSD 7', 'SSD 7', 'SSD 7', 'SSD 7', 'SSD 7', '899394112', 'SSD 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 313.00, 328.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(609, 'SSD 8', 'SSD 8', 'SSD 8', 'SSD 8', 'SSD 8', 'SSD 8', '2006124522', 'SSD 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 397.00, 61.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(610, 'SSD 9', 'SSD 9', 'SSD 9', 'SSD 9', 'SSD 9', 'SSD 9', '2412209635', 'SSD 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 334.00, 218.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(611, 'SSD 10', 'SSD 10', 'SSD 10', 'SSD 10', 'SSD 10', 'SSD 10', '5453150570', 'SSD 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 389.00, 191.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(612, 'SSD 11', 'SSD 11', 'SSD 11', 'SSD 11', 'SSD 11', 'SSD 11', '5341461182', 'SSD 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 214.00, 154.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(613, 'SSD 12', 'SSD 12', 'SSD 12', 'SSD 12', 'SSD 12', 'SSD 12', '8968340731', 'SSD 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 492.00, 100.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(614, 'SSD 13', 'SSD 13', 'SSD 13', 'SSD 13', 'SSD 13', 'SSD 13', '1559756773', 'SSD 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 483.00, 316.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(615, 'SSD 14', 'SSD 14', 'SSD 14', 'SSD 14', 'SSD 14', 'SSD 14', '4707563332', 'SSD 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 248.00, 168.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(616, 'SSD 15', 'SSD 15', 'SSD 15', 'SSD 15', 'SSD 15', 'SSD 15', '1762788741', 'SSD 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 287.00, 314.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(617, 'SSD 16', 'SSD 16', 'SSD 16', 'SSD 16', 'SSD 16', 'SSD 16', '3635507355', 'SSD 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 286.00, 330.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(618, 'SSD 17', 'SSD 17', 'SSD 17', 'SSD 17', 'SSD 17', 'SSD 17', '5924539829', 'SSD 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 220.00, 217.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(619, 'SSD 18', 'SSD 18', 'SSD 18', 'SSD 18', 'SSD 18', 'SSD 18', '2642206659', 'SSD 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 299.00, 187.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(620, 'SSD 19', 'SSD 19', 'SSD 19', 'SSD 19', 'SSD 19', 'SSD 19', '267969131', 'SSD 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 302.00, 187.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(621, 'SSD 20', 'SSD 20', 'SSD 20', 'SSD 20', 'SSD 20', 'SSD 20', '1140127597', 'SSD 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 119.00, 360.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(622, 'SSD 21', 'SSD 21', 'SSD 21', 'SSD 21', 'SSD 21', 'SSD 21', '7821735956', 'SSD 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 161.00, 400.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(623, 'SSD 22', 'SSD 22', 'SSD 22', 'SSD 22', 'SSD 22', 'SSD 22', '1638517854', 'SSD 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 140.00, 54.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(624, 'SSD 23', 'SSD 23', 'SSD 23', 'SSD 23', 'SSD 23', 'SSD 23', '2761911056', 'SSD 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 269.00, 176.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(625, 'SSD 24', 'SSD 24', 'SSD 24', 'SSD 24', 'SSD 24', 'SSD 24', '8520098352', 'SSD 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 287.00, 195.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(626, 'SSD 25', 'SSD 25', 'SSD 25', 'SSD 25', 'SSD 25', 'SSD 25', '7700745736', 'SSD 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 265.00, 176.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(627, 'SSD 26', 'SSD 26', 'SSD 26', 'SSD 26', 'SSD 26', 'SSD 26', '3585463250', 'SSD 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 302.00, 78.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(628, 'SSD 27', 'SSD 27', 'SSD 27', 'SSD 27', 'SSD 27', 'SSD 27', '8601826137', 'SSD 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 383.00, 333.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(629, 'SSD 28', 'SSD 28', 'SSD 28', 'SSD 28', 'SSD 28', 'SSD 28', '9523329145', 'SSD 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 232.00, 304.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(630, 'SSD 29', 'SSD 29', 'SSD 29', 'SSD 29', 'SSD 29', 'SSD 29', '1160927382', 'SSD 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 178.00, 80.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(631, 'SSD 30', 'SSD 30', 'SSD 30', 'SSD 30', 'SSD 30', 'SSD 30', '5354927647', 'SSD 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 231.00, 62.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(632, 'SSD 31', 'SSD 31', 'SSD 31', 'SSD 31', 'SSD 31', 'SSD 31', '8503509667', 'SSD 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 189.00, 372.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(633, 'SSD 32', 'SSD 32', 'SSD 32', 'SSD 32', 'SSD 32', 'SSD 32', '8680569757', 'SSD 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 170.00, 119.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(634, 'SSD 33', 'SSD 33', 'SSD 33', 'SSD 33', 'SSD 33', 'SSD 33', '5424837086', 'SSD 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 386.00, 352.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(635, 'SSD 34', 'SSD 34', 'SSD 34', 'SSD 34', 'SSD 34', 'SSD 34', '8094560166', 'SSD 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 249.00, 286.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(636, 'SSD 35', 'SSD 35', 'SSD 35', 'SSD 35', 'SSD 35', 'SSD 35', '1822552324', 'SSD 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 304.00, 160.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(637, 'SSD 36', 'SSD 36', 'SSD 36', 'SSD 36', 'SSD 36', 'SSD 36', '6780468542', 'SSD 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 329.00, 169.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(638, 'SSD 37', 'SSD 37', 'SSD 37', 'SSD 37', 'SSD 37', 'SSD 37', '1612192350', 'SSD 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 165.00, 261.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(639, 'SSD 38', 'SSD 38', 'SSD 38', 'SSD 38', 'SSD 38', 'SSD 38', '7144750938', 'SSD 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 210.00, 175.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 1, NULL, 0),
(640, 'SSD 39', 'SSD 39', 'SSD 39', 'SSD 39', 'SSD 39', 'SSD 39', '7213655683', 'SSD 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 321.00, 105.00, NULL, '2022-04-04 10:32:02', '2022-04-04 10:32:02', 1, 0, 0, NULL, 0),
(641, 'SSD 40', 'SSD 40', 'SSD 40', 'SSD 40', 'SSD 40', 'SSD 40', '4573179493', 'SSD 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 394.00, 225.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(642, 'SSD 41', 'SSD 41', 'SSD 41', 'SSD 41', 'SSD 41', 'SSD 41', '7115158452', 'SSD 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 277.00, 163.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(643, 'SSD 42', 'SSD 42', 'SSD 42', 'SSD 42', 'SSD 42', 'SSD 42', '3429703774', 'SSD 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 122.00, 211.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(644, 'SSD 43', 'SSD 43', 'SSD 43', 'SSD 43', 'SSD 43', 'SSD 43', '3909328718', 'SSD 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 429.00, 157.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(645, 'SSD 44', 'SSD 44', 'SSD 44', 'SSD 44', 'SSD 44', 'SSD 44', '6540944592', 'SSD 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 341.00, 370.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(646, 'SSD 45', 'SSD 45', 'SSD 45', 'SSD 45', 'SSD 45', 'SSD 45', '7449592149', 'SSD 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 118.00, 304.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(647, 'SSD 46', 'SSD 46', 'SSD 46', 'SSD 46', 'SSD 46', 'SSD 46', '1513286869', 'SSD 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 299.00, 123.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(648, 'SSD 47', 'SSD 47', 'SSD 47', 'SSD 47', 'SSD 47', 'SSD 47', '1441370543', 'SSD 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 159.00, 149.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(649, 'SSD 48', 'SSD 48', 'SSD 48', 'SSD 48', 'SSD 48', 'SSD 48', '8795188476', 'SSD 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 285.00, 80.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(650, 'SSD 49', 'SSD 49', 'SSD 49', 'SSD 49', 'SSD 49', 'SSD 49', '5426857139', 'SSD 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 266.00, 240.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(652, 'Hardrive HDD 1', 'Hardrive HDD 1', 'Hardrive HDD 1', 'Hardrive HDD 1', 'Hardrive HDD 1', 'Hardrive HDD 1', '6179627993', 'Hardrive HDD 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 206.00, 146.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(654, 'Hardrive HDD 3', 'Hardrive HDD 3', 'Hardrive HDD 3', 'Hardrive HDD 3', 'Hardrive HDD 3', 'Hardrive HDD 3', '6926582262', 'Hardrive HDD 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 397.00, 142.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(655, 'Hardrive HDD 4', 'Hardrive HDD 4', 'Hardrive HDD 4', 'Hardrive HDD 4', 'Hardrive HDD 4', 'Hardrive HDD 4', '1392532039', 'Hardrive HDD 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 324.00, 150.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(656, 'Hardrive HDD 5', 'Hardrive HDD 5', 'Hardrive HDD 5', 'Hardrive HDD 5', 'Hardrive HDD 5', 'Hardrive HDD 5', '266548847', 'Hardrive HDD 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 426.00, 333.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(657, 'Hardrive HDD 6', 'Hardrive HDD 6', 'Hardrive HDD 6', 'Hardrive HDD 6', 'Hardrive HDD 6', 'Hardrive HDD 6', '4096195604', 'Hardrive HDD 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 329.00, 216.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(658, 'Hardrive HDD 7', 'Hardrive HDD 7', 'Hardrive HDD 7', 'Hardrive HDD 7', 'Hardrive HDD 7', 'Hardrive HDD 7', '5332377606', 'Hardrive HDD 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 343.00, 79.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(659, 'Hardrive HDD 8', 'Hardrive HDD 8', 'Hardrive HDD 8', 'Hardrive HDD 8', 'Hardrive HDD 8', 'Hardrive HDD 8', '991714375', 'Hardrive HDD 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 418.00, 226.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(660, 'Hardrive HDD 9', 'Hardrive HDD 9', 'Hardrive HDD 9', 'Hardrive HDD 9', 'Hardrive HDD 9', 'Hardrive HDD 9', '9003487153', 'Hardrive HDD 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 315.00, 399.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(661, 'Hardrive HDD 10', 'Hardrive HDD 10', 'Hardrive HDD 10', 'Hardrive HDD 10', 'Hardrive HDD 10', 'Hardrive HDD 10', '3449903312', 'Hardrive HDD 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 370.00, 396.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(662, 'Hardrive HDD 11', 'Hardrive HDD 11', 'Hardrive HDD 11', 'Hardrive HDD 11', 'Hardrive HDD 11', 'Hardrive HDD 11', '2927412227', 'Hardrive HDD 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 197.00, 175.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(663, 'Hardrive HDD 12', 'Hardrive HDD 12', 'Hardrive HDD 12', 'Hardrive HDD 12', 'Hardrive HDD 12', 'Hardrive HDD 12', '1314775030', 'Hardrive HDD 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 293.00, 236.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(664, 'Hardrive HDD 13', 'Hardrive HDD 13', 'Hardrive HDD 13', 'Hardrive HDD 13', 'Hardrive HDD 13', 'Hardrive HDD 13', '9551673503', 'Hardrive HDD 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 178.00, 245.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(665, 'Hardrive HDD 14', 'Hardrive HDD 14', 'Hardrive HDD 14', 'Hardrive HDD 14', 'Hardrive HDD 14', 'Hardrive HDD 14', '3167414442', 'Hardrive HDD 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 410.00, 204.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(666, 'Hardrive HDD 15', 'Hardrive HDD 15', 'Hardrive HDD 15', 'Hardrive HDD 15', 'Hardrive HDD 15', 'Hardrive HDD 15', '3875971941', 'Hardrive HDD 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 127.00, 234.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(667, 'Hardrive HDD 16', 'Hardrive HDD 16', 'Hardrive HDD 16', 'Hardrive HDD 16', 'Hardrive HDD 16', 'Hardrive HDD 16', '6583712693', 'Hardrive HDD 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 169.00, 286.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(668, 'Hardrive HDD 17', 'Hardrive HDD 17', 'Hardrive HDD 17', 'Hardrive HDD 17', 'Hardrive HDD 17', 'Hardrive HDD 17', '820034359', 'Hardrive HDD 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 357.00, 182.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(669, 'Hardrive HDD 18', 'Hardrive HDD 18', 'Hardrive HDD 18', 'Hardrive HDD 18', 'Hardrive HDD 18', 'Hardrive HDD 18', '5389406826', 'Hardrive HDD 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 495.00, 291.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(670, 'Hardrive HDD 19', 'Hardrive HDD 19', 'Hardrive HDD 19', 'Hardrive HDD 19', 'Hardrive HDD 19', 'Hardrive HDD 19', '5331742063', 'Hardrive HDD 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 354.00, 250.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(671, 'Hardrive HDD 20', 'Hardrive HDD 20', 'Hardrive HDD 20', 'Hardrive HDD 20', 'Hardrive HDD 20', 'Hardrive HDD 20', '4855358637', 'Hardrive HDD 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 391.00, 315.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(672, 'Hardrive HDD 21', 'Hardrive HDD 21', 'Hardrive HDD 21', 'Hardrive HDD 21', 'Hardrive HDD 21', 'Hardrive HDD 21', '1314622996', 'Hardrive HDD 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 193.00, 252.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(673, 'Hardrive HDD 22', 'Hardrive HDD 22', 'Hardrive HDD 22', 'Hardrive HDD 22', 'Hardrive HDD 22', 'Hardrive HDD 22', '7276621611', 'Hardrive HDD 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 330.00, 191.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(674, 'Hardrive HDD 23', 'Hardrive HDD 23', 'Hardrive HDD 23', 'Hardrive HDD 23', 'Hardrive HDD 23', 'Hardrive HDD 23', '9477691952', 'Hardrive HDD 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 350.00, 51.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(675, 'Hardrive HDD 24', 'Hardrive HDD 24', 'Hardrive HDD 24', 'Hardrive HDD 24', 'Hardrive HDD 24', 'Hardrive HDD 24', '3961003022', 'Hardrive HDD 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 352.00, 115.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(676, 'Hardrive HDD 25', 'Hardrive HDD 25', 'Hardrive HDD 25', 'Hardrive HDD 25', 'Hardrive HDD 25', 'Hardrive HDD 25', '9956916823', 'Hardrive HDD 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 249.00, 175.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(677, 'Hardrive HDD 26', 'Hardrive HDD 26', 'Hardrive HDD 26', 'Hardrive HDD 26', 'Hardrive HDD 26', 'Hardrive HDD 26', '8946627218', 'Hardrive HDD 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 214.00, 55.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(678, 'Hardrive HDD 27', 'Hardrive HDD 27', 'Hardrive HDD 27', 'Hardrive HDD 27', 'Hardrive HDD 27', 'Hardrive HDD 27', '4023460134', 'Hardrive HDD 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 399.00, 261.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(679, 'Hardrive HDD 28', 'Hardrive HDD 28', 'Hardrive HDD 28', 'Hardrive HDD 28', 'Hardrive HDD 28', 'Hardrive HDD 28', '1044507945', 'Hardrive HDD 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 146.00, 52.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(680, 'Hardrive HDD 29', 'Hardrive HDD 29', 'Hardrive HDD 29', 'Hardrive HDD 29', 'Hardrive HDD 29', 'Hardrive HDD 29', '4099396894', 'Hardrive HDD 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 413.00, 178.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(681, 'Hardrive HDD 30', 'Hardrive HDD 30', 'Hardrive HDD 30', 'Hardrive HDD 30', 'Hardrive HDD 30', 'Hardrive HDD 30', '9773527390', 'Hardrive HDD 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 314.00, 357.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(682, 'Hardrive HDD 31', 'Hardrive HDD 31', 'Hardrive HDD 31', 'Hardrive HDD 31', 'Hardrive HDD 31', 'Hardrive HDD 31', '9232882176', 'Hardrive HDD 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 275.00, 357.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(683, 'Hardrive HDD 32', 'Hardrive HDD 32', 'Hardrive HDD 32', 'Hardrive HDD 32', 'Hardrive HDD 32', 'Hardrive HDD 32', '1091381445', 'Hardrive HDD 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 147.00, 140.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(684, 'Hardrive HDD 33', 'Hardrive HDD 33', 'Hardrive HDD 33', 'Hardrive HDD 33', 'Hardrive HDD 33', 'Hardrive HDD 33', '8553826007', 'Hardrive HDD 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 462.00, 125.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(685, 'Hardrive HDD 34', 'Hardrive HDD 34', 'Hardrive HDD 34', 'Hardrive HDD 34', 'Hardrive HDD 34', 'Hardrive HDD 34', '9703669456', 'Hardrive HDD 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 232.00, 236.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(686, 'Hardrive HDD 35', 'Hardrive HDD 35', 'Hardrive HDD 35', 'Hardrive HDD 35', 'Hardrive HDD 35', 'Hardrive HDD 35', '353559530', 'Hardrive HDD 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 350.00, 286.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(687, 'Hardrive HDD 36', 'Hardrive HDD 36', 'Hardrive HDD 36', 'Hardrive HDD 36', 'Hardrive HDD 36', 'Hardrive HDD 36', '4762964003', 'Hardrive HDD 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 220.00, 197.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(688, 'Hardrive HDD 37', 'Hardrive HDD 37', 'Hardrive HDD 37', 'Hardrive HDD 37', 'Hardrive HDD 37', 'Hardrive HDD 37', '4636781862', 'Hardrive HDD 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 249.00, 273.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(689, 'Hardrive HDD 38', 'Hardrive HDD 38', 'Hardrive HDD 38', 'Hardrive HDD 38', 'Hardrive HDD 38', 'Hardrive HDD 38', '1521445600', 'Hardrive HDD 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 411.00, 219.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(690, 'Hardrive HDD 39', 'Hardrive HDD 39', 'Hardrive HDD 39', 'Hardrive HDD 39', 'Hardrive HDD 39', 'Hardrive HDD 39', '9427679886', 'Hardrive HDD 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 310.00, 303.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(691, 'Hardrive HDD 40', 'Hardrive HDD 40', 'Hardrive HDD 40', 'Hardrive HDD 40', 'Hardrive HDD 40', 'Hardrive HDD 40', '1454245198', 'Hardrive HDD 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 500.00, 227.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(692, 'Hardrive HDD 41', 'Hardrive HDD 41', 'Hardrive HDD 41', 'Hardrive HDD 41', 'Hardrive HDD 41', 'Hardrive HDD 41', '8932883853', 'Hardrive HDD 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 167.00, 133.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(693, 'Hardrive HDD 42', 'Hardrive HDD 42', 'Hardrive HDD 42', 'Hardrive HDD 42', 'Hardrive HDD 42', 'Hardrive HDD 42', '7576306122', 'Hardrive HDD 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 381.00, 381.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(694, 'Hardrive HDD 43', 'Hardrive HDD 43', 'Hardrive HDD 43', 'Hardrive HDD 43', 'Hardrive HDD 43', 'Hardrive HDD 43', '7723825020', 'Hardrive HDD 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 408.00, 199.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(695, 'Hardrive HDD 44', 'Hardrive HDD 44', 'Hardrive HDD 44', 'Hardrive HDD 44', 'Hardrive HDD 44', 'Hardrive HDD 44', '4087544067', 'Hardrive HDD 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 473.00, 202.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(696, 'Hardrive HDD 45', 'Hardrive HDD 45', 'Hardrive HDD 45', 'Hardrive HDD 45', 'Hardrive HDD 45', 'Hardrive HDD 45', '1604995038', 'Hardrive HDD 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 118.00, 67.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(697, 'Hardrive HDD 46', 'Hardrive HDD 46', 'Hardrive HDD 46', 'Hardrive HDD 46', 'Hardrive HDD 46', 'Hardrive HDD 46', '5765011011', 'Hardrive HDD 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 143.00, 304.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(698, 'Hardrive HDD 47', 'Hardrive HDD 47', 'Hardrive HDD 47', 'Hardrive HDD 47', 'Hardrive HDD 47', 'Hardrive HDD 47', '968439586', 'Hardrive HDD 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 442.00, 341.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(699, 'Hardrive HDD 48', 'Hardrive HDD 48', 'Hardrive HDD 48', 'Hardrive HDD 48', 'Hardrive HDD 48', 'Hardrive HDD 48', '6472192348', 'Hardrive HDD 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 135.00, 146.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(700, 'Hardrive HDD 49', 'Hardrive HDD 49', 'Hardrive HDD 49', 'Hardrive HDD 49', 'Hardrive HDD 49', 'Hardrive HDD 49', '576293457', 'Hardrive HDD 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 257.00, 391.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(701, 'لاقط وايفاي 0', 'لاقط وايفاي 0', 'لاقط وايفاي 0', 'Wifi Adapter 0', 'Wifi Adapter 0', 'Wifi Adapter 0', '6952463596', 'Wifi Adapter 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 454.00, 391.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(702, 'لاقط وايفاي 1', 'لاقط وايفاي 1', 'لاقط وايفاي 1', 'Wifi Adapter 1', 'Wifi Adapter 1', 'Wifi Adapter 1', '167563465', 'Wifi Adapter 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 432.00, 109.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(703, 'لاقط وايفاي 2', 'لاقط وايفاي 2', 'لاقط وايفاي 2', 'Wifi Adapter 2', 'Wifi Adapter 2', 'Wifi Adapter 2', '4846052060', 'Wifi Adapter 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 115.00, 78.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(704, 'لاقط وايفاي 3', 'لاقط وايفاي 3', 'لاقط وايفاي 3', 'Wifi Adapter 3', 'Wifi Adapter 3', 'Wifi Adapter 3', '9697412272', 'Wifi Adapter 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 259.00, 176.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(705, 'لاقط وايفاي 4', 'لاقط وايفاي 4', 'لاقط وايفاي 4', 'Wifi Adapter 4', 'Wifi Adapter 4', 'Wifi Adapter 4', '1860449975', 'Wifi Adapter 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 471.00, 345.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(706, 'لاقط وايفاي 5', 'لاقط وايفاي 5', 'لاقط وايفاي 5', 'Wifi Adapter 5', 'Wifi Adapter 5', 'Wifi Adapter 5', '8614167859', 'Wifi Adapter 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 342.00, 203.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(707, 'لاقط وايفاي 6', 'لاقط وايفاي 6', 'لاقط وايفاي 6', 'Wifi Adapter 6', 'Wifi Adapter 6', 'Wifi Adapter 6', '3324364439', 'Wifi Adapter 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 189.00, 250.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(708, 'لاقط وايفاي 7', 'لاقط وايفاي 7', 'لاقط وايفاي 7', 'Wifi Adapter 7', 'Wifi Adapter 7', 'Wifi Adapter 7', '2262560754', 'Wifi Adapter 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 114.00, 187.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(709, 'لاقط وايفاي 8', 'لاقط وايفاي 8', 'لاقط وايفاي 8', 'Wifi Adapter 8', 'Wifi Adapter 8', 'Wifi Adapter 8', '4261581840', 'Wifi Adapter 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 182.00, 284.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(710, 'لاقط وايفاي 9', 'لاقط وايفاي 9', 'لاقط وايفاي 9', 'Wifi Adapter 9', 'Wifi Adapter 9', 'Wifi Adapter 9', '2398436262', 'Wifi Adapter 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 337.00, 226.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(711, 'لاقط وايفاي 10', 'لاقط وايفاي 10', 'لاقط وايفاي 10', 'Wifi Adapter 10', 'Wifi Adapter 10', 'Wifi Adapter 10', '8266346810', 'Wifi Adapter 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 113.00, 374.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(712, 'لاقط وايفاي 11', 'لاقط وايفاي 11', 'لاقط وايفاي 11', 'Wifi Adapter 11', 'Wifi Adapter 11', 'Wifi Adapter 11', '9237074742', 'Wifi Adapter 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 214.00, 200.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(713, 'لاقط وايفاي 12', 'لاقط وايفاي 12', 'لاقط وايفاي 12', 'Wifi Adapter 12', 'Wifi Adapter 12', 'Wifi Adapter 12', '3701074214', 'Wifi Adapter 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 149.00, 119.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(714, 'لاقط وايفاي 13', 'لاقط وايفاي 13', 'لاقط وايفاي 13', 'Wifi Adapter 13', 'Wifi Adapter 13', 'Wifi Adapter 13', '380737119', 'Wifi Adapter 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 127.00, 131.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(715, 'لاقط وايفاي 14', 'لاقط وايفاي 14', 'لاقط وايفاي 14', 'Wifi Adapter 14', 'Wifi Adapter 14', 'Wifi Adapter 14', '6000285939', 'Wifi Adapter 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 332.00, 381.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(716, 'لاقط وايفاي 15', 'لاقط وايفاي 15', 'لاقط وايفاي 15', 'Wifi Adapter 15', 'Wifi Adapter 15', 'Wifi Adapter 15', '2415958664', 'Wifi Adapter 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 494.00, 74.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(717, 'لاقط وايفاي 16', 'لاقط وايفاي 16', 'لاقط وايفاي 16', 'Wifi Adapter 16', 'Wifi Adapter 16', 'Wifi Adapter 16', '533402876', 'Wifi Adapter 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 225.00, 116.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(718, 'لاقط وايفاي 17', 'لاقط وايفاي 17', 'لاقط وايفاي 17', 'Wifi Adapter 17', 'Wifi Adapter 17', 'Wifi Adapter 17', '7244238961', 'Wifi Adapter 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 381.00, 156.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(719, 'لاقط وايفاي 18', 'لاقط وايفاي 18', 'لاقط وايفاي 18', 'Wifi Adapter 18', 'Wifi Adapter 18', 'Wifi Adapter 18', '3575541751', 'Wifi Adapter 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 246.00, 270.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(720, 'لاقط وايفاي 19', 'لاقط وايفاي 19', 'لاقط وايفاي 19', 'Wifi Adapter 19', 'Wifi Adapter 19', 'Wifi Adapter 19', '6856632743', 'Wifi Adapter 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 467.00, 379.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(721, 'لاقط وايفاي 20', 'لاقط وايفاي 20', 'لاقط وايفاي 20', 'Wifi Adapter 20', 'Wifi Adapter 20', 'Wifi Adapter 20', '4039370498', 'Wifi Adapter 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 369.00, 297.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(722, 'لاقط وايفاي 21', 'لاقط وايفاي 21', 'لاقط وايفاي 21', 'Wifi Adapter 21', 'Wifi Adapter 21', 'Wifi Adapter 21', '6997240326', 'Wifi Adapter 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 309.00, 165.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(723, 'لاقط وايفاي 22', 'لاقط وايفاي 22', 'لاقط وايفاي 22', 'Wifi Adapter 22', 'Wifi Adapter 22', 'Wifi Adapter 22', '8329405979', 'Wifi Adapter 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 234.00, 179.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(724, 'لاقط وايفاي 23', 'لاقط وايفاي 23', 'لاقط وايفاي 23', 'Wifi Adapter 23', 'Wifi Adapter 23', 'Wifi Adapter 23', '2189648872', 'Wifi Adapter 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 297.00, 327.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(725, 'لاقط وايفاي 24', 'لاقط وايفاي 24', 'لاقط وايفاي 24', 'Wifi Adapter 24', 'Wifi Adapter 24', 'Wifi Adapter 24', '316936065', 'Wifi Adapter 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 337.00, 164.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(726, 'لاقط وايفاي 25', 'لاقط وايفاي 25', 'لاقط وايفاي 25', 'Wifi Adapter 25', 'Wifi Adapter 25', 'Wifi Adapter 25', '9976400477', 'Wifi Adapter 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 345.00, 313.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(727, 'لاقط وايفاي 26', 'لاقط وايفاي 26', 'لاقط وايفاي 26', 'Wifi Adapter 26', 'Wifi Adapter 26', 'Wifi Adapter 26', '162372178', 'Wifi Adapter 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 292.00, 130.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(728, 'لاقط وايفاي 27', 'لاقط وايفاي 27', 'لاقط وايفاي 27', 'Wifi Adapter 27', 'Wifi Adapter 27', 'Wifi Adapter 27', '6599119208', 'Wifi Adapter 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 364.00, 288.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(729, 'لاقط وايفاي 28', 'لاقط وايفاي 28', 'لاقط وايفاي 28', 'Wifi Adapter 28', 'Wifi Adapter 28', 'Wifi Adapter 28', '9152330562', 'Wifi Adapter 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 232.00, 158.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(730, 'لاقط وايفاي 29', 'لاقط وايفاي 29', 'لاقط وايفاي 29', 'Wifi Adapter 29', 'Wifi Adapter 29', 'Wifi Adapter 29', '4116563077', 'Wifi Adapter 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 140.00, 387.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(731, 'لاقط وايفاي 30', 'لاقط وايفاي 30', 'لاقط وايفاي 30', 'Wifi Adapter 30', 'Wifi Adapter 30', 'Wifi Adapter 30', '5534956718', 'Wifi Adapter 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 360.00, 227.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(732, 'لاقط وايفاي 31', 'لاقط وايفاي 31', 'لاقط وايفاي 31', 'Wifi Adapter 31', 'Wifi Adapter 31', 'Wifi Adapter 31', '8383987273', 'Wifi Adapter 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 422.00, 335.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(733, 'لاقط وايفاي 32', 'لاقط وايفاي 32', 'لاقط وايفاي 32', 'Wifi Adapter 32', 'Wifi Adapter 32', 'Wifi Adapter 32', '908293850', 'Wifi Adapter 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 438.00, 289.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(734, 'لاقط وايفاي 33', 'لاقط وايفاي 33', 'لاقط وايفاي 33', 'Wifi Adapter 33', 'Wifi Adapter 33', 'Wifi Adapter 33', '9421003683', 'Wifi Adapter 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 266.00, 61.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(735, 'لاقط وايفاي 34', 'لاقط وايفاي 34', 'لاقط وايفاي 34', 'Wifi Adapter 34', 'Wifi Adapter 34', 'Wifi Adapter 34', '36813725', 'Wifi Adapter 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 296.00, 331.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(736, 'لاقط وايفاي 35', 'لاقط وايفاي 35', 'لاقط وايفاي 35', 'Wifi Adapter 35', 'Wifi Adapter 35', 'Wifi Adapter 35', '1620664909', 'Wifi Adapter 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 486.00, 267.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(737, 'لاقط وايفاي 36', 'لاقط وايفاي 36', 'لاقط وايفاي 36', 'Wifi Adapter 36', 'Wifi Adapter 36', 'Wifi Adapter 36', '8528809964', 'Wifi Adapter 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 369.00, 190.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(738, 'لاقط وايفاي 37', 'لاقط وايفاي 37', 'لاقط وايفاي 37', 'Wifi Adapter 37', 'Wifi Adapter 37', 'Wifi Adapter 37', '4603540084', 'Wifi Adapter 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 489.00, 131.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(739, 'لاقط وايفاي 38', 'لاقط وايفاي 38', 'لاقط وايفاي 38', 'Wifi Adapter 38', 'Wifi Adapter 38', 'Wifi Adapter 38', '1586067188', 'Wifi Adapter 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 356.00, 343.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(740, 'لاقط وايفاي 39', 'لاقط وايفاي 39', 'لاقط وايفاي 39', 'Wifi Adapter 39', 'Wifi Adapter 39', 'Wifi Adapter 39', '2175739683', 'Wifi Adapter 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 399.00, 286.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(741, 'لاقط وايفاي 40', 'لاقط وايفاي 40', 'لاقط وايفاي 40', 'Wifi Adapter 40', 'Wifi Adapter 40', 'Wifi Adapter 40', '4478946277', 'Wifi Adapter 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 445.00, 384.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(742, 'لاقط وايفاي 41', 'لاقط وايفاي 41', 'لاقط وايفاي 41', 'Wifi Adapter 41', 'Wifi Adapter 41', 'Wifi Adapter 41', '3794435809', 'Wifi Adapter 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 425.00, 50.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(743, 'لاقط وايفاي 42', 'لاقط وايفاي 42', 'لاقط وايفاي 42', 'Wifi Adapter 42', 'Wifi Adapter 42', 'Wifi Adapter 42', '118954624', 'Wifi Adapter 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 122.00, 156.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(744, 'لاقط وايفاي 43', 'لاقط وايفاي 43', 'لاقط وايفاي 43', 'Wifi Adapter 43', 'Wifi Adapter 43', 'Wifi Adapter 43', '3775536347', 'Wifi Adapter 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 275.00, 140.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(745, 'لاقط وايفاي 44', 'لاقط وايفاي 44', 'لاقط وايفاي 44', 'Wifi Adapter 44', 'Wifi Adapter 44', 'Wifi Adapter 44', '823951894', 'Wifi Adapter 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 489.00, 292.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(746, 'لاقط وايفاي 45', 'لاقط وايفاي 45', 'لاقط وايفاي 45', 'Wifi Adapter 45', 'Wifi Adapter 45', 'Wifi Adapter 45', '7994403360', 'Wifi Adapter 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 393.00, 240.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(747, 'لاقط وايفاي 46', 'لاقط وايفاي 46', 'لاقط وايفاي 46', 'Wifi Adapter 46', 'Wifi Adapter 46', 'Wifi Adapter 46', '4044098798', 'Wifi Adapter 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 118.00, 115.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(748, 'لاقط وايفاي 47', 'لاقط وايفاي 47', 'لاقط وايفاي 47', 'Wifi Adapter 47', 'Wifi Adapter 47', 'Wifi Adapter 47', '638313781', 'Wifi Adapter 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 193.00, 324.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(749, 'لاقط وايفاي 48', 'لاقط وايفاي 48', 'لاقط وايفاي 48', 'Wifi Adapter 48', 'Wifi Adapter 48', 'Wifi Adapter 48', '1605341943', 'Wifi Adapter 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 162.00, 179.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(750, 'لاقط وايفاي 49', 'لاقط وايفاي 49', 'لاقط وايفاي 49', 'Wifi Adapter 49', 'Wifi Adapter 49', 'Wifi Adapter 49', '105683120', 'Wifi Adapter 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 341.00, 303.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(755, 'كروت الشاشة 4', 'كروت الشاشة 4', 'كروت الشاشة 4', 'Graphic card 4', 'Graphic card 4', 'Graphic card 4', '2896710841', 'Graphic card 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 188.00, 145.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(756, 'كروت الشاشة 5', 'كروت الشاشة 5', 'كروت الشاشة 5', 'Graphic card 5', 'Graphic card 5', 'Graphic card 5', '1106529952', 'Graphic card 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 313.00, 162.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(757, 'كروت الشاشة 6', 'كروت الشاشة 6', 'كروت الشاشة 6', 'Graphic card 6', 'Graphic card 6', 'Graphic card 6', '4213876438', 'Graphic card 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 128.00, 133.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(759, 'كروت الشاشة 8', 'كروت الشاشة 8', 'كروت الشاشة 8', 'Graphic card 8', 'Graphic card 8', 'Graphic card 8', '1286821956', 'Graphic card 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 114.00, 62.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(760, 'كروت الشاشة 9', 'كروت الشاشة 9', 'كروت الشاشة 9', 'Graphic card 9', 'Graphic card 9', 'Graphic card 9', '6918857795', 'Graphic card 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 453.00, 320.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(761, 'كروت الشاشة 10', 'كروت الشاشة 10', 'كروت الشاشة 10', 'Graphic card 10', 'Graphic card 10', 'Graphic card 10', '8407139514', 'Graphic card 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 442.00, 86.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(762, 'كروت الشاشة 11', 'كروت الشاشة 11', 'كروت الشاشة 11', 'Graphic card 11', 'Graphic card 11', 'Graphic card 11', '5856179593', 'Graphic card 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 181.00, 361.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(763, 'كروت الشاشة 12', 'كروت الشاشة 12', 'كروت الشاشة 12', 'Graphic card 12', 'Graphic card 12', 'Graphic card 12', '9313541802', 'Graphic card 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 381.00, 133.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(764, 'كروت الشاشة 13', 'كروت الشاشة 13', 'كروت الشاشة 13', 'Graphic card 13', 'Graphic card 13', 'Graphic card 13', '5292282964', 'Graphic card 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 468.00, 285.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(765, 'كروت الشاشة 14', 'كروت الشاشة 14', 'كروت الشاشة 14', 'Graphic card 14', 'Graphic card 14', 'Graphic card 14', '5722601103', 'Graphic card 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 216.00, 305.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(766, 'كروت الشاشة 15', 'كروت الشاشة 15', 'كروت الشاشة 15', 'Graphic card 15', 'Graphic card 15', 'Graphic card 15', '5980265054', 'Graphic card 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 115.00, 330.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(767, 'كروت الشاشة 16', 'كروت الشاشة 16', 'كروت الشاشة 16', 'Graphic card 16', 'Graphic card 16', 'Graphic card 16', '4172253960', 'Graphic card 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 468.00, 304.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(768, 'كروت الشاشة 17', 'كروت الشاشة 17', 'كروت الشاشة 17', 'Graphic card 17', 'Graphic card 17', 'Graphic card 17', '6577254370', 'Graphic card 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 419.00, 222.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(769, 'كروت الشاشة 18', 'كروت الشاشة 18', 'كروت الشاشة 18', 'Graphic card 18', 'Graphic card 18', 'Graphic card 18', '5406974481', 'Graphic card 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 202.00, 305.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(770, 'كروت الشاشة 19', 'كروت الشاشة 19', 'كروت الشاشة 19', 'Graphic card 19', 'Graphic card 19', 'Graphic card 19', '6114328981', 'Graphic card 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 372.00, 314.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(771, 'كروت الشاشة 20', 'كروت الشاشة 20', 'كروت الشاشة 20', 'Graphic card 20', 'Graphic card 20', 'Graphic card 20', '3421065557', 'Graphic card 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 380.00, 242.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(772, 'كروت الشاشة 21', 'كروت الشاشة 21', 'كروت الشاشة 21', 'Graphic card 21', 'Graphic card 21', 'Graphic card 21', '8371570487', 'Graphic card 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 352.00, 52.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(773, 'كروت الشاشة 22', 'كروت الشاشة 22', 'كروت الشاشة 22', 'Graphic card 22', 'Graphic card 22', 'Graphic card 22', '7551843275', 'Graphic card 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 346.00, 263.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(774, 'كروت الشاشة 23', 'كروت الشاشة 23', 'كروت الشاشة 23', 'Graphic card 23', 'Graphic card 23', 'Graphic card 23', '1655858912', 'Graphic card 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 147.00, 370.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(775, 'كروت الشاشة 24', 'كروت الشاشة 24', 'كروت الشاشة 24', 'Graphic card 24', 'Graphic card 24', 'Graphic card 24', '6936791086', 'Graphic card 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 127.00, 113.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(776, 'كروت الشاشة 25', 'كروت الشاشة 25', 'كروت الشاشة 25', 'Graphic card 25', 'Graphic card 25', 'Graphic card 25', '3686797685', 'Graphic card 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 421.00, 120.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(777, 'كروت الشاشة 26', 'كروت الشاشة 26', 'كروت الشاشة 26', 'Graphic card 26', 'Graphic card 26', 'Graphic card 26', '4766539622', 'Graphic card 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 240.00, 326.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(778, 'كروت الشاشة 27', 'كروت الشاشة 27', 'كروت الشاشة 27', 'Graphic card 27', 'Graphic card 27', 'Graphic card 27', '7617985791', 'Graphic card 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 406.00, 300.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(779, 'كروت الشاشة 28', 'كروت الشاشة 28', 'كروت الشاشة 28', 'Graphic card 28', 'Graphic card 28', 'Graphic card 28', '9012972051', 'Graphic card 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 458.00, 278.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(780, 'كروت الشاشة 29', 'كروت الشاشة 29', 'كروت الشاشة 29', 'Graphic card 29', 'Graphic card 29', 'Graphic card 29', '5490993391', 'Graphic card 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 340.00, 142.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(781, 'كروت الشاشة 30', 'كروت الشاشة 30', 'كروت الشاشة 30', 'Graphic card 30', 'Graphic card 30', 'Graphic card 30', '7420483306', 'Graphic card 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 424.00, 183.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(782, 'كروت الشاشة 31', 'كروت الشاشة 31', 'كروت الشاشة 31', 'Graphic card 31', 'Graphic card 31', 'Graphic card 31', '6658846043', 'Graphic card 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 321.00, 335.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(783, 'كروت الشاشة 32', 'كروت الشاشة 32', 'كروت الشاشة 32', 'Graphic card 32', 'Graphic card 32', 'Graphic card 32', '1854234956', 'Graphic card 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 378.00, 195.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(784, 'كروت الشاشة 33', 'كروت الشاشة 33', 'كروت الشاشة 33', 'Graphic card 33', 'Graphic card 33', 'Graphic card 33', '5611763847', 'Graphic card 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 416.00, 293.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(785, 'كروت الشاشة 34', 'كروت الشاشة 34', 'كروت الشاشة 34', 'Graphic card 34', 'Graphic card 34', 'Graphic card 34', '9269606171', 'Graphic card 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 202.00, 258.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(786, 'كروت الشاشة 35', 'كروت الشاشة 35', 'كروت الشاشة 35', 'Graphic card 35', 'Graphic card 35', 'Graphic card 35', '4639879319', 'Graphic card 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 180.00, 287.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(787, 'كروت الشاشة 36', 'كروت الشاشة 36', 'كروت الشاشة 36', 'Graphic card 36', 'Graphic card 36', 'Graphic card 36', '1548360674', 'Graphic card 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 229.00, 398.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(788, 'كروت الشاشة 37', 'كروت الشاشة 37', 'كروت الشاشة 37', 'Graphic card 37', 'Graphic card 37', 'Graphic card 37', '7429837906', 'Graphic card 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 138.00, 352.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(789, 'كروت الشاشة 38', 'كروت الشاشة 38', 'كروت الشاشة 38', 'Graphic card 38', 'Graphic card 38', 'Graphic card 38', '8819269328', 'Graphic card 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 147.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(790, 'كروت الشاشة 39', 'كروت الشاشة 39', 'كروت الشاشة 39', 'Graphic card 39', 'Graphic card 39', 'Graphic card 39', '2916416817', 'Graphic card 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 166.00, 397.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(791, 'كروت الشاشة 40', 'كروت الشاشة 40', 'كروت الشاشة 40', 'Graphic card 40', 'Graphic card 40', 'Graphic card 40', '4170171665', 'Graphic card 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 112.00, 223.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(792, 'كروت الشاشة 41', 'كروت الشاشة 41', 'كروت الشاشة 41', 'Graphic card 41', 'Graphic card 41', 'Graphic card 41', '5172480198', 'Graphic card 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 275.00, 336.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(793, 'كروت الشاشة 42', 'كروت الشاشة 42', 'كروت الشاشة 42', 'Graphic card 42', 'Graphic card 42', 'Graphic card 42', '2074141633', 'Graphic card 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 134.00, 361.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(794, 'كروت الشاشة 43', 'كروت الشاشة 43', 'كروت الشاشة 43', 'Graphic card 43', 'Graphic card 43', 'Graphic card 43', '7896794097', 'Graphic card 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 368.00, 205.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(795, 'كروت الشاشة 44', 'كروت الشاشة 44', 'كروت الشاشة 44', 'Graphic card 44', 'Graphic card 44', 'Graphic card 44', '9284919385', 'Graphic card 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 271.00, 70.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(796, 'كروت الشاشة 45', 'كروت الشاشة 45', 'كروت الشاشة 45', 'Graphic card 45', 'Graphic card 45', 'Graphic card 45', '3223762562', 'Graphic card 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 229.00, 109.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(797, 'كروت الشاشة 46', 'كروت الشاشة 46', 'كروت الشاشة 46', 'Graphic card 46', 'Graphic card 46', 'Graphic card 46', '7325768010', 'Graphic card 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 409.00, 293.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(798, 'كروت الشاشة 47', 'كروت الشاشة 47', 'كروت الشاشة 47', 'Graphic card 47', 'Graphic card 47', 'Graphic card 47', '9285902537', 'Graphic card 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 106.00, 396.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(799, 'كروت الشاشة 48', 'كروت الشاشة 48', 'كروت الشاشة 48', 'Graphic card 48', 'Graphic card 48', 'Graphic card 48', '2185595107', 'Graphic card 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 368.00, 139.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(800, 'كروت الشاشة 49', 'كروت الشاشة 49', 'كروت الشاشة 49', 'Graphic card 49', 'Graphic card 49', 'Graphic card 49', '867378798', 'Graphic card 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 241.00, 120.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(801, 'مبرد المعالج 0', 'مبرد المعالج 0', 'مبرد المعالج 0', 'CPU Cooler 0', 'CPU Cooler 0', 'CPU Cooler 0', '2068835724', 'CPU Cooler 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 187.00, 148.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(802, 'مبرد المعالج 1', 'مبرد المعالج 1', 'مبرد المعالج 1', 'CPU Cooler 1', 'CPU Cooler 1', 'CPU Cooler 1', '8545550830', 'CPU Cooler 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 172.00, 277.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(803, 'مبرد المعالج 2', 'مبرد المعالج 2', 'مبرد المعالج 2', 'CPU Cooler 2', 'CPU Cooler 2', 'CPU Cooler 2', '8552337491', 'CPU Cooler 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 413.00, 240.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(804, 'مبرد المعالج 3', 'مبرد المعالج 3', 'مبرد المعالج 3', 'CPU Cooler 3', 'CPU Cooler 3', 'CPU Cooler 3', '4909235832', 'CPU Cooler 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 447.00, 333.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(805, 'مبرد المعالج 4', 'مبرد المعالج 4', 'مبرد المعالج 4', 'CPU Cooler 4', 'CPU Cooler 4', 'CPU Cooler 4', '4435698292', 'CPU Cooler 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 208.00, 250.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(806, 'مبرد المعالج 5', 'مبرد المعالج 5', 'مبرد المعالج 5', 'CPU Cooler 5', 'CPU Cooler 5', 'CPU Cooler 5', '9889739266', 'CPU Cooler 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 350.00, 211.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(807, 'مبرد المعالج 6', 'مبرد المعالج 6', 'مبرد المعالج 6', 'CPU Cooler 6', 'CPU Cooler 6', 'CPU Cooler 6', '5415216712', 'CPU Cooler 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 493.00, 261.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(808, 'مبرد المعالج 7', 'مبرد المعالج 7', 'مبرد المعالج 7', 'CPU Cooler 7', 'CPU Cooler 7', 'CPU Cooler 7', '1506222805', 'CPU Cooler 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 321.00, 126.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(809, 'مبرد المعالج 8', 'مبرد المعالج 8', 'مبرد المعالج 8', 'CPU Cooler 8', 'CPU Cooler 8', 'CPU Cooler 8', '9832814317', 'CPU Cooler 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 127.00, 202.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(810, 'مبرد المعالج 9', 'مبرد المعالج 9', 'مبرد المعالج 9', 'CPU Cooler 9', 'CPU Cooler 9', 'CPU Cooler 9', '2972934309', 'CPU Cooler 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 273.00, 52.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(811, 'مبرد المعالج 10', 'مبرد المعالج 10', 'مبرد المعالج 10', 'CPU Cooler 10', 'CPU Cooler 10', 'CPU Cooler 10', '9427347549', 'CPU Cooler 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 116.00, 373.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(812, 'مبرد المعالج 11', 'مبرد المعالج 11', 'مبرد المعالج 11', 'CPU Cooler 11', 'CPU Cooler 11', 'CPU Cooler 11', '634310380', 'CPU Cooler 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 246.00, 313.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(813, 'مبرد المعالج 12', 'مبرد المعالج 12', 'مبرد المعالج 12', 'CPU Cooler 12', 'CPU Cooler 12', 'CPU Cooler 12', '4132546671', 'CPU Cooler 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 133.00, 178.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(814, 'مبرد المعالج 13', 'مبرد المعالج 13', 'مبرد المعالج 13', 'CPU Cooler 13', 'CPU Cooler 13', 'CPU Cooler 13', '1149346892', 'CPU Cooler 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 494.00, 118.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(815, 'مبرد المعالج 14', 'مبرد المعالج 14', 'مبرد المعالج 14', 'CPU Cooler 14', 'CPU Cooler 14', 'CPU Cooler 14', '345673233', 'CPU Cooler 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 179.00, 121.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(816, 'مبرد المعالج 15', 'مبرد المعالج 15', 'مبرد المعالج 15', 'CPU Cooler 15', 'CPU Cooler 15', 'CPU Cooler 15', '9128116731', 'CPU Cooler 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 314.00, 86.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(817, 'مبرد المعالج 16', 'مبرد المعالج 16', 'مبرد المعالج 16', 'CPU Cooler 16', 'CPU Cooler 16', 'CPU Cooler 16', '6064664646', 'CPU Cooler 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 459.00, 321.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(818, 'مبرد المعالج 17', 'مبرد المعالج 17', 'مبرد المعالج 17', 'CPU Cooler 17', 'CPU Cooler 17', 'CPU Cooler 17', '7357794336', 'CPU Cooler 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 221.00, 398.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(819, 'مبرد المعالج 18', 'مبرد المعالج 18', 'مبرد المعالج 18', 'CPU Cooler 18', 'CPU Cooler 18', 'CPU Cooler 18', '5286929760', 'CPU Cooler 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 343.00, 133.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(820, 'مبرد المعالج 19', 'مبرد المعالج 19', 'مبرد المعالج 19', 'CPU Cooler 19', 'CPU Cooler 19', 'CPU Cooler 19', '7147375590', 'CPU Cooler 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 439.00, 373.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(821, 'مبرد المعالج 20', 'مبرد المعالج 20', 'مبرد المعالج 20', 'CPU Cooler 20', 'CPU Cooler 20', 'CPU Cooler 20', '2658411785', 'CPU Cooler 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 418.00, 393.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(822, 'مبرد المعالج 21', 'مبرد المعالج 21', 'مبرد المعالج 21', 'CPU Cooler 21', 'CPU Cooler 21', 'CPU Cooler 21', '7972219826', 'CPU Cooler 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 372.00, 329.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(823, 'مبرد المعالج 22', 'مبرد المعالج 22', 'مبرد المعالج 22', 'CPU Cooler 22', 'CPU Cooler 22', 'CPU Cooler 22', '8874914391', 'CPU Cooler 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 343.00, 335.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(824, 'مبرد المعالج 23', 'مبرد المعالج 23', 'مبرد المعالج 23', 'CPU Cooler 23', 'CPU Cooler 23', 'CPU Cooler 23', '6785483365', 'CPU Cooler 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 347.00, 310.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(825, 'مبرد المعالج 24', 'مبرد المعالج 24', 'مبرد المعالج 24', 'CPU Cooler 24', 'CPU Cooler 24', 'CPU Cooler 24', '6063158767', 'CPU Cooler 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 307.00, 251.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(826, 'مبرد المعالج 25', 'مبرد المعالج 25', 'مبرد المعالج 25', 'CPU Cooler 25', 'CPU Cooler 25', 'CPU Cooler 25', '5708967306', 'CPU Cooler 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 394.00, 396.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(827, 'مبرد المعالج 26', 'مبرد المعالج 26', 'مبرد المعالج 26', 'CPU Cooler 26', 'CPU Cooler 26', 'CPU Cooler 26', '9154519249', 'CPU Cooler 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 207.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(828, 'مبرد المعالج 27', 'مبرد المعالج 27', 'مبرد المعالج 27', 'CPU Cooler 27', 'CPU Cooler 27', 'CPU Cooler 27', '9475329139', 'CPU Cooler 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 467.00, 325.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(829, 'مبرد المعالج 28', 'مبرد المعالج 28', 'مبرد المعالج 28', 'CPU Cooler 28', 'CPU Cooler 28', 'CPU Cooler 28', '6729435178', 'CPU Cooler 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 194.00, 288.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(830, 'مبرد المعالج 29', 'مبرد المعالج 29', 'مبرد المعالج 29', 'CPU Cooler 29', 'CPU Cooler 29', 'CPU Cooler 29', '3337084040', 'CPU Cooler 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 115.00, 339.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(831, 'مبرد المعالج 30', 'مبرد المعالج 30', 'مبرد المعالج 30', 'CPU Cooler 30', 'CPU Cooler 30', 'CPU Cooler 30', '760666782', 'CPU Cooler 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 242.00, 118.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(832, 'مبرد المعالج 31', 'مبرد المعالج 31', 'مبرد المعالج 31', 'CPU Cooler 31', 'CPU Cooler 31', 'CPU Cooler 31', '5750622105', 'CPU Cooler 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 294.00, 173.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(833, 'مبرد المعالج 32', 'مبرد المعالج 32', 'مبرد المعالج 32', 'CPU Cooler 32', 'CPU Cooler 32', 'CPU Cooler 32', '2749179620', 'CPU Cooler 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 335.00, 148.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(834, 'مبرد المعالج 33', 'مبرد المعالج 33', 'مبرد المعالج 33', 'CPU Cooler 33', 'CPU Cooler 33', 'CPU Cooler 33', '1643322211', 'CPU Cooler 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 144.00, 160.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(835, 'مبرد المعالج 34', 'مبرد المعالج 34', 'مبرد المعالج 34', 'CPU Cooler 34', 'CPU Cooler 34', 'CPU Cooler 34', '1515119824', 'CPU Cooler 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 437.00, 131.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(836, 'مبرد المعالج 35', 'مبرد المعالج 35', 'مبرد المعالج 35', 'CPU Cooler 35', 'CPU Cooler 35', 'CPU Cooler 35', '2823205832', 'CPU Cooler 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 430.00, 163.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(837, 'مبرد المعالج 36', 'مبرد المعالج 36', 'مبرد المعالج 36', 'CPU Cooler 36', 'CPU Cooler 36', 'CPU Cooler 36', '9776926864', 'CPU Cooler 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 468.00, 267.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(838, 'مبرد المعالج 37', 'مبرد المعالج 37', 'مبرد المعالج 37', 'CPU Cooler 37', 'CPU Cooler 37', 'CPU Cooler 37', '8060899246', 'CPU Cooler 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 296.00, 157.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(839, 'مبرد المعالج 38', 'مبرد المعالج 38', 'مبرد المعالج 38', 'CPU Cooler 38', 'CPU Cooler 38', 'CPU Cooler 38', '2743978865', 'CPU Cooler 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 220.00, 323.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(840, 'مبرد المعالج 39', 'مبرد المعالج 39', 'مبرد المعالج 39', 'CPU Cooler 39', 'CPU Cooler 39', 'CPU Cooler 39', '6163450425', 'CPU Cooler 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 119.00, 128.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(841, 'مبرد المعالج 40', 'مبرد المعالج 40', 'مبرد المعالج 40', 'CPU Cooler 40', 'CPU Cooler 40', 'CPU Cooler 40', '43888129', 'CPU Cooler 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 498.00, 134.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(842, 'مبرد المعالج 41', 'مبرد المعالج 41', 'مبرد المعالج 41', 'CPU Cooler 41', 'CPU Cooler 41', 'CPU Cooler 41', '1168334393', 'CPU Cooler 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 255.00, 163.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(843, 'مبرد المعالج 42', 'مبرد المعالج 42', 'مبرد المعالج 42', 'CPU Cooler 42', 'CPU Cooler 42', 'CPU Cooler 42', '7969570748', 'CPU Cooler 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 246.00, 279.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(844, 'مبرد المعالج 43', 'مبرد المعالج 43', 'مبرد المعالج 43', 'CPU Cooler 43', 'CPU Cooler 43', 'CPU Cooler 43', '4306944274', 'CPU Cooler 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 232.00, 296.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(845, 'مبرد المعالج 44', 'مبرد المعالج 44', 'مبرد المعالج 44', 'CPU Cooler 44', 'CPU Cooler 44', 'CPU Cooler 44', '7085907313', 'CPU Cooler 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 404.00, 87.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(846, 'مبرد المعالج 45', 'مبرد المعالج 45', 'مبرد المعالج 45', 'CPU Cooler 45', 'CPU Cooler 45', 'CPU Cooler 45', '1943082113', 'CPU Cooler 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 492.00, 219.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(847, 'مبرد المعالج 46', 'مبرد المعالج 46', 'مبرد المعالج 46', 'CPU Cooler 46', 'CPU Cooler 46', 'CPU Cooler 46', '159880649', 'CPU Cooler 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 324.00, 244.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(848, 'مبرد المعالج 47', 'مبرد المعالج 47', 'مبرد المعالج 47', 'CPU Cooler 47', 'CPU Cooler 47', 'CPU Cooler 47', '555056333', 'CPU Cooler 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 442.00, 170.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(849, 'مبرد المعالج 48', 'مبرد المعالج 48', 'مبرد المعالج 48', 'CPU Cooler 48', 'CPU Cooler 48', 'CPU Cooler 48', '5865419834', 'CPU Cooler 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 147.00, 383.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(850, 'مبرد المعالج 49', 'مبرد المعالج 49', 'مبرد المعالج 49', 'CPU Cooler 49', 'CPU Cooler 49', 'CPU Cooler 49', '4315213700', 'CPU Cooler 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 413.00, 128.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(851, 'مزود الطاقة 0', 'مزود الطاقة 0', 'مزود الطاقة 0', 'Power Supply 0', 'Power Supply 0', 'Power Supply 0', '6639108887', 'Power Supply 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 269.00, 324.00, NULL, '2022-04-04 10:32:03', '2022-06-03 10:40:29', 1, 0, 11, NULL, 0),
(852, 'مزود الطاقة 1', 'مزود الطاقة 1', 'مزود الطاقة 1', 'Power Supply 1', 'Power Supply 1', 'Power Supply 1', '7484024663', 'Power Supply 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 242.00, 173.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(853, 'مزود الطاقة 2', 'مزود الطاقة 2', 'مزود الطاقة 2', 'Power Supply 2', 'Power Supply 2', 'Power Supply 2', '2908760773', 'Power Supply 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 199.00, 351.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(854, 'مزود الطاقة 3', 'مزود الطاقة 3', 'مزود الطاقة 3', 'Power Supply 3', 'Power Supply 3', 'Power Supply 3', '1638822261', 'Power Supply 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 223.00, 127.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(855, 'مزود الطاقة 4', 'مزود الطاقة 4', 'مزود الطاقة 4', 'Power Supply 4', 'Power Supply 4', 'Power Supply 4', '7357263232', 'Power Supply 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 125.00, 206.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(856, 'مزود الطاقة 5', 'مزود الطاقة 5', 'مزود الطاقة 5', 'Power Supply 5', 'Power Supply 5', 'Power Supply 5', '3781563908', 'Power Supply 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 331.00, 81.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(857, 'مزود الطاقة 6', 'مزود الطاقة 6', 'مزود الطاقة 6', 'Power Supply 6', 'Power Supply 6', 'Power Supply 6', '1914855702', 'Power Supply 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 139.00, 256.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(858, 'مزود الطاقة 7', 'مزود الطاقة 7', 'مزود الطاقة 7', 'Power Supply 7', 'Power Supply 7', 'Power Supply 7', '6867192735', 'Power Supply 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 393.00, 303.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(859, 'مزود الطاقة 8', 'مزود الطاقة 8', 'مزود الطاقة 8', 'Power Supply 8', 'Power Supply 8', 'Power Supply 8', '5377376207', 'Power Supply 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 263.00, 233.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(860, 'مزود الطاقة 9', 'مزود الطاقة 9', 'مزود الطاقة 9', 'Power Supply 9', 'Power Supply 9', 'Power Supply 9', '8609924455', 'Power Supply 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 316.00, 316.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(861, 'مزود الطاقة 10', 'مزود الطاقة 10', 'مزود الطاقة 10', 'Power Supply 10', 'Power Supply 10', 'Power Supply 10', '1438753317', 'Power Supply 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 161.00, 164.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(862, 'مزود الطاقة 11', 'مزود الطاقة 11', 'مزود الطاقة 11', 'Power Supply 11', 'Power Supply 11', 'Power Supply 11', '8580213186', 'Power Supply 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 138.00, 342.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(863, 'مزود الطاقة 12', 'مزود الطاقة 12', 'مزود الطاقة 12', 'Power Supply 12', 'Power Supply 12', 'Power Supply 12', '994366707', 'Power Supply 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 129.00, 171.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(864, 'مزود الطاقة 13', 'مزود الطاقة 13', 'مزود الطاقة 13', 'Power Supply 13', 'Power Supply 13', 'Power Supply 13', '6706053593', 'Power Supply 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 271.00, 213.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(865, 'مزود الطاقة 14', 'مزود الطاقة 14', 'مزود الطاقة 14', 'Power Supply 14', 'Power Supply 14', 'Power Supply 14', '5763003110', 'Power Supply 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 477.00, 323.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(866, 'مزود الطاقة 15', 'مزود الطاقة 15', 'مزود الطاقة 15', 'Power Supply 15', 'Power Supply 15', 'Power Supply 15', '2805248724', 'Power Supply 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 265.00, 271.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(867, 'مزود الطاقة 16', 'مزود الطاقة 16', 'مزود الطاقة 16', 'Power Supply 16', 'Power Supply 16', 'Power Supply 16', '871529536', 'Power Supply 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 394.00, 296.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(868, 'مزود الطاقة 17', 'مزود الطاقة 17', 'مزود الطاقة 17', 'Power Supply 17', 'Power Supply 17', 'Power Supply 17', '7881397355', 'Power Supply 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 329.00, 138.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(869, 'مزود الطاقة 18', 'مزود الطاقة 18', 'مزود الطاقة 18', 'Power Supply 18', 'Power Supply 18', 'Power Supply 18', '3480391082', 'Power Supply 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 135.00, 127.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(870, 'مزود الطاقة 19', 'مزود الطاقة 19', 'مزود الطاقة 19', 'Power Supply 19', 'Power Supply 19', 'Power Supply 19', '8823919761', 'Power Supply 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 360.00, 354.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(871, 'مزود الطاقة 20', 'مزود الطاقة 20', 'مزود الطاقة 20', 'Power Supply 20', 'Power Supply 20', 'Power Supply 20', '5017568012', 'Power Supply 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 319.00, 263.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(872, 'مزود الطاقة 21', 'مزود الطاقة 21', 'مزود الطاقة 21', 'Power Supply 21', 'Power Supply 21', 'Power Supply 21', '1034422169', 'Power Supply 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 405.00, 359.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(873, 'مزود الطاقة 22', 'مزود الطاقة 22', 'مزود الطاقة 22', 'Power Supply 22', 'Power Supply 22', 'Power Supply 22', '3610593301', 'Power Supply 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 206.00, 285.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(874, 'مزود الطاقة 23', 'مزود الطاقة 23', 'مزود الطاقة 23', 'Power Supply 23', 'Power Supply 23', 'Power Supply 23', '5848600467', 'Power Supply 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 391.00, 205.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(875, 'مزود الطاقة 24', 'مزود الطاقة 24', 'مزود الطاقة 24', 'Power Supply 24', 'Power Supply 24', 'Power Supply 24', '6750713436', 'Power Supply 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 154.00, 396.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(876, 'مزود الطاقة 25', 'مزود الطاقة 25', 'مزود الطاقة 25', 'Power Supply 25', 'Power Supply 25', 'Power Supply 25', '3087854500', 'Power Supply 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 454.00, 122.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(877, 'مزود الطاقة 26', 'مزود الطاقة 26', 'مزود الطاقة 26', 'Power Supply 26', 'Power Supply 26', 'Power Supply 26', '5841501013', 'Power Supply 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 102.00, 356.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(878, 'مزود الطاقة 27', 'مزود الطاقة 27', 'مزود الطاقة 27', 'Power Supply 27', 'Power Supply 27', 'Power Supply 27', '6816778917', 'Power Supply 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 430.00, 194.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(879, 'مزود الطاقة 28', 'مزود الطاقة 28', 'مزود الطاقة 28', 'Power Supply 28', 'Power Supply 28', 'Power Supply 28', '8315457897', 'Power Supply 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 488.00, 264.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(880, 'مزود الطاقة 29', 'مزود الطاقة 29', 'مزود الطاقة 29', 'Power Supply 29', 'Power Supply 29', 'Power Supply 29', '6878537656', 'Power Supply 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 263.00, 380.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(881, 'مزود الطاقة 30', 'مزود الطاقة 30', 'مزود الطاقة 30', 'Power Supply 30', 'Power Supply 30', 'Power Supply 30', '2765279795', 'Power Supply 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 313.00, 345.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(882, 'مزود الطاقة 31', 'مزود الطاقة 31', 'مزود الطاقة 31', 'Power Supply 31', 'Power Supply 31', 'Power Supply 31', '7519771310', 'Power Supply 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 275.00, 368.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(883, 'مزود الطاقة 32', 'مزود الطاقة 32', 'مزود الطاقة 32', 'Power Supply 32', 'Power Supply 32', 'Power Supply 32', '5271309773', 'Power Supply 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 194.00, 331.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(884, 'مزود الطاقة 33', 'مزود الطاقة 33', 'مزود الطاقة 33', 'Power Supply 33', 'Power Supply 33', 'Power Supply 33', '487775743', 'Power Supply 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 175.00, 149.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(885, 'مزود الطاقة 34', 'مزود الطاقة 34', 'مزود الطاقة 34', 'Power Supply 34', 'Power Supply 34', 'Power Supply 34', '5121312156', 'Power Supply 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 484.00, 170.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(886, 'مزود الطاقة 35', 'مزود الطاقة 35', 'مزود الطاقة 35', 'Power Supply 35', 'Power Supply 35', 'Power Supply 35', '7504164993', 'Power Supply 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 397.00, 112.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(887, 'مزود الطاقة 36', 'مزود الطاقة 36', 'مزود الطاقة 36', 'Power Supply 36', 'Power Supply 36', 'Power Supply 36', '5003574183', 'Power Supply 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 389.00, 362.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(888, 'مزود الطاقة 37', 'مزود الطاقة 37', 'مزود الطاقة 37', 'Power Supply 37', 'Power Supply 37', 'Power Supply 37', '7449763183', 'Power Supply 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 468.00, 242.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(889, 'مزود الطاقة 38', 'مزود الطاقة 38', 'مزود الطاقة 38', 'Power Supply 38', 'Power Supply 38', 'Power Supply 38', '6451755902', 'Power Supply 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 423.00, 367.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(890, 'مزود الطاقة 39', 'مزود الطاقة 39', 'مزود الطاقة 39', 'Power Supply 39', 'Power Supply 39', 'Power Supply 39', '393470870', 'Power Supply 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 150.00, 308.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(891, 'مزود الطاقة 40', 'مزود الطاقة 40', 'مزود الطاقة 40', 'Power Supply 40', 'Power Supply 40', 'Power Supply 40', '8347438460', 'Power Supply 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 401.00, 279.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(892, 'مزود الطاقة 41', 'مزود الطاقة 41', 'مزود الطاقة 41', 'Power Supply 41', 'Power Supply 41', 'Power Supply 41', '347286892', 'Power Supply 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 477.00, 88.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(893, 'مزود الطاقة 42', 'مزود الطاقة 42', 'مزود الطاقة 42', 'Power Supply 42', 'Power Supply 42', 'Power Supply 42', '3865421339', 'Power Supply 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 321.00, 242.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(894, 'مزود الطاقة 43', 'مزود الطاقة 43', 'مزود الطاقة 43', 'Power Supply 43', 'Power Supply 43', 'Power Supply 43', '3969084517', 'Power Supply 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 186.00, 380.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(895, 'مزود الطاقة 44', 'مزود الطاقة 44', 'مزود الطاقة 44', 'Power Supply 44', 'Power Supply 44', 'Power Supply 44', '2393861818', 'Power Supply 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 320.00, 221.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(896, 'مزود الطاقة 45', 'مزود الطاقة 45', 'مزود الطاقة 45', 'Power Supply 45', 'Power Supply 45', 'Power Supply 45', '9656727460', 'Power Supply 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 499.00, 100.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(897, 'مزود الطاقة 46', 'مزود الطاقة 46', 'مزود الطاقة 46', 'Power Supply 46', 'Power Supply 46', 'Power Supply 46', '7597089975', 'Power Supply 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 275.00, 376.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(898, 'مزود الطاقة 47', 'مزود الطاقة 47', 'مزود الطاقة 47', 'Power Supply 47', 'Power Supply 47', 'Power Supply 47', '4076693916', 'Power Supply 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 204.00, 241.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(899, 'مزود الطاقة 48', 'مزود الطاقة 48', 'مزود الطاقة 48', 'Power Supply 48', 'Power Supply 48', 'Power Supply 48', '2203620939', 'Power Supply 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 462.00, 184.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(900, 'مزود الطاقة 49', 'مزود الطاقة 49', 'مزود الطاقة 49', 'Power Supply 49', 'Power Supply 49', 'Power Supply 49', '5687697027', 'Power Supply 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 495.00, 77.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(902, 'الكيسات 1', 'الكيسات 1', 'الكيسات 1', 'Cases 1', 'Cases 1', 'Cases 1', '4989393798', 'Cases 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 456.00, 240.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(904, 'الكيسات 3', 'الكيسات 3', 'الكيسات 3', 'Cases 3', 'Cases 3', 'Cases 3', '2563984752', 'Cases 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 410.00, 202.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(905, 'الكيسات 4', 'الكيسات 4', 'الكيسات 4', 'Cases 4', 'Cases 4', 'Cases 4', '389141750', 'Cases 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 251.00, 81.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(906, 'الكيسات 5', 'الكيسات 5', 'الكيسات 5', 'Cases 5', 'Cases 5', 'Cases 5', '4968461971', 'Cases 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 337.00, 215.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(907, 'الكيسات 6', 'الكيسات 6', 'الكيسات 6', 'Cases 6', 'Cases 6', 'Cases 6', '1641300807', 'Cases 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 319.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(908, 'الكيسات 7', 'الكيسات 7', 'الكيسات 7', 'Cases 7', 'Cases 7', 'Cases 7', '6605284148', 'Cases 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 444.00, 279.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(909, 'الكيسات 8', 'الكيسات 8', 'الكيسات 8', 'Cases 8', 'Cases 8', 'Cases 8', '9651310477', 'Cases 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 229.00, 114.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(910, 'الكيسات 9', 'الكيسات 9', 'الكيسات 9', 'Cases 9', 'Cases 9', 'Cases 9', '9849624797', 'Cases 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 334.00, 154.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(911, 'الكيسات 10', 'الكيسات 10', 'الكيسات 10', 'Cases 10', 'Cases 10', 'Cases 10', '1488101120', 'Cases 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 301.00, 242.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(912, 'الكيسات 11', 'الكيسات 11', 'الكيسات 11', 'Cases 11', 'Cases 11', 'Cases 11', '9262407669', 'Cases 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 261.00, 107.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(913, 'الكيسات 12', 'الكيسات 12', 'الكيسات 12', 'Cases 12', 'Cases 12', 'Cases 12', '2411999273', 'Cases 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 489.00, 151.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(914, 'الكيسات 13', 'الكيسات 13', 'الكيسات 13', 'Cases 13', 'Cases 13', 'Cases 13', '471265101', 'Cases 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 106.00, 362.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(915, 'الكيسات 14', 'الكيسات 14', 'الكيسات 14', 'Cases 14', 'Cases 14', 'Cases 14', '2250653829', 'Cases 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 463.00, 179.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(916, 'الكيسات 15', 'الكيسات 15', 'الكيسات 15', 'Cases 15', 'Cases 15', 'Cases 15', '2319707217', 'Cases 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 384.00, 349.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(917, 'الكيسات 16', 'الكيسات 16', 'الكيسات 16', 'Cases 16', 'Cases 16', 'Cases 16', '9036229810', 'Cases 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 160.00, 275.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(918, 'الكيسات 17', 'الكيسات 17', 'الكيسات 17', 'Cases 17', 'Cases 17', 'Cases 17', '8641724323', 'Cases 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 185.00, 73.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(919, 'الكيسات 18', 'الكيسات 18', 'الكيسات 18', 'Cases 18', 'Cases 18', 'Cases 18', '6074272587', 'Cases 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 491.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(920, 'الكيسات 19', 'الكيسات 19', 'الكيسات 19', 'Cases 19', 'Cases 19', 'Cases 19', '1021926370', 'Cases 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 147.00, 116.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(922, 'الكيسات 21', 'الكيسات 21', 'الكيسات 21', 'Cases 21', 'Cases 21', 'Cases 21', '538522705', 'Cases 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 489.00, 186.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(923, 'الكيسات 22', 'الكيسات 22', 'الكيسات 22', 'Cases 22', 'Cases 22', 'Cases 22', '8925910895', 'Cases 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 217.00, 200.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(924, 'الكيسات 23', 'الكيسات 23', 'الكيسات 23', 'Cases 23', 'Cases 23', 'Cases 23', '3593933434', 'Cases 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 116.00, 239.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(925, 'الكيسات 24', 'الكيسات 24', 'الكيسات 24', 'Cases 24', 'Cases 24', 'Cases 24', '4652985913', 'Cases 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 481.00, 215.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(926, 'الكيسات 25', 'الكيسات 25', 'الكيسات 25', 'Cases 25', 'Cases 25', 'Cases 25', '6861499611', 'Cases 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 481.00, 178.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(927, 'الكيسات 26', 'الكيسات 26', 'الكيسات 26', 'Cases 26', 'Cases 26', 'Cases 26', '1735502848', 'Cases 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 127.00, 217.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(928, 'الكيسات 27', 'الكيسات 27', 'الكيسات 27', 'Cases 27', 'Cases 27', 'Cases 27', '3972477775', 'Cases 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 213.00, 73.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(929, 'الكيسات 28', 'الكيسات 28', 'الكيسات 28', 'Cases 28', 'Cases 28', 'Cases 28', '8955314324', 'Cases 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 495.00, 230.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(930, 'الكيسات 29', 'الكيسات 29', 'الكيسات 29', 'Cases 29', 'Cases 29', 'Cases 29', '4748199806', 'Cases 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 238.00, 137.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(931, 'الكيسات 30', 'الكيسات 30', 'الكيسات 30', 'Cases 30', 'Cases 30', 'Cases 30', '2176042011', 'Cases 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 162.00, 158.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(932, 'الكيسات 31', 'الكيسات 31', 'الكيسات 31', 'Cases 31', 'Cases 31', 'Cases 31', '4599882001', 'Cases 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 280.00, 88.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(933, 'الكيسات 32', 'الكيسات 32', 'الكيسات 32', 'Cases 32', 'Cases 32', 'Cases 32', '3061528286', 'Cases 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 431.00, 52.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(934, 'الكيسات 33', 'الكيسات 33', 'الكيسات 33', 'Cases 33', 'Cases 33', 'Cases 33', '1135346745', 'Cases 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 340.00, 149.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(935, 'الكيسات 34', 'الكيسات 34', 'الكيسات 34', 'Cases 34', 'Cases 34', 'Cases 34', '1809376499', 'Cases 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 244.00, 371.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(936, 'الكيسات 35', 'الكيسات 35', 'الكيسات 35', 'Cases 35', 'Cases 35', 'Cases 35', '7520875124', 'Cases 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 239.00, 192.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(937, 'الكيسات 36', 'الكيسات 36', 'الكيسات 36', 'Cases 36', 'Cases 36', 'Cases 36', '9093363562', 'Cases 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 346.00, 90.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(938, 'الكيسات 37', 'الكيسات 37', 'الكيسات 37', 'Cases 37', 'Cases 37', 'Cases 37', '2763063140', 'Cases 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 107.00, 202.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(939, 'الكيسات 38', 'الكيسات 38', 'الكيسات 38', 'Cases 38', 'Cases 38', 'Cases 38', '9783315862', 'Cases 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 138.00, 318.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(940, 'الكيسات 39', 'الكيسات 39', 'الكيسات 39', 'Cases 39', 'Cases 39', 'Cases 39', '3565225919', 'Cases 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 378.00, 96.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(941, 'الكيسات 40', 'الكيسات 40', 'الكيسات 40', 'Cases 40', 'Cases 40', 'Cases 40', '9023870792', 'Cases 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 105.00, 89.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(942, 'الكيسات 41', 'الكيسات 41', 'الكيسات 41', 'Cases 41', 'Cases 41', 'Cases 41', '9819086399', 'Cases 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 165.00, 81.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(943, 'الكيسات 42', 'الكيسات 42', 'الكيسات 42', 'Cases 42', 'Cases 42', 'Cases 42', '5755848665', 'Cases 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 249.00, 78.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(944, 'الكيسات 43', 'الكيسات 43', 'الكيسات 43', 'Cases 43', 'Cases 43', 'Cases 43', '658448288', 'Cases 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 218.00, 249.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(945, 'الكيسات 44', 'الكيسات 44', 'الكيسات 44', 'Cases 44', 'Cases 44', 'Cases 44', '9755703286', 'Cases 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 215.00, 89.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(946, 'الكيسات 45', 'الكيسات 45', 'الكيسات 45', 'Cases 45', 'Cases 45', 'Cases 45', '9653041596', 'Cases 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 339.00, 134.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(947, 'الكيسات 46', 'الكيسات 46', 'الكيسات 46', 'Cases 46', 'Cases 46', 'Cases 46', '4285115684', 'Cases 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 457.00, 265.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(948, 'الكيسات 47', 'الكيسات 47', 'الكيسات 47', 'Cases 47', 'Cases 47', 'Cases 47', '3560542374', 'Cases 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 348.00, 162.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(949, 'الكيسات 48', 'الكيسات 48', 'الكيسات 48', 'Cases 48', 'Cases 48', 'Cases 48', '4399425501', 'Cases 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 276.00, 328.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(950, 'الكيسات 49', 'الكيسات 49', 'الكيسات 49', 'Cases 49', 'Cases 49', 'Cases 49', '2052616887', 'Cases 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 199.00, 325.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(951, 'اكسسوارات الكمبيوتر 0', 'اكسسوارات الكمبيوتر 0', 'اكسسوارات الكمبيوتر 0', 'Gaming Accessories 0', 'Gaming Accessories 0', 'Gaming Accessories 0', '5672167112', 'Gaming Accessories 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 435.00, 139.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(952, 'اكسسوارات الكمبيوتر 1', 'اكسسوارات الكمبيوتر 1', 'اكسسوارات الكمبيوتر 1', 'Gaming Accessories 1', 'Gaming Accessories 1', 'Gaming Accessories 1', '805485046', 'Gaming Accessories 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 275.00, 258.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(953, 'اكسسوارات الكمبيوتر 2', 'اكسسوارات الكمبيوتر 2', 'اكسسوارات الكمبيوتر 2', 'Gaming Accessories 2', 'Gaming Accessories 2', 'Gaming Accessories 2', '7181494171', 'Gaming Accessories 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 430.00, 337.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(954, 'اكسسوارات الكمبيوتر 3', 'اكسسوارات الكمبيوتر 3', 'اكسسوارات الكمبيوتر 3', 'Gaming Accessories 3', 'Gaming Accessories 3', 'Gaming Accessories 3', '439443471', 'Gaming Accessories 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 196.00, 90.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(955, 'اكسسوارات الكمبيوتر 4', 'اكسسوارات الكمبيوتر 4', 'اكسسوارات الكمبيوتر 4', 'Gaming Accessories 4', 'Gaming Accessories 4', 'Gaming Accessories 4', '7471924032', 'Gaming Accessories 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 270.00, 137.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(956, 'اكسسوارات الكمبيوتر 5', 'اكسسوارات الكمبيوتر 5', 'اكسسوارات الكمبيوتر 5', 'Gaming Accessories 5', 'Gaming Accessories 5', 'Gaming Accessories 5', '202429665', 'Gaming Accessories 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 407.00, 129.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(957, 'اكسسوارات الكمبيوتر 6', 'اكسسوارات الكمبيوتر 6', 'اكسسوارات الكمبيوتر 6', 'Gaming Accessories 6', 'Gaming Accessories 6', 'Gaming Accessories 6', '3959465810', 'Gaming Accessories 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 389.00, 164.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(958, 'اكسسوارات الكمبيوتر 7', 'اكسسوارات الكمبيوتر 7', 'اكسسوارات الكمبيوتر 7', 'Gaming Accessories 7', 'Gaming Accessories 7', 'Gaming Accessories 7', '8034647137', 'Gaming Accessories 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 108.00, 119.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(959, 'اكسسوارات الكمبيوتر 8', 'اكسسوارات الكمبيوتر 8', 'اكسسوارات الكمبيوتر 8', 'Gaming Accessories 8', 'Gaming Accessories 8', 'Gaming Accessories 8', '9344585676', 'Gaming Accessories 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 412.00, 330.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(960, 'اكسسوارات الكمبيوتر 9', 'اكسسوارات الكمبيوتر 9', 'اكسسوارات الكمبيوتر 9', 'Gaming Accessories 9', 'Gaming Accessories 9', 'Gaming Accessories 9', '2849871791', 'Gaming Accessories 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 248.00, 167.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(961, 'اكسسوارات الكمبيوتر 10', 'اكسسوارات الكمبيوتر 10', 'اكسسوارات الكمبيوتر 10', 'Gaming Accessories 10', 'Gaming Accessories 10', 'Gaming Accessories 10', '7525462540', 'Gaming Accessories 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 399.00, 70.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(962, 'اكسسوارات الكمبيوتر 11', 'اكسسوارات الكمبيوتر 11', 'اكسسوارات الكمبيوتر 11', 'Gaming Accessories 11', 'Gaming Accessories 11', 'Gaming Accessories 11', '3611726873', 'Gaming Accessories 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 174.00, 128.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(963, 'اكسسوارات الكمبيوتر 12', 'اكسسوارات الكمبيوتر 12', 'اكسسوارات الكمبيوتر 12', 'Gaming Accessories 12', 'Gaming Accessories 12', 'Gaming Accessories 12', '3648623019', 'Gaming Accessories 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 397.00, 203.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(964, 'اكسسوارات الكمبيوتر 13', 'اكسسوارات الكمبيوتر 13', 'اكسسوارات الكمبيوتر 13', 'Gaming Accessories 13', 'Gaming Accessories 13', 'Gaming Accessories 13', '7980345549', 'Gaming Accessories 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 180.00, 353.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(965, 'اكسسوارات الكمبيوتر 14', 'اكسسوارات الكمبيوتر 14', 'اكسسوارات الكمبيوتر 14', 'Gaming Accessories 14', 'Gaming Accessories 14', 'Gaming Accessories 14', '773432204', 'Gaming Accessories 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 162.00, 328.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(966, 'اكسسوارات الكمبيوتر 15', 'اكسسوارات الكمبيوتر 15', 'اكسسوارات الكمبيوتر 15', 'Gaming Accessories 15', 'Gaming Accessories 15', 'Gaming Accessories 15', '997382321', 'Gaming Accessories 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 269.00, 372.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(967, 'اكسسوارات الكمبيوتر 16', 'اكسسوارات الكمبيوتر 16', 'اكسسوارات الكمبيوتر 16', 'Gaming Accessories 16', 'Gaming Accessories 16', 'Gaming Accessories 16', '6036488589', 'Gaming Accessories 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 201.00, 182.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(968, 'اكسسوارات الكمبيوتر 17', 'اكسسوارات الكمبيوتر 17', 'اكسسوارات الكمبيوتر 17', 'Gaming Accessories 17', 'Gaming Accessories 17', 'Gaming Accessories 17', '6515761349', 'Gaming Accessories 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 495.00, 118.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(969, 'اكسسوارات الكمبيوتر 18', 'اكسسوارات الكمبيوتر 18', 'اكسسوارات الكمبيوتر 18', 'Gaming Accessories 18', 'Gaming Accessories 18', 'Gaming Accessories 18', '4496589493', 'Gaming Accessories 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 204.00, 271.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(970, 'اكسسوارات الكمبيوتر 19', 'اكسسوارات الكمبيوتر 19', 'اكسسوارات الكمبيوتر 19', 'Gaming Accessories 19', 'Gaming Accessories 19', 'Gaming Accessories 19', '42027906', 'Gaming Accessories 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 301.00, 248.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(971, 'اكسسوارات الكمبيوتر 20', 'اكسسوارات الكمبيوتر 20', 'اكسسوارات الكمبيوتر 20', 'Gaming Accessories 20', 'Gaming Accessories 20', 'Gaming Accessories 20', '1895436732', 'Gaming Accessories 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 149.00, 332.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(972, 'اكسسوارات الكمبيوتر 21', 'اكسسوارات الكمبيوتر 21', 'اكسسوارات الكمبيوتر 21', 'Gaming Accessories 21', 'Gaming Accessories 21', 'Gaming Accessories 21', '1294188146', 'Gaming Accessories 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 156.00, 179.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(973, 'اكسسوارات الكمبيوتر 22', 'اكسسوارات الكمبيوتر 22', 'اكسسوارات الكمبيوتر 22', 'Gaming Accessories 22', 'Gaming Accessories 22', 'Gaming Accessories 22', '6408295935', 'Gaming Accessories 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 209.00, 116.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(974, 'اكسسوارات الكمبيوتر 23', 'اكسسوارات الكمبيوتر 23', 'اكسسوارات الكمبيوتر 23', 'Gaming Accessories 23', 'Gaming Accessories 23', 'Gaming Accessories 23', '1495382454', 'Gaming Accessories 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 321.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(975, 'اكسسوارات الكمبيوتر 24', 'اكسسوارات الكمبيوتر 24', 'اكسسوارات الكمبيوتر 24', 'Gaming Accessories 24', 'Gaming Accessories 24', 'Gaming Accessories 24', '6387948093', 'Gaming Accessories 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 199.00, 122.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(976, 'اكسسوارات الكمبيوتر 25', 'اكسسوارات الكمبيوتر 25', 'اكسسوارات الكمبيوتر 25', 'Gaming Accessories 25', 'Gaming Accessories 25', 'Gaming Accessories 25', '1833301190', 'Gaming Accessories 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 421.00, 197.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(977, 'اكسسوارات الكمبيوتر 26', 'اكسسوارات الكمبيوتر 26', 'اكسسوارات الكمبيوتر 26', 'Gaming Accessories 26', 'Gaming Accessories 26', 'Gaming Accessories 26', '8542556283', 'Gaming Accessories 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 294.00, 338.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(978, 'اكسسوارات الكمبيوتر 27', 'اكسسوارات الكمبيوتر 27', 'اكسسوارات الكمبيوتر 27', 'Gaming Accessories 27', 'Gaming Accessories 27', 'Gaming Accessories 27', '4587098325', 'Gaming Accessories 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 165.00, 246.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(979, 'اكسسوارات الكمبيوتر 28', 'اكسسوارات الكمبيوتر 28', 'اكسسوارات الكمبيوتر 28', 'Gaming Accessories 28', 'Gaming Accessories 28', 'Gaming Accessories 28', '9849237575', 'Gaming Accessories 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 254.00, 140.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(980, 'اكسسوارات الكمبيوتر 29', 'اكسسوارات الكمبيوتر 29', 'اكسسوارات الكمبيوتر 29', 'Gaming Accessories 29', 'Gaming Accessories 29', 'Gaming Accessories 29', '4134462668', 'Gaming Accessories 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 336.00, 300.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(981, 'اكسسوارات الكمبيوتر 30', 'اكسسوارات الكمبيوتر 30', 'اكسسوارات الكمبيوتر 30', 'Gaming Accessories 30', 'Gaming Accessories 30', 'Gaming Accessories 30', '4220698770', 'Gaming Accessories 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 232.00, 376.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(982, 'اكسسوارات الكمبيوتر 31', 'اكسسوارات الكمبيوتر 31', 'اكسسوارات الكمبيوتر 31', 'Gaming Accessories 31', 'Gaming Accessories 31', 'Gaming Accessories 31', '119168005', 'Gaming Accessories 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 231.00, 270.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(983, 'اكسسوارات الكمبيوتر 32', 'اكسسوارات الكمبيوتر 32', 'اكسسوارات الكمبيوتر 32', 'Gaming Accessories 32', 'Gaming Accessories 32', 'Gaming Accessories 32', '3133709116', 'Gaming Accessories 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 158.00, 199.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(984, 'اكسسوارات الكمبيوتر 33', 'اكسسوارات الكمبيوتر 33', 'اكسسوارات الكمبيوتر 33', 'Gaming Accessories 33', 'Gaming Accessories 33', 'Gaming Accessories 33', '9371313746', 'Gaming Accessories 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 390.00, 139.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(985, 'اكسسوارات الكمبيوتر 34', 'اكسسوارات الكمبيوتر 34', 'اكسسوارات الكمبيوتر 34', 'Gaming Accessories 34', 'Gaming Accessories 34', 'Gaming Accessories 34', '2991783998', 'Gaming Accessories 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 437.00, 140.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(986, 'اكسسوارات الكمبيوتر 35', 'اكسسوارات الكمبيوتر 35', 'اكسسوارات الكمبيوتر 35', 'Gaming Accessories 35', 'Gaming Accessories 35', 'Gaming Accessories 35', '7374575699', 'Gaming Accessories 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 279.00, 255.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(987, 'اكسسوارات الكمبيوتر 36', 'اكسسوارات الكمبيوتر 36', 'اكسسوارات الكمبيوتر 36', 'Gaming Accessories 36', 'Gaming Accessories 36', 'Gaming Accessories 36', '7251163519', 'Gaming Accessories 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 122.00, 76.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(988, 'اكسسوارات الكمبيوتر 37', 'اكسسوارات الكمبيوتر 37', 'اكسسوارات الكمبيوتر 37', 'Gaming Accessories 37', 'Gaming Accessories 37', 'Gaming Accessories 37', '1540689733', 'Gaming Accessories 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 463.00, 92.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(989, 'اكسسوارات الكمبيوتر 38', 'اكسسوارات الكمبيوتر 38', 'اكسسوارات الكمبيوتر 38', 'Gaming Accessories 38', 'Gaming Accessories 38', 'Gaming Accessories 38', '1525899222', 'Gaming Accessories 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 119.00, 219.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(990, 'اكسسوارات الكمبيوتر 39', 'اكسسوارات الكمبيوتر 39', 'اكسسوارات الكمبيوتر 39', 'Gaming Accessories 39', 'Gaming Accessories 39', 'Gaming Accessories 39', '5830174730', 'Gaming Accessories 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 100.00, 83.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(991, 'اكسسوارات الكمبيوتر 40', 'اكسسوارات الكمبيوتر 40', 'اكسسوارات الكمبيوتر 40', 'Gaming Accessories 40', 'Gaming Accessories 40', 'Gaming Accessories 40', '8977627140', 'Gaming Accessories 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 235.00, 120.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(992, 'اكسسوارات الكمبيوتر 41', 'اكسسوارات الكمبيوتر 41', 'اكسسوارات الكمبيوتر 41', 'Gaming Accessories 41', 'Gaming Accessories 41', 'Gaming Accessories 41', '6993606924', 'Gaming Accessories 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 232.00, 90.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(993, 'اكسسوارات الكمبيوتر 42', 'اكسسوارات الكمبيوتر 42', 'اكسسوارات الكمبيوتر 42', 'Gaming Accessories 42', 'Gaming Accessories 42', 'Gaming Accessories 42', '1472169180', 'Gaming Accessories 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 123.00, 165.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(994, 'اكسسوارات الكمبيوتر 43', 'اكسسوارات الكمبيوتر 43', 'اكسسوارات الكمبيوتر 43', 'Gaming Accessories 43', 'Gaming Accessories 43', 'Gaming Accessories 43', '5929754812', 'Gaming Accessories 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 360.00, 228.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(995, 'اكسسوارات الكمبيوتر 44', 'اكسسوارات الكمبيوتر 44', 'اكسسوارات الكمبيوتر 44', 'Gaming Accessories 44', 'Gaming Accessories 44', 'Gaming Accessories 44', '8593020493', 'Gaming Accessories 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 412.00, 220.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(996, 'اكسسوارات الكمبيوتر 45', 'اكسسوارات الكمبيوتر 45', 'اكسسوارات الكمبيوتر 45', 'Gaming Accessories 45', 'Gaming Accessories 45', 'Gaming Accessories 45', '7570844545', 'Gaming Accessories 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 164.00, 200.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(997, 'اكسسوارات الكمبيوتر 46', 'اكسسوارات الكمبيوتر 46', 'اكسسوارات الكمبيوتر 46', 'Gaming Accessories 46', 'Gaming Accessories 46', 'Gaming Accessories 46', '8665445279', 'Gaming Accessories 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 142.00, 167.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(998, 'اكسسوارات الكمبيوتر 47', 'اكسسوارات الكمبيوتر 47', 'اكسسوارات الكمبيوتر 47', 'Gaming Accessories 47', 'Gaming Accessories 47', 'Gaming Accessories 47', '3361046572', 'Gaming Accessories 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 460.00, 74.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(999, 'اكسسوارات الكمبيوتر 48', 'اكسسوارات الكمبيوتر 48', 'اكسسوارات الكمبيوتر 48', 'Gaming Accessories 48', 'Gaming Accessories 48', 'Gaming Accessories 48', '3329449610', 'Gaming Accessories 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 317.00, 292.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1000, 'اكسسوارات الكمبيوتر 49', 'اكسسوارات الكمبيوتر 49', 'اكسسوارات الكمبيوتر 49', 'Gaming Accessories 49', 'Gaming Accessories 49', 'Gaming Accessories 49', '5185567795', 'Gaming Accessories 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 187.00, 351.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1001, 'كراسي القمينق 0', 'كراسي القمينق 0', 'كراسي القمينق 0', 'Gaming Chair 0', 'Gaming Chair 0', 'Gaming Chair 0', '5658578854', 'Gaming Chair 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 204.00, 382.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1002, 'كراسي القمينق 1', 'كراسي القمينق 1', 'كراسي القمينق 1', 'Gaming Chair 1', 'Gaming Chair 1', 'Gaming Chair 1', '4297417936', 'Gaming Chair 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 361.00, 115.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1003, 'كراسي القمينق 2', 'كراسي القمينق 2', 'كراسي القمينق 2', 'Gaming Chair 2', 'Gaming Chair 2', 'Gaming Chair 2', '8896960451', 'Gaming Chair 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 262.00, 83.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1004, 'كراسي القمينق 3', 'كراسي القمينق 3', 'كراسي القمينق 3', 'Gaming Chair 3', 'Gaming Chair 3', 'Gaming Chair 3', '3755145040', 'Gaming Chair 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 451.00, 159.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1005, 'كراسي القمينق 4', 'كراسي القمينق 4', 'كراسي القمينق 4', 'Gaming Chair 4', 'Gaming Chair 4', 'Gaming Chair 4', '6443674158', 'Gaming Chair 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 197.00, 55.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1006, 'كراسي القمينق 5', 'كراسي القمينق 5', 'كراسي القمينق 5', 'Gaming Chair 5', 'Gaming Chair 5', 'Gaming Chair 5', '2744954806', 'Gaming Chair 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 497.00, 171.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1007, 'كراسي القمينق 6', 'كراسي القمينق 6', 'كراسي القمينق 6', 'Gaming Chair 6', 'Gaming Chair 6', 'Gaming Chair 6', '2838117244', 'Gaming Chair 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 306.00, 315.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1008, 'كراسي القمينق 7', 'كراسي القمينق 7', 'كراسي القمينق 7', 'Gaming Chair 7', 'Gaming Chair 7', 'Gaming Chair 7', '9377357697', 'Gaming Chair 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 397.00, 96.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1009, 'كراسي القمينق 8', 'كراسي القمينق 8', 'كراسي القمينق 8', 'Gaming Chair 8', 'Gaming Chair 8', 'Gaming Chair 8', '1948154612', 'Gaming Chair 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 232.00, 375.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1010, 'كراسي القمينق 9', 'كراسي القمينق 9', 'كراسي القمينق 9', 'Gaming Chair 9', 'Gaming Chair 9', 'Gaming Chair 9', '954805122', 'Gaming Chair 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 383.00, 104.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1011, 'كراسي القمينق 10', 'كراسي القمينق 10', 'كراسي القمينق 10', 'Gaming Chair 10', 'Gaming Chair 10', 'Gaming Chair 10', '3598011449', 'Gaming Chair 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 226.00, 159.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1012, 'كراسي القمينق 11', 'كراسي القمينق 11', 'كراسي القمينق 11', 'Gaming Chair 11', 'Gaming Chair 11', 'Gaming Chair 11', '6124100894', 'Gaming Chair 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 406.00, 167.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1013, 'كراسي القمينق 12', 'كراسي القمينق 12', 'كراسي القمينق 12', 'Gaming Chair 12', 'Gaming Chair 12', 'Gaming Chair 12', '532146309', 'Gaming Chair 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 374.00, 168.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1014, 'كراسي القمينق 13', 'كراسي القمينق 13', 'كراسي القمينق 13', 'Gaming Chair 13', 'Gaming Chair 13', 'Gaming Chair 13', '9527997376', 'Gaming Chair 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 242.00, 348.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1015, 'كراسي القمينق 14', 'كراسي القمينق 14', 'كراسي القمينق 14', 'Gaming Chair 14', 'Gaming Chair 14', 'Gaming Chair 14', '3142438661', 'Gaming Chair 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 172.00, 299.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1016, 'كراسي القمينق 15', 'كراسي القمينق 15', 'كراسي القمينق 15', 'Gaming Chair 15', 'Gaming Chair 15', 'Gaming Chair 15', '3089442156', 'Gaming Chair 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 173.00, 56.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1017, 'كراسي القمينق 16', 'كراسي القمينق 16', 'كراسي القمينق 16', 'Gaming Chair 16', 'Gaming Chair 16', 'Gaming Chair 16', '881704072', 'Gaming Chair 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 389.00, 274.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1018, 'كراسي القمينق 17', 'كراسي القمينق 17', 'كراسي القمينق 17', 'Gaming Chair 17', 'Gaming Chair 17', 'Gaming Chair 17', '2117955175', 'Gaming Chair 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 417.00, 180.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1019, 'كراسي القمينق 18', 'كراسي القمينق 18', 'كراسي القمينق 18', 'Gaming Chair 18', 'Gaming Chair 18', 'Gaming Chair 18', '7866093394', 'Gaming Chair 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 142.00, 100.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1020, 'كراسي القمينق 19', 'كراسي القمينق 19', 'كراسي القمينق 19', 'Gaming Chair 19', 'Gaming Chair 19', 'Gaming Chair 19', '7282350294', 'Gaming Chair 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 378.00, 187.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1021, 'كراسي القمينق 20', 'كراسي القمينق 20', 'كراسي القمينق 20', 'Gaming Chair 20', 'Gaming Chair 20', 'Gaming Chair 20', '2876545867', 'Gaming Chair 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 112.00, 377.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1022, 'كراسي القمينق 21', 'كراسي القمينق 21', 'كراسي القمينق 21', 'Gaming Chair 21', 'Gaming Chair 21', 'Gaming Chair 21', '6821538015', 'Gaming Chair 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 178.00, 199.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1023, 'كراسي القمينق 22', 'كراسي القمينق 22', 'كراسي القمينق 22', 'Gaming Chair 22', 'Gaming Chair 22', 'Gaming Chair 22', '599324079', 'Gaming Chair 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 155.00, 218.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1024, 'كراسي القمينق 23', 'كراسي القمينق 23', 'كراسي القمينق 23', 'Gaming Chair 23', 'Gaming Chair 23', 'Gaming Chair 23', '9630958731', 'Gaming Chair 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 134.00, 317.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1025, 'كراسي القمينق 24', 'كراسي القمينق 24', 'كراسي القمينق 24', 'Gaming Chair 24', 'Gaming Chair 24', 'Gaming Chair 24', '4423020733', 'Gaming Chair 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 139.00, 287.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1026, 'كراسي القمينق 25', 'كراسي القمينق 25', 'كراسي القمينق 25', 'Gaming Chair 25', 'Gaming Chair 25', 'Gaming Chair 25', '457798628', 'Gaming Chair 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 138.00, 111.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1027, 'كراسي القمينق 26', 'كراسي القمينق 26', 'كراسي القمينق 26', 'Gaming Chair 26', 'Gaming Chair 26', 'Gaming Chair 26', '9806632619', 'Gaming Chair 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 223.00, 235.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1028, 'كراسي القمينق 27', 'كراسي القمينق 27', 'كراسي القمينق 27', 'Gaming Chair 27', 'Gaming Chair 27', 'Gaming Chair 27', '112440921', 'Gaming Chair 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 102.00, 390.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1029, 'كراسي القمينق 28', 'كراسي القمينق 28', 'كراسي القمينق 28', 'Gaming Chair 28', 'Gaming Chair 28', 'Gaming Chair 28', '5124368454', 'Gaming Chair 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 331.00, 113.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1030, 'كراسي القمينق 29', 'كراسي القمينق 29', 'كراسي القمينق 29', 'Gaming Chair 29', 'Gaming Chair 29', 'Gaming Chair 29', '9090410530', 'Gaming Chair 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 195.00, 370.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1031, 'كراسي القمينق 30', 'كراسي القمينق 30', 'كراسي القمينق 30', 'Gaming Chair 30', 'Gaming Chair 30', 'Gaming Chair 30', '3383892859', 'Gaming Chair 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 475.00, 159.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1032, 'كراسي القمينق 31', 'كراسي القمينق 31', 'كراسي القمينق 31', 'Gaming Chair 31', 'Gaming Chair 31', 'Gaming Chair 31', '5000948333', 'Gaming Chair 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 138.00, 185.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1033, 'كراسي القمينق 32', 'كراسي القمينق 32', 'كراسي القمينق 32', 'Gaming Chair 32', 'Gaming Chair 32', 'Gaming Chair 32', '1244202340', 'Gaming Chair 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 275.00, 71.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1034, 'كراسي القمينق 33', 'كراسي القمينق 33', 'كراسي القمينق 33', 'Gaming Chair 33', 'Gaming Chair 33', 'Gaming Chair 33', '440268434', 'Gaming Chair 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 276.00, 390.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1035, 'كراسي القمينق 34', 'كراسي القمينق 34', 'كراسي القمينق 34', 'Gaming Chair 34', 'Gaming Chair 34', 'Gaming Chair 34', '4561733385', 'Gaming Chair 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 323.00, 342.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 0, NULL, 0),
(1036, 'كراسي القمينق 35', 'كراسي القمينق 35', 'كراسي القمينق 35', 'Gaming Chair 35', 'Gaming Chair 35', 'Gaming Chair 35', '924668290', 'Gaming Chair 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 208.00, 359.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1037, 'كراسي القمينق 36', 'كراسي القمينق 36', 'كراسي القمينق 36', 'Gaming Chair 36', 'Gaming Chair 36', 'Gaming Chair 36', '4857436209', 'Gaming Chair 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 215.00, 121.00, NULL, '2022-04-04 10:32:03', '2022-04-04 10:32:03', 1, 0, 1, NULL, 0),
(1038, 'كراسي القمينق 37', 'كراسي القمينق 37', 'كراسي القمينق 37', 'Gaming Chair 37', 'Gaming Chair 37', 'Gaming Chair 37', '2267866794', 'Gaming Chair 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 158.00, 208.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1039, 'كراسي القمينق 38', 'كراسي القمينق 38', 'كراسي القمينق 38', 'Gaming Chair 38', 'Gaming Chair 38', 'Gaming Chair 38', '7315874929', 'Gaming Chair 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 431.00, 204.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1040, 'كراسي القمينق 39', 'كراسي القمينق 39', 'كراسي القمينق 39', 'Gaming Chair 39', 'Gaming Chair 39', 'Gaming Chair 39', '1031282115', 'Gaming Chair 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 194.00, 155.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1041, 'كراسي القمينق 40', 'كراسي القمينق 40', 'كراسي القمينق 40', 'Gaming Chair 40', 'Gaming Chair 40', 'Gaming Chair 40', '7745796007', 'Gaming Chair 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 194.00, 120.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1042, 'كراسي القمينق 41', 'كراسي القمينق 41', 'كراسي القمينق 41', 'Gaming Chair 41', 'Gaming Chair 41', 'Gaming Chair 41', '2666674460', 'Gaming Chair 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 296.00, 250.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1043, 'كراسي القمينق 42', 'كراسي القمينق 42', 'كراسي القمينق 42', 'Gaming Chair 42', 'Gaming Chair 42', 'Gaming Chair 42', '8827251222', 'Gaming Chair 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 387.00, 127.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1044, 'كراسي القمينق 43', 'كراسي القمينق 43', 'كراسي القمينق 43', 'Gaming Chair 43', 'Gaming Chair 43', 'Gaming Chair 43', '6938090394', 'Gaming Chair 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 253.00, 54.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1045, 'كراسي القمينق 44', 'كراسي القمينق 44', 'كراسي القمينق 44', 'Gaming Chair 44', 'Gaming Chair 44', 'Gaming Chair 44', '4799698852', 'Gaming Chair 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 373.00, 382.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1046, 'كراسي القمينق 45', 'كراسي القمينق 45', 'كراسي القمينق 45', 'Gaming Chair 45', 'Gaming Chair 45', 'Gaming Chair 45', '179588484', 'Gaming Chair 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 465.00, 65.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1047, 'كراسي القمينق 46', 'كراسي القمينق 46', 'كراسي القمينق 46', 'Gaming Chair 46', 'Gaming Chair 46', 'Gaming Chair 46', '8874293583', 'Gaming Chair 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 347.00, 311.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1048, 'كراسي القمينق 47', 'كراسي القمينق 47', 'كراسي القمينق 47', 'Gaming Chair 47', 'Gaming Chair 47', 'Gaming Chair 47', '3421773227', 'Gaming Chair 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 321.00, 66.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1049, 'كراسي القمينق 48', 'كراسي القمينق 48', 'كراسي القمينق 48', 'Gaming Chair 48', 'Gaming Chair 48', 'Gaming Chair 48', '5261250064', 'Gaming Chair 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 120.00, 253.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1050, 'كراسي القمينق 49', 'كراسي القمينق 49', 'كراسي القمينق 49', 'Gaming Chair 49', 'Gaming Chair 49', 'Gaming Chair 49', '2764895697', 'Gaming Chair 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 103.00, 92.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1051, 'طاولات الكمبيوتر 0', 'طاولات الكمبيوتر 0', 'طاولات الكمبيوتر 0', 'Gaming Table 0', 'Gaming Table 0', 'Gaming Table 0', '4798469983', 'Gaming Table 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 441.00, 106.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1052, 'طاولات الكمبيوتر 1', 'طاولات الكمبيوتر 1', 'طاولات الكمبيوتر 1', 'Gaming Table 1', 'Gaming Table 1', 'Gaming Table 1', '9586251372', 'Gaming Table 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 447.00, 396.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1053, 'طاولات الكمبيوتر 2', 'طاولات الكمبيوتر 2', 'طاولات الكمبيوتر 2', 'Gaming Table 2', 'Gaming Table 2', 'Gaming Table 2', '834316101', 'Gaming Table 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 476.00, 201.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1054, 'طاولات الكمبيوتر 3', 'طاولات الكمبيوتر 3', 'طاولات الكمبيوتر 3', 'Gaming Table 3', 'Gaming Table 3', 'Gaming Table 3', '6740603519', 'Gaming Table 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 462.00, 55.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1055, 'طاولات الكمبيوتر 4', 'طاولات الكمبيوتر 4', 'طاولات الكمبيوتر 4', 'Gaming Table 4', 'Gaming Table 4', 'Gaming Table 4', '6483200489', 'Gaming Table 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 208.00, 107.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1056, 'طاولات الكمبيوتر 5', 'طاولات الكمبيوتر 5', 'طاولات الكمبيوتر 5', 'Gaming Table 5', 'Gaming Table 5', 'Gaming Table 5', '6287001737', 'Gaming Table 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 182.00, 112.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1057, 'طاولات الكمبيوتر 6', 'طاولات الكمبيوتر 6', 'طاولات الكمبيوتر 6', 'Gaming Table 6', 'Gaming Table 6', 'Gaming Table 6', '3668817693', 'Gaming Table 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 309.00, 229.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1058, 'طاولات الكمبيوتر 7', 'طاولات الكمبيوتر 7', 'طاولات الكمبيوتر 7', 'Gaming Table 7', 'Gaming Table 7', 'Gaming Table 7', '5805538144', 'Gaming Table 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 283.00, 57.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1059, 'طاولات الكمبيوتر 8', 'طاولات الكمبيوتر 8', 'طاولات الكمبيوتر 8', 'Gaming Table 8', 'Gaming Table 8', 'Gaming Table 8', '660588326', 'Gaming Table 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 248.00, 268.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1060, 'طاولات الكمبيوتر 9', 'طاولات الكمبيوتر 9', 'طاولات الكمبيوتر 9', 'Gaming Table 9', 'Gaming Table 9', 'Gaming Table 9', '345196717', 'Gaming Table 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 159.00, 59.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1061, 'طاولات الكمبيوتر 10', 'طاولات الكمبيوتر 10', 'طاولات الكمبيوتر 10', 'Gaming Table 10', 'Gaming Table 10', 'Gaming Table 10', '8947937713', 'Gaming Table 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 142.00, 256.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1062, 'طاولات الكمبيوتر 11', 'طاولات الكمبيوتر 11', 'طاولات الكمبيوتر 11', 'Gaming Table 11', 'Gaming Table 11', 'Gaming Table 11', '6019398963', 'Gaming Table 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 303.00, 54.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1063, 'طاولات الكمبيوتر 12', 'طاولات الكمبيوتر 12', 'طاولات الكمبيوتر 12', 'Gaming Table 12', 'Gaming Table 12', 'Gaming Table 12', '6745386992', 'Gaming Table 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 386.00, 369.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1064, 'طاولات الكمبيوتر 13', 'طاولات الكمبيوتر 13', 'طاولات الكمبيوتر 13', 'Gaming Table 13', 'Gaming Table 13', 'Gaming Table 13', '9132829552', 'Gaming Table 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 390.00, 59.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1065, 'طاولات الكمبيوتر 14', 'طاولات الكمبيوتر 14', 'طاولات الكمبيوتر 14', 'Gaming Table 14', 'Gaming Table 14', 'Gaming Table 14', '4511463573', 'Gaming Table 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 467.00, 120.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1066, 'طاولات الكمبيوتر 15', 'طاولات الكمبيوتر 15', 'طاولات الكمبيوتر 15', 'Gaming Table 15', 'Gaming Table 15', 'Gaming Table 15', '8844356113', 'Gaming Table 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 429.00, 97.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1067, 'طاولات الكمبيوتر 16', 'طاولات الكمبيوتر 16', 'طاولات الكمبيوتر 16', 'Gaming Table 16', 'Gaming Table 16', 'Gaming Table 16', '7680549600', 'Gaming Table 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 438.00, 168.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1068, 'طاولات الكمبيوتر 17', 'طاولات الكمبيوتر 17', 'طاولات الكمبيوتر 17', 'Gaming Table 17', 'Gaming Table 17', 'Gaming Table 17', '3774716412', 'Gaming Table 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 399.00, 226.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1069, 'طاولات الكمبيوتر 18', 'طاولات الكمبيوتر 18', 'طاولات الكمبيوتر 18', 'Gaming Table 18', 'Gaming Table 18', 'Gaming Table 18', '7308358244', 'Gaming Table 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 264.00, 229.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1070, 'طاولات الكمبيوتر 19', 'طاولات الكمبيوتر 19', 'طاولات الكمبيوتر 19', 'Gaming Table 19', 'Gaming Table 19', 'Gaming Table 19', '9252841912', 'Gaming Table 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 476.00, 376.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1071, 'طاولات الكمبيوتر 20', 'طاولات الكمبيوتر 20', 'طاولات الكمبيوتر 20', 'Gaming Table 20', 'Gaming Table 20', 'Gaming Table 20', '1283337923', 'Gaming Table 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 373.00, 259.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1072, 'طاولات الكمبيوتر 21', 'طاولات الكمبيوتر 21', 'طاولات الكمبيوتر 21', 'Gaming Table 21', 'Gaming Table 21', 'Gaming Table 21', '4289395981', 'Gaming Table 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 437.00, 398.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1073, 'طاولات الكمبيوتر 22', 'طاولات الكمبيوتر 22', 'طاولات الكمبيوتر 22', 'Gaming Table 22', 'Gaming Table 22', 'Gaming Table 22', '7520264330', 'Gaming Table 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 201.00, 143.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1074, 'طاولات الكمبيوتر 23', 'طاولات الكمبيوتر 23', 'طاولات الكمبيوتر 23', 'Gaming Table 23', 'Gaming Table 23', 'Gaming Table 23', '6978944508', 'Gaming Table 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 204.00, 89.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1075, 'طاولات الكمبيوتر 24', 'طاولات الكمبيوتر 24', 'طاولات الكمبيوتر 24', 'Gaming Table 24', 'Gaming Table 24', 'Gaming Table 24', '7237770607', 'Gaming Table 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 368.00, 193.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1076, 'طاولات الكمبيوتر 25', 'طاولات الكمبيوتر 25', 'طاولات الكمبيوتر 25', 'Gaming Table 25', 'Gaming Table 25', 'Gaming Table 25', '5934449702', 'Gaming Table 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 345.00, 235.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1077, 'طاولات الكمبيوتر 26', 'طاولات الكمبيوتر 26', 'طاولات الكمبيوتر 26', 'Gaming Table 26', 'Gaming Table 26', 'Gaming Table 26', '3776448707', 'Gaming Table 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 149.00, 390.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1078, 'طاولات الكمبيوتر 27', 'طاولات الكمبيوتر 27', 'طاولات الكمبيوتر 27', 'Gaming Table 27', 'Gaming Table 27', 'Gaming Table 27', '8204150220', 'Gaming Table 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 270.00, 253.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1079, 'طاولات الكمبيوتر 28', 'طاولات الكمبيوتر 28', 'طاولات الكمبيوتر 28', 'Gaming Table 28', 'Gaming Table 28', 'Gaming Table 28', '9320685231', 'Gaming Table 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 111.00, 194.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1080, 'طاولات الكمبيوتر 29', 'طاولات الكمبيوتر 29', 'طاولات الكمبيوتر 29', 'Gaming Table 29', 'Gaming Table 29', 'Gaming Table 29', '3294787297', 'Gaming Table 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 431.00, 170.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1081, 'طاولات الكمبيوتر 30', 'طاولات الكمبيوتر 30', 'طاولات الكمبيوتر 30', 'Gaming Table 30', 'Gaming Table 30', 'Gaming Table 30', '6322574359', 'Gaming Table 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 366.00, 277.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1082, 'طاولات الكمبيوتر 31', 'طاولات الكمبيوتر 31', 'طاولات الكمبيوتر 31', 'Gaming Table 31', 'Gaming Table 31', 'Gaming Table 31', '8497473405', 'Gaming Table 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 440.00, 281.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1083, 'طاولات الكمبيوتر 32', 'طاولات الكمبيوتر 32', 'طاولات الكمبيوتر 32', 'Gaming Table 32', 'Gaming Table 32', 'Gaming Table 32', '8705600711', 'Gaming Table 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 253.00, 334.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1084, 'طاولات الكمبيوتر 33', 'طاولات الكمبيوتر 33', 'طاولات الكمبيوتر 33', 'Gaming Table 33', 'Gaming Table 33', 'Gaming Table 33', '5922792856', 'Gaming Table 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 138.00, 121.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1085, 'طاولات الكمبيوتر 34', 'طاولات الكمبيوتر 34', 'طاولات الكمبيوتر 34', 'Gaming Table 34', 'Gaming Table 34', 'Gaming Table 34', '7307584448', 'Gaming Table 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 202.00, 270.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1086, 'طاولات الكمبيوتر 35', 'طاولات الكمبيوتر 35', 'طاولات الكمبيوتر 35', 'Gaming Table 35', 'Gaming Table 35', 'Gaming Table 35', '9758871833', 'Gaming Table 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 457.00, 345.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1087, 'طاولات الكمبيوتر 36', 'طاولات الكمبيوتر 36', 'طاولات الكمبيوتر 36', 'Gaming Table 36', 'Gaming Table 36', 'Gaming Table 36', '542040569', 'Gaming Table 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 484.00, 90.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1088, 'طاولات الكمبيوتر 37', 'طاولات الكمبيوتر 37', 'طاولات الكمبيوتر 37', 'Gaming Table 37', 'Gaming Table 37', 'Gaming Table 37', '1208748875', 'Gaming Table 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 424.00, 288.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1089, 'طاولات الكمبيوتر 38', 'طاولات الكمبيوتر 38', 'طاولات الكمبيوتر 38', 'Gaming Table 38', 'Gaming Table 38', 'Gaming Table 38', '9449605493', 'Gaming Table 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 367.00, 109.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1090, 'طاولات الكمبيوتر 39', 'طاولات الكمبيوتر 39', 'طاولات الكمبيوتر 39', 'Gaming Table 39', 'Gaming Table 39', 'Gaming Table 39', '1609620778', 'Gaming Table 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 277.00, 139.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1091, 'طاولات الكمبيوتر 40', 'طاولات الكمبيوتر 40', 'طاولات الكمبيوتر 40', 'Gaming Table 40', 'Gaming Table 40', 'Gaming Table 40', '8344542623', 'Gaming Table 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 276.00, 381.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1092, 'طاولات الكمبيوتر 41', 'طاولات الكمبيوتر 41', 'طاولات الكمبيوتر 41', 'Gaming Table 41', 'Gaming Table 41', 'Gaming Table 41', '3614061144', 'Gaming Table 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 430.00, 354.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1093, 'طاولات الكمبيوتر 42', 'طاولات الكمبيوتر 42', 'طاولات الكمبيوتر 42', 'Gaming Table 42', 'Gaming Table 42', 'Gaming Table 42', '2106160878', 'Gaming Table 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 359.00, 371.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1094, 'طاولات الكمبيوتر 43', 'طاولات الكمبيوتر 43', 'طاولات الكمبيوتر 43', 'Gaming Table 43', 'Gaming Table 43', 'Gaming Table 43', '7119504657', 'Gaming Table 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 224.00, 240.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1095, 'طاولات الكمبيوتر 44', 'طاولات الكمبيوتر 44', 'طاولات الكمبيوتر 44', 'Gaming Table 44', 'Gaming Table 44', 'Gaming Table 44', '8318524367', 'Gaming Table 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 325.00, 238.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1096, 'طاولات الكمبيوتر 45', 'طاولات الكمبيوتر 45', 'طاولات الكمبيوتر 45', 'Gaming Table 45', 'Gaming Table 45', 'Gaming Table 45', '8921613062', 'Gaming Table 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 270.00, 260.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1097, 'طاولات الكمبيوتر 46', 'طاولات الكمبيوتر 46', 'طاولات الكمبيوتر 46', 'Gaming Table 46', 'Gaming Table 46', 'Gaming Table 46', '3320511196', 'Gaming Table 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 377.00, 148.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1098, 'طاولات الكمبيوتر 47', 'طاولات الكمبيوتر 47', 'طاولات الكمبيوتر 47', 'Gaming Table 47', 'Gaming Table 47', 'Gaming Table 47', '3293178727', 'Gaming Table 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 419.00, 194.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1099, 'طاولات الكمبيوتر 48', 'طاولات الكمبيوتر 48', 'طاولات الكمبيوتر 48', 'Gaming Table 48', 'Gaming Table 48', 'Gaming Table 48', '5891934325', 'Gaming Table 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 154.00, 54.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1100, 'طاولات الكمبيوتر 49', 'طاولات الكمبيوتر 49', 'طاولات الكمبيوتر 49', 'Gaming Table 49', 'Gaming Table 49', 'Gaming Table 49', '7584005558', 'Gaming Table 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 455.00, 381.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1101, 'السماعات 0', 'السماعات 0', 'السماعات 0', 'Headset 0', 'Headset 0', 'Headset 0', '4117362442', 'Headset 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 296.00, 205.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1102, 'السماعات 1', 'السماعات 1', 'السماعات 1', 'Headset 1', 'Headset 1', 'Headset 1', '4434592741', 'Headset 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 158.00, 274.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1103, 'السماعات 2', 'السماعات 2', 'السماعات 2', 'Headset 2', 'Headset 2', 'Headset 2', '9432393630', 'Headset 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 117.00, 248.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1104, 'السماعات 3', 'السماعات 3', 'السماعات 3', 'Headset 3', 'Headset 3', 'Headset 3', '8630201929', 'Headset 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 164.00, 345.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1105, 'السماعات 4', 'السماعات 4', 'السماعات 4', 'Headset 4', 'Headset 4', 'Headset 4', '5827922248', 'Headset 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 201.00, 257.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1106, 'السماعات 5', 'السماعات 5', 'السماعات 5', 'Headset 5', 'Headset 5', 'Headset 5', '8638384637', 'Headset 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 222.00, 336.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1107, 'السماعات 6', 'السماعات 6', 'السماعات 6', 'Headset 6', 'Headset 6', 'Headset 6', '2015494597', 'Headset 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 292.00, 240.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1108, 'السماعات 7', 'السماعات 7', 'السماعات 7', 'Headset 7', 'Headset 7', 'Headset 7', '7063358154', 'Headset 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 279.00, 233.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1109, 'السماعات 8', 'السماعات 8', 'السماعات 8', 'Headset 8', 'Headset 8', 'Headset 8', '9644718388', 'Headset 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 463.00, 305.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1110, 'السماعات 9', 'السماعات 9', 'السماعات 9', 'Headset 9', 'Headset 9', 'Headset 9', '6738019519', 'Headset 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 267.00, 206.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1111, 'السماعات 10', 'السماعات 10', 'السماعات 10', 'Headset 10', 'Headset 10', 'Headset 10', '5842837894', 'Headset 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 491.00, 237.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1112, 'السماعات 11', 'السماعات 11', 'السماعات 11', 'Headset 11', 'Headset 11', 'Headset 11', '1602622113', 'Headset 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 299.00, 128.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1113, 'السماعات 12', 'السماعات 12', 'السماعات 12', 'Headset 12', 'Headset 12', 'Headset 12', '6929671453', 'Headset 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 354.00, 59.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1114, 'السماعات 13', 'السماعات 13', 'السماعات 13', 'Headset 13', 'Headset 13', 'Headset 13', '488724996', 'Headset 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 310.00, 252.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1115, 'السماعات 14', 'السماعات 14', 'السماعات 14', 'Headset 14', 'Headset 14', 'Headset 14', '4603495441', 'Headset 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 315.00, 305.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1116, 'السماعات 15', 'السماعات 15', 'السماعات 15', 'Headset 15', 'Headset 15', 'Headset 15', '9906199314', 'Headset 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 254.00, 332.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1117, 'السماعات 16', 'السماعات 16', 'السماعات 16', 'Headset 16', 'Headset 16', 'Headset 16', '1723591508', 'Headset 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 476.00, 168.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1118, 'السماعات 17', 'السماعات 17', 'السماعات 17', 'Headset 17', 'Headset 17', 'Headset 17', '756269666', 'Headset 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 230.00, 252.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1119, 'السماعات 18', 'السماعات 18', 'السماعات 18', 'Headset 18', 'Headset 18', 'Headset 18', '9202167253', 'Headset 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 446.00, 321.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1120, 'السماعات 19', 'السماعات 19', 'السماعات 19', 'Headset 19', 'Headset 19', 'Headset 19', '2778491433', 'Headset 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 427.00, 73.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1121, 'السماعات 20', 'السماعات 20', 'السماعات 20', 'Headset 20', 'Headset 20', 'Headset 20', '9251020591', 'Headset 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 138.00, 133.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1122, 'السماعات 21', 'السماعات 21', 'السماعات 21', 'Headset 21', 'Headset 21', 'Headset 21', '532769354', 'Headset 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 337.00, 272.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1123, 'السماعات 22', 'السماعات 22', 'السماعات 22', 'Headset 22', 'Headset 22', 'Headset 22', '1529787107', 'Headset 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 190.00, 375.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1124, 'السماعات 23', 'السماعات 23', 'السماعات 23', 'Headset 23', 'Headset 23', 'Headset 23', '9100849226', 'Headset 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 316.00, 92.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1125, 'السماعات 24', 'السماعات 24', 'السماعات 24', 'Headset 24', 'Headset 24', 'Headset 24', '6226641557', 'Headset 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 440.00, 97.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1126, 'السماعات 25', 'السماعات 25', 'السماعات 25', 'Headset 25', 'Headset 25', 'Headset 25', '9930727317', 'Headset 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 277.00, 140.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1127, 'السماعات 26', 'السماعات 26', 'السماعات 26', 'Headset 26', 'Headset 26', 'Headset 26', '7701962910', 'Headset 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 304.00, 140.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1128, 'السماعات 27', 'السماعات 27', 'السماعات 27', 'Headset 27', 'Headset 27', 'Headset 27', '1145011925', 'Headset 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 112.00, 257.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1129, 'السماعات 28', 'السماعات 28', 'السماعات 28', 'Headset 28', 'Headset 28', 'Headset 28', '9959276827', 'Headset 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 202.00, 256.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1130, 'السماعات 29', 'السماعات 29', 'السماعات 29', 'Headset 29', 'Headset 29', 'Headset 29', '4946229997', 'Headset 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 251.00, 354.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1131, 'السماعات 30', 'السماعات 30', 'السماعات 30', 'Headset 30', 'Headset 30', 'Headset 30', '5325699722', 'Headset 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 485.00, 114.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1132, 'السماعات 31', 'السماعات 31', 'السماعات 31', 'Headset 31', 'Headset 31', 'Headset 31', '8374737691', 'Headset 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 117.00, 129.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1133, 'السماعات 32', 'السماعات 32', 'السماعات 32', 'Headset 32', 'Headset 32', 'Headset 32', '313233041', 'Headset 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 337.00, 133.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1134, 'السماعات 33', 'السماعات 33', 'السماعات 33', 'Headset 33', 'Headset 33', 'Headset 33', '9710478772', 'Headset 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 239.00, 301.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1135, 'السماعات 34', 'السماعات 34', 'السماعات 34', 'Headset 34', 'Headset 34', 'Headset 34', '7041278826', 'Headset 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 465.00, 353.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1136, 'السماعات 35', 'السماعات 35', 'السماعات 35', 'Headset 35', 'Headset 35', 'Headset 35', '5814332180', 'Headset 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 193.00, 315.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1137, 'السماعات 36', 'السماعات 36', 'السماعات 36', 'Headset 36', 'Headset 36', 'Headset 36', '4917055339', 'Headset 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 335.00, 250.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1138, 'السماعات 37', 'السماعات 37', 'السماعات 37', 'Headset 37', 'Headset 37', 'Headset 37', '5587885307', 'Headset 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 478.00, 287.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1139, 'السماعات 38', 'السماعات 38', 'السماعات 38', 'Headset 38', 'Headset 38', 'Headset 38', '7676991126', 'Headset 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 145.00, 219.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1140, 'السماعات 39', 'السماعات 39', 'السماعات 39', 'Headset 39', 'Headset 39', 'Headset 39', '8475714736', 'Headset 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 250.00, 194.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1141, 'السماعات 40', 'السماعات 40', 'السماعات 40', 'Headset 40', 'Headset 40', 'Headset 40', '4490830692', 'Headset 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 231.00, 262.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1142, 'السماعات 41', 'السماعات 41', 'السماعات 41', 'Headset 41', 'Headset 41', 'Headset 41', '7762970233', 'Headset 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 302.00, 172.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1143, 'السماعات 42', 'السماعات 42', 'السماعات 42', 'Headset 42', 'Headset 42', 'Headset 42', '8194201264', 'Headset 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 151.00, 153.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1144, 'السماعات 43', 'السماعات 43', 'السماعات 43', 'Headset 43', 'Headset 43', 'Headset 43', '9256657950', 'Headset 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 460.00, 219.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1145, 'السماعات 44', 'السماعات 44', 'السماعات 44', 'Headset 44', 'Headset 44', 'Headset 44', '5503563573', 'Headset 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 470.00, 135.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1146, 'السماعات 45', 'السماعات 45', 'السماعات 45', 'Headset 45', 'Headset 45', 'Headset 45', '8594855716', 'Headset 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 455.00, 155.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1147, 'السماعات 46', 'السماعات 46', 'السماعات 46', 'Headset 46', 'Headset 46', 'Headset 46', '5187745656', 'Headset 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 287.00, 168.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1148, 'السماعات 47', 'السماعات 47', 'السماعات 47', 'Headset 47', 'Headset 47', 'Headset 47', '2781810510', 'Headset 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 182.00, 282.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1149, 'السماعات 48', 'السماعات 48', 'السماعات 48', 'Headset 48', 'Headset 48', 'Headset 48', '5712910316', 'Headset 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 347.00, 302.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1150, 'السماعات 49', 'السماعات 49', 'السماعات 49', 'Headset 49', 'Headset 49', 'Headset 49', '3983124025', 'Headset 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 434.00, 139.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1151, 'الكاميرات 0', 'الكاميرات 0', 'الكاميرات 0', 'Webcams 0', 'Webcams 0', 'Webcams 0', '8578876184', 'Webcams 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 265.00, 359.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1152, 'الكاميرات 1', 'الكاميرات 1', 'الكاميرات 1', 'Webcams 1', 'Webcams 1', 'Webcams 1', '8167883284', 'Webcams 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 108.00, 247.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1153, 'الكاميرات 2', 'الكاميرات 2', 'الكاميرات 2', 'Webcams 2', 'Webcams 2', 'Webcams 2', '4905890872', 'Webcams 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 280.00, 151.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1154, 'الكاميرات 3', 'الكاميرات 3', 'الكاميرات 3', 'Webcams 3', 'Webcams 3', 'Webcams 3', '1938486958', 'Webcams 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 454.00, 376.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1155, 'الكاميرات 4', 'الكاميرات 4', 'الكاميرات 4', 'Webcams 4', 'Webcams 4', 'Webcams 4', '4040043781', 'Webcams 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 240.00, 92.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1156, 'الكاميرات 5', 'الكاميرات 5', 'الكاميرات 5', 'Webcams 5', 'Webcams 5', 'Webcams 5', '8026581237', 'Webcams 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 162.00, 92.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1157, 'الكاميرات 6', 'الكاميرات 6', 'الكاميرات 6', 'Webcams 6', 'Webcams 6', 'Webcams 6', '4692670766', 'Webcams 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 300.00, 101.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1158, 'الكاميرات 7', 'الكاميرات 7', 'الكاميرات 7', 'Webcams 7', 'Webcams 7', 'Webcams 7', '1737568975', 'Webcams 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 310.00, 74.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1159, 'الكاميرات 8', 'الكاميرات 8', 'الكاميرات 8', 'Webcams 8', 'Webcams 8', 'Webcams 8', '2291704486', 'Webcams 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 113.00, 234.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1160, 'الكاميرات 9', 'الكاميرات 9', 'الكاميرات 9', 'Webcams 9', 'Webcams 9', 'Webcams 9', '7824289549', 'Webcams 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 186.00, 238.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1161, 'الكاميرات 10', 'الكاميرات 10', 'الكاميرات 10', 'Webcams 10', 'Webcams 10', 'Webcams 10', '4323899604', 'Webcams 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 188.00, 302.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1162, 'الكاميرات 11', 'الكاميرات 11', 'الكاميرات 11', 'Webcams 11', 'Webcams 11', 'Webcams 11', '8695979266', 'Webcams 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 500.00, 295.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1163, 'الكاميرات 12', 'الكاميرات 12', 'الكاميرات 12', 'Webcams 12', 'Webcams 12', 'Webcams 12', '8284938825', 'Webcams 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 469.00, 376.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1164, 'الكاميرات 13', 'الكاميرات 13', 'الكاميرات 13', 'Webcams 13', 'Webcams 13', 'Webcams 13', '5469719797', 'Webcams 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 158.00, 251.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1165, 'الكاميرات 14', 'الكاميرات 14', 'الكاميرات 14', 'Webcams 14', 'Webcams 14', 'Webcams 14', '8200415434', 'Webcams 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 179.00, 124.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1166, 'الكاميرات 15', 'الكاميرات 15', 'الكاميرات 15', 'Webcams 15', 'Webcams 15', 'Webcams 15', '2674750832', 'Webcams 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 350.00, 323.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1167, 'الكاميرات 16', 'الكاميرات 16', 'الكاميرات 16', 'Webcams 16', 'Webcams 16', 'Webcams 16', '5276212982', 'Webcams 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 292.00, 196.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1168, 'الكاميرات 17', 'الكاميرات 17', 'الكاميرات 17', 'Webcams 17', 'Webcams 17', 'Webcams 17', '3741708498', 'Webcams 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 199.00, 87.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1169, 'الكاميرات 18', 'الكاميرات 18', 'الكاميرات 18', 'Webcams 18', 'Webcams 18', 'Webcams 18', '2387846385', 'Webcams 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 469.00, 260.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1170, 'الكاميرات 19', 'الكاميرات 19', 'الكاميرات 19', 'Webcams 19', 'Webcams 19', 'Webcams 19', '7422943781', 'Webcams 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 361.00, 77.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1171, 'الكاميرات 20', 'الكاميرات 20', 'الكاميرات 20', 'Webcams 20', 'Webcams 20', 'Webcams 20', '9944335923', 'Webcams 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 192.00, 151.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1172, 'الكاميرات 21', 'الكاميرات 21', 'الكاميرات 21', 'Webcams 21', 'Webcams 21', 'Webcams 21', '2872721615', 'Webcams 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 458.00, 293.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1173, 'الكاميرات 22', 'الكاميرات 22', 'الكاميرات 22', 'Webcams 22', 'Webcams 22', 'Webcams 22', '4950814619', 'Webcams 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 194.00, 128.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1174, 'الكاميرات 23', 'الكاميرات 23', 'الكاميرات 23', 'Webcams 23', 'Webcams 23', 'Webcams 23', '9706792655', 'Webcams 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 142.00, 208.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1175, 'الكاميرات 24', 'الكاميرات 24', 'الكاميرات 24', 'Webcams 24', 'Webcams 24', 'Webcams 24', '2743015126', 'Webcams 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 497.00, 228.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1176, 'الكاميرات 25', 'الكاميرات 25', 'الكاميرات 25', 'Webcams 25', 'Webcams 25', 'Webcams 25', '3254381694', 'Webcams 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 407.00, 98.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1177, 'الكاميرات 26', 'الكاميرات 26', 'الكاميرات 26', 'Webcams 26', 'Webcams 26', 'Webcams 26', '4449268335', 'Webcams 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 400.00, 162.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1178, 'الكاميرات 27', 'الكاميرات 27', 'الكاميرات 27', 'Webcams 27', 'Webcams 27', 'Webcams 27', '8618569094', 'Webcams 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 168.00, 223.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1179, 'الكاميرات 28', 'الكاميرات 28', 'الكاميرات 28', 'Webcams 28', 'Webcams 28', 'Webcams 28', '3412683562', 'Webcams 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 198.00, 247.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1180, 'الكاميرات 29', 'الكاميرات 29', 'الكاميرات 29', 'Webcams 29', 'Webcams 29', 'Webcams 29', '6140362544', 'Webcams 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 229.00, 342.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1181, 'الكاميرات 30', 'الكاميرات 30', 'الكاميرات 30', 'Webcams 30', 'Webcams 30', 'Webcams 30', '7897423155', 'Webcams 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 208.00, 279.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1182, 'الكاميرات 31', 'الكاميرات 31', 'الكاميرات 31', 'Webcams 31', 'Webcams 31', 'Webcams 31', '2456019892', 'Webcams 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 413.00, 153.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1183, 'الكاميرات 32', 'الكاميرات 32', 'الكاميرات 32', 'Webcams 32', 'Webcams 32', 'Webcams 32', '9486414776', 'Webcams 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 208.00, 237.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1184, 'الكاميرات 33', 'الكاميرات 33', 'الكاميرات 33', 'Webcams 33', 'Webcams 33', 'Webcams 33', '5720890688', 'Webcams 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 340.00, 298.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1185, 'الكاميرات 34', 'الكاميرات 34', 'الكاميرات 34', 'Webcams 34', 'Webcams 34', 'Webcams 34', '8117689805', 'Webcams 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 481.00, 375.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1186, 'الكاميرات 35', 'الكاميرات 35', 'الكاميرات 35', 'Webcams 35', 'Webcams 35', 'Webcams 35', '2087253417', 'Webcams 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 458.00, 282.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1187, 'الكاميرات 36', 'الكاميرات 36', 'الكاميرات 36', 'Webcams 36', 'Webcams 36', 'Webcams 36', '4786556632', 'Webcams 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 416.00, 399.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1188, 'الكاميرات 37', 'الكاميرات 37', 'الكاميرات 37', 'Webcams 37', 'Webcams 37', 'Webcams 37', '8104845717', 'Webcams 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 421.00, 352.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1189, 'الكاميرات 38', 'الكاميرات 38', 'الكاميرات 38', 'Webcams 38', 'Webcams 38', 'Webcams 38', '9606950838', 'Webcams 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 308.00, 133.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1190, 'الكاميرات 39', 'الكاميرات 39', 'الكاميرات 39', 'Webcams 39', 'Webcams 39', 'Webcams 39', '4072839667', 'Webcams 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 135.00, 256.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1191, 'الكاميرات 40', 'الكاميرات 40', 'الكاميرات 40', 'Webcams 40', 'Webcams 40', 'Webcams 40', '1865234815', 'Webcams 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 154.00, 85.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1192, 'الكاميرات 41', 'الكاميرات 41', 'الكاميرات 41', 'Webcams 41', 'Webcams 41', 'Webcams 41', '9858074666', 'Webcams 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 404.00, 104.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1193, 'الكاميرات 42', 'الكاميرات 42', 'الكاميرات 42', 'Webcams 42', 'Webcams 42', 'Webcams 42', '8973284033', 'Webcams 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 173.00, 382.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1194, 'الكاميرات 43', 'الكاميرات 43', 'الكاميرات 43', 'Webcams 43', 'Webcams 43', 'Webcams 43', '5681443672', 'Webcams 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 299.00, 164.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1195, 'الكاميرات 44', 'الكاميرات 44', 'الكاميرات 44', 'Webcams 44', 'Webcams 44', 'Webcams 44', '9787924689', 'Webcams 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 168.00, 96.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1196, 'الكاميرات 45', 'الكاميرات 45', 'الكاميرات 45', 'Webcams 45', 'Webcams 45', 'Webcams 45', '4033009052', 'Webcams 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 267.00, 348.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1197, 'الكاميرات 46', 'الكاميرات 46', 'الكاميرات 46', 'Webcams 46', 'Webcams 46', 'Webcams 46', '1450472815', 'Webcams 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 389.00, 334.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1198, 'الكاميرات 47', 'الكاميرات 47', 'الكاميرات 47', 'Webcams 47', 'Webcams 47', 'Webcams 47', '200882969', 'Webcams 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 485.00, 219.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1199, 'الكاميرات 48', 'الكاميرات 48', 'الكاميرات 48', 'Webcams 48', 'Webcams 48', 'Webcams 48', '4197796806', 'Webcams 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 165.00, 147.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1200, 'الكاميرات 49', 'الكاميرات 49', 'الكاميرات 49', 'Webcams 49', 'Webcams 49', 'Webcams 49', '9569942727', 'Webcams 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 279.00, 208.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1201, 'الكيابل واكسسوات الاضاءة 0', 'الكيابل واكسسوات الاضاءة 0', 'الكيابل واكسسوات الاضاءة 0', 'Cables and lighting accessories 0', 'Cables and lighting accessories 0', 'Cables and lighting accessories 0', '8105478606', 'Cables and lighting accessories 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 321.00, 56.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1202, 'الكيابل واكسسوات الاضاءة 1', 'الكيابل واكسسوات الاضاءة 1', 'الكيابل واكسسوات الاضاءة 1', 'Cables and lighting accessories 1', 'Cables and lighting accessories 1', 'Cables and lighting accessories 1', '1852847814', 'Cables and lighting accessories 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 337.00, 183.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1203, 'الكيابل واكسسوات الاضاءة 2', 'الكيابل واكسسوات الاضاءة 2', 'الكيابل واكسسوات الاضاءة 2', 'Cables and lighting accessories 2', 'Cables and lighting accessories 2', 'Cables and lighting accessories 2', '4609618416', 'Cables and lighting accessories 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 348.00, 303.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1204, 'الكيابل واكسسوات الاضاءة 3', 'الكيابل واكسسوات الاضاءة 3', 'الكيابل واكسسوات الاضاءة 3', 'Cables and lighting accessories 3', 'Cables and lighting accessories 3', 'Cables and lighting accessories 3', '9033361195', 'Cables and lighting accessories 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 137.00, 264.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1205, 'الكيابل واكسسوات الاضاءة 4', 'الكيابل واكسسوات الاضاءة 4', 'الكيابل واكسسوات الاضاءة 4', 'Cables and lighting accessories 4', 'Cables and lighting accessories 4', 'Cables and lighting accessories 4', '2588439478', 'Cables and lighting accessories 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 334.00, 252.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1206, 'الكيابل واكسسوات الاضاءة 5', 'الكيابل واكسسوات الاضاءة 5', 'الكيابل واكسسوات الاضاءة 5', 'Cables and lighting accessories 5', 'Cables and lighting accessories 5', 'Cables and lighting accessories 5', '5079736447', 'Cables and lighting accessories 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 237.00, 198.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1207, 'الكيابل واكسسوات الاضاءة 6', 'الكيابل واكسسوات الاضاءة 6', 'الكيابل واكسسوات الاضاءة 6', 'Cables and lighting accessories 6', 'Cables and lighting accessories 6', 'Cables and lighting accessories 6', '3870273309', 'Cables and lighting accessories 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 375.00, 289.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1208, 'الكيابل واكسسوات الاضاءة 7', 'الكيابل واكسسوات الاضاءة 7', 'الكيابل واكسسوات الاضاءة 7', 'Cables and lighting accessories 7', 'Cables and lighting accessories 7', 'Cables and lighting accessories 7', '877986002', 'Cables and lighting accessories 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 368.00, 235.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1209, 'الكيابل واكسسوات الاضاءة 8', 'الكيابل واكسسوات الاضاءة 8', 'الكيابل واكسسوات الاضاءة 8', 'Cables and lighting accessories 8', 'Cables and lighting accessories 8', 'Cables and lighting accessories 8', '2879325298', 'Cables and lighting accessories 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 487.00, 126.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1210, 'الكيابل واكسسوات الاضاءة 9', 'الكيابل واكسسوات الاضاءة 9', 'الكيابل واكسسوات الاضاءة 9', 'Cables and lighting accessories 9', 'Cables and lighting accessories 9', 'Cables and lighting accessories 9', '6026312247', 'Cables and lighting accessories 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 358.00, 349.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1211, 'الكيابل واكسسوات الاضاءة 10', 'الكيابل واكسسوات الاضاءة 10', 'الكيابل واكسسوات الاضاءة 10', 'Cables and lighting accessories 10', 'Cables and lighting accessories 10', 'Cables and lighting accessories 10', '2925348286', 'Cables and lighting accessories 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 340.00, 363.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1212, 'الكيابل واكسسوات الاضاءة 11', 'الكيابل واكسسوات الاضاءة 11', 'الكيابل واكسسوات الاضاءة 11', 'Cables and lighting accessories 11', 'Cables and lighting accessories 11', 'Cables and lighting accessories 11', '3378202757', 'Cables and lighting accessories 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 358.00, 147.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1213, 'الكيابل واكسسوات الاضاءة 12', 'الكيابل واكسسوات الاضاءة 12', 'الكيابل واكسسوات الاضاءة 12', 'Cables and lighting accessories 12', 'Cables and lighting accessories 12', 'Cables and lighting accessories 12', '6883287635', 'Cables and lighting accessories 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 445.00, 299.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1214, 'الكيابل واكسسوات الاضاءة 13', 'الكيابل واكسسوات الاضاءة 13', 'الكيابل واكسسوات الاضاءة 13', 'Cables and lighting accessories 13', 'Cables and lighting accessories 13', 'Cables and lighting accessories 13', '8337696407', 'Cables and lighting accessories 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 399.00, 59.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1215, 'الكيابل واكسسوات الاضاءة 14', 'الكيابل واكسسوات الاضاءة 14', 'الكيابل واكسسوات الاضاءة 14', 'Cables and lighting accessories 14', 'Cables and lighting accessories 14', 'Cables and lighting accessories 14', '6163801535', 'Cables and lighting accessories 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 124.00, 199.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1216, 'الكيابل واكسسوات الاضاءة 15', 'الكيابل واكسسوات الاضاءة 15', 'الكيابل واكسسوات الاضاءة 15', 'Cables and lighting accessories 15', 'Cables and lighting accessories 15', 'Cables and lighting accessories 15', '8773482018', 'Cables and lighting accessories 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 121.00, 352.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1217, 'الكيابل واكسسوات الاضاءة 16', 'الكيابل واكسسوات الاضاءة 16', 'الكيابل واكسسوات الاضاءة 16', 'Cables and lighting accessories 16', 'Cables and lighting accessories 16', 'Cables and lighting accessories 16', '8181422519', 'Cables and lighting accessories 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 449.00, 260.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1218, 'الكيابل واكسسوات الاضاءة 17', 'الكيابل واكسسوات الاضاءة 17', 'الكيابل واكسسوات الاضاءة 17', 'Cables and lighting accessories 17', 'Cables and lighting accessories 17', 'Cables and lighting accessories 17', '9894528503', 'Cables and lighting accessories 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 216.00, 370.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1219, 'الكيابل واكسسوات الاضاءة 18', 'الكيابل واكسسوات الاضاءة 18', 'الكيابل واكسسوات الاضاءة 18', 'Cables and lighting accessories 18', 'Cables and lighting accessories 18', 'Cables and lighting accessories 18', '7371256749', 'Cables and lighting accessories 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 317.00, 298.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1220, 'الكيابل واكسسوات الاضاءة 19', 'الكيابل واكسسوات الاضاءة 19', 'الكيابل واكسسوات الاضاءة 19', 'Cables and lighting accessories 19', 'Cables and lighting accessories 19', 'Cables and lighting accessories 19', '8175379938', 'Cables and lighting accessories 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 282.00, 64.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1221, 'الكيابل واكسسوات الاضاءة 20', 'الكيابل واكسسوات الاضاءة 20', 'الكيابل واكسسوات الاضاءة 20', 'Cables and lighting accessories 20', 'Cables and lighting accessories 20', 'Cables and lighting accessories 20', '2410781482', 'Cables and lighting accessories 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 444.00, 108.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1222, 'الكيابل واكسسوات الاضاءة 21', 'الكيابل واكسسوات الاضاءة 21', 'الكيابل واكسسوات الاضاءة 21', 'Cables and lighting accessories 21', 'Cables and lighting accessories 21', 'Cables and lighting accessories 21', '4090782235', 'Cables and lighting accessories 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 354.00, 135.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1223, 'الكيابل واكسسوات الاضاءة 22', 'الكيابل واكسسوات الاضاءة 22', 'الكيابل واكسسوات الاضاءة 22', 'Cables and lighting accessories 22', 'Cables and lighting accessories 22', 'Cables and lighting accessories 22', '7217399783', 'Cables and lighting accessories 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 212.00, 239.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1224, 'الكيابل واكسسوات الاضاءة 23', 'الكيابل واكسسوات الاضاءة 23', 'الكيابل واكسسوات الاضاءة 23', 'Cables and lighting accessories 23', 'Cables and lighting accessories 23', 'Cables and lighting accessories 23', '5421317933', 'Cables and lighting accessories 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 135.00, 65.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1225, 'الكيابل واكسسوات الاضاءة 24', 'الكيابل واكسسوات الاضاءة 24', 'الكيابل واكسسوات الاضاءة 24', 'Cables and lighting accessories 24', 'Cables and lighting accessories 24', 'Cables and lighting accessories 24', '672956168', 'Cables and lighting accessories 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 116.00, 173.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1226, 'الكيابل واكسسوات الاضاءة 25', 'الكيابل واكسسوات الاضاءة 25', 'الكيابل واكسسوات الاضاءة 25', 'Cables and lighting accessories 25', 'Cables and lighting accessories 25', 'Cables and lighting accessories 25', '6218021093', 'Cables and lighting accessories 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 303.00, 349.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1227, 'الكيابل واكسسوات الاضاءة 26', 'الكيابل واكسسوات الاضاءة 26', 'الكيابل واكسسوات الاضاءة 26', 'Cables and lighting accessories 26', 'Cables and lighting accessories 26', 'Cables and lighting accessories 26', '4289333463', 'Cables and lighting accessories 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 402.00, 115.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1228, 'الكيابل واكسسوات الاضاءة 27', 'الكيابل واكسسوات الاضاءة 27', 'الكيابل واكسسوات الاضاءة 27', 'Cables and lighting accessories 27', 'Cables and lighting accessories 27', 'Cables and lighting accessories 27', '5791753236', 'Cables and lighting accessories 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 117.00, 88.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1229, 'الكيابل واكسسوات الاضاءة 28', 'الكيابل واكسسوات الاضاءة 28', 'الكيابل واكسسوات الاضاءة 28', 'Cables and lighting accessories 28', 'Cables and lighting accessories 28', 'Cables and lighting accessories 28', '4264132244', 'Cables and lighting accessories 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 229.00, 102.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1230, 'الكيابل واكسسوات الاضاءة 29', 'الكيابل واكسسوات الاضاءة 29', 'الكيابل واكسسوات الاضاءة 29', 'Cables and lighting accessories 29', 'Cables and lighting accessories 29', 'Cables and lighting accessories 29', '8424044299', 'Cables and lighting accessories 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 393.00, 82.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1231, 'الكيابل واكسسوات الاضاءة 30', 'الكيابل واكسسوات الاضاءة 30', 'الكيابل واكسسوات الاضاءة 30', 'Cables and lighting accessories 30', 'Cables and lighting accessories 30', 'Cables and lighting accessories 30', '1320934804', 'Cables and lighting accessories 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 101.00, 121.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1232, 'الكيابل واكسسوات الاضاءة 31', 'الكيابل واكسسوات الاضاءة 31', 'الكيابل واكسسوات الاضاءة 31', 'Cables and lighting accessories 31', 'Cables and lighting accessories 31', 'Cables and lighting accessories 31', '8273210359', 'Cables and lighting accessories 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 426.00, 128.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1233, 'الكيابل واكسسوات الاضاءة 32', 'الكيابل واكسسوات الاضاءة 32', 'الكيابل واكسسوات الاضاءة 32', 'Cables and lighting accessories 32', 'Cables and lighting accessories 32', 'Cables and lighting accessories 32', '5132670278', 'Cables and lighting accessories 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 346.00, 306.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1234, 'الكيابل واكسسوات الاضاءة 33', 'الكيابل واكسسوات الاضاءة 33', 'الكيابل واكسسوات الاضاءة 33', 'Cables and lighting accessories 33', 'Cables and lighting accessories 33', 'Cables and lighting accessories 33', '688478912', 'Cables and lighting accessories 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 185.00, 296.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1235, 'الكيابل واكسسوات الاضاءة 34', 'الكيابل واكسسوات الاضاءة 34', 'الكيابل واكسسوات الاضاءة 34', 'Cables and lighting accessories 34', 'Cables and lighting accessories 34', 'Cables and lighting accessories 34', '9658811739', 'Cables and lighting accessories 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 468.00, 228.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1236, 'الكيابل واكسسوات الاضاءة 35', 'الكيابل واكسسوات الاضاءة 35', 'الكيابل واكسسوات الاضاءة 35', 'Cables and lighting accessories 35', 'Cables and lighting accessories 35', 'Cables and lighting accessories 35', '3999351688', 'Cables and lighting accessories 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 369.00, 340.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1237, 'الكيابل واكسسوات الاضاءة 36', 'الكيابل واكسسوات الاضاءة 36', 'الكيابل واكسسوات الاضاءة 36', 'Cables and lighting accessories 36', 'Cables and lighting accessories 36', 'Cables and lighting accessories 36', '2532859955', 'Cables and lighting accessories 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 359.00, 291.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1238, 'الكيابل واكسسوات الاضاءة 37', 'الكيابل واكسسوات الاضاءة 37', 'الكيابل واكسسوات الاضاءة 37', 'Cables and lighting accessories 37', 'Cables and lighting accessories 37', 'Cables and lighting accessories 37', '64994377', 'Cables and lighting accessories 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 337.00, 235.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1239, 'الكيابل واكسسوات الاضاءة 38', 'الكيابل واكسسوات الاضاءة 38', 'الكيابل واكسسوات الاضاءة 38', 'Cables and lighting accessories 38', 'Cables and lighting accessories 38', 'Cables and lighting accessories 38', '2767274517', 'Cables and lighting accessories 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 492.00, 337.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1240, 'الكيابل واكسسوات الاضاءة 39', 'الكيابل واكسسوات الاضاءة 39', 'الكيابل واكسسوات الاضاءة 39', 'Cables and lighting accessories 39', 'Cables and lighting accessories 39', 'Cables and lighting accessories 39', '6127132105', 'Cables and lighting accessories 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 246.00, 399.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1241, 'الكيابل واكسسوات الاضاءة 40', 'الكيابل واكسسوات الاضاءة 40', 'الكيابل واكسسوات الاضاءة 40', 'Cables and lighting accessories 40', 'Cables and lighting accessories 40', 'Cables and lighting accessories 40', '5537319720', 'Cables and lighting accessories 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 273.00, 263.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1242, 'الكيابل واكسسوات الاضاءة 41', 'الكيابل واكسسوات الاضاءة 41', 'الكيابل واكسسوات الاضاءة 41', 'Cables and lighting accessories 41', 'Cables and lighting accessories 41', 'Cables and lighting accessories 41', '7417902397', 'Cables and lighting accessories 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 346.00, 318.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1243, 'الكيابل واكسسوات الاضاءة 42', 'الكيابل واكسسوات الاضاءة 42', 'الكيابل واكسسوات الاضاءة 42', 'Cables and lighting accessories 42', 'Cables and lighting accessories 42', 'Cables and lighting accessories 42', '6315347696', 'Cables and lighting accessories 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 100.00, 197.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1244, 'الكيابل واكسسوات الاضاءة 43', 'الكيابل واكسسوات الاضاءة 43', 'الكيابل واكسسوات الاضاءة 43', 'Cables and lighting accessories 43', 'Cables and lighting accessories 43', 'Cables and lighting accessories 43', '2860645992', 'Cables and lighting accessories 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 457.00, 269.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1245, 'الكيابل واكسسوات الاضاءة 44', 'الكيابل واكسسوات الاضاءة 44', 'الكيابل واكسسوات الاضاءة 44', 'Cables and lighting accessories 44', 'Cables and lighting accessories 44', 'Cables and lighting accessories 44', '7043664544', 'Cables and lighting accessories 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 463.00, 310.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1246, 'الكيابل واكسسوات الاضاءة 45', 'الكيابل واكسسوات الاضاءة 45', 'الكيابل واكسسوات الاضاءة 45', 'Cables and lighting accessories 45', 'Cables and lighting accessories 45', 'Cables and lighting accessories 45', '636108865', 'Cables and lighting accessories 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 485.00, 301.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1247, 'الكيابل واكسسوات الاضاءة 46', 'الكيابل واكسسوات الاضاءة 46', 'الكيابل واكسسوات الاضاءة 46', 'Cables and lighting accessories 46', 'Cables and lighting accessories 46', 'Cables and lighting accessories 46', '5590329654', 'Cables and lighting accessories 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 200.00, 58.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1248, 'الكيابل واكسسوات الاضاءة 47', 'الكيابل واكسسوات الاضاءة 47', 'الكيابل واكسسوات الاضاءة 47', 'Cables and lighting accessories 47', 'Cables and lighting accessories 47', 'Cables and lighting accessories 47', '6386598676', 'Cables and lighting accessories 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 161.00, 316.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1249, 'الكيابل واكسسوات الاضاءة 48', 'الكيابل واكسسوات الاضاءة 48', 'الكيابل واكسسوات الاضاءة 48', 'Cables and lighting accessories 48', 'Cables and lighting accessories 48', 'Cables and lighting accessories 48', '2432357763', 'Cables and lighting accessories 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 315.00, 130.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1250, 'الكيابل واكسسوات الاضاءة 49', 'الكيابل واكسسوات الاضاءة 49', 'الكيابل واكسسوات الاضاءة 49', 'Cables and lighting accessories 49', 'Cables and lighting accessories 49', 'Cables and lighting accessories 49', '84782425', 'Cables and lighting accessories 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 430.00, 208.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1251, 'الكيبوردات 0', 'الكيبوردات 0', 'الكيبوردات 0', 'Keyboards Gaming 0', 'Keyboards Gaming 0', 'Keyboards Gaming 0', '5802601008', 'Keyboards Gaming 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 248.00, 140.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1252, 'الكيبوردات 1', 'الكيبوردات 1', 'الكيبوردات 1', 'Keyboards Gaming 1', 'Keyboards Gaming 1', 'Keyboards Gaming 1', '266865637', 'Keyboards Gaming 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 296.00, 147.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1253, 'الكيبوردات 2', 'الكيبوردات 2', 'الكيبوردات 2', 'Keyboards Gaming 2', 'Keyboards Gaming 2', 'Keyboards Gaming 2', '8388807405', 'Keyboards Gaming 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 302.00, 267.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1254, 'الكيبوردات 3', 'الكيبوردات 3', 'الكيبوردات 3', 'Keyboards Gaming 3', 'Keyboards Gaming 3', 'Keyboards Gaming 3', '6817261518', 'Keyboards Gaming 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 415.00, 363.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1255, 'الكيبوردات 4', 'الكيبوردات 4', 'الكيبوردات 4', 'Keyboards Gaming 4', 'Keyboards Gaming 4', 'Keyboards Gaming 4', '4296565182', 'Keyboards Gaming 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 464.00, 246.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1256, 'الكيبوردات 5', 'الكيبوردات 5', 'الكيبوردات 5', 'Keyboards Gaming 5', 'Keyboards Gaming 5', 'Keyboards Gaming 5', '8805599033', 'Keyboards Gaming 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 398.00, 208.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1257, 'الكيبوردات 6', 'الكيبوردات 6', 'الكيبوردات 6', 'Keyboards Gaming 6', 'Keyboards Gaming 6', 'Keyboards Gaming 6', '7105654245', 'Keyboards Gaming 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 493.00, 93.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1258, 'الكيبوردات 7', 'الكيبوردات 7', 'الكيبوردات 7', 'Keyboards Gaming 7', 'Keyboards Gaming 7', 'Keyboards Gaming 7', '1213178297', 'Keyboards Gaming 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 387.00, 352.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1259, 'الكيبوردات 8', 'الكيبوردات 8', 'الكيبوردات 8', 'Keyboards Gaming 8', 'Keyboards Gaming 8', 'Keyboards Gaming 8', '4837488247', 'Keyboards Gaming 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 340.00, 369.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1260, 'الكيبوردات 9', 'الكيبوردات 9', 'الكيبوردات 9', 'Keyboards Gaming 9', 'Keyboards Gaming 9', 'Keyboards Gaming 9', '2045276948', 'Keyboards Gaming 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 297.00, 198.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1261, 'الكيبوردات 10', 'الكيبوردات 10', 'الكيبوردات 10', 'Keyboards Gaming 10', 'Keyboards Gaming 10', 'Keyboards Gaming 10', '6494142037', 'Keyboards Gaming 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 301.00, 138.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1262, 'الكيبوردات 11', 'الكيبوردات 11', 'الكيبوردات 11', 'Keyboards Gaming 11', 'Keyboards Gaming 11', 'Keyboards Gaming 11', '3413384338', 'Keyboards Gaming 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 483.00, 358.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1263, 'الكيبوردات 12', 'الكيبوردات 12', 'الكيبوردات 12', 'Keyboards Gaming 12', 'Keyboards Gaming 12', 'Keyboards Gaming 12', '5970869471', 'Keyboards Gaming 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 199.00, 153.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1264, 'الكيبوردات 13', 'الكيبوردات 13', 'الكيبوردات 13', 'Keyboards Gaming 13', 'Keyboards Gaming 13', 'Keyboards Gaming 13', '6419278280', 'Keyboards Gaming 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 434.00, 134.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1265, 'الكيبوردات 14', 'الكيبوردات 14', 'الكيبوردات 14', 'Keyboards Gaming 14', 'Keyboards Gaming 14', 'Keyboards Gaming 14', '8573977428', 'Keyboards Gaming 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 229.00, 335.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1266, 'الكيبوردات 15', 'الكيبوردات 15', 'الكيبوردات 15', 'Keyboards Gaming 15', 'Keyboards Gaming 15', 'Keyboards Gaming 15', '6917599539', 'Keyboards Gaming 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 250.00, 99.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1267, 'الكيبوردات 16', 'الكيبوردات 16', 'الكيبوردات 16', 'Keyboards Gaming 16', 'Keyboards Gaming 16', 'Keyboards Gaming 16', '5155940731', 'Keyboards Gaming 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 404.00, 155.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1268, 'الكيبوردات 17', 'الكيبوردات 17', 'الكيبوردات 17', 'Keyboards Gaming 17', 'Keyboards Gaming 17', 'Keyboards Gaming 17', '3822450932', 'Keyboards Gaming 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 469.00, 59.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1269, 'الكيبوردات 18', 'الكيبوردات 18', 'الكيبوردات 18', 'Keyboards Gaming 18', 'Keyboards Gaming 18', 'Keyboards Gaming 18', '6201161983', 'Keyboards Gaming 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 154.00, 148.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1270, 'الكيبوردات 19', 'الكيبوردات 19', 'الكيبوردات 19', 'Keyboards Gaming 19', 'Keyboards Gaming 19', 'Keyboards Gaming 19', '9554055259', 'Keyboards Gaming 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 245.00, 65.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1271, 'الكيبوردات 20', 'الكيبوردات 20', 'الكيبوردات 20', 'Keyboards Gaming 20', 'Keyboards Gaming 20', 'Keyboards Gaming 20', '3685793966', 'Keyboards Gaming 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 329.00, 282.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1272, 'الكيبوردات 21', 'الكيبوردات 21', 'الكيبوردات 21', 'Keyboards Gaming 21', 'Keyboards Gaming 21', 'Keyboards Gaming 21', '6075338497', 'Keyboards Gaming 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 149.00, 232.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1273, 'الكيبوردات 22', 'الكيبوردات 22', 'الكيبوردات 22', 'Keyboards Gaming 22', 'Keyboards Gaming 22', 'Keyboards Gaming 22', '4654546733', 'Keyboards Gaming 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 298.00, 353.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1274, 'الكيبوردات 23', 'الكيبوردات 23', 'الكيبوردات 23', 'Keyboards Gaming 23', 'Keyboards Gaming 23', 'Keyboards Gaming 23', '9369161590', 'Keyboards Gaming 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 268.00, 141.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1275, 'الكيبوردات 24', 'الكيبوردات 24', 'الكيبوردات 24', 'Keyboards Gaming 24', 'Keyboards Gaming 24', 'Keyboards Gaming 24', '6035004428', 'Keyboards Gaming 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 311.00, 154.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1276, 'الكيبوردات 25', 'الكيبوردات 25', 'الكيبوردات 25', 'Keyboards Gaming 25', 'Keyboards Gaming 25', 'Keyboards Gaming 25', '6095103470', 'Keyboards Gaming 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 134.00, 306.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1277, 'الكيبوردات 26', 'الكيبوردات 26', 'الكيبوردات 26', 'Keyboards Gaming 26', 'Keyboards Gaming 26', 'Keyboards Gaming 26', '1602838934', 'Keyboards Gaming 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 436.00, 121.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1278, 'الكيبوردات 27', 'الكيبوردات 27', 'الكيبوردات 27', 'Keyboards Gaming 27', 'Keyboards Gaming 27', 'Keyboards Gaming 27', '3747918094', 'Keyboards Gaming 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 390.00, 242.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1279, 'الكيبوردات 28', 'الكيبوردات 28', 'الكيبوردات 28', 'Keyboards Gaming 28', 'Keyboards Gaming 28', 'Keyboards Gaming 28', '1827125755', 'Keyboards Gaming 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 237.00, 216.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1280, 'الكيبوردات 29', 'الكيبوردات 29', 'الكيبوردات 29', 'Keyboards Gaming 29', 'Keyboards Gaming 29', 'Keyboards Gaming 29', '5212822577', 'Keyboards Gaming 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 356.00, 96.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1281, 'الكيبوردات 30', 'الكيبوردات 30', 'الكيبوردات 30', 'Keyboards Gaming 30', 'Keyboards Gaming 30', 'Keyboards Gaming 30', '1850984360', 'Keyboards Gaming 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 232.00, 99.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1282, 'الكيبوردات 31', 'الكيبوردات 31', 'الكيبوردات 31', 'Keyboards Gaming 31', 'Keyboards Gaming 31', 'Keyboards Gaming 31', '2102729005', 'Keyboards Gaming 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 319.00, 161.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1283, 'الكيبوردات 32', 'الكيبوردات 32', 'الكيبوردات 32', 'Keyboards Gaming 32', 'Keyboards Gaming 32', 'Keyboards Gaming 32', '9007657260', 'Keyboards Gaming 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 243.00, 135.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1284, 'الكيبوردات 33', 'الكيبوردات 33', 'الكيبوردات 33', 'Keyboards Gaming 33', 'Keyboards Gaming 33', 'Keyboards Gaming 33', '976119423', 'Keyboards Gaming 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 265.00, 99.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1285, 'الكيبوردات 34', 'الكيبوردات 34', 'الكيبوردات 34', 'Keyboards Gaming 34', 'Keyboards Gaming 34', 'Keyboards Gaming 34', '6275421265', 'Keyboards Gaming 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 205.00, 291.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1286, 'الكيبوردات 35', 'الكيبوردات 35', 'الكيبوردات 35', 'Keyboards Gaming 35', 'Keyboards Gaming 35', 'Keyboards Gaming 35', '835205402', 'Keyboards Gaming 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 343.00, 309.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1287, 'الكيبوردات 36', 'الكيبوردات 36', 'الكيبوردات 36', 'Keyboards Gaming 36', 'Keyboards Gaming 36', 'Keyboards Gaming 36', '8143214823', 'Keyboards Gaming 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 152.00, 367.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1288, 'الكيبوردات 37', 'الكيبوردات 37', 'الكيبوردات 37', 'Keyboards Gaming 37', 'Keyboards Gaming 37', 'Keyboards Gaming 37', '5587740876', 'Keyboards Gaming 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 446.00, 135.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1289, 'الكيبوردات 38', 'الكيبوردات 38', 'الكيبوردات 38', 'Keyboards Gaming 38', 'Keyboards Gaming 38', 'Keyboards Gaming 38', '7825854108', 'Keyboards Gaming 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 212.00, 174.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1290, 'الكيبوردات 39', 'الكيبوردات 39', 'الكيبوردات 39', 'Keyboards Gaming 39', 'Keyboards Gaming 39', 'Keyboards Gaming 39', '6850473120', 'Keyboards Gaming 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 145.00, 310.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1291, 'الكيبوردات 40', 'الكيبوردات 40', 'الكيبوردات 40', 'Keyboards Gaming 40', 'Keyboards Gaming 40', 'Keyboards Gaming 40', '3449113371', 'Keyboards Gaming 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 196.00, 71.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1292, 'الكيبوردات 41', 'الكيبوردات 41', 'الكيبوردات 41', 'Keyboards Gaming 41', 'Keyboards Gaming 41', 'Keyboards Gaming 41', '7334024349', 'Keyboards Gaming 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 188.00, 180.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1293, 'الكيبوردات 42', 'الكيبوردات 42', 'الكيبوردات 42', 'Keyboards Gaming 42', 'Keyboards Gaming 42', 'Keyboards Gaming 42', '6459256336', 'Keyboards Gaming 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 146.00, 108.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1294, 'الكيبوردات 43', 'الكيبوردات 43', 'الكيبوردات 43', 'Keyboards Gaming 43', 'Keyboards Gaming 43', 'Keyboards Gaming 43', '8222303520', 'Keyboards Gaming 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 471.00, 163.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1295, 'الكيبوردات 44', 'الكيبوردات 44', 'الكيبوردات 44', 'Keyboards Gaming 44', 'Keyboards Gaming 44', 'Keyboards Gaming 44', '9835977359', 'Keyboards Gaming 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 467.00, 201.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1296, 'الكيبوردات 45', 'الكيبوردات 45', 'الكيبوردات 45', 'Keyboards Gaming 45', 'Keyboards Gaming 45', 'Keyboards Gaming 45', '6994368887', 'Keyboards Gaming 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 212.00, 384.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1297, 'الكيبوردات 46', 'الكيبوردات 46', 'الكيبوردات 46', 'Keyboards Gaming 46', 'Keyboards Gaming 46', 'Keyboards Gaming 46', '1672835575', 'Keyboards Gaming 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 116.00, 218.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1298, 'الكيبوردات 47', 'الكيبوردات 47', 'الكيبوردات 47', 'Keyboards Gaming 47', 'Keyboards Gaming 47', 'Keyboards Gaming 47', '940537753', 'Keyboards Gaming 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 424.00, 392.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1299, 'الكيبوردات 48', 'الكيبوردات 48', 'الكيبوردات 48', 'Keyboards Gaming 48', 'Keyboards Gaming 48', 'Keyboards Gaming 48', '4103340139', 'Keyboards Gaming 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 152.00, 264.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1300, 'الكيبوردات 49', 'الكيبوردات 49', 'الكيبوردات 49', 'Keyboards Gaming 49', 'Keyboards Gaming 49', 'Keyboards Gaming 49', '5542922245', 'Keyboards Gaming 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 314.00, 148.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1301, 'الماوسات 0', 'الماوسات 0', 'الماوسات 0', 'Mouses gaming 0', 'Mouses gaming 0', 'Mouses gaming 0', '660860990', 'Mouses gaming 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 467.00, 180.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1302, 'الماوسات 1', 'الماوسات 1', 'الماوسات 1', 'Mouses gaming 1', 'Mouses gaming 1', 'Mouses gaming 1', '5880090929', 'Mouses gaming 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 406.00, 79.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1303, 'الماوسات 2', 'الماوسات 2', 'الماوسات 2', 'Mouses gaming 2', 'Mouses gaming 2', 'Mouses gaming 2', '2567845892', 'Mouses gaming 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 282.00, 61.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1304, 'الماوسات 3', 'الماوسات 3', 'الماوسات 3', 'Mouses gaming 3', 'Mouses gaming 3', 'Mouses gaming 3', '2096902011', 'Mouses gaming 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 381.00, 152.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1305, 'الماوسات 4', 'الماوسات 4', 'الماوسات 4', 'Mouses gaming 4', 'Mouses gaming 4', 'Mouses gaming 4', '4350316420', 'Mouses gaming 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 111.00, 156.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1306, 'الماوسات 5', 'الماوسات 5', 'الماوسات 5', 'Mouses gaming 5', 'Mouses gaming 5', 'Mouses gaming 5', '3744861190', 'Mouses gaming 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 441.00, 270.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1307, 'الماوسات 6', 'الماوسات 6', 'الماوسات 6', 'Mouses gaming 6', 'Mouses gaming 6', 'Mouses gaming 6', '3589401349', 'Mouses gaming 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 361.00, 260.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1308, 'الماوسات 7', 'الماوسات 7', 'الماوسات 7', 'Mouses gaming 7', 'Mouses gaming 7', 'Mouses gaming 7', '9023043989', 'Mouses gaming 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 386.00, 181.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1309, 'الماوسات 8', 'الماوسات 8', 'الماوسات 8', 'Mouses gaming 8', 'Mouses gaming 8', 'Mouses gaming 8', '3779153746', 'Mouses gaming 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 385.00, 289.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1310, 'الماوسات 9', 'الماوسات 9', 'الماوسات 9', 'Mouses gaming 9', 'Mouses gaming 9', 'Mouses gaming 9', '7346471832', 'Mouses gaming 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 465.00, 372.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1311, 'الماوسات 10', 'الماوسات 10', 'الماوسات 10', 'Mouses gaming 10', 'Mouses gaming 10', 'Mouses gaming 10', '4542157714', 'Mouses gaming 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 171.00, 255.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1312, 'الماوسات 11', 'الماوسات 11', 'الماوسات 11', 'Mouses gaming 11', 'Mouses gaming 11', 'Mouses gaming 11', '2394551448', 'Mouses gaming 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 318.00, 143.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1313, 'الماوسات 12', 'الماوسات 12', 'الماوسات 12', 'Mouses gaming 12', 'Mouses gaming 12', 'Mouses gaming 12', '9811941866', 'Mouses gaming 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 327.00, 250.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1314, 'الماوسات 13', 'الماوسات 13', 'الماوسات 13', 'Mouses gaming 13', 'Mouses gaming 13', 'Mouses gaming 13', '4243348144', 'Mouses gaming 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 213.00, 204.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1315, 'الماوسات 14', 'الماوسات 14', 'الماوسات 14', 'Mouses gaming 14', 'Mouses gaming 14', 'Mouses gaming 14', '6368968809', 'Mouses gaming 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 229.00, 318.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1316, 'الماوسات 15', 'الماوسات 15', 'الماوسات 15', 'Mouses gaming 15', 'Mouses gaming 15', 'Mouses gaming 15', '6039162727', 'Mouses gaming 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 207.00, 181.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1317, 'الماوسات 16', 'الماوسات 16', 'الماوسات 16', 'Mouses gaming 16', 'Mouses gaming 16', 'Mouses gaming 16', '7076242207', 'Mouses gaming 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 167.00, 126.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1318, 'الماوسات 17', 'الماوسات 17', 'الماوسات 17', 'Mouses gaming 17', 'Mouses gaming 17', 'Mouses gaming 17', '4333057740', 'Mouses gaming 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 392.00, 262.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1319, 'الماوسات 18', 'الماوسات 18', 'الماوسات 18', 'Mouses gaming 18', 'Mouses gaming 18', 'Mouses gaming 18', '9473737861', 'Mouses gaming 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 358.00, 276.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1320, 'الماوسات 19', 'الماوسات 19', 'الماوسات 19', 'Mouses gaming 19', 'Mouses gaming 19', 'Mouses gaming 19', '5005664007', 'Mouses gaming 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 399.00, 245.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1321, 'الماوسات 20', 'الماوسات 20', 'الماوسات 20', 'Mouses gaming 20', 'Mouses gaming 20', 'Mouses gaming 20', '6714029923', 'Mouses gaming 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 473.00, 282.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1322, 'الماوسات 21', 'الماوسات 21', 'الماوسات 21', 'Mouses gaming 21', 'Mouses gaming 21', 'Mouses gaming 21', '3427618799', 'Mouses gaming 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 396.00, 194.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1323, 'الماوسات 22', 'الماوسات 22', 'الماوسات 22', 'Mouses gaming 22', 'Mouses gaming 22', 'Mouses gaming 22', '2824607727', 'Mouses gaming 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 234.00, 156.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1324, 'الماوسات 23', 'الماوسات 23', 'الماوسات 23', 'Mouses gaming 23', 'Mouses gaming 23', 'Mouses gaming 23', '4896475958', 'Mouses gaming 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 242.00, 207.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1325, 'الماوسات 24', 'الماوسات 24', 'الماوسات 24', 'Mouses gaming 24', 'Mouses gaming 24', 'Mouses gaming 24', '6811720960', 'Mouses gaming 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 358.00, 298.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1326, 'الماوسات 25', 'الماوسات 25', 'الماوسات 25', 'Mouses gaming 25', 'Mouses gaming 25', 'Mouses gaming 25', '6728770765', 'Mouses gaming 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 122.00, 271.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1327, 'الماوسات 26', 'الماوسات 26', 'الماوسات 26', 'Mouses gaming 26', 'Mouses gaming 26', 'Mouses gaming 26', '9707124044', 'Mouses gaming 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 208.00, 75.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1328, 'الماوسات 27', 'الماوسات 27', 'الماوسات 27', 'Mouses gaming 27', 'Mouses gaming 27', 'Mouses gaming 27', '7149674202', 'Mouses gaming 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 322.00, 284.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1329, 'الماوسات 28', 'الماوسات 28', 'الماوسات 28', 'Mouses gaming 28', 'Mouses gaming 28', 'Mouses gaming 28', '1981203356', 'Mouses gaming 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 264.00, 271.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1330, 'الماوسات 29', 'الماوسات 29', 'الماوسات 29', 'Mouses gaming 29', 'Mouses gaming 29', 'Mouses gaming 29', '5510835493', 'Mouses gaming 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 380.00, 333.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1331, 'الماوسات 30', 'الماوسات 30', 'الماوسات 30', 'Mouses gaming 30', 'Mouses gaming 30', 'Mouses gaming 30', '1685524783', 'Mouses gaming 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 136.00, 85.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1332, 'الماوسات 31', 'الماوسات 31', 'الماوسات 31', 'Mouses gaming 31', 'Mouses gaming 31', 'Mouses gaming 31', '6547898673', 'Mouses gaming 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 443.00, 294.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1333, 'الماوسات 32', 'الماوسات 32', 'الماوسات 32', 'Mouses gaming 32', 'Mouses gaming 32', 'Mouses gaming 32', '156281272', 'Mouses gaming 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 133.00, 78.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1334, 'الماوسات 33', 'الماوسات 33', 'الماوسات 33', 'Mouses gaming 33', 'Mouses gaming 33', 'Mouses gaming 33', '8762637218', 'Mouses gaming 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 159.00, 123.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1335, 'الماوسات 34', 'الماوسات 34', 'الماوسات 34', 'Mouses gaming 34', 'Mouses gaming 34', 'Mouses gaming 34', '8101966770', 'Mouses gaming 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 486.00, 209.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1336, 'الماوسات 35', 'الماوسات 35', 'الماوسات 35', 'Mouses gaming 35', 'Mouses gaming 35', 'Mouses gaming 35', '8118497855', 'Mouses gaming 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 328.00, 292.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1337, 'الماوسات 36', 'الماوسات 36', 'الماوسات 36', 'Mouses gaming 36', 'Mouses gaming 36', 'Mouses gaming 36', '6107235449', 'Mouses gaming 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 146.00, 394.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1338, 'الماوسات 37', 'الماوسات 37', 'الماوسات 37', 'Mouses gaming 37', 'Mouses gaming 37', 'Mouses gaming 37', '7179824615', 'Mouses gaming 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 292.00, 217.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1339, 'الماوسات 38', 'الماوسات 38', 'الماوسات 38', 'Mouses gaming 38', 'Mouses gaming 38', 'Mouses gaming 38', '5199274316', 'Mouses gaming 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 190.00, 218.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1340, 'الماوسات 39', 'الماوسات 39', 'الماوسات 39', 'Mouses gaming 39', 'Mouses gaming 39', 'Mouses gaming 39', '8278701526', 'Mouses gaming 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 487.00, 282.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1341, 'الماوسات 40', 'الماوسات 40', 'الماوسات 40', 'Mouses gaming 40', 'Mouses gaming 40', 'Mouses gaming 40', '3413942479', 'Mouses gaming 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 456.00, 264.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1342, 'الماوسات 41', 'الماوسات 41', 'الماوسات 41', 'Mouses gaming 41', 'Mouses gaming 41', 'Mouses gaming 41', '4522460941', 'Mouses gaming 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 350.00, 150.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1343, 'الماوسات 42', 'الماوسات 42', 'الماوسات 42', 'Mouses gaming 42', 'Mouses gaming 42', 'Mouses gaming 42', '4438147836', 'Mouses gaming 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 420.00, 200.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1344, 'الماوسات 43', 'الماوسات 43', 'الماوسات 43', 'Mouses gaming 43', 'Mouses gaming 43', 'Mouses gaming 43', '3371463336', 'Mouses gaming 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 168.00, 328.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1345, 'الماوسات 44', 'الماوسات 44', 'الماوسات 44', 'Mouses gaming 44', 'Mouses gaming 44', 'Mouses gaming 44', '831996796', 'Mouses gaming 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 192.00, 60.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1346, 'الماوسات 45', 'الماوسات 45', 'الماوسات 45', 'Mouses gaming 45', 'Mouses gaming 45', 'Mouses gaming 45', '9206385352', 'Mouses gaming 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 103.00, 237.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1347, 'الماوسات 46', 'الماوسات 46', 'الماوسات 46', 'Mouses gaming 46', 'Mouses gaming 46', 'Mouses gaming 46', '2825087774', 'Mouses gaming 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 172.00, 217.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1348, 'الماوسات 47', 'الماوسات 47', 'الماوسات 47', 'Mouses gaming 47', 'Mouses gaming 47', 'Mouses gaming 47', '2934232305', 'Mouses gaming 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 272.00, 361.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1349, 'الماوسات 48', 'الماوسات 48', 'الماوسات 48', 'Mouses gaming 48', 'Mouses gaming 48', 'Mouses gaming 48', '7197720486', 'Mouses gaming 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 121.00, 370.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1350, 'الماوسات 49', 'الماوسات 49', 'الماوسات 49', 'Mouses gaming 49', 'Mouses gaming 49', 'Mouses gaming 49', '5716587720', 'Mouses gaming 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 447.00, 260.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1351, 'الماوسباد 0', 'الماوسباد 0', 'الماوسباد 0', 'Mousepad 0', 'Mousepad 0', 'Mousepad 0', '4441800734', 'Mousepad 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 127.00, 165.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1352, 'الماوسباد 1', 'الماوسباد 1', 'الماوسباد 1', 'Mousepad 1', 'Mousepad 1', 'Mousepad 1', '5607081495', 'Mousepad 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 243.00, 145.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1353, 'الماوسباد 2', 'الماوسباد 2', 'الماوسباد 2', 'Mousepad 2', 'Mousepad 2', 'Mousepad 2', '1501520955', 'Mousepad 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 107.00, 113.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1354, 'الماوسباد 3', 'الماوسباد 3', 'الماوسباد 3', 'Mousepad 3', 'Mousepad 3', 'Mousepad 3', '8101378556', 'Mousepad 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 357.00, 304.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1355, 'الماوسباد 4', 'الماوسباد 4', 'الماوسباد 4', 'Mousepad 4', 'Mousepad 4', 'Mousepad 4', '5001475821', 'Mousepad 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 366.00, 309.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1356, 'الماوسباد 5', 'الماوسباد 5', 'الماوسباد 5', 'Mousepad 5', 'Mousepad 5', 'Mousepad 5', '4130533870', 'Mousepad 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 313.00, 98.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1357, 'الماوسباد 6', 'الماوسباد 6', 'الماوسباد 6', 'Mousepad 6', 'Mousepad 6', 'Mousepad 6', '4567171430', 'Mousepad 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 237.00, 302.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1358, 'الماوسباد 7', 'الماوسباد 7', 'الماوسباد 7', 'Mousepad 7', 'Mousepad 7', 'Mousepad 7', '9677423535', 'Mousepad 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 269.00, 58.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1359, 'الماوسباد 8', 'الماوسباد 8', 'الماوسباد 8', 'Mousepad 8', 'Mousepad 8', 'Mousepad 8', '8023648398', 'Mousepad 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 498.00, 306.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1360, 'الماوسباد 9', 'الماوسباد 9', 'الماوسباد 9', 'Mousepad 9', 'Mousepad 9', 'Mousepad 9', '8884330925', 'Mousepad 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 485.00, 349.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1361, 'الماوسباد 10', 'الماوسباد 10', 'الماوسباد 10', 'Mousepad 10', 'Mousepad 10', 'Mousepad 10', '4092967546', 'Mousepad 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 291.00, 95.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1362, 'الماوسباد 11', 'الماوسباد 11', 'الماوسباد 11', 'Mousepad 11', 'Mousepad 11', 'Mousepad 11', '8207327500', 'Mousepad 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 101.00, 399.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1363, 'الماوسباد 12', 'الماوسباد 12', 'الماوسباد 12', 'Mousepad 12', 'Mousepad 12', 'Mousepad 12', '1667846636', 'Mousepad 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 459.00, 80.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1364, 'الماوسباد 13', 'الماوسباد 13', 'الماوسباد 13', 'Mousepad 13', 'Mousepad 13', 'Mousepad 13', '7687023603', 'Mousepad 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 261.00, 278.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1365, 'الماوسباد 14', 'الماوسباد 14', 'الماوسباد 14', 'Mousepad 14', 'Mousepad 14', 'Mousepad 14', '8247500887', 'Mousepad 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 468.00, 78.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1366, 'الماوسباد 15', 'الماوسباد 15', 'الماوسباد 15', 'Mousepad 15', 'Mousepad 15', 'Mousepad 15', '9512719992', 'Mousepad 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 479.00, 201.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1367, 'الماوسباد 16', 'الماوسباد 16', 'الماوسباد 16', 'Mousepad 16', 'Mousepad 16', 'Mousepad 16', '9552168426', 'Mousepad 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 237.00, 393.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1368, 'الماوسباد 17', 'الماوسباد 17', 'الماوسباد 17', 'Mousepad 17', 'Mousepad 17', 'Mousepad 17', '8495683320', 'Mousepad 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 348.00, 227.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1369, 'الماوسباد 18', 'الماوسباد 18', 'الماوسباد 18', 'Mousepad 18', 'Mousepad 18', 'Mousepad 18', '2831758666', 'Mousepad 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 219.00, 193.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1370, 'الماوسباد 19', 'الماوسباد 19', 'الماوسباد 19', 'Mousepad 19', 'Mousepad 19', 'Mousepad 19', '7381427150', 'Mousepad 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 179.00, 358.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1371, 'الماوسباد 20', 'الماوسباد 20', 'الماوسباد 20', 'Mousepad 20', 'Mousepad 20', 'Mousepad 20', '4270699304', 'Mousepad 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 324.00, 269.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1372, 'الماوسباد 21', 'الماوسباد 21', 'الماوسباد 21', 'Mousepad 21', 'Mousepad 21', 'Mousepad 21', '929815188', 'Mousepad 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 440.00, 323.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1373, 'الماوسباد 22', 'الماوسباد 22', 'الماوسباد 22', 'Mousepad 22', 'Mousepad 22', 'Mousepad 22', '8910950201', 'Mousepad 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 179.00, 361.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1374, 'الماوسباد 23', 'الماوسباد 23', 'الماوسباد 23', 'Mousepad 23', 'Mousepad 23', 'Mousepad 23', '5398680267', 'Mousepad 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 330.00, 298.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1375, 'الماوسباد 24', 'الماوسباد 24', 'الماوسباد 24', 'Mousepad 24', 'Mousepad 24', 'Mousepad 24', '5363458917', 'Mousepad 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 237.00, 317.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1376, 'الماوسباد 25', 'الماوسباد 25', 'الماوسباد 25', 'Mousepad 25', 'Mousepad 25', 'Mousepad 25', '9300503452', 'Mousepad 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 460.00, 316.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1377, 'الماوسباد 26', 'الماوسباد 26', 'الماوسباد 26', 'Mousepad 26', 'Mousepad 26', 'Mousepad 26', '3790690972', 'Mousepad 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 294.00, 264.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1378, 'الماوسباد 27', 'الماوسباد 27', 'الماوسباد 27', 'Mousepad 27', 'Mousepad 27', 'Mousepad 27', '8880959201', 'Mousepad 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 410.00, 301.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1379, 'الماوسباد 28', 'الماوسباد 28', 'الماوسباد 28', 'Mousepad 28', 'Mousepad 28', 'Mousepad 28', '9828001979', 'Mousepad 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 496.00, 183.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1380, 'الماوسباد 29', 'الماوسباد 29', 'الماوسباد 29', 'Mousepad 29', 'Mousepad 29', 'Mousepad 29', '5423791798', 'Mousepad 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 328.00, 251.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1381, 'الماوسباد 30', 'الماوسباد 30', 'الماوسباد 30', 'Mousepad 30', 'Mousepad 30', 'Mousepad 30', '2969731397', 'Mousepad 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 172.00, 386.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1382, 'الماوسباد 31', 'الماوسباد 31', 'الماوسباد 31', 'Mousepad 31', 'Mousepad 31', 'Mousepad 31', '8126223262', 'Mousepad 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 310.00, 305.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1383, 'الماوسباد 32', 'الماوسباد 32', 'الماوسباد 32', 'Mousepad 32', 'Mousepad 32', 'Mousepad 32', '248566976', 'Mousepad 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 465.00, 287.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1384, 'الماوسباد 33', 'الماوسباد 33', 'الماوسباد 33', 'Mousepad 33', 'Mousepad 33', 'Mousepad 33', '8373564868', 'Mousepad 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 147.00, 185.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1385, 'الماوسباد 34', 'الماوسباد 34', 'الماوسباد 34', 'Mousepad 34', 'Mousepad 34', 'Mousepad 34', '9750242928', 'Mousepad 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 332.00, 196.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1386, 'الماوسباد 35', 'الماوسباد 35', 'الماوسباد 35', 'Mousepad 35', 'Mousepad 35', 'Mousepad 35', '7522976235', 'Mousepad 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 162.00, 78.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1387, 'الماوسباد 36', 'الماوسباد 36', 'الماوسباد 36', 'Mousepad 36', 'Mousepad 36', 'Mousepad 36', '4863782649', 'Mousepad 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 377.00, 156.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1388, 'الماوسباد 37', 'الماوسباد 37', 'الماوسباد 37', 'Mousepad 37', 'Mousepad 37', 'Mousepad 37', '814176347', 'Mousepad 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 260.00, 326.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1389, 'الماوسباد 38', 'الماوسباد 38', 'الماوسباد 38', 'Mousepad 38', 'Mousepad 38', 'Mousepad 38', '3840861378', 'Mousepad 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 310.00, 172.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1390, 'الماوسباد 39', 'الماوسباد 39', 'الماوسباد 39', 'Mousepad 39', 'Mousepad 39', 'Mousepad 39', '3616672980', 'Mousepad 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 247.00, 351.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1391, 'الماوسباد 40', 'الماوسباد 40', 'الماوسباد 40', 'Mousepad 40', 'Mousepad 40', 'Mousepad 40', '1214380121', 'Mousepad 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 262.00, 289.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1392, 'الماوسباد 41', 'الماوسباد 41', 'الماوسباد 41', 'Mousepad 41', 'Mousepad 41', 'Mousepad 41', '7386239387', 'Mousepad 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 120.00, 101.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1393, 'الماوسباد 42', 'الماوسباد 42', 'الماوسباد 42', 'Mousepad 42', 'Mousepad 42', 'Mousepad 42', '2855962440', 'Mousepad 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 245.00, 179.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1394, 'الماوسباد 43', 'الماوسباد 43', 'الماوسباد 43', 'Mousepad 43', 'Mousepad 43', 'Mousepad 43', '9180836941', 'Mousepad 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 448.00, 320.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1395, 'الماوسباد 44', 'الماوسباد 44', 'الماوسباد 44', 'Mousepad 44', 'Mousepad 44', 'Mousepad 44', '4643745446', 'Mousepad 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 455.00, 91.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1396, 'الماوسباد 45', 'الماوسباد 45', 'الماوسباد 45', 'Mousepad 45', 'Mousepad 45', 'Mousepad 45', '891590402', 'Mousepad 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 332.00, 180.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1397, 'الماوسباد 46', 'الماوسباد 46', 'الماوسباد 46', 'Mousepad 46', 'Mousepad 46', 'Mousepad 46', '4735806888', 'Mousepad 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 449.00, 290.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1398, 'الماوسباد 47', 'الماوسباد 47', 'الماوسباد 47', 'Mousepad 47', 'Mousepad 47', 'Mousepad 47', '6645489844', 'Mousepad 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 499.00, 106.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1399, 'الماوسباد 48', 'الماوسباد 48', 'الماوسباد 48', 'Mousepad 48', 'Mousepad 48', 'Mousepad 48', '9720607656', 'Mousepad 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 313.00, 181.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1400, 'الماوسباد 49', 'الماوسباد 49', 'الماوسباد 49', 'Mousepad 49', 'Mousepad 49', 'Mousepad 49', '5540349951', 'Mousepad 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 240.00, 317.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1401, 'مايكات احترافية 0', 'مايكات احترافية 0', 'مايكات احترافية 0', 'Professional Mics 0', 'Professional Mics 0', 'Professional Mics 0', '7705837254', 'Professional Mics 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 250.00, 76.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1402, 'مايكات احترافية 1', 'مايكات احترافية 1', 'مايكات احترافية 1', 'Professional Mics 1', 'Professional Mics 1', 'Professional Mics 1', '4927978853', 'Professional Mics 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 495.00, 80.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1403, 'مايكات احترافية 2', 'مايكات احترافية 2', 'مايكات احترافية 2', 'Professional Mics 2', 'Professional Mics 2', 'Professional Mics 2', '7349334588', 'Professional Mics 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 473.00, 391.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1404, 'مايكات احترافية 3', 'مايكات احترافية 3', 'مايكات احترافية 3', 'Professional Mics 3', 'Professional Mics 3', 'Professional Mics 3', '2652451756', 'Professional Mics 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 168.00, 256.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1405, 'مايكات احترافية 4', 'مايكات احترافية 4', 'مايكات احترافية 4', 'Professional Mics 4', 'Professional Mics 4', 'Professional Mics 4', '8895588832', 'Professional Mics 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 163.00, 102.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1406, 'مايكات احترافية 5', 'مايكات احترافية 5', 'مايكات احترافية 5', 'Professional Mics 5', 'Professional Mics 5', 'Professional Mics 5', '512850374', 'Professional Mics 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 240.00, 86.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1407, 'مايكات احترافية 6', 'مايكات احترافية 6', 'مايكات احترافية 6', 'Professional Mics 6', 'Professional Mics 6', 'Professional Mics 6', '9461379026', 'Professional Mics 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 471.00, 384.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1408, 'مايكات احترافية 7', 'مايكات احترافية 7', 'مايكات احترافية 7', 'Professional Mics 7', 'Professional Mics 7', 'Professional Mics 7', '719194085', 'Professional Mics 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 407.00, 87.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1409, 'مايكات احترافية 8', 'مايكات احترافية 8', 'مايكات احترافية 8', 'Professional Mics 8', 'Professional Mics 8', 'Professional Mics 8', '8584541390', 'Professional Mics 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 398.00, 290.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1410, 'مايكات احترافية 9', 'مايكات احترافية 9', 'مايكات احترافية 9', 'Professional Mics 9', 'Professional Mics 9', 'Professional Mics 9', '7557443412', 'Professional Mics 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 457.00, 136.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1411, 'مايكات احترافية 10', 'مايكات احترافية 10', 'مايكات احترافية 10', 'Professional Mics 10', 'Professional Mics 10', 'Professional Mics 10', '7225553018', 'Professional Mics 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 448.00, 376.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1412, 'مايكات احترافية 11', 'مايكات احترافية 11', 'مايكات احترافية 11', 'Professional Mics 11', 'Professional Mics 11', 'Professional Mics 11', '7433750884', 'Professional Mics 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 425.00, 368.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1413, 'مايكات احترافية 12', 'مايكات احترافية 12', 'مايكات احترافية 12', 'Professional Mics 12', 'Professional Mics 12', 'Professional Mics 12', '5485609725', 'Professional Mics 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 109.00, 239.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1414, 'مايكات احترافية 13', 'مايكات احترافية 13', 'مايكات احترافية 13', 'Professional Mics 13', 'Professional Mics 13', 'Professional Mics 13', '7259737852', 'Professional Mics 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 225.00, 135.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1415, 'مايكات احترافية 14', 'مايكات احترافية 14', 'مايكات احترافية 14', 'Professional Mics 14', 'Professional Mics 14', 'Professional Mics 14', '9843947745', 'Professional Mics 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 394.00, 179.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1416, 'مايكات احترافية 15', 'مايكات احترافية 15', 'مايكات احترافية 15', 'Professional Mics 15', 'Professional Mics 15', 'Professional Mics 15', '3892591522', 'Professional Mics 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 109.00, 133.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1417, 'مايكات احترافية 16', 'مايكات احترافية 16', 'مايكات احترافية 16', 'Professional Mics 16', 'Professional Mics 16', 'Professional Mics 16', '4320586338', 'Professional Mics 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 185.00, 270.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1418, 'مايكات احترافية 17', 'مايكات احترافية 17', 'مايكات احترافية 17', 'Professional Mics 17', 'Professional Mics 17', 'Professional Mics 17', '4597373845', 'Professional Mics 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 349.00, 143.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1419, 'مايكات احترافية 18', 'مايكات احترافية 18', 'مايكات احترافية 18', 'Professional Mics 18', 'Professional Mics 18', 'Professional Mics 18', '1512223077', 'Professional Mics 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 350.00, 168.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1420, 'مايكات احترافية 19', 'مايكات احترافية 19', 'مايكات احترافية 19', 'Professional Mics 19', 'Professional Mics 19', 'Professional Mics 19', '545049907', 'Professional Mics 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 189.00, 210.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1421, 'مايكات احترافية 20', 'مايكات احترافية 20', 'مايكات احترافية 20', 'Professional Mics 20', 'Professional Mics 20', 'Professional Mics 20', '7117618332', 'Professional Mics 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 304.00, 225.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1422, 'مايكات احترافية 21', 'مايكات احترافية 21', 'مايكات احترافية 21', 'Professional Mics 21', 'Professional Mics 21', 'Professional Mics 21', '7828465119', 'Professional Mics 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 163.00, 266.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1423, 'مايكات احترافية 22', 'مايكات احترافية 22', 'مايكات احترافية 22', 'Professional Mics 22', 'Professional Mics 22', 'Professional Mics 22', '2234662899', 'Professional Mics 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 370.00, 229.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1424, 'مايكات احترافية 23', 'مايكات احترافية 23', 'مايكات احترافية 23', 'Professional Mics 23', 'Professional Mics 23', 'Professional Mics 23', '7251080090', 'Professional Mics 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 257.00, 159.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1425, 'مايكات احترافية 24', 'مايكات احترافية 24', 'مايكات احترافية 24', 'Professional Mics 24', 'Professional Mics 24', 'Professional Mics 24', '5884090339', 'Professional Mics 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 177.00, 261.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1426, 'مايكات احترافية 25', 'مايكات احترافية 25', 'مايكات احترافية 25', 'Professional Mics 25', 'Professional Mics 25', 'Professional Mics 25', '4081278785', 'Professional Mics 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 338.00, 108.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1427, 'مايكات احترافية 26', 'مايكات احترافية 26', 'مايكات احترافية 26', 'Professional Mics 26', 'Professional Mics 26', 'Professional Mics 26', '2066635250', 'Professional Mics 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 401.00, 101.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1428, 'مايكات احترافية 27', 'مايكات احترافية 27', 'مايكات احترافية 27', 'Professional Mics 27', 'Professional Mics 27', 'Professional Mics 27', '2234102275', 'Professional Mics 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 301.00, 213.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1429, 'مايكات احترافية 28', 'مايكات احترافية 28', 'مايكات احترافية 28', 'Professional Mics 28', 'Professional Mics 28', 'Professional Mics 28', '1694826107', 'Professional Mics 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 401.00, 375.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1430, 'مايكات احترافية 29', 'مايكات احترافية 29', 'مايكات احترافية 29', 'Professional Mics 29', 'Professional Mics 29', 'Professional Mics 29', '6578389412', 'Professional Mics 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 452.00, 275.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1431, 'مايكات احترافية 30', 'مايكات احترافية 30', 'مايكات احترافية 30', 'Professional Mics 30', 'Professional Mics 30', 'Professional Mics 30', '9742504707', 'Professional Mics 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 426.00, 121.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1432, 'مايكات احترافية 31', 'مايكات احترافية 31', 'مايكات احترافية 31', 'Professional Mics 31', 'Professional Mics 31', 'Professional Mics 31', '3604657692', 'Professional Mics 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 248.00, 249.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1433, 'مايكات احترافية 32', 'مايكات احترافية 32', 'مايكات احترافية 32', 'Professional Mics 32', 'Professional Mics 32', 'Professional Mics 32', '8257428580', 'Professional Mics 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 438.00, 93.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1434, 'مايكات احترافية 33', 'مايكات احترافية 33', 'مايكات احترافية 33', 'Professional Mics 33', 'Professional Mics 33', 'Professional Mics 33', '756219498', 'Professional Mics 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 345.00, 241.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1435, 'مايكات احترافية 34', 'مايكات احترافية 34', 'مايكات احترافية 34', 'Professional Mics 34', 'Professional Mics 34', 'Professional Mics 34', '3535969327', 'Professional Mics 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 133.00, 131.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1436, 'مايكات احترافية 35', 'مايكات احترافية 35', 'مايكات احترافية 35', 'Professional Mics 35', 'Professional Mics 35', 'Professional Mics 35', '3415571673', 'Professional Mics 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 175.00, 149.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1437, 'مايكات احترافية 36', 'مايكات احترافية 36', 'مايكات احترافية 36', 'Professional Mics 36', 'Professional Mics 36', 'Professional Mics 36', '168924406', 'Professional Mics 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 119.00, 75.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1438, 'مايكات احترافية 37', 'مايكات احترافية 37', 'مايكات احترافية 37', 'Professional Mics 37', 'Professional Mics 37', 'Professional Mics 37', '246563153', 'Professional Mics 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 100.00, 56.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1439, 'مايكات احترافية 38', 'مايكات احترافية 38', 'مايكات احترافية 38', 'Professional Mics 38', 'Professional Mics 38', 'Professional Mics 38', '2292198087', 'Professional Mics 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 200.00, 277.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1440, 'مايكات احترافية 39', 'مايكات احترافية 39', 'مايكات احترافية 39', 'Professional Mics 39', 'Professional Mics 39', 'Professional Mics 39', '1476261143', 'Professional Mics 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 124.00, 398.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1441, 'مايكات احترافية 40', 'مايكات احترافية 40', 'مايكات احترافية 40', 'Professional Mics 40', 'Professional Mics 40', 'Professional Mics 40', '310185217', 'Professional Mics 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 427.00, 73.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1442, 'مايكات احترافية 41', 'مايكات احترافية 41', 'مايكات احترافية 41', 'Professional Mics 41', 'Professional Mics 41', 'Professional Mics 41', '8853605245', 'Professional Mics 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 184.00, 250.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1443, 'مايكات احترافية 42', 'مايكات احترافية 42', 'مايكات احترافية 42', 'Professional Mics 42', 'Professional Mics 42', 'Professional Mics 42', '2821579296', 'Professional Mics 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 433.00, 60.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1444, 'مايكات احترافية 43', 'مايكات احترافية 43', 'مايكات احترافية 43', 'Professional Mics 43', 'Professional Mics 43', 'Professional Mics 43', '174073003', 'Professional Mics 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 323.00, 149.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1445, 'مايكات احترافية 44', 'مايكات احترافية 44', 'مايكات احترافية 44', 'Professional Mics 44', 'Professional Mics 44', 'Professional Mics 44', '3877567617', 'Professional Mics 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 498.00, 253.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1446, 'مايكات احترافية 45', 'مايكات احترافية 45', 'مايكات احترافية 45', 'Professional Mics 45', 'Professional Mics 45', 'Professional Mics 45', '3785728581', 'Professional Mics 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 106.00, 119.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1447, 'مايكات احترافية 46', 'مايكات احترافية 46', 'مايكات احترافية 46', 'Professional Mics 46', 'Professional Mics 46', 'Professional Mics 46', '9141265320', 'Professional Mics 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 476.00, 250.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1448, 'مايكات احترافية 47', 'مايكات احترافية 47', 'مايكات احترافية 47', 'Professional Mics 47', 'Professional Mics 47', 'Professional Mics 47', '3809696468', 'Professional Mics 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 140.00, 163.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1449, 'مايكات احترافية 48', 'مايكات احترافية 48', 'مايكات احترافية 48', 'Professional Mics 48', 'Professional Mics 48', 'Professional Mics 48', '9983359303', 'Professional Mics 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 451.00, 56.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1450, 'مايكات احترافية 49', 'مايكات احترافية 49', 'مايكات احترافية 49', 'Professional Mics 49', 'Professional Mics 49', 'Professional Mics 49', '8964892951', 'Professional Mics 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 104.00, 189.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1451, 'أكسسورات الستريم Elgato 0', 'أكسسورات الستريم Elgato 0', 'أكسسورات الستريم Elgato 0', 'Elgato stream accessories 0', 'Elgato stream accessories 0', 'Elgato stream accessories 0', '5073219378', 'Elgato stream accessories 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 111.00, 91.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1452, 'أكسسورات الستريم Elgato 1', 'أكسسورات الستريم Elgato 1', 'أكسسورات الستريم Elgato 1', 'Elgato stream accessories 1', 'Elgato stream accessories 1', 'Elgato stream accessories 1', '5500941233', 'Elgato stream accessories 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 436.00, 382.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1453, 'أكسسورات الستريم Elgato 2', 'أكسسورات الستريم Elgato 2', 'أكسسورات الستريم Elgato 2', 'Elgato stream accessories 2', 'Elgato stream accessories 2', 'Elgato stream accessories 2', '2984340367', 'Elgato stream accessories 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 386.00, 395.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1454, 'أكسسورات الستريم Elgato 3', 'أكسسورات الستريم Elgato 3', 'أكسسورات الستريم Elgato 3', 'Elgato stream accessories 3', 'Elgato stream accessories 3', 'Elgato stream accessories 3', '7620470381', 'Elgato stream accessories 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 230.00, 353.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1455, 'أكسسورات الستريم Elgato 4', 'أكسسورات الستريم Elgato 4', 'أكسسورات الستريم Elgato 4', 'Elgato stream accessories 4', 'Elgato stream accessories 4', 'Elgato stream accessories 4', '4293196361', 'Elgato stream accessories 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 434.00, 259.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1456, 'أكسسورات الستريم Elgato 5', 'أكسسورات الستريم Elgato 5', 'أكسسورات الستريم Elgato 5', 'Elgato stream accessories 5', 'Elgato stream accessories 5', 'Elgato stream accessories 5', '6439757722', 'Elgato stream accessories 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 108.00, 350.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1457, 'أكسسورات الستريم Elgato 6', 'أكسسورات الستريم Elgato 6', 'أكسسورات الستريم Elgato 6', 'Elgato stream accessories 6', 'Elgato stream accessories 6', 'Elgato stream accessories 6', '3962413654', 'Elgato stream accessories 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 187.00, 376.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1458, 'أكسسورات الستريم Elgato 7', 'أكسسورات الستريم Elgato 7', 'أكسسورات الستريم Elgato 7', 'Elgato stream accessories 7', 'Elgato stream accessories 7', 'Elgato stream accessories 7', '89862700', 'Elgato stream accessories 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 143.00, 320.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1459, 'أكسسورات الستريم Elgato 8', 'أكسسورات الستريم Elgato 8', 'أكسسورات الستريم Elgato 8', 'Elgato stream accessories 8', 'Elgato stream accessories 8', 'Elgato stream accessories 8', '256304705', 'Elgato stream accessories 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 290.00, 148.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 0, NULL, 0),
(1460, 'أكسسورات الستريم Elgato 9', 'أكسسورات الستريم Elgato 9', 'أكسسورات الستريم Elgato 9', 'Elgato stream accessories 9', 'Elgato stream accessories 9', 'Elgato stream accessories 9', '3224834833', 'Elgato stream accessories 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 427.00, 398.00, NULL, '2022-04-04 10:32:04', '2022-04-04 10:32:04', 1, 0, 1, NULL, 0),
(1461, 'أكسسورات الستريم Elgato 10', 'أكسسورات الستريم Elgato 10', 'أكسسورات الستريم Elgato 10', 'Elgato stream accessories 10', 'Elgato stream accessories 10', 'Elgato stream accessories 10', '3212881872', 'Elgato stream accessories 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 393.00, 354.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1462, 'أكسسورات الستريم Elgato 11', 'أكسسورات الستريم Elgato 11', 'أكسسورات الستريم Elgato 11', 'Elgato stream accessories 11', 'Elgato stream accessories 11', 'Elgato stream accessories 11', '5411950178', 'Elgato stream accessories 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 294.00, 283.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1463, 'أكسسورات الستريم Elgato 12', 'أكسسورات الستريم Elgato 12', 'أكسسورات الستريم Elgato 12', 'Elgato stream accessories 12', 'Elgato stream accessories 12', 'Elgato stream accessories 12', '7170489824', 'Elgato stream accessories 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 307.00, 137.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1464, 'أكسسورات الستريم Elgato 13', 'أكسسورات الستريم Elgato 13', 'أكسسورات الستريم Elgato 13', 'Elgato stream accessories 13', 'Elgato stream accessories 13', 'Elgato stream accessories 13', '4233291809', 'Elgato stream accessories 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 165.00, 242.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1465, 'أكسسورات الستريم Elgato 14', 'أكسسورات الستريم Elgato 14', 'أكسسورات الستريم Elgato 14', 'Elgato stream accessories 14', 'Elgato stream accessories 14', 'Elgato stream accessories 14', '8266816543', 'Elgato stream accessories 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 274.00, 395.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1466, 'أكسسورات الستريم Elgato 15', 'أكسسورات الستريم Elgato 15', 'أكسسورات الستريم Elgato 15', 'Elgato stream accessories 15', 'Elgato stream accessories 15', 'Elgato stream accessories 15', '5768778820', 'Elgato stream accessories 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 160.00, 378.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1467, 'أكسسورات الستريم Elgato 16', 'أكسسورات الستريم Elgato 16', 'أكسسورات الستريم Elgato 16', 'Elgato stream accessories 16', 'Elgato stream accessories 16', 'Elgato stream accessories 16', '5328783058', 'Elgato stream accessories 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 175.00, 135.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1468, 'أكسسورات الستريم Elgato 17', 'أكسسورات الستريم Elgato 17', 'أكسسورات الستريم Elgato 17', 'Elgato stream accessories 17', 'Elgato stream accessories 17', 'Elgato stream accessories 17', '7150252497', 'Elgato stream accessories 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 425.00, 149.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1469, 'أكسسورات الستريم Elgato 18', 'أكسسورات الستريم Elgato 18', 'أكسسورات الستريم Elgato 18', 'Elgato stream accessories 18', 'Elgato stream accessories 18', 'Elgato stream accessories 18', '4653298255', 'Elgato stream accessories 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 251.00, 244.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1470, 'أكسسورات الستريم Elgato 19', 'أكسسورات الستريم Elgato 19', 'أكسسورات الستريم Elgato 19', 'Elgato stream accessories 19', 'Elgato stream accessories 19', 'Elgato stream accessories 19', '9840593426', 'Elgato stream accessories 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 321.00, 99.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1471, 'أكسسورات الستريم Elgato 20', 'أكسسورات الستريم Elgato 20', 'أكسسورات الستريم Elgato 20', 'Elgato stream accessories 20', 'Elgato stream accessories 20', 'Elgato stream accessories 20', '6011574685', 'Elgato stream accessories 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 301.00, 305.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1472, 'أكسسورات الستريم Elgato 21', 'أكسسورات الستريم Elgato 21', 'أكسسورات الستريم Elgato 21', 'Elgato stream accessories 21', 'Elgato stream accessories 21', 'Elgato stream accessories 21', '1076730704', 'Elgato stream accessories 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 197.00, 316.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1473, 'أكسسورات الستريم Elgato 22', 'أكسسورات الستريم Elgato 22', 'أكسسورات الستريم Elgato 22', 'Elgato stream accessories 22', 'Elgato stream accessories 22', 'Elgato stream accessories 22', '4855253585', 'Elgato stream accessories 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 347.00, 127.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1474, 'أكسسورات الستريم Elgato 23', 'أكسسورات الستريم Elgato 23', 'أكسسورات الستريم Elgato 23', 'Elgato stream accessories 23', 'Elgato stream accessories 23', 'Elgato stream accessories 23', '1610391783', 'Elgato stream accessories 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 483.00, 73.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1475, 'أكسسورات الستريم Elgato 24', 'أكسسورات الستريم Elgato 24', 'أكسسورات الستريم Elgato 24', 'Elgato stream accessories 24', 'Elgato stream accessories 24', 'Elgato stream accessories 24', '9635783714', 'Elgato stream accessories 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 407.00, 89.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1476, 'أكسسورات الستريم Elgato 25', 'أكسسورات الستريم Elgato 25', 'أكسسورات الستريم Elgato 25', 'Elgato stream accessories 25', 'Elgato stream accessories 25', 'Elgato stream accessories 25', '4367276820', 'Elgato stream accessories 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 230.00, 270.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1477, 'أكسسورات الستريم Elgato 26', 'أكسسورات الستريم Elgato 26', 'أكسسورات الستريم Elgato 26', 'Elgato stream accessories 26', 'Elgato stream accessories 26', 'Elgato stream accessories 26', '2748397905', 'Elgato stream accessories 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 304.00, 288.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1478, 'أكسسورات الستريم Elgato 27', 'أكسسورات الستريم Elgato 27', 'أكسسورات الستريم Elgato 27', 'Elgato stream accessories 27', 'Elgato stream accessories 27', 'Elgato stream accessories 27', '9939518803', 'Elgato stream accessories 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 439.00, 385.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1479, 'أكسسورات الستريم Elgato 28', 'أكسسورات الستريم Elgato 28', 'أكسسورات الستريم Elgato 28', 'Elgato stream accessories 28', 'Elgato stream accessories 28', 'Elgato stream accessories 28', '3642771581', 'Elgato stream accessories 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 180.00, 152.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1480, 'أكسسورات الستريم Elgato 29', 'أكسسورات الستريم Elgato 29', 'أكسسورات الستريم Elgato 29', 'Elgato stream accessories 29', 'Elgato stream accessories 29', 'Elgato stream accessories 29', '3557459867', 'Elgato stream accessories 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 165.00, 265.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1481, 'أكسسورات الستريم Elgato 30', 'أكسسورات الستريم Elgato 30', 'أكسسورات الستريم Elgato 30', 'Elgato stream accessories 30', 'Elgato stream accessories 30', 'Elgato stream accessories 30', '3495488477', 'Elgato stream accessories 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 290.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1482, 'أكسسورات الستريم Elgato 31', 'أكسسورات الستريم Elgato 31', 'أكسسورات الستريم Elgato 31', 'Elgato stream accessories 31', 'Elgato stream accessories 31', 'Elgato stream accessories 31', '3452990096', 'Elgato stream accessories 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 497.00, 330.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1483, 'أكسسورات الستريم Elgato 32', 'أكسسورات الستريم Elgato 32', 'أكسسورات الستريم Elgato 32', 'Elgato stream accessories 32', 'Elgato stream accessories 32', 'Elgato stream accessories 32', '3903159675', 'Elgato stream accessories 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 415.00, 217.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1484, 'أكسسورات الستريم Elgato 33', 'أكسسورات الستريم Elgato 33', 'أكسسورات الستريم Elgato 33', 'Elgato stream accessories 33', 'Elgato stream accessories 33', 'Elgato stream accessories 33', '5905291244', 'Elgato stream accessories 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 235.00, 273.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1485, 'أكسسورات الستريم Elgato 34', 'أكسسورات الستريم Elgato 34', 'أكسسورات الستريم Elgato 34', 'Elgato stream accessories 34', 'Elgato stream accessories 34', 'Elgato stream accessories 34', '7523678107', 'Elgato stream accessories 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 264.00, 51.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1486, 'أكسسورات الستريم Elgato 35', 'أكسسورات الستريم Elgato 35', 'أكسسورات الستريم Elgato 35', 'Elgato stream accessories 35', 'Elgato stream accessories 35', 'Elgato stream accessories 35', '6359315689', 'Elgato stream accessories 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 279.00, 349.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1487, 'أكسسورات الستريم Elgato 36', 'أكسسورات الستريم Elgato 36', 'أكسسورات الستريم Elgato 36', 'Elgato stream accessories 36', 'Elgato stream accessories 36', 'Elgato stream accessories 36', '1782417122', 'Elgato stream accessories 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 268.00, 264.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1488, 'أكسسورات الستريم Elgato 37', 'أكسسورات الستريم Elgato 37', 'أكسسورات الستريم Elgato 37', 'Elgato stream accessories 37', 'Elgato stream accessories 37', 'Elgato stream accessories 37', '9447138888', 'Elgato stream accessories 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 299.00, 349.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1489, 'أكسسورات الستريم Elgato 38', 'أكسسورات الستريم Elgato 38', 'أكسسورات الستريم Elgato 38', 'Elgato stream accessories 38', 'Elgato stream accessories 38', 'Elgato stream accessories 38', '1003172331', 'Elgato stream accessories 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 311.00, 319.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1490, 'أكسسورات الستريم Elgato 39', 'أكسسورات الستريم Elgato 39', 'أكسسورات الستريم Elgato 39', 'Elgato stream accessories 39', 'Elgato stream accessories 39', 'Elgato stream accessories 39', '9860534130', 'Elgato stream accessories 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 355.00, 236.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1491, 'أكسسورات الستريم Elgato 40', 'أكسسورات الستريم Elgato 40', 'أكسسورات الستريم Elgato 40', 'Elgato stream accessories 40', 'Elgato stream accessories 40', 'Elgato stream accessories 40', '6461293423', 'Elgato stream accessories 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 275.00, 76.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1492, 'أكسسورات الستريم Elgato 41', 'أكسسورات الستريم Elgato 41', 'أكسسورات الستريم Elgato 41', 'Elgato stream accessories 41', 'Elgato stream accessories 41', 'Elgato stream accessories 41', '9273626743', 'Elgato stream accessories 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 487.00, 203.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1493, 'أكسسورات الستريم Elgato 42', 'أكسسورات الستريم Elgato 42', 'أكسسورات الستريم Elgato 42', 'Elgato stream accessories 42', 'Elgato stream accessories 42', 'Elgato stream accessories 42', '2095932445', 'Elgato stream accessories 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 141.00, 355.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1494, 'أكسسورات الستريم Elgato 43', 'أكسسورات الستريم Elgato 43', 'أكسسورات الستريم Elgato 43', 'Elgato stream accessories 43', 'Elgato stream accessories 43', 'Elgato stream accessories 43', '2919690623', 'Elgato stream accessories 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 167.00, 337.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1495, 'أكسسورات الستريم Elgato 44', 'أكسسورات الستريم Elgato 44', 'أكسسورات الستريم Elgato 44', 'Elgato stream accessories 44', 'Elgato stream accessories 44', 'Elgato stream accessories 44', '6987563303', 'Elgato stream accessories 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 340.00, 183.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1496, 'أكسسورات الستريم Elgato 45', 'أكسسورات الستريم Elgato 45', 'أكسسورات الستريم Elgato 45', 'Elgato stream accessories 45', 'Elgato stream accessories 45', 'Elgato stream accessories 45', '5564019440', 'Elgato stream accessories 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 190.00, 89.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1497, 'أكسسورات الستريم Elgato 46', 'أكسسورات الستريم Elgato 46', 'أكسسورات الستريم Elgato 46', 'Elgato stream accessories 46', 'Elgato stream accessories 46', 'Elgato stream accessories 46', '8549988040', 'Elgato stream accessories 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 212.00, 162.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1498, 'أكسسورات الستريم Elgato 47', 'أكسسورات الستريم Elgato 47', 'أكسسورات الستريم Elgato 47', 'Elgato stream accessories 47', 'Elgato stream accessories 47', 'Elgato stream accessories 47', '6692293300', 'Elgato stream accessories 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 269.00, 188.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1499, 'أكسسورات الستريم Elgato 48', 'أكسسورات الستريم Elgato 48', 'أكسسورات الستريم Elgato 48', 'Elgato stream accessories 48', 'Elgato stream accessories 48', 'Elgato stream accessories 48', '4396924744', 'Elgato stream accessories 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 446.00, 380.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1500, 'أكسسورات الستريم Elgato 49', 'أكسسورات الستريم Elgato 49', 'أكسسورات الستريم Elgato 49', 'Elgato stream accessories 49', 'Elgato stream accessories 49', 'Elgato stream accessories 49', '1491795516', 'Elgato stream accessories 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 474.00, 50.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1501, 'أكسسورات قيادة للالعاب 0', 'أكسسورات قيادة للالعاب 0', 'أكسسورات قيادة للالعاب 0', 'Driving accessories for games 0', 'Driving accessories for games 0', 'Driving accessories for games 0', '7853349703', 'Driving accessories for games 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 459.00, 345.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1502, 'أكسسورات قيادة للالعاب 1', 'أكسسورات قيادة للالعاب 1', 'أكسسورات قيادة للالعاب 1', 'Driving accessories for games 1', 'Driving accessories for games 1', 'Driving accessories for games 1', '1463467965', 'Driving accessories for games 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 110.00, 233.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1503, 'أكسسورات قيادة للالعاب 2', 'أكسسورات قيادة للالعاب 2', 'أكسسورات قيادة للالعاب 2', 'Driving accessories for games 2', 'Driving accessories for games 2', 'Driving accessories for games 2', '6276739728', 'Driving accessories for games 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 371.00, 218.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1504, 'أكسسورات قيادة للالعاب 3', 'أكسسورات قيادة للالعاب 3', 'أكسسورات قيادة للالعاب 3', 'Driving accessories for games 3', 'Driving accessories for games 3', 'Driving accessories for games 3', '8842545838', 'Driving accessories for games 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 364.00, 259.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1505, 'أكسسورات قيادة للالعاب 4', 'أكسسورات قيادة للالعاب 4', 'أكسسورات قيادة للالعاب 4', 'Driving accessories for games 4', 'Driving accessories for games 4', 'Driving accessories for games 4', '3756767570', 'Driving accessories for games 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 308.00, 82.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1506, 'أكسسورات قيادة للالعاب 5', 'أكسسورات قيادة للالعاب 5', 'أكسسورات قيادة للالعاب 5', 'Driving accessories for games 5', 'Driving accessories for games 5', 'Driving accessories for games 5', '6731792789', 'Driving accessories for games 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 211.00, 398.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1507, 'أكسسورات قيادة للالعاب 6', 'أكسسورات قيادة للالعاب 6', 'أكسسورات قيادة للالعاب 6', 'Driving accessories for games 6', 'Driving accessories for games 6', 'Driving accessories for games 6', '4277373493', 'Driving accessories for games 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 313.00, 113.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1508, 'أكسسورات قيادة للالعاب 7', 'أكسسورات قيادة للالعاب 7', 'أكسسورات قيادة للالعاب 7', 'Driving accessories for games 7', 'Driving accessories for games 7', 'Driving accessories for games 7', '2045859012', 'Driving accessories for games 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 246.00, 346.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1509, 'أكسسورات قيادة للالعاب 8', 'أكسسورات قيادة للالعاب 8', 'أكسسورات قيادة للالعاب 8', 'Driving accessories for games 8', 'Driving accessories for games 8', 'Driving accessories for games 8', '4160030988', 'Driving accessories for games 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 182.00, 296.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1510, 'أكسسورات قيادة للالعاب 9', 'أكسسورات قيادة للالعاب 9', 'أكسسورات قيادة للالعاب 9', 'Driving accessories for games 9', 'Driving accessories for games 9', 'Driving accessories for games 9', '480536801', 'Driving accessories for games 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 446.00, 226.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1511, 'أكسسورات قيادة للالعاب 10', 'أكسسورات قيادة للالعاب 10', 'أكسسورات قيادة للالعاب 10', 'Driving accessories for games 10', 'Driving accessories for games 10', 'Driving accessories for games 10', '4156757413', 'Driving accessories for games 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 269.00, 277.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1512, 'أكسسورات قيادة للالعاب 11', 'أكسسورات قيادة للالعاب 11', 'أكسسورات قيادة للالعاب 11', 'Driving accessories for games 11', 'Driving accessories for games 11', 'Driving accessories for games 11', '5129683263', 'Driving accessories for games 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 486.00, 246.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1513, 'أكسسورات قيادة للالعاب 12', 'أكسسورات قيادة للالعاب 12', 'أكسسورات قيادة للالعاب 12', 'Driving accessories for games 12', 'Driving accessories for games 12', 'Driving accessories for games 12', '355975151', 'Driving accessories for games 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 369.00, 235.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1514, 'أكسسورات قيادة للالعاب 13', 'أكسسورات قيادة للالعاب 13', 'أكسسورات قيادة للالعاب 13', 'Driving accessories for games 13', 'Driving accessories for games 13', 'Driving accessories for games 13', '1366491875', 'Driving accessories for games 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 189.00, 198.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1515, 'أكسسورات قيادة للالعاب 14', 'أكسسورات قيادة للالعاب 14', 'أكسسورات قيادة للالعاب 14', 'Driving accessories for games 14', 'Driving accessories for games 14', 'Driving accessories for games 14', '797734690', 'Driving accessories for games 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 394.00, 326.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1516, 'أكسسورات قيادة للالعاب 15', 'أكسسورات قيادة للالعاب 15', 'أكسسورات قيادة للالعاب 15', 'Driving accessories for games 15', 'Driving accessories for games 15', 'Driving accessories for games 15', '4953764153', 'Driving accessories for games 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 151.00, 360.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1517, 'أكسسورات قيادة للالعاب 16', 'أكسسورات قيادة للالعاب 16', 'أكسسورات قيادة للالعاب 16', 'Driving accessories for games 16', 'Driving accessories for games 16', 'Driving accessories for games 16', '1649187921', 'Driving accessories for games 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 447.00, 290.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1518, 'أكسسورات قيادة للالعاب 17', 'أكسسورات قيادة للالعاب 17', 'أكسسورات قيادة للالعاب 17', 'Driving accessories for games 17', 'Driving accessories for games 17', 'Driving accessories for games 17', '9078230506', 'Driving accessories for games 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 379.00, 58.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1519, 'أكسسورات قيادة للالعاب 18', 'أكسسورات قيادة للالعاب 18', 'أكسسورات قيادة للالعاب 18', 'Driving accessories for games 18', 'Driving accessories for games 18', 'Driving accessories for games 18', '1963883168', 'Driving accessories for games 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 113.00, 68.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1520, 'أكسسورات قيادة للالعاب 19', 'أكسسورات قيادة للالعاب 19', 'أكسسورات قيادة للالعاب 19', 'Driving accessories for games 19', 'Driving accessories for games 19', 'Driving accessories for games 19', '1659104962', 'Driving accessories for games 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 361.00, 249.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1521, 'أكسسورات قيادة للالعاب 20', 'أكسسورات قيادة للالعاب 20', 'أكسسورات قيادة للالعاب 20', 'Driving accessories for games 20', 'Driving accessories for games 20', 'Driving accessories for games 20', '4794041659', 'Driving accessories for games 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 335.00, 372.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1522, 'أكسسورات قيادة للالعاب 21', 'أكسسورات قيادة للالعاب 21', 'أكسسورات قيادة للالعاب 21', 'Driving accessories for games 21', 'Driving accessories for games 21', 'Driving accessories for games 21', '6920810235', 'Driving accessories for games 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 432.00, 274.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1523, 'أكسسورات قيادة للالعاب 22', 'أكسسورات قيادة للالعاب 22', 'أكسسورات قيادة للالعاب 22', 'Driving accessories for games 22', 'Driving accessories for games 22', 'Driving accessories for games 22', '3860563485', 'Driving accessories for games 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 456.00, 97.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1524, 'أكسسورات قيادة للالعاب 23', 'أكسسورات قيادة للالعاب 23', 'أكسسورات قيادة للالعاب 23', 'Driving accessories for games 23', 'Driving accessories for games 23', 'Driving accessories for games 23', '5844824667', 'Driving accessories for games 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 281.00, 72.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1525, 'أكسسورات قيادة للالعاب 24', 'أكسسورات قيادة للالعاب 24', 'أكسسورات قيادة للالعاب 24', 'Driving accessories for games 24', 'Driving accessories for games 24', 'Driving accessories for games 24', '1854747116', 'Driving accessories for games 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 317.00, 188.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1526, 'أكسسورات قيادة للالعاب 25', 'أكسسورات قيادة للالعاب 25', 'أكسسورات قيادة للالعاب 25', 'Driving accessories for games 25', 'Driving accessories for games 25', 'Driving accessories for games 25', '8107266803', 'Driving accessories for games 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 196.00, 225.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1527, 'أكسسورات قيادة للالعاب 26', 'أكسسورات قيادة للالعاب 26', 'أكسسورات قيادة للالعاب 26', 'Driving accessories for games 26', 'Driving accessories for games 26', 'Driving accessories for games 26', '3681996650', 'Driving accessories for games 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 214.00, 69.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1528, 'أكسسورات قيادة للالعاب 27', 'أكسسورات قيادة للالعاب 27', 'أكسسورات قيادة للالعاب 27', 'Driving accessories for games 27', 'Driving accessories for games 27', 'Driving accessories for games 27', '1877767606', 'Driving accessories for games 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 187.00, 73.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1529, 'أكسسورات قيادة للالعاب 28', 'أكسسورات قيادة للالعاب 28', 'أكسسورات قيادة للالعاب 28', 'Driving accessories for games 28', 'Driving accessories for games 28', 'Driving accessories for games 28', '3593712386', 'Driving accessories for games 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 161.00, 346.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1530, 'أكسسورات قيادة للالعاب 29', 'أكسسورات قيادة للالعاب 29', 'أكسسورات قيادة للالعاب 29', 'Driving accessories for games 29', 'Driving accessories for games 29', 'Driving accessories for games 29', '2337781032', 'Driving accessories for games 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 471.00, 184.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1531, 'أكسسورات قيادة للالعاب 30', 'أكسسورات قيادة للالعاب 30', 'أكسسورات قيادة للالعاب 30', 'Driving accessories for games 30', 'Driving accessories for games 30', 'Driving accessories for games 30', '1313873213', 'Driving accessories for games 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 476.00, 396.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1532, 'أكسسورات قيادة للالعاب 31', 'أكسسورات قيادة للالعاب 31', 'أكسسورات قيادة للالعاب 31', 'Driving accessories for games 31', 'Driving accessories for games 31', 'Driving accessories for games 31', '4866685744', 'Driving accessories for games 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 145.00, 116.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1533, 'أكسسورات قيادة للالعاب 32', 'أكسسورات قيادة للالعاب 32', 'أكسسورات قيادة للالعاب 32', 'Driving accessories for games 32', 'Driving accessories for games 32', 'Driving accessories for games 32', '2416432411', 'Driving accessories for games 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 201.00, 65.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1534, 'أكسسورات قيادة للالعاب 33', 'أكسسورات قيادة للالعاب 33', 'أكسسورات قيادة للالعاب 33', 'Driving accessories for games 33', 'Driving accessories for games 33', 'Driving accessories for games 33', '1286999700', 'Driving accessories for games 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 482.00, 309.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1535, 'أكسسورات قيادة للالعاب 34', 'أكسسورات قيادة للالعاب 34', 'أكسسورات قيادة للالعاب 34', 'Driving accessories for games 34', 'Driving accessories for games 34', 'Driving accessories for games 34', '2730282805', 'Driving accessories for games 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 327.00, 79.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1536, 'أكسسورات قيادة للالعاب 35', 'أكسسورات قيادة للالعاب 35', 'أكسسورات قيادة للالعاب 35', 'Driving accessories for games 35', 'Driving accessories for games 35', 'Driving accessories for games 35', '3963423246', 'Driving accessories for games 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 299.00, 264.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1537, 'أكسسورات قيادة للالعاب 36', 'أكسسورات قيادة للالعاب 36', 'أكسسورات قيادة للالعاب 36', 'Driving accessories for games 36', 'Driving accessories for games 36', 'Driving accessories for games 36', '7256246383', 'Driving accessories for games 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 187.00, 380.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1538, 'أكسسورات قيادة للالعاب 37', 'أكسسورات قيادة للالعاب 37', 'أكسسورات قيادة للالعاب 37', 'Driving accessories for games 37', 'Driving accessories for games 37', 'Driving accessories for games 37', '533219466', 'Driving accessories for games 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 476.00, 302.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1539, 'أكسسورات قيادة للالعاب 38', 'أكسسورات قيادة للالعاب 38', 'أكسسورات قيادة للالعاب 38', 'Driving accessories for games 38', 'Driving accessories for games 38', 'Driving accessories for games 38', '3484622224', 'Driving accessories for games 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 424.00, 277.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1540, 'أكسسورات قيادة للالعاب 39', 'أكسسورات قيادة للالعاب 39', 'أكسسورات قيادة للالعاب 39', 'Driving accessories for games 39', 'Driving accessories for games 39', 'Driving accessories for games 39', '764787243', 'Driving accessories for games 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 163.00, 167.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1541, 'أكسسورات قيادة للالعاب 40', 'أكسسورات قيادة للالعاب 40', 'أكسسورات قيادة للالعاب 40', 'Driving accessories for games 40', 'Driving accessories for games 40', 'Driving accessories for games 40', '8754650501', 'Driving accessories for games 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 237.00, 222.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1542, 'أكسسورات قيادة للالعاب 41', 'أكسسورات قيادة للالعاب 41', 'أكسسورات قيادة للالعاب 41', 'Driving accessories for games 41', 'Driving accessories for games 41', 'Driving accessories for games 41', '4637087708', 'Driving accessories for games 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 174.00, 230.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1543, 'أكسسورات قيادة للالعاب 42', 'أكسسورات قيادة للالعاب 42', 'أكسسورات قيادة للالعاب 42', 'Driving accessories for games 42', 'Driving accessories for games 42', 'Driving accessories for games 42', '8947333866', 'Driving accessories for games 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 199.00, 119.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1544, 'أكسسورات قيادة للالعاب 43', 'أكسسورات قيادة للالعاب 43', 'أكسسورات قيادة للالعاب 43', 'Driving accessories for games 43', 'Driving accessories for games 43', 'Driving accessories for games 43', '1339148219', 'Driving accessories for games 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 476.00, 147.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1545, 'أكسسورات قيادة للالعاب 44', 'أكسسورات قيادة للالعاب 44', 'أكسسورات قيادة للالعاب 44', 'Driving accessories for games 44', 'Driving accessories for games 44', 'Driving accessories for games 44', '9581127574', 'Driving accessories for games 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 358.00, 344.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1546, 'أكسسورات قيادة للالعاب 45', 'أكسسورات قيادة للالعاب 45', 'أكسسورات قيادة للالعاب 45', 'Driving accessories for games 45', 'Driving accessories for games 45', 'Driving accessories for games 45', '9337155832', 'Driving accessories for games 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 468.00, 368.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1547, 'أكسسورات قيادة للالعاب 46', 'أكسسورات قيادة للالعاب 46', 'أكسسورات قيادة للالعاب 46', 'Driving accessories for games 46', 'Driving accessories for games 46', 'Driving accessories for games 46', '5307820065', 'Driving accessories for games 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 79, 428.00, 379.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1548, 'أكسسورات قيادة للالعاب 47', 'أكسسورات قيادة للالعاب 47', 'أكسسورات قيادة للالعاب 47', 'Driving accessories for games 47', 'Driving accessories for games 47', 'Driving accessories for games 47', '8272878252', 'Driving accessories for games 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 257.00, 77.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1549, 'أكسسورات قيادة للالعاب 48', 'أكسسورات قيادة للالعاب 48', 'أكسسورات قيادة للالعاب 48', 'Driving accessories for games 48', 'Driving accessories for games 48', 'Driving accessories for games 48', '8834796501', 'Driving accessories for games 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 215.00, 117.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1550, 'أكسسورات قيادة للالعاب 49', 'أكسسورات قيادة للالعاب 49', 'أكسسورات قيادة للالعاب 49', 'Driving accessories for games 49', 'Driving accessories for games 49', 'Driving accessories for games 49', '3557210204', 'Driving accessories for games 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 362.00, 285.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1551, 'اللاب توبات 0', 'اللاب توبات 0', 'اللاب توبات 0', 'Lap tops 0', 'Lap tops 0', 'Lap tops 0', '7910059110', 'Lap tops 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 263.00, 364.00, NULL, '2022-04-04 10:32:05', '2022-04-06 11:23:10', 1, 0, 1, NULL, 0),
(1552, 'اللاب توبات 1', 'اللاب توبات 1', 'اللاب توبات 1', 'Lap tops 1', 'Lap tops 1', 'Lap tops 1', '8106699841', 'Lap tops 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 481.00, 121.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1553, 'اللاب توبات 2', 'اللاب توبات 2', 'اللاب توبات 2', 'Lap tops 2', 'Lap tops 2', 'Lap tops 2', '203371847', 'Lap tops 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 454.00, 101.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1554, 'اللاب توبات 3', 'اللاب توبات 3', 'اللاب توبات 3', 'Lap tops 3', 'Lap tops 3', 'Lap tops 3', '978040495', 'Lap tops 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 396.00, 212.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1555, 'اللاب توبات 4', 'اللاب توبات 4', 'اللاب توبات 4', 'Lap tops 4', 'Lap tops 4', 'Lap tops 4', '9521510577', 'Lap tops 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 367.00, 253.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1556, 'اللاب توبات 5', 'اللاب توبات 5', 'اللاب توبات 5', 'Lap tops 5', 'Lap tops 5', 'Lap tops 5', '4390645732', 'Lap tops 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 209.00, 235.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1557, 'اللاب توبات 6', 'اللاب توبات 6', 'اللاب توبات 6', 'Lap tops 6', 'Lap tops 6', 'Lap tops 6', '1230874832', 'Lap tops 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 110.00, 231.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1558, 'اللاب توبات 7', 'اللاب توبات 7', 'اللاب توبات 7', 'Lap tops 7', 'Lap tops 7', 'Lap tops 7', '4996149292', 'Lap tops 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 350.00, 289.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1559, 'اللاب توبات 8', 'اللاب توبات 8', 'اللاب توبات 8', 'Lap tops 8', 'Lap tops 8', 'Lap tops 8', '4008408798', 'Lap tops 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 303.00, 335.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1560, 'اللاب توبات 9', 'اللاب توبات 9', 'اللاب توبات 9', 'Lap tops 9', 'Lap tops 9', 'Lap tops 9', '6034715224', 'Lap tops 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 336.00, 56.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1561, 'اللاب توبات 10', 'اللاب توبات 10', 'اللاب توبات 10', 'Lap tops 10', 'Lap tops 10', 'Lap tops 10', '4850521761', 'Lap tops 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 250.00, 198.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1562, 'اللاب توبات 11', 'اللاب توبات 11', 'اللاب توبات 11', 'Lap tops 11', 'Lap tops 11', 'Lap tops 11', '333848547', 'Lap tops 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 169.00, 161.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1563, 'اللاب توبات 12', 'اللاب توبات 12', 'اللاب توبات 12', 'Lap tops 12', 'Lap tops 12', 'Lap tops 12', '8094809986', 'Lap tops 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 124.00, 322.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1564, 'اللاب توبات 13', 'اللاب توبات 13', 'اللاب توبات 13', 'Lap tops 13', 'Lap tops 13', 'Lap tops 13', '9225096683', 'Lap tops 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 126.00, 309.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1565, 'اللاب توبات 14', 'اللاب توبات 14', 'اللاب توبات 14', 'Lap tops 14', 'Lap tops 14', 'Lap tops 14', '2189175702', 'Lap tops 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 428.00, 72.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1566, 'اللاب توبات 15', 'اللاب توبات 15', 'اللاب توبات 15', 'Lap tops 15', 'Lap tops 15', 'Lap tops 15', '6773518829', 'Lap tops 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 397.00, 185.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1567, 'اللاب توبات 16', 'اللاب توبات 16', 'اللاب توبات 16', 'Lap tops 16', 'Lap tops 16', 'Lap tops 16', '1094411668', 'Lap tops 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 265.00, 95.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1568, 'اللاب توبات 17', 'اللاب توبات 17', 'اللاب توبات 17', 'Lap tops 17', 'Lap tops 17', 'Lap tops 17', '6716659741', 'Lap tops 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 317.00, 172.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1569, 'اللاب توبات 18', 'اللاب توبات 18', 'اللاب توبات 18', 'Lap tops 18', 'Lap tops 18', 'Lap tops 18', '1727180722', 'Lap tops 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 300.00, 69.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1570, 'اللاب توبات 19', 'اللاب توبات 19', 'اللاب توبات 19', 'Lap tops 19', 'Lap tops 19', 'Lap tops 19', '692663281', 'Lap tops 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 179.00, 317.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1571, 'اللاب توبات 20', 'اللاب توبات 20', 'اللاب توبات 20', 'Lap tops 20', 'Lap tops 20', 'Lap tops 20', '1011341537', 'Lap tops 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 335.00, 305.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1572, 'اللاب توبات 21', 'اللاب توبات 21', 'اللاب توبات 21', 'Lap tops 21', 'Lap tops 21', 'Lap tops 21', '2007738292', 'Lap tops 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 250.00, 81.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1573, 'اللاب توبات 22', 'اللاب توبات 22', 'اللاب توبات 22', 'Lap tops 22', 'Lap tops 22', 'Lap tops 22', '4980399895', 'Lap tops 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 176.00, 353.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1574, 'اللاب توبات 23', 'اللاب توبات 23', 'اللاب توبات 23', 'Lap tops 23', 'Lap tops 23', 'Lap tops 23', '6549656410', 'Lap tops 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 228.00, 311.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1575, 'اللاب توبات 24', 'اللاب توبات 24', 'اللاب توبات 24', 'Lap tops 24', 'Lap tops 24', 'Lap tops 24', '138131207', 'Lap tops 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 349.00, 264.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1576, 'اللاب توبات 25', 'اللاب توبات 25', 'اللاب توبات 25', 'Lap tops 25', 'Lap tops 25', 'Lap tops 25', '5191958028', 'Lap tops 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 342.00, 103.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1577, 'اللاب توبات 26', 'اللاب توبات 26', 'اللاب توبات 26', 'Lap tops 26', 'Lap tops 26', 'Lap tops 26', '4419551552', 'Lap tops 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 220.00, 284.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1578, 'اللاب توبات 27', 'اللاب توبات 27', 'اللاب توبات 27', 'Lap tops 27', 'Lap tops 27', 'Lap tops 27', '1448149528', 'Lap tops 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 250.00, 259.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1579, 'اللاب توبات 28', 'اللاب توبات 28', 'اللاب توبات 28', 'Lap tops 28', 'Lap tops 28', 'Lap tops 28', '1349750172', 'Lap tops 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 248.00, 167.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1580, 'اللاب توبات 29', 'اللاب توبات 29', 'اللاب توبات 29', 'Lap tops 29', 'Lap tops 29', 'Lap tops 29', '3626918345', 'Lap tops 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 114.00, 245.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1581, 'اللاب توبات 30', 'اللاب توبات 30', 'اللاب توبات 30', 'Lap tops 30', 'Lap tops 30', 'Lap tops 30', '4669924256', 'Lap tops 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 391.00, 289.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1582, 'اللاب توبات 31', 'اللاب توبات 31', 'اللاب توبات 31', 'Lap tops 31', 'Lap tops 31', 'Lap tops 31', '4221633865', 'Lap tops 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 339.00, 59.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1583, 'اللاب توبات 32', 'اللاب توبات 32', 'اللاب توبات 32', 'Lap tops 32', 'Lap tops 32', 'Lap tops 32', '9316361398', 'Lap tops 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 378.00, 385.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1584, 'اللاب توبات 33', 'اللاب توبات 33', 'اللاب توبات 33', 'Lap tops 33', 'Lap tops 33', 'Lap tops 33', '6928082966', 'Lap tops 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 269.00, 225.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1585, 'اللاب توبات 34', 'اللاب توبات 34', 'اللاب توبات 34', 'Lap tops 34', 'Lap tops 34', 'Lap tops 34', '2411589221', 'Lap tops 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 284.00, 95.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1586, 'اللاب توبات 35', 'اللاب توبات 35', 'اللاب توبات 35', 'Lap tops 35', 'Lap tops 35', 'Lap tops 35', '1680980743', 'Lap tops 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 122.00, 329.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1587, 'اللاب توبات 36', 'اللاب توبات 36', 'اللاب توبات 36', 'Lap tops 36', 'Lap tops 36', 'Lap tops 36', '1722909980', 'Lap tops 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 228.00, 80.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1588, 'اللاب توبات 37', 'اللاب توبات 37', 'اللاب توبات 37', 'Lap tops 37', 'Lap tops 37', 'Lap tops 37', '2408247637', 'Lap tops 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 337.00, 376.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1589, 'اللاب توبات 38', 'اللاب توبات 38', 'اللاب توبات 38', 'Lap tops 38', 'Lap tops 38', 'Lap tops 38', '5974334951', 'Lap tops 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 355.00, 214.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1590, 'اللاب توبات 39', 'اللاب توبات 39', 'اللاب توبات 39', 'Lap tops 39', 'Lap tops 39', 'Lap tops 39', '2687053184', 'Lap tops 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 118.00, 292.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1591, 'اللاب توبات 40', 'اللاب توبات 40', 'اللاب توبات 40', 'Lap tops 40', 'Lap tops 40', 'Lap tops 40', '1145307512', 'Lap tops 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 272.00, 359.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1592, 'اللاب توبات 41', 'اللاب توبات 41', 'اللاب توبات 41', 'Lap tops 41', 'Lap tops 41', 'Lap tops 41', '1821580366', 'Lap tops 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 373.00, 286.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1593, 'اللاب توبات 42', 'اللاب توبات 42', 'اللاب توبات 42', 'Lap tops 42', 'Lap tops 42', 'Lap tops 42', '7214125008', 'Lap tops 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 134.00, 271.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1594, 'اللاب توبات 43', 'اللاب توبات 43', 'اللاب توبات 43', 'Lap tops 43', 'Lap tops 43', 'Lap tops 43', '9443495131', 'Lap tops 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 314.00, 246.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1595, 'اللاب توبات 44', 'اللاب توبات 44', 'اللاب توبات 44', 'Lap tops 44', 'Lap tops 44', 'Lap tops 44', '7279279559', 'Lap tops 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 255.00, 76.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1596, 'اللاب توبات 45', 'اللاب توبات 45', 'اللاب توبات 45', 'Lap tops 45', 'Lap tops 45', 'Lap tops 45', '906679408', 'Lap tops 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 419.00, 345.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1597, 'اللاب توبات 46', 'اللاب توبات 46', 'اللاب توبات 46', 'Lap tops 46', 'Lap tops 46', 'Lap tops 46', '8503007094', 'Lap tops 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 430.00, 343.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1598, 'اللاب توبات 47', 'اللاب توبات 47', 'اللاب توبات 47', 'Lap tops 47', 'Lap tops 47', 'Lap tops 47', '3978890321', 'Lap tops 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 201.00, 308.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1599, 'اللاب توبات 48', 'اللاب توبات 48', 'اللاب توبات 48', 'Lap tops 48', 'Lap tops 48', 'Lap tops 48', '7476009718', 'Lap tops 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 492.00, 312.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1600, 'اللاب توبات 49', 'اللاب توبات 49', 'اللاب توبات 49', 'Lap tops 49', 'Lap tops 49', 'Lap tops 49', '2962488671', 'Lap tops 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 148.00, 154.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1601, 'Celeron & I3 0', 'Celeron & I3 0', 'Celeron & I3 0', 'Celeron & I3 0', 'Celeron & I3 0', 'Celeron & I3 0', '8992344625', 'Celeron & I3 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 255.00, 350.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1602, 'Celeron & I3 1', 'Celeron & I3 1', 'Celeron & I3 1', 'Celeron & I3 1', 'Celeron & I3 1', 'Celeron & I3 1', '9672700748', 'Celeron & I3 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 493.00, 153.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1603, 'Celeron & I3 2', 'Celeron & I3 2', 'Celeron & I3 2', 'Celeron & I3 2', 'Celeron & I3 2', 'Celeron & I3 2', '6407130080', 'Celeron & I3 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 480.00, 75.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1604, 'Celeron & I3 3', 'Celeron & I3 3', 'Celeron & I3 3', 'Celeron & I3 3', 'Celeron & I3 3', 'Celeron & I3 3', '7732190220', 'Celeron & I3 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 376.00, 290.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1605, 'Celeron & I3 4', 'Celeron & I3 4', 'Celeron & I3 4', 'Celeron & I3 4', 'Celeron & I3 4', 'Celeron & I3 4', '5566402008', 'Celeron & I3 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 154.00, 96.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1606, 'Celeron & I3 5', 'Celeron & I3 5', 'Celeron & I3 5', 'Celeron & I3 5', 'Celeron & I3 5', 'Celeron & I3 5', '6162132209', 'Celeron & I3 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 381.00, 331.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1607, 'Celeron & I3 6', 'Celeron & I3 6', 'Celeron & I3 6', 'Celeron & I3 6', 'Celeron & I3 6', 'Celeron & I3 6', '2860530920', 'Celeron & I3 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 437.00, 330.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1608, 'Celeron & I3 7', 'Celeron & I3 7', 'Celeron & I3 7', 'Celeron & I3 7', 'Celeron & I3 7', 'Celeron & I3 7', '1161004773', 'Celeron & I3 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 468.00, 339.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1609, 'Celeron & I3 8', 'Celeron & I3 8', 'Celeron & I3 8', 'Celeron & I3 8', 'Celeron & I3 8', 'Celeron & I3 8', '2163732338', 'Celeron & I3 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 92, 400.00, 175.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1610, 'Celeron & I3 9', 'Celeron & I3 9', 'Celeron & I3 9', 'Celeron & I3 9', 'Celeron & I3 9', 'Celeron & I3 9', '1154018899', 'Celeron & I3 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 260.00, 153.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1611, 'Celeron & I3 10', 'Celeron & I3 10', 'Celeron & I3 10', 'Celeron & I3 10', 'Celeron & I3 10', 'Celeron & I3 10', '5288551896', 'Celeron & I3 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 470.00, 228.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1612, 'Celeron & I3 11', 'Celeron & I3 11', 'Celeron & I3 11', 'Celeron & I3 11', 'Celeron & I3 11', 'Celeron & I3 11', '5311294652', 'Celeron & I3 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 208.00, 291.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1613, 'Celeron & I3 12', 'Celeron & I3 12', 'Celeron & I3 12', 'Celeron & I3 12', 'Celeron & I3 12', 'Celeron & I3 12', '5063850839', 'Celeron & I3 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 475.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1614, 'Celeron & I3 13', 'Celeron & I3 13', 'Celeron & I3 13', 'Celeron & I3 13', 'Celeron & I3 13', 'Celeron & I3 13', '9522101384', 'Celeron & I3 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 303.00, 136.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1615, 'Celeron & I3 14', 'Celeron & I3 14', 'Celeron & I3 14', 'Celeron & I3 14', 'Celeron & I3 14', 'Celeron & I3 14', '4255077081', 'Celeron & I3 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 136.00, 183.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1616, 'Celeron & I3 15', 'Celeron & I3 15', 'Celeron & I3 15', 'Celeron & I3 15', 'Celeron & I3 15', 'Celeron & I3 15', '6880954994', 'Celeron & I3 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 284.00, 323.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1617, 'Celeron & I3 16', 'Celeron & I3 16', 'Celeron & I3 16', 'Celeron & I3 16', 'Celeron & I3 16', 'Celeron & I3 16', '6534926220', 'Celeron & I3 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 348.00, 312.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1618, 'Celeron & I3 17', 'Celeron & I3 17', 'Celeron & I3 17', 'Celeron & I3 17', 'Celeron & I3 17', 'Celeron & I3 17', '7373340420', 'Celeron & I3 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 455.00, 206.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1619, 'Celeron & I3 18', 'Celeron & I3 18', 'Celeron & I3 18', 'Celeron & I3 18', 'Celeron & I3 18', 'Celeron & I3 18', '1039345380', 'Celeron & I3 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 287.00, 188.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1620, 'Celeron & I3 19', 'Celeron & I3 19', 'Celeron & I3 19', 'Celeron & I3 19', 'Celeron & I3 19', 'Celeron & I3 19', '3729836230', 'Celeron & I3 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 366.00, 364.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1621, 'Celeron & I3 20', 'Celeron & I3 20', 'Celeron & I3 20', 'Celeron & I3 20', 'Celeron & I3 20', 'Celeron & I3 20', '2822086618', 'Celeron & I3 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 289.00, 360.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1622, 'Celeron & I3 21', 'Celeron & I3 21', 'Celeron & I3 21', 'Celeron & I3 21', 'Celeron & I3 21', 'Celeron & I3 21', '8164057293', 'Celeron & I3 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 208.00, 55.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1623, 'Celeron & I3 22', 'Celeron & I3 22', 'Celeron & I3 22', 'Celeron & I3 22', 'Celeron & I3 22', 'Celeron & I3 22', '3499614657', 'Celeron & I3 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 183.00, 255.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1624, 'Celeron & I3 23', 'Celeron & I3 23', 'Celeron & I3 23', 'Celeron & I3 23', 'Celeron & I3 23', 'Celeron & I3 23', '7209065374', 'Celeron & I3 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 323.00, 50.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1625, 'Celeron & I3 24', 'Celeron & I3 24', 'Celeron & I3 24', 'Celeron & I3 24', 'Celeron & I3 24', 'Celeron & I3 24', '6172819172', 'Celeron & I3 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 184.00, 147.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1626, 'Celeron & I3 25', 'Celeron & I3 25', 'Celeron & I3 25', 'Celeron & I3 25', 'Celeron & I3 25', 'Celeron & I3 25', '6323306711', 'Celeron & I3 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 379.00, 289.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1627, 'Celeron & I3 26', 'Celeron & I3 26', 'Celeron & I3 26', 'Celeron & I3 26', 'Celeron & I3 26', 'Celeron & I3 26', '5293995584', 'Celeron & I3 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 474.00, 65.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1628, 'Celeron & I3 27', 'Celeron & I3 27', 'Celeron & I3 27', 'Celeron & I3 27', 'Celeron & I3 27', 'Celeron & I3 27', '1123383666', 'Celeron & I3 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 420.00, 164.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1629, 'Celeron & I3 28', 'Celeron & I3 28', 'Celeron & I3 28', 'Celeron & I3 28', 'Celeron & I3 28', 'Celeron & I3 28', '2651949281', 'Celeron & I3 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 101.00, 173.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1630, 'Celeron & I3 29', 'Celeron & I3 29', 'Celeron & I3 29', 'Celeron & I3 29', 'Celeron & I3 29', 'Celeron & I3 29', '3463643079', 'Celeron & I3 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 225.00, 283.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1631, 'Celeron & I3 30', 'Celeron & I3 30', 'Celeron & I3 30', 'Celeron & I3 30', 'Celeron & I3 30', 'Celeron & I3 30', '1727917125', 'Celeron & I3 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 262.00, 257.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1632, 'Celeron & I3 31', 'Celeron & I3 31', 'Celeron & I3 31', 'Celeron & I3 31', 'Celeron & I3 31', 'Celeron & I3 31', '9363711502', 'Celeron & I3 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 396.00, 292.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1633, 'Celeron & I3 32', 'Celeron & I3 32', 'Celeron & I3 32', 'Celeron & I3 32', 'Celeron & I3 32', 'Celeron & I3 32', '1832949767', 'Celeron & I3 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 429.00, 111.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1634, 'Celeron & I3 33', 'Celeron & I3 33', 'Celeron & I3 33', 'Celeron & I3 33', 'Celeron & I3 33', 'Celeron & I3 33', '5713696687', 'Celeron & I3 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 289.00, 186.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1635, 'Celeron & I3 34', 'Celeron & I3 34', 'Celeron & I3 34', 'Celeron & I3 34', 'Celeron & I3 34', 'Celeron & I3 34', '4342092529', 'Celeron & I3 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 463.00, 259.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1636, 'Celeron & I3 35', 'Celeron & I3 35', 'Celeron & I3 35', 'Celeron & I3 35', 'Celeron & I3 35', 'Celeron & I3 35', '6210494083', 'Celeron & I3 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 169.00, 344.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1637, 'Celeron & I3 36', 'Celeron & I3 36', 'Celeron & I3 36', 'Celeron & I3 36', 'Celeron & I3 36', 'Celeron & I3 36', '3941584628', 'Celeron & I3 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 362.00, 360.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1638, 'Celeron & I3 37', 'Celeron & I3 37', 'Celeron & I3 37', 'Celeron & I3 37', 'Celeron & I3 37', 'Celeron & I3 37', '9310688617', 'Celeron & I3 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 239.00, 335.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1639, 'Celeron & I3 38', 'Celeron & I3 38', 'Celeron & I3 38', 'Celeron & I3 38', 'Celeron & I3 38', 'Celeron & I3 38', '1544635568', 'Celeron & I3 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 140.00, 394.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1640, 'Celeron & I3 39', 'Celeron & I3 39', 'Celeron & I3 39', 'Celeron & I3 39', 'Celeron & I3 39', 'Celeron & I3 39', '2354549601', 'Celeron & I3 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 335.00, 103.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1641, 'Celeron & I3 40', 'Celeron & I3 40', 'Celeron & I3 40', 'Celeron & I3 40', 'Celeron & I3 40', 'Celeron & I3 40', '1153093383', 'Celeron & I3 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 193.00, 222.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1642, 'Celeron & I3 41', 'Celeron & I3 41', 'Celeron & I3 41', 'Celeron & I3 41', 'Celeron & I3 41', 'Celeron & I3 41', '540065386', 'Celeron & I3 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 390.00, 70.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1643, 'Celeron & I3 42', 'Celeron & I3 42', 'Celeron & I3 42', 'Celeron & I3 42', 'Celeron & I3 42', 'Celeron & I3 42', '9216948558', 'Celeron & I3 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 482.00, 383.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1644, 'Celeron & I3 43', 'Celeron & I3 43', 'Celeron & I3 43', 'Celeron & I3 43', 'Celeron & I3 43', 'Celeron & I3 43', '5496433054', 'Celeron & I3 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 325.00, 70.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1645, 'Celeron & I3 44', 'Celeron & I3 44', 'Celeron & I3 44', 'Celeron & I3 44', 'Celeron & I3 44', 'Celeron & I3 44', '627375916', 'Celeron & I3 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 295.00, 305.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1646, 'Celeron & I3 45', 'Celeron & I3 45', 'Celeron & I3 45', 'Celeron & I3 45', 'Celeron & I3 45', 'Celeron & I3 45', '8214503632', 'Celeron & I3 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 229.00, 205.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1647, 'Celeron & I3 46', 'Celeron & I3 46', 'Celeron & I3 46', 'Celeron & I3 46', 'Celeron & I3 46', 'Celeron & I3 46', '1231603269', 'Celeron & I3 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 441.00, 258.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1648, 'Celeron & I3 47', 'Celeron & I3 47', 'Celeron & I3 47', 'Celeron & I3 47', 'Celeron & I3 47', 'Celeron & I3 47', '875979481', 'Celeron & I3 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 0, 306.00, 158.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1649, 'Celeron & I3 48', 'Celeron & I3 48', 'Celeron & I3 48', 'Celeron & I3 48', 'Celeron & I3 48', 'Celeron & I3 48', '3377080535', 'Celeron & I3 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 401.00, 50.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1650, 'Celeron & I3 49', 'Celeron & I3 49', 'Celeron & I3 49', 'Celeron & I3 49', 'Celeron & I3 49', 'Celeron & I3 49', '638403459', 'Celeron & I3 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 140.00, 233.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1651, 'Intel I5 0', 'Intel I5 0', 'Intel I5 0', 'Intel I5 0', 'Intel I5 0', 'Intel I5 0', '8593171088', 'Intel I5 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 484.00, 233.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1652, 'Intel I5 1', 'Intel I5 1', 'Intel I5 1', 'Intel I5 1', 'Intel I5 1', 'Intel I5 1', '7778344071', 'Intel I5 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 153.00, 127.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1653, 'Intel I5 2', 'Intel I5 2', 'Intel I5 2', 'Intel I5 2', 'Intel I5 2', 'Intel I5 2', '3034469607', 'Intel I5 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 355.00, 351.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1654, 'Intel I5 3', 'Intel I5 3', 'Intel I5 3', 'Intel I5 3', 'Intel I5 3', 'Intel I5 3', '2497126373', 'Intel I5 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 463.00, 307.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1655, 'Intel I5 4', 'Intel I5 4', 'Intel I5 4', 'Intel I5 4', 'Intel I5 4', 'Intel I5 4', '2658154096', 'Intel I5 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 202.00, 388.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1656, 'Intel I5 5', 'Intel I5 5', 'Intel I5 5', 'Intel I5 5', 'Intel I5 5', 'Intel I5 5', '25588484', 'Intel I5 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 361.00, 318.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1657, 'Intel I5 6', 'Intel I5 6', 'Intel I5 6', 'Intel I5 6', 'Intel I5 6', 'Intel I5 6', '5370871806', 'Intel I5 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 444.00, 394.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1658, 'Intel I5 7', 'Intel I5 7', 'Intel I5 7', 'Intel I5 7', 'Intel I5 7', 'Intel I5 7', '2022069409', 'Intel I5 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 457.00, 281.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1659, 'Intel I5 8', 'Intel I5 8', 'Intel I5 8', 'Intel I5 8', 'Intel I5 8', 'Intel I5 8', '1182032850', 'Intel I5 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 428.00, 357.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1660, 'Intel I5 9', 'Intel I5 9', 'Intel I5 9', 'Intel I5 9', 'Intel I5 9', 'Intel I5 9', '4657481411', 'Intel I5 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 142.00, 357.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1661, 'Intel I5 10', 'Intel I5 10', 'Intel I5 10', 'Intel I5 10', 'Intel I5 10', 'Intel I5 10', '5761662755', 'Intel I5 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 492.00, 310.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1662, 'Intel I5 11', 'Intel I5 11', 'Intel I5 11', 'Intel I5 11', 'Intel I5 11', 'Intel I5 11', '6859577143', 'Intel I5 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 48, 439.00, 261.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1663, 'Intel I5 12', 'Intel I5 12', 'Intel I5 12', 'Intel I5 12', 'Intel I5 12', 'Intel I5 12', '2752476312', 'Intel I5 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 361.00, 296.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1664, 'Intel I5 13', 'Intel I5 13', 'Intel I5 13', 'Intel I5 13', 'Intel I5 13', 'Intel I5 13', '5030565065', 'Intel I5 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 321.00, 266.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1665, 'Intel I5 14', 'Intel I5 14', 'Intel I5 14', 'Intel I5 14', 'Intel I5 14', 'Intel I5 14', '5937864727', 'Intel I5 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 471.00, 300.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1666, 'Intel I5 15', 'Intel I5 15', 'Intel I5 15', 'Intel I5 15', 'Intel I5 15', 'Intel I5 15', '7833797190', 'Intel I5 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 204.00, 392.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1667, 'Intel I5 16', 'Intel I5 16', 'Intel I5 16', 'Intel I5 16', 'Intel I5 16', 'Intel I5 16', '1412644292', 'Intel I5 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 263.00, 301.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1668, 'Intel I5 17', 'Intel I5 17', 'Intel I5 17', 'Intel I5 17', 'Intel I5 17', 'Intel I5 17', '9981686028', 'Intel I5 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 405.00, 194.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1669, 'Intel I5 18', 'Intel I5 18', 'Intel I5 18', 'Intel I5 18', 'Intel I5 18', 'Intel I5 18', '5442728352', 'Intel I5 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 403.00, 100.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1670, 'Intel I5 19', 'Intel I5 19', 'Intel I5 19', 'Intel I5 19', 'Intel I5 19', 'Intel I5 19', '7344859696', 'Intel I5 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 248.00, 335.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1671, 'Intel I5 20', 'Intel I5 20', 'Intel I5 20', 'Intel I5 20', 'Intel I5 20', 'Intel I5 20', '669683085', 'Intel I5 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 491.00, 101.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1672, 'Intel I5 21', 'Intel I5 21', 'Intel I5 21', 'Intel I5 21', 'Intel I5 21', 'Intel I5 21', '5183791941', 'Intel I5 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 222.00, 267.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1673, 'Intel I5 22', 'Intel I5 22', 'Intel I5 22', 'Intel I5 22', 'Intel I5 22', 'Intel I5 22', '2088347714', 'Intel I5 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 370.00, 346.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1674, 'Intel I5 23', 'Intel I5 23', 'Intel I5 23', 'Intel I5 23', 'Intel I5 23', 'Intel I5 23', '7282623781', 'Intel I5 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 494.00, 386.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1675, 'Intel I5 24', 'Intel I5 24', 'Intel I5 24', 'Intel I5 24', 'Intel I5 24', 'Intel I5 24', '175404659', 'Intel I5 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 408.00, 286.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1676, 'Intel I5 25', 'Intel I5 25', 'Intel I5 25', 'Intel I5 25', 'Intel I5 25', 'Intel I5 25', '3311895757', 'Intel I5 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 101.00, 395.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1677, 'Intel I5 26', 'Intel I5 26', 'Intel I5 26', 'Intel I5 26', 'Intel I5 26', 'Intel I5 26', '6452394791', 'Intel I5 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 455.00, 80.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1678, 'Intel I5 27', 'Intel I5 27', 'Intel I5 27', 'Intel I5 27', 'Intel I5 27', 'Intel I5 27', '9382754894', 'Intel I5 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 473.00, 313.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1679, 'Intel I5 28', 'Intel I5 28', 'Intel I5 28', 'Intel I5 28', 'Intel I5 28', 'Intel I5 28', '2371243697', 'Intel I5 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 216.00, 158.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1680, 'Intel I5 29', 'Intel I5 29', 'Intel I5 29', 'Intel I5 29', 'Intel I5 29', 'Intel I5 29', '8314706079', 'Intel I5 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 163.00, 192.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1681, 'Intel I5 30', 'Intel I5 30', 'Intel I5 30', 'Intel I5 30', 'Intel I5 30', 'Intel I5 30', '3168324065', 'Intel I5 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 262.00, 223.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1682, 'Intel I5 31', 'Intel I5 31', 'Intel I5 31', 'Intel I5 31', 'Intel I5 31', 'Intel I5 31', '1146010857', 'Intel I5 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 202.00, 226.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1683, 'Intel I5 32', 'Intel I5 32', 'Intel I5 32', 'Intel I5 32', 'Intel I5 32', 'Intel I5 32', '163452186', 'Intel I5 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 143.00, 200.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1684, 'Intel I5 33', 'Intel I5 33', 'Intel I5 33', 'Intel I5 33', 'Intel I5 33', 'Intel I5 33', '6416520241', 'Intel I5 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 246.00, 363.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1685, 'Intel I5 34', 'Intel I5 34', 'Intel I5 34', 'Intel I5 34', 'Intel I5 34', 'Intel I5 34', '1346821113', 'Intel I5 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 250.00, 88.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1686, 'Intel I5 35', 'Intel I5 35', 'Intel I5 35', 'Intel I5 35', 'Intel I5 35', 'Intel I5 35', '7544802539', 'Intel I5 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 100.00, 372.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1687, 'Intel I5 36', 'Intel I5 36', 'Intel I5 36', 'Intel I5 36', 'Intel I5 36', 'Intel I5 36', '3569649731', 'Intel I5 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 311.00, 336.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1688, 'Intel I5 37', 'Intel I5 37', 'Intel I5 37', 'Intel I5 37', 'Intel I5 37', 'Intel I5 37', '5010610655', 'Intel I5 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 498.00, 109.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1689, 'Intel I5 38', 'Intel I5 38', 'Intel I5 38', 'Intel I5 38', 'Intel I5 38', 'Intel I5 38', '1766319373', 'Intel I5 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 487.00, 369.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1690, 'Intel I5 39', 'Intel I5 39', 'Intel I5 39', 'Intel I5 39', 'Intel I5 39', 'Intel I5 39', '9143037129', 'Intel I5 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 192.00, 124.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1691, 'Intel I5 40', 'Intel I5 40', 'Intel I5 40', 'Intel I5 40', 'Intel I5 40', 'Intel I5 40', '2894672480', 'Intel I5 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 106.00, 134.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1692, 'Intel I5 41', 'Intel I5 41', 'Intel I5 41', 'Intel I5 41', 'Intel I5 41', 'Intel I5 41', '4581846570', 'Intel I5 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 360.00, 59.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1693, 'Intel I5 42', 'Intel I5 42', 'Intel I5 42', 'Intel I5 42', 'Intel I5 42', 'Intel I5 42', '8124595244', 'Intel I5 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 362.00, 279.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1694, 'Intel I5 43', 'Intel I5 43', 'Intel I5 43', 'Intel I5 43', 'Intel I5 43', 'Intel I5 43', '6176415937', 'Intel I5 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 153.00, 125.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1695, 'Intel I5 44', 'Intel I5 44', 'Intel I5 44', 'Intel I5 44', 'Intel I5 44', 'Intel I5 44', '2129265053', 'Intel I5 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 411.00, 161.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1696, 'Intel I5 45', 'Intel I5 45', 'Intel I5 45', 'Intel I5 45', 'Intel I5 45', 'Intel I5 45', '3030830649', 'Intel I5 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 240.00, 282.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1697, 'Intel I5 46', 'Intel I5 46', 'Intel I5 46', 'Intel I5 46', 'Intel I5 46', 'Intel I5 46', '7029738861', 'Intel I5 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 431.00, 322.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1698, 'Intel I5 47', 'Intel I5 47', 'Intel I5 47', 'Intel I5 47', 'Intel I5 47', 'Intel I5 47', '8906729598', 'Intel I5 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 373.00, 50.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1699, 'Intel I5 48', 'Intel I5 48', 'Intel I5 48', 'Intel I5 48', 'Intel I5 48', 'Intel I5 48', '9083411584', 'Intel I5 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 406.00, 391.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1700, 'Intel I5 49', 'Intel I5 49', 'Intel I5 49', 'Intel I5 49', 'Intel I5 49', 'Intel I5 49', '9579196472', 'Intel I5 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 153.00, 220.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1701, 'Intel I7 0', 'Intel I7 0', 'Intel I7 0', 'Intel I7 0', 'Intel I7 0', 'Intel I7 0', '6166855995', 'Intel I7 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 381.00, 355.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1702, 'Intel I7 1', 'Intel I7 1', 'Intel I7 1', 'Intel I7 1', 'Intel I7 1', 'Intel I7 1', '2750549105', 'Intel I7 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 151.00, 385.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1703, 'Intel I7 2', 'Intel I7 2', 'Intel I7 2', 'Intel I7 2', 'Intel I7 2', 'Intel I7 2', '6337313173', 'Intel I7 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 267.00, 238.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1704, 'Intel I7 3', 'Intel I7 3', 'Intel I7 3', 'Intel I7 3', 'Intel I7 3', 'Intel I7 3', '3034326405', 'Intel I7 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 274.00, 81.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1705, 'Intel I7 4', 'Intel I7 4', 'Intel I7 4', 'Intel I7 4', 'Intel I7 4', 'Intel I7 4', '8861154723', 'Intel I7 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 406.00, 96.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1706, 'Intel I7 5', 'Intel I7 5', 'Intel I7 5', 'Intel I7 5', 'Intel I7 5', 'Intel I7 5', '9309254127', 'Intel I7 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 219.00, 165.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1707, 'Intel I7 6', 'Intel I7 6', 'Intel I7 6', 'Intel I7 6', 'Intel I7 6', 'Intel I7 6', '4066347886', 'Intel I7 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 110.00, 109.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1708, 'Intel I7 7', 'Intel I7 7', 'Intel I7 7', 'Intel I7 7', 'Intel I7 7', 'Intel I7 7', '8786804509', 'Intel I7 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 467.00, 223.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1709, 'Intel I7 8', 'Intel I7 8', 'Intel I7 8', 'Intel I7 8', 'Intel I7 8', 'Intel I7 8', '987745334', 'Intel I7 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 119.00, 327.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1710, 'Intel I7 9', 'Intel I7 9', 'Intel I7 9', 'Intel I7 9', 'Intel I7 9', 'Intel I7 9', '2785882508', 'Intel I7 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 500.00, 319.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1711, 'Intel I7 10', 'Intel I7 10', 'Intel I7 10', 'Intel I7 10', 'Intel I7 10', 'Intel I7 10', '6061117908', 'Intel I7 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 324.00, 361.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1712, 'Intel I7 11', 'Intel I7 11', 'Intel I7 11', 'Intel I7 11', 'Intel I7 11', 'Intel I7 11', '109517055', 'Intel I7 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 133.00, 379.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1713, 'Intel I7 12', 'Intel I7 12', 'Intel I7 12', 'Intel I7 12', 'Intel I7 12', 'Intel I7 12', '9613052850', 'Intel I7 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 129.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1714, 'Intel I7 13', 'Intel I7 13', 'Intel I7 13', 'Intel I7 13', 'Intel I7 13', 'Intel I7 13', '5655748291', 'Intel I7 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 210.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1715, 'Intel I7 14', 'Intel I7 14', 'Intel I7 14', 'Intel I7 14', 'Intel I7 14', 'Intel I7 14', '4250352150', 'Intel I7 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 294.00, 160.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1716, 'Intel I7 15', 'Intel I7 15', 'Intel I7 15', 'Intel I7 15', 'Intel I7 15', 'Intel I7 15', '5641999730', 'Intel I7 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 373.00, 143.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1717, 'Intel I7 16', 'Intel I7 16', 'Intel I7 16', 'Intel I7 16', 'Intel I7 16', 'Intel I7 16', '7426889962', 'Intel I7 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 432.00, 314.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1718, 'Intel I7 17', 'Intel I7 17', 'Intel I7 17', 'Intel I7 17', 'Intel I7 17', 'Intel I7 17', '3762181466', 'Intel I7 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 445.00, 136.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1719, 'Intel I7 18', 'Intel I7 18', 'Intel I7 18', 'Intel I7 18', 'Intel I7 18', 'Intel I7 18', '4124645535', 'Intel I7 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 144.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1720, 'Intel I7 19', 'Intel I7 19', 'Intel I7 19', 'Intel I7 19', 'Intel I7 19', 'Intel I7 19', '7613958000', 'Intel I7 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 322.00, 60.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1721, 'Intel I7 20', 'Intel I7 20', 'Intel I7 20', 'Intel I7 20', 'Intel I7 20', 'Intel I7 20', '2340989793', 'Intel I7 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 424.00, 194.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1722, 'Intel I7 21', 'Intel I7 21', 'Intel I7 21', 'Intel I7 21', 'Intel I7 21', 'Intel I7 21', '7544302810', 'Intel I7 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 381.00, 169.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1723, 'Intel I7 22', 'Intel I7 22', 'Intel I7 22', 'Intel I7 22', 'Intel I7 22', 'Intel I7 22', '5000636639', 'Intel I7 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 451.00, 80.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1724, 'Intel I7 23', 'Intel I7 23', 'Intel I7 23', 'Intel I7 23', 'Intel I7 23', 'Intel I7 23', '4304577112', 'Intel I7 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 330.00, 119.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1725, 'Intel I7 24', 'Intel I7 24', 'Intel I7 24', 'Intel I7 24', 'Intel I7 24', 'Intel I7 24', '8883521487', 'Intel I7 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 388.00, 98.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1726, 'Intel I7 25', 'Intel I7 25', 'Intel I7 25', 'Intel I7 25', 'Intel I7 25', 'Intel I7 25', '7166232488', 'Intel I7 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 171.00, 329.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1727, 'Intel I7 26', 'Intel I7 26', 'Intel I7 26', 'Intel I7 26', 'Intel I7 26', 'Intel I7 26', '742633415', 'Intel I7 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 257.00, 83.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1728, 'Intel I7 27', 'Intel I7 27', 'Intel I7 27', 'Intel I7 27', 'Intel I7 27', 'Intel I7 27', '2605171506', 'Intel I7 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 279.00, 368.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1729, 'Intel I7 28', 'Intel I7 28', 'Intel I7 28', 'Intel I7 28', 'Intel I7 28', 'Intel I7 28', '1738024740', 'Intel I7 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 64, 485.00, 274.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1730, 'Intel I7 29', 'Intel I7 29', 'Intel I7 29', 'Intel I7 29', 'Intel I7 29', 'Intel I7 29', '5168797164', 'Intel I7 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 311.00, 193.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1731, 'Intel I7 30', 'Intel I7 30', 'Intel I7 30', 'Intel I7 30', 'Intel I7 30', 'Intel I7 30', '7615086419', 'Intel I7 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 226.00, 98.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1732, 'Intel I7 31', 'Intel I7 31', 'Intel I7 31', 'Intel I7 31', 'Intel I7 31', 'Intel I7 31', '5523825371', 'Intel I7 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 382.00, 195.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1733, 'Intel I7 32', 'Intel I7 32', 'Intel I7 32', 'Intel I7 32', 'Intel I7 32', 'Intel I7 32', '4798561816', 'Intel I7 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 318.00, 349.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1734, 'Intel I7 33', 'Intel I7 33', 'Intel I7 33', 'Intel I7 33', 'Intel I7 33', 'Intel I7 33', '2242368958', 'Intel I7 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 164.00, 160.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1735, 'Intel I7 34', 'Intel I7 34', 'Intel I7 34', 'Intel I7 34', 'Intel I7 34', 'Intel I7 34', '2987609795', 'Intel I7 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 132.00, 154.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1736, 'Intel I7 35', 'Intel I7 35', 'Intel I7 35', 'Intel I7 35', 'Intel I7 35', 'Intel I7 35', '6661813955', 'Intel I7 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 319.00, 299.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1737, 'Intel I7 36', 'Intel I7 36', 'Intel I7 36', 'Intel I7 36', 'Intel I7 36', 'Intel I7 36', '7443317239', 'Intel I7 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 368.00, 274.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1738, 'Intel I7 37', 'Intel I7 37', 'Intel I7 37', 'Intel I7 37', 'Intel I7 37', 'Intel I7 37', '121004090', 'Intel I7 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 114.00, 314.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1739, 'Intel I7 38', 'Intel I7 38', 'Intel I7 38', 'Intel I7 38', 'Intel I7 38', 'Intel I7 38', '8130572078', 'Intel I7 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 296.00, 115.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1740, 'Intel I7 39', 'Intel I7 39', 'Intel I7 39', 'Intel I7 39', 'Intel I7 39', 'Intel I7 39', '111146567', 'Intel I7 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 69, 208.00, 324.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1741, 'Intel I7 40', 'Intel I7 40', 'Intel I7 40', 'Intel I7 40', 'Intel I7 40', 'Intel I7 40', '4052212755', 'Intel I7 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 241.00, 143.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1742, 'Intel I7 41', 'Intel I7 41', 'Intel I7 41', 'Intel I7 41', 'Intel I7 41', 'Intel I7 41', '605021454', 'Intel I7 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 403.00, 398.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1743, 'Intel I7 42', 'Intel I7 42', 'Intel I7 42', 'Intel I7 42', 'Intel I7 42', 'Intel I7 42', '3887827214', 'Intel I7 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 273.00, 334.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1744, 'Intel I7 43', 'Intel I7 43', 'Intel I7 43', 'Intel I7 43', 'Intel I7 43', 'Intel I7 43', '4787552670', 'Intel I7 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 160.00, 340.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1745, 'Intel I7 44', 'Intel I7 44', 'Intel I7 44', 'Intel I7 44', 'Intel I7 44', 'Intel I7 44', '3337809788', 'Intel I7 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 99, 279.00, 237.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1746, 'Intel I7 45', 'Intel I7 45', 'Intel I7 45', 'Intel I7 45', 'Intel I7 45', 'Intel I7 45', '6854591482', 'Intel I7 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 105.00, 386.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1747, 'Intel I7 46', 'Intel I7 46', 'Intel I7 46', 'Intel I7 46', 'Intel I7 46', 'Intel I7 46', '4132533196', 'Intel I7 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 295.00, 191.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1748, 'Intel I7 47', 'Intel I7 47', 'Intel I7 47', 'Intel I7 47', 'Intel I7 47', 'Intel I7 47', '6519156426', 'Intel I7 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 225.00, 100.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1749, 'Intel I7 48', 'Intel I7 48', 'Intel I7 48', 'Intel I7 48', 'Intel I7 48', 'Intel I7 48', '4461119189', 'Intel I7 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 188.00, 283.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1750, 'Intel I7 49', 'Intel I7 49', 'Intel I7 49', 'Intel I7 49', 'Intel I7 49', 'Intel I7 49', '1451687915', 'Intel I7 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 445.00, 102.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1751, 'الشاشات 0', 'الشاشات 0', 'الشاشات 0', 'Monitors 0', 'Monitors 0', 'Monitors 0', '8132616062', 'Monitors 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 113.00, 240.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1752, 'الشاشات 1', 'الشاشات 1', 'الشاشات 1', 'Monitors 1', 'Monitors 1', 'Monitors 1', '1149356150', 'Monitors 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 270.00, 60.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1753, 'الشاشات 2', 'الشاشات 2', 'الشاشات 2', 'Monitors 2', 'Monitors 2', 'Monitors 2', '3866577510', 'Monitors 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 264.00, 393.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1754, 'الشاشات 3', 'الشاشات 3', 'الشاشات 3', 'Monitors 3', 'Monitors 3', 'Monitors 3', '7432283559', 'Monitors 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 433.00, 232.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1755, 'الشاشات 4', 'الشاشات 4', 'الشاشات 4', 'Monitors 4', 'Monitors 4', 'Monitors 4', '5021635932', 'Monitors 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 93, 329.00, 322.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1756, 'الشاشات 5', 'الشاشات 5', 'الشاشات 5', 'Monitors 5', 'Monitors 5', 'Monitors 5', '173424232', 'Monitors 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 266.00, 209.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1757, 'الشاشات 6', 'الشاشات 6', 'الشاشات 6', 'Monitors 6', 'Monitors 6', 'Monitors 6', '1134184349', 'Monitors 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 300.00, 178.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1758, 'الشاشات 7', 'الشاشات 7', 'الشاشات 7', 'Monitors 7', 'Monitors 7', 'Monitors 7', '2446497566', 'Monitors 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 317.00, 226.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1759, 'الشاشات 8', 'الشاشات 8', 'الشاشات 8', 'Monitors 8', 'Monitors 8', 'Monitors 8', '5805977908', 'Monitors 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 287.00, 304.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1760, 'الشاشات 9', 'الشاشات 9', 'الشاشات 9', 'Monitors 9', 'Monitors 9', 'Monitors 9', '1250140556', 'Monitors 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 488.00, 175.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1761, 'الشاشات 10', 'الشاشات 10', 'الشاشات 10', 'Monitors 10', 'Monitors 10', 'Monitors 10', '6160348321', 'Monitors 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 108.00, 53.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1762, 'الشاشات 11', 'الشاشات 11', 'الشاشات 11', 'Monitors 11', 'Monitors 11', 'Monitors 11', '2194335444', 'Monitors 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 279.00, 247.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1763, 'الشاشات 12', 'الشاشات 12', 'الشاشات 12', 'Monitors 12', 'Monitors 12', 'Monitors 12', '5938675557', 'Monitors 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 378.00, 362.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1764, 'الشاشات 13', 'الشاشات 13', 'الشاشات 13', 'Monitors 13', 'Monitors 13', 'Monitors 13', '8426083354', 'Monitors 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 53, 361.00, 274.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1765, 'الشاشات 14', 'الشاشات 14', 'الشاشات 14', 'Monitors 14', 'Monitors 14', 'Monitors 14', '2343141406', 'Monitors 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 335.00, 188.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1766, 'الشاشات 15', 'الشاشات 15', 'الشاشات 15', 'Monitors 15', 'Monitors 15', 'Monitors 15', '9253220857', 'Monitors 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 259.00, 270.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1767, 'الشاشات 16', 'الشاشات 16', 'الشاشات 16', 'Monitors 16', 'Monitors 16', 'Monitors 16', '9292493288', 'Monitors 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 264.00, 146.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1768, 'الشاشات 17', 'الشاشات 17', 'الشاشات 17', 'Monitors 17', 'Monitors 17', 'Monitors 17', '8965279664', 'Monitors 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 398.00, 290.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1769, 'الشاشات 18', 'الشاشات 18', 'الشاشات 18', 'Monitors 18', 'Monitors 18', 'Monitors 18', '538102236', 'Monitors 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 189.00, 57.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1770, 'الشاشات 19', 'الشاشات 19', 'الشاشات 19', 'Monitors 19', 'Monitors 19', 'Monitors 19', '1088335605', 'Monitors 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 144.00, 156.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1771, 'الشاشات 20', 'الشاشات 20', 'الشاشات 20', 'Monitors 20', 'Monitors 20', 'Monitors 20', '6981602290', 'Monitors 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 101.00, 336.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1772, 'الشاشات 21', 'الشاشات 21', 'الشاشات 21', 'Monitors 21', 'Monitors 21', 'Monitors 21', '4023646802', 'Monitors 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 135.00, 83.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1773, 'الشاشات 22', 'الشاشات 22', 'الشاشات 22', 'Monitors 22', 'Monitors 22', 'Monitors 22', '3226887308', 'Monitors 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 272.00, 229.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1774, 'الشاشات 23', 'الشاشات 23', 'الشاشات 23', 'Monitors 23', 'Monitors 23', 'Monitors 23', '9051608844', 'Monitors 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 314.00, 51.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1775, 'الشاشات 24', 'الشاشات 24', 'الشاشات 24', 'Monitors 24', 'Monitors 24', 'Monitors 24', '6613051261', 'Monitors 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 389.00, 168.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1776, 'الشاشات 25', 'الشاشات 25', 'الشاشات 25', 'Monitors 25', 'Monitors 25', 'Monitors 25', '9489659931', 'Monitors 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 317.00, 58.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1777, 'الشاشات 26', 'الشاشات 26', 'الشاشات 26', 'Monitors 26', 'Monitors 26', 'Monitors 26', '1697509356', 'Monitors 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 197.00, 379.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1778, 'الشاشات 27', 'الشاشات 27', 'الشاشات 27', 'Monitors 27', 'Monitors 27', 'Monitors 27', '392524557', 'Monitors 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 299.00, 74.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1779, 'الشاشات 28', 'الشاشات 28', 'الشاشات 28', 'Monitors 28', 'Monitors 28', 'Monitors 28', '3739928950', 'Monitors 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 448.00, 229.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1780, 'الشاشات 29', 'الشاشات 29', 'الشاشات 29', 'Monitors 29', 'Monitors 29', 'Monitors 29', '28240284', 'Monitors 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 488.00, 341.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1781, 'الشاشات 30', 'الشاشات 30', 'الشاشات 30', 'Monitors 30', 'Monitors 30', 'Monitors 30', '1555014385', 'Monitors 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 158.00, 319.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1782, 'الشاشات 31', 'الشاشات 31', 'الشاشات 31', 'Monitors 31', 'Monitors 31', 'Monitors 31', '2850623809', 'Monitors 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 444.00, 219.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1783, 'الشاشات 32', 'الشاشات 32', 'الشاشات 32', 'Monitors 32', 'Monitors 32', 'Monitors 32', '9062826996', 'Monitors 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 410.00, 193.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1784, 'الشاشات 33', 'الشاشات 33', 'الشاشات 33', 'Monitors 33', 'Monitors 33', 'Monitors 33', '1589169354', 'Monitors 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 103.00, 82.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1785, 'الشاشات 34', 'الشاشات 34', 'الشاشات 34', 'Monitors 34', 'Monitors 34', 'Monitors 34', '7305118819', 'Monitors 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 444.00, 278.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1786, 'الشاشات 35', 'الشاشات 35', 'الشاشات 35', 'Monitors 35', 'Monitors 35', 'Monitors 35', '9743947688', 'Monitors 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 413.00, 169.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1787, 'الشاشات 36', 'الشاشات 36', 'الشاشات 36', 'Monitors 36', 'Monitors 36', 'Monitors 36', '1306055595', 'Monitors 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 112.00, 69.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1788, 'الشاشات 37', 'الشاشات 37', 'الشاشات 37', 'Monitors 37', 'Monitors 37', 'Monitors 37', '5943267772', 'Monitors 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 68, 115.00, 382.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1789, 'الشاشات 38', 'الشاشات 38', 'الشاشات 38', 'Monitors 38', 'Monitors 38', 'Monitors 38', '1041731639', 'Monitors 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 378.00, 274.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1790, 'الشاشات 39', 'الشاشات 39', 'الشاشات 39', 'Monitors 39', 'Monitors 39', 'Monitors 39', '1064075892', 'Monitors 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 413.00, 217.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1791, 'الشاشات 40', 'الشاشات 40', 'الشاشات 40', 'Monitors 40', 'Monitors 40', 'Monitors 40', '90461300', 'Monitors 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 327.00, 282.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1792, 'الشاشات 41', 'الشاشات 41', 'الشاشات 41', 'Monitors 41', 'Monitors 41', 'Monitors 41', '3548341567', 'Monitors 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 143.00, 186.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1793, 'الشاشات 42', 'الشاشات 42', 'الشاشات 42', 'Monitors 42', 'Monitors 42', 'Monitors 42', '6161122190', 'Monitors 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 123.00, 143.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1794, 'الشاشات 43', 'الشاشات 43', 'الشاشات 43', 'Monitors 43', 'Monitors 43', 'Monitors 43', '5826583131', 'Monitors 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 359.00, 368.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1795, 'الشاشات 44', 'الشاشات 44', 'الشاشات 44', 'Monitors 44', 'Monitors 44', 'Monitors 44', '4933345856', 'Monitors 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 203.00, 262.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1796, 'الشاشات 45', 'الشاشات 45', 'الشاشات 45', 'Monitors 45', 'Monitors 45', 'Monitors 45', '2733311530', 'Monitors 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 366.00, 345.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1797, 'الشاشات 46', 'الشاشات 46', 'الشاشات 46', 'Monitors 46', 'Monitors 46', 'Monitors 46', '7988057887', 'Monitors 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 489.00, 91.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1798, 'الشاشات 47', 'الشاشات 47', 'الشاشات 47', 'Monitors 47', 'Monitors 47', 'Monitors 47', '3859051789', 'Monitors 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 211.00, 74.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1799, 'الشاشات 48', 'الشاشات 48', 'الشاشات 48', 'Monitors 48', 'Monitors 48', 'Monitors 48', '8710346715', 'Monitors 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 492.00, 179.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1800, 'الشاشات 49', 'الشاشات 49', 'الشاشات 49', 'Monitors 49', 'Monitors 49', 'Monitors 49', '8687204520', 'Monitors 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 159.00, 380.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1801, '60-75Hz 0', '60-75Hz 0', '60-75Hz 0', '60-75Hz 0', '60-75Hz 0', '60-75Hz 0', '7504942670', '60-75Hz 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 318.00, 232.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1802, '60-75Hz 1', '60-75Hz 1', '60-75Hz 1', '60-75Hz 1', '60-75Hz 1', '60-75Hz 1', '1032669906', '60-75Hz 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 226.00, 112.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1803, '60-75Hz 2', '60-75Hz 2', '60-75Hz 2', '60-75Hz 2', '60-75Hz 2', '60-75Hz 2', '794341678', '60-75Hz 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 100, 485.00, 238.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1804, '60-75Hz 3', '60-75Hz 3', '60-75Hz 3', '60-75Hz 3', '60-75Hz 3', '60-75Hz 3', '4954002739', '60-75Hz 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 235.00, 282.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1805, '60-75Hz 4', '60-75Hz 4', '60-75Hz 4', '60-75Hz 4', '60-75Hz 4', '60-75Hz 4', '2767412700', '60-75Hz 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 372.00, 250.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1806, '60-75Hz 5', '60-75Hz 5', '60-75Hz 5', '60-75Hz 5', '60-75Hz 5', '60-75Hz 5', '3438863652', '60-75Hz 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 158.00, 357.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1807, '60-75Hz 6', '60-75Hz 6', '60-75Hz 6', '60-75Hz 6', '60-75Hz 6', '60-75Hz 6', '3008115569', '60-75Hz 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 489.00, 117.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1808, '60-75Hz 7', '60-75Hz 7', '60-75Hz 7', '60-75Hz 7', '60-75Hz 7', '60-75Hz 7', '9521383915', '60-75Hz 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 448.00, 135.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1809, '60-75Hz 8', '60-75Hz 8', '60-75Hz 8', '60-75Hz 8', '60-75Hz 8', '60-75Hz 8', '3969961508', '60-75Hz 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 129.00, 224.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1810, '60-75Hz 9', '60-75Hz 9', '60-75Hz 9', '60-75Hz 9', '60-75Hz 9', '60-75Hz 9', '6159214257', '60-75Hz 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 236.00, 210.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1811, '60-75Hz 10', '60-75Hz 10', '60-75Hz 10', '60-75Hz 10', '60-75Hz 10', '60-75Hz 10', '5317238718', '60-75Hz 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 196.00, 180.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1812, '60-75Hz 11', '60-75Hz 11', '60-75Hz 11', '60-75Hz 11', '60-75Hz 11', '60-75Hz 11', '5994264125', '60-75Hz 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 355.00, 150.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1813, '60-75Hz 12', '60-75Hz 12', '60-75Hz 12', '60-75Hz 12', '60-75Hz 12', '60-75Hz 12', '1803588279', '60-75Hz 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 361.00, 92.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1814, '60-75Hz 13', '60-75Hz 13', '60-75Hz 13', '60-75Hz 13', '60-75Hz 13', '60-75Hz 13', '7111377530', '60-75Hz 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 332.00, 79.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1815, '60-75Hz 14', '60-75Hz 14', '60-75Hz 14', '60-75Hz 14', '60-75Hz 14', '60-75Hz 14', '9643601215', '60-75Hz 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 22, 108.00, 125.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1816, '60-75Hz 15', '60-75Hz 15', '60-75Hz 15', '60-75Hz 15', '60-75Hz 15', '60-75Hz 15', '318473648', '60-75Hz 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 343.00, 374.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1817, '60-75Hz 16', '60-75Hz 16', '60-75Hz 16', '60-75Hz 16', '60-75Hz 16', '60-75Hz 16', '1419510747', '60-75Hz 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 167.00, 217.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1818, '60-75Hz 17', '60-75Hz 17', '60-75Hz 17', '60-75Hz 17', '60-75Hz 17', '60-75Hz 17', '9458442309', '60-75Hz 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 271.00, 251.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1819, '60-75Hz 18', '60-75Hz 18', '60-75Hz 18', '60-75Hz 18', '60-75Hz 18', '60-75Hz 18', '1874474078', '60-75Hz 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 49, 490.00, 321.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1820, '60-75Hz 19', '60-75Hz 19', '60-75Hz 19', '60-75Hz 19', '60-75Hz 19', '60-75Hz 19', '471025496', '60-75Hz 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 75, 492.00, 371.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1821, '60-75Hz 20', '60-75Hz 20', '60-75Hz 20', '60-75Hz 20', '60-75Hz 20', '60-75Hz 20', '2524029661', '60-75Hz 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 319.00, 382.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1822, '60-75Hz 21', '60-75Hz 21', '60-75Hz 21', '60-75Hz 21', '60-75Hz 21', '60-75Hz 21', '800379205', '60-75Hz 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 306.00, 212.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1823, '60-75Hz 22', '60-75Hz 22', '60-75Hz 22', '60-75Hz 22', '60-75Hz 22', '60-75Hz 22', '1880434606', '60-75Hz 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 302.00, 311.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1824, '60-75Hz 23', '60-75Hz 23', '60-75Hz 23', '60-75Hz 23', '60-75Hz 23', '60-75Hz 23', '5815787735', '60-75Hz 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 467.00, 51.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1825, '60-75Hz 24', '60-75Hz 24', '60-75Hz 24', '60-75Hz 24', '60-75Hz 24', '60-75Hz 24', '5698415890', '60-75Hz 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 10, 259.00, 382.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1826, '60-75Hz 25', '60-75Hz 25', '60-75Hz 25', '60-75Hz 25', '60-75Hz 25', '60-75Hz 25', '8956090079', '60-75Hz 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 440.00, 54.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1827, '60-75Hz 26', '60-75Hz 26', '60-75Hz 26', '60-75Hz 26', '60-75Hz 26', '60-75Hz 26', '803052800', '60-75Hz 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 245.00, 111.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1828, '60-75Hz 27', '60-75Hz 27', '60-75Hz 27', '60-75Hz 27', '60-75Hz 27', '60-75Hz 27', '2602940383', '60-75Hz 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 439.00, 224.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1829, '60-75Hz 28', '60-75Hz 28', '60-75Hz 28', '60-75Hz 28', '60-75Hz 28', '60-75Hz 28', '7487658635', '60-75Hz 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 76, 428.00, 113.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1830, '60-75Hz 29', '60-75Hz 29', '60-75Hz 29', '60-75Hz 29', '60-75Hz 29', '60-75Hz 29', '6759502089', '60-75Hz 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 406.00, 373.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1831, '60-75Hz 30', '60-75Hz 30', '60-75Hz 30', '60-75Hz 30', '60-75Hz 30', '60-75Hz 30', '1212627642', '60-75Hz 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 73, 255.00, 314.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1832, '60-75Hz 31', '60-75Hz 31', '60-75Hz 31', '60-75Hz 31', '60-75Hz 31', '60-75Hz 31', '5445877807', '60-75Hz 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 38, 304.00, 162.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1833, '60-75Hz 32', '60-75Hz 32', '60-75Hz 32', '60-75Hz 32', '60-75Hz 32', '60-75Hz 32', '8169666895', '60-75Hz 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 145.00, 295.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1834, '60-75Hz 33', '60-75Hz 33', '60-75Hz 33', '60-75Hz 33', '60-75Hz 33', '60-75Hz 33', '5083424299', '60-75Hz 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 58, 474.00, 287.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1835, '60-75Hz 34', '60-75Hz 34', '60-75Hz 34', '60-75Hz 34', '60-75Hz 34', '60-75Hz 34', '9124827812', '60-75Hz 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 322.00, 137.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1836, '60-75Hz 35', '60-75Hz 35', '60-75Hz 35', '60-75Hz 35', '60-75Hz 35', '60-75Hz 35', '4340644790', '60-75Hz 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 383.00, 213.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1837, '60-75Hz 36', '60-75Hz 36', '60-75Hz 36', '60-75Hz 36', '60-75Hz 36', '60-75Hz 36', '629620750', '60-75Hz 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 438.00, 196.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1838, '60-75Hz 37', '60-75Hz 37', '60-75Hz 37', '60-75Hz 37', '60-75Hz 37', '60-75Hz 37', '494177512', '60-75Hz 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 415.00, 59.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1839, '60-75Hz 38', '60-75Hz 38', '60-75Hz 38', '60-75Hz 38', '60-75Hz 38', '60-75Hz 38', '5490582682', '60-75Hz 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 3, 308.00, 359.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1840, '60-75Hz 39', '60-75Hz 39', '60-75Hz 39', '60-75Hz 39', '60-75Hz 39', '60-75Hz 39', '1284910924', '60-75Hz 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 263.00, 106.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1841, '60-75Hz 40', '60-75Hz 40', '60-75Hz 40', '60-75Hz 40', '60-75Hz 40', '60-75Hz 40', '5660877090', '60-75Hz 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 165.00, 240.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1842, '60-75Hz 41', '60-75Hz 41', '60-75Hz 41', '60-75Hz 41', '60-75Hz 41', '60-75Hz 41', '5347954694', '60-75Hz 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 160.00, 364.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1843, '60-75Hz 42', '60-75Hz 42', '60-75Hz 42', '60-75Hz 42', '60-75Hz 42', '60-75Hz 42', '8566837596', '60-75Hz 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 152.00, 110.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1844, '60-75Hz 43', '60-75Hz 43', '60-75Hz 43', '60-75Hz 43', '60-75Hz 43', '60-75Hz 43', '7150393824', '60-75Hz 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 206.00, 151.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1845, '60-75Hz 44', '60-75Hz 44', '60-75Hz 44', '60-75Hz 44', '60-75Hz 44', '60-75Hz 44', '8923031836', '60-75Hz 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 218.00, 162.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1846, '60-75Hz 45', '60-75Hz 45', '60-75Hz 45', '60-75Hz 45', '60-75Hz 45', '60-75Hz 45', '897361550', '60-75Hz 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 436.00, 213.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1847, '60-75Hz 46', '60-75Hz 46', '60-75Hz 46', '60-75Hz 46', '60-75Hz 46', '60-75Hz 46', '1970525521', '60-75Hz 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 466.00, 261.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1848, '60-75Hz 47', '60-75Hz 47', '60-75Hz 47', '60-75Hz 47', '60-75Hz 47', '60-75Hz 47', '6103146385', '60-75Hz 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 70, 413.00, 212.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1849, '60-75Hz 48', '60-75Hz 48', '60-75Hz 48', '60-75Hz 48', '60-75Hz 48', '60-75Hz 48', '8547321871', '60-75Hz 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 269.00, 95.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1850, '60-75Hz 49', '60-75Hz 49', '60-75Hz 49', '60-75Hz 49', '60-75Hz 49', '60-75Hz 49', '541467350', '60-75Hz 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 56, 236.00, 71.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1851, '120-144-165Hz 0', '120-144-165Hz 0', '120-144-165Hz 0', '120-144-165Hz 0', '120-144-165Hz 0', '120-144-165Hz 0', '9718038695', '120-144-165Hz 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 254.00, 263.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1852, '120-144-165Hz 1', '120-144-165Hz 1', '120-144-165Hz 1', '120-144-165Hz 1', '120-144-165Hz 1', '120-144-165Hz 1', '6759717419', '120-144-165Hz 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 335.00, 341.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1853, '120-144-165Hz 2', '120-144-165Hz 2', '120-144-165Hz 2', '120-144-165Hz 2', '120-144-165Hz 2', '120-144-165Hz 2', '9090368299', '120-144-165Hz 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 115.00, 258.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1854, '120-144-165Hz 3', '120-144-165Hz 3', '120-144-165Hz 3', '120-144-165Hz 3', '120-144-165Hz 3', '120-144-165Hz 3', '8573891567', '120-144-165Hz 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 89, 243.00, 122.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1855, '120-144-165Hz 4', '120-144-165Hz 4', '120-144-165Hz 4', '120-144-165Hz 4', '120-144-165Hz 4', '120-144-165Hz 4', '2045235375', '120-144-165Hz 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 402.00, 148.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1856, '120-144-165Hz 5', '120-144-165Hz 5', '120-144-165Hz 5', '120-144-165Hz 5', '120-144-165Hz 5', '120-144-165Hz 5', '6093973031', '120-144-165Hz 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 224.00, 324.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1857, '120-144-165Hz 6', '120-144-165Hz 6', '120-144-165Hz 6', '120-144-165Hz 6', '120-144-165Hz 6', '120-144-165Hz 6', '7651891583', '120-144-165Hz 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 130.00, 122.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1858, '120-144-165Hz 7', '120-144-165Hz 7', '120-144-165Hz 7', '120-144-165Hz 7', '120-144-165Hz 7', '120-144-165Hz 7', '9003510106', '120-144-165Hz 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 253.00, 265.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1859, '120-144-165Hz 8', '120-144-165Hz 8', '120-144-165Hz 8', '120-144-165Hz 8', '120-144-165Hz 8', '120-144-165Hz 8', '5080824106', '120-144-165Hz 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 236.00, 244.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1860, '120-144-165Hz 9', '120-144-165Hz 9', '120-144-165Hz 9', '120-144-165Hz 9', '120-144-165Hz 9', '120-144-165Hz 9', '7116042793', '120-144-165Hz 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 259.00, 358.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1861, '120-144-165Hz 10', '120-144-165Hz 10', '120-144-165Hz 10', '120-144-165Hz 10', '120-144-165Hz 10', '120-144-165Hz 10', '6905764389', '120-144-165Hz 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 343.00, 52.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1862, '120-144-165Hz 11', '120-144-165Hz 11', '120-144-165Hz 11', '120-144-165Hz 11', '120-144-165Hz 11', '120-144-165Hz 11', '3478191198', '120-144-165Hz 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 31, 227.00, 110.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1863, '120-144-165Hz 12', '120-144-165Hz 12', '120-144-165Hz 12', '120-144-165Hz 12', '120-144-165Hz 12', '120-144-165Hz 12', '193611513', '120-144-165Hz 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 45, 260.00, 97.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1864, '120-144-165Hz 13', '120-144-165Hz 13', '120-144-165Hz 13', '120-144-165Hz 13', '120-144-165Hz 13', '120-144-165Hz 13', '9069828904', '120-144-165Hz 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 341.00, 68.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1865, '120-144-165Hz 14', '120-144-165Hz 14', '120-144-165Hz 14', '120-144-165Hz 14', '120-144-165Hz 14', '120-144-165Hz 14', '6134238718', '120-144-165Hz 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 119.00, 198.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1866, '120-144-165Hz 15', '120-144-165Hz 15', '120-144-165Hz 15', '120-144-165Hz 15', '120-144-165Hz 15', '120-144-165Hz 15', '3749369323', '120-144-165Hz 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 225.00, 308.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1867, '120-144-165Hz 16', '120-144-165Hz 16', '120-144-165Hz 16', '120-144-165Hz 16', '120-144-165Hz 16', '120-144-165Hz 16', '8810282457', '120-144-165Hz 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 462.00, 219.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1868, '120-144-165Hz 17', '120-144-165Hz 17', '120-144-165Hz 17', '120-144-165Hz 17', '120-144-165Hz 17', '120-144-165Hz 17', '3049920208', '120-144-165Hz 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 379.00, 80.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1869, '120-144-165Hz 18', '120-144-165Hz 18', '120-144-165Hz 18', '120-144-165Hz 18', '120-144-165Hz 18', '120-144-165Hz 18', '7898911696', '120-144-165Hz 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 409.00, 273.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1870, '120-144-165Hz 19', '120-144-165Hz 19', '120-144-165Hz 19', '120-144-165Hz 19', '120-144-165Hz 19', '120-144-165Hz 19', '5887644456', '120-144-165Hz 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 256.00, 134.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1871, '120-144-165Hz 20', '120-144-165Hz 20', '120-144-165Hz 20', '120-144-165Hz 20', '120-144-165Hz 20', '120-144-165Hz 20', '658692643', '120-144-165Hz 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 441.00, 234.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1872, '120-144-165Hz 21', '120-144-165Hz 21', '120-144-165Hz 21', '120-144-165Hz 21', '120-144-165Hz 21', '120-144-165Hz 21', '8213027750', '120-144-165Hz 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 328.00, 304.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1873, '120-144-165Hz 22', '120-144-165Hz 22', '120-144-165Hz 22', '120-144-165Hz 22', '120-144-165Hz 22', '120-144-165Hz 22', '6362944289', '120-144-165Hz 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 150.00, 226.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1874, '120-144-165Hz 23', '120-144-165Hz 23', '120-144-165Hz 23', '120-144-165Hz 23', '120-144-165Hz 23', '120-144-165Hz 23', '7034203114', '120-144-165Hz 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 162.00, 191.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1875, '120-144-165Hz 24', '120-144-165Hz 24', '120-144-165Hz 24', '120-144-165Hz 24', '120-144-165Hz 24', '120-144-165Hz 24', '3574547376', '120-144-165Hz 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 213.00, 117.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1876, '120-144-165Hz 25', '120-144-165Hz 25', '120-144-165Hz 25', '120-144-165Hz 25', '120-144-165Hz 25', '120-144-165Hz 25', '7029611110', '120-144-165Hz 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 176.00, 171.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1877, '120-144-165Hz 26', '120-144-165Hz 26', '120-144-165Hz 26', '120-144-165Hz 26', '120-144-165Hz 26', '120-144-165Hz 26', '1201314966', '120-144-165Hz 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 55, 260.00, 269.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1878, '120-144-165Hz 27', '120-144-165Hz 27', '120-144-165Hz 27', '120-144-165Hz 27', '120-144-165Hz 27', '120-144-165Hz 27', '2796914648', '120-144-165Hz 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 81, 267.00, 200.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1879, '120-144-165Hz 28', '120-144-165Hz 28', '120-144-165Hz 28', '120-144-165Hz 28', '120-144-165Hz 28', '120-144-165Hz 28', '6472146477', '120-144-165Hz 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 135.00, 160.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1880, '120-144-165Hz 29', '120-144-165Hz 29', '120-144-165Hz 29', '120-144-165Hz 29', '120-144-165Hz 29', '120-144-165Hz 29', '8988728452', '120-144-165Hz 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 493.00, 261.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1881, '120-144-165Hz 30', '120-144-165Hz 30', '120-144-165Hz 30', '120-144-165Hz 30', '120-144-165Hz 30', '120-144-165Hz 30', '2488103725', '120-144-165Hz 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 188.00, 115.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1882, '120-144-165Hz 31', '120-144-165Hz 31', '120-144-165Hz 31', '120-144-165Hz 31', '120-144-165Hz 31', '120-144-165Hz 31', '4432069853', '120-144-165Hz 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 241.00, 106.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1883, '120-144-165Hz 32', '120-144-165Hz 32', '120-144-165Hz 32', '120-144-165Hz 32', '120-144-165Hz 32', '120-144-165Hz 32', '3712944781', '120-144-165Hz 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 36, 124.00, 252.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1884, '120-144-165Hz 33', '120-144-165Hz 33', '120-144-165Hz 33', '120-144-165Hz 33', '120-144-165Hz 33', '120-144-165Hz 33', '406192873', '120-144-165Hz 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 18, 478.00, 225.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1885, '120-144-165Hz 34', '120-144-165Hz 34', '120-144-165Hz 34', '120-144-165Hz 34', '120-144-165Hz 34', '120-144-165Hz 34', '8877451076', '120-144-165Hz 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 276.00, 132.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1886, '120-144-165Hz 35', '120-144-165Hz 35', '120-144-165Hz 35', '120-144-165Hz 35', '120-144-165Hz 35', '120-144-165Hz 35', '4622845053', '120-144-165Hz 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 103.00, 206.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1887, '120-144-165Hz 36', '120-144-165Hz 36', '120-144-165Hz 36', '120-144-165Hz 36', '120-144-165Hz 36', '120-144-165Hz 36', '5519335911', '120-144-165Hz 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 6, 147.00, 226.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1888, '120-144-165Hz 37', '120-144-165Hz 37', '120-144-165Hz 37', '120-144-165Hz 37', '120-144-165Hz 37', '120-144-165Hz 37', '4991338954', '120-144-165Hz 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 60, 173.00, 159.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1889, '120-144-165Hz 38', '120-144-165Hz 38', '120-144-165Hz 38', '120-144-165Hz 38', '120-144-165Hz 38', '120-144-165Hz 38', '4611287297', '120-144-165Hz 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 128.00, 160.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1890, '120-144-165Hz 39', '120-144-165Hz 39', '120-144-165Hz 39', '120-144-165Hz 39', '120-144-165Hz 39', '120-144-165Hz 39', '5016552429', '120-144-165Hz 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 463.00, 257.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 0, NULL, 0),
(1891, '120-144-165Hz 40', '120-144-165Hz 40', '120-144-165Hz 40', '120-144-165Hz 40', '120-144-165Hz 40', '120-144-165Hz 40', '3445267463', '120-144-165Hz 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 324.00, 71.00, NULL, '2022-04-04 10:32:05', '2022-04-04 10:32:05', 1, 0, 1, NULL, 0),
(1892, '120-144-165Hz 41', '120-144-165Hz 41', '120-144-165Hz 41', '120-144-165Hz 41', '120-144-165Hz 41', '120-144-165Hz 41', '3517457639', '120-144-165Hz 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 160.00, 160.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1893, '120-144-165Hz 42', '120-144-165Hz 42', '120-144-165Hz 42', '120-144-165Hz 42', '120-144-165Hz 42', '120-144-165Hz 42', '9370579220', '120-144-165Hz 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 94, 347.00, 389.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1894, '120-144-165Hz 43', '120-144-165Hz 43', '120-144-165Hz 43', '120-144-165Hz 43', '120-144-165Hz 43', '120-144-165Hz 43', '9891890572', '120-144-165Hz 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 12, 345.00, 213.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1895, '120-144-165Hz 44', '120-144-165Hz 44', '120-144-165Hz 44', '120-144-165Hz 44', '120-144-165Hz 44', '120-144-165Hz 44', '1339093971', '120-144-165Hz 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 80, 173.00, 251.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1896, '120-144-165Hz 45', '120-144-165Hz 45', '120-144-165Hz 45', '120-144-165Hz 45', '120-144-165Hz 45', '120-144-165Hz 45', '1887622073', '120-144-165Hz 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 387.00, 78.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1897, '120-144-165Hz 46', '120-144-165Hz 46', '120-144-165Hz 46', '120-144-165Hz 46', '120-144-165Hz 46', '120-144-165Hz 46', '7086039123', '120-144-165Hz 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 494.00, 151.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1898, '120-144-165Hz 47', '120-144-165Hz 47', '120-144-165Hz 47', '120-144-165Hz 47', '120-144-165Hz 47', '120-144-165Hz 47', '4653353321', '120-144-165Hz 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 248.00, 357.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1899, '120-144-165Hz 48', '120-144-165Hz 48', '120-144-165Hz 48', '120-144-165Hz 48', '120-144-165Hz 48', '120-144-165Hz 48', '4787101222', '120-144-165Hz 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 4, 237.00, 195.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1900, '120-144-165Hz 49', '120-144-165Hz 49', '120-144-165Hz 49', '120-144-165Hz 49', '120-144-165Hz 49', '120-144-165Hz 49', '101718167', '120-144-165Hz 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 100.00, 170.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1901, '240hz-360hz 0', '240hz-360hz 0', '240hz-360hz 0', '240hz-360hz 0', '240hz-360hz 0', '240hz-360hz 0', '2921036181', '240hz-360hz 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 413.00, 256.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1902, '240hz-360hz 1', '240hz-360hz 1', '240hz-360hz 1', '240hz-360hz 1', '240hz-360hz 1', '240hz-360hz 1', '2750304272', '240hz-360hz 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 186.00, 159.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1903, '240hz-360hz 2', '240hz-360hz 2', '240hz-360hz 2', '240hz-360hz 2', '240hz-360hz 2', '240hz-360hz 2', '6106092141', '240hz-360hz 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 16, 298.00, 63.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1904, '240hz-360hz 3', '240hz-360hz 3', '240hz-360hz 3', '240hz-360hz 3', '240hz-360hz 3', '240hz-360hz 3', '7668362449', '240hz-360hz 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 32, 112.00, 317.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1905, '240hz-360hz 4', '240hz-360hz 4', '240hz-360hz 4', '240hz-360hz 4', '240hz-360hz 4', '240hz-360hz 4', '3291250011', '240hz-360hz 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 257.00, 386.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1906, '240hz-360hz 5', '240hz-360hz 5', '240hz-360hz 5', '240hz-360hz 5', '240hz-360hz 5', '240hz-360hz 5', '1950776694', '240hz-360hz 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 431.00, 152.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1907, '240hz-360hz 6', '240hz-360hz 6', '240hz-360hz 6', '240hz-360hz 6', '240hz-360hz 6', '240hz-360hz 6', '1246864777', '240hz-360hz 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 265.00, 59.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1908, '240hz-360hz 7', '240hz-360hz 7', '240hz-360hz 7', '240hz-360hz 7', '240hz-360hz 7', '240hz-360hz 7', '3080802167', '240hz-360hz 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 88, 251.00, 154.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1909, '240hz-360hz 8', '240hz-360hz 8', '240hz-360hz 8', '240hz-360hz 8', '240hz-360hz 8', '240hz-360hz 8', '8631967987', '240hz-360hz 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 303.00, 187.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1910, '240hz-360hz 9', '240hz-360hz 9', '240hz-360hz 9', '240hz-360hz 9', '240hz-360hz 9', '240hz-360hz 9', '1185980561', '240hz-360hz 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 177.00, 365.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1911, '240hz-360hz 10', '240hz-360hz 10', '240hz-360hz 10', '240hz-360hz 10', '240hz-360hz 10', '240hz-360hz 10', '7499639027', '240hz-360hz 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 24, 397.00, 103.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1912, '240hz-360hz 11', '240hz-360hz 11', '240hz-360hz 11', '240hz-360hz 11', '240hz-360hz 11', '240hz-360hz 11', '4360078980', '240hz-360hz 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 40, 469.00, 397.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1913, '240hz-360hz 12', '240hz-360hz 12', '240hz-360hz 12', '240hz-360hz 12', '240hz-360hz 12', '240hz-360hz 12', '8813000032', '240hz-360hz 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 85, 361.00, 274.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1914, '240hz-360hz 13', '240hz-360hz 13', '240hz-360hz 13', '240hz-360hz 13', '240hz-360hz 13', '240hz-360hz 13', '1421654761', '240hz-360hz 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 84, 166.00, 380.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1915, '240hz-360hz 14', '240hz-360hz 14', '240hz-360hz 14', '240hz-360hz 14', '240hz-360hz 14', '240hz-360hz 14', '2268775729', '240hz-360hz 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 41, 145.00, 287.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1916, '240hz-360hz 15', '240hz-360hz 15', '240hz-360hz 15', '240hz-360hz 15', '240hz-360hz 15', '240hz-360hz 15', '5437061038', '240hz-360hz 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 319.00, 142.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1917, '240hz-360hz 16', '240hz-360hz 16', '240hz-360hz 16', '240hz-360hz 16', '240hz-360hz 16', '240hz-360hz 16', '4664255438', '240hz-360hz 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 105.00, 78.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1918, '240hz-360hz 17', '240hz-360hz 17', '240hz-360hz 17', '240hz-360hz 17', '240hz-360hz 17', '240hz-360hz 17', '5658897315', '240hz-360hz 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 90, 178.00, 59.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1919, '240hz-360hz 18', '240hz-360hz 18', '240hz-360hz 18', '240hz-360hz 18', '240hz-360hz 18', '240hz-360hz 18', '3007801836', '240hz-360hz 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 102.00, 103.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1920, '240hz-360hz 19', '240hz-360hz 19', '240hz-360hz 19', '240hz-360hz 19', '240hz-360hz 19', '240hz-360hz 19', '3062607634', '240hz-360hz 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 35, 123.00, 260.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1921, '240hz-360hz 20', '240hz-360hz 20', '240hz-360hz 20', '240hz-360hz 20', '240hz-360hz 20', '240hz-360hz 20', '5379333692', '240hz-360hz 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 184.00, 101.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1922, '240hz-360hz 21', '240hz-360hz 21', '240hz-360hz 21', '240hz-360hz 21', '240hz-360hz 21', '240hz-360hz 21', '1726675256', '240hz-360hz 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 413.00, 197.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1923, '240hz-360hz 22', '240hz-360hz 22', '240hz-360hz 22', '240hz-360hz 22', '240hz-360hz 22', '240hz-360hz 22', '3144874182', '240hz-360hz 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 343.00, 93.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1924, '240hz-360hz 23', '240hz-360hz 23', '240hz-360hz 23', '240hz-360hz 23', '240hz-360hz 23', '240hz-360hz 23', '2264491278', '240hz-360hz 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 153.00, 213.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1925, '240hz-360hz 24', '240hz-360hz 24', '240hz-360hz 24', '240hz-360hz 24', '240hz-360hz 24', '240hz-360hz 24', '179508978', '240hz-360hz 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 463.00, 194.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1926, '240hz-360hz 25', '240hz-360hz 25', '240hz-360hz 25', '240hz-360hz 25', '240hz-360hz 25', '240hz-360hz 25', '7030669668', '240hz-360hz 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 97, 353.00, 374.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1927, '240hz-360hz 26', '240hz-360hz 26', '240hz-360hz 26', '240hz-360hz 26', '240hz-360hz 26', '240hz-360hz 26', '4281176708', '240hz-360hz 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 401.00, 191.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1928, '240hz-360hz 27', '240hz-360hz 27', '240hz-360hz 27', '240hz-360hz 27', '240hz-360hz 27', '240hz-360hz 27', '7916698177', '240hz-360hz 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 37, 133.00, 106.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1929, '240hz-360hz 28', '240hz-360hz 28', '240hz-360hz 28', '240hz-360hz 28', '240hz-360hz 28', '240hz-360hz 28', '7878004344', '240hz-360hz 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 7, 357.00, 125.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1930, '240hz-360hz 29', '240hz-360hz 29', '240hz-360hz 29', '240hz-360hz 29', '240hz-360hz 29', '240hz-360hz 29', '3162513634', '240hz-360hz 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 39, 430.00, 105.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1931, '240hz-360hz 30', '240hz-360hz 30', '240hz-360hz 30', '240hz-360hz 30', '240hz-360hz 30', '240hz-360hz 30', '4207217740', '240hz-360hz 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 77, 378.00, 180.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1932, '240hz-360hz 31', '240hz-360hz 31', '240hz-360hz 31', '240hz-360hz 31', '240hz-360hz 31', '240hz-360hz 31', '7501511627', '240hz-360hz 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 388.00, 197.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1933, '240hz-360hz 32', '240hz-360hz 32', '240hz-360hz 32', '240hz-360hz 32', '240hz-360hz 32', '240hz-360hz 32', '6457676758', '240hz-360hz 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 367.00, 357.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1934, '240hz-360hz 33', '240hz-360hz 33', '240hz-360hz 33', '240hz-360hz 33', '240hz-360hz 33', '240hz-360hz 33', '9148739025', '240hz-360hz 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 11, 201.00, 86.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1935, '240hz-360hz 34', '240hz-360hz 34', '240hz-360hz 34', '240hz-360hz 34', '240hz-360hz 34', '240hz-360hz 34', '5234967693', '240hz-360hz 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 61, 126.00, 177.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1936, '240hz-360hz 35', '240hz-360hz 35', '240hz-360hz 35', '240hz-360hz 35', '240hz-360hz 35', '240hz-360hz 35', '5044212098', '240hz-360hz 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 21, 280.00, 155.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1937, '240hz-360hz 36', '240hz-360hz 36', '240hz-360hz 36', '240hz-360hz 36', '240hz-360hz 36', '240hz-360hz 36', '4454848812', '240hz-360hz 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 324.00, 136.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1938, '240hz-360hz 37', '240hz-360hz 37', '240hz-360hz 37', '240hz-360hz 37', '240hz-360hz 37', '240hz-360hz 37', '4694437463', '240hz-360hz 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 83, 178.00, 173.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1939, '240hz-360hz 38', '240hz-360hz 38', '240hz-360hz 38', '240hz-360hz 38', '240hz-360hz 38', '240hz-360hz 38', '4742701510', '240hz-360hz 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 26, 380.00, 366.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1940, '240hz-360hz 39', '240hz-360hz 39', '240hz-360hz 39', '240hz-360hz 39', '240hz-360hz 39', '240hz-360hz 39', '5592074878', '240hz-360hz 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 20, 103.00, 254.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1941, '240hz-360hz 40', '240hz-360hz 40', '240hz-360hz 40', '240hz-360hz 40', '240hz-360hz 40', '240hz-360hz 40', '805667278', '240hz-360hz 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 8, 467.00, 298.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1942, '240hz-360hz 41', '240hz-360hz 41', '240hz-360hz 41', '240hz-360hz 41', '240hz-360hz 41', '240hz-360hz 41', '5847911083', '240hz-360hz 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 47, 384.00, 394.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1943, '240hz-360hz 42', '240hz-360hz 42', '240hz-360hz 42', '240hz-360hz 42', '240hz-360hz 42', '240hz-360hz 42', '1653409236', '240hz-360hz 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 15, 428.00, 197.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1944, '240hz-360hz 43', '240hz-360hz 43', '240hz-360hz 43', '240hz-360hz 43', '240hz-360hz 43', '240hz-360hz 43', '231091126', '240hz-360hz 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 44, 426.00, 243.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1945, '240hz-360hz 44', '240hz-360hz 44', '240hz-360hz 44', '240hz-360hz 44', '240hz-360hz 44', '240hz-360hz 44', '2673803522', '240hz-360hz 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 14, 239.00, 364.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1946, '240hz-360hz 45', '240hz-360hz 45', '240hz-360hz 45', '240hz-360hz 45', '240hz-360hz 45', '240hz-360hz 45', '9816765881', '240hz-360hz 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 62, 407.00, 307.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1947, '240hz-360hz 46', '240hz-360hz 46', '240hz-360hz 46', '240hz-360hz 46', '240hz-360hz 46', '240hz-360hz 46', '5199011752', '240hz-360hz 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 67, 103.00, 289.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1948, '240hz-360hz 47', '240hz-360hz 47', '240hz-360hz 47', '240hz-360hz 47', '240hz-360hz 47', '240hz-360hz 47', '5068929865', '240hz-360hz 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 82, 149.00, 363.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1949, '240hz-360hz 48', '240hz-360hz 48', '240hz-360hz 48', '240hz-360hz 48', '240hz-360hz 48', '240hz-360hz 48', '5149905917', '240hz-360hz 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 27, 139.00, 61.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1950, '240hz-360hz 49', '240hz-360hz 49', '240hz-360hz 49', '240hz-360hz 49', '240hz-360hz 49', '240hz-360hz 49', '2841099662', '240hz-360hz 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 234.00, 274.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1951, 'كوابل / توصيلات احترافيه للشاشات 0', 'كوابل / توصيلات احترافيه للشاشات 0', 'كوابل / توصيلات احترافيه للشاشات 0', 'Professional cables / connections for monitors 0', 'Professional cables / connections for monitors 0', 'Professional cables / connections for monitors 0', '6721550302', 'Professional cables / connections for monitors 0', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 33, 277.00, 156.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1952, 'كوابل / توصيلات احترافيه للشاشات 1', 'كوابل / توصيلات احترافيه للشاشات 1', 'كوابل / توصيلات احترافيه للشاشات 1', 'Professional cables / connections for monitors 1', 'Professional cables / connections for monitors 1', 'Professional cables / connections for monitors 1', '4055637502', 'Professional cables / connections for monitors 1', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 43, 284.00, 97.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1953, 'كوابل / توصيلات احترافيه للشاشات 2', 'كوابل / توصيلات احترافيه للشاشات 2', 'كوابل / توصيلات احترافيه للشاشات 2', 'Professional cables / connections for monitors 2', 'Professional cables / connections for monitors 2', 'Professional cables / connections for monitors 2', '1549270673', 'Professional cables / connections for monitors 2', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 86, 366.00, 234.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1954, 'كوابل / توصيلات احترافيه للشاشات 3', 'كوابل / توصيلات احترافيه للشاشات 3', 'كوابل / توصيلات احترافيه للشاشات 3', 'Professional cables / connections for monitors 3', 'Professional cables / connections for monitors 3', 'Professional cables / connections for monitors 3', '620388299', 'Professional cables / connections for monitors 3', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 65, 202.00, 238.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1955, 'كوابل / توصيلات احترافيه للشاشات 4', 'كوابل / توصيلات احترافيه للشاشات 4', 'كوابل / توصيلات احترافيه للشاشات 4', 'Professional cables / connections for monitors 4', 'Professional cables / connections for monitors 4', 'Professional cables / connections for monitors 4', '3309925240', 'Professional cables / connections for monitors 4', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 197.00, 300.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1956, 'كوابل / توصيلات احترافيه للشاشات 5', 'كوابل / توصيلات احترافيه للشاشات 5', 'كوابل / توصيلات احترافيه للشاشات 5', 'Professional cables / connections for monitors 5', 'Professional cables / connections for monitors 5', 'Professional cables / connections for monitors 5', '1165480450', 'Professional cables / connections for monitors 5', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 98, 168.00, 134.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1957, 'كوابل / توصيلات احترافيه للشاشات 6', 'كوابل / توصيلات احترافيه للشاشات 6', 'كوابل / توصيلات احترافيه للشاشات 6', 'Professional cables / connections for monitors 6', 'Professional cables / connections for monitors 6', 'Professional cables / connections for monitors 6', '5779632597', 'Professional cables / connections for monitors 6', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 95, 241.00, 93.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1958, 'كوابل / توصيلات احترافيه للشاشات 7', 'كوابل / توصيلات احترافيه للشاشات 7', 'كوابل / توصيلات احترافيه للشاشات 7', 'Professional cables / connections for monitors 7', 'Professional cables / connections for monitors 7', 'Professional cables / connections for monitors 7', '3644175780', 'Professional cables / connections for monitors 7', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 191.00, 55.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1959, 'كوابل / توصيلات احترافيه للشاشات 8', 'كوابل / توصيلات احترافيه للشاشات 8', 'كوابل / توصيلات احترافيه للشاشات 8', 'Professional cables / connections for monitors 8', 'Professional cables / connections for monitors 8', 'Professional cables / connections for monitors 8', '2846577738', 'Professional cables / connections for monitors 8', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 494.00, 257.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1960, 'كوابل / توصيلات احترافيه للشاشات 9', 'كوابل / توصيلات احترافيه للشاشات 9', 'كوابل / توصيلات احترافيه للشاشات 9', 'Professional cables / connections for monitors 9', 'Professional cables / connections for monitors 9', 'Professional cables / connections for monitors 9', '4175575586', 'Professional cables / connections for monitors 9', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 140.00, 78.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1961, 'كوابل / توصيلات احترافيه للشاشات 10', 'كوابل / توصيلات احترافيه للشاشات 10', 'كوابل / توصيلات احترافيه للشاشات 10', 'Professional cables / connections for monitors 10', 'Professional cables / connections for monitors 10', 'Professional cables / connections for monitors 10', '8748382000', 'Professional cables / connections for monitors 10', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 59, 258.00, 191.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1962, 'كوابل / توصيلات احترافيه للشاشات 11', 'كوابل / توصيلات احترافيه للشاشات 11', 'كوابل / توصيلات احترافيه للشاشات 11', 'Professional cables / connections for monitors 11', 'Professional cables / connections for monitors 11', 'Professional cables / connections for monitors 11', '8953664465', 'Professional cables / connections for monitors 11', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 292.00, 345.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1963, 'كوابل / توصيلات احترافيه للشاشات 12', 'كوابل / توصيلات احترافيه للشاشات 12', 'كوابل / توصيلات احترافيه للشاشات 12', 'Professional cables / connections for monitors 12', 'Professional cables / connections for monitors 12', 'Professional cables / connections for monitors 12', '7194940198', 'Professional cables / connections for monitors 12', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 87, 191.00, 253.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1964, 'كوابل / توصيلات احترافيه للشاشات 13', 'كوابل / توصيلات احترافيه للشاشات 13', 'كوابل / توصيلات احترافيه للشاشات 13', 'Professional cables / connections for monitors 13', 'Professional cables / connections for monitors 13', 'Professional cables / connections for monitors 13', '9152766300', 'Professional cables / connections for monitors 13', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 74, 174.00, 377.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0);
INSERT INTO `products` (`id`, `ar_name`, `ar_small_description`, `ar_description`, `en_name`, `en_small_description`, `en_description`, `sku`, `slug`, `main_image`, `images`, `meta`, `quantity`, `price`, `price_after_sale`, `category_id`, `created_at`, `updated_at`, `is_active`, `is_composite`, `reserved_quantity`, `brand_id`, `storage_quantity`) VALUES
(1965, 'كوابل / توصيلات احترافيه للشاشات 14', 'كوابل / توصيلات احترافيه للشاشات 14', 'كوابل / توصيلات احترافيه للشاشات 14', 'Professional cables / connections for monitors 14', 'Professional cables / connections for monitors 14', 'Professional cables / connections for monitors 14', '1210008612', 'Professional cables / connections for monitors 14', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 476.00, 85.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1966, 'كوابل / توصيلات احترافيه للشاشات 15', 'كوابل / توصيلات احترافيه للشاشات 15', 'كوابل / توصيلات احترافيه للشاشات 15', 'Professional cables / connections for monitors 15', 'Professional cables / connections for monitors 15', 'Professional cables / connections for monitors 15', '7687170325', 'Professional cables / connections for monitors 15', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 30, 472.00, 355.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1967, 'كوابل / توصيلات احترافيه للشاشات 16', 'كوابل / توصيلات احترافيه للشاشات 16', 'كوابل / توصيلات احترافيه للشاشات 16', 'Professional cables / connections for monitors 16', 'Professional cables / connections for monitors 16', 'Professional cables / connections for monitors 16', '2355923466', 'Professional cables / connections for monitors 16', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 46, 364.00, 342.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1968, 'كوابل / توصيلات احترافيه للشاشات 17', 'كوابل / توصيلات احترافيه للشاشات 17', 'كوابل / توصيلات احترافيه للشاشات 17', 'Professional cables / connections for monitors 17', 'Professional cables / connections for monitors 17', 'Professional cables / connections for monitors 17', '2664439592', 'Professional cables / connections for monitors 17', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 57, 419.00, 355.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1969, 'كوابل / توصيلات احترافيه للشاشات 18', 'كوابل / توصيلات احترافيه للشاشات 18', 'كوابل / توصيلات احترافيه للشاشات 18', 'Professional cables / connections for monitors 18', 'Professional cables / connections for monitors 18', 'Professional cables / connections for monitors 18', '9329279157', 'Professional cables / connections for monitors 18', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 382.00, 74.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1970, 'كوابل / توصيلات احترافيه للشاشات 19', 'كوابل / توصيلات احترافيه للشاشات 19', 'كوابل / توصيلات احترافيه للشاشات 19', 'Professional cables / connections for monitors 19', 'Professional cables / connections for monitors 19', 'Professional cables / connections for monitors 19', '2947131362', 'Professional cables / connections for monitors 19', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 367.00, 96.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1971, 'كوابل / توصيلات احترافيه للشاشات 20', 'كوابل / توصيلات احترافيه للشاشات 20', 'كوابل / توصيلات احترافيه للشاشات 20', 'Professional cables / connections for monitors 20', 'Professional cables / connections for monitors 20', 'Professional cables / connections for monitors 20', '7400489513', 'Professional cables / connections for monitors 20', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 470.00, 68.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1972, 'كوابل / توصيلات احترافيه للشاشات 21', 'كوابل / توصيلات احترافيه للشاشات 21', 'كوابل / توصيلات احترافيه للشاشات 21', 'Professional cables / connections for monitors 21', 'Professional cables / connections for monitors 21', 'Professional cables / connections for monitors 21', '31967870', 'Professional cables / connections for monitors 21', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 72, 147.00, 147.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1973, 'كوابل / توصيلات احترافيه للشاشات 22', 'كوابل / توصيلات احترافيه للشاشات 22', 'كوابل / توصيلات احترافيه للشاشات 22', 'Professional cables / connections for monitors 22', 'Professional cables / connections for monitors 22', 'Professional cables / connections for monitors 22', '609036258', 'Professional cables / connections for monitors 22', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 91, 273.00, 373.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1974, 'كوابل / توصيلات احترافيه للشاشات 23', 'كوابل / توصيلات احترافيه للشاشات 23', 'كوابل / توصيلات احترافيه للشاشات 23', 'Professional cables / connections for monitors 23', 'Professional cables / connections for monitors 23', 'Professional cables / connections for monitors 23', '3795834935', 'Professional cables / connections for monitors 23', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 25, 309.00, 77.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1975, 'كوابل / توصيلات احترافيه للشاشات 24', 'كوابل / توصيلات احترافيه للشاشات 24', 'كوابل / توصيلات احترافيه للشاشات 24', 'Professional cables / connections for monitors 24', 'Professional cables / connections for monitors 24', 'Professional cables / connections for monitors 24', '8517106868', 'Professional cables / connections for monitors 24', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 23, 109.00, 72.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1976, 'كوابل / توصيلات احترافيه للشاشات 25', 'كوابل / توصيلات احترافيه للشاشات 25', 'كوابل / توصيلات احترافيه للشاشات 25', 'Professional cables / connections for monitors 25', 'Professional cables / connections for monitors 25', 'Professional cables / connections for monitors 25', '7905039369', 'Professional cables / connections for monitors 25', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 105.00, 330.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1977, 'كوابل / توصيلات احترافيه للشاشات 26', 'كوابل / توصيلات احترافيه للشاشات 26', 'كوابل / توصيلات احترافيه للشاشات 26', 'Professional cables / connections for monitors 26', 'Professional cables / connections for monitors 26', 'Professional cables / connections for monitors 26', '2725281276', 'Professional cables / connections for monitors 26', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 2, 232.00, 304.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1978, 'كوابل / توصيلات احترافيه للشاشات 27', 'كوابل / توصيلات احترافيه للشاشات 27', 'كوابل / توصيلات احترافيه للشاشات 27', 'Professional cables / connections for monitors 27', 'Professional cables / connections for monitors 27', 'Professional cables / connections for monitors 27', '5275317458', 'Professional cables / connections for monitors 27', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 28, 293.00, 236.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1979, 'كوابل / توصيلات احترافيه للشاشات 28', 'كوابل / توصيلات احترافيه للشاشات 28', 'كوابل / توصيلات احترافيه للشاشات 28', 'Professional cables / connections for monitors 28', 'Professional cables / connections for monitors 28', 'Professional cables / connections for monitors 28', '694088071', 'Professional cables / connections for monitors 28', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 63, 416.00, 183.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1980, 'كوابل / توصيلات احترافيه للشاشات 29', 'كوابل / توصيلات احترافيه للشاشات 29', 'كوابل / توصيلات احترافيه للشاشات 29', 'Professional cables / connections for monitors 29', 'Professional cables / connections for monitors 29', 'Professional cables / connections for monitors 29', '4619712893', 'Professional cables / connections for monitors 29', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 418.00, 163.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1981, 'كوابل / توصيلات احترافيه للشاشات 30', 'كوابل / توصيلات احترافيه للشاشات 30', 'كوابل / توصيلات احترافيه للشاشات 30', 'Professional cables / connections for monitors 30', 'Professional cables / connections for monitors 30', 'Professional cables / connections for monitors 30', '3750678739', 'Professional cables / connections for monitors 30', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 29, 128.00, 320.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1982, 'كوابل / توصيلات احترافيه للشاشات 31', 'كوابل / توصيلات احترافيه للشاشات 31', 'كوابل / توصيلات احترافيه للشاشات 31', 'Professional cables / connections for monitors 31', 'Professional cables / connections for monitors 31', 'Professional cables / connections for monitors 31', '2387721735', 'Professional cables / connections for monitors 31', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 330.00, 387.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1983, 'كوابل / توصيلات احترافيه للشاشات 32', 'كوابل / توصيلات احترافيه للشاشات 32', 'كوابل / توصيلات احترافيه للشاشات 32', 'Professional cables / connections for monitors 32', 'Professional cables / connections for monitors 32', 'Professional cables / connections for monitors 32', '8759188625', 'Professional cables / connections for monitors 32', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 54, 274.00, 234.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1984, 'كوابل / توصيلات احترافيه للشاشات 33', 'كوابل / توصيلات احترافيه للشاشات 33', 'كوابل / توصيلات احترافيه للشاشات 33', 'Professional cables / connections for monitors 33', 'Professional cables / connections for monitors 33', 'Professional cables / connections for monitors 33', '9179179475', 'Professional cables / connections for monitors 33', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 400.00, 229.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1985, 'كوابل / توصيلات احترافيه للشاشات 34', 'كوابل / توصيلات احترافيه للشاشات 34', 'كوابل / توصيلات احترافيه للشاشات 34', 'Professional cables / connections for monitors 34', 'Professional cables / connections for monitors 34', 'Professional cables / connections for monitors 34', '4595907718', 'Professional cables / connections for monitors 34', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 17, 264.00, 281.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1986, 'كوابل / توصيلات احترافيه للشاشات 35', 'كوابل / توصيلات احترافيه للشاشات 35', 'كوابل / توصيلات احترافيه للشاشات 35', 'Professional cables / connections for monitors 35', 'Professional cables / connections for monitors 35', 'Professional cables / connections for monitors 35', '2174242968', 'Professional cables / connections for monitors 35', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 13, 421.00, 255.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1987, 'كوابل / توصيلات احترافيه للشاشات 36', 'كوابل / توصيلات احترافيه للشاشات 36', 'كوابل / توصيلات احترافيه للشاشات 36', 'Professional cables / connections for monitors 36', 'Professional cables / connections for monitors 36', 'Professional cables / connections for monitors 36', '4079833998', 'Professional cables / connections for monitors 36', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 324.00, 204.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1988, 'كوابل / توصيلات احترافيه للشاشات 37', 'كوابل / توصيلات احترافيه للشاشات 37', 'كوابل / توصيلات احترافيه للشاشات 37', 'Professional cables / connections for monitors 37', 'Professional cables / connections for monitors 37', 'Professional cables / connections for monitors 37', '9257422970', 'Professional cables / connections for monitors 37', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 1, 373.00, 293.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1989, 'كوابل / توصيلات احترافيه للشاشات 38', 'كوابل / توصيلات احترافيه للشاشات 38', 'كوابل / توصيلات احترافيه للشاشات 38', 'Professional cables / connections for monitors 38', 'Professional cables / connections for monitors 38', 'Professional cables / connections for monitors 38', '4426211997', 'Professional cables / connections for monitors 38', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 51, 198.00, 217.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1990, 'كوابل / توصيلات احترافيه للشاشات 39', 'كوابل / توصيلات احترافيه للشاشات 39', 'كوابل / توصيلات احترافيه للشاشات 39', 'Professional cables / connections for monitors 39', 'Professional cables / connections for monitors 39', 'Professional cables / connections for monitors 39', '4453887915', 'Professional cables / connections for monitors 39', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 5, 139.00, 362.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1991, 'كوابل / توصيلات احترافيه للشاشات 40', 'كوابل / توصيلات احترافيه للشاشات 40', 'كوابل / توصيلات احترافيه للشاشات 40', 'Professional cables / connections for monitors 40', 'Professional cables / connections for monitors 40', 'Professional cables / connections for monitors 40', '2970142742', 'Professional cables / connections for monitors 40', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 66, 234.00, 184.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1992, 'كوابل / توصيلات احترافيه للشاشات 41', 'كوابل / توصيلات احترافيه للشاشات 41', 'كوابل / توصيلات احترافيه للشاشات 41', 'Professional cables / connections for monitors 41', 'Professional cables / connections for monitors 41', 'Professional cables / connections for monitors 41', '2493105436', 'Professional cables / connections for monitors 41', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 52, 340.00, 208.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1993, 'كوابل / توصيلات احترافيه للشاشات 42', 'كوابل / توصيلات احترافيه للشاشات 42', 'كوابل / توصيلات احترافيه للشاشات 42', 'Professional cables / connections for monitors 42', 'Professional cables / connections for monitors 42', 'Professional cables / connections for monitors 42', '1741497274', 'Professional cables / connections for monitors 42', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 34, 464.00, 111.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1994, 'كوابل / توصيلات احترافيه للشاشات 43', 'كوابل / توصيلات احترافيه للشاشات 43', 'كوابل / توصيلات احترافيه للشاشات 43', 'Professional cables / connections for monitors 43', 'Professional cables / connections for monitors 43', 'Professional cables / connections for monitors 43', '4104719802', 'Professional cables / connections for monitors 43', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 78, 434.00, 123.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1995, 'كوابل / توصيلات احترافيه للشاشات 44', 'كوابل / توصيلات احترافيه للشاشات 44', 'كوابل / توصيلات احترافيه للشاشات 44', 'Professional cables / connections for monitors 44', 'Professional cables / connections for monitors 44', 'Professional cables / connections for monitors 44', '7285192884', 'Professional cables / connections for monitors 44', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 96, 119.00, 271.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1996, 'كوابل / توصيلات احترافيه للشاشات 45', 'كوابل / توصيلات احترافيه للشاشات 45', 'كوابل / توصيلات احترافيه للشاشات 45', 'Professional cables / connections for monitors 45', 'Professional cables / connections for monitors 45', 'Professional cables / connections for monitors 45', '2782407021', 'Professional cables / connections for monitors 45', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 71, 225.00, 222.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(1997, 'كوابل / توصيلات احترافيه للشاشات 46', 'كوابل / توصيلات احترافيه للشاشات 46', 'كوابل / توصيلات احترافيه للشاشات 46', 'Professional cables / connections for monitors 46', 'Professional cables / connections for monitors 46', 'Professional cables / connections for monitors 46', '4668772967', 'Professional cables / connections for monitors 46', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 42, 131.00, 379.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1998, 'كوابل / توصيلات احترافيه للشاشات 47', 'كوابل / توصيلات احترافيه للشاشات 47', 'كوابل / توصيلات احترافيه للشاشات 47', 'Professional cables / connections for monitors 47', 'Professional cables / connections for monitors 47', 'Professional cables / connections for monitors 47', '366342072', 'Professional cables / connections for monitors 47', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 9, 424.00, 131.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 1, NULL, 0),
(1999, 'كوابل / توصيلات احترافيه للشاشات 48', 'كوابل / توصيلات احترافيه للشاشات 48', 'كوابل / توصيلات احترافيه للشاشات 48', 'Professional cables / connections for monitors 48', 'Professional cables / connections for monitors 48', 'Professional cables / connections for monitors 48', '4865404235', 'Professional cables / connections for monitors 48', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 19, 321.00, 216.00, NULL, '2022-04-04 10:32:06', '2022-04-04 10:32:06', 1, 0, 0, NULL, 0),
(2000, 'كوابل / توصيلات احترافيه للشاشات 49', 'كوابل / توصيلات احترافيه للشاشات 49', 'كوابل / توصيلات احترافيه للشاشات 49', 'Professional cables / connections for monitors 49', 'Professional cables / connections for monitors 49', 'Professional cables / connections for monitors 49', '4368604956', 'Professional cables / connections for monitors 49', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, NULL, 50, 237.00, 281.00, NULL, '2022-04-04 10:32:06', '2022-07-08 22:39:57', 1, 0, 12, NULL, 0),
(2001, 'منتج اختباري 101', 'منتج اختباري 101', 'منتج اختباري 101', 'Test Product 101', 'Test Product 101', 'Test Product 101', '101-test', 'Test-Product-101', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, '{\"child_products_id\":[],\"products_quantity\":[]}', 3, 100.00, NULL, NULL, '2022-05-02 15:54:04', '2022-06-06 09:41:36', 1, 0, 0, 2, 0),
(2002, 'product 102', 'product 102', 'product 102', 'product 102', 'product 102', 'product 102', '12312312', 'product-102', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, '{\"child_products_id\":[],\"products_quantity\":[]}', 0, 100.00, NULL, NULL, '2022-05-10 15:27:28', '2022-06-17 12:26:58', 1, 0, 0, NULL, 0),
(2003, 'منتج مركب 101', 'منتج مركب 101', 'منتج مركب 101', 'composite 101', 'composite 101', 'composite 101', '1002-11', 'composite-101', 'storage/products/S0dFxplYORDfWQCiK4VRKjE1b23k5Wc04QTvFIca.png', NULL, '{\"child_products_id\":[752,551,851],\"products_quantity\":{\"551\":2,\"752\":2,\"851\":1}}', 10, 1000.00, NULL, NULL, '2022-06-03 10:40:29', '2022-06-03 10:40:32', 1, 1, 0, 2, 0),
(2004, 'اختبار 201', 'اختبار 201', 'اختبار 201', 'test 201', 'test 201', 'test 201', 'asdasd-asdasd', 'test-201', 'storage/products/iAlNGJLWZJoX9CzAzcdXhA5Z1HLNZlETO2uVXuB4.jpg', NULL, '{\"child_products_id\":[1,303,551],\"products_quantity\":{\"1\":1,\"303\":2,\"551\":1}}', 12, 1000.00, NULL, NULL, '2022-06-09 15:47:29', '2022-07-08 23:26:54', 1, 1, 0, 2, 0),
(2019, 'ssadasdasd', 'sadasdasd', 'sadasdasd', 'asdasd', 'asdasd', 'ssdasd', 'asdasdasd', 'asdasd', 'storage/products/4zi5HYyutNI3a7eF9HcGQMCdZ6zNzEnCQIE9meqU.webp', NULL, '{\"child_products_id\":[3,5,52,2000],\"products_quantity\":{\"3\":1,\"5\":1,\"52\":1,\"2000\":1}}', 11, 100.00, NULL, NULL, '2022-06-13 13:40:33', '2022-07-08 22:39:57', 1, 1, 14, NULL, 10),
(2021, 'test444', 'test444', 'test444', 'test444', 'test444', 'test444', 'test444', 'test444', 'storage/products/HQ0nrtXfvcnc1iHjPUlnyoRuHRJOxzLRDIZaEcvj.png', NULL, '{\"upgrade_categories\":[3,13],\"upgrade_products_id\":{\"3\":[104,102],\"13\":[605,609]},\"upgrade_products\":{\"3\":{\"102\":{\"id\":102,\"upgrade_price\":298,\"needed_quantity\":1,\"is_default\":false},\"104\":{\"id\":104,\"upgrade_price\":213,\"needed_quantity\":1,\"is_default\":true}},\"13\":{\"605\":{\"id\":605,\"upgrade_price\":201,\"needed_quantity\":1,\"is_default\":true},\"609\":{\"id\":609,\"upgrade_price\":397,\"needed_quantity\":1,\"is_default\":false}}},\"child_products_id\":[104,102,605,609],\"products_quantity\":{\"102\":1,\"104\":1,\"605\":1,\"609\":1}}', 10, 414.00, NULL, NULL, '2022-07-06 01:52:43', '2022-07-08 21:34:04', 1, 2, 0, 2, 0),
(2022, 'test 3303', 'test 3303', 'test 3303', 'test 3303', 'test 3303', 'test 3303', 'test 3303', 'test-3303', 'storage/products/J86SNtAUstozmdodfCixzEVMufQFud1EAAH65sJq.png', NULL, '{\"upgrade_categories\":[4,8],\"upgrade_products_id\":{\"4\":[151,153,164],\"8\":[385,399]},\"upgrade_products\":{\"4\":{\"151\":{\"id\":151,\"upgrade_price\":351,\"needed_quantity\":\"1\",\"is_default\":true},\"153\":{\"id\":153,\"upgrade_price\":157,\"needed_quantity\":1,\"is_default\":false},\"164\":{\"id\":164,\"upgrade_price\":359,\"needed_quantity\":1,\"is_default\":false}},\"8\":{\"385\":{\"id\":385,\"upgrade_price\":424,\"needed_quantity\":1,\"is_default\":true},\"399\":{\"id\":399,\"upgrade_price\":270,\"needed_quantity\":1,\"is_default\":false}}},\"child_products_id\":[151,153,164,385,399],\"products_quantity\":{\"151\":\"1\",\"153\":1,\"164\":1,\"385\":1,\"399\":1}}', 11, 775.00, NULL, NULL, '2022-07-08 10:24:04', '2022-07-09 18:19:26', 1, 2, 0, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule` smallint(6) NOT NULL DEFAULT 0,
  `is_main` smallint(6) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_nav` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `rule`, `is_main`, `category_id`, `created_at`, `updated_at`, `slug`, `icon`, `is_nav`, `is_active`) VALUES
(1, 'التجميعات الاحترافية', 'Professional collections', 'التجميعات الاحترافية', 'Professional collections', 0, 1, NULL, '2022-04-04 10:32:01', '2022-06-17 10:22:26', 'f5QDXUOXfnjAEC21GYfcWCftn8cSIM', NULL, 0, 1),
(2, 'تجميعات مع كرت GT', 'PC GAMING WITH GT', 'تجميعات مع كرت GT', 'PC GAMING WITH GT', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'pXTU36m7kszLdzPcCO3imEPmSd4L3g', NULL, 0, 1),
(3, 'تجميعات مع كرت GTX16XX', 'PC GAMING WITH GTX16XX ', 'تجميعات مع كرت GTX16XX', 'PC GAMING WITH GTX16XX ', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'FhaGTQshJf1W6TOfmtMQUUVmE452T8', NULL, 0, 1),
(4, 'تجميعات مع كرت RTX20XX', 'PC GAMING WITH RTX20XX', 'تجميعات مع كرت RTX20XX', 'PC GAMING WITH RTX20XX', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'diK9wRO7InU5bahj6tyLHir7I7H0HM', NULL, 0, 1),
(5, 'تجميعات مع كرت RTX30XX', 'PC GAMING WITH RTX30XX', 'تجميعات مع كرت RTX30XX', 'PC GAMING WITH RTX30XX', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'zFP4eCqiIz9GCwYkUEzBLCLQKFcu1b', NULL, 0, 1),
(6, 'تجميعات مع كرت ', 'PC GAMING WITH RX', 'تجميعات مع كرت ', 'PC GAMING WITH RX', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'iXRjU9hEPgiU28HC9PPSKJRY88v5uK', NULL, 0, 1),
(7, 'تتجميعات مع كرت  RX', 'Custom PCs with AMD', 'تتجميعات مع كرت  RX', 'Custom PCs with AMD', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'gDCLo206LO34AOs8SBfIn9eNlpVfEU', NULL, 0, 1),
(8, 'تجميعات مع معالج AMD', 'Scalable desktop computers (Without GPU)', 'تجميعات مع معالج AMD', 'Scalable desktop computers (Without GPU)', 0, 0, 1, NULL, '2022-04-04 10:32:01', 'bnGGWQlJ4zzkeonaty7MLTfaH0BaaG', NULL, 0, 1),
(9, 'قطع الكمبيوتر', 'Computer parts', 'قطع الكمبيوتر', 'Computer parts', 0, 1, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 'R97INa9XuASRkv5YwWcGe9twBgOaOR', NULL, 0, 1),
(10, 'المذربوردات', 'Motherboard', 'المذربوردات', 'Motherboard', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'wPTlfV7pCbxfoBlywW2GdlUh2yHdob', NULL, 0, 1),
(11, 'المعالجات', 'Cpu', 'المعالجات', 'Cpu', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'EO8EYJR1MFKHmZd1AvHmdJkE9NBQ9C', NULL, 0, 1),
(12, 'الرامات', 'Ram', 'الرامات', 'Ram', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'GCPfjmwUSeYsNYj0jI26DSVKoBtcuv', NULL, 0, 1),
(13, 'SSD', 'SSD', 'SSD', 'SSD', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'sEkAPf8PISIyF5BK3EtoRd11QDtbKQ', NULL, 0, 1),
(14, 'Hardrive HDD', 'Hardrive HDD', 'Hardrive HDD', 'Hardrive HDD', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'VIuCpuvzLNemwLJDTCKhOW2CXFiy6x', NULL, 0, 1),
(15, 'لاقط وايفاي', 'Wifi Adapter', 'لاقط وايفاي', 'Wifi Adapter', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'yfxVkWiBp1Yt5GdXf6teDgKBgNYAD4', NULL, 0, 1),
(16, 'كروت الشاشة', 'Graphic card', 'كروت الشاشة', 'Graphic card', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'hf1sNBGK2G1yJm4OHqzXRyFbTsTYIT', NULL, 0, 1),
(17, 'مبرد المعالج', 'CPU Cooler', 'مبرد المعالج', 'CPU Cooler', 0, 0, 9, NULL, '2022-04-04 10:32:01', '4kbUqINlNWf6g0yJ4Cu5jSu8UtcNFo', NULL, 0, 1),
(18, 'مزود الطاقة', 'Power Supply', 'مزود الطاقة', 'Power Supply', 0, 0, 9, NULL, '2022-04-04 10:32:01', 'LpMtCvrvDYOHdQzseeOHpl4vCaAnNa', NULL, 0, 1),
(19, 'الكيسات', 'Cases', 'الكيسات', 'Cases', 0, 0, 9, NULL, '2022-04-04 10:32:01', '8NwKrVZ7uULYiJCGyB9X7JfuAbN83T', NULL, 0, 1),
(20, 'اكسسوارات الكمبيوتر', 'Gaming Accessories', 'اكسسوارات الكمبيوتر', 'Gaming Accessories', 0, 1, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', 'pxFS9lNW0ktSAWpcoyjWU7K6wiOWNt', NULL, 0, 1),
(21, 'كراسي القمينق', 'Gaming Chair', 'كراسي القمينق', 'Gaming Chair', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'IkfdbXVfLwUSOmY0b6Yep8dGESB5fl', NULL, 0, 1),
(22, 'طاولات الكمبيوتر', 'Gaming Table', 'طاولات الكمبيوتر', 'Gaming Table', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'D5AqoLihAhsZNiV9f8xHrIEwmyFFGk', NULL, 0, 1),
(23, 'السماعات', 'Headset', 'السماعات', 'Headset', 0, 0, 20, NULL, '2022-04-04 10:32:01', '2ttJmjVWpwCVTItMclPhmJ1ChLkczv', NULL, 0, 1),
(24, 'الكاميرات', 'Webcams', 'الكاميرات', 'Webcams', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'vyj4e0lF5Zn76aYKOhAjyYUUmySdzY', NULL, 0, 1),
(25, 'الكيابل واكسسوات الاضاءة', 'Cables and lighting accessories', 'الكيابل واكسسوات الاضاءة', 'Cables and lighting accessories', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'GguuuZj5XfcPCbusSbki27K1okFZEg', NULL, 0, 1),
(26, 'الكيبوردات', 'Keyboards Gaming', 'الكيبوردات', 'Keyboards Gaming', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'lIfg1acgLRTCIW17LaRgufg9MANBy9', NULL, 0, 1),
(27, 'الماوسات', 'Mouses gaming', 'الماوسات', 'Mouses gaming', 0, 0, 20, NULL, '2022-06-29 13:18:43', 'GbFtrl5O2OEWNTUVwYAf9nazzL7P86', NULL, 0, 1),
(28, 'الماوسباد', 'Mousepad', 'الماوسباد', 'Mousepad', 0, 0, 20, NULL, '2022-06-29 13:18:47', 'sZNReWVYdjJtcOi5kp8xHo9MRQaJJg', NULL, 0, 1),
(29, 'مايكات احترافية', 'Professional Mics', 'مايكات احترافية', 'Professional Mics', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'jHVoQt5IF6zv2MY9t66YGa0PXHnPif', NULL, 0, 1),
(30, 'أكسسورات الستريم Elgato', 'Elgato stream accessories', 'أكسسورات الستريم Elgato', 'Elgato stream accessories', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'cI14kAVrmflPKFtiIk2ZSYlZb9xvHa', NULL, 0, 1),
(31, 'أكسسورات قيادة للالعاب', 'Driving accessories for games', 'أكسسورات قيادة للالعاب', 'Driving accessories for games', 0, 0, 20, NULL, '2022-04-04 10:32:01', 'WiLrViAs7020gYvUIvhZsyHj9q6RJH', NULL, 0, 1),
(32, 'اللاب توبات', 'Lap tops', 'اللاب توبات', 'Lap tops', 0, 1, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01', '9prECHkRbB0Pfk5D57eI9vlgH8Kx2l', NULL, 0, 1),
(33, 'Celeron & I3', 'Celeron & I3', 'Celeron & I3', 'Celeron & I3', 0, 0, 32, NULL, '2022-04-04 10:32:01', 'P3hEPAZ9ePvxFo2Ic0uaFP6vucDfD0', NULL, 0, 1),
(34, 'Intel I5', 'Intel I5', 'Intel I5', 'Intel I5', 0, 0, 32, NULL, '2022-04-04 10:32:01', 'YsI4ILxVZ3PoBsFwBRBy47FW7iI2gI', NULL, 0, 1),
(35, 'Intel I7', 'Intel I7', 'Intel I7', 'Intel I7', 0, 0, 32, NULL, '2022-04-04 10:32:01', '5u3Kfq9dci7Z19XI9TGFvEoh2Mu2Vs', NULL, 0, 1),
(36, 'الشاشات', 'Monitors', 'الشاشات', 'Monitors', 0, 1, NULL, '2022-04-04 10:32:01', '2022-05-09 14:03:33', '251UzzZUaBYb4bj8ADjj19dFkxdKpJ', 'flaticon-tv', 0, 1),
(37, '60-75Hz', '60-75Hz', '60-75Hz', '60-75Hz', 0, 0, 36, NULL, '2022-04-04 10:32:01', 'z504P70q48pmAToVj5i663KJiPJy2S', NULL, 0, 1),
(38, '120-144-165Hz', '120-144-165Hz', '120-144-165Hz', '120-144-165Hz', 0, 0, 36, NULL, '2022-04-04 10:32:01', 'UF9GbbJleJuTl5IZCDevbtguiWaZUd', NULL, 0, 1),
(39, '240hz-360hz', '240hz-360hz', '240hz-360hz', '240hz-360hz', 0, 0, 36, NULL, '2022-04-04 10:32:01', 'QzLJZsbePuMSJkKd5kd7xS9VkL6myL', NULL, 0, 1),
(40, 'كوابل / توصيلات احترافيه للشاشات', 'Professional cables / connections for monitors', 'كوابل / توصيلات احترافيه للشاشات', 'Professional cables / connections for monitors', 0, 0, 36, NULL, '2022-04-04 10:32:01', '5IJesNDICBskzQUO4V8aBT2528rhKk', NULL, 0, 1),
(41, 'فئة 101', 'Category 101', 'فئة 101', 'Category 101', 0, 1, NULL, '2022-05-02 15:53:45', '2022-06-21 14:36:55', 'Category-101', 'flaticon-music-system', 0, 0),
(46, 'nkjnkjnkj', 'njnjknkj', 'nkjnkjnkjn', 'nkjnkjnkj', 0, 1, NULL, '2022-05-04 17:15:24', '2022-05-04 17:15:24', 'njnjknkj', 'flaticon-responsive', 0, 1),
(47, 'العنوان 1', 'Title 1', 'العنوان 1', 'Title 1', 0, 0, 49, '2022-05-04 17:56:26', '2022-06-17 08:12:54', 'Title-1', NULL, 0, 1),
(48, 'العنوان 2', 'Title 2', 'العنوان 1', 'Title 1', 0, 0, 49, '2022-05-04 17:56:42', '2022-06-17 08:12:38', 'Title-2', NULL, 0, 1),
(49, 'العنوان 3', 'Title 3', 'العنوان 1', 'Title 1', 0, 1, NULL, '2022-05-04 17:58:03', '2022-06-21 21:36:51', 'Title-3', 'flaticon-tv', 0, 1),
(50, 'test category 102', 'test category 102', 'test category 102', 'test category 102', 0, 1, NULL, '2022-06-21 14:07:13', '2022-06-29 13:17:24', 'test-category-102', 'flaticon-tv', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_custome_fields`
--

CREATE TABLE `product_custome_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_custome_fields`
--

INSERT INTO `product_custome_fields` (`id`, `created_at`, `updated_at`, `title`, `value`, `type`, `product_id`, `category_id`, `category_attribute_id`) VALUES
(71, NULL, NULL, 'المعالج', 'amd', 'options', 2019, 1, 33),
(72, NULL, NULL, 'size', '10', 'number', 2019, 1, 35),
(73, NULL, NULL, 'test w', 'val 1', 'options', 2019, 1, 43),
(74, NULL, NULL, 'test', '10', 'number', 2019, 1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `product_promotions`
--

CREATE TABLE `product_promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `old_price` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_ratio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `promotion_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_promotions`
--

INSERT INTO `product_promotions` (`id`, `created_at`, `updated_at`, `start_date`, `end_date`, `old_price`, `price`, `quantity`, `discount_ratio`, `is_active`, `product_id`, `promotion_id`) VALUES
(10, NULL, '2022-05-09 13:47:25', '2022-05-02', '2022-05-11', 120.00, 100.00, 4, '17', 1, 2001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `created_at`, `updated_at`, `title`, `start_date`, `end_date`, `is_active`, `meta`) VALUES
(1, '2022-04-06 17:08:00', '2022-05-09 13:47:25', 'عرض لقطة', '2022-05-02', '2022-05-11', 1, '{\"products\":[\"2001\"],\"products_meta\":{\"2001\":{\"quantity\":\"4\",\"price\":\"100\",\"old_price\":120}}}'),
(2, '2022-05-02 02:57:34', '2022-05-04 06:54:16', 'عرض الحلو', '2022-05-03', '2022-05-04', 0, '{\"products\":[\"1\"],\"products_meta\":{\"1\":{\"quantity\":\"5\",\"old_price\":217,\"price\":\"195\"}}}'),
(3, '2022-05-10 15:28:47', '2022-05-10 15:28:53', 'عرض العيد', '2022-05-10', '2022-05-25', 1, '{\"products\":[\"1\",\"4\"],\"products_meta\":{\"1\":{\"quantity\":\"5\",\"old_price\":217,\"price\":\"210\"},\"4\":{\"quantity\":\"10\",\"old_price\":367,\"price\":\"200\"}}}');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT 0.00,
  `use_count` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `created_at`, `updated_at`, `code`, `type`, `value`, `use_count`, `is_active`, `user_id`) VALUES
(1, '2022-04-06 17:05:53', '2022-04-06 17:05:58', 'DwRAJk', 'fixed', 10.00, 0, 1, 1),
(2, '2022-05-02 03:20:48', '2022-05-02 03:20:48', '$@V)&9', 'fixed', 10.00, 0, 0, NULL),
(3, '2022-05-10 15:29:47', '2022-07-05 07:56:59', 'special-customer', 'percentage', 10.00, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Has access to all dashboard panel.', '2022-04-27 02:03:30', '2022-04-30 19:02:45'),
(3, 'zxczxc', 'zxczxc', 'zxczxczx', '2022-04-27 02:38:55', '2022-04-27 02:38:55'),
(4, 'zxczxcss', 'zxczxcss', 'zxczxczx', '2022-04-27 02:39:40', '2022-04-27 02:39:40'),
(5, 'zxczxcss2', 'zxczxcss2', 'zxczxczx2', '2022-04-27 02:40:49', '2022-04-27 02:40:49'),
(7, 'user_tech', 'user tech', 'User Tech', '2022-04-30 18:00:04', '2022-05-01 04:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(7, 5, 'App\\User'),
(7, 9, 'App\\User'),
(1, 11, 'App\\User'),
(1, 12, 'App\\User'),
(1, 13, 'App\\User'),
(7, 14, 'App\\User'),
(7, 17, 'App\\User'),
(7, 18, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `r_category_products`
--

CREATE TABLE `r_category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_category_products`
--

INSERT INTO `r_category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(3, 1, 3, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(5, 1, 5, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(6, 1, 6, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(7, 1, 7, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(8, 1, 8, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(9, 1, 9, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(10, 1, 10, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(11, 1, 11, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(12, 1, 12, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(13, 1, 13, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(14, 1, 14, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(15, 1, 15, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(16, 1, 16, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(17, 1, 17, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(18, 1, 18, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(19, 1, 19, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(20, 1, 20, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(21, 1, 21, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(22, 1, 22, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(23, 1, 23, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(24, 1, 24, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(25, 1, 25, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(26, 1, 26, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(27, 1, 27, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(28, 1, 28, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(29, 1, 29, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(30, 1, 30, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(31, 1, 31, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(32, 1, 32, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(33, 1, 33, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(34, 1, 34, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(35, 1, 35, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(36, 1, 36, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(37, 1, 37, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(38, 1, 38, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(39, 1, 39, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(40, 1, 40, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(41, 1, 41, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(42, 1, 42, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(43, 1, 43, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(44, 1, 44, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(45, 1, 45, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(46, 1, 46, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(47, 1, 47, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(48, 1, 48, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(49, 1, 49, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(50, 1, 50, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(52, 2, 52, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(53, 2, 53, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(55, 2, 55, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(56, 2, 56, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(57, 2, 57, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(58, 2, 58, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(59, 2, 59, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(60, 2, 60, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(61, 2, 61, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(62, 2, 62, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(63, 2, 63, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(64, 2, 64, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(65, 2, 65, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(66, 2, 66, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(67, 2, 67, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(68, 2, 68, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(69, 2, 69, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(70, 2, 70, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(71, 2, 71, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(72, 2, 72, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(73, 2, 73, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(74, 2, 74, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(75, 2, 75, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(76, 2, 76, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(77, 2, 77, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(78, 2, 78, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(79, 2, 79, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(80, 2, 80, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(81, 2, 81, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(82, 2, 82, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(83, 2, 83, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(84, 2, 84, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(85, 2, 85, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(86, 2, 86, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(87, 2, 87, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(88, 2, 88, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(89, 2, 89, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(90, 2, 90, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(91, 2, 91, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(92, 2, 92, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(93, 2, 93, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(94, 2, 94, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(95, 2, 95, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(96, 2, 96, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(97, 2, 97, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(98, 2, 98, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(99, 2, 99, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(100, 2, 100, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(101, 3, 101, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(102, 3, 102, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(103, 3, 103, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(104, 3, 104, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(105, 3, 105, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(106, 3, 106, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(107, 3, 107, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(108, 3, 108, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(109, 3, 109, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(110, 3, 110, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(111, 3, 111, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(112, 3, 112, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(113, 3, 113, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(114, 3, 114, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(115, 3, 115, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(116, 3, 116, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(117, 3, 117, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(118, 3, 118, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(119, 3, 119, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(120, 3, 120, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(121, 3, 121, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(122, 3, 122, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(123, 3, 123, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(124, 3, 124, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(125, 3, 125, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(126, 3, 126, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(127, 3, 127, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(128, 3, 128, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(129, 3, 129, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(130, 3, 130, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(131, 3, 131, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(132, 3, 132, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(133, 3, 133, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(134, 3, 134, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(135, 3, 135, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(136, 3, 136, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(137, 3, 137, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(138, 3, 138, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(139, 3, 139, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(140, 3, 140, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(141, 3, 141, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(142, 3, 142, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(143, 3, 143, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(144, 3, 144, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(145, 3, 145, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(146, 3, 146, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(147, 3, 147, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(148, 3, 148, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(149, 3, 149, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(150, 3, 150, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(151, 4, 151, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(152, 4, 152, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(153, 4, 153, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(154, 4, 154, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(155, 4, 155, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(156, 4, 156, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(157, 4, 157, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(158, 4, 158, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(159, 4, 159, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(160, 4, 160, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(161, 4, 161, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(162, 4, 162, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(163, 4, 163, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(164, 4, 164, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(165, 4, 165, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(166, 4, 166, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(167, 4, 167, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(168, 4, 168, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(169, 4, 169, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(170, 4, 170, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(171, 4, 171, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(172, 4, 172, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(173, 4, 173, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(174, 4, 174, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(175, 4, 175, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(176, 4, 176, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(177, 4, 177, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(178, 4, 178, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(179, 4, 179, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(180, 4, 180, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(181, 4, 181, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(182, 4, 182, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(183, 4, 183, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(184, 4, 184, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(185, 4, 185, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(186, 4, 186, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(187, 4, 187, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(188, 4, 188, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(189, 4, 189, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(190, 4, 190, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(191, 4, 191, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(192, 4, 192, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(193, 4, 193, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(194, 4, 194, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(195, 4, 195, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(196, 4, 196, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(197, 4, 197, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(198, 4, 198, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(199, 4, 199, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(200, 4, 200, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(201, 5, 201, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(202, 5, 202, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(203, 5, 203, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(204, 5, 204, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(205, 5, 205, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(206, 5, 206, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(207, 5, 207, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(208, 5, 208, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(209, 5, 209, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(210, 5, 210, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(211, 5, 211, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(212, 5, 212, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(213, 5, 213, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(214, 5, 214, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(215, 5, 215, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(216, 5, 216, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(217, 5, 217, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(218, 5, 218, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(219, 5, 219, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(220, 5, 220, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(221, 5, 221, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(222, 5, 222, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(223, 5, 223, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(224, 5, 224, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(225, 5, 225, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(226, 5, 226, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(227, 5, 227, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(228, 5, 228, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(229, 5, 229, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(230, 5, 230, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(231, 5, 231, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(232, 5, 232, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(233, 5, 233, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(234, 5, 234, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(235, 5, 235, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(236, 5, 236, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(237, 5, 237, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(238, 5, 238, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(239, 5, 239, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(240, 5, 240, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(241, 5, 241, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(242, 5, 242, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(243, 5, 243, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(244, 5, 244, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(245, 5, 245, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(246, 5, 246, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(247, 5, 247, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(248, 5, 248, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(249, 5, 249, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(250, 5, 250, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(251, 6, 251, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(252, 6, 252, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(253, 6, 253, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(254, 6, 254, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(255, 6, 255, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(256, 6, 256, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(257, 6, 257, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(258, 6, 258, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(259, 6, 259, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(260, 6, 260, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(261, 6, 261, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(262, 6, 262, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(263, 6, 263, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(264, 6, 264, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(265, 6, 265, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(266, 6, 266, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(267, 6, 267, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(268, 6, 268, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(269, 6, 269, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(270, 6, 270, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(271, 6, 271, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(272, 6, 272, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(273, 6, 273, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(274, 6, 274, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(275, 6, 275, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(276, 6, 276, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(277, 6, 277, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(278, 6, 278, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(279, 6, 279, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(280, 6, 280, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(281, 6, 281, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(282, 6, 282, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(283, 6, 283, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(284, 6, 284, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(285, 6, 285, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(286, 6, 286, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(287, 6, 287, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(288, 6, 288, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(289, 6, 289, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(290, 6, 290, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(291, 6, 291, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(292, 6, 292, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(293, 6, 293, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(294, 6, 294, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(295, 6, 295, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(296, 6, 296, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(297, 6, 297, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(298, 6, 298, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(299, 6, 299, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(300, 6, 300, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(301, 7, 301, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(302, 7, 302, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(303, 7, 303, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(304, 7, 304, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(305, 7, 305, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(306, 7, 306, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(307, 7, 307, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(308, 7, 308, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(309, 7, 309, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(310, 7, 310, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(311, 7, 311, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(312, 7, 312, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(313, 7, 313, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(314, 7, 314, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(315, 7, 315, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(316, 7, 316, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(317, 7, 317, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(318, 7, 318, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(319, 7, 319, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(320, 7, 320, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(321, 7, 321, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(322, 7, 322, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(323, 7, 323, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(324, 7, 324, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(325, 7, 325, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(326, 7, 326, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(327, 7, 327, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(328, 7, 328, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(329, 7, 329, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(330, 7, 330, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(331, 7, 331, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(332, 7, 332, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(333, 7, 333, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(334, 7, 334, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(335, 7, 335, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(336, 7, 336, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(337, 7, 337, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(338, 7, 338, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(339, 7, 339, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(340, 7, 340, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(341, 7, 341, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(342, 7, 342, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(343, 7, 343, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(344, 7, 344, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(345, 7, 345, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(346, 7, 346, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(347, 7, 347, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(348, 7, 348, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(349, 7, 349, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(350, 7, 350, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(351, 8, 351, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(352, 8, 352, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(353, 8, 353, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(355, 8, 355, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(356, 8, 356, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(357, 8, 357, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(358, 8, 358, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(359, 8, 359, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(360, 8, 360, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(361, 8, 361, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(362, 8, 362, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(363, 8, 363, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(364, 8, 364, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(365, 8, 365, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(366, 8, 366, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(367, 8, 367, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(368, 8, 368, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(369, 8, 369, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(370, 8, 370, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(371, 8, 371, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(372, 8, 372, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(373, 8, 373, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(374, 8, 374, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(375, 8, 375, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(376, 8, 376, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(377, 8, 377, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(378, 8, 378, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(379, 8, 379, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(380, 8, 380, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(381, 8, 381, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(382, 8, 382, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(383, 8, 383, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(384, 8, 384, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(385, 8, 385, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(386, 8, 386, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(387, 8, 387, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(388, 8, 388, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(389, 8, 389, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(390, 8, 390, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(391, 8, 391, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(392, 8, 392, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(393, 8, 393, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(394, 8, 394, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(395, 8, 395, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(396, 8, 396, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(397, 8, 397, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(398, 8, 398, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(399, 8, 399, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(400, 8, 400, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(401, 9, 401, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(402, 9, 402, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(403, 9, 403, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(404, 9, 404, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(405, 9, 405, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(406, 9, 406, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(407, 9, 407, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(408, 9, 408, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(409, 9, 409, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(410, 9, 410, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(411, 9, 411, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(412, 9, 412, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(413, 9, 413, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(414, 9, 414, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(415, 9, 415, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(416, 9, 416, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(417, 9, 417, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(418, 9, 418, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(419, 9, 419, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(420, 9, 420, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(421, 9, 421, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(422, 9, 422, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(423, 9, 423, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(424, 9, 424, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(425, 9, 425, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(426, 9, 426, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(427, 9, 427, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(428, 9, 428, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(429, 9, 429, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(430, 9, 430, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(431, 9, 431, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(432, 9, 432, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(433, 9, 433, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(434, 9, 434, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(435, 9, 435, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(436, 9, 436, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(437, 9, 437, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(438, 9, 438, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(439, 9, 439, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(440, 9, 440, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(441, 9, 441, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(442, 9, 442, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(443, 9, 443, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(444, 9, 444, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(445, 9, 445, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(446, 9, 446, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(447, 9, 447, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(448, 9, 448, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(449, 9, 449, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(450, 9, 450, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(451, 10, 451, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(452, 10, 452, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(453, 10, 453, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(454, 10, 454, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(455, 10, 455, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(456, 10, 456, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(457, 10, 457, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(458, 10, 458, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(459, 10, 459, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(460, 10, 460, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(461, 10, 461, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(462, 10, 462, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(463, 10, 463, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(464, 10, 464, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(465, 10, 465, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(466, 10, 466, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(467, 10, 467, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(468, 10, 468, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(469, 10, 469, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(470, 10, 470, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(471, 10, 471, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(472, 10, 472, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(473, 10, 473, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(474, 10, 474, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(475, 10, 475, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(476, 10, 476, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(477, 10, 477, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(478, 10, 478, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(479, 10, 479, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(480, 10, 480, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(481, 10, 481, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(482, 10, 482, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(483, 10, 483, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(484, 10, 484, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(485, 10, 485, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(486, 10, 486, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(487, 10, 487, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(488, 10, 488, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(489, 10, 489, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(490, 10, 490, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(491, 10, 491, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(492, 10, 492, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(493, 10, 493, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(494, 10, 494, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(495, 10, 495, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(496, 10, 496, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(497, 10, 497, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(498, 10, 498, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(499, 10, 499, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(500, 10, 500, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(502, 11, 502, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(503, 11, 503, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(504, 11, 504, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(505, 11, 505, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(506, 11, 506, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(507, 11, 507, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(508, 11, 508, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(509, 11, 509, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(510, 11, 510, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(511, 11, 511, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(512, 11, 512, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(513, 11, 513, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(514, 11, 514, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(515, 11, 515, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(516, 11, 516, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(517, 11, 517, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(518, 11, 518, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(519, 11, 519, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(520, 11, 520, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(521, 11, 521, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(522, 11, 522, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(523, 11, 523, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(524, 11, 524, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(525, 11, 525, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(526, 11, 526, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(527, 11, 527, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(528, 11, 528, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(529, 11, 529, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(530, 11, 530, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(531, 11, 531, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(532, 11, 532, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(533, 11, 533, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(534, 11, 534, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(535, 11, 535, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(536, 11, 536, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(537, 11, 537, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(538, 11, 538, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(539, 11, 539, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(540, 11, 540, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(541, 11, 541, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(542, 11, 542, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(543, 11, 543, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(544, 11, 544, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(545, 11, 545, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(546, 11, 546, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(547, 11, 547, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(548, 11, 548, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(549, 11, 549, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(550, 11, 550, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(552, 12, 552, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(555, 12, 555, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(556, 12, 556, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(557, 12, 557, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(558, 12, 558, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(559, 12, 559, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(560, 12, 560, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(562, 12, 562, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(563, 12, 563, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(564, 12, 564, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(565, 12, 565, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(566, 12, 566, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(567, 12, 567, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(568, 12, 568, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(569, 12, 569, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(570, 12, 570, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(571, 12, 571, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(572, 12, 572, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(573, 12, 573, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(574, 12, 574, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(575, 12, 575, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(576, 12, 576, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(577, 12, 577, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(578, 12, 578, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(579, 12, 579, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(580, 12, 580, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(581, 12, 581, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(582, 12, 582, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(583, 12, 583, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(584, 12, 584, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(585, 12, 585, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(586, 12, 586, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(587, 12, 587, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(588, 12, 588, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(589, 12, 589, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(590, 12, 590, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(591, 12, 591, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(592, 12, 592, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(593, 12, 593, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(594, 12, 594, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(595, 12, 595, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(596, 12, 596, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(597, 12, 597, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(598, 12, 598, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(599, 12, 599, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(600, 12, 600, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(605, 13, 605, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(607, 13, 607, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(608, 13, 608, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(609, 13, 609, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(610, 13, 610, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(611, 13, 611, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(612, 13, 612, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(613, 13, 613, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(614, 13, 614, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(615, 13, 615, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(616, 13, 616, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(617, 13, 617, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(618, 13, 618, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(619, 13, 619, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(620, 13, 620, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(621, 13, 621, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(622, 13, 622, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(623, 13, 623, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(624, 13, 624, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(625, 13, 625, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(626, 13, 626, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(627, 13, 627, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(628, 13, 628, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(629, 13, 629, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(630, 13, 630, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(631, 13, 631, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(632, 13, 632, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(633, 13, 633, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(634, 13, 634, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(635, 13, 635, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(636, 13, 636, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(637, 13, 637, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(638, 13, 638, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(639, 13, 639, '2022-04-04 10:32:02', '2022-04-04 10:32:02'),
(640, 13, 640, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(641, 13, 641, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(642, 13, 642, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(643, 13, 643, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(644, 13, 644, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(645, 13, 645, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(646, 13, 646, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(647, 13, 647, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(648, 13, 648, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(649, 13, 649, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(650, 13, 650, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(652, 14, 652, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(654, 14, 654, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(655, 14, 655, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(656, 14, 656, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(657, 14, 657, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(658, 14, 658, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(659, 14, 659, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(660, 14, 660, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(661, 14, 661, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(662, 14, 662, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(663, 14, 663, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(664, 14, 664, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(665, 14, 665, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(666, 14, 666, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(667, 14, 667, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(668, 14, 668, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(669, 14, 669, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(670, 14, 670, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(671, 14, 671, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(672, 14, 672, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(673, 14, 673, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(674, 14, 674, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(675, 14, 675, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(676, 14, 676, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(677, 14, 677, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(678, 14, 678, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(679, 14, 679, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(680, 14, 680, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(681, 14, 681, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(682, 14, 682, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(683, 14, 683, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(684, 14, 684, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(685, 14, 685, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(686, 14, 686, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(687, 14, 687, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(688, 14, 688, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(689, 14, 689, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(690, 14, 690, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(691, 14, 691, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(692, 14, 692, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(693, 14, 693, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(694, 14, 694, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(695, 14, 695, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(696, 14, 696, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(697, 14, 697, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(698, 14, 698, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(699, 14, 699, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(700, 14, 700, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(701, 15, 701, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(702, 15, 702, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(703, 15, 703, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(704, 15, 704, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(705, 15, 705, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(706, 15, 706, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(707, 15, 707, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(708, 15, 708, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(709, 15, 709, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(710, 15, 710, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(711, 15, 711, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(712, 15, 712, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(713, 15, 713, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(714, 15, 714, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(715, 15, 715, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(716, 15, 716, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(717, 15, 717, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(718, 15, 718, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(719, 15, 719, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(720, 15, 720, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(721, 15, 721, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(722, 15, 722, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(723, 15, 723, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(724, 15, 724, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(725, 15, 725, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(726, 15, 726, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(727, 15, 727, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(728, 15, 728, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(729, 15, 729, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(730, 15, 730, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(731, 15, 731, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(732, 15, 732, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(733, 15, 733, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(734, 15, 734, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(735, 15, 735, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(736, 15, 736, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(737, 15, 737, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(738, 15, 738, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(739, 15, 739, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(740, 15, 740, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(741, 15, 741, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(742, 15, 742, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(743, 15, 743, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(744, 15, 744, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(745, 15, 745, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(746, 15, 746, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(747, 15, 747, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(748, 15, 748, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(749, 15, 749, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(750, 15, 750, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(755, 16, 755, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(756, 16, 756, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(757, 16, 757, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(759, 16, 759, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(760, 16, 760, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(761, 16, 761, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(762, 16, 762, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(763, 16, 763, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(764, 16, 764, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(765, 16, 765, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(766, 16, 766, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(767, 16, 767, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(768, 16, 768, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(769, 16, 769, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(770, 16, 770, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(771, 16, 771, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(772, 16, 772, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(773, 16, 773, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(774, 16, 774, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(775, 16, 775, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(776, 16, 776, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(777, 16, 777, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(778, 16, 778, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(779, 16, 779, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(780, 16, 780, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(781, 16, 781, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(782, 16, 782, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(783, 16, 783, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(784, 16, 784, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(785, 16, 785, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(786, 16, 786, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(787, 16, 787, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(788, 16, 788, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(789, 16, 789, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(790, 16, 790, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(791, 16, 791, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(792, 16, 792, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(793, 16, 793, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(794, 16, 794, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(795, 16, 795, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(796, 16, 796, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(797, 16, 797, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(798, 16, 798, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(799, 16, 799, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(800, 16, 800, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(801, 17, 801, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(802, 17, 802, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(803, 17, 803, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(804, 17, 804, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(805, 17, 805, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(806, 17, 806, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(807, 17, 807, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(808, 17, 808, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(809, 17, 809, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(810, 17, 810, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(811, 17, 811, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(812, 17, 812, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(813, 17, 813, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(814, 17, 814, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(815, 17, 815, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(816, 17, 816, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(817, 17, 817, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(818, 17, 818, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(819, 17, 819, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(820, 17, 820, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(821, 17, 821, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(822, 17, 822, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(823, 17, 823, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(824, 17, 824, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(825, 17, 825, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(826, 17, 826, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(827, 17, 827, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(828, 17, 828, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(829, 17, 829, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(830, 17, 830, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(831, 17, 831, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(832, 17, 832, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(833, 17, 833, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(834, 17, 834, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(835, 17, 835, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(836, 17, 836, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(837, 17, 837, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(838, 17, 838, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(839, 17, 839, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(840, 17, 840, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(841, 17, 841, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(842, 17, 842, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(843, 17, 843, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(844, 17, 844, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(845, 17, 845, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(846, 17, 846, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(847, 17, 847, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(848, 17, 848, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(849, 17, 849, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(850, 17, 850, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(851, 18, 851, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(852, 18, 852, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(853, 18, 853, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(854, 18, 854, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(855, 18, 855, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(856, 18, 856, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(857, 18, 857, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(858, 18, 858, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(859, 18, 859, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(860, 18, 860, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(861, 18, 861, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(862, 18, 862, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(863, 18, 863, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(864, 18, 864, '2022-04-04 10:32:03', '2022-04-04 10:32:03');
INSERT INTO `r_category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(865, 18, 865, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(866, 18, 866, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(867, 18, 867, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(868, 18, 868, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(869, 18, 869, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(870, 18, 870, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(871, 18, 871, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(872, 18, 872, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(873, 18, 873, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(874, 18, 874, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(875, 18, 875, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(876, 18, 876, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(877, 18, 877, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(878, 18, 878, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(879, 18, 879, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(880, 18, 880, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(881, 18, 881, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(882, 18, 882, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(883, 18, 883, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(884, 18, 884, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(885, 18, 885, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(886, 18, 886, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(887, 18, 887, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(888, 18, 888, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(889, 18, 889, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(890, 18, 890, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(891, 18, 891, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(892, 18, 892, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(893, 18, 893, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(894, 18, 894, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(895, 18, 895, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(896, 18, 896, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(897, 18, 897, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(898, 18, 898, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(899, 18, 899, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(900, 18, 900, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(902, 19, 902, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(904, 19, 904, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(905, 19, 905, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(906, 19, 906, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(907, 19, 907, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(908, 19, 908, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(909, 19, 909, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(910, 19, 910, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(911, 19, 911, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(912, 19, 912, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(913, 19, 913, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(914, 19, 914, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(915, 19, 915, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(916, 19, 916, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(917, 19, 917, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(918, 19, 918, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(919, 19, 919, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(920, 19, 920, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(922, 19, 922, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(923, 19, 923, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(924, 19, 924, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(925, 19, 925, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(926, 19, 926, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(927, 19, 927, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(928, 19, 928, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(929, 19, 929, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(930, 19, 930, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(931, 19, 931, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(932, 19, 932, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(933, 19, 933, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(934, 19, 934, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(935, 19, 935, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(936, 19, 936, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(937, 19, 937, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(938, 19, 938, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(939, 19, 939, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(940, 19, 940, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(941, 19, 941, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(942, 19, 942, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(943, 19, 943, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(944, 19, 944, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(945, 19, 945, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(946, 19, 946, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(947, 19, 947, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(948, 19, 948, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(949, 19, 949, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(950, 19, 950, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(951, 20, 951, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(952, 20, 952, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(953, 20, 953, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(954, 20, 954, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(955, 20, 955, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(956, 20, 956, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(957, 20, 957, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(958, 20, 958, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(959, 20, 959, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(960, 20, 960, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(961, 20, 961, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(962, 20, 962, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(963, 20, 963, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(964, 20, 964, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(965, 20, 965, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(966, 20, 966, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(967, 20, 967, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(968, 20, 968, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(969, 20, 969, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(970, 20, 970, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(971, 20, 971, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(972, 20, 972, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(973, 20, 973, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(974, 20, 974, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(975, 20, 975, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(976, 20, 976, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(977, 20, 977, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(978, 20, 978, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(979, 20, 979, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(980, 20, 980, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(981, 20, 981, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(982, 20, 982, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(983, 20, 983, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(984, 20, 984, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(985, 20, 985, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(986, 20, 986, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(987, 20, 987, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(988, 20, 988, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(989, 20, 989, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(990, 20, 990, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(991, 20, 991, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(992, 20, 992, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(993, 20, 993, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(994, 20, 994, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(995, 20, 995, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(996, 20, 996, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(997, 20, 997, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(998, 20, 998, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(999, 20, 999, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1000, 20, 1000, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1001, 21, 1001, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1002, 21, 1002, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1003, 21, 1003, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1004, 21, 1004, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1005, 21, 1005, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1006, 21, 1006, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1007, 21, 1007, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1008, 21, 1008, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1009, 21, 1009, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1010, 21, 1010, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1011, 21, 1011, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1012, 21, 1012, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1013, 21, 1013, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1014, 21, 1014, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1015, 21, 1015, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1016, 21, 1016, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1017, 21, 1017, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1018, 21, 1018, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1019, 21, 1019, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1020, 21, 1020, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1021, 21, 1021, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1022, 21, 1022, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1023, 21, 1023, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1024, 21, 1024, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1025, 21, 1025, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1026, 21, 1026, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1027, 21, 1027, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1028, 21, 1028, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1029, 21, 1029, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1030, 21, 1030, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1031, 21, 1031, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1032, 21, 1032, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1033, 21, 1033, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1034, 21, 1034, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1035, 21, 1035, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1036, 21, 1036, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1037, 21, 1037, '2022-04-04 10:32:03', '2022-04-04 10:32:03'),
(1038, 21, 1038, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1039, 21, 1039, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1040, 21, 1040, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1041, 21, 1041, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1042, 21, 1042, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1043, 21, 1043, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1044, 21, 1044, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1045, 21, 1045, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1046, 21, 1046, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1047, 21, 1047, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1048, 21, 1048, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1049, 21, 1049, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1050, 21, 1050, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1051, 22, 1051, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1052, 22, 1052, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1053, 22, 1053, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1054, 22, 1054, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1055, 22, 1055, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1056, 22, 1056, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1057, 22, 1057, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1058, 22, 1058, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1059, 22, 1059, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1060, 22, 1060, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1061, 22, 1061, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1062, 22, 1062, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1063, 22, 1063, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1064, 22, 1064, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1065, 22, 1065, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1066, 22, 1066, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1067, 22, 1067, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1068, 22, 1068, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1069, 22, 1069, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1070, 22, 1070, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1071, 22, 1071, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1072, 22, 1072, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1073, 22, 1073, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1074, 22, 1074, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1075, 22, 1075, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1076, 22, 1076, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1077, 22, 1077, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1078, 22, 1078, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1079, 22, 1079, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1080, 22, 1080, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1081, 22, 1081, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1082, 22, 1082, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1083, 22, 1083, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1084, 22, 1084, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1085, 22, 1085, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1086, 22, 1086, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1087, 22, 1087, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1088, 22, 1088, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1089, 22, 1089, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1090, 22, 1090, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1091, 22, 1091, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1092, 22, 1092, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1093, 22, 1093, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1094, 22, 1094, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1095, 22, 1095, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1096, 22, 1096, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1097, 22, 1097, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1098, 22, 1098, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1099, 22, 1099, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1100, 22, 1100, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1101, 23, 1101, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1102, 23, 1102, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1103, 23, 1103, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1104, 23, 1104, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1105, 23, 1105, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1106, 23, 1106, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1107, 23, 1107, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1108, 23, 1108, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1109, 23, 1109, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1110, 23, 1110, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1111, 23, 1111, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1112, 23, 1112, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1113, 23, 1113, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1114, 23, 1114, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1115, 23, 1115, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1116, 23, 1116, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1117, 23, 1117, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1118, 23, 1118, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1119, 23, 1119, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1120, 23, 1120, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1121, 23, 1121, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1122, 23, 1122, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1123, 23, 1123, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1124, 23, 1124, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1125, 23, 1125, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1126, 23, 1126, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1127, 23, 1127, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1128, 23, 1128, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1129, 23, 1129, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1130, 23, 1130, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1131, 23, 1131, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1132, 23, 1132, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1133, 23, 1133, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1134, 23, 1134, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1135, 23, 1135, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1136, 23, 1136, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1137, 23, 1137, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1138, 23, 1138, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1139, 23, 1139, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1140, 23, 1140, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1141, 23, 1141, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1142, 23, 1142, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1143, 23, 1143, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1144, 23, 1144, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1145, 23, 1145, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1146, 23, 1146, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1147, 23, 1147, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1148, 23, 1148, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1149, 23, 1149, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1150, 23, 1150, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1151, 24, 1151, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1152, 24, 1152, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1153, 24, 1153, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1154, 24, 1154, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1155, 24, 1155, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1156, 24, 1156, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1157, 24, 1157, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1158, 24, 1158, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1159, 24, 1159, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1160, 24, 1160, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1161, 24, 1161, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1162, 24, 1162, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1163, 24, 1163, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1164, 24, 1164, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1165, 24, 1165, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1166, 24, 1166, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1167, 24, 1167, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1168, 24, 1168, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1169, 24, 1169, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1170, 24, 1170, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1171, 24, 1171, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1172, 24, 1172, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1173, 24, 1173, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1174, 24, 1174, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1175, 24, 1175, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1176, 24, 1176, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1177, 24, 1177, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1178, 24, 1178, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1179, 24, 1179, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1180, 24, 1180, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1181, 24, 1181, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1182, 24, 1182, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1183, 24, 1183, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1184, 24, 1184, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1185, 24, 1185, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1186, 24, 1186, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1187, 24, 1187, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1188, 24, 1188, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1189, 24, 1189, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1190, 24, 1190, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1191, 24, 1191, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1192, 24, 1192, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1193, 24, 1193, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1194, 24, 1194, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1195, 24, 1195, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1196, 24, 1196, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1197, 24, 1197, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1198, 24, 1198, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1199, 24, 1199, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1200, 24, 1200, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1201, 25, 1201, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1202, 25, 1202, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1203, 25, 1203, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1204, 25, 1204, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1205, 25, 1205, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1206, 25, 1206, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1207, 25, 1207, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1208, 25, 1208, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1209, 25, 1209, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1210, 25, 1210, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1211, 25, 1211, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1212, 25, 1212, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1213, 25, 1213, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1214, 25, 1214, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1215, 25, 1215, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1216, 25, 1216, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1217, 25, 1217, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1218, 25, 1218, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1219, 25, 1219, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1220, 25, 1220, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1221, 25, 1221, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1222, 25, 1222, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1223, 25, 1223, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1224, 25, 1224, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1225, 25, 1225, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1226, 25, 1226, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1227, 25, 1227, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1228, 25, 1228, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1229, 25, 1229, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1230, 25, 1230, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1231, 25, 1231, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1232, 25, 1232, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1233, 25, 1233, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1234, 25, 1234, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1235, 25, 1235, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1236, 25, 1236, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1237, 25, 1237, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1238, 25, 1238, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1239, 25, 1239, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1240, 25, 1240, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1241, 25, 1241, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1242, 25, 1242, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1243, 25, 1243, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1244, 25, 1244, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1245, 25, 1245, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1246, 25, 1246, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1247, 25, 1247, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1248, 25, 1248, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1249, 25, 1249, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1250, 25, 1250, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1251, 26, 1251, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1252, 26, 1252, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1253, 26, 1253, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1254, 26, 1254, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1255, 26, 1255, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1256, 26, 1256, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1257, 26, 1257, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1258, 26, 1258, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1259, 26, 1259, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1260, 26, 1260, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1261, 26, 1261, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1262, 26, 1262, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1263, 26, 1263, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1264, 26, 1264, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1265, 26, 1265, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1266, 26, 1266, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1267, 26, 1267, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1268, 26, 1268, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1269, 26, 1269, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1270, 26, 1270, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1271, 26, 1271, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1272, 26, 1272, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1273, 26, 1273, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1274, 26, 1274, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1275, 26, 1275, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1276, 26, 1276, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1277, 26, 1277, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1278, 26, 1278, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1279, 26, 1279, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1280, 26, 1280, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1281, 26, 1281, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1282, 26, 1282, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1283, 26, 1283, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1284, 26, 1284, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1285, 26, 1285, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1286, 26, 1286, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1287, 26, 1287, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1288, 26, 1288, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1289, 26, 1289, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1290, 26, 1290, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1291, 26, 1291, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1292, 26, 1292, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1293, 26, 1293, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1294, 26, 1294, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1295, 26, 1295, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1296, 26, 1296, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1297, 26, 1297, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1298, 26, 1298, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1299, 26, 1299, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1300, 26, 1300, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1301, 27, 1301, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1302, 27, 1302, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1303, 27, 1303, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1304, 27, 1304, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1305, 27, 1305, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1306, 27, 1306, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1307, 27, 1307, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1308, 27, 1308, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1309, 27, 1309, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1310, 27, 1310, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1311, 27, 1311, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1312, 27, 1312, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1313, 27, 1313, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1314, 27, 1314, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1315, 27, 1315, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1316, 27, 1316, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1317, 27, 1317, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1318, 27, 1318, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1319, 27, 1319, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1320, 27, 1320, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1321, 27, 1321, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1322, 27, 1322, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1323, 27, 1323, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1324, 27, 1324, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1325, 27, 1325, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1326, 27, 1326, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1327, 27, 1327, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1328, 27, 1328, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1329, 27, 1329, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1330, 27, 1330, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1331, 27, 1331, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1332, 27, 1332, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1333, 27, 1333, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1334, 27, 1334, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1335, 27, 1335, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1336, 27, 1336, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1337, 27, 1337, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1338, 27, 1338, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1339, 27, 1339, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1340, 27, 1340, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1341, 27, 1341, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1342, 27, 1342, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1343, 27, 1343, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1344, 27, 1344, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1345, 27, 1345, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1346, 27, 1346, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1347, 27, 1347, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1348, 27, 1348, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1349, 27, 1349, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1350, 27, 1350, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1351, 28, 1351, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1352, 28, 1352, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1353, 28, 1353, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1354, 28, 1354, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1355, 28, 1355, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1356, 28, 1356, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1357, 28, 1357, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1358, 28, 1358, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1359, 28, 1359, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1360, 28, 1360, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1361, 28, 1361, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1362, 28, 1362, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1363, 28, 1363, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1364, 28, 1364, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1365, 28, 1365, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1366, 28, 1366, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1367, 28, 1367, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1368, 28, 1368, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1369, 28, 1369, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1370, 28, 1370, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1371, 28, 1371, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1372, 28, 1372, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1373, 28, 1373, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1374, 28, 1374, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1375, 28, 1375, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1376, 28, 1376, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1377, 28, 1377, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1378, 28, 1378, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1379, 28, 1379, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1380, 28, 1380, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1381, 28, 1381, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1382, 28, 1382, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1383, 28, 1383, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1384, 28, 1384, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1385, 28, 1385, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1386, 28, 1386, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1387, 28, 1387, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1388, 28, 1388, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1389, 28, 1389, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1390, 28, 1390, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1391, 28, 1391, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1392, 28, 1392, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1393, 28, 1393, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1394, 28, 1394, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1395, 28, 1395, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1396, 28, 1396, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1397, 28, 1397, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1398, 28, 1398, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1399, 28, 1399, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1400, 28, 1400, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1401, 29, 1401, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1402, 29, 1402, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1403, 29, 1403, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1404, 29, 1404, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1405, 29, 1405, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1406, 29, 1406, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1407, 29, 1407, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1408, 29, 1408, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1409, 29, 1409, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1410, 29, 1410, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1411, 29, 1411, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1412, 29, 1412, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1413, 29, 1413, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1414, 29, 1414, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1415, 29, 1415, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1416, 29, 1416, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1417, 29, 1417, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1418, 29, 1418, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1419, 29, 1419, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1420, 29, 1420, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1421, 29, 1421, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1422, 29, 1422, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1423, 29, 1423, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1424, 29, 1424, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1425, 29, 1425, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1426, 29, 1426, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1427, 29, 1427, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1428, 29, 1428, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1429, 29, 1429, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1430, 29, 1430, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1431, 29, 1431, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1432, 29, 1432, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1433, 29, 1433, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1434, 29, 1434, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1435, 29, 1435, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1436, 29, 1436, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1437, 29, 1437, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1438, 29, 1438, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1439, 29, 1439, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1440, 29, 1440, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1441, 29, 1441, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1442, 29, 1442, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1443, 29, 1443, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1444, 29, 1444, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1445, 29, 1445, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1446, 29, 1446, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1447, 29, 1447, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1448, 29, 1448, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1449, 29, 1449, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1450, 29, 1450, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1451, 30, 1451, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1452, 30, 1452, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1453, 30, 1453, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1454, 30, 1454, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1455, 30, 1455, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1456, 30, 1456, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1457, 30, 1457, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1458, 30, 1458, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1459, 30, 1459, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1460, 30, 1460, '2022-04-04 10:32:04', '2022-04-04 10:32:04'),
(1461, 30, 1461, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1462, 30, 1462, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1463, 30, 1463, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1464, 30, 1464, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1465, 30, 1465, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1466, 30, 1466, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1467, 30, 1467, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1468, 30, 1468, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1469, 30, 1469, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1470, 30, 1470, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1471, 30, 1471, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1472, 30, 1472, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1473, 30, 1473, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1474, 30, 1474, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1475, 30, 1475, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1476, 30, 1476, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1477, 30, 1477, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1478, 30, 1478, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1479, 30, 1479, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1480, 30, 1480, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1481, 30, 1481, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1482, 30, 1482, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1483, 30, 1483, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1484, 30, 1484, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1485, 30, 1485, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1486, 30, 1486, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1487, 30, 1487, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1488, 30, 1488, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1489, 30, 1489, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1490, 30, 1490, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1491, 30, 1491, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1492, 30, 1492, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1493, 30, 1493, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1494, 30, 1494, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1495, 30, 1495, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1496, 30, 1496, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1497, 30, 1497, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1498, 30, 1498, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1499, 30, 1499, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1500, 30, 1500, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1501, 31, 1501, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1502, 31, 1502, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1503, 31, 1503, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1504, 31, 1504, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1505, 31, 1505, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1506, 31, 1506, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1507, 31, 1507, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1508, 31, 1508, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1509, 31, 1509, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1510, 31, 1510, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1511, 31, 1511, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1512, 31, 1512, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1513, 31, 1513, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1514, 31, 1514, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1515, 31, 1515, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1516, 31, 1516, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1517, 31, 1517, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1518, 31, 1518, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1519, 31, 1519, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1520, 31, 1520, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1521, 31, 1521, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1522, 31, 1522, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1523, 31, 1523, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1524, 31, 1524, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1525, 31, 1525, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1526, 31, 1526, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1527, 31, 1527, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1528, 31, 1528, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1529, 31, 1529, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1530, 31, 1530, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1531, 31, 1531, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1532, 31, 1532, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1533, 31, 1533, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1534, 31, 1534, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1535, 31, 1535, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1536, 31, 1536, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1537, 31, 1537, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1538, 31, 1538, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1539, 31, 1539, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1540, 31, 1540, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1541, 31, 1541, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1542, 31, 1542, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1543, 31, 1543, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1544, 31, 1544, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1545, 31, 1545, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1546, 31, 1546, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1547, 31, 1547, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1548, 31, 1548, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1549, 31, 1549, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1550, 31, 1550, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1551, 32, 1551, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1552, 32, 1552, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1553, 32, 1553, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1554, 32, 1554, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1555, 32, 1555, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1556, 32, 1556, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1557, 32, 1557, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1558, 32, 1558, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1559, 32, 1559, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1560, 32, 1560, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1561, 32, 1561, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1562, 32, 1562, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1563, 32, 1563, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1564, 32, 1564, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1565, 32, 1565, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1566, 32, 1566, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1567, 32, 1567, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1568, 32, 1568, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1569, 32, 1569, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1570, 32, 1570, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1571, 32, 1571, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1572, 32, 1572, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1573, 32, 1573, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1574, 32, 1574, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1575, 32, 1575, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1576, 32, 1576, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1577, 32, 1577, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1578, 32, 1578, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1579, 32, 1579, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1580, 32, 1580, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1581, 32, 1581, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1582, 32, 1582, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1583, 32, 1583, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1584, 32, 1584, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1585, 32, 1585, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1586, 32, 1586, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1587, 32, 1587, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1588, 32, 1588, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1589, 32, 1589, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1590, 32, 1590, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1591, 32, 1591, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1592, 32, 1592, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1593, 32, 1593, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1594, 32, 1594, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1595, 32, 1595, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1596, 32, 1596, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1597, 32, 1597, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1598, 32, 1598, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1599, 32, 1599, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1600, 32, 1600, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1601, 33, 1601, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1602, 33, 1602, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1603, 33, 1603, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1604, 33, 1604, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1605, 33, 1605, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1606, 33, 1606, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1607, 33, 1607, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1608, 33, 1608, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1609, 33, 1609, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1610, 33, 1610, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1611, 33, 1611, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1612, 33, 1612, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1613, 33, 1613, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1614, 33, 1614, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1615, 33, 1615, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1616, 33, 1616, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1617, 33, 1617, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1618, 33, 1618, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1619, 33, 1619, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1620, 33, 1620, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1621, 33, 1621, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1622, 33, 1622, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1623, 33, 1623, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1624, 33, 1624, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1625, 33, 1625, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1626, 33, 1626, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1627, 33, 1627, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1628, 33, 1628, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1629, 33, 1629, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1630, 33, 1630, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1631, 33, 1631, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1632, 33, 1632, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1633, 33, 1633, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1634, 33, 1634, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1635, 33, 1635, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1636, 33, 1636, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1637, 33, 1637, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1638, 33, 1638, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1639, 33, 1639, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1640, 33, 1640, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1641, 33, 1641, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1642, 33, 1642, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1643, 33, 1643, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1644, 33, 1644, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1645, 33, 1645, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1646, 33, 1646, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1647, 33, 1647, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1648, 33, 1648, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1649, 33, 1649, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1650, 33, 1650, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1651, 34, 1651, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1652, 34, 1652, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1653, 34, 1653, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1654, 34, 1654, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1655, 34, 1655, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1656, 34, 1656, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1657, 34, 1657, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1658, 34, 1658, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1659, 34, 1659, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1660, 34, 1660, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1661, 34, 1661, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1662, 34, 1662, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1663, 34, 1663, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1664, 34, 1664, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1665, 34, 1665, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1666, 34, 1666, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1667, 34, 1667, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1668, 34, 1668, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1669, 34, 1669, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1670, 34, 1670, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1671, 34, 1671, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1672, 34, 1672, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1673, 34, 1673, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1674, 34, 1674, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1675, 34, 1675, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1676, 34, 1676, '2022-04-04 10:32:05', '2022-04-04 10:32:05');
INSERT INTO `r_category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1677, 34, 1677, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1678, 34, 1678, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1679, 34, 1679, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1680, 34, 1680, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1681, 34, 1681, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1682, 34, 1682, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1683, 34, 1683, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1684, 34, 1684, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1685, 34, 1685, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1686, 34, 1686, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1687, 34, 1687, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1688, 34, 1688, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1689, 34, 1689, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1690, 34, 1690, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1691, 34, 1691, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1692, 34, 1692, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1693, 34, 1693, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1694, 34, 1694, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1695, 34, 1695, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1696, 34, 1696, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1697, 34, 1697, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1698, 34, 1698, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1699, 34, 1699, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1700, 34, 1700, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1701, 35, 1701, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1702, 35, 1702, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1703, 35, 1703, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1704, 35, 1704, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1705, 35, 1705, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1706, 35, 1706, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1707, 35, 1707, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1708, 35, 1708, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1709, 35, 1709, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1710, 35, 1710, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1711, 35, 1711, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1712, 35, 1712, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1713, 35, 1713, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1714, 35, 1714, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1715, 35, 1715, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1716, 35, 1716, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1717, 35, 1717, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1718, 35, 1718, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1719, 35, 1719, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1720, 35, 1720, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1721, 35, 1721, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1722, 35, 1722, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1723, 35, 1723, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1724, 35, 1724, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1725, 35, 1725, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1726, 35, 1726, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1727, 35, 1727, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1728, 35, 1728, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1729, 35, 1729, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1730, 35, 1730, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1731, 35, 1731, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1732, 35, 1732, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1733, 35, 1733, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1734, 35, 1734, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1735, 35, 1735, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1736, 35, 1736, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1737, 35, 1737, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1738, 35, 1738, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1739, 35, 1739, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1740, 35, 1740, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1741, 35, 1741, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1742, 35, 1742, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1743, 35, 1743, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1744, 35, 1744, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1745, 35, 1745, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1746, 35, 1746, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1747, 35, 1747, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1748, 35, 1748, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1749, 35, 1749, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1750, 35, 1750, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1751, 36, 1751, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1752, 36, 1752, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1753, 36, 1753, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1754, 36, 1754, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1755, 36, 1755, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1756, 36, 1756, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1757, 36, 1757, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1758, 36, 1758, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1759, 36, 1759, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1760, 36, 1760, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1761, 36, 1761, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1762, 36, 1762, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1763, 36, 1763, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1764, 36, 1764, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1765, 36, 1765, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1766, 36, 1766, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1767, 36, 1767, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1768, 36, 1768, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1769, 36, 1769, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1770, 36, 1770, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1771, 36, 1771, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1772, 36, 1772, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1773, 36, 1773, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1774, 36, 1774, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1775, 36, 1775, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1776, 36, 1776, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1777, 36, 1777, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1778, 36, 1778, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1779, 36, 1779, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1780, 36, 1780, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1781, 36, 1781, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1782, 36, 1782, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1783, 36, 1783, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1784, 36, 1784, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1785, 36, 1785, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1786, 36, 1786, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1787, 36, 1787, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1788, 36, 1788, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1789, 36, 1789, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1790, 36, 1790, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1791, 36, 1791, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1792, 36, 1792, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1793, 36, 1793, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1794, 36, 1794, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1795, 36, 1795, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1796, 36, 1796, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1797, 36, 1797, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1798, 36, 1798, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1799, 36, 1799, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1800, 36, 1800, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1801, 37, 1801, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1802, 37, 1802, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1803, 37, 1803, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1804, 37, 1804, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1805, 37, 1805, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1806, 37, 1806, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1807, 37, 1807, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1808, 37, 1808, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1809, 37, 1809, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1810, 37, 1810, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1811, 37, 1811, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1812, 37, 1812, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1813, 37, 1813, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1814, 37, 1814, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1815, 37, 1815, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1816, 37, 1816, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1817, 37, 1817, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1818, 37, 1818, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1819, 37, 1819, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1820, 37, 1820, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1821, 37, 1821, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1822, 37, 1822, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1823, 37, 1823, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1824, 37, 1824, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1825, 37, 1825, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1826, 37, 1826, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1827, 37, 1827, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1828, 37, 1828, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1829, 37, 1829, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1830, 37, 1830, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1831, 37, 1831, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1832, 37, 1832, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1833, 37, 1833, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1834, 37, 1834, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1835, 37, 1835, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1836, 37, 1836, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1837, 37, 1837, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1838, 37, 1838, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1839, 37, 1839, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1840, 37, 1840, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1841, 37, 1841, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1842, 37, 1842, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1843, 37, 1843, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1844, 37, 1844, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1845, 37, 1845, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1846, 37, 1846, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1847, 37, 1847, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1848, 37, 1848, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1849, 37, 1849, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1850, 37, 1850, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1851, 38, 1851, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1852, 38, 1852, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1853, 38, 1853, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1854, 38, 1854, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1855, 38, 1855, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1856, 38, 1856, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1857, 38, 1857, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1858, 38, 1858, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1859, 38, 1859, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1860, 38, 1860, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1861, 38, 1861, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1862, 38, 1862, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1863, 38, 1863, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1864, 38, 1864, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1865, 38, 1865, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1866, 38, 1866, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1867, 38, 1867, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1868, 38, 1868, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1869, 38, 1869, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1870, 38, 1870, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1871, 38, 1871, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1872, 38, 1872, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1873, 38, 1873, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1874, 38, 1874, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1875, 38, 1875, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1876, 38, 1876, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1877, 38, 1877, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1878, 38, 1878, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1879, 38, 1879, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1880, 38, 1880, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1881, 38, 1881, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1882, 38, 1882, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1883, 38, 1883, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1884, 38, 1884, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1885, 38, 1885, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1886, 38, 1886, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1887, 38, 1887, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1888, 38, 1888, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1889, 38, 1889, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1890, 38, 1890, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1891, 38, 1891, '2022-04-04 10:32:05', '2022-04-04 10:32:05'),
(1892, 38, 1892, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1893, 38, 1893, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1894, 38, 1894, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1895, 38, 1895, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1896, 38, 1896, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1897, 38, 1897, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1898, 38, 1898, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1899, 38, 1899, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1900, 38, 1900, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1901, 39, 1901, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1902, 39, 1902, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1903, 39, 1903, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1904, 39, 1904, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1905, 39, 1905, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1906, 39, 1906, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1907, 39, 1907, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1908, 39, 1908, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1909, 39, 1909, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1910, 39, 1910, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1911, 39, 1911, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1912, 39, 1912, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1913, 39, 1913, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1914, 39, 1914, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1915, 39, 1915, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1916, 39, 1916, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1917, 39, 1917, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1918, 39, 1918, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1919, 39, 1919, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1920, 39, 1920, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1921, 39, 1921, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1922, 39, 1922, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1923, 39, 1923, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1924, 39, 1924, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1925, 39, 1925, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1926, 39, 1926, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1927, 39, 1927, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1928, 39, 1928, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1929, 39, 1929, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1930, 39, 1930, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1931, 39, 1931, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1932, 39, 1932, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1933, 39, 1933, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1934, 39, 1934, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1935, 39, 1935, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1936, 39, 1936, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1937, 39, 1937, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1938, 39, 1938, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1939, 39, 1939, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1940, 39, 1940, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1941, 39, 1941, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1942, 39, 1942, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1943, 39, 1943, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1944, 39, 1944, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1945, 39, 1945, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1946, 39, 1946, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1947, 39, 1947, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1948, 39, 1948, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1949, 39, 1949, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1950, 39, 1950, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1951, 40, 1951, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1952, 40, 1952, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1953, 40, 1953, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1954, 40, 1954, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1955, 40, 1955, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1956, 40, 1956, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1957, 40, 1957, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1958, 40, 1958, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1959, 40, 1959, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1960, 40, 1960, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1961, 40, 1961, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1962, 40, 1962, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1963, 40, 1963, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1964, 40, 1964, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1965, 40, 1965, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1966, 40, 1966, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1967, 40, 1967, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1968, 40, 1968, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1969, 40, 1969, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1970, 40, 1970, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1971, 40, 1971, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1972, 40, 1972, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1973, 40, 1973, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1974, 40, 1974, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1975, 40, 1975, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1976, 40, 1976, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1977, 40, 1977, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1978, 40, 1978, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1979, 40, 1979, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1980, 40, 1980, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1981, 40, 1981, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1982, 40, 1982, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1983, 40, 1983, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1984, 40, 1984, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1985, 40, 1985, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1986, 40, 1986, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1987, 40, 1987, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1988, 40, 1988, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1989, 40, 1989, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1990, 40, 1990, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1991, 40, 1991, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1992, 40, 1992, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1993, 40, 1993, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1994, 40, 1994, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1995, 40, 1995, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1996, 40, 1996, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1997, 40, 1997, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1998, 40, 1998, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(1999, 40, 1999, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(2000, 40, 2000, '2022-04-04 10:32:06', '2022-04-04 10:32:06'),
(2001, 37, 141, NULL, NULL),
(2002, 18, 388, NULL, NULL),
(2004, 30, 1833, NULL, NULL),
(2005, 16, 1474, NULL, NULL),
(2006, 24, 35, NULL, NULL),
(2007, 38, 1279, NULL, NULL),
(2008, 12, 1644, NULL, NULL),
(2009, 4, 1051, NULL, NULL),
(2010, 2, 1035, NULL, NULL),
(2011, 31, 893, NULL, NULL),
(2012, 29, 1819, NULL, NULL),
(2013, 33, 720, NULL, NULL),
(2014, 39, 1763, NULL, NULL),
(2015, 22, 1050, NULL, NULL),
(2016, 18, 1674, NULL, NULL),
(2017, 40, 1846, NULL, NULL),
(2018, 10, 1439, NULL, NULL),
(2019, 26, 1559, NULL, NULL),
(2020, 27, 704, NULL, NULL),
(2021, 26, 681, NULL, NULL),
(2022, 10, 834, NULL, NULL),
(2023, 32, 376, NULL, NULL),
(2024, 39, 1011, NULL, NULL),
(2025, 30, 781, NULL, NULL),
(2026, 16, 533, NULL, NULL),
(2027, 10, 1069, NULL, NULL),
(2028, 16, 1179, NULL, NULL),
(2029, 32, 1190, NULL, NULL),
(2030, 10, 886, NULL, NULL),
(2031, 16, 764, NULL, NULL),
(2032, 28, 1483, NULL, NULL),
(2033, 36, 1191, NULL, NULL),
(2034, 22, 1315, NULL, NULL),
(2035, 36, 976, NULL, NULL),
(2036, 31, 41, NULL, NULL),
(2037, 40, 599, NULL, NULL),
(2038, 12, 734, NULL, NULL),
(2039, 39, 1809, NULL, NULL),
(2040, 29, 621, NULL, NULL),
(2041, 37, 975, NULL, NULL),
(2042, 31, 999, NULL, NULL),
(2043, 22, 118, NULL, NULL),
(2044, 10, 1366, NULL, NULL),
(2045, 14, 1200, NULL, NULL),
(2046, 3, 1560, NULL, NULL),
(2047, 19, 1227, NULL, NULL),
(2048, 26, 494, NULL, NULL),
(2049, 7, 1788, NULL, NULL),
(2050, 39, 1393, NULL, NULL),
(2051, 41, 2001, NULL, NULL),
(2052, 2, 2002, NULL, NULL),
(2053, 1, 2002, NULL, NULL),
(2054, 2, 2003, NULL, NULL),
(2055, 1, 2003, NULL, NULL),
(2056, 1, 2004, NULL, NULL),
(2074, 1, 2019, NULL, NULL),
(2076, 6, 2021, NULL, NULL),
(2077, 1, 2021, NULL, NULL),
(2078, 6, 2022, NULL, NULL),
(2079, 1, 2022, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `r_u_category_products`
--

CREATE TABLE `r_u_category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_u_category_products`
--

INSERT INTO `r_u_category_products` (`id`, `created_at`, `updated_at`, `category_id`, `product_id`) VALUES
(37, NULL, NULL, 3, 2021),
(38, NULL, NULL, 13, 2021),
(39, NULL, NULL, 4, 2022),
(40, NULL, NULL, 8, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `r_u_product_categories`
--

CREATE TABLE `r_u_product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `m_product_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `upgrade_price` double(8,2) NOT NULL,
  `needed_quantity` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_u_product_categories`
--

INSERT INTO `r_u_product_categories` (`id`, `created_at`, `updated_at`, `category_id`, `m_product_id`, `product_id`, `is_default`, `upgrade_price`, `needed_quantity`) VALUES
(229, NULL, NULL, 3, 2021, 102, 0, 298.00, 1),
(230, NULL, NULL, 3, 2021, 104, 1, 213.00, 1),
(231, NULL, NULL, 13, 2021, 605, 1, 201.00, 1),
(232, NULL, NULL, 13, 2021, 609, 0, 397.00, 1),
(233, NULL, NULL, 4, 2022, 151, 1, 351.00, 1),
(234, NULL, NULL, 4, 2022, 153, 0, 157.00, 1),
(235, NULL, NULL, 4, 2022, 164, 0, 359.00, 1),
(236, NULL, NULL, 8, 2022, 385, 1, 424.00, 1),
(237, NULL, NULL, 8, 2022, 399, 0, 270.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `cost_type` tinyint(4) NOT NULL DEFAULT 0,
  `is_fixed` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `free_on_cost_above` double(8,2) DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free_taxes` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `created_at`, `updated_at`, `title`, `description`, `cost`, `cost_type`, `is_fixed`, `is_active`, `free_on_cost_above`, `meta`, `is_free_taxes`) VALUES
(1, '2022-04-04 10:32:47', '2022-05-02 04:25:29', 'Armex', 'Armex', 1.00, 0, 0, 1, NULL, 'undefined', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `cost_type` tinyint(4) NOT NULL DEFAULT 0,
  `is_fixed` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `created_at`, `updated_at`, `title`, `description`, `cost`, `cost_type`, `is_fixed`, `is_active`) VALUES
(1, '2022-05-02 04:36:06', '2022-05-02 04:36:06', 'tax 1', 'tax 1 info', 1.00, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE `theme_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_settings`
--

INSERT INTO `theme_settings` (`id`, `created_at`, `updated_at`, `section`, `meta`, `category_id`) VALUES
(26, '2022-06-30 12:28:26', '2022-07-03 14:42:35', 'slider', '{\"order\":\"1\",\"image\":\"storage\\/homeSlider\\/DCX19Oci3T7OTdJpbwj0XYkLGUWi5tGy8bDylbda.jpg\",\"type\":\"category\",\"value\":\"2\"}', 2),
(27, '2022-06-30 12:29:46', '2022-07-03 14:42:13', 'slider', '{\"order\":\"1\",\"image\":\"storage\\/homeSlider\\/p6gWxOigxrNTKQlFpxiER3SZ5QhN08RMmBPtnqPQ.png\",\"type\":null,\"value\":null}', NULL),
(28, '2022-06-30 12:29:56', '2022-07-01 10:36:36', 'slider', '{\"order\":\"2\",\"image\":\"storage\\/homeSlider\\/9Zb9QOis6AbJKNdIOGJzLNc0k7brI7vVKFqUlkTX.jpg\",\"type\":\"category\",\"value\":\"2\"}', 2),
(29, '2022-06-30 12:30:12', '2022-06-30 12:30:12', 'slider', '{\"order\":\"2\",\"image\":\"storage\\/homeSlider\\/CPAaJECwfBWfF1vmkDkBBhsnT6Wa2kwYgTdgPC6D.jpg\",\"type\":null,\"value\":null}', NULL),
(38, NULL, NULL, 'navbar', '{\"title\":\"UpdatedCategory\",\"type\":\"category\",\"value\":\"20\"}', 20),
(39, NULL, NULL, 'navbar', '{\"title\":\"Category 2\",\"type\":\"category\",\"value\":\"6\"}', 6),
(40, NULL, NULL, 'navbar', '{\"title\":\"Test\",\"type\":\"externalLink\",\"value\":\"google.com\"}', NULL),
(41, NULL, NULL, 'navbar', '{\"title\":\"LinkGoogle\",\"type\":\"externalLink\",\"value\":\"link.google.com\"}', NULL),
(42, '2022-07-01 11:39:11', '2022-07-03 14:40:46', 'slider', '{\"order\":\"1\",\"image\":\"storage\\/homeSlider\\/Dqc9q6EwidsqXofcxMV7W8UeT9nXRKrKgCuFVwPq.jpg\",\"type\":null,\"value\":null}', NULL),
(64, '2022-07-03 14:35:50', '2022-07-03 14:35:50', 'cSection', '{\"title\":\"Section 1\",\"order\":\"1\"}', NULL),
(65, '2022-07-03 14:35:50', '2022-07-03 14:35:50', 'cSection', '{\"title\":\"Section 101\",\"order\":\"11\"}', NULL),
(66, '2022-07-03 14:35:50', '2022-07-03 14:35:50', 'cSection', '{\"title\":\"P2s\",\"order\":\"21\"}', NULL),
(67, '2022-07-05 07:23:00', '2022-07-05 07:23:00', 'slider', '{\"order\":\"1\",\"image\":\"storage\\/homeSlider\\/nLR0uskmu9fm5rhFRJDgYVXoQyMNYqhJTJQj0uKy.jpg\",\"type\":null,\"value\":null}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `category`, `picture`, `meta`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'أ.مصطفي', 'admin@goo.com', NULL, '01063200201', '$2y$10$HcXb8D.e//UzotvX3mo8au30V7xf9e2uXedVIbWnrtgVLEJEQ/X/S', 'admin', NULL, NULL, NULL, '2022-04-04 10:32:01', '2022-04-04 10:32:01'),
(2, 'Mostafa', 'mostafa_3@goo.com', NULL, '01063200203', '$2y$10$g0D8vLIfUL01yL8CgZuACeNB9NZs/SGymbXXNPOBR2CIXV1pbASMW', 'user', NULL, NULL, NULL, '2022-04-06 11:23:09', '2022-04-06 11:23:09'),
(3, 'أ.Hazem', 'mostafa_6@goo.com', '2022-04-06 16:38:04', '+966121134123123123', '$2y$10$OqrAz08Nbt.rEXwFA.5HuOTyG4dtBSHfjZEpAczJlkiW1hd336Ofe', 'user', NULL, NULL, NULL, '2022-04-06 16:37:56', '2022-04-06 16:38:04'),
(4, 'Mostafa', 'mostafa_7@goo.com', NULL, '010623010011', '$2y$10$ZquU87i1OAqlw9ceJpT6ROW9Zq1cG37.KFMdGjRJHWq4ccoTsSZne', 'user', NULL, NULL, NULL, '2022-04-06 17:15:34', '2022-04-06 17:15:34'),
(5, 'user 1', 'user_1@goo.com', NULL, '01063200201', '$2y$10$uksEkCeiUS1oOUO7TS3WwOyJmbzzDx0RANqgNP31BEfBVTb6dJA2q', 'User Tech', NULL, NULL, NULL, '2022-04-27 02:23:26', '2022-04-30 23:31:21'),
(6, 'user 2', 'user_2@goo.com', NULL, '01063200201', '$2y$10$e/QE9GyN11WUxPc4PVhrPOTDIPGll0LKlZAaOUXaUqaGyF9lNIMuC', 'technical', NULL, NULL, NULL, '2022-04-27 02:23:46', '2022-04-27 02:23:46'),
(7, 'user 3', 'user_3@goo.com', NULL, '01063200201', '$2y$10$C97KM9Xhh4Its8Y75.qeQevbAZ5Z9ZltIBOuIdWx3fCOhLrv274x6', 'technical', NULL, NULL, NULL, '2022-04-27 02:26:12', '2022-04-27 02:26:12'),
(8, 'user 4', 'user_4@goo.com', NULL, '01063200201', '$2y$10$HzbcgFy0P9xCCC0RGUDXnu4enSugKOsakb83oEpjgdr9VpC.YspJ6', 'technical', NULL, NULL, NULL, '2022-04-27 02:26:38', '2022-04-27 02:26:38'),
(9, 'user 5', 'user_5@goo.com', NULL, '01063200201', '$2y$10$TJSmsc8TvhIW5cLPUVepJOz56oQySnvO4xbPq3eC88.Y4YLp9BZ42', 'User Tech', NULL, NULL, NULL, '2022-04-27 02:27:02', '2022-05-01 00:23:26'),
(11, 'User 101', 'user_101@goo.com', NULL, '010101', '$2y$10$NfZVmftX0RRIf.vDyP2rwOlOEfuAxBev6CIf2GdprU.r9T10R3wkm', 'admin', NULL, NULL, NULL, '2022-04-29 02:58:20', '2022-05-01 00:23:17'),
(12, 'user 102', 'user_102@gmail.com', NULL, '010102', '$2y$10$25fX2Sc7.aXEeVuJ06RzRuGModBdEXWfR/qgNHt7qqPf8Z7npM5qy', 'admin', NULL, NULL, NULL, '2022-04-29 03:54:05', '2022-04-29 03:54:05'),
(13, 'user 6', 'user_6@goo.com', NULL, '0106300301', '$2y$10$E0mG.9wkQCb7TvpzGW5y7u.JVi7qGCqN7v/qzkAE21IMT88290.nW', 'admin', NULL, NULL, NULL, '2022-04-30 22:11:50', '2022-04-30 22:11:50'),
(14, 'user_7', 'user_7@goo.com', NULL, '010400400', '$2y$10$HJzooAfcXJBYNr2z9rg/eOUpdN7PDNE51L6QkksLoUO2E/YTL2dCy', 'User Tech', NULL, NULL, NULL, '2022-04-30 23:32:50', '2022-04-30 23:32:50'),
(15, 'user_8', 'user_8@goo.com', NULL, '0105300300', '$2y$10$zTS91VVLTimolqrp0C0kweOhqIIVYTwkrLgvVslFnL42IR1xssqXC', 'technical', NULL, NULL, NULL, '2022-05-01 00:19:51', '2022-05-01 06:31:09'),
(16, 'user_9', 'user_9@goo.com', NULL, '01098889888', '$2y$10$IvsGxlwMGuNbmOQvikjZ8OzpssHi/XRNKqJ57ofedY4.L83gGMWDq', 'technical', NULL, NULL, NULL, '2022-05-01 05:44:15', '2022-05-01 05:44:15'),
(17, 'user_10', 'user_10@goo.com', NULL, '010900900', '$2y$10$BfbLpbpQMI/fC4isv9qJIeN4ZxY1lgCx4oCJo4L7sPGnWvkYIuSqi', 'technical', NULL, NULL, NULL, '2022-05-01 05:45:04', '2022-05-01 05:45:04'),
(18, 'user_11', 'user_11@goo.com', NULL, '010900901', '$2y$10$Bz0fbUmiJ7PzibLmnzdo.uOniXa8NlpIGa9.vsFD64TR6bUP9e5qm', 'technical', NULL, NULL, NULL, '2022-05-01 05:49:20', '2022-05-01 05:49:20'),
(19, 'user_12', 'user_12@goo.com', NULL, '010900900', '$2y$10$zbNW2vodkF6hEZAHBeJl9.pB7ty8UVaF9HOiMX.iLvtHpyzOuRsGK', 'technical', NULL, NULL, NULL, '2022-05-01 06:03:28', '2022-05-01 06:03:28'),
(20, 'مصطفي حازم السيد', 'mostafa.husany@gmail.com', '2022-05-08 01:03:27', '+966090909090', '$2y$10$5wYru51ING6/gnQzvyCRTOklWd14PVHXbrTLNEqtRSVamquK89bT2', 'user', NULL, NULL, NULL, '2022-05-08 01:02:59', '2022-05-08 01:13:10'),
(21, 'Mostafa', 'mostafa@goo.com', NULL, '01087999999', '$2y$10$ggJdgv84DFDRO/ZGGumrMemHqdqINQjqdH1ifFEfp4ttLXW6IvLfS', 'user', NULL, NULL, NULL, '2022-05-08 20:56:25', '2022-05-08 20:56:25'),
(22, 'Mohamad', 'mohamad_9@goo.com', NULL, '01063200222', '$2y$10$ANEPBN883C9seZSSWOtJfubnWgL2gTkj6IEBXH7oMKVg7daik66Ae', 'user', NULL, NULL, NULL, '2022-05-08 22:19:08', '2022-05-08 22:19:08'),
(23, 'Mohamad', 'mohamad_10@goo.com', NULL, '01063200226', '$2y$10$Xxi/XsPMY5UJVphPBoHcyeQ7nawznlcWJTcfuSSFPDBpfHi4gNaFm', 'user', NULL, NULL, NULL, '2022-05-08 22:19:26', '2022-05-08 22:19:26'),
(24, 'mohamad_10', 'mohamad_11@goo.com', '2022-05-09 02:22:48', '01063200211', '$2y$10$mo485xa1fS1VZO3itnFSiu/i9qaSD5gUzsM.LxC2LmsrGKq1DGxYi', 'user', NULL, NULL, NULL, '2022-05-08 22:20:28', '2022-05-09 02:22:48'),
(26, 'Test 1', 'test_1@goo.com', NULL, '0109889988', '123456', 'user', NULL, NULL, NULL, '2022-05-09 06:31:31', '2022-05-09 06:31:31'),
(29, 'Test 1', 'test_33@goo.com', NULL, '0109889988', '123456', 'user', NULL, NULL, NULL, '2022-05-09 06:32:49', '2022-05-09 06:32:49'),
(31, 'Test 2', 'test_34@goo.com', NULL, '0109889988', '123456', 'user', NULL, NULL, NULL, '2022-05-09 06:34:21', '2022-05-09 06:34:21'),
(33, 'Test 2', 'test_35@goo.com', NULL, '0109889988', '123456', 'user', NULL, NULL, NULL, '2022-05-09 06:34:42', '2022-05-09 06:34:42'),
(35, 'Test 2', 'test_325@goo.com', NULL, '0109889988', '$2y$10$Qk3hbof9sIjU8QkLIVlXe.7zi97cu/wJWpc2t0a3wzEuupfvNqkru', 'user', NULL, NULL, NULL, '2022-05-09 06:59:03', '2022-05-09 06:59:03'),
(37, 'Test 2', 'test_311@goo.com', NULL, '0109889988', '$2y$10$gUSUyyzpnLi1acoz63h.Ruj/ABfRLP51AFk2.sBaasmEhC/hUOE4G', 'user', NULL, NULL, NULL, '2022-05-09 06:59:38', '2022-05-09 06:59:38'),
(38, 'Test 2', 'test_11@goo.com', NULL, '0109889188', '$2y$10$7v6aPlEeUQ4PiDE2M4wHMuSnRqw.H2ybEoKaVaRgVlMI67MlEt3M6', 'user', NULL, NULL, NULL, '2022-05-09 07:57:42', '2022-05-09 07:57:42'),
(39, 'MOstafa', 'mostafa_889@goo.com', NULL, '0109222312121', '$2y$10$eu73M.qqH5qT7cXGJSxlQO/DZNTXDiJQMUcLncc5cb..dqQgF7eTG', 'user', NULL, NULL, NULL, '2022-05-09 13:16:54', '2022-05-09 13:16:54'),
(40, 'Test 2', 'test_13@goo.com', NULL, '0109889108', '$2y$10$rANmXG.Ny1xOA5MeViVmc.OBYeYUALz2eZW4MsTgJuP08mvegLxp6', 'user', NULL, NULL, NULL, '2022-06-23 10:47:57', '2022-06-23 10:47:57'),
(42, 'Test 2', 'test_14@goo.com', NULL, '0108888108', '$2y$10$uI4hl585By1b5pA838cLyOFC4NR477u0XOgQa1oVDCbo5ZSW8seMO', 'user', NULL, NULL, NULL, '2022-06-23 12:01:16', '2022-06-23 12:01:16'),
(44, 'Test 3', 'test_15@goo.com', '2022-07-09 17:05:17', '0108888000', '$2y$10$jRLmvk5YT3Xm77mlOAvS1uCMe1uTdmQP/5W1.rXzayN67Vrf7aMDK', 'user', NULL, NULL, NULL, '2022-06-23 12:27:55', '2022-07-09 17:05:17'),
(45, 'Test 3', 'test_16@goo.com', NULL, '0108888001', '$2y$10$fTtN5n.TQzJ.SAaDyfd5V.CBtF8f5YD8ZbR8cM6R5hFwu/od.JxAG', 'user', NULL, NULL, NULL, '2022-06-25 17:43:55', '2022-06-25 17:43:55'),
(46, 'Test 3', 'test_17@goo.com', NULL, '0108888002', '$2y$10$Cmj0SSC.czaZfVSSAKSh9uczLxKMWk1L2/g0orcKdwXnOGnxhFieK', 'user', NULL, NULL, NULL, '2022-06-25 17:52:14', '2022-06-25 17:52:14'),
(47, 'Test 3', NULL, NULL, '0108888003', '$2y$10$G80O306IavWf7luvPUHCMOuWAgPti72I83Xle3mlqFvmFjqx3GMAy', 'user', NULL, NULL, NULL, '2022-06-26 20:34:21', '2022-06-26 20:34:21'),
(49, 'Test 3', NULL, NULL, '0108888005', '$2y$10$s47C0dnBd4SfCnvOmmF8gODAEltQa9gzShchSSrjYAhG77qYGK9Ei', 'user', NULL, NULL, NULL, '2022-06-26 20:37:19', '2022-06-26 20:37:19'),
(50, 'Test 3', NULL, NULL, '0108888205', '$2y$10$Dwn.qGXcnF6YAvhJlqiBdeVRBFLKKqx0HAl./9BvkB0YevaHdz.Dq', 'user', NULL, NULL, NULL, '2022-06-26 21:54:36', '2022-06-26 21:54:36'),
(51, 'Test 4', NULL, NULL, '0108888206', '$2y$10$3VCZY3xQkYTm8UXc6m7Je.BP/xt8dyx3164Ht89pONN.Eson964XG', 'user', NULL, NULL, NULL, '2022-06-26 21:56:31', '2022-06-26 23:24:30'),
(52, 'Test 3', 'nermeen.hazem100@gmail.com', '2022-07-09 17:58:13', '0108118206', '$2y$10$RY.Fj.BO9tiWr695I3DWIOOjlrrL75ZZSrqq1jc1p40dqcl5eZjMG', 'user', NULL, NULL, NULL, '2022-07-09 17:09:47', '2022-07-09 17:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `v_customer_phones`
--

CREATE TABLE `v_customer_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_customer_phones`
--

INSERT INTO `v_customer_phones` (`id`, `created_at`, `updated_at`, `phone`, `code`, `user_id`) VALUES
(1, '2022-06-23 10:34:22', '2022-06-23 10:34:22', '01063200201', '8888', NULL),
(2, '2022-06-23 10:47:12', '2022-06-23 10:47:12', '0109889108', '8888', 40),
(4, '2022-06-23 11:59:14', '2022-06-23 12:01:16', '0108888108', '8888', 42),
(6, '2022-06-22 12:27:14', '2022-06-24 22:00:00', '0108888000', '9999', 44),
(7, '2022-06-25 17:43:45', '2022-06-25 17:43:55', '0108888001', '9999', 45),
(8, '2022-06-25 17:51:30', '2022-06-25 17:52:14', '0108888002', '9999', 46),
(9, '2022-06-26 20:33:39', '2022-06-26 20:33:39', '0108888003', '9999', NULL),
(10, '2022-06-26 20:35:40', '2022-06-26 20:37:19', '0108888005', '9999', 49),
(11, '2022-06-26 21:54:31', '2022-06-26 21:54:36', '0108888205', '9999', 50),
(12, '2022-06-26 21:56:26', '2022-06-26 22:00:00', '0108888206', '9999', 51),
(13, '2022-07-09 17:09:42', '2022-07-09 17:09:47', '0108118206', '9999', 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_ar_title_unique` (`ar_title`),
  ADD UNIQUE KEY `brands_en_title_unique` (`en_title`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_brands_category_id_foreign` (`category_id`),
  ADD KEY `category_brands_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `composite_product_products`
--
ALTER TABLE `composite_product_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `composite_product_products_composite_product_id_foreign` (`composite_product_id`),
  ADD KEY `composite_product_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`),
  ADD KEY `customers_country_id_foreign` (`country_id`),
  ADD KEY `customers_gove_id_foreign` (`gove_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_district_id_foreign` (`district_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sections_products`
--
ALTER TABLE `home_sections_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_sections_products_product_id_foreign` (`product_id`),
  ADD KEY `home_sections_products_theme_settings_id_foreign` (`theme_settings_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_promo_code_id_foreign` (`promo_code_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_gove_id_foreign` (`gove_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`),
  ADD KEY `order_products_parent_product_id_foreign` (`parent_product_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_statuses_status_code_unique` (`status_code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_ar_name_unique` (`ar_name`),
  ADD UNIQUE KEY `products_en_name_unique` (`en_name`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_ar_title_unique` (`ar_title`),
  ADD UNIQUE KEY `product_categories_en_title_unique` (`en_title`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_custome_fields`
--
ALTER TABLE `product_custome_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_custome_fields_product_id_foreign` (`product_id`),
  ADD KEY `product_custome_fields_category_id_foreign` (`category_id`),
  ADD KEY `product_custome_fields_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `product_promotions`
--
ALTER TABLE `product_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_promotions_product_id_foreign` (`product_id`),
  ADD KEY `product_promotions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `r_category_products`
--
ALTER TABLE `r_category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_category_products_category_id_foreign` (`category_id`),
  ADD KEY `r_category_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `r_u_category_products`
--
ALTER TABLE `r_u_category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_u_category_products_category_id_foreign` (`category_id`),
  ADD KEY `r_u_category_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `r_u_product_categories`
--
ALTER TABLE `r_u_product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_u_product_categories_category_id_foreign` (`category_id`),
  ADD KEY `r_u_product_categories_m_product_id_foreign` (`m_product_id`),
  ADD KEY `r_u_product_categories_product_id_foreign` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_settings_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `v_customer_phones`
--
ALTER TABLE `v_customer_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v_customer_phones_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `category_brands`
--
ALTER TABLE `category_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `composite_product_products`
--
ALTER TABLE `composite_product_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sections_products`
--
ALTER TABLE `home_sections_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_custome_fields`
--
ALTER TABLE `product_custome_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product_promotions`
--
ALTER TABLE `product_promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_category_products`
--
ALTER TABLE `r_category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2080;

--
-- AUTO_INCREMENT for table `r_u_category_products`
--
ALTER TABLE `r_u_category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `r_u_product_categories`
--
ALTER TABLE `r_u_product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme_settings`
--
ALTER TABLE `theme_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `v_customer_phones`
--
ALTER TABLE `v_customer_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD CONSTRAINT `category_brands_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `composite_product_products`
--
ALTER TABLE `composite_product_products`
  ADD CONSTRAINT `composite_product_products_composite_product_id_foreign` FOREIGN KEY (`composite_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composite_product_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_gove_id_foreign` FOREIGN KEY (`gove_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_sections_products`
--
ALTER TABLE `home_sections_products`
  ADD CONSTRAINT `home_sections_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `home_sections_products_theme_settings_id_foreign` FOREIGN KEY (`theme_settings_id`) REFERENCES `theme_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_gove_id_foreign` FOREIGN KEY (`gove_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_promo_code_id_foreign` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_parent_product_id_foreign` FOREIGN KEY (`parent_product_id`) REFERENCES `order_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_custome_fields`
--
ALTER TABLE `product_custome_fields`
  ADD CONSTRAINT `product_custome_fields_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_custome_fields_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_custome_fields_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_promotions`
--
ALTER TABLE `product_promotions`
  ADD CONSTRAINT `product_promotions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_promotions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD CONSTRAINT `promo_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_category_products`
--
ALTER TABLE `r_category_products`
  ADD CONSTRAINT `r_category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_u_category_products`
--
ALTER TABLE `r_u_category_products`
  ADD CONSTRAINT `r_u_category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_u_category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_u_product_categories`
--
ALTER TABLE `r_u_product_categories`
  ADD CONSTRAINT `r_u_product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_u_product_categories_m_product_id_foreign` FOREIGN KEY (`m_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_u_product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD CONSTRAINT `theme_settings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `v_customer_phones`
--
ALTER TABLE `v_customer_phones`
  ADD CONSTRAINT `v_customer_phones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
