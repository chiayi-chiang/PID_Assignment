-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-26 17:04:09
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

create database food character set utf8;

use food;
--

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `cID` int(11) NOT NULL DEFAULT 0,
  `cName` varchar(20) NOT NULL DEFAULT '',
  `Address` varchar(50) DEFAULT NULL,
  `Phone` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `customers`
--

INSERT INTO `customers` (`cID`, `cName`, `Address`, `Phone`) VALUES
(1, '賴勝恩', '台中市中區三民路1巷10號', '0951983366'),
(2, '黎楚寧', '台中市西區仁愛路100號', '0918123456'),
(3, '蔡中穎', '台中市東區建國北路10號', '0907408965'),
(4, '徐佳螢', '台中市中區民族路204號', '0916456723'),
(5, '林雨媗', '台中市西屯區北環路2巷80號', '0918976588');

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `oID` int(30) NOT NULL DEFAULT 0,
  `mID` int(11) NOT NULL DEFAULT 0,
  `UnitPrice` smallint(6) NOT NULL DEFAULT 0,
  `Quantity` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `details`
--

INSERT INTO `details` (`oID`, `mID`, `UnitPrice`, `Quantity`) VALUES
(10201, 1, 70, 2),
(10201, 2, 75, 3),
(10202, 2, 75, 1),
(10203, 7, 85, 5),
(10204, 2, 75, 3),
(10204, 7, 85, 2),
(10205, 3, 75, 5),
(10205, 6, 75, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `mID` int(11) NOT NULL DEFAULT 0,
  `mName` varchar(40) NOT NULL DEFAULT '',
  `rID` int(11) NOT NULL DEFAULT 0,
  `UnitPrice` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`mID`, `mName`, `rID`, `UnitPrice`) VALUES
(1, '煎餃10個', 1, 70),
(2, '豬排便當', 2, 75),
(3, '雞排便當', 2, 75),
(4, '牛肉炒飯', 3, 75),
(5, '咖哩雞飯', 4, 75),
(6, '雞排便當', 5, 75),
(7, '豬排便當', 6, 85);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `oID` int(30) NOT NULL DEFAULT 0,
  `cID` int(11) NOT NULL,
  `sID` int(11) DEFAULT NULL,
  `OrderDate` timestamp NULL DEFAULT NULL,
  `ShipDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`oID`, `cID`, `sID`, `OrderDate`, `ShipDate`) VALUES
(10201, 5, 2, '2006-03-28 08:30:20', '2006-03-29 03:30:10'),
(10202, 3, 3, '2007-04-08 08:30:30', '2007-04-10 08:42:30'),
(10203, 2, 1, '2008-05-28 08:40:10', '2008-05-30 09:30:20'),
(10204, 1, 1, '2009-02-10 01:30:00', '2009-02-12 09:38:25'),
(10205, 4, 3, '2010-02-28 08:30:00', '2010-02-28 08:30:00');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurants`
--

CREATE TABLE `restaurants` (
  `rID` int(11) NOT NULL DEFAULT 0,
  `rName` varchar(40) NOT NULL DEFAULT '',
  `Address` varchar(50) NOT NULL DEFAULT '',
  `Phone` varchar(24) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurants`
--

INSERT INTO `restaurants` (`rID`, `rName`, `Address`, `Phone`) VALUES
(1, '煎豐食客', '台北市西屯區黎明路三段22號', '(04)2451-7837'),
(2, '一品香', '台中市西屯區漢口路二段103號1樓', '(04)2316-6265'),
(3, '芋香庭', '台中市西屯區西屯路二段136號', '(04)2314-1918'),
(4, '直人咖哩', '台中市北區北平路二段100之1號', '(04)2291-0199'),
(5, '南村食堂', '台中市西屯區漢口路二段19之3號', '(04)2312-0322'),
(6, '裕和屋', '台中市西屯區甘肅路二段194號', '(04)2316-6265');

-- --------------------------------------------------------

--
-- 資料表結構 `shippers`
--

CREATE TABLE `shippers` (
  `sID` int(11) NOT NULL DEFAULT 0,
  `sName` varchar(20) NOT NULL DEFAULT '',
  `sPhone` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `shippers`
--

INSERT INTO `shippers` (`sID`, `sName`, `sPhone`) VALUES
(1, '簡奉君', '0922988876'),
(2, '黃靖輪', '0918181111'),
(3, '潘四敬', '0914530768');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cID`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`mID`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`);

--
-- 資料表索引 `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rID`);

--
-- 資料表索引 `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`sID`);
COMMIT;

ALTER TABLE `details`
  ADD CONSTRAINT `fk_orders_details` 
  FOREIGN KEY (`oID`) 
  REFERENCES `orders` (`oID`) 
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `details`
  ADD CONSTRAINT `fk_menus_details` 
  FOREIGN KEY (`mID`) 
  REFERENCES `menus` (`mID`) 
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customers_orders` 
  FOREIGN KEY (`cID`) 
  REFERENCES `customers` (`cID`) 
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `fk_shippers_orders` 
  FOREIGN KEY (`sID`) 
  REFERENCES `shippers` (`sID`) 
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `menus`
  ADD CONSTRAINT `fk_restaurants_menus` 
  FOREIGN KEY (`rID`) 
  REFERENCES `restaurants` (`rID`) 
  ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
