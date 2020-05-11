-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 mai 2020 à 15:11
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
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom_client` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `prenom_client` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `cin` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `n_passport` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(200) NOT NULL,
  `vol_id_vol` int(11) NOT NULL,
  `cli_id_client` int(11) NOT NULL,
  `date_reservation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(20, 'weld akrbal', 1111, 'pngfuel.com.png\r\n', '2020-05-05 00:00:00', '0', '0', '0000-00-00', 0, 0, 3),
(21, 'bbbbbbbbbbbbb', 1111, 'pngfuel.com.png', '2020-05-07 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(22, 'fffffffffffffffffffffffffff', 121212, 'pngfuel.com.png', '0000-00-00 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(23, 'bvvvbbbbbb', 122, 'pngfuel.com.png', '0000-00-00 00:00:00', '0', '0', '0000-00-00', 0, 0, 0),
(24, 'SFSF', 0, 'pngfuel.com.png', '2020-05-08 12:46:12', 'FES', 'FESE', '2020-05-20', 12, 12, 123);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD UNIQUE KEY `CLIENTS_PK` (`id_client`),
  ADD KEY `AK_Identifier_1` (`id_client`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `ASSOCIATION_1_FK` (`cli_id_client`),
  ADD KEY `ASSOCIATION_2_FK` (`vol_id_vol`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
