-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2020 a las 04:17:47
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
=======
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 16:23:11
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
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
<<<<<<< HEAD
(1, 'Fernando Vela Leon', 'calidad@champoton.tecnm.mx', '$2y$10$f2ONFOKmbFv9n7J9hK/ebe/0/F670/unB40QgsuD/a.ueTD8cKFKm', 'VELF971204MCCLRN01', '39134-1159060930.jpg', '', 1, 'M'),
(2, 'Johanes Balam García Fabian', 'fenderman6020@gmail.com', '$2y$10$fzhCcCs.PJiQREKn1.2mz.s.LIwLhW6QUq0TR/mBMC7UqgTDB0TY.', 'GAFJ751121HDFRBH00', 'default.jpg', '', 1, 'M'),
(3, 'Juan Rubén Ortega Granados', 'juan.og1@champoton.tecnm.mx', '$2y$10$WEhXMeFj5sWI7yM.ubuwPu1ZDUXWRDyD7qcGor29pmizQe6TTjRga', 'OEGJ921029HCCRRN03', 'default.jpg', '', 1, 'M'),
(4, 'Mariana Fabiola Góngora Dominguez', 'mariana.gd@champoton.tecnm.mx', '$2y$10$LAD2mz2WCqd31hvckMgIK.hk0d7e35oboFCKct6HFQKWz07IpIEb2', 'GODM880420MCCNMR00', 'default.jpg', '', 1, 'F'),
(5, 'José Antonio Castro Haydar', 'josep_portero1@hotmail.com', '$2y$10$YgqEFkjH0bnQbNog4Mhc3OJFz7sk1d7WYfbieLxM0Ly.8HSKYlh5.', 'CAHA830904HYNSYN03', 'default.jpg', '', 1, 'M');
=======
(1, 'Fernando Vela Leon', 'calidad@champoton.tecnm.mx', '$2y$10$zHWk33GV6ftHoOGVS1m/4ekJ8Jh.YUPNQCDBAKeajkt5CYAcneIdm', 'VELF971204MCCLRN01', '34693ef9af3d01e6ab5d33e87def44a0.jpg', '', 1, 'M'),
(2, 'Johanes Balam García Fabian', 'fenderman6020@gmail.com', '$2y$10$fzhCcCs.PJiQREKn1.2mz.s.LIwLhW6QUq0TR/mBMC7UqgTDB0TY.', 'GAFJ751121HDFRBH00', 'default.jpg', '', 1, 'M'),
(3, 'Juan Rubén Ortega Granados', 'juan.og1@champoton.tecnm.mx', '$2y$10$WEhXMeFj5sWI7yM.ubuwPu1ZDUXWRDyD7qcGor29pmizQe6TTjRga', 'OEGJ921029HCCRRN03', 'default.jpg', '', 1, 'M'),
(4, 'Mariana Fabiola Góngora Dominguez', 'mariana.gd@champoton.tecnm.mx', '$2y$10$LAD2mz2WCqd31hvckMgIK.hk0d7e35oboFCKct6HFQKWz07IpIEb2', 'GODM880420MCCNMR00', 'default.jpg', '', 1, 'F'),
(5, 'José Antonio Castro Haydar', 'josep_portero1@hotmail.com', '$2y$10$YgqEFkjH0bnQbNog4Mhc3OJFz7sk1d7WYfbieLxM0Ly.8HSKYlh5.', 'CAHA830904HYNSYN03', 'default.jpg', '', 1, 'M'),
(6, 'monica verdejo', 'mpdverdejo@gmail.com', '$2y$10$9x4xVYVsAbvrsffRONjAO.ooefunUuhPMJTFQlvySWCW9j6OQWKcC', 'DEVM971204MCCLRN01', 'default.jpg', '', 1, 'F');
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

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
<<<<<<< HEAD
('Sin asignar', 0, '', 1, '', '', '', '', '', '', 2),
('Monica Priscila Delgado Verdejo', 161080138, '$2y$10$xnuZAUsxrIWF7oWoOVsC6OWqkTEY36rfFHl58nIv67Ccfap6765B2', 4, 'Si', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Noveno', '161080138.pdf', 'F', 2),
('jerry', 161080140, '$2y$10$8Xn4dgD/8Ryh02JUiJzFJefntiE1.ryLqh1EHND7KGRFkTTUylmTO', 3, 'Si', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Primero', '', 'M', 2),
('Jose Alberto Pech Villasis', 161080156, '$2y$10$xeX9BMfJ1zZ4r/J3k.a0H.XwKBrisvP/Dz9NwH7B7vybXaeKthH5q', 4, 'No', 'Ingeniería en Sistemas Computacionales', 'Cursando', 'Noveno', '', 'M', 2);
=======
('Sin asignar', 0, '', 1, '', '', '', '', '', '', 2);
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

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

<<<<<<< HEAD
--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `maestro_id`, `taller_id`, `alumno_id`, `categoria`, `documento`, `fecha`) VALUES
(14, 2, 3, 0, 'instrumentacionD', 'Fernando Vela Leon  2020-12-12.jpg', '2020-12-11 18:03:08'),
(15, 2, 3, 0, 'instrumentacionD', 'maestro1  2020-12-12.sql', '2020-12-11 18:04:12');

=======
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
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
<<<<<<< HEAD
(9, 9, '0', '9:00am - 12:00pm', '0', '0', '0', '0', '0', 'vespertino');
=======
(9, 9, '0', '9:00am - 12:00pm', '0', '0', '0', '0', '0', 'vespertino'),
(12, 2, '1', '1', '1', '1', '1', '1', '1', 'vespertino');
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
<<<<<<< HEAD
  `correo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
=======
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `taller_asignado` int(11) DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
<<<<<<< HEAD
  `telegram` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
=======
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
  `sexo` enum('F','M') COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestro`
--

<<<<<<< HEAD
INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `telegram`, `sexo`, `Token`, `rol_id`) VALUES
(1, 'Sin Asignar', '', '', 1, '', '', '', '', '', 3),
(2, 'maestro1', 'josepech0603@hotmail.com', '$2y$10$0aNH9AydUEHU1iIuIJZH6.zgf9jNS2bSX6ZFYD9X1ygzZhzEOCroG', 3, 'PEVA980306HCCCLL01', '', '', 'M', '', 3),
(6, 'jose villasis', 'josevillasis98@gmail.com', '$2y$10$882xLLaJxqon/hv7oDCdp.PCh6fzRrHH13Y7W8.yDOvUO7R6YJYVe', 5, 'PEVA980306HCCCLL06', '9812086859', '@jerrys_@.@', 'M', '', 3),
(7, 'Jose Alberto', 'testerfree98@gmail.com', '$2y$10$92oHcM.Ncmp2tjcISMNttO9tYAMpIMRvnOVbQgGfkIJ5paC00qjda', 7, 'PEVA980306HCCCLL07', '', '', 'M', '', 3);
=======
INSERT INTO `maestro` (`id`, `nombre`, `correo`, `password`, `taller_asignado`, `curp`, `telefono`, `sexo`, `Token`, `rol_id`) VALUES
(1, 'Sin Asignar', '', '', 1, '', '', '', '', 3),
(2, 'Lorna Alejandra Delgado Verdejo', 'esdeath@outlook.com', '$2y$10$NfVUS5EKK35vKp4t3imMW.ViuQax7yuFdKnMZvvN/pDDJJNuk5NBu', 4, 'DEVM971204MCCLRN01', '9821221654', 'F', '', 3);
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeadmin`
--

CREATE TABLE `mensajeadmin` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL,
<<<<<<< HEAD
  `admin_id` int(11) NOT NULL,
  `destinatario` varchar(30) COLLATE utf8_unicode_ci NOT NULL
=======
  `admin_id` int(11) NOT NULL
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajeadmin`
--

