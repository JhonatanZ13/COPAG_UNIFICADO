-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 15:52:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `copia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizoBitacora` (IN `art` VARCHAR(255) CHARSET utf8, IN `c` INT, IN `cDespues` INT)  BEGIN
    INSERT INTO tblbitentrada
VALUES(
    fContador(),CURRENT_USER(), NOW(), "tipo_id", "Actualizo ", CONCAT(
        "Se actualizó la cantidad de ",
        art,
        " paso de: ",
        c,
        " a: ",
        cDespues,
        " unidades"
    ));
    END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fContador` () RETURNS INT(11) BEGIN
    DECLARE
        contador INT;
    SELECT
        COUNT(bitcod)
    INTO contador
FROM
    tblbitentrada;
    RETURN contador +1;
END$$

DELIMITER ;

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
(2, 'Produccion'),
(3, 'Mantenimiento'),
(4, 'Costos'),
(5, 'Control Total');

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
  `Arti_descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Arti_cantidad` int(5) NOT NULL,
  `Est_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tblarticulo`
--

INSERT INTO `tblarticulo` (`Arti_id`, `Arti_nombre`, `Tart_id`, `Arti_medida`, `Med_id`, `Arti_imagen`, `Arti_descripcion`, `Arti_cantidad`, `Est_id`) VALUES
(1, 'Reprograff', 4, '20', 1, '../web/images/Articulo/logo_sena.png', 'resma de papel reprograf', 4, 0),
(2, 'Papelillo', 2, '12', 1, '../web/images/Articulo/', 'no tiene', 1, 0),
(3, 'Carton', 1, '20 x 20', 1, '../web/images/pictureDefault.png', 'carton de colombia', 0, 1),
(4, 'Colbon', 2, '30', 4, '../web/images/pictureDefault.png', 'Colbon de colombia', 1, 0),
(7, 'Magenta', 3, '10', 5, '../web/images/pictureDefault.png', 'Tinta para pintar', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbitentrada`
--

