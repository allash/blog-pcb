-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2013 г., 12:17
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `article`, `date`, `author`) VALUES
(3, 'Как устроены переменные в PHP tutorial', 'Вроде простой вопрос, даже не понятно что на него ответить, правда?\nМы все знаем как создать переменную, как получить значение переменной, как взять ссылку на переменную в конце концов.\nНо как они работают изнутри?\nЧто происходит в интерпретаторе, когда вы изменяете значение переменной? Или когда удаляете ее?\nКак реализованы типы переменных?\n\nВ этой статье я постараюсь раскрыть именно эти темы.\n\nAbstract\n\nПеременные в PHP выражены в виде неких контейнеров, которые хранят в себе тип переменной, значение, кол-во ссылающихся переменных на этот контейнер, и флаг — является ли эта переменная ссылочной.', '2000-12-31 22:00:00', 'Гена'),
(4, 'dasd', 'asdasd', '0000-00-00 00:00:00', 'asd'),
(5, 'dasd', 'asdasdasd', '0000-00-00 00:00:00', 'dzirt.do.uweeeerdenn@gmail.com'),
(6, 'asdasd', 'asdasdasdasd', '2012-12-20 09:47:28', 'dzirt.do.uweeeerdenn@gmail.com'),
(7, 'asd', 'asd', '2012-12-22 20:45:35', 'dzirt.do.urdsenn@gmail.com'),
(8, 'cvb', 'cvb', '2013-01-02 14:30:42', 'dzirt.do.urdsenn@gmail.com'),
(9, 'asd', '987987879', '2013-01-09 12:41:15', 'admin@admin.ua'),
(10, 'sdasdasdasdasd', 'asdasdasdasdasdasdasdasdasd', '2013-01-09 19:58:38', 'admin@admin.ua'),
(11, 'asd', 'asd', '2013-01-09 20:07:20', 'admin@admin1.ua'),
(12, 'dasd', '122', '2013-01-09 20:41:29', 'dzirt.do.urdenn@gmail.coms'),
(13, 'asd', 'ertetetertertert', '2013-01-10 07:10:41', 'dzirt.do.urdenn@gmail.coms'),
(14, 'dasd', 'fghfgh', '2013-01-11 14:20:21', 'Eamail@va.ru'),
(15, 'sdasdasdasdasd', 'sdfsdfsdf', '2013-01-11 15:44:49', 'admin@admin1.uaasd'),
(16, 'ny', 'article', '2013-01-13 09:29:42', 'admin@admin1.uaasd');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `pk_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `dtime_registration` int(10) unsigned NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_user`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`pk_user`, `role`, `dtime_registration`, `login`, `password`, `email`) VALUES
(24, '', 1357735165, 'admin11111', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@admin.ua'),
(27, 'admin', 101, 'Adert', '93279e3308bdbbeed946fc965017f67a', 'eamail@va.ru'),
(28, 'admin', 1357916439, 'asdss', 'a8f5f167f44f4964e6c998dee827110c', 'admin@admin1.uaasd'),
(29, '1', 1358070018, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@adm.ua');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
