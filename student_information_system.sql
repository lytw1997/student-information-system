-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 04:22 PM
-- Server version: 5.7.17
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
-- Database: `student_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_offerSemester` int(11) NOT NULL,
  `course_creditHour` int(11) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `course_capacity` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `course_offerSemester`, `course_creditHour`, `course_type`, `course_capacity`, `faculty_id`) VALUES
(1, 'GIG1001', 'The Islamic and Asian Civilization', 1, 2, 'University Course', 200, NULL),
(2, 'GIG1002', 'Ethnic Relations', 1, 2, 'University Course', 200, NULL),
(3, 'GIG1003', 'Basic Entrepreneurship Culture', 2, 2, 'University Course', 150, NULL),
(4, 'GIG1004', 'Information Literacy', 2, 2, 'University Course', 150, NULL),
(5, 'WIX1001', 'Computer Mathematics I', 1, 3, 'Faculty Core Course', 400, 1),
(6, 'WIX1002', 'Fundamentals of Programming', 1, 5, 'Faculty Core Course', 400, 1),
(7, 'WIX1003', 'Computer Systems and Organization', 1, 3, 'Faculty Core Course', 400, 1),
(8, 'WIX2001', 'Thinking and Communication Skills', 3, 3, 'Faculty Core Course', 400, 1),
(9, 'WIX2002', 'Project Management', 3, 3, 'Faculty Core Course', 400, 1),
(10, 'WIB1001', 'Fundamental of Multimedia', 2, 3, 'Programme Core Course', 50, 1),
(11, 'WIB1002', 'Data Structure', 2, 5, 'Programme Core Course', 350, 1),
(12, 'WIB1003', 'Data Communication and Networking', 2, 3, 'Programme Core Course', 50, 1),
(13, 'WIB2001', 'Database', 3, 3, 'Programme Core Course', 350, 1),
(14, 'WIB2002', 'Interactive Design', 3, 3, 'Programme Core Course', 50, 1),
(15, 'WIB2003', 'Probability and Statistics', 3, 3, 'Programme Core Course', 400, 1),
(16, 'WIB2004', 'Operating Systems', 3, 4, 'Programme Core Course', 50, 1),
(17, 'WIB2005', 'Open Source Programming', 4, 3, 'Programme Core Course', 200, 1),
(18, 'WIB2006', 'System Analysis, Modeling and Design', 4, 3, 'Programme Core Course', 50, 1),
(19, 'WIB2007', 'Information System Control and Security', 4, 3, 'Programme Core Course', 100, 1),
(20, 'WIG2001', 'Digital Image Processing', 4, 3, 'Specialization Elective Course', 50, 1),
(21, 'WIG2002', 'Computer Graphics', 4, 3, 'Specialization Elective Course', 50, 1),
(22, 'WIG2004', 'Audio Synthesis', 4, 3, 'Specialization Elective Course', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_timetable`
--

CREATE TABLE `course_timetable` (
  `ctimetable_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `ctimetable_day` varchar(10) NOT NULL,
  `ctimetable_start` decimal(10,2) NOT NULL,
  `ctimetable_end` decimal(10,2) NOT NULL,
  `ctimetable_examDate` date DEFAULT NULL,
  `ctimetable_lecLocation` varchar(255) NOT NULL,
  `ctimetable_examStart` decimal(10,2) DEFAULT NULL,
  `ctimetable_startTime` time NOT NULL,
  `ctimetable_endTime` time NOT NULL,
  `ctimetable_semester` int(11) NOT NULL,
  `ctimetable_session` varchar(20) NOT NULL,
  `ctimetable_examTime` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_timetable`
--

INSERT INTO `course_timetable` (`ctimetable_id`, `course_id`, `ctimetable_day`, `ctimetable_start`, `ctimetable_end`, `ctimetable_examDate`, `ctimetable_lecLocation`, `ctimetable_examStart`, `ctimetable_startTime`, `ctimetable_endTime`, `ctimetable_semester`, `ctimetable_session`, `ctimetable_examTime`) VALUES
(1, 3, 'Thursday', '17.00', '19.00', NULL, 'DK4, SAINS', NULL, '17:00:00', '19:00:00', 2, '2017/2018', '00:00:00'),
(2, 4, 'Wednesday', '12.00', '13.00', NULL, 'LIBRARY', NULL, '12:00:00', '13:00:00', 2, '2017/2018', '00:00:00'),
(3, 10, 'Monday', '14.00', '16.00', '2018-06-06', 'BK, FSKTM ', '8.30', '14:00:00', '16:00:00', 2, '2017/2018', '08:30:00'),
(4, 11, 'Thursday', '9.00', '12.00', '2018-06-08', 'MM4, FSKTM', '8.30', '09:00:00', '12:00:00', 2, '2017/2018', '08:30:00'),
(5, 12, 'Tuesday', '9.00', '11.00', '2018-06-07', 'ML, FSKTM', '8.30', '09:00:00', '11:00:00', 2, '2017/2018', '08:30:00'),
(6, 17, 'Tuesday', '14.00', '16.00', '2019-06-20', 'DK1, FSKTM', '15.00', '14:00:00', '16:00:00', 2, '2018/2019', '15:00:00'),
(7, 18, 'Monday', '14.00', '16.00', '2019-06-26', 'BK1, FSKTM', '15.00', '14:00:00', '16:00:00', 2, '2018/2019', '15:00:00'),
(8, 19, 'Wednesday', '11.00', '13.00', '2019-06-27', 'DK2, FSKTM', '11.30', '11:00:00', '13:00:00', 2, '2018/2019', '11:30:00'),
(9, 20, 'Monday', '10.00', '12.00', '2019-06-25', 'MS, FSKTM', '15.00', '10:00:00', '12:00:00', 2, '2018/2019', '15:00:00'),
(10, 21, 'Monday', '16.00', '18.00', '2018-06-29', 'MM1, FSKTM', '8.30', '16:00:00', '18:00:00', 2, '2017/2018', '08:30:00'),
(11, 22, 'Tuesday', '9.00', '12.00', '2019-06-24', 'MM4, FSKTM', '11.30', '09:00:00', '12:00:00', 2, '2018/2019', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_phone` varchar(255) NOT NULL,
  `faculty_address` varchar(255) NOT NULL,
  `faculty_website` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_email`, `faculty_phone`, `faculty_address`, `faculty_website`) VALUES
(1, 'Faculty of Computer Science and Information Technology', 'dekan_fsktm@um.edu.my', '03-79676300', 'University of Malaya, 50603 Kuala Lumpur, Federal Territory of Kuala Lumpur', 'http://www.fsktm.um.edu.my/');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programme_id` int(11) NOT NULL,
  `programme_name` varchar(255) NOT NULL,
  `programme_description` varchar(255) NOT NULL,
  `programme_studentNumber` int(11) NOT NULL,
  `programme_code` varchar(10) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programme_id`, `programme_name`, `programme_description`, `programme_studentNumber`, `programme_code`, `faculty_id`) VALUES
(1, 'Bachelor of Computer Science (Computer System and Network)', 'The purpose of this programme is to produce graduates who understand and able to apply the knowledge in networking and the theory of computer systems.', 1, 'WIC', 1),
(2, 'Bachelor of Computer Science (Artificial Intelligence)', 'This programme equips students with the knowledge and skills to design and develop computer systems that emulate and exhibit human intelligence. ', 0, 'WID', 1),
(3, 'Bachelor of Computer Science (Information Systems)', 'This programme aims to equip graduates with the ability to apply the concepts and principles of Information Systems to support the design, development and management of Information Systems.', 0, 'WIE', 1),
(4, 'Bachelor of Computer Science (Software Engineering)', 'This programme offers a comprehensive look into the world of software engineering by providing the students with not only the theoretical and technical knowledge but the skills needed in various other related aspects of software engineering.', 0, 'WIF', 1),
(5, 'Bachelor of Information Technology (Multimedia)', 'This programme aims to produce graduates with knowledge and skills in the field of information technology and multimedia computing.', 1, 'WIG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `registration_status` varchar(20) NOT NULL,
  `registration_session` varchar(255) NOT NULL,
  `registration_semester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `registration_status`, `registration_session`, `registration_semester`) VALUES
