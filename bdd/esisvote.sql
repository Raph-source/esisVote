-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 24 déc. 2023 à 11:36
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esisvote`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `idEtudiant` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `projet` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coordination`
--

CREATE TABLE `coordination` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `coordination`
--

INSERT INTO `coordination` (`id`, `pseudo`, `mdp`) VALUES
(1, 'L1', '1234'),
(2, 'L2', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `debutCandidature` datetime DEFAULT NULL,
  `finCandidature` datetime DEFAULT NULL,
  `debutVote` datetime DEFAULT NULL,
  `finVote` datetime DEFAULT NULL,
  `idPromotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`id`, `debutCandidature`, `finCandidature`, `debutVote`, `finVote`, `idPromotion`) VALUES
(4, '2023-12-23 10:05:00', '2023-12-26 10:06:00', '2023-12-27 10:14:00', '2023-12-30 10:15:00', 1),
(5, '2023-12-23 10:19:00', '2023-12-26 10:19:00', '2023-12-27 10:20:00', '2023-12-30 10:20:00', 2),
(6, '2023-12-23 10:21:00', '2023-12-26 10:21:00', '2023-12-27 10:21:00', '2023-12-30 10:21:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `postNom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `matricule` varchar(10) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `idPromotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `postNom`, `prenom`, `matricule`, `mdp`, `idPromotion`) VALUES
(1, 'ilunga', 'kayembe', 'raph', '20ik061', '1234', 1),
(2, 'ilonga', 'mabgau', 'aggee', '20ik058', '1234', 1),
(3, 'kalanga', 'muwaya', 'jeanne', '20ik064', '1234', 1),
(4, 'kabila', 'wa kabila', 'blessing', '20ik055', '1234', 1),
(5, 'ali', 'abdoul', 'ali', '20ij054', '1234', 2),
(6, 'kalonda', 'gloria', 'gloria', '20kk053', '1234', 2),
(7, 'musele', 'dan', 'dan', '20ij053', '1234', 2),
(8, 'kalonda', 'kalonda', 'julie', '20kk153', '1234', 2),
(9, 'mukebo', 'kalasa', 'ruth', '22mk275', '1234', 3),
(10, 'mulumba', 'kabongo', 'dassaint', '20kk050', '1234', 3),
(11, 'kasongo', 'kasongo', 'dan', '22mk279', '1234', 3),
(12, 'mulumba', 'kabongo', 'ken', '20kk052', '1234', 3);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `resultatPublie` tinyint(1) DEFAULT NULL,
  `idCoordination` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `nom`, `resultatPublie`, `idCoordination`) VALUES
(1, 'L1', 0, 1),
(2, 'L2 A', 0, 2),
(3, 'L2 B', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `voix`
--

CREATE TABLE `voix` (
  `id` int(11) NOT NULL,
  `nombre` int(11) DEFAULT 0,
  `idCandidature` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `idCandidature` int(11) DEFAULT NULL,
  `idEtudiant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEtudiant` (`idEtudiant`);

--
-- Index pour la table `coordination`
--
ALTER TABLE `coordination`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPromotion` (`idPromotion`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPromotion` (`idPromotion`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCoordination` (`idCoordination`);

--
-- Index pour la table `voix`
--
ALTER TABLE `voix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCandidature` (`idCandidature`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCandidature` (`idCandidature`),
  ADD KEY `idEtudiant` (`idEtudiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coordination`
--
ALTER TABLE `coordination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `voix`
--
ALTER TABLE `voix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `date_ibfk_1` FOREIGN KEY (`idPromotion`) REFERENCES `promotion` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idPromotion`) REFERENCES `promotion` (`id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`idCoordination`) REFERENCES `coordination` (`id`);

--
-- Contraintes pour la table `voix`
--
ALTER TABLE `voix`
  ADD CONSTRAINT `voix_ibfk_1` FOREIGN KEY (`idCandidature`) REFERENCES `candidature` (`id`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`idCandidature`) REFERENCES `candidature` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
