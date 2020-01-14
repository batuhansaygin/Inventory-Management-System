-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Oca 2020, 09:12:34
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.26

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
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT 0,
  `brand_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(24, 'Deneme', 1, 1),
(25, 'aaa', 2, 1),
(26, 'Baerlocher', 1, 1),
(27, 'aghsd', 2, 1),
(28, 'ASAÅž', 1, 1),
(29, 'ETKÄ°N PLASTÄ°K KALIP MAKÄ°NA SAN.VE TÄ°C.', 1, 1),
(30, 'Ã‡etin Elektro Plastik', 1, 1),
(31, 'A.g.m Plastik Ambalaj', 1, 1),
(32, 'Ã‡ankaya plastik, Ãœretim SaksÄ±sÄ±', 1, 1),
(33, 'Alptekin Plastik', 1, 1),
(34, 'şöçÇ', 1, 1),
(35, 'batu ışğüçöÇÖİŞÜĞ', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0,
  `categories_description` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`, `categories_description`) VALUES
(8, 'Florlu Polimerler', 1, 1, '1'),
(9, 'Poliolefinler12', 1, 1, 'deneme'),
(11, 'Polistiren', 1, 1, 'PS ya da polistiren, Ä±sÄ±tÄ±ldÄ±ÄŸÄ±nda yumuÅŸayan ve film, plaka gibi yarÄ± bitmiÅŸ Ã¼rÃ¼nlere ve birÃ§ok birÃ§ok bitmiÅŸ Ã¼rÃ¼ne dÃ¶nÃ¼ÅŸtÃ¼rÃ¼lebilen termoplastik bir polimerdir.'),
(12, 'PoliÃ¼retanlar', 1, 1, 'PUR (ya da poliÃ¼retan) direnÃ§li, esnek ve dayanÄ±klÄ± bir Ã¼rÃ¼ndÃ¼r.'),
(13, 'PolivinilklorÃ¼r', 2, 1, 'PVC ya da polivinil klorÃ¼r Ã¼retilen ilk plastiklerden birisidir ve Ã§ok yaygÄ±n bir kullanÄ±ma sahiptir. Tuz (%57) ve petrol yahut gazdan (%43) elde edilir.'),
(14, 'Termoplastikler', 1, 1, 'Termoplastik, Ä±sÄ±tÄ±ldÄ±ÄŸÄ±nda homojen bir sÄ±vÄ± haline gelen ve soÄŸutulduÄŸunda sertleÅŸen polimer reÃ§inelerinden Ã¼retilen bir plastik tÃ¼rÃ¼dÃ¼r. Ancak termoplastik dondurulduÄŸu zaman cama benzer ve Ã§atlamaya elveriÅŸli bir hal alÄ±r. Malzemeye adÄ±nÄ± veren bu Ã¶zellikler ...'),
(15, 'Termosetler', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer enim est, sagittis at leo sit amet, vulputate viverra nisi. Aliquam suscipit quam a orci ultrices, et ultrices mauris ornare. Curabitur viverra imperdiet semper. Maecenas a sapien nisi. Nulla eleifend, elit eget dapibus ultrices, mi ipsum tristique sapien, sit amet sagittis massa eros ut metus. Suspendisse orci purus, egestas sed eleifend tincidunt, ullamcorper sed ex. Aenean consectetur pellentesque tincidunt. Vestibulum dui ligula, dignissim a est vel, pellentesque sodales felis. Mauris eleifend orci non velit tempor eleifend. Praesent ac lacus placerat, lobortis elit sit amet, finibus enim. Etiam nec massa in tellus sollicitudin blandit. Sed id purus dolor.\r\n\r\nCurabitur magna diam, sollicitudin id sagittis eu, consectetur quis est. Duis ac erat id ipsum ultricies aliquet vitae id enim. Aliquam erat volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis sit amet neque turpis. Nulla quis lacus lectus. Vivamus ex diam, egestas ac vehicula at, blandit eu risus. Etiam eu congue massa. Vestibulum eleifend elit tempus tellus volutpat dapibus. Nunc vitae facilisis sem. Aenean nec lorem consequat, efficitur eros vitae, tristique odio. Praesent varius, mauris a accumsan vulputate, ante nulla lacinia magna, et sodales nibh dui eu justo.\r\n\r\nProin justo mi, suscipit ornare porttitor eu, cursus nec velit. Phasellus tristique accumsan enim in molestie. Nunc augue orci, sodales vitae gravida et, faucibus vitae tellus. Fusce vel nisl sem. Sed sed purus ex. Nunc dapibus elit at augue facilisis, condimentum accumsan tortor ultricies. Nunc finibus rhoncus vestibulum. Nulla non nunc ut nisi vulputate egestas nec eget nisi. Morbi a tortor orci. Duis tincidunt purus ante, a cursus massa dictum nec. Fusce nibh metus, tincidunt sed porttitor ut, bibendum sed nulla.\r\n\r\nMauris ullamcorper euismod orci vitae auctor. Donec eget luctus ipsum. Pellentesque consectetur ipsum risus, sed sagittis diam pellentesque vel. Praesent quis elit rutrum, condimentum tellus in, dapibus est. Quisque vel enim elit. Maecenas vehicula aliquam blandit. Donec sed tellus ante. Praesent nibh neque, faucibus quis justo eu, tristique pulvinar lorem. Nulla facilisi.\r\n\r\nAliquam molestie sollicitudin iaculis. Nulla a purus id est interdum elementum. Sed maximus nisi non ligula vehicula, quis iaculis leo ornare. Phasellus non justo sed elit auctor luctus. Cras quis felis vitae dui commodo dapibus. In sollicitudin mi nec turpis venenatis, vel rhoncus nulla pretium. Proin sodales gravida lectus, eget imperdiet urna suscipit non. Nam sagittis, tellus at placerat consectetur, arcu augue molestie quam, non iaculis quam lacus nec tortor. Maecenas mollis dolor sed pretium tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam at egestas sem, eget rutrum nisl.\r\n\r\nDuis ultricies ultricies turpis, sit amet fermentum justo semper in. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam mattis odio et nunc cursus, quis rhoncus lectus finibus. Morbi pretium enim quis felis consequat ultricies. Curabitur sed tortor lorem. Vivamus eget hendrerit arcu. Morbi non ipsum dapibus, tempus mi eget, sodales dolor. Integer egestas tristique felis, et pulvinar mi consectetur a. Sed tincidunt, justo a porttitor cursus, purus velit tincidunt ante, a cursus sapien ligula ut massa. Vivamus sit amet odio ut diam aliquet consectetur. Curabitur nec massa vitae tortor blandit maximus. In vel tempor nunc. Suspendisse dignissim felis et felis aliquet accumsan. Sed dignissim nisl elit, porttitor maximus sem vestibulum commodo. Ut malesuada finibus quam.\r\n\r\nUt et eros eu turpis commodo tincidunt id at dolor. In tristique tellus non felis fringilla auctor. Fusce auctor mi arcu, sed volutpat nibh dapibus quis. Sed ac arcu enim. Aenean sit amet elit varius, accumsan justo vitae, euismod arcu. Nunc imperdiet sagittis nulla ut consectetur. Suspendisse potenti. Nulla tempus eget enim vitae lobortis. Etiam vestibulum metus id sagittis hendrerit. Etiam bibendum volutpat aliquet. In venenatis tortor nec est dignissim, a placerat nisl efficitur. Proin hendrerit mi vitae lacus molestie congue. Duis ut nulla accumsan, dapibus nisi in, ornare sem. Integer pharetra dignissim augue quis tempor.\r\n\r\nAliquam ac pharetra enim. Curabitur nisl tellus, condimentum eget quam nec, fringilla malesuada sapien. Aenean bibendum cursus neque, luctus pellentesque odio aliquam id. Proin finibus, lacus nec vulputate dignissim, justo erat porta nibh, vel auctor turpis velit non tellus. Aliquam erat volutpat. Morbi diam enim, consectetur nec ex vel, interdum pellentesque urna. Ut at diam et eros faucibus scelerisque.\r\n\r\nProin id ipsum sit amet ante accumsan luctus vel at eros. Aliquam eget velit vel sem pulvinar efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras volutpat iaculis leo, id faucibus amet.'),
(16, 'deded', 2, 2, 'deded'),
(17, 'asdasd', 2, 1, 'asdasd'),
(18, 'asdasdasd', 1, 1, 'asdasdas'),
(19, 'zxczxc', 1, 1, 'zxc'),
(20, 'zxczxc', 1, 1, 'zxczxc'),
(21, 'zxcqac', 1, 1, 'zxc'),
(22, 'wdxc', 1, 1, 'qwcac'),
(23, 'zxczxc', 1, 1, 'ascasczx'),
(24, 'Deneme Web 123', 2, 1, 'Deneme Web 123'),
(25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer enim est, sagittis at leo sit amet, vulputate viverra nisi. Aliquam suscipit quam a orci ultrices, et ultrices mauris ornare. Curabitur viverra imperdiet semper. Maecenas a sapien nisi. Null', 1, 1, 'asdasdasdse'),
(26, 'wefwscfw3', 1, 1, 'sefsd'),
(28, 'adktif_deneme', 1, 1, 'asdadaszxcas'),
(29, 'bu gÃ¼ncellemeden sonraki denemedir', 1, 1, 'dÃ¼zeltildi'),
(30, 'Ã‡Åž.Ä°ÅžÄžÃœÃ–', 1, 1, 'Ã‡Åž.Ä°ÅžÄžÃœÃ–'),
(32, 'denedim oldu', 1, 1, 'denedim oldu'),
(33, 'şşşş', 2, 1, 'şşş');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_group` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `machine_parameters` text COLLATE utf8_turkish_ci NOT NULL,
  `test_date` date NOT NULL,
  `test_formula` text COLLATE utf8_turkish_ci NOT NULL,
  `test_result` text COLLATE utf8_turkish_ci NOT NULL,
  `test_by` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `result` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `product_group`, `machine_parameters`, `test_date`, `test_formula`, `test_result`, `test_by`, `result`) VALUES
(70, 'deneme', 'Tmz.Su.Br-Pb', 'asd', '2019-12-05', 'asd', 'asd', 'aksoy.fatih', ''),
(71, 's', 'By.Pnc.Prf-Pb', 'aa', '2019-12-08', 'aa', 'aa', 'citak.omer', ''),
(72, 'd', 'By.Pnc.Prf-Pb', 'd', '2019-12-17', 'd', 'd', 'oztekin.meric', ''),
(73, 'asd', 'By.Pnc.Prf-Ca', 'asd', '2019-12-27', 'asd', 'asd', 'akkaynak.ali', ''),
(74, '12', 'Atk.Su.Br-Ca', 'xcv', '2019-12-12', 'xcv ', 'xcv', 'kucukbayrak.ruchan', ''),
(75, 'KurtoÄŸlu Plastik', 'By.Pnc.Prf-Pb', 'sdf', '2019-12-13', 'sdf', 'sdf', 'aksoy.fatih', ''),
(76, 'Etapak', 'Atk.Su.Br-Ca', 'deneme', '2019-10-03', 'deneme', 'deneme', 'kunt.kenan', ''),
(77, 'ARDA AMBALAJ PLASTÄ°K SAN.TÄ°C.LTD.ÅžTÄ°', 'Enj.Bar-Pb', 'asd', '2019-12-12', 'asd', 'asd', 'kucukbayrak.ruchan', ''),
(78, 'PÃ¼l-san Plastik', 'Rk.Pnc.Prf-Pb', 'asd', '2019-12-06', 'asd', 'asd', 'kucukbayrak.ruchan', ''),
(79, 'Ã‡etin Elektro Plastik ŞŞŞ', 'Atk.Su.Br-Ca', 'asd', '2018-04-04', 'asd', 'asd', 'citak.omer', ''),
(80, '', '', '', '1970-01-01', '', '', '', ''),
(82, 'Deneme', 'By.Pnc.Prf-Pb', 'denendi', '2019-12-19', 'denendi', 'denendi', 'aksoy.fatih', 'approved'),
(83, 'Yeni MÃ¼ÅŸteri', 'Enj.Bar-Ca', 'deneme', '2019-12-14', 'deneme', 'deneme', 'aksoy.fatih', 'unapproved'),
(84, 'Åžirket 1', 'Rk.Pnc.Prf-Pb', 'Deneme Parametre', '2019-10-17', 'Deneme FormÃ¼l', 'Test Ã‡Ä±ktÄ±larÄ±mÄ± bla bla bla', 'aksoy.fatih', '2'),
(85, 'Denemedir', 'Rk.Pnc.Prf-Pb', 'Aa', '2020-01-08', 'Aa', 'Aa', 'aksoy.fatih', '1'),
(86, 'ŞŞŞ', 'By.Pnc.Prf-Pb', 'asd', '2020-01-02', 'asd', 'asd', 'kunt.kenan', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mb` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `application` text COLLATE utf8_turkish_ci NOT NULL,
  `product_base` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_form` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `equivalent` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `product_name`, `mb`, `application`, `product_base`, `product_form`, `equivalent`) VALUES
(4, 'batuhan', 'asd', '2', 'asd', '1', '1', 'asd'),
(5, 'batuhan', 's', '1', 'asd', '2', '2', 'asd'),
(6, 'batuhan', 'asd', '2', 'asd', '2', '2', 'asd'),
(7, 'asd', 'asd', '2', 'asd', '2', '2', 'asd'),
(8, 'asd', 'asd', '2', 'asd', '2', '2', 'asd'),
(9, 'asd', 'asd', '2', 'asd', '1', '2', 'asd'),
(10, 'asd', 'asd', '2', 'asd', '2', '2', 'asd'),
(11, 'asd', 'asd', '1', 'asd', '1', '1', 'asd'),
(12, 'osman', 'asd', '1', 'asd', '1', '1', 'asd');

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
  `order_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`) VALUES
(1, '2019-12-04', 'SipariÅŸ 1', '05656584852', '4126.20', '742.72', '4868.92', '0', '4868.92', '1523', '3345.92', 2, 1, 1, '742.72', 1, 1),
(2, '2019-12-09', 'SipariÅŸ 2', '123234234', '739.50', '133.11', '872.61', '0', '872.61', '0', '872.61', 2, 3, 2, '133.11', 1, 1),
(4, '2019-11-12', 'SipariÅŸ 4', '12323434', '1798.60', '323.75', '2122.35', '500', '1622.35', '4200', '-2577.65', 2, 2, 1, '730.91', 1, 3),
(5, '1970-01-01', 'asd', 'asd', '204.40', '36.79', '241.19', '2', '239.19', '23', '216.19', 1, 1, 1, '36.79', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '78', '52.90', '4126.20', 1),
(2, 2, 2, '13', '14.50', '188.50', 1),
(3, 2, 2, '19', '14.50', '275.50', 1),
(4, 2, 2, '19', '14.50', '275.50', 1),
(5, 3, 4, '23', '14.60', '335.80', 2),
(6, 3, 2, '33', '14.50', '478.50', 2),
(7, 3, 1, '44', '52.90', '2327.60', 2),
(12, 5, 4, '14', '14.60', '204.40', 1),
(14, 4, 1, '34', '52.90', '1798.60', 1);

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
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
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
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

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
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
