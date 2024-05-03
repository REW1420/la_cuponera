-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2024 a las 01:26:00
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
(4, 'aa', '2024-05-01 17:06:31', '2024-05-01 17:06:31'),
(5, 'a', '2024-05-01 17:06:46', '2024-05-01 17:06:46'),
(6, 'a', '2024-05-01 17:07:03', '2024-05-01 17:07:03'),
(7, 'a', '2024-05-01 17:07:07', '2024-05-01 17:07:07'),
(8, 'a', '2024-05-01 17:07:15', '2024-05-01 17:07:15'),
(10, 'test', '2024-05-01 23:57:47', '2024-05-01 23:57:47'),
(11, 'test', '2024-05-01 23:57:47', '2024-05-01 23:57:47'),
(12, 'b', '2024-05-02 00:07:20', '2024-05-02 00:07:20'),
(13, 'asdas', '2024-05-02 00:14:48', '2024-05-02 00:14:48'),
(15, 'a', '2024-05-02 11:06:40', '2024-05-02 11:06:40'),
(16, 'a', '2024-05-02 11:06:41', '2024-05-02 11:06:41'),
(17, 'a', '2024-05-02 11:06:42', '2024-05-02 11:06:42'),
(18, 'a', '2024-05-02 11:06:42', '2024-05-02 11:06:42'),
(19, 'aaas', '2024-05-02 11:06:42', '2024-05-03 00:25:08'),
(22, 'Restaurante', '2024-05-03 06:55:28', '2024-05-03 06:55:28'),
(23, 'Compañia 1', '2024-05-03 07:14:35', '2024-05-03 07:14:35');

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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_code` varchar(20) NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `generation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, '2024_05_03_185551_add_foreing_key_offers_table', 7);

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
(14, 'William Ernesto', 'SOA032', 'Soyapango, prados 4 casa 6 psj 6', 'William Ernesto Ramos Valladares', '+50372664125', 's@gmail.com', 22, 10.20, '2024-05-03 23:20:42', '2024-05-04 00:01:53');

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
(4, 'Camiseta de algodón 2', 20.00, 15.99, '2024-05-05', '2024-05-15', '2024-05-20', 100, 'Camiseta de algodón de alta calidad en varios colores', 'Tallas disponibles: S, M, L', 14, '2024-05-03 20:18:05', '2024-05-04 04:33:34', 4),
(5, 'Zapatos deportivos', 50.00, 39.99, '2024-05-10', '2024-05-25', '2024-05-30', 50, 'Zapatos deportivos para correr con tecnología de amortiguación avanzada', 'Disponible en tallas del 36 al 45', 14, '2024-05-03 20:18:05', '2024-05-03 20:18:05', 2),
(6, 'Cámara digital', 299.99, 249.99, '2024-05-08', '2024-05-20', '2024-05-26', 30, 'Cámara digital de alta resolución con pantalla táctil', 'Incluye estuche y tarjeta de memoria de 32GB', 14, '2024-05-03 20:18:05', '2024-05-04 04:37:17', 3),
(9, 'Camiseta de algodón 22s', 20.00, 15.99, '2024-05-05', '2024-05-15', '2024-05-20', 100, 'Camiseta de algodón de alta calidad en varios colores', 'Tallas disponibles: S, M, L', 14, '2024-05-03 20:18:50', '2024-05-04 04:33:28', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offer_statuses`
--

CREATE TABLE `offer_statuses` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `offer_statuses`
--

INSERT INTO `offer_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'APPROVED', NULL, NULL),
(2, 'PENDING', NULL, NULL),
(3, 'REJECTED', NULL, NULL),
(4, 'DISCARDED', NULL, NULL);

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
(1, 'cliente', 'cliente@c.com', NULL, 'cliente', 2, NULL, NULL, NULL),
(2, 'admin', 'admin@c.com', NULL, 'admin', 1, NULL, NULL, NULL),
(3, 'oferta', 'oferta@c.com', NULL, 'oferta', 4, NULL, NULL, NULL),
(4, 'empleado', 'empleado@c.com', NULL, 'empleado', 3, NULL, NULL, NULL),
(18, 'William Ernesto Ramos Valladares', 's@gmail.com', NULL, '$2y$12$WJ1sjbvB6s6aK6gZAs3ameFSPkhQkeFKvn.4/FYl/F36fsqrtr1p2', 4, '2024-05-03 23:20:43', '2024-05-04 00:01:53', NULL);

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
  ADD KEY `coupons_purchase_id_foreign` (`purchase_id`);

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
-- Indices de la tabla `offer_statuses`
--
ALTER TABLE `offer_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `offerer_companies`
--
ALTER TABLE `offerer_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `offer_statuses`
--
ALTER TABLE `offer_statuses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `coupons_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

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
  ADD CONSTRAINT `offers_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `offer_statuses` (`id`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `purchases_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
