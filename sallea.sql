-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Avril 2017 à 10:37
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sallea`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `id_salle` int(3) DEFAULT NULL,
  `commentaire` text,
  `note` int(2) DEFAULT NULL,
  `date_enregistrement` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `id_membre`, `id_salle`, `commentaire`, `note`, `date_enregistrement`) VALUES
(1, 8, 2, 'J''ai adoré travailler dans cette salle ! \r\n+1 pour le soin apporter à la décoration des sanitaires !!!!', 5, '2017-03-10 00:00:00'),
(2, 12, 3, 'Je suis satisfai', 4, '2017-04-25 00:00:00'),
(3, 12, 3, 'Je suis satisfaite du service ! \r\nUne salle conviviale, idéale pour accueillir mes collègues.', 4, '2017-04-25 00:00:00'),
(4, 5, 4, 'Propre. Je recommande.', 5, '2017-03-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `date_enregistrement` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `id_produit`, `date_enregistrement`) VALUES
(1, 12, 3, '2017-04-20 00:00:00'),
(2, 5, 1, '2017-03-12 00:00:00'),
(3, 6, 4, '2017-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `civilite` enum('m','f') DEFAULT NULL,
  `statut` int(1) DEFAULT NULL,
  `date_enregistrement` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `statut`, `date_enregistrement`) VALUES
(1, 'JanineDragonForce360', '123456', 'Joubert', 'Janine', 'dragonforce360@gmail.com', 'f', 0, '2017-03-25 00:00:00'),
(2, 'Lol45', '987654', 'Suissorti', 'Jean', 'jeanssuissorti@yahoo.fr', 'm', 0, '2016-05-12 00:00:00'),
(3, 'Le_Poulpe', 'jesuisunpoulpe', 'Poulpe', 'Le', 'lepoulpe@gmail.com', 'm', 1, '1990-02-15 00:00:00'),
(4, 'OptimalPride', 'jesuisdev', 'Jack', 'Apple', 'applejack@gmail.com', 'm', 1, '2017-04-25 00:00:00'),
(5, 'Sandra_04', 'musique', 'Webforce', 'Sandra', 'sandra@webforcemail.com', 'f', 1, '2017-02-06 00:00:00'),
(6, 'Gerard_Pilier_de_Bar', 'glouglou', 'Pillier', 'Gerard', 'lapicole@gmail.com', 'm', 0, '2017-03-10 00:00:00'),
(7, 'Elysee_2002', 'bernadettemonamour', 'Chirac', 'Jacques', 'elysse2002@gmail.com', 'm', 0, '2016-04-08 00:00:00'),
(8, 'Pepito', 'mucho', 'Sanchez', 'José', 'josesanchez@outlook.fr', 'm', 0, '2017-01-12 00:00:00'),
(9, 'Morticia_59', 'sacrifice666', 'Martin', 'Melanie', 'melaniem@gmail.com', 'f', 0, '2016-12-05 00:00:00'),
(10, 'TranBer', 'gfufjt45', 'Filotel', 'Bertrand', 'tranber@yahoo.fr', 'm', 0, '2017-02-07 00:00:00'),
(11, 'Promethean', 'metalforever', 'Orthoga', 'Nicolas', 'promethean@gmail.com', 'm', 0, '2017-01-25 00:00:00'),
(12, 'Maman_du_18', 'ethanlealou', 'Martello', 'Françoise', 'fmartello@gmail.com', 'f', 0, '2017-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `id_salle` int(3) DEFAULT NULL,
  `date_arrivee` datetime DEFAULT NULL,
  `date_depart` datetime DEFAULT NULL,
  `prix` int(3) DEFAULT NULL,
  `etat` enum('libre','reservation') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_salle`, `date_arrivee`, `date_depart`, `prix`, `etat`) VALUES
(1, 1, '2017-04-25 00:00:00', '2017-04-30 00:00:00', 1200, 'libre'),
(2, 2, '2016-03-15 00:00:00', '2016-04-21 00:00:00', 800, 'reservation'),
(3, 3, '2017-02-12 00:00:00', '2017-02-27 00:00:00', 1600, 'reservation'),
(4, 4, '2017-03-21 00:00:00', '2017-03-29 00:00:00', 1100, 'libre'),
(5, 5, '2017-03-24 00:00:00', '2017-04-05 00:00:00', 800, 'reservation');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(3) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  `photo` varchar(200) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `capacite` int(3) DEFAULT NULL,
  `categorie` enum('réunion','bureau','formation') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `titre`, `description`, `photo`, `pays`, `ville`, `adresse`, `cp`, `capacite`, `categorie`) VALUES
(1, 'Salle_Rembrandt', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc., li tot Europa usa li sam vocabularium. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilit&aacute; de un nov lingua franca: on refusa continuar payar custosi traductores. It solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.', 'Rembrandt.jpg', 'France', 'Lyon', '114 Rue Parmentier', 69000, 2, 'bureau'),
(2, 'Salle_Renoir', 'Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental: in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.', 'Renoir.jpg', 'France', 'Paris', '25 Rue de Rivoli', 75001, 16, 'réunion'),
(3, 'Salle_Kandinsky', 'Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. Souvlaki ignitus carborundum e pluribus unum. Defacto lingo est igpay atinlay. Marquee selectus non provisio incongruous feline nolo contendre. Gratuitous octopus niacin, sodium glutimate. Quote meon an estimate et non interruptus stadium.', 'Kandinsky.jpg', 'France', 'Paris', '23 Avenue Filles du Calvaire', 75006, 20, 'formation'),
(4, 'Salle_Stendhal.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Stendhal.jpg', 'France', 'Paris', '45 Rue du Père Goriot', 75002, 2, 'bureau'),
(5, 'Salle_Delacroix', 'Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental: in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.', 'Delacroix.jpg', 'France', 'Marseille', '14 Avenue Georges Brassens', 13000, 10, 'réunion');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
