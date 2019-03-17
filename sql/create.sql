-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 17, 2019 at 07:25 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projet_web`
--
CREATE DATABASE IF NOT EXISTS `projet_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `projet_web`;

-- --------------------------------------------------------

--
-- Table structure for table `COMPAREE_A`
--

CREATE TABLE `COMPAREE_A` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COMPAREE_A`
--

INSERT INTO `COMPAREE_A` (`ID_REPONSEC`, `ID_REPONSESP`) VALUES
(16, 1),
(20, 1),
(21, 2),
(24, 2),
(17, 3),
(25, 4),
(18, 18),
(22, 18),
(26, 19),
(19, 22),
(23, 23),
(27, 23);

-- --------------------------------------------------------

--
-- Table structure for table `CONSIGNE`
--

CREATE TABLE `CONSIGNE` (
  `ID_CONSIGNE` int(11) NOT NULL,
  `TEMPS` int(11) NOT NULL,
  `BAREME` int(11) NOT NULL,
  `RETOUR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CONSIGNE`
--

INSERT INTO `CONSIGNE` (`ID_CONSIGNE`, `TEMPS`, `BAREME`, `RETOUR`) VALUES
(1, 15, 20, 1),
(2, 30, 100, 0),
(3, 30, 20, 1),
(4, 60, 20, 1),
(5, 60, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `CREER`
--

CREATE TABLE `CREER` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CREER`
--

INSERT INTO `CREER` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(6, 1),
(7, 2),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `EST_COMPOSE`
--

CREATE TABLE `EST_COMPOSE` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EST_COMPOSE`
--

INSERT INTO `EST_COMPOSE` (`ID_QUESTION`, `ID_QUESTIONNAIRE`) VALUES
(1, 1),
(13, 1),
(14, 1),
(2, 2),
(9, 3),
(10, 4),
(11, 5),
(12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `PARTICIPE`
--

CREATE TABLE `PARTICIPE` (
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTIONNAIRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PARTICIPE`
--

INSERT INTO `PARTICIPE` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(8, 1),
(9, 1),
(10, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION`
--

CREATE TABLE `QUESTION` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_CONSIGNE` int(11) NOT NULL,
  `TAG` varchar(30) DEFAULT NULL,
  `TYPE_QUESTION` varchar(10) NOT NULL,
  `NB_REPONSES` int(11) DEFAULT NULL,
  `DESCRIPTION_QUESTION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `QUESTION`
--

INSERT INTO `QUESTION` (`ID_QUESTION`, `ID_CONSIGNE`, `TAG`, `TYPE_QUESTION`, `NB_REPONSES`, `DESCRIPTION_QUESTION`) VALUES
(1, 1, 'Maths', 'QCM', 4, 'Quelle est la racine carrée de 1234'),
(2, 1, 'Anglais', 'Libre', 1, 'Quelle est la couleur du cheval blanc d\'Henri IV ?'),
(9, 3, 'Arabe', 'Libre ', 1, 'Comment ecrit-on \"Si dieu le veux\" ?'),
(10, 4, 'Francais', 'Assigne', 6, 'Relier les elt correspondant ?'),
(11, 5, 'ISIS', 'QCU', 4, 'Quelle est l\'IP du proxy de l\'école'),
(12, 3, 'Automatisme', 'Libre', 1, 'Quel est le nom du logiciel pour les systèmes embarqués ? '),
(13, 3, 'Maths', 'QCU', 4, '4x4'),
(14, 3, 'Maths', 'Libre', 1, 'Théorème Triangle');

-- --------------------------------------------------------

--
-- Table structure for table `QUESTIONNAIRE`
--

CREATE TABLE `QUESTIONNAIRE` (
  `ID_QUESTIONNAIRE` int(11) NOT NULL,
  `ID_CONSIGNE` int(11) NOT NULL,
  `TITRE` varchar(100) NOT NULL,
  `DESCRIPTION_QUESTIONNAIRE` text NOT NULL,
  `DATE_OUVERTURE` datetime NOT NULL,
  `DATE_FERMETURE` datetime NOT NULL,
  `ETAT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `QUESTIONNAIRE`
--

INSERT INTO `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`, `ID_CONSIGNE`, `TITRE`, `DESCRIPTION_QUESTIONNAIRE`, `DATE_OUVERTURE`, `DATE_FERMETURE`, `ETAT`) VALUES
(1, 1, 'Questionnaire 1', 'Questionnaire Maths \r\n', '2019-03-11 14:00:00', '2019-03-11 15:00:00', 'En cours'),
(2, 2, 'Questionnaire 2', 'Questionnaire Anglais', '2019-03-12 09:00:00', '2019-03-12 11:00:00', 'Fermé'),
(3, 3, 'Questionnaire 3', 'Questionnaire Arabe', '2019-03-01 09:00:00', '2019-03-01 10:00:00', 'Archivé'),
(4, 4, 'Questionnaire 4', 'Questionnaire Francais', '2019-03-10 06:00:00', '2019-03-10 15:00:00', 'Corrigé'),
(5, 5, 'Questionnaire 5', 'Questionnaire ISIC', '2019-03-10 08:00:00', '2019-03-10 09:00:00', 'Non corrigé'),
(6, 3, 'Questionnaire 6', 'Questionnaire OAPI', '2019-03-11 14:00:00', '2019-03-11 15:00:00', 'En cours');

