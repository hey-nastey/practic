-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2021 г., 09:56
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autors`
--

CREATE TABLE `autors` (
  `id` int NOT NULL,
  `name_autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autors`
--

INSERT INTO `autors` (`id`, `name_autor`) VALUES
(183, 'Н. В. Гоголь'),
(187, 'Л. Н. Толстой'),
(190, 'М. Горький');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `name_book` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name_book`, `image`, `content`, `year`) VALUES
(208, 'Шинель', '61a932a15e60a.jpg', '«Шинель» — одна из петербургских повестей Николая Гоголя. Увидела свет в 3-м томе собрания сочинений Гоголя, отпечатанного на исходе 1842 года и поступившего в продажу в последней декаде января 1843 года. Вошла в историю русской литературы как «манифест социального равенства и неотъемлемых прав личности в любом её состоянии и звании».', '1841'),
(212, 'Детство', '61a939098b757.jpg', '«Детство» — первая повесть автобиографической трилогии Льва Толстого, впервые напечатана в 1852 году в журнале «Современник», № 9. Эта книга описывает психологические переживания, которые испытывают многие мальчики в детстве: первая влюблённость, чувство несправедливости, обида, стеснение.', '1852'),
(215, 'На дне', '61a9b9709416f.jpg', '123', '1902');

-- --------------------------------------------------------

--
-- Структура таблицы `connection`
--

CREATE TABLE `connection` (
  `id_book` int NOT NULL,
  `id_autors` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `connection`
--

INSERT INTO `connection` (`id_book`, `id_autors`) VALUES
(208, 183),
(212, 187),
(215, 190);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`) VALUES
(16, '2@mail.ru', '2', 'c81e728d9d4c2f636f067f89cc14862c');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `connection`
--
ALTER TABLE `connection`
  ADD KEY `id_autors` (`id_autors`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_ibfk_1` FOREIGN KEY (`id_autors`) REFERENCES `autors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connection_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
