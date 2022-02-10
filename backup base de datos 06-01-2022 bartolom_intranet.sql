-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-01-2022 a las 06:52:28
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bartolom_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`id`, `nombre`, `cargo`, `correo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nicolas', 'Técnico Sistemas', 'tecnicossistemas@sanbartolome.edu.co', '2021-12-17 19:40:54', '2021-12-17 19:40:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `host` varchar(46) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:created', 2, 'App\\Models\\User#2', NULL, '{\"name\":\"Cristian Andres Prieto Jimenez\",\"email\":\"webmaster@sanbartolome.edu.co\",\"google_id\":\"112110827630511166698\",\"updated_at\":\"2021-12-14 17:13:11\",\"created_at\":\"2021-12-14 17:13:11\",\"id\":2}', '172.70.135.114', '2021-12-14 22:13:11', '2021-12-14 22:13:11'),
(2, 'audit:created', 3, 'App\\Models\\User#3', NULL, '{\"name\":\"Cristian Andr\\u00e9s Prieto Jim\\u00e9nez\",\"email\":\"coorsistemas@sanbartolome.edu.co\",\"google_id\":\"111024810548293216778\",\"updated_at\":\"2021-12-14 19:44:21\",\"created_at\":\"2021-12-14 19:44:21\",\"id\":3}', '172.70.34.195', '2021-12-15 00:44:21', '2021-12-15 00:44:21'),
(3, 'audit:created', 1, 'App\\Models\\ProyectosArticulado#1', 3, '{\"titulo_del_trabajo\":\"PROYECTO DE GRADO\",\"nombres_y_apellidos_de_los_autores_de_la_investigacion\":\"CRISTIAN ANDRES PRIETO\",\"nombres_y_apellidos_del_asesor_del_trabajo\":\"CRISTIAN\",\"ano_en_que_se_realizo_la_investigacion\":\"2021-12-15\",\"linea_de_investigacion\":\"RECURSOS NATURALES\",\"abstract_resumen_documental\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"palabras_clave\":\"CALENTAMIENTO\",\"publicar\":\"1\",\"updated_at\":\"2021-12-15 15:45:46\",\"created_at\":\"2021-12-15 15:45:46\",\"id\":1,\"proyecto\":null,\"media\":[]}', '172.70.134.143', '2021-12-15 20:45:46', '2021-12-15 20:45:46'),
(4, 'audit:created', 2, 'App\\Models\\ProyectosArticulado#2', 3, '{\"titulo_del_trabajo\":\"PROYECTO DE GRADO\",\"nombres_y_apellidos_de_los_autores_de_la_investigacion\":\"CRISTIAN ANDRES PRIETO\",\"nombres_y_apellidos_del_asesor_del_trabajo\":\"CRISTIAN\",\"ano_en_que_se_realizo_la_investigacion\":\"2021-12-10\",\"linea_de_investigacion\":\"RECURSOS NATURALES\",\"abstract_resumen_documental\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"palabras_clave\":\"RECURSOS\",\"publicar\":\"1\",\"updated_at\":\"2021-12-15 16:39:51\",\"created_at\":\"2021-12-15 16:39:51\",\"id\":2,\"proyecto\":null,\"media\":[]}', '172.70.135.114', '2021-12-15 21:39:51', '2021-12-15 21:39:51'),
(5, 'audit:created', 1, 'App\\Models\\Agente#1', 3, '{\"nombre\":\"Nicolas\",\"cargo\":\"T\\u00e9cnico Sistemas\",\"correo\":\"tecnicossistemas@sanbartolome.edu.co\",\"updated_at\":\"2021-12-17 14:40:54\",\"created_at\":\"2021-12-17 14:40:54\",\"id\":1}', '172.70.135.114', '2021-12-17 19:40:54', '2021-12-17 19:40:54'),
(6, 'audit:created', 1, 'App\\Models\\Sede#1', 3, '{\"sede\":\"Bachillerato\",\"updated_at\":\"2021-12-17 14:41:01\",\"created_at\":\"2021-12-17 14:41:01\",\"id\":1}', '172.70.135.114', '2021-12-17 19:41:01', '2021-12-17 19:41:01'),
(7, 'audit:created', 2, 'App\\Models\\Sede#2', 3, '{\"sede\":\"Infantiles\",\"updated_at\":\"2021-12-17 14:41:06\",\"created_at\":\"2021-12-17 14:41:06\",\"id\":2}', '172.70.135.114', '2021-12-17 19:41:06', '2021-12-17 19:41:06'),
(8, 'audit:created', 1, 'App\\Models\\Componente#1', 3, '{\"nombre_del_activo\":\"Mouse\",\"updated_at\":\"2021-12-17 14:41:25\",\"created_at\":\"2021-12-17 14:41:25\",\"id\":1}', '172.70.135.114', '2021-12-17 19:41:25', '2021-12-17 19:41:25'),
(9, 'audit:created', 2, 'App\\Models\\Componente#2', 3, '{\"nombre_del_activo\":\"Teclado\",\"updated_at\":\"2021-12-17 14:41:29\",\"created_at\":\"2021-12-17 14:41:29\",\"id\":2}', '172.70.135.114', '2021-12-17 19:41:29', '2021-12-17 19:41:29'),
(10, 'audit:created', 3, 'App\\Models\\Componente#3', 3, '{\"nombre_del_activo\":\"Parlantes\",\"updated_at\":\"2021-12-17 14:41:34\",\"created_at\":\"2021-12-17 14:41:34\",\"id\":3}', '172.70.135.114', '2021-12-17 19:41:34', '2021-12-17 19:41:34'),
(11, 'audit:created', 1, 'App\\Models\\FichasTecnica#1', 3, '{\"encargado\":\"Direcci\\u00f3n Acad\\u00e9mica\",\"nombre_del_equipo\":\"Direcci\\u00f3n Acad\\u00e9mica\",\"modelo\":\"hp 6200\",\"serial\":\"EC-3652\",\"sede_id\":\"1\",\"observaciones\":null,\"estado_del_activo\":\"activo\",\"updated_at\":\"2021-12-17 14:41:54\",\"created_at\":\"2021-12-17 14:41:54\",\"id\":1}', '172.70.135.114', '2021-12-17 19:41:54', '2021-12-17 19:41:54'),
(12, 'audit:created', 1, 'App\\Models\\Maintenance#1', 3, '{\"area_id\":\"1\",\"tipo\":\"correctivo\",\"quien_lo_realiza_id\":\"1\",\"fecha\":\"2021-12-15\",\"descripcion\":\"Mantenimiento Programado\",\"updated_at\":\"2021-12-17 14:42:36\",\"created_at\":\"2021-12-17 14:42:36\",\"id\":1}', '172.70.135.114', '2021-12-17 19:42:36', '2021-12-17 19:42:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id` bigint UNSIGNED NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento_de_identidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_de_identificacion` double(15,1) NOT NULL,
  `fecha_de_expedicion_del_documento` date NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `departamento_de_nacimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_de_nacimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular_personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_familiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular_familiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_familiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secundaria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_obtenido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_de_graduacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vacante_a_la_que_se_postula_id` bigint UNSIGNED DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato_formacion_academica_profesional`