(1, 'Closed', '2017/2018', 1),
(2, 'Closed', '2017/2018', 2),
(3, 'Closed', '2018/2019', 1),
(4, 'Open', '2018/2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_phone` varchar(20) DEFAULT NULL,
  `student_gender` varchar(10) DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_address` varchar(255) DEFAULT NULL,
  `student_faculty` varchar(255) NOT NULL,
  `student_degree` varchar(255) NOT NULL,
  `student_matric` varchar(10) NOT NULL,
  `student_ic` varchar(20) NOT NULL,
  `student_userid` int(11) DEFAULT NULL,
  `student_year` int(11) NOT NULL,
  `student_session` varchar(10) NOT NULL,
  `student_semester` int(11) NOT NULL,
  `student_creditHour` int(11) DEFAULT NULL,
  `student_currentSemester` int(11) NOT NULL,
  `student_sessionIntake` varchar(30) NOT NULL,
  `student_currentCGPA` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_phone`, `student_gender`, `student_dob`, `student_address`, `student_faculty`, `student_degree`, `student_matric`, `student_ic`, `student_userid`, `student_year`, `student_session`, `student_semester`, `student_creditHour`, `student_currentSemester`, `student_sessionIntake`, `student_currentCGPA`) VALUES
(1, 'DEMO2', 'demo2@gmail.com', '012-3456789', 'Male', '1998-01-01', 'Jalan demo, Demo2', 'Faculty of Computer Science and Information Technology', 'Bachelor of Information Technology (Multimedia)', 'WIG170001', '980101-16-2477', 2, 2, '2018/2019', 2, 22, 4, '2017/2018, Semester 1', '3.00'),
(2, 'DEMO1', NULL, NULL, NULL, NULL, NULL, 'Faculty of Computer Science and Information Technology', 'Bachelor of Computer Science (Computer System and Network)', 'WIC180001', '980514-15-5976', NULL, 1, '2018/2019', 1, 18, 1, '2018/2019, Semester 1', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `scourse_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `scourse_grade` varchar(4) DEFAULT NULL,
  `scourse_gradePoint` decimal(10,1) DEFAULT NULL,
  `student_semester` int(11) NOT NULL,
  `student_session` varchar(20) NOT NULL,
  `student_currentSemester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`scourse_id`, `course_id`, `student_id`, `scourse_grade`, `scourse_gradePoint`, `student_semester`, `student_session`, `student_currentSemester`) VALUES
