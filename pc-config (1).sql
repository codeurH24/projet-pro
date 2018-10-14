-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 oct. 2018 à 17:37
-- Version du serveur :  5.6.11
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pc-config`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(2, 'carte graphique'),
(4, 'mémoire vive'),
(6, 'disque dur'),
(7, 'alimentation'),
(8, 'processeur');

-- --------------------------------------------------------

--
-- Structure de la table `compatibilite`
--

DROP TABLE IF EXISTS `compatibilite`;
CREATE TABLE IF NOT EXISTS `compatibilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degrer` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `id_composant1` int(11) NOT NULL,
  `id_composant2` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant1_compatible2` (`id_composant1`),
  KEY `composant2_compatible1` (`id_composant2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

DROP TABLE IF EXISTS `composant`;
CREATE TABLE IF NOT EXISTS `composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `point_puissance` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant_categorie` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`id`, `model`, `marque`, `point_puissance`, `auteur`, `id_cat`, `date_at`) VALUES
(12, 'CPU Intel Celeron G4900 - Double Coeur de 3.1Ghz - 8eme génération - Coffee Lake', 'Intel', 3193, 'codeurh24', 8, '2018-10-14 08:23:00'),
(13, 'CPU Intel Celeron G4920 - Double Coeur de 3.2Ghz - 8eme génération - Coffee Lake', 'Intel ', 3521, 'Florent Corlouer', 8, '2018-10-14 17:30:15'),
(14, 'CPU Intel Pentium G5400 - Double Coeur de 3.7Ghz - 8eme génération - Coffee Lake-S', 'Intel ', 5233, 'Florent Corlouer', 8, '2018-10-14 17:23:09'),
(15, 'CPU AMD Ryzen 3 1200 Wraith Stealth Edition - 4C/4T - 3.1 à 3.4Ghz', 'AMD', 6756, 'codeurh24', 8, '2018-10-14 08:23:00');

-- --------------------------------------------------------

--
-- Structure de la table `image_composant`
--

DROP TABLE IF EXISTS `image_composant`;
CREATE TABLE IF NOT EXISTS `image_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `id_composant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_composant` (`id_composant`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image_composant`
--

INSERT INTO `image_composant` (`id`, `image`, `id_composant`) VALUES
(7, 'G5400x300.jpg', 12),
(8, '', 13),
(9, 'G5400x300.jpg', 14),
(10, 'RYZEN31200x300.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `marque_composant`
--

DROP TABLE IF EXISTS `marque_composant`;
CREATE TABLE IF NOT EXISTS `marque_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `revendeur`
--

DROP TABLE IF EXISTS `revendeur`;
CREATE TABLE IF NOT EXISTS `revendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `revendeur`
--

INSERT INTO `revendeur` (`id`, `nom`) VALUES
(2, 'materiel.net'),
(4, 'cdiscount'),
(5, 'amazon');

-- --------------------------------------------------------

--
-- Structure de la table `revendeur_composant`
--

DROP TABLE IF EXISTS `revendeur_composant`;
CREATE TABLE IF NOT EXISTS `revendeur_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `revendeur_composant` (`id_composant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` datetime NOT NULL,
  `date_last_login` datetime NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`) VALUES
(14, '', '', 'Florent Corlouer', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-09-30 08:10:32', '2018-09-24 00:00:00', 0, 0),
(15, '', '', 'Florent Corlouer', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-09-30 10:31:54', '2018-09-24 00:00:00', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compatibilite`
--
ALTER TABLE `compatibilite`
  ADD CONSTRAINT `composant2_compatible1` FOREIGN KEY (`id_composant2`) REFERENCES `composant` (`id`),
  ADD CONSTRAINT `composant1_compatible2` FOREIGN KEY (`id_composant1`) REFERENCES `composant` (`id`);

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_categorie` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `image_composant`
--
ALTER TABLE `image_composant`
  ADD CONSTRAINT `image_composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `revendeur_composant`
--
ALTER TABLE `revendeur_composant`
  ADD CONSTRAINT `revendeur_composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
