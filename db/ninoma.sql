-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 mars 2023 à 02:11
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ninoma`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IDCAT` int(11) NOT NULL,
  `LIBELLECAT` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IDCAT`, `LIBELLECAT`) VALUES
(1, 'AGENT_ACCUEIL'),
(2, 'MEDECIN'),
(3, 'DIRECTEUR');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IDCL` int(11) NOT NULL,
  `PRENOMCL` varchar(32) NOT NULL,
  `NOMCL` varchar(32) NOT NULL,
  `NUMTELCL` varchar(32) NOT NULL,
  `ADRESSECL` varchar(32) NOT NULL,
  `DEPARTNAISSCL` int(11) NOT NULL,
  `PAYSNAISSCL` varchar(32) NOT NULL,
  `NSS` varchar(32) NOT NULL,
  `SOLDE` float DEFAULT 0,
  `DATENAISSCL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comprend`
--

CREATE TABLE `comprend` (
  `IDMO` int(11) NOT NULL,
  `IDCO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comprend`
--

INSERT INTO `comprend` (`IDMO`, `IDCO`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `consigne`
--

CREATE TABLE `consigne` (
  `IDCO` int(11) NOT NULL,
  `LIBELLECO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consigne`
--

INSERT INTO `consigne` (`IDCO`, `LIBELLECO`) VALUES
(1, 'Se laver à la Bétadine une heure avant'),
(2, 'Ne pas avoir mangé durant les 12 dernières heures');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `IDMO` int(11) NOT NULL,
  `IDPI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`IDMO`, `IDPI`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `IDMO` int(11) NOT NULL,
  `LIBELLEMO` varchar(32) NOT NULL,
  `PRIXMO` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`IDMO`, `LIBELLEMO`, `PRIXMO`) VALUES
(1, 'BIOPSIE', 100),
(2, 'CONSULTATION', 40);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `IDPERS` int(11) NOT NULL,
  `IDCAT` int(11) NOT NULL,
  `NOM` varchar(32) NOT NULL,
  `PRENOM` varchar(32) NOT NULL,
  `LOGIN` varchar(32) DEFAULT NULL,
  `MDP` varchar(32) DEFAULT NULL,
  `IDSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`IDPERS`, `IDCAT`, `NOM`, `PRENOM`, `LOGIN`, `MDP`, `IDSP`) VALUES
(2, 1, 'SINIKELY', 'Marion', 'marion.sinikely', 'marion.sinikely', NULL),
(3, 3, 'AZIMISEDGHI', 'Niki', 'niki.azimi', 'niki.azimi', NULL),
(4, 2, 'ELHOUDA', 'Nour', 'nour.elhouda', 'nour.elhouda', 1);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `IDPI` int(11) NOT NULL,
  `LIBELLEPI` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`IDPI`, `LIBELLEPI`) VALUES
(1, 'Carte vitale'),
(2, 'Ordonnance');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `IDRDV` int(11) NOT NULL,
  `IDCL` int(11) NOT NULL,
  `IDMO` int(11) NOT NULL,
  `IDPERS` int(11) NOT NULL,
  `DATERDV` datetime NOT NULL,
  `ETATRDV` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `IDSP` int(11) NOT NULL,
  `LIBELLESP` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`IDSP`, `LIBELLESP`) VALUES
(1, 'CARDIOLOGUE'),
(2, 'STOMATOLOGUE'),
(3, 'OPHTALMOLOGUE'),
(4, 'RADIOLOGUE');

-- --------------------------------------------------------

--
-- Structure de la table `tacheadmin`
--

CREATE TABLE `tacheadmin` (
  `IDTA` int(11) NOT NULL,
  `IDPERS` int(11) NOT NULL,
  `LIBELLETA` varchar(32) NOT NULL,
  `DATETA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IDCAT`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IDCL`);

--
-- Index pour la table `comprend`
--
ALTER TABLE `comprend`
  ADD KEY `I_FK_COMPREND_MOTIF` (`IDMO`),
  ADD KEY `I_FK_COMPREND_CONSIGNE` (`IDCO`);

--
-- Index pour la table `consigne`
--
ALTER TABLE `consigne`
  ADD PRIMARY KEY (`IDCO`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD KEY `I_FK_DEMANDE_MOTIF` (`IDMO`),
  ADD KEY `I_FK_DEMANDE_PIECE` (`IDPI`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`IDMO`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`IDPERS`),
  ADD KEY `I_FK_PERSONNEL_CATEGORIE` (`IDCAT`) USING BTREE,
  ADD KEY `I_FK_MEDECIN_SPECIALITE` (`IDSP`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`IDPI`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`IDRDV`),
  ADD KEY `I_FK_RDV_CL` (`IDCL`),
  ADD KEY `I_FK_RDV_MOTIF` (`IDMO`),
  ADD KEY `I_FK_RDV_MEDECIN` (`IDPERS`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`IDSP`);

--
-- Index pour la table `tacheadmin`
--
ALTER TABLE `tacheadmin`
  ADD PRIMARY KEY (`IDTA`),
  ADD KEY `IDTA` (`IDPERS`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IDCAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IDCL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `consigne`
--
ALTER TABLE `consigne`
  MODIFY `IDCO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `IDMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `IDMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `IDPERS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `IDPI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `IDRDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `IDSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tacheadmin`
--
ALTER TABLE `tacheadmin`
  MODIFY `IDTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
