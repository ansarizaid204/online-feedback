-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 11:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `mob` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`, `email`, `mob`) VALUES
('Mr Admin', 'admin', 'admin', 'admin@gmail.com', '8097180311');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(2) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'theory'),
(2, 'mcq'),
(3, 'tw'),
(4, 'pr');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(5) NOT NULL,
  `dept_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Computer'),
(2, 'Mechanical'),
(3, 'Civil'),
(4, 'Electrical'),
(5, 'Electronics & Communication'),
(6, 'Humanity & Science');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `sub_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `r_1` int(11) NOT NULL,
  `r_2` int(11) NOT NULL,
  `r_3` int(11) NOT NULL,
  `r_4` int(11) NOT NULL,
  `r_5` int(11) NOT NULL,
  `r_6` int(11) NOT NULL,
  `r_7` int(11) NOT NULL,
  `r_8` int(11) NOT NULL,
  `r_9` int(11) NOT NULL,
  `r_10` int(11) NOT NULL,
  `flag` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(5) NOT NULL,
  `sem_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(1, '1st Sem'),
(2, '2nd sem'),
(3, '3rd sem'),
(4, '4th sem'),
(5, '5th sem'),
(6, '6th sem');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(2) NOT NULL,
  `s_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_name`) VALUES
(0, 'Not Active'),
(1, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `stud_id` int(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `enr_no` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `sem_id` int(5) NOT NULL,
  `shift` int(1) NOT NULL DEFAULT '1',
  `s_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sem_id` int(5) NOT NULL DEFAULT '5',
  `dept_id` int(5) NOT NULL DEFAULT '4',
  `t_id` int(5) NOT NULL,
  `c_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sem_id`, `dept_id`, `t_id`, `c_id`) VALUES
(1, 'English', 1, 1, 0, 1),
(2, 'Basic Science (Physics)', 1, 1, 0, 1),
(3, 'Basic Science (Chemistry)', 1, 1, 0, 1),
(4, 'Basic Mathematics ', 1, 1, 0, 1),
(5, 'Engineering Graphics', 1, 1, 0, 1),
(6, 'Computer Fundamentals', 1, 1, 0, 1),
(7, 'Basic Workshop Practice (Computer\nGroup) ', 1, 1, 0, 1),
(8, 'Communication Skills', 2, 1, 61, 1),
(9, 'Applied Science(Physics)', 2, 1, 59, 1),
(10, 'Applied Science(Chemistry)', 2, 1, 68, 1),
(11, 'Programming in ‘C’', 2, 1, 73, 1),
(12, 'Basic Electronics', 2, 1, 50, 1),
(13, 'Engineering Mathematics', 2, 1, 92, 1),
(14, 'Development of Life Skills', 2, 1, 0, 1),
(15, 'Web Page Designing', 2, 1, 3, 1),
(16, 'Applied Mathematics ', 3, 1, 0, 1),
(17, 'Data Structure Using C', 3, 1, 0, 1),
(18, 'Electrical Technology ', 3, 1, 0, 1),
(19, 'Relational Database Management System', 3, 1, 0, 1),
(20, 'Digital Techniques', 3, 1, 0, 1),
(21, 'Graphical User Interface (GUI) Programming ', 3, 1, 0, 1),
(22, 'Professional Practices-I ', 3, 1, 0, 1),
(23, 'Environmental Studies', 4, 1, 0, 1),
(24, 'Computer Hardware & Maintenance ', 4, 1, 0, 1),
(25, 'Computer Network ', 4, 1, 0, 1),
(26, 'Microprocessor and Programming', 4, 1, 0, 1),
(27, 'Object Oriented Programming', 4, 1, 0, 1),
(28, 'Computer Graphics ', 4, 1, 0, 1),
(29, 'Professional Practices-II ', 4, 1, 0, 1),
(30, 'Operating System ', 5, 1, 0, 1),
(31, 'Software Engineering ', 5, 1, 0, 1),
(32, 'Computer Security', 5, 1, 0, 1),
(33, 'Java Programming', 5, 1, 0, 1),
(34, 'Behavioural Science', 5, 1, 0, 1),
(35, 'Windows Programming Using VC++ ', 5, 1, 0, 1),
(36, 'Network Management and Administration', 5, 1, 0, 1),
(37, 'Professional Practices - III', 5, 1, 0, 1),
(38, 'Management ', 6, 1, 27, 2),
(39, 'Software Testing ', 6, 1, 6, 1),
(40, 'Advanced Java Programming', 6, 1, 7, 2),
(41, 'Advanced Microprocessor ', 6, 1, 8, 1),
(42, 'Linux Programming', 6, 1, 2, 4),
(43, 'Entrepreneurship Development', 6, 1, 4, 3),
(44, 'English', 1, 2, 0, 1),
(45, 'Basic Science (Physics)', 1, 2, 0, 1),
(46, 'Basic Science (Chemistry)', 1, 2, 0, 1),
(47, 'Basic Mathematics ', 1, 2, 0, 1),
(48, 'Engineering Graphics', 1, 2, 0, 1),
(49, 'Computer Fundamentals', 1, 2, 0, 1),
(50, 'Communication Skill', 2, 2, 93, 1),
(51, 'Applied Science (Physics)', 2, 2, 65, 1),
(52, 'Applied Science (Chemistry)', 2, 2, 97, 1),
(53, 'Engineering Mechanics', 2, 2, 102, 1),
(54, 'Engineering Drawing', 2, 2, 60, 1),
(55, 'Engineering Mathematics', 2, 2, 55, 1),
(56, 'Development of Life Skills ', 2, 2, 0, 1),
(57, 'Workshop Practice', 2, 2, 18, 1),
(58, 'Basic Workshop Practice (Mechanical)', 1, 2, 0, 1),
(59, 'Applied Mathematics', 3, 2, 0, 1),
(60, 'Basic Electronics & Mechatronics', 3, 2, 0, 1),
(61, 'Mechanical Engineering Materials ', 3, 2, 0, 1),
(62, 'Strength of Materials ', 3, 2, 0, 1),
(63, 'Mechanical Engineering Drawing', 3, 2, 0, 1),
(64, 'Computer Aided Drafting ', 3, 2, 0, 1),
(65, 'Professional Practices-I ', 3, 2, 0, 1),
(66, 'Environmental Studies', 4, 2, 0, 1),
(67, 'Manufacturing Processes', 4, 2, 0, 1),
(68, 'Electrical Engineering ', 4, 2, 0, 1),
(69, 'Thermal Engineering ', 4, 2, 0, 1),
(70, 'Fluid Mechanics & Machinery', 4, 2, 0, 1),
(71, 'Theory of Machines ', 4, 2, 0, 1),
(72, 'Professional Practices-II', 4, 2, 0, 1),
(73, 'Automobile Engineering ', 5, 2, 0, 1),
(74, 'Advanced Manufacturing Processes ', 5, 2, 0, 1),
(75, 'Measurement & Control ', 5, 2, 0, 1),
(76, 'Power Engineering', 5, 2, 0, 1),
(77, 'Metrology and Quality Control ', 5, 2, 0, 1),
(78, 'Behavioural Science ', 5, 2, 0, 1),
(79, 'CNC Machines ', 5, 2, 0, 1),
(80, 'Professional Practices - III', 5, 2, 0, 1),
(81, 'English', 1, 3, 0, 1),
(82, 'Basic Science (Physics)', 1, 3, 0, 1),
(83, 'Basic Science (Chemistry)', 1, 3, 0, 1),
(84, 'Basic Mathematics ', 1, 3, 0, 1),
(85, 'Engineering Graphics', 1, 3, 0, 1),
(86, 'Computer Fundamentals', 1, 3, 0, 1),
(87, 'Basic Workshop Practice (Civil Group)', 1, 3, 0, 1),
(88, 'Communication Skills ', 2, 3, 51, 1),
(89, 'Engineering Mechanics ', 2, 3, 64, 1),
(90, 'Applied Science(Physics)', 2, 3, 58, 1),
(91, 'Applied Science (Checmistry)', 2, 3, 95, 1),
(92, 'Construction Materials ', 2, 3, 35, 1),
(93, 'Engineering Mathematics', 2, 3, 0, 1),
(94, 'Development of Life Skills', 2, 3, 0, 1),
(95, 'Workshop Practice (Civil) ', 2, 3, 0, 1),
(96, 'Applied Mathematics ', 3, 3, 0, 1),
(97, 'Building Construction ', 3, 3, 0, 1),
(98, 'Building Drawing ', 3, 3, 0, 1),
(99, 'Surveying', 3, 3, 0, 1),
(100, 'Mechanics of Structures ', 3, 3, 0, 1),
(101, 'Professional Practices-I ', 3, 3, 0, 1),
(102, 'Environmental Studies', 4, 3, 31, 1),
(103, 'Transportation Engineering', 4, 3, 38, 1),
(104, 'Advanced Surveying ', 4, 3, 33, 1),
(105, 'Geo Technical Engineering ', 4, 3, 32, 1),
(106, 'Hydraulics ', 4, 3, 24, 1),
(107, 'Theory of Structures', 4, 3, 29, 1),
(108, 'Computer Aided Drawing', 4, 3, 0, 1),
(109, 'Professional Practices-II ', 4, 3, 0, 1),
(110, 'Estimating and Costing', 5, 3, 0, 1),
(111, 'Irrigation Engineering ', 5, 3, 0, 1),
(112, 'Public Health Engineering ', 5, 3, 0, 1),
(113, 'Concrete Technology ', 5, 3, 0, 1),
(114, 'Design of Steel Structures ', 5, 3, 0, 1),
(115, 'Behavioural Science ', 5, 3, 0, 1),
(116, 'Entrepreneurship Development ', 5, 3, 0, 1),
(117, 'Professional Practices - III', 5, 3, 0, 1),
(118, 'English', 1, 5, 0, 1),
(119, 'Basic Science (Physics)', 1, 5, 0, 1),
(120, 'Basic Science (Chemistry)', 1, 5, 0, 1),
(121, 'Basic Mathematics ', 1, 5, 0, 1),
(122, 'Engineering Graphics', 1, 5, 0, 1),
(123, 'Computer Fundamentals', 1, 5, 0, 1),
(124, 'Basic Workshop Practice (Electrical Group)', 1, 5, 0, 1),
(125, 'Communication Skills ', 2, 5, 0, 1),
(126, 'Applied Science (Physics)', 2, 5, 0, 1),
(127, 'Applied Science (Chemistry)', 2, 5, 0, 1),
(128, 'Elements of Electronics ', 2, 5, 0, 1),
(129, 'Engineering Mathematics ', 2, 5, 0, 1),
(130, 'Development of Life Skills', 2, 5, 0, 1),
(131, 'Electronic Workshop', 2, 5, 0, 1),
(132, 'Applied Mathematics', 3, 5, 0, 1),
(133, 'Electronic Instruments & Measurements ', 3, 5, 0, 1),
(134, 'Electrical Engineering ', 3, 5, 0, 1),
(135, 'Electronics Devices and Circuits ', 3, 5, 0, 1),
(136, 'Principles of Digital Techniques ', 3, 5, 0, 1),
(137, 'Programming in C ', 3, 5, 0, 1),
(138, 'Professional Practices-I ', 3, 5, 0, 1),
(139, 'Environmental Studies ', 4, 5, 0, 1),
(140, 'Industrial Measurements', 4, 5, 0, 1),
(141, 'Analog Communication ', 4, 5, 0, 1),
(142, 'Power Electronics ', 4, 5, 0, 1),
(143, 'Linear Integrated Circuits', 4, 5, 0, 1),
(144, 'Visual Basic ', 4, 5, 0, 1),
(145, 'Professional Practices-II ', 4, 5, 0, 1),
(146, 'Computer Hardware & Networking ', 5, 5, 0, 1),
(147, 'Microcontroller ', 5, 5, 0, 1),
(148, 'Digital Communication ', 5, 5, 0, 1),
(149, 'Control System & PLC ', 5, 5, 0, 1),
(150, 'Audio Video Engineering', 5, 5, 0, 1),
(151, 'Behavioural Science ', 5, 5, 0, 1),
(152, 'EDP & Project ', 5, 5, 0, 1),
(153, 'Professional Practices - III ', 5, 5, 0, 1),
(154, 'English', 1, 4, 0, 1),
(155, 'Basic Science (Physics)', 1, 4, 0, 1),
(156, 'Basic Science (Chemistry)', 1, 4, 0, 1),
(157, 'Basic Mathematics ', 1, 4, 0, 1),
(158, 'Engineering Graphics', 1, 4, 0, 1),
(159, 'Computer Fundamentals', 1, 4, 0, 1),
(160, 'Basic Workshop Practice (Electrical Group)', 1, 4, 0, 1),
(161, 'Communication Skills ', 2, 4, 51, 1),
(162, 'Applied Science (Physics)', 2, 4, 65, 1),
(163, 'Applied Science (Chemistry)', 2, 4, 68, 1),
(164, 'Elements of Electronics ', 2, 4, 42, 1),
(165, 'Engineering Mathematics ', 2, 4, 67, 1),
(166, 'Development of Life Skills', 2, 4, 0, 1),
(167, 'Electronic Workshop', 2, 4, 45, 1),
(168, 'Applied Mathematics', 3, 4, 0, 1),
(169, 'Electronic Instruments & Measurements ', 3, 4, 0, 1),
(170, 'Electrical Engineering ', 3, 4, 0, 1),
(171, 'Electronics Devices and Circuits ', 3, 4, 0, 1),
(172, 'Principles of Digital Techniques ', 3, 4, 0, 1),
(173, 'Programming in C ', 3, 4, 0, 1),
(174, 'Professional Practices-I ', 3, 4, 0, 1),
(175, 'Environmental Studies ', 4, 4, 0, 1),
(176, 'Industrial Measurements', 4, 4, 0, 1),
(177, 'Analog Communication ', 4, 4, 0, 1),
(178, 'Power Electronics ', 4, 4, 0, 1),
(179, 'Linear Integrated Circuits', 4, 4, 0, 1),
(180, 'Visual Basic ', 4, 4, 0, 1),
(181, 'Professional Practices-II ', 4, 4, 0, 1),
(182, 'Computer Hardware & Networking ', 5, 4, 0, 1),
(183, 'Microcontroller ', 5, 4, 0, 1),
(184, 'Digital Communication ', 5, 4, 0, 1),
(185, 'Control System & PLC ', 5, 4, 0, 1),
(186, 'Audio Video Engineering', 5, 4, 0, 1),
(187, 'Behavioural Science ', 5, 4, 0, 1),
(188, 'EDP & Project ', 5, 4, 0, 1),
(189, 'Professional Practices - III ', 5, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(5) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `shift` int(2) NOT NULL,
  `mob` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `t_username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `dept_id`, `shift`, `mob`, `email`, `qualification`, `t_username`, `password`) VALUES
(1, 'MS.SHAIKH SHAISTA', 0, 0, 876548769, 'shaista@gmail.com', '0', '1001', '1234'),
(2, 'MR. MUDDASIR SIRAJ MAHADIK', 1, 1, 0, '', '0', '1002', '1234'),
(3, 'Dr.FAIMIDA MUNIR SAYYED', 1, 1, 0, '', '0', '', ''),
(4, 'MR.SK. IMRAN SHAHID ABDUL RASHID', 1, 1, 0, '', '0', '', ''),
(5, 'MR. UBAID SAUDAGAR', 1, 1, 0, '', '0', '', ''),
(6, 'MR NAVID SHAIKH', 1, 1, 0, '', '0', '1006', '1234'),
(7, 'MR . ANAS DANGE', 1, 1, 0, '', '0', '', ''),
(8, 'MR . ALI KARIM SAYYED', 1, 2, 0, '', '0', '', ''),
(9, 'MR.JAMILUDDIN TALUKDAR', 2, 1, 0, '', '0', '', ''),
(10, 'MR. DESHPANDE ARUN .B', 2, 1, 0, '', '0', '', ''),
(11, 'MR.BASHEER AHMED.N.CHISHTI PEERA', 2, 1, 0, '', '0', '', ''),
(12, 'MR.ANIL MURLIDHARAN', 2, 1, 0, '', '0', '', ''),
(13, 'MR.SOHAIL N. KAZI', 2, 1, 0, '', '0', '', ''),
(14, 'MR.SAJID DESHMUKH', 2, 1, 0, '', '0', '', ''),
(15, 'MR.HRUSHIKESH. D. SAWANT', 2, 1, 0, '', '0', '', ''),
(16, 'MR.ADNAN ANSARI', 2, 1, 0, '', '0', '', ''),
(17, 'MR.SADIK ANSARI', 2, 1, 0, '', '0', '', ''),
(18, 'MR. HARUN PINJARI', 2, 1, 0, '', '0', '', ''),
(19, 'MR.AAFTAB MUKADAM', 2, 1, 0, '', '0', '', ''),
(20, 'MISS HEENA SHAIKH', 2, 1, 0, '', '0', '', ''),
(21, 'MR.ZAHIRUDDIN KHATEEB', 2, 1, 0, '', '0', '', ''),
(22, 'MR.ADNAN IQBAL SHAIKH', 2, 1, 0, '', '0', '', ''),
(23, 'MR. BABU LINGAPPA TELI', 2, 1, 0, '', '0', '', ''),
(24, 'MR. MD.MAROOF MD.NAYEEM', 2, 1, 0, '', '0', '', ''),
(25, 'MR. ASHFAQ JAMKHANDIKAR', 2, 1, 0, '', '0', '', ''),
(26, 'MR. SHAIKH WASIM', 2, 1, 0, '', '0', '', ''),
(27, 'MR MUFEED SAYYED', 2, 1, 0, '', '0', '1027', '1234'),
(28, 'MR. SYED ILYAS QADRI', 3, 1, 0, '', '0', '', ''),
(29, 'MR. MOHMMED SHOEB S.', 3, 1, 0, '', '0', '', ''),
(30, 'MR. IRFAN INNUS NALBAND', 3, 1, 0, '', '0', '', ''),
(31, 'MR. YASEEN SHAIKH', 3, 1, 0, '', '0', '', ''),
(32, 'MS. RUPALI RAJARAM BHOIR', 3, 1, 0, '', '0', '', ''),
(33, 'MR. SAYED DANISH YUNUS', 3, 1, 0, '', '0', '', ''),
(34, 'MR. MARUF M. KAZI', 3, 1, 0, '', '0', '', ''),
(35, 'MS. NOORULQURESH QURESHI', 3, 1, 0, '', '0', '', ''),
(36, 'Ms. NAZNEEN ANSARI', 3, 1, 0, '', '0', '', ''),
(37, 'MRS. ASMA PALKAR', 3, 1, 0, '', '0', '', ''),
(38, 'Mr. AHMED GAZIANI', 3, 1, 0, '', '0', '', ''),
(39, 'Mr. SHUJA AHMED', 3, 1, 0, '', '0', '', ''),
(40, 'MR. UBAID-UR-REHMAN FAYYAZUDDIN QUAZI', 3, 1, 0, '', '0', '', ''),
(41, 'MRS. URMILA BHUPESH THAKUR', 3, 1, 0, '', '0', '', ''),
(42, 'Mr. Khan Zeeshan', 4, 1, 0, '', '0', '', ''),
(43, 'Mr. Rangwala Muslim', 4, 1, 0, '', '0', '', ''),
(44, 'Mr. Choudhary Abdullah', 4, 1, 0, '', '0', '', ''),
(45, 'Mr. Shaikh Asif Ali', 4, 1, 0, '', '0', '', ''),
(46, 'Mr. Tale Rahul', 4, 1, 0, '', '0', '', ''),
(47, 'Mr. Shaikh Arif', 5, 1, 0, '', '0', '', ''),
(48, 'Mr. Khan Shujauddin', 5, 1, 0, '', '0', '', ''),
(49, 'Mr. Rajwani Imran', 5, 1, 0, '', '0', '', ''),
(50, 'Mr. Sayyed Ahsan', 5, 1, 0, '', '0', '', ''),
(51, 'Mr. Khan Aadil Idris', 5, 1, 0, '', '0', '', ''),
(52, 'Mr. Sayyed Shahid', 5, 1, 0, '', '0', '', ''),
(53, 'Mr. Faisalur Rehman', 5, 1, 0, '', '0', '', ''),
(54, 'Mr. Sayyed Ali Hasan', 5, 1, 0, '', '0', '', ''),
(55, 'MR.ABDUL NADEEM', 6, 1, 0, '', '0', '', ''),
(56, 'MRS. VIJAYA AUNDHEKAR', 6, 1, 0, '', '0', '', ''),
(57, 'MRS.BINDU PRAKASH', 6, 1, 0, '', '0', '', ''),
(58, 'MISS TUBA ANSARI', 6, 1, 0, '', '0', '', ''),
(59, 'MR.AFTAB ALAM', 6, 1, 0, '', '0', '', ''),
(60, 'MR.SAGAR RANDIVE', 6, 1, 0, '', '0', '', ''),
(61, 'MRS. WASEEMA KAZI', 6, 1, 0, '', '0', '', ''),
(62, 'MISS ZOHRA KHATOON', 6, 1, 0, '', '0', '', ''),
(63, 'MISS TASMIYA SHAIKH', 6, 1, 0, '', '0', '', ''),
(64, 'MR SAAD SHAIKH', 6, 1, 0, '', '0', '', ''),
(65, 'MR SANDESH AYARE', 6, 1, 0, '', '0', '', ''),
(66, 'MR. ARIF AHMED SHAIKH', 6, 1, 0, '', '0', '', ''),
(67, 'MR.MOIENAHMED BORITKAR', 6, 1, 0, '', '0', '', ''),
(68, 'MISS HEENA KHAN', 6, 1, 0, '', '0', '', ''),
(69, 'MISS. YASRA SONDE', 1, 1, 0, '', '0', '', ''),
(70, 'MR.ZUHAIB DATEY', 1, 2, 0, '', '0', '', ''),
(71, 'MR. UMAR FAROOQUE SHABBIR MURSAL', 1, 2, 0, '', '0', '', ''),
(72, 'MISS. SANA KHAN', 1, 2, 0, '', '0', '', ''),
(73, 'MISS. FARHEEN DABIR', 1, 2, 0, '', '0', '', ''),
(74, 'MR.AAMIR SIWANI', 2, 2, 0, '', '0', '', ''),
(75, 'MR.FAZLUR REHMAN', 2, 2, 0, '', '0', '', ''),
(76, 'MR.ASLAM PATEL', 2, 2, 0, '', '0', '', ''),
(77, 'Mr.Ashish J Tiwari', 2, 2, 0, '', '0', '', ''),
(78, 'Mr.Parvezalam Shaikh', 2, 2, 0, '', '0', '', ''),
(79, 'Mr.Syed Arif', 2, 2, 0, '', '0', '', ''),
(80, 'Mr. Naufil W. Sayyad', 3, 2, 0, '', '0', '', ''),
(81, 'Ms. Mary George', 3, 2, 0, '', '0', '', ''),
(82, 'Ms. Latika Mhaske', 3, 2, 0, '', '0', '', ''),
(83, 'Mr. Mohammed Ahmed', 3, 2, 0, '', '0', '', ''),
(84, 'Mrs. Heena Merchant', 3, 2, 0, '', '0', '', ''),
(85, 'Mr. Munawar Quraishi', 3, 2, 0, '', '0', '', ''),
(86, 'Mr. Mohammad Wasim Shaikh', 3, 2, 0, '', '0', '', ''),
(87, 'Mr. Usama Diwan', 3, 2, 0, '', '0', '', ''),
(88, 'Mr. Sakib Khan', 3, 2, 0, '', '0', '', ''),
(89, 'Mr. Shahbaz Ansari', 3, 2, 0, '', '0', '', ''),
(90, 'MRS DEEPTI PRAVIN MANDLIK', 6, 2, 0, '', '0', '', ''),
(91, 'MRS RUPALI S KHOT', 6, 2, 0, '', '0', '', ''),
(92, 'MRS.TASLEEM PATEL', 6, 2, 0, '', '0', '', ''),
(93, 'MRS. TARANUM SAYYED', 6, 2, 0, '', '0', '', ''),
(94, 'MR. HARISH SHETTY', 6, 2, 0, '', '0', '', ''),
(95, 'MR.ASLAM SHAIKH', 6, 2, 0, '', '0', '', ''),
(96, 'MR.MOHD RASHID', 6, 2, 0, '', '0', '', ''),
(97, 'MR.ASMAT KHAN', 6, 2, 0, '', '0', '', ''),
(98, 'Dr AMOL RAMESHRAO BUTE', 6, 2, 0, '', '0', '', ''),
(99, 'MR.SANDEEP WAGH', 6, 2, 0, '', '0', '', ''),
(100, 'MR,FARHAN MOOSA', 6, 2, 0, '', '0', '', ''),
(101, 'MRS.SHAHIN ANSARI', 6, 2, 0, '', '0', '', ''),
(102, 'MR TALHA ZAINUL ABID MUNSHI', 6, 2, 0, '', '0', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
