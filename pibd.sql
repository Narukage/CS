-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2017 a las 01:17:27
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_unicode_ci,
  `Descripcion` text COLLATE utf8_unicode_ci,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`IdAlbum`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Usuario`) VALUES
(9, 'Comic Con 16', 'Los mejores cosplays de la Comic Con 2016', '2016-11-04', 13, 2),
(10, 'Mis dulces', 'Todos los dulces horneados durante el aÃ±o.\r\n    ', '2016-12-03', 1, 2),
(11, 'Autorretratos', 'La cara mÃ¡s profunda de Satan.\r\n    ', '2015-01-01', 4, 4),
(12, 'Perritos', 'Capturas de los perretes mÃ¡s cuquis.', '2016-11-04', 13, 1),
(13, 'Random', 'Fotos aleatorias para recordar.\r\n    ', '2016-12-19', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL,
  `Titulo` text COLLATE utf8_unicode_ci,
  `Descripcion` text COLLATE utf8_unicode_ci,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Album` int(11) DEFAULT NULL,
  `Fichero` text COLLATE utf8_unicode_ci,
  `Fregistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFoto`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `Fregistro`) VALUES
(19, 'Baymax y GoGo', 'Big Hero 6', '2013-03-12', 13, 9, 'files/fotos/hqdefault.jpg', '2016-12-19 00:00:00'),
(20, 'Duela Dent', 'DC Comics', '2013-03-12', 13, 9, 'files/fotos/Cosplay-Comic-Con-73-600x400.jpg', '2016-12-19 00:00:00'),
(21, 'Wookies', 'Star Wars', '2013-03-12', 13, 9, 'files/fotos/San-Diego-Comic-Con-Cosplays-2015.jpg', '2016-12-19 00:00:00'),
(22, 'Garona', 'World of Warcraft', '2013-03-12', 13, 9, 'files/fotos/1511935063580899245.jpg', '2016-12-19 00:00:00'),
(23, 'Fresas', 'Tarta de fresas con nata y bizcocho de vainilla.', '2014-01-23', 1, 10, 'files/fotos/tumblr_static_2ukariikw084k4c84wkoo4wco_640_v2.jpg', '2016-12-19 00:00:00'),
(24, 'Coulants de Oreo', 'Coulants de oreo rellenos de chocolate blanco.', '2014-04-06', 1, 10, 'files/fotos/tumblr_nz5wf7mONj1rlqdmro1_500.jpg', '2016-12-19 00:00:00'),
(25, 'Tarta degradado.', 'Tarta de vainilla con crema de rosas en degradado.', '2014-06-26', 1, 10, 'files/fotos/3cb981045b8643fb299cb54a8d3cd371.jpg', '2016-12-19 00:00:00'),
(26, 'Gatete', 'Disfraz de halloween.', '2016-03-12', 4, 11, 'files/fotos/tumblr_n5fv5hYVsd1rt0tppo1_500.jpg', '2016-12-19 00:00:00'),
(27, 'Repartiendo pizza', 'Dibujo digital.', '2015-06-26', 13, 11, 'files/fotos/tumblr_o6z2x2wDqD1txfen3o1_500.jpg', '2016-12-19 00:00:00'),
(28, 'Cuqui', 'Dibujo digital en tonos pastel.', '2015-06-26', 4, 11, 'files/fotos/tumblr_nj2k1tHtHf1tfgbalo1_500.png', '2016-12-19 00:00:00'),
(29, 'Elegancia', 'Corgi husky de 9 meses.', '2016-06-20', 6, 12, 'files/fotos/3388ff0568f0f72816bf7a37a3b06e90.jpg', '2016-12-19 00:00:00'),
(30, 'CapitÃ¡n AmÃ©rica', 'Un corgi haciendo cosplay.', '2015-06-26', 13, 12, 'files/fotos/a98680471bfec9c816ab9159c48d9c3a.jpg', '2016-12-19 00:00:00'),
(31, 'Panda', 'Un chow chow que parece un panda.', '2014-04-06', 12, 12, 'files/fotos/la-gran-moda-de-los-perros-panda-en-china-ternura-600x429.jpg', '2016-12-19 00:00:00'),
(32, 'TontorrÃ³n', 'Un shiba inu haciendo el tonto.', '2014-04-06', 1, 12, 'files/fotos/shiba-inus-are-weird-dogs-of-course-they-come-from-japan-21.jpg', '2016-12-19 00:00:00'),
(33, 'Wow', 'Fondo de pantalla.', '2016-06-20', 13, 13, 'files/fotos/tumblr_inline_n11vopBqh11szavys.png', '2016-12-19 00:00:00'),
(34, 'Arcoiris', 'Chcocolate blanco y arcoiris.', '2016-04-06', 12, 10, 'files/fotos/cake-food-random-Favim.com-525160.jpg', '2016-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `IdPais` int(11) NOT NULL,
  `NomPais` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`IdPais`, `NomPais`) VALUES
