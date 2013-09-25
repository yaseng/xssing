-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 11 月 16 日 14:39
-- 服务器版本: 5.5.16
-- PHP 版本: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xing`
--

-- --------------------------------------------------------

--
-- 表的结构 `xg_browser`
--

CREATE TABLE IF NOT EXISTS `xg_browser` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `os` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0' COMMENT '在线',
  `type` varchar(30) NOT NULL COMMENT '浏览器类型',
  `dateline` int(11) NOT NULL COMMENT '上线时间',
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `xg_browser`
--
 

--
-- 表的结构 `xg_incode`
--

CREATE TABLE IF NOT EXISTS `xg_incode` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iid`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `xg_incode`
--
 

-- --------------------------------------------------------

--
-- 表的结构 `xg_info`
--

CREATE TABLE IF NOT EXISTS `xg_info` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `url` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cookie` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `xg_info`
--
 
--
-- 表的结构 `xg_project`
--

CREATE TABLE IF NOT EXISTS `xg_project` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `url` varchar(6) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `xg_project`
--
 
-- --------------------------------------------------------

--
-- 表的结构 `xg_user`
--

CREATE TABLE IF NOT EXISTS `xg_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `key` int(11) NOT NULL,
  `ip` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `xg_user`
--

 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
