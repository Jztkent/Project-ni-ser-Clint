-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 04:25 PM
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
-- Database: `client`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `password`) VALUES
(1, 'janjan', '12345'),
(2, 'dandan', '12345'),
(3, 'janjan', '12345'),
(4, 'january', '1234567'),
(5, 'clint', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course`, `description`) VALUES
(9, 'BSIT', 'DADAD'),
(11, 'BSIT 3', 'DADE'),
(14, 'BSIT', 'Bachelor of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `dbirth` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `lastname`, `firstname`, `middlename`, `dbirth`, `gender`, `institute`, `course`, `number`) VALUES
('2021-2023', 'january iverson', 'libutan', 'S', '2023-11-14', 'Male', 'FCDSET', 'BSIT', '09123456678'),
('2023-52', 'january', 'libutan', 'iverso', '2023-11-28', 'Male', 'FALS', 'BITM', '091141'),
('2024-2025', 'Uchiha', 'Madara', 'Uzumaki', '2024-01-06', 'Male', 'FCDSET', 'BSIT', '091234567889'),
('2030-2031', 'Libutan', 'Enero', 'Seno', '2023-12-11', 'Male', 'FCDSET', 'BITM', '0921456778');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject`
--

CREATE TABLE `faculty_subject` (
  `id` int(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_subject`
--

INSERT INTO `faculty_subject` (`id`, `faculty`, `subject`) VALUES
(1, 'january iverson', '7332'),
(2, 'january iverson', '7332..gwapaka'),
(3, 'Libutan', 'ITPE130_INTEG'),
(4, 'january iverson', '7332_gwapaka'),
(5, 'january', 'ITP 132_Advanced Database'),
(6, 'january iverson', 'ITP 132_Advanced Database'),
(7, 'Uchiha', 'ITPEF 1_TMGD'),
(8, 'january iverson', 'ITPEF 1_TMGD'),
(9, 'Uchiha', 'ITP 132_Advanced Database'),
(10, 'Uchiha', 'ITPE130_INTEG');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `sectionandyear` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `course`, `sectionandyear`, `subject`, `time`, `grade`) VALUES
('2021-245678 jan', 'BSIT', '2A', 'ITP 132 Advanced Database', '08:30', '2.5'),
('2034-2035 Libutan', 'BSIT', '3B', 'ITP 132 Advanced Database', '10:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id_institute` int(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id_institute`, `institute`, `description`) VALUES
(9, 'FCDSET', 'Faculty of Computing Development Science Enironment and Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `id` int(100) NOT NULL,
  `schoolyear` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`id`, `schoolyear`, `semester`, `status`) VALUES
(7, '2021-2022', '1st Semester', 'Inactive'),
(8, '2040-2041', '1st Semester', 'Inactive'),
(9, '2099-3000', '1st Semester', 'Inactive'),
(10, '2040-2041', '1st Semester', 'Inactive'),
(11, '3000-3001', '1st Semester', 'Inactive'),
(12, '4000-4001', '1st Semester', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `contactnumber` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `nameofguardian` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `gender`, `province`, `municipality`, `barangay`, `zipcode`, `contactnumber`, `institute`, `course`, `nameofguardian`, `number`, `address`) VALUES
('090911', 'test', 'test', 'test', '2024-01-07', 'Male', 'Davao Oriental', 'Mati', 'test', 'test', 'test', 'FCDSET', 'BSIT', 'test', '', 'test'),
('2021-2021', 'jan', 'jan', 'd', '2023-11-17', 'male', 'mars', 'mati', 'poblacion', '8808', '09123456678', 'FALS', 'BSIT', 'jan d jan', '0912345667', 'mars'),
('2021-2024', 'jan', 'jan', 'd', '2023-11-17', 'male', 'mars', 'mati', 'poblacion', '8808', '09123456678', 'FALS', 'BSIT', 'jan d jan', '0912345667', 'mars'),
('2021-2066', 'jan', 'jan', 'd', '2023-11-09', 'Female', 'mars', 'mati', 'poblacion', '8808', '09123456678', 'FALS', 'BSIT', 'jan d jan', '0912345667', 'mars');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `id` int(11) NOT NULL,
  `id_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `sectionandyear` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`id`, `id_name`, `course`, `sectionandyear`, `subject`, `time`, `grade`) VALUES
(4, '2021-2066 jan', 'BSIT', 'B3', 'january iverson 7332_gwapaka', '20:12', '3'),
(5, '2021-2066 jan', 'BSIT', 'B3', 'january iverson 7332', '08:42', '3'),
(6, '2021-2021 jan', 'BSIT', 'B3', 'Uchiha ITPEF 1_TMGD', '09:38', '2.5'),
(8, '090911 test', 'BSIT', '2A', 'january iverson 7332', '23:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(100) NOT NULL,
  `student` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student`, `faculty`) VALUES
(1, 'naruto', 'january iverson_7332'),
(2, 'Libutan', 'Libutan_ITPE130_INTEG'),
(3, 'uzamaki naruto', 'january iverson - 7332'),
(4, 'January Libutan', 'Libutan - ITPE130_INTEG'),
(5, 'January Libutan', 'Libutan - ITPE130_INTEG'),
(6, 'January Libutan', 'january - ITP 132_Advanced Database'),
(7, 'uzamaki naruto', 'january - ITP 132_Advanced Database'),
(8, 'test test', 'Libutan - ITPE130_INTEG');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `code` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`code`, `description`, `unit`, `type`, `course`, `institute`) VALUES
('ITP 132', 'Advanced Database', '3 unit', 'Laboratory', 'BSCOT', 'FCDSET'),
('ITPE130', 'INTEG', '3 unit', 'Laboratory', 'BITM', 'FCDSET'),
('ITPEF 1', 'TMGD', '3 unit', 'Laboratory', 'BSIT', 'FCDSET');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenumber` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phonenumber`, `address`, `age`, `gender`, `email`, `password`) VALUES
(36, 'naruto', 'libutan', 2147483647, 'maragusan', 21, '', 'janjan@gmail.com', '11111'),
(37, 'January', 'Libutan', 91234567, 'maragusan', 21, 'Male', 'janjan@gmail.com', '11111'),
(38, 'Enero', 'Enero', 9123153, 'mars', 21, 'Male', 'enero@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id_institute`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grade`
--
ALTER TABLE `student_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `id_institute` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
