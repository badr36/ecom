-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 09:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27
CREATE DATABASE if not exists ecom CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use ecom;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'laptops'),
(2, 'composants'),
(3, 'périphériques pc');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse_1`, `adresse_2`, `telephone`, `email`, `mdp`) VALUES
(1, 'elyatim', 'badr', 'Derb Ghallef', '', '0655102683', 'flipbadr7@gmail.com', '12345678'),
(2, 'bahmou', 'aicha', 'Hay Moulay Abd Allah', '', '0690856979', 'aichabahmou04@gmail.com', '12345678'),
(3, 'saadi', 'ahlame', 'Ain Chock', '', '0695007713', 'ahlame@gmail.com', '12345678'),
(4, 'abir', 'hanaa', 'EL Oulfa', '', '0777890417', 'abirhanaa7@gmail.com', '12345678'),
(5, 'Maarouf', 'Mouad', 'residence chaimaa', '', '0705601146', 'techno.country2022@gmail.com', 'Shutthepc'),
(6, 'abir', 'majda', 'casa', '', '0666666666', 'majda123abir@gmail.com', '12345678'),
(7, 'boumesmar', 'wissal', 'Errahma', '', '0777777777', 'wissal123bm@gmail.com', '12345678'),
(8, 'Boukniter', 'Mouad', 'Ancien Medina', '', '0684752369', 'mouad123bk@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_client` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `date`, `id_client`, `status`) VALUES
(4, '2022-06-22 11:47:10', 2, 'Livrée'),
(5, '2022-05-22 17:13:25', 2, 'Livrée'),
(6, '2022-05-22 17:13:19', 2, 'Livrée'),
(7, '2022-04-22 18:13:17', 2, 'Livrée'),
(8, '2022-04-22 18:13:23', 3, 'Livrée'),
(9, '2022-04-22 18:13:21', 4, 'Livrée'),
(10, '2022-03-22 17:36:44', 2, 'Livrée'),
(11, '2022-03-22 17:36:40', 2, 'Livrée'),
(12, '2022-03-22 17:36:38', 2, 'Livrée'),
(13, '2022-03-22 17:36:36', 2, 'Livrée'),
(14, '2022-02-22 17:40:54', 1, 'Livrée'),
(15, '2022-02-22 17:41:02', 1, 'Livrée'),
(16, '2022-02-22 17:41:06', 1, 'Livrée'),
(17, '2022-02-22 17:41:08', 1, 'Livrée'),
(18, '2022-02-22 17:41:12', 1, 'Livrée'),
(19, '2022-01-22 18:13:15', 6, 'Livrée'),
(20, '2022-01-22 18:12:55', 6, 'Livrée'),
(21, '2022-01-22 18:13:11', 6, 'Livrée'),
(22, '2022-01-22 18:13:06', 6, 'Livrée'),
(23, '2022-01-22 18:13:00', 7, 'Livrée'),
(24, '2022-01-22 18:12:51', 8, 'Livrée'),
(25, '2022-06-22 19:23:43', 7, 'En Attente'),
(26, '2022-06-22 19:27:18', 1, 'En Cours'),
(27, '2022-06-22 19:28:31', 2, 'Annuler'),
(28, '2022-06-22 19:29:56', 4, 'Validé');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu`, `id_client`, `id_produit`) VALUES
(1, 'Cette carte graphique vous donnera plus de 60 fps sur des titres tels que Ghostrunner, Control et de nombreux autres jeux sortis en 2021 tant que vous disposez d\'au moins 16 Go de RAM (j\'en ai 32) et d\'un processeur Intel i7-i9.\r\n\r\nUtilisez Geforce Experience pour maintenir à jour le pilote de votre carte graphique.\r\n\r\nREMARQUE : Assurez-vous de mettre à jour votre logiciel BIOS avant d\'installer votre carte graphique pour éviter tout problème de pilote potentiel.', 1, 4),
(2, 'Really cool looking Card but the coil whine is a no go. Even with headphones on, it sounds like a high pitch torture test. Just bad. Go ahead and buy one but good luck!', 1, 3),
(3, 'Fonctionne un peu chaud, alors assurez-vous d\'avoir un bon refroidisseur AIO/ventilateur si vous envisagez de passer à celui-ci. À titre de comparaison, il chauffe environ 7 à 9 ° C de plus que mon 3900X.\r\n\r\nIdéal pour les jeux en 1080p/1440p, mais pas d\'augmentation notable du FPS en 4K, où le goulot d\'étranglement est presque toujours le GPU. Quoi qu\'il en soit, c\'est une puce solide à un PDSF du 5800x lors de sa sortie il y a un an. Ce processeur vous accompagnera jusqu\'à ce que les problèmes AM5/DDR5 soient étoffés et que les prix baissent.', 1, 2),
(4, 'It\'s really good and legit but get it on mechanicalkeyboards.com it\'s way cheaper and faster\r\n\r\n', 1, 5),
(5, 'C\'est une très bonne carte mère . Je la recommande pour les Youtubers et les Gamers. Elle marche avec des cpus amd', 5, 8),
(6, 'Bon Clavier', 5, 5),
(8, 'With this CPU I was finally able to achieve my dream of playing Minesweeper at 600 FPS. 5 stars out of 5.', 5, 2),
(9, 'Best 4k 120fps card you can buy and you will pay royalty for it.', 5, 3),
(10, 'Great monitor but they forgot to ship me a power cord and any HDMI or DP cable so I had to get my own and that they would not send me any cable I had to refund if I wanted my money back or exchange to get cables. Terrible service great product though.', 5, 7),
(11, 'Great product, I\'m super satisfied with this mobo!', 5, 8),
(12, 'I am running this board with a Ryzen 5800x and have since acquired an RTX 3080 (versus the 1080 in the picture) I had to use the CPU-less bios flashing feature to upgrade the bios for the new Ryzen 5000 series chips. I have been running my system for about 4 months now and have had no issues that I can attribute to the motherboard. It rates very high on VRM cooling from various tech YouTube channels', 2, 8),
(13, 'Je l\'achèterais certainement à nouveau.', 2, 6),
(14, 'J\'ai eu ça pour que mon fils l\'utilise pour l\'école virtuelle et les jeux. Il adore ça, c\'est petit et compact et ça tient bien sur son bureau. Les couleurs sont amusantes, c\'est très lumineux. A l\'air cool mais entièrement fonctionnel comme clavier.', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id`, `contenu`, `id_produit`) VALUES
(1, 'Désignation: Gigabyte Z690 AORUS PRO DDR5', 1),
(2, 'Support du Processeur: Intel 1700', 1),
(3, 'Format de Mémoire: 4 X DIMM 288 pins (DDR5)', 1),
(4, 'Fréquence Mémoire: DDR5 6200 MHz', 1),
(5, 'Nombre et type de slots: Aucun', 1),
(6, 'Format: ATX', 1),
(7, 'Modèle de processeur : AMD Ryzen 7 5800X', 2),
(8, 'Fréquence CPU : 3.8 Ghz', 2),
(9, 'Fréquence en mode Turbo : 4.7 Ghz', 2),
(10, 'Nombre de Cœurs : 8', 2),
(11, 'Nombre de Threads : 16', 2),
(12, 'Contrôleur graphique intégré : Non', 2),
(13, 'Chipset graphique : Aucun', 2),
(14, 'Fréquence(s) Mémoire : DDR4 3200Mhz / DDR5 4800Mhz', 2),
(15, 'Désignation : Asus ROG STRIX GeForce RTX 3080 O12G GAMING LHR', 3),
(16, 'Modèle :  90YV0FAC-M0NM00', 3),
(17, 'Chipset Graphique : NVIDIA', 3),
(18, 'Fréquence Boostée: 1890 MHz', 3),
(19, 'Overclockée: Oui', 3),
(20, 'Bus: PCI Express 4.0 16x', 3),
(21, 'Sorties Vidéo: 3 X DisplayPort Femelle + 2 X HDMI Femelle', 3),
(22, 'Désignation : PNY GeForce RTX 3050 8GB XLR8 Gaming REVEL EPIC-X RGB', 4),
(23, 'Modèle :  VCG30508SFXPPB', 4),
(24, 'Chipset Graphique : NVIDIA', 4),
(25, 'Fréquence du Chipset: 1552 MHz', 4),
(26, 'Fréquence Boostée: 1777 MHz', 4),
(27, 'Overclockée: Non', 4),
(28, 'Bus: PCI Express 4.0 16x', 4),
(29, 'Sorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle', 4),
(30, 'Désignation: Ducky Channel One 2 Mini RGB Noir – Brown Switch', 5),
(31, 'Format: Normal', 5),
(32, 'Norme du clavier: Azerty', 5),
(33, 'Sans Fil: Non', 5),
(34, 'Type de touches: Mécanique', 5),
(35, 'Rétro-éclairage: Oui', 5),
(36, 'Touches multimédia: Non', 5),
(37, 'Pave numérique: Non', 5),
(38, 'Couleur: Noir', 5),
(39, 'Type alimentation: Port USB', 5),
(40, 'Désignation: ASUS 27″ LED – ProArt PA278QV', 6),
(41, 'Taille de l’écran: 27 pouces', 6),
(42, 'Format de l’écran: 16/9', 6),
(43, 'Type de dalle: Dalle IPS', 6),
(44, 'Résolution Max: 2560 x 1440 pixels', 6),
(45, 'Temps de réponse: 5 ms', 6),
(46, 'Taux de rafraichissement: 75 Hz', 6),
(47, 'Désignation: MSI 24.5″ LED – Optix MAG251RX', 7),
(48, 'Taille de l’écran: 24.5 pouces', 7),
(49, 'Format de l’écran: 16/9', 7),
(50, 'Type de dalle: Dalle IPS', 7),
(51, 'Résolution Max: 1920*1080', 7),
(52, 'Temps de réponse: 1ms', 7),
(53, 'Taux de rafraichissement: 240Hz', 7),
(54, 'Désignation: MSI MAG X570S TORPEDO MAX', 8),
(55, 'Support du Processeur: AMD AM4', 8),
(56, 'Format de Mémoire: 4 X DIMM 288 pins (DDR4)', 8),
(57, 'Fréquence Mémoire: DDR4 5100 MHz', 8),
(58, 'Nombre et type de slots: 2 X PCI Express 3.0 1x', 8),
(59, 'Format: ATX', 8),
(60, '15.6″ FHD (1920*1080), 240Hz, close to 100%sRGB', 9),
(61, 'RTX3070 Max-Q, GDDR6 8GB', 9),
(62, 'Intel HM470', 9),
(63, 'Comet lake i7-10870H+HM470', 9),
(64, 'DDR IV 8GB*2 (3200MHz)', 9),
(65, '1TB NVMe PCIe Gen3x4 SSD', 9),
(66, 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5.1', 9),
(67, 'Windows10 Home Africa', 9),
(68, '4 cell , 99.9Whr', 9),
(69, 'Stealth Trooper Backpack', 9),
(70, 'Système d’exploitation Windows 10 Accueil', 10),
(71, 'Chipset Intel® HM570', 10),
(72, 'Mémoire 1 x 8 Go DDR4-3200, 2 emplacements, jusqu’à 64 Go', 10),
(73, 'Écran Full HD 15,6″ (1920×1080), fréquence de rafraîchissement 144 Hz, panneau de niveau IPS', 10),
(74, 'Graphics NVIDIA® GeForce RTX™ 3050 Laptop GPU 4 Go GDDR6', 10),
(75, 'Emplacements de stockage 1 x 512 Go NVMe M.2 SSD par PCIe Gen3 x4', 10),
(76, 'Clavier rouge rétroéclairé Clavier de jeu', 10),
(77, 'Support du Processeur: Intel 1200', 11),
(78, 'Format de Mémoire: 4 X DIMM 288 pins (DDR4)', 11),
(79, 'Fréquence Mémoire: DDR4 4600 MHz', 11),
(80, 'Nombre et type de slots: Aucun', 11),
(81, 'Norme Réseau: 2.5 Gbps Gigabit Ethernet (2.5 GbE)', 11),
(82, 'Connecteurs Disques: ', 11),
(83, '1 X M.2 PCI-E 1x + SATA 6Gb/s', 11),
(84, '3 X M.2 – PCI-E 4.0 4x', 11),
(85, '6 X Serial ATA 6Gb/s (SATA Revision 3)', 11),
(86, 'Format: ATX', 11),
(90, 'Désignation: Logitech G Pro Wireless', 12),
(91, 'Interface avec l’ordinateur: USB', 12),
(92, 'Nombre de boutons: 8', 12),
(93, 'Rétro-éclairage: Oui', 12),
(94, 'Type de Souris: Optique', 12),
(95, 'Résolution Optique: 25600 DPI', 12),
(96, 'Couleur: Noir', 12),
(97, 'Norme 80 PLUS : 80 Plus Gold', 13),
(98, 'Modulaire : Oui', 13),
(99, 'Modularité : 100% Modulaire', 13),
(100, 'Connecteur(s) alimentation :', 13),
(101, '1 X +12V (Alimentation P8 – 2 x P4)', 13),
(102, '1 X +12V (Alimentation P8)', 13),
(103, '12 X Alimentation Serial ATA', 13),
(104, '1 X ATX 24 Broches', 13),
(105, '4 X Molex (4 broches) Femelle', 13),
(106, '4 X PCI Express 6 + 2 Broches', 13),
(107, 'Format Alimentation : ATX/EPS', 13),
(108, '17.3″ FHD (1920*1080), IPS-Level 120Hz Thin Bezel', 14),
(109, 'RTX2060, GDDR6 6GB', 14),
(110, 'Intel HM470', 14),
(111, 'Comet lake i7-10750H+HM470', 14),
(112, 'DDR IV 8GB*2 (2666MHz)', 14),
(113, '512GB NVMe PCIe SSD', 14),
(114, 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', 14),
(115, 'Windows10 Home Africa', 14),
(116, '3 cell , 51Whr', 14),
(117, 'Air Gaming Backpack', 14);

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commandes`
--

CREATE TABLE `ligne_commandes` (
  `id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligne_commandes`
--

INSERT INTO `ligne_commandes` (`id`, `qty`, `id_commande`, `id_produit`) VALUES
(12, 1, 4, 5),
(13, 1, 4, 3),
(14, 1, 4, 2),
(15, 1, 4, 8),
(16, 1, 4, 1),
(17, 1, 4, 4),
(18, 1, 4, 6),
(19, 1, 4, 7),
(20, 1, 5, 2),
(21, 1, 6, 6),
(22, 1, 7, 6),
(23, 4, 8, 2),
(24, 2, 8, 7),
(25, 1, 9, 2),
(26, 1, 9, 7),
(27, 1, 9, 8),
(28, 2, 10, 2),
(29, 3, 10, 9),
(30, 1, 11, 2),
(31, 1, 11, 7),
(32, 1, 11, 6),
(33, 1, 12, 1),
(34, 1, 12, 4),
(35, 1, 12, 3),
(36, 1, 13, 7),
(37, 1, 13, 1),
(38, 1, 13, 8),
(39, 2, 14, 1),
(40, 1, 14, 2),
(41, 2, 14, 3),
(42, 2, 14, 5),
(43, 1, 15, 5),
(44, 1, 15, 4),
(45, 1, 16, 6),
(46, 1, 17, 9),
(47, 1, 18, 5),
(48, 1, 18, 8),
(49, 1, 19, 7),
(50, 1, 20, 1),
(51, 1, 21, 4),
(52, 1, 22, 7),
(53, 1, 22, 1),
(54, 1, 23, 1),
(55, 1, 24, 1),
(56, 1, 24, 7),
(57, 1, 25, 8),
(58, 1, 25, 7),
(59, 1, 25, 1),
(60, 1, 26, 6),
(61, 1, 26, 11),
(62, 1, 26, 12),
(63, 1, 26, 14),
(64, 1, 27, 11),
(65, 1, 27, 12),
(66, 1, 27, 13),
(67, 1, 27, 1),
(68, 1, 28, 12),
(69, 3, 28, 11),
(70, 1, 28, 10);

-- --------------------------------------------------------

--
-- Table structure for table `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paniers`
--

INSERT INTO `paniers` (`id`, `qty`, `id_client`, `id_produit`) VALUES
(27, 1, 3, 7),
(28, 1, 3, 5),
(29, 1, 3, 1),
(30, 1, 3, 4),
(31, 1, 3, 8),
(74, 1, 6, 1),
(75, 1, 6, 9),
(76, 1, 6, 8),
(77, 1, 6, 10),
(85, 1, 7, 4),
(86, 3, 7, 6),
(87, 1, 7, 1),
(88, 1, 1, 1),
(89, 1, 1, 6),
(90, 1, 1, 5),
(91, 1, 2, 4),
(92, 1, 2, 3),
(93, 1, 2, 5),
(94, 1, 2, 11),
(95, 1, 2, 12),
(96, 1, 4, 5),
(97, 1, 4, 2),
(98, 1, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `stock`, `image`, `id_categorie`) VALUES
(1, 'Gigabyte Z690 AORUS PRO DDR5', 4190, 10, '1.png', 2),
(2, 'AMD Ryzen 7 5800X3D (3.4 Ghz / 4.5 Ghz)', 5990, 10, '2.png', 2),
(3, 'Asus ROG STRIX GeForce RTX 3080 O12G GAMING LHR', 17900, 30, '3.png', 2),
(4, 'PNY GeForce RTX 3050 8GB XLR8 Gaming REVEL EPIC-X', 4590, 5, '4.png', 2),
(5, 'Ducky Channel One 2 Mini RGB Noir – Brown Switch', 1290, 50, '5.png', 3),
(6, 'Asus ProArt PA278QV', 5290, 6, '6.png', 3),
(7, 'MSI Optix MAG251RX', 5190, 100, '7.png', 3),
(8, 'MSI MAG X570S TORPEDO MAX', 3549, 7, '8.png', 2),
(9, 'MSI GE66 Raider 10UG (RTX3070, GDDR6 8GB)', 16499, 16, 'IMG-62b3129c9c8ea8.92059517.png', 1),
(10, 'MSI GF66 Katana i5 15.6″ RTX 3050 MAX', 15999, 10, 'IMG-62b313badc3597.42485280.png', 1),
(11, 'Gigabyte Z590 VISION G', 2190, 13, 'IMG-62b31591d270f5.94399560.png', 2),
(12, 'Logitech G Pro Wireless', 1450, 10, 'IMG-62b31807bbb279.77139130.png', 3),
(13, 'Cooler Master MWE 850W V2 Gold Modulaire', 1690, 13, 'IMG-62b319a5065c28.18539069.png', 2),
(14, 'MSI GF75 Thin 10SER (RTX2060, GDDR6 6GB)', 16900, 78, 'IMG-62b3668f161078.66779965.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `descriptions_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD CONSTRAINT `ligne_commandes_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `ligne_commandes_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `paniers_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
