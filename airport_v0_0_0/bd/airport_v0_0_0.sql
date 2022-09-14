-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 14 sep. 2022 à 20:11
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `airport_v0_0_0`
--

-- --------------------------------------------------------

--
-- Structure de la table `planes`
--

CREATE TABLE `planes` (
  `id` int NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `seats` int NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `planes`
--

INSERT INTO `planes` (`id`, `title`, `seats`, `details`, `created`, `modified`) VALUES
(3, 'Airbus A330-200 S', 4000, 'Moteurs : 3 Rolls Royce Trent 772B ||| Capacité du réservoir à carburant : 111 272 kg (245 316 lb) ||| Vitesse de croisière : 875 km/h (Mach 0,82)', '2022-09-11 17:26:03', '2022-09-11 17:26:03'),
(4, 'Airbus A330-30', 375, 'Moteurs : 2 Rolls Royce Trent 772 ||| Capacité du réservoir à carburant : 76 839 kg (169 403 lb) ||| Vitesse de croisière : 870 km/h (Mach 0,82)', '2022-09-11 17:26:25', '2022-09-11 17:26:25');

-- --------------------------------------------------------

--
-- Structure de la table `planes_reservations`
--

CREATE TABLE `planes_reservations` (
  `plane_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `planes_reservations`
--

INSERT INTO `planes_reservations` (`plane_id`, `reservation_id`) VALUES
(3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `depCity` varchar(255) NOT NULL,
  `destCity` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `title`, `depCity`, `destCity`, `slug`, `body`, `published`, `created`, `modified`) VALUES
(10, 4, 'Voyage COSTA-RICA', 'Mtl', 'SanJose', 'Voyage-COSTA-RICA', 'Un petit voyage au Costa-Rica', 0, '2022-09-11 17:26:58', '2022-09-11 17:26:58');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(2, 'Admin', 'Ceci est un admin\r\n'),
(3, 'Utilisateur', 'Ceci est un utilisateur\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role_id` int DEFAULT '3',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `created`, `modified`) VALUES
(4, 2, 'will@will.com', '$2y$10$NW1.Bot3pOhdOfYtzUKEnuv5RH2anfXAXiK.jFjFXBaFZib/Izgrq', '2022-09-11 17:16:58', '2022-09-11 17:16:58'),
(5, 3, 'william4800@hotmail.com', '$2y$10$HHEYO4/JNR4sFY4fBq5QIumUHMFHES9y4N7Kgkg2Q5tEgx/WJyyAC', '2022-09-14 20:02:42', '2022-09-14 20:02:42'),
(6, 3, 'JeanPing@hotmail.com', '$2y$10$X8PMs0n0UnF0kzoCVp5iX.JGg/ZmZg2A6km8VX8d0ShBHLztAV2bO', '2022-09-14 20:08:34', '2022-09-14 20:08:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `planes_reservations`
--
ALTER TABLE `planes_reservations`
  ADD PRIMARY KEY (`plane_id`,`reservation_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `planes_reservations`
--
ALTER TABLE `planes_reservations`
  ADD CONSTRAINT `planes_reservations_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `planes_reservations_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
