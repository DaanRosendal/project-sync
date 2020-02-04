-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 feb 2020 om 22:11
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sync`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `declaraties`
--

CREATE TABLE `declaraties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `declaraties`
--

INSERT INTO `declaraties` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(2, 4, 101, '2020-02-01 14:46:47', '2020-02-01 14:46:47'),
(3, 4, 111, '2020-02-01 14:48:25', '2020-02-01 14:48:25'),
(4, 4, 201, '2020-02-01 14:58:07', '2020-02-01 14:58:07'),
(5, 3, 101, '2020-02-02 18:53:23', '2020-02-02 18:53:23'),
(6, 4, 222, '2020-02-03 17:49:09', '2020-02-03 17:49:09');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `declaratie_kost`
--

CREATE TABLE `declaratie_kost` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `declaratie_id` bigint(20) UNSIGNED NOT NULL,
  `kost_id` bigint(20) UNSIGNED NOT NULL,
  `bedrag` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `declaratie_kost`
--

INSERT INTO `declaratie_kost` (`id`, `declaratie_id`, `kost_id`, `bedrag`, `created_at`, `updated_at`) VALUES
(2, 2, 101, 11.00, NULL, NULL),
(3, 3, 101, 20.00, NULL, NULL),
(4, 4, 101, 27.72, NULL, NULL),
(5, 2, 100, 55.00, NULL, NULL),
(6, 2, 201, 987.32, NULL, NULL),
(54, 3, 102, 95.00, '2020-02-02 14:01:10', '2020-02-02 14:01:10'),
(56, 2, 301, 223.00, '2020-02-02 18:47:22', '2020-02-02 18:47:22'),
(57, 2, 300, 25.00, '2020-02-02 18:49:15', '2020-02-02 18:49:15'),
(58, 5, 100, 55.00, '2020-02-02 18:53:23', '2020-02-02 18:53:23'),
(59, 5, 102, 55.00, '2020-02-02 18:54:03', '2020-02-02 18:54:03'),
(60, 5, 301, 450.00, '2020-02-02 18:54:11', '2020-02-02 18:54:11'),
(61, 5, 101, 6.00, '2020-02-02 21:03:07', '2020-02-02 21:03:07'),
(63, 6, 201, 834.87, '2020-02-03 17:49:09', '2020-02-03 17:49:09');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
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
-- Tabelstructuur voor tabel `kosten`
--

CREATE TABLE `kosten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `omschrijving` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kosten`
--

INSERT INTO `kosten` (`id`, `omschrijving`, `created_at`, `updated_at`) VALUES
(100, 'Reiskosten - OV', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(101, 'Reiskosten - Eigen Auto', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(102, 'Boeken', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(200, 'Mobiele Telefoon', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(201, 'Laptop', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(300, 'PR', '2020-02-01 15:42:19', '2020-02-01 15:42:19'),
(301, 'Leaseauto', '2020-02-01 15:42:19', '2020-02-01 15:42:19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_25_142640_create_projecten_table', 1),
(5, '2020_01_25_142651_create_kosten_table', 1),
(6, '2020_01_25_142703_create_declaraties_table', 1),
(7, '2020_01_25_142711_create_declaratie_kost_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE `projecten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `projecten`
--

INSERT INTO `projecten` (`id`, `naam`, `created_at`, `updated_at`) VALUES
(101, 'KPN 002', '2020-02-01 15:38:47', '2020-02-01 15:39:08'),
(111, 'KLM - Rood', '2020-02-01 15:39:08', '2020-02-01 15:39:08'),
(201, 'Tele2', '2020-02-01 15:39:08', '2020-02-01 15:39:08'),
(222, 'Schiphol', '2020-02-01 15:39:08', '2020-02-01 15:39:08'),
(301, 'ING', '2020-02-01 15:39:08', '2020-02-01 15:39:08'),
(333, 'RAI', '2020-02-01 15:39:08', '2020-02-03 20:06:42');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'J. Derksen', 'jderksen@example.com', NULL, '$2y$10$K1K4It/vb47MFtRQGnJ1SeTlciCvVZf6eoFaPBjmm0HbikkrsnvTS', 0, NULL, '2020-01-31 20:54:23', '2020-01-31 20:54:23'),
(2, 'W. Genee', 'wgenee@example.com', NULL, '$2y$10$9pQbKPCgc7in4MYsdcNKcOKLO8LUJga3/tgjvKVRFVCVs6GrakNsO', 0, NULL, '2020-02-01 14:32:35', '2020-02-01 14:32:35'),
(3, 'R. Van Der Gijp', 'rvandergijp@example.com', NULL, '$2y$10$gqIkzSOnxEUtZ/GoM4kSTuGbyXEQedl8nAOOSr5ECA5blQI8KgQvW', 0, NULL, '2020-02-01 14:32:49', '2020-02-01 14:32:49'),
(4, 'F. De Jong', 'fdejong@example.com', NULL, '$2y$10$I.uUP8JE9Fp.76P/VKjDjODDRYUNuwfGxw4wHjGg2Y2ppMZ8wOid6', 0, NULL, '2020-02-01 14:33:03', '2020-02-01 14:33:03'),
(5, 'M. De Ligt', 'mdeligt@example.com', NULL, '$2y$10$NmeRudOi9UZL10l3.3Rv5.RN0ErzI9dWVBivxQvndOzRfU8YkfLvi', 0, NULL, '2020-02-01 14:33:50', '2020-02-01 14:33:50'),
(6, 'D. Rosendal', 'daanrosendal@gmail.com', NULL, '$2y$10$RFn17ZbznRFXtLEu8LjHbOGJtLPzVe22RjBrGXmJCKnhWulCJxakS', 1, NULL, '2020-02-01 14:34:19', '2020-02-01 14:34:19');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `declaraties`
--
ALTER TABLE `declaraties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `declaraties_user_id_project_id_unique` (`user_id`,`project_id`),
  ADD KEY `declaraties_project_id_foreign` (`project_id`);

--
-- Indexen voor tabel `declaratie_kost`
--
ALTER TABLE `declaratie_kost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `declaratie_kost_declaratie_id_kost_id_unique` (`declaratie_id`,`kost_id`),
  ADD KEY `declaratie_kost_kost_id_foreign` (`kost_id`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kosten`
--
ALTER TABLE `kosten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `declaraties`
--
ALTER TABLE `declaraties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `declaratie_kost`
--
ALTER TABLE `declaratie_kost`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `kosten`
--
ALTER TABLE `kosten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `projecten`
--
ALTER TABLE `projecten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `declaraties`
--
ALTER TABLE `declaraties`
  ADD CONSTRAINT `declaraties_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `declaraties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `declaratie_kost`
--
ALTER TABLE `declaratie_kost`
  ADD CONSTRAINT `declaratie_kost_declaratie_id_foreign` FOREIGN KEY (`declaratie_id`) REFERENCES `declaraties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `declaratie_kost_kost_id_foreign` FOREIGN KEY (`kost_id`) REFERENCES `kosten` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
