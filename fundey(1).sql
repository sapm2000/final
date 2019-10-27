-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2019 a las 18:34:31
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fundey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atleta`
--

CREATE TABLE IF NOT EXISTS `atleta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nac` varchar(1) NOT NULL,
  `cedula` varchar(9) NOT NULL,
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
  `mano` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `n` (`id_nivel`),
  KEY `p` (`id_parroquia`),
  KEY `m` (`id_municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `atleta`
--

INSERT INTO `atleta` (`id`, `nac`, `cedula`, `nombre`, `apellido`, `f_nac`, `tipos`, `estadoc`, `sexo`, `id_nivel`, `correo`, `n_tel`, `n_eme`, `id_municipio`, `id_parroquia`, `direccion`, `activo`, `id_talla`, `id_calzado`, `altura`, `peso`, `mano`) VALUES
(1, 'V', '30426947', 'FREDDERICK', 'HERNANDEZ', '2004-07-06', 'O+', 'SOLTERO/A', 'M', 1, 'DASDAD@ASDS.COM', '12345678900', '00987654321', 13, 19, 'ASDA', 2, 8, 7, '1,10', '90.0', 'DIESTRO'),
(2, '', '27328852', 'MARYORITH', 'SINGER', '2000-05-05', 'O+', 'SOLTERO/A', 'F', 3, 'MARYORITHSINGER05@GMAIL.COM', '04125084544', '04245222312', 1, 1, 'FINAL CALLE 28 CON 14 AV.', 2, 0, 0, '', '', ''),
(3, 'V', '26943430', 'SAMUEL', 'PEREZ', '2000-01-06', 'O+', 'SOLTERO/A', 'F', 3, '8@SADSA.COM', '04245222312', '04125084544', 11, 17, '2 AV.', 0, 0, 0, '', '', ''),
(4, '', '1234567', 'FSDFS', 'SDFDSFS', '2000-06-12', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 8, 5, '123', '12', ''),
(5, 'E', '7590456', 'ADSAD', 'ASDADAS', '2000-06-01', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(6, 'V', '1478558', 'XCZCZXC', 'ZXCZXCZXC', '2019-10-06', 'B-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(7, 'V', '5145789', 'ASDASD', 'ALVAREZ', '2019-10-13', 'O+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(8, 'V', '12745678', 'ASD', 'ALVAREZ', '2019-09-30', 'B+', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(9, 'V', '12345685', 'ASASASAS', 'XXXXXX', '2019-10-10', 'B-', 'CASADO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(10, 'V', '22222222', 'ASAAAA', 'SSS', '2019-10-03', 'O+', 'CASADO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(11, 'V', '22455478', 'J', 'J', '2019-10-06', 'AB+', 'CASADO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(12, 'V', '2222444', 'MARIA', 'MJ', '2019-10-20', 'B-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(13, 'V', '2323232', 'AASAA', 'SSSS', '2019-10-13', 'O-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(14, 'V', '33333333', 'ASWQ', 'SASW', '2019-10-07', 'O-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(15, 'V', '25487878', 'ASASASAS', 'ASAS', '2019-10-01', 'O+', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(16, 'V', '23156165', 'ASASASASASAS', 'WWWW', '2019-10-15', 'O-', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(17, 'V', '24578964', 'EEEEE', 'EEE', '2019-10-11', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(18, 'V', '66666666', 'B', 'V', '2019-09-29', 'B-', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(19, 'V', '21455412', 'SDSDSDSDS', 'SDSDSD', '2019-10-08', 'B-', 'CASADO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(20, 'V', '23564652', 'AS', 'ASAS', '2019-10-13', 'O-', 'SOLTERO/A', 'M', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(21, 'V', '2221544', 'ASDASDA', 'ASDAS', '2019-10-20', 'AB+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(22, 'V', '55454545', 'MARIA', 'MJ', '2019-09-30', 'AB+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(23, 'V', '4561234', 'ASASASAS', 'ALVAREZ', '2019-09-30', 'O+', 'SOLTERO/A', 'F', 1, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(24, 'V', '3254875', 'D', 'MJ', '2019-10-22', 'AB-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(25, 'V', '12345679', 'D', 'D', '2019-09-22', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(26, 'V', '2457896', 'SADADA', 'ASDASD', '2019-10-09', 'O+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(27, 'V', '2457887', 'MMMM', 'SSSS', '2019-09-30', 'O-', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(28, 'V', '32548778', 'MASDASASAS', 'ASASASASAS', '2019-10-22', 'AB+', 'SOLTERO/A', 'F', 3, '', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(29, 'V', '2144574', 'MARYORITH NAZARETH', 'SINGER MUJICA', '2019-10-13', 'AB+', 'SOLTERO/A', 'F', 2, '', '', '', 0, 0, '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atleta_representante`
--

CREATE TABLE IF NOT EXISTS `atleta_representante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `id_representante` int(11) NOT NULL,
  `id_parentezco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banco` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `banco` (`banco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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

CREATE TABLE IF NOT EXISTS `becas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `becas`
--

INSERT INTO `becas` (`id`, `id_atleta`, `monto`) VALUES
(1, 1, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_gloria`
--

CREATE TABLE IF NOT EXISTS `becas_gloria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `becas_gloria`
--

INSERT INTO `becas_gloria` (`id`, `id_atleta`, `monto`) VALUES
(1, 1, 1234),
(2, 2, 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_mes`
--

CREATE TABLE IF NOT EXISTS `becas_mes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(50) NOT NULL,
  `montoT` float NOT NULL,
  `becados` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `becas_mes`
--

INSERT INTO `becas_mes` (`id`, `fecha`, `montoT`, `becados`, `nombre`) VALUES
(1, '2019-10-23', 1000, 1, 'HOLA'),
(2, '2019-10-16', 20000, 2, 'VIEJOS'),
(3, '2019-10-06', 1333330, 2, 'VJ'),
(4, '2019-09-30', 2469130, 2, 'ASDSAD'),
(5, '2019-10-08', 4265, 2, 'SADSADA'),
(6, '2019-09-29', 33624600, 2, 'SADSADA'),
(7, '2019-10-21', 135444, 2, 'ASD'),
(8, '2019-10-07', 2469130, 2, 'SAD'),
(9, '2019-10-09', 1246890, 2, 'SADSADD'),
(10, '2019-10-16', 400000, 2, 'DEFINITIVO'),
(11, '2019-10-07', 1243540000, 2, 'DSFDS'),
(12, '2019-10-07', 2468, 2, 'VJ'),
(13, '2019-10-07', 2468, 2, 'SADASD'),
(14, '2019-10-31', 2468, 2, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas_total`
--

CREATE TABLE IF NOT EXISTS `becas_total` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `becas_total`
--

INSERT INTO `becas_total` (`id`, `id_atleta`, `monto`, `fecha`, `nombre`) VALUES
(1, 14, 414142000000000, '2019-02-02', 'sdfdsfd'),
(2, 1, 1234, '2019-10-07', 'VJ'),
(3, 2, 1234, '2019-10-07', 'VJ'),
(4, 1, 1234, '2019-10-07', 'SADASD'),
(5, 2, 1234, '2019-10-07', 'SADASD'),
(6, 1, 1234, '2019-10-31', 'S'),
(7, 2, 1234, '2019-10-31', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzados`
--

CREATE TABLE IF NOT EXISTS `calzados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calzado` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nac` varchar(1) NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `numeroc` varchar(20) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `nac`, `cedula`, `nombre`, `apellido`, `id_banco`, `numeroc`, `tipo`, `id_atleta`) VALUES
(1, 'E', '1234567', 'MARITZA', 'HERNANDEZ', 14, '12345678900876541111', '', 1),
(2, 'V', '27328852', 'MARYORITH', 'SINGER', 6, '12345678900876541111', '', 2),
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

CREATE TABLE IF NOT EXISTS `datoll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correol` varchar(100) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `id_municipio1` int(11) NOT NULL,
  `id_parroquia1` int(11) NOT NULL,
  `direccion1` varchar(500) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `datoll`
--

INSERT INTO `datoll` (`id`, `correol`, `empresa`, `id_municipio1`, `id_parroquia1`, `direccion1`, `id_atleta`) VALUES
(1, '', '', 0, 0, '', 1),
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

CREATE TABLE IF NOT EXISTS `discapacidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `discapacidad` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `discapacidad` (`discapacidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `disciplina` (`disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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

CREATE TABLE IF NOT EXISTS `estatus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estatu` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `estatu` (`estatu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha_inicio`, `fecha_cierre`, `descripcion`, `id_disciplina`, `id_municipio`, `id_parroquia`, `maxpo`, `parti`, `canti`, `actual`) VALUES
(23, 'ADADAS', '2000-06-01', '2020-01-01', 'TORNOE', 2, 1, 1, 11, 4, 44, 0),
(24, 'FSDFS', '1200-06-01', '2020-01-01', 'C', 3, 1, 1, 10, 1, 10, 0),
(25, 'CG', '2000-04-05', '2020-01-01', 'D', 1, 1, 1, 1, 3, 2, 0),
(26, 'DADSADSADASDSADA', '2000-01-06', '2020-01-01', 'D', 3, 1, 1, 2, 2, 4, -2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_participantes`
--

CREATE TABLE IF NOT EXISTS `evento_participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE IF NOT EXISTS `logros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE IF NOT EXISTS `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalidad` varchar(50) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modalidad` (`modalidad`),
  KEY `sadasd` (`id_disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrips` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `descrips` (`descrips`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

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

CREATE TABLE IF NOT EXISTS `nivels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `nivel` (`nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `parentezcos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parentezco` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `parentezco` (`parentezco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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

CREATE TABLE IF NOT EXISTS `parroquia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrip` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_municipio` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `descrip` (`descrip`),
  KEY `fdgdf` (`id_municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

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

CREATE TABLE IF NOT EXISTS `puente_discapacidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `id_discapacidad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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

CREATE TABLE IF NOT EXISTS `puente_disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `puente_disciplina`
--

INSERT INTO `puente_disciplina` (`id`, `id_atleta`, `id_disciplina`, `id_modalidad`, `id_estatus`) VALUES
(1, 1, 3, 0, 2),
(2, 1, 3, 6, 7),
(4, 3, 3, 6, 1),
(6, 2, 4, 0, 0),
(8, 2, 2, 0, 0),
(9, 2, 0, 0, 6),
(12, 2, 3, 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente_registro_medico`
--

CREATE TABLE IF NOT EXISTS `puente_registro_medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` int(11) NOT NULL,
  `id_registro_medico` int(11) NOT NULL,
  `fecha_medica` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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

CREATE TABLE IF NOT EXISTS `registro_medicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `registro_medico` varchar(500) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `alergia` (`registro_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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

CREATE TABLE IF NOT EXISTS `representantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `n_tel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE IF NOT EXISTS `tallas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talla` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
-- Estructura de tabla para la tabla `tipo_logros`
--

CREATE TABLE IF NOT EXISTS `tipo_logros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_logro` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `n_eme` varchar(11) NOT NULL,
  `n_tel` varchar(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `conf_clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `kgjhgjh` (`usuario`),
  UNIQUE KEY `usuario_2` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `n_eme`, `n_tel`, `correo`, `conf_clave`, `tipo`) VALUES
(30, 'SAMUEL', 'PEREZ', 'SAPM2000', '12345678', '12345678900', '12345678900', '123456789@12345678.COM', '123456789', 'ADMINISTRADOR'),
(31, 'MARYORITH', 'SINGER', 'MARYO05', '123456', '12345678900', '32112321312', 'ASDASA@ASDA.COM', '123456', 'ADMINISTRADOR'),
(33, 'SADSADSAD', 'ASDSADSADSA', 'DADADA', '123', '00987654321', '12345678900', 'SDASDAD@ASDSADCP.SDF', '123', 'ADMINISTRADOR');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;