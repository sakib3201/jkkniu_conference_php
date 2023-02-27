-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 12:50 AM
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
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_designation` varchar(30) NOT NULL,
  `author_university_name` varchar(200) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_country` varchar(200) NOT NULL,
  `author_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`id`, `author_name`, `author_designation`, `author_university_name`, `author_email`, `author_contact_no`, `author_country`, `author_password`) VALUES
(3, 'Mehedi Khan Rakib', 'Teacher', 'JKKNIU', 'mkrakib007@gmail.com', '01727027277', 'Bangladesh', '57b452e0596daca32ee7fae2ffa94d6e');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `committee_image` varchar(50) NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  `committee_email` varchar(50) NOT NULL,
  `committee_contact` varchar(50) NOT NULL,
  `committee_password` varchar(50) NOT NULL,
  `committee_confirm_password` varchar(50) NOT NULL,
  `committee_university_name` varchar(50) NOT NULL,
  `committee_topic` varchar(50) NOT NULL,
  `committee_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) NOT NULL,
  `paper_title` varchar(1000) NOT NULL,
  `paper_abstract` varchar(5000) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_designation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `manuscript_image` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `author_id`, `paper_title`, `paper_abstract`, `paper_keywords`, `paper_type`, `authors_name`, `authors_affiliation`, `authors_designation`, `authors_email`, `manuscript_pdf`, `manuscript_image`, `paper_status`, `timestamps`, `count`) VALUES
(1, '1677540431', 1, 'First Paper', 'Data Structure and Algorithms', 'Algo,DS', 'original research(full paper)', 'Dr. Tushar Kanti Saha,Dr. Uzzal Kuman Pradhan', 'JKKNIU research society,JKKNIU research society', 'Professor,Professor', 'mkrakib328@gmail.com,mkrcoding1998@gmail.com', '1677540431.pdf', '1677540431.jpg', 1, '2023-02-27 23:27:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` int(11) NOT NULL,
  `speaker_image` varchar(50) NOT NULL,
  `speaker_name` varchar(50) NOT NULL,
  `speaker_email` varchar(50) NOT NULL,
  `speaker_contact` varchar(50) NOT NULL,
  `speaker_password` varchar(50) NOT NULL,
  `speaker_confirm_password` varchar(50) NOT NULL,
  `speaker_university` varchar(50) NOT NULL,
  `speaker_topic` varchar(50) NOT NULL,
  `speaker_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
