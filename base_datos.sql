-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para fichador
CREATE DATABASE IF NOT EXISTS `fichador` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `fichador`;

-- Volcando estructura para tabla fichador.centro
CREATE TABLE IF NOT EXISTS `centro` (
  `id_centro` int(11) NOT NULL,
  `nombre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla fichador.centro: 0 rows
DELETE FROM `centro`;
/*!40000 ALTER TABLE `centro` DISABLE KEYS */;
/*!40000 ALTER TABLE `centro` ENABLE KEYS */;

-- Volcando estructura para tabla fichador.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `id_contrato` int(11) NOT NULL,
  `horas_semanales` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla fichador.contrato: 0 rows
DELETE FROM `contrato`;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;

-- Volcando estructura para tabla fichador.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `Índice 1` (`id_empleado`,`id_rol`,`id_contrato`,`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla fichador.empleado: 0 rows
DELETE FROM `empleado`;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla fichador.fichaje
CREATE TABLE IF NOT EXISTS `fichaje` (
  `id_fichaje` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id_fichaje`),
  KEY `id_fichaje_id_empleado` (`id_fichaje`,`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla fichador.fichaje: 0 rows
DELETE FROM `fichaje`;
/*!40000 ALTER TABLE `fichaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `fichaje` ENABLE KEYS */;

-- Volcando estructura para tabla fichador.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla fichador.rol: 0 rows
DELETE FROM `rol`;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
