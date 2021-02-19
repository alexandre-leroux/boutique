-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 19 fév. 2021 à 13:21
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
  `id_categorie` int(11) NOT NULL,
  `id_marques` int(11) NOT NULL,
  `id_sous_cat_acc` int(11) DEFAULT NULL,
  `id_balle_type` int(11) DEFAULT NULL,
  `id_balle_conditionnement` int(11) DEFAULT NULL,
  `art_nom` varchar(45) NOT NULL,
  `art_courte_description` varchar(255) NOT NULL,
  `art_description` longtext NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `art_date` datetime NOT NULL,
  `raq_poids` int(11) DEFAULT NULL,
  `raq_tamis` int(11) DEFAULT NULL,
  `raq_taille_manche` int(11) DEFAULT NULL,
  `raq_equilibre` int(11) DEFAULT NULL,
  `cor_jauge` int(11) DEFAULT NULL,
  `sac_thermobag` int(11) DEFAULT NULL,
  `acc_grip_eppaisseur` int(11) DEFAULT NULL,
  `acc_grip_couleur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `id_categorie`, `id_marques`, `id_sous_cat_acc`, `id_balle_type`, `id_balle_conditionnement`, `art_nom`, `art_courte_description`, `art_description`, `stock`, `prix`, `art_date`, `raq_poids`, `raq_tamis`, `raq_taille_manche`, `raq_equilibre`, `cor_jauge`, `sac_thermobag`, `acc_grip_eppaisseur`, `acc_grip_couleur`) VALUES
(1, 1, 1, NULL, NULL, NULL, 'PURE AERO TEAMa', 'Voicia la dernière version 2019-2021 de la fameuse raquette de tennis Babolat Pure Aero utilisée par Rafael Nadal, Jo-Wilfried Tsonga et Caroline Wozniacki ! La version Team à 285 grammes pour plus de stabilité et plus de précision...', 'LESa MAGASINS SPORTSYSTEM VOUS PROPOSENT LA DERNIÈRE VERSION DE LA RAQUETTE BABOLAT PURE AERO 2019 DANS UNE VERSION AVEC UN POIDS INTERMÉDIAIRE À 285 GRAMMES ! UNE RAQUETTE POUR LES JOUEURS QUI RECHERCHENT LE LIFT AVEC ENCORE PLUS DE CONTRÔLE ET DE STABILITÉ !\r\nCette nouvelle Pure Aero 2019 procure toujours une prise d\'effets incroyable grâce à son profil Aero Modular dernière génération et au FSI Spin. Un aérodynamisme exceptionnel et un passage rapide de la tête de raquette pour un lift efficace ! Son plan de cordage exclusif permet une meilleure accroche de la balle lors de la frappe. Elle possède les mêmes caractéristiques techniques que la version précédente mais a été améliorée.\r\n\r\nLa nouveauté réside dans l\'ajout du Carbonply Stabilizer, et du Cortex Pure Feel, développées par Chomarat et Smac. Ces 2 sociétés françaises à la pointe de la technologies sont leaders dans les domaines des matériaux composites et des solutions innovantes. Ces technologies assurent à la raquette plus de stabilité et plus de confort à l\'impact pour moins de vibrations et plus de précision.\r\n\r\nUn meilleur feeling et plus de maitrise dans vos coups...', 30, 170, '2021-02-18 12:14:07', 290, 650, 6, 30, NULL, NULL, NULL, NULL),
(2, 2, 6, NULL, NULL, NULL, 'THERMOBAGa 12 2DUNLOP SX PERFORMANCE', 'Un super sac dea tennis Dunlop Thermobag 12', 'Le saca de tennis Dunlop Thermobag 3 SX Performance est très bien fini et possède une structure semi-rigide pour qu\'il se tienne toujours bien.\r\n\r\nSes 3 grands compartiments assurent un rangement parfait et une excellente protection :\r\n\r\n- 1 compartiment latéral avec protection isotherme pour ranger jusqu\'à 5 raquettes\r\n\r\n\r\n- 1 compartiment central ventilé avec possibilité de séparer vos affaires grâce à 2 panneaux amovibles\r\n\r\n- 1 compartiment latéral pour ranger le reste de vos affaires\r\n\r\nIl possède également 2 petites pochettes extérieures pour les accessoires. Ses 2 bretelles rembourrées et réglables rendent ce sac très agréable à porter avec un minimum de fatigue...\r\n\r\nDimensions (cm.) : L77 x H35 x P46\r\n\r\nCapacité (litres) : 80', 54, 110, '2021-02-18 12:15:41', NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL, 'LYNX TOUR (200M)a', 'Le cordage Heaad aLynx Tour est un nouveau cordage co-polyester avec une coupe unique à 6 facettes pour un mix maximal de contrôle et de lift ! Conditionnement bobine de 200 mètres.', 'Le nouveau cordage Head Lynx Tour aa été développé en collaboration avec les meilleurs joueurs pros Head.\r\n\r\nConditionnement bobine de 200 mètres.\r\n\r\nCette nouvelle version possède 6 facettes afin d\'assurer un mix incroyable entre contrôle et prise d\'effets.\r\n\r\nCe cordage en co-polyester offre toujours un excellent toucher et du contrôle grâce à sa formule co-polymère le rendant plus agréable à jouer qu\'un polyester classique.', 56, 112, '2021-02-18 12:17:18', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL),
(4, 4, 4, NULL, 4, 1, 'TUBE 4 BALLES HEAD TOUR XT', 'Laa nouvelle balle de tennis Head 2020 haut de gamme ! La balle Head Tour XT pour une meilleure maitrise des coups..', 'Laa balle de tennis Head Tour XT est d\"rivée de la Head Tour en apportant plus de toucher et de contrôle grâce à sa technologie Impact EnCore qui délivre une meilleure maitrise pour des coups plus précis', 97, 14, '2021-02-18 12:18:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 4, 1, NULL, NULL, 'RESI PRO GRIP PRINCE', 'Le grip de remplacement Prince ResiPro est à la fois assez confortable et et procure un toucher qui procure de très bonnes sensations...', 'GRIP PROCURANT UNE EXCELLENTE PRISE DE RAQUETTE \'SECHE\' POUR DE TRES BONNE SENSATIONS ET UNE TRES BONNE ACCROCHE.', 52, 6, '2021-02-18 12:20:01', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'bleu'),
(6, 5, 3, 2, NULL, NULL, 'ANTIVIBRATEURa ZVEREV DAMPENER', 'L\'antivibrateur utilisé par aAlexander Sacha Zverev sur le circuit ATP aux couleurs de sa raquette Head Gravity !', 'C\'est al\'antivibrateur utilisé par Alexander Sacha Zverev sur le circuit Atp au couleur de sa fameuse raquette Head Gravity.\r\n\r\nRéduction des vibrations des cordes contre le tennis-elbow. Se clip entre les 2 cordes centrales. \r\n\r\nVendu par 2.', 523, 6, '2021-02-19 12:20:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `balle_conditionnement`
--

CREATE TABLE `balle_conditionnement` (
  `id_balle_conditionnement` int(11) NOT NULL,
  `balle_conditionnement` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `balle_conditionnement`
--

INSERT INTO `balle_conditionnement` (`id_balle_conditionnement`, `balle_conditionnement`) VALUES
(1, 'tube'),
(2, 'baril'),
(3, 'carton');

-- --------------------------------------------------------

--
-- Structure de la table `balle_type`
--

CREATE TABLE `balle_type` (
  `id_balle_type` int(11) NOT NULL,
  `balle_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `balle_type`
