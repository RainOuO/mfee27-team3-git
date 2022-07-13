-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-12 19:04:47
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
-- 資料庫： `oh_dog_cat`
--

-- --------------------------------------------------------

--
-- 資料表結構 `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(5) UNSIGNED NOT NULL,
  `category_id` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(5) NOT NULL,
  `discount_number` int(2) NOT NULL,
  `discount_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lower_limit` int(10) NOT NULL,
  `upper_limit` int(10) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 1,
  `buyer_valid` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `discount`
--

INSERT INTO `discount` (`id`, `store_id`, `category_id`, `name`, `description`, `amount`, `discount_number`, `discount_code`, `lower_limit`, `upper_limit`, `state`, `start_time`, `end_time`, `create_time`, `valid`, `buyer_valid`) VALUES
(1, 1, 1, '小確幸8折', '小確幸8折', 30, 20, '', 100, 1000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, 1),
(2, 2, 1, '周末79折', '周末79折', 100, 21, '', 0, 0, 0, '2022-07-05 00:00:00', '2022-07-30 23:59:59', NULL, 1, 0),
(3, 1, 1, '5折', '5折', 30, 50, '', 0, 0, 0, '2022-07-06 00:00:00', '2022-07-30 23:59:59', NULL, 1, 1),
(4, 1, 1, '66折', '66折', 100, 34, '', 0, 0, 0, '2022-07-06 00:00:00', '2022-07-06 23:59:59', NULL, 1, 1),
(5, 1, 1, '75折', '75折', 30, 25, '', 0, 0, 0, '2022-07-06 00:00:00', '2022-07-06 23:59:59', NULL, 1, 1),
(6, 1, 1, '89折', '89折', 100, 11, '', 0, 0, 0, '2022-07-06 00:00:00', '2022-07-06 23:59:59', NULL, 1, 1),
(7, 1, 1, '95折', '95折', 20, 5, '', 0, 0, 0, '2022-07-14 00:00:00', '2022-07-31 00:00:00', '2022-07-06 10:46:35', 1, 1),
(8, 1, 1, '55折', '55折', 50, 45, '', 0, 0, 0, '2022-07-09 00:00:00', '2022-07-30 00:00:00', '2022-07-06 10:53:35', 1, 1),
(9, 1, 2, '-150', '-150', 20, 150, '', 0, 0, 0, '2022-07-06 17:40:20', '2022-07-16 17:40:20', NULL, 1, 0),
(10, 2, 1, '1折', '1折', 50, 90, '', 0, 0, 0, '2022-07-06 00:00:00', '2022-08-04 00:00:00', '2022-07-06 11:44:28', 1, 1),
(11, 2, 1, '2折', '2折', 50, 80, '', 0, 0, 0, '2022-07-27 00:00:00', '2022-07-30 00:00:00', '2022-07-06 11:44:46', 1, 0),
(12, 2, 1, '37折', '37折', 100, 63, '', 0, 0, 0, '2022-07-12 00:00:00', '2022-07-15 00:00:00', '2022-07-06 11:45:11', 1, 0),
(13, 1, 2, '-50', '-50', 60, 50, '', 0, 0, 0, '2022-07-08 00:00:00', '2022-07-31 00:00:00', '2022-07-06 17:19:42', 1, 0),
(14, 1, 2, '-10', '-10', 50, 10, '', 0, 0, 0, '2022-07-15 00:00:00', '2022-07-22 00:00:00', '2022-07-06 17:22:00', 1, 0),
(15, 1, 2, '-88', '-88', 100, 88, '', 0, 0, 0, '2022-07-15 00:00:00', '2022-07-30 00:00:00', '2022-07-06 17:32:09', 1, 0),
(16, 2, 2, '-200', '-200', 60, 200, '', 0, 0, 0, '2022-07-07 00:00:00', '2022-07-30 00:00:00', '2022-07-06 17:37:21', 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `discount_category`
--

CREATE TABLE `discount_category` (
  `id` int(1) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `discount_category`
--

INSERT INTO `discount_category` (`id`, `name`) VALUES
(1, '折數優惠券'),
(2, '現金折價券'),
(3, '商品優惠活動');

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
  `store_id` int(11) NOT NULL,
  `intro` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(6) NOT NULL,
  `product_type` tinyint(1) NOT NULL,
  `product_category` int(3) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `valid_time_start` datetime DEFAULT NULL,
  `valid_time_end` datetime DEFAULT NULL,
  `stock_quantity` int(3) DEFAULT NULL,
  `coupon_id` tinyint(4) DEFAULT NULL,
  `main_photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `store_id`, `intro`, `description`, `price`, `product_type`, `product_category`, `create_time`, `update_time`, `valid_time_start`, `valid_time_end`, `stock_quantity`, `coupon_id`, `main_photo`, `sub_photo`, `valid`) VALUES
