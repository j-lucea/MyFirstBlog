-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 05 sep. 2023 à 17:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jluceazoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `p5_category`
--

CREATE TABLE `p5_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `p5_category`
--

INSERT INTO `p5_category` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Symfony');

-- --------------------------------------------------------

--
-- Structure de la table `p5_comment`
--

CREATE TABLE `p5_comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `p5_comment`
--

INSERT INTO `p5_comment` (`id`, `content`, `status`, `created_at`, `updated_at`, `user_id`, `post_id`) VALUES
(1, 'Génial !', 1, '2023-07-23 20:28:29', '2023-07-23 20:28:29', 2, 1),
(2, 'Je ne suis pas de cet avis', 1, '2023-08-02 18:19:18', '2023-08-31 12:24:29', 1, 4),
(3, 'Cela me laisse perplexe', 1, '2023-08-02 18:22:27', '2023-08-02 18:22:27', 1, 3),
(4, 'Pourrais-tu développer Nico ?', 1, '2023-08-02 18:22:28', '2023-08-02 18:22:27', 2, 3),
(5, 'Je ne suis pas du même avis que toi sur ce sujet Iven', 1, '2023-08-28 21:32:27', '2023-08-28 21:32:27', 1, 3),
(6, 'Le contraire m\'aurait étonné.', 1, '2023-08-28 22:19:45', '2023-08-28 22:19:45', 2, 4),
(7, 'Ah d\'accord.', 1, '2023-08-28 22:20:19', '2023-08-28 22:20:19', 2, 3),
(8, 'Mais super article quand même', 1, '2023-08-31 12:25:00', '2023-08-31 12:25:00', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `p5_post`
--

CREATE TABLE `p5_post` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'src/public/assets/img/post-bg.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `p5_post`
--

INSERT INTO `p5_post` (`id`, `title`, `chapo`, `content`, `image`, `created_at`, `updated_at`, `category_id`, `user_id`) VALUES
(1, 'Mon premier article', 'Cet article est mon premier', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod finibus molestie. In fermentum, ipsum in maximus faucibus, tortor purus tincidunt est, in rhoncus dui tellus nec sapien. In laoreet vestibulum orci sed gravida. Proin ultrices metus a velit molestie, porttitor aliquam est hendrerit. Vivamus venenatis efficitur nunc lacinia tristique. Suspendisse potenti. Aliquam imperdiet turpis eu dolor sagittis vulputate. Curabitur pharetra ante ac lectus facilisis auctor. Mauris id sagittis risus. Aenean ac diam mauris. Ut volutpat interdum congue. Fusce et tortor nulla. Donec eget pharetra purus. Phasellus vitae massa pharetra, ultricies odio auctor, molestie turpis. Fusce tellus nisi, euismod interdum massa quis, commodo pulvinar ex. Phasellus rhoncus metus non facilisis pellentesque.\r\n\r\nNunc neque neque, congue vitae nisi sit amet, tempus scelerisque erat. Aenean iaculis orci vestibulum rhoncus condimentum. In tempus est vel risus pulvinar, vel ultricies lorem interdum. Maecenas sagittis elit vel egestas sodales. Vivamus placerat semper diam efficitur rhoncus. Sed id metus at purus malesuada gravida. Sed feugiat semper tortor. In vitae vestibulum risus. Phasellus quis semper sem. Duis eget eros vitae quam scelerisque pharetra eget nec risus. Pellentesque lobortis, ligula in maximus efficitur, nulla felis sollicitudin sem, et ultricies lectus felis a velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi vel varius tortor.\r\n\r\nInteger sollicitudin tempus sem id ultricies. Fusce pulvinar odio vel eros aliquam auctor. Pellentesque posuere suscipit elit, vel euismod dui ullamcorper quis. Quisque a purus vel erat ullamcorper cursus in et enim. Nullam molestie luctus enim ut ultricies. Nunc vitae aliquam libero, id porttitor ipsum. Sed ut lacinia neque. ', 'src/public/assets/img/post-bg.jpg', '2023-07-22 15:44:20', '2023-07-22 15:44:20', 1, 1),
(2, 'Mon deuxième article', 'Cet article est mon deuxième', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod finibus molestie. In fermentum, ipsum in maximus faucibus, tortor purus tincidunt est, in rhoncus dui tellus nec sapien. In laoreet vestibulum orci sed gravida. Proin ultrices metus a velit molestie, porttitor aliquam est hendrerit. Vivamus venenatis efficitur nunc lacinia tristique. Suspendisse potenti. Aliquam imperdiet turpis eu dolor sagittis vulputate. Curabitur pharetra ante ac lectus facilisis auctor. Mauris id sagittis risus. Aenean ac diam mauris. Ut volutpat interdum congue. Fusce et tortor nulla. Donec eget pharetra purus. Phasellus vitae massa pharetra, ultricies odio auctor, molestie turpis. Fusce tellus nisi, euismod interdum massa quis, commodo pulvinar ex. Phasellus rhoncus metus non facilisis pellentesque.\r\n\r\nNunc neque neque, congue vitae nisi sit amet, tempus scelerisque erat. Aenean iaculis orci vestibulum rhoncus condimentum. In tempus est vel risus pulvinar, vel ultricies lorem interdum. Maecenas sagittis elit vel egestas sodales. Vivamus placerat semper diam efficitur rhoncus. Sed id metus at purus malesuada gravida. Sed feugiat semper tortor. In vitae vestibulum risus. Phasellus quis semper sem. Duis eget eros vitae quam scelerisque pharetra eget nec risus. Pellentesque lobortis, ligula in maximus efficitur, nulla felis sollicitudin sem, et ultricies lectus felis a velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi vel varius tortor.\r\n\r\nInteger sollicitudin tempus sem id ultricies. Fusce pulvinar odio vel eros aliquam auctor. Pellentesque posuere suscipit elit, vel euismod dui ullamcorper quis. Quisque a purus vel erat ullamcorper cursus in et enim. Nullam molestie luctus enim ut ultricies. Nunc vitae aliquam libero, id porttitor ipsum. Sed ut lacinia neque. ', 'src/public/assets/img/post-bg.jpg', '2023-08-02 17:57:01', '2023-08-02 17:57:01', 1, 1),
(3, 'Mon troisième article', 'Cet article est mon troisième', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod finibus molestie. In fermentum, ipsum in maximus faucibus, tortor purus tincidunt est, in rhoncus dui tellus nec sapien. In laoreet vestibulum orci sed gravida. Proin ultrices metus a velit molestie, porttitor aliquam est hendrerit. Vivamus venenatis efficitur nunc lacinia tristique. Suspendisse potenti. Aliquam imperdiet turpis eu dolor sagittis vulputate. Curabitur pharetra ante ac lectus facilisis auctor. Mauris id sagittis risus. Aenean ac diam mauris. Ut volutpat interdum congue. Fusce et tortor nulla. Donec eget pharetra purus. Phasellus vitae massa pharetra, ultricies odio auctor, molestie turpis. Fusce tellus nisi, euismod interdum massa quis, commodo pulvinar ex. Phasellus rhoncus metus non facilisis pellentesque.\r\n\r\nNunc neque neque, congue vitae nisi sit amet, tempus scelerisque erat. Aenean iaculis orci vestibulum rhoncus condimentum. In tempus est vel risus pulvinar, vel ultricies lorem interdum. Maecenas sagittis elit vel egestas sodales. Vivamus placerat semper diam efficitur rhoncus. Sed id metus at purus malesuada gravida. Sed feugiat semper tortor. In vitae vestibulum risus. Phasellus quis semper sem. Duis eget eros vitae quam scelerisque pharetra eget nec risus. Pellentesque lobortis, ligula in maximus efficitur, nulla felis sollicitudin sem, et ultricies lectus felis a velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi vel varius tortor.\r\n\r\nInteger sollicitudin tempus sem id ultricies. Fusce pulvinar odio vel eros aliquam auctor. Pellentesque posuere suscipit elit, vel euismod dui ullamcorper quis. Quisque a purus vel erat ullamcorper cursus in et enim. Nullam molestie luctus enim ut ultricies. Nunc vitae aliquam libero, id porttitor ipsum. Sed ut lacinia neque. ', 'src/public/assets/img/post-bg.jpg', '2023-08-02 18:05:46', '2023-08-02 18:05:46', 1, 2),
(4, 'Mon quatrième article', 'Cet article est mon quatrième', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod finibus molestie. In fermentum, ipsum in maximus faucibus, tortor purus tincidunt est, in rhoncus dui tellus nec sapien. In laoreet vestibulum orci sed gravida. Proin ultrices metus a velit molestie, porttitor aliquam est hendrerit. Vivamus venenatis efficitur nunc lacinia tristique. Suspendisse potenti. Aliquam imperdiet turpis eu dolor sagittis vulputate. Curabitur pharetra ante ac lectus facilisis auctor. Mauris id sagittis risus. Aenean ac diam mauris. Ut volutpat interdum congue. Fusce et tortor nulla. Donec eget pharetra purus. Phasellus vitae massa pharetra, ultricies odio auctor, molestie turpis. Fusce tellus nisi, euismod interdum massa quis, commodo pulvinar ex. Phasellus rhoncus metus non facilisis pellentesque.\r\n\r\nNunc neque neque, congue vitae nisi sit amet, tempus scelerisque erat. Aenean iaculis orci vestibulum rhoncus condimentum. In tempus est vel risus pulvinar, vel ultricies lorem interdum. Maecenas sagittis elit vel egestas sodales. Vivamus placerat semper diam efficitur rhoncus. Sed id metus at purus malesuada gravida. Sed feugiat semper tortor. In vitae vestibulum risus. Phasellus quis semper sem. Duis eget eros vitae quam scelerisque pharetra eget nec risus. Pellentesque lobortis, ligula in maximus efficitur, nulla felis sollicitudin sem, et ultricies lectus felis a velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi vel varius tortor.\r\n\r\nInteger sollicitudin tempus sem id ultricies. Fusce pulvinar odio vel eros aliquam auctor. Pellentesque posuere suscipit elit, vel euismod dui ullamcorper quis. Quisque a purus vel erat ullamcorper cursus in et enim. Nullam molestie luctus enim ut ultricies. Nunc vitae aliquam libero, id porttitor ipsum. Sed ut lacinia neque. ', 'src/public/assets/img/post-bg.jpg', '2023-08-02 18:05:47', '2023-08-02 18:05:47', 1, 2),
(15, 'Test grandeur nature', 'test plus grand', 'test énorme pour voir si tout va bien', 'src/public/assets/img/post-bg.jpg', '2023-08-31 20:45:00', '2023-08-31 20:54:21', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `p5_user`
--

CREATE TABLE `p5_user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `avatar` varchar(500) NOT NULL DEFAULT 'uploads/joe-shields-dLij9K4ObYY-unsplash.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `p5_user`
--

INSERT INTO `p5_user` (`id`, `last_name`, `first_name`, `login`, `password`, `mail`, `role`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Bordeaux', 'Nicolas', 'nbordeaux', '$2y$10$ts.MaUDJzqKAM.lRieD2VunrF2DhqSU.7r9ipSSirv3P231YNKtZ2', 'nicolas.bordeaux@gmail.com', 1, 'uploads/rowen-smith-oQDcw5mk9F4-unsplash.jpg', '2023-07-22 15:51:28', '2023-07-22 15:51:28'),
(2, 'Fréchette', 'Iven', 'ifrechette', '$2y$10$yQLSDycxdBzhFKHHEHZSjOAB6PKuMKA1dSqb7ftdgQLV5VevE1CZy', 'iven.frechette@aol.com', 0, 'uploads/joe-shields-dLij9K4ObYY-unsplash.jpg', '2023-08-02 17:59:21', '2023-08-02 17:59:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `p5_category`
--
ALTER TABLE `p5_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `p5_comment`
--
ALTER TABLE `p5_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `p5_post`
--
ALTER TABLE `p5_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `p5_user`
--
ALTER TABLE `p5_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `p5_category`
--
ALTER TABLE `p5_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `p5_comment`
--
ALTER TABLE `p5_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `p5_post`
--
ALTER TABLE `p5_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `p5_user`
--
ALTER TABLE `p5_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `p5_comment`
--
ALTER TABLE `p5_comment`
  ADD CONSTRAINT `p5_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `p5_post` (`id`),
  ADD CONSTRAINT `p5_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `p5_user` (`id`);

--
-- Contraintes pour la table `p5_post`
--
ALTER TABLE `p5_post`
  ADD CONSTRAINT `p5_post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p5_category` (`id`),
  ADD CONSTRAINT `p5_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `p5_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
