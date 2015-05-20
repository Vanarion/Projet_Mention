-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Mai 2015 à 16:01
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tennis`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE IF NOT EXISTS `equipement` (
  `id_equipement` int(11) NOT NULL,
  `nom_equipement` varchar(50) NOT NULL,
  `prix_equipement` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
`id_joueur` int(11) NOT NULL,
  `nom_joueur` varchar(255) NOT NULL,
  `prenom_joueur` varchar(255) NOT NULL,
  `pays_joueur` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`id_joueur`, `nom_joueur`, `prenom_joueur`, `pays_joueur`) VALUES
(1, 'alex', 'alex', 'alex'),
(2, 'Rablabla', 'Tralala', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `id_match` int(11) NOT NULL,
  `date_match` datetime NOT NULL,
  `estEnCours` tinyint(1) NOT NULL,
  `cours_match` varchar(255) NOT NULL,
  `joueur1_match` int(11) NOT NULL,
  `joueur2_match` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`id_match`, `date_match`, `estEnCours`, `cours_match`, `joueur1_match`, `joueur2_match`) VALUES
(1, '2015-04-21 12:41:51', 1, 'Le cours du match', 1, 2),
(2, '2015-04-29 11:36:34', 1, 'Cnakczank', 1, 2),
(3, '2015-04-29 11:36:34', 1, 'Cnakczank', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
`id_score` int(11) NOT NULL,
  `id_set` int(11) NOT NULL,
  `score_set` int(11) NOT NULL,
  `val_score` int(11) NOT NULL,
  `score_set2` int(11) NOT NULL,
  `val_score2` int(11) NOT NULL,
  `avantage` int(11) NOT NULL,
  `id_joueur1` int(11) NOT NULL,
  `id_joueur2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `score`
--

INSERT INTO `score` (`id_score`, `id_set`, `score_set`, `val_score`, `score_set2`, `val_score2`, `avantage`, `id_joueur1`, `id_joueur2`) VALUES
(1, 0, 1, 0, 15, 15, 0, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_password` char(41) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(2, '', '33a0e4061be498c4944dfe8c99a35b06'),
(3, 'unUser', '33a0e4061be498c4944dfe8c99a35b06'),
(9, 'alex', 'alex'),
(10, 'cyril', '2031c6e347e257cc7b4959c37a7df833'),
(11, 'alexandre.verrier', '7fb47f86999467398257d336f8700b22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
 ADD PRIMARY KEY (`id_equipement`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
 ADD PRIMARY KEY (`id_joueur`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
 ADD PRIMARY KEY (`id_match`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
 ADD PRIMARY KEY (`id_score`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
