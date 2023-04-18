/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:10086
 Source Schema         : law_manage

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 18/04/2023 12:15:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for law_admin
-- ----------------------------
DROP TABLE IF EXISTS `law_admin`;
CREATE TABLE `law_admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` int(2) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_admin
-- ----------------------------
INSERT INTO `law_admin` VALUES (1, 'admin', 'eyJpdiI6ImJsaDFpSnBcL2VGQVVVU0xXRUZXMHRRPT0iLCJ2YWx1ZSI6IlYyaWxFZ3RDdGg3d01kRzd6ZkpzcFE9PSIsIm1hYyI6ImZlYjI1NmZkYTNiMDNlZGJkZWQxMTJlOTEyMjQ5NDQxYWEwZjFiN2Q1MTU2MTI5NWU2NmM2ZTA4OTUyN2FjYWUifQ==', 1, 1);

-- ----------------------------
-- Table structure for law_customer
-- ----------------------------
DROP TABLE IF EXISTS `law_customer`;
CREATE TABLE `law_customer`  (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `header` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `lawyer` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_customer
-- ----------------------------
INSERT INTO `law_customer` VALUES (2, '王五', '10293827192', 1, '', '2023-04-17 16:17:38', '2023-04-17 16:17:38', '1111');
INSERT INTO `law_customer` VALUES (3, '张三', '19283729183', 1, '', '2023-04-17 02:55:27', '2023-04-17 14:17:05', '李芹');
INSERT INTO `law_customer` VALUES (1, '柯南', '18381117111', 1, '', '2023-04-17 02:54:42', '2023-04-17 14:45:20', '李芹');

-- ----------------------------
-- Table structure for law_lawyer
-- ----------------------------
DROP TABLE IF EXISTS `law_lawyer`;
CREATE TABLE `law_lawyer`  (
  `lawyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `lawyer_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lawyer_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duty` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `education` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `organization` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `perintroduction` varchar(800) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `perimgpath` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `connectlink` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `show_status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`lawyer_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_lawyer
-- ----------------------------
INSERT INTO `law_lawyer` VALUES (1, '吴越', '13888888888', '专职律师', '西南政法大学经济学硕士，国家公派留学生，德国法兰克福大学法学博土', '法研专家', '曾任西南政法大学教授，博士生导师。西南财经大学法学院教授、博士生导师，西南财经大学公司法治研究中心主任，商法学科带头人，四川省有突出贡献专家，兼任中国商法学会常务理事，四川省商法学研究会副会长，四川省环境与资源法学研究会荣誉会长;中国国际经济贸易仲裁委员会仲裁员，成都仲裁委仲裁员。2020年被授予第二届“四川省十大中青年法学专家”荣誉称号。', 'lawyerImage/wuyue.jpg', NULL, '2023-04-17 14:56:15', '2023-04-18 09:53:35', 1, 1);
INSERT INTO `law_lawyer` VALUES (2, '龙宗智', '13999999999', '专职律师', '法学院教授、法学博士、博士生导师', '法研专家', '现任四川大学法学院教授、博士生导师，法学研究所所长。任西南政法大学、西南财大博导师、曾任西南政法大学校长。早年曾任大军区检察院大校副检察长、现系中国刑事诉讼法学研究会、检察学研究会、廉政法制研究会等学会副会长、最高人民检察院特邀专家咨询员\r\n、国家社会科学基金项目法学学科评审组成员。', 'lawyerImage/long.jpg', NULL, '2023-04-17 15:53:25', '2023-04-18 09:53:43', 0, 1);
INSERT INTO `law_lawyer` VALUES (3, '张丽', '13777777777', '专职律师', '法学博士后、副教授   ', '不良资产处置专业委员会,企业法律顾问专业委员会,刑民交叉案专业委员会', '于1998年至2013年先后于西南财经大学、西南政法大学攻读法学学士、硕士、博士学位及从事博士后研究；2006年至今先后在泰和泰律师事务所、毫达律师事务所执业。张丽律师在律师执业中，作为团队首席律师先后办理千余件诉讼与非诉案件，主要涉及重大商事诉讼、公司经营风险控制、重大投融资项目、公司并购重组、企业治理结构设计、婚姻财富风险防控、家族企业传承规划、企业家刑事法律风险防范等专业领域。\r\n张丽律师在《光明日报》、《中国法学》（英文版）、《北京大学学报》等核心期刊发表论著数十篇；同时，张丽律师受邀担任政府机关、大型国有企业、银行、集团公司、大型民营企业等数十家机关及企业的法律顾问及代理律师。\r\n张丽律师代理的某重大案件入选最高人民法院指导性案件。针对重大疑难及社会热点案件，张丽律师曾多次接受四川电视台、成都商报等新闻媒体采访并发表专家意见。张丽律师具有深厚的法学理论功底和实务经验，深受客户信任。\r\n获得荣誉：四川省律协评认的建设工程与房地产专业律师、四川省人民政府行政复议委员会委员、四川省律师协会金融证劵专业委员会委员、主持主研多项国家省部级课题、代理某重大案件入选最高人民法院2017年推动中国法治进程十大案件及最高人民法院指导性案例', 'lawyerImage/zhangli.jpg', NULL, '2023-04-17 16:30:42', '2023-04-17 16:30:42', 1, 1);
INSERT INTO `law_lawyer` VALUES (9, '1111', '11111111111', '11111', NULL, NULL, NULL, NULL, NULL, '2023-04-18 11:07:56', '2023-04-18 11:07:56', 1, 1);

-- ----------------------------
-- Table structure for law_permission
-- ----------------------------
DROP TABLE IF EXISTS `law_permission`;
CREATE TABLE `law_permission`  (
  `id` int(2) NOT NULL,
  `per_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `per_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_permission
-- ----------------------------

-- ----------------------------
-- Table structure for law_role
-- ----------------------------
DROP TABLE IF EXISTS `law_role`;
CREATE TABLE `law_role`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `describe` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_role
-- ----------------------------
INSERT INTO `law_role` VALUES (1, '超级管理员', '拥有至高无上的权限', 1);

-- ----------------------------
-- Table structure for law_unit
-- ----------------------------
DROP TABLE IF EXISTS `law_unit`;
CREATE TABLE `law_unit`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_unit
-- ----------------------------
INSERT INTO `law_unit` VALUES (1, '四川人民政府', '2023-04-17 16:40:40', '2023-04-17 16:40:43', 1);

SET FOREIGN_KEY_CHECKS = 1;
