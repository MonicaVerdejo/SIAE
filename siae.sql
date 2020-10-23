-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2020 a las 07:18:23
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
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `img_profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `correo`, `password`, `CURP`, `telefono`, `img_profile`, `Token`, `rol_id`) VALUES
(1, 'Fernando Vela Leon', 'vela@yopmail.com', '$2y$12$5ut95DOWPJ/XGLSKShLm0e8SgjhOHMH4Lz.O3gY9uSYYUYaCWnfeS', 'VELF971204MCCLRN01', '9821276466', 'chuu.gif', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_id` int(11) NOT NULL,
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
('Luis Daniel Sanchez Cocon', 161080111, '$2y$10$UNSgqLhlnmktTtjuSkm28etzzHSE4qrgzYOdALAl5ICD9RAs1Bv6u', 2, 'Si', 'Licenciatura en Turismo', 'Cursando', 'Tercero', '', 'M', 2),
('monica verdejo', 161080138, '$2y$10$SOn3JSRzJXTW54VMRzAU/uXIvpQW2.04REd0Nl/6/iayBsjVVW4d.', 3, 'No', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Noveno', '', 'F', 2),
('Gerardo Gonzalez Rosado', 161080150, '$2y$10$e8eK9TBk9NuBn4StNggy5OrLBQ6iuSUYCBaNj3/L003whTEhIOIbG', 2, 'Si', 'Ingeniería Ambiental', 'Cursando', 'Quinto', '', 'M', 2),
('Jose Alberto Pech Villasis', 161080156, '$2y$10$AEUMfwC3sb2NQW4LuRn1xeIue9ft2OS5lx348ivhO0uiibek67biu', 2, 'No', 'Ingeniería en Administración', 'Cursando', 'Séptimo', '', 'M', 2),
('Marlyn Granado Rojas', 161080157, '$2y$10$xuqeSdzqk.XrST11BdR.bebihJ0vQlmVBJ5hlSA/VclmjkH9uoLcu', 2, 'Si', 'Ingeniería en Gestion Empresarial', 'Cursando', 'Noveno', '', 'F', 2),
('Valery Harrison Granados ', 161080333, '$2y$10$lX04NMuBHxkM8r/.nsw58.51Pdv4M.Z8DFZSQaK2LGOUT/WIiXmiK', 2, 'Si', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Segundo', '', 'F', 2),
('Magnolia Verdejo Chong', 161080974, '$2y$10$l5No8N9mFNA0XH.NUPKDt.UprSBwHh2oOBOz7WQVkYEd8xaRf7nPu', 2, 'Si', 'Licenciatura en Turismo', 'Cursando', 'Noveno', '', 'F', 2);

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
  `taller_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `categoria` enum('instrumentacionD','evaluacionB') COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`, `fecha`) VALUES
(13, 9, 2, 0, 'instrumentacionD', 'Formato_Instrumentación_Didáctica_para_Ingreso.docx', '2020-10-21 19:02:18'),
(14, 9, 2, 0, 'instrumentacionD', 'Formato de Evaluación al Desempeño de la Actividad Complementaria.pdf', '2020-10-21 12:03:44'),
(15, 9, 2, 0, 'instrumentacionD', 'Instrucciones para la Instrumentación Didáctica.pdf', '2020-10-21 12:04:29'),
(16, 9, 2, 0, 'instrumentacionD', 'Instrumentacion didactica (3).pdf', '2020-10-21 13:14:11');

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
(1, 3, 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'matutino'),
(8, 3, 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_asignado` int(11) NOT NULL,
  `curp` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `sexo`, `Token`, `rol_id`) VALUES
(1, 'Sin Asignar', '', '', 0, '', '', '', '', 3),
(8, 'Lorna Alejandra Delgado Verdejo', 'esdeath97@yopmail.com', '$2y$10$5blpBo.iL.58av4SjTeQK.b2SARexjvGZdE836SJQQ/HvINvS2U.O', 3, 'DEVM971204MCCLRN01', '+529821159', 'F', '', 3),
(9, 'Monica Priscila Delgado Verdejo', 'priscila_verdejo@outlook.com', '$2y$10$j6fdyLM5kb6DDezSHCEGmOyXIKFLeEtqcZrkqUw4cIsCVKxfWdUgy', 2, 'DEVM971204MCCLRN02', '9821159667', 'F', '', 3);

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
(36, 'PUTOS ', '2020-10-19 17:48:30', 0, 8, 3),
(37, 'Prueba maestro volleybal', '2020-10-20 17:20:44', 0, 9, 2);

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
  `horario` text COLLATE utf8_unicode_ci NOT NULL,
  `mtro_asignado` int(11) NOT NULL,
  `categoria` enum('Civico','Cultural','Deportivo') COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `taller`, `nombre`, `descripcion`, `horario`, `mtro_asignado`, `categoria`, `direccion`, `img1`) VALUES
(1, 'No asignado', '', '', '', 1, '', '', ''),
(2, 'volleybal', 'halcones', 'bla bla bla bla bla bla bla bla bla bla bla bla', 'Lunes: 12:00 - 14:30\r\nSabado: 8:30 - 10:30', 9, 'Deportivo', 'Unidad Deportiva \"Ulises Sansores\"', '1af246e607d5cf54a048f581f6d613e8-mensaje-en-un-icono-lateral'),
(3, 'Danza Moderna', 'ss', 'ss', 'ss\r\nsss\r\nssss', 8, 'Cultural', 'ss', 'b394f1c0280879beb70bc51813fe1f41-papelera-de-reciclaje-icono');

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
  ADD KEY `taller_id` (`taller_id`);

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
  ADD KEY `maestro_id` (`maestro_id`),
  ADD KEY `taller_id` (`taller_id`),
  ADD KEY `alumno_id` (`alumno_id`);

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
  ADD KEY `mtro_asignado` (`mtro_asignado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mensajeadmin`
--
ALTER TABLE `mensajeadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `alumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `maestro_id` FOREIGN KEY (`maestro_id`) REFERENCES `maestro` (`id`),
  ADD CONSTRAINT `taller_id` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `taller` FOREIGN KEY (`taller`) REFERENCES `talleres` (`id`);

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  ADD CONSTRAINT `mensajemaestro_ibfk_1` FOREIGN KEY (`mtro_id`) REFERENCES `maestro` (`id`),
  ADD CONSTRAINT `mensajemaestro_ibfk_2` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`);

--
-- Filtros para la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD CONSTRAINT `talleres_ibfk_1` FOREIGN KEY (`mtro_asignado`) REFERENCES `maestro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
