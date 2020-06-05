-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: tarea
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `activerecordlog`
--

DROP TABLE IF EXISTS `activerecordlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activerecordlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `action` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idmodel` int(11) DEFAULT NULL,
  `field` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activerecordlog`
--

LOCK TABLES `activerecordlog` WRITE;
/*!40000 ALTER TABLE `activerecordlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `activerecordlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_generales`
--

DROP TABLE IF EXISTS `datos_generales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_generales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sexo` enum('H','M') COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `foto_perfil` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_datos_generales_1_idx` (`id_usuario`),
  CONSTRAINT `fk_datos_generales_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_generales`
--

LOCK TABLES `datos_generales` WRITE;
/*!40000 ALTER TABLE `datos_generales` DISABLE KEYS */;
INSERT INTO `datos_generales` VALUES (1,2,'Luis Alfredo','Reyes','García','H','1992-09-04',NULL,'1438630605365_1514471003.jpg');
/*!40000 ALTER TABLE `datos_generales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_tarea`
--

DROP TABLE IF EXISTS `estado_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_tarea`
--

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` VALUES (1,'Abierta'),(2,'En proceso'),(3,'Cerrada');
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `controller` varchar(100) COLLATE utf8_bin NOT NULL,
  `action` varchar(100) COLLATE utf8_bin NOT NULL,
  `url` varchar(100) COLLATE utf8_bin NOT NULL,
  `esmenu` int(3) DEFAULT '0',
  `grupo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `color` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `orden` int(11) DEFAULT NULL,
  `essubmenu` int(11) DEFAULT NULL,
  `titulo` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `subtitulo` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Permisos','permisos','index','/permisos/index',1,'Administración','fa fa-cogs','nav-light-brown',1,0,0,'',''),(2,'Creación de permisos','permisos','create','/permisos/create',0,'Administración, Permiso',NULL,'nav-block-orange',1,0,1,NULL,NULL),(3,'Edición de permisos','permisos','update','/permisos/update',0,'Administración',NULL,NULL,1,NULL,NULL,NULL,NULL),(4,'Usuarios','usuario','index','/usuario/index',1,'Administración','icon-user','nav-deep-terques',1,NULL,0,'Usuarios','Ver usuarios'),(5,'Creación de usuario','usuario','create','/usuario/create',0,'Usuario','','nav-block-orange',1,0,1,'',''),(6,'Edición de usuarios','usuario','update','/usuario/update',0,'Administración',NULL,NULL,1,NULL,NULL,NULL,NULL),(7,'Detalle de usuario','usuario','view','/usuario/view',0,'Administración',NULL,NULL,1,NULL,NULL,NULL,NULL),(8,'Asignar Permisos a usuario','usuario','permisos','/usuario/permisos',0,'Administración',NULL,NULL,1,NULL,NULL,NULL,NULL),(9,'Roles','rol','index','/rol/index',1,'Administración','icon-legal','nav-olive',1,0,0,'',''),(10,'Creación de Roles','rol','create','/rol/create',0,'Administración, Rol',NULL,'nav-block-orange',1,0,1,NULL,NULL),(11,'Edición de roles','rol','update','/rol/update',0,'Administración',NULL,NULL,1,NULL,NULL,NULL,NULL),(12,'Logs','activeRecordLog','index','activeRecordLog/index',1,'Administración','icon-list-alt','nav-block-red',1,NULL,0,'Logs','Ver logs'),(13,'Borrar usuario','usuario','borrar','/usuario/borrar',0,'Administración','','nav-block-orange',1,NULL,0,'Borrar','Borrar usuario'),(14,'Borrar permiso','permisos','borrar','/permisos/borrar',0,'Administración','','nav-block-orange',1,NULL,0,'Borrar','Borrar permiso'),(15,'Borrar rol','rol','borrar','/rol/borrar',0,'Administración','','nav-block-orange',1,NULL,0,'Borrar','Borrar rol'),(16,'Ver rol','rol','view','/rol/view',0,'','','nav-block-orange',1,NULL,0,'Ver rol','Ver rol'),(17,'Permisos rol','rol','permisos','/rol/permisos',0,'Administración','','nav-block-orange',1,NULL,0,'Permisos ro',''),(18,'Lista de usuarios','usuarioPaciente','index','/usuarioPaciente/index',1,'Usuarios','fa fa-medkit','nav-block-orange',1,NULL,0,'',''),(19,'Creación de usuario','usuarioPaciente','create','/usuarioPaciente/create',1,'Usuarios','','nav-block-orange',1,NULL,0,'',''),(20,'Edición de paciente','usuarioPaciente','update','/usuarioPaciente/update',0,'Usuarios','fa fa-circle-o text-red','nav-block-orange',1,NULL,0,'',''),(22,'Usuario','usuarioPaciente','informacionGeneral','/usuarioPaciente/informacionGeneral/',0,'Usuarios','fa  fa-user','nav-block-orange',1,1,0,'',''),(24,'Edición de datos generales','datosGenerales','update','/datosGenerales/update',0,'Administración','','nav-block-orange',1,NULL,0,'',''),(25,'Borrar dato general','datosGenerales','borrar','/datosGenerales/borrar',0,'','','nav-block-orange',1,NULL,0,'',''),(26,'Datos generales','datosGenerales','informacionGeneral','/datosGenerales/informacionGeneral',0,'Usuarios','fa fa-inbox','nav-block-orange',1,2,0,'',''),(27,'Estado','estadoTarea','index','/estadoTarea/index',1,'Administración','','nav-block-orange',1,NULL,0,'',''),(28,'Alta Estado','estadoTarea','create','/estadoTarea/create',0,'','','nav-block-orange',1,NULL,0,'Alta','Estado'),(29,'Actualizar','estadoTarea','update','/estadoTarea/update',0,'','','nav-block-orange',1,NULL,0,'Actualizar',''),(30,'Borrar','estadoTarea','borrar','/estadoTarea/borrar',0,'','','nav-block-orange',1,NULL,0,'Borrar',''),(31,'Registro Tarea','registroTarea','index','/registroTarea/index',1,'Tarea','fa fa-tasks','nav-block-orange',1,NULL,0,'',''),(32,'Alta','registroTarea','create','/registroTarea/create',0,'','','nav-block-orange',1,NULL,0,'',''),(33,'Actualizar','registroTarea','update','/update/registroTarea',0,'','','nav-block-orange',1,NULL,0,'',''),(34,'Borrar','registroTarea','borrar','/registroTarea/borrar',0,'','','nav-block-orange',1,NULL,0,'','');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_tarea`
