-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 14 avr. 2024 à 09:33
-- Version du serveur : 11.3.2-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myWebSite`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `id_topic` int(10) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_work` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_name`, `title`, `id_topic`, `content`, `created_at`, `id_work`) VALUES
(34, 'MERZOUK Youri SARL', 'Avis sur le site', 1, 'Site épuré et simple à manipuler. Peut être changer les phrases car trop robotiques.', '2024-04-11 09:46:28', NULL),
(35, 'Arthur', 'Les petits Bob', 6, 'Le jeu des Bob est super cool, on voit bien l\'évolution des Bob. Mais dommage que le jeu ne soit pas un peut plus fluide !', '2024-04-14 09:30:46', NULL),
(36, 'Ilian', 'Protofilio', 10, 'Super beau simple d\'utilisation !', '2024-04-14 09:31:23', NULL),
(37, 'Laurent', 'Super la GLIBC', 5, 'La GLIBC est vraiment bien, surtout le shell ! Les couleurs sur le terminal, sa rajoute vraiment un truc et toutes les fonctions marchent à merveille !', '2024-04-14 09:32:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(10) NOT NULL,
  `name_topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `name_topic`) VALUES
(1, 'Avis'),
(2, 'Autre'),
(5, 'Programmation Système & C'),
(6, 'Programmation Python'),
(9, 'Administration Linux'),
(10, 'Programmation Web');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `password`) VALUES
(1, '1697918c7f9551712f531143df2f8a37');

-- --------------------------------------------------------

--
-- Structure de la table `work`
--

CREATE TABLE `work` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_topic` int(10) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link_github` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `work`
--

INSERT INTO `work` (`id`, `title`, `created_at`, `id_topic`, `content`, `image`, `link_github`) VALUES
(22, 'Mini GLIBC', '2024-04-07 16:42:15', 5, 'Je suis un message test', 'item-1.jpg', 'x'),
(23, 'BobLand', '2024-04-14 09:21:46', 6, 'Jeu python en représentation isometrique', 'item-1.jpg', 'https://github.com/yasmine-2023/Projet-python.git'),
(25, 'Ce Protofolio', '2024-04-14 09:29:50', 10, ' Création d\'un site Web servant de portfolio. Ce site sera entièrement automatisé, éliminant ainsi le besoin d\'accéder au code ou à la base de données pour ajouter du contenu. Toutes les opérations seront réalisables directement sur le site à l\'aide d\'interfaces conviviales.', 'item-2.jpg', 'x'),
(26, 'GENTOO', '2024-04-14 09:29:51', 9, 'Installation d\'une GENTOO en ligne de commande', 'item-3.jpg', 'x');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`);

--
-- Contraintes pour la table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
