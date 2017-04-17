-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 09:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lalbus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `route`) VALUES
(1, 'চৈতালি', 'মিরপুর-১২'),
(2, 'বৈশাখী', 'কচুক্ষেত'),
(3, 'তরঙ্গ', 'মোহাম্মদপুর / জাপান গার্ডেন'),
(4, 'ক্ষণিকা', 'টঙ্গী/গাজীপুর'),
(5, 'শ্রাবণ', 'মুগদাপাড়া'),
(6, 'ঈশা খাঁ', 'মেঘনা ঘাট'),
(7, 'ফাল্গুনী', 'বাড্ডা / গুলশান'),
(8, 'হেমন্ত', 'নবীনগর (সাভার)'),
(9, 'উল্লাস', 'পোস্তগোলা'),
(10, 'আনন্দ', 'নারায়ণগঞ্জ'),
(11, 'মৈত্রী', 'আদমজী আইটি স্কুল'),
(12, 'কিঞ্চিৎ', 'কমলাপুর'),
(13, 'বসন্ত ', 'রামপুরা '),
(14, 'উয়ারী বটেশ্বর', 'নরসিংদী / ইটাখোলা');

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`id`, `name`, `short_name`) VALUES
(1, 'Department of Bengali', 'BNG'),
(2, 'Department of English', 'ENG'),
(3, 'Department of Arabic', 'ARB'),
(4, 'Department of Persian Language and Literature', 'PERS'),
(5, 'Department of Urdu', 'UPS'),
(6, 'Department of Sanskrit', 'SPL'),
(7, 'Department of Pali and Buddhist Studies', 'PBS'),
(8, 'Department of History', 'HIS'),
(9, 'Department of Philosophy', 'PHI'),
(10, 'Department of Islamic Studies', 'IST'),
(11, 'Department of Islamic History & Culture', 'IHC'),
(12, 'Department of Information Science and Library Management', 'LIS'),
(13, 'Department of Theatre and Performance Studies', 'TMU'),
(14, 'Department of Linguistics', 'LIN'),
(15, 'Department of Music', 'DMUSIC'),
(16, 'Department of World Religions and Culture', 'WRC'),
(17, 'Department of Dance', 'DDANCE'),
(18, 'Department of Physics', 'PHY'),
(19, 'Department of Mathematics', 'MAT'),
(20, 'Department of Chemistry', 'CHM'),
(21, 'Department of Statistics', 'STA'),
(22, 'Department of Theoretical Physics', 'TPHY'),
(23, 'Department of Biomedical Physics & Technology', 'BIOPHY'),
(24, 'Department of Applied Mathematics', 'APMAT'),
(25, 'Department of Law', 'LAW'),
(26, 'Department of Management', 'MAN'),
(27, 'Department of Accounting & Information Systems', 'AIS'),
(28, 'Department of Marketing', 'MRK'),
(29, 'Department of Finance', 'FIN'),
(30, 'Department of Banking and Insurance', 'BAN'),
(31, 'Department of Management Information Systems (MIS)', 'MIS'),
(32, 'Department of International Business', 'INTBS'),
(33, 'Department of Tourism and Hospitality Management', 'BSTHM'),
(34, 'Department of Organization Strategy and Leadership', 'OSL'),
(35, 'Department of Soil, Water & Environment', 'SWE'),
(36, 'Department of Botany', 'BOT'),
(37, 'Department of Zoology', 'ZOO'),
(38, 'Department of Biochemistry and Molecular Biology', 'BMB'),
(39, 'Department of Psychology', 'PSY'),
(40, 'Department of Microbiology', 'MBI'),
(41, 'Department of Fisheries', 'AQF'),
(42, 'Department of Clinical Psychology', 'CPS'),
(43, 'Department of Genetic Engineering and Bio-Technology', 'GEB'),
(44, 'Department of Educational and Counselling Psychology', 'ECP'),
(45, 'Department of Economics', 'ECO'),
(46, 'Department of Political Science', 'PSC'),
(47, 'Department of International Relations', 'IRL'),
(48, 'Department of Sociology', 'SOC'),
(49, 'Department of Mass Communication & Journalism', 'MCJ'),
(50, 'Department of Public Administration', 'PUB'),
(51, 'Department of Anthropology', 'ANT'),
(52, 'Department of Population Sciences', 'POPS'),
(53, 'Department of Peace and Conflict Studies', 'PCE'),
(54, 'Department of Women and Gender Studies', 'WGS'),
(55, 'Department of Development Studies', 'DVS'),
(56, 'Department of Television, Film and Photography', 'TFP'),
(57, 'Department of Criminology', 'CLG'),
(58, 'Department of Communication Disorders', 'COMD'),
(59, 'Department of Printing and Publication Studies', 'DPUB'),
(60, 'Department of Pharmaceutical Chemistry', 'PHCM'),
(61, 'Department of Clinical Pharmacy and Pharmacology', 'CPP'),
(62, 'Department of Pharmaceutical Technology', 'PTCH'),
(63, 'Department of Pharmacy', 'PHAR'),
(64, 'Department of Geography & Environment', 'GEN'),
(65, 'Department of Geology', 'GLG'),
(66, 'Department of Oceanography', 'OCG'),
(67, 'Department of Disaster Science and Management', 'DSM'),
(68, 'Department of Meteorology', 'DEMET'),
(69, 'Department of Electrical and Electronic Engineering', 'EEE'),
(70, 'Department of Applied Chemistry & Chemical Engineering', 'ACCE'),
(71, 'Department of Computer Science and Engineering', 'CSE'),
(72, 'Department of Nuclear Engineering', 'NE'),
(73, 'Department of Robotics and Mechatronics Engineering', 'RME'),
(74, 'Department of Drawing and Painting', 'DDP'),
(75, 'department of graphic design', 'GDESIGN'),
(76, 'Department of Printmaking', 'DPMK'),
(77, 'Department of Oriental Art', 'OARTS'),
(78, 'Department of Ceramics', 'DCER'),
(79, 'Department of Sculpture', 'DSCULP'),
(80, 'Department of Craft', 'DCRAFT'),
(81, 'Department of History of Arts', 'HIARTS'),
(82, 'Institute of Statistical Research and Training', 'ISRT'),
(83, 'Institute of Education and Research', 'IER'),
(84, 'Institute of Business Administration', 'IBA'),
(85, 'Institute of Nutrition and Food Science', 'INFS'),
(86, 'Institute of Social Welfare and Research', 'ISWR'),
(87, 'Institute of Modern Languages', 'IML'),
(88, 'Institute of Information Technology', 'IIT'),
(89, 'Institute of Renewable Energy', 'IRE'),
(90, 'Institute of Disaster Management and Vulnerability Studies', 'IDMV'),
(91, 'Institute of Leather Engineering & Technology', 'ILET'),
(92, 'Institute of Health Economics', 'IHE'),
(93, 'Confucius Institute', 'CIST');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `trip_type` int(11) NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endpoint` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bus_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `bus_id`, `trip_type`, `time`, `endpoint`, `driver`, `bus_number`, `comment`) VALUES
(1, 14, 0, '07.10 am ', 'নরসিংদী / ইটাখোলা ', '', '', ''),
(3, 8, 0, '6.20am', 'Nabinogor', '', '', ''),
(4, 1, 0, '6.40am', 'Mirpur-12', 'Shamim', '1324', ''),
(5, 1, 0, '6.40am', 'Mirpur-12', 'Rokibul Hasan', '6199 ', ''),
(6, 1, 0, '7.30am', 'Mirpur-12', 'Salam', '5992', ''),
(7, 1, 0, '7.30am', 'Mirpur-12', 'Aziz', '1391', ''),
(8, 1, 0, '8.30am', 'Mirpur-12', 'Kawser', '1329', ''),
(9, 1, 0, '8.30am', 'Mirpur-12', 'Motaleb', '6042', ''),
(10, 1, 0, '9.50am', 'Mirpur-12', 'Robiul', '1271', ''),
(11, 1, 0, '9.50am', 'Mirpur-12', 'Rokibul Hasan', '6199', ''),
(12, 1, 1, '12:30pm', 'Mirpur-12', 'Salam Junior', '5993', ''),
(13, 1, 1, '1:15pm', 'Mirpur-12', 'Rokibul Hasan', '6199', ''),
(14, 1, 1, '2:10pm', 'Mirpur-12', 'Aziz', '1391', ''),
(15, 1, 1, '3:20pm', 'Mirpur-12', 'Robiul', '1271', ''),
(16, 1, 1, '4:30pm', 'Mirpur-12', 'Kawser', '1329', ''),
(17, 1, 1, '5:00pm', 'Mirpur-12', 'Motaleb', '6042', ''),
(18, 1, 1, '5:30pm', 'Mirpur-12', 'Salam', '5992', ''),
(19, 2, 0, '6.35am', 'Kochukhet', '', '', ''),
(20, 2, 0, '6.50am', 'Kochukhet', '', '', ''),
(21, 2, 0, '7.30am', 'Kochukhet', '', '', ''),
(22, 2, 0, '8.00am', 'Kochukhet', '', '', ''),
(23, 2, 0, '9.00am', 'Kochukhet', '', '', ''),
(24, 2, 0, '9.45am', 'Kochukhet', '', '', ''),
(25, 2, 1, '12.20pm', 'Kochukhet', '', '', ''),
(26, 2, 1, '1.10pm', 'Kochukhet', '', '', ''),
(27, 2, 1, '2.20pm', 'Kochukhet', '', '', ''),
(28, 2, 1, '3.30pm', 'Kochukhet', '', '', ''),
(29, 2, 1, '4.30pm', 'Kochukhet', '', '', ''),
(30, 2, 1, '5.30pm', 'Kochukhet', '', '', ''),
(31, 3, 0, '7.00am', 'Mohammadpur', '', '', ''),
(32, 3, 0, '7.30am', 'মৈত্রী কাউন্টার', '', '', ''),
(33, 3, 0, '8.00am', 'মৈত্রী কাউন্টার', '', '', ''),
(34, 3, 0, '8.30am', 'Mohammadpur', '', '', 'Single Decker'),
(35, 3, 0, '9.00am', 'Mohammadpur', '', '', ''),
(36, 3, 0, '10.00am', 'Mohammadpur', '', '', ''),
(37, 3, 1, '12.15pm', 'Mohammadpur', '', '', ''),
(38, 3, 1, '1.30pm', 'Mohammadpur', '', '', ''),
(39, 3, 1, '2.30pm', 'Mohammadpur', '', '', ''),
(40, 3, 1, '3.30pm', 'Mohammadpur', '', '', 'Single Decker'),
(41, 3, 1, '4.30pm', 'Mohammadpur', '', '', ''),
(42, 3, 1, '5.00pm', 'Mohammadpur', '', '', ''),
(43, 3, 1, '5.30pm', 'Mohammadpur', '', '', ''),
(44, 4, 0, '5.55am', 'Shibbari', '', 'DU Bus', ''),
(45, 4, 0, '6.20am', 'CollegeGate', '', '0755', ''),
(46, 4, 0, '6.30am', 'Shibbari', '', '6057', ''),
(47, 4, 0, '6.35am', 'CollegeGate', '', '5817', ''),
(48, 4, 0, '7.00am', 'CollegeGate', '', '6221', ''),
(49, 4, 0, '7.30am', 'CollegeGate', '', '6124', ''),
(50, 4, 0, '8.30am', 'CollegeGate', '', '5020', 'Single Decker'),
(51, 4, 0, '9.30am', 'CollegeGate', '', '6116', ''),
(52, 4, 1, '12.10pm', 'CollegeGate', '', '6221', ''),
(53, 4, 1, '1.00pm', 'CollegeGate', '', '6116', 'Starts from TSC'),
(54, 4, 1, '1.10pm', 'CollegeGate', '', '0755', ''),
(55, 4, 1, '1.50pm', 'CollegeGate', '', '5817', ''),
(56, 4, 1, '2.20pm', 'Gazipur', '', '6057', ''),
(57, 4, 1, '3.30pm', 'CollegeGate', '', '5800', ''),
(58, 4, 1, '4.15pm', 'CollegeGate', '', '5020', 'Single Decker'),
(59, 4, 1, '5.00pm', 'Gazipur', '', '6124', ''),
(60, 4, 1, '5.30pm', 'CollegeGate', '', '6221', ''),
(61, 5, 0, '7.20am', 'Mugda Stadium', '', 'Double Decker', ''),
(62, 5, 0, '7.20am', 'Bouddho Mondir', '', 'Single Decker', ''),
(63, 5, 0, '8.15am', 'Mugda Stadium', '', 'Double Decker', ''),
(64, 5, 0, '8.15am', 'Bouddho Mondir', '', 'Single Decker', ''),
(65, 5, 0, '9.00am', 'Mugda Stadium', '', 'Double Decker', ''),
(66, 5, 0, '9.00am', 'Bouddho Mondir', '', 'Single Decker', ''),
(67, 5, 0, '10.00am', 'Mugda Stadium', '', 'Double Decker', ''),
(68, 5, 1, '12.05pm', 'VC Chottor', '', 'Double Decker', ''),
(69, 5, 1, '1.30pm', 'TSC', '', 'Double Decker', ''),
(70, 5, 1, '2.20pm', 'VC Chottor', '', 'Double Decker', ''),
(71, 5, 1, '3.40pm', 'TSC', '', 'Double Decker', ''),
(72, 5, 1, '4.30pm', 'TSC', '', 'Double Decker', ''),
(73, 5, 1, '5.20pm', 'TSC', '', 'Double Decker', ''),
(74, 6, 0, '6.40am', 'Meghna ', '', 'Single Decker', 'Stops at Mall Chattar'),
(75, 6, 0, '7.10am', 'Signboard', '', 'Single Decker', 'Stops at Mall Chattar'),
(76, 6, 0, '7.40am', 'Meghna', '', 'Double Decker', 'Stops at Mall Chattar'),
(77, 6, 0, '8.00am', 'Meghna', '', 'Single Decker', 'Stops at Mall Chattar'),
(78, 6, 0, '9.00am', 'Kachpur', '', 'Double Decker', 'Stops at VC Chattar'),
(79, 6, 0, '10.00am', 'Kachpur', '', 'Single Decker', 'Stops at  Mall Chattar'),
(80, 6, 0, '10.05am', 'Kachpur', '', 'Single Decker', 'Stops at Mall Chattar'),
(81, 6, 1, '1.15pm', 'Meghna', '', 'Double Decker', 'Starts from VC Chattar'),
(82, 6, 1, '2.30pm', 'Kachpur', '', 'Single Decker', 'Starts from Mall Chattar'),
(83, 6, 1, '4.10pm', 'Kachpur', '', 'Double Decker', 'Starts from Mall Chattar'),
(84, 6, 1, '5.05pm', 'Meghna', '', 'Single Decker', 'Starts from Mall Chattar'),
(85, 6, 1, '5.15pm', 'Meghna', '', 'Double Decker', 'Starts from VC Chattar'),
(86, 7, 0, '6.45am', 'Badda/Gulshan', '', '', ''),
(87, 7, 0, '7.45am', 'Badda/Gulshan', '', '', ''),
(88, 7, 0, '8.40am', 'Badda/Gulshan', '', '', ''),
(89, 7, 1, '1.10pm', 'Badda/Gulshan', '', '', ''),
(90, 7, 1, '4.10pm', 'Badda/Gulshan', '', '', ''),
(91, 7, 1, '5.05pm', 'Badda/Gulshan', '', '', ''),
(92, 8, 0, '7.00am ', 'Nabinogor', '', '', ''),
(93, 8, 0, '8.00am', 'Nabinogor', '', '', ''),
(94, 8, 1, '1.10pm', 'Nabinogor', '', '', 'Starts from Mall Chattar'),
(95, 8, 1, '3.10pm', 'Nabinogor', '', '', 'Starts from Mall Chattar'),
(96, 8, 1, '5.10pm', 'Nabinogor', '', '', 'Starts from Curzon Hall'),
(97, 9, 0, '7.00am', 'Postogola', '', '', ''),
(98, 9, 0, '8.00am', 'Dholaipar', '', '', ''),
(99, 9, 0, '8.00am', 'Postogola', '', '', ''),
(100, 9, 0, '9.00am', 'Postogola', '', '', ''),
(101, 9, 0, '9.35am', 'Postogola', '', '', ''),
(102, 9, 0, '10.00am', 'Postogola', '', '', ''),
(103, 9, 1, '12.10pm', 'Postogola Cantonment', '', '', 'Starts from VC Chottor'),
(104, 9, 1, '1.10pm', 'Postogola Cantonment', '', '', 'Starts from TSC'),
(105, 9, 1, '2.10pm', 'Postogola Cantonment', '', '', 'Starts from VC Chottor'),
(106, 9, 1, '3.10', 'Postogola Cantonment', '', '', 'Starts from VC Chottor'),
(107, 9, 1, '4.10pm', 'Postogola Cantonment', '', '', 'Starts from VC Chottor'),
(108, 9, 1, '5.10pm', 'Postogola Cantonment', '', '', 'Starts from VC Chottor'),
(109, 10, 0, '6.50am', 'Narayanganj', '', 'DU Bus', ''),
(110, 10, 0, '7.50am', 'Narayanganj', '', 'BRTC', ''),
(111, 10, 0, '8.50am', 'Narayanganj', '', 'DU Bus', ''),
(112, 10, 1, '1.05pm', 'Narayanganj', '', 'DU Bus', ''),
(113, 10, 1, '2.30pm', 'Narayanganj', '', 'DU Bus', ''),
(114, 10, 1, '4.05pm', 'Narayanganj', '', 'BRTC', ''),
(115, 10, 1, '5.10pm', 'Narayanganj', '', 'BRTC', ''),
(116, 11, 0, '6.35am', 'IIT School', '', 'Double Decker', 'Stops at VC Chottor'),
(117, 11, 0, '7.15am', 'IIT School', '', 'Double Decker', 'Stops at VC Chottor'),
(118, 11, 0, '8.00am', 'Chittagong Road', '', 'Staff Bus', 'Stops at VC Chottor'),
(119, 11, 0, '8.35am', 'IIT School', '', 'Single Decker', 'Stops at Mall Chottor'),
(120, 11, 1, '1.10pm', 'IIT School', '', 'Single Decker', 'Starts from Mall Chottor'),
(121, 11, 1, '3.10pm', 'IIT School', '', 'Double Decker', 'Starts from VC Chottor'),
(122, 11, 1, '5.05pm', 'Chittagong Road', '', 'Staff Bus', 'Starts from VC Chottor'),
(123, 11, 1, '5.15pm', 'IIT School', '', 'Double Decker', 'Starts from VC Chottor'),
(124, 12, 0, '7.00am', 'Arambagh', '', '', 'Stops before VC Chottor'),
(125, 12, 0, '8.00am', 'Arambagh', '', '', ''),
(126, 12, 0, '8.50am', 'Arambagh', '', '', ''),
(127, 12, 0, '9.50am', 'Arambagh', '', '', ''),
(128, 12, 1, '12.30pm', 'Arambagh', '', '', ''),
(129, 12, 1, '1.45pm', 'Arambagh', '', '', 'Stops before VC Chottor'),
(130, 12, 1, '3.10pm', 'Arambagh', '', '', ''),
(131, 12, 1, '4.10pm', 'Arambagh', '', '', ''),
(132, 12, 1, '5.10pm', 'Arambagh', '', '', ''),
(133, 13, 0, '7.00am', 'Rampura TV Centre', '', '1324', ''),
(134, 13, 0, '7.50am', 'Rampura TV Centre', '', '5973', ''),
(135, 13, 0, '8.40am', 'Rampura TV Centre', '', '6071', ''),
(136, 13, 0, '10.00am', 'Rampura TV Centre', '', '5973', ''),
(137, 13, 1, '12.15pm', 'Rampura TV Centre', '', '5974', ''),
(138, 13, 1, '1.30pm', 'Rampura TV Centre', '', '5992', ''),
(139, 13, 1, '2.35pm', 'Rampura TV Centre', '', '6042', ''),
(140, 13, 1, '3.45pm', 'Rampura TV Centre', '', '5973', ''),
(141, 13, 1, '5.10pm', 'Rampura TV Centre', '', '6199', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mob_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `reg_no`, `mob_no`, `email`, `password`, `dept_id`, `status`, `code`, `url`, `level`) VALUES
(1, 'Fahim', '2013-312-035', '01521430883', 'fahim6119@gmail.com', 'fahim', 20, 0, '123456', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
