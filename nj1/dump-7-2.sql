-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: enaira
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_updation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coin_type` enum('b','e','l') NOT NULL,
  `public` varchar(255) NOT NULL,
  `private` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,1,'0x926af4627e42D07038C8Cc29a9123C7f00Df7Ac9','2018-02-01 09:04:59','2018-02-06 18:16:09','e','',''),(12,11,'0x81888682285191ff773c0f5a35241fd2f9b9c42d','2018-02-06 18:34:07','2018-02-06 18:34:07','e','',''),(13,12,'0x684d8f5ac15a39ab49baf71ba82188ab33d0ae28','2018-02-06 18:36:25','2018-02-06 18:36:25','e','',''),(14,13,'0x11510267a79708492becb4d507b2a1c61a607da5','2018-02-06 18:42:11','2018-02-06 18:42:11','e','','');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','466dbedf95000da7195b8a6bc475c17e15df64ab41aaa745c5f54cdeee89a2e9','2017-11-25 10:48:06');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coin_value`
--

DROP TABLE IF EXISTS `coin_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coin_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float(15,6) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coin_value`
--

LOCK TABLES `coin_value` WRITE;
/*!40000 ALTER TABLE `coin_value` DISABLE KEYS */;
INSERT INTO `coin_value` VALUES (1,11787.500000,'btc','2017-12-05 10:57:14'),(2,467.221985,'eth','2017-12-05 10:57:14'),(3,321.721008,'ltc','2017-12-05 10:57:14');
/*!40000 ALTER TABLE `coin_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coin_type` enum('b','e','l') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit`
--

LOCK TABLES `deposit` WRITE;
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eth_transaction`
--

DROP TABLE IF EXISTS `eth_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eth_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amt` varchar(50) NOT NULL,
  `txn_hash` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eth_transaction`
--

LOCK TABLES `eth_transaction` WRITE;
/*!40000 ALTER TABLE `eth_transaction` DISABLE KEYS */;
INSERT INTO `eth_transaction` VALUES (1,'0x81888682285191ff773c0f5a35241fd2f9b9c42d',1,'0.02','0x660a4556fad682404b21e6dc39e0745c47abd8c614bdf6107216b4be216338d5','2018-02-06 18:37:50',1),(2,'0x684d8f5ac15a39ab49baf71ba82188ab33d0ae28',1,'0.02','0xa24da93f1eee5c6369ad162279608b22b85cc55bc8a4ac28ded4280955371bf1','2018-02-06 18:52:51',1);
/*!40000 ALTER TABLE `eth_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eth_transfer`
--

DROP TABLE IF EXISTS `eth_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eth_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  `transfered_token_id` int(11) NOT NULL,
  `txn_hash` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_completed` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eth_transfer`
--

LOCK TABLES `eth_transfer` WRITE;
/*!40000 ALTER TABLE `eth_transfer` DISABLE KEYS */;
INSERT INTO `eth_transfer` VALUES (1,12,1,'0.002',2,'0x49522f5b7301329a9d32696d446b9a016a9335dc16f8322eee6c1ec1a1004ac3','2018-02-06 18:40:09','0');
/*!40000 ALTER TABLE `eth_transfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_transaction`
--

DROP TABLE IF EXISTS `external_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `external_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` float(15,7) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_updation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(100) NOT NULL,
  `fees` float(15,7) NOT NULL,
  `coin_type` enum('b','e','l') NOT NULL,
  `transaction_completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_transaction`
--

LOCK TABLES `external_transaction` WRITE;
/*!40000 ALTER TABLE `external_transaction` DISABLE KEYS */;
INSERT INTO `external_transaction` VALUES (1,12,'0x81888682285191ff773c0f5a35241fd2f9b9c42d',10.0000000,'2018-02-06 18:41:55','2018-02-06 18:41:55',0,'0x0da05884ba467a9c9bd734d6828421ef6b85d9b38ce998ac7d7a6c084b4c2e1c',0.0001000,'e',0);
/*!40000 ALTER TABLE `external_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `external` float(15,6) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_of_updation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coin_type` enum('e') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (2,0.000100,1,'2018-02-02 20:57:21','e');
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internal_transaction`
--

DROP TABLE IF EXISTS `internal_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(10) NOT NULL,
  `receiver_id` varchar(10) NOT NULL,
  `amount` float(15,6) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fees` float(15,6) NOT NULL,
  `coin_type` enum('b','e','l') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internal_transaction`
--

LOCK TABLES `internal_transaction` WRITE;
/*!40000 ALTER TABLE `internal_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `internal_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minimum_token`
--

DROP TABLE IF EXISTS `minimum_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minimum_token` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `minimum_token` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minimum_token`
--

LOCK TABLES `minimum_token` WRITE;
/*!40000 ALTER TABLE `minimum_token` DISABLE KEYS */;
INSERT INTO `minimum_token` VALUES (1,100);
/*!40000 ALTER TABLE `minimum_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phase`
--

DROP TABLE IF EXISTS `phase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phase` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `bonus_amount` int(2) NOT NULL,
  `reffral_amount` int(2) NOT NULL,
  `target` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phase`
--

LOCK TABLES `phase` WRITE;
/*!40000 ALTER TABLE `phase` DISABLE KEYS */;
INSERT INTO `phase` VALUES (1,'PHASE 1','2018-02-05','2018-02-22',10,10,10000);
/*!40000 ALTER TABLE `phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reffral_amount`
--

DROP TABLE IF EXISTS `reffral_amount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reffral_amount` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `amount` decimal(5,4) NOT NULL,
  `ref_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reffral_amount`
--

LOCK TABLES `reffral_amount` WRITE;
/*!40000 ALTER TABLE `reffral_amount` DISABLE KEYS */;
INSERT INTO `reffral_amount` VALUES (1,11,2.0000,'2018-02-06 18:40:09');
/*!40000 ALTER TABLE `reffral_amount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reffral_user`
--

DROP TABLE IF EXISTS `reffral_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reffral_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ref_to` bigint(20) NOT NULL,
  `ref_from` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reffral_user`
--

LOCK TABLES `reffral_user` WRITE;
/*!40000 ALTER TABLE `reffral_user` DISABLE KEYS */;
INSERT INTO `reffral_user` VALUES (1,12,11);
/*!40000 ALTER TABLE `reffral_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_token`
--

DROP TABLE IF EXISTS `transfer_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(250) NOT NULL,
  `token` varchar(50) NOT NULL,
  `txn_hash` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_token`
--

LOCK TABLES `transfer_token` WRITE;
/*!40000 ALTER TABLE `transfer_token` DISABLE KEYS */;
INSERT INTO `transfer_token` VALUES (1,1,11,'2000000000000000000','0xc940748c931794d01a375fe9ce51bee717bd366dc2d70710bd853c467488337d','2018-02-06 18:40:09'),(2,1,12,'22000000000000000000','0xfd765b10ade3a1582ae17eb143337c5abb004a09c893743e642e6f81f82bc835','2018-02-06 18:40:09');
/*!40000 ALTER TABLE `transfer_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unique_id` varchar(10) NOT NULL,
  `token_amt` decimal(50,6) DEFAULT NULL,
  `u_status` int(1) NOT NULL DEFAULT '1',
  `secret_key` varchar(25) NOT NULL,
  `refferal_code` varchar(10) NOT NULL,
  `google_enable` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin@admin.com','466dbedf95000da7195b8a6bc475c17e15df64ab41aaa745c5f54cdeee89a2e9','2018-02-01 09:08:04','2018-02-06 18:53:12','9949000000',1349999970999999999800000000.000000,1,'XLHTHWLQ5DRPAHGV','',0),(11,'Test','test@test.test','50b43f8f59348c225376112ed871c1de458a4552782f753217148bdfc0285cbd','2018-02-06 18:34:03','2018-02-06 18:44:08','7219000001',12000000000000000000.000000,1,'DDLIMZO56GO5XKH7','oml0HNyU',1),(12,'Rajat','rajat@atventus.com','8ac2456e310821f0248a32c8d83efbf3dc3cef9f2a6472d0d12f2235c474edff','2018-02-06 18:36:22','2018-02-06 18:41:54','7645000011',10.000000,1,'','eHZSOoQJ',0),(13,'harsh','harsh.fantastic4@gmail.com','3daf3de589a5b5501bc44adfc1168bb3d666d2d49f57997cf89e29114db37ffb','2018-02-06 18:42:09','2018-02-06 19:12:56','8073000012',0.000000,1,'','YG0GRBpo',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal_permission`
--

DROP TABLE IF EXISTS `withdrawal_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawal_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal_permission`
--

LOCK TABLES `withdrawal_permission` WRITE;
/*!40000 ALTER TABLE `withdrawal_permission` DISABLE KEYS */;
INSERT INTO `withdrawal_permission` VALUES (1,1,1),(2,11,1),(3,12,1),(4,13,1);
/*!40000 ALTER TABLE `withdrawal_permission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-06 19:17:48
