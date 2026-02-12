-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 12 fév. 2026 à 20:23
-- Version du serveur : 8.0.45-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MyFirstCRUD`
--

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE `link` (
  `id_link` int NOT NULL,
  `url` varchar(2083) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`id_link`, `url`, `titre`, `description`, `date_`) VALUES
(1, 'https://developer.mozilla.org/fr/docs/Web', 'MDN Web Docs – HTML/CSS/JS', 'Le Web fournit d\'incroyables opportunités aux développeur·euse·s. Pour tirer le meilleur parti de ces technologies, il est nécessaire de savoir comment les utiliser. Voici différents liens qui vous permettront de naviguer dans la documentation de ces technologies web.', '2026-02-12 20:57:27'),
(2, 'https://www.php.net/manual/fr/', 'PHP Official Manual', 'Voici le manuel officiel de PHP vous pouvez y trouver toute les informaions nécessaire concernant PHP.', '2026-02-12 21:00:05');

-- --------------------------------------------------------

--
-- Structure de la table `link_comment`
--

CREATE TABLE `link_comment` (
  `id_comment` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `commentaire` varchar(1000) NOT NULL,
  `date_` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `id_link` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `link_comment`
--

INSERT INTO `link_comment` (`id_comment`, `login`, `commentaire`, `date_`, `heure`, `id_link`) VALUES
(1, 'Paul', 'Génial merci pour le partage !', '2026-02-12', '21:02:30', 1),
(2, 'Jean', 'Je cherchais cela justement.', '2026-02-12', '21:02:52', 1),
(3, 'Fabien', 'Merci !', '2026-02-12', '21:03:23', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--

CREATE TABLE `user_` (
  `id_user` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`id_user`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$DRHsHIXFeKbp3ZZJf5yDpedRa8x5lTITmiHIpscFJP1EERW3rv7H.'),
(2, 'user', '$2y$10$6cgBtASYH9Z5p/fO1cqfNOO8YdjTGe.NBqxC3AUEeu0aaoHAmnM7G');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Index pour la table `link_comment`
--
ALTER TABLE `link_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_link` (`id_link`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `link_comment`
--
ALTER TABLE `link_comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `link_comment`
--
ALTER TABLE `link_comment`
  ADD CONSTRAINT `link_comment_ibfk_1` FOREIGN KEY (`id_link`) REFERENCES `link` (`id_link`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