-- --------------------------------------------------------

--
-- Table structure for table `RELIEE_A`
--

CREATE TABLE `RELIEE_A` (
  `ID_REPONSESP` int(11) NOT NULL,
  `REP_ID_REPONSESP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RELIEE_A`
--

INSERT INTO `RELIEE_A` (`ID_REPONSESP`, `REP_ID_REPONSESP`) VALUES
(7, 8),
(9, 10),
(11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `REPONSE_CHOISIE`
--

CREATE TABLE `REPONSE_CHOISIE` (
  `ID_REPONSEC` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_C` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `REPONSE_CHOISIE`
--

INSERT INTO `REPONSE_CHOISIE` (`ID_REPONSEC`, `ID_USER`, `ID_QUESTION`, `EST_JUSTE_C`) VALUES
(16, 8, 1, 1),
(17, 8, 1, 1),
(18, 8, 13, 1),
(19, 8, 14, 1),
(20, 9, 1, 1),
(21, 9, 1, 0),
(22, 9, 13, 1),
(23, 9, 14, 0),
(24, 10, 1, 0),
(25, 10, 1, 0),
(26, 10, 13, 0),
(27, 10, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `REPONSE_PROPOSEE`
--

CREATE TABLE `REPONSE_PROPOSEE` (
  `ID_REPONSESP` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `EST_JUSTE_P` tinyint(1) NOT NULL,
  `COLONNE` tinyint(1) DEFAULT NULL,
  `CONTENU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `REPONSE_PROPOSEE`
--

INSERT INTO `REPONSE_PROPOSEE` (`ID_REPONSESP`, `ID_QUESTION`, `EST_JUSTE_P`, `COLONNE`, `CONTENU`) VALUES
(1, 1, 1, NULL, '35,12'),
(2, 1, 0, NULL, '12'),
(3, 1, 1, NULL, 'sqrt(1234)'),
(4, 1, 0, NULL, '42'),
(5, 2, 1, NULL, 'white'),
(6, 9, 1, NULL, 'Inchalla'),
(7, 10, 1, 0, 'Une Souris'),
(8, 10, 1, 1, 'Verte'),
(9, 10, 1, 0, 'Un chaperon'),
(10, 10, 1, 1, 'Rouge'),
(11, 10, 1, 0, 'Centre'),
(12, 10, 1, 1, 'Commerciale'),
(13, 11, 1, NULL, '10.1.100.4'),
(14, 11, 0, NULL, '10.1.100.1'),
(15, 11, 0, NULL, '10.1.100.2'),
(16, 11, 0, NULL, '10.1.100.3'),
(17, 12, 1, NULL, 'Ardouino'),
(18, 13, 1, NULL, '16'),
(19, 13, 0, NULL, '2'),
(20, 13, 0, NULL, '4'),
(21, 13, 0, NULL, '6'),
(22, 14, 1, NULL, 'Pythagore'),
(23, 14, 0, NULL, 'FAUX');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
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
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`LOGIN`, `PASSWORD`, `NOM`, `PRENOM`, `EMAIL`, `ROLE`, `ID_USER`, `MATRICULE`, `INTERN_EXT`, `MATIERE`, `PROMO`, `TD`, `GROUPE`) VALUES
('lucky', '123', 'Fabresse', 'Luc', 'luc.fabresse@imt-lille-douai.fr', 'Enseignant', 6, 1234, 0, 'C', NULL, NULL, NULL),
('Reminou', '456', 'Pinot', 'Remy', 'remy.pinot@imt-lille-douai.fr', 'Enseignant', 7, 5678, 0, 'SGBD', NULL, NULL, NULL),
('toto', '789', 'Malidin', 'Thomas', 'thomas.malidin@etu.imt-lille-douai.fr', 'Etudiant', 8, NULL, NULL, NULL, 2020, 6, 2),
('Mymy', '147', 'Barrau', 'Myriam', 'myriam.barrau@etu.imt-lille-douai.fr', 'Etudiant', 9, NULL, NULL, NULL, 2019, 5, 1),
('Clarousse', '258', 'Fournier', 'Clara', 'clara.fournier@etu.imt-lille-douai.fr', 'Etudiant', 10, NULL, NULL, NULL, 2021, 7, 1),
('coco', '159', 'Devaux', 'Colline', 'coco@etu.imt-lille-douai.fr', 'Etudiant', 23, NULL, NULL, NULL, 159, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COMPAREE_A`
--
ALTER TABLE `COMPAREE_A`
  ADD PRIMARY KEY (`ID_REPONSEC`,`ID_REPONSESP`),
  ADD KEY `FK_COMPAREE_A2` (`ID_REPONSESP`);

--
-- Indexes for table `CONSIGNE`
--
ALTER TABLE `CONSIGNE`
  ADD PRIMARY KEY (`ID_CONSIGNE`);

--
-- Indexes for table `CREER`
--
ALTER TABLE `CREER`
  ADD PRIMARY KEY (`ID_USER`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_CREER2` (`ID_QUESTIONNAIRE`);

--
-- Indexes for table `EST_COMPOSE`
--
ALTER TABLE `EST_COMPOSE`
  ADD PRIMARY KEY (`ID_QUESTION`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_EST_COMPOSE2` (`ID_QUESTIONNAIRE`);

--
-- Indexes for table `PARTICIPE`
--
ALTER TABLE `PARTICIPE`
  ADD PRIMARY KEY (`ID_USER`,`ID_QUESTIONNAIRE`),
  ADD KEY `FK_PARTICIPE` (`ID_QUESTIONNAIRE`);

--
-- Indexes for table `QUESTION`
--
ALTER TABLE `QUESTION`
  ADD PRIMARY KEY (`ID_QUESTION`),
  ADD KEY `FK_DEFINI_QUESTION` (`ID_CONSIGNE`);

--
-- Indexes for table `QUESTIONNAIRE`
--
ALTER TABLE `QUESTIONNAIRE`
  ADD PRIMARY KEY (`ID_QUESTIONNAIRE`),
  ADD KEY `TITRE_FK` (`TITRE`),
  ADD KEY `FK_DEFINI_QUESTIONNAIRE` (`ID_CONSIGNE`);

--
-- Indexes for table `RELIEE_A`
--
ALTER TABLE `RELIEE_A`
  ADD PRIMARY KEY (`ID_REPONSESP`,`REP_ID_REPONSESP`),
  ADD KEY `FK_RELIEE_A2` (`REP_ID_REPONSESP`);

--
-- Indexes for table `REPONSE_CHOISIE`
--
ALTER TABLE `REPONSE_CHOISIE`
  ADD PRIMARY KEY (`ID_REPONSEC`),
  ADD KEY `FK_CHOISIT` (`ID_USER`),
  ADD KEY `FK_EST_REPONDU` (`ID_QUESTION`);

--
-- Indexes for table `REPONSE_PROPOSEE`
--
ALTER TABLE `REPONSE_PROPOSEE`
  ADD PRIMARY KEY (`ID_REPONSESP`),
  ADD KEY `FK_PROPOSE` (`ID_QUESTION`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `USER_PRENOM_FK` (`PRENOM`),
  ADD KEY `USER_NOM_FK` (`NOM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CONSIGNE`
--
ALTER TABLE `CONSIGNE`
  MODIFY `ID_CONSIGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `QUESTION`
--
ALTER TABLE `QUESTION`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `QUESTIONNAIRE`
--
ALTER TABLE `QUESTIONNAIRE`
  MODIFY `ID_QUESTIONNAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `REPONSE_CHOISIE`
--
ALTER TABLE `REPONSE_CHOISIE`
  MODIFY `ID_REPONSEC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `REPONSE_PROPOSEE`
--
ALTER TABLE `REPONSE_PROPOSEE`
  MODIFY `ID_REPONSESP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `COMPAREE_A`
--
ALTER TABLE `COMPAREE_A`
  ADD CONSTRAINT `FK_COMPAREE_A` FOREIGN KEY (`ID_REPONSEC`) REFERENCES `REPONSE_CHOISIE` (`ID_REPONSEC`),
  ADD CONSTRAINT `FK_COMPAREE_A2` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`);

--
-- Constraints for table `CREER`
--
ALTER TABLE `CREER`
  ADD CONSTRAINT `FK_CREER` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`),
  ADD CONSTRAINT `FK_CREER2` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`);

--
-- Constraints for table `EST_COMPOSE`
--
ALTER TABLE `EST_COMPOSE`
  ADD CONSTRAINT `FK_EST_COMPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`),
  ADD CONSTRAINT `FK_EST_COMPOSE2` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`);

--
-- Constraints for table `PARTICIPE`
--
ALTER TABLE `PARTICIPE`
  ADD CONSTRAINT `FK_PARTICIPE` FOREIGN KEY (`ID_QUESTIONNAIRE`) REFERENCES `QUESTIONNAIRE` (`ID_QUESTIONNAIRE`),
  ADD CONSTRAINT `FK_PARTICIPE2` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`);