(1, 1, 1, 'A', '8.0', 1, '2017/2018', 1),
(2, 2, 1, 'A-', '7.4', 1, '2017/2018', 1),
(3, 3, 1, 'A', '8.0', 2, '2017/2018', 2),
(4, 4, 1, 'A', '8.0', 2, '2017/2018', 2),
(5, 10, 1, 'A', '12.0', 1, '2017/2018', 1),
(6, 11, 1, 'A+', '20.0', 2, '2017/2018', 2),
(7, 12, 1, 'A', '12.0', 2, '2017/2018', 2),
(8, 13, 1, 'A', '12.0', 3, '2018/2019', 1),
(9, 14, 1, 'A+', '12.0', 3, '2018/2019', 1),
(10, 15, 1, 'A+', '12.0', 3, '2018/2019', 1),
(11, 16, 1, 'A+', '16.0', 3, '2018/2019', 1),
(12, 5, 1, 'A', '12.0', 1, '2017/2018', 1),
(13, 6, 1, 'A', '20.0', 1, '2017/2018', 1),
(14, 7, 1, 'A+', '12.0', 1, '2017/2018', 1),
(15, 8, 1, 'A', '12.0', 3, '2018/2019', 1),
(16, 9, 1, 'A', '12.0', 3, '2018/2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `register_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_matric` varchar(10) NOT NULL,
  `student_ic` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`register_id`, `student_id`, `student_matric`, `student_ic`) VALUES
(1, 1, 'WIG170001', '980101-16-2477'),
(2, 2, 'WIC180001', '980514-15-5976'),
(3, 3, 'WIa132sa1', '23132165');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin1234', 'staff'),
(2, 'demo2', 'Demo2', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_timetable`
--
ALTER TABLE `course_timetable`
  ADD PRIMARY KEY (`ctimetable_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_matric` (`student_matric`),
  ADD KEY `student_ic` (`student_ic`),
  ADD KEY `student_userid` (`student_userid`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`scourse_id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`register_id`),
  ADD UNIQUE KEY `student_matric_2` (`student_matric`),
  ADD UNIQUE KEY `student_ic_2` (`student_ic`),
  ADD KEY `student_matric` (`student_matric`),
  ADD KEY `student_ic` (`student_ic`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `course_timetable`
--
ALTER TABLE `course_timetable`
  MODIFY `ctimetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `scourse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