<<<<<<< HEAD
INSERT INTO `mensajeadmin` (`id`, `mensaje`, `fecha`, `estado`, `admin_id`, `destinatario`) VALUES
(9, 'jajajaaj', '2020-12-11 02:40:31', 0, 0, 'Todos'),
(10, 'xdxd', '2020-12-11 02:41:29', 0, 0, 'Lorna Alejandra Delgado Verdej'),
(11, 'prueba pro', '2020-12-11 02:43:13', 0, 0, 'maestro1'),
(12, 'pruebaaaaaaa', '2020-12-11 04:21:01', 0, 0, 'maestro1'),
(13, 'ttttttt', '2020-12-11 04:23:16', 0, 0, 'maestro1'),
(14, 'ttttttt', '2020-12-11 04:37:53', 0, 0, 'maestro1'),
(15, 'ttttttt', '2020-12-11 04:38:04', 0, 0, 'maestro1'),
(16, 'ttttttt', '2020-12-11 14:39:45', 0, 0, 'maestro1'),
(17, 'ggggg', '2020-12-11 14:44:22', 0, 0, 'maestro1'),
(18, 'bbbbb', '2020-12-11 14:54:15', 0, 0, 'maestro1'),
(19, 'tttttt', '2020-12-11 14:57:45', 0, 0, 'maestro1'),
(20, 'uuuuuu', '2020-12-11 14:58:46', 0, 0, 'maestro1'),
(21, 'nnnnnn', '2020-12-11 15:02:16', 0, 0, 'maestro1'),
(22, 'nnrrrrrrr', '2020-12-11 15:02:52', 0, 0, 'maestro1'),
(23, 'qqqqq', '2020-12-11 15:03:58', 0, 0, 'maestro1'),
(24, 'pppppp', '2020-12-11 15:05:09', 0, 0, 'maestro1'),
(25, '4333333', '2020-12-11 15:06:35', 0, 0, 'maestro1'),
(26, '9999', '2020-12-11 15:07:52', 0, 0, 'maestro1'),
(27, '77777', '2020-12-11 15:09:21', 0, 0, 'maestro1'),
(28, '66666', '2020-12-11 15:10:41', 0, 0, 'maestro1'),
(29, 'prrrro', '2020-12-11 15:15:42', 0, 0, 'maestro1'),
(30, 'jajajaj', '2020-12-11 15:18:27', 0, 0, 'maestro1'),
(31, 'mail1111', '2020-12-11 15:20:31', 0, 0, 'maestro1'),
(32, 'tttttt', '2020-12-11 15:21:32', 0, 0, 'maestro1'),
(33, 'gggg', '2020-12-11 15:33:15', 0, 0, 'maestro1'),
(34, 'pruebita1szdsd', '2020-12-11 16:09:29', 0, 0, 'maestro1'),
(35, 'hola de nuevo', '2020-12-11 16:11:34', 0, 0, 'maestro1'),
(36, 'ddddd', '2020-12-11 16:12:46', 0, 0, 'maestro1'),
(37, 'ttttttt', '2020-12-11 16:14:56', 0, 0, 'maestro1'),
(38, 'Todo bien todo correcto y yo que me alegro', '2020-12-11 16:16:55', 0, 0, 'maestro1'),
(39, 'todos1', '2020-12-11 16:50:10', 0, 0, 'Todos'),
(40, 'todos0', '2020-12-11 16:52:20', 0, 0, 'Todos'),
(41, 'todos0', '2020-12-11 16:52:46', 0, 0, 'Todos'),
(42, 'todos1', '2020-12-11 16:53:29', 0, 0, 'Todos'),
(43, 'todos1', '2020-12-11 16:54:07', 0, 0, 'Todos'),
(44, 'todos12', '2020-12-11 16:56:13', 0, 0, 'Todos'),
(45, 'todos123', '2020-12-11 16:58:00', 0, 0, 'Todos'),
(46, 'todos123', '2020-12-11 16:58:39', 0, 0, 'Todos'),
(47, 'todos123', '2020-12-11 17:02:31', 0, 0, 'maestro1'),
(48, 'todos123', '2020-12-11 17:02:31', 0, 0, 'maestro1'),
(49, 'prueba2', '2020-12-11 17:04:14', 0, 0, 'maestro1'),
(50, 'prueba3', '2020-12-11 17:04:52', 0, 0, 'maestro1'),
(51, 'hola', '2020-12-11 17:42:24', 0, 0, 'Todos'),
(52, 'hola', '2020-12-11 19:00:08', 0, 0, 'Todos'),
(53, 'hola', '2020-12-11 19:00:54', 0, 0, 'Todos'),
(54, 'hola', '2020-12-11 19:01:44', 0, 0, 'Todos'),
(55, 'hola', '2020-12-11 19:02:47', 0, 0, 'Todos'),
(56, 'hola', '2020-12-11 19:05:40', 0, 0, 'Todos'),
(57, 'hola', '2020-12-11 19:14:26', 0, 0, 'Todos'),
(58, 'hola', '2020-12-11 19:18:22', 0, 0, 'Todos'),
(59, 'fffff', '2020-12-11 19:25:33', 0, 0, 'Todos'),
(60, 'fffff', '2020-12-11 19:30:06', 0, 0, 'Todos'),
(61, '123456', '2020-12-11 19:43:40', 0, 0, 'Todos'),
(62, '123456566', '2020-12-11 19:53:36', 0, 0, 'Todos'),
(63, '123456566', '2020-12-11 20:01:33', 0, 0, 'Todos'),
(64, '123456566', '2020-12-11 20:13:31', 0, 0, 'Todos'),
(65, '123456566', '2020-12-11 20:14:33', 0, 0, 'Todos'),
(66, '123456566', '2020-12-11 20:19:10', 0, 0, 'Todos'),
(67, 'siii', '2020-12-11 20:21:43', 0, 0, 'Todos'),
(68, 'siii', '2020-12-11 20:23:21', 0, 0, 'Todos'),
(69, 'siiiddd', '2020-12-11 20:24:09', 0, 0, 'Todos'),
(70, 'siiiddd', '2020-12-11 20:36:54', 0, 0, 'Todos'),
(71, 'siiiddd', '2020-12-11 20:36:59', 0, 0, 'Todos'),
(72, 'siiiddd', '2020-12-11 20:37:12', 0, 0, 'Todos'),
(73, 'siiiddd', '2020-12-11 20:38:12', 0, 0, 'Todos'),
(74, 'siiiddd', '2020-12-11 20:50:45', 0, 0, 'Todos'),
(75, 'siiiddd', '2020-12-11 20:55:19', 0, 0, 'Todos'),
(76, 'siiiddd', '2020-12-11 20:58:32', 0, 0, 'Todos'),
(77, 'siiiddd', '2020-12-11 21:00:01', 0, 0, 'Todos'),
(78, 'siiiddd', '2020-12-11 21:00:28', 0, 0, 'Todos'),
(79, 'siiiddd', '2020-12-11 21:00:59', 0, 0, 'Todos'),
(80, 'fffff', '2020-12-11 21:07:01', 0, 0, 'Todos'),
(81, 'fffff', '2020-12-11 21:09:03', 0, 0, 'Todos'),
(82, 'fffff', '2020-12-11 21:09:25', 0, 0, 'Todos'),
(83, 'fffff', '2020-12-11 21:10:18', 0, 0, 'Todos'),
(84, 'fffff', '2020-12-11 21:11:43', 0, 0, 'Todos'),
(85, 'fffff', '2020-12-11 21:12:20', 0, 0, 'Todos'),
(86, 'fffff', '2020-12-11 21:13:29', 0, 0, 'Todos'),
(87, 'fffff', '2020-12-11 21:13:41', 0, 0, 'Todos'),
(88, 'general', '2020-12-11 21:14:40', 0, 0, 'Todos'),
(89, 'general', '2020-12-11 21:15:32', 0, 0, 'Todos');
=======
INSERT INTO `mensajeadmin` (`id`, `mensaje`, `fecha`, `estado`, `admin_id`) VALUES
(1, 'Que pedo? No te jala?', '2020-12-09 18:34:26', 0, 0);
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

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

