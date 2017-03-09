-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 09:19 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worktracking`
--
CREATE DATABASE IF NOT EXISTS `worktracking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `worktracking`;

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) UNSIGNED NOT NULL,
  `rh_id` int(10) UNSIGNED DEFAULT NULL,
  `rm_id` int(10) UNSIGNED DEFAULT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asignacion_de_recursos_humanos`
--

DROP TABLE IF EXISTS `asignacion_de_recursos_humanos`;
CREATE TABLE `asignacion_de_recursos_humanos` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) NOT NULL,
  `rh_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asignacion_de_recursos_materiales`
--

DROP TABLE IF EXISTS `asignacion_de_recursos_materiales`;
CREATE TABLE `asignacion_de_recursos_materiales` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) NOT NULL,
  `rm_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `rif` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `ing_e_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing_e_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing_e_cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing_e_correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing_e_telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing_s_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_s_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_s_cedula` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_s_correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_s_telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costos`
--

DROP TABLE IF EXISTS `costos`;
CREATE TABLE `costos` (
  `id` int(10) UNSIGNED NOT NULL,
  `costo_real` float(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `actividad_id` int(10) UNSIGNED NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
CREATE TABLE `feriados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gantt`
--

DROP TABLE IF EXISTS `gantt`;
CREATE TABLE `gantt` (
  `id` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `progress` float NOT NULL,
  `sortorder` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gantt_conexiones`
--

