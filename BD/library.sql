-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 23 2021 г., 14:25
-- Версия сервера: 10.5.8-MariaDB-1:10.5.8+maria~stretch
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user142153_library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id_book` int(11) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(140) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `publisher` varchar(80) NOT NULL,
  `year` int(4) UNSIGNED NOT NULL,
  `chitatel` varchar(150) NOT NULL,
  `vozvrat` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_book`, `title`, `author`, `genre`, `publisher`, `year`, `chitatel`, `vozvrat`) VALUES
(1, 'Война и мир', 'Толстой Л.Н,', 'роман', 'АСТ', 2005, 'В наличии', '2021-01-23'),
(2, 'Анна Каренина', 'Толстой Л.Н,', 'роман', 'азбука', 2015, 'Петров.А.Б.', '2021-02-07');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`id`, `login`, `pass`, `name`, `surname`) VALUES
(1, 'Alex_95', '1234', 'Александр', 'Волков'),
(2, 'Ivan0v', '1367', 'Иван', 'Иванов'),
(3, 'Admin', 'f0eb408a95a4a3ec4d50855b6bb266ea', 'Сергей', 'Админов'),
(8, 'Ovosh98', 'a7552ad1d4f93b3306efaf4369cfde18', 'Сергей', 'Овощев'),
(9, 'Admin', '1ae76c5aca6859e16608285bf10af1b5', 'Андрей', 'Александр'),
(10, 'qwerty', 'e056a0bc408dfc88c5cb2e69214b0c1e', 'qwerty', 'qwerty');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `id_book` (`id_book`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
