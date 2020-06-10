-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: carrito
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Mujeres','Regalos para','images/mujerdetalle.jpg'),(2,'Hombres','Regalos para','images/hombredetalle.jpg'),(3,'Niños','Regalos para','images/niñosdetalle.jpg');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `direccion2` varchar(150) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'0','0987672185','jmbarberan@gmail.com','El Fortin Bloque 9 Mz. 1540 Sol. 17 Entrando por Artefacta de la Av. Casuarina','','Guayaquil','090803');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensaje` varchar(250) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ocasion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'CAJA PERSONALIZADA CON GIRASOLES, CHOCOLATES FERRERO Y FOTOGRAFÍA IMPRESA','INFORMACIÓN DETALLADA DE LO QUE INCLUYE:\r\nCaja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nGirasoles Premium\r\nCaja de Chocolates Ferrero corazón\r\nFoto impresa enviada por el cliente ',40,'regalo2.jpg',5,1,'aniversario'),(2,'CAJA PERSONALIZADA CON ROSAS, CHOCOLATES FERRERO, CERVEZA CORONA Y OSO DE PELUCHE','INFORMACIÓN DETALLADA DE LO QUE INCLUYE:\r\nCaja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nCerveza Corona\r\nCaja de Chocolates Ferrero corazón\r\nOso de peluche pequeño según disponibilidad',60,'regalo1.jpg',4,1,'aniversario'),(4,'CAJA BLANCA PERSONALIZADA CON ROSAS FUCSIAS, GIRASOLES, CHOCOLATES FERRERO Y LLAVERO PELUCHE','Caja de madera tapizada mate con letras fucsia\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nGirasol Premium\r\nCaja de Chocolates Ferrero corazón\r\nLlavero de peluche',50,'regalo4.jpg',2,1,'aniversario'),(5,'CAJA GIGANTE PERSONALIZADA CON ROSAS Y GIRASOLES','Caja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium \r\nGirasoles Premium',65,'regalo5.jpg',3,1,'aniversario'),(6,'CAJA PERSONALIZADA CON GIRASOLES Y CHOCOLATES FERRERO','Caja de madera personalizada con letras doradas \r\nFrase personalizada a su gusto y elección\r\nGirasoles premium\r\nCaja de chocolates Ferrero corazón',59,'regalo6.jpg',2,1,'aniversario'),(7,'CAJA SORPRESA PARA UN HINCHA 100% AMARILLO (BARCELONA ECUADOR)','Caja de madera rústica plywood\r\nFrase personalizada en la caja\r\nPalanca metálica para apertura de la caja\r\nJarro cervecero de vidrio Barcelona Ecuador\r\nDos latas de Coca Cola\r\nFunda de caramelos Skittles\r\nBarra de chocolates Snickers\r\nFunda de Manicris clásicos',40,'regalo7.jpg',5,2,'dia del padre'),(8,'CAJA PERSONALIZADA CON ROSAS, CHOCOLATES FERRERO Y PELUCHE OSO','Caja de madera tapizada mate con letras rojas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nCaja de Chocolates Ferrero corazón\r\nOso de peluche mediano',55,'regalo8.jpg',4,1,'aniversario'),(9,'PELUCHE SPIDERMAN - AVENGERS - 20 CM','Peluche de coleción Spiderman\r\n20 cm',10,'regalo9.jpg',2,3,'cumpleaños, dia del niño'),(10,'CAJA CERVECERA CUMPLEAÑOS EMELEC','Caja de cartón corrugado decorado con temática cumpleaños Emelec\r\nJarro cervecero de vidrio con temática Emelec\r\nCerveza Estella Artois\r\nChocolate Manicho barra\r\nChocolate Galak barra\r\nFunda de Manicris',25,'regalo10.jpg',2,2,'dia del padre, hombre'),(11,'Camiseta tipo Polo','Camiseta tipo Polo 65% polyester 35% algodón, para caballero, diseño marino, Tallas: S, M, L, XL',18,'cloth_2.jpg',10,2,'Cualquiera');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_venta`
--

DROP TABLE IF EXISTS `productos_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_venta`
--

LOCK TABLES `productos_venta` WRITE;
/*!40000 ALTER TABLE `productos_venta` DISABLE KEYS */;
INSERT INTO `productos_venta` VALUES (1,0,2,2,60,120),(2,0,9,2,10,20),(3,0,10,2,30,60),(4,0,2,1,60,60),(5,0,1,2,40,80),(6,0,1,2,40,80),(7,1,1,2,40,80);
/*!40000 ALTER TABLE `productos_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'jmbarberan@gmail.com','jmbg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comentarios` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,1,80,'2020-06-08 00:31:23','');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-08 16:19:21
