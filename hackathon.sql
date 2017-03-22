-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 01:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district_name`) VALUES
(1, 1, 'Thane'),
(2, 1, 'Mumbai Suburban'),
(3, 1, 'Mumbai City'),
(4, 1, 'Pune'),
(5, 1, 'Ahmednagar'),
(6, 2, 'Udupi'),
(7, 2, 'Chikmagalur'),
(8, 2, 'Dakshina Kannada'),
(9, 2, 'Hassan'),
(10, 2, 'Belgaum');

-- --------------------------------------------------------

--
-- Table structure for table `districtsinregion`
--

CREATE TABLE `districtsinregion` (
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districtsinregion`
--

INSERT INTO `districtsinregion` (`region_id`, `district_id`) VALUES
(501, 3),
(502, 4),
(501, 2),
(505, 6),
(503, 8),
(501, 3),
(509, 4),
(504, 7),
(504, 6),
(501, 8);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `inst_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `inst_email` varchar(30) NOT NULL,
  `inst_password` varchar(64) NOT NULL,
  `reset_password` tinyint(1) NOT NULL DEFAULT '1',
  `inst_name` varchar(40) NOT NULL,
  `inst_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`inst_id`, `district_id`, `inst_email`, `inst_password`, `reset_password`, `inst_name`, `inst_address`) VALUES
