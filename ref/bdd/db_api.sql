-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 fév. 2021 à 14:33
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type`) VALUES
(1, 'M1'),
(2, 'M2');

-- --------------------------------------------------------

--
-- Structure de la table `epreuves`
--

CREATE TABLE `epreuves` (
  `id_epreuve` int(6) NOT NULL,
  `nom_epreuve` varchar(150) DEFAULT NULL,
  `date_epreuve` date DEFAULT NULL,
  `id_categorie` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 KEY_BLOCK_SIZE=1;

--
-- Déchargement des données de la table `epreuves`
--

INSERT INTO `epreuves` (`id_epreuve`, `nom_epreuve`, `date_epreuve`, `id_categorie`) VALUES
(2, 'La Descente des Alpes - M1', '2021-02-27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id_participant` int(11) NOT NULL,
  `nom_participant` varchar(100) DEFAULT NULL,
  `prenom_participant` varchar(100) DEFAULT NULL,
  `birth_participant` varchar(100) DEFAULT NULL,
  `mail_participant` varchar(100) DEFAULT NULL,
  `img_participant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id_participant`, `nom_participant`, `prenom_participant`, `birth_participant`, `mail_participant`, `img_participant`) VALUES
(1, 'Génique', 'Yoann', '09/01/1996', 'genique.yoann@outlook.com', 'https://www.phhsnews.com/img/how-to-2018/how-to-make-windows-photo-viewer-your-default-image-viewer-on-windows-10.png'),
(2, 'Mairot', 'Jean-christophe', '15/05/1999', 'mairot.jean-christophe@gmail.com', 'https://www.phhsnews.com/img/how-to-2018/how-to-make-windows-photo-viewer-your-default-image-viewer-on-windows-10.png'),
(3, 'Cherief', 'Saufiane', '25/08/1992', 'saufiane.cherief@gmail.com', 'https://www.phhsnews.com/img/how-to-2018/how-to-make-windows-photo-viewer-your-default-image-viewer-on-windows-10.png'),
(4, 'Rameau', 'Célia', '13/04/2000', 'celia.rameau@gmail.com', 'https://www.phhsnews.com/img/how-to-2018/how-to-make-windows-photo-viewer-your-default-image-viewer-on-windows-10.png'),
(5, 'Ligourel', 'Teedji', '15/02/1997', 'ligourel.teedji@gmail.com', 'https://www.phhsnews.com/img/how-to-2018/how-to-make-windows-photo-viewer-your-default-image-viewer-on-windows-10.png');

-- --------------------------------------------------------

--
-- Structure de la table `passages`
--

CREATE TABLE `passages` (
  `id_passage` int(11) NOT NULL,
  `temp_1` float DEFAULT NULL,
  `temp_2` float DEFAULT NULL,
  `meilleur_temp` float DEFAULT NULL,
  `id_categorie` int(4) NOT NULL,
  `id_epreuve` int(4) NOT NULL,
  `id_participant` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `epreuves`
--
ALTER TABLE `epreuves`
  ADD PRIMARY KEY (`id_epreuve`),
  ADD KEY `fk_epreuves_categories` (`id_categorie`) USING BTREE;

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_participant`);

--
-- Index pour la table `passages`
--
ALTER TABLE `passages`
  ADD PRIMARY KEY (`id_passage`),
  ADD KEY `fk_passages_categories` (`id_categorie`),
  ADD KEY `fk_passages_epreuves` (`id_epreuve`),
  ADD KEY `fk_passages_participants` (`id_participant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `epreuves`
--
ALTER TABLE `epreuves`
  MODIFY `id_epreuve` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `passages`
--
ALTER TABLE `passages`
  MODIFY `id_passage` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `epreuves`
--
ALTER TABLE `epreuves`
  ADD CONSTRAINT `fk_epreuve_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);

--
-- Contraintes pour la table `passages`
--
ALTER TABLE `passages`
  ADD CONSTRAINT `fk_passages_categories` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `fk_passages_epreuves` FOREIGN KEY (`id_epreuve`) REFERENCES `epreuves` (`id_epreuve`),
  ADD CONSTRAINT `fk_passages_participants` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
