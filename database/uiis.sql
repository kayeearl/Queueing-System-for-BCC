-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 03:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiis`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Stud_Id` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Stud_Id`, `password`, `account_type`, `profile_pic`) VALUES
(123456, '123456789', 'student', 'dist/img/avatar2.png'),
(123457, '123456789', 'student', 'dist/img/avatar.png'),
(123458, 'admin', 'admin', 'dist/img/pic.png'),
(123459, '123', 'student', 'dist/img/pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `office` varchar(200) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_transact` date NOT NULL DEFAULT current_timestamp(),
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `office`, `fullname`, `username`, `password`, `date_transact`, `counter`) VALUES
(456785, 'accounting', 'Juan Santos', 'juan@cspc.com', 'admin', '2021-11-04', 0),
(456786, 'admission', 'Roegela Cabanes', 'roegelac@cspc.com', 'admin', '2021-11-04', 0),
(456787, 'registrar', '', '', '', '2021-11-04', 0),
(456789, 'cashier', '', '', '', '2021-11-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashier_transaction`
--

CREATE TABLE `cashier_transaction` (
  `Trans_No` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Stud_Id` int(20) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashier_transaction`
--

INSERT INTO `cashier_transaction` (`Trans_No`, `Stud_Id`, `purpose`, `quantity`, `total_amount`, `date`) VALUES
(0000000001, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 19:10:02'),
(0000000002, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 19:11:11'),
(0000000003, 123456, 'Certification of Grades', 1, 10, '2021-10-13 19:11:11'),
(0000000004, 123456, 'Good Moral', 1, 10, '2021-10-13 19:11:11'),
(0000000005, 123456, 'ID Cord', 1, 10, '2021-10-13 19:11:11'),
(0000000006, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 19:50:26'),
(0000000007, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 19:52:17'),
(0000000008, 123456, 'ID Fee Renewal', 1, 10, '2021-10-13 19:52:17'),
(0000000009, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 19:52:33'),
(0000000010, 123456, 'Authentication of Grades', 1, 10, '2021-10-13 21:19:17'),
(0000000011, 123456, 'Certification of Grades', 1, 10, '2021-10-13 21:19:17'),
(0000000012, 123456, 'Authentication of Grades', 2, 20, '2021-10-15 02:13:19'),
(0000000013, 123456, 'Good Moral', 2, 20, '2021-10-15 02:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `email` int(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile_pic` varchar(20) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`email`, `password`, `profile_pic`, `account_type`) VALUES
(123456, '12356789', 'dist/img/avatar2.png', 'student'),
(123457, '123456789', 'dist/img/avatar.png', 'student'),
(123458, '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `queueing_list`
--

CREATE TABLE `queueing_list` (
  `id` int(11) NOT NULL,
  `Stud_Id` int(20) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `date_transaction` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queueing_list`
--

INSERT INTO `queueing_list` (`id`, `Stud_Id`, `transaction_type`, `transaction_id`, `date_transaction`, `status`) VALUES
(9, 123456, 'cashier', 1, '2021-11-04', 0),
(10, 123456, 'cashier', 2, '2021-11-04', 0),
(11, 123456, 'cashier', 3, '2021-11-04', 0),
(12, 123456, 'cashier', 4, '2021-11-04', 0),
(13, 123457, 'cashier', 5, '2021-11-04', 0),
(16, 123456, 'cashier', 6, '2021-11-04', 0),
(17, 123456, 'cashier', 7, '2021-11-04', 0),
(52, 123456, 'cashier', 1, '2021-11-07', 1),
(53, 123456, 'cashier', 1, '2021-11-07', 1),
(54, 123456, 'cashier', 1, '2021-11-07', 1),
(55, 123456, 'cashier', 1, '2021-11-07', 1),
(56, 123456, 'cashier', 1, '2021-11-07', 1),
(57, 123456, 'cashier', 1, '2021-11-07', 1),
(58, 123456, 'cashier', 1, '2021-11-07', 1),
(59, 123456, 'cashier', 1, '2021-11-07', 1),
(60, 123456, 'cashier', 1, '2021-11-07', 1),
(61, 123456, 'cashier', 1, '2021-11-07', 1),
(62, 123456, 'cashier', 1, '2021-11-07', 1),
(63, 123456, 'cashier', 1, '2021-11-07', 1),
(64, 123457, 'cashier', 1, '2021-11-07', 1),
(65, 123457, 'cashier', 0, '2021-11-07', 1),
(66, 123457, 'cashier', 1, '2021-11-07', 1),
(67, 123457, 'cashier', 1, '2021-11-07', 1),
(68, 123457, 'cashier', 1, '2021-11-07', 1),
(69, 123457, 'cashier', 1, '2021-11-07', 1),
(70, 123457, 'cashier', 1, '2021-11-07', 1),
(71, 123457, 'cashier', 1, '2021-11-07', 1),
(72, 123457, 'cashier', 0, '2021-11-07', 1),
(73, 123457, 'cashier', 0, '2021-11-07', 1),
(74, 123457, 'cashier', 0, '2021-11-07', 1),
(75, 123457, 'cashier', 0, '2021-11-07', 1),
(76, 123457, 'cashier', 0, '2021-11-07', 1),
(77, 123457, 'cashier', 0, '2021-11-07', 1),
(78, 123457, 'cashier', 0, '2021-11-07', 1),
(79, 123457, 'cashier', 1, '2021-11-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stud_Id` int(20) NOT NULL,
  `Stud_Fname` varchar(45) NOT NULL,
  `Stud_Mname` varchar(45) NOT NULL,
  `Stud_Lname` varchar(45) NOT NULL,
  `Stud_Address` varchar(45) NOT NULL,
  `Stud_Sex` varchar(45) NOT NULL,
  `Stud_Bday` date NOT NULL,
  `Stud_Contact` varchar(45) NOT NULL,
  `Stud_Program` varchar(45) NOT NULL,
  `Stud_Email` varchar(45) NOT NULL,
  `Queueing_Queueing_No` int(20) NOT NULL,
  `Course_Crs_No` int(20) NOT NULL,
  `Assessment_Assessment_Id` int(20) NOT NULL,
  `Instructor_Ins_Id` int(20) NOT NULL,
  `Instructor_Ins_Id1` int(20) NOT NULL,
  `Instructor_Master_List_MList_Id` int(45) NOT NULL,
  `Instructor_Master_List_Registrar` int(45) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stud_Id`, `Stud_Fname`, `Stud_Mname`, `Stud_Lname`, `Stud_Address`, `Stud_Sex`, `Stud_Bday`, `Stud_Contact`, `Stud_Program`, `Stud_Email`, `Queueing_Queueing_No`, `Course_Crs_No`, `Assessment_Assessment_Id`, `Instructor_Ins_Id`, `Instructor_Ins_Id1`, `Instructor_Master_List_MList_Id`, `Instructor_Master_List_Registrar`, `account_type`) VALUES
(123456, 'Kaye Earl', 'Badilla', 'Bufete', 'Baao, Camarines Sur', '', '0000-00-00', '194575121', 'Bachelor of Science in Information Technology', 'kbufete@my.cspc.edu.ph', 0, 0, 0, 0, 0, 0, 0, ''),
(123457, 'Juan', 'Dela', 'Cruz', 'Nabua', '', '0000-00-00', '126498798', '', 'juancruz@my.cspc.edu.ph', 0, 0, 0, 0, 0, 0, 0, ''),
(123458, 'Admin', '', '', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, ''),
(123459, 'Abegail', 'Coronal', 'Martinez', '', '', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Stud_Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashier_transaction`
--
ALTER TABLE `cashier_transaction`
  ADD PRIMARY KEY (`Trans_No`),
  ADD KEY `Stud_Id` (`Stud_Id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `queueing_list`
--
ALTER TABLE `queueing_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Stud_Id` (`Stud_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stud_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Stud_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123460;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456790;

--
-- AUTO_INCREMENT for table `cashier_transaction`
--
ALTER TABLE `cashier_transaction`
  MODIFY `Trans_No` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `queueing_list`
--
ALTER TABLE `queueing_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`Stud_Id`) REFERENCES `student` (`Stud_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cashier_transaction`
--
ALTER TABLE `cashier_transaction`
  ADD CONSTRAINT `PK_1` FOREIGN KEY (`Stud_Id`) REFERENCES `student` (`Stud_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`email`) REFERENCES `student` (`Stud_Id`);

--
-- Constraints for table `queueing_list`
--
ALTER TABLE `queueing_list`
  ADD CONSTRAINT `PK_queue` FOREIGN KEY (`Stud_Id`) REFERENCES `student` (`Stud_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
