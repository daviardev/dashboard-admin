-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2023 a las 07:57:46
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
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_ficha` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `programa` int(11) NOT NULL,
  `ficha` bigint(20) NOT NULL,
  `alias` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id`, `programa`, `ficha`, `alias`, `estado`) VALUES
(7, 11, 32, 'hgfhgfhfgjgfjghjhgkhg', 16),
(8, 13, 6090989809090, 'asdsafsaf', 15);

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
(2, 'documento'),
(3, 'estado'),
(5, 'estado_ficha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre_programa` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre_programa`, `estado`) VALUES
(10, 'fdsfdssdffds', 13),
(11, 'hgfhgfh', 13),
(12, 'gdfdsfdsdfsfdsdfs', 13),
(13, 'nbvnbvnbvnvbnbvnbvnvbnvbnbvnbvnvb', 13);

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
(40, 'daviar', 'dev', 5, 2, 'daviar@daviar.com', 32, 10, 'caf1a3dfb505ffed0d024130f58c5cfa'),
(43, 'jh', 'as', 6, 6543, 'da@.qd.es', 423, 10, '1ff1de774005f8da13f42943881c655f'),
(49, '123', '321', 7, 123321, '123@ds.das', 2147483647, 12, '9acacb906f59ed21c5c7e6bf78ea7323'),
(50, 'jhsfhjkfsdhkfdskfdskhfdskhdskjsdkjsdkjsdkjkjsfdkjf', 'kjsdhkjsdjkhdskjfkjsdjkkjhfkdsjhfkjhdkjhsdkjhsdkjh', 5, 2147483647, 'jkhadskjsahkjdhsajksdkjdskjdhasd@hdjhasdkjhsakjdhk', 2147483647, 12, 'ba40bf59e82432e19b35232b4089be20');

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
(12, 1, 'Aprendiz'),
(13, 3, 'Activo'),
(14, 3, 'Inactivo'),
(15, 5, 'En formación'),
(16, 5, 'Culminado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`),
  ADD KEY `id_ficha` (`id_ficha`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programa` (`programa`),
  ADD KEY `estado` (`estado`),
  ADD KEY `ficha` (`ficha`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`);

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
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `registropersonas`
--
ALTER TABLE `registropersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `fichas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aprendices_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `sub_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aprendices_ibfk_3` FOREIGN KEY (`id`) REFERENCES `registropersonas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`programa`) REFERENCES `programas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `sub_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
