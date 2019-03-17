-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2019 a las 02:09:43
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_fastcash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_accesos`
--

CREATE TABLE `tbl_accesos` (
  `idAcceso` int(11) NOT NULL,
  `tipoAcceso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para el manejo de accesos';

--
-- Volcado de datos para la tabla `tbl_accesos`
--

INSERT INTO `tbl_accesos` (`idAcceso`, `tipoAcceso`, `descripcion`, `estado`, `fechaRegistro`) VALUES
(5, 'ADMINISTRADOR', 'ACCESO TOTAL AL SISTEMA', 1, '2018-12-01 00:11:05'),
(10, 'AUXILIAR CONTABLE', 'ACCESO LIMITADO', 1, '2018-12-15 06:00:00'),
(11, 'CAJERA', 'ACCESO LIMITADO', 1, '2019-01-07 06:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_amortizaciones`
--

CREATE TABLE `tbl_amortizaciones` (
  `idAmortizacion` int(11) NOT NULL,
  `tasaInteres` decimal(10,2) NOT NULL,
  `capital` decimal(10,2) NOT NULL,
  `totalInteres` decimal(10,2) NOT NULL,
  `totalIva` decimal(10,2) NOT NULL,
  `ivaInteresCapital` decimal(10,2) NOT NULL,
  `plazoMeses` int(11) NOT NULL,
  `pagoCuota` decimal(10,2) NOT NULL,
  `cantidadCuota` int(11) NOT NULL,
  `estadoAmortizacion` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_amortizaciones`
--

INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES
(21, '36.00', '400.00', '96.00', '12.48', '508.48', 8, '2.12', 240, 1, '2018-12-26 20:18:29', 21),
(22, '10.00', '75.00', '7.50', '0.98', '83.48', 1, '2.78', 30, 0, '2019-01-21 19:37:57', 22),
(23, '120.00', '250.00', '50.00', '6.50', '306.50', 2, '5.11', 60, 1, '2019-02-07 16:40:04', 23),
(24, '120.00', '50.00', '5.00', '0.65', '55.65', 1, '1.86', 30, 1, '2019-02-07 17:10:22', 24),
(25, '120.00', '100.00', '30.00', '3.90', '133.90', 3, '1.49', 90, 1, '2019-02-07 17:44:25', 25),
(26, '120.00', '75.00', '7.50', '0.98', '83.48', 1, '2.78', 30, 1, '2019-02-07 17:54:51', 26),
(27, '96.00', '500.00', '200.00', '26.00', '726.00', 5, '4.84', 150, 1, '2019-02-07 19:31:10', 27),
(28, '120.00', '50.00', '5.00', '0.65', '55.65', 1, '1.86', 30, 1, '2019-02-15 14:55:07', 28),
(29, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-15 15:07:11', 29),
(30, '10.00', '100.00', '20.00', '2.60', '122.60', 0, '2.04', 60, 1, '2019-02-15 15:35:45', 30),
(31, '120.00', '300.00', '30.00', '3.90', '333.90', 1, '11.13', 30, 1, '2019-02-15 16:48:23', 31),
(32, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-15 17:00:22', 32),
(33, '10.00', '150.00', '15.00', '1.95', '166.95', 0, '5.57', 30, 0, '2019-02-18 15:48:00', 33),
(34, '120.00', '150.00', '15.00', '1.95', '166.95', 1, '5.57', 30, 1, '2019-02-18 15:51:55', 34),
(35, '120.00', '150.00', '30.00', '3.90', '183.90', 2, '3.07', 60, 1, '2019-02-18 16:05:22', 35),
(36, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-18 16:33:08', 36),
(37, '120.00', '800.00', '240.00', '31.20', '1071.20', 3, '11.90', 90, 1, '2019-02-18 17:10:26', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aranceles`
--

CREATE TABLE `tbl_aranceles` (
  `idArancel` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` double NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cajachica_procesos`
--

CREATE TABLE `tbl_cajachica_procesos` (
  `idProceso` int(11) NOT NULL,
  `detalleProceso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaProceso` date NOT NULL,
  `entrada` float NOT NULL,
  `salida` float NOT NULL,
  `saldo` float NOT NULL,
  `idCajaChica` int(11) NOT NULL,
  `idTipoPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cajageneral_procesos`
--

CREATE TABLE `tbl_cajageneral_procesos` (
  `idProceso` int(11) NOT NULL,
  `detalleProceso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaProceso` date NOT NULL,
  `entrada` float DEFAULT NULL,
  `salida` float DEFAULT NULL,
  `saldo` float NOT NULL,
  `idCajaChica` int(11) NOT NULL,
  `idTipoPago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cajageneral_procesos`
--

INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES
(1, 'Apertura de caja general', '2019-03-09', 20, 0, 20, 1, 1),
(2, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(3, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(4, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(5, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(6, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(7, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 14.0257, NULL, 14.0257, 1, 1),
(8, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 100, NULL, 100, 1, 1),
(9, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 20, NULL, 20, 1, 1),
(10, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 20, NULL, 20, 1, 1),
(11, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', 30, NULL, 30, 1, 1),
(12, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 30, NULL, 30, 1, 1),
(13, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 30, NULL, 30, 1, 1),
(14, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 30, NULL, 30, 1, 1),
(15, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 200, NULL, 230, 1, 1),
(16, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 1500, NULL, 1730, 1, 1),
(17, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 900, NULL, 2630, 1, 1),
(18, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 900, NULL, 3530, 1, 1),
(19, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 900, NULL, 4430, 1, 1),
(20, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 822.24, NULL, 5252.24, 1, 1),
(21, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 822.34, NULL, 6074.58, 1, 1),
(22, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 800, NULL, 6874.58, 1, 1),
(23, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(24, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(25, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 30, NULL, 30, 1, 1),
(26, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(27, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(28, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(29, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(30, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(31, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1),
(32, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', 100, NULL, 100, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_caja_chica`
--

CREATE TABLE `tbl_caja_chica` (
  `idCajaC` int(11) NOT NULL,
  `estadoCajaC` int(11) NOT NULL,
  `fechaCajaC` date NOT NULL,
  `cantidadAperturaCC` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_caja_general`
--

CREATE TABLE `tbl_caja_general` (
  `idCajaChica` int(11) NOT NULL,
  `estadoCajaChica` int(11) NOT NULL,
  `fechaCajaChica` date NOT NULL,
  `cantidadApertura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_caja_general`
--

INSERT INTO `tbl_caja_general` (`idCajaChica`, `estadoCajaChica`, `fechaCajaChica`, `cantidadApertura`) VALUES
(1, 1, '2019-03-09', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_cuenta`
--

CREATE TABLE `tbl_categoria_cuenta` (
  `idCategoria` int(11) NOT NULL,
  `codigoCategoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombreCategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_categoria_cuenta`
--

INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES
(1, '1', 'ACTIVO'),
(2, '2', 'PASIVO'),
(3, '3', 'PATRIMONIO DE LOS ACCIONISTAS'),
(4, '4', 'CUENTAS DE RESULTADO DEUDOR'),
(5, '5', 'CUENTAS DE RESULTADO ACREEDORAS'),
(6, '6', 'PÉRDIDAS Y GANANCIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `Id_Cliente` int(11) NOT NULL,
  `Codigo_Cliente` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_Cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado_Civil_Cliente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Genero_Cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_Fijo_Cliente` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono_Celular_Cliente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio_Cliente` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nacimiento_Cliente` date NOT NULL,
  `Zona_Cliente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `DUI_Cliente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `NIT_Cliente` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `urlImg` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` decimal(10,2) NOT NULL,
  `Observaciones_Cliente` text COLLATE utf8_spanish_ci NOT NULL,
  `Profesion_Cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Fk_Id_Departamento` int(11) NOT NULL,
  `Fk_Id_Municipio` int(11) NOT NULL,
  `Tipo_Cliente` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES
(12, 'MAPP017012814', 'MARIO ALFREDO', 'PERDOMO', 'Soltero/a', 'Masculino', '', '', '7888-5022', 'BARRIO CONCEPCION, CALLE GERARDO BARRIOS.', '1958-08-01', 'Urbana', '01701281-4', '1111-010856-101-9', '', '475.00', '', 'CONTADOR', 1, '2018-12-26 18:20:36', 11, 52, 'Empleado'),
(13, 'JJMS022606335', 'JESUS ', 'MEJIA SANTOS', 'Soltero/a', 'Femenino', '', '', '00000000', 'BARRIO EL CALVARIO, MERCEDES UMAÑA, USULUTAN', '1950-10-05', 'Urbana', '02260633-5', '1111-051050-101-4', '', '300.00', 'NINGUNA', 'DOMESTICA', 1, '2019-01-21 19:29:32', 11, 52, 'Otro'),
(14, 'AACD020336196', 'ADOLFO ALCIDES', 'CAMPOS DIAZ', 'Soltero/a', 'Masculino', '', '', '7660-0401', 'COLONIA CONCEPCION, EL JICARO TECAPAN, USULUTAN', '1954-09-14', 'Urbana', '02033619-6', '1122-140954-001-3', '', '325.00', 'NINGUNA', 'EMPLEADO', 1, '2019-01-21 20:01:13', 11, 63, 'Empleado'),
(15, 'JAVV034092398', 'JOSE ARCENIO ', 'VALLADARES', 'Soltero/a', 'Masculino', '', '', '7493-1248', 'BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '1976-08-03', 'Urbana', '03409239-8', '1115-030876-102-2', '', '400.00', 'COMERCIANTE EN PEQUEÑO', 'ALBAÑIL', 1, '2019-02-07 16:34:36', 11, 52, 'Otro'),
(16, 'AMMM016686149', 'ANA MERCEDES', 'MEJIA MUNGUIA', 'Soltero/a', 'Femenino', '', '', '7698-6100', 'BARRIO EL CALVARIO, MERCEDES UMAÑA, USULUTAN', '1974-08-26', 'Urbana', '01668614-9', '1111-260875-101-1', '', '250.00', '', 'DOMESTICOS', 1, '2019-02-07 17:05:27', 11, 52, 'Otro'),
(17, 'SAAA021764156', 'SULMA ANA ABEL', 'AYALA AYALA', 'Soltero/a', 'Femenino', '', '', '7595-5799', 'BARRIO CONCEPCION, MERCEDES UMAÑA USULUTAN', '1964-10-20', 'Urbana', '02176415-6', '1111-201064-001-4', '', '300.00', '', 'EMPLEADA', 1, '2019-02-07 17:36:24', 11, 52, 'Otro'),
(18, 'JAGA045769330', 'JOSE ALBERTO', 'GUEVARA AYALA', 'Soltero/a', 'Masculino', '', '', '7683-1601', '4TA CALLE ORIENTE Y 2A AV. SUR CASA # 4 BERLIN, USULUTAN ', '1992-02-28', 'Urbana', '04576933-0', '0614-280292-158-7', '', '392.00', '', 'ESTUDIANTE', 1, '2019-02-07 19:18:39', 11, 43, 'Empleado'),
(19, 'AMMM016686149', 'ANA MERCEDES ', 'MEJIA MUNGUIA', 'Soltero/a', 'Femenino', '', '7698-6100', '7698-6100', 'B. EL CALVARIO MERCEDES UMAÑA.', '1974-03-02', 'Urbana', '01668614-9', '1111-260875-101-1', '', '200.00', 'PAGARE , LETRA DE CAMBIO.', 'DOMESTICA', 1, '2019-02-15 14:45:45', 11, 52, 'Otro'),
(20, 'ELFS013280635', 'EVELYN LISETH ', 'FLORES SANCHEZ', 'Soltero/a', 'Femenino', '', '7264-4837', '7264-4837', 'B. CONCEPCION MERCEDES UMAÑA', '1976-06-21', 'Urbana', '01328063-5', '1111-260176-101-3', '', '300.00', '', 'AMA DE CASA', 1, '2019-02-15 15:04:57', 11, 52, 'Otro'),
(21, 'ELFS013280635', 'EVELYN LISETH ', 'FLORES SANCHEZ', 'Soltero/a', 'Femenino', '', '7264-4837', '7264-4837', 'B. CONCEPCION MERCEDES UMAÑA', '1976-06-21', 'Urbana', '01328063-5', '1111-260176-101-3', '', '300.00', '', 'AMA DE CASA', 1, '2019-02-15 15:04:57', 11, 52, 'Otro'),
(22, 'JGTT039868134', 'JOSE GUADALUPE ', 'TORRES', 'Soltero/a', 'Masculino', '', '7214-2942', '7214-2942', 'B. CONCEPCION CALLE PRINCIPAL. MERCEDES UMAÑA.', '1988-04-20', 'Urbana', '03986813-4', '1111-160988-101-0', '', '300.00', '', 'EMPLEADO', 1, '2019-02-15 15:33:48', 11, 52, 'Otro'),
(23, 'WECQ015350321', 'WENDY ESMERALDA', 'CONTRERAS QUEVEDO', 'Soltero/a', 'Femenino', '', '6127-7072', '6127-7072', 'B. CONCEPCION 15.AVENIDA SUR MERCEDES UMAÑA', '1972-07-29', 'Urbana', '01535032-1', '0614-290772-124-9', '', '500.00', '', 'COMERCIANTE', 1, '2019-02-15 16:45:34', 11, 52, 'Otro'),
(24, 'YEHS049982972', 'YANCY ESTEFANY ', 'HERNANDEZ SALGADO', 'Soltero/a', 'Femenino', '', '6105-2191', '6105-9121', 'B. EL CENTRO MERCEDES UMAÑA.', '1994-05-01', 'Urbana', '04998297-2', '1107-010594-101-4', '', '300.00', '', 'ESTUDIANTE', 1, '2019-02-15 16:57:58', 11, 52, 'Otro'),
(25, 'JARR033712238', 'JUAN ANTONIO', 'RAMOS RODRIGUEZ', 'Soltero/a', 'Masculino', '', '7128-2128', '7128-2128', 'CS. LA PUERTA MERCEDES UMAÑA', '1985-11-03', 'Rural', '03371223-8', '1111-031185-101-4', '', '304.17', '', 'JORNALERO', 1, '2019-02-15 17:09:06', 11, 52, 'Otro'),
(26, 'EEOG019373389', 'EVELYN ELIZABETH ', 'ORTEGA DE GRANADOS', 'Casado/a', 'Femenino', '', '7893-1556', '7893-1556', 'B. EL CENTRO BERLIN USULUTAN', '1979-02-27', 'Urbana', '01937338-9', '0601-270279-102-2', '', '300.00', '', 'DR.(A) EN CCIRUGIA DENTAL', 1, '2019-02-18 15:45:58', 11, 52, 'Otro'),
(27, 'JYMA056168995', 'JESSICA YAMILETH ', 'MARAVILLA AYALA', 'Soltero/a', 'Masculino', '', '7568-4772', '7568-7472', 'B. EL CALVARIO MERCEDES UMAÑA.', '2023-11-16', 'Urbana', '05616899-5', '0614-111197-177-8', '', '325.00', '', 'ESTUDIANTE', 1, '2019-02-18 16:03:30', 11, 52, 'Otro'),
(28, 'MCRC030319743', 'MIRIAN DEL CARMEN', 'RODRIGUEZ CHAVEZ', 'Soltero/a', 'Femenino', '', '7500-4316', '7500-4316', 'COL. LA PAZ #2 BERLIN USULUTAN', '1983-12-14', 'Urbana', '03031974-3', '1102-091083-102-2', '', '350.00', '', 'DOMESTICA', 1, '2019-02-18 16:30:26', 11, 52, 'Otro'),
(29, 'DERR009866089', 'DOUGLAS ESTAMLER ', 'ROMERO', 'Soltero/a', 'Masculino', '', '7114-6834', '7226-8736', 'B. EL CALVARIO MERCEDES UMAÑA', '1971-03-10', 'Urbana', '00986608-9', '1111-100371-101-1', '', '300.00', '', 'EMPLEADO', 1, '2019-02-18 16:43:33', 11, 52, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_creditos`
--

CREATE TABLE `tbl_creditos` (
  `idCredito` int(11) NOT NULL,
  `codigoCredito` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tipoCredito` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `codigoTipoCredito` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `montoTotal` decimal(10,2) NOT NULL,
  `totalAbonado` decimal(10,2) NOT NULL,
  `interesPendiente` decimal(10,2) NOT NULL,
  `estadoCredito` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaApertura` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idAmortizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_creditos`
--

INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES
(13, 'MAP20182612', 'Crédito popular', ' ', '400.00', '0.00', '0.00', 'Proceso', '2018-12-01', '2019-08-01', 1, '2018-12-26 20:25:46', 21),
(14, 'JAV201972', 'Crédito popular', ' ', '250.00', '0.00', '0.00', 'Proceso', '2019-02-07', '2019-04-07', 1, '2019-02-07 16:43:50', 23),
(15, 'AMMM201972', 'Crédito popular', ' ', '50.00', '0.00', '0.00', 'Proceso', '2019-02-06', '2019-03-06', 1, '2019-02-07 17:15:01', 24),
(16, 'AA201972', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-07', '2019-05-07', 1, '2019-02-07 17:48:01', 25),
(17, 'JMS201972', 'Crédito popular', ' ', '75.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-03-04', 1, '2019-02-07 17:56:11', 26),
(19, 'JAGA201972', 'Crédito popular', ' ', '500.00', '0.00', '0.00', 'Proceso', '2019-02-02', '2019-07-02', 1, '2019-02-07 19:50:03', 27),
(20, 'AMMM2019152', 'Crédito popular', ' ', '50.00', '0.00', '0.00', 'Proceso', '2019-02-06', '2019-03-06', 1, '2019-02-15 14:56:49', 28),
(21, 'ELFS2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-05', '2019-03-05', 1, '2019-02-15 15:08:12', 29),
(22, 'JGT2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-04-04', 1, '2019-02-15 16:29:00', 30),
(23, 'WECQ2019152', 'Crédito popular', ' ', '300.00', '0.00', '0.00', 'Proceso', '2019-02-15', '2019-03-15', 1, '2019-02-15 16:48:44', 31),
(24, 'YEHS2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-15', '2019-03-15', 1, '2019-02-15 17:03:28', 32),
(25, 'EE2019182', 'Crédito popular', ' ', '150.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-03-04', 1, '2019-02-18 15:52:39', 34),
(26, 'JYMA2019182', 'Crédito popular', ' ', '150.00', '0.00', '0.00', 'Proceso', '2019-02-08', '2019-04-08', 1, '2019-02-18 16:06:42', 35),
(27, 'RC2019182', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-09', '2019-03-09', 1, '2019-02-18 16:33:42', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuenta`
--

CREATE TABLE `tbl_cuenta` (
  `idCuenta` int(11) NOT NULL,
  `idSubcategoria` int(11) NOT NULL,
  `codigoCuenta` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `NombreCuenta` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cuenta`
--

INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES
(1, 1, '1101', 'Efectivo y Equivalentes'),
(2, 1, '110101', 'Fondo de Caja Chica'),
(3, 1, '110102', 'Caja General'),
(4, 1, '110103', 'Bancos Cuentas Corritentes'),
(5, 1, '11010301', 'Banco Cuscatlán, S.A.'),
(6, 1, '11010302', 'Banco Promerica, S.A.'),
(7, 1, '11010303', 'Banco Hipotecario de El Salvador, S.A. Cta Cte 004'),
(8, 1, '110104', 'Bancos Cuentas de Ahorro'),
(9, 1, '11010401', 'Banco Cuscatlán, S.A.'),
(10, 1, '110105', 'Bancos Depositos a Plazo'),
(11, 1, '11010501', 'Banco Cuscatlán, S.A.'),
(12, 1, '110106', 'Otros Equivalentes de Efectivo'),
(13, 1, '11010601', 'Reportos'),
(14, 1, '110107', 'Fondo de Caja General'),
(15, 1, '1102', 'Cuentas y Documentos por Cobrar'),
(16, 1, '110201', 'Préstamos'),
(17, 1, '11020101', 'Prestamos pactados hasta 1 año plazo'),
(18, 1, '1102010101', 'Prestamos populares'),
(19, 1, '1102010102', 'Prestamos personales'),
(20, 1, '1102010103', 'Prestamos prendarios'),
(21, 1, '1102010104', 'Prestamos hipotecarios'),
(22, 1, '1102010110', 'Refinanciamientos'),
(23, 1, '11020102', 'Prestamos pactados hasta más de 1 año plazo'),
(24, 1, '1102010201', 'Prestamos populares'),
(25, 1, '1102010202', 'Prestamos personales'),
(26, 1, '1102010203', 'Prestamos prendarios'),
(27, 1, '1102010204', 'Prestamos hipotecarios'),
(28, 1, '1102010205', 'Prestamos rotativos'),
(29, 1, '1102010210', 'Refinanciamientos'),
(30, 1, '11020103', 'Desembolsos y Recuperaciones por Aplicar'),
(31, 1, '11020104', 'Prestamos vencidos'),
(32, 1, '11020105', 'Prestamos en cobro judicial'),
(33, 1, '11020106', 'Intereses por cobrar'),
(34, 1, '1102010601', 'Intereses corrientes'),
(35, 1, '1102010602', 'Intereses en mora'),
(36, 1, '110202', 'Documentos por Cobrar'),
(37, 1, '110203', 'Cuentas por cobrar comerciales'),
(38, 1, '110204', 'Dividendos por Cobrar'),
(39, 1, '110205-R', 'Reserva para Cuentas Incobrables'),
(40, 1, '110205-R01', 'Reserva para saneamiento de créditos vencidos'),
(41, 1, '110206', 'Anticipos a Proveedores'),
(42, 1, '110207', 'Prestamos al Personal'),
(43, 1, '110208', 'Anticipos a Empleados'),
(44, 1, '11020801', 'Anticipos a Empleados'),
(45, 1, '11020802', 'Faltantes a cajeros'),
(46, 1, '110209', 'Prestamos a Socios'),
(47, 1, '110210', 'Otras Cuentas por Cobrar'),
(48, 1, '1103', 'Cuentas por Cobrar - Arrendamiento Financiero'),
(49, 1, '110301', 'Arrendamientos Financieros por Cobrar'),
(50, 1, '1104', 'Partes Relacionadas'),
(51, 1, '110401', 'Directivos, Ejecutivos y Empleados'),
(52, 1, '110402', 'Compañías Afiliadas'),
(53, 1, '110403', 'Compañías Asociadas'),
(54, 1, '110404', 'Compañías Subsidiarias'),
(55, 1, '110405', 'Compañías Relacionadas'),
(56, 1, '1105', 'Accionistas'),
(57, 1, '110501', 'Acciones Suscritas y no Pagadas'),
(58, 1, '1106', 'Crédito Fiscal - IVA'),
(59, 1, '110601', 'IVA por Importaciones'),
(60, 1, '110602', 'IVA por Compras Locales'),
(61, 1, '110603', 'IVA Diferido'),
(62, 1, '110604', 'Excedente de Credito Fiscal'),
(63, 1, '110605', '1%  IVA Retenido'),
(64, 1, '110606', '1%  IVA Percibido'),
(65, 1, '1107', 'Inventarios'),
(66, 1, '110701', ''),
(67, 1, '110705 - R', 'Reserva por Obsolescencia de Mercaderías'),
(68, 1, '110706', 'Pedidos en Tránsito'),
(69, 1, '1108', 'Inversiones Temporales'),
(70, 1, '1109', 'Pagos Anticipados'),
(71, 1, '110901', 'Alquileres Anticipados'),
(72, 1, '110902', 'Papelería y Utiles'),
(73, 1, '110903', 'Intereses'),
(74, 1, '110904', 'Seguros Vigentes'),
(75, 1, '11090401', 'Seguro de Vehiculos'),
(76, 1, '11090402', 'Seguro contra Robo'),
(77, 1, '11090403', 'Seguro contra Incendio'),
(78, 1, '11090404', 'Seguro por Importacion de Mercaderia'),
(79, 1, '110905', 'Impuestos pagados por Anticipado'),
(80, 1, '11090501', 'Pago a cuenta del ejercicio corriente'),
(81, 1, '11090502', 'ISR de Ejercicios Anteriores'),
(82, 1, '11090503', 'Retenciones por Operaciones Financieras'),
(83, 2, '1201', 'Propiedad, Planta y Equipo'),
(84, 2, '120101', 'Bienes Inmuebles'),
(85, 2, '12010101', 'Terrenos'),
(86, 2, '12010102', 'Edificaciones'),
(87, 2, '12010103', 'Mejoras en Propiedades Arrendadas'),
(88, 2, '12010104', 'Instalaciones Permanentes'),
(89, 2, '120102', 'Bienes Muebles'),
(90, 2, '12010201', 'Mobiliario y Equipo de Sala de Ventas'),
(91, 2, '12010202', 'Mobiliario y Equipo de Oficina'),
(92, 2, '12010203', 'Equipo de Transporte'),
(93, 2, '12010204', 'Equipo de Cómputo'),
(94, 2, '12010205', 'Otros Bienes Depreciables'),
(95, 2, '120103-R', 'Depreciaciones Acumuladas'),
(96, 2, '120103-R-01', 'Edificaciones'),
(97, 2, '120103-R-02', 'Mejoras en Propiedades Arrendadas'),
(98, 2, '120103-R-03', 'Instalaciones Permanente'),
(99, 2, '120103-R-04', 'Mobiliario y Equipo de Sala de Ventas'),
(100, 2, '120103-R-05', 'Mobiliario y Equipo de Oficina'),
(101, 2, '120103-R-06', 'Equipo de Transporte'),
(102, 2, '120103-R-07', 'Equipo de Cómputo'),
(103, 2, '120103-R-08', 'Otros Bienes Depreciables'),
(104, 2, '120104', 'Revaluaciones de Activo Fijo'),
(105, 2, '12010401', 'Terrenos'),
(106, 2, '12010402', 'Edificaciones'),
(107, 2, '12010403', 'Instalaciones Permanentes'),
(108, 2, '12010404', 'Mobiliario y Equipo de Sala de Venta'),
(109, 2, '12010405', 'Mobiliario y Equipo de Oficina'),
(110, 2, '12010406', 'Equipo de Transporte'),
(111, 2, '12010407', 'Equipo de Cómputo'),
(112, 2, '120105', 'Pedidos en Tránsito - Activo Fijo'),
(113, 2, '1202', 'Inversiones Permanentes'),
(114, 2, '120201', 'Inversiones en Subsidiarias'),
(115, 2, '120202', 'Inversiones en Asociadas'),
(116, 2, '120203', 'Inversiones en Negocios Conjuntos'),
(117, 2, '1203', 'Activos Diferidos'),
(118, 2, '120301', 'Crédito ISR años anteriores'),
(119, 2, '120302', 'Pagos Anticipados ISR'),
(120, 2, '120303', 'Activo por ISR - Diferido'),
(121, 2, '120304', 'Otros Activos Diferidos'),
(122, 2, '1204', 'Activos Intangibles'),
(123, 2, '120401', 'Patentes y Marcas'),
(124, 2, '120402', 'Licencias y Concesiones'),
(125, 2, '12040201', 'Sistemas computacinales - SOFTWARE'),
(126, 2, '120403-R', 'Amortización Licencias de Sofware'),
(127, 2, '1205', 'Cuentas por Cobrar a Largo Plazo'),
(128, 2, '1206', 'Préstamos a Accionistas a Largo Plazo'),
(129, 2, '1207', 'Otras Cuentas por Cobrar a Largo Plazo'),
(130, 2, '1208', 'Depósitos en Garantía'),
(131, 2, '1209', 'Cuentas por Cobrar Arrendamientos Financieros Larg'),
(132, 2, '1210', 'Partes Relacionadas a Largo Plazo'),
(133, 3, '2101', 'Préstamos y Sobregiros Bancarios'),
(134, 3, '210101', 'Sobregiros Bancarios'),
(135, 3, '210102', 'Préstamos a Corto Plazo'),
(136, 3, '210103', 'Porción Circulante - Préstamos a Largo Plazo'),
(137, 3, '2102', 'Cuentas y Documentos por Pagar'),
(138, 3, '210201', 'Proveedores Locales'),
(139, 3, '21020101', 'Guilermo Antonio Rodriguez'),
(140, 3, '21020102', 'Emerson Giovanni Gomez'),
(141, 3, '21020103', 'Infored, S.A. de C.V.'),
(142, 3, '21020104', 'Harold Antonio Argueta Hernandez'),
(143, 3, '210202', 'Proveedores Extranjeros'),
(144, 3, '210203', 'Acreedores Diversos'),
(145, 3, '21020301', 'Maria Guadalupe Iraheta de Martinez'),
(146, 3, '210204', 'Documentos por Pagar:'),
(147, 3, '21020401', 'Contratos a Corto Plazo'),
(148, 3, '21020402', 'Cartas de Crédito'),
(149, 3, '2103', 'Obligaciones Bajo Arrendamiento Financiero'),
(150, 3, '210301', 'Porción Circulante de Obligaciones de Arrendamient'),
(151, 3, '2104', 'Provisiones y Retenciones'),
(152, 3, '210401', 'Provisiones'),
(153, 3, '21040101', 'Impuestos Municipales'),
(154, 3, '21040102', 'Provisión Pago a Cuenta ISR'),
(155, 3, '21040103', 'Intereses por Pagar'),
(156, 3, '21040104', 'Impuesto sobre la renta del ejercicio corriente'),
(157, 3, '210402', 'Gastos Acumulados por Pagar'),
(158, 3, '21040201', 'Alquileres'),
(159, 3, '21040202', 'Energia Eléctrica'),
(160, 3, '21040203', 'Servicios de Agua Potable'),
(161, 3, '21040204', 'Comunicaciones'),
(162, 3, '21040205', 'Gastos de Caja Chica'),
(163, 3, '21040206', 'Honorarios Profesionales'),
(164, 3, '21040207', 'Publicidad'),
(165, 3, '21040208', 'Gastos de Combustible'),
(166, 3, '210403', 'Retenciones'),
(167, 3, '21040301', 'Cotizaciones Seguro Social'),
(168, 3, '21040302', 'Seguro Social - Pensiones'),
(169, 3, '21040303', 'Fondo Social para la Vivienda'),
(170, 3, '21040304', 'ISR Retenido'),
(171, 3, '2104030401', 'Retenciones de Carácter Permanente'),
(172, 3, '2104030402', 'Retenciones de Carácter Eventual'),
(173, 3, '2104030403', 'Otras Retenciones'),
(174, 3, '2104030404', 'Retencion por Servicios de Arrendamiento a Persona'),
(175, 3, '21040305', 'Bancos y Otras Instituciones'),
(176, 3, '2104030501', 'Banco Agricola, S.A.'),
(177, 3, '2104030502', 'Banco HSBC de El Salvador, S.A.'),
(178, 3, '2104030503', 'Banco Promerica, S.A.'),
(179, 3, '2104030504', 'Banco de America Central, S.A.'),
(180, 3, '21040306', 'Vialidad a Empleados'),
(181, 3, '21040307', 'Procuraduría General'),
(182, 3, '21040308', 'Pensiones'),
(183, 3, '2104030801', 'AFP Confia, S.A.'),
(184, 3, '2104030802', 'AFP Ccrecer, S.A.'),
(185, 3, '2104030803', 'ISSS pensiones'),
(186, 3, '2104030804', 'I P S F A'),
(187, 3, '21040309', 'Otras Retenciones'),
(188, 3, '2105', 'Beneficios a Empleados por Pagar'),
(189, 3, '210501', 'Beneficios a Corto Plazo por Pagar'),
(190, 3, '21050101', 'Planillas de Sueldos por Pagar'),
(191, 3, '21050102', 'Comisiones'),
(192, 3, '21050103', 'Bonificaciones'),
(193, 3, '21050104', 'Vacaciones'),
(194, 3, '21050105', 'Aguinaldo'),
(195, 3, '21050106', 'Aportes Patronales ISSS'),
(196, 3, '210502', 'Beneficios Post-Empleo por Pagar'),
(197, 3, '21050201', 'Aportaciones Patronales Pensiones Gubernamentales'),
(198, 3, '21050202', 'ISSS - Cuota Patronal'),
(199, 3, '210503', 'Aportaciones Patronales Pensiones no Gubernamental'),
(200, 3, '21050301', 'AFP - Cuota Patronal'),
(201, 3, '2105030101', 'AFP Confia, S.A.'),
(202, 3, '2105030102', 'AFP Ccrecer, S.A.'),
(203, 3, '2105030103', 'ISSS pensiones'),
(204, 3, '2105030104', 'I P S F A'),
(205, 3, '210504', 'Aportaciones Patronales Pensiones Multiempresa'),
(206, 3, '21050401', 'Seguro Dotal por Pagar'),
(207, 3, '2106', 'Débito Fiscal - IVA'),
(208, 3, '210601', 'Débito Fiscal - IVA'),
(209, 3, '21060101', 'Contribuyentes'),
(210, 3, '21060102', 'Consumidores Finales'),
(211, 3, '2107', 'Dividendos por Pagar'),
(212, 3, '2108', 'Impuestos por Pagar'),
(213, 3, '210801', 'ISR Por Pagar Corriente'),
(214, 3, '210802', 'Pasivo Diferido por ISR'),
(215, 3, '210803', 'Impuestos Municipales'),
(216, 3, '210804', 'Pago a Cuenta'),
(217, 3, '210805', 'IVA por Pagar'),
(218, 3, '210806', '1% IVA Retenido a Contribuyentes'),
(219, 3, '210807', '1% IVA Percibido a Contribuyentes'),
(220, 3, '2109', 'Partes Relacionadas'),
(221, 3, '210901', 'Directores, Ejecutivos y Empleados'),
(222, 3, '210902', 'Compañías Afiliadas'),
(223, 3, '210903', 'Compañías Asociadas'),
(224, 3, '210904', 'Compañías Subsidiarias'),
(225, 3, '210905', 'Compañias Relacionadas'),
(226, 4, '2201', 'Préstamos Bancarios a Largo Plazo'),
(227, 4, '220101', 'Préstamos Hipotecarios Largo Plazo'),
(228, 4, '220102', 'Deuda Convertible a Largo Plazo'),
(229, 4, '220103', 'Prestamos a Largo Plazo No Bancarios'),
(230, 4, '22010301', 'Maria Guadalupe Iraheta de Martinez'),
(231, 4, '22010302', 'Gilda Esperanza Lopez'),
(232, 4, '2202', 'Obligaciones Bajo Arrendamiento Financiero a Largo'),
(233, 4, '220201', 'Contratos Bajo Arrendamiento Financiero Largo Plaz'),
(234, 4, '2203', 'Anticipos y Garantías de Clientes'),
(235, 4, '220301', 'Anticipo de Clientes'),
(236, 4, '220302', 'Garantías de Clientes'),
(237, 4, '220303', 'Anticipos por otorgamiento de creditos'),
(238, 4, '2204', 'Provisión para Obligaciones Laborales'),
(239, 4, '220401', 'Indemnizaciones'),
(240, 4, '220402', 'Vacaciones'),
(241, 4, '220403', 'Aguinaldos'),
(242, 5, '31', 'Capital'),
(243, 5, '3101', 'Capital Social'),
(244, 5, '310101', 'Capital Social-Mínimo'),
(245, 5, '31010101', 'Capital Social Minimo Suscrito y Pagado'),
(246, 5, '31010102', 'Capital Social Minimo Suscrito y No Pagado'),
(247, 5, '310102', 'Capital Social- Variable'),
(248, 5, '310103- R', 'Acciones en Tesorería'),
(249, 6, '3201', 'Superávit por Revaluos de Activos'),
(250, 6, '320101', 'Superávit por Revalúos de Terrenos'),
(251, 6, '320102', 'Superávit por Revalúos de Instalaciones Permanente'),
(252, 6, '320103', 'Superávit por Revalúos de Mobiliario y Equipo Sala'),
(253, 6, '320104', 'Superávit por Revalúos de Equipo de Transporte'),
(254, 6, '320105', 'Superávit por Revalúos de Equipo de Cómputo'),
(255, 6, '320106', 'Superávit por Revalúos de Activos Intangibles'),
(256, 7, '3301', 'Utilidades Restringidas'),
(257, 7, '330101', 'Reserva Legal'),
(258, 7, '3302', 'Utilidades no Distribuidas'),
(259, 7, '330201', 'Utilidades de Ejercicio Anteriores'),
(260, 7, '330202', 'Utilidades de Ejercicio'),
(261, 7, '3303-R', 'Déficit Acumulado'),
(262, 7, '3303-R-01', 'Pérdidas de Ejercicio Anteriores'),
(263, 7, '3303-R-02', 'Pérdidas de Ejercicio'),
(264, 7, '3304', 'Otras Reservas'),
(265, 7, '330401', 'Voluntarias'),
(266, 8, '4101', 'Costos de Ventas de Mercaderias y Servicios'),
(267, 8, '410101', 'Costo de Venta de Mercaderías'),
(268, 8, '410102', 'Costo de Servicios'),
(269, 8, '4102', 'Gastos de Ventas'),
(270, 8, '410201', 'Remuneraciones Laborales'),
(271, 8, '41020101', 'Sueldos y Horas Extras'),
(272, 8, '41020102', 'Comisiones'),
(273, 8, '41020103', 'Bonificaciones'),
(274, 8, '41020104', 'Aguinaldos'),
(275, 8, '41020105', 'Vacaciones'),
(276, 8, '41020106', 'Otras Remuneraciones laborales'),
(277, 8, '410202', 'Beneficios a Empleados'),
(278, 8, '41020201', 'Aporte por Seguridad Social de Salud (ISSS)'),
(279, 8, '41020202', 'Aporte al Fondo de Pensiones (AFP`s)'),
(280, 8, '41020203', 'Indemnizaciones'),
(281, 8, '41020204', 'Atenciones al Personal'),
(282, 8, '41020205', 'Uniformes y Accesorios'),
(283, 8, '41020206', 'Gastos de Viajes y representaciones'),
(284, 8, '41020207', 'Regalías y Otros'),
(285, 8, '410203', 'Honorarios'),
(286, 8, '41020301', 'Honorarios Profesionales'),
(287, 8, '41020302', 'Honorarios Técnicos'),
(288, 8, '41020303', 'Honorarios por Servicios Judiciales'),
(289, 8, '410204', 'Mantenimientos'),
(290, 8, '41020401', 'Mantenimientos Equipo de Oficina'),
(291, 8, '41020402', 'Mantenimientos Mobiliario y Equipo'),
(292, 8, '41020403', 'Mantenimientos Equipo de Transportes'),
(293, 8, '41020404', 'Mantenimientos de Locales'),
(294, 8, '410205', 'Impuestos, Tasas y Derechos Registrales'),
(295, 8, '41020501', 'Impuestos y tasas municipales'),
(296, 8, '41020502', 'Impuestos Fiscales'),
(297, 8, '41020503', 'Derechos de Registro en CNR'),
(298, 8, '41020504', 'Impuestos al combustible'),
(299, 8, '410206', 'Energia Electrica'),
(300, 8, '410207', 'Agua Potable'),
(301, 8, '410208', 'Comunicaciones'),
(302, 8, '41020801', 'Telefonia Fija'),
(303, 8, '41020802', 'Telefonica Movil'),
(304, 8, '41020803', 'Servicios de Cable y Correo'),
(305, 8, '41020804', 'Otros Servicios de Comunicación'),
(306, 8, '410209', 'Depreciacion y Amortizaciones'),
(307, 8, '410210', 'Papelería y Utiles'),
(308, 8, '410211', 'Transportes y Viaticos'),
(309, 8, '410212', 'Combustible y Lubricantes'),
(310, 8, '410213', 'Publicidad y Propaganda'),
(311, 8, '410214', 'Cuotas y Suscripciones'),
(312, 8, '410215', 'Seguridad y Vigilancia'),
(313, 8, '41021501', 'Servicios de Seguridad'),
(314, 8, '41021502', 'Servicios de Monitoreo'),
(315, 8, '410216', 'Donaciones y Contribuciones'),
(316, 8, '410217', 'Materiales de Empaque'),
(317, 8, '410218', 'Multas y Recargos'),
(318, 8, '410219', 'Varios'),
(319, 8, '410222', 'Alquileres'),
(320, 8, '41022201', 'Alquiler de Inmuebles'),
(321, 8, '4103', 'Gastos de Administración'),
(322, 8, '410301', 'Remuneraciones Laborales'),
(323, 8, '41030101', 'Sueldos y Horas Extras'),
(324, 8, '41030102', 'Comisiones'),
(325, 8, '41030103', 'Bonificaciones'),
(326, 8, '41030104', 'Aguinaldos'),
(327, 8, '41030105', 'Vacaciones'),
(328, 8, '41030106', 'Otras Remuneraciones laborales'),
(329, 8, '410302', 'Beneficios a Empleados'),
(330, 8, '41030201', 'Aporte por Seguridad Social de Salud (ISSS)'),
(331, 8, '41030202', 'Aporte al Fondo de Pensiones (AFP`s)'),
(332, 8, '41030203', 'Indemnizaciones'),
(333, 8, '41030204', 'Atenciones al Personal'),
(334, 8, '41030205', 'Uniformes y Accesorios'),
(335, 8, '41030206', 'Gastos de Viajes y Representaciones'),
(336, 8, '41030207', 'Regalías y Otros'),
(337, 8, '410303', 'Honorarios'),
(338, 8, '41030301', 'Honorarios Profesionales'),
(339, 8, '41030302', 'Honorarios Técnicos'),
(340, 8, '410304', 'Mantenimientos'),
(341, 8, '41030401', 'Mantenimientos Equipo de Oficina'),
(342, 8, '41030402', 'Mantenimientos Mobiliario y Equipo'),
(343, 8, '41030403', 'Mantenimientos Equipo de Transportes'),
(344, 8, '41030404', 'Mantenimientos de Locales'),
(345, 8, '410305', 'Impuestos, Tasas y Derechos Registrales'),
(346, 8, '41030501', 'Impuestos y tasas municipales'),
(347, 8, '41030502', 'Impuestos Fiscales'),
(348, 8, '41030503', 'Derechos de Registro en CNR'),
(349, 8, '41030504', 'Impuestos al combustible'),
(350, 8, '410306', 'Energia Electrica'),
(351, 8, '410307', 'Agua Potable'),
(352, 8, '410308', 'Comunicaciones'),
(353, 8, '41030801', 'Telefonia Fija'),
(354, 8, '41030802', 'Telefonica Movil'),
(355, 8, '41030803', 'Servicios de Cable y Correo'),
(356, 8, '41030804', 'Otros Servicios de Comunicación'),
(357, 8, '410309', 'Depreciacion y Amortizaciones'),
(358, 8, '410310', 'Papelería y Utiles'),
(359, 8, '410311', 'Transportes y Viaticos'),
(360, 8, '410312', 'Combustible y Lubricantes'),
(361, 8, '410313', 'Publicidad y Propaganda'),
(362, 8, '410314', 'Cuotas y Suscripciones'),
(363, 8, '410315', 'Seguridad y Vigilancia'),
(364, 8, '410316', 'Donaciones y Contribuciones'),
(365, 8, '410317', 'Materiales de Empaque'),
(366, 8, '410318', 'Multas y recargos'),
(367, 8, '410319', 'Varios'),
(368, 8, '410320', 'Gastos No Sujetos a ISR'),
(369, 8, '410321', 'Articulos de limpieza varios'),
(370, 8, '410322', 'Alquileres'),
(371, 9, '4201', 'Gastos Financieros'),
(372, 9, '420101', 'Intereses'),
(373, 9, '420102', 'Comisiones Bancarias'),
(374, 9, '420103', 'Otros Cargos Financieros'),
(375, 9, '4202', 'Diferencial de Cambio'),
(376, 9, '420201', 'Gastos de Diferencia de Cambio'),
(377, 10, '4301', 'Pérdida en Venta de Activo Fijo'),
(378, 10, '4302', 'Gastos por Siniestros'),
(379, 11, '4401', 'Gastos de Operaciones en Discontinuación'),
(380, 12, '5101', 'Ventas Comerciales'),
(381, 12, '510101', 'Ventas Comerciales Gravadas'),
(382, 12, '510102', 'Ventas Comerciales Exentas'),
(383, 12, '5102', 'Ingresos por Servicios'),
(384, 12, '510201', 'Intereses sobre prestamos'),
(385, 12, '51020101', 'Intereses corrientes'),
(386, 12, '51020102', 'Intereses por mora'),
(387, 12, '510202', 'Comisiones y tarifas por servicios'),
(388, 12, '51020201', 'Tramitaciones de prestamos'),
(389, 12, '51020202', 'Honorarios por escrituraciones'),
(390, 12, '51020203', 'Gestiones de cobranza'),
(391, 12, '51020204', 'Comisiones y recargos sobre creditos'),
(392, 12, '51020205', 'Servicios Varios'),
(393, 12, '510204', 'Otros Servicios'),
(394, 12, '5103', 'Otros Ingresos Operacionales'),
(395, 12, '510301', 'Ingresos Diversos'),
(396, 13, '5201', 'Intereses Ganados'),
(397, 13, '520101', 'Intereses ganados en depositos'),
(398, 13, '5202', 'Dividendos Ganados'),
(399, 13, '5203', 'Ganancia en Venta de Activo Fijo'),
(400, 13, '5204', 'Otros Ingresos'),
(401, 13, '520401', 'Indemnizaciones por Reclamos de Seguros'),
(402, 13, '520402', 'Ingresos varios'),
(403, 14, '5301', 'Ingresos de Operaciones en Discontinuación'),
(404, 15, '6101', 'Pérdidas y Ganancias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_laborales`
--

CREATE TABLE `tbl_datos_laborales` (
  `Cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Empresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Rubro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `Fk_Id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_datos_laborales`
--

INSERT INTO `tbl_datos_laborales` (`Cargo`, `Nombre_Empresa`, `Direccion`, `Telefono`, `Rubro`, `Observaciones`, `Fk_Id_Cliente`) VALUES
('AUXILIAR DE LA UNIDAD DE MEDIO AMBIENTE', 'ALCALDIA MUNICIPAL DE MERCEDES UMAÑA', 'AV. ROOSVELT, BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '2684-0707', 'GUBERNAMENTAL', '', 12),
('AUXILIAR DE LA UNIDAD DE MEDIO AMBIENTE', 'ALCALDIA MUNICIPAL DE MERCEDES UMAÑA', 'AV. ROOSVELT, BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '2684-0707', 'GUBERNAMENTAL', '', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_negocio`
--

CREATE TABLE `tbl_datos_negocio` (
  `Id_Negocio` int(11) NOT NULL,
  `Fk_Id_Cliente` int(11) NOT NULL,
  `Nombre_Negocio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NIT` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NRC` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Giro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion_Negocio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_Factura` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamentos`
--

CREATE TABLE `tbl_departamentos` (
  `Id_Departamento` int(11) NOT NULL,
  `Nombre_Departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_departamentos`
--

INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES
(1, 'Ahuachapán'),
(2, 'Santa Ana'),
(3, 'Sonsonate'),
(4, 'La Libertad'),
(5, 'Chalatenango'),
(6, 'San Salvador'),
(7, 'Cuscatlán'),
(8, 'La Paz'),
(9, 'Cabañas'),
(10, 'San Vicente'),
(11, 'Usulután'),
(12, 'Morazán'),
(13, 'San Miguel'),
(14, 'La Unión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detallepagos`
--

CREATE TABLE `tbl_detallepagos` (
  `idDetallePago` int(11) NOT NULL,
  `totalPago` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `interes` decimal(10,2) NOT NULL,
  `abonoCapital` decimal(10,2) NOT NULL,
  `capitalPendiente` decimal(10,0) NOT NULL,
  `interesPendiente` decimal(10,2) NOT NULL,
  `diasPagados` int(11) NOT NULL,
  `mora` decimal(10,2) NOT NULL,
  `fechaPago` date NOT NULL,
  `fechaProximoPago` date NOT NULL,
  `estadoFacturacion` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idCredito` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para registros de pagos de cada cliente';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `idDocumento` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDocumento` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para gestinonar copiar de documentos y fotos de perfil';

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`idDocumento`, `nombre`, `url`, `tipoDocumento`, `codigo`, `estado`, `fechaRegistro`) VALUES
(1, 'Pagaré Mario Alfredo Perdomo.doc', 'plantilla/Docs/MAP20182612Pagaré Mario Alfredo Perdomo.doc', '1', 'MAP20182612', 1, '2018-12-26 20:23:59'),
(2, 'Mutuo Mario Alfredo Perdomo.doc', 'plantilla/Docs/MAP20182612Mutuo Mario Alfredo Perdomo.doc', '1', 'MAP20182612', 1, '2018-12-26 20:24:14'),
(3, 'CONSTANCIA ADOLFO.docx', 'plantilla/Docs/MF201993CONSTANCIA ADOLFO.docx', '1', 'MF201993', 1, '2019-03-09 20:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoEmpleado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimientoEmpleado` date NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `fechaNacimientoEmpleado`, `genero`, `dui`, `nit`, `direccion`, `telefono`, `email`, `cargo`, `profesion`, `estado`, `fechaRegistro`) VALUES
(5, 'JOSE ELIZARDO', 'ALVARENGA IRAHETA', '1968-02-14', 'Masculino', '01412790-3', '1102-140268-102-0', '3 AV. SUR BARRIOS CONCEPCION MERCEDES UMAÑA.', '7909-2356', 'jeli_alvarenga@hotmail.com', 'JEFE ADMINISTRATIVO', 'CONTADOR', 1, '2018-12-01 00:10:25'),
(6, 'JONATAN EDGARDO', 'ALVARENGA RIVAS', '1994-09-11', 'Masculino', '05058339-1', '1102-110994-102-5', 'BERLIN, USULUTAN', '74928029', 'JHONATANALVARENGA96@GMAIL.COM', 'EJECUTIVO DE CREDITOS', 'ESTUDIANTE', 1, '2018-12-01 00:26:14'),
(7, 'NORMA DEL CARMEN', 'IRAHETA DE GUZMAN', '1978-04-10', 'Femenino', '03589402-8', '1102-100478-102-2', 'Col. Palmerola # 1, salida Berlín Usulutan', '7912-8698', 'irahetn@gmail.com', 'CAJERA', 'EMPLEADA', 1, '2019-01-04 14:18:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `giro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `nrc` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`idEmpresa`, `nombreEmpresa`, `giro`, `email`, `telefono`, `direccion`, `nrc`, `estado`, `fechaRegistro`) VALUES
(1, 'Fast Cash', 'Financiero', 'fastcash.sa@gmail.com', '26295217', 'Mercedes Umaña', '', 1, '2018-11-30 23:46:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_solicitud`
--

CREATE TABLE `tbl_estados_solicitud` (
  `id_estado` int(11) NOT NULL,
  `nombreEstado` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_estados_solicitud`
--

INSERT INTO `tbl_estados_solicitud` (`id_estado`, `nombreEstado`, `estado`, `fecha_registro`) VALUES
(1, 'Nueva', 1, '2018-11-02'),
(2, 'En Proceso', 1, '0000-00-00'),
(3, 'Aprobada', 1, '0000-00-00'),
(4, 'Denegada', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE `tbl_factura` (
  `id_factura` int(11) NOT NULL,
  `noAfecta` double NOT NULL,
  `ventasGravadas` double NOT NULL,
  `saldoAnterior` double NOT NULL,
  `saldoActual` double NOT NULL,
  `iva` double NOT NULL,
  `pago` double NOT NULL,
  `fechaAplicacion` date NOT NULL,
  `intMora` double NOT NULL,
  `estadoFactura` int(11) NOT NULL,
  `id_Credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fiadores`
--

CREATE TABLE `tbl_fiadores` (
  `idFiador` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(17) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `ingreso` decimal(10,2) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla para los Fiadores';

--
-- Volcado de datos para la tabla `tbl_fiadores`
--

INSERT INTO `tbl_fiadores` (`idFiador`, `nombre`, `apellido`, `dui`, `nit`, `telefono`, `email`, `direccion`, `genero`, `fechaNacimiento`, `ingreso`, `idSolicitud`, `estado`, `fechaRegistro`) VALUES
(1, 'ROSA AMINTA', 'MEJIA CRUZ', '02648844-6', '1111-271274-104-4', '2684-0707', 'alcaldiademercedesu@hotmail.com', 'COLONIA LAS FLORES, MERCEDES UMAÑA, USULUTAN', 'Femenino', '1974-12-27', '310.00', 21, 1, '2018-12-26 20:18:29'),
(2, 'MARVIN STALEY', 'ROMERO RAMIREZ', '05092317-6', '0617-101294-105-7', '2663-4226', '', 'B. EL CALVARIO MERCEDES UMAÑA', 'Masculino', '0194-12-10', '325.00', 37, 1, '2019-02-18 17:10:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_garantias`
--

CREATE TABLE `tbl_garantias` (
  `idGarantia` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valorado` decimal(10,2) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para la Garantía';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_hipotecas`
--

CREATE TABLE `tbl_hipotecas` (
  `idHipoteca` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valorado` decimal(10,2) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `idMenu` int(11) NOT NULL,
  `menu` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `html` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_menu`
--

INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES
(1, 'Contaduría', '<li class=\"has_sub\">\r\n    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"ion ion-social-buffer\"style=\"font-size: 25px; color: blue;\"></i><span style=\"color: blue; font-weight: bold;\">Contaduría</span><span class=\"pull-right\"><i class=\"md md-keyboard-arrow-down\"></i></span></a>\r\n    <ul>\r\n        <!-- <li class=\"has_sub\">\r\n            <a href=\"javascript:void(0);\" class=\"waves-effect\"><span>Menu Level 1.1</span> <span class=\"pull-right\"><i class=\"md md-add\"></i></span></a>\r\n            <ul style=\"\">\r\n                <li><a href=\"javascript:void(0);\"><span>Menu Level 2.1</span></a></li>\r\n            </ul>\r\n        </li>\r\n        <li class=\"has_sub\">\r\n            <a href=\"javascript:void(0);\" class=\"waves-effect\"><span>Menu Level 1.1</span> <span class=\"pull-right\"><i class=\"md md-add\"></i></span></a>\r\n            <ul style=\"\">\r\n                <li><a href=\"javascript:void(0);\"><span>Menu Level 2.1</span></a></li>\r\n            </ul>\r\n        </li>\r\n        <li>\r\n            <a href=\"javascript:void(0);\"><span>Menu Level 1.2</span></a>\r\n        </li> -->\r\n        <li>\r\n           <a href=\"http://localhost/www/fast-cashv3.0/Contabilidad\" class=\"waves-effect\">Nueva partida</a>\r\n        </li>\r\n    </ul>\r\n</li>', 1, '2019-03-16 20:32:37'),
(2, 'Clientes', '<li class=\'has_sub\'>                                 \r\n\r\n  <a href=\'#\' class=\'waves-effect\'><i class=\'fa fa-user-o\'></i><span>Clientes</span><span class=\'pull-right\'><i class=\'md md-keyboard-arrow-down\'></i></span></a>                                 \r\n\r\n  <ul class=\'list-unstyled\'>                                     \r\n\r\n    <li><a href=\'http://localhost/www/fast-cashv3.0/Clientes/\'>Nuevo cliente</a></li>\r\n\r\n    <li><a href=\'http://localhost/www/fast-cashv3.0/Clientes/gestionarCliente\'>Clientes</a></li>                    \r\n\r\n  </ul>\r\n\r\n</li>', 1, '2018-11-22 02:56:45'),
(3, 'Solicitud', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-address-card-o\"></i><span>Solicitud</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"#\" data-toggle=\"modal\" data-target=\".modal_opcion_solicitud\">Nueva solicitud</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Solicitud/\">Solicitudes</a></li>\r\n        <!-- <li><a href=\"http://localhost/www/fast-cashv3.0/EstadosSolicitud/\">Gesctionar estados de la solicitud</a></li> -->\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Solicitud/gestionarPlazos\">Plazos</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-22 03:02:26'),
(4, 'Creditos', '<li>\r\n   <a href=\"http://localhost/www/fast-cashv3.0/Creditos\" class=\"waves-effect\"><i class=\"fa fa-list-alt fa-lg\"></i><span>Créditos</span></a>\r\n</li>', 1, '2018-11-22 03:03:21'),
(5, 'Pagos', '<li>\r\n   <a href=\"#\" class=\"waves-effect\" data-toggle=\"modal\" data-target=\".modal_opcion_pagos\"><i class=\"ion ion-cash\" style=\"font-size: 26px;\"></i><span>Pagos</span></a>\r\n</li>\r\n', 1, '2018-12-27 01:12:28'),
(6, 'Empleados', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-android-social\" style=\"font-size:24px;\"></i><span>Empleados</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Empleados/ViewInsertarEmpleados\">Nuevo empleado</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Empleados/Index\">Empleados</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-22 03:04:48'),
(7, 'Caja', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-android-inbox\" ></i><span>Caja</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/\" class=\"waves-effect\"><span>Caja General</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/CajaChica\" class=\"waves-effect\"><span>Caja Chica</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/HistorialCajas\" class=\"waves-effect\"><span>Historial</span></a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-22 03:19:25'),
(8, 'Proveedores', '<li>\r\n    <a href=\"http://localhost/www/fast-cashv3.0/Proveedores/\" class=\"waves-effect\"><i class=\"ion-android-contacts\"></i><span> Proveedores </span></a>\r\n</li>', 1, '2018-11-22 03:19:25'),
(9, 'Configuración', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-cog\" ></i><span>Configuración</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/User/\">Usuarios</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Accesos/\">Roles</a></li>\r\n         <li><a href=\"http://localhost/www/fast-cashv3.0/Rol/\">Permisos</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-22 03:05:53'),
(10, 'Empresa', '<li>\r\n    <a href=\"http://localhost/www/fast-cashv3.0/Empresa/\" class=\"waves-effect\"><i class=\"fa fa-university\"></i><span> Empresa </span></a>\r\n</li>', 1, '2018-11-22 03:19:45'),
(11, 'Reportes', '<li class=\"has_sub\">\r\n  <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-clipboard\" style=\"font-size: 28px;\"></i><span>Reportes</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/General/1\">General</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosPendientes/1\">Creditos Pendientes</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosVencidos/1\">Creditos Vencidos</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosMorosos/1\">Créditos Morosos</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosSaldados/1\">Créditos Saldados</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/ReporteIva/1\">Reporte de IVA</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/ResumenIva/1\">Resumen de IVA</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/Infored\">INFORED</a></li>\r\n    </ul>\r\n</li>', 1, '2019-02-21 02:01:01'),
(12, 'Facturación', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-newspaper-o\" ></i><span>Facturación</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Facturas/\" class=\"waves-effect\"><span>Historial facturas</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Facturas/FacturarCreditosPopulares\" class=\"waves-effect\"><span>Facturar creditos populares</span></a></li>\r\n    </ul>\r\n</li>', 1, '2019-03-01 01:41:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

CREATE TABLE `tbl_municipios` (
  `Id_Municipio` int(11) NOT NULL,
  `Nombre_Municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fk_Id_Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_municipios`
--

INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Jujutla', 1),
(3, 'Atiquizaya', 1),
(4, 'Concepción de Ataco', 1),
(5, 'El Refugio', 1),
(6, 'Guaymango', 1),
(7, 'Apaneca', 1),
(8, 'San Francisco Menéndez', 1),
(9, 'San Lorenzo', 1),
(10, 'San Pedro Puxtla', 1),
(11, 'Tacuba', 1),
(12, 'Turín', 1),
(13, 'Candelaria de la Frontera', 2),
(14, 'Chalchuapa', 2),
(15, 'Coatepeque', 2),
(16, 'El Congo', 2),
(17, 'El Porvenir', 2),
(18, 'Masahuat', 2),
(19, 'Metapán', 2),
(20, 'San Antonio Pajonal', 2),
(21, 'San Sebastián Salitrillo', 2),
(22, 'Santa Ana', 2),
(23, 'Santa Rosa Guachipilín', 2),
(24, 'Santiago de la Frontera', 2),
(25, 'Texistepeque', 2),
(26, 'Acajutla', 3),
(27, 'Armenia', 3),
(28, 'Caluco', 3),
(29, 'Cuisnahuat', 3),
(30, 'Izalco', 3),
(31, 'Juayúa', 3),
(32, 'Nahuizalco', 3),
(33, 'Nahulingo', 3),
(34, 'Salcoatitán', 3),
(35, 'San Antonio del Monte', 3),
(36, 'San Julián', 3),
(37, 'Santa Catarina Masahuat', 3),
(38, 'Santa Isabel Ishuatán', 3),
(39, 'Santo Domingo de Guzmán', 3),
(40, 'Sonsonate', 3),
(41, 'Sonzacate', 3),
(42, 'Alegría', 11),
(43, 'Berlín', 11),
(44, 'California', 11),
(45, 'Concepción Batres', 11),
(46, 'El Triunfo', 11),
(47, 'Ereguayquín', 11),
(48, 'Estanzuelas', 11),
(49, 'Jiquilisco', 11),
(50, 'Jucuapa', 11),
(51, 'Jucuarán', 11),
(52, 'Mercedes Umaña', 11),
(53, 'Nueva Granada', 11),
(54, 'Ozatlán', 11),
(55, 'Puerto El Triunfo', 11),
(56, 'San Agustín', 11),
(57, 'San Buenaventura', 11),
(58, 'San Dionisio', 11),
(59, 'San Francisco Javier', 11),
(60, 'Santa Elena', 11),
(61, 'Santa María', 11),
(62, 'Santiago de María', 11),
(63, 'Tecapán', 11),
(64, 'Usulután', 11),
(65, 'Carolina', 13),
(66, 'Chapeltique', 13),
(67, 'Chinameca', 13),
(68, 'Chirilagua', 13),
(69, 'Ciudad Barrios', 13),
(70, 'Comacarán', 13),
(71, 'El Tránsito', 13),
(72, 'Lolotique', 13),
(73, 'Moncagua', 13),
(74, 'Nueva Guadalupe', 13),
(75, 'Nuevo Edén de San Juan', 13),
(76, 'Quelepa', 13),
(77, 'San Antonio del Mosco', 13),
(78, 'San Gerardo', 13),
(79, 'San Jorge', 13),
(80, 'San Luis de la Reina', 13),
(81, 'San Miguel', 13),
(82, 'San Rafael Oriente', 13),
(83, 'Sesori', 13),
(84, 'Uluazapa', 13),
(85, 'Arambala', 12),
(86, 'Cacaopera', 12),
(87, 'Chilanga', 12),
(88, 'Corinto', 12),
(89, 'Delicias de Concepción', 12),
(90, 'El Divisadero', 12),
(91, 'El Rosario (\'razán)', 12),
(92, 'Gualococti', 12),
(93, 'Guatajiagua', 12),
(94, 'Joateca', 12),
(95, 'Jocoaitique', 12),
(96, 'Jocoro', 12),
(97, 'Lolotiquillo', 12),
(98, 'Meanguera', 12),
(99, 'Osicala', 12),
(100, 'Perquín', 12),
(101, 'San Carlos', 12),
(102, 'San Fernando (Morazán)', 12),
(103, 'San Francisco Gotera', 12),
(104, 'San Isidro (Morazán)', 12),
(105, 'San Simón', 12),
(106, 'Sensembra', 12),
(107, 'Sociedad', 12),
(108, 'Torola', 12),
(109, 'Yamabal', 12),
(110, 'Yoloaiquín', 12),
(111, 'La Unión', 14),
(112, 'San Alejo', 14),
(113, 'Yucuaiquín', 14),
(114, 'Conchagua', 14),
(115, 'Intipucá', 14),
(116, 'San José', 14),
(117, 'El Carmen (La Unión)', 14),
(118, 'Yayantique', 14),
(119, 'Bolívar', 14),
(120, 'Meanguera del Golfo', 14),
(121, 'Santa Rosa de Lima', 14),
(122, 'Pasaquina', 14),
(123, 'Anamoros', 14),
(124, 'Nueva Esparta', 14),
(125, 'El Sauce', 14),
(126, 'Concepción de Oriente', 14),
(127, 'Polorós', 14),
(128, 'Lislique', 14),
(129, 'Antiguo Cuscatlán', 4),
(130, 'Chiltiupán', 4),
(131, 'Ciudad Arce', 4),
(132, 'Colón', 4),
(133, 'Comasagua', 4),
(134, 'Huizúcar', 4),
(135, 'Jayaque', 4),
(136, 'Jicalapa', 4),
(137, 'La Libertad', 4),
(138, 'Santa Tecla', 4),
(139, 'Nuevo Cuscatlán', 4),
(140, 'San Juan Opico', 4),
(141, 'Quezaltepeque', 4),
(142, 'Sacacoyo', 4),
(143, 'San José Villanueva', 4),
(144, 'San Matías', 4),
(145, 'San Pablo Tacachico', 4),
(146, 'Talnique', 4),
(147, 'Tamanique', 4),
(148, 'Teotepeque', 4),
(149, 'Tepecoyo', 4),
(150, 'Zaragoza', 4),
(151, 'Agua Caliente', 5),
(152, 'Arcatao', 5),
(153, 'Azacualpa', 5),
(154, 'Cancasque', 5),
(155, 'Chalatenango', 5),
(156, 'Citalá', 5),
(157, 'Comapala', 5),
(158, 'Concepción Quezaltepeque', 5),
(159, 'Dulce Nombre de María', 5),
(160, 'El Carrizal', 5),
(161, 'El Paraíso', 5),
(162, 'La Laguna', 5),
(163, 'La Palma', 5),
(164, 'La Reina', 5),
(165, 'Las Vueltas', 5),
(166, 'Nueva Concepción', 5),
(167, 'Nueva Trinidad', 5),
(168, 'Nombre de Jesús', 5),
(169, 'Ojos de Agua', 5),
(170, 'Potonico', 5),
(171, 'San Antonio de la Cruz', 5),
(172, 'San Antonio Los Ranchos', 5),
(173, 'San Fernando (Chalatenango)', 5),
(174, 'San Francisco Lempa', 5),
(175, 'San Francisco Morazán', 5),
(176, 'San Ignacio', 5),
(177, 'San Isidro Labrador', 5),
(178, 'Las Flores', 5),
(179, 'San Luis del Carmen', 5),
(180, 'San Miguel de Mercedes', 5),
(181, 'San Rafael', 5),
(182, 'Santa Rita', 5),
(183, 'Tejutla', 5),
(184, 'Cojutepeque', 7),
(185, 'Candelaria', 7),
(186, 'El Carmen (Cuscatlán)', 7),
(187, 'El Rosario (Cuscatlán)', 7),
(188, 'Monte San Juan', 7),
(189, 'Oratorio de Concepción', 7),
(190, 'San Bartolomé Perulapía', 7),
(191, 'San Cristóbal', 7),
(192, 'San José Guayabal', 7),
(193, 'San Pedro Perulapán', 7),
(194, 'San Rafael Cedros', 7),
(195, 'San Ramón', 7),
(196, 'Santa Cruz Analquito', 7),
(197, 'Santa Cruz Michapa', 7),
(198, 'Suchitoto', 7),
(199, 'Tenancingo', 7),
(200, 'Aguilares', 6),
(201, 'Apopa', 6),
(202, 'Ayutuxtepeque', 6),
(203, 'Cuscatancingo', 6),
(204, 'Ciudad Delgado', 6),
(205, 'El Paisnal', 6),
(206, 'Guazapa', 6),
(207, 'Ilopango', 6),
(208, 'Mejicanos', 6),
(209, 'Nejapa', 6),
(210, 'Panchimalco', 6),
(211, 'Rosario de Mora', 6),
(212, 'San Marcos', 6),
(213, 'San Martín', 6),
(214, 'San Salvador', 6),
(215, 'Santiago Texacuangos', 6),
(216, 'Santo Tomás', 6),
(217, 'Soyapango', 6),
(218, 'Tonacatepeque', 6),
(219, 'Zacatecoluca', 8),
(220, 'Cuyultitán', 8),
(221, 'El Rosario (La Paz)', 8),
(222, 'Jerusalén', 8),
(223, 'Mercedes La Ceiba', 8),
(224, 'Olocuilta', 8),
(225, 'Paraíso de Osorio', 8),
(226, 'San Antonio Masahuat', 8),
(227, 'San Emigdio', 8),
(228, 'San Francisco Chinameca', 8),
(229, 'San Pedro Masahuat', 8),
(230, 'San Juan Nonualco', 8),
(231, 'San Juan Talpa', 8),
(232, 'San Juan Tepezontes', 8),
(233, 'San Luis La Herradura', 8),
(234, 'San Luis Talpa', 8),
(235, 'San Miguel Tepezontes', 8),
(236, 'San Pedro Nonualco', 8),
(237, 'San Rafael Obrajuelo', 8),
(238, 'Santa María Ostuma', 8),
(239, 'Santiago Nonualco', 8),
(240, 'Tapalhuaca', 8),
(241, 'Cinquera', 9),
(242, 'Dolores', 9),
(243, 'Guacotecti', 9),
(244, 'Ilobasco', 9),
(245, 'Jutiapa', 9),
(246, 'San Isidro (Cabañas)', 9),
(247, 'Sensuntepeque', 9),
(248, 'Tejutepeque', 9),
(249, 'Victoria', 9),
(250, 'Apastepeque', 10),
(251, 'Guadalupe', 10),
(252, 'San Cayetano Istepeque', 10),
(253, 'San Esteban Catarina', 10),
(254, 'San Ildefonso', 10),
(255, 'San Lorenzo', 10),
(256, 'San Sebastián', 10),
(257, 'San Vicente', 10),
(258, 'Santa Clara', 10),
(259, 'Santo Domingo', 10),
(260, 'Tecoluca', 10),
(261, 'Tepetitán', 10),
(262, 'Verapaz', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_partida`
--

CREATE TABLE `tbl_partida` (
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_partida`
--

INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES
(3, 5, 500, 500, 'Por prestamo a don Julian', '2019-03-08'),
(6, 5, 200, 200, 'prueba', '2019-03-09'),
(8, 5, 20.99, 20.99, 'este fallara', '2019-03-23'),
(9, 5, 100, 100, 'Otra prueba we', '2019-03-08'),
(10, 5, 80, 80, 'Por algo ', '2019-03-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_partida_cuentas`
--

CREATE TABLE `tbl_partida_cuentas` (
  `idProceso` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_partida_cuentas`
--

INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES
(4, 24, 3, 500, 0, '2019-03-08'),
(5, 3, 3, 0, 400, '2019-03-08'),
(6, 4, 3, 0, 100, '2019-03-08'),
(9, 3, 6, 0, 200, '2019-03-09'),
(10, 3, 6, 200, 0, '2019-03-09'),
(12, 2, 8, 20.99, 0, '2019-03-23'),
(13, 2, 8, 0, 20.99, '2019-03-23'),
(14, 2, 9, 100, 0, '2019-03-08'),
(15, 2, 9, 0, 100, '2019-03-08'),
(16, 3, 10, 80, 0, '2019-03-09'),
(17, 18, 10, 0, 80, '2019-03-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos`
--

CREATE TABLE `tbl_permisos` (
  `idPermiso` int(11) NOT NULL,
  `permiso` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idMenu` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES
(27, 1, 1, '2018-12-26 18:01:31', 1, 10),
(28, 1, 1, '2018-12-26 18:01:31', 2, 10),
(29, 1, 1, '2018-12-26 18:01:31', 3, 10),
(30, 1, 1, '2018-12-26 19:14:01', 1, 5),
(31, 1, 1, '2018-12-26 19:14:01', 2, 5),
(32, 1, 1, '2018-12-26 19:14:01', 3, 5),
(33, 1, 1, '2018-12-26 19:14:01', 4, 5),
(34, 1, 1, '2018-12-26 19:14:01', 5, 5),
(35, 1, 1, '2018-12-26 19:14:01', 6, 5),
(36, 1, 1, '2018-12-26 19:14:01', 7, 5),
(37, 1, 1, '2018-12-26 19:14:01', 8, 5),
(38, 1, 1, '2018-12-26 19:14:01', 10, 5),
(39, 1, 1, '2019-01-07 19:39:11', 1, 11),
(40, 1, 1, '2019-01-07 19:39:11', 2, 11),
(41, 1, 1, '2019-01-07 19:39:11', 3, 11),
(42, 1, 1, '2019-01-07 19:39:11', 4, 11),
(43, 1, 1, '2019-01-07 19:39:11', 6, 11),
(44, 1, 1, '2019-01-07 19:39:11', 7, 11),
(45, 1, 1, '2019-02-20 20:03:05', 11, 5),
(46, 1, 1, '2019-02-28 19:41:52', 12, 5),
(47, 1, 1, '2019-03-17 00:08:31', 9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plazos_prestamos`
--

CREATE TABLE `tbl_plazos_prestamos` (
  `id_plazo` int(11) NOT NULL,
  `tiempo_plazo` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `estado_plazo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_plazos_prestamos`
--

INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES
(1, 1, '2018-11-02', 1),
(2, 2, '2018-11-02', 1),
(3, 3, '2018-11-02', 1),
(4, 4, '2018-11-02', 1),
(5, 5, '2018-11-02', 1),
(6, 6, '2018-11-02', 1),
(7, 7, '2018-12-26', 1),
(8, 8, '2018-12-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreCompleto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreEmpresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rubro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `direccionEmpresa` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitudes`
--

CREATE TABLE `tbl_solicitudes` (
  `idSolicitud` int(11) NOT NULL,
  `codigoSolicitud` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecibido` datetime NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estadoSolicitud` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cobraMora` int(11) NOT NULL,
  `tipoCredito` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `destinoCredito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idLineaPlazo` int(11) NOT NULL,
  `idEstadoSolicitud` int(11) NOT NULL,
  `idDocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para la gestion de solicitudes';

--
-- Volcado de datos para la tabla `tbl_solicitudes`
--

INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES
(21, '0861', '2018-11-30 00:00:00', 'SE CONSIDERA UNA DIFERENCIA POSITIVA DE $ 0.96', 1, '2018-12-26 20:18:29', 1, 'Crédito popular', 0, 12, 8, 3, NULL),
(22, '0934', '2019-01-02 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 0, '2019-01-21 19:37:57', 1, 'Crédito popular', 0, 13, 1, 4, NULL),
(23, '0999', '2019-02-07 00:00:00', 'GARANTIA: PAGARE Y MUTUO SIMPLE', 1, '2019-02-07 16:40:04', 1, 'Crédito popular', 0, 15, 2, 3, NULL),
(24, '0997', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 17:10:22', 1, 'Crédito popular', 0, 16, 1, 3, NULL),
(25, '0995', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 17:44:25', 1, 'Crédito popular', 0, 17, 3, 3, NULL),
(26, '0994', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 17:54:51', 1, 'Crédito popular', 0, 13, 1, 3, NULL),
(27, '0991', '2019-01-31 00:00:00', 'GARANTIA: PAGARE, MUTUO SIMPLE Y LETRA DE CAMBIO', 1, '2019-02-07 19:31:10', 1, 'Crédito popular', 0, 18, 5, 3, NULL),
(28, '0997', '2019-01-31 00:00:00', 'GARANTIA : PAGARE Y LETRA DE CAMBIO', 1, '2019-02-15 14:55:07', 1, 'Crédito popular', 0, 19, 1, 3, NULL),
(29, '0996', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-15 15:07:11', 1, 'Crédito popular', 0, 21, 1, 3, NULL),
(30, '0757', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y MUTUO SIMPLE.', 1, '2019-02-15 15:35:45', 1, 'Crédito popular', 0, 22, 2, 3, NULL),
(31, '001021', '2019-02-10 00:00:00', 'GARANTIA: LETRA DE CAMBIO Y PAGARE', 1, '2019-02-15 16:48:23', 0, 'Crédito popular', 0, 23, 1, 3, NULL),
(32, '001019', '2019-02-10 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-15 17:00:22', 1, 'Crédito popular', 0, 24, 1, 3, NULL),
(33, '0864', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 0, '2019-02-18 15:48:00', 0, 'Crédito popular', 0, 26, 1, 1, NULL),
(34, '0993', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 15:51:55', 1, 'Crédito popular', 0, 26, 1, 3, NULL),
(35, '001005', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 16:05:22', 1, 'Crédito popular', 0, 27, 2, 3, NULL),
(36, '001006', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 16:33:08', 1, 'Crédito popular', 0, 28, 1, 3, NULL),
(37, '0805', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y MUTUO SOLIDARIO ', 1, '2019-02-18 17:10:26', 1, 'Crédito popular', 0, 29, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subcategoria_cuenta`
--

CREATE TABLE `tbl_subcategoria_cuenta` (
  `idSubcategoria` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `codigoSubcategoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombreSubcategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_subcategoria_cuenta`
--

INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES
(1, 1, '11', 'ACTIVO CORRIENTE'),
(2, 1, '12', 'ACTIVO NO CORRIENTE'),
(3, 2, '21', 'PASIVO CORRIENTE'),
(4, 2, '22', 'PASIVO NO CORRIENTE'),
(5, 3, '31', 'CAPITAL'),
(6, 3, '32', 'SUPERÁVIT POR REVALUACIONES'),
(7, 3, '33', 'RESULTADOS ACUMULADOS'),
(8, 4, '41', 'COSTOS DE VENTAS Y SERVICIOS'),
(9, 4, '42', 'GASTOS NO OPERACIONALES'),
(10, 4, '43', 'RESULTADO EXTRAORDINARIO DEUDOR'),
(11, 4, '44', 'OPERACIONES EN DISCONTINUACIÓN DEUDORES'),
(12, 5, '51', 'INGRESOS POR OPERACIONES CONTINUAS'),
(13, 5, '52', 'OTROS INGRESOS NO OPERACIONALES'),
(14, 5, '53', 'OPERACIONES EN DISCONTINUACIÓN ACREEDORAS'),
(15, 6, '61', 'PÉRDIDAS Y GANANCIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pago`
--

CREATE TABLE `tbl_tipo_pago` (
  `idTipo` int(11) NOT NULL,
  `detalle` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_pago`
--

INSERT INTO `tbl_tipo_pago` (`idTipo`, `detalle`) VALUES
(1, 'Efectivo'),
(2, 'Cheque'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `idUser` int(11) NOT NULL,
  `user` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='usuarios del sistema';

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`idUser`, `user`, `pass`, `idEmpleado`, `idAcceso`, `estado`, `fechaRegistro`) VALUES
(4, 'admin', 'admin', 5, 5, 1, '2018-12-01 00:11:34'),
(5, 'JONATAN', '123456', 6, 10, 1, '2018-12-26 06:00:00'),
(6, 'CAJERA', '02211', 7, 11, 1, '2019-01-07 06:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  ADD PRIMARY KEY (`idAcceso`);

--
-- Indices de la tabla `tbl_amortizaciones`
--
ALTER TABLE `tbl_amortizaciones`
  ADD PRIMARY KEY (`idAmortizacion`),
  ADD KEY `idSolicitud` (`idSolicitud`);

--
-- Indices de la tabla `tbl_aranceles`
--
ALTER TABLE `tbl_aranceles`
  ADD PRIMARY KEY (`idArancel`);

--
-- Indices de la tabla `tbl_cajachica_procesos`
--
ALTER TABLE `tbl_cajachica_procesos`
  ADD PRIMARY KEY (`idProceso`),
  ADD KEY `idCajaChica` (`idCajaChica`),
  ADD KEY `idTipoPago` (`idTipoPago`);

--
-- Indices de la tabla `tbl_cajageneral_procesos`
--
ALTER TABLE `tbl_cajageneral_procesos`
  ADD PRIMARY KEY (`idProceso`),
  ADD KEY `idCajaChica` (`idCajaChica`),
  ADD KEY `tipoPago` (`idTipoPago`);

--
-- Indices de la tabla `tbl_caja_chica`
--
ALTER TABLE `tbl_caja_chica`
  ADD PRIMARY KEY (`idCajaC`);

--
-- Indices de la tabla `tbl_caja_general`
--
ALTER TABLE `tbl_caja_general`
  ADD PRIMARY KEY (`idCajaChica`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Fk_Id_Departamento` (`Fk_Id_Departamento`),
  ADD KEY `Fk_Id_Municipio` (`Fk_Id_Municipio`),
  ADD KEY `Fk_Id_Municipio_2` (`Fk_Id_Municipio`),
  ADD KEY `Fk_Id_Municipio_3` (`Fk_Id_Municipio`),
  ADD KEY `Fk_Id_Departamento_2` (`Fk_Id_Departamento`),
  ADD KEY `Fk_Id_Municipio_4` (`Fk_Id_Municipio`),
  ADD KEY `Fk_Id_Municipio_5` (`Fk_Id_Municipio`),
  ADD KEY `Fk_Id_Municipio_6` (`Fk_Id_Municipio`);

--
-- Indices de la tabla `tbl_creditos`
--
ALTER TABLE `tbl_creditos`
  ADD PRIMARY KEY (`idCredito`),
  ADD KEY `idAmortizacion` (`idAmortizacion`);

--
-- Indices de la tabla `tbl_datos_laborales`
--
ALTER TABLE `tbl_datos_laborales`
  ADD KEY `Fk_Id_Cliente` (`Fk_Id_Cliente`);

--
-- Indices de la tabla `tbl_datos_negocio`
--
ALTER TABLE `tbl_datos_negocio`
  ADD KEY `Fk_Id_Cliente` (`Fk_Id_Cliente`);

--
-- Indices de la tabla `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  ADD PRIMARY KEY (`Id_Departamento`);

--
-- Indices de la tabla `tbl_detallepagos`
--
ALTER TABLE `tbl_detallepagos`
  ADD PRIMARY KEY (`idDetallePago`),
  ADD KEY `idCredito` (`idCredito`),
  ADD KEY `idFactura` (`idFactura`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `tbl_estados_solicitud`
--
ALTER TABLE `tbl_estados_solicitud`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_Credito` (`id_Credito`);

--
-- Indices de la tabla `tbl_fiadores`
--
ALTER TABLE `tbl_fiadores`
  ADD PRIMARY KEY (`idFiador`),
  ADD KEY `idSolicitud` (`idSolicitud`);

--
-- Indices de la tabla `tbl_garantias`
--
ALTER TABLE `tbl_garantias`
  ADD PRIMARY KEY (`idGarantia`),
  ADD KEY `idDocumento` (`idDocumento`),
  ADD KEY `idSolicitud` (`idSolicitud`);

--
-- Indices de la tabla `tbl_hipotecas`
--
ALTER TABLE `tbl_hipotecas`
  ADD PRIMARY KEY (`idHipoteca`),
  ADD KEY `idSolicitud` (`idSolicitud`),
  ADD KEY `idDocumento` (`idDocumento`);

--
-- Indices de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD PRIMARY KEY (`Id_Municipio`),
  ADD KEY `Fk_Id_Departamento` (`Fk_Id_Departamento`);

--
-- Indices de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `idAcceso` (`idAcceso`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Indices de la tabla `tbl_plazos_prestamos`
--
ALTER TABLE `tbl_plazos_prestamos`
  ADD PRIMARY KEY (`id_plazo`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idLineaPlazo` (`idLineaPlazo`),
  ADD KEY `idEstadoSolicitud` (`idEstadoSolicitud`),
  ADD KEY `idDocumento` (`idDocumento`);

--
-- Indices de la tabla `tbl_tipo_pago`
--
ALTER TABLE `tbl_tipo_pago`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idAcceso` (`idAcceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  MODIFY `idAcceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_amortizaciones`
--
ALTER TABLE `tbl_amortizaciones`
  MODIFY `idAmortizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tbl_aranceles`
--
ALTER TABLE `tbl_aranceles`
  MODIFY `idArancel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cajachica_procesos`
--
ALTER TABLE `tbl_cajachica_procesos`
  MODIFY `idProceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cajageneral_procesos`
--
ALTER TABLE `tbl_cajageneral_procesos`
  MODIFY `idProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tbl_caja_chica`
--
ALTER TABLE `tbl_caja_chica`
  MODIFY `idCajaC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_caja_general`
--
ALTER TABLE `tbl_caja_general`
  MODIFY `idCajaChica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tbl_creditos`
--
ALTER TABLE `tbl_creditos`
  MODIFY `idCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  MODIFY `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_detallepagos`
--
ALTER TABLE `tbl_detallepagos`
  MODIFY `idDetallePago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_estados_solicitud`
--
ALTER TABLE `tbl_estados_solicitud`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_fiadores`
--
ALTER TABLE `tbl_fiadores`
  MODIFY `idFiador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_garantias`
--
ALTER TABLE `tbl_garantias`
  MODIFY `idGarantia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_hipotecas`
--
ALTER TABLE `tbl_hipotecas`
  MODIFY `idHipoteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  MODIFY `Id_Municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_plazos_prestamos`
--
ALTER TABLE `tbl_plazos_prestamos`
  MODIFY `id_plazo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_pago`
--
ALTER TABLE `tbl_tipo_pago`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_amortizaciones`
--
ALTER TABLE `tbl_amortizaciones`
  ADD CONSTRAINT `tbl_amortizaciones_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cajachica_procesos`
--
ALTER TABLE `tbl_cajachica_procesos`
  ADD CONSTRAINT `tbl_cajachica_procesos_ibfk_1` FOREIGN KEY (`idCajaChica`) REFERENCES `tbl_caja_chica` (`idCajaC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cajachica_procesos_ibfk_2` FOREIGN KEY (`idTipoPago`) REFERENCES `tbl_tipo_pago` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cajageneral_procesos`
--
ALTER TABLE `tbl_cajageneral_procesos`
  ADD CONSTRAINT `tbl_cajageneral_procesos_ibfk_1` FOREIGN KEY (`idCajaChica`) REFERENCES `tbl_caja_general` (`idCajaChica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cajageneral_procesos_ibfk_2` FOREIGN KEY (`idTipoPago`) REFERENCES `tbl_tipo_pago` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD CONSTRAINT `tbl_clientes_ibfk_1` FOREIGN KEY (`Fk_Id_Municipio`) REFERENCES `tbl_municipios` (`Id_Municipio`);

--
-- Filtros para la tabla `tbl_creditos`
--
ALTER TABLE `tbl_creditos`
  ADD CONSTRAINT `tbl_creditos_ibfk_1` FOREIGN KEY (`idAmortizacion`) REFERENCES `tbl_amortizaciones` (`idAmortizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_datos_laborales`
--
ALTER TABLE `tbl_datos_laborales`
  ADD CONSTRAINT `tbl_datos_laborales_ibfk_1` FOREIGN KEY (`Fk_Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_datos_negocio`
--
ALTER TABLE `tbl_datos_negocio`
  ADD CONSTRAINT `tbl_datos_negocio_ibfk_1` FOREIGN KEY (`Fk_Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_detallepagos`
--
ALTER TABLE `tbl_detallepagos`
  ADD CONSTRAINT `tbl_detallePagos_ibfk_2` FOREIGN KEY (`idCredito`) REFERENCES `tbl_creditos` (`idCredito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`id_Credito`) REFERENCES `tbl_creditos` (`idCredito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_fiadores`
--
ALTER TABLE `tbl_fiadores`
  ADD CONSTRAINT `tbl_fiadores_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_garantias`
--
ALTER TABLE `tbl_garantias`
  ADD CONSTRAINT `tbl_garantias_ibfk_2` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_hipotecas`
--
ALTER TABLE `tbl_hipotecas`
  ADD CONSTRAINT `tbl_hipotecas_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD CONSTRAINT `tbl_municipios_ibfk_1` FOREIGN KEY (`Fk_Id_Departamento`) REFERENCES `tbl_departamentos` (`Id_Departamento`);

--
-- Filtros para la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  ADD CONSTRAINT `tbl_solicitudes_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_solicitudes_ibfk_2` FOREIGN KEY (`idDocumento`) REFERENCES `tbl_documentos` (`idDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_solicitudes_ibfk_3` FOREIGN KEY (`idLineaPlazo`) REFERENCES `tbl_plazos_prestamos` (`id_plazo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_solicitudes_ibfk_6` FOREIGN KEY (`idEstadoSolicitud`) REFERENCES `tbl_estados_solicitud` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `tbl_empleados` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`idAcceso`) REFERENCES `tbl_accesos` (`idAcceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