--

INSERT INTO `balle_type` (`id_balle_type`, `balle_type`) VALUES
(1, 'pression'),
(2, 'sans pression'),
(3, 'mini-tennis'),
(4, 'mousse');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie_type`) VALUES
(1, 'raquette'),
(2, 'sacs'),
(3, 'cordage'),
(4, 'balles'),
(5, 'accessoires');

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
-- Structure de la table `images_articles`
--

CREATE TABLE `images_articles` (
  `id` int(11) NOT NULL,
  `id_articles` int(11) DEFAULT NULL,
  `chemin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images_articles`
--

INSERT INTO `images_articles` (`id`, `id_articles`, `chemin`) VALUES
(1, 1, '1-1.jpg'),
(3, 2, '2-1.jpg'),
(4, 2, '2-2.jpg'),
(5, 2, '2-3.jpg'),
(7, 3, '3-1.jpg'),
(8, 4, '4-1.jpg'),
(9, 5, '5-1.jpg'),
(10, 6, '6-1.jpg'),
(11, 6, '6-2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marques` int(11) NOT NULL,
  `marques_nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marques`, `marques_nom`) VALUES
(1, 'babolat'),
(2, 'wilson'),
(3, 'head'),
(4, 'prince'),
(5, 'technifibre'),
(6, 'dunlop'),
(7, 'yonex');

