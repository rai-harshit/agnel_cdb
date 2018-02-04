-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 02:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
('Harshit3940', 'JKQEHKQJEH', '56348653487658436', 'WREWU2Y4UI2', 'RWKWHJKEHFJKWEERW', 'FKEWHRKEWHR');

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

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `sr` int(11) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `designation` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`sr`, `emp_id`, `designation`) VALUES
(62, 'sdfsfRai5142', 'assoc_prof_dean');

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
('Harshit3940', 'Rai', 'Ashok', 'Harshit', '', '2018-02-13', 0, 'male', 'Unmarried', '7897948768', '9877964798', 'kalpana.wani@fcrit.ac.in', 'hr68.official@gmail.com', 'KHKH428742', '35643865763785', '583476758368', 'HKJHKJHDSKHFSJKFHSKHFSJKHFDJKSFDSHJKSFSSFHJKHDSKFHDSHFJDSKHFJKHSKHJHSDHFSKHFKJSS', 'HFSDHFKJSDHFKJSHFHJSDFHSDHFJKHSKDJFHJKSHJKFHSKHFHJSFDHSFJKDHJSKHJSDH', 'Sangeeta R', 'Ashok Rai', 'Islam', 'ntdt', 'KJEHQJKHEKQ', 'indian', '742YURWEU', 'AnNS');

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

-- --------------------------------------------------------

--
-- Table structure for table `other_responsibility`
--

CREATE TABLE `other_responsibility` (
  `Sr_no` int(5) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `responsibility` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('', 'fkjshdk', 'fsfsjgfjs', 'gfjsgjfs', 'jfdsgjfgsj', 0, 0, 'fjsgjgsjh', 0, 'ghjhdkghd'),
('', 'fhskjfh', 'fshkfsj', 'khfskjf', 'kshfksjhf', 0, 0, 'fskhkfjs', 0, 'fshkfhsk'),
('', 'sfkshfkh', 'kshfsjhdks', 'kshfsjhfjk', 'tuieyteiuy', 0, 0, 'khsfjhskj', 0, 'gdfkhdhj'),
('', 'tehtreuytui', 'teruytuie', 'eriytieruyt', 'tytuerytie', 0, 0, 'hgkdhkdgh', 0, 'sfhskjfhk'),
('', 'dghkjdgh', 'IT', 'sfhjskfh', 'khfgdhgk', 0, 0, 'dgkhgkjd', 0, 'hdgkjfdgjh');

-- --------------------------------------------------------

--
-- Table structure for table `staff_emp_details`
--

CREATE TABLE `staff_emp_details` (
  `emp_id` varchar(40) NOT NULL,
  `faculty_type` varchar(20) NOT NULL,
  `appointment_type` varchar(20) NOT NULL,
  `Library_card_no` int(255) NOT NULL,
  `college_emp_id` varchar(32) NOT NULL,
  `Dept_name` varchar(100) NOT NULL,
  `highest_qualif` varchar(40) NOT NULL,
  `other_specialization` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, '', 'khdakdha', 'sfsdfhkshfksfs', '2018-02-06', '2018-02-20', 0x34353435),
(8, '', 'adkhda', 'ksfshfkjsfsf', '2018-01-28', '2018-02-15', 0x3336),
(9, '', 'fksdkhskf', 'dfayutuyaff', '0000-00-00', '2017-03-22', 0x667366646466736466),
(10, '', 'GSJKHJSF', 'SHFSJKHFSKFS', '2018-02-12', '2018-02-11', 0x33353433353335);

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
(1, '', 'wrwyriwuy', 'wruywiyriw', '1992-12-12', ''),
(2, '', 'sfkjfshkjfs', 'rwerwrewrr', '2018-02-05', ''),
(3, '', 'HSKFDKDSF', 'SDFSFSFSDFSF', '2018-02-14', '');

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
(5, 'kalpana.wani@fcrit.ac.in', '$2y$10$G7CbZP.dIVoSHk0ftJvggOWI45sQ84gkQ.Oz10flaAiowwqolkOd.', 'Harshit3940', '2018-02-02 10:17:51', 'not activated', 'ce33f17c402c4c5c414d5ca7aa947193fbf064520263f22f2a58bc6daf51ce8164c858d4c88548ee', NULL, '2018-02-04 13:09:53');

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
  ADD PRIMARY KEY (`sr`);

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
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `passport_no` (`passport_no`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `residential_no` (`residential_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `alt_email` (`alt_email`),
  ADD UNIQUE KEY `pan_no` (`pan_no`),
  ADD UNIQUE KEY `pf_no` (`pf_no`),
  ADD UNIQUE KEY `aadhar` (`aadhar`);

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
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `Library_card_no` (`Library_card_no`),
  ADD UNIQUE KEY `college_emp_id` (`college_emp_id`);

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
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `experience_details`
--
ALTER TABLE `experience_details`
  MODIFY `Sr.No` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `external_fundedproject`
--
ALTER TABLE `external_fundedproject`
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interaction_with_outside_world`
--
ALTER TABLE `interaction_with_outside_world`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `internal_fundedproject`
--
ALTER TABLE `internal_fundedproject`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other_responsibility`
--
ALTER TABLE `other_responsibility`
  MODIFY `Sr_no` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paper_publication`
--
ALTER TABLE `paper_publication`
  MODIFY `Sr_no` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professional_membership`
--
ALTER TABLE `professional_membership`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_guided`
--
ALTER TABLE `project_guided`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_taught`
--
ALTER TABLE `subject_taught`
  MODIFY `Sr.No` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `training_courses_attended`
--
ALTER TABLE `training_courses_attended`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `training_courses_organize`
--
ALTER TABLE `training_courses_organize`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `acc_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
