-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 07:56 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission2019 for kafuco online system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'Admin', 'kafuco@gmail.com', '4154', NULL, NULL, NULL),
(2, 'Saningo', 'saningo@gmail.com', 'admin12', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--
CREATE TABLE `courses` (
  `ID` int(2) NOT NULL,
  `coursename` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `coursename`, `isActive`) VALUES
(1,   'IT', NULL),
(2,   'Education', NULL),
(3,   'Commerce', NULL);

-- --------------------------------------------------------
--
-- Table structure for table `bio data`
--

CREATE TABLE `bio_data` (
  `ID` int(11) NOT NULL,
  `country` varchar(10) NOT NULL,
  `county` varchar(15) NOT NULL,
  `district` varchar(20) NOT NULL,
  `id_birth` int(10) NOT NULL,
  `next_of_kin` varchar(15) NOT NULL,
  `rlship_kin` varchar(10) NOT NULL,
  `next_kin_no` int(11) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bio data`
--

INSERT INTO `bio_data` (`ID`, `country`, `county`, `district`, `id_birth`, `next_of_kin`, `rlship_kin`, `next_kin_no`, `isAvailable`) VALUES
(1, 'kenya', 'samburu', 'samburu central', '3426565', 'Jane smith', 'uncle', '0716845231', 1);


--
-- Table structure for table `education_information`
--

CREATE TABLE `education_information` (
  `ID` int(3) NOT NULL,
  `high_school` varchar(255) NOT NULL,
  `high_school_Grade` varchar(70) NOT NULL,
  `other_school` varchar(70) NOT NULL,
  `qualification` int(20) NOT NULL,
  `index_no` varchar(30) NOT NULL,
  `math` varchar(10) NOT NULL,
  `english` varchar(10) NOT NULL,
  `kiswahili` varchar(10) NOT NULL,
  `physics` varchar(10) NOT NULL,
  `chemistry` varchar(10) NOT NULL,
  `business` varchar(10) NOT NULL,
  `agri` varchar(10) NOT NULL,
  `comp_sci` varchar(10) NOT NULL,
  `biology` varchar(10) NOT NULL,
  `cre` varchar(10) NOT NULL,
  `history` varchar(7) NOT NULL,
  `geo` varchar(70) NOT NULL,
  `french` varchar(70) NOT NULL,
  `home_sci` varchar(70) NOT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education_information`
--

INSERT INTO `education_information` (`ID`, `high_school`, `high_school_Grade`, `other_school`, `qualification`, `index_no`, `math`, `english`, `kiswahili`, `physics`, `chemistry`, `business`, `agri`, `comp_sci`, `biology`, `cre`, `history`, `geo`, `french`, `home_sci`, `isActive`) VALUES
(1, 'marala high school', 'B+', 'none', 'n/a', '22500013001', 'A', 'B+', 'B+', 'A-', 'B', 'B-', 'B', 'C+', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 1);



-- --------------------------------------------------------

--
-- Table structure for table `selected_courses`
--

CREATE TABLE `selected_courses` (
  `S_ID` int(2) NOT NULL,
  `ID` int(3) NOT NULL,
  `coursename` varchar(20) NOT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Dumping data for table `selected_courses`
--

INSERT INTO `selected_courses` (`ID`, `coursename`, `isAvailable`) VALUES
(1, 'Math with IT', NULL),
(2, 'IT', NULL),
(3, 'Economics',NULL),
(4, 'Commerce', NULL),
(5, 'EDucation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `ID` int(3) NOT NULL,
  `FIRSTNAME` varchar(70) DEFAULT NULL,
  `LASTNAME` varchar(70) DEFAULT NULL,
  `GENDER` varchar(8) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `CITY` varchar(20) DEFAULT NULL,
  `TOWN` varchar(50) DEFAULT NULL,
  `ZIP` varchar(10) DEFAULT NULL,
  `PNUMBER` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`ID`, `FIRSTNAME`, `LASTNAME`, `GENDER`, `ADDRESS`, `CITY`, `TOWN`, `ZIP`, `PNUMBER`, `EMAIL`, `PASSWORD`, `dob`, `isActive`) VALUES
(1, 'SANINGO', 'LEKALANTULA', 'MALE', 'MARALAL NGARI', 'NAIROBI', 'MARALAL', '20600', '0716843251','NICK@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '09/05/1996', NULL);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `coursename` (`coursename`);

--
-- Indexes for table `education_information`
--
ALTER TABLE `education_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bio data`
--
ALTER TABLE `bio_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `selected_courses`
--
ALTER TABLE `selected_courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bba_index_coursename` (`coursename`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `stud_name_index` (`FIRSTNAME`),
  ADD KEY `gender_stud` (`GENDER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `selected_courses`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `education_information`
--
ALTER TABLE `education_information`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `education_information_be`
--
ALTER TABLE `bio_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `selected_courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
