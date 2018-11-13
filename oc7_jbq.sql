-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 12 nov. 2018 à 16:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oc7_jbq`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C7440455F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `name`, `username`, `password`, `is_active`) VALUES
(2, 'Company1', 'client1', '$2y$13$1CDAN4.mn.HKRKf2d3A0PuZwYdp.SQNHnexBkV/f4zBjFD1UGf4Ba', 1),
(3, 'Company2', 'client2', '$2y$13$zG41ST6kNAv5xJ8s2JQxuu4t6vc7ahRaxZMAmZUTRndvOk8hlBRMq', 1),
(4, 'Company3', 'client3', '$2y$13$nrqELVy3c/bQs9xb1KojduQh.d9GZirQszDKS3Z90mh.mN6RaKTty', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `company`, `description`, `value`) VALUES
(21, 'OC-Phone 1', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1257),
(22, 'OC-Phone 2', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1416),
(23, 'OC-Phone 3', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1397),
(24, 'OC-Phone 4', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1234),
(25, 'OC-Phone 5', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 820),
(26, 'OC-Phone 6', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1473),
(27, 'OC-Phone 7', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1494),
(28, 'OC-Phone 8', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1145),
(29, 'OC-Phone 9', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1063),
(30, 'OC-Phone 10', 'OpenClassphone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus mauris, varius sit amet tortor in, ultrices congue lacus. Vestibulum a lacinia erat, sed rutrum massa. Integer lectus ex, facilisis sit amet vehicula vel, bibendum bibendum tortor. Aliquam erat volutpat. Proin sollicitudin id magna vitae vestibulum. Fusce eu vestibulum nunc. Praesent vitae vestibulum libero, vel laoreet turpis. Aliquam eu odio ac eros posuere pellentesque. In nec tempus mi. Aliquam lacinia fringilla sodales. Integer eget velit tortor. Vestibulum id tellus in ante lobortis tempus nec quis mauris. Aliquam vestibulum dignissim felis a ullamcorper. Proin luctus lectus a massa accumsan ultrices.', 1322);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E95E237E06` (`name`),
  KEY `IDX_1483A5E919EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `client_id`, `name`) VALUES
(1, 2, 'Company1user1'),
(2, 2, 'Company1user2'),
(3, 2, 'Company1user3'),
(4, 2, 'Company1user4'),
(5, 2, 'Company1user5'),
(6, 3, 'Company2user1'),
(7, 3, 'Company2user2'),
(8, 3, 'Company2user3'),
(9, 3, 'Company2user4'),
(10, 3, 'Company2user5'),
(11, 4, 'Company3user1'),
(12, 4, 'Company3user2'),
(13, 4, 'Company3user3'),
(14, 4, 'Company3user4'),
(15, 4, 'Company3user5');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