--
-- Constraints for table `QUESTION`
--
ALTER TABLE `QUESTION`
  ADD CONSTRAINT `FK_DEFINI_QUESTION` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `CONSIGNE` (`ID_CONSIGNE`);

--
-- Constraints for table `QUESTIONNAIRE`
--
ALTER TABLE `QUESTIONNAIRE`
  ADD CONSTRAINT `FK_DEFINI_QUESTIONNAIRE` FOREIGN KEY (`ID_CONSIGNE`) REFERENCES `CONSIGNE` (`ID_CONSIGNE`);

--
-- Constraints for table `RELIEE_A`
--
ALTER TABLE `RELIEE_A`
  ADD CONSTRAINT `FK_RELIEE_A` FOREIGN KEY (`ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`),
  ADD CONSTRAINT `FK_RELIEE_A2` FOREIGN KEY (`REP_ID_REPONSESP`) REFERENCES `REPONSE_PROPOSEE` (`ID_REPONSESP`);

--
-- Constraints for table `REPONSE_CHOISIE`
--
ALTER TABLE `REPONSE_CHOISIE`
  ADD CONSTRAINT `FK_CHOISIT` FOREIGN KEY (`ID_USER`) REFERENCES `USER` (`ID_USER`),
  ADD CONSTRAINT `FK_EST_REPONDU` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`);

--
-- Constraints for table `REPONSE_PROPOSEE`
--
ALTER TABLE `REPONSE_PROPOSEE`
  ADD CONSTRAINT `FK_PROPOSE` FOREIGN KEY (`ID_QUESTION`) REFERENCES `QUESTION` (`ID_QUESTION`);
