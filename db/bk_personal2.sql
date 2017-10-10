-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: personaluab
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `afp`
--

DROP TABLE IF EXISTS `afp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afp` (
  `idAfp` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAfp` varchar(50) NOT NULL,
  PRIMARY KEY (`idAfp`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afp`
--

LOCK TABLES `afp` WRITE;
/*!40000 ALTER TABLE `afp` DISABLE KEYS */;
INSERT INTO `afp` VALUES (1,'FUTURO DE BOIVIA S.A. AFP'),(2,'AFP PREVINCION'),(3,'AFP FUTURO');
/*!40000 ALTER TABLE `afp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo`
--

DROP TABLE IF EXISTS `archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo` (
  `idArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoArchivo` int(11) NOT NULL,
  `archivo` varchar(300) NOT NULL,
  `nombreArchivo` varchar(50) NOT NULL,
  PRIMARY KEY (`idArchivo`),
  KEY `idTipoArchivo` (`idTipoArchivo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` VALUES (2,2,'/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-Modelo Relacional.pdfRember Prueba.pdf','Rember Prueba'),(3,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-1-Rember.pdf','Rember'),(6,2,'/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-2-Point Fusion.pdf','Point Fusion'),(8,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-1-prueba 3.pdf','prueba 3');
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(100) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'DOCENTE'),(2,'PROFESOR'),(3,'SECRETARIA'),(4,'JARDINERO'),(5,'CONTADOR');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargopersona`
--

DROP TABLE IF EXISTS `cargopersona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargopersona` (
  `idCargoPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCargoPersona` varchar(100) NOT NULL,
  PRIMARY KEY (`idCargoPersona`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargopersona`
--

LOCK TABLES `cargopersona` WRITE;
/*!40000 ALTER TABLE `cargopersona` DISABLE KEYS */;
INSERT INTO `cargopersona` VALUES (1,'DOCENTE'),(2,'RECTOR'),(3,'DECANO'),(4,'VICE-DECANO'),(5,'SECRETARIO ACADEMICO'),(6,'CAPELLAN');
/*!40000 ALTER TABLE `cargopersona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargopersonal`
--

DROP TABLE IF EXISTS `cargopersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargopersonal` (
  `idCargo` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  KEY `idCargo` (`idCargo`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargopersonal`
--

LOCK TABLES `cargopersonal` WRITE;
/*!40000 ALTER TABLE `cargopersonal` DISABLE KEYS */;
INSERT INTO `cargopersonal` VALUES (1,1),(3,2),(1,4),(5,5),(1,6),(1,8);
/*!40000 ALTER TABLE `cargopersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `idFacultad` int(11) NOT NULL,
  `nombreCarrera` varchar(100) NOT NULL,
  PRIMARY KEY (`idCarrera`),
  KEY `idFacultad` (`idFacultad`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,1,'SISTEMAS'),(2,1,'AMBIENTAL'),(3,1,'REDES Y TELECOMUNICACIONES'),(4,2,'NUTRICION'),(5,2,'ENFERMERIA'),(6,2,'BIOQUIMICA'),(7,2,'FISIOTERAPIA Y KINESIOLOGIA'),(8,3,'PSICOLOGIA'),(9,3,'PSICOPEDAGOGIA'),(10,3,'EDUCACION FISICA'),(11,4,'TEOLOGIA'),(12,5,'CONTADURIA PUBLICA'),(13,5,'ADMINISTRACION DE EMPRESAS'),(14,5,'AUDITORIA'),(15,5,'COMERCIAL');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCiudad` varchar(60) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'ORURO'),(2,'LA PAZ'),(3,'SANTA CRUZ'),(4,'BENI'),(5,'PANDO'),(6,'POTOSI'),(7,'TARIJA'),(8,'SUCRE'),(9,'COCHABAMBA'),(10,'BUENOS AIRES'),(11,'RIO DE JANEIRO');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idNoticia` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idNoticia` (`idNoticia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configregistrodatos`
--

DROP TABLE IF EXISTS `configregistrodatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configregistrodatos` (
  `idConfigRegistroDatos` int(11) NOT NULL AUTO_INCREMENT,
  `fechaLimite` date NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idConfigRegistroDatos`),
  KEY `idTipoUsuario` (`idTipoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configregistrodatos`
--

LOCK TABLES `configregistrodatos` WRITE;
/*!40000 ALTER TABLE `configregistrodatos` DISABLE KEYS */;
INSERT INTO `configregistrodatos` VALUES (1,'2017-07-28',3),(2,'2017-07-29',4),(3,'2017-07-15',5),(4,'2017-07-14',6);
/*!40000 ALTER TABLE `configregistrodatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamentoContacto` int(11) NOT NULL,
  `idTipoEmpleado` int(11) NOT NULL,
  `idResponsabilidad` int(11) NOT NULL,
  `primerNombre` varchar(20) NOT NULL,
  `segundoNombre` varchar(20) DEFAULT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `apellidoCasada` varchar(20) DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `interno` varchar(10) DEFAULT NULL,
  `voip` varchar(10) DEFAULT NULL,
  `emailInstitucional` varchar(50) NOT NULL,
  `emailPersonal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idContacto`),
  KEY `idDepartamentoContacto` (`idDepartamentoContacto`),
  KEY `idTipoEmpleado` (`idTipoEmpleado`),
  KEY `idResponsabilidad` (`idResponsabilidad`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (1,1,1,225,'Adonirám','','Alomía','','','M','2015-02-04','245','','adoniram.alomia@adventistas.org.bo',''),(2,1,1,33,'Efraín','','Chooue','','','M','1960-04-03','239','','efrain.choque@adventistas.org.bo',''),(3,1,1,262,'María','','Contreras','','Vela','F','2019-10-17','223','','maria.contreras@adventistas.org.bo',''),(4,1,1,212,'Jeanete','','Lima','','De souza','F','2015-03-07','242','','jeanete.lima@adventistas.org.bo',''),(5,1,1,276,'Luis mário','','De souza','','','M','2025-07-15','236','58101','luis.mario@adventistas.org.bo',''),(6,1,1,8,'Javier','','Guerrero','','','M','1973-05-05','237','','javier.guerrero@adventistas.org.bo',''),(7,1,1,371,'Amasías','','Lucas','','','M','2014-03-15','','','','amasiaslucas@hotmail.com'),(8,1,1,368,'César','','Mena','','','M','2018-12-17','227','','cesar.mena@adventistas.org.bo',''),(9,1,1,255,'Andreia','','Giménez','','Mendizábal','F','1969-12-31','247','','andreia.gimenez@adventistas.org.bo',''),(10,1,1,374,'Henrry','','Mendizábal','','','M','1977-06-06','235','58102','henrry.mendizabal@adventistas.org.bo',''),(11,1,1,353,'Huáscar','','Parada','','','M','1969-12-31','234','58103','huascar.parada@adventistas.org.bo',''),(12,1,1,229,'Waldhemir','','Ríos','','','M','2020-04-15','232','58110','waldhemir.rios@adventistas.org.bo',''),(13,1,1,58,'Alfredo','','Santa cruz','','','M','2015-10-05','222','','alfredo.santacruz@adventistas.org.bo',''),(14,1,1,372,'Carlos','','Zurita','','','M','2015-05-15','226','','carlos.zurita@adventistas.org.bo',''),(15,1,2,48,'Carla','','Aguirre','','','F','1988-02-11','244','','carla.aguirre@adventistas.org.bo',''),(16,1,2,55,'Adelaida','','Aruquipa','','','F','1969-12-31','','','',''),(17,1,2,355,'Moisés','','Calle','','','M','2015-05-11','232','','moises.calle@adventistas.org.bo',''),(18,1,2,17,'Guillermo','','Cartagena','','','M','2013-06-15','','','guillermo.cartagena@adventistas.org.bo',''),(19,1,2,30,'Mariana','','Claure','','','F','1989-10-05','233','','mariana.claure@adventistas.org.bo',''),(20,1,2,355,'Eloy','Javier','Fernández','','','M','2016-09-15','232','','javier.fernandez@adventistas.org.bo',''),(21,1,2,7,'José luis','','Mamani','','','M','2019-10-15','243','','jose.mamani@adventistas.org.bo',''),(22,1,2,244,'Flora','','Martínez','','','F','1969-12-31','','','',''),(23,1,2,40,'Vivian','','Mendoza','','','F','2024-11-15','','','vivian.mendoza@adventistas.org.bo',''),(24,1,2,327,'Rosa','','Nacif','','','F','2015-03-03','249','','rosa.nacif@adventistas.org.bo',''),(25,1,2,39,'David','','Narvaez','','','M','1980-11-07','','','david.narvaez@adventistas.org.bo',''),(26,1,2,288,'Vivianna','','Vergara','','Olivares','F','2025-05-15','221','58100','vivianna.vergara@adventistas.org.bo',''),(27,1,2,335,'Martha','','Ribera','','','F','2028-01-15','246','','martha.ribera@adventistas.org.bo',''),(28,1,2,333,'Ruth','','Pairo','','Ríos','F','1969-12-31','241','','ruth.pairo@adventistas.org.bo',''),(29,1,2,268,'Jéssica','','Rodríguez','','','F','1994-04-08','','','jessica.rodriguez@adventistas.org.bo',''),(30,1,2,244,'Donata','','Silvestre','','Ayala','F','2015-04-02','','','',''),(31,1,2,71,'Patricia','','Solís','','Narvaez','F','2019-09-15','225','','patricia.solis@adventistas.org.bo','psolisbolivia@gmail.com'),(32,1,2,59,'Valerio','','Tancara','','','M','2015-09-12','','','',''),(33,1,2,355,'René','','Vásquez','','','M','2026-04-15','232','','rene.vasquez@adventistas.org.bo',''),(34,1,2,55,'Juanita','','Vega','','','F','1969-12-31','','','',''),(35,1,2,40,'Shirley','','Villca','','','F','2015-01-01','','','shirley.villca@adventistas.org.bo',''),(36,1,2,344,'Gilvia','','Vivas','','Choque','F','1969-12-31','238','','gilvia.vivas@adventistas.org.bo',''),(37,2,3,280,'David','','Blanco','','','M','2015-09-06','','','david.blanco@adventistas.org',''),(38,2,3,280,'Rodrigo','','Calderón','','','M','2015-10-26','','','rodrigo.calderon@adventistas.org',''),(39,2,3,280,'Jhony','','Calle','','','M','2015-12-12','','','jhony.calle@adventistas.org',''),(40,2,3,280,'Orlando','','Cari','','','M','2015-04-01','','','orlando.cari@adventistas.org',''),(41,2,3,280,'Samuel','','Cari','','','M','1990-04-15','','','samuel.cari@adventistas.org',''),(42,2,3,280,'Ronny','','Castillo','','','M','2015-04-12','','','rony.castillo@adventistas.org',''),(43,2,3,280,'Héctor','','Copa','','','M','1982-09-21','','','hector.copa@adventistas.org',''),(44,2,3,295,'Josias','','Giménez','','','M','1985-01-18','','','josias.gimenez@adventistas.org',''),(45,2,3,280,'Cristhian','','Jiménez','','','M','2015-04-02','','','cristhian.jimenez@adventistas.org',''),(46,2,3,280,'Jonathan','','Jiménez','','','M','2015-09-04','','','jonathan.jimenez@adventistas.org',''),(47,2,3,280,'Denner','','Llanos','','','M','2015-07-24','','','denner.llanos@adventistas.org',''),(48,2,3,94,'Roberto','','Ontiveros','','','M','2015-04-12','','','roberto.ontiveros@adventistas.org',''),(49,2,3,280,'Abel','','Ortiz','','','M','2015-10-08','','','abel.ortiz@adventistas.org',''),(50,2,3,280,'Moisés','','Rodríguez','','','M','2015-03-12','','','moises.rodriguez@adventistas.org',''),(51,2,3,280,'Alex','','Salazar','','','M','2015-06-01','','','alex.salazar@adventistas.org',''),(52,2,3,280,'Amed','','Tancara','','','M','2015-08-30','','','amed.tancara@adventistas.org',''),(53,2,3,280,'Adalid','','Flores','','','M','1990-03-27','','','adalid.flores@adventistas.org',''),(54,2,3,280,'Marco antonio','','Aguilar','','','M','1989-10-21','','','marco.aguilar@adventistas.org',''),(55,2,3,280,'Luis fernando','','Poma','','','M','1992-04-26','','','luis.poma@adventistas.org',''),(56,2,3,280,'Osvaldo','','Rodriguez','','','M','1988-07-31','','','osvaldo.rodriguez@adventistas.org',''),(57,2,3,280,'Ronald','','Luna','','','M','1990-12-09','','','ronald.luna@adventistas.org',''),(58,2,3,280,'Isabel','Rosmery','Barja','','','F','1991-12-01','','','rosmery.barja@adventistas.org',''),(59,2,3,280,'Héctor','','Vélez','','','M','2015-03-01','','','hector.velez@adventistas.org',''),(60,2,3,280,'Judith','','Villanueva','','','F','2015-09-27','','','judith.villanueva@adventistas.org','');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conyuguepersonal`
--

DROP TABLE IF EXISTS `conyuguepersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conyuguepersonal` (
  `idConyuguePersonal` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  `fechaMatrimonio` date DEFAULT NULL,
  PRIMARY KEY (`idConyuguePersonal`),
  KEY `idPersona` (`idPersona`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conyuguepersonal`
--

LOCK TABLES `conyuguepersonal` WRITE;
/*!40000 ALTER TABLE `conyuguepersonal` DISABLE KEYS */;
INSERT INTO `conyuguepersonal` VALUES (1,4,1,'2005-07-13'),(2,198,4,'2017-07-26');
/*!40000 ALTER TABLE `conyuguepersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursoestudiado`
--

DROP TABLE IF EXISTS `cursoestudiado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursoestudiado` (
  `idCursoEstudiado` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonal` int(11) NOT NULL,
  `nombreInstitucion` varchar(100) NOT NULL,
  `cursoEstudiado` varchar(100) NOT NULL,
  `anhoEstudio` int(11) NOT NULL,
  `religionInstitucion` varchar(50) DEFAULT NULL,
  `respaldoTituloPDF` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idCursoEstudiado`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursoestudiado`
--

LOCK TABLES `cursoestudiado` WRITE;
/*!40000 ALTER TABLE `cursoestudiado` DISABLE KEYS */;
INSERT INTO `cursoestudiado` VALUES (2,1,'INFOCAL','Contaduria siglo XXII',2004,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/curso-Contaduria siglo XXII-2004-INFOCAL-78455454.jpg'),(3,1,'INFOCAL','Gastronomia',2009,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/curso-Gastronomia-2009-INFOCAL-78455454.jpg'),(4,4,'Auza Arnez','Secretariado Ejecutivo',2016,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/curso-Secretariado Ejecutivo-2016-Auza Arnez-846441.jpg'),(5,5,'UTO','Contaduria siglo XXII',2014,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/curso-Contaduria siglo XXII-2014-UTO-4541212.jpg');
/*!40000 ALTER TABLE `cursoestudiado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentocontacto`
--

DROP TABLE IF EXISTS `departamentocontacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentocontacto` (
  `idDepartamentoContacto` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoDepartamentoContacto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccionWeb` varchar(100) DEFAULT NULL,
  `casillaPostal` varchar(10) DEFAULT NULL,
  `rutaLogo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idDepartamentoContacto`),
  KEY `idTipoDepartamentoContacto` (`idTipoDepartamentoContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentocontacto`
--

LOCK TABLES `departamentocontacto` WRITE;
/*!40000 ALTER TABLE `departamentocontacto` DISABLE KEYS */;
INSERT INTO `departamentocontacto` VALUES (1,1,'UNIÓN BOLIVIANA (UB)','Av. Simón López 391 - B° Cala Cala - Cochabamba','','www.ub.adventistas.org','3535',NULL),(2,2,'INSTITUTO ADVENTISTA DE TECNOLOGÍA (IATec)','Av. Simón Patiño Km. 1, s/n - Pairumani, Vinto','','','',NULL),(3,3,'SERVICIO DE PUBLICACIONES ADVENTISTA (SPA)','Av. Juan de la Rosa esq. Diómedes de Pereira s/n, zona Sarco - Cochabamba','','www.adventistas.org.bo','3525',NULL),(4,4,'UNIVERSIDAD ADVENTISTA DE BOLIVIA (UAB)','Av. Simón Patiño Km. 1, s/n - Pairumani, Vinto','info@uab.edu.bo','www.uab.edu.bo','',NULL);
/*!40000 ALTER TABLE `departamentocontacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deporte`
--

DROP TABLE IF EXISTS `deporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deporte` (
  `idDeporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDeporte` varchar(50) NOT NULL,
  PRIMARY KEY (`idDeporte`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deporte`
--

LOCK TABLES `deporte` WRITE;
/*!40000 ALTER TABLE `deporte` DISABLE KEYS */;
INSERT INTO `deporte` VALUES (1,'FUTBOL'),(2,'FUTBOL DE SALON'),(3,'VOLLEY'),(4,'BASQUET'),(5,'TENIS'),(6,'NATACION'),(7,'WALLY'),(8,'FRONTON'),(9,'AJEDREZ'),(10,'FISICOCULTURISMO'),(11,'RUGBY'),(12,'FUTBOL AMERICANO');
/*!40000 ALTER TABLE `deporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportepersonal`
--

DROP TABLE IF EXISTS `deportepersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportepersonal` (
  `idDeporte` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  KEY `idDeporte` (`idDeporte`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportepersonal`
--

LOCK TABLES `deportepersonal` WRITE;
/*!40000 ALTER TABLE `deportepersonal` DISABLE KEYS */;
INSERT INTO `deportepersonal` VALUES (2,1),(1,1),(6,2),(3,2),(3,4),(4,4),(9,4),(4,5),(1,5),(2,5),(6,5),(3,5),(7,5),(2,6),(6,6),(3,6),(1,8),(2,8),(3,8);
/*!40000 ALTER TABLE `deportepersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedad` (
  `idEnfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEnfermedad` varchar(100) NOT NULL,
  PRIMARY KEY (`idEnfermedad`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad`
--

LOCK TABLES `enfermedad` WRITE;
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
INSERT INTO `enfermedad` VALUES (1,'RINTITIS'),(2,'ASMA'),(3,'URTICARIA'),(4,'DERMATITIS');
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedadpersonal`
--

DROP TABLE IF EXISTS `enfermedadpersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedadpersonal` (
  `idEnfermedad` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  KEY `idEnfermedad` (`idEnfermedad`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedadpersonal`
--

LOCK TABLES `enfermedadpersonal` WRITE;
/*!40000 ALTER TABLE `enfermedadpersonal` DISABLE KEYS */;
INSERT INTO `enfermedadpersonal` VALUES (2,1),(2,2),(2,4),(2,6),(2,8);
/*!40000 ALTER TABLE `enfermedadpersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadocivil`
--

DROP TABLE IF EXISTS `estadocivil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadocivil` (
  `idEstadoCivil` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstadoCivil` varchar(35) NOT NULL,
  PRIMARY KEY (`idEstadoCivil`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadocivil`
--

LOCK TABLES `estadocivil` WRITE;
/*!40000 ALTER TABLE `estadocivil` DISABLE KEYS */;
INSERT INTO `estadocivil` VALUES (1,'Soltero(a)'),(2,'Casado(a)'),(3,'Viudo(a)'),(4,'Divorciado(a)');
/*!40000 ALTER TABLE `estadocivil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estructurameritos`
--

DROP TABLE IF EXISTS `estructurameritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estructurameritos` (
  `idEstructuraMerito` int(11) NOT NULL AUTO_INCREMENT,
  `idTablaMeritoDocenteProfesor` int(11) NOT NULL,
  `idEstructuraMeritoPrimario` int(11) DEFAULT NULL,
  `nombreMerito` varchar(300) NOT NULL,
  `puntajeMerito` int(11) NOT NULL,
  PRIMARY KEY (`idEstructuraMerito`),
  KEY `idTablaMeritoDocenteProfesor` (`idTablaMeritoDocenteProfesor`),
  KEY `idEstructuraMeritoPrimario` (`idEstructuraMeritoPrimario`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructurameritos`
--

LOCK TABLES `estructurameritos` WRITE;
/*!40000 ALTER TABLE `estructurameritos` DISABLE KEYS */;
INSERT INTO `estructurameritos` VALUES (1,1,NULL,'FORMACIÃ“N ACADÃ‰MICA Y PROFESIONAL',50),(2,1,1,'TÃ­tulo Profesional de Licenciatura',10),(3,1,1,'Diplomado en EducaciÃ³n Superior',5),(4,1,1,'MaestrÃ­a o Especialidad en el Ãrea de Salud',15),(5,1,1,'Doctorado',20),(6,1,NULL,'TRABAJOS E INVESTIGACIONES',10),(7,1,6,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas indexadas, 3 puntos hasta un mÃ¡ximo de dos trabajos',6),(8,1,6,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas no indexadas, 2 puntos hasta un mÃ¡ximo de dos trabajos.',4),(9,1,NULL,'EXPERIENCIA LABORAL',15),(10,1,9,'Por cada aÃ±o de servicio en la docencia universitaria y/o profesional en el Ã¡rea, 3 puntos hasta un mÃ¡ximo de cinco aÃ±os',15),(11,1,NULL,'PRODUCCIÃ“N INTELECTUAL',9),(12,1,11,'LIBROS - Por cada libro publicado, 5 puntos hasta un mÃ¡ximo de uno.',5),(13,1,11,'TEXTOS, DOSSIERS, MANUALES, GUÃAS DIDÃCTICAS, PROTOCOLOS - Por cada publicaciÃ³n 2 puntos hasta un mÃ¡ximo de dos.',4),(14,1,NULL,'CONGRESOS, SEMINARIOS, CONVENCIONES Y OTROS - Por cada participaciÃ³n en congresos nacionales y/o extranjeros, hasta un mÃ¡ximo de dos participaciones en los Ãºltimos dos aÃ±os. en calidad de:',8),(15,1,14,'Asistente',1),(16,1,14,'Disertante',6),(17,1,NULL,'FORMACIÃ“N ESPECIALIZADA',8),(18,1,17,'Diplomados',4),(19,1,17,'Otros cursos (dos puntos hasta un mÃ¡ximo de 2)',4),(20,2,NULL,'FORMACIÃ“N ACADÃ‰MICA Y PROFESIONAL',50),(21,2,20,'TÃ­tulo Profesional de Licenciatura',10),(22,2,20,'Diplomado en EducaciÃ³n Superior',5),(23,2,20,'MaestrÃ­a o Especialidad',15),(24,2,20,'Doctorado',20),(25,2,NULL,'TRABAJOS E INVESTIGACIONES',10),(26,2,25,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas indexadas, 3 puntos hasta un mÃ¡ximo de dos trabajos',6),(27,2,25,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas no indexadas, 2 puntos hasta un mÃ¡ximo de dos trabajos.',4),(28,2,NULL,'EXPERIENCIA LABORAL',15),(29,2,28,'Por cada aÃ±o de servicio en la docencia universitaria y/o profesional en el Ã¡rea, 3 puntos hasta un mÃ¡ximo de cinco aÃ±os',15),(30,2,NULL,'PRODUCCIÃ“N INTELECTUAL',9),(31,2,30,'LIBROS - Por cada libro publicado, 5 puntos hasta un mÃ¡ximo de uno.',5),(32,2,30,'TEXTOS, DOSSIERS, MANUALES, GUÃAS DIDÃCTICAS, PROTOCOLOS - Por cada publicaciÃ³n 2 puntos hasta un mÃ¡ximo de dos.',4),(33,2,NULL,'CONGRESOS, SEMINARIOS, CONVENCIONES Y OTROS - Por cada participaciÃ³n en congresos nacionales y/o extranjeros, hasta un mÃ¡ximo de dos participaciones en los Ãºltimos dos aÃ±os. en calidad de:',8),(34,2,33,'Asistente',1),(35,2,33,'Disertante',6),(36,2,NULL,'FORMACIÃ“N ESPECIALIZADA',8),(37,2,36,'Diplomados',4),(38,2,36,'Otros cursos (dos puntos hasta un mÃ¡ximo de 2)',4);
/*!40000 ALTER TABLE `estructurameritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacionmeritosdocenteprofesor`
--

DROP TABLE IF EXISTS `evaluacionmeritosdocenteprofesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacionmeritosdocenteprofesor` (
  `idPersonal` int(11) NOT NULL,
  `idEstructuraMerito` int(11) NOT NULL,
  `puntajeMerito` int(11) NOT NULL,
  `evaluacionOficial` tinyint(1) NOT NULL,
  KEY `idPersonal` (`idPersonal`),
  KEY `idEstructuraMerito` (`idEstructuraMerito`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacionmeritosdocenteprofesor`
--

LOCK TABLES `evaluacionmeritosdocenteprofesor` WRITE;
/*!40000 ALTER TABLE `evaluacionmeritosdocenteprofesor` DISABLE KEYS */;
INSERT INTO `evaluacionmeritosdocenteprofesor` VALUES (1,2,2,0),(1,3,2,0),(1,4,1,0),(1,5,0,0),(1,7,3,0),(1,8,2,0),(1,10,5,0),(1,12,2,0),(1,13,1,0),(1,15,1,0),(1,16,1,0),(1,18,0,0),(1,19,3,0),(1,2,2,1),(1,3,2,1),(1,4,1,1),(1,5,0,1),(1,7,3,1),(1,8,2,1),(1,10,5,1),(1,12,2,1),(1,13,1,1),(1,15,1,1),(1,16,1,1),(1,18,0,1),(1,19,3,1),(4,2,5,0),(4,3,3,0),(4,4,2,0),(4,5,1,0),(4,7,0,0),(4,8,2,0),(4,10,3,0),(4,12,1,0),(4,13,1,0),(4,15,1,0),(4,16,2,0),(4,18,2,0),(4,19,2,0),(4,21,2,0),(4,22,2,0),(4,23,10,0),(4,24,5,0),(4,26,3,0),(4,27,1,0),(4,29,2,0),(4,31,1,0),(4,32,1,0),(4,34,0,0),(4,35,2,0),(4,37,2,0),(4,38,0,0),(4,21,2,1),(4,22,2,1),(4,23,3,1),(4,24,10,1),(4,26,0,1),(4,27,2,1),(4,29,1,1),(4,31,2,1),(4,32,2,1),(4,34,0,1),(4,35,5,1),(4,37,0,1),(4,38,0,1);
/*!40000 ALTER TABLE `evaluacionmeritosdocenteprofesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiencialaboral`
--

DROP TABLE IF EXISTS `experiencialaboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiencialaboral` (
  `idExperienciaLaboral` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonal` int(11) NOT NULL,
  `nombreInstitucion` varchar(100) NOT NULL,
  `cargoResponsabilidad` varchar(100) NOT NULL,
  `aniosDeServicio` float(8,2) NOT NULL,
  `religionInstitucion` varchar(50) DEFAULT NULL,
  `motivoRetiro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idExperienciaLaboral`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencialaboral`
--

LOCK TABLES `experiencialaboral` WRITE;
/*!40000 ALTER TABLE `experiencialaboral` DISABLE KEYS */;
INSERT INTO `experiencialaboral` VALUES (1,1,'Hansa','Gerente De Ventas',5.40,'Catolico','Fin De Contrato');
/*!40000 ALTER TABLE `experiencialaboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFacultad` varchar(100) NOT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'INGENIERIA'),(2,'SALUD'),(3,'EDUCACION'),(4,'TEOLOGIA'),(5,'CIENCIAS ECONOMICAS Y ADMINISTRATIVAS');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fax`
--

DROP TABLE IF EXISTS `fax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fax` (
  `idFax` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamentoContacto` int(11) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `prefijo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idFax`),
  KEY `idDepartamentoContacto` (`idDepartamentoContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fax`
--

LOCK TABLES `fax` WRITE;
/*!40000 ALTER TABLE `fax` DISABLE KEYS */;
INSERT INTO `fax` VALUES (1,1,'441-3485','591 - 4'),(2,4,'426-3336','4'),(3,1,'441-3485','591 - 4'),(4,4,'426-3336','4');
/*!40000 ALTER TABLE `fax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hijospersonal`
--

DROP TABLE IF EXISTS `hijospersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hijospersonal` (
  `idHijosPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  PRIMARY KEY (`idHijosPersonal`),
  KEY `idPersona` (`idPersona`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hijospersonal`
--

LOCK TABLES `hijospersonal` WRITE;
/*!40000 ALTER TABLE `hijospersonal` DISABLE KEYS */;
INSERT INTO `hijospersonal` VALUES (1,5,1),(2,6,1),(3,7,1),(4,199,4);
/*!40000 ALTER TABLE `hijospersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugarexpedicion`
--

DROP TABLE IF EXISTS `lugarexpedicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugarexpedicion` (
  `idLugarExpedicion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreLugarExpedicion` varchar(80) NOT NULL,
  PRIMARY KEY (`idLugarExpedicion`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugarexpedicion`
--

LOCK TABLES `lugarexpedicion` WRITE;
/*!40000 ALTER TABLE `lugarexpedicion` DISABLE KEYS */;
INSERT INTO `lugarexpedicion` VALUES (1,'OR'),(2,'LPZ'),(3,'CBBA'),(4,'SCZ'),(5,'TRJ'),(6,'BEN'),(7,'PND'),(8,'SUC'),(9,'CNV');
/*!40000 ALTER TABLE `lugarexpedicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacion`
--

DROP TABLE IF EXISTS `nacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nacion` (
  `idNacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreNacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idNacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacion`
--

LOCK TABLES `nacion` WRITE;
/*!40000 ALTER TABLE `nacion` DISABLE KEYS */;
INSERT INTO `nacion` VALUES (1,'BOLIVIA'),(2,'CHILE'),(3,'BRASIL'),(4,'ECUADOR');
/*!40000 ALTER TABLE `nacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoNoticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `especificacionUsuario` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `rutaImagen` varchar(200) DEFAULT NULL,
  `fechaPublicacion` date NOT NULL,
  PRIMARY KEY (`idNoticia`),
  KEY `idTipoNoticia` (`idTipoNoticia`),
  KEY `idUsuario` (`idUsuario`),
  KEY `especificacionUsuario` (`especificacionUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES (10,2,'Un virus podrÃ­a destruir el sueÃ±o de colonizar Marte','Desde que el hombre iniciÃ³ su aventura fuera del planeta tierra, miles de descubrimientos cientÃ­ficos se desarrollaron con el fin de descubrir los vastos secretos que esconde el universo. Pero a medida que los astronautas comenzaron a pasar mÃ¡s tiempo en el espacio, los problemas relacionados con su salud se hicieron mÃ¡s evidentes. Estos profesionales expuestos a constantes peligros, ahora se les agrega una nueva preocupaciÃ³n, la posibilidad de contraer patologÃ­as a causa de un hongo en el ambiente.\r\n\r\nUn nuevo estudio publicado por la NASA asegurÃ³ que los astronautas de las estaciones espaciales que explorarÃ¡n de manera frecuente Marte, corren un alto riesgo de sufrir afecciones como asma, alergias e infecciones en la piel causadas por un particular hongo denominado Hitchhiking o Autostop.\r\n\r\nEspecialistas afirmaron que estos agentes no solo son corrosibles para el hombre sino tambiÃ©n para los habitad donde se desarrollan (iStock)\r\nEspecialistas afirmaron que estos agentes no solo son corrosibles para el hombre sino tambiÃ©n para los habitad donde se desarrollan (iStock)\r\n\"Caracterizar y comprender los posibles cambios y sucesiÃ³n de especies fÃºngicas es sumamente importante ya que los hongos no sÃ³lo son peligrosos para los habitantes, sino que tambiÃ©n tienen una gran incidencia en el deterioro de los hÃ¡bitats\", asegurÃ³ Kasthuri Venkateswaran, investigador principal del Laboratorio de PropulsiÃ³n a Chorro de la NASA en su estudio.\r\n\r\nLa investigaciÃ³n compuesta por tres equipos de estudiantes alojados en una cÃ¡psula denominada ILMAH, simulÃ³ el ambiente propicio de un vuelo espacial, lo que conllevo a verificar lo pensado. Con el correr de los dÃ­as las colonias de hongos, inclusive cepas daÃ±inas para el organismo humanos, crecieron de manera exponencial en el sitio donde la tripulaciÃ³n vivÃ­a.\r\n\r\nEl grupo de estudio transcurriÃ³ 30 dÃ­as dentro de una capsula donde simulaban estar en el espacio. La fotografÃ­a muestra el ILMAH, lugar de estudio (inverse)\r\nEl grupo de estudio transcurriÃ³ 30 dÃ­as dentro de una capsula donde simulaban estar en el espacio. La fotografÃ­a muestra el ILMAH, lugar de estudio (inverse)\r\nEl equipo sujeto a anÃ¡lisis vivieron en el ILMAH por incrementos de 30 dÃ­as. No se les permitÃ­a salir, y su Ãºnico contacto fÃ­sico con el mundo exterior era tan solo una fuente de aire filtrado proveniente del aire libre. Los miembros de la tripulaciÃ³n recibieron un horario de trabajo semanal que incluÃ­a la limpieza del hÃ¡bitat y la recolecciÃ³n de muestras de superficie de ocho lugares en cuatro puntos temporales. Pero pese a estas tÃ©cnicas la reproducciÃ³n de organismos continuÃ³ en crecimiento.\r\n\r\n\"Los hongos son extremÃ³filos que pueden sobrevivir a duras condiciones y ambientes como desiertos, cuevas o sitios de accidentes nucleares, y se sabe que son difÃ­ciles de erradicar de otros entornos, incluyendo espacios cerrados\", afirmÃ³ Venkateswaran.\r\n\r\nLos hongos son extremÃ³filos que pueden sobrevivir a duras condiciones y ambientes como desiertos, cuevas o sitios de accidentes nucleares (iStock)\r\nLos hongos son extremÃ³filos que pueden sobrevivir a duras condiciones y ambientes como desiertos, cuevas o sitios de accidentes nucleares (iStock)\r\nUna razÃ³n del considerable aumento de estos agentes podrÃ­a ser que el sistema inmunolÃ³gico de los participantes se encuentra debilitado como respuesta al estrÃ©s de vivir en un ambiente confinado. Pero dicha teorÃ­a aÃºn no estÃ¡ completamente clara, ya que la poblaciÃ³n de hongos cambiÃ³ de manera constante, por ejemplo, los agentes cladosporium cladosporioides -un hongo al aire libre comÃºn- aumentaron.\r\n\r\nEsto rara vez causa infecciones en los seres humanos, pero podrÃ­a ser el factor de reacciones asmÃ¡ticas, especialmente en individuos con sistemas inmunolÃ³gicos debilitados, como lo es en el caso de los astronautas. El equipo trabaja en tÃ©cnicas avanzadas de desinfecciÃ³n y control del espacio donde los profesionales pasan la mayor parte del tiempo de vuelo.\r\n\r\nUna de las respuestas ante el creciente aumento de estos agentes puede s la disminuciÃ³n del sistema inmunolÃ³gico y el estrÃ©s al que se someten los astronautas durante el viaje (iStock)\r\nUna de las respuestas ante el creciente aumento de estos agentes puede s la disminuciÃ³n del sistema inmunolÃ³gico y el estrÃ©s al que se someten los astronautas durante el viaje (iStock)\r\n\"El conocimiento profundo del micobioma viable permitirÃ¡ el desarrollo de los procedimientos requeridos de mantenimiento y limpieza en un hÃ¡bitat cerrado como ILMAH y tambiÃ©n evitarÃ¡ que se deteriore y se convierta en un peligro para la salud de sus habitantes. Sin embargo, para poder demostrar que el aumento de la diversidad fÃºngica es el resultado de la presencia humana, el micobioma de los ocupantes tambiÃ©n tendrÃ¡ que ser estudiada en profundidad\", concluyÃ³ Venkateswaran.',2,NULL,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/patologias-astronautas1.jpeg','2017-07-13'),(11,1,'Marcelo Gomes volverÃ¡ a jugar en San JosÃ©','Oruro - El volante brasileÃ±o, Marcelo Gomes, volverÃ¡ a ser jugador de San JosÃ©, tras tres aÃ±os de haber dejado el club, el anuncio lo realizÃ³ Ã©l mismo en su cuenta personal de Facebook.\r\n\r\nEl experimentado Gomes, de 35 aÃ±os de edad, jugÃ³ en UniÃ³n Central, Universitario, BolÃ­var, Blooming, Aurora y Wilstermann, en primera divisiÃ³n del paÃ­s.\r\n\r\nGomes se suma a la larga lista de refuerzos previamente anunciados por Wilson MartÃ­nez, presidente de San JosÃ©.',2,NULL,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/images-jul10-1044.jpg','2017-07-13'),(12,2,'PolicÃ­a confirma que tres asaltantes y un uniformado murieron en la balacera de Santa Cruz','El comandante nacional de la PolicÃ­a, Abel de la Barra, confirmÃ³ que tres delincuentes de nacionalidad brasilera fallecieron en el enfrentamiento armado que se suscitÃ³ esta maÃ±ana en una joyerÃ­a de la ciudad de Santa Cruz. Asimismo, lamentÃ³ la muerte de un uniformado durante el cruce armado.  \r\n\r\nEsta maÃ±ana una banda de atracadores se enfrentÃ³ a los uniformados en la avenida Irala, ubicada en plena zona cÃ©ntrica, a cuatro cuadras del mercado la Ramada, provocando pÃ¡nico entre las personas que circulaban por la zona.',2,NULL,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/1320107939_10213829375231191_1920802782_o.jpg','2017-07-13'),(13,2,'Chile envÃ­a a su agente a reuniÃ³n sobre frontera','La agente ante la Corte Internacional de Justicia de La Haya para la demanda por el Silala y directora de Frontera y LÃ­mites de Chile, Ximena Fuentes, dirigirÃ¡ su delegaciÃ³n en la reuniÃ³n del 25 de julio en Santa Cruz. Chile propuso trabajar sobre funcionamiento pleno del complejo ChungarÃ¡-Tambo Quemado, la aplicaciÃ³n del Acuerdo de PolicÃ­as y la cooperaciÃ³n aduanera.\r\n\r\nEl canciller chileno Heraldo MuÃ±oz hizo esa declaraciÃ³n ayer en una conferencia de prensa acompaÃ±ado de legisladores de la comisiÃ³n de relaciones exteriores y excancilleres, visiblemente molesto por la declaraciÃ³n que hizo el presidente Evo Morales un dÃ­a antes referida a que su homÃ³loga, Michelle Bachelet, estaba â€œsecuestrada por la oligarquÃ­a pinochetistaâ€.\r\n\r\nPese a ello, afirmÃ³ que su paÃ­s asistirÃ¡ al encuentro, que no es de ministros sino de equipos tÃ©cnicos. â€œEs evidente que al seÃ±or Evo Morales no le agrada la idea de realizar esta reuniÃ³n del ComitÃ© de Fronteras, porque ha intentado torpedearla con nuevos insultos contra Chile, sus autoridades y con falsedades, negando que Chile estuviese convocado oportunamente a esta reuniÃ³nâ€, manifestÃ³ MuÃ±oz.\r\n\r\nAgregÃ³ que Chile no caerÃ¡ â€œen el juego del seÃ±or Evo Morales, en sus provocaciones para suspender la reuniÃ³n, iremos a este ComitÃ© de Fronteras en Santa Cruz, insisto, Chile propuso el lugarâ€, argumentÃ³.\r\n\r\nLa idea de un ComitÃ© de Fronteras ha cobrado relevancia tras los dos Ãºltimos incidentes en la frontera entre ambos paÃ­ses.\r\n\r\nAgenda\r\n\r\nEl Canciller indicÃ³ que serÃ¡ â€œtÃ©cnica, no es de nivel ministerial como se ha informado errÃ³neamente por alguna prensa boliviana (â€¦) Lo que estÃ¡ en La Haya, permanece en La Hayaâ€. Con ello, adelantÃ³ que la delegaciÃ³n chilena estÃ¡ presidida por la directora de Fronteras y LÃ­mites, y actual agente ante La Haya por la demanda del Silala, Ximena Fuentes, e integrada por personal de varios ministerios y entidades que tengan que ver con temas fronterizos.\r\n\r\nSegÃºn el portal urgentebo, Chile planteÃ³ una contrapropuesta sobre la agenda y propuso a Bolivia tres temas para tratar: â€œFuncionamiento pleno del complejo integrado ChungarÃ¡-Tambo Quemado; implementaciÃ³n del Acuerdo de PolicÃ­as de 2008, y cooperaciÃ³n aduanera con el objetivo de acordar medidas destinadas a disminuir el contrabando y la subfacturaciÃ³nâ€.\r\n\r\nEn tanto, el canciller Fernando Huanacuni seÃ±alÃ³ que la propuesta de Bolivia es que, durante XIII reuniÃ³n del ComitÃ© de Fronteras Bolivia-Chile, se trabaje en dos comisiones: facilitaciÃ³n fronteriza y la de cooperaciÃ³n fronteriza, cada una con subcomisiones.\r\n\r\nSin embargo, aÃºn no se ha concertado la agenda final que se abordarÃ¡ entre ambos paÃ­ses.\r\n\r\nSe prevÃ© que las delegaciones estÃ©n compuestas por la presencia de representantes de las instituciones de migraciÃ³n, aduana, Fuerzas Armadas y PolicÃ­a de ambos paÃ­ses.\r\n\r\n \r\n\r\nPOLÃ‰MICA POR CAMIONETA ROBADA\r\n\r\nERBOL\r\n\r\nEl ministro de Gobierno, Carlos Romero, informÃ³ que el vehÃ­culo usado por la PolicÃ­a en Uyuni y que supuestamente fue robado en Chile, fue incautado y no tiene denuncia de robo en Bolivia. La empresa chilena All Machine asegurÃ³ que la camioneta roja, usada por la PolicÃ­a Boliviana en Uyuni, fue robada en 2015. Como prueba, exhibiÃ³ fotos en que se observa que el vehÃ­culo tiene pintada incluso la pÃ¡gina web de la compaÃ±Ã­a. El canciller Heraldo MuÃ±oz seÃ±alÃ³ que la reuniÃ³n bilateral â€œserÃ¡ una buena oportunidad para preguntar a nuestra contraparte quÃ© hace un auto robado en manos de la PolicÃ­a Nacional de Boliviaâ€.\r\n\r\nRomero indicÃ³ que, de acuerdo con reporte policial, no existe denuncia de robo de esta camioneta registrada en ninguna entidad de Bolivia.\r\n\r\nâ€œEl informe que se me proporcionÃ³ es que es un vehÃ­culo que ha sido otorgado por la FiscalÃ­a en calidad de vehÃ­culo incautadoâ€, agregÃ³ Romero.\r\n\r\n \r\n\r\nSE REACTIVARÃ DESPUÃ‰S DE CINCO AÃ‘OS\r\n\r\nSe trata de la XIII reuniÃ³n del ComitÃ© de Fronteras\r\n\r\nEl ComitÃ© de Frontera Bolivia-Chile fue creado en marzo de 1997 y comprende las regiones chilenas I de TarapacÃ¡ y II de Antofagasta y los departamentos de La Paz, Oruro y PotosÃ­ de Bolivia. Asimismo, los pasos fronterizos habilitados entre ambos paÃ­ses y su correspondiente Ã¡rea geogrÃ¡fica.\r\n\r\nReuniones de ComitÃ©\r\n\r\n- 17 y18 de octubre de 2005 en La Paz, se realiza al VI ReuniÃ³n del ComitÃ© de Fronteras.\r\n\r\nTrabajan cuatro comisiones: facilitaciÃ³n fronteriza, cooperaciÃ³n fronteriza, desarrollo fronterizo e integraciÃ³n fronteriza. Se define la circulaciÃ³n de turistas con cÃ©dula de identidad.\r\n\r\n- El dÃ­a 10 de octubre de 2006 tuvo lugar en la ciudad de Arica, la VII ReuniÃ³n del ComitÃ© de Frontera Chile-Bolivia.\r\n\r\n- Los dÃ­as 2 y 3 de octubre de 2007, en la ciudad de La Paz, Bolivia, se llevÃ³ a cabo la VIII ReuniÃ³n del ComitÃ© de Frontera Bolivia-Chile. Como ejemplo en tema policial abordan temas de ingreso ilegal de personas indocumentadas; trÃ¡fico de personas, menores; Convenio de CooperaciÃ³n Policial; cooperaciÃ³n para la vigilancia fronteriza; intercambio de informaciÃ³n sobre personas requeridas por terrorismo y otros delitos; mecanismo de prevenciÃ³n y restituciÃ³n de vehÃ­culos robados y hurtados.\r\n\r\n- En la ciudad de Iquique, los dÃ­as 29 y 30 de septiembre de 2008, se llevÃ³ a cabo la IX ReuniÃ³n del ComitÃ© de Frontera Chile-Bolivia. Entre los temas de importancia se contempla el funcionamiento de complejos fronterizos de Tambo Quemado y ChungarÃ¡.\r\n\r\n- Los dÃ­as 27 y 28 de agosto de 2009, en la ciudad de La Paz, Bolivia, se llevÃ³ a cabo la X ReuniÃ³n del ComitÃ© de Frontera Bolivia-Chile.\r\n\r\n- En la ciudad de Iquique, los dÃ­as 1 y 2 del mes de septiembre de 2010, se llevÃ³ a cabo la XI ReuniÃ³n del ComitÃ© de Frontera e IntegraciÃ³n Chile-Bolivia. En la subcomisiÃ³n de controles integrados de frontera, se consideran los temas relativos a Tambo Quemado-ChungarÃ¡; Pisiga-Colchane; Avaroa-OllagÃ¼e; Hito CajÃ³n; CharaÃ±a-Visviri.\r\n\r\n- En la ciudad de La Paz, entre el 5 y 6 de diciembre de 2011, se realiza la XII ReuniÃ³n del ComitÃ© de Frontera.\r\n\r\nÃ‰sta serÃ­a la Ãºltima reuniÃ³n bilateral registrada que se dio durante el gobierno de SebastiÃ¡n PiÃ±era (2010-2014).\r\n\r\n- DespuÃ©s de cinco aÃ±os, este 25 de julio se realizarÃ¡ la XIII ReuniÃ³n del ComitÃ© de Fronteras en la ciudad de Santa Cruz con la participaciÃ³n de las delegaciones de ambos paÃ­ses.',2,NULL,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/131_a3_efe.jpg','2017-07-13'),(14,2,'COB alerta con extremar las medidas','DespuÃ©s de protagonizar una jornada de bloqueos y marchas en cuatro ciudades del paÃ­s en rechazo a la variaciÃ³n de las tarifas de la electricidad, el secretario ejecutivo de la Central Obrera Boliviana (COB), Guido Mitma, advirtiÃ³ al Gobierno con agudizar sus medidas de presiÃ³n si no atiende sus pedidos. Mientras que el ministro de Gobierno, Carlos Romero, calificÃ³ el paro como un fracaso.\r\n\r\nLos bloqueos instalados en Cochabamba por fabriles y empleados municipales en los puentes de acceso a la ciudad y los municipios de Quillacollo y Sacaba ocasionaron problemas por varias horas.\r\n\r\nEl sector obrero de La Paz, Cochabamba, Chuquisaca y Oruro protagonizÃ³ ayer una serie de marchas y bloqueos en rechazo a la variaciÃ³n de las tarifas de electricidad y a la acciÃ³n popular interpuesta por el Defensor del Pueblo.\r\n\r\nSegÃºn el secretario ejecutivo de la Central Obrera Boliviana (COB), Guido Mitma, la movilizaciÃ³n que protagonizaron organizaciones sociales afiliadas al ente matriz fue â€œcontundenteâ€. â€œEsto no sÃ³lo se trata de la COB, se trata del pueblo boliviano, del ciudadano de a pie. En caso de omisiÃ³n por parte del gobierno, las medidas de presiÃ³n se van a agudizarâ€, afirmÃ³ citado en ANF.\r\n\r\nEn ese mismo sentido, el ejecutivo de la central Obrera Departamental (COD), Ãngel Camacho, solicitÃ³ un ampliado nacional para evaluar el paro de 24 horas y amenazÃ³ con otro de 48 horas para que el Gobierno atienda las demandas del sector. Cientos de trabajadores concluyeron la jornada de movilizaciones con un cabildo en la plaza 14 de Septiembre.\r\n\r\nEn tanto, Romero seÃ±alÃ³ que en La Paz se registrÃ³ un bloqueo esporÃ¡dico a la altura de la Obelisco tras una marcha de al menos 12.000 personas que descendiÃ³ desde el Multifuncional de la Ceja de El Alto hasta el centro de la sede de gobierno. PuntualizÃ³ que el acceso al aeropuerto de El Alto estaba habilitado.\r\n\r\nEn Chuquisaca, los bloqueos fueron convocados desde las 8:00 aproximadamente, pero se reforzaron desde las 9:00 en varias zonas de la capital. Los cuatro accesos a esa ciudad quedaron interrumpidos, al igual que calles y avenidas intermedias, como algunas del pleno centro de la ciudad.\r\n\r\nEn Oruro, la movilizaciÃ³n se cumpliÃ³ con sectores afiliados a la COD como los trabajadores de la AlcaldÃ­a que cerrÃ³ sus puertas, administrativos de la Caja Nacional de Salud, fabriles, Empresa Municipal de Aseo, ademÃ¡s del sector minero asalariado de Huanuni.\r\n\r\nPor otra parte, en la ciudad de Santa Cruz, la COD no acatÃ³ la medida de presiÃ³n, pero se registraron protestas esporÃ¡dicas por iniciativa ciudadana.\r\n\r\nEntre tanto, el ministro de Trabajo, HÃ©ctor Hinojosa, descalificÃ³ la medida de presiÃ³n de la COB. Dijo que ese sector no tiene motivos justificados para llevar esta movilizaciÃ³n, porque el Gobierno estÃ¡ atendiendo las demandas de la clase trabajadora. DestacÃ³ que algunos sectores productivos no participen de la misma.\r\n\r\nEl ministro Romero seÃ±alÃ³ que la COB movilizÃ³ a 18 mil personas, pero a su criterio esas marchas son â€œcuantitativamente poco significativasâ€.\r\n\r\n \r\n\r\nBLOQUEOS INTERRUMPIERON EL TRANSPORTE EN COCHABAMBA\r\n\r\nCientos de trabajadores fabriles de Cochabamba instalaron ayer el punto de bloqueo mÃ¡s contundente a la altura del puente Huayculi en el kilÃ³metro 12 de la avenida Blanco Galindo donde se cortÃ³ el trÃ¡fico vehicular por algunas horas. El contingente policial que se desplazÃ³ en la zona atravesÃ³ momentos tensos al intentar despejar la vÃ­a.\r\n\r\nEl viceministro de RÃ©gimen Interior, Jaime Quiroga, se trasladÃ³ al punto de bloqueo de Huyaculi tras identificarlo como uno de los mÃ¡s contundentes. AÃ±adiÃ³ que Ã©ste fue el Ãºnico que obstruyÃ³ el trÃ¡fico vehicular interdepartamental.\r\n\r\nPor otra parte, en el transcurso de la maÃ±ana de ayer, los puentes Killman, Recoleta y Quillacollo fueron tomados por otros sectores afiliados a la COD, a pesar que la PolicÃ­a desplazÃ³ un contingente de 700 efectivos para resguardar estos lugares.\r\n\r\nEl repliegue de los transportistas federados perjudicÃ³ a las personas que necesitaban trasladarse de un lugar a otro. Pocas lÃ­neas del Transporte Libre trabajaron con normalidad.\r\n\r\n \r\n\r\nREPERCUSIONES  SOBRE LOS BLOQUEOS\r\n\r\nÃngel Camacho, ejecutivo de la COD\r\n\r\nNosotros esperamos despuÃ©s de estas movilizaciones la convocatoria de la Central Obrera Boliviana (COB) a un ampliado para analizar a nivel nacional, porque nosotros como Cochabamba vamos a seguir en pie para que se anulen las dos resoluciones que han salido. Merecemos respeto los ciudadanos bolivianos, todos somos trabajadores, pero han tenido 10 dÃ­as para poder convocarnos y poder trabajar. \r\n\r\nIvÃ¡n Canelas, gobernador\r\n\r\nEn las primeras horas de la maÃ±ana no ha habido prÃ¡cticamente ninguna medida de presiÃ³n. Los trabajadores de la administraciÃ³n pÃºblica y privada, con alguna dificultad por falta de transporte, han llegado a sus fuentes de trabajo. Por tanto, hay normalidad en el trabajo en todas estas instituciones. El Transporte Federado ha acatado la medida, pero en el caso del libre, no, pero nos han informado que han ido replegando sus unidades ante amenazas.',2,2,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/131_a4_rochaaaa.jpg','2017-07-13'),(15,2,' El Rey pide al Reino Unido diÃ¡logo para Gibraltar.','En su franco discurso ante el Parlamento britÃ¡nico, aplaudido durante un minuto tambiÃ©n por Theresa May, lamenta el Brexit pero emplaza a Â«mantener, incluso mejorarÂ» las relaciones bilaterales. Defiende tambiÃ©n los derechos de los ciudadanos comunitarios en Reino Unido. Felipe VI e Isabel II coinciden en la Â«solidezÂ» e Â«intensidadÂ» de la amistad entre EspaÃ±a y Reino Unido. Editorial ABC: Â«Discurso histÃ³rico en WestminsterÂ». La visita de los Reyes al Reino Unido, en imÃ¡genes.',2,3,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/131203223686-kmqC--250x140@abc.jpg','2017-07-13'),(16,3,'Nuevo Tiempo','klsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdcklsdsdjksdkljsdkjvsdlvsdkcbsdjkjsdbjdskvdsgvjksdjvdsjvksdjkvgsdjkvbsdjvgsdjkbjksdjkbjkscssdc',2,4,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/14logo_educacion_adventista2.fw_.png','2017-07-14'),(17,8,'AlcaldÃ­a reporta 90% de avance en refacciÃ³n de escuelas','A un dÃ­a  del retorno a clases, los trabajos de refacciÃ³n y mantenimiento de 174 establecimientos educativos llegaron a un 90% de avance, indicÃ³ el alcalde de La Paz, Luis Revilla. SeÃ±alÃ³ que los trabajos se extenderÃ¡n hasta el martes prÃ³ximo.  \r\n \r\n\"Se ha cumplido casi con la totalidad de las refacciones, hemos cumplido mÃ¡s del 90%. Seguimos trabajando este fin de semana y algunas cosas muy de detalle, menores tambiÃ©n, vamos a tener que hacerlas entre lunes y martes de la prÃ³xima semanaâ€, indicÃ³ el burgomaestre.\r\n \r\nSeÃ±alÃ³ que los trabajos pendientes para el retorno a clases corresponden a algunos detalles ya que los problemas con  baÃ±os, el sistema elÃ©ctrico y otros ya fueron resueltas. Esto, segÃºn la autoridad, garantiza  las condiciones para los mÃ¡s de 120 mil estudiantes que maÃ±ana volverÃ¡n a las aulas.\r\n \r\nEl jefe de la Unidad de Mantenimiento de Infraestructura Social de la AlcaldÃ­a de La Paz, JosÃ© Luis Amador, explicÃ³ que trabajaron  bajo un cronograma estricto de cobertura. Sin embargo, durante la Ãºltima semana se generaron varios  retrasos debido a que los obreros no pudieron ingresar a algunos establecimientos porque  los porteros no abrieron las puertas.\r\n \r\nLas tareas mÃ¡s recurrentes fueron limpieza de canaletas, bajantes y cÃ¡maras; el arreglo del sistema elÃ©ctrico y sanitario; ademÃ¡s del cambio de vidrios. La unidad identificÃ³ que los daÃ±os   son hechos por los mismos estudiantes. \"Hemos encontrado restos de comida,  espumas de carnaval en las tuberÃ­asâ€, manifestÃ³ Amador.\r\n\r\nRevilla seÃ±alÃ³ que otra de las labores pendientes es la entrega de mobiliario escolar que se realizarÃ¡ de acuerdo a cronograma durante los dos siguientes meses. AdelantÃ³ que una nueva compra de este equipamiento serÃ¡ hecha a fin de aÃ±o.',2,NULL,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/23f700x390-170091_209109_77.jpg','2017-07-23'),(18,8,'Chamarras â€œglobosâ€, novedad para combatir el frÃ­o en clases','Desde chamarras \"globosâ€ hasta abrigos \"rompe vientosâ€  son las prendas mÃ¡s cotizadas  por los padres de familia, quienes ajetreados buscan prendas para que sus retoÃ±os puedan combatir  el frÃ­o en el retorno a clases. Ayer,  desde las 8:00, cientos de personas recorrieron las principales calles de la avenida Tumusla, Illampu, Buenos Aires y Eguino.\r\n \r\n\"He bajado desde El Alto  para comprar chamarras para mis  dos hijos.  Quiero que  vayan abrigados al colegio, hace mucho frÃ­o y hay que prevenir  que se  enfermenâ€, dijo  Isabel SÃ¡nchez, quien afanada buscaba abrigos de  color azul para combinar con  los uniformes de sus pequeÃ±os.\r\n \r\nLas clases se reanudarÃ¡n maÃ±ana con media hora de retraso para  niveles inicial y primaria, segÃºn el director distrital de EducaciÃ³n de La Paz, Basilio PÃ©rez. AdemÃ¡s, explicÃ³  que para el nivel secundario, en los turnos de maÃ±ana y tarde, se mantiene el horario de invierno.\r\n \r\nMarta MÃ©ndez, dueÃ±a de uno  los puestos de chamarras cerca de la plaza Eguino, contÃ³ que  los padres de familia buscan mÃ¡s abrigos  de color azul o plomo oscuro para  combinar con los uniformes de los colegios. \"Buscan tambiÃ©n chamarras que sean delgadas. Por eso, una de nuestras novedades es la chamarra \"globitosâ€, que  es fabricada con un material especial  que protege del frÃ­o  y de la lluviaâ€, dijo.\r\n \r\nSegÃºn la comerciante, la chamarra estÃ¡ confeccionada  con pluma de ganso. El costo de este tipo de prendas oscila entre 120 y 180 bolivianos, de acuerdo al tamaÃ±o y el color.\"Hace  mucho mÃ¡s frÃ­o y por eso venimos a comprarle una nueva chamarra a mi hija. No quiero que se resfrÃ­eâ€, dijo MarÃ­a Castro, quien vive en Villa San Antonio.\r\n \r\nEntre la Tumusla y la Isaac Tamayo,   decenas de personas venden abrigos  polar  que tienen  precios desde 70 bolivianos.  Otro de los diseÃ±os mÃ¡s demandados es el que tiene  doble cara, una de polar y la otra tela impermeable.  Su precio oscila entre 70 y 80 bolivianos. \r\n \r\nLos chalecos son tambiÃ©n otra de las opciones para combatir el frÃ­o. \"Tenemos prendas hechas de lana, polar e impermeables. Los precios son accesibles, hay desde 30  bolivianos hasta 250â€, indicÃ³ Josefina Roque.\r\n  \r\n\r\nHasta la anterior semana, el director general de Servicios de Salud del Ministerio de Salud, Rodolfo Rocabado, informÃ³ que  se reportaron mÃ¡s de dos millones de casos de infecciones respiratorias agudas (IRA) en todo el paÃ­s. SegÃºn la autoridad, los mÃ¡s afectados son niÃ±os menores de cinco aÃ±os y personas mayores de 60 aÃ±os. Ambos grupos son muy vulnerables y representan el 80%  del total de los casos registrados.',2,NULL,1,NULL,'2017-07-23'),(19,2,'Bolivia, Ãºltimo paÃ­s en la regiÃ³n en prevenir, luchar y tratar cÃ¡ncer','El Estado boliviano   estÃ¡ por debajo de 11 naciones de la regiÃ³n en lo que concierne a  prevenciÃ³n y detecciÃ³n temprana, organizaciÃ³n de la lucha contra el cÃ¡ncer y tratamiento de esa enfermedad. \r\n \r\nEste criterio se desprende de mediciones cuantitativas y anÃ¡lisis cualitativos contenidos en el informe \"Control del CÃ¡ncer, acceso y desigualdad en AmÃ©rica Latina, Una historia de luces y sombrasâ€, elaborado por Economist Intelligence Unit (EIU) (unidad de negocios independiente dentro del grupo The Economist, publicaciÃ³n semanal en lengua inglesa).\r\n \r\nEl informe se centra   en 12 \"paÃ­ses de estudioâ€ de AmÃ©rica Central y AmÃ©rica del Sur escogidos por diversos factores, entre ellos el tamaÃ±o y el nivel de desarrollo econÃ³mico: Argentina, Bolivia, Brasil, Chile, Colombia, Costa Rica, Ecuador, MÃ©xico, PanamÃ¡, Paraguay, PerÃº y Uruguay.\r\n \r\n El documento seÃ±ala que se presenta un trabajo de investigaciÃ³n para calificar el desempeÃ±o de los 12 paÃ­ses que componen el estudio en diferentes Ã¡reas de relevancia directa con respecto al acceso para el control del cÃ¡ncer.\r\n \r\nEl informe contiene, ademÃ¡s,  un anÃ¡lisis de informaciÃ³n de varios organismos internacionales y de entrevistas realizadas a 20 prestigiosos investigadores a nivel mundial.\r\n \r\nEn lo que concierne al acÃ¡pite \"Plan estratÃ©gico: supervisiÃ³n del desempeÃ±o, disponibilidad de medicamentos, disponibilidad de radioterapia: prevenciÃ³n y detecciÃ³n temprana y finanzas (apoyo financiero y la inversiÃ³n para ayudar a las personas a acceder a la atenciÃ³n del cÃ¡ncer)â€, Bolivia tiene un registro de 7 puntos sobre 30, Paraguay tiene 9 y el resto de naciones estÃ¡ por encima de los 14 puntos.\r\n \r\nLos autores del estudio aclaran que el objetivo de esta calificaciÃ³n no reside en asignar una \"puntuaciÃ³nâ€ solamente, sino en trazar un bosquejo, a grandes rasgos, de las fortalezas y debilidades de los paÃ­ses del estudio y la regiÃ³n en su conjunto. \"De este modo, los resultados se convierten en un punto de partida Ãºtil para el debate sobre el control del cÃ¡ncer y el acceso a la atenciÃ³n del cÃ¡ncer en AmÃ©rica Latinaâ€, aÃ±aden.\r\n \r\nEn lo que corresponde a la existencia de un  Programa nacional de control del cÃ¡ncer (NCCP), concepto definido por la OrganizaciÃ³n Mundial de la Salud (OMS) como: \"un programa de salud pÃºblica encaminado a reducir la incidencia y la mortalidad de los tumores malignos y mejorar la calidad de vida de los pacientes con cÃ¡ncerâ€, Bolivia obtiene su mejor desempeÃ±o en todo el estudio, a partir de   calificaciones que establecen una escala de 1 para lo peor y 5 para lo mejor. Bolivia registra un 1,7, detrÃ¡s de PanamÃ¡ y detrÃ¡s de Argentina que logra un 0,8. mientras que las otras naciones estÃ¡n con un rango que oscila entre 2,5 y 5. Los investigadores tambiÃ©n aclaran que \"tener un programaâ€ no implica que el mismo sea cumplido y muchas veces tales planes terminan en un archivo.\r\n \r\nSobre la informaciÃ³n que tiene cada paÃ­s sobre mortalidad por cÃ¡ncer, existe un registro de baja, media y alta; la investigaciÃ³n seÃ±ala que de los 12 paÃ­ses investigados, cuatro  cuentan con datos de baja, pero aÃ±ade que \"Bolivia no posee ningÃºn tipo de informaciÃ³n confiableâ€.\r\n \r\nSobre el parÃ¡metro de disponibilidad de determinados fÃ¡rmacos contra el cÃ¡ncer y de la morfina para aliviar el dolor, asÃ­ como el acceso a radioterapias, el Estado boliviano registra un desempeÃ±o bajo:  0,7, es decir por debajo de 1 que es el \"peor desempeÃ±oâ€ sobre un total de 5 como mejor desempeÃ±o.\r\n \r\nLo propio en cuanto a \"asistencia financiera e inversiones existentes para ayudar a la gente a cubrir los costos de la atenciÃ³n del cÃ¡ncerâ€, en    que obtiene 0,5 por debajo de 1 (lo peor) sobre un mÃ¡ximo estimado de 5 puntos.\r\n \r\nFrenaron los males habituales\r\n\r\nEl estudio explica que los Estados de la regiÃ³n han hecho esfuerzos durante dÃ©cadas en materia de salud pÃºblica, cuyos objetivos solÃ­an ser la atenciÃ³n materno infantil y la vacunaciÃ³n, redujeron notablemente el impacto de otras enfermedades concretas y  la mortalidad ocasionada por la diarrea, las infecciones de las vÃ­as respiratorias inferiores y enfermedades neonatales. \"Los sistemas de salud en AmÃ©rica Latina son vÃ­ctimas de su propio Ã©xito en muchos sentidos. Porque han abordado los problemas de salud que requieren soluciones mÃ¡s simples, ahora deben enfrentar enfermedades crÃ³nicas y no transmisibles mÃ¡s complejas, como el cÃ¡ncerâ€, indica una parte.\r\n \r\nUn mal que serÃ¡ epidÃ©mico\r\n\r\nEl cÃ¡ncer ya es la segunda causa de mortalidad en AmÃ©rica Latina, y la carga econÃ³mica que exige esta enfermedad se incrementarÃ¡ notablemente en los aÃ±os venideros. \r\n \r\nEn los 12 paÃ­ses del estudio, el cÃ¡ncer es el causante del 19% de las muertes en promedio, y en dos paÃ­ses es el responsable de un cuarto o mÃ¡s de la mortalidad.\r\n \r\nEn gran medida, debido al envejecimiento y al crecimiento de la poblaciÃ³n, la incidencia de cÃ¡ncer y la mortalidad (si no se hace algo al respecto) en AmÃ©rica Central y AmÃ©rica del Sur seguirÃ¡n aumentando marcadamente en lo que va desde el 2012 y hasta el 2035. \r\n \r\nSe prevÃ© que la cantidad de casos aumentarÃ¡ en 91 % durante este perÃ­odo, y los casos de muerte a causa de cÃ¡ncer aumentarÃ¡n en 106 %.',2,3,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/23170094.jpg','2017-07-23'),(20,5,'Convite de la â€œUâ€ vuelve a Miraflores, hoy cierran vÃ­as','Hoy, la pre Entrada universitaria retornarÃ¡ a Miraflores  luego que la gestiÃ³n pasada se realizara en la avenida Zabaleta. De  8:30 a 20:00 la AlcaldÃ­a en coordinaciÃ³n con el Organismo Operativo de TrÃ¡nsito cerrarÃ¡ el carril de subida de la avenida Busch, desde la  calle Villalobos hasta  la   Costa Rica. \r\n \r\n\"Vamos a tener   recorridos alternos para dar vÃ­a libre  al carril de bajada de la avenida Busch y de otras calles como la Villalobos, Argentina, Brasil, Honduras y DÃ­az Romero para el flujo vehicularâ€, informÃ³  la jefa de  RegulaciÃ³n de Movilidad de la AlcaldÃ­a, Carolina Arnez.\r\n \r\nEl secretario municipal de Seguridad Ciudadana, coronel JosÃ© Luis Ramallo, indicÃ³ que para el tema de seguridad de los participantes y espectadores, la comuna  desplegarÃ¡ 250 funcionarios de la Guardia Municipal de Transporte, Guardia Municipal, Intendencia y otras unidades.\r\n \r\n\"Vamos a apoyar en las tareas de la PolicÃ­a. De acuerdo a un informe de la DirecciÃ³n de Mercados estÃ¡ prohibida la venta de bebidas alcohÃ³licas en puestos y tiendas de barrioâ€, manifestÃ³.\r\n \r\nAdemÃ¡s, la Intendencia destinarÃ¡ dos brigadas  que en turnos realizarÃ¡n labores  de prevenciÃ³n y de verificaciÃ³n de calidad de los productos  que se ofrecen a lo largo de todo el recorrido. Las tiendas de barrio tambiÃ©n serÃ¡n controladas.\r\n \r\nLas autoridades manifestaron que al termino de la pre Entrada  Universitaria se harÃ¡ una batida para retirar a las personas y a las comerciantes para habilitar las vÃ­as cerradas y prevenir algÃºn incidente de inseguridad. Con el fin de resguardar a los niÃ±os,  la  DefensorÃ­a Municipal desplegarÃ¡ a su personal  y  la SecretarÃ­a  de Salud habilitarÃ¡ un punto de atenciÃ³n de emergencias.',2,5,1,'/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/23f300x0-170135_170153_80.jpg','2017-07-23'),(21,2,'Plantean considerar violaciÃ³n al sexo no consentido en el matrimonio','La legislaciÃ³n penal de Bolivia se plantea la redefiniciÃ³n del concepto de violaciÃ³n al considerar que no solo es un acto violento, \"sino el no consentimiento de la mujer para una relaciÃ³n sexual\", afirma la presidenta de la CÃ¡mara de Diputados del paÃ­s, Gabriela MontaÃ±o, en una entrevista con Efe.\r\n\r\n\"Ha cambiado totalmente la lÃ³gica\", dice MontaÃ±o, y una mujer, sea adulta o menor de edad, ya no va a tener que mostrar marcas de violencia fÃ­sica para justificar que ha sido violada.\r\n\r\nAsÃ­ lo plantea el borrador del CÃ³digo del Sistema Penal que se debate entre los diputados y cuyo texto es motivo de polÃ©mica porque tambiÃ©n amplÃ­a los supuestos para el aborto impune.\r\n\r\nLa violaciÃ³n en esta nueva normativa serÃ¡ castigada con una pena de entre 11 y 20 aÃ±os de cÃ¡rcel, pero se considerarÃ¡n agravantes cuando la vÃ­ctima sea menor, una persona con discapacidad o estÃ© embarazada o que el violador sea la pareja o el marido.\r\n\r\n\"Es absolutamente posible que una mujer dentro del matrimonio no estÃ© de acuerdo en un momento \'x\' con tener relaciones sexuales con su pareja, y su pareja tiene que tener la capacidad de respetarla y si no la respeta, es violaciÃ³n\", justifica la legisladora, que es una dirigente del partido gobernante Movimiento al Socialismo (MAS).\r\n\r\nEl proyecto contempla en su artÃ­culo 102 que la sentencia pueda llegar en esos casos hasta 30 aÃ±os, pena mÃ¡xima en Bolivia.\r\n\r\nÂ¿Por quÃ©? \"Porque se supone que hay un pacto de convivencia armÃ³nica y pacÃ­fica entre esas dos personas y por lo tanto es mucho peor todavÃ­a la situaciÃ³n de violencia\", responde MontaÃ±o.\r\n\r\nEl reto estarÃ¡ en explicarlo a un juez, fiscal o policÃ­a y que se deje de \"revictimizar\" y exigir pruebas de violencia a las mujeres, dice MontaÃ±o.\r\n\r\nA pesar de que Bolivia cuenta con leyes con protecciones muy amplias para colectivos como mujeres o de menores de edad hay muchos cuestionamientos sobre la presencia de la violencia sexual.\r\n\r\nAl respecto, MontaÃ±o insiste en que la ley \"no es una varita mÃ¡gica\" y es necesario acompaÃ±arla con educaciÃ³n \"para transformar generacionalmente la manera de pensar la violencia\".\r\n\r\nAnte esta brecha, la legisladora habla de dos posibles causas: que antes de las leyes no se contabilizasen los feminicidios ni las mujeres tuviesen garantÃ­as de protecciÃ³n para hacer denuncias.\r\n\r\n\"Ante un avance de derechos suele suceder que haya una respuesta de las formas de pensar conservadoras que todavÃ­a no se han ajustado a esos avances y muchas veces la manera en la que se manifiestan esas formas de violencia son (con) mÃ¡s violencia\", que es lo que algunas teÃ³ricas llaman la \"teorÃ­a de compensaciÃ³n y recuperaciÃ³n\".\r\n\r\nAcerca del debate sobre las nuevas causales para el aborto, MontaÃ±o cree que la polÃ©mica se ha \"distorsionado mucho\".\r\n\r\nEl proyecto seÃ±ala nueve causales para permitir el aborto impune, que actualmente estÃ¡ permitido en casos de violaciÃ³n o riesgo de la vida o salud de la madre o el feto.\r\n\r\nUna mujer podrÃ¡ interrumpir un embarazo si no cuenta con recursos econÃ³micos suficientes, tiene muchos hijos, es estudiante, su vida corre peligro o se detectan malformaciones fetales incompatibles con la vida, entre otras causas.\r\n\r\nPero este artÃ­culo ha encontrado una gran resistencia ya no solo en la Iglesia boliviana sino en algunos Colegios de MÃ©dicos.\r\n\r\n\"Hay una doble moral\", seÃ±ala MontaÃ±o, quien habla de un supuesto negocio oculto: hay unos 60.000 abortos clandestinos al aÃ±o en el paÃ­s y cada aborto cuesta en torno a 100 dÃ³lares, aunque ese costo sube en clÃ­nicas privadas y seguras, y baja si se hace en unas condiciones de riesgo que hacen peligrar la vida de la mujer.\r\n\r\nEntonces, \"estamos hablando de 6 millones de dÃ³lares anuales, que van a los bolsillos de mÃ©dicos, practicantes, enfermeras, inclusive gente que no ha sido formada en el Ã¡mbito de la salud\", denuncia.\r\n\r\n\"Ninguna mujer aborta por deporte, son en todos los casos situaciones extremas\", alega MontaÃ±o.\r\n\r\nLa dirigente reconoce que no se puede obligar a un mÃ©dico a practicar un aborto pero \"la prioridad del sistema pÃºblico de salud debe ser la atenciÃ³n de las mujeres, no la atenciÃ³n de la objeciÃ³n de conciencia\" que plantean los galenos.\r\n\r\nEl aborto en Bolivia no puede ser despenalizado en su totalidad debido a lÃ­mites constitucionales, pero MontaÃ±o dice estar sorprendida positivamente por el apoyo en la sociedad que, a su juicio, tiene el aumento de las causales para que se practique.',2,NULL,1,NULL,'2017-07-23'),(22,2,'Lupe bebiÃ³ desde los 10 aÃ±os; hoy quiere liberarse del alcohol','Su piel morena quemada por el sol y por el  gÃ©lido viento nocturno muestra a simple vista el paso del tiempo por  su rostro. Sus ojos negros denotan algo de esperanza. Lupe (nombre convencional), una mujer de 28 aÃ±os de edad, asegura que sus sueÃ±os recobraron vida desde el dÃ­a en  que conociÃ³ el refugio municipal Zenobio LÃ³pez.\r\n\r\n\"Quiero volver a vivir, quiero cambiar, quiero trabajar, ese es mi sueÃ±o, por eso ya no estoy tomando  ni consumiendo  drogasâ€, manifestÃ³  la joven, quien se fue de su hogar cuando tenÃ­a 10 aÃ±os tras el deceso de su padre.\r\n\r\nDesde entonces  viviÃ³ debajo de varios puentes, fumÃ³ droga, pasÃ³ dÃ­as sin comer con la ropa rota, mojada y sucia, incluso llegÃ³ a estar en la cÃ¡rcel. \"Tengo una semana como persona en libertadâ€, confiesa.\r\n\r\n   Lo que mÃ¡s le agrada del refugio es que ella tiene la libertad de reducir el consumo de bebidas alcohÃ³licas y estupefacientes. \"Te baÃ±as, te dan ropa,  comida a  gusto,  refresco. Son amables con nosotras, aunque somos un poco rebeldes por ser de la calleâ€, comenta.\r\n\r\nEl alcalde de la urbe paceÃ±a, Luis Revilla, inaugurÃ³ ayer este refugio donde se recibe  a personas en situaciÃ³n de calle para que mejoren su calidad de vida. \"Vamos a ayudarlos, por eso no sÃ³lo abriremos los viernes, que era el plan inicial, sino los miÃ©rcoles tambiÃ©nâ€, dijo,tras una reuniÃ³n con el sector beneficiado que asciende a unas 16 personas. \r\n\r\nEl centro, ubicado entre las avenidas Zavaleta y Zenobio LÃ³pez, cuenta con una cocina, lavanderÃ­a, duchas y baÃ±os, enfermerÃ­a, un cuarto de ropa, peluquerÃ­a, Ã¡rea de actividades lÃºdicas, una biblioteca, una videoteca, un Ã¡rea de descanso y finalmente un Ã¡rea de psicologÃ­a.\r\n\r\n  En estas Ã¡reas cada uno tiene que hacer todo por sÃ­ mismo,  excepto las curaciones -convenios con hospitales municipales cuando son casos graves- y el tratamiento psicolÃ³gico, eso lo hacen los profesionales. Uno de los funcionarios ediles cuenta que en las Ã¡reas de lavanderÃ­a y de peluquerÃ­a las personas confiesan su verdadera identidad y su historia.\r\n\r\nSegÃºn la gerente del Programa de AtenciÃ³n a PoblaciÃ³n en SituaciÃ³n de Riesgo Social, Patricia Velasco, una vez que alguien llega al centro edil debe cumplir dos requisitos fundamentales: dejar sus botellas de alcohol o drogas, y ser respetuoso con todos. \"Hacemos procesos terapÃ©uticos ambulatorios. Significa que a travÃ©s de psicÃ³logos puedan establecer el detonante de su problema de consumo:   procesos de luto no cerrados, divorcios  y separaciones no superadas, problemas de violencia dentro de la familia,  infancia y adolescenciaâ€, explicÃ³.\r\n\r\nLos tÃ­tulos sin valor\r\n\r\nPor su parte, don Eliseo (nombre convencional), el cocinero, asegura que se recupera de manera gradual gracias a la   terapia ambulatoria. \"Soy  egresado de EconomÃ­a y  exmilitar, tengo varios  cartones (tÃ­tulos acadÃ©micos) que los he mandado por un tubo debido a mi situaciÃ³n de adicciÃ³n, pero hoy me siento bienâ€, dijo mientras movÃ­a un gran  cucharÃ³n dentro de una olla comÃºn, que contenÃ­a  sopa de fideo ojo de perdiz con pollo y verduras.\r\n\r\nÃ‰l, aproximadamente de unos 45 aÃ±os, contÃ³ que su adicciÃ³n empezÃ³ despuÃ©s de la muerte de su esposa hace seis aÃ±os. \"He sido alcohÃ³lico, he entrado a varios centros de rehabilitaciÃ³n, pero en ninguno me han dado la ayuda que estoy recibiendo acÃ¡â€, manifesta.\r\n\r\n  Don Eliseo agrega que cuando llegÃ³,  los funcionarios le dijeron que su vida podÃ­a cambiar y que sÃ³lo dependÃ­a de Ã©l, eso le \"levantÃ³ la moralâ€ (jerga militar). \"Nos han dicho: â€˜queremos verlos en la calle limpios, bien baÃ±ados aunque tengan alguna adicciÃ³nâ€™. Nuestra mala apariencia hace que la gente tenga repulsiÃ³n hacia nosotrosâ€, recordÃ³.\r\n\r\nPruebas piloto\r\n\r\nEl centro tiene el objetivo de reducir el consumo de  las bebidas alcohÃ³licas y drogas, entre personas de 19 aÃ±os en adelante, y empezÃ³ con las pruebas piloto el 10 de febrero de este aÃ±o. En esta etapa el refugio se abrÃ­a solamente cada viernes.\r\n\r\n SegÃºn la gerente del Programa de AtenciÃ³n a PoblaciÃ³n en SituaciÃ³n de Riesgo Social, la primera vez tuvieron que recoger a personas en situaciÃ³n de calle y las trajeron a conocer el centro. Una vez ahÃ­ les explicaron cÃ³mo funcionaba. \"Tuvimos hasta 40 personas como mÃ¡ximo. El sentido  es que trabajen en su proyecto de vida, les hacemos recordar su forma de vivir en familiaâ€, dijo.\r\n\r\nVelasco aclarÃ³ que cuentan con una tabla de frecuencias, que les permite controlar la recurrencia de personas. \"Sabemos quiÃ©nes vienen consecutivamente los viernes, de momento son 10. Con ellos trabajamos el proceso terapÃ©utico y evaluamos su reducciÃ³n de consumo y cuÃ¡nto menos podrÃ­an consumirâ€ indicÃ³.\r\n\r\nLos programas en beneficio de personas en situaciÃ³n de calle, en extrema pobreza y niÃ±os trabajadores cuentan con 900 mil bolivianos de inversiÃ³n. La ropa, enseres de aseo y alimentos vienen de donaciones de la gente y de otras instituciones.',2,NULL,1,NULL,'2017-07-23'),(23,2,'En el paÃ­s suben los casos de cÃ¡ncer de piel en las mujeres','En el DÃ­a Mundial de PrevenciÃ³n de CÃ¡ncer de Piel, el director general de Servicios de Salud del Ministerio de Salud, Rodolfo Rocabado, informÃ³ que el paÃ­s \"lamentablementeâ€ registra un incremento de casos de este tipo de enfermedad y con mayor preponderancia en mujeres. \r\n\r\n\"El 2011 tenÃ­amos 951 casos en mujeres, en 2015 habÃ­a 996 casos. Comparando estos datos se muestra un incremento, ya que en 2014 hubo 977 casos. SegÃºn la OrganizaciÃ³n Mundial de la Salud (OMS) la incidencia es mayor en mujeres porque se exponen mÃ¡s al sol por el bronceado y las camas solares, cosas que los hombres no  hacenâ€, seÃ±alÃ³.\r\n\r\nCriterio similar tuvo la presidenta de la Sociedad Boliviana de DermatologÃ­a, MarÃ­a Virginia Paredes, quien lamentÃ³ esta situaciÃ³n y pidiÃ³ a la poblaciÃ³n boliviana tomar acciones de prevenciÃ³n frente a este mal que viene en ascenso.\r\n\r\n\"Hemos visto que entre 2015 y 2016 se ha presentado un incremento en el nÃºmero de casos registrados con lesiones de cÃ¡ncer. Este incremento representa casi un seis por ciento y es un porcentaje alto. Nosotros tenemos que realizar un programa sostenido de prevenciÃ³n y control de cÃ¡ncer. Hoy lamentablemente no tenemos un registro de personas fallecidas y hay que trabajar en estoâ€, afirmÃ³. \r\n\r\nPrecisÃ³ que la incidencia a nivel nacional en hombres entre 18 y 60 aÃ±os es de 20,8 por cada 100 mil habitantes, y en mujeres es de 27,6 por cada 100 mil habitantes. AhÃ­ podemos ver que la incidencia es mucho mayor en mujeres que en hombresâ€, precisÃ³. \r\n\r\nSegÃºn Rocabado, personas que viven en zonas andinas tienen mayor posibilidad de tener cÃ¡ncer de piel por lo que recomendÃ³ protegerse de manera constante.\r\n\r\n A medida que se acerca el invierno o se desarrolla Ã©ste, las temperaturas bajan y lo propio hace la radiaciÃ³n ultravioleta (RUV). La radiaciÃ³n solar depende principalmente de la inclinaciÃ³n de los rayos solares con respecto a la superficie de la Tierra, ocasionando las  estaciones; Ã©sa es la razÃ³n por la cual el Ã­ndice de la RUV baja rÃ¡pidamente entre abril y mayo, y sube drÃ¡sticamente entre agosto  y septiembre, por lo que es mejor  no exponerse al sol, segÃºn seÃ±alan informes de la UMSA. \r\n \r\nUsar sombreros, protector y no exponerse al sol\r\n\r\nEl Ministerio de Salud y la Sociedad Boliviana de DermatologÃ­a advirtieron ayer a la poblaciÃ³n que es importante que  se tomen los recaudos necesarios para protegerse del sol, como utilizar el protector (que estÃ© con un factor de protecciÃ³n por encima de  30), utilizar sombreros de ala ancha, paraguas y protegerse con ropa de manga larga. \r\n\r\nSi hay algÃºn indicio en la piel, hay que acudir a las campaÃ±as y ser atendidos por dermatÃ³logos.\r\n \r\nAdemÃ¡s, los pobladores de la zona andina estÃ¡n mÃ¡s expuestos al sol y  la altura es un factor importante, eso determina que hay mas riego en La Paz, El Alto, Oruro, PotosÃ­ como en las ciudades y poblaciones de alturaâ€, apuntÃ³.\r\n\r\nEl director general de Servicios de Salud del Ministerio de Salud, Rodolfo Rocabado, anunciÃ³  campaÃ±as de prevenciÃ³n del cÃ¡ncer de piel para controlar esta enfermedad. LamentÃ³ que hoy en dÃ­a los jÃ³venes estÃ©n mÃ¡s expuestos a los rayos ultravioletas por lo que exigiÃ³ concientizaciÃ³n y protegerse. \r\n\r\n\"Hoy en dÃ­a se estÃ¡ viendo que cada vez hay mÃ¡s jÃ³venes expuestos a este mal, debemos protegernos de los rayos ultravioletas, no exponernos por mÃ¡s de 15 o 20 minutos de forma continua al sol y evitar estar expuestos en los horarios de 10:00 a 16:00  porque ahÃ­ es donde se produce mayor daÃ±o a la pielâ€.',2,NULL,1,NULL,'2017-07-23');
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `primerNombre` varchar(20) NOT NULL,
  `segundoNombre` varchar(20) DEFAULT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `CI` varchar(50) NOT NULL,
  `idLugarExpedicion` int(11) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `idEstadoCivil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `idEstadoCivil` (`idEstadoCivil`),
  KEY `idLugarExpedicion` (`idLugarExpedicion`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Rodrigo','Luis','Poma','Mollo','447457451',2,'1995-03-20','M',1),(2,'Gustavo','Angel','Cerezo','Mamani','7417215',1,'1995-03-30','M',1),(3,'Oscar','','Mamani','Choque','78455454',1,'2017-07-17','M',2),(4,'Maria','Segundo','Choque','','78455454MARIASEGUNDO',NULL,'2017-07-11',NULL,NULL),(5,'Oscar','Reynaldo','Mamani','Choque','78455454OSCARREYNALDO',NULL,'2017-08-02',NULL,NULL),(6,'Alison',NULL,'Mamani','Choque','78455454ALISON',NULL,'2017-08-25',NULL,NULL),(7,'Fabricio',NULL,'Mamani','Choque','78455454FABRICIO',NULL,'2017-07-19',NULL,NULL),(8,'Miriam','','Mendez','Huacanique','78211453',2,'2000-07-17','F',1),(205,'Stephanie',NULL,'Guarachi','Ayala','4845421',1,'2017-06-27','F',1),(10,'Elsy',NULL,'Huarachi','Laura','846441',1,'2017-07-04','F',1),(11,'Aren','','Acnuta','Chirre','4455912',3,'1991-03-01','F',1),(12,'Mikael','','Agreda','Herbas','3722371',3,'1969-12-31','M',1),(13,'Jose','Luis','Aguilar','Conde','7511893',3,'1969-12-31','M',1),(14,'Ivo','Alberto','Alabe','Perales','2311307',2,'1975-10-10','M',1),(15,'Lourdes','Sofia','Alanes','Terrazas','6461124',3,'1986-05-10','F',1),(16,'Vladimir','','Alanoca','Espejo','6174669',2,'1969-12-31','M',1),(17,'Ivan','Ronny','Alcon','Andia','5920379',3,'1969-12-31','M',1),(18,'Froilan','','Alcon','Sullcani','440526',2,'1969-12-31','M',1),(19,'Patricia','','Alderete','Fernandez','6329245',4,'1969-12-31','F',1),(20,'Cristhian','John','Alvarez','Zaldua','O914312988',10,'1969-12-31','M',1),(21,'Lizeth','','Alvarez','Zerda','4451395',3,'1978-12-05','F',1),(22,'Celia','Maria','Apaza','Narvacia','4479470',3,'1969-12-31','F',1),(23,'Juan','','Arhuata','Luna','5223872',3,'1969-12-31','M',1),(24,'Madelein','','Arias','Carrasco','8038724',3,'1992-08-06','F',1),(25,'Gisela','','Arivilea','Medina','4317206',2,'1969-12-31','F',1),(26,'Lizet','Mery','Arratia','Quispe','4908172',2,'1969-12-31','F',1),(27,'Dunia','','Arze','Suheiro','6509435',3,'1987-07-10','F',1),(28,'Julieta','','Ascarraga','Jaldin','5161148',3,'1979-07-02','F',1),(29,'Danae','','Asturizaga','Camacho','3754558',3,'1987-12-06','F',1),(30,'Judith','Mabel','Ayala','Choque','4314859',2,'1974-03-10','F',1),(31,'Sonia','Miriam','Ayala','Condori','2142827',2,'1969-12-31','F',1),(32,'Ivan','Nelson','Ayala','Santos','2372433',2,'1969-06-11','M',1),(33,'Sonia','Alicia','Barriuso','De la parra','986397',3,'1969-12-31','F',1),(34,'Ovidio','Moises','Becerra','Rodas','4580520',4,'1977-10-05','M',1),(35,'Lidia','Maura','Bernal','Vargas','3078271',1,'1969-12-31','F',1),(36,'Irene','Carmen','Calderon','Copa','4478383',3,'1969-12-31','F',1),(37,'Ever','Samuel','Calle','Mamani','5239536',3,'1969-12-31','M',1),(38,'Hugo','','Campos','Bautista','4040896',1,'1978-01-04','M',1),(39,'Liliana','Veronica','Canqui','Cama','3422659',2,'1970-06-11','F',1),(40,'Mery','','Carrasco','','3613475',3,'1969-12-31','F',1),(41,'Mario','','Carrasco','Quiroz','4380799',3,'1969-12-31','M',1),(42,'Clara','Evelin','Carvajal','Limachi','4843942',2,'1979-06-04','F',1),(43,'Boris','','Carvajal','Rojas','7882823',3,'1988-04-06','M',1),(44,'Rolando','Delmer','Castillo','Limachi','2533041',2,'1969-12-31','M',1),(45,'Xavier','Americo','Cespedes','Teran','3620666',3,'1974-01-07','M',1),(46,'Willy','Luis','Chambilla','Silva','2581565',2,'1969-12-31','M',1),(47,'Jacob','Angel','Charcas','Canaviri','2448700',2,'1962-04-08','M',1),(48,'Martin','Edwin','Charcas','Canaviri','2613433',2,'1969-12-31','M',1),(49,'Sandra','Mischel','Charcas','Enriquez','6431790',3,'1969-12-31','F',1),(50,'Henry','Omar','Chavarria','Ramirez','3622565',3,'1969-10-09','M',1),(51,'Marco','Antonio','Chavarria','Ramirez','4461205',3,'1969-12-31','M',1),(52,'Milda','Mery','Chipana','Quispe','6546437',3,'1969-12-31','F',1),(53,'Roxana','','Chipana','Viadez','4287848',2,'1969-12-31','F',1),(54,'Ruben','','Choque','Mamani','4245910',2,'1969-12-31','M',1),(55,'Juan','Wilfredo','Choque','Medrano','2642110',2,'1969-12-31','M',1),(56,'Guimer','','Choque','Nina','7975990',3,'1989-03-05','M',1),(57,'Juan','Carlos','Choque','Nina','7988892',3,'1985-08-01','M',1),(58,'Wladimir','','Chuquimia','Rivero','4414778',3,'1969-12-31','M',1),(59,'Hernan','Eustaquio','Chuquimia','Tancara','2600568',2,'1969-12-31','M',1),(60,'Milton','Jose','Chuquimia','Zabala','3000525',3,'1969-12-31','M',1),(61,'Mario','Rolando','Chura','Ortiz','4377774',2,'1976-03-07','M',1),(62,'Ramiro','','Claros','Churqui','3695745',9,'1968-12-11','M',1),(63,'Lorgio','Divar','Colque','Choque','6187686',2,'1969-12-31','M',1),(64,'Celia','','Colque','Flores','5311727',3,'1969-12-31','F',1),(65,'Yhanet','','Colque','Mamani','5480721',2,'1982-03-10','F',1),(66,'Virginia','','Condori','Apulaca','5948349',2,'1981-05-04','F',1),(67,'Alicia','Margot','Contreras','Jara','6520153',3,'1969-12-31','F',1),(68,'Ludmila','Silvia','Cruz','Patty','5223889',3,'1980-07-01','F',1),(69,'Karla','Alejandra','Cruz','Soto','6466484',3,'1969-12-31','F',1),(70,'Eloyna','Lizeht','Cuiza','Morales','3054569',1,'1967-03-01','F',1),(71,'Fabiola','Liz','Delgado','Mamani','6446646',3,'1989-08-04','F',1),(72,'Nidia','Esther','Duran','Burgoa','6477658',3,'1969-12-31','F',1),(73,'Eduardo','','Enriquez','Aramayo','1022919',8,'1969-12-31','M',1),(74,'Mary','Dunia','Escobar','Arias','4529153',3,'1969-12-31','F',1),(75,'Carla','Fabiana','Espada','Rossell','5303458',3,'1969-12-31','F',1),(76,'Luis','Evelio','Estrada','Estrada','2068980',2,'1958-11-05','M',1),(77,'Claudio','Fidel','Flores','Colquehuanca','4311615',2,'1969-12-31','M',1),(78,'Delfin','Ivan','Flores','Colquehuanca','4777161',2,'1969-12-31','M',1),(79,'Janeth','','Flores','Quiroz','6234456',4,'1969-12-31','F',1),(80,'Cristhian','Fabian','Garcia','IbaÑez','8694083',3,'1969-12-31','M',1),(81,'Dolly','Gabriela','Gardeazabal','Guzman','4083588',8,'1978-07-06','F',1),(82,'Lucy','Marlenny','Garnica','AcuÑa','8207041',4,'1992-02-01','F',1),(83,'Freddy','','Gomez','Mayta','5471063',2,'1969-12-31','M',1),(84,'Nielsen','Salomon','Gonzales','Alarcon','3476260',2,'1971-07-08','M',1),(85,'Rodolfo','','Guarachi','Ramos','4881536',2,'1969-12-31','M',1),(86,'Jorge','Herbert','Guzman','Sandoval','3046142',1,'1969-12-31','M',1),(87,'Benigna','','Herbas','Panozo','3030026',3,'1969-12-31','F',1),(88,'Carlos','Alejandro','Heredia','Flores','4532920',3,'1981-06-12','M',1),(89,'Zonia','Lidia','Huamani','Tello','6416523',3,'1969-12-31','F',1),(90,'Rolando','Alex','Huanca','Gomez','4070515',1,'1969-12-31','M',1),(91,'Adela','','Huanca','Paco','2584324',2,'1969-12-31','F',1),(92,'Ivan','Jhonny','Huayta','Lucana','3972503',9,'1969-12-31','M',1),(93,'Maria','Magdalena','Hurtado','Calle','4383839',3,'1969-12-31','F',1),(94,'Jacqueline','','Illanes','Manrique','2714703',2,'1965-05-01','F',1),(95,'Lucien','Edith','Iquiza','Ramirez','3519536',1,'1969-12-31','F',1),(96,'Emilia','','Jaldin','','3754662',3,'1973-01-12','F',1),(97,'Felicia','','Justiniano','Moreno','3925671',4,'1974-03-05','F',1),(98,'Lorna rosa','Elizabeth','Kreidler','Guillaux','1980843',4,'1969-12-31','F',1),(99,'Luz','Marleny','Leon','Jauregui','4798574',2,'1969-12-31','F',1),(100,'Guido','Wilmer','Limari','Huanca','6986755',2,'1989-11-03','M',1),(101,'Guillermo','','Lizarraga','Barba','393080',2,'1969-12-31','M',1),(102,'Melvy','Ivette','Llusco','Narvaez','4741259',2,'1969-12-31','F',1),(103,'Paula','Milenca','Llusco','Ramos','3356930',2,'1969-12-31','F',1),(104,'Marcelino','','Lopez','Mamani','2639898',2,'1965-02-01','M',1),(105,'Jannette','Marga','Loza','Sosa','6012947',2,'1983-10-02','F',1),(106,'Sonia','','Lucas','Calani','2784057',1,'1969-12-31','F',1),(107,'Jenny','Judith','Maita','Montevilla','3570618',3,'1969-12-31','F',1),(108,'Luis','Rodrigo','Maldonado','Callao','6480302',3,'1969-12-31','M',1),(109,'Veronica','','Mamani','Arnez','3447321',2,'1969-12-31','F',1),(110,'Leticia','','Mamani','Choque','6888773',2,'1969-12-31','F',1),(111,'Esperanza','Juana','Mamani','Mamani','3416556',2,'1969-12-31','F',1),(112,'Wassia','','Mamani','Mamani','6812832',2,'1969-12-31','F',1),(113,'Abraham','','Mamani','Veliz','4477199',3,'1969-12-31','M',1),(114,'Roberto','Carlos','Marca','Tinta','5045150',5,'1985-04-07','M',1),(115,'Galo','','Medina','PeÑa','2889683',3,'1963-11-03','M',1),(116,'Martha','Veronica','Mejia','Navia','3755372',3,'1969-12-31','F',1),(117,'Dina','Gladys','Mena','Sarco','2554403',2,'1969-12-31','F',1),(118,'Gil','','Mezza','Avila','1076173',8,'1962-01-09','M',1),(119,'Sandro','','Mita','Carrera','2377397',2,'1969-12-31','M',1),(120,'Franz','','Mita','Machaca','5398683',4,'1977-04-10','M',1),(121,'Luisa','','Mita','Tola','3147023',3,'1969-12-31','F',1),(122,'Jaime','','MontaÑo','Gallardo','5900129',3,'1969-12-31','M',1),(123,'Gladys','','Morales','Cuellar','3099863',1,'1969-12-31','F',1),(124,'Rosaura','Miriam','Morales','PaÑuni','3378182',2,'1969-12-31','F',1),(125,'Obed','Rafael','Morante','Quisbert','6494523',3,'1969-12-31','M',1),(126,'Jenny','Isabel','Nogales','Copa','4443242',3,'1969-12-31','F',1),(127,'Carlos','Patricio','Olivares','Rodriguez','O3781057',11,'1972-07-01','M',1),(128,'Raquel','','Orellana','Guevara','4728026',4,'1969-12-31','F',1),(129,'Adriana','Rocio','Ortiz','Aparicio','6540944',3,'1988-03-10','F',1),(130,'Yenny','Bonny','Ortiz','Vasquez','3588853',3,'1969-12-31','F',1),(131,'Lizeth','','Paco','Mena','4314250',2,'1969-12-31','F',1),(132,'Pablo','Elias','Paco','Poma','4837988',2,'1969-12-31','M',1),(133,'Yojan','David','Paco','Rodriguez','5941869',2,'1969-12-31','M',1),(134,'Jose','Maria','Pardo','Brito','6355776',2,'1969-12-31','M',1),(135,'Blanca','Eliana','Patzi','Flores','3358042',2,'1969-12-31','F',1),(136,'Lizeth','Angelica','Paz','Callisaya','6789797',2,'1990-12-05','F',1),(137,'Patricia','Lenny','Peredo','Davalos','4506705',3,'1969-12-31','F',1),(138,'Lizeth','','Perez','Mamani','6560475',9,'1969-12-31','F',1),(139,'Evert','Erwin','Perez','Morales','5189904',3,'1969-12-31','M',1),(140,'Victor','Hugo','Perez','Rojas','4845594',2,'1979-06-05','M',1),(141,'Heber','','Pinheiro','Salazar','3144281',3,'1969-12-31','M',1),(142,'Aurora','Elizabeth','Pocoaca','Saenz','2208172',2,'1969-12-31','F',1),(143,'Severo','Victor','Quino','Arroyo','8053329',3,'1968-08-11','M',1),(144,'Wilson','','Quiroga','Saavedra','5190547',3,'1969-12-31','M',1),(145,'Eloy','Armando','Quispe','Huanca','3439614',2,'1971-01-12','M',1),(146,'Eunice','','Quispe','UreÑa','5938278',3,'1969-12-31','F',1),(147,'Elida','','Rivero','Cosio','928931',3,'1969-12-31','F',1),(148,'Daniel','Porfirio','Rodriguez','Chacon','3403957',2,'1969-12-31','M',1),(149,'Silvia','','Rodriguez','Herrera','6187310',2,'1987-05-02','F',1),(150,'Marisol','','Rodriguez','Valencia','6481747',3,'1969-12-31','F',1),(151,'Ingrid','Ximena','Rojas','Malfert','2229114',2,'1963-06-03','F',1),(152,'Lisa','Vibiana','Rojas','Ponce','3725442',3,'1969-12-31','F',1),(153,'Victor','Fernando','Rojas','Quispe','6896630',2,'1988-01-12','M',1),(154,'Jaime','Arturo','Ruilova','Torres','2150220',2,'1969-12-31','M',1),(155,'Jhoann','Evelin','Saavedra','Mercado','8987919',4,'1993-04-12','F',1),(156,'Miguel','Angel','Salomon','Mendez','762344',3,'1969-12-31','M',1),(157,'Grover','Enrrique','Sanchez','Alberto','3332231',2,'1969-12-31','M',1),(158,'Jose','Luis','Santa cruz','Ruiz','1538079',4,'1953-07-04','M',1),(159,'Eduardo','','Saravia','Achu','6792714',2,'1969-12-31','M',1),(160,'Nancy','','Sarzuri','Marin','3362995',2,'1968-07-11','F',1),(161,'Shirley','Claudia','Siles','Quintanilla','4458533',3,'1969-12-31','F',1),(162,'Lendy','Marioly','Simon','Melendres','7285301',1,'1992-04-06','F',1),(163,'Marcia','','Sinko','Yapu','4483908',3,'1969-12-31','F',1),(164,'Clotilde','Elizabeth','Solis','Gutierrez','3022878',3,'1964-12-07','F',1),(165,'Oscar','Rafael','Suarez','Hinojoza','4530066',3,'1969-12-31','M',1),(166,'Freddy','Efrain','Tancara','Villca','4042130',1,'1979-08-08','M',1),(167,'Marcia','Rocio','Tapia','Alvarez','3501035',1,'1969-12-31','F',1),(168,'Shirlyn','Dania','Tapia','Cruz','3506485',1,'1969-12-31','F',1),(169,'Estefania','','Tarqui','Valle','4462224',3,'1969-12-31','F',1),(170,'Ramiro','','Teran','Encinas','4411368',3,'1976-11-04','M',1),(171,'Juana','','Terrazas','Terrazas','8236831',4,'1989-05-27','F',1),(172,'Oscar','Jose','Tola','Huarachi','3091501',1,'1969-12-31','M',1),(173,'Angelica','','Ucharico','Apaza','6010891',2,'1969-12-31','F',1),(174,'Jose','Manuel','Ugarteche','Herrera','3270676',4,'1972-08-04','M',1),(175,'Wilmer','','Uraquina','Garcia','5262143',3,'1969-12-31','M',1),(176,'Sara','Milka','Valdez','TacanÁ','5963273',2,'1969-12-31','F',1),(177,'Rolando','Elmer','Vallejos','Aranibar','2900073',3,'1969-12-31','M',1),(178,'Sandra','Virginia','Vargas','Fernandez','5313631',3,'1969-12-31','F',1),(179,'David','','Vargas','Orellana','3822446',4,'1969-12-31','M',1),(180,'Elias','Francisco','Vargas','Valdez','5037697',5,'1969-12-31','M',1),(181,'Claudia','','Veizaga','Rios','4528162',3,'1969-12-31','F',1),(182,'Noelene','','Ventura','Canaviri','7863094',3,'1969-12-31','F',1),(183,'Nohemi','','Ventura','Canaviri','5720811',1,'1969-12-31','F',1),(184,'Miguel','','Vera','Colque','3551744',1,'1969-12-31','M',1),(185,'Karina','','Villarroel','Colque','4021831',1,'1969-12-31','F',1),(186,'Roman','','Villarroel','Meruvia','4482778',3,'1979-06-07','M',1),(187,'Elizabeth','','Villca','Callizaya','8444687',2,'1969-12-31','F',1),(188,'David','Gerson','Villca','Fernandez','6408844',3,'1969-12-31','M',1),(189,'Samuel','','Vino','Vino','5473579',2,'1969-12-31','M',1),(190,'Javier','','Viscarra','Carrasco','5938122',3,'1969-12-31','M',1),(191,'Joel','Ramiro','Yugar','Mier','3506232',1,'1969-12-31','M',1),(192,'Max','Abel','Yugar','Mier','3097586-1M',1,'1969-12-31','M',1),(193,'Christian','','Yujra','Castillo','8361272',2,'1969-12-31','M',1),(194,'Sergio','Gustavo','Zabaleta','Susara','3422315',2,'1973-03-07','M',1),(195,'Alvaro','Alberto','Zacarias','Mamani','6872318',2,'1969-12-31','M',1),(196,'Dorti','Eliana','Zapata','Palli','4797289',2,'1969-12-31','F',1),(197,'Luis','','Zegarra','Mamani','2417228',2,'1969-12-31','M',1),(198,'Alguien',NULL,'Apellido',NULL,'846441ALGUIEN',NULL,'2017-07-17',NULL,2),(199,'Primer','Apellido','Bebe','','846441PRIMERAPELLIDO',NULL,'2017-07-12',NULL,NULL),(200,'Alguien','Referencia','Elsy',NULL,'846441ALGUIENREFERENCIA',NULL,NULL,NULL,NULL),(201,'Vanesa',NULL,'Quispe','Laura','4541212',1,'1994-08-18','F',1),(202,'Esther','Marisol','Quispe','Laura','8452122',2,'2017-07-12','F',1),(203,'Daniela',NULL,'Mamani','Silvestre','452124866',2,'2017-07-03','F',1),(204,'Noelia','Nancy','Simon','Melendres','65151',1,'2017-07-20','F',1),(206,'Jhinny',NULL,'Gutierrex',NULL,'78787',2,'2017-07-14','M',3),(207,'Jose',NULL,'Magne','Sanchez','85454848',3,'2017-07-18','M',1),(208,'Jorge',NULL,'Chavez','Molina','545125',7,'2017-07-18','M',1),(209,'Angela',NULL,'Chavez','Molina','74154871',3,'2017-07-13','M',1),(210,'Limber',NULL,'Chavez','Molina','8157515',2,'2017-07-18','M',1),(211,'Victor',NULL,'Chavez','Molina','7214552',2,'2017-07-18','M',1);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `idPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `idNacion` int(11) NOT NULL,
  `idTipoPersonal` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idCargoPersona` int(11) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idCiudad` int(11) NOT NULL,
  `idReligion` int(11) DEFAULT NULL,
  `fechaBautizmo` date DEFAULT NULL,
  `idSeguro` int(11) DEFAULT NULL,
  `numeroSeguro` int(11) DEFAULT NULL,
  `idAfp` int(11) DEFAULT NULL,
  `numeroAfp` int(11) DEFAULT NULL,
  `numeroLibretaMilitar` int(11) DEFAULT NULL,
  `numeroPasaporte` varchar(30) DEFAULT NULL,
  `tipoSangre` varchar(10) DEFAULT NULL,
  `hobby` varchar(70) DEFAULT NULL,
  `lecturaPreferencial` varchar(100) DEFAULT NULL,
  `numeroRegistroProfesional` varchar(50) DEFAULT NULL,
  `fechaIngreso` date NOT NULL,
  `rutaFoto` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `idCargoPersona` (`idCargoPersona`),
  KEY `idPersona` (`idPersona`),
  KEY `idNacion` (`idNacion`),
  KEY `idSeguro` (`idSeguro`),
  KEY `idAfp` (`idAfp`),
  KEY `idTipoPersonal` (`idTipoPersonal`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idCiudad` (`idCiudad`),
  KEY `idReligion` (`idReligion`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,3,1,1,14,1,'Av. Santa Barbara','oscar@hotmail.com',1,4,'2017-07-11',1,5412451,3,5412451,7845451,'1245455','ORH+','Leer','Accion y Ficcion','7884545','2017-07-20','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img78455454.jpg',1),(2,8,1,2,NULL,6,'Av. Santa Barbara','miriam@gmail.com',2,4,'2017-07-17',1,782202,3,782202,4541291,'1589138','ORH+','Ver novelas','Comedia Romantica','454592','2017-07-11','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img78211453.jpg',1),(4,10,1,1,12,1,'Av. Pairumani','elsy@hotmail.com',1,1,'2017-06-29',1,15151512,2,15151512,54151,'212515','ORH+','Jugar Basquet','Novelas romanticas','5641212','2017-07-12','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img846441.jpg',1),(5,201,1,2,NULL,NULL,'Av. Santa Barbara','vanesa@hotmail.com',1,1,'2017-07-14',1,12151521,1,12151521,115152,'11515151','ORH+','Ver peliculas','Terror y Suspenso','45412144','2017-07-12','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img4541212.jpg',1),(6,202,1,1,6,1,'Av. Santa Barbara','esther@hotmail.com',1,1,'2017-07-12',1,435435,1,435435,534543543,'3543543','ORH+','dfdnklv','ghrthhrhrt','345435','2017-07-12','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img8452122.jpg',1),(7,203,1,4,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-12',NULL,1),(8,205,1,1,1,1,'Av. 6 de agosto','',1,1,'2017-07-19',1,3453,1,3453,534535,'5353','ORH+','grhrhr','hrrrt','hrhrt','2017-07-12','/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/img4845421.jpg',1),(9,206,1,1,8,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-14',NULL,1),(10,207,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-18',NULL,1),(11,208,1,1,10,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-18',NULL,1),(12,209,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-18',NULL,1),(13,210,1,1,NULL,5,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-18',NULL,1),(14,211,1,1,11,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-18',NULL,1);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personaltablameritosdocenteprofesor`
--

DROP TABLE IF EXISTS `personaltablameritosdocenteprofesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personaltablameritosdocenteprofesor` (
  `idPersonal` int(11) NOT NULL,
  `idTablaMeritoDocenteProfesor` int(11) NOT NULL,
  KEY `idPersonal` (`idPersonal`),
  KEY `idTablaMeritoDocenteProfesor` (`idTablaMeritoDocenteProfesor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personaltablameritosdocenteprofesor`
--

LOCK TABLES `personaltablameritosdocenteprofesor` WRITE;
/*!40000 ALTER TABLE `personaltablameritosdocenteprofesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `personaltablameritosdocenteprofesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referenciapersonal`
--

DROP TABLE IF EXISTS `referenciapersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referenciapersonal` (
  `idReferenciaPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  PRIMARY KEY (`idReferenciaPersonal`),
  KEY `idPersona` (`idPersona`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referenciapersonal`
--

LOCK TABLES `referenciapersonal` WRITE;
/*!40000 ALTER TABLE `referenciapersonal` DISABLE KEYS */;
INSERT INTO `referenciapersonal` VALUES (1,4,1),(2,200,4);
/*!40000 ALTER TABLE `referenciapersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religion` (
  `idReligion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreReligion` varchar(70) NOT NULL,
  PRIMARY KEY (`idReligion`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religion`
--

LOCK TABLES `religion` WRITE;
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
INSERT INTO `religion` VALUES (1,'ADVENTISTA'),(2,'MORMON'),(3,'BUDISTA'),(4,'CATOLICO'),(5,'JUDIO'),(6,'MUSULMAN');
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsabilidad`
--

DROP TABLE IF EXISTS `responsabilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsabilidad` (
  `idResponsabilidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idResponsabilidad`)
) ENGINE=MyISAM AUTO_INCREMENT=388 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsabilidad`
--

LOCK TABLES `responsabilidad` WRITE;
/*!40000 ALTER TABLE `responsabilidad` DISABLE KEYS */;
INSERT INTO `responsabilidad` VALUES (1,'AFAM - MINISTERIO DE LA MUJER'),(2,'ALMACÉN'),(3,'ALMACÉN SPA - MBC'),(4,'ALMACENES MBO'),(5,'ANALISTA DE TESORERÍA DE IGLESIAS'),(6,'ANALISTA REMESAS '),(7,'ARQUITECTO'),(8,'ASESOR JURÍDICO, LIBERTAD RELIGIOSA'),(9,'ASESOR LEGAL'),(10,'ASESORA LEGAL MOB'),(11,'ASESORA PEDAGÓGICA ASEA'),(12,'ASESORÍA LEGAL'),(13,'ASIST. AUDITORÍA '),(14,'ASIST. FINANCIERO Y CAPELLÁN'),(15,'ASIST. LEGALES ASEA'),(16,'ASIST. VENTAS - SRIA. PUBL.'),(17,'ASISTENTE'),(18,'ASISTENTE DEPARTAMENTO LEGAL'),(19,'ASISTENTE ALMACÉN SPA - MBC'),(20,'ASISTENTE BIBLIOTECA'),(21,'ASISTENTE COCHABAMBA CENTRAL'),(22,'ASISTENTE COCHABAMBA SUR '),(23,'ASISTENTE COLPORTORES'),(24,'ASISTENTE CONTABLE ASEA'),(25,'ASISTENTE DE COMUNICACIONES'),(26,'ASISTENTE DE CONTABILIDAD'),(27,'ASISTENTE DE PUBLICACIONES'),(28,'ASISTENTE DE SECRETARÍA IGLESIAS'),(29,'ASISTENTE FINANCIERO'),(30,'ASISTENTE LEGAL'),(31,'ASISTENTE SECRETARIA GENERAL'),(32,'ASISTENTE VALLE ALTO'),(33,'ASOCIACIÓN MINISTERIAL, MAYORDOMÍA CRISTIANA'),(34,'ASOCIACIÓN MINISTERIAL Y COMUNICACIÓN'),(35,'ATENCIÓN LIBRERÍA'),(36,'AUDITOR - GESTOR DE REMESAS'),(37,'AUDITOR INTERNO'),(38,'AUDITOR MOB'),(39,'AUXILIAR'),(40,'AUXILIAR CONTABLE'),(41,'AUXILIAR DE PLANTA'),(42,'AUXILIAR DE SECRETARIA GENERAL'),(43,'AYUDANTE - LAHUACHACA - PATIHIPE'),(44,'AYUDANTE - PATACAMAYA \"B\" - CURAHUARA'),(45,'AYUDANTE DE JARDÍNES'),(46,'BEDELIA'),(47,'CAJA'),(48,'CAJERO(A)'),(49,'CAJERO(A) MOB'),(50,'CAPELLÁN'),(51,'CAPELLÁN EDUCACIÓN - SALUD'),(52,'CAPELLÁN UEAB SECUNDARIA'),(53,'CAPELLÁN-FINANCIERO'),(54,'CHIQUITANÍA'),(55,'COMEDOR'),(56,'COMUNICACIONES RNT'),(57,'CONAVI '),(58,'CONQUISTADORES Y AVENTUREROS, JA, MÚSICA'),(59,'CONSERJE'),(60,'CONSERJE - LIMPIEZA'),(61,'CONSERJE CARANAVI'),(62,'CONSTRUCCIÓN '),(63,'CONTADOR ASEA'),(64,'CONTADOR ASEA-MBC'),(65,'CONTADOR DE TESORERÍA DE IGLESIAS'),(66,'CONTADOR MOB'),(67,'CONTADOR(A)'),(68,'CONTADOR(A) REGIONAL'),(69,'COORDINADOR(A) ACADÉMICO(A)'),(70,'COORDINADOR(A) MARKETING Y CREA'),(71,'COORDINADOR(A) PEDAGÓGICO(A)'),(72,'COORDINADOR(A) ACADÉMICO(A) TURNO MAÑANA'),(73,'COORDINADOR(A) ACADÉMICO(A) TURNO TARDE'),(74,'DECANO(A) FACULTAD DE CIENCIAS DE SALUD'),(75,'DECANO(A) FACULTAD DE EDUCACIÓN'),(76,'DECANO(A) FCEA'),(77,'DECANO(A) INGENIERÍA'),(78,'DECANO(A) TEOLOGÍA'),(79,'DEPARTAMENTAL ASEA-MBC'),(80,'DEPARTAMENTO DE INVESTIGACIÓN'),(81,'DIR. PAC E INVESTIGACIÓN'),(82,'DIR. TÉCNICO TV Y RADIO'),(83,'DIRECTOR ASOCIADO PUBLICACIONES'),(84,'DIRECTOR BIBLIOTECA'),(85,'DIRECTOR DE BIENESTAR ESTUDIANTIL'),(86,'DIRECTOR DE ESCUELA BÍBLICA'),(87,'DIRECTOR DPTO PUBLICACIONES '),(88,'DIRECTOR FINANCIERO'),(89,'DIRECTOR GENERAL'),(90,'DIRECTOR IDEC'),(91,'DIRECTOR INSTITUTO DE MÚSICA'),(92,'DIRECTOR TV Y RADIO'),(93,'DIRECTOR UEAB'),(94,'DIRECTOR(A)'),(95,'DISEÑADOR(A)'),(96,'DISTRITAL INQUISIVI'),(97,'DISTRITAL 12 DE OCTUBRE'),(98,'DISTRITAL 16 DE JULIO'),(99,'DISTRITAL 21 DE SEPTIEMBRE'),(100,'DISTRITAL ACHACACHI '),(101,'DISTRITAL ALTIPLANO NORTE'),(102,'DISTRITAL ALTO BENI'),(103,'DISTRITAL AMAZONÍA'),(104,'DISTRITAL APOLO - ESCOMA'),(105,'DISTRITAL BELLO HORIZONTE'),(106,'DISTRITAL CARANAVI \"A\"'),(107,'DISTRITAL CARANAVI \"B\"'),(108,'DISTRITAL CARANAVI \"B\"'),(109,'DISTRITAL CARANAVI \"C\"'),(110,'DISTRITAL CEAB'),(111,'DISTRITAL CENTRAL LA PAZ'),(112,'DISTRITAL CHARAPAQUI'),(113,'DISTRITAL CHULUMANI'),(114,'DISTRITAL COBIJA'),(115,'DISTRITAL COCHABAMBA CENTRAL'),(116,'DISTRITAL COCHABAMBA ESTE'),(117,'DISTRITAL COCHABAMBA NORESTE'),(118,'DISTRITAL COCHABAMBA NORTE'),(119,'DISTRITAL COCHABAMBA PROGRESO'),(120,'DISTRITAL COCHABAMBA SUR'),(121,'DISTRITAL COROICO'),(122,'DISTRITAL COSMOS'),(123,'DISTRITAL DE NUEVOS HORIZONTES'),(124,'DISTRITAL DE ROSARIO'),(125,'DISTRITAL EL LAGO'),(126,'DISTRITAL ENTRE RÍOS'),(127,'DISTRITAL GALINDO NORTE'),(128,'DISTRITAL GUAYARAMERÍN'),(129,'DISTRITAL HUAYNA POTOSÍ'),(130,'DISTRITAL I.A.L.A.'),(131,'DISTRITAL ILLIMANI'),(132,'DISTRITAL IVIRGARZAMA'),(133,'DISTRITAL KUPINI'),(134,'DISTRITAL KUPINI'),(135,'DISTRITAL LA ASUNTA \"A\"'),(136,'DISTRITAL LA ASUNTA \"B\"'),(137,'DISTRITAL LA ASUNTA \"C\"'),(138,'DISTRITAL LA HERMOSA'),(139,'DISTRITAL LA HERMOSA'),(140,'DISTRITAL LA PORTADA'),(141,'DISTRITAL LAHUACHACA'),(142,'DISTRITAL LAS FRONTERAS'),(143,'DISTRITAL LAS MERCEDES'),(144,'DISTRITAL LAZARTE'),(145,'DISTRITAL LLALLAGUA'),(146,'DISTRITAL LOMA LINDA'),(147,'DISTRITAL LOS ANDES'),(148,'DISTRITAL LOS ANDES (AYUDANTE)'),(149,'DISTRITAL MIRAFLORES'),(150,'DISTRITAL MONTERO'),(151,'DISTRITAL NORTE LA PAZ'),(152,'DISTRITAL OBRAJES'),(153,'DISTRITAL ORURO CENTRAL'),(154,'DISTRITAL ORURO ESTE'),(155,'DISTRITAL ORURO NORESTE'),(156,'DISTRITAL ORURO NORTE'),(157,'DISTRITAL ORURO SUR'),(158,'DISTRITAL PACAJES'),(159,'DISTRITAL PAIRUMANI'),(160,'DISTRITAL PAMPAHASI'),(161,'DISTRITAL PATACAMAYA \"A\"'),(162,'DISTRITAL PATACAMAYA \"B\"'),(163,'DISTRITAL PLAN 3000'),(164,'DISTRITAL POTOSÍ/LOS CINTIS'),(165,'DISTRITAL POTOSÍ/UYUNI'),(166,'DISTRITAL PUERTO SUAREZ'),(167,'DISTRITAL PUESTO FERNÁNDEZ'),(168,'DISTRITAL QUILLACOLLO NORTE'),(169,'DISTRITAL QUILLACOLLO SUR'),(170,'DISTRITAL RÍO SECO \"A\"'),(171,'DISTRITAL RURRENABAQUE'),(172,'DISTRITAL SACABA'),(173,'DISTRITAL SAN BORJA'),(174,'DISTRITAL SC-CENTRAL'),(175,'DISTRITAL SENKATA \"A\"'),(176,'DISTRITAL SENKATA \"B\"'),(177,'DISTRITAL SOPOCACHI'),(178,'DISTRITAL SUCRE CENTRAL'),(179,'DISTRITAL SUCRE NORTE'),(180,'DISTRITAL SUMUMPAYA'),(181,'DISTRITAL SUR LA PAZ'),(182,'DISTRITAL TRINIDAD SUROESTE'),(183,'DISTRITAL TUPIZA/VILLAZON'),(184,'DISTRITAL UAB'),(185,'DISTRITAL V.REMEDIOS-COLLANA'),(186,'DISTRITAL VALLE ALTO'),(187,'DISTRITAL VIACHA'),(188,'DISTRITAL VILLA ADELA'),(189,'DISTRITAL VILLA BALLIVÍAN'),(190,'DISTRITAL VILLA COPACABANA'),(191,'DISTRITAL VILLA COPACABANA (AYUDANTE)'),(192,'DISTRITAL VILLA DOLORES'),(193,'DISTRITAL VILLA FÁTIMA'),(194,'DISTRITAL VILLA MEXICO'),(195,'DISTRITAL VILLA SAN SALVADOR'),(196,'DISTRITAL VILLA TEJADA'),(197,'DISTRITAL VILLA TUNARI'),(198,'DISTRITAL VINTO NORTE'),(199,'DISTRITAL VINTO SUR'),(200,'DISTRITAL WARNES'),(201,'DISTRITAL YACUIBA \"A\"'),(202,'DISTRITAL YAPACANÍ'),(203,'DOCENTE FACULTAD DE TEOLOGÍA'),(204,'DOCENTE FACULTAD DE CS. DE LA EDUCACIÓN'),(205,'DOCENTE FACULTAD DE CS. SALUD'),(206,'DOCENTE FCEA'),(207,'DOCENTE FACULTAD DE INGENIERÍA'),(208,'EDITOR-VIDEO'),(209,'EDUCACIÓN'),(210,'EDUCACIÓN, COMUNICACIÓN'),(211,'EDUCACIÓN, LIBERTAD RELIGIOSA Y MÚSICA'),(212,'EDUCACIÓN, SALUD'),(213,'ENCARGADA ALMACEN'),(214,'ENCARGADA DE LECHERÍA'),(215,'ENCARGADA SERVICIO LIMPIEZA'),(216,'ENCARGADA VENTAS SPA'),(217,'ENCARGADO ALMACENES CAMARGO'),(218,'ENCARGADO ALMACENES EL ALTO'),(219,'ENCARGADO CAMPUS DEPORTIVOS'),(220,'ENCARGADO DE CARPINTERÍA'),(221,'ENCARGADO DE INVENTARIOS SPA'),(222,'ENCARGADO DE PLOMERÍA'),(223,'ENCARGADO DE SONIDO Y PANADERÍA'),(224,'EVANGELISMO - ESCUELA SABÁTICA - MINISTERIO PERSONAL'),(225,'EVANGELISMO, MIP-ES, ASA'),(226,'FINANCIERO(A)'),(227,'FINANCIERO/CAPE/PSICOPED.'),(228,'GERENTE FINANCIERO'),(229,'GERENTE T.I.'),(230,'GESTIÓN DEL TALENTO HUMANO'),(231,'GESTOR REMESAS'),(232,'GUARAYOS'),(233,'GUAYARAMERÍN'),(234,'INSA ARCHIVOS'),(235,'INSTRUCTOR BÍBLICO'),(236,'JARDINERO'),(237,'JEFE DE SEGURIDAD Y VIGILANCIA'),(238,'JEFE DE ALMACENES'),(239,'JEFE DE FINANZAS ALUMNOS'),(240,'JEFE DE JARDÍNES'),(241,'JEFE DE MANTENIMEINTO'),(242,'JEFE DE PRODUCCIÓN'),(243,'LIBRERÍA SPA - MBC'),(244,'LIMPIEZA'),(245,'LOCUTOR(A)'),(246,'LOGISTICA -SERV ALIMENTACION'),(247,'MAMORÉ'),(248,'MANTENIMIENTO '),(249,'MARKETING'),(250,'MC-SALUD - AM - HF'),(251,'MENSAJERÍA'),(252,'MIN. PERSONAL, EE.SS, EVANGELISMO, ASA'),(253,'MINISTERIO DE LA MUJER - AFAM'),(254,'MINISTERIO DE PUBLICACIONES Y SALUD'),(255,'MINISTERIO DEL NIÑO Y ADOLESCENTE'),(256,'MINISTERIO JOVEN - MÚSICA - COMUNICACIÓN'),(257,'MINISTERIO JOVEN - MÚSICA - HOGAR Y FAMILIA'),(258,'MINISTERIO JOVEN Y MIN. DE LA FAMILIA'),(259,'MIPES - ESC. SAB. - EV. - ASA'),(260,'MIPES - EVANGELISMO-ASA'),(261,'MJ-MA-MC-MÚSICA - MG'),(262,'MM, AFAM '),(263,'MINISTERIO DE LA MUJER - MINISTERIO DEL NIÑO Y ADOLESCENTE'),(264,'MONTERO CENTRAL'),(265,'MONTERO NORTE'),(266,'OPERADOR DE GUILLOTINA'),(267,'PASTOR DISTRITAL'),(268,'PERIODISTA'),(269,'PERSONAL DE INFORMÁTICA'),(270,'PERSONAL DE SEGURIDAD'),(271,'PERSONAL SEGURIDAD Y VIGILANCIA'),(272,'PIRAÍ'),(273,'PRECEPTOR HOGAR DE VARONES'),(274,'PRECEPTORA SEÑORITAS'),(275,'PRENSISTA'),(276,'PRESIDENTE'),(277,'PRESIDENTE - LIBERTAD RELIGIOSA'),(278,'PRESIDENTE, TESTAMENTO Y LEGADOS'),(279,'PROFESOR DE BIBLIA'),(280,'PROGRAMADOR'),(281,'PSICOPEDAGOGO(A)'),(282,'PUBLICACIONES - ESPÍRITU PROFECÍA - SALUD'),(283,'PUBLICACIONES - SALUD'),(284,'PUERTO SUÁREZ'),(285,'PUESTO FERNÁNDEZ'),(286,'RECEPCIÓN'),(287,'RECEPCIÓN - JA'),(288,'RECEPCIÓN, SECRETARIA CONTABILIDAD'),(289,'RECEPCIONISTA'),(290,'RECEPCIONISTA Y DIGITADORA DE BAUTISMOS'),(291,'RECTOR'),(292,'RELACIONES PÚBLICAS Y VENTAS'),(293,'RESPONSABLE CONSTRUCCIÓN'),(294,'RESPONSABLE LIMPIEZA'),(295,'RESPONSABLE REDES'),(296,'RIBERALTA'),(297,'RIO SECO \"B\"'),(298,'SAMAIPATA'),(299,'SAN JULIÁN'),(300,'SANTA FE'),(301,'SC - 4 DE NOVIEMBRE'),(302,'SC - ARROYITO'),(303,'SC - AVAROA'),(304,'SC - BARRIO LINDO'),(305,'SC - CENTRAL'),(306,'SC - HAMACAS'),(307,'SC - HAMACAS - ASOCIADO'),(308,'SC - LA COLORADA'),(309,'SC - LA GUARDIA'),(310,'SC - NORESTE'),(311,'SC - NORTE'),(312,'SC - NUEVO PALMAR'),(313,'SC - PARI'),(314,'SC - PAURITO'),(315,'SC - PLAN 3000'),(316,'SC - SOBERANIA'),(317,'SC - SUR'),(318,'SC - SUROESTE'),(319,'SC - V. 1º DE MAYO'),(320,'SEC. MIN. JOVEN - COM. -M. NIÑO,ADOLESC.'),(321,'SEC. MIPES - EVANGELISMO-AFAM,MM'),(322,'SECRETARIA'),(323,'SECRETARIA MIPES-PUBLICACIONES-SALUD-MN Y MA'),(324,'SECRETARIA ACAD. FACULTAD CS. SALUD'),(325,'SECRETARIA ACADÉMICA EDUCACIÓN '),(326,'SECRETARÍA ACMS'),(327,'SECRETARIA ADMINISTRACIÓN'),(328,'SECRETARIA ADMINISTRACIÓN-ASOC. MIN.'),(329,'SECRETARIA ASEA '),(330,'SECRETARIA BIENESTAR ESTUDIANTIL'),(331,'SECRETARIA CS. DE LA SALUD'),(332,'SECRETARIA DEPARTAMENTOS '),(333,'SECRETARIA EDUCACIÓN'),(334,'SECRETARÍA ESCUELA BÍBLICA'),(335,'SECRETARIA EVANGELISMO,MIP-ES, CONQUIST.AVENT.,JA'),(336,'SECRETARIA FAC. INGENIERÍA'),(337,'SECRETARIA FACULTAD DE CS. ECONÓMICAS'),(338,'SECRETARIA FACULTAD DE CS. EDUCACIÓN'),(339,'SECRETARIA FACULTAD TEOLOGÍA '),(340,'SECRETARIA GENERAL'),(341,'SECRETARÍA IGLESIAS ACMS'),(342,'SECRETARIA MAYORDOMÍA-ASOC. MIN.-MM Y AFAM'),(343,'SECRETARIA PUBLICACIONES, RECEPCIÓN'),(344,'SECRETARIA PUBLICACIONES-AFAM-MM-MN Y MA-MAYORDOMÍA-SALUD'),(345,'SECRETARIA RECEPCIONISTA'),(346,'SECRETARIO ACAD. TEOLOGÍA'),(347,'SECRETARIO ACADÉMICO FCEA'),(348,'SECRETARIO ACADÉMICO INGENIERÍA'),(349,'SECRETARIO EJECUTIVO'),(350,'SECRETARIO EJECUTIVO - MIN. DE LA FAMILIA'),(351,'SECRETARIO EJECUTIVO Y MAYORDOMÍA'),(352,'SECRETARIO MINISTERIAL - MAYORDOMÍA - ASA'),(353,'SECRETARIO, MINISTERIO DE LA FAMILIA'),(354,'SERVICIOS - POMERÍA '),(355,'SISTEMAS'),(356,'SISTEMAS MOB'),(357,'SRIA. JA Y MAYORDOMÍA'),(358,'SRIA. MIPES - EVANG.- ESC. SAB. - ASA'),(359,'SRIA. PUBLIC. Y MN-MA-MM'),(360,'TARIJA - BERMEJO'),(361,'TARIJA - CENTRAL'),(362,'TARIJA - LOMA LINDA'),(363,'TÉCNICO AUDIO'),(364,'TÉCNICO SECRETARÍA GENERAL'),(365,'TESORERO'),(366,'TESORERO - MISIÓN GLOBAL'),(367,'TESORERO ASISENTE MOB'),(368,'TESORERO ASISTENTE'),(369,'TESORERO ASISTENTE ASEA'),(370,'TESORERO ASISTENTE ASEA-MBC'),(371,'TESORERO ASISTENTE DE IGLESIA'),(372,'TESORERO ASISTENTE SISTEMA EDUCATIVO'),(373,'TESORERO MOB'),(374,'TESORERO, MISIÓN GLOBAL'),(375,'TRANSMISIÓN'),(376,'TRINIDAD NORTE'),(377,'TRINIDAD SURESTE'),(378,'TRINIDAD SUROESTE'),(379,'VENTAS '),(380,'VICE-PRECEPTOR HOGAR DE VARONES'),(381,'VICERRECTOR ACADÉMICO'),(382,'VICERRECTORA ADMINISTRATIVA FINANCIERA'),(383,'VILLAMONTES'),(384,'WARNES'),(385,'YACUIBA A'),(386,'YACUIBA B'),(387,'YAPACANI');
/*!40000 ALTER TABLE `responsabilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguro`
--

DROP TABLE IF EXISTS `seguro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguro` (
  `idSeguro` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSeguro` varchar(70) NOT NULL,
  PRIMARY KEY (`idSeguro`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguro`
--

LOCK TABLES `seguro` WRITE;
/*!40000 ALTER TABLE `seguro` DISABLE KEYS */;
INSERT INTO `seguro` VALUES (1,'CAJA NACIONAL DE SALUD');
/*!40000 ALTER TABLE `seguro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tablameritosdocenteprofesor`
--

DROP TABLE IF EXISTS `tablameritosdocenteprofesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tablameritosdocenteprofesor` (
  `idTablaMeritoDocenteProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(12) NOT NULL,
  `tipoMerito` varchar(20) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTablaMeritoDocenteProfesor`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tablameritosdocenteprofesor`
--

LOCK TABLES `tablameritosdocenteprofesor` WRITE;
/*!40000 ALTER TABLE `tablameritosdocenteprofesor` DISABLE KEYS */;
INSERT INTO `tablameritosdocenteprofesor` VALUES (1,'1.0','Personal Academico','2017-07-12',0),(2,'1.1','Personal Academico','2017-07-22',1);
/*!40000 ALTER TABLE `tablameritosdocenteprofesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `numeroTelefono` int(11) NOT NULL,
  PRIMARY KEY (`idTelefono`),
  KEY `idPersona` (`idPersona`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (1,3,7874545),(2,4,6874585),(3,8,7541921),(4,9,7874542),(9,201,874551212),(6,3,8511512),(14,10,898933894),(8,200,4848),(10,202,8465161),(11,203,7484511),(12,204,8412329),(13,205,78945151),(15,206,8787787),(16,207,8415107),(17,208,87815522),(18,209,8854512),(19,210,78524),(20,211,7852555);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonocontacto`
--

DROP TABLE IF EXISTS `telefonocontacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonocontacto` (
  `idTelefonoContacto` int(11) NOT NULL AUTO_INCREMENT,
  `idContacto` int(11) NOT NULL,
  `tipoTelefono` varchar(15) NOT NULL,
  `numero` varchar(15) NOT NULL,
  PRIMARY KEY (`idTelefonoContacto`),
  KEY `idContacto` (`idContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonocontacto`
--

LOCK TABLES `telefonocontacto` WRITE;
/*!40000 ALTER TABLE `telefonocontacto` DISABLE KEYS */;
INSERT INTO `telefonocontacto` VALUES (1,1,'Celular','722-37470'),(2,2,'Celular','722-37033'),(3,3,'Celular','722-37003'),(4,4,'Celular','722-37771'),(5,5,'Celular','722-37020'),(6,6,'Celular','722-37025'),(7,7,'Celular','717-37675'),(8,8,'Celular','722-37702'),(9,9,'Celular','716-04909'),(10,10,'Celular','722-72735'),(11,11,'Celular','721-37708'),(12,12,'Celular','670-04392'),(13,13,'Celular','716-55867'),(14,14,'Celular','727-05999'),(15,15,'Celular','722-37461'),(16,16,'Celular','717-30407'),(17,17,'Celular','717-37656'),(18,18,'Celular','722-37500'),(19,19,'Celular','717-29923'),(20,20,'Celular','722-37779'),(21,21,'Celular','722-37473'),(22,22,'',''),(23,23,'Celular','722-37214'),(24,24,'Celular','722-37261'),(25,25,'Celular','707-20297'),(26,26,'Celular','674-07668'),(27,27,'Celular','722-02108'),(28,28,'Celular','717-90796'),(29,29,'Celular','717-90793'),(30,30,'Celular','717-30432'),(31,31,'Celular','722-37778'),(32,32,'Celular','722-37211'),(33,33,'Celular','717-37204'),(34,34,'Celular','717-30409'),(35,35,'Celular','722-39935'),(36,36,'Celular','722-00008'),(37,37,'Celular','717-37502'),(38,38,'Celular','722-37465'),(39,39,'Celular','722-37251'),(40,40,'Celular','722-37742'),(41,41,'Celular','974-30390'),(42,42,'Celular','722-37743'),(43,43,'Celular','678-44833'),(44,44,'Celular','717-31778'),(45,45,'Celular','722-37468'),(46,46,'Celular','722-37718'),(47,47,'Celular','722-37502'),(48,48,'Celular','721-37118'),(49,49,'Celular','722-37464'),(50,50,'Celular','714-40460'),(51,51,'Celular','717-37221'),(52,52,'Celular','722-37467'),(53,53,'Celular','717-37367'),(54,54,'Celular','717-29655'),(55,55,'Celular','717-31390'),(56,56,'Celular','717-31386'),(57,57,'Celular','717-31275'),(58,58,'Celular','717-31398'),(59,59,'Celular','717-37776'),(60,60,'Celular','722-37501');
/*!40000 ALTER TABLE `telefonocontacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonodepartamento`
--

DROP TABLE IF EXISTS `telefonodepartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonodepartamento` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamentoContacto` int(11) NOT NULL,
  `tipoTelefono` varchar(15) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `prefijo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idTelefono`),
  KEY `idDepartamentoContacto` (`idDepartamentoContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonodepartamento`
--

LOCK TABLES `telefonodepartamento` WRITE;
/*!40000 ALTER TABLE `telefonodepartamento` DISABLE KEYS */;
INSERT INTO `telefonodepartamento` VALUES (1,1,'Fijo','411-5753','591 - 4'),(2,1,'Fijo','411-7388','591 - 4'),(3,1,'Fijo','441-3481','591 - 4'),(4,1,'Fijo','441-3482','591 - 4'),(5,1,'Fijo','441-3487','591 - 4'),(6,3,'Fijo','450-6583 ','591 - 4'),(7,3,'Fijo','451-3500','591 - 4'),(8,4,'Fijo','426-3330','591 - 4'),(9,4,'Fijo','426-3331','591 - 4');
/*!40000 ALTER TABLE `telefonodepartamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoarchivo`
--

DROP TABLE IF EXISTS `tipoarchivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoarchivo` (
  `idTipoArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoArchivo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idTipoArchivo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoarchivo`
--

LOCK TABLES `tipoarchivo` WRITE;
/*!40000 ALTER TABLE `tipoarchivo` DISABLE KEYS */;
INSERT INTO `tipoarchivo` VALUES (1,'Politicas de Empresa'),(2,'Convocatoria'),(6,'MEMORANDUM');
/*!40000 ALTER TABLE `tipoarchivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodepartamentocontacto`
--

DROP TABLE IF EXISTS `tipodepartamentocontacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodepartamentocontacto` (
  `idTipoDepartamentoContacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`idTipoDepartamentoContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodepartamentocontacto`
--

LOCK TABLES `tipodepartamentocontacto` WRITE;
/*!40000 ALTER TABLE `tipodepartamentocontacto` DISABLE KEYS */;
INSERT INTO `tipodepartamentocontacto` VALUES (1,'UNIÓN BOLIVIANA'),(2,'IATEC'),(3,'SPA'),(4,'UAB'),(5,'ADRA'),(6,'CNT'),(7,'EDICIONES NUEVO TIEMPO'),(8,'MBO'),(9,'MBC'),(10,'MOB'),(11,'SERVICIOS (SOLO UB)'),(12,'HOTELES');
/*!40000 ALTER TABLE `tipodepartamentocontacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoempleado`
--

DROP TABLE IF EXISTS `tipoempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoempleado` (
  `idTipoEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoEmpleado`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoempleado`
--

LOCK TABLES `tipoempleado` WRITE;
/*!40000 ALTER TABLE `tipoempleado` DISABLE KEYS */;
INSERT INTO `tipoempleado` VALUES (1,'OBREROS DE OFICINA'),(2,'EMPLEADOS DE OFICINA'),(3,'IATEC - UB'),(4,'SPA'),(5,'UNIDAD EDUCATIVA ADVENTISTA DE BOLIVIA'),(6,'OBREROS DE OFICINA'),(7,'EMPLEADOS DE OFICINA'),(8,'IATEC – UB'),(9,'SPA'),(10,'UNIDAD EDUCATIVA ADVENTISTA DE BOLIVIA');
/*!40000 ALTER TABLE `tipoempleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiponoticia`
--

DROP TABLE IF EXISTS `tiponoticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiponoticia` (
  `idTipoNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoNoticia` varchar(35) NOT NULL,
  PRIMARY KEY (`idTipoNoticia`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiponoticia`
--

LOCK TABLES `tiponoticia` WRITE;
/*!40000 ALTER TABLE `tiponoticia` DISABLE KEYS */;
INSERT INTO `tiponoticia` VALUES (1,'Deporte'),(2,'Informacion'),(3,'Iglesia'),(4,'Academico'),(5,'Evento'),(8,'COMUNICADO');
/*!40000 ALTER TABLE `tiponoticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopersonal`
--

DROP TABLE IF EXISTS `tipopersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopersonal` (
  `idTipoPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoPersonal` varchar(80) NOT NULL,
  PRIMARY KEY (`idTipoPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopersonal`
--

LOCK TABLES `tipopersonal` WRITE;
/*!40000 ALTER TABLE `tipopersonal` DISABLE KEYS */;
INSERT INTO `tipopersonal` VALUES (1,'Personal Academico'),(2,'Personal de Planta'),(3,'Profesores'),(4,'Personal de Servicios');
/*!40000 ALTER TABLE `tipopersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipotituloprofesional`
--

DROP TABLE IF EXISTS `tipotituloprofesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipotituloprofesional` (
  `idTipoTituloProfesional` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoTitulo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoTituloProfesional`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipotituloprofesional`
--

LOCK TABLES `tipotituloprofesional` WRITE;
/*!40000 ALTER TABLE `tipotituloprofesional` DISABLE KEYS */;
INSERT INTO `tipotituloprofesional` VALUES (1,'LICENCIATURA'),(2,'DIPLOMADO'),(3,'MAESTRIA'),(4,'DOCTORADO');
/*!40000 ALTER TABLE `tipotituloprofesional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipoUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Administrador'),(2,'Asistente'),(3,'Personal Academico'),(4,'Personal de Planta'),(5,'Profesor'),(6,'Personal de Servicio');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tituloprofesional`
--

DROP TABLE IF EXISTS `tituloprofesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tituloprofesional` (
  `idTituloProfesional` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoTituloProfesional` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  `nombreInstitucion` varchar(100) NOT NULL,
  `cursoProfesionalEstudiado` varchar(100) NOT NULL,
  `tiempoEstudio` float(8,2) NOT NULL,
  `religionInstitucion` varchar(50) DEFAULT NULL,
  `respaldoTituloPDF` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTituloProfesional`),
  KEY `idTipoTituloProfesional` (`idTipoTituloProfesional`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tituloprofesional`
--

LOCK TABLES `tituloprofesional` WRITE;
/*!40000 ALTER TABLE `tituloprofesional` DISABLE KEYS */;
INSERT INTO `tituloprofesional` VALUES (1,1,1,'UTO','Licenciatura en Contaduria',3.40,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/titulo-Licenciatura en Contaduria-UTO-1-78455454.jpg'),(2,1,4,'UTO','Licenciatura en Contaduria',5.00,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/titulo-Licenciatura en Contaduria-UTO-1-846441.jpg'),(3,1,5,'UTO','Licenciatura en Contaduria',5.00,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/titulo-Licenciatura en Contaduria-UTO-1-4541212.jpg'),(4,1,1,'UTO','Licenciatura en Auditoria',5.30,'Catolico','/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/titulo-Licenciatura en Auditoria-UTO-1-78455454.jpg');
/*!40000 ALTER TABLE `tituloprofesional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `idPersona` (`idPersona`),
  KEY `idTipoUsuario` (`idTipoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,'rodrigo','rodrigo',1,0),(2,2,1,'gustavo','gustavo',1,0),(9,205,3,'sguarachi','4845421',1,0),(4,10,3,'ehuarachi','846441',1,0),(5,201,4,'vquispe','4541212',1,0),(6,202,5,'equispe','8452122',1,0),(7,203,6,'dmamani','452124866',1,0),(8,204,2,'nsimon','65151',1,0),(10,206,3,'jgutierrex','78787',1,0),(11,207,5,'jmagne','85454848',1,0),(12,208,3,'jchavez','545125',1,0),(13,209,4,'achavez','74154871',1,0),(14,210,3,'lchavez','8157515',1,0),(15,211,3,'vchavez','7214552',1,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-23 17:37:04
