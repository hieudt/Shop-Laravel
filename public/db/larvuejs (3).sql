-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 13, 2019 lúc 05:52 AM
-- Phiên bản máy phục vụ: 5.7.25-0ubuntu0.16.04.2
-- Phiên bản PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `larvuejs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Bill`
--

CREATE TABLE `Bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL COMMENT '0 : Chờ Xử Lý 1 : Chờ Nhận Hàng 2 : Đã Giao Hàng 3 : Hủy Đơn Hàng',
  `statusPay` int(1) NOT NULL COMMENT '0 : Chưa thanh toán 1 : Đã thanh toán',
  `PayMethod` int(1) NOT NULL COMMENT '0 : COD , 1 : Chuyển khoản ngân hàng 2 : Ví điện tử 3 : Thẻ tín dụng',
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_coupon` int(10) UNSIGNED DEFAULT NULL,
  `id_infoship` int(10) UNSIGNED DEFAULT NULL,
  `id_shipper` int(10) UNSIGNED NOT NULL,
  `TotalMoney` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Bill`
--

INSERT INTO `Bill` (`id`, `status`, `statusPay`, `PayMethod`, `id_user`, `id_coupon`, `id_infoship`, `id_shipper`, `TotalMoney`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 6, NULL, NULL, 1, 2500000, NULL, NULL),
(2, 0, 0, 0, 6, NULL, NULL, 1, 125000, NULL, NULL),
(4, 0, 0, 0, 12, 2, 2, 1, 516000, '2019-04-12 22:26:03', '2019-04-12 22:26:03'),
(5, 0, 0, 0, 12, 2, 3, 3, 486000, '2019-04-12 22:46:40', '2019-04-12 22:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Quần', 'quann', '2019-03-21 04:50:24', '2019-03-28 02:50:37'),
(2, 'Áo', 'ao', NULL, NULL),
(3, 'Mũ', 'mu', NULL, NULL),
(4, 'Giày', 'giay', NULL, NULL),
(5, 'Dây chuyền', 'day-chuyen', NULL, NULL),
(6, 'Trang sức', 'trang-suc', NULL, NULL),
(7, 'Quần mới', 'quan-moi', '2019-03-30 03:25:05', '2019-03-30 03:25:05'),
(9, 'Giày mới', 'giay-moi', '2019-03-30 03:37:26', '2019-03-30 03:37:26'),
(10, 'Nón', 'non', '2019-04-02 02:54:08', '2019-04-02 02:54:08'),
(11, 'Non loai 2', 'non-loai-2', '2019-04-02 03:05:18', '2019-04-02 03:05:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ChatLieu`
--

CREATE TABLE `ChatLieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ChatLieu`
--

