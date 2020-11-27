-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2020 a las 02:08:24
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
  `rol_id` int(11) NOT NULL,
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `correo`, `password`, `CURP`, `img_profile`, `Token`, `rol_id`, `sexo`) VALUES
(1, 'Fernando Vela Leon', 'vela@yopmail.com', '$2y$10$zHWk33GV6ftHoOGVS1m/4ekJ8Jh.YUPNQCDBAKeajkt5CYAcneIdm', 'VELF971204MCCLRN01', '39134-1159060930.jpg', '', 1, 'M'),
(2, 'Johanes Balam García Fabian', 'fenderman6020@gmail.com', '$2y$10$fzhCcCs.PJiQREKn1.2mz.s.LIwLhW6QUq0TR/mBMC7UqgTDB0TY.', 'GAFJ751121HDFRBH00', 'default.jpg', '', 1, 'M'),
(3, 'Juan Rubén Ortega Granados', 'juan.og1@champoton.tecnm.mx', '$2y$10$WEhXMeFj5sWI7yM.ubuwPu1ZDUXWRDyD7qcGor29pmizQe6TTjRga', 'OEGJ921029HCCRRN03', 'default.jpg', '', 1, 'M'),
(4, 'Mariana Fabiola Góngora Dominguez', 'mariana.gd@champoton.tecnm.mx', '$2y$10$LAD2mz2WCqd31hvckMgIK.hk0d7e35oboFCKct6HFQKWz07IpIEb2', 'GODM880420MCCNMR00', 'default.jpg', '', 1, 'F'),
(5, 'José Antonio Castro Haydar', 'josep_portero1@hotmail.com', '$2y$10$YgqEFkjH0bnQbNog4Mhc3OJFz7sk1d7WYfbieLxM0Ly.8HSKYlh5.', 'CAHA830904HYNSYN03', 'default.jpg', '', 1, 'M');

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
('Monica Priscila Delgado Verdejo', 161080138, '$2y$10$xnuZAUsxrIWF7oWoOVsC6OWqkTEY36rfFHl58nIv67Ccfap6765B2', 4, 'Si', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Noveno', '161080138.pdf', 'F', 2),
('Jose Alberto Pech Villasis', 161080156, '$2y$10$xeX9BMfJ1zZ4r/J3k.a0H.XwKBrisvP/Dz9NwH7B7vybXaeKthH5q', 4, 'No', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Noveno', '', 'M', 2);

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
(1, 2, 4, 0, 'instrumentacionD', 'Lorna Alejandra Delgado Verdejo.pdf', '2020-11-25 17:54:04'),
(2, 2, 4, 161080138, 'evaluacionB', '161080138.pdf', '2020-11-25 17:54:27');

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
(1, 2, '8:00pm - 10:00pm', '8:00pm - 10:00pm', '8:00pm - 10:00pm', '0', '0', '0', '0', 'matutino'),
(2, 3, '8:30pm - 10:30pm', '8:30pm - 10:30pm', '0', '8:30pm - 10:30pm', '0', '0', '0', 'matutino'),
(3, 4, '7:30pm - 10:30pm', '0', '7:30pm - 10:30pm', '0', '0', '0', '0', 'matutino'),
(4, 5, '0', '0', '7:30pm - 09:00pm', '7:30pm - 09:00pm', '0', '0', '0', 'matutino'),
(5, 6, '0', '0', '7:00pm - 10:00pm', '7:00pm - 10:00pm', '0', '0', '0', 'matutino'),
(6, 7, '8:00pm - 10:00pm', '8:00pm - 10:00pm', '8:00pm - 10:00pm', '0', '0', '0', '0', 'matutino'),
(7, 8, '0', '8:00pm - 10:00pm', '8:00pm - 10:00pm', '8:00pm - 10:00pm', '0', '0', '0', 'matutino'),
(8, 9, '0', '0', '4:00pm- 7:00pm', '0', '0', '0', '0', 'matutino'),
(9, 9, '0', '9:00am - 12:00pm', '0', '0', '0', '0', '0', 'vespertino');

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
(2, 'Lorna Alejandra Delgado Verdejo', 'priscila_verdejo@outlook.com', '$2y$10$ceQpmgqy1Cbh4IQKCX0bOu3LpVpq3r6QoN.9r95gpu4vI/6K70slW', 4, 'DEVM971204MCCLRN01', '9821159667', 'F', '', 3);

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
(4, 'Prueba#3', '2020-10-06 15:24:07', 0, 0),
(5, 'Buenas tardes maestros, este miércoles no se retirara a la 1, así que no habrá talleres de 1pm a 3pm.', '2020-11-26 18:47:24', 0, 0),
(6, 'Prueba#5\r\n', '2020-11-26 19:00:48', 0, 0),
(7, 'Prueba #6\r\n', '2020-11-26 19:04:55', 0, 0),
(8, 'Prueba #6', '2020-11-26 19:06:51', 0, 0),
(9, 'prueba #7', '2020-11-26 19:07:52', 0, 0);

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
(1, 'Bienvenidos al taller de voleyball, la primera clase será en la escuela debido a circunstancias ajenas a mi. Nos vemos ahi, no falten.', '2020-11-25 17:41:07', 0, 2, 4);

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
(2, 'Futbol soccer', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Campo \"Cascareros\" U. D. \"Ulises Sansores\"', 'fut.png'),
(3, 'Basquetbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando basquetbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Cancha Duela U. D. \"Ulises Sansores\"', 'basket.png'),
(4, 'Voleibol de sala', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 2, 'Deportivo', 'Cancha techada #1 Usos múltiples U.D. \"Ulises Sansores\"', 'voleibol.png'),
(5, 'Escolta de Bandera', 'Itescham', 'En este taller aprenderás a marchar correctamente para honrar a nuestro labora patrio como se merece.', 1, 'Civico', 'Explanada de Usos Múltiples U.D. \"Ulises Sansores\"', 'escolta-400x334.png'),
(6, 'Banda de Guerra', 'Itescham', 'En este taller honrarás a nuestro lábaro patrio con los honores que se merece tocando al ritmo de nuestro himno nacional. ', 1, 'Civico', 'Cancha techada del Itescham', 'banda.png'),
(7, 'Muay-Thai', 'Los halcones del Itescham', 'En este taller te forjamos en el camino de la disciplina, amando y respetando el arte marcial.', 1, 'Deportivo', 'Gimnasio frente a la gasolinera de la U.D. \"Ulises Sansores\"', 'muaythai.png'),
(8, 'Beisbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando beisbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Calle 28 % 23 y 25 Col. Centro. \"Casa del instructor\"', 'beisbol.jpg'),
(9, 'Ajedrez', 'Los halcones del Itescham', 'Deporte es sinónimo de destreza y estrategia. ', 1, 'Deportivo', 'Aula 101/201. Itescham.', 'ajedrez.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajeadmin`
--
ALTER TABLE `mensajeadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
