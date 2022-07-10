-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-10 17:21:40
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ohdogcat_store_system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `id` int(4) NOT NULL,
  `coupon_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `discount` int(3) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `letter`
--

CREATE TABLE `letter` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `store_id` int(5) NOT NULL,
  `reply_status` tinyint(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `store_id` int(5) UNSIGNED NOT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(6) NOT NULL,
  `coupon_id` int(4) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_product`
--

INSERT INTO `order_product` (`id`, `user_id`, `store_id`, `order_no`, `total`, `coupon_id`, `order_time`, `status`) VALUES
(1, 3, 1, 'ODC2022187174345003', 8500, 0, '2022-07-07 17:43:45', 1),
(2, 1, 1, 'ODC2022187192336001', 5650, 0, '2022-07-07 19:23:36', 2),
(3, 2, 1, 'ODC2022187192348002', 6100, 0, '2022-07-07 19:23:48', 2),
(4, 3, 1, 'ODC2022187192412003', 400, 0, '2022-07-07 19:24:12', 0),
(5, 4, 1, 'ODC2022187192424004', 8750, 0, '2022-07-07 19:24:24', 2),
(6, 4, 2, 'ODC2022188131547004', 25000, 0, '2022-07-08 13:15:47', 1),
(7, 4, 1, 'ODC2022188131643004', 1000, 0, '2022-07-08 13:16:43', 3),
(8, 4, 1, 'ODC2022188181748004', 4150, 0, '2022-07-08 18:17:48', 0),
(9, 1, 1, 'ODC2022190104040001', 6450, 0, '2022-07-10 10:40:40', 2),
(10, 1, 1, 'ODC2022190132233001', 3800, 0, '2022-07-10 13:22:33', 1),
(11, 1, 1, 'ODC2022190132717001', 2700, 0, '2022-07-10 13:27:17', 1),
(12, 1, 2, 'ODC2022190132743001', 5000, 0, '2022-07-10 13:27:43', 1),
(13, 1, 1, 'ODC2022190132801001', 400, 0, '2022-07-10 13:28:01', 3),
(14, 3, 1, 'ODC2022190132811003', 1100, 0, '2022-07-10 13:28:11', 1),
(15, 3, 1, 'ODC2022190132818003', 1500, 0, '2022-07-10 13:28:18', 1),
(16, 2, 1, 'ODC2022190132831002', 4050, 0, '2022-07-10 13:28:31', 2),
(17, 2, 1, 'ODC2022190132846002', 8650, 0, '2022-07-10 13:28:46', 1),
(18, 4, 1, 'ODC2022190132854004', 400, 0, '2022-07-10 13:28:54', 1),
(19, 4, 1, 'ODC2022190132858004', 600, 0, '2022-07-10 13:28:58', 3),
(20, 4, 1, 'ODC2022190132902004', 500, 0, '2022-07-10 13:29:02', 0),
(21, 4, 1, 'ODC2022190132907004', 1000, 0, '2022-07-10 13:29:07', 0),
(22, 1, 1, 'ODC2022190132919001', 500, 0, '2022-07-10 13:29:19', 0),
(23, 5, 1, 'ODC2022190133010005', 1000, 0, '2022-07-10 13:30:10', 1),
(24, 5, 1, 'ODC2022190133015005', 500, 0, '2022-07-10 13:30:15', 3),
(25, 6, 1, 'ODC2022190133032006', 1000, 0, '2022-07-10 13:30:32', 0),
(26, 6, 1, 'ODC2022190150903006', 400, 0, '2022-07-10 15:09:03', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `order_product_detail`
--

CREATE TABLE `order_product_detail` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `amount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_product_detail`
--

INSERT INTO `order_product_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 1, 3, 3),
(4, 1, 8, 10),
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, 1),
(9, 2, 5, 1),
(10, 2, 6, 1),
(11, 2, 7, 1),
(12, 2, 8, 1),
(13, 3, 1, 1),
(14, 3, 2, 1),
(15, 3, 5, 5),
(16, 4, 3, 1),
(17, 5, 4, 5),
(18, 5, 7, 5),
(19, 6, 9, 5),
(20, 7, 2, 1),
(21, 7, 3, 1),
(22, 8, 2, 1),
(23, 8, 3, 2),
(24, 8, 8, 1),
(25, 8, 7, 1),
(26, 8, 5, 1),
(27, 8, 1, 1),
(28, 9, 3, 3),
(29, 9, 8, 1),
(30, 9, 7, 1),
(31, 9, 4, 1),
(32, 9, 5, 1),
(33, 9, 6, 1),
(34, 9, 2, 1),
(35, 9, 1, 1),
(36, 10, 2, 4),
(37, 10, 3, 1),
(38, 10, 1, 2),
(39, 11, 1, 1),
(40, 11, 2, 3),
(41, 11, 3, 1),
(42, 12, 9, 1),
(43, 13, 3, 1),
(44, 14, 1, 1),
(45, 14, 2, 1),
(46, 15, 8, 1),
(47, 15, 4, 1),
(48, 16, 3, 1),
(49, 16, 6, 1),
(50, 16, 7, 1),
(51, 16, 5, 2),
(52, 17, 8, 1),
(53, 17, 7, 1),
(54, 17, 4, 1),
(55, 17, 5, 1),
(56, 17, 6, 1),
(57, 17, 3, 1),
(58, 17, 2, 1),
(59, 17, 1, 7),
(60, 18, 3, 1),
(61, 19, 2, 1),
(62, 20, 1, 1),
(63, 21, 5, 1),
(64, 22, 8, 1),
(65, 23, 5, 1),
(66, 24, 8, 1),
(67, 25, 4, 1),
(68, 26, 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(6) NOT NULL,
  `store_id` int(5) UNSIGNED NOT NULL,
  `store_class` tinyint(1) NOT NULL,
  `product_class_id` int(3) NOT NULL,
  `up_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `amount` int(3) DEFAULT NULL,
  `main_photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `store_id`, `store_class`, `product_class_id`, `up_time`, `start_time`, `end_time`, `amount`, `main_photo`, `sub_photo`, `valid`) VALUES
(1, 'antman', 'antmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantmanantman', 500, 1, 1, 1, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'antman.jpg', '', 1),
(2, 'batman', 'batmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatmanbatman', 600, 1, 1, 2, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'batman.jpg', '', 1),
(3, 'blackpanther', 'blackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpanther.jpgblackpan', 400, 1, 1, 1, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'blackpanther.jpg', '', 1),
(4, '韓瑜瑜', 'bold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpgbold.jpg', 1000, 1, 2, 3, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'bold.jpg', '', 1),
(5, '蔡文文', 'english.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgenglish.jpgen', 1000, 1, 2, 4, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'english.jpg', '', 1),
(6, 'superman', 'superman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpgsuperman.jpg', 900, 1, 1, 2, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'superman.jpg', '', 1),
(7, '馬九九', '999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg999.jpg', 750, 1, 2, 3, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, '999.jpg', '', 1),
(8, '蘇貞貞', '蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞蘇貞貞', 500, 1, 2, 4, '2022-07-07 13:48:24', '2022-07-07 13:48:24', '2023-07-07 13:48:24', NULL, 'sususu.jpg', '', 1),
(9, '習大大', 'xidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidadaxidada', 5000, 2, 2, 5, '2022-07-08 10:00:13', '2022-07-08 10:00:13', '2022-07-08 10:00:13', NULL, 'xidada.jpg', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_class`
--

CREATE TABLE `product_class` (
  `id` int(3) NOT NULL,
  `store_class` tinyint(1) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_class`
--

INSERT INTO `product_class` (`id`, `store_class`, `name`) VALUES
(1, 1, 'Marvel'),
(2, 1, 'DC'),
(3, 2, '國民黨'),
(4, 2, '民進黨'),
(5, 2, '共產黨');

-- --------------------------------------------------------

--
-- 資料表結構 `store_info`
--

CREATE TABLE `store_info` (
  `id` int(3) NOT NULL,
  `account` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_right` tinyint(1) NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `store_info`
--

INSERT INTO `store_info` (`id`, `account`, `password`, `name`, `email`, `area`, `address`, `store_right`, `photo`, `create_time`) VALUES
(1, '', '', '7-11', '', '', '', 0, '', '2022-07-08 10:04:27'),
(2, '', '', '萊爾富', '', '', '', 0, '', '2022-07-08 10:05:22');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `account`, `password`, `email`, `create_time`, `valid`) VALUES
(1, '陳家豪', 'mfee22', 'fee64c78c27d9b3e0ec7da3adeba3c', 'gg@gmail.com', '2022-07-07 13:24:48', 1),
(2, '柯孝強', 'mfee21', 'fee64c78c27d9b3e0ec7da3adeba3c', 'aa@gmail.com', '2022-07-07 13:38:54', 1),
(3, '黃穗懷', 'mfee10', 'fee64c78c27d9b3e0ec7da3adeba3c', '87@gmail.com', '2022-07-07 13:38:58', 1),
(4, '蔡雨信', 'mfee28', 'fee64c78c27d9b3e0ec7da3adeba3c', '69@gmail.com', '2022-07-07 13:39:03', 1),
(5, '采平麻麻', '', '', '', '2022-07-10 13:29:29', 0),
(6, '學儒阿尼基', '', '', '', '2022-07-10 13:29:29', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_product_detail`
--
ALTER TABLE `order_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_class`
--
ALTER TABLE `product_class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_product_detail`
--
ALTER TABLE `order_product_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_class`
--
ALTER TABLE `product_class`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store_info`
--
ALTER TABLE `store_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
