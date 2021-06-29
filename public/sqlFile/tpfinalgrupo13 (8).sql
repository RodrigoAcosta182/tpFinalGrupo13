-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 01:50:14
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
-- Base de datos: `tpfinalgrupo13`
--
CREATE DATABASE IF NOT EXISTS `tpfinalgrupo13` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tpfinalgrupo13`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrastre`
--

CREATE TABLE `arrastre` (
  `Id` int(255) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Patente` varchar(10) NOT NULL,
  `NroChasis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastre`
--

INSERT INTO `arrastre` (`Id`, `Descripcion`, `Patente`, `NroChasis`) VALUES
(1, 'Araña', 'AA100AS', '5858222'),
(2, 'Araña', 'AC125AD', '605737'),
(3, 'Jaula', 'AC296AS', '882174'),
(4, 'Jaula', 'AB318AD', '5952872'),
(5, 'Tanque', 'AB405AG', '583419'),
(6, 'Granel', 'AA624AS', '852157');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargascombustible`
--

CREATE TABLE `cargascombustible` (
  `Id` int(255) NOT NULL,
  `LitroCargado` int(11) NOT NULL,
  `PrecioxLitro` int(11) NOT NULL,
  `Importe` double NOT NULL,
  `pUsuario` int(11) NOT NULL,
  `pVehiculo` int(11) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Dni` varchar(50) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id`, `Nombre`, `Apellido`, `Dni`, `Domicilio`, `Activo`) VALUES
(1, 'Gordo', 'Gordomedov', '125', 'Av. Miami 2012', b'1'),
(2, 'Marcelo Hugo', 'Tinelli', '18365482', 'Segurola 654', b'1'),
(3, 'Lionel Andres', 'Messi', '33016244', 'Reina Elisenda 26', b'1'),
(4, 'Jean Claudio', 'Van-Damme', '12659845', 'Coronel Brandsen 1048', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id` int(50) NOT NULL,
  `Prefijo` int(255) NOT NULL,
  `Numero` int(255) NOT NULL,
  `Fecha_emision` datetime NOT NULL,
  `pCliente` int(11) NOT NULL,
  `pViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `Id` int(255) NOT NULL,
  `Codigo` varchar(255) DEFAULT NULL,
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
(13, 'Class 9', 'Miscellaneous dangerous substances and articles'),
(14, 'Sin licencia', 'Sin licencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`Id`, `Descripcion`, `pProvincia`) VALUES
(1, 'Caseros', 1),
(2, 'Moron', 1),
(3, 'Ituzaingo', 1),
(4, 'Gonzalez Catan', 1),
(5, 'Moreno', 1),
(6, 'Pilar', 1),
(7, 'Santos Lugares', 1),
(8, 'Ciudadela', 1),
(9, 'Villa Carlos Paz', 10),
(10, 'San Rafael', 8),
(11, 'Colon', 14),
(12, 'Trelew', 4),
(13, 'La Quiaca', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `Id` int(255) NOT NULL,
  `pVehiculo` int(50) NOT NULL,
  `Importe` decimal(10,0) NOT NULL,
  `FechaDesde` date NOT NULL,
  `FechaHasta` date NOT NULL,
  `pService` int(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`Id`, `pVehiculo`, `Importe`, `FechaDesde`, `FechaHasta`, `pService`, `Descripcion`) VALUES
(2, 3, '4500', '2021-01-26', '2021-06-30', 2, 'Cambio de aceite'),
(3, 6, '95000', '2021-06-28', '2021-09-30', 1, 'Cambio de motor'),
(4, 4, '15000', '2021-06-26', '2021-06-30', 2, 'cambio de cubiertas'),
(5, 4, '70000', '2021-02-03', '2021-03-10', 2, 'Chasis roto'),
(6, 4, '9000', '2021-06-27', '2021-06-29', 2, 'emparchar rueda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`Id`, `Descripcion`) VALUES
(1, 'IVECO'),
(2, 'SCANIA'),
(3, 'MERCEDES BENZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `pMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`Id`, `Descripcion`, `pMarca`) VALUES
(1, 'Daily', 1),
(2, 'Eurostar', 1),
(3, 'G310', 2),
(4, 'G460', 2),
(5, 'Actros 1846', 3),
(6, 'Axor', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `Id` int(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`Id`, `Descripcion`) VALUES
(1, 'Buenos Aires'),
(2, 'Tierra del Fuego'),
(3, 'Santa Cruz'),
(4, 'Chubut'),
(5, 'Rio Negro'),
(6, 'Neuquen'),
(7, 'La Pampa'),
(8, 'Mendoza'),
(9, 'San Luis'),
(10, 'Cordoba'),
(11, 'San Juan'),
(12, 'La Rioja'),
(13, 'Santa Fe'),
(14, 'Entre Rios'),
(15, 'Corrientes'),
(16, 'Chaco'),
(17, 'Santiago del Estero'),
(18, 'Tucuman'),
(19, 'Catamarca'),
(20, 'Salta'),
(21, 'Jujuy'),
(22, 'Formosa'),
(23, 'Misiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `Id` int(11) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL,
  `pLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`Id`, `Direccion`, `pProvincia`, `pLocalidad`) VALUES
(1, 'Urquiza 2856', 1, 1),
(2, 'Brandsen', 8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervice`
--

CREATE TABLE `tiposervice` (
  `Id` int(255) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposervice`
--

INSERT INTO `tiposervice` (`Id`, `Descripcion`) VALUES
(1, 'Taller Externo'),
(2, 'Taller Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `Id` int(255) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`Id`, `Descripcion`) VALUES
(1, 'Chofer'),
(2, 'Mecanico'),
(3, 'Administrador'),
(4, 'Supervisor'),
(6, 'Llano'),
(7, 'Encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciondiaria`
--

CREATE TABLE `ubicaciondiaria` (
  `Id` int(255) NOT NULL,
  `pUsuario` int(50) NOT NULL,
  `pVehiculo` int(50) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Hash` varchar(50) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT 0,
  `pTipoUsuario` int(50) NOT NULL DEFAULT 6,
  `pLicencia` int(11) NOT NULL DEFAULT 14
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `Email`, `Password`, `Hash`, `Active`, `pTipoUsuario`, `pLicencia`) VALUES
(1, 'admin', 'admin', 'garlopacompany@gmail.com', 'Unlam2020', '', 1, 1, 14),
(2, 'Emiliano', 'Nahuel Ortiz', 'emiortiz2001@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 3, 3),
(3, 'Ariel', 'Molina', 'emilianonahuelortiz@hotmail.com', '123', 'c8c41c4a18675a74e01c8a20e8a0f662', 1, 4, 5),
(4, 'sarasa2.3', 'Ortiz', 'emiortiz1992@gmail.com', '123', '0d7de1aca9299fe63f3e0041f02638a3', 1, 4, 14),
(5, 'Nuevo', 'Nahuel Ortiz', 'emiortiz1992weq@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Id` int(255) NOT NULL,
  `pModelo` int(20) NOT NULL,
  `Patente` varchar(50) NOT NULL,
  `NroChasis` varchar(50) NOT NULL,
  `NroMotor` varchar(20) NOT NULL,
  `AñoFabricacion` date NOT NULL,
  `pArrastre` int(50) DEFAULT NULL,
  `kilometraje` bigint(255) UNSIGNED NOT NULL,
  `pMantenimiento` int(50) DEFAULT NULL,
  `pMarca` int(50) NOT NULL,
  `Alarma` bit(1) DEFAULT b'0',
  `Activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Id`, `pModelo`, `Patente`, `NroChasis`, `NroMotor`, `AñoFabricacion`, `pArrastre`, `kilometraje`, `pMantenimiento`, `pMarca`, `Alarma`, `Activo`) VALUES
(3, 1, 'AA123CD', 'L53879558', '53879558', '2010-11-06', 1, 20, NULL, 1, b'0', b'1'),
(4, 2, 'AA150QW', 'I82039512', '82039512', '2012-06-24', NULL, 56, NULL, 2, b'0', b'1'),
(5, 6, 'AD870QW', 'M30207594', '30207594', '2020-05-12', NULL, 5, NULL, 3, b'0', b'1'),
(6, 1, 'AC342WW', 'D44260023', '44260023', '2015-11-25', 3, 18, NULL, 1, b'0', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `Id` int(11) NOT NULL,
  `pUsuario` int(11) NOT NULL,
  `pCliente` int(11) NOT NULL,
  `pSucursalOrigen` int(11) NOT NULL,
  `pSucursalDestino` int(11) NOT NULL,
  `pVehiculo` int(11) NOT NULL,
  `pArrastre` int(11) NOT NULL,
  `FechaOrigen` datetime NOT NULL,
  `FechaEstimada` datetime NOT NULL,
  `KmEstimado` int(11) NOT NULL,
  `CombustibleEst` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `OtrosGastos` decimal(10,0) DEFAULT NULL,
  `Finalizado` bit(1) NOT NULL,
  `pFactura` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`Id`, `pUsuario`, `pCliente`, `pSucursalOrigen`, `pSucursalDestino`, `pVehiculo`, `pArrastre`, `FechaOrigen`, `FechaEstimada`, `KmEstimado`, `CombustibleEst`, `Precio`, `OtrosGastos`, `Finalizado`, `pFactura`) VALUES
(1, 2, 4, 2, 1, 3, 6, '2021-06-28 00:00:00', '2021-06-30 00:00:00', 15000, 300, 30000, '15000', b'0', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vproforma`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vproforma` (
`viajeId` int(11)
,`fechaOrigen` datetime
,`fechaEstimada` datetime
,`precioViaje` double
,`KmEstimado` int(11)
,`CombustibleEst` int(11)
,`Precio` double
,`OtrosGastos` decimal(10,0)
,`usuario` varchar(61)
,`cliente` varchar(100)
,`patenteVehiculo` varchar(50)
,`patenteArrastre` varchar(10)
,`SucursalOrigen` varchar(152)
,`SucursalDestino` varchar(152)
,`Finalizado` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vproforma`
--
DROP TABLE IF EXISTS `vproforma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproforma`  AS  select `v`.`Id` AS `viajeId`,`v`.`FechaOrigen` AS `fechaOrigen`,`v`.`FechaEstimada` AS `fechaEstimada`,`v`.`Precio` AS `precioViaje`,`v`.`KmEstimado` AS `KmEstimado`,`v`.`CombustibleEst` AS `CombustibleEst`,`v`.`Precio` AS `Precio`,`v`.`OtrosGastos` AS `OtrosGastos`,concat(`u`.`Nombre`,' ',`u`.`Apellido`) AS `usuario`,concat(`cli`.`Nombre`,'',`cli`.`Apellido`) AS `cliente`,`veh`.`Patente` AS `patenteVehiculo`,`arr`.`Patente` AS `patenteArrastre`,concat(`sucorigen`.`Direccion`,' ',`locorigen`.`Descripcion`,' ',`provorigen`.`Descripcion`) AS `SucursalOrigen`,concat(`sucdestino`.`Direccion`,' ',`locdestino`.`Descripcion`,' ',`provdestino`.`Descripcion`) AS `SucursalDestino`,`v`.`Finalizado` AS `Finalizado` from ((((((((((`viajes` `v` join `usuario` `u` on(`v`.`pUsuario` = `u`.`Id`)) join `cliente` `cli` on(`cli`.`Id` = `v`.`pCliente`)) join `vehiculo` `veh` on(`veh`.`Id` = `v`.`pVehiculo`)) join `arrastre` `arr` on(`arr`.`Id` = `v`.`pArrastre`)) join `sucursales` `sucorigen` on(`sucorigen`.`Id` = `v`.`pSucursalOrigen`)) join `provincia` `provorigen` on(`provorigen`.`Id` = `sucorigen`.`pProvincia`)) join `localidad` `locorigen` on(`locorigen`.`Id` = `sucorigen`.`pLocalidad`)) join `sucursales` `sucdestino` on(`sucdestino`.`Id` = `v`.`pSucursalDestino`)) join `provincia` `provdestino` on(`provdestino`.`Id` = `sucdestino`.`pProvincia`)) join `localidad` `locdestino` on(`locdestino`.`Id` = `sucdestino`.`pLocalidad`)) ;

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
  ADD KEY `pUsuario` (`pUsuario`),
  ADD KEY `pVehiculo` (`pVehiculo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pCliente` (`pCliente`),
  ADD KEY `pViaje` (`pViaje`);

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
  ADD KEY `mantenimiento_ibfk_1` (`pService`);

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
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pLocalidad` (`pLocalidad`),
  ADD KEY `pProvincia` (`pProvincia`);

--
-- Indices de la tabla `tiposervice`
--
ALTER TABLE `tiposervice`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pUsuario` (`pUsuario`),
  ADD KEY `pVehiculo` (`pVehiculo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pLicencia` (`pLicencia`),
  ADD KEY `pTipoUsuario` (`pTipoUsuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pArrastre` (`pArrastre`),
  ADD KEY `pMantenimiento` (`pMantenimiento`),
  ADD KEY `pMarca` (`pMarca`),
  ADD KEY `pModelo` (`pModelo`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pFactura` (`pFactura`),
  ADD KEY `pArrastre` (`pArrastre`),
  ADD KEY `pVehiculo` (`pVehiculo`),
  ADD KEY `pUsuario` (`pUsuario`),
  ADD KEY `pCliente` (`pCliente`),
  ADD KEY `pSucursalDestino` (`pSucursalDestino`),
  ADD KEY `pSucursalOrigen` (`pSucursalOrigen`);

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
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiposervice`
--
ALTER TABLE `tiposervice`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargascombustible`
--
ALTER TABLE `cargascombustible`
  ADD CONSTRAINT `cargascombustible_ibfk_1` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cargascombustible_ibfk_2` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`pCliente`) REFERENCES `cliente` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`pViaje`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`pService`) REFERENCES `tiposervice` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`pMarca`) REFERENCES `marca` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursales_ibfk_2` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicaciondiaria`
--
ALTER TABLE `ubicaciondiaria`
  ADD CONSTRAINT `ubicaciondiaria_ibfk_1` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicaciondiaria_ibfk_2` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`pLicencia`) REFERENCES `licencia` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`pTipoUsuario`) REFERENCES `tipousuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`pArrastre`) REFERENCES `arrastre` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`pMantenimiento`) REFERENCES `mantenimiento` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`pMarca`) REFERENCES `marca` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_4` FOREIGN KEY (`pModelo`) REFERENCES `modelo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`pFactura`) REFERENCES `factura` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`pArrastre`) REFERENCES `arrastre` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_5` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_6` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_7` FOREIGN KEY (`pCliente`) REFERENCES `cliente` (`Id`),
  ADD CONSTRAINT `viajes_ibfk_8` FOREIGN KEY (`pSucursalDestino`) REFERENCES `sucursales` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_9` FOREIGN KEY (`pSucursalOrigen`) REFERENCES `sucursales` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
