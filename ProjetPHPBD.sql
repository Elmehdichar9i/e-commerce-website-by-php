-- Create the database
CREATE DATABASE IF NOT EXISTS ProjetPHPBD DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ProjetPHPBD;

-- Table: utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('administrateur','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data into utilisateur table
INSERT INTO `utilisateur` (`login`, `password`, `type`) VALUES
('admin', 'admin', 'administrateur'),
('fadil', '1111', 'user'),
('teste', 'teste', 'user'),
('user', 'user', 'user'),
('user05', 'e000', 'user');

-- Table: produit
CREATE TABLE IF NOT EXISTS `produit` (
  `RefPdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libPdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Qte` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`RefPdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data into produit table
INSERT INTO `produit` (`RefPdt`, `libPdt`, `Prix`, `Qte`, `description`, `image`, `type`) VALUES
('P0003', 'SMART PHONE', 5780.00, 10, 'SMART PHONE', 'iphone.jpg', 'Electronique'),
('P001', 'Smart TV', 4500.00, 5, 'Smart tv marque SONY', 'photos/tvsmart.jpg', 'Electronique'),
('P002', 'Smart TV', 5000.00, 3, 'Smart tv marque lg', 'photos/tvsmartlg.jpg', 'Electronique');