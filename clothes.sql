-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 08 月 27 日 09:41
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `clothes`
--

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `oID` int(11) UNSIGNED NOT NULL,
  `goodID` int(11) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `details`
--

INSERT INTO `details` (`oID`, `goodID`, `Quantity`) VALUES
(1, 1, 2),
(1, 2, 3),
(2, 2, 1),
(3, 7, 5),
(4, 2, 3),
(4, 7, 2),
(5, 3, 5),
(5, 6, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `good`
--

CREATE TABLE `good` (
  `goodID` int(11) UNSIGNED NOT NULL,
  `mName` varchar(40) NOT NULL DEFAULT '',
  `rID` int(11) UNSIGNED NOT NULL,
  `UnitPrice` smallint(6) NOT NULL DEFAULT '0',
  `picture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good`
--

INSERT INTO `good` (`goodID`, `mName`, `rID`, `UnitPrice`, `picture`) VALUES
(1, '拉鍊運動式上衣', 1, 2480, '1.jpg'),
(2, '運動外套', 2, 2000, '2.jpg'),
(3, '運動背心', 2, 1080, '3.jpg'),
(4, '印花緊身褲', 3, 1680, '4.jpg'),
(5, '素色緊身褲', 4, 1880, '5.jpg'),
(6, '素色七分褲', 5, 1480, '6.jpg'),
(7, '短袖棉Ｔ血', 6, 1080, '7.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `uID` int(11) UNSIGNED NOT NULL,
  `unumber` varchar(20) NOT NULL,
  `uPasswd` varchar(50) DEFAULT NULL,
  `uName` varchar(20) NOT NULL DEFAULT '',
  `uAddress` varchar(50) DEFAULT NULL,
  `uPhone` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`uID`, `unumber`, `uPasswd`, `uName`, `uAddress`, `uPhone`) VALUES
(1, 'lai', 'lai1234', '賴勝恩', '台中市中區三民路1巷10號', '0951983366'),
(2, 'li', 'li1234', '黎楚寧', '台中市西區仁愛路100號', '0918123456'),
(3, 'tsai', 'tsai1234', '蔡中穎', '台中市東區建國北路10號', '0907408965'),
(4, 'shiu', 'shiu1234', '徐佳螢', '台中市中區民族路204號', '0916456723'),
(5, 'lin', 'lin1234', '林雨媗', '台中市西屯區北環路2巷80號', '0918976588');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `oID` int(11) UNSIGNED NOT NULL,
  `uID` int(11) UNSIGNED NOT NULL,
  `sID` int(11) UNSIGNED NOT NULL,
  `OrderDate` timestamp NULL DEFAULT NULL,
  `storeDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`oID`, `uID`, `sID`, `OrderDate`, `storeDate`) VALUES
(1, 5, 2, '2006-03-28 00:30:20', '2006-04-03 19:30:10'),
(2, 3, 3, '2007-04-08 00:30:30', '2007-04-15 00:42:30'),
(3, 2, 1, '2008-05-28 00:40:10', '2008-06-04 01:30:20'),
(4, 1, 1, '2009-02-09 17:30:00', '2009-02-17 01:38:25'),
(5, 4, 3, '2010-02-28 00:30:00', '2010-03-07 00:30:00');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurants`
--

CREATE TABLE `restaurants` (
  `rID` int(11) UNSIGNED NOT NULL,
  `rName` varchar(40) NOT NULL DEFAULT '',
  `rAddress` varchar(50) NOT NULL DEFAULT '',
  `rPhone` varchar(24) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurants`
--

INSERT INTO `restaurants` (`rID`, `rName`, `rAddress`, `rPhone`) VALUES
(1, 'LEVI\'S', '台北市西屯區黎明路三段22號', '(04)2451-7837'),
(2, 'new baiance', '台中市西屯區漢口路二段103號1樓', '(04)2316-6265'),
(3, 'PAZZO', '台中市西屯區西屯路二段136號', '(04)2314-1918'),
(4, 'HOT 本舖', '台中市北區北平路二段100之1號', '(04)2291-0199'),
(5, 'CORE XIN', '台中市西屯區漢口路二段19之3號', '(04)2312-0322'),
(6, 'NIKE', '台中市西屯區甘肅路二段194號', '(04)2316-6265');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `sID` int(11) UNSIGNED NOT NULL,
  `sName` varchar(20) NOT NULL DEFAULT '',
  `sAddress` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `store`
--

INSERT INTO `store` (`sID`, `sName`, `sAddress`) VALUES
(1, '7-11黎明店', '台北市西屯區黎明路三段22號'),
(2, 'OK漢口店', '台中市西屯區漢口路二段103號1樓'),
(3, '全家西屯店', '台中市西屯區西屯路二段136號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD KEY `fk_orders_details` (`oID`),
  ADD KEY `fk_good_details` (`goodID`);

--
-- 資料表索引 `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`goodID`),
  ADD KEY `fk_restaurants_good` (`rID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uID`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`),
  ADD KEY `fk_member_orders` (`uID`),
  ADD KEY `fk_store_orders` (`sID`);

--
-- 資料表索引 `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rID`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good`
--
ALTER TABLE `good`
  MODIFY `goodID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `uID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `oID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store`
--
ALTER TABLE `store`
  MODIFY `sID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_good_details` FOREIGN KEY (`goodID`) REFERENCES `good` (`goodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_details` FOREIGN KEY (`oID`) REFERENCES `orders` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `fk_restaurants_good` FOREIGN KEY (`rID`) REFERENCES `restaurants` (`rID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_member_orders` FOREIGN KEY (`uID`) REFERENCES `member` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_store_orders` FOREIGN KEY (`sID`) REFERENCES `store` (`sID`) ON DELETE CASCADE ON UPDATE CASCADE;
-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 08 月 27 日 09:41
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `clothes`
--

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `oID` int(11) UNSIGNED NOT NULL,
  `goodID` int(11) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `details`
--

INSERT INTO `details` (`oID`, `goodID`, `Quantity`) VALUES
(1, 1, 2),
(1, 2, 3),
(2, 2, 1),
(3, 7, 5),
(4, 2, 3),
(4, 7, 2),
(5, 3, 5),
(5, 6, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `good`
--

CREATE TABLE `good` (
  `goodID` int(11) UNSIGNED NOT NULL,
  `mName` varchar(40) NOT NULL DEFAULT '',
  `rID` int(11) UNSIGNED NOT NULL,
  `UnitPrice` smallint(6) NOT NULL DEFAULT '0',
  `picture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good`
--

INSERT INTO `good` (`goodID`, `mName`, `rID`, `UnitPrice`, `picture`) VALUES
(1, '拉鍊運動式上衣', 1, 2480, '1.jpg'),
(2, '運動外套', 2, 2000, '2.jpg'),
(3, '運動背心', 2, 1080, '3.jpg'),
(4, '印花緊身褲', 3, 1680, '4.jpg'),
(5, '素色緊身褲', 4, 1880, '5.jpg'),
(6, '素色七分褲', 5, 1480, '6.jpg'),
(7, '短袖棉Ｔ血', 6, 1080, '7.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `uID` int(11) UNSIGNED NOT NULL,
  `unumber` varchar(20) NOT NULL,
  `uPasswd` varchar(50) DEFAULT NULL,
  `uName` varchar(20) NOT NULL DEFAULT '',
  `uAddress` varchar(50) DEFAULT NULL,
  `uPhone` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`uID`, `unumber`, `uPasswd`, `uName`, `uAddress`, `uPhone`) VALUES
(1, 'lai', 'lai1234', '賴勝恩', '台中市中區三民路1巷10號', '0951983366'),
(2, 'li', 'li1234', '黎楚寧', '台中市西區仁愛路100號', '0918123456'),
(3, 'tsai', 'tsai1234', '蔡中穎', '台中市東區建國北路10號', '0907408965'),
(4, 'shiu', 'shiu1234', '徐佳螢', '台中市中區民族路204號', '0916456723'),
(5, 'lin', 'lin1234', '林雨媗', '台中市西屯區北環路2巷80號', '0918976588');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `oID` int(11) UNSIGNED NOT NULL,
  `uID` int(11) UNSIGNED NOT NULL,
  `sID` int(11) UNSIGNED NOT NULL,
  `OrderDate` timestamp NULL DEFAULT NULL,
  `storeDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`oID`, `uID`, `sID`, `OrderDate`, `storeDate`) VALUES
(1, 5, 2, '2006-03-28 00:30:20', '2006-04-03 19:30:10'),
(2, 3, 3, '2007-04-08 00:30:30', '2007-04-15 00:42:30'),
(3, 2, 1, '2008-05-28 00:40:10', '2008-06-04 01:30:20'),
(4, 1, 1, '2009-02-09 17:30:00', '2009-02-17 01:38:25'),
(5, 4, 3, '2010-02-28 00:30:00', '2010-03-07 00:30:00');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurants`
--

CREATE TABLE `restaurants` (
  `rID` int(11) UNSIGNED NOT NULL,
  `rName` varchar(40) NOT NULL DEFAULT '',
  `rAddress` varchar(50) NOT NULL DEFAULT '',
  `rPhone` varchar(24) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurants`
--

INSERT INTO `restaurants` (`rID`, `rName`, `rAddress`, `rPhone`) VALUES
(1, 'LEVI\'S', '台北市西屯區黎明路三段22號', '(04)2451-7837'),
(2, 'new baiance', '台中市西屯區漢口路二段103號1樓', '(04)2316-6265'),
(3, 'PAZZO', '台中市西屯區西屯路二段136號', '(04)2314-1918'),
(4, 'HOT 本舖', '台中市北區北平路二段100之1號', '(04)2291-0199'),
(5, 'CORE XIN', '台中市西屯區漢口路二段19之3號', '(04)2312-0322'),
(6, 'NIKE', '台中市西屯區甘肅路二段194號', '(04)2316-6265');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `sID` int(11) UNSIGNED NOT NULL,
  `sName` varchar(20) NOT NULL DEFAULT '',
  `sAddress` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `store`
--

INSERT INTO `store` (`sID`, `sName`, `sAddress`) VALUES
(1, '7-11黎明店', '台北市西屯區黎明路三段22號'),
(2, 'OK漢口店', '台中市西屯區漢口路二段103號1樓'),
(3, '全家西屯店', '台中市西屯區西屯路二段136號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD KEY `fk_orders_details` (`oID`),
  ADD KEY `fk_good_details` (`goodID`);

--
-- 資料表索引 `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`goodID`),
  ADD KEY `fk_restaurants_good` (`rID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uID`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`),
  ADD KEY `fk_member_orders` (`uID`),
  ADD KEY `fk_store_orders` (`sID`);

--
-- 資料表索引 `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rID`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good`
--
ALTER TABLE `good`
  MODIFY `goodID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `uID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `oID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store`
--
ALTER TABLE `store`
  MODIFY `sID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_good_details` FOREIGN KEY (`goodID`) REFERENCES `good` (`goodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_details` FOREIGN KEY (`oID`) REFERENCES `orders` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `fk_restaurants_good` FOREIGN KEY (`rID`) REFERENCES `restaurants` (`rID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_member_orders` FOREIGN KEY (`uID`) REFERENCES `member` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_store_orders` FOREIGN KEY (`sID`) REFERENCES `store` (`sID`) ON DELETE CASCADE ON UPDATE CASCADE;
