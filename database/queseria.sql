-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 20:46:42
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `queseria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atmosfera_curado`
--

CREATE TABLE `atmosfera_curado` (
  `id_curado` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `humedad` int(11) NOT NULL,
  `co2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cisterna`
--

CREATE TABLE `cisterna` (
  `id_cisterna` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cisterna`
--

INSERT INTO `cisterna` (`id_cisterna`, `cantidad`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curado`
--

CREATE TABLE `curado` (
  `id` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `curado`
--

INSERT INTO `curado` (`id`, `capacidad`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_fermento` int(11) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `calidad` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `usado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leches`
--

CREATE TABLE `leches` (
  `id_leche` int(11) NOT NULL,
  `litros` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `calidad` int(11) NOT NULL,
  `tambo` int(11) NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `observacion` text COLLATE utf8_unicode_ci,
  `indice_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id_prod` int(11) NOT NULL,
  `tipo_queso` int(11) NOT NULL,
  `litros_leche` int(11) NOT NULL,
  `fermento` int(11) NOT NULL,
  `peso_tanda` int(11) NOT NULL,
  `curando` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quesos_curados`
--

CREATE TABLE `quesos_curados` (
  `id_queso_curado` int(11) NOT NULL,
  `tanda` int(11) NOT NULL,
  `tipo_curado` int(11) NOT NULL,
  `calidad` int(11) DEFAULT NULL,
  `distribuido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Jefe'),
(3, 'Stock'),
(4, 'Control cisterna'),
(5, 'Control curado'),
(6, 'Control de produccion'),
(7, 'Laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_quesos`
--

CREATE TABLE `tipos_de_quesos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_de_quesos`
--

INSERT INTO `tipos_de_quesos` (`id_tipo`, `tipo`) VALUES
(1, 'Cheddar'),
(2, 'Provolone'),
(3, 'Gouda '),
(4, 'Mascarpone'),
(5, 'Mozzarella');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_curado`
--

CREATE TABLE `tipo_curado` (
  `id_tipo_curado` int(11) NOT NULL,
  `tipo` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_curado`
--

INSERT INTO `tipo_curado` (`id_tipo_curado`, `tipo`) VALUES
(1, 'Fresco'),
(2, 'Tierno'),
(3, 'Semi-Curado'),
(4, 'Curado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `clave`, `rol`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'jefe', '202cb962ac59075b964b07152d234b70', 2),
(3, 'stock', '202cb962ac59075b964b07152d234b70', 3),
(4, 'cisterna', '202cb962ac59075b964b07152d234b70', 4),
(5, 'curado', '202cb962ac59075b964b07152d234b70', 5),
(6, 'produccion', '202cb962ac59075b964b07152d234b70', 6),
(7, 'laboratorio', '202cb962ac59075b964b07152d234b70', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atmosfera_curado`
--
ALTER TABLE `atmosfera_curado`
  ADD PRIMARY KEY (`id_curado`);

--
-- Indices de la tabla `cisterna`
--
ALTER TABLE `cisterna`
  ADD PRIMARY KEY (`id_cisterna`);

--
-- Indices de la tabla `curado`
--
ALTER TABLE `curado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_fermento`);

--
-- Indices de la tabla `leches`
--
ALTER TABLE `leches`
  ADD PRIMARY KEY (`id_leche`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `quesos_curados`
--
ALTER TABLE `quesos_curados`
  ADD PRIMARY KEY (`id_queso_curado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipos_de_quesos`
--
ALTER TABLE `tipos_de_quesos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_curado`
--
ALTER TABLE `tipo_curado`
  ADD PRIMARY KEY (`id_tipo_curado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atmosfera_curado`
--
ALTER TABLE `atmosfera_curado`
  MODIFY `id_curado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `cisterna`
--
ALTER TABLE `cisterna`
  MODIFY `id_cisterna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `curado`
--
ALTER TABLE `curado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_fermento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `leches`
--
ALTER TABLE `leches`
  MODIFY `id_leche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `quesos_curados`
--
ALTER TABLE `quesos_curados`
  MODIFY `id_queso_curado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipos_de_quesos`
--
ALTER TABLE `tipos_de_quesos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_curado`
--
ALTER TABLE `tipo_curado`
  MODIFY `id_tipo_curado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
