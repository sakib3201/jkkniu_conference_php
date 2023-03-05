-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 11:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkkniu_conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$gwntBIpYSUdGXZa1VGxcd.LZ2ggWcvAOEXbGGMua04QQldupzM3Mu');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_password` varchar(200) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`author_id`, `author_name`, `author_email`, `author_contact_no`, `author_password`, `verification_code`, `email_verified_at`) VALUES
(14, 'sakib shahon', 'sakib3201@gmail.com', '01709828340', '$2y$10$LKH0OawySUbYnZdi1c7TUegsYCZiB2gPvME.oNKuXJR91HXcZFVt6', '821567', '2023-03-05 14:40:50'),
(18, 'Mehedi Khan Rakib', 'mkrakib328@gmail.com', '01727027277', '$2y$10$buM7ewvY79ke.s5l4jPUdeKcZNbej9HljkHWj0t77EFk4i/bjfF1W', '146926', '2023-03-06 00:50:32'),
(20, 'MK Rakib', 'mkrcoding007@gmail.com', '01643540358', '$2y$10$lVc7Ls6NIOfun1e0vBIXy.bBNF1GmZ7jN1XCJ3kA135lrrRRpJSFK', '152181', '2023-03-06 04:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_id` int(11) NOT NULL,
  `committee_image` varchar(50) NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  `committee_email` varchar(50) NOT NULL,
  `committee_contact` varchar(50) NOT NULL,
  `committee_password` varchar(50) NOT NULL,
  `committee_university` varchar(50) NOT NULL,
  `committee_topic` varchar(50) NOT NULL,
  `committee_status` enum('0','1') NOT NULL DEFAULT '0',
  `verification_code` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_id`, `committee_image`, `committee_name`, `committee_email`, `committee_contact`, `committee_password`, `committee_university`, `committee_topic`, `committee_status`, `verification_code`, `email_verified_at`) VALUES
(1, '1678002855.png', 'Sakib Shahon', 'sakib@gmail.com', '', '', 'JKKNIU', 'Chairman', '0', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(200) DEFAULT NULL,
  `paper_title` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `track` varchar(100) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `count` int(11) NOT NULL,
  `timestamps` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `paper_title`, `author_id`, `paper_keywords`, `track`, `authors_name`, `authors_affiliation`, `authors_email`, `manuscript_pdf`, `paper_status`, `count`, `timestamps`) VALUES
(29, '1678007008', 'tester', 14, 'test', 'Business', 'sakib', 'jkkniu', 'sakib3201@gmail.com', '1678007008.doc', 1, 1, '2023-03-04 21:03:28'),
(30, '1678054034', 'Data Structure and Algorithms', 18, 'Algo,DS', 'Science', 'Mehedi Khan Rakib,Rabiul Islam', 'JKKNIU research society,JKKNIU', 'mkrakib328@gmail.com,mkrcoding1998@gmail.com', '1678054034.docx', 1, 1, '2023-03-05 22:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int(11) NOT NULL,
  `speaker_image` varchar(50) NOT NULL,
  `speaker_name` varchar(50) NOT NULL,
  `speaker_email` varchar(50) NOT NULL,
  `speaker_contact` varchar(50) NOT NULL,
  `speaker_password` varchar(50) NOT NULL,
  `speaker_country` varchar(100) NOT NULL,
  `speaker_university` varchar(50) NOT NULL,
  `speaker_topic` varchar(50) NOT NULL,
  `speaker_status` enum('0','1') NOT NULL DEFAULT '0',
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speaker_id`, `speaker_image`, `speaker_name`, `speaker_email`, `speaker_contact`, `speaker_password`, `speaker_country`, `speaker_university`, `speaker_topic`, `speaker_status`, `verification_code`) VALUES
(5, '1678002411.png', 'Mehedi Khan', 'mkrakib007@gmail.com', '', '', '', 'JKKNIU', 'DSA', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speaker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_information`
--
ALTER TABLE `admin_information`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
