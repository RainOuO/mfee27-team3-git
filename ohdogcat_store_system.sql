-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-11 11:48:33
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
(1, '狗狗救生衣', 1, '當狗狗想玩水的時候，如果保證狗狗的安全呢', '當狗狗想玩水的時候，如果保證狗狗的安全呢？\r\n擁有天使翅膀救生衣，我們再也不用擔心狗狗的玩水\r\n天使翅膀救生衣全程呵護狗狗盡情歡快的玩水\r\n來吧，讓狗狗度過一個愉快的玩水季節a', 550, 4, 2, '2022-07-10 15:23:20', NULL, '2022-07-07 00:05:00', '2022-07-09 06:06:00', 25, 2, '', '', 0),
(2, 'WAKE n\' BAKE寵物餐廳雙人餐券', 2, '餐券 #套餐 #台北 #', '#餐券 #套餐 #台北 #兌換券 #寵物餐廳 #貓咪 #愛貓人士最愛 \n\n使用期限：107/9/30前（限定平日星期一～四）\n餐廳地址：台北市信義區永吉路30巷158弄18號(近捷運市政府站4 號出口)', 250, 2, 2, '2022-07-12 11:43:48', NULL, '2022-07-16 00:00:00', '2022-07-21 00:00:00', 5, 2, 'restaurant-ticket.png', 'restaurant-ticket.png', 0),
(3, '寵物拾便袋 拾便袋 車用垃圾袋 寶寶尿布袋 寵物外出拾便袋 ', 1, '不管是帶寵物出門~~拉屎裝垃圾都方便~', '一捲15抽~~\n尺寸：29*21公分\n外出超方便\n不管是帶寵物出門~~拉屎裝垃圾都方便~\n或是 車用垃圾袋~小而輕巧\n或是寶寶換布布時~裝尿布的隔離袋~\n或是女生生理期來~裝換下來的棉棉也非常衛生哦\n都非常好用哦~~\n我的賣場裡 另有拾便盒哦!!\n攤開為A4影印紙的大小哦~', 50, 4, 7, '2022-07-07 13:00:37', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', 50, 3, 'dogsuit.jpg', 'dogsuit.jpg', 1),
(4, '潔牙骨', 3, 'OODIES [耐嚼型潔牙棒8', 'GOODIES [耐嚼型潔牙棒85g] 中大型犬1支入 寵物零食 狗狗零食 狗狗潔牙骨 寵物潔牙骨', 650, 4, 6, '2022-07-12 13:13:35', NULL, '2022-07-15 00:00:00', '2022-07-16 00:00:00', 30, NULL, 'dog2.jpg', 'dog2.jpg', 1),
(5, '貓咪造型衣服', 1, '造型', '貓咪造型衣服', 790, 4, 6, '2022-07-12 13:13:35', NULL, '2022-07-15 00:00:00', '2022-07-16 00:00:00', 10, NULL, '', '', 1),
(6, '搔癢棒', 1, '貓咪玩具', '貓咪玩具', 1190, 4, 6, '2022-07-12 13:13:35', NULL, '2022-07-15 00:00:00', '2022-07-16 00:00:00', 15, NULL, 'dog2.jpg', '', 1),
(7, '寵物項圈 寵物三角巾 寵物領巾 寵物口水巾 寵物用品', 1, NULL, '【日系寵物圍巾】\r\n🌟戴起來超可愛。\r\n🔸適合貓咪、小型犬(中大型犬請聊聊私訊!!)\r\n🔸可伸縮調整長度\r\n🔸優質帆布製作\r\n🔸帶寬1cm 頸圍20-33cm 三角巾尺寸: 寬14cm 高9cm', 150, 4, 6, '2022-07-05 15:14:42', NULL, '2022-07-09 00:00:00', '2022-07-16 00:00:00', NULL, NULL, '', '', 1),
(8, '貓砂1公斤11元', 2, NULL, '【★工廠直營★】【★市場最低價★】【★現貨現寄★】\r\n========================\r\n【購買1袋】1袋規格下單數量請填~25 = 25公斤（1袋）\r\n                    【總結帳375元含運】', 150, 4, 7, '2022-07-07 15:17:24', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', NULL, NULL, '', '', 1),
(9, '【王品集團】西堤牛排 WOWPrime實體票', 1, NULL, '商品內容\r\n\r\n\"西堤牛排”精選上等牛肉，多道精緻料理，完美演繹食材豐富您挑剔的味蕾，以熱情入味、時尚熱情的紐約客風格，為你的生活注入新活力，讓每位顧客創新體驗，盡享美味。\r\n\r\n※營業時間：\r\n11:30-14:30（最後點餐時間14:00）\r\n17:30-22:00（最後點餐時間21:00）\r\n\r\n※據點及電話請洽官網：\r\nhttps://www.tasty.com.tw/store_all.', 625, 2, 2, '2022-07-07 15:43:12', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', NULL, NULL, '', '', 1),
(10, '【蟹老闆獨木舟】小琉球透明獨木舟體驗', 2, NULL, '商品內容\r\n\r\n來深藍海域乘著透明獨木舟，一覽海底景色，是小琉球必玩的水上活動。\r\n免費提供拍攝珍貴畫面。\r\n\r\n※費用包含：救生衣、獨木舟體驗、衛浴設備使用、鑰匙置物櫃、供應商提供的活動保險。\r\n※有4個場次可預約：08:00、10:00、13:00、15:00。\r\n※全程約90分鐘。\r\n※滿7歲以上報名，所有年齡均一價。\r\n※若您報名的人數未達獨木舟乘載人數（基本2人共乘1艘），將會與其他同團', 800, 3, 3, '2022-07-07 15:44:16', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', NULL, NULL, '', '', 1),
(11, '【會動的文藝復興（高雄站）】雙人套票・贈文藝復興自動折傘乙把', 3, NULL, '商品內容\r\n\r\n👍限定活動、限量優惠\r\n※僅適用2022年05月27日早上08:00起新成立之訂單，方可適用此優惠方案。\r\n※數量有限，售完為止，欲購從速。\r\n\r\n※每一套包含：\r\n　2張【會動的文藝復興（高雄站）】預售單人票（實體票）\r\n　1張《會動的文藝復興》自動折傘乙把兌換券（不挑款，憑券現場領取）\r\n　※贈品請持贈品兌換券正本，於觀展後至周邊商品區領取。\r\n\r\n文藝復興名畫動起來📽史上最全', 780, 3, 3, '2022-07-07 15:45:35', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', NULL, NULL, '', '', 1),
(12, '寵物造型馬克杯', 3, NULL, '寵物造型馬克杯', 190, 4, 7, '2022-07-07 20:47:27', NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00', NULL, NULL, '', '', 1),
(13, '252', 0, 'dfdf', 'fdfd', 150, 2, 2, '2022-07-10 12:57:59', NULL, '2022-07-05 00:00:00', '2022-07-15 00:00:00', 20, 2, '', '', 1),
(14, '狗肉堡aaaaaa', 0, 'fdfdasdasdasdasd', 'fdfdasdasdasdasd', 3500, 1, 2, '2022-07-10 14:45:55', NULL, '2022-07-16 00:06:00', '2022-07-30 00:05:00', 20, 2, '', '', 1),
(15, '狗肉堡525', 0, '吃肉肉', 'fdfd', 350, 1, 3, '2022-07-10 13:05:06', NULL, '2022-07-05 00:00:00', '2022-07-15 00:00:00', 20, 4, '', '', 1),
(16, '劉學儒', 0, '吃肉肉', '好吃的肉肉', 350, 3, 3, '2022-07-10 13:12:43', NULL, '2022-07-05 00:00:00', '2022-07-22 00:00:00', 15, 2, '0605春日林地.png', '0605春日林地.png', 1),
(17, '劉學儒D', 0, 'djkj', 'dfdfdfdsfdfdfdsa', 1500, 1, 2, '2022-07-10 13:15:17', NULL, '2022-07-04 00:00:00', '2022-07-16 00:00:00', 0, 2, '0605春日林地.png', '0605春日林地.png', 1),
(18, '狗項圈', 0, '狗狗的項圈', '', 790, 0, 3, '2022-07-10 15:19:47', NULL, '2022-07-11 12:51:00', '2022-07-21 15:19:00', 0, 0, '', '', 1),
(19, 'f', 0, 'df', '', 0, 0, 0, '2022-07-10 15:20:46', NULL, '2022-07-06 15:20:00', '2022-07-06 15:20:00', 0, 0, '', '', 1),
(20, '劉學儒', 0, 'fd', 'fdfd', 3, 0, 2, '2022-07-10 20:14:04', NULL, '2022-06-30 20:13:00', '2022-07-18 20:15:00', 0, 2, '', '', 1);

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
(1, 1, 'Marvel'),
(2, 1, 'DC'),
(3, 2, '國民黨'),
(4, 2, '民進黨'),
(5, 2, '共產黨'),
(6, 3, '會跑的'),
(7, 3, '會飛的'),
(8, 4, '手機周邊'),
(9, 4, '電腦周邊'),
(10, 4, '家電用品');

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
(1, 'IU', 'Lee Ji Eun', '1234', '北部', '101大樓台北市信義區 市府路45號', 2, NULL, '0123456789', 'TwiceClub@test.com', NULL, 1),
(2, 'Rose', 'BlackPink', '111', '中部', '桃園市中壢區新生路421號', 4, NULL, '02223', 'BlackPinkClub@test.com', NULL, 1),
(3, 'Rain', 'GOD', '111', '北部', '新北1234567', 4, 'iu.jpg', '111234', '111@yahoo.com.tw', NULL, 1),
(4, 'Lisa', 'GoddesLisa', '111', '', '', 3, NULL, NULL, NULL, NULL, 1),
(5, 'Jisco', '智秀', '111', '', '', 1, NULL, NULL, NULL, NULL, 1),
(6, 'somi', 'XOXO', '111', '', '', 1, 'somi.jpg', NULL, NULL, NULL, 1),
(7, 'MayDay', '五月天', '11', '', '', 1, 'Rose.jpg', NULL, NULL, NULL, 1),
(8, 'BTS', '防彈少年團', '111', '北部', '', 1, 'jisco.jpg', '123', '123@yahoo.com.tw', NULL, 1),
(9, 'ITZY', 'ITZYYYY', '111', '', '', 1, 'Rose.jpg', NULL, NULL, NULL, 1),
(10, 'Audi', 'R8', '111', '北部', '新3', 2, 'logo.svg', '123', '1111@12.com', NULL, 1);

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
(1, '帥哥', 'mfee22', 'fee64c78c27d9b3e0ec7da3adeba3c', 'gg@gmail.com', '2022-07-07 13:24:48', 1),
(2, '強效柯', 'mfee21', 'fee64c78c27d9b3e0ec7da3adeba3c', 'aa@gmail.com', '2022-07-07 13:38:54', 1),
(3, '黃穗懷', 'mfee10', 'fee64c78c27d9b3e0ec7da3adeba3c', '87@gmail.com', '2022-07-07 13:38:58', 1),
(4, '雨信OuO', 'mfee28', 'fee64c78c27d9b3e0ec7da3adeba3c', '69@gmail.com', '2022-07-07 13:39:03', 1),
(5, '采平麻麻', 'mfee11', '', 'mama@gmail.com', '2022-07-10 13:29:29', 0),
(6, '學儒阿尼基', 'mfee04', '', 'aniki@gmail.com', '2022-07-10 13:29:29', 0);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_class`
--
ALTER TABLE `product_class`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `p_type`
--
ALTER TABLE `p_type`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store_info`
--
ALTER TABLE `store_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
