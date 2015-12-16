-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2015 a las 14:50:23
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `P&I`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Albumes`
--

CREATE TABLE `Albumes` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `Fotos`
--

CREATE TABLE `Fotos` (
  `IdFotos` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) NOT NULL,
  `Album` int(11) NOT NULL,
  `Fichero` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `Paises`
--

CREATE TABLE `Paises` (
  `IdPais` int(11) NOT NULL,
  `NomPais` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NomUsuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` text COLLATE utf8_spanish_ci NOT NULL,
  `Email` text COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` smallint(6) NOT NULL,
  `FNacimiento` date NOT NULL,
  `Ciudad` text COLLATE utf8_spanish_ci NOT NULL,
  `Pais` int(11) NOT NULL,
  `Foto` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Estructura de tabla para la tabla `Comentarios` ------------------------------------------------------
--

CREATE TABLE `Comentario` (
  `IdComentario` int(11) NOT NULL,
  `Comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario` int(11) NOT NULL,
  `Foto` int(11) NOT NULL,
  `Validado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `Comentario`
  ADD PRIMARY KEY (`IdComentario`);

ALTER TABLE `Comentario`
  MODIFY `IdComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `comentario`(`IdComentario`, `Comentario`, `Fecha`, `Usuario`, `Foto`, `Validado`) 
VALUES (1,'Guau! es el coche de batman','0000-00-00',38, 22,0 )
----------------------------------------------------------------------------------------------------------
--
-- Volcado de datos para la tabla `Albumes`
--

INSERT INTO `Albumes` (`IdAlbum`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Usuario`) VALUES
(1, 'asdfadfs', 'fff', '2014-11-30', 1, 9),
(2, 'asdfadfs', 'fff', '2014-11-30', 1, 9),
(3, 'a', 'a', '0000-00-00', 0, 9),
(4, 'a', 'a', '0000-00-00', 0, 9),
(5, 'a', 'a', '0000-00-00', 0, 9),
(6, 'a', 'a', '0000-00-00', 0, 9);

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `Fotos`
--

INSERT INTO `Fotos` (`IdFotos`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`) VALUES
(1, 'asdfadfs', 'fff', '2014-11-30', 1, 0, '', '0000-00-00'),
(2, 'aaaa', 'aaaa', '0000-00-00', 0, 0, 'avatar4.jpg', '2015-11-25');

-- --------------------------------------------------------



--
-- Volcado de datos para la tabla `Paises`
--

INSERT INTO `Paises` (`IdPais`, `NomPais`) VALUES
(1, 'España'),
(2, 'Egipto'),
(3, 'Congo'),
(4, 'Portugal');

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`) VALUES
(1, 'Roberto', 'Roberto1', 'tzrober91@gmail.com', 1, '1991-07-25', 'Almoradi', 1, '0', '0000-00-00 00:00:00'),
(2, 'Hector', 'Hector1', 'hector@gmail.com', 1, '1991-11-19', 'Redovan', 1, '0', '0000-00-00 00:00:00'),
(9, 'Hector2', 'Hector2', 'lllallaa@lalala.com', 0, '2015-12-31', 'Alicante', 2, 'avatar.jpg', '2015-11-25 10:04:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Albumes`
--
ALTER TABLE `Albumes`
  ADD PRIMARY KEY (`IdAlbum`);

--
-- Indices de la tabla `Fotos`
--
ALTER TABLE `Fotos`
  ADD PRIMARY KEY (`IdFotos`);

--
-- Indices de la tabla `Paises`
--
ALTER TABLE `Paises`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NomUsuario` (`NomUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Albumes`
--
ALTER TABLE `Albumes`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Fotos`
--
ALTER TABLE `Fotos`
  MODIFY `IdFotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Paises`
--
ALTER TABLE `Paises`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
