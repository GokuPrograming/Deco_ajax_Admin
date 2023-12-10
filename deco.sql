-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2023 a las 02:00:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_lista_cursos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_usuario`, `id_lista_cursos`) VALUES
(85, 4, 50),
(317, 12, 49),
(322, 12, 50),
(323, 12, 60),
(324, 12, 52),
(325, 12, 53),
(326, 12, 56),
(327, 12, 59),
(329, 12, 58),
(381, 3, 59),
(382, 56, 59),
(383, 56, 58),
(421, 21, 50),
(422, 21, 52),
(423, 21, 53),
(424, 21, 49),
(472, 23, 57),
(474, 6, 50),
(484, 54, 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Programación'),
(2, 'Diseño Gráfico'),
(3, 'Ciencias'),
(4, 'Negocios'),
(5, 'Arte'),
(6, 'Música'),
(7, 'Idiomas'),
(8, 'Salud y Bienestar'),
(9, 'Cocina'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primer_apellido` varchar(60) NOT NULL,
  `segundo_apellido` varchar(60) NOT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `credit_card` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `primer_apellido`, `segundo_apellido`, `id_localidad`, `fecha_nacimiento`, `credit_card`, `id_usuario`) VALUES
(49, 'miguel', 'vera', 'franco', 1, '2023-11-06', 1, 52),
(50, 'wwwwww', 'wqwq', 'wsdsq', 1, '2023-11-20', 1, 53),
(51, 'valeria', 'Vera', 'Franco', 1, '2007-11-06', 1, 54),
(52, 'Dulce', 'Torres', 'Nieto', 1, '2023-11-01', 1, 55),
(53, 'Andrea', 'Guzma', 'Guzman', 1, '2023-11-22', 1, 56),
(54, 'dulce', 'maria', 'torres', 1, '2023-11-12', 1, 57),
(55, 'Jose Israel', 'Colesio', 'Maldonado', 1, '2001-11-08', 1, 58),
(56, 'Francisco Javier', 'Sánchez ', 'Rojas', 1, '2001-12-14', 1, 59),
(57, 'sda', 'dawd', 'dwad', 1, '2023-11-13', 1, 60),
(59, 'migu', 'qwq', 'swqas', 1, '2023-11-21', 1, 62),
(60, 'wwwwww', 'dsad', 'dsad', 1, '2017-02-01', 1, 63),
(62, 'sdada', 'dwdas', 'wedwqd', 1, '2023-11-01', 1, 65),
(63, 'Miguel', 'maria', 'Franco', 1, '2023-11-20', 1, 66),
(64, 'alejandro', 'garcia', 'Campos', 1, '2023-11-05', 1, 67),
(65, 'Miguel', 'sasdsa', 'Franco', 1, '2023-11-06', 1, 68),
(66, 'Miguel', 'dsad', 'Franco', 1, '2023-11-13', 1, 69),
(67, 'Miguel', 'wedsadsa', 'Franco', 1, '2023-11-06', 1, 70),
(68, 'Daniel', 'sdadas', 'Arreola', 1, '2023-11-13', 1, 71),
(69, 'Miguel', '1111', 'Franco', 1, '2023-11-13', 1, 72),
(70, 'asasdas', 'dsadas', 'dsad', 1, '2023-11-05', 1, 73),
(71, 'sas', 'sas', 'sas', 1, '2023-11-13', 1, 74),
(72, 'dsad', 'dsad', 'dsad', 1, '2023-11-05', 1, 75),
(73, 'Miguel', 'sadasd', 'Franco', 1, '2023-11-19', 1, 76),
(74, 'dsad', 'dsad', 'sadd', 1, '2023-11-12', 1, 77),
(75, 'sdada', 'dwdas', 'wedwqd', 1, '2023-11-01', 1, 78),
(76, 'dasd', 'sdas', 'dsad', 1, '2023-11-13', 1, 79),
(77, 'Ruben ', 'Torres', 'Frias', 1, '2023-11-01', 1, 80),
(78, 'o\'nill', 'dsad', 'dasd', 1, '2023-11-13', 1, 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_card`
--

CREATE TABLE `credit_card` (
  `id_credit_card` int(11) NOT NULL,
  `numero_tarjeta` int(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `fecha_vencimiento` year(4) NOT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `credit_card`
--

INSERT INTO `credit_card` (`id_credit_card`, `numero_tarjeta`, `cvv`, `fecha_vencimiento`, `tipo`) VALUES
(1, 2147483647, 123, '2023', 1),
(2, 2147483647, 456, '2024', 2),
(3, 2147483647, 789, '2024', 3),
(4, 2147483647, 321, '2025', 4),
(5, 2147483647, 654, '2025', 5),
(6, 2147483647, 987, '2026', 6),
(7, 2147483647, 123, '2027', 7),
(8, 2147483647, 456, '2023', 8),
(9, 2147483647, 789, '2024', 9),
(10, 2147483647, 321, '2025', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_comprados`
--

CREATE TABLE `cursos_comprados` (
  `id_cursos_coimprados` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_lista_cursos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos_comprados`
--

INSERT INTO `cursos_comprados` (`id_cursos_coimprados`, `id_usuario`, `id_lista_cursos`) VALUES
(128, 2, 50),
(129, 2, 52),
(130, 2, 60),
(131, 2, 53),
(142, 1, 50),
(143, 1, 52),
(144, 1, 53),
(145, 1, 54),
(146, 1, 49),
(147, 1, 57),
(159, 52, 60),
(160, 52, 59),
(161, 52, 50),
(162, 52, 52),
(163, 52, 54),
(164, 52, 58),
(165, 52, 53),
(166, 52, 57),
(167, 52, 56),
(168, 3, 53),
(169, 54, 50),
(170, 54, 49),
(171, 54, 53),
(172, 54, 57),
(173, 54, 55),
(174, 55, 50),
(175, 55, 49),
(176, 55, 53),
(177, 55, 57),
(178, 55, 56),
(179, 55, 59),
(180, 55, 60),
(181, 55, 58),
(182, 56, 49),
(183, 56, 50),
(184, 56, 52),
(185, 56, 53),
(186, 3, 52),
(187, 3, 50),
(188, 3, 60),
(189, 3, 61),
(190, 13, 58),
(191, 13, 50),
(192, 13, 49),
(193, 13, 54),
(194, 13, 55),
(195, 13, 59),
(196, 13, 60),
(197, 13, 61),
(198, 13, 52),
(199, 13, 53),
(200, 57, 52),
(201, 57, 50),
(202, 57, 53),
(203, 2, 59),
(204, 2, 61),
(205, 58, 55),
(206, 58, 56),
(207, 58, 60),
(208, 58, 61),
(209, 58, 59),
(210, 59, 49),
(211, 59, 50),
(212, 59, 53),
(213, 59, 60),
(214, 59, 59),
(219, 62, 50),
(220, 62, 52),
(221, 62, 53),
(222, 62, 57),
(223, 64, 52),
(224, 64, 50),
(225, 64, 53),
(226, 64, 49),
(227, 58, 52),
(228, 58, 50),
(229, 64, 59),
(230, 64, 56),
(231, 19, 49),
(232, 64, 60),
(233, 64, 57),
(234, 64, 61),
(235, 64, 55),
(236, 62, 61),
(237, 62, 60),
(238, 62, 59),
(239, 62, 54),
(240, 62, 58),
(241, 6, 52),
(242, 67, 50),
(243, 67, 60),
(244, 67, 52),
(245, 67, 53),
(246, 67, 55),
(247, 67, 54),
(248, 23, 50),
(249, 23, 52),
(250, 54, 52),
(251, 1, 56),
(252, 64, 54),
(253, 57, 56),
(254, 64, 58),
(255, 58, 53),
(256, 80, 50),
(257, 80, 52),
(258, 80, 49),
(259, 80, 53),
(260, 7, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_creados`
--

CREATE TABLE `cursos_creados` (
  `id_cursos_creados` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_lista_cursos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Nuevo Estado'),
(2, 'Estado 2'),
(3, 'Estado 3'),
(4, 'Estado 4'),
(5, 'Estado 5'),
(6, 'Estado 6'),
(7, 'Estado 7'),
(8, 'Estado 8'),
(9, 'Estado 9'),
(10, 'Estado 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `id_favoritos` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_lista_cursos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`id_favoritos`, `id_usuario`, `id_lista_cursos`) VALUES
(51, 4, 50),
(52, 1, 54),
(53, 4, 57),
(54, 2, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_curso`
--

CREATE TABLE `lista_curso` (
  `id_lista_cursos` int(11) NOT NULL,
  `titulo` varchar(300) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_curso`
--

INSERT INTO `lista_curso` (`id_lista_cursos`, `titulo`, `imagen`, `id_video`, `precio`, `id_categoria`, `id_usuario`) VALUES
(49, 'DISEÑO GRAFICO DESDE CERO A EXPERTO', 'curso1.jpg', 42, 2500, 2, 1),
(50, 'APRENDE A EDITAR VIDEO DE MANERA PROFESIONAL', 'Captura de pantalla 2023-08-11 232129.png', 43, 300, 10, 1),
(52, 'APRENDE A PROGRAMAR EN PYTHON(NIVEL BASICO)', 'APRENDE A PROGRAMAR EN PYTHON NIVEL BASICO.jpg', 44, 450, 1, 4),
(53, 'CURSO DE INGLES (SUPERA EL VERBO TO BE)', 'CURSO DE INGLES (SUPERA EL VERBO TO BE).jpeg', 44, 800, 7, 4),
(54, 'DOMINA LA TECNOLOGIA CON LA MUSICA', 'CURSO DE PRODUCCION MUSICAL AVANZADO.jpg', 44, 800, 6, 4),
(55, 'CURSO DE PRODUCCION MUSICAL', 'CURSO DE PRODUCCION MUSICAL.jpg', 44, 1212, 6, 4),
(56, 'CURSO TECNICO EN COCINA GASTRONOMIA', 'CURSO TECNICO EN COCINA GASTRONOMIA.jpeg', 44, 1200, 9, 4),
(57, 'ESCUELA DE GASTRONOMIA', 'ESCUELA DE GASTRONOMIA.png', 44, 2500, 9, 4),
(58, 'GASTRONOMIA ONLINE(CURSO COMPLETO)', 'GASTRONOMIA ONLINE(CURSO COMPLETO).jpg', 44, 2600, 9, 4),
(59, 'Aprende a realizar analisis de mercado', 'Empresa-de-correccion-de-textos.jpg', 45, 12323, 4, 4),
(60, 'dsadas', 'abstract-design-1080p-hd-wallpaper-preview.jpg', 46, 100000, 3, 2),
(61, 'curso x', '42735088-brócoli-amarillo-en-una-mesa-de-madera-la-vida-sigue-rústico.jpg', 46, 2222, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id_localidad`, `localidad`, `id_municipio`) VALUES
(1, 'Nueva Localidad', 1),
(2, 'Localidad 2', 1),
(3, 'Localidad 3', 2),
(4, 'Localidad 4', 2),
(5, 'Localidad 5', 3),
(6, 'Localidad 6', 3),
(7, 'Localidad 7', 4),
(8, 'Localidad 8', 4),
(9, 'Localidad 9', 5),
(10, 'Localidad 10', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `municipio` varchar(60) NOT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `municipio`, `id_estado`) VALUES
(1, 'Nuevo Municipio', 1),
(2, 'Municipio 2', 1),
(3, 'Municipio 3', 2),
(4, 'Municipio 4', 2),
(5, 'Municipio 5', 3),
(6, 'Municipio 6', 3),
(7, 'Municipio 7', 4),
(8, 'Municipio 8', 4),
(9, 'Municipio 9', 5),
(10, 'Municipio 10', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Instructor'),
(4, 'Invitado'),
(5, 'Cliente'),
(6, 'Moderador'),
(7, 'Editor'),
(8, 'Superusuario'),
(9, 'Suscriptor'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_credit_card`
--

CREATE TABLE `tipo_credit_card` (
  `id_tipo_credit_card` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_credit_card`
--

INSERT INTO `tipo_credit_card` (`id_tipo_credit_card`, `tipo`) VALUES
(1, 'Visa'),
(2, 'MasterCard'),
(3, 'American Express'),
(4, 'Discover'),
(5, 'Diners Club'),
(6, 'JCB'),
(7, 'Maestro'),
(8, 'Visa Electron'),
(9, 'UnionPay'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `password`, `id_rol`) VALUES
(1, 'a@b.com', '202cb962ac59075b964b07152d234b70', 2),
(2, '20030218@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(3, 'jesush2o@live.com.mx', '202cb962ac59075b964b07152d234b70', 1),
(4, 'instructor@example.com', '202cb962ac59075b964b07152d234b70', 2),
(5, 'cliente@example.com', '202cb962ac59075b964b07152d234b70', 2),
(6, 'moderador@example.com', '202cb962ac59075b964b07152d234b70', 6),
(7, 'editor@example.com', '202cb962ac59075b964b07152d234b70', 2),
(8, 'superusuario@example.com', '202cb962ac59075b964b07152d234b70', 8),
(9, 'suscriptor@example.com', '202cb962ac59075b964b07152d234b70', 9),
(10, 'invitado@example.com', '202cb962ac59075b964b07152d234b70', 4),
(11, 'a@c.com', '202cb962ac59075b964b07152d234b70', 1),
(12, 'a@c', '202cb962ac59075b964b07152d234b70', 1),
(13, 'gloriafranco924@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(14, 'miguel', '202cb962ac59075b964b07152d234b70', 1),
(15, 'Miguel', '202cb962ac59075b964b07152d234b70', 1),
(16, '19031725@it333elaya.edu.mx', '202cb962ac59075b964b07152d234b70', 1),
(17, '19031725@itceldfsdfsdfaya.edu.mx', '202cb962ac59075b964b07152d234b70', 1),
(18, '19031725@itceldfsdfsdfaya.edu.mx', '202cb962ac59075b964b07152d234b70', 1),
(19, '19031725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 1),
(20, 'andrea@Guzman.com', '202cb962ac59075b964b07152d234b70', 1),
(21, 'andrea@Guzman.com', '202cb962ac59075b964b07152d234b70', 2),
(22, 'andrea@Guzman.com', '202cb962ac59075b964b07152d234b70', 2),
(23, 'am@mmm.com', '202cb962ac59075b964b07152d234b70', 2),
(24, 'am@mmm.com', '202cb962ac59075b964b07152d234b70', 2),
(25, 'am@mmm.com', '202cb962ac59075b964b07152d234b70', 2),
(26, '19031725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(27, '19031725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(28, 'ssss@sssssssss.com', '202cb962ac59075b964b07152d234b70', 2),
(29, '19031725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(30, '19031725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(31, '19031725@itcsasasasasya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(32, '19031725@itc123123123123213123sasya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(33, 'a@123123213123sasya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(34, 'a@12psosa3123sasya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(35, '1903wwwww1725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(36, '1903wgwegsfwdw1725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(37, '1903wgwegsfwssssdw1725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(38, '1903wgwegsfwssssdwwww1725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(39, 'a@oooo.com', '202cb962ac59075b964b07152d234b70', 2),
(40, 'aaaa@aaaa.com', '202cb962ac59075b964b07152d234b70', 2),
(41, 'igue@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(42, 'a@b.cossasasasasam', '202cb962ac59075b964b07152d234b70', 2),
(43, '12312', '202cb962ac59075b964b07152d234b70', 2),
(44, 'wqwq@qqqqqqq.comcmc', '202cb962ac59075b964b07152d234b70', 2),
(45, 'qqqqq@sssss.col,mccmc.cmc', '202cb962ac59075b964b07152d234b70', 2),
(46, 'igusasasasasasasase@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(47, '19031725@sasassasadsditcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(48, '190dsaaaaas3wgwegsfwssssdwwww1725@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(49, 'dasdasdjkasdHFiuasdnda@csjadjsacom', '202cb962ac59075b964b07152d234b70', 2),
(50, 'a@g.com', '202cb962ac59075b964b07152d234b70', 2),
(51, 'm@a.com', '202cb962ac59075b964b07152d234b70', 2),
(52, 'jesus.salinas.le.9@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(53, 'kjhhgfgdfhgfhgjkfjyghjjji', '202cb962ac59075b964b07152d234b70', 2),
(54, 'valeriaverafranco996@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(55, 'torresnietodulce@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(56, '20031962@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(57, 'dulcemarianietotorres149@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(58, 'maldonadojoseisrael@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(59, '20030302@itcelaya.edu.mx', '52c1cbec1930ca8b42c835c10a25ec80', 2),
(60, 'prueba@gmial', '202cb962ac59075b964b07152d234b70', 1),
(61, 'sdasdasdasdasdasda', '202cb962ac59075b964b07152d234b70', 1),
(62, 'ronbot1223@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(63, 'j@j', '202cb962ac59075b964b07152d234b70', 2),
(64, 'verafrancomiguel1d@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(65, 'aaaaaaaaa@dsfsafasfasfasfasfasf.com', '202cb962ac59075b964b07152d234b70', 2),
(66, '18032105@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 2),
(67, 'alejandro_gam_gar@hotmail.com', '202cb962ac59075b964b07152d234b70', 2),
(68, 'asddddd@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(69, 'sadsadasd', '202cb962ac59075b964b07152d234b70', 2),
(70, 'verafrancosasmiguel1d@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(71, 'sdadasdasd', '4e05549202ece8ef2450019692d1829e', 2),
(72, 'qqqqq', '202cb962ac59075b964b07152d234b70', 2),
(73, 'assa', '202cb962ac59075b964b07152d234b70', 2),
(74, 'verafrancomiguel1dgmail.com', '41a8b8517c272ee2f7d33dd88e05ac18', 2),
(75, 'dsadas', '50d8c38b8ce2eb713600686b90a96ca3', 2),
(76, 'verafgmail', '50d8c38b8ce2eb713600686b90a96ca3', 2),
(77, 'asdsadsadas', '81c4636a66c334b727b10aa958f8d90a', 2),
(78, 'sasasdsa', '81c4636a66c334b727b10aa958f8d90a', 2),
(79, 'asdas@djsadasd.com', '50d8c38b8ce2eb713600686b90a96ca3', 2),
(80, 'isctorres@gmail.com', '50d8c38b8ce2eb713600686b90a96ca3', 2),
(81, 'isctorresddd@gmail.com', '50d8c38b8ce2eb713600686b90a96ca3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_lista_cursos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `porcentaje_descuento` decimal(10,0) DEFAULT NULL,
  `id_paypal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_usuario`, `id_lista_cursos`, `fecha`, `porcentaje_descuento`, `id_paypal`) VALUES
(11, 2, 50, '2023-10-20', 0, NULL),
(12, 2, 52, '2023-10-20', 0, NULL),
(13, 2, 60, '2023-10-20', 0, NULL),
(14, 2, 53, '2023-10-20', 0, NULL),
(15, 13, 52, '2023-11-10', NULL, NULL),
(16, 13, 53, '2023-11-10', NULL, NULL),
(17, 13, 57, '2023-11-10', NULL, NULL),
(18, 13, 56, '2023-11-10', NULL, NULL),
(19, 13, 55, '2023-11-10', NULL, NULL),
(20, 13, 54, '2023-11-10', NULL, NULL),
(21, 13, 59, '2023-11-10', NULL, NULL),
(22, 13, 60, '2023-11-10', NULL, NULL),
(23, 13, 61, '2023-11-10', NULL, NULL),
(24, 13, 49, '2023-11-10', NULL, NULL),
(25, 13, 50, '2023-11-10', NULL, NULL),
(26, 52, 60, '2023-11-09', NULL, NULL),
(27, 52, 59, '2023-11-10', NULL, NULL),
(28, 52, 50, '2023-11-05', NULL, NULL),
(29, 52, 52, '2023-11-10', NULL, NULL),
(30, 52, 54, '2023-11-03', NULL, NULL),
(31, 52, 58, '2023-10-11', NULL, NULL),
(32, 52, 53, '2023-11-10', NULL, NULL),
(33, 52, 57, '2023-11-10', NULL, NULL),
(34, 52, 56, '2023-11-10', NULL, NULL),
(35, 3, 53, '2023-11-12', NULL, NULL),
(36, 54, 50, '2023-11-12', NULL, NULL),
(37, 54, 49, '2023-11-12', NULL, NULL),
(38, 54, 53, '2023-11-12', NULL, NULL),
(39, 54, 57, '2023-11-12', NULL, NULL),
(40, 54, 55, '2023-11-12', NULL, NULL),
(41, 55, 50, '2023-11-12', NULL, NULL),
(42, 55, 49, '2023-11-12', NULL, NULL),
(43, 55, 53, '2023-11-12', NULL, NULL),
(44, 55, 57, '2023-11-10', NULL, NULL),
(45, 55, 56, '2023-11-12', NULL, NULL),
(46, 55, 59, '2023-11-12', NULL, NULL),
(47, 55, 60, '2023-11-12', NULL, NULL),
(48, 55, 58, '2023-11-12', NULL, NULL),
(49, 56, 49, '2023-11-12', NULL, NULL),
(50, 56, 50, '2023-11-12', NULL, NULL),
(51, 56, 52, '2023-11-12', NULL, NULL),
(52, 56, 53, '2023-11-12', NULL, NULL),
(53, 3, 52, '2023-11-12', NULL, NULL),
(54, 3, 50, '2023-11-12', NULL, NULL),
(55, 3, 60, '2023-11-12', NULL, NULL),
(56, 3, 61, '2023-11-12', NULL, NULL),
(57, 13, 58, '2023-11-12', NULL, NULL),
(58, 13, 50, '2023-11-12', NULL, NULL),
(59, 13, 49, '2023-11-12', NULL, NULL),
(60, 13, 54, '2023-11-12', NULL, NULL),
(61, 13, 55, '2023-11-12', NULL, NULL),
(62, 13, 59, '2023-11-12', NULL, NULL),
(63, 13, 60, '2023-11-12', NULL, NULL),
(64, 13, 61, '2023-11-12', NULL, NULL),
(65, 13, 52, '2023-11-12', NULL, NULL),
(66, 13, 53, '2023-11-12', NULL, NULL),
(67, 57, 52, '2023-11-13', NULL, NULL),
(68, 57, 50, '2023-11-13', NULL, NULL),
(69, 57, 53, '2023-11-13', NULL, NULL),
(70, 2, 59, '2023-11-13', NULL, NULL),
(71, 2, 61, '2023-11-13', NULL, NULL),
(72, 58, 55, '2023-11-13', NULL, NULL),
(73, 58, 56, '2023-11-13', NULL, NULL),
(74, 58, 60, '2023-11-13', NULL, NULL),
(75, 58, 61, '2023-11-13', NULL, NULL),
(76, 58, 59, '2023-11-13', NULL, NULL),
(77, 59, 49, '2023-11-13', NULL, NULL),
(78, 59, 50, '2023-11-13', NULL, NULL),
(79, 59, 53, '2023-11-13', NULL, NULL),
(80, 59, 60, '2023-11-13', NULL, NULL),
(81, 59, 59, '2023-11-13', NULL, NULL),
(82, 61, 52, '2023-11-14', NULL, NULL),
(83, 61, 60, '2023-11-14', NULL, NULL),
(84, 61, 59, '2023-11-14', NULL, NULL),
(85, 61, 58, '2023-11-14', NULL, NULL),
(86, 62, 50, '2023-11-14', NULL, NULL),
(87, 62, 52, '2023-11-14', NULL, NULL),
(88, 62, 53, '2023-11-14', NULL, NULL),
(89, 62, 57, '2023-11-14', NULL, NULL),
(90, 64, 52, '2023-11-16', NULL, NULL),
(91, 64, 50, '2023-11-16', NULL, NULL),
(92, 64, 53, '2023-11-16', NULL, NULL),
(93, 64, 49, '2023-11-16', NULL, NULL),
(94, 58, 52, '2023-11-18', NULL, NULL),
(95, 58, 50, '2023-11-18', NULL, NULL),
(96, 64, 59, '2023-11-25', NULL, NULL),
(97, 64, 56, '2023-11-25', NULL, NULL),
(98, 19, 49, '2023-11-27', NULL, '6KP44793HY697514J'),
(99, 64, 60, '2023-11-27', NULL, '3JW902224G627794K'),
(100, 64, 57, '2023-11-27', NULL, '3JW902224G627794K'),
(101, 64, 61, '2023-11-27', NULL, '8T546882R6254200B'),
(102, 64, 55, '2023-11-27', NULL, '8A511137HN563331P'),
(103, 62, 61, '2023-11-27', NULL, '8VU08079R9797444H'),
(104, 62, 60, '2023-11-27', NULL, '9DV45525NF545500K'),
(105, 62, 59, '2023-11-27', NULL, '3J335925X31210818'),
(106, 62, 54, '2023-11-27', NULL, '87M04213FE057721S'),
(107, 62, 58, '2023-11-27', NULL, '6G778713EU040673K'),
(108, 6, 52, '2023-11-27', NULL, '40V08315XS044020S'),
(109, 67, 50, '2023-11-27', NULL, '0SN038482P384311J'),
(110, 67, 60, '2023-11-27', NULL, '0SN038482P384311J'),
(111, 67, 52, '2023-11-27', NULL, '43M69151A9484261K'),
(112, 67, 53, '2023-11-27', NULL, '43M69151A9484261K'),
(113, 67, 55, '2023-11-27', NULL, '0EL15894XA671402K'),
(114, 67, 54, '2023-11-27', NULL, '0EL15894XA671402K'),
(115, 23, 50, '2023-11-27', NULL, '8UF62905KJ749033G'),
(116, 23, 52, '2023-11-27', NULL, '8UF62905KJ749033G'),
(117, 54, 52, '2023-11-28', NULL, '6GM34625RK406291G'),
(118, 1, 56, '2023-11-29', NULL, '0ME18360G9573071C'),
(119, 64, 54, '2023-11-29', NULL, '2NH045532F149891V'),
(120, 57, 56, '2023-11-29', NULL, '1N461246FU215153E'),
(121, 64, 58, '2023-11-29', NULL, '3R730047YW928503B'),
(122, 58, 53, '2023-11-29', NULL, '6B7328935E818722M'),
(123, 80, 50, '2023-11-29', NULL, '5NM9959672146193M'),
(124, 80, 52, '2023-11-29', NULL, '5X936802V11538041'),
(125, 80, 49, '2023-11-29', NULL, '5X936802V11538041'),
(126, 80, 53, '2023-11-29', NULL, '5X936802V11538041'),
(127, 7, 53, '2023-12-04', NULL, '9FK12021MM467752B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_vuideo` int(11) NOT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `video` varchar(300) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_vuideo`, `imagen`, `titulo`, `descripcion`, `video`, `id_usuario`) VALUES
(42, 'reuniones-online-1.jpg', 'Curso3Video3', 'se llama emilio', 'apuntele biemn.mp4', 1),
(43, 'capsule_616x353.jpg', 'el emilio ', 'se llama emilio', '10 SEGUNDOS M?S TARDE __ CARTEL DE TIEMPO HD __ BOB ESPONJA.mp4', 1),
(44, 'APRENDE A PROGRAMAR EN PYTHON NIVEL BASICO.jpg', 'PYTHON CONCEPTOS BASICOS', 'APRENDERAAS LO BASICO PARA APRENDER A INSTALAR PYTHON ', 'Cyberpunk Hola! Moment.mp4', 4),
(45, 'capsule_616x353.jpg', 'video1', 'se llama emilio', 'Te la rifaste Fernando.mp4', 4),
(46, 'a.png', 'Miguelk', 'dsad', 'A AA AAA AAAA AAAAA AAAAAA AAAAAAA AAAAAAAA AAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA A 360.mp4', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `carrito_usuario_fk` (`id_usuario`),
  ADD KEY `carrito_lista_cursos_fk` (`id_lista_cursos`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cliente_creditCardlFk` (`credit_card`),
  ADD KEY `cliente_usuariolfk` (`id_usuario`),
  ADD KEY `cliente_localidad` (`id_localidad`);

--
-- Indices de la tabla `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id_credit_card`),
  ADD KEY `creditCardFK` (`tipo`);

--
-- Indices de la tabla `cursos_comprados`
--
ALTER TABLE `cursos_comprados`
  ADD PRIMARY KEY (`id_cursos_coimprados`),
  ADD KEY `cursos_comprados_usuarioFK` (`id_usuario`),
  ADD KEY `cursos_comprados_lista_cursosFK` (`id_lista_cursos`);

--
-- Indices de la tabla `cursos_creados`
--
ALTER TABLE `cursos_creados`
  ADD PRIMARY KEY (`id_cursos_creados`),
  ADD KEY `cursos_creados_usuarioFK` (`id_usuario`),
  ADD KEY `cursos_creados_lista_cursosFK` (`id_lista_cursos`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id_favoritos`),
  ADD KEY `favorito_usuarioFK` (`id_usuario`),
  ADD KEY `favorito_lista_cursosFK` (`id_lista_cursos`);

--
-- Indices de la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
  ADD PRIMARY KEY (`id_lista_cursos`),
  ADD KEY `lista_categoria` (`id_categoria`),
  ADD KEY `lista_usuario_fk` (`id_usuario`),
  ADD KEY `FK_listacurso_video` (`id_video`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_localidad`),
  ADD KEY `localidad_Fk` (`id_municipio`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `municipio_fk` (`id_estado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_credit_card`
--
ALTER TABLE `tipo_credit_card`
  ADD PRIMARY KEY (`id_tipo_credit_card`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_rolfk` (`id_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `favorito_usuariosFK` (`id_usuario`),
  ADD KEY `favorito_lista_cursossFK` (`id_lista_cursos`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_vuideo`),
  ADD KEY `fk_usuario_id` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id_credit_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cursos_comprados`
--
ALTER TABLE `cursos_comprados`
  MODIFY `id_cursos_coimprados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `cursos_creados`
--
ALTER TABLE `cursos_creados`
  MODIFY `id_cursos_creados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favoritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
  MODIFY `id_lista_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_credit_card`
--
ALTER TABLE `tipo_credit_card`
  MODIFY `id_tipo_credit_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_vuideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_lista_cursos_fk` FOREIGN KEY (`id_lista_cursos`) REFERENCES `lista_curso` (`id_lista_cursos`),
  ADD CONSTRAINT `carrito_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_creditCardlFk` FOREIGN KEY (`credit_card`) REFERENCES `credit_card` (`id_credit_card`),
  ADD CONSTRAINT `cliente_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`),
  ADD CONSTRAINT `cliente_usuariolfk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `creditCardFK` FOREIGN KEY (`tipo`) REFERENCES `tipo_credit_card` (`id_tipo_credit_card`);

--
-- Filtros para la tabla `cursos_comprados`
--
ALTER TABLE `cursos_comprados`
  ADD CONSTRAINT `cursos_comprados_lista_cursosFK` FOREIGN KEY (`id_lista_cursos`) REFERENCES `lista_curso` (`id_lista_cursos`),
  ADD CONSTRAINT `cursos_comprados_usuarioFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cursos_creados`
--
ALTER TABLE `cursos_creados`
  ADD CONSTRAINT `cursos_creados_lista_cursosFK` FOREIGN KEY (`id_lista_cursos`) REFERENCES `lista_curso` (`id_lista_cursos`),
  ADD CONSTRAINT `cursos_creados_usuarioFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_lista_cursosFK` FOREIGN KEY (`id_lista_cursos`) REFERENCES `lista_curso` (`id_lista_cursos`),
  ADD CONSTRAINT `favorito_usuarioFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
  ADD CONSTRAINT `FK_listacurso_video` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_vuideo`) ON DELETE CASCADE,
  ADD CONSTRAINT `lista_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `lista_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_Fk` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_fk` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_rolfk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `favorito_lista_cursossFK` FOREIGN KEY (`id_lista_cursos`) REFERENCES `lista_curso` (`id_lista_cursos`),
  ADD CONSTRAINT `favorito_usuariosFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