DROP TABLE IF EXISTS `gantt_conexiones`;
CREATE TABLE `gantt_conexiones` (
  `id` int(11) NOT NULL,
  `source` int(11) DEFAULT NULL,
  `target` int(11) NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menues`
--

DROP TABLE IF EXISTS `menues`;
CREATE TABLE `menues` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menues`
--

INSERT INTO `menues` (`id`, `nombre`, `icono`, `clase`, `creado`, `editado`) VALUES
(1, 'Registro', 'clip-database', 'Registro', '2014-12-03 23:23:12', '2014-12-03 23:23:12'),
(2, 'Proyecto', 'clip-screen', 'Proyecto', '2014-12-03 23:23:12', '2014-12-03 23:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `profesiones`
--

DROP TABLE IF EXISTS `profesiones`;
CREATE TABLE `profesiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`, `descripcion`, `estado`, `creado`, `editado`) VALUES
(1, 'Ingeniero de ComputaciÃ³n', 'La ingenierÃ­a en computaciÃ³n estudia el desarrollo de sistemas automatizados y el uso de los lenguajes de programaciÃ³n; de igual forma se enfoca al anÃ¡lisis, diseÃ±o y la utilizaciÃ³n del hardware y software para lograr la implementaciÃ³n de las mÃ¡s ', 1, '2015-01-05 12:27:05', '2015-02-21 13:56:58'),
(2, 'Arquitecto', 'El arquitecto es el profesional que se encarga de proyectar, diseÃ±ar, construir, y mantener edificios, ciudades y estructuras de diverso tipo.', 0, '2015-02-21 22:07:56', '2015-02-21 22:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costo` float(8,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `rh_id` int(10) UNSIGNED NOT NULL,
  `proyecto_estado_id` int(10) NOT NULL,
  `gantt_id` int(10) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proyectos_estados`
--

DROP TABLE IF EXISTS `proyectos_estados`;
CREATE TABLE `proyectos_estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyectos_estados`
--

INSERT INTO `proyectos_estados` (`id`, `nombre`, `clase`) VALUES
(1, 'Por Empezar', 'label label-inverse'),
(2, 'En Proceso', 'label label-default'),
(3, 'En Pausa', 'label label-warning'),
(4, 'Culminado', 'label label-success');

-- --------------------------------------------------------

--
-- Table structure for table `recursos_humanos`
--

DROP TABLE IF EXISTS `recursos_humanos`;
CREATE TABLE `recursos_humanos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `honorario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_de_colegiatura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `profesion_id` int(10) UNSIGNED DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recursos_humanos`
--

INSERT INTO `recursos_humanos` (`id`, `nombre`, `apellido`, `cedula`, `direccion`, `telefono`, `honorario`, `usuario`, `clave`, `correo`, `numero_de_colegiatura`, `rol_id`, `profesion_id`, `estado`, `creado`, `editado`) VALUES
(9, 'admin', 'admin', 'V-23423423', 'admin', '0414-2312312', '21223123', 'ADMIN', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', '', 1, 1, 1, '2017-03-09 16:06:43', '2017-03-09 16:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `recursos_humanos_proyectos`
--

DROP TABLE IF EXISTS `recursos_humanos_proyectos`;
CREATE TABLE `recursos_humanos_proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `rh_id` int(10) UNSIGNED NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recursos_materiales`
--

DROP TABLE IF EXISTS `recursos_materiales`;
CREATE TABLE `recursos_materiales` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `abreviatura` varchar(4) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `costo` float NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recursos_materiales`
--

INSERT INTO `recursos_materiales` (`id`, `nombre`, `abreviatura`, `cantidad`, `costo`, `estado`, `creado`, `editado`) VALUES
(1, 'Computadora', 'PC', 100, 500, 1, '2015-01-19 12:54:43', '2015-02-03 15:18:12'),
(2, 'Impresora', 'IMPR', 60, 100, 1, '2015-02-03 15:42:50', '2015-02-03 15:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `crear` tinyint(1) NOT NULL,
  `leer` tinyint(1) NOT NULL,
  `editar` tinyint(1) NOT NULL,
  `eliminar` tinyint(1) NOT NULL,
  `parametros` text COLLATE utf8_unicode_ci NOT NULL,
  `registros` text COLLATE utf8_unicode_ci NOT NULL,
  `seguimiento` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `crear`, `leer`, `editar`, `eliminar`, `parametros`, `registros`, `seguimiento`, `creado`, `editado`) VALUES
(1, 'Master', 1, 1, 1, 1, 'Clientes;Feriados;Profesiones;Proyectos;Recursos Humanos;Recursos Materiales;Roles', 'AsignaciÃ³n de Recursos;InformaciÃ³n de Actividades;Reportes', 'Creado;Editado', '2014-12-03 23:23:11', '2015-02-22 01:15:51'),
(2, 'Administrador', 1, 1, 1, 0, 'Clientes;Recursos Humanos', 'InformaciÃ³n de Actividades;Reportes', '', '2015-01-23 12:36:45', '2015-02-02 11:04:52'),
(3, 'Cliente', 0, 1, 0, 0, '', 'Costos;Reportes', '', '2015-01-23 12:37:21', '2015-01-25 17:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `submenues`
--

DROP TABLE IF EXISTS `submenues`;
CREATE TABLE `submenues` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subclase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submenues`
--

INSERT INTO `submenues` (`id`, `nombre`, `ruta`, `clase`, `subclase`, `menu_id`, `creado`, `editado`) VALUES
(1, 'Clientes', 'app/Registro/Clientes/', 'Registro', 'Clientes', 1, '2014-12-03 23:23:13', '2014-12-03 23:23:13'),
(2, 'Feriados', 'app/Registro/Feriados/', 'Registro', 'Feriados', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Profesiones', 'app/Registro/Profesiones/', 'Registro', 'Profesiones', 1, '2014-12-03 23:23:14', '2014-12-03 23:23:14'),
(4, 'Proyectos', 'app/Registro/Proyectos/', 'Registro', 'Proyectos', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Recursos Humanos', 'app/Registro/Recursos Humanos/', 'Registro', 'Recursos Humanos', 1, '2015-01-14 10:56:00', '2015-01-14 10:56:00'),
(6, 'Recursos Materiales', 'app/Registro/Recursos Materiales/', 'Registro', 'Recursos Materiales', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Roles', 'app/Registro/Roles/', 'Registro', 'Roles', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'AsignaciÃ³n de Recursos', 'app/Proyecto/Asignacion de Recursos/', 'Proyecto', 'AsignaciÃ³n de Recursos', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'InformaciÃ³n de Actividades', 'app/Proyecto/Informacion de Actividades/', 'Proyecto', 'InformaciÃ³n de  Actividades', 2, '2014-12-03 23:23:14', '2014-12-03 23:23:14'),
(10, 'Reportes', 'app/Proyecto/Reportes/', 'Proyecto', 'Reportes', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_proyecto_id_foreign` (`proyecto_id`),
  ADD KEY `actividades_rh_id_foreign` (`rh_id`),
  ADD KEY `actividades_rm_id_foreign` (`rm_id`);

--
-- Indexes for table `asignacion_de_recursos_humanos`
--
ALTER TABLE `asignacion_de_recursos_humanos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id_rh_foreign` (`task_id`),
  ADD KEY `rh_id_rh_foreign` (`rh_id`);

--
-- Indexes for table `asignacion_de_recursos_materiales`
--
ALTER TABLE `asignacion_de_recursos_materiales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rm_id_rm_foreign` (`rm_id`),
  ADD KEY `task_id_rm_foreign` (`task_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_rif_unique` (`rif`),
  ADD KEY `cliente_rol_id_foreign` (`rol_id`);

--
-- Indexes for table `costos`
--
ALTER TABLE `costos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costs_activity_id_foreign` (`actividad_id`),
  ADD KEY `costs_project_id_foreign` (`proyecto_id`);

--
-- Indexes for table `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gantt`
--
ALTER TABLE `gantt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gantt_conexiones`
--
ALTER TABLE `gantt_conexiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `source_gannt` (`source`),
  ADD KEY `target` (`target`);

--
-- Indexes for table `menues`
--
ALTER TABLE `menues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_cliente_id_foreign` (`cliente_id`),
  ADD KEY `proyecto_proyecto_estado_id_foreign` (`proyecto_estado_id`),
  ADD KEY `proyecto_gantt_id_foreign` (`gantt_id`),
  ADD KEY `Proyecto_rh_id_foreign` (`rh_id`);

--
-- Indexes for table `proyectos_estados`
--
ALTER TABLE `proyectos_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recursos_humanos`
--
ALTER TABLE `recursos_humanos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_rol_id_foreign` (`rol_id`),
  ADD KEY `rh_profesion_id_foreign` (`profesion_id`);

--
-- Indexes for table `recursos_humanos_proyectos`
--
ALTER TABLE `recursos_humanos_proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engineersprojects_engineer_id_foreign` (`rh_id`),
  ADD KEY `engineersprojects_project_id_foreign` (`proyecto_id`);

--
-- Indexes for table `recursos_materiales`
--
ALTER TABLE `recursos_materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenues`
--
ALTER TABLE `submenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menu_id_foreign` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asignacion_de_recursos_humanos`
--
ALTER TABLE `asignacion_de_recursos_humanos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `asignacion_de_recursos_materiales`
--
ALTER TABLE `asignacion_de_recursos_materiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `costos`
--
ALTER TABLE `costos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gantt`
--
ALTER TABLE `gantt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gantt_conexiones`
--
ALTER TABLE `gantt_conexiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menues`
--
ALTER TABLE `menues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyectos_estados`
--
ALTER TABLE `proyectos_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `recursos_humanos`
--
ALTER TABLE `recursos_humanos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `recursos_humanos_proyectos`
--
ALTER TABLE `recursos_humanos_proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recursos_materiales`
--
ALTER TABLE `recursos_materiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submenues`
--
ALTER TABLE `submenues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_rh_id_foreign` FOREIGN KEY (`rh_id`) REFERENCES `recursos_humanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_rm_id_foreign` FOREIGN KEY (`rm_id`) REFERENCES `recursos_materiales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asignacion_de_recursos_humanos`
--
ALTER TABLE `asignacion_de_recursos_humanos`
  ADD CONSTRAINT `rh_id_rh_foreign` FOREIGN KEY (`rh_id`) REFERENCES `recursos_humanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_id_rh_foreign` FOREIGN KEY (`task_id`) REFERENCES `gantt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asignacion_de_recursos_materiales`
--
ALTER TABLE `asignacion_de_recursos_materiales`
  ADD CONSTRAINT `rm_id_rm_foreign` FOREIGN KEY (`rm_id`) REFERENCES `recursos_materiales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_id_rm_foreign` FOREIGN KEY (`task_id`) REFERENCES `gantt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `cliente_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `costos`
--
ALTER TABLE `costos`
  ADD CONSTRAINT `costs_activity_id_foreign` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `costs_project_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gantt_conexiones`
--
ALTER TABLE `gantt_conexiones`
  ADD CONSTRAINT `source_gannt` FOREIGN KEY (`source`) REFERENCES `gantt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `target` FOREIGN KEY (`target`) REFERENCES `gantt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `Proyecto_rh_id_foreign` FOREIGN KEY (`rh_id`) REFERENCES `recursos_humanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyecto_gantt_id_foreign` FOREIGN KEY (`gantt_id`) REFERENCES `gantt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyecto_proyecto_estado_id_foreign` FOREIGN KEY (`proyecto_estado_id`) REFERENCES `proyectos_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recursos_humanos`
--
ALTER TABLE `recursos_humanos`
  ADD CONSTRAINT `rh_profesion_id_foreign` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recursos_humanos_proyectos`
--
ALTER TABLE `recursos_humanos_proyectos`
  ADD CONSTRAINT `engineersprojects_project_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recursos_humanos_rh_id_foreign` FOREIGN KEY (`rh_id`) REFERENCES `recursos_humanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenues`
--
ALTER TABLE `submenues`
  ADD CONSTRAINT `submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
