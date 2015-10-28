-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2015 年 08 月 14 日 15:58
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_tpwxgzh`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `sc_prize`
--

INSERT INTO `sc_prize` (`id`, `name`, `content`, `num`, `v`) VALUES
(1, '一等奖', '10个Q币', 10, 1),
(2, '二等奖', '8个Q币', 8, 5),
(3, '三等奖', '5个Q币', 5, 8),
(4, '四等奖', '3个Q币', 3, 45),
(5, '五等奖', '2个Q币', 2, 89),
(6, '六等奖', '1个Q币', 1, 444),
(7, '七等奖', '谢谢参与', 0, 600);
