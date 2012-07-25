-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 17 Juillet 2012 à 14:43
-- Version du serveur: 5.5.24
-- Version de PHP: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `peintrephilippeleroux`
--

-- --------------------------------------------------------

--
-- Structure de la table `Carousel`
--

CREATE TABLE IF NOT EXISTS `Carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `legende` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Image`
--

CREATE TABLE IF NOT EXISTS `Image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `legende` longtext,
  `creat` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Image`
--

INSERT INTO `Image` (`id`, `nom`, `legende`, `creat`, `titre`, `active`, `ordre`) VALUES
(1, '4fb127f888766-balade-au-crepuscule.jpg', NULL, '2012-05-14 17:42:48', 'Balade au crépuscule', 0, 0),
(2, '4fc0d125531e3-arreter-le-temps.jpg', NULL, '2012-05-26 14:48:36', 'Arreter le temps', 0, 0),
(3, '4fc0d165d6528-balade-d''automne.jpg', '', '2012-05-26 14:49:41', 'Balade d''automne', 0, 0),
(4, '4fc0d48e37a89-Daniel-en-manoeuvre.jpg', '', '2012-05-26 15:03:10', 'Daniel en manoeuvre', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `username_canonical` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_canonical` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'Titome', 'titome', 'girard.timothee@gmail.com', 'girard.timothee@gmail.com', 1, 'qxo2wgdapjkcw80sk8k8oo4so88skc4', 'bxOCTKXNkmvzLZ045eaWresMw0gqGPshApRV2acxUGHGy+vVr+63nu6Gqt6/0prcbqY3BhXAeGfsAGBFtP0MUQ==', '2012-07-17 00:43:59', 0, 0, NULL, 'rclc44c5uxwwcs4ko0o0c0swckgksk88ssco8s4w84gk0ogco', NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
