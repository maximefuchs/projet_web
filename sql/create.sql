-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 16 Mars 2019 à 14:09
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--
CREATE DATABASE IF NOT EXISTS `projet_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `projet_web`;

-- --------------------------------------------------------

--
-- Structure de la table `comparee_a`
--

DROP TABLE IF EXISTS `COMPAREE_A`;
CREATE TABLE `comparee_a` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consigne`
--

DROP TABLE IF EXISTS `CONSIGNE`;
CREATE TABLE `consigne` (
  `ID_CONSIGNE` int(11) NOT NULL,
  `TEMPS` int(11) NOT NULL,
  `BAREME` int(11) NOT NULL,
  `RETOUR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

DROP TABLE IF EXISTS `CREER`;
CREATE TABLE `creer` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `est_compose`
--

DROP TABLE IF EXISTS `EST_COMPOSE`;
CREATE TABLE `est_compose` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

DROP TABLE IF EXISTS `PARTICIPE`;
CREATE TABLE `participe` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `QUESTION`;
CREATE TABLE `question` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_CONSIGNE` int(11) NOT NULL,
  `TAG` varchar(30) DEFAULT NULL,
  `TYPE_QUESTION` varchar(10) NOT NULL,
  `NB_REPONSES` int(11) DEFAULT NULL,
  `DESCRIPTION_QUESTION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `QUESTIONNAIRE`;
CREATE TABLE `questionnaire` (
  `ID_QUESTIONNAIRE` int(11) NOT NULL,
  `ID_CONSIGNE` int(11) NOT NULL,
  `TITRE` varchar(100) NOT NULL,
  `DESCRIPTION_QUESTIONNAIRE` text NOT NULL,
  `DATE_OUVERTURE` datetime NOT NULL,
  `DATE_FERMETURE` datetime NOT NULL,
  `ETAT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reliee_a`
--

DROP TABLE IF EXISTS `RELIEE_A`;
CREATE TABLE `reliee_a` (
  `ID_REPONSESP` int(11) NOT NULL,
  `REP_ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse_choisie`
--

DROP TABLE IF EXISTS `REPONSE_CHOISIE`;
CREATE TABLE `reponse_choisie` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_C` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse_proposee`
--

DROP TABLE IF EXISTS `REPONSE_PROPOSEE`;
CREATE TABLE `reponse_proposee` (
  `ID_REPONSESP` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_P` tinyint(1) NOT NULL,
  `COLONNE` tinyint(1) DEFAULT NULL,
  `CONTENU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `USER`;
CREATE TABLE `user` (
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `MATRICULE` varchar(10) DEFAULT NULL,
  `INTERN_EXT` tinyint(1) DEFAULT NULL,
  `MATIERE` varchar(30) DEFAULT NULL,
  `PROMO` varchar(10) DEFAULT NULL,
  `TD` varchar(2) DEFAULT NULL,
  `GROUPE` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comparee_a`
--
ALTER TABLE `COMPAREE_A`
  ADD PRIMARY KEY (`ID_REPONSEC`,`ID_REPONSESP`),
  ADD KEY `FK_COMPAREE_A2` (`ID_REPONSESP`);

--
-- Index pour la table `consigne`
--
ALTER TABLE `CONSIGNE`
  ADD PRIMARY KEY (`ID_CONSIGNE`);

--
-- Index pour la table `creer`
--
ALTER TABLE `CREER`
  ADD PRIMARY KEY (`ID_USER`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_CREER2` (`ID_QUESTIONNAIRE`);

--
-- Index pour la table `est_compose`
--
ALTER TABLE `EST_COMPOSE`
  ADD PRIMARY KEY (`ID_QUESTION`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_EST_COMPOSE2` (`ID_QUESTIONNAIRE`);

--
-- Index pour la table `participe`
--
ALTER TABLE `PARTICIPE`
  ADD PRIMARY KEY (`ID_USER`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_PARTICIPE` (`ID_QUESTIONNAIRE`);

--
-- Index pour la table `question`
--
ALTER TABLE `QUESTION`
  ADD PRIMARY KEY (`ID_QUESTION`),
  ADD KEY `FK_DEFINI_QUESTION` (`ID_CONSIGNE`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `QUESTIONNAIRE`
  ADD PRIMARY KEY (`ID_QUESTIONNAIRE`),
  ADD KEY `TITRE_FK` (`TITRE`),
  ADD KEY `FK_DEFINI_QUESTIONNAIRE` (`ID_CONSIGNE`);

--
-- Index pour la table `reliee_a`
--
ALTER TABLE `RELIEE_A`
  ADD PRIMARY KEY (`ID_REPONSESP`,`REP_ID_REPONSESP`),
  ADD KEY `FK_RELIEE_A2` (`REP_ID_REPONSESP`);

--
-- Index pour la table `reponse_choisie`
--
ALTER TABLE `REPONSE_CHOISIE`
  ADD PRIMARY KEY (`ID_REPONSEC`),
  ADD KEY `FK_CHOISIT` (`ID_USER`),
  ADD KEY `FK_EST_REPONDU` (`ID_QUESTION`);

--
-- Index pour la table `reponse_proposee`
--
ALTER TABLE `REPONSE_PROPOSEE`
  ADD PRIMARY KEY (`ID_REPONSESP`),
  ADD KEY `FK_PROPOSE` (`ID_QUESTION`);

--
-- Index pour la table `user`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `USER_PRENOM_FK` (`PRENOM`),
  ADD KEY `USER_NOM_FK` (`NOM`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `consigne`
--
ALTER TABLE `CONSIGNE`
  MODIFY `ID_CONSIGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `QUESTION`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `QUESTIONNAIRE`
  MODIFY `ID_QUESTIONNAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `reponse_choisie`
--
ALTER TABLE `REPONSE_CHOISIE`
  MODIFY `ID_REPONSEC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `reponse_proposee`
--
ALTER TABLE `REPONSE_PROPOSEE`
  MODIFY `ID_REPONSESP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `USER`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comparee_a`
--
ALTER TABLE `COMPAREE_A`
  ADD CONSTRAINT `FK_COMPAREE_A` FOREIGN KEY (`ID_REPONSEC`) REFERENCES `REPONSE_CHOISIE` (`ID_REPONSEC`),
  ADD CONSTRAINT `FK_COMPAREE_A2` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`);

--
-- Contraintes pour la table `creer`
--
ALTER TABLE `CREER`
  ADD CONSTRAINT `FK_CREER` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`),
  ADD CONSTRAINT `FK_CREER2` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`);

--
-- Contraintes pour la table `est_compose`
--
ALTER TABLE `EST_COMPOSE`
  ADD CONSTRAINT `FK_EST_COMPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`),
  ADD CONSTRAINT `FK_EST_COMPOSE2` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `PARTICIPE`
  ADD CONSTRAINT `FK_PARTICIPE` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`),
  ADD CONSTRAINT `FK_PARTICIPE2` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `QUESTION`
  ADD CONSTRAINT `FK_DEFINI_QUESTION` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `CONSIGNE` (`ID_CONSIGNE`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `QUESTIONNAIRE`
  ADD CONSTRAINT `FK_DEFINI_QUESTIONNAIRE` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `CONSIGNE` (`ID_CONSIGNE`);

--
-- Contraintes pour la table `reliee_a`
--
ALTER TABLE `RELIEE_A`
  ADD CONSTRAINT `FK_RELIEE_A` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`),
  ADD CONSTRAINT `FK_RELIEE_A2` FOREIGN KEY (`REP_ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`);

--
-- Contraintes pour la table `reponse_choisie`
--
ALTER TABLE `REPONSE_CHOISIE`
  ADD CONSTRAINT `FK_CHOISIT` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`),
  ADD CONSTRAINT `FK_EST_REPONDU` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`);

--
-- Contraintes pour la table `reponse_proposee`
--
ALTER TABLE `REPONSE_PROPOSEE`
  ADD CONSTRAINT `FK_PROPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
