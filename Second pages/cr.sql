-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 mai 2020 à 15:14
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
  `nom_client` char(122) CHARACTER SET utf8 DEFAULT NULL,
  `prenom_client` char(122) CHARACTER SET utf8 DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `cin` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `n_passport` varchar(233) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `prenom_client`, `phone`, `email`, `cin`, `n_passport`) VALUES
(3, 'm', 'K', 21222222, 2222, '2', 'DDDD'),
(4, 'mahdi', 'karbal', 2147483647, 0, 'HH241170', 'HD2122'),
(5, 'Taoufiq', 'Rh', 600000000, 0, 'CIN-RH', 'NUM-PASPORT-RH'),
(6, 'Mehdi', 'KR', 600000011, 0, 'CIN-KR', 'NUM-PASPORT-KR'),
(7, 'Mohameed', 'MO', 600000022, 0, 'CIN-MO', 'NUM-PASPORT-MO'),
(8, 'Yassine', 'YA', 600000222, 0, 'CIN-YA', 'NUM-PASPORT-YA');

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

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `vol_id_vol`, `cli_id_client`, `date_reservation`) VALUES
(1, 20, 4, NULL),
(2, 3, 1, '2020-05-13 18:54:56'),
(3, 4, 2, '2020-05-13 18:59:56'),
(4, 1, 2, '2020-05-13 19:00:32'),
(5, 1, 1, '2020-05-13 19:01:26'),
(6, 7, 1, '2020-05-13 19:04:51'),
(7, 7, 2, '2020-05-13 19:05:52'),
(8, 7, 3, '2020-05-13 19:07:18'),
(9, 7, 4, '2020-05-13 19:08:36');

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
(20, 'weld akrbal', 1111, 'pngfuel.com.png', '2020-05-05 00:00:00', '0', '0', '0000-00-00', 0, 0, 2),
(24, 'SFSF', 0, 'pngfuel.com.png', '2020-05-08 12:46:12', 'FES', 'FESE', '2020-05-20', 12, 12, 123),
(25, 'vvvvvvvvv', 121, 'pngfuel.com.png', '2020-05-11 15:57:56', 'paris', 'CASA', '2020-05-26', 12, 12, 120),
(26, 'DFSECG', 300, 'pngfuel.com.png', '2020-05-11 15:57:56', 'USA', 'MAROC-LAAYOUNE', '2020-05-28', 13, 13, 1222),
(27, 'vvvvvvvvv', 121, 'pngfuel.com.png', '2020-05-13 12:55:43', 'paris', 'CASA', '2020-05-26', 12, 12, 120),
(28, 'DFSECG', 300, 'pngfuel.com.png', '2020-05-13 12:55:43', 'USA', 'MAROC-LAAYOUNE', '2020-05-28', 13, 13, 1222);

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
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
