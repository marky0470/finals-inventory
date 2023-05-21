-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `clearanceLevel` varchar(100) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `clearanceLevel`) VALUES
(1, 'man', 'a', 'staff'),
(8, 'root', '$2y$10$oqzW2nM5QvCtaMCEY.97ROFO.O.TugwBFWsWX3YW/vkflpsDl2FtO', 'staff'),
(9, 'kansas', '$2y$10$.W0n6hz9i0L7l5BsbA6qP.HdSFQcp3LSs64u50L.Qw9h48TVEhSum', 'staff'),
(10, 'bruh', '$2y$10$FWDpUhki63twEUeAu8k/oubkHMTIZyVPw5sEAVAt0G7/1yiDoveWa', 'staff'),
(11, 'bruh', '$2y$10$Bq90nJrUm56XbN8YICWSqe8Vzpa.wFwwXy0rPLl499jAmg.zd.PpG', 'staff'),
(12, 'bruh', '$2y$10$HDir7qS2NQCbOy9RzUp/n.nE/IGdrdtvE8.O7S4pKiAGOqWATFiQy', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