-- --------------------------------------------------------

--
-- Structure de la table `sous_cat_accessoires`
--

CREATE TABLE `sous_cat_accessoires` (
  `id_sous_cat_accessoires` int(11) NOT NULL,
  `sous_cat_acc_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_cat_accessoires`
--

INSERT INTO `sous_cat_accessoires` (`id_sous_cat_accessoires`, `sous_cat_acc_type`) VALUES
(1, 'grip'),
(2, 'anti-vibration');

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
  ADD PRIMARY KEY (`id_articles`,`id_categorie`,`id_marques`),
  ADD KEY `fk_articles_categorie_idx` (`id_categorie`),
  ADD KEY `fk_articles_marques1_idx` (`id_marques`),
  ADD KEY `fk_articles_sous_cat_accessoires1_idx` (`id_sous_cat_acc`),
  ADD KEY `fk_articles_balle_type1_idx` (`id_balle_type`),
  ADD KEY `fk_articles_balle_conditionnement1_idx` (`id_balle_conditionnement`);

--
-- Index pour la table `balle_conditionnement`
--
ALTER TABLE `balle_conditionnement`
  ADD PRIMARY KEY (`id_balle_conditionnement`);

--
-- Index pour la table `balle_type`
--
ALTER TABLE `balle_type`
  ADD PRIMARY KEY (`id_balle_type`);

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
-- Index pour la table `images_articles`
--
ALTER TABLE `images_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_articles_articles1_idx` (`id_articles`);

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
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `balle_conditionnement`
--
ALTER TABLE `balle_conditionnement`
  MODIFY `id_balle_conditionnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `balle_type`
--
ALTER TABLE `balle_type`
  MODIFY `id_balle_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `images_articles`
--
ALTER TABLE `images_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sous_cat_accessoires`
--
ALTER TABLE `sous_cat_accessoires`
  MODIFY `id_sous_cat_accessoires` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_articles_balle_conditionnement1` FOREIGN KEY (`id_balle_conditionnement`) REFERENCES `balle_conditionnement` (`id_balle_conditionnement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_balle_type1` FOREIGN KEY (`id_balle_type`) REFERENCES `balle_type` (`id_balle_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_marques1` FOREIGN KEY (`id_marques`) REFERENCES `marques` (`id_marques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_sous_cat_accessoires1` FOREIGN KEY (`id_sous_cat_acc`) REFERENCES `sous_cat_accessoires` (`id_sous_cat_accessoires`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_articles_has_utilisateurs_articles1` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_has_utilisateurs_utilisateurs1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id_utilisateurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `images_articles`
--
ALTER TABLE `images_articles`
  ADD CONSTRAINT `fk_images_articles_articles1` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
