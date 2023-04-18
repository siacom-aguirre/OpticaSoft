-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2023 a las 21:07:52
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
-- Estructura de tabla para la tabla `ov_clientes`
--

CREATE TABLE `ov_clientes` (
  `id_cliente` int(100) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `fecha_cliente` varchar(50) NOT NULL,
  `obra_social` varchar(50) NOT NULL,
  `laboratorio` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `foto_receta` varchar(100) NOT NULL,
  `dni_cliente` varchar(15) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` varchar(20) NOT NULL,
  `codigo_interno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ov_clientes`
--
ALTER TABLE `ov_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ov_clientes`
--
ALTER TABLE `ov_clientes`
  MODIFY `id_cliente` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
