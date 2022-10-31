-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 28 2022 г., 04:27
-- Версия сервера: 10.3.34-MariaDB-log-cll-lve
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `painhnhb_painkilles_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Img_Path` varchar(120) NOT NULL,
  `category` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `Title`, `Content`, `Img_Path`, `category`) VALUES
(2, 'We&#039;ve opened up', 'Hello, we have opened our website. Tournaments with large prize funds will be held on this site. You can follow the announcements of our tournaments on our social networks: https://twitter.com/esport_pain - our twitter, https://vk.com/pa1nkillers - VKontakte group. \r\nWe look forward to new users!', 'grandopening2.png', 'Arcticle');

-- --------------------------------------------------------

--
-- Структура таблицы `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `link` mediumtext DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `prize` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tournament`
--

INSERT INTO `tournament` (`id`, `Title`, `link`, `img`, `date`, `prize`) VALUES
(3, 'PAINKILLERS CUP SEASON 3', 'https://liquipedia.net/counterstrike/Painkillers_Cup/Season_3', '1-222.png', '2022-03-14', 10000),
(1, 'PAINKILLERS CUP SEASON 1', NULL, 'painkillers_text.png', '2022-01-11', 10000),
(2, 'PAINKILLERS CUP SEASON 2', 'https://liquipedia.net/counterstrike/Painkillers_Cup/Season_2', 'painkillers_text.png', '2022-02-11', 10000),
(4, 'SDTV SPRING CUP 2022', NULL, 'CUP_SEASON4_VK2.png', '2022-04-14', 10000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