INSERT INTO `ChatLieu` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cotton', 'Cotton', '2019-03-26 14:46:19', '2019-03-26 14:46:19'),
(2, 'Lụa', 'lua', '2019-03-30 04:00:55', '2019-03-30 04:00:55'),
(3, 'Vải', 'vai', '2019-04-04 03:58:57', '2019-04-04 03:58:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Color`
--

CREATE TABLE `Color` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeColor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '#ffffff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Color`
--

INSERT INTO `Color` (`id`, `name`, `slug`, `codeColor`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'red', '#D64A4B', NULL, NULL),
(2, 'Blue', 'blue', '#ffffff', NULL, NULL),
(5, 'Vàng', 'vang-cut-', '#ae9c26', '2019-04-04 03:53:52', '2019-04-04 03:53:52'),
(6, 'Xanh lá cây', 'xanh-la-cay', '#35ff8e', '2019-04-04 03:54:09', '2019-04-04 03:54:09'),
(7, 'Đen', 'den', '#1f1e1a', '2019-04-08 07:50:00', '2019-04-08 07:50:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Percent` int(11) NOT NULL,
  `RequireTotal` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeEnable` int(1) NOT NULL COMMENT '0 : công khai , 1 : User , 2 : User Tiềm năng',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `Percent`, `RequireTotal`, `Date`, `title`, `thumbnail`, `typeEnable`, `content`, `created_at`, `updated_at`) VALUES
(1, 'SHOPROG0001', 50, 5000000, '2019-04-13 15:00:00', 'Title Mã', 'https://magiamgia.com/wp-content/uploads/2015/12/ma-giam-gia-facebook-image-default.png', 2, 'Content Mã', NULL, NULL),
(2, 'U23VN', 10, 271000, '2019-04-24 00:00:00', 'Mừng U23VN', 'https://bloggiamgia.vn/wp-content/uploads/2018/04/mã-giảm-giá-shopee..png', 0, 'Đội tuyển vô địch', '2019-04-05 06:44:11', '2019-04-05 06:44:11'),
(3, 'ROGTEAM', 50, 2500000, '2019-04-19 00:00:00', 'Mừng Shop Open', 'https://timgiangon.com/wp-content/uploads/2017/01/ma-giam-gia-voucher-tiki.jpg', 0, 'Mừng Shop Open', '2019-04-10 08:13:33', '2019-04-10 08:13:33'),
(4, 'ROGPRIVATE', 5, 150000, '2021-07-17 00:00:00', 'Tài khoản mới', 'https://cf.shopee.vn/file/1414555803957c9ed3c0ff4e53c3ccbe', 1, 'Giảm 5% Cho toàn bộ người dùng trên hệ thống', '2019-04-10 10:29:14', '2019-04-10 10:29:14'),
(5, 'HMShop0005', 30, 120000, '2019-05-09 00:00:00', 'Coupon cho tài khoản thân thiết', 'https://magiamgia.com/wp-content/uploads/2015/12/ma-giam-gia-facebook-image-default.png', 2, 'Mã Giảm giá cho các khách hàng đặc biệt khi mua hàng tại Shop Híu Mai', '2019-04-10 10:38:21', '2019-04-10 10:38:21'),
(6, 'CODETIEMNANG2', 5, 1500000, '2019-05-09 00:00:00', 'MÃ tiềm năng', 'https://magiamgia.com/wp-content/uploads/2015/12/ma-giam-gia-facebook-image-default.png', 2, 'MÃ tiềm năng', '2019-04-10 10:38:25', '2019-04-10 10:38:25'),
(7, 'CODETIEMNANG3', 5, 1500000, '2019-05-09 00:00:00', 'MÃ tiềm năng', 'https://magiamgia.com/wp-content/uploads/2015/12/ma-giam-gia-facebook-image-default.png', 2, 'MÃ tiềm năng', '2019-04-10 10:38:30', '2019-04-10 10:38:30'),
(8, 'CODETIEMNANG4', 5, 1500000, '2019-05-09 00:00:00', 'MÃ tiềm năng', 'https://magiamgia.com/wp-content/uploads/2015/12/ma-giam-gia-facebook-image-default.png', 2, 'MÃ tiềm năng', '2019-04-10 10:38:33', '2019-04-10 10:38:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DetailsBill`
--

CREATE TABLE `DetailsBill` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_products_details` int(11) UNSIGNED NOT NULL,
  `Number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `DetailsBill`
--

INSERT INTO `DetailsBill` (`id`, `id_bill`, `id_products_details`, `Number`, `created_at`, `updated_at`) VALUES
(1, 1, 65, 3, NULL, NULL),
(2, 1, 66, 3, NULL, NULL),
(7, 4, 92, 1, '2019-04-12 22:26:03', '2019-04-12 22:26:03'),
(8, 4, 95, 2, '2019-04-12 22:26:03', '2019-04-12 22:26:03'),
(9, 5, 92, 1, '2019-04-12 22:46:40', '2019-04-12 22:46:40'),
(10, 5, 95, 2, '2019-04-12 22:46:40', '2019-04-12 22:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Images`
--

CREATE TABLE `Images` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `Link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Images`
--

INSERT INTO `Images` (`id`, `id_product`, `Link`, `created_at`, `updated_at`) VALUES
(4, 17, 'cFlC_thankwweb.png', '2019-04-04 10:00:33', '2019-04-04 10:06:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `InfoShip`
--

CREATE TABLE `InfoShip` (
  `id` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `InfoShip`
--

INSERT INTO `InfoShip` (`id`, `FullName`, `Address`, `Phone`, `Email`, `Note`, `created_at`, `updated_at`) VALUES
(2, 'Dương', 'hoàng liệt, hoàng mai,hà nội', '1636001860', 'hieuleadergin@gmail.com', 'có 1 ghi chú', '2019-04-12 22:26:03', '2019-04-12 22:26:03'),
(3, 'Dương', 'hoàng liệt, hoàng mai,hà nội', '1636001860', 'hieuleadergin@gmail.com', NULL, '2019-04-12 22:46:40', '2019-04-12 22:46:40');

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
(3, '2016_01_01_000000_add_voyager_user_fields', 2),
(4, '2016_01_01_000000_create_data_types_table', 2),
(5, '2016_05_19_173453_create_menu_table', 2),
(6, '2016_10_21_190000_create_roles_table', 2),
(7, '2016_10_21_190000_create_settings_table', 2),
(8, '2016_11_30_135954_create_permission_table', 2),
(9, '2016_11_30_141208_create_permission_role_table', 2),
(10, '2016_12_26_201236_data_types__add__server_side', 2),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(12, '2017_01_14_005015_create_translations_table', 2),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(17, '2017_08_05_000000_add_group_to_settings_table', 2),
(18, '2017_11_26_013050_add_user_role_relationship', 2),
(19, '2017_11_26_015000_create_user_roles_table', 2),
(20, '2018_03_11_000000_add_user_settings', 2),
(21, '2018_03_14_000000_add_details_to_data_types_table', 2),
(22, '2018_03_16_000000_make_settings_value_nullable', 2),
(23, '2019_03_21_114105_create_categories_table', 3),
(24, '2019_03_21_190209_create_categories_table', 4),
(25, '2019_03_21_190209_create_data_rows_table', 4),
(26, '2019_03_21_190209_create_data_types_table', 4),
(27, '2019_03_21_190209_create_menu_items_table', 4),
(28, '2019_03_21_190209_create_menus_table', 4),
(29, '2019_03_21_190209_create_password_resets_table', 4),
(30, '2019_03_21_190209_create_permission_role_table', 4),
(31, '2019_03_21_190209_create_permissions_table', 4),
(32, '2019_03_21_190209_create_roles_table', 4),
(33, '2019_03_21_190209_create_settings_table', 4),
(34, '2019_03_21_190209_create_translations_table', 4),
(35, '2019_03_21_190209_create_user_roles_table', 4),
(36, '2019_03_21_190209_create_users_table', 4),
(37, '2019_03_21_190211_add_foreign_keys_to_data_rows_table', 4),
(38, '2019_03_21_190211_add_foreign_keys_to_menu_items_table', 4),
(39, '2019_03_21_190211_add_foreign_keys_to_permission_role_table', 4),
(40, '2019_03_21_190211_add_foreign_keys_to_user_roles_table', 4),
(41, '2019_03_21_190211_add_foreign_keys_to_users_table', 4),
(60, '2019_03_25_064807_subcategory', 5),
(61, '2019_03_25_065144_chat_lieu', 5),
(62, '2019_03_25_065246_coupons', 5),
(63, '2019_03_25_065728_product', 6),
(64, '2019_03_25_070111_images', 7),
(65, '2019_03_25_070230_attribute', 7),
(66, '2019_03_25_070321_attribute_value', 7),
(67, '2019_03_25_070425_attribute_product', 7),
(68, '2019_03_25_073151_thanhpho', 8),
(69, '2019_03_25_073217_quan', 8),
(70, '2019_03_25_073354_shipper', 9),
(71, '2019_03_25_073456_info_ship', 10),
(72, '2019_03_25_073728_status', 11),
(73, '2019_03_25_073800_bill', 12),
(74, '2019_03_25_074123_details_bill', 13),
(75, '2019_03_30_121303_color', 14),
(76, '2019_03_30_121551_size', 14),
(77, '2019_03_30_121642_product_details', 15),
(78, '2019_04_04_124419_create_reviews_table', 16);

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
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sub` int(10) UNSIGNED NOT NULL,
  `id_chatlieu` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `featured` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`id`, `id_sub`, `id_chatlieu`, `slug`, `title`, `description`, `discount`, `cost`, `created_at`, `updated_at`, `thumbnail`, `featured`) VALUES
(16, 8, 1, 'ao-phong-1', 'Áo Phông 1', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 20, 225000, '2019-04-04 09:17:00', '2019-04-08 07:50:12', 'Bpyn_boy-trang.jpg', 1),
(17, 6, 1, 'ao-phong-2', 'Áo Phông 2', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 20, 450000, '2019-04-04 09:17:39', '2019-04-04 10:06:24', 'OiPo_gau-truc.jpg', 0),
(18, 6, 2, 'ao-phong-3', 'Áo Phông 3', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:18:38', '2019-04-04 10:35:17', 'YVQN_thank-anh-that.jpg', 0),
(19, 8, 2, 'ao-phong-4', 'Áo Phông 4', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được&nbsp;</li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên&nbsp;xuất xịn&nbsp;</li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:18:56', '2019-04-04 09:18:56', 'QnPN_truc-that.jpg', 0),
(20, 8, 2, 'ao-phong-5', 'Áo Phông 5', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được&nbsp;</li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên&nbsp;xuất xịn&nbsp;</li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:19:21', '2019-04-04 09:19:21', 'DY4L_thankwweb.png', 0),
(21, 8, 2, 'ao-phong-6', 'Áo Phông 6', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được&nbsp;</li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên&nbsp;xuất xịn&nbsp;</li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:19:32', '2019-04-04 09:19:32', 'xEQP_xc-nam.jpg', 0),
(22, 8, 2, 'ao-phong-7', 'Áo Phông 7', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được&nbsp;</li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên&nbsp;xuất xịn&nbsp;</li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:20:34', '2019-04-04 09:20:34', 'Kq8k_xc-nam.jpg', 0),
(23, 8, 2, 'ao-phong-8', 'Áo Phông 8', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được&nbsp;</li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên&nbsp;xuất xịn&nbsp;</li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">&nbsp;</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 555000, '2019-04-04 09:20:40', '2019-04-04 09:20:40', '9UM7_xc-nam.jpg', 0),
(24, 8, 2, 'ao-phong-9', 'Áo Phông 9', '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>', 0, 90000, '2019-04-04 09:21:05', '2019-04-11 20:58:58', 'r7zO_xc-nam.jpg', 1),
(25, 1, 1, '3', 'Quần hay', '<p>gfdgfd</p>', 5, 250000, '2019-04-08 00:56:36', '2019-04-08 00:56:36', 'oXK2_thank-anh-that.jpg', 0),
(26, 3, 1, 'quan-hay', 'Quần hay', '<p>gfdgfd</p>', 5, 250000, '2019-04-08 00:56:53', '2019-04-08 00:56:53', 'dMTt_thank-anh-that.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_color` int(10) UNSIGNED NOT NULL,
  `id_size` int(10) UNSIGNED NOT NULL,
  `sku` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `id_product`, `id_color`, `id_size`, `sku`, `soluong`, `created_at`, `updated_at`) VALUES
(65, 19, 6, 2, 'sfdsd', 5, '2019-04-04 09:18:57', '2019-04-04 09:18:57'),
(66, 19, 1, 2, 'dsfds', 4, '2019-04-04 09:18:57', '2019-04-04 09:18:57'),
(67, 20, 6, 2, 'sfdsd', 5, '2019-04-04 09:19:21', '2019-04-04 09:19:21'),
(68, 20, 1, 2, 'dsfds', 4, '2019-04-04 09:19:21', '2019-04-04 09:19:21'),
(69, 21, 6, 2, 'sfdsd', 5, '2019-04-04 09:19:32', '2019-04-04 09:19:32'),
(70, 21, 1, 2, 'dsfds', 4, '2019-04-04 09:19:32', '2019-04-04 09:19:32'),
(71, 22, 6, 2, 'sfdsd', 5, '2019-04-04 09:20:34', '2019-04-04 09:20:34'),
(72, 22, 1, 2, 'dsfds', 4, '2019-04-04 09:20:34', '2019-04-04 09:20:34'),
(73, 23, 6, 2, 'sfdsd', 5, '2019-04-04 09:20:40', '2019-04-04 09:20:40'),
(74, 23, 1, 2, 'dsfds', 4, '2019-04-04 09:20:40', '2019-04-04 09:20:40'),
(81, 17, 2, 1, 'sfdsd', 3, '2019-04-04 10:06:23', '2019-04-04 10:06:23'),
(82, 17, 1, 2, 'dsfds', 4, '2019-04-04 10:06:24', '2019-04-04 10:06:24'),
(83, 18, 2, 1, 'sfdsd', 3, '2019-04-04 10:35:17', '2019-04-04 10:35:17'),
(84, 18, 1, 2, 'dsfds', 4, '2019-04-04 10:35:17', '2019-04-04 10:35:17'),
(85, 25, 1, 1, 'fgdgfd', 4, '2019-04-08 00:56:36', '2019-04-08 00:56:36'),
(86, 26, 1, 1, 'fgdgfd', 4, '2019-04-08 00:56:54', '2019-04-08 00:56:54'),
(92, 16, 7, 1, 'dsadsa', 3, '2019-04-10 21:10:36', '2019-04-10 21:10:36'),
(93, 16, 5, 2, 'rgegre', 4, '2019-04-10 21:10:36', '2019-04-10 21:10:36'),
(94, 16, 7, 2, 'gfrghrte', 5, '2019-04-10 21:10:36', '2019-04-10 21:10:36'),
(95, 16, 5, 1, 'ggg', 7, '2019-04-10 21:10:36', '2019-04-10 21:10:36'),
(96, 24, 6, 2, 'sfdsd', 5, '2019-04-11 20:58:58', '2019-04-11 20:58:58'),
(97, 24, 1, 2, 'dsfds', 4, '2019-04-11 20:58:58', '2019-04-11 20:58:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `id_product`, `name`, `email`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(2, 17, 'hieu', 'dfsf@hieu.vn', 'good', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Shipper`
--

CREATE TABLE `Shipper` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `Time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Display` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Shipper`
--

INSERT INTO `Shipper` (`id`, `name`, `fee`, `Time`, `image`, `Display`, `created_at`, `updated_at`) VALUES
(1, 'GiaoHangNhanh', 30000, '4h', 'https://lh3.googleusercontent.com/VuehqCNIv4HdUrhmmHoTDvxt7h7soowos4Fa1LTCsIHQY00Kr6Qcs4KIG7P36iopxA', 1, NULL, NULL),
(2, 'SuperShip', 15000, '2h~4h', 'https://is1-ssl.mzstatic.com/image/thumb/Purple114/v4/f5/dd/71/f5dd715a-e5ec-b78e-c23c-a357b89815b5/source/512x512bb.jpg', 1, NULL, NULL),
(3, 'FreeShip', 0, '1 ngày', 'https://static.proship.vn/uploads/news/2017/06/08/Proship.VN_1496904377.6963.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Size`
--

CREATE TABLE `Size` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Size`
--

INSERT INTO `Size` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'XL', NULL, NULL),
(2, 'M', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SubCategory`
--

CREATE TABLE `SubCategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `name_sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `SubCategory`
--

INSERT INTO `SubCategory` (`id`, `id_category`, `name_sub`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quần đùi', 'quandui', '2019-03-26 14:15:52', '2019-03-26 14:15:52'),
(2, 2, 'Áo ba', 'ao-hai', NULL, '2019-03-28 03:08:40'),
(3, 1, 'Áo bốn', 'ao-bon', '2019-03-28 10:04:01', '2019-03-28 10:04:01'),
(4, 4, 'fdsfds', 'fdsfds', '2019-03-30 03:36:13', '2019-03-30 03:36:13'),
(5, 9, 'Con giày mới', 'con-giay-moi', '2019-03-30 03:37:38', '2019-03-30 03:37:38'),
(6, 2, 'Áo năm', 'ao-nam', '2019-03-31 12:20:26', '2019-03-31 12:20:26'),
(7, 10, 'Nón lưỡi chai', 'non-luoi-chai', '2019-04-02 02:54:21', '2019-04-02 02:54:21'),
(8, 2, 'Áo Phông', 'ao-phong', '2019-04-04 09:16:25', '2019-04-04 09:16:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `Address`, `Phone`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 'Dương Trung Hiếu', 'rogteamvn@gmail.com', 'users/default.png', 'hoàng liệt, hoàng mai,hà nội', '1636001860', '$2y$10$AFONSnQeqg/dHHE65pV0q.qzgFjXjMuLluPsl4uQ9.wehO/xJ/bbO', 'NCp9omwjt4U8K1jdxfD4uajlWbGWHn9QvxFieUdUohAiQz3vZd3cxbTtMMnV', '{"locale":"en"}', NULL, '2019-04-10 10:37:22'),
(2, 'maimaiihh', 'rogteamvn2@gmail.com', 'users/March2019/mqsHF5u7blEjHug0UYaZ.jpg', 'gfdgfd', NULL, '$2y$10$1toui9VszKGzkOUKuEjQb.oScpILZIg92LLGSr6mQwu9LzuxkKwsO', NULL, '{"locale":"en"}', NULL, '2019-04-09 14:05:17'),
(3, 'maiiiiii', 'LeMai@hmai.vn', 'default.png', 'LeMai Address', 'undefined', '$2y$10$4h95Om364/hPKzvWjIL6reWT5BZ.JmtHGhtM4xxg7Au2JKDPKRGbm', NULL, NULL, '2019-04-07 12:50:48', '2019-04-11 13:44:09'),
(4, 'khách hi', 'lemaii@hmai.vn', 'default.png', 'maimai address', '0336001860', '$2y$10$zM7oC48eq743e1RuW/O.euu0xVUSBkmT7b/WRX5HaPzMHOcyzvOsy', NULL, NULL, '2019-04-07 12:53:31', '2019-04-11 13:44:16'),
(5, 'Khách D', 'maitest@mai.vn', 'default.png', 'maimaiaddr', '32543', '$2y$10$E76iESfNHwg6j6NIDXjO5O5otM5SGqdSaQYxSat53qP3Ak0Lf1mDm', 'tEajSp9FhB6knvk44HlW7wueZawMdclzRDOEuGbFphoHZnpDhZ9dO6cJ28qO', NULL, '2019-04-07 13:12:47', '2019-04-11 13:44:00'),
(6, 'maixinhs', 'mai@adm.vn', 'default.png', 'maimai', '037777777777', '$2y$10$GIf.wJRBT.so4uyNfz.kD.D5B7jaGN.BCPLuk6u8AeqsPXZruR1uC', 'gesETbHqCKULRC9xHvGP7nK3cL2X5sYAdi1frdjd2IGiu6x1R9vr5rJnYHuN', NULL, '2019-04-07 14:15:18', '2019-04-09 14:08:14'),
(7, 'hieuhieu', 'hieuvip@vip.vn', 'default.png', 'fdsfesges', '033252432', '$2y$10$BY49cmcwKymizSjOpuSUye65wTjhWqez/RprCo/TIQ4bCd3pFUAHa', 'PTwKAgVh2oWJhSKchjbjfXeFDTph1h0ILa8emUwCfA7ap8SlLrK2sJdFOBPT', NULL, '2019-04-09 14:41:36', '2019-04-09 14:41:36'),
(8, 'KHachVip', 'Vip2@gmail.vnm', 'default.png', 'gregre', 'fsdg542532', '$2y$10$9P.E/UMHBxMJM2k1SmBTWed6BDk3BCH1vI4fyIyx2hHsfzy.CYVI6', NULL, NULL, '2019-04-09 14:50:55', '2019-04-09 14:50:55'),
(9, 'gfgrwe', 'rewfew@gmail.vn', 'default.png', 'tretretre', 'fd32532', '$2y$10$1R6s/jUybPGZ47GdZo/JDemzBSYNxJak.DSjExigOrEMs2Oy9gxJS', NULL, NULL, '2019-04-09 14:52:51', '2019-04-09 14:52:51'),
(10, 'Khách C', 'maimai@mai.vn', 'default.png', 'gregregre', '542352643', '$2y$10$Sz8UQahZdcx49owpctq8FeeaKMHdBmTZwslcztaEeo6cHySEMzT3.', NULL, NULL, '2019-04-11 13:43:15', '2019-04-11 13:43:53'),
(11, 'Lê Hoàng Mai', 'lehoangmai@mai.vn', 'default.png', 'tretretrưeẻ', '5435435423', '$2y$10$rSnYTc.Kkmr1Eg2mhkrwduQGfiFdAOcIdqLTZ4GaGepDFdq50CI9C', 'oYQ3CcDoLsLAMTd2ZHwwM9Fmz30s4aVpNgOBJaQ0FU1Uxq5tV2MU2mhbI7E3', NULL, '2019-04-11 13:50:27', '2019-04-11 13:50:27'),
(12, 'Khách Vãng Lai', 'note@note.vn', 'default.png', '00000000000', '00000000000', '$2y$10$E7g5bmcOQrQQRqiX0VyGFe0TzJbNwYEQOEXub86RP7FAJPd6yHSaS', NULL, NULL, '2019-04-12 21:04:32', '2019-04-12 21:04:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id_status_foreign` (`status`),
  ADD KEY `bill_id_user_foreign` (`id_user`),
  ADD KEY `bill_id_coupon_foreign` (`id_coupon`),
  ADD KEY `bill_id_infoship_foreign` (`id_infoship`),
  ADD KEY `FK_BillShiper` (`id_shipper`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ChatLieu`
--
ALTER TABLE `ChatLieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Color`
--
ALTER TABLE `Color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DetailsBill`
--
ALTER TABLE `DetailsBill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailsbill_id_bill_foreign` (`id_bill`),
  ADD KEY `FK_DetailsProductAtt` (`id_products_details`);

--
-- Chỉ mục cho bảng `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `InfoShip`
--
ALTER TABLE `InfoShip`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_sub_foreign` (`id_sub`),
  ADD KEY `product_id_chatlieu_foreign` (`id_chatlieu`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_id_product_foreign` (`id_product`),
  ADD KEY `product_details_id_color_foreign` (`id_color`),
  ADD KEY `product_details_id_size_foreign` (`id_size`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `Shipper`
--
ALTER TABLE `Shipper`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Size`
--
ALTER TABLE `Size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id_category_foreign` (`id_category`);

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
-- AUTO_INCREMENT cho bảng `Bill`
--
ALTER TABLE `Bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `ChatLieu`
--
ALTER TABLE `ChatLieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `Color`
--
ALTER TABLE `Color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `DetailsBill`
--
ALTER TABLE `DetailsBill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `Images`
--
ALTER TABLE `Images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `InfoShip`
--
ALTER TABLE `InfoShip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `Shipper`
--
ALTER TABLE `Shipper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `Size`
--
ALTER TABLE `Size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `FK_BillShiper` FOREIGN KEY (`id_shipper`) REFERENCES `Shipper` (`id`),
  ADD CONSTRAINT `bill_id_coupon_foreign` FOREIGN KEY (`id_coupon`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `bill_id_infoship_foreign` FOREIGN KEY (`id_infoship`) REFERENCES `InfoShip` (`id`),
  ADD CONSTRAINT `bill_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `DetailsBill`
--
ALTER TABLE `DetailsBill`
  ADD CONSTRAINT `FK_DetailsProductAtt` FOREIGN KEY (`id_products_details`) REFERENCES `product_details` (`id`),
  ADD CONSTRAINT `detailsbill_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `Bill` (`id`);

--
-- Các ràng buộc cho bảng `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `images_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `Product` (`id`);

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_id_chatlieu_foreign` FOREIGN KEY (`id_chatlieu`) REFERENCES `ChatLieu` (`id`),
  ADD CONSTRAINT `product_id_sub_foreign` FOREIGN KEY (`id_sub`) REFERENCES `SubCategory` (`id`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `Color` (`id`),
  ADD CONSTRAINT `product_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `product_details_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `Size` (`id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `Product` (`id`);

--
-- Các ràng buộc cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD CONSTRAINT `subcategory_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
