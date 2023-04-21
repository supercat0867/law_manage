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

 Date: 20/04/2023 17:39:34
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
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_admin
-- ----------------------------
INSERT INTO `law_admin` VALUES (1, 'admin', 'eyJpdiI6ImJsaDFpSnBcL2VGQVVVU0xXRUZXMHRRPT0iLCJ2YWx1ZSI6IlYyaWxFZ3RDdGg3d01kRzd6ZkpzcFE9PSIsIm1hYyI6ImZlYjI1NmZkYTNiMDNlZGJkZWQxMTJlOTEyMjQ5NDQxYWEwZjFiN2Q1MTU2MTI5NWU2NmM2ZTA4OTUyN2FjYWUifQ==', 1);
INSERT INTO `law_admin` VALUES (2, 'chai', 'eyJpdiI6IlJPUzhqMTFpWDBcL05pclQ3a1VMYlhnPT0iLCJ2YWx1ZSI6InBPaEJlXC9CckZacmQ1Vk1KOVVZYUxnPT0iLCJtYWMiOiIzODRjNmFhOTBlMzdmOGIxOWY2NTNhODM5YzkwNzZjNTQ1ZTlmZTc1ZjVhMWE4MmIwY2UwZDU3NWJlNTY1ZjkxIn0=', 1);
INSERT INTO `law_admin` VALUES (16, 'howie', 'eyJpdiI6InM3NUc3MmxHaXk1Vm1EeXRHenhLMFE9PSIsInZhbHVlIjoiTjIyOTVGa0FydTFLQWJrSVMwSkQ5Z2dzTjRoekxPbFRsSWdYcnQrcHY5ST0iLCJtYWMiOiI2MDU5ZDRlNWQxNjU1ZTlmOGYxOGRhMGY4MmM2N2M3NDE0YTkxOWY2Y2M2NmE2MjVmMDc1NmFhYzNiNWY4OWE5In0=', 1);

