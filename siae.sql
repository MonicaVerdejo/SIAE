-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 19:14:51
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
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_id` int(11) NOT NULL,
  `representativo` enum('Si','No') COLLATE utf8_unicode_ci NOT NULL,
  `carrera` enum('Turismo','Sistemas computacionales','Ambiental','Electromecanica','Gestion empresarial','Administracion','Logistica') COLLATE utf8_unicode_ci NOT NULL,
  `estatus` enum('Aprobado','Cursando','Reprobado') COLLATE utf8_unicode_ci NOT NULL,
  `semestre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `evaluacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `matricula`, `password`, `taller_id`, `representativo`, `carrera`, `estatus`, `semestre`, `evaluacion`, `sexo`, `rol_id`) VALUES
(1, 'Monica Priscila Delgado Verdejo', 161080138, '$2y$12$6S73epniGzTG5HLKkBWZpO4tyWe349/XroZ56UDICCAAjM1WSL4XG', 1, 'Si', 'Sistemas computacionales', 'Aprobado', 'Octavo', '', 'F', 2),
(2, 'Jose Alberto Pech Villasis', 161080156, '$2y$12$o.q0FeMmgOUuAxwWJIseeenVwnnCfQeOfULYuK.r0PmCNTqBn2s5i', 2, 'No', 'Sistemas computacionales', 'Reprobado', 'Octavo', '', 'M', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms`
--

CREATE TABLE `cms` (
  `img_index` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img_civico` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img_cultural` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img_deportivo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slider1` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slider2` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slider3` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Rommel Antonio Chi Lopez', 'rommel@yopmail.com', '$2y$12$5ut95DOWPJ/XGLSKShLm0e8SgjhOHMH4Lz.O3gY9uSYYUYaCWnfeS', 1, 'CILR971204MCCLRN01', '9821276466', 'M', '', 3),
(2, 'Luis Miranda', 'miranda@yopmail.com', '$2y$12$Gx5CdxGjsmWh.wQnHamv9elSzvpLMQ2EwR3ZVhCyqt0e/kUou8vry', 2, 'MIOL971204MCCLRN05', '9821276467', 'M', '', 3);

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
(1, 'Buenas tardes muchachos, se cancela la practica de hoy', '2020-08-10 03:51:58', 0, 1, 3),
(2, 'No asistiré, hagan 100 flexiones', '2020-08-10 03:54:17', 0, 1, 3),
(24, 'ptm ya enviate coño', '2020-08-12 17:26:08', 0, 1, 1),
(25, 'avers', '2020-08-12 17:50:26', 0, 1, 1),
(26, 'rewas', '2020-08-12 17:50:55', 0, 1, 3),
(27, 'erererererere', '2020-08-12 17:51:24', 0, 1, 3),
(29, 'sus rutinas apestan', '2020-08-12 18:14:17', 0, 1, 2),
(30, 'buenas tardes las rutinas empiezan tarde hoy', '2020-08-12 18:50:42', 0, 2, 2);

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
(1, 'Volleyball', 'Los halcones del itescham', 'En este taller aprenderás todo lo necesario para ser una estrella deportiva en el volleyball.', 'Lunes: 10am-12pm\r\nJueves: 3pm-5pm', 1, 'Deportivo', 'Unidad deportiva \'Ulises Sansores\'', ''),
(2, 'Porristas', 'Guerreros del ITESCHAM', '¿Quieres ser la siguiente Britney Allen? No lo dudes más y únete a nosotros.', 'Martes: 3pm-5pm\r\nMiercoles: 10am:12pm', 2, 'Cultural', 'Unidad deportiva \'Ulises Sansores\'', ''),
(3, 'Ajedrez', '', 'Juego aburrido que no deberia considerarse deporte', 'Miercoles: 3pm-5pm\r\nSabado: 6pm-7pm', 1, 'Deportivo', 'Aula 211, Tecnologico', '');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `taller_id` (`taller_id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

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
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
