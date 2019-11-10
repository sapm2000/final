-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2019 a las 16:01:11
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atleta`
--

CREATE TABLE `atleta` (
  `id` int(11) NOT NULL,
  `nac` varchar(1) NOT NULL,
  `cedula` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `f_nac` date NOT NULL,
  `tipos` varchar(3) NOT NULL,
  `estadoc` varchar(10) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `n_tel` varchar(11) NOT NULL,
  `n_eme` varchar(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_calzado` int(11) NOT NULL,
  `altura` varchar(4) NOT NULL,
  `peso` varchar(6) NOT NULL,
  `mano` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atleta`
--

INSERT INTO `atleta` (`id`, `nac`, `cedula`, `nombre`, `apellido`, `f_nac`, `tipos`, `estadoc`, `sexo`, `id_nivel`, `correo`, `n_tel`, `n_eme`, `id_municipio`, `id_parroquia`, `direccion`, `activo`, `id_talla`, `id_calzado`, `altura`, `peso`, `mano`) VALUES
(1, 'V', 30426947, 'FREDDERICK', 'HERNANDEZ', '2004-07-06', 'O+', 'SOLTERO/A', 'M', 1, 'DASDAD@ASDS.COM', '12345678900', '00987654321', 13, 19, 'ASDA', 2, 8, 6, '110', '90.0', 'DIESTRO'),
(2, 'V', 27758852, 'MARYORITH', 'SINGER', '2000-05-05', 'O+', 'SOLTERO/A', 'F', 3, 'MARYORITHSINGER05@GMAIL.COM', '04125084544', '04245222312', 1, 1, 'FINAL CALLE 28 CON 14 AV.', 2, 0, 0, '', '', ''),
(3, 'V', 26943430, 'SAMUEL', 'PEREZ', '2000-01-06', 'O+', 'SOLTERO/A', 'M', 3, '8@SADSA.COM', '04245222312', '04125084544', 11, 17, '2 AV.', 2, 5, 6, '171', '50.0', 'DIESTRO'),
(4, 'V', 1234567, 'FSDFS', 'SDFDSFS', '2000-06-12', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 8, 5, '123', '12', ''),
(5, 'E', 7590456, 'ADSAD', 'ASDADAS', '2000-06-01', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 5, 5, '123', '12.5', 'DIESTRO'),
(6, 'V', 1478558, 'XCZCZXC', 'ZXCZXCZXC', '2019-10-06', 'B-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 5, 5, '', '', ''),
(7, 'V', 5145789, 'ASDASD', 'ALVAREZ', '2019-10-13', 'O+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(8, 'V', 12745678, 'ASD', 'ALVAREZ', '2019-09-30', 'B+', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(9, 'V', 12345685, 'ASASASAS', 'XXXXXX', '2019-10-10', 'B-', 'CASADO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(10, 'V', 22222222, 'ASAAAA', 'SSS', '2019-10-03', 'O+', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(11, 'V', 22455478, 'J', 'J', '2019-10-06', 'AB+', 'CASADO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(12, 'V', 2222444, 'MARIA', 'MJ', '2019-10-20', 'B-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(13, 'V', 2323232, 'AASAA', 'SSSS', '2019-10-13', 'O-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(14, 'V', 33333333, 'ASWQ', 'SASW', '2019-10-07', 'O-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(15, 'V', 25487878, 'ASASASAS', 'ASAS', '2019-10-01', 'O+', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(16, 'V', 23156165, 'ASASASASASAS', 'WWWW', '2019-10-15', 'O-', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(17, 'V', 24578964, 'EEEEE', 'EEE', '2019-10-11', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(18, 'V', 66666666, 'B', 'V', '2019-09-29', 'B-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(19, 'V', 21455412, 'SDSDSDSDS', 'SDSDSD', '2019-10-08', 'B-', 'CASADO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(20, 'V', 23564652, 'AS', 'ASAS', '2019-10-13', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(21, 'V', 2221544, 'ASDASDA', 'ASDAS', '2019-10-20', 'AB+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(22, 'V', 55454545, 'MARIA', 'MJ', '2019-09-30', 'AB+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(23, 'V', 4561234, 'ASASASAS', 'ALVAREZ', '2019-09-30', 'O+', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(24, 'V', 3254875, 'D', 'MJ', '2019-10-22', 'AB-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(25, 'V', 12345679, 'D', 'D', '2019-09-22', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(26, 'V', 2457896, 'SADADA', 'ASDASD', '2019-10-09', 'O+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(27, 'V', 2457887, 'MMMM', 'SSSS', '2019-09-30', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(28, 'V', 32548778, 'MASDASASAS', 'ASASASASAS', '2019-10-22', 'AB+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(29, 'V', 2144574, 'MARYORITH NAZARETH', 'SINGER MUJICA', '2019-10-13', 'AB+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atleta_representante`
--

