-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 31 2018 г., 12:32
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `login`, `passwd`, `Email`) VALUES
(1, 'Egor', '123789q', 'egorr2421@gmail.com'),
(3, 'lol', '123456789', 'lol@mail.ru'),
(4, 'Egorr', '123123123', 'egorr24212@yandex.ru'),
(5, '1231231', '123123', 'egor2421@awd.asd'),
(6, 'egorr2421', '$2y$10$lRnywIdvmd278erkDNr8YOatyIo.5ymjEb8CDBnMDSGI5QVnVnzne', 'egor2421@aw2d.asd'),
(7, '123123', '$2y$10$0Fa6XsiwMZ1Xb8NkVJYVVe1pJFWHRwgCIpqQyBu7OYmNN.L99RPym', '123123123@yandex.ru'),
(8, 'kolua', '$2y$10$DWk5dx5/GS5dCML1pNU8UeTuvR/2K0SRzYB7Jb6K0tDh4FaQurEra', 'kolua@mail.com'),
(9, 'egortest', '$2y$10$YS4P/BklQUilmQHkXH7iIOv03O07Z.lcvihhmICo.0yO1osTyQyHq', 'erwer@awa.ru'),
(10, 'egorr24212', '$2y$10$HEDlb0MwpZaTSR0cx8aVNuN4YP32IGy4dljkJfKbM4jYWHEcRV7xi', 'egorr24212@asda.ru'),
(11, 'egortestac', '$2y$10$DbRJLWM9tICqJPelZiv8.OI6AWX2H1ULkibBLKlxdjA132ycvUrCO', 'egortestac@awdadw.ru'),
(12, '321321', '$2y$10$j/5QO2IFb7hYgsCoKblXC.BAwGuo9OIrSlUDCUQQp17GVD4nTAQqW', 'sdas@wda.ru'),
(13, '123321', '$2y$10$t7v3Vi6aSVeFJnx856ee1OYhsZmN8nyhye1uT3yztpIMBYCIolqya', '21312@adw.ru'),
(14, '3213211', '$2y$10$1vz7S504J0qHMViEPyfWP.79aaHxO5ZxrQXAFrE4srGQExI6pxaby', '321321@yandex.cim');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `amount`) VALUES
(1, 'Спорт', 0),
(2, 'Искуство', 0),
(5, 'Политика', 0),
(6, 'Развличение', 0),
(9, 'Технологии', 1),
(10, 'IT', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `avatar` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Date_cr` date NOT NULL,
  `veiw` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `Title`, `description`, `autor`, `id_cat`, `avatar`, `Date_cr`, `veiw`) VALUES
(4, 'Виртуальная реальность', 'Виртуальная реальность (ВР, англ. virtual reality, VR, искусственная реальность) — созданный техническими средствами мир, передаваемый человеку через его ощущения: зрение, слух, обоняние, осязание и другие. Виртуальная реальность имитирует как воздействие, так и реакции на воздействие. Для создания убедительного комплекса ощущений реальности компьютерный синтез свойств и реакций виртуальной реальности производится в реальном времени.\r\n\r\nОбъекты виртуальной реальности обычно ведут себя близко к поведению аналогичных объектов материальной реальности. Пользователь может воздействовать на эти объекты в согласии с реальными законами физики (гравитация, свойства воды, столкновение с предметами, отражение и т. п.).', 1, 9, '', '2018-06-21', 231),
(6, 'PHP', 'PHP (/pi:.eɪtʃ.pi:/ англ. PHP: Hypertext Preprocessor — «PHP: препроцессор гипертекста»; первоначально Personal Home Page Tools[6] — «Инструменты для создания персональных веб-страниц») — скриптовый язык[7] общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов[8].\nЯзык и его интерпретатор (Zend Engine) разрабатываются группой энтузиастов в рамках проекта с открытым кодом[9]. Проект распространяется под собственной лицензией, несовместимой с GNU GPL.', 7, 10, '', '2018-06-30', 1383);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
