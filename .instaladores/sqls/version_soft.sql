-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2023 a las 21:09:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `version_soft`
--

CREATE TABLE `version_soft` (
  `id_version` int(10) NOT NULL,
  `version` varchar(10) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `version_soft`
--

INSERT INTO `version_soft` (`id_version`, `version`, `fecha`, `descripcion`) VALUES
(1, '1.0', '11-04-2023', 'Sistema de registro de productos y clientes, con buscador en pantalla y buscador rápido. Interface de creación, modificación y eliminación de productos y clientes con sistema de auditoria.'),
(2, '1.1', '17-04-2023', 'Fix de imágenes a nombres de archivos por código interno, correcciones de css para el buscador rápido y el header. Se crea la sección de registro de nuevos usuarios. Se modifican los campos inputs de la carga de clientes. Se incorporó una vista previa de la receta al situar el mouse sobre la imagen.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `version_soft`
--
ALTER TABLE `version_soft`
  ADD PRIMARY KEY (`id_version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `version_soft`
--
ALTER TABLE `version_soft`
  MODIFY `id_version` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