CREATE TABLE `tblbitentrada` (
  `bitcod` int(11) NOT NULL,
  `bituser` varchar(30) DEFAULT NULL,
  `bitfecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bittabla` varchar(255) DEFAULT NULL,
  `bitaccion` varchar(255) DEFAULT NULL,
  `bitdesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblbitentrada`
--

INSERT INTO `tblbitentrada` (`bitcod`, `bituser`, `bitfecha`, `bittabla`, `bitaccion`, `bitdesc`) VALUES
(1, 'root@localhost', '2021-06-03 04:48:49', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 46 a: 47 unidades'),
(2, 'root@localhost', '2021-06-05 22:00:06', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 47 a: 48 unidades'),
(3, 'root@localhost', '2021-06-08 03:19:38', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 48 a: 60 unidades'),
(4, 'root@localhost', '2021-06-08 03:19:38', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Tinta EPSON paso de: 50 a: 60 unidades'),
(5, 'root@localhost', '2021-06-08 03:41:06', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 60 a: 1 unidades'),
(6, 'root@localhost', '2021-06-08 03:44:14', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 1 a: 1 unidades'),
(7, 'root@localhost', '2021-06-08 03:44:26', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Reprograf paso de: 1 a: 1 unidades'),
(8, 'root@localhost', '2021-06-08 03:46:27', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Tinta EPSON paso de: 60 a: 1 unidades'),
(9, 'root@localhost', '2021-06-08 03:46:33', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Tinta EPSON paso de: 1 a: 1 unidades'),
(10, 'root@localhost', '2021-06-08 03:46:40', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Tinta EPSON paso de: 1 a: 2 unidades'),
(11, 'root@localhost', '2021-06-08 03:46:44', 'tipo_id', 'Actualizo ', 'Se actualizó la cantidad de Tinta EPSON paso de: 2 a: 2 unidades');

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
  `Cen_nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cen_telefono` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cen_direccion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
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
  `com_Cantidad` int(40) NOT NULL,
  `com_Observaciones` varchar(100) NOT NULL,
  `Soc_id` int(11) NOT NULL,
  `Pba_id` int(11) NOT NULL,
  `Med_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcomprasinsumos`
--

INSERT INTO `tblcomprasinsumos` (`com_NoItem`, `com_Cantidad`, `com_Observaciones`, `Soc_id`, `Pba_id`, `Med_id`) VALUES
(1, 655, 'gfg', 1, 1, 1);

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
(2, '2021-06-20', 1),
(3, '2021-06-22', 1),
(4, '2021-06-26', 1),
(5, '2021-06-28', 1);

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
(3, 'sadasd', 12, 1000, 12000, 40, '3434', '23', '50', 1439.15, 57566, 52000, 5566, 566, 'funcionario', 103, 1, 1),
(4, '4dfd', NULL, NULL, NULL, 343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 108, 3, NULL),
(5, 'dfdf', 4000, 2000, 8000000, 4554, '34', '33', '43', 0.21958717610892, 1000, 0, 1000, 1000, 'Aprendiz', 109, 2, 3),
(6, 'gfg', NULL, NULL, NULL, 545, '', '', '4545', 835.69541284404, 455454, 0, 455454, 455454, '0', 110, 1, NULL);

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
(2, NULL, 3, '08374hj', 10, 'Kg', 100, 1000, 'ESPECIAL'),
(3, NULL, 5, 'No aplica', NULL, 'NULL', NULL, NULL, 'BASICA'),
(4, NULL, 6, 'No aplica', NULL, 'NULL', NULL, NULL, 'BASICA');

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
('1', 'CAI centro agropecuario internacional', '123-4', 'cai@cai.gov.co', 'av 5 norte 10', 'jhonatan', 'zambrano', 1009, '1144060265', '3122321070', '3235148081', 1, 1, 0),
('2', 'Mantenimiento SAS', '000012344', 'asdsd@misena.edu.co', 'TRANSVERSAL 2A #6-71', 'JULIAN', 'ZAMBRANO', 1009, '32323', '3163995722', '23223', 1, 6, 0);

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
(10, 'No aprobado - cotizacion', ''),
(11, 'Mantenimiento', 'Estado para la maquina'),
(12, 'Solicitud-pendiente envio', NULL),
(13, 'En Espera Para Mantenimiento', 'En Espera Para Mantenimiento'),
(14, 'Para Produccion', 'Para Produccion');

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
(6, 'Director General CDTI', '../web/images/Firma/firma.png', 4);

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
(1, 'Hombre'),
(2, 'Otro');

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
(1, 'Martillo', 'martillo deWall', 1, '../web/images/pictureDefault.png', 12, 0),
(2, 'Taladro', 'Taladro deWall', 1, '../web/images/pictureDefault.png', 13, 1);

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
(3, 2, '20 x 40 cm', 'Jhonatan', 'fgdfg'),
(4, 2, '20 x 40 cm', 'Jhonatan', 'fd'),
(5, 1, '20 x 40 cm', 'ccx', 'cx');

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
(1, 'Oliver', 0x313235623362352d6b, 'The Oliver Typewriter Company (en español: La', '../web/images/Maquina/Bienvenido2.png', 1, 11, 18, '../web/images/Maquina/Ficha/OrdenProduccion_3.pdf', '../web/images/Maquina/Manual/OrdenProduccion_3.pdf'),
(2, 'Sakurai', 0x3132332d6838, 'Año 1994\r\nModelo SC-102AⅡ\r\ncondiciones de tra', '../web/images/Maquina/', 1, 11, 16, '../web/images/Maquina/Ficha/ficha tecnica.pdf', '../web/images/Maquina/Manual/20170227-Manual Artes Graficas.pdf'),
(3, 'Tampoprint', 0x3131682d6b31323030, 'Tampoprint Entrance 90 año 2015 Maquina de ta', '../web/images/pictureDefault.png', 1, 0, 15, '../web/images/Maquina/Ficha/', '../web/images/Maquina/Manual/'),
(4, 'oliver twin', 0x31323334, 'no aplica', '../web/images/Maquina/Bienvenido2.png', 1, 1, 15, '../web/images/Maquina/Ficha/2-Ada_in_Action.pdf', '../web/images/Maquina/Manual/3-AdaDistilled.pdf');

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
(2, 'Cg- centrigramo'),
(3, 'Cm - Centimetro'),
(4, 'Gm - Gramos'),
(5, 'Ml - Mililitros');

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
(1, 'Medellin', 1),
(2, 'Abejorral', 1),
(3, 'Abriaqui', 1),
(4, 'Alejandria', 1),
(5, 'Amaga', 1),
(6, 'Amalfi', 1),
(7, 'Andes', 1),
(8, 'Angelopolis', 1),
(9, 'Angostura', 1),
(10, 'Anori', 1),
(11, 'Antioquia', 1),
(12, 'Anza', 1),
(13, 'Apartado', 1),
(14, 'Arboletes', 1),
(15, 'Argelia', 1),
(16, 'Armenia', 1),
(17, 'Barbosa', 1),
(18, 'Belmira', 1),
(19, 'Bello', 1),
(20, 'Betania', 1),
(21, 'Betulia', 1),
(22, 'Bolivar', 1),
(23, 'Brice�?O', 1),
(24, 'Buritica', 1),
(25, 'Caceres', 1),
(26, 'Caicedo', 1),
(27, 'Caldas', 1),
(28, 'Campamento', 1),
(29, 'Ca�?Asgordas', 1),
(30, 'Caracoli', 1),
(31, 'Caramanta', 1),
(32, 'Carepa', 1),
(33, 'Carmen De Viboral', 1),
(34, 'Carolina', 1),
(35, 'Caucasia', 1),
(36, 'Chigorodo', 1),
(37, 'Cisneros', 1),
(38, 'Cocorna', 1),
(39, 'Concepcion', 1),
(40, 'Concordia', 1),
(41, 'Copacabana', 1),
(42, 'Dabeiba', 1),
(43, 'Don Matias', 1),
(44, 'Ebejico', 1),
(45, 'El Bagre', 1),
(46, 'Entrerrios', 1),
(47, 'Envigado', 1),
(48, 'Fredonia', 1),
(49, 'Frontino', 1),
(50, 'Giraldo', 1),
(51, 'Girardota', 1),
(52, 'Gomez Plata', 1),
(53, 'Granada', 1),
(54, 'Guadalupe', 1),
(55, 'Guarne', 1),
(56, 'Guatape', 1),
(57, 'Heliconia', 1),
(58, 'Hispania', 1),
(59, 'Itagui', 1),
(60, 'Ituango', 1),
(61, 'Jardin', 1),
(62, 'Jerico', 1),
(63, 'La Ceja', 1),
(64, 'La Estrella', 1),
(65, 'La Pintada', 1),
(66, 'La Union', 1),
(67, 'Liborina', 1),
(68, 'Maceo', 1),
(69, 'Marinilla', 1),
(70, 'Montebello', 1),
(71, 'Murindo', 1),
(72, 'Mutata', 1),
(73, 'Nari�?O', 1),
(74, 'Necocli', 1),
(75, 'Nechi', 1),
(76, 'Olaya', 1),
(77, 'Pe�?Ol', 1),
(78, 'Peque', 1),
(79, 'Pueblorrico', 1),
(80, 'Puerto Berrio', 1),
(81, 'Puerto Nare (La Magdalena)', 1),
(82, 'Puerto Triunfo', 1),
(83, 'Remedios', 1),
(84, 'Retiro', 1),
(85, 'Rionegro', 1),
(86, 'Sabanalarga', 1),
(87, 'Sabaneta', 1),
(88, 'Salgar', 1),
(89, 'San Andres', 1),
(90, 'San Carlos', 1),
(91, 'San Francisco', 1),
(92, 'San Jeronimo', 1),
(93, 'San Jose De La Monta�?A', 1),
(94, 'San Juan De Uraba', 1),
(95, 'San Luis', 1),
(96, 'San Pedro', 1),
(97, 'San Pedro De Uraba', 1),
(98, 'San Rafael', 1),
(99, 'San Roque', 1),
(100, 'San Vicente', 1),
(101, 'Santa Barbara', 1),
(102, 'Santa Rosa De Osos', 1),
(103, 'Santo Domingo', 1),
(104, 'Santuario', 1),
(105, 'Segovia', 1),
(106, 'Sonson', 1),
(107, 'Sopetran', 1),
(108, 'Tamesis', 1),
(109, 'Taraza', 1),
(110, 'Tarso', 1),
(111, 'Titiribi', 1),
(112, 'Toledo', 1),
(113, 'Turbo', 1),
(114, 'Uramita', 1),
(115, 'Urrao', 1),
(116, 'Valdivia', 1),
(117, 'Valparaiso', 1),
(118, 'Vegachi', 1),
(119, 'Venecia', 1),
(120, 'Vigia Del Fuerte', 1),
(121, 'Yali', 1),
(122, 'Yarumal', 1),
(123, 'Yolombo', 1),
(124, 'Yondo', 1),
(125, 'Zaragoza', 1),
(126, 'Barranquilla (Distrito Especial Industrial Y Portuario De Barranquilla)', 2),
(127, 'Baranoa', 2),
(128, 'Campo De La Cruz', 2),
(129, 'Candelaria', 2),
(130, 'Galapa', 2),
(131, 'Juan De Acosta', 2),
(132, 'Luruaco', 2),
(133, 'Malambo', 2),
(134, 'Manati', 2),
(135, 'Palmar De Varela', 2),
(136, 'Piojo', 2),
(137, 'Polo Nuevo', 2),
(138, 'Ponedera', 2),
(139, 'Puerto Colombia', 2),
(140, 'Repelon', 2),
(141, 'Sabanagrande', 2),
(142, 'Sabanalarga', 2),
(143, 'Santa Lucia', 2),
(144, 'Santo Tomas', 2),
(145, 'Soledad', 2),
(146, 'Suan', 2),
(147, 'Tubara', 2),
(148, 'Usiacuri', 2),
(149, 'Santa Fe De Bogotƭ', 3),
(150, 'Usaquen', 3),
(151, 'Chapinero', 3),
(152, 'Santa Fe', 3),
(153, 'San Cristobal', 3),
(154, 'Usme', 3),
(155, 'Tunjuelito', 3),
(156, 'Bosa', 3),
(157, 'Kennedy', 3),
(158, 'Fontibon', 3),
(159, 'Engativa', 3),
(160, 'Suba', 3),
(161, 'Barrios Unidos', 3),
(162, 'Teusaquillo', 3),
(163, 'Martires', 3),
(164, 'Antonio Nari�?O', 3),
(165, 'Puente Aranda', 3),
(166, 'Candelaria', 3),
(167, 'Rafael Uribe', 3),
(168, 'Ciudad Bolivar', 3),
(169, 'Sumapaz', 3),
(170, 'Cartagena (Distrito Turistico Y Cultural De Cartagena)', 4),
(171, 'Achi', 4),
(172, 'Altos Del Rosario', 4),
(173, 'Arenal', 4),
(174, 'Arjona', 4),
(175, 'Arroyohondo', 4),
(176, 'Barranco De Loba', 4),
(177, 'Calamar', 4),
(178, 'Cantagallo', 4),
(179, 'Cicuco', 4),
(180, 'Cordoba', 4),
(181, 'Clemencia', 4),
(182, 'El Carmen De Bolivar', 4),
(183, 'El Guamo', 4),
(184, 'El Pe�?On', 4),
(185, 'Hatillo De Loba', 4),
(186, 'Magangue', 4),
(187, 'Mahates', 4),
(188, 'Margarita', 4),
(189, 'Maria La Baja', 4),
(190, 'Montecristo', 4),
(191, 'Mompos', 4),
(192, 'Morales', 4),
(193, 'Pinillos', 4),
(194, 'Regidor', 4),
(195, 'Rio Viejo', 4),
(196, 'San Cristobal', 4),
(197, 'San Estanislao', 4),
(198, 'San Fernando', 4),
(199, 'San Jacinto', 4),
(200, 'San Jacinto Del Cauca', 4),
(201, 'San Juan Nepomuceno', 4),
(202, 'San Martin De Loba', 4),
(203, 'San Pablo', 4),
(204, 'Santa Catalina', 4),
(205, 'Santa Rosa', 4),
(206, 'Santa Rosa Del Sur', 4),
(207, 'Simiti', 4),
(208, 'Soplaviento', 4),
(209, 'Talaigua Nuevo', 4),
(210, 'Tiquisio (Puerto Rico)', 4),
(211, 'Turbaco', 4),
(212, 'Turbana', 4),
(213, 'Villanueva', 4),
(214, 'Zambrano', 4),
(215, 'Tunja', 5),
(216, 'Almeida', 5),
(217, 'Aquitania', 5),
(218, 'Arcabuco', 5),
(219, 'Belen', 5),
(220, 'Berbeo', 5),
(221, 'Beteitiva', 5),
(222, 'Boavita', 5),
(223, 'Boyaca', 5),
(224, 'Brice�?O', 5),
(225, 'Buenavista', 5),
(226, 'Busbanza', 5),
(227, 'Caldas', 5),
(228, 'Campohermoso', 5),
(229, 'Cerinza', 5),
(230, 'Chinavita', 5),
(231, 'Chiquinquira', 5),
(232, 'Chiscas', 5),
(233, 'Chita', 5),
(234, 'Chitaraque', 5),
(235, 'Chivata', 5),
(236, 'Cienega', 5),
(237, 'Combita', 5),
(238, 'Coper', 5),
(239, 'Corrales', 5),
(240, 'Covarachia', 5),
(241, 'Cubara', 5),
(242, 'Cucaita', 5),
(243, 'Cuitiva', 5),
(244, 'Chiquiza', 5),
(245, 'Chivor', 5),
(246, 'Duitama', 5),
(247, 'El Cocuy', 5),
(248, 'El Espino', 5),
(249, 'Firavitoba', 5),
(250, 'Floresta', 5),
(251, 'Gachantiva', 5),
(252, 'Gameza', 5),
(253, 'Garagoa', 5),
(254, 'Guacamayas', 5),
(255, 'Guateque', 5),
(256, 'Guayata', 5),
(257, 'Guican', 5),
(258, 'Iza', 5),
(259, 'Jenesano', 5),
(260, 'Jerico', 5),
(261, 'Labranzagrande', 5),
(262, 'La Capilla', 5),
(263, 'La Victoria', 5),
(264, 'La Uvita', 5),
(265, 'Villa De Leiva', 5),
(266, 'Macanal', 5),
(267, 'Maripi', 5),
(268, 'Miraflores', 5),
(269, 'Mongua', 5),
(270, 'Mongui', 5),
(271, 'Moniquira', 5),
(272, 'Motavita', 5),
(273, 'Muzo', 5),
(274, 'Nobsa', 5),
(275, 'Nuevo Colon', 5),
(276, 'Oicata', 5),
(277, 'Otanche', 5),
(278, 'Pachavita', 5),
(279, 'Paez', 5),
(280, 'Paipa', 5),
(281, 'Pajarito', 5),
(282, 'Panqueba', 5),
(283, 'Pauna', 5),
(284, 'Paya', 5),
(285, 'Paz Del Rio', 5),
(286, 'Pesca', 5),
(287, 'Pisba', 5),
(288, 'Puerto Boyaca', 5),
(289, 'Quipama', 5),
(290, 'Ramiriqui', 5),
(291, 'Raquira', 5),
(292, 'Rondon', 5),
(293, 'Saboya', 5),
(294, 'Sachica', 5),
(295, 'Samaca', 5),
(296, 'San Eduardo', 5),
(297, 'San Jose De Pare', 5),
(298, 'San Luis De Gaceno', 5),
(299, 'San Mateo', 5),
(300, 'San Miguel De Sema', 5),
(301, 'San Pablo De Borbur', 5),
(302, 'Santana', 5),
(303, 'Santa Maria', 5),
(304, 'Santa Rosa De Viterbo', 5),
(305, 'Santa Sofia', 5),
(306, 'Sativanorte', 5),
(307, 'Sativasur', 5),
(308, 'Siachoque', 5),
(309, 'Soata', 5),
(310, 'Socota', 5),
(311, 'Socha', 5),
(312, 'Sogamoso', 5),
(313, 'Somondoco', 5),
(314, 'Sora', 5),
(315, 'Sotaquira', 5),
(316, 'Soraca', 5),
(317, 'Susacon', 5),
(318, 'Sutamarchan', 5),
(319, 'Sutatenza', 5),
(320, 'Tasco', 5),
(321, 'Tenza', 5),
(322, 'Tibana', 5),
(323, 'Tibasosa', 5),
(324, 'Tinjaca', 5),
(325, 'Tipacoque', 5),
(326, 'Toca', 5),
(327, 'Togui', 5),
(328, 'Topaga', 5),
(329, 'Tota', 5),
(330, 'Tunungua', 5),
(331, 'Turmeque', 5),
(332, 'Tuta', 5),
(333, 'Tutasa', 5),
(334, 'Umbita', 5),
(335, 'Ventaquemada', 5),
(336, 'Viracacha', 5),
(337, 'Zetaquira', 5),
(338, 'Manizales', 6),
(339, 'Aguadas', 6),
(340, 'Anserma', 6),
(341, 'Aranzazu', 6),
(342, 'Belalcazar', 6),
(343, 'Chinchina', 6),
(344, 'Filadelfia', 6),
(345, 'La Dorada', 6),
(346, 'La Merced', 6),
(347, 'Manzanares', 6),
(348, 'Marmato', 6),
(349, 'Marquetalia', 6),
(350, 'Marulanda', 6),
(351, 'Neira', 6),
(352, 'Norcasia', 6),
(353, 'Pacora', 6),
(354, 'Palestina', 6),
(355, 'Pensilvania', 6),
(356, 'Riosucio', 6),
(357, 'Risaralda', 6),
(358, 'Salamina', 6),
(359, 'Samana', 6),
(360, 'San Jose', 6),
(361, 'Supia', 6),
(362, 'Victoria', 6),
(363, 'Villamaria', 6),
(364, 'Viterbo', 6),
(365, 'Florencia', 7),
(366, 'Albania', 7),
(367, 'Belen De Los Andaquies', 7),
(368, 'Cartagena Del Chaira', 7),
(369, 'Curillo', 7),
(370, 'El Doncello', 7),
(371, 'El Paujil', 7),
(372, 'La Monta�?Ita', 7),
(373, 'Milan', 7),
(374, 'Morelia', 7),
(375, 'Puerto Rico', 7),
(376, 'San Jose De Fragua', 7),
(377, 'San Vicente Del Caguan', 7),
(378, 'Solano', 7),
(379, 'Solita', 7),
(380, 'Valparaiso', 7),
(381, 'Popayan', 8),
(382, 'Almaguer', 8),
(383, 'Argelia', 8),
(384, 'Balboa', 8),
(385, 'Bolivar', 8),
(386, 'Buenos Aires', 8),
(387, 'Cajibio', 8),
(388, 'Caldono', 8),
(389, 'Caloto', 8),
(390, 'Corinto', 8),
(391, 'El Tambo', 8),
(392, 'Florencia', 8),
(393, 'Guapi', 8),
(394, 'Inza', 8),
(395, 'Jambalo', 8),
(396, 'La Sierra', 8),
(397, 'La Vega', 8),
(398, 'Lopez (Micay)', 8),
(399, 'Mercaderes', 8),
(400, 'Miranda', 8),
(401, 'Morales', 8),
(402, 'Padilla', 8),
(403, 'Paez (Belalcazar)', 8),
(404, 'Patia (El Bordo)', 8),
(405, 'Piamonte', 8),
(406, 'Piendamo', 8),
(407, 'Puerto Tejada', 8),
(408, 'Purace (Coconuco)', 8),
(409, 'Rosas', 8),
(410, 'San Sebastian', 8),
(411, 'Santander De Quilichao', 8),
(412, 'Santa Rosa', 8),
(413, 'Silvia', 8),
(414, 'Sotara (Paispamba)', 8),
(415, 'Suarez', 8),
(416, 'Timbio', 8),
(417, 'Timbiqui', 8),
(418, 'Toribio', 8),
(419, 'Totoro', 8),
(420, 'Villarica', 8),
(421, 'Valledupar', 9),
(422, 'Aguachica', 9),
(423, 'Agustin Codazzi', 9),
(424, 'Astrea', 9),
(425, 'Becerril', 9),
(426, 'Bosconia', 9),
(427, 'Chimichagua', 9),
(428, 'Chiriguana', 9),
(429, 'Curumani', 9),
(430, 'El Copey', 9),
(431, 'El Paso', 9),
(432, 'Gamarra', 9),
(433, 'Gonzalez', 9),
(434, 'La Gloria', 9),
(435, 'La Jagua Ibirico', 9),
(436, 'Manaure (Balcon Del Cesar)', 9),
(437, 'Pailitas', 9),
(438, 'Pelaya', 9),
(439, 'Pueblo Bello', 9),
(440, 'Rio De Oro', 9),
(441, 'La Paz (Robles)', 9),
(442, 'San Alberto', 9),
(443, 'San Diego', 9),
(444, 'San Martin', 9),
(445, 'Tamalameque', 9),
(446, 'Monteria', 10),
(447, 'Ayapel', 10),
(448, 'Buenavista', 10),
(449, 'Canalete', 10),
(450, 'Cerete', 10),
(451, 'Chima', 10),
(452, 'Chinu', 10),
(453, 'Cienaga De Oro', 10),
(454, 'Cotorra', 10),
(455, 'La Apartada', 10),
(456, 'Lorica', 10),
(457, 'Los Cordobas', 10),
(458, 'Momil', 10),
(459, 'Montelibano', 10),
(460, 'Mo�?Itos', 10),
(461, 'Planeta Rica', 10),
(462, 'Pueblo Nuevo', 10),
(463, 'Puerto Escondido', 10),
(464, 'Puerto Libertador', 10),
(465, 'Purisima', 10),
(466, 'Sahagun', 10),
(467, 'San Andres Sotavento', 10),
(468, 'San Antero', 10),
(469, 'San Bernardo Del Viento', 10),
(470, 'San Carlos', 10),
(471, 'San Pelayo', 10),
(472, 'Tierralta', 10),
(473, 'Valencia', 10),
(474, 'Agua De Dios', 11),
(475, 'Alban', 11),
(476, 'Anapoima', 11),
(477, 'Anolaima', 11),
(478, 'Arbelaez', 11),
(479, 'Beltran', 11),
(480, 'Bituima', 11),
(481, 'Bojaca', 11),
(482, 'Cabrera', 11),
(483, 'Cachipay', 11),
(484, 'Cajica', 11),
(485, 'Caparrapi', 11),
(486, 'Caqueza', 11),
(487, 'Carmen De Carupa', 11),
(488, 'Chaguani', 11),
(489, 'Chia', 11),
(490, 'Chipaque', 11),
(491, 'Choachi', 11),
(492, 'Choconta', 11),
(493, 'Cogua', 11),
(494, 'Cota', 11),
(495, 'Cucunuba', 11),
(496, 'El Colegio', 11),
(497, 'El Pe�?On', 11),
(498, 'El Rosal', 11),
(499, 'Facatativa', 11),
(500, 'Fomeque', 11),
(501, 'Fosca', 11),
(502, 'Funza', 11),
(503, 'Fuquene', 11),
(504, 'Fusagasuga', 11),
(505, 'Gachala', 11),
(506, 'Gachancipa', 11),
(507, 'Gacheta', 11),
(508, 'Gama', 11),
(509, 'Girardot', 11),
(510, 'Granada', 11),
(511, 'Guacheta', 11),
(512, 'Guaduas', 11),
(513, 'Guasca', 11),
(514, 'Guataqui', 11),
(515, 'Guatavita', 11),
(516, 'Guayabal De Siquima', 11),
(517, 'Guayabetal', 11),
(518, 'Gutierrez', 11),
(519, 'Jerusalen', 11),
(520, 'Junin', 11),
(521, 'La Calera', 11),
(522, 'La Mesa', 11),
(523, 'La Palma', 11),
(524, 'La Pe�?A', 11),
(525, 'La Vega', 11),
(526, 'Lenguazaque', 11),
(527, 'Macheta', 11),
(528, 'Madrid', 11),
(529, 'Manta', 11),
(530, 'Medina', 11),
(531, 'Mosquera', 11),
(532, 'Nari�?O', 11),
(533, 'Nemocon', 11),
(534, 'Nilo', 11),
(535, 'Nimaima', 11),
(536, 'Nocaima', 11),
(537, 'Venecia (Ospina Perez)', 11),
(538, 'Pacho', 11),
(539, 'Paime', 11),
(540, 'Pandi', 11),
(541, 'Paratebueno', 11),
(542, 'Pasca', 11),
(543, 'Puerto Salgar', 11),
(544, 'Puli', 11),
(545, 'Quebradanegra', 11),
(546, 'Quetame', 11),
(547, 'Quipile', 11),
(548, 'Apulo (Rafael Reyes)', 11),
(549, 'Ricaurte', 11),
(550, 'San Antonio Del Tequendama', 11),
(551, 'San Bernardo', 11),
(552, 'San Cayetano', 11),
(553, 'San Francisco', 11),
(554, 'San Juan De Rioseco', 11),
(555, 'Sasaima', 11),
(556, 'Sesquile', 11),
(557, 'Sibate', 11),
(558, 'Silvania', 11),
(559, 'Simijaca', 11),
(560, 'Soacha', 11),
(561, 'Sopo', 11),
(562, 'Subachoque', 11),
(563, 'Suesca', 11),
(564, 'Supata', 11),
(565, 'Susa', 11),
(566, 'Sutatausa', 11),
(567, 'Tabio', 11),
(568, 'Tausa', 11),
(569, 'Tena', 11),
(570, 'Tenjo', 11),
(571, 'Tibacuy', 11),
(572, 'Tibirita', 11),
(573, 'Tocaima', 11),
(574, 'Tocancipa', 11),
(575, 'Topaipi', 11),
(576, 'Ubala', 11),
(577, 'Ubaque', 11),
(578, 'Ubate', 11),
(579, 'Une', 11),
(580, 'Utica', 11),
(581, 'Vergara', 11),
(582, 'Viani', 11),
(583, 'Villagomez', 11),
(584, 'Villapinzon', 11),
(585, 'Villeta', 11),
(586, 'Viota', 11),
(587, 'Yacopi', 11),
(588, 'Zipacon', 11),
(589, 'Zipaquira', 11),
(590, 'Quibdo (San Francisco De Quibdo)', 12),
(591, 'Acandi', 12),
(592, 'Alto Baudo (Pie De Pato)', 12),
(593, 'Atrato', 12),
(594, 'Bagado', 12),
(595, 'Bahia Solano (Mutis)', 12),
(596, 'Bajo Baudo (Pizarro)', 12),
(597, 'Bojaya (Bellavista)', 12),
(598, 'Canton De San Pablo (Managru)', 12),
(599, 'Condoto', 12),
(600, 'El Carmen De Atrato', 12),
(601, 'Litoral Del Bajo San Juan (Santa Genoveva De Docordo)', 12),
(602, 'Istmina', 12),
(603, 'Jurado', 12),
(604, 'Lloro', 12),
(605, 'Medio Atrato', 12),
(606, 'Medio Baudo', 12),
(607, 'Novita', 12),
(608, 'Nuqui', 12),
(609, 'Rioquito', 12),
(610, 'Riosucio', 12),
(611, 'San Jose Del Palmar', 12),
(612, 'Sipi', 12),
(613, 'Tado', 12),
(614, 'Unguia', 12),
(615, 'Union Panamericana', 12),
(616, 'Neiva', 13),
(617, 'Acevedo', 13),
(618, 'Agrado', 13),
(619, 'Aipe', 13),
(620, 'Algeciras', 13),
(621, 'Altamira', 13),
(622, 'Baraya', 13),
(623, 'Campoalegre', 13),
(624, 'Colombia', 13),
(625, 'Elias', 13),
(626, 'Garzon', 13),
(627, 'Gigante', 13),
(628, 'Guadalupe', 13),
(629, 'Hobo', 13),
(630, 'Iquira', 13),
(631, 'Isnos (San Jose De Isnos)', 13),
(632, 'La Argentina', 13),
(633, 'La Plata', 13),
(634, 'Nataga', 13),
(635, 'Oporapa', 13),
(636, 'Paicol', 13),
(637, 'Palermo', 13),
(638, 'Palestina', 13),
(639, 'Pital', 13),
(640, 'Pitalito', 13),
(641, 'Rivera', 13),
(642, 'Saladoblanco', 13),
(643, 'San Agustin', 13),
(644, 'Santa Maria', 13),
(645, 'Suaza', 13),
(646, 'Tarqui', 13),
(647, 'Tesalia', 13),
(648, 'Tello', 13),
(649, 'Teruel', 13),
(650, 'Timana', 13),
(651, 'Villavieja', 13),
(652, 'Yaguara', 13),
(653, 'Riohacha', 14),
(654, 'Barrancas', 14),
(655, 'Dibulla', 14),
(656, 'Distraccion', 14),
(657, 'El Molino', 14),
(658, 'Fonseca', 14),
(659, 'Hatonuevo', 14),
(660, 'La Jagua Del Pilar', 14),
(661, 'Maicao', 14),
(662, 'Manaure', 14),
(663, 'San Juan Del Cesar', 14),
(664, 'Uribia', 14),
(665, 'Urumita', 14),
(666, 'Villanueva', 14),
(667, 'Santa Marta (Distrito Turistico Cultural E Historico De Santa Marta)', 15),
(668, 'Algarrobo', 15),
(669, 'Aracataca', 15),
(670, 'Ariguani (El Dificil)', 15),
(671, 'Cerro San Antonio', 15),
(672, 'Chivolo', 15),
(673, 'Cienaga', 15),
(674, 'Concordia', 15),
(675, 'El Banco', 15),
(676, 'El Pi�?On', 15),
(677, 'El Reten', 15),
(678, 'Fundacion', 15),
(679, 'Guamal', 15),
(680, 'Pedraza', 15),
(681, 'Piji�?O Del Carmen (Piji�?O)', 15),
(682, 'Pivijay', 15),
(683, 'Plato', 15),
(684, 'Puebloviejo', 15),
(685, 'Remolino', 15),
(686, 'Sabanas De San Angel', 15),
(687, 'Salamina', 15),
(688, 'San Sebastian De Buenavista', 15),
(689, 'San Zenon', 15),
(690, 'Santa Ana', 15),
(691, 'Sitionuevo', 15),
(692, 'Tenerife', 15),
(693, 'Villavicencio', 16),
(694, 'Acacias', 16),
(695, 'Barranca De Upia', 16),
(696, 'Cabuyaro', 16),
(697, 'Castilla La Nueva', 16),
(698, 'San Luis De Cubarral', 16),
(699, 'Cumaral', 16),
(700, 'El Calvario', 16),
(701, 'El Castillo', 16),
(702, 'El Dorado', 16),
(703, 'Fuente De Oro', 16),
(704, 'Granada', 16),
(705, 'Guamal', 16),
(706, 'Mapiripan', 16),
(707, 'Mesetas', 16),
(708, 'La Macarena', 16),
(709, 'La Uribe', 16),
(710, 'Lejanias', 16),
(711, 'Puerto Concordia', 16),
(712, 'Puerto Gaitan', 16),
(713, 'Puerto Lopez', 16),
(714, 'Puerto Lleras', 16),
(715, 'Puerto Rico', 16),
(716, 'Restrepo', 16),
(717, 'San Carlos De Guaroa', 16),
(718, 'San Juan De Arama', 16),
(719, 'San Juanito', 16),
(720, 'San Martin', 16),
(721, 'Vistahermosa', 16),
(722, 'Pasto (San Juan De Pasto)', 17),
(723, 'Alban (San Jose)', 17),
(724, 'Aldana', 17),
(725, 'Ancuya', 17),
(726, 'Arboleda (Berruecos)', 17),
(727, 'Barbacoas', 17),
(728, 'Belen', 17),
(729, 'Buesaco', 17),
(730, 'Colon (Genova)', 17),
(731, 'Consaca', 17),
(732, 'Contadero', 17),
(733, 'Cordoba', 17),
(734, 'Cuaspud (Carlosama)', 17),
(735, 'Cumbal', 17),
(736, 'Cumbitara', 17),
(737, 'Chachagui', 17),
(738, 'El Charco', 17),
(739, 'El Pe�?Ol', 17),
(740, 'El Rosario', 17),
(741, 'El Tablon', 17),
(742, 'El Tambo', 17),
(743, 'Funes', 17),
(744, 'Guachucal', 17),
(745, 'Guaitarilla', 17),
(746, 'Gualmatan', 17),
(747, 'Iles', 17),
(748, 'Imues', 17),
(749, 'Ipiales', 17),
(750, 'La Cruz', 17),
(751, 'La Florida', 17),
(752, 'La Llanada', 17),
(753, 'La Tola', 17),
(754, 'La Union', 17),
(755, 'Leiva', 17),
(756, 'Linares', 17),
(757, 'Los Andes (Sotomayor)', 17),
(758, 'Magui (Payan)', 17),
(759, 'Mallama (Piedrancha)', 17),
(760, 'Mosquera', 17),
(761, 'Olaya Herrera (Bocas De Satinga)', 17),
(762, 'Ospina', 17),
(763, 'Francisco Pizarro (Salahonda)', 17),
(764, 'Policarpa', 17),
(765, 'Potosi', 17),
(766, 'Providencia', 17),
(767, 'Puerres', 17),
(768, 'Pupiales', 17),
(769, 'Ricaurte', 17),
(770, 'Roberto Payan (San Jose)', 17),
(771, 'Samaniego', 17),
(772, 'Sandona', 17),
(773, 'San Bernardo', 17),
(774, 'San Lorenzo', 17),
(775, 'San Pablo', 17),
(776, 'San Pedro De Cartago', 17),
(777, 'Santa Barbara (Iscuande)', 17),
(778, 'Santa Cruz (Guachaves)', 17),
(779, 'Sapuyes', 17),
(780, 'Taminango', 17),
(781, 'Tangua', 17),
(782, 'Tumaco', 17),
(783, 'Tuquerres', 17),
(784, 'Yacuanquer', 17),
(785, 'Cucuta', 18),
(786, 'Abrego', 18),
(787, 'Arboledas', 18),
(788, 'Bochalema', 18),
(789, 'Bucarasica', 18),
(790, 'Cacota', 18),
(791, 'Cachira', 18),
(792, 'Chinacota', 18),
(793, 'Chitaga', 18),
(794, 'Convencion', 18),
(795, 'Cucutilla', 18),
(796, 'Durania', 18),
(797, 'El Carmen', 18),
(798, 'El Tarra', 18),
(799, 'El Zulia', 18),
(800, 'Gramalote', 18),
(801, 'Hacari', 18),
(802, 'Herran', 18),
(803, 'Labateca', 18),
(804, 'La Esperanza', 18),
(805, 'La Playa', 18),
(806, 'Los Patios', 18),
(807, 'Lourdes', 18),
(808, 'Mutiscua', 18),
(809, 'Oca�?A', 18),
(810, 'Pamplona', 18),
(811, 'Pamplonita', 18),
(812, 'Puerto Santander', 18),
(813, 'Ragonvalia', 18),
(814, 'Salazar', 18),
(815, 'San Calixto', 18),
(816, 'San Cayetano', 18),
(817, 'Santiago', 18),
(818, 'Sardinata', 18),
(819, 'Silos', 18),
(820, 'Teorama', 18),
(821, 'Tibu', 18),
(822, 'Toledo', 18),
(823, 'Villacaro', 18),
(824, 'Villa Del Rosario', 18),
(825, 'Armenia', 19),
(826, 'Buenavista', 19),
(827, 'Calarca', 19),
(828, 'Circasia', 19),
(829, 'Cordoba', 19),
(830, 'Filandia', 19),
(831, 'Genova', 19),
(832, 'La Tebaida', 19),
(833, 'Montenegro', 19),
(834, 'Pijao', 19),
(835, 'Quimbaya', 19),
(836, 'Salento', 19),
(837, 'Pereira', 20),
(838, 'Apia', 20),
(839, 'Balboa', 20),
(840, 'Belen De Umbria', 20),
(841, 'Dos Quebradas', 20),
(842, 'Guatica', 20),
(843, 'La Celia', 20),
(844, 'La Virginia', 20),
(845, 'Marsella', 20),
(846, 'Mistrato', 20),
(847, 'Pueblo Rico', 20),
(848, 'Quinchia', 20),
(849, 'Santa Rosa De Cabal', 20),
(850, 'Santuario', 20),
(851, 'Bucaramanga', 21),
(852, 'Aguada', 21),
(853, 'Albania', 21),
(854, 'Aratoca', 21),
(855, 'Barbosa', 21),
(856, 'Barichara', 21),
(857, 'Barrancabermeja', 21),
(858, 'Betulia', 21),
(859, 'Bolivar', 21),
(860, 'Cabrera', 21),
(861, 'California', 21),
(862, 'Capitanejo', 21),
(863, 'Carcasi', 21),
(864, 'Cepita', 21),
(865, 'Cerrito', 21),
(866, 'Charala', 21),
(867, 'Charta', 21),
(868, 'Chima', 21),
(869, 'Chipata', 21),
(870, 'Cimitarra', 21),
(871, 'Concepcion', 21),
(872, 'Confines', 21),
(873, 'Contratacion', 21),
(874, 'Coromoro', 21),
(875, 'Curiti', 21),
(876, 'El Carmen De Chucury', 21),
(877, 'El Guacamayo', 21),
(878, 'El Pe�?On', 21),
(879, 'El Playon', 21),
(880, 'Encino', 21),
(881, 'Enciso', 21),
(882, 'Florian', 21),
(883, 'Floridablanca', 21),
(884, 'Galan', 21),
(885, 'Gambita', 21),
(886, 'Giron', 21),
(887, 'Guaca', 21),
(888, 'Guadalupe', 21),
(889, 'Guapota', 21),
(890, 'Guavata', 21),
(891, 'Guepsa', 21),
(892, 'Hato', 21),
(893, 'Jesus Maria', 21),
(894, 'Jordan', 21),
(895, 'La Belleza', 21),
(896, 'Landazuri', 21),
(897, 'La Paz', 21),
(898, 'Lebrija', 21),
(899, 'Los Santos', 21),
(900, 'Macaravita', 21),
(901, 'Malaga', 21),
(902, 'Matanza', 21),
(903, 'Mogotes', 21),
(904, 'Molagavita', 21),
(905, 'Ocamonte', 21),
(906, 'Oiba', 21),
(907, 'Onzaga', 21),
(908, 'Palmar', 21),
(909, 'Palmas Del Socorro', 21),
(910, 'Paramo', 21),
(911, 'Piedecuesta', 21),
(912, 'Pinchote', 21),
(913, 'Puente Nacional', 21),
(914, 'Puerto Parra', 21),
(915, 'Puerto Wilches', 21),
(916, 'Rionegro', 21),
(917, 'Sabana De Torres', 21),
(918, 'San Andres', 21),
(919, 'San Benito', 21),
(920, 'San Gil', 21),
(921, 'San Joaquin', 21),
(922, 'San Jose De Miranda', 21),
(923, 'San Miguel', 21),
(924, 'San Vicente De Chucuri', 21),
(925, 'Santa Barbara', 21),
(926, 'Santa Helena Del Opon', 21),
(927, 'Simacota', 21),
(928, 'Socorro', 21),
(929, 'Suaita', 21),
(930, 'Sucre', 21),
(931, 'Surata', 21),
(932, 'Tona', 21),
(933, 'Valle San Jose', 21),
(934, 'Velez', 21),
(935, 'Vetas', 21),
(936, 'Villanueva', 21),
(937, 'Zapatoca', 21),
(938, 'Sincelejo', 22),
(939, 'Buenavista', 22),
(940, 'Caimito', 22),
(941, 'Coloso (Ricaurte)', 22),
(942, 'Corozal', 22),
(943, 'Chalan', 22),
(944, 'Galeras (Nueva Granada)', 22),
(945, 'Guaranda', 22),
(946, 'La Union', 22),
(947, 'Los Palmitos', 22),
(948, 'Majagual', 22),
(949, 'Morroa', 22),
(950, 'Ovejas', 22),
(951, 'Palmito', 22),
(952, 'Sampues', 22),
(953, 'San Benito Abad', 22),
(954, 'San Juan De Betulia', 22),
(955, 'San Marcos', 22),
(956, 'San Onofre', 22),
(957, 'San Pedro', 22),
(958, 'Since', 22),
(959, 'Sucre', 22),
(960, 'Tolu', 22),
(961, 'Toluviejo', 22),
(962, 'Ibague', 23),
(963, 'Alpujarra', 23),
(964, 'Alvarado', 23),
(965, 'Ambalema', 23),
(966, 'Anzoategui', 23),
(967, 'Armero (Guayabal)', 23),
(968, 'Ataco', 23),
(969, 'Cajamarca', 23),
(970, 'Carmen Apicala', 23),
(971, 'Casabianca', 23),
(972, 'Chaparral', 23),
(973, 'Coello', 23),
(974, 'Coyaima', 23),
(975, 'Cunday', 23),
(976, 'Dolores', 23),
(977, 'Espinal', 23),
(978, 'Falan', 23),
(979, 'Flandes', 23),
(980, 'Fresno', 23),
(981, 'Guamo', 23),
(982, 'Herveo', 23),
(983, 'Honda', 23),
(984, 'Icononzo', 23),
(985, 'Lerida', 23),
(986, 'Libano', 23),
(987, 'Mariquita', 23),
(988, 'Melgar', 23),
(989, 'Murillo', 23),
(990, 'Natagaima', 23),
(991, 'Ortega', 23),
(992, 'Palocabildo', 23),
(993, 'Piedras', 23),
(994, 'Planadas', 23),
(995, 'Prado', 23),
(996, 'Purificacion', 23),
(997, 'Rioblanco', 23),
(998, 'Roncesvalles', 23),
(999, 'Rovira', 23),
(1000, 'Salda�?A', 23),
(1001, 'San Antonio', 23),
(1002, 'San Luis', 23),
(1003, 'Santa Isabel', 23),
(1004, 'Suarez', 23),
(1005, 'Valle De San Juan', 23),
(1006, 'Venadillo', 23),
(1007, 'Villahermosa', 23),
(1008, 'Villarrica', 23),
(1009, 'CALI (SANTIAGO DE CALI)', 24),
(1010, 'Alcala', 24),
(1011, 'Andalucia', 24),
(1012, 'Ansermanuevo', 24),
(1013, 'Argelia', 24),
(1014, 'Bolivar', 24),
(1015, 'Buenaventura', 24),
(1016, 'Buga', 24),
(1017, 'Bugalagrande', 24),
(1018, 'Caicedonia', 24),
(1019, 'Calima (Darien)', 24),
(1020, 'Candelaria', 24),
(1021, 'Cartago', 24),
(1022, 'Dagua', 24),
(1023, 'El Aguila', 24),
(1024, 'El Cairo', 24),
(1025, 'El Cerrito', 24),
(1026, 'El Dovio', 24),
(1027, 'Florida', 24),
(1028, 'Ginebra', 24),
(1029, 'Guacari', 24),
(1030, 'Jamundi', 24),
(1031, 'La Cumbre', 24),
(1032, 'La Union', 24),
(1033, 'La Victoria', 24),
(1034, 'Obando', 24),
(1035, 'Palmira', 24),
(1036, 'Pradera', 24),
(1037, 'Restrepo', 24),
(1038, 'Riofrio', 24),
(1039, 'Roldanillo', 24),
(1040, 'San Pedro', 24),
(1041, 'Sevilla', 24),
(1042, 'Toro', 24),
(1043, 'Trujillo', 24),
(1044, 'Tulua', 24),
(1045, 'Ulloa', 24),
(1046, 'Versalles', 24),
(1047, 'Vijes', 24),
(1048, 'Yotoco', 24),
(1049, 'Yumbo', 24),
(1050, 'Zarzal', 24),
(1051, 'Arauca', 25),
(1052, 'Arauquita', 25),
(1053, 'Cravo Norte', 25),
(1054, 'Fortul', 25),
(1055, 'Puerto Rondon', 25),
(1056, 'Saravena', 25),
(1057, 'Tame', 25),
(1058, 'Yopal', 26),
(1059, 'Aguazul', 26),
(1060, 'Chameza', 26),
(1061, 'Hato Corozal', 26),
(1062, 'La Salina', 26),
(1063, 'Mani', 26),
(1064, 'Monterrey', 26),
(1065, 'Nunchia', 26),
(1066, 'Orocue', 26),
(1067, 'Paz De Ariporo', 26),
(1068, 'Pore', 26),
(1069, 'Recetor', 26),
(1070, 'Sabanalarga', 26),
(1071, 'Sacama', 26),
(1072, 'San Luis De Palenque', 26),
(1073, 'Tamara', 26),
(1074, 'Tauramena', 26),
(1075, 'Trinidad', 26),
(1076, 'Villanueva', 26),
(1077, 'Mocoa', 27),
(1078, 'Colon', 27),
(1079, 'Orito', 27),
(1080, 'Puerto Asis', 27),
(1081, 'Puerto Caicedo', 27),
(1082, 'Puerto Guzman', 27),
(1083, 'Puerto Leguizamo', 27),
(1084, 'Sibundoy', 27),
(1085, 'San Francisco', 27),
(1086, 'San Miguel (La Dorada)', 27),
(1087, 'Santiago', 27),
(1088, 'La Hormiga (Valle Del Guamuez)', 27),
(1089, 'Villagarzon', 27),
(1090, 'San Andres', 28),
(1091, 'Providencia', 28),
(1092, 'Leticia', 29),
(1093, 'El Encanto', 29),
(1094, 'La Chorrera', 29),
(1095, 'La Pedrera', 29),
(1096, 'La Victoria', 29),
(1097, 'Miriti-Parana', 29),
(1098, 'Puerto Alegria', 29),
(1099, 'Puerto Arica', 29),
(1100, 'Puerto Nari�?O', 29),
(1101, 'Puerto Santander', 29),
(1102, 'Tarapaca', 29),
(1103, 'Puerto Inirida', 30),
(1104, 'Barranco Minas', 30),
(1105, 'San Felipe', 30),
(1106, 'Puerto Colombia', 30),
(1107, 'La Guadalupe', 30),
(1108, 'Cacahual', 30),
(1109, 'Pana Pana (Campo Alegre)', 30),
(1110, 'Morichal (Morichal Nuevo)', 30),
(1111, 'San Jose Del Guaviare', 31),
(1112, 'Calamar', 31),
(1113, 'El Retorno', 31),
(1114, 'Miraflores', 31),
(1115, 'Mitu', 32),
(1116, 'Caruru', 32),
(1117, 'Pacoa', 32),
(1118, 'Taraira', 32),
(1119, 'Papunaua (Morichal)', 32),
(1120, 'Yavarate', 32),
(1121, 'Puerto Carre�?O', 33),
(1122, 'La Primavera', 33),
(1123, 'Santa Rita', 33),
(1124, 'Santa Rosalia', 33),
(1125, 'San Jose De Ocune', 33),
(1126, 'Cumaribo', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblordenmanto`
--

CREATE TABLE `tblordenmanto` (
  `Odm_id` int(11) NOT NULL,
  `Odm_fechaInicio` date NOT NULL,
  `Odm_fechaFin` date NOT NULL,
  `Odm_horainicio` time NOT NULL,
  `Odm_horaFin` time NOT NULL,
  `Odm_tecnico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Odm_observaciones` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Odm_observacionesFin` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Stg_id` int(11) NOT NULL,
  `Maq_id` int(11) NOT NULL,
  `Emp_id` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Usu_id` int(11) NOT NULL,
  `Odm_pdf` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblordenmanto`
--

INSERT INTO `tblordenmanto` (`Odm_id`, `Odm_fechaInicio`, `Odm_fechaFin`, `Odm_horainicio`, `Odm_horaFin`, `Odm_tecnico`, `Odm_observaciones`, `Odm_observacionesFin`, `Stg_id`, `Maq_id`, `Emp_id`, `Usu_id`, `Odm_pdf`) VALUES
(2, '2021-06-16', '2021-06-30', '16:18:00', '16:18:00', 'dfdf', 'dfdf', 'fsgfs', 19, 1, NULL, 4, '../web/pdf/'),
(3, '2021-06-25', '2021-06-23', '16:21:00', '16:24:00', '', 'dssd', 'dfdfd', 20, 1, '2', 4, '../web/pdf/OrdenProduccion_3.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblordenmantodetalle`
--

CREATE TABLE `tblordenmantodetalle` (
  `Odmde_id` int(11) NOT NULL,
  `Odm_id` int(11) DEFAULT NULL,
  `Pro_id` int(11) DEFAULT NULL,
  `Tar_id` int(11) DEFAULT NULL,
  `Her_id` int(11) DEFAULT NULL,
  `Arti_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblordenmantodetalle`
--

INSERT INTO `tblordenmantodetalle` (`Odmde_id`, `Odm_id`, `Pro_id`, `Tar_id`, `Her_id`, `Arti_id`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 2, NULL, 1, NULL, NULL),
(3, 2, NULL, NULL, 2, NULL),
(4, 2, NULL, NULL, NULL, 2),
(5, 3, 1, NULL, NULL, NULL),
(6, 3, NULL, 1, NULL, NULL),
(7, 3, NULL, NULL, 2, NULL),
(8, 3, NULL, NULL, NULL, 2);

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
(3, '2021-06-24', 3, '1', 1, 4, 4, 3, '2021-06-21', '2021-06-30', '2021-06-29', 4, 'NULL', 0),
(4, '2021-06-28', 4, '1', 4, 5, 5, 4, '2021-06-08', '2021-06-09', '2021-06-10', 4, 'NULL', 0),
(5, '2021-06-28', 3, '1', 4, 6, 6, 5, '2021-06-01', '2021-06-17', '2021-06-29', 2, 'NULL', 4);

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
  `Ped_motivo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ped_ruta_pdf_cotizacion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ped_ruta_pdf` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblpedido`
--

INSERT INTO `tblpedido` (`Ped_id`, `Ped_fecha`, `destinatario`, `Ped_objetivo`, `Ped_plazoEjecucionDias`, `Ped_plazoEjecucionMeses`, `Ped_lugarEjecucionCiu`, `Ped_lugarEjecucionCen`, `Est_id`, `Cot_id`, `Cen_id`, `Emp_id`, `Dep_id`, `Mun_id`, `Tempr_id`, `Ped_motivo`, `Ped_ruta_pdf_cotizacion`, `Ped_ruta_pdf`) VALUES
(1, '2021-06-20', 4, 'Pedido de solicitud', 2, 1, 1, 3, 3, NULL, 3, 1, 24, 1009, 3, NULL, NULL, NULL),
(102, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 7, 1, NULL, 1, NULL, NULL, 3, NULL, NULL, NULL),
(104, '2021-06-20', NULL, '', NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '2021-06-22', NULL, '', NULL, NULL, NULL, NULL, 10, 3, NULL, 1, NULL, NULL, 4, 'dfsdf', NULL, NULL),
(106, '2021-06-26', NULL, '', NULL, NULL, NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '2021-06-26', NULL, '', NULL, NULL, NULL, NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '2021-06-28', 1, 'Pedido de solicitud', 12, 2, 15, 4, 10, 5, 1, 1, 1, 1, 4, 'dfsf', NULL, 'PdfCostos/solicitud/Solicitud de cotizacion-Sena auto-consumo No. 108.pdf'),
(109, '2021-06-15', 1, 'Pedido de solicitud', 1, 1, 16, 4, 9, 5, 1, 1, 1, 1, 4, NULL, 'PdfCostos/cotizacion/Cotizacion-No.109.pdf', 'PdfCostos/solicitud/Solicitud de cotizacion-Sena auto-consumo No. 109.pdf'),
(110, '2021-06-28', 4, 'Pedido de solicitud', 2, 1, 19, 4, 8, 5, 1, 1, 1, 1, 4, NULL, 'PdfCostos/cotizacion/Cotizacion-No.110.pdf', 'PdfCostos/solicitud/Solicitud de cotizacion-Sena auto-consumo No. 110.pdf');

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
(1, 11, 7, '#00FFFF', 3),
(4, 11, 7, '#0000ff', 4),
(5, 11, 7, '#e01a00', 5);

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
(4, 5, 'Jhonatan Zambrano', 'fgdfg'),
(5, 5, 'Jhonatan Zambrano', 'dfsdf'),
(6, 5, 'Jhonatan', 'xcxc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproceso`
--

CREATE TABLE `tblproceso` (
  `Pro_id` int(11) NOT NULL,
  `Pro_nombre` varchar(45) NOT NULL,
  `Pro_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproceso`
--

INSERT INTO `tblproceso` (`Pro_id`, `Pro_nombre`, `Pro_descripcion`) VALUES
(1, 'Mecanico', 'Proceso mecanico');

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
(4, 40, 65, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 3),
(5, 40, 4, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 1),
(6, 4000, 455, '20 x 30 cm', '10 x 30 cm', 'Jhonatan', 1);

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
  `Soc_servidorp` varchar(45) DEFAULT NULL,
  `Soc_ficha` int(11) DEFAULT NULL,
  `Soc_area` varchar(20) DEFAULT NULL,
  `Reg_id` int(11) DEFAULT NULL,
  `Soc_nom_je` varchar(40) DEFAULT NULL,
  `Cen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblsolicitudecompra`
--

INSERT INTO `tblsolicitudecompra` (`Soc_id`, `Soc_fecha`, `Soc_DNI_jefeOficina`, `Soc_DNI_servidorPublico`, `Soc_servidorp`, `Soc_ficha`, `Soc_area`, `Reg_id`, `Soc_nom_je`, `Cen_id`) VALUES
(1, '2021-06-01', 567654, 87756, 'ggv', 2346, 'ghgh', 2, 'vggcg', 3);

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
(18, 'Termica', 2),
(19, 'Mantenimiento preventivo', 6),
(20, 'Mantenimiento Correctivo', 6),
(21, 'Mantenimiento Predictivo', 6);

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
(1, 4, '90 x 79 cm', 10000, '20 x 50 cm', 4000, 5, 4200, 1),
(2, 4, '90 x 79 cm', 90000, '20 x 50 cm', 4000, 5, 4200, 3),
(5, 5, '90 x 79 cm', 90000, '20 x 50 cm', 6000, 5, 6300, 2),
(6, 6, '90 x 79 cm', 10000, '20 x 50 cm', 6000, 5, 6300, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltarea`
--

CREATE TABLE `tbltarea` (
  `Tar_id` int(11) NOT NULL,
  `Tar_nombre` varchar(45) DEFAULT NULL,
  `Tar_descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltarea`
--

INSERT INTO `tbltarea` (`Tar_id`, `Tar_nombre`, `Tar_descripcion`) VALUES
(1, 'Lubricar', 'fgdg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltareaherramienta`
--

CREATE TABLE `tbltareaherramienta` (
  `The_id` int(11) NOT NULL,
  `Tar_id` int(11) NOT NULL,
  `Her_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltareaherramienta`
--

INSERT INTO `tbltareaherramienta` (`The_id`, `Tar_id`, `Her_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltareaproceso`
--

CREATE TABLE `tbltareaproceso` (
  `Tpr_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `Tar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltareaproceso`
--

INSERT INTO `tbltareaproceso` (`Tpr_id`, `Pro_id`, `Tar_id`) VALUES
(1, 1, 1);

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
(5, 'Cliente externo'),
(6, 'Mantenimientos');

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
(5, 'Tipo rip'),
(6, 'Tipo de Mantenimiento');

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
(1, 1, '', '', 3),
(2, 6, '', '', 3),
(3, 12, '', '', 3),
(4, 22, '1', '', 3),
(5, 23, '', '', 3),
(6, 27, '', '', 3),
(7, 28, '', '', 3),
(8, 25, '', '', 3),
(13, 1, '', '', 4),
(14, 23, '', '', 4),
(15, 1, '', '', 5),
(16, 27, '', '', 5);

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
(1, 'Jair', 'Alexander', 'Hernandez', 'Rosero', 0, '1144090162', '3235148081', 'jahernandez2610@misena.edu.co', '1144090162', 1, 1, 1, 1, '0'),
(4, 'Jhonatan', 'Javier', 'Zambrano', 'Zambrano', 0, '111000', '3168445287', 'zambranojhonatan20@gmail.com', '', 1, 1, 0, 1, '0');

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
-- Indices de la tabla `tblbitentrada`
--
ALTER TABLE `tblbitentrada`
  ADD PRIMARY KEY (`bitcod`);

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
  ADD KEY `Soc_id` (`Soc_id`),
  ADD KEY `Pba_id` (`Pba_id`),
  ADD KEY `Med_id` (`Med_id`);

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
-- Indices de la tabla `tblordenmanto`
--
ALTER TABLE `tblordenmanto`
  ADD PRIMARY KEY (`Odm_id`),
  ADD KEY `fk_Tblordenmantenimiento_TblEmpresa1_idx` (`Emp_id`) USING BTREE,
  ADD KEY `fk_Tblordenmantenimiento_TblMaquina1_idx` (`Maq_id`) USING BTREE,
  ADD KEY `fk_Tblordenmantenimiento_TblSubtipoGeneral1_idx` (`Stg_id`) USING BTREE,
  ADD KEY `Fk_Orden_Usu` (`Usu_id`);

--
-- Indices de la tabla `tblordenmantodetalle`
--
ALTER TABLE `tblordenmantodetalle`
  ADD PRIMARY KEY (`Odmde_id`),
  ADD KEY `Fk_Odmde_odm` (`Odm_id`),
  ADD KEY `Fk_Odmde_Pro` (`Pro_id`),
  ADD KEY `Fk_Odmde_Tar` (`Tar_id`),
  ADD KEY `Fk_Odmde_Her` (`Her_id`),
  ADD KEY `Fk_Odmde_Arti` (`Arti_id`);

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
  ADD KEY `Reg_id` (`Reg_id`),
  ADD KEY `Cen_id` (`Cen_id`);

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
-- Indices de la tabla `tbltareaherramienta`
--
ALTER TABLE `tbltareaherramienta`
  ADD PRIMARY KEY (`The_id`),
  ADD KEY `Fk_The_Tarea` (`Tar_id`),
  ADD KEY `Fk_The_Herramienta` (`Her_id`);

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
  MODIFY `Area_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `com_NoItem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblcotizacion`
--
ALTER TABLE `tblcotizacion`
  MODIFY `Cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `Maq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `Ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
  MODIFY `Soc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `tblcomprasinsumos_ibfk_2` FOREIGN KEY (`Soc_id`) REFERENCES `tblsolicitudecompra` (`Soc_id`),
  ADD CONSTRAINT `tblcomprasinsumos_ibfk_3` FOREIGN KEY (`Pba_id`) REFERENCES `tblproductobase` (`Pba_id`),
  ADD CONSTRAINT `tblcomprasinsumos_ibfk_4` FOREIGN KEY (`Med_id`) REFERENCES `tblmedida` (`Med_id`);

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
  ADD CONSTRAINT `tblsolicitudecompra_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `tblregional` (`Reg_id`),
  ADD CONSTRAINT `tblsolicitudecompra_ibfk_2` FOREIGN KEY (`Cen_id`) REFERENCES `tblcentro` (`Cen_id`);

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
