-- pjl SQL Dump
-- Server version:5.7.24-0ubuntu0.18.04.1
-- Generated: 2018-11-25 12:26:43
-- Current PHP version: 7.2.10-0ubuntu0.18.04.1
-- Host: localhost
-- Database:pc-config
-- --------------------------------------------------------
-- Structure for 'categorie'
--

DROP TABLE IF EXISTS categorie;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `categorie`
--

INSERT INTO categorie (`id`,`nom`) VALUES ("2","carte graphique");
INSERT INTO categorie (`id`,`nom`) VALUES ("4","mmoire vive");
INSERT INTO categorie (`id`,`nom`) VALUES ("6","disque dur");
INSERT INTO categorie (`id`,`nom`) VALUES ("7","alimentation");
INSERT INTO categorie (`id`,`nom`) VALUES ("8","processeur");
INSERT INTO categorie (`id`,`nom`) VALUES ("9","carte mre");



-- --------------------------------------------------------
-- Structure for 'compatibilite'
--

DROP TABLE IF EXISTS compatibilite;
CREATE TABLE `compatibilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degrer` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_composant1` int(11) NOT NULL,
  `id_composant2` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant1_compatible2` (`id_composant1`),
  KEY `composant2_compatible1` (`id_composant2`),
  CONSTRAINT `composant1_compatible2` FOREIGN KEY (`id_composant1`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `composant2_compatible1` FOREIGN KEY (`id_composant2`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `compatibilite`
--

INSERT INTO compatibilite (`id`,`degrer`,`auteur`,`id_composant1`,`id_composant2`,`date_at`) VALUES ("1","100","codeurh24","54","38","2018-11-04 16:14:53");
INSERT INTO compatibilite (`id`,`degrer`,`auteur`,`id_composant1`,`id_composant2`,`date_at`) VALUES ("2","100","codeurh24","38","53","2018-11-04 16:35:14");



-- --------------------------------------------------------
-- Structure for 'compatibility_tag'
--

DROP TABLE IF EXISTS compatibility_tag;
CREATE TABLE `compatibility_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_composant` int(11) NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- --------------------------------------------------------
-- Dump Data for `compatibility_tag`
--

INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("2","16","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("3","17","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("4","18","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("5","19","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("6","21","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("7","23","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("8","24","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("9","20","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("10","18","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("11","20","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("12","22","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("13","25","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("14","26","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("15","27","2066");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("16","49","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("17","50","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("18","53","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("19","54","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("20","56","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("21","58","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("22","51","1151");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("23","52","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("24","55","am4");
INSERT INTO compatibility_tag (`id`,`id_composant`,`tag`) VALUES ("25","57","am4");



-- --------------------------------------------------------
-- Structure for 'composant'
--

DROP TABLE IF EXISTS composant;
CREATE TABLE `composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `point_puissance` int(11) DEFAULT '0',
  `auteur` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `composant_categorie` (`id_cat`),
  CONSTRAINT `composant_categorie` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `composant`
--

INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("16","CPU INTEL CELERON G4900 - DOUBLE COEUR DE 3.1GHZ - 8EME GNRATION - COFFEE LAKE","Intel","3217","Florent Corlouer","8","2018-10-27 13:37:08");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("17","CPU INTEL CELERON G4920 - DOUBLE COEUR DE 3.2GHZ - 8EME GNRATION - COFFEE LAKE","Intel","3521","codeurh24","8","2018-10-14 08:23:00");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("18","CPU INTEL PENTIUM G5400 - DOUBLE COEUR DE 3.7GHZ - 8EME GNRATION - COFFEE LAKE-S","Intel","5231","codeurh24","8","2018-10-14 08:23:00");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("19","CPU AMD RYZEN 3 1200 WRAITH STEALTH EDITION - 4C/4T - 3.1  3.4GHZ","AMD","6758","Florent Corlouer","8","2018-10-27 13:10:15");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("20","CPU INTEL PENTIUM G5500 - DOUBLE COEUR DE 3.8GHZ - 8EME GNRATION - COFFEE LAKE-S","Intel","5194","Florent Corlouer","8","2018-10-27 12:42:45");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("21","CPU AMD RYZEN 3 2200 WRAITH STEALTH EDITION - 4C/4T - 3.5  3.7GHZ","AMD","7434","Florent Corlouer","8","2018-10-27 12:43:59");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("22","CPU INTEL PENTIUM G5600 - DOUBLE COEUR DE 3.9GHZ - 8EME GNRATION - COFFEE LAKE-S","Intel","5707","Florent Corlouer","8","2018-10-27 12:45:50");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("23","CPU AMD RYZEN 5 2400G WRAITH STEALTH EDITION - 4C/8T - 3.6  3.9GHZ","AMD","9282","Florent Corlouer","8","2018-10-27 12:47:13");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("24","CPU AMD RYZEN 5 2600 WRAITH STEALTH EDITION - 6C/12T - 3.4  3.9GHZ","AMD","13508","Florent Corlouer","8","2018-10-27 12:48:39");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("25","CPU INTEL CORE I3-7350K - DOUBLE COEUR DE 4.2GHZ - 7EME GNRATION - KABY LAKE","Intel","6620","Florent Corlouer","8","2018-10-27 12:50:43");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("26","CPU AMD Athlon 200GE - 2C/4T - 3.2 Ghz","AMD","4928","Florent Corlouer","8","2018-10-27 13:08:24");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("27","CPU Intel Core i5-7640X - Quadruple Coeur de 4.0  4.2Ghz - 8eme gnration - Kaby Lake X","AMD","9585","Florent Corlouer","8","2018-10-27 13:32:09");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("28"," PCI-E16X , MSI , Nvidia GEFORCE GT710 - 1Go","MSI","678","Florent Corlouer","2","2018-10-27 14:58:06");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("29","PCI-E16X , MSI , Nvidia GEFORCE GT710 - 2Go","MSI","678","Florent Corlouer","2","2018-10-27 15:00:38");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("30","PCI-E16X , MSI , Nvidia GEFORCE GT1030 - 2Go - OC","MSI","2224","Florent Corlouer","2","2018-10-27 15:20:16");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("31","PCI-E16X , GIGABYTE , Nvidia GEFORCE GT1030 - 2Go - Low Profile - OC","GIGABYTE ","2224","Florent Corlouer","2","2018-10-27 15:22:13");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("32","PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - 2Go - OC","GEFORCE","4607","Florent Corlouer","2","2018-10-27 15:24:51");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("33","PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go","GIGABYTE ","4607","Florent Corlouer","2","2018-10-27 15:27:10");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("34"," PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050 - 2Go - G1 GAMING","GIGABYTE ","4607","Florent Corlouer","2","2018-10-27 15:29:38");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("35","ASUS , Nvidia GEFORCE GTX1050 - 2Go","ASUS","4607","Florent Corlouer","2","2018-10-27 15:31:26");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("36","PCI-E , MSI , Nvidia GEFORCE GTX1050 - 2Go - Low Profile","MSI ","4607","Florent Corlouer","2","2018-10-27 15:33:11");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("37","PCI-E16X , MSI , Nvidia GEFORCE GTX1050 - AERO ITX - 2Go - OC","MSI ","4607","Florent Corlouer","2","2018-10-27 15:34:29");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("38"," PCI-E , MSI , Nvidia GEFORCE GTX1050TI - 4Go","MSI ","5947","Florent Corlouer","2","2018-10-27 15:35:46");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("39","PCI-E16X , ASUS , Nvidia GEFORCE GTX1050 - 2Go - OC STRIX GAMING","ASUS ","5947","Florent Corlouer","2","2018-10-27 15:36:56");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("40","PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1050Ti - 4Go - G1 GAMING","GIGABYTE","5947","Florent Corlouer","2","2018-10-27 15:39:44");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("41","PCI-E16X , MSI , Nvidia GEFORCE GTX1050TI - 4Go - GAMING X","MSI","5947","Florent Corlouer","2","2018-10-27 15:40:41");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("42"," PCI-E16X , ASUS , Nvidia GEFORCE GTX1060 - 3Go - Phoenix","ASUS","9006","Florent Corlouer","2","2018-10-27 16:10:36");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("43","PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1070 - 8Go","GIGABYTE","11204","Florent Corlouer","2","2018-10-27 16:12:25");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("44"," PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX1080 - 8Go","GIGABYTE","12323","Florent Corlouer","2","2018-10-27 16:13:46");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("45"," PCI-E16X , MSI , Nvidia GEFORCE RTX2070 - 8Go - AERO","MSI","13435","Florent Corlouer","2","2018-10-27 16:15:33");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("46"," PCI-E16X , Gigabyte , Nvidia GEFORCE RTX2080 - 8Go - OC - GAMING","Gigabyte","15657","Florent Corlouer","2","2018-10-27 16:17:37");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("47","PCI-E16X , GIGABYTE , Nvidia GEFORCE GTX TITAN X EXTREME - 12Go","GIGABYTE","13480","Florent Corlouer","2","2018-10-27 16:19:23");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("48"," PCI-E16X , MSI , Nvidia GEFORCE RTX2080 TI - 11Go - OC - GAMING X TRIO","MSI","17210","Florent Corlouer","2","2018-10-27 16:21:13");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("49"," Carte Mre MSI B250M PRO VD - pour CPU Intel 6me et 7me Gnration","MSI","0","Florent Corlouer","9","2018-10-27 16:31:29");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("50","Carte Mre MSI H110M ECO - DDR4 - Socket 1151 - pour CPU Intel 6me Gnration","MSI","0","Florent Corlouer","9","2018-10-27 16:34:09");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("51","Carte Mre GIGABYTE H110M-M2 - pour CPU Intel 6me et 7me Gnration","GIGABYTE","0","Florent Corlouer","9","2018-10-27 16:35:32");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("52","Carte Mre MSI A320M PRO-VH - Socket AM4 - pour CPU AMD","MSI","0","Florent Corlouer","9","2018-10-27 16:36:35");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("53","Carte Mre MSI H310M PRO-VH - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration","MSI","0","Florent Corlouer","9","2018-10-27 16:50:32");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("54"," Carte Mre ASUS H310M K - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration","ASUS","0","Florent Corlouer","9","2018-10-27 16:41:30");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("55","Carte Mre MSI B350M PRO VD PLUS - Socket AM4 - pour CPU AMD RYZEN","MSI","0","Florent Corlouer","9","2018-10-27 16:40:20");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("56"," Carte Mre GIGABYTE B360M H - DDR4 - Socket 1151 - pour CPU Intel 8me Gnration","GIGABYTE","0","Florent Corlouer","9","2018-10-27 16:55:20");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("57","Carte Mre MSI B350M GAMING PRO - Socket AM4 - pour CPU AMD RYZEN","MSI","0","Florent Corlouer","9","2018-10-27 16:56:26");
INSERT INTO composant (`id`,`model`,`marque`,`point_puissance`,`auteur`,`id_cat`,`date_at`) VALUES ("58","Carte Mre ASUS STRIX B360 G GAMING - Socket 1151 - pour CPU Intel 8me Gnration","ASUS","0","Florent Corlouer","9","2018-10-27 16:57:42");



-- --------------------------------------------------------
-- Structure for 'creation'
--

DROP TABLE IF EXISTS creation;
CREATE TABLE `creation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `creation`
--

INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("6","PC Gamer","0","Montage d'un pc en prvision de de jouer a WOW ou LOL","14","2018-10-28 03:26:22");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("7","PC familiale","0","Besoin d'un pc pour toute la famille","14","2018-10-28 03:01:43");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("8","PC pour mon entreprise de gestion","0","Ce pc correspondra parfaitement  mes besoin professionnel, dans le cadre de l'administratif niveau entreprise","14","2018-10-28 03:03:05");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("9","Ordinateur pour le voisin","0","Mon voisin  besoin d'un ordinateur pour surfer sur internet","14","2018-10-28 03:04:07");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("32","Config No Name","1","Config No Name","14","2018-11-03 14:23:31");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("34","config X","0","test X","24","2018-11-04 09:35:28");
INSERT INTO creation (`id`,`name`,`enable`,`description`,`id_user`,`date_creation`) VALUES ("41","Config No Name","1","Config No Name","24","2018-11-04 09:52:30");



-- --------------------------------------------------------
-- Structure for 'creation_conception'
--

DROP TABLE IF EXISTS creation_conception;
CREATE TABLE `creation_conception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_composant` int(11) NOT NULL,
  `id_creation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creation titre` (`id_creation`),
  KEY `creation user` (`id_user`),
  KEY `creation composant` (`id_composant`),
  CONSTRAINT `creation?composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`),
  CONSTRAINT `creation?titre` FOREIGN KEY (`id_creation`) REFERENCES `creation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `creation?user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `creation_conception`
--

INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("2","28","6","14","2018-10-10 00:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("3","51","6","14","2018-10-10 00:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("4","19","6","14","2018-10-10 00:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("5","16","6","14","2018-10-10 00:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("10","28","32","14","2018-10-10 10:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("11","26","32","14","2018-10-10 10:00:00");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("16","16","32","14","2018-11-03 14:57:43");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("17","52","32","14","2018-11-03 14:58:48");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("21","19","41","24","2018-11-04 09:52:30");
INSERT INTO creation_conception (`id`,`id_composant`,`id_creation`,`id_user`,`date_create`) VALUES ("22","49","41","24","2018-11-04 09:52:42");



-- --------------------------------------------------------
-- Structure for 'image_composant'
--

DROP TABLE IF EXISTS image_composant;
CREATE TABLE `image_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `id_composant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_composant` (`id_composant`),
  CONSTRAINT `image_composant` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `image_composant`
--

INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("11","G4920x300.jpg","16");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("12","G4920x300.jpg","17");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("13","G5400x300.jpg","18");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("14","RYZEN31200x300.jpg","19");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("15","G5400x300.jpg","20");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("16","RYZEN31200x300.jpg","21");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("17","G5400x300.jpg","22");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("18","RYZEN31200x300.jpg","23");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("19","RYZEN31200x300.jpg","24");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("20","I37350Kx300.jpg","25");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("21","ATHLON200GEx300.jpg","26");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("22","I57640Xx300.jpg","27");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("23","N7101GD3HLPx300.jpg","28");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("24","N7101GD3HLPx300.jpg","29");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("25","N7101GD3HLPx300.jpg","30");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("26","GVN1030D52GLx300.jpg","31");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("27","N10502GOCx300.jpg","32");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("28","GVN1050D52GDx300.jpg","33");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("29","GVN1050G1GAMING2Gx300.jpg","34");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("30","GTX1050x300.jpg","35");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("31","N10502GTLPx300.jpg","36");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("32","N1050AERO2GOCx300.jpg","37");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("33","N10502GOCx300.jpg","38");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("34","GTX1050O2GGAMINGx300.jpg","39");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("35","GVN1050TIG1GAMING4Gx300.jpg","40");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("36","N1050TIGAMINGX4Gx300.jpg","41");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("37","GTX10603Gx300.jpg","42");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("38","GVN1070IXOC8GDx300.jpg","43");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("39","GVN1080WF3OC8GDx300.jpg","44");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("40","N2070AERO8Gx300.jpg","45");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("41","GVN2080GAMINGOC8GCx300.jpg","46");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("42","GVNTITANXXTREME12GDBx300.jpg","47");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("43","N2080TIGAMINGXTRIOx300.jpg","48");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("44","B250MPROVDx300.jpg","49");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("45","H110MECOx300.jpg","50");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("46","H110MM2x300.jpg","51");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("47","A320MPROVHx300.jpg","52");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("48","H310MPROVHx300.jpg","53");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("49","H310MKx300.jpg","54");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("50","B350MPROVDPLUSx300.jpg","55");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("51","B360MHx300.jpg","56");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("52","B350MGAMINGPROx300.jpg","57");
INSERT INTO image_composant (`id`,`image`,`id_composant`) VALUES ("53","B360GGAMINGx300.jpg","58");



-- --------------------------------------------------------
-- Structure for 'marque_composant'
--

DROP TABLE IF EXISTS marque_composant;
CREATE TABLE `marque_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `marque_composant`
--




-- --------------------------------------------------------
-- Structure for 'revendeur'
--

DROP TABLE IF EXISTS revendeur;
CREATE TABLE `revendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `revendeur`
--

INSERT INTO revendeur (`id`,`nom`) VALUES ("2","materiel.net");
INSERT INTO revendeur (`id`,`nom`) VALUES ("4","cdiscount");
INSERT INTO revendeur (`id`,`nom`) VALUES ("5","amazon");



-- --------------------------------------------------------
-- Structure for 'revendeur_composant'
--

DROP TABLE IF EXISTS revendeur_composant;
CREATE TABLE `revendeur_composant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` float(10,2) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL,
  `date_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `revLnkComp` (`id_composant`),
  KEY `compLnkRev` (`id_revendeur`),
  CONSTRAINT `compLnkRev` FOREIGN KEY (`id_revendeur`) REFERENCES `revendeur` (`id`),
  CONSTRAINT `revLnkComp` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
-- Dump Data for `revendeur_composant`
--




-- --------------------------------------------------------
-- Structure for 'user'
--

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
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
-- --------------------------------------------------------
-- Dump Data for `user`
--

INSERT INTO user (`id`,`nom`,`prenom`,`pseudo`,`email`,`age`,`password`,`date_registration`,`date_last_login`,`id_adresse`,`id_role`) VALUES ("14","","","Florent Corlouer","cci.corlouer@gmail.com","0","81dc9bdb52d04dc20036dbd8313ed055","2018-09-30 08:10:32","2018-09-24 00:00:00","0","0");
INSERT INTO user (`id`,`nom`,`prenom`,`pseudo`,`email`,`age`,`password`,`date_registration`,`date_last_login`,`id_adresse`,`id_role`) VALUES ("24","","","codeurh24","codeurh24@gmail.com","0","81dc9bdb52d04dc20036dbd8313ed055","2018-11-04 08:30:42","2018-11-04 08:30:42","0","0");
