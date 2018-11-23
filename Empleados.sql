-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2018 a las 16:02:09
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
-- Base de datos: `empleados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE `Empleados` (
  `Nombre` text COLLATE utf8_bin NOT NULL,
  `DNI` varchar(9) COLLATE utf8_bin NOT NULL,
  `Direccion` text COLLATE utf8_bin NOT NULL,
  `Nacimiento` date NOT NULL,
  `Sexo` varchar(10) COLLATE utf8_bin NOT NULL,
  `MediaJornada` tinyint(1) NOT NULL,
  `Tarde` tinyint(1) NOT NULL,
  `Noche` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`Nombre`, `DNI`, `Direccion`, `Nacimiento`, `Sexo`, `MediaJornada`, `Tarde`, `Noche`) VALUES
('Fer', '12312340R', 'Rabanales', '1998-09-09', 'Hombre', 0, 1, 1),
('TomÃ¡s', '12343289I', 'Calle calle', '1998-07-01', 'Hombre', 1, 0, 0),
('Chechu', '29471030C', 'Rabanales', '2018-11-09', 'nobinario', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