<<<<<<< HEAD
--
-- Volcado de datos para la tabla `mensajemaestro`
--

INSERT INTO `mensajemaestro` (`id`, `mensaje`, `fecha`, `estado`, `mtro_id`, `taller_id`) VALUES
(2, 'perrro', '2020-12-11 00:02:04', 0, 4, 3),
(3, 'dgdgdgdg', '2020-12-11 00:02:33', 0, 4, 3);

=======
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e
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
<<<<<<< HEAD
(2, 'Futbol soccer', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 2, 'Deportivo', 'Campo \"Cascareros\" U. D. \"Ulises Sansores\"', 'fut.png'),
(3, 'Basquetbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando basquetbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Cancha Duela U. D. \"Ulises Sansores\"', 'basket.png'),
(4, 'Voleibol de sala', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Cancha techada #1 Usos múltiples U.D. \"Ulises Sansores\"', 'voleibol.png'),
(5, 'Escolta de Bandera', 'Itescham', 'En este taller aprenderás a marchar correctamente para honrar a nuestro labora patrio como se merece.', 6, 'Civico', 'Explanada de Usos Múltiples U.D. \"Ulises Sansores\"', 'escolta-400x334.png'),
(6, 'Banda de Guerra', 'Itescham', 'En este taller honrarás a nuestro lábaro patrio con los honores que se merece tocando al ritmo de nuestro himno nacional. ', 1, 'Civico', 'Cancha techada del Itescham', 'banda.png'),
(7, 'Muay-Thai', 'Los halcones del Itescham', 'En este taller te forjamos en el camino de la disciplina, amando y respetando el arte marcial.', 7, 'Deportivo', 'Gimnasio frente a la gasolinera de la U.D. \"Ulises Sansores\"', 'muaythai.png'),
(8, 'Beisbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando beisbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Calle 28 % 23 y 25 Col. Centro. \"Casa del instructor\"', 'beisbol.jpg'),
(9, 'Ajedrez', 'Los halcones del Itescham', 'Deporte es sinónimo de destreza y estrategia. ', NULL, 'Deportivo', 'Aula 101/201. Itescham.', 'ajedrez.jpg');
=======
(2, 'Futbol soccer', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Campo \"Cascareros\" U. D. \"Ulises Sansores\"', 'fut.png'),
(3, 'Basquetbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando basquetbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Cancha Duela U. D. \"Ulises Sansores\"', 'basket.png'),
(4, 'Voleibol de sala', 'Los halcones del Itescham', 'En este taller te divertirás jugando futbol al mismo tiempo que competirás para formar parte de la selección escolar.', 2, 'Deportivo', 'Cancha techada #1 Usos múltiples U.D. \"Ulises Sansores\"', 'voleibol.png'),
(5, 'Escolta de Bandera', 'Itescham', 'En este taller aprenderás a marchar correctamente para honrar a nuestro labora patrio como se merece.', NULL, 'Civico', 'Explanada de Usos Múltiples U.D. \"Ulises Sansores\"', 'escolta-400x334.png'),
(6, 'Banda de Guerra', 'Itescham', 'En este taller honrarás a nuestro lábaro patrio con los honores que se merece tocando al ritmo de nuestro himno nacional. ', NULL, 'Civico', 'Cancha techada del Itescham', 'banda.png'),
(7, 'Muay-Thai', 'Los halcones del Itescham', 'En este taller te forjamos en el camino de la disciplina, amando y respetando el arte marcial.', 1, 'Deportivo', 'Gimnasio frente a la gasolinera de la U.D. \"Ulises Sansores\"', 'muaythai.png'),
(8, 'Beisbol', 'Los halcones del Itescham', 'En este taller te divertirás jugando beisbol al mismo tiempo que competirás para formar parte de la selección escolar.', 1, 'Deportivo', 'Calle 28 % 23 y 25 Col. Centro. \"Casa del instructor\"', 'beisbol.jpg'),
(9, 'Ajedrez', 'Los halcones del Itescham', 'Deporte es sinónimo de destreza y estrategia. ', 1, 'Deportivo', 'Aula 101/201. Itescham.', 'ajedrez.jpg');
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

--
-- AUTO_INCREMENT de la tabla `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

--
-- AUTO_INCREMENT de la tabla `mensajeadmin`
--
ALTER TABLE `mensajeadmin`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

--
-- AUTO_INCREMENT de la tabla `mensajemaestro`
--
ALTER TABLE `mensajemaestro`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 8d06abd2f004197d53b1e8a5fef779b282ab521e

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
