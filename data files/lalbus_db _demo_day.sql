-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2017 at 01:38 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'Choitali', 'মিরপুর-১২'),
(2, 'Boishakhi', 'কচুক্ষেত'),
(3, 'Taranga', 'মোহাম্মদপুর / জাপান গার্ডেন'),
(4, 'Khonika', 'টঙ্গী/গাজীপুর'),
(5, 'Srabon', 'মুগদাপাড়া'),
(6, 'Isha Kha', 'মেঘনা ঘাট'),
(7, 'Falguni', 'বাড্ডা / গুলশান'),
(8, 'Hemonto', 'নবীনগর (সাভার)'),
(9, 'Ullash', 'পোস্তগোলা'),
(10, 'Anando', 'নারায়ণগঞ্জ'),
(11, 'Moitri', 'আদমজী আইটি স্কুল'),
(12, 'Kinchit', 'কমলাপুর'),
(13, 'Boshonto', 'রামপুরা '),
(14, 'Uwari', 'নরসিংদী / ইটাখোলা');

-- --------------------------------------------------------

--
-- Table structure for table `bus_request`
--

CREATE TABLE `bus_request` (
  `id` int(11) NOT NULL,
  `update_type` int(11) NOT NULL DEFAULT '0',
  `old_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bus_request`
--

INSERT INTO `bus_request` (`id`, `update_type`, `old_id`, `name`, `route`, `remarks`, `user_id`, `timestamp`) VALUES
(1, 0, 1, 'Choitali', 'মিরপুর-১২', '', 1, '2017-05-07 16:12:50');

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
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`id`, `user_id`, `bus_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 21, 4),
(4, 3, 1),
(5, 4, 12),
(8, 22, 2),
(9, 22, 2),
(10, 5, 7),
(11, 5, 2),
(12, 5, 0),
(13, 5, 4),
(14, 5, 5),
(15, 5, 6),
(16, 6, 6),
(17, 7, 2),
(18, 8, 12),
(22, 10, 7),
(24, 9, 2),
(25, 11, 4),
(26, 12, 5),
(27, 13, 5),
(28, 13, 1),
(29, 13, 2),
(30, 13, 3),
(31, 13, 4),
(32, 13, 6),
(33, 13, 7),
(34, 13, 8),
(35, 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `stoppage_name` varchar(600) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `bus_id` int(11) NOT NULL,
  `stoppage_type` int(11) NOT NULL,
  `remarks` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `stoppage_name`, `lat`, `lng`, `bus_id`, `stoppage_type`, `remarks`) VALUES
(1, 'Mirpur-1', 23.795604, 90.353655, 1, 2, ''),
(2, 'Mirpur-2', 23.797675, 90.3845, 1, 2, ''),
(3, '﻿Setara Convention Hall, Begum Rokeya Avenue, Dhaka, Bangladesh', 23.822524, 90.364233, 1, 2, ''),
(4, 'Digilab Diagnostic Center, Mirpur, Dhaka, Bangladesh', 23.821176, 90.364963, 1, 2, ''),
(5, 'Rabbani Hotel and Restaurant, Mirpur Road, Dhaka, Bangladesh', 23.81574, 90.366251, 1, 2, ''),
(6, 'Original 10, Dhaka, Dhaka Division, Bangladesh', 23.81037, 90.367522, 1, 2, ''),
(7, 'Proshika More Bus Stop, Dhaka, Bangladesh', 23.809472, 90.360999, 1, 2, ''),
(8, 'Janata housing, Mirpur-1, Dhaka, Dhaka Division, Bangladesh', 23.798939, 90.358655, 1, 2, ''),
(9, 'Ansar Camp Road, Mirpur, Dhaka, Bangladesh', 23.791159, 90.354722, 1, 2, ''),
(10, 'Bangla College, Dhaka, Dhaka Division, Bangladesh', 23.784822, 90.352773, 1, 2, ''),
(11, 'Kallyanpur, Mirpur, Dhaka, Dhaka Division, Bangladesh', 23.782204, 90.359537, 1, 2, ''),
(12, 'Kalyanpur', 23.782204, 90.359537, 1, 2, ''),
(13, 'Shyamoli, Dhaka, Dhaka Division, Bangladesh', 23.771783, 90.363067, 1, 2, ''),
(14, '﻿Kachukhet Bus Stop, Kachukhet Road, Dhaka, Bangladesh', 23.792862, 90.388043, 2, 2, ''),
(15, 'Mirpur 14 Bus Stand, Kachukhet Road, Dhaka, Bangladesh', 23.798269, 90.387561, 2, 2, ''),
(16, 'Shaheed police smrity college,Police Complex, Mirpur-14, Dhaka 1206, Bangladesh', 23.799965, 90.384936, 2, 2, ''),
(17, 'Police Staff College,14 Mirpur Rd, Dhaka 1206, Bangladesh', 23.802712, 90.380262, 2, 2, ''),
(18, 'Mirpur-13', 23.807393, 90.378485, 2, 2, ''),
(19, 'Mirpur-10 Water Tank', 23.806796, 90.373566, 2, 2, ''),
(20, 'Mirpur 10 Bus Stopage, Dhaka, Bangladesh', 23.806744, 90.368555, 2, 2, ''),
(21, 'Kazipara Overpass, Dhaka, Bangladesh', 23.797165, 90.372993, 2, 2, ''),
(22, 'ShewraPara Bus Stand, Begum Rokeya Ave, Dhaka 1216, Bangladesh', 23.790398, 90.375568, 2, 2, ''),
(23, 'Taltola, Begum Rokeya Ave, Dhaka 1207, Bangladesh', 23.783516, 90.378483, 2, 2, ''),
(24, 'Sher E Bangla Agricultural University', 23.77123, 90.375225, 2, 2, ''),
(25, '﻿Residential School', 23.765836, 90.3699, 3, 2, ''),
(26, 'DRMC', 23.765836, 90.3699, 3, 2, ''),
(27, 'Lalmatia, Dhaka, Bangladesh', 23.755407, 90.368951, 3, 2, ''),
(28, 'State University of Bangladesh,77 Satmasjid Road, Dhaka 1205, Bangladesh', 23.751436, 90.367424, 3, 2, ''),
(29, 'Dhanmondi 15, Dhaka 1209, Bangladesh', 23.747463, 90.370273, 3, 2, ''),
(30, 'Zigatola Bus stop,Dhaka, Bangladesh', 23.738528, 90.376074, 3, 2, ''),
(31, 'Star Kabab,9/A Dhanmondi Lake Rd,Dhanmondi 15 Dhaka, Bangladesh', 23.747463, 90.370273, 3, 2, ''),
(32, 'Sankar Bus Stop, Satmasjid Road, Dhaka 1209, Bangladesh', 23.750748, 90.368419, 3, 2, ''),
(33, 'Lalmatia, Dhaka, Bangladesh', 23.755407, 90.368951, 3, 2, ''),
(34, 'City Hospital Ltd, Lalmatia', 23.754067, 90.365531, 3, 2, ''),
(35, 'Nurjahan Rd, Dhaka 1209, Bangladesh', 23.76043, 90.361774, 3, 2, ''),
(36, 'Mugdapara Bus Stop, Atish Deepankar Rd, Dhaka, Bangladesh', 23.73119, 90.428569, 5, 2, ''),
(37, 'Bashabo, Dhaka, Bangladesh', 23.742604, 90.430784, 5, 2, ''),
(38, 'Khilgaon Railgate Staff Quarter Jame Masjid', 23.743767, 90.426865, 5, 2, ''),
(39, 'Maniknagar, Dhaka, Bangladesh', 23.724744, 90.43432, 5, 2, ''),
(40, 'Kazla Bus Stop, Dhaka-Chittagong Highway (Mukti Sharani), Dhaka, Bangladesh', 23.705691, 90.444072, 6, 2, ''),
(41, 'Shonir Akhra Bus Stop, Dhaka, Bangladesh', 23.702913, 90.450395, 6, 2, ''),
(42, 'Rayerbag Bus Stop, Dhaka, Bangladesh', 23.699351, 90.457106, 6, 2, ''),
(43, 'Matuail Medi Care Hospital & Diagnostic Center', 23.713089, 90.469681, 6, 2, ''),
(44, 'Saddam Market Bus Stop, Tushar Dhara Ave New Rd, Dhaka, Bangladesh', 23.692969, 90.472957, 6, 2, ''),
(45, 'Sign Board Bus Stop, Dhaka - Narayanganj Rd, Dhaka, Bangladesh', 23.693685, 90.480834, 6, 2, ''),
(46, 'Sanarpar Bus Stop, Bangladesh', 23.694756, 90.490233, 6, 2, ''),
(47, 'Mouchak Rd, Dhaka, Bangladesh', 23.688806, 90.496899, 6, 2, ''),
(48, 'Chittagong Road Bus Stop, Shiddhirganj, Bangladesh', 23.697853, 90.509706, 6, 2, ''),
(49, 'Kanchpur Bus Stop, N1, Bangladesh', 23.706083, 90.522011, 6, 2, ''),
(50, 'Kachpur Bus Stop, N1, Bangladesh', 23.706083, 90.522011, 6, 2, ''),
(51, 'Modonpur Bus Stop, Bandar, Bangladesh', 23.690578, 90.546538, 6, 2, ''),
(52, 'Sonargaon, Bangladesh', 23.63661, 90.594665, 6, 2, ''),
(53, 'Meghna Ghat Bus Stop, Bangladesh', 23.61841, 90.609353, 6, 2, ''),
(54, 'Natun Bazaar Bus Stand, Dhaka, Bangladesh', 23.797383, 90.42371, 7, 2, ''),
(55, 'Bashtola Bus Stand, Baash Tola Rd, Dhaka, Bangladesh', 23.794514, 90.4241, 7, 2, ''),
(56, 'Shahjadpur, Dhaka, Bangladesh', 23.791707, 90.424891, 7, 2, ''),
(57, 'suvastu nazar valley', 23.789814, 90.425198, 7, 2, ''),
(58, 'Uttar Badda, Dhaka, Bangladesh', 23.782043, 90.423123, 7, 2, ''),
(59, 'Link Rd, Dhaka, Bangladesh', 23.745727, 90.393648, 7, 2, ''),
(60, 'Gudaraghat', 23.779708, 90.418796, 7, 2, ''),
(61, 'Gulshan 1, Dhaka, Bangladesh', 23.782062, 90.416053, 7, 2, ''),
(62, 'TB Gate Bus Stop, TB Gate Rd, Dhaka, Bangladesh', 23.780213, 90.409404, 7, 2, ''),
(63, 'Wireless More Bus Stop, Bir Uttam AK Khandakar Rd, Dhaka 1212, Bangladesh', 23.780672, 90.405538, 7, 2, ''),
(64, 'Amtali ,Shaheed Tajuddin Ahmed Ave, Dhaka 1212, Bangladesh', 23.775458, 90.399168, 7, 2, ''),
(65, 'Mohakhali Bus Stop, Dhaka, Bangladesh', 23.778239, 90.397739, 7, 2, ''),
(66, 'Nabisco', 23.768937, 90.401385, 7, 2, ''),
(67, 'Bijoy Sarani, Dhaka, Bangladesh', 23.764771, 90.385474, 7, 2, ''),
(68, 'Awlad Hossain Market, Kazi Nazrul Islam Ave, Dhaka 1215, Bangladesh', 23.763027, 90.38944, 7, 2, ''),
(69, 'Nabinagar Bazar Bus Stop, Fatulla, Bangladesh', 23.619711, 90.463335, 8, 2, ''),
(70, 'Bish Mail, Savar, Bangladesh', 23.894674, 90.269634, 8, 2, ''),
(71, 'Prantic Bus Stop,JU, Dhaka - Aricha Hwy, Savar, Bangladesh', 23.889703, 90.272239, 8, 2, ''),
(72, 'Radio Colony Bus Stop, Dhaka - Aricha Hwy, Savar, Bangladesh', 23.858745, 90.262358, 8, 2, ''),
(73, 'Savar Bazar, Savar, Bangladesh', 23.850077, 90.25907, 8, 2, ''),
(74, 'Savar Thana Bus Station, Dhaka - Aricha Hwy, Savar, Bangladesh', 23.839529, 90.257713, 8, 2, ''),
(75, 'Hemayetpur Bus Stand, Hemayetpur, Bangladesh', 23.793326, 90.271127, 8, 2, ''),
(76, 'Gabtoli, Bangladesh', 23.783726, 90.344245, 8, 2, ''),
(77, 'Postgola Cantonment,Dhaka-Narayanganj Rd, Dhaka, Bangladesh', 23.689429, 90.428721, 9, 2, ''),
(78, 'Jurain, Dhaka, Bangladesh', 23.688272, 90.443162, 9, 2, ''),
(79, 'Muradpur CNG Station, Dhaka, Bangladesh', 23.692732, 90.444341, 9, 2, ''),
(80, 'Dholaipar More', 23.702689, 90.438427, 9, 2, ''),
(81, 'Mir Hazir Bagh Bus Stop, Dhaka, Bangladesh', 23.705882, 90.431216, 9, 2, ''),
(82, 'Dayaganj Temple, Dhaka, Bangladesh', 0, 90.423712, 9, 2, ''),
(83, 'Dayaganj Mor, Dhaka, Bangladesh', 0, 90.423712, 9, 2, ''),
(84, 'Tikatuli Flyover Connection Lane', 23.720314, 90.422534, 9, 2, ''),
(85, 'Salauddin Bhaban, House No. 44/A, Mayor Mohammad Hanif Flyover, Dhaka 1203, Bangladesh', 23.716955, 90.420108, 9, 2, ''),
(86, 'Sign Board Bus Stop, Dhaka - Narayanganj Rd, Dhaka, Bangladesh', 23.693685, 90.480834, 10, 2, ''),
(87, 'Jalkuri Bus Stop, Jalkury, Dhaka - Narayanganj Rd, Bangladesh', 23.663766, 90.486888, 10, 2, ''),
(88, 'Shibu Market , Fatulla', 23.644249, 90.493484, 10, 2, ''),
(89, 'Chashara, Narayanganj, Bangladesh', 23.626361, 90.499207, 10, 2, ''),
(90, 'IET School Bus Stop, Narayanganj Hwy, Narayanganj, Bangladesh', 23.63497, 90.511617, 11, 2, ''),
(91, 'Chittagong Road Bus Stop, Shiddhirganj, Bangladesh', 23.697853, 90.509706, 11, 2, ''),
(92, 'Arambagh, Dhaka, Bangladesh', 23.730736, 90.418998, 12, 2, ''),
(93, 'Kamalapur Railway Station, kamalapur, Kamalapur Rd, Dhaka 1222, Bangladesh', 23.73202, 90.425922, 12, 2, ''),
(94, 'Rajarbagh, Dhaka, Bangladesh', 23.741159, 90.415464, 12, 2, ''),
(95, 'Malibagh Rail Gate Bus Stop, Dhaka, Bangladesh', 23.750097, 90.413041, 12, 2, ''),
(96, 'Mouchak', 23.745608, 90.411977, 12, 2, ''),
(97, 'Wireless Railgate Bara Moghbazar, Dhaka, Bangladesh', 0, 90.408159, 12, 2, ''),
(98, 'Rampura TV Centre', 23.765164, 90.418977, 13, 2, ''),
(99, 'Rampura Bazar', 23.760395, 90.41863, 13, 2, ''),
(100, 'Hazipara Petrol Pump', 23.757052, 90.417201, 13, 2, ''),
(101, 'Malibagh community center', 23.749626, 90.416288, 13, 2, ''),
(102, 'Khilgaon Policefari', 23.74629, 90.426106, 13, 2, ''),
(103, 'Farmgate Bus Stop, Dhaka 1215, Bangladesh', 23.757273, 90.389996, 4, 2, ''),
(104, 'Bijoy Sarani, Dhaka, Bangladesh', 23.764771, 90.385474, 4, 2, ''),
(105, 'Birshreshto Shaheed Jahangir Gate,Shaheed Sharani, Dhaka, Bangladesh', 23.775392, 90.389876, 4, 2, ''),
(106, 'Mohakhali Bus Stop, Dhaka, Bangladesh', 23.778239, 90.397739, 4, 2, ''),
(107, 'Banani, Dhaka, Bangladesh', 23.793993, 90.404272, 4, 2, ''),
(108, 'MES Bus Stop, Dhaka, Bangladesh', 23.816136, 90.405322, 4, 2, ''),
(109, 'Shewra Bus Stop, Dhaka, Bangladesh', 23.819137, 90.415008, 4, 2, ''),
(110, 'Bishwa Road Bus Stop, Tongi Diversion Rd, Dhaka, Bangladesh', 23.821414, 90.418451, 4, 2, ''),
(111, 'Khilkhet, Dhaka, Bangladesh', 23.831122, 90.424301, 4, 2, ''),
(112, 'Hazrat Shahjalal International Airport, Airport Road, Sector 1, Kurmitola, Dhaka 1229, Bangladesh', 23.846615, 90.402623, 4, 2, ''),
(113, 'Jasimuddin Bus Stop, Dhaka 1230, Bangladesh', 23.860852, 90.400158, 4, 2, ''),
(114, 'Rajlakshmi Bus Stop, Dhaka - Mymensingh Hwy, Dhaka 1230, Bangladesh', 23.863762, 90.400183, 4, 2, ''),
(115, 'Azampur Local Bus Stop, Dhaka 1230, Bangladesh', 23.868364, 90.400427, 4, 2, ''),
(116, 'House Building Bus Stop, Dhaka - Mymensingh Hwy, Dhaka 1230, Bangladesh', 23.873722, 90.400733, 4, 2, ''),
(117, 'Abdullahpur Bus Stop, Dhaka - Ashulia Hwy, Dhaka 1230, Bangladesh', 23.879751, 90.401143, 4, 2, ''),
(118, 'College Gate Bus Stop, Dhaka - Mymensingh Hwy, Tongi, Bangladesh', 23.908806, 90.398099, 4, 2, ''),
(119, 'Board Bazar Bus Stop, Dhaka - Mymensingh Hwy, Bangladesh', 23.945287, 90.382715, 4, 2, ''),
(120, 'Shib Bari Bus Stand, Joydebpur Rd, Joydebpur, Bangladesh', 23.996777, 90.417025, 4, 2, ''),
(121, 'Chowrasta - Joydebpur Rd, Joydebpur, Bangladesh', 23.998997, 90.419802, 4, 2, ''),
(122, 'Maleker Bari Bus Stop, Dhaka - Mymensingh Hwy, Bangladesh', 23.96623, 90.380155, 4, 2, ''),
(123, 'Tongi Bazar Bus Stop, Dhaka - Mymensingh Hwy, Tongi 1230, Bangladesh', 23.884197, 90.400542, 4, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `places_request`
--

CREATE TABLE `places_request` (
  `id` int(11) NOT NULL,
  `update_type` int(11) NOT NULL DEFAULT '0',
  `stoppage_name` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `bus_id` int(11) NOT NULL,
  `stoppage_type` int(11) NOT NULL,
  `remarks` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places_request`
--

INSERT INTO `places_request` (`id`, `update_type`, `stoppage_name`, `lat`, `lng`, `bus_id`, `stoppage_type`, `remarks`, `user_id`, `requested_on`) VALUES
(1, 0, 'Mirpur-1', 23.795604, 90.353655, 1, 2, '', 2, '2017-05-08 05:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `reports1`
--

CREATE TABLE `reports1` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports1`
--

INSERT INTO `reports1` (`id`, `bus_id`, `user_id`, `lat`, `lng`, `time`, `pos_cnt`, `neg_cnt`) VALUES
(6, 1, 1, 23.7788091, 90.3600887, '2017-05-08 07:59:19', 0, 0),
(5, 1, 1, 23.802953, 90.35167, '2017-05-07 22:34:00', 1, 0),
(4, 1, 1, 23.7786638, 90.35993899999994, '2017-04-30 04:51:53', 1, 0),
(7, 1, 1, 23.7788091, 90.3600887, '2017-05-08 07:59:19', 0, 0),
(8, 1, 1, 23.7788084, 90.3603828, '2017-05-08 08:01:07', 0, 0),
(9, 1, 1, 23.7788084, 90.3603828, '2017-05-08 08:01:42', 0, 0),
(10, 1, 1, 23.7752648, 90.3650895, '2017-05-08 08:03:13', 0, 0),
(11, 1, 1, 23.7752648, 90.3650895, '2017-05-08 08:07:39', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports2`
--

CREATE TABLE `reports2` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports2`
--

INSERT INTO `reports2` (`id`, `bus_id`, `user_id`, `lat`, `lng`, `time`, `pos_cnt`, `neg_cnt`) VALUES
(1, 2, 2, 23.728762, 90.399171, '2017-05-08 09:44:28', 1, 0),
(2, 2, 2, 23.733010099999998, 90.3983921, '2017-05-08 10:58:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports3`
--

CREATE TABLE `reports3` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports4`
--

CREATE TABLE `reports4` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports5`
--

CREATE TABLE `reports5` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports6`
--

CREATE TABLE `reports6` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports7`
--

CREATE TABLE `reports7` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports8`
--

CREATE TABLE `reports8` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports9`
--

CREATE TABLE `reports9` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports10`
--

CREATE TABLE `reports10` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports11`
--

CREATE TABLE `reports11` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports12`
--

CREATE TABLE `reports12` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports13`
--

CREATE TABLE `reports13` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `time` datetime NOT NULL,
  `pos_cnt` int(11) NOT NULL,
  `neg_cnt` int(11) NOT NULL
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
(1, 14, 0, '7.10 am ', 'Norshingdi', '', '', ''),
(3, 8, 0, '6.20am', 'Nabinogor', '', '', ''),
(4, 1, 0, '6.40am', 'Mirpur-12', 'Shamim', '1325', ''),
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
(19, 2, 0, '6.35am', 'Kochukhet', '', '11-1349', ''),
(20, 2, 0, '6.50am', 'Kochukhet', '', '11-1289', 'Ullash Sticker'),
(21, 2, 0, '7.30am', 'Kochukhet', '', '11-0451', ''),
(22, 2, 0, '8.00am', 'Kochukhet', '', '11-1353', ''),
(23, 2, 0, '9.00am', 'Kochukhet', '', '', ''),
(24, 2, 0, '9.45am', 'Kochukhet', '', '11-1349', ''),
(25, 2, 1, '12.20pm', 'Kochukhet', '', '11-6124', ''),
(26, 2, 1, '1.10pm', 'Kochukhet', '', '11-1353', ''),
(27, 2, 1, '2.20pm', 'Kochukhet', '', '11-1349', ''),
(28, 2, 1, '3.30pm', 'Kochukhet', '', '11-0451', ''),
(29, 2, 1, '4.30pm', 'Kochukhet', '', '11-5821', ''),
(30, 2, 1, '5.30pm', 'Kochukhet', '', '11-1353', ''),
(31, 3, 0, '7.00am', 'Mohammadpur', '', '', ''),
(32, 3, 0, '7.30am', 'Moitri Counter', '', '', ''),
(33, 3, 0, '8.00am', 'Moitri Counter', '', '', ''),
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
(141, 13, 1, '5.10pm', 'Rampura TV Centre', '', '6199', ''),
(142, 14, 1, '4.00pm', 'Norshingdi', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_request`
--

CREATE TABLE `schedule_request` (
  `id` int(11) NOT NULL,
  `update_type` int(11) NOT NULL DEFAULT '0',
  `old_schedule` int(11) NOT NULL DEFAULT '0',
  `bus_id` int(11) NOT NULL,
  `trip_type` int(11) NOT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `endpoint` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `driver` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bus_number` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `stoppage`
--

CREATE TABLE `stoppage` (
  `id` int(11) NOT NULL,
  `stoppage` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bus_id` int(11) NOT NULL,
  `stoppage_type` int(11) NOT NULL,
  `Remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stoppage`
--

INSERT INTO `stoppage` (`id`, `stoppage`, `bus_id`, `stoppage_type`, `Remarks`) VALUES
(1, 'চৌরঙ্গী', 1, 2, ''),
(2, 'সেতারা কনভেনশন হল  ', 1, 2, ''),
(3, 'ডিজি ল্যাব ', 1, 0, ''),
(4, 'রাব্বানী হোটেল ', 1, 2, ''),
(5, 'অরিজিনাল দশ (হলমার্ক)', 1, 2, ''),
(6, 'প্রশিকা (স্বপ্ন)', 1, 2, ''),
(7, 'মিরপুর ২ (থানার সামনে)', 1, 2, ''),
(8, 'জনতা হাউজিং (BIBM)', 1, 2, ''),
(9, 'মিরপুর এক নাম্বার (সনির সিনেমার বিপরীত পাশে) ', 1, 2, ''),
(10, 'মিরপুর এক নাম্বার (ওভার ব্রিজের আগে), ', 1, 1, ''),
(11, 'মিরপুর এক নাম্বার চাইনিজ ', 1, 2, ''),
(12, 'আনসার ক্যাম্প ', 1, 2, ''),
(13, 'বাঙলা কলেজ (A টাইপ কোয়ার্টারে ঢোকার গলি)', 1, 2, ''),
(14, 'কল্যাণপুর (BRTC টিকেট কাউন্টার)', 1, 0, ''),
(15, 'কল্যাণপুর (ওভার ব্রিজের নিচে),', 1, 1, ''),
(16, 'শ্যামলী ( রোচক মিস্টির দোকান)', 1, 2, ''),
(17, 'টেকনিক্যাল মোড়', 1, 1, ''),
(18, '﻿কচুক্ষেত ভাগ্যকূল মোড়', 2, 2, ''),
(19, 'পুলপাড় ', 2, 2, ''),
(20, 'মিলি সুপার মার্কেট,', 2, 2, ''),
(21, 'মিরপুর ১৪ নম্বর ', 2, 2, ''),
(22, 'পুলিশ কলেজ ', 2, 2, ''),
(23, 'পুলিশ স্টাফ কলেজ,', 2, 2, ''),
(24, 'মিরপুর ১৩ নম্বর, ', 2, 2, ''),
(25, 'মিরপুর ১০ নম্বর পানির ট্যাংকি, ', 2, 2, ''),
(26, 'মিরপুর ১০ নম্বর শাহজালাল ইসলামী ব্যাংকের পরে', 2, 0, ''),
(27, 'কাজীপাড়া ওভারব্রীজ ', 2, 2, ''),
(28, 'শেওড়াপাড়া বাসস্ট্যান্ড', 2, 2, ''),
(29, ' তালতলা', 2, 2, ''),
(30, ' শেরে বাংলা কৃষি বিশ্ববিদ্যালয় সেকেন্ড গেট ', 2, 2, ''),
(31, 'আল হেলাল এর অপোজিট', 2, 1, ''),
(32, ' মিরপুর ১০ নম্বর ওভার ব্রীজ', 2, 1, ''),
(33, 'নবীনগর ( সাভার )', 8, 2, ''),
(34, '﻿রেসিডেন্সিয়াল স্কুল (২ নং গেট, ফার্টিলিটি হাসপাতালের বিপরীতে) ', 3, 2, ''),
(35, 'মৈত্রী কাউন্টার(কাজী নজরুল ইসলাম রোডের উত্তর মাথায়, অগ্রণী ব্যাংকের বিপরীতে) ', 3, 0, ''),
(36, 'মোহাম্মদপুর বাস স্ট্যান্ড(বিআরটিসি বাস কাউন্টারের বিপরীতে) ', 3, 2, ''),
(37, 'লালমাটিয়া বাস স্ট্যান্ড(Costly Kabab এর বিপরীতে, লোকাল বাস কাউন্টারের পর)', 3, 0, ''),
(38, '২৭ নাম্বার যাত্রী ছাউনি(State University এর বিপরীতে)', 3, 0, ''),
(39, '১৫ নাম্বার(ইবনে সিনা হসপিটালের পর, কাকলি স্কুলের আগে) ', 3, 0, ''),
(40, 'জিগাতলা (লায়লাতি রেস্টুরেন্টের পর, Chicken King রেস্টুরেন্টের আগে) ', 3, 0, ''),
(41, 'জিগাতলা বাস স্ট্যান্ড ', 3, 1, ''),
(42, '১৫ নাম্বার বাস স্ট্যান্ড', 3, 1, ''),
(43, '১৯ নাম্বার বাস স্ট্যান্ড (স্টার কাবাব)', 3, 2, ''),
(44, 'শঙ্কর বাস স্ট্যান্ড', 3, 1, ''),
(45, 'লালমাটিয়া (সিটি হসপিটালের বিপরীতে, গ্রাফিক আর্টস ইন্সিটিউটের আগে)', 3, 1, ''),
(46, 'নুরজাহান রোড', 3, 1, ''),
(47, 'সলিমুল্লাহ রোড', 3, 1, ''),
(48, 'টাউন হল', 3, 1, ''),
(49, 'আই.ই.টি স্কুল(আদমজী)', 11, 2, ''),
(50, 'চিটাগাংরোড', 11, 2, ''),
(51, 'মুগদাপাড়া', 5, 2, ''),
(52, 'বৌদ্ধ মন্দির', 5, 2, ''),
(53, 'বাসাবো', 5, 2, ''),
(54, 'খিলগাঁও রেলগেট', 5, 2, ''),
(55, 'মানিকনগর', 5, 1, ''),
(56, 'পোস্তগোলা ক্যান্টনমেন্ট', 9, 2, ''),
(57, 'জুরাইন আজিজিয়া মিষ্টান্ন', 9, 0, ''),
(58, 'মুরাদপুর সিএনজি স্টেশন', 9, 0, ''),
(59, 'ধোলাইপাড় মোড়', 9, 0, ''),
(60, 'মীরহাজীরবাগ জোছনা হোটেলের বিপরীতে', 9, 2, ''),
(61, 'নবীনগর', 9, 2, ''),
(62, 'দয়াগঞ্জ মন্দির', 9, 0, ''),
(63, 'টিকাটুলি', 9, 0, ''),
(64, 'সালাউদ্দিন হাসপাতাল', 9, 0, ''),
(65, 'জুরাইন ক্রসিং', 9, 1, ''),
(66, 'টিকাটুলি ফ্লাইওভার কানেকশন লেন', 9, 1, ''),
(67, 'ধোলাইপাড়', 9, 1, ''),
(68, 'দয়াগঞ্জ মোড়', 9, 1, ''),
(69, 'রামপুরা টিভি সেন্টার', 13, 2, ''),
(70, 'রামপুরা বাজার', 13, 2, ''),
(71, 'হাজীপাড়া পেট্রোল পাম্প', 13, 2, ''),
(72, 'মালিবাগ কমিউনিটি সেন্টার', 13, 2, ''),
(73, 'খিলগাঁও পুলিশফাঁড়ি', 13, 2, ''),
(74, 'ফার্মগেট', 7, 2, ''),
(75, 'Farm gate ', 4, 2, ''),
(76, 'Bijoy shoroni', 4, 2, ''),
(77, 'Jahangir gate ', 4, 2, ''),
(78, 'Mohakhali', 4, 2, ''),
(79, 'Banani', 4, 2, ''),
(80, 'Mes', 4, 2, ''),
(81, 'Sheora', 4, 2, ''),
(82, 'Bishshoroad', 4, 2, ''),
(83, 'Khilkhet', 4, 2, ''),
(84, 'Airport', 4, 2, ''),
(85, 'Jasimuddin', 4, 2, ''),
(86, 'Rajlakhhi', 4, 2, ''),
(87, 'Ajampur', 4, 2, ''),
(88, 'House building', 4, 2, ''),
(89, 'Abdullahpur', 4, 2, ''),
(90, 'Station gate', 4, 2, ''),
(91, 'College gate ( Tongi )', 4, 2, ''),
(92, 'Board Bazar', 4, 2, ''),
(93, 'Shibbari', 4, 2, ''),
(94, 'Chowrasta (Gazipur)', 4, 2, ''),
(95, 'ফার্মগেট', 4, 2, ''),
(96, 'বিজয় সরণী', 4, 2, ''),
(97, 'জাহাঙ্গীর গেট', 4, 2, ''),
(98, 'মহাখালী', 4, 2, ''),
(99, 'বনানী', 4, 2, ''),
(100, 'এম,ই,এস', 4, 2, ''),
(101, 'শেওড়া', 4, 2, ''),
(102, 'বিশ্বরোড', 4, 2, ''),
(103, 'খিলক্ষেত', 4, 2, ''),
(104, 'এয়ারপোর্ট', 4, 2, ''),
(105, 'জসীমউদ্দীন', 4, 2, ''),
(106, 'রাজলক্ষ্মী', 4, 2, ''),
(107, 'আজমপুর', 4, 2, ''),
(108, 'হাউজ বিল্ডিং', 4, 2, ''),
(109, 'আব্দুল্লাহপুর', 4, 2, ''),
(110, 'স্টেশন গেট', 4, 2, ''),
(111, 'কলেজগেট ( টঙ্গী )', 4, 2, ''),
(112, 'বোর্ড বাজার', 4, 2, ''),
(113, 'শিববাড়ী', 4, 2, ''),
(114, 'চৌরাস্তা ( গাজীপুর )', 4, 2, ''),
(115, 'কাজলা', 6, 2, ''),
(116, 'শনির আখরা', 6, 2, ''),
(117, 'রায়েরবাগ', 6, 2, ''),
(118, 'মাতুয়াইল মেডিকেল', 6, 2, ''),
(119, 'সাদ্দাম মার্কেট', 6, 2, ''),
(120, 'সাইনবোর্ড', 6, 2, ''),
(121, 'সানারপার ', 6, 2, ''),
(122, 'মৌচাক', 6, 2, ''),
(123, 'চিটাগাং রোড', 6, 2, ''),
(124, 'কাঁচপুর ', 6, 2, ''),
(125, 'মদনপুর', 6, 2, ''),
(126, 'সোনারগাঁ ', 6, 2, ''),
(127, 'মেঘনা', 6, 2, ''),
(128, 'আরামবাগ', 12, 2, ''),
(129, 'কমলাপুর', 12, 2, ''),
(130, 'পীরজঙ্গী মাজার', 12, 2, ''),
(131, 'রাজারবাগ', 12, 2, ''),
(132, 'মালিবাগ', 12, 2, ''),
(133, 'মৌচাক', 12, 2, ''),
(134, 'ওয়ারলেস', 12, 2, ''),
(135, 'সাইনবোর্ড ', 10, 2, ''),
(136, 'জালকুড়ি', 10, 2, ''),
(137, 'শিবু মার্কেট ', 10, 2, ''),
(138, 'চাষাড়া', 10, 2, ''),
(139, 'কাওলা ', 4, 2, ''),
(140, 'kawla', 4, 2, ''),
(141, 'বিশ্বরোড', 2, 4, ''),
(142, 'Bisshoroad', 2, 4, ''),
(143, 'বড়বাড়ি', 4, 2, ''),
(144, 'borobari', 4, 2, ''),
(145, 'মালেকের বাড়ি', 4, 2, ''),
(146, 'Maleker Bari', 4, 2, ''),
(147, 'টঙ্গী বাজার', 4, 2, ''),
(148, 'Tongi Bazar', 4, 2, ''),
(149, 'নতুন বাজার', 7, 2, ''),
(150, 'বাশতলা', 7, 2, ''),
(151, 'শাহজাদপুর', 7, 2, ''),
(152, 'সুভাস্তু নজর ভ্যালী', 7, 2, ''),
(153, 'উত্তর বাড্ডা', 7, 2, ''),
(154, 'লিংক রোড', 7, 2, ''),
(155, 'গুদারাঘাট', 7, 2, ''),
(156, 'গুলশান-১', 7, 2, ''),
(157, 'টিবি গেট ', 7, 2, ''),
(158, 'ওয়ারলেস গেট', 7, 2, ''),
(159, 'আমতলী', 7, 2, ''),
(160, 'মহাখালী(রেল ক্রস)', 7, 2, ''),
(161, 'নাবিস্কো', 7, 2, ''),
(162, 'বিজয় স্মরণী', 7, 1, ''),
(163, 'আওলাদ হোসেন মার্কেট।', 7, 2, ''),
(164, 'nobinogor', 8, 2, ''),
(165, '20 mile', 8, 2, ''),
(166, 'bish mile', 8, 2, ''),
(167, 'JU prantik', 8, 2, ''),
(168, 'C and B ', 8, 2, ''),
(169, 'radio colony ', 8, 2, ''),
(170, 'savar ', 8, 2, ''),
(171, 'thana stand ', 8, 2, ''),
(172, 'hemayetpur ', 8, 2, ''),
(173, 'gabtoli', 8, 2, ''),
(174, 'নবীনগর', 8, 2, ''),
(175, '২০ মাইল', 8, 2, ''),
(176, 'বিশ মাইল', 8, 2, ''),
(177, 'সি এন্ড বি', 8, 2, ''),
(178, 'প্রান্তিক (  জাহাঙ্গীরনগর )', 8, 2, ''),
(179, 'রেডিও কলোনী', 8, 2, ''),
(180, 'সাভার', 8, 2, ''),
(181, 'থানা স্ট্যান্ড', 8, 2, ''),
(182, 'হেমায়েতপুর', 8, 2, ''),
(183, 'গাবতলী', 8, 2, '');

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
  `dept_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bus_id` int(11) NOT NULL,
  `level` int(11) DEFAULT '0',
  `level_req` int(11) NOT NULL DEFAULT '0',
  `pos_repu` int(11) NOT NULL DEFAULT '0',
  `neg_repu` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `reg_no`, `mob_no`, `email`, `password`, `dept_id`, `status`, `code`, `url`, `bus_id`, `level`, `level_req`, `pos_repu`, `neg_repu`) VALUES
(1, 'Fahim', '2013312035', '01521430883', 'fahim6119@gmail.com', '$2a$10$a8UbjgEB.R3rlmcnLxszourLXQBCVcTR5ET87qJzpAO8lYsXzfOti', 71, 2, '522533', NULL, 1, 2, 1, 2, 0),
(2, 'Fahad Arefin', '1995312035', '', 'f.arefin8@gmail.com', '$2a$10$WhUyUhfi.jKGE/AdUhW5bOvcQq3ff67VMGlO6E.kPJibGxbySKr3C', 0, 2, '457260', NULL, 2, 0, 1, 11, 0),
(3, 'Nafis Sazid', '2013212072', '', 'nafissazid4820@gmail.com', '$2a$10$6Ax5qHTEw8Rr3YhylXonnuQnK5atGMRYXTFlxD/MoJZ6alZiZNyU.', 0, 2, '228075', NULL, 1, 0, 0, 0, 0),
(4, 'Abida', '2013814911', '', 'abida1616@gmail.com', '$2a$10$joE9mYSulWPFNkEXfgJ9yuyuAa.QoEton3u1jTn8LQiZ4InaiDrQG', 0, 2, '864924', NULL, 12, 0, 0, 0, 0),
(5, 'asdf', '2016435987', '01566334455', 'asd@asd.asd', '$2a$10$1rrltxG6qQgUoxJfjkfmxuAvYSzVid7IokXJVfixgi6fd7sE2K8u6', 83, 1, '980313', NULL, 0, 0, 0, 0, 0),
(6, 'shourav', '2013212542', '', 'shourav95.ri@gmail.com', '$2a$10$bQdZmg/HBQJdMJfr.hg7I.4jndrIJSNyE.BH4ZHmb8RssH2NWIYju', 0, 2, '163912', NULL, 6, 0, 0, 0, 0),
(7, 'Tanvir Shahriar Rifat', '2013412512', '', 'rifat.csedu20@gmail.com', '$2a$10$a5Y.o9A6Jdr76u4kVRasCeBqf1ni.rCxKsjQDxgsq.nQwN/iEnyYS', 0, 1, '136059', NULL, 2, 0, 0, 0, 0),
(8, 'melody_43', '2013712068', '', 'cleopatra.sopto7@gmail.com', '$2a$10$hJWRaJS0NhrGwk5KyrIJwewLUnHop9zTPpk.C4Rm4YgTvbSNAZPOW', 0, 1, '649153', NULL, 12, 0, 0, 0, 0),
(9, 'Nafis Sazid', '2013212073', '', 'nafissazid48@gmail.com', '$2a$10$lkqtEUcnh.YTJCboCXinF.sEZCg92BKQOc2HuuM1gPQxE7zOZI5iC', 0, 2, '167956', NULL, 1, 0, 0, 0, 0),
(10, 'game', '1234456789', '', 'game@mail.com', '$2a$10$zODwqjUxZyJR8fSKbuUQ5OFbLcJV2YS4.j3djaUvdamwPMNjM6wxK', 0, 1, '365710', NULL, 7, 0, 0, 0, 0),
(11, 'Tausif', '0192784486', '', 'tausiftt5238@gmail.com', '$2a$10$.n.sX.pYBHvqQTrcYLE.iO/Olnhl/hVdi36i3Atgw0Y8jc.AOjIpy', 0, 2, '406125', NULL, 4, 0, 0, 0, 0),
(12, 'Meha Masum', '2013812030', '', 'mehamasum@gmail.com', '$2a$10$koCmxFkPhVl89qA1zx5La.rBVdJLD.sNO30/Xj7hGH9MuQnDJmdGK', 0, 2, '329129', NULL, 5, 0, 1, 0, 0),
(13, 'mehedi hasan', '2015454343', '', 'mehedi1055@gmail.com', '$2a$10$frq91AVTbRIY5DTJ4LWpIeZRR1gjt8/IHqXvC3NPcUZX9SpoM4dq.', 0, 2, '343145', NULL, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `bus_id`, `report_id`) VALUES
(4, 13, 1, 5),
(3, 9, 1, 4),
(5, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_request`
--
ALTER TABLE `bus_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_request`
--
ALTER TABLE `places_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports1`
--
ALTER TABLE `reports1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports2`
--
ALTER TABLE `reports2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports3`
--
ALTER TABLE `reports3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports4`
--
ALTER TABLE `reports4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports5`
--
ALTER TABLE `reports5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports6`
--
ALTER TABLE `reports6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports7`
--
ALTER TABLE `reports7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports8`
--
ALTER TABLE `reports8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports9`
--
ALTER TABLE `reports9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports10`
--
ALTER TABLE `reports10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports11`
--
ALTER TABLE `reports11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports12`
--
ALTER TABLE `reports12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports13`
--
ALTER TABLE `reports13`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_request`
--
ALTER TABLE `schedule_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stoppage`
--
ALTER TABLE `stoppage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
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
-- AUTO_INCREMENT for table `bus_request`
--
ALTER TABLE `bus_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `places_request`
--
ALTER TABLE `places_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports1`
--
ALTER TABLE `reports1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reports2`
--
ALTER TABLE `reports2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reports3`
--
ALTER TABLE `reports3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports4`
--
ALTER TABLE `reports4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports5`
--
ALTER TABLE `reports5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports6`
--
ALTER TABLE `reports6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports7`
--
ALTER TABLE `reports7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports8`
--
ALTER TABLE `reports8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports9`
--
ALTER TABLE `reports9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports10`
--
ALTER TABLE `reports10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports11`
--
ALTER TABLE `reports11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports12`
--
ALTER TABLE `reports12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports13`
--
ALTER TABLE `reports13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `schedule_request`
--
ALTER TABLE `schedule_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stoppage`
--
ALTER TABLE `stoppage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
