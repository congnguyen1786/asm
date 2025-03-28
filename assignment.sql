-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2025 lúc 05:51 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Thời sự', 'thoi-su', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(2, 'Thể thao', 'the-thao', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(3, 'Giải trí', 'giai-tri', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(4, 'Công nghệ', 'cong-nghe', '2025-03-27 17:00:00', '2025-03-27 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 'Tuyệt vời! Đội tuyển Việt Nam quá xuất sắc!', 1, 1, '2025-03-28 01:05:00', '2025-03-28 01:05:00'),
(2, 'Chúc mừng đội tuyển! Tiếp tục giữ vững phong độ nhé.', 2, 1, '2025-03-28 01:10:00', '2025-03-28 01:10:00'),
(3, 'iPhone mới đẹp quá, mong sớm sở hữu!', 3, 2, '2025-03-27 03:15:00', '2025-03-27 03:15:00'),
(4, 'Hồ Ngọc Hà hát hay quá!', 1, 3, '2025-03-26 13:30:00', '2025-03-26 13:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_03_28_114847_create_users_table', 1),
(2, '2025_03_28_115310_create_categories_table', 1),
(3, '2025_03_28_115508_create_news_table', 2),
(4, '2025_03_28_115607_create_comments_table', 2),
(5, '2025_03_28_121134_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `description`, `content`, `image`, `views`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Lịch thi đấu và trực tiếp bóng đá hôm nay 6/6: ĐT Việt Nam đấu ĐT Philippines', 'doi-tuyen-viet-nam-thang-dam-thai-lan-tai-aff-cup', 'Lịch thi đấu và trực tiếp bóng đá hôm nay 6/6, ĐT Việt Nam so tài với ĐT Philippines tại vòng loại thứ 2 World Cup 2026 khu vực châu Á.', 'Theo lịch thi đấu và trực tiếp bóng đá hôm nay 6/6, người hâm mộ bóng đá Việt Nam sẽ hướng sự chú ý của mình tới trận đấu giữa ĐT Việt Nam vs ĐT Philippines trong khuôn khổ vòng loại thứ 2 World Cup 2026 khu vực châu Á.\n\nĐây là trận đấu ra mắt của HLV Kim Sang Sik với bóng đá Việt Nam nên chiến lược gia người Hàn Quốc rất quyết tâm: “Trận đấu với ĐT Philippines là trận đấu đầu tiên của tôi với ĐT Việt Nam. Dù trong 5 ngày ngắn ngủi tập luyện, nhưng chúng tôi đã truyền tải những bài tập, chiến thuật tới các học trò. Tôi tin rằng các cầu thủ sẽ có được kết quả khả quan ở trận đấu này”.', 'https://mediabhy.mediatech.vn/upload/image/202406/medium/69953_02b6f74004514d64cc7cf1083ae6a7a2.jpg', 12000, 2, '2025-03-28 01:00:00', '2025-03-28 01:00:00'),
(2, 'iPhone 16 ra mắt với giá sốc', 'iphone-16-ra-mat-voi-gia-soc', 'Apple vừa công bố iPhone 16 với nhiều cải tiến vượt trội...', 'Apple vừa công bố iPhone 16 với nhiều cải tiến vượt trội, giá khởi điểm chỉ từ 20 triệu đồng...', 'https://vatvostudio.vn/wp-content/uploads/2024/09/Tren-tay-iphone-16-Pro-iPhone-16-Pro-Max-14.jpg', 10000, 4, '2025-03-27 03:00:00', '2025-03-27 03:00:00'),
(3, 'Hồ Ngọc Hà biểu diễn tại Hà Nội', 'ho-ngoc-ha-bieu-dien-tai-ha-noi', 'Ca sĩ Hồ Ngọc Hà có buổi biểu diễn hoành tráng tại Hà Nội...', 'Tối qua, ca sĩ Hồ Ngọc Hà đã có buổi biểu diễn hoành tráng tại Hà Nội với hàng nghìn khán giả tham dự...', 'https://vcdn1-vnexpress.vnecdn.net/2022/02/09/ho-ngoc-ha-2670-1629358205-9925-1644375867.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=AanjxJYXjuSom36utb5KyA', 8000, 3, '2025-03-26 13:00:00', '2025-03-26 13:00:00'),
(4, 'Giá xăng tăng mạnh từ hôm nay', 'gia-xang-tang-manh-tu-hom-nay', 'Giá xăng tăng thêm 500 đồng/lít từ hôm nay...', 'Từ 0h ngày 28/03/2025, giá xăng chính thức tăng thêm 500 đồng/lít, gây ảnh hưởng đến người tiêu dùng...', 'https://bqn.1cdn.vn/2025/03/27/baogiaothong.mediacdn.vn-603483875699699712-2023-12-12-_nguoi-tieu-dung-o-nghe-an-dang-phai-mua-xang-dau-cao-hon-2-so-voi-gia-dieu-hanh-cua-nha-nuoc-17023450359531693570473.jpg', 5000, 1, '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(5, 'Trận mưa lớn gây ngập lụt ở TP.HCM', 'tran-mua-lon-gay-ngap-lut-o-tp-hcm', 'Mưa lớn kéo dài gây ngập nhiều tuyến đường tại TP.HCM...', 'Trận mưa lớn tối qua đã khiến nhiều khu vực tại TP.HCM bị ngập sâu, giao thông tê liệt...', 'https://tl.cdnchinhphu.vn/344445545208135680/2024/8/13/z572779931963484b2b895635f90cd9e1969e19ec1dfc9-17235561100391997396236.jpg', 4000, 1, '2025-03-27 11:00:00', '2025-03-27 11:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rvugmzrVMCxyO6lP060GAYrCysnbpdeQYFxLcOqO', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1lyRFhiTWs2WTdSN1E3S2lsTVZzSTFxc3hwOXZ3ckpibHljUWpreCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aW4tdHVjLzIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1743179676);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@example.com', '$2y$10$z7X8e9k8eL9vX9y5z5X5XOj5X5X5X5X5X5X5X5X5X5X5X5X5X5X5X', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(2, 'Trần Thị B', 'tranthib@example.com', '$2y$10$z7X8e9k8eL9vX9y5z5X5XOj5X5X5X5X5X5X5X5X5X5X5X5X5X5X5X', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(3, 'Lê Văn C', 'levanc@example.com', '$2y$10$z7X8e9k8eL9vX9y5z5X5XOj5X5X5X5X5X5X5X5X5X5X5X5X5X5X5X', '2025-03-27 17:00:00', '2025-03-27 17:00:00'),
(4, 'nguyen cong', 'admin@gmail.com', '1', NULL, NULL),
(5, 'công nguyễn', 'cong08633@gmail.com', '$2y$12$eIr5aIPfTCSiSTEpPsIvjunJeIZtJ2JoFtTFz7qUBF5oQGGZfWIYy', '2025-03-28 09:12:00', '2025-03-28 09:12:00'),
(6, 'cong', 'cong086133@gmail.com', '$2y$12$despoRnHeDx0qVnTYmIdROjlIbGr2uOYe3J1.O4xcic1Dbu6xcFNW', '2025-03-28 09:20:43', '2025-03-28 09:20:43'),
(7, 'cong', 'leb867243@gmail.com', '$2y$12$6OdNyqzO4qBK7AjbcfZZ4e0Z7Cw8fBZRvuAiGwbUv.uLLxefA2MgS', '2025-03-28 09:23:48', '2025-03-28 09:23:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_news_id_foreign` (`news_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
