/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-01-19 16:54:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_blogs
-- ----------------------------
DROP TABLE IF EXISTS `t_blogs`;
CREATE TABLE `t_blogs` (
  `BLOG_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `CATALOG_ID` int(11) DEFAULT NULL COMMENT '所属分类',
  `WRITER` int(11) DEFAULT NULL COMMENT '作者',
  `TITLE` varchar(100) DEFAULT NULL COMMENT '标题',
  `CONTENT` text COMMENT '内容',
  `ADD_TIME` datetime DEFAULT NULL COMMENT '添加时间',
  `CLICK_RATE` int(11) DEFAULT NULL COMMENT '点击率',
  `IS_YOURS` varchar(20) DEFAULT NULL,
  `COMM_RATE` int(11) DEFAULT NULL,
  PRIMARY KEY (`BLOG_ID`),
  KEY `FK_CATALOGS_BLOGS` (`CATALOG_ID`),
  KEY `FK_USERS_BLOGS` (`WRITER`),
  CONSTRAINT `FK_CATALOGS_BLOGS` FOREIGN KEY (`CATALOG_ID`) REFERENCES `t_blog_catalogs` (`CATALOG_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_USERS_BLOGS` FOREIGN KEY (`WRITER`) REFERENCES `t_users` (`USER_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_blogs
-- ----------------------------
INSERT INTO `t_blogs` VALUES ('1', '1', '1', '啊啊', '我病了，一段相当长的时日。 \r\n　　恍惚之间，常看见他，背着简单的行囊，像临别那日，站在门边，帽檐下的眼睛，落寞而热烈，说，我来求和的。 \r\n　　我坚决地摇头。他必须在两种爱情里，选择。我，或是海洋。 \r\n　　站在光亮里，他说：等我这一次，以后，再不走了。 \r\n　　然而，海洋是狂野善妒的情人，不肯放他回来。 \r\n　　我渐渐康复，在夏日的阳光里，把洗涤好的衣物晾挂起来。突然，有声音自远方传来。 \r\n　　是他，蛮横而温柔，遣海上的风，来问候，来拥抱，来缠绵。 \r\n　　海，舍不下他。他，舍不下我。', '2014-12-26 10:20:45', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('2', '2', '2', '拜拜', '起风时，我常常不说话。 \r\n　　在风中说话，话语被割裂，不能完整清晰地传达。 \r\n　　人群中，我往往是安静的。 \r\n　　人们愈来愈难互相了解，尤其在经历世态人情之后，发现即使是最简单的问候，也有言不由衷的。 \r\n　　谁能教导我，用最明确的字句，表达对人世最诚挚的善意？谁能了解我，用最纯净的心情，感激这轮回四季无私的给予？在风停止以前，我的选择，仍然是沉默。', '2014-12-26 10:22:30', '0', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('4', '3', '1', '落在海洋里的一滴水，会在海岸边掀起一条白浪。', '就像绚烂的樱花在柔软的风中依然会飘逝，最好的花土也养不活勿忘我这样野草般的生命，任何有生命的个体都是脆弱而短暂，我对蕾拉的悲惨个运深表遗憾。\r\n与自然界的美景依依惜别后，我迈着异常沉重的步伐走进教室。\r\n我来到自己的座位上，拉开抽屉，却不想一个粉红色的信封飘落手中。\r\n原来一切都是有预兆的。', '2015-01-13 13:56:32', '1', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('5', '2', '2', '雏鸟在窝里瑟瑟发抖，它期盼着春天能带来更多温暖', '蕾拉也是一个挺特别的女孩儿。每次约会她都打扮得漂漂亮亮的出门，脸上画着精致的淡妆，脚上穿着漂亮的凉鞋。如果不是天气热偶尔会把帽子摘下来擦那颗光头上的汗，我几乎都忘了她是一个生命不超过三个月的绝症少女。\r\n再说了，她哪点像绝症少女啊！\r\n一起去看悲情电影，我在旁边都忍不住抽泣了，她还在大嚼着爆米花肆意批评导演拍得太假。\r\n一起去吃大餐的时候，她总是毫无节约意识地点一大桌子的菜，吃得比谁都欢呼雀跃。\r\n一起去游乐园的时候，她本着宁可错杀一千不可放过一个的精神，执拗和每一个好玩的项目合影，就差在柱子上刻下“蕾拉到此一游”。', '2015-01-01 13:57:45', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('6', '7', '3', '萤火虫的光芒，也可以照亮夜空', '只是当蕾拉出现在转角楼梯处的时候，我竟然发现自己的身子微微颤抖着，手心里还捏了一把汗。\r\n今天她终于掩住了那标志性的光头，取而代之地是一头金棕色的卷曲长发。她的皮肤在灯光下泛起白瓷般细密紧致的光芒，她的嘴唇像果冻一样水灵灵充满光泽感。她穿着一袭只有在电视里才能看到的白色纱裙，右耳上依然挂着一条羽毛……今天的蕾拉像穿上了水晶鞋的灰姑娘，而我却像傻愣愣的车夫，只等把她送上南瓜车就算。', '2015-01-02 13:59:08', '1', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('7', '4', '1', '类', '类', '2015-01-01 20:47:13', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('8', '2', '2', '啊呀呀', '乒乒乓乓', '2014-12-17 12:30:08', '1', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('9', '6', '2', '四大', '啊身份而非vt', '2014-11-19 12:31:09', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('22', '9', '1', 'nununun', 'llhlhlhlhl', '2015-01-06 05:33:57', '1', '转贴', '1');
INSERT INTO `t_blogs` VALUES ('23', '1', '1', 'aa的博文', '写不出来', '2015-01-06 05:36:30', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('41', '2', '2', '3444', '3444', '2015-01-08 07:18:40', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('49', '2', '2', '11', '11', '2015-01-09 06:00:19', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('50', '2', '2', 'll', 'll', '2015-01-09 06:00:27', '0', '原创', '0');

-- ----------------------------
-- Table structure for t_blog_catalogs
-- ----------------------------
DROP TABLE IF EXISTS `t_blog_catalogs`;
CREATE TABLE `t_blog_catalogs` (
  `CATALOG_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `NAME` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `USER_ID` int(11) DEFAULT NULL,
  `BLOG_COUNT` int(11) DEFAULT '0',
  PRIMARY KEY (`CATALOG_ID`),
  KEY `FK_users_catalogs` (`USER_ID`),
  CONSTRAINT `FK_users_catalogs` FOREIGN KEY (`USER_ID`) REFERENCES `t_users` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_blog_catalogs
-- ----------------------------
INSERT INTO `t_blog_catalogs` VALUES ('1', '散文', '1', '2');
INSERT INTO `t_blog_catalogs` VALUES ('2', '小说', '2', '11');
INSERT INTO `t_blog_catalogs` VALUES ('3', '诗', '1', '1');
INSERT INTO `t_blog_catalogs` VALUES ('4', '另类', '1', '1');
INSERT INTO `t_blog_catalogs` VALUES ('5', '散文', '3', '1');
INSERT INTO `t_blog_catalogs` VALUES ('6', '诗', '2', '1');
INSERT INTO `t_blog_catalogs` VALUES ('7', '诗', '3', '1');
INSERT INTO `t_blog_catalogs` VALUES ('9', '未分类', '1', '1');
INSERT INTO `t_blog_catalogs` VALUES ('10', '未分类', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('11', '未分类', '3', '0');
INSERT INTO `t_blog_catalogs` VALUES ('12', '其他1234567', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('13', '其他2', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('14', '其他3', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('15', '其他4', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('16', '未知数', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('21', '太辛苦了', '2', '0');

-- ----------------------------
-- Table structure for t_comments
-- ----------------------------
DROP TABLE IF EXISTS `t_comments`;
CREATE TABLE `t_comments` (
  `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `COMMENTATOR` int(11) DEFAULT NULL COMMENT '评论人',
  `BLOG_ID` int(11) DEFAULT NULL COMMENT '评论博客',
  `CONTENT` text COMMENT '评论内容',
  `ADD_TIME` datetime DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`COMMENT_ID`),
  KEY `FK_BLOGS_COMMENTS` (`BLOG_ID`),
  KEY `FK_USERS_COMMENTS` (`COMMENTATOR`),
  CONSTRAINT `FK_BLOGS_COMMENTS` FOREIGN KEY (`BLOG_ID`) REFERENCES `t_blogs` (`BLOG_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_USERS_COMMENTS` FOREIGN KEY (`COMMENTATOR`) REFERENCES `t_users` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_comments
-- ----------------------------
INSERT INTO `t_comments` VALUES ('1', '2', '1', '阿偶', '2014-12-01 10:46:46');
INSERT INTO `t_comments` VALUES ('2', '3', '2', '嘻嘻', '2014-12-17 03:33:11');
INSERT INTO `t_comments` VALUES ('4', '4', '1', '布鲁比例', '2015-01-15 11:43:59');
INSERT INTO `t_comments` VALUES ('7', '1', '5', '撒的发放', '2015-01-07 11:44:26');
INSERT INTO `t_comments` VALUES ('8', '3', '5', 'QQ群', '2015-01-07 11:45:11');
INSERT INTO `t_comments` VALUES ('9', '4', '8', '哇哇哇哇', '2015-01-07 11:45:26');
INSERT INTO `t_comments` VALUES ('16', '1', '9', '四大\r\n讨厌', '2015-01-08 00:12:20');
INSERT INTO `t_comments` VALUES ('17', '1', '9', '快点成功吧', '2015-01-07 17:12:39');

-- ----------------------------
-- Table structure for t_messages
-- ----------------------------
DROP TABLE IF EXISTS `t_messages`;
CREATE TABLE `t_messages` (
  `MSG_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `REPLY_ID` int(11) DEFAULT NULL COMMENT '回复编号',
  `SENDER` int(11) DEFAULT NULL COMMENT '留言人',
  `RECEIVER` int(11) DEFAULT NULL COMMENT '留言对象',
  `CONTENT` text COMMENT '留言内容',
  `ADD_TIME` datetime DEFAULT NULL COMMENT '留言时间',
  PRIMARY KEY (`MSG_ID`),
  KEY `FK_MESSAGES_REPLY` (`REPLY_ID`),
  KEY `FK_USERS_RECEIVE_MESSAGES` (`RECEIVER`),
  KEY `FK_USERS_SEND_MESSAGES` (`SENDER`),
  CONSTRAINT `FK_MESSAGES_REPLY` FOREIGN KEY (`REPLY_ID`) REFERENCES `t_messages` (`MSG_ID`),
  CONSTRAINT `FK_USERS_RECEIVE_MESSAGES` FOREIGN KEY (`RECEIVER`) REFERENCES `t_users` (`USER_ID`) ON DELETE CASCADE,
  CONSTRAINT `FK_USERS_SEND_MESSAGES` FOREIGN KEY (`SENDER`) REFERENCES `t_users` (`USER_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_messages
-- ----------------------------
INSERT INTO `t_messages` VALUES ('1', null, '1', '2', '卡哇伊思密达', '2015-01-07 22:50:54');
INSERT INTO `t_messages` VALUES ('2', null, '1', '3', '你才卡哇伊思密达', '2014-11-17 12:53:01');
INSERT INTO `t_messages` VALUES ('3', null, '1', '4', '哇呀呀呀', '2015-02-21 10:53:40');
INSERT INTO `t_messages` VALUES ('4', null, '2', '1', '无嘎嘎 诶丫丫', '2014-08-18 22:03:01');
INSERT INTO `t_messages` VALUES ('5', null, '2', '1', '去吧比卡丘', '2015-03-31 22:55:11');
INSERT INTO `t_messages` VALUES ('6', null, '2', '6', '回来吧，小火龙', '2007-01-30 01:01:01');
INSERT INTO `t_messages` VALUES ('7', null, '3', '3', '苹果香蕉大鸭梨', '2015-01-30 09:57:30');
INSERT INTO `t_messages` VALUES ('8', null, '3', '1', '彩电冰箱洗衣机', '2015-01-16 22:58:06');
INSERT INTO `t_messages` VALUES ('9', null, '4', '2', '巴拉拉小魔仙', '2014-12-23 22:59:49');
INSERT INTO `t_messages` VALUES ('10', null, '5', '3', '吃葡萄不吐葡萄皮', '2015-05-27 23:00:39');
INSERT INTO `t_messages` VALUES ('15', null, '2', '5', '111', '2015-01-05 11:21:29');
INSERT INTO `t_messages` VALUES ('16', null, '2', '6', '222', '2014-12-25 11:21:46');
INSERT INTO `t_messages` VALUES ('18', null, '5', '2', '444', '2015-01-22 11:22:26');
INSERT INTO `t_messages` VALUES ('19', null, '2', '1', 'bb 给aa 发了留言啦啦啦啦', '2015-01-08 10:45:37');

-- ----------------------------
-- Table structure for t_users
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `ACCOUNT` varchar(50) DEFAULT NULL COMMENT '登录帐号',
  `PASSWORD` varchar(20) DEFAULT NULL COMMENT '登录密码',
  `NAME` varchar(50) DEFAULT NULL COMMENT '姓名',
  `GENDER` varchar(2) NOT NULL COMMENT '性别',
  `BIRTHDAY` varchar(20) DEFAULT NULL COMMENT '生日',
  `PROVINCE` varchar(20) DEFAULT NULL COMMENT '居住地区',
  `CITY` varchar(20) DEFAULT NULL COMMENT '居住城市',
  `SIGNATURE` varchar(200) DEFAULT NULL COMMENT '个性签名',
  `IMG` varchar(100) DEFAULT NULL COMMENT '个人头像',
  `MOOD` varchar(100) DEFAULT NULL COMMENT '我的心情',
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_users
-- ----------------------------
INSERT INTO `t_users` VALUES ('1', 'aa', 'aa', 'aa', '1', '2001-01-01', '江苏', '大兴安岭', '你是我心中优雅的秋风', 'aa.jpg', 'nice');
INSERT INTO `t_users` VALUES ('2', 'bb', 'bb', 'bb', '1', '2000-09-08', '安徽', '伊春', '你是爱，是暖，是希望，你是人间四月天。\r\n', 'bb.jpg', 'aaaa');
INSERT INTO `t_users` VALUES ('3', 'cc', 'cc', 'cc', '2', '2001-12-12', '广州', 'cc', '我和我最后的倔强。', 'cc.jpg', 'bad');
INSERT INTO `t_users` VALUES ('4', 'zz', 'zz', 'zz', '1', '2009-03-03', '北京', 'zz', '晚风吻尽荷花叶，让我醉倒在池边。', 'zz.jpg', 'happy');
INSERT INTO `t_users` VALUES ('5', 'mm', 'mm', 'mm', '2', '2012-03-23', '福建', 'mm', '会不会有一天，时间真的能倒退，退回你的我的回不去的悠悠的岁月。', 'mm.jpg', 'crazy');
INSERT INTO `t_users` VALUES ('6', 'kk', 'kk', 'kk', '1', '2008-08-08', '河南', 'kk', '也许会有一天时间终于有终点，也能一起品尝回忆酿的甜，和你在干一杯。', 'kk.jpg', 'just soso');
