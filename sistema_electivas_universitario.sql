/*
Navicat MySQL Data Transfer

Source Server         : heroku job
Source Server Version : 50636
Source Host           : us-cdbr-iron-east-05.cleardb.net:3306
Source Database       : heroku_90bf4ec7727e70a

Target Server Type    : MYSQL
Target Server Version : 50636
File Encoding         : 65001

Date: 2017-10-14 01:30:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for electivecourse
-- ----------------------------
DROP TABLE IF EXISTS `electivecourse`;
CREATE TABLE `electivecourse` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `available` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `occupied` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of electivecourse
-- ----------------------------
INSERT INTO `electivecourse` VALUES ('11', 'Matematicas 1', 'Juan Perez', 'Algebra BÃ¡sica', '29', '31', '2');
INSERT INTO `electivecourse` VALUES ('21', 'Literatura', 'Dario MejÃ­a', 'IntroducciÃ³n a la literatura espaÃ±ola', '19', '20', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `admin` int(1) NOT NULL,
  `code` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('9', '1', '12345678', 'Admin@plataformaiuniv.co', '12345678', 'Administrador', 'Universitario');
INSERT INTO `users` VALUES ('11', '0', '2135124', 'jpal@plataformaiuniv.co', '123456', 'Juan', 'Palacios');

-- ----------------------------
-- Table structure for users_x_electivecourse
-- ----------------------------
DROP TABLE IF EXISTS `users_x_electivecourse`;
CREATE TABLE `users_x_electivecourse` (
  `user` int(255) NOT NULL,
  `elective_course` int(255) NOT NULL,
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of users_x_electivecourse
-- ----------------------------
INSERT INTO `users_x_electivecourse` VALUES ('11', '11', '51');
INSERT INTO `users_x_electivecourse` VALUES ('51', '21', '61');
INSERT INTO `users_x_electivecourse` VALUES ('51', '11', '71');
