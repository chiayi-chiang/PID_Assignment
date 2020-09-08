-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 09 月 08 日 01:03
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `shopcart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `oID` int(11) UNSIGNED NOT NULL,
  `pID` int(11) UNSIGNED NOT NULL,
  `quantity` smallint(20) NOT NULL DEFAULT '0',
  `UnitPrice` decimal(19,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `details`
--

INSERT INTO `details` (`oID`, `pID`, `quantity`, `UnitPrice`) VALUES
(1, 4, 1, '800'),
(1, 2, 2, '600');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `uID` int(11) UNSIGNED NOT NULL,
  `unumber` varchar(20) NOT NULL,
  `uPasswd` varchar(50) DEFAULT NULL,
  `uName` varchar(20) NOT NULL DEFAULT '',
  `uPhone` varchar(50) DEFAULT NULL,
  `manager` int(6) UNSIGNED NOT NULL,
  `canuse` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`uID`, `unumber`, `uPasswd`, `uName`, `uPhone`, `manager`, `canuse`) VALUES
(1, 'chiang', 'chiang123', '江江', '0978463523', 1, 1),
(2, 'jaslin', 'jaslin123', '陳詩儀', '0976431129', 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `oID` int(11) UNSIGNED NOT NULL,
  `uID` int(11) UNSIGNED NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `storeDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`oID`, `uID`, `orderDate`, `storeDate`) VALUES
(1, 2, '2020-09-07 16:19:27', '2020-09-14 16:19:27');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pID` int(11) UNSIGNED NOT NULL,
  `pName` varchar(20) NOT NULL DEFAULT '',
  `UnitPrice` decimal(19,0) NOT NULL DEFAULT '0',
  `picture` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pID`, `pName`, `UnitPrice`, `picture`) VALUES
(1, '果汁機', '1700', 'img_1.png'),
(2, '遙控器', '600', 'img_2.png'),
(4, '相機', '600', 'img_3.png'),
(5, '熨斗', '800', 'img_4.png'),
(6, '洗衣機', '1200', 'img_5.png');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD KEY `fk_order_details` (`oID`),
  ADD KEY `fk_product_details` (`pID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uID`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oID`),
  ADD KEY `fk_member_details` (`uID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `uID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order`
--
ALTER TABLE `order`
  MODIFY `oID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `pID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_order_details` FOREIGN KEY (`oID`) REFERENCES `order` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_details` FOREIGN KEY (`pID`) REFERENCES `product` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_member_order` FOREIGN KEY (`uID`) REFERENCES `member` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;
