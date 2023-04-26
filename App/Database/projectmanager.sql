-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 26. 13:31
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `projectmanager`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20230313193628, 'CreateUserTable', '2023-03-13 19:49:12', '2023-03-13 19:49:12', 0),
(20230313195101, 'CreateProjectTable', '2023-03-13 19:51:28', '2023-03-13 19:51:28', 0),
(20230313195316, 'CreateTasksTable', '2023-03-13 20:09:09', '2023-03-13 20:09:09', 0),
(20230313201540, 'CreateTimesheetCellsTable', '2023-03-13 20:16:28', '2023-03-13 20:16:28', 0),
(20230313201646, 'CreateTimesheetLineTable', '2023-03-13 20:25:05', '2023-03-13 20:25:06', 0),
(20230313202632, 'CreateTimesheetTable', '2023-03-13 20:30:39', '2023-03-13 20:30:39', 0),
(20230313203105, 'AddForeignKeyToTimesheetLine', '2023-03-13 20:36:24', '2023-03-13 20:36:24', 0),
(20230313203817, 'AddForeignKeyToTimesheetCell', '2023-03-13 20:39:57', '2023-03-13 20:39:57', 0),
(20230313204046, 'DropTechnicalTableForLinesAndCells', '2023-03-13 20:41:30', '2023-03-13 20:41:30', 0),
(20230314171320, 'RenameAssigneesTable', '2023-03-14 17:14:46', '2023-03-14 17:14:46', 0),
(20230314171803, 'AdjustTimesheetModels', '2023-03-14 17:27:54', '2023-03-14 17:27:54', 0),
(20230314173257, 'FixForeignKeys', '2023-03-14 17:36:46', '2023-03-14 17:36:46', 0),
(20230314174730, 'RenameTimesheetTable', '2023-03-14 17:48:14', '2023-03-14 17:48:14', 0),
(20230314190444, 'RenameOwnerId', '2023-03-14 19:05:51', '2023-03-14 19:05:51', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `owner_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `start_date`, `end_date`, `owner_id`) VALUES
(6, 'Test sadsadas asdasdsa updated', 'Test', '2023-03-16 00:00:00', '2023-03-16 00:00:00', 1),
(7, 'Test', 'Test', '2023-03-17 13:39:47', '2023-03-17 13:39:47', 1),
(8, 'Test', 'Test', '2023-03-17 13:47:25', '2023-03-17 13:47:25', 1),
(9, 'Test project', 'asdasda', '2023-04-21 00:00:00', '2023-04-28 00:00:00', 1),
(10, 'asdasda', 'asda', '2023-04-10 00:00:00', '2023-04-29 00:00:00', 1),
(11, 'Test Project asdadasd', 'dasd', '2023-04-10 00:00:00', '2023-04-15 00:00:00', 1),
(12, 'Test updated', 'Test dasdas', '2023-03-16 00:00:00', '2023-03-26 00:00:00', 1),
(13, 'Test updated', 'Test dasdas', '2023-03-16 00:00:00', '2023-04-26 00:00:00', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `project_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `project_id`, `status`) VALUES
(2, 'asda', 'asda', 6, 'TO DO'),
(3, 'asda', 'asda', 6, 'TO DO'),
(4, 'asda', 'asda', 6, 'TO DO'),
(5, 'asda', 'asda', 6, 'TO DO'),
(6, 'asda udpated', 'asda', 6, 'TO DO'),
(7, 'asda udpated 2', 'asda', 6, 'Done'),
(8, 'asd', 'asd', 13, 'TO DO');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `timesheets`
--

CREATE TABLE `timesheets` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `timesheets`
--