--

CREATE TABLE `candidato_formacion_academica_profesional` (
  `candidato_id` bigint UNSIGNED NOT NULL,
  `formacion_academica_profesional_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato_idiomasgestionhumana`
--

CREATE TABLE `candidato_idiomasgestionhumana` (
  `candidato_id` bigint UNSIGNED NOT NULL,
  `idiomasgestionhumana_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato_ofimatica`
--

CREATE TABLE `candidato_ofimatica` (
  `candidato_id` bigint UNSIGNED NOT NULL,
  `ofimatica_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_del_activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre_del_activo`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(1, 'Mouse', '2021-12-17 19:41:25', '2021-12-17 19:41:25', NULL, NULL),
(2, 'Teclado', '2021-12-17 19:41:29', '2021-12-17 19:41:29', NULL, NULL),
(3, 'Parlantes', '2021-12-17 19:41:34', '2021-12-17 19:41:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_fichas_tecnica`
--

CREATE TABLE `componente_fichas_tecnica` (
  `fichas_tecnica_id` bigint UNSIGNED NOT NULL,
  `componente_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `componente_fichas_tecnica`
--

INSERT INTO `componente_fichas_tecnica` (`fichas_tecnica_id`, `componente_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_candidatos`
--

CREATE TABLE `documentos_candidatos` (
  `id` bigint UNSIGNED NOT NULL,
  `no_de_cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleos`
--

CREATE TABLE `empleos` (
  `id` bigint UNSIGNED NOT NULL,
  `vacante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisitos` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salario_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_tecnicas`
--

CREATE TABLE `fichas_tecnicas` (
  `id` bigint UNSIGNED NOT NULL,
  `encargado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_del_equipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` longtext COLLATE utf8mb4_unicode_ci,
  `estado_del_activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sede_id` bigint UNSIGNED NOT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fichas_tecnicas`
--

INSERT INTO `fichas_tecnicas` (`id`, `encargado`, `nombre_del_equipo`, `modelo`, `serial`, `observaciones`, `estado_del_activo`, `created_at`, `updated_at`, `deleted_at`, `sede_id`, `created_by_id`) VALUES
(1, 'Dirección Académica', 'Dirección Académica', 'hp 6200', 'EC-3652', NULL, 'activo', '2021-12-17 19:41:54', '2021-12-17 19:41:54', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnicas`
--

CREATE TABLE `ficha_tecnicas` (
  `id` bigint UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `grupo_id` bigint UNSIGNED NOT NULL,
  `ubicacion_id` bigint UNSIGNED NOT NULL,
  `encargado_id` bigint UNSIGNED NOT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica_profesionals`
--

CREATE TABLE `formacion_academica_profesionals` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_semestres` int DEFAULT NULL,
  `graduado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_de_graduacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomasgestionhumanas`
--

CREATE TABLE `idiomasgestionhumanas` (
  `id` bigint UNSIGNED NOT NULL,
  `nuevo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cetificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo_de_incidente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `quien_lo_realiza_id` bigint UNSIGNED NOT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `maintenances`
--

INSERT INTO `maintenances` (`id`, `tipo`, `fecha`, `descripcion`, `created_at`, `updated_at`, `deleted_at`, `area_id`, `quien_lo_realiza_id`, `created_by_id`) VALUES
(1, 'correctivo', '2021-12-15', 'Mantenimiento Programado', '2021-12-17 19:42:36', '2021-12-17 19:42:36', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\ProyectosArticulado', 1, '02dc7f04-c73a-44c9-a3b6-9a3176233860', 'proyecto', '61ba0da8b1161_20211213075403048', '61ba0da8b1161_20211213075403048.pdf', 'application/pdf', 'public', 'public', 224437, '[]', '[]', '[]', 1, '2021-12-15 20:45:46', '2021-12-15 20:45:46'),
(2, 'App\\Models\\ProyectosArticulado', 2, '07493472-c922-4286-8b80-de4830919092', 'proyecto', '61ba1a54e0214_20211213075403048', '61ba1a54e0214_20211213075403048.pdf', 'application/pdf', 'public', 'public', 224437, '[]', '[]', '[]', 2, '2021-12-15 21:39:51', '2021-12-15 21:39:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_12_14_000001_create_audit_logs_table', 1),
(4, '2021_12_14_000002_create_media_table', 1),
(5, '2021_12_14_000003_create_candidatos_table', 1),
(6, '2021_12_14_000004_create_empleos_table', 1),
(7, '2021_12_14_000005_create_proyectos_articulados_table', 1),
(8, '2021_12_14_000006_create_estudios_table', 1),
(9, '2021_12_14_000007_create_reparacions_table', 1),
(10, '2021_12_14_000008_create_ficha_tecnicas_table', 1),
(11, '2021_12_14_000009_create_grupos_table', 1),
(12, '2021_12_14_000010_create_salarios_table', 1),
(13, '2021_12_14_000011_create_maintenances_table', 1),
(14, '2021_12_14_000012_create_ofimaticas_table', 1),
(15, '2021_12_14_000013_create_componentes_table', 1),
(16, '2021_12_14_000014_create_documentos_candidatos_table', 1),
(17, '2021_12_14_000015_create_fichas_tecnicas_table', 1),
(18, '2021_12_14_000016_create_formacion_academica_profesionals_table', 1),
(19, '2021_12_14_000017_create_idiomasgestionhumanas_table', 1),
(20, '2021_12_14_000018_create_sedes_table', 1),
(21, '2021_12_14_000019_create_permissions_table', 1),
(22, '2021_12_14_000020_create_roles_table', 1),
(23, '2021_12_14_000021_create_users_table', 1),
(24, '2021_12_14_000022_create_user_alerts_table', 1),
(25, '2021_12_14_000023_create_agentes_table', 1),
(26, '2021_12_14_000024_create_prioridads_table', 1),
(27, '2021_12_14_000025_create_incidentes_table', 1),
(28, '2021_12_14_000026_create_estados_table', 1),
(29, '2021_12_14_000027_create_tickets_table', 1),
(30, '2021_12_14_000028_create_role_user_pivot_table', 1),
(31, '2021_12_14_000029_create_candidato_idiomasgestionhumana_pivot_table', 1),
(32, '2021_12_14_000030_create_permission_role_pivot_table', 1),
(33, '2021_12_14_000031_create_candidato_ofimatica_pivot_table', 1),
(34, '2021_12_14_000032_create_candidato_formacion_academica_profesional_pivot_table', 1),
(35, '2021_12_14_000033_create_componente_fichas_tecnica_pivot_table', 1),
(36, '2021_12_14_000034_create_user_user_alert_pivot_table', 1),
(37, '2021_12_14_000035_add_relationship_fields_to_ofimaticas_table', 1),
(38, '2021_12_14_000036_add_relationship_fields_to_idiomasgestionhumanas_table', 1),
(39, '2021_12_14_000037_add_relationship_fields_to_estudios_table', 1),
(40, '2021_12_14_000038_add_relationship_fields_to_formacion_academica_profesionals_table', 1),
(41, '2021_12_14_000039_add_relationship_fields_to_documentos_candidatos_table', 1),
(42, '2021_12_14_000040_add_relationship_fields_to_grupos_table', 1),
(43, '2021_12_14_000041_add_relationship_fields_to_candidatos_table', 1),
(44, '2021_12_14_000042_add_relationship_fields_to_empleos_table', 1),
(45, '2021_12_14_000043_add_relationship_fields_to_proyectos_articulados_table', 1),
(46, '2021_12_14_000044_add_relationship_fields_to_reparacions_table', 1),
(47, '2021_12_14_000045_add_relationship_fields_to_ficha_tecnicas_table', 1),
(48, '2021_12_14_000046_add_relationship_fields_to_maintenances_table', 1),
(49, '2021_12_14_000047_add_relationship_fields_to_componentes_table', 1),
(50, '2021_12_14_000048_add_relationship_fields_to_fichas_tecnicas_table', 1),
(51, '2021_12_14_000049_add_relationship_fields_to_user_alerts_table', 1),
(52, '2021_12_14_000050_add_relationship_fields_to_tickets_table', 1),
(53, '2021_12_14_000051_create_qa_topics_table', 1),
(54, '2021_12_14_000052_create_qa_messages_table', 1),
(55, '2021_12_14_030720_add_google_social_id_field', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofimaticas`
--

CREATE TABLE `ofimaticas` (
  `id` bigint UNSIGNED NOT NULL,
  `nuevo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cetificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'agente_create', NULL, NULL, NULL),
(20, 'agente_edit', NULL, NULL, NULL),
(21, 'agente_show', NULL, NULL, NULL),
(22, 'agente_delete', NULL, NULL, NULL),
(23, 'agente_access', NULL, NULL, NULL),
(24, 'sede_create', NULL, NULL, NULL),
(25, 'sede_edit', NULL, NULL, NULL),
(26, 'sede_show', NULL, NULL, NULL),
(27, 'sede_delete', NULL, NULL, NULL),
(28, 'sede_access', NULL, NULL, NULL),
(29, 'prioridad_create', NULL, NULL, NULL),
(30, 'prioridad_edit', NULL, NULL, NULL),
(31, 'prioridad_show', NULL, NULL, NULL),
(32, 'prioridad_delete', NULL, NULL, NULL),
(33, 'prioridad_access', NULL, NULL, NULL),
(34, 'incidente_create', NULL, NULL, NULL),
(35, 'incidente_edit', NULL, NULL, NULL),
(36, 'incidente_show', NULL, NULL, NULL),
(37, 'incidente_delete', NULL, NULL, NULL),
(38, 'incidente_access', NULL, NULL, NULL),
(39, 'estado_create', NULL, NULL, NULL),
(40, 'estado_edit', NULL, NULL, NULL),
(41, 'estado_show', NULL, NULL, NULL),
(42, 'estado_delete', NULL, NULL, NULL),
(43, 'estado_access', NULL, NULL, NULL),
(44, 'ticket_create', NULL, NULL, NULL),
(45, 'ticket_edit', NULL, NULL, NULL),
(46, 'ticket_show', NULL, NULL, NULL),
(47, 'ticket_delete', NULL, NULL, NULL),
(48, 'ticket_access', NULL, NULL, NULL),
(49, 'parametro_access', NULL, NULL, NULL),
(50, 'user_alert_create', NULL, NULL, NULL),
(51, 'user_alert_show', NULL, NULL, NULL),
(52, 'user_alert_delete', NULL, NULL, NULL),
(53, 'user_alert_access', NULL, NULL, NULL),
(54, 'sistema_access', NULL, NULL, NULL),
(55, 'fichas_tecnica_create', NULL, NULL, NULL),
(56, 'fichas_tecnica_edit', NULL, NULL, NULL),
(57, 'fichas_tecnica_show', NULL, NULL, NULL),
(58, 'fichas_tecnica_delete', NULL, NULL, NULL),
(59, 'fichas_tecnica_access', NULL, NULL, NULL),
(60, 'imprimir_create', NULL, NULL, NULL),
(61, 'imprimir_edit', NULL, NULL, NULL),
(62, 'imprimir_show', NULL, NULL, NULL),
(63, 'imprimir_delete', NULL, NULL, NULL),
(64, 'imprimir_access', NULL, NULL, NULL),
(65, 'componente_create', NULL, NULL, NULL),
(66, 'componente_edit', NULL, NULL, NULL),
(67, 'componente_show', NULL, NULL, NULL),
(68, 'componente_delete', NULL, NULL, NULL),
(69, 'componente_access', NULL, NULL, NULL),
(70, 'mantenimiento_access', NULL, NULL, NULL),
(71, 'imprimirmto_create', NULL, NULL, NULL),
(72, 'imprimirmto_edit', NULL, NULL, NULL),
(73, 'imprimirmto_show', NULL, NULL, NULL),
(74, 'imprimirmto_delete', NULL, NULL, NULL),
(75, 'imprimirmto_access', NULL, NULL, NULL),
(76, 'help_desk_access', NULL, NULL, NULL),
(77, 'maintenance_create', NULL, NULL, NULL),
(78, 'maintenance_edit', NULL, NULL, NULL),
(79, 'maintenance_show', NULL, NULL, NULL),
(80, 'maintenance_delete', NULL, NULL, NULL),
(81, 'maintenance_access', NULL, NULL, NULL),
(82, 'atencion_al_usuario_create', NULL, NULL, NULL),
(83, 'atencion_al_usuario_edit', NULL, NULL, NULL),
(84, 'atencion_al_usuario_show', NULL, NULL, NULL),
(85, 'atencion_al_usuario_delete', NULL, NULL, NULL),
(86, 'atencion_al_usuario_access', NULL, NULL, NULL),
(87, 'grupo_create', NULL, NULL, NULL),
(88, 'grupo_edit', NULL, NULL, NULL),
(89, 'grupo_show', NULL, NULL, NULL),
(90, 'grupo_delete', NULL, NULL, NULL),
(91, 'grupo_access', NULL, NULL, NULL),
(92, 'ficha_tecnica_create', NULL, NULL, NULL),
(93, 'ficha_tecnica_edit', NULL, NULL, NULL),
(94, 'ficha_tecnica_show', NULL, NULL, NULL),
(95, 'ficha_tecnica_delete', NULL, NULL, NULL),
(96, 'ficha_tecnica_access', NULL, NULL, NULL),
(97, 'reparacion_create', NULL, NULL, NULL),
(98, 'reparacion_edit', NULL, NULL, NULL),
(99, 'reparacion_show', NULL, NULL, NULL),
(100, 'reparacion_delete', NULL, NULL, NULL),
(101, 'reparacion_access', NULL, NULL, NULL),
(102, 'financiera_create', NULL, NULL, NULL),
(103, 'financiera_edit', NULL, NULL, NULL),
(104, 'financiera_show', NULL, NULL, NULL),
(105, 'financiera_delete', NULL, NULL, NULL),
(106, 'financiera_access', NULL, NULL, NULL),
(107, 'administracion_create', NULL, NULL, NULL),
(108, 'administracion_edit', NULL, NULL, NULL),
(109, 'administracion_show', NULL, NULL, NULL),
(110, 'administracion_delete', NULL, NULL, NULL),
(111, 'administracion_access', NULL, NULL, NULL),
(112, 'calidad_create', NULL, NULL, NULL),
(113, 'calidad_edit', NULL, NULL, NULL),
(114, 'calidad_show', NULL, NULL, NULL),
(115, 'calidad_delete', NULL, NULL, NULL),
(116, 'calidad_access', NULL, NULL, NULL),
(117, 'admisione_create', NULL, NULL, NULL),
(118, 'admisione_edit', NULL, NULL, NULL),
(119, 'admisione_show', NULL, NULL, NULL),
(120, 'admisione_delete', NULL, NULL, NULL),
(121, 'admisione_access', NULL, NULL, NULL),
(122, 'promocion_institucional_create', NULL, NULL, NULL),
(123, 'promocion_institucional_edit', NULL, NULL, NULL),
(124, 'promocion_institucional_show', NULL, NULL, NULL),
(125, 'promocion_institucional_delete', NULL, NULL, NULL),
(126, 'promocion_institucional_access', NULL, NULL, NULL),
(127, 'convenio_man_create', NULL, NULL, NULL),
(128, 'convenio_man_edit', NULL, NULL, NULL),
(129, 'convenio_man_show', NULL, NULL, NULL),
(130, 'convenio_man_delete', NULL, NULL, NULL),
(131, 'convenio_man_access', NULL, NULL, NULL),
(132, 'sae_create', NULL, NULL, NULL),
(133, 'sae_edit', NULL, NULL, NULL),
(134, 'sae_show', NULL, NULL, NULL),
(135, 'sae_delete', NULL, NULL, NULL),
(136, 'sae_access', NULL, NULL, NULL),
(137, 'bienestar_create', NULL, NULL, NULL),
(138, 'bienestar_edit', NULL, NULL, NULL),
(139, 'bienestar_show', NULL, NULL, NULL),
(140, 'bienestar_delete', NULL, NULL, NULL),
(141, 'bienestar_access', NULL, NULL, NULL),
(142, 'biblioteca_create', NULL, NULL, NULL),
(143, 'biblioteca_edit', NULL, NULL, NULL),
(144, 'biblioteca_show', NULL, NULL, NULL),
(145, 'biblioteca_delete', NULL, NULL, NULL),
(146, 'biblioteca_access', NULL, NULL, NULL),
(147, 'pastoral_create', NULL, NULL, NULL),
(148, 'pastoral_edit', NULL, NULL, NULL),
(149, 'pastoral_show', NULL, NULL, NULL),
(150, 'pastoral_delete', NULL, NULL, NULL),
(151, 'pastoral_access', NULL, NULL, NULL),
(152, 'academica_create', NULL, NULL, NULL),
(153, 'academica_edit', NULL, NULL, NULL),
(154, 'academica_show', NULL, NULL, NULL),
(155, 'academica_delete', NULL, NULL, NULL),
(156, 'academica_access', NULL, NULL, NULL),
(157, 'plataforma_access', NULL, NULL, NULL),
(158, 'schoolpack_create', NULL, NULL, NULL),
(159, 'schoolpack_edit', NULL, NULL, NULL),
(160, 'schoolpack_show', NULL, NULL, NULL),
(161, 'schoolpack_delete', NULL, NULL, NULL),
(162, 'schoolpack_access', NULL, NULL, NULL),
(163, 'trendi_create', NULL, NULL, NULL),
(164, 'trendi_edit', NULL, NULL, NULL),
(165, 'trendi_show', NULL, NULL, NULL),
(166, 'trendi_delete', NULL, NULL, NULL),
(167, 'trendi_access', NULL, NULL, NULL),
(168, 'progrenti_create', NULL, NULL, NULL),
(169, 'progrenti_edit', NULL, NULL, NULL),
(170, 'progrenti_show', NULL, NULL, NULL),
(171, 'progrenti_delete', NULL, NULL, NULL),
(172, 'progrenti_access', NULL, NULL, NULL),
(173, 'rectorium_access', NULL, NULL, NULL),
(174, 'cumpleano_create', NULL, NULL, NULL),
(175, 'cumpleano_edit', NULL, NULL, NULL),
(176, 'cumpleano_show', NULL, NULL, NULL),
(177, 'cumpleano_delete', NULL, NULL, NULL),
(178, 'cumpleano_access', NULL, NULL, NULL),
(179, 'regionalizacion_access', NULL, NULL, NULL),
(180, 'proyectos_articulado_create', NULL, NULL, NULL),
(181, 'proyectos_articulado_edit', NULL, NULL, NULL),
(182, 'proyectos_articulado_show', NULL, NULL, NULL),
(183, 'proyectos_articulado_delete', NULL, NULL, NULL),
(184, 'proyectos_articulado_access', NULL, NULL, NULL),
(185, 'empleo_create', NULL, NULL, NULL),
(186, 'empleo_edit', NULL, NULL, NULL),
(187, 'empleo_show', NULL, NULL, NULL),
(188, 'empleo_delete', NULL, NULL, NULL),
(189, 'empleo_access', NULL, NULL, NULL),
(190, 'gestion_humana_access', NULL, NULL, NULL),
(191, 'sg_sst_create', NULL, NULL, NULL),
(192, 'sg_sst_edit', NULL, NULL, NULL),
(193, 'sg_sst_show', NULL, NULL, NULL),
(194, 'sg_sst_delete', NULL, NULL, NULL),
(195, 'sg_sst_access', NULL, NULL, NULL),
(196, 'plan_de_formacion_create', NULL, NULL, NULL),
(197, 'plan_de_formacion_edit', NULL, NULL, NULL),
(198, 'plan_de_formacion_show', NULL, NULL, NULL),
(199, 'plan_de_formacion_delete', NULL, NULL, NULL),
(200, 'plan_de_formacion_access', NULL, NULL, NULL),
(201, 'evaluacion_de_desempeno_create', NULL, NULL, NULL),
(202, 'evaluacion_de_desempeno_edit', NULL, NULL, NULL),
(203, 'evaluacion_de_desempeno_show', NULL, NULL, NULL),
(204, 'evaluacion_de_desempeno_delete', NULL, NULL, NULL),
(205, 'evaluacion_de_desempeno_access', NULL, NULL, NULL),
(206, 'hojas_de_vida_create', NULL, NULL, NULL),
(207, 'hojas_de_vida_edit', NULL, NULL, NULL),
(208, 'hojas_de_vida_show', NULL, NULL, NULL),
(209, 'hojas_de_vida_delete', NULL, NULL, NULL),
(210, 'hojas_de_vida_access', NULL, NULL, NULL),
(211, 'certificado_laboral_create', NULL, NULL, NULL),
(212, 'certificado_laboral_edit', NULL, NULL, NULL),
(213, 'certificado_laboral_show', NULL, NULL, NULL),
(214, 'certificado_laboral_delete', NULL, NULL, NULL),
(215, 'certificado_laboral_access', NULL, NULL, NULL),
(216, 'cerficadodefuncione_create', NULL, NULL, NULL),
(217, 'cerficadodefuncione_edit', NULL, NULL, NULL),
(218, 'cerficadodefuncione_show', NULL, NULL, NULL),
(219, 'cerficadodefuncione_delete', NULL, NULL, NULL),
(220, 'cerficadodefuncione_access', NULL, NULL, NULL),
(221, 'postulacione_access', NULL, NULL, NULL),
(222, 'pruebas_psicotecnica_create', NULL, NULL, NULL),
(223, 'pruebas_psicotecnica_edit', NULL, NULL, NULL),
(224, 'pruebas_psicotecnica_show', NULL, NULL, NULL),
(225, 'pruebas_psicotecnica_delete', NULL, NULL, NULL),
(226, 'pruebas_psicotecnica_access', NULL, NULL, NULL),
(227, 'candidato_create', NULL, NULL, NULL),
(228, 'candidato_edit', NULL, NULL, NULL),
(229, 'candidato_show', NULL, NULL, NULL),
(230, 'candidato_delete', NULL, NULL, NULL),
(231, 'candidato_access', NULL, NULL, NULL),
(232, 'documentos_candidato_create', NULL, NULL, NULL),
(233, 'documentos_candidato_edit', NULL, NULL, NULL),
(234, 'documentos_candidato_show', NULL, NULL, NULL),
(235, 'documentos_candidato_delete', NULL, NULL, NULL),
(236, 'documentos_candidato_access', NULL, NULL, NULL),
(237, 'idiomasgestionhumana_create', NULL, NULL, NULL),
(238, 'idiomasgestionhumana_edit', NULL, NULL, NULL),
(239, 'idiomasgestionhumana_show', NULL, NULL, NULL),
(240, 'idiomasgestionhumana_delete', NULL, NULL, NULL),
(241, 'idiomasgestionhumana_access', NULL, NULL, NULL),
(242, 'estudio_create', NULL, NULL, NULL),
(243, 'estudio_edit', NULL, NULL, NULL),
(244, 'estudio_show', NULL, NULL, NULL),
(245, 'estudio_delete', NULL, NULL, NULL),
(246, 'estudio_access', NULL, NULL, NULL),
(247, 'salario_create', NULL, NULL, NULL),
(248, 'salario_edit', NULL, NULL, NULL),
(249, 'salario_show', NULL, NULL, NULL),
(250, 'salario_delete', NULL, NULL, NULL),
(251, 'salario_access', NULL, NULL, NULL),
(252, 'ofimatica_create', NULL, NULL, NULL),
(253, 'ofimatica_edit', NULL, NULL, NULL),
(254, 'ofimatica_show', NULL, NULL, NULL),
(255, 'ofimatica_delete', NULL, NULL, NULL),
(256, 'ofimatica_access', NULL, NULL, NULL),
(257, 'formacion_academica_profesional_create', NULL, NULL, NULL),
(258, 'formacion_academica_profesional_edit', NULL, NULL, NULL),
(259, 'formacion_academica_profesional_show', NULL, NULL, NULL),
(260, 'formacion_academica_profesional_delete', NULL, NULL, NULL),
(261, 'formacion_academica_profesional_access', NULL, NULL, NULL),
(262, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(1, 201),
(1, 202),
(1, 203),
(1, 204),
(1, 205),
(1, 206),
(1, 207),
(1, 208),
(1, 209),
(1, 210),
(1, 211),
(1, 212),
(1, 213),
(1, 214),
(1, 215),
(1, 216),
(1, 217),
(1, 218),
(1, 219),
(1, 220),
(1, 221),
(1, 222),
(1, 223),
(1, 224),
(1, 225),
(1, 226),
(1, 227),
(1, 228),
(1, 229),
(1, 230),
(1, 231),
(1, 232),
(1, 233),
(1, 234),
(1, 235),
(1, 236),
(1, 237),
(1, 238),
(1, 239),
(1, 240),
(1, 241),
(1, 242),
(1, 243),
(1, 244),
(1, 245),
(1, 246),
(1, 247),
(1, 248),
(1, 249),
(1, 250),
(1, 251),
(1, 252),
(1, 253),
(1, 254),
(1, 255),
(1, 256),
(1, 257),
(1, 258),
(1, 259),
(1, 260),
(1, 261),
(1, 262),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136),
(2, 137),
(2, 138),
(2, 139),
(2, 140),
(2, 141),
(2, 142),
(2, 143),
(2, 144),
(2, 145),
(2, 146),
(2, 147),
(2, 148),
(2, 149),
(2, 150),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 162),
(2, 163),
(2, 164),
(2, 165),
(2, 166),
(2, 167),
(2, 168),
(2, 169),
(2, 170),
(2, 171),
(2, 172),
(2, 173),
(2, 174),
(2, 175),
(2, 176),
(2, 177),
(2, 178),
(2, 179),
(2, 180),
(2, 181),
(2, 182),
(2, 183),
(2, 184),
(2, 185),
(2, 186),
(2, 187),
(2, 188),
(2, 189),
(2, 190),
(2, 191),
(2, 192),
(2, 193),
(2, 194),
(2, 195),
(2, 196),
(2, 197),
(2, 198),
(2, 199),
(2, 200),
(2, 201),
(2, 202),
(2, 203),
(2, 204),
(2, 205),
(2, 206),
(2, 207),
(2, 208),
(2, 209),
(2, 210),
(2, 211),
(2, 212),
(2, 213),
(2, 214),
(2, 215),
(2, 216),
(2, 217),
(2, 218),
(2, 219),
(2, 220),
(2, 221),
(2, 222),
(2, 223),
(2, 224),
(2, 225),
(2, 226),
(2, 227),
(2, 228),
(2, 229),
(2, 230),
(2, 231),
(2, 232),
(2, 233),
(2, 234),
(2, 235),
(2, 236),
(2, 237),
(2, 238),
(2, 239),
(2, 240),
(2, 241),
(2, 242),
(2, 243),
(2, 244),
(2, 245),
(2, 246),
(2, 247),
(2, 248),
(2, 249),
(2, 250),
(2, 251),
(2, 252),
(2, 253),
(2, 254),
(2, 255),
(2, 256),
(2, 257),
(2, 258),
(2, 259),
(2, 260),
(2, 261),
(2, 262);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridads`
--

CREATE TABLE `prioridads` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo_de_prioridad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_articulados`
--

CREATE TABLE `proyectos_articulados` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo_del_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres_y_apellidos_de_los_autores_de_la_investigacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres_y_apellidos_del_asesor_del_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_en_que_se_realizo_la_investigacion` date NOT NULL,
  `linea_de_investigacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract_resumen_documental` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `palabras_clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos_articulados`
--

INSERT INTO `proyectos_articulados` (`id`, `titulo_del_trabajo`, `nombres_y_apellidos_de_los_autores_de_la_investigacion`, `nombres_y_apellidos_del_asesor_del_trabajo`, `ano_en_que_se_realizo_la_investigacion`, `linea_de_investigacion`, `abstract_resumen_documental`, `palabras_clave`, `publicar`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`) VALUES
(2, 'PROYECTO DE GRADO', 'CRISTIAN ANDRES PRIETO', 'CRISTIAN', '2021-12-10', 'RECURSOS NATURALES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'RECURSOS', '1', '2021-12-15 21:39:51', '2021-12-15 21:39:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `topic_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint UNSIGNED NOT NULL,
  `receiver_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacions`
--

CREATE TABLE `reparacions` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `activo_id` bigint UNSIGNED NOT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarios`
--

CREATE TABLE `salarios` (
  `id` bigint UNSIGNED NOT NULL,
  `nuevo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` bigint UNSIGNED NOT NULL,
  `sede` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `sede`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bachillerato', '2021-12-17 19:41:01', '2021-12-17 19:41:01', NULL),
(2, 'Infantiles', '2021-12-17 19:41:06', '2021-12-17 19:41:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentenos_mas_sobre_su_incidencia` longtext COLLATE utf8mb4_unicode_ci,
  `solucion` longtext COLLATE utf8mb4_unicode_ci,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_incidente_id` bigint UNSIGNED NOT NULL,
  `id_prioridad_id` bigint UNSIGNED NOT NULL,
  `id_sede_id` bigint UNSIGNED NOT NULL,
  `id_asignado_id` bigint UNSIGNED DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `google_id`, `auth_type`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$T1deNZW0sGbPkVsc/6CY1O7ZPAyELz/GSf4cBTHtKCvP3g0XoTsIe', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Cristian Andres Prieto Jimenez', 'webmaster@sanbartolome.edu.co', NULL, '$2y$10$NAnkRrTLRQs5eclTiWpIXeLSrV70J3Hble6KiTga4pl2wT4/BkmDG', NULL, '2021-12-14 22:13:11', '2021-12-14 22:13:11', NULL, '112110827630511166698', NULL),
(3, 'Cristian Andrés Prieto Jiménez', 'coorsistemas@sanbartolome.edu.co', NULL, '$2y$10$zmWvDtG2hNucjI7spwbX6u42M7mqKg98pXRChUtLN48aQYKpXWqVi', NULL, '2021-12-15 00:44:21', '2021-12-15 00:44:21', NULL, '111024810548293216778', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint UNSIGNED NOT NULL,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacante_a_la_que_se_postula_fk_5170062` (`vacante_a_la_que_se_postula_id`),
  ADD KEY `created_by_fk_5577088` (`created_by_id`);

--
-- Indices de la tabla `candidato_formacion_academica_profesional`
--
ALTER TABLE `candidato_formacion_academica_profesional`
  ADD KEY `candidato_id_fk_5426825` (`candidato_id`),
  ADD KEY `formacion_academica_profesional_id_fk_5426825` (`formacion_academica_profesional_id`);

--
-- Indices de la tabla `candidato_idiomasgestionhumana`
--
ALTER TABLE `candidato_idiomasgestionhumana`
  ADD KEY `candidato_id_fk_5195855` (`candidato_id`),
  ADD KEY `idiomasgestionhumana_id_fk_5195855` (`idiomasgestionhumana_id`);

--
-- Indices de la tabla `candidato_ofimatica`
--
ALTER TABLE `candidato_ofimatica`
  ADD KEY `candidato_id_fk_5395054` (`candidato_id`),
  ADD KEY `ofimatica_id_fk_5395054` (`ofimatica_id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_4579747` (`created_by_id`);

--
-- Indices de la tabla `componente_fichas_tecnica`
--
ALTER TABLE `componente_fichas_tecnica`
  ADD KEY `fichas_tecnica_id_fk_5195848` (`fichas_tecnica_id`),
  ADD KEY `componente_id_fk_5195848` (`componente_id`);

--
-- Indices de la tabla `documentos_candidatos`
--
ALTER TABLE `documentos_candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5577092` (`created_by_id`);

--
-- Indices de la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salario_fk_5352491` (`salario_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5195854` (`created_by_id`);

--
-- Indices de la tabla `fichas_tecnicas`
--
ALTER TABLE `fichas_tecnicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sede_fk_4571517` (`sede_id`),
  ADD KEY `created_by_fk_4571529` (`created_by_id`);

--
-- Indices de la tabla `ficha_tecnicas`
--
ALTER TABLE `ficha_tecnicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_fk_5005502` (`grupo_id`),
  ADD KEY `ubicacion_fk_5005507` (`ubicacion_id`),
  ADD KEY `encargado_fk_5005508` (`encargado_id`),
  ADD KEY `created_by_fk_5005512` (`created_by_id`);

--
-- Indices de la tabla `formacion_academica_profesionals`
--
ALTER TABLE `formacion_academica_profesionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5577089` (`created_by_id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5005410` (`created_by_id`);

--
-- Indices de la tabla `idiomasgestionhumanas`
--
ALTER TABLE `idiomasgestionhumanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5577090` (`created_by_id`);

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_fk_4944129` (`area_id`),
  ADD KEY `quien_lo_realiza_fk_4989000` (`quien_lo_realiza_id`),
  ADD KEY `created_by_fk_4943176` (`created_by_id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofimaticas`
--
ALTER TABLE `ofimaticas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5577091` (`created_by_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_4517318` (`role_id`),
  ADD KEY `permission_id_fk_4517318` (`permission_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `prioridads`
--
ALTER TABLE `prioridads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_articulados`
--
ALTER TABLE `proyectos_articulados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_5050576` (`created_by_id`);

--
-- Indices de la tabla `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indices de la tabla `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indices de la tabla `reparacions`
--
ALTER TABLE `reparacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activo_fk_5005691` (`activo_id`),
  ADD KEY `created_by_fk_5005697` (`created_by_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_4517327` (`user_id`),
  ADD KEY `role_id_fk_4517327` (`role_id`);

--
-- Indices de la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_incidente_fk_4517773` (`id_incidente_id`),
  ADD KEY `id_prioridad_fk_4517774` (`id_prioridad_id`),
  ADD KEY `id_sede_fk_4517775` (`id_sede_id`),
  ADD KEY `id_asignado_fk_4517916` (`id_asignado_id`),
  ADD KEY `created_by_fk_4517782` (`created_by_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_4987841` (`created_by_id`);

--
-- Indices de la tabla `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_4521161` (`user_alert_id`),
  ADD KEY `user_id_fk_4521161` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos_candidatos`
--
ALTER TABLE `documentos_candidatos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleos`
--
ALTER TABLE `empleos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fichas_tecnicas`
--
ALTER TABLE `fichas_tecnicas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnicas`
--
ALTER TABLE `ficha_tecnicas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacion_academica_profesionals`
--
ALTER TABLE `formacion_academica_profesionals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomasgestionhumanas`
--
ALTER TABLE `idiomasgestionhumanas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `ofimaticas`
--
ALTER TABLE `ofimaticas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prioridads`
--
ALTER TABLE `prioridads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos_articulados`
--
ALTER TABLE `proyectos_articulados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reparacions`
--
ALTER TABLE `reparacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salarios`
--
ALTER TABLE `salarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `created_by_fk_5577088` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vacante_a_la_que_se_postula_fk_5170062` FOREIGN KEY (`vacante_a_la_que_se_postula_id`) REFERENCES `empleos` (`id`);

--
-- Filtros para la tabla `candidato_formacion_academica_profesional`
--
ALTER TABLE `candidato_formacion_academica_profesional`
  ADD CONSTRAINT `candidato_id_fk_5426825` FOREIGN KEY (`candidato_id`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `formacion_academica_profesional_id_fk_5426825` FOREIGN KEY (`formacion_academica_profesional_id`) REFERENCES `formacion_academica_profesionals` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `candidato_idiomasgestionhumana`
--
ALTER TABLE `candidato_idiomasgestionhumana`
  ADD CONSTRAINT `candidato_id_fk_5195855` FOREIGN KEY (`candidato_id`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idiomasgestionhumana_id_fk_5195855` FOREIGN KEY (`idiomasgestionhumana_id`) REFERENCES `idiomasgestionhumanas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `candidato_ofimatica`
--
ALTER TABLE `candidato_ofimatica`
  ADD CONSTRAINT `candidato_id_fk_5395054` FOREIGN KEY (`candidato_id`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ofimatica_id_fk_5395054` FOREIGN KEY (`ofimatica_id`) REFERENCES `ofimaticas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `created_by_fk_4579747` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `componente_fichas_tecnica`
--
ALTER TABLE `componente_fichas_tecnica`
  ADD CONSTRAINT `componente_id_fk_5195848` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fichas_tecnica_id_fk_5195848` FOREIGN KEY (`fichas_tecnica_id`) REFERENCES `fichas_tecnicas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos_candidatos`
--
ALTER TABLE `documentos_candidatos`
  ADD CONSTRAINT `created_by_fk_5577092` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD CONSTRAINT `salario_fk_5352491` FOREIGN KEY (`salario_id`) REFERENCES `salarios` (`id`);

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `created_by_fk_5195854` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `fichas_tecnicas`
--
ALTER TABLE `fichas_tecnicas`
  ADD CONSTRAINT `created_by_fk_4571529` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sede_fk_4571517` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`);

--
-- Filtros para la tabla `ficha_tecnicas`
--
ALTER TABLE `ficha_tecnicas`
  ADD CONSTRAINT `created_by_fk_5005512` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `encargado_fk_5005508` FOREIGN KEY (`encargado_id`) REFERENCES `agentes` (`id`),
  ADD CONSTRAINT `grupo_fk_5005502` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `ubicacion_fk_5005507` FOREIGN KEY (`ubicacion_id`) REFERENCES `sedes` (`id`);

--
-- Filtros para la tabla `formacion_academica_profesionals`
--
ALTER TABLE `formacion_academica_profesionals`
  ADD CONSTRAINT `created_by_fk_5577089` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `created_by_fk_5005410` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `idiomasgestionhumanas`
--
ALTER TABLE `idiomasgestionhumanas`
  ADD CONSTRAINT `created_by_fk_5577090` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `area_fk_4944129` FOREIGN KEY (`area_id`) REFERENCES `fichas_tecnicas` (`id`),
  ADD CONSTRAINT `created_by_fk_4943176` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quien_lo_realiza_fk_4989000` FOREIGN KEY (`quien_lo_realiza_id`) REFERENCES `agentes` (`id`);

--
-- Filtros para la tabla `ofimaticas`
--
ALTER TABLE `ofimaticas`
  ADD CONSTRAINT `created_by_fk_5577091` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_4517318` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_4517318` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos_articulados`
--
ALTER TABLE `proyectos_articulados`
  ADD CONSTRAINT `created_by_fk_5050576` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reparacions`
--
ALTER TABLE `reparacions`
  ADD CONSTRAINT `activo_fk_5005691` FOREIGN KEY (`activo_id`) REFERENCES `ficha_tecnicas` (`id`),
  ADD CONSTRAINT `created_by_fk_5005697` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_4517327` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4517327` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `created_by_fk_4517782` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `id_asignado_fk_4517916` FOREIGN KEY (`id_asignado_id`) REFERENCES `agentes` (`id`),
  ADD CONSTRAINT `id_incidente_fk_4517773` FOREIGN KEY (`id_incidente_id`) REFERENCES `incidentes` (`id`),
  ADD CONSTRAINT `id_prioridad_fk_4517774` FOREIGN KEY (`id_prioridad_id`) REFERENCES `prioridads` (`id`),
  ADD CONSTRAINT `id_sede_fk_4517775` FOREIGN KEY (`id_sede_id`) REFERENCES `sedes` (`id`);

--
-- Filtros para la tabla `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD CONSTRAINT `created_by_fk_4987841` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_4521161` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4521161` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
