-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 01 Avril 2021 à 15:39
-- Version du serveur :  5.7.32-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydevteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `competence` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `photo_profil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `competence`, `mail`, `mot_de_passe`, `date_inscription`, `photo_profil`) VALUES
(3, 'Lavit', 'Gaetan', 'développeur-back', 'test@test', '$2y$10$MzW.cE4ysf9kG6CT3kGH5.8pnkIoqjDeCHpJv8/ae6rWO4SGgY4yC', '2021-03-22', 'rbs_projet.png'),
(4, 'Bege', 'Swann', 'developpeur-mobile', 'test@test', '$2y$10$a16m0Ua5V9/Zb6dc3PJYHeKxYar1LbROxuxL3Cwf1PR8R1b8M/KKm', '2021-03-22', '4_escawp.jpg'),
(5, 'test', 'test', 'test', 'test', 'test', '2021-03-10', 'rbs_projet.png'),
(6, 'Bechu', 'Jeannot', 'developpeur-mobile', 'test@test1', '$2y$10$yw94TvsUCse7RivDMxFfwu.p5GydgKNrMLLujWRHaij.T7dXMC11a', '2021-03-23', 'emiya.png'),
(7, 'akn', 'Abelito', 'expert-cyber-securite', 'test@abel', '$2y$10$Zr6HSDeMINP3Cj4ZZcTtaeYojnEdtez/NBrEDnrUgrFffof1fxmnS', '2021-03-23', 'kekkai_wallpaper.png'),
(8, 'Lavit', 'Gaetan123', 'developpeur-back', 'testo@test.re', '$2y$10$cX2psugH1/vQBnJhRqZ7YuVEW59twuIvzrcG1Bw5MfH1ilYQw4Cce', '2021-03-24', NULL),
(9, 'Lavit', 'Gaetan', 'developpeur-back', 'testo@testo.re', '$2y$10$f/AV4/erLzQWdwOjeAx7XevphCDKbZ3/s.rVqlu/YUqiUdAT7KOuS', '2021-03-24', 'Graphiste (14).png'),
(10, 'Lavit', 'Gaetan', 'graphiste', 'mail@gmail.com', '$2y$10$S0ERxSDb.TyOrnwGpHa0a.gVMwgiB.k4.vtlwN39Xi4fCore.nBLm', '2021-03-24', NULL),
(11, 'Lavit', 'Gaetan', 'developpeur-back', 'gaetan@gaetan', '$2y$10$UymKsRtLEQN1HYoDYTPmgu2318UeZgo5h87c4mNKBzb/NDCTppUU.', '2021-03-29', '11_photo_de_moi.jpeg'),
(12, 'Apavou', 'Abel', 'developpeur-back', 'Abel@mail.re', '$2y$10$YnmyUi4N7WA88G2ppzOx2uGQv8rL7jwjTfMkwhVHniRxWJMpnV55q', '2021-03-30', '12_apavou.jpg'),
(13, 'Gigan', 'Dimitri', 'expert-cyber-securite', 'didi@mail.re', '$2y$10$3dBj6S0Csg1VyekUtvInnexrXLOz0TLibVkeHfsaehJGtaDlNp.ji', '2021-03-30', '13_didi.png'),
(14, 'Lee', 'Bruce', 'expert-cyber-securite', 'lee@mail.re', '$2y$10$YKnm8Edvii20qwOsrfTc2esBh7MZmGaSHS/Ww3MW.cnKq4Q4S6pbK', '2021-03-31', NULL),
(15, 'Louise', 'Johan', 'social-media-manager', 'louise@mail.re', '$2y$10$7M9FR8FkGP2Suhs4fkFIDOudS0IA20p3xm4BaGfNUdTURwmmYuv0C', '2021-04-01', '15_louise.png'),
(16, 'Megarisse', 'Yannick', 'graphiste', 'megarisse@mail.re', '$2y$10$k67q5SyXt8uTFf8pH9b3SuYKdEry4bW3g83x/w64l8n8bSs7V35Xe', '2021-04-01', NULL),
(17, 'Lee', 'Bruce', 'developpeur-front', 'lee@mail.re', '$2y$10$P1sF11JgzbBky6rAAng4/OPJ2M7xAgpizOC7FHOFgmJon4sDyf3jO', '2021-04-01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `id_chef` int(11) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `graphiste` int(11) DEFAULT NULL,
  `dev_front` int(11) DEFAULT NULL,
  `dev_mobile` int(11) DEFAULT NULL,
  `dev_back` int(11) DEFAULT NULL,
  `web_designer` int(11) DEFAULT NULL,
  `social` int(11) DEFAULT NULL,
  `expert` int(11) DEFAULT NULL,
  `date_publication` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `id_chef`, `photo_profil`, `nom`, `prenom`, `titre`, `description`, `graphiste`, `dev_front`, `dev_mobile`, `dev_back`, `web_designer`, `social`, `expert`, `date_publication`) VALUES
(2, 12, '12_apavou.jpg', 'Apavou', 'Abel', 'Idée de projet', 'projet plutot simple  Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple Ceci est la description du projet plutot simple', 0, 1, 1, 0, 0, 0, 0, NULL),
(3, 12, '12_apavou.jpg', 'Apavou', 'Abel', 'test', 'test ', 0, 0, 0, 0, 1, 1, 1, '2021-04-01'),
(4, 15, '15_louise.png', 'Louise', 'Johan', 'Le photogram', 'Dans ce projet, nous mettons en relation divers photographes et mod&egrave;les', 1, 1, 1, 1, 1, 0, 1, '2021-04-01'),
(5, 11, '11_photo_de_moi.jpeg', 'Lavit', 'Gaetan', 'My Dev Team', 'Le projet a pour but de mettre en relation diff&eacute;rentes personnes travaillant dans le domaine du num&eacute;rique. Les utilisateurs pourront publier leurs id&eacute;es de projet et seront contact&eacute; par les utilisateurs int&eacute;ress&eacute;es .', 1, 1, 1, 1, 1, 1, 1, '2021-04-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chef` (`id_chef`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_chef`) REFERENCES `membre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
