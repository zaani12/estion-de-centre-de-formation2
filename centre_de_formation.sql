-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mai 2023 à 12:04
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `centre_de_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `Id_Apprenant` int(11) NOT NULL,
  `Nom` varchar(110) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant`
--

INSERT INTO `apprenant` (`Id_Apprenant`, `Nom`, `Prenom`, `Email`, `password`) VALUES
(1, 'arun', 'jakson', 'arun@gmail.com', '$2y$10$s9hrmyoI3VUmT8jtOX8dJuL8JgmWwRok8fbVNFCJ4nk'),
(2, 'rajesh', 'jony', 'rajesh@gmail.com', '$2y$10$xV.sR2HPAd2st.Apoq/Zg.7Du0vRzo7az7MbGm3YxYK'),
(3, 'moorthy', 'azart', 'moorthy@gmail.com', '$2y$10$xtOO9Fs1.lsZDlO3YSgfWuyPO84qYuaHNVpJpEPV6RZ'),
(4, 'raja', 'niki', 'raja@gmail.com', '$2y$10$1c7WixRFKwqcw3fOlhIjw.bqJ5IsrgiM9.SBpLiZJWX'),
(5, 'usha', 'kim', 'usha@gmail.com', '$2y$10$n6ENoFRQNSmRqQhSYaY4JOrU1FsEu6M3ag1xezPi6Cw'),
(6, 'priya', 'doja', 'priya@gmail.com', '$2y$10$JcGPh9H6uib1NDvj0a./J.6ld5DVXth6d03JSqekVJA'),
(7, 'Sundar', 'riana', 'Sundar@gmail.com', '$2y$10$bZWT2GCyfHQic6i3xgqTzuciCr6.OnbNsLGIqDi6fFx'),
(8, 'Kavitha', 'ariana', 'Kavitha@gmail.com', '$2y$10$UrrzTEi5/A/dDno6BvBfvO26SAoh9Za.OpuTN8dAHVR'),
(9, 'Dinesh', 'megan', 'Dinesh@gmail.com', '$2y$10$i1cgBS6MaeOj8WBu.nfKXOJoE8C.J4VOKGt2o7dmngA'),
(10, 'Hema', 'taylor', 'Dinesh@gmail.com', '$2y$10$Psm0iBwsJIGNJQMT05IncuzPeJruk4jVrF2I87Ldp32'),
(11, 'Gowri', 'selina', 'Gowri@gmail.com', '$2y$10$9Vk/6wDDLMLTsBXykQ5HJeTdvvpNSvpG/HQ6RYErslH'),
(12, 'Ram', 'zine', 'Ram@gmail.com', '$2y$10$PuUlrKmPIC0hZBIM9bTWOeGQsE9S/xDMPqlpNhatI6K'),
(13, 'Murugan', 'henry', 'Murugan@gmail.com', '$2y$10$t0vCp1DjAp7zNxlzpXRqIuxlV6YD0UzrTqf.4HRaouI'),
(14, 'Jenifer', 'dounia', 'Jenifer@gmail.com', '$2y$10$0DzkgoHGi/FtAPeMKB8oXetIDAugTFTqug1FbIeRe2I'),
(15, 'mamado', 'lini', 'mamado@gmail.com', '$2y$10$MGAGKoelU.LgUxqULtyIxeJ4uENkhzZO.z8D4QG0K/k'),
(16, 'kamila', 'lamo', 'kamila@gmail.com', '$2y$10$gzVXHrCJ0lOptXNNwBuqWuXssF/jSr2QmlyXa9VvRPg'),
(17, 'oranos', 'kaja', 'oranos@gmail.com', '$2y$10$LIj/EZ5wz37GiByAdAWuqO/BYp7voXAZvvWqa2HcYxr'),
(18, 'hicham', 'mapo', 'hicham@gmail.com', '$2y$10$8IzJuI/pBD0gBNSqM.yuwO/306viyb0BsNOAkuvOpTw'),
(19, 'yasin', 'ghirban', 'yasin@gmail.com', '$2y$10$CCqaFnnzNFhoSBtB.7phVO5iDa2t5T68u2.bTHfHha2'),
(20, 'chiha', 'malak', 'chiha@gmail.com', '$2y$10$GTLjYB0h8zS4AcG026YjuOOf3iRKSYRUFNLMtjoPQDp'),
(21, 'talib', 'mokbil', 'talib@gmail.com', '$2y$10$yDlH5A3cZkin28OCJLc4E.YB7vVLX37FKkpKDKDa6CH'),
(22, 'jamal', 'amokbil', 'jamal@gmail.com', '$2y$10$My2H3CP/aJV7n8/aXUEZT.ifgNp4UBwFeKR6PuhwPsV'),
(23, 'milodi', 'jasi', 'milodi@gmail.com', '$2y$10$UMjzFQRV3Hf.TjyZUmYC.OGgYnJ/XaBgZuWUdqkl/jv'),
(24, 'nano', 'one', 'milodi@gmail.com', '$2y$10$DU/rdoWItx1vrm3mtlrkTuzlbp0kRpgWlcIFFcfTYsp'),
(25, 'jamal', 'hamo', 'jamal@gmail.com', '$2y$10$nDHE1fJxVdEyCWomEl5MkON859FWJLCEx0rt4C5oBzT'),
(26, 'ploma', 'pija', 'ploma@gmail.com', '$2y$10$yv4YU2otk58eQ4lHyRCHcORgwKwmUfjZJms7Jb1ebhw'),
(27, 'tiji', 'malkom', 'tiji@gmail.com', '$2y$10$pGzBPmwijVNP/l97YiBJ1uQNGmSHKJu7pXVgSXpf7Qc'),
(28, 'naomi', 'pitis', 'naomi@gmail.com', '$2y$10$J/TvD73eD8pszI84i7pQ5.u7UmYq7/Q4adjCmXizb3d'),
(29, 'hamza', 'zaani', 'zaani.hamza.solllocode@gmail.com', '$2y$10$.bVUNOOP30lVc0.AkHRzguCLoAmdNpAgYJP9L8G2Fej'),
(30, 'hamza', 'zaani', 'zaani.hamza.soLLLLlocode@gmail.com', '$2y$10$fgmwM346jyHAovih4P8gmedjL5yv4a.t7uzd1xIogfeY851qTI4D.'),
(31, 'hamza', 'zaani', 'zaani.hamza@gmail.com', '$2y$10$QAiAuMG1yK3i50rLn.8rTenU1waMH2yivSD/JMCM8c5twLKTmyF8K');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `Id_Formateur` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `competences` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`Id_Formateur`, `Nom`, `Prenom`, `Email`, `competences`, `password`) VALUES
(1, 'anouar', 'ilias', 'ilias@gmail.com', 'Gestion', '$2y$10$CSYDTj0WsXRdGGfMehNcs.bRNGH1/kVrYiFUQtfKb62'),
(2, 'daifane', 'yasmine', 'yasmine@gmail.com', 'Self development', '$2y$10$TqKwHLnRnBX7sm.QbTYj8uJva6qdmDS9fZUekIesu9q'),
(3, 'buik', 'hussain', 'hussain@gmail.com', 'Sensibilisation', '$2y$10$UTPmh4AQKSCSQDbPIxGWseNUiOrmwvvt0zXg/E9bnLA'),
(4, 'buich', 'fatima zahra', 'fatima@gmail.com', 'Technologie', '$2y$10$ydPd47SWyyI95f0aRutvtuMsnJBUokE9NsHjyoyWogr'),
(5, 'el ghali', 'ikram', 'ikram@gmail.com', 'Self development', '$2y$10$VDyGTkj0sQyWpgz62/Bfxeq/12f6JLI0npCufgnOvQr');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `Id_formation` int(11) NOT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `massHoraire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`Id_formation`, `sujet`, `categorie`, `massHoraire`) VALUES
(1, 'La communication', 'Self development', '20'),
(2, 'Diversité et inclusion', 'Gestion', '10'),
(3, 'Gestion du temps', 'Gestion', '15'),
(4, 'Rédaction professionnelle', 'Gestion', '20'),
(5, 'Gestion du stress', 'Gestion', '14'),
(6, 'Sensibilisation à la sécurité', 'Sensibilisation', '20'),
(7, 'Technologie d assistance', 'Technologie', '16'),
(8, 'L éthique', 'Self development', '10'),
(9, 'Le développement personnel', 'Self development', '20'),
(10, 'Le harcèlement sur le lieu de travail', 'Self development', '15');

-- --------------------------------------------------------

--
-- Structure de la table `rejoindre`
--

CREATE TABLE `rejoindre` (
  `Id_Apprenant` int(11) NOT NULL,
  `Id_session` int(11) NOT NULL,
  `evaliation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rejoindre`
--

INSERT INTO `rejoindre` (`Id_Apprenant`, `Id_session`, `evaliation`) VALUES
(30, 1, NULL),
(30, 3, NULL),
(31, 1, NULL),
(31, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `Id_session` int(11) NOT NULL,
  `Date_debut` date DEFAULT NULL,
  `Date_fin` date DEFAULT NULL,
  `Places_max` int(11) DEFAULT NULL,
  `Etat` varchar(50) DEFAULT NULL,
  `Id_Formateur` int(11) NOT NULL,
  `Id_Formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`Id_session`, `Date_debut`, `Date_fin`, `Places_max`, `Etat`, `Id_Formateur`, `Id_Formation`) VALUES
