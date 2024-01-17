-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 03:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `collegename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `collegename`, `email`, `password`) VALUES
(1, 'Bengaluru City University', 'bcu@gmail.com', '123'),
(2, 'Yuvarajas college of mysore', 'ycm@gmail.com', '123'),
(3, 'maharaja college of mysore', 'mcm@gmail.com', '123'),
(4, 'Maharani Cluster University', 'mcu@gmail.com', '123'),
(5, 'Bangalore University', 'bu@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `buspass`
--

CREATE TABLE `buspass` (
  `bp_id` int(11) NOT NULL,
  `Reg_no` varchar(100) NOT NULL,
  `doc_upload` varchar(11) NOT NULL,
  `doc_upload2` varchar(255) NOT NULL,
  `Startingpoint` varchar(255) NOT NULL,
  `endingpoint` varchar(255) NOT NULL,
  `change_over` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buspass`
--

INSERT INTO `buspass` (`bp_id`, `Reg_no`, `doc_upload`, `doc_upload2`, `Startingpoint`, `endingpoint`, `change_over`, `status`) VALUES
(5, ' YBC17158', 'Doc_photos/', 'Doc_photos/166127397755.png', 'bangalore', 'mysore', 'madhur', 3),
(6, ' S10303', 'Doc_photos/', 'Doc_photos/1694348636791.jpg', 'Whitefield', 'Majestic', 'Marathalli', 3),
(7, ' 0044', 'Doc_photos/', 'Doc_photos/1694351495306.png', 'kr puram', 'majestic', 'corporation', 3),
(8, ' 123', 'Doc_photos/', 'Doc_photos/1694600713454.jfif', 'kadugodi', 'marathalli', 'hopefarm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Ksrtc_id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Ksrtc_id`, `email`, `password`, `number`) VALUES
(1, 'ksrtc@gmail.com', '123', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `Reg_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `Year` varchar(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `Cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `Reg_no`, `name`, `email`, `gender`, `password`, `photo`, `Year`, `phone`, `admin_id`, `Cpassword`) VALUES
(5, 'YBC17158', 'Vivek R Venkatesh', 'vivekrvenkatesh96@gmail.com', 'Male', '123', 'student_photos/1661273863856.jpg', '1', 9480208270, '2', '123'),
(6, 'S10303', 'shazia begum', 'shazia@gmail.com', 'Female', '123', 'student_photos/1694348564737.jpg', '2', 8660384015, '1', '123'),
(7, '0044', 'Archana', 'achu@gmail.com', 'Female', '321', 'student_photos/169435143586.jfif', '2', 9868952310, '1', '321'),
(8, '123', 'leela', 'leela@gmail.com', 'Female', '123', 'student_photos/1694600641912.jfif', '2', 9868952310, '4', '123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1`
-- (See below for the actual view)
--
CREATE TABLE `v1` (
`Reg_no` varchar(50)
,`name` varchar(100)
,`email` varchar(100)
,`gender` varchar(30)
,`photo` varchar(500)
,`admin_id` varchar(10)
,`doc_upload` varchar(11)
,`bp_id` int(11)
,`doc_upload2` varchar(255)
,`Startingpoint` varchar(255)
,`endingpoint` varchar(255)
,`change_over` varchar(255)
,`status` int(10)
);

-- --------------------------------------------------------

--
-- Structure for view `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1`  AS SELECT `student`.`Reg_no` AS `Reg_no`, `student`.`name` AS `name`, `student`.`email` AS `email`, `student`.`gender` AS `gender`, `student`.`photo` AS `photo`, `student`.`admin_id` AS `admin_id`, `buspass`.`doc_upload` AS `doc_upload`, `buspass`.`bp_id` AS `bp_id`, `buspass`.`doc_upload2` AS `doc_upload2`, `buspass`.`Startingpoint` AS `Startingpoint`, `buspass`.`endingpoint` AS `endingpoint`, `buspass`.`change_over` AS `change_over`, `buspass`.`status` AS `status` FROM (`student` join `buspass` on(`student`.`sid` = `buspass`.`bp_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buspass`
--
ALTER TABLE `buspass`
  ADD PRIMARY KEY (`bp_id`),
  ADD UNIQUE KEY `Reg_no` (`Reg_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Ksrtc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `usn` (`Reg_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buspass`
--
ALTER TABLE `buspass`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Ksrtc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
