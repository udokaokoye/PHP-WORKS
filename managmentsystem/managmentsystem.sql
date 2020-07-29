-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 10:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Mname` text NOT NULL,
  `Lname` text NOT NULL,
  `Passport` blob NOT NULL,
  `Username` text NOT NULL,
  `email` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Fname`, `Mname`, `Lname`, `Passport`, `Username`, `email`, `Password`) VALUES
(70, '', '', '', '', 'Okoye Udoka', 'leviokoye@gmail.com', '43b3f5145f953d2a08ac08720272fba8'),
(73, 'Udochukwuka', 'Levi', 'Okoye', '', 'leviokoye', 'leviokoye@gmail.com1', '20e9ae5ab5b9beb86d45ffb31a6376b0'),
(77, 'Udochukwuka', 'Levi', 'Okoye', 0x6368756b77752e4a5047, 'udochukwuka', 'leviokoye@gmail.com', 'c95b295c7bd86100b11782e994eabe78');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `Teacher` text NOT NULL,
  `Subject` text NOT NULL,
  `Reciever` text NOT NULL,
  `Assignment` text NOT NULL,
  `Attachment` mediumblob NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `Teacher`, `Subject`, `Reciever`, `Assignment`, `Attachment`, `Time`) VALUES
(32, 'Mr. Ogele Emmanuel', 'Mathematics', 'Students', 'dgdgdgdgdgdd', '', '2020-06-30 21:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `id` int(11) NOT NULL,
  `Student_Name` text NOT NULL,
  `Class` text NOT NULL,
  `Department` text NOT NULL,
  `Attendance_Status` text NOT NULL,
  `Date` text NOT NULL,
  `Time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`id`, `Student_Name`, `Class`, `Department`, `Attendance_Status`, `Date`, `Time`) VALUES
(25, 'Udoka Okoye', 'SSS 3', 'Science', 'Present', '2020-05-26', '13:55:24'),
(26, 'John Samuel', 'SSS 3', 'Art', 'Absent', '2020-05-26', '13:55:24'),
(27, 'Esther Okoye', 'SSS 3', 'Science', 'Present', '2020-05-26', '13:55:24'),
(28, 'Udoka Okoye', 'SSS 3', 'Science', 'Present', '2020-05-29', '17:35:05'),
(29, 'John Samuel', 'SSS 3', 'Art', 'Present', '2020-05-29', '17:35:05'),
(30, 'aba sssss', 'SSS 3', 'Science', 'Absent', '2020-05-29', '17:35:05'),
(31, 'Esther Okoye', 'SSS 3', 'Science', 'Absent', '2020-05-29', '17:35:05'),
(32, 'aaaaaa@ssss Okoye', 'SSS 1', 'Science', 'Present', '2020-05-30', '09:57:25'),
(33, 'pop pop', 'SSS 1', 'Science', 'Absent', '2020-05-30', '09:57:25'),
(34, 'Udoka Okoye', 'SSS 3', 'Science', 'Present', '2020-05-30', '10:52:25'),
(35, 'John Samuel', 'SSS 3', 'Art', 'Present', '2020-05-30', '10:52:25'),
(36, 'aba sssss', 'SSS 3', 'Science', 'Absent', '2020-05-30', '10:52:25'),
(37, 'Esther Okoye', 'SSS 3', 'Science', 'Present', '2020-05-30', '10:52:25'),
(38, 'Udoka Okoye', 'SSS 3', 'Science', 'Present', '2020-07-01', '21:39:30'),
(39, 'John Samuel', 'SSS 3', 'Art', 'Absent', '2020-07-01', '21:39:30'),
(40, 'aba sssss', 'SSS 3', 'Science', 'Present', '2020-07-01', '21:39:30'),
(41, 'Esther Okoye', 'SSS 3', 'Science', 'Present', '2020-07-01', '21:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `Sender` text NOT NULL,
  `Reciever` text NOT NULL,
  `Message` text NOT NULL,
  `Attachment` blob NOT NULL,
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `Times` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `Teacher` text NOT NULL,
  `Subject` text NOT NULL,
  `Reciever` text NOT NULL,
  `Note_Text` text NOT NULL,
  `Note_File` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `Teacher`, `Subject`, `Reciever`, `Note_Text`, `Note_File`) VALUES
(3, 'Mr. Ogele Emmanuel', 'Mathematics', 'Students', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'circles.html'),
(5, 'Mr. Ogele Emmanuel', 'Mathematics', 'Students', 'hhhhhhhhhhhhhhhhhhhhh\r\nh\r\nhhhhhhhhhhhhhhhhh\r\nhhhhhhhhhhhhhhhhhhhhh\r\nhhhhhhhhhhhhhhhhhh', 'kliq.mp3'),
(6, 'Mr. Ogele Emmanuel', 'Mathematics', 'Students', 'ggggggggggggg', ''),
(7, 'Mr. Ogele Emmanuel', 'Mathematics', 'SSS 3-Science', 'fggfggf', 'buzz.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Mname` text NOT NULL,
  `Lname` text NOT NULL,
  `Class` text NOT NULL,
  `Class_Teacher` text NOT NULL,
  `Department` text NOT NULL,
  `Gender` text NOT NULL,
  `DOB` text NOT NULL,
  `SOO` text NOT NULL,
  `LGA` text NOT NULL,
  `Religion` text NOT NULL,
  `Address` text NOT NULL,
  `Contact` text NOT NULL,
  `Email` text NOT NULL,
  `Passport` blob NOT NULL,
  `F_Fname` text NOT NULL,
  `F_Lname` text NOT NULL,
  `F_SOO` text NOT NULL,
  `F_Contact` text NOT NULL,
  `F_Email` text NOT NULL,
  `M_Fname` text NOT NULL,
  `M_Lname` text NOT NULL,
  `M_SOO` text NOT NULL,
  `M_Contact` text NOT NULL,
  `M_Email` text NOT NULL,
  `Parent_Address` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Date_Modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Fname`, `Mname`, `Lname`, `Class`, `Class_Teacher`, `Department`, `Gender`, `DOB`, `SOO`, `LGA`, `Religion`, `Address`, `Contact`, `Email`, `Passport`, `F_Fname`, `F_Lname`, `F_SOO`, `F_Contact`, `F_Email`, `M_Fname`, `M_Lname`, `M_SOO`, `M_Contact`, `M_Email`, `Parent_Address`, `Username`, `Password`, `Date_Modified`) VALUES
(37, 'Udoka', 'Levi', 'Okoye', 'SSS 3', 'aaaaaa', 'Science', 'Male', '2002-08-21', 'Anambra', 'Aguata', 'Christianity', '15 Fawehinmi Str Off Ojuelegba Road Surulere Lagos', '09023602053', 'leviokoye@gmail.com', 0x73747564656e74696d6167657373692e504e47, 'Henry', 'Okoye', 'Anambra', '1215478221', 'leviokoye@gmail.com', 'Chinenye', 'Okoye', 'Ana,bra', '44558755522', 'leviokoye@gmail.com', '15 Fawehinmi Str Off Ojuelegba Road Surulere Lagos', 'udokaokoye', 'bd418ab923ee3f5b7619d2b0b4d91132', '2020-05-19 19:34:27'),
(39, 'aaaaaa@ssss', 'aaaaaa@ssss', 'Okoye', 'SSS 1', '', 'Science', 'Female', '2020-05-06', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 0x73747564656e74696d6167657373692e504e47, 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'aaaaaa@ssss', 'dssdsd', 'adf0c81d151843977232fab59f6f3ee5', '2020-05-19 20:04:45'),
(40, 'pop', 'pop', 'pop', 'SSS 1', '', 'Science', 'Male', '2020-05-20', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 0x31312e706e67, 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'pop@dd', 'bobo', 'f356a9fbca9e8baa6f0b0e0e162979c0', '2020-05-19 20:18:30'),
(41, 'John', 'Ogonaya', 'Samuel', 'SSS 3', '', 'Art', 'Male', '2002-06-16', 'Abia', 'Aba', 'Christianity', '7, Awunike', '01254789', 'samueljohn@gmail.com', 0x31312e706e67, 'John', 'Samuel', 'Abia', '44', 'aba@gmail.com', 'Mary', 'Samuel', 'Abia', '3698521470', 'marysamuel@gmail.com', '22, Awunike', 'sam', '2486bb1826bc33ec6d0ebd8a91306f17', '2020-05-20 21:03:07'),
(42, 'g', '', '', '', '', '', '', '', '', '', '', '', '', '', 0x73747564656e74696d6167657373692e504e47, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-05-21 10:35:29'),
(43, 'h', '', '', '', '', '', '', '', '', '', '', '', '', '', 0x73747564656e74696d6167657373692e504e47, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-05-21 10:36:06'),
(44, 'asa', '', '', '', '', '', '', '', '', '', '', '', '', '', 0x31312e706e67, '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-05-21 11:03:46'),
(45, 'pap@pap', 'pap@pap', 'pap@pap', 'JSS 2', '', 'None', 'Male', '2020-05-30', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 0x736e69702e504e47, 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', 'pap@pap', '09dc1b429e7f90804c5f8f6931c5a561', '2020-05-21 11:12:38'),
(47, 'aba', 'okooooooooddodododooodod', 'sssss', 'SSS 3', 'Mr. Ogele Emmanuel', 'Science', 'Male', '2020-05-16', 'Imo', 'Owerri', 'Christianity', 'Addfot', '457896321', 'Osinachi@gmail.com', '', 'osinachi', 'osinachi', 'osinachi', '45', 'osinachi@aaaa', 'osinachi', 'osinachi', 'osinachi', '55', 'osinachi@aaaa', 'adpffff', 'osinachi', '40944653c651d5f7895ca1bfa8fb2315', '2020-05-21 11:30:33'),
(48, 'Esther', 'Chinenye', 'Okoye', 'SSS 3', 'Mr. Ogele Emmanuel', 'Science', 'Female', '2000-09-21', 'Anambra', 'Aguata', 'Christianity', 'sadsdasdfgjkilgjgtitkylyilly', '02105478925', 'estherokoye@gmail.com', 0x35333233393437385f323139373735383734303236323732345f3932363932383230323436313334373834305f6f2e6a7067, 'Henry', 'Okoye', 'Anambra', '2211555', 'Henry@gmail.com', 'Deborah', 'Okoye', 'Anambra', '44558755522', 'deb@gmail.com', '2sjshshshshshshd', 'esther', 'a0b1433317eb2796b968b305596c6402', '2020-05-23 20:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `Subject` text NOT NULL,
  `Teacher` text NOT NULL,
  `Category` text NOT NULL,
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `Subject`, `Teacher`, `Category`, `Date_Modified`) VALUES
(1, 'Mathematics', 'Mr. Ogele Emmanuel', 'Senior Secondary', '2020-05-20 09:12:00'),
(2, 'English', 'Mr. Amao', 'Junior Secondary', '2020-05-20 09:12:00'),
(3, 'Economics', 'Mr. James Adeleke', 'Senior Secondary', '2020-05-21 16:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Fname` text NOT NULL,
  `Mname` text NOT NULL,
  `Lname` text NOT NULL,
  `Gender` text NOT NULL,
  `DOB` text NOT NULL,
  `SOO` text NOT NULL,
  `LGA` text NOT NULL,
  `Religion` text NOT NULL,
  `Address` text NOT NULL,
  `Contact` text NOT NULL,
  `Email` text NOT NULL,
  `Passport` blob NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Class` text NOT NULL,
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `Title`, `Fname`, `Mname`, `Lname`, `Gender`, `DOB`, `SOO`, `LGA`, `Religion`, `Address`, `Contact`, `Email`, `Passport`, `Username`, `Password`, `Class`, `Date_Modified`) VALUES
(10, 'Mr.', 'Emmanuel', 'Emma', 'Ogele', 'Male', '2020-05-10', 'Anambra', 'Isialangwa', 'Christianity', '22 fghryryuy, dhye5y5545', '024445545225', 'Emmaogele@gmail.com', 0x73747564656e74696d6167657373692e504e47, 'emmaogele', '893b3a602e0b1e5c4efb5f595cb9dccc', 'SSS 3', '2020-05-20 01:57:19'),
(13, 'Mr.', 'Adeleke', 'Olaolu', 'James', 'Male', '1985-02-19', 'Kogi', 'Alaba', 'Islam', '22, Ojodu Beger, Ogun State', '08122536954', 'adelekesamson@gmail.com', 0x626c75652e504e47, 'adeleke', 'adb023bbff5a293ae2afe87c02924764', 'SSS 1', '2020-05-20 12:55:33'),
(14, 'Mr.', 'asa@aaaA', 'asa@aaaA', 'asa@aaaA', 'Male', '2020-05-20', 'asa@aaaA', 'asa@aaaA', 'asa@aaaA', 'asa@aaaA', 'asa@aaaA', 'asa@aaaA', 0x696d61676573202839292e6a706567, 'asa@aaaA', '5e1ae884088b4a835fb0976a1d4b66f6', '', '2020-05-21 04:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(11) NOT NULL,
  `ab` text NOT NULL,
  `ac` text NOT NULL,
  `ad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
