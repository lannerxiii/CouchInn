-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 03:24:16
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
(56, 'El departamento cuenta con calefacciÃ³n por radiadores y agua caliente por caldera doble servicio, aberturas en aluminio con vidrios DVH, pisos en cocina comedor en porcellanato pulido rectificado, habitaciÃ³n principal con baÃ±o en suite y vestidor, baÃ±o de servicio, cocina independiente, bal  ', 'Departamento Premiun en Berazategui Centro. ', 'Berazategui', '4', 1, '2016-07-09', './img/22/fotocouch22-56-0', '22', '9'),
(57, 'Piso. Living. Comedor. 4 dormitorio(s) 2 suite con vest. 3 baÃ±o(s) 1 toilette(s).HabitaciÃ³n de servicio. 1 cochera(s). Reciclado', 'Departamento en pleno Recoleta ', 'CABA, Barrio Recoleta', '3', 1, '2016-07-09', './img/22/fotocouch22-57-0', '22', '9'),
(58, ' 11 e/ 485 y 486: Casa desarrollada sobre lote de 20x34 y 160m cubiertos. En PB: Cocina integrada al comedor, amplio living con estufia a hogar, toil,, escritorio o dormitorio. En PA: 3 dormitorios con placard, y baÃ±o completo. En exelente estado, todos sus ambientes tienen ventilaciÃ³n natural, buena distribuciÃ³n y funcionalidad. Ademas cuenta con cochera para 4 vehÃ­culos (2 de ellos cubiertos), lavadero separado, piscina de fibra de vidrio, y quincho. ', 'Casa de 3 Dorm. en City Bell ', 'City Bell,', '6', 1, '2016-07-09', './img/7/fotocouch7-58-0', '7', '8'),
(59, ' Esta soberbia obra de arquitectura, diseÃ±ada por el arquitecto Alejandro Bustillo, se ubica en un lugar de ensueÃ±o, en la PenÃ­nsula de Llao Llao entre los Lagos Nahuel Huapi y Moreno. El Llao LLao combina la belleza del paisaje con la elegancia de su interior, generando espacios acogedores y luminosos que reflejan el estilo patagÃ³nico en cada rincÃ³n de sus salones y encantadoras habitaciones. El restaurant "Los CÃ©sares", de sobria decoraciÃ³n, ofrece una carta de platos elaborados, sabores cuida', 'Divina Mansion en Bariloche! ', 'San Carlos de Bariloche, RÃ­o Negro ', '12', 1, '2016-07-09', './img/4/fotocouch4-59-0', '4', '2'),
(60, ' La Quinta presidencial de Olivos, tambiÃ©n llamada Quinta de Olivos, es la principal residencia oficial del presidente de la NaciÃ³n Argentina. La quinta estÃ¡ situada en la localidad de Olivos, Vicente LÃ³pez, en la zona norte de Buenos Aires.\r\n\r\nLa construcciÃ³n de la casa presidencial fue realizada en 1854 por Prilidiano PueyrredÃ³n, miembro de una de las familias patricias de San Isidro e hijo de Juan MartÃ­n de PueyrredÃ³n. Unas quince familias presidenciales vivieron en Olivos durante los Ãºltimos 6 ', 'Quinta de Olivos! Vacaciones con Macri ', 'Olivos, C.A.B.A', '25', 1, '2016-07-09', './img/4/fotocouch4-60-0', '4', '5'),
(61, ' Hermoso lugar a orillas del rÃ­o Yamuna', 'Taj Mahal ', 'ciudad de Agra', '1', 1, '2016-07-09', './img/30/fotocouch30-61-0', '30', '5');

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
(186, './img/22/fotocouch22-56-0', 56),
(187, './img/22/fotocouch22-56-1', 56),
(188, './img/22/fotocouch22-56-2', 56),
(197, './img/22/fotocouch22-56-3', 56),
(198, './img/22/fotocouch22-57-0', 57),
(199, './img/22/fotocouch22-57-1', 57),
(200, './img/22/fotocouch22-57-2', 57),
(201, './img/22/fotocouch22-57-3', 57),
(202, './img/7/fotocouch7-58-0', 58),
(203, './img/7/fotocouch7-58-1', 58),
(204, './img/7/fotocouch7-58-2', 58),
(205, './img/7/fotocouch7-58-3', 58),
(206, './img/4/fotocouch4-59-0', 59),
(207, './img/4/fotocouch4-59-1', 59),
(208, './img/4/fotocouch4-59-2', 59),
(209, './img/4/fotocouch4-59-3', 59),
(210, './img/4/fotocouch4-60-0', 60),
(211, './img/4/fotocouch4-60-1', 60),
(212, './img/4/fotocouch4-60-2', 60),
(213, './img/4/fotocouch4-60-3', 60),
(214, './img/30/fotocouch30-61-0', 61),
(215, './img/30/fotocouch30-61-1', 61),
(216, './img/30/fotocouch30-61-2', 61),
(217, './img/30/fotocouch30-61-3', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasrespuestas`
--

CREATE TABLE `preguntasrespuestas` (
  `idPreg` int(100) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET latin1 NOT NULL,
  `respuesta` varchar(200) CHARACTER SET latin1 NOT NULL,
  `idUsuario` varchar(90) CHARACTER SET latin1 NOT NULL,
  `idCouch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntasrespuestas`
--

INSERT INTO `preguntasrespuestas` (`idPreg`, `pregunta`, `respuesta`, `idUsuario`, `idCouch`) VALUES
(2, 'Por que demonios entra  1 sola persona?\r\n', 'Responde', '22', 61),
(3, 'puedo llevar a mi perro?', 'Si, es bienvenido', '4', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscouch`
--

CREATE TABLE `puntoscouch` (
  `id_puntoscouch` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `comentario` varchar(9000) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_usuario`
--

CREATE TABLE `puntos_usuario` (
  `id_puntosusuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos_usuario`
--

INSERT INTO `puntos_usuario` (`id_puntosusuario`, `id_usuario`, `id_reserva`, `puntuacion`) VALUES
(3, 4, 3, 4);

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
  `aceptada` int(2) NOT NULL DEFAULT '0',
  `id_puntajeCouch` int(11) NOT NULL,
  `id_puntajeUsuario` int(11) DEFAULT NULL,
  `fecha_aceptada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_couch`, `id_duenoCouch`, `capac`, `fecha_inicio`, `fecha_fin`, `id_usuario`, `aceptada`, `id_puntajeCouch`, `id_puntajeUsuario`, `fecha_aceptada`) VALUES
(3, 56, 22, 4, '2016-07-09', '2016-07-09', '4', 1, 0, 3, '2016-07-09'),
(4, 56, 22, 4, '2016-07-07', '2016-07-09', '4', 2, 0, NULL, '2016-07-09'),
(5, 56, 22, 6, '2016-07-10', '2016-07-16', '4', 2, 0, NULL, '0000-00-00'),
(6, 56, 22, 5, '2016-07-12', '2016-07-14', '4', 2, 0, NULL, '0000-00-00'),
(7, 56, 22, 4, '2016-07-24', '2016-10-07', '4', 1, 0, NULL, '2016-07-09'),
(10, 59, 4, 1, '2016-07-09', '2016-07-10', '22', 1, 0, NULL, '0000-00-00');

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
(7, 'Rancho', 1),
(8, 'Casa', 1),
(9, 'Departamento', 1),
(10, 'Duplex', 1),
(11, 'Quinta', 1),
(12, 'Casona', 1);

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
(4, 'Cami Miranda', 'camimiranda95@gmail.com', 'H', 'Boliviana', '06/26/1997', '333333', 'limon', 0, NULL),
(7, 'DemoIng2', 'demo@demo.com', 'H', 'Argentina', '06/19/1997', '2354634', 'demo', 1, '2016-07-01'),
(30, 'Natalia Ortu', 'nataliadortu@gmail.com', 'H', 'bolita', '06/14/1995', '02216019500', 'natalia', 0, NULL),
(22, 'Sergio', 'serj@gmail.com', 'H', 'AAAAAAAAA', '06/10/1937', '60000000000000', 'php', 1, '2016-07-02');

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
-- Indices de la tabla `puntoscouch`
--
ALTER TABLE `puntoscouch`
  ADD PRIMARY KEY (`id_puntoscouch`);

--
-- Indices de la tabla `puntos_usuario`
--
ALTER TABLE `puntos_usuario`
  ADD PRIMARY KEY (`id_puntosusuario`),
  ADD UNIQUE KEY `id_puntosusuario` (`id_puntosusuario`);

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
  MODIFY `idFotos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
--
-- AUTO_INCREMENT de la tabla `preguntasrespuestas`
--
ALTER TABLE `preguntasrespuestas`
  MODIFY `idPreg` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puntoscouch`
--
ALTER TABLE `puntoscouch`
  MODIFY `id_puntoscouch` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntos_usuario`
--
ALTER TABLE `puntos_usuario`
  MODIFY `id_puntosusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipo_couch`
--
ALTER TABLE `tipo_couch`
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
