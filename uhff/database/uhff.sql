-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2018 a las 01:56:36
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `uhff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cash_cut`
--

CREATE TABLE IF NOT EXISTS `cash_cut` (
`id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `amount` float NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_min` int(11) NOT NULL,
  `product_price_by_store_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`, `quantity_min`, `product_price_by_store_id`) VALUES
(3, 41, 20, 6),
(4, 22, 20, 7),
(5, 33, 20, 8),
(6, 30, 20, 9),
(7, 30, 20, 10),
(8, 30, 20, 11),
(9, 30, 20, 12),
(11, 30, 20, 14),
(12, 123, 20, 15),
(13, 30, 20, 16),
(14, 30, 20, 17),
(16, 30, 20, 19),
(17, 30, 20, 20),
(18, 30, 20, 21),
(19, 30, 20, 22),
(20, 30, 20, 23),
(21, 30, 20, 24),
(22, 30, 20, 25),
(25, 30, 20, 28),
(26, 30, 20, 29),
(27, 30, 20, 30),
(28, 30, 20, 31),
(29, 30, 20, 32),
(30, 30, 20, 33),
(32, 30, 20, 35),
(33, 30, 20, 36),
(34, 30, 20, 37),
(35, 30, 20, 38),
(36, 30, 20, 39),
(37, 30, 20, 40),
(38, 30, 20, 41),
(40, 30, 20, 43),
(42, 30, 20, 45),
(44, 30, 20, 47),
(45, 30, 20, 48),
(46, 30, 20, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measure_units`
--

CREATE TABLE IF NOT EXISTS `measure_units` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `abbr` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `measure_units`
--

INSERT INTO `measure_units` (`id`, `name`, `abbr`) VALUES
(1, 'Kilogramo', 'Kg'),
(2, 'Pieza', 'Pz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(300) NOT NULL,
  `measure_units_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `measure_units_id`) VALUES
