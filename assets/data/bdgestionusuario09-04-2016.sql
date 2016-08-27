-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2016 a las 04:26:26
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdgestionusuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `callcenter`
--

CREATE TABLE IF NOT EXISTS `callcenter` (
  `idllamada` int(11) NOT NULL,
  `tipollamada` varchar(30) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `nminutos` int(11) NOT NULL,
  `idusuario` varchar(50) NOT NULL,
  `valorminuto` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `callcenter`
--

INSERT INTO `callcenter` (`idllamada`, `tipollamada`, `porcentaje`, `nminutos`, `idusuario`, `valorminuto`, `total`) VALUES
(1, '5', 5, 2, '5', 200, 420),
(2, '0', 0, 1, '3', 200, 420),
(3, '0', 0, 1, '3', 200, 420),
(4, '0', 0, 1, '3', 200, 420),
(5, '5', 5, 2, '3', 200, 420),
(6, '5', 5, 3, '3', 200, 630),
(7, '5', 5, 14, '10', 200, 2940),
(8, '5', 5, 7, '5', 200, 1470),
(9, '8', 8, 0, '3', 200, 0),
(10, '5', 5, 5, '3', 200, 1050),
(11, '0', 0, 1, '3', 200, 1050),
(12, '0', 0, 1, '3', 200, 1050),
(13, '0', 0, 1, '3', 200, 1050),
(14, '0', 0, 1, '3', 200, 1050),
(15, '0', 0, 1, '3', 200, 1050),
(16, '0', 0, 1, '3', 200, 1050),
(17, '0', 0, 1, '3', 200, 1050),
(18, '0', 0, 1, '3', 200, 1050),
(19, '5', 5, 2, '3', 200, 420),
(20, '5', 5, 2, '3', 200, 420),
(21, '5', 5, 23, '3', 200, 4830),
(22, '5', 5, 23, '3', 200, 4830),
(23, '8', 8, 2, '3', 200, 432),
(24, '8', 8, 2, '3', 200, 432),
(25, '5', 5, 3, '3', 200, 630),
(26, '5', 5, 3, '3', 200, 630),
(27, '8', 8, 25, '5', 200, 5400),
(28, '8', 8, 25, '5', 200, 5400),
(29, '8', 8, 25, '5', 200, 5400),
(30, '5', 5, 2, '5', 200, 420),
(31, '0', 0, 1, '3', 200, 200),
(32, '0', 0, 1, '3', 200, 200),
(33, '0', 0, 1, '3', 200, 200),
(34, '0', 0, 1, '3', 200, 200),
(35, '0', 0, 1, '3', 200, 200),
(36, '0', 0, 1, '3', 200, 200),
(37, '0', 0, 1, '3', 200, 200),
(38, '0', 0, 1, '3', 200, 200),
(39, '0', 0, 1, '3', 200, 200),
(40, '0', 0, 1, '3', 200, 200),
(41, '5', 5, 2, '3', 200, 420),
(42, '5', 5, 116, '4', 200, 24360),
(43, '5', 5, 116, '4', 200, 24360),
(44, '5', 5, 116, '4', 200, 24360),
(45, '5', 5, 20, '4', 200, 420),
(46, '5', 5, 2, '4', 200, 420),
(47, '5', 5, 2, '4', 200, 420),
(48, '5', 5, 1, '3', 200, 3),
(49, '5', 5, 1, '3', 200, 3),
(50, '5', 5, 1, '3', 200, 3),
(51, '5', 5, 3, '5', 200, 630);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `usr` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(100) COLLATE utf8_bin NOT NULL,
  `clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `fechahoraregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idperfil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usr`, `nombre`, `correo`, `clave`, `fechahoraregistro`, `idperfil`) VALUES
(3, 'admin', 'Administrador', 'admin@localhost.com', 'admin', '2016-02-26 01:47:01', 1),
(4, 'usuario1', 'Pedro Zapata', 'usuario1@localhost.com', 'usuario1', '2016-02-26 01:47:01', 2),
(5, 'usuario2', 'Martina García', 'usuario2@localhost.com', 'usuario2', '2016-02-26 01:48:26', 2),
(6, 'usuario3', 'Ana Gil', 'usuario3@localhost.com', 'usuario3', '2016-02-26 01:48:26', 2),
(7, 'usuario4', 'Jairo Camargo', 'usuario4@localhost.com', 'usuario4', '2016-03-04 02:17:31', 2),
(10, 'jesteval1', 'esteban1', 'jesteval25321@gmail.com', '123', '2016-04-09 20:53:36', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `callcenter`
--
ALTER TABLE `callcenter`
  ADD PRIMARY KEY (`idllamada`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr` (`usr`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `idperfil` (`idperfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `callcenter`
--
ALTER TABLE `callcenter`
  MODIFY `idllamada` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
