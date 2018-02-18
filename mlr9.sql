-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 18 fév. 2018 à 15:27
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
(1, 1, 1, 4),
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
  `libelle` text NOT NULL,
  `ID_GROUPE` int(11) NOT NULL,
  `date_evenement` date NOT NULL,
  PRIMARY KEY (`ID_EVENEMENT`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`ID_EVENEMENT`, `libelle`, `ID_GROUPE`, `date_evenement`) VALUES
(5, 'Concert au Zénith de Caen', 1, '2018-02-21'),
(6, 'Concert passé', 1, '2018-02-01'),
(7, 'issou', 10, '1999-03-24'),
(8, 'Evenementdepartélios', 1, '1970-01-01'),
(9, 'goifhfazeoi', 1, '1970-01-01'),
(19, 'issou', 1, '1970-01-01'),
(11, 'encore un évènement', 1, '2018-01-02'),
(12, 'antoine', 1, '1970-01-01'),
(13, 'encore un ev', 1, '2018-01-02'),
(14, 'dernier ev', 1, '2018-01-03'),
(15, 'pranked', 1, '1970-01-01'),
(16, 'azefazef', 1, '1970-01-01'),
(20, 'un év', 1, '1970-01-01');

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
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EXPEDITEUR` int(11) NOT NULL,
  `ID_DESTINATAIRE` int(11) NOT NULL,
  `LIBELLE` text NOT NULL,
  `HEURE` date NOT NULL,
  `ID_CONVERSATION` int(11) NOT NULL,
  PRIMARY KEY (`ID_MESSAGE`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_MESSAGE`, `ID_EXPEDITEUR`, `ID_DESTINATAIRE`, `LIBELLE`, `HEURE`, `ID_CONVERSATION`) VALUES
(1, 1, 3, 'Salut maxime !', '2018-02-09', 1),
(2, 3, 1, 'Salut ça va?', '2018-02-09', 1),
(3, 1, 4, 'Salut théo', '2018-02-01', 2),
(4, 1, 3, 'Oui et toi ?', '2018-02-17', 1),
(5, 1, 3, 'J\'attends ta réponse...', '2018-02-17', 1),
(6, 1, 3, 'Et pendant ce temps je teste différents caractères \'{\"\"*ù¨', '2018-02-17', 1),
(30, 1, 3, 'yo mec', '2018-02-18', 1),
(31, 1, 3, '&lt;script&gt;alert(\'yo mec\')&lt;/script&gt;', '2018-02-18', 1),
(32, 1, 3, 'Cela marche vraiment bien 135/&amp;~=°²²²&lt;script&gt; alert(issou) &lt;/script&gt;', '2018-02-18', 1),
(9, 1, 3, 'testons le scroll', '2018-02-17', 1),
(10, 1, 3, 'testons le scroll', '2018-02-17', 1),
(11, 1, 3, 'wow', '2018-02-17', 1),
(12, 1, 3, 'wow', '2018-02-17', 1),
(13, 1, 3, 'wow', '2018-02-17', 1),
(14, 1, 3, 'wow', '2018-02-17', 1),
(15, 1, 3, 'wow', '2018-02-17', 1),
(16, 1, 3, 'wow', '2018-02-17', 1),
(17, 1, 3, 'wow', '2018-02-17', 1),
(18, 1, 3, 'wow', '2018-02-17', 1),
(19, 1, 3, 'Re ça va ?', '2018-02-17', 1),
(20, 1, 3, 'Re ça va ?', '2018-02-17', 1),
(21, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(22, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(23, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(24, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(25, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(26, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(27, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(28, 1, 3, 'Re ça va ?', '2018-02-18', 1),
(29, 1, 4, 'ça va ?', '2018-02-18', 2),
(33, 1, 3, 'azefaze', '2018-02-18', 1),
(34, 1, 3, 'message', '2018-02-18', 1),
(35, 1, 3, '&lt;mmessage&gt;', '2018-02-18', 1),
(36, 1, 3, 'Cela marche vraiment bien 135/&amp;~=°²²²&lt;script&gt; alert(issou) &lt;/script&gt;', '2018-02-18', 1),
(37, 1, 3, 'miniute 17', '2018-02-18', 1),
(38, 1, 4, 'Bon et bien j\'imagine que ça va', '2018-02-18', 2),
(39, 1, 4, 'Bon et bien j\'imagine que ça va', '2018-02-18', 2),
(40, 4, 1, 'hey', '2018-02-18', 2),
(41, 4, 2, 'salut maxime !!', '2018-02-18', 3),
(42, 2, 4, 'yo mec', '2018-02-18', 3),
(43, 2, 4, 'yo mec', '2018-02-18', 3),
(44, 2, 4, 'yo mec', '2018-02-18', 3),
(45, 2, 4, 'yo mec', '2018-02-18', 3),
(46, 2, 4, 'yo mec', '2018-02-18', 3),
(47, 2, 4, 'yo mec', '2018-02-18', 3),
(48, 1, 3, 'fvjv', '2018-02-18', 1),
(49, 1, 3, 'fvjv', '2018-02-18', 1),
(50, 1, 3, 'fvjv', '2018-02-18', 1),
(51, 1, 3, 'fvjv', '2018-02-18', 1),
(52, 1, 4, 'plop', '2018-02-18', 2),
(53, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(54, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(55, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(56, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(57, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(58, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(59, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(60, 1, 4, 'attends je réécris un long message', '2018-02-18', 2),
(61, 1, 3, 'yoyo', '2018-02-18', 1),
(62, 1, 3, 'yoyo', '2018-02-18', 1),
(63, 1, 4, 're frr', '2018-02-18', 2),
(64, 1, 4, 'yop', '2018-02-18', 2),
(65, 1, 4, 'yop', '2018-02-18', 2),
(66, 1, 4, 'yop', '2018-02-18', 2),
(67, 1, 4, 'yop', '2018-02-18', 2),
(68, 1, 4, 're', '2018-02-18', 2),
(69, 1, 3, 'ca va tjrs ?', '2018-02-18', 1),
(70, 1, 4, 're', '2018-02-18', 2),
(71, 1, 4, 're', '2018-02-18', 2),
(72, 1, 4, 'lul', '2018-02-18', 2),
(73, 1, 4, 'lul', '2018-02-18', 2),
(74, 1, 4, 'lul', '2018-02-18', 2),
(75, 1, 2, 'hey brooooo\'', '2018-02-18', 5),
(76, 1, 2, 'ça va ?', '2018-02-18', 5);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `ID_CONVERSATION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR1` int(11) NOT NULL,
  `ID_UTILISATEUR2` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONVERSATION`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`ID_CONVERSATION`, `ID_UTILISATEUR1`, `ID_UTILISATEUR2`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 4, 2),
(5, 2, 1);

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
