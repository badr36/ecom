-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 juin 2022 à 21:30
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_client` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date`, `id_client`, `status`) VALUES
(1, '2022-05-01 19:25:19', 1, 'Livrée'),
(2, '2022-03-01 13:20:19', 2, 'Livrée'),
(3, '2021-12-05 18:25:19', 3, 'Livrée'),
(4, '2022-10-08 09:12:10', 4, 'Livrée'),
(5, '2022-04-01 14:20:19', 1, 'Livrée'),
(6, '2022-04-03 14:20:19', 1, 'Livrée'),
(7, '2022-04-06 14:20:19', 1, 'Livrée'),
(8, '2022-05-01 14:20:19', 2, 'Livrée'),
(9, '2022-05-10 13:20:19', 2, 'Livrée'),
(10, '2022-01-01 13:20:19', 3, 'Livrée'),
(11, '2022-09-01 13:20:19', 4, 'Livrée'),
(12, '2022-01-01 13:20:19', 4, 'Livrée'),
(13, '2022-01-05 13:20:19', 4, 'Livrée'),
(14, '2022-01-20 13:20:19', 4, 'Livrée'),
(15, '2022-01-15 13:20:19', 4, 'Livrée'),
(16, '2022-02-16 13:20:19', 4, 'Livrée'),
(17, '2022-02-18 13:20:19', 4, 'Livrée'),
(18, '2022-02-19 13:20:19', 4, 'Livrée'),
(19, '2022-02-10 13:20:19', 4, 'Livrée'),
(20, '2022-02-21 13:20:19', 4, 'Livrée'),
(21, '2022-06-26 13:20:19', 4, 'Livrée'),
(22, '2022-06-27 13:20:19', 1, 'Livrée'),
(23, '2022-06-28 13:20:19', 4, 'Livrée'),
(24, '2022-06-29 13:20:19', 4, 'Livrée'),
(25, '2022-06-30 13:20:19', 4, 'Livrée'),
(26, '2022-06-20 13:20:19', 4, 'Livrée'),
(27, '2022-07-20 13:20:19', 4, 'Livrée'),
(28, '2022-07-21 13:20:19', 4, 'Livrée'),
(29, '2022-08-21 13:20:19', 4, 'Livrée'),
(30, '2022-10-21 13:20:19', 4, 'Livrée'),
(31, '2022-10-25 13:20:19', 4, 'Livrée'),
(32, '2022-10-28 13:20:19', 4, 'Livrée'),
(33, '2022-11-20 13:20:19', 4, 'Livrée'),
(34, '2022-12-01 13:20:19', 2, 'Livrée');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
