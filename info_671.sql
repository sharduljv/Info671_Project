-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 01:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_671`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `addressLine1` varchar(50) COLLATE utf8_bin NOT NULL,
  `addressLine2` varchar(50) COLLATE utf8_bin NOT NULL,
  `city` varchar(20) COLLATE utf8_bin NOT NULL,
  `state` varchar(20) COLLATE utf8_bin NOT NULL,
  `pincode` int(5) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `addressLine1`, `addressLine2`, `city`, `state`, `pincode`, `phone`) VALUES
(1, '3550 ', 'Market St', 'Philadelphia', 'PA', 19104, 2145343254),
(2, '3001', 'Walnut St', 'Philadelphia', 'PA', 19104, 1243221535),
(3, '3400', 'Spruce St', 'Philadelphia', 'PA', 19104, 1235342125),
(4, '51 ', 'N 39th St', 'Philadelphia', 'PA', 19104, 2143323873),
(5, '3737', 'Market Street', 'Philadephia', 'PA', 19104, 2125433123),
(6, 'The Summit', '3400 Lancaster Ave #4', 'Philadelphia', 'PA', 19104, 216654324),
(7, 'Gateway', '3535 Market St', 'Philadelphia', 'PA', 19104, 216554322),
(8, '3535', 'Market St # 3108', 'Philadelphia', 'PA', 19104, 216653434),
(9, '3401', 'Walnut Street', 'Philadephia', 'PA', 19104, 2012443212),
(10, '411 Township Line Rd', 'Elkins Park', 'Phialdelphia', 'PA', 19104, 1093223123),
(11, '2301', 'Walnut Street', 'Philadelphia', 'PA', 19104, 1255423232),
(12, '2401', 'Pennsylvania Ave', 'Philadelphia', 'PA', 19104, 2016553433);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_details`
--

