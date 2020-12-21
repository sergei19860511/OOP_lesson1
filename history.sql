-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2020 г., 22:46
-- Версия сервера: 5.6.47
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dz4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `user_id`, `url`) VALUES
(2, 1, '/users/logout'),
(3, 1, '/users'),
(4, 1, '/favicon.ico'),
(5, 1, '/catalog'),
(6, 1, '/favicon.ico'),
(8, 1, '/users'),
(9, 1, '/favicon.ico'),
(10, 1, '/users'),
(11, 1, '/favicon.ico'),
(12, 1, '/users'),
(13, 1, '/favicon.ico'),
(14, 1, '/users'),
(15, 1, '/favicon.ico'),
(16, 1, '/users'),
(17, 1, '/favicon.ico'),
(18, 1, '/users'),
(19, 1, '/favicon.ico'),
(20, 1, '/users'),
(21, 1, '/favicon.ico'),
(22, 1, '/users'),
(23, 1, '/favicon.ico'),
(24, 1, '/users'),
(25, 1, '/favicon.ico'),
(26, 1, '/users'),
(27, 1, '/favicon.ico'),
(28, 1, '/users'),
(29, 1, '/favicon.ico'),
(30, 1, '/users/logout'),
(31, 1, '/users'),
(32, 1, '/favicon.ico'),
(33, 1, '/users'),
(34, 1, '/favicon.ico'),
(35, 1, '/users'),
(36, 1, '/favicon.ico'),
(37, 1, '/users'),
(38, 1, '/favicon.ico'),
(39, 1, '/users'),
(40, 1, '/favicon.ico'),
(41, 1, '/users'),
(42, 1, '/favicon.ico'),
(43, 1, '/users'),
(44, 1, '/favicon.ico'),
(45, 1, '/users'),
(46, 1, '/favicon.ico'),
(47, 1, '/users'),
(48, 1, '/favicon.ico'),
(49, 1, '/users'),
(50, 1, '/favicon.ico'),
(51, 1, '/users'),
(52, 1, '/favicon.ico'),
(53, 1, '/users'),
(54, 1, '/favicon.ico'),
(55, 1, '/users'),
(56, 1, '/users'),
(57, 1, '/favicon.ico'),
(58, 1, '/users'),
(59, 1, '/favicon.ico'),
(60, 1, '/users'),
(61, 1, '/favicon.ico'),
(62, 1, '/users'),
(63, 1, '/favicon.ico'),
(64, 1, '/users'),
(65, 1, '/favicon.ico'),
(66, 1, '/users'),
(67, 1, '/favicon.ico'),
(68, 1, '/users'),
(69, 1, '/favicon.ico'),
(70, 1, '/users/logout'),
(71, 1, '/users'),
(72, 1, '/favicon.ico'),
(73, 1, '/catalog'),
(74, 1, '/catalog'),
(75, 1, '/favicon.ico'),
(76, 1, '/users/logout'),
(77, 1, '/users'),
(78, 1, '/favicon.ico'),
(79, 1, '/users'),
(80, 1, '/favicon.ico'),
(81, 1, '/users'),
(82, 1, '/favicon.ico'),
(83, 1, '/users'),
(84, 1, '/favicon.ico'),
(85, 1, '/users'),
(86, 1, '/favicon.ico'),
(87, 1, '/users'),
(88, 1, '/favicon.ico'),
(89, 1, '/users/logout'),
(90, 1, '/users'),
(91, 1, '/favicon.ico'),
(92, 1, '/catalog'),
(93, 1, '/favicon.ico'),
(94, 1, '/users/logout');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
