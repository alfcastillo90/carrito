-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2017 a las 21:17:17
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cantidad_inventario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `imagen`, `precio_venta`, `descripcion`, `fecha_registro`, `cantidad_inventario`) VALUES
(1, 'Samsumg Galaxy S3 mini', 'samsung-galaxy-s3-mini.jpg', '750000.00', 'Excelente Estado. Liberado para cualquier operadora, levanta 4Gcon Movistar y 2G con Digitel.\r\nUn año de uso.', '2017-07-26 19:08:34', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `username` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellido`, `email`, `clave`, `fecha_registro`) VALUES
(1, '', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$o3qvr5y2l0iz2', '2017-07-25 17:09:11'),
(2, '', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$o9tg0gs3t46q0', '2017-07-25 17:09:43'),
(3, '', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$ol0my5t6q4v1k', '2017-07-25 17:10:21'),
(4, '', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$wxuxzn00kfzrg', '2017-07-25 17:10:37'),
(5, 'alfredometal', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$pm1w7v5i90imj', '2017-07-25 17:20:13'),
(6, 'alf.castillo90', 'Carlos', 'Castillo', 'cacr1990@gmail.com', '$2y$07$1kn4qfvphlf3z', '2017-07-25 17:20:31'),
(7, 'erar', 'emmanuel', 'aguilar', 'emmanuelrar@gmail.com', '$2y$07$rq8zkxwvhjll2', '2017-07-26 17:15:11'),
(8, 'mariana', 'mariana', 'castillo', 'mariana.gabriela33@gmail.com', '$2y$07$zlsz5fmn62p3v', '2017-07-26 17:24:45'),
(9, 'milagros', 'milagros', 'rodriguez', 'milgros15@hotmail.com', '$2y$07$tyhn3zuzk2vzz', '2017-07-26 18:18:41'),
(10, 'alfredo', 'alfredo', 'castillo', 'ajca1959@hotmail.com', '$2y$07$9p4pr30gfz0vg', '2017-07-26 18:19:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
