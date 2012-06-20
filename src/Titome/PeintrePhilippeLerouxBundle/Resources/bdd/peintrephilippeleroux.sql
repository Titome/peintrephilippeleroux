-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 18 Juin 2012 à 21:50
-- Version du serveur: 5.5.24
-- Version de PHP: 5.3.10-1ubuntu3.1

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Image`
--

INSERT INTO `Image` (`id`, `nom`, `legende`, `creat`, `titre`, `active`, `ordre`) VALUES
(1, '4fb127f888766-balade-au-crepuscule.jpg', 'Balade au crépuscule', '2012-05-14 17:42:48', '', 0, 0),
(2, '4fc0d125531e3-arreter-le-temps.jpg', 'Arreter le temps', '2012-05-26 14:48:36', '', 0, 0),
(3, '4fc0d165d6528-balade-d''automne.jpg', 'Balade d''automne', '2012-05-26 14:49:41', '', 0, 0),
(4, '4fc0d48e37a89-Daniel-en-manoeuvre.jpg', 'Daniel en manoeuvre', '2012-05-26 15:03:10', '', 0, 0),
(5, '4fc0d4b21c833-Fin-de-journee-a-l''estacade.jpg', 'Fin de journée à l''escatade', '2012-05-26 15:03:46', '', 0, 0),
(6, '4fdf41b7bbdc4-douce-soiree-2.jpg', NULL, '2012-06-18 16:56:55', 'Douce soirée 2', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