CREATE TABLE `clinic_details` (
  `clinic_id` int(11) NOT NULL,
  `clinicName` varchar(50) COLLATE utf8_bin NOT NULL,
  `clinicType` varchar(20) COLLATE utf8_bin NOT NULL,
  `address` int(10) NOT NULL,
  `hours` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clinic_details`
--

INSERT INTO `clinic_details` (`clinic_id`, `clinicName`, `clinicType`, `address`, `hours`) VALUES
(1, 'Penn Dental Faculty Practice ', 'Dental', 5, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(2, 'Progress Physical Therapy', 'Physical Therapy', 6, 'Progress Physical Therapy'),
(3, 'Center for the Treatment and Study of Anxiety', 'Anxiety', 7, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(4, 'Weight & Eating Disorders: Wadden Thomas', 'Weight Managment', 8, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	Closed\r\nSaturday Closed\r\nSunday Closed');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_insurance`
--

CREATE TABLE `clinic_insurance` (
  `clinic_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clinic_insurance`
--

INSERT INTO `clinic_insurance` (`clinic_id`, `insurance_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 6),
(4, 1),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_details`
--

CREATE TABLE `hospital_details` (
  `hospital_id` int(11) NOT NULL,
  `hospitalName` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` int(10) NOT NULL,
  `hours` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_details`
--

INSERT INTO `hospital_details` (`hospital_id`, `hospitalName`, `address`, `hours`) VALUES
(1, 'The Children\'s Hospital of Philadelphia', 1, 'Always Open'),
(2, 'JFK Medical Center', 2, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(3, 'Hospital of the University of Pennsylvania', 3, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday 9AM–5PM\r\nSunday 9AM–5PM'),
(4, 'Presbyterian Medical Center', 4, 'Always Open');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_insurance`
--

CREATE TABLE `hospital_insurance` (
  `hospital_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hospital_insurance`
--

INSERT INTO `hospital_insurance` (`hospital_id`, `insurance_id`) VALUES
(1, 2),
(1, 4),
(1, 5),
(1, 6),
(2, 2),
(2, 3),
(2, 1),
(2, 4),
(3, 4),
(3, 5),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_type`
--

CREATE TABLE `insurance_type` (
  `insurance_id` int(11) NOT NULL,
  `insuranceName` varchar(50) COLLATE utf8_bin NOT NULL,
  `number` int(25) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `premium` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `insurance_type`
--

INSERT INTO `insurance_type` (`insurance_id`, `insuranceName`, `number`, `startDate`, `endDate`, `premium`) VALUES
(1, 'Aetna - Premium', 1234565631, '2017-05-01', '2017-09-25', 300),
(2, 'Allianz - Gold', 1235464563, '2016-11-23', '2017-11-29', 449),
(3, 'Geicko - Premium', 1276589893, '2016-10-17', '2017-09-20', 529),
(4, 'PSI - Gold', 2123423534, '2016-12-01', '2018-02-16', 459),
(5, 'PSI Silver', 1258743238, '2016-07-21', '2018-01-13', 768),
(6, 'General - Platinium', 2066423155, '2016-12-06', '2017-11-22', 898);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_details`
--

CREATE TABLE `pharmacy_details` (
  `pharmacy_id` int(11) NOT NULL,
  `pharmacyName` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` int(10) NOT NULL,
  `hours` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharmacy_id`, `pharmacyName`, `address`, `hours`) VALUES
(1, 'CVS', 9, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(2, 'Wellness First Compound Pharmacy', 10, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(3, 'Rite Aid', 11, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed'),
(4, 'Philadelphian Pharmacy', 12, 'Monday	9AM–5PM\r\nTuesday	9AM–5PM\r\nWednesday 9AM–5PM\r\nThursday 9AM–5PM\r\nFriday	9AM–5PM\r\nSaturday Closed\r\nSunday Closed');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_insurance`
--

CREATE TABLE `pharmacy_insurance` (
  `pharmacy_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pharmacy_insurance`
--

INSERT INTO `pharmacy_insurance` (`pharmacy_id`, `insurance_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 2),
(2, 1),
(2, 4),
(2, 6),
(2, 5),
(3, 2),
(3, 6),
(3, 3),
(4, 4),
(4, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `firstName` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LastName` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `insuranceType` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `insuranceCompany` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`firstName`, `LastName`, `birthDate`, `email`, `insuranceType`, `insuranceCompany`, `password`) VALUES
('Taral', 'Patel', '2016-10-19', 'abc@drexel.edu', 'Aetna', 'Premium', 'qwerty'),
('Deep', 'Patel', '2017-06-20', 'dds23@gmail.com', 'allianz - gold', 'baja allianz', 'ddccbbaa'),
('David', 'Shaw', '2017-06-22', 'ds160@gmail.com', 'premium', 'Geicko', 'qwerty'),
('John', 'Hall', '2017-06-05', 'jh12@gmail.com', 'PSI', 'Silver', 'abc123'),
('Lil', 'Tommy', '2017-06-20', 'lilt23@gmail.com', 'PSI', 'Gold', 'liltoobig'),
('Sammy', 'Zayn', '2017-06-27', 'sazam@gmail.com', 'platimium', 'General Insurance', 'pqrstuv');

-- --------------------------------------------------------

--
-- Table structure for table `user_favourites`
--

CREATE TABLE `user_favourites` (
  `email` varchar(20) COLLATE utf8_bin NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `pharmacy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_favourites`
--

INSERT INTO `user_favourites` (`email`, `hospital_id`, `clinic_id`, `pharmacy_id`) VALUES
('abc@drexel.edu', 1, 3, 4),
('dds23@gmail.com', 4, 2, 3),
('ds160@gmail.com', 1, 1, 1),
('jh12@gmail.com', 2, 3, 3),
('lilt23@gmail.com', 1, 3, 4),
('sazam@gmail.com', 3, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `clinic_details`
--
ALTER TABLE `clinic_details`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `hospital_details`
--
ALTER TABLE `hospital_details`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `insurance_type`
--
ALTER TABLE `insurance_type`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `clinic_details`
--
ALTER TABLE `clinic_details`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hospital_details`
--
ALTER TABLE `hospital_details`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `insurance_type`
--
ALTER TABLE `insurance_type`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharmacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
