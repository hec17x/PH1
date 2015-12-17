-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2015 a las 10:04:45
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p&i`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`IdAlbum`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Usuario`) VALUES
(7, 'Coches', 'Los mejores coches', '2015-12-16', 2, 12),
(10, 'fghsgs', 'dfghd', '0000-00-00', 0, 15),
(11, 'cosa', 'mucha cosa ', '0000-00-00', 0, 16),
(12, 'Motos', 'Todos las mejores Motos', '0000-00-00', 0, 12),
(13, 'Album prueba', 'Pedazo de album', '2015-12-17', 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `IdComentario` int(11) NOT NULL,
  `Comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario` int(11) NOT NULL,
  `Foto` int(11) NOT NULL,
  `Validado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`IdComentario`, `Comentario`, `Fecha`, `Usuario`, `Foto`, `Validado`) VALUES
(9, 'Me encanta este coche', '2015-12-16', 12, 7, 0),
(10, 'Ami me gusta mas que a ti!', '2015-12-16', 15, 7, 0),
(11, 'Hola', '2015-12-16', 16, 7, 0),
(12, 'Que tal estmoas?', '2015-12-16', 16, 7, 0),
(20, 'Bien Gracias', '2015-12-16', 12, 7, 0),
(22, 'Bravisimo', '2015-12-16', 12, 13, 0),
(23, 'buaa', '2015-12-17', 12, 18, 0),
(24, 'Bonito coche', '2015-12-17', 12, 20, 0),
(25, 'Hola amigos', '2015-12-17', 17, 7, 0),
(26, 'Hola, esto es una prueba', '2015-12-17', 12, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
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
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFotos`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`) VALUES
(7, 'BMW', 'bmw gt3', '2015-12-16', 1, 7, '7BMW.jpg', '2015-12-16'),
(20, 'Ferrari', 'Modelo LaFerrari', '2015-12-11', 2, 7, '72015-12-1615-53-55.jpg', '2015-12-16'),
(25, 'Nevada', 'Bonita nevada', '2015-12-31', 1, 10, '102015-12-1616-07-30.jpg', '2015-12-16'),
(32, 'Prueba', 'Pruebisima', '0000-00-00', 1, 11, '112015-12-1616-25-47.jpg', '2015-12-16'),
(33, 'Prueba', 'Prueba', '0000-00-00', 2, 11, '112015-12-1616-26-52.jpg', '2015-12-16'),
(35, 'Rossi', 'Valentino Rossi tomando una curva', '0000-00-00', 2, 12, '122015-12-17-09-06-00.jpg', '2015-12-17'),
(36, 'Paisaje', 'paisajes', '2015-12-03', 1, 13, '132015-12-17-09-24-44.jpg', '2015-12-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `IdPais` int(11) NOT NULL,
  `NomPais` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`IdPais`, `NomPais`) VALUES
(1, 'España'),
(2, 'Italia'),
(3, 'EEUU'),
(4, 'Brasil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`) VALUES
(12, 'Rober', 'Rober1', 'tzrober91@gmail.com', 0, '1991-07-25', 'Almoradi', 1, 'upload/avatar/BMW-650i-Prior-Design-1.jpg', '2015-12-16 12:20:49'),
(15, 'Hector', 'Hector1', 'Hector@hotmail.com', 0, '1991-11-30', 'Redovan', 2, 'upload/avatar/mclaresn.jpg', '2015-12-16 15:03:30'),
(16, 'Prueba', 'Prueba1', 'j-rober-91@hotmail.com', 0, '2015-12-31', 'Almoradi', 2, 'upload/avatar/', '2015-12-16 15:08:18'),
(17, 'Usuario', 'Usuario1', 'j-rober-91@hotmail.com', 1, '2009-10-28', 'Almoradi', 3, 'upload/avatar/', '2015-12-17 08:22:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`IdAlbum`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IdComentario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFotos`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NomUsuario` (`NomUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IdComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
