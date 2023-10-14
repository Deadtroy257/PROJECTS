/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - bienes_raices
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bienes_raices` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bienes_raices`;

/*Table structure for table `propiedades` */

DROP TABLE IF EXISTS `propiedades`;

CREATE TABLE `propiedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `habitaciones` int(1) DEFAULT NULL,
  `wc` int(1) DEFAULT NULL,
  `estacionamiento` int(1) DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendedorId` (`vendedorId`),
  CONSTRAINT `vendedorId` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `propiedades` */

insert  into `propiedades`(`id`,`titulo`,`precio`,`imagen`,`descripcion`,`habitaciones`,`wc`,`estacionamiento`,`creado`,`vendedorId`) values (1,' casa en la ciudad de Bogotá  w',4500000.00,'9073bc4a9bf94144f894fb1587e011c3.jpg','Hermosa casa en en la ciudad de bogotá con hermosa vista hacia  la ciudad excelente precio',3,2,1,'2022-03-13',1),(2,' hermosa casa',99999999.99,'c41bf5fd73d0aa656d7cb0ef21d8804b.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(3,' hermosa casa',99999999.99,'781ee786d4105fb4007f74edc9abb31c.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(4,' hermosa casa',99999999.99,'c59229cb5a21314a5d422cd19487bd47.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(5,' hermosa casa',99999999.99,'dea74f81291e06edad7fd711abc78d3d.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(6,' hermosa casa',99999999.99,'1c1e459d2ac30a1eed380743c80233e0.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(10,' hermosa casa',25000000.99,'03d56f0ed9856b6829b6fa42e9c91851.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2),(12,' hermosa casa',99999999.99,'07bf4284644f777d8aac6b800711a943.jpg','hermosa casa a la venta con excelente vista y un gran precio para que no dejes pasar esta oportunidad',5,3,1,'2022-03-13',2);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`email`,`password`) values (1,'diego@correo.com','$2y$10$zJn.jjwM9v2YxPI78Opmn.m9/HPqejeYsP4LDBNCuucmsIAI0jNgy');

/*Table structure for table `vendedores` */

DROP TABLE IF EXISTS `vendedores`;

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `vendedores` */

insert  into `vendedores`(`id`,`nombre`,`apellido`,`telefono`) values (1,'Diego','Castro','31534666'),(2,'Fernando','Rozo','38449494'),(3,' super ','vendedor','3548891515');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
