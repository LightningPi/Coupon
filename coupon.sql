-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 5.6.21
-- PHP 版本： 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `coupon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `about`
--

CREATE TABLE IF NOT EXISTS `about` (
`a_id` int(255) NOT NULL,
  `a_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
`collect_id` int(255) NOT NULL,
  `store_id` int(255) DEFAULT NULL,
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '券,店',
  `coupon_id` int(255) DEFAULT NULL,
  `member_id` int(255) NOT NULL,
  `collect_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
`coupon_id` int(255) NOT NULL,
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '長期,分時,雨天',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestart` date NOT NULL,
  `timeend` date NOT NULL,
  `pic` text COLLATE utf8_unicode_ci NOT NULL,
  `store_id` int(255) NOT NULL,
  `class2` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '優惠1,優惠券2'
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`feedback_id` int(255) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_id` int(255) NOT NULL,
  `feedback_c` text COLLATE utf8_unicode_ci COMMENT '回覆內容',
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(255) NOT NULL,
  `ac` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pw` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=管理員;2=會員',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(255) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '商1,優2,新3,簡介4'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `pb`
--

CREATE TABLE IF NOT EXISTS `pb` (
`p_id` int(255) NOT NULL,
  `p_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`report_id` int(255) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(5) NOT NULL COMMENT '1=商家回報;2=問題回報',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='手機回報';

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`store_id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `pic` text COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '營業時間',
  `rest` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '公休時間',
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '是否顯示'
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `about`
--
ALTER TABLE `about`
 ADD PRIMARY KEY (`a_id`);

--
-- 資料表索引 `collect`
--
ALTER TABLE `collect`
 ADD PRIMARY KEY (`collect_id`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
 ADD PRIMARY KEY (`coupon_id`);

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`feedback_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- 資料表索引 `pb`
--
ALTER TABLE `pb`
 ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`report_id`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`store_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `about`
--
ALTER TABLE `about`
MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `collect`
--
ALTER TABLE `collect`
MODIFY `collect_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
MODIFY `coupon_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- 使用資料表 AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
MODIFY `feedback_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- 使用資料表 AUTO_INCREMENT `pb`
--
ALTER TABLE `pb`
MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `report`
--
ALTER TABLE `report`
MODIFY `report_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `store`
--
ALTER TABLE `store`
MODIFY `store_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
