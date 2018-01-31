-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 04:32 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_details`
--

CREATE TABLE `bank_account_details` (
  `emp_id` varchar(40) NOT NULL,
  `bank_name` text NOT NULL,
  `acc_no` varchar(50) NOT NULL,
  `IFSC_code` varchar(20) NOT NULL,
  `branch` text NOT NULL,
  `bank_acc_holder_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_account_details`
--

INSERT INTO `bank_account_details` (`emp_id`, `bank_name`, `acc_no`, `IFSC_code`, `branch`, `bank_acc_holder_name`) VALUES
('jaya4972', 'cj', 'N', 'JJJJJJJJJJJ', 'JJ', 'JJ');

-- --------------------------------------------------------

--
-- Table structure for table `book_publication`
--

CREATE TABLE `book_publication` (
  `Sr_no` int(20) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `book_name` text NOT NULL,
  `coauthor_name` text NOT NULL,
  `publisher_name` text NOT NULL,
  `year_publication` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_publication`
--

INSERT INTO `book_publication` (`Sr_no`, `emp_id`, `book_name`, `coauthor_name`, `publisher_name`, `year_publication`) VALUES
(1, 'jaya4972', 'java', 'jbjn', 'hgg', 2000),
(2, 'jaya4972', 'java', 'jbjn', 'hgg', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `emp_id` varchar(40) NOT NULL,
  `designation` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`emp_id`, `designation`) VALUES
('fdg6725', 'lab_assistant,lab_attendent,'),
('fdg6725', 'lab_assistant,lab_attendent,'),
('fdg6725', 'lab_assistant,lab_attendent,'),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('fdg6725', ''),
('hjsd1040', 'prof_dean,prof,assoc_prof_hod,'),
('hjsd1040', 'principal,prof,'),
('hjsd1040', 'lab_assistant,principal,prof_hod,'),
('hjsd1040', 'lab_assistant,principal,prof_hod,');

-- --------------------------------------------------------

--
-- Table structure for table `experience_details`
--

