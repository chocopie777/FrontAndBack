-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2021 г., 14:00
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `asd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `food ration`
--

CREATE TABLE `food ration` (
  `ID User` int(10) UNSIGNED NOT NULL,
  `ID List food` int(10) UNSIGNED NOT NULL,
  `ID Food ration` int(11) NOT NULL,
  `Meal portion` int(11) DEFAULT NULL,
  `Calorie content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `listexercises`
--

CREATE TABLE `listexercises` (
  `id` int(10) UNSIGNED NOT NULL,
  `_name__exercises` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `listexercises`
--

INSERT INTO `listexercises` (`id`, `_name__exercises`) VALUES
(27, 'Бег'),
(28, 'Прыг'),
(34, '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `list food`
--

CREATE TABLE `list food` (
  `ID List Food` int(10) UNSIGNED NOT NULL,
  `Name Food` varchar(40) NOT NULL,
  `Type Food` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `trainexecr`
--

CREATE TABLE `trainexecr` (
  `id` int(10) UNSIGNED NOT NULL,
  `_id__type_training` int(10) UNSIGNED DEFAULT NULL,
  `_id__list_exercises` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trainexecr`
--

INSERT INTO `trainexecr` (`id`, `_id__type_training`, `_id__list_exercises`) VALUES
(40, 41, 27),
(41, 41, 28),
(42, 42, 28),
(43, 43, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `traning`
--

CREATE TABLE `traning` (
  `ID Traning` int(10) UNSIGNED NOT NULL,
  `ID User` int(10) UNSIGNED NOT NULL,
  `ID TrainExecr` int(10) UNSIGNED NOT NULL,
  `Approaches` int(11) NOT NULL,
  `Statys Training` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `typetraining`
--

CREATE TABLE `typetraining` (
  `id` int(10) UNSIGNED NOT NULL,
  `_name__training` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typetraining`
--

INSERT INTO `typetraining` (`id`, `_name__training`) VALUES
(41, 'Легкая'),
(42, 'тяжелая'),
(43, '1234');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `_user_name` varchar(191) DEFAULT NULL,
  `_email` varchar(191) DEFAULT NULL,
  `_password` varchar(191) DEFAULT NULL,
  `_name` varchar(191) DEFAULT NULL,
  `_gender` varchar(191) DEFAULT NULL,
  `_age` varchar(191) DEFAULT NULL,
  `_weight` varchar(191) DEFAULT NULL,
  `_height` varchar(191) DEFAULT NULL,
  `_tren_active` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role`, `_user_name`, `_email`, `_password`, `_name`, `_gender`, `_age`, `_weight`, `_height`, `_tren_active`) VALUES
(18, 1, '555', '5@55', '$2y$10$a8xbujow2bR72Qmavlir8eSdSB87Qo5q2my41NNiq91EE90Wl/RZq', '', '', '', '', '', NULL),
(34, 0, '123', '123@123', '$2y$10$QJ9ifY7Xw1SO.wHzt4.rouZPNaaBdG7ZXjgcC28MDPkQVNy50chLC', '123', '', '', '', '', 41),
(35, 0, '1234', '1234@1234', '$2y$10$Co90mkjoBjeS9zVWET/9Ses2ZuJkuE5lyrh/3gkKz6jxHW9oLPCYW', '1234', '', '', '', '', 41);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `food ration`
--
ALTER TABLE `food ration`
  ADD PRIMARY KEY (`ID Food ration`),
  ADD KEY `ID User` (`ID User`,`ID List food`),
  ADD KEY `ID List food` (`ID List food`);

--
-- Индексы таблицы `listexercises`
--
ALTER TABLE `listexercises`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `list food`
--
ALTER TABLE `list food`
  ADD PRIMARY KEY (`ID List Food`);

--
-- Индексы таблицы `trainexecr`
--
ALTER TABLE `trainexecr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TypeTraining` (`_id__type_training`),
  ADD KEY `ListExercises` (`_id__list_exercises`);

--
-- Индексы таблицы `traning`
--
ALTER TABLE `traning`
  ADD PRIMARY KEY (`ID Traning`),
  ADD KEY `User` (`ID User`),
  ADD KEY `TrainExecr` (`ID TrainExecr`);

--
-- Индексы таблицы `typetraining`
--
ALTER TABLE `typetraining`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `food ration`
--
ALTER TABLE `food ration`
  MODIFY `ID Food ration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `listexercises`
--
ALTER TABLE `listexercises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `list food`
--
ALTER TABLE `list food`
  MODIFY `ID List Food` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `trainexecr`
--
ALTER TABLE `trainexecr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `traning`
--
ALTER TABLE `traning`
  MODIFY `ID Traning` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `typetraining`
--
ALTER TABLE `typetraining`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `food ration`
--
ALTER TABLE `food ration`
  ADD CONSTRAINT `food ration_ibfk_1` FOREIGN KEY (`ID User`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food ration_ibfk_2` FOREIGN KEY (`ID List food`) REFERENCES `list food` (`ID List Food`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trainexecr`
--
ALTER TABLE `trainexecr`
  ADD CONSTRAINT `trainexecr_ibfk_1` FOREIGN KEY (`_id__type_training`) REFERENCES `typetraining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trainexecr_ibfk_2` FOREIGN KEY (`_id__list_exercises`) REFERENCES `listexercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `traning`
--
ALTER TABLE `traning`
  ADD CONSTRAINT `traning_ibfk_1` FOREIGN KEY (`ID User`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traning_ibfk_2` FOREIGN KEY (`ID TrainExecr`) REFERENCES `trainexecr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
