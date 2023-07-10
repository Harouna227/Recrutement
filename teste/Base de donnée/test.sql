-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 10 juil. 2023 à 16:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
--

DROP TABLE IF EXISTS `collaborateurs`;
CREATE TABLE IF NOT EXISTS `collaborateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `poste` varchar(25) NOT NULL,
  `departement_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departement_id` (`departement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `collaborateurs`
--

INSERT INTO `collaborateurs` (`id`, `nom`, `prenom`, `poste`, `departement_id`) VALUES
(1, 'Djibo', 'Salou', 'RH', 2),
(2, 'Djibo', 'Salou', 'RH', 3),
(3, 'Salou', 'Djibo', 'RH', 2);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `libelle`) VALUES
(3, 'Zone'),
(2, 'GRH');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `commentaires` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `libelle`, `commentaires`) VALUES
(3, 'Gestions', 'On va essayer'),
(2, 'GRH', 'On va essayer le matin');

-- --------------------------------------------------------

--
-- Structure de la table `tache_collaborateur`
--

DROP TABLE IF EXISTS `tache_collaborateur`;
CREATE TABLE IF NOT EXISTS `tache_collaborateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tache_id` int NOT NULL,
  `collaborateur_id` int NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `nombre_heure` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tache_id` (`tache_id`),
  KEY `collaborateur_id` (`collaborateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tache_collaborateur`
--

INSERT INTO `tache_collaborateur` (`id`, `tache_id`, `collaborateur_id`, `date_debut`, `date_fin`, `nombre_heure`) VALUES
(8, 3, 1, '2023-07-10 15:00:00', '2023-07-10 17:30:00', 2.3),
(2, 3, 1, '2023-07-10 15:22:00', '2023-07-12 18:23:00', 0),
(3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(4, 3, 3, '2023-07-10 15:40:00', '2023-07-07 15:39:00', 2.5),
(5, 3, 1, '2020-04-09 15:47:00', '2023-08-11 15:47:00', 0),
(6, 3, 1, '2023-07-10 15:54:00', '2023-08-12 18:56:00', 795.2),
(7, 3, 1, '2023-07-10 18:00:00', '2023-07-10 19:00:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
