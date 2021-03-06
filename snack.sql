/*
MySQL Data Transfer
Source Host: 47.106.229.54
Source Database: sue
Target Host: 47.106.229.54
Target Database: sue
Date: 2019/5/16 15:41:46
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for snack_admin
-- ----------------------------
CREATE TABLE `snack_admin` (
  `userId` int(11) NOT NULL,
  `userName` longtext,
  `userPw` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_catelog
-- ----------------------------
CREATE TABLE `snack_catelog` (
  `catelog_id` int(11) NOT NULL AUTO_INCREMENT,
  `catelog_name` longtext,
  `catelog_del` varchar(50) DEFAULT 'no',
  PRIMARY KEY (`catelog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_film
-- ----------------------------
CREATE TABLE `snack_film` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) DEFAULT NULL,
  `p_address` varchar(150) DEFAULT NULL,
  `p_is_first` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_fourbanner
-- ----------------------------
CREATE TABLE `snack_fourbanner` (
  `four_banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `four_banner_describe` text,
  `four_banner_pic` text,
  `four_banner_date` int(10) NOT NULL,
  `four_banner_isInstead` varchar(10) DEFAULT 'no',
  `four_banner_isDel` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`four_banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_gonggao
-- ----------------------------
CREATE TABLE `snack_gonggao` (
  `gonggao_id` int(11) NOT NULL AUTO_INCREMENT,
  `gonggao_title` longtext,
  `gonggao_content` longtext,
  `gonggao_date` varchar(50) DEFAULT NULL,
  `gonggao_fabuzhe` tinytext,
  `gonggao_del` varchar(50) DEFAULT 'no',
  PRIMARY KEY (`gonggao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_goods
-- ----------------------------
CREATE TABLE `snack_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` longtext,
  `goods_miaoshu` longtext,
  `goods_pic` longtext,
  `goods_date` varchar(50) DEFAULT NULL,
  `goods_yanse` varchar(50) DEFAULT NULL,
  `goods_shichangjia` int(11) DEFAULT NULL,
  `goods_tejia` int(11) DEFAULT NULL,
  `goods_isnottejia` varchar(50) DEFAULT 'no',
  `goods_isnottuijian` varchar(50) DEFAULT 'no',
  `goods_catelog_id` int(11) DEFAULT NULL,
  `goods_kucun` int(11) DEFAULT '100',
  `goods_Del` varchar(50) DEFAULT 'no',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_information
-- ----------------------------
CREATE TABLE `snack_information` (
  `information_id` int(11) NOT NULL AUTO_INCREMENT,
  `information_name` text,
  `information_content` text,
  `information_pic` text,
  `information_date` text,
  `information_isShow` int(10) DEFAULT '0',
  PRIMARY KEY (`information_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_liuyan
-- ----------------------------
CREATE TABLE `snack_liuyan` (
  `liuyan_id` int(11) NOT NULL AUTO_INCREMENT,
  `liuyan_title` varchar(50) DEFAULT NULL,
  `liuyan_content` longtext,
  `liuyan_date` longtext,
  `liuyan_user` varchar(50) DEFAULT NULL,
  `liuyan_isOk` int(10) DEFAULT '0',
  PRIMARY KEY (`liuyan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_logo
-- ----------------------------
CREATE TABLE `snack_logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_pic` text,
  `logo_date` int(10) DEFAULT NULL,
  `logo_isInstead` varchar(10) DEFAULT 'no',
  `logo_isDel` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_onebanner
-- ----------------------------
CREATE TABLE `snack_onebanner` (
  `one_banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `one_banner_describe` text,
  `one_banner_pic` text,
  `one_banner_date` int(10) NOT NULL,
  `one_banner_isInstead` varchar(10) DEFAULT 'no',
  `one_banner_isDel` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`one_banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_order
-- ----------------------------
CREATE TABLE `snack_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_bianhao` longtext,
  `order_date` varchar(50) DEFAULT NULL,
  `order_zhuangtai` varchar(50) DEFAULT 'no',
  `order_songhuodizhi` varchar(50) DEFAULT NULL,
  `order_fukuangfangshi` varchar(50) DEFAULT NULL,
  `order_jine` int(11) DEFAULT NULL,
  `order_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_orderitem
-- ----------------------------
CREATE TABLE `snack_orderitem` (
  `orderItem_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `goods_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderItem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_sales
-- ----------------------------
CREATE TABLE `snack_sales` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `data_total` int(10) NOT NULL,
  `data_week` int(10) NOT NULL,
  `data_catelog_id` int(10) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_salesvolume
-- ----------------------------
CREATE TABLE `snack_salesvolume` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `data_num` int(10) DEFAULT '0',
  `data_week` int(10) DEFAULT NULL,
  `data_catelog_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_threebanner
-- ----------------------------
CREATE TABLE `snack_threebanner` (
  `three_banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `three_banner_describe` text,
  `three_banner_pic` text,
  `three_banner_date` int(10) NOT NULL,
  `three_banner_isInstead` varchar(10) DEFAULT 'no',
  `three_banner_isDel` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`three_banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_twobanner
-- ----------------------------
CREATE TABLE `snack_twobanner` (
  `two_banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `two_banner_describe` text,
  `two_banner_pic` text,
  `two_banner_date` int(10) NOT NULL,
  `two_banner_isInstead` varchar(10) DEFAULT 'no',
  `two_banner_isDel` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`two_banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for snack_user
-- ----------------------------
CREATE TABLE `snack_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` longtext,
  `user_pw` varchar(50) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `user_realname` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_sex` varchar(50) DEFAULT NULL,
  `user_tel` varchar(50) DEFAULT NULL,
  `user_qq` varchar(50) DEFAULT NULL,
  `user_del` varchar(50) DEFAULT 'no',
  `user_review` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `snack_admin` VALUES ('1', 'admin', '960601');
INSERT INTO `snack_catelog` VALUES ('4', '膨化食品', 'no');
INSERT INTO `snack_catelog` VALUES ('5', '糖果', 'no');
INSERT INTO `snack_catelog` VALUES ('6', '威化饼干', 'no');
INSERT INTO `snack_catelog` VALUES ('7', '海苔系列', 'no');
INSERT INTO `snack_catelog` VALUES ('8', '膨化食品2', 'yes');
INSERT INTO `snack_catelog` VALUES ('9', '卫龙系列', 'no');
INSERT INTO `snack_catelog` VALUES ('10', 'cate', 'yes');
INSERT INTO `snack_catelog` VALUES ('11', '饮料', 'no');
INSERT INTO `snack_film` VALUES ('3', '宣传片', 'http://www.iqiyi.com/v_19rr8zfxjo.html', '1');
INSERT INTO `snack_film` VALUES ('4', '宣传片', 'http://www.iqiyi.com/marketing/LZLJ.html', '0');
INSERT INTO `snack_fourbanner` VALUES ('3', '本月活动', '/image/155256915195395c8a533fa71ba.jpg', '1552569153', 'yes', 'no');
INSERT INTO `snack_fourbanner` VALUES ('4', '进口零食', '/image/155257019198075c8a574f4378e.jpg', '1552570192', 'no', 'no');
INSERT INTO `snack_gonggao` VALUES ('1', '对于本欢迎大家提出宝贵意见', '<strong>对于本欢迎大家提出宝贵意见</strong>', '2019-02-24 00:37:30', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('2', '部分商品8折销售。欢迎选购', '<strong>部分商品8折销售。欢迎选购</strong>', '2019-02-24 00:38:30', null, 'yes');
INSERT INTO `snack_gonggao` VALUES ('4', '1111111111', '请输入内容111111', '2019-02-24 00:39:30', null, 'yes');
INSERT INTO `snack_gonggao` VALUES ('5', '商家添加新零食', '2019', '2019-03-02 07:10:30', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('6', '商家添加新零食', '商家于2019-03-02 19:18:38在类别《膨化食品》 添加零食 《格力高百醇抹茶慕斯味48g》', '2019-03-02 19:18:38', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('7', '商家添加新零食', '商家于2019-03-02 19:24:03在类别《膨化食品》 添加零食 《恩恩额》', '2019-03-02 19:24:03', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('8', '商家添加新零食', '商家于2019-03-02 19:24:44在类别《糖果》 添加零食 《fdf》', '2019-03-02 19:24:44', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('9', '商家添加新零食', '商家于2019-03-14 13:54:54在类别《卫龙系列》 添加零食 《卫龙 亲嘴道 辣条 调味面制品 休闲零食 50g》', '2019-03-14 13:54:54', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('10', '商家添加新零食', '商家于2019-03-14 14:05:56在类别《卫龙系列》 添加零食 《卫龙辣条》', '2019-03-14 14:05:56', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('11', '商家添加新零食', '商家于2019-03-14 14:07:19在类别《卫龙系列》 添加零食 《卫龙豆皮》', '2019-03-14 14:07:19', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('12', '商家修改用户', '商家于2019-04-10 17:39:48修改用户:刘明', '2019-04-10 17:39:48', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('13', '商家修改用户', '商家于2019-04-10 17:41:05修改用户:刘明', '2019-04-10 17:41:05', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('14', '商家删除用户', '商家于2019-04-10 17:43:19删除用户:tt', '2019-04-10 17:43:19', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('15', '商家修改用户', '商家于2019-04-10 17:44:01修改用户:张丽', '2019-04-10 17:44:01', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('16', '商家修改用户', '商家于2019-04-10 17:44:13修改用户:小鹏', '2019-04-10 17:44:13', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('17', '管理员登陆', '管理员于2019-04-10 17:46:57登陆管理系统', '2019-04-10 17:46:57', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('18', '管理员登陆', '管理员于2019-04-10 20:12:27登陆管理系统', '2019-04-10 20:12:27', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('19', '商家零食价格变动', '商家于2019-04-10 20:12:59变动零食《卫龙 亲嘴道 辣条 调味面制品》价格，请大家注意~', '2019-04-10 20:12:59', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('20', '管理员登陆', '管理员于2019-04-11 11:00:27登陆管理系统', '2019-04-11 11:00:27', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('21', '管理员登陆', '管理员于2019-04-14 13:53:03登陆管理系统', '2019-04-14 13:53:03', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('22', '管理员登陆', '管理员于2019-04-15 14:49:54登陆管理系统', '2019-04-15 14:49:54', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('23', '管理员登陆', '管理员于2019-04-16 12:03:49登陆管理系统', '2019-04-16 12:03:49', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('24', '管理员宣传片修改', '管理员于2019-04-16 13:06:59更改宣传片《宣传片》，请大家注意查看~', '2019-04-16 13:06:59', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('25', '管理员宣传片修改', '管理员于2019-04-16 13:18:48更改宣传片《宣传片》，请大家注意查看~', '2019-04-16 13:18:48', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('26', '管理员宣传片修改', '管理员于2019-04-16 13:21:07更改宣传片《宣传片》，请大家注意查看~', '2019-04-16 13:21:07', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('27', '管理员宣传片修改', '管理员于2019-04-16 13:29:38更改宣传片《宣传片》，请大家注意查看~', '2019-04-16 13:29:38', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('28', '管理员登陆', '管理员于2019-04-16 13:51:17登陆管理系统', '2019-04-16 13:51:17', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('29', '管理员登陆', '管理员于2019-04-16 14:49:49登陆管理系统', '2019-04-16 14:49:49', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('30', '管理员登陆', '管理员于2019-04-16 14:58:55登陆管理系统', '2019-04-16 14:58:55', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('31', '管理员宣传片修改', '管理员于2019-04-16 14:59:13更改宣传片《宣传片》，请大家注意查看~', '2019-04-16 14:59:13', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('32', '管理员登陆', '管理员于2019-04-17 13:44:54登陆管理系统', '2019-04-17 13:44:54', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('33', '管理员登陆', '管理员于2019-04-19 14:23:28登陆管理系统', '2019-04-19 14:23:28', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('34', '管理员登陆', '管理员于2019-04-20 13:31:23登陆管理系统', '2019-04-20 13:31:23', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('35', '管理员登陆', '管理员于2019-04-21 11:43:00登陆管理系统', '2019-04-21 11:43:00', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('36', '管理员登陆', '管理员于2019-04-25 12:48:16登陆管理系统', '2019-04-25 12:48:16', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('37', '管理员登陆', '管理员于2019-04-25 12:48:16登陆管理系统', '2019-04-25 12:48:16', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('38', '管理员登陆', '管理员于2019-04-25 14:24:23登陆管理系统', '2019-04-25 14:24:23', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('39', '管理员登陆', '管理员于2019-04-25 14:24:25登陆管理系统', '2019-04-25 14:24:25', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('40', '管理员登陆', '管理员于2019-04-25 14:24:26登陆管理系统', '2019-04-25 14:24:26', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('41', '管理员登陆', '管理员于2019-04-26 14:29:08登陆管理系统', '2019-04-26 14:29:08', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('42', '商家添加零食类型', '商家于2019-04-26 14:30:33添加零食类型《饮料》', '2019-04-26 14:30:33', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('43', '管理员登陆', '管理员于2019-04-28 14:56:23登陆管理系统', '2019-04-28 14:56:23', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('44', '管理员登陆', '管理员于2019-04-29 15:47:28登陆管理系统', '2019-04-29 15:47:28', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('45', '管理员登陆', '管理员于2019-04-29 15:47:31登陆管理系统', '2019-04-29 15:47:31', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('46', '管理员登陆', '管理员于2019-04-29 15:47:33登陆管理系统', '2019-04-29 15:47:33', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('47', '管理员登陆', '管理员于2019-04-29 15:47:35登陆管理系统', '2019-04-29 15:47:35', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('48', '管理员登陆', '管理员于2019-04-29 15:47:49登陆管理系统', '2019-04-29 15:47:49', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('49', '管理员登陆', '管理员于2019-04-29 20:55:12登陆管理系统', '2019-04-29 20:55:12', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('50', '商家修改用户', '商家于2019-04-29 21:28:06修改用户:刘明', '2019-04-29 21:28:06', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('51', '管理员登陆', '管理员于2019-04-30 10:27:51登陆管理系统', '2019-04-30 10:27:51', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('52', '管理员登陆', '管理员于2019-04-30 10:48:01登陆管理系统', '2019-04-30 10:48:01', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('53', '管理员登陆', '管理员于2019-05-01 14:02:40登陆管理系统', '2019-05-01 14:02:40', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('54', '管理员登陆', '管理员于2019-05-03 00:33:08登陆管理系统', '2019-05-03 00:33:08', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('55', '管理员登陆', '管理员于2019-05-03 11:12:51登陆管理系统', '2019-05-03 11:12:51', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('56', '管理员登陆', '管理员于2019-05-03 11:12:54登陆管理系统', '2019-05-03 11:12:54', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('57', '管理员登陆', '管理员于2019-05-03 23:53:26登陆管理系统', '2019-05-03 23:53:26', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('58', '管理员登陆', '管理员于2019-05-05 19:33:09登陆管理系统', '2019-05-05 19:33:09', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('59', '管理员登陆', '管理员于2019-05-07 00:03:00登陆管理系统', '2019-05-07 00:03:00', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('60', '管理员登陆', '管理员于2019-05-07 00:03:03登陆管理系统', '2019-05-07 00:03:03', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('61', '管理员登陆', '管理员于2019-05-07 15:18:35登陆管理系统', '2019-05-07 15:18:35', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('62', '管理员登陆', '管理员于2019-05-09 11:17:07登陆管理系统', '2019-05-09 11:17:07', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('63', '管理员登陆', '管理员于2019-05-09 18:36:52登陆管理系统', '2019-05-09 18:36:52', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('64', '管理员登陆', '管理员于2019-05-09 23:22:05登陆管理系统', '2019-05-09 23:22:05', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('65', '管理员登陆', '管理员于2019-05-09 23:22:07登陆管理系统', '2019-05-09 23:22:07', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('66', '管理员登陆', '管理员于2019-05-13 15:01:35登陆管理系统', '2019-05-13 15:01:35', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('67', '管理员登陆', '管理员于2019-05-13 15:01:36登陆管理系统', '2019-05-13 15:01:36', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('68', '管理员登陆', '管理员于2019-05-14 13:06:45登陆管理系统', '2019-05-14 13:06:45', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('69', '管理员登陆', '管理员于2019-05-15 15:59:53登陆管理系统', '2019-05-15 15:59:53', null, 'no');
INSERT INTO `snack_gonggao` VALUES ('70', '管理员登陆', '管理员于2019-05-15 22:43:45登陆管理系统', '2019-05-15 22:43:45', null, 'no');
INSERT INTO `snack_goods` VALUES ('1', '海太蜂蜜黄油薯片韩国进口', '<p>韩国进口 海太蜂蜜黄油薯片60g*5袋土豆片休闲零食品膨化小吃特产</p>', '/upload/1519715962089.jpg', '2019-2-22 21:34:43', null, '58', '59', 'no', 'no', '4', '100', 'no');
INSERT INTO `snack_goods` VALUES ('2', '韩国进口趣莱福虾片240g', '包邮韩国进口趣莱福虾片240g大包装家庭装膨化食品休闲零食年货<br />\r\n<br />\r\n厂名: 趣莱福食品厂厂址: 韩国厂家联系方式: 4008807117配料表: 详情见外包装为准储藏方法: 避免阳光直射保质期: 180食品添加剂: 详情见外包装为准净含量: 240g包装方式: 包装品牌: 趣莱福系列: 虾片240g', '/upload/1519716076892.jpg', '2019-2-25 21:34:43', null, '45', '45', 'no', 'no', '4', '100', 'no');
INSERT INTO `snack_goods` VALUES ('3', '马来西亚小吃锅巴', '厂名: 马来西亚天祥有限公司厂址: 11-11A/15,Jalan perusahaan Ringan1厂家联系方式: 00000配料表: 豌豆粉，鱼露1%，植物油，白砂糖，食盐储藏方法: 阴凉干燥保质期: 365食品添加剂: 无任何添加剂净含量: 700g包装方式: 包装品牌: POPO（马来西亚）', '/upload/1519716178228.jpg', '2019-2-27 21:34:50', null, '38', '38', 'no', 'no', '4', '100', 'no');
INSERT INTO `snack_goods` VALUES ('4', '九日始祖炒年糕条', '天天特价100g*5袋 韩国进口零食品九日始祖炒年糕条 香脆甜辣膨化<br />\r\n厂名: 韩国厂址: 韩国厂家联系方式: 02114455850配料表: 小麦粉、白砂糖、棕榈油、果葡萄浆、食盐、辣椒酱等储藏方法: 阴凉干爽处保质期: 365食品添加剂: 见包装净含量: 550g包装方式: 包装品牌: 九日系列: 炒年糕条', '/upload/1519716252977.jpg', '2019-2-27 21:34:43', null, '35', '35', 'no', 'no', '4', '100', 'no');
INSERT INTO `snack_goods` VALUES ('5', '紫皮糖俄罗斯食品进口糖果', '俄罗斯紫皮糖 kdv紫皮糖 紫皮糖俄罗斯正品 俄罗斯糖果紫皮糖 俄罗斯进口紫皮糖 kdv俄罗斯紫皮糖 俄罗斯紫皮糖巧克力 ego紫皮 牛轧糖 俄罗斯巧克力糖 俄罗斯芒果糖 俄罗斯食品 花生糖', '/upload/1519716366048.jpg', '2019-2-27 21:34:43', null, '45', '45', 'no', 'no', '5', '100', 'no');
INSERT INTO `snack_goods` VALUES ('6', '硬糖果glico固力果格力高迪士尼', '款棒棒糖是固家米奇系列中的一款，请享受流行相结合的糖果口味,糖糖的形状是可爱的MICKY造型，大朋友们含上一支也会觉得仿佛回到了童年呢，呵呵。。。此款有多款包装，发货均随机，以收到的货物为准哦。<br />\r\n厂名: 江崎 株式会社厂址: 日本大阪市西町川区歌岛4-6-5厂家联系方式: 0120-917-111配料表: 水饴、植物油脂、酸味料、香料、乳化剂等储藏方法: 存放于阴凉干燥处保质期: 540食品添加剂: 见包装产品: 棒棒糖净含量: 60g包装方式: 包装包装种类: 袋装是否为有机食品: 否品牌: 固力果', '/upload/1519716456886.jpg', '2019-2-27 21:34:43', null, '48', '48', 'no', 'no', '5', '100', 'no');
INSERT INTO `snack_goods` VALUES ('7', '二斤装俄罗斯进口零食品奶罐糖', '厂名:&nbsp; 俄罗斯斯拉夫食品有限公司厂址: 俄罗斯列宁格勒街324号厂家联系方式: 15561974000配料表: 牛奶，可可脂，碎花生，白砂糖等储藏方法: 阴凉干燥处保质期: 150食品添加剂: 见包装产品: 喜糖净含量: 1000g包装方式: 散装商品条形码: 4605142020518是否为有机食品: 否品牌: 斯拉夫系列: 奶罐是否含糖: 含糖产地: 俄罗斯口味: 红色牛奶口味1斤 蓝色巧克力1斤', '/upload/1519716549060.jpg', '2019-2-27 21:34:43', null, '45', '45', 'no', 'no', '5', '100', 'no');
INSERT INTO `snack_goods` VALUES ('8', '台湾进口 秀逗超级酸水果糖6口味', '厂名：环宇开发生技食品有限公司厂址：桃园市大溪区仁善里15邻松树21之3号厂家联系方式：021-59155307配料表：白砂糖、麦芽糖、植物油、苹果酸、柠檬酸、食用香精、柏油、阿拉伯胶、维生素C等。储藏方法：常温，避免阳光直射保质期：540 天食品添加剂：详见包装产品: 其他/other净含量: 360g包装方式: 包装包装种类: 袋装商品条形码: 4716609076327品牌: 秀逗系列: 15g*24包是否含糖: 含糖产地: 港澳台', '/upload/1519716638467.jpg', '2019-2-27 21:34:43', null, '58', '58', 'no', 'no', '5', '95', 'no');
INSERT INTO `snack_goods` VALUES ('9', '爱时乐奶油威化卷心酥威化饼干', '厂名：尤益嘉(上海)食品商贸有限公司厂址：上海市沪南路2888弄1号楼2楼厂家联系方式：021-57275756配料表：详见包装储藏方法：存放于阴凉干燥处保质期：730 天食品添加剂：详见包装产品名称：Astick/爱时乐 威化卷心酥...净含量: 330g包装方式: 包装商品条形码: 8996001355602糕点种类: 威化饼干品牌', '/upload/1519717567042.jpg', '2019-2-27 21:34:43', null, '38', '38', 'no', 'no', '6', '100', 'no');
INSERT INTO `snack_goods` VALUES ('10', '印尼进口零食丽芝士纳宝帝nabati奶酪', '名: KALDU SARI NABATI INDO厂址: 印尼厂家联系方式: 0755-83733919配料表: 小麦粉、白砂糖、植物油储藏方法: 阴凉干燥处保质期: 365食品添加剂: 有产品名称: 丽芝士（印度尼西亚） 纳宝帝奶酪威化饼干200g*3净含量: 600g包装方式: 包装商品条形码: 8993175537391是否为有机食品: 否糕点种类: 威化饼干', '/upload/1519717689768.jpg', '2019-2-27 21:34:43', null, '29', '29', 'no', 'no', '6', '100', 'no');
INSERT INTO `snack_goods` VALUES ('11', '馋嘴屋 意大利进口零食品', '厂名: 意大利莱家有限公司奥地利分公司厂址: 意大利保素鲁欧邵艺园厂家联系方式: 86-21-62967604配料表: 小麦粉、椰子油、乳清粉、白砂糖、大豆粉、榛子、天然香草等储藏方法: 阴凉干燥处保质期: 540食品添加剂: 膨松剂、乳化剂净含量: 125g包装方式: 包装商品条形码: 8000380142460', '/upload/1519717787986.jpg', '2019-2-27 21:34:43', null, '15', '15', 'no', 'no', '6', '92', 'no');
INSERT INTO `snack_goods` VALUES ('12', '印尼进口零食丽芝士richesse', '厂名: PTKALDUSARINABATIINDONESIA厂址: 印度尼西亚厂家联系方式: 62227780222配料表: 详见包装储藏方法: 存放在阴凉干燥处保质期: 365食品添加剂: 详见包装净含量: 290g包装方式: 包装商品条形码: 8993175537391', '/upload/1519718041923.jpg', '2019-2-27 21:34:43', null, '29', '29', 'no', 'no', '6', '100', 'no');
INSERT INTO `snack_goods` VALUES ('13', '韩国进口九日即食迷你寿司海苔', '厂名：韩国九日株会社厂址：韩国厂家联系方式：29175774配料表：海苔49.2% 玉米油38.2% 香油4.2% 紫苏籽油3.8% 葵花油1.2% 盐2.2% 黄土盐1.2%储藏方法：请置于阴凉,干燥处,避免阳直射保质期：365 天食品添加剂：无净含量: 80g包装方式: 包装原产地: 韩国品牌: 九日', '/upload/1519718529422.jpg', '2019-2-27 21:34:43', null, '36', '36', 'no', 'no', '7', '100', 'no');
INSERT INTO `snack_goods` VALUES ('14', '泰国进口小老板脆紫菜炸海苔片', '厂名：Taokaenoi Food厂址：泰国厂家联系方式：86-757-85589367配料表：紫菜、棕榈油、食盐、胡椒粉等。储藏方法：置于阴凉干燥处，避免阳光直射保质期：450 天食品添加剂：见包装净含量: 192g包装方式: 包装原产地: 其他/other', '/upload/1519718760646.jpg', '2019-2-27 21:34:43', null, '39', '39', 'no', 'no', '7', '100', 'no');
INSERT INTO `snack_goods` VALUES ('15', '泰国进口零食小浣熊海苔片', '厂名: Triple-M Product Co.,Ltd厂址: 232/20 SUKHUMVIT RD,SOI 22，KLONGTOEY,THAILAND.厂家联系方式: 18016322336配料表: 详见包装储藏方法: 避光常温保存保质期: 450食品添加剂: 详见包装净含量: 150g包装方式: 包装原产地: 其他/other品牌: 小浣熊（泰国）系列: 海苔片50g*3', '/upload/1519718872967.jpg', '2019-2-27 21:34:43', null, '39', '39', 'no', 'no', '7', '100', 'no');
INSERT INTO `snack_goods` VALUES ('16', '格力高百醇抹茶慕斯味48g', '&lt;p&gt;格力高百醇抹茶慕斯味48g&lt;/p&gt;&lt;p&gt;格力高百醇抹茶慕斯味48g&lt;/p&gt;&lt;p&gt;格力高百醇抹茶慕斯味48g&lt;/p&gt;&lt;h3 class=&quot;name&quot;&gt;格力高百醇抹茶慕斯味48g&lt;/h3&gt;', '/Uploads/39e5e4ee165f577f95797ac138ec964e155152481258705c7a63ccadf74.jpg', '2019-03-02 07:10:30', null, '15', '15', 'no', 'no', '6', '100', 'yes');
INSERT INTO `snack_goods` VALUES ('17', '格力高百醇抹茶慕斯味48g', '&lt;p&gt;&lt;span&gt;厂名: 意大利莱家有限公司奥地利分公司厂址: 意大利保素鲁欧邵艺园厂家联系方式: 86-21-62967604配料表: 小麦粉、椰子油、乳清粉、白砂糖、大豆粉、榛子、天然香草等储藏方法: 阴凉干燥处保质期: 540食品添加剂: 膨松剂、乳化剂净含量: 125g包装方式: 包装商品条形码: 8000380142460&lt;/span&gt;&lt;/p&gt;', '/Uploads/0da0e5b21e870c7fa8ba1a6c0acf64be155152551118145c7a66872b524.jpg', '2019-03-02 19:18:38', null, '25', '25', 'no', 'no', '4', '100', 'yes');
INSERT INTO `snack_goods` VALUES ('18', '恩恩额', '&amp;nbsp;恩恩额', '/Uploads/3edf59bba7cbe0b19dfc39966ba59f94155152583826955c7a67ce8f826.jpg', '2019-03-02 19:24:03', null, '30', '30', 'no', 'no', '4', '100', 'yes');
INSERT INTO `snack_goods` VALUES ('19', 'fdf', '第三个对手', '/Uploads/a2b0b3fcc0b055446205b640b3c65286155152588180875c7a67f91f88d.jpg', '2019-03-02 19:24:44', null, '50', '50', 'no', 'no', '5', '100', 'yes');
INSERT INTO `snack_goods` VALUES ('20', '卫龙 亲嘴道 辣条 调味面制品', '&lt;p&gt;&lt;span&gt;采用天然植物香料古法卤制，沿袭传统豆干特色，味浓多汁、外韧内滑、鲜香回弹。豆干因其助消化、增食欲之功效，被世人誉为补益清热养生佳品，欢乐休闲美味共享。&lt;/span&gt;&lt;/p&gt;', '/Uploads/754e4f012479a446dda877fab37e573515525428894335c89eca9bf773.jpg', '2019-03-14 13:54:54', null, '10', '3', 'no', 'no', '9', '100', 'yes');
INSERT INTO `snack_goods` VALUES ('21', '卫龙辣条', '&lt;p&gt;&lt;span&gt;正宗广西八角增添芬芳，南欧褐芥籽释放麻辣，四川大红袍花椒凸显辛辣，卫龙“魔芋爽”采用云南优质魔芋精制，量身定制的高级调味。以“毛肚”的韧性挑战十足的嚼劲，魔芋低热低脂、高纤维的特点营造苗条体态。闻之鲜香四溢，食之麻辣爽口，持久回弹。&lt;/span&gt;&lt;/p&gt;', '/Uploads/b1eb8ff1b1ca2224dc6b07a719edb457155254354671885c89ef3ab3e55.jpg', '2019-03-14 14:05:56', null, '4', '4', 'no', 'no', '9', '99', 'no');
INSERT INTO `snack_goods` VALUES ('22', '卫龙豆皮', '&lt;p&gt;&lt;span&gt;正宗广西八角增添芬芳，南欧褐芥籽释放麻辣，四川大红袍花椒凸显辛辣，卫龙“魔芋爽”采用云南优质魔芋精制，量身定制的高级调味。以“毛肚”的韧性挑战十足的嚼劲，魔芋低热低脂、高纤维的特点营造苗条体态。闻之鲜香四溢，食之麻辣爽口，持久回弹。&lt;/span&gt;&lt;/p&gt;', '/Uploads/03a48ff4b6afd23462deb72b449a9ad8155254363294675c89ef90b8ed2.jpg', '2019-03-14 14:07:19', null, '6', '10', 'no', 'no', '9', '100', 'no');
INSERT INTO `snack_information` VALUES ('1', '测试', '&lt;p&gt;this is a test&lt;/p&gt;', '/Uploads/fc6abeebec90204ee58c0186d6286a35155228250749415c85f38b91924.jpg', '2019-03-11 13:35:10', '1');
INSERT INTO `snack_information` VALUES ('2', '测试2', 'this is a test', '/Uploads/a727fc9643e2a7eef79fb0781e75cb06155228284878205c85f4e051053.jpg', '2019-03-11 13:40:49', '1');
INSERT INTO `snack_information` VALUES ('3', 'test1', '在西安草莓音乐节现场，百草味是最火爆的场馆之一，随偶有下雨但丝毫没有减退大家的热情。', '/Uploads/aa7df3a03577c74a7088d3a52f23d4f8155479180213365cac3d7abc58f.jpg', '2019-04-09 14:36:44', '1');
INSERT INTO `snack_information` VALUES ('4', '音乐节', '&lt;p&gt;&lt;span&gt;2天时间迎来了数万名喜欢音乐的潮男潮女。&lt;/span&gt;&lt;/p&gt;', '/Uploads/19d40f876d9a50e88d295fe53282a10915547921566405cac3edcf191a.jpg', '2019-04-09 14:42:39', '1');
INSERT INTO `snack_liuyan` VALUES ('1', '发货速度很快', '<p>发货速度很快，赞一个</p>', '2019-02-22 20:30:28', 'lnyxb', '1');
INSERT INTO `snack_liuyan` VALUES ('2', '请确保质量和数量。', '请确保商品质量和数量。', '2019-02-25 16:19:22', 'lnyxb', '1');
INSERT INTO `snack_liuyan` VALUES ('3', '请打好包装再发。', '请打好包装再发。', '2019-02-25 16:20:56', 'zhouyue', '2');
INSERT INTO `snack_liuyan` VALUES ('6', 'test', 'test', '2019-03-16 13:43:13', 'zhouyue', '1');
INSERT INTO `snack_liuyan` VALUES ('8', '发货速度快', '&lt;p&gt;&lt;b&gt;这挺快的呀，几天就到了&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;&lt;i&gt;是谁呢咖啡&lt;/i&gt;&lt;/b&gt;&lt;/p&gt;', '2019-04-10 13:07:31', 'liusan3', '1');
INSERT INTO `snack_logo` VALUES ('2', '/image/155257055547555c8a58bb4bf7f.jpg', '1552570556', 'yes', 'no');
INSERT INTO `snack_onebanner` VALUES ('10', '首页广告', '/image/155257047752855c8a586d7b821.jpg', '1552570478', 'yes', 'no');
INSERT INTO `snack_onebanner` VALUES ('11', '测试', '/image/155257104856125c8a5aa81a50a.jpg', '1552571048', 'no', 'no');
INSERT INTO `snack_order` VALUES ('1', '20190327054138', '2019-03-27 05:41:38', 'yes', '中华路25号', '货到付款', '161', '2');
INSERT INTO `snack_order` VALUES ('2', '20190327054244', '2019-03-27 05:42:44', 'yes', '胜利路99号', '货到付款', '101', '1');
INSERT INTO `snack_order` VALUES ('3', '20190327054334', '2019-03-27 05:43:34', 'yes', '文艺路27号', '货到付款', '160', '3');
INSERT INTO `snack_order` VALUES ('4', '20190327054415', '2019-03-27 05:44:15', 'yes', '兴华路99号', '货到付款', '135', '4');
INSERT INTO `snack_order` VALUES ('5', '20190327054457', '2019-03-27 05:44:57', 'yes', '兴工路65号', '货到付款', '112', '5');
INSERT INTO `snack_order` VALUES ('6', '20190328021827', '2019-03-28 02:18:27', 'yes', '中华路25号', '货到付款', '60', '2');
INSERT INTO `snack_order` VALUES ('7', '20190328022413', '2019-03-28 02:24:13', 'yes', '中华路25号', '货到付款', '145', '2');
INSERT INTO `snack_order` VALUES ('8', '20190328025614', '2019-03-28 02:56:14', 'no', '中华路25号', '货到付款', '44', '2');
INSERT INTO `snack_order` VALUES ('9', '20190227091023', '2019-02-27 09:10:23', 'yes', 'fzu', '货到付款', '15', '1');
INSERT INTO `snack_order` VALUES ('10', '20190228070951', '2019-02-28 07:09:51', 'no', 'fzu', '货到付款', '114', '1');
INSERT INTO `snack_order` VALUES ('11', '20190318023154', '2019-03-18 02:31:54', 'no', 'fzu', '货到付款', '414', '1');
INSERT INTO `snack_order` VALUES ('12', '201903262122199611', '2019-03-26 21:24:37', 'no', '胜利路99号', '建设银行', '4', '1');
INSERT INTO `snack_order` VALUES ('14', '201903262156058442', '2019-03-26 21:56:52', 'yes', '福州大学', '建设银行', '45', '7');
INSERT INTO `snack_order` VALUES ('15', '201904101230159402', '2019-04-10 12:31:30', 'yes', '胜利路99号', '建设银行', '58', '1');
INSERT INTO `snack_order` VALUES ('16', '201904101240447874', '2019-04-10 12:42:16', 'yes', '胜利路99号', '建设银行', '30', '1');
INSERT INTO `snack_order` VALUES ('17', '201904301034015135', '2019-04-30 10:34:13', 'no', '福州大学156', '工商银行', '324', '7');
INSERT INTO `snack_orderitem` VALUES ('1', '1', '1', '1');
INSERT INTO `snack_orderitem` VALUES ('2', '1', '6', '1');
INSERT INTO `snack_orderitem` VALUES ('3', '1', '11', '1');
INSERT INTO `snack_orderitem` VALUES ('4', '1', '15', '1');
INSERT INTO `snack_orderitem` VALUES ('5', '2', '4', '1');
INSERT INTO `snack_orderitem` VALUES ('6', '2', '11', '2');
INSERT INTO `snack_orderitem` VALUES ('7', '2', '13', '1');
INSERT INTO `snack_orderitem` VALUES ('8', '3', '3', '1');
INSERT INTO `snack_orderitem` VALUES ('9', '3', '5', '1');
INSERT INTO `snack_orderitem` VALUES ('10', '3', '9', '1');
INSERT INTO `snack_orderitem` VALUES ('11', '3', '15', '1');
INSERT INTO `snack_orderitem` VALUES ('12', '4', '8', '1');
INSERT INTO `snack_orderitem` VALUES ('13', '4', '9', '1');
INSERT INTO `snack_orderitem` VALUES ('14', '4', '14', '1');
INSERT INTO `snack_orderitem` VALUES ('15', '5', '3', '1');
INSERT INTO `snack_orderitem` VALUES ('16', '5', '7', '1');
INSERT INTO `snack_orderitem` VALUES ('17', '5', '10', '1');
INSERT INTO `snack_orderitem` VALUES ('18', '6', '7', '1');
INSERT INTO `snack_orderitem` VALUES ('19', '6', '11', '1');
INSERT INTO `snack_orderitem` VALUES ('20', '7', '3', '1');
INSERT INTO `snack_orderitem` VALUES ('21', '7', '12', '1');
INSERT INTO `snack_orderitem` VALUES ('22', '7', '14', '2');
INSERT INTO `snack_orderitem` VALUES ('23', '8', '11', '1');
INSERT INTO `snack_orderitem` VALUES ('24', '8', '12', '1');
INSERT INTO `snack_orderitem` VALUES ('25', '9', '11', '1');
INSERT INTO `snack_orderitem` VALUES ('26', '10', '3', '3');
INSERT INTO `snack_orderitem` VALUES ('27', '11', '21', '1');
INSERT INTO `snack_orderitem` VALUES ('28', '11', '8', '5');
INSERT INTO `snack_orderitem` VALUES ('29', '11', '11', '8');
INSERT INTO `snack_orderitem` VALUES ('30', '14', '5', '1');
INSERT INTO `snack_orderitem` VALUES ('31', '15', '1', '1');
INSERT INTO `snack_orderitem` VALUES ('32', '16', '22', '5');
INSERT INTO `snack_orderitem` VALUES ('33', '17', '13', '4');
INSERT INTO `snack_orderitem` VALUES ('34', '17', '2', '4');
INSERT INTO `snack_sales` VALUES ('1', '10', '1', '4');
INSERT INTO `snack_sales` VALUES ('2', '210', '2', '4');
INSERT INTO `snack_sales` VALUES ('3', '108', '3', '4');
INSERT INTO `snack_sales` VALUES ('4', '85', '4', '4');
INSERT INTO `snack_sales` VALUES ('5', '45', '5', '4');
INSERT INTO `snack_sales` VALUES ('6', '13', '6', '4');
INSERT INTO `snack_sales` VALUES ('7', '33', '0', '4');
INSERT INTO `snack_sales` VALUES ('8', '52', '0', '5');
INSERT INTO `snack_sales` VALUES ('9', '51', '1', '5');
INSERT INTO `snack_sales` VALUES ('10', '17', '2', '5');
INSERT INTO `snack_sales` VALUES ('11', '66', '3', '5');
INSERT INTO `snack_sales` VALUES ('12', '150', '4', '5');
INSERT INTO `snack_sales` VALUES ('13', '52', '5', '5');
INSERT INTO `snack_sales` VALUES ('20', '100', '6', '5');
INSERT INTO `snack_sales` VALUES ('21', '125', '0', '6');
INSERT INTO `snack_sales` VALUES ('22', '152', '1', '6');
INSERT INTO `snack_sales` VALUES ('23', '55', '2', '6');
INSERT INTO `snack_sales` VALUES ('24', '26', '3', '6');
INSERT INTO `snack_sales` VALUES ('25', '36', '4', '6');
INSERT INTO `snack_sales` VALUES ('26', '52', '5', '6');
INSERT INTO `snack_sales` VALUES ('27', '551', '6', '6');
INSERT INTO `snack_sales` VALUES ('28', '245', '0', '7');
INSERT INTO `snack_sales` VALUES ('29', '425', '1', '7');
INSERT INTO `snack_sales` VALUES ('30', '485', '2', '7');
INSERT INTO `snack_sales` VALUES ('31', '150', '3', '7');
INSERT INTO `snack_sales` VALUES ('32', '75', '4', '7');
INSERT INTO `snack_sales` VALUES ('33', '423', '5', '7');
INSERT INTO `snack_sales` VALUES ('34', '243', '6', '7');
INSERT INTO `snack_sales` VALUES ('35', '332', '0', '9');
INSERT INTO `snack_sales` VALUES ('36', '412', '1', '9');
INSERT INTO `snack_sales` VALUES ('37', '71', '2', '9');
INSERT INTO `snack_sales` VALUES ('38', '119', '3', '9');
INSERT INTO `snack_sales` VALUES ('39', '129', '4', '9');
INSERT INTO `snack_sales` VALUES ('40', '133', '5', '9');
INSERT INTO `snack_sales` VALUES ('41', '243', '6', '9');
INSERT INTO `snack_salesvolume` VALUES ('1', '120', '0', '9');
INSERT INTO `snack_salesvolume` VALUES ('2', '130', '1', '9');
INSERT INTO `snack_salesvolume` VALUES ('3', '75', '2', '9');
INSERT INTO `snack_salesvolume` VALUES ('4', '158', '3', '9');
INSERT INTO `snack_salesvolume` VALUES ('5', '129', '4', '9');
INSERT INTO `snack_salesvolume` VALUES ('6', '75', '5', '9');
INSERT INTO `snack_salesvolume` VALUES ('7', '77', '6', '9');
INSERT INTO `snack_salesvolume` VALUES ('8', '111', '0', '4');
INSERT INTO `snack_salesvolume` VALUES ('9', '120', '1', '4');
INSERT INTO `snack_salesvolume` VALUES ('10', '27', '2', '4');
INSERT INTO `snack_salesvolume` VALUES ('11', '44', '3', '4');
INSERT INTO `snack_salesvolume` VALUES ('12', '44', '4', '4');
INSERT INTO `snack_salesvolume` VALUES ('13', '77', '5', '4');
INSERT INTO `snack_salesvolume` VALUES ('14', '48', '6', '4');
INSERT INTO `snack_salesvolume` VALUES ('15', '87', '0', '5');
INSERT INTO `snack_salesvolume` VALUES ('16', '23', '1', '5');
INSERT INTO `snack_salesvolume` VALUES ('17', '87', '2', '5');
INSERT INTO `snack_salesvolume` VALUES ('18', '78', '3', '5');
INSERT INTO `snack_salesvolume` VALUES ('19', '44', '4', '5');
INSERT INTO `snack_salesvolume` VALUES ('20', '54', '5', '5');
INSERT INTO `snack_salesvolume` VALUES ('21', '25', '6', '5');
INSERT INTO `snack_salesvolume` VALUES ('22', '33', '0', '6');
INSERT INTO `snack_salesvolume` VALUES ('23', '78', '1', '6');
INSERT INTO `snack_salesvolume` VALUES ('24', '87', '2', '6');
INSERT INTO `snack_salesvolume` VALUES ('25', '42', '3', '6');
INSERT INTO `snack_salesvolume` VALUES ('26', '75', '4', '6');
INSERT INTO `snack_salesvolume` VALUES ('27', '66', '5', '6');
INSERT INTO `snack_salesvolume` VALUES ('28', '52', '6', '6');
INSERT INTO `snack_salesvolume` VALUES ('29', '57', '0', '7');
INSERT INTO `snack_salesvolume` VALUES ('30', '24', '1', '7');
INSERT INTO `snack_salesvolume` VALUES ('31', '92', '2', '7');
INSERT INTO `snack_salesvolume` VALUES ('32', '77', '3', '7');
INSERT INTO `snack_salesvolume` VALUES ('33', '93', '4', '7');
INSERT INTO `snack_salesvolume` VALUES ('34', '85', '5', '7');
INSERT INTO `snack_salesvolume` VALUES ('35', '36', '6', '7');
INSERT INTO `snack_threebanner` VALUES ('5', '测试', '/image/155257052458295c8a589ccbd08.jpg', '1552570525', 'yes', 'no');
INSERT INTO `snack_threebanner` VALUES ('6', 'test1', '/image/15538277298525c9d879169dee.jpg', '1553827730', 'no', 'no');
INSERT INTO `snack_twobanner` VALUES ('6', '测试', '/image/155257051052565c8a588e106fc.jpg', '1552570511', 'yes', 'no');
INSERT INTO `snack_twobanner` VALUES ('7', 'test1', '/image/155382770978345c9d877d5b378.jpg', '1553827711', 'no', 'no');
INSERT INTO `snack_user` VALUES ('1', 'liusan3', '123456', '0', '刘明', '胜利路99号', '男', '13555555555', '112554125', 'no', '0');
INSERT INTO `snack_user` VALUES ('2', 'lnyxb', '1234567', '0', '于小明', '中华路25号', '男', '13488854454', '3983928883', 'no', '0');
INSERT INTO `snack_user` VALUES ('3', 'zhangli', '123456', '0', '张丽', '文艺路28号', '女', '13544214458', '65221544', 'no', '0');
INSERT INTO `snack_user` VALUES ('4', 'zhouyue', '123456789', '0', '周月', '兴华路99号', '女', '13488541225', '452215478', 'no', '0');
INSERT INTO `snack_user` VALUES ('5', 'chenming', '123456', '0', '陈明', '兴工路65号', '男', '13422102155', '465132135', 'no', '0');
INSERT INTO `snack_user` VALUES ('6', 'xiaoxiao', 'xiaoxiao', '0', '小小', '北京市中关村24号', '女', '13131314455', '31314455', 'no', '0');
INSERT INTO `snack_user` VALUES ('7', 'sue', '123456', null, '小鹏', '福州大学156', '男', '15659171800', '384282888', 'no', '0');
INSERT INTO `snack_user` VALUES ('16', 'xiaoxiaopeng', 'swp...14', null, 'suefen', 'fzu', '男', '15565917760', '384052222', 'no', '0');
