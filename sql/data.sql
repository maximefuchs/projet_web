-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 26 Mars 2019 à 08:09
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projet_web`
--
CREATE DATABASE IF NOT EXISTS `projet_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projet_web`;

--
-- Vider la table avant d'insérer `comparee_a`
--

TRUNCATE TABLE `comparee_a`;
--
-- Contenu de la table `comparee_a`
--

INSERT INTO `comparee_a` (`ID_REPONSEC`, `ID_REPONSESP`) VALUES
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
-- Vider la table avant d'insérer `consigne`
--

TRUNCATE TABLE `consigne`;
--
-- Contenu de la table `consigne`
--

INSERT INTO `consigne` (`ID_CONSIGNE`, `TEMPS`, `BAREME`, `RETOUR`) VALUES
(1, 15, 20, 1),
(2, 30, 100, 0),
(3, 30, 20, 1),
(4, 60, 20, 1),
(5, 60, 20, 1);

--
-- Vider la table avant d'insérer `est_compose`
--

TRUNCATE TABLE `est_compose`;
--
-- Contenu de la table `est_compose`
--

INSERT INTO `est_compose` (`ID_QUESTION`, `ID_QUESTIONNAIRE`) VALUES
(1, 1),
(13, 1),
(14, 1),
(2, 2),
(9, 3),
(10, 4),
(11, 5),
(12, 6);

--
-- Vider la table avant d'insérer `participe`
--

TRUNCATE TABLE `participe`;
--
-- Contenu de la table `participe`
--

INSERT INTO `participe` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(3, 1),
(4, 1),
(5, 1),
(5, 5);

--
-- Vider la table avant d'insérer `question`
--

TRUNCATE TABLE `question`;
--
-- Contenu de la table `question`
--

INSERT INTO `question` (`ID_QUESTION`, `ID_CONSIGNE`, `TAG`, `TYPE_QUESTION`, `NB_REPONSES`, `DESCRIPTION_QUESTION`) VALUES
(1, 1, 'Maths', 'QCM', 4, 'Quelle est la racine carrée de 1234'),
(2, 1, 'Anglais', 'LIBRE', 1, 'Quelle est la couleur du cheval blanc d\'Henri IV ?'),
(9, 3, 'Arabe', 'LIBRE', 1, 'Comment ecrit-on "Si dieu le veux" ?'),
(10, 4, 'Francais', 'ASSIGNE', 6, 'Relier les elt correspondant ?'),
(11, 5, 'ISIS', 'QCU', 4, 'Quelle est l\'IP du proxy de l\'école'),
(12, 3, 'Automatisme', 'LIBRE', 1, 'Quel est le nom du logiciel pour les systèmes embarqués ? '),
(13, 3, 'Maths', 'QCU', 4, '4x4'),
(14, 3, 'Maths', 'LIBRE', 1, 'Théorème Triangle');

--
-- Vider la table avant d'insérer `questionnaire`
--

TRUNCATE TABLE `questionnaire`;
--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`ID_QUESTIONNAIRE`, `ID_USER`, `ID_CONSIGNE`, `TITRE`, `DESCRIPTION_QUESTIONNAIRE`, `DATE_OUVERTURE`, `DATE_FERMETURE`, `ETAT`, `PROMO`, `GROUPE`, `TD`) VALUES
(1, 1, 1, 'Questionnaire 1', 'Questionnaire Maths \r\n', '2019-03-11 14:00:00', '2019-03-11 15:00:00', 'Terminé', 2020, 1, NULL),
(2, 1, 2, 'Questionnaire 2', 'Questionnaire Anglais', '2019-03-12 09:00:00', '2019-03-12 11:00:00', 'Terminé', NULL, NULL, NULL),
(3, 1, 3, 'Questionnaire 3', 'Questionnaire Arabe', '2019-03-01 09:00:00', '2019-03-01 10:00:00', 'Terminé', 2019, NULL, 3),
(4, 2, 4, 'Questionnaire 4', 'Questionnaire Francais', '2019-03-10 06:00:00', '2019-03-10 15:00:00', 'Terminé', NULL, NULL, NULL),
(5, 2, 5, 'Questionnaire 5', 'Questionnaire ISIC', '2019-03-10 08:00:00', '2019-03-10 09:00:00', 'Terminé', 2020, 1, NULL),
(6, 2, 3, 'Questionnaire 6', 'Questionnaire OAPI', '2019-03-11 14:00:00', '2019-03-11 15:00:00', 'Terminé', 2020, NULL, 1),
(12, 1, 1, 'Questionnaire Tinder', 'Etre un charo', '2019-03-26 10:00:00', '2019-03-27 10:00:00', 'Non commencé', 2020, NULL, NULL),
(13, 2, 1, 'lala', 'Teletubies', '2019-03-20 10:32:00', '2019-03-23 12:25:00', 'Terminé', NULL, NULL, NULL),
(14, 2, 1, 'Projet web', 'Verifier les connaissances.', '2019-03-24 20:10:00', '2019-03-24 20:15:00', 'Terminé', 2020, NULL, NULL);

--
-- Vider la table avant d'insérer `reliee_a`
--

TRUNCATE TABLE `reliee_a`;
--
-- Contenu de la table `reliee_a`
--

INSERT INTO `reliee_a` (`ID_REPONSESP`, `REP_ID_REPONSESP`) VALUES
(7, 8),
(9, 10),
(11, 12);

--
-- Vider la table avant d'insérer `reponse_choisie`
--

TRUNCATE TABLE `reponse_choisie`;
--
-- Contenu de la table `reponse_choisie`
--

INSERT INTO `reponse_choisie` (`ID_REPONSEC`, `ID_USER`, `ID_QUESTION`, `EST_JUSTE_C`) VALUES
(16, 3, 1, 1),
(17, 3, 1, 1),
(18, 3, 13, 1),
(19, 3, 14, 1),
(20, 4, 1, 1),
(21, 4, 1, 0),
(22, 4, 13, 1),
(23, 4, 14, 0),
(24, 5, 1, 0),
(25, 5, 1, 0),
(26, 5, 13, 0),
(27, 5, 14, 0);

--
-- Vider la table avant d'insérer `reponse_proposee`
--

TRUNCATE TABLE `reponse_proposee`;
--
-- Contenu de la table `reponse_proposee`
--

INSERT INTO `reponse_proposee` (`ID_REPONSESP`, `ID_QUESTION`, `EST_JUSTE_P`, `COLONNE`, `CONTENU`) VALUES
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
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`LOGIN`, `PASSWORD`, `NOM`, `PRENOM`, `EMAIL`, `ROLE`, `ID_USER`, `MATRICULE`, `INTERN_EXT`, `MATIERE`, `PROMO`, `TD`, `GROUPE`) VALUES
('Luc', '123', 'Fabresse', 'Luc', 'luc.fabresse@imt-lille-douai.fr', 'Enseignant', 1, 1234, 0, 'C', NULL, NULL, NULL),
('Remy', '456', 'Pinot', 'Remy', 'remy.pinot@imt-lille-douai.fr', 'Enseignant', 2, 5678, 0, 'SGBD', NULL, NULL, NULL),
('toto', '789', 'Malidin', 'Thomas', 'thomas.malidin@etu.imt-lille-douai.fr', 'Etudiant', 3, NULL, NULL, NULL, 2020, 6, 2),
('Mymy', '147', 'Barrau', 'Myriam', 'myriam.barrau@etu.imt-lille-douai.fr', 'Etudiant', 4, NULL, NULL, NULL, 2019, 5, 1),
('Clara', '258', 'Fournier', 'Clara', 'clara.fournier@etu.imt-lille-douai.fr', 'Etudiant', 5, NULL, NULL, NULL, 2021, 7, 1),
('coco', '159', 'Devaux', 'Coline', 'coco@etu.imt-lille-douai.fr', 'Etudiant', 6, NULL, NULL, NULL, 159, 1, 1),
('max', 'azerty123', 'Fuchs', 'Maxime', 'm.f@mail.com', 'Etudiant', 7, NULL, NULL, NULL, 2020, 6, 1);
