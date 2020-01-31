-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Oca 2020, 13:37:12
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
  `customers_company` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Company Name',
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

INSERT INTO `customers` (`customers_id`, `customers_company`, `customers_product`, `customers_mb`, `customers_application`, `customers_pb`, `customers_pf`, `customers_equivalent`) VALUES
(37, 'X Plastik', 'Deneme ÃœrÃ¼n AdÄ±asdfasdfasdfasdfasdf', '1', 'Deneme Uygulama.', '1', '2', 'Deneme Muadil'),
(38, 'asd Sanayi', 'iphone', '1', 'pvc\r\nk70\r\nk58\r\nsatbil 1\r\nstabil 2\r\ncaco3', '1', '2', 'qweqweqwe'),
(39, 'Microsoft', 'Keyboard', '1', 'Applied', '1', '1', 'Equ'),
(40, 'apple', 'iphone', '2', 'camera', '2', '1', 'asdasdasd'),
(41, 'aoc', 'monitor', '1', 'asdasdasd', '1', '2', 'asdasczxc'),
(42, 'apple', 'asdasdasdasd asdasdasdasd', '2', 'asd', '1', '1', 'asdasdasd'),
(43, 'aoc', 'iphone', '1', 'asdasdas', '1', '1', 'asdasdas'),
(44, 'Microsoft', 'asdasdas', '1', 'asdasd', '1', '1', 'asdasdasd'),
(45, 'aoc', 'asdfasdf', '1', 'asdfasdfasdf', '2', '2', 'asdfasdfsd'),
(46, 'apple', 'asdfasdfasd', '1', 'asdfasdf', '1', '1', 'asdfasdfasdf'),
(47, 'apple', 'asdfasdfasdf', '1', 'asdfasdf', '2', '1', 'asdfasdfasdf'),
(48, 'Microsoft', 'iphone', '2', 'asdfasdf', '1', '1', 'asdfasdfasdf'),
(49, 'asd Sanayiaa', 'asdf', '1', 'asdf', '2', '2', 'asdf'),
(50, 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 'sdfsdf', '2', 'sdf', '1', '2', 'sdfsdf'),
(51, 'Microsoft', 'son', '2', 'asd', '1', '1', 'asd'),
(53, 'Derpen Pvc Pencere ve KapÄ± sistemleri', 'asd', '2', 'asd', '2', '2', 'asd'),
(54, 'Ãœnplast Polyester Plastik San. Tic. Ltd. Åžti.', 'asd', '2', 'asd', '2', '1', 'asdasd');

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
(7, 'PVC K - 66 / 67', 'Example Explanation'),
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
(29, 'Other', 'E.G. New');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tests`
--

CREATE TABLE `tests` (
  `tests_id` int(11) NOT NULL COMMENT 'ID',
  `tests_company` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Company Name',
  `tests_pg` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Product Group',
  `tests_mp` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Machine Parameters',
  `tests_date` date NOT NULL COMMENT 'Test Date',
  `tests_formula` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Formula',
  `tests_output` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'Output',
  `tests_by` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Test By',
  `tests_result` varchar(25) COLLATE utf8_turkish_ci NOT NULL COMMENT '1 = approved ~ 2 = need modify ~ 3 = unapproved ',
  `tests_file` text COLLATE utf8_turkish_ci COMMENT 'Extensions File'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tests`
--

