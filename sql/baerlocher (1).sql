-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Şub 2020, 14:49:27
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `baerlocher`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `companies`
--

CREATE TABLE `companies` (
  `companies_id` int(11) NOT NULL,
  `companies_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `companies`
--

INSERT INTO `companies` (`companies_id`, `companies_name`) VALUES
(4, 'ASAÅž'),
(5, 'Deceuninck'),
(6, 'Saray'),
(8, 'Ãœnplast Polyester Plastik San. Tic. Ltd. Åžti.'),
(9, 'KARATAÅž PLASTÄ°K'),
(10, 'Hisar Plastik'),
(11, 'Derpen Pvc Pencere ve KapÄ± sistemleri'),
(12, 'ROYAL PLASTIK'),
(13, 'PÃ¼l-san Plastik'),
(14, 'PETAK PLASTÄ°K Plastik EndÃ¼striyel TasarÄ±m KalÄ±pÃ§Ä±lÄ±ÄŸÄ±'),
(15, 'Sertur Plastik'),
(16, 'Dusem Plastik'),
(17, 'Acro TK Plastik'),
(18, 'Form Plastik'),
(19, 'BEÅžOK KalÄ±p ve Plastik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL COMMENT 'ID',
  `companies_id` int(11) NOT NULL COMMENT 'Company Name',
  `customers_product` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Product',
  `customers_mb` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'MB',
  `customers_application` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Application',
  `customers_pb` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Product Base',
  `customers_pf` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Product Form',
  `customers_equivalent` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Equivalent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`customers_id`, `companies_id`, `customers_product`, `customers_mb`, `customers_application`, `customers_pb`, `customers_pf`, `customers_equivalent`) VALUES
(58, 6, 'producwasd', '1', 'appasdf', '2', '1', 'eq'),
(59, 19, 'asd', '2', 'asd', '1', '2', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `client_contact` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `due` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`) VALUES
(1, '1970-01-01', 'SipariÅŸ 1', '05656584852', '4126.20', '742.72', '4868.92', '0', '4868.92', '1523', '3345.92', 2, 1, 1, '742.72', 1, 1),
(2, '2019-12-09', 'SipariÅŸ 2', '123234234', '739.50', '133.11', '872.61', '0', '872.61', '0', '872.61', 2, 3, 2, '133.11', 1, 1),
(4, '2019-11-12', 'SipariÅŸ 4', '12323434', '1798.60', '323.75', '2122.35', '500', '1622.35', '4200', '-2577.65', 2, 2, 1, '730.91', 1, 3),
(5, '1970-01-01', 'asd', 'asd', '204.40', '36.79', '241.19', '2', '239.19', '23', '216.19', 1, 1, 1, '36.79', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(2, 2, 2, '13', '14.50', '188.50', 1),
(3, 2, 2, '19', '14.50', '275.50', 1),
(4, 2, 2, '19', '14.50', '275.50', 1),
(5, 3, 4, '23', '14.60', '335.80', 2),
(6, 3, 2, '33', '14.50', '478.50', 2),
(7, 3, 1, '44', '52.90', '2327.60', 2),
(12, 5, 4, '14', '14.60', '204.40', 1),
(14, 4, 1, '34', '52.90', '1798.60', 1),
(16, 1, 1, '78', '52.90', '4126.20', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_image` text COLLATE utf8_turkish_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, '\"AZÄ°MDAÄž\" GENEL MAKSATLI PVC FÄ°LM/LEVHA', '../assests/images/stock/67975df9d16a4049a.jpg', 3, 13, '94', '52.90', 1, 1),
(3, 'Filli Boya Beyaz Astar', '../assests/images/stock/267225def8fd95ec0d.jpg', 13, 12, '94', '64.80', 2, 1),
(4, 'KÃ¶pÃ¼k tahta YalÄ±tÄ±m Malzemesi', '../assests/images/stock/117755def912116a6e.jpg', 2, 11, '943', '14.60', 1, 1),
(8, 'asdsad', '../assests/images/stock/154065df8df581888e.jpg', 2, 23, '12e', '2e2', 1, 1),
(9, 'asdasd', '../assests/images/stock/251995e009df8ad091.JPG', 1, 11, '123', '234', 1, 1),
(10, 'deneme', '../assests/images/stock/6175e05aba2729aa.jpg', 24, 26, '2', '32', 1, 1),
(11, '1 METRE 100MM SN 4 HDPE KORUGE BORU', '../assests/images/stock/5420712605e0dcfbd1b27e.jpg', 24, 14, '260', '7.90', 1, 1),
(12, 'Beyaz Pencere Profili', '../assests/images/stock/9524686965e0dd069c2d08.jpg', 26, 8, '445', '3.70', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `products_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_detail`) VALUES
(7, 'PVC K - 66 / 67s', 'Example Explanations'),
(8, 'PVC - K 70', 'Example Explanation'),
(9, 'PVC - K 58', 'Example Explanation'),
(10, 'PVC - 63', 'Example Explanation'),
(11, 'Stabilizer 1', 'Example Explanation'),
(12, 'Stabilizer 2', 'Example Explanation'),
(13, 'CaCO3', 'Example Explanation'),
(14, 'Impact Modifier', 'Example Explanation'),
(15, 'Titanium Dioxide', 'Example Explanation'),
(16, 'Processing Aid 1', 'Example Explanation'),
(17, 'Processing Aid 2', 'Example Explanation'),
(18, 'CPE', 'Example Explanation'),
(19, 'Stearic Acid', 'Example Explanation'),
(20, 'Plasticizer 1', 'Example Explanation'),
(21, 'Plasticizer 2', 'Example Explanation'),
(22, 'Lubricant 1', 'Lubricant '),
(23, 'Lubricant 2', 'Lubricant '),
(24, 'Lubricant 3', 'Lubricant '),
(25, 'Lubricant 4', 'Lubricant '),
(26, 'Additive 1', 'Example Detail'),
(27, 'Additive 2', 'Example'),
(28, 'Pigment 1', 'example 11'),
(29, 'Other', 'E.G. New'),
(30, 'aaa', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `recipe_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `customer_name`, `recipe_status`, `user_id`) VALUES
(37, 'Standart Window Profile', 'Asas / Deceuninck / Saray', 1, 1),
(38, 'asd', 'asd', 2, 1),
(39, 'Waste Water Pipe', 'Saray / Asas', 1, 3),
(40, 'Plastic Pipe', 'Asas', 1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipe_item`
--

CREATE TABLE `recipe_item` (
  `recipe_item_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL DEFAULT '0',
  `products_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `recipe_item_status` int(11) NOT NULL DEFAULT '0',
  `products_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `recipe_item`
--

INSERT INTO `recipe_item` (`recipe_item_id`, `recipe_id`, `products_id`, `quantity`, `recipe_item_status`, `products_detail`) VALUES
(54, 37, 22, '3.80', 1, 'Lubricant '),
(55, 37, 7, '100.0', 1, 'Example Explanation'),
(56, 37, 13, '14.00', 1, 'Example Explanation'),
(57, 38, 9, '3', 2, 'Example Explanation'),
(58, 38, 11, '1', 2, 'Example Explanation'),
(59, 38, 22, '2', 2, 'Lubricant '),
(60, 39, 9, '10.0', 1, 'Example Explanation'),
(61, 39, 13, '22.4', 1, 'Example Explanation'),
(62, 39, 19, '12', 1, 'Example Explanation'),
(63, 39, 20, '1', 1, 'Example Explanation'),
(64, 39, 22, '4', 1, 'Lubricant '),
(65, 39, 17, '100', 1, 'Example Explanation'),
(66, 40, 9, '4.84', 1, 'Example Explanation');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tests`
--

CREATE TABLE `tests` (
  `tests_id` int(11) NOT NULL COMMENT 'ID',
  `tests_pg` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Product Group',
  `tests_mp` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Machine Parameters',
  `tests_date` date NOT NULL COMMENT 'Test Date',
  `tests_formula` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Formula',
  `tests_output` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Output',
  `tests_by` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Test By',
  `tests_result` varchar(25) COLLATE utf8_turkish_ci NOT NULL COMMENT '1 = approved ~ 2 = need modify ~ 3 = unapproved ',
  `tests_file` text COLLATE utf8_turkish_ci COMMENT 'Extensions File',
  `companies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tests`
--

INSERT INTO `tests` (`tests_id`, `tests_pg`, `tests_mp`, `tests_date`, `tests_formula`, `tests_output`, `tests_by`, `tests_result`, `tests_file`, `companies_id`) VALUES
(12, 'Tmz.Su.Bor-Pb', 'paramÃ§Ã¶', '2020-02-14', 'ww', 'Ã§Ä±ktÄ±', 'kunt.kenan', '1', '../assests/images/stock/90755e3a9987ab4fb.jpg', 12),
(13, 'Byz.Pnc.Prf-Ca', 'adsf', '2020-02-06', 'sdaf', 'adsf', 'ergun.bekir', '3', '../assests/images/stock/238175e3a771f68049.jpg', 4),
(14, 'Enj.Bor-Ca', 'asdf', '2020-02-13', 'asdf', 'asdf', 'aksoy.fatih', '1', '../assests/images/stock/5045e423ac989ba5.jpg', 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'baer', '81dc9bdb52d04dc20036dbd8313ed055', 'info@batuhansaygin.com'),
(3, 'aksoy.fatih', '81dc9bdb52d04dc20036dbd8313ed055', 'aksoy.fatih@baerlocher.com'),
(4, 'ergun.bekir', '81dc9bdb52d04dc20036dbd8313ed055', 'ergun.bekir@baerlocher.com'),
(5, 'kucukbayrak.ruchan', '81dc9bdb52d04dc20036dbd8313ed055', 'kucukbayrak.ruchan@baerlocher.com'),
(6, 'citak.omer', '81dc9bdb52d04dc20036dbd8313ed055', 'citak.omer@baerlocher.com'),
(7, 'kunt.kenan', '81dc9bdb52d04dc20036dbd8313ed055', 'kunt.kenan@baerlocher.com'),
(8, 'oztekin.meric', '81dc9bdb52d04dc20036dbd8313ed055', 'oztekin.meric@baerlocher.com'),
(9, 'akkaynak.ali', '81dc9bdb52d04dc20036dbd8313ed055', 'akkaynak.ali@baerlocher.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companies_id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Tablo için indeksler `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Tablo için indeksler `recipe_item`
--
ALTER TABLE `recipe_item`
  ADD PRIMARY KEY (`recipe_item_id`);

--
-- Tablo için indeksler `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tests_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `companies`
--
ALTER TABLE `companies`
  MODIFY `companies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `recipe_item`
--
ALTER TABLE `recipe_item`
  MODIFY `recipe_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Tablo için AUTO_INCREMENT değeri `tests`
--
ALTER TABLE `tests`
  MODIFY `tests_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
