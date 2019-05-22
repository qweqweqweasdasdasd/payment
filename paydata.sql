/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : paydata

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-22 14:15:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for p_account
-- ----------------------------
DROP TABLE IF EXISTS `p_account`;
CREATE TABLE `p_account` (
  `pa_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收款账号id',
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '产品id',
  `account_name` varchar(50) DEFAULT '' COMMENT '收款户主',
  `account_num` varchar(50) DEFAULT '' COMMENT '收款账号',
  `balance` varchar(30) DEFAULT '' COMMENT '当前余额',
  `activing` tinyint(4) DEFAULT '0' COMMENT '1 当前 2 非当前',
  `status` tinyint(4) DEFAULT '0' COMMENT '1 启用 2停用',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `carousel` varchar(100) DEFAULT '' COMMENT '轮播的条件',
  PRIMARY KEY (`pa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_account
-- ----------------------------
INSERT INTO `p_account` VALUES ('5', '3', '4', '唐章杰', '555555555555555555555555', '11', '0', '2', '2019-05-13 11:54:42', null, '2019-05-07 10:35:50', '{\"roll_id\":2,\"current_roll_range\":1557747647,\"pl_id\":\"3\",\"p_id\":\"4\"}');
INSERT INTO `p_account` VALUES ('6', '3', '4', '梁思雨', '666666666666666666666666', '11', '0', '1', '2019-05-13 12:01:41', null, '2019-05-07 10:36:01', '{\"roll_id\":2,\"current_roll_range\":1557748483,\"pl_id\":\"3\",\"p_id\":\"4\"}');
INSERT INTO `p_account` VALUES ('7', '4', '4', '郭琳', '777777777777777777777777', '11', '0', '1', null, null, '2019-05-07 10:36:18', null);
INSERT INTO `p_account` VALUES ('8', '6', '4', '李丽云', '88888888888888888888888', '11', '0', '1', null, null, '2019-05-07 10:36:38', null);
INSERT INTO `p_account` VALUES ('9', '4', '4', '杨岩', '99999999999999999999999', '11', '0', '1', null, null, '2019-05-07 10:37:04', null);
INSERT INTO `p_account` VALUES ('10', '6', '4', '杨攀', '101010101010101010101010', '11', '0', '1', null, null, '2019-05-07 10:37:26', null);
INSERT INTO `p_account` VALUES ('11', '6', '4', '杨桐', '111111111111111111111111', '11', '0', '1', null, null, '2019-05-07 10:37:43', null);
INSERT INTO `p_account` VALUES ('12', '3', '4', '杨峰', '121212121212121212121212', '11', '0', '1', '2019-05-14 03:21:09', null, '2019-05-07 10:41:48', '{\"roll_id\":2,\"current_roll_range\":1557748904,\"pl_id\":\"3\",\"p_id\":\"4\"}');
INSERT INTO `p_account` VALUES ('13', '3', '4', '杨杨', '131313131313131313131313', '11', '1', '1', '2019-05-14 03:21:09', null, '2019-05-07 10:44:17', null);
INSERT INTO `p_account` VALUES ('14', '3', '4', '杨二', '141414141414141414141414', '11', '0', '1', '2019-05-11 11:31:49', null, '2019-05-07 10:44:37', null);
INSERT INTO `p_account` VALUES ('15', '3', '4', '杨养', '151515151515151515151515', '11', '0', '2', null, null, '2019-05-07 10:45:01', null);

-- ----------------------------
-- Table structure for p_create_id
-- ----------------------------
DROP TABLE IF EXISTS `p_create_id`;
CREATE TABLE `p_create_id` (
  `o_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_create_id
-- ----------------------------
INSERT INTO `p_create_id` VALUES ('4', '2019-05-20 07:06:27');
INSERT INTO `p_create_id` VALUES ('5', '2019-05-20 07:06:29');
INSERT INTO `p_create_id` VALUES ('6', '2019-05-20 07:06:29');
INSERT INTO `p_create_id` VALUES ('7', '2019-05-20 07:06:33');
INSERT INTO `p_create_id` VALUES ('8', '2019-05-20 07:06:34');
INSERT INTO `p_create_id` VALUES ('9', '2019-05-20 07:06:34');
INSERT INTO `p_create_id` VALUES ('10', '2019-05-20 07:06:34');
INSERT INTO `p_create_id` VALUES ('11', '2019-05-20 07:06:35');
INSERT INTO `p_create_id` VALUES ('12', '2019-05-20 07:22:51');
INSERT INTO `p_create_id` VALUES ('13', '2019-05-20 07:22:52');
INSERT INTO `p_create_id` VALUES ('14', '2019-05-20 07:22:53');
INSERT INTO `p_create_id` VALUES ('15', '2019-05-20 07:47:06');
INSERT INTO `p_create_id` VALUES ('16', '2019-05-20 07:47:06');
INSERT INTO `p_create_id` VALUES ('17', '2019-05-20 07:47:06');
INSERT INTO `p_create_id` VALUES ('18', '2019-05-20 07:47:07');
INSERT INTO `p_create_id` VALUES ('19', '2019-05-20 07:47:07');
INSERT INTO `p_create_id` VALUES ('20', '2019-05-20 07:47:11');
INSERT INTO `p_create_id` VALUES ('21', '2019-05-20 07:47:11');
INSERT INTO `p_create_id` VALUES ('22', '2019-05-20 07:47:11');
INSERT INTO `p_create_id` VALUES ('23', '2019-05-20 07:47:11');
INSERT INTO `p_create_id` VALUES ('24', '2019-05-20 07:47:11');
INSERT INTO `p_create_id` VALUES ('25', '2019-05-20 07:47:16');
INSERT INTO `p_create_id` VALUES ('26', '2019-05-20 07:47:16');
INSERT INTO `p_create_id` VALUES ('27', '2019-05-20 07:47:17');
INSERT INTO `p_create_id` VALUES ('28', '2019-05-20 07:47:17');
INSERT INTO `p_create_id` VALUES ('29', '2019-05-20 07:47:17');
INSERT INTO `p_create_id` VALUES ('30', '2019-05-20 07:47:47');
INSERT INTO `p_create_id` VALUES ('31', '2019-05-20 07:47:47');
INSERT INTO `p_create_id` VALUES ('32', '2019-05-20 07:47:48');
INSERT INTO `p_create_id` VALUES ('33', '2019-05-20 07:47:48');
INSERT INTO `p_create_id` VALUES ('34', '2019-05-20 07:47:48');
INSERT INTO `p_create_id` VALUES ('35', '2019-05-20 07:47:48');
INSERT INTO `p_create_id` VALUES ('36', '2019-05-20 07:47:48');
INSERT INTO `p_create_id` VALUES ('37', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('38', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('39', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('40', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('41', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('42', '2019-05-20 07:47:49');
INSERT INTO `p_create_id` VALUES ('43', '2019-05-20 07:47:52');
INSERT INTO `p_create_id` VALUES ('44', '2019-05-20 07:47:52');
INSERT INTO `p_create_id` VALUES ('45', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('46', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('47', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('48', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('49', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('50', '2019-05-20 07:47:53');
INSERT INTO `p_create_id` VALUES ('51', '2019-05-20 08:48:58');
INSERT INTO `p_create_id` VALUES ('52', '2019-05-20 08:49:30');
INSERT INTO `p_create_id` VALUES ('53', '2019-05-20 08:54:23');
INSERT INTO `p_create_id` VALUES ('54', '2019-05-20 08:57:15');
INSERT INTO `p_create_id` VALUES ('55', '2019-05-20 09:01:14');
INSERT INTO `p_create_id` VALUES ('56', '2019-05-20 09:02:32');
INSERT INTO `p_create_id` VALUES ('57', '2019-05-20 09:03:41');
INSERT INTO `p_create_id` VALUES ('58', '2019-05-20 09:10:00');
INSERT INTO `p_create_id` VALUES ('59', '2019-05-20 09:10:07');
INSERT INTO `p_create_id` VALUES ('60', '2019-05-20 09:10:07');
INSERT INTO `p_create_id` VALUES ('61', '2019-05-20 09:10:07');
INSERT INTO `p_create_id` VALUES ('62', '2019-05-20 09:10:07');
INSERT INTO `p_create_id` VALUES ('63', '2019-05-20 09:10:08');
INSERT INTO `p_create_id` VALUES ('64', '2019-05-20 09:10:12');
INSERT INTO `p_create_id` VALUES ('65', '2019-05-20 09:10:12');
INSERT INTO `p_create_id` VALUES ('66', '2019-05-20 09:10:13');
INSERT INTO `p_create_id` VALUES ('67', '2019-05-20 09:10:13');
INSERT INTO `p_create_id` VALUES ('68', '2019-05-20 09:10:13');
INSERT INTO `p_create_id` VALUES ('69', '2019-05-20 09:14:32');
INSERT INTO `p_create_id` VALUES ('70', '2019-05-20 09:23:56');
INSERT INTO `p_create_id` VALUES ('71', '2019-05-20 09:25:14');
INSERT INTO `p_create_id` VALUES ('72', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('73', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('74', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('75', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('76', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('77', '2019-05-20 09:26:24');
INSERT INTO `p_create_id` VALUES ('78', '2019-05-20 09:26:25');
INSERT INTO `p_create_id` VALUES ('79', '2019-05-20 09:26:25');
INSERT INTO `p_create_id` VALUES ('80', '2019-05-20 09:26:25');
INSERT INTO `p_create_id` VALUES ('81', '2019-05-20 09:26:25');
INSERT INTO `p_create_id` VALUES ('82', '2019-05-20 09:26:25');
INSERT INTO `p_create_id` VALUES ('83', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('84', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('85', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('86', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('87', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('88', '2019-05-20 09:26:29');
INSERT INTO `p_create_id` VALUES ('89', '2019-05-20 09:26:30');
INSERT INTO `p_create_id` VALUES ('90', '2019-05-20 09:26:30');
INSERT INTO `p_create_id` VALUES ('91', '2019-05-20 09:35:13');
INSERT INTO `p_create_id` VALUES ('92', '2019-05-20 09:35:17');
INSERT INTO `p_create_id` VALUES ('93', '2019-05-20 09:35:35');
INSERT INTO `p_create_id` VALUES ('94', '2019-05-20 10:28:24');
INSERT INTO `p_create_id` VALUES ('95', '2019-05-20 10:29:04');
INSERT INTO `p_create_id` VALUES ('96', '2019-05-20 10:31:18');
INSERT INTO `p_create_id` VALUES ('97', '2019-05-20 10:32:36');
INSERT INTO `p_create_id` VALUES ('98', '2019-05-20 10:35:23');
INSERT INTO `p_create_id` VALUES ('99', '2019-05-20 10:39:06');
INSERT INTO `p_create_id` VALUES ('100', '2019-05-20 10:39:29');
INSERT INTO `p_create_id` VALUES ('101', '2019-05-20 10:39:37');
INSERT INTO `p_create_id` VALUES ('102', '2019-05-20 10:39:37');
INSERT INTO `p_create_id` VALUES ('103', '2019-05-20 10:39:37');
INSERT INTO `p_create_id` VALUES ('104', '2019-05-20 10:39:38');
INSERT INTO `p_create_id` VALUES ('105', '2019-05-20 10:39:38');
INSERT INTO `p_create_id` VALUES ('106', '2019-05-20 10:39:38');
INSERT INTO `p_create_id` VALUES ('107', '2019-05-20 10:39:38');
INSERT INTO `p_create_id` VALUES ('108', '2019-05-20 10:39:38');
INSERT INTO `p_create_id` VALUES ('109', '2019-05-20 10:39:39');
INSERT INTO `p_create_id` VALUES ('110', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('111', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('112', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('113', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('114', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('115', '2019-05-20 10:39:42');
INSERT INTO `p_create_id` VALUES ('116', '2019-05-20 10:39:43');
INSERT INTO `p_create_id` VALUES ('117', '2019-05-20 10:39:43');
INSERT INTO `p_create_id` VALUES ('118', '2019-05-20 10:41:03');
INSERT INTO `p_create_id` VALUES ('119', '2019-05-20 10:41:03');
INSERT INTO `p_create_id` VALUES ('120', '2019-05-20 10:41:03');
INSERT INTO `p_create_id` VALUES ('121', '2019-05-20 10:41:08');
INSERT INTO `p_create_id` VALUES ('122', '2019-05-20 10:41:08');
INSERT INTO `p_create_id` VALUES ('123', '2019-05-20 10:41:09');
INSERT INTO `p_create_id` VALUES ('124', '2019-05-20 10:41:09');
INSERT INTO `p_create_id` VALUES ('125', '2019-05-20 10:41:11');
INSERT INTO `p_create_id` VALUES ('126', '2019-05-20 10:41:12');
INSERT INTO `p_create_id` VALUES ('127', '2019-05-20 10:41:12');
INSERT INTO `p_create_id` VALUES ('128', '2019-05-20 10:41:12');
INSERT INTO `p_create_id` VALUES ('129', '2019-05-20 10:41:12');
INSERT INTO `p_create_id` VALUES ('130', '2019-05-20 10:41:15');
INSERT INTO `p_create_id` VALUES ('131', '2019-05-20 10:41:15');
INSERT INTO `p_create_id` VALUES ('132', '2019-05-20 10:41:15');
INSERT INTO `p_create_id` VALUES ('133', '2019-05-20 10:41:15');
INSERT INTO `p_create_id` VALUES ('134', '2019-05-20 10:41:41');
INSERT INTO `p_create_id` VALUES ('135', '2019-05-20 10:42:51');
INSERT INTO `p_create_id` VALUES ('136', '2019-05-20 10:44:21');
INSERT INTO `p_create_id` VALUES ('137', '2019-05-20 10:44:22');
INSERT INTO `p_create_id` VALUES ('138', '2019-05-20 10:44:22');
INSERT INTO `p_create_id` VALUES ('139', '2019-05-20 10:44:30');
INSERT INTO `p_create_id` VALUES ('140', '2019-05-20 10:44:30');
INSERT INTO `p_create_id` VALUES ('141', '2019-05-20 10:44:30');
INSERT INTO `p_create_id` VALUES ('142', '2019-05-20 10:44:30');
INSERT INTO `p_create_id` VALUES ('143', '2019-05-20 10:44:31');
INSERT INTO `p_create_id` VALUES ('144', '2019-05-20 10:44:31');
INSERT INTO `p_create_id` VALUES ('145', '2019-05-20 10:44:31');
INSERT INTO `p_create_id` VALUES ('146', '2019-05-20 10:44:31');
INSERT INTO `p_create_id` VALUES ('147', '2019-05-20 10:44:31');
INSERT INTO `p_create_id` VALUES ('148', '2019-05-20 10:44:32');
INSERT INTO `p_create_id` VALUES ('149', '2019-05-20 10:44:32');
INSERT INTO `p_create_id` VALUES ('150', '2019-05-20 10:44:32');
INSERT INTO `p_create_id` VALUES ('151', '2019-05-20 10:44:32');
INSERT INTO `p_create_id` VALUES ('152', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('153', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('154', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('155', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('156', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('157', '2019-05-20 10:44:36');
INSERT INTO `p_create_id` VALUES ('158', '2019-05-20 10:44:37');
INSERT INTO `p_create_id` VALUES ('159', '2019-05-20 10:44:37');
INSERT INTO `p_create_id` VALUES ('160', '2019-05-20 10:44:37');
INSERT INTO `p_create_id` VALUES ('161', '2019-05-20 10:44:40');
INSERT INTO `p_create_id` VALUES ('162', '2019-05-20 10:44:40');
INSERT INTO `p_create_id` VALUES ('163', '2019-05-20 10:44:40');
INSERT INTO `p_create_id` VALUES ('164', '2019-05-20 10:44:40');
INSERT INTO `p_create_id` VALUES ('165', '2019-05-20 10:44:41');
INSERT INTO `p_create_id` VALUES ('166', '2019-05-20 10:44:41');
INSERT INTO `p_create_id` VALUES ('167', '2019-05-20 10:44:41');
INSERT INTO `p_create_id` VALUES ('168', '2019-05-20 10:44:41');
INSERT INTO `p_create_id` VALUES ('169', '2019-05-20 10:52:10');
INSERT INTO `p_create_id` VALUES ('170', '2019-05-20 10:52:16');
INSERT INTO `p_create_id` VALUES ('171', '2019-05-20 10:57:18');
INSERT INTO `p_create_id` VALUES ('172', '2019-05-20 10:59:02');
INSERT INTO `p_create_id` VALUES ('173', '2019-05-20 10:59:22');
INSERT INTO `p_create_id` VALUES ('174', '2019-05-20 10:59:41');
INSERT INTO `p_create_id` VALUES ('175', '2019-05-20 10:59:52');
INSERT INTO `p_create_id` VALUES ('176', '2019-05-20 11:05:29');
INSERT INTO `p_create_id` VALUES ('177', '2019-05-20 11:13:48');
INSERT INTO `p_create_id` VALUES ('178', '2019-05-20 11:14:22');
INSERT INTO `p_create_id` VALUES ('179', '2019-05-20 11:14:23');
INSERT INTO `p_create_id` VALUES ('180', '2019-05-20 11:14:26');
INSERT INTO `p_create_id` VALUES ('181', '2019-05-20 11:14:26');
INSERT INTO `p_create_id` VALUES ('182', '2019-05-20 11:29:41');
INSERT INTO `p_create_id` VALUES ('183', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('184', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('185', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('186', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('187', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('188', '2019-05-20 11:29:51');
INSERT INTO `p_create_id` VALUES ('189', '2019-05-20 11:29:52');
INSERT INTO `p_create_id` VALUES ('190', '2019-05-20 11:29:52');
INSERT INTO `p_create_id` VALUES ('191', '2019-05-20 11:29:52');
INSERT INTO `p_create_id` VALUES ('192', '2019-05-20 11:29:52');
INSERT INTO `p_create_id` VALUES ('193', '2019-05-20 11:29:52');
INSERT INTO `p_create_id` VALUES ('194', '2019-05-20 11:30:10');
INSERT INTO `p_create_id` VALUES ('195', '2019-05-20 11:30:11');
INSERT INTO `p_create_id` VALUES ('196', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('197', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('198', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('199', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('200', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('201', '2019-05-20 11:30:12');
INSERT INTO `p_create_id` VALUES ('202', '2019-05-20 11:30:13');
INSERT INTO `p_create_id` VALUES ('203', '2019-05-20 11:30:13');
INSERT INTO `p_create_id` VALUES ('204', '2019-05-20 11:30:13');
INSERT INTO `p_create_id` VALUES ('205', '2019-05-21 03:51:28');
INSERT INTO `p_create_id` VALUES ('206', '2019-05-21 04:19:06');
INSERT INTO `p_create_id` VALUES ('207', '2019-05-21 04:19:08');
INSERT INTO `p_create_id` VALUES ('208', '2019-05-21 04:19:08');
INSERT INTO `p_create_id` VALUES ('209', '2019-05-21 04:19:09');
INSERT INTO `p_create_id` VALUES ('210', '2019-05-21 04:19:11');
INSERT INTO `p_create_id` VALUES ('211', '2019-05-21 04:19:11');
INSERT INTO `p_create_id` VALUES ('212', '2019-05-21 04:19:12');
INSERT INTO `p_create_id` VALUES ('213', '2019-05-21 04:19:12');
INSERT INTO `p_create_id` VALUES ('214', '2019-05-21 04:19:12');
INSERT INTO `p_create_id` VALUES ('215', '2019-05-21 04:19:16');
INSERT INTO `p_create_id` VALUES ('216', '2019-05-21 04:19:16');

-- ----------------------------
-- Table structure for p_manager
-- ----------------------------
DROP TABLE IF EXISTS `p_manager`;
CREATE TABLE `p_manager` (
  `mg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mg_name` char(20) NOT NULL DEFAULT '',
  `password` char(100) NOT NULL DEFAULT '' COMMENT '密码',
  `session_id` char(20) DEFAULT '' COMMENT 'session_id',
  `r_id` int(11) NOT NULL DEFAULT '0',
  `last_time` datetime DEFAULT NULL,
  `login_counts` int(11) DEFAULT '0',
  `status` tinyint(7) NOT NULL DEFAULT '1' COMMENT '1开启 2 关闭',
  `ip` char(20) DEFAULT '',
  `phone` char(20) DEFAULT '',
  `desc` text,
  `pl_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`mg_id`),
  KEY `mg_name` (`mg_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_manager
-- ----------------------------
INSERT INTO `p_manager` VALUES ('1', 'admin123', '$2y$10$7aOkTpl5SyZONeyAjUIRV.aNTc63gpGQQ6LoZV0hb5YekwEiNfrZC', '', '1', '2019-05-21 08:13:41', '50', '1', '127.0.0.1', '', null, '3', '2019-03-21 17:13:23', null, null);
INSERT INTO `p_manager` VALUES ('2', 'root01', '$2y$10$oySJh2XfkXIsORbPr7sYNedr30cLwt40vyVe8tW/rwTb3qEFNDb7O', '', '2', '2019-03-22 07:29:15', '1', '1', '127.0.0.1', '', '带平台的', '4', '2019-03-21 08:56:18', null, null);
INSERT INTO `p_manager` VALUES ('3', 'root02', '$2y$10$SQW8SNDJDByppEYZPDAoZ.y6BaOX7kPpgvkvXkp42aTiqM/gQiKVG', '', '3', null, '0', '1', '', '', '带平台', '4', '2019-03-21 08:57:13', null, null);
INSERT INTO `p_manager` VALUES ('5', 'root03', '$2y$10$uhMnpxM16yvARp1IZAkxau7XosmEg..1ty5Tp8XQNT82/rC0iq63u', '', '3', null, '0', '1', '', '', '带平台', '3', '2019-03-21 08:58:30', null, null);
INSERT INTO `p_manager` VALUES ('6', 'root04', '$2y$10$.l/OIRnX0z6JiqZA4gJH1eCqabjSqYXy.gypl/0EDXkMS1hFAo3Wm', '', '1', null, '0', '1', '', '', '不催', '3', '2019-03-21 09:17:26', null, null);
INSERT INTO `p_manager` VALUES ('7', 'root05', '$2y$10$bAfMLqsm1/fWMP1406sD3OYe38inadfFGqLHzeLIT3RnxNonH8z1G', '', '1', null, '0', '1', '', '', null, '6', '2019-03-21 09:17:40', null, null);
INSERT INTO `p_manager` VALUES ('8', 'root07', '$2y$10$PqNSUjLSL59iqbNJ8NptGexUvO.BuxXR26yhFfLVsgirsOeNN0dNS', '', '1', null, '0', '1', '', '', null, '4', '2019-03-21 09:17:57', null, null);
INSERT INTO `p_manager` VALUES ('9', 'root06', '$2y$10$E3.dGZU9Lu9oGX2rb4wWgOyJz5ZyCGhYBlZ.PHXP3vaN.Pj.jCkdS', '', '1', null, '0', '1', '', '', null, '8', '2019-03-21 09:18:10', null, null);
INSERT INTO `p_manager` VALUES ('10', 'root08', '$2y$10$mleJcMcTkZ7.XV7xVcFob.Gv7HzI0oCWxU8DMXtcx2Vg59VJKT/du', '', '3', null, '0', '1', '', '', null, '4', '2019-03-21 09:18:35', null, null);
INSERT INTO `p_manager` VALUES ('11', 'root09', '$2y$10$2xdIfm6mb.Ti8xhDELDisuKjgZEdFcleGvDB44Dzo.x/Z2z3HfqxW', '', '1', null, '0', '1', '', '', null, '3', '2019-03-21 09:18:59', null, null);
INSERT INTO `p_manager` VALUES ('12', 'root10', '$2y$10$dzbL0sNY65d7AK7qqZ7y9.Nd9MTPcfPh/8pWRMBZA/FfF4Ia1JmJO', '', '1', null, '0', '1', '', '', null, '7', '2019-03-21 09:19:13', null, null);
INSERT INTO `p_manager` VALUES ('13', 'root11', '$2y$10$fmAV2q6itn6Eh0efPMp5/ehThyE7U9hCNyj6E/VEVlXL8WmIj1IEC', '', '1', null, '0', '1', '', '', null, '4', '2019-03-21 09:19:28', null, null);
INSERT INTO `p_manager` VALUES ('14', 'root12', '$2y$10$j5uKNm5TNVrHIF56cwfgSOEMR8pLGNLN7h4jkJQU1OtH3jpDkD77K', '', '1', null, '0', '1', '', '', null, '3', '2019-03-21 09:19:40', null, null);
INSERT INTO `p_manager` VALUES ('15', 'root13', '$2y$10$xPVWA8u1d7Ip4BZcgj2u3uZSIoLwmFwvws1S5teFvRtMYdDDtpBzG', '', '1', null, '0', '1', '', '', null, '6', '2019-03-21 09:19:53', null, null);
INSERT INTO `p_manager` VALUES ('16', 'root14', '$2y$10$loNEot7emD/9SZA3F.A00uFmuAVFZc0zxJCkaS5rPZmHVELpe1y/i', '', '1', null, '0', '1', '', '', null, '4', '2019-03-21 09:20:18', null, null);
INSERT INTO `p_manager` VALUES ('17', 'test111', '$2y$10$cH3MdlTD0F.6WfjuR1qTEuuDeFsJg2SkiaWPHSQ8Wa5xITxczwOzq', '', '2', null, '0', '1', '', '', '带平台的', '8', '2019-04-10 06:51:51', null, null);

-- ----------------------------
-- Table structure for p_member
-- ----------------------------
DROP TABLE IF EXISTS `p_member`;
CREATE TABLE `p_member` (
  `m_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `pl_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_member
-- ----------------------------
INSERT INTO `p_member` VALUES ('8', 'test123', '$2y$10$AZM0DwI2XKfSjwmAXvyhn.bntgLC5CY7VhcdMI1L6fgo.OzyG6ZHm', '3', '2019-05-22 05:49:28', null, '2019-05-22 05:49:28');

-- ----------------------------
-- Table structure for p_orders
-- ----------------------------
DROP TABLE IF EXISTS `p_orders`;
CREATE TABLE `p_orders` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 UNION=(`p_order_pl_id_3`,`p_order_pl_id_4`,`p_order_pl_id_6`,`p_order_pl_id_7`,`p_order_pl_id_8`);

-- ----------------------------
-- Records of p_orders
-- ----------------------------
INSERT INTO `p_orders` VALUES ('182', '3', '4', '1', '13', '600', '2C8D6B9D73CC66BCFD0A1D1D854AD8F9', '1558351781', '1', '599.1', '', '2019-05-20 11:29:41', null, null);
INSERT INTO `p_orders` VALUES ('183', '3', '4', '1', '13', '600', '686A1096A48173C2E133AB31D2CCDDD5', '1558351791', '1', '599.09', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('184', '3', '4', '1', '13', '600', '7D14C0BC43A8DC1B990665C81F843BF4', '1558351791', '1', '599.08', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('185', '3', '4', '1', '13', '600', '379985AC745CDF60FEE24F5964F2AAD4', '1558351791', '1', '599.07', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('186', '3', '4', '1', '13', '600', '4FA3E0EF9E4B07F8E204008EB1F65AC0', '1558351791', '1', '599.06', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('187', '3', '4', '1', '13', '600', 'ED55E03163D112DFF2DE666D75AFBABF', '1558351791', '1', '599.05', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('188', '3', '4', '1', '13', '600', 'B16D414502A954328938B50F29BACA62', '1558351791', '1', '599.04', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_orders` VALUES ('189', '3', '4', '1', '13', '600', '2F7C6581C2D2C0C5B3F75F6627927C5C', '1558351792', '1', '599.03', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_orders` VALUES ('190', '3', '4', '1', '13', '600', '86F3A97C222C58CD900241455F32494F', '1558351792', '1', '599.02', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_orders` VALUES ('191', '3', '4', '1', '13', '600', '3F9E11F943506310BEF4A5705F1E9062', '1558351792', '1', '599.01', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_orders` VALUES ('192', '3', '4', '1', '13', '600', '5F2B832815FC5EA7D641982EA85ABE66', '1558351792', '1', '600', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_orders` VALUES ('193', '3', '4', '1', '13', '600', 'A3AEA6CA5BC62B96786F444F587863A0', '1558351792', '1', '599.99', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_orders` VALUES ('194', '4', '4', '1', '13', '600', '8801C1C17B8BCB2C769E00CD0D8CE17A', '1558351810', '1', '599.98', '', '2019-05-20 11:30:10', null, null);
INSERT INTO `p_orders` VALUES ('195', '4', '4', '1', '13', '600', 'F82232719377E73885F9726D8319FE93', '1558351811', '1', '599.97', '', '2019-05-20 11:30:11', null, null);
INSERT INTO `p_orders` VALUES ('196', '4', '4', '1', '13', '600', '8327EF939601DC938D9DF53188790A33', '1558351812', '1', '599.96', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('197', '4', '4', '1', '13', '600', '5C0A97CED0EAF12D8FA40805DC0766A4', '1558351812', '1', '599.95', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('198', '4', '4', '1', '13', '600', '6E317B4E39BE9E94B4477897DF49BC69', '1558351812', '1', '599.94', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('199', '4', '4', '1', '13', '600', '939DAEA4E6DB3F5CF2669F079061DB1C', '1558351812', '1', '599.93', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('200', '4', '4', '1', '13', '600', 'E46317FEA1FC4FC22263D1EAA6764E9B', '1558351812', '1', '599.92', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('201', '4', '4', '1', '13', '600', '43455377BDC4A39C2B1FCCB62A0D131E', '1558351812', '1', '599.91', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_orders` VALUES ('202', '4', '4', '1', '13', '600', '98A7CA9D234D4D0F9B7F5554F9E5D35E', '1558351813', '1', '599.9', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_orders` VALUES ('203', '4', '4', '1', '13', '600', '3C99F9F6149DAC97FAD670A913E84D12', '1558351813', '1', '599.89', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_orders` VALUES ('204', '4', '4', '1', '13', '600', '3CE4BE31E805E07DA37F7470E837ACDB', '1558351813', '1', '599.88', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_orders` VALUES ('205', '4', '4', '1', '13', '600', 'DE81F235E6B07D522EE38DB4C70AD6F4', '1558410688', '1', '599.87', '', '2019-05-21 03:51:28', null, null);
INSERT INTO `p_orders` VALUES ('206', '6', '4', '1', '13', '600', '4D796467DF1E5A522E0BD3DA05F917BB', '1558412346', '1', '599.86', '', '2019-05-21 04:19:06', null, null);
INSERT INTO `p_orders` VALUES ('207', '6', '4', '1', '13', '600', '6DCE8941E7B8AF353F675CFAFB837EBB', '1558412348', '1', '599.85', '', '2019-05-21 04:19:08', null, null);
INSERT INTO `p_orders` VALUES ('208', '6', '4', '1', '13', '600', '0290225C4BF31FC0E3905F6D9D473ABC', '1558412348', '1', '599.84', '', '2019-05-21 04:19:08', null, null);
INSERT INTO `p_orders` VALUES ('209', '6', '4', '1', '13', '600', 'C41606EA83ED69AD25400CF41977FAA9', '1558412348', '1', '599.83', '', '2019-05-21 04:19:09', null, null);
INSERT INTO `p_orders` VALUES ('210', '7', '4', '1', '13', '600', '13DF212A0A3C83FDE8F75FD88FDE39FA', '1558412351', '1', '599.82', '', '2019-05-21 04:19:11', null, null);
INSERT INTO `p_orders` VALUES ('211', '7', '4', '1', '13', '600', 'B5621F95BAB049CFB85EBBB757DFDBB7', '1558412351', '1', '599.81', '', '2019-05-21 04:19:11', null, null);
INSERT INTO `p_orders` VALUES ('212', '7', '4', '1', '13', '600', '7033288E8A7E1AD9327392FE162747BB', '1558412352', '1', '599.8', '', '2019-05-21 04:19:12', null, null);
INSERT INTO `p_orders` VALUES ('213', '7', '4', '1', '13', '600', '5DF26E33F197145773C0691A9B0CFD89', '1558412352', '1', '599.79', '', '2019-05-21 04:19:12', null, null);
INSERT INTO `p_orders` VALUES ('214', '7', '4', '1', '13', '600', 'E4C7500248D57EE5739D8C0C2D158784', '1558412352', '1', '599.78', '', '2019-05-21 04:19:12', null, null);
INSERT INTO `p_orders` VALUES ('215', '8', '4', '1', '13', '600', 'BF7ED130812E4A314265B0E55A456127', '1558412356', '1', '599.77', '', '2019-05-21 04:19:16', null, null);
INSERT INTO `p_orders` VALUES ('216', '8', '4', '1', '13', '600', 'D30C6C6BA2BA50D4923DA7117C2DE356', '1558412356', '1', '599.76', '', '2019-05-21 04:19:16', null, null);

-- ----------------------------
-- Table structure for p_order_pl_id_3
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_3`;
CREATE TABLE `p_order_pl_id_3` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_order_pl_id_3
-- ----------------------------
INSERT INTO `p_order_pl_id_3` VALUES ('182', '3', '4', '1', '13', '600', '2C8D6B9D73CC66BCFD0A1D1D854AD8F9', '1558351781', '1', '599.1', '', '2019-05-20 11:29:41', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('183', '3', '4', '1', '13', '600', '686A1096A48173C2E133AB31D2CCDDD5', '1558351791', '1', '599.09', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('184', '3', '4', '1', '13', '600', '7D14C0BC43A8DC1B990665C81F843BF4', '1558351791', '1', '599.08', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('185', '3', '4', '1', '13', '600', '379985AC745CDF60FEE24F5964F2AAD4', '1558351791', '1', '599.07', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('186', '3', '4', '1', '13', '600', '4FA3E0EF9E4B07F8E204008EB1F65AC0', '1558351791', '1', '599.06', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('187', '3', '4', '1', '13', '600', 'ED55E03163D112DFF2DE666D75AFBABF', '1558351791', '1', '599.05', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('188', '3', '4', '1', '13', '600', 'B16D414502A954328938B50F29BACA62', '1558351791', '1', '599.04', '', '2019-05-20 11:29:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('189', '3', '4', '1', '13', '600', '2F7C6581C2D2C0C5B3F75F6627927C5C', '1558351792', '1', '599.03', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('190', '3', '4', '1', '13', '600', '86F3A97C222C58CD900241455F32494F', '1558351792', '1', '599.02', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('191', '3', '4', '1', '13', '600', '3F9E11F943506310BEF4A5705F1E9062', '1558351792', '1', '599.01', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('192', '3', '4', '1', '13', '600', '5F2B832815FC5EA7D641982EA85ABE66', '1558351792', '1', '600', '', '2019-05-20 11:29:52', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('193', '3', '4', '1', '13', '600', 'A3AEA6CA5BC62B96786F444F587863A0', '1558351792', '1', '599.99', '', '2019-05-20 11:29:52', null, null);

-- ----------------------------
-- Table structure for p_order_pl_id_4
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_4`;
CREATE TABLE `p_order_pl_id_4` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_order_pl_id_4
-- ----------------------------
INSERT INTO `p_order_pl_id_4` VALUES ('194', '4', '4', '1', '13', '600', '8801C1C17B8BCB2C769E00CD0D8CE17A', '1558351810', '1', '599.98', '', '2019-05-20 11:30:10', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('195', '4', '4', '1', '13', '600', 'F82232719377E73885F9726D8319FE93', '1558351811', '1', '599.97', '', '2019-05-20 11:30:11', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('196', '4', '4', '1', '13', '600', '8327EF939601DC938D9DF53188790A33', '1558351812', '1', '599.96', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('197', '4', '4', '1', '13', '600', '5C0A97CED0EAF12D8FA40805DC0766A4', '1558351812', '1', '599.95', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('198', '4', '4', '1', '13', '600', '6E317B4E39BE9E94B4477897DF49BC69', '1558351812', '1', '599.94', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('199', '4', '4', '1', '13', '600', '939DAEA4E6DB3F5CF2669F079061DB1C', '1558351812', '1', '599.93', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('200', '4', '4', '1', '13', '600', 'E46317FEA1FC4FC22263D1EAA6764E9B', '1558351812', '1', '599.92', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('201', '4', '4', '1', '13', '600', '43455377BDC4A39C2B1FCCB62A0D131E', '1558351812', '1', '599.91', '', '2019-05-20 11:30:12', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('202', '4', '4', '1', '13', '600', '98A7CA9D234D4D0F9B7F5554F9E5D35E', '1558351813', '1', '599.9', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('203', '4', '4', '1', '13', '600', '3C99F9F6149DAC97FAD670A913E84D12', '1558351813', '1', '599.89', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('204', '4', '4', '1', '13', '600', '3CE4BE31E805E07DA37F7470E837ACDB', '1558351813', '1', '599.88', '', '2019-05-20 11:30:13', null, null);
INSERT INTO `p_order_pl_id_4` VALUES ('205', '4', '4', '1', '13', '600', 'DE81F235E6B07D522EE38DB4C70AD6F4', '1558410688', '1', '599.87', '', '2019-05-21 03:51:28', null, null);

-- ----------------------------
-- Table structure for p_order_pl_id_6
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_6`;
CREATE TABLE `p_order_pl_id_6` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_order_pl_id_6
-- ----------------------------
INSERT INTO `p_order_pl_id_6` VALUES ('206', '6', '4', '1', '13', '600', '4D796467DF1E5A522E0BD3DA05F917BB', '1558412346', '1', '599.86', '', '2019-05-21 04:19:06', null, null);
INSERT INTO `p_order_pl_id_6` VALUES ('207', '6', '4', '1', '13', '600', '6DCE8941E7B8AF353F675CFAFB837EBB', '1558412348', '1', '599.85', '', '2019-05-21 04:19:08', null, null);
INSERT INTO `p_order_pl_id_6` VALUES ('208', '6', '4', '1', '13', '600', '0290225C4BF31FC0E3905F6D9D473ABC', '1558412348', '1', '599.84', '', '2019-05-21 04:19:08', null, null);
INSERT INTO `p_order_pl_id_6` VALUES ('209', '6', '4', '1', '13', '600', 'C41606EA83ED69AD25400CF41977FAA9', '1558412348', '1', '599.83', '', '2019-05-21 04:19:09', null, null);

-- ----------------------------
-- Table structure for p_order_pl_id_7
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_7`;
CREATE TABLE `p_order_pl_id_7` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_order_pl_id_7
-- ----------------------------
INSERT INTO `p_order_pl_id_7` VALUES ('210', '7', '4', '1', '13', '600', '13DF212A0A3C83FDE8F75FD88FDE39FA', '1558412351', '1', '599.82', '', '2019-05-21 04:19:11', null, null);
INSERT INTO `p_order_pl_id_7` VALUES ('211', '7', '4', '1', '13', '600', 'B5621F95BAB049CFB85EBBB757DFDBB7', '1558412351', '1', '599.81', '', '2019-05-21 04:19:11', null, null);
INSERT INTO `p_order_pl_id_7` VALUES ('212', '7', '4', '1', '13', '600', '7033288E8A7E1AD9327392FE162747BB', '1558412352', '1', '599.8', '', '2019-05-21 04:19:12', null, null);
INSERT INTO `p_order_pl_id_7` VALUES ('213', '7', '4', '1', '13', '600', '5DF26E33F197145773C0691A9B0CFD89', '1558412352', '1', '599.79', '', '2019-05-21 04:19:12', null, null);
INSERT INTO `p_order_pl_id_7` VALUES ('214', '7', '4', '1', '13', '600', 'E4C7500248D57EE5739D8C0C2D158784', '1558412352', '1', '599.78', '', '2019-05-21 04:19:12', null, null);

-- ----------------------------
-- Table structure for p_order_pl_id_8
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_8`;
CREATE TABLE `p_order_pl_id_8` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_order_pl_id_8
-- ----------------------------
INSERT INTO `p_order_pl_id_8` VALUES ('215', '8', '4', '1', '13', '600', 'BF7ED130812E4A314265B0E55A456127', '1558412356', '1', '599.77', '', '2019-05-21 04:19:16', null, null);
INSERT INTO `p_order_pl_id_8` VALUES ('216', '8', '4', '1', '13', '600', 'D30C6C6BA2BA50D4923DA7117C2DE356', '1558412356', '1', '599.76', '', '2019-05-21 04:19:16', null, null);

-- ----------------------------
-- Table structure for p_payproduct
-- ----------------------------
DROP TABLE IF EXISTS `p_payproduct`;
CREATE TABLE `p_payproduct` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) DEFAULT '0' COMMENT '排序id',
  `pay_name` char(20) DEFAULT '' COMMENT '支付栏目的名称',
  `pay_icon` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 支付宝转账银行卡,,,1微信商户号',
  `roll_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,正序第一个账号1,达到支付次数(max)切换,2,达到时间间隔(max)切换,3,达到收款金额(max)切换',
  `roll_range` varchar(100) DEFAULT '' COMMENT '循环的数据 ',
  `status` tinyint(7) NOT NULL DEFAULT '1' COMMENT '1 显示 2 停用(前端是否显示)',
  `desc` varchar(20) DEFAULT '' COMMENT '支付方式的描述',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_payproduct
-- ----------------------------
INSERT INTO `p_payproduct` VALUES ('3', '200', '支付宝转银行卡', '0', '1', '1000', '1', '单笔最低10元,最高10000元', '2019-04-25 05:36:41', null, null);
INSERT INTO `p_payproduct` VALUES ('4', '100', '微信扫码', '0', '2', '5', '1', '单笔最低10元,最高10000元', '2019-04-26 07:39:14', null, null);

-- ----------------------------
-- Table structure for p_permission
-- ----------------------------
DROP TABLE IF EXISTS `p_permission`;
CREATE TABLE `p_permission` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_name` char(20) DEFAULT '',
  `p_pid` int(11) DEFAULT '0',
  `p_c` varchar(100) DEFAULT '',
  `p_a` varchar(100) DEFAULT '',
  `ps_route` varchar(100) DEFAULT '',
  `ps_level` tinyint(7) DEFAULT '0',
  `show` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_permission
-- ----------------------------
INSERT INTO `p_permission` VALUES ('100', 'RBAC管理', '0', null, null, null, '0', '1', null, null, null);
INSERT INTO `p_permission` VALUES ('101', '产品管理', '0', null, null, null, '0', '1', '2019-03-22 10:10:56', null, null);
INSERT INTO `p_permission` VALUES ('102', '角色管理', '100', 'role', 'index', '/admin/role', '1', '1', '2019-03-22 11:26:07', null, null);
INSERT INTO `p_permission` VALUES ('103', '角色创建get', '102', 'role', 'create', '/admin/role/create', '2', '1', '2019-03-22 11:34:09', null, null);
INSERT INTO `p_permission` VALUES ('104', '角色创建post', '102', 'role', 'store', '/admin/role', '2', '1', '2019-03-22 11:35:33', null, null);
INSERT INTO `p_permission` VALUES ('105', '角色编辑get', '102', 'role', 'edit', '/admin/role/{role}/edit', '2', '1', '2019-03-22 11:36:45', null, null);
INSERT INTO `p_permission` VALUES ('106', '角色编辑post', '102', 'role', 'update', '/admin/role/{role}', '2', '1', '2019-03-22 11:39:09', null, null);
INSERT INTO `p_permission` VALUES ('107', '角色删除', '102', 'role', 'destroy', '/admin/role/{role}', '2', '1', '2019-03-22 12:08:44', null, null);

-- ----------------------------
-- Table structure for p_platform
-- ----------------------------
DROP TABLE IF EXISTS `p_platform`;
CREATE TABLE `p_platform` (
  `pl_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT '' COMMENT '平台名称',
  `app_id` varchar(50) DEFAULT '' COMMENT '平台接口商户id',
  `secret` varchar(50) DEFAULT '' COMMENT '平台接口商户秘钥',
  `admin_url` varchar(50) DEFAULT '' COMMENT '平台管理后台登录域名(模拟)  账号 密码',
  `android_secret` varchar(50) DEFAULT '' COMMENT '安卓app监控秘钥',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_platform
-- ----------------------------
INSERT INTO `p_platform` VALUES ('3', '新辉煌', '1546937910197', 'd3b5086a6feb4cc4b234c93c5c457c33', 'http://www.xinhuihuang.com', '123456', '2019-04-10 06:05:35', null, null);
INSERT INTO `p_platform` VALUES ('4', '老辉煌', '22222222222222', 'aaadddqwerwefadf', 'http://www.laohuihuang.com', '123456', '2019-04-10 06:38:37', null, null);
INSERT INTO `p_platform` VALUES ('6', '奔驰 I', '1111111111111111', '1111111111111111', 'http://www.benchi1.com', '123456', '2019-04-10 08:54:57', null, null);
INSERT INTO `p_platform` VALUES ('7', '奔驰 II', '2222222222222222', '2222222222222222', 'http://www.benchi2.com', '123456', '2019-04-10 09:10:17', null, null);
INSERT INTO `p_platform` VALUES ('8', '奔驰 III', '3333333333333333', '3333333333333333', 'http://www.benchi3.com', '123456', '2019-04-10 09:10:47', null, null);

-- ----------------------------
-- Table structure for p_platform_payproduct
-- ----------------------------
DROP TABLE IF EXISTS `p_platform_payproduct`;
CREATE TABLE `p_platform_payproduct` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pl_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_platform_payproduct
-- ----------------------------
INSERT INTO `p_platform_payproduct` VALUES ('12', '3', '4', '2019-05-09 05:51:02', null, '2019-05-09 05:51:02');
INSERT INTO `p_platform_payproduct` VALUES ('9', '3', '3', '2019-05-09 05:12:09', null, '2019-05-09 05:12:09');
INSERT INTO `p_platform_payproduct` VALUES ('13', '4', '3', '2019-05-09 05:53:22', null, '2019-05-09 05:53:22');
INSERT INTO `p_platform_payproduct` VALUES ('14', '6', '4', '2019-05-09 05:53:27', null, '2019-05-09 05:53:27');

-- ----------------------------
-- Table structure for p_role
-- ----------------------------
DROP TABLE IF EXISTS `p_role`;
CREATE TABLE `p_role` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `r_name` char(20) NOT NULL DEFAULT '',
  `ps_ids` text,
  `ps_ca` text,
  `status` tinyint(7) DEFAULT '1' COMMENT '1 开启 2 关闭(关闭之后所属的管理员登录不了)',
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_role
-- ----------------------------
INSERT INTO `p_role` VALUES ('1', '开发-00', null, null, '1', '这个是开发使用的角色', '2019-03-21 06:42:24', null, null);
INSERT INTO `p_role` VALUES ('2', '开发-01', null, null, '1', null, '2019-03-21 06:42:47', null, null);
INSERT INTO `p_role` VALUES ('3', '开发-02', null, null, '1', null, '2019-03-21 06:42:57', null, null);
INSERT INTO `p_role` VALUES ('4', '开发-03', null, null, '1', null, '2019-03-21 06:43:08', null, null);
INSERT INTO `p_role` VALUES ('5', '开发-04', null, null, '1', null, '2019-03-21 06:43:31', null, null);
INSERT INTO `p_role` VALUES ('6', '开发-05', null, null, '1', null, '2019-03-21 06:43:39', null, null);
INSERT INTO `p_role` VALUES ('7', '开发-06', null, null, '1', null, '2019-03-21 06:43:48', null, null);
INSERT INTO `p_role` VALUES ('8', '开发-07', null, null, '1', null, '2019-03-21 06:44:18', null, null);
INSERT INTO `p_role` VALUES ('9', '开发-08', null, null, '1', null, '2019-03-21 06:44:27', null, null);
INSERT INTO `p_role` VALUES ('10', '开发-09', null, null, '1', null, '2019-03-21 06:44:35', null, null);
INSERT INTO `p_role` VALUES ('11', '开发-10', null, null, '1', null, '2019-03-21 06:44:46', null, null);

-- ----------------------------
-- Table structure for p_user
-- ----------------------------
DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
  `u_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '',
  `password` varchar(250) DEFAULT '$2y$10$7aOkTpl5SyZONeyAjUIRV.aNTc63gpGQQ6LoZV0hb5YekwEiNfrZC' COMMENT '用户密码默认一个数值',
  `pl_id` int(11) DEFAULT '0' COMMENT '属于哪个平台',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_user
-- ----------------------------
INSERT INTO `p_user` VALUES ('10', 'test123', '$2y$10$7aOkTpl5SyZONeyAjUIRV.aNTc63gpGQQ6LoZV0hb5YekwEiNfrZC', '0', '2019-05-17 04:26:52', '2019-05-17 04:26:52', null);
INSERT INTO `p_user` VALUES ('11', '', '$2y$10$7aOkTpl5SyZONeyAjUIRV.aNTc63gpGQQ6LoZV0hb5YekwEiNfrZC', '0', '2019-05-21 05:51:23', '2019-05-21 05:51:23', null);
