-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Feb 2015 um 05:38
-- Server Version: 5.5.41-0ubuntu0.14.04.1
-- PHP-Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `snima`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authkeys`
--

CREATE TABLE IF NOT EXISTS `authkeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authkey` varchar(64) NOT NULL,
  `isUsed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `icon` varchar(32) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `snippet` int(5) NOT NULL,
  `user` int(5) NOT NULL,
  `text` text NOT NULL,
  `composeDate` int(10) NOT NULL,
  `readDate` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(64) DEFAULT NULL,
  `synccode` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `syncstart` int(11) NOT NULL,
  `syncend` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `langs`
--

CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `category` int(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `icon` varchar(32) NOT NULL DEFAULT 'default.png',
  `acefile` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `from` int(5) NOT NULL,
  `to` int(5) NOT NULL,
  `message` text NOT NULL,
  `senddate` int(10) NOT NULL,
  `readdate` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `loginDate` varchar(32) NOT NULL,
  `token` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=215 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `snippets`
--

CREATE TABLE IF NOT EXISTS `snippets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(5) NOT NULL,
  `language` varchar(16) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `tags` text,
  `content` text NOT NULL,
  `composed` int(10) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `sitename` varchar(64) NOT NULL DEFAULT 'SniMa',
  `installdate` int(10) NOT NULL,
  `template` varchar(64) NOT NULL DEFAULT 'default',
  `allowRegistration` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sitename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(32) NOT NULL DEFAULT 'no@mail.tld',
  `avatar` varchar(32) NOT NULL DEFAULT 'default.png',
  `lang` varchar(4) NOT NULL DEFAULT 'de',
  `title` varchar(32) DEFAULT NULL,
  `regDate` int(10) NOT NULL DEFAULT '1420070400',
  `lastLogin` int(10) NOT NULL DEFAULT '1420070400',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
