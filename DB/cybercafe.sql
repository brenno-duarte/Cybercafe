CREATE DATABASE  IF NOT EXISTS `cybercafe` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cybercafe`;
-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cybercafe
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (7,'admin','admin');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_pontos`
--

DROP TABLE IF EXISTS `clientes_pontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_pontos` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `ponto_registrado` int(11) NOT NULL,
  `vip` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_ponto_idx` (`ponto_registrado`),
  CONSTRAINT `fk_clientes_pontos_1` FOREIGN KEY (`ponto_registrado`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_pontos`
--

LOCK TABLES `clientes_pontos` WRITE;
/*!40000 ALTER TABLE `clientes_pontos` DISABLE KEYS */;
INSERT INTO `clientes_pontos` VALUES (5,'cherno alpha','072.291.163-76',5,'Sim'),(6,'jovem','072.291.163-76',5,'Nao');
/*!40000 ALTER TABLE `clientes_pontos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias_empresa`
--

DROP TABLE IF EXISTS `noticias_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias_empresa` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `noticia` varchar(255) NOT NULL,
  `dta_noticia` date DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `ponto_fisico` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `fk_noticias_empresa_1_idx` (`ponto_fisico`),
  KEY `fk_noticias_empresa_2_idx` (`usuario`),
  CONSTRAINT `fk_noticias_empresa_1` FOREIGN KEY (`ponto_fisico`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticias_empresa_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias_empresa`
--

LOCK TABLES `noticias_empresa` WRITE;
/*!40000 ALTER TABLE `noticias_empresa` DISABLE KEYS */;
INSERT INTO `noticias_empresa` VALUES (4,'novo hamburger feito de cuzcuz','2019-06-18',10,5);
/*!40000 ALTER TABLE `noticias_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pontos_fisicos`
--

DROP TABLE IF EXISTS `pontos_fisicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pontos_fisicos` (
  `id_ponto` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(30) NOT NULL,
  `nome_comercial` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `contrato` varchar(50) NOT NULL,
  `maquinas_ativas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ponto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pontos_fisicos`
--

LOCK TABLES `pontos_fisicos` WRITE;
/*!40000 ALTER TABLE `pontos_fisicos` DISABLE KEYS */;
INSERT INTO `pontos_fisicos` VALUES (5,'123456789','oracle','Grande','VIP','800'),(6,'456456','udemy','Medio','Simples','13');
/*!40000 ALTER TABLE `pontos_fisicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_produtos_1_idx` (`cliente`),
  CONSTRAINT `fk_produtos_1` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (3,'skol beats','bebidas','bebida',29,5);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_pontos`
--

DROP TABLE IF EXISTS `usuarios_pontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_pontos` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `funcionarios` varchar(100) NOT NULL,
  `adm_ponto` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_pontos_1_idx` (`adm_ponto`),
  CONSTRAINT `fk_usuarios_pontos_1` FOREIGN KEY (`adm_ponto`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_pontos`
--

LOCK TABLES `usuarios_pontos` WRITE;
/*!40000 ALTER TABLE `usuarios_pontos` DISABLE KEYS */;
INSERT INTO `usuarios_pontos` VALUES (10,'hugo',5);
/*!40000 ALTER TABLE `usuarios_pontos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk_vendas_1_idx` (`cliente`),
  KEY `fk_vendas_2_idx` (`empresa`),
  KEY `fk_vendas_3_idx` (`func`),
  CONSTRAINT `fk_vendas_cliente` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_empresa` FOREIGN KEY (`empresa`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_usuario` FOREIGN KEY (`func`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (2,NULL,5,NULL),(3,5,5,10);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-04 23:32:45
