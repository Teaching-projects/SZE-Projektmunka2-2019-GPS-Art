-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2019. Okt 28. 11:54
-- Kiszolgáló verziója: 10.3.17-MariaDB-0+deb10u1
-- PHP verzió: 7.3.9-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `projektmunka`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `competitions`
--

CREATE TABLE `competitions` (
  `competitionid` bigint(20) UNSIGNED NOT NULL,
  `drawingid` bigint(20) UNSIGNED NOT NULL,
  `competitionname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `competition_created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `drawings`
--

CREATE TABLE `drawings` (
  `drawingid` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `drawingname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `drawing_file_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `drawing_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `drawings`
--

INSERT INTO `drawings` (`drawingid`, `id`, `drawingname`, `drawing_file_name`, `drawing_created_at`) VALUES
(3, 1, 'A', '1_A_2019.10.27-20:29:58.png', '2019-10-27 20:29:58'),
(4, 1, 'kacsa', '1_kacsa_2019.10.27-20:41:50.png', '2019-10-27 20:41:50'),
(5, 1, '0', '1_0_2019.10.28-10:00:10.png', '2019-10-28 10:00:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
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
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `participants`
--

CREATE TABLE `participants` (
  `participantid` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `trackid` bigint(20) UNSIGNED NOT NULL,
  `competitionid` bigint(20) UNSIGNED NOT NULL,
  `metric` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tracks`
--

CREATE TABLE `tracks` (
  `trackid` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `trackname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `track_file_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `track_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tracks`
--

INSERT INTO `tracks` (`trackid`, `id`, `trackname`, `track_file_name`, `track_created_at`) VALUES
(6, 1, 'Ez már nem igazán okés', '1_Ez már jó_2019.09.29-03:01:14.gpx', '2019-09-29 15:01:14'),
(13, 1, 'Találat', '1_gfhjgfhj_2019.09.29-03:14:27.gpx', '2019-09-29 03:14:27'),
(14, 1, 'Valami', '1_Valami_2019.09.29-15:44:13.gpx', '2019-09-29 15:44:13');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_created_at` timestamp NULL DEFAULT NULL,
  `user_updated_at` timestamp NULL DEFAULT NULL,
  `superuser` tinyint(1) NOT NULL DEFAULT 0,
  `inactive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_created_at`, `user_updated_at`, `superuser`, `inactive`) VALUES
(1, 'Tanszéki Ügyintéző', 'tsz.ui@sze.hu', NULL, '$2y$10$9nyZByNrwZ87XVgZWnh18.0PgOT/ek08pYlURA7mQT/OV8ovn3gae', NULL, '2019-09-22 15:58:30', '2019-09-22 15:58:30', 1, 0),
(2, 'Hatwagner Miklós', 'hati@sze.hu', NULL, '$2y$10$25y.NYnPxK0Kb.pzjeXG6u58RjZWOvPKlPVfZjnhR0rksY3scI43W', NULL, '2019-09-25 13:56:27', '2019-09-25 13:56:27', 0, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competitionid`),
  ADD KEY `drawingid` (`drawingid`);

--
-- A tábla indexei `drawings`
--
ALTER TABLE `drawings`
  ADD PRIMARY KEY (`drawingid`),
  ADD KEY `userid` (`id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participantid`),
  ADD KEY `userid` (`id`),
  ADD KEY `trackid` (`trackid`),
  ADD KEY `competitionid` (`competitionid`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`trackid`),
  ADD KEY `userid` (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competitionid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `drawings`
--
ALTER TABLE `drawings`
  MODIFY `drawingid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `participants`
--
ALTER TABLE `participants`
  MODIFY `participantid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `tracks`
--
ALTER TABLE `tracks`
  MODIFY `trackid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `competitions_ibfk_1` FOREIGN KEY (`drawingid`) REFERENCES `drawings` (`drawingid`);

--
-- Megkötések a táblához `drawings`
--
ALTER TABLE `drawings`
  ADD CONSTRAINT `drawings_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`trackid`) REFERENCES `tracks` (`trackid`),
  ADD CONSTRAINT `participants_ibfk_3` FOREIGN KEY (`competitionid`) REFERENCES `competitions` (`competitionid`);

--
-- Megkötések a táblához `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
