/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : paydata

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-01 14:58:06
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
INSERT INTO `p_account` VALUES ('13', '3', '4', '杨杨', '131313131313131313131313', '11', '1', '1', '2019-05-30 03:50:24', null, '2019-05-07 10:44:17', '{\"roll_id\":2,\"current_roll_range\":1559188224,\"pl_id\":\"3\",\"p_id\":\"4\"}');
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
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

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
INSERT INTO `p_create_id` VALUES ('217', '2019-05-31 07:59:40');
INSERT INTO `p_create_id` VALUES ('218', '2019-05-31 08:04:12');
INSERT INTO `p_create_id` VALUES ('219', '2019-05-31 08:06:34');
INSERT INTO `p_create_id` VALUES ('220', '2019-05-31 08:10:20');
INSERT INTO `p_create_id` VALUES ('221', '2019-05-31 08:15:23');
INSERT INTO `p_create_id` VALUES ('222', '2019-05-31 11:49:05');
INSERT INTO `p_create_id` VALUES ('223', '2019-06-01 03:38:23');
INSERT INTO `p_create_id` VALUES ('224', '2019-06-01 03:41:51');
INSERT INTO `p_create_id` VALUES ('225', '2019-06-01 04:04:18');
INSERT INTO `p_create_id` VALUES ('226', '2019-06-01 04:05:00');
INSERT INTO `p_create_id` VALUES ('227', '2019-06-01 04:05:59');
INSERT INTO `p_create_id` VALUES ('228', '2019-06-01 05:26:07');
INSERT INTO `p_create_id` VALUES ('229', '2019-06-01 05:28:41');
INSERT INTO `p_create_id` VALUES ('230', '2019-06-01 05:30:05');
INSERT INTO `p_create_id` VALUES ('231', '2019-06-01 05:31:27');
INSERT INTO `p_create_id` VALUES ('232', '2019-06-01 05:32:12');
INSERT INTO `p_create_id` VALUES ('233', '2019-06-01 05:34:14');
INSERT INTO `p_create_id` VALUES ('234', '2019-06-01 05:35:21');
INSERT INTO `p_create_id` VALUES ('235', '2019-06-01 05:42:51');
INSERT INTO `p_create_id` VALUES ('236', '2019-06-01 05:55:07');
INSERT INTO `p_create_id` VALUES ('237', '2019-06-01 05:58:10');
INSERT INTO `p_create_id` VALUES ('238', '2019-06-01 06:15:42');
INSERT INTO `p_create_id` VALUES ('239', '2019-06-01 06:16:47');
INSERT INTO `p_create_id` VALUES ('240', '2019-06-01 06:17:06');
INSERT INTO `p_create_id` VALUES ('241', '2019-06-01 06:18:42');
INSERT INTO `p_create_id` VALUES ('242', '2019-06-01 06:28:57');

