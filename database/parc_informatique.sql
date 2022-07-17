-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2021 at 05:27 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parc_informatique`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `matricule` varchar(10) NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`matricule`, `service`) VALUES
('AGENT-e101', 'PRODUCTION'),
('C1234', 'MANAGEMENT'),
('ijoko', 'jlhoijnp'),
('C12345', 'COMPTABILITE'),
('C3200e', 'IT-SOLUTION');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id_asset` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(100) NOT NULL,
  `matricule_IT` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fournisseur` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `garantie` date NOT NULL,
  `etat` text NOT NULL,
  PRIMARY KEY (`id_asset`),
  KEY `type` (`type`),
  KEY `matricule` (`matricule_IT`),
  KEY `fournisseur` (`fournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id_asset`, `type`, `matricule_IT`, `fournisseur`, `date`, `garantie`, `etat`) VALUES
('win10', 'desktop', 'C02003', 'LENOVO', '2021-03-18', '0000-00-00', 'BON'),
('win10-e1-001', 'desktop', 'C02003', 'DELL', '2021-03-26', '2021-02-07', 'DEFECTUEUX'),
('IMPRI-e2-001', 'imprimante', 'C02003', 'HP', '2021-03-20', '2021-05-20', 'BON'),
('impri-2000', 'imprimante', 'C02001', 'HP', '2021-03-26', '2021-04-26', 'BON');

-- --------------------------------------------------------

--
-- Table structure for table `cas_de_panne`
--

DROP TABLE IF EXISTS `cas_de_panne`;
CREATE TABLE IF NOT EXISTS `cas_de_panne` (
  `id_cas` int(11) NOT NULL AUTO_INCREMENT,
  `matricule_agent` varchar(10) NOT NULL,
  `id_panne` int(11) NOT NULL,
  `statut` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_cas`),
  KEY `id_panne` (`id_panne`),
  KEY `matricule_agent` (`matricule_agent`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cas_de_panne`
--

INSERT INTO `cas_de_panne` (`id_cas`, `matricule_agent`, `id_panne`, `statut`, `date`) VALUES
(1, 'AGENT-e101', 1, 'RESOLU', '2021-03-19'),
(2, 'C12345', 3, 'RESOLU', '2021-03-20'),
(3, 'C12345', 3, 'RESOLU', '2021-03-21'),
(4, 'C12345', 4, 'RESOLU', '2021-03-21'),
(5, 'C12345', 5, 'RESOLU', '2021-03-21'),
(6, 'C3200e', 6, 'NON RESOLU', '2021-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `composants`
--

DROP TABLE IF EXISTS `composants`;
CREATE TABLE IF NOT EXISTS `composants` (
  `num_composant` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ref_type` int(11) DEFAULT NULL,
  `libelle` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nbre_defectueux` int(11) NOT NULL,
  `nbre_bon` int(11) NOT NULL,
  `nbre_panne` int(11) NOT NULL,
  PRIMARY KEY (`num_composant`),
  KEY `ref_type` (`ref_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `composants`
--

INSERT INTO `composants` (`num_composant`, `ref_type`, `libelle`, `nbre_defectueux`, `nbre_bon`, `nbre_panne`) VALUES
('desktop_c2', 25, 'clavier', 0, 3, 0),
('desktop_c1', 25, 'souris', 0, 3, 0),
('desktop_c3', 25, 'ecran', 1, 2, 0),
('desktop_c4', 25, 'disque dur', 0, 3, 0),
('imprimante_c1', 26, 'cartouche', 0, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `details_livraison`
--

DROP TABLE IF EXISTS `details_livraison`;
CREATE TABLE IF NOT EXISTS `details_livraison` (
  `id_fsseur` varchar(100) NOT NULL,
  `num_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `frais` int(11) NOT NULL,
  `mat_reception` varchar(6) NOT NULL,
  `periode` date NOT NULL,
  PRIMARY KEY (`id_fsseur`,`num_groupe`),
  KEY `num_groupe` (`num_groupe`),
  KEY `mat_reception` (`mat_reception`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details_livraison`
--

INSERT INTO `details_livraison` (`id_fsseur`, `num_groupe`, `quantite`, `frais`, `mat_reception`, `periode`) VALUES
('4', 2, 12, 20000, 'C02003', '2021-03-19'),
('1', 3, 30, 22000, 'C02003', '2021-03-19'),
('3', 4, 5, 23400, 'C02003', '2021-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fsseur` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id_fsseur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fsseur`, `libelle`) VALUES
(1, 'DELL'),
(2, 'HP'),
(3, 'LASERJET'),
(4, 'LENOVO');

-- --------------------------------------------------------

--
-- Table structure for table `groupe_asset`
--

DROP TABLE IF EXISTS `groupe_asset`;
CREATE TABLE IF NOT EXISTS `groupe_asset` (
  `num_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`num_groupe`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe_asset`
--

INSERT INTO `groupe_asset` (`num_groupe`, `libelle`) VALUES
(1, 'groupe1'),
(2, 'groupe2'),
(3, 'groupe3'),
(4, 'groupe4'),
(5, 'groupe5');

-- --------------------------------------------------------

--
-- Table structure for table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `id_panne` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id_panne`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panne`
--

INSERT INTO `panne` (`id_panne`, `commentaire`) VALUES
(1, 'pas de connexion internet                    	'),
(2, 'pas de connexion internet'),
(3, 'L\'ordinateur ne s\'allume pas'),
(4, 'SOURIS DEFECTUEUSE                   	'),
(5, 'PROBLEME DE LOGIN                  	'),
(6, 'L\'ecran ne s\'allume pas');

-- --------------------------------------------------------

--
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `observation` text NOT NULL,
  `ordenance` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_medecin`),
  KEY `id_patient_2` (`id_patient`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `date`, `heure`, `id_patient`, `id_medecin`, `observation`, `ordenance`) VALUES
(1, '2014-06-22', '14:22:00', 4, 3, '', ''),
(2, '2014-06-22', '14:22:00', 4, 3, '', ''),
(3, '2014-06-22', '01:59:00', 4, 3, '', ''),
(4, '2014-06-22', '14:22:00', 4, 3, '', ''),
(5, '2014-06-22', '22:00:00', 4, 3, '', ''),
(6, '2014-06-11', '11:11:00', 4, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resolutions_panne`
--

DROP TABLE IF EXISTS `resolutions_panne`;
CREATE TABLE IF NOT EXISTS `resolutions_panne` (
  `matricule_IT` varchar(6) NOT NULL,
  `id_panne` int(11) NOT NULL AUTO_INCREMENT,
  `solution` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ref_cas` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`matricule_IT`,`id_panne`),
  KEY `id_panne` (`id_panne`),
  KEY `ref_cas` (`ref_cas`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resolutions_panne`
--

INSERT INTO `resolutions_panne` (`matricule_IT`, `id_panne`, `solution`, `ref_cas`, `date`) VALUES
('C02003', 1, 'Changer de cable reseau', 1, '2021-03-20'),
('C02001', 3, 'Changer de cable reseau', 3, '2021-03-21'),
('C02003', 3, 'Debrancher et maintenir le bouton d\'allumage pendant 30 secondes et rebrancher', 2, '2021-03-21'),
('C02001', 4, 'Remplacement de materiel', 4, '2021-03-21'),
('C02003', 5, 'Vider le cache du navigateur et supprimer les sessions des anciens utilisateurs', 5, '2021-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `type_asset`
--

DROP TABLE IF EXISTS `type_asset`;
CREATE TABLE IF NOT EXISTS `type_asset` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_asset`
--

INSERT INTO `type_asset` (`numero`, `nom`, `stock`) VALUES
(27, 'cable reseau', 0),
(26, 'imprimante', 5),
(25, 'desktop', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `datedenaissance` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `identifiant`, `motdepasse`, `email`, `prenom`, `profile`, `sexe`, `datedenaissance`) VALUES
(3, 'monsif', 'a', 'a', 'monsif-20@hotmail.fr', 'elaissoussi', 'Medecin', 'Homme', '2014-07-09'),
(4, 'patient1', 'c', 'c', 'monsif-20@hotmail.fr', 'patient1', 'Patient', 'Homme', '2014-06-04'),
(5, 'mimo', 'rmmm', 'rmmm', 'monsif-20@hotmail.fr', 'rssmm', 'Patient', 'Homme', '2014-06-03'),
(7, 'a', 'a', 'a', '', 'a', 'Patient', 'Femme', '2014-06-04'),
(8, 'm', 'm', 'm', 'm', 'm', 'Admin', 'Homme', '2010-10-10'),
(9, 'pp', 'p', 'ppp', 'monsif20@gmail.com', 'p', 'Medecin', 'Homme', '2014-06-18'),
(10, 'EL AISSOUSSI', 'mmm', 'mmm', 'monsif-20@hotmail.fr', 'Monsif', 'Medecin', 'Homme', '2014-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `matricule` varchar(6) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`matricule`, `nom`, `prenom`, `password`, `role`) VALUES
('C02003', 'ViBRITANNIA', 'LELOUCH', 'Salopard2021', 1),
('C02001', 'NANTCHO', 'FREDDY ALLANDY', 'bossmastercash', 2),
('C00001', 'TSAMO ', 'steve jerkey', 'kagebunchinojutsu', 2),
('C2001l', 'Tchongouang Djomo', 'Gatien Lewis', 'aominekun', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
