-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 08 月 26 日 08:30
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `shopcart`
create database shopcart character set utf8;
use shopcart;
--

-- --------------------------------------------------------

--
-- 資料表結構 `mes`
--

CREATE TABLE `mes` (
  `mID` int(11) UNSIGNED NOT NULL,
  `uID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `uID` int(11) UNSIGNED NOT NULL,
  `userName` varchar(20) NOT NULL,
  `passwd` varchar(50) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`mID`),
  ADD KEY `fk_member_mes` (`uID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mes`
--
ALTER TABLE `mes`
  MODIFY `mID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `uID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `mes`
--
ALTER TABLE `mes`
  ADD CONSTRAINT `fk_member_mes` FOREIGN KEY (`uID`) REFERENCES `member` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;