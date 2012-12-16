-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 16 2012 г., 16:10
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `article`, `date`, `author`) VALUES
(1, 'Новая статья', 'ПРосто тест', '2010-10-10', 'Borya'),
(2, 'ещё одна статья', 'Ещё одна мега статья', '0000-00-00', 'Ашот'),
(3, 'Как устроены переменные в PHP tutorial', 'Вроде простой вопрос, даже не понятно что на него ответить, правда?\r\nМы все знаем как создать переменную, как получить значение переменной, как взять ссылку на переменную в конце концов.\r\nНо как они работают изнутри?\r\nЧто происходит в интерпретаторе, когда вы изменяете значение переменной? Или когда удаляете ее?\r\nКак реализованы типы переменных?\r\n\r\nВ этой статье я постараюсь раскрыть именно эти темы.\r\n\r\nAbstract\r\n\r\nПеременные в PHP выражены в виде неких контейнеров, которые хранят в себе тип переменной, значение, кол-во ссылающихся переменных на этот контейнер, и флаг — является ли эта переменная ссылочной.', '2001-01-01', 'Гена');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `pk_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dtime_registration` int(10) unsigned NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_user`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`pk_user`, `dtime_registration`, `login`, `password`, `email`) VALUES
(13, 1355420861, 'ararata', '25f9e794323b453885f5181f1b624d0b', 'ararata@mail.ru'),
(14, 1355422798, 'barbaris', '25f9e794323b453885f5181f1b624d0b', 'barbaris@mail.ru'),
(15, 1355593124, 'qwertyu', '25f9e794323b453885f5181f1b624d0b', 'qwerty@mail.ru'),
(16, 1355593453, 'qwerty', '25f9e794323b453885f5181f1b624d0b', 'qwertyr@mail.ru'),
(17, 1355593514, 'qwertyuu', '25f9e794323b453885f5181f1b624d0b', 'qwertyruu@mail.ru'),
(18, 1355593574, 'qwertyuud', '25f9e794323b453885f5181f1b624d0b', 'qwertyruud@mail.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