-- ----------------------------
-- Table structure for law_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `law_admin_role`;
CREATE TABLE `law_admin_role`  (
  `admin_id` int(2) NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of law_admin_role
-- ----------------------------
INSERT INTO `law_admin_role` VALUES (1, 1);
INSERT INTO `law_admin_role` VALUES (2, 2);
INSERT INTO `law_admin_role` VALUES (16, 1);

-- ----------------------------
-- Table structure for law_administration
-- ----------------------------
DROP TABLE IF EXISTS `law_administration`;
CREATE TABLE `law_administration`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `duty` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `education` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `intro` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `show_status` int(2) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_administration
-- ----------------------------
INSERT INTO `law_administration` VALUES (1, '邵建炜', '13558789376', 'adminImage/shao.jpg', '现任律冠精英律师团负责人；主要负责律冠精英律师团的全面管理工作及团队建设、按排办案律师、案源管理，引进专家律师', '工商管理专业、金融硕士（在读）', '四川毫达律师事务所：管委会主任；北京恒都（成都）律师事务所：管委会副主任；四川律冠法律咨询有限公司：董事长', 1);
INSERT INTO `law_administration` VALUES (2, '胡志国', '13888888888', 'adminImage/hu.jpg', '党支部书记；主要负责党务工作、组织党政宣传、学习', '石家庄陆军学院步兵指挥专业、重庆后勤工程学院环境工程专业（备注2017年已转业）', '从军二十一载，长期从事部队管理工作，具备一定的管理工作经验，具有很强的执行力，服从命令，听从指挥，在本职岗位能做到“干一行、爱一行”，锤炼了个人能力素质，提高了在关系协调，沟通以及公务的处理上的能力，善于学习、作风优良、待人诚恳、人际关系良好、处事冷静稳健、能合理安排生活中的事务。具有较强的逻辑思维和判断能力，对事情认真负责，有很强的责任心和团队意识；自信、乐观，具有一定的创新意识和创造能力。', 1);
INSERT INTO `law_administration` VALUES (3, '冯真平', '13777777777', 'adminImage/feng.jpg', '发展部副主任；主要负责开拓法律市场、案源对接、客户维护', '四川大学法学专业（在读）', '四川毫达（凉山）律师事务所：管委会副主任 ', 1);
INSERT INTO `law_administration` VALUES (4, '王潇', '13999999999', 'adminImage/xiao.jpg', '发展部副主任；主要负责案源对接', '四川大学MBA', '担任毫达律师事务所执行主任；曾就职某政府部门，具有较强的协调能力和管理能力。', 1);
INSERT INTO `law_administration` VALUES (5, '柴俊霏', '13000000000', 'adminImage/chai.jpg', '新媒体中心主管；主要负责新闻的编辑、发布及公众号后台的管理', '加利福尼亚大学本科', '曾就职于安盛天平财产保险有限公司综合部，有较强的工作协调能力，拥有流利的英语沟通能力。', 1);
INSERT INTO `law_administration` VALUES (6, '唐博浩', '18382117550', 'adminImage/tang.jpg', '技术部；主要负责公众号功能开发', '电子科技大学本科', '本科信息安全专业，有独立开发经验。', 1);

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
INSERT INTO `law_customer` VALUES (1, '柯南', '18381117111', 1, '', '2023-04-17 02:54:42', '2023-04-18 16:46:55', '李芹');

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
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_lawyer
-- ----------------------------
INSERT INTO `law_lawyer` VALUES (1, '吴越', '13888888888', '专职律师', '西南政法大学经济学硕士，国家公派留学生，德国法兰克福大学法学博土', '法研专家', '曾任西南政法大学教授，博士生导师。西南财经大学法学院教授、博士生导师，西南财经大学公司法治研究中心主任，商法学科带头人，四川省有突出贡献专家，兼任中国商法学会常务理事，四川省商法学研究会副会长，四川省环境与资源法学研究会荣誉会长;中国国际经济贸易仲裁委员会仲裁员，成都仲裁委仲裁员。2020年被授予第二届“四川省十大中青年法学专家”荣誉称号。', 'lawyerImage/wuyue.jpg', NULL, '2023-04-17 14:56:15', '2023-04-20 13:10:39', 1, 1);
INSERT INTO `law_lawyer` VALUES (2, '龙宗智', '13999999999', '专职律师', '法学院教授、法学博士、博士生导师', '法研专家', '现任四川大学法学院教授、博士生导师，法学研究所所长。任西南政法大学、西南财大博导师、曾任西南政法大学校长。早年曾任大军区检察院大校副检察长、现系中国刑事诉讼法学研究会、检察学研究会、廉政法制研究会等学会副会长、最高人民检察院特邀专家咨询员\r\n、国家社会科学基金项目法学学科评审组成员。', 'lawyerImage/long.jpg', NULL, '2023-04-17 15:53:25', '2023-04-20 13:10:41', 1, 1);
INSERT INTO `law_lawyer` VALUES (3, '张丽', '13777777777', '专职律师', '法学博士后、副教授   ', '不良资产处置专业委员会,企业法律顾问专业委员会,刑民交叉案专业委员会', '于1998年至2013年先后于西南财经大学、西南政法大学攻读法学学士、硕士、博士学位及从事博士后研究；2006年至今先后在泰和泰律师事务所、毫达律师事务所执业。张丽律师在律师执业中，作为团队首席律师先后办理千余件诉讼与非诉案件，主要涉及重大商事诉讼、公司经营风险控制、重大投融资项目、公司并购重组、企业治理结构设计、婚姻财富风险防控、家族企业传承规划、企业家刑事法律风险防范等专业领域。\r\n张丽律师在《光明日报》、《中国法学》（英文版）、《北京大学学报》等核心期刊发表论著数十篇；同时，张丽律师受邀担任政府机关、大型国有企业、银行、集团公司、大型民营企业等数十家机关及企业的法律顾问及代理律师。\r\n张丽律师代理的某重大案件入选最高人民法院指导性案件。针对重大疑难及社会热点案件，张丽律师曾多次接受四川电视台、成都商报等新闻媒体采访并发表专家意见。张丽律师具有深厚的法学理论功底和实务经验，深受客户信任。\r\n获得荣誉：四川省律协评认的建设工程与房地产专业律师、四川省人民政府行政复议委员会委员、四川省律师协会金融证劵专业委员会委员、主持主研多项国家省部级课题、代理某重大案件入选最高人民法院2017年推动中国法治进程十大案件及最高人民法院指导性案例', 'lawyerImage/zhangli.jpg', NULL, '2023-04-17 16:30:42', '2023-04-17 16:30:42', 1, 1);
INSERT INTO `law_lawyer` VALUES (4, '张坤', '13222222222', '专职律师', '西南政法大学、四川大学，法学硕士、博士研究生，台湾东海大学研习', '企业法律顾问专业委员会,信托与家族财富管理专业委员会,建筑工程纠纷类专业委员会,政府法律顾问专业委员会', '从事法律工作19年，长期致力于企业合规、政府顾问法律实务。曾从事政府法制工作数年，对口三十多个职能部门，参与近30部地方性法规草案和政府规章起草工作，多次参与立法评估和专家论证。担任多家仲裁机构仲裁员，年均办理商事仲裁近40件。\r\n在《宗教学研究》、《社会科学研究》、《财经政法评论》、《法制网》、《法律思维与法学理论》、《四川法制网》、《中国西部法制网》等国家、省市级刊物及媒体发表文章三十余篇，其中《美国宪政中的宗教经验》、《公权与私权之间—从八二宪法及其修正案看当下中国社会权势转移趋势》发表于中文核心期刊，《大陆地区房地产政策法规及商品房买卖律师实务》收录入东海大学民事法律学术研讨会论文集，《美国长臂管辖能动司法的合规启示——从跨国制裁到合规计划》发表于《应用法学评论》。\r\n社会职务：西南政法大学龙图合规中心特邀研究员、四川大学法学院硕士研究生校外导师、四川省人大常委会备案审查专家、四川省检察院法律监督咨询专家、成都市知识产权、智库维权援助专家、成都仲裁委仲裁员、北海国际仲裁委仲裁员、遂宁仲裁委仲裁员\r\n四川省律协战略委副主任、四川省律协民商委副主任兼秘书长、成都市律协战略委副主任、成都市律协高新分会理事和涉外创新中心主任、四川锦江监狱特邀监督员、成都高新志愿者、协会特邀专家志愿者、成都律协高新分会党员先锋队法律咨询组长、四川省律协《民法典》百人宣讲团成员、《民法典》研读指导组成员。\r\n荣誉资质：全国律协青年领军人才训练营第16期、四川省律师行业优秀党员、四川省优秀女律师、成都市优秀律师    、首批成都高新区涉外精英人才\r\n论文《乡村振兴背景下集体经营性建设用地入市之发了规制及社会实践》荣获第二届新时代四川律师行业党建论坛暨第二届四川律师论坛优秀论文二等奖、\r\n论文《身份关系协议适用民法典合同编之辨析——以忠诚协议为例》获得第四届民商律师实务论坛优秀论文奖。', 'lawyerImage/zhangkun.jpg', NULL, '2023-04-19 16:44:04', '2023-04-20 12:17:20', 1, 1);
INSERT INTO `law_lawyer` VALUES (5, '李芹', '13555555555', '专职律师,律所合伙人', '四川大学法学学士、四川大学法学硕士', '不良资产处置专业委员会,企业合规专业委员会,企业法律顾问专业委员会,刑民交叉案专业委员会,建筑工程纠纷类专业委员会,政府法律顾问专业委员会,破产清算、重组、重整专业委员会,裁决、判决执行专业委员会,保险理赔纠纷专业委员会', '自2009年开始从事法律工作，目前系四川毫达律师事务所法律事务所高级合伙人、破产法律事务部负责人。\r\n现任成都市破产管理人个人会员、成都市破产管理人协会理事、成都市破产管理人协会重组委员会委员、四川省企业经济促进会人民调解委员会调解员、钦州仲裁委员会仲裁员。擅长处理各种经济合同纠纷，企业投融资、企业破产清算及重整、建筑工程及房地产、股权转让、资产并购等。在办案中李芹律师积累了丰富的经验，具有独特的庭辩风格，经过长期的工作历练，铸就了诚信、专业、创新、严谨的法律服务风格，成功地维护了众多当事人的的合法权益，赢得了当事人的充分信赖及肯定。', 'lawyerImage/liqin.jpg', NULL, '2023-04-20 12:17:54', '2023-04-20 12:17:54', 1, 1);
INSERT INTO `law_lawyer` VALUES (6, '沈璟晶', '12222222222', '专职律师', '西南政法大学法学学士，西南财经大学法学硕士', '企业法律顾问专业委员会,公司股权纠纷类专业委员会,建筑工程纠纷类专业委员会,矿山纠纷类专业委员会,破产清算、重组、重整专业委员会', '2003年起进入法院系统工作，曾任职于广东省法院系统，成都市法院系统，历任庭长、审判委员会委员。期间共计办理各类经济纠纷案件近万件，其中包含多起中纪委、省法院交办案件，以及多起全省全市具有重大示范意义的案件。曾获得四川省政法委、四川省法律系统先进个人称号。擅长民商事诉讼服务、诉讼策略制定、案件流程把控；企业股权配置、股权争议、股东权利纠纷；企业破产筹划、破产清算、企业预重整、企业重整；合同经济纠纷法律实务、房地产开发及销售法律实务。担任成都市检察院司法监督员、锦江监狱特邀讲师、成都市戒毒所法律顾问、 四川省破产法学会会员。目前就执业于北京恒都（成都）律师事务所', 'lawyerImage/shen.jpg', NULL, '2023-04-20 12:18:40', '2023-04-20 12:18:40', 1, 1);
INSERT INTO `law_lawyer` VALUES (7, '杨华', '13444444444', '专职律师,律所合伙人', '西南财经大学法学硕士', '不良资产处置专业委员会,企业法律顾问专业委员会,建筑工程纠纷类专业委员会,民间借贷纠纷类专业委员会,破产清算、重组、重整专业委员会', '擅长建设工程与房地产纠纷、破产清算业务、与公司有关的纠纷等。获得荣誉：四川省律师协会第九届建设工程和房地产专业委员会委员、四川省律师协会建筑房地产专业律师、成都市律师协会第七届破产法专业委员会委员、成都市破产管理人协会个人会员、四川省法学会金融法学研究会理事等。', 'lawyerImage/yang.jpg', NULL, '2023-04-20 12:19:09', '2023-04-20 12:19:09', 1, 1);
INSERT INTO `law_lawyer` VALUES (8, '谭建霞', '13666666666', '专职律师,律所合伙人', '西南政法大学，法学硕士', '企业合规专业委员会,刑事辩护专业委员会,刑民交叉案专业委员会', '2012年进入重庆市南川区人民检察院工作，2015年在重庆市人民检察院第三分院挂职锻炼。共计办理刑事案件600余起，其中包含多起在当地有重大影响、疑难复杂的案件，包括多起贪污、贿赂、滥用职权等案件。目前就执业于北京恒都（成都）律师事务所（高级合伙人）2013年、2014年被评为重庆市“优秀党员”、2015年被评为重庆市南川区优秀公务员、2017年获重庆市人民检察院嘉奖。多篇文章发表在《重庆检察》等刊物上、\r\n2013年《论检察机关量刑建议——从A区故意伤害罪公诉案件切入》一文获《全国女检察官征文比赛》三等奖、\r\n2015年参与撰写了最高人民检察院应用理论研究重点课题《贪污贿赂犯罪案件适用法律疑难问题研究》。', 'lawyerImage/tanjianxia.jpg', NULL, '2023-04-20 12:26:34', '2023-04-20 12:26:34', 1, 1);
INSERT INTO `law_lawyer` VALUES (9, '管茂成', '13999999991', '专职律师,律所合伙人', '西南政法大学法学本科学位、四川大学法律硕士学位', '不良资产处置专业委员会,企业法律顾问专业委员会,政府法律顾问专业委员会,破产清算、重组、重整专业委员会', '2003年毕业后任职于四川省成都市中级人民法院法官，先后在审监庭、民二庭从事审判工作。2014年至2020年任四川鑫天律师事务所执行主任。2021年至今任北京恒都（成都）律师事务所副主任律师。长期从事民商事审判和代理工作，尤其在公司法、合同法、金融、破产事务方面最为擅长，参予并审理各类民商事案件数百件，积累了丰富的实践经验。 ', 'lawyerImage/yang.jpg', NULL, '2023-04-20 12:27:07', '2023-04-20 12:27:07', 1, 1);
INSERT INTO `law_lawyer` VALUES (10, '凌婷秋', '12999999999', '税务会计师', 'AAIA 国际会计师公会全权执业会员、FRM 金融风险管理师、CFA CandidateLevelI、SIFM 高级国际财务管理师', '税务筹划专业委员会,股权架构设计专业委员会', '17年财务管理工作经验，其中10年以上信息化行业上市公司高管工作经验。熟悉集团财务管理模式、内部银行、内部定价等管理手段进行集团化管理；熟悉投融资财务分析、拥有投融资的系统性思维模式。精通各种税金计算与申报及税务筹划。如申请软件产品增值税即征即退、享受国家高新技术企业税收优惠政策、研发费用加计扣除等措施。拥有较强的资源整合能力，广泛的国际性、全国性的金融机构、投行、券商，会、审计、资产评估、律师事务所资源。熟悉企业并购、重组以及股权一级市场投资运作，全程参与企业的混合所有制改革，在私募股权投资机构任投决会委员，对并购投资过程中对企业商业模式、核心竞争力、风险分析及相关税收筹划有较强的分析把控能力。较强的金融及财务专业能力，有较强的宏观思维，同时，多年的财务实践经验，深知光有战略思维不足以实现目标，还需脚踏实地，勤奋耕耘，方得始终。目前就执业于北京恒都（成都）律师事务所', 'lawyerImage/lingtingqiu.jpg', NULL, '2023-04-20 12:27:33', '2023-04-20 12:27:33', 1, 1);
INSERT INTO `law_lawyer` VALUES (11, '孙顺发', '11111111111', '专职律师,律所合伙人', '四川省财大法学博士', '不良资产处置专业委员会,企业法律顾问专业委员会,政府法律顾问专业委员会,民间借贷纠纷类专业委员会,著作权纠纷类专业委员会,保险理赔纠纷专业委员会', '毫达律师事务所创始合伙人，主任律师。中央广播电视总台法制频道《律师来了》栏目特邀评论员、四川电视台、封面新闻等特邀评论员；四川省企业经济促进会调委会副主任、四川金沙商事调解中心理事；政协成都市武侯区委员、中国民主建国会会员、四川省青年联合会委员；2016-2019年度成都市高新区优秀律师、2018-2020年度四川省优秀青年律师（专业方向）。', 'lawyerImage/sun.jpg', NULL, '2023-04-20 12:27:57', '2023-04-20 12:27:57', 1, 1);
INSERT INTO `law_lawyer` VALUES (12, '夏岷才', '12888888888', '专职律师,律所合伙人', '四川大学法律专业、西南政法学院法律专业硕士', '企业法律顾问专业委员会,建筑工程纠纷类专业委员会', '1999年11月开始从事房地产法律事务，2014年7月开始逐步转型从事公司法律事务。执业27年来，累计办理了几百件诉讼、仲裁案件，鲜有败绩。现有常年顾问单位：美姑县人民政府、四川和锐石油有限责任公司、四川关家建设股份有限公司、四川省川建建筑有限公司、成都富森美建南建筑装饰有限公司、四川永宏欧典装饰工程有限公司、四川远洲劳务有限公司、四川省盛龙农合商贸有限公司等20余家，主要为：房地产开发、建筑装饰、劳务类公司、政府单位、科创型公司等。顾问单位中合作时间长的已经超过25年，以专业、尽责、高效赢得了委托人的一致好评。', 'lawyerImage/xia.jpg', NULL, '2023-04-20 12:28:36', '2023-04-20 12:28:36', 1, 1);
INSERT INTO `law_lawyer` VALUES (13, '陈志兵', '15555555555', '专职律师,律所合伙人', '南京陆军指挥学院博士研究生', '军事法庭受理案件专业委员会,刑事辩护专业委员会,婚姻、家庭纠纷类专业委员会,建筑工程纠纷类专业委员会,民间借贷纠纷类专业委员会', '长期在云南边防一线工作，曾经多次获得云南省军区、云南省军区边防一团嘉奖，期间在南京陆军指挥学院攻读博士研究生，2014年3月自主择业。通过自学，于2016年3月通过法律职业资格考试（A证），2017年10月在四川毫达律师事务所执业至今。', 'lawyerImage/chenzhibing.jpg', NULL, '2023-04-20 14:03:23', '2023-04-20 14:03:23', 1, 1);
INSERT INTO `law_lawyer` VALUES (14, '苟迪', '14555555555', '专职律师', '四川师范大学法学专业', '不良资产处置专业委员会,企业法律顾问专业委员会,政府法律顾问专业委员会,保险理赔纠纷专业委员会', '成都市高新区人民法院特邀调解员。自从事法律工作以来，苟迪律师曾先后在成都某区人民法院派出法庭、成都市某区人民法院工作、某外企公司担任法务主管，积累了大量的法律实务经验，至今从事法律行业已经10余年。执业后专注于民商事法律风险防范与争议解决，擅长房产纠纷、债权债务、婚姻家庭、经济合同纠纷等类型案件。参与办理了较多的诉讼与非诉法律业务，为政府机关、国有企业、民营企业等多家单位提供法律顾问服务及专项服务，充分运用扎实专业的法律理论知识、娴熟的办案技巧及严谨的工作态度为客户提供全方位、高水准的法律服务。', 'lawyerImage/goudi.jpg', NULL, '2023-04-20 14:03:39', '2023-04-20 14:03:39', 1, 1);
INSERT INTO `law_lawyer` VALUES (15, '罗克斌', '18883333333', '专职律师', '法学学士', '矿山纠纷类专业委员会', '注于矿产资源法律服务，自执业以来，以专业的理论功底、严谨的思维方式、认真负责的工作态度，得到了当事人的一致认可。专业职务：成都市律师协会金融与保险专业委员会委员。\r\n工作业绩： 服务的客户包括广元市人民政府，阿坝州人民政府、马尔康市人民政府，四川省省级机关事业管理局永兴管理处，四川省省级机关事业管理局，四川省自然资源集团投资集团，四川省天府矿业投资有限公司，四川省冶金综合服务有限责任公司，云南天力煤化有限公司，西部汇源矿业有限公司，成都财兴矿业有限责任公司，恒大集团成都分公司，九禾股份有限公司，华西集团第三建筑公司，成都三智建筑工程有限公司、成都普尔仕微电子有限公司等。\r\n 办理和深度介入xx矿业与xx时代投资并购专项服务（并购标的约30亿元）、xx矿业与xx锂业投资并购专项服务（并购标的约6亿元）、贵州xx煤矿与xx贵州xx高速公路公司压覆谈判专项服务（涉案标的约8亿元）、西部xx矿业有限公司与四川省国土资源厅诉讼案、西藏xx矿业开发有限公司与国网xx电力公司压覆诉讼案、贵州三都xx矿业有限公司与贵州xx高速公路建设有限公司压覆案，邮储银行成都分行、平安银行成都分行的不良贷款清收工作（诉讼标的约3亿元），四川雄飞集团诉恒大地产集团股权转让纠纷案（涉案标的21亿元，诉讼标的2.8亿元），四川建设工程有限公司与攀枝花市东方浩远房地产开发有限公司建设工程合同纠纷案（涉案标的1.3768亿元，诉讼标的5000万元）等。\r\n执业理念：做一个有简约、极致、有灵魂的法律人', 'lawyerImage/luoke.jpg', NULL, '2023-04-20 14:03:58', '2023-04-20 14:03:58', 1, 1);
INSERT INTO `law_lawyer` VALUES (16, '谷伟', '17775556434', '专职律师', '南昌大学法律专业', '企业合规专业委员会,刑事辩护专业委员会,刑民交叉案专业委员会', '拥有十二年法律相关从业经验，法律专业学士，曾先后担任过人民检察官、苹果公司法务专家、央企法务主管、上市公司法务负责人、长期的案件办理过程中积累了丰富的刑事、民事、商事法律事务处理的理论和实践经验。对诉讼案件有较丰富的经验，做事严谨，擅长综合因素考虑统筹全局方案，坚持专业、敬业的态度，积极为当事人排忧解难。尤其擅长处理各类合同纠纷、企业刑事合规、风险控制、维权追偿、止损增益、疑难复杂事项解决的服务事宜，秉着“不治已病治未病,不治已乱治未乱”的预防理念，善于对存在的风险和漏洞提出适合并行之有效的解决方案。谷伟律师目前担任成华区劳动人事仲裁委仲裁员；成都市律协公司法专业委员会委员；获得奖项与荣誉：广东省检系统机关优秀个人、江门市检察院先进个人、成都市（成华区）劳动人事仲裁委仲裁员、成都市市律协公司法专委会委员、多篇文章发表在《广东检察》等刊物。', 'lawyerImage/guwei.jpg', NULL, '2023-04-20 14:04:13', '2023-04-20 14:04:13', 1, 1);
INSERT INTO `law_lawyer` VALUES (17, '李静', '19900000000', '专职律师', '四川师范大学法学专业', '不良资产处置专业委员会,公司股权纠纷类专业委员会,军事法庭受理案件专业委员会,裁决、判决执行专业委员会', '曾经是特战军人，后至成都市某区人民法院从事执行工作十余年，参与办理执行案件2000+。执业后，先后授聘多家政府机关及企事业单位担任法律顾问，参与和代理办理数十起大型企业、银行金融借贷类诉讼、执行案件。专业领域包括但不限于疑难复杂执行案件。党政机关，企事业单位法律事务、金融类案件、不良资产处置，民商事争议解决等。目前就执业于北京恒都（成都）律师事务所', 'lawyerImage/lijing.jpg', NULL, '2023-04-20 14:04:26', '2023-04-20 14:04:26', 1, 1);
INSERT INTO `law_lawyer` VALUES (18, '朱校均', '15666666666', '专职律师,律所合伙人', '西南政法大学法学学士', '公司股权纠纷类专业委员会,建筑工程纠纷类专业委员会', '专注于重大民商事争议解决以及刑事案件辩护。获得荣耀：四川省律师协会刑事辩护协会委员、成都市高新区刑事法律服务创新中心委员、2019-2020 年成都市优秀律师。', 'lawyerImage/zhuxiaojun.jpg', NULL, '2023-04-20 14:04:43', '2023-04-20 14:04:43', 1, 1);
INSERT INTO `law_lawyer` VALUES (19, '陈萍', '17888888888', '专职律师,律所合伙人', '四川大学法学学士', '建筑工程纠纷类专业委员会', '四川瀛领禾石律师事务所创始合伙人、主任、党总支书记。\r\n担任的部分社会职务有：\r\n四川省律师协会规则与大数据委员会委员，四川省律师协会城乡统筹委员会委员，成都市律师协会理事、成都市律师协会成华区分会副会长、理事，成都仲裁委仲裁员、北海国际仲裁院仲裁员、钦州仲裁委仲裁员、四川瀛领禾石律师事务所PPP及其建设工程法律专业委员会主任。\r\n所获荣誉：\r\n2004年，荣获“四川优秀青年卫士”称号。\r\n2018年，荣获“成华区律师行业2018年度优秀共产党员”。\r\n2019年，荣获“成都市成华区2019年度法律服务工作先进个人”。\r\n2021年，荣获“四川省律师行业优秀共产党员。”\r\n2021年，荣获“成都市法律援助先进个人”。\r\n2022年，荣获“四川省优秀律师”称号。\r\n专业领域：常年法律顾问、行政法律事务、公司法律事务、建设工程法律事务、合同法律事务、刑事辩护。', 'lawyerImage/chenping.jpg', NULL, '2023-04-20 14:04:57', '2023-04-20 14:04:57', 1, 1);
INSERT INTO `law_lawyer` VALUES (20, '卢晨曦', '19000000000', '专职律师', '西南政法大学法律硕士', '企业法律顾问专业委员会', '毕业于西南政法大学，擅长民商事争议解决，执业经历中为包括但不限于政府、国企、民营企业等提供专项法律服务。曾在多家风投机构担任法务风控管理岗位，熟悉境内、境外基金设立、投资并购交易流程，并对区块链合规业务有独特见解。', 'lawyerImage/luchenxi.jpg', NULL, '2023-04-20 14:05:21', '2023-04-20 14:05:21', 1, 1);
INSERT INTO `law_lawyer` VALUES (21, '邓辉', '14666666666', '专职律师,律所合伙人', '四川理工学院法学学士学位', '建筑工程纠纷类专业委员会', '于2012年取得律师执业资格证书，执行十余年。执行期间主要从事建设工程纠纷的诉讼及非诉业务，于2022年受聘于资阳仲裁委员会，担任建设工程纠纷案件的仲裁员。曾任西南联合产权交易所有限责任公司、四川鑫达企业集团有限公司、成都建工第三建筑有限公司、成都建工装饰装修有限公司、江西省银鹰建设工程有限公司、江西威乐建设集团有限公司、四川桐嘉建设工程有限公司、四川泰祥建筑工程有限公司、四川天府建设工程有限责任公司、四川钇灶劳务有限公司、四川有为建设工程有限公司、四川蜀利建设工程有限公司的法律顾问，并担任前述顾问单位的诉讼案件的委托代理人代理相关诉讼案件，累计处理建设工程领域有关的诉讼案件一百余件。在2020年7月至今担任成都建工装饰装修工程有限公司《广元大华1939民族工业遗址文创园区建设项目（EPC总承包项目）》全过程法律服务项目的主办律师，对该项目实施过程中的法律风险进行了有效识别和防控，取得了当事人好评。', 'lawyerImage/denghui.jpg', NULL, '2023-04-20 14:05:37', '2023-04-20 14:05:37', 1, 1);
INSERT INTO `law_lawyer` VALUES (22, '高宇豪', '18999999999', '专职律师', '海南大学、四川大学，硕士学位', '企业合规专业委员会,刑事辩护专业委员会,刑民交叉案专业委员会', '拥有十三年法律工作经验，先后进入大竹县公安局、达州市公安局、泰和泰律师事务所工作。擅长刑事辩护、刑事合规、侵权纠纷、刑民交叉、公安行政处罚的复议及诉讼等领域。服务过的客户包括: 西南水泥、万科、中国人保、康定机场集团等。\r\n 在公安机关工作9年，在侦查、法制、办公室文秘等岗位工作过，负责刑事侦查、刑事复议复核、行政复议等工作，熟悉公安机关侦查业务、案审业务。\r\n离开公安机关后，就职于泰和泰律师事务所，执业2年多，擅长刑事辩护、刑事合规、侵权纠纷、刑民交叉等领域，熟悉交通保险、刑事控告及辩护、侵权纠纷、行政诉讼等业务', 'lawyerImage/gao.jpg', NULL, '2023-04-20 14:05:56', '2023-04-20 14:22:48', 1, 1);

-- ----------------------------
-- Table structure for law_permission
-- ----------------------------
DROP TABLE IF EXISTS `law_permission`;
CREATE TABLE `law_permission`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `per_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_permission
-- ----------------------------
INSERT INTO `law_permission` VALUES (1, '客户管理', 'App\\Http\\Controllers\\Admin\\UserController');
INSERT INTO `law_permission` VALUES (2, '文章管理', NULL);
INSERT INTO `law_permission` VALUES (3, '角色管理', 'App\\Http\\Controllers\\Admin\\RoleController');
INSERT INTO `law_permission` VALUES (4, '律师管理', 'App\\Http\\Controllers\\Admin\\LawyerController');
INSERT INTO `law_permission` VALUES (6, '行政人员管理', 'App\\Http\\Controllers\\Admin\\AdministController');
INSERT INTO `law_permission` VALUES (5, '管理员管理', 'App\\Http\\Controllers\\Admin\\AdminController');

-- ----------------------------
-- Table structure for law_role
-- ----------------------------
DROP TABLE IF EXISTS `law_role`;
CREATE TABLE `law_role`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `describe` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_role
-- ----------------------------
INSERT INTO `law_role` VALUES (1, '超级管理员', '拥有至高无上的权限，开发者专属。');
INSERT INTO `law_role` VALUES (2, '新媒体主管', '负责维护文章板块。');

-- ----------------------------
-- Table structure for law_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `law_role_permission`;
CREATE TABLE `law_role_permission`  (
  `role_id` int(2) NOT NULL,
  `permission_id` int(2) NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of law_role_permission
-- ----------------------------
INSERT INTO `law_role_permission` VALUES (1, 6);
INSERT INTO `law_role_permission` VALUES (1, 5);
INSERT INTO `law_role_permission` VALUES (2, 2);
INSERT INTO `law_role_permission` VALUES (1, 4);
INSERT INTO `law_role_permission` VALUES (1, 3);
INSERT INTO `law_role_permission` VALUES (1, 2);
INSERT INTO `law_role_permission` VALUES (1, 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of law_unit
-- ----------------------------
INSERT INTO `law_unit` VALUES (1, '四川人民政府', '2023-04-17 16:40:40', '2023-04-20 16:23:49', 1);
INSERT INTO `law_unit` VALUES (2, '成都市人民政府', '2023-04-20 15:25:34', '2023-04-20 15:25:34', 1);
INSERT INTO `law_unit` VALUES (3, '德阳市政府', '2023-04-20 15:26:31', '2023-04-20 15:26:31', 1);
INSERT INTO `law_unit` VALUES (4, '都江堰市人民政府', '2023-04-20 15:36:47', '2023-04-20 15:40:48', 1);
INSERT INTO `law_unit` VALUES (5, '兴文县人民政府', '2023-04-20 15:40:59', '2023-04-20 15:40:59', 1);
INSERT INTO `law_unit` VALUES (6, '简阳市人民政府', '2023-04-20 15:41:10', '2023-04-20 15:41:10', 1);
INSERT INTO `law_unit` VALUES (7, '筠连县人民政府', '2023-04-20 15:41:20', '2023-04-20 15:41:20', 1);
INSERT INTO `law_unit` VALUES (8, '凉山州甘洛县政府', '2023-04-20 15:41:31', '2023-04-20 15:41:31', 1);
INSERT INTO `law_unit` VALUES (9, '四川省刑法学研究会理事', '2023-04-20 15:41:43', '2023-04-20 15:41:43', 1);
INSERT INTO `law_unit` VALUES (10, '四川省人民政府行政复议委员会委员', '2023-04-20 15:41:53', '2023-04-20 15:41:53', 1);
INSERT INTO `law_unit` VALUES (11, '四川省人民政府国有企业监事会', '2023-04-20 15:42:29', '2023-04-20 15:42:29', 1);
INSERT INTO `law_unit` VALUES (12, '理县司法局', '2023-04-20 15:42:42', '2023-04-20 15:42:42', 1);
INSERT INTO `law_unit` VALUES (13, '德阳市委', '2023-04-20 15:42:51', '2023-04-20 15:42:51', 1);
INSERT INTO `law_unit` VALUES (14, '成都市民政局', '2023-04-20 15:42:59', '2023-04-20 15:42:59', 1);
INSERT INTO `law_unit` VALUES (15, '德阳市司法局', '2023-04-20 15:43:09', '2023-04-20 15:43:09', 1);
INSERT INTO `law_unit` VALUES (16, '四川地矿物资', '2023-04-20 15:43:19', '2023-04-20 15:43:19', 1);
INSERT INTO `law_unit` VALUES (17, '中共成都市温江区委办公室', '2023-04-20 15:43:31', '2023-04-20 15:43:31', 1);
INSERT INTO `law_unit` VALUES (18, '都匀经济开发区管理委员会', '2023-04-20 15:43:42', '2023-04-20 15:43:42', 1);
INSERT INTO `law_unit` VALUES (19, '中国中央电视台', '2023-04-20 15:43:50', '2023-04-20 15:43:50', 1);
INSERT INTO `law_unit` VALUES (20, '四川省村镇建设发展中心', '2023-04-20 15:43:59', '2023-04-20 15:43:59', 1);
INSERT INTO `law_unit` VALUES (21, '中共成都市委外事工作委员会办公室', '2023-04-20 15:44:09', '2023-04-20 15:44:09', 1);
INSERT INTO `law_unit` VALUES (22, '四川省成都强制隔离戒毒所', '2023-04-20 15:44:19', '2023-04-20 15:44:19', 1);
INSERT INTO `law_unit` VALUES (23, '四川省成都戒毒康复所', '2023-04-20 15:44:28', '2023-04-20 15:44:28', 1);

SET FOREIGN_KEY_CHECKS = 1;
