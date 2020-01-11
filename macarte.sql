-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Juin 2017 à 23:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `macarte`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `mdp`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `endroit`
--

CREATE TABLE IF NOT EXISTS `endroit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(80) NOT NULL,
  `type` varchar(50) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `image` text NOT NULL,
  `video` text NOT NULL,
  `description` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `etat` varchar(5) NOT NULL,
  `maj` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `endroit`
--

INSERT INTO `endroit` (`id`, `titre`, `type`, `lat`, `lng`, `image`, `video`, `description`, `adresse`, `telephone`, `email`, `etat`, `maj`) VALUES
(12, 'Di Roma	', 'restaurant', 35.1801, -0.633391, 'diroma.png', 'vod.mp4', 'Ce restaurant cosy de 60 places, fait le bonheur des amoureux de la Cuisine ', 'El Makam', '0551147127', 'di-roma@outlook.fr', 'true', 'true'),
(13, 'Robba', 'restaurant', 35.1902, -0.634846, 'robba.png', 'vid.mp4', 'ce restaurant cosy de 60 , fait le bonheur des amoureux de la cuisine ou se mÃªlent harmonieusement les  amoureux de la bonne cuisine ', 'elmadina elmonawara', '0552970004', 'robba-rest@hotmail.com', 'true', 'true'),
(14, 'Hermes', 'restaurant', 35.2013, -0.636178, 'hermes.png', 'vod.mp4', 'ce restaurant cosy de 30 , fait le bonheur des amoureux de la cuisine ou se mÃªlent harmonieusement les  amoureux de la bonne cuisine ', 'RÃ©sidance Tessala', '0552970004', 'hermes@outlook.fr', 'true', 'true'),
(15, 'Chez Negro', 'restaurant', 35.1953, -0.626445, '18221607_1173651402745023_2378053589984495789_n.jpg', 'fast.mp4', 'pour les amoureux des plats traditionnels ', 'Rue Lieutenant Abdelkrim', '0550537643', 'negro_resto_dz@gmail.com', 'true', 'true'),
(16, 'Assala', 'restaurant', 35.1826, -0.646338, 'photomania-66e6498ef2272b6e6a80dbca806435b7.jpg', 'vod.mp4', 'pour les amoureux de la cuisine algÃ©rienne ', 'Rue Belahcel Mourad', '0770666667', 'assaladz@hotmail.fr', 'true', 'true'),
(17, 'Petit Paris', 'cafeteria', 35.1928, -0.61785, '6.jpg', 'cafe.mp4', 'fort,  serrÃ©, lÃ©ger, allongÃ©, corsÃ©, dÃ©cafÃ©inÃ©, frappÃ©, irlandais, italien, au lait, chaud, froid, crÃ¨me, glacÃ©, petit, grand, noisette, lyophilisÃ©...', 'Boulevard Abane Ramdane', '0555942668', 'petit-paris-cafe@hotmail.fr', 'true', 'true'),
(18, 'Petit Vichy', 'cafeteria', 35.1911, -0.630464, 'lllll.jpg', 'cafe.mp4', 'fort serrÃ© lÃ©ger allongÃ© corsÃ© dÃ©cafÃ©inÃ© irlandais italien au lait chaud froid cremz glacÃ© petit grand noisette ...\r\n', 'Boulevard Emir Abdelkader', '0555942668', 'cafeVichy@hotmail.fr', 'true', 'true'),
(19, 'Moustachfa', 'fast food', 35.1838, -0.644259, 'robba.png', 'fast.mp4', '', 'Boulevard 8 mars	', '0772153548', 'mosta@gmail.com', 'true', 'true'),
(20, 'Le Temps des Fleurs', 'magasin', 35.1792, -0.63288, 'temp.png', 'tara.mp4', 'Au fil des annÃ©es, Temps Forts propose un style original, sobre et actuel', 'El Makam', '0557797912', 'tara_fleurs@outlook.fr', 'true', 'true'),
(21, 'Sakanideco', 'magasin', 35.2041, -0.627017, 'mg.jpg', 'jj.mp4', 'Au fil des annÃ©es, Temps Forts propose un style original, sobre et actuel', 'Avenue Ghermouche Mohamed Route oran', '0555045147', 'deco@live.com', 'true', 'true'),
(22, 'Givova AlgÃ©rie', 'magasin', 35.1959, -0.635574, 'demenagement-Temps-Forts.jpg', 'tara.mp4', 'Chez givova, vous pouvez prendre votre temps et faire les bons choix', 'Avenue Lieutenant Kheladi', '048654502', 'givovaDz@live.com', 'true', 'true'),
(23, 'VOG', 'magasin', 35.2123, -0.622785, 'boutique-01.jpg', 'bl.mp4', 'vous pouvez prendre votre temps et faire les bons choix', 'sidi bel abbes', '0560943220', 'vogdz@hotmail.com', 'true', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomtype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nomtype`) VALUES
(6, 'restaurant'),
(7, 'cafeteria'),
(8, 'fast food'),
(9, 'cremerie'),
(10, 'pizzeria'),
(11, 'magasin'),
(12, 'supermarche'),
(13, 'superette'),
(14, 'marchÃ©'),
(15, 'ecole'),
(16, 'lycee'),
(17, 'cem'),
(18, 'universitÃ©'),
(19, 'ecole supÃ©rieure'),
(20, 'hopital'),
(21, 'creche'),
(22, 'clinique'),
(23, 'maternitÃ©'),
(26, 'sale des fetes'),
(27, 'mairie '),
(28, 'wilaya'),
(29, 'daira'),
(30, 'hotel'),
(31, 'boulangerie'),
(32, 'boucherie'),
(33, 'bijouterie');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
