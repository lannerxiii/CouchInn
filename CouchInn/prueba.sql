-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2016 a las 03:06:29
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `clave`, `email`) VALUES
(2, 'limonconsal', 'lanner@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE `couch` (
  `id_couch` int(100) NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(90) CHARACTER SET latin1 NOT NULL,
  `lugar` varchar(100) CHARACTER SET latin1 NOT NULL,
  `capacidad` varchar(100) CHARACTER SET latin1 NOT NULL,
  `disponibilidad` int(100) NOT NULL DEFAULT '1',
  `fecha` date NOT NULL,
  `foto_listado` varchar(90) CHARACTER SET latin1 NOT NULL,
  `idUsuario` varchar(90) CHARACTER SET latin1 NOT NULL,
  `idTipo` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `descripcion`, `nombre`, `lugar`, `capacidad`, `disponibilidad`, `fecha`, `foto_listado`, `idUsuario`, `idTipo`) VALUES
(34, 'Exelente casita en parque leloir con todos los servicios , aire ,gas natural ,luz grupo electrogeno , pileta -parque amplio -quincho-  - parrilla - ideal para pasar el verano en familia - cocina equipada - 3 habitaciones 2 baños \r\n', 'Casita Bonita ', 'Quiaca', '1', 1, '2016-06-24', './img/4/fotocouch4-34-0', '4', '5'),
(35, 'Bonita casa de veraneo en la antartida  ', 'Iglu de Veraneo ', 'Antartida', '2', 0, '2016-06-24', './img/4/fotocouch4-35-0', '4', '4'),
(36, 'veranin veranon verano alta fiesta ', 'Casa de Verano ', 'Mardel', '12', 1, '2016-06-24', './img/4/fotocouch4-36-0', '4', '5'),
(37, 'Invierno en prueba          ', 'Casota de prueba', 'dfsdfsdf', '3', 1, '2016-06-24', './img/22/fotocouch22-37-0', '22', '4'),
(38, ' Maaaaa', 'Mansion de Prueba Couch ', 'Buenos Aires', '5', 1, '2016-06-24', './img/22/fotocouch22-38-0', '22', '5'),
(39, 'Chaletito verano invierno couch ', 'Chalet hermoso en las Sierras ', 'patagonia', '3', 1, '2016-06-24', './img/7/fotocouch7-39-0', '7', '2'),
(40, 'Hermoso depto amplio recoleta ', 'Depto en Capital - Recoleta ', 'recoleta', '4', 1, '2016-06-24', './img/22/fotocouch22-40-0', '22', '2'),
(41, 'cosa ', 'Albergue hermoso vacas de invierno ', 'Por ahi', '1', 1, '2016-06-24', './img/4/fotocouch4-41-0', '4', '4'),
(43, ' aaaaaaaaaaaa', 'Couch con 99 Mansion ', 'sadsad', '99', 1, '2016-06-25', './img/22/fotocouch22-43-0', '22', '5'),
(44, 'chalet hermoso couch 99', 'Couch con 99 Chalet ', 'un lugar de por ahi campo', '99', 1, '2016-06-25', './img/22/fotocouch22-44-0', '22', '2'),
(55, ' sdsadsad  ', 'Asdsadsa ', 'Ã±Ã±Ã±Ã±Ã±', '1', 1, '2016-06-29', './img/30/fotocouch30-55-0', '22', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `idFotos` int(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `id_couch` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`idFotos`, `ruta`, `id_couch`) VALUES
(68, './img/4/fotocouch4-34-0', 34),
(69, './img/4/fotocouch4-34-1', 34),
(70, './img/4/fotocouch4-34-2', 34),
(71, './img/4/fotocouch4-34-3', 34),
(72, './img/4/fotocouch4-35-0', 35),
(73, './img/4/fotocouch4-35-1', 35),
(74, './img/4/fotocouch4-35-2', 35),
(75, './img/4/fotocouch4-35-3', 35),
(76, './img/4/fotocouch4-36-0', 36),
(77, './img/4/fotocouch4-36-1', 36),
(78, './img/4/fotocouch4-36-2', 36),
(79, './img/4/fotocouch4-36-3', 36),
(80, './img/22/fotocouch22-37-0', 37),
(81, './img/22/fotocouch22-37-1', 37),
(82, './img/22/fotocouch22-37-2', 37),
(83, './img/22/fotocouch22-37-3', 37),
(84, './img/22/fotocouch22-38-0', 38),
(85, './img/22/fotocouch22-38-1', 38),
(86, './img/22/fotocouch22-38-2', 38),
(87, './img/22/fotocouch22-38-3', 38),
(88, './img/7/fotocouch7-39-0', 39),
(89, './img/7/fotocouch7-39-1', 39),
(90, './img/7/fotocouch7-39-2', 39),
(91, './img/7/fotocouch7-39-3', 39),
(92, './img/22/fotocouch22-40-0', 40),
(93, './img/22/fotocouch22-40-1', 40),
(94, './img/22/fotocouch22-40-2', 40),
(95, './img/22/fotocouch22-40-3', 40),
(96, './img/4/fotocouch4-41-0', 41),
(97, './img/4/fotocouch4-41-1', 41),
(98, './img/4/fotocouch4-41-2', 41),
(99, './img/4/fotocouch4-41-3', 41),
(106, './img/22/fotocouch22-42-0', 42),
(107, './img/22/fotocouch22-42-1', 42),
(108, './img/22/fotocouch22-42-2', 42),
(109, './img/22/fotocouch22-42-3', 42),
(110, './img/22/fotocouch22-43-0', 43),
(111, './img/22/fotocouch22-43-1', 43),
(112, './img/22/fotocouch22-43-2', 43),
(113, './img/22/fotocouch22-43-3', 43),
(114, './img/22/fotocouch22-44-0', 44),
(115, './img/22/fotocouch22-44-1', 44),
(116, './img/22/fotocouch22-44-2', 44),
(117, './img/22/fotocouch22-44-3', 44),
(118, './img/7/fotocouch7-47-0', 47),
(119, './img/7/fotocouch7-47-1', 47),
(120, './img/7/fotocouch7-47-2', 47),
(121, './img/7/fotocouch7-47-3', 47),
(122, './img/4/fotocouch4-49-0', 49),
(123, './img/4/fotocouch4-49-1', 49),
(124, './img/4/fotocouch4-49-2', 49),
(125, './img/4/fotocouch4-49-3', 49),
(126, './img/7/fotocouch7-51-0', 51),
(127, './img/7/fotocouch7-51-1', 51),
(128, './img/7/fotocouch7-51-2', 51),
(129, './img/7/fotocouch7-51-3', 51),
(130, './img/7/fotocouch7-50-0', 50),
(131, './img/7/fotocouch7-50-1', 50),
(132, './img/7/fotocouch7-50-2', 50),
(133, './img/7/fotocouch7-50-3', 50),
(139, './img/4/fotocouch4-53-0', 53),
(140, './img/4/fotocouch4-53-1', 53),
(141, './img/4/fotocouch4-53-2', 53),
(142, './img/4/fotocouch4-53-3', 53),
(143, './img/30/fotocouch30-50-0', 50),
(144, './img/30/fotocouch30-50-1', 50),
(145, './img/30/fotocouch30-50-2', 50),
(146, './img/30/fotocouch30-50-3', 50),
(147, './img/30/fotocouch30-51-0', 51),
(148, './img/30/fotocouch30-52-0', 52),
(149, './img/30/fotocouch30-52-1', 52),
(150, './img/30/fotocouch30-52-2', 52),
(151, './img/30/fotocouch30-52-3', 52),
(152, './img/30/fotocouch30-53-0', 53),
(153, './img/30/fotocouch30-53-1', 53),
(154, './img/30/fotocouch30-54-0', 54),
(155, './img/30/fotocouch30-54-1', 54),
(156, './img/30/fotocouch30-54-2', 54),
(157, './img/30/fotocouch30-54-3', 54),
(158, './img/30/fotocouch30-55-0', 55),
(159, './img/30/fotocouch30-55-1', 55),
(160, './img/30/fotocouch30-55-2', 55),
(161, './img/30/fotocouch30-55-3', 55),
(162, './img/30/fotocouch30-56-0', 56),
(163, './img/7/fotocouch7-57-0', 57),
(164, './img/7/fotocouch7-57-1', 57),
(165, './img/7/fotocouch7-57-2', 57),
(166, './img/7/fotocouch7-57-3', 57),
(167, './img/7/fotocouch7-58-0', 58),
(168, './img/7/fotocouch7-58-1', 58),
(169, './img/7/fotocouch7-58-2', 58),
(170, './img/7/fotocouch7-58-3', 58),
(171, './img/7/fotocouch7-59-0', 59),
(172, './img/7/fotocouch7-59-1', 59),
(173, './img/7/fotocouch7-60-0', 60),
(174, './img/7/fotocouch7-60-1', 60),
(175, './img/7/fotocouch7-60-2', 60),
(176, './img/7/fotocouch7-60-3', 60),
(177, './img/7/fotocouch7-61-0', 61),
(178, './img/7/fotocouch7-61-1', 61),
(179, './img/7/fotocouch7-61-2', 61),
(185, './img/7/fotocouch7-61-3', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasrespuestas`
--

CREATE TABLE `preguntasrespuestas` (
  `idPreg` int(100) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `idUsuario` varchar(90) NOT NULL,
  `idCouch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntasrespuestas`
--

INSERT INTO `preguntasrespuestas` (`idPreg`, `pregunta`, `respuesta`, `idUsuario`, `idCouch`) VALUES
(29, 'En barrilete cosmico cuanto tengo de viaje hasta ahi?\r\n\r\n', 'AAAAA', '22', 34),
(30, 'a', '', '7', 34),
(31, 'tiene baÃ±o?', '', '7', 34),
(32, 'mira lo q pregunta el de arriba por dios!', '', '22', 34),
(33, 'a cuantos fps me corre che con un pentium 3', '', '', 55),
(34, 'dfdsf', '', '', 55),
(35, '>S', '', '7', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `puntuacion` int(5) NOT NULL,
  `comentario` text NOT NULL,
  `idPuntuacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `id_duenoCouch` int(11) NOT NULL,
  `capac` int(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_usuario` varchar(90) NOT NULL,
  `aceptada` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_couch`, `id_duenoCouch`, `capac`, `fecha_inicio`, `fecha_fin`, `id_usuario`, `aceptada`) VALUES
(34, 55, 22, 1, '2016-07-01', '2016-07-31', '7', 0),
(35, 34, 4, 1, '2016-07-01', '2016-07-31', '22', 0),
(36, 40, 22, 2, '2016-07-01', '2016-07-31', '7', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(100) NOT NULL,
  `nroTarjeta` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `idTarjeta` int(11) NOT NULL,
  `numero` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `numero`) VALUES
(10, '1111111111111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_couch`
--

CREATE TABLE `tipo_couch` (
  `id_tipo` int(100) NOT NULL,
  `nombreTipo` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_couch`
--

INSERT INTO `tipo_couch` (`id_tipo`, `nombreTipo`, `visible`) VALUES
(2, 'Chalet', 1),
(4, 'Albergue', 1),
(5, 'Mansion', 1),
(6, 'Camping', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `apeynombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `fecha_de_nacimiento` varchar(90) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `premiun` int(11) NOT NULL,
  `fecha_premium` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `apeynombre`, `email`, `sexo`, `nacionalidad`, `fecha_de_nacimiento`, `telefono`, `clave`, `premiun`, `fecha_premium`) VALUES
(33, 'aaaaaaaaaaaaaaaaaa', 'asasas@wewese.com', 'M', 'zzzz', '', '4324234', 'zzz', 0, NULL),
(25, 'Asdf', 'asdf@asdf.com', 'M', 'aaaaaaaaaaaaaaa', '06/18/1925', '234213213213', 'asdf', 0, NULL),
(4, 'Cami Miranda', 'camimiranda95@gmail.com', 'H', 'Boliviana', '06/26/1997', '333333', 'limon', 0, NULL),
(7, 'Demo IngenieriaA', 'demo@demo.com', 'H', 'Argentina', '06/19/1997', '2354634', 'demo', 1, '2016-07-01'),
(16, 'Gustavo Robles', 'gusti590@yahoo.com.ar', 'H', 'Argentina ', '8/18/1959', '02214529280', 'lore1094 ', 0, NULL),
(32, 'SDSdsad', 'lore@DSFDSF.com', 'M', 'dfsdfdf', '', '232323', 'dfdsfsdf', 0, NULL),
(34, 'ASADASD', 'lore@gmail.com', 'M', 'fdsfdsdsf', '06/17/1920', '3423324', 'dfdsfds', 0, NULL),
(31, 'Marcelo Bufartanello', 'mb@yahoo.com', 'H', 'Argentina', '06/06/1992', '422482', 'limon', 0, NULL),
(13, 'Mariana Vidal', 'mvidal@gmail.com', 'M', 'Argentina', '05/31/2016', '4529280', 'lanner', 0, NULL),
(30, 'Natalia Ortu', 'nataliadortu@gmail.com', 'H', 'bolita', '06/14/1995', '02216019500', 'natalia', 0, NULL),
(5, 'Nati', 'nati@ortu.com', '', 'qwqw', 'qwqw', 'we|we', 'wqw', 0, NULL),
(22, 'Juancito Bobito', 'serj@gmail.com', 'H', 'lalalal jhjh', '06/10/1937', '60000000000000', 'php', 1, '2016-07-02'),
(18, 'Maria Rosa Gonzalez Maggiore', 'tanamaggiore@yahoo.com.ar', 'M', 'argentina', '04221966', '02214576708', 'manuelitosan', 0, NULL),
(29, 'Yato Taus ', 'yatotaus@gmail.com', 'M', 'Argentina', '08/07/1995', '2215957491', 'roccorocco', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `couch`
--
ALTER TABLE `couch`
  ADD UNIQUE KEY `id_couch` (`id_couch`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD UNIQUE KEY `idFotos_2` (`idFotos`),
  ADD UNIQUE KEY `ruta` (`ruta`),
  ADD KEY `idFotos` (`idFotos`);

--
-- Indices de la tabla `preguntasrespuestas`
--
ALTER TABLE `preguntasrespuestas`
  ADD PRIMARY KEY (`idPreg`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`idPuntuacion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva_2` (`id_reserva`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD KEY `idTarifa` (`idTarifa`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`idTarjeta`),
  ADD UNIQUE KEY `idEstado` (`idTarjeta`);

--
-- Indices de la tabla `tipo_couch`
--
ALTER TABLE `tipo_couch`
  ADD UNIQUE KEY `id_tipo_2` (`id_tipo`),
  ADD UNIQUE KEY `nombreTipo` (`nombreTipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `couch`
--
ALTER TABLE `couch`
  MODIFY `id_couch` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `idFotos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT de la tabla `preguntasrespuestas`
--
ALTER TABLE `preguntasrespuestas`
  MODIFY `idPreg` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `idPuntuacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tipo_couch`
--
ALTER TABLE `tipo_couch`
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
