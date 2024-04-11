-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 05:55 PM
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
-- Database: `accommodation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', '1234'),
(2, 'admin2@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landlord_account`
--

CREATE TABLE `landlord_account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlord_account`
--

INSERT INTO `landlord_account` (`id`, `name`, `phone`, `email`, `password`, `confirm_password`) VALUES
(1, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '123', ''),
(2, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '1234', ''),
(5, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '$2y$10$.uNlBhoz8Dd5K', ''),
(6, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '$2y$10$Xt.S309hwbzbw', ''),
(7, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '$2y$10$Go7TM8rj9vWw3', ''),
(8, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '$2y$10$t/P7N9u58FZXB', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_list`
--

CREATE TABLE `property_list` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(200) NOT NULL,
  `property_location` varchar(300) NOT NULL,
  `monthly_rental_amount` decimal(10,2) DEFAULT NULL,
  `owner_name` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `building_type` varchar(50) NOT NULL,
  `agreement_type` varchar(50) NOT NULL,
  `deposit_amount` decimal(10,2) DEFAULT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `carpet_area` int(11) NOT NULL,
  `furniture` enum('Yes','No') NOT NULL,
  `kitchen` enum('Yes','No') NOT NULL,
  `security_guards` enum('Yes','No') NOT NULL,
  `power_backup` enum('Yes','No') NOT NULL,
  `property_desc` text DEFAULT NULL,
  `property_image_url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`property_id`, `property_name`, `property_location`, `monthly_rental_amount`, `owner_name`, `phone_number`, `building_type`, `agreement_type`, `deposit_amount`, `bedrooms`, `bathrooms`, `carpet_area`, `furniture`, `kitchen`, `security_guards`, `power_backup`, `property_desc`, `property_image_url`) VALUES
(33, 'green hostel', 'Latitude: 6.9270786, Longitude: 79.861243', 9000.00, 'Raween', '1234567892', 'flat', 'rent', 5000.00, 3, 2, 340, 'Yes', 'Yes', 'Yes', 'No', 'call for more details', 'uploads/warden/h1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warden_account`
--

CREATE TABLE `warden_account` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `confirm_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warden_account`
--

INSERT INTO `warden_account` (`id`, `name`, `email`, `phone`, `password`, `confirm_password`) VALUES
(1, 'Wathshala Amarasinghe', 'berapicca123@gmail.com', '', '12', ''),
(2, 'Wathshala Amarasinghe', 'berapicca123@gmail.com', '', '1234', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlord_account`
--
ALTER TABLE `landlord_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_list`
--
ALTER TABLE `property_list`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `warden_account`
--
ALTER TABLE `warden_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landlord_account`
--
ALTER TABLE `landlord_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warden_account`
--
ALTER TABLE `warden_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
