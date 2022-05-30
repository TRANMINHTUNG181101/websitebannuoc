-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2022 lúc 02:29 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_nuoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `tenloai`, `slug`, `mota`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê', 'ca-phe', 'cà phê', 'ca-phe14.png', 1, NULL, NULL),
(2, 'Trà Trái Cây', 'tra-trai-cay', 'trà trái cây', 'tra-trai-cay62.png', 1, NULL, NULL),
(3, 'Đá Xay', 'da-xay', 'đá xay', 'da-xay70.png', 1, NULL, NULL),
(4, 'Thưởng Thức Tại Nhà', 'thuong-thuc-tai-nha', 'thưởng thức tại nhà', 'thuong-thuc-tai-nha33.png', 1, NULL, NULL),
(5, 'Bánh - Snacks', 'banh-snacks', 'Bánh', 'banh-snacks30.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaybl` datetime NOT NULL,
  `id_sanpham` int(10) UNSIGNED DEFAULT NULL,
  `id_baiviet` int(10) UNSIGNED DEFAULT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `noidung`, `ngaybl`, `id_sanpham`, `id_baiviet`, `id_khachhang`, `parent_id`, `type`, `trangthai`, `created_at`, `updated_at`) VALUES
(66, '122334', '2022-03-13 14:52:13', NULL, 1, 2, 0, 'post', 1, '2022-03-13 00:52:13', '2022-03-13 00:52:13'),
(67, '55555555', '2022-03-13 14:52:25', NULL, 1, 2, 66, 'post', 1, '2022-03-13 00:52:25', '2022-03-13 00:52:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
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
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `ten`, `sodienthoai`, `diachi`, `email`, `password`, `id_social`, `type_social`, `token`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'Trí Phan', '0334202221', 'Bến lức long an', 'phanminhtri11800@gmail.com', '$2y$10$x0t/rsxDwxfk7wju/ezEbeHmSqL/SzEUL7qoxFasbe4linzVHYkru', '112318135447223833110', 'google', NULL, 1, '2022-02-19 00:14:45', '2022-03-13 01:00:23'),
(6, 'Trí Minh Minh', '0334202222', 'TP HỒ CHÍ MINH', '0306181377@caothang.edu.vn', '$2y$10$ee.KsT3Hfir7UYWI3KXdaegXlmFbdKofbw6DRy7uPS5aiT9RcxhFK', NULL, NULL, NULL, 1, '2022-03-12 20:57:46', '2022-03-12 21:01:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `materials`
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
-- Cấu trúc bảng cho bảng `material_units`
--

CREATE TABLE `material_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_don_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `material_units`
--

INSERT INTO `material_units` (`id`, `ten_don_vi`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'ký', 1, NULL, NULL),
(2, 'Lon', 1, NULL, NULL),
(3, 'cái', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_posts`
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
-- Đang đổ dữ liệu cho bảng `menu_posts`
--

INSERT INTO `menu_posts` (`id`, `tendanhmuc`, `slug`, `mota`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê', 'ca-phe', 'cà phê', NULL, 1, NULL, NULL),
(2, 'Sự Kiện', 'su-kien', 'sự kiện', NULL, 1, NULL, NULL),
(3, 'Khuyến Mãi', 'khuyen-mai', 'khuyến mãi', NULL, 1, NULL, NULL),
(4, 'Tin Tức', 'tin-tuc', 'tin tức', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
-- Cấu trúc bảng cho bảng `orders`
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
  `trangthaithanhtoan` int(11) NOT NULL DEFAULT 2,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `madh`, `hoten`, `diachi`, `email`, `ghichu`, `dienthoai`, `id_nhanvien`, `id_khachhang`, `httt`, `ngaytao`, `tongtien`, `trangthaithanhtoan`, `trangthai`, `created_at`, `updated_at`) VALUES
(42, 'OD37459', 'Trí Phan Minh 12', 'Bến lức long an', 'phanminhtri11800@gmail.com', NULL, '0334202221', NULL, 2, 2, '2022-03-13 13:36:14', 50000, 2, 3, '2022-03-12 23:38:00', '2022-03-13 00:07:16'),
(43, 'DR80565', 'Trí Phan Minh 12', 'Bến lức long an', 'phanminhtri11800@gmail.com', NULL, '0334202221', NULL, 2, 2, '2022-03-13 14:56:05', 55000, 1, 1, '2022-03-13 00:56:27', '2022-03-13 00:56:27'),
(44, 'RD61102', 'Trí Phan Minh 12', 'Bến lức long an', 'phanminhtri11800@gmail.com', NULL, '0334202221', NULL, 2, 2, '2022-03-13 14:57:50', 32000, 2, 3, '2022-03-13 00:59:25', '2022-03-21 18:58:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
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
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_donhang`, `id_sanpham`, `id_size`, `soluong`, `giaban`, `created_at`, `updated_at`) VALUES
(47, 42, 3, 2, 1, 50000, '2022-03-12 23:38:00', '2022-03-12 23:38:00'),
(48, 43, 1, 1, 1, 20000, '2022-03-13 00:56:27', '2022-03-13 00:56:27'),
(49, 43, 8, 3, 1, 35000, '2022-03-13 00:56:27', '2022-03-13 00:56:27'),
(50, 44, 6, 2, 1, 32000, '2022-03-13 00:59:25', '2022-03-13 00:59:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
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
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `mancc`, `loaithanhtoan`, `sohoadon`, `magiaodichBank`, `magiaodich`, `noidung`, `id_donhang`, `ngaythanhtoan`, `tongtien`, `trangthai`, `created_at`, `updated_at`) VALUES
(17, 'MOMO', 'qr', '1647153374', NULL, '2649393230', 'Thanh toán qua MoMo', 42, '1647153476753', 50000, 1, '2022-03-12 23:38:00', '2022-03-12 23:38:00'),
(18, 'MOMO', 'qr', '1647158165', NULL, '2649393418', 'Thanh toán qua MoMo', 43, '1647158183427', 55000, 1, '2022-03-13 00:56:27', '2022-03-13 00:56:27'),
(19, 'MOMO', 'qr', '1647158270', NULL, '2649393447', 'Thanh toán qua MoMo', 44, '1647158361301', 32000, 1, '2022-03-13 00:59:25', '2022-03-13 00:59:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `posts`
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

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `tieude`, `slug`, `noidung`, `hinhanh`, `id_danhmuc`, `hot`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '\"DỌN\" BEAN NĂM CŨ - ĐÓN KHỞI ĐẦU SUNG', 'don-dep', '<p>Đến hẹn lại l&ecirc;n, bean năm cũ bạn t&iacute;ch lũy từ 01/03 - 30/06/2021 được bao nhi&ecirc;u rồi n&egrave;? The Coffee House nhắn nhỏ bean sẽ hết hạn v&agrave;o ng&agrave;y 28.02 n&agrave;y đ&oacute;.</p>\n\n<p><br />\nNhanh nhanh c&ugrave;ng The Coffee House mở app dọn bean năm cũ v&agrave; đ&oacute;n năm mới sung với loạt ưu đ&atilde;i hấp dẫn nh&eacute;:</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/02/SOCIAL.jpg\" /></p>\n\n<p>- Miễn ph&iacute; 1 C&agrave; ph&ecirc; Việt Nam</p>\n\n<p>- Miễn ph&iacute; 1 Tr&agrave; Tr&aacute;i c&acirc;y</p>\n\n<p>- Miễn ph&iacute; 1 Tr&agrave; sữa</p>\n\n<p>- Miễn ph&iacute; 1 Tr&agrave; sữa &Ocirc; Long nướng Tr&acirc;n ch&acirc;u</p>\n\n<p>- Miễn ph&iacute; 1 Hồng tr&agrave; sữa Tr&acirc;n ch&acirc;u</p>\n\n<p>- Cash voucher 10k- Cash voucher 20k</p>\n\n<p>- C&ugrave;ng rất nhiều voucher kh&aacute;c đến từ PNJ, Flower Store,...</p>\n\n<p><br />\n<strong><em>Mở app &quot;dọn&quot; bean liền tay n&agrave;o bạn ơi!</em></strong></p>\n', 'post1.jpg', 1, 1, 1, NULL, NULL),
(2, 'GHÉ THE COFFEE HOUSE CHUYỆN TRÒ, CÓ QUÀ TRAO TAY', 'ghe-the', '<p>Thưởng thức m&oacute;n y&ecirc;u th&iacute;ch, chuyện tr&ograve; r&ocirc;m rả th&ocirc;i chưa đủ, m&igrave;nh gh&eacute; Nh&agrave; m&agrave; c&oacute; th&ecirc;m qu&agrave; ng&agrave;y c&agrave;ng th&ecirc;m vui<br />\nTừ ng&agrave;y 07.02 đến hết ng&agrave;y 28.02, Nh&agrave; tặng bạn 1 lon c&agrave; ph&ecirc; sữa đ&aacute; tiện lợi, thơm ngon, đ&uacute;ng gu bạn th&iacute;ch khi hẹn h&ograve; n&egrave;.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/02/FB--19--1.jpg\" /></p>\n\n<p><br />\nGh&eacute; Nh&agrave; ngay, nhận qu&agrave; liền tay!</p>\n\n<p><strong>-------------</strong></p>\n\n<p><strong>Đặt h&agrave;ng ngay c&ugrave;ng Nh&agrave;</strong></p>\n\n<p>👉Web: https://order.thecoffeehouse.com/</p>\n\n<p>👉App The Coffee House: https://tchapp.page.link/installv5</p>\n\n<p>👉Số điện thoại: 18006936</p>\n\n<p><em>Danh s&aacute;ch hoạt động của c&aacute;c cửa h&agrave;ng trong hệ thống The Coffee House sẽ được update li&ecirc;n tục, bạn c&oacute; thể theo d&otilde;i tại đ&acirc;y:<a href=\"https://bit.ly/3Epaotz?fbclid=IwAR3il5EhQWeE37QUBQgerv45Bxm09Pa1VDhSuBnzQtdC1ncM3eWWGkCcRJE\">&nbsp;https://bit.ly/3Epaotz</a></em></p>\n\n<ul>\n	<li>The Coffee House lu&ocirc;n tu&acirc;n thủ về an to&agrave;n ph&ograve;ng dịch</li>\n	<li>Nh&acirc;n vi&ecirc;n của The Coffee House nghi&ecirc;m t&uacute;c thực hiện 5K trong suốt qu&aacute; tr&igrave;nh hoạt động</li>\n	<li>Thời gian giao h&agrave;ng c&oacute; thể k&eacute;o d&agrave;i hơn th&ocirc;ng thường do hạn chế về t&agrave;i xế v&agrave; quy định ph&ograve;ng dịch của ch&iacute;nh phủ, mong c&aacute;c bạn th&ocirc;ng cảm v&agrave; cảm ơn c&aacute;c bạn đ&atilde; đồng h&agrave;nh c&ugrave;ng The Coffee House.</li>\n</ul>\n', 'post2.jpg', 1, 1, 1, NULL, NULL),
(3, 'CÒN “MÙNG” LÀ CÒN TẾT - THE COFFEE HOUSE LÌ XÌ NƯỚC NGON ĐỒNG GIÁ 39K', 'con-mung-con-tet', '<p>Ai bảo hết 3 m&ugrave;ng l&agrave; hết Tết, c&ograve;n m&ugrave;ng l&agrave; c&ograve;n Tết, c&ograve;n Tết l&agrave; c&ograve;n l&igrave; x&igrave; đ&uacute;ng kh&ocirc;ng n&egrave;. Vậy th&igrave; ngại g&igrave; kh&ocirc;ng nhận l&igrave; x&igrave; từ The Coffee House.</p>\n\n<p>Từ ng&agrave;y&nbsp;<strong>09/02 - 11/02,&nbsp;</strong>The Coffee House mời bạn ưu đ&atilde;i đồng gi&aacute; 39K để team m&igrave;nh vui cả ng&agrave;y kh&ocirc;ng ngớt.</p>\n\n<p><a href=\"https://order.thecoffeehouse.com/product-listing\">ĐẶT H&Agrave;NG NGAY</a></p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/02/FB--16--1.jpg\" /></p>\n\n<p>Deal chớp nho&aacute;ng, đặt nước ngon liền tay!</p>\n\n<p><strong>-------------</strong><br />\n<strong>Đặt h&agrave;ng ngay</strong><br />\n👉Web: https://order.thecoffeehouse.com/<br />\n👉App The Coffee House: https://tchapp.page.link/installv5<br />\n👉Số điện thoại: 18006936</p>\n\n<p><em>- Đồng gi&aacute; 39K cho tất cả c&aacute;c sản phẩm Tr&agrave; tr&aacute;i c&acirc;y, Tr&agrave; sữa, Sinh tố đ&aacute; xay<br />\n- Ưu đ&atilde;i kh&ocirc;ng &aacute;p dụng cho topping, b&aacute;nh, snack<br />\n- &Aacute;p dụng dịch vụ giao h&agrave;ng<br />\n- Ưu đ&atilde;i &aacute;p dụng duy nhất 03 ng&agrave;y 09,10,11 th&aacute;ng 2<br />\n- Kh&ocirc;ng &aacute;p dụng cho chương tr&igrave;nh khuyến m&atilde;i song song<br />\n- Số lượng ưu đ&atilde;i c&oacute; hạn</em></p>\n\n<p><em>Danh s&aacute;ch hoạt động của c&aacute;c cửa h&agrave;ng trong hệ thống The Coffee House sẽ được update li&ecirc;n tục, bạn c&oacute; thể theo d&otilde;i tại đ&acirc;y:<a href=\"https://bit.ly/3Epaotz?fbclid=IwAR3il5EhQWeE37QUBQgerv45Bxm09Pa1VDhSuBnzQtdC1ncM3eWWGkCcRJE\">&nbsp;https://bit.ly/3Epaotz</a></em></p>\n\n<ul>\n	<li>The Coffee House lu&ocirc;n tu&acirc;n thủ về an to&agrave;n ph&ograve;ng dịch</li>\n	<li>Nh&acirc;n vi&ecirc;n của The Coffee House nghi&ecirc;m t&uacute;c thực hiện 5K trong suốt qu&aacute; tr&igrave;nh hoạt động</li>\n	<li>Thời gian giao h&agrave;ng c&oacute; thể k&eacute;o d&agrave;i hơn th&ocirc;ng thường do hạn chế về t&agrave;i xế v&agrave; quy định ph&ograve;ng dịch của ch&iacute;nh phủ, mong c&aacute;c bạn th&ocirc;ng cảm v&agrave; cảm ơn c&aacute;c bạn đ&atilde; đồng h&agrave;nh c&ugrave;ng The Coffee House.</li>\n</ul>\n', 'post3.jpg', 1, 0, 1, NULL, NULL),
(4, 'VUI LỄ HỘI - NHÀ TẶNG QUÀ CÓ ĐÔI', 'vui-le-hoi', '<p>Từ 01.02 đến hết 28.02, Nh&agrave; tặng bạn ưu đ&atilde;i MUA 1 TẶNG 1 khi mua bộ sưu tập qu&agrave; tặng đặc biệt đến từ The Coffee House. &nbsp;Một cho bạn, một d&agrave;nh cho người thương, để m&ugrave;a Valentine năm nay th&ecirc;m gắn kết ngọt ng&agrave;o bạn nh&eacute;.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/01/FB--11--4.jpg\" /></p>\n\n<p><br />\n💕 B&igrave;nh giữ nhiệt Inox Quả Dứa/ Con Thuyền</p>\n\n<p>💕 Ly Farm to Cup Cao/ Thấp</p>\n\n<p>💕 Ly Inox Ống H&uacute;t Xanh Biển</p>\n\n<p>💕 Ly Inox Ống H&uacute;t Hồng Xanh/ Đen Nh&aacute;m</p>\n\n<p>💕 Ly Nhựa 2 Lớp Con Thuyền/ Quả Dứa</p>\n\n<p>💕 Ống h&uacute;t Inox c&aacute;c loại</p>\n\n<p>💕 Cốc sứ The Coffee House c&aacute;c loại</p>\n\n<p>💕 T&uacute;i Canvas c&aacute;c loại<br />\nChọn qu&agrave; ngay c&ugrave;ng Nh&agrave;</p>\n\n<p>-------------</p>\n\n<p>Đặt h&agrave;ng ngay c&ugrave;ng Nh&agrave;</p>\n\n<p>👉Web: https://order.thecoffeehouse.com/</p>\n\n<p>👉App The Coffee House: https://tchapp.page.link/installv5</p>\n\n<p>👉Số điện thoại: 18006936</p>\n\n<ul>\n	<li><em>Chương tr&igrave;nh tặng &aacute;p dụng cho sản phẩm c&oacute; gi&aacute; trị bằng hoặc nhỏ hơn khi mua trực tiếp tại cửa h&agrave;ng.</em></li>\n	<li><em>Ưu đ&atilde;i chỉ &aacute;p dụng cho đơn h&agrave;ng từ 01/02 đến hết ng&agrave;y 28/02/2022.</em></li>\n	<li><em>Kh&ocirc;ng &aacute;p dụng cho c&aacute;c chương tr&igrave;nh khuyến m&atilde;i song song.</em></li>\n	<li><em>Số lượng ưu đ&atilde;i c&oacute; hạn, c&oacute; thể sẽ kết th&uacute;c sớm hơn dự kiến.</em></li>\n</ul>\n\n<p><em>Danh s&aacute;ch hoạt động của c&aacute;c cửa h&agrave;ng trong hệ thống The Coffee House sẽ được update li&ecirc;n tục, bạn c&oacute; thể theo d&otilde;i tại đ&acirc;y:<a href=\"https://bit.ly/3Epaotz?fbclid=IwAR3il5EhQWeE37QUBQgerv45Bxm09Pa1VDhSuBnzQtdC1ncM3eWWGkCcRJE\">&nbsp;https://bit.ly/3Epaotz</a></em></p>\n\n<ul>\n	<li>The Coffee House lu&ocirc;n tu&acirc;n thủ về an to&agrave;n ph&ograve;ng dịch</li>\n	<li>Nh&acirc;n vi&ecirc;n của The Coffee House nghi&ecirc;m t&uacute;c thực hiện 5K trong suốt qu&aacute; tr&igrave;nh hoạt động</li>\n	<li>Thời gian giao h&agrave;ng c&oacute; thể k&eacute;o d&agrave;i hơn th&ocirc;ng thường do hạn chế về t&agrave;i xế v&agrave; quy định ph&ograve;ng dịch của ch&iacute;nh phủ, mong c&aacute;c bạn th&ocirc;ng cảm v&agrave; cảm ơn c&aacute;c bạn đ&atilde; đồng h&agrave;nh c&ugrave;ng The Coffee House.</li>\n</ul>\n', 'post4.jpg', 1, 0, 1, NULL, NULL),
(5, 'BỘ 3 “KHỞI ĐẦU SUNG” SUM VẦY – SUNG SỨC – SUNG TÚC CẢ NĂM', 'bo-3-khoi-dau', '<p><strong><em><strong>Chia tay năm cũ với những nốt trầm, Tết n&agrave;y h&atilde;y c&ugrave;ng The Coffee House nạp cho m&igrave;nh 3 &ldquo;Sung&rdquo; để bắt đầu một năm Hổ đầy năng lượng, m&atilde;nh liệt v&agrave; đủ sức bứt ph&aacute;.</strong></em></strong></p>\n\n<p>Trải qua một năm 2021 với những nốt trầm kh&oacute; qu&ecirc;n, ai cũng th&ecirc;m tr&acirc;n trọng từng khoảnh khắc cuộc sống. Được g&igrave; v&agrave; mất g&igrave; m&igrave;nh để lại cho năm cũ nh&eacute;, năm mới đến h&atilde;y c&ugrave;ng Nh&agrave; đ&oacute;n một c&aacute;i Tết con Hổ thật &ldquo;b&ugrave;ng nổ&rdquo;. Đặc biệt phải trọn vẹn hơn cả về sức khỏe, t&igrave;nh cảm gia đ&igrave;nh v&agrave; sự thịnh vượng. V&agrave; đừng qu&ecirc;n khởi động năm mới thật sung, thật năng lượng với bộ 3 khởi đầu &quot;Sung&quot; tại The Coffee House bạn nh&eacute;!</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/01/Noti_Khoidausung.jpg\" /></p>\n\n<p><strong>Tr&agrave; Sen Nh&atilde;n Sum Vầy</strong><br />\nNhững ng&agrave;y Tết c&ograve;n hạnh ph&uacute;c n&agrave;o hơn l&agrave; khi được trở về nh&agrave;, đ&oacute;n năm mới c&ugrave;ng gia đ&igrave;nh, nh&igrave;n những người th&acirc;n y&ecirc;u qu&acirc;y quần, sum họp. Một c&aacute;i Tết thật an vui, thật đầm ấm v&agrave; rộn r&atilde; y&ecirc;u thương l&agrave; niềm mong mỏi của bất kỳ ai. Tết 2022 Nh&agrave; ra mắt sản phẩm mới với t&ecirc;n gọi Tr&agrave; Sen Nh&atilde;n Sum Vầy, hy vọng bạn c&oacute; thể kề cạnh người th&acirc;n, c&ugrave;ng thưởng thức một hương vị ng&agrave;y Tết tươi m&aacute;t, đặc sắc v&agrave; hứng khởi.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/01/tra-sen-nhan-sum-vay.jpg\" /></p>\n\n<p>Tr&agrave; Sen Nh&atilde;n Sum Vầy với vị thanh m&aacute;t, ngọt dịu d&agrave;ng. Nh&atilde;n tươi ngọt, sen b&eacute;o b&ugrave;i, đem lại một cảm nhận thật sảng kho&aacute;i. Chắc chắn đ&acirc;y sẽ l&agrave; chọn lựa ưng &yacute; của bạn trong dịp Tết n&agrave;y.</p>\n\n<p><strong>Tr&agrave; Dưa Đ&agrave;o Sung T&uacute;c</strong><br />\nNăm mới ngo&agrave;i b&igrave;nh an, ngo&agrave;i sum vầy, The Coffee House c&ograve;n mong ch&uacute;c sự sung t&uacute;c sẽ đến với mọi nh&agrave;. Hy vọng những kh&oacute; khăn sẽ đi qua, một cuộc sống sung t&uacute;c hơn sẽ đến, để bạn kh&ocirc;ng c&ograve;n qu&aacute; nhiều những bận l&ograve;ng, kh&ocirc;ng c&ograve;n nhiều những ch&ecirc;nh v&ecirc;nh.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/01/tra-dua-dao-sung-tuc-min.jpg\" /></p>\n\n<p>Tr&agrave; Dưa Đ&agrave;o Sung T&uacute;c g&oacute;p mặt trong thực đơn ng&agrave;y Tết chắc chắn sẽ đem đến cho bạn, gia đ&igrave;nh v&agrave; bạn b&egrave; một cảm gi&aacute;c thật tươi mới, m&aacute;t l&agrave;nh. Cả dưa lưới v&agrave; đ&agrave;o tươi đều sở hữu vị thơm ngọt v&agrave; m&agrave;u v&agrave;ng tươi r&oacute;i, cho bạn một ấn tượng thật đặc biệt nh&acirc;n ng&agrave;y đầu năm. Gi&uacute;p kh&ocirc;ng kh&iacute; th&ecirc;m rộn r&atilde;, c&agrave;ng tươi vui v&agrave; phấn khởi trong giai điệu của những ng&agrave;y xu&acirc;n. Cụng ly Tr&agrave; Dưa Đ&agrave;o Sung T&uacute;c của The Coffee House để rước lộc đầu năm bạn nh&eacute;!</p>\n\n<p><strong>Tr&agrave; Sữa Sung Sức (Masala Chai)</strong><br />\nNăm Hổ, biểu tượng của sức mạnh, sự m&atilde;nh liệt. Tr&agrave; Sữa Sung Sức Masala Chai với vị tr&agrave; sữa ngọt ngọt, cay cay, b&eacute;o b&eacute;o v&agrave; nồng n&agrave;n như một m&oacute;n qu&agrave; tặng đặc biệt m&agrave; The Coffee House đưa đến để c&ugrave;ng bạn tăng th&ecirc;m sức lực. Nh&agrave; ch&uacute;c bạn sẽ mạnh mẽ, ki&ecirc;n cường, căng tr&agrave;n sức sống v&agrave; khẳng định được &ldquo;đẳng cấp chiến binh&rdquo; trong năm mới n&agrave;y.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2022/01/Tra-sua-sung-tuc-min.jpg\" /></p>\n\n<p>&ldquo;Bộ ba&rdquo; Tr&agrave; Sen Nh&atilde;n Sum Vầy, Tr&agrave; Dưa Đ&agrave;o Sung Sức, Tr&agrave; Sữa Sung T&uacute;c (Masala Chai) ch&iacute;nh l&agrave; một khởi đầu năm mới tr&agrave;n đầy niềm tin v&agrave; hy vọng m&agrave; The Coffee House muốn trao gửi đến bạn. Nạp th&ecirc;m những nguồn năng lượng m&atilde;nh liệt n&agrave;y để sẵn s&agrave;ng b&ugrave;ng nổ trong năm mới, đ&oacute;n may mắn, b&igrave;nh an v&agrave; một cuộc sống tươi hồng nh&eacute;.<br />\n<em>Vậy n&ecirc;n, Tết đ&atilde; đến c&ugrave;ng thưởng thức menu khai xu&acirc;n cực &ldquo;Sung&rdquo; của The Coffee House để bắt đầu năm Hổ 2022 thật tưng bừng, b&ugrave;ng ch&aacute;y v&agrave; rực rỡ hơn!</em></p>\n', 'post5.jpg', 2, 1, 1, NULL, NULL),
(6, 'HẠT CÀ PHÊ ROBUSTA & NHỮNG ĐIỀU THÚ VỊ CÓ THỂ BẠN CHƯA BIẾT', 'hat-ca-phe', '<p>Mỗi loại c&agrave; ph&ecirc; mỗi c&aacute; t&iacute;nh v&agrave; trải nghiệm kh&aacute;c biệt. Tại The Coffee House chất nguy&ecirc;n bản được giữ trọn vẹn để bạn c&oacute; thể thưởng thức hương vị c&agrave; ph&ecirc; đ&iacute;ch thực.<br />\nGần đ&acirc;y gh&eacute; The Coffee House chắc bạn cũng đ&atilde; được nghe v&agrave; thưởng thức hương vị đặc biệt từ hạt c&agrave; ph&ecirc; Robusta Đắk Lắk vậy bạn c&oacute; bao giờ t&ograve; m&ograve; về loại hạt n&agrave;y kh&ocirc;ng?</p>\n\n<p>Để đến được tay bạn, hạt c&agrave; ph&ecirc; tại The Coffee House đ&atilde; trải qua qu&aacute; tr&igrave;nh thử th&aacute;ch chặt chẽ về chất lượng: vun trồng, chăm s&oacute;c, chọn lọc tr&aacute;i ch&iacute;n đỏ theo phương ph&aacute;p thủ c&ocirc;ng, rang xay v&agrave; pha chế để chắt chiu những tinh chất c&agrave; ph&ecirc; đậm đ&agrave;, đượm vị</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2021/11/HERO--1--min.jpg\" /></p>\n\n<p>Bạn c&oacute; thể dễ d&agrave;ng nhận biết Robusta bằng những đặc điểm như: &nbsp;hạt tr&ograve;n v&agrave; nhỏ, r&atilde;nh giữa thường d&aacute;ng thẳng. Hạt thường c&oacute; m&agrave;u đậm, với h&agrave;m lượng caffeine từ 2 - 4% nhiều hơn gần gấp đ&ocirc;i so với hạt Arabica. Đ&acirc;y cũng l&agrave; loại hạt được trồng nhiều tại nước ta.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2021/11/CFVN-min.jpg\" /></p>\n\n<p>Với hương vị đặc trưng, Robusta mang đến cảm gi&aacute;c mạnh mẽ, đậm đ&agrave; v&agrave; vị đắng tinh tế khi thưởng thức.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2021/11/B--3-min.jpg\" /></p>\n\n<p>Bộ sản phẩm c&agrave; ph&ecirc; Việt phi&ecirc;n bản mới được tạo n&ecirc;n từ hạt Robusta Đắk Lắk, được fans Nh&agrave; y&ecirc;u th&iacute;ch nhờ hương vị đậm đ&agrave; truyền thống.</p>\n\n<p><img src=\"https://feed.thecoffeehouse.com//content/images/2021/11/1.jpg\" /></p>\n\n<p>C&agrave; ph&ecirc; tại nh&agrave; nhưng vẫn ngon như tại qu&aacute;n, Nh&agrave; c&oacute; Original 1 gi&uacute;p bạn thưởng thức trọn vẹn hương vị đặc trưng từ hạt c&agrave; ph&ecirc; Robusta Đắk Lắk.</p>\n', 'post6.jpg', 2, 0, 1, NULL, NULL),
(7, 'Nghệ thuật pha chế -V60', 'nghe-thuat-da-che', '<p><em><strong>THE SHAPE OF NATURE</strong></em><br />\nĐ&uacute;ng với t&ecirc;n gọi, V60 mang h&igrave;nh d&aacute;ng một Vector với g&oacute;c 60 độ. Vector n&agrave;y được tạo n&ecirc;n từ parabol &quot;chuẩn&quot; y = x&sup2; xuất hiện rất nhiều trong cuộc sống h&agrave;ng ng&agrave;y.V&igrave; vậy b&igrave;nh V60 được mệnh danh l&agrave; Thiết kế của Tự nhi&ecirc;n - The shape of Nature<br />\n<img alt=\"img_8089_grande\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8089_grande.jpg\" /><br />\n<em><strong>Step 1 - Đặt giấy lọc v&agrave;o V60</strong></em><br />\nSau đ&oacute; tr&aacute;ng qua nước s&ocirc;i để khử đi m&ugrave;i của giấy lọc, đồng thời l&agrave;m n&oacute;ng dripper v&agrave; server.<br />\n<em><strong>Step 2 - C&acirc;n v&agrave; xay hạt c&agrave; ph&ecirc;</strong></em><br />\nV60 th&iacute;ch hợp với c&aacute;ch rang s&aacute;ng m&agrave;u, mang lại nhiều hương vị tr&aacute;i c&acirc;y, hoa. Những hạt c&agrave; ph&ecirc; nổi tiếng tr&ecirc;n thế giới như ở Kenya, Ethiopia,&hellip; sẽ c&oacute; hương vị tốt nhất khi pha với c&aacute;ch pha n&agrave;y.<br />\n<em><strong>Step 3 - Sẵn s&agrave;ng pha chế</strong></em><br />\nCho bột c&agrave; ph&ecirc; vừa xay v&agrave;o phễu v&agrave; đặt V60 l&ecirc;n gi&aacute; đỡ hoặc b&igrave;nh.<br />\n<img alt=\"img_8142_grande\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8142_grande.jpg\" /><br />\n<em><strong>Step 4 - Pour over</strong></em><br />\nPour over (&quot;đổ nước&quot;) theo từng đợt, chậm, đều tay theo h&igrave;nh xoắn ốc từ t&acirc;m ra ngo&agrave;i để đảm bảo to&agrave;n bộ bột c&agrave; ph&ecirc; thấm đều nước s&ocirc;i.<br />\n&bull; Đợt đầu ti&ecirc;n l&agrave; để c&agrave; ph&ecirc; bloom (&ldquo;nở&rdquo;). Bạn c&oacute; thể dễ d&agrave;ng quan s&aacute;t thấy c&agrave; ph&ecirc; c&oacute; những b&oacute;ng kh&iacute; C02 xuất hiện tho&aacute;t ra ngo&agrave;i.<br />\n<img alt=\"img_8149_grande\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8149_grande.jpg\" /><br />\n&bull; Tiếp tục pour over trong khoảng 2 ph&uacute;t. Một lần pha tốt th&igrave; bề mặt c&agrave; ph&ecirc; sẽ hơi nh&ocirc; l&ecirc;n một ch&uacute;t ở t&acirc;m v&agrave; th&agrave;nh phễu kh&ocirc;ng bị d&iacute;nh qu&aacute; nhiều bột c&agrave; ph&ecirc;.<br />\n<img alt=\"img_8149_grande-1\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8149_grande-1.jpg\" /><br />\nSau thời gian n&agrave;y, c&agrave; ph&ecirc; sẽ mất khoảng 30s để chảy hết<br />\n<img alt=\"img_8153_grande\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8153_grande.jpg\" /><br />\nV60 ho&agrave;n to&agrave;n kh&ocirc;ng &ldquo;dễ chiều&rdquo;. Để khai th&aacute;c trọn vẹn phẩm chất của c&agrave; ph&ecirc;, đ&ograve;i hỏi Barista của The Coffee House phải đ&aacute;p ứng những kỹ thuật nhất định. V&igrave; c&agrave; ph&ecirc; rất dễ bị tắc ở phần đ&aacute;y dẫn đến bị over (tắc) nếu pour (r&oacute;t) kh&ocirc;ng cẩn thận.<br />\n<img alt=\"img_8166_grande\" src=\"https://feed.thecoffeehouse.com//content/images/2021/08/img_8166_grande.jpg\" /></p>\n', 'post7.jpg', 4, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `tensp`, `slug`, `mota`, `hinhanh`, `noidung`, `id_loaisanpham`, `giaban`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê Sữa Nóng', 'ca-phe-sua-nong', 'Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 'ca-phe-nong59.jpg', 'Cà phê sữa nóng - Sự độc đáo trong thưởng thức cà phê của người Việt\r\n\r\nCà phê phin kết hợp cùng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.\r\n\r\nKhi người Pháp đem văn hóa cà phê vào Việt Nam, người bản xứ thay thế sữa tươi đắt đỏ bằng sữa đặc rẻ tiền hơn để pha cùng cà phê. Tuy nhiên, bằng sự kết hợp hài hòa giữa các thái cực đắng – ngọt, bùi – béo, ly cà phê sữa đá lại sánh đặc và đậm đà hơn, không làm mất đi công dụng của cà phê mà bổ sung thêm năng lượng cho cơ thể từ sữa đã trở thành quen thuộc với nếp sống của người Việt và là một nét sáng tạo riêng, chinh phục được trái tim hàng triệu người yêu cà phê trên thế giới.\r\n\r\nNhà báo Nicola Graydon từng miêu tả và chia sẻ cảm nhận của mình trên tờ nhật báo nổi tiếng của Anh rằng: \"Đó là loại cà phê mạnh, nhỏ giọt từ một phin kim loại nhỏ, bên dưới ly chứa khoảng ¼ lượng sữa đặc. Sau khoảng 15 phút, khi café ngừng nhỏ giọt, bạn sẽ khuấy đều và cho đá vào. Đầu tiên, tôi không chịu được cái ngọt kiểu như vậy. Tuy nhiên sau 3 ngày, tôi bị khuất phục và nghiện cái ngọt “thần thánh” ấy. Thật tuyệt vời khi cảm nhận cái ngọt thanh mát trong cuống họng, điều mà chúng ta không thấy ở một ly latte cổ điển”.\r\n\r\nCũng có người đã miêu tả Cà phê sữa rằng: Cà phê thì đắng mà sữa lại quá ngọt ngào. Hai vị đắng - ngọt như hương vị của cuộc sống, nên thưởng thức Cà phê sữa cũng giống như đang thưởng thức cuộc sống.\r\n\r\nVà The Coffee House nghĩ rằng: Chằng có cách nào mô tả chính xác được mùi vị của Cà phê sữa Việt Nam hơn việc tự mình thưởng thức. Còn gì tuyệt vời hơn bắt đầu một ngày mới, trong tiết trời se se lạnh bằng một ly Cà phê sữa nóng thơm lừng và tinh tế đúng không nào!', 1, 20000, 1, NULL, NULL),
(2, 'Americano Nóng', 'amerricano-nong', 'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', 'americano-nong14.jpg', 'Khám phá tách cà phê Americano theo phong cách Mỹ\r\n\r\nAmericano bắt nguồn từ Espresso. Đây là một thức uống truyền thống của Mỹ và đã trở nên quen thuộc với các tín đồ cà phê trên thế giới.\r\n\r\n\r\n\r\nNguồn gốc lịch sử\r\n\r\nCâu chuyện được kể lại rằng trong Thế Chiến Thứ II, những binh sĩ Mỹ đóng quân trên đất Ý đã rơi vào tình trạng \"say bí tỉ\" khi lần đầu tiếp xúc với hương vị Espresso mạnh mẽ vùng bản địa.\r\n\r\nVốn không quen với độ sánh đặc của cà phê nơi đây, họ đã nảy ra ý tưởng thêm nước nóng vào cốc Espresso để làm loãng nó.\r\n\r\nVà từ đó, Americano của người Mỹ (American) ra đời.\r\n\r\nTại The Coffee House, Americano được các nghệ nhân pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.\r\n\r\n\r\n\r\nLợi ích khi thưởng thức cà phê Americano mỗi ngày\r\n\r\nNgoài việc mang đến sự tỉnh táo, linh hoạt cho người uống, Americano còn có thành phần chống oxy hóa nên nếu thưởng thức hằng ngày sẽ giúp ngăn ngừa xơ gan, giảm hen suyễn, lợi tiểu và hỗ trợ chống ung thư.\r\n\r\n\r\n\r\nVậy nên, hãy bắt đầu buổi sáng của mình bằng một tách Cà phê Americano The Coffee House nhé!', 1, 21000, 1, NULL, NULL),
(3, 'Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G', 'ca-phe-da-hoa-tan', 'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.', 'ca-phe-da-hoa-tan56.jpg', 'Khám phá tách cà phê Americano theo phong cách Mỹ\r\n\r\nAmericano bắt nguồn từ Espresso. Đây là một thức uống truyền thống của Mỹ và đã trở nên quen thuộc với các tín đồ cà phê trên thế giới.\r\n\r\n\r\n\r\nNguồn gốc lịch sử\r\n\r\nCâu chuyện được kể lại rằng trong Thế Chiến Thứ II, những binh sĩ Mỹ đóng quân trên đất Ý đã rơi vào tình trạng \"say bí tỉ\" khi lần đầu tiếp xúc với hương vị Espresso mạnh mẽ vùng bản địa.\r\n\r\nVốn không quen với độ sánh đặc của cà phê nơi đây, họ đã nảy ra ý tưởng thêm nước nóng vào cốc Espresso để làm loãng nó.\r\n\r\nVà từ đó, Americano của người Mỹ (American) ra đời.\r\n\r\nTại The Coffee House, Americano được các nghệ nhân pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.\r\n\r\n\r\n\r\nLợi ích khi thưởng thức cà phê Americano mỗi ngày\r\n\r\nNgoài việc mang đến sự tỉnh táo, linh hoạt cho người uống, Americano còn có thành phần chống oxy hóa nên nếu thưởng thức hằng ngày sẽ giúp ngăn ngừa xơ gan, giảm hen suyễn, lợi tiểu và hỗ trợ chống ung thư.\r\n', 4, 50000, 1, NULL, NULL),
(4, 'Cà Phê Sữa Đá', 'ca-phe-sua-da', 'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 'ca-phe-sua-da16.jpg', 'Cà phê sữa đá - Sự độc đáo trong thưởng thức cà phê của người Việt\r\n\r\n\r\n\r\nCà phê phin kết hợp cùng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.\r\n\r\nKhi người Pháp đem văn hóa cà phê vào Việt Nam, người bản xứ thay thế sữa tươi đắt đỏ bằng sữa đặc rẻ tiền hơn để pha cùng cà phê. Tuy nhiên, bằng sự kết hợp hài hòa giữa các thái cực đắng – ngọt, bùi – béo, ly cà phê sữa đá lại sánh đặc và đậm đà hơn, không làm mất đi công dụng của cà phê mà bổ sung thêm năng lượng cho cơ thể từ sữa đã trở thành quen thuộc với nếp sống của người Việt và là một nét sáng tạo riêng, chinh phục được trái tim hàng triệu người yêu cà phê trên thế giới.\r\n\r\nNhà báo Nicola Graydon từng miêu tả và chia sẻ cảm nhận của mình trên tờ nhật báo nổi tiếng của Anh rằng: \"Đó là loại cà phê mạnh, nhỏ giọt từ một phin kim loại nhỏ, bên dưới ly chứa khoảng ¼ lượng sữa đặc. Sau khoảng 15 phút, khi café ngừng nhỏ giọt, bạn sẽ khuấy đều và cho đá vào. Đầu tiên, tôi không chịu được cái ngọt kiểu như vậy. Tuy nhiên sau 3 ngày, tôi bị khuất phục và nghiện cái ngọt “thần thánh” ấy. Thật tuyệt vời khi cảm nhận cái ngọt thanh mát trong cuống họng, điều mà chúng ta không thấy ở một ly latte cổ điển”.\r\n\r\nCũng có người đã miêu tả Cà phê sữa đá rằng: Cà phê thì đắng mà sữa lại quá ngọt ngào. Hai vị đắng - ngọt như hương vị của cuộc sống, nên thưởng thức Cà phê sữa cũng giống như đang thưởng thức cuộc sống.\r\n\r\nVà The Coffee House nghĩ rằng: Chằng có cách nào mô tả chính xác được mùi vị của Cà phê sữa Việt Nam hơn việc tự mình thưởng thức. Còn gì tuyệt vời hơn khi bắt đầu một ngày làm việc tràn đầy năng lượng hay tận hưởng ngày nghỉ của mình bằng một ly Cà phê sữa tinh tế đúng không nào!.\r\n\r\n', 1, 22000, 1, NULL, NULL),
(5, 'Cappuccino Nóng', 'cappuccino-nong', 'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', 'cappuccino-nong1.jpg', 'Cappuchino - Hương vị hoàn hảo làm say đắm mọi giác quan\r\nCappuchino là một thức uống quen thuộc gắn liền với đất nước Ý xinh đẹp và thơ mộng. \r\n\r\nĐây là một loại thức uống được pha chế cầu kỳ và tinh tế. Một tách Cappuchino ngon đúng điệu là sẽ mang hương vị nồng nàn của cà phê Espresso hòa quyện sữa thơm dịu, đi kèm lớp bọt sữa bồng bềnh, béo ngậy.\r\n\r\nBởi chính hương vị thơm ngon cùng nghệ thuật pha chế và tạo hình bọt sữa đầy tinh tế của Barista tại The Coffee House, khi nhấp một ngụm Cappuchino, thực khách sẽ được trải nghiệm một hành trình vị giác đầy mê hoặc. Đó cũng là lý do vì sao Cà phê Cappuchino dễ dàng chinh phục nhiều khách hàng trong những năm qua.\r\n\r\nHãy đặt thử và cho The Coffee House cảm nhận của riêng mình nhé!', 1, 30000, 1, NULL, NULL),
(6, 'Caramel Macchiato Nóng', 'caramel-macchiato-nong', 'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', 'caramel-macchiato-nong4.jpg', 'Caramel Macchiato - Cái nhấp môi ngọt ngào\r\nMỗi cái nhấp môi vào tách Caramel Macchiato sẽ đem đến một sự ngạc nhiên thú vị, vì nhiều hương vị được gói gọn trong một tách cà phê.\r\n\r\nNhững năm trở lại đây, những món đồ uống liên quan đến cụm từ “Macchiato” đều trở thành trào lưu của các tín đồ sành ăn.\r\n\r\nTùy vào sở thích, tâm trạng khác nhau mà chúng ta có những cảm nhận rất riêng. Ở The Coffee House, Caramel Macchiato là một trong món khách hàng ưa thích chọn lựa.\r\n\r\nVậy điều gì đã làm nên thức uống đầy mê hoặc này?\r\n\r\nĐể tạo nên một tách cà phê Caramel Macchiato tuyệt hảo thì yêu cầu bắt buộc phải sử dụng cà phê thượng hạng và nguyên chất. Do đó, The Coffee House luôn đảm bảo chất lượng cà phê từ chọn giống, chăm sóc, sơ chế,… để mang đến cho thực khách sự ngạc nhiên và thỏa mãn vị giác bởi một tách cà phê Caramel Macchiato thơm béo của bọt sữa sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.\r\n\r\nBên cạnh đó, bằng sự điêu luyện và tỉ mỉ của các nghệ nhân pha chế, mỗi tách Caramel Macchiato tại The Coffee House đều thể hiện sự tinh tế, nhẹ nhàng mang đến cảm xúc thăng hoa cho người thưởng thức.\r\n\r\nGiờ thì thử liền một tách Caramel Macchiato ngon đúng điệu đi chứ nhỉ!', 1, 32000, 1, NULL, NULL),
(7, 'Trà Matcha Latte Đá', 'chanh-da-xay', 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte sẽ khiến bạn yêu ngay từ lần đầu tiên.', 'chanh-da-xay65.jpg', 'Matcha Latte – Yêu từ cái nhìn đầu tiên\r\nVới thành phần chính là Matcha quen thuộc vậy Matcha Latte có gì thú vị để có thể khiến bạn yêu từ cái nhìn đầu tiên?\r\n\r\nHương vị vừa quen vừa lạ\r\n\r\nTuy là thức uống được The Coffee House ra mắt từ nhiều năm, nhưng Matcha latte luôn nằm trong Top thức uống được mọi người lựa chọn. Là thức uống được biến tấu độc đáo từ Coffee latte - thức uống kết hợp giữa cà phê và sữa tươi, được thay thế nguyên liệu cà phê bằng nguyên liệu bột trà xanh. Do vậy thức uống này có hàm lượng cafein ít hơn cà phê để phục vụ những khách hàng không thích nạp nhiều cafein vào trong cơ thể. Matcha latte vừa quen vừa lạ với hương thơm trà xanh đặc trưng, quyện cùng lớp sữa béo ngậy, cho từng ngụm tươi mát, khiến các fan matcha sẽ không thể bỏ lỡ.\r\n\r\nThưởng thức Matcha Latte có gì thú vị?\r\n\r\nKhông những có hương vị tuyệt vời, Matcha còn chứa hàm lượng chất chống oxy hóa cao và nguồn caffein tốt cho sức khỏe. Nếu Cappucinno hay Latte có hơi \"quá sức\" đối với bạn, The Coffee House gợi ý bạn nên thử Matcha Latte - Bạn sẽ cảm thấy sảng khoái và tỉnh táo suốt một ngày dài đấy.\r\n\r\nOrder ngay một ly latte cho cả ngày tỉnh táo nhé!', 3, 24000, 1, NULL, NULL),
(8, 'Espresso Đá', 'espresso-da', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', 'espresso-da87.jpg', 'Espresso - Cà phê tinh chất nhất theo phong cách Ý\r\nTạm gác lại những ồn ào nơi phố thị và thử nhâm nhi ly cà phê Espresso hương vị đậm đà, tinh tế của The Coffee House để tận hưởng những khoảnh khắc diệu kỳ của cuộc sống.\r\n\r\nNgười ta vẫn hay ví Espresso là phép màu trong một chiếc tách vì độ quyến rũ không phai của nó.\r\n\r\nMột cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, The Coffee House xay tươi hạt cà phê cho mỗi lần pha.\r\n\r\nLớp bọt khí nhỏ li ti màu nâu nhạt nằm trên cùng của cốc Espresso được gọi là crema. Thời gian để \"bắt\" được lớp crema xốp nhẹ và lâu tan chỉ vỏn vẹn 27 giây, dưới áp suất nước xấp xỉ 9 bar của Macchiana (máy pha Espresso) với nhiệt độ không quá 95°C. Nếu không chính xác, crema của bạn sẽ bị đắng.\r\n\r\nTuy nhiên, không có gì gọi là chuẩn mực, cà phê Espresso cũng thế. Hương vị cuối cùng của Espresso được tạo ra bằng dấu ấn của Barista khi pha chế.\r\n\r\nVì thế mỗi cốc Espresso The Coffee House mang đến cho bạn đều mang một vị ngon rất riêng, không trộn lẫn, không lặp lại.', 1, 35000, 1, NULL, NULL),
(9, 'Latte Đá', 'latte-tao-da', 'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', 'latte-tao-da30.jpg', 'Latte - Sự tinh tế trong hương vị, mùi vị lẫn nhãn quan\r\nKhi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp bọt sữa nhưng mỏng và nhẹ hơn Cappucinno.\r\n\r\nGiống như Cappuchino, Latte cũng được pha chế gồm 3 lớp nguyên liệu chính: Cà phê Espresso, sữa nóng và lớp bọt sữa thơm mịn. Nếu không phải là người sành thưởng thức cà phê, bạn sẽ khó lòng phân biệt được 2 loại cà phê này. Khi pha chế Latte, các Barista thường thể hiện sự sáng tạo hoặc gửi gắm tâm ý của họ đến thực khách thông qua những hình vẽ nghệ thuật và tinh tế. Thực chất, điểm khác biệt giữa Latte và Cappuchino chính là: Lượng bọt sữa của Cappuchino dày hơn so với Latte.\r\n\r\nNgoài ra, Cà phê Latte The Coffee House là một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.\r\n\r\nChọn một tách Latte tinh tế chính là cách giúp bạn có một ngày thêm trọn vẹn, thử ngay nhé!', 1, 23000, 1, NULL, NULL),
(10, 'Latte Táo Lê Quế', 'latte-tao-le', 'Phiên bản Chai Fresh tiện lợi, với thức uống đậm đà, thú vị tuyệt hảo để cùng bạn tận hưởng những ngày cuối năm ấm áp và trọn vẹn.', 'latte-tao-le21.jpg', 'Latte - Sự tinh tế trong hương vị, mùi vị lẫn nhãn quan\r\nKhi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp bọt sữa nhưng mỏng và nhẹ hơn Cappucinno.\r\n\r\nGiống như Cappuchino, Latte cũng được pha chế gồm 3 lớp nguyên liệu chính: Cà phê Espresso, sữa nóng và lớp bọt sữa thơm mịn. Nếu không phải là người sành thưởng thức cà phê, bạn sẽ khó lòng phân biệt được 2 loại cà phê này. Khi pha chế Latte, các Barista thường thể hiện sự sáng tạo hoặc gửi gắm tâm ý của họ đến thực khách thông qua những hình vẽ nghệ thuật và tinh tế. Thực chất, điểm khác biệt giữa Latte và Cappuchino chính là: Lượng bọt sữa của Cappuchino dày hơn so với Latte.\r\n\r\nNgoài ra, Cà phê Latte The Coffee House là một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.\r\n\r\nChọn một tách Latte tinh tế chính là cách giúp bạn có một ngày thêm trọn vẹn, thử ngay nhé!', 1, 29000, 1, NULL, NULL),
(11, 'Mít Sấy', 'mit-say', 'Mít sấy khô vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.', 'mit-say26.jpg', 'Mít sấy - Món ăn vặt không thể bỏ qua khi ghé The Coffee House\r\n\r\n\r\nMón ăn vặt đặc trưng của miền nhiệt đới\r\n\r\nLà một loại quả đặc trưng của miền nhiệt đới, Mít được trồng rất nhiều ở khu vực Đông Nam Á, trong đó có Việt Nam. Mít sấy khô có màu vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.\r\n\r\n\r\n\r\nĂn vặt chứa nhiều Vitamin\r\n\r\nBên cạnh được yêu thích nhờ hương vị hấp dẫn, mít sấy còn là món ăn vặt cung cấp nhiều dinh dưỡng. Trong mít sấy chứa chất xơ, vitamin A, vitamin C, ….giúp cơ thể tăng cường hệ miễn dịch, chống oxy hoá, kiểm soát các bệnh về tim mạch. \r\n\r\n\r\n\r\nMít sấy món ăn vặt không thể thiếu cho những ngày bạn cần một chút ngọt ngào, Order ngay.\r\n\r\n', 5, 60000, 1, NULL, NULL),
(12, 'Mocha Đá', 'mocha-da', 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.', 'mocha-da41.jpg', 'Mocha – Một chút đắng của tình yêu đầu\r\nKhông như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la.\r\n\r\nNgười ta thường ví cà phê như một thức uống kỳ diệu. Chúng không ngọt ngào để nuông chiều cảm xúc của bất kỳ ai nhưng lại mang đến một sự bí ẩn rất cuốn hút, khơi gợi người khác phải khám phá.\r\n\r\nBên cạnh những loại cà phê máy như Espresso, Cappuchino, Latte,… thực khách tại The Coffee House cũng dành nhiều tình cảm cho một loại cà phê khác mang tên Mocha. Mocha là một dạng hỗn hợp giữa cà phê và sô-cô-la nóng. Không như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la. Mùi vị này, hương thơm này tựa như hương vị của một tình yêu chớm nở, vừa có chút vị đắng của Espresso và sự ngọt ngào đầy lôi cuốn.\r\n\r\n Nếu bạn thích socola và cũng nghiện cà phê thì Mocha sẽ là sự lựa chọn hoàn hảo rồi đấy!', 1, 43000, 1, NULL, NULL),
(13, 'Mocha Nóng', 'mocha-nong', 'Loại cà phê được tạo nên từ sự kết hợp hoàn hảo của vị đắng đậm đà của Espresso và sốt sô-cô-la ngọt ngào mang tới hương vị đầy lôi cuốn, đánh thức mọi giác quan nên đây chính là thức uống ưa thích của phụ nữ và giới trẻ.', 'mocha-nong95.jpg', 'Mocha – Một chút đắng của tình yêu đầu\r\nKhông như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la.\r\n\r\nNgười ta thường ví cà phê như một thức uống kỳ diệu. Chúng không ngọt ngào để nuông chiều cảm xúc của bất kỳ ai nhưng lại mang đến một sự bí ẩn rất cuốn hút, khơi gợi người khác phải khám phá.\r\n\r\nBên cạnh những loại cà phê máy như Espresso, Cappuchino, Latte,… thực khách tại The Coffee House cũng dành nhiều tình cảm cho một loại cà phê khác mang tên Mocha. Mocha là một dạng hỗn hợp giữa cà phê và sô-cô-la nóng. Không như cà phê Cappuchino chỉ có một lớp bọt sữa trên bề mặt, cà phê Mocha còn hòa quyện cả vị thơm béo của kem tươi và sốt sô-cô-la. Mùi vị này, hương thơm này tựa như hương vị của một tình yêu chớm nở, vừa có chút vị đắng của Espresso và sự ngọt ngào đầy lôi cuốn.\r\n\r\n Nếu bạn thích socola và cũng nghiện cà phê thì Mocha sẽ là sự lựa chọn hoàn hảo rồi đấy!', 1, 27000, 1, NULL, NULL),
(14, 'Trà Dưa Đào Sung Túc', 'tra-chanh', 'Vị thơm ngọt của Dưa lưới và đào tươi chua chua trên nền trà Oolong cùng lớp foam cheese mỏng nhẹ tạo nên cảm giác sung túc trong mùa xuân mới.', 'tra-chanh69.jpg', 'Dưa Đào Sung Túc - Giai điệu tươi vui cho mùa xuân mới\r\n\r\n\r\nNăm mới ngoài bình an, sum vầy, The Coffee House còn mong chúc sự sung túc sẽ đến với mọi nhà. Hy vọng những khó khăn sẽ đi qua, một cuộc sống sung túc hơn sẽ đến, để bạn không còn quá nhiều những bận lòng, bắt lấy thật nhiều cơ hội và thật SUNG cho năm mới 2022..\r\n\r\n\r\n\r\nTrà Dưa Đào Sung Túc với vị thơm ngọt của Dưa lưới và đào tươi chua chua, ngọt ngọt trên nền trà Oolong trứ danh cùng lớp foam cheese mỏng nhẹ vị mặn mặn tạo nên sự cân bằng cho thức uóng, sẽ đem đến cho bạn, gia đình và bạn bè những giai điệu tươi vui, thịnh vượng cho mùa xuân mới.  \r\n\r\n\r\n\r\nDưa Đào Sung Túc của The Coffee House sẽ là đại diện chúc cho năm mới khởi đầu đầy thuận lợi, các chiến hữu sẽ vẫn sát cánh bên nhau thật “sung”. Đặc biệt là đong đầy lộc lá và thật “son” trong năm mới. Cụng ly Dưa Đào Sung Túc của The Coffee House để không khí thêm rộn ràng, khởi đầu sung túc và rước lộc đầu năm bạn nhé!', 2, 22000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Nhỏ', 1, NULL, NULL),
(2, 'Vừa', 1, NULL, NULL),
(3, 'Lớn', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_pros`
--

CREATE TABLE `size_pros` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pro` int(10) UNSIGNED NOT NULL,
  `id_size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size_pros`
--

INSERT INTO `size_pros` (`id`, `id_pro`, `id_size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 5, 2, NULL, NULL),
(9, 6, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 7, 2, NULL, NULL),
(12, 10, 2, NULL, NULL),
(13, 8, 1, NULL, NULL),
(14, 8, 3, NULL, NULL),
(15, 9, 2, NULL, NULL),
(16, 11, 2, NULL, NULL),
(17, 12, 2, NULL, NULL),
(18, 13, 2, NULL, NULL),
(19, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$10$Az2nV8LaeHELgVdlV23KUu2Lr8Z7lY4k8nk0QQgwHmCrUSiDfm/OS', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(10) UNSIGNED DEFAULT NULL,
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `id_khachhang`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(32, 2, 3, '2022-03-12 23:36:01', '2022-03-12 23:36:01'),
(33, 2, 8, '2022-03-13 00:55:18', '2022-03-13 00:55:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_tenloai_unique` (`tenloai`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_post` (`id_baiviet`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `material_units`
--
ALTER TABLE `material_units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_posts`
--
ALTER TABLE `menu_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_posts_tendanhmuc_unique` (`tendanhmuc`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_nhanvien_foreign` (`id_nhanvien`),
  ADD KEY `orders_id_khachhang_foreign` (`id_khachhang`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_donhang_foreign` (`id_donhang`),
  ADD KEY `order_details_id_size_foreign` (`id_size`),
  ADD KEY `order_details_id_sanpham_foreign` (`id_sanpham`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_id_donhang_foreign` (`id_donhang`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_tieude_unique` (`tieude`),
  ADD KEY `posts_id_danhmuc_foreign` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_tensp_unique` (`tensp`),
  ADD KEY `products_id_loaisanpham_foreign` (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size_pros`
--
ALTER TABLE `size_pros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_pros_id_pro_foreign` (`id_pro`),
  ADD KEY `size_pros_id_size_foreign` (`id_size`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_sanpham` (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `material_units`
--
ALTER TABLE `material_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `menu_posts`
--
ALTER TABLE `menu_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `size_pros`
--
ALTER TABLE `size_pros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_baiviet`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_khachhang_foreign` FOREIGN KEY (`id_khachhang`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_id_nhanvien_foreign` FOREIGN KEY (`id_nhanvien`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_donhang_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_id_donhang_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_id_danhmuc_foreign` FOREIGN KEY (`id_danhmuc`) REFERENCES `menu_posts` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_loaisanpham_foreign` FOREIGN KEY (`id_loaisanpham`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `size_pros`
--
ALTER TABLE `size_pros`
  ADD CONSTRAINT `size_pros_id_pro_foreign` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `size_pros_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
