-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Septembre 2016 à 22:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `maman`
--

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `information`
--

INSERT INTO `information` (`id_info`, `date_debut`, `date_fin`) VALUES
(1, '2016-02-18 19:21:58', '2016-02-18 19:41:58');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL,
  `question` text NOT NULL,
  `chapitre` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `matiere` text NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `chapitre`, `commentaire`, `matiere`) VALUES
(1, 'Structurer l’entreprise est nécessaire à son efficacité', 0, '', ''),
(2, 'La structure est l’unique facteur d’efficacité dans une entreprise', 0, '', ''),
(3, 'L’organigramme est une représentation schématisée de la structure de l’entreprise', 0, '', ''),
(4, 'L’organigramme rend compte de toutes les formes de liaisons dans l’entreprise.', 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `question_tot`
--

CREATE TABLE IF NOT EXISTS `question_tot` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `chapitre` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `matiere` text NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `question_tot`
--

INSERT INTO `question_tot` (`id_question`, `question`, `chapitre`, `commentaire`, `matiere`) VALUES
(1, 'Structurer l’entreprise est nécessaire à son efficacité', 0, '', ''),
(2, 'La structure est l’unique facteur d’efficacité dans une entreprise', 0, '', ''),
(3, 'L’organigramme est une représentation schématisée de la structure de l’entreprise', 0, '', ''),
(4, 'L’organigramme rend compte de toutes les formes de liaisons dans l’entreprise.', 0, '', ''),
(5, 'La spécialisation est la façon de décomposer l’entreprise en parties et sous parties', 0, '', ''),
(6, 'La spécialisation de l’entreprise se fait toujours par produit', 0, '', ''),
(7, 'La coordination hiérarchique correspond à un mode de coordination verticale', 0, '', ''),
(8, 'La coordination hiérarchique est le mode de coordination le plus fréquent dans les entreprise', 0, '', ''),
(9, 'La coordination par un chef de projet est un mode de coordination horizontale', 0, '', ''),
(10, 'Le degré de formalisation est plus important dans une entreprise de type organique que dans une entreprise de type mécaniste', 0, '', ''),
(11, 'La structure de l’entreprise répond à la question fondamentale  : comment diviser le travail  ?', 0, '', ''),
(12, 'La structure de l’entreprise répond à la question fondamentale  : comment réaliser les objectifs  ?', 0, '', ''),
(13, 'La structure d’une entreprise se limite seulement à l’organigramme de l’entreprise.', 0, '', ''),
(14, 'La configuration structurelle d’une entreprise dépend toujours de ses objectifs stratégiques.', 0, '', ''),
(15, 'La spécialisation du travail correspond à un découpage du métier de l’entreprise en série d’étapes. ', 0, '', ''),
(16, 'La répartition de l’autorité implique de déléguer du pouvoir et des responsabilités.', 0, '', ''),
(17, 'La décentralisation des décisions est toujours à l’origine de conflits de pouvoir.', 0, '', ''),
(18, 'Il existe des entreprises qui n’emploient pas de mécanismes de coordination', 0, '', ''),
(19, 'La structure fonctionnelle peut engendrer des problèmes de coordination  ;', 0, '', ''),
(20, 'La structure matricielle croise les missions et les moyens des fonctions de l’entreprise.', 0, '', ''),
(21, 'La structure ne permet pas de réponse à l’une de ces questions, laquelle  ?', 0, '', ''),
(22, 'La structure ne permet pas de réponse à l’une de ces questions, laquelle  ?', 0, '', ''),
(23, 'Parmi les paramètres suivants, repérez l’intrus  :', 0, '', ''),
(24, 'Parmi les affirmations suivantes, repérez celle qui caractérise la spécialisation du travail  :', 0, '', ''),
(25, 'Parmi les conséquences suivantes, laquelle ne résulte pas de la répartition de l’autorité  :', 0, '', ''),
(26, 'Parmi les conséquences suivantes, laquelle ne résulte pas de la décentralisation des décisions  :', 0, '', ''),
(27, 'Parmi les mécanismes de coordination suivants, repérez l’intrus  :', 0, '', ''),
(28, 'Quelle est la caractéristique qui ne relève pas de la structure entrepreneuriale  ?', 0, '', ''),
(29, 'La structure fonctionnelle ne rend pas nécessaire la mise en place  :', 0, '', ''),
(30, 'Quelle est la caractéristique qui ne relève pas de la structure divisionnelle  ?', 0, '', ''),
(31, 'La structure d’une entreprise permet  :', 0, '', ''),
(32, 'La structure matricielle repose sur le principe', 0, '', ''),
(33, 'Selon Mintzberg, le sommet stratégique est constitué par  :', 0, '', ''),
(34, 'La théorie de la contingence affirme que la structure d’une entreprise dépend de son environnement', 0, '', ''),
(35, 'L’environnement est un facteur de contingence déterminant', 0, '', ''),
(36, 'Il existe un modèle de structure d’entreprise optimum', 0, '', ''),
(37, 'L’augmentation de la taille d’une entreprise a des répercussions sur la décentralisation des décisions.', 0, '', ''),
(38, 'Les modes de production n’ont pas d’effets sur la structure de l’entreprise', 0, '', ''),
(39, 'Les choix stratégiques d’une entreprise dépendent de sa structure  ', 0, '', ''),
(40, 'Les configurations structurelles ne sont pas toutes adaptées à l’évolution de l’environnement', 0, '', ''),
(41, 'Une structure mécanique est une structure qui réagit à un environnement instable.', 0, '', ''),
(42, 'Une structure organique est une structure adaptée à un environnement instable.', 0, '', ''),
(43, 'Parmi les affirmations suivantes, laquelle ne découle pas de la théorie de la contingence  ?', 0, '', ''),
(44, 'Parmi les paramètres suivants, trouvez l’intrus  :', 0, '', ''),
(45, 'Parmi les conséquences suivantes, laquelle ne résulte pas de l’augmentation de la taille de l’entreprise  ?', 0, '', ''),
(46, 'Parmi les productions suivantes, repérez celle qui ne correspond pas à la technologie selon Joan Woodward  :', 0, '', ''),
(47, 'L’évolution technologique d’une entreprise exerce une influence déterminante sur  :', 0, '', ''),
(48, 'Pour  Lawrence et Lorsch, plus l’environnement est incertain  :', 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `ref_question` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `reponse`, `ref_question`, `state`) VALUES
(1, 'blanc', 1, 1),
(2, 'noir', 1, 0),
(3, 'Vrai', 2, 1),
(4, 'Faux', 2, 0),
(5, 'VRAI', 3, 1),
(6, 'FAUX', 3, 0),
(7, 'FAUX', 4, 1),
(8, 'VRAI', 4, 0),
(92, 'VRAI', 35, 1),
(93, 'FAUX', 35, 0),
(108, 'Il existe un lien entre la structure de l’entreprise et son contexte.', 43, 0),
(109, 'Une bonne structure est une structure adaptée à son environnement.', 43, 0),
(110, 'Il existe une structure idéale pour chaque type d’environnement', 43, 1),
(111, 'Dans un même environnement, des structures différentes peuvent être également performantes.', 43, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_tot`
--

CREATE TABLE IF NOT EXISTS `reponse_tot` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `ref_question` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Contenu de la table `reponse_tot`
--

INSERT INTO `reponse_tot` (`id_reponse`, `reponse`, `ref_question`, `state`) VALUES
(1, 'VRAI', 1, 1),
(2, 'FAUX', 1, 0),
(3, 'FAUX', 2, 1),
(4, 'VRAI', 2, 0),
(5, 'VRAI', 3, 1),
(6, 'FAUX', 3, 0),
(7, 'FAUX', 4, 1),
(8, 'VRAI', 4, 0),
(9, 'VRAI', 5, 1),
(10, 'FAUX', 5, 0),
(11, 'FAUX', 6, 1),
(12, 'VRAI', 6, 0),
(13, 'VRAI', 7, 1),
(14, 'FAUX', 7, 0),
(15, 'VRAI', 8, 1),
(16, 'FAUX', 8, 0),
(17, 'VRAI', 9, 1),
(18, 'FAUX', 9, 0),
(19, 'FAUX', 10, 1),
(20, 'VRAI', 10, 0),
(21, 'VRAI', 11, 1),
(22, 'FAUX', 11, 0),
(23, 'FAUX', 12, 1),
(24, 'VRAI', 0, 0),
(25, 'FAUX', 13, 1),
(26, 'VRAI', 0, 0),
(27, 'VRAI', 14, 1),
(28, 'FAUX', 0, 0),
(29, 'VRAI', 15, 1),
(30, 'FAUX', 0, 0),
(31, 'VRAI', 16, 1),
(32, 'FAUX', 0, 0),
(33, 'FAUX', 17, 1),
(34, 'VRAI', 0, 0),
(35, 'FAUX', 18, 1),
(36, 'FAUX', 0, 0),
(37, 'FAUX', 19, 1),
(38, 'VRAI', 0, 0),
(39, 'FAUX', 20, 1),
(40, 'VRAI', 20, 0),
(41, 'Comment découper le travail en activités ou en taches  ?', 21, 0),
(42, 'Quelles liaisons établir entre les unités fonctionnelles  ?', 21, 0),
(43, 'Quelles liaisons hiérarchiques établir entre les personnes  ?', 21, 0),
(44, 'Quelle stratégie doit conduire l’entreprise  ?', 21, 1),
(45, 'Spécialisation du travail', 22, 0),
(46, 'Décentralisation des décisions', 22, 0),
(47, 'Répartition du pouvoir', 22, 1),
(48, 'Coordination des tâches', 22, 0),
(49, 'Pose le problème du mode de découpage des activités', 23, 1),
(50, 'Accroît la polyvalence du personnel', 23, 0),
(51, 'Doit toujours s’adapter à la situation spécifique de l’entreprise ', 23, 0),
(52, 'Peut combiner plusieurs critères de regroupement.', 23, 0),
(53, 'Pose le problème du choix du mode de découpage des activités,', 24, 0),
(54, 'Accroît la polyvalence du personnel', 24, 0),
(55, 'Favorise la réactivité des responsables hiérarchiques', 24, 0),
(56, 'Elimine tout risque de conflits de commandement.', 24, 1),
(57, 'Développe la prise de responsabilité et la motivation', 25, 0),
(58, 'Stimule une logique entrepreneuriale dans l’entreprise', 25, 0),
(59, 'Renforce l’uniformisation des décisions', 25, 1),
(60, 'Accroît la réactivité face à l’imprévu.', 25, 0),
(61, 'Standardisation des normes', 26, 0),
(62, 'Ajustement réel', 26, 1),
(63, 'Standardisation des résultats', 26, 0),
(64, 'Supervision directe', 26, 0),
(65, 'Des difficultés d’adaptation au changement', 27, 1),
(66, 'Des procédures et des liaisons peu formalisées', 27, 0),
(67, 'Une répartition des responsabilités parfois imprécise', 27, 0),
(68, 'Une flexibilité collective et une motivation individuelle.', 27, 0),
(69, 'De procédures qui organisent les relations entre différentes fonctions', 28, 0),
(70, 'D’une répartition des compétences entre les différentes fonctions', 28, 0),
(71, 'D’une coordination des fonctions par le sommet hiérarchique', 28, 0),
(72, 'D’un contrôle permanent des activités par le sommet hiérarchique  ;', 28, 1),
(73, 'Une autonomie de décision et de moyens pour chaque division', 29, 0),
(74, 'Une priorité accordée aux résultats de chaque division ', 29, 0),
(75, 'Une flexibilité de l’entreprise face aux changements environnementaux', 29, 1),
(76, 'Une coordination des activités des divisions par le sommet hiérarchique', 29, 0),
(77, 'D’adaptation de l’entreprise au changement stratégique', 30, 0),
(78, 'De définition d’objectifs communs entre les missions ou projets', 30, 1),
(79, 'D’effet de synergie de compétences mobilisées', 30, 0),
(80, 'De conflits entre des collaborateurs rattachés à plusieurs unités', 30, 0),
(81, 'D’identifier les missions des membres de l’entreprise', 31, 1),
(82, 'De déterminer le degré de centralisation', 31, 1),
(83, 'De visualiser les communications  informelles', 31, 0),
(84, 'D’unicité de commandement', 32, 0),
(85, 'De dualité de commandement', 32, 1),
(86, 'De pluralité de commandement', 32, 0),
(87, 'Un ou plusieurs opérateurs', 33, 0),
(88, 'Le personnel de support logistique', 33, 0),
(89, ' par  les dirigeants de l’entreprise', 33, 1),
(90, 'VRAI', 34, 1),
(91, 'FAUX', 34, 0),
(92, 'VRAI', 35, 1),
(93, 'FAUX', 35, 0),
(94, 'VRAI', 36, 0),
(95, 'FAUX', 36, 1),
(96, 'VRAI', 37, 1),
(97, 'FAUX', 37, 0),
(98, 'VRAI', 38, 0),
(99, 'FAUX', 38, 1),
(100, 'VRAI', 39, 0),
(101, 'FAUX', 39, 1),
(102, 'VRAI', 40, 1),
(103, 'FAUX', 40, 0),
(104, 'VRAI', 41, 0),
(105, 'FAUX', 41, 1),
(106, 'VRAI', 42, 1),
(107, 'FAUX', 42, 0),
(108, 'Il existe un lien entre la structure de l’entreprise et son contexte.', 43, 0),
(109, 'Une bonne structure est une structure adaptée à son environnement.', 43, 0),
(110, 'Il existe une structure idéale pour chaque type d’environnement', 43, 1),
(111, 'Dans un même environnement, des structures différentes peuvent être également performantes.', 43, 0),
(112, 'taille', 44, 0),
(113, 'Technologie', 44, 0),
(114, 'Pouvoir', 44, 1),
(115, 'Stratégie.', 44, 0),
(116, 'Une centralisation accrue des décisions', 45, 1),
(117, 'Une extension des niveaux hiérarchiques', 45, 0),
(118, 'Un accroissement des unités spécialisées', 45, 0),
(119, 'Une augmentation du personnel d’encadrement.', 45, 0),
(120, 'La production unitaire ou par petits lots', 46, 0),
(121, 'La production en flux tendus', 46, 1),
(122, 'La production continue', 46, 0),
(123, 'La production de grandes séries.', 46, 0),
(124, 'La ligne hiérarchique', 47, 1),
(125, 'Le personnel de production', 47, 0),
(126, 'Les circuits d’information', 47, 0),
(127, 'Les résultats financiers.', 47, 0),
(128, 'Plus la structure est formalisée', 48, 0),
(129, 'Plus la structure est souple', 48, 1),
(130, 'Plus la structure est hiérarchisée', 48, 0),
(131, 'Plus la structure est rigide.', 48, 0),
(132, 'Vrai', 53, 0),
(133, 'Faux', 53, 1),
(137, 'blanc', 55, 0),
(138, 'rouge', 55, 1);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE IF NOT EXISTS `resultat` (
  `id_resultat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `ref_question` int(11) NOT NULL,
  `point` float NOT NULL,
  PRIMARY KEY (`id_resultat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`id_resultat`, `id_user`, `ref_question`, `point`) VALUES
(42, 12, 1, 1),
(43, 12, 4, 1),
(44, 12, 3, 1),
(45, 12, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` text NOT NULL,
  `first_name_user` text NOT NULL,
  `classe_user` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
