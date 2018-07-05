-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 juin 2018 à 14:23
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kevin-juin-2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` varchar(150) NOT NULL,
  `thetext` text NOT NULL,
  `thedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `authoridauthor` int(10) UNSIGNED NOT NULL,
  `categoryidcategory` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`,`authoridauthor`,`categoryidcategory`),
  UNIQUE KEY `idarticle_UNIQUE` (`idarticle`),
  KEY `fk_article_author_idx` (`authoridauthor`),
  KEY `fk_article_category1_idx` (`categoryidcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `thetitle`, `thetext`, `thedate`, `authoridauthor`, `categoryidcategory`) VALUES
(1, '1ere article', 'fgggdgdgdgdggjfsdfksfksfksfksfskjffjhfoufzhfzufhfuehfuihfushfuihfufhsuihfuishsfufhsishfisshfsishfsuihfuishfshfsuifsiufhsfsfuishfuihsfdusihfsfuishfsfhsfpshfusfsufshfpsfhsfsipfhfshfisfhsufhuisfhsuihfisfsf', '2018-06-29 11:38:57', 1, 1),
(2, '2ieme', 'fdfgdgdgdfgdfgdfgdgdgdfgdfgdgdfgdgdfgdgdgdgdgdfgdgdgg gdfgdg ggdfg ddggr gregreg reg rg\r\nr rgg\r\n\r\ngrgregregreg reergeeegegegegegeregggregegdsgfhrt\r\njyjtyjtyjtyjtyjtyjtyj', '2018-06-28 08:26:04', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `idauthor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` varchar(80) NOT NULL,
  `thename` varchar(150) NOT NULL,
  `thepwd` char(64) NOT NULL,
  PRIMARY KEY (`idauthor`),
  UNIQUE KEY `idauthor_UNIQUE` (`idauthor`),
  UNIQUE KEY `thelogin_UNIQUE` (`thelogin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`idauthor`, `thelogin`, `thename`, `thepwd`) VALUES
(1, 'abdoul', 'adboul', 'A88508805D88010021192B7E7EF94B60270AF05605E8B8C51C92987143D8CEC3'),
(2, 'shaban', 'Shaban Kaloshi', '39386282CDD62AA090CD639C56DA531BA0E3B2BCE517C657A40087ED426BD511'),
(3, 'nicolas', 'Nicolas Lengele', '807A09440428C0A8AEF58BD3ECE32938B0D76E638119E47619756F5C2C20FF3A');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thecategtitle` varchar(60) NOT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `idcategory_UNIQUE` (`idcategory`),
  UNIQUE KEY `thecategtitle_UNIQUE` (`thecategtitle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcategory`, `thecategtitle`) VALUES
(4, 'Autres'),
(1, 'HTML5 / CSS3'),
(2, 'Javascript / JQuery'),
(3, 'PHP / MySQL');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_author` FOREIGN KEY (`authoridauthor`) REFERENCES `author` (`idauthor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_category1` FOREIGN KEY (`categoryidcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
