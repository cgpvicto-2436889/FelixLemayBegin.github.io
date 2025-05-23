DROP DATABASE IF EXISTS lanparty_felixlemaybegin;
CREATE DATABASE IF NOT EXISTS lanparty_felixlemaybegin;
USE lanparty_felixlemaybegin;

CREATE TABLE contacts (
  nom varchar(168) NOT NULL,
  sujet varchar(255) NOT NULL,
  courriel varchar(255) NOT NULL,
  message varchar(255) NOT NULL
);

CREATE TABLE jeux (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(255) DEFAULT NULL
);

CREATE TABLE equipes (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(50) NOT NULL UNIQUE,
  slogan varchar(100) DEFAULT NULL,
  commentaire text,
  dateajout date NOT NULL,
  jeu_id int DEFAULT NULL,
  FOREIGN KEY (jeu_id) REFERENCES jeux (id) ON DELETE SET NULL
);

CREATE TABLE joueurs (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nomfamille varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  pseudo varchar(50) NOT NULL UNIQUE,
  courriel varchar(100) NOT NULL UNIQUE,
  dateinscription timestamp DEFAULT NULL,
  actif boolean DEFAULT NULL
);

CREATE TABLE equipes_joueurs (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  joueur_id int NOT NULL,
  equipe_id int NOT NULL,
  FOREIGN KEY (joueur_id) REFERENCES joueurs (id),
  FOREIGN KEY (equipe_id) REFERENCES equipes (id)
);

CREATE TABLE pages (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  url varchar(255) NOT NULL UNIQUE,
  titre varchar(60) NOT NULL,
  description varchar(150) NOT NULL,
  h1 varchar(100) NOT NULL,
  accroche varchar(255) DEFAULT NULL,
  public boolean NOT NULL,
  texte text NOT NULL,
  modification timestamp NOT NULL
);

CREATE TABLE resultats (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  equipe_id int NOT NULL,
  rang int NOT NULL,
  score_final int NOT NULL,
  date_partie timestamp NOT NULL,
  FOREIGN KEY (equipe_id) REFERENCES equipes (id)
);

-- --------------------------------------------------------
CREATE TABLE usagers (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  code varchar(255) NOT NULL UNIQUE,
  prenom varchar(255) NOT NULL,
  nomfamille varchar(255) NOT NULL,
  courriel varchar(255) NOT NULL,
  motdepasse varchar(60) NOT NULL,
  photo varchar(255) DEFAULT NULL,
  dernieracces timestamp DEFAULT NULL,
  actif boolean NOT NULL
);

INSERT INTO jeux (id, nom) VALUES
(1, 'league of legends'),
(2, 'valorant'),
(3, 'overwatch'),
(4, 'scrabble'),
(5, 'minecraft');

INSERT INTO equipes (id, nom, slogan, dateajout, jeu_id) VALUES 
('1', 'Les Titans Sanglants', 'Le sang forge notre puissance, la victoire scelle notre légende.', '2025-02-27', '3'), 
('2', 'Les Lames de l’Ombre', 'Invisible dans la nuit, implacable dans le combat.', '2025-02-27', '1'), 
('3', 'La Légion Immortelle', 'Nous ne reculons jamais, nous ne tombons jamais.\r\n\r\n', '2025-02-27', '3'), 
('4', 'Les Protecteurs Stellaires', 'Brillons plus fort que les ténèbres, combattons pour l’espoir.', '2025-02-27', '4'), 
('5', 'Le Cercle des Assassins', 'Un coup, une cible, une mort certaine.', '2025-02-27', '4');

INSERT INTO joueurs (id, nomfamille, prenom, pseudo, courriel, dateinscription, actif) VALUES
(1, 'Ragestone', 'Darius', 'DunkMaster', 'DariusRagestone@gmail.com', '2025-02-27 00:00:00', true),
(2, 'Xun', 'Lee Sin', 'BlindMonk', 'LeeSinXun@gmail.com', '2025-02-27 00:00:00', true),
(3, 'Jihoon', 'Ahri', 'FoxSpirit', 'AhriJihoon@gmail.com', '2025-02-27 00:00:00', true),
(4, 'Vermillion', 'Jinx', 'MadBomber', 'JinxVermillion@gmail.com', '2025-02-27 00:00:00', true),
(5, 'Harrowind', 'Thresh', 'SoulReaper', 'ThreshHarrowind@gmail.com', '2025-02-27 00:00:00', true);

