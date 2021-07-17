-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2021 a las 19:39:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autos_torres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `no_cliente` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subscripcion` tinyint(2) NOT NULL,
  `empresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `medio_identificación` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `folio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cliente` tinyint(2) NOT NULL,
  `estatus` tinyint(2) NOT NULL,
  `system_state` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Cliente registrado de Autos Torres';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`no_cliente`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `correo`, `subscripcion`, `empresa`, `rfc`, `fecha_registro`, `medio_identificación`, `folio`, `tipo_cliente`, `estatus`, `system_state`) VALUES
(666, 'Inocencio', 'Rodriguez', 'Melendez', '5939150205', '5587794613', 'correo@gmail.com', 1, 'Reckrea', 'SRPOc6846989', '2021-07-16 23:16:46', 'INE', '688798798', 1, 1, 1),
(1651, 'Angel', 'peres', 'SGR', '5555555', '556524152950', 'correo@gmail.com', 1, 'EMPRESA', 'XAXX010101000', '2021-02-28 21:29:34', 'INE', '45456', 0, 1, 0),
(2572742, 'Marcela', 'Carmino', 'Alvarez', '5512121545', '556524152950', 'sadne@gmail.com', 1, 'EMPRESA', 'XAXX010101000', '2021-02-28 21:29:34', 'INAPAM', '45456', 1, 1, 1),
(131783362601, 'Cesar', 'Pineda', 'Pacheco', '5545784512', '', 'correo@gmail.com', 1, 'EMPRESA', 'XAXX010101000', '2021-05-11 09:03:31', 'INE', '15315615', 2, 1, 1),
(297659297675, 'Christian', 'Pioquinto', 'Hernandez', '+525565241529', '', '', 0, '', '', '2021-05-11 09:29:14', 'INE', '', 0, 1, 1),
(341550027492, 'Casandra', 'Ramirez', 'Huertado', '551245212', '556524152950', 'correo@gmail.com', 1, 'EMPRESA', 'XAXX010101000', '2021-03-06 19:43:06', 'CEDULA', '45456', 0, 1, 1),
(896610125442, 'Maria', 'Gonzalez', 'Chavez', '5565656598', '', '', 0, '', '', '2021-05-11 09:29:42', 'INE', '', 0, 1, 1),
(902041408911, 'Ernesto', 'Loaiza', 'Hernandez', '15551515', '', 'jduuans@gmail.com', 1, 'San Sa de cv', 'FCFCD12516', '2021-03-06 19:41:48', 'CEDULA', '156156', 1, 1, 1),
(987568611049, 'Ernesto', 'Dominguez', 'Alfaro', '4521561', '', '', 0, '', '', '2021-05-15 10:34:06', 'INE', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `no_vehiculo` bigint(20) NOT NULL,
  `id_modelo_fk` int(5) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `anio` int(5) NOT NULL,
  `placa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `entidad_placa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kilometros` bigint(20) NOT NULL,
  `transimision` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `combustible` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_puertas` int(2) NOT NULL,
  `precio_contado` decimal(10,2) NOT NULL,
  `precio_credito` decimal(10,2) NOT NULL,
  `opc_credito` tinyint(2) NOT NULL DEFAULT 1,
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`no_vehiculo`, `id_modelo_fk`, `fecha_registro`, `anio`, `placa`, `entidad_placa`, `color`, `kilometros`, `transimision`, `combustible`, `no_puertas`, `precio_contado`, `precio_credito`, `opc_credito`, `observaciones`, `estatus`) VALUES
(0, 150, '2021-03-24 00:00:00', 2015, 'MCK2356', 'MEX', 'Gris', 30000, 'AU', 'GASOLINA', 4, '100000.00', '150000.00', 1, 'Vender en corto', 1),
(1, 72, '2021-03-08 00:00:00', 2001, 'MKH7443', 'MEX', 'Rojo', 1004504, 'AU', 'ELE', 5, '150000.00', '20000.00', 1, 'SIN OBSERVACIONES', 1),
(2, 274, '2021-03-24 00:00:00', 2015, 'MCK2356', 'MEX', 'Gris', 30000, 'AU', 'GASOLINA', 4, '100000.00', '150000.00', 1, 'Vender en corto', 1),
(1234, 186, '2021-02-28 21:29:34', 2001, 'MKH7443', 'MEX', 'Rojo', 1004504, 'AU', 'GASOLINA', 5, '150000.00', '200000.00', 1, 'SIN PB', 1),
(4353, 3, '2021-02-28 21:29:34', 2001, 'MKH7443', 'MEX', 'Rojo', 1004504, 'AU', 'GASOLINA', 5, '150000.00', '200000.00', 1, 'SIN PB', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `no_contrato` bigint(20) NOT NULL,
  `no_empleado_fk` bigint(20) NOT NULL,
  `no_cliente_fk` bigint(20) NOT NULL,
  `no_vehiculo_fk` bigint(20) NOT NULL,
  `hora_fecha_creacion` datetime NOT NULL,
  `tipo_contrato` tinyint(2) NOT NULL,
  `plazo` int(5) NOT NULL,
  `fecha_primer_pago` date NOT NULL,
  `enganche` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `forma_pago` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estatus` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contrato que acredita la obtencion/venta de coche';

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`no_contrato`, `no_empleado_fk`, `no_cliente_fk`, `no_vehiculo_fk`, `hora_fecha_creacion`, `tipo_contrato`, `plazo`, `fecha_primer_pago`, `enganche`, `saldo`, `forma_pago`, `subtotal`, `iva`, `total`, `estatus`) VALUES
(1, 58655210, 2572742, 1234, '2021-07-16 23:20:57', 1, 12, '2021-07-16', '45000.00', '100000.00', 'Efectivo', '100000.00', '16000.00', '116000.00', 1),
(3, 58655210, 2572742, 1234, '2021-07-16 23:21:11', 1, 12, '2021-07-16', '45000.00', '100000.00', 'Efectivo', '100000.00', '16000.00', '116000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` tinyint(3) NOT NULL,
  `visible` tinyint(2) NOT NULL,
  `oblogatorio` tinyint(2) NOT NULL,
  `estatus` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detalles extra que se agregan a cada coche';

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `nombre`, `categoria`, `visible`, `oblogatorio`, `estatus`) VALUES
(1, 'Factura Original', 1, 1, 1, 1),
(2, 'Refaccion', 2, 1, 0, 1),
(3, 'Ultima Tenencia', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(5) NOT NULL,
  `no_cliente_fk` bigint(20) NOT NULL,
  `calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_ext` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_int` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado_republica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CP` int(6) NOT NULL,
  `referencias` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Direccion que se almacenará del cliente';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `no_empleado` bigint(20) NOT NULL,
  `id_empresa_fk` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apaterno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `amaterno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` tinyint(2) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `correo_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pw` text COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_acceso` tinyint(3) NOT NULL,
  `estatus` tinyint(3) NOT NULL,
  `system_state` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contiene los empleados que pueden acceder al sistema';

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`no_empleado`, `id_empresa_fk`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `sexo`, `fecha_registro`, `correo_user`, `pw`, `puesto`, `nivel_acceso`, `estatus`, `system_state`) VALUES
(84196, 2, 'Jorge', 'Lopez', 'Abarca', '0005856', '648821', 0, '2021-07-14 23:48:26', 'jorge@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Admin', 2, 1, 1),
(84197, 2, 'Valeria', 'Melendez', 'Jimenez', '448963657', '66688549', 1, '2021-07-14 23:49:17', 'valeria@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Gerente', 3, 1, 1),
(84198, 2, 'Jorge', 'Lopez', 'Abarca', '0005856', '648821', 0, '2021-07-16 23:17:45', 'jorge@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Admin', 2, 1, 1),
(123456, 2, 'Carlos', 'Mendoza', 'Tellez', '5578451200', '5532659800', 1, '2021-03-02 00:00:00', 'mendoza@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Vendedor', 2, 0, 1),
(31420001, 2, 'Jennifer', 'Morales', 'Rosas', '5578451200', '5532659800', 1, '2021-03-02 00:00:00', 'Tester', '4a7d1ed414474e4033ac29ccb8653d9b', 'Tester', 1, 1, 1),
(32818594, 1, 'Jessica', 'Morales', 'Rosas', '45895623', '45785451', 1, '2021-03-05 01:25:02', 'jee@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Vendedor', 1, 0, 1),
(54597513, 1, 'Taili', 'Morales', 'Rosas', '5512457845', '5523568956', 1, '2021-03-05 01:23:32', 'luis@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Vendedor', 1, 0, 1),
(58655210, 2, 'Cesar Haziel', 'Pineda', 'Pacheco', '5539832331', '5539832331', 0, '2021-07-06 13:36:08', 'cesar.hpp96@hotmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Programador', 0, 1, 1),
(98395105, 1, 'Ejemplo', 'paterno', 'materno', '454156', '1651561', 1, '2021-03-05 13:27:24', 'alocod@gmasil.co', '4a7d1ed414474e4033ac29ccb8653d9b', 'SalesMan', 1, 0, 1),
(3142065372, 2, 'Christian', 'Pioquinto', 'Hernandez', '5516603019', '5565241529', 0, '2021-02-28 21:29:34', 'christian.floppy@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Programmer', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) NOT NULL,
  `rfc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_ext` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `no_int` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(10) NOT NULL,
  `de_mun` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sitio_web` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `path_logo` text COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `licencia` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detallkes principales de la empresa';

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `rfc`, `nombre`, `calle`, `no_ext`, `no_int`, `colonia`, `cp`, `de_mun`, `estado`, `telefono`, `correo`, `sitio_web`, `path_logo`, `version`, `licencia`) VALUES
(1, 'XEXX010101000', 'Autos Torres S.A. de C.V.', 'Av Via Corta Morelia', 'S/N', '', 'Libertad', 54400, 'Nicolás Romero', 'MEX', '5565241529', 'correo@autostorres.com.mx', 'www.autostorres.com.mx', '', '0.0', 'e39b9f0cd362775bfe48d75e4456258d'),
(2, 'PIPC960113SRA', 'ReckreaStudios', 'Nicolas Lerdo', '85', 's/n', 'Benito Juarez', 54666, 'Coyotepec', 'Mexico', '5564188252', 'cesar-hp@reckreastudios.com', 'reckreastudios.com', 'path logo', '0.1', 'Todos los derechos reservados'),
(3, 'RFC', 'Nombre', 'Calle', '09', '056', 'Colonia', 51111, 'Municipio', 'MexicoCDMX', '5468165', 'correo@empresa@gmail.com', 'sitio.empresa.com', 'empresa_path84654cfcLogo', '0.1.9', 'Licencia s. a. de c. v.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_contrato`
--

CREATE TABLE `file_contrato` (
  `id_file_c` int(5) NOT NULL,
  `id_tipo_archivo_fk` int(5) NOT NULL,
  `no_contrato_fk` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_acceso` tinyint(2) NOT NULL,
  `estatus` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Archivos cargados para cada contrato realizado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_vechiculo`
--

CREATE TABLE `file_vechiculo` (
  `id_file_v` int(5) NOT NULL,
  `id_tipo_archivo_fk` int(5) NOT NULL,
  `no_vehiculo_fk` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_acceso` tinyint(3) NOT NULL,
  `estatus` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `file_vechiculo`
--

INSERT INTO `file_vechiculo` (`id_file_v`, `id_tipo_archivo_fk`, `no_vehiculo_fk`, `nombre`, `path`, `ext`, `nivel_acceso`, `estatus`) VALUES
(1, 1, 1, 'img1', 'images/resocurses', 'jpg', 0, 1),
(2, 1, 1, 'img2', 'images/resocurses', 'jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(5) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`, `estatus`) VALUES
(2, 'AGRALE', 1),
(3, 'ALFA ROMEO', 1),
(4, 'AUDI', 1),
(5, 'BMW', 1),
(6, 'CHERY', 1),
(7, 'CHEVROLET', 1),
(8, 'CHRYSLER', 1),
(9, 'CITROEN', 1),
(10, 'DACIA', 1),
(11, 'DAEWO', 1),
(12, 'DAIHATSU', 1),
(13, 'DODGE', 1),
(14, 'FERRARI', 1),
(15, 'FIAT', 1),
(16, 'FORD', 1),
(17, 'GALLOPER', 1),
(18, 'HEIBAO', 1),
(19, 'HONDA', 1),
(20, 'HYUNDAI', 1),
(21, 'ISUZU', 1),
(22, 'JAGUAR', 1),
(23, 'JEEP', 1),
(24, 'KIA', 1),
(25, 'LADA', 1),
(26, 'LAND ROVER', 1),
(27, 'LEXUS', 1),
(28, 'MASERATI', 1),
(29, 'MAZDA', 1),
(30, 'MERCEDES BE', 1),
(31, 'MG', 1),
(32, 'MINI', 1),
(33, 'MITSUBISHI', 1),
(34, 'NISSAN', 1),
(35, 'PEUGEOT', 1),
(36, 'PORSCHE', 1),
(37, 'RAM', 1),
(38, 'RENAULT', 1),
(39, 'ROVER', 1),
(40, 'SAAB', 1),
(41, 'SEAT', 1),
(42, 'SMART', 1),
(43, 'SSANGYONG', 1),
(44, 'SUBARU', 1),
(45, 'SUZUKI', 1),
(46, 'TATA', 1),
(47, 'TOYOTA', 1),
(48, 'VOLKSWAGEN', 1),
(49, 'VOLVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(5) NOT NULL,
  `id_marca_fk` int(5) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla ya almacenadas con posibles marcas de vehiculo';

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca_fk`, `nombre`, `estatus`) VALUES
(2, 2, 'MARRUA', 1),
(3, 3, '147', 1),
(4, 3, '156', 1),
(5, 3, '159', 1),
(6, 3, '166', 1),
(7, 3, 'BRERA', 1),
(8, 3, 'GIULIETTA', 1),
(9, 3, 'GT', 1),
(10, 3, 'GTV', 1),
(11, 3, 'MITO', 1),
(12, 3, 'SPIDER', 1),
(13, 4, 'A1', 1),
(14, 4, 'A3', 1),
(15, 4, 'A4', 1),
(16, 4, 'A5', 1),
(17, 4, 'A6', 1),
(18, 4, 'A7', 1),
(19, 4, 'A8', 1),
(20, 4, 'ALLROAD', 1),
(21, 4, 'Q3', 1),
(22, 4, 'Q5', 1),
(23, 4, 'Q7', 1),
(24, 4, 'R8', 1),
(25, 4, 'TT', 1),
(26, 5, 'SERIE1', 1),
(27, 5, 'SERIE3', 1),
(28, 5, 'SERIE5', 1),
(29, 5, 'SERIE6', 1),
(30, 5, 'SERIE7', 1),
(31, 5, 'X1', 1),
(32, 5, 'X3', 1),
(33, 5, 'X5', 1),
(34, 5, 'X6', 1),
(35, 5, 'Z3', 1),
(36, 5, 'Z4', 1),
(37, 6, 'FACE', 1),
(38, 6, 'FULWIN', 1),
(39, 6, 'QQ', 1),
(40, 6, 'SKIN', 1),
(41, 6, 'TIGGO', 1),
(42, 7, 'AGILE', 1),
(43, 7, 'ASTRA', 1),
(44, 7, 'ASTRA II', 1),
(45, 7, 'AVALANCHE', 1),
(46, 7, 'AVEO', 1),
(47, 7, 'BLAZER', 1),
(48, 7, 'CAMARO', 1),
(49, 7, 'CAPTIVA', 1),
(50, 7, 'CELTA', 1),
(51, 7, 'CLASSIC', 1),
(52, 7, 'COBALT', 1),
(53, 7, 'CORSA', 1),
(54, 7, 'CORSA CLASSIC', 1),
(55, 7, 'CORSA II', 1),
(56, 7, 'CORVETTE', 1),
(57, 7, 'CRUZE', 1),
(58, 7, 'MERIVA', 1),
(59, 7, 'MONTANA', 1),
(60, 7, 'ONIX', 1),
(61, 7, 'PRISMA', 1),
(62, 7, 'VECTRA', 1),
(63, 7, 'S-10', 1),
(64, 7, 'SILVERADO', 1),
(65, 7, 'SONIC', 1),
(66, 7, 'SPARK', 1),
(67, 7, 'SPIN', 1),
(68, 7, 'TRACKER', 1),
(69, 7, 'TRAILBLAZER', 1),
(70, 7, 'ZAFIRA', 1),
(71, 8, '300', 1),
(72, 8, 'CARAVAN', 1),
(73, 8, 'TOWN & COUNTRY', 1),
(74, 8, 'GRAND CARAVAN', 1),
(75, 8, 'CROSSFIRE', 1),
(76, 8, 'NEON', 1),
(77, 8, 'PT CRUISER', 1),
(78, 8, 'SEBRIG', 1),
(79, 9, 'BERLINGO', 1),
(80, 9, 'C3', 1),
(81, 9, 'C3 AIRCROSS', 1),
(82, 9, 'C3 PICASSO', 1),
(83, 9, 'C4 AIRCROSS', 1),
(84, 9, 'C4 LOUNGE', 1),
(85, 9, 'C4 PICASSO', 1),
(86, 9, 'C4 GRAND PICASSO', 1),
(87, 9, 'C5', 1),
(88, 9, 'C6', 1),
(89, 9, 'DS3', 1),
(90, 9, 'DS4', 1),
(91, 9, 'C15', 1),
(92, 9, 'JUMPER', 1),
(93, 9, 'SAXO', 1),
(94, 9, 'XSARA', 1),
(95, 9, 'XSARA PICASSO', 1),
(96, 10, 'PICK-UP', 1),
(97, 11, 'LANOS', 1),
(98, 11, 'LEGANZA', 1),
(99, 11, 'NUBIRA', 1),
(100, 11, 'MATIZ', 1),
(101, 11, 'TACUMA', 1),
(102, 11, 'DAMAS', 1),
(103, 11, 'LABO', 1),
(104, 12, 'MOVE', 1),
(105, 12, 'ROCKY', 1),
(106, 12, 'SIRION', 1),
(107, 12, 'TERIOS', 1),
(108, 12, 'MIRA', 1),
(109, 13, 'JOURNEY', 1),
(110, 13, 'RAM', 1),
(111, 14, '360', 1),
(112, 14, '430', 1),
(113, 14, '456', 1),
(114, 14, '575', 1),
(115, 14, '599', 1),
(116, 14, '612', 1),
(117, 14, 'CALIFORNIA', 1),
(118, 14, 'SUPERAMERICA', 1),
(119, 15, '500', 1),
(120, 15, 'BRAVA', 1),
(121, 15, 'BRAVO', 1),
(122, 15, 'DOBLO', 1),
(123, 15, 'DUCATO', 1),
(124, 15, 'FIORINO', 1),
(125, 15, 'FIORINO QUBO', 1),
(126, 15, 'IDEA', 1),
(127, 15, 'LINEA', 1),
(128, 15, 'MAREA', 1),
(129, 15, 'PALIO', 1),
(130, 15, 'PALIO ADVENTURE', 1),
(131, 15, 'PUNTO', 1),
(132, 15, 'QUBO', 1),
(133, 15, 'SIENA', 1),
(134, 15, 'GRAND SIENA', 1),
(135, 15, 'STILO', 1),
(136, 15, 'STRADA', 1),
(137, 15, 'UNO', 1),
(138, 15, 'UNO EVO', 1),
(139, 16, 'COURIER', 1),
(140, 16, 'ECOSPORT', 1),
(141, 16, 'ECOSPORT KD', 1),
(142, 16, 'ESCAPE', 1),
(143, 16, 'F100', 1),
(144, 16, 'FIESTA KD', 1),
(145, 16, 'FIESTA', 1),
(146, 16, 'FOCUS', 1),
(147, 16, 'FOCUS III', 1),
(148, 16, 'KA', 1),
(149, 16, 'KUGA', 1),
(150, 16, 'MONDEO', 1),
(151, 16, 'RANGER', 1),
(152, 16, 'S-MAX', 1),
(153, 16, 'TRANSIT', 1),
(154, 17, 'EXCEED', 1),
(155, 18, 'HB', 1),
(156, 19, 'ACCORD', 1),
(157, 19, 'CITY', 1),
(158, 19, 'CIVIC', 1),
(159, 19, 'CRV', 1),
(160, 19, 'FIT', 1),
(161, 19, 'HRV', 1),
(162, 19, 'LEGEND', 1),
(163, 19, 'PILOT', 1),
(164, 19, 'STREAM', 1),
(165, 20, 'ACCENT', 1),
(166, 20, 'ATOS PRIME', 1),
(167, 20, 'COUPE', 1),
(168, 20, 'ELANTRA', 1),
(169, 20, 'I 10', 1),
(170, 20, 'I 30', 1),
(171, 20, 'MATRIX', 1),
(172, 20, 'SANTA FE', 1),
(173, 20, 'SONATA', 1),
(174, 20, 'TERRACAN', 1),
(175, 20, 'TRAJET', 1),
(176, 20, 'TUCSON', 1),
(177, 20, 'VELOSTER', 1),
(178, 20, 'VERACRUZ', 1),
(179, 21, 'AMIGO', 1),
(180, 21, 'PICK-UP CABIAN SIMPL', 1),
(181, 21, 'PICK-UP SPACE CAB', 1),
(182, 21, 'PICK-UP CABINA DOBLE', 1),
(183, 21, 'TROOPER', 1),
(184, 22, 'X-TYPE', 1),
(185, 22, 'XF', 1),
(186, 22, 'F-TYPE', 1),
(187, 22, 'S-TYPE', 1),
(188, 22, 'XJ', 1),
(189, 22, 'XK', 1),
(190, 23, 'CHEROKEE', 1),
(191, 23, 'COMPASS', 1),
(192, 23, 'GRAND CHEROKEE', 1),
(193, 23, 'PATRIOT', 1),
(194, 23, 'WRANGLER', 1),
(195, 24, 'CARENS', 1),
(196, 24, 'CARNIVAL', 1),
(197, 24, 'CERATO', 1),
(198, 24, 'MAGENTIS', 1),
(199, 24, 'MOHAVE', 1),
(200, 24, 'OPIRUS', 1),
(201, 24, 'PICANTO', 1),
(202, 24, 'RIO', 1),
(203, 24, 'RONDO', 1),
(204, 24, 'SPORTAGE', 1),
(205, 24, 'GRAND SPORTAGE', 1),
(206, 24, 'SORENTO', 1),
(207, 24, 'SOUL', 1),
(208, 24, 'PREGIO', 1),
(209, 25, 'AFALINA', 1),
(210, 25, 'SAMARA', 1),
(211, 26, 'DEFENDER', 1),
(212, 26, 'DISCOVERY', 1),
(213, 26, 'FREELANDER', 1),
(214, 26, 'RANGE ROVER', 1),
(215, 27, 'LS', 1),
(216, 27, 'GS', 1),
(217, 27, 'IS', 1),
(218, 28, 'QUATTROPORTE', 1),
(219, 28, 'COUPE', 1),
(220, 28, 'GRAND TURISMO', 1),
(221, 28, 'SPYDER', 1),
(222, 29, '323', 1),
(223, 29, '626', 1),
(224, 29, 'MPV', 1),
(225, 29, 'B 2500', 1),
(226, 29, 'B 2900', 1),
(227, 30, 'AMG', 1),
(228, 30, 'CLASE A', 1),
(229, 30, 'CLASE B', 1),
(230, 30, 'CLASE C', 1),
(231, 30, 'CLASE CL', 1),
(232, 30, 'CLASE CLA', 1),
(233, 30, 'CLASE CLC', 1),
(234, 30, 'CLASE CLK', 1),
(235, 30, 'CLASE CLS', 1),
(236, 30, 'CLASE E', 1),
(237, 30, 'CLASE G', 1),
(238, 30, 'CLASE GL', 1),
(239, 30, 'CLASE ML', 1),
(240, 30, 'CLASE S', 1),
(241, 30, 'CLASE SL', 1),
(242, 30, 'CLASE SLK', 1),
(243, 30, 'VIANO', 1),
(244, 31, 'MGF', 1),
(245, 32, 'COOPER', 1),
(246, 33, 'CANTER', 1),
(247, 33, 'L-200', 1),
(248, 33, 'LANCER', 1),
(249, 33, 'MONTERO', 1),
(250, 33, 'NATIVA', 1),
(251, 33, 'OUTLANDER', 1),
(252, 34, '350', 1),
(253, 34, '370Z', 1),
(254, 34, 'PATHFINDER', 1),
(255, 34, 'FRONTIER', 1),
(256, 34, 'MARCH', 1),
(257, 34, 'MURANO', 1),
(258, 34, 'NP300', 1),
(259, 34, 'PICK-UP', 1),
(260, 34, 'SENTRA', 1),
(261, 34, 'TEANA', 1),
(262, 34, 'TERRANO II', 1),
(263, 34, 'TIIDA', 1),
(264, 34, 'VERSA', 1),
(265, 34, 'X-TERRA', 1),
(266, 34, 'X-TRAIL', 1),
(267, 35, '106', 1),
(268, 35, '206', 1),
(269, 35, '207', 1),
(270, 35, '208', 1),
(271, 35, '306', 1),
(272, 35, '307', 1),
(273, 35, '308', 1),
(274, 35, '3008', 1),
(275, 35, '405', 1),
(276, 35, '406', 1),
(277, 35, '407', 1),
(278, 35, '408', 1),
(279, 35, '4008', 1),
(280, 35, '508', 1),
(281, 35, '5008', 1),
(282, 35, '607', 1),
(283, 35, '806', 1),
(284, 35, '807', 1),
(285, 35, 'RCZ', 1),
(286, 35, 'EXPERT', 1),
(287, 35, 'HOGGAR', 1),
(288, 35, 'PARTNER', 1),
(289, 35, 'BOXER', 1),
(290, 36, '911', 1),
(291, 36, 'BOXSTER', 1),
(292, 36, 'CAYENNE', 1),
(293, 36, 'CAYMAN', 1),
(294, 36, 'PANAMERA', 1),
(295, 37, '1500', 1),
(296, 37, '2500', 1),
(297, 38, 'CLIO MIO', 1),
(298, 38, 'CLIO L/NUEVA', 1),
(299, 38, 'CLIO 2', 1),
(300, 38, 'DUSTER', 1),
(301, 38, 'FLUENCE', 1),
(302, 38, 'KANGOO', 1),
(303, 38, 'KANGOO FURGON', 1),
(304, 38, 'KOLEOS', 1),
(305, 38, 'LAGUNA', 1),
(306, 38, 'LATITUDE', 1),
(307, 38, 'LOGAN', 1),
(308, 38, 'MEGANE', 1),
(309, 38, 'MEGANE II', 1),
(310, 38, 'MEGANE III', 1),
(311, 38, 'SANDERO', 1),
(312, 38, 'SANDERO STEPWAY', 1),
(313, 38, 'SCENIC', 1),
(314, 38, 'SYMBOL', 1),
(315, 38, 'TWINGO', 1),
(316, 38, 'TRAFIC', 1),
(317, 38, 'MASTER', 1),
(318, 39, 'LINEA 25', 1),
(319, 39, 'LINEA 45', 1),
(320, 39, 'LINEA 75', 1),
(321, 39, 'LINEA 9.3', 1),
(322, 39, 'LINEA 9.5', 1),
(323, 40, 'ALHAMBRA', 1),
(324, 40, 'ALTEA', 1),
(325, 40, 'CORDOBA', 1),
(326, 40, 'IBIZA', 1),
(327, 40, 'INCA FURGON', 1),
(328, 40, 'LEON', 1),
(329, 40, 'TOLEDO', 1),
(330, 41, 'FORTWO', 1),
(331, 42, 'ACTYON', 1),
(332, 42, 'KORANDO', 1),
(333, 42, 'KYRON', 1),
(334, 42, 'ISTANA', 1),
(335, 42, 'MUSSO', 1),
(336, 42, 'REXTON', 1),
(337, 42, 'STAVIC', 1),
(338, 43, 'IMPREZA', 1),
(339, 43, 'LEGACY', 1),
(340, 43, 'OUTBACK', 1),
(341, 43, 'TRIBECA', 1),
(342, 43, 'XV', 1),
(343, 43, 'FORESTER', 1),
(344, 44, 'FUN', 1),
(345, 44, 'GRAND VITARA', 1),
(346, 44, 'SWIFT', 1),
(347, 44, 'JIMNY', 1),
(348, 45, '207 TELCOLINE', 1),
(349, 46, 'SUMO', 1),
(350, 47, '86', 1),
(351, 47, 'AVENSIS', 1),
(352, 47, 'CAMRY', 1),
(353, 47, 'COROLLA', 1),
(354, 47, 'CORONA', 1),
(355, 47, 'ETIOS', 1),
(356, 47, 'ETIOS CROSS', 1),
(357, 47, 'HILUX', 1),
(358, 47, 'LAND CRUISER', 1),
(359, 47, 'PRIUS', 1),
(360, 47, 'RAV 4', 1),
(361, 48, 'AMAROK', 1),
(362, 48, 'BORA', 1),
(363, 48, 'CADDY', 1),
(364, 48, 'CROSSFOX', 1),
(365, 48, 'FOX', 1),
(366, 48, 'GOL', 1),
(367, 48, 'GOL TREND', 1),
(368, 48, 'GOLF', 1),
(369, 48, 'MULTIVAN', 1),
(370, 48, 'THE BEETLE', 1),
(371, 48, 'NEW BEETLE', 1),
(372, 48, 'PASSAT', 1),
(373, 48, 'CC', 1),
(374, 48, 'POLO', 1),
(375, 48, 'SANTANA', 1),
(376, 48, 'SAVEIRO', 1),
(377, 48, 'SCIROCCO', 1),
(378, 48, 'SHARAN', 1),
(379, 48, 'SURAN', 1),
(380, 48, 'TIGUAN', 1),
(381, 48, 'TOUAREG', 1),
(382, 48, 'TRANSPORTER', 1),
(383, 48, 'UP', 1),
(384, 48, 'VENTO', 1),
(385, 48, 'VOYAGE', 1),
(386, 49, 'C30', 1),
(387, 49, 'C70', 1),
(388, 49, 'S40', 1),
(389, 49, 'S60', 1),
(390, 49, 'S80', 1),
(391, 49, 'V40', 1),
(392, 49, 'V50', 1),
(393, 49, 'V60', 1),
(394, 49, 'V70', 1),
(395, 49, 'XC60', 1),
(396, 49, 'XC70', 1),
(397, 49, 'XC90', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `folio` int(5) NOT NULL,
  `no_contrato_fk` bigint(20) NOT NULL,
  `no_transaccion` bigint(20) NOT NULL,
  `concepto` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL,
  `no_pago` int(5) NOT NULL,
  `detalles` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus_pago` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Pagos Realizados para cada contrato, según el calculo.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_archivo`
--

CREATE TABLE `tipo_archivo` (
  `id_tipo_archivo` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_uso` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prioridad` tinyint(2) NOT NULL DEFAULT 0,
  `estatus` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Definimos los tipos de archivos que se van a cargar';

--
-- Volcado de datos para la tabla `tipo_archivo`
--

INSERT INTO `tipo_archivo` (`id_tipo_archivo`, `nombre`, `tipo_uso`, `prioridad`, `estatus`) VALUES
(1, 'Imagenes', 'Catalogo', 0, 1),
(2, 'Placa', 'Vehiculo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_detalle`
--

CREATE TABLE `uso_detalle` (
  `no_vehiculo_fk` bigint(20) NOT NULL,
  `id_detalle_fk` int(5) NOT NULL,
  `valor` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detalles especificos de cada coche ya aplicado, con su valor';

--
-- Volcado de datos para la tabla `uso_detalle`
--

INSERT INTO `uso_detalle` (`no_vehiculo_fk`, `id_detalle_fk`, `valor`, `estatus`) VALUES
(1, 1, 'SI', 1),
(1, 2, 'NO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`no_cliente`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`no_vehiculo`),
  ADD KEY `id_modelo_fk` (`id_modelo_fk`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`no_contrato`),
  ADD KEY `no_empleado_fk` (`no_empleado_fk`,`no_cliente_fk`,`no_vehiculo_fk`),
  ADD KEY `no_cliente_fk` (`no_cliente_fk`),
  ADD KEY `no_vehiculo_fk` (`no_vehiculo_fk`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `no_cliente_fk` (`no_cliente_fk`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`no_empleado`),
  ADD KEY `rfc_fk` (`id_empresa_fk`),
  ADD KEY `id_empresa_fk` (`id_empresa_fk`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `file_contrato`
--
ALTER TABLE `file_contrato`
  ADD PRIMARY KEY (`id_file_c`),
  ADD KEY `id_tipo_archivo_fk` (`id_tipo_archivo_fk`,`no_contrato_fk`),
  ADD KEY `no_contrato_fk` (`no_contrato_fk`);

--
-- Indices de la tabla `file_vechiculo`
--
ALTER TABLE `file_vechiculo`
  ADD PRIMARY KEY (`id_file_v`),
  ADD KEY `id_tipo_archivo_fk` (`id_tipo_archivo_fk`,`no_vehiculo_fk`),
  ADD KEY `no_vehiculo_fk` (`no_vehiculo_fk`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca_fk` (`id_marca_fk`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `no_contrato_fk` (`no_contrato_fk`);

--
-- Indices de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  ADD PRIMARY KEY (`id_tipo_archivo`);

--
-- Indices de la tabla `uso_detalle`
--
ALTER TABLE `uso_detalle`
  ADD PRIMARY KEY (`no_vehiculo_fk`,`id_detalle_fk`),
  ADD KEY `no_vehiculo_fk` (`no_vehiculo_fk`,`id_detalle_fk`),
  ADD KEY `id_detalle_fk` (`id_detalle_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_contrato`
--
ALTER TABLE `file_contrato`
  MODIFY `id_file_c` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_vechiculo`
--
ALTER TABLE `file_vechiculo`
  MODIFY `id_file_v` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `folio` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  MODIFY `id_tipo_archivo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coche`
--
ALTER TABLE `coche`
  ADD CONSTRAINT `coche_ibfk_1` FOREIGN KEY (`id_modelo_fk`) REFERENCES `modelo` (`id_modelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`no_empleado_fk`) REFERENCES `empleado` (`no_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`no_cliente_fk`) REFERENCES `cliente` (`no_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`no_vehiculo_fk`) REFERENCES `coche` (`no_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`no_cliente_fk`) REFERENCES `cliente` (`no_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_empresa_fk`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `file_contrato`
--
ALTER TABLE `file_contrato`
  ADD CONSTRAINT `file_contrato_ibfk_1` FOREIGN KEY (`id_tipo_archivo_fk`) REFERENCES `tipo_archivo` (`id_tipo_archivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_contrato_ibfk_2` FOREIGN KEY (`no_contrato_fk`) REFERENCES `contrato` (`no_contrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `file_vechiculo`
--
ALTER TABLE `file_vechiculo`
  ADD CONSTRAINT `file_vechiculo_ibfk_1` FOREIGN KEY (`no_vehiculo_fk`) REFERENCES `coche` (`no_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_vechiculo_ibfk_2` FOREIGN KEY (`id_tipo_archivo_fk`) REFERENCES `tipo_archivo` (`id_tipo_archivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca_fk`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`no_contrato_fk`) REFERENCES `contrato` (`no_contrato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `uso_detalle`
--
ALTER TABLE `uso_detalle`
  ADD CONSTRAINT `uso_detalle_ibfk_1` FOREIGN KEY (`id_detalle_fk`) REFERENCES `detalle` (`id_detalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uso_detalle_ibfk_2` FOREIGN KEY (`no_vehiculo_fk`) REFERENCES `coche` (`no_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
