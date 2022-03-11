-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para base_prueba
CREATE DATABASE IF NOT EXISTS `base_prueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `base_prueba`;

-- Volcando estructura para tabla base_prueba.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Ruc` varchar(11) NOT NULL DEFAULT '0',
  `RazonSocial` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla base_prueba.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`IdCliente`, `Ruc`, `RazonSocial`) VALUES
	(1, '20000000000', 'The Factory'),
	(2, '20055555555', 'Plaza Vea');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla base_prueba.detalle_venta
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IdVenta` int(11) NOT NULL DEFAULT 0,
  `IdProducto` int(11) NOT NULL DEFAULT 0,
  `Cantidad` int(11) NOT NULL DEFAULT 0,
  `Precio` decimal(12,2) NOT NULL DEFAULT 0.00,
  `SubTotal` decimal(12,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`IdDetalleVenta`),
  KEY `FK1_detalle_venta` (`IdVenta`),
  KEY `FK2_detalle_producto` (`IdProducto`),
  CONSTRAINT `FK1_detalle_venta` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK2_detalle_producto` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla base_prueba.detalle_venta: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` (`IdDetalleVenta`, `IdVenta`, `IdProducto`, `Cantidad`, `Precio`, `SubTotal`) VALUES
	(64, 198, 3, 4, 72.00, 18.00),
	(74, 217, 2, 4, 64.00, 16.00),
	(75, 217, 2, 44, 220.00, 16.00),
	(76, 217, 4, 44, 220.00, 20.00),
	(77, 217, 2, 44, 220.00, 16.00),
	(78, 218, 1, 2, 30.00, 15.00),
	(79, 218, 3, 2, 30.00, 18.00),
	(80, 218, 1, 2, 30.00, 15.00),
	(81, 218, 2, 2, 30.00, 16.00),
	(82, 219, 3, 3, 54.00, 18.00),
	(83, 220, 1, 4, 60.00, 15.00),
	(84, 221, 2, 2, 32.00, 16.00),
	(85, 221, 4, 2, 32.00, 20.00),
	(86, 221, 5, 2, 32.00, 5.00),
	(87, 221, 3, 23, 414.00, 18.00),
	(88, 222, 4, 23, 414.00, 20.00),
	(89, 223, 3, 1, 18.00, 18.00),
	(90, 223, 5, 1, 18.00, 5.00),
	(91, 223, 4, 1, 18.00, 20.00),
	(92, 223, 1, 14, 210.00, 15.00);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

-- Volcando estructura para tabla base_prueba.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL DEFAULT '0',
  `Precio` decimal(12,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla base_prueba.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`IdProducto`, `Nombre`, `Precio`) VALUES
	(1, 'Leche', 15.00),
	(2, 'Miel', 16.00),
	(3, 'Frugo', 18.00),
	(4, 'Manzanas', 20.00),
	(5, 'Panes', 5.00);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla base_prueba.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroDocumento` varchar(8) DEFAULT '0',
  `ApellidoPaterno` varchar(50) DEFAULT '0',
  `ApellidoMaterno` varchar(50) DEFAULT '0',
  `Nombres` varchar(100) DEFAULT '0',
  `Password` varchar(150) DEFAULT '0',
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla base_prueba.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`IdUsuario`, `NumeroDocumento`, `ApellidoPaterno`, `ApellidoMaterno`, `Nombres`, `Password`) VALUES
	(1, '71251048', 'Ramirez', 'Rivas', 'tech', '123'),
	(2, '71044748', 'Guillen', 'Rivas', 'miguel', '124');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla base_prueba.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoDocumento` int(11) NOT NULL DEFAULT 0,
  `Serie` varchar(4) NOT NULL DEFAULT '0',
  `Numero` varchar(8) NOT NULL DEFAULT '0',
  `IdCliente` int(11) NOT NULL DEFAULT 0,
  `Total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `IdUsuario` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`IdVenta`),
  KEY `FK1_venta_cliente` (`IdCliente`),
  KEY `FK2_venta_usuario` (`IdUsuario`),
  CONSTRAINT `FK1_venta_cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_venta_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla base_prueba.venta: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`IdVenta`, `IdTipoDocumento`, `Serie`, `Numero`, `IdCliente`, `Total`, `IdUsuario`) VALUES
	(198, 1, '0003', '12345678', 1, 5000.00, 1),
	(217, 2, '34', '34', 2, 724.00, 1),
	(218, 1, '123', '123', 1, 120.00, 1),
	(219, 1, '3', '3', 1, 54.00, 1),
	(220, 1, '2', '4', 1, 60.00, 1),
	(221, 1, '2', '', 1, 96.00, 1),
	(222, 1, '23', '32', 1, 828.00, 1),
	(223, 1, '', '', 2, 264.00, 1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
