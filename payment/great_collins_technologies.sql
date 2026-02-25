-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2026 at 02:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `great_collins_technologies`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `first_payment` decimal(10,2) DEFAULT NULL,
  `second_payment` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_name`, `payment_date`, `total_amount`, `first_payment`, `second_payment`) VALUES
(1, 'GC-6877a612d53ae', 'EBUKA IGWE', '2025-07-16', '6.00', '6.00', '0.00'),
(2, 'GC-6877a662e815e', 'OKEYE CHIGOZIE COLLINS', '2025-07-16', '50000.00', '50000.00', '0.00'),
(3, 'GC-6877a9955befa', 'EBUKA IGWE', '2025-07-16', '500.00', '500.00', '0.00'),
(4, 'GC-6877aa0e50c1e', 'EBUKA IGWE', '2025-07-16', '1000.00', '1000.00', '0.00'),
(5, 'GC-6877ab0a9b818', 'OKEYE CHIGOZIE COLLINS', '2025-07-16', '100000.00', '200.00', '0.00'),
(6, 'GC-6877b7181aded', 'EBUKA IGWE', '2025-07-16', '150000.00', '50000.00', '0.00'),
(7, 'GC-6877b8460d175', 'Emeka john', '2025-07-16', '500000.00', '350000.00', '0.00'),
(8, 'GC-68931fecd1bda', 'EBUKA IGWE', '2025-08-06', '15000.00', '15000.00', '0.00'),
(9, 'GC-6893245147f74', 'OKEYE CHIGOZIE COLLINS', '2025-08-06', '40000.00', '6000.00', '0.00'),
(10, 'GC-68932cfe7eb8a', 'EBUKA IGWE', '2025-08-06', '100000.00', '6000.00', '0.00'),
(11, 'GC-69044b46729d0', 'OKEYE CHIGOZIE COLLINS', '2025-10-31', '100000.00', '40000.00', '0.00'),
(12, 'GC-690b43459278b', 'Solex Clothings', '2025-11-05', '50000.00', '30000.00', '0.00'),
(13, 'GC-690b440d9981b', 'Ifesnyi Clement ', '2025-11-05', '150000.00', '100000.00', '0.00'),
(14, 'GC-690b45438d10b', 'Francis Clement', '2025-11-05', '200000.00', '150000.00', '0.00'),
(15, 'GC-699a91f45c8e1', 'OKEYE CHIGOZIE COLLINS', '2026-02-22', '69999.00', '56666.00', '678.00'),
(16, 'GC-699a93fe8662d', 'EBUKA IGWE', '2026-02-10', '4444.00', '40000.00', '0.00'),
(17, 'GC-699e4aa78f9e7', 'Solex Clothings', '2026-02-25', '6000.00', '600000.00', '0.00'),
(18, 'GC-699e4ad60574d', 'hjdhdf', '2026-02-25', '500.00', '5000.00', '57777.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
