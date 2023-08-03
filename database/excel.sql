-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 10:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `app_status` varchar(255) DEFAULT NULL,
  `jobseeker_fname` varchar(255) DEFAULT NULL,
  `jobseeker_mname` varchar(255) DEFAULT NULL,
  `jobseeker_lname` varchar(255) DEFAULT NULL,
  `jobtitle` varchar(255) DEFAULT NULL,
  `jobtitle2` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `contact2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `exp_years` varchar(255) DEFAULT NULL,
  `eligibility` varchar(255) DEFAULT NULL,
  `skype_id` varchar(255) DEFAULT NULL,
  `date_encoded` date DEFAULT current_timestamp(),
  `recruiter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `app_status`, `jobseeker_fname`, `jobseeker_mname`, `jobseeker_lname`, `jobtitle`, `jobtitle2`, `contact`, `contact2`, `address`, `email`, `passport`, `exp_years`, `eligibility`, `skype_id`, `date_encoded`, `recruiter`) VALUES
(1, 'jasper', NULL, 'jasper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(2, 'second', NULL, NULL, NULL, 'dasdasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(3, NULL, 'dsadasdas', NULL, NULL, NULL, NULL, NULL, 'dsadas', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(5, '', NULL, NULL, NULL, 'dasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(6, 'dsadasdasdsadasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(7, 'dsadasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(8, 'dsadasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(9, NULL, 'da', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(10, 'jasper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(11, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
