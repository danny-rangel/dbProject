-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2019 at 10:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `chairperson_of`
--

CREATE TABLE `chairperson_of` (
  `department_number` decimal(10,0) NOT NULL,
  `social_security_number` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chairperson_of`
--

INSERT INTO `chairperson_of` (`department_number`, `social_security_number`) VALUES
('2', '144667'),
('4', '124577');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `title` varchar(40) DEFAULT NULL,
  `course_number` decimal(10,0) NOT NULL,
  `textbook` varchar(40) DEFAULT NULL,
  `units` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`title`, `course_number`, `textbook`, `units`) VALUES
('Intro To College Writing', '101', 'So You Want To Learn How To Write', 3),
('Intermediate College Writing', '102', 'So You Still Like Writing', 3),
('Intro To Programming', '121', 'Programming For Noobs', 3),
('Calculus 3', '250', 'Vector Calculus', 4),
('Intro To Database Systems', '332', 'Database Systems', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `section_number` decimal(10,0) NOT NULL,
  `classroom` varchar(10) DEFAULT NULL,
  `meeting_days` varchar(11) DEFAULT NULL,
  `start_time` decimal(4,0) DEFAULT NULL,
  `end_time` decimal(4,0) DEFAULT NULL,
  `seats_available` int(11) DEFAULT NULL,
  `course_number` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`section_number`, `classroom`, `meeting_days`, `start_time`, `end_time`, `seats_available`, `course_number`) VALUES
('1', 'UH-123', 'MoWe', '800', '1000', 12, '101'),
('1', 'CS-102', 'MoWe', '900', '1100', 0, '121'),
('1', 'MH-123', 'MoWe', '800', '1000', 2, '250'),
('1', 'CS-301', 'MoWe', '1200', '1400', 0, '332'),
('2', 'UH-123', 'TuTh', '800', '1000', 4, '101'),
('2', 'MH-123', 'TuTh', '800', '1000', 0, '250');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `name` varchar(15) DEFAULT NULL,
  `department_number` decimal(10,0) NOT NULL,
  `telephone_number` decimal(10,0) DEFAULT NULL,
  `office_location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`name`, `department_number`, `telephone_number`, `office_location`) VALUES
('Math', '2', '4423911', 'MH-422'),
('Comp Sci', '4', '4423910', 'CS-522');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_records`
--

CREATE TABLE `enrollment_records` (
  `grade` varchar(2) DEFAULT NULL,
  `cwid` decimal(9,0) NOT NULL,
  `section_number` decimal(10,0) NOT NULL,
  `course_number` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_records`
--

INSERT INTO `enrollment_records` (`grade`, `cwid`, `section_number`, `course_number`) VALUES
('A', '111324', '1', '101'),
('B-', '229000', '1', '101'),
('A-', '111324', '1', '121'),
('A-', '146338', '1', '121'),
('B+', '176328', '1', '121'),
('A+', '194623', '1', '121'),
('A', '287438', '1', '121'),
('A-', '183345', '1', '250'),
('B', '229000', '1', '250'),
('C', '276128', '1', '250'),
('B+', '111324', '1', '332'),
('A+', '176328', '1', '332'),
('C', '194623', '1', '332'),
('B', '276128', '1', '332'),
('B-', '146338', '2', '101'),
('A', '183345', '2', '101'),
('B', '276128', '2', '101'),
('D', '146338', '2', '250'),
('F', '194623', '2', '250'),
('A-', '287438', '2', '250');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite_of`
--

CREATE TABLE `prerequisite_of` (
  `course_number` decimal(10,0) NOT NULL,
  `prerequisite_of_course_number` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite_of`
--

INSERT INTO `prerequisite_of` (`course_number`, `prerequisite_of_course_number`) VALUES
('101', '102'),
('121', '332');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `social_security_number` decimal(9,0) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `telephone_number` decimal(10,0) DEFAULT NULL,
  `sex` enum('M','F') DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`social_security_number`, `first_name`, `last_name`, `telephone_number`, `sex`, `title`, `salary`, `address`) VALUES
('124577', 'Jon', 'Snow', '5724365', 'M', 'Dr.', 100000, '122 N Wall St'),
('144667', 'Jamie', 'Lannister', '2714975', 'M', 'Mr.', 85000, '1482 N Dyer St'),
('154637', 'Trevor', 'Whittaker', '3304975', 'M', 'Dr.', 80000, '421 S Hawk St');

-- --------------------------------------------------------

--
-- Table structure for table `professors_degrees`
--

CREATE TABLE `professors_degrees` (
  `degree` varchar(30) DEFAULT NULL,
  `social_security_number` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors_degrees`
--

INSERT INTO `professors_degrees` (`degree`, `social_security_number`) VALUES
('Computer Science', '124577'),
('Math', '144667'),
('English', '154637');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `cwid` decimal(9,0) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `area_code` decimal(3,0) DEFAULT NULL,
  `phone_number` decimal(7,0) DEFAULT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip_code` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`cwid`, `first_name`, `last_name`, `area_code`, `phone_number`, `address`, `city`, `state`, `zip_code`) VALUES
