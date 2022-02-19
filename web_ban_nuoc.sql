-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 09:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ban_nuoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenloai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `tenloai`, `slug`, `mota`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê', 'ca-phe', 'cà phê', 'ca-phe14.png', 1, NULL, NULL),
(2, 'Trà Trái Cây', 'tra-trai-cay', 'trà trái cây', 'tra-trai-cay62.png', 1, NULL, NULL),
(3, 'Đá Xay', 'da-xay', 'đá xay', 'da-xay70.png', 1, NULL, NULL),
(4, 'Thưởng Thức Tại Nhà', 'thuong-thuc-tai-nha', 'thưởng thức tại nhà', 'thuong-thuc-tai-nha33.png', 1, NULL, NULL),
(5, 'Bánh - Snacks', 'banh-snacks', 'Bánh', 'banh-snacks30.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_social` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_social` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `ten`, `sodienthoai`, `diachi`, `email`, `password`, `id_social`, `type_social`, `token`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'Phan Minh Trí', '', NULL, 'phanminhtri11800@gmail.com', '$2y$10$x0t/rsxDwxfk7wju/ezEbeHmSqL/SzEUL7qoxFasbe4linzVHYkru', '112318135447223833110', 'google', NULL, 1, '2022-02-19 00:14:45', '2022-02-19 00:14:45'),
(3, NULL, NULL, NULL, 'trip6013@gmail.com', '$2y$10$Z/NeNbkOUjEk4ldDRRhe6e2a.SDmXeww482GchsDamKVDr3rSQ402', NULL, NULL, NULL, 1, '2022-02-19 01:38:07', '2022-02-19 01:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nglieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_nhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_vi_nglieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_nhap` int(11) NOT NULL,
  `ngay_het_han` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_units`
--

CREATE TABLE `material_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_don_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_units`
--

INSERT INTO `material_units` (`id`, `ten_don_vi`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'ký', 1, NULL, NULL),
(2, 'Lon', 1, NULL, NULL),
(3, 'cái', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_posts`
--

CREATE TABLE `menu_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendanhmuc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_posts`
--

INSERT INTO `menu_posts` (`id`, `tendanhmuc`, `slug`, `mota`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê', 'ca-phe', 'cà phê', NULL, 1, NULL, NULL),
(2, 'Sự Kiện', 'su-kien', 'sự kiện', NULL, 1, NULL, NULL),
(3, 'Khuyến Mãi', 'khuyen-mai', 'khuyến mãi', NULL, 1, NULL, NULL),
(4, 'Tin Tức', 'tin-tuc', 'tin tức', NULL, 1, NULL, NULL);

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
(5, '2022_02_05_045004_create_materials', 1),
(6, '2022_02_11_102409_create_material_units_table', 1),
(7, '2022_02_17_035819_create_categories_table', 1),
(8, '2022_02_17_035837_create_products_table', 1),
(9, '2022_02_17_044405_create_sizes_table', 1),
(10, '2022_02_17_073634_create_size_pros_table', 1),
(11, '2022_02_19_054438_create_customers_table', 1),
(12, '2022_02_19_054518_create_menu_posts_table', 1),
(13, '2022_02_19_054610_create_posts_table', 1),
(14, '2022_02_19_054642_create_orders_table', 1),
(15, '2022_02_19_054710_create_order_details_table', 1),
(16, '2022_02_19_054734_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `madh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nhanvien` int(10) UNSIGNED DEFAULT NULL,
  `id_khachhang` int(10) UNSIGNED DEFAULT NULL,
  `httt` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `tongtien` double NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `madh`, `hoten`, `diachi`, `email`, `ghichu`, `dienthoai`, `id_nhanvien`, `id_khachhang`, `httt`, `ngaytao`, `tongtien`, `trangthai`, `created_at`, `updated_at`) VALUES
(13, 'RD87472', 'Minh Trí', 'Phước Lợi, Bến Lức ,Long An', 'phanminhtri11800@gmail.com', 'DGHFGHFGHFG', '0329859916', NULL, NULL, 2, '2022-02-19 08:32:19', 20000, 1, '2022-02-19 01:33:05', '2022-02-19 01:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_donhang` int(10) UNSIGNED DEFAULT NULL,
  `id_sanpham` int(10) UNSIGNED DEFAULT NULL,
  `id_size` int(10) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_donhang`, `id_sanpham`, `id_size`, `soluong`, `giaban`, `created_at`, `updated_at`) VALUES
(9, 13, 1, 1, 1, 20000, '2022-02-19 01:33:05', '2022-02-19 01:33:05');

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
  `id` int(10) UNSIGNED NOT NULL,
  `mancc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaithanhtoan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sohoadon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `magiaodichBank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `magiaodich` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_donhang` int(10) UNSIGNED DEFAULT NULL,
  `ngaythanhtoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongtien` double NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `mancc`, `loaithanhtoan`, `sohoadon`, `magiaodichBank`, `magiaodich`, `noidung`, `id_donhang`, `ngaythanhtoan`, `tongtien`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'MOMO', 'qr', '1645259539', NULL, '2644645105', 'Thanh toán qua MoMo', 13, '1645259580473', 20000, 1, '2022-02-19 01:33:05', '2022-02-19 01:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT 0,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `tensp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_loaisanpham` int(10) UNSIGNED NOT NULL,
  `giaban` double NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `tensp`, `slug`, `mota`, `hinhanh`, `noidung`, `id_loaisanpham`, `giaban`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê Sữa Nóng', 'ca-phe-sua-nong', 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 'ca-phe-nong59.jpg', 'Cà phê sữa nóng - Sự độc đáo trong thưởng thức cà phê của người Việt\r\n\r\nCà phê phin kết hợp cùng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.\r\n\r\nKhi người Pháp đem văn hóa cà phê vào Việt Nam, người bản xứ thay thế sữa tươi đắt đỏ bằng sữa đặc rẻ tiền hơn để pha cùng cà phê. Tuy nhiên, bằng sự kết hợp hài hòa giữa các thái cực đắng – ngọt, bùi – béo, ly cà phê sữa đá lại sánh đặc và đậm đà hơn, không làm mất đi công dụng của cà phê mà bổ sung thêm năng lượng cho cơ thể từ sữa đã trở thành quen thuộc với nếp sống của người Việt và là một nét sáng tạo riêng, chinh phục được trái tim hàng triệu người yêu cà phê trên thế giới.\r\n\r\nNhà báo Nicola Graydon từng miêu tả và chia sẻ cảm nhận của mình trên tờ nhật báo nổi tiếng của Anh rằng: \"Đó là loại cà phê mạnh, nhỏ giọt từ một phin kim loại nhỏ, bên dưới ly chứa khoảng ¼ lượng sữa đặc. Sau khoảng 15 phút, khi café ngừng nhỏ giọt, bạn sẽ khuấy đều và cho đá vào. Đầu tiên, tôi không chịu được cái ngọt kiểu như vậy. Tuy nhiên sau 3 ngày, tôi bị khuất phục và nghiện cái ngọt “thần thánh” ấy. Thật tuyệt vời khi cảm nhận cái ngọt thanh mát trong cuống họng, điều mà chúng ta không thấy ở một ly latte cổ điển”.\r\n\r\nCũng có người đã miêu tả Cà phê sữa rằng: Cà phê thì đắng mà sữa lại quá ngọt ngào. Hai vị đắng - ngọt như hương vị của cuộc sống, nên thưởng thức Cà phê sữa cũng giống như đang thưởng thức cuộc sống.\r\n\r\nVà The Coffee House nghĩ rằng: Chằng có cách nào mô tả chính xác được mùi vị của Cà phê sữa Việt Nam hơn việc tự mình thưởng thức. Còn gì tuyệt vời hơn bắt đầu một ngày mới, trong tiết trời se se lạnh bằng một ly Cà phê sữa nóng thơm lừng và tinh tế đúng không nào!', 1, 20000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Nhỏ', 1, NULL, NULL),
(2, 'Vừa', 1, NULL, NULL),
(3, 'Lớn', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_pros`
--

CREATE TABLE `size_pros` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pro` int(10) UNSIGNED NOT NULL,
  `id_size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_pros`
--

INSERT INTO `size_pros` (`id`, `id_pro`, `id_size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$10$Az2nV8LaeHELgVdlV23KUu2Lr8Z7lY4k8nk0QQgwHmCrUSiDfm/OS', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_tenloai_unique` (`tenloai`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_units`
--
ALTER TABLE `material_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_posts`
--
ALTER TABLE `menu_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_posts_tendanhmuc_unique` (`tendanhmuc`);

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
  ADD KEY `orders_id_nhanvien_foreign` (`id_nhanvien`),
  ADD KEY `orders_id_khachhang_foreign` (`id_khachhang`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_donhang_foreign` (`id_donhang`),
  ADD KEY `order_details_id_size_foreign` (`id_size`),
  ADD KEY `order_details_id_sanpham_foreign` (`id_sanpham`);

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
  ADD KEY `payments_id_donhang_foreign` (`id_donhang`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_tieude_unique` (`tieude`),
  ADD KEY `posts_id_danhmuc_foreign` (`id_danhmuc`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_tensp_unique` (`tensp`),
  ADD KEY `products_id_loaisanpham_foreign` (`id_loaisanpham`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_pros`
--
ALTER TABLE `size_pros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_pros_id_pro_foreign` (`id_pro`),
  ADD KEY `size_pros_id_size_foreign` (`id_size`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_units`
--
ALTER TABLE `material_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_posts`
--
ALTER TABLE `menu_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size_pros`
--
ALTER TABLE `size_pros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_khachhang_foreign` FOREIGN KEY (`id_khachhang`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_id_nhanvien_foreign` FOREIGN KEY (`id_nhanvien`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_donhang_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_id_donhang_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `orders` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_id_danhmuc_foreign` FOREIGN KEY (`id_danhmuc`) REFERENCES `menu_posts` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_loaisanpham_foreign` FOREIGN KEY (`id_loaisanpham`) REFERENCES `categories` (`id`);

--
-- Constraints for table `size_pros`
--
ALTER TABLE `size_pros`
  ADD CONSTRAINT `size_pros_id_pro_foreign` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `size_pros_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
