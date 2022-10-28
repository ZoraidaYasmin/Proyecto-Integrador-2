-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 04:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cscomasdb`
--
CREATE DATABASE IF NOT EXISTS `cscomasdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cscomasdb`;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
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

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id_cita`, `id_horario`, `id_personal`, `hc_paciente`, `consultorio`, `diagnostico`, `est_atencion`, `obs_control`) VALUES
(0, 1, 4, '10101014', 'A023', NULL, 2, NULL),
(1, 6, 3, '10101014', 'A028', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `det_especialidad`
--

CREATE TABLE `det_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `obs` varchar(50) NOT NULL,
  `est_det_doctor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `det_especialidad`
--

INSERT INTO `det_especialidad` (`id_especialidad`, `id_doctor`, `obs`, `est_det_doctor`) VALUES
(10, 0, '04/10/22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `nro_colegio` int(11) NOT NULL,
  `est_personal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `id_personal`, `nro_colegio`, `est_personal`) VALUES
(0, 4, 1010212336, 1);

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `des_especialidad` varchar(50) NOT NULL,
  `est_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `especialidad`
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
-- Table structure for table `horario`
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
-- Dumping data for table `horario`
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
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `hc_paciente` varchar(20) NOT NULL,
  `nom_paciente` varchar(75) NOT NULL,
  `ape_personal` varchar(50) NOT NULL,
  `mail_paciente` varchar(75) NOT NULL,
  `est_paciente` tinyint(1) NOT NULL,
  `dir_paciente` varchar(100) DEFAULT NULL,
  `tel_paciente` varchar(100) DEFAULT NULL,
  `cel_paciente` varchar(100) DEFAULT NULL,
  `sex_paciente` varchar(100) DEFAULT NULL,
  `fn_paciente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`hc_paciente`, `nom_paciente`, `ape_personal`, `mail_paciente`, `est_paciente`, `dir_paciente`, `tel_paciente`, `cel_paciente`, `sex_paciente`, `fn_paciente`) VALUES
('10101014', 'MERCEDES', 'ACOSTA PEÑA', 'MACOSTA@HOTMAIL.COM', 1, 'RETABLO', '015623894', '991990992', 'FEMENINO', '05/08/1970'),
('40414242', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414243', 'JEAN PIER', 'GALLOSO PEREZ', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414244', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414245', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414246', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414247', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414248', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('40414249', 'JEAN PIER', 'GALLOSO PERES', 'JGALLOSOPERES@HOTMAIL.COM', 1, 'JR. LOS SAUCES MZ D LT 18 - COMAS', '0146585792', '995558484', 'MASCULINO', '24/12/1984'),
('42667250', 'jose', 'de los santos paredes', 'j.santosparedes@gmail.com', 1, 'Mz g lt 33 Coop viña San Francisco', '+51995553932', '995555857', 'MASCULINO', '24/10/1984');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
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
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id_personal`, `dni_personal`, `nom_personal`, `mail_personal`, `loc_personal`, `est_personal`, `dir_personal`, `tel_casa`, `cel_personal`, `sex_personal`, `fn_personal`, `fi_personal`) VALUES
(0, '10000000', 'ADMINISTRADOR', 'ADMIN@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '01-2356891', '998998998', '0', '05/08/1971', '20-07-2022'),
(1, '40404040', 'JOSE DE LOS SANTOS PAREDES', 'JSANTOS@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '014585452', '997997997', 'MASCULINO', '24/08/1974', '01/08/2020'),
(2, '45454545', 'ZORAIDA OYARCE', 'ZOYARCE@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '01824976', '994994994', 'FEMENINO', '04/05/1991', '12/02/2020'),
(3, '42667249', 'JOSE PRESENTACION MEJIA', 'j.santosparedes@gmail.com', 'PRINCIPAL', 1, 'Mz g lt 33 Coop viña San Francisco', '+51995553932', '995555857', 'MASCULINO', NULL, NULL),
(4, '10101010', 'FRANCISCO CORRALES INFANTA', 'FCORRALES@CSCOMAS.GOB.PE', 'PRINCIPAL', 1, 'COMAS', '017845871', '993993993', 'MASCULINO', '04/10/1948', '01/08/2020'),
(5, '10112025', 'JOSE PRESENTACION MEJIA', 'JOSEPRE@HOTMAIL.COM', 'PRINCIPAL', 1, 'Mz g lt 33 Coop viña San Francisco', '+51995553932', '995555857', 'MASCULINO', '05/08/1971', '20-07-2022'),
(6, '10112026', 'JOSE PRESENTACION MEJIA', 'JOSEPRE@HOTMAIL.COM', 'PRINCIPAL', 1, 'Mz g lt 33 Coop viña San Francisco', '+51995553932', '995555857', 'MASCULINO', '05/08/1971', '20-07-2022');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `des_rol` varchar(50) NOT NULL,
  `est_rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `des_rol`, `est_rol`) VALUES
(0, 'Administrador', 1),
(1, 'Soporte', 1),
(2, 'Admision', 1),
(3, 'Doctor', 1),
(4, 'Direccion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `triaje`
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

--
-- Dumping data for table `triaje`
--

INSERT INTO `triaje` (`id_cita`, `peso`, `talla`, `temperatura`, `presion`, `obs_atencion`, `estado`) VALUES
(0, 80.5, 1.7, 38.5, 80, NULL, 1),
(1, 81.5, 1.71, 39, 80, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_personal`, `id_rol`, `mail_usuario`, `pas_personal`, `des_usuario`, `est_usuario`) VALUES
(0, 0, 0, 'admin@cscomas.gob.pe', '$2a$12$mTlmNeCMD.EKQ5KuAy8Mq.6QS/LM8zjpynDHpRhY/XtdpzK39izhm', 'Administrador', 1),
(1, 1, 1, 'soporte@cscomas.gob.pe', '$2a$12$mTlmNeCMD.EKQ5KuAy8Mq.6QS/LM8zjpynDHpRhY/XtdpzK39izhm', 'Soporte_System', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`) USING BTREE,
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `hc_paciente` (`hc_paciente`);

--
-- Indexes for table `det_especialidad`
--
ALTER TABLE `det_especialidad`
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`) USING BTREE,
  ADD KEY `id_personal` (`id_personal`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`) USING BTREE;

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`) USING BTREE,
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`hc_paciente`) USING BTREE;

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`) USING BTREE;

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`) USING BTREE;

--
-- Indexes for table `triaje`
--
ALTER TABLE `triaje`
  ADD KEY `id_cita` (`id_cita`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`hc_paciente`) REFERENCES `paciente` (`hc_paciente`);

--
-- Constraints for table `det_especialidad`
--
ALTER TABLE `det_especialidad`
  ADD CONSTRAINT `det_doctor_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `det_doctor_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Constraints for table `triaje`
--
ALTER TABLE `triaje`
  ADD CONSTRAINT `triaje_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
--
-- Database: `grupo4`
--
CREATE DATABASE IF NOT EXISTS `grupo4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grupo4`;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--
-- Error reading structure for table phpmyadmin.pma__bookmark: #1932 - Table &#039;phpmyadmin.pma__bookmark&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__bookmark: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__bookmark`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--
-- Error reading structure for table phpmyadmin.pma__central_columns: #1932 - Table &#039;phpmyadmin.pma__central_columns&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__central_columns: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__central_columns`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--
-- Error reading structure for table phpmyadmin.pma__column_info: #1932 - Table &#039;phpmyadmin.pma__column_info&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__column_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__column_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--
-- Error reading structure for table phpmyadmin.pma__designer_settings: #1932 - Table &#039;phpmyadmin.pma__designer_settings&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__designer_settings: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__designer_settings`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--
-- Error reading structure for table phpmyadmin.pma__export_templates: #1932 - Table &#039;phpmyadmin.pma__export_templates&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__export_templates: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__export_templates`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--
-- Error reading structure for table phpmyadmin.pma__favorite: #1932 - Table &#039;phpmyadmin.pma__favorite&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__favorite: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__favorite`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--
-- Error reading structure for table phpmyadmin.pma__history: #1932 - Table &#039;phpmyadmin.pma__history&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__history: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__history`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--
-- Error reading structure for table phpmyadmin.pma__navigationhiding: #1932 - Table &#039;phpmyadmin.pma__navigationhiding&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__navigationhiding: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__navigationhiding`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--
-- Error reading structure for table phpmyadmin.pma__pdf_pages: #1932 - Table &#039;phpmyadmin.pma__pdf_pages&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__pdf_pages: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__pdf_pages`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--
-- Error reading structure for table phpmyadmin.pma__recent: #1932 - Table &#039;phpmyadmin.pma__recent&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__recent: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__recent`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--
-- Error reading structure for table phpmyadmin.pma__relation: #1932 - Table &#039;phpmyadmin.pma__relation&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__relation: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__relation`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--
-- Error reading structure for table phpmyadmin.pma__savedsearches: #1932 - Table &#039;phpmyadmin.pma__savedsearches&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__savedsearches: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__savedsearches`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--
-- Error reading structure for table phpmyadmin.pma__table_coords: #1932 - Table &#039;phpmyadmin.pma__table_coords&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_coords: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_coords`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--
-- Error reading structure for table phpmyadmin.pma__table_info: #1932 - Table &#039;phpmyadmin.pma__table_info&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--
-- Error reading structure for table phpmyadmin.pma__table_uiprefs: #1932 - Table &#039;phpmyadmin.pma__table_uiprefs&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_uiprefs`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--
-- Error reading structure for table phpmyadmin.pma__tracking: #1932 - Table &#039;phpmyadmin.pma__tracking&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__tracking: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__tracking`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--
-- Error reading structure for table phpmyadmin.pma__userconfig: #1932 - Table &#039;phpmyadmin.pma__userconfig&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__userconfig: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__userconfig`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--
-- Error reading structure for table phpmyadmin.pma__usergroups: #1932 - Table &#039;phpmyadmin.pma__usergroups&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__usergroups: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__usergroups`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--
-- Error reading structure for table phpmyadmin.pma__users: #1932 - Table &#039;phpmyadmin.pma__users&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__users`&#039; at line 1
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `texasdb`
--
CREATE DATABASE IF NOT EXISTS `texasdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `texasdb`;

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--
-- Error reading structure for table texasdb.articulo: #1932 - Table &#039;texasdb.articulo&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.articulo: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`articulo`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `atencion`
--
-- Error reading structure for table texasdb.atencion: #1932 - Table &#039;texasdb.atencion&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.atencion: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`atencion`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--
-- Error reading structure for table texasdb.categoria: #1932 - Table &#039;texasdb.categoria&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.categoria: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`categoria`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--
-- Error reading structure for table texasdb.empleado: #1932 - Table &#039;texasdb.empleado&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.empleado: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`empleado`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mediopago`
--
-- Error reading structure for table texasdb.mediopago: #1932 - Table &#039;texasdb.mediopago&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.mediopago: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`mediopago`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--
-- Error reading structure for table texasdb.pago: #1932 - Table &#039;texasdb.pago&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.pago: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`pago`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--
-- Error reading structure for table texasdb.pedido: #1932 - Table &#039;texasdb.pedido&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.pedido: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`pedido`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--
-- Error reading structure for table texasdb.rol: #1932 - Table &#039;texasdb.rol&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.rol: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`rol`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tipo_comprobante`
--
-- Error reading structure for table texasdb.tipo_comprobante: #1932 - Table &#039;texasdb.tipo_comprobante&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.tipo_comprobante: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`tipo_comprobante`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--
-- Error reading structure for table texasdb.usuario: #1932 - Table &#039;texasdb.usuario&#039; doesn&#039;t exist in engine
-- Error reading data for table texasdb.usuario: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `texasdb`.`usuario`&#039; at line 1
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
