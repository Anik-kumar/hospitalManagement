-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 01:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `emp_id`, `patient_id`, `time`) VALUES
(1, 1, 1, '2016-08-09 23:20:00'),
(2, 1, 4, '2016-08-09 23:40:00'),
(3, 3, 2, '2016-08-09 20:20:00'),
(4, 2, 5, '2016-08-10 06:00:00'),
(5, 1, 2, '2016-08-11 21:30:00'),
(6, 5, 1, '2016-08-10 23:40:00'),
(7, 4, 5, '2016-08-11 04:30:00'),
(8, 4, 6, '2016-08-12 19:40:00'),
(9, 3, 1, '2016-08-14 03:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `name`, `description`) VALUES
(1, 'Accident and emergency (A&E)', 'This department (sometimes called Casualty) is where you''re likely to be taken if you''ve called an ambulance in an emergency.'),
(2, 'Anaesthetics', 'Doctors in this department give anaesthetic for operations.'),
(3, 'General surgery', 'The general surgery ward covers a wide range of surgery and includes:\r\n			day surgery\r\n			thyroid surgery\r\n			kidney transplants\r\n			colon surgery\r\n			laparoscopic cholecystectomy (gallbladder removal)\r\n			endoscopy\r\n			breast surgery'),
(4, 'Gynaecology', 'These departments investigate and treat problems of the female urinary tract and reproductive organs, such as endometritis, infertility and incontinence.'),
(5, 'Neurology', 'This unit deals with disorders of the nervous system, including the brain and spinal cord. Its run by doctors who specialise in this area (neurologists) and their staff.'),
(10, 'Microbiology', 'The microbiology department looks at all aspects of microbiology, such as bacterial and viral infections.'),
(11, 'Nutrition and dietetics', 'Trained dieticians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics, forming part of a multidisciplinary team.'),
(12, 'Cardiology', '\r\n		This department provides medical care to patients who have problems with their heart or circulation. It treats people on an inpatient and outpatient basis.\r\n			electrocardiogram (ECG) and exercise tests to measure heart function,\r\n			echocardiograms (ultrasound scan of the heart),\r\n			scans of the carotid artery in your neck to determine stroke risk,\r\n			24-hour blood pressure tests,\r\n			insertion of pacemakers,\r\n			cardiac catheterisation (coronary angiography) to see if there are any block'),
(13, 'Diagnostic imaging', 'Formerly known as X-ray, this department provides a full range of diagnostic imaging services including:\r\n			general radiography (X-ray scans),\r\n			scans for A&E,\r\n			mammography (breast scans),\r\n			ultrasound scans,\r\n			angiography (X-ray of blood vessels),\r\n			interventional radiology (minimally invasive procedures, eg to treat narrowed arteries),\r\n			CT scanning (scans that show cross sections of the body),\r\n			MRI scanning (3D scans using magnetic and radio waves).'),
(14, 'Haematology', 'Haematology services work closely with the hospital laboratory. These doctors treat blood diseases and malignancies linked to the blood, with both new referrals and emergency admissions being seen.'),
(15, 'Orthopaedics', 'Orthopaedic departments treat problems that affect your musculoskeletal system. Thats your muscles, joints, bones, ligaments, tendons and nerves.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `uuid` varchar(64) NOT NULL,
  `uupass` varchar(64) NOT NULL,
  `uname` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `catagory_id`, `contract_id`, `dep_id`, `firstname`, `lastname`, `gender`, `address`, `uuid`, `uupass`, `uname`, `email`) VALUES
(1, 2, 1, 1, 'Steven', 'King', 'M', '1297 Via Cola di Rie', '1dcccffc-b816-4b4a-9098-ac378', 'steven', 'c2b7dr.king', 'stevenking@gmail.com'),
(2, 2, 2, 1, 'Alexander', 'Hunold', 'M', '93091 Calle della Te', '', '179ad45c6ce2cb97cf1029e212046e81', 'ALEXANDER11', 'test@gmail.com'),
(3, 2, 2, 2, 'David', 'Austin', 'M', '6092 Boxwood St', '', 'austin11', 'DEVIDAUSTIN', 'devidaustin@gmail.com'),
(4, 2, 1, 3, 'Bruce', 'Ernst', 'M', '12-98 Victoria Stree', '', 'ernst123', 'BRUCEERNST', 'bruceernst@gmail.com'),
(5, 2, 1, 4, 'Lisa', 'Ozer', 'F', '9702 Chester Road', '', 'ozer789', 'LISAOZER', 'lisaozer@gmail.com'),
(6, 2, 2, 15, 'Mohsin', 'Khalil', 'M', 'Mymensingh Austin', '1dcccffc-b816-4b4a-9098-ac378c463c04', '6345a8a1d2d04d5e9f0b3fea202bbfb2', 'DR MOHSIN KHALIL', 'mohsin@gmail.com'),
(7, 4, 3, 13, 'Muhibur', 'Rahman', 'M', '9/A, Dhanmondi, Dhaka', '', 'rahman459', 'MUHIBURRAHMAN', 'muhiburrahman@gmail.com'),
(8, 4, 3, 13, 'Arup', 'Islam', 'M', '9/U, Foridpur, Dhaka', '', 'islam447', 'ANUPISLAM', 'Austinanupislam@gmail.com'),
(9, 3, 1, 12, 'Ruma', 'Afrose', 'F', '4/4, CTG road, Dhaka', '', 'afrose410', 'RUMAAFROSE', 'rumaafrose@gmail.com'),
(10, 2, 4, 10, 'Doc First name', 'Doc Last Name', 'F', 'df asdfasdf\r\npassword 123456', 'd798740a-f2e6-4fe4-9c5a-6dbf60988f47', 'e10adc3949ba59abbe56e057f20f883e', 'testdoc@email.com', 'testdoc@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_catagory`
--

CREATE TABLE `employee_catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(30) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_catagory`
--

INSERT INTO `employee_catagory` (`catagory_id`, `catagory_name`, `category_description`) VALUES
(1, 'admin', 'administrator provides both clerical and administrative support to professionals, either as part of a team or individually.'),
(2, 'doctor', 'Hospital doctors diagnose and treat medical conditions, disorders, and diseases through the application of specialist medical skills and knowledge.'),
(3, 'nurse', 'Nurses plan and provide medical and nursing care to patients in hospital.'),
(4, 'staff', 'During patient''s hospital stay, a wide range of support and administrative staff taking care of everything from laundry and meals to patient transport and maintenance.');

-- --------------------------------------------------------

--
-- Table structure for table `employment_contract`
--

CREATE TABLE `employment_contract` (
  `contract_id` int(11) NOT NULL,
  `contract_type` varchar(25) NOT NULL,
  `startdate` date NOT NULL,
  `endtime` date DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `guid` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_contract`
--

INSERT INTO `employment_contract` (`contract_id`, `contract_type`, `startdate`, `endtime`, `salary`, `guid`) VALUES
(1, 'P', '0000-00-00', '0000-00-00', 0, ''),
(2, 'Pa', '0000-00-00', '0000-00-00', 0, ''),
(3, 'F', '0000-00-00', '0000-00-00', 0, ''),
(4, 'F', '2010-08-14', '2019-08-19', 500000, 'eeef6fd6-ce5a-427a-a602-859d4a0a1b86');

-- --------------------------------------------------------

--
-- Table structure for table `patient_biodata`
--

CREATE TABLE `patient_biodata` (
  `patient_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Contact_no` int(11) DEFAULT NULL,
  `problem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_biodata`
--

INSERT INTO `patient_biodata` (`patient_id`, `emp_id`, `dep_id`, `room_id`, `roomtype_id`, `firstname`, `lastname`, `age`, `gender`, `address`, `Contact_no`, `problem`) VALUES
(1, 4, 7, 4, 0, 'William ', 'Gietz', 15, 'male', 'Mariano Escobedo 999', 1582304912, 'eating disorders'),
(2, 0, 0, 0, 0, 'William ', 'Matos', 50, 'male', 'Murtenstrasse 921', 1723015471, 'food poisoning'),
(3, 0, 0, 0, 0, 'Neena ', 'Gietz Austin', 30, 'female', '9702 Chester Road', 1823015470, 'diarrhea'),
(4, 0, 0, 0, 0, 'Joshua', 'Patel', 19, 'male', '6092 Boxwood St', 1621001547, 'allergy'),
(5, 0, 0, 0, 0, 'Peter', 'Vargas', 25, 'male', '2004 Charade Rd Austin', 1723018547, 'asthma'),
(6, 0, 0, 0, 0, 'Peter', 'Tucker', 34, 'male', '2007 Zagora St', 192301144, 'ear problems');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_type_id` int(11) NOT NULL,
  `miscellaneous` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `type_id`, `location`) VALUES
(1, 3, '406'),
(2, 4, '402'),
(3, 3, '203'),
(4, 2, '312'),
(5, 3, '503'),
(6, 3, '108'),
(7, 4, '124');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `cost` int(11) NOT NULL,
  `max_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`type_id`, `type`, `cost`, `max_capacity`) VALUES
(1, 'suite', 1000, 1),
(2, 'deluxe', 750, 2),
(3, 'special ac', 600, 4),
(4, 'semi-private', 450, 8),
(5, 'general ward', 250, 10);

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `id` bigint(19) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_details` longtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `working_schedule`
--

CREATE TABLE `working_schedule` (
  `schedule_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `day` enum('saturday','sunday','monday','tuesday','wednesday','thusday','friday','SATURDAY','SUNDAY','MONDAY','TUESDAY','WEDNESDAY','THUSDAY','FRIDAY') NOT NULL,
  `starttime` varchar(10) DEFAULT '9 AM',
  `endtime` varchar(10) DEFAULT '12 PM',
  `location` varchar(50) DEFAULT NULL,
  `responsibility` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_schedule`
--

INSERT INTO `working_schedule` (`schedule_id`, `emp_id`, `day`, `starttime`, `endtime`, `location`, `responsibility`) VALUES
(1, 1, 'saturday', '8:34 ', '12:0 ', 'Main building', 'df asdf asdf'),
(2, 1, 'saturday', '12:5:', '8:0:p', 'dfa sdfasd', 'df asdfasdf'),
(3, 9, 'wednesday', '6:0:am', '11:43:am', 'df asdfasd', 'edasf sdfasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `appointment_fk_employee` (`emp_id`),
  ADD KEY `appointment_fk_patient_biodata` (`patient_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `employee_fk_emp_catagory` (`catagory_id`),
  ADD KEY `employee_fk_emp_contract` (`contract_id`),
  ADD KEY `employee_fk_dep` (`dep_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `employee_catagory`
--
ALTER TABLE `employee_catagory`
  ADD PRIMARY KEY (`catagory_id`),
  ADD UNIQUE KEY `catagory_name` (`catagory_name`);

--
-- Indexes for table `employment_contract`
--
ALTER TABLE `employment_contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `patient_biodata`
--
ALTER TABLE `patient_biodata`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patient_biodata_fk_employee` (`emp_id`),
  ADD KEY `patient_biodata_fk_department` (`dep_id`),
  ADD KEY `patient_biodata_fk_room` (`room_id`),
  ADD KEY `patient_biodata_fk_roomtype` (`roomtype_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_fk_patient_biodata` (`patient_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_fk_room_type` (`type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_schedule`
--
ALTER TABLE `working_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `working_schedule_fk_employee` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_catagory`
--
ALTER TABLE `employee_catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employment_contract`
--
ALTER TABLE `employment_contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient_biodata`
--
ALTER TABLE `patient_biodata`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `working_schedule`
--
ALTER TABLE `working_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_fk_employee` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `appointment_fk_patient_biodata` FOREIGN KEY (`patient_id`) REFERENCES `patient_biodata` (`patient_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk_dep` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`),
  ADD CONSTRAINT `employee_fk_emp_catagory` FOREIGN KEY (`catagory_id`) REFERENCES `employee_catagory` (`catagory_id`),
  ADD CONSTRAINT `employee_fk_emp_contract` FOREIGN KEY (`contract_id`) REFERENCES `employment_contract` (`contract_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_fk_patient_biodata` FOREIGN KEY (`patient_id`) REFERENCES `patient_biodata` (`patient_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_fk_room_type` FOREIGN KEY (`type_id`) REFERENCES `room_type` (`type_id`);

--
-- Constraints for table `working_schedule`
--
ALTER TABLE `working_schedule`
  ADD CONSTRAINT `working_schedule_fk_employee` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
