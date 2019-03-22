-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 22, 2019 at 06:09 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projet_web`
--
CREATE DATABASE IF NOT EXISTS `projet_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projet_web`;

-- --------------------------------------------------------

--
-- Table structure for table `comparee_a`
--

DROP TABLE IF EXISTS `comparee_a`;
CREATE TABLE `comparee_a` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consigne`
--

DROP TABLE IF EXISTS `consigne`;
CREATE TABLE `consigne` (
  `ID_CONSIGNE` int(11) NOT NULL,
  `TEMPS` int(11) NOT NULL,
  `BAREME` int(11) NOT NULL,
  `RETOUR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `est_compose`
--

DROP TABLE IF EXISTS `est_compose`;
CREATE TABLE `est_compose` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participe`
--

DROP TABLE IF EXISTS `participe`;
CREATE TABLE `participe` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
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
-- Table structure for table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE `questionnaire` (
  `ID_QUESTIONNAIRE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_CONSIGNE` int(11) NOT NULL,
  `TITRE` varchar(100) NOT NULL,
  `DESCRIPTION_QUESTIONNAIRE` text NOT NULL,
  `DATE_OUVERTURE` datetime NOT NULL,
  `DATE_FERMETURE` datetime NOT NULL,
  `ETAT` varchar(15) NOT NULL,
  `PROMO` int(10) DEFAULT NULL,
  `GROUPE` tinyint(1) DEFAULT NULL,
  `TD` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reliee_a`
--

DROP TABLE IF EXISTS `reliee_a`;
CREATE TABLE `reliee_a` (
  `ID_REPONSESP` int(11) NOT NULL,
  `REP_ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reponse_choisie`
--

DROP TABLE IF EXISTS `reponse_choisie`;
CREATE TABLE `reponse_choisie` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_C` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reponse_proposee`
--

DROP TABLE IF EXISTS `reponse_proposee`;
CREATE TABLE `reponse_proposee` (
  `ID_REPONSESP` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_P` tinyint(1) NOT NULL,
  `COLONNE` tinyint(1) DEFAULT NULL,
  `CONTENU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `MATRICULE` int(10) DEFAULT NULL,
  `INTERN_EXT` tinyint(1) DEFAULT NULL,
  `MATIERE` varchar(30) DEFAULT NULL,
  `PROMO` int(10) DEFAULT NULL,
  `TD` int(2) DEFAULT NULL,
  `GROUPE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comparee_a`
--
ALTER TABLE `comparee_a`
  ADD PRIMARY KEY (`ID_REPONSEC`,`ID_REPONSESP`),
  ADD KEY `FK_COMPAREE_A2` (`ID_REPONSESP`);

--
-- Indexes for table `consigne`
--
ALTER TABLE `consigne`
  ADD PRIMARY KEY (`ID_CONSIGNE`);

--
-- Indexes for table `est_compose`
--
ALTER TABLE `est_compose`
  ADD PRIMARY KEY (`ID_QUESTION`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_EST_COMPOSE2` (`ID_QUESTIONNAIRE`);

--
-- Indexes for table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`ID_USER`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_PARTICIPE` (`ID_QUESTIONNAIRE`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID_QUESTION`),
  ADD KEY `FK_DEFINI_QUESTION` (`ID_CONSIGNE`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`ID_QUESTIONNAIRE`),
  ADD KEY `TITRE_FK` (`TITRE`),
  ADD KEY `FK_DEFINI_QUESTIONNAIRE` (`ID_CONSIGNE`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `reliee_a`
--
ALTER TABLE `reliee_a`
  ADD PRIMARY KEY (`ID_REPONSESP`,`REP_ID_REPONSESP`),
  ADD KEY `FK_RELIEE_A2` (`REP_ID_REPONSESP`);

--
-- Indexes for table `reponse_choisie`
--
ALTER TABLE `reponse_choisie`
  ADD PRIMARY KEY (`ID_REPONSEC`),
  ADD KEY `FK_CHOISIT` (`ID_USER`),
  ADD KEY `FK_EST_REPONDU` (`ID_QUESTION`);

--
-- Indexes for table `reponse_proposee`
--
ALTER TABLE `reponse_proposee`
  ADD PRIMARY KEY (`ID_REPONSESP`),
  ADD KEY `FK_PROPOSE` (`ID_QUESTION`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `USER_PRENOM_FK` (`PRENOM`),
  ADD KEY `USER_NOM_FK` (`NOM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consigne`
--
ALTER TABLE `consigne`
  MODIFY `ID_CONSIGNE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `ID_QUESTIONNAIRE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponse_choisie`
--
ALTER TABLE `reponse_choisie`
  MODIFY `ID_REPONSEC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponse_proposee`
--
ALTER TABLE `reponse_proposee`
  MODIFY `ID_REPONSESP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comparee_a`
--
ALTER TABLE `comparee_a`
  ADD CONSTRAINT `FK_COMPAREE_A` FOREIGN KEY (`ID_REPONSEC`) REFERENCES `reponse_choisie` (`ID_REPONSEC`),
  ADD CONSTRAINT `FK_COMPAREE_A2` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `reponse_proposee` (`ID_REPONSESP`);

--
-- Constraints for table `est_compose`
--
ALTER TABLE `est_compose`
  ADD CONSTRAINT `FK_EST_COMPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`),
  ADD CONSTRAINT `FK_EST_COMPOSE2` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `questionnaire` (`ID_QUESTIONNAIRE`);

--
-- Constraints for table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `FK_PARTICIPE` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `questionnaire` (`ID_QUESTIONNAIRE`),
  ADD CONSTRAINT `FK_PARTICIPE2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_DEFINI_QUESTION` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `consigne` (`ID_CONSIGNE`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `FK_DEFINI_QUESTIONNAIRE` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `consigne` (`ID_CONSIGNE`);

--
-- Constraints for table `reliee_a`
--
ALTER TABLE `reliee_a`
  ADD CONSTRAINT `FK_RELIEE_A` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `reponse_proposee` (`ID_REPONSESP`),
  ADD CONSTRAINT `FK_RELIEE_A2` FOREIGN KEY (`REP_ID_REPONSESP`) REFERENCES `reponse_proposee` (`ID_REPONSESP`);

--
-- Constraints for table `reponse_choisie`
--
ALTER TABLE `reponse_choisie`
  ADD CONSTRAINT `FK_CHOISIT` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_EST_REPONDU` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`);

--
-- Constraints for table `reponse_proposee`
--
ALTER TABLE `reponse_proposee`
  ADD CONSTRAINT `FK_PROPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`);
