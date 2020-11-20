-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2020 at 09:47 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byke_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bits`
--

CREATE TABLE `bits` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL,
  `bit_type_id` int DEFAULT NULL,
  `bit_template_id` int DEFAULT NULL,
  `name` tinytext,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT 'for public enable and disable',
  `homepage` tinyint(1) DEFAULT NULL,
  `popular` tinyint(1) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `random` varchar(255) DEFAULT NULL,
  `product_button` int DEFAULT NULL,
  `product_url` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bits`
--

INSERT INTO `bits` (`id`, `parent_id`, `tag_id`, `bit_type_id`, `bit_template_id`, `name`, `slug`, `description`, `text`, `price`, `old_price`, `code`, `status`, `homepage`, `popular`, `position`, `random`, `product_button`, `product_url`, `updated_at`, `created_at`) VALUES
(1, NULL, 47, 2, NULL, 'Blueberries', 'blueberries', NULL, '<p>Blueberries are usually <a href=\"https://en.wikipedia.org/wiki/Prostrate_shrub\" title=\"\">prostrate</a> <a href=\"https://en.wikipedia.org/wiki/Shrub\" title=\"Shrub\">shrubs</a>\r\n that can vary in size from 10 centimeters (4 inches) to 4 meters (13 \r\nfeet) in height. In commercial production of blueberries, the species \r\nwith small, pea-size berries growing on low-level bushes are known as \r\n\"lowbush blueberries\" (synonymous with \"wild\").<br></p>', '10.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 16:58:19', '2020-11-19 16:47:44'),
(2, NULL, 47, 2, NULL, 'Banana', 'banana', NULL, '<p>A banana is an elongated, edible fruit – botanically a berry[1][2] – produced by several kinds of large herbaceous flowering plants in the genus Musa.[3] In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas.<br></p>', '13.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 16:58:07', '2020-11-19 16:51:41'),
(3, NULL, 47, 2, NULL, 'Lime', 'lime', NULL, '<p>There are several species of citrus trees whose fruits are called limes, including the Key lime (Citrus aurantiifolia), Persian lime, kaffir lime, and desert lime. <br></p>', '5.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-19 16:57:58', '2020-11-19 16:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `bit_templates`
--

CREATE TABLE `bit_templates` (
  `id` int NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bit_templates`
--

INSERT INTO `bit_templates` (`id`, `slug`, `name`, `updated_at`, `created_at`) VALUES
(1, 'text-photo', 'Text and Photo', '2020-10-22 19:24:41', '2020-10-22 19:24:41'),
(2, 'photo-text', 'Photo and Text', '2020-10-22 19:24:41', '2020-10-22 19:24:41'),
(3, 'text', 'Text Only', '2020-10-22 19:25:12', '2020-10-22 19:25:12'),
(4, 'photo-full', 'Full Size Photo', '2020-10-22 19:25:12', '2020-10-22 19:25:12'),
(5, 'two-photos', 'Two Photos', '2020-10-22 19:25:52', '2020-10-22 19:25:52'),
(6, 'four-photos', 'Four Photos', '2020-10-22 19:25:52', '2020-10-22 19:25:52'),
(7, 'six-photos', 'Six Photos', '2020-10-22 19:27:23', '2020-10-22 19:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `bit_types`
--

CREATE TABLE `bit_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bit_types`
--

INSERT INTO `bit_types` (`id`, `name`, `status`, `position`, `updated_at`, `created_at`) VALUES
(1, 'Content', 1, NULL, NULL, NULL),
(2, 'Product', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int UNSIGNED NOT NULL,
  `client_id` int DEFAULT NULL,
  `payment_type_id` int DEFAULT NULL,
  `number` int DEFAULT NULL,
  `company` int DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `sum` decimal(10,2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `worker` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `payment_method_id` int DEFAULT NULL,
  `admin_note` int DEFAULT NULL,
  `client_note` int DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_bits`
--

CREATE TABLE `cart_bits` (
  `id` int UNSIGNED NOT NULL,
  `bit_id` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo_id` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT '',
  `company_code` varchar(255) DEFAULT NULL,
  `company_vat` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `admin_note` text,
  `updated_at` int DEFAULT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `slug`, `description`, `value`, `updated_at`, `created_at`) VALUES
(1, 'website_title', 'Website Title', 'Fruit Shop', '2020-11-20 09:19:08', '2020-10-18 06:31:08'),
(3, 'website_description', 'Website Description for Google, Facebook', 'New fruit shop', '2020-11-20 09:19:27', '2020-10-18 06:32:01'),
(4, 'website_keywords', 'Website keywords for search engines', 'Blueberry', '2020-11-20 09:19:43', '2020-10-18 06:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank payment', 3, 1, '2016-01-31 10:13:35', '2016-01-31 10:13:35'),
(2, 'Pay on Delivery', 2, 1, '2016-01-31 10:16:04', '2016-01-31 10:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `position` tinyint(1) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int UNSIGNED NOT NULL,
  `bit_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filesize_original_kb` int DEFAULT NULL,
  `filename_original` varchar(255) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `random` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `bit_id`, `tag_id`, `name`, `slug`, `filename`, `filesize_original_kb`, `filename_original`, `position`, `status`, `random`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, NULL, NULL, 'e12377bbfb720cb3e957dab5eefe45fd.jpg', NULL, NULL, 0, NULL, NULL, '2020-11-19 16:58:19', '2020-11-19 16:47:42'),
(2, 2, NULL, NULL, NULL, '9180b9bd71b5c93a4094da5c9160dbf8.jpg', NULL, NULL, 1, NULL, NULL, '2020-11-19 16:58:07', '2020-11-19 16:51:37'),
(3, 3, NULL, NULL, NULL, '1d301fbc80385d366fe362cb92bc7ab4.jpg', NULL, NULL, 2, NULL, NULL, '2020-11-19 16:57:58', '2020-11-19 16:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `photo_copies`
--

CREATE TABLE `photo_copies` (
  `id` int UNSIGNED NOT NULL,
  `photo_id` int DEFAULT NULL,
  `photo_size_id` int DEFAULT NULL,
  `bit_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_sizes`
--

CREATE TABLE `photo_sizes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `width` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  `ratio` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int UNSIGNED NOT NULL,
  `tag_type_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `deep` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `home` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_type_id`, `parent_id`, `deep`, `name`, `slug`, `description`, `keywords`, `status`, `home`, `position`, `updated_at`, `created_at`) VALUES
(46, NULL, NULL, NULL, 'Home', 'home', NULL, NULL, 1, 1, 1, '2020-11-19 16:46:41', '2020-11-19 16:46:24'),
(47, NULL, NULL, NULL, 'Buy Fruits', 'buy-fruits', NULL, NULL, 1, 0, 2, '2020-11-19 16:46:41', '2020-11-19 16:46:38'),
(48, NULL, NULL, NULL, 'Contact', 'contact', NULL, NULL, 1, 0, 48, '2020-11-19 16:46:47', '2020-11-19 16:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `tag_types`
--

CREATE TABLE `tag_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bit_rights` tinyint(1) DEFAULT NULL,
  `tag_rights` tinyint(1) DEFAULT NULL,
  `cart_rights` tinyint(1) DEFAULT NULL,
  `cart_edit_rights` tinyint(1) DEFAULT NULL,
  `client_rights` tinyint(1) DEFAULT NULL,
  `client_edit_rights` tinyint(1) DEFAULT NULL,
  `webmaster_rights` tinyint(1) DEFAULT NULL,
  `superadmin_rights` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `bit_rights`, `tag_rights`, `cart_rights`, `cart_edit_rights`, `client_rights`, `client_edit_rights`, `webmaster_rights`, `superadmin_rights`, `created_at`, `updated_at`) VALUES
(6, 'Gediminas Šukys', 'hi@bykecms.com', NULL, '$2y$10$ffP14bje7mYLpvcl63hXJ.yxDR8qoNxTmzj9RqAiSjMEqF.WT4maS', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, '2020-11-20 07:46:34', '2020-11-20 07:46:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bits`
--
ALTER TABLE `bits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price` (`price`);

--
-- Indexes for table `bit_templates`
--
ALTER TABLE `bit_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bit_types`
--
ALTER TABLE `bit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_bits`
--
ALTER TABLE `cart_bits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_copies`
--
ALTER TABLE `photo_copies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_sizes`
--
ALTER TABLE `photo_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_types`
--
ALTER TABLE `tag_types`
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
-- AUTO_INCREMENT for table `bits`
--
ALTER TABLE `bits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bit_templates`
--
ALTER TABLE `bit_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bit_types`
--
ALTER TABLE `bit_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_bits`
--
ALTER TABLE `cart_bits`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo_copies`
--
ALTER TABLE `photo_copies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_sizes`
--
ALTER TABLE `photo_sizes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tag_types`
--
ALTER TABLE `tag_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
