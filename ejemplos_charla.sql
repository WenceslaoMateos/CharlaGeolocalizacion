-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generaci√≥n: 16-09-2019 a las 15:21:20
-- Versi√≥n del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versi√≥n de PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplos_charla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociedad`
--

CREATE TABLE `sociedad` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `posicion` point NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sociedad`
--

INSERT INTO `sociedad` (`id`, `foto`, `posicion`, `nombre`, `apellido`, `descripcion`) VALUES
(1, '4.jpg', 'Ê\0\0\0\0\0πã0E»L¿Ãî÷ﬂC¿', 'Wenceslao', 'Mateos', 'Calle Inundada.'),
(3, '2.jpg', 'Ê\0\0\0\0\0u»Õp.@…≠I∑%Ç@', 'Marta', 'Sanchez', 'Esquina con basura'),
(4, '3.jpg', 'Ê\0\0\0\0\0æ0ô*D@¬æùDÑü¿', 'Ricardo', 'Fernandez', 'Arbol caido rompe cables'),
(5, '1.jpg', 'Ê\0\0\0\0\0ŸBêÉúE¿ÜÊ:ç¥ƒ6¿', 'Juan', 'Peralta', 'Agua dentro del hogar');

--
-- √çndices para tablas volcadas
--

--
-- Indices de la tabla `sociedad`
--
ALTER TABLE `sociedad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sociedad`
--
ALTER TABLE `sociedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