(1, 1, '2015adheesh.juvekar@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'RAIT', 'Ramrao Adik Institute of Technology, Sector 7, Phase I, Pad. Dr. D. Y. Patil Vidyapeeth, Nerul, Navi Mumbai, Maharashtra 400706'),
(2, 2, 'amit.singh@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'VESIT', 'Vivekanand Education Society\'s Institute of Technology, 495/497, Hashu Advani Memorial Complex, Collectors Colony, Chembur, Mumbai, Maharashtra 400074'),
(3, 3, '2015asutosh.padhi@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'VIT', 'Vidyalankar campus,Vidyalankar College Marg, Wadala East, Mumbai, Maharashtra 400037'),
(4, 4, '2015sneha.roundhal@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'MIT', 'Maharashtra Institute of Technology, S.No. 124, Paud Road, Kothrud, Pune, Maharashtra 411038'),
(5, 5, '2015shreya.jangale@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'Pravara', 'Pravara Institute of Medical Sciences, Loni Bk, Tal., Rahata, Maharashtra 423107'),
(6, 6, '2015isha.shetty@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'Bhandarkars\' Arts & Science College', 'Bhandarkars\' Arts & Science College, Kundapura, Udupi, Karnataka 576201'),
(7, 7, '2015dipshi.shetty@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'AITCKM', 'Adichunchanagiri Institute of Technology, KM Road, Chickmagaluru, Karnataka 577102'),
(8, 8, 'ashutosh_padhi1@yahoo.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'NITK', 'National Institute of Technology, Karnataka, NH 66, Srinivas Nagar, Surathkal, Mangaluru, Karnataka 575025'),
(9, 9, 'learnthingby@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'RIT', 'Rajeev Institute of Technology, Plot 1-D, Growth Center, Industrial Area, B-M Bypass Road, Hassan, Karnataka 573201'),
(10, 10, 'marathimandalee@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'VTU', 'Visvesvaraya Technological University, Jnana Sangama, Machhe, Belagavi, Karnataka 590018');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `locality` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `upvote_count` int(11) NOT NULL,
  `bogus_count` int(11) NOT NULL,
  `duplicate_count` int(11) NOT NULL,
  `solution_count` int(11) NOT NULL,
  `approved_solution` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `user_id`, `added_on`, `district_id`, `region_id`, `locality`, `pincode`, `title`, `description`, `upvote_count`, `bogus_count`, `duplicate_count`, `solution_count`, `approved_solution`) VALUES
(100000, 2003, '2017-03-15 18:30:00', 6, 503, '', '', 'Noise  Polution', 'Facing prolem since one year', 1, 0, 0, 0, 0),
(100001, 2002, '2017-03-14 22:30:00', 3, 500, '', '', 'Water pollution', 'Facing this problem since 2 year', 1, 0, 0, 0, 0),
(100002, 2003, '2017-03-15 18:30:00', 6, 503, '', '', 'Noise  Polution', 'Facing prolem since one year', 1, 0, 1, 0, 0),
(100003, 2002, '2017-03-14 22:30:00', 3, 500, '', '', 'Water pollution', 'Facing this problem since 2 year', 1, 0, 0, 0, 0),
(100004, 2003, '2017-03-15 18:30:00', 1, 502, 'Dombivli', '421202', 'Air Polltion', 'Severe Air Pollution', 1, 0, 0, 1, 1),
(100005, 2004, '2017-03-07 18:30:00', 6, 504, '', '', 'Sanitation', 'Lack of Sanitation', 1, 5, 0, 0, 0),
(100006, 2004, '2017-03-15 18:30:00', 6, 503, '', '', 'Street Hawkers', 'Creating menance on streets', 500, 0, 0, 0, 0),
(100007, 2005, '2017-03-07 18:30:00', 7, 505, '', '', 'Health Issues', 'Old to young ratio is too high', 505, 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issuebogusupvote`
--

CREATE TABLE `issuebogusupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebogusupvote`
--

INSERT INTO `issuebogusupvote` (`inst_id`, `issue_id`) VALUES
(6, 100005),
(6, 100005);

-- --------------------------------------------------------

--
-- Table structure for table `issueduplicateupvote`
--

CREATE TABLE `issueduplicateupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `similar_to_issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issueduplicateupvote`
--

INSERT INTO `issueduplicateupvote` (`inst_id`, `issue_id`, `similar_to_issue`) VALUES
(4, 100002, 100000),
(4, 100002, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `issueupvote`
--

CREATE TABLE `issueupvote` (
  `user_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issueupvote`
--

INSERT INTO `issueupvote` (`user_id`, `issue_id`) VALUES
(2003, 100000),
(2002, 100001),
(2003, 100002),
(2002, 100003),
(2003, 100004),
(2004, 100005),
(2004, 100006),
(2005, 100007);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(500, 'Mumbai'),
(501, 'Navi-Mumbai'),
(502, 'konkan'),
(503, 'kapu'),
(504, 'malhar'),
(505, 'majur'),
(506, 'bola'),
(507, 'kunjur'),
(508, 'nagpur'),
(509, 'nashik');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `solution_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `solution_url` text NOT NULL,
  `like_count` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`solution_id`, `issue_id`, `inst_id`, `solution_url`, `like_count`, `added_on`) VALUES
(9000, 100004, 5, 'https://www.youtube.com/watch?v=G62HrubdD6o', 900, '2017-03-23 18:30:00'),
(90001, 100007, 5, 'https://www.youtube.com/watch?v=G62HrubdD6o\r\nhttps://www.youtube.com/watch?v=G62HrubdD6o\r\nhttps://www.youtube.com/watch?v=G62HrubdD6o', 3, '2017-03-28 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `solutionlikedetails`
--

CREATE TABLE `solutionlikedetails` (
  `solution_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solutionlikedetails`
--

INSERT INTO `solutionlikedetails` (`solution_id`, `user_id`) VALUES
(9000, 2001),
(9000, 2002),
(90001, 2003),
(9000, 2006),
(9000, 2003),
(90001, 2000),
(9000, 2008),
(90001, 2002);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Maharashtra'),
(2, 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `fname`, `lname`, `mobile_number`, `district_id`) VALUES
(2000, 'dipshishetty@gmail.com', 'dipshi', 'shetty', '6648658779695', 4),
(2001, 'isha.shetty@gmail.com', '', '', '8454077267', 1),
(2002, 'sneharoundhal@gmail.com', 'sneha', 'shetty', '7775648568', 5),
(2003, 'shreyajangale@gmail.com', 'shreya', 'jangale', '564574543745', 3),
(2004, 'simranbhojwani@gmail.com', 'simran', 'bhojwani', '6746648684', 5),
(2005, 'hiran@gmail.com', '', '', '9768751341', 6),
(2006, 'bhavika@gmail.com', 'bhavika', '', '8654620544', 10),
(2007, 'kitty@gmail.com', '', '', '663547547', 7),
(2008, 'jaya@gmail.com', 'jaya', 'shetty', '756483568', 4),
(2009, 'murli@gmail.com', '', '', '527576864957', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `FOREIGN` (`state_id`);

--
-- Indexes for table `districtsinregion`
--
ALTER TABLE `districtsinregion`
  ADD KEY `FOREIGN1` (`region_id`),
  ADD KEY `FOREIGN2` (`district_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`inst_id`),
  ADD KEY `FOREIGN` (`district_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `FOREIGN` (`district_id`),
  ADD KEY `FOREIGN1` (`region_id`),
  ADD KEY `FOREIGN2` (`user_id`);

--
-- Indexes for table `issuebogusupvote`
--
ALTER TABLE `issuebogusupvote`
  ADD KEY `FOREIGN1` (`inst_id`),
  ADD KEY `FOREIGN2` (`issue_id`);

--
-- Indexes for table `issueduplicateupvote`
--
ALTER TABLE `issueduplicateupvote`
  ADD KEY `FOREIGN1` (`inst_id`),
  ADD KEY `FOREIGN2` (`issue_id`),
  ADD KEY `FOREIGN3` (`similar_to_issue`);

--
-- Indexes for table `issueupvote`
--
ALTER TABLE `issueupvote`
  ADD KEY `FOREIGN1` (`user_id`),
  ADD KEY `FOREIGN2` (`issue_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`solution_id`),
  ADD KEY `FOREIGN` (`issue_id`),
  ADD KEY `FOREIGN1` (`inst_id`);

--
-- Indexes for table `solutionlikedetails`
--
ALTER TABLE `solutionlikedetails`
  ADD KEY `FOREIGN1` (`solution_id`),
  ADD KEY `FOREIGN2` (`user_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FOREIGN` (`district_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `districtsinregion`
--
ALTER TABLE `districtsinregion`
  ADD CONSTRAINT `fk_district_id_dr` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `fk_region_id_dr` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `institute`
--
ALTER TABLE `institute`
  ADD CONSTRAINT `fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `fk_district_id_issue` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `fk_region_id_issue` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `fk_user_id_issue` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `issuebogusupvote`
--
ALTER TABLE `issuebogusupvote`
  ADD CONSTRAINT `fk_inst_id_bogus` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_bogus` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `issueduplicateupvote`
--
ALTER TABLE `issueduplicateupvote`
  ADD CONSTRAINT `fk_inst_id_duplicate` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_duplicate` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`),
  ADD CONSTRAINT `fk_similar_issue_id_duplicate` FOREIGN KEY (`similar_to_issue`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `issueupvote`
--
ALTER TABLE `issueupvote`
  ADD CONSTRAINT `fk_issue_id_upvote` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`),
  ADD CONSTRAINT `fk_user_id_upvote` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `fk_inst_id_solution` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_solution` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `solutionlikedetails`
--
ALTER TABLE `solutionlikedetails`
  ADD CONSTRAINT `fk_solution_id_like` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`solution_id`),
  ADD CONSTRAINT `fk_user_id_like` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_district_id_user` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
