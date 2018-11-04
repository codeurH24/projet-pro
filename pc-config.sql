-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 nov. 2018 à 17:18
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(2, 'carte graphique'),
(4, 'mémoire vive'),
(6, 'disque dur'),
(7, 'alimentation'),
(8, 'processeur'),
(9, 'carte mère');

-- --------------------------------------------------------

--
-- Structure de la table `compatibilite`
--

DROP TABLE IF EXISTS `compatibilite`;
CREATE TABLE IF NOT EXISTS `compatibilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degrer` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_composant1` int(11) NOT NULL,
  `id_composant2` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant1_compatible2` (`id_composant1`),
  KEY `composant2_compatible1` (`id_composant2`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compatibilite`
--

INSERT INTO `compatibilite` (`id`, `degrer`, `auteur`, `id_composant1`, `id_composant2`, `date_at`) VALUES
(1, 100, 'codeurh24', 54, 38, '2018-11-04 16:14:53'),
(2, 100, 'codeurh24', 38, 53, '2018-11-04 16:35:14');

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

DROP TABLE IF EXISTS `composant`;
CREATE TABLE IF NOT EXISTS `composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `point_puissance` int(11) DEFAULT '0',
  `auteur` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant_categorie` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`id`, `model`, `marque`, `point_puissance`, `auteur`, `id_cat`, `date_at`) VALUES
(16, 'CPU INTEL CELERON G4900 - DOUBLE COEUR DE 3.1GHZ - 8EME GÉNÉRATION - COFFEE LAKE', 'Intel', 3217, 'Florent Corlouer', 8, '2018-10-27 13:37:08'),
(17, 'CPU INTEL CELERON G4920 - DOUBLE COEUR DE 3.2GHZ - 8EME GÉNÉRATION - COFFEE LAKE', 'Intel', 3521, 'codeurh24', 8, '2018-10-14 08:23:00'),
(18, 'CPU INTEL PENTIUM G5400 - DOUBLE COEUR DE 3.7GHZ - 8EME GÉNÉRATION - COFFEE LAKE-S', 'Intel', 5231, 'codeurh24', 8, '2018-10-14 08:23:00'),
(19, 'CPU AMD RYZEN 3 1200 WRAITH STEALTH EDITION - 4C/4T - 3.1 À 3.4GHZ', 'AMD', 6758, 'Florent Corlouer', 8, '2018-10-27 13:10:15'),
(20, 'CPU INTEL PENTIUM G5500 - DOUBLE COEUR DE 3.8GHZ - 8EME GÉNÉRATION - COFFEE LAKE-S', 'Intel', 5194, 'Florent Corlouer', 8, '2018-10-27 12:42:45'),
(21, 'CPU AMD RYZEN 3 2200 WRAITH STEALTH EDITION - 4C/4T - 3.5 À 3.7GHZ', 'AMD', 7434, 'Florent Corlouer', 8, '2018-10-27 12:43:59'),
(22, 'CPU INTEL PENTIUM G5600 - DOUBLE COEUR DE 3.9GHZ - 8EME GÉNÉRATION - COFFEE LAKE-S', 'Intel', 5707, 'Florent Corlouer', 8, '2018-10-27 12:45:50'),
(23, 'CPU AMD RYZEN 5 2400G WRAITH STEALTH EDITION - 4C/8T - 3.6 À 3.9GHZ', 'AMD', 9282, 'Florent Corlouer', 8, '2018-10-27 12:47:13'),
(24, 'CPU AMD RYZEN 5 2600 WRAITH STEALTH EDITION - 6C/12T - 3.4 À 3.9GHZ', 'AMD', 13508, 'Florent Corlouer', 8, '2018-10-27 12:48:39'),
(25, 'CPU INTEL CORE I3-7350K - DOUBLE COEUR DE 4.2GHZ - 7EME GÉNÉRATION - KABY LAKE', 'Intel', 6620, 'Florent Corlouer', 8, '2018-10-27 12:50:43'),
(26, 'CPU AMD Athlon 200GE - 2C/4T - 3.2 Ghz', 'AMD', 4928, 'Florent Corlouer', 8, '2018-10-27 13:08:24'),
(27, 'CPU Intel Core i5-7640X - Quadruple Coeur de 4.0 à 4.2Ghz - 8eme génération - Kaby Lake X', 'AMD', 9585, 'Florent Corlouer', 8, '2018-10-27 13:32:09'),
(28, ' PCI-E16X , MSI , Nvidia GEFORCE GT710 - 1Go', 'MSI', 678, 'Florent Corlouer', 2, '2018-10-27 14:58:06'),
(29, 'PCI-E16X , MSI , Nvidia GEFORCE GT710 - 2Go', 'MSI', 678, 'Florent Corlouer', 2, '2018-10-27 15:00:38'),
(30, 'PCI-E16X , MSI , Nvidia GEFORCE GT1030 - 2Go - OC', 'MSI', 2224, 'Florent Corlouer', 2, '2018-10-27 15:20:16'),
(31, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GT1030 - 2Go - Low Profile - OC', 'GIGABYTE ', 2224, 'Florent Corlouer', 2, '2018-10-27 15:22:13'),
(32, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - 2Go - OC', 'GEFORCE', 4607, 'Florent Corlouer', 2, '2018-10-27 15:24:51'),
(33, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go', 'GIGABYTE ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:27:10'),
(34, ' PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go - G1 GAMING', 'GIGABYTE ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:29:38'),
(35, 'ASUS , Nvidia GEFORCE GTX1050 - 2Go', 'ASUS', 4607, 'Florent Corlouer', 2, '2018-10-27 15:31:26'),
(36, 'PCI-E , MSI , Nvidia GEFORCE GTX1050 - 2Go - Low Profile', 'MSI ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:33:11'),
(37, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - AERO ITX - 2Go - OC', 'MSI ', 4607, 'Florent Corlouer', 2, '2018-10-27 15:34:29'),
(38, ' PCI-E , MSI , Nvidia GEFORCE GTX1050TI - 4Go', 'MSI ', 5947, 'Florent Corlouer', 2, '2018-10-27 15:35:46'),
(39, 'PCI-E16X , ASUS , Nvidia GEFORCE GTX1050 - 2Go - OC STRIX GAMING', 'ASUS ', 5947, 'Florent Corlouer', 2, '2018-10-27 15:36:56'),
(40, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050Ti - 4Go - G1 GAMING', 'GIGABYTE', 5947, 'Florent Corlouer', 2, '2018-10-27 15:39:44'),
(41, 'PCI-E16X , MSI , Nvidia GEFORCE GTX1050TI - 4Go - GAMING X', 'MSI', 5947, 'Florent Corlouer', 2, '2018-10-27 15:40:41'),
(42, ' PCI-E16X , ASUS , Nvidia GEFORCE GTX1060 - 3Go - Phoenix', 'ASUS', 9006, 'Florent Corlouer', 2, '2018-10-27 16:10:36'),
(43, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1070 - 8Go', 'GIGABYTE', 11204, 'Florent Corlouer', 2, '2018-10-27 16:12:25'),
(44, ' PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1080 - 8Go', 'GIGABYTE', 12323, 'Florent Corlouer', 2, '2018-10-27 16:13:46'),
(45, ' PCI-E16X , MSI , Nvidia GEFORCE RTX2070 - 8Go - AERO', 'MSI', 13435, 'Florent Corlouer', 2, '2018-10-27 16:15:33'),
(46, ' PCI-E16X , Gigabyte , Nvidia GEFORCE RTX2080 - 8Go - OC - GAMING', 'Gigabyte', 15657, 'Florent Corlouer', 2, '2018-10-27 16:17:37'),
(47, 'PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX TITAN X EXTREME - 12Go', 'GIGABYTE', 13480, 'Florent Corlouer', 2, '2018-10-27 16:19:23'),
(48, ' PCI-E16X , MSI , Nvidia GEFORCE RTX2080 TI - 11Go - OC - GAMING X TRIO', 'MSI', 17210, 'Florent Corlouer', 2, '2018-10-27 16:21:13'),
(49, ' Carte Mère MSI B250M PRO VD - pour CPU Intel 6ème et 7ème Génération', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:31:29'),
(50, 'Carte Mère MSI H110M ECO - DDR4 - Socket 1151 - pour CPU Intel 6ème Génération', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:34:09'),
(51, 'Carte Mère GIGABYTE H110M-M2 - pour CPU Intel 6ème et 7ème Génération', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:35:32'),
(52, 'Carte Mère MSI A320M PRO-VH - Socket AM4 - pour CPU AMD', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:36:35'),
(53, 'Carte Mère MSI H310M PRO-VH - DDR4 - Socket 1151 - pour CPU Intel 8ème Génération', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:50:32'),
(54, ' Carte Mère ASUS H310M K - DDR4 - Socket 1151 - pour CPU Intel 8ème Génération', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:41:30'),
(55, 'Carte Mère MSI B350M PRO VD PLUS - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:40:20'),
(56, ' Carte Mère GIGABYTE B360M H - DDR4 - Socket 1151 - pour CPU Intel 8ème Génération', 'GIGABYTE', 0, 'Florent Corlouer', 9, '2018-10-27 16:55:20'),
(57, 'Carte Mère MSI B350M GAMING PRO - Socket AM4 - pour CPU AMD RYZEN', 'MSI', 0, 'Florent Corlouer', 9, '2018-10-27 16:56:26'),
(58, 'Carte Mère ASUS STRIX B360 G GAMING - Socket 1151 - pour CPU Intel 8ème Génération', 'ASUS', 0, 'Florent Corlouer', 9, '2018-10-27 16:57:42');

-- --------------------------------------------------------

--
-- Structure de la table `creation`
--

DROP TABLE IF EXISTS `creation`;
CREATE TABLE IF NOT EXISTS `creation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creation`
--

INSERT INTO `creation` (`id`, `name`, `enable`, `description`, `id_user`, `date_creation`) VALUES
(6, 'PC Gamer', 0, 'Montage d\'un pc en prévision de de jouer a WOW ou LOL', 14, '2018-10-28 03:26:22'),
(7, 'PC familiale', 0, 'Besoin d\'un pc pour toute la famille', 14, '2018-10-28 03:01:43'),
(8, 'PC pour mon entreprise de gestion', 0, 'Ce pc correspondra parfaitement à mes besoin professionnel, dans le cadre de l\'administratif niveau entreprise', 14, '2018-10-28 03:03:05'),
(9, 'Ordinateur pour le voisin', 0, 'Mon voisin à besoin d\'un ordinateur pour surfer sur internet', 14, '2018-10-28 03:04:07'),
(32, 'Config No Name', 1, 'Config No Name', 14, '2018-11-03 14:23:31'),
(34, 'config X', 0, 'test X', 24, '2018-11-04 09:35:28'),
(41, 'Config No Name', 1, 'Config No Name', 24, '2018-11-04 09:52:30');

-- --------------------------------------------------------

--
-- Structure de la table `creation_conception`
--

DROP TABLE IF EXISTS `creation_conception`;
CREATE TABLE IF NOT EXISTS `creation_conception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_composant` int(11) NOT NULL,
  `id_creation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creation titre` (`id_creation`),
  KEY `creation user` (`id_user`),
  KEY `creation composant` (`id_composant`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creation_conception`
--

INSERT INTO `creation_conception` (`id`, `id_composant`, `id_creation`, `id_user`, `date_create`) VALUES
(2, 28, 6, 14, '2018-10-10 00:00:00'),
(3, 51, 6, 14, '2018-10-10 00:00:00'),
(4, 19, 6, 14, '2018-10-10 00:00:00'),
(5, 16, 6, 14, '2018-10-10 00:00:00'),
(10, 28, 32, 14, '2018-10-10 10:00:00'),
(11, 26, 32, 14, '2018-10-10 10:00:00'),
(16, 16, 32, 14, '2018-11-03 14:57:43'),
(17, 52, 32, 14, '2018-11-03 14:58:48'),
(21, 19, 41, 24, '2018-11-04 09:52:30'),
(22, 49, 41, 24, '2018-11-04 09:52:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image_composant`
--

INSERT INTO `image_composant` (`id`, `image`, `id_composant`) VALUES
(11, 'G4920x300.jpg', 16),
(12, 'G4920x300.jpg', 17),
(13, 'G5400x300.jpg', 18),
(14, 'RYZEN31200x300.jpg', 19),
(15, 'G5400x300.jpg', 20),
(16, 'RYZEN31200x300.jpg', 21),
(17, 'G5400x300.jpg', 22),
(18, 'RYZEN31200x300.jpg', 23),
(19, 'RYZEN31200x300.jpg', 24),
(20, 'I37350Kx300.jpg', 25),
(21, 'ATHLON200GEx300.jpg', 26),
(22, 'I57640Xx300.jpg', 27),
(23, 'N7101GD3HLPx300.jpg', 28),
(24, 'N7101GD3HLPx300.jpg', 29),
(25, 'N7101GD3HLPx300.jpg', 30),
(26, 'GVN1030D52GLx300.jpg', 31),
(27, 'N10502GOCx300.jpg', 32),
(28, 'GVN1050D52GDx300.jpg', 33),
(29, 'GVN1050G1GAMING2Gx300.jpg', 34),
(30, 'GTX1050x300.jpg', 35),
(31, 'N10502GTLPx300.jpg', 36),
(32, 'N1050AERO2GOCx300.jpg', 37),
(33, 'N10502GOCx300.jpg', 38),
(34, 'GTX1050O2GGAMINGx300.jpg', 39),
(35, 'GVN1050TIG1GAMING4Gx300.jpg', 40),
(36, 'N1050TIGAMINGX4Gx300.jpg', 41),
(37, 'GTX10603Gx300.jpg', 42),
(38, 'GVN1070IXOC8GDx300.jpg', 43),
(39, 'GVN1080WF3OC8GDx300.jpg', 44),
(40, 'N2070AERO8Gx300.jpg', 45),
(41, 'GVN2080GAMINGOC8GCx300.jpg', 46),
(42, 'GVNTITANXXTREME12GDBx300.jpg', 47),
(43, 'N2080TIGAMINGXTRIOx300.jpg', 48),
(44, 'B250MPROVDx300.jpg', 49),
(45, 'H110MECOx300.jpg', 50),
(46, 'H110MM2x300.jpg', 51),
(47, 'A320MPROVHx300.jpg', 52),
(48, 'H310MPROVHx300.jpg', 53),
(49, 'H310MKx300.jpg', 54),
(50, 'B350MPROVDPLUSx300.jpg', 55),
(51, 'B360MHx300.jpg', 56),
(52, 'B350MGAMINGPROx300.jpg', 57),
(53, 'B360GGAMINGx300.jpg', 58);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

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
  `prix` float(10,2) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `revLnkComp` (`id_composant`),
  KEY `compLnkRev` (`id_revendeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` datetime NOT NULL,
  `date_last_login` datetime NOT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `email`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`) VALUES
(14, '', '', 'Florent Corlouer', 'cci.corlouer@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-09-30 08:10:32', '2018-09-24 00:00:00', 0, 0),
(24, NULL, NULL, 'codeurh24', 'codeurh24@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', '2018-11-04 08:30:42', '2018-11-04 08:30:42', NULL, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compatibilite`
--
ALTER TABLE `compatibilite`
  ADD CONSTRAINT `composant1_compatible2` FOREIGN KEY (`id_composant1`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composant2_compatible1` FOREIGN KEY (`id_composant2`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_categorie` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `creation_conception`
--
ALTER TABLE `creation_conception`
  ADD CONSTRAINT `creation?composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`),
  ADD CONSTRAINT `creation?titre` FOREIGN KEY (`id_creation`) REFERENCES `creation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `creation?user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_composant`
--
ALTER TABLE `image_composant`
  ADD CONSTRAINT `image_composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `revendeur_composant`
--
ALTER TABLE `revendeur_composant`
  ADD CONSTRAINT `compLnkRev` FOREIGN KEY (`id_revendeur`) REFERENCES `revendeur` (`id`),
  ADD CONSTRAINT `revLnkComp` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
