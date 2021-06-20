-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2021 a las 23:50:33
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_copag_u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarea`
--

CREATE TABLE `tblarea` (
  `Area_id` int(2) NOT NULL,
  `Area_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblarea`
--

INSERT INTO `tblarea` (`Area_id`, `Area_nombre`) VALUES
(1, 'Inventario'),
(2, 'Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarticulo`
--

CREATE TABLE `tblarticulo` (
  `Arti_id` int(11) NOT NULL,
  `Arti_nombre` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tart_id` int(11) NOT NULL,
  `Arti_medida` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'se utiliza para la medida en numeros',
  `Med_id` int(11) NOT NULL,
  `Arti_imagen` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Arti_descripcion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Arti_cantidad` int(5) NOT NULL,
  `Est_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblarticulo`
--

INSERT INTO `tblarticulo` (`Arti_id`, `Arti_nombre`, `Tart_id`, `Arti_medida`, `Med_id`, `Arti_imagen`, `Arti_descripcion`, `Arti_cantidad`, `Est_id`) VALUES
(1, 'Reprograf', 4, '20', 1, '../web/images/Articulo/logo_sena.png', 'resma de papel reprograf', 1, 0),
(2, 'prueba articulo', 1, '12', 1, '../web/images/Articulo/', 'no tiene', 1, 0),
(3, 'qw', 1, 'qwq', 1, '../web/images/pictureDefault.png', 'qwwqw', 1, 1),
(4, 'qweqw', 1, 'qweqw', 2, '../web/images/pictureDefault.png', 'qweqwe', 1, 0),
(5, '8c7h1yobrg7cl6f3mi019tq0aw6pen28ukf568xc50jsv', 1, 'asdasd', 1, '../web/images/pictureDefault.png', 'asdasd', 1, 1),
(6, 'g88cpyxr36920vazijh1d5smd4ok6bect1763u8lnfw46', 2, 'asdasd', 1, '../web/images/pictureDefault.png', 'asdasd', 1, 1),
(7, 'alcohol', 2, '100', 1, '../web/images/pictureDefault.png', 'alcohol', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `Cat_id` int(11) NOT NULL,
  `Cat_descripcion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`Cat_id`, `Cat_descripcion`) VALUES
(1, 'Null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcentro`
--

CREATE TABLE `tblcentro` (
  `Cen_id` int(11) NOT NULL,
  `Cen_nombre` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Cen_telefono` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Cen_direccion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Reg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblcentro`
--

INSERT INTO `tblcentro` (`Cen_id`, `Cen_nombre`, `Cen_telefono`, `Cen_direccion`, `Reg_id`) VALUES
(1, 'cdti', '32131321', 'av 12 #12 -09', 1),
(2, 'CAI', '2313213213', 'av 12 #12 -09', 1),
(3, 'CTI', '13213245', 'av 12 #12 -09', 2),
(4, 'CIA', '213213', 'av 12 #12 -09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomprasinsumos`
--

CREATE TABLE `tblcomprasinsumos` (
  `com_NoItem` int(10) NOT NULL,
  `com_CodigoSena` int(15) NOT NULL,
  `com_Descripcionb` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `com_UMedida` varchar(50) NOT NULL,
  `com_Cantidad` int(40) NOT NULL,
  `com_Observaciones` varchar(100) NOT NULL,
  `Soc_id` int(11) NOT NULL,
  `Cen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcotizacion`
--

CREATE TABLE `tblcotizacion` (
  `Cot_id` int(11) NOT NULL,
  `Cot_fecha` date NOT NULL COMMENT 'Fecha de registro de cotizacion.',
  `Usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblcotizacion`
--

INSERT INTO `tblcotizacion` (`Cot_id`, `Cot_fecha`, `Usu_id`) VALUES
(1, '2021-06-20', 1),
(2, '2021-06-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldepartamento`
--

CREATE TABLE `tbldepartamento` (
  `Dep_id` int(11) NOT NULL,
  `Dep_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbldepartamento`
--

INSERT INTO `tbldepartamento` (`Dep_id`, `Dep_nombre`) VALUES
(1, 'Antioquia'),
(2, 'Atlantico'),
(3, 'D. C. Santa Fe de Bogotá'),
(4, 'Bolivar'),
(5, 'Boyaca'),
(6, 'Caldas'),
(7, 'Caqueta'),
(8, 'Cauca'),
(9, 'Cesar'),
(10, 'Cordova'),
(11, 'Cundinamarca'),
(12, 'Choco'),
(13, 'Huila'),
(14, 'La Guajira'),
(15, 'Magdalena'),
(16, 'Meta'),
(17, 'Nariño'),
(18, 'Norte de Santander'),
(19, 'Quindio'),
(20, 'Risaralda'),
(21, 'Santander'),
(22, 'Sucre'),
(23, 'Tolima'),
(24, 'Valle'),
(25, 'Arauca'),
(26, 'Casanare'),
(27, 'Putumayo'),
(28, 'San Andres'),
(29, 'Amazonas'),
(30, 'Guainia'),
(31, 'Guaviare'),
(32, 'Vaupes'),
(33, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleinsumo`
--

CREATE TABLE `tbldetalleinsumo` (
  `Din_id` int(11) NOT NULL,
  `Din_codigoSena` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Din_cantidad` int(11) NOT NULL,
  `Din_observacion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sco_id` int(11) NOT NULL,
  `Arti_id` int(11) NOT NULL COMMENT 'se utiliza para llamar los insumos dentro de articulos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallemateriaprimacompra`
--

CREATE TABLE `tbldetallemateriaprimacompra` (
  `Dmp_id` int(11) NOT NULL,
  `Dmp_codigoSena` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Dmp_cantidad` int(11) NOT NULL,
  `Dmp_observacion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Soc_id` int(11) NOT NULL,
  `Arti_id` int(11) NOT NULL COMMENT 'Se utiliza para llamar la materia prima dentro de articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallepedido`
--

CREATE TABLE `tbldetallepedido` (
  `Dpe_id` int(11) NOT NULL,
  `Dep_descripcion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpe_cantidadPlancha` double DEFAULT NULL,
  `Dpe_valorUnidadPlancha` double DEFAULT NULL,
  `Dpe_totalPlancha` double DEFAULT NULL,
  `Dpe_cantidad` int(11) DEFAULT NULL COMMENT 'Es la cantidad del producto que se relaciona con el pedido.',
  `Dpe_tamanoCerrado` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpe_tamanoAbierto` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpe_paginasProducto` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpe_valorUnitario` double DEFAULT NULL COMMENT 'El valor unitario del producto',
  `Dpe_valorTotal` double DEFAULT NULL COMMENT 'El valor total del producto',
  `Dpe_insumos` double DEFAULT NULL,
  `Dpe_procesos` double DEFAULT NULL,
  `Dpe_valorDiseño` double DEFAULT NULL,
  `Dpe_encargadoDiseno` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ped_id` int(11) DEFAULT NULL,
  `Pba_id` int(11) DEFAULT NULL,
  `Maq_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbldetallepedido`
--

INSERT INTO `tbldetallepedido` (`Dpe_id`, `Dep_descripcion`, `Dpe_cantidadPlancha`, `Dpe_valorUnidadPlancha`, `Dpe_totalPlancha`, `Dpe_cantidad`, `Dpe_tamanoCerrado`, `Dpe_tamanoAbierto`, `Dpe_paginasProducto`, `Dpe_valorUnitario`, `Dpe_valorTotal`, `Dpe_insumos`, `Dpe_procesos`, `Dpe_valorDiseño`, `Dpe_encargadoDiseno`, `Ped_id`, `Pba_id`, `Maq_id`) VALUES
(1, 'Cartillas', NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL),
(2, 'sadas', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL),
(3, 'sadasd', 12, 1000, 12000, 40, '3434', '23', '50', 1439.15, 57566, 52000, 5566, 566, 'funcionario', 103, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallepedidoempaque`
--

CREATE TABLE `tbldetallepedidoempaque` (
  `Dpem_id` int(11) NOT NULL,
  `Dpem_horasEmpaque` double NOT NULL,
  `Dpem_valorHoraEmpaque` double NOT NULL,
  `Dpem_total` double NOT NULL,
  `Empa_id` int(11) NOT NULL,
  `Dpe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallepedidomateriaprima`
--

CREATE TABLE `tbldetallepedidomateriaprima` (
  `Dpm_id` int(11) NOT NULL,
  `Dpm_tamanoMaterial` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dpm_unidadTamanoMaterial` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dpm_gramajeMaterial` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dpm_unidadGramajeMaterial` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dpm_cantidad` double NOT NULL COMMENT 'Es la cantidad que se va a utilizar para la fabricacion.',
  `Dpm_precioUnitario` double NOT NULL,
  `Dpm_valorTotal` double NOT NULL,
  `Dpe_id` int(11) NOT NULL,
  `Arti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbldetallepedidomateriaprima`
--

INSERT INTO `tbldetallepedidomateriaprima` (`Dpm_id`, `Dpm_tamanoMaterial`, `Dpm_unidadTamanoMaterial`, `Dpm_gramajeMaterial`, `Dpm_unidadGramajeMaterial`, `Dpm_cantidad`, `Dpm_precioUnitario`, `Dpm_valorTotal`, `Dpe_id`, `Arti_id`) VALUES
(1, NULL, NULL, NULL, NULL, 50, 1000, 50000, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallepedidoterminado`
--

CREATE TABLE `tbldetallepedidoterminado` (
  `Dpt_id` int(11) NOT NULL,
  `Dpt_cantidadHorasTerminado` double DEFAULT NULL,
  `Dpt_costoUnitarioTerminado` double DEFAULT NULL,
  `Dpt_subtotalTerminado` double DEFAULT NULL,
  `Ter_id` int(11) DEFAULT NULL,
  `Dpe_id` int(11) DEFAULT NULL,
  `Maq_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbldetallepedidoterminado`
--

INSERT INTO `tbldetallepedidoterminado` (`Dpt_id`, `Dpt_cantidadHorasTerminado`, `Dpt_costoUnitarioTerminado`, `Dpt_subtotalTerminado`, `Ter_id`, `Dpe_id`, `Maq_id`) VALUES
(1, 5, 1000, 5000, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallepedidotinta`
--

CREATE TABLE `tbldetallepedidotinta` (
  `Dpti_id` int(11) NOT NULL,
  `Arti_id` int(11) DEFAULT NULL,
  `Dpe_id` int(11) DEFAULT NULL,
  `Dpti_colorTinta` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpti_cantidadTinta` double DEFAULT NULL,
  `Dpti_unidadCantidad` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dpti_costoUnitario` double DEFAULT NULL,
  `Dpti_subTotal` double DEFAULT NULL,
  `Dpti_tipoTinta` enum('BASICA','ESPECIAL') COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbldetallepedidotinta`
--

INSERT INTO `tbldetallepedidotinta` (`Dpti_id`, `Arti_id`, `Dpe_id`, `Dpti_colorTinta`, `Dpti_cantidadTinta`, `Dpti_unidadCantidad`, `Dpti_costoUnitario`, `Dpti_subTotal`, `Dpti_tipoTinta`) VALUES
(1, NULL, 3, 'CMYK', 10, 'Kg', 100, 1000, 'BASICA'),
(2, NULL, 3, '08374hj', 10, 'Kg', 100, 1000, 'ESPECIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblejecucion`
--

CREATE TABLE `tblejecucion` (
  `Eje_id` int(11) NOT NULL,
  `Eje_descripcion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblejecucion`
--

INSERT INTO `tblejecucion` (`Eje_id`, `Eje_descripcion`) VALUES
(1, 'CDTI'),
(2, 'Externo'),
(4, 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempaque`
--

CREATE TABLE `tblempaque` (
  `Empa_id` int(11) NOT NULL,
  `Empa_descripcion` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempresa`
--

CREATE TABLE `tblempresa` (
  `Emp_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_razonSocial` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_NIT` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_direccion` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_nombreContacto` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_apellidoContacto` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Mun_id` int(11) NOT NULL,
  `Emp_numeroDocumento` varchar(45) CHARACTER SET utf8mb4 NOT NULL COMMENT 'utilizado para colocar el tipo de documento, como cedula de ciudadania.',
  `Emp_primerNumeroContacto` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Emp_segundoNumeroContacto` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `Est_id` int(5) NOT NULL,
  `Tempr_id` int(11) NOT NULL,
  `Stg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblempresa`
--

INSERT INTO `tblempresa` (`Emp_id`, `Emp_razonSocial`, `Emp_NIT`, `Emp_email`, `Emp_direccion`, `Emp_nombreContacto`, `Emp_apellidoContacto`, `Mun_id`, `Emp_numeroDocumento`, `Emp_primerNumeroContacto`, `Emp_segundoNumeroContacto`, `Est_id`, `Tempr_id`, `Stg_id`) VALUES
('1', 'CAI centro agropecuario internacional', '123-4', 'cai@cai.gov.co', 'av 5 norte 10', 'jhonatan', 'zambrano', 1009, '1144060265', '3122321070', '3235148081', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado`
--

CREATE TABLE `tblestado` (
  `Est_id` int(5) NOT NULL,
  `Est_nombre` varchar(45) DEFAULT NULL,
  `Est_descrpicion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblestado`
--

INSERT INTO `tblestado` (`Est_id`, `Est_nombre`, `Est_descrpicion`) VALUES
(0, 'Inactivo', 'El usuario esta inactivo en la base de datos'),
(1, 'Activo', 'Para que el usurio este activo\r\n'),
(2, 'Aprobado', 'Ordenes de produccion aprobadas'),
(3, 'Rechazado', 'Ordenes de produccion rechazadas'),
(4, 'Pendiente', 'Ordenes de produccion pendientes por aprobar'),
(5, 'Pendiente por aprobacion - solicitud', ''),
(6, 'Aprobado - solicitud', ''),
(7, 'No aprobado - solicitud', ''),
(8, 'Pendiente por aprobacion - cotizacion', ''),
(9, 'Aprobado - cotizacion', ''),
(10, 'No aprobado - cotizacion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfirma`
--

CREATE TABLE `tblfirma` (
  `fir_id` int(10) NOT NULL,
  `fir_cargo` varchar(60) NOT NULL,
  `fir_imagen` varchar(300) NOT NULL,
  `usu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblfirma`
--

INSERT INTO `tblfirma` (`fir_id`, `fir_cargo`, `fir_imagen`, `usu_id`) VALUES
(1, 'Subdirector CDTI', '../web/images/Firma/firma.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblformulario`
--

CREATE TABLE `tblformulario` (
  `For_id` int(11) NOT NULL,
  `For_fechaInicio` time NOT NULL,
  `For_fechaFin` date NOT NULL,
  `For_horainicio` time NOT NULL,
  `Fro_horaFin` time NOT NULL,
  `For_observaciones` varchar(255) NOT NULL,
  `For_observacionesFin` varchar(255) NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Maq_id` int(11) NOT NULL,
  `Emp_id` varchar(45) NOT NULL,
  `Arti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblformularioherramienta`
--

CREATE TABLE `tblformularioherramienta` (
  `Fhe_id` int(11) NOT NULL,
  `Her_id` int(11) NOT NULL,
  `For_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblformularioproceso`
--

CREATE TABLE `tblformularioproceso` (
  `Fpr_id` int(11) NOT NULL,
  `For_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgenero`
--

CREATE TABLE `tblgenero` (
  `Gen_id` int(11) NOT NULL,
  `Gen_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblgenero`
--

INSERT INTO `tblgenero` (`Gen_id`, `Gen_descripcion`) VALUES
(0, 'Mujer'),
(1, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblherramienta`
--

CREATE TABLE `tblherramienta` (
  `Her_id` int(11) NOT NULL,
  `Her_nombre` varchar(45) NOT NULL,
  `Her_descripcion` text NOT NULL,
  `Her_cantidad` int(11) NOT NULL,
  `Her_foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblherramienta`
--

INSERT INTO `tblherramienta` (`Her_id`, `Her_nombre`, `Her_descripcion`, `Her_cantidad`, `Her_foto`, `Stg_id`, `Est_id`) VALUES
(1, 'asda', 'asdasdasd', 1, '../web/images/pictureDefault.png', 12, 0),
(2, 'asdasd', 'asdasdasd', 1, '../web/images/pictureDefault.png', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimpresion`
--

CREATE TABLE `tblimpresion` (
  `Imp_id` int(30) NOT NULL,
  `Maq_id` int(11) NOT NULL,
  `Imp_formatoCorte` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Imp_encargado` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Imp_observaciones` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblimpresion`
--

INSERT INTO `tblimpresion` (`Imp_id`, `Maq_id`, `Imp_formatoCorte`, `Imp_encargado`, `Imp_observaciones`) VALUES
(1, 1, '20 x 40 cm', 'Jhonatan', 'Obs 2'),
(2, 1, '20 x 40 cm', 'Jhonatan', 'fdfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaquina`
--

CREATE TABLE `tblmaquina` (
  `Maq_id` int(11) NOT NULL,
  `Maq_nombre` varchar(45) NOT NULL,
  `Maq_serial` longblob NOT NULL,
  `Maq_descripcion` varchar(45) NOT NULL,
  `Maq_imagen` varchar(255) NOT NULL,
  `Maq_cantidad` int(11) NOT NULL,
  `Est_id` int(11) NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Maq_fichaTecnica` varchar(200) DEFAULT NULL,
  `Maq_manual` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmaquina`
--

INSERT INTO `tblmaquina` (`Maq_id`, `Maq_nombre`, `Maq_serial`, `Maq_descripcion`, `Maq_imagen`, `Maq_cantidad`, `Est_id`, `Stg_id`, `Maq_fichaTecnica`, `Maq_manual`) VALUES
(1, 'prueba', 0x736164617364, 'asdasd', '../web/images/Maquina/tomy.jpg', 1, 1, 16, '../web/images/Maquina/Ficha/', '../web/images/Maquina/Manual/'),
(2, 'asda', 0x6173646173, 'dasdasd', '../web/images/Maquina/', 1, 1, 16, '../web/images/Maquina/Ficha/', '../web/images/Maquina/Manual/'),
(3, 'asdas', 0x646173, 'asdasd', '../web/images/pictureDefault.png', 1, 1, 15, '../web/images/Maquina/Ficha/', '../web/images/Maquina/Manual/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaquinaterminado`
--

CREATE TABLE `tblmaquinaterminado` (
  `Mte_id` int(11) NOT NULL,
  `Maq_id` int(11) NOT NULL,
  `Ter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedida`
--

CREATE TABLE `tblmedida` (
  `Med_id` int(11) NOT NULL,
  `Med_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmedida`
--

INSERT INTO `tblmedida` (`Med_id`, `Med_descripcion`) VALUES
(1, 'Mg - miligramo'),
(2, 'Cg- centrigramo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmovimiento`
--

CREATE TABLE `tblmovimiento` (
  `Mov_id` int(11) NOT NULL,
  `Mov_nombre` varchar(45) NOT NULL,
  `Mov_descripcion` varchar(45) NOT NULL,
  `Stg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmunicipio`
--

CREATE TABLE `tblmunicipio` (
  `Mun_id` int(11) NOT NULL,
  `Mun_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Dep_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmunicipio`
--

INSERT INTO `tblmunicipio` (`Mun_id`, `Mun_nombre`, `Dep_id`) VALUES
(1, 'MEDELLIN', 1),
(2, 'ABEJORRAL', 1),
(3, 'ABRIAQUI', 1),
(4, 'ALEJANDRIA', 1),
(5, 'AMAGA', 1),
(6, 'AMALFI', 1),
(7, 'ANDES', 1),
(8, 'ANGELOPOLIS', 1),
(9, 'ANGOSTURA', 1),
(10, 'ANORI', 1),
(11, 'ANTIOQUIA', 1),
(12, 'ANZA', 1),
(13, 'APARTADO', 1),
(14, 'ARBOLETES', 1),
(15, 'ARGELIA', 1),
(16, 'ARMENIA', 1),
(17, 'BARBOSA', 1),
(18, 'BELMIRA', 1),
(19, 'BELLO', 1),
(20, 'BETANIA', 1),
(21, 'BETULIA', 1),
(22, 'BOLIVAR', 1),
(23, 'BRICEÑO', 1),
(24, 'BURITICA', 1),
(25, 'CACERES', 1),
(26, 'CAICEDO', 1),
(27, 'CALDAS', 1),
(28, 'CAMPAMENTO', 1),
(29, 'CAÑASGORDAS', 1),
(30, 'CARACOLI', 1),
(31, 'CARAMANTA', 1),
(32, 'CAREPA', 1),
(33, 'CARMEN DE VIBORAL', 1),
(34, 'CAROLINA', 1),
(35, 'CAUCASIA', 1),
(36, 'CHIGORODO', 1),
(37, 'CISNEROS', 1),
(38, 'COCORNA', 1),
(39, 'CONCEPCION', 1),
(40, 'CONCORDIA', 1),
(41, 'COPACABANA', 1),
(42, 'DABEIBA', 1),
(43, 'DON MATIAS', 1),
(44, 'EBEJICO', 1),
(45, 'EL BAGRE', 1),
(46, 'ENTRERRIOS', 1),
(47, 'ENVIGADO', 1),
(48, 'FREDONIA', 1),
(49, 'FRONTINO', 1),
(50, 'GIRALDO', 1),
(51, 'GIRARDOTA', 1),
(52, 'GOMEZ PLATA', 1),
(53, 'GRANADA', 1),
(54, 'GUADALUPE', 1),
(55, 'GUARNE', 1),
(56, 'GUATAPE', 1),
(57, 'HELICONIA', 1),
(58, 'HISPANIA', 1),
(59, 'ITAGUI', 1),
(60, 'ITUANGO', 1),
(61, 'JARDIN', 1),
(62, 'JERICO', 1),
(63, 'LA CEJA', 1),
(64, 'LA ESTRELLA', 1),
(65, 'LA PINTADA', 1),
(66, 'LA UNION', 1),
(67, 'LIBORINA', 1),
(68, 'MACEO', 1),
(69, 'MARINILLA', 1),
(70, 'MONTEBELLO', 1),
(71, 'MURINDO', 1),
(72, 'MUTATA', 1),
(73, 'NARIÑO', 1),
(74, 'NECOCLI', 1),
(75, 'NECHI', 1),
(76, 'OLAYA', 1),
(77, 'PEÑOL', 1),
(78, 'PEQUE', 1),
(79, 'PUEBLORRICO', 1),
(80, 'PUERTO BERRIO', 1),
(81, 'PUERTO NARE (LA MAGDALENA)', 1),
(82, 'PUERTO TRIUNFO', 1),
(83, 'REMEDIOS', 1),
(84, 'RETIRO', 1),
(85, 'RIONEGRO', 1),
(86, 'SABANALARGA', 1),
(87, 'SABANETA', 1),
(88, 'SALGAR', 1),
(89, 'SAN ANDRES', 1),
(90, 'SAN CARLOS', 1),
(91, 'SAN FRANCISCO', 1),
(92, 'SAN JERONIMO', 1),
(93, 'SAN JOSE DE LA MONTAÑA', 1),
(94, 'SAN JUAN DE URABA', 1),
(95, 'SAN LUIS', 1),
(96, 'SAN PEDRO', 1),
(97, 'SAN PEDRO DE URABA', 1),
(98, 'SAN RAFAEL', 1),
(99, 'SAN ROQUE', 1),
(100, 'SAN VICENTE', 1),
(101, 'SANTA BARBARA', 1),
(102, 'SANTA ROSA DE OSOS', 1),
(103, 'SANTO DOMINGO', 1),
(104, 'SANTUARIO', 1),
(105, 'SEGOVIA', 1),
(106, 'SONSON', 1),
(107, 'SOPETRAN', 1),
(108, 'TAMESIS', 1),
(109, 'TARAZA', 1),
(110, 'TARSO', 1),
(111, 'TITIRIBI', 1),
(112, 'TOLEDO', 1),
(113, 'TURBO', 1),
(114, 'URAMITA', 1),
(115, 'URRAO', 1),
(116, 'VALDIVIA', 1),
(117, 'VALPARAISO', 1),
(118, 'VEGACHI', 1),
(119, 'VENECIA', 1),
(120, 'VIGIA DEL FUERTE', 1),
(121, 'YALI', 1),
(122, 'YARUMAL', 1),
(123, 'YOLOMBO', 1),
(124, 'YONDO', 1),
(125, 'ZARAGOZA', 1),
(126, 'BARRANQUILLA (DISTRITO ESPECIAL INDUSTRIAL Y PORTUARIO DE BARRANQUILLA)', 2),
(127, 'BARANOA', 2),
(128, 'CAMPO DE LA CRUZ', 2),
(129, 'CANDELARIA', 2),
(130, 'GALAPA', 2),
(131, 'JUAN DE ACOSTA', 2),
(132, 'LURUACO', 2),
(133, 'MALAMBO', 2),
(134, 'MANATI', 2),
(135, 'PALMAR DE VARELA', 2),
(136, 'PIOJO', 2),
(137, 'POLO NUEVO', 2),
(138, 'PONEDERA', 2),
(139, 'PUERTO COLOMBIA', 2),
(140, 'REPELON', 2),
(141, 'SABANAGRANDE', 2),
(142, 'SABANALARGA', 2),
(143, 'SANTA LUCIA', 2),
(144, 'SANTO TOMAS', 2),
(145, 'SOLEDAD', 2),
(146, 'SUAN', 2),
(147, 'TUBARA', 2),
(148, 'USIACURI', 2),
(149, 'Santa Fe de Bogotá', 3),
(150, 'USAQUEN', 3),
(151, 'CHAPINERO', 3),
(152, 'SANTA FE', 3),
(153, 'SAN CRISTOBAL', 3),
(154, 'USME', 3),
(155, 'TUNJUELITO', 3),
(156, 'BOSA', 3),
(157, 'KENNEDY', 3),
(158, 'FONTIBON', 3),
(159, 'ENGATIVA', 3),
(160, 'SUBA', 3),
(161, 'BARRIOS UNIDOS', 3),
(162, 'TEUSAQUILLO', 3),
(163, 'MARTIRES', 3),
(164, 'ANTONIO NARIÑO', 3),
(165, 'PUENTE ARANDA', 3),
(166, 'CANDELARIA', 3),
(167, 'RAFAEL URIBE', 3),
(168, 'CIUDAD BOLIVAR', 3),
(169, 'SUMAPAZ', 3),
(170, 'CARTAGENA (DISTRITO TURISTICO Y CULTURAL DE CARTAGENA)', 4),
(171, 'ACHI', 4),
(172, 'ALTOS DEL ROSARIO', 4),
(173, 'ARENAL', 4),
(174, 'ARJONA', 4),
(175, 'ARROYOHONDO', 4),
(176, 'BARRANCO DE LOBA', 4),
(177, 'CALAMAR', 4),
(178, 'CANTAGALLO', 4),
(179, 'CICUCO', 4),
(180, 'CORDOBA', 4),
(181, 'CLEMENCIA', 4),
(182, 'EL CARMEN DE BOLIVAR', 4),
(183, 'EL GUAMO', 4),
(184, 'EL PEÑON', 4),
(185, 'HATILLO DE LOBA', 4),
(186, 'MAGANGUE', 4),
(187, 'MAHATES', 4),
(188, 'MARGARITA', 4),
(189, 'MARIA LA BAJA', 4),
(190, 'MONTECRISTO', 4),
(191, 'MOMPOS', 4),
(192, 'MORALES', 4),
(193, 'PINILLOS', 4),
(194, 'REGIDOR', 4),
(195, 'RIO VIEJO', 4),
(196, 'SAN CRISTOBAL', 4),
(197, 'SAN ESTANISLAO', 4),
(198, 'SAN FERNANDO', 4),
(199, 'SAN JACINTO', 4),
(200, 'SAN JACINTO DEL CAUCA', 4),
(201, 'SAN JUAN NEPOMUCENO', 4),
(202, 'SAN MARTIN DE LOBA', 4),
(203, 'SAN PABLO', 4),
(204, 'SANTA CATALINA', 4),
(205, 'SANTA ROSA', 4),
(206, 'SANTA ROSA DEL SUR', 4),
(207, 'SIMITI', 4),
(208, 'SOPLAVIENTO', 4),
(209, 'TALAIGUA NUEVO', 4),
(210, 'TIQUISIO (PUERTO RICO)', 4),
(211, 'TURBACO', 4),
(212, 'TURBANA', 4),
(213, 'VILLANUEVA', 4),
(214, 'ZAMBRANO', 4),
(215, 'TUNJA', 5),
(216, 'ALMEIDA', 5),
(217, 'AQUITANIA', 5),
(218, 'ARCABUCO', 5),
(219, 'BELEN', 5),
(220, 'BERBEO', 5),
(221, 'BETEITIVA', 5),
(222, 'BOAVITA', 5),
(223, 'BOYACA', 5),
(224, 'BRICEÑO', 5),
(225, 'BUENAVISTA', 5),
(226, 'BUSBANZA', 5),
(227, 'CALDAS', 5),
(228, 'CAMPOHERMOSO', 5),
(229, 'CERINZA', 5),
(230, 'CHINAVITA', 5),
(231, 'CHIQUINQUIRA', 5),
(232, 'CHISCAS', 5),
(233, 'CHITA', 5),
(234, 'CHITARAQUE', 5),
(235, 'CHIVATA', 5),
(236, 'CIENEGA', 5),
(237, 'COMBITA', 5),
(238, 'COPER', 5),
(239, 'CORRALES', 5),
(240, 'COVARACHIA', 5),
(241, 'CUBARA', 5),
(242, 'CUCAITA', 5),
(243, 'CUITIVA', 5),
(244, 'CHIQUIZA', 5),
(245, 'CHIVOR', 5),
(246, 'DUITAMA', 5),
(247, 'EL COCUY', 5),
(248, 'EL ESPINO', 5),
(249, 'FIRAVITOBA', 5),
(250, 'FLORESTA', 5),
(251, 'GACHANTIVA', 5),
(252, 'GAMEZA', 5),
(253, 'GARAGOA', 5),
(254, 'GUACAMAYAS', 5),
(255, 'GUATEQUE', 5),
(256, 'GUAYATA', 5),
(257, 'GUICAN', 5),
(258, 'IZA', 5),
(259, 'JENESANO', 5),
(260, 'JERICO', 5),
(261, 'LABRANZAGRANDE', 5),
(262, 'LA CAPILLA', 5),
(263, 'LA VICTORIA', 5),
(264, 'LA UVITA', 5),
(265, 'VILLA DE LEIVA', 5),
(266, 'MACANAL', 5),
(267, 'MARIPI', 5),
(268, 'MIRAFLORES', 5),
(269, 'MONGUA', 5),
(270, 'MONGUI', 5),
(271, 'MONIQUIRA', 5),
(272, 'MOTAVITA', 5),
(273, 'MUZO', 5),
(274, 'NOBSA', 5),
(275, 'NUEVO COLON', 5),
(276, 'OICATA', 5),
(277, 'OTANCHE', 5),
(278, 'PACHAVITA', 5),
(279, 'PAEZ', 5),
(280, 'PAIPA', 5),
(281, 'PAJARITO', 5),
(282, 'PANQUEBA', 5),
(283, 'PAUNA', 5),
(284, 'PAYA', 5),
(285, 'PAZ DEL RIO', 5),
(286, 'PESCA', 5),
(287, 'PISBA', 5),
(288, 'PUERTO BOYACA', 5),
(289, 'QUIPAMA', 5),
(290, 'RAMIRIQUI', 5),
(291, 'RAQUIRA', 5),
(292, 'RONDON', 5),
(293, 'SABOYA', 5),
(294, 'SACHICA', 5),
(295, 'SAMACA', 5),
(296, 'SAN EDUARDO', 5),
(297, 'SAN JOSE DE PARE', 5),
(298, 'SAN LUIS DE GACENO', 5),
(299, 'SAN MATEO', 5),
(300, 'SAN MIGUEL DE SEMA', 5),
(301, 'SAN PABLO DE BORBUR', 5),
(302, 'SANTANA', 5),
(303, 'SANTA MARIA', 5),
(304, 'SANTA ROSA DE VITERBO', 5),
(305, 'SANTA SOFIA', 5),
(306, 'SATIVANORTE', 5),
(307, 'SATIVASUR', 5),
(308, 'SIACHOQUE', 5),
(309, 'SOATA', 5),
(310, 'SOCOTA', 5),
(311, 'SOCHA', 5),
(312, 'SOGAMOSO', 5),
(313, 'SOMONDOCO', 5),
(314, 'SORA', 5),
(315, 'SOTAQUIRA', 5),
(316, 'SORACA', 5),
(317, 'SUSACON', 5),
(318, 'SUTAMARCHAN', 5),
(319, 'SUTATENZA', 5),
(320, 'TASCO', 5),
(321, 'TENZA', 5),
(322, 'TIBANA', 5),
(323, 'TIBASOSA', 5),
(324, 'TINJACA', 5),
(325, 'TIPACOQUE', 5),
(326, 'TOCA', 5),
(327, 'TOGUI', 5),
(328, 'TOPAGA', 5),
(329, 'TOTA', 5),
(330, 'TUNUNGUA', 5),
(331, 'TURMEQUE', 5),
(332, 'TUTA', 5),
(333, 'TUTASA', 5),
(334, 'UMBITA', 5),
(335, 'VENTAQUEMADA', 5),
(336, 'VIRACACHA', 5),
(337, 'ZETAQUIRA', 5),
(338, 'MANIZALES', 6),
(339, 'AGUADAS', 6),
(340, 'ANSERMA', 6),
(341, 'ARANZAZU', 6),
(342, 'BELALCAZAR', 6),
(343, 'CHINCHINA', 6),
(344, 'FILADELFIA', 6),
(345, 'LA DORADA', 6),
(346, 'LA MERCED', 6),
(347, 'MANZANARES', 6),
(348, 'MARMATO', 6),
(349, 'MARQUETALIA', 6),
(350, 'MARULANDA', 6),
(351, 'NEIRA', 6),
(352, 'NORCASIA', 6),
(353, 'PACORA', 6),
(354, 'PALESTINA', 6),
(355, 'PENSILVANIA', 6),
(356, 'RIOSUCIO', 6),
(357, 'RISARALDA', 6),
(358, 'SALAMINA', 6),
(359, 'SAMANA', 6),
(360, 'SAN JOSE', 6),
(361, 'SUPIA', 6),
(362, 'VICTORIA', 6),
(363, 'VILLAMARIA', 6),
(364, 'VITERBO', 6),
(365, 'FLORENCIA', 7),
(366, 'ALBANIA', 7),
(367, 'BELEN DE LOS ANDAQUIES', 7),
(368, 'CARTAGENA DEL CHAIRA', 7),
(369, 'CURILLO', 7),
(370, 'EL DONCELLO', 7),
(371, 'EL PAUJIL', 7),
(372, 'LA MONTAÑITA', 7),
(373, 'MILAN', 7),
(374, 'MORELIA', 7),
(375, 'PUERTO RICO', 7),
(376, 'SAN JOSE DE FRAGUA', 7),
(377, 'SAN VICENTE DEL CAGUAN', 7),
(378, 'SOLANO', 7),
(379, 'SOLITA', 7),
(380, 'VALPARAISO', 7),
(381, 'POPAYAN', 8),
(382, 'ALMAGUER', 8),
(383, 'ARGELIA', 8),
(384, 'BALBOA', 8),
(385, 'BOLIVAR', 8),
(386, 'BUENOS AIRES', 8),
(387, 'CAJIBIO', 8),
(388, 'CALDONO', 8),
(389, 'CALOTO', 8),
(390, 'CORINTO', 8),
(391, 'EL TAMBO', 8),
(392, 'FLORENCIA', 8),
(393, 'GUAPI', 8),
(394, 'INZA', 8),
(395, 'JAMBALO', 8),
(396, 'LA SIERRA', 8),
(397, 'LA VEGA', 8),
(398, 'LOPEZ (MICAY)', 8),
(399, 'MERCADERES', 8),
(400, 'MIRANDA', 8),
(401, 'MORALES', 8),
(402, 'PADILLA', 8),
(403, 'PAEZ (BELALCAZAR)', 8),
(404, 'PATIA (EL BORDO)', 8),
(405, 'PIAMONTE', 8),
(406, 'PIENDAMO', 8),
(407, 'PUERTO TEJADA', 8),
(408, 'PURACE (COCONUCO)', 8),
(409, 'ROSAS', 8),
(410, 'SAN SEBASTIAN', 8),
(411, 'SANTANDER DE QUILICHAO', 8),
(412, 'SANTA ROSA', 8),
(413, 'SILVIA', 8),
(414, 'SOTARA (PAISPAMBA)', 8),
(415, 'SUAREZ', 8),
(416, 'TIMBIO', 8),
(417, 'TIMBIQUI', 8),
(418, 'TORIBIO', 8),
(419, 'TOTORO', 8),
(420, 'VILLARICA', 8),
(421, 'VALLEDUPAR', 9),
(422, 'AGUACHICA', 9),
(423, 'AGUSTIN CODAZZI', 9),
(424, 'ASTREA', 9),
(425, 'BECERRIL', 9),
(426, 'BOSCONIA', 9),
(427, 'CHIMICHAGUA', 9),
(428, 'CHIRIGUANA', 9),
(429, 'CURUMANI', 9),
(430, 'EL COPEY', 9),
(431, 'EL PASO', 9),
(432, 'GAMARRA', 9),
(433, 'GONZALEZ', 9),
(434, 'LA GLORIA', 9),
(435, 'LA JAGUA IBIRICO', 9),
(436, 'MANAURE (BALCON DEL CESAR)', 9),
(437, 'PAILITAS', 9),
(438, 'PELAYA', 9),
(439, 'PUEBLO BELLO', 9),
(440, 'RIO DE ORO', 9),
(441, 'LA PAZ (ROBLES)', 9),
(442, 'SAN ALBERTO', 9),
(443, 'SAN DIEGO', 9),
(444, 'SAN MARTIN', 9),
(445, 'TAMALAMEQUE', 9),
(446, 'MONTERIA', 10),
(447, 'AYAPEL', 10),
(448, 'BUENAVISTA', 10),
(449, 'CANALETE', 10),
(450, 'CERETE', 10),
(451, 'CHIMA', 10),
(452, 'CHINU', 10),
(453, 'CIENAGA DE ORO', 10),
(454, 'COTORRA', 10),
(455, 'LA APARTADA', 10),
(456, 'LORICA', 10),
(457, 'LOS CORDOBAS', 10),
(458, 'MOMIL', 10),
(459, 'MONTELIBANO', 10),
(460, 'MOÑITOS', 10),
(461, 'PLANETA RICA', 10),
(462, 'PUEBLO NUEVO', 10),
(463, 'PUERTO ESCONDIDO', 10),
(464, 'PUERTO LIBERTADOR', 10),
(465, 'PURISIMA', 10),
(466, 'SAHAGUN', 10),
(467, 'SAN ANDRES SOTAVENTO', 10),
(468, 'SAN ANTERO', 10),
(469, 'SAN BERNARDO DEL VIENTO', 10),
(470, 'SAN CARLOS', 10),
(471, 'SAN PELAYO', 10),
(472, 'TIERRALTA', 10),
(473, 'VALENCIA', 10),
(474, 'AGUA DE DIOS', 11),
(475, 'ALBAN', 11),
(476, 'ANAPOIMA', 11),
(477, 'ANOLAIMA', 11),
(478, 'ARBELAEZ', 11),
(479, 'BELTRAN', 11),
(480, 'BITUIMA', 11),
(481, 'BOJACA', 11),
(482, 'CABRERA', 11),
(483, 'CACHIPAY', 11),
(484, 'CAJICA', 11),
(485, 'CAPARRAPI', 11),
(486, 'CAQUEZA', 11),
(487, 'CARMEN DE CARUPA', 11),
(488, 'CHAGUANI', 11),
(489, 'CHIA', 11),
(490, 'CHIPAQUE', 11),
(491, 'CHOACHI', 11),
(492, 'CHOCONTA', 11),
(493, 'COGUA', 11),
(494, 'COTA', 11),
(495, 'CUCUNUBA', 11),
(496, 'EL COLEGIO', 11),
(497, 'EL PEÑON', 11),
(498, 'EL ROSAL', 11),
(499, 'FACATATIVA', 11),
(500, 'FOMEQUE', 11),
(501, 'FOSCA', 11),
(502, 'FUNZA', 11),
(503, 'FUQUENE', 11),
(504, 'FUSAGASUGA', 11),
(505, 'GACHALA', 11),
(506, 'GACHANCIPA', 11),
(507, 'GACHETA', 11),
(508, 'GAMA', 11),
(509, 'GIRARDOT', 11),
(510, 'GRANADA', 11),
(511, 'GUACHETA', 11),
(512, 'GUADUAS', 11),
(513, 'GUASCA', 11),
(514, 'GUATAQUI', 11),
(515, 'GUATAVITA', 11),
(516, 'GUAYABAL DE SIQUIMA', 11),
(517, 'GUAYABETAL', 11),
(518, 'GUTIERREZ', 11),
(519, 'JERUSALEN', 11),
(520, 'JUNIN', 11),
(521, 'LA CALERA', 11),
(522, 'LA MESA', 11),
(523, 'LA PALMA', 11),
(524, 'LA PEÑA', 11),
(525, 'LA VEGA', 11),
(526, 'LENGUAZAQUE', 11),
(527, 'MACHETA', 11),
(528, 'MADRID', 11),
(529, 'MANTA', 11),
(530, 'MEDINA', 11),
(531, 'MOSQUERA', 11),
(532, 'NARIÑO', 11),
(533, 'NEMOCON', 11),
(534, 'NILO', 11),
(535, 'NIMAIMA', 11),
(536, 'NOCAIMA', 11),
(537, 'VENECIA (OSPINA PEREZ)', 11),
(538, 'PACHO', 11),
(539, 'PAIME', 11),
(540, 'PANDI', 11),
(541, 'PARATEBUENO', 11),
(542, 'PASCA', 11),
(543, 'PUERTO SALGAR', 11),
(544, 'PULI', 11),
(545, 'QUEBRADANEGRA', 11),
(546, 'QUETAME', 11),
(547, 'QUIPILE', 11),
(548, 'APULO (RAFAEL REYES)', 11),
(549, 'RICAURTE', 11),
(550, 'SAN ANTONIO DEL TEQUENDAMA', 11),
(551, 'SAN BERNARDO', 11),
(552, 'SAN CAYETANO', 11),
(553, 'SAN FRANCISCO', 11),
(554, 'SAN JUAN DE RIOSECO', 11),
(555, 'SASAIMA', 11),
(556, 'SESQUILE', 11),
(557, 'SIBATE', 11),
(558, 'SILVANIA', 11),
(559, 'SIMIJACA', 11),
(560, 'SOACHA', 11),
(561, 'SOPO', 11),
(562, 'SUBACHOQUE', 11),
(563, 'SUESCA', 11),
(564, 'SUPATA', 11),
(565, 'SUSA', 11),
(566, 'SUTATAUSA', 11),
(567, 'TABIO', 11),
(568, 'TAUSA', 11),
(569, 'TENA', 11),
(570, 'TENJO', 11),
(571, 'TIBACUY', 11),
(572, 'TIBIRITA', 11),
(573, 'TOCAIMA', 11),
(574, 'TOCANCIPA', 11),
(575, 'TOPAIPI', 11),
(576, 'UBALA', 11),
(577, 'UBAQUE', 11),
(578, 'UBATE', 11),
(579, 'UNE', 11),
(580, 'UTICA', 11),
(581, 'VERGARA', 11),
(582, 'VIANI', 11),
(583, 'VILLAGOMEZ', 11),
(584, 'VILLAPINZON', 11),
(585, 'VILLETA', 11),
(586, 'VIOTA', 11),
(587, 'YACOPI', 11),
(588, 'ZIPACON', 11),
(589, 'ZIPAQUIRA', 11),
(590, 'QUIBDO (SAN FRANCISCO DE QUIBDO)', 12),
(591, 'ACANDI', 12),
(592, 'ALTO BAUDO (PIE DE PATO)', 12),
(593, 'ATRATO', 12),
(594, 'BAGADO', 12),
(595, 'BAHIA SOLANO (MUTIS)', 12),
(596, 'BAJO BAUDO (PIZARRO)', 12),
(597, 'BOJAYA (BELLAVISTA)', 12),
(598, 'CANTON DE SAN PABLO (MANAGRU)', 12),
(599, 'CONDOTO', 12),
(600, 'EL CARMEN DE ATRATO', 12),
(601, 'LITORAL DEL BAJO SAN JUAN (SANTA GENOVEVA DE DOCORDO)', 12),
(602, 'ISTMINA', 12),
(603, 'JURADO', 12),
(604, 'LLORO', 12),
(605, 'MEDIO ATRATO', 12),
(606, 'MEDIO BAUDO', 12),
(607, 'NOVITA', 12),
(608, 'NUQUI', 12),
(609, 'RIOQUITO', 12),
(610, 'RIOSUCIO', 12),
(611, 'SAN JOSE DEL PALMAR', 12),
(612, 'SIPI', 12),
(613, 'TADO', 12),
(614, 'UNGUIA', 12),
(615, 'UNION PANAMERICANA', 12),
(616, 'NEIVA', 13),
(617, 'ACEVEDO', 13),
(618, 'AGRADO', 13),
(619, 'AIPE', 13),
(620, 'ALGECIRAS', 13),
(621, 'ALTAMIRA', 13),
(622, 'BARAYA', 13),
(623, 'CAMPOALEGRE', 13),
(624, 'COLOMBIA', 13),
(625, 'ELIAS', 13),
(626, 'GARZON', 13),
(627, 'GIGANTE', 13),
(628, 'GUADALUPE', 13),
(629, 'HOBO', 13),
(630, 'IQUIRA', 13),
(631, 'ISNOS (SAN JOSE DE ISNOS)', 13),
(632, 'LA ARGENTINA', 13),
(633, 'LA PLATA', 13),
(634, 'NATAGA', 13),
(635, 'OPORAPA', 13),
(636, 'PAICOL', 13),
(637, 'PALERMO', 13),
(638, 'PALESTINA', 13),
(639, 'PITAL', 13),
(640, 'PITALITO', 13),
(641, 'RIVERA', 13),
(642, 'SALADOBLANCO', 13),
(643, 'SAN AGUSTIN', 13),
(644, 'SANTA MARIA', 13),
(645, 'SUAZA', 13),
(646, 'TARQUI', 13),
(647, 'TESALIA', 13),
(648, 'TELLO', 13),
(649, 'TERUEL', 13),
(650, 'TIMANA', 13),
(651, 'VILLAVIEJA', 13),
(652, 'YAGUARA', 13),
(653, 'RIOHACHA', 14),
(654, 'BARRANCAS', 14),
(655, 'DIBULLA', 14),
(656, 'DISTRACCION', 14),
(657, 'EL MOLINO', 14),
(658, 'FONSECA', 14),
(659, 'HATONUEVO', 14),
(660, 'LA JAGUA DEL PILAR', 14),
(661, 'MAICAO', 14),
(662, 'MANAURE', 14),
(663, 'SAN JUAN DEL CESAR', 14),
(664, 'URIBIA', 14),
(665, 'URUMITA', 14),
(666, 'VILLANUEVA', 14),
(667, 'SANTA MARTA (DISTRITO TURISTICO CULTURAL E HISTORICO DE SANTA MARTA)', 15),
(668, 'ALGARROBO', 15),
(669, 'ARACATACA', 15),
(670, 'ARIGUANI (EL DIFICIL)', 15),
(671, 'CERRO SAN ANTONIO', 15),
(672, 'CHIVOLO', 15),
(673, 'CIENAGA', 15),
(674, 'CONCORDIA', 15),
(675, 'EL BANCO', 15),
(676, 'EL PIÑON', 15),
(677, 'EL RETEN', 15),
(678, 'FUNDACION', 15),
(679, 'GUAMAL', 15),
(680, 'PEDRAZA', 15),
(681, 'PIJIÑO DEL CARMEN (PIJIÑO)', 15),
(682, 'PIVIJAY', 15),
(683, 'PLATO', 15),
(684, 'PUEBLOVIEJO', 15),
(685, 'REMOLINO', 15),
(686, 'SABANAS DE SAN ANGEL', 15),
(687, 'SALAMINA', 15),
(688, 'SAN SEBASTIAN DE BUENAVISTA', 15),
(689, 'SAN ZENON', 15),
(690, 'SANTA ANA', 15),
(691, 'SITIONUEVO', 15),
(692, 'TENERIFE', 15),
(693, 'VILLAVICENCIO', 16),
(694, 'ACACIAS', 16),
(695, 'BARRANCA DE UPIA', 16),
(696, 'CABUYARO', 16),
(697, 'CASTILLA LA NUEVA', 16),
(698, 'SAN LUIS DE CUBARRAL', 16),
(699, 'CUMARAL', 16),
(700, 'EL CALVARIO', 16),
(701, 'EL CASTILLO', 16),
(702, 'EL DORADO', 16),
(703, 'FUENTE DE ORO', 16),
(704, 'GRANADA', 16),
(705, 'GUAMAL', 16),
(706, 'MAPIRIPAN', 16),
(707, 'MESETAS', 16),
(708, 'LA MACARENA', 16),
(709, 'LA URIBE', 16),
(710, 'LEJANIAS', 16),
(711, 'PUERTO CONCORDIA', 16),
(712, 'PUERTO GAITAN', 16),
(713, 'PUERTO LOPEZ', 16),
(714, 'PUERTO LLERAS', 16),
(715, 'PUERTO RICO', 16),
(716, 'RESTREPO', 16),
(717, 'SAN CARLOS DE GUAROA', 16),
(718, 'SAN JUAN DE ARAMA', 16),
(719, 'SAN JUANITO', 16),
(720, 'SAN MARTIN', 16),
(721, 'VISTAHERMOSA', 16),
(722, 'PASTO (SAN JUAN DE PASTO)', 17),
(723, 'ALBAN (SAN JOSE)', 17),
(724, 'ALDANA', 17),
(725, 'ANCUYA', 17),
(726, 'ARBOLEDA (BERRUECOS)', 17),
(727, 'BARBACOAS', 17),
(728, 'BELEN', 17),
(729, 'BUESACO', 17),
(730, 'COLON (GENOVA)', 17),
(731, 'CONSACA', 17),
(732, 'CONTADERO', 17),
(733, 'CORDOBA', 17),
(734, 'CUASPUD (CARLOSAMA)', 17),
(735, 'CUMBAL', 17),
(736, 'CUMBITARA', 17),
(737, 'CHACHAGUI', 17),
(738, 'EL CHARCO', 17),
(739, 'EL PEÑOL', 17),
(740, 'EL ROSARIO', 17),
(741, 'EL TABLON', 17),
(742, 'EL TAMBO', 17),
(743, 'FUNES', 17),
(744, 'GUACHUCAL', 17),
(745, 'GUAITARILLA', 17),
(746, 'GUALMATAN', 17),
(747, 'ILES', 17),
(748, 'IMUES', 17),
(749, 'IPIALES', 17),
(750, 'LA CRUZ', 17),
(751, 'LA FLORIDA', 17),
(752, 'LA LLANADA', 17),
(753, 'LA TOLA', 17),
(754, 'LA UNION', 17),
(755, 'LEIVA', 17),
(756, 'LINARES', 17),
(757, 'LOS ANDES (SOTOMAYOR)', 17),
(758, 'MAGUI (PAYAN)', 17),
(759, 'MALLAMA (PIEDRANCHA)', 17),
(760, 'MOSQUERA', 17),
(761, 'OLAYA HERRERA (BOCAS DE SATINGA)', 17),
(762, 'OSPINA', 17),
(763, 'FRANCISCO PIZARRO (SALAHONDA)', 17),
(764, 'POLICARPA', 17),
(765, 'POTOSI', 17),
(766, 'PROVIDENCIA', 17),
(767, 'PUERRES', 17),
(768, 'PUPIALES', 17),
(769, 'RICAURTE', 17),
(770, 'ROBERTO PAYAN (SAN JOSE)', 17),
(771, 'SAMANIEGO', 17),
(772, 'SANDONA', 17),
(773, 'SAN BERNARDO', 17),
(774, 'SAN LORENZO', 17),
(775, 'SAN PABLO', 17),
(776, 'SAN PEDRO DE CARTAGO', 17),
(777, 'SANTA BARBARA (ISCUANDE)', 17),
(778, 'SANTA CRUZ (GUACHAVES)', 17),
(779, 'SAPUYES', 17),
(780, 'TAMINANGO', 17),
(781, 'TANGUA', 17),
(782, 'TUMACO', 17),
(783, 'TUQUERRES', 17),
(784, 'YACUANQUER', 17),
(785, 'CUCUTA', 18),
(786, 'ABREGO', 18),
(787, 'ARBOLEDAS', 18),
(788, 'BOCHALEMA', 18),
(789, 'BUCARASICA', 18),
(790, 'CACOTA', 18),
(791, 'CACHIRA', 18),
(792, 'CHINACOTA', 18),
(793, 'CHITAGA', 18),
(794, 'CONVENCION', 18),
(795, 'CUCUTILLA', 18),
(796, 'DURANIA', 18),
(797, 'EL CARMEN', 18),
(798, 'EL TARRA', 18),
(799, 'EL ZULIA', 18),
(800, 'GRAMALOTE', 18),
(801, 'HACARI', 18),
(802, 'HERRAN', 18),
(803, 'LABATECA', 18),
(804, 'LA ESPERANZA', 18),
(805, 'LA PLAYA', 18),
(806, 'LOS PATIOS', 18),
(807, 'LOURDES', 18),
(808, 'MUTISCUA', 18),
(809, 'OCAÑA', 18),
(810, 'PAMPLONA', 18),
(811, 'PAMPLONITA', 18),
(812, 'PUERTO SANTANDER', 18),
(813, 'RAGONVALIA', 18),
(814, 'SALAZAR', 18),
(815, 'SAN CALIXTO', 18),
(816, 'SAN CAYETANO', 18),
(817, 'SANTIAGO', 18),
(818, 'SARDINATA', 18),
(819, 'SILOS', 18),
(820, 'TEORAMA', 18),
(821, 'TIBU', 18),
(822, 'TOLEDO', 18),
(823, 'VILLACARO', 18),
(824, 'VILLA DEL ROSARIO', 18),
(825, 'ARMENIA', 19),
(826, 'BUENAVISTA', 19),
(827, 'CALARCA', 19),
(828, 'CIRCASIA', 19),
(829, 'CORDOBA', 19),
(830, 'FILANDIA', 19),
(831, 'GENOVA', 19),
(832, 'LA TEBAIDA', 19),
(833, 'MONTENEGRO', 19),
(834, 'PIJAO', 19),
(835, 'QUIMBAYA', 19),
(836, 'SALENTO', 19),
(837, 'PEREIRA', 20),
(838, 'APIA', 20),
(839, 'BALBOA', 20),
(840, 'BELEN DE UMBRIA', 20),
(841, 'DOS QUEBRADAS', 20),
(842, 'GUATICA', 20),
(843, 'LA CELIA', 20),
(844, 'LA VIRGINIA', 20),
(845, 'MARSELLA', 20),
(846, 'MISTRATO', 20),
(847, 'PUEBLO RICO', 20),
(848, 'QUINCHIA', 20),
(849, 'SANTA ROSA DE CABAL', 20),
(850, 'SANTUARIO', 20),
(851, 'BUCARAMANGA', 21),
(852, 'AGUADA', 21),
(853, 'ALBANIA', 21),
(854, 'ARATOCA', 21),
(855, 'BARBOSA', 21),
(856, 'BARICHARA', 21),
(857, 'BARRANCABERMEJA', 21),
(858, 'BETULIA', 21),
(859, 'BOLIVAR', 21),
(860, 'CABRERA', 21),
(861, 'CALIFORNIA', 21),
(862, 'CAPITANEJO', 21),
(863, 'CARCASI', 21),
(864, 'CEPITA', 21),
(865, 'CERRITO', 21),
(866, 'CHARALA', 21),
(867, 'CHARTA', 21),
(868, 'CHIMA', 21),
(869, 'CHIPATA', 21),
(870, 'CIMITARRA', 21),
(871, 'CONCEPCION', 21),
(872, 'CONFINES', 21),
(873, 'CONTRATACION', 21),
(874, 'COROMORO', 21),
(875, 'CURITI', 21),
(876, 'EL CARMEN DE CHUCURY', 21),
(877, 'EL GUACAMAYO', 21),
(878, 'EL PEÑON', 21),
(879, 'EL PLAYON', 21),
(880, 'ENCINO', 21),
(881, 'ENCISO', 21),
(882, 'FLORIAN', 21),
(883, 'FLORIDABLANCA', 21),
(884, 'GALAN', 21),
(885, 'GAMBITA', 21),
(886, 'GIRON', 21),
(887, 'GUACA', 21),
(888, 'GUADALUPE', 21),
(889, 'GUAPOTA', 21),
(890, 'GUAVATA', 21),
(891, 'GUEPSA', 21),
(892, 'HATO', 21),
(893, 'JESUS MARIA', 21),
(894, 'JORDAN', 21),
(895, 'LA BELLEZA', 21),
(896, 'LANDAZURI', 21),
(897, 'LA PAZ', 21),
(898, 'LEBRIJA', 21),
(899, 'LOS SANTOS', 21),
(900, 'MACARAVITA', 21),
(901, 'MALAGA', 21),
(902, 'MATANZA', 21),
(903, 'MOGOTES', 21),
(904, 'MOLAGAVITA', 21),
(905, 'OCAMONTE', 21),
(906, 'OIBA', 21),
(907, 'ONZAGA', 21),
(908, 'PALMAR', 21),
(909, 'PALMAS DEL SOCORRO', 21),
(910, 'PARAMO', 21),
(911, 'PIEDECUESTA', 21),
(912, 'PINCHOTE', 21),
(913, 'PUENTE NACIONAL', 21),
(914, 'PUERTO PARRA', 21),
(915, 'PUERTO WILCHES', 21),
(916, 'RIONEGRO', 21),
(917, 'SABANA DE TORRES', 21),
(918, 'SAN ANDRES', 21),
(919, 'SAN BENITO', 21),
(920, 'SAN GIL', 21),
(921, 'SAN JOAQUIN', 21),
(922, 'SAN JOSE DE MIRANDA', 21),
(923, 'SAN MIGUEL', 21),
(924, 'SAN VICENTE DE CHUCURI', 21),
(925, 'SANTA BARBARA', 21),
(926, 'SANTA HELENA DEL OPON', 21),
(927, 'SIMACOTA', 21),
(928, 'SOCORRO', 21),
(929, 'SUAITA', 21),
(930, 'SUCRE', 21),
(931, 'SURATA', 21),
(932, 'TONA', 21),
(933, 'VALLE SAN JOSE', 21),
(934, 'VELEZ', 21),
(935, 'VETAS', 21),
(936, 'VILLANUEVA', 21),
(937, 'ZAPATOCA', 21),
(938, 'SINCELEJO', 22),
(939, 'BUENAVISTA', 22),
(940, 'CAIMITO', 22),
(941, 'COLOSO (RICAURTE)', 22),
(942, 'COROZAL', 22),
(943, 'CHALAN', 22),
(944, 'GALERAS (NUEVA GRANADA)', 22),
(945, 'GUARANDA', 22),
(946, 'LA UNION', 22),
(947, 'LOS PALMITOS', 22),
(948, 'MAJAGUAL', 22),
(949, 'MORROA', 22),
(950, 'OVEJAS', 22),
(951, 'PALMITO', 22),
(952, 'SAMPUES', 22),
(953, 'SAN BENITO ABAD', 22),
(954, 'SAN JUAN DE BETULIA', 22),
(955, 'SAN MARCOS', 22),
(956, 'SAN ONOFRE', 22),
(957, 'SAN PEDRO', 22),
(958, 'SINCE', 22),
(959, 'SUCRE', 22),
(960, 'TOLU', 22),
(961, 'TOLUVIEJO', 22),
(962, 'IBAGUE', 23),
(963, 'ALPUJARRA', 23),
(964, 'ALVARADO', 23),
(965, 'AMBALEMA', 23),
(966, 'ANZOATEGUI', 23),
(967, 'ARMERO (GUAYABAL)', 23),
(968, 'ATACO', 23),
(969, 'CAJAMARCA', 23),
(970, 'CARMEN APICALA', 23),
(971, 'CASABIANCA', 23),
(972, 'CHAPARRAL', 23),
(973, 'COELLO', 23),
(974, 'COYAIMA', 23),
(975, 'CUNDAY', 23),
(976, 'DOLORES', 23),
(977, 'ESPINAL', 23),
(978, 'FALAN', 23),
(979, 'FLANDES', 23),
(980, 'FRESNO', 23),
(981, 'GUAMO', 23),
(982, 'HERVEO', 23),
(983, 'HONDA', 23),
(984, 'ICONONZO', 23),
(985, 'LERIDA', 23),
(986, 'LIBANO', 23),
(987, 'MARIQUITA', 23),
(988, 'MELGAR', 23),
(989, 'MURILLO', 23),
(990, 'NATAGAIMA', 23),
(991, 'ORTEGA', 23),
(992, 'PALOCABILDO', 23),
(993, 'PIEDRAS', 23),
(994, 'PLANADAS', 23),
(995, 'PRADO', 23),
(996, 'PURIFICACION', 23),
(997, 'RIOBLANCO', 23),
(998, 'RONCESVALLES', 23),
(999, 'ROVIRA', 23),
(1000, 'SALDAÑA', 23),
(1001, 'SAN ANTONIO', 23),
(1002, 'SAN LUIS', 23),
(1003, 'SANTA ISABEL', 23),
(1004, 'SUAREZ', 23),
(1005, 'VALLE DE SAN JUAN', 23),
(1006, 'VENADILLO', 23),
(1007, 'VILLAHERMOSA', 23),
(1008, 'VILLARRICA', 23),
(1009, 'CALI (SANTIAGO DE CALI)', 24),
(1010, 'ALCALA', 24),
(1011, 'ANDALUCIA', 24),
(1012, 'ANSERMANUEVO', 24),
(1013, 'ARGELIA', 24),
(1014, 'BOLIVAR', 24),
(1015, 'BUENAVENTURA', 24),
(1016, 'BUGA', 24),
(1017, 'BUGALAGRANDE', 24),
(1018, 'CAICEDONIA', 24),
(1019, 'CALIMA (DARIEN)', 24),
(1020, 'CANDELARIA', 24),
(1021, 'CARTAGO', 24),
(1022, 'DAGUA', 24),
(1023, 'EL AGUILA', 24),
(1024, 'EL CAIRO', 24),
(1025, 'EL CERRITO', 24),
(1026, 'EL DOVIO', 24),
(1027, 'FLORIDA', 24),
(1028, 'GINEBRA', 24),
(1029, 'GUACARI', 24),
(1030, 'JAMUNDI', 24),
(1031, 'LA CUMBRE', 24),
(1032, 'LA UNION', 24),
(1033, 'LA VICTORIA', 24),
(1034, 'OBANDO', 24),
(1035, 'PALMIRA', 24),
(1036, 'PRADERA', 24),
(1037, 'RESTREPO', 24),
(1038, 'RIOFRIO', 24),
(1039, 'ROLDANILLO', 24),
(1040, 'SAN PEDRO', 24),
(1041, 'SEVILLA', 24),
(1042, 'TORO', 24),
(1043, 'TRUJILLO', 24),
(1044, 'TULUA', 24),
(1045, 'ULLOA', 24),
(1046, 'VERSALLES', 24),
(1047, 'VIJES', 24),
(1048, 'YOTOCO', 24),
(1049, 'YUMBO', 24),
(1050, 'ZARZAL', 24),
(1051, 'ARAUCA', 25),
(1052, 'ARAUQUITA', 25),
(1053, 'CRAVO NORTE', 25),
(1054, 'FORTUL', 25),
(1055, 'PUERTO RONDON', 25),
(1056, 'SARAVENA', 25),
(1057, 'TAME', 25),
(1058, 'YOPAL', 26),
(1059, 'AGUAZUL', 26),
(1060, 'CHAMEZA', 26),
(1061, 'HATO COROZAL', 26),
(1062, 'LA SALINA', 26),
(1063, 'MANI', 26),
(1064, 'MONTERREY', 26),
(1065, 'NUNCHIA', 26),
(1066, 'OROCUE', 26),
(1067, 'PAZ DE ARIPORO', 26),
(1068, 'PORE', 26),
(1069, 'RECETOR', 26),
(1070, 'SABANALARGA', 26),
(1071, 'SACAMA', 26),
(1072, 'SAN LUIS DE PALENQUE', 26),
(1073, 'TAMARA', 26),
(1074, 'TAURAMENA', 26),
(1075, 'TRINIDAD', 26),
(1076, 'VILLANUEVA', 26),
(1077, 'MOCOA', 27),
(1078, 'COLON', 27),
(1079, 'ORITO', 27),
(1080, 'PUERTO ASIS', 27),
(1081, 'PUERTO CAICEDO', 27),
(1082, 'PUERTO GUZMAN', 27),
(1083, 'PUERTO LEGUIZAMO', 27),
(1084, 'SIBUNDOY', 27),
(1085, 'SAN FRANCISCO', 27),
(1086, 'SAN MIGUEL (LA DORADA)', 27),
(1087, 'SANTIAGO', 27),
(1088, 'LA HORMIGA (VALLE DEL GUAMUEZ)', 27),
(1089, 'VILLAGARZON', 27),
(1090, 'SAN ANDRES', 28),
(1091, 'PROVIDENCIA', 28),
(1092, 'LETICIA', 29),
(1093, 'EL ENCANTO', 29),
(1094, 'LA CHORRERA', 29),
(1095, 'LA PEDRERA', 29),
(1096, 'LA VICTORIA', 29),
(1097, 'MIRITI-PARANA', 29),
(1098, 'PUERTO ALEGRIA', 29),
(1099, 'PUERTO ARICA', 29),
(1100, 'PUERTO NARIÑO', 29),
(1101, 'PUERTO SANTANDER', 29),
(1102, 'TARAPACA', 29),
(1103, 'PUERTO INIRIDA', 30),
(1104, 'BARRANCO MINAS', 30),
(1105, 'SAN FELIPE', 30),
(1106, 'PUERTO COLOMBIA', 30),
(1107, 'LA GUADALUPE', 30),
(1108, 'CACAHUAL', 30),
(1109, 'PANA PANA (CAMPO ALEGRE)', 30),
(1110, 'MORICHAL (MORICHAL NUEVO)', 30),
(1111, 'SAN JOSE DEL GUAVIARE', 31),
(1112, 'CALAMAR', 31),
(1113, 'EL RETORNO', 31),
(1114, 'MIRAFLORES', 31),
(1115, 'MITU', 32),
(1116, 'CARURU', 32),
(1117, 'PACOA', 32),
(1118, 'TARAIRA', 32),
(1119, 'PAPUNAUA (MORICHAL)', 32),
(1120, 'YAVARATE', 32),
(1121, 'PUERTO CARREÑO', 33),
(1122, 'LA PRIMAVERA', 33),
(1123, 'SANTA RITA', 33),
(1124, 'SANTA ROSALIA', 33),
(1125, 'SAN JOSE DE OCUNE', 33),
(1126, 'CUMARIBO', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblordenproduccion`
--

CREATE TABLE `tblordenproduccion` (
  `Odp_id` int(30) NOT NULL,
  `Odp_fechaCreacion` date NOT NULL,
  `Odp_tipoempresa` int(11) NOT NULL,
  `Emp_id` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_id` int(11) NOT NULL,
  `Pte_id` int(11) NOT NULL,
  `Pim_id` int(30) NOT NULL,
  `Imp_id` int(30) NOT NULL,
  `Odp_fechaEntrega` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Odp_fechaInicio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Odp_fechafin` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Odp_Estado` int(10) DEFAULT 4,
  `Odp_motivorechazo` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Odp_usuFirma` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblordenproduccion`
--

INSERT INTO `tblordenproduccion` (`Odp_id`, `Odp_fechaCreacion`, `Odp_tipoempresa`, `Emp_id`, `Usu_id`, `Pte_id`, `Pim_id`, `Imp_id`, `Odp_fechaEntrega`, `Odp_fechaInicio`, `Odp_fechafin`, `Odp_Estado`, `Odp_motivorechazo`, `Odp_usuFirma`) VALUES
(1, '2021-06-20', 3, '1', 1, 2, 2, 1, '2021-06-30', '2021-06-17', '2021-06-24', 3, 'Prueba 1', 0),
(2, '2021-06-20', 4, '1', 1, 3, 3, 2, '2021-06-30', '2021-06-30', '2021-06-30', 3, 'Prueba', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpedido`
--

CREATE TABLE `tblpedido` (
  `Ped_id` int(11) NOT NULL,
  `Ped_fecha` date DEFAULT NULL,
  `destinatario` int(11) DEFAULT NULL,
  `Ped_objetivo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ped_plazoEjecucionDias` int(30) DEFAULT NULL,
  `Ped_plazoEjecucionMeses` int(12) DEFAULT NULL,
  `Ped_lugarEjecucionCiu` int(100) DEFAULT NULL,
  `Ped_lugarEjecucionCen` int(100) DEFAULT NULL,
  `Est_id` int(11) DEFAULT NULL,
  `Cot_id` int(11) DEFAULT NULL,
  `Cen_id` int(11) DEFAULT NULL,
  `Emp_id` int(11) DEFAULT NULL,
  `Dep_id` int(11) DEFAULT NULL,
  `Mun_id` int(11) DEFAULT NULL,
  `Tempr_id` int(11) DEFAULT NULL,
  `Ped_motivo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblpedido`
--

INSERT INTO `tblpedido` (`Ped_id`, `Ped_fecha`, `destinatario`, `Ped_objetivo`, `Ped_plazoEjecucionDias`, `Ped_plazoEjecucionMeses`, `Ped_lugarEjecucionCiu`, `Ped_lugarEjecucionCen`, `Est_id`, `Cot_id`, `Cen_id`, `Emp_id`, `Dep_id`, `Mun_id`, `Tempr_id`, `Ped_motivo`) VALUES
(1, '2021-06-20', 4, 'Pedido de solicitud', 2, 1, 1, 3, 3, NULL, 3, 1, 24, 1009, 3, NULL),
(102, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 7, 1, NULL, 1, NULL, NULL, 3, NULL),
(104, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpermiso`
--

CREATE TABLE `tblpermiso` (
  `Per_id` int(11) NOT NULL,
  `Per_nombre` varchar(45) NOT NULL,
  `Per_descripcion` varchar(45) NOT NULL,
  `Per_fechaCaducidad` time NOT NULL,
  `Per_firmaAutorizacion` varchar(45) NOT NULL,
  `Mov_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpliego`
--

CREATE TABLE `tblpliego` (
  `Pli_id` int(11) NOT NULL,
  `Pli_rip` int(11) NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Pli_tintaespecial` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Imp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblpliego`
--

INSERT INTO `tblpliego` (`Pli_id`, `Pli_rip`, `Stg_id`, `Pli_tintaespecial`, `Imp_id`) VALUES
(1, 11, 7, '#00FFFF', 1),
(2, 10, 8, '#00ff00', 1),
(3, 11, 7, '#0000ff', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpreimpreion`
--

CREATE TABLE `tblpreimpreion` (
  `Pim_id` int(30) NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Pim_encargado` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pim_observacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblpreimpreion`
--

INSERT INTO `tblpreimpreion` (`Pim_id`, `Stg_id`, `Pim_encargado`, `Pim_observacion`) VALUES
(1, 4, 'Jhonatan', 'dfdf'),
(2, 4, 'Jhonatan Zambrano', 'Obs 1'),
(3, 4, 'Jhonatan Zambrano', 'sdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproceso`
--

CREATE TABLE `tblproceso` (
  `Pro_id` int(11) NOT NULL,
  `Pro_nombre` varchar(45) NOT NULL,
  `Pro_descripcon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductobase`
--

CREATE TABLE `tblproductobase` (
  `Pba_id` int(11) NOT NULL,
  `Pba_descripcion` varchar(45) NOT NULL,
  `Cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproductobase`
--

INSERT INTO `tblproductobase` (`Pba_id`, `Pba_descripcion`, `Cat_id`) VALUES
(1, 'Cartillas', 1),
(2, 'Afiche', 1),
(3, 'Cuadernos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductoterminado`
--

CREATE TABLE `tblproductoterminado` (
  `Pte_id` int(11) NOT NULL,
  `Pte_cantidad` int(10) DEFAULT NULL,
  `Pte_numeroPaginas` int(10) DEFAULT NULL,
  `Pte_tamañoAbierto` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pte_tamañoCerrado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pte_diseñador` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Pba_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblproductoterminado`
--

INSERT INTO `tblproductoterminado` (`Pte_id`, `Pte_cantidad`, `Pte_numeroPaginas`, `Pte_tamañoAbierto`, `Pte_tamañoCerrado`, `Pte_diseñador`, `Pba_id`) VALUES
(1, 40, 44, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 2),
(2, 400, 20, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 1),
(3, 4000, 20, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblregional`
--

CREATE TABLE `tblregional` (
  `Reg_id` int(11) NOT NULL,
  `Reg_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblregional`
--

INSERT INTO `tblregional` (`Reg_id`, `Reg_descripcion`) VALUES
(1, 'regional valle'),
(2, 'regional cundinamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE `tblrol` (
  `Rol_id` int(11) NOT NULL,
  `Rol_nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblrol`
--

INSERT INTO `tblrol` (`Rol_id`, `Rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Funcionario'),
(3, 'Aprendiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsolicitudecompra`
--

CREATE TABLE `tblsolicitudecompra` (
  `Soc_id` int(11) NOT NULL,
  `Soc_fecha` date NOT NULL,
  `Soc_DNI_jefeOficina` int(11) NOT NULL,
  `Soc_DNI_servidorPublico` int(11) NOT NULL,
  `Soc_area` varchar(20) DEFAULT NULL,
  `Soc_ficha` int(11) DEFAULT NULL,
  `Soc_servidorp` varchar(45) DEFAULT NULL,
  `Soc_nom_je` varchar(40) DEFAULT NULL,
  `Reg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsubtipogeneral`
--

CREATE TABLE `tblsubtipogeneral` (
  `Stg_id` int(11) NOT NULL,
  `Stg_nombre` varchar(45) NOT NULL,
  `Tge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblsubtipogeneral`
--

INSERT INTO `tblsubtipogeneral` (`Stg_id`, `Stg_nombre`, `Tge_id`) VALUES
(0, 'Cedula de Ciudadania', 0),
(1, 'Tarjeta de Identidad', 0),
(2, 'Cedula de Extranjeria', 0),
(3, 'Pasaporte', 0),
(4, 'Diseño nuevo', 3),
(5, 'Reimpresión con cambios', 3),
(6, 'Reimpresión sin cambios', 3),
(7, 'CMYK', 4),
(8, 'Solo Negro', 4),
(9, 'RIP N', 5),
(10, 'RIP D/P', 5),
(11, 'RIP A/R', 5),
(12, 'Manual', 1),
(13, 'Semi-automatica', 1),
(14, 'Automatica', 1),
(15, 'Compleja', 2),
(16, 'Mecanica', 2),
(17, 'Simple', 2),
(18, 'Termica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsustrato`
--

CREATE TABLE `tblsustrato` (
  `Sus_id` int(11) NOT NULL,
  `Pim_id` int(11) NOT NULL,
  `Sus_tamañoPliego` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Sus_cantidadSustrato` int(11) NOT NULL,
  `Sus_tamañoCorte` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Sus_tirajePedido` int(11) NOT NULL,
  `Sus_porcentajeDesperdicio` int(10) NOT NULL,
  `Sus_tirajeTotal` int(11) NOT NULL,
  `Arti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblsustrato`
--

INSERT INTO `tblsustrato` (`Sus_id`, `Pim_id`, `Sus_tamañoPliego`, `Sus_cantidadSustrato`, `Sus_tamañoCorte`, `Sus_tirajePedido`, `Sus_porcentajeDesperdicio`, `Sus_tirajeTotal`, `Arti_id`) VALUES
(1, 2, '90 x 79 cm', 10000, '20 x 50 cm', 4000, 5, 4200, 1),
(2, 2, '90 x 79 cm', 2000, '20 x 50 cm', 6000, 10, 6600, 2),
(3, 3, '90 x 79 cm', 10000, '20 x 50 cm', 6000, 5, 6300, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltarea`
--

CREATE TABLE `tbltarea` (
  `Tar_id` int(11) NOT NULL,
  `Tar_nombre` varchar(45) DEFAULT NULL,
  `Tar_descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltareaproceso`
--

CREATE TABLE `tbltareaproceso` (
  `Tpr_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `Tar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblterminado`
--

CREATE TABLE `tblterminado` (
  `Ter_id` int(11) NOT NULL,
  `Ter_descripcion` varchar(45) NOT NULL,
  `Eje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblterminado`
--

INSERT INTO `tblterminado` (`Ter_id`, `Ter_descripcion`, `Eje_id`) VALUES
(1, 'Refile', 4),
(2, 'Engomado', 4),
(3, 'Troquelado', 4),
(4, 'Grafado', 4),
(5, 'Repujado', 4),
(6, 'Empastado', 4),
(7, 'Libreta', 4),
(8, 'Pasta dura', 4),
(9, 'Despuntado', 4),
(10, 'Emblocado', 4),
(11, 'Rustica', 4),
(12, 'Talonario', 4),
(13, 'Hot meal', 4),
(14, 'Anillado', 4),
(15, 'Cosido', 4),
(16, 'Numerado', 4),
(17, 'Estampado', 4),
(18, 'Plegado', 4),
(19, 'Embolsado', 4),
(20, 'Fajado', 4),
(21, 'Desbasurado', 4),
(22, 'Perforado', 4),
(23, 'Plastificado Brillante', 4),
(24, 'Laminado Mate', 4),
(25, 'UV total', 4),
(26, 'Metalizado Foil', 4),
(27, 'Plastificado Opaco', 4),
(28, 'Laminado Brillante', 4),
(29, 'UV mate', 4),
(30, 'Cast and Cure', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoarticulo`
--

CREATE TABLE `tbltipoarticulo` (
  `Tart_id` int(11) NOT NULL,
  `Tart_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipoarticulo`
--

INSERT INTO `tbltipoarticulo` (`Tart_id`, `Tart_descripcion`) VALUES
(1, 'Materia prima'),
(2, 'Insumo'),
(3, 'Tinta'),
(4, 'Papel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoempresa`
--

CREATE TABLE `tbltipoempresa` (
  `Tempr_id` int(11) NOT NULL,
  `Tempr_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipoempresa`
--

INSERT INTO `tbltipoempresa` (`Tempr_id`, `Tempr_descripcion`) VALUES
(1, 'Cliente'),
(2, 'Proveedor'),
(3, 'Sena proveedor sena'),
(4, 'Sena auto-consumo'),
(5, 'Cliente externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipogeneral`
--

CREATE TABLE `tbltipogeneral` (
  `Tge_id` int(11) NOT NULL,
  `Tge_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipogeneral`
--

INSERT INTO `tbltipogeneral` (`Tge_id`, `Tge_nombre`) VALUES
(0, 'Tipo de Documento'),
(1, 'Tipo de Herramienta'),
(2, 'Tipo de Maquina'),
(3, 'Tipo diseño'),
(4, 'Tipo tinta'),
(5, 'Tipo rip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoterminado`
--

CREATE TABLE `tbltipoterminado` (
  `tter_id` int(11) NOT NULL,
  `Ter_id` int(11) NOT NULL,
  `tter_descripcion1` varchar(30) DEFAULT NULL,
  `tter_descripcion2` varchar(30) DEFAULT NULL,
  `Odp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipoterminado`
--

INSERT INTO `tbltipoterminado` (`tter_id`, `Ter_id`, `tter_descripcion1`, `tter_descripcion2`, `Odp_id`) VALUES
(1, 1, '', '', 1),
(2, 2, '', '', 1),
(3, 7, '', '', 1),
(4, 13, '', '', 1),
(5, 14, '', '', 1),
(6, 16, '0', '20', 1),
(7, 18, '4', '', 1),
(8, 22, '2', '', 1),
(9, 23, '', '', 1),
(10, 27, '', '', 1),
(11, 24, '', '', 1),
(12, 28, '', '', 1),
(13, 29, '', '', 1),
(14, 1, '', '', 2),
(15, 6, '', '', 2),
(16, 12, '', '', 2),
(17, 19, '', '', 2),
(18, 22, '', '', 2),
(19, 23, '', '', 2),
(20, 27, '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `Usu_id` int(11) NOT NULL,
  `Usu_primerNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_segundoNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_primerApellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_segundoApellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Stg_id` int(11) NOT NULL COMMENT 'subtipogeneral para colocarle el tipo de documento al usuario\n',
  `Usu_numeroDocumento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usu_password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Rol_id` int(11) NOT NULL,
  `Gen_id` int(11) NOT NULL,
  `Est_id` int(11) NOT NULL,
  `Area_id` int(2) NOT NULL,
  `Usu_token` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`Usu_id`, `Usu_primerNombre`, `Usu_segundoNombre`, `Usu_primerApellido`, `Usu_segundoApellido`, `Stg_id`, `Usu_numeroDocumento`, `Usu_telefono`, `Usu_email`, `Usu_password`, `Rol_id`, `Gen_id`, `Est_id`, `Area_id`, `Usu_token`) VALUES
(1, 'Jair', 'Alexander', 'Hernandez', 'Rosero', 0, '1144090162', '3235148081', 'jahernandez2610@misena.edu.co', '1144090162', 1, 1, 1, 1, '45r68huk8e73vbfjm0pa8iga07cwdfsf98xy1bl3n23c6tzoq'),
(2, 'adsasd', '', 'asdasd', '', 2, '123123123', '123123', 'asdas@gmail.com', '123123123', 2, 0, 1, 1, '2'),
(3, 'asdasd', '', 'asdasd', '', 2, '213123', '123123', 'alex@gmail.com', '213123', 3, 1, 1, 1, '213123'),
(4, 'Jhonatan', 'Javier', 'Zambrano', 'Zambrano', 0, '111000', '3168445287', 'zambranojhonatan20@gmail.com', '111000', 1, 1, 1, 2, '111000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblarea`
--
ALTER TABLE `tblarea`
  ADD PRIMARY KEY (`Area_id`);

--
-- Indices de la tabla `tblarticulo`
--
ALTER TABLE `tblarticulo`
  ADD PRIMARY KEY (`Arti_id`),
  ADD KEY `fk_TblArticulo_TblTipoArticulo1_idx` (`Tart_id`),
  ADD KEY `fk_TblArticulo_TblMedida1_idx` (`Med_id`),
  ADD KEY `fk_TblArticulo_TblEstado1` (`Est_id`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indices de la tabla `tblcentro`
--
ALTER TABLE `tblcentro`
  ADD PRIMARY KEY (`Cen_id`),
  ADD KEY `fk_Tcentro_Tregional1_idx` (`Reg_id`);

--
-- Indices de la tabla `tblcomprasinsumos`
--
ALTER TABLE `tblcomprasinsumos`
  ADD PRIMARY KEY (`com_NoItem`),
  ADD KEY `Cen_id` (`Cen_id`),
  ADD KEY `Soc_id` (`Soc_id`);

--
-- Indices de la tabla `tblcotizacion`
--
ALTER TABLE `tblcotizacion`
  ADD PRIMARY KEY (`Cot_id`),
  ADD KEY `fk_TCotizacion_TUsuario1_idx` (`Usu_id`);

--
-- Indices de la tabla `tbldepartamento`
--
ALTER TABLE `tbldepartamento`
  ADD PRIMARY KEY (`Dep_id`);

--
-- Indices de la tabla `tbldetalleinsumo`
--
ALTER TABLE `tbldetalleinsumo`
  ADD PRIMARY KEY (`Din_id`),
  ADD KEY `fk_TDetalleInsumo_TSolicitudeCompra1_idx` (`Sco_id`),
  ADD KEY `fk_TblDetalleInsumo_TblArticulo1_idx` (`Arti_id`);

--
-- Indices de la tabla `tbldetallemateriaprimacompra`
--
ALTER TABLE `tbldetallemateriaprimacompra`
  ADD PRIMARY KEY (`Dmp_id`),
  ADD KEY `fk_TDetalleMateriaPrimaCompra_TSolicitudeCompra1_idx` (`Soc_id`),
  ADD KEY `fk_TblDetalleMateriaPrimaCompra_TblArticulo1_idx` (`Arti_id`);

--
-- Indices de la tabla `tbldetallepedido`
--
ALTER TABLE `tbldetallepedido`
  ADD PRIMARY KEY (`Dpe_id`),
  ADD KEY `fk_DetallePedidoMaquina` (`Maq_id`),
  ADD KEY `fk_TDetallePedido_TPedido1` (`Ped_id`),
  ADD KEY `fk_TDetallePedido_TProductoBase1` (`Pba_id`);

--
-- Indices de la tabla `tbldetallepedidoempaque`
--
ALTER TABLE `tbldetallepedidoempaque`
  ADD PRIMARY KEY (`Dpem_id`),
  ADD KEY `fk_TDetPedidoEmpaque_TEmpcaque1_idx` (`Empa_id`),
  ADD KEY `fk_TDetPedidoEmpaque_TDetallePedido1_idx` (`Dpe_id`);

--
-- Indices de la tabla `tbldetallepedidomateriaprima`
--
ALTER TABLE `tbldetallepedidomateriaprima`
  ADD PRIMARY KEY (`Dpm_id`),
  ADD KEY `fk_TDetPedidoMateriaPrima_TDetallePedido1_idx` (`Dpe_id`),
  ADD KEY `fk_TblDetallePedidoMateriaPrima_TblArticulo1_idx` (`Arti_id`);

--
-- Indices de la tabla `tbldetallepedidoterminado`
--
ALTER TABLE `tbldetallepedidoterminado`
  ADD PRIMARY KEY (`Dpt_id`),
  ADD KEY `fk_DetallePedido` (`Dpe_id`),
  ADD KEY `fk_DetallePedidoTerminadoMaquina` (`Maq_id`),
  ADD KEY `fk_terminados` (`Ter_id`);

--
-- Indices de la tabla `tbldetallepedidotinta`
--
ALTER TABLE `tbldetallepedidotinta`
  ADD PRIMARY KEY (`Dpti_id`),
  ADD KEY `fk_DetallePedidoTinta` (`Dpe_id`),
  ADD KEY `fk_TintaArticulo` (`Arti_id`);

--
-- Indices de la tabla `tblejecucion`
--
ALTER TABLE `tblejecucion`
  ADD PRIMARY KEY (`Eje_id`);

--
-- Indices de la tabla `tblempaque`
--
ALTER TABLE `tblempaque`
  ADD PRIMARY KEY (`Empa_id`);

--
-- Indices de la tabla `tblempresa`
--
ALTER TABLE `tblempresa`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `fk_TEmpresa_TMunicipio1_idx` (`Mun_id`),
  ADD KEY `fk_TblEmpresa_TblTipoEmpresa1_idx` (`Tempr_id`),
  ADD KEY `fk_TblEmpresa_TblEstado1` (`Est_id`),
  ADD KEY `fk_TblEmpresa_TblSubTipoGeneral1` (`Stg_id`);

--
-- Indices de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`Est_id`);

--
-- Indices de la tabla `tblfirma`
--
ALTER TABLE `tblfirma`
  ADD PRIMARY KEY (`fir_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `tblformulario`
--
ALTER TABLE `tblformulario`
  ADD PRIMARY KEY (`For_id`),
  ADD KEY `fk_TFormulario_TSubtipoGeneral1_idx` (`Stg_id`),
  ADD KEY `fk_TFormulario_TMaquina1_idx` (`Maq_id`),
  ADD KEY `fk_TblFormulario_TblEmpresa1_idx` (`Emp_id`),
  ADD KEY `fk_TblFormulario_TblArticulo1_idx` (`Arti_id`);

--
-- Indices de la tabla `tblformularioherramienta`
--
ALTER TABLE `tblformularioherramienta`
  ADD PRIMARY KEY (`Fhe_id`),
  ADD KEY `fk_TFormularioHerramienta_THerramienta1_idx` (`Her_id`),
  ADD KEY `fk_TFormularioHerramienta_TFormulario1_idx` (`For_id`);

--
-- Indices de la tabla `tblformularioproceso`
--
ALTER TABLE `tblformularioproceso`
  ADD PRIMARY KEY (`Fpr_id`),
  ADD KEY `fk_TFormularioProceso_TFormulario1_idx` (`For_id`),
  ADD KEY `fk_TFormularioProceso_Tprocesos1_idx` (`Pro_id`);

--
-- Indices de la tabla `tblgenero`
--
ALTER TABLE `tblgenero`
  ADD PRIMARY KEY (`Gen_id`);

--
-- Indices de la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  ADD PRIMARY KEY (`Her_id`),
  ADD KEY `fk_THerramienta_TSubtipoGeneral1_idx` (`Stg_id`),
  ADD KEY `fk_THerramienta_TblEstado1_idx` (`Est_id`);

--
-- Indices de la tabla `tblimpresion`
--
ALTER TABLE `tblimpresion`
  ADD PRIMARY KEY (`Imp_id`),
  ADD KEY `fk_TOrdenProduccionImpresion_TMaquina1_idx` (`Maq_id`);

--
-- Indices de la tabla `tblmaquina`
--
ALTER TABLE `tblmaquina`
  ADD PRIMARY KEY (`Maq_id`),
  ADD KEY `fk_TMaquina_Estado1_idx` (`Est_id`),
  ADD KEY `fk_TMaquina_TSubtipoGeneral1_idx` (`Stg_id`);

--
-- Indices de la tabla `tblmaquinaterminado`
--
ALTER TABLE `tblmaquinaterminado`
  ADD PRIMARY KEY (`Mte_id`),
  ADD KEY `fk_TMaquinaTerminado_TMaquina1_idx` (`Maq_id`),
  ADD KEY `fk_TMaquinaTerminado_TTerminados1_idx` (`Ter_id`);

--
-- Indices de la tabla `tblmedida`
--
ALTER TABLE `tblmedida`
  ADD PRIMARY KEY (`Med_id`);

--
-- Indices de la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
  ADD PRIMARY KEY (`Mov_id`),
  ADD KEY `fk_TMovimiento_TSubtipoGeneral1_idx` (`Stg_id`);

--
-- Indices de la tabla `tblmunicipio`
--
ALTER TABLE `tblmunicipio`
  ADD PRIMARY KEY (`Mun_id`),
  ADD KEY `fk_TMunicipio_TDepartamento1_idx` (`Dep_id`);

--
-- Indices de la tabla `tblordenproduccion`
--
ALTER TABLE `tblordenproduccion`
  ADD PRIMARY KEY (`Odp_id`),
  ADD KEY `IdUsuario_idx` (`Usu_id`),
  ADD KEY `fk_TOrden_Produccion_TProductoTerminado1_idx` (`Pte_id`),
  ADD KEY `fk_TOrdenProduccion_TCliente1_idx` (`Emp_id`),
  ADD KEY `fk_TOrdenProduccion_TImpresion1_idx` (`Imp_id`),
  ADD KEY `fk_TOrdenProduccion_TPreImpreion1_idx` (`Pim_id`),
  ADD KEY `IdEstado` (`Odp_Estado`);

--
-- Indices de la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  ADD PRIMARY KEY (`Ped_id`),
  ADD KEY `fk_CenPedido` (`Cen_id`),
  ADD KEY `fk_DepPedido` (`Dep_id`),
  ADD KEY `fk_MunPedido` (`Mun_id`),
  ADD KEY `fk_TPedido_TCotizacion1` (`Cot_id`),
  ADD KEY `fk_tiposolicitud` (`Tempr_id`),
  ADD KEY `fk_TPedido_Estado1` (`Est_id`);

--
-- Indices de la tabla `tblpermiso`
--
ALTER TABLE `tblpermiso`
  ADD PRIMARY KEY (`Per_id`),
  ADD KEY `fk_Tpermiso_TMovimiento1_idx` (`Mov_id`);

--
-- Indices de la tabla `tblpliego`
--
ALTER TABLE `tblpliego`
  ADD PRIMARY KEY (`Pli_id`),
  ADD KEY `Stg_id` (`Stg_id`),
  ADD KEY `Pli_rip` (`Pli_rip`),
  ADD KEY `Imp_id` (`Imp_id`);

--
-- Indices de la tabla `tblpreimpreion`
--
ALTER TABLE `tblpreimpreion`
  ADD PRIMARY KEY (`Pim_id`),
  ADD KEY `Stg_id` (`Stg_id`);

--
-- Indices de la tabla `tblproceso`
--
ALTER TABLE `tblproceso`
  ADD PRIMARY KEY (`Pro_id`);

--
-- Indices de la tabla `tblproductobase`
--
ALTER TABLE `tblproductobase`
  ADD PRIMARY KEY (`Pba_id`),
  ADD KEY `fk_TProductoBase_TCategoria1_idx` (`Cat_id`);

--
-- Indices de la tabla `tblproductoterminado`
--
ALTER TABLE `tblproductoterminado`
  ADD PRIMARY KEY (`Pte_id`),
  ADD KEY `fk_TProductoTerminado_TProductoBase1_idx` (`Pba_id`);

--
-- Indices de la tabla `tblregional`
--
ALTER TABLE `tblregional`
  ADD PRIMARY KEY (`Reg_id`);

--
-- Indices de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD PRIMARY KEY (`Rol_id`);

--
-- Indices de la tabla `tblsolicitudecompra`
--
ALTER TABLE `tblsolicitudecompra`
  ADD PRIMARY KEY (`Soc_id`),
  ADD KEY `Reg_id` (`Reg_id`);

--
-- Indices de la tabla `tblsubtipogeneral`
--
ALTER TABLE `tblsubtipogeneral`
  ADD PRIMARY KEY (`Stg_id`),
  ADD KEY `fk_TSubtipoGeneral_TTipoGeneral1_idx` (`Tge_id`);

--
-- Indices de la tabla `tblsustrato`
--
ALTER TABLE `tblsustrato`
  ADD PRIMARY KEY (`Sus_id`),
  ADD KEY `fk_TblSustrato_TblArticulo1_idx` (`Arti_id`),
  ADD KEY `Pim_id` (`Pim_id`);

--
-- Indices de la tabla `tbltarea`
--
ALTER TABLE `tbltarea`
  ADD PRIMARY KEY (`Tar_id`);

--
-- Indices de la tabla `tbltareaproceso`
--
ALTER TABLE `tbltareaproceso`
  ADD PRIMARY KEY (`Tpr_id`),
  ADD KEY `fk_TtareasProcesos_Tprocesos1_idx` (`Pro_id`),
  ADD KEY `fk_TtareasProcesos_TTareas1_idx` (`Tar_id`);

--
-- Indices de la tabla `tblterminado`
--
ALTER TABLE `tblterminado`
  ADD PRIMARY KEY (`Ter_id`),
  ADD KEY `fk_TTerminados_TEjecucion1_idx` (`Eje_id`);

--
-- Indices de la tabla `tbltipoarticulo`
--
ALTER TABLE `tbltipoarticulo`
  ADD PRIMARY KEY (`Tart_id`);

--
-- Indices de la tabla `tbltipoempresa`
--
ALTER TABLE `tbltipoempresa`
  ADD PRIMARY KEY (`Tempr_id`);

--
-- Indices de la tabla `tbltipogeneral`
--
ALTER TABLE `tbltipogeneral`
  ADD PRIMARY KEY (`Tge_id`);

--
-- Indices de la tabla `tbltipoterminado`
--
ALTER TABLE `tbltipoterminado`
  ADD PRIMARY KEY (`tter_id`),
  ADD KEY `Ter_id` (`Ter_id`),
  ADD KEY `Odp_id` (`Odp_id`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`Usu_id`),
  ADD KEY `fk_TUser_TRol1_idx` (`Rol_id`),
  ADD KEY `fk_TUser_TSubtipoGeneral1_idx` (`Stg_id`),
  ADD KEY `fk_TblUsuario_TblGenero1_idx` (`Gen_id`),
  ADD KEY `fk_TblUsuario_TblEstado1_idx` (`Est_id`),
  ADD KEY `fk_TblUsuario_TblArea1` (`Area_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblarea`
--
ALTER TABLE `tblarea`
  MODIFY `Area_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `Cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcentro`
--
ALTER TABLE `tblcentro`
  MODIFY `Cen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblcomprasinsumos`
--
ALTER TABLE `tblcomprasinsumos`
  MODIFY `com_NoItem` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcotizacion`
--
ALTER TABLE `tblcotizacion`
  MODIFY `Cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbldetalleinsumo`
--
ALTER TABLE `tbldetalleinsumo`
  MODIFY `Din_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldetallemateriaprimacompra`
--
ALTER TABLE `tbldetallemateriaprimacompra`
  MODIFY `Dmp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldetallepedido`
--
ALTER TABLE `tbldetallepedido`
  MODIFY `Dpe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `tbldetallepedidoempaque`
--
ALTER TABLE `tbldetallepedidoempaque`
  MODIFY `Dpem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldetallepedidomateriaprima`
--
ALTER TABLE `tbldetallepedidomateriaprima`
  MODIFY `Dpm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblejecucion`
--
ALTER TABLE `tblejecucion`
  MODIFY `Eje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblempaque`
--
ALTER TABLE `tblempaque`
  MODIFY `Empa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  MODIFY `Her_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblmaquina`
--
ALTER TABLE `tblmaquina`
  MODIFY `Maq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmaquinaterminado`
--
ALTER TABLE `tblmaquinaterminado`
  MODIFY `Mte_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
  MODIFY `Mov_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  MODIFY `Ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `tblpermiso`
--
ALTER TABLE `tblpermiso`
  MODIFY `Per_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproductobase`
--
ALTER TABLE `tblproductobase`
  MODIFY `Pba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblregional`
--
ALTER TABLE `tblregional`
  MODIFY `Reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  MODIFY `Rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblsolicitudecompra`
--
ALTER TABLE `tblsolicitudecompra`
  MODIFY `Soc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblterminado`
--
ALTER TABLE `tblterminado`
  MODIFY `Ter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `Usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblarticulo`
--
ALTER TABLE `tblarticulo`
  ADD CONSTRAINT `fk_TblArticulo_TblEstado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblArticulo_TblMedida1` FOREIGN KEY (`Med_id`) REFERENCES `tblmedida` (`Med_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblArticulo_TblTipoArticulo1` FOREIGN KEY (`Tart_id`) REFERENCES `tbltipoarticulo` (`Tart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblcentro`
--
ALTER TABLE `tblcentro`
  ADD CONSTRAINT `fk_Tcentro_Tregional1` FOREIGN KEY (`Reg_id`) REFERENCES `tblregional` (`Reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblcomprasinsumos`
--
ALTER TABLE `tblcomprasinsumos`
  ADD CONSTRAINT `tblcomprasinsumos_ibfk_1` FOREIGN KEY (`Cen_id`) REFERENCES `tblcentro` (`Cen_id`),
  ADD CONSTRAINT `tblcomprasinsumos_ibfk_2` FOREIGN KEY (`Soc_id`) REFERENCES `tblsolicitudecompra` (`Soc_id`);

--
-- Filtros para la tabla `tblcotizacion`
--
ALTER TABLE `tblcotizacion`
  ADD CONSTRAINT `fk_TCotizacion_TUsuario1` FOREIGN KEY (`Usu_id`) REFERENCES `tblusuario` (`Usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetalleinsumo`
--
ALTER TABLE `tbldetalleinsumo`
  ADD CONSTRAINT `fk_TDetalleInsumo_TSolicitudeCompra1` FOREIGN KEY (`Sco_id`) REFERENCES `tblsolicitudecompra` (`Soc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblDetalleInsumo_TblArticulo1` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetallemateriaprimacompra`
--
ALTER TABLE `tbldetallemateriaprimacompra`
  ADD CONSTRAINT `fk_TDetalleMateriaPrimaCompra_TSolicitudeCompra1` FOREIGN KEY (`Soc_id`) REFERENCES `tblsolicitudecompra` (`Soc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblDetalleMateriaPrimaCompra_TblArticulo1` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetallepedido`
--
ALTER TABLE `tbldetallepedido`
  ADD CONSTRAINT `fk_DetallePedidoMaquina` FOREIGN KEY (`Maq_id`) REFERENCES `tblmaquina` (`Maq_id`),
  ADD CONSTRAINT `fk_TDetallePedido_TPedido1` FOREIGN KEY (`Ped_id`) REFERENCES `tblpedido` (`Ped_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TDetallePedido_TProductoBase1` FOREIGN KEY (`Pba_id`) REFERENCES `tblproductobase` (`Pba_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetallepedidoempaque`
--
ALTER TABLE `tbldetallepedidoempaque`
  ADD CONSTRAINT `fk_TDetPedidoEmpaque_TDetallePedido1` FOREIGN KEY (`Dpe_id`) REFERENCES `tbldetallepedido` (`Dpe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TDetPedidoEmpaque_TEmpcaque1` FOREIGN KEY (`Empa_id`) REFERENCES `tblempaque` (`Empa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetallepedidomateriaprima`
--
ALTER TABLE `tbldetallepedidomateriaprima`
  ADD CONSTRAINT `fk_TDetPedidoMateriaPrima_TDetallePedido1` FOREIGN KEY (`Dpe_id`) REFERENCES `tbldetallepedido` (`Dpe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblDetallePedidoMateriaPrima_TblArticulo1` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbldetallepedidoterminado`
--
ALTER TABLE `tbldetallepedidoterminado`
  ADD CONSTRAINT `fk_DetallePedido` FOREIGN KEY (`Dpe_id`) REFERENCES `tbldetallepedido` (`Dpe_id`),
  ADD CONSTRAINT `fk_DetallePedidoTerminadoMaquina` FOREIGN KEY (`Maq_id`) REFERENCES `tblmaquina` (`Maq_id`),
  ADD CONSTRAINT `fk_terminados` FOREIGN KEY (`Ter_id`) REFERENCES `tblterminado` (`Ter_id`);

--
-- Filtros para la tabla `tbldetallepedidotinta`
--
ALTER TABLE `tbldetallepedidotinta`
  ADD CONSTRAINT `fk_DetallePedidoTinta` FOREIGN KEY (`Dpe_id`) REFERENCES `tbldetallepedido` (`Dpe_id`),
  ADD CONSTRAINT `fk_TintaArticulo` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`);

--
-- Filtros para la tabla `tblempresa`
--
ALTER TABLE `tblempresa`
  ADD CONSTRAINT `fk_TEmpresa_TMunicipio1` FOREIGN KEY (`Mun_id`) REFERENCES `tblmunicipio` (`Mun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblEmpresa_TblEstado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblEmpresa_TblSubTipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblEmpresa_TblTipoEmpresa1` FOREIGN KEY (`Tempr_id`) REFERENCES `tbltipoempresa` (`Tempr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfirma`
--
ALTER TABLE `tblfirma`
  ADD CONSTRAINT `usu_id` FOREIGN KEY (`usu_id`) REFERENCES `tblusuario` (`Usu_id`);

--
-- Filtros para la tabla `tblformulario`
--
ALTER TABLE `tblformulario`
  ADD CONSTRAINT `fk_TFormulario_TMaquina1` FOREIGN KEY (`Maq_id`) REFERENCES `tblmaquina` (`Maq_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TFormulario_TSubtipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblFormulario_TblArticulo1` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblFormulario_TblEmpresa1` FOREIGN KEY (`Emp_id`) REFERENCES `tblempresa` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblformularioherramienta`
--
ALTER TABLE `tblformularioherramienta`
  ADD CONSTRAINT `fk_TFormularioHerramienta_TFormulario1` FOREIGN KEY (`For_id`) REFERENCES `tblformulario` (`For_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TFormularioHerramienta_THerramienta1` FOREIGN KEY (`Her_id`) REFERENCES `tblherramienta` (`Her_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblformularioproceso`
--
ALTER TABLE `tblformularioproceso`
  ADD CONSTRAINT `fk_TFormularioProceso_TFormulario1` FOREIGN KEY (`For_id`) REFERENCES `tblformulario` (`For_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TFormularioProceso_Tprocesos1` FOREIGN KEY (`Pro_id`) REFERENCES `tblproceso` (`Pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  ADD CONSTRAINT `fk_THerramienta_TSubtipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_THerramienta_TblEstado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblimpresion`
--
ALTER TABLE `tblimpresion`
  ADD CONSTRAINT `fk_TOrdenProduccionImpresion_TMaquina1` FOREIGN KEY (`Maq_id`) REFERENCES `tblmaquina` (`Maq_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmaquina`
--
ALTER TABLE `tblmaquina`
  ADD CONSTRAINT `fk_TMaquina_Estado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TMaquina_TSubtipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmaquinaterminado`
--
ALTER TABLE `tblmaquinaterminado`
  ADD CONSTRAINT `fk_TMaquinaTerminado_TMaquina1` FOREIGN KEY (`Maq_id`) REFERENCES `tblmaquina` (`Maq_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TMaquinaTerminado_TTerminados1` FOREIGN KEY (`Ter_id`) REFERENCES `tblterminado` (`Ter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
  ADD CONSTRAINT `fk_TMovimiento_TSubtipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmunicipio`
--
ALTER TABLE `tblmunicipio`
  ADD CONSTRAINT `fk_TMunicipio_TDepartamento1` FOREIGN KEY (`Dep_id`) REFERENCES `tbldepartamento` (`Dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblordenproduccion`
--
ALTER TABLE `tblordenproduccion`
  ADD CONSTRAINT `IdEstado` FOREIGN KEY (`Odp_Estado`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdUsuario` FOREIGN KEY (`Usu_id`) REFERENCES `tblusuario` (`Usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  ADD CONSTRAINT `fk_CenPedido` FOREIGN KEY (`Cen_id`) REFERENCES `tblcentro` (`Cen_id`),
  ADD CONSTRAINT `fk_DepPedido` FOREIGN KEY (`Dep_id`) REFERENCES `tbldepartamento` (`Dep_id`),
  ADD CONSTRAINT `fk_MunPedido` FOREIGN KEY (`Mun_id`) REFERENCES `tblmunicipio` (`Mun_id`),
  ADD CONSTRAINT `fk_TPedido_Estado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TPedido_TCotizacion1` FOREIGN KEY (`Cot_id`) REFERENCES `tblcotizacion` (`Cot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tiposolicitud` FOREIGN KEY (`Tempr_id`) REFERENCES `tbltipoempresa` (`Tempr_id`);

--
-- Filtros para la tabla `tblpermiso`
--
ALTER TABLE `tblpermiso`
  ADD CONSTRAINT `fk_Tpermiso_TMovimiento1` FOREIGN KEY (`Mov_id`) REFERENCES `tblmovimiento` (`Mov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpliego`
--
ALTER TABLE `tblpliego`
  ADD CONSTRAINT `tblpliego_ibfk_1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`),
  ADD CONSTRAINT `tblpliego_ibfk_2` FOREIGN KEY (`Pli_rip`) REFERENCES `tblsubtipogeneral` (`Stg_id`),
  ADD CONSTRAINT `tblpliego_ibfk_3` FOREIGN KEY (`Imp_id`) REFERENCES `tblimpresion` (`Imp_id`);

--
-- Filtros para la tabla `tblpreimpreion`
--
ALTER TABLE `tblpreimpreion`
  ADD CONSTRAINT `tblpreimpreion_ibfk_1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`);

--
-- Filtros para la tabla `tblproductobase`
--
ALTER TABLE `tblproductobase`
  ADD CONSTRAINT `fk_TProductoBase_TCategoria1` FOREIGN KEY (`Cat_id`) REFERENCES `tblcategoria` (`Cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproductoterminado`
--
ALTER TABLE `tblproductoterminado`
  ADD CONSTRAINT `fk_TProductoTerminado_TProductoBase1` FOREIGN KEY (`Pba_id`) REFERENCES `tblproductobase` (`Pba_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblsolicitudecompra`
--
ALTER TABLE `tblsolicitudecompra`
  ADD CONSTRAINT `tblsolicitudecompra_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `tblregional` (`Reg_id`);

--
-- Filtros para la tabla `tblsubtipogeneral`
--
ALTER TABLE `tblsubtipogeneral`
  ADD CONSTRAINT `fk_TSubtipoGeneral_TTipoGeneral1` FOREIGN KEY (`Tge_id`) REFERENCES `tbltipogeneral` (`Tge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblsustrato`
--
ALTER TABLE `tblsustrato`
  ADD CONSTRAINT `fk_TblSustrato_TblArticulo1` FOREIGN KEY (`Arti_id`) REFERENCES `tblarticulo` (`Arti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblsustrato_ibfk_1` FOREIGN KEY (`Pim_id`) REFERENCES `tblpreimpreion` (`Pim_id`);

--
-- Filtros para la tabla `tbltareaproceso`
--
ALTER TABLE `tbltareaproceso`
  ADD CONSTRAINT `fk_TtareasProcesos_TTareas1` FOREIGN KEY (`Tar_id`) REFERENCES `tbltarea` (`Tar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TtareasProcesos_Tprocesos1` FOREIGN KEY (`Pro_id`) REFERENCES `tblproceso` (`Pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblterminado`
--
ALTER TABLE `tblterminado`
  ADD CONSTRAINT `fk_TTerminados_TEjecucion1` FOREIGN KEY (`Eje_id`) REFERENCES `tblejecucion` (`Eje_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `fk_TUser_TSubtipoGeneral1` FOREIGN KEY (`Stg_id`) REFERENCES `tblsubtipogeneral` (`Stg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblUsuario_TblArea1` FOREIGN KEY (`Area_id`) REFERENCES `tblarea` (`Area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblUsuario_TblEstado1` FOREIGN KEY (`Est_id`) REFERENCES `tblestado` (`Est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblUsuario_TblGenero1` FOREIGN KEY (`Gen_id`) REFERENCES `tblgenero` (`Gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TblUsuario_TblRol1` FOREIGN KEY (`Rol_id`) REFERENCES `tblrol` (`Rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
