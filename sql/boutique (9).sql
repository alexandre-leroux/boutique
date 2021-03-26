-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mars 2021 à 08:39
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
  `mise_en_avant` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `prix` float NOT NULL,
  `art_date` datetime NOT NULL,
  `raq_poids` int(11) DEFAULT NULL,
  `raq_tamis` int(11) DEFAULT NULL,
  `raq_taille_manche` int(11) DEFAULT NULL,
  `raq_equilibre` int(11) DEFAULT NULL,
  `cor_jauge` float DEFAULT NULL,
  `sac_thermobag` int(11) DEFAULT NULL,
  `acc_grip_eppaisseur` float DEFAULT NULL,
  `acc_grip_couleur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `id_categorie`, `id_marques`, `id_sous_cat_acc`, `id_balle_type`, `id_balle_conditionnement`, `art_nom`, `art_courte_description`, `art_description`, `mise_en_avant`, `stock`, `prix`, `art_date`, `raq_poids`, `raq_tamis`, `raq_taille_manche`, `raq_equilibre`, `cor_jauge`, `sac_thermobag`, `acc_grip_eppaisseur`, `acc_grip_couleur`) VALUES
(9, 1, 1, NULL, NULL, NULL, 'PURE AERO RAFA 2021', 'Voici la dernière version 2021 de la fameuse raquette de tennis Babolat Pure Aero utilisée par Rafael Nadal, tout simplement appelée Pure Aero Rafa ! ', 'Cette nouvelle Pure Aero 2019 procure toujours une prise d\'effets incroyable grâce à son profil Aero Modular dernière génération et au FSI Spin. Un aérodynamisme exceptionnel et un passage rapide de la tête de raquette pour un lift efficace ! Son plan de cordage exclusif permet une meilleure accroche de la balle lors de la frappe. Elle possède les mêmes caractéristiques techniques que la version précédente mais a été améliorée.\r\n\r\nLa nouveauté réside dans l\'ajout du Carbonply Stabilizer, et du Cortex Pure Feel, développées par Chomarat et Smac. Ces 2 sociétés françaises à la pointe de la technologies sont leaders dans les domaines des matériaux composites et des solutions innovantes. Ces technologies assurent à la raquette plus de stabilité et plus de confort à l\'impact pour moins de vibrations et plus de précision.\r\n\r\nUn meilleur feeling et plus de maitrise dans vos coups...\r\n\r\nCe modèle est conseillé aux bons joueurs de clubs ou compétition qui jouent beaucoup avec du lift et qui recherchent une raquette assez lourde (300 grammes non cordée) avec de la puissance...', 0, 25, 259.95, '2021-03-25 11:13:20', 300, 645, 3, 320, NULL, NULL, NULL, NULL),
(10, 2, 6, NULL, NULL, NULL, 'THERMOBAG 12 DUNLOP SX PERFORMANCE', 'Un super sac de tennis Dunlop Thermobag 12 qui protégera parfaitement bien vos affaires et vos raquettes.', 'Le sac de tennis Dunlop Thermobag 3 SX Performance est très bien fini et possède une structure semi-rigide pour qu\'il se tienne toujours bien.\r\n\r\nSes 3 grands compartiments assurent un rangement parfait et une excellente protection :\r\n\r\n- 1 compartiment latéral avec protection isotherme pour ranger jusqu\'à 5 raquettes\r\n\r\n\r\n- 1 compartiment central ventilé avec possibilité de séparer vos affaires grâce à 2 panneaux amovibles\r\n\r\n- 1 compartiment latéral pour ranger le reste de vos affaires\r\n\r\nIl possède également 2 petites pochettes extérieures pour les accessoires. Ses 2 bretelles rembourrées et réglables rendent ce sac très agréable à porter avec un minimum de fatigue...\r\n\r\nDimensions (cm.) : L77 x H35 x P46\r\n\r\nCapacité (litres) : 80', 0, 21, 107.95, '2021-03-25 15:27:49', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL),
(11, 3, 3, NULL, NULL, NULL, 'LYNX TOUR (200M)', 'Le cordage Head Lynx Tour est un nouveau cordage co-polyester avec une coupe unique à 6 facettes pour un mix maximal de contrôle et de lift ! Conditionnement bobine de 200 mètres.', 'Le nouveau cordage Head Lynx Tour a été développé en collaboration avec les meilleurs joueurs pros Head.\r\n\r\nConditionnement bobine de 200 mètres.\r\n\r\nCette nouvelle version possède 6 facettes afin d\'assurer un mix incroyable entre contrôle et prise d\'effets.\r\n\r\nCe cordage en co-polyester offre toujours un excellent toucher et du contrôle grâce à sa formule co-polymère le rendant plus agréable à jouer qu\'un polyester classique.', 0, 56, 109.95, '2021-03-25 15:30:25', NULL, NULL, NULL, NULL, 1.25, NULL, NULL, NULL),
(12, 4, 4, NULL, 1, 1, 'TUBE 4 BALLES PRINCE NX TOUR PRO', 'Tube 4 balles Prince NX Tour Pro', 'La Prince NX Tour Pro est une balle pression idéale pour les tournois avec une durabilité supérieure et un confort maximal. \r\nFeutre de haute qualité.', 0, 23, 7, '2021-03-25 15:33:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 5, 2, 1, NULL, NULL, 'GRIP SPONGE CUSHION AIR (NOIR)', 'Sponge Grip', 'Grosses perforations et ajout de feutre pour un meilleur confort. ', 0, 54, 7.33, '2021-03-25 15:36:38', NULL, NULL, NULL, NULL, NULL, NULL, 1.8, 'noir'),
(14, 5, 7, 2, NULL, NULL, 'ANTIVIBRATEURS AC165 YONEX LOGO', 'L\'antivibrateur AC165 aux couleurs du logo Yonex ! En bleu ou en noir...', 'Un antivibrateur très efficace qui se clipe entre les 2 cordes centrales du tamis.\r\n\r\nLe look Yonex sur votre raquette !\r\n\r\n2 antivibrateurs par emballages.', 0, 84, 5.4, '2021-03-25 15:38:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 3, NULL, NULL, NULL, 'RADICAL S GRAPHENE 360', 'La raquette de tennis Head Radical S Graphene 360 est dédiée aux joueurs de club intermédiaires ou de tournois qui recherchent de la polyvalence et de la performance...', 'La nouvelle Head Radical S 2019-2020 version Graphene 360 est une raquette très polyvalente pour les joueurs et les joueuses de club ou de tournois qui recherchent du matériel sérieux et performant !\r\n\r\nGrâce à sa construction polyvalente et avancée, la nouvelle Head Radical S peut très bien convenir pour un usage régulier ou compétition !\r\n\r\nElle possède un tamis un peu plus grand que la moyenne (660 cm2) pour une zone efficace de centrage plus large et un poids intermédiaire de 280 grammes. Son équilibre neutre (32 cm) en fait une raquette maniable et non contraignante pour le bras. \r\n\r\nLa technologie Graphene 360 assure à la fois plus de stabilité pour plus de confort et aussi plus de transfert d\'énergie à restituer dans le coup pour plus de puissance.', 0, 39, 114.95, '2021-03-25 15:54:53', 280, 660, 4, 320, NULL, NULL, NULL, NULL),
(16, 1, 3, NULL, NULL, NULL, 'HEAD GRAVITY PRO', 'La nouvelle gamme de raquette de tennis Head Gravity a été conçue pour assurer aux joueurs de bon niveau Contrôle et tolérance avec une zone de centrage adaptée !', 'La nouvelle gamme de raquettes Head Gravity permet de gagner en précision tout en augmentant la surface de frappe de manière assez considérable !\r\n\r\nLa Head Gravity Pro est une raquette à part dans la gamme car elle possède des caractéristiques techniques assez extrêmes pour procurer un maximum de contrôle et de sensations de jeu aux très bons joueurs de compétition...\r\n\r\nElle est dotée des 3 grandes nouveautés de la gammes Gravity :\r\n\r\n- Un tamis d\'une nouvelle forme pour favoriser un meilleur centrage sur chaque frappe et garantir de meilleurs résultats\r\n\r\n- Le nouveau matériau Graphene 360+ intégré au coeur avec ses fibres Spiralfibers pour une meilleure restitution d\'énergie\r\n\r\n- La nouvelle construction du cadre assure un toucher plus souple et impact plus doux.\r\n', 0, 15, 134.95, '2021-03-25 15:57:15', 315, 645, 3, 315, NULL, NULL, NULL, NULL),
(17, 1, 2, NULL, NULL, NULL, 'WILSON ULTRA 100 REVERSE', 'La nouvelle raquette de tennis Wilson Ultra 100 en version Customisée Reverse 100 !', 'Voici la nouvelle raquette Wilson Ultra 100 Reverse ! Le même modèle que la Ultra 100 avec ses couleurs inversées...\r\n\r\nLa raquette de tennis Wilson Ultra version 2020 est la 3ème génération de cette gamme. Elle apportera essentiellement plus de puissance que la version précédente grâce notamment à son profil spécial Power Profil et à ses joncs Crush Zone...\r\n\r\nLa Wilson Ultra 100 est la lus lourde de la gamme Ultra 100 avec 300 grammes et procurera une très bonne puissance pour tous les joueurs confirmés de club ou de tournois de bon niveau qui sont à la recherche de plus de puissance.\r\n\r\nSa nouvelle géométrie inversée Power Rib et son PWS intégré assurent au cadre une meilleure stabilité à l\'impact et une bonne zone de centrage pour procurer plus de confort et de précision à chaque coup. L\'intérieur du cadre Sweetspot Channel, creusé à 3h et 9h apporte plus de longueur de corde au travers pour un surcroît de puissance. \r\n\r\nUn super look finition brillante avec 3 couleurs principales à la manière des Wilson Blade et des Wilson Clash avec du bleu, du gris et du noir...\r\n\r\nUne gamme de raquette largement utilisée sur le circuit par Gael Monfils, Kei Nishikori et Borna Coric...', 0, 12, 197.95, '2021-03-25 16:01:19', 300, 645, 3, 320, NULL, NULL, NULL, NULL),
(18, 1, 4, NULL, NULL, NULL, 'O3 TOUR 100 PRINCE ', 'La nouvelle raquette de tennis Prince O3 Tour 100 reprend l\'ADN des raquettes de la série Tour en ajoutant la technologie Prince O3 pour plus de confort et de performance à chaque frappe...', 'La nouvelle raquette de tennis Prince O3 Tour 100, ici en 310 grammes, est dotée des technologies TeXtreme et O3 exclusives Prince qui permettent de procurer une meilleure stabilité de la raquette à chaque impact pour assurer plus de contrôle, de précision et de confort à la frappe, et d\'amplifier le rôle du cordage en se déformant un peu plus à chaque frappe pour une performance décuplée.\r\n\r\nCe modèle 03 Tour 100 est déclinée en 2 poids (290 et 310 grammes) pour pouvoir être jouer à tous les niveaux, club ou compétition. A vous de choisir votre version !\r\n\r\nElle possède un moyen tamis 100 in2 (645 cm2) mais avec une section un peu plus fine que le reste de la gamme pour une meilleure précision... \r\n\r\nElle est plutôt destinée aux joueurs de bon niveau (tournois) qui recherchent à la fois du toucher de balle, de la précision mais aussi avec un impact assez sec pour une frappe plus puissante.', 0, 12, 99.95, '2021-03-25 16:30:20', 310, 645, 4, 310, NULL, NULL, NULL, NULL),
(19, 2, 3, NULL, NULL, NULL, 'SAC TENNIS GRAVITY 2021 SPORT BAG R-PET', 'Le 1er sac de tennis conçu à partir de plastique recyclé ! Le sac de tennis Head Sport Bag Gravity R-PET reprend le look des raquettes Head Gravity 2021 et permet de ranger son matériel de façon bien ordonnée grâce à sa taille compacte !', 'Le sac de tennis Head Gravity Sport Bag R-PET a été conçu en partenariat avec Alexander Zverev à partir de bouteilles en plastique PET recyclées ! Il est totalement inspiré de la gamme des raquettes Head Gravity 2021 et de ses couleurs tranchantes ! Il est de taille compacte pour une utilisation régulière.\r\n\r\nIl est doté de parois ajustables et escamotables pour composer la forme et la tailles de l\'intérieur de votre sac. Si vous préférez ranger toutes vos affaires dans un grand compartiment ou les séparer avec plus de précautions, vous avez le choix grâce à ses parois à velcro. Il dispose également d’un compartiment spécial et ventilé pour les chaussures ou le linge humide, ainsi que de multiples poches internes et externes pour vos accessoires.\r\n\r\nIl peut se porter en sac à dos ou à l\'épaule grâce à ses 2 bandoulières réglables et confortables.\r\n \r\nVolume : 67 litres\r\nDimensions (cm.) : L71 x H30,5 x P42', 0, 34, 107.95, '2021-03-25 16:42:47', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL);

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
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL
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
(231, 9, '9-0.jpg'),
(232, 9, '9-2.jpg'),
(233, 9, '9-1.jpg'),
(234, 9, '9-3.jpg'),
(235, 10, '10-0.jpg'),
(236, 10, '10-1.jpg'),
(237, 10, '10-2.jpg'),
(238, 10, '10-3.jpg'),
(239, 11, '11-0.jpg'),
(240, 11, '11-1.jpg'),
(241, 11, '11-2.jpg'),
(242, 11, '11-0.jpg'),
(243, 11, '11-1.jpg'),
(244, 11, '11-2.jpg'),
(245, 12, '12-0.jpg'),
(246, 13, '13-0.jpg'),
(247, 14, '14-3.jpg'),
(248, 14, '14-1.jpg'),
(249, 14, '14-2.jpg'),
(250, 14, '14-0.jpg'),
(251, 15, '15-0.jpg'),
(252, 15, '15-1.jpg'),
(253, 15, '15-2.jpg'),
(254, 16, '16-0.jpg'),
(255, 16, '16-1.jpg'),
(256, 16, '16-2.jpg'),
(257, 16, '16-3.jpg'),
(258, 17, '17-0.jpg'),
(259, 17, '17-1.jpg'),
(260, 17, '17-2.jpg'),
(261, 17, '17-3.jpg'),
(262, 18, '18-0.jpg'),
(263, 18, '18-1.jpg'),
(264, 18, '18-2.jpg'),
(265, 18, '18-3.jpg'),
(266, 19, '19-0.jpg'),
(267, 19, '19-1.jpg'),
(268, 19, '19-2.jpg'),
(269, 19, '19-3.jpg');

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
  `uti_droits` int(11) DEFAULT NULL,
  `uti_nom` varchar(45) NOT NULL,
  `uti_prenom` varchar(45) NOT NULL,
  `uti_mail` varchar(100) NOT NULL,
  `uti_tel` varchar(45) DEFAULT NULL,
  `uti_motdepasse` varchar(255) NOT NULL,
  `uti_rue` varchar(100) NOT NULL,
  `uti_code_postal` int(11) NOT NULL,
  `uti_ville` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateurs`, `uti_droits`, `uti_nom`, `uti_prenom`, `uti_mail`, `uti_tel`, `uti_motdepasse`, `uti_rue`, `uti_code_postal`, `uti_ville`) VALUES
