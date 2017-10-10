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
  `nombreArchivo` varchar(50) NOT NULL,
  `archivo` varchar(300) NOT NULL,
  PRIMARY KEY (`idArchivo`),
  KEY `idTipoArchivo` (`idTipoArchivo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` VALUES (1,1,'Manual Interno','/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-1-Manual Interno.pdf'),(2,3,'AFP\'S','/wamp64/www/PersonalUAB/view/libs/multimedia/documento/documento-3-AFP\'S.pdf');
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargopersona`
--

LOCK TABLES `cargopersona` WRITE;
/*!40000 ALTER TABLE `cargopersona` DISABLE KEYS */;
INSERT INTO `cargopersona` VALUES (1,'DOCENTE'),(2,'RECTOR'),(3,'DECANO'),(4,'VICE-DECANO'),(5,'SECRETARIO ACADEMICO'),(6,'CAPELLAN'),(7,'VICE-RECTOR');
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
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
INSERT INTO `configregistrodatos` VALUES (1,'2017-08-01',3),(2,'2017-07-14',4),(3,'2017-07-14',5),(4,'2017-07-14',6);
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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conyuguepersonal`
--

LOCK TABLES `conyuguepersonal` WRITE;
/*!40000 ALTER TABLE `conyuguepersonal` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursoestudiado`
--

LOCK TABLES `cursoestudiado` WRITE;
/*!40000 ALTER TABLE `cursoestudiado` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructurameritos`
--

LOCK TABLES `estructurameritos` WRITE;
/*!40000 ALTER TABLE `estructurameritos` DISABLE KEYS */;
INSERT INTO `estructurameritos` VALUES (1,1,NULL,'FORMACIÃ“N ACADÃ‰MICA Y PROFESIONAL',50),(2,1,1,'TÃ­tulo Profesional de Licenciatura',10),(3,1,1,'Diplomado en EducaciÃ³n Superior',5),(4,1,1,'MaestrÃ­a o Especialidad',15),(5,1,1,'Doctorado',20),(6,1,NULL,'TRABAJOS E INVESTIGACIONES',10),(7,1,6,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas indexadas, 3 puntos hasta un mÃ¡ximo de dos trabajos',6),(8,1,6,'Por cada trabajo cientÃ­fico original, ensayo o artÃ­culo publicado en revistas no indexadas, 2 puntos hasta un mÃ¡ximo de dos trabajos.',4),(9,1,NULL,'EXPERIENCIA LABORAL',15),(10,1,9,'Por cada aÃ±o de servicio en la docencia universitaria y/o profesional en el Ã¡rea, 3 puntos hasta un mÃ¡ximo de cinco aÃ±os',15),(11,1,NULL,'PRODUCCIÃ“N INTELECTUAL',9),(12,1,11,'LIBROS - Por cada libro publicado, 5 puntos hasta un mÃ¡ximo de uno.',5),(13,1,11,'TEXTOS, DOSSIERS, MANUALES, GUÃAS DIDÃCTICAS, PROTOCOLOS - Por cada publicaciÃ³n 2 puntos hasta un mÃ¡ximo de dos.',4),(14,1,NULL,'CONGRESOS, SEMINARIOS, CONVENCIONES Y OTROS - Por cada participaciÃ³n en congresos nacionales y/o extranjeros, hasta un mÃ¡ximo de dos participaciones en los Ãºltimos dos aÃ±os. en calidad de:',8),(15,1,14,'Asistente',1),(16,1,14,'Disertante',6),(17,1,NULL,'FORMACIÃ“N ESPECIALIZADA',8),(18,1,17,'Diplomados',4),(19,1,17,'Otros cursos (dos puntos hasta un mÃ¡ximo de 2)',4);
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
INSERT INTO `evaluacionmeritosdocenteprofesor` VALUES (22,2,10,0),(22,3,5,0),(22,4,0,0),(22,5,0,0),(22,7,0,0),(22,8,0,0),(22,10,0,0),(22,12,0,0),(22,13,0,0),(22,15,0,0),(22,16,0,0),(22,18,0,0),(22,19,0,0),(17,2,0,1),(17,3,0,1),(17,4,0,1),(17,5,0,1),(17,7,0,1),(17,8,5,1),(17,10,0,1),(17,12,0,1),(17,13,0,1),(17,15,0,1),(17,16,0,1),(17,18,0,1),(17,19,2,1);
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencialaboral`
--

LOCK TABLES `experiencialaboral` WRITE;
/*!40000 ALTER TABLE `experiencialaboral` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fax`
--

LOCK TABLES `fax` WRITE;
/*!40000 ALTER TABLE `fax` DISABLE KEYS */;
INSERT INTO `fax` VALUES (1,1,'441-3485','591 - 4'),(2,4,'426-3336','4');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hijospersonal`
--

LOCK TABLES `hijospersonal` WRITE;
/*!40000 ALTER TABLE `hijospersonal` DISABLE KEYS */;
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
INSERT INTO `lugarexpedicion` VALUES (1,'OR'),(2,'LPZ'),(3,'CBBA'),(4,'SCZ'),(5,'TRJ'),(6,'BEN'),(7,'PND'),(8,'SUC'),(9,'ECUADOR');
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
  `rutaImagen` varchar(200) DEFAULT NULL,
  `fechaPublicacion` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idNoticia`),
  KEY `idTipoNoticia` (`idTipoNoticia`),
  KEY `idUsuario` (`idUsuario`),
  KEY `especificacionUsuario` (`especificacionUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES (1,6,'Desfile CÃ­vico','Un desfile lo constituye un grupo marchante de personas a pie, a caballo o motorizado con un recorrido concreto en una celebraciÃ³n pÃºblica. Puede tener carÃ¡cter militar o civil.\r\nCuando es de tipo civil, generalmente estÃ¡ compuesto de una secciÃ³n de gente que desfila propiamente y otra que ameniza el acto. Suele tener un acompaÃ±amiento musical y, en algunos casos, tambiÃ©n tÃ­teres, bailarines, cÃ³micos, etc. Ejemplos de ello son los desfiles festivos de moros y cristianos, las cabalgatas de los Reyes Magos, los de Nueva Orleans, o las cabalgatas de carnaval que se celebran en muchas ciudades del mundo, como RÃ­o de Janeiro y MazatlÃ¡n.',2,NULL,NULL,'2017-07-26',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Rodrigo','Luis','Poma','Mollo','447457451',2,'1995-03-20','M',1),(2,'Gustavo','Angel','Cerezo','Mamani','7417215',1,'1995-03-30','M',1),(3,'Karen',NULL,'Acnuta','Chirre','4455912',3,'1991-01-03','F',1),(4,'Mikael',NULL,'Agreda','Herbas','3722371',3,'1987-04-22','M',1),(5,'Jose','Luis','Aguilar','Conde','7511893',3,'1985-12-29','M',2),(6,'Ivo','Alberto','Alabe','Perales','2311307',2,'1975-10-10','M',2),(7,'Lourdes','Sofia','Alanes','Terrazas','6461124',3,'1889-10-05','F',2),(8,'Vladimir',NULL,'Alanoca','Espejo','6174669',2,'1988-02-16','M',2),(9,'Ivan','Ronny','Alcon','Andia','5920379',3,'1989-10-19','M',2),(10,'Froilan',NULL,'Alcon','Sullcani','440526',2,'1961-01-21','M',2),(11,'Patricia',NULL,'Alderete','Fernandez','6329245',4,'1990-09-21','F',2),(12,'Jaime','Arturo','Ruilova','Torrez','O914312988',3,'1977-07-26','M',2),(13,'Lizeth',NULL,'Alvarez','Zerda','4451395',3,'1978-05-12','F',2),(14,'Celia','Maria','Apaza','Narvacia','4479470',3,'1974-04-16','F',2),(15,'Juan',NULL,'Arhuata','Luna','5223872',3,'1983-05-28','M',1),(16,'Madelein',NULL,'Arias','Carrasco','8038724',3,'1992-06-08','F',1),(17,'Gisela',NULL,'Arivilea','Medina','4317206',2,'1983-03-15','F',2),(18,'Lizet','Mery','Arratia','Quispe','4908172',2,'1979-04-28','F',2),(19,'Dunia',NULL,'Arze','Suheiro','6509435',3,'1979-10-07','F',2),(20,'Julieta',NULL,'Ascarraga','Jaldin','5161148',3,'1979-02-07','F',2),(21,'Danae',NULL,'Asturizaga','Camacho','3754558',3,'1987-06-12','F',2),(22,'Judith','Mabel','Ayala','Choque','4314859',2,'1987-10-03','F',2),(23,'Sonia','Miriam','Ayala','Condori','2142827',2,'1969-11-17','F',2),(24,'Ivan','Nelson','Ayala','Santos','2372433',2,'1969-11-06','M',2),(25,'Sonia','Alicia','Barriuso','De La Parra','986397',3,'1969-01-24','F',2),(26,'Ovidio','Moises','Becerra','Rodas','4580520',4,'1997-05-10','M',1),(27,'Lidia','Maura','Bernal','Vargas','3078271',1,'1965-01-01','F',2),(28,'Irene','Carmen','Calderon','Copa','4478383',3,'1984-12-12','F',1),(29,'Ever','Samuel','Calle','Mamani','5239536',3,'1980-10-26','M',1),(30,'Hugo',NULL,'Campos','Bautista','4040896',1,'1978-04-01','M',1),(31,'Liliana','Veronica','Canqui','Cama','3422659',2,'1970-11-06','F',2);
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,3,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(2,4,1,1,15,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(3,5,1,1,NULL,6,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(4,6,1,1,NULL,3,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(5,7,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(6,8,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(7,9,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(8,10,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(9,11,1,1,1,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(10,12,1,1,13,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(11,13,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(12,14,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(13,15,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(14,16,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(15,17,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(16,18,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(17,19,1,1,8,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(18,20,1,4,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(19,21,1,4,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(20,22,1,1,NULL,7,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-24',NULL,1),(21,23,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-25',NULL,1),(22,24,1,1,NULL,6,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-25',NULL,1),(23,25,1,1,1,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(24,26,1,1,13,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(25,27,1,1,8,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(26,28,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(27,29,1,3,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(28,30,1,1,13,1,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1),(29,31,1,2,NULL,NULL,'',NULL,1,1,NULL,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-07-26',NULL,1);
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referenciapersonal`
--

LOCK TABLES `referenciapersonal` WRITE;
/*!40000 ALTER TABLE `referenciapersonal` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tablameritosdocenteprofesor`
--

LOCK TABLES `tablameritosdocenteprofesor` WRITE;
/*!40000 ALTER TABLE `tablameritosdocenteprofesor` DISABLE KEYS */;
INSERT INTO `tablameritosdocenteprofesor` VALUES (1,'1.0','Personal Academico','2017-07-24',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (1,19,69599608);
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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonocontacto`
--

LOCK TABLES `telefonocontacto` WRITE;
/*!40000 ALTER TABLE `telefonocontacto` DISABLE KEYS */;
INSERT INTO `telefonocontacto` VALUES (1,1,'Celular','722-37470'),(2,2,'Celular','722-37033'),(3,3,'Celular','722-37003'),(4,4,'Celular','722-37771'),(5,5,'Celular','722-37020'),(6,6,'Celular','722-37025'),(7,7,'Celular','717-37675'),(8,8,'Celular','722-37702'),(9,9,'Celular','716-04909'),(10,10,'Celular','722-72735'),(11,11,'Celular','721-37708'),(12,12,'Celular','670-04392'),(13,13,'Celular','716-55867'),(14,14,'Celular','727-05999'),(15,15,'Celular','722-37461'),(16,16,'Celular','717-30407'),(17,17,'Celular','717-37656'),(18,18,'Celular','722-37500'),(19,19,'Celular','717-29923'),(20,20,'Celular','722-37779'),(21,21,'Celular','722-37473'),(22,22,'',''),(23,23,'Celular','722-37214'),(24,24,'Celular','722-37261'),(25,25,'Celular','707-20297'),(26,26,'Celular','674-07668'),(27,27,'Celular','722-02108'),(28,28,'Celular','717-90796'),(29,29,'Celular','717-90793'),(30,30,'Celular','717-30432'),(31,31,'Celular','722-37778'),(32,32,'Celular','722-37211'),(33,33,'Celular','717-37204'),(34,34,'Celular','717-30409'),(35,35,'Celular','722-39935'),(36,36,'Celular','722-00008'),(37,37,'Celular','717-37502'),(38,38,'Celular','722-37465'),(39,39,'Celular','722-37251'),(40,40,'Celular','722-37742'),(41,41,'Celular','974-30390'),(42,42,'Celular','722-37743'),(43,43,'Celular','678-44833'),(44,44,'Celular','717-31778'),(45,45,'Celular','722-37468'),(46,46,'Celular','722-37718'),(47,47,'Celular','722-37502'),(48,48,'Celular','721-37118'),(49,49,'Celular','722-37464'),(50,50,'Celular','714-40460'),(51,51,'Celular','717-37221'),(52,52,'Celular','722-37467'),(53,53,'Celular','717-37367'),(54,54,'Celular','717-29655'),(55,55,'Celular','717-31390'),(56,56,'Celular','717-31386'),(57,57,'Celular','717-31275'),(58,58,'Celular','717-31398'),(59,59,'Celular','717-37776'),(60,60,'Celular','722-37501'),(61,61,'Celular','4545454'),(62,62,'Celular','4545454'),(63,63,'Celular','4545454'),(64,64,'Celular','5454454'),(65,65,'Celular','5454');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoarchivo`
--

LOCK TABLES `tipoarchivo` WRITE;
/*!40000 ALTER TABLE `tipoarchivo` DISABLE KEYS */;
INSERT INTO `tipoarchivo` VALUES (1,'POLITICAS DE EMPRESA'),(2,'CONVOCATORIA'),(3,'INFORMACION'),(4,'FUNCIONES');
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoempleado`
--

LOCK TABLES `tipoempleado` WRITE;
/*!40000 ALTER TABLE `tipoempleado` DISABLE KEYS */;
INSERT INTO `tipoempleado` VALUES (1,'OBREROS DE OFICINA'),(2,'EMPLEADOS DE OFICINA'),(3,'IATEC - UB'),(4,'SPA'),(5,'UNIDAD EDUCATIVA ADVENTISTA DE BOLIVIA');
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiponoticia`
--

LOCK TABLES `tiponoticia` WRITE;
/*!40000 ALTER TABLE `tiponoticia` DISABLE KEYS */;
INSERT INTO `tiponoticia` VALUES (1,'DEPORTE'),(2,'INFORMACION'),(3,'IGLESIA'),(4,'ACADEMICO'),(5,'EVENTO'),(6,'COMUNICADO');
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
INSERT INTO `tipopersonal` VALUES (1,'Personal Academico'),(2,'Personal de Planta'),(3,'Profesor'),(4,'Personal de Servicio');
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
INSERT INTO `tipousuario` VALUES (1,'Administrador'),(2,'Asistente'),(3,'Personal Academico'),(4,'Personal de Planta'),(5,'Profesores'),(6,'Personal de Servicios');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tituloprofesional`
--

LOCK TABLES `tituloprofesional` WRITE;
/*!40000 ALTER TABLE `tituloprofesional` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,'noveca','ventura',1,0),(2,2,1,'gustavo','gustavo',1,0),(3,3,4,'kacnuta','4455912',1,0),(4,4,3,'magreda','3722371',1,0),(5,5,3,'jaguilar','7511893',1,0),(6,6,3,'ialabe','2311307',1,0),(7,7,5,'lalanes','6461124',1,0),(8,8,5,'valanoca','6174669',1,0),(9,9,4,'ialcon','5920379',1,0),(10,10,5,'falcon','440526',1,0),(11,11,3,'palderete','6329245',1,0),(12,12,3,'calvarez','O914312988',1,0),(13,13,4,'lalvarez','4451395',1,0),(14,14,4,'capaza','4479470',1,0),(15,15,4,'jarhuata','5223872',1,0),(16,16,5,'marias','8038724',1,0),(17,17,5,'garivilea','4317206',1,0),(18,18,5,'larratia','4908172',1,0),(19,19,3,'darze','6509435',1,0),(20,20,6,'jascarraga','5161148',1,0),(21,21,6,'dasturizaga','3754558',1,0),(22,22,3,'jayala','4314859',1,0),(23,23,4,'sayala','2142827',1,0),(24,24,3,'iayala','2372433',1,0),(25,25,3,'sbarriuso','986397',1,0),(26,26,3,'obecerra','4580520',1,0),(27,27,3,'lbernal','3078271',1,0),(28,28,5,'icalderon','4478383',1,0),(29,29,5,'ecalle','5239536',1,0),(30,30,3,'hcampos','4040896',1,0),(31,31,4,'lcanqui','3422659',1,0);
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

-- Dump completed on 2017-08-18 11:15:40
