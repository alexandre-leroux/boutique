-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 15 fév. 2021 à 13:31
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `categorie_id_categorie` int(11) NOT NULL,
  `marques_id_marques` int(11) NOT NULL,
  `sous_cat_accessoires_id_sous_cat_accessoires` int(11) DEFAULT NULL,
  `art_nom` varchar(45) NOT NULL,
  `art_courte_desprition` varchar(255) NOT NULL,
  `art_description` longtext NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `raq_poids` int(11) DEFAULT NULL,
  `raq_tamis` int(11) DEFAULT NULL,
  `raq_taille_manche` int(11) DEFAULT NULL,
  `raq_equilibre` int(11) DEFAULT NULL,
  `cor_jauge` int(11) DEFAULT NULL,
  `sac_thermobag` int(11) DEFAULT NULL,
  `bal_conditionnement` varchar(45) DEFAULT NULL,
  `bal_type` varchar(45) DEFAULT NULL,
  `acc_type` varchar(45) DEFAULT NULL,
  `acc_grip_eppaisseur` int(11) DEFAULT NULL,
  `acc_grip_couleur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marques` int(11) NOT NULL,
  `marques_nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sous_cat_accessoires`
--

CREATE TABLE `sous_cat_accessoires` (
  `id_sous_cat_accessoires` int(11) NOT NULL,
  `sous_cat_acc_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateurs` int(11) NOT NULL,
  `uti_droits` int(11) NOT NULL,
  `uti_nom` varchar(45) NOT NULL,
  `uti_prenom` varchar(45) NOT NULL,
  `uti_mail` varchar(100) NOT NULL,
  `uti_tel` varchar(45) DEFAULT NULL,
  `uti_motdepasse` varchar(45) NOT NULL,
  `uti_rue` varchar(100) NOT NULL,
  `uti_coe_postal` int(11) NOT NULL,
  `uti_ville` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`,`categorie_id_categorie`,`marques_id_marques`),
  ADD KEY `fk_articles_categorie_idx` (`categorie_id_categorie`),
  ADD KEY `fk_articles_marques1_idx` (`marques_id_marques`),
  ADD KEY `fk_articles_sous_cat_accessoires1_idx` (`sous_cat_accessoires_id_sous_cat_accessoires`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_articles`,`id_utilisateurs`,`id_commande`),
  ADD KEY `fk_articles_has_utilisateurs_utilisateurs1_idx` (`id_utilisateurs`),
  ADD KEY `fk_articles_has_utilisateurs_articles1_idx` (`id_articles`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id_marques`);

--
-- Index pour la table `sous_cat_accessoires`
--
ALTER TABLE `sous_cat_accessoires`
  ADD PRIMARY KEY (`id_sous_cat_accessoires`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marques` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_cat_accessoires`
--
ALTER TABLE `sous_cat_accessoires`
  MODIFY `id_sous_cat_accessoires` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_categorie` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_marques1` FOREIGN KEY (`marques_id_marques`) REFERENCES `marques` (`id_marques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_sous_cat_accessoires1` FOREIGN KEY (`sous_cat_accessoires_id_sous_cat_accessoires`) REFERENCES `sous_cat_accessoires` (`id_sous_cat_accessoires`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_articles_has_utilisateurs_articles1` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_has_utilisateurs_utilisateurs1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id_utilisateurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
