-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 31 juil. 2024 à 12:54
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trailmap`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorize`
--

CREATE TABLE `categorize` (
  `id_route` int NOT NULL,
  `id_class_route` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorize`
--

INSERT INTO `categorize` (`id_route`, `id_class_route`) VALUES
(3, 1),
(4, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `class_route`
--

CREATE TABLE `class_route` (
  `id_class_route` int NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `illustration_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `class_route`
--

INSERT INTO `class_route` (`id_class_route`, `class_name`, `illustration_img`) VALUES
(1, 'onfoot', './img/Walking.png'),
(2, 'bike', './img/Vector.png');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int NOT NULL,
  `comment_text` text,
  `comment_rate` tinyint DEFAULT NULL,
  `id_route` int NOT NULL,
  `id_person` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

CREATE TABLE `difficulty` (
  `id_difficulty` int NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `difficulty`
--

INSERT INTO `difficulty` (`id_difficulty`, `name`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_route` int NOT NULL,
  `id_img` int NOT NULL,
  `is_main` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `illustrer`
--

INSERT INTO `illustrer` (`id_route`, `id_img`, `is_main`) VALUES
(1, 1, 0),
(1, 2, 1),
(2, 3, 0),
(2, 4, 1),
(3, 5, 0),
(3, 6, 1),
(4, 7, 0),
(4, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `id_img` int NOT NULL,
  `URL` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id_img`, `URL`, `alt`) VALUES
(1, 'img/route_1.webp', ''),
(2, 'img/route_1-1.webp', ''),
(3, 'img/route_2.webp', ''),
(4, 'img/route_2-1.webp', ''),
(5, 'img/route_3.webp', ''),
(6, 'img/route_3-1.webp', ''),
(7, 'img/route_4.webp', ''),
(8, 'img/route_4-1.webp', '');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_location` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `longitude` decimal(3,3) NOT NULL,
  `latitude` decimal(3,3) NOT NULL,
  `id_route` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id_person` int NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `locate` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`id_person`, `photo`, `bio`, `email`, `password`, `locate`, `create_date`, `id_role`) VALUES
(1, 'http://dummyimage.com/127x100.png/dddddd/000000', 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'fcornhill0@merriam-webster.com', '$2a$04$7KOvVxqSSK6/46Vwj87yJeYXbPRUEBn1ahb5mGNdpmEPHIY9rCVjq', 'Wanmingang', '0000-00-00 00:00:00', 0),
(2, 'http://dummyimage.com/105x100.png/dddddd/000000', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'gartiss1@google.de', '$2a$04$Y98ZDXyU6Ck4EPnPu32Eo.bT0FCbN9Udauh4EczGZY2hWl2Eh.ryW', 'Chanuman', '0000-00-00 00:00:00', 0),
(3, 'http://dummyimage.com/101x100.png/5fa2dd/ffffff', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'acolten2@biblegateway.com', '$2a$04$L6BiaozDlb8czxwQK1l/gO/D8Za6Oae7yI1fBf9bEPgWBRIGUCFVC', 'Shawan', '0000-00-00 00:00:00', 0),
(4, 'http://dummyimage.com/213x100.png/5fa2dd/ffffff', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 'tattwool3@quantcast.com', '$2a$04$abioACePmsIe6sMa1pRwjOcGF4wxlu6J1.fIFyoFZ9OvBWp6gmIxu', 'Concórdia', '0000-00-00 00:00:00', 0),
(5, 'http://dummyimage.com/173x100.png/cc0000/ffffff', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 'jtootin4@icq.com', '$2a$04$nJ95a28xxsQ.SuxPRc5u2ObMMKJk02m4RUkIoVi3MSxlC6F8hIj0S', 'Fulu', '0000-00-00 00:00:00', 0),
(6, 'http://dummyimage.com/168x100.png/ff4444/ffffff', 'In congue. Etiam justo. Etiam pretium iaculis justo.', 'aivanyushkin5@godaddy.com', '$2a$04$qrXws4jAGsqw3Lcwws43m./nxb7VPylmxhFa4wiQYulefFx5rBTP6', 'Topeka', '0000-00-00 00:00:00', 0),
(7, 'http://dummyimage.com/220x100.png/cc0000/ffffff', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'nsolomon6@wufoo.com', '$2a$04$c3dW6Ly43XytdySmtrUaweMKuR8qbrYw477kVLlS4l8NVrpvgMPQO', 'Kavadarci', '0000-00-00 00:00:00', 0),
(8, 'http://dummyimage.com/138x100.png/dddddd/000000', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 'cdewey7@youtu.be', '$2a$04$DhloBnYHPChbmnxSqihNzOXyGMPV2QjTw/6Y17br1TMyvefRz//hy', 'Pardubice', '0000-00-00 00:00:00', 0),
(9, 'http://dummyimage.com/142x100.png/dddddd/000000', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', 'ssidworth8@shareasale.com', '$2a$04$wpFc5d2fY2CEIZKhPXzQ/Oan9aicOIygXuUlv5cTj7f1C5qo2/aWO', 'Теарце', '0000-00-00 00:00:00', 0),
(10, 'http://dummyimage.com/183x100.png/cc0000/ffffff', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum.', 'amugleston9@economist.com', '$2a$04$Dx4pG2vEHkaNa1WuLCy9VuwzZmBtbIDVWa8xwgmknRaKVXIhG3rxi', 'Purificación', '0000-00-00 00:00:00', 0),
(11, NULL, NULL, 'doko972@gmail.com', '$2y$10$osnQqYWMQDm0Dahbu9zqR.BvEY0G1uL1CpwDDND85R7vxru4zGzpe', NULL, '2024-07-31 12:45:07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

CREATE TABLE `route` (
  `id_route` int NOT NULL,
  `time_stamp` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `distance` tinyint UNSIGNED NOT NULL,
  `difficulty` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_person` int NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `route`
--

INSERT INTO `route` (`id_route`, `time_stamp`, `title`, `distance`, `difficulty`, `status`, `id_person`, `description`) VALUES
(1, '2024-04-04 18:32:01', 'CLE Suisse Normande', 107, 3, 0, 1, 'Découvrez ce parcours de vélo de 108,7 km à proximité de Cormelles-le-Royal. Ce\r\n parcours emprunte 82 km de routes et 26,7 km de pistes cyclables. Il présente une ascension cumulée de             plus de 1160m'),
(2, '2023-09-01 01:43:55', 'Vallée de L\'Aise au départ de Ifs', 50, 2, 0, 2, 'Découvrez ce parcours de vélo de 50,2 km à proximité de Ifs. Il présente une\r\nascension cumulée de plus de 410m'),
(3, '2024-06-09 22:05:59', 'Louvigny / Le Rocreuil', 11, 1, 0, 3, 'Découvrez ce parcours de marche nordique de 11 km à proximité de Louvigny. Ce parcours emprunte 5 km de chemins et 2,2 km de pistes forestières'),
(4, '2024-04-27 13:09:44', 'Abbaye d\'Ardennes au jardin public de Caen', 13, 1, 0, 4, 'Découvrez ce parcours de marche de 12,5 km à proximité de Saint-Germain-la-Blanche-Herbe. Ce parcours emprunte 9,2 km de routes et 1,3 km de pistes cyclables.Prévoyez environ 3 heures et 20 minutes pour réaliser ce parcours');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorize`
--
ALTER TABLE `categorize`
  ADD PRIMARY KEY (`id_route`,`id_class_route`),
  ADD KEY `id_class_route` (`id_class_route`);

--
-- Index pour la table `class_route`
--
ALTER TABLE `class_route`
  ADD PRIMARY KEY (`id_class_route`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_route` (`id_route`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD PRIMARY KEY (`id_route`,`id_img`),
  ADD KEY `id_img` (`id_img`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `id_route` (`id_route`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`id_role`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id_route`),
  ADD KEY `id_person` (`id_person`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `class_route`
--
ALTER TABLE `class_route`
  MODIFY `id_class_route` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `id_route` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorize`
--
ALTER TABLE `categorize`
  ADD CONSTRAINT `categorize_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `categorize_ibfk_2` FOREIGN KEY (`id_class_route`) REFERENCES `class_route` (`id_class_route`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Contraintes pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`);

--
-- Contraintes pour la table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