('111324', 'Brendon', 'Price', '616', '4297555', '133 W Bear Ave', 'Fullerton', 'CA', '92831'),
('146338', 'Jen', 'Fisher', '616', '2838127', '23 S Trail St', 'Fullerton', 'CA', '92831'),
('176328', 'Sansa', 'Stark', '616', '2838127', '723 W Town St', 'Fullerton', 'CA', '92831'),
('183345', 'Josh', 'Miller', '616', '2838127', '536 N King Ave', 'Fullerton', 'CA', '92831'),
('194623', 'Arya', 'Stark', '616', '2837419', '723 W Town St', 'Fullerton', 'CA', '92831'),
('229000', 'Russel', 'Lively', '616', '8435892', '233 E Park St', 'Fullerton', 'CA', '92831'),
('276128', 'Bran', 'Stark', '616', '2838127', '723 W Town St', 'Fullerton', 'CA', '92831'),
('287438', 'Tony', 'Stark', '616', '2838127', '1673 E Sunflower St', 'Fullerton', 'CA', '92831');

-- --------------------------------------------------------

--
-- Table structure for table `taught_by`
--

CREATE TABLE `taught_by` (
  `social_security_number` decimal(9,0) DEFAULT NULL,
  `section_number` decimal(10,0) NOT NULL,
  `course_number` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taught_by`
--

INSERT INTO `taught_by` (`social_security_number`, `section_number`, `course_number`) VALUES
('124577', '1', '121'),
('124577', '1', '332'),
('144667', '1', '250'),
('144667', '2', '250'),
('154637', '1', '101'),
('154637', '2', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chairperson_of`
--
ALTER TABLE `chairperson_of`
  ADD PRIMARY KEY (`department_number`,`social_security_number`),
  ADD KEY `Social_Security_Number` (`social_security_number`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_number`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`section_number`,`course_number`),
  ADD KEY `Course_No` (`course_number`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_number`);

--
-- Indexes for table `enrollment_records`
--
ALTER TABLE `enrollment_records`
  ADD PRIMARY KEY (`section_number`,`course_number`,`cwid`),
  ADD KEY `CWID` (`cwid`);

--
-- Indexes for table `prerequisite_of`
--
ALTER TABLE `prerequisite_of`
  ADD PRIMARY KEY (`course_number`,`prerequisite_of_course_number`),
  ADD KEY `Prereq_of_Course_No` (`prerequisite_of_course_number`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`social_security_number`);

--
-- Indexes for table `professors_degrees`
--
ALTER TABLE `professors_degrees`
  ADD PRIMARY KEY (`social_security_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`cwid`);

--
-- Indexes for table `taught_by`
--
ALTER TABLE `taught_by`
  ADD PRIMARY KEY (`section_number`,`course_number`),
  ADD KEY `Social_Security_Number` (`social_security_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chairperson_of`
--
ALTER TABLE `chairperson_of`
  ADD CONSTRAINT `chairperson_of_ibfk_1` FOREIGN KEY (`department_number`) REFERENCES `departments` (`department_number`),
  ADD CONSTRAINT `chairperson_of_ibfk_2` FOREIGN KEY (`Social_Security_Number`) REFERENCES `professors` (`Social_Security_Number`);

--
-- Constraints for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD CONSTRAINT `course_sections_ibfk_1` FOREIGN KEY (`course_number`) REFERENCES `courses` (`course_number`);

--
-- Constraints for table `enrollment_records`
--
ALTER TABLE `enrollment_records`
  ADD CONSTRAINT `enrollment_records_ibfk_1` FOREIGN KEY (`CWID`) REFERENCES `students` (`CWID`),
  ADD CONSTRAINT `enrollment_records_ibfk_2` FOREIGN KEY (`section_number`,`course_number`) REFERENCES `course_sections` (`section_number`, `course_number`);

--
-- Constraints for table `prerequisite_of`
--
ALTER TABLE `prerequisite_of`
  ADD CONSTRAINT `prerequisite_of_ibfk_1` FOREIGN KEY (`course_number`) REFERENCES `courses` (`course_number`),
  ADD CONSTRAINT `prerequisite_of_ibfk_2` FOREIGN KEY (`prerequisite_of_course_number`) REFERENCES `courses` (`course_number`);

--
-- Constraints for table `professors_degrees`
--
ALTER TABLE `professors_degrees`
  ADD CONSTRAINT `professors_degrees_ibfk_1` FOREIGN KEY (`Social_Security_Number`) REFERENCES `professors` (`Social_Security_Number`);

--
-- Constraints for table `taught_by`
--
ALTER TABLE `taught_by`
  ADD CONSTRAINT `taught_by_ibfk_1` FOREIGN KEY (`Social_Security_Number`) REFERENCES `professors` (`Social_Security_Number`),
  ADD CONSTRAINT `taught_by_ibfk_2` FOREIGN KEY (`section_number`,`course_number`) REFERENCES `course_sections` (`section_number`, `course_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
