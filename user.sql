-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2013 г., 20:03
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
