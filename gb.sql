-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 18 2021 г., 10:40
-- Версия сервера: 5.6.51-log
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_name`, `comment`, `id_img`) VALUES
(1, 'sibok', 'секси!', 2),
(2, 'admin', 'Классное фото', 2),
(3, 'Боб', 'Замечательный косплей!', 2),
(4, 'Боб', 'Милота!!!', 3),
(5, 'Боб', 'Няяяя....', 1),
(6, '\n          sibok', '\n          Бесподобно', 6),
(7, 'Боб', 'Супер!', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `counter` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `url`, `counter`, `price`, `quantity`, `description`) VALUES
(1, 'Товар 1', '/images/001.jpg', 12, '100.00', 10, 'Ad ipsum fugiat laboris eu proident do ad sunt Lorem amet consequat officia. Aliqua quis aliqua dolor dolore minim mollit cillum ut irure aute ut aute. Fugiat cillum consectetur ipsum nulla velit veniam id.'),
(2, 'Товар 2', '/images/002.jpg', 87, '150.00', 50, 'Culpa fugiat occaecat incididunt magna consequat laboris tempor est labore laboris ipsum consectetur laboris. Voluptate Lorem ex excepteur ad elit dolor amet ullamco do. Nisi Lorem culpa sunt nostrud irure commodo nisi consectetur. Magna aliqua elit dolore'),
(3, 'Товар 3', '/images/003.jpg', 87, '70.00', 5, 'Sunt dolor adipisicing dolor commodo est id dolor. Mollit culpa et cillum ipsum ex minim nisi voluptate qui dolor mollit.'),
(4, 'Товар 4', '/images/004.jpg', 8, '250.00', 40, 'Mollit exercitation anim aliquip commodo deserunt reprehenderit aute magna. Lorem aute ex fugiat pariatur non cupidatat.'),
(5, 'Товар 5', '/images/005.jpg', 13, '180.00', 70, 'Sunt commodo duis esse mollit minim laboris irure cillum excepteur in elit. Sit mollit aliqua laborum qui et.'),
(6, 'Товар 6', '/images/006.jpg', 33, '190.00', 2, 'Tempor aute consequat laborum ut voluptate aute voluptate ipsum velit. Adipisicing quis laboris voluptate Lorem do.'),
(7, 'Товар 7', '/images/001.jpg', 12, '100.00', 10, 'Ad ipsum fugiat laboris eu proident do ad sunt Lorem amet consequat officia. Aliqua quis aliqua dolor dolore minim mollit cillum ut irure aute ut aute. Fugiat cillum consectetur ipsum nulla velit veniam id.'),
(8, 'Товар 8', '/images/002.jpg', 87, '150.00', 50, 'Culpa fugiat occaecat incididunt magna consequat laboris tempor est labore laboris ipsum consectetur laboris. Voluptate Lorem ex excepteur ad elit dolor amet ullamco do. Nisi Lorem culpa sunt nostrud irure commodo nisi consectetur. Magna aliqua elit dolore'),
(9, 'Товар 9', '/images/003.jpg', 87, '70.00', 5, 'Sunt dolor adipisicing dolor commodo est id dolor. Mollit culpa et cillum ipsum ex minim nisi voluptate qui dolor mollit.'),
(10, 'Товар 10', '/images/004.jpg', 8, '250.00', 40, 'Mollit exercitation anim aliquip commodo deserunt reprehenderit aute magna. Lorem aute ex fugiat pariatur non cupidatat.'),
(11, 'Товар 11', '/images/005.jpg', 13, '180.00', 70, 'Sunt commodo duis esse mollit minim laboris irure cillum excepteur in elit. Sit mollit aliqua laborum qui et.'),
(12, 'Товар 12', '/images/006.jpg', 33, '190.00', 2, 'Tempor aute consequat laborum ut voluptate aute voluptate ipsum velit. Adipisicing quis laboris voluptate Lorem do.');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `url`, `counter`) VALUES
(1, 'Image 1', '/images/001.jpg', 5),
(2, 'Image 2', '/images/002.jpg', 7),
(3, 'Image 3', '/images/003.jpg', 12),
(4, 'Image 4', '/images/004.jpg', 5),
(5, 'Image 5', '/images/005.jpg', 7),
(6, 'Image 6', '/images/006.jpg', 5),
(7, 'Image 7', '/images/001.jpg', 5),
(8, 'Image 8', '/images/002.jpg', 7),
(9, 'Image 9', '/images/003.jpg', 12),
(10, 'Image 10', '/images/004.jpg', 5),
(11, 'Image 11', '/images/005.jpg', 7),
(12, 'Image 12', '/images/006.jpg', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `user_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `user_name`) VALUES
(1, 'admin', '123456', 'Админ Админович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
