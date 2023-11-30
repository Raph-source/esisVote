-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 nov. 2023 à 20:22
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jevote`
--

-- --------------------------------------------------------

--
-- Structure de la table `bureauetudiant`
--

CREATE TABLE `bureauetudiant` (
  `id` int(11) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bureauetudiant`
--

INSERT INTO `bureauetudiant` (`id`, `mdp`, `pseudo`) VALUES
(1, '1234', 'bureauEtutiant');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `idcandidature` int(11) NOT NULL,
  `idetudiant` int(11) NOT NULL,
  `idpromotion` int(11) NOT NULL,
  `idresultat` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `projet` varchar(500) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `typeCandidature` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `coordination`
--

CREATE TABLE `coordination` (
  `id` int(11) NOT NULL,
  `idPromotion` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coordination`
--

INSERT INTO `coordination` (`id`, `idPromotion`, `matricule`, `pwd`) VALUES
(27, 1, 'coord L1', 'coord L1'),
(28, 2, 'coord L2A', 'coord L2A'),
(29, 3, 'coord L2B', 'coord L2B'),
(30, 4, 'coord L3 MSI', 'coord L3 MSI'),
(31, 5, 'coord L3 GL', 'coord L3 GL'),
(32, 6, 'coord L3 DSG', 'coord L3 DSG'),
(33, 7, 'coord L3 AS', 'coord L3 AS'),
(34, 8, 'coord L3 TLC', 'coord L3 TLC'),
(35, 9, 'coord L4 MSI', 'coord L4 MSI'),
(36, 10, 'coord L4 GL', 'coord L4 GL'),
(37, 11, 'coord L4 DSG', 'coord L4 DSG'),
(38, 12, 'coord L4 AS', 'coord L4 AS'),
(39, 13, 'coord L4 TLC', 'coord L4 TLC');

-- --------------------------------------------------------

--
-- Structure de la table `election`
--

CREATE TABLE `election` (
  `id` int(11) NOT NULL,
  `dateFinVote` datetime NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `idBureauEtudiant` int(11) DEFAULT NULL,
  `idCoordination` int(11) DEFAULT NULL,
  `dateDebutVote` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `election`
--

INSERT INTO `election` (`id`, `dateFinVote`, `date_debut`, `date_fin`, `idBureauEtudiant`, `idCoordination`, `dateDebutVote`) VALUES
(37, '2023-11-30 23:08:00', '2023-11-29 12:04:00', '2023-11-29 12:04:00', NULL, 28, '2023-11-30'),
(38, '2023-12-29 22:07:00', '2023-11-27 22:06:00', '2023-11-28 16:06:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idetudiant` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `post_nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `confession` varchar(30) NOT NULL,
  `pourcentage` float NOT NULL,
  `idpromotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `nom`, `post_nom`, `prenom`, `matricule`, `mdp`, `confession`, `pourcentage`, `idpromotion`) VALUES
