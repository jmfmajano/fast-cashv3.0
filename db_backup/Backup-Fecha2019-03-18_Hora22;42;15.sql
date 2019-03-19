#
# TABLE STRUCTURE FOR: tbl_accesos
#

DROP TABLE IF EXISTS `tbl_accesos`;

CREATE TABLE `tbl_accesos` (
  `idAcceso` int(11) NOT NULL AUTO_INCREMENT,
  `tipoAcceso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAcceso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para el manejo de accesos';

INSERT INTO `tbl_accesos` (`idAcceso`, `tipoAcceso`, `descripcion`, `estado`, `fechaRegistro`) VALUES (5, 'ADMINISTRADOR', 'ACCESO TOTAL AL SISTEMA', 1, '2018-11-30 18:11:05');
INSERT INTO `tbl_accesos` (`idAcceso`, `tipoAcceso`, `descripcion`, `estado`, `fechaRegistro`) VALUES (10, 'AUXILIAR CONTABLE', 'ACCESO LIMITADO', 1, '2018-12-15 00:00:00');
INSERT INTO `tbl_accesos` (`idAcceso`, `tipoAcceso`, `descripcion`, `estado`, `fechaRegistro`) VALUES (11, 'CAJERA', 'ACCESO LIMITADO', 1, '2019-01-07 00:00:00');


#
# TABLE STRUCTURE FOR: tbl_amortizaciones
#

DROP TABLE IF EXISTS `tbl_amortizaciones`;

CREATE TABLE `tbl_amortizaciones` (
  `idAmortizacion` int(11) NOT NULL AUTO_INCREMENT,
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
  `idSolicitud` int(11) NOT NULL,
  PRIMARY KEY (`idAmortizacion`),
  KEY `idSolicitud` (`idSolicitud`),
  CONSTRAINT `tbl_amortizaciones_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (21, '36.00', '400.00', '96.00', '12.48', '508.48', 8, '2.12', 240, 1, '2018-12-26 14:18:29', 21);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (22, '10.00', '75.00', '7.50', '0.98', '83.48', 1, '2.78', 30, 0, '2019-01-21 13:37:57', 22);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (23, '120.00', '250.00', '50.00', '6.50', '306.50', 2, '5.11', 60, 1, '2019-02-07 10:40:04', 23);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (24, '120.00', '50.00', '5.00', '0.65', '55.65', 1, '1.86', 30, 1, '2019-02-07 11:10:22', 24);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (25, '120.00', '100.00', '30.00', '3.90', '133.90', 3, '1.49', 90, 1, '2019-02-07 11:44:25', 25);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (26, '120.00', '75.00', '7.50', '0.98', '83.48', 1, '2.78', 30, 1, '2019-02-07 11:54:51', 26);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (27, '96.00', '500.00', '200.00', '26.00', '726.00', 5, '4.84', 150, 1, '2019-02-07 13:31:10', 27);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (28, '120.00', '50.00', '5.00', '0.65', '55.65', 1, '1.86', 30, 1, '2019-02-15 08:55:07', 28);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (29, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-15 09:07:11', 29);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (30, '10.00', '100.00', '20.00', '2.60', '122.60', 0, '2.04', 60, 1, '2019-02-15 09:35:45', 30);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (31, '120.00', '300.00', '30.00', '3.90', '333.90', 1, '11.13', 30, 1, '2019-02-15 10:48:23', 31);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (32, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-15 11:00:22', 32);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (33, '10.00', '150.00', '15.00', '1.95', '166.95', 0, '5.57', 30, 0, '2019-02-18 09:48:00', 33);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (34, '120.00', '150.00', '15.00', '1.95', '166.95', 1, '5.57', 30, 1, '2019-02-18 09:51:55', 34);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (35, '120.00', '150.00', '30.00', '3.90', '183.90', 2, '3.07', 60, 1, '2019-02-18 10:05:22', 35);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (36, '120.00', '100.00', '10.00', '1.30', '111.30', 1, '3.71', 30, 1, '2019-02-18 10:33:08', 36);
INSERT INTO `tbl_amortizaciones` (`idAmortizacion`, `tasaInteres`, `capital`, `totalInteres`, `totalIva`, `ivaInteresCapital`, `plazoMeses`, `pagoCuota`, `cantidadCuota`, `estadoAmortizacion`, `fechaRegistro`, `idSolicitud`) VALUES (37, '120.00', '800.00', '240.00', '31.20', '1071.20', 3, '11.90', 90, 1, '2019-02-18 11:10:26', 37);


#
# TABLE STRUCTURE FOR: tbl_aranceles
#

DROP TABLE IF EXISTS `tbl_aranceles`;

CREATE TABLE `tbl_aranceles` (
  `idArancel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` double NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idArancel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_caja_chica
#

DROP TABLE IF EXISTS `tbl_caja_chica`;

CREATE TABLE `tbl_caja_chica` (
  `idCajaC` int(11) NOT NULL AUTO_INCREMENT,
  `estadoCajaC` int(11) NOT NULL,
  `fechaCajaC` date NOT NULL,
  `cantidadAperturaCC` float NOT NULL,
  PRIMARY KEY (`idCajaC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_caja_general
#

DROP TABLE IF EXISTS `tbl_caja_general`;

CREATE TABLE `tbl_caja_general` (
  `idCajaChica` int(11) NOT NULL AUTO_INCREMENT,
  `estadoCajaChica` int(11) NOT NULL,
  `fechaCajaChica` date NOT NULL,
  `cantidadApertura` float NOT NULL,
  PRIMARY KEY (`idCajaChica`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_caja_general` (`idCajaChica`, `estadoCajaChica`, `fechaCajaChica`, `cantidadApertura`) VALUES (1, 1, '2019-03-09', '20');


#
# TABLE STRUCTURE FOR: tbl_cajachica_procesos
#

DROP TABLE IF EXISTS `tbl_cajachica_procesos`;

CREATE TABLE `tbl_cajachica_procesos` (
  `idProceso` int(11) NOT NULL AUTO_INCREMENT,
  `detalleProceso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaProceso` date NOT NULL,
  `entrada` float NOT NULL,
  `salida` float NOT NULL,
  `saldo` float NOT NULL,
  `idCajaChica` int(11) NOT NULL,
  `idTipoPago` int(11) NOT NULL,
  PRIMARY KEY (`idProceso`),
  KEY `idCajaChica` (`idCajaChica`),
  KEY `idTipoPago` (`idTipoPago`),
  CONSTRAINT `tbl_cajachica_procesos_ibfk_1` FOREIGN KEY (`idCajaChica`) REFERENCES `tbl_caja_chica` (`idCajaC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_cajachica_procesos_ibfk_2` FOREIGN KEY (`idTipoPago`) REFERENCES `tbl_tipo_pago` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_cajageneral_procesos
#

DROP TABLE IF EXISTS `tbl_cajageneral_procesos`;

CREATE TABLE `tbl_cajageneral_procesos` (
  `idProceso` int(11) NOT NULL AUTO_INCREMENT,
  `detalleProceso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaProceso` date NOT NULL,
  `entrada` float DEFAULT NULL,
  `salida` float DEFAULT NULL,
  `saldo` float NOT NULL,
  `idCajaChica` int(11) NOT NULL,
  `idTipoPago` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProceso`),
  KEY `idCajaChica` (`idCajaChica`),
  KEY `tipoPago` (`idTipoPago`),
  CONSTRAINT `tbl_cajageneral_procesos_ibfk_1` FOREIGN KEY (`idCajaChica`) REFERENCES `tbl_caja_general` (`idCajaChica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_cajageneral_procesos_ibfk_2` FOREIGN KEY (`idTipoPago`) REFERENCES `tbl_tipo_pago` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (1, 'Apertura de caja general', '2019-03-09', '20', '0', '20', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (2, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (3, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (4, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (5, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (6, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (7, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '14.0257', NULL, '14.0257', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (8, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (9, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '20', NULL, '20', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (10, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '20', NULL, '20', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (11, 'Pago de credito del cliente MELVIN FLORES', '2019-03-09', '30', NULL, '30', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (12, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '30', NULL, '30', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (13, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '30', NULL, '30', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (14, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '30', NULL, '30', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (15, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '200', NULL, '230', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (16, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '1500', NULL, '1730', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (17, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '900', NULL, '2630', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (18, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '900', NULL, '3530', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (19, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '900', NULL, '4430', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (20, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '822.24', NULL, '5252.24', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (21, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '822.34', NULL, '6074.58', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (22, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '800', NULL, '6874.58', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (23, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (24, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (25, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '30', NULL, '30', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (26, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (27, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (28, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (29, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (30, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (31, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);
INSERT INTO `tbl_cajageneral_procesos` (`idProceso`, `detalleProceso`, `fechaProceso`, `entrada`, `salida`, `saldo`, `idCajaChica`, `idTipoPago`) VALUES (32, 'Pago de credito del cliente JOSE MELVIN NUEVO FLORES MAJANO', '2019-03-09', '100', NULL, '100', 1, 1);


#
# TABLE STRUCTURE FOR: tbl_categoria_cuenta
#

DROP TABLE IF EXISTS `tbl_categoria_cuenta`;

CREATE TABLE `tbl_categoria_cuenta` (
  `idCategoria` int(11) NOT NULL,
  `codigoCategoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombreCategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (1, '1', 'ACTIVO');
INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (2, '2', 'PASIVO');
INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (3, '3', 'PATRIMONIO DE LOS ACCIONISTAS');
INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (4, '4', 'CUENTAS DE RESULTADO DEUDOR');
INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (5, '5', 'CUENTAS DE RESULTADO ACREEDORAS');
INSERT INTO `tbl_categoria_cuenta` (`idCategoria`, `codigoCategoria`, `nombreCategoria`) VALUES (6, '6', 'PÉRDIDAS Y GANANCIAS');


#
# TABLE STRUCTURE FOR: tbl_clientes
#

DROP TABLE IF EXISTS `tbl_clientes`;

CREATE TABLE `tbl_clientes` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
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
  `Tipo_Cliente` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Cliente`),
  KEY `Fk_Id_Departamento` (`Fk_Id_Departamento`),
  KEY `Fk_Id_Municipio` (`Fk_Id_Municipio`),
  KEY `Fk_Id_Municipio_2` (`Fk_Id_Municipio`),
  KEY `Fk_Id_Municipio_3` (`Fk_Id_Municipio`),
  KEY `Fk_Id_Departamento_2` (`Fk_Id_Departamento`),
  KEY `Fk_Id_Municipio_4` (`Fk_Id_Municipio`),
  KEY `Fk_Id_Municipio_5` (`Fk_Id_Municipio`),
  KEY `Fk_Id_Municipio_6` (`Fk_Id_Municipio`),
  CONSTRAINT `tbl_clientes_ibfk_1` FOREIGN KEY (`Fk_Id_Municipio`) REFERENCES `tbl_municipios` (`Id_Municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (12, 'MAPP017012814', 'MARIO ALFREDO', 'PERDOMO', 'Soltero/a', 'Masculino', '', '', '7888-5022', 'BARRIO CONCEPCION, CALLE GERARDO BARRIOS.', '1958-08-01', 'Urbana', '01701281-4', '1111-010856-101-9', '', '475.00', '', 'CONTADOR', 1, '2018-12-26 12:20:36', 11, 52, 'Empleado');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (13, 'JJMS022606335', 'JESUS ', 'MEJIA SANTOS', 'Soltero/a', 'Femenino', '', '', '00000000', 'BARRIO EL CALVARIO, MERCEDES UMAÑA, USULUTAN', '1950-10-05', 'Urbana', '02260633-5', '1111-051050-101-4', '', '300.00', 'NINGUNA', 'DOMESTICA', 1, '2019-01-21 13:29:32', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (14, 'AACD020336196', 'ADOLFO ALCIDES', 'CAMPOS DIAZ', 'Soltero/a', 'Masculino', '', '', '7660-0401', 'COLONIA CONCEPCION, EL JICARO TECAPAN, USULUTAN', '1954-09-14', 'Urbana', '02033619-6', '1122-140954-001-3', '', '325.00', 'NINGUNA', 'EMPLEADO', 1, '2019-01-21 14:01:13', 11, 63, 'Empleado');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (15, 'JAVV034092398', 'JOSE ARCENIO ', 'VALLADARES', 'Soltero/a', 'Masculino', '', '', '7493-1248', 'BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '1976-08-03', 'Urbana', '03409239-8', '1115-030876-102-2', '', '400.00', 'COMERCIANTE EN PEQUEÑO', 'ALBAÑIL', 1, '2019-02-07 10:34:36', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (16, 'AMMM016686149', 'ANA MERCEDES', 'MEJIA MUNGUIA', 'Soltero/a', 'Femenino', '', '', '7698-6100', 'BARRIO EL CALVARIO, MERCEDES UMAÑA, USULUTAN', '1974-08-26', 'Urbana', '01668614-9', '1111-260875-101-1', '', '250.00', '', 'DOMESTICOS', 1, '2019-02-07 11:05:27', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (17, 'SAAA021764156', 'SULMA ANA ABEL', 'AYALA AYALA', 'Soltero/a', 'Femenino', '', '', '7595-5799', 'BARRIO CONCEPCION, MERCEDES UMAÑA USULUTAN', '1964-10-20', 'Urbana', '02176415-6', '1111-201064-001-4', '', '300.00', '', 'EMPLEADA', 1, '2019-02-07 11:36:24', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (18, 'JAGA045769330', 'JOSE ALBERTO', 'GUEVARA AYALA', 'Soltero/a', 'Masculino', '', '', '7683-1601', '4TA CALLE ORIENTE Y 2A AV. SUR CASA # 4 BERLIN, USULUTAN ', '1992-02-28', 'Urbana', '04576933-0', '0614-280292-158-7', '', '392.00', '', 'ESTUDIANTE', 1, '2019-02-07 13:18:39', 11, 43, 'Empleado');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (19, 'AMMM016686149', 'ANA MERCEDES ', 'MEJIA MUNGUIA', 'Soltero/a', 'Femenino', '', '7698-6100', '7698-6100', 'B. EL CALVARIO MERCEDES UMAÑA.', '1974-03-02', 'Urbana', '01668614-9', '1111-260875-101-1', '', '200.00', 'PAGARE , LETRA DE CAMBIO.', 'DOMESTICA', 1, '2019-02-15 08:45:45', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (20, 'ELFS013280635', 'EVELYN LISETH ', 'FLORES SANCHEZ', 'Soltero/a', 'Femenino', '', '7264-4837', '7264-4837', 'B. CONCEPCION MERCEDES UMAÑA', '1976-06-21', 'Urbana', '01328063-5', '1111-260176-101-3', '', '300.00', '', 'AMA DE CASA', 1, '2019-02-15 09:04:57', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (21, 'ELFS013280635', 'EVELYN LISETH ', 'FLORES SANCHEZ', 'Soltero/a', 'Femenino', '', '7264-4837', '7264-4837', 'B. CONCEPCION MERCEDES UMAÑA', '1976-06-21', 'Urbana', '01328063-5', '1111-260176-101-3', '', '300.00', '', 'AMA DE CASA', 1, '2019-02-15 09:04:57', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (22, 'JGTT039868134', 'JOSE GUADALUPE ', 'TORRES', 'Soltero/a', 'Masculino', '', '7214-2942', '7214-2942', 'B. CONCEPCION CALLE PRINCIPAL. MERCEDES UMAÑA.', '1988-04-20', 'Urbana', '03986813-4', '1111-160988-101-0', '', '300.00', '', 'EMPLEADO', 1, '2019-02-15 09:33:48', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (23, 'WECQ015350321', 'WENDY ESMERALDA', 'CONTRERAS QUEVEDO', 'Soltero/a', 'Femenino', '', '6127-7072', '6127-7072', 'B. CONCEPCION 15.AVENIDA SUR MERCEDES UMAÑA', '1972-07-29', 'Urbana', '01535032-1', '0614-290772-124-9', '', '500.00', '', 'COMERCIANTE', 1, '2019-02-15 10:45:34', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (24, 'YEHS049982972', 'YANCY ESTEFANY ', 'HERNANDEZ SALGADO', 'Soltero/a', 'Femenino', '', '6105-2191', '6105-9121', 'B. EL CENTRO MERCEDES UMAÑA.', '1994-05-01', 'Urbana', '04998297-2', '1107-010594-101-4', '', '300.00', '', 'ESTUDIANTE', 1, '2019-02-15 10:57:58', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (25, 'JARR033712238', 'JUAN ANTONIO', 'RAMOS RODRIGUEZ', 'Soltero/a', 'Masculino', '', '7128-2128', '7128-2128', 'CS. LA PUERTA MERCEDES UMAÑA', '1985-11-03', 'Rural', '03371223-8', '1111-031185-101-4', '', '304.17', '', 'JORNALERO', 1, '2019-02-15 11:09:06', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (26, 'EEOG019373389', 'EVELYN ELIZABETH ', 'ORTEGA DE GRANADOS', 'Casado/a', 'Femenino', '', '7893-1556', '7893-1556', 'B. EL CENTRO BERLIN USULUTAN', '1979-02-27', 'Urbana', '01937338-9', '0601-270279-102-2', '', '300.00', '', 'DR.(A) EN CCIRUGIA DENTAL', 1, '2019-02-18 09:45:58', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (27, 'JYMA056168995', 'JESSICA YAMILETH ', 'MARAVILLA AYALA', 'Soltero/a', 'Masculino', '', '7568-4772', '7568-7472', 'B. EL CALVARIO MERCEDES UMAÑA.', '2023-11-16', 'Urbana', '05616899-5', '0614-111197-177-8', '', '325.00', '', 'ESTUDIANTE', 1, '2019-02-18 10:03:30', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (28, 'MCRC030319743', 'MIRIAN DEL CARMEN', 'RODRIGUEZ CHAVEZ', 'Soltero/a', 'Femenino', '', '7500-4316', '7500-4316', 'COL. LA PAZ #2 BERLIN USULUTAN', '1983-12-14', 'Urbana', '03031974-3', '1102-091083-102-2', '', '350.00', '', 'DOMESTICA', 1, '2019-02-18 10:30:26', 11, 52, 'Otro');
INSERT INTO `tbl_clientes` (`Id_Cliente`, `Codigo_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Estado_Civil_Cliente`, `Genero_Cliente`, `email`, `Telefono_Fijo_Cliente`, `Telefono_Celular_Cliente`, `Domicilio_Cliente`, `Fecha_Nacimiento_Cliente`, `Zona_Cliente`, `DUI_Cliente`, `NIT_Cliente`, `urlImg`, `ingreso`, `Observaciones_Cliente`, `Profesion_Cliente`, `estado`, `fechaRegistro`, `Fk_Id_Departamento`, `Fk_Id_Municipio`, `Tipo_Cliente`) VALUES (29, 'DERR009866089', 'DOUGLAS ESTAMLER ', 'ROMERO', 'Soltero/a', 'Masculino', '', '7114-6834', '7226-8736', 'B. EL CALVARIO MERCEDES UMAÑA', '1971-03-10', 'Urbana', '00986608-9', '1111-100371-101-1', '', '300.00', '', 'EMPLEADO', 1, '2019-02-18 10:43:33', 11, 52, 'Otro');


#
# TABLE STRUCTURE FOR: tbl_creditos
#

DROP TABLE IF EXISTS `tbl_creditos`;

CREATE TABLE `tbl_creditos` (
  `idCredito` int(11) NOT NULL AUTO_INCREMENT,
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
  `idAmortizacion` int(11) NOT NULL,
  PRIMARY KEY (`idCredito`),
  KEY `idAmortizacion` (`idAmortizacion`),
  CONSTRAINT `tbl_creditos_ibfk_1` FOREIGN KEY (`idAmortizacion`) REFERENCES `tbl_amortizaciones` (`idAmortizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (13, 'MAP20182612', 'Crédito popular', ' ', '400.00', '0.00', '0.00', 'Proceso', '2018-12-01', '2019-08-01', 1, '2018-12-26 14:25:46', 21);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (14, 'JAV201972', 'Crédito popular', ' ', '250.00', '0.00', '0.00', 'Proceso', '2019-02-07', '2019-04-07', 1, '2019-02-07 10:43:50', 23);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (15, 'AMMM201972', 'Crédito popular', ' ', '50.00', '0.00', '0.00', 'Proceso', '2019-02-06', '2019-03-06', 1, '2019-02-07 11:15:01', 24);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (16, 'AA201972', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-07', '2019-05-07', 1, '2019-02-07 11:48:01', 25);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (17, 'JMS201972', 'Crédito popular', ' ', '75.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-03-04', 1, '2019-02-07 11:56:11', 26);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (19, 'JAGA201972', 'Crédito popular', ' ', '500.00', '0.00', '0.00', 'Proceso', '2019-02-02', '2019-07-02', 1, '2019-02-07 13:50:03', 27);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (20, 'AMMM2019152', 'Crédito popular', ' ', '50.00', '0.00', '0.00', 'Proceso', '2019-02-06', '2019-03-06', 1, '2019-02-15 08:56:49', 28);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (21, 'ELFS2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-05', '2019-03-05', 1, '2019-02-15 09:08:12', 29);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (22, 'JGT2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-04-04', 1, '2019-02-15 10:29:00', 30);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (23, 'WECQ2019152', 'Crédito popular', ' ', '300.00', '0.00', '0.00', 'Proceso', '2019-02-15', '2019-03-15', 1, '2019-02-15 10:48:44', 31);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (24, 'YEHS2019152', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-15', '2019-03-15', 1, '2019-02-15 11:03:28', 32);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (25, 'EE2019182', 'Crédito popular', ' ', '150.00', '0.00', '0.00', 'Proceso', '2019-02-04', '2019-03-04', 1, '2019-02-18 09:52:39', 34);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (26, 'JYMA2019182', 'Crédito popular', ' ', '150.00', '0.00', '0.00', 'Proceso', '2019-02-08', '2019-04-08', 1, '2019-02-18 10:06:42', 35);
INSERT INTO `tbl_creditos` (`idCredito`, `codigoCredito`, `tipoCredito`, `codigoTipoCredito`, `montoTotal`, `totalAbonado`, `interesPendiente`, `estadoCredito`, `fechaApertura`, `fechaVencimiento`, `estado`, `fechaRegistro`, `idAmortizacion`) VALUES (27, 'RC2019182', 'Crédito popular', ' ', '100.00', '0.00', '0.00', 'Proceso', '2019-02-09', '2019-03-09', 1, '2019-02-18 10:33:42', 36);


#
# TABLE STRUCTURE FOR: tbl_cuenta
#

DROP TABLE IF EXISTS `tbl_cuenta`;

CREATE TABLE `tbl_cuenta` (
  `idCuenta` int(11) NOT NULL,
  `idSubcategoria` int(11) NOT NULL,
  `codigoCuenta` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `NombreCuenta` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (1, 1, '1101', 'Efectivo y Equivalentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (2, 1, '110101', 'Fondo de Caja Chica');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (3, 1, '110102', 'Caja General');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (4, 1, '110103', 'Bancos Cuentas Corritentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (5, 1, '11010301', 'Banco Cuscatlán, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (6, 1, '11010302', 'Banco Promerica, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (7, 1, '11010303', 'Banco Hipotecario de El Salvador, S.A. Cta Cte 004');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (8, 1, '110104', 'Bancos Cuentas de Ahorro');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (9, 1, '11010401', 'Banco Cuscatlán, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (10, 1, '110105', 'Bancos Depositos a Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (11, 1, '11010501', 'Banco Cuscatlán, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (12, 1, '110106', 'Otros Equivalentes de Efectivo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (13, 1, '11010601', 'Reportos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (14, 1, '110107', 'Fondo de Caja General');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (15, 1, '1102', 'Cuentas y Documentos por Cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (16, 1, '110201', 'Préstamos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (17, 1, '11020101', 'Prestamos pactados hasta 1 año plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (18, 1, '1102010101', 'Prestamos populares');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (19, 1, '1102010102', 'Prestamos personales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (20, 1, '1102010103', 'Prestamos prendarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (21, 1, '1102010104', 'Prestamos hipotecarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (22, 1, '1102010110', 'Refinanciamientos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (23, 1, '11020102', 'Prestamos pactados hasta más de 1 año plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (24, 1, '1102010201', 'Prestamos populares');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (25, 1, '1102010202', 'Prestamos personales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (26, 1, '1102010203', 'Prestamos prendarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (27, 1, '1102010204', 'Prestamos hipotecarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (28, 1, '1102010205', 'Prestamos rotativos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (29, 1, '1102010210', 'Refinanciamientos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (30, 1, '11020103', 'Desembolsos y Recuperaciones por Aplicar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (31, 1, '11020104', 'Prestamos vencidos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (32, 1, '11020105', 'Prestamos en cobro judicial');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (33, 1, '11020106', 'Intereses por cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (34, 1, '1102010601', 'Intereses corrientes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (35, 1, '1102010602', 'Intereses en mora');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (36, 1, '110202', 'Documentos por Cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (37, 1, '110203', 'Cuentas por cobrar comerciales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (38, 1, '110204', 'Dividendos por Cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (39, 1, '110205-R', 'Reserva para Cuentas Incobrables');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (40, 1, '110205-R01', 'Reserva para saneamiento de créditos vencidos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (41, 1, '110206', 'Anticipos a Proveedores');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (42, 1, '110207', 'Prestamos al Personal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (43, 1, '110208', 'Anticipos a Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (44, 1, '11020801', 'Anticipos a Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (45, 1, '11020802', 'Faltantes a cajeros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (46, 1, '110209', 'Prestamos a Socios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (47, 1, '110210', 'Otras Cuentas por Cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (48, 1, '1103', 'Cuentas por Cobrar - Arrendamiento Financiero');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (49, 1, '110301', 'Arrendamientos Financieros por Cobrar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (50, 1, '1104', 'Partes Relacionadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (51, 1, '110401', 'Directivos, Ejecutivos y Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (52, 1, '110402', 'Compañías Afiliadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (53, 1, '110403', 'Compañías Asociadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (54, 1, '110404', 'Compañías Subsidiarias');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (55, 1, '110405', 'Compañías Relacionadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (56, 1, '1105', 'Accionistas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (57, 1, '110501', 'Acciones Suscritas y no Pagadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (58, 1, '1106', 'Crédito Fiscal - IVA');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (59, 1, '110601', 'IVA por Importaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (60, 1, '110602', 'IVA por Compras Locales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (61, 1, '110603', 'IVA Diferido');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (62, 1, '110604', 'Excedente de Credito Fiscal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (63, 1, '110605', '1%  IVA Retenido');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (64, 1, '110606', '1%  IVA Percibido');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (65, 1, '1107', 'Inventarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (66, 1, '110701', '');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (67, 1, '110705 - R', 'Reserva por Obsolescencia de Mercaderías');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (68, 1, '110706', 'Pedidos en Tránsito');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (69, 1, '1108', 'Inversiones Temporales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (70, 1, '1109', 'Pagos Anticipados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (71, 1, '110901', 'Alquileres Anticipados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (72, 1, '110902', 'Papelería y Utiles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (73, 1, '110903', 'Intereses');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (74, 1, '110904', 'Seguros Vigentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (75, 1, '11090401', 'Seguro de Vehiculos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (76, 1, '11090402', 'Seguro contra Robo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (77, 1, '11090403', 'Seguro contra Incendio');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (78, 1, '11090404', 'Seguro por Importacion de Mercaderia');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (79, 1, '110905', 'Impuestos pagados por Anticipado');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (80, 1, '11090501', 'Pago a cuenta del ejercicio corriente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (81, 1, '11090502', 'ISR de Ejercicios Anteriores');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (82, 1, '11090503', 'Retenciones por Operaciones Financieras');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (83, 2, '1201', 'Propiedad, Planta y Equipo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (84, 2, '120101', 'Bienes Inmuebles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (85, 2, '12010101', 'Terrenos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (86, 2, '12010102', 'Edificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (87, 2, '12010103', 'Mejoras en Propiedades Arrendadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (88, 2, '12010104', 'Instalaciones Permanentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (89, 2, '120102', 'Bienes Muebles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (90, 2, '12010201', 'Mobiliario y Equipo de Sala de Ventas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (91, 2, '12010202', 'Mobiliario y Equipo de Oficina');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (92, 2, '12010203', 'Equipo de Transporte');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (93, 2, '12010204', 'Equipo de Cómputo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (94, 2, '12010205', 'Otros Bienes Depreciables');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (95, 2, '120103-R', 'Depreciaciones Acumuladas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (96, 2, '120103-R-01', 'Edificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (97, 2, '120103-R-02', 'Mejoras en Propiedades Arrendadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (98, 2, '120103-R-03', 'Instalaciones Permanente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (99, 2, '120103-R-04', 'Mobiliario y Equipo de Sala de Ventas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (100, 2, '120103-R-05', 'Mobiliario y Equipo de Oficina');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (101, 2, '120103-R-06', 'Equipo de Transporte');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (102, 2, '120103-R-07', 'Equipo de Cómputo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (103, 2, '120103-R-08', 'Otros Bienes Depreciables');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (104, 2, '120104', 'Revaluaciones de Activo Fijo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (105, 2, '12010401', 'Terrenos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (106, 2, '12010402', 'Edificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (107, 2, '12010403', 'Instalaciones Permanentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (108, 2, '12010404', 'Mobiliario y Equipo de Sala de Venta');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (109, 2, '12010405', 'Mobiliario y Equipo de Oficina');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (110, 2, '12010406', 'Equipo de Transporte');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (111, 2, '12010407', 'Equipo de Cómputo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (112, 2, '120105', 'Pedidos en Tránsito - Activo Fijo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (113, 2, '1202', 'Inversiones Permanentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (114, 2, '120201', 'Inversiones en Subsidiarias');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (115, 2, '120202', 'Inversiones en Asociadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (116, 2, '120203', 'Inversiones en Negocios Conjuntos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (117, 2, '1203', 'Activos Diferidos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (118, 2, '120301', 'Crédito ISR años anteriores');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (119, 2, '120302', 'Pagos Anticipados ISR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (120, 2, '120303', 'Activo por ISR - Diferido');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (121, 2, '120304', 'Otros Activos Diferidos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (122, 2, '1204', 'Activos Intangibles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (123, 2, '120401', 'Patentes y Marcas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (124, 2, '120402', 'Licencias y Concesiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (125, 2, '12040201', 'Sistemas computacinales - SOFTWARE');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (126, 2, '120403-R', 'Amortización Licencias de Sofware');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (127, 2, '1205', 'Cuentas por Cobrar a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (128, 2, '1206', 'Préstamos a Accionistas a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (129, 2, '1207', 'Otras Cuentas por Cobrar a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (130, 2, '1208', 'Depósitos en Garantía');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (131, 2, '1209', 'Cuentas por Cobrar Arrendamientos Financieros Larg');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (132, 2, '1210', 'Partes Relacionadas a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (133, 3, '2101', 'Préstamos y Sobregiros Bancarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (134, 3, '210101', 'Sobregiros Bancarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (135, 3, '210102', 'Préstamos a Corto Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (136, 3, '210103', 'Porción Circulante - Préstamos a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (137, 3, '2102', 'Cuentas y Documentos por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (138, 3, '210201', 'Proveedores Locales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (139, 3, '21020101', 'Guilermo Antonio Rodriguez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (140, 3, '21020102', 'Emerson Giovanni Gomez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (141, 3, '21020103', 'Infored, S.A. de C.V.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (142, 3, '21020104', 'Harold Antonio Argueta Hernandez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (143, 3, '210202', 'Proveedores Extranjeros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (144, 3, '210203', 'Acreedores Diversos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (145, 3, '21020301', 'Maria Guadalupe Iraheta de Martinez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (146, 3, '210204', 'Documentos por Pagar:');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (147, 3, '21020401', 'Contratos a Corto Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (148, 3, '21020402', 'Cartas de Crédito');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (149, 3, '2103', 'Obligaciones Bajo Arrendamiento Financiero');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (150, 3, '210301', 'Porción Circulante de Obligaciones de Arrendamient');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (151, 3, '2104', 'Provisiones y Retenciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (152, 3, '210401', 'Provisiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (153, 3, '21040101', 'Impuestos Municipales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (154, 3, '21040102', 'Provisión Pago a Cuenta ISR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (155, 3, '21040103', 'Intereses por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (156, 3, '21040104', 'Impuesto sobre la renta del ejercicio corriente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (157, 3, '210402', 'Gastos Acumulados por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (158, 3, '21040201', 'Alquileres');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (159, 3, '21040202', 'Energia Eléctrica');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (160, 3, '21040203', 'Servicios de Agua Potable');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (161, 3, '21040204', 'Comunicaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (162, 3, '21040205', 'Gastos de Caja Chica');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (163, 3, '21040206', 'Honorarios Profesionales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (164, 3, '21040207', 'Publicidad');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (165, 3, '21040208', 'Gastos de Combustible');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (166, 3, '210403', 'Retenciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (167, 3, '21040301', 'Cotizaciones Seguro Social');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (168, 3, '21040302', 'Seguro Social - Pensiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (169, 3, '21040303', 'Fondo Social para la Vivienda');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (170, 3, '21040304', 'ISR Retenido');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (171, 3, '2104030401', 'Retenciones de Carácter Permanente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (172, 3, '2104030402', 'Retenciones de Carácter Eventual');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (173, 3, '2104030403', 'Otras Retenciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (174, 3, '2104030404', 'Retencion por Servicios de Arrendamiento a Persona');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (175, 3, '21040305', 'Bancos y Otras Instituciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (176, 3, '2104030501', 'Banco Agricola, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (177, 3, '2104030502', 'Banco HSBC de El Salvador, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (178, 3, '2104030503', 'Banco Promerica, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (179, 3, '2104030504', 'Banco de America Central, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (180, 3, '21040306', 'Vialidad a Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (181, 3, '21040307', 'Procuraduría General');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (182, 3, '21040308', 'Pensiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (183, 3, '2104030801', 'AFP Confia, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (184, 3, '2104030802', 'AFP Ccrecer, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (185, 3, '2104030803', 'ISSS pensiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (186, 3, '2104030804', 'I P S F A');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (187, 3, '21040309', 'Otras Retenciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (188, 3, '2105', 'Beneficios a Empleados por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (189, 3, '210501', 'Beneficios a Corto Plazo por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (190, 3, '21050101', 'Planillas de Sueldos por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (191, 3, '21050102', 'Comisiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (192, 3, '21050103', 'Bonificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (193, 3, '21050104', 'Vacaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (194, 3, '21050105', 'Aguinaldo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (195, 3, '21050106', 'Aportes Patronales ISSS');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (196, 3, '210502', 'Beneficios Post-Empleo por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (197, 3, '21050201', 'Aportaciones Patronales Pensiones Gubernamentales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (198, 3, '21050202', 'ISSS - Cuota Patronal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (199, 3, '210503', 'Aportaciones Patronales Pensiones no Gubernamental');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (200, 3, '21050301', 'AFP - Cuota Patronal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (201, 3, '2105030101', 'AFP Confia, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (202, 3, '2105030102', 'AFP Ccrecer, S.A.');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (203, 3, '2105030103', 'ISSS pensiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (204, 3, '2105030104', 'I P S F A');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (205, 3, '210504', 'Aportaciones Patronales Pensiones Multiempresa');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (206, 3, '21050401', 'Seguro Dotal por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (207, 3, '2106', 'Débito Fiscal - IVA');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (208, 3, '210601', 'Débito Fiscal - IVA');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (209, 3, '21060101', 'Contribuyentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (210, 3, '21060102', 'Consumidores Finales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (211, 3, '2107', 'Dividendos por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (212, 3, '2108', 'Impuestos por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (213, 3, '210801', 'ISR Por Pagar Corriente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (214, 3, '210802', 'Pasivo Diferido por ISR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (215, 3, '210803', 'Impuestos Municipales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (216, 3, '210804', 'Pago a Cuenta');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (217, 3, '210805', 'IVA por Pagar');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (218, 3, '210806', '1% IVA Retenido a Contribuyentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (219, 3, '210807', '1% IVA Percibido a Contribuyentes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (220, 3, '2109', 'Partes Relacionadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (221, 3, '210901', 'Directores, Ejecutivos y Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (222, 3, '210902', 'Compañías Afiliadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (223, 3, '210903', 'Compañías Asociadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (224, 3, '210904', 'Compañías Subsidiarias');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (225, 3, '210905', 'Compañias Relacionadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (226, 4, '2201', 'Préstamos Bancarios a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (227, 4, '220101', 'Préstamos Hipotecarios Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (228, 4, '220102', 'Deuda Convertible a Largo Plazo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (229, 4, '220103', 'Prestamos a Largo Plazo No Bancarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (230, 4, '22010301', 'Maria Guadalupe Iraheta de Martinez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (231, 4, '22010302', 'Gilda Esperanza Lopez');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (232, 4, '2202', 'Obligaciones Bajo Arrendamiento Financiero a Largo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (233, 4, '220201', 'Contratos Bajo Arrendamiento Financiero Largo Plaz');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (234, 4, '2203', 'Anticipos y Garantías de Clientes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (235, 4, '220301', 'Anticipo de Clientes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (236, 4, '220302', 'Garantías de Clientes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (237, 4, '220303', 'Anticipos por otorgamiento de creditos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (238, 4, '2204', 'Provisión para Obligaciones Laborales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (239, 4, '220401', 'Indemnizaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (240, 4, '220402', 'Vacaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (241, 4, '220403', 'Aguinaldos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (242, 5, '31', 'Capital');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (243, 5, '3101', 'Capital Social');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (244, 5, '310101', 'Capital Social-Mínimo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (245, 5, '31010101', 'Capital Social Minimo Suscrito y Pagado');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (246, 5, '31010102', 'Capital Social Minimo Suscrito y No Pagado');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (247, 5, '310102', 'Capital Social- Variable');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (248, 5, '310103- R', 'Acciones en Tesorería');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (249, 6, '3201', 'Superávit por Revaluos de Activos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (250, 6, '320101', 'Superávit por Revalúos de Terrenos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (251, 6, '320102', 'Superávit por Revalúos de Instalaciones Permanente');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (252, 6, '320103', 'Superávit por Revalúos de Mobiliario y Equipo Sala');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (253, 6, '320104', 'Superávit por Revalúos de Equipo de Transporte');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (254, 6, '320105', 'Superávit por Revalúos de Equipo de Cómputo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (255, 6, '320106', 'Superávit por Revalúos de Activos Intangibles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (256, 7, '3301', 'Utilidades Restringidas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (257, 7, '330101', 'Reserva Legal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (258, 7, '3302', 'Utilidades no Distribuidas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (259, 7, '330201', 'Utilidades de Ejercicio Anteriores');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (260, 7, '330202', 'Utilidades de Ejercicio');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (261, 7, '3303-R', 'Déficit Acumulado');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (262, 7, '3303-R-01', 'Pérdidas de Ejercicio Anteriores');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (263, 7, '3303-R-02', 'Pérdidas de Ejercicio');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (264, 7, '3304', 'Otras Reservas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (265, 7, '330401', 'Voluntarias');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (266, 8, '4101', 'Costos de Ventas de Mercaderias y Servicios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (267, 8, '410101', 'Costo de Venta de Mercaderías');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (268, 8, '410102', 'Costo de Servicios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (269, 8, '4102', 'Gastos de Ventas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (270, 8, '410201', 'Remuneraciones Laborales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (271, 8, '41020101', 'Sueldos y Horas Extras');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (272, 8, '41020102', 'Comisiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (273, 8, '41020103', 'Bonificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (274, 8, '41020104', 'Aguinaldos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (275, 8, '41020105', 'Vacaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (276, 8, '41020106', 'Otras Remuneraciones laborales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (277, 8, '410202', 'Beneficios a Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (278, 8, '41020201', 'Aporte por Seguridad Social de Salud (ISSS)');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (279, 8, '41020202', 'Aporte al Fondo de Pensiones (AFP`s)');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (280, 8, '41020203', 'Indemnizaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (281, 8, '41020204', 'Atenciones al Personal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (282, 8, '41020205', 'Uniformes y Accesorios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (283, 8, '41020206', 'Gastos de Viajes y representaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (284, 8, '41020207', 'Regalías y Otros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (285, 8, '410203', 'Honorarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (286, 8, '41020301', 'Honorarios Profesionales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (287, 8, '41020302', 'Honorarios Técnicos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (288, 8, '41020303', 'Honorarios por Servicios Judiciales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (289, 8, '410204', 'Mantenimientos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (290, 8, '41020401', 'Mantenimientos Equipo de Oficina');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (291, 8, '41020402', 'Mantenimientos Mobiliario y Equipo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (292, 8, '41020403', 'Mantenimientos Equipo de Transportes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (293, 8, '41020404', 'Mantenimientos de Locales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (294, 8, '410205', 'Impuestos, Tasas y Derechos Registrales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (295, 8, '41020501', 'Impuestos y tasas municipales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (296, 8, '41020502', 'Impuestos Fiscales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (297, 8, '41020503', 'Derechos de Registro en CNR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (298, 8, '41020504', 'Impuestos al combustible');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (299, 8, '410206', 'Energia Electrica');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (300, 8, '410207', 'Agua Potable');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (301, 8, '410208', 'Comunicaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (302, 8, '41020801', 'Telefonia Fija');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (303, 8, '41020802', 'Telefonica Movil');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (304, 8, '41020803', 'Servicios de Cable y Correo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (305, 8, '41020804', 'Otros Servicios de Comunicación');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (306, 8, '410209', 'Depreciacion y Amortizaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (307, 8, '410210', 'Papelería y Utiles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (308, 8, '410211', 'Transportes y Viaticos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (309, 8, '410212', 'Combustible y Lubricantes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (310, 8, '410213', 'Publicidad y Propaganda');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (311, 8, '410214', 'Cuotas y Suscripciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (312, 8, '410215', 'Seguridad y Vigilancia');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (313, 8, '41021501', 'Servicios de Seguridad');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (314, 8, '41021502', 'Servicios de Monitoreo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (315, 8, '410216', 'Donaciones y Contribuciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (316, 8, '410217', 'Materiales de Empaque');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (317, 8, '410218', 'Multas y Recargos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (318, 8, '410219', 'Varios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (319, 8, '410222', 'Alquileres');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (320, 8, '41022201', 'Alquiler de Inmuebles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (321, 8, '4103', 'Gastos de Administración');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (322, 8, '410301', 'Remuneraciones Laborales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (323, 8, '41030101', 'Sueldos y Horas Extras');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (324, 8, '41030102', 'Comisiones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (325, 8, '41030103', 'Bonificaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (326, 8, '41030104', 'Aguinaldos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (327, 8, '41030105', 'Vacaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (328, 8, '41030106', 'Otras Remuneraciones laborales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (329, 8, '410302', 'Beneficios a Empleados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (330, 8, '41030201', 'Aporte por Seguridad Social de Salud (ISSS)');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (331, 8, '41030202', 'Aporte al Fondo de Pensiones (AFP`s)');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (332, 8, '41030203', 'Indemnizaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (333, 8, '41030204', 'Atenciones al Personal');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (334, 8, '41030205', 'Uniformes y Accesorios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (335, 8, '41030206', 'Gastos de Viajes y Representaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (336, 8, '41030207', 'Regalías y Otros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (337, 8, '410303', 'Honorarios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (338, 8, '41030301', 'Honorarios Profesionales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (339, 8, '41030302', 'Honorarios Técnicos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (340, 8, '410304', 'Mantenimientos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (341, 8, '41030401', 'Mantenimientos Equipo de Oficina');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (342, 8, '41030402', 'Mantenimientos Mobiliario y Equipo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (343, 8, '41030403', 'Mantenimientos Equipo de Transportes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (344, 8, '41030404', 'Mantenimientos de Locales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (345, 8, '410305', 'Impuestos, Tasas y Derechos Registrales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (346, 8, '41030501', 'Impuestos y tasas municipales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (347, 8, '41030502', 'Impuestos Fiscales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (348, 8, '41030503', 'Derechos de Registro en CNR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (349, 8, '41030504', 'Impuestos al combustible');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (350, 8, '410306', 'Energia Electrica');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (351, 8, '410307', 'Agua Potable');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (352, 8, '410308', 'Comunicaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (353, 8, '41030801', 'Telefonia Fija');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (354, 8, '41030802', 'Telefonica Movil');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (355, 8, '41030803', 'Servicios de Cable y Correo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (356, 8, '41030804', 'Otros Servicios de Comunicación');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (357, 8, '410309', 'Depreciacion y Amortizaciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (358, 8, '410310', 'Papelería y Utiles');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (359, 8, '410311', 'Transportes y Viaticos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (360, 8, '410312', 'Combustible y Lubricantes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (361, 8, '410313', 'Publicidad y Propaganda');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (362, 8, '410314', 'Cuotas y Suscripciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (363, 8, '410315', 'Seguridad y Vigilancia');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (364, 8, '410316', 'Donaciones y Contribuciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (365, 8, '410317', 'Materiales de Empaque');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (366, 8, '410318', 'Multas y recargos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (367, 8, '410319', 'Varios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (368, 8, '410320', 'Gastos No Sujetos a ISR');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (369, 8, '410321', 'Articulos de limpieza varios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (370, 8, '410322', 'Alquileres');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (371, 9, '4201', 'Gastos Financieros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (372, 9, '420101', 'Intereses');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (373, 9, '420102', 'Comisiones Bancarias');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (374, 9, '420103', 'Otros Cargos Financieros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (375, 9, '4202', 'Diferencial de Cambio');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (376, 9, '420201', 'Gastos de Diferencia de Cambio');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (377, 10, '4301', 'Pérdida en Venta de Activo Fijo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (378, 10, '4302', 'Gastos por Siniestros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (379, 11, '4401', 'Gastos de Operaciones en Discontinuación');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (380, 12, '5101', 'Ventas Comerciales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (381, 12, '510101', 'Ventas Comerciales Gravadas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (382, 12, '510102', 'Ventas Comerciales Exentas');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (383, 12, '5102', 'Ingresos por Servicios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (384, 12, '510201', 'Intereses sobre prestamos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (385, 12, '51020101', 'Intereses corrientes');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (386, 12, '51020102', 'Intereses por mora');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (387, 12, '510202', 'Comisiones y tarifas por servicios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (388, 12, '51020201', 'Tramitaciones de prestamos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (389, 12, '51020202', 'Honorarios por escrituraciones');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (390, 12, '51020203', 'Gestiones de cobranza');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (391, 12, '51020204', 'Comisiones y recargos sobre creditos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (392, 12, '51020205', 'Servicios Varios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (393, 12, '510204', 'Otros Servicios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (394, 12, '5103', 'Otros Ingresos Operacionales');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (395, 12, '510301', 'Ingresos Diversos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (396, 13, '5201', 'Intereses Ganados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (397, 13, '520101', 'Intereses ganados en depositos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (398, 13, '5202', 'Dividendos Ganados');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (399, 13, '5203', 'Ganancia en Venta de Activo Fijo');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (400, 13, '5204', 'Otros Ingresos');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (401, 13, '520401', 'Indemnizaciones por Reclamos de Seguros');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (402, 13, '520402', 'Ingresos varios');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (403, 14, '5301', 'Ingresos de Operaciones en Discontinuación');
INSERT INTO `tbl_cuenta` (`idCuenta`, `idSubcategoria`, `codigoCuenta`, `NombreCuenta`) VALUES (404, 15, '6101', 'Pérdidas y Ganancias');


#
# TABLE STRUCTURE FOR: tbl_datos_laborales
#

DROP TABLE IF EXISTS `tbl_datos_laborales`;

CREATE TABLE `tbl_datos_laborales` (
  `Cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Empresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Rubro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `Fk_Id_Cliente` int(11) NOT NULL,
  KEY `Fk_Id_Cliente` (`Fk_Id_Cliente`),
  CONSTRAINT `tbl_datos_laborales_ibfk_1` FOREIGN KEY (`Fk_Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_datos_laborales` (`Cargo`, `Nombre_Empresa`, `Direccion`, `Telefono`, `Rubro`, `Observaciones`, `Fk_Id_Cliente`) VALUES ('AUXILIAR DE LA UNIDAD DE MEDIO AMBIENTE', 'ALCALDIA MUNICIPAL DE MERCEDES UMAÑA', 'AV. ROOSVELT, BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '2684-0707', 'GUBERNAMENTAL', '', 12);
INSERT INTO `tbl_datos_laborales` (`Cargo`, `Nombre_Empresa`, `Direccion`, `Telefono`, `Rubro`, `Observaciones`, `Fk_Id_Cliente`) VALUES ('AUXILIAR DE LA UNIDAD DE MEDIO AMBIENTE', 'ALCALDIA MUNICIPAL DE MERCEDES UMAÑA', 'AV. ROOSVELT, BARRIO CONCEPCION, MERCEDES UMAÑA, USULUTAN', '2684-0707', 'GUBERNAMENTAL', '', 12);


#
# TABLE STRUCTURE FOR: tbl_datos_negocio
#

DROP TABLE IF EXISTS `tbl_datos_negocio`;

CREATE TABLE `tbl_datos_negocio` (
  `Id_Negocio` int(11) NOT NULL,
  `Fk_Id_Cliente` int(11) NOT NULL,
  `Nombre_Negocio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NIT` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NRC` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Giro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion_Negocio` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_Factura` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  KEY `Fk_Id_Cliente` (`Fk_Id_Cliente`),
  CONSTRAINT `tbl_datos_negocio_ibfk_1` FOREIGN KEY (`Fk_Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_departamentos
#

DROP TABLE IF EXISTS `tbl_departamentos`;

CREATE TABLE `tbl_departamentos` (
  `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (1, 'Ahuachapán');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (2, 'Santa Ana');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (3, 'Sonsonate');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (4, 'La Libertad');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (5, 'Chalatenango');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (6, 'San Salvador');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (7, 'Cuscatlán');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (8, 'La Paz');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (9, 'Cabañas');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (10, 'San Vicente');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (11, 'Usulután');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (12, 'Morazán');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (13, 'San Miguel');
INSERT INTO `tbl_departamentos` (`Id_Departamento`, `Nombre_Departamento`) VALUES (14, 'La Unión');


#
# TABLE STRUCTURE FOR: tbl_detallepagos
#

DROP TABLE IF EXISTS `tbl_detallepagos`;

CREATE TABLE `tbl_detallepagos` (
  `idDetallePago` int(11) NOT NULL AUTO_INCREMENT,
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
  `idFactura` int(11) NOT NULL,
  PRIMARY KEY (`idDetallePago`),
  KEY `idCredito` (`idCredito`),
  KEY `idFactura` (`idFactura`),
  CONSTRAINT `tbl_detallePagos_ibfk_2` FOREIGN KEY (`idCredito`) REFERENCES `tbl_creditos` (`idCredito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para registros de pagos de cada cliente';

#
# TABLE STRUCTURE FOR: tbl_documentos
#

DROP TABLE IF EXISTS `tbl_documentos`;

CREATE TABLE `tbl_documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDocumento` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para gestinonar copiar de documentos y fotos de perfil';

INSERT INTO `tbl_documentos` (`idDocumento`, `nombre`, `url`, `tipoDocumento`, `codigo`, `estado`, `fechaRegistro`) VALUES (1, 'Pagaré Mario Alfredo Perdomo.doc', 'plantilla/Docs/MAP20182612Pagaré Mario Alfredo Perdomo.doc', '1', 'MAP20182612', 1, '2018-12-26 14:23:59');
INSERT INTO `tbl_documentos` (`idDocumento`, `nombre`, `url`, `tipoDocumento`, `codigo`, `estado`, `fechaRegistro`) VALUES (2, 'Mutuo Mario Alfredo Perdomo.doc', 'plantilla/Docs/MAP20182612Mutuo Mario Alfredo Perdomo.doc', '1', 'MAP20182612', 1, '2018-12-26 14:24:14');
INSERT INTO `tbl_documentos` (`idDocumento`, `nombre`, `url`, `tipoDocumento`, `codigo`, `estado`, `fechaRegistro`) VALUES (3, 'CONSTANCIA ADOLFO.docx', 'plantilla/Docs/MF201993CONSTANCIA ADOLFO.docx', '1', 'MF201993', 1, '2019-03-09 14:22:45');


#
# TABLE STRUCTURE FOR: tbl_empleados
#

DROP TABLE IF EXISTS `tbl_empleados`;

CREATE TABLE `tbl_empleados` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
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
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `fechaNacimientoEmpleado`, `genero`, `dui`, `nit`, `direccion`, `telefono`, `email`, `cargo`, `profesion`, `estado`, `fechaRegistro`) VALUES (5, 'JOSE ELIZARDO', 'ALVARENGA IRAHETA', '1968-02-14', 'Masculino', '01412790-3', '1102-140268-102-0', '3 AV. SUR BARRIOS CONCEPCION MERCEDES UMAÑA.', '7909-2356', 'jeli_alvarenga@hotmail.com', 'JEFE ADMINISTRATIVO', 'CONTADOR', 1, '2018-11-30 18:10:25');
INSERT INTO `tbl_empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `fechaNacimientoEmpleado`, `genero`, `dui`, `nit`, `direccion`, `telefono`, `email`, `cargo`, `profesion`, `estado`, `fechaRegistro`) VALUES (6, 'JONATAN EDGARDO', 'ALVARENGA RIVAS', '1994-09-11', 'Masculino', '05058339-1', '1102-110994-102-5', 'BERLIN, USULUTAN', '74928029', 'JHONATANALVARENGA96@GMAIL.COM', 'EJECUTIVO DE CREDITOS', 'ESTUDIANTE', 1, '2018-11-30 18:26:14');
INSERT INTO `tbl_empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `fechaNacimientoEmpleado`, `genero`, `dui`, `nit`, `direccion`, `telefono`, `email`, `cargo`, `profesion`, `estado`, `fechaRegistro`) VALUES (7, 'NORMA DEL CARMEN', 'IRAHETA DE GUZMAN', '1978-04-10', 'Femenino', '03589402-8', '1102-100478-102-2', 'Col. Palmerola # 1, salida Berlín Usulutan', '7912-8698', 'irahetn@gmail.com', 'CAJERA', 'EMPLEADA', 1, '2019-01-04 08:18:23');


#
# TABLE STRUCTURE FOR: tbl_empresa
#

DROP TABLE IF EXISTS `tbl_empresa`;

CREATE TABLE `tbl_empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `giro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `nrc` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_empresa` (`idEmpresa`, `nombreEmpresa`, `giro`, `email`, `telefono`, `direccion`, `nrc`, `estado`, `fechaRegistro`) VALUES (1, 'Fast Cash', 'Financiero', 'fastcash.sa@gmail.com', '26295217', 'Mercedes Umaña', '', 1, '2018-11-30 17:46:28');


#
# TABLE STRUCTURE FOR: tbl_estados_solicitud
#

DROP TABLE IF EXISTS `tbl_estados_solicitud`;

CREATE TABLE `tbl_estados_solicitud` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_estados_solicitud` (`id_estado`, `nombreEstado`, `estado`, `fecha_registro`) VALUES (1, 'Nueva', 1, '2018-11-02');
INSERT INTO `tbl_estados_solicitud` (`id_estado`, `nombreEstado`, `estado`, `fecha_registro`) VALUES (2, 'En Proceso', 1, '0000-00-00');
INSERT INTO `tbl_estados_solicitud` (`id_estado`, `nombreEstado`, `estado`, `fecha_registro`) VALUES (3, 'Aprobada', 1, '0000-00-00');
INSERT INTO `tbl_estados_solicitud` (`id_estado`, `nombreEstado`, `estado`, `fecha_registro`) VALUES (4, 'Denegada', 1, '0000-00-00');


#
# TABLE STRUCTURE FOR: tbl_factura
#

DROP TABLE IF EXISTS `tbl_factura`;

CREATE TABLE `tbl_factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `noAfecta` double NOT NULL,
  `ventasGravadas` double NOT NULL,
  `saldoAnterior` double NOT NULL,
  `saldoActual` double NOT NULL,
  `iva` double NOT NULL,
  `pago` double NOT NULL,
  `fechaAplicacion` date NOT NULL,
  `intMora` double NOT NULL,
  `estadoFactura` int(11) NOT NULL,
  `id_Credito` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_Credito` (`id_Credito`),
  CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`id_Credito`) REFERENCES `tbl_creditos` (`idCredito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_fiadores
#

DROP TABLE IF EXISTS `tbl_fiadores`;

CREATE TABLE `tbl_fiadores` (
  `idFiador` int(11) NOT NULL AUTO_INCREMENT,
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
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idFiador`),
  KEY `idSolicitud` (`idSolicitud`),
  CONSTRAINT `tbl_fiadores_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Tabla para los Fiadores';

INSERT INTO `tbl_fiadores` (`idFiador`, `nombre`, `apellido`, `dui`, `nit`, `telefono`, `email`, `direccion`, `genero`, `fechaNacimiento`, `ingreso`, `idSolicitud`, `estado`, `fechaRegistro`) VALUES (1, 'ROSA AMINTA', 'MEJIA CRUZ', '02648844-6', '1111-271274-104-4', '2684-0707', 'alcaldiademercedesu@hotmail.com', 'COLONIA LAS FLORES, MERCEDES UMAÑA, USULUTAN', 'Femenino', '1974-12-27', '310.00', 21, 1, '2018-12-26 14:18:29');
INSERT INTO `tbl_fiadores` (`idFiador`, `nombre`, `apellido`, `dui`, `nit`, `telefono`, `email`, `direccion`, `genero`, `fechaNacimiento`, `ingreso`, `idSolicitud`, `estado`, `fechaRegistro`) VALUES (2, 'MARVIN STALEY', 'ROMERO RAMIREZ', '05092317-6', '0617-101294-105-7', '2663-4226', '', 'B. EL CALVARIO MERCEDES UMAÑA', 'Masculino', '0194-12-10', '325.00', 37, 1, '2019-02-18 11:10:26');


#
# TABLE STRUCTURE FOR: tbl_garantias
#

DROP TABLE IF EXISTS `tbl_garantias`;

CREATE TABLE `tbl_garantias` (
  `idGarantia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valorado` decimal(10,2) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDocumento` int(11) NOT NULL,
  PRIMARY KEY (`idGarantia`),
  KEY `idDocumento` (`idDocumento`),
  KEY `idSolicitud` (`idSolicitud`),
  CONSTRAINT `tbl_garantias_ibfk_2` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para la Garantía';

#
# TABLE STRUCTURE FOR: tbl_hipotecas
#

DROP TABLE IF EXISTS `tbl_hipotecas`;

CREATE TABLE `tbl_hipotecas` (
  `idHipoteca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valorado` decimal(10,2) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idDocumento` int(11) NOT NULL,
  PRIMARY KEY (`idHipoteca`),
  KEY `idSolicitud` (`idSolicitud`),
  KEY `idDocumento` (`idDocumento`),
  CONSTRAINT `tbl_hipotecas_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `tbl_solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_menu
#

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `html` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (1, 'Contaduría', '<li class=\"has_sub\">\r\n    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"ion ion-social-buffer\"style=\"font-size: 25px; color: blue;\"></i><span style=\"color: blue; font-weight: bold;\">Contaduría</span><span class=\"pull-right\"><i class=\"md md-keyboard-arrow-down\"></i></span></a>\r\n    <ul>\r\n        <!-- <li class=\"has_sub\">\r\n            <a href=\"javascript:void(0);\" class=\"waves-effect\"><span>Menu Level 1.1</span> <span class=\"pull-right\"><i class=\"md md-add\"></i></span></a>\r\n            <ul style=\"\">\r\n                <li><a href=\"javascript:void(0);\"><span>Menu Level 2.1</span></a></li>\r\n            </ul>\r\n        </li>\r\n        <li class=\"has_sub\">\r\n            <a href=\"javascript:void(0);\" class=\"waves-effect\"><span>Menu Level 1.1</span> <span class=\"pull-right\"><i class=\"md md-add\"></i></span></a>\r\n            <ul style=\"\">\r\n                <li><a href=\"javascript:void(0);\"><span>Menu Level 2.1</span></a></li>\r\n            </ul>\r\n        </li>\r\n        <li>\r\n            <a href=\"javascript:void(0);\"><span>Menu Level 1.2</span></a>\r\n        </li> -->\r\n        <li>\r\n           <a href=\"http://localhost/www/fast-cashv3.0/Contabilidad\" class=\"waves-effect\">Nueva partida</a>\r\n        </li>\r\n    </ul>\r\n</li>', 1, '2019-03-16 14:32:37');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (2, 'Clientes', '<li class=\'has_sub\'>                                 \r\n\r\n  <a href=\'#\' class=\'waves-effect\'><i class=\'fa fa-user-o\'></i><span>Clientes</span><span class=\'pull-right\'><i class=\'md md-keyboard-arrow-down\'></i></span></a>                                 \r\n\r\n  <ul class=\'list-unstyled\'>                                     \r\n\r\n    <li><a href=\'http://localhost/www/fast-cashv3.0/Clientes/\'>Nuevo cliente</a></li>\r\n\r\n    <li><a href=\'http://localhost/www/fast-cashv3.0/Clientes/gestionarCliente\'>Clientes</a></li>                    \r\n\r\n  </ul>\r\n\r\n</li>', 1, '2018-11-21 20:56:45');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (3, 'Solicitud', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-address-card-o\"></i><span>Solicitud</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"#\" data-toggle=\"modal\" data-target=\".modal_opcion_solicitud\">Nueva solicitud</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Solicitud/\">Solicitudes</a></li>\r\n        <!-- <li><a href=\"http://localhost/www/fast-cashv3.0/EstadosSolicitud/\">Gesctionar estados de la solicitud</a></li> -->\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Solicitud/gestionarPlazos\">Plazos</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-21 21:02:26');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (4, 'Creditos', '<li>\r\n   <a href=\"http://localhost/www/fast-cashv3.0/Creditos\" class=\"waves-effect\"><i class=\"fa fa-list-alt fa-lg\"></i><span>Créditos</span></a>\r\n</li>', 1, '2018-11-21 21:03:21');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (5, 'Pagos', '<li>\r\n   <a href=\"#\" class=\"waves-effect\" data-toggle=\"modal\" data-target=\".modal_opcion_pagos\"><i class=\"ion ion-cash\" style=\"font-size: 26px;\"></i><span>Pagos</span></a>\r\n</li>\r\n', 1, '2018-12-26 19:12:28');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (6, 'Empleados', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-android-social\" style=\"font-size:24px;\"></i><span>Empleados</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Empleados/ViewInsertarEmpleados\">Nuevo empleado</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Empleados/Index\">Empleados</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-21 21:04:48');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (7, 'Caja', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-android-inbox\" ></i><span>Caja</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/\" class=\"waves-effect\"><span>Caja General</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/CajaChica\" class=\"waves-effect\"><span>Caja Chica</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/CajaChica/HistorialCajas\" class=\"waves-effect\"><span>Historial</span></a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-21 21:19:25');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (8, 'Proveedores', '<li>\r\n    <a href=\"http://localhost/www/fast-cashv3.0/Proveedores/\" class=\"waves-effect\"><i class=\"ion-android-contacts\"></i><span> Proveedores </span></a>\r\n</li>', 1, '2018-11-21 21:19:25');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (9, 'Configuración', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-cog\" ></i><span>Configuración</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/User/\">Usuarios</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Accesos/\">Roles</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Rol/\">Permisos</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Backup/index\">Backup</a></li>\r\n    </ul>\r\n</li>', 1, '2018-11-21 21:05:53');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (10, 'Empresa', '<li>\r\n    <a href=\"http://localhost/www/fast-cashv3.0/Empresa/\" class=\"waves-effect\"><i class=\"fa fa-university\"></i><span> Empresa </span></a>\r\n</li>', 1, '2018-11-21 21:19:45');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (11, 'Reportes', '<li class=\"has_sub\">\r\n  <a href=\"#\" class=\"waves-effect\"><i class=\"ion ion-clipboard\" style=\"font-size: 28px;\"></i><span>Reportes</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/General/1\">General</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosPendientes/1\">Creditos Pendientes</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosVencidos/1\">Creditos Vencidos</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosMorosos/1\">Créditos Morosos</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/CreditosSaldados/1\">Créditos Saldados</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/ReporteIva/1\">Reporte de IVA</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/ResumenIva/1\">Resumen de IVA</a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Reportes/Infored\">INFORED</a></li>\r\n    </ul>\r\n</li>', 1, '2019-02-20 20:01:01');
INSERT INTO `tbl_menu` (`idMenu`, `menu`, `html`, `estado`, `fechaRegistro`) VALUES (12, 'Facturación', '<li class=\"has_sub\">\r\n    <a href=\"#\" class=\"waves-effect\"><i class=\"fa fa-newspaper-o\" ></i><span>Facturación</span><span class=\"pull-right\"><i class=\"md  md-keyboard-arrow-down\"></i></span></a>\r\n    <ul class=\"list-unstyled\">\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Facturas/\" class=\"waves-effect\"><span>Historial facturas</span></a></li>\r\n        <li><a href=\"http://localhost/www/fast-cashv3.0/Facturas/FacturarCreditosPopulares\" class=\"waves-effect\"><span>Facturar creditos populares</span></a></li>\r\n    </ul>\r\n</li>', 1, '2019-02-28 19:41:22');


#
# TABLE STRUCTURE FOR: tbl_municipios
#

DROP TABLE IF EXISTS `tbl_municipios`;

CREATE TABLE `tbl_municipios` (
  `Id_Municipio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fk_Id_Departamento` int(11) NOT NULL,
  PRIMARY KEY (`Id_Municipio`),
  KEY `Fk_Id_Departamento` (`Fk_Id_Departamento`),
  CONSTRAINT `tbl_municipios_ibfk_1` FOREIGN KEY (`Fk_Id_Departamento`) REFERENCES `tbl_departamentos` (`Id_Departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (1, 'Ahuachapán', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (2, 'Jujutla', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (3, 'Atiquizaya', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (4, 'Concepción de Ataco', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (5, 'El Refugio', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (6, 'Guaymango', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (7, 'Apaneca', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (8, 'San Francisco Menéndez', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (9, 'San Lorenzo', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (10, 'San Pedro Puxtla', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (11, 'Tacuba', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (12, 'Turín', 1);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (13, 'Candelaria de la Frontera', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (14, 'Chalchuapa', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (15, 'Coatepeque', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (16, 'El Congo', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (17, 'El Porvenir', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (18, 'Masahuat', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (19, 'Metapán', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (20, 'San Antonio Pajonal', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (21, 'San Sebastián Salitrillo', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (22, 'Santa Ana', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (23, 'Santa Rosa Guachipilín', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (24, 'Santiago de la Frontera', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (25, 'Texistepeque', 2);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (26, 'Acajutla', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (27, 'Armenia', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (28, 'Caluco', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (29, 'Cuisnahuat', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (30, 'Izalco', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (31, 'Juayúa', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (32, 'Nahuizalco', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (33, 'Nahulingo', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (34, 'Salcoatitán', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (35, 'San Antonio del Monte', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (36, 'San Julián', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (37, 'Santa Catarina Masahuat', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (38, 'Santa Isabel Ishuatán', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (39, 'Santo Domingo de Guzmán', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (40, 'Sonsonate', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (41, 'Sonzacate', 3);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (42, 'Alegría', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (43, 'Berlín', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (44, 'California', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (45, 'Concepción Batres', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (46, 'El Triunfo', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (47, 'Ereguayquín', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (48, 'Estanzuelas', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (49, 'Jiquilisco', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (50, 'Jucuapa', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (51, 'Jucuarán', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (52, 'Mercedes Umaña', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (53, 'Nueva Granada', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (54, 'Ozatlán', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (55, 'Puerto El Triunfo', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (56, 'San Agustín', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (57, 'San Buenaventura', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (58, 'San Dionisio', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (59, 'San Francisco Javier', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (60, 'Santa Elena', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (61, 'Santa María', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (62, 'Santiago de María', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (63, 'Tecapán', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (64, 'Usulután', 11);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (65, 'Carolina', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (66, 'Chapeltique', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (67, 'Chinameca', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (68, 'Chirilagua', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (69, 'Ciudad Barrios', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (70, 'Comacarán', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (71, 'El Tránsito', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (72, 'Lolotique', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (73, 'Moncagua', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (74, 'Nueva Guadalupe', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (75, 'Nuevo Edén de San Juan', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (76, 'Quelepa', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (77, 'San Antonio del Mosco', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (78, 'San Gerardo', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (79, 'San Jorge', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (80, 'San Luis de la Reina', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (81, 'San Miguel', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (82, 'San Rafael Oriente', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (83, 'Sesori', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (84, 'Uluazapa', 13);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (85, 'Arambala', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (86, 'Cacaopera', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (87, 'Chilanga', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (88, 'Corinto', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (89, 'Delicias de Concepción', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (90, 'El Divisadero', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (91, 'El Rosario (\'razán)', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (92, 'Gualococti', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (93, 'Guatajiagua', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (94, 'Joateca', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (95, 'Jocoaitique', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (96, 'Jocoro', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (97, 'Lolotiquillo', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (98, 'Meanguera', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (99, 'Osicala', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (100, 'Perquín', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (101, 'San Carlos', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (102, 'San Fernando (Morazán)', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (103, 'San Francisco Gotera', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (104, 'San Isidro (Morazán)', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (105, 'San Simón', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (106, 'Sensembra', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (107, 'Sociedad', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (108, 'Torola', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (109, 'Yamabal', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (110, 'Yoloaiquín', 12);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (111, 'La Unión', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (112, 'San Alejo', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (113, 'Yucuaiquín', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (114, 'Conchagua', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (115, 'Intipucá', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (116, 'San José', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (117, 'El Carmen (La Unión)', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (118, 'Yayantique', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (119, 'Bolívar', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (120, 'Meanguera del Golfo', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (121, 'Santa Rosa de Lima', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (122, 'Pasaquina', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (123, 'Anamoros', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (124, 'Nueva Esparta', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (125, 'El Sauce', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (126, 'Concepción de Oriente', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (127, 'Polorós', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (128, 'Lislique', 14);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (129, 'Antiguo Cuscatlán', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (130, 'Chiltiupán', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (131, 'Ciudad Arce', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (132, 'Colón', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (133, 'Comasagua', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (134, 'Huizúcar', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (135, 'Jayaque', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (136, 'Jicalapa', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (137, 'La Libertad', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (138, 'Santa Tecla', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (139, 'Nuevo Cuscatlán', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (140, 'San Juan Opico', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (141, 'Quezaltepeque', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (142, 'Sacacoyo', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (143, 'San José Villanueva', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (144, 'San Matías', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (145, 'San Pablo Tacachico', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (146, 'Talnique', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (147, 'Tamanique', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (148, 'Teotepeque', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (149, 'Tepecoyo', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (150, 'Zaragoza', 4);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (151, 'Agua Caliente', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (152, 'Arcatao', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (153, 'Azacualpa', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (154, 'Cancasque', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (155, 'Chalatenango', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (156, 'Citalá', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (157, 'Comapala', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (158, 'Concepción Quezaltepeque', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (159, 'Dulce Nombre de María', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (160, 'El Carrizal', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (161, 'El Paraíso', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (162, 'La Laguna', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (163, 'La Palma', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (164, 'La Reina', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (165, 'Las Vueltas', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (166, 'Nueva Concepción', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (167, 'Nueva Trinidad', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (168, 'Nombre de Jesús', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (169, 'Ojos de Agua', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (170, 'Potonico', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (171, 'San Antonio de la Cruz', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (172, 'San Antonio Los Ranchos', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (173, 'San Fernando (Chalatenango)', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (174, 'San Francisco Lempa', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (175, 'San Francisco Morazán', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (176, 'San Ignacio', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (177, 'San Isidro Labrador', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (178, 'Las Flores', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (179, 'San Luis del Carmen', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (180, 'San Miguel de Mercedes', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (181, 'San Rafael', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (182, 'Santa Rita', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (183, 'Tejutla', 5);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (184, 'Cojutepeque', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (185, 'Candelaria', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (186, 'El Carmen (Cuscatlán)', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (187, 'El Rosario (Cuscatlán)', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (188, 'Monte San Juan', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (189, 'Oratorio de Concepción', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (190, 'San Bartolomé Perulapía', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (191, 'San Cristóbal', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (192, 'San José Guayabal', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (193, 'San Pedro Perulapán', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (194, 'San Rafael Cedros', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (195, 'San Ramón', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (196, 'Santa Cruz Analquito', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (197, 'Santa Cruz Michapa', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (198, 'Suchitoto', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (199, 'Tenancingo', 7);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (200, 'Aguilares', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (201, 'Apopa', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (202, 'Ayutuxtepeque', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (203, 'Cuscatancingo', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (204, 'Ciudad Delgado', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (205, 'El Paisnal', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (206, 'Guazapa', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (207, 'Ilopango', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (208, 'Mejicanos', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (209, 'Nejapa', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (210, 'Panchimalco', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (211, 'Rosario de Mora', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (212, 'San Marcos', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (213, 'San Martín', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (214, 'San Salvador', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (215, 'Santiago Texacuangos', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (216, 'Santo Tomás', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (217, 'Soyapango', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (218, 'Tonacatepeque', 6);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (219, 'Zacatecoluca', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (220, 'Cuyultitán', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (221, 'El Rosario (La Paz)', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (222, 'Jerusalén', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (223, 'Mercedes La Ceiba', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (224, 'Olocuilta', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (225, 'Paraíso de Osorio', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (226, 'San Antonio Masahuat', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (227, 'San Emigdio', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (228, 'San Francisco Chinameca', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (229, 'San Pedro Masahuat', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (230, 'San Juan Nonualco', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (231, 'San Juan Talpa', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (232, 'San Juan Tepezontes', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (233, 'San Luis La Herradura', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (234, 'San Luis Talpa', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (235, 'San Miguel Tepezontes', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (236, 'San Pedro Nonualco', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (237, 'San Rafael Obrajuelo', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (238, 'Santa María Ostuma', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (239, 'Santiago Nonualco', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (240, 'Tapalhuaca', 8);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (241, 'Cinquera', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (242, 'Dolores', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (243, 'Guacotecti', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (244, 'Ilobasco', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (245, 'Jutiapa', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (246, 'San Isidro (Cabañas)', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (247, 'Sensuntepeque', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (248, 'Tejutepeque', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (249, 'Victoria', 9);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (250, 'Apastepeque', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (251, 'Guadalupe', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (252, 'San Cayetano Istepeque', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (253, 'San Esteban Catarina', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (254, 'San Ildefonso', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (255, 'San Lorenzo', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (256, 'San Sebastián', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (257, 'San Vicente', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (258, 'Santa Clara', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (259, 'Santo Domingo', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (260, 'Tecoluca', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (261, 'Tepetitán', 10);
INSERT INTO `tbl_municipios` (`Id_Municipio`, `Nombre_Municipio`, `Fk_Id_Departamento`) VALUES (262, 'Verapaz', 10);


#
# TABLE STRUCTURE FOR: tbl_partida
#

DROP TABLE IF EXISTS `tbl_partida`;

CREATE TABLE `tbl_partida` (
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES (3, 5, '500', '500', 'Por prestamo a don Julian', '2019-03-08');
INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES (6, 5, '200', '200', 'prueba', '2019-03-09');
INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES (8, 5, '20.99', '20.99', 'este fallara', '2019-03-23');
INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES (9, 5, '100', '100', 'Otra prueba we', '2019-03-08');
INSERT INTO `tbl_partida` (`idPartida`, `idUsuario`, `debe`, `haber`, `descripcion`, `fecha`) VALUES (10, 5, '80', '80', 'Por algo ', '2019-03-09');


#
# TABLE STRUCTURE FOR: tbl_partida_cuentas
#

DROP TABLE IF EXISTS `tbl_partida_cuentas`;

CREATE TABLE `tbl_partida_cuentas` (
  `idProceso` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (4, 24, 3, '500', '0', '2019-03-08');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (5, 3, 3, '0', '400', '2019-03-08');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (6, 4, 3, '0', '100', '2019-03-08');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (9, 3, 6, '0', '200', '2019-03-09');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (10, 3, 6, '200', '0', '2019-03-09');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (12, 2, 8, '20.99', '0', '2019-03-23');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (13, 2, 8, '0', '20.99', '2019-03-23');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (14, 2, 9, '100', '0', '2019-03-08');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (15, 2, 9, '0', '100', '2019-03-08');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (16, 3, 10, '80', '0', '2019-03-09');
INSERT INTO `tbl_partida_cuentas` (`idProceso`, `idCuenta`, `idPartida`, `debe`, `haber`, `fecha`) VALUES (17, 18, 10, '0', '80', '2019-03-09');


#
# TABLE STRUCTURE FOR: tbl_permisos
#

DROP TABLE IF EXISTS `tbl_permisos`;

CREATE TABLE `tbl_permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idMenu` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  PRIMARY KEY (`idPermiso`),
  KEY `idAcceso` (`idAcceso`),
  KEY `idMenu` (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (27, 1, 1, '2018-12-26 12:01:31', 1, 10);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (28, 1, 1, '2018-12-26 12:01:31', 2, 10);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (29, 1, 1, '2018-12-26 12:01:31', 3, 10);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (30, 1, 1, '2018-12-26 13:14:01', 1, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (31, 1, 1, '2018-12-26 13:14:01', 2, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (32, 1, 1, '2018-12-26 13:14:01', 3, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (33, 1, 1, '2018-12-26 13:14:01', 4, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (34, 1, 1, '2018-12-26 13:14:01', 5, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (35, 1, 1, '2018-12-26 13:14:01', 6, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (36, 1, 1, '2018-12-26 13:14:01', 7, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (37, 1, 1, '2018-12-26 13:14:01', 8, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (38, 1, 1, '2018-12-26 13:14:01', 10, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (39, 1, 1, '2019-01-07 13:39:11', 1, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (40, 1, 1, '2019-01-07 13:39:11', 2, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (41, 1, 1, '2019-01-07 13:39:11', 3, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (42, 1, 1, '2019-01-07 13:39:11', 4, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (43, 1, 1, '2019-01-07 13:39:11', 6, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (44, 1, 1, '2019-01-07 13:39:11', 7, 11);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (45, 1, 1, '2019-02-20 14:03:05', 11, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (46, 1, 1, '2019-02-28 13:41:52', 12, 5);
INSERT INTO `tbl_permisos` (`idPermiso`, `permiso`, `estado`, `fechaRegistro`, `idMenu`, `idAcceso`) VALUES (47, 1, 1, '2019-03-16 18:08:31', 9, 5);


#
# TABLE STRUCTURE FOR: tbl_plazos_prestamos
#

DROP TABLE IF EXISTS `tbl_plazos_prestamos`;

CREATE TABLE `tbl_plazos_prestamos` (
  `id_plazo` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_plazo` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `estado_plazo` int(11) NOT NULL,
  PRIMARY KEY (`id_plazo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (1, 1, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (2, 2, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (3, 3, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (4, 4, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (5, 5, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (6, 6, '2018-11-02', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (7, 7, '2018-12-26', 1);
INSERT INTO `tbl_plazos_prestamos` (`id_plazo`, `tiempo_plazo`, `fechaRegistro`, `estado_plazo`) VALUES (8, 8, '2018-12-26', 1);


#
# TABLE STRUCTURE FOR: tbl_proveedores
#

DROP TABLE IF EXISTS `tbl_proveedores`;

CREATE TABLE `tbl_proveedores` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCompleto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreEmpresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rubro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `direccionEmpresa` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: tbl_solicitudes
#

DROP TABLE IF EXISTS `tbl_solicitudes`;

CREATE TABLE `tbl_solicitudes` (
  `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,
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
  `idDocumento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `idCliente` (`idCliente`),
  KEY `idLineaPlazo` (`idLineaPlazo`),
  KEY `idEstadoSolicitud` (`idEstadoSolicitud`),
  KEY `idDocumento` (`idDocumento`),
  CONSTRAINT `tbl_solicitudes_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_solicitudes_ibfk_2` FOREIGN KEY (`idDocumento`) REFERENCES `tbl_documentos` (`idDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_solicitudes_ibfk_3` FOREIGN KEY (`idLineaPlazo`) REFERENCES `tbl_plazos_prestamos` (`id_plazo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_solicitudes_ibfk_6` FOREIGN KEY (`idEstadoSolicitud`) REFERENCES `tbl_estados_solicitud` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla para la gestion de solicitudes';

INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (21, '0861', '2018-11-30 00:00:00', 'SE CONSIDERA UNA DIFERENCIA POSITIVA DE $ 0.96', 1, '2018-12-26 14:18:29', 1, 'Crédito popular', 0, 12, 8, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (22, '0934', '2019-01-02 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 0, '2019-01-21 13:37:57', 1, 'Crédito popular', 0, 13, 1, 4, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (23, '0999', '2019-02-07 00:00:00', 'GARANTIA: PAGARE Y MUTUO SIMPLE', 1, '2019-02-07 10:40:04', 1, 'Crédito popular', 0, 15, 2, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (24, '0997', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 11:10:22', 1, 'Crédito popular', 0, 16, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (25, '0995', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 11:44:25', 1, 'Crédito popular', 0, 17, 3, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (26, '0994', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 1, '2019-02-07 11:54:51', 1, 'Crédito popular', 0, 13, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (27, '0991', '2019-01-31 00:00:00', 'GARANTIA: PAGARE, MUTUO SIMPLE Y LETRA DE CAMBIO', 1, '2019-02-07 13:31:10', 1, 'Crédito popular', 0, 18, 5, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (28, '0997', '2019-01-31 00:00:00', 'GARANTIA : PAGARE Y LETRA DE CAMBIO', 1, '2019-02-15 08:55:07', 1, 'Crédito popular', 0, 19, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (29, '0996', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-15 09:07:11', 1, 'Crédito popular', 0, 21, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (30, '0757', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y MUTUO SIMPLE.', 1, '2019-02-15 09:35:45', 1, 'Crédito popular', 0, 22, 2, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (31, '001021', '2019-02-10 00:00:00', 'GARANTIA: LETRA DE CAMBIO Y PAGARE', 1, '2019-02-15 10:48:23', 0, 'Crédito popular', 0, 23, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (32, '001019', '2019-02-10 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-15 11:00:22', 1, 'Crédito popular', 0, 24, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (33, '0864', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO', 0, '2019-02-18 09:48:00', 0, 'Crédito popular', 0, 26, 1, 1, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (34, '0993', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 09:51:55', 1, 'Crédito popular', 0, 26, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (35, '001005', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 10:05:22', 1, 'Crédito popular', 0, 27, 2, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (36, '001006', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y LETRA DE CAMBIO.', 1, '2019-02-18 10:33:08', 1, 'Crédito popular', 0, 28, 1, 3, NULL);
INSERT INTO `tbl_solicitudes` (`idSolicitud`, `codigoSolicitud`, `fechaRecibido`, `observaciones`, `estadoSolicitud`, `fechaRegistro`, `cobraMora`, `tipoCredito`, `destinoCredito`, `idCliente`, `idLineaPlazo`, `idEstadoSolicitud`, `idDocumento`) VALUES (37, '0805', '2019-01-31 00:00:00', 'GARANTIA: PAGARE Y MUTUO SOLIDARIO ', 1, '2019-02-18 11:10:26', 1, 'Crédito popular', 0, 29, 3, 1, NULL);


#
# TABLE STRUCTURE FOR: tbl_subcategoria_cuenta
#

DROP TABLE IF EXISTS `tbl_subcategoria_cuenta`;

CREATE TABLE `tbl_subcategoria_cuenta` (
  `idSubcategoria` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `codigoSubcategoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombreSubcategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (1, 1, '11', 'ACTIVO CORRIENTE');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (2, 1, '12', 'ACTIVO NO CORRIENTE');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (3, 2, '21', 'PASIVO CORRIENTE');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (4, 2, '22', 'PASIVO NO CORRIENTE');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (5, 3, '31', 'CAPITAL');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (6, 3, '32', 'SUPERÁVIT POR REVALUACIONES');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (7, 3, '33', 'RESULTADOS ACUMULADOS');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (8, 4, '41', 'COSTOS DE VENTAS Y SERVICIOS');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (9, 4, '42', 'GASTOS NO OPERACIONALES');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (10, 4, '43', 'RESULTADO EXTRAORDINARIO DEUDOR');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (11, 4, '44', 'OPERACIONES EN DISCONTINUACIÓN DEUDORES');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (12, 5, '51', 'INGRESOS POR OPERACIONES CONTINUAS');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (13, 5, '52', 'OTROS INGRESOS NO OPERACIONALES');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (14, 5, '53', 'OPERACIONES EN DISCONTINUACIÓN ACREEDORAS');
INSERT INTO `tbl_subcategoria_cuenta` (`idSubcategoria`, `idCategoria`, `codigoSubcategoria`, `nombreSubcategoria`) VALUES (15, 6, '61', 'PÉRDIDAS Y GANANCIAS');


#
# TABLE STRUCTURE FOR: tbl_tipo_pago
#

DROP TABLE IF EXISTS `tbl_tipo_pago`;

CREATE TABLE `tbl_tipo_pago` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_tipo_pago` (`idTipo`, `detalle`) VALUES (1, 'Efectivo');
INSERT INTO `tbl_tipo_pago` (`idTipo`, `detalle`) VALUES (2, 'Cheque');
INSERT INTO `tbl_tipo_pago` (`idTipo`, `detalle`) VALUES (3, 'Otro');


#
# TABLE STRUCTURE FOR: tbl_users
#

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idAcceso` (`idAcceso`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `tbl_empleados` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`idAcceso`) REFERENCES `tbl_accesos` (`idAcceso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='usuarios del sistema';

INSERT INTO `tbl_users` (`idUser`, `user`, `pass`, `idEmpleado`, `idAcceso`, `estado`, `fechaRegistro`) VALUES (4, 'admin', 'admin', 5, 5, 1, '2018-11-30 18:11:34');
INSERT INTO `tbl_users` (`idUser`, `user`, `pass`, `idEmpleado`, `idAcceso`, `estado`, `fechaRegistro`) VALUES (5, 'JONATAN', '123456', 6, 10, 1, '2018-12-26 00:00:00');
INSERT INTO `tbl_users` (`idUser`, `user`, `pass`, `idEmpleado`, `idAcceso`, `estado`, `fechaRegistro`) VALUES (6, 'CAJERA', '02211', 7, 11, 1, '2019-01-07 00:00:00');


