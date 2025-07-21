-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 07:56 AM
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
-- Database: `credit_card_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_type` enum('Visa','MasterCard','RuPay') NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `card_number`, `card_type`, `expiry_date`, `cvv`, `balance`) VALUES
(17, 1, '4111111111111112', 'Visa', '2025-06-01', '123', 37350.00),
(18, 7, '4111111111112223', 'MasterCard', '2025-06-01', '124', 60000.00),
(19, 8, '4111111111113334', 'Visa', '2025-06-01', '125', 70000.00),
(20, 9, '4111111111114445', 'MasterCard', '2025-06-01', '126', 77577.00),
(21, 10, '4111111111115556', 'Visa', '2025-06-01', '127', 90000.00);

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('open','resolved','rejected') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','declined') DEFAULT 'pending',
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `card_id`, `amount`, `status`, `transaction_date`) VALUES
(4, 1, 17, 3400.00, '', '2025-04-25 06:23:43'),
(5, 1, 17, 3400.00, '', '2025-04-25 06:25:33'),
(6, 1, 17, 3450.00, '', '2025-04-25 06:35:37'),
(7, 1, 17, 2400.00, '', '2025-04-25 06:37:30'),
(8, 9, 20, 2423.00, '', '2025-07-17 17:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','vendor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `state`, `pincode`, `income`, `aadhar`, `pan`, `password`, `role`) VALUES
(1, NULL, 'customer1@gmail.com', '9876543210', 'Mumbai, India', 'Maharashtra', '400001', 500000.00, '123412341234', 'ABCDE1234F', 'password123', 'customer'),
(2, NULL, 'vendor1@gmail.com', '8765432109', 'Delhi, India', 'Delhi', '110001', 0.00, '567856785678', 'XYZDE5678G', 'password456', 'vendor'),
(3, NULL, 'admin1@gmail.com', '7654321098', 'Bangalore, India', 'Karnataka', '560001', 0.00, '987698769876', 'LMNDE9876H', 'password789', 'admin'),
(5, NULL, 'mdhanyathasreeraj@gmail.com', '7981798001', 'Chikahagade Gate Banglore', 'Karnataka', '562106', 120000.00, '471134125638', 'MMZPK0466P', '$2y$10$QRlUUvwBAzuf05pMUwoyaOPRHPFO/ymxmkaY9vJhKkNUXhiSviBZO', 'vendor'),
(7, NULL, 'mvsreeraj.ece@pvkkit.ac.in', '7801078333', 'Chikahagade Gate Banglore', 'Karnataka', '562106', 120000.00, '461142123496', 'MMZPK0466R', '$2y$10$c0k50jJQP4SCK4pREpiv/eVTegBq0PCPyAlMVDtoBnB9l7uqqy.2a', 'customer'),
(8, NULL, 'merugudhanyatha@gmail.com', '7801078455', ' Banglore', 'Karnataka', '562102', 120000.00, '461142123499', 'MMZPK0465Z', '$2y$10$hAJFFU3vnOO2DwppO6YCBu.Em98x6nz/vLeW6U8h5RhFuK4ekuuxu', 'customer'),
(9, NULL, 'merugu@gmail.com', '7801078453', ' Anantapur', 'Andhra Pradesh', '515001', 120000.00, '461142123356', 'MMZPK0434Z', '$2y$10$gYdhFtnYK5DFtMPyzgSdfOHjkCQH6x.Vy9TjDIsB2tM2D0Fyc..D2', 'customer'),
(10, NULL, 'gkantabtech22@ced.alliance.edu.in', '9748199482', 'Chikahagade Gate Banglore', 'Karnataka', '562104', 120000.00, '471134125623', 'MMZPK0463L', '$2y$10$y2LuNC7dTZL68AlN.8xcluOK1yXA7ElF7IlUYAL//DnRGrPob6AfS', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `aadhar` (`aadhar`),
  ADD UNIQUE KEY `pan` (`pan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disputes`
--
ALTER TABLE `disputes`
  ADD CONSTRAINT `disputes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disputes_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
