CREATE DATABASE  IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `biblioteca`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

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
-- Table structure for table `dados_acesso`
--

DROP TABLE IF EXISTS `dados_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados_acesso` (
  `cpf_usuario` varchar(11) COLLATE utf8_bin NOT NULL,
  `login` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cpf_usuario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  CONSTRAINT `cpf_dados` FOREIGN KEY (`cpf_usuario`) REFERENCES `usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados_acesso`
--

LOCK TABLES `dados_acesso` WRITE;
/*!40000 ALTER TABLE `dados_acesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `dados_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devolucao`
--

DROP TABLE IF EXISTS `devolucao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devolucao` (
  `id_emprestimo` int(11) NOT NULL,
  `dtdevolucao` datetime NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  CONSTRAINT `id_devolucao` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devolucao`
--

LOCK TABLES `devolucao` WRITE;
/*!40000 ALTER TABLE `devolucao` DISABLE KEYS */;
/*!40000 ALTER TABLE `devolucao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_livro` int(11) NOT NULL,
  `cpf_usuario` varchar(11) COLLATE utf8_bin NOT NULL,
  `dtemprestimo` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `cpf_emprestimo_idx` (`cpf_usuario`),
  KEY `id_livro_idx` (`id_livro`),
  CONSTRAINT `cpf_emprestimo` FOREIGN KEY (`cpf_usuario`) REFERENCES `usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `biblioteca`.`emprestimo_BEFORE_INSERT` BEFORE INSERT ON `emprestimo` FOR EACH ROW
BEGIN
	IF (SELECT qttotal FROM livro WHERE id=NEW.id_livro)>(SELECT qtalugado FROM livro WHERE id=NEW.id_livro) AND (SELECT qttotal FROM livro WHERE id=NEW.id_livro) > 0 AND (SELECT qtalugado FROM livro WHERE id=NEW.id_livro) >= 0
		THEN
		UPDATE livro SET qtalugado=qtalugado+1 WHERE id=NEW.id_livro;
	ELSE
        SIGNAL SQLSTATE '20000' SET MESSAGE_TEXT = 'Não possuimos mais esse livro em estoque! :(';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `biblioteca`.`emprestimo_BEFORE_DELETE` BEFORE DELETE ON `emprestimo` FOR EACH ROW
BEGIN
	UPDATE livro SET qtalugado=qtalugado-1 WHERE id=OLD.id_livro;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `cpf_usuario` varchar(11) COLLATE utf8_bin NOT NULL,
  `rua` varchar(255) COLLATE utf8_bin NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) COLLATE utf8_bin NOT NULL,
  `cep` int(11) NOT NULL,
  PRIMARY KEY (`cpf_usuario`),
  CONSTRAINT `cpf_endereco` FOREIGN KEY (`cpf_usuario`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `cpf_usuario` varchar(11) COLLATE utf8_bin NOT NULL,
  `ctps` varchar(12) COLLATE utf8_bin NOT NULL,
  `cargo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cpf_usuario`),
  UNIQUE KEY `ctps_UNIQUE` (`ctps`),
  UNIQUE KEY `cpf_usuario_UNIQUE` (`cpf_usuario`),
  CONSTRAINT `cpf_funcionario` FOREIGN KEY (`cpf_usuario`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `autor` varchar(45) COLLATE utf8_bin NOT NULL,
  `editora` varchar(255) COLLATE utf8_bin NOT NULL,
  `dtpublicacao` datetime NOT NULL,
  `genero` varchar(255) COLLATE utf8_bin NOT NULL,
  `secao` varchar(255) COLLATE utf8_bin NOT NULL,
  `qttotal` int(11) unsigned zerofill NOT NULL,
  `qtalugado` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multa`
--

DROP TABLE IF EXISTS `multa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multa` (
  `id_emprestimo` int(11) NOT NULL,
  `dtmulta` datetime NOT NULL,
  `duracao` datetime NOT NULL,
  `motivo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  CONSTRAINT `id_multa` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multa`
--

LOCK TABLES `multa` WRITE;
/*!40000 ALTER TABLE `multa` DISABLE KEYS */;
/*!40000 ALTER TABLE `multa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cpf` varchar(11) COLLATE utf8_bin NOT NULL,
  `dtnascimento` datetime NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'biblioteca'
--

--
-- Dumping routines for database 'biblioteca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-07 18:24:54
