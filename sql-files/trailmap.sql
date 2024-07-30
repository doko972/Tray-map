-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 30, 2024 at 08:07 AM
-- Server version: 8.0.37
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trailmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorize`
--

CREATE TABLE `categorize` (
  `id_route` int NOT NULL,
  `id_class_route` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_route`
--

CREATE TABLE `class_route` (
  `id_class_route` int NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
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
-- Table structure for table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_route` int NOT NULL,
  `id_img` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id_img` int NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
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
-- Table structure for table `person`
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
-- Dumping data for table `person`
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
(10, 'http://dummyimage.com/183x100.png/cc0000/ffffff', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum.', 'amugleston9@economist.com', '$2a$04$Dx4pG2vEHkaNa1WuLCy9VuwzZmBtbIDVWa8xwgmknRaKVXIhG3rxi', 'Purificación', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id_route` int NOT NULL,
  `time_stamp` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `distance` tinyint UNSIGNED NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_person` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id_route`, `time_stamp`, `title`, `distance`, `difficulty`, `status`, `id_person`) VALUES
(1, '2024-04-04 18:32:01', 'San Marcos', 1, 'facile', 0, 1),
(2, '2023-09-01 01:43:55', 'Mojorejo', 2, 'difficult', 0, 2),
(3, '2024-06-09 22:05:59', 'Santa Lucía', 3, 'v.facile', 0, 3),
(4, '2024-04-27 13:09:44', 'Pitangueiras', 4, 'v.difficult', 0, 4),
(5, '2024-02-28 15:45:08', 'Santa Clara', 5, 'difficult', 0, 5),
(6, '2024-04-30 07:23:59', 'Pisang', 6, 'facile', 0, 6),
(7, '2023-12-23 01:07:31', 'Lianzhu', 7, 'intermédiaire', 0, 7),
(8, '2023-11-05 00:16:17', 'San Francisco', 8, 'facile', 0, 8),
(9, '2024-06-25 23:29:26', 'Xihongmen', 9, 'intermédiaire', 0, 9),
(10, '2024-01-31 07:40:48', 'Pórto Chéli', 10, 'difficult', 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorize`
--
ALTER TABLE `categorize`
  ADD PRIMARY KEY (`id_route`,`id_class_route`),
  ADD KEY `id_class_route` (`id_class_route`);

--
-- Indexes for table `class_route`
--
ALTER TABLE `class_route`
  ADD PRIMARY KEY (`id_class_route`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_route` (`id_route`),
  ADD KEY `id_person` (`id_person`);

--
-- Indexes for table `illustrer`
--
ALTER TABLE `illustrer`
  ADD PRIMARY KEY (`id_route`,`id_img`),
  ADD KEY `id_img` (`id_img`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `id_route` (`id_route`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id_route`),
  ADD KEY `id_person` (`id_person`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_route`
--
ALTER TABLE `class_route`
  MODIFY `id_class_route` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id_route` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorize`
--
ALTER TABLE `categorize`
  ADD CONSTRAINT `categorize_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `categorize_ibfk_2` FOREIGN KEY (`id_class_route`) REFERENCES `class_route` (`id_class_route`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Constraints for table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
