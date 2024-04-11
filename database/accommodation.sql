-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 07:56 PM
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

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email_address`, `phone_number`, `subject`, `message`) VALUES
(1, 'Thilanka Dilshan', 'thilanka.cv@gmail.com', '0714592141', 'nsbm', 'i like to visit here'),
(3, 'kavidu bathiya', 'kavidu@gmail.com', '0712345671', 'Accommodation needed', 'hello sir'),
(9, 'Thilanka Dilshan', 'kavidu@gmail.com', '0711387444', 'Accommodation needed', 'call me'),
(10, 'kasun maduranga', 'qqqqqq.cv@gmail.com', '0711387444', 'Accommodation needed', 'hi');

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
(2, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '123456', ''),
(7, 'Wathshala Amarasinghe', '0714983669', 'berapicca123@gmail.com', '123456', ''),
(9, 'Thilanka Dilshan', '0714592141', 'landlord1@gmail.com', '123456', ''),
(10, 'Thilanka Dilshan', '0714592141', 'landlord2@gmail.com', '123456', ''),
(11, 'Thilanka Dilshan', '0714592141', 'landlord3@gmail.com', '123456', '');

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
(41, 'samanala Bording', 'Latitude: 6.82627201796834, Longitude: 80.028616358789', 20000.00, 'samanala Bording', '0712345671', 'hostle', 'one year', 40000.00, 5, 2, 2, 'Yes', 'Yes', 'Yes', 'Yes', 'good hostle', 'assests/warden/hi.jpg'),
(42, 'green Hostle', 'Latitude: 6.828655276516134, Longitude: 80.0332081927624\r\n ', 10000.00, 'Suranga Lakmal', '0711387444', 'hostle', 'one year', 20000.00, 8, 6, 4, 'Yes', 'Yes', 'Yes', 'Yes', 'good condition', 'assests/warden/hi1.jpg'),
(43, 'The Buncker', 'Latitude: 6.823012535651384, Longitude: 80.0391094928391', 12000.00, 'Kasun Rajitha', '0712345671', 'hostle', 'one year', 24000.00, 6, 5, 2, 'Yes', 'No', 'Yes', 'Yes', 'contact us', 'assests/warden/hostel-room-types-5.jpg'),
(44, 'Green Terras Hostle', 'Latitude: 6.822874553588135, Longitude: 80.03921874703494', 13000.00, 'Sahan perera', '0714592141', 'hostle', 'one year', 26000.00, 4, 4, 4, 'No', 'Yes', 'No', 'Yes', 'Contact us', 'assests/warden/hellow.jpg'),
(45, 'Bordima', 'Latitude: 6.822727537960777, Longitude: 80.03805468202125', 8000.00, 'Sameera Sadaruwan', '234234', 'hostle', 'one year', 23000.00, 2, 2, 2, 'Yes', 'Yes', 'No', 'Yes', 'welcome', 'assests/warden/hi2.jpg'),
(46, 'NSBM Hostal lodge', 'Latitude: 6.839137445275166, Longitude: 80.02471095493573', 13000.00, 'Rasika sampath', '0711387444', 'hostle', 'one year', 4.00, 3, 2, 2, 'Yes', 'No', 'Yes', 'No', 'call for more details', 'assests/warden/rockstel-sri-lanka.jpg'),
(47, 'DVS Boys hostle', 'Latitude: 6.823115826273741, Longitude: 80.04539615004914', 11000.00, 'Kasun perera', '0712345671', 'Bordim', 'two years', 22000.00, 3, 1, 1, 'Yes', 'Yes', 'Yes', 'No', 'Send us a message', 'assests/warden/175357045.jpg'),
(48, 'Sarasavi Hostle', 'Latitude: 6.825511730230234, Longitude: 80.04189798270944', 7000.00, 'Heshan sagara', '0712345671', 'Bordim', 'two years', 3.00, 3, 3, 2, 'Yes', 'Yes', 'Yes', 'Yes', 'Give us a call more details', 'assests/warden/1111.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `request_list`
--

CREATE TABLE `request_list` (
  `request_id` int(11) NOT NULL,
  `student_iid` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `building_type` varchar(50) NOT NULL,
  `monthly_rental_amount` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `property_location` varchar(100) NOT NULL,
  `property_desc` text NOT NULL,
  `property_image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_list`
--

INSERT INTO `request_list` (`request_id`, `student_iid`, `student_name`, `student_email`, `student_phone`, `property_id`, `property_name`, `building_type`, `monthly_rental_amount`, `deposit_amount`, `property_location`, `property_desc`, `property_image_url`, `created_at`) VALUES
(1, 23777, 'kaweesha sadaruwan', 'kaweesha@gmail.com', '0786545433', 11, 'Samanala Bording', 'Hostal', 13000.00, 25000.00, 'pitipana north', 'good', 'http://example.com/apartment_a_image.jpg', '2024-04-07 13:51:12'),
(2, 35444, 'kasun perera', 'kasun@gmail.com', '0787654321', 2, 'Green Hostle', 'Hostal', 20000.00, 25000.00, 'pitipana', 'Nice wiew', 'http://example.com/house_b_image.jpg', '2024-04-07 13:51:12'),
(3, 27688, 'chamth sehan', 'chamath@gmail.com', '0722334455', 3, 'hostal', 'Studio', 12000.00, 15000.00, 'pitipana', 'Superb', 'http://example.com/studio_c_image.jpg', '2024-04-07 13:51:12'),
(4, 28888, 'Sachi sahan', 'sachi@gmail.com', '0755666777', 4, 'Banker', 'hostle', 18000.00, 22000.00, 'pitipana', 'Safe', 'http://example.com/condo_d_image.jpg', '2024-04-07 13:51:12'),
(5, 31000, 'rasmika kasun', 'rasmika@gmail.com', '0744433322', 5, 'Bordima', 'Hostle', 17000.00, 21000.00, 'pitipana', 'Safety', 'http://example.com/townhouse_e_image.jpg', '2024-04-07 13:51:12');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `student_id`, `password`, `gender`) VALUES
(1, 'Thilanka Dilshan', '27344', '$2y$10$eZpZZjWywsp/Hjni.BPTm.aUCtwy..eAbtqZHPJJFvYIJ55I2gzwq', 'male'),
(2, 'kasun maduranga', '32111', '$2y$10$0hY28Y43hrNAumKFtMrNbOXQpI3ntp.8VXoFHH3KPU8wk6wQa02BC', 'male'),
(3, 'Rashmika Prasad', '26555', '$2y$10$S78hxocJMMzlQkvAOfwRvupClMSkWrTFsOQzyVy0E94nDi3p5YO2C', 'male'),
(4, 'Thilanka Dilshan', '23455', '$2y$10$CSL72f1ETAetCoHuDvhWpujWCekyth75Hp9XD1vw5kQ5c/HjbiPwG', 'male'),
(5, 'Thilanka Dilshan', '27348', '$2y$10$PUnikLWBFbQ5P.gJ4AF9d.JvvbDuBdGHDQX/qTKCuYPP/2vOmcvlm', 'male');

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
(14, 'Wathshala Amarasinghe', 'berapicca123@gmail.com', '', '123456', ''),
(15, 'Thilanka Dilshan', 'warden1@gmail.com', '', '123456', ''),
(16, 'Thilanka Dilshan', 'warden2@gmail.com', '', '123456', '');

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
-- Indexes for table `request_list`
--
ALTER TABLE `request_list`
  ADD PRIMARY KEY (`request_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `landlord_account`
--
ALTER TABLE `landlord_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `request_list`
--
ALTER TABLE `request_list`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warden_account`
--
ALTER TABLE `warden_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
