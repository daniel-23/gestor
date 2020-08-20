-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-08-2020 a las 20:45:22
-- Versión del servidor: 5.7.26-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `introduccion` varchar(200) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  `orden` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  `orden` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  `revision` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `orden` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE IF NOT EXISTS `suscriptores` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `revision` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `intentos` tinyint(4) NOT NULL DEFAULT '0',
  `foto` varchar(100) DEFAULT NULL,
  `rol` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `usuario`, `clave`, `correo`, `intentos`, `foto`, `rol`) VALUES
(1, 'admin', '$P$BLvdY/3C6kOctrvBqoeq70e4kth9wb/', 'admin@example.com', 0, 'Vista/Imagenes/perfiles/perfil564.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  `orden` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
