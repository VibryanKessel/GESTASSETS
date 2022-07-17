-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2021 at 12:03 PM
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
-- Database: `bagbo`
--
CREATE DATABASE IF NOT EXISTS `bagbo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bagbo`;
--
-- Database: `bd_bagbo`
--
CREATE DATABASE IF NOT EXISTS `bd_bagbo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_bagbo`;
--
-- Database: `bd_etudiant`
--
CREATE DATABASE IF NOT EXISTS `bd_etudiant` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_etudiant`;

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `matricule` varchar(10) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu` text NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`matricule`, `nom`, `prenom`, `date_naissance`, `lieu`, `telephone`) VALUES
('pr0001', 'KAMDEM', 'ALAIN', '1998-03-21', 'ouest', 697483388),
('pr003', 'momo pianne', 'LYNIA', '2002-06-28', 'bangang', 69792862);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `code_inscription` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  `annee_academique` text NOT NULL,
  `option` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  `code_specialite` int(11) NOT NULL,
  PRIMARY KEY (`code_inscription`),
  KEY `matricule` (`matricule`),
  KEY `code_specialite` (`code_specialite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `code_specialite` int(11) DEFAULT NULL,
  `intitule` text NOT NULL,
  `specialite` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Database: `debrouillard2`
--
CREATE DATABASE IF NOT EXISTS `debrouillard2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `debrouillard2`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `adresse`) VALUES
(1, 'lynia', 'loin'),
(2, 'kessel', 'citer');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_client` int(11) NOT NULL,
  `ref_diamant` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_client`,`ref_diamant`),
  KEY `ref_diamant` (`id_client`),
  KEY `ref_diamant_2` (`ref_diamant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diamant`
--

DROP TABLE IF EXISTS `diamant`;
CREATE TABLE IF NOT EXISTS `diamant` (
  `ref_diamant` varchar(10) NOT NULL,
  `poids` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diamant`
--

INSERT INTO `diamant` (`ref_diamant`, `poids`, `designation`, `prix`, `stock`) VALUES
('0', 2, 'dur', 20000000, 1),
('0', 5, 'leger', 5000, 100);
--
-- Database: `enregistrer`
--
CREATE DATABASE IF NOT EXISTS `enregistrer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `enregistrer`;

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `matricule` varchar(6) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Database: `parc`
--
CREATE DATABASE IF NOT EXISTS `parc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `parc`;

-- --------------------------------------------------------

--
-- Table structure for table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bureau` text NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `identifiant` varchar(20) NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fournisseur` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `num serie` varchar(50) NOT NULL,
  `date ahat` date NOT NULL,
  `garantie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type materiels`
--

DROP TABLE IF EXISTS `type materiels`;
CREATE TABLE IF NOT EXISTS `type materiels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mot de passe` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Database: `parc_informatique`
--
CREATE DATABASE IF NOT EXISTS `parc_informatique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `parc_informatique`;

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
('win10-e1-001', 'desktop', 'C02003', 'HP', '2021-03-20', '2021-01-20', 'BON'),
('IMPRI-e2-001', 'imprimante', 'C02003', 'HP', '2021-03-20', '2021-05-20', 'BON');

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
('desktop_c3', 25, 'ecran', 0, 3, 0),
('desktop_c4', 25, 'disque dur', 0, 3, 0),
('imprimante_c1', 26, 'cartouche', 0, 7, 0);

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
('C00001', 'TSAMO ', 'steve jerkey', 'kagebunchinojutsu', 2);
--
-- Database: `projet`
--
CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_A` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION` varchar(30) NOT NULL,
  `FAMILLE` varchar(30) NOT NULL,
  `PRIX_U` float NOT NULL,
  `QTE_STO` int(11) NOT NULL,
  `QTE_MIN` int(11) NOT NULL,
  `CHEMIN_IMG` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`ID_A`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID_A`, `DESIGNATION`, `FAMILLE`, `PRIX_U`, `QTE_STO`, `QTE_MIN`, `CHEMIN_IMG`) VALUES
(19, 'CARTOUCHE CANON', 'MATERIEL INFORMATIQUE', 15, 3000, 10, '../images/L2123580.png'),
(21, 'ARMOIRE META', 'MOBILIER DE BUREAU', 5000, 41, 2, '../images/b-bureau.jpg'),
(22, 'CHAISE REF 513', 'MOBILIER DE BUREAU', 200, 10021, 5, '../images/MJML.jpg'),
(23, 'Agenda NÂ°10', 'FOURNITURE DE BUREAU', 50, 1005, 10, ''),
(24, 'Camera 25654', 'CONSOMMABLE INFORMATIQUE', 2000, 100, 5, '../images/p5.gif'),
(26, 'lAPTOP HP 450', 'MATERIEL INFORMATIQUE', 5000, 190, 10, '../images/p2.gif'),
(27, 'Desktop Pro1233', 'MOBILIER DE BUREAU', 2321, 0, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `bon_com`
--

DROP TABLE IF EXISTS `bon_com`;
CREATE TABLE IF NOT EXISTS `bon_com` (
  `ID_BONC` int(11) NOT NULL AUTO_INCREMENT,
  `REFERENCE` varchar(30) NOT NULL,
  `LOGIN` varchar(30) NOT NULL,
  `ID_F` int(11) NOT NULL,
  `DATE_BONC` date NOT NULL,
  PRIMARY KEY (`ID_BONC`),
  KEY `LOGIN` (`LOGIN`),
  KEY `ID_F` (`ID_F`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bon_com`
--

INSERT INTO `bon_com` (`ID_BONC`, `REFERENCE`, `LOGIN`, `ID_F`, `DATE_BONC`) VALUES
(9, 'PC1234', 'ANAS', 8, '2014-05-20'),
(11, 'TURBOPEN1234', 'ANAS', 4, '2014-05-19'),
(12, 'Bureau1655', 'DRISS', 4, '2014-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_C` int(11) NOT NULL AUTO_INCREMENT,
  `RAISSO_C` varchar(30) NOT NULL,
  `ADRESSE_C` text NOT NULL,
  `TEL_C` varchar(10) NOT NULL,
  `FAX` varchar(10) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_C`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_C`, `RAISSO_C`, `ADRESSE_C`, `TEL_C`, `FAX`, `EMAIL`) VALUES
(1, 'FCG AL AMANE', 'RABAT', '0537839403', '0537839403', 'AMANE@HOTMAIL.COM'),
(2, 'MR CHICHAOUI JAMAL', 'RABAT AGDAL RUE MIMOZA', '0537829201', '0537829201', 'JAMAL@GMAIL.COM'),
(3, 'A.N.A SARL NETOYAGE', '5 RUE JELJLAN AGDAL RABAT ', '0678543465', '0578543465', 'ANA@MSN.COM'),
(11, 'Mr Mancouri Billah', '5 RUE HAJ JILLALI EL OUFIR RABAT', '0661849974', '0522849974', 'mancouri@gmail.com'),
(12, 'Mr Idrissi maliki', '5 rue jilaliya Maarif casablanca France', '0522457898', '0522457898', 'idriss@hotmail.fr');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_CO` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(30) NOT NULL,
  `ID_C` int(11) NOT NULL,
  `REF_CO` varchar(30) NOT NULL,
  `DATE_CO` date DEFAULT NULL,
  PRIMARY KEY (`ID_CO`),
  KEY `LOGIN` (`LOGIN`),
  KEY `ID_C` (`ID_C`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`ID_CO`, `LOGIN`, `ID_C`, `REF_CO`, `DATE_CO`) VALUES
(1, 'DRISS', 1, 'TABLET212', '2014-05-29'),
(2, 'DRISS', 1, 'HP PRO21', '2014-05-30'),
(3, 'DRISS', 3, 'NETOYAGE_PRO999', '2014-05-31'),
(4, 'ANAS', 3, 'NETOYAGE99', '2014-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `contenir_bon`
--

DROP TABLE IF EXISTS `contenir_bon`;
CREATE TABLE IF NOT EXISTS `contenir_bon` (
  `ID_BONC` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `QTE_BON` int(11) NOT NULL,
  PRIMARY KEY (`ID_BONC`,`ID_A`),
  KEY `ID_A` (`ID_A`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contenir_bon`
--

INSERT INTO `contenir_bon` (`ID_BONC`, `ID_A`, `QTE_BON`) VALUES
(9, 26, 20),
(11, 21, 20),
(11, 22, 1),
(12, 21, 1),
(12, 22, 10),
(12, 23, 100);

-- --------------------------------------------------------

--
-- Table structure for table `contenir_bon_l`
--

DROP TABLE IF EXISTS `contenir_bon_l`;
CREATE TABLE IF NOT EXISTS `contenir_bon_l` (
  `ID_BONL` int(11) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `QTE_BON_L` int(11) DEFAULT NULL,
  `PRIX_A` float NOT NULL,
  PRIMARY KEY (`ID_BONL`,`ID_A`),
  KEY `ID_A` (`ID_A`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contenir_bon_l`
--

INSERT INTO `contenir_bon_l` (`ID_BONL`, `ID_A`, `QTE_BON_L`, `PRIX_A`) VALUES
(3, 21, 20, 4000),
(3, 22, 1, 160),
(10, 26, 20, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `contenir_co`
--

DROP TABLE IF EXISTS `contenir_co`;
CREATE TABLE IF NOT EXISTS `contenir_co` (
  `ID_A` int(11) NOT NULL,
  `ID_CO` int(11) NOT NULL,
  `QTE_CO` int(11) NOT NULL,
  PRIMARY KEY (`ID_A`,`ID_CO`),
  KEY `ID_CO` (`ID_CO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contenir_co`
--

INSERT INTO `contenir_co` (`ID_A`, `ID_CO`, `QTE_CO`) VALUES
(19, 1, 52),
(21, 1, 1),
(22, 1, 10),
(22, 4, 323),
(23, 1, 10),
(23, 3, 100),
(24, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `ID_FA` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_FA` date NOT NULL,
  `REF_FACT` varchar(30) NOT NULL,
  `DATE_ECHE` date NOT NULL,
  `ID_CO` int(11) NOT NULL,
  `REGLER` varchar(3) NOT NULL,
  PRIMARY KEY (`ID_FA`),
  KEY `ID_CO` (`ID_CO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`ID_FA`, `DATE_FA`, `REF_FACT`, `DATE_ECHE`, `ID_CO`, `REGLER`) VALUES
(1, '2014-06-04', 'AAAAA', '2014-06-14', 1, 'NON'),
(5, '2014-06-06', 'Netoyage3321', '2014-06-16', 3, 'NON'),
(7, '2014-06-07', 'PRO HP 5', '2014-06-17', 2, 'NON'),
(8, '2014-06-08', 'nnnn', '2014-06-18', 4, 'NON');

-- --------------------------------------------------------

--
-- Table structure for table `fournir`
--

DROP TABLE IF EXISTS `fournir`;
CREATE TABLE IF NOT EXISTS `fournir` (
  `ID_A` int(11) NOT NULL,
  `ID_F` int(11) NOT NULL,
  PRIMARY KEY (`ID_A`,`ID_F`),
  KEY `ID_F` (`ID_F`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournir`
--

INSERT INTO `fournir` (`ID_A`, `ID_F`) VALUES
(24, 1),
(27, 1),
(27, 2),
(19, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 5),
(26, 8);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `ID_F` int(11) NOT NULL AUTO_INCREMENT,
  `RAISSOCF` varchar(30) NOT NULL,
  `ADRESSE_F` text NOT NULL,
  `TEL_F` varchar(10) NOT NULL,
  `FAX_F` varchar(10) NOT NULL,
  `EMAIL_F` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_F`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`ID_F`, `RAISSOCF`, `ADRESSE_F`, `TEL_F`, `FAX_F`, `EMAIL_F`) VALUES
(1, 'GLOBAL PAPIER', 'CASABLANCA maarif', '0661930203', '0661930201', 'PAPIER@HOTMAIL.FR'),
(2, 'IDRISSI SALAH', 'RABAT', '0661729303', '0661729304', 'SALAH@GMAIL.COM'),
(4, 'KING BUREAU', 'RABAT HAY A RIAD', '0537256487', '0537256484', 'KINGBUREAU@HOTMAIL.COM'),
(5, 'C.B.Ina', 'el jadida el malah MAROC', '060000000', '0667545851', 'CBI@gmail.com'),
(8, 'MANCOUR BILLAH IDRISS', 'CASABLANCA JILLALI EL OUFIR ETG 1 APPT 1 MAROC', '0661849974', '0561849974', 'DRISS@GMAIL.COM'),
(11, 'RESTAURANT MANIA', 'AGDAL 5, MAMOUNIA RABAT', '0522648456', '0522648458', 'MANIA@MANIA.fr');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `ID_LIV` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CO` int(11) NOT NULL,
  `DATE_LIV` date NOT NULL,
  `LIV_REF` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_LIV`),
  KEY `ID_CO` (`ID_CO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`ID_LIV`, `ID_CO`, `DATE_LIV`, `LIV_REF`) VALUES
(6, 3, '2014-06-02', 'NETOYAGE324'),
(10, 1, '2014-06-22', 'bbb'),
(11, 4, '2014-06-22', 'nnnnn'),
(12, 2, '2014-06-22', 'gggg');

-- --------------------------------------------------------

--
-- Table structure for table `livraison_bon`
--

DROP TABLE IF EXISTS `livraison_bon`;
CREATE TABLE IF NOT EXISTS `livraison_bon` (
  `ID_BONL` int(11) NOT NULL AUTO_INCREMENT,
  `REF_LIV` varchar(30) NOT NULL,
  `SOLDE` varchar(3) NOT NULL DEFAULT 'NON',
  `ID_BONC` int(11) NOT NULL,
  `DATE_BONL` date NOT NULL,
  PRIMARY KEY (`ID_BONL`),
  KEY `ID_BONC` (`ID_BONC`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison_bon`
--

INSERT INTO `livraison_bon` (`ID_BONL`, `REF_LIV`, `SOLDE`, `ID_BONC`, `DATE_BONL`) VALUES
(3, 'AAAA', 'OUI', 11, '2014-06-09'),
(10, 'PC laptop', 'OUI', 9, '2014-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `LOGIN` varchar(30) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(30) NOT NULL,
  `DATENAIS` date NOT NULL,
  `SEXE` varchar(2) NOT NULL,
  `SERVICE` varchar(30) NOT NULL,
  `ADRESSE` text NOT NULL,
  `TEL1` varchar(10) NOT NULL,
  `PW` varchar(30) NOT NULL,
  PRIMARY KEY (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`LOGIN`, `NOM`, `PRENOM`, `DATENAIS`, `SEXE`, `SERVICE`, `ADRESSE`, `TEL1`, `PW`) VALUES
('ANAS', 'Benchekroune', 'ANAS', '1976-01-01', 'M', 'EMPLOYE', '7 RUE MABELLA RABAT MAROC', '0600000000', 'DRISSBOUCHRA'),
('BOUBKER', 'EL GHAZWANI', 'BOUBKER', '1979-03-10', 'M', 'EMPLOYE', 'EL JADIDA', '0255455889', 'DRISSBOUCHRA'),
('BOUCHRA', 'MAOUHEB', 'BOUCHRA', '1992-05-12', 'F', 'ADMINISTRATION', 'YAACOUB EL MANSOUR IKAMAT A SABH ILO AGADIR ', '0661414376', 'DRISSBOUCHRA'),
('DRISS', 'MANCOUR-BILLAH', 'IDRISS', '1991-09-02', 'M', 'ADMINISTRATION', '5 RUE HAJ JILLAI EL OUFIR ETG 1 APPT 1 YAACOUB EL MANSOUR CASABLANCA MAROC', '0661849974', 'DRISSBOUCHRA'),
('FZ', 'Mancour Billah', 'Fatima zahra', '1982-07-29', 'F', 'ADMINISTRATION', '5 RUE HAJ JILLALI EL OUFIR ETG 1 APPT 1 CASABLANCA MAROC', '0661414376', 'DRISSBOUCHRA'),
('JAMILA', 'LAROUSSI', 'JAMILA', '2014-04-30', 'F', 'ADMINISTRATION', 'RABAT MAROC', '0537665646', 'DRS'),
('MEHDI', 'AGOUZAL', 'MEHDI', '1975-01-30', 'M', 'EMPLOYE', 'EL JADIDA', '0565458755', 'DRISSBOUCHRA'),
('sadik', 'El ghazouani', 'sadik', '1987-09-02', 'M', 'ADMINISTRATION', 'El jadida hassan 2 ', '0654555245', 'drissbouchra'),
('ZAHIA', 'LARROUSSI', 'ZAHIA', '1981-03-05', 'F', 'ADMINISTRATION', '5 RUE HAJ JILLALI EL OUFIR CASABLANCA MAROC', '0663346677', 'DRISSBOUCHRA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bon_com`
--
ALTER TABLE `bon_com`
  ADD CONSTRAINT `bon_com_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `utilisateur` (`LOGIN`),
  ADD CONSTRAINT `bon_com_ibfk_2` FOREIGN KEY (`ID_F`) REFERENCES `fournisseur` (`ID_F`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`LOGIN`) REFERENCES `utilisateur` (`LOGIN`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`ID_C`) REFERENCES `client` (`ID_C`);

--
-- Constraints for table `contenir_bon`
--
ALTER TABLE `contenir_bon`
  ADD CONSTRAINT `contenir_bon_ibfk_1` FOREIGN KEY (`ID_BONC`) REFERENCES `bon_com` (`ID_BONC`),
  ADD CONSTRAINT `contenir_bon_ibfk_2` FOREIGN KEY (`ID_A`) REFERENCES `article` (`ID_A`);

--
-- Constraints for table `contenir_bon_l`
--
ALTER TABLE `contenir_bon_l`
  ADD CONSTRAINT `contenir_bon_l_ibfk_1` FOREIGN KEY (`ID_BONL`) REFERENCES `livraison_bon` (`ID_BONL`),
  ADD CONSTRAINT `contenir_bon_l_ibfk_2` FOREIGN KEY (`ID_A`) REFERENCES `article` (`ID_A`);

--
-- Constraints for table `contenir_co`
--
ALTER TABLE `contenir_co`
  ADD CONSTRAINT `contenir_co_ibfk_1` FOREIGN KEY (`ID_A`) REFERENCES `article` (`ID_A`),
  ADD CONSTRAINT `contenir_co_ibfk_2` FOREIGN KEY (`ID_CO`) REFERENCES `commande` (`ID_CO`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`ID_CO`) REFERENCES `commande` (`ID_CO`);

--
-- Constraints for table `fournir`
--
ALTER TABLE `fournir`
  ADD CONSTRAINT `fournir_ibfk_1` FOREIGN KEY (`ID_A`) REFERENCES `article` (`ID_A`),
  ADD CONSTRAINT `fournir_ibfk_2` FOREIGN KEY (`ID_F`) REFERENCES `fournisseur` (`ID_F`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`ID_CO`) REFERENCES `commande` (`ID_CO`);

--
-- Constraints for table `livraison_bon`
--
ALTER TABLE `livraison_bon`
  ADD CONSTRAINT `livraison_bon_ibfk_1` FOREIGN KEY (`ID_BONC`) REFERENCES `contenir_bon` (`ID_BONC`);
--
-- Database: `reservation_hoteliere`
--
CREATE DATABASE IF NOT EXISTS `reservation_hoteliere` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `reservation_hoteliere`;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `libelle_cat` int(11) NOT NULL,
  PRIMARY KEY (`libelle_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`libelle_cat`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `code_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `capacite` int(11) NOT NULL,
  PRIMARY KEY (`code_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`code_chambre`, `capacite`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `code_reservation` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `code_reservation` (`code_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`numero`, `code_reservation`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
(1, 1, 'fozeu', 'kessel', 'pk9', 696185680);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `idhotel` int(11) NOT NULL,
  `libelle_cat` int(11) NOT NULL,
  `libelle_hotel` text NOT NULL,
  PRIMARY KEY (`idhotel`),
  KEY `libelle_cat` (`libelle_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`idhotel`, `libelle_cat`, `libelle_hotel`) VALUES
(2131, 1, 'palace');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `code_reservation` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `limite_client` int(11) NOT NULL,
  PRIMARY KEY (`code_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`code_reservation`, `date_debut`, `date_fin`, `limite_client`) VALUES
(1, '2021-02-09', '2021-02-19', 200);

-- --------------------------------------------------------

--
-- Table structure for table `sejour`
--

DROP TABLE IF EXISTS `sejour`;
CREATE TABLE IF NOT EXISTS `sejour` (
  `code_sejour` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`code_sejour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sejour`
--

INSERT INTO `sejour` (`code_sejour`, `date_debut`, `date_fin`) VALUES
(1, '2021-02-02', '2021-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `standing`
--

DROP TABLE IF EXISTS `standing`;
CREATE TABLE IF NOT EXISTS `standing` (
  `id_standing` int(11) NOT NULL,
  `code_chambre` int(11) NOT NULL,
  PRIMARY KEY (`id_standing`),
  KEY `code_chambre` (`code_chambre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `standing`
--

INSERT INTO `standing` (`id_standing`, `code_chambre`) VALUES
(12, 1);
--
-- Database: `scolarite`
--
CREATE DATABASE IF NOT EXISTS `scolarite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `scolarite`;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`code`, `nom`, `email`, `photo`) VALUES
(1, 'BRYAN L', 'kesselfozeu@gmail.com', 'download.jpg');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `fournisseur` text NOT NULL,
  `pannes` int(11) NOT NULL,
  `dates` date NOT NULL,
  UNIQUE KEY `pannes` (`pannes`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`fournisseur`, `pannes`, `dates`) VALUES
('', 50, '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
