-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 01, 2019 lúc 06:42 PM
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
  `id_status` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_coupon` int(10) UNSIGNED NOT NULL,
  `id_infoship` int(10) UNSIGNED NOT NULL,
  `id_shipper` int(10) UNSIGNED NOT NULL,
  `TotalMoney` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 'Giày mới', 'giay-moi', '2019-03-30 03:37:26', '2019-03-30 03:37:26');

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
(2, 'Lụa', 'lua', '2019-03-30 04:00:55', '2019-03-30 04:00:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Color`
--

CREATE TABLE `Color` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Color`
--

INSERT INTO `Color` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Red', NULL, NULL),
(2, 'Blue', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `InfoShip`
--

CREATE TABLE `InfoShip` (
  `id` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_quan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(77, '2019_03_30_121642_product_details', 15);

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
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(2, 'browse_bread', NULL, '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(3, 'browse_database', NULL, '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(4, 'browse_media', NULL, '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(5, 'browse_compass', NULL, '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(6, 'browse_menus', 'menus', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(7, 'read_menus', 'menus', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(8, 'edit_menus', 'menus', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(9, 'add_menus', 'menus', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(10, 'delete_menus', 'menus', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(11, 'browse_roles', 'roles', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(12, 'read_roles', 'roles', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(13, 'edit_roles', 'roles', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(14, 'add_roles', 'roles', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(15, 'delete_roles', 'roles', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(16, 'browse_users', 'users', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(17, 'read_users', 'users', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(18, 'edit_users', 'users', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(19, 'add_users', 'users', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(20, 'delete_users', 'users', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(21, 'browse_settings', 'settings', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(22, 'read_settings', 'settings', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(23, 'edit_settings', 'settings', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(24, 'add_settings', 'settings', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(25, 'delete_settings', 'settings', '2019-03-21 03:35:29', '2019-03-21 03:35:29'),
(26, 'browse_hooks', NULL, '2019-03-21 03:35:30', '2019-03-21 03:35:30'),
(27, 'browse_categories', 'categories', '2019-03-21 04:45:55', '2019-03-21 04:45:55'),
(28, 'read_categories', 'categories', '2019-03-21 04:45:55', '2019-03-21 04:45:55'),
(29, 'edit_categories', 'categories', '2019-03-21 04:45:55', '2019-03-21 04:45:55'),
(30, 'add_categories', 'categories', '2019-03-21 04:45:55', '2019-03-21 04:45:55'),
(31, 'delete_categories', 'categories', '2019-03-21 04:45:55', '2019-03-21 04:45:55'),
(32, 'browse_SubCategory', 'SubCategory', '2019-03-26 14:13:29', '2019-03-26 14:13:29'),
(33, 'read_SubCategory', 'SubCategory', '2019-03-26 14:13:29', '2019-03-26 14:13:29'),
(34, 'edit_SubCategory', 'SubCategory', '2019-03-26 14:13:29', '2019-03-26 14:13:29'),
(35, 'add_SubCategory', 'SubCategory', '2019-03-26 14:13:29', '2019-03-26 14:13:29'),
(36, 'delete_SubCategory', 'SubCategory', '2019-03-26 14:13:29', '2019-03-26 14:13:29'),
(37, 'browse_Product', 'Product', '2019-03-26 14:18:10', '2019-03-26 14:18:10'),
(38, 'read_Product', 'Product', '2019-03-26 14:18:10', '2019-03-26 14:18:10'),
(39, 'edit_Product', 'Product', '2019-03-26 14:18:10', '2019-03-26 14:18:10'),
(40, 'add_Product', 'Product', '2019-03-26 14:18:10', '2019-03-26 14:18:10'),
(41, 'delete_Product', 'Product', '2019-03-26 14:18:10', '2019-03-26 14:18:10'),
(42, 'browse_thanhpho', 'thanhpho', '2019-03-26 14:22:02', '2019-03-26 14:22:02'),
(43, 'read_thanhpho', 'thanhpho', '2019-03-26 14:22:02', '2019-03-26 14:22:02'),
(44, 'edit_thanhpho', 'thanhpho', '2019-03-26 14:22:02', '2019-03-26 14:22:02'),
(45, 'add_thanhpho', 'thanhpho', '2019-03-26 14:22:02', '2019-03-26 14:22:02'),
(46, 'delete_thanhpho', 'thanhpho', '2019-03-26 14:22:02', '2019-03-26 14:22:02'),
(47, 'browse_quan', 'quan', '2019-03-26 14:22:26', '2019-03-26 14:22:26'),
(48, 'read_quan', 'quan', '2019-03-26 14:22:26', '2019-03-26 14:22:26'),
(49, 'edit_quan', 'quan', '2019-03-26 14:22:26', '2019-03-26 14:22:26'),
(50, 'add_quan', 'quan', '2019-03-26 14:22:26', '2019-03-26 14:22:26'),
(51, 'delete_quan', 'quan', '2019-03-26 14:22:26', '2019-03-26 14:22:26'),
(52, 'browse_ChatLieu', 'ChatLieu', '2019-03-26 14:22:52', '2019-03-26 14:22:52'),
(53, 'read_ChatLieu', 'ChatLieu', '2019-03-26 14:22:52', '2019-03-26 14:22:52'),
(54, 'edit_ChatLieu', 'ChatLieu', '2019-03-26 14:22:52', '2019-03-26 14:22:52'),
(55, 'add_ChatLieu', 'ChatLieu', '2019-03-26 14:22:52', '2019-03-26 14:22:52'),
(56, 'delete_ChatLieu', 'ChatLieu', '2019-03-26 14:22:52', '2019-03-26 14:22:52'),
(62, 'browse_Attribute', 'Attribute', '2019-03-26 14:26:39', '2019-03-26 14:26:39'),
(63, 'read_Attribute', 'Attribute', '2019-03-26 14:26:39', '2019-03-26 14:26:39'),
(64, 'edit_Attribute', 'Attribute', '2019-03-26 14:26:39', '2019-03-26 14:26:39'),
(65, 'add_Attribute', 'Attribute', '2019-03-26 14:26:39', '2019-03-26 14:26:39'),
(66, 'delete_Attribute', 'Attribute', '2019-03-26 14:26:39', '2019-03-26 14:26:39'),
(67, 'browse_AttributeProduct', 'AttributeProduct', '2019-03-26 14:26:59', '2019-03-26 14:26:59'),
(68, 'read_AttributeProduct', 'AttributeProduct', '2019-03-26 14:26:59', '2019-03-26 14:26:59'),
(69, 'edit_AttributeProduct', 'AttributeProduct', '2019-03-26 14:26:59', '2019-03-26 14:26:59'),
(70, 'add_AttributeProduct', 'AttributeProduct', '2019-03-26 14:26:59', '2019-03-26 14:26:59'),
(71, 'delete_AttributeProduct', 'AttributeProduct', '2019-03-26 14:26:59', '2019-03-26 14:26:59'),
(72, 'browse_AttributeValue', 'AttributeValue', '2019-03-26 14:27:16', '2019-03-26 14:27:16'),
(73, 'read_AttributeValue', 'AttributeValue', '2019-03-26 14:27:16', '2019-03-26 14:27:16'),
(74, 'edit_AttributeValue', 'AttributeValue', '2019-03-26 14:27:16', '2019-03-26 14:27:16'),
(75, 'add_AttributeValue', 'AttributeValue', '2019-03-26 14:27:16', '2019-03-26 14:27:16'),
(76, 'delete_AttributeValue', 'AttributeValue', '2019-03-26 14:27:16', '2019-03-26 14:27:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1);

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
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`id`, `id_sub`, `id_chatlieu`, `slug`, `title`, `description`, `discount`, `cost`, `created_at`, `updated_at`, `thumbnail`) VALUES
(12, 2, 1, 'ao-phong-thank-you-', 'ÁO PHÔNG " THANK YOU "', '<p>đây là áo phông</p>', 0, 250000, '2019-04-01 00:54:34', '2019-04-01 00:54:34', 'M9nF_ao1.jpg'),
(13, 2, 1, 'ao-phong-loai-2', 'ÁO PHÔNG loại 2', '<p>đây là áo phông</p>', 0, 330000, '2019-04-01 00:55:35', '2019-04-01 00:55:35', 'HuPQ_fdsfds.jpg');

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
(9, 12, 1, 2, 'SKU01', 5, '2019-04-01 00:54:34', '2019-04-01 00:54:34'),
(10, 13, 1, 1, 'SKU02', 10, '2019-04-01 00:55:35', '2019-04-01 00:55:35'),
(12, 12, 2, 1, 'ewrewrew', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan`
--

