-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 03:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scolarite`
--

-- --------------------------------------------------------

--
-- Table structure for table `annee`
--

CREATE TABLE `annee` (
  `id_annee` int(11) NOT NULL,
  `anne` varchar(15) NOT NULL,
  `created_annee` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annee`
--

INSERT INTO `annee` (`id_annee`, `anne`, `created_annee`) VALUES
(3, '2021-2022', '2023-08-12 17:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `authentification`
--

CREATE TABLE `authentification` (
  `id_athentification` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL,
  `created_att` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentification`
--

INSERT INTO `authentification` (`id_athentification`, `username`, `email`, `password`, `ref_utilisateur`, `created_att`) VALUES
(1, 'joel', 'jt@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '2023-01-12 14:49:26'),
(2, 'danny', 'danny@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2022-12-20 13:51:56'),
(3, 'jered', 'jered@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, '2023-05-05 15:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(20) NOT NULL,
  `created_classe` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `created_classe`) VALUES
(1, '1', '2023-08-12 17:50:11'),
(2, '2', '2023-08-12 17:50:39'),
(3, '3', '2023-08-12 17:51:54'),
(4, '4', '2023-08-15 12:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `dossiers`
--

CREATE TABLE `dossiers` (
  `id_dossier` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `ref_inscription` int(11) NOT NULL,
  `ref_agent` int(11) NOT NULL,
  `created_inscript` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

CREATE TABLE `eleves` (
  `id_eleves` int(11) NOT NULL,
  `nom_complet` varchar(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `lieu_naiss` varchar(50) NOT NULL,
  `date_naiss` varchar(15) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ref_annee` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `ref_option` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `created_eleve` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eleves`
--

INSERT INTO `eleves` (`id_eleves`, `nom_complet`, `sexe`, `lieu_naiss`, `date_naiss`, `responsable`, `contact`, `photo`, `adresse`, `ref_annee`, `ref_classe`, `montant`, `ref_option`, `filename`, `password`, `user_type`, `created_eleve`) VALUES
(4, 'jeremie', 'masculin', 'Goma', '2023-09-27', 'Katoro le fils', '', 'IMG_7279.jpg', 'Goma birere', 3, 2, 5, 1, '', '', 'user', '2023-10-15 13:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

CREATE TABLE `fonction` (
  `id_fonction` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `designation`) VALUES
(1, 'admin'),
(2, 'utilisateur'),
(3, 'entreprise');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `ref_eleve` int(11) NOT NULL,
  `ref_annee` int(11) NOT NULL,
  `ref_option` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `created_inscri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `nom_option` varchar(20) NOT NULL,
  `created_option` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id_option`, `nom_option`, `created_option`) VALUES
(1, 'Commerciale', '2023-08-14 21:35:15'),
(2, 'Biochimie', '2023-08-15 12:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `payement`
--

CREATE TABLE `payement` (
  `id_p` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `created_p` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payement`
--

INSERT INTO `payement` (`id_p`, `id_classe`, `montant`, `created_p`) VALUES
(1, 1, 5, '2023-08-16 22:43:18'),
(2, 2, 10, '2023-10-13 12:31:58'),
(3, 3, 10, '2023-10-14 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_complet` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'default_user.jpg',
  `date_naiss` varchar(15) NOT NULL,
  `ref_fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`id_utilisateur`, `nom_complet`, `photo`, `date_naiss`, `ref_fonction`) VALUES
(1, 'joel jt', 'default_user.jpg', '', 1),
(2, 'danny katoro', 'default_user.jpg', '', 2),
(3, 'jered', 'default_user.jpg', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id_annee`);

--
-- Indexes for table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id_athentification`),
  ADD KEY `fk_util` (`ref_utilisateur`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id_dossier`),
  ADD KEY `fk_docs` (`ref_agent`),
  ADD KEY `fk_eleves` (`ref_inscription`);

--
-- Indexes for table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id_eleves`);

--
-- Indexes for table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id_fonction`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `fk_eleve` (`ref_annee`),
  ADD KEY `fk_annee` (`ref_eleve`),
  ADD KEY `fk_classe` (`ref_classe`),
  ADD KEY `fk_option` (`ref_option`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_option`);

--
-- Indexes for table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_p` (`id_classe`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `fk_agent` (`ref_fonction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annee`
--
ALTER TABLE `annee`
  MODIFY `id_annee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id_athentification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id_dossier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id_eleves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payement`
--
ALTER TABLE `payement`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `fk_util` FOREIGN KEY (`ref_utilisateur`) REFERENCES `tbl_agent` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `fk_docs` FOREIGN KEY (`ref_agent`) REFERENCES `tbl_agent` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eleves` FOREIGN KEY (`ref_inscription`) REFERENCES `eleves` (`id_eleves`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_annee` FOREIGN KEY (`ref_eleve`) REFERENCES `eleves` (`id_eleves`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eleve` FOREIGN KEY (`ref_annee`) REFERENCES `annee` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_option` FOREIGN KEY (`ref_option`) REFERENCES `options` (`id_option`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD CONSTRAINT `fk_agent` FOREIGN KEY (`ref_fonction`) REFERENCES `fonction` (`id_fonction`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
