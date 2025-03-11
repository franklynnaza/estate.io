-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 01:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `property_id`, `image_path`) VALUES
(17, 6, '../uploads/067c1f84954cd4-a-4-bedroom-semi-detached-duplex-available-semi-detached-duplexes-for-rent-gra-phase-1-magodo-lagos.jpg'),
(18, 6, '../uploads/067c1f8482867a-a-4-bedroom-semi-detached-duplex-available-semi-detached-duplexes-for-rent-gra-phase-1-magodo-lagos.jpg'),
(19, 6, '../uploads/067c1f846ba314-a-4-bedroom-semi-detached-duplex-available-semi-detached-duplexes-for-rent-gra-phase-1-magodo-lagos.jpg'),
(20, 6, '../uploads/067c1f8456eb72-a-4-bedroom-semi-detached-duplex-available-semi-detached-duplexes-for-rent-gra-phase-1-magodo-lagos.jpg'),
(21, 7, '../uploads/R7dNt-lovely-4-bed-terrace-duplex-in-a-gated-estate-akT6Mcrj7t1grOmc5YZx.jpeg'),
(22, 8, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg'),
(23, 8, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-HV2UMtwOf2syvqUhQOUe.jpeg'),
(24, 8, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-mTorWNt3RS5NpfDeSAt0.jpeg'),
(25, 8, '../uploads/3btCi-lovely-5-bed-duplex-in-a-gated-estate-yqSWSvEobY7Fb9fsvxPE.jpeg'),
(26, 9, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-WZoLEbU9k2PYauY93SNG.jpeg'),
(27, 9, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(28, 9, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5j8530jkCqlXakc54YtM.jpeg'),
(29, 9, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-ePBy7KKYqqUl0fM96gD9.jpeg'),
(30, 10, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(31, 10, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5j8530jkCqlXakc54YtM.jpeg'),
(32, 10, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-Coa75ET9W6LeE1YPenUi.jpeg'),
(33, 10, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-K7lyt1VE9ytf0gVJ5qVH.jpeg'),
(34, 11, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg'),
(35, 11, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-HV2UMtwOf2syvqUhQOUe.jpeg'),
(36, 11, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-QrPodwDcal3MiKKvGZ3r.jpeg'),
(37, 11, '../uploads/R7dNt-lovely-4-bed-terrace-duplex-in-a-gated-estate-akT6Mcrj7t1grOmc5YZx.jpeg'),
(38, 12, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-WZoLEbU9k2PYauY93SNG.jpeg'),
(39, 12, '../uploads/3btCi-lovely-5-bed-duplex-in-a-gated-estate-yqSWSvEobY7Fb9fsvxPE.jpeg'),
(40, 12, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-Coa75ET9W6LeE1YPenUi.jpeg'),
(41, 13, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg'),
(42, 13, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-Coa75ET9W6LeE1YPenUi.jpeg'),
(43, 13, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-QrPodwDcal3MiKKvGZ3r.jpeg'),
(44, 13, '../uploads/R7dNt-lovely-4-bed-terrace-duplex-in-a-gated-estate-akT6Mcrj7t1grOmc5YZx.jpeg'),
(45, 14, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(46, 14, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5j8530jkCqlXakc54YtM.jpeg'),
(47, 14, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-ePBy7KKYqqUl0fM96gD9.jpeg'),
(48, 14, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg'),
(49, 15, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-WZoLEbU9k2PYauY93SNG.jpeg'),
(50, 15, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(51, 15, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-Coa75ET9W6LeE1YPenUi.jpeg'),
(52, 15, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-K7lyt1VE9ytf0gVJ5qVH.jpeg'),
(53, 16, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-WZoLEbU9k2PYauY93SNG.jpeg'),
(54, 16, '../uploads/3btCi-lovely-5-bed-duplex-in-a-gated-estate-yqSWSvEobY7Fb9fsvxPE.jpeg'),
(55, 16, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-Coa75ET9W6LeE1YPenUi.jpeg'),
(56, 16, '../uploads/lovely-4-bed-terrace-duplex-in-a-gated-estate-K7lyt1VE9ytf0gVJ5qVH.jpeg'),
(57, 17, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(58, 17, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5j8530jkCqlXakc54YtM.jpeg'),
(59, 17, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-ePBy7KKYqqUl0fM96gD9.jpeg'),
(60, 17, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg'),
(61, 18, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-WZoLEbU9k2PYauY93SNG.jpeg'),
(62, 18, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5WhppJ3LzRWnJfxMEUgL.jpeg'),
(63, 18, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-5j8530jkCqlXakc54YtM.jpeg'),
(64, 18, '../uploads/newly-built-5-bed-duplex-in-a-gated-estate-ePBy7KKYqqUl0fM96gD9.jpeg'),
(65, 18, '../uploads/lovely-5-bed-duplex-in-a-gated-estate-bUGTb50drOiXMkuvaqsh.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `rooms` int(11) NOT NULL,
  `toilets` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` enum('rent','sale') NOT NULL DEFAULT 'sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `price`, `location`, `rooms`, `toilets`, `created_at`, `category`) VALUES
(6, '4 bedroom semi-detached duplex for rent  ', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult\r\n', '45000000', 'GRA Phase 1, Magodo, Lagos', 5, 6, '2025-03-02 12:15:53', 'rent'),
(7, '4 Bed Terraced Duplex', 'SALE?? SALE ?? SALE??\r\n\r\n?? NEWLY BUILT 4 BEDROOM TERRACE DUPLEX\r\n\r\nSEMI DETACHED DUPLEX WITH 1 EN-SUITE MAID ROOM\r\n\r\n??ORCHID ROAD LEKKI\r\n\r\n??100M NAIRA\r\n\r\n??GOVERNOR CONSENT & BUILDING APPROVAL IS AVAILABLE\r\n\r\nFEATURES ??\r\n4 BEDROOM EN-SUITE\r\nCAR PARK\r\nINTERLOCKED FLOOR\r\nFAMILY LOUNGE\r\nSERENE ENVIRONMENT\r\n24HRS SECURITY\r\nGATED ESTATE\r\nFULLY FITTED KITCHEN\r\nGOOD ROAD NETWORK', '100000000', 'Orchid Lekki Lagos', 5, 6, '2025-03-02 12:55:43', 'sale'),
(8, '5 Bedroom Duplex', 'SALE?? SALE ?? SALE?? ?? LOVELY 5 BEDROOM FULLY DETACHED DUPLEX WITH 1 EN-SUITE MAID ROOM ??ORCHID ROAD LEKKI ??185M NAIRA ??GOVERNOR CONSENT & BUILDING APPROVAL IN PROCESS FEATURES ?? ALL BEDROOM EN-SUITE CAR PARK STAMPED FLOOR FAMILY LOUNGE SERENE ENVIRONMENT 24HRS SECURITY GATED ESTATE FULLY FITTED KITCHEN GOOD ROAD NETWORK', '185000000', 'Orchid Road Lekki Lagos', 6, 9, '2025-03-02 13:05:20', 'sale'),
(9, '5 Bedroom Duplex', 'SALE?? SALE ?? SALE??\r\n\r\n?? NEWLY BUILT AND WELL FITTED 5 BEDROOM CONTEMPORARY DUPLEX\r\n\r\n??MEGAMOUND HOUSING ESTATE LEKKI\r\n\r\n??380M NAIRA\r\n\r\n??CERTIFICATE OF OCCUPANCY & BUILDING APPROVAL AVAILABLE\r\n\r\nFEATURES ??\r\nALL BEDROOM EN-SUITE\r\nSWIMMING POOL\r\nGYM ROOM\r\nSTAMPED FLOOR\r\nFAMILY LOUNGE\r\nSERENE ENVIRONMENT\r\n24HRS SECURITY\r\nGATED ESTATE\r\nFULLY FITTED KITCHEN\r\nGOOD ROAD NETWORK', '380000000', 'Orchid Lekki Lagos', 6, 9, '2025-03-02 13:09:15', 'sale'),
(10, '6 bed room appartment', 'SALE?? SALE ?? SALE??\r\n\r\n?? NEWLY BUILT AND WELL FITTED 5 BEDROOM CONTEMPORARY DUPLEX\r\n\r\n??MEGAMOUND HOUSING ESTATE LEKKI\r\n\r\n??380M NAIRA\r\n\r\n??CERTIFICATE OF OCCUPANCY & BUILDING APPROVAL AVAILABLE\r\n\r\nFEATURES ??\r\nALL BEDROOM EN-SUITE\r\nSWIMMING POOL\r\nGYM ROOM\r\nSTAMPED FLOOR\r\nFAMILY LOUNGE\r\nSERENE ENVIRONMENT\r\n24HRS SECURITY\r\nGATED ESTATE\r\nFULLY FITTED KITCHEN\r\nGOOD ROAD NETWORK\r\n', '569000000', 'GRA Phase 1, Magodo, Lagos', 6, 8, '2025-03-02 13:11:57', 'sale'),
(11, 'newly built mortgage', '\r\n\r\n₦185,000,000\r\n \r\n\r\nSALE?? SALE ?? SALE?? ?? LOVELY 5 BEDROOM FULLY DETACHED DUPLEX WITH 1 EN-SUITE MAID ROOM ??ORCHID ROAD LEKKI ??185M NAIRA ??GOVERNOR CONSENT & BUILDING APPROVAL IN PROCESS FEATURES ?? ALL BEDROOM EN-SUITE CAR PARK STAMPED FLOOR FAMILY LOUNGE SERENE ENVIRONMENT 24HRS SECURITY GATED ESTATE FULLY FITTED KITCHEN GOOD ROAD NETWORK', '400000000', 'Orchid Lekki Lagos', 6, 3, '2025-03-02 13:12:47', 'sale'),
(12, 'boys quater rent', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '2000000', 'Orchid Road Lekki Lagos', 4, 5, '2025-03-02 13:14:54', 'rent'),
(13, 'house for rent', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '3000000', 'Orchid Lekki Lagos', 3, 3, '2025-03-02 13:15:36', 'rent'),
(14, 'the best renting office', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '4000000', 'Orchid Lekki Lagos', 3, 1, '2025-03-02 13:16:15', 'rent'),
(15, 'pool for rent', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '1000000', 'Orchid Lekki Lagos', 3, 3, '2025-03-02 13:17:05', 'rent'),
(16, 'rent from us', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '300000000', 'GRA Phase 1, Magodo, Lagos', 3, 4, '2025-03-02 13:28:39', 'rent'),
(17, 'best palace in lagos', 'Magodo Letting ‍️\r\n\r\n4 bedroom semi detached Duplex @ Unilag Estate Magodo Phase 1 Residential Scheme via Isheri (2 people in a compound)\r\n\r\nRent: ₦4.5 million per annum.\r\n\r\nPlease Contact: Angels property consult', '400000000', 'GRA Phase 1, Magodo, Lagos', 4, 3, '2025-03-02 13:29:29', 'sale'),
(18, 'a land near oj lagos', 'the land is fertile', '2000000', 'oj lagos', 0, 0, '2025-03-04 11:39:00', 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'naza', '$2y$10$Q7m7nZsvncMpNNbnYB95PeNOfkDBWp3Lx3oUX5lvxJthuzxHlG9v.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