CREATE TABLE `atleta_representante` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_representante` int(11) NOT NULL,
  `id_parentezco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atleta_representante`
--

INSERT INTO `atleta_representante` (`id`, `id_atleta`, `id_representante`, `id_parentezco`) VALUES
(3, 3, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `banco`) VALUES
(6, 'BANCO DE VENEZUELA'),
(13, 'BANCO DEL TESORO'),
(14, 'BANCO ESPIRITU SANTO'),
(11, 'BANCO EXTERIOR'),
(16, 'BANCO FONDO COMUN'),
(12, 'BANCO MERCANTIL'),
(15, 'BANCO NACIONAL DE CREDITO'),
(8, 'BANCO PROVINCIAL'),
(7, 'BANCO SOFITASA'),
(10, 'BANCO VENEZOLANO DE CREDITO'),
(9, 'BANESCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE `becas` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `monto` double NOT NULL,
  `disc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becas`
--

INSERT INTO `becas` (`id`, `id_atleta`, `monto`, `disc`) VALUES
(1, 4, 1232313, 'GIMNASIA'),
(2, 5, 132131, 'AJEDREZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_gloria`
--

CREATE TABLE `becas_gloria` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `monto` double NOT NULL,
  `disc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becas_gloria`
--

INSERT INTO `becas_gloria` (`id`, `id_atleta`, `monto`, `disc`) VALUES
(1, 1, 1234, 'AJEDREZ'),
(2, 2, 34535, 'GIMNASIA'),
(3, 3, 53453, 'BOLAS CRIOLLAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_mes`
--

CREATE TABLE `becas_mes` (
  `id` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `montoT` float NOT NULL,
  `becados` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `gloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becas_mes`
--

INSERT INTO `becas_mes` (`id`, `fecha`, `montoT`, `becados`, `nombre`, `gloria`) VALUES
(1, '2019-11-09', 17500, 3, 'HOLA', 0),
(2, '2019-11-12', 89222, 3, 'W', 0),
(3, '2019-11-12', 89222, 3, '2', 0),
(4, '2019-11-21', 1000, 1, 'F', 0),
(7, '2019-11-18', 87988, 2, 'D', 0),
(8, '2019-11-18', 87988, 2, 'DD', 0),
(9, '2019-11-11', 3702, 3, 'FSDFS', 0),
(10, '2019-11-19', 3702, 3, 'ASD', 0),
(11, '2019-11-12', 89222, 3, 'SSDF', 1),
(12, '2019-11-05', 1364440, 2, 'AASD', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_total`
--

CREATE TABLE `becas_total` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `disc` varchar(100) NOT NULL,
  `gloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becas_total`
--

INSERT INTO `becas_total` (`id`, `id_atleta`, `monto`, `fecha`, `nombre`, `disc`, `gloria`) VALUES
(1, 1, 2500, '2019-11-09', 'HOLA', 'AJEDREZ', 0),
(2, 2, 5000, '2019-11-09', 'HOLA', 'AJEDREZ', 0),
(3, 3, 10000, '2019-11-09', 'HOLA', 'BOLAS CRIOLLAS', 0),
(4, 1, 1234, '2019-11-12', 'W', 'AJEDREZ', 0),
(5, 2, 34535, '2019-11-12', 'W', 'AJEDREZ', 0),
(6, 3, 53453, '2019-11-12', 'W', 'BOLAS CRIOLLAS', 0),
(7, 1, 1234, '2019-11-12', '2', 'AJEDREZ', 0),
(8, 2, 34535, '2019-11-12', '2', 'AJEDREZ', 0),
(9, 3, 53453, '2019-11-12', '2', 'BOLAS CRIOLLAS', 0),
(10, 1, 1000, '2019-11-21', 'F', 'AJEDREZ', 0),
(13, 2, 34535, '2019-11-18', 'D', 'AJEDREZ', 0),
(14, 3, 53453, '2019-11-18', 'D', 'BOLAS CRIOLLAS', 0),
(15, 2, 34535, '2019-11-18', 'DD', 'AJEDREZ', 0),
(16, 3, 53453, '2019-11-18', 'DD', 'BOLAS CRIOLLAS', 0),
(17, 1, 1234, '2019-11-11', 'FSDFS', 'AJEDREZ', 0),
(18, 2, 1234, '2019-11-11', 'FSDFS', 'GIMNASIA', 0),
(19, 3, 1234, '2019-11-11', 'FSDFS', 'BOLAS CRIOLLAS', 0),
(20, 1, 1234, '2019-11-19', 'ASD', 'AJEDREZ', 0),
(21, 2, 1234, '2019-11-19', 'ASD', 'GIMNASIA', 0),
(22, 3, 1234, '2019-11-19', 'ASD', 'BOLAS CRIOLLAS', 0),
(23, 1, 1234, '2019-11-12', 'SSDF', 'AJEDREZ', 1),
(24, 2, 34535, '2019-11-12', 'SSDF', 'GIMNASIA', 1),
(25, 3, 53453, '2019-11-12', 'SSDF', 'BOLAS CRIOLLAS', 1),
(26, 4, 1232310, '2019-11-05', 'AASD', 'GIMNASIA', 0),
(27, 5, 132131, '2019-11-05', 'AASD', 'AJEDREZ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzados`
--

CREATE TABLE `calzados` (
  `id` int(11) NOT NULL,
  `calzado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calzados`
--

INSERT INTO `calzados` (`id`, `calzado`) VALUES
(5, '31'),
(6, '32'),
(7, '33'),
(8, '34'),
(9, '35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `nac` varchar(1) NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `numeroc` varchar(20) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `id_atleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `nac`, `cedula`, `nombre`, `apellido`, `id_banco`, `numeroc`, `tipo`, `id_atleta`) VALUES
(1, 'E', '1234567', 'MARITZA', 'HERNANDEZASDA', 14, '12345678900876541111', 'AHORRO', 1),
(2, 'V', '27328852', 'MARYORITH', 'SINGER', 6, '12345678900876541111', 'CORRIENTE', 2),
(3, 'V', '1234567', 'ASDADSADS', 'PEREZ', 9, '12345678900876541111', '', 3),
(4, '', '', '', '', 0, '12345678901234567890', '', 4),
(5, 'V', '12345678', 'ASDSDA', 'SDADSADA', 14, '12345678998765432112', '', 5),
(6, '', '', '', '', 0, '', '', 6),
(7, '', '', '', '', 0, '', '', 7),
(8, '', '', '', '', 0, '', '', 8),
(9, '', '', '', '', 0, '', '', 9),
(10, '', '', '', '', 0, '', '', 10),
(11, '', '', '', '', 0, '', '', 11),
(12, '', '', '', '', 0, '', '', 12),
(13, '', '', '', '', 0, '', '', 13),
(14, '', '', '', '', 0, '', '', 14),
(15, '', '', '', '', 0, '', '', 15),
(16, '', '', '', '', 0, '', '', 16),
(17, '', '', '', '', 0, '', '', 17),
(18, '', '', '', '', 0, '', '', 18),
(19, '', '', '', '', 0, '', '', 19),
(20, '', '', '', '', 0, '', '', 20),
(21, '', '', '', '', 0, '', '', 21),
(22, '', '', '', '', 0, '', '', 22),
(23, '', '', '', '', 0, '', '', 23),
(24, '', '', '', '', 0, '', '', 24),
(25, '', '', '', '', 0, '', '', 25),
(26, '', '', '', '', 0, '', '', 26),
(27, '', '', '', '', 0, '', '', 27),
(28, '', '', '', '', 0, '', '', 28),
(29, '', '', '', '', 0, '', '', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoll`
--

CREATE TABLE `datoll` (
  `id` int(11) NOT NULL,
  `correol` varchar(100) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `id_municipio1` int(11) NOT NULL,
  `id_parroquia1` int(11) NOT NULL,
  `direccion1` varchar(500) NOT NULL,
  `id_atleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datoll`
--

INSERT INTO `datoll` (`id`, `correol`, `empresa`, `id_municipio1`, `id_parroquia1`, `direccion1`, `id_atleta`) VALUES
(1, 'SA@SA.COM', 'SADSAASDA', 8, 9, 'ASDA', 1),
(2, '', '', 0, 0, '', 2),
(3, '', '', 0, 0, '', 3),
(4, '', '', 0, 0, '', 4),
(5, '', '', 0, 0, '', 5),
(6, '', '', 0, 0, '', 6),
(7, '', '', 0, 0, '', 7),
(8, '', '', 0, 0, '', 8),
(9, '', '', 0, 0, '', 9),
(10, '', '', 0, 0, '', 10),
(11, '', '', 0, 0, '', 11),
(12, '', '', 0, 0, '', 12),
(13, '', '', 0, 0, '', 13),
(14, '', '', 0, 0, '', 14),
(15, '', '', 0, 0, '', 15),
(16, '', '', 0, 0, '', 16),
(17, '', '', 0, 0, '', 17),
(18, '', '', 0, 0, '', 18),
(19, '', '', 0, 0, '', 19),
(20, '', '', 0, 0, '', 20),
(21, '', '', 0, 0, '', 21),
(22, '', '', 0, 0, '', 22),
(23, '', '', 0, 0, '', 23),
(24, '', '', 0, 0, '', 24),
(25, '', '', 0, 0, '', 25),
(26, '', '', 0, 0, '', 26),
(27, '', '', 0, 0, '', 27),
(28, '', '', 0, 0, '', 28),
(29, '', '', 0, 0, '', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidades`
--

CREATE TABLE `discapacidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discapacidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `discapacidades`
--

INSERT INTO `discapacidades` (`id`, `discapacidad`) VALUES
(3, 'AUDITIVA'),
(1, 'FISICA O MOTORA'),
(5, 'INTELECTUAL O MENTAL'),
(6, 'PSIQUICA'),
(4, 'VISUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `disciplina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `disciplina`) VALUES
(3, 'AJEDREZ'),
(1, 'BALONCESTO'),
(2, 'BEISBOL'),
(4, 'BOLAS CRIOLLAS'),
(11, 'GIMNASIA'),
(5, 'JUDO'),
(6, 'KARATE'),
(7, 'LEVANTAMIENTO DE PESAS'),
(9, 'LUCHA'),
(8, 'NATACION'),
(10, 'TIRO CON ARCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estatu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `estatu`) VALUES
(8, 'S E ADULTO'),
(1, 'S E JUVENIL'),
(2, 'S E PRE JUVENIL'),
(6, 'S N ADULTO'),
(7, 'S N CICLO OLIMPICO'),
(5, 'S N JUVENIL'),
(4, 'SE INFANTIL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  `maxpo` int(11) NOT NULL,
  `parti` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha_inicio`, `fecha_cierre`, `descripcion`, `id_disciplina`, `id_municipio`, `id_parroquia`, `maxpo`, `parti`, `canti`, `actual`, `tipo`) VALUES
(23, 'ADADAS', '2000-06-01', '2020-01-01', 'TORNOE', 2, 1, 1, 11, 4, 44, 0, ''),
(24, 'FSDFS', '1200-06-01', '2020-01-01', 'C', 3, 1, 1, 10, 1, 10, 0, ''),
(25, 'CG', '2000-04-05', '2020-01-01', 'D', 1, 1, 1, 1, 3, 2, 0, ''),
(26, 'DADSADSADASDSADA', '2000-01-06', '2020-01-01', 'D', 3, 1, 1, 2, 2, 4, 0, ''),
(27, 'ADAS', '2000-06-21', '2020-01-01', 'SADASDADAD', 2, 2, 2, 1, 1, 1, 0, ''),
(28, 'SAD', '2019-10-28', '2020-01-01', 'DASD', 3, 1, 1, 1, 1, 1, 0, 'nacional'),
(29, '11', '2019-11-12', '2020-01-01', '1', 1, 2, 2, 1, 1, 1, 0, 'mundial'),
(30, '111111111111', '2019-11-04', '2020-01-01', '111111', 3, 1, 1, 1, 1, 1, 1, 'mundial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_participantes`
--

CREATE TABLE `evento_participantes` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento_participantes`
--

INSERT INTO `evento_participantes` (`id`, `id_evento`, `id_atleta`, `posicion`, `observacion`) VALUES
(1, 26, 3, 1, ''),
(2, 26, 2, 2, '2'),
(3, 30, 3, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE `logros` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `resultado` varchar(10) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `modi` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`id`, `tipo`, `pais`, `estado`, `ciudad`, `disciplina`, `descripcion`, `resultado`, `observacion`, `id_atleta`, `modi`, `id_evento`) VALUES
(1, 'ADIOS', 'sadsd', 'adasd', 'asdasd', 'AJEDREZ', 'ad', '1', 'd', 3, 1, 0),
(2, 'estadal', 'venezuela', 'yaracuy', 'ARISTIDES BASTIDAS', 'AJEDREZ', 'D', '1', '', 3, 0, 26),
(3, 'estadal', 'venezuela', 'yaracuy', 'ARISTIDES BASTIDAS', 'AJEDREZ', 'D', '2', '2', 2, 0, 26),
(4, 'mundial', 'venezuela', 'yaracuy', 'ARISTIDES BASTIDAS', 'AJEDREZ', '111111', '1', '', 3, 0, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `modalidad`, `id_disciplina`) VALUES
(1, 'BOCHAS', 4),
(2, 'RITMICA', 11),
(3, 'AEROBICA', 11),
(4, 'ACROBATICA', 11),
(5, 'ARTISTICA', 11),
(6, 'AJEDREZ', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `descrips` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `descrips`) VALUES
(1, 'ARISTIDES BASTIDAS'),
(2, 'BOLIVAR'),
(3, 'BRUZUAL'),
(4, 'COCOROTE'),
(5, 'INDEPENDENCIA'),
(6, 'JOSE ANTONIO PAEZ'),
(14, 'JOSE JUAQUIN VEROES'),
(7, 'LA TRINIDAD'),
(8, 'MANUEL MONGE'),
(9, 'NIRGUA'),
(10, 'PEÃ±A'),
(11, 'SAN FELIPE'),
(12, 'SUCRE'),
(13, 'URACHICHE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivels`
--

CREATE TABLE `nivels` (
  `id` int(11) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivels`
--

INSERT INTO `nivels` (`id`, `nivel`, `activo`) VALUES
(1, 'PRIMARIA', 0),
(2, 'BACHILLERATO', 0),
(3, 'TECNICO SUPERIOR', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentezcos`
--

CREATE TABLE `parentezcos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parentezco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parentezcos`
--

INSERT INTO `parentezcos` (`id`, `parentezco`) VALUES
(9, 'ABUELA'),
(10, 'ABUELO'),
(5, 'HERMANA'),
(6, 'HERMANO'),
(4, 'HIJA'),
(3, 'HIJO'),
(1, 'MAMA'),
(14, 'NIETA'),
(13, 'NIETO'),
(2, 'PAPA'),
(12, 'PRIMA'),
(11, 'PRIMO'),
(8, 'TIA'),
(7, 'TIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int(11) NOT NULL,
  `descrip` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id`, `descrip`, `id_municipio`) VALUES
(1, 'ARISTIDES BASTIDAS', 1),
(2, 'BOLIVAR', 2),
(3, 'CHIVACOA', 3),
(4, 'CAMPO ELIAS', 3),
(5, 'COCOROTE', 4),
(6, 'INDEPENDENCIA', 5),
(7, 'JOSE ANTONIO PAEZ', 6),
(8, 'LA TRINIDAD', 7),
(9, 'MANUEL MONGE', 8),
(10, 'SALOM', 9),
(11, 'TEMERLA', 9),
(12, 'NIRGUA', 9),
(13, 'SAN ANDRES', 10),
(14, 'YARITAGUA', 10),
(15, 'SAN JAVIER', 11),
(16, 'ALBARICO', 11),
(17, 'SAN FELIPE', 11),
(18, 'SUCRE', 12),
(19, 'URACHICHE', 13),
(20, 'EL GUAYABO', 14),
(21, 'FARRIAR', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente_discapacidad`
--

CREATE TABLE `puente_discapacidad` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_discapacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puente_discapacidad`
--

INSERT INTO `puente_discapacidad` (`id`, `id_atleta`, `id_discapacidad`) VALUES
(17, 2, 5),
(20, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente_disciplina`
--

CREATE TABLE `puente_disciplina` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `becar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puente_disciplina`
--

INSERT INTO `puente_disciplina` (`id`, `id_atleta`, `id_disciplina`, `id_modalidad`, `id_estatus`, `becar`) VALUES
(4, 3, 3, 6, 1, 0),
(13, 3, 4, 1, 1, 1),
(14, 3, 11, 2, 1, 0),
(16, 1, 3, 6, 8, 1),
(18, 1, 4, 1, 1, 0),
(19, 1, 11, 2, 8, 0),
(20, 2, 11, 2, 8, 1),
(21, 2, 11, 3, 6, 0),
(22, 6, 3, 6, 8, 1),
(23, 5, 3, 6, 8, 1),
(24, 4, 11, 2, 8, 1),
(25, 10, 11, 2, 1, 1),
(26, 10, 11, 4, 1, 0),
(27, 10, 4, 1, 1, 0),
(28, 3, 11, 3, 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente_registro_medico`
--

CREATE TABLE `puente_registro_medico` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_registro_medico` int(11) NOT NULL,
  `fecha_medica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puente_registro_medico`
--

INSERT INTO `puente_registro_medico` (`id`, `id_atleta`, `id_registro_medico`, `fecha_medica`) VALUES
(1, 1, 1, '0000-00-00'),
(7, 2, 2, '0000-00-00'),
(9, 2, 5, '0000-00-00'),
(11, 3, 3, '0000-00-00'),
(12, 3, 9, '0000-00-00'),
(13, 3, 10, '0000-00-00'),
(14, 3, 1, '2019-10-14'),
(15, 3, 2, '2019-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_medicos`
--

CREATE TABLE `registro_medicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registro_medico` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_medicos`
--

INSERT INTO `registro_medicos` (`id`, `registro_medico`) VALUES
(7, 'ALIMENTOS'),
(10, 'ANAFILAXIA'),
(1, 'ASMA'),
(3, 'CONJUNTIVITIS'),
(4, 'DERMATITIS'),
(8, 'MEDICAMENTOS'),
(9, 'PICADURAS DE INSECTOS'),
(2, 'RINITIS'),
(5, 'URTICARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `n_tel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id`, `cedula`, `nombre`, `apellido`, `correo`, `n_tel`) VALUES
(2, '7590456', 'BLANCA', 'SINGER', 'BLANCA@BLAMCA.COM', '04128504562');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `talla` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`) VALUES
(5, 'M'),
(7, 'L'),
(8, 'X'),
(9, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_logros`
--

CREATE TABLE `tipo_logros` (
  `id` int(11) NOT NULL,
  `tipo_logro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_logros`
--

INSERT INTO `tipo_logros` (`id`, `tipo_logro`) VALUES
(2, 'ADIOS'),
(3, 'HOLAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `n_eme` varchar(11) NOT NULL,
  `n_tel` varchar(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `conf_clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `n_eme`, `n_tel`, `correo`, `conf_clave`, `tipo`) VALUES
(30, 'SAMUEL', 'PEREZ', 'SAPM2000', '12345678', '12345678900', '12345678900', '123456789@12345678.COM', '123456789', 'ADMINISTRADOR'),
(31, 'MARYORITH', 'SINGER', 'MARYO05', '123456', '12345678900', '32112321312', 'ASDASA@ASDA.COM', '123456', 'ADMINISTRADOR'),
(33, 'SADSADSAD', 'ASDSADSADSA', 'DADADA', '123', '00987654321', '12345678900', 'SDASDAD@ASDSADCP.SDF', '123', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atleta`
--
ALTER TABLE `atleta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `n` (`id_nivel`),
  ADD KEY `p` (`id_parroquia`),
  ADD KEY `m` (`id_municipio`);

--
-- Indices de la tabla `atleta_representante`
--
ALTER TABLE `atleta_representante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `banco` (`banco`);

--
-- Indices de la tabla `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `becas_gloria`
--
ALTER TABLE `becas_gloria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `becas_mes`
--
ALTER TABLE `becas_mes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `becas_total`
--
ALTER TABLE `becas_total`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calzados`
--
ALTER TABLE `calzados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datoll`
--
ALTER TABLE `datoll`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discapacidades`
--
ALTER TABLE `discapacidades`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `discapacidad` (`discapacidad`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `disciplina` (`disciplina`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `estatu` (`estatu`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento_participantes`
--
ALTER TABLE `evento_participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modalidad` (`modalidad`),
  ADD KEY `sadasd` (`id_disciplina`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `descrips` (`descrips`);

--
-- Indices de la tabla `nivels`
--
ALTER TABLE `nivels`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nivel` (`nivel`);

--
-- Indices de la tabla `parentezcos`
--
ALTER TABLE `parentezcos`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `parentezco` (`parentezco`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `descrip` (`descrip`),
  ADD KEY `fdgdf` (`id_municipio`);

--
-- Indices de la tabla `puente_discapacidad`
--
ALTER TABLE `puente_discapacidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puente_disciplina`
--
ALTER TABLE `puente_disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puente_registro_medico`
--
ALTER TABLE `puente_registro_medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_medicos`
--
ALTER TABLE `registro_medicos`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `alergia` (`registro_medico`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_logros`
--
ALTER TABLE `tipo_logros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `kgjhgjh` (`usuario`),
  ADD UNIQUE KEY `usuario_2` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atleta`
--
ALTER TABLE `atleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `atleta_representante`
--
ALTER TABLE `atleta_representante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `becas_gloria`
--
ALTER TABLE `becas_gloria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `becas_mes`
--
ALTER TABLE `becas_mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `becas_total`
--
ALTER TABLE `becas_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `calzados`
--
ALTER TABLE `calzados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `datoll`
--
ALTER TABLE `datoll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `discapacidades`
--
ALTER TABLE `discapacidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `evento_participantes`
--
ALTER TABLE `evento_participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `nivels`
--
ALTER TABLE `nivels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `parentezcos`
--
ALTER TABLE `parentezcos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `puente_discapacidad`
--
ALTER TABLE `puente_discapacidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `puente_disciplina`
--
ALTER TABLE `puente_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `puente_registro_medico`
--
ALTER TABLE `puente_registro_medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `registro_medicos`
--
ALTER TABLE `registro_medicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_logros`
--
ALTER TABLE `tipo_logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD CONSTRAINT `sadasd` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `fdgdf` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
