-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 01:04:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ramirez_gonzalo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'procesador', 'marcas amd e intel', 'si'),
(2, 'Almacenamiento', 'Dispositivos HDD y SSD, Todas las marcas.', 'si'),
(3, 'Placas de video', 'Todas las gamas, todas las marcas, AMD y NVDIA', 'si'),
(4, 'Monitores', 'Monitores y television, todas las marcas, todas las medidas', 'si'),
(5, 'Mouses', 'Todas las marcas', 'si'),
(6, 'Motherboards', 'Todas las marcas', 'si'),
(7, 'Auriculares', 'Todas las marcas, todos los tipos', 'si'),
(8, 'Teclados', 'Todas las medidas, todos los modelos, mecanicos, opticos y de membrana', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `visto` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `asunto`, `mensaje`, `usuario_id`, `visto`) VALUES
(7, '¿Cuanto tarda el envio?', 'Hola buenas tardes, adquiri varios productos y quiero saber un aproximado de cuanto tarda un envio y si estos vienen de forma segura. Gracias', 16, 'no'),
(8, 'Garantia', 'Cuanto tiempo de garantia tienen los productos?', 18, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `visto` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellido`, `email`, `asunto`, `mensaje`, `visto`) VALUES
(15, 'Cristian', 'Romero', 'cristianRomero@hotmai.com', 'Productos nuevos?', 'Todos los productos que se comercializan, son nuevos o usados?', 'si'),
(16, 'Paulo', 'Dybala', 'paulo@hotmail.com', '¿Venden celulares?', 'Hola quisiera saber si venden celulares o solo venden productos de computadoras, estoy buscando un celular nuevo. Gracias', 'no'),
(18, 'lautaro', 'Martinez', 'lautaro@gmail.com', 'Teclado Logitech', 'El teclado logitech que disponen, aprox cuanto de vida util tiene? gracias', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesfactura`
--

CREATE TABLE `detallesfactura` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallesfactura`
--

INSERT INTO `detallesfactura` (`id`, `id_factura`, `id_producto`, `cantidad`, `subtotal`) VALUES
(4, 3, 28, 1, '32000.00'),
(5, 3, 11, 1, '70000.00'),
(6, 3, 18, 1, '120000.00'),
(7, 4, 22, 1, '86521.00'),
(8, 4, 15, 1, '72000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `importe_total` decimal(10,2) NOT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_usuario`, `importe_total`, `activo`, `fecha`) VALUES
(3, 16, '222000.00', '1', '2023-06-12 00:00:00'),
(4, 18, '158521.00', '1', '2023-06-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `nombre`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `activo`) VALUES
(9, 1, 'Ryzen 3 3100', 'Procesador amd', '31000.00', 12, '1685924547_a5dcbec18aa2e72c703a.png', 'si'),
(10, 1, 'Ryzen 5 5600', 'Procesador amd', '50000.00', 22, '1685918291_2eb1d5bb422ca84fe31d.png', 'si'),
(11, 1, ' Ryzen 5 7600X', 'procesador amd', '70000.00', 4, '1685918297_e136fa194bdec15ca886.png', 'si'),
(12, 1, 'Ryzen 7 7800', 'Procesador amd', '90000.00', 7, '1685918306_077b977a69c3fd608259.png', 'si'),
(13, 1, 'intel i3 10100', 'Procesador intel', '30000.00', 32, '1685918330_5bf4af73b583d6eb50dd.png', 'si'),
(14, 1, 'intel i5 13600', 'Procesador intel', '42000.00', 24, '1685918343_f29ec2b5988e00c6128f.png', 'si'),
(15, 1, 'intel i7 13700', 'Procesador intel', '72000.00', 2, '1685918351_fb5a850e164fc00f2557.png', 'si'),
(16, 2, 'SSD Samsung 870', 'Almacenamiento samsung ssd alta velocidad', '45000.00', 8, '1685918359_3544660201f56fb8e337.png', 'si'),
(17, 2, 'SSD ACER 1TB', 'Almacenamiento ssd alta velocidad', '38801.00', 5, '1685918367_d8cace96b8297a99f959.png', 'si'),
(18, 3, 'RTX 3080', 'Placa de video nvidia', '120000.00', 4, '1685918376_c0235f555b29a5cc63b4.png', 'si'),
(19, 3, 'rtx 3050', 'Placa de video nvidia', '75000.00', 7, '1685918392_c0ac1cbb1d188bd01a98.png', 'si'),
(20, 3, 'rx 6600xt', 'placa de video amd', '80000.00', 6, '1685918402_4950325c0f005a3bb313.png', 'si'),
(21, 3, 'RX 6750 XT', 'placa de video amd', '110000.00', 8, '1685918411_712618f2ce6eb71e88ae.png', 'si'),
(22, 4, 'SAMSUNG 32', 'monitor gamer samsung', '86521.00', 2, '1685918421_b04c0f9f3d03e0320e44.png', 'si'),
(23, 4, 'Monitor LG', 'LG 27 PULGADAS', '98251.00', 4, '1685918433_5a1683664894b817e11b.png', 'si'),
(24, 5, 'Logitech g203', 'mouse logitech gamer', '9000.00', 43, '1685918439_efb911b1e2b7977b204a.png', 'si'),
(25, 5, 'Redragon m913', 'Mouse redragon gamer', '6210.00', 16, '1685918448_4c26a9eb5c1785efa039.png', 'si'),
(26, 6, 'GIGABYTE Z790', 'placa madre alta gama', '54287.00', 3, '1685918459_66aac59f5aa30bdf1b26.png', 'si'),
(27, 6, 'GIGABYTE H610M', 'placa madre gama baja', '21000.00', 23, '1685918468_18fe4d442a8e464eecc9.png', 'si'),
(28, 7, 'HyperX Cloud II ', 'Auricular gamer con microfono', '32000.00', 4, '1685918480_7cd3d47ebf5a0e384119.png', 'si'),
(29, 7, 'Logitech g733', 'Auricular gamer logitech', '29850.00', 34, '1685918490_44757943ad5ee3a59a20.png', 'si'),
(30, 8, 'Redragon K617', 'teclado gamer mecanico', '12000.00', 54, '1685918500_27ac20626bf25601cc57.png', 'si'),
(31, 8, 'Logitech G815', 'teclado gamer mecanico', '29852.00', 32, '1685918510_e48c63dfa0ae91a9f15d.png', 'si'),
(33, 2, 'Disco Duro 1TB', '1 tb marca Seagate', '27000.00', 12, '1686598898_e4a0af96d2290dac56d0.png', 'si'),
(34, 2, 'Western Digital  1TB ', 'Disco duro 1tb', '29125.00', 21, '1686599016_a8f13ac52ca40280fe37.png', 'si'),
(35, 4, 'Monitor LG 19.5', 'Monitor gama baja gamer', '17581.00', 11, '1686599110_90edfe14ba6c8cba91ee.png', 'si'),
(36, 4, 'Monitor Philips 24', 'Monitor philips 24 pulgadas 60hz', '31584.00', 9, '1686599160_d25ea599ce2ee671aec0.png', 'si'),
(37, 5, 'Razer viper mini', 'Inalambrico gamer', '20000.00', 6, '1686599229_230b84d330ba73afa0e8.png', 'si'),
(38, 5, 'Mouse oficina', 'oficina comun', '7000.00', 24, '1686599298_4ad11bdc931fb0e8e550.png', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `password`, `perfil_id`, `baja`) VALUES
(16, 'Gonzalo', 'Ramirez', 'gonza37754@gmail.com', 'gonza', '$2y$10$eyFwopKar1bjnOsAMC8z8OMIffXg4gfY0wFq6leZPPXzA59irQmZS', 2, 'no'),
(17, 'admin', 'admin', 'admin@hotmail.com', 'admin', '$2y$10$Ileb4iFSgmFuqJiyKMmm.O58oe1AhAtemPuOWb6obDvwj..thkjEO', 1, 'no'),
(18, 'martin', 'palermo', 'martin@hotmail.com', 'martin', '$2y$10$ObBsRXuUXIP0ZW6GtiPC0eKeNzYGC5Y5tgovAY58GRjw94YKE0Qcq', 2, 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallesfactura`
--
ALTER TABLE `detallesfactura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detallesfactura_productos` (`id_producto`),
  ADD KEY `fk_detallesfactura_facturas` (`id_factura`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_facturas_usuarios` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detallesfactura`
--
ALTER TABLE `detallesfactura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detallesfactura`
--
ALTER TABLE `detallesfactura`
  ADD CONSTRAINT `fk_detallesfactura_facturas` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `fk_detallesfactura_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
