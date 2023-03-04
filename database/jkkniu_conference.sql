-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 10:31 AM
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
  `paper_title` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `track` varchar(100) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `paper_id`, `paper_title`, `author_id`, `paper_keywords`, `track`, `authors_name`, `authors_affiliation`, `authors_email`, `manuscript_pdf`, `paper_status`, `timestamps`, `count`) VALUES
(3, '1677564321', 'Data Structure and Algorithm', 3, 'DS,Algo', '', 'Dr. Tushar Kanti Saha,Dr. Uzzal Kumar Pradhan', 'JKKNIU Research Society,JKKNIU Research Society', 'tusharkantisaha@gmail.com,uzzalkumarpradhan@gmail.com', '1677564321.pdf', 1, '2023-02-28 06:05:21', 1),
(6, '1677572001', 'XYZ', 3, '', '', 'MR', 'JKNNIU', 'mr@gmail.com', '1677572001.pdf', 1, '2023-02-28 08:13:21', 1),
(8, '1677573422', 'ABC', 3, '', '', 'Sakib', 'JKKNIU', 'sakib@gmail.com', '1677573422.pdf', 1, '2023-02-28 08:37:02', 1),
(9, '1677573689', 'Rakib', 3, '', '', 'Rak', 'JKKNIU', 'rak@gmail.com', '1677573689.pdf', 1, '2023-02-28 08:41:29', 1),
(10, '1677574661', 'Sakib', 3, '', '', 'sakib', 'JKKNIU', 'sakib@gmail.com', '1677574661.pdf', 1, '2023-02-28 08:57:41', 1),
(11, '1677741843', 'SBY', 3, '', '', 'Sabur', 'JKKNIU', 'sabur@gmail.com', '1677741843.doc', 1, '2023-03-02 07:24:03', 1),
(12, '1677745597', 'Science', 3, 'x', '', 'x', 'x', 'x@gmail.com', '1677745597.doc', 1, '2023-03-02 08:26:37', 1),
(13, '1677745692', 'x', 3, '', 'Science', 'x', 'x', 'x@gmail.com', '1677745692.doc', 1, '2023-03-02 08:28:12', 1),
(14, '1677746862', 's', 3, '', 'Business', 's', 's', 's@gmail.com', '1677746862.doc', 1, '2023-03-02 08:47:42', 1),
(15, '1677747329', 'qwer', 3, '', 'Business', 'kazi', 'JKKNIU', 'kazi@gmail.com', '1677747329.doc', 1, '2023-03-02 08:55:29', 1),
(16, '1677747466', 'qwer', 3, '', 'Business', 'qwer', 'jkkniu', 'qwer@gmail.com', '1677747466.doc', 1, '2023-03-02 08:57:46', 1),
(17, '1677748469', 'd', 3, '', 'Law', 'd', 'd', 'd@gmail.com', '1677748469.doc', 1, '2023-03-02 09:14:29', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