(1, 'kabamba', 'ngombe', 'daphne', '19kn077', '1234', 'catholique', 70, 2),
(2, 'mwanza', 'kazembe', 'rose', '19mk092', '1345', 'catholique', 60, 2),
(3, 'mbuya', 'lona', 'hope', '17ml093', '1445', 'catholique', 60, 1),
(4, 'kabamba', 'yuka', 'bob', '19ky088', '1346', 'catholique', 61, 1),
(5, 'lenge', 'kabamba', 'lina', '17lm432', '3452', 'catholique', 60, 2),
(6, 'maloba', 'lobe', 'rose', '18ml003', '0000', 'protestante', 55, 1),
(7, 'nkulu', 'wa nkulu', 'ben', '19nw098', '1111', 'protestante', 60, 1),
(8, 'mbombo', 'mutamba', 'lina', '16mm123', '1011', 'protestante', 65, 1),
(9, 'mwamba', 'ngoie', 'orlin', '19mn343', '1110', 'protestante', 60, 1),
(10, 'ngombe', 'kanyane', 'nada', '19nw082', '1111', 'musulmane', 75, 1),
(11, 'lupungu', 'mutombo', 'alpha', '18lm077', '1234', 'catholique', 70, 1),
(12, 'mande', 'lona', 'sephora', '18ml092', '1345', 'catholique', 60, 2),
(13, 'mande', 'kabongo', 'jessica', '18mk093', '1445', 'catholique', 60, 2),
(14, 'kabong', 'yuke', 'belle', '18ky088', '1346', 'catholique', 61, 2),
(15, 'luta', 'mambo', 'josephine', '18lm432', '3452', 'catholique', 60, 2),
(16, 'kaseba', ' kaseba', 'godfre', '18kk003', '0000', 'protestante', 55, 2),
(17, 'numbi', 'wa nkulu', 'kerene', '18nw098', '1111', 'protestante', 60, 2),
(18, 'maleng', 'mutomba', 'luc', '16mm123', '1011', 'protestante', 65, 2),
(19, 'mwamba', 'ilunga', 'orline', '19ml343', '1110', 'musulmane', 60, 2),
(20, 'nangoie', ' nama', 'godlive', '18nn082', '1111', 'musulmane', 75, 2),
(21, 'lupungu', 'mutombo', 'alpha', '17lm077', '1234', 'catholique', 70, 13),
(22, 'mande', 'lona', 'sephora', '17ml092', '1345', 'catholique', 60, 13),
(23, 'mande', 'kabongo', 'jessica', '17mk093', '1445', 'catholique', 60, 13),
(24, 'kabong', 'yuke', 'belle', '17ky088', '1346', 'catholique', 61, 13),
(25, 'luta', 'mambo', 'josephine', '17lm432', '3452', 'catholique', 60, 13),
(26, 'kabolela', ' kyoni', 'parfait', '16kk003', '0000', 'protestante', 55, 13),
(27, 'numbi', 'wa nkulu', 'kerene', '16nw098', '1111', 'protestante', 60, 13),
(28, 'maleng', 'mutomba', 'luc', '17mm123', '1011', 'protestante', 65, 13),
(29, 'mwamba', 'ilunga', 'orline', '17ml343', '1110', 'musulmane', 60, 13),
(30, 'nangoie', ' nama', 'godlive', '17nn082', '1111', 'musulmane', 75, 13),
(31, 'lupungu', 'mutombo', 'alpha', '15lm077', '1234', 'catholique', 70, 12),
(32, 'mande', 'lona', 'sephora', '15ml092', '1345', 'catholique', 60, 12),
(33, 'mande', 'kabongo', 'jessica', '15mk093', '1445', 'catholique', 60, 12),
(34, 'kabong', 'yuke', 'belle', '15ky088', '1346', 'catholique', 61, 12),
(35, 'luta', 'mambo', 'josephine', '15lm432', '3452', 'catholique', 60, 12),
(36, 'kabolela', ' kyoni', 'parfait', '15kk003', '0000', 'protestante', 55, 12),
(37, 'numbi', 'wa nkulu', 'kerene', '15nw098', '1111', 'protestante', 60, 12),
(38, 'maleng', 'mutomba', 'luc', '15mm123', '1011', 'protestante', 65, 12),
(39, 'mwamba', 'ilunga', 'orline', '15ml343', '1110', 'musulmane', 60, 12),
(40, 'nangoie', ' nama', 'godlive', '15nn082', '1111', 'musulmane', 75, 12),
(41, 'kaseba', 'kaseba', 'godfre', '14kk077', '1234', 'catholique', 70, 3),
(42, 'kazembe', 'meki', 'ray', '14km092', '1345', 'catholique', 60, 3),
(43, 'munama', 'katondo', 'jule', '14mk093', '1445', 'catholique', 60, 3),
(44, 'kianda', 'mulopwe', 'yve', '14ky088', '1346', 'catholique', 61, 3),
(45, 'bope', 'muluba', 'gloire', '14bm432', '3452', 'catholique', 60, 3),
(46, 'kyala', ' kyone', 'patrick', '14kk003', '0000', 'protestante', 55, 3),
(47, 'numbi', 'wa nkulu', 'kerene', '14nw098', '1111', 'protestante', 60, 3),
(48, 'maleng', 'mutomba', 'luc', '14mm123', '1011', 'protestante', 65, 3),
(49, 'mutombo', 'ilunga', 'serge', '14ml343', '1110', 'musulmane', 60, 3),
(50, 'nangoie', ' nama', 'godlive', '14nn082', '1111', 'musulmane', 75, 3),
(51, 'kaseba', 'kaseba', 'godfre', '14kk077', '1234', 'catholique', 70, 11),
(52, 'kazembe', 'meki', 'ray', '14km092', '1345', 'catholique', 60, 11),
(53, 'munama', 'katondo', 'jule', '14mk093', '1445', 'catholique', 60, 11),
(54, 'kianda', 'mulopwe', 'yve', '14ky088', '1346', 'catholique', 61, 11),
(55, 'bope', 'muluba', 'gloire', '14bm432', '3452', 'catholique', 60, 11),
(56, 'kyala', ' kyone', 'patrick', '14kk003', '0000', 'protestante', 55, 11),
(57, 'numbi', 'wa nkulu', 'kerene', '14nw098', '1111', 'protestante', 60, 11),
(58, 'maleng', 'mutomba', 'luc', '14mm123', '1011', 'protestante', 65, 11),
(59, 'mutombo', 'ilunga', 'serge', '14ml343', '1110', 'musulmane', 60, 11),
(60, 'nangoie', ' nama', 'godlive', '14nn082', '1111', 'musulmane', 75, 11),
(61, 'milambo', 'numbi', 'elvis', '22mn077', '1234', 'catholique', 70, 4),
(62, 'kamoj', 'mulund', 'sam', '22km092', '1345', 'catholique', 60, 4),
(63, 'mantami', 'kalenga', 'junior', '22mk093', '1445', 'catholique', 60, 4),
(64, 'kilambe', 'mapemba', 'blandine', '22ky088', '1346', 'catholique', 61, 4),
(65, 'bitota', 'lenge', 'gracia', '22bl432', '3452', 'catholique', 60, 4),
(66, 'kala', ' koni', 'patrick', '22kk003', '0000', 'protestante', 55, 4),
(67, 'numbi', ' nkulu', 'pascal', '22nw098', '1111', 'protestante', 60, 4),
(68, 'maleng', 'mutomba', 'luc', '21mm123', '1011', 'protestante', 65, 4),
(69, 'koj', 'ilunga', 'serge', '21ki343', '1110', 'musulmane', 60, 4),
(70, 'nangoie', ' nama', 'godlive', '21nn082', '1111', 'musulmane', 75, 4),
(71, 'kaseba', 'kaseba', 'godfre', '14kk077', '1234', 'catholique', 70, 10),
(72, 'kazembe', 'meki', 'ray', '14km092', '1345', 'catholique', 60, 10),
(73, 'munama', 'katondo', 'jule', '14mk093', '1445', 'catholique', 60, 10),
(74, 'kianda', 'mulopwe', 'yve', '14ky088', '1346', 'catholique', 61, 10),
(75, 'bope', 'muluba', 'gloire', '14bm432', '3452', 'catholique', 60, 10),
(76, 'kyala', ' kyone', 'patrick', '14kk003', '0000', 'protestante', 55, 10),
(77, 'numbi', 'wa nkulu', 'kerene', '14nw098', '1111', 'protestante', 60, 10),
(78, 'maleng', 'mutomba', 'luc', '14mm123', '1011', 'protestante', 65, 10),
(79, 'mutombo', 'ilunga', 'serge', '14ml343', '1110', 'musulmane', 60, 10),
(80, 'nangoie', ' nama', 'godlive', '14nn082', '1111', 'musulmane', 75, 10),
(81, 'kamwanga', 'kamwanga', 'drey', '23kk077', '1234', 'catholique', 70, 5),
(82, 'akani', 'meki', 'ray', '23am092', '1345', 'catholique', 50, 5),
(83, 'mutombo', 'kato', 'franck', '23mk093', '1445', 'catholique', 60, 5),
(84, 'ianda', 'lopwe', 'marie', '23il088', '1346', 'catholique', 61, 5),
(85, 'yano', 'muluba', 'blaise', '23ym432', '3452', 'catholique', 52, 5),
(86, 'kyala', ' kyone', 'or', '14kk003', '0000', 'protestante', 55, 5),
(87, 'numbi', 'wa nkulu', 'barthelemie', '22nw098', '1111', 'protestante', 73, 5),
(88, 'maleng', 'mutomba', 'luc', '23mm123', '1011', 'protestante', 65, 5),
(89, 'mutombo', 'ilunga', 'solange', '23ml343', '1110', 'musulmane', 64, 5),
(90, 'nangoie', ' nama', 'live', '23nn082', '1111', 'musulmane', 75, 5),
(91, 'kamwanga', 'kamwanga', 'drey', '20kk077', '1234', 'catholique', 70, 6),
(92, 'lona', 'meki', 'rayon', '20lm092', '1345', 'catholique', 50, 6),
(93, 'mutambo', 'kalonga', 'france', '20mk093', '1445', 'catholique', 60, 6),
(94, 'ianda', 'lopwe', 'marie', '20il088', '1346', 'catholique', 61, 6),
(95, 'yano', 'muluba', 'blaise', '20ym432', '3452', 'catholique', 52, 6),
(96, 'kala', ' kone', 'josh', '20kk003', '0000', 'protestante', 55, 6),
(97, 'numbi', 'wake', 'Louisa', '22nw098', '1111', 'protestante', 73, 6),
(98, 'mutanda', 'mutomba', 'herbert', '23mm123', '1011', 'protestante', 65, 6),
(99, 'monga', 'ilunga', 'sola', '18ml343', '1110', 'musulmane', 64, 6),
(100, 'nangoie', ' nama', 'narcisse', '20nn082', '1111', 'musulmane', 75, 6),
(101, 'kamwanga', 'mayanga', 'audrey', '21kk077', '1234', 'catholique', 70, 9),
(102, 'lona', 'lioni', 'rayon', '21ll092', '1345', 'catholique', 50, 9),
(103, 'tambo', 'kalonga', 'fiston', '21tk093', '1445', 'catholique', 60, 9),
(104, 'kamanda', 'lope', 'mars', '15kl088', '1346', 'catholique', 61, 9),
(105, 'yono', 'muba', 'blaise', '15ym432', '3452', 'catholique', 52, 9),
(106, 'kala', ' kone', 'josh', '20kk003', '0000', 'protestante', 55, 9),
(107, 'umbi', 'umbi', 'Louisa', '21uu098', '1111', 'protestante', 73, 9),
(108, 'tanda', 'mutomba', 'herbest', '21mm123', '1011', 'protestante', 65, 9),
(109, 'monga', 'kalunga', 'soleil', '18mk343', '1110', 'musulmane', 64, 9),
(110, 'nangoie', ' kaj', 'nani', '20nk082', '1111', 'musulmane', 75, 9),
(111, 'kamwang', 'mayang', 'arc', '21kk077', '1234', 'catholique', 70, 8),
(112, 'bona', 'lioni', 'steve', '21bl092', '1345', 'catholique', 50, 8),
(113, 'ambo', 'longa', 'fiston', '21al093', '1445', 'catholique', 60, 8),
(114, 'manda', 'franc', 'franc', '15mf088', '1346', 'catholique', 61, 8),
(115, 'yono', 'muba', 'blaise', '15ym432', '3452', 'catholique', 52, 8),
(116, 'kala', ' kone', 'josh', '20kk003', '0000', 'protestante', 55, 8),
(117, 'tumbi', 'umba', 'Lou', '21tu098', '1111', 'protestante', 73, 8),
(118, 'tanda', 'mutombwe', 'nine', '21mm123', '1011', 'protestante', 65, 8),
(119, 'momonga', 'kaunga', 'soleil', '18mk343', '1110', 'musulmane', 64, 8),
(120, 'ngoie', ' kaj', 'bijoux', '20nk082', '1111', 'musulmane', 75, 8),
(121, 'mwanga', 'mayanga', 'larry', '21mm077', '1234', 'catholique', 70, 7),
(122, 'kashama', 'lioni', 'green', '21kl092', '1345', 'catholique', 50, 7),
(123, 'ambo', 'kalong', 'genovic', '21ak093', '1445', 'catholique', 60, 7),
(124, 'kamonda', 'blaise', 'mars', '15kb088', '1346', 'catholique', 61, 7),
(125, 'yav', 'yumba', 'louange', '15yy432', '3452', 'catholique', 52, 7),
(126, 'kalanga', ' kone', 'jesh', '20kk003', '0000', 'protestante', 55, 7),
(127, 'ntumba', 'umbi', 'Laura', '21nu098', '1111', 'protestante', 73, 7),
(128, 'mutanda', 'mumba', 'herle', '21mm123', '1011', 'protestante', 65, 7),
(129, 'bonga', 'kalunga', 'prince', '18bk343', '1110', 'musulmane', 64, 7),
(130, 'ngoie', ' kaja', 'mike', '20nk082', '1111', 'musulmane', 75, 7);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `idpromotion` int(11) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `resultatPublier` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`idpromotion`, `filiere`, `resultatPublier`) VALUES
(1, 'L1', 0),
(2, 'L2A', 0),
(3, 'L2B', 0),
(4, 'L3 Management de  système d\'information', 0),
(5, 'L3 Génie logiciel ', 0),
(6, 'L3 Design', 0),
(7, 'L3 Administration  système ', 0),
(8, 'L3 Télécommunication', 0),
(9, 'L4 Management de  système d\'information', 0),
(10, 'L4 Génie logiciel ', 0),
(11, 'L4 Design', 0),
(12, 'L4 Administration  système', 0),
(13, 'L4 Télécommunication', 0);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `idresultat` int(11) NOT NULL,
  `idcandidature` int(11) NOT NULL,
  `nombreVoix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `idCandidature` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bureauetudiant`
