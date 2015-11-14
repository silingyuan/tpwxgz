-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015-11-14 05:33:38
-- 服务器版本: 5.5.36-log
-- PHP 版本: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `scratch`
--

-- --------------------------------------------------------

--
-- 表的结构 `qcxmm_award`
--

CREATE TABLE IF NOT EXISTS `qcxmm_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` int(11) NOT NULL,
  `qb` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `qcxmm_scratch`
--

CREATE TABLE IF NOT EXISTS `qcxmm_scratch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `times` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `qcxmm_user`
--

CREATE TABLE IF NOT EXISTS `qcxmm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(100) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `time` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sc_cache`
--

CREATE TABLE IF NOT EXISTS `sc_cache` (
  `cachekey` varchar(255) NOT NULL,
  `expire` int(11) NOT NULL,
  `data` blob,
  `datacrc` int(32) DEFAULT NULL,
  UNIQUE KEY `cachekey` (`cachekey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_prize`
--

CREATE TABLE IF NOT EXISTS `sc_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `content` varchar(30) NOT NULL,
  `num` int(11) NOT NULL,
  `v` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sc_session`
--

CREATE TABLE IF NOT EXISTS `sc_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zqb_award`
--

CREATE TABLE IF NOT EXISTS `zqb_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(20) NOT NULL,
  `qb` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zqb_scratch`
--

CREATE TABLE IF NOT EXISTS `zqb_scratch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `times` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zqb_user`
--

CREATE TABLE IF NOT EXISTS `zqb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(100) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `time` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- 表的结构 `shenshi_award`
--

CREATE TABLE IF NOT EXISTS `shenshi_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(20) NOT NULL,
  `qb` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `shenshi_scratch`
--

CREATE TABLE IF NOT EXISTS `shenshi_scratch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `times` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `shenshi_user`
--

CREATE TABLE IF NOT EXISTS `shenshi_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(100) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `time` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

