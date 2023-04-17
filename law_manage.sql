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

 Date: 17/04/2023 17:23:17
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
INSERT INTO `law_admin` VALUES (1, 'admin', 'eyJpdiI6Ino1anFmWnZJT3U3cFExY0lJSUFaY3c9PSIsInZhbHVlIjoiZ2JGdGtcL1Jna1IxQ1pScFwvOW5aek1RPT0iLCJtYWMiOiI2ZjY3ZDkzN2NmN2QxOWU2ZjUyNDc4YTY2YmYyZjBiNDZkMjRmZDVlNTEzNjljZGJjOTdkOTAwM2YyZGRkYzc5In0=', 1, 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_customer
-- ----------------------------
INSERT INTO `law_customer` VALUES (12, '王五', '10293827192', 1, '', '2023-04-17 16:17:38', '2023-04-17 16:17:38', '1111');
INSERT INTO `law_customer` VALUES (11, '张三', '19283729183', 1, '', '2023-04-17 02:55:27', '2023-04-17 14:17:05', '李芹');
INSERT INTO `law_customer` VALUES (1, '柯南', '18382117550', 1, '', '2023-04-17 02:54:42', '2023-04-17 14:45:20', '李芹');

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
  PRIMARY KEY (`lawyer_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_lawyer
-- ----------------------------
INSERT INTO `law_lawyer` VALUES (1, '吴越', '13888888888', '专职律师', '西南政法大学经济学硕士，国家公派留学生，德国法兰克福大学法学博土', '法研专家', '曾任西南政法大学教授，博士生导师。西南财经大学法学院教授、博士生导师，西南财经大学公司法治研究中心主任，商法学科带头人，四川省有突出贡献专家，兼任中国商法学会常务理事，四川省商法学研究会副会长，四川省环境与资源法学研究会荣誉会长;中国国际经济贸易仲裁委员会仲裁员，成都仲裁委仲裁员。2020年被授予第二届“四川省十大中青年法学专家”荣誉称号。', NULL, NULL, '2023-04-17 14:56:15', '2023-04-17 16:37:01', 1);
INSERT INTO `law_lawyer` VALUES (2, '龙宗智', '13999999999', '专职律师', NULL, NULL, NULL, NULL, NULL, '2023-04-17 15:53:25', '2023-04-17 15:53:25', 1);
INSERT INTO `law_lawyer` VALUES (3, '张丽', '13777777777', '专职律师', NULL, NULL, NULL, NULL, NULL, '2023-04-17 16:30:42', '2023-04-17 16:30:42', 1);

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
