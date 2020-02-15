-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 feb 2020 om 15:30
-- Serverversie: 10.1.43-MariaDB-cll-lve
-- PHP-versie: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `deb124651_project-sync`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `declaraties`
--

CREATE TABLE IF NOT EXISTS `declaraties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `declaraties_user_id_project_id_unique` (`user_id`,`project_id`),
  KEY `declaraties_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `declaraties`
--

INSERT INTO `declaraties` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 111, '2020-01-31 07:27:37', '2020-01-31 07:27:37'),
(7, 3, 101, '2020-02-03 07:06:32', '2020-02-03 07:06:32'),
(8, 3, 111, '2020-02-03 07:06:40', '2020-02-03 07:06:40'),
(9, 3, 303, '2020-02-03 07:07:21', '2020-02-03 07:07:21'),
(10, 3, 333, '2020-02-03 07:07:43', '2020-02-03 07:07:43'),
(11, 4, 333, '2020-02-04 10:24:46', '2020-02-04 10:24:46'),
(12, 4, 111, '2020-02-04 11:05:51', '2020-02-04 11:05:51'),
(13, 11, 303, '2020-02-05 06:36:58', '2020-02-05 06:36:58'),
(14, 4, 303, '2020-02-14 23:31:52', '2020-02-14 23:31:52');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `declaratie_kost`
--

