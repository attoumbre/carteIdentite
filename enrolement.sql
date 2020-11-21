-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 fév. 2019 à 20:25
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `enrolement`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `passe` varchar(100) NOT NULL,
  `nom_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`passe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`passe`, `nom_admin`) VALUES
('juivy01', 'juvenal'),
('01juve', 'kouadio');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
CREATE TABLE IF NOT EXISTS `nationalite` (
  `id_nationalite` int(11) NOT NULL AUTO_INCREMENT,
  `lib_nationalite` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nationalite`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`id_nationalite`, `lib_nationalite`) VALUES
(1, 'Ivoirienne'),
(2, 'Française'),
(3, 'Allemande'),
(4, 'Américaine'),
(5, 'Marocaine'),
(6, 'Libanaise'),
(7, 'Togolaise');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naiss` date NOT NULL,
  `lieu_naiss` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `taille` float NOT NULL,
  `profession` varchar(100) NOT NULL,
  `nom_pere` varchar(100) NOT NULL,
  `date_pere` date NOT NULL,
  `nom_mere` varchar(100) NOT NULL,
  `date_mere` date NOT NULL,
  `id_sexe` varchar(100) NOT NULL,
  `id_nationalite` varchar(100) NOT NULL,
  `lien_photo` varchar(100) NOT NULL,
  `lien_empreinte` varchar(100) NOT NULL,
  `lien_signature` varchar(100) NOT NULL,
  `numero_extrait` varchar(100) NOT NULL,
  `visa_enroleur` varchar(100) NOT NULL,
  `lieu_enrolement` varchar(100) NOT NULL,
  `date_enrolement` varchar(100) NOT NULL,
  `prenom_pere` varchar(100) NOT NULL,
  `prenom_mere` varchar(100) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `id_sexe` (`id_sexe`,`id_nationalite`),
  KEY `personne_ibfk_1` (`id_nationalite`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`numero`, `nom`, `prenom`, `date_naiss`, `lieu_naiss`, `contact`, `taille`, `profession`, `nom_pere`, `date_pere`, `nom_mere`, `date_mere`, `id_sexe`, `id_nationalite`, `lien_photo`, `lien_empreinte`, `lien_signature`, `numero_extrait`, `visa_enroleur`, `lieu_enrolement`, `date_enrolement`, `prenom_pere`, `prenom_mere`) VALUES
(4, 'juvenal', 'konan', '2019-02-18', 'bomi', '74596655', 1.9, 'programmeur', 'attoumbre', '2019-02-12', 'koffi', '2019-02-23', 'F', '1', '2017-01-21-10-54-18-860.jpg', '2017-05-19-14-33-13-363.jpg', '2017-04-11-12-43-20-308.jpg', '1255', 'william', 'abidjan', '2019-02-24', 'felix', 'malou'),
(5, 'jean', 'kouassi', '2019-02-20', 'yaokro', '412536', 1.85, 'danseur', 'kobenan', '2019-02-28', 'koffi', '2019-02-26', 'M', '1', '2018-02-13-14-27-02-967.jpg', '2017-07-10-14-45-51-137.jpg', '2018-03-01-11-49-51-508.jpg', '124', 'gerard', 'abidjan', '2019-02-21', 'kanon', 'malou'),
(8, 'jean', 'kouassi', '2019-02-20', 'yaokro', '412536', 1.85, 'danseur', 'kobenan', '2019-02-28', 'koffi', '2019-02-26', 'M', '1', '2018-02-13-14-27-02-967.jpg', '2017-07-10-14-45-51-137.jpg', '2018-03-01-11-49-51-508.jpg', '124', 'gerard', 'abidjan', '2019-02-21', 'kanon', 'malou'),
(9, 'yeo', 'nadege', '2001-10-08', 'yop', '4152584', 1.9, 'etudiante', 'yeo', '2001-10-08', 'yaya', '2001-10-08', '', 'ivoirienne', '', 'dfghjk', 'rtyj', '1454', 'joel', 'campus', '2001-10-08', 'prince', 'nadola'),
(10, 'gbazalé', 'olivier', '2001-12-19', 'dabou', '74859612', 1.87, 'hussier', 'gbazalé', '1978-12-19', 'konan', '1988-12-19', 'm', 'ivoirienne', 'PictureBox1', 'azertyui', 'dfghjk', '14588', 'gnagne', 'koumasi', '2018-12-19', 'romeo', 'juliette'),
(11, '', '', '2018-05-21', '', '752555', 1.89, '', '', '2018-05-21', '', '2018-05-21', '', '', 'photo', '', '', '7458', '', '', '2018-05-21', '', ''),
(12, 'azert', '', '2018-02-15', '', '1236985', 1.55, '', '', '2018-02-15', '', '2018-02-15', '', '', 'System.Drawing.Bitmap', '', '', '4552', '', '', '2018-02-15', '', ''),
(13, '', '', '2014-09-21', '', '02458964', 1.84, '', '', '2014-09-21', '', '2014-09-21', '', '', 'E:YouCam Perfect2017-04-29-17-20-04-771.jpg', '', '', '1254', '', '', '2014-09-21', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `id_sexe` varchar(11) NOT NULL,
  `lib_sexe` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sexe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`id_sexe`, `lib_sexe`) VALUES
('F', 'Feminin'),
('M', 'Masculin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
