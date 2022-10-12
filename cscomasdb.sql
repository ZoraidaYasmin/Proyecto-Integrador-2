-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2022 a las 00:35:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cscomasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `hc_paciente` varchar(20) NOT NULL,
  `consultorio` varchar(10) DEFAULT NULL,
  `diagnostico` varchar(1) DEFAULT NULL,
  `est_atencion` int(11) NOT NULL,
  `obs_control` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_especialidad`
--

CREATE TABLE `det_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `obs` varchar(50) NOT NULL,
  `est_det_doctor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `det_especialidad`
--

INSERT INTO `det_especialidad` (`id_especialidad`, `id_doctor`, `obs`, `est_det_doctor`) VALUES
(10, 0, '04/10/22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `nro_colegio` int(11) NOT NULL,
  `est_personal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `id_personal`, `nro_colegio`, `est_personal`) VALUES
(0, 4, 1010212336, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `des_especialidad` varchar(50) NOT NULL,
  `est_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `des_especialidad`, `est_especialidad`) VALUES
(1, 'Anatomía Patológica', 1),
(2, 'Cardiología', 1),
(3, 'Cirugía Cardiovascular', 1),
(4, 'Cirugía General', 1),
(5, 'Dermatología', 1),
(6, 'Ecografía', 1),
(7, 'Gastroenterología', 1),
(8, 'Ginecología', 1),
(9, 'Anatomía Patológica', 1),
(10, 'Medicina General', 1),
(11, 'Medicina Interna', 1),
(12, 'Neurología', 1),
(13, 'Nutrición', 1),
(14, 'Odontología', 1),
(15, 'Oftalmología', 1),
(16, 'Otorrinolaringología', 1),
(17, 'Psicología', 1),
(18, 'Podología', 1),
(19, 'Radiología', 1),
(20, 'Reumatología', 1),
(21, 'Tomografía', 1),
(22, 'Traumatología', 1),
(23, 'Urología', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fec_horario` varchar(20) NOT NULL,
  `hor_horario` varchar(20) NOT NULL,
  `est_atencion` int(11) NOT NULL,
  `obs_control` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `id_doctor`, `id_especialidad`, `fec_horario`, `hor_horario`, `est_atencion`, `obs_control`) VALUES
(0, 0, 10, '14/10/2022', '08:00', 1, 'DISPONIBLE'),
(1, 0, 10, '14/10/2022', '08:30', 1, 'DISPONIBLE'),
(2, 0, 10, '14/10/2022', '09:00', 1, 'DISPONIBLE'),
(3, 0, 10, '14/10/2022', '09:30', 1, 'DISPONIBLE'),
(4, 0, 10, '14/10/2022', '10:00', 1, 'DISPONIBLE'),
(5, 0, 10, '14/10/2022', '10:30', 1, 'DISPONIBLE'),
(6, 0, 10, '14/10/2022', '11:00', 1, 'DISPONIBLE'),
(7, 0, 10, '14/10/2022', '11:30', 1, 'DISPONIBLE'),
(8, 0, 10, '14/10/2022', '12:00', 1, 'DISPONIBLE'),
(9, 0, 10, '14/10/2022', '12:30', 1, 'DISPONIBLE'),
(10, 0, 10, '14/10/2022', '13:00', 1, 'DISPONIBLE'),
(11, 0, 10, '14/10/2022', '13:30', 1, 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `hc_paciente` varchar(20) NOT NULL,
  `dni_paciente` varchar(50) NOT NULL,
  `nom_paciente` varchar(75) NOT NULL,
  `pas_personal` varchar(50) NOT NULL,
  `mail_paciente` varchar(75) NOT NULL,
  `est_paciente` tinyint(1) NOT NULL,
  `dir_paciente` varchar(100) DEFAULT NULL,
  `tel_paciente` varchar(100) DEFAULT NULL,
  `cel_paciente` varchar(100) DEFAULT NULL,
  `sex_paciente` varchar(100) DEFAULT NULL,
  `fn_paciente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`hc_paciente`, `dni_paciente`, `nom_paciente`, `pas_personal`, `mail_paciente`, `est_paciente`, `dir_paciente`, `tel_paciente`, `cel_paciente`, `sex_paciente`, `fn_paciente`) VALUES
('10101012', '10101012', 'CELINA MUÑOZ OLAYA', '', 'CELINA@HOTMAIL.COM', 1, 'COMAS', '017854856', '954613254', 'FEMENINO', '11/10/1961'),
('10101013', '10101012', 'JUAN ESPIRITU TORRES', '', 'JESPIRITU@HOTMAIL.COM', 1, 'SANTA LUZMILA', '014625625', '991991991', 'MASCULINO', '24/12/1975'),
('10101014', '10101014', 'MERCEDES ACOSTA PEÑA', '', 'MACOSTA@HOTMAIL.COM', 1, 'RETABLO', '015623894', '991990992', 'FEMENINO', '05/08/1970'),
('10101015', '10101015', 'PEDRO PEÑA PEÑA', '', 'PPEÑA@HOTMAIL.COM', 1, 'COMAS', '014258795', '997998995', 'MASCULINO', '22/04/1970');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `dni_personal` varchar(50) NOT NULL,
  `nom_personal` varchar(75) NOT NULL,
  `mail_personal` varchar(75) NOT NULL,
  `loc_personal` varchar(100) NOT NULL,
  `est_personal` tinyint(1) NOT NULL,
  `dir_personal` varchar(100) DEFAULT NULL,
  `tel_casa` varchar(100) DEFAULT NULL,
  `cel_personal` varchar(100) DEFAULT NULL,
  `sex_personal` varchar(100) DEFAULT NULL,
  `fn_personal` varchar(100) DEFAULT NULL,
  `fi_personal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `dni_personal`, `nom_personal`, `mail_personal`, `loc_personal`, `est_personal`, `dir_personal`, `tel_casa`, `cel_personal`, `sex_personal`, `fn_personal`, `fi_personal`) VALUES
