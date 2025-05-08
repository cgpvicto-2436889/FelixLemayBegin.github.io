-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 20 mars 2025 à 21:01
-- Version du serveur : 8.0.39
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lanparty_felixlemaybegin`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `dateajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `slogan`, `commentaire`, `dateajout`) VALUES
(1, 'Les Titans Sanglants', 'Le sang forge notre puissance, la victoire scelle notre légende.', NULL, '2025-02-27'),
(2, 'Les Lames de l’Ombre', 'Invisible dans la nuit, implacable dans le combat.', NULL, '2025-02-27'),
(3, 'La Légion Immortelle', 'Nous ne reculons jamais, nous ne tombons jamais.\r\n\r\n', NULL, '2025-02-27'),
(4, 'Les Protecteurs Stellaires', 'Brillons plus fort que les ténèbres, combattons pour l’espoir.', NULL, '2025-02-27'),
(5, 'Le Cercle des Assassins', 'Un coup, une cible, une mort certaine.', NULL, '2025-02-27'),
(6, 'Les Colosses Indomptables', 'Nous sommes l’acier, vous êtes la poussière.', NULL, '2025-02-27'),
(7, 'La Horde du Chaos', 'Le chaos est notre maître, la destruction notre plaisir.', NULL, '2025-02-27'),
(8, 'Les Voyageurs du Néant', 'Entre les mondes, entre les âmes, nous réécrivons le destin.', NULL, '2025-02-27'),
(9, 'Les Ombres Rebelles', 'Nous ne suivons aucune règle, sauf celle de la victoire.', NULL, '2025-02-27'),
(10, 'Les Architectes du Destin', 'Nous ne prédisons pas l’avenir, nous le façonnons.', NULL, '2025-02-27');

-- --------------------------------------------------------

--
-- Structure de la table `equipes_joueurs`
--

