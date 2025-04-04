-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2025 at 03:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webxemphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `movie_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `movie_id`) VALUES
(1, '韓棟', NULL),
(2, 'Fang Yuan', NULL),
(3, 'Du Zhiguo', NULL),
(4, '刘波', NULL),
(5, 'Xiao Songyuan', NULL),
(6, '高玉庆', NULL),
(7, '蔣韻兮', NULL),
(8, '李洛伊', NULL),
(9, '杨帆', NULL),
(10, '蔣韻兮', '30'),
(11, '李洛伊', '30'),
(12, '杨帆', '30'),
(13, 'Willa Fitzgerald', '31'),
(14, 'Colin Woodell', '31'),
(15, 'Jack Bannon', '31'),
(16, 'Jessie T. Usher', '31'),
(17, 'Chelsea Muirhead', '31'),
(18, 'Daniela Nieves', '31'),
(19, 'Jessy Yates', '31'),
(20, 'Justina Machado', '31'),
(21, '', '32'),
(22, '花澤香菜', '33'),
(23, '小野賢章', '33'),
(24, '東山奈央', '33'),
(25, '遠藤綾', '33'),
(26, '岡本信彦', '33'),
(27, '七瀬彩夏', '33'),
(28, '斎藤千和', '33'),
(29, '林勇', '33'),
(30, '山寺宏一', '33'),
(31, '杉田智和', '33'),
(32, '韓棟', '34'),
(33, 'Fang Yuan', '34'),
(34, 'Du Zhiguo', '34'),
(35, '刘波', '34'),
(36, 'Xiao Songyuan', '34'),
(37, '高玉庆', '34'),
(38, 'Willa Fitzgerald', '35'),
(39, 'Colin Woodell', '35'),
(40, 'Jack Bannon', '35'),
(41, 'Jessie T. Usher', '35'),
(42, 'Chelsea Muirhead', '35'),
(43, 'Daniela Nieves', '35'),
(44, 'Jessy Yates', '35'),
(45, 'Justina Machado', '35'),
(46, '孫儷', '36'),
(47, '羅晉', '36'),
(48, '丁冠森', '36'),
(49, '李小冉', '36'),
(50, '王紫逸', '36'),
(51, '黄曼', '36'),
(52, '刘一莹', '36'),
(53, '王梓权', '36'),
(54, '張國立', '37'),
(55, '佟大为', '37'),
(56, '梅婷', '37'),
(57, '許娣', '37'),
(58, 'Zhou Yemang', '37'),
(59, '楊童舒', '37'),
(60, 'Yan Xiaopin', '37'),
(61, '丁嘉丽', '37'),
(62, '邬君梅', '37'),
(63, '張國立', '38'),
(64, '佟大为', '38'),
(65, '梅婷', '38'),
(66, '許娣', '38'),
(67, 'Zhou Yemang', '38'),
(68, '楊童舒', '38'),
(69, 'Yan Xiaopin', '38'),
(70, '丁嘉丽', '38'),
(71, '邬君梅', '38'),
(72, '孫儷', '39'),
(73, '羅晉', '39'),
(74, '丁冠森', '39'),
(75, '李小冉', '39'),
(76, '王紫逸', '39'),
(77, '黄曼', '39'),
(78, '刘一莹', '39'),
(79, '王梓权', '39'),
(80, '蔣韻兮', '40'),
(81, '李洛伊', '40'),
(82, '杨帆', '40'),
(83, '任世豪', '41'),
(84, '張楚寒', '41'),
(85, '易恩', '41'),
(86, 'Pan Zi Yan', '41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `click_count` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(3, 'Phim Lẻ', NULL, 1, 'phim-le', 2),
(5, 'Phim Bộ', 'cập nhật', 1, 'phim-bo', 1),
(6, 'Phim Hoạt Hình', 'mới cập nhật', 1, 'phim-hoat-hinh', 0),
(7, 'Phim Chiếu Rạp', NULL, 1, 'phim-chieu-rap', NULL),
(9, 'Phim Mới', NULL, 1, 'phim-moi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Việt Nam vô địch 111', 1, 'viet-nam'),
(3, 'Trung Quốc', 'ăâê', 1, 'trung-quoc'),
(4, 'Thái Lan', 'Thái Lan', 1, 'thai-lan'),
(5, 'Mỹ', 'abcd', 1, 'my'),
(6, 'Hàn Quốc', NULL, 1, 'han-quoc'),
(7, 'Nhật Bản', NULL, 1, 'nhat-ban'),
(8, 'Âu Mỹ', NULL, 1, 'au-my');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `date_created`, `status`) VALUES
(1, 'webphim1975', 'webphim1975@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-06-07 19:24:39', 1),
(3, 'truongngoctanhieu', 'truongngoctanhieu2018@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-06-07 20:59:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_balance`
--

