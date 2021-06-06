-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2021 a las 01:31:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpfinal-grupo06`
--
CREATE DATABASE IF NOT EXISTS `tpfinal-grupo06` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tpfinal-grupo06`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrastre`
--

CREATE TABLE `arrastre` (
  `Id` int(255) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Patente` varchar(10) NOT NULL,
  `NroChasis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastre`
--

INSERT INTO `arrastre` (`Id`, `Codigo`, `Descripcion`, `Patente`, `NroChasis`) VALUES
(1, 1, 'Araña', 'AA100AS', '585822'),
(2, 2, 'Araña', 'AC125AD', '605737'),
(3, 3, 'Jaula', 'AC296AS', '882174'),
(4, 4, 'Jaula', 'AB318AD', '595287'),
(5, 5, 'Tanque', 'AB405AG', '583419'),
(6, 6, 'Granel', 'AA624AS', '852157');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargascombustible`
--

CREATE TABLE `cargascombustible` (
  `Id` int(255) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `LitroCargado` int(11) NOT NULL,
  `PrecioxLitro` int(11) NOT NULL,
  `Importe` double NOT NULL,
  `pEmpleado` int(11) NOT NULL,
  `pVehiculo` int(11) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(255) NOT NULL,
  `Codigo` int(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Dni` varchar(50) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL,
  `pLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `Codigo`, `Nombre`, `Apellido`, `Dni`, `Domicilio`, `pProvincia`, `pLocalidad`) VALUES
(1, 1, 'Ricardo', 'Fort', '25598516', 'Av. Miami 2012', 1, 5),
(2, 2, 'Marcelo Hugo', 'Tinelli', '18365482', 'Segurola 654', 1, 6),
(3, 3, 'Lionel Andres', 'Messi', '33016244', 'Reina Elisenda 26', 1, 7),
(4, 4, 'Jean Claude', 'Van-Damme', '12659845', 'Coronel Brandsen 1048', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id` int(255) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `pTipoEmpleado` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Dni` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL,
  `pLocalidad` int(11) NOT NULL,
  `pLicencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Id`, `Codigo`, `pTipoEmpleado`, `Nombre`, `Apellido`, `Dni`, `pProvincia`, `pLocalidad`, `pLicencia`) VALUES
(1, 1, 1, 'Julio', 'Buffarini', '2365452', 4, 12, 5),
(2, 2, 2, 'Rawl', 'Alejandro', '35872156', 10, 9, NULL),
(3, 3, 1, 'Anuel', 'AA', '32548932', 14, 11, 11),
(4, 4, 2, 'J', 'Balvin', '31687231', 21, 13, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `Id` int(255) NOT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`Id`, `Codigo`, `Descripcion`) VALUES
(1, 'Class 1', 'Camiones sin acomplado hasta 12.000kg'),
(2, 'Class 2', 'Gases'),
(3, 'Class 3', 'Flammable Liquids'),
(4, 'Class 4.1', 'Flammable Solids or Substances'),
(5, 'Class 4.2', 'Flammable solids'),
(6, 'Class 4.3', 'Substances which, in contact with water, emit flam'),
(7, 'Class 5.1', 'Miscellaneous dangerous substances and articles'),
(8, 'Class 5.2', 'Organic peroxides - most will burn rapidly and are'),
(9, 'Class 6.1', 'Toxic substances'),
(10, 'Class 6.2', 'Infectious substances'),
(11, 'Class 7', 'Radioactive Substances'),
(12, 'Class 8', 'Corrosives'),
(13, 'Class 9', 'Miscellaneous dangerous substances and articles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`Id`, `Codigo`, `Descripcion`, `pProvincia`) VALUES
(1, 1, 'Caseros', 1),
(2, 2, 'Moron', 1),
(3, 3, 'Ituzaingo', 1),
(4, 4, 'Gonzalez Catan', 1),
(5, 5, 'Moreno', 1),
(6, 6, 'Pilar', 1),
(7, 7, 'Santos Lugares', 1),
(8, 8, 'Ciudadela', 1),
(9, 9, 'Villa Carlos Paz', 10),
(10, 10, 'San Rafael', 8),
(11, 11, 'Colon', 14),
(12, 12, 'Trelew', 4),
(13, 13, 'La Quiaca', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `Id` int(255) NOT NULL,
  `pVehiculo` int(50) NOT NULL,
  `Fecha` datetime NOT NULL,
  `pService` int(50) NOT NULL,
  `pEmpleado` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `Id` int(11) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`Id`, `Codigo`, `Descripcion`) VALUES
(1, 1, 'IVECO'),
(2, 2, 'SCANIA'),
(3, 3, 'MERCEDES BENZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `Id` int(11) NOT NULL,
  `Codigo` varchar(20) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `pMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`Id`, `Codigo`, `Descripcion`, `pMarca`) VALUES
