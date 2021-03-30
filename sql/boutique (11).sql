-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 mars 2021 à 17:54
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
(19, 2, 3, NULL, NULL, NULL, 'SAC TENNIS GRAVITY 2021 SPORT BAG R-PET', 'Le 1er sac de tennis conçu à partir de plastique recyclé ! Le sac de tennis Head Sport Bag Gravity R-PET reprend le look des raquettes Head Gravity 2021 et permet de ranger son matériel de façon bien ordonnée grâce à sa taille compacte !', 'Le sac de tennis Head Gravity Sport Bag R-PET a été conçu en partenariat avec Alexander Zverev à partir de bouteilles en plastique PET recyclées ! Il est totalement inspiré de la gamme des raquettes Head Gravity 2021 et de ses couleurs tranchantes ! Il est de taille compacte pour une utilisation régulière.\r\n\r\nIl est doté de parois ajustables et escamotables pour composer la forme et la tailles de l\'intérieur de votre sac. Si vous préférez ranger toutes vos affaires dans un grand compartiment ou les séparer avec plus de précautions, vous avez le choix grâce à ses parois à velcro. Il dispose également d’un compartiment spécial et ventilé pour les chaussures ou le linge humide, ainsi que de multiples poches internes et externes pour vos accessoires.\r\n\r\nIl peut se porter en sac à dos ou à l\'épaule grâce à ses 2 bandoulières réglables et confortables.\r\n \r\nVolume : 67 litres\r\nDimensions (cm.) : L71 x H30,5 x P42', 0, 34, 107.95, '2021-03-25 16:42:47', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL),
(20, 1, 1, NULL, NULL, NULL, 'PURE DRIVE VS', 'La raquette de tennis Babolat VS est le fruit d\'une nouvelle conception créée pour les compétiteurs exigeants. Envie d\'une Pure Drive qui donne un peu plus de contrôle ? Cette raquette est faite pour vous !', 'Un nouvelle raquette dans la gamme Babolat Pure Drive : la Pure Drive VS !\r\n\r\nElle offre les avantages de la Pure Drive, puissance et polyvalence, avec plus de contrôle et de sensation à la frappe. \r\n\r\nCette raquette est destinée aux bons joueurs exigeants qui recherchent un bon compromis de puissance et de précision.\r\n\r\nLes grandes différences entre la Pure Drive VS et la Pure Drive sont la taille de tamis (plus petit sur le VS : 630 cm2 au lieu de 645 cm2) et le profil (plus fin sur la VS avec 23 mm. au lieu de 26 mm.)\r\n\r\nUne magnifique raquette Babolat avec une finition brillante grise et bleue métallisée !', 0, 54, 233.95, '2021-03-27 22:18:17', 300, 630, 4, 320, NULL, NULL, NULL, NULL),
(21, 1, 6, NULL, NULL, NULL, 'DUNLOP SX300 TOUR', 'La nouvelle gamme de raquettes de tennis Dunlop SX a été créée pour assurer aux joueurs plus de rotation de balle avec une excellente maîtrise ! La Dunlop SX 300 est la plus lourde de la gamme SX avec son poids à 310 grammes...', 'Cette gamme de raquettes de tennis Dunlop SX ré-invente les bases et redéfinis le compromis ! Ces raquettes assurent une excellente polyvalence de jeu avec de la puissance, de la prise d\'effets et de la maîtrise.\r\n\r\nEn effet, les caractéristiques des raquettes Dunlop SX favorisent la puissance avec un très bon contrôle de balle grâce à la technologie Spin Boost !\r\n\r\nLa raquette Dunlop SX300 Tour est la plus lourde de la gamme pour assurer aux bons joueurs de compétition du poids dans le balle et plus de puissance... Elle procurera également un très bon confort de jeu grâce à un indice de flexibilité assez bas.\r\n\r\nElle possède également les technologies Sonic Core et BASF pour un meilleur retour d\'énergie avec moins de vibrations, et Power Grid pour une zone de centrage agrandie.', 0, 26, 197.95, '2021-03-27 22:22:03', 310, 645, 2, 324, NULL, NULL, NULL, NULL),
(22, 1, 7, NULL, NULL, NULL, 'VCORE SI LITE', 'La Raquette Yonex Vcore Si Lite est une raquette légère et très performante pur tous les styles de jeu...', 'La raquette de tennis Yonex V-core Si Lite est la plus légère de la gamme utilisée par les champions et championnes sur les circuits Pro.... \r\n\r\nCette raquette offre de la prise d\'effet et du contrôle malgré son tamis de 645cm². Elle est vraiment destinée pour les joueurs et joueuses agressifs cherchant à déborder leur adversaire en quelques coups de raquette.\r\n\r\nElle s\'avère également être très maniable et dispose d\'une bonne stabilité utile pour bien servir et claquer vos volées au filet.\r\n\r\n', 0, 12, 5, '2021-03-27 22:25:00', 270, 645, 4, 330, NULL, NULL, NULL, NULL),
(23, 2, 1, NULL, NULL, NULL, 'SAC TENNIS THERMOBAG 12 PURE AERO RAFA', 'Le nouveau thermobag 12 raquettes Pure Aero Rafa aux couleurs des raquettes du champion Babolat Pure Aero Rafa jaune, orang et violet ! ', 'Le nouveau coloris du sac de tennis Babolat Thermobag 12 Pure Aero. Le Racket Holder 12 Pure Aero Rafa reprend les couleurs de la ligne des raquettes de Rafael Nada l pour 2021 en jaune, orang est violet !\r\n\r\nIl est doté des dernières innovations pour apporter protection, tenue, légèreté et solidité à tous les compétiteurs, aux joueurs réguliers et aux joueurs exigeants.\r\n\r\nIl possède 2 compartiments isolants de dernière génération qui apportent une protection ultime à vos raquettes et à la tension de vos cordages. Ses 3 compartiments sont doublés avec un matériaux incolore recyclé et sans colorant pour limiter l\'impact sur la planète. Une pochette chaussures transparente est aussi intégrée dans le compartiment central pour ne pas salir le reste de vos affaires.\r\n\r\nIl possède également 2 poches accessoires sur les côtés pour accueillir et protéger vos petits effets personnels et vos accessoires tennis, ainsi que 2 bretelles matelassées et réglables pour pouvoir le porter en sac à dos sans se fatiguer...\r\n\r\nCette ligne de sacs de tennis est très largement utilisée sur le circuits pro par les plus grands joueurs et les championnes...\r\n\r\nDimensions (cm.) : L75 x P48 x H32\r\nCapacités : 73 litres', 0, 45, 129.95, '2021-03-29 17:41:57', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL),
(24, 3, 1, NULL, NULL, NULL, 'RPM HURRICANE (200M)', 'L\'un des best-seller de la marque lyonnaise !! Le Babolat Pro Hurricane Tour change de nom pour devenir le RPM Hurricane ! Bobine de 200 mètre pour corder environ 17 raquettes...', 'Le Babolat RPM Hurricane est un monofilament en co-polymère structuré très résistant.\r\n\r\nIl procure du contrôle et vous permettra de mettre un maximum d\'effet dans la balle.', 0, 45, 112.95, '2021-03-29 17:44:06', NULL, NULL, NULL, NULL, 1.3, NULL, NULL, NULL),
(25, 3, 6, NULL, NULL, NULL, 'BLACK WIDOW (200M)', 'Black Widow (200m)', 'Ce cordage est l\'arme ultime des compétiteurs actuels ! Son polyester premium apporte de la puissance et sa forme a 7 faces attaque la balle pour générer un maximum d\'effets...', 0, 75, 111.95, '2021-03-29 17:45:14', NULL, NULL, NULL, NULL, 1.26, NULL, NULL, NULL),
(26, 4, 3, NULL, 3, 2, 'BARIL 60 BALLES TIP RED', 'Une balle plus grosse et plus lente pour les 5/8 ans, vendue en baril de 72 balles !', 'La première balle des joueurs de tennis en herbe 75 % plus lente qu\'une balle de tennis classique ! Elle conviendra parfaitement aux joueurs de mini tennis âgés de 5 à 8 ans. \r\n\r\nSa couleur bicolore permet d\'être mieux perçue dans l\'air. De plus elle est plus grosse et largement plus souple afin de garantir un meilleur contrôle de balle.\r\n\r\n\r\nBaril de 60 balles pour s\'entraîner avec un grand nombre de balles !', 0, 24, 99.95, '2021-03-29 17:47:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 5, 5, 1, NULL, NULL, 'GRIP CUIR LEATHER ATP TOUR', 'Un grip cuir naturel très souple !', 'Le grip Leather de Tecnifibre est composé de cuir naturel très souple.\r\n\r\nC\'est le choix numéro des joueurs de l\'ATP Tour.\r\n\r\nUn maximum de sensations afin de parfaitement trouver vos prises.', 0, 75, 13.5, '2021-03-29 17:49:25', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'marron'),
(28, 5, 2, 2, NULL, NULL, 'ANTIVIBRATEUR WILSON MINIONS', 'Des antivibrateurs au couleurs des personnages Minions pour tous les fans. Différentes modèles au choix...', 'Les antivibrateurs Wilson Minions débarquent avec leur personnages fun et des couleurs tranchantes... Choisissez votre antivibrateur Minions dans la liste : 1 côté logo Wilson / 1 côté Minions de votre choix !', 0, 87, 2.7, '2021-03-29 17:50:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_commande`, `id_utilisateurs`, `id_articles`, `quantite`, `prix`) VALUES
(1, 1, 11, 12, 1, 7),
(2, 1, 11, 17, 1, 197.95),
(3, 2, 11, 12, 1, 7),
(4, 2, 11, 17, 1, 197.95),
(5, 3, 12, 9, 2, 519.9);

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
(231, 9, '9-3.jpg'),
(232, 9, '9-2.jpg'),
(233, 9, '9-1.jpg'),
(234, 9, '9-0.jpg'),
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
(251, 15, '15-2.jpg'),
(252, 15, '15-1.jpg'),
(253, 15, '15-0.jpg'),
(254, 16, '16-0.jpg'),
(255, 16, '16-1.jpg'),
(256, 16, '16-2.jpg'),
(257, 16, '16-3.jpg'),
(258, 17, '17-0.jpg'),
(259, 17, '17-1.jpg'),
(260, 17, '17-2.jpg'),
(261, 17, '17-3.jpg'),
(262, 18, '18-3.jpg'),
(263, 18, '18-1.jpg'),
(264, 18, '18-2.jpg'),
(265, 18, '18-0.jpg'),
(266, 19, '19-0.jpg'),
(267, 19, '19-1.jpg'),
(268, 19, '19-2.jpg'),
(269, 19, '19-3.jpg'),
(270, 20, '20-3.jpg'),
(271, 20, '20-1.jpg'),
(272, 20, '20-2.jpg'),
(273, 20, '20-0.jpg'),
(278, 21, '21-3.jpg'),
(279, 21, '21-1.jpg'),
(280, 21, '21-2.jpg'),
(281, 21, '21-0.jpg'),
(282, 22, '22-2.jpg'),
(283, 22, '22-1.jpg'),
(284, 22, '22-0.jpg'),
(285, 23, '23-0.jpg'),
(286, 23, '23-1.jpg'),
(287, 23, '23-2.jpg'),
(288, 23, '23-3.jpg'),
(289, 24, '24-0.jpg'),
(290, 24, '24-1.jpg'),
(291, 24, '24-2.jpg'),
(292, 25, '25-0.jpg'),
(293, 25, '25-1.jpg'),
(294, 26, '26-0.jpg'),
(295, 27, '27-0.jpg'),
(296, 28, '28-0.jpg'),
(297, 28, '28-1.jpg'),
(298, 28, '28-2.jpg'),
(299, 28, '28-3.jpg');

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
(23, 1, 'admin', 'admin', 'admin@admin.fr', '1', '$2y$10$zF51ln9Dm7usSfYXKsFLl.TE7NzfXQaPnF4a6Xz2psjmJ43PEaNIC', 'rue de l\'admin', 684, 'amdinland');

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
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `images_articles`
--
ALTER TABLE `images_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

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