CREATE TABLE `customer_balance` (
  `id` int NOT NULL,
  `balance` varchar(20) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_balance`
--

INSERT INTO `customer_balance` (`id`, `balance`, `date_created`, `customer_id`) VALUES
(1, '25700', '2023-06-07 19:24:39', 1),
(3, '20000', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_buys`
--

CREATE TABLE `customer_buys` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `package_id` int NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_expired` varchar(50) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_buys`
--

INSERT INTO `customer_buys` (`id`, `customer_id`, `package_id`, `date_created`, `date_expired`, `status`) VALUES
(9, 1, 2, '2023-06-10 12:17:26', '2023-07-10 12:17:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_packages`
--

CREATE TABLE `customer_packages` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `price` varchar(50) NOT NULL,
  `date_package` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_packages`
--

INSERT INTO `customer_packages` (`id`, `title`, `description`, `status`, `price`, `date_package`) VALUES
(1, 'Gói Vip', 'Gói Vip', 1, '1800000', '2023-06-07 18:44:34'),
(2, 'Gói Thường', 'Gói Thường', 1, '1500000', '2023-06-07 18:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int NOT NULL,
  `movie_id` int NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `episode` varchar(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `link`, `episode`, `updated_at`, `created_at`) VALUES
(8, 11, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream14.com/share/a96683574013404fbdc72bcb5f4c80e7\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'FullHD', '2023-05-23 06:04:12', '2023-05-23 06:04:12'),
(10, 15, '<iframe width=\"672\" height=\"378\" src=\"https://vip.opstream15.com/share/51cb9ecc4c3e31c57cf73b5cdbab05bd\" allowfullscreen></iframe>', '1', '2025-03-31 08:10:16', '2025-03-31 08:10:16'),
(11, 15, '<iframe width=\"800\" height=\"450\" src=\"https://vip.opstream15.com/share/766e319feda9c5fe35f577388e9d3081\" frameborder=\"0\" allowfullscreen></iframe>', '2', '2025-03-31 08:15:50', '2025-03-31 08:15:50'),
(12, 15, '<iframe width=\"800\" height=\"450\" src=\"https://vip.opstream15.com/share/ac8c181160dc99385bec51be806dc707\" frameborder=\"0\" allowfullscreen></iframe>', '3', '2025-03-31 08:17:48', '2025-03-31 08:17:48'),
(13, 13, '<iframe src=\"https://vip.opstream15.com/share/ae8bdbac023f541ce9142fdba96989d7\" allowfullscreen></iframe>', '1', '2025-03-31 11:18:06', '2025-03-31 11:18:06'),
(14, 13, '<iframe src=\"https://vip.opstream15.com/share/21c5ea7cab8db945fee71cdbb23e69c4\" allowfullscreen></iframe>', '2', '2025-03-31 11:18:54', '2025-03-31 11:18:54'),
(15, 13, '<iframe src=\"https://vip.opstream15.com/share/a62e25718118a0353fe93639ed436c58\" allowfullscreen></iframe>', '3', '2025-03-31 11:19:21', '2025-03-31 11:19:21'),
(16, 13, '<iframe src=\"https://vip.opstream15.com/share/e6c1142acfaceea3982a09641b33fc04\" allowfullscreen></iframe>', '4', '2025-03-31 11:19:47', '2025-03-31 11:19:47'),
(17, 10, '<iframe src=\"|https://vip.opstream15.com/share/ace87287116385dee78842512e867ff8\" allowfullscreen></iframe>', '1', '2025-03-31 11:30:30', '2025-03-31 11:30:30'),
(18, 10, '<iframe src=\"https://vip.opstream15.com/share/2db6c70605a36497764d214c2a7b8347\" allowfullscreen></iframe>', '2', '2025-03-31 11:30:49', '2025-03-31 11:30:49'),
(19, 10, '<iframe src=\"https://vip.opstream15.com/share/53a455b17073ebfcf5c4a005b0d8b591\" allowfullscreen></iframe>', '3', '2025-03-31 11:31:15', '2025-03-31 11:31:15'),
(20, 9, '<iframe src=\"https://vip.opstream15.com/share/fbfe2df616b6864090539113663415f3\" allowfullscreen></iframe>', '1', '2025-03-31 11:34:33', '2025-03-31 11:34:33'),
(21, 9, '<iframe src=\"https://vip.opstream16.com/share/2ca59fd9c3117f138e722e13597f2b0b\" allowfullscreen></iframe>', '2', '2025-03-31 11:35:15', '2025-03-31 11:35:15'),
(22, 9, '<iframe src=\"https://vip.opstream15.com/share/5290b66ff9e0c1115614365d8e20f10c\" allowfullscreen></iframe>', '3', '2025-03-31 11:35:53', '2025-03-31 11:35:53'),
(23, 9, '<iframe src=\"https://vip.opstream15.com/share/60ca0083f9f3c57b8a91c3022d460c55\" allowfullscreen></iframe>', '4', '2025-03-31 11:36:13', '2025-03-31 11:36:13'),
(24, 9, '<iframe src=\"https://vip.opstream11.com/share/8223e782ca05476736bf32c5274242de\" allowfullscreen></iframe>', '5', '2025-03-31 11:36:36', '2025-03-31 11:36:36'),
(25, 8, '<iframe src=\"https://vip.opstream16.com/share/abb8cd30fbef5b0cf3402251455a9b56\" allowfullscreen></iframe>', '1', '2025-03-31 11:41:38', '2025-03-31 11:41:38'),
(26, 6, '<iframe src=\"https://vip.opstream15.com/share/0a6564e8a6df927542038f57932e45f4\" allowfullscreen></iframe>', '1', '2025-03-31 11:47:25', '2025-03-31 11:47:25'),
(27, 4, '<iframe src=\"https://vip.opstream11.com/share/425e4714036e70b93d1683fc33b757e6\" allowfullscreen></iframe>', '1', '2025-03-31 11:52:38', '2025-03-31 11:52:38'),
(28, 16, '<iframe src=\"https://vip.opstream15.com/share/81aa5aa1989ff76f8f8e5f467814c499\" allowfullscreen></iframe>', '1', '2025-03-31 12:17:26', '2025-03-31 12:17:26'),
(31, 22, '<p><iframe src=\"https://vip.opstream10.com/share/3ffa944140b77ef7b5e7500eb4ca2fe5\" frameborder=\"0\"></iframe></p>', '1', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(32, 22, '<p><iframe src=\"https://vip.opstream10.com/share/25b6a534a8c88b8e73fe7b865fd36bde\" frameborder=\"0\"></iframe></p>', '2', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(33, 22, '<p><iframe src=\"https://vip.opstream10.com/share/6acf2725b339ee1695ebf86253f75221\" frameborder=\"0\"></iframe></p>', '3', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(34, 22, '<p><iframe src=\"https://vip.opstream10.com/share/c30eae095af40e4bdefe6e0f1636eea2\" frameborder=\"0\"></iframe></p>', '4', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(35, 22, '<p><iframe src=\"https://vip.opstream10.com/share/0a9e30ce0e92f1f994081bd5a4ab7817\" frameborder=\"0\"></iframe></p>', '5', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(36, 22, '<p><iframe src=\"https://vip.opstream10.com/share/f82eedc57df33f85b6938f71ed72032f\" frameborder=\"0\"></iframe></p>', '6', '2025-04-02 17:19:34', '2025-04-02 17:19:34'),
(37, 24, '<p><iframe src=\"https://vip.opstream15.com/share/d82c780d2a2961ea0e0d62a13c024c81\" frameborder=\"0\"></iframe></p>', '1', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(38, 24, '<p><iframe src=\"https://vip.opstream15.com/share/6426551eee37e119b15fc51e52b36c4e\" frameborder=\"0\"></iframe></p>', '2', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(39, 24, '<p><iframe src=\"https://vip.opstream17.com/share/e58e3a33512dd5cbb9e07daa9cca8d19\" frameborder=\"0\"></iframe></p>', '3', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(40, 24, '<p><iframe src=\"https://vip.opstream17.com/share/9677548ee4ee2f157590053c5c5f56c4\" frameborder=\"0\"></iframe></p>', '4', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(41, 24, '<p><iframe src=\"https://vip.opstream17.com/share/58f0c31fbecfaeccb4c08eb37ea9e4f7\" frameborder=\"0\"></iframe></p>', '5', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(42, 24, '<p><iframe src=\"https://vip.opstream17.com/share/1fcd3375fa870e5dd99c71f5d52b4825\" frameborder=\"0\"></iframe></p>', '6', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(43, 24, '<p><iframe src=\"https://vip.opstream17.com/share/2621c58bc55296ad5035c73e74ff76ca\" frameborder=\"0\"></iframe></p>', '7', '2025-04-03 08:15:21', '2025-04-03 08:15:21'),
(66, 39, '<p><iframe src=\"https://vip.opstream15.com/share/7e54aa89ad5560f1ab2cf249482837d4\" frameborder=\"0\"></iframe></p>', '1', '2025-04-03 13:33:40', '2025-04-03 13:33:40'),
(67, 39, '<p><iframe src=\"https://vip.opstream15.com/share/7b49655747396ebe9689ce931d04f84c\" frameborder=\"0\"></iframe></p>', '2', '2025-04-03 13:33:40', '2025-04-03 13:33:40'),
(68, 39, '<p><iframe src=\"https://vip.opstream15.com/share/ceb76c0e582af7a7b040982f70b5fe47\" frameborder=\"0\"></iframe></p>', '3', '2025-04-03 13:33:40', '2025-04-03 13:33:40'),
(69, 39, '<p><iframe src=\"https://vip.opstream15.com/share/c265abceb78e1e764103df8bf1e05388\" frameborder=\"0\"></iframe></p>', '4', '2025-04-03 13:33:40', '2025-04-03 13:33:40'),
(70, 40, '<p><iframe src=\"https://vip.opstream15.com/share/c12fb5789458a9052213673b22415af1\" frameborder=\"0\"></iframe></p>', 'Full', '2025-04-03 13:34:42', '2025-04-03 13:34:42'),
(71, 41, '<p><iframe src=\"https://vip.opstream15.com/share/0ccd8448df3ef40e98bd5b998d443947\" frameborder=\"0\"></iframe></p>', '1', '2025-04-03 13:53:29', '2025-04-03 13:53:29'),
(72, 41, '<p><iframe src=\"https://vip.opstream15.com/share/0f54abbcebb0de7cd55ce249d8f8fd25\" frameborder=\"0\"></iframe></p>', '2', '2025-04-03 13:53:29', '2025-04-03 13:53:29'),
(73, 41, '<p><iframe src=\"https://vip.opstream15.com/share/4c51f2883846aa0af21c588c539dfd67\" frameborder=\"0\"></iframe></p>', '3', '2025-04-03 13:53:29', '2025-04-03 13:53:29'),
(74, 41, '<p><iframe src=\"https://vip.opstream15.com/share/91e721179d18a78a03c89996dd50a91b\" frameborder=\"0\"></iframe></p>', '4', '2025-04-03 13:53:29', '2025-04-03 13:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(2, 'Hành Động', 'Phim hành động cập nhật thường xuyên', 1, 'hanh-dong'),
(3, 'Tâm Lý', 'hay', 1, 'tam-ly'),
(4, 'Võ Thuật', 'Mới cập nhật', 1, 'vo-thuat'),
(5, 'Hài Hước', 'Mới cập nhật', 1, 'hai-huoc'),
(6, 'Tình cảm', 'Mới cập nhật', 1, 'tinh-cam'),
(7, 'Viễn Tưởng', 'Mới cập nhật', 1, 'vien-tuong'),
(8, 'Kinh Dị', 'Mới cập nhật', 1, 'kinh-di'),
(9, 'Học Đường', NULL, 1, 'hoc-duong'),
(10, 'Cổ Trang', NULL, 1, 'co-trang'),
(11, 'Phiêu lưu', NULL, 1, 'phieu-luu'),
(13, 'Trinh thám', NULL, 1, 'trinh-tham'),
(14, 'Chính kịch', NULL, 1, 'chinh-kich');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `email`, `phone`) VALUES
(1, 'Phim Mới', 'Thưởng thức kho phim bom tấn, phim bộ hot, anime, show truyền hình chất lượng cao với phụ đề đầy đủ tại Phim Mới. Cập nhật phim mới nhanh chóng, giao diện dễ dùng, trải nghiệm xem phim mượt mà trên mọi thiết bị!', 'logo/j1ZzzaPFDlh6b9ebCUj2y2RMWhDwmOcLsn1BaHTu.png', 'phimmoi@gmail.com', '0949607556');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_31_132909_add_two_factor_columns_to_users_table', 1),
(5, '2025_03_31_133321_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `movie_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre_id` int NOT NULL,
  `country_id` int NOT NULL,
  `is_hot` int NOT NULL,
  `trailer` varchar(100) DEFAULT NULL,
  `episode_count` varchar(255) NOT NULL,
  `resolution` int NOT NULL DEFAULT '0',
  `eng_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `year` varchar(20) DEFAULT NULL,
  `season` int NOT NULL DEFAULT '0',
  `count_views` int DEFAULT NULL,
  `language_type` int NOT NULL,
  `top_view` int DEFAULT NULL,
  `actor_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `time`, `slug`, `description`, `status`, `image`, `category_id`, `movie_type`, `genre_id`, `country_id`, `is_hot`, `trailer`, `episode_count`, `resolution`, `eng_name`, `created_at`, `updated_at`, `year`, `season`, `count_views`, `language_type`, `top_view`, `actor_id`) VALUES
(4, 'Người Nhện: Du Hành Vũ Trụ Nhện', '140 phút', 'nguoi-nhen-du-hanh-vu-tru-nhen', 'Miles Morales tái xuất trong phần tiếp theo của bom tấn hoạt hình từng đoạt giải Oscar - Spider-Man: Across the Spider-Verse. Sau khi gặp lại Gwen Stacy, chàng Spider-Man thân thiện đến từ Brooklyn phải du hành qua đa vũ trụ và gặp một nhóm Người Nhện chịu trách nhiệm bảo vệ các thế giới song song. Nhưng khi nhóm siêu anh hùng xung đột về cách xử lý một mối đe dọa mới, Miles buộc phải đọ sức với các Người Nhện khác và phải xác định lại ý nghĩa của việc trở thành một người hùng để có thể cứu những người cậu yêu thương nhất.', 1, 'movie/4Wzn5MrD9pvWuipMuvN2zpvzIkiv06UkV5CMcUSZ.webp', 6, '1', 2, 5, 0, NULL, '1', 4, 'Spider-Man: Across the Spider-Verse', '2025-03-05 12:37:23', '2025-04-02 13:17:29', '2022', 0, 17904, 0, 0, NULL),
(6, 'Khi Chim Nhạn Trở Về', '40 phút/tập', 'khi-chim-nhan-tro-ve', 'Từ nhỏ, Trang Hàn Nhạn bị bỏ rơi ở nơi miền quê phương Nam. Trải qua muôn vàn khó khăn, cô trở về nhà họ Trang ở kinh thành và và lọt vào mắt xanh của Phó Vân Tịch, Phó Thiếu khanh Đại Lý Tự. Phó Vân Tịch mắc một chứng bệnh kỳ lạ, muốn cưới một thê tử tài đức vẹn toàn để có thể chăm sóc cho mình. Với sự gan dạ và tấm lòng lương thiện, Trang Hàn Nhạn trở thành lựa chọn lý tưởng nhất. Trong quá trình thăm dò và thử thách lẫn nhau, cả hai dần nảy sinh tình cảm. Hàn Nhạn không chỉ hóa giải khúc mắc với mẹ, tìm lại tình thân đã đánh mất mà còn cảm nhận được tình cảm ấm áp của gia đình khi sống chung với người nhà họ Phó. Cô và Phó Vân Tịch liên thủ vạch trần bộ mặt giả nhân giả nghĩa của Trang Sĩ Dương – gia chủ nhà họ Trang, kẻ lộng quyền làm trái pháp luật và trở thành đôi phu thê hạnh phúc.', 1, 'movie/nPqwsxgxs4XY48r51mJ7QDHg6IFqWNU4Y0FSgcEg.webp', 5, '0', 3, 3, 0, 'gq2xKJXYZ80', '25', 0, 'The Glory, Quý Nữ', '2025-03-01 17:00:00', '2025-03-31 12:48:22', '2024', 0, 99899, 0, 0, NULL),
(8, 'Natra Ma Đồng Giáng Thế', '110 phút', 'natra-ma-dong-giang-the', 'Bộ phim Natra Ma Đồng Giáng Thế - Ne Zha thuộc thể loại hoạt hình 3D của trung quốc thuộc thể loại Tiên hiệp phiêu lưu được công chiếu vào năm 2019. Bộ phim do Giảo Tử nhận trách nhiệm đạo diễn, với hai đồng biên kịch là Dịch Xảo và Nguỵ Vân. Phim được sản xuất dựa vào nguyên tác Phong thần diễn nghĩa, nội dung xoay quanh nhân vật Na Tra và con trai của Đông hải long vương là Ngao Bính. Câu chuyện truyền kỳ của Na Tra không may bị coi thành Ma hoàn chuyển thế, phải đối mặt với vận mệnh đầy trắc trở nhưng không chịu khuất phục.', 1, 'movie/eKafWKlnLcayYz7mPdLEewLSQLlBfoZEd5hP1Bi4.webp', 7, '1', 4, 3, 0, 'yCJy9roIv8Q', '1', 0, 'Ne Zha', '2025-03-01 12:37:05', '2025-04-02 10:26:38', '2025', 0, 167546, 0, 3, NULL),
(9, 'Truyện Kinh Dị Mỹ 11', '45 phút/', 'truyen-kinh-di-my-11', 'Truyện kinh dị Mỹ (tựa gốc: American Horror Story) là loạt phim truyền hình nhiều tập ngắn kinh dị của Mỹ được sản xuất bởi Ryan Murphy và Brad Falchuk. Được biên kịch dưới dạng series, mỗi mùa được sản xuất dưới dạng phim truyền hình ngắn, khoảng 12 tập. Sau mỗi mùa, bối cảnh, cũng như các nhân vật được thay mới hoàn toàn, kể cả với các diễn viên từng tham gia mùa trước nên các mùa phim có cốt truyện độc lập với nhau, sở hữu cao trào và kết thúc riêng. Một số yếu tố trong phim lấy cảm hứng từ những câu chuyện và nhân vật có thật.', 1, 'movie/O46fe82JsVMYuNpN8rjVrNOQp5h1Zk3rSkxclyvp.webp', 5, '0', 2, 5, 1, 'ME2_Anq-fJs', '5', 2, 'American Horror Story', NULL, '2025-04-03 08:36:44', '2025', 0, 98862, 0, 0, NULL),
(10, 'SAKAMOTO DAYS: Sát Thủ Về Vườn', '24 phút/tập', 'sakamoto-days-sat-thu-ve-vuon', 'Từng là sát thủ vĩ đại nhất, Sakamoto Taro giờ rửa tay gác kiếm vì tình yêu. Nhưng khi quá khứ tìm đến, anh phải chiến đấu để bảo vệ gia đình thân yêu của mình.', 1, 'movie/clBhwmlXNNdKJwJEQJuDFV1yMNVrsNHyr5claDcj.webp', 5, '0', 2, 7, 1, '9TbmxbckSjE', '3', 0, 'SAKAMOTO DAYS', '2025-03-03 12:36:35', '2025-03-31 11:46:39', '2023', 3, 55446, 0, 0, NULL),
(11, 'One Piece: Đỏ', '116 phút', 'one-piece-do', 'Đây là phần phim thứ mười lăm trong loạt phim điện ảnh của One Piece, dựa trên bộ truyện manga nổi tiếng cùng tên của tác giả Eiichiro Oda. Phim được công bố lần đầu tiên vào ngày 21 tháng 11, 2021 để kỷ niệm sự ra mắt của tập phim thứ 1000 của bộ anime One Piece và sau khi tập phim này được phát sóng, đoạn quảng cáo và áp phích chính thức của phim cũng chính thức được công bố. Phim dự kiến sẽ phát hành vào ngày 6 tháng 8 năm 2022. Bộ phim được giới thiệu sẽ là hành trình xoay quanh một nhân vật nữ mới cùng với Shanks \"Tóc Đỏ\".', 1, 'movie/LVWKlKnIs4cUi54UrUecTR249TXxEZkOuk4x3LMM.webp', 6, '1', 2, 7, 1, 'eU0i7L3cakI', '1', 4, 'One Piece: Film Red', '2023-05-07 08:50:26', '2025-04-03 08:41:51', '2022', 1, 889999, 0, 3, NULL),
(13, 'Bậc Thầy Đàm Phán', '1 tiếng', 'bac-thay-dam-phan', 'Nhà đàm phán huyền thoại Yoon Joo No trở thành trưởng nhóm Mua bán và Sáp nhập của tập đoàn Sanin. Từ đó, ta sẽ được thấy mỗi thương vụ là mỗi cuộc chiến và và mỗi nhân vật là một đối thủ đáng gờm.', 1, 'movie/DsO3vY51iUtK87ZaYC546zUMueyyRNXvGln9RXUH.webp', 5, '0', 3, 6, 1, 'WLAdEVKIRRU', '10', 4, 'The Art of Negotiation', '2023-05-21 06:06:08', '2025-03-31 11:48:05', '2025', 0, 90888, 0, 1, NULL),
(15, 'Vua Sói', '24 phút/tập', 'vua-soi', 'Ở loạt phim phiêu lưu giả tưởng hoành tráng này, một thường dân đến tuổi trưởng thành biết được mình là người cuối cùng của dòng dõi Người sói lâu đời – và sẽ kế thừa ngai vàng.', 1, 'movie/3pd2NCnGXvo92B5pdeAF0QFPiWay5vxkm4yn6xfP.webp', 5, '0', 2, 5, 1, NULL, '8', 0, 'Wolf King', '2023-06-10 04:03:48', '2025-04-03 13:49:17', '2025', 0, 666759, 0, 1, NULL),
(16, 'Cuộc Chơi Mạo Hiểm', '120 phút', 'cuoc-choi-mao-hiem', 'Tài tử hạng A Russel Crowe vào vai tỷ phú công nghệ kiêm tay cờ bạc Jake Foley (Crowe) tổ chức một trò chơi poker có tỷ lệ cược cao giữa những người bạn thời thơ ấu, mang đến cho họ cơ hội giành được nhiều tiền hơn cả những gì họ từng mơ ước. Buổi tối thay đổi khi anh ấy tiết lộ kế hoạch công phu của mình để trả thù cho sự phản bội của họ và để chơi, họ sẽ phải từ bỏ một điều mà họ đã dành cả đời để cố gắng giữ... bí mật của mình. Khi trò chơi mở ra, những tên trộm đột nhập và chúng phải liên kết với nhau để sống sót qua đêm kinh hoàng.', 1, 'movie/AvAfTrLtlyBWedmaRsKvM7vgOM0rZIrcyfen8Rzq.webp', 3, '1', 2, 5, 0, NULL, '1', 2, NULL, '2025-03-31 12:16:49', '2025-03-31 12:17:03', '2013', 0, NULL, 0, NULL, NULL),
(17, '404 Chạy Ngay Đi', '104 phút', '404-chay-ngay-di', 'Nakrob, một kẻ lừa đảo bất động sản trẻ tuổi, phát hiện ra một khách sạn trên sườn đồi bị bỏ hoang gần bãi biển. Nhìn thấy cơ hội, anh ta quyết định biến nó thành một vụ lừa đảo khách sạn sang trọng.', 1, 'movie/teOdSQngurnZns2qPAc5mjmdga7x4OdMBI1kdQdR.webp', 7, '1', 2, 4, 1, 'bTJ-fHJopAI', '1', 1, '04 Run Run', '2025-03-31 12:47:33', '2025-04-03 08:41:58', NULL, 0, 8, 1, NULL, NULL),
(21, 'Cecilia', '105 Phút', 'cecilia', 'After repeatedly flaunting her peerless body to her servants, snobbish aristocrat Cecilia becomes the victim of rape. But the experience triggers a carnal awakening, full of socialite sex parties and woodland orgies. And before long, Cecilia finds her amorous adventures spinning out of control, particularly when her husband decides to join in on the free-love lifestyle.', 1, 'https://img.ophim.live/uploads/movies/cecilia-thumb.jpg', 7, '1', 13, 8, 1, '', '1', 0, 'Cecilia', '2025-04-02 17:19:09', '2025-04-03 08:36:07', NULL, 0, 3, 0, NULL, NULL),
(22, 'Tình Yêu Bị Chiếm Hữu (Phần 2)', '108 phút/tập', 'tinh-yeu-bi-chiem-huu-phan-2', '<p>Tám thầy bói đã tụ họp lại để xem vận mệnh hẹn hò tương lai của chính họ! Trong thời gian ở cùng nhau tại Ngôi nhà bị ám trong một tuần, các thầy bói trẻ sẽ sử dụng chuyên môn của mình để tìm kiếm tình yêu định mệnh một cách mù quáng. Liệu họ có thể tìm thấy người bạn đời định mệnh của mình không, và họ sẽ làm gì khi tình cảm của họ quyết định đi ngược lại số phận?</p>', 1, 'https://img.ophim.live/uploads/movies/tinh-yeu-bi-chiem-huu-phan-2-thumb.jpg', 7, '1', 13, 8, 1, '', '?', 0, 'Possessed Love (Season 2)', '2025-04-02 17:19:26', '2025-04-03 08:54:06', NULL, 0, 8, 0, NULL, NULL),
(23, 'Chuyện Tình Cô Bé Lọ Lem: Phỉ Thúy Sơn', '60 phút/tập', 'chuyen-tinh-co-be-lo-lem-phi-thuy-son', '<p>Cô gái nọ phát hiện ra mình là đứa con thất lạc từ lâu của nhà họ Trương giàu có. Từ một kẻ nghèo khó, cô bước vào cuộc sống đầy rắc rối của giới thượng lưu.</p><p>&nbsp;</p>', 1, 'https://img.ophim.live/uploads/movies/chuyen-tinh-co-be-lo-lem-phi-thuy-son-thumb.jpg', 7, '1', 13, 8, 1, '', '30', 0, 'Emerald Hill', '2025-04-02 17:24:40', '2025-04-03 08:36:17', NULL, 0, 2, 0, NULL, NULL),
(24, 'Daredevil: Tái Xuất', '50 phút/tập', 'daredevil-born-again', '<p>Bộ phim xoay quanh Matt Murdock (do Charlie Cox thủ vai), một luật sư mù ở Hell’s Kitchen, New York, người sống hai cuộc đời: ban ngày là một luật sư đấu tranh cho công lý, ban đêm là Daredevil – một siêu anh hùng đeo mặt nạ bảo vệ thành phố. Phim lấy bối cảnh vài năm sau các sự kiện của loạt phim Netflix, khi Matt cùng hai người bạn thân là Foggy Nelson (Elden Henson) và Karen Page (Deborah Ann Woll) đã tìm thấy sự ổn định trong cuộc sống với văn phòng luật của họ.Tuy nhiên, sự yên bình này không kéo dài khi Wilson Fisk (Vincent D’Onofrio), tức Kingpin – kẻ thù truyền kiếp của Daredevil, tái xuất với một kế hoạch đầy tham vọng. Không còn hoạt động trong thế giới ngầm như trước, Fisk giờ đây hướng đến chính trường và trở thành một nhân vật quyền lực tại New York, thậm chí có thể là thị trưởng. Mâu thuẫn giữa Matt và Fisk leo thang khi cả hai đối đầu trong một cuộc chiến vừa mang tính cá nhân vừa ảnh hưởng đến cả thành phố.</p><p>&nbsp;</p>', 1, 'https://img.ophim.live/uploads/movies/daredevil-born-again-thumb.jpg', 7, '1', 2, 8, 1, 'https://www.youtube.com/watch?v=7xALolZzhSM', '9', 0, 'Daredevil: Born Again', '2025-04-03 08:15:12', '2025-04-03 13:53:59', NULL, 0, 15, 0, 1, NULL),
(33, 'Your Forma', '24 phút/tập', 'your-forma', '<p>Vào năm 2023 khác, Your Forma—một công nghệ \"sợi thông minh\" kỳ diệu—đã trở thành một thành phần thiết yếu của cuộc sống hàng ngày sau khi được tạo ra để điều trị một đợt bùng phát viêm não do vi-rút lan rộng. Tính năng xâm nhập của những tiện ích tiện dụng này là chúng ghi lại mọi âm thanh, hình ảnh và thậm chí cả cảm giác mà người dùng trải qua.</p>', 1, 'https://img.ophim.live/uploads/movies/your-forma-thumb.jpg', 9, '1', 7, 3, 1, NULL, '4 Tập', 0, 'Your Forma', '2025-04-03 12:49:32', '2025-04-03 13:49:05', NULL, 0, 1, 0, NULL, NULL),
(39, 'Ô Vân Chi Thượng', '45 phút/tập', 'o-van-chi-thuong', 'Hàn Thanh là nữ cảnh sát thuộc đội điều tra hình sự Tam Hợp. Vì nghiêm túc, ít nói và chỉ tập trung vào công việc, cô được gắn biệt danh “Không Vui”. Cô đã hợp tác ăn ý với đồng nghiệp Chung Vĩ nhiều năm, nhưng Chung Vĩ lại mất tích sau khi theo dõi một nghi phạm và không có tin tức suốt gần hai tháng. Trong khi lo lắng và đau khổ, Hàn Thanh vẫn xử lý các vụ án khác, không từ bỏ bất kỳ manh mối nào liên quan đến Chung Vĩ. Một vụ án mạng mới khiến Hàn Thanh cảnh giác cao độ. Qua các chi tiết nhỏ, cô phán đoán vụ án mạng này có liên quan đến sự mất tích của Chung Vĩ. Dù gặp nhiều trở ngại trong quá trình điều tra, kẻ phạm tội thực sự cuối cùng đã lộ diện và những gì mà Chung Vĩ đã trải qua cũng dần trở nên rõ ràng. Cảnh sát lần theo các manh mối, phát hiện mối liên hệ giữa ba vụ án lớn: mất tích, giết người và buôn ma túy, từ đó lần ra mạng lưới tổ chức tội phạm phức tạp và những bí mật ẩn giấu đằng sau nó. Đội điều tra Tam Hợp hợp lực, phá án thành công, toàn bộ tội phạm đều bị bắt giữ.', 1, 'https://img.ophim.live/uploads/movies/o-van-chi-thuong-thumb.jpg', 9, '1', 14, 3, 0, NULL, '17 Tập', 0, 'Breaking the Shadows', '2025-04-03 13:33:01', '2025-04-03 13:49:12', NULL, 0, 1, 0, NULL, NULL),
(40, 'Đảo Rắn Khổng Lồ', '90 Phút', 'dao-ran-khong-lo', 'Tập đoàn Lam Sơn muốn biến con phố Hướng Dương tĩnh mịch và yên bình thành một khu du lịch nghỉ dưỡng, lấy danh nghĩa phục hồi hệ sinh thái tự nhiên để ép buộc người dân di dời. Tuy nhiên, các mẫu sinh vật từ cơ sở nghiên cứu đã thoát ra ngoài, gây ra thảm họa sinh học. Nam chính Hàn Kiệt, trong hoàn cảnh nguy hiểm, không hề nao núng mà bảo vệ hai cô con gái và những người hàng xóm. Bằng hành động thực tế của mình, anh dần dần thay đổi những người xung quanh. Cuối cùng, tập đoàn Lam Sơn đã phải chịu hình phạt thích đáng.', 1, 'https://img.ophim.live/uploads/movies/dao-ran-khong-lo-thumb.jpg', 9, '1', 7, 3, 0, NULL, '1', 0, 'Island Python', '2025-04-03 13:34:34', '2025-04-03 13:45:43', NULL, 0, 1, 0, NULL, NULL),
(41, 'Xin Hãy Kết Hôn Với Tôi Lần Nữa', '12 phút/tập', 'xin-hay-ket-hon-voi-toi-lan-nua', 'Mi Chuxia partners with influencer Lu Yi to revive her late fiancé Tang Jingxing’s jewelry brand, only to uncover that Lu Yi is actually Tang Jingxing, who vanished after a car accident three years ago. As their relationship deepens, the truth behind his disappearance gradually comes to light.', 1, 'https://img.ophim.live/uploads/movies/xin-hay-ket-hon-voi-toi-lan-nua-thumb.jpg', 1, '1', 14, 3, 0, '', '31 Tập', 0, 'Marry Me Again', '2025-04-03 13:53:18', '2025-04-03 13:53:18', NULL, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int NOT NULL,
  `movie_id` int NOT NULL,
  `genre_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(6, 11, 2),
(10, 10, 2),
(11, 10, 4),
(14, 9, 2),
(16, 9, 7),
(19, 8, 6),
(21, 4, 2),
(22, 4, 5),
(23, 4, 7),
(28, 13, 3),
(34, 15, 3),
(35, 15, 2),
(36, 15, 7),
(39, 11, 5),
(40, 11, 7),
(41, 10, 5),
(42, 9, 3),
(43, 9, 8),
(44, 9, 11),
(45, 8, 4),
(46, 8, 5),
(47, 8, 11),
(48, 6, 3),
(49, 6, 6),
(50, 6, 10),
(51, 4, 11),
(52, 16, 2),
(53, 17, 2),
(54, 17, 3),
(55, 17, 5),
(56, 17, 6),
(60, 21, 13),
(61, 22, 13),
(62, 23, 13),
(63, 24, 13),
(64, 24, 2),
(65, 24, 7),
(74, 33, 7),
(80, 39, 14),
(81, 40, 7),
(82, 41, 14);

-- --------------------------------------------------------

--
-- Table structure for table `napthe`
--

CREATE TABLE `napthe` (
  `id` int NOT NULL,
  `request_id` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `partner_id` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `telco` varchar(20) NOT NULL,
  `command` varchar(20) NOT NULL,
  `customer_id` int NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `napthe`
--

INSERT INTO `napthe` (`id`, `request_id`, `code`, `partner_id`, `serial`, `telco`, `command`, `customer_id`, `amount`) VALUES
(1, '662048295', '20000251925236', '44738308246', '823522203055335', 'VIETTEL', 'charging', 1, '10000');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int NOT NULL,
  `movie_id` int NOT NULL,
  `rating` int NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `movie_id`, `rating`, `ip_address`) VALUES
(1, 9, 2, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1EwZrQEdRSEXh4ZVvajW2Le43qEXxYU2zFGIcQXd', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZm85YVhIOXJSWUhwTHZQVmlOeDlPazNDNG1udlFNZnNVRGlXU3lqayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWVjaC1kZXRhaWwvb25lLXBpZWNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0MzY3OTQyMzt9fQ==', 1743685529),
('yjfvuhQsM5Qt3SBeEP4MczJvLeYwsfXFShauwlZu', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQmlYSDJUUzFoM2QybHJ0U2dnd1lFMWxmRnFrTzJIbk1URzR3OTMxdiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Jhbm5lciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQzNjY0ODA1O319', 1743694255);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int UNSIGNED NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` int DEFAULT NULL,
  `google_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `facebook_id`, `google_id`, `role`) VALUES
(3, 'ngọc mai', 'admin@gmail.com', NULL, '$2y$12$dftmA/Oirl0VtB6dAf0yAOVVfOmdC.sIEfJ/QiWJB980wpHLlPKd2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-31 06:52:48', '2025-03-31 06:52:48', 0, NULL, 0),
(4, 'Trần Thị Ngọc Mai P H 5 3 3 2 3', 'maittnph53323@gmail.com', NULL, '$2y$12$ULaTBXVbmge5RSbtc26DGuXQdaJ/af/TUNZrZ5SQDkUdY8ce1UMQG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-31 10:02:51', '2025-03-31 10:02:51', NULL, '103486236781577826546', 1),
(5, 'mật khẩu 12345678', 'abc@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Thị Ngọc Mai Trần', 'trantngocmaii2005@gmail.com', NULL, '$2y$12$OGrXHvcc9b0gSJwpnTc7buY6kebriJXwGvlKKuv.VLeWSEzme.f.a', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-31 13:10:51', '2025-03-31 13:10:51', NULL, '107628423612300298191', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_balance`
--
ALTER TABLE `customer_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_buys`
--
ALTER TABLE `customer_buys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_packages`
--
ALTER TABLE `customer_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
