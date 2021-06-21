-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 21:33:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

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
(1, 'Araña', 'AA100AS', '585822'),
(2, 'Araña', 'AC125AD', '605737'),
(3, 'Jaula', 'AC296AS', '882174'),
(4, 'Jaula', 'AB318AD', '595287'),
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
(1, 'Ricardo', 'Fort', '25598516', 'Av. Miami 2012', b'1'),
(2, 'Marcelo Hugo', 'Tinelli', '18365482', 'Segurola 654', b'1'),
(3, 'Lionel Andres', 'Messi', '33016244', 'Reina Elisenda 26', b'1'),
(4, 'Jean Claude', 'Van-Damme', '12659845', 'Coronel Brandsen 1048', b'1');

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
  `Fecha` datetime NOT NULL,
  `pService` int(50) NOT NULL,
  `pUsuario` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `respuesto`
--

CREATE TABLE `respuesto` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesto`
--

INSERT INTO `respuesto` (`Id`, `Descripcion`, `Precio`) VALUES
(1, 'Rueda Scania G310', 100000),
(2, 'Aceite Motul 5100', 10000),
(3, 'Eje trasero M.BENZ Actros 1846', 30000),
(4, 'Lona protectora de arrastre', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `Id` int(255) NOT NULL,
  `pTipoService` int(50) NOT NULL,
  `ImporteFinal` double NOT NULL,
  `FechaDesde` datetime NOT NULL,
  `FechaHasta` datetime NOT NULL,
  `pUsuario` int(50) DEFAULT NULL,
  `pVehiculo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicerepuesto`
--

CREATE TABLE `servicerepuesto` (
  `Id` int(255) NOT NULL,
  `pService` int(255) NOT NULL,
  `pRepuesto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursaldestino`
--

CREATE TABLE `sucursaldestino` (
  `Id` int(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `pLocalidad` int(50) NOT NULL,
  `pProvincia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursalorigen`
--

CREATE TABLE `sucursalorigen` (
  `Id` int(11) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `pProvincia` int(11) NOT NULL,
  `pLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursalorigen`
--

INSERT INTO `sucursalorigen` (`Id`, `Direccion`, `pProvincia`, `pLocalidad`) VALUES
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
  `pTipoUsuario` int(50) NOT NULL DEFAULT 4,
  `pLicencia` int(11) DEFAULT 14
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `Email`, `Password`, `Hash`, `Active`, `pTipoUsuario`, `pLicencia`) VALUES
(16, 'Rodrigo', 'Acosta', 'jracosta1991@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 2, 14),
(17, 'Garlopa ', 'Company', 'garlopacompany@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 3, 14),
(18, 'Supervisor', 'Supervisor', 'supervisor@supervisor.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 4, 14),
(19, 'Llano', 'Llano', 'llano@llano.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 6, 14),
(20, 'Chofer', 'Chofer', 'Chofer@chofer.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 1, 14),
(21, 'Encargado', 'Encargado', 'encargado@encargado.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 7, 14);

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
  `pUsuario` int(11) NOT NULL,
  `pSucursalOrigen` int(11) NOT NULL,
  `pSucursalDestino` int(255) NOT NULL,
  `pCliente` int(11) NOT NULL,
  `pVehiculo` int(11) NOT NULL,
  `pArrastre` int(11) NOT NULL,
  `FechaOrigen` datetime NOT NULL,
  `FechaEstimada` datetime NOT NULL,
  `KmEstimado` int(11) NOT NULL,
  `CombustibleEst` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `Finalizado` bit(1) NOT NULL,
  `pFactura` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `pService` (`pService`),
  ADD KEY `pUsuario` (`pUsuario`),
  ADD KEY `pVehiculo` (`pVehiculo`);

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
  ADD KEY `pTipoService` (`pTipoService`),
  ADD KEY `pVehiculo` (`pVehiculo`),
  ADD KEY `pUsuario` (`pUsuario`);

--
-- Indices de la tabla `servicerepuesto`
--
ALTER TABLE `servicerepuesto`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pRepuesto` (`pRepuesto`),
  ADD KEY `pService` (`pService`);

--
-- Indices de la tabla `sucursaldestino`
--
ALTER TABLE `sucursaldestino`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pLocalidad` (`pLocalidad`),
  ADD KEY `pProvincia` (`pProvincia`);

--
-- Indices de la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
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
  ADD KEY `pSucursalDestino` (`pSucursalDestino`),
  ADD KEY `pFactura` (`pFactura`),
  ADD KEY `pArrastre` (`pArrastre`),
  ADD KEY `pSucursalOrigen` (`pSucursalOrigen`),
  ADD KEY `pVehiculo` (`pVehiculo`),
  ADD KEY `pUsuario` (`pUsuario`),
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
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursaldestino`
--
ALTER TABLE `sucursaldestino`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`pService`) REFERENCES `service` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`pMarca`) REFERENCES `marca` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`pTipoService`) REFERENCES `service` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicerepuesto`
--
ALTER TABLE `servicerepuesto`
  ADD CONSTRAINT `servicerepuesto_ibfk_1` FOREIGN KEY (`pRepuesto`) REFERENCES `respuesto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicerepuesto_ibfk_2` FOREIGN KEY (`pService`) REFERENCES `service` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursaldestino`
--
ALTER TABLE `sucursaldestino`
  ADD CONSTRAINT `sucursaldestino_ibfk_1` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursaldestino_ibfk_2` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursalorigen`
--
ALTER TABLE `sucursalorigen`
  ADD CONSTRAINT `sucursalorigen_ibfk_1` FOREIGN KEY (`pLocalidad`) REFERENCES `localidad` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursalorigen_ibfk_2` FOREIGN KEY (`pProvincia`) REFERENCES `provincia` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `viajeconcretado`
--
ALTER TABLE `viajeconcretado`
  ADD CONSTRAINT `viajeconcretado_ibfk_1` FOREIGN KEY (`pViajes`) REFERENCES `viajes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`pSucursalDestino`) REFERENCES `sucursaldestino` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`pFactura`) REFERENCES `factura` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`pArrastre`) REFERENCES `arrastre` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_4` FOREIGN KEY (`pSucursalOrigen`) REFERENCES `sucursalorigen` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_5` FOREIGN KEY (`pVehiculo`) REFERENCES `vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_6` FOREIGN KEY (`pUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_7` FOREIGN KEY (`pCliente`) REFERENCES `cliente` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
