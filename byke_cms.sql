-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2020 at 06:21 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.25

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
  `bit_theme_id` int DEFAULT NULL,
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

INSERT INTO `bits` (`id`, `parent_id`, `tag_id`, `bit_type_id`, `bit_theme_id`, `name`, `slug`, `description`, `text`, `price`, `old_price`, `code`, `status`, `homepage`, `popular`, `position`, `random`, `product_button`, `product_url`, `updated_at`, `created_at`) VALUES
(9, NULL, 48, 1, NULL, 'Contact Us', 'contact-us', NULL, '<p>This is Open Source Bykecms demo webstore.</p><p>All products are imported from <a href=\"https://www.schoolhouse.com\">SCHOOLHOUSE</a>.</p><p>Visit Bykecms homepage here <a href=\"https://bykecms.com\">Bykecms.com.</a><br></p>', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-28 13:12:24', '2020-11-28 11:11:33'),
(5, NULL, 52, 2, 1, 'Arne Jacobsen Alarm Clock - Green', 'arne-jacobsen-alarm-clock-green', NULL, '<p>Designed by famed Danish architect and designer Arne Jacobsen, this \r\ncharmingly petite clock marries traditional and modern functionality. \r\nThe old-school bell alarm may be silenced with a quick tap of the top, \r\nand an LED</p>', '139.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:12:58', '2020-11-28 11:05:10'),
(17, 5, NULL, 1, 6, NULL, 'inspirational-photos', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 3, NULL, 0, NULL, '2020-12-09 16:13:30', '2020-12-09 09:59:27'),
(6, NULL, 51, 2, 2, 'Schoolhouse Electric Clock - Persimmon', 'schoolhouse-electric-clock-persimmon', NULL, '<p>Inspired by the scale and durability of industrial wall clocks. \r\nHand-assembled in our Portland factory, the Schoolhouse Electric Clock \r\nis constructed with a spun steel case, domed glass lens and steel dial. \r\nThe hands are...\r\n					</p>', '289.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:13:05', '2020-11-28 11:06:08'),
(7, NULL, 51, 2, 1, 'Schoolhouse Electric Clock - Industrial Yellow', 'schoolhouse-electric-clock-industrial-yellow', NULL, '<p>Inspired by the scale and durability of industrial wall clocks. \r\nHand-assembled in our Portland factory, the Schoolhouse Electric Clock \r\nis constructed with a spun steel case, domed glass lens and steel dial. \r\nThe hands are...\r\n					</p>', '289.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:13:11', '2020-11-28 11:07:01'),
(8, NULL, 52, 2, 2, 'Flip Clock - Red', 'flip-clock-red', NULL, '<p>Crafted by one of the world\'s original flip clock manufacturers, in \r\nbusiness since 1956, this expertly made timepiece is a helpful analog \r\nreminder to put your phone down. Features design detailing true to its \r\nmid-century...\r\n					</p>', '99.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-11 12:13:16', '2020-11-28 11:07:31'),
(10, NULL, 49, 2, NULL, 'Cherry Tomatoes Print', 'cherry-tomatoes-print', NULL, '<p>The Velvet + Wool Circle Pillow adds a pop of composed color to any \r\nseating arrangement or bed. Harvest colored velvet and orange wool play \r\ncounterpoint while the lush texture of the fabrics make both...\r\n					</p>', '99.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-28 11:16:07', '2020-11-28 11:16:07'),
(11, NULL, 49, 2, NULL, 'Orange Velvet + Wool - Circle Pillow', 'orange-velvet-wool-circle-pillow', NULL, '<p>The Velvet + Wool Circle Pillow adds a pop of composed color to any \r\nseating arrangement or bed. Harvest colored velvet and orange wool play \r\ncounterpoint while the lush texture of the fabrics make both...\r\n					</p>', '99.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-28 11:17:27', '2020-11-28 11:17:27'),
(12, NULL, 49, 2, NULL, 'Blue Grid Stitch - Lumbar Pillow', 'blue-grid-stitch-lumbar-pillow', NULL, '<p>Timeless elegance meets casual comfort in this heirloom-quality pillow \r\nmade from 100% cotton. Versatile and effortless, the Blue Grid Stitch \r\nPillow is perfect for mixing and matching with existing pieces \r\nthroughout the home. A classic...\r\n					</p>', '159.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-28 11:18:06', '2020-11-28 11:18:06'),
(13, NULL, 49, 2, NULL, 'Schoolhouse Backed Utility Stool 18\"', 'schoolhouse-backed-utility-stool-18', NULL, '<p>Built to last, this industrial-strength welded steel stool is ready to \r\nbe put to work in any room of the house. An update of a classic, the \r\ndesign prioritizes comfort with an ergonomic stamped seat....\r\n					</p>', '249.00', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-28 13:09:11', '2020-11-28 11:18:45'),
(14, NULL, 46, 1, 1, 'SCHOLLHOUSE Products', 'schollhouse-products', NULL, '<p><span class=\"content pargraph-section\">Inside a 109-year-old brick \r\nfactory building in Portland, Oregon, our obsession with quality and \r\ndesign has compelled us to produce modern heirlooms the old-fashioned \r\nway. Here we manufacture our lighting and other wares; we design our \r\ncollections; we ship our finished creations and most importantly.</span></p>', NULL, NULL, NULL, 1, NULL, NULL, 2, NULL, NULL, NULL, '2020-12-11 17:50:05', '2020-11-28 11:19:44'),
(15, NULL, 46, 1, 2, 'Bykecms demo webstore', 'bykecms-demo-webstore', NULL, '<p><a href=\"https://bykecms.com\" target=\"_blank\">Bykecms</a> is a Content Mangement System for your website or webstore. It is completely free, minimalistic, easy to use and customize.</p><p>It is designed for developers who want to have all code under control and as simple as possible. <br></p>', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, '2020-12-11 17:49:14', '2020-11-28 11:23:57'),
(21, 5, NULL, 1, 2, 'Arne Jacobsen Alarm Clock - Green', 'arne-jacobsen-alarm-clock-green-1', NULL, '<p>Designed by famed Danish architect and designer Arne Jacobsen, this \r\ncharmingly petite clock marries traditional and modern functionality. \r\nThe old-school bell alarm may be silenced with a quick tap of the top, \r\nand an LED</p>', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, '2020-12-09 15:33:22', '2020-12-09 15:04:51'),
(24, 5, NULL, 1, 3, NULL, NULL, NULL, '<p>Designed by famed Danish architect and designer Arne Jacobsen, this \r\ncharmingly petite clock marries traditional and modern functionality. \r\nThe old-school bell alarm may be silenced with a quick tap of the top, \r\nand an LED touch sensor allows you to easily see the time at night. \r\nFeaturing a graphic face with two tone hands and delicate brass feet. A \r\nstylish and timeless bedside companion. </p>', NULL, NULL, NULL, 1, NULL, NULL, 2, NULL, 0, NULL, '2020-12-09 15:42:46', '2020-12-09 15:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `bit_themes`
--

CREATE TABLE `bit_themes` (
  `id` int NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bit_themes`
--

INSERT INTO `bit_themes` (`id`, `slug`, `name`, `updated_at`, `created_at`) VALUES
(1, 'text-photo', 'Text and Photo', '2020-10-22 19:24:41', '2020-10-22 19:24:41'),
(2, 'photo-text', 'Photo and Text', '2020-10-22 19:24:41', '2020-10-22 19:24:41'),
(3, 'text', 'Text Only', '2020-10-22 19:25:12', '2020-10-22 19:25:12'),
(4, 'photo-full', 'Full Size Photo', '2020-10-22 19:25:12', '2020-10-22 19:25:12'),
(5, 'two-photos', 'Two Photos', '2020-10-22 19:25:52', '2020-10-22 19:25:52'),
(6, 'three-photos', 'Three Photos', '2020-12-09 17:10:00', '2020-12-09 17:10:00'),
(7, 'four-photos', 'Four Photos', '2020-10-22 19:25:52', '2020-10-22 19:25:52'),
(8, 'six-photos', 'Six Photos', '2020-10-22 19:27:23', '2020-10-22 19:27:23'),
(10, 'twelve-photos', 'Twelve Photos', '2020-12-09 17:10:40', '2020-12-09 17:10:40');

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

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `client_id`, `payment_type_id`, `number`, `company`, `paid`, `sum`, `name`, `company_name`, `address`, `city`, `company_code`, `postcode`, `vat`, `phone`, `worker`, `email`, `payment_method_id`, `admin_note`, `client_note`, `hash`, `updated_at`, `created_at`) VALUES
(1, NULL, NULL, 1, NULL, NULL, '388.00', 'mb interneto biuras', NULL, 'Ateities g. 14-13', 'Panevėžys', NULL, '37342', NULL, '867141571', NULL, 'gediminas.web@gmail.com', 2, NULL, NULL, '4a4e4ebb5dcc490283a694681fa1026939b704b2', '2020-12-09 12:02:11', '2020-12-09 12:02:11');

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
  `show_as_textarea` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `slug`, `description`, `value`, `show_as_textarea`) VALUES
(1, 'web-title', 'Website Title', 'Bykecms', NULL),
(3, 'web-description', 'Website Description', 'Bykecms Demo Webstore', NULL),
(4, 'web-keywords', 'Website Keywords', 'open source cms, bykecms, bykecms demo', 1),
(13, 'cms-title', 'Name of CMS', 'Bykecms', NULL),
(14, 'web-send-email-on-order', 'Send email after order', 'sukys.gediminas@gmail.com', NULL),
(15, 'web-seller-details-for-order', 'Seller details in Order View', 'Bykecms\r\n<br/>\r\nhttps://bykecms.com\r\n<br/>\r\nhi@bykecms.com\r\n<br/>\r\nThis is demo webstore. \r\n<br/>\r\nProducts here are not for sale.', 1),
(16, 'web-vat-percent', 'Add VAT to prices (percents)', '0', NULL),
(17, 'web-cart-finish-success-title', 'Title when order is successful', 'Thank you!', NULL),
(18, 'web-cart-finish-success', 'Message when order is successful', 'Your order has been submitted successfully. We will contact you soon to arrange details about receiving products.', 1),
(19, 'web-google-analytics', 'Google Analytics Tracker Code', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-TZ3SET45Z2\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-TZ3SET45Z2\');\r\n</script>', 1),
(20, 'web-query-title', 'Fast Query Title', 'Fast Query', NULL),
(21, 'web-query-message', 'Fast Query Message', 'Please ask us any question', NULL),
(22, 'send-query-success-title', 'Title After Query Sent', 'Thank you!', NULL),
(23, 'send-query-success-message', 'Message After Query Sent', 'Your Query was successfully received. ', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_12_09_093909_add_description_to_photos', 2),
(6, '2020_12_09_191049_create_bits_table', 0),
(7, '2020_12_09_191235_create_bit_themes_table', 0);

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
  `created_at` datetime DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `bit_id`, `tag_id`, `name`, `slug`, `filename`, `filesize_original_kb`, `filename_original`, `position`, `status`, `random`, `updated_at`, `created_at`, `description`) VALUES
(9, 5, NULL, NULL, NULL, '033ef220ac8e357abfcc8944cf691114.jpg', NULL, NULL, 8, NULL, NULL, '2020-12-11 12:12:58', '2020-11-28 11:05:05', NULL),
(11, 6, NULL, NULL, NULL, 'd29158c10f32b3c3f05792b3131507c1.jpg', NULL, NULL, 10, NULL, NULL, '2020-12-11 12:13:05', '2020-11-28 11:06:05', 'sadfas dfa sadf sadf asdf'),
(13, 7, NULL, NULL, NULL, '0e84ac8b20687b912b06e73f63533995.jpg', NULL, NULL, 12, NULL, NULL, '2020-12-11 12:13:11', '2020-11-28 11:06:57', NULL),
(14, 8, NULL, NULL, NULL, '0aa0a2ef445fb82359f62aea3b857760.jpg', NULL, NULL, 13, NULL, NULL, '2020-12-11 12:13:16', '2020-11-28 11:07:29', NULL),
(15, 10, NULL, NULL, NULL, 'c1d02237271fb66cf11b8095478c67fd.jpg', NULL, NULL, 14, NULL, NULL, '2020-11-28 11:16:07', '2020-11-28 11:16:05', NULL),
(21, 11, NULL, NULL, NULL, 'f4ae17384c6e7a57f4ed3c96d6ea9603.jpg', NULL, NULL, 20, NULL, NULL, '2020-11-28 11:17:27', '2020-11-28 11:17:22', NULL),
(22, 12, NULL, NULL, NULL, '84e3135f3995562608dfebe394dc98d4.jpg', NULL, NULL, 21, NULL, NULL, '2020-11-28 11:18:06', '2020-11-28 11:18:04', NULL),
(23, 13, NULL, NULL, NULL, 'd091116408d9a38e5666d3cb2b121860.jpg', NULL, NULL, 22, NULL, NULL, '2020-11-28 13:09:11', '2020-11-28 11:18:43', NULL),
(25, 14, NULL, NULL, NULL, '77de07392be6dcffe7218ff1643bdf10.jpg', NULL, NULL, 24, NULL, NULL, '2020-12-11 17:50:05', '2020-11-28 11:20:54', NULL),
(30, 17, NULL, NULL, NULL, '57d6b89420b0c1acb8e4483fa8973b5f.jpg', NULL, NULL, 29, NULL, NULL, '2020-12-09 16:13:30', '2020-12-09 09:59:23', 'On Blue Table'),
(31, 17, NULL, NULL, NULL, '0f60dba321db9c6e824a20ab257dbc28.jpg', NULL, NULL, 30, NULL, NULL, '2020-12-09 16:13:30', '2020-12-09 09:59:23', 'Many Colors'),
(32, 17, NULL, NULL, NULL, '076ed16c3f471929274a53dbe04c2b19.jpg', NULL, NULL, 31, NULL, NULL, '2020-12-09 16:13:30', '2020-12-09 09:59:24', 'Office Desk'),
(39, 21, NULL, NULL, NULL, '799f4357446174aa92f1923eb8069622.jpg', NULL, NULL, 38, NULL, NULL, '2020-12-09 15:33:22', '2020-12-09 15:06:27', NULL),
(42, 15, NULL, NULL, NULL, '9feaad717668cd352276b9235e8c97e0.jpg', NULL, NULL, 41, NULL, NULL, '2020-12-11 17:49:14', '2020-12-11 17:48:04', NULL);

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
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text,
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
(47, NULL, NULL, NULL, 'Clocks', 'buy-fruits', NULL, NULL, 1, 0, 2, '2020-11-28 11:03:50', '2020-11-19 16:46:38'),
(48, NULL, NULL, NULL, 'Contact', 'contact', NULL, NULL, 1, 0, 4, '2020-11-28 11:14:56', '2020-11-19 16:46:47'),
(49, NULL, NULL, NULL, 'Interior', 'interior', NULL, NULL, 1, 0, 3, '2020-11-28 11:14:56', '2020-11-28 11:14:52'),
(51, NULL, 47, NULL, 'Wall', 'wall', NULL, NULL, 1, 0, 51, '2020-12-11 12:12:38', '2020-12-11 12:12:38'),
(52, NULL, 47, NULL, 'Desk', 'desk', NULL, NULL, 1, 0, 52, '2020-12-11 12:12:49', '2020-12-11 12:12:49');

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
(6, 'Webmaster', 'hi@bykecms.com', NULL, '$2y$10$ffP14bje7mYLpvcl63hXJ.yxDR8qoNxTmzj9RqAiSjMEqF.WT4maS', '0xUmscVvUGSJlPK23pwZWtf8m7xlSmqxzb8uKRm0VwvusNb0soSvPU8IJzSO', NULL, 0, 0, 0, 0, 0, 1, 0, '2020-11-20 07:46:34', '2020-11-20 07:46:34');

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
-- Indexes for table `bit_themes`
--
ALTER TABLE `bit_themes`
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
-- Indexes for table `queries`
--
ALTER TABLE `queries`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bit_themes`
--
ALTER TABLE `bit_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bit_types`
--
ALTER TABLE `bit_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_bits`
--
ALTER TABLE `cart_bits`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
