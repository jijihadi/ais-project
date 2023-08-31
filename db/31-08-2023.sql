-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 06:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_consent_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `consents`
--

CREATE TABLE `consents` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `patient_sign` varchar(200) NOT NULL,
  `guardian_sign` varchar(200) NOT NULL,
  `employee_sign` varchar(200) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `front_title` varchar(50) DEFAULT NULL,
  `back_title` varchar(50) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_number`, `name`, `front_title`, `back_title`, `join_date`, `position`, `phone`, `email`, `inputdate`, `updatedate`) VALUES
(1, '55124134', 'Pegawai 1', NULL, 'A.Md.Kep', '2016-06-09', 'Pelayanan', '0811123123', 'a@a.com', '2023-08-31 12:19:33', NULL),
(2, '55212411', 'Pegawai 2', NULL, 'S.Rm', '2019-09-09', 'Pelayanan', '081229321314', 'b@b.com', '2023-08-31 12:20:51', NULL),
(3, '71234168', 'Pegawai 3', NULL, 'S.Pd', '2020-01-09', 'Pelayanan', '081316512172', 'c@c.com', '2023-08-31 12:20:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL,
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `medical_record` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` char(1) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL,
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `head` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `verification` text NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `inputby` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `roles` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `roles`, `inputdate`, `updatedate`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Pegawai 1', 1, '2023-08-31 12:17:00', NULL),
(2, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'Pegawai 2', 1, '2023-08-31 12:17:29', NULL),
(3, 'c', '4a8a08f09d37b73795649038408b5f33', 'Pegawai 3', 1, '2023-08-31 12:17:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consents`
--
ALTER TABLE `consents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consents_patient_idx` (`patient_id`),
  ADD KEY `consents_guardian_idx` (`guardian_id`),
  ADD KEY `consents_employee_idx` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guardians_patient_idx` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_user_idx` (`user_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consents`
--
ALTER TABLE `consents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consents`
--
ALTER TABLE `consents`
  ADD CONSTRAINT `consents_employee_idx` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `consents_guardian_idx` FOREIGN KEY (`guardian_id`) REFERENCES `guardians` (`id`),
  ADD CONSTRAINT `consents_patient_idx` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `guardians`
--
ALTER TABLE `guardians`
  ADD CONSTRAINT `guardians_patient_idx` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patient_user_idx` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
