-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2020 a las 08:55:58
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Mujeres', 'Regalos para', 'images/mujerdetalle.jpg'),
(2, 'Hombres', 'Regalos para', 'images/hombredetalle.jpg'),
(3, 'Niños', 'Regalos para', 'images/niñosdetalle.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ocasion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `ocasion`) VALUES
(1, 'CAJA PERSONALIZADA CON GIRASOLES, CHOCOLATES FERRERO Y FOTOGRAFÍA IMPRESA', 'INFORMACIÓN DETALLADA DE LO QUE INCLUYE:\r\nCaja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nGirasoles Premium\r\nCaja de Chocolates Ferrero corazón\r\nFoto impresa enviada por el cliente ', 40, 'regalo2.jpg', 5, 1, 'aniversario'),
(2, 'CAJA PERSONALIZADA CON ROSAS, CHOCOLATES FERRERO, CERVEZA CORONA Y OSO DE PELUCHE', 'INFORMACIÓN DETALLADA DE LO QUE INCLUYE:\r\nCaja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nCerveza Corona\r\nCaja de Chocolates Ferrero corazón\r\nOso de peluche pequeño según disponibilidad', 60, 'regalo1.jpg', 4, 1, 'aniversario'),
(3, 'CAJA PERSONALIZADA CON ROSAS, GIRASOLES Y CHOCOLATES FERRERO', 'INFORMACIÓN DETALLADA DE LO QUE INCLUYE:\r\nCaja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nGirasoles Premium\r\nCaja de Chocolates Ferrero corazón', 30, 'regalo3.jpg', 6, 1, 'aniversario'),
(4, 'CAJA BLANCA PERSONALIZADA CON ROSAS FUCSIAS, GIRASOLES, CHOCOLATES FERRERO Y LLAVERO PELUCHE', 'Caja de madera tapizada mate con letras fucsia\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nGirasol Premium\r\nCaja de Chocolates Ferrero corazón\r\nLlavero de peluche', 50, 'regalo4.jpg', 2, 1, 'aniversario'),
(5, 'CAJA GIGANTE PERSONALIZADA CON ROSAS Y GIRASOLES', 'Caja de madera tapizada mate con letras doradas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium \r\nGirasoles Premium', 65, 'regalo5.jpg', 3, 1, 'aniversario'),
(6, 'CAJA PERSONALIZADA CON GIRASOLES Y CHOCOLATES FERRERO', 'Caja de madera personalizada con letras doradas \r\nFrase personalizada a su gusto y elección\r\nGirasoles premium\r\nCaja de chocolates Ferrero corazón', 59, 'regalo6.jpg', 2, 1, 'aniversario'),
(7, 'CAJA SORPRESA PARA UN HINCHA 100% AMARILLO (BARCELONA ECUADOR)', 'Caja de madera rústica plywood\r\nFrase personalizada en la caja\r\nPalanca metálica para apertura de la caja\r\nJarro cervecero de vidrio Barcelona Ecuador\r\nDos latas de Coca Cola\r\nFunda de caramelos Skittles\r\nBarra de chocolates Snickers\r\nFunda de Manicris clásicos', 40, 'regalo7.jpg', 5, 2, 'dia del padre'),
(8, 'CAJA PERSONALIZADA CON ROSAS, CHOCOLATES FERRERO Y PELUCHE OSO', 'Caja de madera tapizada mate con letras rojas\r\nFrase personalizada a su gusto y elección\r\nRosas Premium\r\nCaja de Chocolates Ferrero corazón\r\nOso de peluche mediano', 55, 'regalo8.jpg', 4, 1, 'aniversario'),
(9, 'PELUCHE SPIDERMAN - AVENGERS - 20 CM', 'Peluche de coleción Spiderman\r\n20 cm', 10, 'regalo9.jpg', 2, 3, 'cumpleaños, dia del niño'),
(10, 'CAJA CERVECERA CUMPLEAÑOS EMELEC', 'Caja de cartón corrugado decorado con temática cumpleaños Emelec\r\nJarro cervecero de vidrio con temática Emelec\r\nCerveza Estella Artois\r\nChocolate Manicho barra\r\nChocolate Galak barra\r\nFunda de Manicris', 25, 'regalo10.jpg', 2, 2, 'dia del padre, hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_perfil` varchar(300) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