(0, '10000000', 'ADMINISTRADOR_TIC', 'ADMIN@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '01-2356891', '998998998', 'MASCULINO', '01-05-1990', '01-05-1990'),
(1, '40404040', 'JOSE DE LOS SANTOS PAREDES', 'JSANTOS@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '014585452', '997997997', 'MASCULINO', '24/08/1974', '01/08/2020'),
(2, '45454545', 'ZORAIDA OYARCE', 'ZOYARCE@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '01824976', '994994994', 'FEMENINO', '04/05/1991', '12/02/2020'),
(4, '10101010', 'FRANCISCO CORRALES INFANTA', 'FCORRALES@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '017845871', '993993993', 'MASCULINO', '04/10/1948', '01/08/2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `des_rol` varchar(50) NOT NULL,
  `est_rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `des_rol`, `est_rol`) VALUES
(0, 'Administrador', 1),
(1, 'Soporte', 1),
(2, 'Admision', 1),
(3, 'Doctor', 1),
(4, 'Direccion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `triaje`
--

CREATE TABLE `triaje` (
  `id_cita` int(11) NOT NULL,
  `peso` double DEFAULT NULL,
  `talla` double DEFAULT NULL,
  `temperatura` double DEFAULT NULL,
  `presion` double DEFAULT NULL,
  `obs_atencion` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `mail_usuario` varchar(75) NOT NULL,
  `pas_personal` varchar(100) NOT NULL,
  `des_usuario` varchar(50) NOT NULL,
  `est_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_personal`, `id_rol`, `mail_usuario`, `pas_personal`, `des_usuario`, `est_usuario`) VALUES
(0, 0, 0, 'admin@cscomas.gob.pe', '$2a$12$mTlmNeCMD.EKQ5KuAy8Mq.6QS/LM8zjpynDHpRhY/XtdpzK39izhm', 'Administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`) USING BTREE,
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `hc_paciente` (`hc_paciente`);

--
-- Indices de la tabla `det_especialidad`
--
ALTER TABLE `det_especialidad`
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`) USING BTREE,
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`) USING BTREE;

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`) USING BTREE,
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`hc_paciente`) USING BTREE;

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`) USING BTREE;

--
-- Indices de la tabla `triaje`
--
ALTER TABLE `triaje`
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`hc_paciente`) REFERENCES `paciente` (`hc_paciente`);

--
-- Filtros para la tabla `det_especialidad`
--
ALTER TABLE `det_especialidad`
  ADD CONSTRAINT `det_doctor_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `det_doctor_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `triaje`
--
ALTER TABLE `triaje`
  ADD CONSTRAINT `triaje_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