INSERT INTO `tests` (`tests_id`, `tests_company`, `tests_pg`, `tests_mp`, `tests_date`, `tests_formula`, `tests_output`, `tests_by`, `tests_result`, `tests_file`) VALUES
(71, 'ilk ÅžÃ‡Ã–', 'Atk.Su.Bor-Pb', 'asd', '2020-01-27', 'klÅŸ', 'ilk', 'ergun.bekir', '3', NULL),
(72, 'd', 'Enj.Bor-Pb', 'd', '2019-12-26', 'd', 'd', 'oztekin.meric', '2', NULL),
(73, 'asd', 'Tmz.Su.Bor-Pb', 'asd', '2019-12-27', 'asd', 'asd', 'akkaynak.ali', '1', NULL),
(74, '12', 'Kbl-Ca', 'xcv', '2019-12-12', 'xcv ', 'xcv', 'kucukbayrak.ruchan', '2', NULL),
(75, 'KurtoÄŸlu Plastik', 'Kbl-Ca', 'sdf', '2019-12-13', 'sdf', 'sdf', 'aksoy.fatih', '3', NULL),
(76, 'Etapak', 'Rnk.Pnc.Prf-Ca', 'deneme', '2019-10-03', 'deneme', 'deneme', 'kunt.kenan', '1', NULL),
(77, 'ARDA AMBALAJ PLASTÄ°K SAN.TÄ°C.LTD.ÅžTÄ°', 'Enj.Bor-Pb', 'asd', '2019-12-12', 'asd', 'asd', 'kucukbayrak.ruchan', '3', NULL),
(78, 'PÃ¼l-san Plastik', 'Kbl-Pb', 'asd', '2019-12-06', 'asd', 'asd', 'kucukbayrak.ruchan', '1', NULL),
(79, 'Ã‡etin Elektro Plastik ???', 'Atk.Su.Br-Ca', 'asd', '2018-04-04', 'asd', 'asd', 'citak.omer', '2', NULL),
(82, 'Deneme', 'Rnk.Pnc.Prf-Ca', 'denendi', '2019-12-19', 'denendi', 'denendi', 'ergun.bekir', '1', NULL),
(83, 'Yeni MÃ¼ÅŸteri', 'Enj.Bor-Ca', 'deneme', '2019-12-14', 'deneme', 'deneme', 'aksoy.fatih', '1', NULL),
(84, 'Åžirket 1', 'Byz.Pnc.Prf-Pb', 'Deneme Parametre', '2019-10-17', 'Deneme FormÃ¼l', 'Test Ã‡Ä±ktÄ±larÄ±mÄ± bla bla bla', 'aksoy.fatih', '2', NULL),
(85, 'Denemedir', 'Tmz.Su.Bor-Ca', 'Aa', '2020-01-08', 'Aa', 'Aa', 'aksoy.fatih', '1', NULL),
(86, '???', 'Enj.Bor-Pb', 'asd', '2020-01-02', 'asd', 'asd', 'kunt.kenan', '2', NULL),
(87, 'batuhan son', 'Enj.Bor-Ca', 'asd', '0000-00-00', 'asd', 'asd', 'aksoy.fatih', '3', NULL),
(88, 'asdasd', 'Tmz.Su.Bor-Ca', 'asd', '2020-01-31', 'asd', 'asd', 'aksoy.fatih', '1', NULL),
(89, 'asdf', 'Atk.Su.Bor-Ca', 'asdf', '1970-01-01', 'asdfasdf', 'asdf', 'aksoy.fatih', '1', NULL),
(90, 'asd', 'Tmz.Su.Bor-Pb', 'asd', '1970-01-01', 'asd', 'asd', 'oztekin.meric', '1', NULL),
(91, 'deneme 11qwe', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-09', 'asd', 'asd', 'ergun.bekir', '2', NULL),
(92, 'asd', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-02', 'asd', 'asd', 'kunt.kenan', '1', NULL),
(93, 'osmanlÄ±yÄ±z', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-17', 'asd', 'asd', 'ergun.bekir', '2', NULL),
(94, 'yeni bir deneme', 'Byz.Pnc.Prf-Pb', 'asda', '2020-01-09', 'asd', 'sd', 'aksoy.fatih', '2', NULL),
(95, 'yeni bir deneme', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-02', 'asd', 'asd', 'aksoy.fatih', '1', NULL),
(96, 'yeni bir deneme', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-17', 'asd', 'asd', 'ergun.bekir', '2', NULL),
(97, 'son', 'Rnk.Pnc.Prf-Pb', 'son', '2020-01-01', 'son', 'son', 'ergun.bekir', '1', NULL),
(98, 'asdf', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-16', 'asd', 'asd', 'kunt.kenan', '1', NULL),
(99, 'ahahah denedimasd', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-09', 'asdasd', 'asd', 'kunt.kenan', '2', NULL),
(100, 'ASHDGasd', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-09', 'asd', 'asd', 'ergun.bekir', '1', NULL),
(101, 'ASHDGasd', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-18', 'asd', 'asd', 'kunt.kenan', '2', NULL),
(102, 'bi bakalÄ±m', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-09', 'asd', 'asd', 'aksoy.fatih', '1', NULL),
(103, 'Ek Dosya', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-16', 'asd', 'asd', 'ergun.bekir', '1', NULL),
(104, 'Ek Dosya', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-03', 'asd', 'asd', 'ergun.bekir', '1', NULL),
(105, 'Ek Dosya', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-01', 'asd', 'asd', 'ergun.bekir', '2', NULL),
(106, 'Ek Dosya', 'Byz.Pnc.Prf-Ca', 'qwer', '2020-01-09', 'qwer', 'qer', 'citak.omer', '2', NULL),
(107, 'Test Bilgileri', 'Rnk.Pnc.Prf-Pb', 'asd', '2020-01-01', 'asd', 'asd', 'akkaynak.ali', '1', NULL),
(108, 'deneme', 'Rnk.Pnc.Prf-Pb', 'deneme', '2020-01-08', 'denemedenemedenemedeneme', 'deneme', 'aksoy.fatih', '1', '../assests/images/stock/177725e26b524276d5.jpg'),
(109, 'ahahaha', 'Rnk.Pnc.Prf-Ca', 'asdf', '2020-01-31', 'asdf', 'asdf', 'ergun.bekir', '1', '../assests/images/stock/300215e26e4b7230ef.jpg'),
(110, 'asdf', 'Byz.Pnc.Prf-Ca', 'asdf', '2020-01-25', 'asdf', 'asdf', 'kucukbayrak.ruchan', '1', '../assests/images/stock/243555e26e4db9fdd1.jpg'),
(111, 'asdfasdfdas', 'Rnk.Pnc.Prf-Pb', 'asdf', '2020-01-30', 'asdf', 'asdf', 'kucukbayrak.ruchan', '2', '../assests/images/stock/235845e26e51a8d929.jpg'),
(112, '6', 'Byz.Pnc.Prf-Ca', 'asdf', '2020-01-03', 'asdf', 'asdf', 'aksoy.fatih', '1', '../assests/images/stock/28345e32bb6b9fc5a.png'),
(113, 'ROYAL PLASTIK', 'Atk.Su.Bor-Ca', 'asd', '2020-01-03', 'asd', 'asd', 'ergun.bekir', '2', '../assests/images/stock/128895e32bbba47994.png'),
(114, 'ASAÅž', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-09', 'asd', 'asd', 'kucukbayrak.ruchan', '2', '../assests/images/stock/154445e32bd8585ce0.png'),
(115, 'Saray', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-16', 'asd', 'asd', 'kucukbayrak.ruchan', '1', '../assests/images/stock/253155e32bff85cd2e.jpg'),
(116, 'Saray', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-01', 'asd', 'asd', 'aksoy.fatih', '1', '../assests/images/stock/307725e32c037c9061.jpg'),
(117, 'Acro TK Plastik', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-03', 'asd', 'asd', 'akkaynak.ali', '1', '../assests/images/stock/159025e3401c9ad9b9.png'),
(118, 'BEÅžOK KalÄ±p ve Plastik', 'Byz.Pnc.Prf-Ca', 'dasd', '2020-01-03', 'asd', 'asd', 'akkaynak.ali', '1', '../assests/images/stock/307175e3403b72cfed.jpg'),
(119, 'Hisar Plastik', 'Atk.Su.Bor-Pb', 'asd', '2020-01-17', 'asd', 'asd', 'ergun.bekir', '1', '../assests/images/stock/34085e3404928eaa2.png'),
(120, 'ASAÅž', 'Kbl-Pb', 'asd', '2020-01-02', 'asd', 'asd', 'aksoy.fatih', '1', '../assests/images/stock/190075e3405339e008.jpg'),
(121, 'Ãœnplast Polyester Plastik San. Tic. Ltd. Åžti.', 'Byz.Pnc.Prf-Ca', 'asd', '2020-01-09', 'asd', 'asd', 'ergun.bekir', '1', '../assests/images/stock/181755e34060471971.png'),
(122, 'Deceuninck', 'Byz.Pnc.Prf-Pb', 'asd', '2020-01-09', 'asd', 'asd', 'kunt.kenan', '1', '../assests/images/stock/73725e34065231a04.jpg');

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
  MODIFY `companies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=55;

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
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `tests`
--
ALTER TABLE `tests`
  MODIFY `tests_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=123;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
