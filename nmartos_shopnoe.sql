-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 11:33:37
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nmartos_shopnoe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preu` int(11) NOT NULL,
  `idprod` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id`, `cantidad`, `preu`, `idprod`, `iduser`) VALUES
(1, 10, 0, 3, 1),
(2, 10, 0, 3, 1),
(6, 0, 0, 19, 13),
(7, 0, 0, 20, 13),
(9, 0, 0, 18, 13),
(10, 0, 0, 9, 13),
(13, 1, 0, 14, 13),
(17, 1, 0, 19, 9),
(18, 0, 0, 20, 9),
(20, 0, 0, 14, 15),
(21, 0, 0, 17, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_Client` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `primerCognom` varchar(50) DEFAULT NULL,
  `segonCognom` varchar(50) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id_Client`, `nom`, `primerCognom`, `segonCognom`, `dni`, `email`) VALUES
(1, 'Noelia', 'Martos', 'Garcia', '48029173K', 'noeliamartos2001@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandas`
--

CREATE TABLE `comandas` (
  `id` int(11) NOT NULL,
  `precioTotal` varchar(10) NOT NULL,
  `estadoPedido` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comandas`
--

INSERT INTO `comandas` (`id`, `precioTotal`, `estadoPedido`) VALUES
(1, '160', 0),
(2, '4.99', 0),
(3, '4.99', 1),
(4, '4.99', 1),
(5, '4.99', 1),
(6, '4.99', 1),
(7, '9.93', 1),
(26, '11', 1),
(29, '245', 1),
(31, '123', 1),
(32, '87654', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandas_productes`
--

CREATE TABLE `comandas_productes` (
  `fid_Comanda` int(11) NOT NULL,
  `fid_Producte` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comandas_productes`
--

INSERT INTO `comandas_productes` (`fid_Comanda`, `fid_Producte`, `cantidad`) VALUES
(1, 18, 4),
(2, 19, 3),
(3, 24, 1),
(4, 14, 2),
(5, 24, 2),
(6, 14, 2),
(7, 13, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_04_28_165047_create_personas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('milajordi97@gmail.com', '$2y$10$y0.fuzttNlqyU6H34JbQTu0rHiopLFoTTdRoz98/FbZeyTa/EVzJ.', '2020-05-10 13:49:51'),
('test@test.com', '$2y$10$xkjmfR9sm4u9heLFdd6DTeNjPGyTZzWd/JABJKXN/xkQjZ4BPXfCG', '2020-05-14 10:08:21'),
('milajordi97@gmail.com', '$2y$10$y0.fuzttNlqyU6H34JbQTu0rHiopLFoTTdRoz98/FbZeyTa/EVzJ.', '2020-05-10 13:49:51'),
('test@test.com', '$2y$10$xkjmfR9sm4u9heLFdd6DTeNjPGyTZzWd/JABJKXN/xkQjZ4BPXfCG', '2020-05-14 10:08:21'),
('noeliamartos2001@gmail.com', '$2y$10$/iFBupvhLITAHvJ3txswBuEMvIDv8M44fCh7nR16f8H0.3o4/yFn.', '2021-05-11 11:35:45'),
('milajordi97@gmail.com', '$2y$10$y0.fuzttNlqyU6H34JbQTu0rHiopLFoTTdRoz98/FbZeyTa/EVzJ.', '2020-05-10 13:49:51'),
('test@test.com', '$2y$10$xkjmfR9sm4u9heLFdd6DTeNjPGyTZzWd/JABJKXN/xkQjZ4BPXfCG', '2020-05-14 10:08:21'),
('milajordi97@gmail.com', '$2y$10$y0.fuzttNlqyU6H34JbQTu0rHiopLFoTTdRoz98/FbZeyTa/EVzJ.', '2020-05-10 13:49:51'),
('test@test.com', '$2y$10$xkjmfR9sm4u9heLFdd6DTeNjPGyTZzWd/JABJKXN/xkQjZ4BPXfCG', '2020-05-14 10:08:21'),
('noeliamartos2001@gmail.com', '$2y$10$/iFBupvhLITAHvJ3txswBuEMvIDv8M44fCh7nR16f8H0.3o4/yFn.', '2021-05-11 11:35:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `tipos` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `img` varchar(250) NOT NULL,
  `productoCesta` int(11) NOT NULL,
  `comprado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `tipos`, `descripcion`, `precio`, `img`, `productoCesta`, `comprado`) VALUES
(1, 'Discos 5 kg', 'Discos', 'Pareja de discos Change de 5 kg (IWF)', '99.00', '../imatges/discos/5kg.JPG', 0, 0),
(2, 'Discos 10 kg', 'Discos', 'Pareja de discos Change de 10 kg (IWF)', '149.00', '../imatges/discos/10kg.JPG', 0, 0),
(3, 'Discos 15 kg', 'Discos', 'Pareja de discos Change de 15 kg (IWF)', '216.00', '../imatges/discos/15kg.JPG', 2, 0),
(4, 'Discos 20 kg', 'Discos', 'Pareja de discos Change de 20 kg (IWF)', '280.00', '../imatges/discos/20kg.JPG', 0, 0),
(5, 'ROGUE OLYMPIC WEIGHTLIFTING BAR - BRIGHT ZINC', 'Barras', 'Halterofilia olímpica, 20kg, 28 mm', '525.00', '../imatges/barras/Bright-zinc.JPG', 1, 0),
(6, 'THE OHIO BAR - CERAKOTE', 'Barras', 'Multiusos, 20kg, 28.5 mm', '360.00', '../imatges/barras/cerakote.JPG', 1, 0),
(9, 'THE OHIO BAR - BLACK ZINC', 'Barras', 'Multiusos, 20kg, 28.5 mm', '315.00', '../imatges/barras/black-zinc.JPG', 1, 0),
(10, 'THE OHIO BAR - E-COAT', 'Barras', 'Multiusos, 20kg, 28.5 mm', '315.00', '../imatges/barras/e-coat.JPG', 1, 0),
(11, 'ROGUE 20KG OHIO POWER BAR - STAINLESS STEEL', 'Barras', 'Powerlifting (Levantamiento de potencia), 20kg, 29 mm', '450.00', '../imatges/barras/stainless-steel.JPG', 1, 0),
(12, 'ROGUE ECHO BAR 2.0 ', 'Barras', 'Multiusos, 20kg, 28.5 mm', '244.00', '../imatges/barras/echo-bar.JPG', 1, 0),
(13, 'BANDA NARANJA', 'Bandas', 'Muy suave.', '10.00', '../imatges/bandas/naranja.JPG', 1, 0),
(14, 'BANDA ROJA', 'Bandas', 'Suave.', '12.00', '../imatges/bandas/roja.JPG', 1, 0),
(15, 'BANDA AZUL', 'Bandas', 'Medio.', '14.00', '../imatges/bandas/azul.JPG', 0, 0),
(16, 'BANDA VERDE', 'Bandas', 'Fuerte.', '16.00', '../imatges/bandas/verde.JPG', 0, 0),
(17, 'BANDA NEGRA', 'Bandas', 'Muy fuerte.', '18.00', '../imatges/bandas/negra.JPG', 1, 0),
(18, 'BANDA MORADA', 'Bandas', 'Ultrafuerte.', '20.00', '../imatges/bandas/lila.JPG', 1, 0),
(19, 'Discos 0.5 kg', 'Discos', 'Pareja de discos Change de 0.5 kg (IWF)', '4.99', '../imatges/discos/0.5kg.JPG', 4, 0),
(20, 'Discos 1 kg', 'Discos', 'Pareja de discos Change de 1 kg (IWF)', '19.99', '../imatges/discos/1kg.JPG', 1, 0),
(21, 'Discos 1.5 kg', 'Discos', 'Pareja de discos Change de 1.5 kg (IWF)', '14.99', '../imatges/discos/1.5kg.JPG', 0, 0),
(22, 'Discos 2 kg', 'Discos', 'Pareja de discos Change de 2 kg (IWF)', '14.99', '../imatges/discos/2kg.JPG', 2, 0),
(23, 'Discos 2.5 kg', 'Discos', 'Pareja de discos Change de 2.5 kg (IWF)', '9.99', '../imatges/discos/2.5kg.JPG', 0, 0),
(24, 'Discos 5 kg', 'Discos', 'Pareja de discos Change de 5 kg (IWF)', '4.99', '../imatges/discos/5kg.JPG', 0, 0),
(29, '1', '2', '3', '4', '5', 6, 7),
(30, '1', '1', '4', '5', '6', 6, 5),
(31, '1', '2', '3', '4', '5', 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primerapellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundoapellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `dni`, `primerapellido`, `segundoapellido`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Prueba', '11111111A', 'prueba', 'prueba', 'prueba@prueba.com', NULL, '$2y$10$vMNrH3MTZUDatpijohalcOUHwcyXg53G7MkYfTtrNscCsdSaZa5Qi', 0, NULL, '2021-05-14 07:01:32', '2021-05-14 07:01:32'),
(9, 'Noelia', '12345678A', 'Martos', 'Garcia', 'noeliamartos2001@gmail.com', NULL, '$2y$10$pWyFoB64kiwdqEmv.P8GLuOEonMtuK3.nz0gf6CHRZU2RAWT4DlB6', 1, NULL, '2021-04-28 16:34:59', '2021-04-28 16:34:59'),
(10, 'Noelia', '12987654E', 'Martos', 'Garcia', 'prueba@gmail.com', NULL, '$2y$10$gZ8AmqR3P5QGY9Ib9XOnGuS.kOUBujZhu6.nWeAYy6RSfrgeaPwAS', 0, NULL, '2021-05-11 12:20:39', '2021-05-11 12:20:39'),
(11, 'Noelia', '98765432E', 'Martos', 'Garcia', 'nn@gmail.com', NULL, '$2y$10$wC8t5vUx2EdqbSx5WQ1dyedtnX8pBySsBe04T0QcFe6EIbLwRLQwG', 1, NULL, '2021-05-11 12:22:26', '2021-05-11 12:22:26'),
(12, 'Noelia', '19383833E', 'Martos', 'Garcia', 'new@gmail.com', NULL, '$2y$10$EDdVJJh6z.VPodRO1yoeie.O19nEA6r0VPdrTaWXaJTemXWBAIrZ.', 1, NULL, '2021-05-11 12:24:13', '2021-05-11 12:24:13'),
(13, 'fit', '12345678F', 'box', 'shop', 'fitboxshopp@gmail.com', NULL, '$2y$10$5E6c0eb24LHGsmELyOVcd.5UoeSGdBSq.nzxY65RKEa9SBloX9cgu', 1, NULL, '2021-05-19 15:12:44', '2021-05-19 15:12:44'),
(15, 'Test', '22222222A', 'test', 'test', 'test@gmail.com', NULL, '$2y$10$viFAShx00KCfTmSj.U4XgeIZhXJX3WuEzuFX6EUnT7u.jkcUKfOrW', 0, NULL, '2021-05-24 11:42:07', '2021-05-24 11:42:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_comandas`
--

CREATE TABLE `users_comandas` (
  `fid_user` bigint(20) NOT NULL,
  `fid_Comanda` int(11) NOT NULL,
  `data_Comanda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_comandas`
--

INSERT INTO `users_comandas` (`fid_user`, `fid_Comanda`, `data_Comanda`) VALUES
(7, 1, '2021-05-11'),
(9, 2, '2021-05-11'),
(9, 3, '2021-05-11'),
(9, 4, '2021-05-11'),
(13, 5, '2021-05-11'),
(15, 6, '2021-05-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_Client`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comandas_productes`
--
ALTER TABLE `comandas_productes`
  ADD PRIMARY KEY (`fid_Comanda`,`fid_Producte`),
  ADD KEY `fk_fid_Producte_Producte` (`fid_Producte`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_comandas`
--
ALTER TABLE `users_comandas`
  ADD PRIMARY KEY (`fid_user`,`fid_Comanda`),
  ADD KEY `fk_fid_Comanda_Comanda` (`fid_Comanda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comandas`
--
ALTER TABLE `comandas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comandas_productes`
--
ALTER TABLE `comandas_productes`
  ADD CONSTRAINT `fk_fid_Comanda1_Comanda1` FOREIGN KEY (`fid_Comanda`) REFERENCES `comandas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fid_Producte_Producte` FOREIGN KEY (`fid_Producte`) REFERENCES `productes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_comandas`
--
ALTER TABLE `users_comandas`
  ADD CONSTRAINT `fk_fid_Comanda_Comanda` FOREIGN KEY (`fid_Comanda`) REFERENCES `comandas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fid_user_user` FOREIGN KEY (`fid_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
