-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 10 mai 2020 à 19:11
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cr`
--

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `pays_depart` varchar(111) NOT NULL,
  `pays_arrive` varchar(111) NOT NULL,
  `date_vol` date NOT NULL,
  `hour_vol` int(11) NOT NULL,
  `minute_vol` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id`, `name`, `price`, `image`, `created`, `pays_depart`, `pays_arrive`, `date_vol`, `hour_vol`, `minute_vol`, `nb_place`) VALUES
(20, 'weld akrbal', 1111, 'adult-blur-boss-business-288477.jpg', '2020-05-05 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(21, 'bbbbbbbbbbbbb', 1111, 'pngfuel.com.png', '2020-05-07 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(22, 'fffffffffffffffffffffffffff', 121212, 'pngfuel.com.png', '0000-00-00 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(23, 'bvvvbbbbbb', 122, 'pngfuel.com.png', '0000-00-00 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(24, 'SFSF', 0, 'pngfuel.com.png', '2020-05-08 12:46:12', 'FES', 'FESE', '2020-05-20', 12, 12, 123);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;