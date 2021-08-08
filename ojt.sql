/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ojt

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-27 12:55:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('XI-RPL');
INSERT INTO `kelas` VALUES ('X-RPL');
INSERT INTO `kelas` VALUES ('XI-MM1');
INSERT INTO `kelas` VALUES ('XI-MM2');
INSERT INTO `kelas` VALUES ('X-MM1');
INSERT INTO `kelas` VALUES ('X-MM2');

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(90) DEFAULT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL,
  PRIMARY KEY (`idsiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('17', '59202', 'Jihad Jahaludin', 'XI-RPL', '2018/2019', '300000');
INSERT INTO `siswa` VALUES ('18', '60751', 'Ibnu Januar Ali', 'X-RPL', '2018/2019', '300000');
INSERT INTO `siswa` VALUES ('20', '14921', 'Ramandhika Ilham Pratama', 'XI-RPL', '2018/2019', '300000');

-- ----------------------------
-- Table structure for spp
-- ----------------------------
DROP TABLE IF EXISTS `spp`;
CREATE TABLE `spp` (
  `idspp` int(100) NOT NULL AUTO_INCREMENT,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL,
  PRIMARY KEY (`idspp`),
  KEY `fk_admin` (`idadmin`),
  KEY `fk_siswa` (`idsiswa`),
  CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spp
-- ----------------------------
INSERT INTO `spp` VALUES ('109', '17', '2019-12-29', 'Desember 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('110', '17', '2020-01-29', 'Januari 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('111', '17', '2020-02-29', 'Februari 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('112', '17', '2020-03-29', 'Maret 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('113', '17', '2020-04-29', 'April 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('114', '17', '2020-05-29', 'Mei 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('115', '17', '2020-06-29', 'Juni 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('116', '17', '2020-07-29', 'Juli 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('117', '17', '2020-08-29', 'Agustus 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('118', '17', '2020-09-29', 'September 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('119', '17', '2020-10-29', 'Oktober 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('120', '17', '2020-11-29', 'November 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('121', '18', '2019-12-29', 'Desember 2019', '1904230002', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('122', '18', '2020-01-29', 'Januari 2020', '1904230001', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('123', '18', '2020-02-29', 'Februari 2020', '1904230006', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('124', '18', '2020-03-29', 'Maret 2020', '1904230005', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('125', '18', '2020-04-29', 'April 2020', '1904230004', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('126', '18', '2020-05-29', 'Mei 2020', '1904230003', '2019-04-23', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('127', '18', '2020-06-29', 'Juni 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('128', '18', '2020-07-29', 'Juli 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('129', '18', '2020-08-29', 'Agustus 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('130', '18', '2020-09-29', 'September 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('131', '18', '2020-10-29', 'Oktober 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('132', '18', '2020-11-29', 'November 2020', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('145', '20', '2019-01-02', 'Januari 2019', '1904240001', '2019-04-24', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('146', '20', '2019-02-02', 'Februari 2019', '1904240002', '2019-04-24', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('147', '20', '2019-03-02', 'Maret 2019', '1904240003', '2019-04-24', '300000', 'LUNAS', '1');
INSERT INTO `spp` VALUES ('148', '20', '2019-04-02', 'April 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('149', '20', '2019-05-02', 'Mei 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('150', '20', '2019-06-02', 'Juni 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('151', '20', '2019-07-02', 'Juli 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('152', '20', '2019-08-02', 'Agustus 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('153', '20', '2019-09-02', 'September 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('154', '20', '2019-10-02', 'Oktober 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('155', '20', '2019-11-02', 'November 2019', null, null, '300000', null, null);
INSERT INTO `spp` VALUES ('156', '20', '2019-12-02', 'Desember 2019', null, null, '300000', null, null);