(1, 'Spain'),
(2, 'France'),
(3, 'England'),
(4, 'Germany'),
(5, 'New Zealand'),
(6, 'Italy'),
(7, 'Portugal'),
(8, 'Greece'),
(9, 'Switzerland'),
(10, 'Japan'),
(11, 'Russia'),
(12, 'Canada'),
(13, 'United States');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `IdSolicitud` int(11) NOT NULL,
  `Album` int(11) DEFAULT NULL,
  `Nombre` text COLLATE utf8_unicode_ci,
  `Titulo` text COLLATE utf8_unicode_ci,
  `Descripcion` text COLLATE utf8_unicode_ci,
  `Direccion` text COLLATE utf8_unicode_ci,
  `Color` text COLLATE utf8_unicode_ci,
  `Copias` int(11) DEFAULT NULL,
  `Resolucion` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `IColor` tinyint(1) DEFAULT NULL,
  `FRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subida`
--

CREATE TABLE `subida` (
  `IdArchivo` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `ClavePrivada` text NOT NULL,
  `TextoEncriptado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subida`
--

INSERT INTO `subida` (`IdArchivo`, `Nombre`, `ClavePrivada`, `TextoEncriptado`) VALUES
(1, 'buoo.jpg', 'gVPS55iZH9MMDsYVNDWd9FZY5PNK4VOV', ''),
(2, 'buoo.jpg', '6xVkx2s4CnyjY0EyWVX3jRw53qSzvwVK', ''),
(32, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', 'okwhbFKUHwLhhp5ZQ6fqhdxcD8Cr7p7H', ''),
(33, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', 'Da41XcCEezPpjB81cP7YxAEK5QSh3JbJ', ''),
(34, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', 'kf1eUPLt8KdueMzPUljKFHZyMYzKCdax', ''),
(35, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', '5w0VNCY6laQ9n5xe7LDMcenbzLYQ8jpj', ''),
(36, 'WhatsApp Image 2017-11-28 at 15.52.03.jpeg', 'zYwbcLjPimBmUR8FrrWpypiy3gaBI7eT', ''),
(37, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', 'wmwAGLHY3E560VzjwEl7DHhzX0jvWd6f', ''),
(38, 'WhatsApp Image 2017-11-28 at 23.45.44.jpeg', 'kFF4Hqmat9YNtg4KyJFJ3plGfvSGtXd5', ''),
(39, '1 (1).jpg', 'X9uXS3JjLQ2N4Ix5va6s5a6W4j3v8Zzm', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NomUsuario` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Clave` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` text COLLATE utf8_unicode_ci,
  `Sexo` tinyint(1) DEFAULT NULL,
  `FNacimiento` date DEFAULT NULL,
  `Ciudad` text COLLATE utf8_unicode_ci,
  `Pais` int(11) NOT NULL,
  `Foto` text COLLATE utf8_unicode_ci,
  `FRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`) VALUES
(1, 'turofila', '926e27eecdbc7a18858b3798ba99bddd', 'turofila@gmail.com', 0, '1995-12-03', 'Tokio', 10, 'files/perfiles/mei.png', '0000-00-00'),
(2, 'lunatica', '926e27eecdbc7a18858b3798ba99bddd', 'lunatica@gmail.com', 0, '0000-00-00', 'Alicante', 1, 'files/perfiles/dva.png', '0000-00-00'),
(4, 'Satan', 'fae0b27c451c728867a567e8c1bb4e53', '666@gmail.com', 1, '0000-00-00', 'Infierno', 6, NULL, '0000-00-00'),
(14, 'maria', 'fdfe6dd716c333e00decfddbd0210ea3', 'maria@gmail.com', 0, '1997-04-06', 'Alc', 1, NULL, '2017-12-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`IdAlbum`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFoto`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `Album` (`Album`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`IdSolicitud`),
  ADD KEY `Album` (`Album`);

--
-- Indices de la tabla `subida`
--
ALTER TABLE `subida`
  ADD PRIMARY KEY (`IdArchivo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `Pais` (`Pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subida`
--
ALTER TABLE `subida`
  MODIFY `IdArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `albumes_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `paises` (`IdPais`),
  ADD CONSTRAINT `albumes_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `paises` (`IdPais`),
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`Album`) REFERENCES `albumes` (`IdAlbum`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`Album`) REFERENCES `albumes` (`IdAlbum`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `paises` (`IdPais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
