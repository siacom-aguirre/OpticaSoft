-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2023 a las 21:07:36
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
-- Estructura de tabla para la tabla `ov_auditoria`
--

CREATE TABLE `ov_auditoria` (
  `id_auditoria` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `accion` varchar(10) NOT NULL,
  `fecha_auditoria` varchar(30) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `precio_producto` varchar(100) NOT NULL,
  `foto_producto` varchar(100) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `fecha_cliente` varchar(20) NOT NULL,
  `obra_social` varchar(50) NOT NULL,
  `laboratorio` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `foto_receta` varchar(150) NOT NULL,
  `dni_cliente` varchar(20) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `descripcion_cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ov_auditoria`
--
ALTER TABLE `ov_auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ov_auditoria`
--
ALTER TABLE `ov_auditoria`
  MODIFY `id_auditoria` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
