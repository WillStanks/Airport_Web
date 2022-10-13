-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 13 oct. 2022 à 17:17
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
-- Base de données : `airport_v0_2_0`
--

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `province_id` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `city`) VALUES
(1, 1, 'Montréal'),
(2, 1, 'Beloeil'),
(3, 1, 'St-Hubert'),
(4, 2, 'Calgary'),
(5, 2, 'Edmonton'),
(6, 4, 'Fort Lauderdale'),
(7, 4, 'Miami'),
(8, 5, 'Los Angeles'),
(9, 5, 'Long Beach'),
(10, 4, 'Orlando');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Canada'),
(2, 'États-Unis'),
(3, 'Mexique'),
(4, 'Pérou'),
(5, 'Costa-Rica'),
(6, 'Espagne'),
(7, 'Angleterre'),
(8, 'France'),
(9, 'Allemagne'),
(10, 'Roumanie'),
(11, 'Brésil'),
(12, 'Argentine');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(3, 'en_US', 'Reservations', 12, 'title', 'Trip to Costa-Rica'),
(4, 'en_US', 'Reservations', 12, 'body', 'Little trip to Costa-Rica with a backpack.'),
(5, 'ro_RO', 'Reservations', 12, 'title', 'RO Voyage au Costa-Rica');

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
(3, 'Airbus A330-200 S', 23, 'Moteurs : 3 Rolls Royce Trent 772B ||| Capacité du réservoir à carburant : 111 272 kg (245 316 lb) ||| Vitesse de croisière : 875 km/h (Mach 0,82)', '2022-09-11 17:26:03', '2022-09-13 20:40:58'),
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
(4, 18),
(3, 19);

-- --------------------------------------------------------

--
-- Structure de la table `provinces_states`
--

CREATE TABLE `provinces_states` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `province_states` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `provinces_states`
--

INSERT INTO `provinces_states` (`id`, `country_id`, `province_states`) VALUES
(1, 1, 'Québec'),
(2, 1, 'Alberta'),
(3, 1, 'Colombie-Britannique '),
(4, 2, 'Floride'),
(5, 2, 'Californie');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `depCity_id` int NOT NULL,
  `destCity_id` int NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `image` varchar(255) DEFAULT NULL,
  `escale` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `title`, `depCity_id`, `destCity_id`, `slug`, `body`, `image`, `escale`, `created`, `modified`) VALUES
(18, 12, 'Voyage test', 1, 10, 'Voyage-test', '', 'mexique.jpg', 0, '2022-10-05 20:27:45', '2022-10-05 21:15:07'),
(19, 12, 'voayge', 1, 8, 'voayge', 'Voyage a edmonton', '', 0, '2022-10-13 14:59:16', '2022-10-13 15:04:10');

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
(2, 'Utilisateur', 'Ceci est un utilisateur\n'),
(3, 'Admin', 'Ceci est un admin\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int DEFAULT '2',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `uuid`, `role_id`, `email`, `confirmed`, `password`, `created`, `modified`) VALUES
(4, '', 2, 'will@will.com', 0, '$2y$10$NW1.Bot3pOhdOfYtzUKEnuv5RH2anfXAXiK.jFjFXBaFZib/Izgrq', '2022-09-11 17:16:58', '2022-09-11 17:16:58'),
(12, '3e9c6a24-9125-43a5-88a1-ebe0bd10073e', 2, 'william4800@hotmail.com', 1, '$2y$10$vWfpSdjEiIvyKJSQEnuQjOuNi4V6OUp2fEYvjIOxp5HKQu4gItaNu', '2022-09-19 02:03:54', '2022-09-19 02:06:48'),
(14, 'eb130214-7e6a-47bc-98b3-6a93291e3976', 2, '1946026@cmontmorency.qc.ca', 0, '$2y$10$259yMOmfl6tcM769JoVzeOK1/fIU04g9AU2qowlRlx10v0TWNuho.', '2022-09-20 15:51:00', '2022-09-20 15:51:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airport_province_id` (`province_id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

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
-- Index pour la table `provinces_states`
--
ALTER TABLE `provinces_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airport_country_id` (`country_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`),
  ADD KEY `depCity_id` (`depCity_id`),
  ADD KEY `destCity_id` (`destCity_id`);

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
  ADD KEY `role_id` (`role_id`),
  ADD KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `provinces_states`
--
ALTER TABLE `provinces_states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces_states` (`id`);

--
-- Contraintes pour la table `planes_reservations`
--
ALTER TABLE `planes_reservations`
  ADD CONSTRAINT `planes_reservations_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `planes_reservations_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`);

--
-- Contraintes pour la table `provinces_states`
--
ALTER TABLE `provinces_states`
  ADD CONSTRAINT `provinces_states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`depCity_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`destCity_id`) REFERENCES `cities` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
