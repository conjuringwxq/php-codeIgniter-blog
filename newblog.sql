/*
Navicat MySQL Data Transfer

Source Server         : laoshan
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : newblog

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2018-05-18 12:17:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_blogs`
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
INSERT INTO `t_blogs` VALUES ('1', '1', '1', '《生命中最简单又最困难的事》', '我病了，一段相当长的时日。 \r\n　　恍惚之间，常看见他，背着简单的行囊，像临别那日，站在门边，帽檐下的眼睛，落寞而热烈，说，我来求和的。 \r\n　　我坚决地摇头。他必须在两种爱情里，选择。我，或是海洋。 \r\n　　站在光亮里，他说：等我这一次，以后，再不走了。 \r\n　　然而，海洋是狂野善妒的情人，不肯放他回来。 \r\n　　我渐渐康复，在夏日的阳光里，把洗涤好的衣物晾挂起来。突然，有声音自远方传来。 \r\n　　是他，蛮横而温柔，遣海上的风，来问候，来拥抱，来缠绵。 \r\n两条小鱼在水里游泳，突然碰到一条从对面游来的老鱼向他们点头问好：\r\n\r\n“早啊，小伙子们。水里怎样？”\r\n\r\n小鱼继续往前游了一会儿，其中一条终于忍不住了，他望着另一条，问道：\r\n\r\n“水是个什么玩意？”\r\n\r\n这是美国作家大卫•福斯特•华莱士2005年在肯扬学院毕业典礼上的演讲，从生活中最显而易见的平常之事入手，讨论如何摆脱生命中的重复单调，获得内心自由，保持意识的清醒鲜活。华莱士提醒我们，日常生活就是我们本身，既绝望又禅意，而要“在繁琐无聊的日常中，日复一日地保持自觉与警醒，困难得不可想象”。\r\n\r\n这场演讲当时默默无闻，之后却突然逆袭，演讲录音通过邮件和博客在朋友圈不断流转，引发广泛共鸣，后有工作室根据录音制作了短视频，在Youtube上，一周就超过400人点阅。图书出版之后受到更大的关注，被《时代杂志》认为是“对知识分子最后的演讲”，并与乔布斯的演讲一起入选“美国最具影响力的十大毕业演讲”。\r\n\r\n遗憾的是，这位天才的作家却在3年后因严重的抑郁症自杀，这也让这篇演讲更加震撼：生活不会总是一帆风顺，我们要学会提醒自己走出思维定势的泥沼；给你身边的人多点空间——因为你不知道他们正面对怎样的困苦。', '2014-12-26 10:20:45', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('2', '2', '2', '《罗马荣耀》', '起风时，我常常不说话。 \r\n　　在风中说话，话语被割裂，不能完整清晰地传达。 \r\n　　人群中，我往往是安静的。 \r\n　　人们愈来愈难互相了解，尤其在经历世态人情之后，发现即使是最简单的问候，也有言不由衷的。 \r\n血腥和肉欲，这是暗藏于每一个人心底最原始的渴望； 权术和阴谋，这是亘古不变每一个时代政治最基本的特征。 BC190，罗马共和国崛起时期。此时的历史舞台，被罗马三大家族，北方的诸多蛮族，马背上的游牧民族，众多亚历山大大帝的继业者王国，泛希腊系还有东方派系占据。 一个历史系宅男，此时穿越古代罗马， 他被卖做奴隶，他也曾在角斗场里搏杀求生； 他是执政官之子，他也是共和国元老院最大的敌人； 他的武技源于神殿，他也曾被高卢剑圣调教； 面临着死亡的威胁，背负着家族的血仇和复兴， 塞古都斯.茱莉亚.马尔斯，为了传播属于自己的罗马荣耀，看他能走多远！ ', '2014-12-26 10:22:30', '0', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('4', '3', '1', '水龙吟·小沟东接长江', '小沟东接长江，柳堤苇岸连云际。烟村潇洒，人闲一哄，渔樵早市。永昼端居，寸阴虚度，了成何事。但丝莼玉藕，珠粳锦鲤，相留恋，又经岁。\r\n因念浮丘旧侣，惯瑶池、羽觞沈醉。青鸾歌舞，铢衣摇曳，壶中天地。飘堕人间，步虚声断，露寒风细。抱素琴，独向银蟾影里，此怀难寄。', '2015-01-13 13:56:32', '1', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('5', '2', '2', '《百年孤独》', '作品描写了布恩迪亚家族七代人的传奇故事，以及加勒比海沿岸小镇马孔多的百年兴衰，反映了拉丁美洲一个世纪以来风云变幻的历史。作品融入神话传说、民间故事、宗教典故等神秘因素，巧妙地糅合了现实与虚幻，展现出一个瑰丽的想象世界，成为20世纪重要的经典文学巨著之一', '2015-01-01 13:57:45', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('7', '4', '1', '《利息理论》', '《利息理论》一书是美国著名经济学家欧文·费雪（1867—1947）的代表作之一。该书共有四篇，第一篇简要概述了资本和收入的性质问题，第二篇主要用文字来表述利息理论，第三篇中借助数学手段来解释利息理论，第四篇综合论述了利息在经济学中的地位、利息率与发现和发明的关系、利息与货币和物价的关系等等问题。在书中，费雪围绕“人性不耐”与“投资机会”两个方面展开分析和论述，他认为，人性不耐与投资机会是决定利息的两个基本因素，它们是两种相反的力量，在它们的作用下，利率最终趋向于平衡的一点。该书逻辑严谨，表述清晰易懂，是研究利息和货币问题的必读书目。', '2015-01-01 20:47:13', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('8', '2', '2', '《我的大学》', '《我的大学》描写阿廖沙在喀山时期的活动与成长经历。阿廖沙16岁抱着上大学的愿望来到喀山，但理想无法实现，喀山的贫民窟与码头成了他的社会大学。阿廖沙无处栖身，与他人共用一张床板。在码头、面包房、杂货店到处打工。后来，因接触大、中学生、秘密团体的成员及西伯利亚流放回来的革命者，思想发生变化。阿廖沙阅读革命民主主义和马克思主义著作，直至参加革命活动。在革命者的引导之下，摆脱了自杀的精神危机。', '2014-12-17 12:30:08', '1', '转帖', '0');
INSERT INTO `t_blogs` VALUES ('9', '6', '2', '郊行即事', '芳原绿野恣行事，春入遥山碧四围。\r\n兴逐乱红穿柳巷，困临流水坐苔矶。\r\n莫辞盏酒十分劝，只恐风花一片飞。\r\n况是清明好天气，不妨游衍莫忘归。', '2014-11-19 12:31:09', '1', '原创', '0');
INSERT INTO `t_blogs` VALUES ('22', '9', '1', '《汉字王国》', ' 为了让读者真正了解汉字的源起与演变，以及汉字背后的文化精髓，本书以《说文解字》为依托与出发点，精选了数百个现代生活中常见常用的汉字，为每个汉字都配上精美插图与详尽而全面的解读，立足于汉字本身的含义与演变。', '2015-01-06 05:33:57', '1', '转贴', '1');
INSERT INTO `t_blogs` VALUES ('41', '2', '2', '《遮天》', '仙路尽头谁为峰？ 一见无始道成空！一个浩大的仙侠世界，光怪陆离，神秘无尽。热血似火山沸腾，激情若瀚海汹涌，欲望如深渊无止境。登天路，踏歌行，弹指遮天！\r\n\r\n最宝贵的东西不是你拥有的物质，而是陪伴在你身边的人。不能强迫别人来爱自己，只能努力让自己成为值得爱的人，其余的事情则靠缘分。', '2015-01-08 07:18:40', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('49', '2', '2', '《一念永恒》', '一念成沧海，一念化桑田。一念斩千魔，一念诛万仙。\r\n唯我念……永恒\r\n这是耳根继《天逆》《仙逆》《求魔》《我欲封天》后，创作的第五部长篇小说《一念永恒》', '2015-01-09 06:00:19', '0', '原创', '0');
INSERT INTO `t_blogs` VALUES ('50', '2', '2', '《凤囚凰》', '《凤囚凰》，天衣有风所著小说，分上中下三册，再版多次。\r\n\r\n天衣有风，言情小说作家，最爱古龙，佩服金庸。著有《谈笑江湖》，《凤囚凰》，《龙龙龙》，《淑女飘飘拳》等作品。慕魏晋之风度，念旧时之古意，伴文字之刀光剑影，赏书卷之风起云生。生于南，读于北，曾见一路山川平原，波涛霜雪，讷于言，斯文跳脱，百般面貌藏于笔端。', '2015-01-09 06:00:27', '0', '原创', '0');

-- ----------------------------
-- Table structure for `t_blog_catalogs`
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
INSERT INTO `t_blog_catalogs` VALUES ('4', '经济', '1', '1');
INSERT INTO `t_blog_catalogs` VALUES ('5', '散文', '3', '1');
INSERT INTO `t_blog_catalogs` VALUES ('6', '诗', '2', '1');
INSERT INTO `t_blog_catalogs` VALUES ('7', '诗', '3', '1');
INSERT INTO `t_blog_catalogs` VALUES ('9', '语言类', '1', '1');
INSERT INTO `t_blog_catalogs` VALUES ('10', '心理学', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('11', '社会学', '3', '0');
INSERT INTO `t_blog_catalogs` VALUES ('12', '哲学', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('13', '语言类', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('14', '历史', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('15', '地理', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('16', '金融', '2', '0');
INSERT INTO `t_blog_catalogs` VALUES ('21', '医学', '2', '0');

-- ----------------------------
-- Table structure for `t_comments`
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
INSERT INTO `t_comments` VALUES ('1', '2', '1', '这部作品真不错', '2014-12-01 10:46:46');
INSERT INTO `t_comments` VALUES ('2', '3', '2', '值得观看', '2014-12-17 03:33:11');
INSERT INTO `t_comments` VALUES ('4', '4', '1', '我想要把它收藏下来了', '2015-01-15 11:43:59');
INSERT INTO `t_comments` VALUES ('7', '1', '5', '我为它点赞', '2015-01-07 11:44:26');
INSERT INTO `t_comments` VALUES ('8', '3', '5', '这本书不错', '2015-01-07 11:45:11');
INSERT INTO `t_comments` VALUES ('9', '4', '8', '纪念伟大的作家高尔基，这部作品很经典', '2015-01-07 11:45:26');
INSERT INTO `t_comments` VALUES ('17', '1', '9', '收藏了', '2015-01-07 17:12:39');

-- ----------------------------
-- Table structure for `t_messages`
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
INSERT INTO `t_messages` VALUES ('1', null, '1', '2', '希望可以关注它', '2015-01-07 22:50:54');
INSERT INTO `t_messages` VALUES ('2', null, '1', '3', '博主的帖子真的不错', '2014-11-17 12:53:01');
INSERT INTO `t_messages` VALUES ('3', null, '1', '4', '我想要最新的一些帖子', '2015-02-21 10:53:40');
INSERT INTO `t_messages` VALUES ('4', null, '2', '1', '请关注我的博客', '2014-08-18 22:03:01');
INSERT INTO `t_messages` VALUES ('5', null, '2', '1', '真不错', '2015-03-31 22:55:11');
INSERT INTO `t_messages` VALUES ('6', null, '2', '6', '为你点赞', '2007-01-30 01:01:01');
INSERT INTO `t_messages` VALUES ('7', null, '3', '3', '博主有群么', '2015-01-30 09:57:30');
INSERT INTO `t_messages` VALUES ('8', null, '3', '1', '博主帖子质量真好', '2015-01-16 22:58:06');
INSERT INTO `t_messages` VALUES ('9', null, '4', '2', '真的值得观看', '2014-12-23 22:59:49');
INSERT INTO `t_messages` VALUES ('10', null, '5', '3', '有邮箱吗', '2015-05-27 23:00:39');
INSERT INTO `t_messages` VALUES ('15', null, '2', '5', '真的很棒', '2015-01-05 11:21:29');
INSERT INTO `t_messages` VALUES ('16', null, '2', '6', '我会一直关注你的', '2014-12-25 11:21:46');
INSERT INTO `t_messages` VALUES ('18', null, '5', '2', '希望你能一直的努力下去', '2015-01-22 11:22:26');
INSERT INTO `t_messages` VALUES ('19', null, '2', '1', '我真的喜欢你的帖子', '2015-01-08 10:45:37');

-- ----------------------------
-- Table structure for `t_users`
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
INSERT INTO `t_users` VALUES ('1', 'aa', 'aa', '王宣棋', '1', '2018-01-01', '黑龙江', '哈尔滨', '最真实的就是本心', 'aa.jpg', 'ui');
INSERT INTO `t_users` VALUES ('2', 'bb', 'bb', '张三', '1', '2000-09-08', '安徽', '伊春', '你是爱，是暖，是希望，你是人间四月天。\r\n', 'bb.jpg', 'aaaa');
INSERT INTO `t_users` VALUES ('3', 'cc', 'cc', '李四', '2', '2001-12-12', '广州', '广东', '我和我最后的倔强。', 'cc.jpg', 'bad');
INSERT INTO `t_users` VALUES ('4', 'zz', 'zz', '王五', '1', '2009-03-03', '北京', '海淀区', '晚风吻尽荷花叶，让我醉倒在池边。', 'zz.jpg', 'happy');
INSERT INTO `t_users` VALUES ('5', 'mm', 'mm', '刘六', '2', '2012-03-23', '福建', '', '会不会有一天，时间真的能倒退，退回你的我的回不去的悠悠的岁月。', 'mm.jpg', 'crazy');
INSERT INTO `t_users` VALUES ('6', 'kk', 'kk', '孙七', '1', '2008-08-08', '河南', '信阳', '也许会有一天时间终于有终点，也能一起品尝回忆酿的甜，和你在干一杯。', 'kk.jpg', 'just soso');
