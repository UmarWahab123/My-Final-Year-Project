-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 07:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uob`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `upass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `upass`) VALUES
(1, 'ata@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admission_rules`
--

CREATE TABLE `admission_rules` (
  `adm_rule_id` int(30) NOT NULL,
  `Adm_rule` text NOT NULL,
  `program_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_rules`
--

INSERT INTO `admission_rules` (`adm_rule_id`, `Adm_rule`, `program_id`) VALUES
(12, 'Student should completed 12 years education', 1),
(13, 'Student should have secured minimum 50 percent marks', 1),
(14, 'Student should completed 14 years education', 3),
(15, 'Student should have secured minimum 45 percent marks', 3);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(30) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `credit_hrs` int(30) NOT NULL,
  `depart_id` int(30) NOT NULL,
  `program_id` int(20) NOT NULL,
  `semester_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `credit_hrs`, `depart_id`, `program_id`, `semester_id`) VALUES
(51, 'Statestics', 100, 9, 0, 2),
(52, 'pak study', 100, 9, 0, 2),
(53, 'abc', 100, 9, 0, 2),
(54, 'S/w design project 1', 100, 9, 0, 3),
(55, 'Data structures and algorithm', 100, 9, 0, 3),
(56, 'differential equation', 100, 9, 0, 3),
(57, 'Batny', 100, 10, 0, 1),
(58, 'Biology', 100, 10, 0, 1),
(59, 'English', 100, 10, 0, 2),
(60, 'English 2', 100, 10, 0, 2),
(61, 'English 3', 100, 10, 0, 3),
(62, 'Batny3', 100, 10, 0, 3),
(63, 'introduction to comestry', 100, 10, 0, 3),
(64, 'Statestics', 3, 10, 0, 5),
(65, 'maths', 3, 10, 0, 1),
(66, 'intro to computer', 3, 10, 0, 4),
(67, 'Matlab', 3, 10, 0, 8),
(68, 'Animal', 3, 10, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `depart_id` int(20) NOT NULL,
  `depart_name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`depart_id`, `depart_name`, `description`) VALUES
(9, 'Computer Science', 'Enter Description'),
(10, 'Zoology', 'Enter Description'),
(11, 'maths', 'Enter Description'),
(12, 'Physics', 'Enter Description');

-- --------------------------------------------------------

--
-- Table structure for table `download_files`
--

CREATE TABLE `download_files` (
  `file_id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(20) NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`img_id`, `img_path`) VALUES
(52, 'photos/pp.jpg'),
(53, 'photos/march2020.jpg'),
(54, 'photos/ppp.jpg'),
(55, 'photos/pppp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `heading`, `url`, `date`, `description`) VALUES
(20, 'admission open', 'khkjhkasdkjasdf ksdhfkjas', 'http://', '13-Oct-2016', 'asdjfkldjsalfadsf sdfjkladjsfklas asdfjadklsf adsfjadklsf askldfjlasjdf\r\nasdfadkslfjklads\r\n sdlfjadskl last date for application submittion'),
(21, 'Muhammad Hisham', 'Muhammad Hisham', 'http://', '11-Dec-2020', 'Student'),
(22, 'Umar Wahab', 'Umar Wahab', 'http://', '11-Dec-2020', 'Student'),
(23, 'Shah Zamin Khan', 'Shah Zamin Khan', 'http://', '11-Dec-2020', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(20) NOT NULL,
  `program_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`) VALUES
(1, 'BS Hons'),
(3, 'MCS');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qual_id` int(30) NOT NULL,
  `Qualification` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qual_id`, `Qualification`) VALUES
(1, 'SSC Arts'),
(2, 'SSC Arts'),
(3, 'SSC science'),
(4, 'FA '),
(5, 'FSC'),
(6, 'BA'),
(7, 'BSC'),
(8, 'MA'),
(9, 'MSC'),
(10, 'BS'),
(11, 'MS'),
(12, 'PHD'),
(13, 'POST DOC');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(20) NOT NULL,
  `depart_id` int(100) NOT NULL,
  `semester_id` int(100) NOT NULL,
  `staff_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `exam` varchar(100) NOT NULL,
  `subDate` text NOT NULL,
  `proforma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `depart_id`, `semester_id`, `staff_id`, `subject_id`, `exam`, `subDate`, `proforma`) VALUES
(2, 10, 1, 7, 57, 'spring-2010', '29-09-2019', 'lab'),
(3, 10, 6, 9, 0, 'fall-2027', '18-01-2020', 'lab'),
(4, 10, 8, 7, 67, 'fall-2016', '18-01-2020', 'lab'),
(5, 10, 4, 7, 66, 'fall-2015', '19-01-2020', 'lab'),
(6, 10, 4, 7, 68, 'fall-2015', '19-01-2020', 'lab'),
(7, 9, 3, 1, 55, 'spring-2020', '11-12-2020', 'lab');

-- --------------------------------------------------------

--
-- Table structure for table `result_detail`
--

CREATE TABLE `result_detail` (
  `result_id` int(100) NOT NULL,
  `reg_no` varchar(200) NOT NULL,
  `mid` int(100) NOT NULL,
  `final` int(100) NOT NULL,
  `assign` int(20) NOT NULL,
  `pres` int(20) NOT NULL,
  `quizz` int(20) NOT NULL,
  `lab` int(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_detail`
--

INSERT INTO `result_detail` (`result_id`, `reg_no`, `mid`, `final`, `assign`, `pres`, `quizz`, `lab`, `total`) VALUES
(3, '1234', 2, 50, 2, 2, 2, 2, 60),
(3, '234', 0, 0, 0, 0, 0, 0, 0),
(4, '1234', 20, 33, 2, 4, 2, 10, 71),
(4, '234', 22, 22, 3, 5, 1, 1, 53),
(5, '12', 30, 33, 1, 2, 2, 2, 70),
(5, '1587', 0, 0, 0, 0, 0, 0, 0),
(6, '12', 30, 40, 2, 3, 3, 9, 87),
(6, '1587', 25, 45, 2, 3, 3, 8, 86),
(7, '11', 20, 30, 1, 4, 2, 6, 63);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(30) NOT NULL,
  `semester_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`) VALUES
(1, '1st Semester'),
(2, '2nd Semester'),
(3, '3rd Semester'),
(4, '4th Semester'),
(5, '5th Semester'),
(6, '6th Semester'),
(7, '7th Semester'),
(8, '8th Semester');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img_path` text NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `paddress` text NOT NULL,
  `depart_id` int(20) NOT NULL,
  `qual_id` int(20) NOT NULL,
  `qual_majors` varchar(100) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `staff_category` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `img_path`, `contact_no`, `paddress`, `depart_id`, `qual_id`, `qual_majors`, `designation`, `staff_category`, `email`, `password`) VALUES
(1, 'Sir Khaista Khan', 'staff_photos/Khaista Khan.jpg', '7678687687', 'Pirbaba Buner', 9, 11, 'Database JS', 'Assistant Professor', 'HOD', 'kk@gmail.com', '1234'),
(2, 'Sir Inayat Khan', 'staff_photos/Sir Inayat Khan.jpg', '7678687687', 'dssd', 9, 9, 'wdssd', 'Assistant Professor', 'other', 'in@gaiml.com', '123'),
(3, 'Sir Shahid Rahman', 'staff_photos/Shahid Rahman.jpeg', '7678687687', 'adfs', 9, 11, 'xvd', 'professor', 'HOD', 'nn@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_reg_no` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `std_img` text NOT NULL,
  `fname` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `paddress` text NOT NULL,
  `depart_id` int(20) NOT NULL,
  `semester_id` int(20) NOT NULL,
  `promotion_date` varchar(100) NOT NULL,
  `session` varchar(50) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_reg_no`, `name`, `gender`, `std_img`, `fname`, `contact_no`, `paddress`, `depart_id`, `semester_id`, `promotion_date`, `session`, `email`) VALUES
('11', 'Asad', 'Male', 'std_photos/availability_icon.jpg', 'amir', '564456456', 'dfsdfsdf', 9, 3, '2020-12-11', '2020', 'df@gmail.com'),
('12', 'Khan', 'Male', 'std_photos/20171120_092941.jpg', 'asdf', '03339797301', 'hsghad', 10, 4, '2020-01-19', '2015', 'nnn@gmail.com'),
('1234', 'marwan', 'Male', 'std_photos/customer.png', 'rahman', '9082349589034', 'asdfads', 10, 8, '', '2016', 'ali@gmail.com'),
('1587', 'aqib', 'Female', 'std_photos/20171120_093607.jpg', 'asdf', '03339797301', 'wdjdjsjjd', 10, 4, '2020-01-19', '2015', 'nnn@gmail.com'),
('234', 'werq', '', 'std_photos/DSCN1903.JPG', 'qewr', '24234234', 'adfas', 10, 8, '2015-06-06', '234', 'khan@gmail.com'),
('32', 'ada', 'Male', 'std_photos/20171106_085131.jpg', 'asdf', '7678687687', 'adsfa', 10, 7, '2020-01-18', '300', 'nnn@gmail.com'),
('4444', 'ads', 'Male', 'std_photos/calendar.png', 'asdfasdf', '24234234', 'ad', 9, 1, '2015-01-06', '2016', 'khan@gmail.com'),
('cs1902', 'waqar', 'Male', 'std_photos/availability_icon.jpg', 'jameel', '24234234', 'asdf', 9, 1, '2015-01-06', '2016', 'khan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_assigned`
--

CREATE TABLE `subjects_assigned` (
  `assign_id` int(11) NOT NULL,
  `depart_id` int(20) NOT NULL,
  `staff_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `semester_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_assigned`
--

INSERT INTO `subjects_assigned` (`assign_id`, `depart_id`, `staff_id`, `subject_id`, `semester_id`) VALUES
(1, 10, 7, 57, 1),
(2, 10, 7, 66, 4),
(3, 9, 1, 55, 3),
(4, 10, 7, 67, 8),
(5, 10, 7, 68, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_rules`
--
ALTER TABLE `admission_rules`
  ADD PRIMARY KEY (`adm_rule_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `download_files`
--
ALTER TABLE `download_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qual_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_reg_no`);

--
-- Indexes for table `subjects_assigned`
--
ALTER TABLE `subjects_assigned`
  ADD PRIMARY KEY (`assign_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admission_rules`
--
ALTER TABLE `admission_rules`
  MODIFY `adm_rule_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `depart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `download_files`
--
ALTER TABLE `download_files`
  MODIFY `file_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qual_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects_assigned`
--
ALTER TABLE `subjects_assigned`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
