-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 10-05-2024 a las 06:29:14
=======
-- Tiempo de generación: 07-05-2024 a las 06:16:12
>>>>>>> panel/dependiente-sucursal
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuponera_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(22, 'Restaurante', '2024-05-03 06:55:28', '2024-05-03 06:55:28'),
(24, 'Alimentación', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(25, 'Tecnología', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(26, 'Salud y bienestar', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(27, 'Moda y accesorios', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(28, 'Construcción', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(29, 'Educación', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(30, 'Entretenimiento', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(31, 'Finanzas y seguros', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(32, 'Agricultura', '2024-05-05 19:52:56', '2024-05-05 19:52:56'),
(33, 'Automoción', '2024-05-05 19:52:56', '2024-05-05 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
<<<<<<< HEAD
  `dui` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
=======
  `dui` varchar(10) NOT NULL
>>>>>>> panel/dependiente-sucursal
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

<<<<<<< HEAD
INSERT INTO `clients` (`id`, `phone`, `created_at`, `updated_at`, `user_id`, `dui`, `address`) VALUES
(1, '12345678', NULL, NULL, 18, '12345678', ''),
(2, '0000000', '2024-05-06 06:09:20', '2024-05-06 06:09:20', 22, '000000', ''),
(3, '100000', '2024-05-07 07:35:05', '2024-05-07 07:35:05', 23, '00', ''),
(4, '11', '2024-05-07 07:41:39', '2024-05-07 07:41:39', 24, '000', ''),
(5, '12345678', '2024-05-07 22:57:22', '2024-05-10 00:24:09', 1, '222222221', 'aa'),
(6, '11', '2024-05-07 22:59:09', '2024-05-07 22:59:09', 30, '2', ''),
(7, '11', '2024-05-07 23:00:09', '2024-05-07 23:00:09', 31, '3', ''),
(8, '11', '2024-05-08 05:43:24', '2024-05-08 05:43:24', 32, '4', ''),
(9, '11', '2024-05-08 05:46:15', '2024-05-08 05:46:15', 33, '5', ''),
(10, '11', '2024-05-08 05:51:53', '2024-05-08 05:51:53', 34, '6', ''),
(11, '11', '2024-05-08 06:07:05', '2024-05-08 06:07:05', 35, '7', ''),
(12, '11', '2024-05-08 06:07:58', '2024-05-08 06:07:58', 36, '8', ''),
(13, '11', '2024-05-08 06:10:31', '2024-05-08 06:10:31', 37, '9', ''),
(14, '11', '2024-05-08 07:00:43', '2024-05-08 07:00:43', 38, '10', ''),
(15, '11', '2024-05-08 07:02:07', '2024-05-08 07:02:07', 39, '11', ''),
(16, '11', '2024-05-08 07:02:41', '2024-05-08 07:02:41', 40, '12', ''),
(17, '12345678', '2024-05-08 09:58:22', '2024-05-08 09:58:22', 41, '111111111', '');
=======
INSERT INTO `clients` (`id`, `phone`, `created_at`, `updated_at`, `user_id`, `dui`) VALUES
(1, '12345678', NULL, NULL, 18, '12345678'),
(2, '0000000', '2024-05-06 06:09:20', '2024-05-06 06:09:20', 22, '000000'),
(3, '100000', '2024-05-07 07:35:05', '2024-05-07 07:35:05', 23, '00'),
(4, '11', '2024-05-07 07:41:39', '2024-05-07 07:41:39', 24, '000');
>>>>>>> panel/dependiente-sucursal

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_redeemed` tinyint(1) NOT NULL DEFAULT 0,
  `unique_code` varchar(20) NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `generation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `owner_dui` varchar(255) NOT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT 5
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`id`, `is_redeemed`, `unique_code`, `purchase_id`, `generation_date`, `created_at`, `updated_at`, `owner_id`, `owner_dui`, `expiration_date`, `status_id`) VALUES
(1, 0, 'ABCABC', 1, '2024-05-04 01:31:21', '2024-05-04 01:31:21', '2024-05-04 01:31:21', 1, '', '2024-07-12 05:09:28', 5),
(2, 0, 'ABC2', 1, '2024-05-05 19:21:39', NULL, '2024-05-06 01:29:20', 1, '111', '2024-05-05 06:00:00', 6),
(4, 1, 'ABC3', 1, '2024-05-05 19:21:58', NULL, NULL, 1, '111', '2024-04-05 06:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 33, 'aNySYi5ZLcB8FMtpYv9K7MAIAHyCxtKg5z12MGWotUFzxoPDtROL5yQ7IXFc', '2024-05-08 05:46:15', '2024-05-08 05:46:15'),
(2, 34, 'bAW2bZxbr2lk00noYBqWC9CWtIotASFRqbiSVu2O4A1t8TS698bojDg5HKnI', '2024-05-08 05:51:53', '2024-05-08 05:51:53'),
(3, 36, 'groyCxEqRhDpd5KMuUnuZBx1qYORKqpxg48Q2FoKdQzA2TS8NrjOCQVm5XlE', '2024-05-08 06:07:58', '2024-05-08 06:07:58'),
(4, 37, '8UYhNlZmng26yaTTbBiDsgzEVzmRVPd3jSnw8EZsYtrBdDmvq8FASTa9HyLR', '2024-05-08 06:10:31', '2024-05-08 06:10:31'),
(5, 2, 'LTqIjAYzL3YNUOyKEqnbY6B7Iy4Jm9fJZ5EekImO9Hx0XOkbDK6QqkfakBTz', '2024-05-08 06:48:43', '2024-05-08 06:59:57'),
(6, 38, 'sULaSisUe64qCXeo7kZV9zn1zoXQCWXiSHy73Hk2yuCVzBHlPswr3t8hJbyv', '2024-05-08 07:00:43', '2024-05-08 07:00:43'),
(7, 39, 'gsPRLctzQYWjeqfCwRzqXRFp7wHiYPhUTKRqpP0wkx9WIsIQWvp46sjL36rB', '2024-05-08 07:02:07', '2024-05-08 07:02:07'),
(8, 40, 'egrTkyTlM7wPQ8kNpLz2mpC98p3t56eYR6OjFH0496hwKRYsEfgBD8BLLzNY', '2024-05-08 07:02:41', '2024-05-08 07:02:41'),
(9, 41, '4ge5LeHlO5meSmuxWuJ0jU9qgoTsnU0WM28dYTzjcP2X1IjniLQgFWblBcPs', '2024-05-08 09:58:22', '2024-05-08 09:58:22'),
(10, 3, 'qpZSqpm9nVxHR7OMadQHlrkFxriE6SlHOl8NcnfLcG3MsyOofUWFFvbHvRCN', '2024-05-09 10:13:14', '2024-05-09 10:13:14'),
(11, 1, 'HoLh3S28DVCDd9W7HMuVlh2aWD4FJstnOOp61gEC9hcHcGe8onvjZqsUlzPu', '2024-05-09 10:58:23', '2024-05-09 10:58:23'),
(12, 22, 'SzQ1upCuYI6VqdJty3n7XOjN65wREYCIDTs63VKGKrosVTrZaxNR9hPduInj', '2024-05-10 10:14:02', '2024-05-10 10:14:02');
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`id`, `is_redeemed`, `unique_code`, `purchase_id`, `generation_date`, `created_at`, `updated_at`, `owner_id`, `owner_dui`, `expiration_date`, `status_id`) VALUES
(1, 0, 'ABCABC', 1, '2024-05-04 01:31:21', '2024-05-04 01:31:21', '2024-05-04 01:31:21', 1, '', '2024-07-12 05:09:28', 5),
(2, 0, 'ABC2', 1, '2024-05-05 19:21:39', NULL, '2024-05-06 01:29:20', 1, '111', '2024-05-05 06:00:00', 6),
(4, 1, 'ABC3', 1, '2024-05-05 19:21:58', NULL, NULL, 1, '111', '2024-04-05 06:00:00', 5);
>>>>>>> panel/dependiente-sucursal

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_04_30_045646_create_categories_table', 1),
(5, '2024_04_30_045719_create_offerer_companies_table', 1),
(6, '2024_04_30_045746_create_offers_table', 1),
(7, '2024_04_30_045839_create_clients_table', 1),
(8, '2024_04_30_045855_create_purchases_table', 1),
(9, '2024_04_30_045907_create_coupons_table', 1),
(10, '2024_04_30_050340_create_roles_table', 1),
(11, '2024_04_30_225209_create_users_table', 1),
(16, '2024_05_03_181236_create_offer_statuses', 2),
(17, '2024_05_03_181557_update_clients_table', 3),
(21, '2024_05_03_182435_add_foreing_key_clients_table', 4),
(22, '2024_05_03_184228_update_offer_statuses_table', 5),
(23, '2024_05_03_185518_update_offer_table', 6),
(24, '2024_05_03_185551_add_foreing_key_offers_table', 7),
(25, '2024_05_05_032115_alter_coupon_table', 8),
(27, '2024_05_05_032531_alter_coupon_table', 9),
(29, '2024_05_05_032828_add_foreing_key_coupon_table', 10),
(30, '2024_05_05_043941_add_colunm_coupons_table', 11),
(31, '2024_05_05_045113_alter_name_offer_statuses_statuses', 12),
(32, '2024_05_05_045313_alter_coupons_table', 13),
<<<<<<< HEAD
(33, '2024_05_05_045500_add_foreing_key_coupons_table', 14),
(34, '2024_05_07_163917_create_email_verifications_table', 15),
(35, '2024_05_08_040425_alter_clients_table', 16),
(36, '2024_05_08_050514_create_rejected_reason_table', 17),
(37, '2024_05_08_050649_add_foreing_key_rejected_reason_table', 18);
=======
(33, '2024_05_05_045500_add_foreing_key_coupons_table', 14);
>>>>>>> panel/dependiente-sucursal

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offerer_companies`
--

CREATE TABLE `offerer_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `commission` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `offerer_companies`
--

INSERT INTO `offerer_companies` (`id`, `name`, `code`, `address`, `contact_name`, `phone`, `email`, `category_id`, `commission`, `created_at`, `updated_at`) VALUES
(14, 'William Ernesto', 'SOA032', 'Soyapango, prados 4 casa 6 psj 6', 'William', '72664125', 'werramos1420@gmail.com', 22, 10.20, '2024-05-03 23:20:42', '2024-05-06 05:16:42'),
(17, 'empresa pruebas', 'SPE183', 'asdasdasda', 'empresa prueba', '76208038', 'cuido2022@gmail.com', 32, 0.20, '2024-05-06 05:21:30', '2024-05-06 05:21:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `offer_price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coupon_usage_limit_date` date NOT NULL,
  `coupon_limit_quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `other_details` text NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `offers`
--

INSERT INTO `offers` (`id`, `title`, `regular_price`, `offer_price`, `start_date`, `end_date`, `coupon_usage_limit_date`, `coupon_limit_quantity`, `description`, `other_details`, `company_id`, `created_at`, `updated_at`, `status_id`) VALUES
(4, 'Camiseta de algodón 2', 20.00, 15.99, '2024-05-05', '2024-05-05', '2024-05-20', 100, 'Camiseta de algodón de alta calidad en varios colores', 'Tallas disponibles: S, M, L', 14, '2024-05-03 20:18:05', '2024-05-05 08:19:24', 6),
<<<<<<< HEAD
(5, 'Zapatos deportivos', 50.00, 39.99, '2024-05-10', '2024-05-25', '2024-05-30', 50, 'Zapatos deportivos para correr con tecnología de amortiguación avanzada', 'Disponible en tallas del 36 al 45', 14, '2024-05-03 20:18:05', '2024-05-09 09:37:02', 2),
(6, 'Cámara digital', 299.99, 249.99, '2024-05-08', '2024-05-20', '2024-05-26', 30, 'Cámara digital de alta resolución con pantalla táctil', 'Incluye estuche y tarjeta de memoria de 32GB', 14, '2024-05-03 20:18:05', '2024-05-04 04:37:17', 3),
(9, 'Camiseta de algodón 22s', 20.00, 15.99, '2024-05-05', '2024-05-15', '2024-05-20', 100, 'Camiseta de algodón de alta calidad en varios colores', 'Tallas disponibles: S, M, L', 14, '2024-05-03 20:18:50', '2024-05-09 09:20:30', 3);
=======
(5, 'Zapatos deportivos', 50.00, 39.99, '2024-05-10', '2024-05-25', '2024-05-30', 50, 'Zapatos deportivos para correr con tecnología de amortiguación avanzada', 'Disponible en tallas del 36 al 45', 14, '2024-05-03 20:18:05', '2024-05-03 20:18:05', 2),
(6, 'Cámara digital', 299.99, 249.99, '2024-05-08', '2024-05-20', '2024-05-26', 30, 'Cámara digital de alta resolución con pantalla táctil', 'Incluye estuche y tarjeta de memoria de 32GB', 14, '2024-05-03 20:18:05', '2024-05-04 04:37:17', 3),
(9, 'Camiseta de algodón 22s', 20.00, 15.99, '2024-05-05', '2024-05-15', '2024-05-20', 100, 'Camiseta de algodón de alta calidad en varios colores', 'Tallas disponibles: S, M, L', 14, '2024-05-03 20:18:50', '2024-05-04 04:33:28', 2);
>>>>>>> panel/dependiente-sucursal

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id`, `client_id`, `offer_id`, `purchase_date`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2024-05-04 01:29:52', '2024-05-04 01:29:52', '2024-05-04 01:29:52');

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rejected_reasons`
--

CREATE TABLE `rejected_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rejected_reasons`
--

INSERT INTO `rejected_reasons` (`id`, `offer_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 5, 'Esaa asdas asasfawaf asfasfas asfasfa asasf asasf', '2024-05-09 09:13:51', '2024-05-09 09:13:51'),
(2, 9, 'aaaa', '2024-05-09 09:20:30', '2024-05-09 09:20:30');

=======
>>>>>>> panel/dependiente-sucursal
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', NULL, NULL),
(2, 'CLIENT', NULL, NULL),
(3, 'CLERK', NULL, NULL),
(4, 'OFERRER', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'APPROVED', NULL, NULL),
(2, 'PENDING', NULL, NULL),
(3, 'REJECTED', NULL, NULL),
(4, 'DISCARDED', NULL, NULL),
(5, 'ACTIVE', NULL, NULL),
(6, 'EXPIRED', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `created_at`, `updated_at`, `remember_token`) VALUES
<<<<<<< HEAD
(1, 'cliente', 'cliente@c.com', '2024-05-09 10:58:31', '$2y$12$TyskjCt4QL1huJ74MhbYBuA2VcoGWNZwpcbspbsrJP2pDEOC9SPny', 2, NULL, '2024-05-09 10:58:31', NULL),
(2, 'admins', 'admin@c.com', '2024-05-08 07:00:10', '$2y$12$TyskjCt4QL1huJ74MhbYBuA2VcoGWNZwpcbspbsrJP2pDEOC9SPny', 1, NULL, '2024-05-09 10:54:14', NULL),
(3, 'oferta', 'oferta@c.com', '2024-05-09 10:13:33', '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 4, NULL, '2024-05-09 10:13:33', NULL),
(4, 'empleado', 'empleado@c.com', NULL, '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 3, NULL, NULL, NULL),
(18, 'William Ernesto Ramos Valladares', 'werramos1420@gmail.com', NULL, '$2y$12$WJ1sjbvB6s6aK6gZAs3ameFSPkhQkeFKvn.4/FYl/F36fsqrtr1p2', 4, '2024-05-03 23:20:43', '2024-05-06 05:16:42', NULL),
(21, 'empresa prueba', 'cuido2022@gmail.com', NULL, '$2y$12$qG5eV4qbq9Lj8y3yDx9cz.6wCtVwOSPPhWjs6WCKPVimM2kjju.wK', 4, '2024-05-06 05:21:30', '2024-05-06 07:17:55', 'YbVL4e4bh1iRkS7kJ9w2CWHwLqKPA2wFcJzJJnpRdCXfXyBUgFZgzNnQOrtK'),
(22, 'will', 'will@gmail.com', '2024-05-10 10:14:22', '$2y$12$hq8CSZX/xAYy/SzBW0IFe.uurFIBdbk0vDEOttnhu8fY44IKyDZoe', 2, '2024-05-06 06:09:20', '2024-05-10 10:14:22', '4gPW8mAmpFbkrNE6K1L1RwiYQK5GotErMCxbO1Dn6GSenfrCr4xkrtaWDgTD'),
=======
(1, 'cliente', 'cliente@c.com', NULL, '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 2, NULL, NULL, NULL),
(2, 'admin', 'admin@c.com', NULL, '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 1, NULL, NULL, NULL),
(3, 'oferta', 'oferta@c.com', NULL, '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 4, NULL, NULL, NULL),
(4, 'empleado', 'empleado@c.com', NULL, '$2y$12$roelIopbwppkcKcVLhuAROv9GOzKG220ItInHpN7nKrLedYOr9a/S', 3, NULL, NULL, NULL),
(18, 'William Ernesto Ramos Valladares', 'werramos1420@gmail.com', NULL, '$2y$12$WJ1sjbvB6s6aK6gZAs3ameFSPkhQkeFKvn.4/FYl/F36fsqrtr1p2', 4, '2024-05-03 23:20:43', '2024-05-06 05:16:42', NULL),
(21, 'empresa prueba', 'cuido2022@gmail.com', NULL, '$2y$12$qG5eV4qbq9Lj8y3yDx9cz.6wCtVwOSPPhWjs6WCKPVimM2kjju.wK', 4, '2024-05-06 05:21:30', '2024-05-06 07:17:55', 'YbVL4e4bh1iRkS7kJ9w2CWHwLqKPA2wFcJzJJnpRdCXfXyBUgFZgzNnQOrtK'),
(22, 'will', 'will@gmail.com', NULL, '$2y$12$hq8CSZX/xAYy/SzBW0IFe.uurFIBdbk0vDEOttnhu8fY44IKyDZoe', 2, '2024-05-06 06:09:20', '2024-05-06 07:29:09', 'dwLL7a95hba28t1syNog51dqdWheGjiBVYiZra3xi1aKC36g3G4VwZAoSYMx'),
>>>>>>> panel/dependiente-sucursal
(23, 'will', 'awill@gmail.com', NULL, '$2y$12$pr3i7Z63efdpFdct3s5GvuW9is4xzL0ynlfThRtDOB7hM/cyFea.W', 2, '2024-05-07 07:35:05', '2024-05-07 07:35:05', NULL),
(24, 'will', 'swill@gmail.com', NULL, '$2y$12$wkmXJv95Z17aODwTQpNM5eDeHjwGCYyUYvSHzvLzaMABSg.D8NCFi', 2, '2024-05-07 07:41:39', '2024-05-07 07:41:39', NULL),
(25, 'will', 's@c.com', '2024-05-07 09:37:35', '$2y$12$15MTkL4BVEUZuM0vyfqXPeoB4M2HNEiOVLpLki9xvPN9olwirmIzy', 2, '2024-05-07 09:36:21', '2024-05-07 09:37:35', NULL),
(26, 'will', 'a@c.com', NULL, '$2y$12$PRoXPeDZwAVGe.VXiaD8Te.bhHaqYfjkAebOjS7jFAdeDujR.vUT2', 2, '2024-05-07 09:38:42', '2024-05-07 09:38:42', NULL),
(27, 'will', 'aa@c.com', NULL, '$2y$12$T.BcZkZCCwfSFpmws.tQru1A7Bsuf/fmVJBBTnTDOaikox4P0TALi', 2, '2024-05-07 09:41:04', '2024-05-07 09:41:04', NULL),
<<<<<<< HEAD
(28, 'will', 'aaa@c.com', NULL, '$2y$12$IMn.SZ4WRKUT7uruf1s.h.vpURcso2gnKn5mFjO.c0vyx6YNVWS/.', 2, '2024-05-07 09:52:30', '2024-05-07 09:52:30', NULL),
(29, 'will', 'ass@c.com', NULL, '$2y$12$S/NXjQ8o72Q1SziBkwU1keSA5vUrj/Clxr0GnFFmlGE1OPN02XGra', 2, '2024-05-07 22:57:22', '2024-05-07 22:57:22', NULL),
(30, 'will', 'b@c.com', NULL, '$2y$12$Mcmd0Eg627Vk85jU9JlJve0bkao9DutJzU1D0rmvSVdnDy6ZK6O8W', 2, '2024-05-07 22:59:09', '2024-05-07 22:59:09', NULL),
(31, 'will', 'bb@c.com', NULL, '$2y$12$042b.x5T2eA/aLcVDjbDLeQnQ8iRWsdPKcK.sHwpgD.dR4BTlI7oe', 2, '2024-05-07 23:00:09', '2024-05-07 23:00:09', NULL),
(32, 'will', 'q@c.com', NULL, '$2y$12$/AR7f6BFPZA4kXNDJL1.V.wyvj00dnyjk9f/jjclWrCK7YevSg7ku', 2, '2024-05-08 05:43:24', '2024-05-08 05:43:24', NULL),
(33, 'will', 'qq@c.com', NULL, '$2y$12$3Dv01JM/ZzWbl0GhTgXmDu3OHpd4xyXFdKFGP.YpJIR.y5ZqzG1Dq', 2, '2024-05-08 05:46:15', '2024-05-08 06:05:24', NULL),
(34, 'will', 'qqq@c.com', '2024-05-08 06:01:19', '$2y$12$yhgAfXSbuaFNfs9513Bza.iid.luKZbt13EK2ZV2akzu4ErELhF4W', 2, '2024-05-08 05:51:53', '2024-05-08 06:01:19', NULL),
(35, 'will', 'qq1q@c.com', NULL, '$2y$12$EdgjusQajIVqhymVpZoAnu0qSYaDG1VtfK0dxv7iluEidwFc6jjRq', 2, '2024-05-08 06:07:05', '2024-05-08 06:07:05', NULL),
(36, 'will', 'qq1qq@c.com', '2024-05-08 06:08:09', '$2y$12$vb/8R4ElNwmx/ubDdBN83um7umskU1xZrCEBup1wWRzJoexm/gzeq', 2, '2024-05-08 06:07:58', '2024-05-08 06:08:09', NULL),
(37, 'will', 'as@c.com', NULL, '$2y$12$Y3zgwCXjeTy.V24T2cQJUOlpN/7IWLTBB/HrY8x0yA5.uLjADCrxy', 2, '2024-05-08 06:10:31', '2024-05-08 06:10:31', NULL),
(38, 'will', '12@c.com', NULL, '$2y$12$MpfoS8kEbJpDk6hTR7vGrOPH2YC33khz9.6onFq3ju.z07kloU.ge', 2, '2024-05-08 07:00:43', '2024-05-08 07:00:43', NULL),
(39, 'will', '13@c.com', NULL, '$2y$12$D74wMLi8SgyTbMTvQnK.6ust16UWZ811qLsQ9lc6q5/Ba5.T4uhrW', 2, '2024-05-08 07:02:07', '2024-05-08 07:02:07', NULL),
(40, 'will', '14@c.com', NULL, '$2y$12$AHh/UbpiuQWtHas0PIewcuqOiC0DEN/txLNw4ihVEG5umhlF47X26', 2, '2024-05-08 07:02:41', '2024-05-08 07:02:41', NULL),
(41, 'cliente', 'cliente@gmail.com', '2024-05-08 09:59:08', '$2y$12$13IfuU60KjvjI8/CZYpdhev0XA6SXCIzlvMEajYN5OK5OlVCKUrqS', 2, '2024-05-08 09:58:22', '2024-05-08 09:59:08', NULL);
=======
(28, 'will', 'aaa@c.com', NULL, '$2y$12$IMn.SZ4WRKUT7uruf1s.h.vpURcso2gnKn5mFjO.c0vyx6YNVWS/.', 2, '2024-05-07 09:52:30', '2024-05-07 09:52:30', NULL);
>>>>>>> panel/dependiente-sucursal

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_unique_code_unique` (`unique_code`),
  ADD KEY `coupons_purchase_id_foreign` (`purchase_id`),
  ADD KEY `coupons_owner_id_foreign` (`owner_id`),
  ADD KEY `coupons_status_id_foreign` (`status_id`);
<<<<<<< HEAD

--
-- Indices de la tabla `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);
=======
>>>>>>> panel/dependiente-sucursal

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `offerer_companies`
--
ALTER TABLE `offerer_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offerer_companies_code_unique` (`code`),
  ADD KEY `offerer_companies_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_company_id_foreign` (`company_id`),
  ADD KEY `offers_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_client_id_foreign` (`client_id`),
  ADD KEY `purchases_offer_id_foreign` (`offer_id`);

--
-- Indices de la tabla `rejected_reasons`
--
ALTER TABLE `rejected_reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejected_reasons_offer_id_foreign` (`offer_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> panel/dependiente-sucursal

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
<<<<<<< HEAD

--
-- AUTO_INCREMENT de la tabla `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
=======
>>>>>>> panel/dependiente-sucursal

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
>>>>>>> panel/dependiente-sucursal

--
-- AUTO_INCREMENT de la tabla `offerer_companies`
--
ALTER TABLE `offerer_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
<<<<<<< HEAD

--
-- AUTO_INCREMENT de la tabla `rejected_reasons`
--
ALTER TABLE `rejected_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
>>>>>>> panel/dependiente-sucursal

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
>>>>>>> panel/dependiente-sucursal

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `coupons_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`),
  ADD CONSTRAINT `coupons_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `offerer_companies`
--
ALTER TABLE `offerer_companies`
  ADD CONSTRAINT `offerer_companies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `offerer_companies` (`id`),
  ADD CONSTRAINT `offers_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `purchases_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Filtros para la tabla `rejected_reasons`
--
ALTER TABLE `rejected_reasons`
  ADD CONSTRAINT `rejected_reasons_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
