-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 03:42:55
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `credeasy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `nro_abono` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cedula` int(11) NOT NULL,
  `Total_abono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`nro_abono`, `fecha`, `Cedula`, `Total_abono`) VALUES
(1, '2016-06-13 20:36:31', 1053795476, 20000),
(2, '2016-06-13 20:36:31', 1053795476, 5000),
(3, '2016-06-14 01:10:15', 101010, 5000),
(4, '2016-06-14 01:18:08', 101010, 8000),
(5, '2016-06-14 15:49:51', 101010, 72000),
(6, '2016-06-14 16:05:03', 1053795476, 50000),
(7, '2016-06-14 17:29:20', 1053795476, 37000),
(8, '2016-06-14 17:30:30', 1053795476, 37000),
(9, '2016-06-14 17:31:02', 1053795476, 63000),
(10, '2016-06-14 17:48:16', 1053795476, 550000),
(11, '2016-06-14 17:48:48', 1053795476, 100000),
(12, '2016-06-14 23:26:17', 1053795476, 25000),
(13, '2016-06-15 00:00:24', 1053795476, 50000),
(14, '2016-06-15 00:24:23', 1053795476, 200000),
(15, '2016-06-16 02:50:22', 101010, 160000),
(16, '2016-06-16 04:10:15', 101010, 30000),
(17, '2016-06-16 04:10:34', 101010, 30000),
(18, '2016-06-16 13:49:58', 101010, 5550),
(19, '2016-06-16 14:29:00', 101010, 50000),
(20, '2016-06-17 01:12:01', 101010, 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CedulaCliente` varchar(10) NOT NULL,
  `PrimerNombre` varchar(45) NOT NULL,
  `SegundoNombre` varchar(45) DEFAULT NULL,
  `PrimerApellido` varchar(45) NOT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `CiudadDomicilio` varchar(45) NOT NULL,
  `DireccionDomicilio` varchar(45) NOT NULL,
  `TelefonoDomicilio` int(7) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Celular` int(10) NOT NULL,
  `Empresa` varchar(45) DEFAULT NULL,
  `DireccionEmpresa` varchar(45) DEFAULT NULL,
  `TelefonoEmpresa` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CedulaCliente`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `CiudadDomicilio`, `DireccionDomicilio`, `TelefonoDomicilio`, `Correo`, `Celular`, `Empresa`, `DireccionEmpresa`, `TelefonoEmpresa`) VALUES