--
ALTER TABLE `bureauetudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`idcandidature`),
  ADD KEY `idpromotion` (`idpromotion`),
  ADD KEY `idetudiant` (`idetudiant`);

--
-- Index pour la table `coordination`
--
ALTER TABLE `coordination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPromotion` (`idPromotion`);

--
-- Index pour la table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBureauEtudiant` (`idBureauEtudiant`),
  ADD KEY `idCoordination` (`idCoordination`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetudiant`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idpromotion`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`idresultat`),
  ADD KEY `idcandidature` (`idcandidature`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEtudiant` (`idEtudiant`),
  ADD KEY `idCandidature` (`idCandidature`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bureauetudiant`
--
ALTER TABLE `bureauetudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `idcandidature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `coordination`
--
ALTER TABLE `coordination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `election`
--
ALTER TABLE `election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idetudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idpromotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `idresultat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`idpromotion`) REFERENCES `promotion` (`idpromotion`),
  ADD CONSTRAINT `candidat_ibfk_2` FOREIGN KEY (`idetudiant`) REFERENCES `etudiant` (`idetudiant`);

--
-- Contraintes pour la table `coordination`
--
ALTER TABLE `coordination`
  ADD CONSTRAINT `coordination_ibfk_1` FOREIGN KEY (`idPromotion`) REFERENCES `promotion` (`idpromotion`);

--
-- Contraintes pour la table `election`
--
ALTER TABLE `election`
  ADD CONSTRAINT `election_ibfk_1` FOREIGN KEY (`idBureauEtudiant`) REFERENCES `bureauetudiant` (`id`),
  ADD CONSTRAINT `election_ibfk_2` FOREIGN KEY (`idCoordination`) REFERENCES `coordination` (`id`);

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`idcandidature`) REFERENCES `candidat` (`idcandidature`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idetudiant`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`idCandidature`) REFERENCES `candidat` (`idcandidature`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