--

DROP TABLE IF EXISTS `registro_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_actualiza` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarea_usuario` (`id_usuario`),
  KEY `fk_tarea_estado` (`id_estado`),
  CONSTRAINT `fk_tarea_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_tarea`
--

LOCK TABLES `registro_tarea` WRITE;
/*!40000 ALTER TABLE `registro_tarea` DISABLE KEYS */;
INSERT INTO `registro_tarea` VALUES (1,1,1,'Solicitar diseño','Solicitar el diseño al cliente','2020-06-05',NULL),(2,1,2,'Realizar pruebas','Test de los módulos de actualización de clientes. Y correccional de errores','2020-06-05','2020-06-05'),(3,2,1,'Inicia pruebas de diseño','Iniciar las pruebas del diseño utilizando las librerías de bootstrap','2020-06-05',NULL),(4,2,2,'Actualizar colores','Cambio de paleta de colores de acuerdo al nuevo diseño','2020-06-05',NULL),(5,3,2,'Inicio de pruebas','Las pruebas se iniciaron a las 9:00','2020-06-05',NULL);
/*!40000 ALTER TABLE `registro_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_bin NOT NULL,
  `nombre_corto` varchar(25) COLLATE utf8_bin NOT NULL,
  `permisos` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'WebMaster','Es el responsable técnico y puede acceder a cualquiera de los aspectos del sistema, configurando o modificando cualquier parámetro de éste. Este usuario tiene control total sobre el sitio web.','Administrador','[1,2,3,4,5,6,7,8,9,10,11,12]'),(2,'Usuario','El usuario podrá crear nuevas tareas','Usuario','[4]'),(3,'Crear usuario','Encargado de crear usuarios.','Crear usuarios','[4]');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'WebMaster'),(2,'Administrador'),(3,'Usuario');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NOT NULL,
  `login` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `salt` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `permisos` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_usuario_1_idx` (`id_rol`),
  KEY `fk_usuario_1_idx1` (`id_tipo`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'2017-06-22','admin@gmail.com','ef//1ZiY14by2','ef389c810be0f1ea8f038a100c2cc755',1,1,'[1,2,3,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,\"19\",\"26\",\"20\",\"18\",\"22\",\"18\",\"19\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\"]',1),(2,'2020-06-05','desarrollo@gmail.com','ef//1ZiY14by2','ef389c810be0f1ea8f038a100c2cc755',2,3,'[24,26,31,32,33,34]',1),(3,'2020-06-05','tester@dominio.com','ef//1ZiY14by2','ef389c810be0f1ea8f038a100c2cc755',2,3,'[24,26,31,32,33,34]',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yiisession`
--

DROP TABLE IF EXISTS `yiisession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yiisession` (
  `id` int(11) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yiisession`
--

LOCK TABLES `yiisession` WRITE;
/*!40000 ALTER TABLE `yiisession` DISABLE KEYS */;
/*!40000 ALTER TABLE `yiisession` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-05 16:59:22
