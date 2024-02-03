-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2024 г., 21:07
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `virtual_office`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `room_id`, `content`, `created_at`) VALUES
(11, 5, 1, 'asas', '2024-02-02 21:56:24'),
(12, 5, 1, 'asdssssss', '2024-02-02 21:56:32'),
(13, 5, 1, 'adadsdas', '2024-02-02 22:02:53'),
(14, 5, 1, 'dfdfs', '2024-02-02 22:03:04'),
(15, 5, 1, 'sdaasdssssssssssssssssssssssssssssssss', '2024-02-02 22:03:11'),
(16, 5, 1, 'zxczxcczx', '2024-02-02 22:05:26'),
(17, 5, 1, 'sadas', '2024-02-02 22:05:36'),
(18, 6, 1, 'l;l;l;', '2024-02-02 22:06:41'),
(19, 6, 1, 'ФЫВФЫВ', '2024-02-02 22:14:40'),
(20, 8, 1, 'sdaasd', '2024-02-03 00:30:27'),
(21, 8, 1, 'asdasas', '2024-02-03 00:31:25'),
(22, 8, 1, 'addasasd', '2024-02-03 00:35:45'),
(23, 8, 1, 'asdasdasd', '2024-02-03 00:41:15'),
(24, 8, 1, 'asdasdasd', '2024-02-03 00:41:36'),
(25, 8, 1, 'adsdas', '2024-02-03 00:43:58'),
(26, 8, 1, 'adsasddasdasdas', '2024-02-03 00:44:06'),
(27, 8, 1, 'hello world', '2024-02-03 00:45:04'),
(28, 8, 1, 'as', '2024-02-03 00:47:48'),
(29, 8, 1, 'asdads', '2024-02-03 00:48:21'),
(30, 8, 1, 'asas', '2024-02-03 00:49:10'),
(31, 8, 1, 'ывывывывывывывывыв', '2024-02-03 00:51:20'),
(32, 8, 1, 'фыв', '2024-02-03 00:51:52'),
(33, 8, 1, 'asdasd', '2024-02-03 00:53:09'),
(34, 8, 1, 'asddasdasasddas', '2024-02-03 00:54:16'),
(35, 8, 1, 'asasas', '2024-02-03 00:54:31'),
(36, 8, 1, 'asdasdas', '2024-02-03 00:55:23'),
(37, 8, 1, 'hello world', '2024-02-03 00:55:32'),
(38, 8, 1, 'type your function there', '2024-02-03 00:55:50'),
(39, 8, 1, 'asdasdasdasd', '2024-02-03 00:55:59'),
(40, 13, 1, 'adsdas', '2024-02-03 17:42:58'),
(41, 13, 1, 'asdasdasd', '2024-02-03 17:48:40');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int NOT NULL,
  `occupants` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `occupants`) VALUES
(1, 'Office', 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `last_activity` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `current_room` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `last_activity`, `last_login`, `current_room`) VALUES
(1, 'dimash', 'avatar1', '2024-02-02 20:48:09', '2024-02-02 21:53:46', NULL),
(2, 'dimash', 'avatar1', '2024-02-02 20:52:39', '2024-02-02 21:53:46', NULL),
(3, 'asadsasddas', '', '2024-02-02 21:22:00', '2024-02-02 21:53:46', NULL),
(4, 'dimash', '', '2024-02-02 21:23:29', '2024-02-02 21:53:46', NULL),
(5, 'er', 'avatar2', '2024-02-02 21:41:08', '2024-02-02 21:53:46', NULL),
(6, 'dc', 'avatar1', '2024-02-02 22:06:16', '2024-02-02 22:06:16', NULL),
(7, 'daasddas', 'avatar1.jpg', '2024-02-03 00:29:17', '2024-02-03 00:29:17', NULL),
(8, 'asd', 'assets/avatars/avatar-01.svg', '2024-02-03 00:30:07', '2024-02-03 00:30:07', NULL),
(9, 'fff', '', '2024-02-03 00:59:25', '2024-02-03 00:59:25', NULL),
(10, 'вфывфы', 'assets/avatars/avatar-02.svg', '2024-02-03 01:04:07', '2024-02-03 01:04:07', NULL),
(11, 'AS', 'assets/avatars/avatar-05.svg', '2024-02-03 15:56:01', '2024-02-03 15:56:01', NULL),
(12, 'ewesdsdsd', '', '2024-02-03 17:03:50', '2024-02-03 17:03:50', NULL),
(13, 'asdfadsdasd', 'assets/avatars/avatar-03.svg', '2024-02-03 17:06:54', '2024-02-03 17:06:54', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_room`
--

CREATE TABLE `user_room` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_room`
--
ALTER TABLE `user_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user_room`
--
ALTER TABLE `user_room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_room`
--
ALTER TABLE `user_room`
  ADD CONSTRAINT `user_room_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
