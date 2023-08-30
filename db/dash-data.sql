-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2023 a las 07:21:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dash-data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `description`) VALUES
(1, 'rol'),
(2, 'documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registropersonas`
--

CREATE TABLE `registropersonas` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `contraseña` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registropersonas`
--

INSERT INTO `registropersonas` (`id`, `nombres`, `apellidos`, `tipo_doc`, `num_doc`, `correo`, `telefono`, `rol`, `contraseña`) VALUES
(16, 'Jerson David', 'Silva Arjona', 5, 1045759468, 'dev.daviar@gmail.com', 300368312, 10, 'e698f2679be5ba5c9c0b0031cb5b057c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_items`
--

CREATE TABLE `sub_items` (
  `id` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sub_items`
--

INSERT INTO `sub_items` (`id`, `id_items`, `description`) VALUES
(5, 2, 'Cédula de Cuidadanía'),
(6, 2, 'Tarjeta de Identidad'),
(7, 2, 'Cédula de Extranjería'),
(8, 2, 'PEP'),
(9, 2, 'Permiso por Protección Temporal'),
(10, 1, 'Administrador'),
(11, 1, 'Instructor'),
(12, 1, 'Aprendiz');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registropersonas`
--
ALTER TABLE `registropersonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `tipo_doc` (`tipo_doc`);

--
-- Indices de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_items` (`id_items`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registropersonas`
--
ALTER TABLE `registropersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registropersonas`
--
ALTER TABLE `registropersonas`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`tipo_doc`) REFERENCES `sub_items` (`id`),
  ADD CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `sub_items` (`id`);

--
-- Filtros para la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD CONSTRAINT `sub_items_ibfk_1` FOREIGN KEY (`id_items`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