INSERT INTO `timesheets` (`id`, `user_id`, `start_date`, `end_date`) VALUES
(1, 3, '2023-04-17 00:00:00', '2023-04-23 00:00:00'),
(2, 3, '2023-04-03 00:00:00', '2023-04-09 00:00:00'),
(3, 3, '2023-05-01 00:00:00', '2023-05-07 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `timesheet_cells`
--

CREATE TABLE `timesheet_cells` (
  `id` int(11) UNSIGNED NOT NULL,
  `hours_worked` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `timesheet_line_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `timesheet_cells`
--

INSERT INTO `timesheet_cells` (`id`, `hours_worked`, `date`, `timesheet_line_id`) VALUES
(1, 0, '2023-04-17', 4),
(2, 0, '2023-04-18', 4),
(3, 0, '2023-04-19', 4),
(4, 0, '2023-04-20', 4),
(5, 0, '2023-04-21', 4),
(6, 0, '2023-04-22', 4),
(7, 0, '2023-04-23', 4),
(8, 2, '2023-05-01', 5),
(9, 3, '2023-05-02', 5),
(10, 0, '2023-05-03', 5),
(11, 0, '2023-05-04', 5),
(12, 4, '2023-05-05', 5),
(13, 5, '2023-05-06', 5),
(14, 1, '2023-05-07', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `timesheet_lines`
--

CREATE TABLE `timesheet_lines` (
  `id` int(11) UNSIGNED NOT NULL,
  `timesheet_id` int(11) UNSIGNED DEFAULT NULL,
  `task_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `timesheet_lines`
--

INSERT INTO `timesheet_lines` (`id`, `timesheet_id`, `task_id`) VALUES
(4, 1, 2),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Test', 'test@test.com', '123', 'regular'),
(3, 'Kukucska Dániel', 'daniel.kukucska.txt@gmail.com', '$2y$10$U.FiyQsLLETkJ5clAR8xCuWIVvbi76TF6ybOZ7EXCfPdc4PJSJMHW', 'regular'),
(4, 'Kukucska Dániel', 'daniel.kukucska.txt2@gmail.com', '$2y$10$xvAzw41T7tmYPfLkuVs3Ie9jjFs04DPQ/isn10HTdIMd4XmraD8rC', 'regular'),
(5, 'Kukucska Dániel', 'daniel.kukucska.txt3@gmail.com', '$2y$10$Ezihgo5GKg7LxkDGmBtoeOZOYCJy6EHgKYiYxgFAy7s1qH45H2Dre', 'regular'),
(6, 'Kukucska Dániel', 'daniel.kukucska.txt4@gmail.com', '$2y$10$sAKtU/2cOHSOFT0F2gU0lOkPe0mHUwBkEu8Y6QDFtZtHTMgZr0R/e', 'regular');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users_tasks`
--

CREATE TABLE `users_tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `task_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users_tasks`
--

INSERT INTO `users_tasks` (`id`, `task_id`, `user_id`) VALUES
(1, 6, 6),
(2, 6, 6),
(3, 6, 6),
(7, 2, 6),
(11, 8, 6),
(12, 2, 3);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- A tábla indexei `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_owner_id` (`owner_id`);

--
-- A tábla indexei `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- A tábla indexei `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `timesheet_cells`
--
ALTER TABLE `timesheet_cells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheet_line_id` (`timesheet_line_id`);

--
-- A tábla indexei `timesheet_lines`
--
ALTER TABLE `timesheet_lines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timesheet_id` (`timesheet_id`,`task_id`),
  ADD KEY `task_id` (`task_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `users_tasks`
--
ALTER TABLE `users_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `timesheet_cells`
--
ALTER TABLE `timesheet_cells`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `timesheet_lines`
--
ALTER TABLE `timesheet_lines`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `users_tasks`
--
ALTER TABLE `users_tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `timesheet_cells`
--
ALTER TABLE `timesheet_cells`
  ADD CONSTRAINT `timesheet_cells_ibfk_2` FOREIGN KEY (`timesheet_line_id`) REFERENCES `timesheet_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `timesheet_lines`
--
ALTER TABLE `timesheet_lines`
  ADD CONSTRAINT `timesheet_lines_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `users_tasks`
--
ALTER TABLE `users_tasks`
  ADD CONSTRAINT `users_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_tasks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
