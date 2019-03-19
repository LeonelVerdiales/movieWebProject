-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2019 a las 23:52:11
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendapeliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen_pelicula` longblob,
  `genero` varchar(15) NOT NULL,
  `sinopsis` varchar(150) NOT NULL,
  `duracion` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `imagen_pelicula`, `genero`, `sinopsis`, `duracion`, `existencia`, `costo`) VALUES
(2, 'Batman v Superman: Dawn of Justice', 0x6276732e6a7067, 'Batman y Superm', 'Accion', 140, 2, 100),
(3, 'Capitana Marvel', 0x6361707461696e4d617276656c2e6a7067, 'Accion', 'Carol Danvers regresar a la tierra', 130, 2, 300),
(4, 'Avengers: Infinity War', 0x69772e6a7067, 'Accion', 'Los Vengadores se volverÃ¡n a unir para enfrentar a la amenaza mÃ¡s grande que han enfrentado: Thanos.', 140, 5, 200),
(5, 'Creed', 0x63726565642e6a7067, 'Drama', 'Adonis Creed sigue el legado de su padre en el mundo del boxeo.', 120, 2, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellidos_usuario` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellidos_usuario`, `direccion`, `telefono`, `username`, `password`, `tipo`) VALUES
(1, 'Leonel', 'Verdiales Valle', 'Tuberosa 1288', '6871577496', 'LeonelVerdiales', 'lolelito1', 'u'),
(2, 'Kennet', 'Mujica', 'Tuberosa 1288', '33232345', 'admin', 'admin', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
