-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 01:01:44
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
(1, 'V', 26943430, 'SAMUEL ', 'PEREZ', '2000-01-06', 'O+', 'SOLTERO/A', 'M', 3, 'SAPM2000@HOTMAIL.COM', '04245222312', '04143012400', 11, 17, '2 AV CON CALLE 2 EDF PORTAL DEL ESTE APT 5B', 0, 9, 16, '170', '45', 'DIESTRO'),
(2, 'V', 27328852, 'MARYORITH', 'SINGER', '2000-05-05', 'O+', 'SOLTERO/A', 'F', 3, 'MARYORITHSINGER05@GMAIL.COM', '04128506929', '04245222312', 11, 17, '2 AV CON CALLE 2 EDF PORTAL DEL ESTE APT 5B', 0, 9, 11, '155', '46', 'DIESTRO'),
(3, 'V', 28654123, 'BRAIHAM', 'MARQUEZ', '2001-10-05', 'B-', 'SOLTERO/A', 'M', 2, 'BRAIHAMMARQUEZ@GMAIL.COM', '04268547895', '02514569852', 7, 8, 'CALLE BORAURE AL FINAL CASA COLOR LADRILLO', 0, 5, 14, '168', '78', 'DIESTRO'),
(4, 'V', 6314523, 'PABLO ', 'BASTARDO', '1966-01-10', 'AB+', 'CASADO/A', 'M', 3, 'PBASTARDO1966@YAHOO.COM', '02544589631', '02542365487', 13, 19, 'CALLE 5 ENTRE 3 Y 4', 0, 5, 17, '175', '78', 'AMBIDIESTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atleta_representante`
--

CREATE TABLE `atleta_representante` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_representante` int(11) NOT NULL,
  `id_parentesco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atleta_representante`
--

INSERT INTO `atleta_representante` (`id`, `id_atleta`, `id_representante`, `id_parentesco`) VALUES
(1, 2, 1, 14),
(3, 3, 1, 3),
(4, 4, 2, 16);

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
(1, 1, 52000, 'AJEDREZ'),
(2, 2, 35000, 'AJEDREZ');

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
(1, '2019-11-27', 87000, 2, 'ALTORENDIMIENTOJULIO', 0);

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
(1, 1, 52000, '2019-11-27', 'ALTORENDIMIENTOJULIO', 'AJEDREZ', 0),
(2, 2, 35000, '2019-11-27', 'ALTORENDIMIENTOJULIO', 'AJEDREZ', 0);

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
(9, '35'),
(10, '36'),
(11, '37'),
(12, '38'),
(13, '39'),
(14, '40'),
(15, '41'),
(16, '42'),
(17, '43'),
(18, '44'),
(19, '45');

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
(1, 'V', '26943430', 'SAMUEL', 'PEREZ', 6, '01021234567890123456', 'CORRIENTE', 1),
(2, 'V', '27328852', 'MARYORITH', 'SINGER', 14, '01051234567891234567', 'CORRIENTE', 2),
(3, 'V', '7589654', 'JOSE', 'MANUEL', 11, '01081234856952102365', 'CORRIENTE', 3),
(4, 'V', '6314523', 'PABLO', 'BASTARDO', 13, '01092365324752125223', 'CORRIENTE', 4);

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
(1, 'MULTIJUGOS@HOTMAIL.COM', 'MULTI FRUIT', 7, 8, 'VIA LA MORITA ANTES DE LLEGAR AL AEROPUERTO', 1),
(2, '', '', 0, 0, '', 2),
(3, '', '', 0, 0, '', 3),
(4, '', '', 0, 0, '', 4);

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
  `disciplina` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `disciplina`, `activo`) VALUES
(1, 'BALONCESTO', 0),
(2, 'BEISBOL', 0),
(3, 'AJEDREZ', 0),
(4, 'BOLAS CRIOLLAS', 0),
(5, 'JUDO', 0),
(6, 'KARATE', 0),
(7, 'LEVANTAMIENTO DE PESAS', 0),
(8, 'NATACION', 0),
(9, 'LUCHA', 0),
(10, 'TIRO CON ARCO', 0),
(11, 'GIMNASIA', 0);

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
(5, 'S N JUVENIL');

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
(2, 'TORNEO AJEDREZ', '2019-11-27', '2019-11-27', 'NINGUNA', 3, 5, 6, 5, 1, 5, 2, 'NACIONAL');

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
(1, 2, 2, 1, ''),
(2, 2, 4, 2, '');

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
(1, 'NACIONAL', 'VENEZUELA', 'YARACUY', 'INDEPENDENCIA', 'AJEDREZ', 'NINGUNA', '1', '', 2, 0, 2),
(2, 'NACIONAL', 'VENEZUELA', 'YARACUY', 'INDEPENDENCIA', 'AJEDREZ', 'NINGUNA', '2', '', 4, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `modalidad`, `id_disciplina`, `activo`) VALUES
(2, 'RITMICA', 11, 0),
(3, 'AEROBICA', 11, 0),
(4, 'ACROBATICA', 11, 0),
(5, 'ARTISTICA', 11, 0),
(6, 'AJEDREZ', 3, 0),
(7, 'BEISBOL', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `descrips` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `descrips`, `activo`) VALUES
(1, 'ARISTIDES BASTIDAS', 0),
(2, 'BOLIVAR', 0),
(3, 'BRUZUAL', 0),
(4, 'COCOROTE', 0),
(5, 'INDEPENDENCIA', 0),
(6, 'JOSE ANTONIO PAEZ', 0),
(7, 'LA TRINIDAD', 0),
(8, 'MANUEL MONGE', 0),
(9, 'NIRGUA', 0),
(10, 'PEÃ±A', 0),
(11, 'SAN FELIPE', 0),
(12, 'SUCRE', 0),
(13, 'URACHICHE', 0),
(14, 'JOSE JUAQUIN VEROES', 0);

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
-- Estructura de tabla para la tabla `parentescos`
--

CREATE TABLE `parentescos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parentesco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parentescos`
--

INSERT INTO `parentescos` (`id`, `parentesco`) VALUES
(10, 'ABUELO'),
(16, 'ESPOSO'),
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
  `id_municipio` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id`, `descrip`, `id_municipio`, `activo`) VALUES
