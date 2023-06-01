-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 juin 2023 à 12:00
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
-- Base de données : `memoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `délégué_médical`
--

CREATE TABLE `délégué_médical` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `numéro_de_téléphone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `id_pers` int(255) NOT NULL,
  `bio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `délégué_médical`
--

INSERT INTO `délégué_médical` (`name`, `email`, `Adresse`, `numéro_de_téléphone`, `password`, `user_type`, `photo_profile`, `id_pers`, `bio`) VALUES
('biocare', 'biocare@gmail.com', '123', '1575', '', 'délégué_médical', '6466d886229ff.jpg', 87, 'ii'),
('space ', 'space@gmail.com', 'annaba ', '0741258300', '123456789', 'délégué_médical', '6456d985904ee.png', 90, ''),
('inpha', 'inpha@gmail.com', 'el tarf', '0123456789', '123456789', 'délégué_médical', 'Default.png', 95, ''),
('Invest Medic', 'InvestMedic@gmail.com', 'skikda', '03214566878', 'InvestMedic@gmail.com', 'délégué_médical', '6472d38654e7c.png', 114, ''),
('AlaQa Technology SARL', 'AlaQa@gmail.com', 'oran', '12349856', '123456789', 'délégué_médical', '6472d684872a5.png', 115, ''),
('ALPHAREP', 'ALPHAREP@gmail.com', 'blida', '078459612', 'ALPHAREP@gmail.com', 'délégué_médical', '6472d7ff48426.jpg', 116, ''),
('Danone Djurdjura', 'DanoneDjurdjura@gmail.com', 'annaba', '0142536987', 'DanoneDjurdjura@gmail.com', 'délégué_médical', '6472d921c785d.png', 117, ''),
('non', 'non@gmail.com', 'jl', '5', 'non@gmail.com', 'délégué_médical', 'Default.png', 118, '');

-- --------------------------------------------------------

--
-- Structure de la table `effact_secondaire`
--

CREATE TABLE `effact_secondaire` (
  `id` int(255) NOT NULL,
  `effact` varchar(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `id_medecin` int(255) NOT NULL,
  `ordonnance` varchar(255) NOT NULL,
  `conseils` varchar(255) NOT NULL,
  `date_ordonnance` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `effact_secondaire`
--

INSERT INTO `effact_secondaire` (`id`, `effact`, `id_patient`, `id_medecin`, `ordonnance`, `conseils`, `date_ordonnance`) VALUES
(15, 'do you now', 81, 84, '6460576460c9c.pdf', 'yes', '2023-05-14 05:37:08.000000'),
(16, 'vv', 81, 84, '64622b51cf345.pdf', 'jkjgj', '2023-05-15 14:53:37.000000'),
(17, 'j\'ai mal au gorge', 81, 84, '64747d64ec90c.pdf', '', '2023-05-29 12:24:36.000000'),
(18, 'hh', 81, 84, '6476f5a45a352.pdf', 'la la', '2023-05-31 09:22:12.000000'),
(19, 'gg', 81, 84, '6476f6698d65c.pdf', 'hh', '2023-05-31 09:25:29.000000'),
(20, 'kk', 81, 84, '6476f800c477d.pdf', ';dik', '2023-05-31 09:32:16.000000');

-- --------------------------------------------------------

--
-- Structure de la table `folllowing`
--

CREATE TABLE `folllowing` (
  `id_follow` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `date_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `folllowing`
--

