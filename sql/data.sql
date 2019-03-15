-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2019 at 05:42 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projet_web`
--

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

--
-- Dumping data for table `CONSIGNE`
--

INSERT INTO `CONSIGNE` (`ID_CONSIGNE`, `TEMPS`, `BAREME`, `RETOUR`) VALUES
(1, 15, 20, 1),
(2, 30, 100, 0),
(3, 30, 20, 1),
(4, 60, 20, 1),
(5, 60, 20, 1);

--
-- Dumping data for table `CREER`
--

INSERT INTO `CREER` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(6, 1),
(7, 2),
(6, 5);

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

--
-- Dumping data for table `PARTICIPE`
--

INSERT INTO `PARTICIPE` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(8, 1),
(9, 1),
(10, 1),
(10, 5);

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

--
-- Dumping data for table `RELIEE_A`
--

INSERT INTO `RELIEE_A` (`ID_REPONSESP`, `REP_ID_REPONSESP`) VALUES
(7, 8),
(9, 10),
(11, 12);

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

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`NOM`, `PRENOM`, `EMAIL`, `TYPE`, `ID_USER`, `MATRICULE`, `INTERN_EXT`, `MATIERE`, `PROMO`, `DATE_SORTIE`, `DATE_ENTREE`, `TD`, `GROUPE`, `LOGIN`, `PASSWORD`) VALUES
('Fabrez', 'Luc', 'luc.fabrez@imt-lille-douai.fr', 'Enseignant', 6, '1234', 1, 'C', NULL, NULL, NULL, NULL, NULL, 'lucky', '123'),
('Pinot', 'Remy', 'remy.pinot@imt-lille-douai.fr', 'Enseignant', 7, '5678', 1, 'SGBD', NULL, NULL, NULL, NULL, NULL, 'Reminou', '456'),
('Malidin', 'Thomas', 'thomas.malidin@etu.imt-lille-douai.fr', 'Etudiant', 8, NULL, NULL, NULL, '', '2020-09-01', '2017-09-01', '6', '2', 'toto', '789'),
('Barrau', 'Myriam', 'myriam.barrau@etu.imt-lille-douai.fr', 'Etudiant', 9, NULL, NULL, NULL, '2019', '2019-09-01', '2016-09-01', '5', '1', 'Mymy', '147'),
('Fournier', 'Clara', 'clara.fournier@etu.imt-lille-douai.fr', 'Etudiant', 10, NULL, NULL, NULL, '2021', '2021-09-01', '2018-09-01', '7', '1', 'Clarousse', '258');
