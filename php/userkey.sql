-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-03-26 09:38:46
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `userinfo`
--

-- --------------------------------------------------------

--
-- 表的结构 `userkey`
--

DROP TABLE IF EXISTS `userkey`;
CREATE TABLE IF NOT EXISTS `userkey` (
  `UserPID` int(11) DEFAULT NULL,
  `UserUsername` text COLLATE utf8_bin,
  `UserPassword` text COLLATE utf8_bin,
  `UserTelephone` text COLLATE utf8_bin,
  `UserEmail` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User''s basic infomation';

--
-- 转存表中的数据 `userkey`
--

INSERT INTO `userkey` (`UserPID`, `UserUsername`, `UserPassword`, `UserTelephone`, `UserEmail`) VALUES
(1, 'lzliuzy', '123456', '15298265138', '386964993@qq.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;