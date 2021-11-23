-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 03:44:07
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konecta`
--
CREATE DATABASE IF NOT EXISTS `konecta` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `konecta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `ID` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `PRECIO` int(11) DEFAULT NULL,
  `UNIDADES` int(11) DEFAULT NULL,
  `FECHA_VENTA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`ID`, `ID_PRODUCTO`, `PRECIO`, `UNIDADES`, `FECHA_VENTA`) VALUES
(1, 1, 246912, 3, '2021-11-22 21:18:00'),
(2, 1, 123456, 1, '2021-11-22 21:19:00'),
(3, 1, 370368, 3, '2021-11-22 21:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `REFERENCIA` varchar(100) NOT NULL,
  `PRECIO` int(11) NOT NULL,
  `CATEGORIA` varchar(100) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  `FECHA_ACTUALIZACION` datetime DEFAULT NULL,
  `FECHA_ULTIMA_VENTA` datetime DEFAULT NULL,
  `PESO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `NOMBRE`, `REFERENCIA`, `PRECIO`, `CATEGORIA`, `STOCK`, `FECHA_CREACION`, `FECHA_ACTUALIZACION`, `FECHA_ULTIMA_VENTA`, `PESO`) VALUES
(1, 'Prueba', 'ABC-123', 123456, 'Prueba', 7, '2021-11-11 10:00:00', '2021-11-22 21:20:00', '2021-11-22 21:20:00', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