(1, 'Aguas frescas', NULL, 'aguas_frescas.png', 2),
(2, 'Cacahuates', NULL, 'cacahuates.png', 2),
(3, 'Cafés', '', 'cafe.jpg', 2),
(4, 'Chamoyadas', NULL, 'chamoyadas.png', 2),
(5, 'Chasks', NULL, 'chasks.png', 1),
(6, 'Chispaletas', NULL, 'chispaletas.png', 2),
(7, 'Chocobananas', NULL, 'chocobananas.png', 2),
(8, 'Chocolate caliente', NULL, 'logo.jpg', 2),
(9, 'Churros', NULL, 'churros.png', 2),
(10, 'Dorilocos', NULL, 'dorilocos.png', 2),
(11, 'Frappes', NULL, 'frapuccino.png', 2),
(12, 'Fresas congeladas', NULL, 'fresas_congeladas.png', 2),
(13, 'Galletas', NULL, 'logo.jpg', 2),
(14, 'Helados', NULL, 'helados.png', 1),
(15, 'Malteadas', NULL, 'logo.jpg', 2),
(16, 'Mangonadas', NULL, 'mangonadas.png', 2),
(17, 'Otros', NULL, 'otros_11.png', 2),
(18, 'Paletas', NULL, 'paletas_leche.png', 2),
(19, 'Pasteles', NULL, 'pasteles.png', 2),
(20, 'Smothies', NULL, 'logo.jpg', 2),
(21, 'Sodas italianas', NULL, 'logo.jpg', 2),
(22, 'Tizanas', NULL, 'logo.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_price_by_store`
--

CREATE TABLE IF NOT EXISTS `product_price_by_store` (
`id` int(11) NOT NULL,
  `stores_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` varchar(45) NOT NULL,
  `description` varchar(50) NOT NULL,
  `secondary_measure_id` int(11) DEFAULT NULL,
  `sold_portions` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_price_by_store`
--

INSERT INTO `product_price_by_store` (`id`, `stores_id`, `products_id`, `price`, `description`, `secondary_measure_id`, `sold_portions`) VALUES
(6, 7, 1, '14', 'Aguas frescas', NULL, 1),
(7, 7, 2, '7', 'Sencillos', NULL, 1),
(8, 7, 3, '18', '18', NULL, 1),
(9, 7, 4, '22', 'Chamoyadas', NULL, 1),
(10, 7, 5, '18', '18', NULL, 1),
(11, 7, 6, '12', 'Chispaleta', NULL, 1),
(12, 7, 7, '8', 'Chocobanana', NULL, 1),
(14, 7, 9, '8', 'Sencillos', NULL, 1),
(15, 7, 10, '20', 'Dorilocos', NULL, 1),
(16, 7, 11, '22', '22', NULL, 1),
(17, 7, 12, '20', 'Fresas congeladas', NULL, 1),
(19, 7, 14, '12', '1 bolita', 1, 1),
(20, 7, 15, '25', 'Malteadas', NULL, 1),
(21, 7, 16, '10', 'Mangonada', NULL, 1),
(22, 7, 17, '1', 'Bolis', NULL, 1),
(23, 7, 18, '2.5', 'Chiquitas', NULL, 1),
(24, 7, 19, '14', '14', NULL, 1),
(25, 7, 20, '22', 'Smothies', NULL, 1),
(28, 8, 1, '14', 'Aguas frescas', NULL, 1),
(29, 8, 2, '8', 'Sencillos', NULL, 1),
(30, 8, 3, '18', '18', NULL, 1),
(31, 8, 4, '28', 'Chamoyadas', NULL, 1),
(32, 8, 5, '18', '18', NULL, 1),
(33, 8, 6, '14', 'Chispaletas', NULL, 1),
(35, 8, 8, '20', 'Chocolate caliente', NULL, 1),
(36, 8, 9, '10', 'Sencillos', NULL, 1),
(37, 8, 10, '22', 'Dorilocos', NULL, 1),
(38, 8, 11, '28', '28', NULL, 1),
(39, 8, 12, '20', '20', NULL, 1),
(40, 8, 13, '2', 'Galletas', NULL, 1),
(41, 8, 14, '14', '14', NULL, 1),
(43, 8, 16, '10', 'Mangonadas', NULL, 1),
(45, 8, 18, '2', 'Chiquitas', NULL, 1),
(47, 8, 20, '28', 'Smothies', NULL, 1),
(48, 8, 21, '20', '20', NULL, 1),
(49, 8, 22, '25', 'Tizanas', NULL, 1),
(72, 7, 5, '20', '20', NULL, 1),
(73, 7, 5, '22', '22', NULL, 1),
(74, 7, 14, '18', '1.5 bolitas', 1, 1.5),
(75, 7, 14, '22', '2 bolitas', 1, 2),
(76, 7, 18, '12', 'Agua', NULL, 1),
(77, 7, 18, '15', 'Leche', NULL, 1),
(78, 7, 18, '18', 'Rellenas', NULL, 1),
(79, 7, 9, '15', 'Preparados', NULL, 1),
(80, 7, 2, '14', 'Preparados', NULL, 1),
(81, 7, 19, '16', '16', NULL, 1),
(82, 7, 19, '18', '18', NULL, 1),
(83, 7, 11, '22', '22', NULL, 1),
(84, 7, 11, '25', '25', NULL, 1),
(85, 7, 3, '23', '23', NULL, 1),
(86, 7, 17, '3', 'Juguitos', NULL, 1),
(87, 7, 17, '18', 'Paleta BonBon', NULL, 1),
(88, 7, 17, '11', 'Kinder Delice', NULL, 1),
(89, 7, 17, '8', 'Bubulubu', NULL, 1),
(90, 8, 5, '20', '20', NULL, 1),
(91, 8, 5, '22', '22', NULL, 1),
(92, 8, 14, '24', '24', NULL, 1),
(93, 8, 18, '12', 'Agua', NULL, 1),
(94, 8, 18, '15', 'Leche', NULL, 1),
(95, 8, 18, '18', 'Rellenas', NULL, 1),
(96, 8, 9, '18', 'Preparados', NULL, 1),
(97, 8, 2, '15', 'Preparados', NULL, 1),
(98, 8, 12, '25', '25', NULL, 1),
(99, 8, 11, '30', '30', NULL, 1),
(100, 8, 3, '20', '20', NULL, 1),
(101, 8, 3, '25', '25', NULL, 1),
(102, 8, 21, '11', '11', NULL, 1),
(103, 7, 14, '1232', '10 bolitass', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `product_price_by_store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secondary_measure`
--

CREATE TABLE IF NOT EXISTS `secondary_measure` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `portion` float NOT NULL,
  `measure_units_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secondary_measure`
--

INSERT INTO `secondary_measure` (`id`, `name`, `portion`, `measure_units_id`) VALUES
(1, 'bolita', 0.2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `phone`) VALUES
(7, 'Coeneo', 'Allende 23, Col. Centro, Coeneo', '1234556789'),
(8, 'Purepero', 'Allende 23, Col. Centro, Purepero', '1234556789'),
(9, 'Todas', 'TODAS', '1234556789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `token` varchar(45) NOT NULL,
  `product_price_by_store_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `user_roles_id` int(11) NOT NULL,
  `stores_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `last_name`, `user_roles_id`, `stores_id`) VALUES
(5, 'admin', 'uhTEmn9T26tIA', 'admin', 'admin', 15, 9),
(6, 'carlos', 'uhJEEMYv27uRA', 'Carlos', 'Ruiz', 15, 7),
(7, 'oscar', 'uhzeqE4Az.SW.', 'Oscar', 'Orozco', 16, 7),
(8, 'cary', 'uhs54CSUxys6A', 'Karina', 'Rojas', 15, 9),
(9, 'luis', 'uhnB3UnZIiY82', 'Luis', 'Perez', 16, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
`id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`) VALUES
(15, 'administrator'),
(16, 'seller');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cash_cut`
--
ALTER TABLE `cash_cut`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cash_cut_users1_idx` (`users_id`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `product_price_by_store_id_UNIQUE` (`product_price_by_store_id`), ADD KEY `fk_inventory_product_price_by_store1_idx` (`product_price_by_store_id`);

--
-- Indices de la tabla `measure_units`
--
ALTER TABLE `measure_units`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD KEY `fk_products_measure_units1_idx` (`measure_units_id`);

--
-- Indices de la tabla `product_price_by_store`
--
ALTER TABLE `product_price_by_store`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_stores_has_products_products1_idx` (`products_id`), ADD KEY `fk_stores_has_products_stores_idx` (`stores_id`), ADD KEY `fk_product_price_by_store_secondary_measure1_idx` (`secondary_measure_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sales_users1_idx` (`users_id`), ADD KEY `fk_sales_product_price_by_store1_idx` (`product_price_by_store_id`);

--
-- Indices de la tabla `secondary_measure`
--
ALTER TABLE `secondary_measure`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_secondary_measure_measure_units1_idx` (`measure_units_id`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tickets_product_price_by_store1_idx` (`product_price_by_store_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_users_user_roles1_idx` (`user_roles_id`), ADD KEY `fk_users_stores1_idx` (`stores_id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cash_cut`
--
ALTER TABLE `cash_cut`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventory`
--
ALTER TABLE `inventory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `measure_units`
--
ALTER TABLE `measure_units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `product_price_by_store`
--
ALTER TABLE `product_price_by_store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secondary_measure`
--
ALTER TABLE `secondary_measure`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user_roles`
--
ALTER TABLE `user_roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cash_cut`
--
ALTER TABLE `cash_cut`
ADD CONSTRAINT `fk_cash_cut_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `fk_inventory_product_price_by_store1` FOREIGN KEY (`product_price_by_store_id`) REFERENCES `product_price_by_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `fk_products_measure_units1` FOREIGN KEY (`measure_units_id`) REFERENCES `measure_units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_price_by_store`
--
ALTER TABLE `product_price_by_store`
ADD CONSTRAINT `fk_product_price_by_store_secondary_measure1` FOREIGN KEY (`secondary_measure_id`) REFERENCES `secondary_measure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_stores_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_stores_has_products_stores` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
ADD CONSTRAINT `fk_sales_product_price_by_store1` FOREIGN KEY (`product_price_by_store_id`) REFERENCES `product_price_by_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_sales_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secondary_measure`
--
ALTER TABLE `secondary_measure`
ADD CONSTRAINT `fk_secondary_measure_measure_units1` FOREIGN KEY (`measure_units_id`) REFERENCES `measure_units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `fk_tickets_product_price_by_store1` FOREIGN KEY (`product_price_by_store_id`) REFERENCES `product_price_by_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_stores1` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_users_user_roles1` FOREIGN KEY (`user_roles_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
