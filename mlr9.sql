-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 fév. 2018 à 22:34
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mlr9`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE IF NOT EXISTS `appartient` (
  `ID_UTILISATEUR` int(2) NOT NULL,
  `ID_GROUPE` int(2) NOT NULL,
  `RANG` int(2) DEFAULT NULL,
  `ID_INSTRUMENT` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_UTILISATEUR`,`ID_GROUPE`),
  KEY `I_FK_APPARTIENT_UTILISATEUR` (`ID_UTILISATEUR`),
  KEY `I_FK_APPARTIENT_GROUPE` (`ID_GROUPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Rang';

--
-- Déchargement des données de la table `appartient`
--

INSERT INTO `appartient` (`ID_UTILISATEUR`, `ID_GROUPE`, `RANG`, `ID_INSTRUMENT`) VALUES
(1, 1, 1, 1),
(2, 1, 0, 8),
(2, 2, 1, 9),
(3, 2, 0, 0),
(4, 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `ID_ARTISTE` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_ARTISTE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_ARTISTE`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`ID_ARTISTE`, `NOM_ARTISTE`) VALUES
(1, 'Leonard Cohen'),
(2, 'John Lennon'),
(3, 'Wilhelm Richard Wagner'),
(4, 'Debussy'),
(5, 'Auteur inconnu');

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