CREATE TABLE `quan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_thanhpho` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(2, 'user', 'Normal User', '2019-03-21 03:35:28', '2019-03-21 03:35:28'),
(3, 'mod', 'Cộng Tác Viên', '2019-03-21 03:53:09', '2019-03-21 03:53:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Shipper`
--

CREATE TABLE `Shipper` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `Time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Display` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `Status`
--

CREATE TABLE `Status` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, 2, 'Áo năm', 'ao-nam', '2019-03-31 12:20:26', '2019-03-31 12:20:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'trunghieu', 'rogteamvn@gmail.com', 'users/default.png', '$2y$10$AFONSnQeqg/dHHE65pV0q.qzgFjXjMuLluPsl4uQ9.wehO/xJ/bbO', '8XU5MgL19RgSNFOXrdTrnd9Smr6dC2S03E6hSLGvAJwXJp0fIrGGJbK1Rmmi', '{"locale":"en"}', NULL, '2019-03-21 04:36:02'),
(2, 2, 'maimai', 'rogteamvn2@gmail.com', 'users/March2019/mqsHF5u7blEjHug0UYaZ.jpg', '$2y$10$1toui9VszKGzkOUKuEjQb.oScpILZIg92LLGSr6mQwu9LzuxkKwsO', NULL, '{"locale":"en"}', NULL, '2019-03-21 03:51:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(2, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id_status_foreign` (`id_status`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `infoship_id_quan_foreign` (`id_quan`);

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
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

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
-- Chỉ mục cho bảng `quan`
--
ALTER TABLE `quan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quan_id_thanhpho_foreign` (`id_thanhpho`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

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
-- Chỉ mục cho bảng `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id_category_foreign` (`id_category`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Bill`
--
ALTER TABLE `Bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `ChatLieu`
--
ALTER TABLE `ChatLieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `Color`
--
ALTER TABLE `Color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `DetailsBill`
--
ALTER TABLE `DetailsBill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `Images`
--
ALTER TABLE `Images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `InfoShip`
--
ALTER TABLE `InfoShip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `quan`
--
ALTER TABLE `quan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `Shipper`
--
ALTER TABLE `Shipper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `Size`
--
ALTER TABLE `Size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `bill_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `Status` (`id`),
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
-- Các ràng buộc cho bảng `InfoShip`
--
ALTER TABLE `InfoShip`
  ADD CONSTRAINT `infoship_id_quan_foreign` FOREIGN KEY (`id_quan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
-- Các ràng buộc cho bảng `quan`
--
ALTER TABLE `quan`
  ADD CONSTRAINT `quan_id_thanhpho_foreign` FOREIGN KEY (`id_thanhpho`) REFERENCES `thanhpho` (`id`);

--
-- Các ràng buộc cho bảng `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD CONSTRAINT `subcategory_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
