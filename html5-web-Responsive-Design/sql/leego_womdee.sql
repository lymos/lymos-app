/*
Navicat MySQL Data Transfer

Source Server         : erp.leego.com
Source Server Version : 50508
Source Host           : 10.11.2.16:3306
Source Database       : leego_womdee

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2016-02-29 08:39:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for womdee_attributes
-- ----------------------------
DROP TABLE IF EXISTS `womdee_attributes`;
CREATE TABLE `womdee_attributes` (
  `attribute_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '属性ID',
  `attribute_title_cn` varchar(64) DEFAULT NULL COMMENT '中文',
  `attribute_title_en` varchar(64) DEFAULT NULL COMMENT '英文',
  `attribute_title_de` varchar(64) DEFAULT NULL COMMENT '德文',
  `attribute_title_jp` varchar(64) DEFAULT NULL COMMENT '日文',
  `attribute_title_fr` varchar(64) DEFAULT NULL COMMENT '法文',
  `attribute_title_es` varchar(64) DEFAULT NULL COMMENT '西班牙',
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_attributes
-- ----------------------------
INSERT INTO `womdee_attributes` VALUES ('1', '内置胸罩', 'Bra', 'BH', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('2', '清洗方式', 'Washing Way', 'Waschen Weise', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('3', '码数', 'Size', 'Größe', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('4', '腰线', 'Waistline', null, null, null, null);
INSERT INTO `womdee_attributes` VALUES ('5', '薄厚', 'Thickness', 'Dicke', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('6', '袖长', 'Sleeve Length', 'Ärmel Länge', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('7', '裙长', 'Dress Length', 'Kleid Länge', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('8', '适合场合', 'Occasion', 'Gelegenheit', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('9', '适合季节', 'Season', 'Jahreszeit', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('10', '面料类型', 'Fabric Type', 'Gewebe Art', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('11', '领形', 'Collar Type', 'Ausschnitt Typ', null, null, null);
INSERT INTO `womdee_attributes` VALUES ('12', '颜色', 'Color', 'Farbe', null, null, null);

-- ----------------------------
-- Table structure for womdee_attributes_values
-- ----------------------------
DROP TABLE IF EXISTS `womdee_attributes_values`;
CREATE TABLE `womdee_attributes_values` (
  `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_value_cn` varchar(100) DEFAULT NULL COMMENT '属性值',
  `attribute_value_en` varchar(100) DEFAULT NULL,
  `attribute_value_de` varchar(100) DEFAULT NULL,
  `attribute_value_jp` varchar(100) DEFAULT NULL,
  `attribute_value_fr` varchar(100) DEFAULT NULL,
  `attribute_value_es` varchar(100) DEFAULT NULL,
  `attribute_id` int(10) DEFAULT NULL COMMENT '属性ID',
  `attribute_value_block_color` varchar(32) DEFAULT NULL COMMENT '属性色块，CSS3中，支持渐变，定义格式为 f:000000-t:ffffff-lt,表示色彩从黑色渐变到白色，lt = left top,指定方位，常用值：l(left),r(right),t(top),b(bottom),lt(left top),lb(left bottom),rt(right top),rb(right bottom)',
  `attribute_value_block_image` varchar(64) DEFAULT NULL COMMENT '属性图标',
  PRIMARY KEY (`attribute_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_attributes_values
-- ----------------------------
INSERT INTO `womdee_attributes_values` VALUES ('1', '有', 'Yes', null, null, null, null, '1', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('2', '无', 'No', 'Ohne', null, null, null, '1', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('3', '手洗', 'Hand Washing', 'Handwäsche', null, null, null, '2', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('4', '机洗', 'Machine Washing', null, null, null, null, '2', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('5', '常规', 'Regular Washing', 'Herkömmlich', null, null, null, '2', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('6', '干洗', 'Dry Washing', null, null, null, null, '2', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('7', 'S', 'S', 'S', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('8', 'M', 'M', 'M', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('9', 'L', 'L', 'L', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('10', 'XL', 'XL', 'XL', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('11', '2XL', '2XL', '2XL', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('12', '3XL', '3XL', '3XL', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('13', '4XL', '4XL', '4XL', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('14', '5XL', '5XL', '5XL', null, null, null, '3', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('15', '常规', null, null, null, null, null, '4', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('16', '中腰', null, null, null, null, null, '4', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('17', '高腰', null, null, null, null, null, '4', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('18', '低腰', null, null, null, null, null, '4', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('19', '薄', 'Thin', 'Dünn', null, null, null, '5', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('20', '厚', 'Thick', 'Dick', null, null, null, '5', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('21', '适中', 'Moderate', 'Mittel', null, null, null, '5', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('22', '长袖', 'Long Sleeve', 'Langarm', null, null, null, '6', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('23', '7分袖', '3/4 Sleeve', '3/4 Ärmel', null, null, null, '6', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('24', '中袖', 'Half Sleeve', 'Halb Ärmel', null, null, null, '6', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('25', '短袖', 'Short Sleeve', null, null, null, null, '6', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('26', '无袖', 'Sleeveless', 'Ärmellos', null, null, null, '6', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('27', '长裙', 'Maxi Dress', 'lang', null, null, null, '7', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('28', '中裙', 'Midi Dress', 'midi', null, null, null, '7', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('29', '短裙', 'Short Dress', 'kurz', null, null, null, '7', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('30', '超短裙', 'Mini Dress', 'mini', null, null, null, '7', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('31', '日常', 'Casual', 'Tägliches Leben', null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('32', '职场', 'Work', 'Business', null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('33', '俱乐部', 'Club', null, null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('34', '鸡尾酒会', 'Cocktail', 'Cocktail', null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('35', '婚礼派对', 'Party', 'Hochzeit Party', null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('36', '商务场合', 'Business', null, null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('37', '舞会', 'Ball', null, null, null, null, '8', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('38', '春季', 'Spring', 'Frühling', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('39', '夏季', 'Summer', 'Sommer', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('40', '秋季', 'Autumn', 'Herbst', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('41', '冬季', 'Winter', 'Winter', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('42', '春秋', 'Spring and Autumn', 'Frühling und Herbst', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('43', '春夏', 'Spring and Summer', 'Frühling Sommer', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('44', '秋冬', 'Autumn and Winter', 'Herbst Winter', null, null, null, '9', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('45', '无弹力', 'No Stretchy', 'Keine Elastizität', null, null, null, '10', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('46', '微弹力', 'Micro Stretchy', 'kleine Elastizität', null, null, null, '10', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('47', '中弹力', 'Medium Stretchy', 'Mittlere Elastizität', null, null, null, '10', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('48', '高弹力', 'High Stretchy', 'hoche Elastizität', null, null, null, '10', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('49', '高领', 'High Collar', null, null, null, null, '11', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('50', '圆领', 'Scoop Neck', 'Rund Ausschnitt', null, null, null, '11', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('51', 'V领', 'V Neck', 'V Ausschnitt', null, null, null, '11', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('52', '深V领', 'Deep V Neck', 'tief V Ausschnitt', null, null, null, '11', ' ', ' ');
INSERT INTO `womdee_attributes_values` VALUES ('53', '黑色', 'Black', 'Schwarz', null, null, null, '12', ' ', ' ');

-- ----------------------------
-- Table structure for womdee_buiness_dealer
-- ----------------------------
DROP TABLE IF EXISTS `womdee_buiness_dealer`;
CREATE TABLE `womdee_buiness_dealer` (
  `dealer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `dealer_company_name` varchar(60) NOT NULL DEFAULT '' COMMENT '公司名称',
  `dealer_website` varchar(128) NOT NULL DEFAULT '' COMMENT '网址',
  `dealer_company_address` varchar(128) NOT NULL DEFAULT '' COMMENT '公司地址',
  `dealer_company_type` varchar(40) NOT NULL DEFAULT '' COMMENT '公司类型',
  `dealer_brands` varchar(120) NOT NULL DEFAULT '' COMMENT '品牌或者产品',
  `dealer_purchase_purpose` varchar(100) NOT NULL DEFAULT '' COMMENT '购买目的',
  `dealer_contact_name` varchar(80) NOT NULL DEFAULT '' COMMENT '联系人',
  `dealer_email_address` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `dealer_contact_phone` varchar(20) NOT NULL DEFAULT '' COMMENT '联系人电话',
  `dealer_contact_mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '联系人手机号',
  `dealer_message` text COMMENT '备注留言',
  `dealer_time` datetime DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`dealer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='业务经销商表';

-- ----------------------------
-- Records of womdee_buiness_dealer
-- ----------------------------
INSERT INTO `womdee_buiness_dealer` VALUES ('1', 'sdf', 'sadf', 'sdaf', 'sdf', 'sdf', 'company use', 'sdafs', 'sdf', 'sadf', 'dasf', null, '2016-01-26 16:49:33');

-- ----------------------------
-- Table structure for womdee_category
-- ----------------------------
DROP TABLE IF EXISTS `womdee_category`;
CREATE TABLE `womdee_category` (
  `category_id` int(5) NOT NULL COMMENT '分类ID',
  `parent_id` int(5) NOT NULL DEFAULT '0' COMMENT '父分类ID',
  `category_logo` varchar(64) DEFAULT NULL COMMENT '分类图标',
  `category_sort` int(11) DEFAULT NULL,
  `category_status` int(1) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_category
-- ----------------------------
INSERT INTO `womdee_category` VALUES ('2639', '0', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2641', '2639', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2646', '2641', ' ', '2', '1');
INSERT INTO `womdee_category` VALUES ('2647', '2641', ' ', '3', '1');
INSERT INTO `womdee_category` VALUES ('2650', '2641', ' ', '6', '1');
INSERT INTO `womdee_category` VALUES ('2651', '2641', ' ', '7', '1');
INSERT INTO `womdee_category` VALUES ('2652', '2639', ' ', '2', '1');
INSERT INTO `womdee_category` VALUES ('2653', '2652', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2654', '2652', ' ', '2', '1');
INSERT INTO `womdee_category` VALUES ('2655', '2652', ' ', '3', '1');
INSERT INTO `womdee_category` VALUES ('2656', '2652', ' ', '4', '1');
INSERT INTO `womdee_category` VALUES ('2657', '2652', ' ', '5', '1');
INSERT INTO `womdee_category` VALUES ('2658', '2641', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2659', '2641', ' ', '4', '1');
INSERT INTO `womdee_category` VALUES ('2660', '2641', ' ', '5', '1');
INSERT INTO `womdee_category` VALUES ('2661', '2658', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2662', '2646', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2663', '2647', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2664', '2659', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2665', '2660', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2666', '2650', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2667', '2651', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2668', '2653', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2669', '2654', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2670', '2655', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2671', '2656', ' ', '1', '1');
INSERT INTO `womdee_category` VALUES ('2672', '2657', ' ', '1', '1');

-- ----------------------------
-- Table structure for womdee_category_details
-- ----------------------------
DROP TABLE IF EXISTS `womdee_category_details`;
CREATE TABLE `womdee_category_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(5) DEFAULT '0' COMMENT '分类ID',
  `category_title` varchar(100) DEFAULT NULL COMMENT '分类名称',
  `category_language` varchar(2) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_category_details
-- ----------------------------
INSERT INTO `womdee_category_details` VALUES ('1', '2639', '女装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('2', '2639', 'Women&#039;s Clothing', 'en');
INSERT INTO `womdee_category_details` VALUES ('3', '2641', '连衣裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('4', '2641', 'Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('5', '2658', '日常裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('6', '2658', 'Casual Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('7', '2661', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('8', '2646', '职场裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('9', '2646', 'Formal Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('10', '2662', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('11', '2647', '婚礼派对礼服', 'cn');
INSERT INTO `womdee_category_details` VALUES ('12', '2647', 'Wedding Party Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('13', '2663', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('14', '2659', '商务裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('15', '2664', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('16', '2664', 'All-occasion Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('17', '2660', '鸡尾酒会裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('18', '2660', 'Cocktail Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('19', '2665', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('20', '2650', '俱乐部裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('21', '2666', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('22', '2666', 'All-occasion Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('23', '2651', '舞会裙装', 'cn');
INSERT INTO `womdee_category_details` VALUES ('24', '2667', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('25', '2667', 'All-occasion Dress', 'en');
INSERT INTO `womdee_category_details` VALUES ('26', '2652', '半裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('27', '2652', 'Skirt', 'en');
INSERT INTO `womdee_category_details` VALUES ('28', '2653', 'A半裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('29', '2668', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('30', '2668', 'All-occasion Skirt', 'en');
INSERT INTO `womdee_category_details` VALUES ('31', '2654', '直筒半裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('32', '2669', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('33', '2669', 'All-occasion Skirt', 'en');
INSERT INTO `womdee_category_details` VALUES ('34', '2655', '百褶半裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('35', '2670', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('36', '2670', 'All-occasion Skirt', 'en');
INSERT INTO `womdee_category_details` VALUES ('37', '2656', '大摆裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('38', '2671', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('39', '2671', 'All-occasion Skirt', 'en');
INSERT INTO `womdee_category_details` VALUES ('40', '2657', '鱼尾半裙', 'cn');
INSERT INTO `womdee_category_details` VALUES ('41', '2672', '通用', 'cn');
INSERT INTO `womdee_category_details` VALUES ('42', '2672', 'All-occasion Skirt', 'en');

-- ----------------------------
-- Table structure for womdee_contact_us_content
-- ----------------------------
DROP TABLE IF EXISTS `womdee_contact_us_content`;
CREATE TABLE `womdee_contact_us_content` (
  `cact_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `cact_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1普通咨询 2产品咨询',
  `cact_name` varchar(128) NOT NULL DEFAULT '' COMMENT '姓名',
  `cact_company` varchar(100) NOT NULL DEFAULT '' COMMENT '公司',
  `cact_website_url` varchar(100) NOT NULL DEFAULT '' COMMENT '网址',
  `cact_email_address` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `cact_product_interest` varchar(100) NOT NULL DEFAULT '' COMMENT '产品',
  `cact_comments` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `cact_userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户',
  `cact_country` varchar(100) NOT NULL DEFAULT '' COMMENT '国家',
  `cact_hearme_reason` varchar(100) NOT NULL DEFAULT '' COMMENT '知道本公司的原因',
  `cact_time` datetime DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`cact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='联系我们内容表';

-- ----------------------------
-- Records of womdee_contact_us_content
-- ----------------------------
INSERT INTO `womdee_contact_us_content` VALUES ('1', '1', 'aaa', 'a', 'a', '', 'a&quot;dds&quot;ssa&quot;&gt;)', 'aa', '0', '', '', '2016-01-25 09:25:57');
INSERT INTO `womdee_contact_us_content` VALUES ('2', '1', 'sdfdsaf', 'asdfdsa', 'dd', 'dd', 'dd', 'sads', '0', '', '', '2016-01-27 19:32:26');
INSERT INTO `womdee_contact_us_content` VALUES ('3', '2', 'aa', '', 'dd', 'ff', 'dsfds', 'sdfsad', '0', '', 'dd', '2016-01-27 19:32:49');

-- ----------------------------
-- Table structure for womdee_country
-- ----------------------------
DROP TABLE IF EXISTS `womdee_country`;
CREATE TABLE `womdee_country` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `country_code` varchar(60) NOT NULL DEFAULT '' COMMENT '国家代号',
  `country_en` varchar(100) NOT NULL DEFAULT '' COMMENT '英文',
  `country_cn` varchar(100) NOT NULL DEFAULT '' COMMENT '中文',
  `country_de` varchar(100) NOT NULL DEFAULT '' COMMENT '德文',
  `country_jp` varchar(100) NOT NULL DEFAULT '' COMMENT '日本',
  `country_fr` varchar(100) NOT NULL DEFAULT '' COMMENT '法文',
  `country_es` varchar(100) NOT NULL DEFAULT '' COMMENT '西班牙',
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_code` (`country_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='国家表';

-- ----------------------------
-- Records of womdee_country
-- ----------------------------
INSERT INTO `womdee_country` VALUES ('1', 'UK', 'United Kingdom', '英国', '', '', '', '');
INSERT INTO `womdee_country` VALUES ('2', 'RU', 'Russia', '', '', '', '', '');
INSERT INTO `womdee_country` VALUES ('3', 'DE', 'Germany', '', '', '', '', '');
INSERT INTO `womdee_country` VALUES ('4', 'CN', 'China', '', '', '', '', '');

-- ----------------------------
-- Table structure for womdee_faq
-- ----------------------------
DROP TABLE IF EXISTS `womdee_faq`;
CREATE TABLE `womdee_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(255) DEFAULT NULL,
  `answer_content` varchar(5000) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `is_show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_faq
-- ----------------------------
INSERT INTO `womdee_faq` VALUES ('1', 'What kind of wall charger should I use to charge the Astro E6 20800mAh external battery?', 'You can safely recharge your Astro in 10-12 hours using a 2 amp or higher output charger. Lower output chargers (such as phone chargers) will not charge as quickly or safely', '1', 'en', '1');

-- ----------------------------
-- Table structure for womdee_help_center
-- ----------------------------
DROP TABLE IF EXISTS `womdee_help_center`;
CREATE TABLE `womdee_help_center` (
  `center_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `center_type` varchar(60) DEFAULT '' COMMENT '类型',
  `center_title` varchar(128) DEFAULT '' COMMENT '标题',
  `center_content` text COMMENT '内容',
  `center_language` varchar(2) DEFAULT NULL COMMENT '语言',
  `center_time` datetime DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`center_id`),
  KEY `index_center_type` (`center_type`) USING BTREE,
  KEY `index_center_language` (`center_language`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='帮助中心表';

-- ----------------------------
-- Records of womdee_help_center
-- ----------------------------
INSERT INTO `womdee_help_center` VALUES ('1', 'about_us', 'Who We Are ', '<p> At Anker, we can\'t exactly help you unwind, but we can make your tech gear that much easier to enjoy â€” and we do this with passion. Say goodbye to first world tech woes like oppressive low batteries and limited ports. Say hello to an easier, smarter life.</p>\r\n            <br />\r\n\r\n            <p>Founded by a group of spirited Googlers, Anker is a multinational team of techies. But don\'t let that fool you â€” we\'re customers too. We like to approach every detail from a user\'s perspective to improve our technology, raise the bar, and make life easier. That means starting with affordable, high-quality gear and ending with 100% user satisfaction â€” period. Our worry-free guarantee ensures you get quick, no-hassle service when you need it.\r\n            </p>\r\n            <br />\r\n\r\n            <p>Such top-down excellence hasn\'t gone unnoticed. The Anker Astro external battery has been voted #1 in class by thousands of online reviewers, praised by tech bloggers, and featured on ABC, while our renowned customer service has made us a fan-favorite across the web. So simplify your smart life â€” leave the details to us.</p>', 'cn', '2016-01-26 14:22:15');
INSERT INTO `womdee_help_center` VALUES ('2', 'buiness', 'Wholesale Womdee', ' Whether you\'re interested in selling our products as a distributor or just looking to make a single bulk order, we\'re thrilled about your interest in our products and look forward to helping you find a solution.\r\n<br>\r\n<br>\r\n<a class=\"business_form_btn\">Fill out the online form</a>\r\nto submit your information directly.\r\n<br>\r\n<br>', 'cn', '2016-01-26 14:23:25');
INSERT INTO `womdee_help_center` VALUES ('3', 'contact_us', 'Contact Us', '<dl class=\"wablock\">\r\n                        <dt>Customer Service - We\'re here to help.</dt>\r\n                        <dd>We look forward to responding to your inquiry within 24 hours.</dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Call us</strong>\r\n                            <p class=\"spspan\">\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>United States</span><span>  1-800-988-7973</span><span class=\"long\"> Mon - Fri 9:00AM - 5:00PM PST</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>Japan  </span><span> 03-4455-7823 </span>   <span class=\"long\"> Mon - Fri 9:00-17:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>Germany </span> <span> 069-9579-7960</span>  <span class=\"long\"> Mon - Fri 6:00-11:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>United Kingdom</span> <span>01604-936200</span>  <span class=\"long\">Mon - Fri 6:00-11:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>China</span> <span> 400-0550-036 </span>   <span class=\"long\"> Mon - Fri 9:00-17:30</span>\r\n                            </p>\r\n                        </dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email us</strong>\r\n                            <p class=\"spspan\"><a href=\"mailto:contactus@wondee.com \">contactus@wondee.com </a></p><br>\r\n                        </dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Need to return a product? </strong>\r\n                            <p class=\"spspan\">Visit our <a href=\"/support\">Support</a> page for product and return information.</p>\r\n                        </dd>\r\n                    </dl>', 'cn', '2016-01-26 16:49:05');
INSERT INTO `womdee_help_center` VALUES ('4', 'contact_us', 'Contact Us', '<dl class=\"wablock\">\r\n                        <dt>Customer Service - We\'re here to help.</dt>\r\n                        <dd>We look forward to responding to your inquiry within 24 hours.</dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Call us</strong>\r\n                            <p class=\"spspan\">\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>United States</span><span>  1-800-988-7973</span><span class=\"long\"> Mon - Fri 9:00AM - 5:00PM PST</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>Japan  </span><span> 03-4455-7823 </span>   <span class=\"long\"> Mon - Fri 9:00-17:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>Germany </span> <span> 069-9579-7960</span>  <span class=\"long\"> Mon - Fri 6:00-11:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>United Kingdom</span> <span>01604-936200</span>  <span class=\"long\">Mon - Fri 6:00-11:00</span>\r\n                            </p>\r\n                            <p class=\"spspan\">\r\n                                <span>China</span> <span> 400-0550-036 </span>   <span class=\"long\"> Mon - Fri 9:00-17:30</span>\r\n                            </p>\r\n                        </dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email us</strong>\r\n                            <p class=\"spspan\"><a href=\"mailto:contactus@wondee.com \">contactus@wondee.com </a></p><br>\r\n                        </dd>\r\n                        <dd>\r\n                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Need to return a product? </strong>\r\n                            <p class=\"spspan\">Visit our <a href=\"/support\">Support</a> page for product and return information.</p>\r\n                        </dd>\r\n                    </dl>', 'en', '2016-01-26 16:49:05');
INSERT INTO `womdee_help_center` VALUES ('5', 'about_us', 'Who We Are ', '<p> At Womdee, we can\'t exactly help you unwind, but we can make your tech gear that much easier to enjoy â€” and we do this with passion. Say goodbye to first world tech woes like oppressive low batteries and limited ports. Say hello to an easier, smarter life.</p>\r\n            <br />\r\n\r\n            <p>Founded by a group of spirited Googlers, Womdee is a multinational team of techies. But don\'t let that fool you â€” we\'re customers too. We like to approach every detail from a user\'s perspective to improve our technology, raise the bar, and make life easier. That means starting with affordable, high-quality gear and ending with 100% user satisfaction â€” period. Our worry-free guarantee ensures you get quick, no-hassle service when you need it.\r\n            </p>\r\n            <br />\r\n\r\n            <p>Such top-down excellence hasn\'t gone unnoticed. The Womdee Astro external battery has been voted #1 in class by thousands of online reviewers, praised by tech bloggers, and featured on ABC, while our renowned customer service has made us a fan-favorite across the web. So simplify your smart life â€” leave the details to us.</p>', 'en', '2016-01-26 16:49:05');
INSERT INTO `womdee_help_center` VALUES ('6', 'buiness', 'Wholesale Womdee', ' Whether you\'re interested in selling our products as a distributor or just looking to make a single bulk order, we\'re thrilled about your interest in our products and look forward to helping you find a solution.\r\n<br>\r\n<br>\r\n<a class=\"business_form_btn\">Fill out the online form</a>\r\nto submit your information directly.\r\n<br>\r\n<br>', 'en', '2016-01-26 16:49:05');

-- ----------------------------
-- Table structure for womdee_listings
-- ----------------------------
DROP TABLE IF EXISTS `womdee_listings`;
CREATE TABLE `womdee_listings` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'item id',
  `category_id` int(11) DEFAULT NULL,
  `item_code` varchar(64) DEFAULT NULL COMMENT 'ASIN',
  `item_status` int(1) NOT NULL DEFAULT '1' COMMENT '状态，1-正常，0-下架',
  `item_sites` varchar(500) DEFAULT NULL COMMENT '刊登站点，序列化站点id',
  `sku_common_images` text COMMENT '序列化的listing公用的图片地址',
  `sell_num` int(11) NOT NULL DEFAULT '0' COMMENT '销售数量',
  PRIMARY KEY (`item_id`),
  KEY `item_code` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_listings
-- ----------------------------
INSERT INTO `womdee_listings` VALUES ('1', '2661', 'W0AG-001', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5377-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0AG-001-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('2', '2661', 'W0AG-005', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5445-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0AG-005-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('3', '2661', 'W0AG-006', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5417-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0AG-006-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('4', '2662', 'W0BG-001', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5494-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0BG-001-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('5', '2663', 'W0CG-002', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5424-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0CG-002-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('6', '2665', 'W0EG-002', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5433-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0EG-002-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('7', '2665', 'W0EG-004', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5408-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0EG-004-size.jpg\";}', '0');
INSERT INTO `womdee_listings` VALUES ('8', '2665', 'W0EG-005', '1', '', 'a:2:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5499-1.jpg\";i:1;s:46:\"http://www.niceeshop.com/new/W0EG-005-size.jpg\";}', '0');

-- ----------------------------
-- Table structure for womdee_listings_baseinfo
-- ----------------------------
DROP TABLE IF EXISTS `womdee_listings_baseinfo`;
CREATE TABLE `womdee_listings_baseinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) DEFAULT NULL,
  `item_title` varchar(2000) DEFAULT NULL COMMENT 'item title',
  `item_short_description` text COMMENT 'list简述',
  `item_description` text COMMENT '描述',
  `item_language` varchar(2) DEFAULT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  KEY `index_item_id` (`item_id`),
  KEY `index_item_language` (`item_language`),
  KEY `item_id` (`item_id`,`item_language`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_listings_baseinfo
-- ----------------------------
INSERT INTO `womdee_listings_baseinfo` VALUES ('1', '1', 'Damen Modern U Ausschnitt Langarm Strick Freizeit Kleid', 'Baumwollstrick+Chiffon<br>Waschen: Herkömmliche Wasch<br>Jahreszeit:Frühling und Herbst<br>Gewebe Art:Mittlere Elastizität<br>Für tägliches Leben<br>', 'Damen Modern Rund Ausschnitt Langarm Strick Freizeit Kleid<br><br>Das Material ist weich,dehnbar und atmungsaktiv.<br><br>Der Kleid ist kurz und es ist besser mit ein Legging zu tragen.<br><br>Waschen Sie den Kleid nicht mit Wasser von hoher Temperatur.<br><br><br><br>Größentabelle (in Zoll)<br><br>Internationale Größe---Brustumfang---Tailleumfang---Länge<br><br>S--------------------------31.5-------------29.1-------------28.3<br><br>M--------------------------33.1-------------30---------------28.7<br><br>L---------------------------34.7-------------30.7-------------29.1<br><br>XL-------------------------36.2-------------31.5-------------29.5', 'de');
INSERT INTO `womdee_listings_baseinfo` VALUES ('2', '1', 'Womens Fashion Sweater Knitted Scoop Neck Long Sleeve Casual Dress', 'Material:Knitted cotton+Chiffon<br>Scoop neck, long sleeve, basic dress<br>Slim style, irregular trim design with back chiffon splice<br>Perfect for wearing with leggings or shorts<br>Hand wash carefully<br>', 'Womens Elegant Knitted Scoop Neck Long Sleeve Casual Dress.<br><br>Made of chiffon and knit cotton, soft hand feel and good breathability, comfortable to wear.<br><br>It featuring knitted, scoop neck, long sleeve, irregular chiffon splice trim, casual dress.<br><br>Moderate thickness, suitable for different seasons, such as spring (match with the small coat) and autumn(match with a sexy leggings).<br><br>Perfect for wearing with leggings or shorts.<br><br><br><br>Size Chart(in inches)<br><br>International Size---Bust Girth---Waist Girth---Length<br><br>S---------------------------31.5----------29.1-----------28.3<br><br>M---------------------------33.1-----------30------------28.7<br><br>L----------------------------34.7----------30.7----------29.1<br><br>XL--------------------------36.2-----------31.5---------29.5', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('3', '2', 'Women Classic Fitted Bodycon Scoop Neck Sleeveless Work Casual Midi Dress', 'Material:Cotton<br>Scoop Neck, Sleeveless, Zipper on the Side<br>Oversized, Slim Bodycon, Above Knees, Casual Dress<br>Suit for daily wear, business, cocktail and club<br>Hand wash carefully<br>', 'Women Oversized Bodycon Scoop Neck Sleeveless Pencil Casual Dress.<br><br>Made of cotton, soft hand feel and good breathability, comfortable to wear.<br><br>Featuring oversized, slim bodycon, scoop neck, sleeveless, pencil casual dress.<br><br>Suit for daily wear, business, cocktail and club.<br><br><br><br>Size Chart(in inches)<br><br>International Size---------Bust Girth----------Length<br><br>M--------------------------------37-------------------43.3<br><br>L--------------------------------38.6------------------43.3<br><br>XL------------------------------40.2------------------43.3<br><br>2XL----------------------------41.7------------------43.3<br><br><br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('4', '4', 'Women Formal Houndstooth-Print 2/3 Sleeve Scoop Neck Business Pencil Dress', 'Material:Cotton blend<br>2/3 Sleeve, Scoop Neck, Above Knees<br>Houndstooth-Print, Zippers on the Front, Slim Style<br>Suit for Business Occasion, Evening Party, Prom and Wedding<br>Hand wash, Low Temperature for Washing<br>', 'Women Formal Houndstooth-Print 2/3 Sleeve Scoop Neck Business Pencil Dress.<br><br>Made of cotton blend, soft hand feel and good breathability, comfortable to wear.<br><br>Featuring zippers on the front, houndstooth-print, 2/3 sleeve, scoop neck, business pencil dress.<br><br>Suit for Business Occasion, Evening Party, Prom and Wedding.<br><br><br><br>Size Chart(in inches)<br><br>International Size---Bust Girth---Hip---Shoulder---Length<br><br>S----------------------32--------33.5-------14.2--------38.2<br><br>M---------------------34---------35.8-------14.5-------38.2<br><br>L---------------------36---------37.8--------15----------39<br><br>XL-------------------38---------39.4-------15.4--------39<br><br><br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('5', '4', 'Damen Formal Hahnentrittmuster 2/3 Ärmel Knielang Business Bleistift Kleid', 'Baumwollmischung<br>2/3 Ärmel, U-Ausschnitt, oberhalb der Knie<br>Hahnentrittmuster, vorne Reissverschluss<br>Gut für für Geschäfts Anlässe, Abend-Party, Abschlussball und Hochzeit<br>Handwäsche , niedrige Temperatur für Wasch<br>', 'Damen Formal Hahnentrittmuster 2/3 Ärmel Knielang Business Bleistift Kleid.<br><br>Der Kleid wird aus Baumwollmischung gemacht, weich und atmungsaktiv.<br><br>In dem Kleid können Sie Ihre perfekte Figur zeigen.<br><br><br><br>Größentabelle (in inch)<br><br>Internationale Größe ---Brustumfang ---Hüfte --- Schulter --- Länge<br><br>S---------------------------32----------------33.5-------14.2--------38.2<br><br>M---------------------------34----------------35.8-------14.5-------38.2<br><br>L----------------------------36----------------37.8-------15----------39<br><br>XL--------------------------38----------------39.4-------15.4--------39', 'de');
INSERT INTO `womdee_listings_baseinfo` VALUES ('6', '5', 'Damen V Ausschnitt Langarm Abend Maxi Kleid mit Gürtel', 'Baumwoll + Elasthan<br> Handwäsche<br>Dicke: mittel<br>Tief V Ausschnitt Design<br>Jahreszeit:Frühling, Herbst und Sommer<br>', 'Damen V Ausschnitt Langarm Abend Maxi Kleid mit Gürtel<br><br>Das Material ist weich und komfortabel zu tragen.<br><br>Gut für Party,Hochzeit und auch Tanzabend.<br><br><br><br>Größentabelle(in inches)<br><br>Internationale Größe---Brustumfang---Ärmel Länge---Länge<br><br>M--------------------------37---------------23.2-------------59<br><br>L--------------------------38.6-------------23.2-------------59.4<br><br>XL------------------------40.2-------------23.2-------------59.8<br><br>2XL----------------------41.7-------------23.2-------------60.2<br><br>', 'de');
INSERT INTO `womdee_listings_baseinfo` VALUES ('7', '5', 'Women Deep V-neck Long Sleeve Maxi Bridesmaid Evening Dress with Belt', 'Ingredient:Cotton+Spandex<br>Deep V-neck, Long Sleeve, Maxi Dress<br>Oversized, Irregular Swing, Evening Dress<br>Suitable for party, evening, cocktail, prom and wedding<br>Hand wash carefully<br>', 'Women Oversized Swing Deep V-neck Long Sleeve Maxi Evening Dress with Belt.<br><br>Made of cotton and spandex, soft hand feel and good breathability, comfortable to wear.<br><br>Featuring oversized, elegant, irregular swing, deep V-neck, long sleeve, maxi evening dress with belt.<br><br>Suitable for party, evening, cocktail, prom and wedding.<br><br><br><br>Size Chart(in inches)<br><br>International Size----Bust Girth----Sleeve Length---Length<br><br>M---------------------------37-------------------23.2---------59<br><br>L--------------------------38.6------------------23.2--------59.4<br><br>XL------------------------40.2------------------23.2--------59.8<br><br>2XL----------------------41.7------------------23.2--------60.2<br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('8', '6', 'Women Elegant Swing Deep V-neck Sleeveless Maxi Evening Cocktail Dress', 'Ingredient:Polyester+Spandex<br>Deep V-neck, Sleeveless, Maxi Swing Dress<br>Elegant Evening Design, Many Kind of Wearing<br>Suitable for party, evening, cocktail, prom and wedding<br>Hand wash, Low Temperature for Washing<br>', 'Women Elegant Swing Deep V-neck Sleeveless Maxi Evening Dress.<br><br>Made of polyester and spandex, soft hand feel and good breathability, comfortable to wear.<br><br>Featuring elegant, deep V-neck, sleeveless, maxi swing, evening dress.<br><br>Many kind of wearing; Suitable for party, evening, cocktail, prom and wedding.<br><br><br><br>Size Chart(in inches)<br><br>International Size---Waist Girth---Length---Shoulder Straps<br><br>M-----------------------18.1~31.5-----41.3-------------78.7<br><br>L-------------------------20~35.4-------41.3-------------78.7<br><br>XL-----------------------22~39.4-------41.3-------------78.7<br><br>2XL---------------------24~45.3-------41.3-------------78.7<br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('9', '6', 'Damen Elegant V Ausschnitt Ärmellos Maxi Kleid', 'Polyester + Elastan<br>Ärmellos, V Ausschnitt maxi Kleid<br>Mehre Stil zu tragen<br>Gut für Party, Tanzabend und Hochzeit<br>Handwäsche sorgfältig<br>', 'Damen Elegant V Ausschnitt Ärmellos Maxi Kleid.<br><br>Der Kleid wird aus Polyester und Elastan gemacht, weich und atmungsaktiv.<br><br>Der Kleid ist gut für Party, Tanzabend und Hochzeit.<br><br><br><br>Größentabelle (in inch)<br><br>Internationale Größe---Taillenumfang---Länge---Schulter Träger<br><br>M--------------------------18.1~31.5-------41.3------78.7<br><br>L---------------------------20~35.4---------41.3------78.7<br><br>XL-------------------------22~39.4---------41.3------78.7<br><br>2XL-----------------------24~45.3---------41.3-------78.7<br><br>', 'de');
INSERT INTO `womdee_listings_baseinfo` VALUES ('10', '7', 'Women Vintage Floral Lace Square Neck Half Sleeve Fitted Bridesmaid Midi Dress', 'Material:Lace+Polyester<br>Square Neck, Half Sleeve, See-through, Slim Cutting<br>Floral Lace, Vintage Bodycon Midi Design, Bridesmaid Dress<br>Suitable for party, evening, cocktail, prom and wedding<br>Hand wash carefully<br>', 'Women Floral Lace Square Neck Half Sleeve Bodycon Bridesmaid Midi Dress.<br><br>Made of lace and polyester, soft hand feel and good breathability, comfortable to wear.<br><br>Featuring floral lace, square neck, half sleeve, bodycon, bridesmaid midi dress.<br><br>Suitable for party, evening, cocktail, prom and wedding.<br><br><br><br>Size Chart(in inches)<br><br>International Size---Bust Girth---Waist Girth---Hip---Length<br><br>M------------------------33.9--------------26.8-------37.4----37<br><br>L------------------------35.8---------------28.3--------39----37.4<br><br>XL----------------------37.8---------------29.9------40.1----37.8<br><br>2XL--------------------39.8---------------31.5------42.1----38.6<br><br><br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('11', '7', 'Damen Spitze Halbe Hülsen Bodycon Midi Kleid', 'Spitze+Polyester<br>Halbe Hülsen, slim fit<br>Vintage Bodycon midi Design<br>Gut für Party, Tanzabend und Hochzeit<br>Handwäsche sorgfältig<br>', 'Damen Spitze Halbe Hülsen Bodycon Midi Kleid.<br><br>Der Kleid wird aus Polyester und Spitze gemacht, weich und atmungsaktiv.<br><br>In dem Kleid können Sie Ihre perfekte Figur zeigen.<br><br><br><br>Größentabelle (in inch)<br><br>Internationale Größe---Brustumfang---Taillenumfang---Hüfte--Länge<br><br>M--------------------------3.9---------------26.8-------------37.4----37<br><br>L---------------------------35.8-------------28.3-------------39------37.4<br><br>XL-------------------------37.8-------------29.9-------------40.1----37.8<br><br>2XL-----------------------39.8-------------31.5-------------42.1----38.6', 'de');
INSERT INTO `womdee_listings_baseinfo` VALUES ('12', '8', 'Women Vintage Floral Lace Half Sleeve Scoop Neck Slim Party Cocktail Dress', 'Material:Blended+Lace<br>Half Sleeve, Scoop Neck, Irregular Hem<br>Vintage Style, Floral Lace, Above Knees, Slim Party Dress<br>Suit for Evening, Party,Prom and Wedding<br>Hand wash carefully<br>', 'Women Vintage Floral Lace Half Sleeve Scoop Neck Slim Party Dress.<br><br>Made of blended and lace, good hand feel and good breathability, comfortable to wear.<br><br>Featuring vintage style, floral lace, half sleeve, scoop neck, slim fitted, party dress.<br><br>Suit for Evening, Party, Prom and Wedding.<br><br><br><br>Size Chart(in inches)<br><br>International Size---Bust Girth---Hip---Shoulder---Length<br><br>S--------------------31.9---------33.5-------14.6--------37<br><br>M-------------------33.9---------35.4--------15---------37<br><br>L-------------------35.8---------37.4--------15.4-------37.8<br><br>XL-----------------37.8---------39.4-------15.7--------37.8<br><br>2XL---------------39.8---------41.3-------16.1--------37.8<br><br><br><br><br><br>', 'en');
INSERT INTO `womdee_listings_baseinfo` VALUES ('13', '8', 'Damen Vintage Spitze Halbe Hülsen Rund Ausschnitt Slim Party Kleid', 'Mischung+Spitze<br>Halbe Hülsen, rund Ausschnitt, unregelmäßige Rand<br>Vintage Stil, über Knie, Bodycon Kleid<br>Gut für Party, Tanzabend und Hochzeit<br>Handwäsche sorgfältig<br>', 'Damen Vintage Spitze Halbe Hülsen Rund Ausschnitt Slim Party Kleid.<br><br>Der Kleid wird aus Mischung und Spitze gemacht, weich und atmungsaktiv.<br><br>In dem Kleid können Sie Ihre perfekte Figur zeigen.<br><br><br><br>Größentabelle (in inch)<br><br>Internationale Größe ---Brustumfang ---Hüfte --- Schulter --- Länge<br><br>S---------------------------31.9--------------33.5-----14.6----------37<br><br>M---------------------------33.9--------------35.4-----15------------37<br><br>L---------------------------35.8--------------37.4------15.4---------37.8<br><br>XL-------------------------37.8--------------39.4------15.7---------37.8<br><br>2XL-----------------------39.8--------------41.3-------16.1---------37.8', 'de');

-- ----------------------------
-- Table structure for womdee_listings_detail
-- ----------------------------
DROP TABLE IF EXISTS `womdee_listings_detail`;
CREATE TABLE `womdee_listings_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `asin` varchar(32) DEFAULT NULL COMMENT 'asin码',
  `sku` varchar(64) DEFAULT NULL COMMENT 'sku',
  `sku_attribute_arrays` text COMMENT '属性详情,序列化的属性id',
  `sku_images` text COMMENT '图片组,序列化的图片地址',
  `sku_stock` int(11) DEFAULT NULL COMMENT 'sku库存',
  `sku_status` int(2) DEFAULT '1' COMMENT '状态，1-正常，0-下架',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`,`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_listings_detail
-- ----------------------------
INSERT INTO `womdee_listings_detail` VALUES ('1', '1', 'B01A5H3WJS', 'B6-5377', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:9:\"Dark grey\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Dunkelgrau\";s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5377-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5377-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5377-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5377-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('2', '1', 'B01A5H3XTM', 'B6-5379', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:9:\"Dark grey\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Dunkelgrau\";s:7:\"Größe\";s:1:\"M\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5379-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5379-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5379-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5379-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('3', '1', 'B01A5H3Z0O', 'B6-5378', 'a:2:{s:2:\"en\";a:1:{s:4:\"Size\";s:1:\"S\";}s:2:\"de\";a:1:{s:7:\"Größe\";s:1:\"S\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5378-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5378-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5378-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5378-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('4', '1', 'B01A5H3VEY', 'B6-5380', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:9:\"Dark grey\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Dunkelgrau\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5380-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5380-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5380-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5380-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('5', '2', 'B01C2LCZZW', 'B6-5445', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:1:{s:7:\"Größe\";s:3:\"2XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5445-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5445-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5445-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5445-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('6', '2', 'B01C2LD1I2', 'B6-5443', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:1:{s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5443-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5443-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5443-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5443-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('7', '2', 'B01C2LD2RM', 'B6-5442', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:1:{s:7:\"Größe\";s:1:\"M\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5442-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5442-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5442-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5442-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('8', '2', 'B01C2LD4DY', 'B6-5444', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:1:{s:7:\"Größe\";s:2:\"XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5444-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5444-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5444-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5444-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('9', '3', 'B01ANPC6BM', 'B6-5417', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:17:\"Yellow&amp;Floral\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Gelb Blume\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:8:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5417-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5417-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5417-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5417-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5417-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5417-6.jpg\";i:6;s:42:\"http://www.niceeshop.com/new/B6-5417-7.jpg\";i:7;s:42:\"http://www.niceeshop.com/new/B6-5417-8.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('10', '3', 'B01ANPC716', 'B6-5404', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:17:\"Yellow&amp;Floral\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Gelb Blume\";s:7:\"Größe\";s:1:\"L\";}}', 'a:8:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5404-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5404-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5404-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5404-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5404-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5404-6.jpg\";i:6;s:42:\"http://www.niceeshop.com/new/B6-5404-7.jpg\";i:7;s:42:\"http://www.niceeshop.com/new/B6-5404-8.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('11', '3', 'B01ANPC7ZW', 'B6-5416', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:17:\"Yellow&amp;Floral\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:10:\"Gelb Blume\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:8:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5416-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5416-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5416-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5416-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5416-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5416-6.jpg\";i:6;s:42:\"http://www.niceeshop.com/new/B6-5416-7.jpg\";i:7;s:42:\"http://www.niceeshop.com/new/B6-5416-8.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('12', '4', 'B01AWFG7OU', 'B6-5494', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5494-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5494-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5494-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5494-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('13', '4', 'B01AWFG8Q2', 'B6-5493', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:1:\"M\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5493-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5493-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5493-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5493-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('14', '4', 'B01BZXQPKO', 'B8-0203', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:1:\"S\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:1:\"S\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B8-0203-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B8-0203-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B8-0203-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B8-0203-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('15', '4', 'B01AWFG9U2', 'B6-5495', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5495-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5495-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5495-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5495-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('16', '5', 'B01ANPC996', 'B6-5424', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:5:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5424-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5424-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5424-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5424-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5424-5.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('17', '5', 'B01ANPCA0E', 'B6-5422', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:1:\"L\";}}', 'a:5:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5422-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5422-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5422-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5422-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5422-5.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('18', '5', 'B01ANPCAZO', 'B6-5421', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:1:\"M\";}}', 'a:5:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5421-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5421-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5421-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5421-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5421-5.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('19', '5', 'B01ANPCBR6', 'B6-5423', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:5:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5423-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5423-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5423-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5423-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5423-5.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('20', '6', 'B01ANPCI4M', 'B6-5433', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5433-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5433-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5433-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('21', '6', 'B01C2LD8KI', 'B6-5437', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5437-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5437-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5437-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('22', '6', 'B01C2LDA8S', 'B6-5431', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:41:\"http://www.niceeshop.com/new/B6-5431-.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5431-1.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5431-2.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5431-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('23', '6', 'B01C2LDCC2', 'B6-5435', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:1:\"L\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5435-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5435-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5435-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('24', '6', 'B01C2LDE1Q', 'B6-5430', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:1:\"M\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5430-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5430-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5430-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('25', '6', 'B01ANPC7CA', 'B6-5434', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:1:\"M\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5434-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5434-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5434-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('26', '6', 'B01C2LCYXU', 'B6-5432', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:4:\"Blue\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:4:\"Blau\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5432-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5432-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5432-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('27', '6', 'B01C2LD0V0', 'B6-5436', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Black\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:7:\"Schwarz\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:3:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5436-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5436-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5436-3.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('28', '7', 'B01C2B9XGQ', 'B6-5408', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5408-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5408-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5408-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5408-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('29', '7', 'B01C2B9YXS', 'B6-5412', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Beige\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:5:\"Beige\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5412-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5412-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5412-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5412-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('30', '7', 'B01C2BA0AO', 'B6-5405', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5405-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5405-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5405-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5405-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('31', '7', 'B01C2BA1JY', 'B6-5410', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Beige\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:5:\"Beige\";s:7:\"Größe\";s:1:\"L\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5410-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5410-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5410-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5410-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('32', '7', 'B01C2BA2VQ', 'B6-5406', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:1:\"M\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5406-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5406-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5406-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5406-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('33', '7', 'B01C2BA4TQ', 'B6-5409', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Beige\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:5:\"Beige\";s:7:\"Größe\";s:1:\"M\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5409-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5409-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5409-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5409-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('34', '7', 'B01C2BA61M', 'B6-5407', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5407-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5407-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5407-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5407-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('35', '7', 'B01C2BA7I4', 'B6-5411', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:5:\"Beige\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:5:\"Beige\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:4:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5411-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5411-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5411-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5411-4.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('36', '8', 'B01A5H3XDI', 'B6-5499', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:3:\"2XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:3:\"2XL\";}}', 'a:6:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5499-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5499-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5499-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5499-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5499-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5499-6.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('37', '8', 'B01AWBKYKM', 'B6-5497', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:1:\"L\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:1:\"L\";}}', 'a:6:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5497-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5497-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5497-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5497-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5497-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5497-6.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('38', '8', 'B01AWBKX8K', 'B6-5496', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:1:\"M\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:1:\"M\";}}', 'a:6:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5496-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5496-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5496-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5496-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5496-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5496-6.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('39', '8', 'B01AWBKYYI', 'B6-5500', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:1:\"S\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:1:\"S\";}}', 'a:6:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5500-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5500-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5500-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5500-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5500-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5500-6.jpg\";}', '0', '1');
INSERT INTO `womdee_listings_detail` VALUES ('40', '8', 'B01AWBL0C8', 'B6-5498', 'a:2:{s:2:\"en\";a:2:{s:5:\"Color\";s:3:\"Red\";s:4:\"Size\";s:2:\"XL\";}s:2:\"de\";a:2:{s:5:\"Farbe\";s:3:\"Rot\";s:7:\"Größe\";s:2:\"XL\";}}', 'a:6:{i:0;s:42:\"http://www.niceeshop.com/new/B6-5498-1.jpg\";i:1;s:42:\"http://www.niceeshop.com/new/B6-5498-2.jpg\";i:2;s:42:\"http://www.niceeshop.com/new/B6-5498-3.jpg\";i:3;s:42:\"http://www.niceeshop.com/new/B6-5498-4.jpg\";i:4;s:42:\"http://www.niceeshop.com/new/B6-5498-5.jpg\";i:5;s:42:\"http://www.niceeshop.com/new/B6-5498-6.jpg\";}', '0', '1');

-- ----------------------------
-- Table structure for womdee_reviews
-- ----------------------------
DROP TABLE IF EXISTS `womdee_reviews`;
CREATE TABLE `womdee_reviews` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `type` int(1) DEFAULT '1' COMMENT '1来自网站，2来自AMZ',
  `amz_review_id` varchar(200) DEFAULT NULL,
  `review_title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
  `review_content` text COMMENT '评论内容',
  `review_item_id` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的产品ID',
  `review_asin` varchar(32) DEFAULT NULL COMMENT 'asin码',
  `review_site` varchar(8) DEFAULT NULL COMMENT '站点',
  `review_create_time` datetime DEFAULT NULL COMMENT '评论时间',
  `review_create_userid` int(11) NOT NULL DEFAULT '0' COMMENT '评论人ID',
  `review_create_username` varchar(64) DEFAULT NULL COMMENT '评论人用户名',
  `review_language` varchar(2) DEFAULT NULL COMMENT '语言',
  `review_show` int(1) DEFAULT '1',
  `review_rate` int(1) DEFAULT '5' COMMENT '星级，1，2，3，4，5',
  PRIMARY KEY (`review_id`),
  KEY `i_item_id` (`review_item_id`),
  KEY `i_review_language` (`review_language`) USING BTREE,
  KEY `i_type` (`type`) USING BTREE,
  KEY `i_review_asin` (`review_asin`) USING BTREE,
  KEY `i_review_site` (`review_site`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_reviews
-- ----------------------------
INSERT INTO `womdee_reviews` VALUES ('1', '1', null, 'Disappointed, good quality item but pattern not as expected.', 'This scarf is great, its long and has a lovely feel to it. Not to mention the quality. To a while to get hear but its well worth the wait. The price of these scarfs from this supplier cant be beaten. One of the best without the high price tag. Great. ', '1', null, null, '2016-02-01 17:30:48', '1', null, 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('2', '1', null, 'Another Great Product!', 'This screen protector save my phone this past weekend.\r\nI drop the phone face down and hit a rock shattering\r\nscreen protector not the phone screen.\r\nthis is a picture of the crack. ', '1', null, null, '2016-02-01 20:12:26', '12', null, 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('3', '1', null, 'Took a bullet to save...', 'My wife dropped her brand new Galaxy S5 on the bare floor in a restaurant. We could see the crowfeet of shattered glass. See the picture. On closer inspection found it is the screen protector that has been shattered saving the screen of the phone. That\'s exactly how it should work. We ordered another one immediately. ', '1', null, null, '2016-02-01 20:13:23', '12', null, 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('4', '1', null, 'Great item', 'I love this item', '1', null, null, '2016-02-04 18:38:20', '22', null, 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('5', '1', null, 'Hello Yes', 'Yout HAnee nOD SHJ jdn', '1', null, null, '2016-02-05 18:38:20', '22', null, 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('6', '1', null, 'aaa', 'aaaaaaaaaaaaa', '1', null, null, '2016-02-16 10:32:46', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('7', '1', null, 'aaa', 'aaaaaaaaaaaaasss', '1', null, null, '2016-02-16 10:42:53', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('8', '1', null, 'yyy', 'yyyyyyuuuuuu', '1', null, null, '2016-02-16 10:50:27', '12', 'lymos', 'en', '1', '3');
INSERT INTO `womdee_reviews` VALUES ('9', '1', null, '4444', 'ddddsds', '1', null, null, '2016-02-16 10:55:39', '12', 'lymos', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('10', '1', null, 'qqq', 'ddddddd', '1', null, null, '2016-02-16 10:58:32', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('11', '1', null, 'aaaaaa', 'dfdsfdsf', '1', null, null, '2016-02-16 10:58:50', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('12', '1', null, 'aaaaaa', 'dfdsfdsfssssssss', '1', null, null, '2016-02-16 10:59:13', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('13', '1', null, 'aaaaa', 'dddddddssssssqq12', '1', null, null, '2016-02-16 11:00:26', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('14', '1', null, '666666666', 'd33333333333', '1', null, null, '2016-02-16 11:00:44', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('15', '1', null, 'aaaaa', '55555555', '1', null, null, '2016-02-16 11:04:31', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('16', '1', null, 'aaaaa22', '5555555511', '1', null, null, '2016-02-16 11:05:33', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('17', '1', null, 'aaaaa22sss', '5555555511ss', '1', null, null, '2016-02-16 11:13:03', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('18', '1', null, 'aaaaa22sss44', '5555555511ss4444', '1', null, null, '2016-02-16 11:26:22', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('19', '1', null, 'uuuukk', 'jjjkkkk', '1', null, null, '2016-02-16 11:29:32', '12', 'lymos', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('20', '1', null, 'aaaaa22sss445555', '5555555511ss4444', '1', null, null, '2016-02-16 11:32:35', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('21', '1', null, 'ioooooi', 'ghjkkkjjhhg', '1', null, null, '2016-02-16 11:33:06', '12', 'lymos', 'en', '1', '2');
INSERT INTO `womdee_reviews` VALUES ('22', '1', null, 'goods', 'yes goods too.', '2', null, null, '2016-02-16 11:21:08', '12', 'lymos', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('23', '1', null, 'hello', 'msds hellos ', '2', null, null, '2016-02-16 11:21:47', '12', 'lymos', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('24', '1', null, 'hokl', 'thjkkhvvc', '5', null, null, '2016-02-16 11:23:36', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('25', '1', null, 'hokl', 'thjkkhvvc', '5', null, null, '2016-02-16 11:23:38', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('26', '1', null, 'hokl', 'thjkkhvvc', '5', null, null, '2016-02-16 11:23:48', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('27', '1', null, 'hokl', 'thjkkhvvc', '5', null, null, '2016-02-16 11:23:53', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('28', '1', null, 'hellosss', 'msds hellos ', '2', null, null, '2016-02-16 11:24:38', '12', 'lymos', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('29', '1', null, 'pppp', 'jk', '5', null, null, '2016-02-16 11:25:01', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('30', '1', null, 'iPhone accessories', 'The Cord for my I phone is to replace the one that was stolen from my motel room. Just what I wanted and delivered when promised', '2', null, null, '2016-02-16 15:37:32', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('31', '1', null, 'i love it', 'The Cord for my I phone is to replace the one that was stolen from my motel room. Just what I wanted and delivered when promised', '2', null, null, '2016-02-16 15:38:37', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('32', '2', '5d7c7fd02c2192c92e8507c45ef6bb0f', 'Love this dress', 'Love this dress!!The picture was exactly how it looked，the material is great and i will definitely buy from this company again', '1', 'B01A5H3WJS', '1', '2016-01-15 00:00:00', '0', 'Amazon Customer', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('33', '2', 'ecca570d529922cda7a3021f42eaface', 'Nice, fit is a bit small.', 'I found that the fit on this is a bit small. However, I think that for me - being a very slender body type anyway, it is attractive as is. However, be aware that the side panels fit at the waist (on me) and are not loose, and not below the waist as pictured. It appears to be well made, and I will withold any further observations until I have cleaned or washed it.', '1', 'B01A5H3WJS', '1', '2016-02-14 00:00:00', '0', 'Decolin', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('34', '2', 'edf8022a5580d0085762308f08141208', 'Very cute but beware big chested girls: this top ...', 'Very cute but beware big chested girls: this top will make the girls pop. I don\'t think it was made for people over a B-cup to get that cute look but for girls with bigger girls, it still looks cute just with the added &#34;wow my chest looks huge in this&#34; look.', '1', 'B01A5H3WJS', '1', '2016-02-15 00:00:00', '0', 'Brittany Theresa', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('35', '2', '0bbd7b65dedcf3541970ceae6ac04a5c', 'The design creates an elegant look', 'i love the material of this dress it is really soft and so fancy. it quickly became my favorite upon delivery,The design creates an elegant look', '1', 'B01A5H3WJS', '1', '2016-01-14 00:00:00', '0', 'Amazon Customer', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('36', '2', 'd73ce5c8dba685c7a60a4e1bf43e982e', 'Runs a size small', 'This sweater runs a little small, I ordered a size up, xl, and it is a tiny bit small. I may be able to pull it off in a pair of leggings.', '1', 'B01A5H3WJS', '1', '2016-02-10 00:00:00', '0', 'Emily Hatley', 'en', '1', '4');
INSERT INTO `womdee_reviews` VALUES ('37', '2', 'aec0932b8c55a00c1c72a2d569525df5', 'Smaller than expected.', 'Very cute. My daughter loves it. Fits her great. Problem is, it was for me. Definitely way too small for me.', '1', 'B01A5H3WJS', '1', '2016-02-15 00:00:00', '0', 'KNH', 'en', '1', '2');
INSERT INTO `womdee_reviews` VALUES ('38', '2', '6da18391a2a2c8ff8d6bc34e05282959', 'Five Stars', 'Fits great! Super flattering, especially if you\'re a lady with hips/booty! Looks great with leggings!', '1', 'B01A5H3WJS', '1', '2016-02-10 00:00:00', '0', 'Tanya', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('39', '2', 'fc7aa4aa5e9d7a92b9036837c34e6ea2', 'Fits perfectly..', 'very nice and stylish..Fits perfectly...I loved it!! Very pleased with the quality.', '1', 'B01A5H3WJS', '1', '2016-02-01 00:00:00', '0', 'Mild Masta', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('43', '2', 'd853691df10db360437901c111aca0c9', 'love this dress', 'Kyzaaa. I really love this dress. Very comfortable. It is way nicer than I expected.', '1', 'B01A5H3WJS', '9', '2016-02-01 00:00:00', '0', 'Amazon Customer', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('46', '1', null, 'hello', 'adfdfddd', '1', null, null, '2016-02-16 16:17:54', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('47', '1', null, 'helloeee', 'adfdfdddss', '1', null, null, '2016-02-16 16:19:49', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('48', '2', 'fa94feb6278cabaa880d15c8481f9033', 'Ganz sch&ouml;n und wie auf dem Bild', 'Ganz sch&ouml;n und wie auf dem Bild.Der Stoff ist weich und gut angenehm auf der Haut zu tragen!Die Gr&ouml;&szlig;e ist wie erwartet.Sch&ouml;n mit Legging.', '1', 'B01A5H3WJS', '4', '2016-02-16 16:24:53', '0', 'saring rumpe', 'de', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('49', '2', 'dfc975c8f5e403829f2d86a2447fb964', 'Ganz sch&ouml;n', 'Ganz sch&ouml;n und wie auf dem Bild.Der Stoff ist weich und gut angenehm auf der Haut zu tragen!Die Gr&ouml;&szlig;e ist wie erwartet.Sch&ouml;n mit Legging.', '1', 'B01A5H3WJS', '4', '2016-02-16 16:24:53', '0', 'stefanhera', 'de', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('50', '1', null, 'helloeee444', 'adfdfdddss', '1', null, null, '2016-02-16 16:24:05', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('51', '1', null, 'helloeee444ss', 'adfdfdddss', '1', null, null, '2016-02-16 16:24:26', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('52', '1', null, 'helloeee444ss', 'adfdfdddss', '1', null, null, '2016-02-16 16:26:35', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('53', '1', null, 'very good', 'ha ha so nice', '1', null, null, '2016-02-16 18:28:06', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('54', '1', null, 'so gaga', 'so so gaga', '1', null, null, '2016-02-16 18:48:33', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('55', '1', null, 'so gaga', 'so so gaga', '1', null, null, '2016-02-16 18:50:03', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('56', '1', null, 'so gaga', 'so so gaga', '1', null, null, '2016-02-16 18:50:23', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('57', '1', null, 'addd', 'dddddd', '1', null, null, '2016-02-16 18:52:42', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('58', '1', null, 'so gaga', 'so so gaga', '1', null, null, '2016-02-16 18:54:39', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('59', '1', null, 'so gagass', 'so so gagassss', '1', null, null, '2016-02-16 18:56:05', '12', 'lymos', 'en', '1', '5');
INSERT INTO `womdee_reviews` VALUES ('60', '1', null, 'so gagassss', 'so so gagassss', '1', null, null, '2016-02-16 18:57:04', '12', 'lymos', 'en', '1', '5');

-- ----------------------------
-- Table structure for womdee_sites_list
-- ----------------------------
DROP TABLE IF EXISTS `womdee_sites_list`;
CREATE TABLE `womdee_sites_list` (
  `listing_site_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '站点ID',
  `listing_site_url` varchar(128) DEFAULT NULL COMMENT '站点地址',
  `listing_site_name` varchar(64) DEFAULT NULL COMMENT '站点名称',
  `listing_site_country` varchar(64) DEFAULT NULL,
  `listing_site_language` varchar(20) DEFAULT NULL,
  `listing_site_language_code` varchar(2) DEFAULT NULL,
  `listing_site_sort` int(11) DEFAULT NULL COMMENT '排序',
  `listing_show` int(1) DEFAULT '1',
  PRIMARY KEY (`listing_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of womdee_sites_list
-- ----------------------------
INSERT INTO `womdee_sites_list` VALUES ('1', 'https://www.amazon.com', 'US', 'United States', 'en_lang', 'en', '1', '1');
INSERT INTO `womdee_sites_list` VALUES ('2', 'https://www.amazon.ca', 'CA', 'Canada', 'ca_lang', 'en', '2', '1');
INSERT INTO `womdee_sites_list` VALUES ('3', 'https://www.amazon.jp', 'JP', 'Japan', 'jp_lang', 'jp', '3', '1');
INSERT INTO `womdee_sites_list` VALUES ('4', 'https://www.amazon.de', 'DE', 'Germany', 'de_lang', 'de', '4', '1');
INSERT INTO `womdee_sites_list` VALUES ('5', 'https://www.amazon.es', 'ES', 'Spain', 'es_lang', 'es', '5', '0');
INSERT INTO `womdee_sites_list` VALUES ('6', 'https://www.amazon.fr', 'FR', 'France', 'fr_lang', 'fr', '6', '0');
INSERT INTO `womdee_sites_list` VALUES ('7', 'https://www.amazon.in', 'IN', 'India', 'in_lang', 'in', '7', '0');
INSERT INTO `womdee_sites_list` VALUES ('8', 'https://www.amazon.it', 'IT', 'Italy', 'it_lang', 'it', '8', '1');
INSERT INTO `womdee_sites_list` VALUES ('9', 'https://www.amazon.co.uk', 'GB', 'United Kingdom', 'uk_lang', 'en', '9', '1');
INSERT INTO `womdee_sites_list` VALUES ('10', 'https://www.amazon.com.cn', 'CN', 'China', 'cn_lang', 'cn', '10', '0');

-- ----------------------------
-- Table structure for womdee_users
-- ----------------------------
DROP TABLE IF EXISTS `womdee_users`;
CREATE TABLE `womdee_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_email` varchar(128) DEFAULT NULL COMMENT '邮箱地址',
  `user_fullname` varchar(128) DEFAULT NULL COMMENT '全名',
  `user_password` varchar(32) DEFAULT NULL COMMENT '密码(32位MD5加密)',
  `user_gender` int(1) DEFAULT NULL COMMENT '性别,1-男，2-女',
  `user_birthday` date DEFAULT NULL COMMENT '用户生日',
  `user_location` varchar(128) DEFAULT NULL COMMENT '用户所在地',
  `user_registed_date` datetime DEFAULT NULL COMMENT '用户注册时间',
  `user_account_status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态，1-正常，0-未激活，2-受限。',
  `user_email_token` varchar(200) NOT NULL DEFAULT '' COMMENT '邮箱验证token',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of womdee_users
-- ----------------------------
INSERT INTO `womdee_users` VALUES ('2', 'admin@a.com', 'dsfdsa', '74be16979710d4c4e7c6647856088456', '2', '0000-00-00', 'UA', '2016-01-22 15:56:37', '0', '2d71f22422b799a0d29004c7656014496538');
INSERT INTO `womdee_users` VALUES ('3', 'a@aa.com', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1', '0000-00-00', 'UA', '2016-01-22 18:48:33', '0', '5beb599cc0bcd879832d943f311f23703709');
INSERT INTO `womdee_users` VALUES ('4', '12321@11.com', '123213', '74be16979710d4c4e7c6647856088456', '2', '0000-00-00', 'SE', '2016-01-25 17:14:25', '0', '193d248540da34b446baa8fd9ba591981149');
INSERT INTO `womdee_users` VALUES ('5', 'admin@163.com', 'admin', '0c909a141f1f2c0a1cb602b0b2d7d050', '2', '0000-00-00', 'TC', '2016-01-26 08:47:36', '0', '824e631589782e80f4e781f7aa1419cf7400');
INSERT INTO `womdee_users` VALUES ('12', '857296599@qq.com', 'lymos', 'd7c6c07a0a04ba4e65921e2f90726384', '2', '0000-00-00', 'US', '2016-01-26 10:01:29', '1', '2335603f55496b473efd0376dfeb770d7422');
INSERT INTO `womdee_users` VALUES ('13', 'aa@123.com', 'dsfdsa', '8901869c1337b2af6e1b31707f538c43', '2', '0000-00-00', 'US', '2016-01-27 18:50:20', '0', 'f56b6d5c7817d431a5c51b53461052bb9421');
INSERT INTO `womdee_users` VALUES ('14', 'A@AD.COM', 'AD', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', 'US', '2016-01-28 09:22:56', '0', '28e6b31259e845bcda11f11b4b82b0108332');
INSERT INTO `womdee_users` VALUES ('15', 'admin@1631.com', 'asdfdsf', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', '1', '2016-02-01 20:36:20', '0', '777802a5de0da738d5b7b273e456726b2709');
INSERT INTO `womdee_users` VALUES ('16', 'lymos@111.com', 'lymos', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', '1', '2016-02-01 20:27:14', '0', 'ed7da00e7362181d89df565830c7c3567470');
INSERT INTO `womdee_users` VALUES ('18', 'lymos@12321.com', 'sdfdsf', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', '1', '2016-02-01 21:51:34', '0', '1ea8d411cee7531e5cff45648f47e7807744');
INSERT INTO `womdee_users` VALUES ('19', 'lymos@12321s.com', 'sdfdsf', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', '1', '2016-02-01 21:52:01', '0', '42736cb9aaebabf325925681d8545b613340');
INSERT INTO `womdee_users` VALUES ('20', 'hsj@qq.com', 'agah', '8b283e8957f744ae5a1a6add05fc354f', '2', '0000-00-00', '1', '2016-02-01 21:37:10', '0', 'd9b63295bb9b05f933a1f413214cf2ea8118');
INSERT INTO `womdee_users` VALUES ('21', '123123@qq.com', '123123', 'dac27c8e7534098909bb93af3eb4b44e', '2', '0000-00-00', '1', '2016-02-01 21:37:13', '0', '02e1b7e5976f37592d467b2506024ad93554');
INSERT INTO `womdee_users` VALUES ('22', 'tomtg041@gmail.com', 'Tom', '14e1b600b1fd579f47433b88e8d85291', '2', '0000-00-00', '1', '2016-02-04 18:37:48', '0', '55c7ca0e6533dc584091454f667e7a375794');
INSERT INTO `womdee_users` VALUES ('23', 'admin@444.com', 'admin444', '7312ea0f41db2f74e63466f9dc9a73b5', '2', '0000-00-00', null, '2016-02-26 15:21:54', '0', '9431733a00e6d457ed8df97756f904729154');
