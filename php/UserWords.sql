-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-03-26 09:36:21
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
-- 数据库： `UserInfo`
--

-- --------------------------------------------------------

--
-- 表的结构 `UserWords`
--

DROP TABLE IF EXISTS `UserWords`;
CREATE TABLE IF NOT EXISTS `userwords` (
  `UserPID` int(11) DEFAULT NULL,
  `UserLevel1` json DEFAULT NULL,
  `UserLevel2` json DEFAULT NULL,
  `UserLevel3` json DEFAULT NULL,
  `UserLevel4` json DEFAULT NULL,
  `UserLevel5` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='UserWords';

--
-- 转存表中的数据 `UserWords`
--

INSERT INTO `UserWords` (`UserPID`, `UserLevel1`, `UserLevel2`, `UserLevel3`, `UserLevel4`, `UserLevel5`) VALUES
(1, '{\"experience\": [{\"mean\": \"经历\", \"word\": \"experience\"}]}', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
