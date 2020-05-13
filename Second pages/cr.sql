-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 mai 2020 à 21:13
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

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
  `nom_client` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `prenom_client` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `phone` int(16) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `cin` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `n_passport` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `prenom_client`, `phone`, `email`, `cin`, `n_passport`) VALUES
(1, 'Taoufiq', 'Rh', 600000000, 'rh@gmail.com', 'CIN-RH', 'NUM-PASPORT-RH'),
(2, 'Mehdi', 'KR', 600000011, 'kr@gmail.com', 'CIN-KR', 'NUM-PASPORT-KR'),
(3, 'Mohameed', 'MO', 600000022, 'mo@gmail.com', 'CIN-MO', 'NUM-PASPORT-MO'),
(4, 'Yassine', 'YA', 600000222, 'ya@gmail.com', 'CIN-YA', 'NUM-PASPORT-YA');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(200) NOT NULL,
  `vol_id_vol` int(11) NOT NULL,
  `cli_id_client` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `vol_id_vol`, `cli_id_client`, `date_reservation`) VALUES
(1, 3, 1, '2020-05-13 18:54:56'),
(2, 4, 2, '2020-05-13 18:59:56'),
(3, 1, 2, '2020-05-13 19:00:32'),
(4, 1, 1, '2020-05-13 19:01:26'),
(5, 7, 1, '2020-05-13 19:04:51'),
(6, 7, 2, '2020-05-13 19:05:52'),
(7, 7, 3, '2020-05-13 19:07:18'),
(8, 7, 4, '2020-05-13 19:08:36');

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
(1, 'Voyage de travel', 20000, 'pngfuel.com.png', '2020-05-13 18:38:48', 'maroc', 'france', '2020-05-22', 12, 12, 58),
(2, 'Voyage en famille', 5000, 'pngfuel.com.png', '2020-05-13 18:38:48', 'maroc', 'españa', '2020-05-26', 10, 10, 100),
(3, 'Voyage en famille', 10000, 'pngfuel.com.png', '2020-05-13 18:44:28', 'maroc', 'suisse', '2020-06-06', 11, 11, 39),
(4, 'Voyage de travel', 1500, 'pngfuel.com.png', '2020-05-13 18:44:28', 'maroc', 'espagne', '2020-05-20', 9, 9, 39),
(5, 'Voyage en famille', 1600, 'pngfuel.com.png', '2020-05-13 18:49:20', 'maroc', 'kanada', '2020-06-26', 8, 8, 20),
(6, 'Voyage en famille', 1000, 'pngfuel.com.png', '2020-05-13 18:49:20', 'maroc', 'norwegen', '2020-07-22', 4, 4, 20),
(7, 'Voyage de travel', 40000, 'pngfuel.com.png', '2020-05-13 19:04:18', 'maroc', 'holanda', '2020-07-28', 8, 8, 0);

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
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
