-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 23 2025 г., 15:13
-- Версия сервера: 8.0.25-15
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u3006270_rush`
--

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `description`) VALUES
(1, 'Разработка сайтов', 'Разрабатываю сайты с использованием HTML, CSS, JavaScript и PHP — от простых страниц до сложных веб-приложений.'),
(2, 'Разработка ботов для telegram ', 'Разрабатываю Telegram-ботов на JavaScript, PHP, Python, C++ и C# — от простых чат-помощников до сложных автоматизированных систем.'),
(3, 'PHP Разработчик', 'Создаю мощные веб-приложения на PHP и Laravel с использованием JavaScript и Ajax для максимальной производительности и удобства.'),
(4, 'Разработка сайтов на CMS', 'Разрабатываю сайты на WordPress — гибко, быстро и с минимальным кодированием. От блогов до интернет-магазинов под ключ '),
(5, 'Разработка и поддержка сайтов на framework', 'Разработка и поддержка сайтов на Laravel, Yii и Yii2 — быстро, надёжно, масштабируемо');

-- --------------------------------------------------------

--
-- Структура таблицы `service_tools`
--

CREATE TABLE `service_tools` (
  `service_id` int NOT NULL,
  `tool_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `service_tools`
--

INSERT INTO `service_tools` (`service_id`, `tool_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 10),
(5, 10),
(5, 11),
(5, 12),
(4, 13),
(3, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `tools`
--

CREATE TABLE `tools` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tools`
--

INSERT INTO `tools` (`id`, `name`, `description`) VALUES
(1, 'HTML', NULL),
(2, 'CSS', NULL),
(3, 'JavaScript', NULL),
(4, 'PHP', NULL),
(5, 'Python', NULL),
(6, 'C++', NULL),
(7, 'C#', NULL),
(10, 'laravel', NULL),
(11, 'Yii', NULL),
(12, 'Yii2', NULL),
(13, 'Wordpress', NULL),
(14, 'Ajax', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_tools`
--
ALTER TABLE `service_tools`
  ADD PRIMARY KEY (`service_id`,`tool_id`),
  ADD KEY `tool_id` (`tool_id`);

--
-- Индексы таблицы `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `service_tools`
--
ALTER TABLE `service_tools`
  ADD CONSTRAINT `service_tools_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_tools_ibfk_2` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
