-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2018 a las 23:49:26
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uhff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cash_cut`
--

CREATE TABLE `cash_cut` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `amount` float NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cash_cut`
--

INSERT INTO `cash_cut` (`id`, `datetime`, `amount`, `users_id`) VALUES
(1, '2018-02-18 05:14:59', 247.5, 7),
(2, '2018-02-18 05:15:29', 14, 7),
(3, '2018-02-18 05:45:12', 14, 7),
(7, '2018-02-18 06:07:25', 14, 7),
(8, '2018-02-18 06:08:16', 107, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `quantity_min` float NOT NULL,
  `product_price_by_store_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `stores_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`, `quantity_min`, `product_price_by_store_id`, `products_id`, `stores_id`) VALUES
(1, 40, 20, 6, NULL, NULL),
(2, 50, 20, 7, 2, 7),
(3, 49, 20, 8, NULL, NULL),
(4, 50, 20, 9, NULL, NULL),
(5, 50, 20, 10, 5, 7),
(6, 50, 20, 11, NULL, NULL),
(7, 50, 20, 12, NULL, NULL),
(8, 50, 20, 14, 9, 7),
(9, 50, 20, 15, NULL, NULL),
(10, 50, 20, 16, NULL, NULL),
(11, 48, 20, 17, NULL, NULL),
(12, 41.4, 20, 19, 14, 7),
(13, 50, 20, 20, NULL, NULL),
(14, 50, 20, 21, NULL, NULL),
(15, 50, 20, 22, NULL, NULL),
(16, 49, 20, 23, NULL, NULL),
(17, 50, 20, 24, 19, 7),
(18, 50, 20, 25, NULL, NULL),
(19, 50, 20, 28, NULL, NULL),
(20, 50, 20, 29, 2, 8),
(21, 50, 20, 30, NULL, NULL),
(22, 50, 20, 31, NULL, NULL),
(23, 50, 20, 32, 5, 8),
(24, 50, 20, 33, NULL, NULL),
(25, 50, 20, 35, NULL, NULL),
(26, 50, 20, 36, 9, 8),
(27, 50, 20, 37, NULL, NULL),
(28, 50, 20, 38, NULL, NULL),
(29, 50, 20, 39, NULL, NULL),
(30, 50, 20, 40, NULL, NULL),
(31, 50, 20, 41, 14, 8),
(32, 50, 20, 43, NULL, NULL),
(33, 50, 20, 45, NULL, NULL),
(34, 50, 20, 47, NULL, NULL),
(35, 50, 20, 48, NULL, NULL),
(36, 50, 20, 49, NULL, NULL),
(37, 49, 20, 76, NULL, NULL),
(38, 49, 20, 77, NULL, NULL),
(39, 49, 20, 78, NULL, NULL),
(40, 50, 20, 83, NULL, NULL),
(41, 50, 20, 84, NULL, NULL),
(42, 49, 20, 85, NULL, NULL),
(43, 50, 20, 86, NULL, NULL),
(44, 50, 20, 87, NULL, NULL),
(45, 50, 20, 88, NULL, NULL),
(46, 50, 20, 89, NULL, NULL),
(47, 50, 20, 93, NULL, NULL),
(48, 50, 20, 94, NULL, NULL),
(49, 50, 20, 95, NULL, NULL),
(50, 50, 20, 98, NULL, NULL),
(51, 50, 20, 99, NULL, NULL),
(52, 50, 20, 100, NULL, NULL),
(53, 50, 20, 101, NULL, NULL),
(54, 50, 20, 102, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measure_units`
--

CREATE TABLE `measure_units` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `abbr` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(300) NOT NULL,
  `measure_units_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `product_price_by_store` (
  `id` int(11) NOT NULL,
  `stores_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` varchar(45) NOT NULL,
  `description` varchar(50) NOT NULL,
  `secondary_measure_id` int(11) DEFAULT NULL,
  `sold_portions` float NOT NULL,
  `individual_inventory` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_price_by_store`
--

INSERT INTO `product_price_by_store` (`id`, `stores_id`, `products_id`, `price`, `description`, `secondary_measure_id`, `sold_portions`, `individual_inventory`) VALUES
(6, 7, 1, '14', 'Aguas frescas', NULL, 1, 1),
(7, 7, 2, '7', 'Sencillos', NULL, 1, 0),
(8, 7, 3, '18', '18', NULL, 1, 1),
(9, 7, 4, '22', 'Chamoyadas', NULL, 1, 1),
(10, 7, 5, '18', '18', NULL, 1, 0),
(11, 7, 6, '12', 'Chispaleta', NULL, 1, 1),
(12, 7, 7, '8', 'Chocobanana', NULL, 1, 1),
(14, 7, 9, '8', 'Sencillos', NULL, 1, 0),
(15, 7, 10, '20', 'Dorilocos', NULL, 1, 1),
(16, 7, 11, '22', '22', NULL, 1, 1),
(17, 7, 12, '20', 'Fresas congeladas', NULL, 1, 1),
(19, 7, 14, '12', '1 bolita', 1, 1, 0),
(20, 7, 15, '25', 'Malteadas', NULL, 1, 1),
(21, 7, 16, '10', 'Mangonada', NULL, 1, 1),
(22, 7, 17, '1', 'Bolis', NULL, 1, 1),
(23, 7, 18, '2.5', 'Chiquitas', NULL, 1, 1),
(24, 7, 19, '14', '14', NULL, 1, 0),
(25, 7, 20, '22', 'Smothies', NULL, 1, 1),
(28, 8, 1, '14', 'Aguas frescas', NULL, 1, 1),
(29, 8, 2, '8', 'Sencillos', NULL, 1, 0),
(30, 8, 3, '18', '18', NULL, 1, 1),
(31, 8, 4, '28', 'Chamoyadas', NULL, 1, 1),
(32, 8, 5, '18', '18', NULL, 1, 0),
(33, 8, 6, '14', 'Chispaletas', NULL, 1, 1),
(35, 8, 8, '20', 'Chocolate caliente', NULL, 1, 1),
(36, 8, 9, '10', 'Sencillos', NULL, 1, 0),
(37, 8, 10, '22', 'Dorilocos', NULL, 1, 1),
(38, 8, 11, '28', '28', NULL, 1, 1),
(39, 8, 12, '20', '20', NULL, 1, 1),
(40, 8, 13, '2', 'Galletas', NULL, 1, 1),
(41, 8, 14, '14', '14', NULL, 1, 0),
(43, 8, 16, '10', 'Mangonadas', NULL, 1, 1),
(45, 8, 18, '2', 'Chiquitas', NULL, 1, 1),
(47, 8, 20, '28', 'Smothies', NULL, 1, 1),
(48, 8, 21, '20', '20', NULL, 1, 1),
(49, 8, 22, '25', 'Tizanas', NULL, 1, 1),
(72, 7, 5, '20', '20', NULL, 1, 0),
(73, 7, 5, '22', '22', NULL, 1, 0),
(74, 7, 14, '18', '1.5 bolitas', 1, 1.5, 0),
(75, 7, 14, '22', '2 bolitas', 1, 2, 0),
(76, 7, 18, '12', 'Agua', NULL, 1, 1),
(77, 7, 18, '15', 'Leche', NULL, 1, 1),
(78, 7, 18, '18', 'Rellenas', NULL, 1, 1),
(79, 7, 9, '15', 'Preparados', NULL, 1, 0),
(80, 7, 2, '14', 'Preparados', NULL, 1, 0),
(81, 7, 19, '16', '16', NULL, 1, 0),
(82, 7, 19, '18', '18', NULL, 1, 0),
(83, 7, 11, '22', '22', NULL, 1, 1),
(84, 7, 11, '25', '25', NULL, 1, 1),
(85, 7, 3, '23', '23', NULL, 1, 1),
(86, 7, 17, '3', 'Juguitos', NULL, 1, 1),
(87, 7, 17, '18', 'Paleta BonBon', NULL, 1, 1),
(88, 7, 17, '11', 'Kinder Delice', NULL, 1, 1),
(89, 7, 17, '8', 'Bubulubu', NULL, 1, 1),
(90, 8, 5, '20', '20', NULL, 1, 0),
(91, 8, 5, '22', '22', NULL, 1, 0),
(92, 8, 14, '24', '24', NULL, 1, 0),
(93, 8, 18, '12', 'Agua', NULL, 1, 1),
(94, 8, 18, '15', 'Leche', NULL, 1, 1),
(95, 8, 18, '18', 'Rellenas', NULL, 1, 1),
(96, 8, 9, '18', 'Preparados', NULL, 1, 0),
(97, 8, 2, '15', 'Preparados', NULL, 1, 0),
(98, 8, 12, '25', '25', NULL, 1, 1),
(99, 8, 11, '30', '30', NULL, 1, 1),
(100, 8, 3, '20', '20', NULL, 1, 1),
(101, 8, 3, '25', '25', NULL, 1, 1),
(102, 8, 21, '11', '11', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `product_price_by_store_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `date`, `quantity`, `users_id`, `product_price_by_store_id`, `amount`) VALUES
(1, '2018-02-18 03:51:09', 1, 7, 6, 14),
(2, '2018-02-18 03:51:09', 3, 7, 75, 66),
(3, '2018-02-18 04:19:42', 1, 7, 6, 14),
(4, '2018-02-18 04:19:42', 3, 7, 75, 66),
(5, '2018-02-18 04:19:42', 2, 7, 17, 40),
(6, '2018-02-18 04:19:43', 1, 7, 23, 2.5),
(7, '2018-02-18 04:19:43', 1, 7, 77, 15),
(8, '2018-02-18 04:19:43', 1, 7, 76, 12),
(9, '2018-02-18 04:19:43', 1, 7, 78, 18),
(10, '2018-02-18 05:15:20', 1, 7, 6, 14),
(11, '2018-02-18 05:27:53', 1, 7, 6, 14),
(12, '2018-02-18 06:07:21', 1, 7, 6, 14),
(13, '2018-02-18 06:07:52', 1, 7, 8, 18),
(14, '2018-02-18 06:07:52', 1, 7, 85, 23),
(15, '2018-02-18 06:08:12', 3, 7, 75, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secondary_measure`
--

CREATE TABLE `secondary_measure` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `portion` float NOT NULL,
  `measure_units_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secondary_measure`
--

INSERT INTO `secondary_measure` (`id`, `name`, `portion`, `measure_units_id`) VALUES
(1, 'bolita', 0.2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `token` varchar(45) NOT NULL,
  `product_price_by_store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `quantity`, `datetime`, `token`, `product_price_by_store_id`) VALUES
(1, 1, '2018-02-18 03:51:02', '1518947099', 6),
(2, 3, '2018-02-18 03:51:06', '1518947099', 75),
(3, 1, '2018-02-18 04:19:09', '1518947469', 6),
(4, 3, '2018-02-18 04:19:14', '1518947469', 75),
(5, 2, '2018-02-18 04:19:19', '1518947469', 17),
(6, 1, '2018-02-18 04:19:24', '1518947469', 23),
(7, 1, '2018-02-18 04:19:25', '1518947469', 77),
(8, 1, '2018-02-18 04:19:25', '1518947469', 76),
(9, 1, '2018-02-18 04:19:25', '1518947469', 78),
(10, 1, '2018-02-18 05:15:19', '1518949183', 6),
(11, 1, '2018-02-18 05:27:52', '1518952520', 6),
(12, 1, '2018-02-18 06:07:19', '1518953299', 6),
(13, 1, '2018-02-18 06:07:48', '1518955641', 8),
(14, 1, '2018-02-18 06:07:48', '1518955641', 85),
(15, 3, '2018-02-18 06:08:09', '1518955685', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `user_roles_id` int(11) NOT NULL,
  `stores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cash_cut_users1_idx` (`users_id`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_price_by_store_id_UNIQUE` (`product_price_by_store_id`),
  ADD KEY `fk_inventory_product_price_by_store1_idx` (`product_price_by_store_id`),
  ADD KEY `fk_inventory_product1` (`products_id`),
  ADD KEY `fk_inventory__store1_idx` (`product_price_by_store_id`),
  ADD KEY `fk_inventory_stores1` (`stores_id`);

--
-- Indices de la tabla `measure_units`
--
ALTER TABLE `measure_units`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_products_measure_units1_idx` (`measure_units_id`);

--
-- Indices de la tabla `product_price_by_store`
--
ALTER TABLE `product_price_by_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stores_has_products_products1_idx` (`products_id`),
  ADD KEY `fk_stores_has_products_stores_idx` (`stores_id`),
  ADD KEY `fk_product_price_by_store_secondary_measure1_idx` (`secondary_measure_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_users1_idx` (`users_id`),
  ADD KEY `fk_sales_product_price_by_store1_idx` (`product_price_by_store_id`);

--
-- Indices de la tabla `secondary_measure`
--
ALTER TABLE `secondary_measure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_secondary_measure_measure_units1_idx` (`measure_units_id`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tickets_product_price_by_store1_idx` (`product_price_by_store_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_user_roles1_idx` (`user_roles_id`),
  ADD KEY `fk_users_stores1_idx` (`stores_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `measure_units`
--
ALTER TABLE `measure_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `product_price_by_store`
--
ALTER TABLE `product_price_by_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `secondary_measure`
--
ALTER TABLE `secondary_measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  ADD CONSTRAINT `fk_inventory_product1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_product_price_by_store1` FOREIGN KEY (`product_price_by_store_id`) REFERENCES `product_price_by_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_stores1` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