DROP TABLE IF EXISTS `ecrit`;
CREATE TABLE IF NOT EXISTS `ecrit` (
  `ID_OEUVRE` int(2) NOT NULL,
  `ID_ARTISTE` int(2) NOT NULL,
  PRIMARY KEY (`ID_OEUVRE`,`ID_ARTISTE`),
  KEY `I_FK_ECRIT_OEUVRE` (`ID_OEUVRE`),
  KEY `I_FK_ECRIT_ARTISTE` (`ID_ARTISTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrit`
--

INSERT INTO `ecrit` (`ID_OEUVRE`, `ID_ARTISTE`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 5),
(7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_EVENEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` text NOT NULL,
  `ID_GROUPE` int(11) NOT NULL,
  `date_evenement` date NOT NULL,
  PRIMARY KEY (`ID_EVENEMENT`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`ID_EVENEMENT`, `libellé`, `ID_GROUPE`, `date_evenement`) VALUES
(1, 'Concert au Zénith de Caen', 1, '2018-02-22'),
(2, 'Répétition générale', 1, '2018-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `ID_genre` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_genre`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_genre`, `libellé`) VALUES
(1, 'Rock'),
(2, 'Classique'),
(3, 'Metal'),
(4, 'Baroque'),
(5, 'Rap'),
(6, 'Hip-Hop'),
(7, 'Pop');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `ID_GROUPE` int(2) NOT NULL,
  `NOM_GROUPE` varchar(255) NOT NULL,
  `STATUT_GROUPE` int(2) DEFAULT NULL,
  `mot_de_passe` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID_GROUPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`ID_GROUPE`, `NOM_GROUPE`, `STATUT_GROUPE`, `mot_de_passe`) VALUES
(0, 'Inventaire', 0, NULL),
(1, 'Orchestre de Partélios', 0, ''),
(2, 'Orchestre de l\'IUT', 1, 'iut');

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `ID_instrument` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_instrument`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`ID_instrument`, `libellé`) VALUES
(1, 'Piano'),
(2, 'Trompette'),
(3, 'Saxophone'),
(4, 'Guitare'),
(5, 'Basse'),
(6, 'Clarinette'),
(7, 'Violon'),
(8, 'Tuba'),
(9, 'Cor'),
(10, 'Percussions'),
(11, 'Chant');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `ID_OEUVRE` int(2) NOT NULL,
  `ISBN` char(255) DEFAULT NULL,
  `TYPE` int(2) DEFAULT NULL,
  `TOME` int(11) NOT NULL,
  PRIMARY KEY (`ID_OEUVRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `ID_OEUVRE` int(2) NOT NULL,
  `ALBUM` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_OEUVRE`),
  KEY `ID_OEUVRE` (`ID_OEUVRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

DROP TABLE IF EXISTS `oeuvre`;
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `ID_OEUVRE` int(2) NOT NULL AUTO_INCREMENT,
  `NOM` char(255) NOT NULL,
  `DATESORTIE` date DEFAULT NULL,
  `ID_genre` int(11) DEFAULT NULL,
  `EDITEUR` char(255) DEFAULT NULL,
  `URL` varchar(64) NOT NULL,
  `ID_INSTRUMENT` int(11) NOT NULL,
  PRIMARY KEY (`ID_OEUVRE`),
  KEY `fk_client_numero` (`ID_genre`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`ID_OEUVRE`, `NOM`, `DATESORTIE`, `ID_genre`, `EDITEUR`, `URL`, `ID_INSTRUMENT`) VALUES
(1, 'Hallelujah', '1970-01-01', 1, '', 'Leonard-Cohen-Hallelujah.pdf', 0),
(2, 'Imagine', '1980-08-07', 1, '', 'imagine.pdf', 0),
(3, 'La chevauchée des Walkyries', '1970-01-01', 2, '', 'la-chevauchee-des-walkyries.pdf', 0),
(4, 'Clair de lune', '1970-01-01', 2, '', 'debussyclairdelune.pdf', 0),
(5, 'Oeuvre de test', '1970-01-01', 3, '', '2017-1-sujet.pdf', 0),
(6, 'azefazefa', '1970-01-01', 2, '', '2017-1-sujet.pdf', 0),
(7, 'oeuvre trompette', '1970-01-01', 3, '', '2017-1-sujet.pdf', 2),
(8, 'Oeuvre de test', '1970-01-01', 2, '', '2017-1-sujet.pdf', 6);

-- --------------------------------------------------------

--
-- Structure de la table `partition_tablature`
--

DROP TABLE IF EXISTS `partition_tablature`;
CREATE TABLE IF NOT EXISTS `partition_tablature` (
  `ID_OEUVRE` int(2) NOT NULL,
  `INSTRUMENT` char(255) DEFAULT NULL,
  `DIFFICULTÉ` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_OEUVRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID_UTILISATEUR` int(2) NOT NULL,
  `ID_GROUPE` int(2) NOT NULL,
  `ID_OEUVRE` int(2) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`,`ID_GROUPE`,`ID_OEUVRE`),
  KEY `I_FK_POST_UTILISATEUR` (`ID_UTILISATEUR`),
  KEY `I_FK_POST_GROUPE` (`ID_GROUPE`),
  KEY `I_FK_POST_OEUVRE` (`ID_OEUVRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_UTILISATEUR`, `ID_GROUPE`, `ID_OEUVRE`) VALUES
(1, 0, 1),
(1, 0, 4),
(1, 0, 5),
(1, 0, 6),
(1, 0, 7),
(1, 1, 1),
(1, 1, 4),
(1, 1, 5),
(2, 0, 1),
(2, 2, 2),
(3, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(5) NOT NULL AUTO_INCREMENT,
  `NOM_UTILISATEUR` varchar(255) NOT NULL,
  `PRENOM_UTILISATEUR` varchar(255) NOT NULL,
  `RANG_UTILISATEUR` int(2) NOT NULL DEFAULT '0',
  `MOTDEPASSE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DATE_INSCRIPTION` date NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`,`RANG_UTILISATEUR`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `RANG_UTILISATEUR`, `MOTDEPASSE`, `EMAIL`, `DATE_INSCRIPTION`) VALUES
(1, 'Lebrun', 'Antoine', 1, '12345', 'antoinelmh@hotmail.fr', '2018-01-15'),
(2, 'Villeneuve', 'Maxime', 1, '12345', 'maxime@hotmail.fr', '2018-01-15'),
(3, 'Gouet', 'Maxime', 1, '12345', 'maxime@gmail.com', '2018-01-15'),
(4, 'Levavasseur', 'Théo', 1, '12345', 'theo@gmail.com', '2018-01-15'),
(5, 'admin', 'admin', 2, 'admin', 'admin@admin.fr', '2018-01-15'),
(6, 'Bizot', 'Pierre-Alexis', 0, '12345', 'PA@hotmail.fr', '2018-01-15'),
(7, 'Aznavour', 'Charles', 0, '12345', 'charles@gmail.com', '2018-01-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
