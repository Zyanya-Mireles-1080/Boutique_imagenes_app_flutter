-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 04:26:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zyanyas_clothes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `promocion` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `audiencia` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_proveedor`, `nombre`, `cantidad`, `promocion`, `audiencia`, `descripcion`) VALUES
(1, 1, 'Suéteres', 100, '2 x 1 ', 'Mujer', 'Suéteres de Punto de Cable, Jerséis, y suéteres sueltos y holgados '),
(2, 1, 'Suéteres ', 100, '2 x 1', 'Hombre', 'Suéteres de cuello redondo, jerséis, unicolor, holgados y con bordado de letra'),
(3, 2, 'Blusas', 120, 'Sin promoc', 'Mujer', 'Blusas de manga farol, unicolor, 2 en 1 y de cuello cuadrado de manga obispo'),
(4, 2, 'Camisas', 120, 'Sin promoc', 'Hombre', 'Camisas de manga larga casuales, de hombros caídos, unicolor y con doble bolsillo'),
(5, 3, 'Pantalones', 90, 'Sin promoc', 'Mujer ', 'Pantalones de traje, Jeans, elegantes, de cargo de bolsillo y con cinturón'),
(6, 3, 'Pantalones', 90, 'Sin promoc', 'Hombre', 'Pantalones de cargo, Jeans, unicolor, rectos y vaqueros'),
(7, 4, 'Vestidos', 110, 'Sin promoc', 'Mujer', 'Vestidos con estampado, de manga farol, con fruncido, de cuello cruzado y elegantes'),
(8, 4, 'Trajes', 110, 'Sin promoc', 'Hombre', 'Trajes sencillos, de negocios, casuales y unicolor'),
(9, 5, 'Conjuntos ', 80, '2 x 1', 'Niños', 'Conjuntos de niño y niña. Tops, shorts, pantalones, faldas, chalecos, camisas y trajes deportivos'),
(10, 6, 'Conjuntos', 70, 'Sin promoc', 'Bebés', 'Conjunto de bebés de niña y niño, bodis, shorts, vestidos, petos, sudaderas y monos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `telefono`, `direccion`, `correo`, `contrasena`, `fecha_registro`) VALUES
(1, 'Zyanya', '656264286', 'sta. carolina 2352', 'zyanya@gmail.com', '$2y$10$Pgh8ILB48LnpO4W3ffne2uOpSrqP7EX8zhMR.jkByOzClxObRPj7y', '2024-11-24 23:53:27'),
(12, 'dante', '656320964', 'bjfdfkgotifogoui', 'mlhuguhigu@hotmail.com', '$2y$10$cfJ2H6pzpEEq.B.BarTCVOibQi0/VNiS0kCTn1FPv4wcH9hDS2Ggq', '2024-11-25 21:52:29'),
(13, 'Tajani', '656526118', 'San Atalo, Misiones del Real, Cd. Juárez', 'tajani@gamil.com', '$2y$10$QxaRq/epKlYSZ6Qrl5Lsj.Ju8SX4DQHqQ5gy5EVEVdtIxYZvmVZ8i', '2024-11-26 03:27:41'),
(14, 'mel', '656221270', 'calle patito', 'mel@florsa2', '$2y$10$9w0jLIqfRNqk38yzOiP5z.7H5i1acy2eHHEnSOcqE3SnUD3sO79MK', '2024-11-26 15:58:32'),
(15, 'LETICIA', '656123456', 'LOCURA 7043', 'LOCURA@GMAIL.COM', '$2y$10$HMF8M1pYs27CLuZIbVKryeNAI7O5hKQrQTLzEdLjMK7RRcBcc1GfK', '2024-11-26 16:57:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `turno` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sueldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `telefono`, `direccion`, `correo`, `turno`, `sueldo`) VALUES
(2, 'Agustina Gaspar', '6567634274', 'Sta. Berenice 22A, Misiones, C', 'agustina@gmail.com', '6:00 am a 2:00pm', 1500),
(3, 'Zyanya Mireles', '6562642965', 'Calle Paseo de los Compositore', 'zyanya@gmail.com', '2:00pm a 9:00pm', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` date NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `total`, `cantidad`, `id_producto`, `fecha`, `fecha_entrega`, `id_empleado`) VALUES
(7, 1, 900, 3, 1, '2024-11-25 21:49:38', '0000-00-00', 2),
(11, 12, 618, 2, 24, '2024-11-26 01:41:43', '0000-00-00', 3),
(55, 1, 330, 1, 4, '2024-11-26 05:38:05', '0000-00-00', 2),
(64, 15, 500, 1, 12, '2024-11-26 16:57:51', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `precio` float NOT NULL,
  `tallas` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `color` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_proveedor`, `nombre`, `precio`, `tallas`, `color`, `imagen`) VALUES
(1, 1, 1, 'Suéter de Punto de Cable con Hombro Caído ', 300, 'S M G XL ', 'Guinda', 'img1.png'),
(2, 1, 1, 'Jersey tejido de canalé de manga obispo', 380, 'S M G XL', 'Negro', 'img2.png'),
(3, 1, 1, 'Suéter suelto con patrón de corazón vintage ', 300, 'S M G XL', 'Beige', 'img3.png'),
(4, 1, 1, 'Suéter de manga larga con forro polar, grueso, caído y estilizado', 330, 'S M G XL', 'Café', 'img4.png'),
(5, 1, 1, 'Suéter holgado de cuello alto con caída de hombros casual', 350, 'S M G XL', 'Café', 'img5.png'),
(6, 3, 2, 'Blusa tejido de canalé de manga farol', 200, 'S M G XL ', 'Perla', 'img6.png'),
(7, 3, 2, 'Blusa de oficina de manga farol con cintura fruncida y bajo con abertura unicolor', 260, 'S M G XL', 'Café', 'img7.png'),
(8, 3, 2, 'Blusa unicolor con botón delantero de manga farol', 250, 'S M G XL', 'Beige', 'img8.png'),
(9, 3, 2, 'Blusa 2 en 1 de cuello en contraste tejido de cable ', 370, 'S M G XL', 'Café', 'img9.png'),
(10, 3, 2, 'Blusa de cuello cuadrado de manga obispo', 250, 'S M G XL', 'Blanco', 'img10.png'),
(11, 5, 3, 'Pantalón de traje unicolor de talle alto de pierna recta', 390, '7  9 11 12 ', 'Café', 'img11.png'),
(12, 5, 3, 'Jeans de talle alto de pierna ancha', 500, '7 9 11 12', 'Mezclilla', 'img12.png'),
(13, 5, 3, 'Pantalón de ancho de cintura alta, elegante y casual', 428, '7 9 11 12', 'Rosa palo', 'img13.png'),
(14, 5, 3, 'Pantalón cargo con bolsillo lateral con solapa', 550, '7 9 11 12', 'Negro', 'img14.png'),
(15, 5, 3, 'Pantalón de pierna ancha unicolor con cinturón', 460, '7 9 11 12', 'Café', 'img15.png'),
(16, 7, 4, 'Vestido con estampado floral con cordón delantero de manga farol', 100, 'S M G XL ', 'Beige', 'img16.png'),
(17, 7, 4, 'Vestido bajo con fruncido de manga farol', 320, 'S M G XL', 'Café', 'img17.png'),
(18, 7, 4, 'Vestido con fruncido de manga farol bajo a capas', 329, 'S M G XL', 'Menta', 'img18.png'),
(19, 7, 4, 'Vestido de cuello cruzado bajo con fruncido', 400, 'S M G XL', 'Perla', 'img19.png'),
(20, 7, 4, 'Vestido línea A girante delantero de manga farol', 200, 'S M G XL', 'Café', 'img20.png'),
(21, 2, 1, 'Jersey informal de cuello redondo de color liso y manga larga ', 248, 'S M G XL ', 'Negro', 'img1.png'),
(22, 2, 1, 'Suéter de cuello redondo unicolor ', 300, 'S M G XL', 'Azul', 'img2.png'),
(23, 2, 1, 'Jersey holgado de cuello redondo, mangas largas y hombros caídos ', 348, 'S M G XL ', 'Café', 'img3.png'),
(24, 2, 1, 'Suéter casual de color marrón solido ', 309, 'S M G XL', 'Café', 'img4.png'),
(25, 2, 1, 'Suéter con bordado de letra', 334, 'S M G XL', 'Beige', 'img5.png'),
(26, 4, 2, 'Camisa de manga larga casual y sencilla con bolsillo con parche', 200, 'S M G XL ', 'Café', 'img6.png'),
(27, 4, 2, 'Camisa de hombros caídos con botón delantero', 185, 'S M G XL', 'Negro', 'img7.png'),
(28, 4, 2, 'Camisa casual de manga larga con cuello vuelto de unicolor simple', 242, 'S M G XL', 'Azul marino', 'img8.png'),
(29, 4, 2, 'Camisa con doble bolsillo con botón', 230, 'S M G XL', 'Verde olivo', 'img9.png'),
(30, 4, 2, 'Camisa con parche con bolsillo de hombros caídos', 190, 'S M G XL', 'Beige', 'img10.png'),
(31, 6, 3, 'Pantalón cargo de pierna recta con bolsillo con solapa de unicolor casual', 380, '32 34 36 38', 'Café', 'img11.png'),
(32, 6, 3, 'Jeans de pierna recta con bolsillo oblicuo', 350, '32 34 36 38', 'Negro', 'img12.png'),
(33, 6, 3, 'Pantalón unicolor con diseño con costura', 370, '32 34 36 38', 'Negro', 'img13.png'),
(34, 6, 3, 'Pantalón recto unicolor', 320, '32 34 36 38', 'Negro', 'img14.png'),
(35, 6, 3, 'Pantalón vaquero con bolsillo liso', 360, '32 34 36 38', 'Mezclilla', 'img15.png'),
(36, 8, 4, 'Traje unicolor sencillo y diario, de manga larga con pantalón largo', 952, 'S M G XL ', 'Negro', 'img16.png'),
(37, 8, 4, 'Traje unicolor de manga larga con abotonadura simple y pantalón de negocios casual', 936, 'S M G XL', 'Negro', 'img17.png'),
(38, 8, 4, 'Manfinity Mode Traje de negocios y casual de un solo pecho ', 763, 'S M G XL', 'Azul', 'img18.png'),
(39, 8, 4, 'Traje de negocios informal unicolor con cuello de chal de manda larga ', 780, 'S M G XL', 'Negro', 'img19.png'),
(40, 8, 4, 'Traje de manga larga con cuello Mao y pantalón ', 1026, 'S M G XL', 'Verde ', 'img20.png'),
(41, 9, 5, 'Conjunto de Top de Manga Corta de Moda de Tela Texturizada Con Dobladillo y Cinturón de Cintura', 214, '4 6 8 10', 'Verde', 'img1.png'),
(42, 9, 5, 'Conjunto de 2 piezas con Top de tirantes y shorts de unicolor', 250, '4 6 8 10 ', 'Azul', 'img2.png'),
(43, 9, 5, 'Conjunto de Pantalones y Blusa Con Dobladillo de Volante', 262, '4 6 8 10', 'Verde', 'img3.png'),
(44, 9, 5, 'Conjunto de camisa y falda con cinturón de nuevo estilo casual y simple', 230, '4 6 8 10', 'Beige', 'img4.png'),
(45, 9, 5, 'Conjunto de Dos Piezas Con Chaleco De Un Solo Botón y Pantalones Vaqueros de Pierna Ancha', 290, '4 6 8 10', 'Rosa', 'img5.png'),
(46, 9, 5, 'Camisa unicolor con parche de bolsillo con botón & Shorts sin camiseta', 199, '4 6 8 10', 'Café', 'img6.png'),
(47, 9, 5, 'Ribete de rayas Camisa polo & Shorts', 249, '4 6 8 10', 'Blanco', 'img7.png'),
(48, 9, 5, 'Conjunto con diseño de parche de letra Camisa & con bolsillo con solapa Shorts', 242, '4 6 8 10', 'Azul', 'img8.png'),
(49, 9, 5, 'Conjunto Deportivo Fresco y Casual De Tres Piezas Para Bebés', 279, '4 6 8 10', 'Naranja', 'img9.png'),
(50, 9, 5, 'Conjunto Camisa con botón & Shorts', 269, '4 6 8 10', 'Blanco y Café', 'img10.png'),
(51, 10, 6, 'Conjunto Casual de Bebpe Con Top De Manga Corta y Peto de Color Sólido', 208, '0M 3M 6M 12M', 'Blanco y Rosa', 'img1.png'),
(52, 10, 6, 'Bebé con estampado floral con fruncido Body de tirantes con Accesorio Diadema', 200, '0M 3M 6M 12M ', 'Rosa', 'img2.png'),
(53, 10, 6, 'Mono camisero con bolsillo oblicuo con cinturón', 190, '0M 3M 6M 12M', 'Azul', 'img3.png'),
(54, 10, 6, 'Conjunto con estampado de corazón ribete con fruncido Top peplum & Shorts', 210, '0M 3M 6M 12M', 'Rosa y Café', 'img4.png'),
(55, 10, 6, 'Vestido Con Cuello Lindo Y Cómodo', 250, '0M 3M 6M 12M ', 'Azul', 'img5.png'),
(56, 10, 6, 'Conjunto Capri con peto de lino y camilla con cuello', 230, '0M 3M 6M 12M', 'Blanco y Beige', 'img6.png'),
(57, 10, 6, 'Conjunto sudadera, joggers y gorro 2 en 1 de punto gofre ', 240, '0M 3M 6M 12M ', 'Verde', 'img7.png'),
(58, 10, 6, 'Conjunto de pantalones cortos ', 210, '0M 3M 6M 12M', 'Azul y Beige', 'img8.png'),
(59, 10, 6, 'Conjunto pantalones deportivos con sudadera con estampado de oso con forro térmico', 239, '0M 3M 6M 12M', 'Beige y Café', 'img9.png'),
(60, 10, 6, 'Mono con estampado de dibujos animados unido en contraste', 189, '0M 3M 6M 12M ', 'Blanco y Café', 'img10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo_producto` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ref_pago` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `telefono`, `correo`, `direccion`, `tipo_producto`, `ref_pago`) VALUES
(1, 'Agustina´s Clothes', '6567634274', 'agustina@gmail.com', 'Sta. Berenice 22A, Misiones, Cd. Juárez, Chihuahua', 'Suéteres', 'BBVA 07234567'),
(2, 'Sergio Clothes', '6566069118', 'sergio@gmail.com', 'San Cipriano 27B, Villa Residencial, Cd. Juárez, C', 'Blusas y camisas', 'BBVA 0987679'),
(3, 'Jonathan Pants', '6563456789', 'jonathan@gmail.com', 'Calle Paseo de los Compositores 23A, Compositores,', 'Pantalones', 'Banamex 78456726'),
(4, 'Mireles Elegant', '6562341234', 'elegantm@gmail.com', 'Sta. Artemisa 25B, Horizontes, Cd. Juárez, Chihuah', 'Vestidos y trajes', 'Banamex 65372309'),
(5, 'Arely´s Clothes', '6563456757', 'saul@gmail.com', 'Calle Torreón del Castillo 12A, Rinconadas, Cd. Ju', 'Conjuntos Niños', 'HSBC 6541278'),
(6, 'Baby´s Fashion', '6567563452', 'fashion@gmail.com', 'Calle Meza Central 35B, San Francisco, Cd. Juárez,', 'Conjuntos Bebés', 'HSBC 10293848');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