(1, '1', 'Daily', 1),
(2, '2', 'Eurostar', 1),
(3, '3', 'G310', 2),
(4, '4', 'G460', 2),
(5, '5', 'Actros 1846', 3),
(6, '6', 'Axor', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `Id` int(50) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`Id`, `Codigo`, `Descripcion`) VALUES
(1, 1, 'Buenos Aires'),
(2, 2, 'Tierra del Fuego'),
(3, 3, 'Santa Cruz'),
(4, 4, 'Chubut'),
(5, 5, 'Rio Negro'),
(6, 6, 'Neuquen'),
(7, 7, 'La Pampa'),
(8, 8, 'Mendoza'),
(9, 9, 'San Luis'),
(10, 10, 'Cordoba'),
(11, 11, 'San Juan'),
(12, 12, 'La Rioja'),
(13, 13, 'Santa Fe'),
(14, 14, 'Entre Rios'),
(15, 15, 'Corrientes'),
(16, 16, 'Chaco'),
(17, 17, 'Santiago del Estero'),
(18, 18, 'Tucuman'),
(19, 19, 'Catamarca'),
(20, 20, 'Salta'),
(21, 21, 'Jujuy'),
(22, 22, 'Formosa'),
(23, 23, 'Misiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesto`
--

CREATE TABLE `respuesto` (
  `Id` int(11) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesto`
--

INSERT INTO `respuesto` (`Id`, `Codigo`, `Descripcion`, `Precio`) VALUES
(1, 1, 'Rueda Scania G310', 100000),
(2, 2, 'Aceite Motul 5100', 10000),
(3, 3, 'Eje trasero M.BENZ Actros 1846', 30000),
(4, 4, 'Lona protectora de arrastre', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `Id` int(255) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `pTipoService` int(50) NOT NULL,
  `ImporteFinal` double NOT NULL,
  `FechaDesde` datetime NOT NULL,
  `FechaHasta` datetime NOT NULL,
  `pEmpleado` int(50) NOT NULL,
  `pVehiculo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`Id`, `Codigo`, `pTipoService`, `ImporteFinal`, `FechaDesde`, `FechaHasta`, `pEmpleado`, `pVehiculo`) VALUES
(1, 1, 2, 40000, '2020-01-01 17:39:40', '2020-07-16 22:39:40', 2, 3),
(2, 2, 1, 100000, '2020-10-08 22:39:40', '2020-11-12 22:39:40', 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicerepuesto`
--

CREATE TABLE `servicerepuesto` (
  `id` int(255) NOT NULL,
  `pService` int(255) NOT NULL,
  `pRepuesto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicerepuesto`
--

INSERT INTO `servicerepuesto` (`id`, `pService`, `pRepuesto`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursalorigen`
--

CREATE TABLE `sucursalorigen` (
  `id` int(11) NOT NULL,
  `Codigo` int(20) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL,
  `pLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursalorigen`
--

INSERT INTO `sucursalorigen` (`id`, `Codigo`, `Direccion`, `pProvincia`, `pLocalidad`) VALUES
(1, 1, 'Urquiza 2856', 1, 1),
(2, 2, 'Brandsen', 8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempleado`
--

CREATE TABLE `tipoempleado` (
  `Id` int(255) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoempleado`
--

INSERT INTO `tipoempleado` (`Id`, `Codigo`, `Descripcion`) VALUES
(1, 1, 'Chofer'),
(2, 2, 'Mecanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervice`
--

CREATE TABLE `tiposervice` (
  `id` int(255) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposervice`
--

INSERT INTO `tiposervice` (`id`, `Codigo`, `Descripcion`) VALUES
(1, 1, 'Taller Externo'),
(2, 2, 'Taller Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `Id` int(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`Id`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Chofer'),
(4, 'Llano'),
(5, 'Encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`id`, `Codigo`, `Descripcion`) VALUES
(1, 1, 'Camion con acoplado'),
(2, 2, 'Camion sin acoplar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciondiaria`
--

CREATE TABLE `ubicaciondiaria` (
  `Id` int(255) NOT NULL,
  `Codigo` int(50) NOT NULL,
  `pEmpleado` int(50) NOT NULL,
  `pVehiculo` int(50) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Codigo` int(255) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Hash` varchar(50) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT 0,
  `pTipoUsuario` int(50) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Codigo`, `Nombre`, `Apellido`, `Email`, `Password`, `Hash`, `Active`, `pTipoUsuario`) VALUES
(1, 0, 'admin', 'admin', 'garlopacompany@gmail.com', 'Unlam2020', '', 0, 1),
(6, 0, 'Ariel', 'Molina', 'emilianonahuelortiz@hotmail.com', '123', 'c8c41c4a18675a74e01c8a20e8a0f662', 1, 4),
(10, 0, 'Emiliano', 'Ortiz', 'emiortiz1992@gmail.com', '123', '0d7de1aca9299fe63f3e0041f02638a3', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(255) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `pModelo` int(20) NOT NULL,
  `Patente` varchar(50) NOT NULL,
  `NroChasis` varchar(50) NOT NULL,
  `NroMotor` varchar(20) NOT NULL,
  `AñoFabricacion` date NOT NULL,
  `pTipoVehiculo` int(50) NOT NULL,
  `pArrastre` int(50) DEFAULT NULL,
  `kilometraje` bigint(255) UNSIGNED NOT NULL,
  `pMantenimiento` int(50) DEFAULT NULL,
  `pMarca` int(50) NOT NULL,
  `Alarma` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `Codigo`, `pModelo`, `Patente`, `NroChasis`, `NroMotor`, `AñoFabricacion`, `pTipoVehiculo`, `pArrastre`, `kilometraje`, `pMantenimiento`, `pMarca`, `Alarma`) VALUES
(3, 1, 1, 'AA123CD', 'L53879558', '53879558', '2010-11-06', 1, 1, 20, NULL, 1, b'0'),
(4, 2, 2, 'AA150QW', 'I82039512', '82039512', '2012-06-24', 2, NULL, 56, NULL, 2, b'0'),
(5, 3, 6, 'AD870QW', 'M30207594', '30207594', '2020-05-12', 2, NULL, 5, NULL, 3, b'0'),
(6, 4, 1, 'AC342WW', 'D44260023', '44260023', '2015-11-25', 1, 3, 18, NULL, 1, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajeconcretado`
--

CREATE TABLE `viajeconcretado` (
  `Id` int(255) NOT NULL,
  `pViajes` int(255) NOT NULL,
  `FechaReal` datetime NOT NULL,
  `KmRecorrido` int(255) NOT NULL,
  `CombustibleCons` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `pEmpleado` int(11) NOT NULL,
  `pSucursalOrigen` int(11) NOT NULL,
  `pCliente` int(11) NOT NULL,
  `pVehiculo` int(11) NOT NULL,
  `pArrastre` int(11) NOT NULL,
  `FechaOrigen` datetime NOT NULL,
  `FechaEstimada` datetime NOT NULL,
  `KmEstimado` int(11) NOT NULL,
  `CombustibleEst` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `Finalizado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vtipoxusuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vtipoxusuario` (
`IdUsuario` int(11)
,`Nombre` varchar(30)
,`Apellido` varchar(30)
,`Email` varchar(50)
,`Password` varchar(50)
,`Active` int(1)
,`Descripcion` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vtipoxusuario`
--
DROP TABLE IF EXISTS `vtipoxusuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtipoxusuario`  AS  select `u`.`Id` AS `IdUsuario`,`u`.`Nombre` AS `Nombre`,`u`.`Apellido` AS `Apellido`,`u`.`Email` AS `Email`,`u`.`Password` AS `Password`,`u`.`Active` AS `Active`,`t`.`Descripcion` AS `Descripcion` from (`usuario` `u` join `tipousuario` `t` on(`u`.`pTipoUsuario` = `t`.`Id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrastre`
--
ALTER TABLE `arrastre`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `cargascombustible`
--
ALTER TABLE `cargascombustible`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pEmpleado` (`pEmpleado`),
  ADD KEY `pVehiculo` (`pVehiculo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pLocalidad` (`pLocalidad`),
  ADD KEY `pProvincia` (`pProvincia`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pLicencia` (`pLicencia`),
  ADD KEY `pLocalidad` (`pLocalidad`),
  ADD KEY `pProvincia` (`pProvincia`),
  ADD KEY `empleado_ibfk_4` (`pTipoEmpleado`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pProvincia` (`pProvincia`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pVehiculo` (`pVehiculo`),
  ADD KEY `pService` (`pService`),
  ADD KEY `pEmpleado` (`pEmpleado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pMarca` (`pMarca`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `respuesto`
--
ALTER TABLE `respuesto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pEmpleado` (`pEmpleado`),
  ADD KEY `pTipoService` (`pTipoService`),
  ADD KEY `pVehiculo` (`pVehiculo`);

--
-- Indices de la tabla `servicerepuesto`
--
ALTER TABLE `servicerepuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pService` (`pService`),
  ADD KEY `pRepuesto` (`pRepuesto`);

--
-- Indices de la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pLocalidad` (`pLocalidad`),
  ADD KEY `pProvincia` (`pProvincia`);

--
-- Indices de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tiposervice`
--
ALTER TABLE `tiposervice`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pEmpleado` (`pEmpleado`),
  ADD KEY `pVehiculo` (`pVehiculo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pTipoUsuario` (`pTipoUsuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pTipoVehiculo` (`pTipoVehiculo`),
  ADD KEY `pArrastre` (`pArrastre`),
  ADD KEY `pMantenimiento` (`pMantenimiento`),
  ADD KEY `pMarca` (`pMarca`),
  ADD KEY `pModelo` (`pModelo`);

--
-- Indices de la tabla `viajeconcretado`
--
ALTER TABLE `viajeconcretado`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pViajes` (`pViajes`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pArrastre` (`pArrastre`),
  ADD KEY `pEmpleado` (`pEmpleado`),
  ADD KEY `pSucursalOrigen` (`pSucursalOrigen`),
  ADD KEY `pVehiculo` (`pVehiculo`),
  ADD KEY `pCliente` (`pCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arrastre`
--
ALTER TABLE `arrastre`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cargascombustible`
--
ALTER TABLE `cargascombustible`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `respuesto`
--
ALTER TABLE `respuesto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicerepuesto`
--
ALTER TABLE `servicerepuesto`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiposervice`
--
ALTER TABLE `tiposervice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `viajeconcretado`
--
ALTER TABLE `viajeconcretado`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargascombustible`
--
ALTER TABLE `cargascombustible`
  ADD CONSTRAINT `cargascombustible_ibfk_1` FOREIGN KEY (`pEmpleado`) REFERENCES `empleado` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cargascombustible_ibfk_2` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`pLicencia`) REFERENCES `licencia` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_4` FOREIGN KEY (`pTipoEmpleado`) REFERENCES `tipoempleado` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`pService`) REFERENCES `service` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`pEmpleado`) REFERENCES `empleado` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`pMarca`) REFERENCES `marca` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`pEmpleado`) REFERENCES `empleado` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`pTipoService`) REFERENCES `tiposervice` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicerepuesto`
--
ALTER TABLE `servicerepuesto`
  ADD CONSTRAINT `servicerepuesto_ibfk_1` FOREIGN KEY (`pService`) REFERENCES `service` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicerepuesto_ibfk_2` FOREIGN KEY (`pRepuesto`) REFERENCES `respuesto` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
  ADD CONSTRAINT `sucursalorigen_ibfk_1` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursalorigen_ibfk_2` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  ADD CONSTRAINT `ubicaciondiaria_ibfk_1` FOREIGN KEY (`pEmpleado`) REFERENCES `empleado` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicaciondiaria_ibfk_2` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`pTipoUsuario`) REFERENCES `tipousuario` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`pTipoVehiculo`) REFERENCES `tipovehiculo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`pArrastre`) REFERENCES `arrastre` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`pMantenimiento`) REFERENCES `mantenimiento` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_4` FOREIGN KEY (`pMarca`) REFERENCES `marca` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_5` FOREIGN KEY (`pModelo`) REFERENCES `modelo` (`Id`);

--
-- Filtros para la tabla `viajeconcretado`
--
ALTER TABLE `viajeconcretado`
  ADD CONSTRAINT `viajeconcretado_ibfk_1` FOREIGN KEY (`pViajes`) REFERENCES `viajes` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`pArrastre`) REFERENCES `arrastre` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`pEmpleado`) REFERENCES `empleado` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`pSucursalOrigen`) REFERENCES `sucursalorigen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_5` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_6` FOREIGN KEY (`pCliente`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
