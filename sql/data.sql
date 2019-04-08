-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Avril 2019 à 16:01
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
-- Vider la table avant d'insérer `consigne`
--

TRUNCATE TABLE `consigne`;
--
-- Contenu de la table `consigne`
--

INSERT INTO `consigne` (`ID_CONSIGNE`, `TEMPS`, `BAREME`, `RETOUR`) VALUES
(1, 30, 20, 1);

--
-- Vider la table avant d'insérer `est_compose`
--

TRUNCATE TABLE `est_compose`;
--
-- Contenu de la table `est_compose`
--

INSERT INTO `est_compose` (`ID_QUESTION`, `ID_QUESTIONNAIRE`) VALUES
(17, 29),
(18, 29),
(19, 29),
(20, 30),
(21, 30),
(22, 30),
(23, 37),
(24, 37),
(25, 37),
(26, 38),
(27, 38),
(28, 38),
(29, 38),
(30, 39);

--
-- Vider la table avant d'insérer `participe`
--

TRUNCATE TABLE `participe`;
--
-- Contenu de la table `participe`
--

INSERT INTO `participe` (`ID_USER`, `ID_QUESTIONNAIRE`) VALUES
(4, 29),
(7, 29),
(8, 29),
(7, 37),
(8, 37),
(7, 38),
(7, 39),
(8, 39);

--
-- Vider la table avant d'insérer `question`
--

TRUNCATE TABLE `question`;
--
-- Contenu de la table `question`
--

INSERT INTO `question` (`ID_QUESTION`, `ID_CONSIGNE`, `TAG`, `TYPE_QUESTION`, `NB_REPONSES`, `DESCRIPTION_QUESTION`) VALUES
(17, 1, 'C', 'QCU', 3, 'Quel est le langage utilisé ?'),
(18, 1, 'thème', 'LIBRE', 1, 'Le thème préféré de Luc Fabresse ?'),
(19, 1, 'symbole', 'LIBRE', 1, 'Quel est le symbole pour donner une adresse mémoire en C ?'),
(20, 1, 'mcd', 'QCU', 3, 'Que veut dire MCD ?'),
(21, 1, 'mdl', 'QCU', 2, 'MLD ?'),
(22, 1, 'methode', 'LIBRE', 1, 'La méthode utilisée en SGBD ?\r\n( Indice : commence par \'Me\' et finit par \'ise\' )'),
(23, 1, 'util', 'QCM', 5, 'Utilisation de powerAMC'),
(24, 1, 'RP', 'QCU', 2, 'Remy Pinot aime-t-il PowerAMC ?'),
(25, 1, 'init', 'LIBRE', 1, 'Initiales de Service de Gestion de Base de Données'),
(26, 1, 'nb', 'QCU', 4, 'Combien y a-t-il de joueurs par équipe ?'),
(27, 1, 'goat', 'QCU', 5, 'Le meilleur joueur de tous les temps ?'),
(28, 1, 'noms', 'ASSIGNE', 12, 'Relier les nom et prénoms'),
(29, 1, 'geo', 'ASSIGNE', 12, 'Relier villes et franchises'),
(30, 1, 'langue', 'ASSIGNE', 10, 'Relier anglais et français');

--
-- Vider la table avant d'insérer `questionnaire`
--

TRUNCATE TABLE `questionnaire`;
--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`ID_QUESTIONNAIRE`, `ID_USER`, `ID_CONSIGNE`, `TITRE`, `DESCRIPTION_QUESTIONNAIRE`, `DATE_OUVERTURE`, `DATE_FERMETURE`, `ETAT`, `PROMO`, `GROUPE`, `TD`) VALUES
(29, 1, 1, 'Le langage C', 'Test sur les pointeurs', '2019-04-08 00:00:00', '2019-04-28 23:00:00', 'En cours', NULL, NULL, NULL),
(30, 2, 1, 'SGBD 2A', 'Modèles MCD et MLD', '2019-04-09 00:00:00', '2019-04-14 23:00:00', 'Non commencé', 2020, NULL, NULL),
(37, 2, 1, 'PowerAMC', 'Utilisation du logiciel', '2019-04-08 00:00:00', '2019-04-08 23:00:00', 'En cours', 2020, NULL, 6),
(38, 2, 1, 'Basket', 'Les joueurs', '2019-04-08 00:00:00', '2019-06-23 23:00:00', 'En cours', NULL, NULL, NULL),
(39, 1, 1, 'Assignement', 'Anglais-Français', '2019-04-08 00:00:00', '2019-04-08 23:00:00', 'En cours', NULL, NULL, NULL);

--
-- Vider la table avant d'insérer `reliee_a`
--

TRUNCATE TABLE `reliee_a`;
--
-- Contenu de la table `reliee_a`
--

INSERT INTO `reliee_a` (`ID_REPONSESP`, `REP_ID_REPONSESP`) VALUES
(52, 53),
(54, 55),
(56, 57),
(58, 59),
(60, 61),
(62, 63),
(64, 65),
(66, 67),
(68, 69),
(70, 71),
(72, 73),
(74, 75),
(76, 77),
(78, 79),
(80, 81),
(82, 83),
(84, 85);

