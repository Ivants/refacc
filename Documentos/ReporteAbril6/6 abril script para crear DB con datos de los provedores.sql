-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2017 a las 03:14:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products_course`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `description`, `pricing`, `created_at`, `updated_at`) VALUES
(1, 1, 'BANDA POLY-V 4070695 (K07695)', 'GOODYEAR', '187.00', '2017-04-07 05:53:32', '2017-04-07 05:53:32'),
(2, 1, 'BUJIA S.PLUS VW DERBY,POINTER 1.8L 99-06 WR7LTC+ 0242235664', 'ROBERT BOSCH, S.A. DE C.V.', '24.00', '2017-04-07 05:56:41', '2017-04-07 05:56:41'),
(3, 1, 'DISTRIBUIDOR CHEV.P-UP TRUCKS 7.4L 96-00 GM03', 'JIAXING HIFINE INPORTEXPORT', '418.00', '2017-04-07 05:57:48', '2017-04-07 05:57:48'),
(4, 1, 'DISTRIBUIDOR CHRY.ATOS  27100-02503', 'JIAXING HIFINE INPORTEXPORT', '579.00', '2017-04-07 05:58:35', '2017-04-07 05:58:35'),
(5, 1, 'TAPON ACEITE PERKINS 65-96, CUMMINS GDE  TC-1030-F', 'IMPLEMENTOS Y SERVICIOS ELECTR', '51.00', '2017-04-07 05:59:36', '2017-04-07 05:59:36'),
(6, 1, 'PORTA DIODO NISSAN PICK-UP PATHFINDER IHR751', 'WETHERILL ASSOCIATES INC.', '230.00', '2017-04-07 06:03:30', '2017-04-07 06:03:30'),
(7, 1, 'PORTA DIODO NISSAN SENTRA NX200  IHR756', 'WETHERILL ASSOCIATES INC.', '230.00', '2017-04-07 06:03:55', '2017-04-07 06:03:55'),
(8, 1, 'PLUMA FLAT WIPER INDIVIDUAL  24\" 8 ADAPTADORES', 'JIAXING HIFINE INPORTEXPORT', '17.00', '2017-04-07 06:04:47', '2017-04-07 06:04:47'),
(9, 1, 'MOTOR LIMP.FORD FOCUS 2000-> 0390351364 /YS4Z-17508BB', 'JIAXING HIFINE INPORTEXPORT', '320.00', '2017-04-07 06:05:28', '2017-04-07 06:05:28'),
(10, 1, 'MARCHA CHRY.NEON 94->  9007045020, 17203 REMY', 'REMY REMANUFACTURING DE MEXICO', '1004.00', '2017-04-07 06:06:18', '2017-04-07 06:06:18'),
(11, 1, 'PALANCA MULTIFUNCIONES VW BORA AUDI 4B0953503F,MG01-04017', 'JIAXING HIFINE INPORTEXPORT', '252.00', '2017-04-07 06:07:10', '2017-04-07 06:07:10'),
(12, 1, 'PAQ. AFINACION CHRY.ATOS 4CIL. 1.0L 00-04', 'JIAXING HIFINE INPORTEXPORT', '252.00', '2017-04-07 06:08:06', '2017-04-07 06:08:06'),
(13, 1, 'PLAFON LUZ INTERIOR CRISTALINO CROMADO 1064-2', 'PETERSON DE MEXICO, S.A.  C.V.', '28.00', '2017-04-07 06:08:40', '2017-04-07 06:08:40'),
(14, 1, 'PORTA DIODO DELCO 21SI REF. DR5176   DR176PF', 'WETHERILL ASSOCIATES INC.', '127.00', '2017-04-07 06:09:33', '2017-04-07 06:09:33'),
(15, 1, 'REGULADOR RENAULT MEGANE,SCENIC,LAGUNA,TRAFIC F00MA45224', 'ROBERT BOSCH, S.A. DE C.V.', '174.00', '2017-04-07 06:10:24', '2017-04-07 06:10:24'),
(16, 1, 'SENS.TEMP.CARGA AIRE (IAT) CHEV.TRACKER 99-04 TS10029-11B1', 'DELPHI DIESEL SYSTEM SERVICE', '255.00', '2017-04-07 06:11:15', '2017-04-07 06:11:15'),
(17, 1, 'SW.LUZ FORD LINCOLN F/OCULTOS SW157 DS151 VS-39A038', 'DELPHI DIESEL SYSTEM SERVICE', '255.00', '2017-04-07 06:11:39', '2017-04-07 06:11:39'),
(18, 1, 'SW.LUZ FORD LINCOLN 90-94 SW712 DS611 VS-39A047', 'DELPHI DIESEL SYSTEM SERVICE', '255.00', '2017-04-07 06:11:52', '2017-04-07 06:11:52'),
(19, 1, 'SW.LUZ FORD G.MARQUIS SW187   HS117  VS39A014 CUB', 'DELPHI DIESEL SYSTEM SERVICE', '255.00', '2017-04-07 06:12:06', '2017-04-07 06:12:06'),
(20, 1, 'SW.LUZ FORD EXPLORER,RANGER 98-04 DS-1369', 'DELPHI DIESEL SYSTEM SERVICE', '255.00', '2017-04-07 06:12:24', '2017-04-07 06:12:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