CREATE TABLE `equipes_joueurs` (
  `id` int NOT NULL,
  `joueur_id` int NOT NULL,
  `equipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes_joueurs`
--

INSERT INTO `equipes_joueurs` (`id`, `joueur_id`, `equipe_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7),
(36, 36, 8),
(37, 37, 8),
(38, 38, 8),
(39, 39, 8),
(40, 40, 8),
(41, 41, 9),
(42, 42, 9),
(43, 43, 9),
(44, 44, 9),
(45, 45, 9),
(46, 46, 10),
(47, 47, 10),
(48, 48, 10),
(49, 49, 10),
(50, 50, 10);

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int NOT NULL,
  `nomfamille` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courriel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateinscription` datetime DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nomfamille`, `prenom`, `pseudo`, `courriel`, `dateinscription`, `actif`) VALUES
(1, 'Ragestone', 'Darius', 'DunkMaster', 'DariusRagestone@gmail.com', '2025-02-27 00:00:00', 1),
(2, 'Xun', 'Lee Sin', 'BlindMonk', 'LeeSinXun@gmail.com', '2025-02-27 00:00:00', 1),
(3, 'Jihoon', 'Ahri', 'FoxSpirit', 'AhriJihoon@gmail.com', '2025-02-27 00:00:00', 1),
(4, 'Vermillion', 'Jinx', 'MadBomber', 'JinxVermillion@gmail.com', '2025-02-27 00:00:00', 1),
(5, 'Harrowind', 'Thresh', 'SoulReaper', 'ThreshHarrowind@gmail.com', '2025-02-27 00:00:00', 1),
(6, 'Crownguard', 'Garen', 'DemacianMight', 'GarenCrownguard@gmail.com', '2025-02-27 00:00:00', 1),
(7, 'Voidborn', 'Kha\'Zix', 'EvolveOrDie', 'KhazixVoidborn@gmail.com', '2025-02-27 00:00:00', 1),
(8, 'Hikaru', 'Yasuo', 'WindSamurai', 'YasuoHikaru@gmail.com', '2025-02-27 00:00:00', 1),
(9, 'Avarosan', 'Ashe', 'FrostQueen', 'AsheAvarosan@gmail.com', '2025-02-27 00:00:00', 1),
(10, 'Solari', 'Leona', 'SunWarrior', 'LeonaSolari@gmail.com', '2025-02-27 00:00:00', 1),
(11, 'Ferros', 'Camille', 'SteelShadow', 'CamilleFerros@gmail.com', '2025-02-27 00:00:00', 1),
(12, 'Khaldun', 'Amumu', 'SadMummy', 'AmumuKhaldun@gmail.com', '2025-02-27 00:00:00', 1),
(13, 'Kurosawa', 'Zed', 'ShadowMaster', 'ZedKurosawa@gmail.com', '2025-02-27 00:00:00', 1),
(14, 'Kyron', 'Kai\'Sa', 'VoidHunter', 'KaisaKyron@gmail.com', '2025-02-27 00:00:00', 1),
(15, 'Crowley', 'Morgana', 'DarkSorceress', 'MorganaCrowley@gmail.com', '2025-02-27 00:00:00', 1),
(16, 'Kanzuki', 'Shen', 'EyeOfTwilight', 'ShenKanzuki@gmail.com', '2025-02-27 00:00:00', 1),
(17, 'Grimfang', 'Warwick', 'BloodHound', 'WarwickGrimfang@gmail.com', '2025-02-27 00:00:00', 1),
(18, 'Crownlight', 'Lux', 'LightMage', 'LuxCrownlight@gmail.com', '2025-02-27 00:00:00', 1),
(19, 'Zaunovitch', 'Draven', 'GloriousExecutioner', 'DravenZaunovitch@gmail.com', '2025-02-27 00:00:00', 1),
(20, 'Tinkerton', 'Lulu', 'FaeTrickster', 'LuluTinkerton@gmail.com', '2025-02-27 00:00:00', 1),
(21, 'Laurent', 'Fiora', 'DuelMaster', 'FioraLaurent@gmail.com', '2025-02-27 00:00:00', 1),
(22, 'Nocturne', 'Evelynn', 'ShadowSeducer', 'EvelynnNocturne@gmail.com', '2025-02-27 00:00:00', 1),
(23, 'Du Couteau', 'LeBlanc', 'RoseDeception', 'LeBlancDuCouteau@gmail.com', '2025-02-27 00:00:00', 1),
(24, 'Lightshield', 'Ezreal', 'ArcaneExplorer', 'EzrealLightshield@gmail.com', '2025-02-27 00:00:00', 1),
(25, 'Marrowdeep', 'Nautilus', 'DepthTitan', 'NautilusMarrowdeep@gmail.com', '2025-02-27 00:00:00', 1),
(26, 'Stoneheart', 'Malphite', 'LivingRock', 'MalphiteStoneheart@gmail.com', '2025-02-27 00:00:00', 1),
(27, 'Kha\'Zhari', 'Rengar', 'PrimalHunter', 'RengarKhazhari@gmail.com', '2025-02-27 00:00:00', 1),
(28, 'Markov', 'Viktor', 'GloriousEvolution', 'ViktorMarkov@gmail.com', '2025-02-27 00:00:00', 1),
(29, 'Kryze', 'Vayne', 'NightHunter', 'VayneKryze@gmail.com', '2025-02-27 00:00:00', 1),
(30, 'Zephyrus', 'Janna', 'StormCaller', 'JannaZephyrus@gmail.com', '2025-02-27 00:00:00', 1),
(31, 'Ironclad', 'Mordekaiser', 'MetalKing', 'MordekaiserIronclad@gmail.com', '2025-02-27 00:00:00', 1),
(32, 'Fitzgerald', 'Vi', 'PiltoverFist', 'ViFitzgerald@gmail.com', '2025-02-27 00:00:00', 1),
(33, 'Tenebrae', 'Syndra', 'DarkSovereign', 'SyndraTenebrae@gmail.com', '2025-02-27 00:00:00', 1),
(34, 'Bilgewater', 'Miss Fortune', 'BountyHunter', 'MissFortuneBilgewater@gmail.com', '2025-02-27 00:00:00', 1),
(35, 'Gearsmith', 'Blitzcrank', 'Overdrive', 'BlitzcrankGearsmith@gmail.com', '2025-02-27 00:00:00', 1),
(36, 'Doombringer', 'Aatrox', 'DarkinBlade', 'AatroxDoombringer@gmail.com', '2025-02-27 00:00:00', 1),
(37, 'Wildfang', 'Nidalee', 'Beastmaster', 'NidaleeWildfang@gmail.com', '2025-02-27 00:00:00', 1),
(38, 'Rosenburg', 'Twisted Fate', 'CardMaster', 'TwistedFateRosenburg@gmail.com', '2025-02-27 00:00:00', 1),
(39, 'Boomshot', 'Tristana', 'YordleGunner', 'TristanaBoomshot@gmail.com', '2025-02-27 00:00:00', 1),
(40, 'Celestian', 'Bard', 'WanderingCaretaker', 'BardCelestian@gmail.com', '2025-02-27 00:00:00', 1),
(41, 'Ikathun', 'Jax', 'GrandmasterAtArms', 'JaxIkathun@gmail.com', '2025-02-27 00:00:00', 1),
(42, 'Shadeborn', 'Nocturne', 'EternalNightmare', 'NocturneShadeborn@gmail.com', '2025-02-27 00:00:00', 1),
(43, 'Du Couteau', 'Katarina', 'SinisterBlade', 'KatarinaDuCouteau@gmail.com', '2025-02-27 00:00:00', 1),
(44, 'Valentia', 'Samira', 'DesertRose', 'SamiraValentia@gmail.com', '2025-02-27 00:00:00', 1),
(45, 'Feathersworn', 'Rakan', 'Charmer', 'RakanFeathersworn@gmail.com', '2025-02-27 00:00:00', 1),
(46, 'Runeborne', 'Ornn', 'ForgeMaster', 'OrnnRuneborne@gmail.com', '2025-02-27 00:00:00', 1),
(47, 'Zaunwright', 'Ekko', 'TimeBender', 'EkkoZaunwright@gmail.com', '2025-02-27 00:00:00', 1),
(48, 'Du Couteau', 'Cassiopeia', 'NoxianSerpent', 'CassiopeiaDuCouteau@gmail.com', '2025-02-27 00:00:00', 1),
(49, 'Lunaris', 'Aphelios', 'MoonlightAssassin', 'ApheliosLunaris@gmail.com', '2025-02-27 00:00:00', 1),
(50, 'Melodious', 'Seraphine', 'StarSinger', 'SeraphineMelodious@gmail.com', '2025-02-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `titre` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `h1` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `accroche` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL,
  `texte` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `url`, `titre`, `description`, `h1`, `accroche`, `public`, `texte`, `modification`) VALUES
(1, '/index.php', 'LAN party!', 'Contient des équipes pour le lan party.', 'Tableau de bord', 'Ce site est la page principal du site', 1, '...', '2025-03-18 13:42:35');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE `resultats` (
  `id` int NOT NULL,
  `equipe_id` int NOT NULL,
  `rang` int NOT NULL,
  `score_final` int NOT NULL,
  `date_partie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`id`, `equipe_id`, `rang`, `score_final`, `date_partie`) VALUES
(1, 1, 1, 10, '2025-03-20 15:19:49'),
(2, 2, 2, 7, '2025-03-19 19:19:49'),
(3, 3, 3, 5, '2025-03-18 19:21:32'),
(4, 4, 4, 3, '2025-03-17 19:21:32'),
(5, 5, 5, 1, '2025-03-16 19:21:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `equipe_id` (`equipe_id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Index pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipe_resultat` (`equipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `resultats`
--
ALTER TABLE `resultats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  ADD CONSTRAINT `equipes_joueurs_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueurs` (`id`),
  ADD CONSTRAINT `equipes_joueurs_ibfk_2` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);

--
-- Contraintes pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD CONSTRAINT `fk_equipe_resultat` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