INSERT INTO `folllowing` (`id_follow`, `sender_id`, `receiver_id`, `date_time`) VALUES
(85, 88, 84, '2023-05-04 02:00:00.000000'),
(86, 92, 84, '2023-05-08 02:42:00.000000'),
(87, 92, 85, '2023-05-08 02:49:00.000000'),
(88, 93, 84, '2023-05-13 05:17:00.000000'),
(91, 81, 85, '2023-05-17 02:29:00.000000'),
(94, 81, 91, '2023-05-19 02:55:00.000000'),
(97, 87, 85, '2023-05-20 03:37:00.000000'),
(98, 87, 91, '2023-05-20 03:50:00.000000'),
(101, 87, 84, '2023-05-20 04:43:00.000000'),
(102, 90, 84, '2023-05-20 05:22:00.000000'),
(103, 81, 84, '2023-05-20 05:42:00.000000'),
(104, 81, 96, '2023-05-27 02:53:00.000000'),
(105, 88, 96, '2023-05-27 11:54:00.000000'),
(106, 97, 112, '2023-05-28 05:01:00.000000'),
(107, 97, 96, '2023-05-28 05:01:00.000000'),
(108, 97, 111, '2023-05-28 05:01:00.000000'),
(109, 97, 108, '2023-05-28 05:01:00.000000'),
(110, 97, 85, '2023-05-28 05:01:00.000000'),
(111, 98, 107, '2023-05-28 05:04:00.000000'),
(112, 98, 96, '2023-05-28 05:04:00.000000'),
(113, 98, 85, '2023-05-28 05:04:00.000000'),
(114, 98, 109, '2023-05-28 05:04:00.000000'),
(115, 98, 112, '2023-05-28 05:05:00.000000'),
(116, 99, 91, '2023-05-28 05:08:00.000000'),
(117, 99, 85, '2023-05-28 05:08:00.000000'),
(118, 99, 84, '2023-05-28 05:08:00.000000'),
(119, 99, 96, '2023-05-28 05:08:00.000000'),
(120, 100, 84, '2023-05-28 05:10:00.000000'),
(121, 100, 107, '2023-05-28 05:10:00.000000'),
(122, 100, 110, '2023-05-28 05:10:00.000000'),
(123, 101, 108, '2023-05-28 05:12:00.000000'),
(124, 101, 85, '2023-05-28 05:12:00.000000'),
(125, 101, 113, '2023-05-28 05:12:00.000000'),
(126, 102, 84, '2023-05-28 05:14:00.000000'),
(127, 102, 85, '2023-05-28 05:14:00.000000'),
(128, 102, 91, '2023-05-28 05:14:00.000000'),
(129, 103, 85, '2023-05-28 05:15:00.000000'),
(130, 104, 85, '2023-05-28 05:51:00.000000'),
(131, 104, 109, '2023-05-28 05:51:00.000000'),
(132, 104, 107, '2023-05-28 05:51:00.000000'),
(133, 105, 84, '2023-05-28 05:52:00.000000'),
(134, 105, 85, '2023-05-28 05:53:00.000000'),
(135, 106, 91, '2023-05-28 05:53:00.000000'),
(136, 106, 109, '2023-05-28 05:53:00.000000'),
(137, 117, 84, '2023-05-28 06:37:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `id` int(255) NOT NULL,
  `name_m` varchar(255) NOT NULL,
  `usage_medicament` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `id_deg` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id`, `name_m`, `usage_medicament`, `prix`, `pdf`, `id_deg`) VALUES
(5, 'asperine', 'google trducation', 250, '64566df268890.pdf', 89),
(7, 'myorelex', 'traite les spasemes', 150, '6456e27ddd230.pdf', 90),
(9, 'ropade', 'peau', 1234, '6458e9ab10535.pdf', 87),
(10, 'jkdnld', 'aeae', 2555, '64597ea76645b.pdf', 87),
(11, 'yu', 'kd', 10, '6472599054404.pdf', 87),
(12, 'Paracétamol', 'Analgésique et antipyrétique (réduit la douleur et la fièvre).', 139, '6472d4003a997.pdf', 114),
(13, 'Amoxicilline', 'Antibiotique utilisé pour traiter les infections bactériennes', 120, '6472d4399b9bb.pdf', 114),
(14, 'Atorvastatine', 'Statine utilisée pour réduire le taux de cholestérol', 150, '6472d5cbebb8e.pdf', 114),
(15, 'Lorazépam', 'Benzodiazépine utilisée comme anxiolytique et sédatif.', 142, '6472d5e16aa35.pdf', 114),
(16, 'Sertraline', 'Antidépresseur de la classe des inhibiteurs sélectifs de la recapture de la sérotonine (ISRS)', 100, '6472d5ffab416.pdf', 114),
(17, 'Metformine', ' Médicament antidiabétique utilisé pour traiter le diabète de type 2.', 170, '6472d6ab30c1f.pdf', 115),
(18, 'Levothyroxine', 'Hormone thyroïdienne utilisée pour traiter l hypothyroïdie', 123, '6472d6f7e231f.pdf', 115),
(19, 'Furosémide', 'Diurétique utilisé pour traiter l hypertension et l insuffisance cardiaque congestive', 550, '6472d7529e186.pdf', 115),
(20, 'Insuline', ' Hormone utilisée pour traiter le diabète en régulant le taux de sucre dans le sang.', 240, '6472d76acb28a.pdf', 115),
(21, 'Warfarine', 'Anticoagulant utilisé pour prévenir la formation de caillots sanguins.', 142, '6472d826265db.pdf', 116),
(22, 'Metoprolol', 'Bêta-bloquant utilisé pour traiter l hypertension et les maladies cardiaques', 550, '6472d83fc3bc7.pdf', 116),
(23, 'Pantoprazole', 'Inhibiteur de la pompe à protons utilisé pour réduire la production d acide', 440, '6472d87e42acc.pdf', 116),
(24, 'Citalopram', 'Antidépresseur de la classe des inhibiteurs sélectifs de la recapture de la sérotonine (ISRS).', 120, '6472d89529aea.pdf', 116),
(25, 'Amlodipine', ' Bloqueur des canaux calciques utilisé pour traiter lhypertension et les maladies cardiaques.', 560, '6472d8ad2a88c.pdf', 116),
(26, 'Prednisone', 'Corticostéroïde utilisé pour réduire l inflammation et supprimer le système immunitaire.', 555, '6472d94a63ddb.pdf', 117),
(27, 'Fluoxétine', 'Antidépresseur de la classe des inhibiteurs sélectifs de la recapture de la sérotonine (ISRS)', 741, '6472d960dc7fa.pdf', 117),
(28, 'Losartan', 'Antagoniste du récepteur de l angiotensine II utilisé pour traiter l hypertension', 440, '6472d97d13c7c.pdf', 117),
(29, 'Tramadol', 'Analgésique opioïde utilisé pour traiter la douleur modérée à sévère', 200, '6472d99620ce2.pdf', 117),
(30, 'Ciprofloxacine', 'Antibiotique de la classe des fluoroquinolones utilisé pour traiter les infections bactériennes', 123, '6472d9a790afb.pdf', 117),
(31, 'Simvastatine', 'Statine utilisée pour réduire le taux de cholestérol', 130, '6472d9bc709bc.pdf', 117),
(32, 'Montélukast', 'Antagoniste des récepteurs des leucotriènes utilisé pour traiter l asthme.', 156, '6472d9d41bfbf.pdf', 117);

-- --------------------------------------------------------

--
-- Structure de la table `médecin`
--

CREATE TABLE `médecin` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_de_domicile` varchar(255) NOT NULL,
  `numéro_de_téléphone` varchar(255) NOT NULL,
  `annes_dexperience` int(255) NOT NULL,
  `spécialite` varchar(255) NOT NULL,
  `numéro_dénregistrement` varchar(255) NOT NULL,
  `nom_de_létablissement_de_formation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `id_pers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `médecin`
--

INSERT INTO `médecin` (`name`, `email`, `ville`, `adresse_de_domicile`, `numéro_de_téléphone`, `annes_dexperience`, `spécialite`, `numéro_dénregistrement`, `nom_de_létablissement_de_formation`, `password`, `user_type`, `photo_profile`, `bio`, `id_pers`) VALUES
('Mohamed aa', 'mohamed@gmail.com', 'annaba', 'Rue 22 Colonel Amirouche N°5 Cheikh Tahar à coté de la clinique ORL(les orangers), 2300 Annaba ', '0645879500', 10, 'Dentistee', '36015487', 'Badji Mokhtar Annaba 23', '123456789', 'médecin', '64773b8f60ae6.jpg', 'un médecin spécialiste du diabéte', 84),
('Aspida', 'Aspida@gmail.com', '', 'annaba', '012', 5, 'dd', '1234', 'mm', '123456789', 'médecin', '642d150f41717.jpg', 'goooooog', 85),
('nouaim', 'nouaim@gmail.com', 'annaba', 'city safsaf', '142536741', 7, 'cardiologue', '1725', 'eri', '123456789', 'médecin', 'Default.png', 'hhkd jdkjsdy hdgf jhsq etd djazi hzaepoj', 91),
('meriem', 'meriem@gmail.com', 'annaba', 'place 12', '0741256389', 3, 'daibéte', '77889', 'oneTwo', '123456789', 'médecin', '647082062a7f0.jpg', 'we go again', 96),
('Mohamed Salah', 'MohamedSalah@gmail.com', 'Oran', 'Les Planteurs', '+123456789', 5, 'Pédiatrie', '42065', 'badji mokhtar', 'MohamedSalah@gmail.com', 'médecin', '6472d13eb6757.jpg', 'Le Dr Sophie Martin est un médecin passionné par la santé des enfants. Elle a obtenu son diplôme de médecine à l\'Université fictive de Médecine. Son intérêt particulier réside dans le domaine de la pédiatrie et elle a travaillé dans plusieurs hôpitaux ren', 107),
('David younes', 'Davidyounes@gmail.com', 'Ville fictive', 'Rue des Enfants, 123', '6454564', 9, 'Pédiatrie', '125478', 'Centre Médical des Enfants', 'Davidyounes@gmail.com', 'médecin', '6472d1767cd9f.jpg', 'Passionnée par les soins pédiatriques. Diplômée de l\'Université fictive de Médecine. Dévouée à offrir des soins de qualité aux enfants.', 108),
('Thomas Garcia', 'thomasgarcia@gmail.com', 'annaba', 'Place de la Santé, 789', '246813579', 7, 'Médecine générale', '', 'Clinique Santé Plus', 'thomasgarcia@gmail.com', 'médecin', '6472d1b16614c.jpg', '', 109),
('hamza bensassi', 'bensassi@gmail.com', 'skikda', 'Rue de la mina, 987', '45678515', 1, 'Gynécologie', '142566', 'gynécologues s70', '142536142536', 'médecin', '6472d1da9af89.jpg', 'spécialisent dans les problèmes de santé des femmes', 110),
('sofyan dridech', 'sofyan@gmail.com', 'blida', 'rue 25 mars', '45698523617', 8, 'Chirurgie', '214587', 'harvard', '123456789', 'médecin', '6472d207a91a0.jpg', ' spécialisés dans l\'opération et l\'intervention chirurgicale pour traiter une variété de conditions', 111),
('abde nour', 'abdo@gmail.com', 'adrar', 'Rue Abdelkader Cheick', '142365897', 3, 'Neurologie', '123654', 'neurologues x', '123456789', 'médecin', '6472d235d49d2.jpg', 'diagnostiquent et traitent les troubles du système nerveux central et périphérique,', 112),
('morad badi', 'morad@gmail.com', 'skikda', 'Rue de la Palestine', '0784596320', 5, 'généralistes', '15985', 'skikda univ', '123456789', 'médecin', '6472d25be5cc1.jpg', 'fournissent des soins de santé primaires aux patients de tous âges et traitent une large gamme de problèmes médicaux courants.', 113);

-- --------------------------------------------------------

--
-- Structure de la table `notification_médecin`
--

CREATE TABLE `notification_médecin` (
  `id` int(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `id_médecin` int(255) NOT NULL,
  `not_type` varchar(255) NOT NULL,
  `not_date` datetime(6) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification_médecin`
--

INSERT INTO `notification_médecin` (`id`, `id_patient`, `id_médecin`, `not_type`, `not_date`, `user_type`) VALUES
(59, 81, 84, 'follow', '2023-05-20 04:38:00.000000', 'patient'),
(60, 81, 84, 'rendez_vous', '2023-05-20 04:38:00.000000', 'patient'),
(61, 87, 85, 'medicamenet', '2023-05-20 04:40:00.000000', 'délégué_médical'),
(62, 87, 91, 'medicamenet', '2023-05-20 04:40:00.000000', 'délégué_médical'),
(63, 87, 84, 'medicamenet', '2023-05-20 04:40:00.000000', 'délégué_médical'),
(64, 87, 84, 'follow', '2023-05-20 04:43:00.000000', 'délégué_médical'),
(65, 87, 84, 'medicamenet', '2023-05-20 05:21:00.000000', 'délégué_médical'),
(66, 90, 84, 'follow', '2023-05-20 05:22:00.000000', 'délégué_médical'),
(67, 90, 84, 'medicamenet', '2023-05-20 05:22:00.000000', 'délégué_médical'),
(68, 81, 84, 'follow', '2023-05-20 05:42:00.000000', 'patient'),
(69, 81, 84, 'rendez_vous', '2023-05-20 05:42:00.000000', 'patient'),
(70, 87, 85, 'medicamenet', '2023-05-22 01:20:00.000000', 'délégué_médical'),
(71, 87, 84, 'medicamenet', '2023-05-22 01:20:00.000000', 'délégué_médical'),
(72, 81, 96, 'follow', '2023-05-27 02:53:00.000000', 'patient'),
(73, 81, 96, 'rendez_vous', '2023-05-27 02:53:00.000000', 'patient'),
(74, 88, 96, 'follow', '2023-05-27 11:54:00.000000', 'patient'),
(75, 88, 96, 'rendez_vous', '2023-05-27 11:54:00.000000', 'patient'),
(76, 97, 112, 'follow', '2023-05-28 05:01:00.000000', 'patient'),
(77, 97, 96, 'follow', '2023-05-28 05:01:00.000000', 'patient'),
(78, 97, 111, 'follow', '2023-05-28 05:01:00.000000', 'patient'),
(79, 97, 108, 'follow', '2023-05-28 05:01:00.000000', 'patient'),
(80, 97, 85, 'follow', '2023-05-28 05:01:00.000000', 'patient'),
(81, 98, 107, 'follow', '2023-05-28 05:04:00.000000', 'patient'),
(82, 98, 96, 'follow', '2023-05-28 05:04:00.000000', 'patient'),
(83, 98, 85, 'follow', '2023-05-28 05:04:00.000000', 'patient'),
(84, 98, 109, 'follow', '2023-05-28 05:04:00.000000', 'patient'),
(85, 98, 112, 'follow', '2023-05-28 05:05:00.000000', 'patient'),
(86, 99, 91, 'follow', '2023-05-28 05:08:00.000000', 'patient'),
(87, 99, 85, 'follow', '2023-05-28 05:08:00.000000', 'patient'),
(88, 99, 84, 'follow', '2023-05-28 05:08:00.000000', 'patient'),
(89, 99, 96, 'follow', '2023-05-28 05:08:00.000000', 'patient'),
(90, 100, 84, 'follow', '2023-05-28 05:10:00.000000', 'patient'),
(91, 100, 107, 'follow', '2023-05-28 05:10:00.000000', 'patient'),
(92, 100, 110, 'follow', '2023-05-28 05:10:00.000000', 'patient'),
(93, 101, 108, 'follow', '2023-05-28 05:12:00.000000', 'patient'),
(94, 101, 85, 'follow', '2023-05-28 05:12:00.000000', 'patient'),
(95, 101, 113, 'follow', '2023-05-28 05:12:00.000000', 'patient'),
(96, 102, 84, 'follow', '2023-05-28 05:14:00.000000', 'patient'),
(97, 102, 85, 'follow', '2023-05-28 05:14:00.000000', 'patient'),
(98, 102, 91, 'follow', '2023-05-28 05:14:00.000000', 'patient'),
(99, 103, 85, 'follow', '2023-05-28 05:15:00.000000', 'patient'),
(100, 104, 85, 'follow', '2023-05-28 05:51:00.000000', 'patient'),
(101, 104, 109, 'follow', '2023-05-28 05:51:00.000000', 'patient'),
(102, 104, 107, 'follow', '2023-05-28 05:51:00.000000', 'patient'),
(103, 105, 84, 'follow', '2023-05-28 05:52:00.000000', 'patient'),
(104, 105, 85, 'follow', '2023-05-28 05:53:00.000000', 'patient'),
(105, 106, 91, 'follow', '2023-05-28 05:53:00.000000', 'patient'),
(106, 106, 109, 'follow', '2023-05-28 05:53:00.000000', 'patient'),
(107, 117, 84, 'follow', '2023-05-28 06:37:00.000000', 'délégué_médical'),
(108, 117, 84, 'medicamenet', '2023-05-28 06:37:00.000000', 'délégué_médical'),
(109, 81, 84, 'effet', '2023-05-31 09:14:00.000000', 'patient'),
(110, 81, 84, 'effet', '2023-05-31 09:24:00.000000', 'patient'),
(111, 81, 84, 'effet', '2023-05-31 09:31:00.000000', 'patient'),
(112, 81, 84, 'rendez_vous', '2023-05-31 00:00:00.000000', 'patient');

-- --------------------------------------------------------

--
-- Structure de la table `notification_patient`
--

CREATE TABLE `notification_patient` (
  `id` int(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `id_médecin` int(255) NOT NULL,
  `not_type` varchar(255) NOT NULL,
  `not_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification_patient`
--

INSERT INTO `notification_patient` (`id`, `id_patient`, `id_médecin`, `not_type`, `not_date`) VALUES
(15, 81, 84, 'rendez_vous', '2023-05-06 02:05:00.000000'),
(16, 81, 84, 'rendez_vous', '2023-05-06 02:06:00.000000'),
(17, 81, 84, 'suive', '2023-05-06 02:16:00.000000'),
(18, 88, 84, 'rendez_vous', '2023-05-06 02:37:00.000000'),
(19, 88, 84, 'suive', '2023-05-06 02:37:00.000000'),
(20, 88, 84, 'suive', '2023-05-06 02:38:00.000000'),
(21, 88, 84, 'rendez_vous', '2023-05-06 09:24:00.000000'),
(22, 81, 84, 'rendez_vous', '2023-05-06 07:54:00.000000'),
(23, 88, 85, 'rendez_vous', '2023-05-07 01:40:00.000000'),
(24, 92, 84, 'suive', '2023-05-08 02:36:00.000000'),
(25, 81, 84, 'rendez_vous', '2023-05-08 11:30:00.000000'),
(26, 92, 84, 'rendez_vous', '2023-05-08 11:31:00.000000'),
(27, 81, 84, 'rendez_vous', '2023-05-15 01:41:00.000000'),
(28, 81, 84, 'suive', '2023-05-15 02:58:00.000000'),
(29, 81, 91, 'suive', '2023-05-19 02:29:00.000000'),
(30, 81, 91, 'suive', '2023-05-19 02:29:00.000000'),
(31, 81, 91, 'suive', '2023-05-19 02:31:00.000000'),
(32, 81, 91, 'suive', '2023-05-19 02:33:00.000000'),
(33, 81, 91, 'suive', '2023-05-19 02:33:00.000000'),
(34, 81, 84, 'suive', '2023-05-19 03:20:00.000000'),
(35, 81, 84, 'rendez_vous', '2023-05-20 05:26:00.000000'),
(36, 81, 84, 'rendez_vous', '2023-05-20 05:42:00.000000'),
(37, 81, 84, 'suive', '2023-05-20 05:42:00.000000'),
(38, 88, 84, 'suive', '2023-05-27 03:50:00.000000'),
(39, 81, 96, 'rendez_vous', '2023-05-27 11:53:00.000000'),
(40, 81, 84, 'suive', '2023-05-28 06:59:00.000000'),
(41, 88, 84, 'suive', '2023-05-28 07:23:00.000000'),
(42, 81, 84, 'suive', '2023-05-28 07:46:00.000000'),
(44, 88, 84, 'suive', '2023-05-28 07:47:00.000000'),
(45, 88, 84, 'suive', '2023-05-28 07:57:00.000000'),
(46, 81, 91, 'rendez_vous', '2023-05-28 08:19:00.000000'),
(47, 81, 84, 'suive', '2023-05-29 12:28:00.000000'),
(48, 88, 84, 'suive', '2023-05-29 12:29:00.000000'),
(49, 92, 84, 'suive', '2023-05-29 12:29:00.000000'),
(50, 81, 84, 'suive', '2023-05-29 06:42:00.000000'),
(51, 98, 84, 'suive', '2023-05-31 09:14:00.000000'),
(52, 98, 84, 'suive', '2023-05-31 09:19:54.000000'),
(53, 98, 84, 'suive', '2023-05-31 09:20:18.000000'),
(54, 98, 84, 'suive', '2023-05-31 09:20:30.000000'),
(55, 97, 84, 'suive', '2023-05-31 09:22:51.000000'),
(65, 102, 84, 'suive', '2023-05-31 09:41:43.000000'),
(121, 97, 84, 'suive', '2023-05-31 10:03:47.000000'),
(127, 81, 84, 'suive', '2023-05-31 09:14:46.000000');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `id_pers` int(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`name`, `email`, `password`, `user_type`, `photo_profile`, `id_pers`, `bio`, `ville`, `date_naissance`) VALUES
('raouf abii', 'raoufabi@gmail.com', '11223344', 'patient', '6456d5d9ed963.png', 81, 'kk', 'annaba', '2000-06-25'),
('karim', 'kb9@gmail.com', '123456789', 'patient', 'Default.png', 88, 'google', '', '0000-00-00'),
('haiahem', 'haiahem.rahim@gmail.com', 'annaba23', 'patient', '6458ebdc69ab9.jpg', 92, '', '', '0000-00-00'),
('man city', 'mancity@gmail.com', '123456789', 'patient', 'Default.png', 93, '9 haaland', 'oran', '2012-12-12'),
('yassin', 'yassin@gmail.com', '123456789', 'patient', 'Default.png', 94, 'accun', 'annaba', '1999-01-12'),
('Dupont', 'dupont@example.com', '123456789', 'patient', '6472c3eaa59a8.jpg', 97, 'Patient régulier, suivi pour des problèmes cardiaques', 'Paris', '1990-01-01'),
('Martin', 'martin@example.com', '123456789', 'patient', '6472c4a82d541.jpg', 98, 'Nouveau patient, souffrant de douleurs chroniques au dos.', 'Lyon', '1985-05-15'),
('Dumont', 'dumont@example.com', '123456789', 'patient', '6472c5a8b9260.jpg', 99, 'Patient en rémission d\'un cancer, nécessitant un suivi régulier', 'Marseille', '1992-11-20'),
('Lefebvre', 'lefebvre@example.com', '123456789', 'patient', '6472c6184ad5c.jpg', 100, 'Passionné de cuisine et de pâtisserie', 'Lille', '1988-07-10'),
('Dubois', 'Dubois@gmail.com', '741852963', 'patient', '6472c689b5428.jpg', 101, '\"Amateur de lecture et de randonnée.', 'Bordeaux', '1995-03-05'),
('Moreau', 'Moreau@gmail.com', 'Moreau@gmail.com', 'patient', '6472c7134f6d9.jpg', 102, 'Fan de cinéma et de jeux vidéo', 'Toulouse', '1982-12-12'),
('Roux', 'Roux@gmail.com', 'Roux@gmail.com', 'patient', '6472c74e3bd11.jpg', 103, 'Fan de football et de musique rock', 'Strasbourg', '1987-04-18'),
('Leroy', 'Leroy@gmail.com', 'Leroy@gmail.com', 'patient', '6472cf9f53116.jpg', 104, 'Amoureux de la nature et adepte du jardinage', 'nice', '1994-12-07'),
('Sanchez', 'sanchez@gmail.com', 'sanchez@gmail.com', 'patient', '6472d009a304b.jpg', 105, 'Passionné de danse et de salsa', 'Montpellier', '1999-02-03'),
('Perrin', 'Perrin@gmail.com', 'Perrin@gmail.com', 'patient', '6472d03edb187.jpg', 106, 'Amateur de jeux de société', 'el tarf', '2000-10-20');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(81, 'raouf abii', 'raoufabi@gmail.com', '11223344', 'patient'),
(84, 'Mohamed aa', 'mohamed@gmail.com', '123456789', 'médecin'),
(85, 'Aspida', 'Aspida@gmail.com', '123456789', 'médecin'),
(87, 'biocare', 'biocare@gmail.com', '', 'délégué_médical'),
(88, 'karim', 'kb9@gmail.com', '123456789', 'patient'),
(90, 'space ', 'space@gmail.com', '123456789', 'délégué_médical'),
(91, 'nouaim', 'nouaim@gmail.com', '123456789', 'médecin'),
(92, 'haiahem', 'haiahem.rahim@gmail.com', 'annaba23', 'patient'),
(93, 'man city', 'mancity@gmail.com', '123456789', 'patient'),
(94, 'yassin', 'yassin@gmail.com', '123456789', 'patient'),
(95, 'inpha', 'inpha@gmail.com', '123456789', 'délégué_médical'),
(96, 'meriem', 'meriem@gmail.com', '123456789', 'médecin'),
(97, 'Dupont', 'dupont@example.com', '123456789', 'patient'),
(98, 'Martin', 'martin@example.com', '123456789', 'patient'),
(99, 'Dumont', 'dumont@example.com', '123456789', 'patient'),
(100, 'Lefebvre', 'lefebvre@example.com', '123456789', 'patient'),
(101, 'Dubois', 'Dubois@gmail.com', '741852963', 'patient'),
(102, 'Moreau', 'Moreau@gmail.com', 'Moreau@gmail.com', 'patient'),
(103, 'Roux', 'Roux@gmail.com', 'Roux@gmail.com', 'patient'),
(104, 'Leroy', 'Leroy@gmail.com', 'Leroy@gmail.com', 'patient'),
(105, 'Sanchez', 'sanchez@gmail.com', 'sanchez@gmail.com', 'patient'),
(106, 'Perrin', 'Perrin@gmail.com', 'Perrin@gmail.com', 'patient'),
(107, 'Mohamed Salah', 'MohamedSalah@gmail.com', 'MohamedSalah@gmail.com', 'médecin'),
(108, 'David younes', 'Davidyounes@gmail.com', 'Davidyounes@gmail.com', 'médecin'),
(109, 'Thomas Garcia', 'thomasgarcia@gmail.com', 'thomasgarcia@gmail.com', 'médecin'),
(110, 'hamza bensassi', 'bensassi@gmail.com', '142536142536', 'médecin'),
(111, 'sofyan dridech', 'sofyan@gmail.com', '123456789', 'médecin'),
(112, 'abde nour', 'abdo@gmail.com', '123456789', 'médecin'),
(113, 'morad badi', 'morad@gmail.com', '123456789', 'médecin'),
(114, 'Invest Medic', 'InvestMedic@gmail.com', 'InvestMedic@gmail.com', 'délégué_médical'),
(115, 'AlaQa Technology SARL', 'AlaQa@gmail.com', '123456789', 'délégué_médical'),
(116, 'ALPHAREP', 'ALPHAREP@gmail.com', 'ALPHAREP@gmail.com', 'délégué_médical'),
(117, 'Danone Djurdjura', 'DanoneDjurdjura@gmail.com', 'DanoneDjurdjura@gmail.com', 'délégué_médical'),
(118, 'non', 'non@gmail.com', 'non@gmail.com', 'délégué_médical');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_post` int(255) NOT NULL,
  `date_post` date NOT NULL,
  `statu` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_pers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `date_post`, `statu`, `photo`, `id_pers`) VALUES
(11, '2023-03-26', 'karim benzima 9 player of real madrid ', '64208321bfdc6.jpg', 81),
(12, '2023-03-27', '', '6420f33b7757e.png', 81),
(13, '2023-03-27', '', '6420f3897bb1d.jpg', 81),
(14, '2023-03-27', '1 ere publication ❤️', '6420ff15341e4.jpg', 84),
(15, '2023-03-27', 'je suis un dentiste', '6420ff8d21de9.jpg', 84),
(16, '2023-03-28', 'test date publication', '64226f724e588.png', 84),
(17, '2023-04-06', '', '642e69358eaf6.jpg', 85),
(18, '2023-04-19', 'kjhggyfctgkilh', '643fb79edc35c.png', 84),
(19, '2023-04-19', 'jfl', '643fc359d1917.png', 84),
(20, '2023-04-19', '', '643fcddcde14a.png', 84);

-- --------------------------------------------------------

--
-- Structure de la table `propose_medicament`
--

CREATE TABLE `propose_medicament` (
  `id` int(255) NOT NULL,
  `id_medecin` int(255) NOT NULL,
  `id_delegue` int(255) NOT NULL,
  `id_medicament` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `propose_medicament`
--

INSERT INTO `propose_medicament` (`id`, `id_medecin`, `id_delegue`, `id_medicament`) VALUES
(10, 85, 87, 9),
(11, 85, 87, 9),
(12, 84, 87, 9),
(13, 85, 87, 9),
(14, 91, 87, 9),
(15, 85, 87, 9),
(16, 91, 87, 9),
(17, 84, 87, 9),
(18, 84, 87, 10),
(19, 84, 90, 7),
(20, 85, 87, 10),
(21, 84, 87, 10),
(22, 84, 117, 26);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(255) NOT NULL,
  `id_medecin` int(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `date_de_rv` date NOT NULL,
  `time_rv` time NOT NULL,
  `msg_rv` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_demande` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `id_medecin`, `id_patient`, `date_de_rv`, `time_rv`, `msg_rv`, `status`, `date_demande`) VALUES
(36, 84, 81, '0202-06-25', '13:30:00', 'googlr', 'confirm', '2023-05-06 02:05:00.000000'),
(37, 84, 81, '1515-12-15', '04:04:00', 'hh', 'confirm', '2023-05-06 02:06:00.000000'),
(38, 84, 88, '1022-10-10', '11:11:00', '', 'confirm', '2023-05-06 02:36:00.000000'),
(39, 84, 88, '2019-10-20', '23:06:00', 'hello', 'confirm', '2023-05-06 09:24:00.000000'),
(40, 84, 81, '2024-01-15', '15:01:00', 'ok', 'confirm', '2023-05-06 07:53:00.000000'),
(41, 85, 88, '0522-02-14', '15:30:00', '', 'confirm', '2023-05-07 01:39:00.000000'),
(42, 84, 81, '2222-02-22', '10:00:00', '', 'confirm', '2023-05-08 01:59:00.000000'),
(43, 84, 92, '2023-02-26', '00:00:00', 'jfkl', 'confirm', '2023-05-08 02:48:00.000000'),
(44, 84, 81, '2012-11-10', '23:56:00', 'as goal', 'confirm', '2023-05-15 01:41:00.000000'),
(45, 91, 81, '1111-11-11', '00:00:00', '202', 'confirm', '2023-05-19 02:55:00.000000'),
(46, 84, 81, '1111-11-11', '10:30:00', 'hh', 'confirm', '2023-05-20 04:38:00.000000'),
(47, 84, 81, '6656-11-11', '22:22:00', 'jj', 'confirm', '2023-05-20 05:42:00.000000'),
(48, 96, 81, '2023-06-12', '10:30:00', '', 'confirm', '2023-05-27 02:53:00.000000'),
(49, 96, 88, '2023-05-30', '00:00:00', '', 'en_attent', '2023-05-27 11:54:00.000000'),
(50, 84, 81, '2023-06-25', '00:00:00', '', 'en_attent', '2023-05-31 00:00:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `suive`
--

CREATE TABLE `suive` (
  `id` int(255) NOT NULL,
  `id_medecin` int(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `date_fin_suive` datetime NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `suive`
--

INSERT INTO `suive` (`id`, `id_medecin`, `id_patient`, `date_fin_suive`, `date_time`, `status`) VALUES
(27, 84, 88, '2023-05-31 00:00:00', '2023-05-29 12:29:00.000000', 'fin'),
(34, 84, 98, '2024-03-22 00:00:00', '2023-05-31 09:20:30.000000', 'fin'),
(35, 84, 97, '2023-06-06 00:00:00', '2023-05-31 09:22:51.000000', 'fin'),
(36, 84, 102, '2024-02-12 00:00:00', '2023-05-31 09:41:43.000000', 'fin'),
(37, 84, 97, '2023-06-25 00:00:00', '2023-05-31 10:03:47.000000', 'fin'),
(38, 84, 81, '2024-02-20 00:00:00', '2023-05-31 09:14:46.000000', 'en attend');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `effact_secondaire`
--
ALTER TABLE `effact_secondaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `folllowing`
--
ALTER TABLE `folllowing`
  ADD PRIMARY KEY (`id_follow`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification_médecin`
--
ALTER TABLE `notification_médecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification_patient`
--
ALTER TABLE `notification_patient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD KEY `id_pers` (`id_pers`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `propose_medicament`
--
ALTER TABLE `propose_medicament`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suive`
--
ALTER TABLE `suive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `effact_secondaire`
--
ALTER TABLE `effact_secondaire`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `folllowing`
--
ALTER TABLE `folllowing`
  MODIFY `id_follow` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `notification_médecin`
--
ALTER TABLE `notification_médecin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `notification_patient`
--
ALTER TABLE `notification_patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `propose_medicament`
--
ALTER TABLE `propose_medicament`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `suive`
--
ALTER TABLE `suive`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