INSERT INTO pages (id, url, titre, description, h1, accroche, public, texte, modification) VALUES
(1, 'index.php', 'Tableau de bord', 'La page d acceuil du lanparty qui contient les cartes d équipes', 'Tableau de bord', 'Le lan party que vous ne voulez pas manquer', true, ' ', '2025-04-15 18:19:21'),
(2, 'resultats.php', 'Résultats', 'Consultez les résultats et statistiques des événements LAN Party.', 'Résultats', 'Visualisez les résultats de vos compétitions préférées.', true, '<div class="logo"><img src="medias/commun/logoLanParty.png"></div>', '2025-04-15 10:00:00'),
(3, 'a-propos.php', 'À propos', 'Découvrez les objectifs de l étudiante derrière ce site, sa passion pour le web et son envie d apprendre.', 'À propos', 'Apprendre, progresser et devenir une pro du développement web !', true, 'Mes objectifs pour cette page sont de la rendre belle et cool. Je veut avoir 100% et apprendre pleins de nouvelles choses pour devenir meilleure en developpement web<br><img src="medias/commun/moi%20ma%20face.jpg" alt="photo de moi">', '2025-04-15 10:30:00'),
(4, 'formulaire-contact.php', 'Formulaire de contact', 'Contactez-nous facilement à l aide de ce formulaire. Nous vous répondrons rapidement !\r\n', 'Formulaire', 'Une question ? Une suggestion ? Écrivez-nous !\r\n', true, '<div class="logo"><img src="medias/commun/logoLanParty.png"></div>\r\n', '2025-04-15 10:50:00'),
(5, 'joueurs.php', 'La liste des joueurs', 'Fait la liste de tous les joueurs', 'Liste joueurs', 'vive la pleine lune des joueurs', true, 'PErmet de voir tous les joueurs', '2025-04-17 20:10:09'),
(6, 'formulaire-joueurs.php', 'Ajout de joueur', 'Permet d ajouter des joueurs dans le lan party', 'AJout joueur', 'Ajoute ton joueurs, afin de mieux gagner youpi !!', true, 'Ajoute un purer de joueur', '2025-04-17 20:19:29'),
(7, 'formulaire-equipe.php', 'Ajout d équipe', 'Permet d Ajouter une équipe', 'Ajout équipe', 'Ajoute ton équipe, afin de pouvoir gagner pleins de choses :)', true, 'Hey. Écoute fait juste écouter. Ajoute juste une équipe ok ?\r\n', '2025-04-09 22:37:17'),
(8, 'formulaire-resultat.php', 'Ajout d un résultat', 'Permet d Ajouter un résultat', 'Ajout de résultat', 'ajoute un resultat ou je t ajoute', true, 'cool', '2025-04-16 14:45:04'),
(9, 'formulaire-authentification.php', 'Formulaire d authentification', 'Permet d authentifier un utilisateur', 'Authentification', 'Authentifie toi ou jt authentifie', true, 'erbgergerggeg', '2025-05-01 15:58:30'),
(10, 'formulaire-page-accueil.php', 'Ajouter du texte dans l entete de index', 'Ajouter du texte', 'Ajouter du texte', 'Ajoute du texte ou je t ajoute', TRUE, 'Ajouter du texte', '2025-05-22 12:39:46');

INSERT INTO equipes_joueurs (id, joueur_id, equipe_id) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

INSERT INTO resultats (id, equipe_id, rang, score_final, date_partie) VALUES
(1, 1, 1, 10, '2025-03-20 15:19:49'),
(2, 2, 2, 7, '2025-03-19 19:19:49'),
(3, 3, 3, 5, '2025-03-18 19:21:32'),
(4, 4, 4, 3, '2025-03-17 19:21:32'),
(5, 5, 5, 1, '2025-03-16 19:21:32');

INSERT INTO usagers (id, code, prenom, nomfamille, courriel, motdepasse, actif) VALUES
(1, 'flemaybegin', 'félix', 'lemay', 'filoupoupo@gmail.com', '$2y$10$vF4EAdoZ7rnoJWpchCBq4uXixQp9zZ9oE/FoEdFkDiTjECjHh5qYm', true),
(2, 'dev', 'Cirine', 'Chaieb', 'dev.web1@gmail.com', '$2y$10$Hwz6ZRJl7kD4TlOGIiIzyeDLuP8LlOASoqiBH9m/xUhIRYyBv5Z0G', true);