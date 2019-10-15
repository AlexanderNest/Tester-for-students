-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2019 г., 17:16
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `test` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mark` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`login`, `test`, `mark`, `max`) VALUES
('alexander', 'О Саше', 2, 4),
('alexander', 'Пробный тест', 0, 2),
('kek', 'Пробный тест', 0, 2),
('kek', 'О Саше', 0, 4),
('1', 'Пробный тест', 0, 2),
('1', 'О Саше', 2, 4),
('a', 'Пробный тест', 1, 2),
('q', 'Пробный тест', 1, 2),
('w', 'Пробный тест', 2, 2),
('w', 'О Саше', 0, 4),
('saintegg', 'Пробный тест', 2, 2),
('saintegg', 'О Саше', 3, 4),
('l', 'О Саше', 0, 4),
('alexander', 'Математика', 2, 5),
('alexander', 'Математика 2', 4, 5),
('l', 'Математика 2', 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `name` varchar(30) NOT NULL,
  `testnumber` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer0` varchar(30) NOT NULL,
  `answer1` varchar(30) NOT NULL,
  `answer2` varchar(30) NOT NULL,
  `answer3` varchar(30) NOT NULL,
  `rightanswer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`name`, `testnumber`, `question`, `answer0`, `answer1`, `answer2`, `answer3`, `rightanswer`) VALUES
('О Саше', 1, 'Сколько лет Саше', '14', '15', '16', '19', '14'),
('О Саше', 1, '\r\nВ каком городе он живет', 'Москва', 'Ярославль', 'Мурманск', 'Сочи', 'Москва'),
('О Саше', 1, '\r\nСколько сейчас времени', '12:29', '16:49', '21:17', '23:11', '12:29'),
('О Саше', 1, '\r\nКакая скорость света', '100', '1000', '300000', '12334', '100'),
('Пробный тест', 2, 'Какое расстояние от Юпитера до Марса', '343млн.км', '486млн.км', '6км', '1234км', '343млн.км'),
('Пробный тест', 2, ' \r\nКакой государственный язык в Российской Федерации', 'португальский', 'русский', 'японский', 'азербайджанский', 'португальский'),
('Математика 2', 4, '2+2', '12', '4', '17', '8', '4'),
('Математика 2', 4, '\r\n5*5', '26', '26', '25', '1', '25'),
('Математика 2', 4, '\r\n100/100', '11', '1', '4', '3', '1'),
('Математика 2', 4, '\r\n76-16', '60', '1', '2', '3', '60'),
('Математика 2', 4, '\r\n7-7', '1', '2', '3', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `type`) VALUES
('', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
('1', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
('a', '0cc175b9c0f1b6a831c399e269772661', 'user'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('alexander', '444ee27be293b297281908ed3c9b0dbc', 'user'),
('kek', '202cb962ac59075b964b07152d234b70', 'user'),
('l', '2db95e8e1a9267b7a1188556b2013b33', 'user'),
('q', '7694f4a66316e53c8cdd9d9954bd611d', 'user'),
('saintegg', '444ee27be293b297281908ed3c9b0dbc', 'user'),
('w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);
ALTER TABLE `users` ADD FULLTEXT KEY `login` (`login`,`password`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