CREATE TABLE IF NOT EXISTS `declaratie_kost` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `declaratie_id` bigint(20) unsigned NOT NULL,
  `kost_id` bigint(20) unsigned NOT NULL,
  `bedrag` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `declaratie_kost_declaratie_id_kost_id_unique` (`declaratie_id`,`kost_id`),
  KEY `declaratie_kost_kost_id_foreign` (`kost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Gegevens worden uitgevoerd voor tabel `declaratie_kost`
--

INSERT INTO `declaratie_kost` (`id`, `declaratie_id`, `kost_id`, `bedrag`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 123.00, '2020-01-14 13:24:07', '2020-01-14 13:24:07'),
(15, 7, 100, 60.00, '2020-02-03 07:06:32', '2020-02-03 07:06:32'),
(16, 8, 301, 350.00, '2020-02-03 07:06:40', '2020-02-03 07:06:40'),
(17, 7, 102, 99.00, '2020-02-03 07:06:48', '2020-02-03 07:06:48'),
(18, 7, 201, 667.00, '2020-02-03 07:06:59', '2020-02-03 07:06:59'),
(19, 8, 201, 870.00, '2020-02-03 07:07:12', '2020-02-03 07:07:12'),
(20, 9, 200, 123.00, '2020-02-03 07:07:21', '2020-02-03 07:07:21'),
(22, 9, 100, 223.00, '2020-02-03 07:07:33', '2020-02-03 07:07:33'),
(23, 10, 301, 570.00, '2020-02-03 07:07:43', '2020-02-03 07:07:43'),
(24, 10, 300, 50.00, '2020-02-03 07:07:51', '2020-02-03 07:07:51'),
(25, 10, 200, 55.00, '2020-02-03 07:07:57', '2020-02-03 07:07:57'),
(26, 9, 101, 39.00, '2020-02-03 09:23:46', '2020-02-03 09:23:46'),
(27, 11, 200, 55.00, '2020-02-04 10:24:46', '2020-02-04 10:24:46'),
(28, 12, 200, 55.00, '2020-02-04 11:05:51', '2020-02-04 11:05:51'),
(29, 13, 101, 45.00, '2020-02-05 06:36:58', '2020-02-05 06:36:58'),
(30, 11, 311, 320.33, '2020-02-14 19:45:39', '2020-02-14 19:45:39'),
(31, 11, 101, 49.99, '2020-02-14 19:50:13', '2020-02-14 19:50:13'),
(32, 14, 311, 22.00, '2020-02-14 23:31:52', '2020-02-14 23:31:52');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kosten`
--

CREATE TABLE IF NOT EXISTS `kosten` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;

--
-- Gegevens worden uitgevoerd voor tabel `kosten`
--

INSERT INTO `kosten` (`id`, `omschrijving`, `created_at`, `updated_at`) VALUES
(100, 'Reiskosten - OV', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(101, 'Reiskosten - Eigen Auto', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(102, 'Boeken', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(200, 'Mobiele Telefoon', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(201, 'Laptop', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(300, 'PR', '2020-01-31 08:11:48', '2020-01-31 08:11:48'),
(301, 'Leaseauto', '2020-01-31 08:11:48', '2020-02-04 08:15:16'),
(311, 'TESTING', '2020-02-04 11:09:23', '2020-02-04 11:09:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `migrations`
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

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=335 ;

--
-- Gegevens worden uitgevoerd voor tabel `projecten`
--

INSERT INTO `projecten` (`id`, `naam`, `created_at`, `updated_at`) VALUES
(101, 'KPN 002', '2020-01-31 08:08:12', '2020-01-31 08:08:12'),
(111, 'KLM - Rood', '2020-01-31 08:08:12', '2020-01-31 08:08:12'),
(202, 'Tele2', '2020-01-31 08:08:12', '2020-01-31 08:08:12'),
(222, 'Schiphol', '2020-01-31 08:08:12', '2020-01-31 08:08:12'),
(303, 'ING', '2020-01-31 08:08:12', '2020-01-31 08:08:12'),
(333, 'RAI', '2020-01-31 08:08:12', '2020-01-31 08:08:12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'J. Derksen', 'jderksen@example.com', NULL, '$2y$10$j0MV.i7wUsLBI7hoQGWADeUAWaBnKQS7K0EoVelglBOnGt/WjOuqG', 0, 'Q9dcXGO8aBBH0sz7IZSfFq0bSDN6O9b5Uk0DdOQqcO6iE9xeeNOuA9rJWkun', '2020-01-31 07:13:02', '2020-02-04 11:12:30'),
(2, 'W. Genee', 'wgenee@example.com', NULL, '$2y$10$YqkmTQi2MOAESBJyLrrH9OasECUB5N4IbDC9dQH/uiu.qtB4RDiQ2', 0, '', '2020-01-31 09:06:48', '2020-01-31 09:06:48'),
(3, 'R. van der Gijp', 'rvandergijp@example.com', NULL, '$2y$10$zrlcn8b571/gXcfzjosVWup9Spe/5Rk5LJgHN5EXgkSDxiKI9L7VO', 0, '', '2020-01-31 09:07:14', '2020-01-31 09:07:14'),
(4, 'F. De Jong', 'fdejong@example.com', NULL, '$2y$10$GZHIrU0.HUBDvBRYunhUaeFz8hNTpWP7jURihGA84uHu.WPd6YJfW', 0, 'HaiBlL5YTFHPj8KTcXapjv2Y5WXs6BJmOrtzmMA5U479uOQG8bkovBGmvGFD', '2020-01-31 09:07:29', '2020-01-31 09:07:29'),
(5, 'M. De Ligt', 'mdeligt@example.com', NULL, '$2y$10$XGONYqE2ROiqqOKJ6Y1PyOpC08iLLucsUydWtU.GSqa2t7RS9Oapi', 0, '', '2020-01-31 09:07:57', '2020-01-31 09:07:57'),
(6, 'D. Rosendal', 'daanrosendal@gmail.com', NULL, '$2y$10$mz4ZK0LU4qrfq5U4XTuObeApQoJZJvXwz0fzLYK5av7RcjtqgPPve', 1, '', '2020-01-31 09:08:26', '2020-01-31 09:08:26'),
(11, 'Testgebruiker', 'test@daanrosendal.com', NULL, '$2y$10$0rE9LsoXF48LqIasLHM5duJI6CNZtadhyGTvY2oyftz/g1hxob6wW', 0, '', '2020-02-05 06:36:01', '2020-02-05 06:36:01');

--
-- Beperkingen voor gedumpte tabellen
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
