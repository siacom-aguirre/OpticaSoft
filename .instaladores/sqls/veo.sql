-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2023 a las 23:01:09
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ov_estados`
--

CREATE TABLE `ov_estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ov_local`
--

CREATE TABLE `ov_local` (
  `id_local` int(10) NOT NULL,
  `nombre_local` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ov_local`
--

INSERT INTO `ov_local` (`id_local`, `nombre_local`, `direccion`, `telefono`) VALUES
(1, 'Optica Veo', 'San Luis 1879, Posadas, Misiones', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ov_productos`
--

CREATE TABLE `ov_productos` (
  `id_producto` int(50) NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_producto` varchar(10) NOT NULL,
  `foto_producto` varchar(100) NOT NULL,
  `thumb_producto` varchar(50) NOT NULL,
  `estado_producto` varchar(20) NOT NULL,
  `fecha_creacion` varchar(20) NOT NULL,
  `oservaciones` text NOT NULL,
  `codigo_interno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ov_root`
--

CREATE TABLE `ov_root` (
  `id_usuario` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `dni_usuario` int(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `foto_perfil` varchar(50) NOT NULL,
  `privilegio` varchar(30) NOT NULL,
  `fecha_registro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ov_root`
--

INSERT INTO `ov_root` (`id_usuario`, `username`, `nombre_usuario`, `apellido_usuario`, `dni_usuario`, `passwd`, `foto_perfil`, `privilegio`, `fecha_registro`) VALUES
(1, '33407616', 'Emmanuel', 'Aguirre', 33407616, 'a34f58c3865176fa7a9421e510a98a2d', '', 'root', '05-04-2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ov_usuarios`
--

CREATE TABLE `ov_usuarios` (
  `id_usuario` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `dni_usuario` int(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `foto_perfil` varchar(50) NOT NULL,
  `privilegio` varchar(30) NOT NULL,
  `fecha_registro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `ov_auditoria`
--
ALTER TABLE `ov_auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `ov_clientes`
--
ALTER TABLE `ov_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `ov_estados`
--
ALTER TABLE `ov_estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `ov_local`
--
ALTER TABLE `ov_local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indices de la tabla `ov_productos`
--
ALTER TABLE `ov_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `ov_root`
--
ALTER TABLE `ov_root`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ov_usuarios`
--
ALTER TABLE `ov_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `version_soft`
--
ALTER TABLE `version_soft`
  ADD PRIMARY KEY (`id_version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ov_auditoria`
--
ALTER TABLE `ov_auditoria`
  MODIFY `id_auditoria` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ov_clientes`
--
ALTER TABLE `ov_clientes`
  MODIFY `id_cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ov_estados`
--
ALTER TABLE `ov_estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ov_local`
--
ALTER TABLE `ov_local`
  MODIFY `id_local` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ov_productos`
--
ALTER TABLE `ov_productos`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ov_root`
--
ALTER TABLE `ov_root`
  MODIFY `id_usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ov_usuarios`
--
ALTER TABLE `ov_usuarios`
  MODIFY `id_usuario` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `version_soft`
--
ALTER TABLE `version_soft`
  MODIFY `id_version` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
