/*
SQLyog v10.2 
MySQL - 5.5.27 : Database - think
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`think` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `think`;

/*Table structure for table `hd_access` */

DROP TABLE IF EXISTS `hd_access`;

CREATE TABLE `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hd_access` */

insert  into `hd_access`(`role_id`,`node_id`,`level`,`module`) values (2,18,3,NULL),(2,19,3,NULL),(2,20,3,NULL),(2,21,3,NULL),(2,12,2,NULL),(2,14,3,NULL),(2,15,3,NULL),(2,11,2,NULL),(2,13,2,NULL),(2,1,1,NULL),(1,11,2,NULL),(1,1,1,NULL),(2,17,3,NULL),(2,16,3,NULL),(1,15,3,NULL),(1,14,3,NULL);

/*Table structure for table `hd_node` */

DROP TABLE IF EXISTS `hd_node`;

CREATE TABLE `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `hd_node` */

insert  into `hd_node`(`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`) values (1,'Admin','后台应用',1,NULL,1,0,1),(2,'Index','前台应用',1,NULL,1,0,1),(12,'Rbac','RBAC权限管理',1,NULL,1,1,2),(11,'MsgManage','帖子管理',1,NULL,1,1,2),(13,'Index','后台首页',1,NULL,1,1,2),(14,'index','帖子列表',1,NULL,1,11,3),(15,'delete','帖子删除',1,NULL,1,11,3),(16,'addNode','添加节点',1,NULL,1,12,3),(17,'addRole','添加角色',1,NULL,1,12,3),(18,'addUser','添加用户',1,NULL,1,12,3),(19,'node','节点列表',1,NULL,1,12,3),(20,'role','角色列表',1,NULL,1,12,3),(21,'index','用户列表',1,NULL,1,12,3),(22,'Index','前台首页',1,NULL,1,2,2);

/*Table structure for table `hd_role` */

DROP TABLE IF EXISTS `hd_role`;

CREATE TABLE `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hd_role` */

insert  into `hd_role`(`id`,`name`,`pid`,`status`,`remark`) values (1,'manager',NULL,1,'管理员'),(2,'editor',NULL,1,'网站编辑');

/*Table structure for table `hd_role_user` */

DROP TABLE IF EXISTS `hd_role_user`;

CREATE TABLE `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hd_role_user` */

insert  into `hd_role_user`(`role_id`,`user_id`) values (1,'5'),(2,'6'),(1,'7'),(2,'7');

/*Table structure for table `hd_user` */

DROP TABLE IF EXISTS `hd_user`;

CREATE TABLE `hd_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `hd_user` */

insert  into `hd_user`(`id`,`username`,`password`,`logintime`,`loginip`,`lock`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1377570797,'127.0.0.1',0),(7,'yongjian','5f9781642c99312ef63aaf7b323666f8',1377524082,'127.0.0.1',0),(6,'wangwu','9f001e4166cf26bfbdd3b4f67d9ef617',1377572162,'127.0.0.1',0),(5,'lisi','dc3a8f1670d65bea69b7b65048a0ac40',1377572140,'127.0.0.1',0);

/*Table structure for table `hd_wish` */

DROP TABLE IF EXISTS `hd_wish`;

CREATE TABLE `hd_wish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `hd_wish` */

insert  into `hd_wish`(`id`,`username`,`content`,`time`) values (9,'admin','哈哈哈哈！[花心][花心][花心]',1377401086),(8,'admin','如果可以！',1377401075),(10,'yyy','tp好啊[嘻嘻]',1377401101),(12,'admin','[酷][酷][酷][酷][酷][酷]',1377403434);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
