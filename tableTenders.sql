-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2017 г., 10:44
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tableTenders`
--

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `dateMain` timestamp NULL DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `desc` text,
  `deadline` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `meneger_id` int(11) DEFAULT NULL,
  `number_kp` varchar(10) DEFAULT NULL,
  `sum` int(11) NOT NULL DEFAULT '0',
  `desc_kp` varchar(250) DEFAULT NULL,
  `date_kp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`id`, `dateMain`, `name`, `desc`, `deadline`, `meneger_id`, `number_kp`, `sum`, `desc_kp`, `date_kp`) VALUES
(137, '2017-05-29 10:52:59', 'Полюс-строй', 'геомембрана, геотекстиль', '2017-06-01 20:00:00', 68, '', 0, '  Не подаем. Это геомембрана с двух сторон дублированная геотекстилем.', '2017-06-21 06:24:25'),
(138, '2017-05-29 12:06:27', 'соровскнефть', 'геосетка, геотекстиль,георешетка', '2017-06-12 20:00:00', 66, '3347', 149509181, 'Конкурс отправлен\n', '2017-06-15 05:29:46'),
(139, '2017-05-31 04:12:32', 'Автодор', 'геотекстиль', '2017-06-06 20:00:00', 72, NULL, 0, 'Не подаем, не проходим по цене', '2017-05-30 20:00:00'),
(140, '2017-06-01 05:12:00', 'рн снабжение', 'геотекстиль, геосетка, георешетка', '2017-06-13 20:00:00', 73, NULL, 0, 'отменен', '2017-05-31 20:00:00'),
(141, '2017-06-01 05:14:28', 'транснефть-сибирь', 'геотекстиль', '2017-06-01 05:14:19', 71, '3133', 0, NULL, '2017-06-05 12:44:57'),
(142, '2017-06-01 05:35:02', 'тамбовстрой', 'геотекстиль, геомембрана', '2017-06-01 20:00:00', 74, '3077', 43966800, '', '2017-06-01 05:58:03'),
(143, '2017-06-01 09:38:08', 'рн снабжение', 'геосетка, геомембрана', '2017-06-01 09:37:58', 70, NULL, 0, 'конкурс отменен\n', '2017-05-31 20:00:00'),
(144, '2017-06-05 09:53:27', 'рн снабжение', 'геомембрана, геотекстиль', '2017-06-13 20:00:00', 67, '', 0, 'конкурс отменен', '2017-06-15 05:56:08'),
(145, '2017-06-05 09:54:02', 'ЭСР', 'габион', '2017-06-05 09:53:55', 68, '3179', 0, NULL, '2017-06-05 13:03:06'),
(146, '2017-06-08 04:22:55', 'дорстройсервис', 'геотекстиль', '2017-06-13 20:00:00', 66, '3429', 2341649, 'конкурс подали\n', '2017-06-15 06:19:37'),
(147, '2017-06-08 04:38:03', 'ярославские энергосистемы', 'мг', '2017-06-01 20:00:00', 72, NULL, 0, 'не подаемся, нужны не манжеты для перехода, а заглушки на трубу с теплоизоляцией', '2017-06-07 20:00:00'),
(148, '2017-06-09 06:19:54', 'славнефть', 'габион (считал КП 2585)', '2017-06-18 20:00:00', 67, '3650', 9678890, 'Отложен на 3 дня, выходят уточнения', '2017-06-29 05:22:34'),
(149, '2017-06-13 05:15:50', 'рн снабжение', 'геотекстиль, георешетка', '2017-06-22 20:00:00', 73, '3596', 4333853, NULL, '2017-06-21 10:48:04'),
(150, '2017-06-14 12:16:58', 'рн-ванкор', 'геотекстиль, ОНК', '2017-06-26 20:00:00', 71, '3503', 24913298, NULL, '2017-06-21 14:38:41'),
(151, '2017-06-14 12:17:20', 'русвьтпетро', 'геомембрана', '2017-06-27 20:00:00', 74, '3669', 47063418, NULL, '2017-06-26 10:19:28'),
(152, '2017-06-19 07:35:58', 'таргин бурение', 'буровые', '2017-06-26 20:00:00', 70, '3750', 5041111, NULL, '2017-06-28 04:30:12'),
(153, '2017-06-19 07:37:28', 'татнефть', 'геомембрана', '2017-06-26 20:00:00', 66, '3545', 3054761, 'подана', '2017-06-26 06:29:43'),
(154, '2017-06-19 07:38:20', 'агрокомплекс', 'геомембрана, геотекстиль', '2017-06-20 20:00:00', 67, '3548', 12244080, 'Компания называется Киево-Жураки', '2017-06-28 07:14:55'),
(155, '2017-06-21 09:17:08', 'рн-снабжение', 'кт', '2017-07-03 20:00:00', 68, '3914', 0, '10158225,24 сумма', '2017-07-05 04:26:35'),
(156, '2017-06-21 09:17:33', 'газпромнефть-снабжение', 'буровые', '2017-06-21 09:17:24', 72, '3651', 61311, '57329,75', '2017-06-28 12:14:02'),
(157, '2017-06-26 04:31:52', 'транснефть балтика', 'геомодуль', '2017-07-16 20:00:00', 73, '3968', 962623, NULL, '2017-07-12 08:24:56'),
(158, '2017-06-26 05:01:13', 'башкиравтодор', 'геосетка', '2017-06-29 20:00:00', 71, '3833', 3584362, NULL, '2017-07-03 05:31:27'),
(159, '2017-06-26 05:01:39', 'якутуголь', 'габион', '2017-06-29 20:00:00', 74, '3681', 871183, NULL, '2017-06-26 09:27:29'),
(160, '2017-06-27 04:44:07', 'транснефть-сибирь', 'георешетка', '2017-06-29 20:00:00', 70, '3792', 321008, NULL, '2017-06-28 12:44:19'),
(161, '2017-06-30 12:04:56', 'рн снабжение нефтеюганск', 'пленка', '2017-07-06 20:00:00', 68, '3981', 966507, 'сумма 96650727,99', '2017-07-06 09:00:25'),
(162, '2017-07-03 06:22:19', 'русвьтпетро', 'геомембрана, геотекстиль', '2017-07-13 20:00:00', 66, '4171', 19766244, 'геотекстильные материалы\n', '2017-07-14 07:28:32'),
(163, '2017-07-03 06:22:59', 'транснефть-восток', 'скальный, георешетка, геомембрана', '2017-07-20 20:00:00', 67, NULL, 0, NULL, NULL),
(164, '2017-07-03 11:33:12', 'спецтехавто', 'геомембрана', '2017-07-03 20:00:00', 72, '3908', 1921925, NULL, '2017-07-04 05:59:18'),
(165, '2017-07-05 03:49:35', 'васильевский рудник', 'геомембрана', '2017-07-09 20:00:00', 73, '4025', 1448228, NULL, '2017-07-12 08:23:26'),
(166, '2017-07-07 05:47:11', 'Техникс', 'геотекстиль', '2017-07-11 20:00:00', 71, '4039', 546800, NULL, '2017-07-10 12:33:43'),
(167, '2017-07-10 06:01:53', 'агрокомплекс', 'геомембрана, геотекстиль', '2017-07-10 20:00:00', 74, '4048', 48840112, NULL, '2017-07-13 10:14:41'),
(168, '2017-07-10 06:02:28', 'рн-снабжение', 'буровые', '2017-07-19 20:00:00', 70, NULL, 0, NULL, NULL),
(169, '2017-07-12 03:49:20', 'южное дсу', 'геотекстиль', '2017-07-16 20:00:00', 67, NULL, 0, NULL, NULL),
(170, '2017-07-13 06:03:33', 'русвьтпетро', 'геосетка, георешетка, геомембрана, геотекстиль', '2017-07-25 20:00:00', 66, '', 0, '\n', '2017-07-14 07:28:15'),
(171, '2017-07-13 12:17:56', 'Тамбовстрой', 'геотекстиль', '2017-07-13 20:00:00', 68, NULL, 0, 'контрагент Петренкова Андрея. Запрос отправлен ответственному менеджеру.\n', '2017-07-14 08:49:46'),
(172, '2017-07-14 04:35:50', 'ЛГСС', 'геотекстиль', '2017-07-16 20:00:00', 72, '4193', 11665387, NULL, '2017-07-14 13:49:02');

-- --------------------------------------------------------

--
-- Структура таблицы `menegers`
--

CREATE TABLE `menegers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menegers`
--

INSERT INTO `menegers` (`id`, `name`) VALUES
(1, 'Волошин'),
(2, 'Елисеева'),
(3, 'Константинов'),
(4, 'Крепостнов'),
(5, 'Петренков'),
(6, 'Князев'),
(7, 'Булыгин'),
(8, 'Попадько');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menegers`
--
ALTER TABLE `menegers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT для таблицы `menegers`
--
ALTER TABLE `menegers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