(11, 1, 'lugi', 'van', 'a@b.com', '', '$2y$10$S980PUCUWD3hgqe8MYmya.3iB/DjqQOGlZNRK1MuaMrLXHkn..zFm', 'zefzef', 12345, 'adzd'),
(12, 0, 'rfe', 'zef', 'ezef@fezfez.fr', '46+464', '$2y$10$YpiF5H5X8BD/I...C1dlBOhL5N51eB1SnBmOhKbw4Im5Pw6II.tL.', 'ergerg', 4564, 'ergerg'),
(13, 0, 'erfgd', 'dfg', 'gdfgdfg@gfdgfg.gre', '95', '$2y$10$pAK6JE/Gn2UH2kZ8g7JZ.umxLTgRBt5TNuZ1VBFSeuPxuFvCyWlXm', 'dfsdf', 65, 'sdf'),
(14, 0, 'splk,df', 'zefzef', 'zefzef@fezfef.zefzef', '959', '$2y$10$4hnf2BkA14zlK6MZd4AMa.MqyjpsPzcT4VCrxCEQV/bEUSI6pwgim', 'zef', 565, 'zef'),
(15, 0, 'alex', 'des', 'gdfgdfg@gfdgfg.gredfsd', '154845', '$2y$10$epJELvA0TMOSazt6Se0JLe7ZAv4aaGYIWUceXBGs30w4wacmfbCsC', 'fd', 6541, 'dfv'),
(16, 0, 'dfv', 'dfv', 'a@b.comfghfgh', '0632233223', '$2y$10$DHnJP9m5sjXCUx02f1zH9e8zEevFHfMHfaZZl/M4RI6CMoAjM1kv6', 'dfvdfv', 12432, 'fdgdg'),
(17, 0, 'qsqs@ds.comfdgvdfv', 'alex', 'a@b.comdfvdfvefbb', '0632233223', '$2y$10$2euXJQuKJqMDCh3AgLb/gOlAQkcbin9CYoo2nix6YDSbISOf8UkB6', 'dfvdfv', 12432, 'fdgdg'),
(18, 0, 'dfbdfbdfb', 'alex', 'sd@fg.frdfvdfvdcv', '0632233223', '$2y$10$LktIucYmLG4qhU3eB0Dvpe8iF8sj3JX4UX.KsDDlZKTgegtLpFkSW', 'dfgvdfv', 12432, 'fdgdg'),
(19, 0, 'fsdf', 'sdfd', 'aa@aa.aa', '64', '$2y$10$KYe.A/oHvuRTRoYnFEsBI.GgSpYU8Ar57hSA7WIBpMqmUL97Sa55y', 'dfdf', 1, 'dfv'),
(20, 0, 'fththth', 'alex', 'a@b.comfghfnvbnjgyjnghn', '0632233223', '$2y$10$3Kjf4MwiPV3eSuv4CbreRuYx89ElyDi8MV8XREU7U1d6imXTxjEBq', 'fghfgh', 12432, 'fdgdg'),
(21, 0, 'fhfgh', 'alex', 'qsqs@ds.comfrhghrthfgh', '0632233223', '$2y$10$P8/4wEx6kiyBaCVigDLVBuZS.NoTMfpRq61XKHbqZ6WnztnimjT.a', 'gdgerg', 12432, 'fdgdg'),
(22, 0, 'qze', 'alex', 'qsqs@ds.comzefsdfvcv', '0632233223', '$2y$10$uMmJfu9ZAck5aJSzi1qrWuLutvnObz2UhFxIPfUiLtq7ZPNpAojvu', 'sdf', 12432, 'fdgdg'),
(23, 1, 'b', 'b', 'b@b.b', '1', '$2y$10$zF51ln9Dm7usSfYXKsFLl.TE7NzfXQaPnF4a6Xz2psjmJ43PEaNIC', 'fg', 684, 'fdfdv');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images_articles`
--
ALTER TABLE `images_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

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
  MODIFY `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Contraintes pour la table `images_articles`
--
ALTER TABLE `images_articles`
  ADD CONSTRAINT `fk_images_articles_articles1` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
