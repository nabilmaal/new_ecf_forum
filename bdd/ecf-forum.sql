-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mars 2023 à 21:09
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf-forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `id_user` int NOT NULL,
  `id_topic` int NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id_topic`, `titre`, `contenu`, `id_user`) VALUES
(43, 'Comprendre les humains : leurs habitudes alimentaires étranges\"', 'Pourquoi les humains mangent-ils des aliments que nous, les chats, trouvons peu appétissants ?', 4),
(44, '\"Les humains et leur manie de nous prendre en photo : qu\'en pensez-vous ?\"', '\"Est-ce que ça vous énerve quand les humains essaient de nous prendre en photo sans notre consentement ?\"', 9),
(45, '\"Les humains et leurs goûts musicaux : une source d\'incompréhension ?\"', '\"Comment réagissez-vous quand les humains écoutent de la musique à un volume très élevé ?\"', 10),
(46, '\"Les humains et leur obsession pour la propreté : bénéfique ou envahissant ?\"', '\"Pensez-vous que les humains exagèrent avec leur manie de nettoyer notre litière plusieurs fois par jour ?\"', 11),
(47, '\"Les humains et leur mode de vie sédentaire : comment les encourager à bouger davantage ?\"', '\"Avez-vous des astuces pour inciter les humains à jouer et à se dépenser davantage avec nous ?\"', 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(2, 'chat', 'chat@gmail.com', '$2y$10$RwVN75tnB/RSH/jtftmNN.WZKXT0HtNZGStc17/rX/fMDEYh8bPVu'),
(4, 'felix', 'felix@chatmail.com', '$2y$10$8Gu79bhWRfJn8v3hEoQ/SukoM3pdhDVE6XW12LJQzrJ7j5TNmswlq'),
(9, 'whuskers', 'whiskers@meowmail.com', '$2y$10$6H0pUv.g23sJY/WmdfBcEuL4csxOfL.b8npweIABCfOkBnjYooZl6'),
(10, 'garfield', 'garfield@catmail.net', '$2y$10$jnWwvlpnIbVbwmiRNwuKFOwtIEhl1DnvP2OTor6TOjW.Vj9hHi1k.'),
(11, 'mittens', 'mittens@purrmail.com', '$2y$10$ZGel5cln3idCMZy1GQ5K8uGi7I3K1JrdM8eQFHaRrP.SE9ux1d./i'),
(12, 'salem', 'salem@felineemail.com', '$2y$10$8KNJ0nAKHLq7vGKowV85teZRNuIRw2Q/jiY80YXfNU.qMS7Igiuza');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id_topic`);

--
-- Contraintes pour la table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
