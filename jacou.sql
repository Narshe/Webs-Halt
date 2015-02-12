-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 12 Février 2015 à 13:03
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jacou`
--
CREATE DATABASE IF NOT EXISTS `jacou` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jacou`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `position` smallint(6) NOT NULL DEFAULT '0',
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `position`, `active`) VALUES
(1, 'Accueil', 2, 1),
(2, 'Economie', 4, 0),
(3, 'Politique', 2, 0),
(4, 'Salle de concert', 1, 1),
(6, 'tds', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `online` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `name`, `slug`, `content`, `type`, `online`, `created`, `updated`) VALUES
(2, 1, 'Un article', 'un-article', '<p>Un article</p>\r\n', 0, 1, '2015-02-10 14:28:36', '2015-02-10 15:40:06'),
(3, 1, 'Un autre article', 'un-autre-article', '<p><a href="/Mairie%20Jacou/img/uploads/2015/02/emailing_comptalia_original.png" title="emailing_comptalia_original.png"><img class="alignright" height="121" src="/Mairie%20Jacou/img/uploads/2015/02/emailing_comptalia_original.png" width="124" /></a></p>\r\n\r\n<p>Economie</p>\r\n', 0, 1, '2015-02-10 14:41:12', '2015-02-10 15:40:00');

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `online` tinyint(4) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `online`, `position`) VALUES
(2, 1, 'Un test de sous-catégorie', 1, 0),
(3, 6, 'Une autre sous catégorie', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(5, 'UnTest', 'db203f0f8b9c5e5878b01a658bb89ae185dcbbd1', 'admin', '2015-02-03 14:01:04', '2015-02-03 14:01:04'),
(6, 'Tomy', '33edc48d5f4b986510734de2844404f759dd6ff3', 'admin', '2015-02-09 16:10:31', '2015-02-09 16:10:31'),
(7, 'Laura', '33edc48d5f4b986510734de2844404f759dd6ff3', 'admin', '2015-02-10 12:56:15', '2015-02-10 12:56:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
