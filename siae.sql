-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 01:22:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `CURP` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `img_profile` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `correo`, `password`, `CURP`, `img_profile`, `Token`, `rol_id`) VALUES
(1, 'Fernando Vela Leon', 'vela@yopmail.com', '$2y$10$xoj3mWqqUxESZ.r8yILuOuv7Hn4VY5TQ5MCfjMbn35nmldW4pdPbu', 'VELF971204MCCLRN01', '39134-1159060930.jpg', '', 1),
(4, 'Lorna Alejandra Delgado Verdejo', 'mpdverdejo@gmail.com', '$2y$10$ryFz35QxAd5mt9fhAAe7c.hPzLEXMDCLhqlAwz9LP0XZr/0XDCava', 'DEVM971204MCCLRN01', 'default.jpg', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_id` int(11) DEFAULT NULL,
  `representativo` enum('Si','No') COLLATE utf8_unicode_ci NOT NULL,
  `carrera` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` enum('Aprobado','Cursando','Reprobado') COLLATE utf8_unicode_ci NOT NULL,
  `semestre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `evaluacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`nombre`, `matricula`, `password`, `taller_id`, `representativo`, `carrera`, `estatus`, `semestre`, `evaluacion`, `sexo`, `rol_id`) VALUES
('Sin asignar', 0, '', 1, '', '', '', '', '', '', 2),
('Magnolia Verdejo Chong', 161616, '$2y$10$0ZAgJ7YjVooOY.mIiQGVWu5sdmVizdTvwUL0ULV8wCvoeVzx41Eoq', 3, 'Si', 'Licenciatura en Turismo', 'Cursando', 'Noveno', '', 'F', 2),
('monica verdejo', 161080111, '$2y$10$U5Bcskx42d.uLDgsFUI6Lutrvha1ukOeUlkprI6vc1xNISA2lhrMm', 2, 'No', 'Ingeniería Ambiental', 'Cursando', 'Noveno', '', 'F', 2),
('Lorna Alejandra Delgado Verdejo', 161080138, '$2y$10$dxmq0KZQVhPKoa5lvbdzxOpY/D5QfeyNPS0njqBqe24Xve0K0R4qi', 2, 'No', 'Ingeniería en Sistemas Computacionales', 'Reprobado', 'Séptimo', '', 'F', 2),
('Jose Alberto Pech Villasis', 161080150, '$2y$10$9Q6SlZVAGp3LcmT2ULuFxOl/XOyNRDjJAQqzuMzdPe794lxhAxJsC', 2, 'No', 'Ingeniería en Logística', 'Cursando', 'Séptimo', '', 'F', 2),
('Gerardo Gonzalez Rosado', 161080156, '$2y$10$Zg4OgcdfMfOKAIOj887e3.DNSw7U1lcBsFYtMbLU6p77m6siX1Z7S', 2, 'No', 'Licenciatura en Turismo', 'Cursando', 'Tercero', '161080156.pdf', 'F', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `img_index` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `img_civico` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `img_cultural` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `img_deporte` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slider1` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slider2` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slider3` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cms`
--

INSERT INTO `cms` (`id`, `img_index`, `img_civico`, `img_cultural`, `img_deporte`, `slider1`, `slider2`, `slider3`) VALUES
(1, 'inicio.jpg', 'civico.jpg', 'cultural.jpg', 'deportivo.jpg', 'slider1.jpg', 'slider2.jpg', 'slider3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `maestro_id` int(11) NOT NULL,
  `taller_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `categoria` enum('instrumentacionD','evaluacionB') COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`, `fecha`) VALUES
(5, 16, 2, 161080138, 'evaluacionB', '161080138', '2020-10-27 20:34:10'),
(6, 16, 2, 0, 'instrumentacionD', 'Monica Priscila Delgado Verdejo', '2020-10-27 20:38:08'),
(7, 16, 2, 161080138, 'evaluacionB', '161080138', '2020-10-27 20:39:42'),
(8, 16, 2, 161080138, 'evaluacionB', '161080138.pdf', '2020-10-27 20:40:00'),
(9, 16, 2, 161080138, 'evaluacionB', '161080138.pdf', '2020-10-27 20:41:55'),
(10, 16, 2, 161080138, 'evaluacionB', '161080138.pdf', '2020-10-27 20:42:40'),
(11, 16, 2, 161080138, 'evaluacionB', '161080138.docx', '2020-10-27 20:47:32'),
(12, 16, 2, 161080138, 'evaluacionB', '161080138.pdf', '2020-10-27 20:49:25'),
(13, 16, 2, 0, 'instrumentacionD', 'Monica Priscila Delgado Verdejo.docx', '2020-10-27 20:54:11'),
(14, 16, 2, 0, 'instrumentacionD', 'Monica Priscila Delgado Verdejo.pdf', '2020-10-27 20:55:14'),
(16, 16, 2, 161080150, 'evaluacionB', '161080150.pdf', '2020-11-04 17:53:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `taller` int(11) NOT NULL,
  `lunes` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `martes` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `miercoles` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jueves` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `viernes` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sabado` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `domingo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `turno` enum('matutino','vespertino') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `taller`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `turno`) VALUES
(16, 2, '12:00pm-13:30pm', '0', '12:00-2:30', '12:00pm-13:30pm', '12:00-2:30', '0', '0', 'vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_asignado` int(11) DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `sexo`, `Token`, `rol_id`) VALUES
(1, 'Sin Asignar', '', '', 1, '', '', '', '', 3),
(16, 'Monica Priscila Delgado Verdejo', 'priscila_verdejo@outlook.com', '$2y$10$Z4FirdzKRTi5nzlC1xjV5eQbhBAyu1DrMlTup5Hlz4CUYtY.XULLy', 2, 'DEVM971204MCCLRN02', '9821159667', 'M', '', 3),
(18, 'Lorna Alejandra Delgado Verdejo', 'verdejo97@outlook.com', '$2y$10$NCaZ6DLKO4ebvyIGkwTc2O66ZWLeyHiug/bR6B3nhNuGrPVPpKNZW', 3, 'DEVM971204MCCLRN01', '9821276466', 'M', '5f9b31d9b8ee3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeadmin`
--

CREATE TABLE `mensajeadmin` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajeadmin`
--

INSERT INTO `mensajeadmin` (`id`, `mensaje`, `fecha`, `estado`, `admin_id`) VALUES
(1, 'Prueba #1', '2020-10-03 15:27:55', 0, 0),
(2, 'Prueba #1', '2020-10-03 15:30:32', 0, 0),
(3, 'Prueba #2', '2020-10-03 16:23:14', 0, 0),
(4, 'Prueba#3', '2020-10-06 15:24:07', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajemaestro`
--

CREATE TABLE `mensajemaestro` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `mtro_id` int(11) NOT NULL,
  `taller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajemaestro`
--

INSERT INTO `mensajemaestro` (`id`, `mensaje`, `fecha`, `estado`, `mtro_id`, `taller_id`) VALUES
(38, 'Prueba #1\r\n', '2020-10-27 20:06:48', 0, 16, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'alumno'),
(3, 'maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `taller` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `mtro_asignado` int(11) DEFAULT NULL,
  `categoria` enum('Civico','Cultural','Deportivo') COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `taller`, `nombre`, `descripcion`, `mtro_asignado`, `categoria`, `direccion`, `img1`) VALUES
(1, 'No asignado', '', '', 1, '', '', ''),
(2, 'Danza moderna', 'halcones', 'asdadsasd', 16, 'Cultural', 'adsasd', '71HHP51MVEL._AC_SY355_.jpg'),
(3, 'volleybal', 'Los halcones del Itescham', 'bla bla bla bla ', 18, 'Deportivo', '12', '5c3642f4bda1537b6aa50702-large.jpg'),
(4, 'Futbol', 'halconese', 'fdffdfd', 1, 'Deportivo', 'dfdfdfd', '9ab2cb6cf42baebec14e35fa8a287db0.jpg'),
(5, 'Escolta', 'halcones', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 'Civico', '12', '0966713e7055b3340e54995b50f64704.jpg'),
(6, 'Ballet', 'viejas en mallas', 'bla bla bla bla ', 1, 'Cultural', 'daesdadada', 'b56dbba6d76b457498767e12e624d2de.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `	taller_id` (`taller_id`);

--
-- Indices de la tabla `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `maestro_id` (`maestro_id`),
  ADD KEY `taller_id` (`taller_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taller` (`taller`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `mensajeadmin`
--
ALTER TABLE `mensajeadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mtro_id` (`mtro_id`),
  ADD KEY `taller_id` (`taller_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talleres_ibfk_1` (`mtro_asignado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mensajeadmin`
--
ALTER TABLE `mensajeadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `	taller_id` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `alumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE,
  ADD CONSTRAINT `maestro_id` FOREIGN KEY (`maestro_id`) REFERENCES `maestro` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `taller_id` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `taller` FOREIGN KEY (`taller`) REFERENCES `talleres` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD CONSTRAINT `talleres_ibfk_1` FOREIGN KEY (`mtro_asignado`) REFERENCES `maestro` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
