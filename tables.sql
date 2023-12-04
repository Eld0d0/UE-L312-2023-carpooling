-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 04 déc. 2023 à 00:00
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carpooling`
--

-- --------------------------------------------------------

--
-- Structure de la table `adds`
--

CREATE TABLE `adds` (
  `id` int NOT NULL,
  `driverId` int NOT NULL,
  `carId` int NOT NULL,
  `tripDateAndTime` datetime NOT NULL,
  `tripDepartureCity` varchar(255) NOT NULL,
  `tripArrivalCity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `adds`
--

INSERT INTO `adds` (`id`, `driverId`, `carId`, `tripDateAndTime`, `tripDepartureCity`, `tripArrivalCity`) VALUES
(1, 1, 1, '2023-11-14 14:30:00', 'Paris', 'Marseille'),
(2, 2, 2, '2023-12-26 18:00:00', 'Lyon', 'Toulouse'),
(3, 3, 2, '2023-11-23 07:15:00', 'Bordeaux', 'Nantes'),
(7, 2, 4, '2024-01-17 14:20:23', 'Lormes', 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `addId` int NOT NULL,
  `passengerId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `addId`, `passengerId`) VALUES
(1, 2, 3),
(2, 3, 2),
(3, 2, 2),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `carmodel` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `carmodel`, `color`, `capacity`) VALUES
(1, 'Fiat Multipla', 'Rouge', '3'),
(2, 'Porsche cayen', 'Noir', '1'),
(3, 'Citroen picasso C4', 'Gris', '3'),
(4, 'Mercedes', 'Rose', '7');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-19 00:00:00'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-21 00:00:00'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08 00:00:00'),
(5, 'zdz', 'dzdz', 'dzdz', '2023-12-27 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users_adds`
--

CREATE TABLE `users_adds` (
  `id` int NOT NULL,
  `add_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users_adds`
--

INSERT INTO `users_adds` (`id`, `add_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 7, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_bookings`
--

CREATE TABLE `users_bookings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `booking_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users_bookings`
--

INSERT INTO `users_bookings` (`id`, `user_id`, `booking_id`) VALUES
(1, 2, 3),
(2, 1, 1),
(3, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_cars`
--

CREATE TABLE `users_cars` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users_cars`
--

INSERT INTO `users_cars` (`id`, `user_id`, `car_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_adds`
--
ALTER TABLE `users_adds`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_bookings`
--
ALTER TABLE `users_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_cars`
--
ALTER TABLE `users_cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users_adds`
--
ALTER TABLE `users_adds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users_bookings`
--
ALTER TABLE `users_bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users_cars`
--
ALTER TABLE `users_cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