(1, 'ARISTIDES BASTIDAS', 1, 0),
(2, 'BOLIVAR', 2, 0),
(3, 'CHIVACOA', 3, 0),
(4, 'CAMPO ELIAS', 3, 0),
(5, 'COCOROTE', 4, 0),
(6, 'INDEPENDENCIA', 5, 0),
(7, 'JOSE ANTONIO PAEZ', 6, 0),
(8, 'LA TRINIDAD', 7, 0),
(9, 'MANUEL MONGE', 8, 0),
(10, 'SALOM', 9, 0),
(11, 'TEMERLA', 9, 0),
(12, 'NIRGUA', 9, 0),
(13, 'SAN ANDRES', 10, 0),
(14, 'YARITAGUA', 10, 0),
(15, 'SAN JAVIER', 11, 0),
(16, 'ALBARICO', 11, 0),
(17, 'SAN FELIPE', 11, 0),
(18, 'SUCRE', 12, 0),
(19, 'URACHICHE', 13, 0),
(20, 'EL GUAYABO', 14, 0),
(21, 'FARRIAR', 14, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologia_medicas`
--

CREATE TABLE `patologia_medicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patologia_medica` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `patologia_medicas`
--

INSERT INTO `patologia_medicas` (`id`, `patologia_medica`) VALUES
(10, 'ANAFILAXIA'),
(1, 'ASMA'),
(3, 'CONJUNTIVITIS'),
(4, 'DERMATITIS'),
(9, 'PICADURAS DE INSECTOS'),
(2, 'RINITIS'),
(5, 'URTICARIA');

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
(1, 1, 4);

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
(1, 1, 3, 6, 8, 1),
(2, 2, 3, 6, 8, 1),
(3, 1, 11, 3, 8, 0),
(4, 3, 2, 7, 1, 1),
(5, 4, 3, 6, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente_patologia_medica`
--

CREATE TABLE `puente_patologia_medica` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_patologia_medica` int(11) NOT NULL,
  `fecha_medica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puente_patologia_medica`
--

INSERT INTO `puente_patologia_medica` (`id`, `id_atleta`, `id_patologia_medica`, `fecha_medica`) VALUES
(1, 2, 1, '2000-05-05');

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
(1, '7590773', 'LEFKY ', 'MORA', 'LMORA2000@HOTMAIL.COM', '04143012400'),
(2, '6325845', 'LUISA MARIA', 'ORTEGA', 'LUISA@EUC.COM', '02542369541');

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
(9, 'S'),
(8, 'X');

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
(1, 'REGIONAL'),
(2, 'NACIONAL'),
(3, 'INTERNACIONAL');

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
(30, 'SAMUEL ALEJANDRO', 'PEREZ MORA', 'SAPM2000', '12345678', '04125084544', '04245222312', 'SAPM2000@HOTMAIL.COM', '123456789', 'ADMINISTRADOR'),
(31, 'MARYORITH', 'SINGER', 'MARYO05', '123456', '12345678900', '32112321312', 'ASDASA@ASDA.COM', '123456', 'ASISTENTE ADMINISTRATIVO');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calzado` (`calzado`);

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
-- Indices de la tabla `parentescos`
--
ALTER TABLE `parentescos`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `parentezco` (`parentesco`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `descrip` (`descrip`),
  ADD KEY `fdgdf` (`id_municipio`);

--
-- Indices de la tabla `patologia_medicas`
--
ALTER TABLE `patologia_medicas`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `alergia` (`patologia_medica`);

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
-- Indices de la tabla `puente_patologia_medica`
--
ALTER TABLE `puente_patologia_medica`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `talla` (`talla`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `atleta_representante`
--
ALTER TABLE `atleta_representante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `becas_gloria`
--
ALTER TABLE `becas_gloria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `becas_mes`
--
ALTER TABLE `becas_mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `becas_total`
--
ALTER TABLE `becas_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calzados`
--
ALTER TABLE `calzados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datoll`
--
ALTER TABLE `datoll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evento_participantes`
--
ALTER TABLE `evento_participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT de la tabla `parentescos`
--
ALTER TABLE `parentescos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `patologia_medicas`
--
ALTER TABLE `patologia_medicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `puente_discapacidad`
--
ALTER TABLE `puente_discapacidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `puente_disciplina`
--
ALTER TABLE `puente_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `puente_patologia_medica`
--
ALTER TABLE `puente_patologia_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
