-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : iqugruginifinite.mysql.db
-- Généré le :  mer. 03 juin 2020 à 20:56
-- Version du serveur :  5.6.47-log
-- Version de PHP :  7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iqugruginifinite`
--
CREATE DATABASE IF NOT EXISTS `iqugruginifinite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `iqugruginifinite`;

-- --------------------------------------------------------

--
-- Structure de la table `boitier`
--

CREATE TABLE `boitier` (
  `idBoitier` int(8) NOT NULL,
  `idCentre` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boitier`
--

INSERT INTO `boitier` (`idBoitier`, `idCentre`) VALUES
(12, 1),
(13, 1),
(14, 1),
(45, 1),
(1, 2),
(2, 2),
(4, 2),
(3, 4),
(34, 4);

-- --------------------------------------------------------

--
-- Structure de la table `centremedical`
--

CREATE TABLE `centremedical` (
  `numero` int(6) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `centremedical`
--

INSERT INTO `centremedical` (`numero`, `adresse`, `nom`, `region`) VALUES
(1, '15 Rue des routiers, 75014 Paris', 'Cerbailliance - Cerbailliance Montparnasse', 'Ile-de-France'),
(2, '23 Rue du Bourg-Palette, 99000 Bourg-Palette', 'PokÃ©mon - Centre', 'Bretagne'),
(4, '99 Rue des salades, 29010 Brest', 'Centre - ifugeuse', 'Bretagne');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idRequete` int(8) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `idMedecin` int(8) NOT NULL,
  `idUtilisateur` int(8) NOT NULL,
  `idCentre` int(6) NOT NULL,
  `numeroSS` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `idUtilisateur`, `idCentre`, `numeroSS`) VALUES
