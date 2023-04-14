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

 Date: 14/04/2023 17:27:59
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
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_customer
-- ----------------------------
INSERT INTO `law_customer` VALUES (1, '柯南', '13234007245', 1, '', NULL, NULL, '李芹');
INSERT INTO `law_customer` VALUES (2, '张三', '15730281837', 1, '', NULL, NULL, '李芹');
INSERT INTO `law_customer` VALUES (5, '高启强', '19373527193', 1, '', NULL, NULL, '李芹');
INSERT INTO `law_customer` VALUES (6, '安欣', '18372817382', 1, '', NULL, NULL, '李芹');
INSERT INTO `law_customer` VALUES (7, '唐博浩', '18382117550', 1, '', '2023-04-14 09:04:11', '2023-04-14 09:04:11', '李四');
INSERT INTO `law_customer` VALUES (8, '唐博浩', '18382117551', 1, '', '2023-04-14 09:05:21', '2023-04-14 09:05:21', '1111');

SET FOREIGN_KEY_CHECKS = 1;