(1, '2023-05-31', '2023-06-02', 55, ' au cours de la formation', 1, 2),
(2, '2023-06-05', '2023-07-06', 55, ' au cours de la formation', 2, 3),
(3, '2023-05-01', '2023-06-02', 55, ' au cours de la formation', 1, 2),
(4, '2023-06-05', '2023-07-06', 55, ' au cours de la formation', 2, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`Id_Apprenant`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`Id_Formateur`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`Id_formation`);

--
-- Index pour la table `rejoindre`
--
ALTER TABLE `rejoindre`
  ADD PRIMARY KEY (`Id_Apprenant`,`Id_session`),
  ADD KEY `Id_sessionFormation` (`Id_session`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Id_session`),
  ADD KEY `Id_Formateur` (`Id_Formateur`),
  ADD KEY `Id_Formation` (`Id_Formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `Id_Apprenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `Id_Formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `Id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `Id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rejoindre`
--
ALTER TABLE `rejoindre`
  ADD CONSTRAINT `rejoindre_ibfk_1` FOREIGN KEY (`Id_Apprenant`) REFERENCES `apprenant` (`Id_Apprenant`),
  ADD CONSTRAINT `rejoindre_ibfk_2` FOREIGN KEY (`Id_session`) REFERENCES `session` (`Id_session`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`Id_Formateur`) REFERENCES `formateur` (`Id_Formateur`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`Id_Formation`) REFERENCES `formation` (`Id_Formation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