--
-- Vider la table avant d'insérer `reponse_choisie`
--

TRUNCATE TABLE `reponse_choisie`;
--
-- Contenu de la table `reponse_choisie`
--

INSERT INTO `reponse_choisie` (`ID_REPONSEC`, `ID_USER`, `ID_QUESTION`, `EST_JUSTE_C`) VALUES
(28, 7, 17, 1),
(29, 7, 18, 0),
(30, 7, 19, 1),
(31, 4, 17, 0),
(32, 4, 18, 0),
(33, 4, 19, 1),
(34, 8, 17, 1),
(35, 8, 18, 1),
(36, 8, 19, 1),
(37, 7, 23, 1),
(38, 7, 24, 1),
(39, 7, 25, 1),
(40, 8, 23, 0),
(41, 8, 24, 1),
(42, 8, 25, 0),
(43, 8, 30, 1),
(44, 7, 30, 0),
(45, 7, 26, 1),
(46, 7, 27, 1),
(47, 7, 28, 1),
(48, 7, 29, 1);

--
-- Vider la table avant d'insérer `reponse_proposee`
--

TRUNCATE TABLE `reponse_proposee`;
--
-- Contenu de la table `reponse_proposee`
--

INSERT INTO `reponse_proposee` (`ID_REPONSESP`, `ID_QUESTION`, `EST_JUSTE_P`, `COLONNE`, `CONTENU`) VALUES
(24, 17, 0, NULL, 'PHP'),
(25, 17, 0, NULL, 'JAVA'),
(26, 17, 1, NULL, 'C'),
(27, 18, 1, NULL, 'StarWars'),
(28, 19, 1, NULL, '&'),
(29, 20, 0, NULL, 'Modèle Constitutionnel des Départements'),
(30, 20, 1, NULL, 'Modèle Conceptuel de Données'),
(31, 20, 0, NULL, 'Pas de signification'),
(32, 21, 1, NULL, 'Modèle Logique de Données'),
(33, 21, 0, NULL, 'Maitre Lapin de Douai'),
(34, 22, 1, NULL, 'Merise'),
(35, 23, 1, NULL, 'Projet web'),
(36, 23, 1, NULL, 'Projet perso'),
(37, 23, 0, NULL, 'Acheter du pain'),
(38, 23, 0, NULL, 'Faire la vaisselle'),
(39, 23, 1, NULL, 'Organiser des bases de données'),
(40, 24, 1, NULL, 'Oui'),
(41, 24, 0, NULL, 'Non'),
(42, 25, 1, NULL, 'SGBD'),
(43, 26, 0, NULL, '2'),
(44, 26, 0, NULL, '3'),
(45, 26, 1, NULL, '5'),
(46, 26, 0, NULL, '7'),
(47, 27, 0, NULL, 'Kobe Bryant'),
(48, 27, 1, NULL, 'Michael Jordan'),
(49, 27, 0, NULL, 'Tony Parker'),
(50, 27, 0, NULL, 'Lebron James'),
(51, 27, 0, NULL, 'JR Smith'),
(52, 28, 1, 0, 'Nicolas'),
(53, 28, 1, 1, 'Batum'),
(54, 28, 1, 0, 'Boris'),
(55, 28, 1, 1, 'Diaw'),
(56, 28, 1, 0, 'Stephen'),
(57, 28, 1, 1, 'Curry'),
(58, 28, 1, 0, 'Russell'),
(59, 28, 1, 1, 'Westbrook'),
(60, 28, 1, 0, 'James'),
(61, 28, 1, 1, 'Harden'),
(62, 28, 1, 0, 'Lebron'),
(63, 28, 1, 1, 'James'),
(64, 29, 1, 0, 'San Antonio'),
(65, 29, 1, 1, 'Spurs'),
(66, 29, 1, 0, 'Chicago'),
(67, 29, 1, 1, 'Bulls'),
(68, 29, 1, 0, 'Los Angeles'),
(69, 29, 1, 1, 'Lakers'),
(70, 29, 1, 0, 'New York'),
(71, 29, 1, 1, 'Knicks'),
(72, 29, 1, 0, 'Sacramento'),
(73, 29, 1, 1, 'Kings'),
(74, 29, 1, 0, 'Miami'),
(75, 29, 1, 1, 'Heat'),
(76, 30, 1, 0, 'red'),
(77, 30, 1, 1, 'rouge'),
(78, 30, 1, 0, 'blue'),
(79, 30, 1, 1, 'bleu'),
(80, 30, 1, 0, 'jaune'),
(81, 30, 1, 1, 'yellow'),
(82, 30, 1, 0, 'green'),
(83, 30, 1, 1, 'vert'),
(84, 30, 1, 0, 'rose'),
(85, 30, 1, 1, 'pink');

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
('max', 'azerty123', 'Fuchs', 'Maxime', 'm.f@mail.com', 'Etudiant', 7, NULL, NULL, NULL, 2020, 6, 1),
('Alix', '123456789', 'Moret', 'Alix', 'a.m@mail.com', 'Etudiant', 8, NULL, NULL, NULL, 2020, 6, 1);
