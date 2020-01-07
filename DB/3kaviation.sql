-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-01-2020 a las 22:15:16
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3kaviation`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

DROP TABLE IF EXISTS `aplicaciones`;
CREATE TABLE IF NOT EXISTS `aplicaciones` (
  `ID_APLICACION` int(11) NOT NULL AUTO_INCREMENT,
  `APLICACION` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_APLICACION`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aplicaciones`
--

INSERT INTO `aplicaciones` (`ID_APLICACION`, `APLICACION`, `FECHA_CREACION`) VALUES
(1, '3KAVIATION', '2020-01-05'),
(3, 'CLINICA GATO', '2020-01-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avi_aeronaves`
--

DROP TABLE IF EXISTS `avi_aeronaves`;
CREATE TABLE IF NOT EXISTS `avi_aeronaves` (
  `ID_AERONAVE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TIPO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CONSUMO` float DEFAULT NULL,
  PRIMARY KEY (`ID_AERONAVE`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `avi_aeronaves`
--

INSERT INTO `avi_aeronaves` (`ID_AERONAVE`, `NOMBRE`, `TIPO`, `CONSUMO`) VALUES
(1, 'gato volador', 'gato', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avi_firmas`
--

DROP TABLE IF EXISTS `avi_firmas`;
CREATE TABLE IF NOT EXISTS `avi_firmas` (
  `ID_FIRMA` int(11) NOT NULL AUTO_INCREMENT,
  `FIRMA_RUTA` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_FIRMA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avi_pasajeros`
--

DROP TABLE IF EXISTS `avi_pasajeros`;
CREATE TABLE IF NOT EXISTS `avi_pasajeros` (
  `ID_PASAJERO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PLAN` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NACIONALIDAD` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_NAC` date DEFAULT NULL,
  `TIPO_DOCUMENTO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DOCUMENTO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `EXP_DOCUMENTO` date DEFAULT NULL,
  PRIMARY KEY (`ID_PASAJERO`),
  KEY `ID_PLAN` (`ID_PLAN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avi_plan_vuelo`
--

DROP TABLE IF EXISTS `avi_plan_vuelo`;
CREATE TABLE IF NOT EXISTS `avi_plan_vuelo` (
  `ID_PLAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_AERONAVE` int(11) NOT NULL,
  `AERO_SALIDA` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AERO_LLEGADA` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PROPIETARIO` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `HORA_SALIDA` date DEFAULT NULL,
  `HORA_LLEGADA` date DEFAULT NULL,
  `FECHA_VIAJE` date DEFAULT NULL,
  `DECLA_SANITARIA` text COLLATE utf8_spanish_ci,
  `ESTATUS` varchar(1) COLLATE utf8_spanish_ci DEFAULT '0',
  `ID_FIRMA` int(11) NOT NULL,
  PRIMARY KEY (`ID_PLAN`),
  KEY `ID_AERONAVE` (`ID_AERONAVE`),
  KEY `ID_FIRMA` (`ID_FIRMA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avi_tripulacion`
--

DROP TABLE IF EXISTS `avi_tripulacion`;
CREATE TABLE IF NOT EXISTS `avi_tripulacion` (
  `ID_TRIPULACION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PLAN` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FUNCION` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `LICENCIA` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NACIONALIDAD` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_NAC` date DEFAULT NULL,
  `PASAPORTE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `EXP_PASAPORTE` date DEFAULT NULL,
  PRIMARY KEY (`ID_TRIPULACION`),
  KEY `ID_PLAN` (`ID_PLAN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `ID_PERMISO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLICACION` int(11) NOT NULL,
  `ID_SECCION` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `P_VER` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `P_MODIFICAR` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `P_TODO` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_PERMISO`),
  KEY `ID_APLICACION` (`ID_APLICACION`),
  KEY `ID_SECCION` (`ID_SECCION`),
  KEY `ID_ROL` (`ID_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLICACION` int(11) NOT NULL,
  `ROL` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`),
  KEY `ID_APLICACION` (`ID_APLICACION`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_ROL`, `ID_APLICACION`, `ROL`, `FECHA_CREACION`) VALUES
(1, 1, 'ADMINISTRADOR', '2020-01-06'),
(2, 3, 'SUPERVISOR', '2020-01-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE IF NOT EXISTS `secciones` (
  `ID_SECCION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLICACION` int(11) NOT NULL,
  `SECCION` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_SECCION`),
  KEY `ID_APLICACION` (`ID_APLICACION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLICACION` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CORREO` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NICK` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PASS` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_APLICACION` (`ID_APLICACION`),
  KEY `ID_ROL` (`ID_ROL`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `ID_APLICACION`, `ID_ROL`, `NOMBRE`, `APELLIDO`, `CORREO`, `NICK`, `PASS`) VALUES
(1, 1, 1, 'angel', 'garcia', '3dangs28@gmail.com', 'agarcia', 'Ygh8b77t');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
