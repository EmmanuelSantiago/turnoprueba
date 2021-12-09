-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 03:22:31
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `n_modulo` varchar(100) NOT NULL,
  `SIGLA` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `n_modulo`, `SIGLA`) VALUES
(1, 'GENERAL', 'G'),
(2, 'PREFERENCIAL', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `n_sede` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `n_sede`) VALUES
(1, 'BUCARAMANGA'),
(2, 'BARRANCABERMEJA'),
(3, 'MEDELLIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `turnoG` int(11) NOT NULL,
  `turnoP` int(11) NOT NULL,
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `turnoG`, `turnoP`, `fecha_actual`) VALUES
(7, 3, 1, '2021-12-08'),
(8, 4, 1, '2021-12-08'),
(10, 0, 0, '0000-00-00'),
(11, 0, 0, '0000-00-00'),
(12, 5, 0, '0000-00-00'),
(13, 5, 0, '2021-12-08'),
(14, 6, 0, '2021-12-08'),
(15, 7, 0, '2021-12-08'),
(16, 8, 0, '2021-12-08'),
(17, 0, 2, '2021-12-08'),
(18, 0, 3, '2021-12-08'),
(19, 0, 4, '2021-12-08'),
(20, 9, 0, '2021-12-08'),
(21, 0, 12345, '0000-00-00'),
(22, 0, 12345, '0000-00-00'),
(23, 0, 5, '2021-12-08'),
(24, 0, 6, '2021-12-08'),
(25, 0, 7, '2021-12-08'),
(26, 10, 0, '2021-12-08'),
(27, 0, 8, '2021-12-08'),
(28, 11, 0, '2021-12-08'),
(29, 12, 0, '2021-12-08'),
(30, 13, 0, '2021-12-08'),
(31, 14, 0, '2021-12-08'),
(32, 0, 9, '2021-12-08'),
(33, 15, 0, '2021-12-08'),
(34, 0, 10, '2021-12-08'),
(36, 6, 0, '2021-12-08'),
(37, 6, 0, '2021-12-08'),
(38, 6, 0, '2021-12-08'),
(39, 1, 0, '2021-12-08'),
(40, 1, 0, '2021-12-08'),
(41, 1, 0, '2021-12-08'),
(42, 1, 0, '2021-12-08'),
(43, 1, 0, '2021-12-08'),
(45, 16, 0, '2021-12-08'),
(48, 0, 11, '2021-12-08'),
(49, 0, 12, '2021-12-08'),
(50, 0, 13, '2021-12-08'),
(51, 17, 0, '2021-12-08'),
(52, 18, 0, '2021-12-08'),
(59, 0, 1, '2021-12-09'),
(60, 1, 0, '2021-12-09'),
(61, 0, 14, '2021-12-08'),
(62, 19, 0, '2021-12-08'),
(63, 0, 15, '2021-12-08'),
(64, 0, 16, '2021-12-08'),
(65, 0, 17, '2021-12-08'),
(66, 0, 18, '2021-12-08'),
(67, 0, 19, '2021-12-08'),
(68, 0, 20, '2021-12-08'),
(69, 0, 21, '2021-12-08'),
(70, 0, 22, '2021-12-08'),
(71, 0, 23, '2021-12-08'),
(72, 0, 24, '2021-12-08'),
(73, 20, 0, '2021-12-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `doc` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `id_sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `doc`, `nombre`, `f_nacimiento`, `id_sede`) VALUES
(1, 1096187200, 'EMANUEL SANTIAGO', '1987-05-05', 1),
(2, 1096187206, 'JHON MANTILLA', '1987-12-08', 3),
(3, 1111, 'adadsad', '2021-12-07', 1),
(4, 12345, 'JESSIKA', '1940-12-11', 2),
(7, 1096193533, 'EMMANUEL SANTIAGO', '1933-11-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_turnos_mod`
--

CREATE TABLE `usu_turnos_mod` (
  `id` int(11) NOT NULL,
  `id_usuario` bigint(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_turno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usu_turnos_mod`
--

INSERT INTO `usu_turnos_mod` (`id`, `id_usuario`, `id_modulo`, `id_turno`) VALUES
(3, 1096187200, 1, 7),
(4, 12345, 1, 0),
(6, 12345, 1, 0),
(7, 12345, 1, NULL),
(8, 12345, 2, NULL),
(9, 12345, 2, NULL),
(10, 12345, 2, 23),
(11, 12345, 2, 6),
(12, 12345, 2, 7),
(13, 1096187206, 1, 10),
(14, 12345, 2, 8),
(15, 1096187206, 1, 11),
(16, 1096187206, 1, 12),
(17, 1096187206, 1, 13),
(18, 1096187206, 1, 14),
(19, 12345, 2, 9),
(20, 1096187206, 1, 15),
(21, 12345, 2, 10),
(22, 12345, 2, 12345),
(23, 1096187206, 1, 5),
(24, 1096187206, 1, 5),
(25, 1096187206, 1, 5),
(26, 1096187206, 1, 15),
(27, 1096187206, 1, 15),
(28, 1096187206, 1, 15),
(29, 12345, 2, 12347),
(30, 1096187206, 1, 16),
(31, 12345, 2, 12348),
(32, 12345, 2, 12349),
(33, 12345, 2, 11),
(34, 1096187206, 1, 17),
(35, 1096187206, 1, 18),
(36, 1096187206, 1, 19),
(37, 12345, 2, 14),
(38, 12345, 2, 15),
(39, 1096187206, 1, 19),
(40, 12345, 2, 16),
(41, 12345, 2, 1),
(42, 1096187206, 1, 1),
(43, 1096193533, 2, 14),
(44, 1096187206, 1, 19),
(45, 12345, 2, 15),
(47, 12345, 2, 23),
(48, 12345, 2, 24),
(49, 1096187206, 1, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`doc`),
  ADD KEY `USUARIO_SEDE` (`id_sede`);

--
-- Indices de la tabla `usu_turnos_mod`
--
ALTER TABLE `usu_turnos_mod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MODULO` (`id_modulo`),
  ADD KEY `TURNO` (`id_turno`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usu_turnos_mod`
--
ALTER TABLE `usu_turnos_mod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `USUARIO_SEDE` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usu_turnos_mod`
--
ALTER TABLE `usu_turnos_mod`
  ADD CONSTRAINT `MODULO` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usu_turnos_mod_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`doc`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