(3, 8, 1, 8799950),
(4, 10, 1, 344155511),
(5, 12, 0, 9874512),
(6, 13, 0, 777998843),
(7, 14, 0, 988745),
(8, 16, 4, 1111111111),
(9, 17, 2, 1001010),
(10, 18, 2, 1),
(11, 19, 2, 1224222),
(12, 20, 1, 1234567);

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `idMesure` int(11) NOT NULL,
  `idTest` int(10) NOT NULL,
  `fq` float NOT NULL,
  `temp` float NOT NULL,
  `audio` float NOT NULL,
  `reactivite` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mesure`
--

INSERT INTO `mesure` (`idMesure`, `idTest`, `fq`, `temp`, `audio`, `reactivite`) VALUES
(1, 1, 67, 5, 93, 62),
(2, 2, 63, 71, 90, 30),
(3, 3, 32, 35, 95, 15),
(4, 4, 80, 61, 54, 56),
(5, 5, 71, 11, 10, 83),
(6, 6, 76, 82, 72, 17);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(8) NOT NULL,
  `idUtilisateur` int(8) NOT NULL,
  `idCentre` int(6) NOT NULL,
  `numeroSS` int(13) NOT NULL,
  `idMedecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idPatient`, `idUtilisateur`, `idCentre`, `numeroSS`, `idMedecin`) VALUES
(1, 9, 1, 879451314, 3),
(2, 11, 2, 2147483647, 4),
(3, 15, 1, 9887, 3),
(4, 21, 1, 2928822, 4),
(5, 22, 1, 2626633, 4),
(6, 23, 1, 2452552, 4);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `idTest` int(10) NOT NULL,
  `resultat` float NOT NULL,
  `date` date NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`idTest`, `resultat`, `date`, `idPatient`, `idMedecin`) VALUES
(1, 10, '2020-05-25', 1, 3),
(2, 14, '2020-05-25', 2, 4),
(3, 16, '2020-05-25', 2, 4),
(4, 14, '2020-05-30', 2, 4),
(5, 20, '2020-06-03', 3, 3),
(6, 14, '2020-06-03', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(8) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `role` varchar(16) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mail`, `prenom`, `nom`, `adresse`, `role`, `motdepasse`) VALUES
(7, 'admin@infiniteMeasures.fr', 'compte', 'administrateur', '10 rue de Vanves', 'administrateur', '$2y$10$sTFLTytYWD2wCL/X85ACCeIhkqOIgfrnXbARmJ2VVCIHSquA2q7wm'),
(8, 'drhouse@isep.fr', 'dr', 'house', '10 rue de Vanves', 'medecin', '$2y$10$gGMQkKBOUDiQIPdbBx.OZ.5cy9NfM/SV5t64zVAsT/e802u3au/Ky'),
(9, 'louis.delatullaye@gmail.com', 'Louis', 'de La Tullaye', '13 rue d\'Odessa, 75014 Paris', 'patient', '$2y$10$VS6XLuXTqN.c1ZrJff7mae4t9sR1WoY75UYggTGwOqhZFUE85dYmK'),
(10, 'drwho@infinitemeasures.fr', 'Dr', 'Who', 'Tardis', 'medecin', '$2y$10$bVXXuAX6D1Y0ah1keu2VTu6lAfJ.7otkPKRMCNJl5383Ewm5.ZzF6'),
(11, 'zlatan@zlatan.zlatan', 'Zlatan', 'Ibrahimovic', 'SuÃ¨de', 'patient', '$2y$10$xSoLsNuCs3mJS0cE7dBf6uravD5gBS8bHVyCf901dyEgLKkaUDP3K'),
(12, 'pierremarie@isep.fr', 'Pierre', 'Marie', '78 rue des fauconniers', 'medecin', '$2y$10$r2Ghw5oHg4TsuKihPzCPheU57T01WoBj4iCZzFWvzRKDt5IUsk/y.'),
(13, 'aze@isep.fr', 'compte', 'aze', '87 rue des cachots, 78545 Versailles', 'medecin', '$2y$10$fX0H8mnWbiXq7ddleBKoVOikR4r2SBhD6VMvyoQWctwVwp1qg/xpK'),
(14, 'qsd@isep.fr', 'compte', 'de test', '87 eaz', 'medecin', '$2y$10$uauSf0y/pmfqaHpXG4a5ruM8GCcJnK2vWTldzsF0aqYczNhHPN7FS'),
(15, 'louis.delatullaye@isep.fr', 'test', 'test', '87', 'patient', '$2y$10$KDcenL1lqBmI24bGy1Xl4Ok/BWpXXDtzXgQTEnQiXD0tv1WZ3jW2q'),
(16, 'drmaboule@infinitemeasures.fr', 'Dr', 'Maboule', 'Chez moi', 'medecin', '$2y$10$CRiWMD89tsuegitCwyRD3eUetrUQQ2tw9gYLerV2P3ODekPCoNLGm'),
(17, 'drpepper@infinitemeasures.fr', 'Dr', 'Pepper', 'RiviÃ¨re des sodas', 'medecin', '$2y$10$Rsr4ZC.1MNDO/H..nCMbv.Wf2FPzRAZbJAL6OV/YzAo3DTx2oXmPa'),
(18, 'drslump@infinitemeasures.fr', 'Dr', 'Slump', 'Avenue Toriyama', 'medecin', '$2y$10$xqA7A1cJjSpjnRS6iZt1TuqxiWq9qejtnVKKG27SDsxBx1g/IiqnS'),
(19, 'drqueen@infinitemeasures.fr', 'Dr', 'queen', 'Campagne', 'medecin', '$2y$10$vOA/TNvV7GQohJWI9jKJ7errxlGaTE3WTBoy1BNVf/ut4edu4Zbca'),
(20, 'sarkozy@infinitemeasures.fr', 'Nicolas', 'Sarkozy', 'Palais de l\'Ã©lysÃ©e', 'medecin', '$2y$10$VveGQC3CGI1LEZ/yFLnIB.jHQEdIZX0efOFgCGvJbF6ZAuMccw7MS'),
(21, 'mj@infinitemeasures.fr', 'Michael', 'Jackson', 'Paradis', 'patient', '$2y$10$2OTNsUDaDqj1Mmu82FfcM.3MR1K45f1NqfPZ5govA8VlfB216RCKu'),
(22, 'johndeuf@infinitemeasures.fr', 'John', 'Deuf', 'Poele', 'patient', '$2y$10$f0G6gz2q1A4X9ACpLQW1n.AbGLSxkrdyTxliq5Ot/uqajJ72BJKje'),
(23, 'maudezarella@infinitemeasures.fr', 'Maude', 'Zarella', 'Salade de tomate', 'patient', '$2y$10$HyFYqBA/q3rlUqtw/M1uAOqNJhSXEZAxy8Al7yh72IqvaPoYbTUOq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boitier`
--
ALTER TABLE `boitier`
  ADD PRIMARY KEY (`idBoitier`),
  ADD KEY `idCentre` (`idCentre`);

--
-- Index pour la table `centremedical`
--
ALTER TABLE `centremedical`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idRequete`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idMedecin`),
  ADD UNIQUE KEY `numeroSS` (`numeroSS`),
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idUtilisateur_2` (`idUtilisateur`),
  ADD KEY `idCentre` (`idCentre`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `idTest` (`idTest`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD UNIQUE KEY `numeroSS` (`numeroSS`),
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idCentre` (`idCentre`),
  ADD KEY `idCentre_2` (`idCentre`),
  ADD KEY `idUtilisateur_2` (`idUtilisateur`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idTest`),
  ADD KEY `idPatient` (`idPatient`),
  ADD KEY `idMedecin` (`idMedecin`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centremedical`
--
ALTER TABLE `centremedical`
  MODIFY `numero` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idRequete` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `idMedecin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `idMesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `idTest` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `mesure_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `test` (`idTest`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