CREATE TABLE `experience_details` (
  `Sr.No` int(200) NOT NULL,
  `Oranization_name` varchar(100) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Date_of_joining` date NOT NULL,
  `Date_of_working` date NOT NULL,
  `proof_of_designation` longblob NOT NULL,
  `Total_exp_count` float NOT NULL,
  `Current_pay_scale` float NOT NULL,
  `Grade_pay` float NOT NULL,
  `Proof_of_CP_GP` longblob NOT NULL,
  `Nature_of_appointment` varchar(100) NOT NULL,
  `USSC_approval_date` date NOT NULL,
  `USSC_approval_ref_no` int(255) NOT NULL,
  `proof` longblob NOT NULL,
  `Teaching_exp` float NOT NULL,
  `Industrial_exp` float NOT NULL,
  `Research_exp` float NOT NULL,
  `proof_exp` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `external_fundedproject`
--

CREATE TABLE `external_fundedproject` (
  `Sr_no` int(20) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `Project_title` varchar(32) NOT NULL,
  `principal` varchar(32) NOT NULL,
  `co_invest` varchar(32) NOT NULL,
  `duration_from` year(4) NOT NULL,
  `duration_to` year(4) NOT NULL,
  `project_cost` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `grant_type` varchar(32) NOT NULL,
  `funding` varchar(32) NOT NULL,
  `patents_publication` varchar(32) NOT NULL,
  `approval_details` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `external_fundedproject`
--

INSERT INTO `external_fundedproject` (`Sr_no`, `emp_id`, `Project_title`, `principal`, `co_invest`, `duration_from`, `duration_to`, `project_cost`, `amount`, `grant_type`, `funding`, `patents_publication`, `approval_details`) VALUES
(1, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(2, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(3, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(4, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(5, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(6, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67),
(7, 'jaya4972', 'sd', 'df', 'fd', 2018, 2018, 0, 0, 'Major', 'fd', 'fd', 0x6176617461722e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_personal_details`
--

CREATE TABLE `faculty_personal_details` (
  `emp_id` varchar(40) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `spouse_name` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `age` int(5) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `marital_status` varchar(12) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `residential_no` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `alt_email` varchar(64) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `pf_no` varchar(20) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `permanent_address` text NOT NULL,
  `current_address` text NOT NULL,
  `mothers_name` varchar(10) NOT NULL,
  `fathers_name` varchar(10) NOT NULL,
  `religion` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `caste` text NOT NULL,
  `nationality` text NOT NULL,
  `passport_no` varchar(20) NOT NULL,
  `form_16` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_personal_details`
--

INSERT INTO `faculty_personal_details` (`emp_id`, `last_name`, `middle_name`, `first_name`, `spouse_name`, `dob`, `age`, `Gender`, `marital_status`, `mobile_no`, `residential_no`, `email`, `alt_email`, `pan_no`, `pf_no`, `aadhar`, `permanent_address`, `current_address`, `mothers_name`, `fathers_name`, `religion`, `category`, `caste`, `nationality`, `passport_no`, `form_16`) VALUES
('jaya4972', 'gupta', 'gjh', 'jaya', 'ghg', '2018-01-02', 0, 'male', 'Married', '9999999999', '9999999999', 'jayagupta286@gmail.com', 'df@df.cdc', 'hh', 'hh', 'hgh', 'j', 'j', 'j', 'j', 'Islam', 'obc', 'xcgc', 'indian', 'hh', 'AnNS');

-- --------------------------------------------------------

--
-- Table structure for table `interaction_with_outside_world`
--

CREATE TABLE `interaction_with_outside_world` (
  `Sr.No` int(255) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `Interaction_Type` varchar(255) NOT NULL,
  `Organization` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interaction_with_outside_world`
--

INSERT INTO `interaction_with_outside_world` (`Sr.No`, `emp_id`, `Interaction_Type`, `Organization`, `Date`) VALUES
(5, 'fdg6725', 'hii', 'df', '2018-01-03'),
(6, 'fdg6725', 'hello', 'dsf', '2018-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `internal_fundedproject`
--

CREATE TABLE `internal_fundedproject` (
  `Sr_no` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `Project_title` varchar(32) NOT NULL,
  `staff_name` varchar(32) NOT NULL,
  `student_name` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  `year` year(4) NOT NULL,
  `project_cost` varchar(32) NOT NULL,
  `project_utility` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal_fundedproject`
--

INSERT INTO `internal_fundedproject` (`Sr_no`, `emp_id`, `Project_title`, `staff_name`, `student_name`, `department`, `year`, `project_cost`, `project_utility`) VALUES
(3, 'jaya4972', 'aa', 'a', 'a', 'a', 2000, '200', 'xfgf'),
(4, 'jaya4972', 'jh', 'jh', 'jhj', 'hjh', 0000, '776', 'ftf');

-- --------------------------------------------------------

--
-- Table structure for table `other_responsibility`
--

CREATE TABLE `other_responsibility` (
  `Sr_no` int(5) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `responsibilities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_responsibility`
--

INSERT INTO `other_responsibility` (`Sr_no`, `emp_id`, `responsibilities`) VALUES
(9, 'fdg6725', 'faces_coordinator,exam_conduction,ut_conduction,fa'),
(10, 'fdg6725', 'faces_coordinator,exam_conduction,ut_conduction,fa'),
(11, 'fdg6725', 'faces_coordinator,exam_conduction,ut_conduction,fa'),
(12, 'fdg6725', 'hod,coordinator,hod,coordinator'),
(13, 'fdg6725', 'hod,coordinator,hod,coordinator'),
(14, 'fdg6725', 'hod,coordinator,hod,coordinator'),
(15, 'fdg6725', ''),
(16, 'hjsd1040', 'faces_coordinator,exam_conduction,faces_coordinato'),
(17, 'hjsd1040', 'faces_coordinator,exam_conduction,faces_coordinato'),
(18, 'hjsd1040', 'faces_coordinator,exam_conduction,faces_coordinato'),
(19, 'hjsd1040', 'faces_coordinator,exam_conduction,faces_coordinato'),
(20, 'hjsd1040', ''),
(21, 'jaya4972', ''),
(22, 'jaya4972', ''),
(23, 'jaya4972', ''),
(24, 'jaya4972', ''),
(25, 'jaya4972', ''),
(26, 'jaya4972', ''),
(27, 'jaya4972', ''),
(28, 'jaya4972', ''),
(29, 'jaya4972', ''),
(30, 'jaya4972', ''),
(31, 'jaya4972', ''),
(32, 'jaya4972', ''),
(33, 'jaya4972', ''),
(34, 'jaya4972', ''),
(35, 'jaya4972', ''),
(36, 'jaya4972', ''),
(37, 'jaya4972', ''),
(38, 'jaya4972', ''),
(39, 'jaya4972', ''),
(40, 'jaya4972', ''),
(41, 'jaya4972', ''),
(42, 'jaya4972', ''),
(43, 'jaya4972', ''),
(44, 'jaya4972', ''),
(45, 'jaya4972', ''),
(46, 'jaya4972', ''),
(47, 'jaya4972', ''),
(48, 'jaya4972', ''),
(49, 'jaya4972', '');

-- --------------------------------------------------------

--
-- Table structure for table `paper_publication`
--

CREATE TABLE `paper_publication` (
  `Sr_no` int(20) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `author_name` text NOT NULL,
  `paper_title` text NOT NULL,
  `journal_name` text NOT NULL,
  `year_publication` year(4) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_publication`
--

INSERT INTO `paper_publication` (`Sr_no`, `emp_id`, `author_name`, `paper_title`, `journal_name`, `year_publication`, `link`) VALUES
(3, 'jaya4972', 'hhh', 'jhjj', 'hghh', 2012, 'http://f.j');

-- --------------------------------------------------------

--
-- Table structure for table `professional_membership`
--

CREATE TABLE `professional_membership` (
  `Sr.No` int(255) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `Membership_category` varchar(100) NOT NULL,
  `Membership_no` varchar(255) NOT NULL,
  `Body_of_organization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_membership`
--

INSERT INTO `professional_membership` (`Sr.No`, `emp_id`, `Membership_category`, `Membership_no`, `Body_of_organization`) VALUES
(5, 'fdg6725', 'aa', 'aawe445f', 'csi'),
(6, 'fdg6725', 'bb', 'ert54', 'xcvds'),
(7, 'hjsd1040', 'sd', 'sd', 'sdf'),
(8, 'hjsd1040', 'sdf', 'bb', 'bb');

-- --------------------------------------------------------

--
-- Table structure for table `project_guided`
--

CREATE TABLE `project_guided` (
  `Sr_no` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `project_title` varchar(20) NOT NULL,
  `guide_name` varchar(20) NOT NULL,
  `group_members` text NOT NULL,
  `dept` varchar(10) NOT NULL,
  `year` date NOT NULL,
  `student_cat` varchar(10) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_guided`
--

INSERT INTO `project_guided` (`Sr_no`, `emp_id`, `project_title`, `guide_name`, `group_members`, `dept`, `year`, `student_cat`, `remark`) VALUES
(2, 'fdg6725', 'df', 'sdf', 'dsf', 'df', '2018-01-09', 'P.G.', 'dsff'),
(3, 'fdg6725', 'rtrt', 'ret', 'ret', 'ret', '2018-01-09', 'U.G.', 'rtgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `qualification_details`
--

CREATE TABLE `qualification_details` (
  `emp_id` varchar(40) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `university` varchar(30) NOT NULL,
  `percentage` float NOT NULL,
  `cgpa` float NOT NULL,
  `class_obtained` varchar(10) NOT NULL,
  `passing_year` int(10) NOT NULL,
  `proof` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification_details`
--

INSERT INTO `qualification_details` (`emp_id`, `qualification`, `branch`, `specialization`, `university`, `percentage`, `cgpa`, `class_obtained`, `passing_year`, `proof`) VALUES
('gfh2161', 'btech', 'it', 'btechcs', 'myum', 56, 5, 'a', 2012, 'fg'),
('gfh2161', 'mtech', 'cse', 'cse', 'ffg', 78, 7, 'd', 2012, 'cse'),
('fdg6725', 'dd', 'dd', 'd', 'd', 44, 4, 'd', 2012, 'dsf'),
('hjsd1040', 'tech', 'dd', 'sad', 'asd', 56, 3, 'A', 2012, 'XC'),
('hjsd1040', 'MTECH', 'DF', 'DSF', 'D', 0, 6, 'a', 2014, 'es');

-- --------------------------------------------------------

--
-- Table structure for table `staff_emp_details`
--

CREATE TABLE `staff_emp_details` (
  `emp_id` varchar(40) NOT NULL,
  `faculty_type` varchar(20) NOT NULL,
  `appointment_type` varchar(20) NOT NULL,
  `Library_card_no` int(255) NOT NULL,
  `Dept_name` varchar(100) NOT NULL,
  `high_qualif` varchar(40) NOT NULL,
  `other_high_qualif` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_emp_details`
--

INSERT INTO `staff_emp_details` (`emp_id`, `faculty_type`, `appointment_type`, `Library_card_no`, `Dept_name`, `high_qualif`, `other_high_qualif`) VALUES
('fdg6725', 'nonteaching', 'ussg', 67, 'comp', 'post_phd', 'df'),
('gfh2161', 'teaching', 'ussg', 67885, 'comp', 'btech', ''),
('hjsd1040', 'teaching', 'ussg', 345, 'comp', 'btech', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject_taught`
--

CREATE TABLE `subject_taught` (
  `Sr.No` int(255) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `Type_of_graduation` varchar(255) NOT NULL,
  `Subject_taught` varchar(255) NOT NULL,
  `Peroid_Year` varchar(60) NOT NULL,
  `sub_exp` varchar(32) NOT NULL,
  `Syllabus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_taught`
--

INSERT INTO `subject_taught` (`Sr.No`, `emp_id`, `Type_of_graduation`, `Subject_taught`, `Peroid_Year`, `sub_exp`, `Syllabus`) VALUES
(5, 'fdg6725', 'UG', 'LD', 'FD', '2', 'Old'),
(6, 'fdg6725', 'DF', 'CN', 'CV', '6', 'Revised'),
(7, 'hjsd1040', 'a', 'sws', 'dsf', 'dsf', 'Old'),
(8, 'hjsd1040', 'b', 'ait', 'sdf', 'sdf', 'Revised');

-- --------------------------------------------------------

--
-- Table structure for table `training_courses_attended`
--

CREATE TABLE `training_courses_attended` (
  `Sr_no` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `proof` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_courses_attended`
--

INSERT INTO `training_courses_attended` (`Sr_no`, `emp_id`, `course_name`, `organization_name`, `start_date`, `end_date`, `proof`) VALUES
(5, 'fdg6725', 'DSF', 'DSF', '2018-01-09', '2018-01-02', 0x35),
(6, 'fdg6725', 'FFF', 'DTRET', '2018-01-15', '2018-01-09', 0x36);

-- --------------------------------------------------------

--
-- Table structure for table `training_courses_organize`
--

CREATE TABLE `training_courses_organize` (
  `Sr_no` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `responsibility` varchar(20) NOT NULL,
  `course_duration` varchar(20) NOT NULL,
  `proof` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_courses_organize`
--

INSERT INTO `training_courses_organize` (`Sr_no`, `emp_id`, `course_name`, `responsibility`, `course_duration`, `proof`) VALUES
(3, 'fdg6725', 'qwe', 'asdsa', '2018-01-23', ''),
(4, 'fdg6725', 'eret', '213ss', '2018-01-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `acc_id` int(16) NOT NULL,
  `email_id` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_status` enum('not activated','activated') NOT NULL DEFAULT 'not activated',
  `act_id` varchar(128) DEFAULT NULL,
  `acc_act_time` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`acc_id`, `email_id`, `password`, `emp_id`, `created_on`, `acc_status`, `act_id`, `acc_act_time`, `last_login`) VALUES
(30, 'jayagupta286@gmail.com', '$2y$10$VsiZFwGKas9e3JqUvNVT/.XNXsez5hKykVZKAHi1fY5z61zwNxcG2', 'jaya4972', '2018-01-17 11:59:51', 'not activated', '311b9fa63504210bd78ee205cf4bfb98f71444db0263f22f2a58bc6daf51ce8164c858d4c88548ee', NULL, '2018-01-17 12:00:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_account_details`
--
ALTER TABLE `bank_account_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `book_publication`
--
ALTER TABLE `book_publication`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `experience_details`
--
ALTER TABLE `experience_details`
  ADD PRIMARY KEY (`Sr.No`);

--
-- Indexes for table `external_fundedproject`
--
ALTER TABLE `external_fundedproject`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `faculty_personal_details`
--
ALTER TABLE `faculty_personal_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `interaction_with_outside_world`
--
ALTER TABLE `interaction_with_outside_world`
  ADD PRIMARY KEY (`Sr.No`);

--
-- Indexes for table `internal_fundedproject`
--
ALTER TABLE `internal_fundedproject`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `other_responsibility`
--
ALTER TABLE `other_responsibility`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `paper_publication`
--
ALTER TABLE `paper_publication`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `professional_membership`
--
ALTER TABLE `professional_membership`
  ADD PRIMARY KEY (`Sr.No`);

--
-- Indexes for table `project_guided`
--
ALTER TABLE `project_guided`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `qualification_details`
--
ALTER TABLE `qualification_details`
  ADD PRIMARY KEY (`emp_id`,`qualification`);

--
-- Indexes for table `staff_emp_details`
--
ALTER TABLE `staff_emp_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `subject_taught`
--
ALTER TABLE `subject_taught`
  ADD PRIMARY KEY (`Sr.No`);

--
-- Indexes for table `training_courses_attended`
--
ALTER TABLE `training_courses_attended`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `training_courses_organize`
--
ALTER TABLE `training_courses_organize`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_publication`
--
ALTER TABLE `book_publication`
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience_details`
--
ALTER TABLE `experience_details`
  MODIFY `Sr.No` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `external_fundedproject`
--
ALTER TABLE `external_fundedproject`
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interaction_with_outside_world`
--
ALTER TABLE `interaction_with_outside_world`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `internal_fundedproject`
--
ALTER TABLE `internal_fundedproject`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other_responsibility`
--
ALTER TABLE `other_responsibility`
  MODIFY `Sr_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `paper_publication`
--
ALTER TABLE `paper_publication`
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professional_membership`
--
ALTER TABLE `professional_membership`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_guided`
--
ALTER TABLE `project_guided`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_taught`
--
ALTER TABLE `subject_taught`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training_courses_attended`
--
ALTER TABLE `training_courses_attended`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_courses_organize`
--
ALTER TABLE `training_courses_organize`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `acc_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `designation_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `staff_emp_details` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
