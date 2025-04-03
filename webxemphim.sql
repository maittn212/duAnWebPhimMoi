-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2025 at 12:50 PM
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
(7, 'Phim Chiếu Rạp', NULL, 1, 'phim-chieu-rap', NULL);

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
(2, 14, '<p><iframe allowfullscreen scrolling=\"0\" frameborder=\"0\" height=\"360\" width=\"100%\" src=\"https://vip.opstream15.com/share/001fca6b304504b620c727b498b2d814\"></iframe></p>', '1', '2023-05-23 07:33:48', '2023-05-23 07:33:48'),
(3, 14, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream15.com/share/2e4d3f59fa26af64eef3b0795b775ec1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2', '2023-05-22 11:24:31', '2023-05-22 11:24:31'),
(4, 14, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream15.com/share/a6734d9b7f042da7d5ec0c81964e21a1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3', '2023-05-23 04:27:51', '2023-05-23 04:27:51'),
(7, 14, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream15.com/share/8412f42034af852f237e3af8209f3a6f\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '4', '2023-05-23 04:28:33', '2023-05-23 04:28:33'),
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
(28, 16, '<iframe src=\"https://vip.opstream15.com/share/81aa5aa1989ff76f8f8e5f467814c499\" allowfullscreen></iframe>', '1', '2025-03-31 12:17:26', '2025-03-31 12:17:26');

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
(13, 'Trinh thám', NULL, 1, 'trinh-tham');

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
  `episode_count` int NOT NULL,
  `resolution` int NOT NULL DEFAULT '0',
  `eng_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `year` varchar(20) DEFAULT NULL,
  `season` int NOT NULL DEFAULT '0',
  `count_views` int DEFAULT NULL,
  `language_type` int NOT NULL,
  `top_view` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `time`, `slug`, `description`, `status`, `image`, `category_id`, `movie_type`, `genre_id`, `country_id`, `is_hot`, `trailer`, `episode_count`, `resolution`, `eng_name`, `created_at`, `updated_at`, `year`, `season`, `count_views`, `language_type`, `top_view`) VALUES
(4, 'Người Nhện: Du Hành Vũ Trụ Nhện', '140 phút', 'nguoi-nhen-du-hanh-vu-tru-nhen', 'Miles Morales tái xuất trong phần tiếp theo của bom tấn hoạt hình từng đoạt giải Oscar - Spider-Man: Across the Spider-Verse. Sau khi gặp lại Gwen Stacy, chàng Spider-Man thân thiện đến từ Brooklyn phải du hành qua đa vũ trụ và gặp một nhóm Người Nhện chịu trách nhiệm bảo vệ các thế giới song song. Nhưng khi nhóm siêu anh hùng xung đột về cách xử lý một mối đe dọa mới, Miles buộc phải đọ sức với các Người Nhện khác và phải xác định lại ý nghĩa của việc trở thành một người hùng để có thể cứu những người cậu yêu thương nhất.', 1, 'movie/4Wzn5MrD9pvWuipMuvN2zpvzIkiv06UkV5CMcUSZ.webp', 6, '1', 2, 5, 0, NULL, 1, 4, 'Spider-Man: Across the Spider-Verse', '2025-03-05 12:37:23', '2025-03-31 11:52:00', '2022', 0, 17899, 0, 0),
(6, 'Khi Chim Nhạn Trở Về', '40 phút/tập', 'khi-chim-nhan-tro-ve', 'Từ nhỏ, Trang Hàn Nhạn bị bỏ rơi ở nơi miền quê phương Nam. Trải qua muôn vàn khó khăn, cô trở về nhà họ Trang ở kinh thành và và lọt vào mắt xanh của Phó Vân Tịch, Phó Thiếu khanh Đại Lý Tự. Phó Vân Tịch mắc một chứng bệnh kỳ lạ, muốn cưới một thê tử tài đức vẹn toàn để có thể chăm sóc cho mình. Với sự gan dạ và tấm lòng lương thiện, Trang Hàn Nhạn trở thành lựa chọn lý tưởng nhất. Trong quá trình thăm dò và thử thách lẫn nhau, cả hai dần nảy sinh tình cảm. Hàn Nhạn không chỉ hóa giải khúc mắc với mẹ, tìm lại tình thân đã đánh mất mà còn cảm nhận được tình cảm ấm áp của gia đình khi sống chung với người nhà họ Phó. Cô và Phó Vân Tịch liên thủ vạch trần bộ mặt giả nhân giả nghĩa của Trang Sĩ Dương – gia chủ nhà họ Trang, kẻ lộng quyền làm trái pháp luật và trở thành đôi phu thê hạnh phúc.', 1, 'movie/nPqwsxgxs4XY48r51mJ7QDHg6IFqWNU4Y0FSgcEg.webp', 5, '0', 3, 3, 0, 'gq2xKJXYZ80', 25, 0, 'The Glory, Quý Nữ', '2025-03-01 17:00:00', '2025-03-31 12:48:22', '2024', 0, 99899, 0, 0),
(8, 'Natra Ma Đồng Giáng Thế', '110 phút', 'natra-ma-dong-giang-the', 'Bộ phim Natra Ma Đồng Giáng Thế - Ne Zha thuộc thể loại hoạt hình 3D của trung quốc thuộc thể loại Tiên hiệp phiêu lưu được công chiếu vào năm 2019. Bộ phim do Giảo Tử nhận trách nhiệm đạo diễn, với hai đồng biên kịch là Dịch Xảo và Nguỵ Vân. Phim được sản xuất dựa vào nguyên tác Phong thần diễn nghĩa, nội dung xoay quanh nhân vật Na Tra và con trai của Đông hải long vương là Ngao Bính. Câu chuyện truyền kỳ của Na Tra không may bị coi thành Ma hoàn chuyển thế, phải đối mặt với vận mệnh đầy trắc trở nhưng không chịu khuất phục.', 1, 'movie/eKafWKlnLcayYz7mPdLEewLSQLlBfoZEd5hP1Bi4.webp', 7, '1', 4, 3, 0, 'yCJy9roIv8Q', 1, 0, 'Ne Zha', '2025-03-01 12:37:05', '2025-03-31 12:47:55', '2025', 0, 167545, 0, 3),
(9, 'Truyện Kinh Dị Mỹ 11', '45 phút/', 'truyen-kinh-di-my-11', 'Truyện kinh dị Mỹ (tựa gốc: American Horror Story) là loạt phim truyền hình nhiều tập ngắn kinh dị của Mỹ được sản xuất bởi Ryan Murphy và Brad Falchuk. Được biên kịch dưới dạng series, mỗi mùa được sản xuất dưới dạng phim truyền hình ngắn, khoảng 12 tập. Sau mỗi mùa, bối cảnh, cũng như các nhân vật được thay mới hoàn toàn, kể cả với các diễn viên từng tham gia mùa trước nên các mùa phim có cốt truyện độc lập với nhau, sở hữu cao trào và kết thúc riêng. Một số yếu tố trong phim lấy cảm hứng từ những câu chuyện và nhân vật có thật.', 1, 'movie/O46fe82JsVMYuNpN8rjVrNOQp5h1Zk3rSkxclyvp.webp', 5, '0', 2, 5, 1, 'ME2_Anq-fJs', 5, 2, 'American Horror Story', NULL, '2025-03-31 12:38:06', '2025', 0, 98860, 0, 0),
(10, 'SAKAMOTO DAYS: Sát Thủ Về Vườn', '24 phút/tập', 'sakamoto-days-sat-thu-ve-vuon', 'Từng là sát thủ vĩ đại nhất, Sakamoto Taro giờ rửa tay gác kiếm vì tình yêu. Nhưng khi quá khứ tìm đến, anh phải chiến đấu để bảo vệ gia đình thân yêu của mình.', 1, 'movie/clBhwmlXNNdKJwJEQJuDFV1yMNVrsNHyr5claDcj.webp', 5, '0', 2, 7, 1, '9TbmxbckSjE', 3, 0, 'SAKAMOTO DAYS', '2025-03-03 12:36:35', '2025-03-31 11:46:39', '2023', 3, 55446, 0, 0),
(11, 'One Piece: Đỏ', '116 phút', 'one-piece-do', 'Đây là phần phim thứ mười lăm trong loạt phim điện ảnh của One Piece, dựa trên bộ truyện manga nổi tiếng cùng tên của tác giả Eiichiro Oda. Phim được công bố lần đầu tiên vào ngày 21 tháng 11, 2021 để kỷ niệm sự ra mắt của tập phim thứ 1000 của bộ anime One Piece và sau khi tập phim này được phát sóng, đoạn quảng cáo và áp phích chính thức của phim cũng chính thức được công bố. Phim dự kiến sẽ phát hành vào ngày 6 tháng 8 năm 2022. Bộ phim được giới thiệu sẽ là hành trình xoay quanh một nhân vật nữ mới cùng với Shanks \"Tóc Đỏ\".', 1, 'movie/LVWKlKnIs4cUi54UrUecTR249TXxEZkOuk4x3LMM.webp', 6, '1', 2, 7, 1, 'eU0i7L3cakI', 1, 4, 'One Piece: Film Red', '2023-05-07 08:50:26', '2025-03-31 11:49:25', '2022', 1, 889997, 0, 3),
(13, 'Bậc Thầy Đàm Phán', '1 tiếng', 'bac-thay-dam-phan', 'Nhà đàm phán huyền thoại Yoon Joo No trở thành trưởng nhóm Mua bán và Sáp nhập của tập đoàn Sanin. Từ đó, ta sẽ được thấy mỗi thương vụ là mỗi cuộc chiến và và mỗi nhân vật là một đối thủ đáng gờm.', 1, 'movie/DsO3vY51iUtK87ZaYC546zUMueyyRNXvGln9RXUH.webp', 5, '0', 3, 6, 1, 'WLAdEVKIRRU', 10, 4, 'The Art of Negotiation', '2023-05-21 06:06:08', '2025-03-31 11:48:05', '2025', 0, 90888, 0, 1),
(14, 'Khi Cuộc Đời Cho Bạn Quả Quýt', '1 tiếng/tập', 'khi-cuoc-doi-cho-ban-qua-quyt', 'Ở Jeju, câu chuyện về một cô nàng nhiệt huyết và chàng trai kiên cường trên đảo nảy nở thành câu chuyện trọn đời đầy thăng trầm, minh chứng tình yêu vẫn trường tồn theo thời gian.', 1, 'movie/guE7IU1RH8h62bnfUpCrG8UtgSwURuk2kERX23sp.webp', 5, '0', 3, 6, 1, NULL, 16, 4, 'When Life Gives You Tangerines', '2023-05-22 11:04:45', '2025-03-31 11:48:43', '2025', 0, 877690, 0, 3),
(15, 'Vua Sói', '24 phút/tập', 'vua-soi', 'Ở loạt phim phiêu lưu giả tưởng hoành tráng này, một thường dân đến tuổi trưởng thành biết được mình là người cuối cùng của dòng dõi Người sói lâu đời – và sẽ kế thừa ngai vàng.', 1, 'movie/3pd2NCnGXvo92B5pdeAF0QFPiWay5vxkm4yn6xfP.webp', 5, '0', 2, 5, 1, NULL, 8, 0, 'Wolf King', '2023-06-10 04:03:48', '2025-03-31 08:21:09', '2025', 0, 666756, 0, 1),
(16, 'Cuộc Chơi Mạo Hiểm', '120 phút', 'cuoc-choi-mao-hiem', 'Tài tử hạng A Russel Crowe vào vai tỷ phú công nghệ kiêm tay cờ bạc Jake Foley (Crowe) tổ chức một trò chơi poker có tỷ lệ cược cao giữa những người bạn thời thơ ấu, mang đến cho họ cơ hội giành được nhiều tiền hơn cả những gì họ từng mơ ước. Buổi tối thay đổi khi anh ấy tiết lộ kế hoạch công phu của mình để trả thù cho sự phản bội của họ và để chơi, họ sẽ phải từ bỏ một điều mà họ đã dành cả đời để cố gắng giữ... bí mật của mình. Khi trò chơi mở ra, những tên trộm đột nhập và chúng phải liên kết với nhau để sống sót qua đêm kinh hoàng.', 1, 'movie/AvAfTrLtlyBWedmaRsKvM7vgOM0rZIrcyfen8Rzq.webp', 3, '1', 2, 5, 0, NULL, 1, 2, NULL, '2025-03-31 12:16:49', '2025-03-31 12:17:03', '2013', 0, NULL, 0, NULL),
(17, '404 Chạy Ngay Đi', '104 phút', '404-chay-ngay-di', 'Nakrob, một kẻ lừa đảo bất động sản trẻ tuổi, phát hiện ra một khách sạn trên sườn đồi bị bỏ hoang gần bãi biển. Nhìn thấy cơ hội, anh ta quyết định biến nó thành một vụ lừa đảo khách sạn sang trọng.', 1, 'movie/teOdSQngurnZns2qPAc5mjmdga7x4OdMBI1kdQdR.webp', 7, '1', 2, 4, 1, 'bTJ-fHJopAI', 1, 1, '04 Run Run', '2025-03-31 12:47:33', '2025-03-31 12:48:03', NULL, 0, 2, 1, NULL);

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
(37, 14, 3),
(38, 14, 6),
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
(56, 17, 6);

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
('kBras2LyMiTqQvC9EUoLFaHUdiCOfj2WVYyvC3jy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1dPZ05uQ0NHbjhSVWVnWFZMZXAzMHg3d1JaYVVhaFNNRXp1bmN5MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9fQ==', 1743419175),
('OwSVbubSF5qi2DlUM4mRt8u7rHBVMQBua6RUudsm', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUkNPM0hjbGdlN2xFOGhCVmVCMnFtUmcwR0xOb3RTUVpLWUN4aERORCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NDM0MTkxODg7fX0=', 1743425332);

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
(5, 'mật khẩu 12345678', 'abc@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
