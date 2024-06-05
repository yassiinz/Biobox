-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2022 at 08:39 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biobox`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `image`) VALUES
(2, 'Drinks', 'image_2022-12-08_095922007.png'),
(3, 'pâtisserie', 'image_2022-12-08_100224563.png'),
(5, 'Food', 'image_2022-12-08_100403975.png');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) NOT NULL,
  `totale` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_commande` date NOT NULL,
  `liste` varchar(254) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `nom`, `totale`, `adresse`, `date_commande`, `liste`) VALUES
(238, 'yassine.riahi@esprit.tn', 8, 'Tunis', '2022-12-14', 'Sandwich street Gourmand'),
(239, 'yassine.riahi@esprit.tn', 8, 'Tunis', '2022-12-14', 'Sandwich street Gourmand'),
(240, 'yassine.riahi@esprit.tn', 8, 'Tunis', '2022-12-14', 'Sandwich street Gourmand'),
(241, 'yassine.riahi@esprit.tn', 8, 'Tunis', '2022-12-14', 'Sandwich street Gourmand'),
(242, 'yassine.riahi@esprit.tn', 20, 'Tunis', '2022-12-14', 'Salade Burata'),
(243, 'riahi.mokhtar@esprit.tn', 17, 'Tunis', '2022-12-14', 'Pina Colada');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(40) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `Stars` int(5) DEFAULT NULL,
  PRIMARY KEY (`idComment`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idComment`, `nom`, `email`, `comment`, `Stars`) VALUES
(147, 'aaa', 'iyedguezmir11@gmail.com', 'zz', 2),
(158, 'sami', 'guezmiriyed7@GMAIL.com', 'great service ', 4),
(160, 'fares', 'z@gmail.com', 'good place', 4),
(162, 'ons', 'iyedguezmir11@gmail.com', 'recommended ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `produit` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom_menu`, `prix`, `produit`) VALUES
(1, 'menu', 25, 9);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(254) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `fk_commande` (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_panier`, `nom_article`, `quantite`, `id_commande`) VALUES
(112, 'mmm', 1, NULL),
(113, 'eeee', 2, NULL),
(114, 'mmmm', 3, NULL),
(118, 'dxgfch', 8, NULL),
(122, 'zeg', 536, NULL),
(124, 'ghj', 5, NULL),
(125, 'azrf', 5615, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `desc_produit` varchar(500) NOT NULL,
  `prix_produit` float NOT NULL,
  `img` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `desc_produit`, `prix_produit`, `img`, `type`) VALUES
(1, 'Sandwich street Gourmand', 'Pain complet\r\n- Salade verte ou tomates selon la saison\r\n- Protéine animale ou végétale : Viande des grisons, oeuf dur, tofu lactofermenté...\r\n- Chèvre frais\r\n- Cornichon\r\n- Ail\r\n- Herbes fraîches', 8, 'images\\img-05.jpg', 'sale'),
(2, 'Salade Burata', 'Laitue,\r\nroquette\r\nmais\r\ntomates cerise\r\nnoix,\r\nraisins secs\r\noignon caramélisé\r\nsauce pesto\r\nmiel', 20, 'images\\img-07.jpg', 'sucre'),
(8, 'Pates a la mediterraneene', 'pates complétes aux concombres\r\ntomates cerises\r\nthon et fromage blanc salade variee tranche de pain aux cereales', 14, 'images\\detail1.jpg', 'sale'),
(9, 'Riz au brocoli', 'riz long grain cuit\r\ncourgette\r\ncarotte\r\noignon\r\npoivron huile d\'olive', 25, 'images\\img-03.jpg', 'sale'),
(10, 'panini Au Poulet & fromage', 'Pain panini complet\r\n- Salade verte ou tomates selon la saison\r\n- Protéine animale ou végétale : Viande des grisons, oeuf dur, tofu lactofermenté...\r\n- Chèvre frais\r\n- Cornichon\r\n- Ail\r\n- Herbes fraîches', 12, 'images\\img-09.jpg', 'sale'),
(11, 'Salade Cesart Street', 'Laitue\r\nconcombre\r\ncarottes râpée\r\ntomate cerise\r\npoulet grillé\r\ncroûtons\r\nparmesan sauce césar', 20, 'images\\img-06.jpg', 'sale'),
(12, 'COOKIES CHAMALOV BROWNIE', 'de coco fondue\r\n\r\nsucre canne\r\n\r\nfarine sans gluten\r\n\r\ncacao poudre\r\n\r\npépite de chocolat\r\n\r\nmini marchamallow\r\n\r\n', 10, 'images\\cookies.jpg', 'sucre'),
(13, 'Gateaux Pomme Ammandes', 'farine sans gluten\r\n\r\nfarine d\'amande\r\n\r\nsucre canne\r\n\r\npoudre d\'amande\r\n\r\ncompote de pomme', 3, 'images\\gateau.jpg', 'sucre'),
(14, 'Tarte au Citron', 'Pâte à tarte\r\n\r\njus de citron\r\n\r\nLe zeste d\'un citron\r\n\r\nsucre canne\r\n\r\nMaïzena', 7, 'images\\tarte.jpg', 'sucre'),
(15, 'Crepe Healthy', 'Yassine Riahi\r\nde coco fondue\r\n\r\nsucre canne\r\n\r\nfarine sans gluten\r\n\r\ncacao poudre\r\n\r\npépite de chocolat\r\n\r\nmini marchamallow', 8, 'images\\crepe.jpg', 'sucre'),
(16, 'Pina Colada', 'Ananas Jus d\'ananas\r\nNoix de coco\r\nCrème de noix de coco\r\n\r\n', 17, 'images\\img-02.jpg', 'boisson'),
(18, 'Jus KIWI', 'Jus de Kiwi\r\nCreme de Kiwi', 10, 'images\\img-04.jpg', 'boisson'),
(19, 'Jus de Fraise', 'Jus de Fraise\r\nCreme de Fraise', 10, 'images\\img-08.jpg', 'boisson');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `idReclamation` int(40) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reclamation` varchar(400) NOT NULL,
  PRIMARY KEY (`idReclamation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`idReclamation`, `nom`, `email`, `reclamation`) VALUES
(3, 'fares', 'z@gmail.com', 'bad service');

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

DROP TABLE IF EXISTS `resto`;
CREATE TABLE IF NOT EXISTS `resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameresto` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresseresto` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `num` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id`, `nameresto`, `adresseresto`, `email`, `num`, `image`, `id_cat`) VALUES
(15, 'symbiose', 'Nabeul-Tunisia', 'symbioseresto@gmail.com', 97500633, 'resto6.jpg', 5),
(16, 'BoBio', 'Nabeul-Tunisia', 'bobio13@gmail.com', 27899630, 'bobio.jpg', 3),
(17, 'Crepa Crepa', 'lac-tunis-tunisia', 'crepax2@gmail.com', 54122269, '314970292_1305454583605222_3458605993869741730_n.jpg', 2),
(18, 'slayta', 'tunis-tunisa', 'slayta.barasalade@gmail.com', 50152191, '217151546_106302655064267_8778387732767269392_n.jpg', 5),
(19, 'Mr Brocoli', 'tunis-tunisa', 'Mr-Brocoli@gmail.com', 26800200, '273203889_107887858476199_8521503845901263262_n.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(50) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'client',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `firstName`, `lastName`, `email`, `password`, `confirmPassword`, `type`) VALUES
(1, 'Riahi', 'Yassine', 'yassine.riahi@esprit.tn', '25753935', '25753935', 'admin'),
(2, 'Riahi', 'mokhtar', 'riahi.mokhtar@esprit.tn', '25753934', '25753934', 'client'),
(3, 'Riahi', 'mahmoud', 'riahi.mahmoud@esprit.tn', '25753931', '25753931', 'client'),
(5, 'kalai', 'souad', 'kalai.souad@esprit.tn', '25753936', '25753936', 'admin'),
(6, 'Riahi', 'chaima ', 'riahi.chaima@esprit.tn', '25753937', '25753937', 'client'),
(7, 'emna ', 'borgi', 'emna.borgi@esprit.tn', '25753936', '25753936', 'livreur'),
(8, 'taher ', 'mansouri', 'taher.mansouri@esprit.tn', '25753935', '25753935', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resto`
--
ALTER TABLE `resto`
  ADD CONSTRAINT `resto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
