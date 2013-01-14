-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2013 г., 20:14
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `article`, `date`, `author`) VALUES
(1, 'Новая статья', 'ПРосто тест', '2010-10-09 21:00:00', 'Borya'),
(2, 'ещё одна статья', 'Ещё одна мега статья', '0000-00-00 00:00:00', 'Ашот'),
(3, 'Как устроены переменные в PHP tutorial', 'Вроде простой вопрос, даже не понятно что на него ответить, правда?\r\nМы все знаем как создать переменную, как получить значение переменной, как взять ссылку на переменную в конце концов.\r\nНо как они работают изнутри?\r\nЧто происходит в интерпретаторе, когда вы изменяете значение переменной? Или когда удаляете ее?\r\nКак реализованы типы переменных?\r\n\r\nВ этой статье я постараюсь раскрыть именно эти темы.\r\n\r\nAbstract\r\n\r\nПеременные в PHP выражены в виде неких контейнеров, которые хранят в себе тип переменной, значение, кол-во ссылающихся переменных на этот контейнер, и флаг — является ли эта переменная ссылочной.', '2000-12-31 22:00:00', 'Гена'),
(4, 'dasd', 'asdasd', '0000-00-00 00:00:00', 'asd'),
(5, 'dasd', 'asdasdasd', '0000-00-00 00:00:00', 'dzirt.do.uweeeerdenn@gmail.com'),
(6, 'asdasd', 'asdasdasdasd', '2012-12-20 09:47:28', 'dzirt.do.uweeeerdenn@gmail.com'),
(7, 'adad', 'adadrrr', '2012-12-22 21:03:11', 'ararata@mail.ru'),
(9, 'Новая статья просто', 'Простая статья', '2012-12-29 18:12:03', 'ararata@mail.ru'),
(10, 'Это очень новая статья', 'Исходников нет. А если у кого и есть - вряд ли поделится. В любом случае полезней писать самому.\r\nА идеи - составить ТЗ, нарисовать дизайн, продумать структуру проекта и реализовать все это, разбивая глобальную задачу на более мелкие.Исходников нет. А если у кого и есть - вряд ли поделится. В любом случае полезней писать самому.\r\nА идеи - составить ТЗ, нарисовать дизайн, продумать структуру проекта и реализовать все это, разбивая глобальную задачу на более мелкие.', '2012-12-29 21:07:27', 'allashp@mail.com'),
(11, 'Новая статья 88', 'Сегодня мы будем заниматься постпроцессингом изображения в DirectX.\r\n\r\nКак известно, в темноте зрение человека обеспечивается клетками-палочками сетчатки, высокая световая чувствительность которых достигается за счет потери цветочувствительности и остроты зрения (хотя палочек в сетчатке и больше, они распределены по гораздо большей площади, так что суммарное «разрешение» выходит меньше).\r\n\r\nВсе эти эффекты можно наблюдать самому, оторвавшись от компьютера и выйдя ночью на улицу.', '2013-01-13 06:44:24', 'ararata@mail.ru'),
(12, 'best', 'best page', '2013-01-14 08:08:23', 'avatar@test.com');

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
  `activation` varchar(255) DEFAULT NULL,
  `activation_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`pk_user`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`pk_user`, `role`, `dtime_registration`, `login`, `password`, `email`, `activation`, `activation_status`) VALUES
(24, '', 1357735165, 'admin11111', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@admin.ua', NULL, NULL),
(27, 'admin', 101, 'Adert', '93279e3308bdbbeed946fc965017f67a', 'eamail@va.ru', NULL, NULL),
(28, 'admin', 1357916439, 'asdss', 'a8f5f167f44f4964e6c998dee827110c', 'admin@admin1.uaasd', NULL, NULL),
(29, '1', 1358070018, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@adm.ua', NULL, NULL),
(30, 'admin', 1357735165, 'rambo', '25f9e794323b453885f5181f1b624d0b', 'rambo@example.com', NULL, NULL),
(31, '', 1358150874, 'avatar', '25f9e794323b453885f5181f1b624d0b', 'avatar@test.com', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
