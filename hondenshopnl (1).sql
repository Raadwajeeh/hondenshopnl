-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hondenshopnl`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Premium Hondenvoer Adult Kip', 'Volledig droogvoer voor volwassen honden, rijk aan kip en granen.', 24.99, 'voer/hond_voer1.jpg', 'voer'),
(2, 'Sensitive Hondenvoer Lam', 'Droogvoer met lam en rijst, geschikt voor gevoelige magen.', 27.49, 'voer/hond_voer2.jpg', 'voer'),
(3, 'Puppy Hondenvoer Mini', 'Speciaal voer voor kleine puppy\'s met extra calcium.', 19.95, 'voer/hond_voer3.jpg', 'voer'),
(4, 'Senior Hondenvoer 8+', 'Evenwichtig voer voor oudere honden, ondersteunt gewrichten.', 29.90, 'voer/hond_voer4.jpg', 'voer'),
(5, 'Grainfree Hondenvoer Zalm', 'Graanvrij voer met zalm en aardappel, ideaal bij allergieën.', 32.50, 'voer/hond_voer5.jpg', 'voer'),
(6, 'Kauwsticks Rund', 'Smakelijke kauwsticks van runderhuid, geschikt als beloning.', 4.99, 'snacks/snack1.jpg', 'snacks'),
(7, 'Trainers Kipblokjes', 'Zachte kleine snackblokjes van kip, ideaal voor training.', 3.49, 'snacks/snack2.jpg', 'snacks'),
(8, 'Dental Chews Medium', 'Snacks die helpen tandplak te verminderen bij middelgrote honden.', 6.95, 'snacks/snack3.jpg', 'snacks'),
(9, 'Gedroogde Runderlong', 'Natuurlijke, luchtige snack, makkelijk te kauwen.', 5.25, 'snacks/snack4.jpg', 'snacks'),
(10, 'Mini Botjes Mix', 'Kleine gekleurde botjes met verschillende smaken.', 3.99, 'snacks/snack5.jpg', 'snacks'),
(11, 'Sterk Touwspeelgoed Large', 'Stevig touw voor trek- en werpspelletjes met grote honden.', 9.99, 'speelgoed/speelgoed1.jpg', 'speelgoed'),
(12, 'Rubberen Bal met Pieper', 'Elastische bal met piepgeluid, stimuleert speelgedrag.', 7.50, 'speelgoed/speelgoed2.jpg', 'speelgoed'),
(13, 'Pluche Knuffel Hond', 'Zachte knuffel met pieper, geschikt voor rustige spelletjes.', 8.25, 'speelgoed/speelgoed3.jpg', 'speelgoed'),
(14, 'Intelligentiespel Voerplateau', 'Puzzelbord waarin de hond brokjes moet zoeken.', 19.99, 'speelgoed/speelgoed4.jpg', 'speelgoed'),
(15, 'Frisbee Lichtgewicht', 'Kunststof frisbee, veilig voor tanden en makkelijk te vangen.', 6.75, 'speelgoed/speelgoed5.jpg', 'speelgoed'),
(16, 'Comfort Hondenbed Medium', 'Zacht ovaal hondenbed met afneembare hoes.', 39.99, 'bedden/bed1.jpg', 'bedden'),
(17, 'Orthopedisch Hondenmatras', 'Traagschuimmatras dat gewrichten ondersteunt.', 59.90, 'bedden/bed2.jpg', 'bedden'),
(18, 'Pluche Ronde Mand', 'Rond fluffy mandje waar de hond zich in kan oprollen.', 34.50, 'bedden/bed3.jpg', 'bedden'),
(19, 'Waterafstotend Hondenkussen', 'Stevig kussen met waterafstotende hoes voor binnen en buiten.', 44.95, 'bedden/bed4.jpg', 'bedden'),
(20, 'Reisbed Opvouwbaar', 'Lichtgewicht opvouwbaar bed voor onderweg en vakantie.', 29.99, 'bedden/bed5.jpg', 'bedden');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `is_admin`, `created_at`) VALUES
(1, 'Admin', 'admin@hondenshop.nl', '$2y$10$tes0cvM4ing7QTquZC9GwOC0suBnGuaf6gsTZamWPvdXL3a8EGFpu', 1, '2025-12-07 04:39:09'),
(2, 'Admin', 'admin@shop.nl', '$2y$10$ajpoolb33CxUsrnJrTkFBuDu9aHQ30o7Ly7nVMePfTDhlNcOExdCS', 1, '2025-12-07 05:02:20'),
(3, 'Ahmed Ali', 'ahmed@example.com', '$2y$10$KxNyBnNlnMeRGq9I2J7/EOCGZjKWZSfIet1rRpbyey0eNlUExdZh6', 0, '2025-12-07 05:02:30'),
(4, 'Sara Noor', 'sara@example.com', '$2y$10$TDtxGd8UvcsvKzuTBsUKCuzBKGyt4TBfwlqNMQf2GbjAbil00AuAO', 0, '2025-12-07 06:02:40'),
(5, 'John Smith', 'john@example.com', '$2y$10$WbOoGuSJD9dpxItsyzrhxeXib6YlVKmHHFfhNjYtORI7m1yx1BiDK', 0, '2025-12-07 08:02:53'),
(6, 'RaadWajeeh', 'rrqwajeeh@gmail.com', '$2y$10$4cEt.cUKOGs1AVJxue6eY.BIijRFy9FA8VnVSwIMBHCTSWMNRYBcu', 0, '2025-12-07 06:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