-- ----------------------------
-- Table structure for p_manager
-- ----------------------------
DROP TABLE IF EXISTS `p_manager`;
CREATE TABLE `p_manager` (
  `mg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mg_name` char(20) NOT NULL DEFAULT '',
  `password` char(100) NOT NULL DEFAULT '' COMMENT '密码',
  `session_id` char(100) DEFAULT '' COMMENT 'session_id',
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_manager
-- ----------------------------
INSERT INTO `p_manager` VALUES ('1', 'admin123', '$2y$10$7aOkTpl5SyZONeyAjUIRV.aNTc63gpGQQ6LoZV0hb5YekwEiNfrZC', 'VJx5vXA7SlEXwmtgKUKSdnqxkLerv15svuRfNcRH', '0', '2019-06-01 06:00:44', '80', '1', '127.0.0.1', '', '超级管理员', '0', '2019-03-21 17:13:23', null, '2019-06-01 06:00:45');
INSERT INTO `p_manager` VALUES ('2', 'root01', '$2y$10$0JKnnbWsxEvL0zbJkm7IUetjAPXGdPUyPbjQf66FBHd0PPqKi5Ns2', 'Mz3KoQOhG0bSdAhQeBWBzSy5I8kfsgsvm3TIHw7U', '2', '2019-05-28 04:07:09', '2', '1', '127.0.0.1', '', '清除了平台', '4', '2019-03-21 08:56:18', null, '2019-05-28 04:07:09');
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
INSERT INTO `p_manager` VALUES ('18', 'rootroot', '$2y$10$7IlQDIwgyQG2FGaGWT7fUuSvrEKHzM7A1YleIkMCxKVScnxRzzWK6', 'vhqhoYgF5Ik5n3baISihVdqzXXqXJjSfarGYCo4Z', '2', '2019-05-28 09:29:43', '1', '1', '127.0.0.1', '', null, '4', '2019-05-28 04:02:21', null, '2019-05-28 09:29:43');

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
  `pay_type` varchar(20) DEFAULT '' COMMENT '支付类型',
  `username` varchar(20) DEFAULT '' COMMENT '用户账号',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `timeout_express` int(11) DEFAULT NULL COMMENT '过期时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
  `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
  `bio` varchar(255) DEFAULT '' COMMENT '介绍',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 UNION=(`p_order_pl_id_3`);

-- ----------------------------
-- Records of p_orders
-- ----------------------------
INSERT INTO `p_orders` VALUES ('221', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '86BDDF09060DEF79E4A7941B9F9CCBF8', '1559290523', '1559291423', '1', '99.89', '', '2019-05-31 08:15:23', null, null);
INSERT INTO `p_orders` VALUES ('222', '3', '5', 'ali_wap', 'test123', '1', '13', '100', '343C3C505B2298026A67F4DE841BEF24', '1559303345', '1559304245', '1', '99.88', '', '2019-05-31 11:49:05', null, null);
INSERT INTO `p_orders` VALUES ('223', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '5805135628BC4A27B242B8D9BD1C45E5', '1559360303', '1559361203', '1', '99.87', '', '2019-06-01 03:38:23', null, null);
INSERT INTO `p_orders` VALUES ('224', '3', '5', 'ali_wap', 'test123', '1', '13', '100', '8D64DDCD2C2ADC65BE77DD256930A5F0', '1559360510', '1559361410', '1', '99.86', '', '2019-06-01 03:41:51', null, null);
INSERT INTO `p_orders` VALUES ('225', '3', '5', 'ali_wap', 'admin10086', '1', '13', '300', '3216C180C7BC59B94935170BCBC2179F', '1559361858', '1559362758', '1', '300', '', '2019-06-01 04:04:18', null, null);
INSERT INTO `p_orders` VALUES ('226', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '2B63C0037637A17C8B0FF090434CC41F', '1559361900', '1559362800', '1', '99.85', '', '2019-06-01 04:05:00', null, null);
INSERT INTO `p_orders` VALUES ('227', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '0C5E8395A2AB19F9C0D2C64FB1420F1C', '1559361959', '1559362859', '1', '99.84', '', '2019-06-01 04:05:59', null, null);
INSERT INTO `p_orders` VALUES ('228', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'B7CF5C48710672F9421819A80D62510F', '1559366767', '1559367667', '1', '99.83', '', '2019-06-01 05:26:07', null, null);
INSERT INTO `p_orders` VALUES ('229', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'D36F4F48912062FB0D5C0ABD36D445D3', '1559366920', '1559367820', '1', '99.82', '', '2019-06-01 05:28:41', null, null);
INSERT INTO `p_orders` VALUES ('230', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'D95477424F9EE9443FB7ECB4042C064D', '1559367005', '1559367905', '1', '99.81', '', '2019-06-01 05:30:05', null, null);
INSERT INTO `p_orders` VALUES ('231', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'EDF03D842F2C0076866DF4A284BD02B6', '1559367087', '1559367987', '1', '99.8', '', '2019-06-01 05:31:27', null, null);
INSERT INTO `p_orders` VALUES ('232', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'A328A9356904B8C9C33AF8D5B24FA7F0', '1559367132', '1559368032', '1', '99.79', '', '2019-06-01 05:32:12', null, null);
INSERT INTO `p_orders` VALUES ('233', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'EA89EC976C5718289C55946DB0CA75EB', '1559367254', '1559368154', '1', '99.78', '', '2019-06-01 05:34:14', null, null);
INSERT INTO `p_orders` VALUES ('234', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', '7874F0822B2C3C35EC412621F016564E', '1559367321', '1559368221', '1', '99.77', '', '2019-06-01 05:35:21', null, null);
INSERT INTO `p_orders` VALUES ('235', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'F39C8975D5DCBA136DE65E8022F5B41C', '1559367771', '1559368671', '1', '99.76', '', '2019-06-01 05:42:51', null, null);
INSERT INTO `p_orders` VALUES ('236', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'FE637E66FBA90136890DC2A236219506', '1559368507', '1559369407', '1', '99.75', '', '2019-06-01 05:55:07', null, null);
INSERT INTO `p_orders` VALUES ('237', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '26889952DBE73CF32AA7F1BBE5DDDC0A', '1559368689', '1559369589', '1', '99.74', '', '2019-06-01 05:58:10', null, null);
INSERT INTO `p_orders` VALUES ('238', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '946AFA18EBBA1EC6818A2A7F9BA962FA', '1559369741', '1559370641', '1', '99.73', '', '2019-06-01 06:15:42', null, null);
INSERT INTO `p_orders` VALUES ('239', '3', '5', 'ali_wap', 'test123', '1', '13', '100', 'AF86C6752A96B8801A91919404D29534', '1559369807', '1559370707', '1', '99.72', '', '2019-06-01 06:16:47', null, null);
INSERT INTO `p_orders` VALUES ('240', '3', '5', 'ali_wap', 'test123', '1', '13', '100', 'ED9A8229D6AFDAC2EAA81F7DE37299CF', '1559369826', '1559370726', '1', '99.71', '', '2019-06-01 06:17:06', null, null);
INSERT INTO `p_orders` VALUES ('241', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'A5DDBADF6E5824D9602D88D4F2888734', '1559369921', '1559370821', '2', '99.7', '', '2019-06-01 06:18:41', '2019-06-01 06:28:42', null);
INSERT INTO `p_orders` VALUES ('242', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '7F700E74A9BD6EC7CBE98E6FECAAA775', '1559370537', '1559371437', '2', '99.69', '', '2019-06-01 06:28:57', '2019-06-01 06:29:25', null);

-- ----------------------------
-- Table structure for p_order_pl_id_3
-- ----------------------------
DROP TABLE IF EXISTS `p_order_pl_id_3`;
CREATE TABLE `p_order_pl_id_3` (
  `o_id` int(11) unsigned NOT NULL,
  `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
  `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
  `pay_type` varchar(20) DEFAULT '' COMMENT '支付类型',
  `username` varchar(20) DEFAULT '' COMMENT '用户账号',
  `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
  `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
  `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
  `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
  `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `timeout_express` int(11) DEFAULT NULL COMMENT '过期时间',
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
INSERT INTO `p_order_pl_id_3` VALUES ('221', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '86BDDF09060DEF79E4A7941B9F9CCBF8', '1559290523', '1559291423', '1', '99.89', '', '2019-05-31 08:15:23', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('222', '3', '5', 'ali_wap', 'test123', '1', '13', '100', '343C3C505B2298026A67F4DE841BEF24', '1559303345', '1559304245', '1', '99.88', '', '2019-05-31 11:49:05', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('223', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '5805135628BC4A27B242B8D9BD1C45E5', '1559360303', '1559361203', '1', '99.87', '', '2019-06-01 03:38:23', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('224', '3', '5', 'ali_wap', 'test123', '1', '13', '100', '8D64DDCD2C2ADC65BE77DD256930A5F0', '1559360510', '1559361410', '1', '99.86', '', '2019-06-01 03:41:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('225', '3', '5', 'ali_wap', 'admin10086', '1', '13', '300', '3216C180C7BC59B94935170BCBC2179F', '1559361858', '1559362758', '1', '300', '', '2019-06-01 04:04:18', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('226', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '2B63C0037637A17C8B0FF090434CC41F', '1559361900', '1559362800', '1', '99.85', '', '2019-06-01 04:05:00', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('227', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '0C5E8395A2AB19F9C0D2C64FB1420F1C', '1559361959', '1559362859', '1', '99.84', '', '2019-06-01 04:05:59', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('228', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'B7CF5C48710672F9421819A80D62510F', '1559366767', '1559367667', '1', '99.83', '', '2019-06-01 05:26:07', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('229', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'D36F4F48912062FB0D5C0ABD36D445D3', '1559366920', '1559367820', '1', '99.82', '', '2019-06-01 05:28:41', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('230', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'D95477424F9EE9443FB7ECB4042C064D', '1559367005', '1559367905', '1', '99.81', '', '2019-06-01 05:30:05', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('231', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'EDF03D842F2C0076866DF4A284BD02B6', '1559367087', '1559367987', '1', '99.8', '', '2019-06-01 05:31:27', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('232', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'A328A9356904B8C9C33AF8D5B24FA7F0', '1559367132', '1559368032', '1', '99.79', '', '2019-06-01 05:32:12', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('233', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', 'EA89EC976C5718289C55946DB0CA75EB', '1559367254', '1559368154', '1', '99.78', '', '2019-06-01 05:34:14', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('234', '3', '5', 'ali_wap', 'admin88', '1', '13', '100', '7874F0822B2C3C35EC412621F016564E', '1559367321', '1559368221', '1', '99.77', '', '2019-06-01 05:35:21', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('235', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'F39C8975D5DCBA136DE65E8022F5B41C', '1559367771', '1559368671', '1', '99.76', '', '2019-06-01 05:42:51', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('236', '3', '5', 'ali_wap', 'qgxsscdg', '1', '13', '100', 'FE637E66FBA90136890DC2A236219506', '1559368507', '1559369407', '1', '99.75', '', '2019-06-01 05:55:07', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('237', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '26889952DBE73CF32AA7F1BBE5DDDC0A', '1559368689', '1559369589', '1', '99.74', '', '2019-06-01 05:58:10', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('238', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '946AFA18EBBA1EC6818A2A7F9BA962FA', '1559369741', '1559370641', '1', '99.73', '', '2019-06-01 06:15:42', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('239', '3', '5', 'ali_wap', 'test123', '1', '13', '100', 'AF86C6752A96B8801A91919404D29534', '1559369807', '1559370707', '1', '99.72', '', '2019-06-01 06:16:47', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('240', '3', '5', 'ali_wap', 'test123', '1', '13', '100', 'ED9A8229D6AFDAC2EAA81F7DE37299CF', '1559369826', '1559370726', '1', '99.71', '', '2019-06-01 06:17:06', null, null);
INSERT INTO `p_order_pl_id_3` VALUES ('241', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', 'A5DDBADF6E5824D9602D88D4F2888734', '1559369921', '1559370821', '2', '99.7', '', '2019-06-01 06:18:41', '2019-06-01 06:28:42', null);
INSERT INTO `p_order_pl_id_3` VALUES ('242', '3', '5', 'ali_wap', 'admin10086', '1', '13', '100', '7F700E74A9BD6EC7CBE98E6FECAAA775', '1559370537', '1559371437', '2', '99.69', '', '2019-06-01 06:28:57', '2019-06-01 06:29:25', null);

-- ----------------------------
-- Table structure for p_payproduct
-- ----------------------------
DROP TABLE IF EXISTS `p_payproduct`;
CREATE TABLE `p_payproduct` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) DEFAULT '0' COMMENT '排序id',
  `pay_name` char(20) DEFAULT '' COMMENT '支付栏目的名称',
  `pay_icon` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 支付宝转账银行卡,,,1微信商户号',
  `pay_type` varchar(20) DEFAULT '',
  `roll_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,正序第一个账号1,达到支付次数(max)切换,2,达到时间间隔(max)切换,3,达到收款金额(max)切换',
  `roll_range` varchar(100) DEFAULT '' COMMENT '循环的数据 ',
  `status` tinyint(7) NOT NULL DEFAULT '1' COMMENT '1 显示 2 停用(前端是否显示)',
  `desc` varchar(250) DEFAULT '' COMMENT '支付方式的描述',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_payproduct
-- ----------------------------
INSERT INTO `p_payproduct` VALUES ('3', '200', '支付宝转银行卡', '0', null, '1', '1000', '2', '单笔最低10元,最高10000元', '2019-04-25 05:36:41', null, null);
INSERT INTO `p_payproduct` VALUES ('4', '100', '微信扫码', '0', null, '2', '5', '2', '单笔最低10元,最高10000元', '2019-04-26 07:39:14', null, null);
INSERT INTO `p_payproduct` VALUES ('5', '300', '支付宝转账', '0', 'ali_wap', '0', '10', '1', '支付宝官方接口--支付宝 手机网页 支付', '2019-05-30 03:42:48', null, null);
INSERT INTO `p_payproduct` VALUES ('6', '700', '招商支付', '0', 'cmb_wap', '0', null, '2', '招商官方接口--招商h5支付，其实app支付也是使用的h5', '2019-05-31 03:40:24', null, null);
INSERT INTO `p_payproduct` VALUES ('7', '900', '微信支付', '0', 'wx_wap', '0', null, '2', '微信官方接口--微信wap支付，针对特定用户', '2019-05-31 03:54:19', null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_platform_payproduct
-- ----------------------------
INSERT INTO `p_platform_payproduct` VALUES ('12', '3', '4', '2019-05-09 05:51:02', null, '2019-05-09 05:51:02');
INSERT INTO `p_platform_payproduct` VALUES ('9', '3', '3', '2019-05-09 05:12:09', null, '2019-05-09 05:12:09');
INSERT INTO `p_platform_payproduct` VALUES ('13', '4', '3', '2019-05-09 05:53:22', null, '2019-05-09 05:53:22');
INSERT INTO `p_platform_payproduct` VALUES ('14', '6', '4', '2019-05-09 05:53:27', null, '2019-05-09 05:53:27');
INSERT INTO `p_platform_payproduct` VALUES ('15', '3', '5', '2019-05-30 03:43:28', null, '2019-05-30 03:43:28');
INSERT INTO `p_platform_payproduct` VALUES ('16', '3', '7', '2019-05-31 03:59:22', null, '2019-05-31 03:59:22');
INSERT INTO `p_platform_payproduct` VALUES ('17', '3', '6', '2019-05-31 03:59:22', null, '2019-05-31 03:59:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_role
-- ----------------------------
INSERT INTO `p_role` VALUES ('1', '开发-00', null, null, '1', '这个是开发使用的角色0', '2019-03-21 06:42:24', null, null);
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
INSERT INTO `p_role` VALUES ('12', '11', null, null, '1', '1111', '2019-05-28 05:15:46', null, null);

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