(1, '博士巧思 無穀犬糧 羊肉地瓜', 6, '無穀低過敏配方:不含穀類，有效降低食物過', '口味：羊肉+地瓜\r\n重量：8kg\r\n\r\n●小分子褐藻醣膠:改善體質提升身體免疫力\r\n●單一動物性蛋白質，紐西蘭放牧羊\r\n●無穀低過敏配方:不含穀類，有效降低食物過敏因子\r\n●天然椰子油:豐富中鏈脂肪酸提升健康\r\n\r\n主要原料：\r\n羊肉絨.地瓜.豌豆.番茄.綠藻.家禽脂肪(以維生素E保存).椰子油.深海魚油.啤酒酵母.卵磷脂.金盞花萃取物.絲蘭萃取物.碳酸鈣.磷酸鈣.褐藻醣膠.維生素(A.D3.E.', 1700, 4, 5, '2022-07-11 19:39:35', '2022-07-12 19:39:35', '2022-07-01 19:39:35', '2022-07-31 23:59:59', 40, NULL, '6_Pros_choice_digia', '6_Pros_choice_digia2', 1),
(2, '博士巧思 無穀犬糧 鮭魚+馬鈴薯　', 6, '無穀低過敏配方:不含穀類，有效降低食物過', '口味：鮭魚+馬鈴薯\r\n重量：8kg\r\n\r\n●小分子褐藻醣膠:改善體質提升身體免疫力\r\n●單一動物性蛋白質，阿拉斯加野生鮭魚\r\n●無穀低過敏配方:不含穀類，有效降低食物過敏因子\r\n●天然椰子油:豐富中鏈脂肪酸提升健康\r\n\r\n主要原料：\r\n鮭魚肉絨.馬鈴薯.豌豆.番茄.綠藻.家禽脂肪(以維生素E保存).椰子油.啤酒酵母.金盞花萃取物.絲蘭萃取物.碳酸鈣.磷酸鈣.褐藻醣膠.維生素(A.D3.E.B1.B', 1700, 4, 5, '2022-07-11 19:39:35', '2022-07-12 19:39:35', '2022-07-01 19:39:35', '2022-07-31 23:59:59', 40, NULL, '6_Pros_choice_fish', '6_Pros_choice_fish2', 1),
(3, '博士巧思 無穀犬糧 熟齡犬7+　', 6, '無穀低過敏配方:不含穀類，有效降低食物過', '口味：熟齡犬7+　\r\n重量：8kg\r\n\r\n●小分子褐藻醣膠:改善體質提升身體免疫力\r\n●嚴選優質動物性蛋白質，紐西蘭野生鹿肉\r\n●熟齡保健:納豆酵素+天然磷蝦油，心血管保健配方\r\n●無穀低過敏配方:不含穀類，有效降低食物過敏因子\r\n\r\n主要原料：\r\n鹿肉絨.地瓜.豌豆.家禽脂肪(以維生素E保存).椰子油.乾燥甜菜.酵母粉.牛磺酸.綠藻.金盞花萃取物.絲蘭萃取物.天然納豆酵素.天然磷蝦油.菸鹼酸.葉', 1700, 4, 5, '2022-07-11 19:39:35', '2022-07-12 19:39:35', '2022-07-01 19:39:35', '2022-07-31 23:59:59', 40, NULL, '6_Pros_choice_youngdog', '6_Pros_choice_youngdog2', 1),
(4, 'PureLUXE 循味 天然無穀犬糧-小型犬(火雞肉.豌豆&', 6, '100%無穀物、無麩質成份添加', '●低GI(升醣指數)配方，控制血糖平衡，控制食慾及延緩飢餓感，防止肥胖、降低糖尿病風險\r\n●5星級營養&超級食物\r\n●城市都會型寵物生活型態設計-針對小型犬設計，營養需求的不同，並以小顆粒設計，更適合小型犬食用\r\n●採用新鮮高蛋白質的火雞肉為首選食材，不含雞肉蛋白質，減少過敏源\r\n●葡萄糖胺&軟骨素，有助保持關節健康\r\n●益生元 活益生菌，抑制不好的口氣，並保持腸胃健康\r\n●豐富椰子油&鮭魚油、O', 499, 4, 5, '2022-07-11 19:39:35', '2022-07-12 19:39:35', '2022-07-01 19:39:35', '2022-07-31 23:59:59', 40, NULL, '6_PureLUXE_littledog', '6_PureLUXE_littledog2', 1),
(5, 'A★star 犬專用 關節骨骼粉 60g ', 6, '膠原蛋白幫助啟動關節活力', 'A★star犬專用關節骨骼 60g (AB-185-0601)　\r\n\r\n★精準補充，一日一餵食好吸收\r\n★軟骨素可提供關節滑液補足營養\r\n★本產品無法取代醫療療程，相關問題請洽詢獸醫協助\r\n\r\n成份：\r\n碳酸鈣，檸檬酸鈣，洋車前子殼粉，鳳梨粉，葡萄糖胺，二型膠原蛋白，軟骨素，麥芽糊精，乳糖，酵母粉，酪酸菌，葡萄糖酸鎂，維生素D，凍乾雞肉粉。\r\n\r\n\r\n\r\n每一份量60公克，本包裝含1份\r\n營養成份', 320, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_A★star_bone', '6_A★star_bone2', 1),
(6, 'A★star 犬專用 關節骨骼粉 60g ', 6, '膠原蛋白幫助啟動關節活力', 'A★star犬專用關節骨骼 60g (AB-185-0601)　\r\n\r\n★精準補充，一日一餵食好吸收\r\n★軟骨素可提供關節滑液補足營養\r\n★本產品無法取代醫療療程，相關問題請洽詢獸醫協助\r\n\r\n成份：\r\n碳酸鈣，檸檬酸鈣，洋車前子殼粉，鳳梨粉，葡萄糖胺，二型膠原蛋白，軟骨素，麥芽糊精，乳糖，酵母粉，酪酸菌，葡萄糖酸鎂，維生素D，凍乾雞肉粉。\r\n\r\n\r\n\r\n每一份量60公克，本包裝含1份\r\n營養成份', 320, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_A★star_bone', '6_A★star_bone2', 1),
(7, 'A★star 犬專用 腸胃益生菌 60g ', 6, '有效維持腸道的高品質益生菌', 'A★star犬專用腸胃益生菌 60g (AB-185-0602)　\r\n\r\n\r\n★鳳梨酵素減少牙菌斑生成\r\n★抑制有害菌滋生，調整腸道菌叢生態\r\n★助腸胃益菌補充，全效複方一罐搞定\r\n★本產品無法取代醫療療程，相關問題請洽詢獸醫協助\r\n\r\n\r\n成份：\r\n\r\n七合一益生菌【乾酪乳桿菌(Lactobacillus casei)，副乾酪乳桿菌(Lactobacillus paracasei)，鼠李糖乳桿菌', 350, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_A★star_stomach', '6_A★star_stomach2', 1),
(8, 'A★star 犬專用 毛髮皮膚鱉蛋粉 60g ', 6, '有效維持腸道的高品質益生菌', 'A★star犬專用毛髮皮膚鱉蛋粉 60g (AB-185-0603)　\r\n\r\n★鱉蛋有高蛋白營養價值\r\n★含有豐富卵磷脂助皮膚鎖住水分\r\n★促進毛囊活化毛髮再生增加毛髮亮麗\r\n★添加酪酸菌可改善糞便及排氣惡臭\r\n★本產品無法取代醫療療程，相關問題請洽詢獸醫協助\r\n\r\n\r\n\r\n成份：\r\n\r\n鱉蛋粉，水解膠原蛋白，卵磷脂，鳳梨粉，麥芽糊精，乳糖，酵母粉，酪酸菌，甘胺酸亞鐵，維生素C，維生素D，黃地瓜粉', 350, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_A★star_hair', '6_A★star_hair2', 1),
(9, 'DELICZCY 鮮味贏家 顧好胃 亞麻籽 10gx30包', 6, '不添加人工香料及色素，給予犬貓最天然的營', '【顧好胃 (天然亞麻籽)】10G\r\n\r\n＊選用來自加拿大進口天然亞麻籽，亞麻籽富含蛋白質，OMEGA-3脂肪酸、膳食纖維、葉酸、多種維他命及礦物質，對於寵物皮膚、毛髮及腸胃消化吸收均有幫助\r\n\r\n＊加上獨家紐西蘭奶粉配方，提供天然鈣質、蛋白質、多種維生素及礦物質，給予犬貓均衡營養，對懷孕及哺乳中犬貓更是必須的營養補給品。\r\n\r\n主要原料：大豆卵磷脂、小麥胚芽、紐西蘭奶粉、蛋白質、玉米、濃縮大豆蛋白', 440, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_DELICZCY_stomach', '6_DELICZCY_stomach2', 1),
(10, 'DELICZCY 鮮味贏家 好鈣骨力 10gx30包', 6, '最佳比例的鈣與磷，幫助骨骼發育成長鞏固牙', '【好鈣骨力 (天然牛奶鈣)】10G\r\n\r\n＊最佳比例的鈣與磷、提供成長發育期及妊娠哺育期的犬貓所需，幫助骨骼發育成長鞏固牙齒\r\n\r\n＊加上獨家紐西蘭奶粉配方、提供良好適口性，增進寵物食慾、紐西蘭奶粉也提供鈣質、蛋白質、多種維生素以及礦物質，給予犬貓均衡的營養。\r\n\r\n主要原料：紐西蘭奶粉、鈣粉\r\n\r\n營養成分及含量（每１００公克）：\r\n\r\n水分1.9%、灰分49.8%、蛋白質12.5%、乳脂肪10', 690, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_DELICZCY_mike', '6_DELICZCY_mike2', 1),
(11, 'DELICZCY 鮮味贏家 海藻粉 10gx30包', 6, '幫助形成皮膚保護屏障且維持毛髮顏色亮麗柔', '【海藻粉(護膚保健)】10G\r\n\r\n＊嚴選來自愛爾蘭產之天然褐藻粉，提供寵物豐富微量礦物質、胺基酸以及多種維他命，並含多量胡蘿蔔素，能平衡飼料內不足之營養。\r\n\r\n ＊加上獨家紐西蘭奶粉配方，提供良好適口性，增進寵物食慾，幫助形成皮膚保護屏障且維持毛髮顏色亮麗柔軟並維持關節健康，讓寵物腸胃好吸收。\r\n\r\n主要原料：褐藻粉、紐西蘭奶粉\r\n\r\n營養成分及含量（每１００公克）：\r\n水分6.8%、灰分13', 280, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_DELICZCY_skin', '6_DELICZCY_skin2', 1),
(12, 'DELICZCY 鮮味贏家  Q10天然益生菌 10gx30', 6, '寵物在食用時不會造成腸胃負擔，同時增加腸', '【Q10好腸道(天然益生菌)】3G\r\n\r\n＊不添加入工香料及色素，給予犬貓最天然的營養補充。\r\n\r\n＊選用犬貓腸胃道最常見的菌種及多種乳桿菌，幫助消化。\r\n\r\n＊額外添加來自日本的輔酶Q10保護腸胃道，其抗氧化配方有助於抵抗自由基對身體的傷害。\r\n\r\n主要原料：\r\n綜合益生菌(Lactobacillus acidoyshilusLactobacillus plantarum^ Enterococc', 860, 4, 7, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_DELICZCY_onelife', '6_DELICZCY_onelife2', 1),
(13, '談狗狗的壓力行為與生活管理', 3, '人類有自我察覺壓力存在的能力，但要如何從', '課程將專注於狗狗的壓力行為表現，此堂課由 2010 年便由日本 D.I.N.G.O 在台灣成立分部的 D.I.N.G.O. 台灣 訓練師同時也是臨床獸醫師的 Joanna 江娟槿 (江江) 來替成員們上課。藉由了解狗狗的本能與需求、 肢體語言以及壓力轉移行為 ，學習到狗狗的壓力行為表現，並從生活中常見的急性與慢性壓力源的介紹中，讓飼主們了解到，在幫狗兒規劃生活環境時，可以在哪些地方進行管理以降低狗', 300, 3, 3, '2022-06-01 19:56:55', '2022-07-14 09:56:55', '2022-07-17 19:00:00', '2022-07-17 20:30:00', 100, NULL, '3_active_life', '3_active_life2', 1),
(14, '2022年寵物禮儀課程', 3, '為了讓飼主們更加了解自家可愛的毛小孩，特', '📣免費 #寵物外出禮儀課程 開跑📣\r\n你每天都刷牙，那毛孩呢？\r\n🌟第一堂【犬貓口腔照護與治療 】由以立動物醫院余騰瑋院長，帶毛爸媽好好認識毛孩的牙齒👌🏻，預防牙周病，讓毛孩擁有一口大白牙🐶🐱名額有限快來報名吧❗️\r\n\r\n\r\n👀來看看課程大綱\r\n🔰認識犬貓牙齒\r\n🔰認識牙周病\r\n🔰牙周治療\r\n🔰居家治療\r\n\r\n\r\n「課程資訊」\r\n📌課程時間：7/16 (六) 19:00-20:30\r\n📌課程地點：', 100, 3, 3, '2022-06-01 19:56:55', '2022-07-14 09:56:55', '2022-07-16 18:56:55', '2022-08-07 16:56:55', 100, NULL, '3_active_manners', '3_active_manners2', 1),
(15, '狗狗玩具-潔牙棉繩球( 2尺寸) 玩具球 潔牙球', 6, '棉繩材質耐咬，能讓毛孩磨牙，清潔按摩牙齒', '【易堆寵物 狗狗玩具-潔牙棉繩球】\r\n\r\n。當做跟毛孩跟的互動，你丟我撿，增進與毛孩間的感情\r\n。破壞力比較強的毛孩們，這一款棉繩一定是你最佳選擇！\r\n\r\n【尺寸】S號直徑約6cm (人工測量，會有少許2cm左右誤差)\r\n\r\n【尺寸】L號直徑約9CM(人工測量，會有少許2cm左右誤差)\r\n\r\n【材質】棉繩             【顏色】隨機，不挑色\r\n【產地】中國', 30, 4, 6, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 20, NULL, '6_toy', '6_toy22', 1),
(16, 'QQ 摺疊扮酷寵物墨鏡', 6, '防UV、防紫外線', '【折叠扮酷寵物墨鏡】\r\n◆可調節鏡框貼心設計，可調整長度，適合任何犬種\r\n◆眼鏡內側有泡沫墊，提高狗狗的舒適度\r\n◆不戴時，可折疊收藏，方便攜帶\r\n\r\n材質：進口無毒彈性材料\r\n尺寸：寬面18公分(cm)，長度最大可以拉到54公分(cm)\r\n\r\n產地：中國', 80, 4, 6, '2022-07-01 19:56:55', '2022-07-13 19:56:55', '2022-07-01 19:56:55', '2028-07-01 19:56:55', 10, NULL, '6_glasses', '6_glasses2', 1),
(17, 'Menforsan 愛莎蓉 貓砂盆去味除臭噴劑125ml ', 6, '有效中和減少貓咪上完廁所後散發出的阿摩利', '【貓砂盆去味除臭噴劑125ml 】\r\n●有效中和減少貓咪上完廁所後散發出的阿摩利亞味道，達到貓砂及貓砂盆除臭效果\r\n●也能有效去除寵物鼠籠的臭味。\r\n●中和pH值，無味無色配方，對寵物無害\r\n\r\n成份：水，檸檬酸\r\n使用方法：每次清理貓砂前，先直接噴在上過廁所的貓砂上。\r\n注意事項：僅供外用。\r\n避免放置寵物及孩童可及之處。\r\n\r\n容量：125ML(毫升)\r\n\r\n保存期限：5年', 276, 4, 4, '2022-07-10 19:56:55', '2022-07-12 19:56:55', '2022-07-01 19:56:55', '2033-07-01 19:56:55', 50, NULL, '6_Smelly', '6_Smelly2', 1),
(18, '寵物蒙古包窩 小灰貓造型 (小型犬窩 狗窩)', 6, '窩和內墊可以分離，方便清洗晾乾，手感柔軟', '【寵物蒙古包窩 小灰貓造型 (小型犬窩 狗窩)】\r\n。蒙古包設計，冬暖夏涼，四季舒適，給足寵物安全感\r\n。使用高品質短毛絨，觸感舒適柔軟，睡覺更保暖、更好眠\r\n。吊掛小球，不僅能睡還能玩耍\r\n。內墊雙面皆可使用!\r\n。比較合適4KG以下的寵物使用\r\n\r\n注意事項：\r\n商品屬於貼身接觸性衛生商品，購買後若經拆封及使用過，恕無法退貨，請見諒！\r\n\r\n洗滌保養：\r\n可洗衣機清洗，裝進洗衣袋裡機洗，不變形', 398, 4, 4, '2022-07-10 19:56:55', '2022-07-12 19:56:55', '2022-07-01 19:56:55', '2033-07-01 19:56:55', 5, NULL, '6_doghouse', '6_doghouse2,6_doghouse3,6_doghouse4', 1),
(19, '珊瑚絨寵物毛毯 (不挑色) 寵物保暖毯 外出毯', 6, '。舒適保暖，保暖度極佳', '【珊瑚絨寵物毛毯 (不挑色) 寵物保暖毯 外出毯】\r\n。舒適保暖，保暖度極佳\r\n。清洗方便\r\n\r\n注意事項：\r\n商品屬於貼身接觸性衛生商品，購買後若經拆封及使用過，恕無法退貨，請見諒！\r\n\r\n洗滌保養：\r\n40度以下手洗，不可漂白，懸挂晾乾低溫熨燙，暖和乾洗，中性洗滌液單獨洗滌，不可長時間浸泡。\r\n\r\n【顏色】不挑色\r\n【規格】50x70cm(人工測量，會有少許5cm左右誤差)\r\n【材質】珊瑚絨 ', 70, 4, 4, '2022-05-05 19:56:55', '2022-07-12 19:56:55', '2022-07-01 19:56:55', '2033-07-01 19:56:55', 15, NULL, '6_blanket', '6_blanket2,6_blanket3,6_blanket4,6_blanket5', 1),
(20, ' 墾丁小迷鹿 寵物友善旅店 1680元起', 1, '四人/8~18人包層住宿，寵物友善旅店，', '【旅館介紹】\r\n年輕、活潑、開心、充滿朝氣，是【小鹿文娛】的特點。親切但不失專業的服務態度與精神，為每一位旅人帶來無微不至的照料與重視，透過精心設計的民宿與房型，與您建立深沉的連結，成為您旅途中最好的夥伴，深受旅客們所喜愛！若您想要暢遊墾丁，【墾丁小迷鹿C’est La Vie Villa】絕對是您最好的選擇！\r\n\r\n【票券兌換說明】\r\n優惠期間：自 2022 年 08 月 01日 起兌換至 20', 2680, 1, 1, '2022-06-22 19:56:55', '2022-07-14 09:56:55', '2022-08-01 00:00:00', '2022-10-31 00:00:00', 10, NULL, '1_cestlavievilla', '1_cestlavievilla2,1_cestlavievilla3,1_cestlavievilla4,1_cestlavievilla5', 1),
(21, 'Two Puppies寵物友善餐廳  經典雙人餐', 2, '「毛孩子，我們都愛。」來羽毛小孩的雙人約', '寵物友善餐廳 TWO PUPPIES 以愛為出發點，提供一個完善服務的空間，盡情讓家中毛小孩可以在此享樂。當然，你也能好好坐下來 QK 一下 ~ 本次推出經典雙人餐，義大麵任選二 (可選茄汁/奶油) ，要搶要快，以免向隅。\r\n\r\n【餐點介紹】\r\n♕奶油德腸義大利麵\r\n濃濃奶香直撲鼻來，勾勒出麵條的靈魂，加上玉米筍、德式香腸等新鮮配料，絕妙滋味，爽度破表。\r\n\r\n♕茄汁野菇義大利麵\r\n茄汁的甘、酸、', 350, 2, 2, '2022-07-12 10:37:33', '2022-07-14 10:37:33', '2022-07-01 10:37:33', '2022-07-31 10:37:33', 90, NULL, '1_Two Puppies', '1_Two Puppies,1_Two Puppies2,1_Two Puppies3,1_Two Puppies4,1_Two Puppies5', 1),
(22, '墾丁-享墾丁大灣小舖  雙人/三人/四人住宿 1780起', 1, '寵物友善民宿 ', '【兌換說明】\r\n優惠期間：自 2022 年 07 月 05 日 起兌換至 2022 年 09 月 30 日，週一至週日適用(週六需加價)\r\n不適用日：國定假日及連續假日(不含最後一日)\r\n假日加價\r\n1. 非暑假週六需加價1000元使用\r\n2. 暑假(07/01~08/31)週六需加價1500元使用\r\n本檔不符合國旅卡補助資格\r\n本優惠AB方案限 2 人、C方案限 3 人、D方案限 4 人使用\r\n', 1780, 1, 1, '2022-07-12 10:37:33', '2022-07-14 10:37:33', '2022-07-05 10:37:33', '2022-09-30 23:59:59', 30, NULL, '1_enjoy', '1_enjoy2,1_enjoy2,1_enjoy3,1_enjoy4,1_enjoy5,1_enjoy6,1_enjoy7,1_enjoy8,1_enjoy9,1_enjoy10', 1),
(23, '宜蘭-田中歐寒集寵物親子民宿 雙人/四人住宿 999元起', 1, '寵物友善民宿 ', '【田中歐寒集寵物親子民宿】位於宜蘭冬山鄉，鄰近童玩節的主場－冬山河親水公園，以及能充分感受宜蘭在地人土風情薰陶、體驗懷舊風情的國立傳統藝術中心、利澤老街，得天獨厚的地理位置，無疑是您暢遊宜蘭的最佳據點！\r\n\r\n當您入住【田中歐寒集寵物親子民宿】，您可以騎乘單車，漫步冬山河畔，欣賞明媚的山河綠意，飽覽都市見不到的美景；也可以驅車前往羅東市區，造訪人氣景點－羅東夜市，品味在地的美味小吃，計畫一場大飽口', 999, 1, 1, '2022-07-12 10:37:33', '2022-07-14 10:37:33', '2022-06-15 00:00:00', '2022-12-29 23:59:59', 30, NULL, '2_field', '1_field2,1_field3,\r\n1_field4,1_field5,\r\n1_field6,1_field7,\r\n1_field8,1_field9,\r\n1_field10', 1),
(24, '大園101景觀餐廳 消費抵用券500元', 2, '寵物友善，和毛小孩一起好好欣賞夜景跟星空', '●●大園101景觀餐廳●●\r\n抬頭享受飛機從頭頂呼嘯而過的刺激、豎耳體會飛機引擎震撼無比的聲響，全亞洲賞機高度最高的景觀餐廳──【大園101景觀餐廳】，要讓您體會充滿臨場感的飛機起降景緻，將桃園機場，以及繁華熱鬧的大園市區風景一眼盡收！店內菜色以豐富的無國界料理為主，無論是想和飛機來一場浪漫的下午茶，亦或是與心愛的人兩兩相坐，一面享用餐食、一面享受飛機飛上天際的難得景象，還是與三五好友相聚，用豐盛', 399, 2, 2, '2022-07-12 10:37:33', '2022-07-14 10:37:33', '2022-06-21 10:37:33', '2022-09-21 10:37:33', 90, NULL, '1_101', '2_101_2,2_101_3,\r\n2_101_4,2_101_5,\r\n2_101_6,2_101_7,\r\n2_101_8,2_101_9,\r\n2_102_10', 1),
(25, '陽明山國家公園門票 ', 1, '帶著寵物，來爬個小百岳登上台北市第一高峰', '【園區簡介】\r\n陽明山國家公園因受緯度及海拔之影響，氣候分屬亞熱帶氣候區與暖溫帶氣候區，且季風型氣候極為明顯。\r\n\r\n春季2、3月，陽明山上天氣乍暖還寒，冬天的茶花、梅花陸續凋謝，山櫻、杜鵑、華八仙、臺北堇菜、山寶鐸、烏皮九芎等緊接登場，高大的喬木也抽出嫩芽，紅、粉、白、黃、綠……繽紛的色彩一掃隆冬的陰霾、單調，而將大地粧點得分外動人。夏季在西南季風的吹拂下，午後偶有雷陣雨，霧雨初晴時，山區常可見', 50, 1, 1, '2022-07-12 10:37:33', '2022-07-14 10:37:33', '2022-07-05 00:00:00', '2022-11-30 23:59:59', 100, NULL, '1_mountain', '1_mountain2,1_mountain3', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_class`
--

CREATE TABLE `product_class` (
  `id` int(3) NOT NULL,
  `p_type_id` tinyint(1) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_class`
--

INSERT INTO `product_class` (`id`, `p_type_id`, `name`) VALUES
(1, 1, '旅遊票券'),
(2, 2, '餐廳票券'),
(3, 3, '活動票券'),
(4, 4, '寵物周邊＞寵物外出用品'),
(5, 4, '寵物周邊＞寵物飼料'),
(6, 4, '寵物周邊＞寵物玩具'),
(7, 4, '寵物周邊＞寵物保健');

-- --------------------------------------------------------

--
-- 資料表結構 `p_type`
--

CREATE TABLE `p_type` (
  `id` tinyint(1) NOT NULL,
  `type_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `p_type`
--

INSERT INTO `p_type` (`id`, `type_name`) VALUES
(1, '旅遊票券列表'),
(2, '餐廳票券列表'),
(3, '活動票券列表'),
(4, '實體產品列表');

-- --------------------------------------------------------

--
-- 資料表結構 `store_info`
--

CREATE TABLE `store_info` (
  `id` int(3) NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_right` tinyint(1) NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `store_info`
--

INSERT INTO `store_info` (`id`, `account`, `name`, `password`, `area`, `address`, `store_right`, `photo`, `phone`, `email`, `create_time`, `valid`) VALUES
(1, 'sleep', '睡壞旅行', 'huang', '北部', '台北市士林區華岡路55號', 2, NULL, NULL, 'big@gmail.com', '2022-07-07 13:24:48', 1),
(2, 'howard', '豪大餐館', 'big', '北部', '新北市淡水區英專路151號', 3, 'somi.jpg', NULL, 'haha@gmail.com', '2022-07-07 13:38:54', 1),
(3, 'rain', '雨信趴趴走', 'OwO', '北部', '桃園市中壢區中北路200號', 1, 'Rose.jpg', NULL, 'OwO @gmail.com', '2022-07-07 13:39:03', 1),
(4, 'nille', '麻麻寵物館', 'mama', '中部', '台中市西屯區台灣大道四段1727號', 1, 'jisco.jpg', NULL, 'mama@gmail.com', '2022-07-10 13:29:29', 1),
(5, 'luis', '學儒沙龍', 'aniki', '北部', '台北市士林區臨溪路70號', 1, 'Rose.jpg', NULL, 'aniki@gmail.com', '2022-07-10 13:29:29', 1),
(6, 'wangwang', '汪汪先輩', 'wangwang', '北部', '桃園市中壢區新生路二段421號', 1, 'Rose.jpg', NULL, 'wangwang@gmail.com', '2022-07-11 17:31:14', 1),
(7, 'strong', '笑強量販店', 'strong', '南部', '高雄市燕巢區大學路1號', 4, 'iu.jpg', NULL, 'strong@gmail.com', '2022-07-07 13:38:54', 1);

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
(1, '豪爽', 'howard', 'big', 'big@gmail.com', '2022-07-07 13:24:48', 1),
(2, '強強', 'strong', 'haha', 'haha@gmail.com', '2022-07-07 13:38:54', 1),
(3, '掐島怪', 'sleep', 'bad', 'bad@gmail.com', '2022-07-07 13:38:58', 1),
(4, '忙內', 'rain', 'OwO', 'OwO\n@gmail.com', '2022-07-07 13:39:03', 1),
(5, '麻麻', 'nille', 'mama', 'mama@gmail.com', '2022-07-10 13:29:29', 1),
(6, '阿尼基', 'luis', 'aniki', 'aniki@gmail.com', '2022-07-10 13:29:29', 1),
(7, '毆逗給', 'wangwang', 'wangwang', 'wangwang@gmail.com', '2022-07-11 17:31:14', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `discount_category`
--
ALTER TABLE `discount_category`
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
-- 資料表索引 `p_type`
--
ALTER TABLE `p_type`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `discount_category`
--
ALTER TABLE `discount_category`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_class`
--
ALTER TABLE `product_class`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `p_type`
--
ALTER TABLE `p_type`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store_info`
--
ALTER TABLE `store_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
