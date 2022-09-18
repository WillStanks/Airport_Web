-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2022 at 02:34 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport_v0_2_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
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
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'en_US', 'Reservations', 10, 'title', 'Trip to COSTA-RICA'),
(2, 'en_US', 'Reservations', 10, 'body', 'A little trip to Costa-Rica');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
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
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `title`, `seats`, `details`, `created`, `modified`) VALUES
(3, 'Airbus A330-200 S', 23, 'Moteurs : 3 Rolls Royce Trent 772B ||| Capacité du réservoir à carburant : 111 272 kg (245 316 lb) ||| Vitesse de croisière : 875 km/h (Mach 0,82)', '2022-09-11 17:26:03', '2022-09-13 20:40:58'),
(4, 'Airbus A330-30', 375, 'Moteurs : 2 Rolls Royce Trent 772 ||| Capacité du réservoir à carburant : 76 839 kg (169 403 lb) ||| Vitesse de croisière : 870 km/h (Mach 0,82)', '2022-09-11 17:26:25', '2022-09-11 17:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `planes_reservations`
--

CREATE TABLE `planes_reservations` (
  `plane_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planes_reservations`
--

INSERT INTO `planes_reservations` (`plane_id`, `reservation_id`) VALUES
(3, 10),
(4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `depCity` varchar(255) NOT NULL,
  `destCity` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `image` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `title`, `depCity`, `destCity`, `slug`, `body`, `image`, `published`, `created`, `modified`) VALUES
(10, 4, 'Voyage COSTA-RICA', 'Mtl', 'SanJose', 'Voyage-COSTA-RICA', 'Un petit voyage au Costa-Rica', NULL, 0, '2022-09-11 17:26:58', '2022-09-15 15:26:28'),
(11, 4, 'Voyage Mexique', 'MTL', 'Mexico', 'Voyage-Mexique', 'Voyage au Mexique', 'mexique.jpg', 0, '2022-09-15 21:15:17', '2022-09-15 21:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(2, 'Utilisateur', 'Ceci est un utilisateur\n'),
(3, 'Admin', 'Ceci est un admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `uuid` text COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int DEFAULT '2',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `role_id`, `email`, `confirmed`, `password`, `created`, `modified`) VALUES
(4, '', 2, 'will@will.com', 0, '$2y$10$NW1.Bot3pOhdOfYtzUKEnuv5RH2anfXAXiK.jFjFXBaFZib/Izgrq', '2022-09-11 17:16:58', '2022-09-11 17:16:58'),
(5, '', 3, 'will@dsadsa.com', 0, '$2y$10$6CmT5j1CcUjWob3tN/I/Ie4y06/QyEyW6gLjVjd.3MfFFrCIJYv5e', '2022-09-13 20:06:18', '2022-09-13 20:06:18'),
(6, '', 2, 'will@will.ca', 0, '$2y$10$9W9R8y1WkcncOssjx3o0MeY/QW/5ku5mAng6S2IwiiGADCdJ78C3K', '2022-09-13 20:58:53', '2022-09-13 20:58:53'),
(7, '', 2, 'will@wildsa.com', 0, '$2y$10$Z1VDWgLMQ7hdIn4uYcO4Re30OIXK4cWAufVZabuxBsAY1ehXJLg4a', '2022-09-13 21:00:21', '2022-09-13 21:00:21'),
(11, '', 2, 'mww@mww.com', 0, '$2y$10$LO8b7tPQMFctuSvDKOC1eeJP/.00fm3UiKQu6F.kCsDA1DNuKEs3i', '2022-09-15 02:11:49', '2022-09-15 02:11:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `planes_reservations`
--
ALTER TABLE `planes_reservations`
  ADD PRIMARY KEY (`plane_id`,`reservation_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planes_reservations`
--
ALTER TABLE `planes_reservations`
  ADD CONSTRAINT `planes_reservations_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `planes_reservations_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