('101010', 'Jhon', 'Esteban', 'Valencia', '', 'Medellin', 'cll 29D # 55-20', 2325465, 'abisay@gmail.com', 2147483647, '', '', 0),
('1020455896', 'Abisay', 'Antonio', 'Llano', '', 'Medellin', 'cll 29D # 55-20', 265676, 'abisay@gmail.com', 2147483647, '', '', 0),
('1020455986', 'abisay', '', 'gomez', 'llano', 'medellin', 'cll 29D # 55-20', 4653213, 'abisay@gmail.com', 2147483647, 'Mundial de Marcas', '', 0),
('1036642860', 'jhon', '', 'Arenas', '', 'Medellin', 'clldddd', 26565, 'jairo@hotmail.com', 31285536, '', '', 0),
('1053795476', 'Fernando', '', 'Orozco', '', 'Medellin', 'cll 29D # 55-20', 2656576, 'jesteval2532@gmail.com', 2147483647, '', '', 0),
('1152211761', 'Angy', 'Tatiana', 'valencia', '', 'Medellin', 'cll 29D # 55-20', 2656576, 'barrientos@hotmail.com', 2147483647, '', '', 0),
('3593710', 'jhon', 'Ceferino', 'Castaneda', 'x', 'Medellin', 'Cll29D #55-240', 2656576, 'jucefe@gmail.com', 2221111, 'Mundial de Marcas', 'cccc', 22333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_referencia`
--

CREATE TABLE `cliente_referencia` (
  `idcliente_ref` int(11) NOT NULL,
  `CedulaCliente` int(11) NOT NULL,
  `CedulaReferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidado`
--

CREATE TABLE `consolidado` (
  `idconsolidado` int(11) NOT NULL,
  `nro_credito` int(11) NOT NULL,
  `nrocuota` int(11) NOT NULL,
  `valorcuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `nro_credito` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CodigoCredito` int(11) NOT NULL,
  `CedulaCliente` int(10) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `Total_credito` int(11) NOT NULL,
  `Observaciones` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`nro_credito`, `fecha`, `CodigoCredito`, `CedulaCliente`, `idproducto`, `Total_credito`, `Observaciones`) VALUES
(1, '2016-06-13 20:32:23', 1, 1053795476, 1, 40000, '0'),
(2, '2016-06-13 20:32:52', 2, 1053795476, 1, 40000, '0'),
(3, '2016-06-14 01:07:17', 2, 101010, 1, 30000, '0'),
(4, '2016-06-14 01:10:59', 2, 101010, 1, 15000, '0'),
(5, '2016-06-14 15:49:06', 2, 101010, 1, 40000, '0'),
(6, '2016-06-14 16:42:22', 1, 1053795476, 1, 50000, '0'),
(7, '2016-06-14 16:42:44', 1, 1053795476, 1, 72000, '0'),
(8, '2016-06-14 16:43:19', 5, 1053795476, 4, 500000, '0'),
(9, '2016-06-14 16:44:14', 5, 1053795476, 4, 500000, '0'),
(10, '2016-06-14 16:44:20', 5, 1053795476, 4, 500000, '0'),
(11, '2016-06-14 17:10:20', 9, 101010, 5, 120000, 'ZAPATO '),
(12, '2016-06-14 17:12:20', 1, 1053795476, 1, 50000, ''),
(13, '2016-06-14 17:24:13', 1, 1053795476, 1, 30000, 'dafadsaf'),
(14, '2016-06-14 17:26:51', 1, 1053795476, 1, 30000, 'dafadsaf'),
(15, '2016-06-14 17:51:43', 5, 1053795476, 4, 72000, ''),
(16, '2016-06-14 17:54:00', 5, 1053795476, 3, 250000, ''),
(17, '2016-06-14 18:02:21', 5, 1053795476, 2, 253000, ''),
(18, '2016-06-14 23:04:29', 1, 1053795476, 1, 500000, ''),
(19, '2016-06-14 23:44:35', 1, 1053795476, 1, 55000, ''),
(20, '2016-06-14 23:59:55', 1, 1053795476, 1, 5000, ''),
(21, '2016-06-15 00:23:24', 1, 1053795476, 3, 2000, 'dfafasdfasd'),
(22, '2016-06-15 21:46:48', 1, 1053795476, 1, 500000, 'ddadfasd'),
(23, '2016-06-16 02:49:48', 4, 101010, 6, 50000, 'dafadfa'),
(24, '2016-06-16 04:09:55', 1, 101010, 1, 50000, 'dfadfasdfa'),
(25, '2016-06-16 04:47:24', 1, 1053795476, 1, 50000, 'dafadfadfad'),
(26, '2016-06-16 13:49:24', 13, 101010, 7, 25550, ''),
(27, '2016-06-16 14:27:53', 13, 3593710, 7, 50000, 'dadfad'),
(28, '2016-06-16 14:28:27', 1, 101010, 1, 50000, ''),
(29, '2016-06-16 14:28:40', 1, 101010, 1, 35000, ''),
(30, '2016-06-17 00:05:09', 1, 1053795476, 1, 20000, ''),
(31, '2016-06-17 01:11:34', 15, 101010, 8, 25000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_abono`
--

CREATE TABLE `detalle_abono` (
  `iddetalleabono` int(11) NOT NULL,
  `nroabono` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_credito`
--

CREATE TABLE `detalle_credito` (
  `iddetallecredito` int(11) NOT NULL,
  `nro_credito` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `valorcredito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_credito`
--

INSERT INTO `detalle_credito` (`iddetallecredito`, `nro_credito`, `idproducto`, `valorcredito`) VALUES
(1, 1, 1, 5000),
(2, 1, 1, 5000),
(3, 1, 1, 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `descripcion`) VALUES
(1, 'vestidos'),
(2, 'vestidos'),
(3, 'carteras'),
(4, 'ABISAY'),
(5, 'tatiana'),
(6, 'Erika julieth'),
(7, 'medias jogo'),
(8, 'asdfadsfasdfa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `CedulaReferencia` int(10) NOT NULL,
  `PrimerNombre` varchar(45) NOT NULL,
  `SegundoNombre` varchar(45) DEFAULT NULL,
  `PrimerApellido` varchar(45) NOT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `CiudadResidencia` varchar(45) CHARACTER SET big5 DEFAULT NULL,
  `DireccionDomicilio` varchar(45) NOT NULL,
  `TelefonoDomicilio` int(7) NOT NULL,
  `Celular` int(10) NOT NULL,
  `Empresa` varchar(45) DEFAULT NULL,
  `DireccionEmpresa` varchar(45) DEFAULT NULL,
  `TelefonoEmpresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_credito`
--

CREATE TABLE `tipo_credito` (
  `CodigoCredito` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_credito`
--

INSERT INTO `tipo_credito` (`CodigoCredito`, `Descripcion`) VALUES
(1, '4 meses'),
(2, '6 meses'),
(3, '9 meses'),
(4, '3 meses'),
(5, 'un mes'),
(6, 'un mes'),
(7, 'un mes'),
(8, 'dassdadfasdfadsf'),
(9, 'CREDITO SEMANAL'),
(10, 'jarior'),
(11, 'cada 5 Dias'),
(12, 'moscoso'),
(13, 'diario'),
(14, 'cristian'),
(15, 'asdfasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `contrasena`, `telefono`) VALUES
('abisayg', 'abisay gomez', 'abisay@gmail.com', '202cb962ac59075b964b07152d234b70', '12312323'),
('bajuanes2', 'Esteban Valencia', 'jesteval2532@gmail.com', '202cb962ac59075b964b07152d234b70', '3128553639'),
('danieledu', 'Daniel Eduardo Arias', 'danieledu@hotmail.com', '202cb962ac59075b964b07152d234b70', '3106437904'),
('jairo', 'jairo Arenas', 'jairo@hotmail.com', '202cb962ac59075b964b07152d234b70', '3128553639'),
('sandro de America', 'Sandro de America', 'CARTERA@JOGO.COM.CO', '202cb962ac59075b964b07152d234b70', '3128553636');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`nro_abono`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CedulaCliente`);

--
-- Indices de la tabla `cliente_referencia`
--
ALTER TABLE `cliente_referencia`
  ADD PRIMARY KEY (`idcliente_ref`);

--
-- Indices de la tabla `consolidado`
--
ALTER TABLE `consolidado`
  ADD PRIMARY KEY (`idconsolidado`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`nro_credito`);

--
-- Indices de la tabla `detalle_abono`
--
ALTER TABLE `detalle_abono`
  ADD PRIMARY KEY (`iddetalleabono`);

--
-- Indices de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD PRIMARY KEY (`iddetallecredito`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`CedulaReferencia`);

--
-- Indices de la tabla `tipo_credito`
--
ALTER TABLE `tipo_credito`
  ADD PRIMARY KEY (`CodigoCredito`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `nro_abono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `cliente_referencia`
--
ALTER TABLE `cliente_referencia`
  MODIFY `idcliente_ref` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `consolidado`
--
ALTER TABLE `consolidado`
  MODIFY `idconsolidado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `nro_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `detalle_abono`
--
ALTER TABLE `detalle_abono`
  MODIFY `iddetalleabono` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  MODIFY `iddetallecredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo_credito`
--
ALTER TABLE `tipo_credito`
  MODIFY `CodigoCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
