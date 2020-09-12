/*
 Navicat Premium Data Transfer

 Source Server         : desarrollo
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : capacitacion

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 11/09/2020 23:43:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contrasenia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `taller1` tinyint(255) NULL DEFAULT NULL,
  `taller2` tinyint(255) NULL DEFAULT NULL,
  `taller3` tinyint(255) NULL DEFAULT NULL,
  `taller4` tinyint(255) NULL DEFAULT NULL,
  `taller5` tinyint(255) NULL DEFAULT NULL,
  `taller6` tinyint(255) NULL DEFAULT NULL,
  `taller7` tinyint(255) NULL DEFAULT NULL,
  `taller8` tinyint(255) NULL DEFAULT NULL,
  `taller9` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (1, 'Cristian', 'Paz ', '1', 'cris', '305.cc', 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `login` VALUES (2, 'ADMINISTRADOR', 'ADMIN', '1', 'admin', 'admin', 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `login` VALUES (14, 'Byron', 'PAZ', '0', 'pbyron.997', '12345', 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `login` VALUES (22, 'PAOLA', 'Paz', '0', 'pao', '12345', 1, 0, 0, 0, 0, 0, 0, 0, 0);

SET FOREIGN_KEY_CHECKS = 1;
