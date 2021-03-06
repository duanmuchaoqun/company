/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-09-12 17:37:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_banner
-- ----------------------------
DROP TABLE IF EXISTS `mg_banner`;
CREATE TABLE `mg_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(500) NOT NULL COMMENT '标题',
  `image_url` varchar(500) NOT NULL COMMENT '图片地址',
  `link` varchar(500) NOT NULL COMMENT '链接地址',
  `position` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `creat_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_banner
-- ----------------------------

-- ----------------------------
-- Table structure for mg_manager_user
-- ----------------------------
DROP TABLE IF EXISTS `mg_manager_user`;
CREATE TABLE `mg_manager_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `salt` varchar(255) NOT NULL COMMENT '扰码',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_manager_user
-- ----------------------------
INSERT INTO `mg_manager_user` VALUES ('1', 'admin', '0cac7a4418dba2c02930741827d1928d', 'yyer', '1536114078', '1536114078');
